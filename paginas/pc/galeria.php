<?php
require_once("../../util/sessoes.php");
require_once("../../class/Usuario.php");
require_once("../../paginas/acesso-negado.php");
$limit = 20;
if(array_key_exists("limit",$_GET)){
    $limit = $_GET["limit"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta name="description" content="Tela de Controle">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/vendor.css">
    <link rel="stylesheet" href="../../css/app.css">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <script src="../../js/vendor.js"></script>
    <script src="../../js/app.js"></script>
    <script type="text/javascript">
        function pegaLinkImagem(link) {
            document.getElementById("linkDaImagem").value = link;
        }
    </script>
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
                                     style="background-image: url('../../assets/img/<?= $usuario->getPerfilImagem(); ?>')"></div>
                                <span class="name"><?= $usuario->getNomeUsuario(); ?></span>
                            </a>
                            <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item"
                                   href="../../util/logout.php">
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
                                <a href="../../home.php">
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
									<li><a href="../../home.php?key=manual">Post Manual PC</a></li>
									<li><a href="../../home.php?key=anime">Post Anime</a></li>
									<li><a href="../../home.php?key=anime-manual">Post Anime Episódio</a></li>
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
                                        <a href="galeria.php">Galeria de Imagens</a>
                                    </li>
                                    <li>
                                        <a href="../up-torrent.php">Up Torrent</a>
                                    </li>
                                    <li>
                                        <a href="../protetor-painel.php">Protetor</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <article class="content">
                <div class="images-container">
                    <div class="row">
                        <?php
                        $imagens = glob("../../img/*.*");
                        for ($i = 1; $i < count($imagens); $i++) {
                            if($limit == $i){
                                break;
                            }
                            $imagem = $imagens[$i];
                            ?>
                            <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                                <div class="image-container">
                                    <a href="#"
                                       onclick="pegaLinkImagem('<?= 'http://protetor.therevolution.com.br/mrandroid/gerador/' . str_replace('../', '', $imagens[$i]) ?>')"
                                       data-toggle="modal" data-target="#modal-media"><img class="image"
                                                                                           src="<?= $imagem ?>"></a>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>

            </article>

        </div>
    </div>
    <!--Modal -->
    <div class="modal fade" id="modal-media">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Link Da Imagem</h4></div>
                <div class="text-center col-sm-12">
                    <label>Link:</label>
                    <input id="linkDaImagem" type="text" class="form-control" onclick="this.focus();this.select()">
                </div>
                <div class="modal-footer"></div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php
} else {
    acesso_negado("../../index.php");
}
?>
</body>
</html>
