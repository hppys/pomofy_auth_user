<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P4MOFY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-hidden font-press-start">
    <div class="relative w-screen h-screen flex flex-col justify-between items-center
                 bg-gradient-to-b from-pomofy-purple-dark to-pomofy-purple-light text-white">

        {{-- Header --}}
        <div class="absolute top-0 left-0 w-full p-5 sm:p-10 flex justify-between items-center z-10">
            {{-- Logo P4MOFY --}}
            <div>
                <img src="{{ asset('storage/gambar/pomofy.svg') }}" alt="P4MOFY Logo"
                     class="h-8 sm:h-12 w-auto object-contain">
            </div>

            {{-- KONTEN SISI KANAN HEADER: TOMBOL & IKON --}}
            <div class="flex items-center">

                {{-- IKON STRIKE (ini akan selalu tampil) --}}
                <img src="{{ asset('storage/gambar/strike.svg') }}" alt="Strike Icon"
                     class="h-6 sm:h-8 w-auto object-contain ml-5">

                {{-- LOGIKA AUTH UNTUK TOMBOL/LINK LOGIN/REGISTER DAN IKON PROFIL --}}
                @auth
                    {{-- Jika pengguna SUDAH login --}}
                    {{-- Tombol Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                       class="inline-block px-4 py-1.5 ml-5 text-sm rounded-sm
                              text-white border border-transparent hover:border-gray-500
                              dark:text-white dark:border-gray-700 dark:hover:border-gray-500
                              bg-purple-700 hover:bg-purple-800 transition-colors duration-200">
                        Dashboard
                    </a>
                    {{-- Ikon Profil (link ke dashboard/profil) --}}
                    <a href="{{ route('profile.edit') }}" class="ml-2"> {{-- Ganti ke route('profile.edit') atau route('dashboard') --}}
                        <img src="{{ asset('storage/gambar/profil.svg') }}" alt="Profile Icon"
                             class="h-6 sm:h-8 w-auto object-contain">
                    </a>
                @else
                    {{-- Jika pengguna BELUM login --}}
                    {{-- Tombol Login --}}
                    <a href="{{ route('login') }}"
                       class="inline-block px-4 py-1.5 ml-5 text-sm rounded-sm
                              text-white border border-transparent hover:border-gray-500
                              dark:text-white dark:border-gray-700 dark:hover:border-gray-500
                              bg-purple-600 hover:bg-purple-700 transition-colors duration-200">
                        Log in
                    </a>
                    {{-- Tombol Register (jika route register aktif) --}}
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-block px-4 py-1.5 ml-2 text-sm rounded-sm
                                  text-white border border-transparent hover:border-gray-500
                                  dark:text-white dark:border-gray-700 dark:hover:border-gray-500
                                  bg-purple-700 hover:bg-purple-800 transition-colors duration-200">
                            Register
                        </a>
                    @endif
                    {{-- Ikon Profil (link ke login) --}}
                    <a href="{{ route('login') }}" class="ml-2">
                        <img src="{{ asset('storage/gambar/profil.svg') }}" alt="Profile Icon"
                             class="h-6 sm:h-8 w-auto object-contain">
                    </a>
                @endauth

            </div> {{-- End of flex items-center --}}
        </div> {{-- End of header div --}}

        {{-- Moon Container --}}
        <div class="absolute inset-0 flex justify-center items-center z-0">
            <div class="w-[60vh] h-[60vh] max-w-[500px] max-h-[500px] bg-pomofy-moon rounded-full
                        flex justify-center items-center shadow-xl shadow-white/30">
                <span class="text-5xl sm:text-7xl font-bold text-pomofy-text-start">START</span>
            </div>
        </div>

        {{-- Hills Container --}}
        <div class="absolute bottom-0 left-0 w-full h-[30%] overflow-hidden z-0">
            {{-- Hill Left --}}
            <div class="absolute bottom-0 -left-1/2 w-[150%] h-[200%] rounded-full bg-pomofy-hill1
                        -translate-x-1/4 transform"></div>
            {{-- Hill Right --}}
            <div class="absolute bottom-0 -right-1/2 w-[170%] h-[220%] rounded-full bg-pomofy-hill2
                        translate-x-1/4 transform z-10"></div>
        </div>
    </div>
</body>
</html>