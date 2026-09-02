{{-- Causes Section --}}
<section id="causes" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-wider">Causes</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['Provide Education For Child', 5000, 7000, 80],
                ['Help For Medical & Health', 5000, 8000, 75],
                ['Clothing & Land Provide', 38000, 50000, 70],
            ] as $cause)
            <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-all duration-300 group">
                <div class="h-48 bg-green-100 flex items-center justify-center">
                    <svg class="w-16 h-16 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.438 60.438 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342"/></svg>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-3 uppercase tracking-wider">{{ $cause[0] }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores.</p>

                    {{-- Progress --}}
                    <div class="mb-4">
                        <div class="flex justify-between text-xs font-bold text-gray-500 uppercase mb-2">
                            <span>Raised</span>
                            <span>Target</span>
                        </div>
                        <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-green-600 rounded-full transition-all duration-1000" style="width: {{ $cause[3] }}%"></div>
                        </div>
                        <div class="flex justify-between text-sm font-bold mt-2">
                            <span class="text-green-700">${{ number_format($cause[1]) }}</span>
                            <span class="text-gray-400">${{ number_format($cause[2]) }}</span>
                        </div>
                    </div>

                    <a href="#" class="inline-block w-full text-center py-3 bg-green-700 hover:bg-green-800 text-white font-bold uppercase tracking-wider text-sm rounded-md transition-colors">
                        Donate Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
