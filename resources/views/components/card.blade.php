<div class="cardCustom">
    <div class="card__container">
        <article class="card__article">
            <!-- IMMAGINE -->
            <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(400, 400) : '/img/img_cat/cat'.($article->category->id).'.jpeg'}}"
                class="card__img" alt="Immagine dell'articolo {{ $article->title }}">

            <div class="card__data">
                <h5 class="cardTitle">{{ $article->title }}</h5>
                <h6 class="price">{{ $article->price }} €</h6>
                <div class="row">
                    <div class="col-12 text-center"><a href="{{ route('article.show', compact('article')) }}"
                            class="btn primary-button mb-3">{{ __('articles.btn_detail') }}</a></div>
                    <div class="col-12 text-center"><a href="{{ route('byCategory', ['category' => $article->category]) }}"
                            class="btn thertiry-button">{{ __('categories.' . $article->category->name) }}</a></div>
                </div>
            </div>
        </article>
    </div>
</div>
