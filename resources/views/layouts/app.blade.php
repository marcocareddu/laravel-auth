<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{ config('app.name', 'Portfolio') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- CDNS --}}
    @yield('cdns')

    <!-- Import Resources -->
    @vite(['resources/js/app.js'])
</head>

<body>

    {{-- Header --}}
    @include('includes.header')

    {{-- Main --}}
    @yield('main-content')

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Scripts --}}
    @yield('scripts')

</body>

</html>
