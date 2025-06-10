{{--
|--------------------------------------------------------------------------
| register.blade.php
|--------------------------------------------------------------------------
|
| Halaman ini juga menggunakan HTML biasa dan kelas dari auth.css.
| Memiliki tombol kembali untuk navigasi yang mudah.
|
--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pomofy</title>
    {{-- Memuat file CSS khusus untuk halaman autentikasi --}}
    @vite(['resources/css/auth.css', 'resources/js/app.js'])
</head>
<body>
    <div class="auth-container">
        {{-- Tombol Kembali ke Halaman Login --}}
        <a href="{{ route('login') }}" class="back-arrow">❮</a>

        {{-- Ikon profil di bagian atas form --}}
        <div class="auth-header-icon">👤</div>

        <h2 class="auth-title">Register</h2>

        {{-- Form Register --}}
        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Input Name --}}
            <div>
                <input id="name" class="auth-input" type="text" name="name" placeholder="Name" :value="old('name')" required autofocus>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- Input Email --}}
            <div class="mt-4">
                <input id="email" class="auth-input" type="email" name="email" placeholder="Email ID" :value="old('email')" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Input Password --}}
            <div class="mt-4">
                <input id="password" class="auth-input" type="password" name="password" placeholder="Password" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Input Confirm Password --}}
            <div class="mt-4">
                <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" placeholder="Confirm Password" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            {{-- Tombol Register --}}
            <div class="mt-4">
                <button type="submit" class="auth-button">
                    Register
                </button>
            </div>

            <div class="auth-links">
                <a href="{{ route('login') }}">
                    Already registered?
                </a>
            </div>
        </form>
    </div>
</body>
</html>