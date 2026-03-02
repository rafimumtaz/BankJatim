@props(['image', 'date', 'category', 'title', 'link' => '#'])

<a href="{{ $link }}" class="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden cursor-pointer border border-gray-100 flex items-center p-3 gap-4 group h-full block">
    <div class="relative overflow-hidden w-24 h-24 rounded-lg shrink-0 aspect-square">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
    </div>
    <div class="flex flex-col h-full justify-between py-1 flex-grow">
        <div class="flex items-center text-[10px] text-gray-500 mb-1 space-x-1">
            <span>{{ $date }}</span>
            <span class="w-0.5 h-0.5 bg-gray-300 rounded-full"></span>
            <span class="text-[#D2131C] font-semibold uppercase tracking-wide">{{ $category }}</span>
        </div>
        <h4 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-[#A3091B] transition-colors line-clamp-3">
            {{ $title }}
        </h4>
        <div class="mt-2 text-[#A3091B] text-xs font-semibold opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            Baca Selengkapnya
        </div>
    </div>
</a>
