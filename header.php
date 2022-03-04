<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    wp_head();
    ?>
</head>
<body>
    <div class="container-fluid header">
        <header class="navbar d-flex flex-wrap align-items-center justify-content-between">
            <div class="ml-auto justify-content-center">
                <a href="#" class="active">
                    <span>
                        <img src="<?php site_icon_url(); ?>" alt="Logo Tornus" class="img-fluid navbar-logo">
                    </span>
                </a>
            </div>
            <div class="ml-auto">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <button class="btn btn-white m-1 rounded-pill">
                            <a href="#" class="nav-link disabled">Página Inicial</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn es-blue-bg can-click m-1 rounded-pill">
                            <a href="#" class="nav-link text-white">Sobre Nós</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn es-blue-bg can-click m-1 rounded-pill">
                            <a href="#" class="nav-link text-white">Fale Conosco</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn es-pink-bg can-click m-1 rounded-pill">
                            <a href="#" class="nav-link text-white">Cadastre-se</a>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="btn es-blue-bg can-click m-1 rounded-pill">
                            <a href="#" class="nav-link text-white">Login</a>
                        </button>
                    </li>
                </ul>
            </div>
        </header>
    </div>