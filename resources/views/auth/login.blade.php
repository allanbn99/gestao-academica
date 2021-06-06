@extends('layouts.app', ['noSidebar' => true])

@section('content')
<div class="sky-container">
    <div class="sky-login-box">
        <div class="sky-login-header mb-4">
            <img src="{{ asset('img/logo-dark.png') }}">
        </div>

        <div class="sky-login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-light text-danger" id="addon-wrapping"><i class="fas fa-user"></i></span>
                    </div>

                    <input id="email" type="email" class="form-control bg-light border-light text-dark @error('email') is-invalid @enderror" name="email" placeholder="Digite o seu email" aria-label="Email" aria-describedby="addon-wrapping" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-light text-danger" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                    </div>

                    <input id="password" type="password" class="form-control bg-light border-light text-dark @error('password') is-invalid @enderror" name="password" placeholder="Digite sua senha" aria-label="Password" aria-describedby="addon-wrapping" required autocomplete="current-password">
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label text-dark" for="remember">
                        {{ __('Manter-me conectado') }}
                    </label>
                </div>

                <button type="submit" class="btn btn-danger btn-block mt-2">
                    {{ __('Entrar') }}
                </button>

                {{-- <div class="form-group row mb-0">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div> --}}
            </form>
        </div>
    </div>
</div>

@error('email')
    <div class="toast bg-danger position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
        <div class="toast-body text-white">
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ $message }}
        </div>
    </div>
@enderror

@endsection
