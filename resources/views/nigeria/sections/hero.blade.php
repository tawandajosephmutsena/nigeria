{{-- Hero Section --}}
<section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background Images --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-gradient-to-r from-green-900/90 via-green-800/80 to-green-900/90 z-10"></div>
        <div class="hero-slider absolute inset-0" x-data="{ slides: ['img/hero-bg-1.jpg', 'img/hero-bg-2.jpg'], current: 0 }" x-init="setInterval(() => { current = (current + 1) % slides.length }, 5000)">
            <template x-for="(slide, i) in slides" :key="i">
                <div class="absolute inset-0 bg-cover bg-center transition-opacity duration-1000" 
                     :style="`background-image: url(${slide}); opacity: ${i === current ? 1 : 0}`"></div>
            </template>
        </div>
        {{-- Fallback bg --}}
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/hero-bg.jpg') }}'); opacity: 0.3;"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-20 text-center px-4 max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-4 tracking-tight">
            HUMANITY <span class="text-green-400">·</span> INTEGRITY <span class="text-green-400">·</span> HONESTY
        </h1>
        <p class="text-lg md:text-xl text-green-200 font-semibold uppercase tracking-[0.3em] mb-3">Nigeria Community Foundation</p>
        <p class="text-base md:text-lg text-gray-200/90 max-w-2xl mx-auto mb-10 leading-relaxed">
            Donate and help us for homeless people. We are an organization that helps children and communities across Nigeria.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#donate" class="px-10 py-4 bg-green-600 hover:bg-green-700 text-white font-bold uppercase tracking-wider rounded-md text-sm transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                Donate Now
            </a>
            <a href="#about" class="px-10 py-4 border-2 border-white/80 text-white hover:bg-white hover:text-green-800 font-bold uppercase tracking-wider rounded-md text-sm transition-all">
                Learn More
            </a>
        </div>
    </div>
</section>
