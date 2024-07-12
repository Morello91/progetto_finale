<x-layout>
    <div class="containerCustom heightCustom">
        <div class="formsContainer">
            <div class="forgotPassword">
                
                <form method="POST" action="/reset-password" class="sign-in-form" id="loginRegisterForm">
                    <h2 class="title mb-3">Crea nuova password</h2>
                    @csrf
                    <input type="hidden" name="token" value="{{request()->route('token')}}">
                    <div class="input-field mb-3">
                        <i class="bi bi-person-fill text-center"></i>
                        <input class="inputCustom" name="email" type="email" placeholder="Email" value="{{old('email')}}">
                    </div>
                    <div class="input-field mb-3">
                        <i class="bi bi-lock-fill text-center"></i>
                        <input name="password" type="password" class="inputCustom" placeholder="Password">
                    </div>
                    <div class="input-field">
                        <i class="bi bi-lock-fill text-center"></i>
                        <input name="password_confirmation" type="password" class="inputCustom" placeholder="Ripeti password">
                    </div>
                    <button class="primary-button mb-3 mt-3" type="submit">Reimposta password</button>
                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Imposta la nuova password</h3>
                    <p>
                        Mi raccomando, una che ti ricordi!
                    </p>
                </div>
                <img src="{{ asset('img/reset-password.svg') }}" class="image" alt="">
            </div>
        </div>
    </div>
</x-layout>
