{{-- Events Section --}}
<section id="events" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-wider">Our Events</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            @foreach([
                ['Build School For Children', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Dec 11, 2024', 'Lagos, Nigeria'],
                ['Awareness For Health Care', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Jan 15, 2025', 'Abuja, Nigeria'],
            ] as $event)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col sm:flex-row">
                <div class="sm:w-2/5 h-48 sm:h-auto bg-gradient-to-br from-green-300 to-green-600 flex items-center justify-center">
                    <svg class="w-12 h-12 text-white/70" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <div class="sm:w-3/5 p-6 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wider">{{ $event[0] }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-4">{{ $event[1] }}</p>
                        <div class="flex flex-wrap gap-4 text-sm text-gray-400 font-medium mb-4">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $event[2] }}
                            </span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $event[3] }}
                            </span>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="#" class="px-5 py-2.5 bg-green-700 hover:bg-green-800 text-white font-bold uppercase tracking-wider text-xs rounded-md transition-colors">Join Now</a>
                        <a href="#" class="px-5 py-2.5 border-2 border-green-700 text-green-700 hover:bg-green-50 font-bold uppercase tracking-wider text-xs rounded-md transition-colors">Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
