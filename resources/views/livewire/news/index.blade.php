<div>
    <header class="masthead1">
    </header>
    <section class="page-section bg-dark p-4" id="portfolio">
        <h1 class="text-center text-white">Noticias</h1>
        <div style="background-color: rgb(178, 175, 175)">
            <div class="container p-3">
                @forelse ($posts as $post)
                    <div class="card mx-auto m-5 shadow">
                        <a href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}">
                            <img class="card-img-top" src="{{ asset($post->getFirstMediaUrl('post-images')) }}" alt="" srcset="">
                        </a>
                        <hr>
                        <div class="card-body">
                            <h5 class="card-title text-center" >{{ $post->title }}</h5>
                            <p class="card-text text-center">{{ $post->subtitle }}.</p>
                        </div>
                        <div class="card-footer">
                            <small class="test-muted">{{ ucfirst($post->created_at->diffForHumans()).'.' }}</small>
                        </div>
                    </div>
                @empty
                    <div class="card h-100 mx-auto m-4 p-3 text-center shadow">
                        <h1>No hay Noticias</h1>
                    </div>
                @endforelse
            </div>
            <div class="my-3 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</div>
