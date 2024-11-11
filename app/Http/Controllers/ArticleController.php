<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $countArticlePublish = Article::where('is_publish', 1)->count();
        $countArticleUnpublish = Article::where('is_publish', 0)->count();
        $countAllArticle = Article::count();
        $category = $request->query('category');

        if ($category) {
            if ($category === 'publish') {
                $articles = Article::where('is_publish', 1)
                    ->with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            } elseif ($category === 'draft') {
                $articles = Article::where('is_publish', 0)
                    ->with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            } else {
                $articles = Article::with(['category', 'ratings'])
                    ->get()
                    ->toArray();
            }
        } else {
            $articles = Article::with(['category', 'ratings'])
                ->get()
                ->toArray();
        }

        $articles = array_map(function ($article) {
            $article['image_preview'] = asset('storage/' . $article['image_preview']);
            $article['image_header'] = asset('storage/' . $article['image_header']);
            $article['image_content'] = json_decode($article['image_content']);
            $article['image_content'] = array_map(function ($image) {
                return asset('storage/' . $image);
            }, $article['image_content']);

            $article['category_name'] = $article['category']['name'] ?? 'No Category';

            $article['created_at'] = Carbon::parse($article['created_at'])->format('d M Y, H:i');
            $article['updated_at'] = Carbon::parse($article['updated_at'])->format('d M Y, H:i');

            $ratings = $article['ratings'];
            $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
            $article['average_rating'] = $averageRating;

            return $article;
        }, $articles);

        return view('article.index', compact('articles', 'countArticlePublish', 'countArticleUnpublish', 'countAllArticle'));
    }

    public function create()
    {
        $category = Category::all()->where('type', 'article')->toArray();
        return view('article.create', compact('category'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:tbl_category,id',
            'image_preview' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_header' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_content.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // dd($validate);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()
                ->with('error_messages', $validate->errors()->all());
        }

        $imagePreview = $request->file('image_preview')->store('articles', 'public');
        $imageHeader = $request->file('image_header')->store('articles', 'public');

        $imageContent = [];
        foreach ($request->file('image_content') as $image) {
            $imageContent[] = $image->store('articles', 'public');
        }

        $article = Article::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'is_publish' => $request->is_publish,
            'image_preview' => $imagePreview,
            'image_header' => $imageHeader,
            'image_content' => json_encode($imageContent),
        ]);

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

    public function show($uuid)
    {
        $article = Article::where('uuid', $uuid)->with(['category', 'ratings.user', 'user'])->first()->toArray();

        $article['image_preview'] = asset('storage/' . $article['image_preview']);
        $article['image_header'] = asset('storage/' . $article['image_header']);
        $article['image_content'] = json_decode($article['image_content']);
        $article['image_content'] = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $article['image_content']);

        $article['category_name'] = $article['category']['name'] ?? 'No Category';

        $article['created_at'] = Carbon::parse($article['created_at'])->format('d M Y, H:i');
        $article['updated_at'] = Carbon::parse($article['updated_at'])->format('d M Y, H:i');

        $ratings = $article['ratings'];
        $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
        $article['average_rating'] = $averageRating;

        $countRating = count($ratings);

        return view('article.show', compact('article', 'countRating'));
    }

    public function edit($uuid)
    {
        $article = Article::where('uuid', $uuid)->first();

        if (!$article) {
            return redirect()->route('articles.index')->with('error', 'Artikel tidak ditemukan');
        }

        $article->content = html_entity_decode($article->content);

        // Decode dan mapping gambar-gambar
        $article->image_content = json_decode($article->image_content);
        $article->image_content = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $article->image_content);

        // Gambar lainnya
        $article->image_preview = asset('storage/' . $article->image_preview);
        $article->image_header = asset('storage/' . $article->image_header);

        $category = Category::where('type', 'article')->get();

        return view('article.edit', compact('article', 'category'));
    }

    public function update(Request $request, $uuid)
    {        
        $validate = Validator::make($request->all(), [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|exists:tbl_category,id',
            'image_preview' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_header' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_content.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput()
                ->with('error_messages', $validate->errors()->all());
        }

        $article = Article::where('uuid', $uuid)->first();

        $imagePreview = $article->image_preview;
        if ($request->hasFile('image_preview')) {
            Storage::disk('public')->delete($article->image_preview);
            $imagePreview = $request->file('image_preview')->store('articles', 'public');
        }

        $imageHeader = $article->image_header;
        if ($request->hasFile('image_header')) {
            Storage::disk('public')->delete($article->image_header);
            $imageHeader = $request->file('image_header')->store('articles', 'public');
        }

        $imageContent = json_decode($article->image_content);
        if ($request->hasFile('image_content')) {
            foreach ($imageContent as $image) {
                Storage::disk('public')->delete($image);
            }

            $imageContent = [];
            foreach ($request->file('image_content') as $image) {
                $imageContent[] = $image->store('articles', 'public');
            }
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'is_publish' => $request->is_publish,
            'image_preview' => $imagePreview,
            'image_header' => $imageHeader,
            'image_content' => json_encode($imageContent),
        ]);

        return redirect()->route('article.index')->with('success', 'Article updated successfully');
    }

    public function changeStatus($id)
    {
        $article = Article::where('uuid', $id)->first();
        if ($article->is_publish === 1) {
            $article->update(['is_publish' => 0]);
        } else {
            $article->update(['is_publish' => 1]);
        }

        return redirect()->back()->with('success', 'Article status updated successfully');
    }

    public function destroy($id)
    {
        $article = Article::where('uuid', $id)->first();

        Storage::disk('public')->delete($article->image_preview);
        Storage::disk('public')->delete($article->image_header);

        $imageContent = json_decode($article->image_content);
        if ($imageContent) {
            foreach ($imageContent as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $article->ratings()->delete();
        $article->delete();

        return redirect()->route('article.index')->with('success', 'Article and associated files deleted successfully');
    }

    public function preview($uuid)
    {
        $article = Article::where('uuid', $uuid)->with(['category', 'ratings.user', 'user'])->first()->toArray();

        $article['image_preview'] = asset('storage/' . $article['image_preview']);
        $article['image_header'] = asset('storage/' . $article['image_header']);
        $article['image_content'] = json_decode($article['image_content']);
        $article['image_content'] = array_map(function ($image) {
            return asset('storage/' . $image);
        }, $article['image_content']);

        $article['category_name'] = $article['category']['name'] ?? 'No Category';

        $article['created_at'] = Carbon::parse($article['created_at'])->format('d M Y, H:i');
        $article['updated_at'] = Carbon::parse($article['updated_at'])->format('d M Y, H:i');

        $ratings = $article['ratings'];
        $averageRating = !empty($ratings) ? number_format(array_sum(array_column($ratings, 'rating')) / count($ratings), 1) : '0.0';
        $article['average_rating'] = $averageRating;

        $countRating = count($ratings);

        return view('article.preview', compact('article', 'countRating'));
    }
}
