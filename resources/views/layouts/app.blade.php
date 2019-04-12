<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/mdb/mdb.min.css') }}">
    <!-- Slidebars -->
    <link rel="stylesheet" href="{{ asset('css/slidebars/slidebars.min.css') }}">
    <!-- Global Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Drawer -->
    <link rel="stylesheet" href="{{ asset('css/drawer.css') }}">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome/all.css') }}">
</head>
<body>
    @auth
        @include('layouts.inc.slidebar')        
    @endauth
    <div id="app" canvas="container" class="stylish-color-dark">
        @auth
            @include('layouts.inc.navbar')
        @endauth
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script type="text/javascript" src="{{ asset('js/mdb/jquery-3.3.1.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb/mdb.min.js') }}"></script>
    <!-- Slidebars -->
    <script src="{{ asset('js/slidebars/slidebars.min.js') }}"></script>
    <!-- Global Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
