<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::with(['category', 'user'])->get()->toArray();
        $articles = array_map(function ($article) {
            $article['image_preview'] = asset('storage/' . $article['image_preview']);
            $article['image_header'] = asset('storage/' . $article['image_header']);
            $article['image_content'] = json_decode($article['image_content']);
            $article['image_content'] = array_map(function ($image) {
                return asset('storage/' . $image);
            }, $article['image_content']);

            $article['category_name'] = $article['category']['name'] ?? 'No Category';

            $article['created_at'] = Carbon::parse($article['created_at'])->format('d M Y');
            $article['updated_at'] = Carbon::parse($article['updated_at'])->format('d M Y');

            unset($article['category_id']);
            unset($article['category']);

            return $article;
        }, $articles);

        $products = Product::all()->toArray();
        $products = array_map(function ($product) {
            $product['image_preview'] = asset('storage/' . $product['image_preview']);            
            $product['category_name'] = $product['category']['name'] ?? 'No Category';
        
            $product['created_at'] = Carbon::parse($product['created_at'])->format('d M Y');
            $product['updated_at'] = Carbon::parse($product['updated_at'])->format('d M Y');
        
            // Ambil paragraf pertama hingga tanda titik pertama
            preg_match('/<p>(.*?)<\/p>/', $product['description'], $matches);
            if (!empty($matches[1])) {
                $firstSentence = explode('.', strip_tags($matches[1]))[0];
                $product['description'] = $firstSentence . '.';
            } else {
                $product['description'] = 'No description available';
            }
        
            unset($product['category_id']);
        
            return $product;
        }, $products);
        
        // dd($articles, $products);

        return view('main-website.index', compact('articles', 'products'));
    }
}
