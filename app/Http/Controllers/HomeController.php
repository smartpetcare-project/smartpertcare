<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Helpers\ContentFormatter;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $articles = Article::where('is_publish', 1)
            ->with(['category', 'user', 'ratings'])
            ->get()
            ->map(fn($article) => ContentFormatter::formatArticle($article->toArray()));

        $products = Product::where('is_publish', 1)
            ->get()
            ->map(fn($product) => ContentFormatter::formatProduct($product->toArray(), false));

        return view('main-website.index', compact('articles', 'products'));
    }

    public function service()
    {
        $articles = Article::where('is_publish', 1)
            ->with(['category', 'user', 'ratings'])
            ->get()
            ->map(fn($article) => ContentFormatter::formatArticle($article->toArray()));

        $services = Service::where('is_publish', 1)
            ->with(['category', 'user', 'ratings'])
            ->get()
            ->map(fn($service) => ContentFormatter::formatService($service->toArray()));

        return view('main-website.service', compact('articles', 'services'));
    }

    public function serviceDetail($uuid)
    {
        $service = Service::where('uuid', $uuid)
            ->where('is_publish', 1)
            ->with('category', 'ratings')
            ->firstOrFail();

        $uuidService = Service::where('is_publish', 1)
            ->select('uuid')
            ->get();

        $service = ContentFormatter::formatService($service->toArray(), true);

        return view('main-website.service-detail', compact('service', 'uuidService'));
    }

    public function blog()
    {
        $articles = Article::where('is_publish', 1)
            ->with(['category', 'user', 'ratings'])
            ->paginate(5);

        $articles->getCollection()->transform(
            fn($article) => ContentFormatter::formatArticle($article->toArray(), false)
        );

        return view('main-website.blog', compact('articles'));
    }

    public function blogDetail($uuid)
    {
        $article = Article::where('uuid', $uuid)
            ->where('is_publish', 1)
            ->with(['category', 'user', 'ratings.user'])
            ->firstOrFail();

        $article = ContentFormatter::formatArticle($article->toArray(), true);

        $article['ratings'] = collect($article['ratings'])->map(function ($rating) {
            $rating['created_at'] = Carbon::parse($rating['created_at'])->format('d M Y');
            $rating['updated_at'] = Carbon::parse($rating['updated_at'])->format('d M Y');
            return $rating;
        });

        return view('main-website.blog-detail', compact('article'));
    }

    public function product()
    {
        $products = Product::where('is_publish', 1)
            ->with('category')
            ->get()
            ->map(fn($product) => ContentFormatter::formatProduct($product->toArray(), false));

        return view('main-website.product', compact('products'));
    }

    public function productDetail($uuid)
    {
        $product = Product::where('uuid', $uuid)
            ->where('is_publish', 1)
            ->with('category', 'ratings.user')
            ->firstOrFail();

        $product = ContentFormatter::formatProduct($product->toArray(), true);
        $DeskripsiMini = preg_match('/<p>(.*?)<\/p>/', $product['description'], $matches);
        $DeskripsiMini = !empty($matches[0]) ? $matches[0] : '<p>No description available</p>';
        $product['description_mini'] = $DeskripsiMini;

        $product['ratings'] = collect($product['ratings'])->map(function ($rating) {
            $rating['created_at'] = Carbon::parse($rating['created_at'])->format('d M Y');
            $rating['updated_at'] = Carbon::parse($rating['updated_at'])->format('d M Y');
            return $rating;
        });

        return view('main-website.product-detail', compact('product'));
    }

    public function about()
    {
        return view('main-website.about');
    }

    public function contact()
    {
        return view('main-website.contact');
    }

    public function team()
    {
        return view('main-website.team');
    }

    public function faq()
    {
        return view('main-website.faq');
    }
}
