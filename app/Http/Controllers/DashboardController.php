<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user()->toArray();
        $countAllUser = User::where('role', '!=', 'admin')->count();
        $countAllProduct = Product::count();
        $countAllArticle = Article::count();

        return view('index', compact('user', 'countAllUser', 'countAllProduct', 'countAllArticle'));
    }

    public function root(Request $request)
    {
        if(view()->exists($request->path())) {
            return view($request->path());
        } else {
            return abort(404);
        }
    }
}
