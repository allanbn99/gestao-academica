<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/LoginSkyline.css') }}">
	<link rel="stylesheet" href="{{ asset('awesome/css/all.min.css') }}">
	<title>Login</title>
</head>
<body>
	<div class="sky-container">
		<div class="sky-login-box">
			<div class="sky-login-header">
				<img src="{{ asset('img/debian-logo.png') }}" class="img-fluid">
			</div>
			<div class="sky-login-body">
				<form method="post" action="{{ route('login') }}">
                    @csrf
					<div class="input-group flex-nowrap mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-dark border-dark text-light" id="addon-wrapping"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control bg-dark border-dark text-light" name="email" value="{{ old('email') }}" placeholder="Usuário" aria-label="Username" aria-describedby="addon-wrapping">
					</div>
					<div class="input-group flex-nowrap mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-dark border-dark text-light" id="addon-wrapping"><i class="fas fa-lock"></i></span>
						</div>
						<input type="password" class="form-control bg-dark border-dark text-light" name="password" placeholder="Senha" aria-label="Password" aria-describedby="addon-wrapping">
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="form-check-label text-light" for="remember">
								Lembrar-me
							</label>
						</div>
					</div>
					<button type="submit" class="btn btn-danger btn-block">Entrar</button>
					@if (Route::has('password.request'))
                        <a class="btn btn-link btn-block btn-outline-dark text-light" style="text-decoration: none;" href="{{ route('password.request') }}">
                            Esqueceu a senha? clique aqui.
                        </a>
                    @endif
				</form>
			</div>
			<div class="warnings-login mt-4 mb-4 text-danger">
                <!-- Session Status -->
                {{ session('status') }}

                <!-- Validation Errors -->
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
</body>
</html>