<?php

use Illuminate\Support\Facades\Route;
use App\Models\CarouselSlide;

// Public Landing Page
Route::get('/', function () {
    $slides = CarouselSlide::where('is_active', true)
        ->orderBy('sort_order')
        ->get();

    return view('landing-page', compact('slides'));
});
