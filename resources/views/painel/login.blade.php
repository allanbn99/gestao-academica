<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<title>Login</title>
</head>
<body class="bg-dark">
	<div class="sky-container">
		<div class="sky-login-box">
			<div class="sky-login-header">
				<img src="{{ asset('img/debian-logo.png') }}" class="img-fluid">
			</div>
			<div class="sky-login-body">
				<form method="form" action="{{ route('login') }}">
                    @csrf
					<div class="input-group flex-nowrap mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-dark border-dark text-light" id="addon-wrapping"><i class="fas fa-user"></i></span>
						</div>
						<input type="email" class="form-control bg-dark border-dark text-light" name="email" placeholder="Usuário" aria-label="Username" aria-describedby="addon-wrapping">
					</div>
					<div class="input-group flex-nowrap mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text bg-dark border-dark text-light" id="addon-wrapping"><i class="fas fa-lock"></i></span>
						</div>
						<input type="password" class="form-control bg-dark border-dark text-light" name="password" placeholder="Senha" aria-label="Password" aria-describedby="addon-wrapping">
					</div>
					<button type="submit" class="btn btn-danger btn-block">Entrar</button>
				</form>
			</div>
			<div class="warnings-login mt-4 mb-4 text-danger">
                <!-- Validation Errors -->
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            </div>
		</div>
	</div>
	<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>