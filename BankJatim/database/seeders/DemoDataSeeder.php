<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Promo;
use App\Models\News;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promoCategory = Category::create([
            'name' => 'General Promo',
            'slug' => 'general-promo',
            'type' => 'promo',
        ]);

        $newsCategory = Category::create([
            'name' => 'General News',
            'slug' => 'general-news',
            'type' => 'news',
        ]);

        // Promos
        for ($i = 1; $i <= 3; $i++) {
            Promo::create([
                'title' => 'Promo ' . $i . ' Spesial',
                'slug' => Str::slug('Promo ' . $i . ' Spesial'),
                'image_path' => null, // Blade templates fall back gracefully to a generic placeholder usually or empty
                'description' => '<p>Description for Promo ' . $i . '</p>',
                'period_text' => '1 Jan - 31 Dec 2024',
                'start_date' => Carbon::now()->subDays(10),
                'end_date' => Carbon::now()->addDays(20),
                'is_active' => true,
                'category_id' => $promoCategory->id,
                'sort_order' => $i,
            ]);
        }

        // Featured News
        News::create([
            'title' => 'Berita Utama Spesial Hari Ini',
            'slug' => Str::slug('Berita Utama Spesial Hari Ini'),
            'image_path' => null,
            'excerpt' => 'Ini adalah kutipan singkat berita utama.',
            'content' => '<p>Konten berita utama yang sangat panjang dan informatif.</p>',
            'published_date' => Carbon::now(),
            'is_featured' => true,
            'is_active' => true,
            'category_id' => $newsCategory->id,
        ]);

        // Regular News
        for ($i = 1; $i <= 4; $i++) {
            News::create([
                'title' => 'Berita Lainnya ' . $i,
                'slug' => Str::slug('Berita Lainnya ' . $i),
                'image_path' => null,
                'excerpt' => 'Kutipan berita ' . $i,
                'content' => '<p>Konten berita ' . $i . '</p>',
                'published_date' => Carbon::now()->subDays($i),
                'is_featured' => false,
                'is_active' => true,
                'category_id' => $newsCategory->id,
            ]);
        }
    }
}
