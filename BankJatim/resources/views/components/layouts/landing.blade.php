<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Bank Jatim') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] { display: none !important; }
    </style>
    @livewireStyles
    @filamentStyles
</head>
<body class="antialiased text-gray-800 bg-white">
    <!-- Top Bar -->
    <div class="bg-[#A3091B] text-white text-xs py-2 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            <span>Download JConnect App</span>
        </div>
        <div class="flex items-center space-x-6">
            <a href="#" class="hover:underline">Karir</a>
            <a href="#" class="flex items-center hover:underline">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                Kalkulator
            </a>
            <a href="#" class="flex items-center hover:underline">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Bantuan
            </a>
            <div class="flex items-center bg-[#8B0816] rounded-full px-1 py-0.5">
                <span class="bg-white text-[#A3091B] rounded-full px-1.5 text-[10px] font-bold cursor-pointer">ID</span>
                <span class="text-white/80 px-1.5 text-[10px] cursor-pointer">EN</span>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-[#D2131C]">bank<span class="text-[#A3091B]">jatim</span></span>
                </div>

                <!-- Menu -->
                <nav class="hidden md:flex space-x-6 text-sm font-medium text-gray-700">
                    <div class="group relative cursor-pointer">
                        <span class="flex items-center hover:text-[#D2131C]">Individu <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                    </div>
                    <div class="group relative cursor-pointer">
                        <span class="flex items-center hover:text-[#D2131C]">Bisnis <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                    </div>
                    <div class="group relative cursor-pointer">
                        <span class="flex items-center hover:text-[#D2131C]">Syariah <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                    </div>
                    <div class="group relative cursor-pointer">
                        <span class="flex items-center hover:text-[#D2131C]">Promo & Media <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                    </div>
                    <div class="group relative cursor-pointer">
                        <span class="flex items-center hover:text-[#D2131C]">Layanan Bank <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                    </div>
                    <div class="group relative cursor-pointer">
                        <span class="flex items-center hover:text-[#D2131C]">Tentang Kami <svg class="w-4 h-4 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></span>
                    </div>
                </nav>

                <!-- Right Actions -->
                <div class="flex items-center space-x-4">
                    <button class="text-[#D2131C] hover:text-[#A3091B]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                    <a href="#" class="bg-[#A3091B] hover:bg-[#8B0816] text-white px-5 py-2.5 rounded-full text-sm font-semibold flex items-center shadow-lg transform transition hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Internet Banking
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    @livewireScripts
    @filamentScripts
</body>
</html>
