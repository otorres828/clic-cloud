<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

   
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body  style="backdrop-filter: brightness(50%);background-image:url(' {{asset('images/portada.webp')}}'); " class="font-sans text-gray-900 bg-cover h-screen pt-20 sm:pt-0 ">
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
    @livewireScripts
    <script src="{{ mix('js/app.js') }}" defer></script>

</html>
