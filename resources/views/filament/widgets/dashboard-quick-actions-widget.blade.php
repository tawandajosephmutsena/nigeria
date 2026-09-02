<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
            <div>
                <h2 class="text-xl font-black tracking-tight text-gray-900 dark:text-white flex items-center gap-2">
                    <span>⚡</span> Quick Actions & Campaign Shortcut Hub
                </h2>
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                    Fast single-click actions to publish content, review petition signatures, moderate stories, and inspect messages.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2.5">
                <a href="/admin/website/pages/create" class="inline-flex items-center gap-1.5 px-4 py-2 bg-emerald-600 hover:bg-emerald-500 text-white rounded-xl text-xs font-bold transition shadow-sm">
                    📄 Add New Page
                </a>
                <a href="/admin/website/petitions" class="inline-flex items-center gap-1.5 px-4 py-2 bg-rose-600 hover:bg-rose-500 text-white rounded-xl text-xs font-bold transition shadow-sm">
                    ✍️ View Petitions
                </a>
                <a href="/admin/website/messages" class="inline-flex items-center gap-1.5 px-4 py-2 bg-sky-600 hover:bg-sky-500 text-white rounded-xl text-xs font-bold transition shadow-sm">
                    📥 Inbox Messages
                </a>
                <a href="/admin/website/menus" class="inline-flex items-center gap-1.5 px-4 py-2 bg-purple-600 hover:bg-purple-500 text-white rounded-xl text-xs font-bold transition shadow-sm">
                    🍔 Edit Menus
                </a>
                <a href="/" target="_blank" class="inline-flex items-center gap-1.5 px-4 py-2 bg-gray-800 hover:bg-gray-700 text-gray-100 rounded-xl text-xs font-bold transition shadow-sm">
                    🌐 Open Website ↗
                </a>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
