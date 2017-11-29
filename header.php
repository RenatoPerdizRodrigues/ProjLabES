<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
    <a class="navbar-brand" href="<?php generateRoute('index.php'); ?>">Xtreme Xcercise</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <?php
                if(getPermission() === '3'):
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Treinador</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php generateRoute('treinador/create.php'); ?>">Cadastrar</a>
                    <a class="dropdown-item" href="<?php generateRoute('treinador/index.php'); ?>">Consultar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuário</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php generateRoute('usuario/create.php'); ?>">Cadastrar</a>
                    <a class="dropdown-item" href="<?php generateRoute('usuario/index.php'); ?>">Consultar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exercício</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php generateRoute('exercicioap/create.php'); ?>">Cadastrar</a>
                    <a class="dropdown-item" href="<?php generateRoute('exercicioap/index.php'); ?>">Consultar</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aparelho</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php generateRoute('aparelho/create.php'); ?>">Cadastrar</a>
                    <a class="dropdown-item" href="<?php generateRoute('aparelho/index.php'); ?>">Consultar</a>
                </div>
            </li>
            <?php
                elseif(getPermission() === '1'):
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rotina</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?php generateRoute('rotina/index.php'); ?>">Cadastrar e Consultar</a>
                </div>
            </li>
            <?php
                endif;
            ?>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php generateRoute('logout.php')?>">Logout</a>
            </li>
        </ul>
    </div>
</nav>