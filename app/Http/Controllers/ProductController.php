<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
            return response()->json(['success' => false, 'message' => $validate->errors()->first()], 400);
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

        return response()->json(['success' => true, 'message' => 'Product saved successfully']);
    }


    public function edit($uuid)
    {
        $product = Product::where('uuid', $uuid)->with('category')->firstOrFail();
        $category = Category::all()->toArray();

        dd($product, $category);
        return view('product.update', compact('product', 'category'));
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
            return response()->json(['success' => false, 'message' => $validate->errors()->first()], 400);
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

        return response()->json(['success' => true, 'message' => 'Product updated successfully']);
    }

    public function destroy($uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        $product->delete();

        return response()->json(['success' => true, 'message' => 'Product deleted successfully']);
    }

    public function publish($uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        $product->update(['is_publish' => 1]);

        return response()->json(['success' => true, 'message' => 'Product published successfully']);
    }

    public function unpublish($uuid)
    {
        $product = Product::where('uuid', $uuid)->firstOrFail();
        $product->update(['is_publish' => 0]);

        return response()->json(['success' => true, 'message' => 'Product unpublished successfully']);
    }
}
