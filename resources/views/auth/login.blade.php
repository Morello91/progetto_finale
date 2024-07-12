<x-layout>
    {{-- Form js --}}
    <div class="containerCustom heightCustom">
        <div class="formsContainer">
            <div class="loginRegister">
                <form method="POST" action="/login" class="sign-in-form" id="loginRegisterForm">
                    @csrf
                    <h2 class="title mb-3">{{__('authForm.login')}}</h2>
                    <div class="input-field mb-3">
                        <i class="bi bi-person-fill text-center"></i>
                        <input class="inputCustom" name="email" type="email" placeholder="Username" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <p class="fst-italic text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="input-field mb-3">
                        <i class="bi bi-lock-fill text-center"></i>
                        <input class="inputCustom" name="password" type="password" placeholder="Password">
                    </div>
                    <span class="forgot-password mt-2 mb-2">
                        <a href="{{ route('password.request') }}">{{ __('authForm.forgotten_pass') }}</a>
                    </span>
                    <button class="primary-button mb-3" type="submit">Login</button>
                </form>
                <form method="POST" action="/register" class="sign-up-form" id="loginRegisterForm">
                    @csrf
                    <h2 class="title mb-3">{{__('authForm.register')}}</h2>
                    <div class="input-field mb-3">
                        <i class="bi bi-person-fill text-center"></i>
                        <input class="inputCustom" name="name" type="text" placeholder="Username" value="{{old('name')}}">
                    </div>
                    @error('name')
                        <p class="fst-italic text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="input-field mb-3">
                        <i class="bi bi-envelope-fill text-center"></i>
                        <input class="inputCustom" name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <p class="fst-italic text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="input-field mb-3">
                        <i class="bi bi-lock-fill text-center"></i>
                        <input class="inputCustom" name="password" type="password" placeholder="Password">
                    </div>
                    @error('password')
                        <p class="fst-italic text-danger">
                            {{ $message }}
                        </p>
                    @enderror
                    <div class="input-field mb-3">
                        <i class="bi bi-lock-fill text-center"></i>
                        <input class="inputCustom" name="password_confirmation" type="password" type="password" placeholder="Conferma password">
                    </div>
                    <button class="primary-button mt-2 mb-2" type="submit">{{__('authForm.register')}}</button>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>{{__('authForm.new-user')}}</h3>
                    <p>
                       {{__('authForm.desc-NewUser')}}
                    </p>
                    <button class="secondary-button" id="sign-up-btn">
                        {{__('authForm.register')}}
                    </button>
                </div>
                <img src="{{ asset('img/login.svg') }}" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>{{__('authForm.old-user')}}</h3>
                    <p class="text-center">
                        {{__('authForm.access')}}
                    </p>
                    <button class="secondary-button" id="sign-in-btn">
                        {{__('authForm.login')}}
                    </button>
                </div>
                <img src="{{ asset('img/register.svg') }}" class="image" alt="">
            </div>
        </div>
    </div>

</x-layout>
