{{-- Clients Section --}}
<section id="clients" class="py-16 bg-white border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-wrap justify-center items-center gap-12 grayscale opacity-60 hover:grayscale-0 hover:opacity-100 transition-all duration-500">
            @for($i = 1; $i <= 4; $i++)
            <div class="h-12 w-32 bg-gray-200 rounded flex items-center justify-center text-gray-400 font-bold text-xs uppercase tracking-widest">
                Client {{ $i }}
            </div>
            @endfor
        </div>
    </div>
</section>
