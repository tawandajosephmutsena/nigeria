{{-- About Section --}}
<section id="about" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        {{-- Section Header --}}
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-gray-900 mb-4 uppercase tracking-wider">About Us</h2>
            <p class="text-gray-500 max-w-2xl mx-auto leading-relaxed">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quaes.</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-start">
            {{-- Accordion --}}
            <div x-data="{ open: 0 }" class="space-y-3">
                @foreach([
                    ['Charity Owner / Founder', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit.'],
                    ['Our Vision & Mission', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.'],
                    ['Who We Are', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.']
                ] as $i => $item)
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="open = open === {{ $i }} ? 0 : {{ $i }}" 
                            class="w-full flex items-center justify-between px-6 py-4 text-left bg-gray-50 hover:bg-gray-100 transition-colors"
                            :class="{ 'bg-green-700 text-white hover:bg-green-800': open === {{ $i }} }">
                        <span class="font-bold uppercase tracking-wider text-sm">{{ $item[0] }}</span>
                        <svg class="w-5 h-5 transition-transform duration-300" :class="{ 'rotate-180': open === {{ $i }} }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open === {{ $i }}" x-transition:enter="transition-all ease-out duration-300" x-transition:enter-start="opacity-0 max-h-0" x-transition:enter-end="opacity-100 max-h-96" x-transition:leave="transition-all ease-in duration-200" x-transition:leave-start="opacity-100 max-h-96" x-transition:leave-end="opacity-0 max-h-0" class="overflow-hidden">
                        <div class="px-6 py-4 text-gray-600 leading-relaxed">{{ $item[1] }}</div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Video --}}
            <div class="rounded-xl overflow-hidden shadow-xl">
                <div class="aspect-video bg-gray-900">
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/C2FFe5FiAqc?modestbranding=1&autohide=1&showinfo=0&controls=0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
