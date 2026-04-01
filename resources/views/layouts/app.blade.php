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
    <main class="lg:ms-64 transition-all duration-300">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            {{ $slot }}
        </div>
    </main>


    <!-- JS -->
    <script>
        window.addEventListener('load', () => {
            if (window.HSStaticMethods) {
                window.HSStaticMethods.autoInit();
            }
        });
    </script>
</body>

</html>