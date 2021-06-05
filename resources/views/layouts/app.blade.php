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
</head>
<body class="bg-light">
    <div id="app">
        @if (!isset($noSidebar))
            <div class="sky-menu-vertical">
                <a href="{{ route('home') }}" class="sky-logo">
                    <img src="{{ asset('img/logo-smp-white.png') }}" width="100">
                </a>

                <a href="#" class="sky-profile">
                    <div class="d-flex flex-row">
                        <div class="mr-1 d-flex justify-content-center align-items-center"><img src="{{ asset('img/user1.jpg') }}" class="img-fluid"></div>
                        <div class="ml-1 d-flex align-items-center">
                            <div>Skyline be wolf<br><small class="text-muted">Técnico Administrativo</small></div>
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
                                    <!--<li>
                                        <a href="#" onclick="toggleMenu('drop2', 'caret2')">
                                            <i class="fas fa-user-graduate"></i> Cadastrar <span class="float-right d-inline-block"><i id="caret2" class="fas fa-caret-down"></i></span>
                                        </a>
                                        <ul class="sky-dropdown" id="drop2">
                                            <li>
                                                <a href="#"><small><i class="fas fa-dot-circle"></i></small> Sub-Item 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Sub-Item 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Sub-Item 3</a>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li>
                                        <a href="{{ route('curso.index') }}">Curso</a>
                                    </li>
                                </ul>
                            </li>
                        @endrole
                    <!--
                        <li>
                            <a href="#"><i class="fas fa-address-book"></i> Manter Aula</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-calendar"></i> Cronograma de aulas</a>
                        </li>
                    -->
                    </ul>
                </nav>

            </div>

            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container-fluid ">
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

            <div class="sky-main">
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
