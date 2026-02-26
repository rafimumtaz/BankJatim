@props(['icon'])

<div class="bg-white rounded-2xl shadow-md p-4 flex items-center gap-3 hover:scale-105 transition transform duration-300 cursor-pointer group min-w-[180px]">
    <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center shrink-0 group-hover:bg-red-100">
        {{ $icon }}
    </div>
    <span class="text-xs font-bold text-gray-800 leading-tight text-left">{{ $slot }}</span>
</div>
