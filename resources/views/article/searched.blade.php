<x-layout>
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 pt-5">
                <!-- Ricerca effettuata dall'utente -->
                <h1 class="display-2">{{__('search.head')}} <span class="fst-italic fw-bold">{{ $query }}</span></h1>
            </div>
        </div>

        <!-- Lista degli articoli corrispondenti alla ricerca -->
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>{{__('search.not_article')}}</h3>
                    @auth
                        <a class="btn  primary-button my-5" href="{{ route('article.create') }}">{{__('search.btn_add')}}</a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>