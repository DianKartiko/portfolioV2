<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolio'}}</title>
    <!-- Inisialisasi Styling -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="bg-white dark:bg-neutral-900 ">
    <!-- SideBar -->
    <x-side-bar></x-side-bar>

    <!-- Main Konten -->
    <main class="lg:ps-64 transition-all duration-300 [[.hs-sidebar-mini-window]_&]:lg:ps-20">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            {{ $slot }}
        </div>
    </main>


    <!-- JS -->
    <script>
        // Pantau perubahan DOM agar Preline melakukan re-inisialisasi otomatis
        window.addEventListener('load', () => {
            if (window.HSStaticMethods) {
                window.HSStaticMethods.autoInit();
            }
        });

        // Opsional: Untuk menangani navigasi Livewire/SPA jika nantinya Anda pakai
        document.addEventListener('livewire:navigated', () => {
            if (window.HSStaticMethods) {
                window.HSStaticMethods.autoInit();
            }
        });
    </script>
</body>

</html>