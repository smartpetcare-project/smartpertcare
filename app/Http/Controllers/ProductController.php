<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $countProductPublish = Product::where('is_publish', 1)->count();
        $countProductUnpublish = Product::where('is_publish', 0)->count();
        $countAllProduct = Product::count();

        $category = $request->query('category');

        if ($category) {
            if ($category === 'publish') {
                $products = Product::where('is_publish', 1)
                    ->with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            } elseif ($category === 'draft') {
                $products = Product::where('is_publish', 0)
                    ->with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            } else {
                $products = Product::with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            }
        } else {
            $products = Product::with(['category', 'ratings'])
                ->get()
                ->toArray();
        }

        $products = array_map(function ($product) {
            $product['image_preview'] = asset('storage/' . $product['image_preview']);
            $product['image_header'] = asset('storage/' . $product['image_header']);
            $product['image_content'] = json_decode($product['image_content']);
            $product['image_content'] = array_map(function ($image) {
                return asset('storage/' . $image);
            }, $product['image_content']);

            $product['category_name'] = $product['category']['name'] ?? 'No Category';

            $product['created_at'] = Carbon::parse($product['created_at'])->format('d M Y, H:i');
            $product['updated_at'] = Carbon::parse($product['updated_at'])->format('d M Y, H:i');

            $ratings = $product['ratings'];
            $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
            $product['average_rating'] = $averageRating;

            return $product;
        }, $products);

        return view('product.index', compact('products', 'countProductPublish', 'countProductUnpublish', 'countAllProduct'));
    }

    public function create()
    {
        $category = Category::all()->where('type', 'product')->toArray();
        return view('product.create', compact('category'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:tbl_category,id',
            'image_preview' => 'required|image|mimes:jpeg,png,jpg|max:5024',            
            'image_header' => 'required|image|mimes:jpeg,png,jpg|max:5024',
            'image_content.*' => 'required|image|mimes:jpeg,png,jpg|max:5024',
            'is_publish' => 'required|boolean',
        ]);

        if ($validate->fails()) {            
            return redirect()->back()->withErrors($validate)->withInput()->with('error_messages', $validate->errors()->all());                        
        }

        $imagePreviewPath = $request->file('image_preview')->store('product', 'public');        
        $imageHeaderPath = $request->file('image_header')->store('product', 'public');

        $contentImages = [];
        if ($request->hasFile('image_content')) {
            foreach ($request->file('image_content') as $contentImage) {
                $contentImages[] = $contentImage->store('product', 'public');
            }
        }

        $product = Product::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'is_publish' => $request->is_publish,
            'image_preview' => $imagePreviewPath,            
            'image_header' => $imageHeaderPath,
            'image_content' => json_encode($contentImages),
        ]);

        return redirect()->route('product.index')->with('success', 'Product saved successfully');        
    }

    public function show($uuid)
    {
        $product = Product::where('uuid', $uuid)->with(['category', 'ratings.user'])->firstOrFail()->toArray();

        $product['image_preview'] = asset('storage/' . $product['image_preview']);
        $product['image_header'] = asset('storage/' . $product['image_header']);
        $product['image_content'] = json_decode($product['image_content']);
        $product['image_content'] = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $product['image_content']);

        $product['category_name'] = $product['category']['name'] ?? 'No Category';

        $product['created_at'] = Carbon::parse($product['created_at'])->format('d M Y, H:i');
        $product['updated_at'] = Carbon::parse($product['updated_at'])->format('d M Y, H:i');

        $ratings = $product['ratings'];
        $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
        $product['average_rating'] = $averageRating;
        
        $countRating = count($ratings);        
        return view('product.show', compact('product', 'countRating'));
    }

    public function preview($uuid)
    {
        $product = Product::where('uuid', $uuid)->with(['category', 'ratings'])->firstOrFail()->toArray();

        $product['image_preview'] = asset('storage/' . $product['image_preview']);
        $product['image_header'] = asset('storage/' . $product['image_header']);
        $product['image_content'] = json_decode($product['image_content']);
        $product['image_content'] = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $product['image_content']);

        $product['category_name'] = $product['category']['name'] ?? 'No Category';

        $product['created_at'] = Carbon::parse($product['created_at'])->format('d M Y, H:i');
        $product['updated_at'] = Carbon::parse($product['updated_at'])->format('d M Y, H:i');

        $ratings = $product['ratings'];
        $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
        $product['average_rating'] = $averageRating;

        return view('product.preview', compact('product'));
    }

    public function changeStatus($uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        $product->update(['is_publish' => !$product->is_publish]);

        return redirect()->back()->with('success', 'Product status changed successfully');        
    }

    public function edit($uuid)
    {
        $product = Product::where('uuid', $uuid)->first();

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Product not found');
        }

        $product->description = html_entity_decode($product->description);

        $product->image_preview = asset('storage/' . $product->image_preview);
        $product->image_header = asset('storage/' . $product->image_header);
        $product->image_content = json_decode($product->image_content);
        $product->image_content = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $product->image_content);

        $product->price = number_format($product->price, 0, ',', '.');

        $category = Category::where('type', 'product')->get();

        return view('product.edit', compact('product', 'category'));
    }

    public function update(Request $request, $uuid)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:tbl_category,id',
            'image_preview' => 'nullable|image|mimes:jpeg,png,jpg|max:5024',            
            'image_header' => 'nullable|image|mimes:jpeg,png,jpg|max:5024',
            'image_content.*' => 'nullable|image|mimes:jpeg,png,jpg|max:5024',
            'is_publish' => 'required|boolean',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()->with('error_messages', $validate->errors()->all());
        }

        $product = Product::where('uuid', $uuid)->firstOrFail();

        $imagePreviewPath = $product->image_preview;
        if ($request->hasFile('image_preview')) {
            $imagePreviewPath = $request->file('image_preview')->store('product', 'public');
        }

        $imageHeaderPath = $product->image_header;
        if ($request->hasFile('image_header')) {
            $imageHeaderPath = $request->file('image_header')->store('product', 'public');
        }

        $contentImages = json_decode($product->image_content);
        if ($request->hasFile('image_content')) {
            foreach ($request->file('image_content') as $contentImage) {
                $contentImages[] = $contentImage->store('product', 'public');
            }
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'is_publish' => $request->is_publish,
            'image_preview' => $imagePreviewPath,            
            'image_header' => $imageHeaderPath,
            'image_content' => json_encode($contentImages),
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $product = Product::where('uuid', $id)->firstOrFail();
        
        Storage::disk('public')->delete($product->image_preview);
        Storage::disk('public')->delete($product->image_header);
        $contentImages = json_decode($product->image_content);
        foreach ($contentImages as $contentImage) {
            Storage::disk('public')->delete($contentImage);
        }

        $product->ratings()->delete();
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully');        
    }
}
