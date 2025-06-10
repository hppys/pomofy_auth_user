{{-- resources/views/layouts/app.blade.php (Versi yang Disesuaikan untuk Pomofy) --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Tetap memuat aset utama Anda melalui Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    {{-- Kita akan membungkus konten utama (slot) dengan #app-container --}}
    {{-- Ini akan menerapkan latar belakang ungu dan memusatkan konten --}}
    <div id="app-container">
        {{ $slot }}
    </div>
</body>
</html>