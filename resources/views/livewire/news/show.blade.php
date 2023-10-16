<div>
    <div>
        <header class="masthead1">
            {{-- <div class="container"></div> --}}
        </header>
        <section id="portfolio" class="page-section p-4 bg-dark">
            <h1 class="text-light text-center pt-0">{{ $post->title }}</h1>
            <div class="container-lg pb-3 bg-light p-0 text-center">
                <div class="p-4 mb-0" style="background-color: rgba(0, 0, 0, 0.737)">
                    @foreach ($post->getMedia('post-images')->chunk(2) as $set)
                        <div class="row">
                            @foreach($set as $image)
                                <div class="col-sm m-2"><img class="img-fluid rounded mx-auto d-block" src="{{ asset($image->getUrl()) }}" ></div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <div class="m-2 mt-5">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        @if(count($navPosts) != 0)
            <section id="portfolio2" class="page-section p-4" style="background-color: grey">
                <div class="container-lg mt-5">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($navPosts as $post)
                            <div class="col">
                                <div class="card h-100">
                                    <a href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}">
                                        <img class="card-img-top" src="{{ asset(($post->getMedia('post-images')[0]->getUrl())) }}" alt="" srcset="">
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
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
</div>
