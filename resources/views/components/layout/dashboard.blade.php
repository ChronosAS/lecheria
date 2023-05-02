@props(['title'])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ $title }}</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet" />
        @livewireStyles
        @stack('styles')
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo-lecheria.png') }}" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-3 py-lg-0">


                        <li class="nav-item">
                            <a
                                class="{{ (Route::currentRouteName() == 'home') ? 'nav-link text-primary disabled' : 'nav-link' }}"
                                href="{{ route('home') }}"
                            >
                                Inicio
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="http://200.41.118.109/appweb/"
                                target="_blank"
                            >
                                Declaración en Línea
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="{{ (Route::currentRouteName() == 'civil-registry') ? 'nav-link text-primary disabled' : 'nav-link' }}"
                                href="{{ route('civil-registry') }}"
                            >
                                Registro Civil
                            </a>
                        </li>
                        <!--<li class="nav-item"><a class="nav-link" href="#portfolio">Catastro</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" href="#about">Insert Here</a></li>-->
                        <!--<li class="nav-item"><a class="nav-link" href="#team">Insert Here</a></li>-->
                        @if (Route::currentRouteName() == "home")
                            <li class="nav-item"><a class="nav-link" href="#contact">Atención al Ciudadano</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section -->
        {{ $slot }}

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Alcaldía de Lechería 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="https://twitter.com/Urbanejalcaldia" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.instagram.com/alcaldiadelecheria/"target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="https://www.youtube.com/@alcaldiadelecheria9429" target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
