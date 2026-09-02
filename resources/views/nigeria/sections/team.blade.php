{{-- Team Section --}}
<section id="team" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-wider">Our Team</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['Bony Smith', 'Founder & CEO'],
                ['Jhon Doe', 'Program Director'],
                ['Leonel Mike', 'Volunteer Lead'],
                ['Jacky Lalin', 'Community Manager'],
            ] as $member)
            <div class="group text-center">
                <div class="relative mb-5 overflow-hidden rounded-xl aspect-[3/4]">
                    <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent to-transparent z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="w-full h-full bg-gradient-to-br from-green-200 to-green-500 flex items-center justify-center">
                        <span class="text-green-800/30 text-7xl font-black">{{ substr($member[0], 0, 1) }}</span>
                    </div>
                    {{-- Social Links on Hover --}}
                    <div class="absolute bottom-4 left-4 right-4 z-20 flex justify-center gap-3 opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        <a href="#" class="w-9 h-9 bg-white/90 rounded-full flex items-center justify-center text-green-700 hover:bg-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-white/90 rounded-full flex items-center justify-center text-green-700 hover:bg-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                        </a>
                        <a href="#" class="w-9 h-9 bg-white/90 rounded-full flex items-center justify-center text-green-700 hover:bg-white transition-colors">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm4.441 16.892c-2.102.144-6.784.144-8.883 0C5.282 16.736 5.017 15.622 5 12c.017-3.629.285-4.736 2.558-4.892 2.099-.144 6.782-.144 8.883 0C18.718 7.264 18.982 8.378 19 12c-.018 3.629-.285 4.736-2.559 4.892zM10 9.658l4.917 2.338L10 14.342V9.658z"/></svg>
                        </a>
                    </div>
                </div>
                <h3 class="text-lg font-bold text-gray-900 uppercase tracking-wider">{{ $member[0] }}</h3>
                <p class="text-green-700 font-medium text-sm">{{ $member[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
