<x-layout>

    <!-- Titolo dell'articolo -->
    <div class="justify-content-center align-items-center text-center pt-5 pb-3">
        <h1 class="heading">{{ __('categories.title') }}</h1>
    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="container-custom container">
            <!-- Contenuto dell'articolo -->
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-6 mb-3">
                    @if ($article->images->count() > 0)
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                                @foreach ($article->images as $key => $image)
                                    <div class="carousel-item @if ($loop->first) active @endif">
                                        <img src="{{ $image->getUrl(400, 400) }}" class="d-block w-100 rounded shadow"
                                            alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                    </div>
                                @endforeach
                            </div>
                            @if ($article->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="{{ '/img/img_cat/cat' . $article->category->id . '.jpeg' }}" class="img-fluid"
                            alt="Nessuna foto inserita dall'utente">
                    @endif
                </div>
                <!-- Dettagli dell'articolo -->
                <div class="col-12 col-md-6 mb-3 height-custom text-start">
                    <h2 class="display-5"><span class="fw-bold">{{ __('categories.object') }}
                        </span>{{ $article->title }}
                    </h2>
                    <div class="d-flex flex-column justify-content-center h-75">
                        <h4 class="fw-bold mb-5">{{ __('categories.price') }} {{ $article->price }} €</h4>
                        <h5 class="fw-bold">{{ __('categories.description') }}</h5>
                        <p>{{ $article->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- 
    <div class="container">
        <!-- Contenuto dell'articolo -->
        <div class="row height-custom justify-content-center py-5">
            <!-- Carousel delle immagini -->
            <div class="col-12 col-md-6 mb-3">
                @if ($article->images->count() > 0)
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            @foreach ($article->images as $key => $image)
                                <div class="carousel-item @if ($loop->first) active @endif">
                                    <img src="{{ $image->getUrl(400, 400) }}" class="d-block w-100 rounded shadow"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        </div>
                        @if ($article->images->count() > 1)
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                @else
                    <img src="{{ './img/img_cat/cat' . $article->category->id . '.jpeg' }}"
                        alt="Nessuna foto inserita dall'utente">
                @endif
            </div>
        </div>

        <!-- Dettagli dell'articolo -->
        <div class="col-12 col-md-6 mb-3 height-custom text-start">
            <h2 class="display-5"><span class="fw-bold">{{ __('categories.object') }} </span>{{ $article->title }}
            </h2>
            <div class="d-flex flex-column justify-content-center h-75">
                <h4 class="fw-bold mb-5">{{ __('categories.price') }} {{ $article->price }} €</h4>
                <h5 class="fw-bold">{{ __('categories.description') }} :</h5>
                <p>{{ $article->description }}</p>
            </div>
        </div>
    </div> --}}
</x-layout>
