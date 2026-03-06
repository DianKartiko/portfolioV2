<header x-data="{ open: false }" class="bg-white dark:bg-zinc-950 transition-colors duration-300 sticky top-0 z-50">
    <nav aria-label="Global" class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8">
        <!-- Bagian Logo -->
        <div class="flex lg:flex-1">
            <a href="{{ route('home') }}" class="-m-1.5 p-1.5 transition-transform hover:scale-105">
                <span class="sr-only">Logo Perusahaan</span>
                <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=teal&shade=500" alt="Logo" class="h-8 w-auto">
            </a>
        </div>

        <!-- Tombol Hamburger (Mobile) -->
        <div class="flex lg:hidden">
            <button @click="open = !open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">
                <span class="sr-only">Buka menu utama</span>
                <svg x-show="!open" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <svg x-show="open" x-cloak class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Menu Navigasi (Desktop) -->
        <div class="hidden lg:flex lg:gap-x-12">
            @foreach($navigation as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}" 
                   class="text-sm/6 font-medium transition-all duration-200 {{ $active ? 'text-teal-600 dark:text-teal-400' : 'text-zinc-600 dark:text-zinc-300 hover:text-teal-600 dark:hover:text-teal-400' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        <!-- Bagian Kanan: Theme Switcher -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:items-center">
            <button 
                x-data 
                @click="$dispatch('toggle-theme')" 
                class="p-2 text-zinc-400 hover:text-zinc-900 dark:text-zinc-500 dark:hover:text-white transition-all duration-200 focus:outline-none group"
                title="Ganti Tema"
            >
                <div class="relative size-5">
                    <!-- Ikon Bulan (Mode Terang) -->
                    <svg x-show="!$store.theme.isDark" class="absolute inset-0 size-5 transform group-hover:rotate-12 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                    <!-- Ikon Matahari (Mode Gelap) -->
                    <svg x-show="$store.theme.isDark" x-cloak class="absolute inset-0 size-5 transform group-hover:rotate-45 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z" />
                    </svg>
                </div>
            </button>
        </div>
    </nav>

    <!-- Menu Dropdown (Mobile) -->
    <div 
        x-show="open" 
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="lg:hidden bg-white dark:bg-zinc-950 border-t border-zinc-100 dark:border-zinc-800"
    >
        <div class="space-y-1 px-6 py-6">
            @foreach($navigation as $item)
                @php $active = request()->routeIs($item['route']); @endphp
                <a href="{{ route($item['route']) }}" 
                   class="block rounded-lg px-3 py-2 text-base font-semibold transition-colors {{ $active ? 'text-teal-600 dark:text-teal-400 bg-teal-50/50 dark:bg-teal-900/20' : 'text-zinc-900 dark:text-zinc-100 hover:bg-zinc-50 dark:hover:bg-zinc-800' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
            
            <!-- Mobile Theme Switcher -->
            <div class="mt-4 pt-4 border-t border-zinc-100 dark:border-zinc-800 flex items-center justify-between">
                <span class="text-sm font-medium text-zinc-500 dark:text-zinc-400">Mode Tampilan</span>
                <button @click="$dispatch('toggle-theme')" class="flex items-center gap-2 px-4 py-2 rounded-xl bg-zinc-50 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-200 text-sm font-bold transition-all">
                    <span x-show="!$store.theme.isDark">Gelap</span>
                    <span x-show="$store.theme.isDark">Terang</span>
                    <div class="size-4">
                        <svg x-show="!$store.theme.isDark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" stroke-width="2"/></svg>
                        <svg x-show="$store.theme.isDark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364-6.364l-.707.707M12 8a4 4 0 100 8 4 4 0 000-8z" stroke-width="2"/></svg>
                    </div>
                </button>
            </div>
        </div>
    </div>
</header>