@php
    $record = isset($record) ? $record : (method_exists($this, 'getRecord') ? $this->getRecord() : null);
    $recordId = $record ? $record->id : 'home';
    $recordSlug = $record ? $record->slug : 'home';
    $previewEndpoint = url('/preview-canvas/' . $recordId);
    $livePublicUrl = url('/' . ($recordSlug === 'home' ? '' : $recordSlug));
@endphp

<div x-data="{
    viewMode: 'desktop',
    reloadKey: Date.now()
}" class="w-full h-full flex flex-col rounded-2xl overflow-hidden border border-gray-800 bg-gray-950 shadow-2xl transition-all duration-300">

    {{-- Compact Top Toolbar --}}
    <div class="flex items-center justify-between px-3.5 py-2 bg-gray-900 border-b border-gray-800 text-white text-xs gap-2 shrink-0">
        <div class="flex items-center space-x-2 min-w-0">
            <span class="relative flex h-2.5 w-2.5 shrink-0">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-emerald-500"></span>
            </span>
            <span class="font-black uppercase tracking-wider text-emerald-400 text-[11px] shrink-0">Elementor Canvas</span>
            <span class="text-gray-400 font-mono text-[10px] truncate max-w-[180px] hidden sm:inline">{{ $livePublicUrl }}</span>
        </div>

        {{-- Compact Action Buttons --}}
        <div class="flex items-center space-x-1.5 shrink-0">
            {{-- Segmented Device Switcher --}}
            <div class="inline-flex bg-gray-950 rounded-lg p-0.5 border border-gray-800">
                <button type="button" @click="viewMode = 'desktop'" :class="{ 'bg-emerald-600 text-white font-bold': viewMode === 'desktop', 'text-gray-400 hover:text-white': viewMode !== 'desktop' }" class="px-2 py-1 rounded text-[11px] transition">
                    💻 Desktop
                </button>
                <button type="button" @click="viewMode = 'tablet'" :class="{ 'bg-emerald-600 text-white font-bold': viewMode === 'tablet', 'text-gray-400 hover:text-white': viewMode !== 'tablet' }" class="px-2 py-1 rounded text-[11px] transition">
                    📱 Tablet
                </button>
                <button type="button" @click="viewMode = 'mobile'" :class="{ 'bg-emerald-600 text-white font-bold': viewMode === 'mobile', 'text-gray-400 hover:text-white': viewMode !== 'mobile' }" class="px-2 py-1 rounded text-[11px] transition">
                    📲 Mobile
                </button>
            </div>

            {{-- Sync Canvas --}}
            <button type="button" @click="reloadKey = Date.now()" class="px-2.5 py-1 bg-emerald-700 hover:bg-emerald-600 text-white rounded-lg font-bold transition text-[11px] flex items-center gap-1">
                🔄 Sync
            </button>

            {{-- Live Site --}}
            <a href="{{ $livePublicUrl }}" target="_blank" class="px-2.5 py-1 bg-gray-800 hover:bg-gray-700 text-gray-200 rounded-lg font-medium transition text-[11px] flex items-center gap-1 border border-gray-700">
                ↗ Site
            </a>
        </div>
    </div>

    {{-- Canvas Display Area (Fills space, independent scroll inside iframe) --}}
    <div class="flex-1 w-full bg-gray-950 flex flex-col justify-start items-center p-2.5 overflow-hidden" style="height: calc(100vh - 120px);">
        <div :class="{
            'w-full h-full min-w-full': viewMode === 'desktop',
            'w-[768px] h-full': viewMode === 'tablet',
            'w-[375px] h-full': viewMode === 'mobile'
        }" class="transition-all duration-300 flex flex-col items-center justify-center">
            
            <iframe
                :key="reloadKey"
                src="{{ $previewEndpoint }}?t={{ time() }}"
                class="w-full h-full rounded-xl bg-white border border-gray-800 block shadow-2xl"
                style="width: 100%; height: 100%; border: 0;"
            ></iframe>
        </div>
    </div>
</div>
