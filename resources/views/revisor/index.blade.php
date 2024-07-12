<x-layout>
    <div class="container-fluid">

        @if (session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-5 alert alert-success text-center shadow rounded">
                    {{ session('message') }}
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="display-5 text-center pb-2">
                    {{ __('revisor.dashboard') }}
                </h1>
            </div>
        </div>

        @if ($article_to_check)
            @foreach ($article_to_check->images as $key => $image)
                <div class="row">
                    <div class="col-7 card">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ $image->getUrl(400, 400) }}" class="img-fluid rounded-start"
                                    alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                            </div>
                            <div class="col-md-8 ps-3">
                                <div class="card-body">
                                    <h5 class="card-title">Ratings</h5>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->adult }}">
                                            </div>
                                        </div>
                                        <div class="col-10">adult</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->violence }}">
                                                <!-- Icon or symbol for 'violence' rating -->
                                            </div>
                                        </div>
                                        <div class="col-10">violence</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->spoof }}">
                                                <!-- Icon or symbol for 'spoof' rating -->
                                            </div>
                                        </div>
                                        <div class="col-10">spoof</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->racy }}">
                                                <!-- Icon or symbol for 'racy' rating -->
                                            </div>
                                        </div>
                                        <div class="col-10">racy</div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-2">
                                            <div class="text-center mx-auto {{ $image->medical }}">
                                                <!-- Icon or symbol for 'medical' rating -->
                                            </div>
                                        </div>
                                        <div class="col-10">medical</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($loop->first)
                        <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                            <h1>{{ $article_to_check->title }}</h1>
                            <h3>{{ __('revisor.author') }} : {{ $article_to_check->user->name ?? null }}</h3>
                            <h4>{{ __('categories.price') }} {{ $article_to_check->price }}€</h4>
                            <h4 class="fst-italic text-muted">{{ __('categories.category') }} {{ $article_to_check->category->name }}</h4>
                            <p class="h6">{{ __('categories.description') }} : {{ $article_to_check->description }}</p>
                        </div>
                    @endif
                </div>
            @endforeach
                <div class="d-flex justify-content-center align-item-center margin-custom">
                    <div class="col-4 my-5 mb-5">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="btn btn-danger py-2 px-5 fw-bold">{{ __('revisor.btn_delete') }}</button>
                        </form>
                    </div>
                    <div class="col-4 my-5 mb-5">
                        @if ($latest_article)
                            <div class="col-3">
                                <form action="{{ route('rollback', ['article' => $latest_article]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button
                                        class="btn btn-warning py-2 px-5 fw-bold">{{ __('revisor.btn_last') }}</button>
                                </form>
                            </div>
                        @endif
                    </div>
                    <div class="col-4 my-5 mb-5">
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="btn btn-success py-2 px-5 fw-bold">{{ __('revisor.btn_accept') }}</button>
                        </form>
                    </div>
                </div>
    </div>
@else
    <div class="row justify-content-center align-items-center height-custom text-center">
        <div class="col-12">
            <h1 class="fst-italic display-4">
                {{ __('revisor.head') }}
            </h1>
        </div>
    </div>
    <div class="row">
        @if ($latest_article)
            <div class="col-md-6 col-12">
                <a href="{{ route('home') }}" class="mt-5 primary-button">{{ __('revisor.btn_back') }}</a>
            </div>

            <div class="col-md-6 col-12">
                <form action="{{ route('rollback', ['article' => $latest_article]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button class="btn thertiry-button py-2 px-5 fw-bold">{{ __('revisor.btn_last') }}</button>
                </form>
            </div>
        @endif
    </div>
    @endif


    {{-- @if ($article_to_check)
            <div class="row justify-content-center py-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">

                        @if ($article_to_check->images->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow"
                                        alt="immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}'">
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    <img src="https://picsum.photos/308" class="img-fluid rounded shadow"
                                        alt="immagine segnaposto">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="d-flex justify-content-center align-item-center">
                        <div class="col-4">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button
                                    class="btn btn-danger py-2 px-5 fw-bold">{{ __('revisor.btn_delete') }}</button>
                            </form>
                        </div>
                        <div class="col-4">
                            @if ($latest_article)
                                <div class="col-3">
                                    <form action="{{ route('rollback', ['article' => $latest_article]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="btn btn-warning py-2 px-5 fw-bold">{{ __('revisor.btn_last') }}</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div class="col-4">
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button
                                    class="btn btn-success py-2 px-5 fw-bold">{{ __('revisor.btn_accept') }}</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic display-4">
                        {{ __('revisor.head') }}
                    </h1>
                </div>
            </div>
            <div class="row">
                @if ($latest_article)
                    <div class="col-md-6 col-12">
                        <a href="{{ route('home') }}" class="mt-5 primary-button">{{ __('revisor.btn_back') }}</a>
                    </div>

                    <div class="col-md-6 col-12">
                        <form action="{{ route('rollback', ['article' => $latest_article]) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button class="btn thertiry-button py-2 px-5 fw-bold">{{ __('revisor.btn_last') }}</button>
                        </form>
                    </div>
                @endif
            </div>
        @endif --}}
    </div>
</x-layout>
