<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @forelse ($promos as $promo)
        <x-promo-card
            image="{{ asset('storage/' . $promo->image_path) }}"
            title="{{ $promo->title }}"
            period="{{ $promo->period_text ?? 'Berlaku hingga ' . ($promo->end_date ? $promo->end_date->format('d M Y') : 'Waktu tidak ditentukan') }}"
            tag="{{ $promo->category ? $promo->category->name : 'Promo' }}"
        />
    @empty
        <div class="col-span-full text-center text-gray-500 py-8">
            Belum ada promo terbaru.
        </div>
    @endforelse
</div>
