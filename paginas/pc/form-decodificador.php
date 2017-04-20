<?php
require '../../util/sessoes.php';
$resultado = false;
if (array_key_exists("key", $_GET)) {
    $resultado = $_GET["key"];
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <title>Decodificador de Links</title>
        <link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../bootstrap/css/gerador.css">
        <link rel="stylesheet" type="text/css" href="../../css/vendor.css">
    </head>
    <body>
        <form method="post" action="../../util/pc/processo-decodificador.php">
            <div class="principal">
                <div class="col-lg-6 col-lg-offset-3">
                    <form method="post" action="testador.php">
                        <div class="form-top">                            
                            <div class="form-group">
                                <h2 style="text-align: center; color: black; margin-top: 10px;">Decodificador de Links</h2>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-group">
                                <input type="radio" id="decodificador" name="decodificador" value="1" checked="true"> Punchsub
                                <input style="margin-left: 15px" type="radio" id="decodificador" name="decodificador" value="2"> AnimaKai
                            </div>
                            <div class="form-group">
                                <label>Links Codificados:</label>
                                <textarea class="form-control" id="linksCodificado" name="linksCodificado"></textarea>
                            </div>
                            <?php if ($resultado && existeLinksCodificado()) { ?>
                                <div class="form-group">
                                    <label>Links Decodificados:</label>
                                    <textarea onclick="this.focus();this.select()" class="form-control" id="linksDecodificados" name="linksDecodificados"><?= getLinkCodificado()?></textarea>
                                </div>
                                <?php
                                removerLinkCodificado();
                            }
                            ?>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Decodificar</button>
                            </div>					
                        </div>
                    </form>
                </div>
            </div

        </form>
    </body>
</html>
