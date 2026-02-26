<x-layouts.landing>
    <div class="relative bg-white overflow-hidden">
        <!-- Custom Hero Section with Carousel -->
        <div x-data='{
            activeSlide: 0,
            slides: @json($slides),
            next() { this.activeSlide = (this.activeSlide + 1) % this.slides.length },
            prev() { this.activeSlide = (this.activeSlide - 1 + this.slides.length) % this.slides.length },
            timer: null,
            startAutoPlay() { if(this.slides.length > 1) this.timer = setInterval(() => this.next(), 5000) },
            stopAutoPlay() { clearInterval(this.timer) }
        }' x-init="startAutoPlay()" @mouseenter="stopAutoPlay()" @mouseleave="startAutoPlay()"
           class="relative h-[600px] w-full bg-gray-50">

            <!-- Loop through slides -->
            <template x-for="(slide, index) in slides" :key="slide.id">
                <div x-show="activeSlide === index"
                     x-transition:enter="transition ease-out duration-700"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-700"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute inset-0 w-full h-full">

                    <!-- Background Image (Right Side) -->
                    <div class="absolute inset-0">
                        <img class="w-full h-full object-cover object-right" :src="'/storage/' + slide.image_path" :alt="slide.title">
                        <div class="absolute inset-0 bg-gray-500 mix-blend-multiply opacity-10 lg:hidden"></div>
                    </div>

                    <!-- Red Shape (Left Side) -->
                    <div class="absolute inset-y-0 left-0 w-full lg:w-[65%] bg-[#A3091B]" style="clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);">
                        <div class="flex flex-col justify-center h-full px-4 sm:px-6 lg:px-8 max-w-3xl ml-auto lg:mr-20">
                            <p class="text-sm font-semibold text-white/80 tracking-wide uppercase mb-2">Selamat datang di Bank Jatim</p>
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6" x-text="slide.title"></h1>
                            <p class="text-lg text-white/90 mb-8 max-w-lg" x-text="slide.description"></p>
                            <div x-show="slide.link_url">
                                <a :href="slide.link_url" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-[#A3091B] bg-white hover:bg-gray-100 md:py-4 md:text-lg shadow-lg transition duration-150 ease-in-out">
                                    Pelajari Lebih Lanjut
                                </a>
                            </div>

                            <!-- Pagination Dots -->
                            <div class="flex space-x-2 mt-12 pointer-events-auto">
                                <template x-for="(s, i) in slides" :key="i">
                                    <button @click="activeSlide = i"
                                            type="button"
                                            class="block h-2 rounded-full transition-all duration-300 focus:outline-none"
                                            :class="activeSlide === i ? 'w-8 bg-white' : 'w-2 bg-white/50'">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

             <!-- Fallback if no slides -->
            <div x-show="slides.length === 0" class="absolute inset-0 flex items-center justify-center bg-gray-100">
                <div class="text-center">
                    <p class="text-gray-500 mb-4">No slides configured.</p>
                    <a href="/admin/carousel-slides/create" class="text-[#A3091B] hover:underline font-semibold">Add Slides in Admin Panel</a>
                </div>
            </div>
        </div>

        <!-- Floating Cards Section -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20 z-20 pb-10">
            <div class="flex flex-wrap lg:flex-nowrap items-center gap-6">
                <!-- Buka Tabungan -->
                <x-dashboard-card>
                    <x-slot name="icon">
                        <svg class="w-5 h-5 text-[#D2131C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </x-slot>
                    Buka Tabungan
                </x-dashboard-card>

                <!-- Simulasi KPR -->
                <x-dashboard-card>
                    <x-slot name="icon">
                        <svg class="w-5 h-5 text-[#D2131C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </x-slot>
                    Simulasi KPR
                </x-dashboard-card>

                <!-- Ajukan Kredit UMKM -->
                <x-dashboard-card>
                    <x-slot name="icon">
                        <svg class="w-5 h-5 text-[#D2131C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </x-slot>
                    Ajukan<br>Kredit UMKM
                </x-dashboard-card>

                <!-- Kurs & Suku Bunga -->
                <x-dashboard-card>
                    <x-slot name="icon">
                        <svg class="w-5 h-5 text-[#D2131C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </x-slot>
                    Kurs &<br>Suku Bunga
                </x-dashboard-card>

                <!-- Lokasi & Cabang -->
                <x-dashboard-card>
                    <x-slot name="icon">
                        <svg class="w-5 h-5 text-[#D2131C]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </x-slot>
                    Lokasi<br>& Cabang
                </x-dashboard-card>

                <!-- Call Center Button -->
                <div class="ml-auto">
                    <div class="bg-white rounded-full shadow-lg h-14 w-14 flex items-center justify-center hover:scale-110 transition transform duration-300 cursor-pointer">
                        <svg class="w-6 h-6 text-[#A3091B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.landing>
