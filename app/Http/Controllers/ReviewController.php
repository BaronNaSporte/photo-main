<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // public function index()
    // {
    //     $reviews = Review::with('user')->latest()->get();
    //     return view('layouts.base', compact('reviews'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'content' => 'required|string|max:1000'
    //     ]);

    //     Review::create([
    //         'content' => $request->content,
    //         'user_id' => Auth::id(),
    //     ]);

    //     return redirect()->route('reviews.index');
    // }

    // public function destroy(Review $review)
    // {
    //     $this->authorize('delete', $review);
    //     $review->delete();
    //     return redirect()->route('reviews.index');
    // }
}
