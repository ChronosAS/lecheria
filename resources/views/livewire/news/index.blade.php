<div>
    <header class="masthead1">
    </header>
    <section class="page-section px-0 bg-dark" id="portfolio">
        <div class="container-fluid bg-light p-5">
            <h1 class="text-center">News</h1>
            <div class="text-center my-2">
                <ul>
                    @forelse ($posts as $post)
                        <li>

                        </li>
                    @empty
                        <li><h4>No hay Noticias</h4></li>
                    @endforelse
                </ul>
            </div>
            <div class="my-3 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</div>
