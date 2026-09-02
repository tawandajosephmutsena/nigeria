@php
    $record = method_exists($this, 'getRecord') ? $this->getRecord() : null;
    $recordId = $record ? $record->id : 'home';
    $recordSlug = $record ? $record->slug : 'home';
    $previewUrl = url('/preview-canvas/' . $recordId);
    $liveUrl = url('/' . ($recordSlug === 'home' ? '' : $recordSlug));
@endphp

<div
    x-data="{
        viewMode: 'desktop',
        reloadKey: Date.now()
    }"
    class="flex flex-col rounded-xl overflow-hidden bg-white dark:bg-gray-900 border border-gray-200 dark:border-white/10 shadow-sm relative"
    style="height: calc(100vh - 8rem); position: sticky; top: 5rem;"
>
    {{-- Overlay Top Bar (Absolute so it floats over the content) --}}
    <div class="absolute top-2 inset-x-2 flex items-center justify-center pointer-events-none z-10">
        <div class="inline-flex bg-white/80 dark:bg-gray-950/80 backdrop-blur-md rounded-lg p-1 border border-gray-200 dark:border-gray-800 shadow-md pointer-events-auto">
            <button type="button" @click="viewMode = 'desktop'" :class="{ 'bg-white dark:bg-gray-800 shadow-sm text-gray-900 dark:text-white': viewMode === 'desktop', 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200': viewMode !== 'desktop' }" class="px-3 py-1.5 rounded-md text-xs font-medium transition flex items-center space-x-1.5">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" /></svg>
                <span>Desktop</span>
            </button>
            <button type="button" @click="viewMode = 'tablet'" :class="{ 'bg-white dark:bg-gray-800 shadow-sm text-gray-900 dark:text-white': viewMode === 'tablet', 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200': viewMode !== 'tablet' }" class="px-3 py-1.5 rounded-md text-xs font-medium transition flex items-center space-x-1.5">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                <span>Tablet</span>
            </button>
            <button type="button" @click="viewMode = 'mobile'" :class="{ 'bg-white dark:bg-gray-800 shadow-sm text-gray-900 dark:text-white': viewMode === 'mobile', 'text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200': viewMode !== 'mobile' }" class="px-3 py-1.5 rounded-md text-xs font-medium transition flex items-center space-x-1.5">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" /></svg>
                <span>Mobile</span>
            </button>
        </div>
    </div>
    
    <div class="absolute top-4 right-4 pointer-events-none z-10 flex items-center space-x-2">
         <button type="button" @click="reloadKey = Date.now()" class="p-2 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition pointer-events-auto" title="Reload Preview">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
        </button>
        <a href="{{ $liveUrl }}" target="_blank" class="p-2 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition pointer-events-auto" title="Open in new tab">
            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" /></svg>
        </a>
    </div>

    <div class="absolute top-4 left-4 pointer-events-none z-10">
         <div class="flex items-center space-x-2 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md rounded-lg shadow-sm border border-gray-200 dark:border-gray-800 px-3 py-1.5 pointer-events-auto">
            <span class="relative flex h-2 w-2 shrink-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span class="text-[11px] font-bold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Live Preview</span>
        </div>
    </div>

    {{-- Iframe Canvas --}}
    <div class="flex-1 bg-gray-50/50 dark:bg-gray-950/50 flex justify-center items-start overflow-auto w-full pt-16 pb-4 px-4 h-full">
        <div
            :class="{
                'w-full h-full': viewMode === 'desktop',
                'w-[768px] h-full': viewMode === 'tablet',
                'w-[375px] h-full': viewMode === 'mobile',
            }"
            class="transition-all duration-300 max-w-full h-full"
        >
            <iframe
                :key="reloadKey"
                src="{{ $previewUrl }}?t={{ time() }}"
                class="w-full h-full rounded-xl bg-white shadow-xl border border-gray-200 dark:border-gray-800 ring-1 ring-gray-900/5 dark:ring-white/10"
                style="border: 0;"
            ></iframe>
        </div>
    </div>
</div>
