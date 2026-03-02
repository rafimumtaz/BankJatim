<?php

use Illuminate\Support\Facades\Route;
use App\Models\CarouselSlide;
use App\Http\Controllers\PageController;

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
})->name('home');

Route::get('/news/{slug}', [PageController::class, 'showNews'])->name('news.show');
Route::get('/promo/{slug}', [PageController::class, 'showPromo'])->name('promo.show');
