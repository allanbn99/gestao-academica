@extends('layouts.app', ['noSidebar' => true])

@section('content')
<div class="sky-container">
    <div class="sky-login-box">
        <div class="sky-login-header mb-4">
            <img src="{{ asset('img/logo-dark.png') }}">
        </div>

        <div class="sky-login-body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group flex-nowrap mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-light border-light text-danger" id="addon-wrapping"><i class="fas fa-user"></i></span>
                    </div>

                    <input id="email" type="email" class="form-control bg-light border-light text-dark @error('email') is-invalid @enderror" name="email"placeholder="Digite o seu email" aria-label="Email" aria-describedby="addon-wrapping" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </div>

                <button type="submit" class="btn btn-danger btn-block mt-2">
                    {{ __('Solicitar troca de senha') }}
                </button>
            </form>
        </div>
    </div>
</div>

@if (session('status'))
    <div class="toast bg-warning position-absolute" style="top:15px;right:15px;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
        <div class="toast-body text-dark">
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session('status') }}
        </div>
    </div>
@endif

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
