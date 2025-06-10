<x-app-layout>
    <div id="app-container" class="relative w-full h-[calc(100vh-0px)] flex flex-col justify-center items-center
                                 bg-gradient-to-b from-pomofy-purple-dark to-pomofy-purple-light text-white overflow-hidden font-press-start">

        {{-- Header Kustom untuk Dashboard --}}
        <div class="absolute top-0 left-0 w-full p-5 sm:p-10 flex justify-between items-center z-20">
            <a href="{{ url('/') }}" class="text-white hover:text-gray-300 pixelated-font text-sm no-underline">
                &larr; Back to Home
            </a>
            <div class="pixelated-font text-2xl sm:text-3xl">P<span>⚡</span>MOFY</div>
        </div>

        {{-- Kontainer untuk State Timer --}}
        <div class="w-full h-full">

            {{--
            |--------------------------------------------------------------------------
            | State: Running Timer
            |--------------------------------------------------------------------------
            | Tulisan "Work Session" ditambahkan di sini.
            --}}
            <div id="running-timer-state" class="w-full h-full flex-col justify-center items-center flex">
                
                {{-- Tulisan Status Sesi Kerja --}}
                <h2 class="text-2xl sm:text-3xl font-bold uppercase tracking-wider mb-8">Work Session</h2>

                <div class="w-[60vh] h-[60vh] max-w-[500px] max-h-[500px] bg-pomofy-moon rounded-full
                            flex flex-col justify-center items-center shadow-xl shadow-white/10
                            relative overflow-hidden">
                    <div id="time-display" class="text-6xl sm:text-7xl font-bold text-pomofy-text-start z-10 pixelated-font">25:00</div>
                    <button id="pause-button" class="mt-4 text-4xl z-10">❚❚</button>
                </div>
            </div>

            {{--
            |--------------------------------------------------------------------------
            | State: Break Timer
            |--------------------------------------------------------------------------
            | Tulisan "Break Session" ditambahkan di sini.
            --}}
            <div id="break-timer-state" class="w-full h-full flex-col justify-center items-center hidden flex">

                {{-- Tulisan Status Sesi Istirahat --}}
                <h2 class="text-2xl sm:text-3xl font-bold uppercase tracking-wider mb-8">Break Session</h2>

                <div class="w-[60vh] h-[60vh] max-w-[500px] max-h-[500px] bg-pomofy-moon rounded-full
                            flex flex-col justify-center items-center shadow-xl shadow-white/10
                            relative overflow-hidden">
                    <div id="break-time-display" class="text-6xl sm:text-7xl font-bold text-pomofy-text-start z-10 pixelated-font">05:00</div>
                    <button id="start-break-button" class="mt-4 text-4xl z-10">▶</button>
                </div>
            </div>
        </div>

        <!-- {{-- Hills Container --}}
        <div class="absolute bottom-0 left-0 w-full h-[30%] overflow-hidden z-0">
            <div class="absolute bottom-0 -left-1/2 w-[150%] h-[200%] rounded-full bg-pomofy-hill1 -translate-x-1/4 transform"></div>
            <div class="absolute bottom-0 -right-1/2 w-[170%] h-[220%] rounded-full bg-pomofy-hill2 translate-x-1/4 transform z-10"></div>
        </div> -->
        
    </div>
</x-app-layout>
