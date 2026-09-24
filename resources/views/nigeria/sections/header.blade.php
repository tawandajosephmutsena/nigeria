{{-- Site Header --}}
<header class="site-header fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm transition-all duration-300" x-data="{ scrolled: false, mobileOpen: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })" :class="{ 'shadow-md': scrolled }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            {{-- Logo --}}
            <div class="flex-shrink-0">
                <a href="/" class="flex items-center">
                    <img src="{{ asset('themes/nigeria/img/logos/logo-nav-horizontal.webp') }}" alt="UNFINISHED" class="h-10 w-auto">
                </a>
            </div>

            {{-- Desktop Nav --}}
            <nav class="hidden lg:flex items-center gap-1">
                @foreach([
                    ['home' => 'Home', 'about' => 'About', 'services' => 'Services', 'causes' => 'Causes', 'gallery' => 'Gallery', 'events' => 'Events', 'blog' => 'News', 'contact' => 'Contact']
                ] as $id => $label)
                <a href="#{{ $id }}" class="px-3 py-2 text-sm font-semibold uppercase tracking-wider text-gray-700 hover:text-[#db0c77] rounded-md hover:bg-pink-50 transition-all duration-200">{{ $label }}</a>
                @endforeach
                <a href="#donate" class="ml-3 px-5 py-2.5 bg-[#db0c77] text-white text-sm font-bold uppercase tracking-wider rounded-md hover:bg-[#b50761] transition-all shadow-md hover:shadow-lg">
                    Donate
                </a>
            </nav>

            {{-- Mobile Toggle --}}
            <button @click="mobileOpen = !mobileOpen" class="lg:hidden p-2 text-gray-700 hover:text-[#db0c77]">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="mobileOpen" x-transition class="lg:hidden pb-4">
            <div class="flex flex-col gap-1 pt-2 border-t border-gray-100">
                @foreach(['home' => 'Home', 'about' => 'About', 'services' => 'Services', 'causes' => 'Causes', 'gallery' => 'Gallery', 'events' => 'Events', 'blog' => 'News', 'contact' => 'Contact'] as $id => $label)
                <a href="#{{ $id }}" @click="mobileOpen = false" class="px-4 py-3 text-sm font-semibold uppercase tracking-wider text-gray-700 hover:text-[#db0c77] hover:bg-pink-50 rounded-md transition-colors">{{ $label }}</a>
                @endforeach
                <a href="#donate" @click="mobileOpen = false" class="mt-2 px-4 py-3 bg-[#db0c77] text-white text-sm font-bold uppercase tracking-wider rounded-md text-center hover:bg-[#b50761] transition-colors">Donate</a>
            </div>
        </div>
    </div>
</header>
