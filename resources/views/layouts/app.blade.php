<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/resources/css/app.css" rel="stylesheet">

</head>
<body class="bg-light">
    <div id="app">
        @if (!isset($noSidebar))
            <div class="sky-menu-vertical">

                <div class="row p-2 d-flex justify-content-center align-items-center">
                    <a href="{{ route("home") }}" class="col d-flex justify-content-center align-items-center">
                        <img src="{{ asset('img/logo-smp-white.png') }}" width="77">
                    </a>
                    <button class="btn sky-btn-closemenu float-right mr-3"><i class="fas fa-times text-light"></i></button>
                </div>

                <a href="#" class="sky-profile">
                    <div class="d-flex flex-row">
                        <div class="mr-1 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('img/profile-pic.jpg') }}" class="img-fluid">
                        </div>
                        <div class="ml-1 d-flex align-items-center">
                            <div>
                                {{ auth()->user()->pessoa()->nome ?? 'Anônimo' }}<br>
                                <small class="text-muted">
                                    {{ auth()->user()->pessoa()->tipoPerfil()->nome_perfil ?? 'Não Informado' }}
                                </small>
                            </div>
                        </div>
                    </div>
                </a>
                
                <nav class="sky-navigator">
                    <ul class="sky-navbar-vertical-drop">
                        @role('TecnicoAdministrativo')
                            <li>
                                <a href="#" onclick="toggleMenu('drop1', 'caret1')">
                                    <i class="fas fa-user-graduate"></i> Secretaria <span class="float-right d-inline-block"><i id="caret1" class="fas fa-caret-down"></i></span>
                                </a>
                                <ul class="sky-dropdown" id="drop1">
                                    <li>
                                        <a href="{{ route('curso.index') }}">Curso</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('disciplina.index') }}">Disciplina</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('funcionario.index') }}">Disciplina</a>
                                    </li>
                                </ul>
                            </li>
                        @endrole
                    </ul>
                </nav>

            </div>

            <div class="sky-main">

                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        <button class="btn sky-btn-hidden"><i class="fas fa-bars"></i></button>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb sky-breadcrumb pl-4">
                        @yield('breadcrumb')
                    </ol>
                </nav>

                @yield('content')
            </div>
        @else
            @yield('content')
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script>
        //Troca de lado a seta do menu dropdown e mostra/não mostra o submenu
		function toggleMenu(idElement, idIcon){
			let menu = document.getElementById(idElement);
			menu.style.display = menu.style.display == 'block' ? 'none': 'block';
            if(idIcon != null){
                document.getElementById(idIcon).classList.toggle('fa-caret-up');
            }
		}

        //Ao clicar no botao faz aparecer o menu
        document.querySelector('.sky-btn-hidden').addEventListener('click', function(){
            document.querySelector('.sky-menu-vertical').style.display = 'block';
        });

        //Ao clicar no botao faz o menu desaparecer
        document.querySelector('.sky-btn-closemenu').addEventListener('click', function(){
            document.querySelector('.sky-menu-vertical').style.display = 'none';
        });
	</script>

    @stack('scripts')
</body>
</html>
