<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name', 'Portfolio') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- CDNS --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
        integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
        crossorigin='anonymous'>
    @yield('cdns')

    <!-- Import Resources -->
    @vite(['resources/js/app.js'])
</head>

<body>

    {{-- Header --}}
    <header class="position-sticky">
        @include('includes.header')
    </header>
    {{-- Main --}}
    <main class="mt-4">
        @yield('main-content')
    </main>
    {{-- Footer --}}
    @include('includes.footer')

    {{-- Toast --}}
    @include('includes.layout.toast')

    {{-- Scripts --}}
    @yield('scripts')

</body>

</html>
