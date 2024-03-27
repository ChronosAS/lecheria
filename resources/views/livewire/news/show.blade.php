<div>
    <div>
        <header class="masthead1">
            {{-- <div class="container"></div> --}}
        </header>
        <section id="portfolio" class="page-section p-4" style="background-color: grey">
            <div class="container-lg pb-3 bg-light p-0 shadow-lg border rounded">
                <h1 class="text-center m-2 p-2">{{ ucfirst($post->title) }}</h1>
                <p class="text-start px-3">Creado el: {{ $post->postedAt }}</p>
                {{-- <div class="p-4 mb-0 text-center">
                    @foreach ($post->getMedia('post-images')->chunk(2) as $set)
                        <div class="row">
                            @foreach($set as $image)
                                <div class="col-sm m-2"><img class="img-fluid rounded mx-auto d-block" src="{{ asset($image->getUrl()) }}" ></div>
                            @endforeach
                        </div>
                    @endforeach
                </div> --}}
                @if($images)
                    <div id="postCarousel" class="carousel bg-dark slide m-2" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($images as $index => $image)
                                <button type="button" data-bs-target="#postCarousel" data-bs-slide-to="{{ $index }}" @if($index == 0) class="active" aria-current="true" @endif  aria-label="{{ 'Post '.$index }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($post->getMedia('post-images') as $index => $image)
                                <div class="carousel-item {{ ($index == 0) ? 'active' : '' }}">
                                    <img src="{{ $image->getUrl() }}" class="w-50 mx-auto text-center d-block img-thumbnail" alt="...">
                                    <div class="carousel-caption d-none d-md-block bg-secondary bg-opacity-50">
                                        {{-- <h5>{{ $post->title }}</h5> --}}
                                        <p>{{ $image->getCustomProperty('description') }}</p>
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
                @endif
                <div class="m-4 p-5 mt-5 pb-4">
                    {!! $post->content !!}
                </div>
                <br>
                <br>
            </div>
        </section>
        @if(count($navPosts) != 0)
            <section id="portfolio2" class="page-section bg-dark">
                <div class="container-lg mt-2 text-center">
                    <div class="row row-cols-1 row-cols-md-{{ count($navPosts) }} g-2">
                        @foreach ($navPosts as $post)
                            <div class="col">
                                <div class="card shadow-md mx-auto" style="max-width: 20rem;">
                                    <a class="text-decoration-none text-black" href="{{ route('news.show',[ 'post' => $post->id, 'slug' => $post->slug ]) }}">
                                        <img class="card-img-top img-thumbnail" src="{{ asset($post->getFirstMediaUrl('post-images')) }}" alt="" srcset="">
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
