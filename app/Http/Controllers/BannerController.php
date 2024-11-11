<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all()->toArray();
        return view('banner.index');   
    }

    public function create()
    {
        return view('banner.create');   
    }

    public function store(Request $request)
    {
        
    }
}
