{{--
|--------------------------------------------------------------------------
| login.blade.php
|--------------------------------------------------------------------------
|
| Halaman ini menggunakan HTML biasa dan kelas dari auth.css untuk styling.
| Logika form (action, method, @csrf, nama input) tetap sama
| agar tidak merusak fungsi backend Laravel Breeze.
|
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pomofy</title>
    {{-- Memuat file CSS khusus untuk halaman autentikasi --}}
    @vite(['resources/css/auth.css', 'resources/js/app.js'])
</head>
<body>
    <div class="auth-container">
        {{-- Ikon profil di bagian atas form --}}
        <div class="auth-header-icon">👤</div>

        <h2 class="auth-title">Login</h2>

        {{-- Form Login --}}
        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Input Email --}}
            <div>
                <input id="email" class="auth-input" type="email" name="email" placeholder="Email ID" :value="old('email')" required autofocus>
                {{-- Komponen error bawaan Breeze masih bisa digunakan jika diinginkan --}}
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Input Password --}}
            <div class="mt-4">
                <input id="password" class="auth-input" type="password" name="password" placeholder="Password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Tombol Login --}}
            <div class="mt-4">
                <button type="submit" class="auth-button">
                    Login
                </button>
            </div>

            <div class="auth-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        Forgot Password?
                    </a>
                @endif
                <a href="{{ route('register') }}">
                    Sign Up
                </a>
            </div>
        </form>
    </div>
</body>
</html>