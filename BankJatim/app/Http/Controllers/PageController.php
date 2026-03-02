<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Promo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showNews($slug)
    {
        $news = News::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedNews = News::with('category')
            ->where('is_active', true)
            ->where('id', '!=', $news->id)
            ->orderBy('published_date', 'desc')
            ->take(5)
            ->get();

        return view('pages.news-show', compact('news', 'relatedNews'));
    }

    public function showPromo($slug)
    {
        $promo = Promo::with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedPromos = Promo::with('category')
            ->where('is_active', true)
            ->where('id', '!=', $promo->id)
            ->orderBy('sort_order', 'asc')
            ->take(4)
            ->get();

        return view('pages.promo-show', compact('promo', 'relatedPromos'));
    }
}
