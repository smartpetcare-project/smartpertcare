<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Helpers\ContentFormatter;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'user'])->get()->map(fn($article) => ContentFormatter::formatArticle($article->toArray()));
        $products = Product::all()->map(fn($product) => ContentFormatter::formatProduct($product->toArray(), false));

        return view('main-website.index', compact('articles', 'products'));
    }

    public function service()
    {
        $articles = Article::with(['category', 'user'])->get()->map(fn($article) => ContentFormatter::formatArticle($article->toArray()));
        $products = Product::all()->map(fn($product) => ContentFormatter::formatProduct($product->toArray(), false));

        return view('main-website.service', compact('articles', 'products'));
    }

    public function serviceDetail($uuid)
    {
        $product = Product::where('uuid', $uuid)->with('category')->first();
        $uuidProduct = Product::select('uuid')->get();

        $product = ContentFormatter::formatProduct($product->toArray(), true);
        dd($product);

        return view('main-website.service-detail', compact('product', 'uuidProduct'));
    }

    public function blog()
    {
        $articles = Article::with(['category', 'user', 'ratings'])->paginate(5);

        $articles->getCollection()->transform(
            fn($article) => ContentFormatter::formatArticle($article->toArray(), false)
        );        

        // dd($articles);
        return view('main-website.blog', compact('articles'));
    }

    public function blogDetail($uuid)
    {
        $article = Article::where('uuid', $uuid)->with(['category', 'user', 'ratings'])->first();
        $article = ContentFormatter::formatArticle($article->toArray(), true);

        return view('main-website.blog-detail', compact('article'));
    }
}
