<nav class="navbar navbar-expand-lg fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('home') }}">
            <img src="{{ asset('img/Logo-navbar-bianco.png') }}" alt="CodeCommerce Logo" class="logo">
            {{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="bi bi-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse d-lg-flex justify-content-between" id="navbarNav">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('article.index') }}">{{ __('ui.article') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>
                    <ul class="dropdown-menu">
                        @foreach ($categories as $category)
                            <li>
                                <a class="dropdown-item text-capitalize"
                                    href="{{ route('byCategory', ['category' => $category->id]) }}">{{ __('categories.' . $category->name) }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown me-3">
                    <a class="nav-item dropdown me-3nav-link" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false"><x-_locale lang="{{ App::currentLocale() }}" /></a>

                    <ul class="dropdown-menu dropdown-menu-start">
                        <div class="d-flex">
                            @if (App::currentLocale() != 'en')
                                <li class="nav-item m-auto"><x-_locale lang="en" /></li>
                            @endif
                            @if (App::currentLocale() != 'it')
                                <li class="border-end"></li>
                                <li class="nav-item m-auto"><x-_locale lang="it" /></li>
                            @endif
                            <li class="border-start"></li>
                            @if (App::currentLocale() != 'es')
                                <li class="nav-item m-auto"><x-_locale lang="es" /></li>
                            @endif
                        </div>
                    </ul>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <livewire:search />
                </li>
            </ul>

            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link text-white dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown"><i class="bi bi-person"></i>
                            {{ auth()->user()->name ?? 'Utente' }}</a>

                        @if (Auth::user()->is_revisor && \App\Models\Article::toBeRevisedCount() != 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ \App\Models\Article::toBeRevisedCount() }}
                            </span>
                        @endif
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if (Auth::user()->is_revisor)
                                <li class="nav-item text-white">
                                    <a class="dropdown-item" href="{{ route('revisor.index') }}">Zona revisore
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                            @endif
                            <li>
                                <a class="dropdown-item" href="#"
                                    onclick="
                                event.preventDefault();
                                  getElementById('form-logout').submit();
                                ">
                                    Logout
                                </a>
                            </li>
                            <form id="form-logout" method="POST" action="/logout" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/login">{{ __('authForm.singIn-singUp') }}</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
