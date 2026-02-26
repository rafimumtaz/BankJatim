@props(['icon'])

<div class="bg-white rounded-xl shadow-xl p-4 flex flex-col items-center justify-center text-center h-32 hover:scale-105 transition transform duration-300 cursor-pointer group">
    <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center mb-3 group-hover:bg-red-100">
        {{ $icon }}
    </div>
    <span class="text-xs font-semibold text-gray-700">{{ $slot }}</span>
</div>
