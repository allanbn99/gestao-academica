<header class="sky-menu-hidden">
    <button class="btn text-light rounded-0 btn-block" onclick="toggleMenu('display-menu')"><span class="float-left d-inline-block"><i class="fas fa-bars"></i></span></button>
    <div class="sky-menu-vertical" id="display-menu">

        <div class="sky-logo">
            <img src="assets/img/debian-logo.png" class="img-fluid">
        </div>
        
        <a href="#" class="sky-profile">
            <img src="assets/img/user1.jpg" class="img-fluid"> Luís
        </a>
        
        <nav class="sky-navigator">
            <ul class="sky-navbar-vertical-drop">
                <li>
                    <a href="#" onclick="toggleMenu('drop3')"><i class="fas fa-user-graduate"></i> Manter Aluno <span class="float-right d-inline-block"><i class="fas fa-caret-down"></i></span></a>
                    <ul class="sky-dropdown" id="drop3">
                        <li><a href="#" onclick="toggleMenu('drop4')"><i class="fas fa-user-graduate"></i> Cadastrar <span class="float-right d-inline-block"><i class="fas fa-caret-down"></i></span></a>
                            <ul class="sky-dropdown" id="drop4">
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
                        </li>
                        <li>
                            <a href="#">Item 1</a>
                        </li>
                        <li>
                            <a href="#">Item 1</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-address-book"></i> Manter Aula</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calendar"></i> Cronograma de aulas</a>
                </li>
                
                <li>
                    <a href="#"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </li>
            </ul>
        </nav>
        
    </div>
</header>