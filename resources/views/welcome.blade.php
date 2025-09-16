<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SportsVault</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body
    class="bg-gray-100 dark:bg-gradient-to-tr from-zinc-900 via-zinc-950 to-zinc-900 text-gray-950 dark:text-white px-5 pb-5 flex flex-col gap-5 items-center min-h-screen">
    <nav
        class="sticky top-0 w-full lg:max-w-7xl bg-transparent backdrop-blur-md text-sm not-has-[nav]:hidden border-b border-zinc-700 py-5 z-50 mix-blend-difference">
        @if (Route::has('login'))
            <nav class="flex items-center justify-between gap-4">
                <x-application-logo class="text-3xl" />
                @auth
                    <div class="flex gap-2 items-center">
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-2 dark:text-white border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-zinc-700 dark:hover:border-zinc-600 rounded-md text-sm">
                            Dashboard
                        </a>
                        <div class="sm:flex sm:items-center border border-zinc-700 rounded-md">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-zinc-800 hover:text-gray-700 dark:hover:text-zinc-300 focus:outline-none transition ease-in-out duration-150">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                @else
                    <div class="flex gap-2 items-center">
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    </div>
                @endauth
            </nav>
        @endif
    </nav>

    <header
        class="flex flex-col gap-5 items-start justify-between w-full max-w-7xl min-h-[65vh] p-5 from-green-950 via-emerald-950 to-zinc-950 rounded-3xl"
        style="background-image: url('{{ asset('images/bg_gradient.png') }}');">
        <div class="space-y-0">
            <h2 class="w-fit text-5xl md:text-6xl uppercase">
                Selamat datang di
            </h2>
            <h2 class="w-fit text-6xl md:text-8xl uppercase">
                Sports Vault
            </h2>
        </div>

        <h2 class="w-fit text-2xl md:text-5xl uppercase">
            Inventaris Olahraga & Peminjaman Peralatan
        </h2>
    </header>

    <main class="space-y-5 max-w-7xl w-full min-h-[65vh]">

        <hr class="border-t-2 border-zinc-800">

        <div class="w-full px-8 pb-8 pt-5 rounded-3xl grayscale"
            style="background-image: url('{{ asset('images/bg_gradient.png') }}');">
            <h3 class="text-6xl text-zinc-950 uppercase">
                Peralatan Tersedia
            </h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5">

            @foreach ($product as $p)
                @if ($p->status_barang === 'Baik')
                    <a href="{{ route('form.create') }}"
                        class="group relative flex h-full w-full overflow-hidden rounded-3xl focus:outline-none focus-visible:ring-4 focus-visible:ring-white/30 border border-zinc-800">

                        <!-- Gambar -->
                        <img src="{{ asset('storage/' . $p->gambar_barang) }}" alt="{{ $p->nama_barang }} image"
                            class="h-full w-full object-cover object-center bg-zinc-800 transition-transform duration-500 group-hover:scale-105" />

                        <!-- Overlay -->
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/50 to-transparent text-white transition-opacity duration-300">
                            <div class="absolute inset-x-0 bottom-0 space-y-4 p-4">
                                <h3 class="text-2xl font-semibold">{{ $p->nama_barang }}</h3>

                                <div class="flex flex-col">
                                    <p class="text-base font-semibold">Kondisi {{ $p->status_barang }}</p>
                                    <p class="text-base font-semibold">Tersedia {{ $p->jumlah_barang }}</p>
                                </div>

                                <x-primary-button>Isi form untuk meminjam</x-primary-button>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

        </div>

        <hr class="border-t-2 border-zinc-800">

    </main>

    <div class="w-full max-w-7xl">
        @include('layouts.footer')
    </div>
</body>

</html>
