{{-- Gallery Section --}}
<section id="gallery" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-wider">Gallery</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
            @for($i = 1; $i <= 6; $i++)
            <div class="group relative overflow-hidden rounded-lg aspect-square cursor-pointer">
                <div class="absolute inset-0 bg-orange-900/0 group-hover:bg-orange-900/60 transition-all duration-300 z-10 flex items-center justify-center">
                    <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-all duration-300 scale-50 group-hover:scale-100" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                </div>
                <div class="w-full h-full bg-gradient-to-br from-pink-200 to-[#ff2a9d] flex items-center justify-center">
                    <span class="text-[#b50761]/30 text-6xl font-black">0{{ $i }}</span>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
