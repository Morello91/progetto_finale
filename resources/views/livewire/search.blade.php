<form role="search" action="{{ route('article.search') }}" method="GET" class="d-flex align-items-center" role="search">
    <div class="box">
        <input class="input-search" type="search" name="query" placeholder="{{__('search.placeholder')}}" aria-label="Search">
        <button class="btn-c" type="submit"><i class="bi bi-search"></i></button>
    </div>
</form>
