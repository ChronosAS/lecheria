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
    <section class="page-section bg-secondary" id="news">
        <div class="container " id="news-carousel">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Noticias recientes</h2>
                {{-- <h3 class="section-subheading text-muted">Nuestra directora de Atención al Ciudadano esta atenta a sus solicitudes.</h3> --}}
            </div>

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ asset('img/portfolio/1.jpg') }}" class="rounded mx-auto d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>First slide label</h5>
                      <p>Some representative placeholder content for the first slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/portfolio/2.jpg') }}" class="rounded mx-auto d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Second slide label</h5>
                      <p>Some representative placeholder content for the second slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/portfolio/3.jpg') }}" class="rounded mx-auto d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Third slide label</h5>
                      <p>Some representative placeholder content for the third slide.</p>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <img src="{{ asset('img/portfolio/4.jpg') }}" class="rounded mx-auto d-block" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                      <h5>Fourth slide label</h5>
                      <p>Some representative placeholder content for the fourth slide.</p>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">

        <div class="container">

            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contactanos</h2>
                <h3 class="section-subheading text-muted">Nuestra directora de Atención al Ciudadano esta atenta a sus solicitudes.</h3>
            </div>

            <p align="center">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSf8D1hrbKl8u-q1yiWVlEKszUWWd8Wo7uY7fT6OLIxPIpE5sg/viewform?embedded=true" width="500" height="600" frameborder="0" marginheight="0"  class="bg-secondary rounded" marginwidth="0">Cargando…</iframe>
            </p>

        </div>

    </section>
</div>
