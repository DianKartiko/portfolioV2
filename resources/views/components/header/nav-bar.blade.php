<header x-data="{ open: false }" @click.outside="open = false" class="fixed w-full top-0 bg-zinc-50/80 dark:bg-zinc-950/80 backdrop-blur-md border-b border-zinc-200 dark:border-zinc-900 transition-colors duration-300 z-50">
    <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-4 lg:px-8">
        
        <!-- Bagian Logo Profil & Nama Brand -->
        <div class="flex lg:flex-1">
            <a href="{{ Route::has('home') ? route('home') : '/' }}" class="-m-1.5 p-1.5 flex items-center gap-3 transition-transform hover:scale-105 active:scale-95 group">
                <span class="sr-only">Denis Portfolio</span>
                
                <!-- Image Profil dengan Animasi Ring (Instagram Style) -->
                <div class="relative w-10 h-10 flex items-center justify-center rounded-full shadow-sm">
                    
                    <!-- Celah/Gap (Berubah warna mengikuti tema Terang/Gelap) -->
                    <div class="absolute inset-[2px] rounded-full bg-zinc-50 dark:bg-zinc-950 transition-colors duration-300"></div>
                    
                    <!-- Foto Profil (Lingkaran Sempurna) -->
                    <img 
                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=64&q=80" 
                        alt="Denis Profile" 
                        class="relative z-10 w-[calc(100%-6px)] h-[calc(100%-6px)] rounded-full object-cover"
                    >
                </div>
                
                <!-- Nama Brand -->
                <span class="font-semibold text-zinc-900 dark:text-zinc-100 text-lg tracking-tight transition-colors duration-300">Dian</span>
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

        <!-- Menu Navigasi Desktop & Theme Switcher (Rata Kanan) -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:items-center lg:gap-x-8">
            <!-- Nav Items -->
            <div class="flex gap-x-10">
                @foreach($navigation as $item)
                    @php
                        $url = $item['url'] ?? (isset($item['route']) && Route::has($item['route']) ? route($item['route']) : '#');
                        $isActive = $item['active'] ?? (isset($item['route']) ? request()->routeIs($item['route']) : false);
                    @endphp
                    <a href="{{ $url }}" 
                       class="relative py-1 text-sm font-semibold transition-colors duration-150 
                              after:content-[''] after:absolute after:left-0 after:-bottom-1 after:h-[2px] after:w-full after:origin-left after:transition-transform after:duration-150 after:ease-out after:bg-teal-600 dark:after:bg-teal-400 
                              {{ $isActive ? 'text-zinc-900 dark:text-zinc-100 after:scale-x-100' : 'text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 after:scale-x-0 hover:after:scale-x-100' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>

            <!-- Separator Vertikal (Opsional, agar terlihat lebih rapi antara menu dan tombol tema) -->
            <div class="w-px h-6 bg-zinc-200 dark:bg-zinc-800"></div>

            <!-- Theme Switcher -->
            <button 
                @click="$store.theme.toggle()" 
                class="p-2 text-zinc-500 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white transition-all duration-200 focus:outline-none hover:scale-110 active:scale-95"
                title="Ganti Tema"
            >
                <div class="relative size-5 flex items-center justify-center">
                    <svg x-show="!$store.theme.isDark" class="absolute inset-0 size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <!-- Menggunakan Ikon FontAwesome Baru untuk Dark Mode -->
                    <i x-show="$store.theme.isDark" x-cloak class="fa-solid fa-moon-first-quarter text-[18px]"></i>
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
                   class="group block rounded-lg px-3 py-2 transition-colors duration-150 {{ $isActive ? 'bg-zinc-100/50 dark:bg-zinc-800/50' : 'hover:bg-zinc-100/50 dark:hover:bg-zinc-800/50' }}">
                    <span class="relative inline-block text-base font-semibold transition-colors duration-150 
                                 after:content-[''] after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-full after:origin-left after:transition-transform after:duration-150 after:ease-out after:bg-teal-600 dark:after:bg-teal-400 
                                 {{ $isActive ? 'text-zinc-900 dark:text-zinc-100 after:scale-x-100' : 'text-zinc-500 dark:text-zinc-400 group-hover:text-zinc-900 dark:group-hover:text-zinc-100 after:scale-x-0 group-hover:after:scale-x-100' }}">
                        {{ $item['label'] }}
                    </span>
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
                    <div class="size-4 flex items-center justify-center">
                        <svg x-show="!$store.theme.isDark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" stroke-width="2"/></svg>
                        <i x-show="$store.theme.isDark" x-cloak class="fa-solid fa-moon-first-quarter text-sm"></i>
                    </div>
                </button>
            </div>
        </div>
    </div>
</header>