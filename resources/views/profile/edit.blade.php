<x-app-layout>
 
    <style>
        /* Styling untuk 'kartu' atau panel konten */
        .pomofy-card {
            background-color: rgba(248, 197, 186, 0.9); /* Warna pink/orange semi-transparan dari tema auth */
            padding: 1.5rem 2rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Styling untuk teks di dalam kartu agar kontras */
        .pomofy-card h2, .pomofy-card p {
            color: #5c3e38; /* Warna teks gelap agar terbaca di atas latar pink */
            font-family: sans-serif; /* Menggunakan font non-pixelated agar mudah dibaca */
        }
        .pomofy-card h2.pixelated-font {
            font-family: 'Press Start 2P', cursive; /* Terapkan lagi jika ingin judul pixelated */
        }

        /* Styling untuk form di dalam kartu */
        .pomofy-label {
            display: block;
            margin-bottom: 0.5rem;
            color: #5c3e38;
            font-weight: bold;
            font-size: 0.9rem;
            font-family: sans-serif;
        }

        .pomofy-input {
            display: block;
            width: 100%;
            padding: 10px;
            border: 1px solid #d48072;
            border-radius: 5px;
            background-color: #fcebe6; /* Warna input lebih terang */
            color: #5c3e38;
            font-family: sans-serif; /* Gunakan font biasa untuk input agar mudah dibaca */
        }

        .pomofy-button {
            background-color: #d48072; /* Warna tombol utama */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            transition: background-color 0.2s;
        }
        .pomofy-button:hover {
            background-color: #c07060;
        }

        /* Tombol khusus untuk aksi berbahaya seperti 'Delete' */
        .pomofy-button-danger {
            background-color: #ef4444; /* Warna merah */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Press Start 2P', cursive;
            font-size: 0.8rem;
            transition: background-color 0.2s;
        }
        .pomofy-button-danger:hover {
            background-color: #dc2626;
        }
    </style>

    <div id="profile-page-container" class="relative w-full min-h-[calc(100vh-65px)] flex flex-col items-center p-4 sm:p-8
                                          bg-gradient-to-b from-pomofy-purple-dark to-pomofy-purple-light text-white font-press-start">

        {{-- Header Kustom untuk Halaman Profil --}}
        <div class="w-full max-w-7xl mx-auto mb-6">
            <a href="{{ route('landing_page') }}" class="text-white hover:text-gray-300 pixelated-font text-sm">
                &larr; Back to Timer
            </a>
            <h2 class="mt-2 font-semibold text-2xl text-white leading-tight pixelated-font">
                {{ __('Profile') }}
            </h2>
        </div>

        {{-- Kontainer untuk Kartu-kartu Pengaturan --}}
        <div class="w-full max-w-7xl mx-auto space-y-6">

            {{-- Kartu 1: Update Profile Information --}}
            <div class="pomofy-card">
                <section>
                    <header>
                        <h2 class="text-lg font-medium pixelated-font">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="mt-1 text-sm">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label for="name" class="pomofy-label">{{ __('Name') }}</label>
                            <input id="name" name="name" type="text" class="pomofy-input" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <label for="email" class="pomofy-label">{{ __('Email') }}</label>
                            <input id="email" name="email" type="email" class="pomofy-input" value="{{ old('email', $user->email) }}" required autocomplete="username">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="pomofy-button">{{ __('Save') }}</button>
                            @if (session('status') === 'profile-updated')
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>

            {{-- Kartu 2: Update Password --}}
            <div class="pomofy-card">
                <section>
                    <header>
                        <h2 class="text-lg font-medium pixelated-font">
                            {{ __('Update Password') }}
                        </h2>
                        <p class="mt-1 text-sm">
                            {{ __('Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>
                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <label for="current_password" class="pomofy-label">{{ __('Current Password') }}</label>
                            <input id="current_password" name="current_password" type="password" class="pomofy-input" autocomplete="current-password">
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password" class="pomofy-label">{{ __('New Password') }}</label>
                            <input id="password" name="password" type="password" class="pomofy-input" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <label for="password_confirmation" class="pomofy-label">{{ __('Confirm Password') }}</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="pomofy-input" autocomplete="new-password">
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="pomofy-button">{{ __('Save') }}</button>
                            @if (session('status') === 'password-updated')
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>

            {{-- Kartu 3: Delete User --}}
            <div class="pomofy-card">
                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium pixelated-font">
                            {{ __('Delete Account') }}
                        </h2>
                        <p class="mt-1 text-sm">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                        </p>
                    </header>
                    <button type="button" class="pomofy-button-danger">{{ __('Delete Account') }}</button>
                    {{-- Logika untuk modal konfirmasi penghapusan akun perlu ditambahkan di sini dengan Alpine.js atau JS kustom --}}
                </section>
            </div>
        </div>
    </div>
</x-app-layout>