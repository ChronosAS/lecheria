@push('styles')
    <style>

        section#contact {
            background-color: gray;
            background-image: url("../img/map-image.png");
            background-repeat: no-repeat;
            background-position: center;
        }

        section#news {
            background-color: #03284d;
            background-image: url("../img/map-image.png");
            background-repeat: no-repeat;
            background-position: center;
        }

        .contact-embed {
            min-height: 1300px;
        }

        @media(max-width: 360px) {
            .contact-embed {
                min-height: 1500px;
            }
        }


    </style>
@endpush
<div>

    <!-- Masthead1-->
    <header class="masthead1">
        <!--<div class="container">
        </div>-->
    </header>

    <!-- Masthead-->
    <header class="masthead">

    </header>

        <!-- News -->
    @if(!$posts->isEmpty())
        <section class="page-section" id="news">

            <div class="container " id="news-carousel">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase text-white">Noticias recientes</h2>
                    {{-- <h3 class="section-subheading text-muted">Nuestra directora de Atención al Ciudadano esta atenta a sus solicitudes.</h3> --}}
                </div>

                <div id="newsCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($posts as $index => $post)
                            <button type="button" data-bs-target="#newsCarousel" data-bs-slide-to="{{ $index }}" @if($index == 0) class="active" aria-current="true" @endif  aria-label="{{ 'Post '.$index }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($posts as $index => $post)
                            <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
                                <a href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}"><img src="{{ $post->getFirstMediaUrl('post-images') }}" class="mx-auto w-50 d-block" alt="..."></a>
                                <div class="carousel-caption d-none d-md-block bg-secondary bg-opacity-50">
                                    <h5>{{ $post->title }}</h5>
                                    <p>{{ $post->subtitle ?? '' }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#newsCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#newsCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="text-end p-2">
                    <a href="{{ route('news.index') }}" class="link-light text-right text-decoration-none">
                        <h5>
                            <span>Ver todas las Noticias</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="24" width="24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </h5>
                    </a>
                </div>
            </div>

        </section>
    @endif


    <!-- Contact-->

    <section class="page-section" id="contact">
        <div class="container">

            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contactanos</h2>
                <h3 class="section-subheading text-black">Nuestra directora de Atención al Ciudadano esta atenta a sus solicitudes.</h3>
            </div>

            <div class="ratio ratio-1x1 rounded text-center contact-embed">
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSf8D1hrbKl8u-q1yiWVlEKszUWWd8Wo7uY7fT6OLIxPIpE5sg/viewform?embedded=true"  scrolling="no">Cargando…</iframe>
            </div>


        </div>
    </section>

</div>
