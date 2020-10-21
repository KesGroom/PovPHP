<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('storage/colegio/escudo.jpg') }}" alt="Escudo" style="width: 5rem; height: 3rem;">
            <span class="navbar-brand mb-0 h1">María Cano IED</span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('pov.login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                {{-- Language switch --}}
                @if (session('lang') == 'es')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('lang', ['en']) }}"><img
                                src="{{ asset('storage/sistema/Estados.png') }}" alt="En"
                                style="width: 1.3rem; height: 1.3rem;"></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('lang', ['es']) }}"><img
                                src="{{ asset('storage/sistema/Colombia.png') }}" alt="Es"
                                style="width: 1.3rem; height: 1.3rem;"></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
