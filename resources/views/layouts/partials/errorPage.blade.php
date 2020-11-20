<style>
    .errorBox {
        width: 40%;
        padding: 1rem 3rem;
        background-color: rgba(255, 255, 255, 0.342);
        margin: auto;
        margin-top: 7%;
        border-radius: 5px;
        position: relative;
    }

    body {
        background: linear-gradient(rgba(245, 242, 227, 0.932), rgba(180, 42, 7, 0.637));
        background-repeat: no-repeat;
        height: 100vh;
    }

    .code {
        font-size: 7em;
        font-weight: 700;
        margin-top: -5.5rem;
        margin-bottom: 1rem;
    }

    .tituloError {
        font-size: 2em;
        border-bottom: 1px solid black;
    }

    .infoError {
        margin-bottom: 4rem;
    }

    .btn-error {
        background: black;
        padding: 0.5rem 5rem;
        color: white;
        border-radius: 3px;
        right: -1rem;
        bottom: 1.5rem;
        position: absolute;
    }

    .btn-error:hover {
        background: rgb(48, 47, 47);
        padding: 0.5rem 5rem;
        color: rgb(228, 218, 218);
        border-radius: 3px;
    }

</style>
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
    <link rel="shortcut icon" href="{{ asset('storage/sistema/LOGOFavicon.png') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="scrollbarStyle">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/escudo.jpg') }}" alt="Escudo"
                        style="width: 5rem; height: 3rem;">
                    <span class="navbar-brand mb-0 h1">María Cano IED</span>
                </a>
            </div>
        </nav>
        <div class="errorBox">
            <p class="code">@yield('code')</p>
            <p class="tituloError">@yield('tituloError')</p>
            <p class="infoError">@yield('infoError')</p>
            <a href="{{ route('welcome') }}" class="btn-error displayRowCC">{{ __('pov.btnBackHome') }}
                <ion-icon name="home" class="ml-2"></ion-icon>
            </a>
        </div>
        @include('layouts.partials.footer')
    </div>
    {{-- Iconografía - Ion Icons(Secundario) --}}
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
</body>

</html>
