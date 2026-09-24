{{-- Services Section --}}
<section id="services" class="py-24 bg-gray-900">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-white mb-4 uppercase tracking-wider">Services</h2>
            <p class="text-gray-400 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach([
                ['Help Orphanage', 'M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2', 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.'],
                ['Food Supply', 'M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z', 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.'],
                ['Hospital', 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.'],
                ['Free Education', 'M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z', 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.'],
                ['Donate Blood', 'M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z', 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.'],
                ['Provide Shelter', 'M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4', 'Temt perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.'],
            ] as $service)
            <div class="text-center group">
                <div class="w-20 h-20 mx-auto mb-6 bg-[#db0c77]/20 rounded-full flex items-center justify-center group-hover:bg-[#db0c77] transition-all duration-300">
                    <svg class="w-10 h-10 text-[#ff2a9d] group-hover:text-white transition-colors" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $service[1] }}"/></svg>
                </div>
                <h3 class="text-lg font-bold text-white mb-3 uppercase tracking-wider">{{ $service[0] }}</h3>
                <p class="text-gray-400 leading-relaxed mb-4 text-sm">{{ $service[2] }}</p>
                <a href="#" class="inline-flex items-center gap-2 text-[#ff2a9d] hover:text-[#f472b6] font-semibold text-sm uppercase tracking-wider transition-colors">
                    See More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
