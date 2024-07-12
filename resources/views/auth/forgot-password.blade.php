<x-layout>
    <div class="containerCustom heightCustom">
        <div class="formsContainer">
            <div class="forgotPassword">
                <form method="POST" action="{{ route('password.email') }}" class="sign-in-form" id="loginRegisterForm">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf
                    <h2 class="title mb-3">Password dimenticata?</h2>
                    <div class="input-field mb-4">
                        <i class="bi bi-lock-fill text-center"></i>
                        <input name="email" type="email" class="inputCustom" placeholder="E-mail"
                            value="{{ old('email') }}">
                    </div>
                    <button class="primary-button mb-3" type="submit">Reimposta password</button>

                </form>
            </div>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Hai dimenticato la password?</h3>
                    <p>
                        Recuperala al volo, ma mi raccomando, non dimenticarla ancora!
                    </p>
                </div>
                <img src="{{ asset('img/forgot-password.svg') }}" class="image" alt="" />
            </div>
        </div>
    </div>
</x-layout>
