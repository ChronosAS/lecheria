<div>
    <div>
        <header class="masthead1">
            {{-- <div class="container"></div> --}}
        </header>
        <section id="portfolio" class="page-section bg-dark">
            <div class="container-lg bg-light p-5 text-center">
                <h1 class="pb-5">{{ $post->title }}</h1>
                <div class="rounded p-5" style="background-color: rgba(0, 0, 0, 0.737)">
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
    </div>
</div>
