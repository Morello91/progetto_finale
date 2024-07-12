<x-layout>
    <div class="container">
        <!-- Titolo della categoria -->
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <h1 class="display-2">{{ __('categories.head') }}<span class="fst-italic fw-bold">{{ __('categories.' . $category->name) }}</span></h1>
            </div>
        </div>

        <!-- Lista degli articoli della categoria -->
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>{{ __('categories.not_article') }}</h3>
                    @auth
                        <a class="primary-button my-5"
                            href="{{ route('article.create') }}">{{ __('categories.btn_add') }}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
