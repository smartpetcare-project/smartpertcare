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

        return view('main-website.service-detail', compact('product', 'uuidProduct'));
    }
}
