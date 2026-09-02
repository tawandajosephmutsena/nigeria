{{-- Preloader Section --}}
<div id="preloader" class="fixed inset-0 z-[9999] flex items-center justify-center bg-white transition-opacity duration-500" x-data x-init="window.addEventListener('load', () => { setTimeout(() => { $el.classList.add('opacity-0', 'pointer-events-none'); setTimeout(() => $el.remove(), 500); }, 400); })">
    <div class="flex gap-1.5">
        <div class="w-2 h-10 bg-green-700 rounded animate-[preloader_1.2s_ease-in-out_infinite]"></div>
        <div class="w-2 h-10 bg-green-700 rounded animate-[preloader_1.2s_ease-in-out_0.1s_infinite]"></div>
        <div class="w-2 h-10 bg-green-700 rounded animate-[preloader_1.2s_ease-in-out_0.2s_infinite]"></div>
        <div class="w-2 h-10 bg-green-700 rounded animate-[preloader_1.2s_ease-in-out_0.3s_infinite]"></div>
        <div class="w-2 h-10 bg-green-700 rounded animate-[preloader_1.2s_ease-in-out_0.4s_infinite]"></div>
    </div>
</div>
