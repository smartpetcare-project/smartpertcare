<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('product', 'user')->get();
        dd($ratings);
        return view('ratings.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rateable_type' => 'required|string|in:product,article',
            'rateable_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:255',
        ]);

        // Proses selanjutnya jika validasi berhasil
        $rateableModel = $request->rateable_type === 'product' ? Product::class : Article::class;
        $rateable = $rateableModel::findOrFail($request->rateable_id);

        $user = auth()->user();
        $userId = $user ? $user->id : null;

        if ($userId === null) {
            return redirect()->back()->with('errorMessages', 'You must login to rate this product');
        }

        $rating = new Rating([
            'uuid' => Str::uuid(),
            'user_id' => $userId,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        $rateable->ratings()->save($rating);

        return redirect()->back()->with('successMessages', 'Rating added successfully');
    }
}
