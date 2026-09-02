{{-- Blog / News Section --}}
<section id="blog" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-wider">Our News</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            @foreach([
                ['Save Life For Poor Children', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.', '10 Jan 2024', 'Admin'],
                ['We Build School & Hospital', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. Sed ut perspiciatis unde omnis iste natus error sit voluptatem.', '1 Jan 2024', 'Admin'],
            ] as $post)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
                <a href="#" class="block h-56 bg-gradient-to-br from-green-200 to-green-400 relative overflow-hidden">
                    <div class="absolute inset-0 bg-green-900/0 group-hover:bg-green-900/40 transition-colors duration-300"></div>
                    <div class="absolute top-4 right-4 bg-green-700 text-white px-3 py-1.5 rounded-md text-xs font-bold uppercase tracking-wider z-10">
                        {{ $post[2] }}
                    </div>
                </a>
                <div class="p-6">
                    <div class="flex items-center gap-3 text-xs text-gray-400 font-medium mb-3">
                        <span class="inline-flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            {{ $post[3] }}
                        </span>
                        <span>{{ $post[2] }}</span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wider group-hover:text-green-700 transition-colors">{{ $post[0] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $post[1] }}</p>
                    <a href="#" class="inline-flex items-center gap-2 text-green-700 hover:text-green-800 font-bold uppercase tracking-wider text-xs transition-colors">
                        Read More <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
