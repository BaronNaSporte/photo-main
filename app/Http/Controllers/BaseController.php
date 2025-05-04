<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Course;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class SubscriptionController
 * @package App\Http\Controllers
 */

class BaseController extends Controller
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(Request $request)
    {
        $brands = Brand::all();

        $courses = Course::all();

        $reviews =  Review::with('user')->where('is_verified', true)->latest()->get();

        $setting = Setting::latest()->first();

        $data = [
            'name' => $setting->name,
            'description' => $setting->description,
            'logo' => $setting->logo,
            'meta_title' => $setting->meta_title,
            'meta_description' => $setting->meta_description,
            'meta_keywords' => $setting->meta_keywords,
        ];

        if ($request->ajax()) {
            return response()->json([
                'courses' => view('layouts.components.corses', compact('courses'))->render(),
            ]);
        }

        return view('layouts.base', compact('brands', 'courses', 'reviews', 'setting'));
    }
    public function getCoursesByCategory($brandId, Request $request)
    {
        $courses = Course::where('brand_id', $brandId)->get();

        if ($request->ajax()){
            return response()->json([
                'courses' => view('layouts.components.corses', compact('courses'))->render(),
            ]);
        }

        return response()->json(['message' => 'Invalid request'], 400);

    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $photoPath = null;
            if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('reviews', 'public');
    }

        Review::create([
            'content' => $request->content,
            'user' => $request->user,
            'photo' => $photoPath,
            'is_verified'=> false,
        ]);

        return redirect()->route('reviews.index');
    }
    public function destroy(Review $review)
    {
        $this->authorize('delete', $review);
        $review->delete();
        return redirect()->route('reviews.index');
    }
};
