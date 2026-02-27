<?php

use Illuminate\Support\Facades\Route;
use App\Models\CarouselSlide;

// Public Landing Page
Route::get('/', function () {
    $slides = CarouselSlide::where('is_active', true)
        ->orderBy('sort_order')
        ->get()
        ->map(function ($slide) {
            $slide->image_url = asset('storage/' . $slide->image_path);
            return $slide;
        });

    return view('landing-page', compact('slides'));
});
