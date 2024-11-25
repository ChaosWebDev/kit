<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    {{-- VITE --}}
    @vite(['resources/styles/app.scss', 'resources/scripts/app.js'])

    {{-- STACKS --}}
    @stack('scripts')
    @stack('styles')

    {{-- LIVEWIRE --}}
    @livewireStyles

    {{-- EXTERNALS --}}
    <style>
        @import "https://www.nerdfonts.com/assets/css/webfont.css";

        /*
        @tailwind base;
        @tailwind components;
        @tailwind utilities;
         */
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body class='w-full'>
    @auth
        <x-nav />
    @endauth
    {{ $slot }}

    {{-- LIVEWIRE --}}
    @livewireScripts
</body>

</html>
