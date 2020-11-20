<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="http://imgfz.com/i/AMqIk9G.png" alt="Escudo" style="width: 5rem; height: 3rem;">
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
                    <li class="nav-item displayRowSbC">
                        <a class="nav-link" href="{{ route('editProfile', Auth::user()) }}">
                            @if (Auth::user()->foto_perfil == 'icon.png')
                                <img src="http://imgfz.com/i/pN3PmGa.png"
                                    style="width: 2.5rem; height: 2.5rem; border-radius: 50%;" alt="">
                            @else
                                <img src="{{ asset('storage/imgPerfil/' . Auth::user()->foto_perfil . '') }}"
                                    style="width: 2.5rem; height: 2.5rem; border-radius: 50%;" alt="">
                            @endif
                        </a>
                        <a class="nav-link" href="{{ route('editProfile', Auth::user()) }}">
                            {{ Auth::user()->name }}
                        </a>
                        <a class="nav-link" title="{{ __('pov.logout') }}" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                            <ion-icon name="power"></ion-icon>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
                {{-- Language switch --}}
                @if (session('lang') == 'es')
                    @guest
                        <li class="nav-item">
                        @else
                        <li class="nav-item mt-2">
                        @endguest
                        <a class="nav-link" href="{{ url('lang', ['es']) }}"><img
                                src="http://imgfz.com/i/BnyEPod.png" alt="En"
                                style="width: 1.3rem; height: 1.3rem;"></a>
                    </li>
                @else
                    @guest
                        <li class="nav-item">
                        @else
                        <li class="nav-item mt-2">
                        @endguest
                        <a class="nav-link" href="{{ url('lang', ['en']) }}"><img
                                src="http://imgfz.com/i/Ci0Lyg1.png" alt="Es"
                                style="width: 1.3rem; height: 1.3rem;"></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
