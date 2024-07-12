<x-layout>

    <div class="container heightCustom">
        <!-- Titolo -->
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1">{{ __('articles.all_articles') }}</h1>
            </div>
        </div>
        
        <!-- Lista degli articoli -->
        <div class="row height-custom justify-content-center align-items-center py-5">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 mb-4">
                    <x-card :article="$article" :categories="$categories" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        Non sono ancora stati creati articoli
                    </h3>
                </div>
            @endforelse
        </div>

        <!-- Paginazione -->
        <div class="d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    </div>

</x-layout>