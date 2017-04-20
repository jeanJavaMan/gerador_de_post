<?php
require_once ("util/sessoes.php");
require_once ("class/Usuario.php");
require_once './class/Util.php';
require_once ("paginas/acesso-negado.php");
$key = "";
if (array_key_exists("key", $_GET)) {
    $key = $_GET["key"];
}
$util_log = new Util\Util();
$dados = $util_log->verificar_logs();
add_log_class($util_log);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Home</title>
        <meta name="description" content="Tela de Controle">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/vendor.css">
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/sweetalert.css">        
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/sweetalert.min.js"></script>
        <script type="text/javascript" src="js/vendor.js"></script>
        <script type="text/javascript" src="js/app.js"></script>         
        <script src="js/gerador.js"></script>        
        <script type="text/javascript" type="text/javascript">
            function liberarLinkCode() {
                var display = document.getElementById("linkDecodi").style.display;
                if (display === "none") {
                    document.getElementById("linkDecodi").style.display = 'block';
                } else {
                    document.getElementById("linkDecodi").style.display = 'none';
                }
            }
            ;
            function serverSelecionado(id, name) {
                serverId = id;
                serverName = name;
                document.getElementById("linksdwn").value = "";
                if (document.getElementById("linksdeco")) {
                    document.getElementById("linksdeco").value = "";
                }
            }
            ;
            function disabilitarRadio() {
                document.getElementById(serverId).disabled = true;
            }
            ;
            var linksDown = [];
            var linksCodi = [];
            var serversId = [];
            var servers = [];
            var serversCodi = [];
            function addLinks() {
                //linksDown[serverName] = document.getElementById("linksdwn").value;
                var valor = document.getElementById("linksdwn").value;
                if (document.getElementById("linksdeco")) {
                    var valor_link_codi = document.getElementById("linksdeco").value;
                    if (valor_link_codi !== "") {
                        serversCodi.push(serverName);
                        serversId.push(serverId);
                        disabilitarRadio();
                        linksCodi.push(valor_link_codi);
                        document.getElementById("linksdeco").value = "\t\t\t\t\t\tLinks Codificado Adicionado com sucesso! Selecione outro servidor para adicionar mais!";
                    }
                }
                if (valor !== "") {
                    linksDown.push(valor);
                    servers.push(serverName);
                    serversId.push(serverId);
                    disabilitarRadio();
                    document.getElementById("linksdwn").value = "\t\t\t\t\t\tAdicionado com sucesso! Selecione outro servidor para adicionar mais!";
                }

            }
            ;

            function enviarLinks() {
                var string_links = linksDown.join("|");
                var string_servers = servers.join("|");
                var string_servers_codi = serversCodi.join("|");
                var string_links_codi = linksCodi.join("|");
                document.getElementById("linksDown").value = string_links;
                document.getElementById("servers").value = string_servers;
                if (document.getElementById("serversCodi")) {
                    document.getElementById("serversCodi").value = string_servers_codi;
                    document.getElementById("linksCodi").value = string_links_codi;
                }

            }
            ;
            function removerLinks() {
                linksDown = [];
                linksCodi = [];
                var i;
                for (i = 0; i < serversId.length; i++) {
                    document.getElementById(serversId[i]).disabled = false;
                }
                servers = [];
                serversCodi = [];
                serversId = [];
                document.getElementById("linksdwn").value = "\t\t\t\t\t\tTodos os Links foram removidos! Clique em algum server para adicionar!";
            }
            ;
            function mostrar_alert(titulo, mensagem, campo_id, tipo) {
                swal({
                    title: titulo,
                    text: mensagem,
                    type: tipo,
                    html: true,
                    confirmButtonText: "OK, Irei verificar agora!",
                    closeOnConfirm: true
                }, function (isConfirm) {
                    if (isConfirm) {
                        document.getElementById(campo_id).focus();
                    }
                }
                );
            }
            function verificar_anime_manual() {
                var animakai_url = document.getElementById('linkAnima').value;
                var animeList_url = document.getElementById('linkAnimeList').value;
                if (animeList_url.indexOf('episode') === -1 || animeList_url === "") {
                    mostrar_alert('Campo AnimeList ERRO', 'Verifique a URL do animeList se possui <strong>/episode</strong>', 'linkAnimeList', 'error');
                    return false;
                }
                if (animakai_url.indexOf('animakai') === -1 || animakai_url === "") {
                    mostrar_alert('Campo Animakai ERRO', 'Verifique a URL do <strong>animakai</strong>', 'linkAnima', 'error');
                    return false;
                }
                if (linksDown.length <= 0 && linksCodi.length <= 0) {
                    mostrar_alert('Links De Download ERRO', 'Links de Download estão em <strong>branco<strong>', 'linksdwn', 'error');
                    return false;
                }
                return true;
            }
            ;

            function verificar_anime() {
                var anbient_url = document.getElementById('linkAnbient').value;
                var animeList_url = document.getElementById('linkAnimeList').value;
                var animakai_url = document.getElementById('linkAnima').value;
                if (anbient_url === "" || anbient_url.indexOf('anbient') === -1) {
                    mostrar_alert('ERRO Campo Anbient', 'Verifique se a URL do anbient estar correta!', 'linkAnbient', 'error');
                    return false;
                }
                if (animeList_url.endsWith('/') || animeList_url === "" || animeList_url.indexOf('episode') !== -1) {
                    mostrar_alert('ERRO Campo Anime List', 'Verifique se a URL do anime List está correta!<br>Provável Erro: Se a URL tiver <strong>/</strong> no final! Remova o <strong>/</strong>, o mesmo se tiver <strong>/episode<strong>', 'linkAnimeList', 'error');
                    return false;
                }
                if (animakai_url.endsWith('/') || animakai_url === "" || animakai_url.indexOf('page') !== -1) {
                    mostrar_alert('ERRO Campo AnimaKai', 'Verifique se a URL do animakai está correta!<br>Provável Erro: Se a URL tiver <strong>/</strong> no final! Remova o <strong>/</strong>, o mesmo se tiver <strong>/page<strong>', 'linkAnima', 'error');
                    return false;
                }
                if (linksDown.length <= 0 && linksCodi.length <= 0) {
                    mostrar_alert('ERRO Links de Download', 'Os links de Download estão vázios', 'linksdwn', 'error');
                    return false;
                }
                return true;
            }
            ;
            /**
             * Função para mostrar as div ou ocultar.
             * @param {type} id
             * @param {type} id_botao 
             * @returns {undefined}
             */
            function mostrar_div(id, id_botao) {
                var display = document.getElementById(id).style.display;
                if (display === "none") {
                    document.getElementById(id).style.display = 'block';
                    document.getElementById(id_botao).textContent = "Ocultar";
                } else {
                    document.getElementById(id).style.display = 'none';
                    document.getElementById(id_botao).textContent = "Visualizar";
                }
            }
            ;

            /**
             * Função que copia o texto do input.
             * @param {type} id
             * @returns {undefined}
             */
            function copiar_dados(id) {
                // Create a "hidden" input
                var textarea = document.createElement("textarea");

                // Assign it the value of the specified element
                //aux.setAttribute("value", document.getElementById(id).value);
                textarea.value = document.getElementById(id).value;

                // Append it to the body
                document.body.appendChild(textarea);

                // Highlight its content
                textarea.select();

                // Copy the highlighted text
                document.execCommand("copy");

                // Remove it from the body
                document.body.removeChild(textarea);
            }
            ;
            /**
             *  Função retorna a key que foi pressionada.
             * @param {type} evt
             * @returns {String}
             */
            function keyPressed(evt) {
                evt = evt || window.event;
                var key = evt.keyCode || evt.which;
                return String.fromCharCode(key);
            }
            ;
            /**
             * Captura as keys pressionadas.
             * @param {type} evt
             * @returns {undefined}
             */
            document.onkeypress = function (evt) {
                var str = keyPressed(evt);
                switch (str) {
                    case "1":
                        copiar_dados("titulo");
                        mostrar_alerta_copiado("Titulo");
                        break;
                    case "2":
                        copiar_dados("code");
                        mostrar_alerta_copiado("Código");
                        break;
                    case "3":
                        copiar_dados("tags");
                        mostrar_alerta_copiado("Tags");
                        break;
                    case "4":
                        copiar_dados("focusKeyword");
                        mostrar_alerta_copiado("FocusKeyWord");
                        break;
                    case "5":
                        copiar_dados("seo");
                        mostrar_alerta_copiado("Meta Descrição");
                        break;
                    default :
                }
            };

            function mostrar_alerta_copiado(qual_foi_copiado) {
                swal({
                    title: qual_foi_copiado.concat(" Copiado com sucesso!"),
                    text: "O campo ".concat(qual_foi_copiado, " foi copiado para área de transferencia!"),
                    timer: 2000,
                    showConfirmButton: false
                });
            }
            ;
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
                            <button class="collapse-btn" id="sidebar-collapse-btn">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <div class="header-block header-block-nav">
                            <ul class="nav-profile">
                                <?php if ($usuario->getId() === 1) { ?>
                                    <li class="notifications new">
                                        <a href="" data-toggle="dropdown"> <i class="fa fa-bell-o"></i> <sup>
                                                <span class="counter"><?= $dados["count"] ?></span>
                                            </sup> </a>
                                        <div class="dropdown-menu notifications-dropdown-menu">
                                            <ul class="notifications-container">
                                                <?php
                                                if ($dados["count"] > 0) {
                                                    for ($i = 0; $i < $dados["count"]; $i++) {
                                                        ?>
                                                        <li>
                                                            <a href="<?= $dados["href"][$i] ?>" class="notification-item">
                                                                <div class="img-col">
                                                                    <div class="img" style="background-image: url('<?= $dados["icon"][$i] ?>')"></div>
                                                                </div>
                                                                <div class="body-col">
                                                                    <p> <span class="accent">Log Encontrado</span> Prévia da Log: <span class="accent"><?= $dados["msg"][$i] ?></span>. </p>
                                                                </div>
                                                            </a>
                                                        </li> 
                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <li>
                                                        <a href="" class="notification-item">
                                                            <div class="img-col">
                                                                <div class="img" style="background-image: url('assets/icon/icon-ok.png')"></div>
                                                            </div>
                                                            <div class="body-col">
                                                                <p> <span class="accent">Sem Logs</span> Nenhum Log encontrado</p>
                                                            </div>
                                                        </a>
                                                    </li> 

                                                    <?php
                                                }
                                                ?>
                                            </ul>
                                            <footer>
                                                <ul>
                                                    <li> <a href="?key=log&type=acesso">
                                                            Ver Log de Acesso
                                                        </a> </li>
                                                </ul>
                                            </footer>
                                        </div>
                                    </li>
                                    <?php
                                }
                                ?>

                                <li class="profile dropdown">
                                    <a class="nav-link dropdown-toggle"
                                       data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="true" aria-expanded="false">
                                        <div class="img"
                                             style="background-image: url('assets/img/<?= $usuario->getPerfilImagem(); ?>'"></div>
                                        <span class="name"><?= $usuario->getNomeUsuario(); ?></span>
                                    </a>
                                    <div class="dropdown-menu profile-dropdown-menu"
                                         aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="util/logout.php"> <i
                                                class="fa fa-power-off icon"></i> Sair
                                        </a>
                                    </div></li>
                            </ul>
                        </div>
                    </header>
                    <aside class="sidebar">
                        <div class="sidebar-container">
                            <div class="sidebar-header">
                                <div class="brand">
                                    <div class="logo">
                                        <span class="l l1"></span> <span class="l l2"></span> <span
                                            class="l l3"></span> <span class="l l4"></span> <span
                                            class="l l5"></span>
                                    </div>
                                    Painel de Controle
                                </div>
                            </div>
                            <nav class="menu">
                                <ul class="nav metismenu" id="sidebar-menu">
                                    <li class="active"><a href="home.php"> <i class="fa fa-home"></i>
                                            Inicial
                                        </a></li>
                                    <?php
                                    if ($usuario->getId() === 2) {
                                        ?>
                                        <li><a href=""> <i class="fa fa-edit"></i>
                                                Opções de Post <i class="fa arrow"></i>
                                            </a>
                                            <ul>
                                                <li><a href="?key=manual">Post Manual PC</a></li>
                                                <li><a href="?key=manualv2">Post Manual PC V2</a></li>
                                                <li><a href="?key=filme">Post Filme</a></li>
                                                <li><a href="?key=anime">Post Anime</a></li>
                                                <li><a href="?key=anime-manual">Post Anime Episódio</a></li>
                                            </ul></li>

                                        <?php
                                    }
                                    ?>
                                    <li><a href=""> <i class="fa fa-th-large"></i>
                                            Meu Arquivos <i class="fa arrow"></i>
                                        </a>
                                        <ul>
                                            <li><a href="paginas/pc/galeria.php">Galeria de Imagens</a></li>
                                            <li><a href="paginas/up-torrent.php">Up Torrent</a></li>
                                            <li><a href="paginas/protetor-painel.php">Protetor</a></li>
                                        </ul></li>
                                </ul>
                            </nav>
                        </div>
                    </aside>

                    <article class="content item-editor-page">
                        <?php
                        if ($usuario->getId() === 1) {
                            if (empty($key)) {
                                include "paginas/android/inicial.php";
                            } else {
                                if ($key == "final") {
                                    include "paginas/android/final.php";
                                } else if ($key == "log") {
                                    include './paginas/android/log.php';
                                }
                            }
                        } else
                        if ($usuario->getId() === 2) {
                            if (empty($key)) {
                                include "paginas/pc/inicial.php";
                            } else {
                                switch ($key) {
                                    case "manual":
                                        include "paginas/pc/manual.php";
                                        break;
                                    case "final":
                                        include "paginas/pc/final.php";
                                        break;
                                    case "anime":
                                        include "paginas/pc/anime.php";
                                        break;
                                    case "anime-manual":
                                        include 'paginas/pc/anime-manual.php';
                                        break;
                                    case "filme":
                                        include './paginas/pc/filme.php';
                                        break;
                                    case "manualv2":
                                        include './paginas/pc/manual-v2.php';
                                        break;
                                    default:
                                        include "paginas/pc/inicial.php";
                                }
                            }
                        }
                        include "paginas/modal.php";
                        ?>
                    </article>

                </div>
            </div>
            <?php
        } else {
            acesso_negado("index.php");
        }
        ?>
    </body>
</html>
