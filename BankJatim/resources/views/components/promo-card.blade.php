@props(['image', 'title', 'period', 'tag' => 'Promo'])

<div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden cursor-pointer border border-gray-100 flex flex-col h-full">
    <!-- Image Container -->
    <div class="relative overflow-hidden aspect-[4/3]">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
        <div class="absolute top-3 left-3 bg-[#D2131C] text-white text-xs font-bold px-2 py-1 rounded">
            {{ $tag }}
        </div>
    </div>

    <!-- Content -->
    <div class="p-4 flex flex-col flex-grow">
        <div class="flex items-center text-xs text-gray-500 mb-2">
            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            {{ $period }}
        </div>
        <h3 class="text-base font-bold text-gray-800 mb-2 line-clamp-2 group-hover:text-[#A3091B] transition-colors">
            {{ $title }}
        </h3>
        <div class="mt-auto pt-3 flex items-center text-[#A3091B] text-sm font-semibold">
            Lihat Detail
            <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </div>
    </div>
</div>
