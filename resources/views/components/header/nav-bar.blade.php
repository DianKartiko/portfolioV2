<header x-data="{ open: false }" @click.outside="open = false" class="fixed w-full top-0 bg-zinc-50/80 dark:bg-zinc-950/80 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-900 transition-colors duration-300 z-50">
    <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8">
        
        <!-- Bagian Logo Baru (Slanted D) -->
        <div class="flex lg:flex-1">
            <a href="{{ Route::has('home') ? route('home') : '/' }}" class="-m-1.5 p-1.5 flex items-center gap-3 transition-transform  active:scale-95 group">
                <span class="sr-only">Denis Portfolio</span>
                
                <!-- Logo SVG -->
                <svg viewBox="0 0 80 50" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-8 w-auto group-hover:drop-shadow-md transition-all duration-300">
                    <g transform="skewX(-15) translate(14, 0)">
                        <!-- Tiang Kiri Pertama -->
                        <rect x="0" y="5" width="12" height="40" rx="6" class="fill-teal-600 dark:fill-teal-400 transition-colors duration-300" />
                        <!-- Tiang Kiri Kedua (Utama D) -->
                        <rect x="16" y="5" width="12" height="40" rx="6" class="fill-teal-600 dark:fill-teal-400 transition-colors duration-300" />
                        <!-- Lengkungan Kanan Transparan -->
                        <path d="M 22 5 h 16 a 20 20 0 0 1 20 20 a 20 20 0 0 1 -20 20 h -16 v -12 h 16 a 8 8 0 0 0 8 -8 a 8 8 0 0 0 -8 -8 h -16 v -12 z" class="fill-teal-600/30 dark:fill-teal-400/30 transition-colors duration-300" />
                    </g>
                </svg>
                
                <!-- Nama Brand -->
                <span class="font-bold text-zinc-900 dark:text-zinc-100 text-xl tracking-tight transition-colors duration-300">Dian</span>
            </a>
        </div>

        <!-- Tombol Hamburger Mobile -->
        <div class="flex lg:hidden">
            <button @click="open = !open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-zinc-500 hover:text-zinc-900 dark:hover:text-white transition-colors">
                <span class="sr-only">Buka menu utama</span>
                <svg x-show="!open" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-show="open" x-cloak class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Menu Navigasi Desktop -->
        <div class="hidden lg:flex lg:gap-x-8">
            @foreach($navigation as $item)
                @php
                    $url = $item['url'] ?? (isset($item['route']) && Route::has($item['route']) ? route($item['route']) : '#');
                    $isActive = $item['active'] ?? (isset($item['route']) ? request()->routeIs($item['route']) : false);
                @endphp
                <a href="{{ $url }}" 
                   class="px-3 py-2 rounded-md text-sm font-semibold transition-all duration-200 {{ $isActive ? 'text-teal-600 dark:text-teal-400 bg-teal-600/10 dark:bg-teal-400/10' : 'text-zinc-900 dark:text-zinc-100 hover:bg-zinc-200/50 dark:hover:bg-zinc-800/50 hover:text-teal-600 dark:hover:text-teal-400' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <!-- Right Side: Simple Theme Switcher (Desktop) -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:items-center">
            <button 
                @click="$store.theme.toggle()" 
                class="p-2 text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white transition-all duration-200 focus:outline-none hover:scale-110 active:scale-95"
                title="Ganti Tema"
            >
                <div class="relative size-5">
                    <svg x-show="!$store.theme.isDark" class="absolute inset-0 size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <svg x-show="$store.theme.isDark" x-cloak class="absolute inset-0 size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                </div>
            </button>
        </div>
    </nav>

    <!-- MOBILE DROPDOWN MENU -->
    <div
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="absolute top-full left-0 w-full lg:hidden bg-zinc-50/90 dark:bg-zinc-950/90 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-900 shadow-xl"
    >
        <div class="px-6 py-6 space-y-2">
            @foreach($navigation as $item)
                @php
                    $url = $item['url'] ?? (isset($item['route']) && Route::has($item['route']) ? route($item['route']) : '#');
                    $isActive = $item['active'] ?? (isset($item['route']) ? request()->routeIs($item['route']) : false);
                @endphp
                <a href="{{ $url }}" 
                   @click="open = false"
                   class="block rounded-lg px-3 py-2 text-base font-semibold transition-colors {{ $isActive ? 'text-teal-600 dark:text-teal-400 bg-teal-600/10 dark:bg-teal-400/10' : 'text-zinc-900 dark:text-zinc-100 hover:bg-zinc-200/50 dark:hover:bg-zinc-800/50' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach

            <!-- Mobile Theme Switcher -->
            <div class="mt-4 pt-4 border-t border-zinc-200 dark:border-zinc-800 flex items-center justify-between">
                <span class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Mode Tampilan</span>
                <button 
                    @click="$store.theme.toggle()" 
                    class="flex items-center gap-2 px-4 py-2 rounded-xl bg-zinc-200/80 dark:bg-zinc-800/80 hover:bg-zinc-300/80 dark:hover:bg-zinc-700/80 active:scale-95 text-zinc-700 dark:text-zinc-200 text-sm font-bold transition-all"
                >
                    <span x-show="!$store.theme.isDark">Gelap</span>
                    <span x-show="$store.theme.isDark" x-cloak>Terang</span>
                    <div class="size-4">
                        <svg x-show="!$store.theme.isDark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" stroke-width="2"/></svg>
                        <svg x-show="$store.theme.isDark" x-cloak fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" stroke-width="2"/></svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</header>