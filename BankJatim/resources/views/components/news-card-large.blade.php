@props(['image', 'date', 'category', 'title', 'excerpt', 'link' => '#'])

<a href="{{ $link }}" class="bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden h-full flex flex-col group cursor-pointer border border-gray-100 block">
    <div class="relative overflow-hidden aspect-[16/10]">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
    </div>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex items-center text-xs text-gray-500 mb-3 space-x-2">
            <span>{{ $date }}</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span class="text-[#D2131C] font-semibold uppercase tracking-wide">{{ $category }}</span>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-[#A3091B] transition-colors line-clamp-3">
            {{ $title }}
        </h3>
        <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
            {{ $excerpt }}
        </p>
        <div class="mt-2 text-[#A3091B] text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Baca Selengkapnya
        </div>
    </div>
</a>
