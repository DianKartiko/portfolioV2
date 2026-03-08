<x-layout.app title="Home - Portofolio">
    <div
        class="flex flex-col w-full max-w-3xl mx-auto px-6 pt-24 pb-16 md:pt-32 md:pb-24 animate-in fade-in slide-in-from-bottom-4 duration-1000"
    >
        {{-- Hero Section --}}
        <section class="mb-8 flex flex-col items-start">
            <h1
                class="text-2xl md:text-3xl font-bold tracking-tight text-zinc-900 dark:text-zinc-100 mb-4 leading-tight transition-colors"
            >
                Hey, I'm
                <span class="text-teal-600 dark:text-teal-400">Your Name</span>!
            </h1>

            <div
                class="space-y-3 text-base leading-relaxed text-zinc-600 dark:text-zinc-400 font-light max-w-2xl transition-colors"
            >
                <p>
                    A freelance
                    <span class="text-zinc-900 dark:text-zinc-100 font-medium"
                        >full-stack engineer</span
                    >
                    based in Jakarta, Indonesia.
                </p>
                <p>
                    I specialize in developing applications using
                    <a
                        href="#"
                        class="text-zinc-900 dark:text-zinc-100 underline decoration-zinc-300 dark:decoration-zinc-800 hover:decoration-teal-600 dark:hover:decoration-teal-400 transition-colors"
                        >Laravel</a
                    >
                    and
                    <a
                        href="#"
                        class="text-zinc-900 dark:text-zinc-100 underline decoration-zinc-300 dark:decoration-zinc-800 hover:decoration-teal-600 dark:hover:decoration-teal-400 transition-colors"
                        >React ecosystem</a
                    >.
                </p>
                <p>
                    Currently, I'm building modern web experiences at
                    <a
                        href="#"
                        class="text-zinc-900 dark:text-zinc-100 underline decoration-zinc-300 dark:decoration-zinc-800 hover:decoration-teal-600 dark:hover:decoration-teal-400 transition-colors"
                        >YourCompany</a
                    >.
                </p>
            </div>

            {{-- Wavy Divider --}}
            <div class="mt-8 mb-2 flex justify-start">
                <svg
                    width="90"
                    height="16"
                    viewBox="0 0 120 20"
                    fill="none"
                    class="text-teal-600 dark:text-teal-400 transition-colors"
                >
                    <path
                        d="M0 10C10 10 10 2 20 2C30 2 30 10 40 10C50 10 50 2 60 2C70 2 70 10 80 10C90 10 90 2 100 2C110 2 110 10 120 10"
                        stroke="currentColor"
                        stroke-width="3"
                        stroke-linecap="round"
                    />
                </svg>
            </div>
        </section>

        {{-- Social Section --}}
        <section class="mb-8 flex flex-col items-start w-full">
            <h2
                class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 dark:text-zinc-500 mb-6 transition-colors"
            >
                Find me on
            </h2>
            <div class="flex flex-wrap justify-start gap-6 md:gap-8">
                <a
                    href="#"
                    class="group flex items-center gap-2 text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors"
                >
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.045 4.126H5.078z"
                        />
                    </svg>
                    <span class="text-sm font-medium">Twitter</span>
                </a>
                <a
                    href="#"
                    class="group flex items-center gap-2 text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors"
                >
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.43.372.823 1.102.823 2.222 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"
                        />
                    </svg>
                    <span class="text-sm font-medium">GitHub</span>
                </a>
                <a
                    href="#"
                    class="group flex items-center gap-2 text-zinc-500 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-zinc-100 transition-colors"
                >
                    <svg class="size-5" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"
                        />
                    </svg>
                    <span class="text-sm font-medium">LinkedIn</span>
                </a>
            </div>
        </section>

        {{-- Contact Section --}}
        <section class="flex flex-col items-start">
            <h2
                class="text-xs font-bold uppercase tracking-[0.2em] text-zinc-500 dark:text-zinc-500 mb-3 transition-colors"
            >
                Contact
            </h2>
            <p
                class="text-zinc-600 dark:text-zinc-400 text-sm md:text-base mb-2 font-light transition-colors"
            >
                You can reach me out anytime at
            </p>
            <a
                href="mailto:hello@yourname.dev"
                class="text-base font-medium text-zinc-900 dark:text-zinc-100 border-b border-zinc-300 dark:border-zinc-800 hover:border-teal-600 dark:hover:border-teal-400 transition-all duration-300 pb-1"
            >
                hello@yourname.dev
            </a>
        </section>
    </div>
</x-layout.app>
