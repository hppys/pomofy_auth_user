<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to P4MOFY</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="overflow-hidden font-press-start">
    <div id="app-container" class="relative w-screen h-screen flex flex-col justify-between items-center
                                 bg-gradient-to-b from-pomofy-purple-dark to-pomofy-purple-light text-white">

        {{-- Header untuk Landing Page --}}
        <div class="absolute top-0 left-0 w-full p-5 sm:p-10 flex justify-between items-center z-20">
            {{-- Tulisan Pomofy di kiri atas --}}
            <div class="pixelated-font text-2xl sm:text-3xl">P<span>⚡</span>MOFY</div>

            {{-- Tombol di kanan atas --}}
            <div class="flex items-center">
                {{-- Tombol petir (selalu terlihat) --}}
                <span id="streak-icon" class="text-2xl sm:text-3xl cursor-pointer">⚡</span>

                @auth
                    {{-- JIKA PENGGUNA SUDAH LOGIN, TAMPILKAN IKON PROFIL DAN TOMBOL LOGOUT --}}
                    <a href="{{ route('profile.edit') }}" class="ml-5">
                        <span class="text-2xl sm:text-3xl">👤</span>
                    </a>
                    
                    {{-- Tombol Logout --}}
                    <form method="POST" action="{{ route('logout') }}" class="ml-4">
                        @csrf
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                           class="text-sm hover:text-gray-300 no-underline">
                            Logout
                        </a>
                    </form>
                @else
                    {{-- JIKA PENGGUNA BELUM LOGIN, TAMPILKAN TOMBOL LOGIN & REGISTER --}}
                    <a href="{{ route('login') }}"
                       class="inline-block px-4 py-1.5 ml-5 text-sm rounded-sm
                              text-white border border-transparent hover:border-gray-500
                              bg-purple-600 hover:bg-purple-700 transition-colors duration-200">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-block px-4 py-1.5 ml-2 text-sm rounded-sm
                                  text-white border border-transparent hover:border-gray-500
                                  bg-purple-700 hover:bg-purple-800 transition-colors duration-200">
                            Register
                        </a>
                    @endif
                @endauth
            </div>
        </div>

        {{-- ... Sisa konten landing_page (Tombol START, Hills, Modal) tetap sama ... --}}
        
        {{-- Tombol Start --}}
        <div class="w-full h-full flex justify-center items-center">
            <a href="{{ route('dashboard') }}"
               class="w-[60vh] h-[60vh] max-w-[500px] max-h-[500px] bg-pomofy-moon rounded-full
                      flex justify-center items-center shadow-xl shadow-white/10
                      cursor-pointer no-underline">
                <span class="text-5xl sm:text-7xl font-bold text-pomofy-text-start pixelated-font">START</span>
            </a>
        </div>

        <!-- {{-- Hills Container --}}
        <div class="absolute bottom-0 left-0 w-full h-[30%] overflow-hidden z-0">
            <div class="absolute bottom-0 -left-1/2 w-[150%] h-[200%] rounded-full bg-pomofy-hill1 -translate-x-1/4 transform"></div>
            <div class="absolute bottom-0 -right-1/2 w-[170%] h-[220%] rounded-full bg-pomofy-hill2 translate-x-1/4 transform z-10"></div>
        </div> -->

        {{-- Strike Modal --}}
        <div id="streak-modal" class="floating-modal hidden">
        <div class="streak-header">
            <span class="day-initial pixelated-font">M</span>
            <span class="day-initial pixelated-font">T</span>
            <span class="day-initial pixelated-font">W</span>
            <span class="day-initial pixelated-font">T</span>
            <span class="day-initial pixelated-font">F</span>
            <span class="day-initial pixelated-font">S</span>
            <span class="day-initial pixelated-font">S</span>
        </div>
        <div class="streak-history">
            <h3 class="pixelated-font">HISTORY</h3>
            <div class="history-item">
                <span>Monday</span>
                <span>00:34:26</span>
            </div>
            {{-- Tambahkan lebih banyak item riwayat di sini atau buat secara dinamis dengan JavaScript --}}
        </div>
        <button id="close-streak-modal">Close</button>
             </div>
        </div>
    </div>
</body>
</html>