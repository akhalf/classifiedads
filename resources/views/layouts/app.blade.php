<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light navbar-laravel">
        @include('partials.navbar')
    </nav>

    <div class="jumbotron text-center">
        @include('partials.searchfrm')
    </div>

    <div class="container">
        @include('partials.categoryNav')
    </div>

    <hr>

    <div class="container text-right">
        @yield('content')
    </div>

    <footer class="mt-5">
        @include('partials.footer')
    </footer>
</body>
</html>
