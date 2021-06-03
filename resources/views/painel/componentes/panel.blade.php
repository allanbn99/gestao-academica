<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Painel @yield('title')</title>
</head>
<body>

    <div class="sky-container">

        @include('painel.componentes.menu-vertical')

        <div class="sky-main">
            @include('painel.componentes.menu-vertical-hidden')
            @include('painel.componentes.breadcumb')
            @include('painel.componentes.content')
            @include('painel.componentes.footer')
        </div>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
		function toggleMenu(idElement, idIcon){
			let menu = document.getElementById(idElement);
			menu.style.display = menu.style.display == 'block' ? 'none': 'block';
            if(idIcon != null){
                document.getElementById(idIcon).classList.toggle('fa-caret-up');
            }
		}
	</script>
    @stack('scripts')

</body>
</html>