<x-layouts.landing>
    <div class="bg-gray-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumbs -->
            <nav class="flex text-sm text-gray-500 mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="hover:text-[#A3091B] transition-colors">Home</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 md:ml-2">Promo</span>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-gray-800 font-medium md:ml-2 line-clamp-1">{{ $promo->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-8 bg-white p-6 md:p-10 rounded-3xl shadow-sm border border-gray-100">
                    <div class="flex items-center text-sm text-gray-500 mb-4 space-x-2">
                        <span class="bg-[#D2131C] text-white text-xs font-bold px-3 py-1.5 rounded-md uppercase tracking-wider">{{ $promo->category ? $promo->category->name : 'Promo' }}</span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-6 leading-tight">
                        {{ $promo->title }}
                    </h1>

                    <div class="flex items-center text-sm text-gray-600 mb-8 bg-gray-50 inline-flex px-4 py-2 rounded-lg border border-gray-200">
                        <svg class="w-4 h-4 mr-2 text-[#A3091B]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span class="font-medium">{{ $promo->period_text ?? 'Berlaku hingga ' . ($promo->end_date ? $promo->end_date->format('d M Y') : 'Waktu tidak ditentukan') }}</span>
                    </div>

                    <div class="rounded-2xl overflow-hidden mb-10 shadow-md">
                        <img src="{{ asset('storage/' . $promo->image_path) }}" alt="{{ $promo->title }}" class="w-full h-auto object-cover max-h-[500px]">
                    </div>

                    <!-- Text Content -->
                    <div class="prose prose-lg max-w-none text-gray-700
                        prose-headings:font-bold prose-headings:text-gray-900
                        prose-a:text-[#A3091B] hover:prose-a:text-[#D2131C]
                        prose-img:rounded-xl whitespace-pre-wrap">
                        {!! nl2br(e($promo->description)) !!}
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-4 space-y-8">
                    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 sticky top-24">
                        <h3 class="text-xl font-extrabold text-gray-900 mb-6 border-b pb-4">Promo Lainnya</h3>
                        <div class="flex flex-col space-y-4">
                            @forelse($relatedPromos as $related)
                                <a href="{{ route('promo.show', $related->slug) }}" class="group flex flex-col sm:flex-row lg:flex-col xl:flex-row items-start gap-4 p-2 -mx-2 rounded-xl hover:bg-gray-50 transition-colors">
                                    <div class="relative overflow-hidden w-24 h-20 rounded-lg shrink-0 w-full sm:w-24 lg:w-full xl:w-24">
                                        <img src="{{ asset('storage/' . $related->image_path) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                    </div>
                                    <div class="flex flex-col justify-center flex-grow pt-1">
                                        <div class="text-[10px] text-[#A3091B] mb-1 font-bold uppercase tracking-wider">
                                            {{ $related->category ? $related->category->name : 'Promo' }}
                                        </div>
                                        <h4 class="text-sm font-bold text-gray-800 leading-snug group-hover:text-[#A3091B] transition-colors line-clamp-2">
                                            {{ $related->title }}
                                        </h4>
                                    </div>
                                </a>
                            @empty
                                <p class="text-gray-500 text-sm text-center py-4">Tidak ada promo lainnya.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.landing>