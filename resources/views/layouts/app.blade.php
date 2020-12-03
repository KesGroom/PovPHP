<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Iconografía - FontAwesome(Principal) --}}
    <script src="https://kit.fontawesome.com/11c72a119e.js" crossorigin="anonymous"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>María Cano IED</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('img/LOGOFavicon.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="scrollbarStyle">

    <div id="contenedor_carga">
        <div id="carga" class="displayRowCC">
            <img src="{{ asset('img/escudo.jpg') }}" alt="">
        </div>
    </div>
    <div id="app">
        <div class="header">
            @include('layouts.partials.nav')
            @yield('nav')
        </div>
        <main class="py-4">
            @yield('content')
        </main>
        @include('layouts.partials.footer')
    </div>
    {{-- Iconografía - Ion Icons(Secundario) --}}
    <script type="module" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.2.3/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @yield('script')
</body>

</html>
