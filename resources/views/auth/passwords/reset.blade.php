@extends('layouts.app', ['noSidebar' => true])

@section('content')
<div class="sky-container">
    <div class="sky-login-box">
        <div class="sky-login-header mb-4">
            <img src="{{ asset('img/logo-dark.png') }}">
        </div>

        <div class="sky-login-body">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-light text-danger" id="addon-wrapping"><i class="fas fa-user"></i></span>
                    </div>

                    <input id="email" type="email" class="form-control bg-light border-light text-dark @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" aria-label="Email" aria-describedby="addon-wrapping" required autocomplete="email" autofocus>
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-light text-danger" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                    </div>

                    <input id="password" type="password" class="form-control bg-light border-light text-dark @error('password') is-invalid @enderror" name="password" placeholder="Digite sua nova senha" aria-label="Password" aria-describedby="addon-wrapping" required autocomplete="new-password">
                </div>

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-light text-danger" id="addon-wrapping"><i class="fas fa-lock"></i></span>
                    </div>

                    <input id="password-confirm" type="password" class="form-control bg-light border-light text-dark" name="password_confirmation" placeholder="Confirme sua senha" aria-describedby="addon-wrapping" required autocomplete="new-password">
                </div>

                <button type="submit" class="btn btn-danger btn-block mt-2">
                    {{ __('Trocar senha') }}
                </button>
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

@error('password')
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
