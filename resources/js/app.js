// Mengimpor file bootstrap dan inisialisasi Alpine.js
import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    // === 1. SELEKSI ELEMEN HTML ===
    const appContainer = document.getElementById('app-container');
    const runningTimerState = document.getElementById('running-timer-state');
    const breakTimerState = document.getElementById('break-timer-state');
    const timeDisplay = document.getElementById('time-display');
    const breakTimeDisplay = document.getElementById('break-time-display');
    const pauseButton = document.getElementById('pause-button');
    const startBreakButton = document.getElementById('start-break-button');
    const streakIcon = document.getElementById('streak-icon');
    const streakModal = document.getElementById('streak-modal');
    const closeStreakModalButton = document.getElementById('close-streak-modal');

    // === 2. VARIABEL STATUS APLIKASI ===
    let timerInterval = null;
    let isPaused = false;
    let breakTimerHasStarted = false; // Flag baru untuk melacak status timer istirahat
    const workSessionDuration = 0.1 * 60;
    const breakSessionDuration = 0.1 * 60;

    // === 3. FUNGSI-FUNGSI UTAMA ===

    /**
     * Mengontrol state mana yang terlihat di halaman dashboard.
     */
    function showDashboardState(stateToShow) {
        [runningTimerState, breakTimerState].forEach(state => {
            if (state) state.classList.add('hidden');
        });
        if (stateToShow) stateToShow.classList.remove('hidden');
    }

    /**
     * Fungsi inti yang menjalankan countdown.
     */
    function runTimer(durationInSeconds, displayElement, onComplete) {
        if (timerInterval) clearInterval(timerInterval);
        let totalSeconds = durationInSeconds;

        const updateDisplay = () => {
            const minutes = Math.floor(totalSeconds / 60);
            const seconds = totalSeconds % 60;
            displayElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        };

        updateDisplay(); // Tampilkan waktu awal

        timerInterval = setInterval(() => {
            if (!isPaused) {
                totalSeconds--;
                updateDisplay();

                if (totalSeconds <= 0) {
                    clearInterval(timerInterval);
                    const alarm = new Audio("https://www.freespecialeffects.co.uk/soundfx/scifi/electronic.wav");
                    alarm.play();
                    if (onComplete) onComplete();
                }
            }
        }, 1000);
    }

    /**
     * Memulai atau menjeda sesi kerja (25 menit).
     */
    function toggleWorkSession() {
        isPaused = !isPaused;
        pauseButton.textContent = isPaused ? "▶" : "❚❚";
    }
    
    /**
     * PERBAIKAN: Memulai atau menjeda sesi istirahat.
     */
    function toggleBreakSession() {
        // Jika timer istirahat belum pernah dimulai, mulai sekarang.
        if (!breakTimerHasStarted) {
            isPaused = false;
            startBreakButton.textContent = "❚❚";
            runTimer(breakSessionDuration, breakTimeDisplay, () => {
                // Saat selesai, kembali ke landing page
                window.location.href = "/";
            });
            breakTimerHasStarted = true; // Tandai bahwa timer sudah berjalan
        } else {
            // Jika sudah berjalan, cukup toggle status pause
            isPaused = !isPaused;
            startBreakButton.textContent = isPaused ? "▶" : "❚❚";
        }
    }

    /**
     * Menyiapkan transisi ke mode istirahat.
     */
    function transitionToBreak() {
        if (appContainer) appContainer.classList.add('break-active');
        showDashboardState(breakTimerState);
        breakTimerHasStarted = false; // Reset flag saat transisi
        
        // Tampilkan waktu istirahat awal
        const minutes = Math.floor(breakSessionDuration / 60);
        const seconds = breakSessionDuration % 60;
        if (breakTimeDisplay) {
            breakTimeDisplay.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        }
        if (startBreakButton) startBreakButton.textContent = "▶"; // Tombol selalu mulai dengan ▶
    }


    // === 4. EVENT LISTENERS ===

    // Hanya jalankan logika timer jika kita berada di halaman dashboard
    if (runningTimerState) {
        // Tambahkan listener ke tombol pause/resume sesi kerja
        if (pauseButton) {
            pauseButton.addEventListener('click', toggleWorkSession);
        }

        // PERBAIKAN: Tambahkan listener ke tombol start/pause sesi istirahat
        if (startBreakButton) {
            startBreakButton.addEventListener('click', toggleBreakSession);
        }

        // Langsung mulai sesi kerja saat halaman dashboard dimuat
        isPaused = false;
        if (appContainer) appContainer.classList.remove('break-active');
        showDashboardState(runningTimerState);
        runTimer(workSessionDuration, timeDisplay, () => {
            transitionToBreak();
        });
    }

    // Hanya jalankan logika modal jika kita berada di halaman landing
    if (streakIcon && streakModal) {
        streakIcon.addEventListener('click', () => streakModal.classList.remove('hidden'));
        closeStreakModalButton.addEventListener('click', () => streakModal.classList.add('hidden'));
        streakModal.addEventListener('click', (event) => {
            if (event.target === streakModal) {
                streakModal.classList.add('hidden');
            }
        });
    }
});
