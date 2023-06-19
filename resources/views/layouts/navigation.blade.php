<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo-lecheria.png') }}" alt="..." /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-3 py-lg-0">

                @if (Route::currentRouteName() != 'home')
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('home') }}"
                        >
                            Inicio
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a
                        class="nav-link"
                        href="http://200.41.118.109/appweb/"
                        target="_blank"
                    >
                        Declaración en Línea
                    </a>
                </li>
                @if(Route::currentRouteName() != 'civil-registry')
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            href="{{ route('civil-registry') }}"
                        >
                            Registro Civil
                        </a>
                    </li>
                @endif
                <!--<li class="nav-item"><a class="nav-link" href="#portfolio">Catastro</a></li>-->
                <!--<li class="nav-item"><a class="nav-link" href="#about">Insert Here</a></li>-->
                <!--<li class="nav-item"><a class="nav-link" href="#team">Insert Here</a></li>-->
                @if (Route::currentRouteName() == "home")
                    <li class="nav-item"><a class="nav-link" href="#contact">Atención al Ciudadano</a></li>
                @endif
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <li class="nav-item">
                            <a class="nav-link" onclick="event.preventDefault();
                                            this.closest('form').submit()">
                                Logout
                            </a>
                        </li>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
