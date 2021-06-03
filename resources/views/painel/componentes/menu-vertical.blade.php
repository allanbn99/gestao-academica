<div class="sky-menu-vertical">
		
    <div class="sky-logo">
        <img src="{{ asset('img/debian-logo.png') }}" class="img-fluid">
    </div>
    
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
                        <a href="#">Aluno</a>
                    </li>
                    <li>
                        <a href="#">Funcionário</a>
                    </li>
                    <li>
                        <a href="#">Curso</a>
                    </li>
                    <li>
                        <a href="#">Disciplina</a>
                    </li>
                </ul>
            </li>
        <!--
            <li>
                <a href="#"><i class="fas fa-address-book"></i> Manter Aula</a>
            </li>
            <li>
                <a href="#"><i class="fas fa-calendar"></i> Cronograma de aulas</a>
            </li>
        -->
            <li>
                <a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </li>
        </ul>
    </nav>
    
</div>