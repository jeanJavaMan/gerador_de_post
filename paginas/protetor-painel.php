<?php
require_once("../util/sessoes.php");
require_once("../class/Usuario.php");
require_once("../paginas/acesso-negado.php");
?>
<html>
    <head>
        <title>Home</title>
        <meta name="description" content="Tela de Controle">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/vendor.css">
        <link rel="stylesheet" href="../css/app.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <script src="../js/vendor.js"></script>
        <script src="../js/app.js"></script>
    </head>
    <body>
        <?php
        if (usuarioEstaLogado()) {
            $usuario = getUsuario();
            ?>
            <div class="main-wrapper">
                <div class="app" id="app">
                    <header class="header">
                        <div class="header-block header-block-collapse hidden-lg-up">
                            <button class="collapse-btn" id="sidebar-collapse-btn"><i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <div class="header-block header-block-nav">
                            <ul class="nav-profile">
                                <li class="profile dropdown">
                                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true" aria-expanded="false">
                                        <div class="img"
                                             style="background-image: url('../assets/img/<?= $usuario->getPerfilImagem(); ?>')"></div>
                                        <span class="name"><?= $usuario->getNomeUsuario(); ?></span>
                                    </a>
                                    <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item"
                                           href="../util/logout.php">
                                            <i class="fa fa-power-off icon"></i>
                                            Sair
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </header>
                    <aside class="sidebar">
                        <div class="sidebar-container">
                            <div class="sidebar-header">
                                <div class="brand">
                                    <div class="logo">
                                        <span class="l l1"></span>
                                        <span class="l l2"></span>
                                        <span class="l l3"></span>
                                        <span class="l l4"></span>
                                        <span class="l l5"></span>
                                    </div>
                                    Painel de Controle
                                </div>
                            </div>
                            <nav class="menu">
                                <ul class="nav metismenu" id="sidebar-menu">
                                    <li class="active">
                                        <a href="../home.php">
                                            <i class="fa fa-home"></i>
                                            Inicial
                                        </a>
                                    </li>
                                    <?php
                                    if ($usuario->getId() === 2) {
                                        ?>
                                        <li><a href=""> <i class="fa fa-th-large"></i>
                                                Opções de Post <i class="fa arrow"></i>
                                            </a>
                                            <ul>
                                                <li><a href="../home.php?key=manual">Post Manual PC</a></li>
                                                <li><a href="../home.php?key=filme">Post Filme</a></li>
                                                <li><a href="../home.php?key=anime">Post Anime</a></li>
                                                <li><a href="../home.php?key=anime-manual">Post Anime Episódio</a></li>
                                            </ul></li>

                                        <?php
                                    }
                                    ?>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-th-large"></i>
                                            Meu Arquivos
                                            <i class="fa arrow"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="pc/galeria.php">Galeria de Imagens</a>
                                            </li>
                                            <li>
                                                <a href="up-torrent.php">Up Torrent</a>
                                            </li>
                                            <li>
                                                <a href="protetor-painel.php">Protetor</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>

                    <article class="content">
                        <div class="text-center">
                            <iframe src="http://protetor.therevolution.com.br/anon/login/" height="700" width="1200"></iframe>
                        </div>
                    </article>

                </div>
            </div>
            <?php
        } else {
            acesso_negado("../index.php");
        }
        ?>
    </body>
</html>
