<footer {{ $attributes->merge(['class' => 'mt-20 pb-12 border-t border-zinc-900/50 p-6']) }}>
    <div class="flex flex-col md:flex-row justify-between items-center gap-6 text-xs text-zinc-600">
        {{-- Copyright dengan tahun dinamis --}}
        <div>
            © {{ date('Y') }} Built with 
            <span class="text-teal-400">❤</span> by 
            {{ $name ?? 'Andrei Hudovich' }}
        </div>

        {{-- Navigasi Footer --}}
        <div class="flex gap-4 uppercase tracking-widest font-bold text-[10px]">
            <a href="#" class="hover:text-teal-400 transition-colors duration-200">Tech Stack</a>
            <a href="#" class="hover:text-teal-400 transition-colors duration-200">Resume</a>
            <a href="#" class="hover:text-teal-400 transition-colors duration-200">Uses</a>
        </div>
    </div>
</footer>