<div>
    <div>
        <header class="masthead1">
            {{-- <div class="container"></div> --}}
        </header>
        <section id="portfolio" class="page-section p-4 bg-dark">
            <div class="container-lg pb-3 bg-light p-0">
                <h1 class="text-light text-center pt-0">{{ $post->title }}</h1>
                {{-- <div class="p-4 mb-0 text-center">
                    @foreach ($post->getMedia('post-images')->chunk(2) as $set)
                        <div class="row">
                            @foreach($set as $image)
                                <div class="col-sm m-2"><img class="img-fluid rounded mx-auto d-block" src="{{ asset($image->getUrl()) }}" ></div>
                            @endforeach
                        </div>
                    @endforeach
                </div> --}}
                <div id="postCarousel" class="carousel carousel-dark bg-secondary slide m-2" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach ($post->getMedia('post-images') as $index => $image)
                            <button type="button" data-bs-target="#postCarousel" data-bs-slide-to="{{ $index }}" @if($index == 0) class="active" aria-current="true" @endif  aria-label="{{ 'Post '.$index }}"></button>
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($post->getMedia('post-images') as $index => $image)
                            <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
                                <img src="{{ $image->getUrl() }}" class="w-auto mx-auto text-center d-block" height="500" width="500" alt="...">
                                <div class="carousel-caption d-none d-md-block bg-secondary bg-opacity-50">
                                    {{-- <h5>{{ $post->title }}</h5> --}}
                                    <p>Pie de foto</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#postCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#postCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="m-4 p-5 mt-5 pb-4">
                    {!! $post->content !!}
                </div>
                <br>
                <br>
            </div>
        </section>
        @if(count($navPosts) != 0)
            <section id="portfolio2" class="page-section p-4" style="background-color: grey">
                <div class="container-lg mt-5">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($navPosts as $post)
                            <div class="col">
                                <div class="card">
                                    <a class="text-decoration-none text-black" href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}">
                                        <img class="card-img-top" src="{{ asset(($post->getMedia('post-images')[0]->getUrl())) }}" alt="" srcset="">
                                        <hr>
                                        <div class="card-body">
                                            <h5 class="card-title text-center" >{{ $post->title }}</h5>
                                            <p class="card-text text-center">{{ $post->subtitle }}.</p>
                                        </div>
                                        <div class="card-footer">
                                            <small class="test-muted">{{ ucfirst($post->created_at->diffForHumans()).'.' }}</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>
</div>
