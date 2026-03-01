<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Illuminate\Support\Str;

class NewsSection extends Component
{
    public function render()
    {
        $featuredNews = News::with('category')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderBy('published_date', 'desc')
            ->first();

        $newsQuery = News::with('category')
            ->where('is_active', true);

        if ($featuredNews) {
            $newsQuery->where('id', '!=', $featuredNews->id);
        }

        $news = $newsQuery->orderBy('published_date', 'desc')
            ->take(6)
            ->get();

        return view('livewire.news-section', [
            'featuredNews' => $featuredNews,
            'newsItems' => $news,
        ]);
    }
}
