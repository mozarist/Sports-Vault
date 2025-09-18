<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Inventaris Olahraga</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-between bg-zinc-950 font-sans text-gray-900 antialiased">
    <div class="w-full h-full min-h-screen flex flex-col sm:justify-center items-start px-10 lg:px-20 bg-gray-100 dark:bg-zinc-950 font-[Inter]">
        <div>
            <a href="/">
                <x-application-logo class="text-4xl lg:text-6xl" />
            </a>
        </div>

        <div
            class="w-full py-4 bg-white dark:bg-transparent sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
    <img src="{{ asset('images/sports_equipment_storage.jfif') }}" alt="" class="hidden md:block w-1/2 min-h-screen object-cover grayscale">
</body>

</html>