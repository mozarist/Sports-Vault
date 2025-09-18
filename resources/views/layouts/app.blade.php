<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Panel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-[Inter] antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-zinc-950">
        @include('layouts.navigation')

        <!-- Page Content -->
        <main class="flex flex-col gap-5 justify-start max-w-7xl w-full h-full mx-auto px-4 sm:px-6 lg:px-8 py-10">
            {{ $slot }}
        </main>
    </div>
</body>

</html>