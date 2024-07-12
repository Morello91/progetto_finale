<footer class="text-center mt-5">
    <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
    </div>
    <div class="container text-light text-md-start mt-5">
        <div class="row">
            <div class="col-lg-4 col-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">{{ env('APP_NAME') }}</h5>
                <p>{{ __('ui.descContacts') }}</p>
            </div>
            <div class="col-lg-4 col-12 mb-4 mb-md-0">
                <h5 class="text-uppercase">{{ __('ui.contacts') }}</h5>
                <ul class="list-unstyled mb-0">
                    <li><a href="#!" class="text-light">{{ __('ui.info') }}</a></li>
                    <li><a href="#!" class="text-light">{{ __('ui.phone') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-12 mb-4 mb-md-0">
              {{-- @if
                <h5>Effettua l'accesso!</h5>
                <p>Senza quello non potrai inserire nuovi articoli!</p>
              @elseif (Auth::user()->is_revisor) 
                <h5>Sei un revisore</h5>
                <p>Vai nella sezione "zona revisore" e accetta gli articoli!</p>
              @else --}}
                <h5>{{ __('ui.call_revisor') }}</h5>
                <p>{{ __('ui.desc_revisor') }}</p>
                <a href="{{ route('form.revisor') }}" class="btn thertiry-button">{{ __('ui.btn_revisor') }}</a>
              {{-- @endif --}}
            </div>
        </div>
        <div class="text-center p-3 text-white">
            <p>© 2024 {{ env('APP_NAME') }} | copyright by AuCodeMentin</p>
        </div>
    </div>

</footer>
