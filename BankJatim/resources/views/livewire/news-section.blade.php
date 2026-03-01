<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Large Feature (Left) -->
    <div class="lg:col-span-5 h-full">
        @if ($featuredNews)
            <x-news-card-large
                image="{{ asset('storage/' . $featuredNews->image_path) }}"
                date="{{ $featuredNews->published_date->format('d M Y') }}"
                category="{{ $featuredNews->category ? $featuredNews->category->name : 'Berita' }}"
                title="{{ $featuredNews->title }}"
                excerpt="{{ $featuredNews->excerpt ?? Str::limit(strip_tags($featuredNews->content), 150) }}"
            />
        @else
            <div class="h-full bg-gray-100 rounded-3xl flex items-center justify-center p-8 text-center min-h-[400px]">
                <p class="text-gray-500">Belum ada berita utama yang disorot.</p>
            </div>
        @endif
    </div>

    <!-- Small Grid (Right) -->
    <div class="lg:col-span-7 grid grid-cols-1 sm:grid-cols-2 gap-6 content-start">
        @forelse ($newsItems as $news)
            <x-news-card-small
                image="{{ asset('storage/' . $news->image_path) }}"
                date="{{ $news->published_date->format('d M Y') }}"
                category="{{ $news->category ? $news->category->name : 'Info' }}"
                title="{{ $news->title }}"
            />
        @empty
            <div class="col-span-full text-center text-gray-500 py-8">
                Belum ada berita lainnya.
            </div>
        @endforelse
    </div>
</div>
