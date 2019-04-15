<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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
    <!-- JQuery UI CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}">
    <!-- JQuery UI Theme -->
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.theme.min.css') }}">
</head>
<body>
    @auth
        @include('layouts.inc.slidebar')        
    @endauth
    <div id="app" canvas="container" class="stylish-color-dark">
        @auth
            @include('layouts.inc.navbar')
        @endauth
        <main class="p-3">

            @if (session()->has('success'))
                <div class="alert alert-success">
                    <div class="alert-title"><strong>Success!</strong></div>
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    <div class="alert-title"><strong>Error!</strong></div>
                    {{ session()->get('error') }}
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('js/mdb/mdb.min.js') }}"></script>
    <!-- Popper JS -->
    <script src="{{ asset('js/mdb/popper.min.js') }}"></script>
    <!-- JQuery UI -->
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <!-- Slidebars -->
    <script src="{{ asset('js/slidebars/slidebars.min.js') }}"></script>
    <!-- Global Scripts -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <!-- MDB Datatables -->
    <script src="{{ asset('js/mdb/addons/datatables.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
