<?php ?>
<div class="title-block">
    <h3 class="title">
        Adicionando Post de Anime <span class="sparkline bar"
                                        data-type="bar"></span>
    </h3>
</div>
<form id="formPost" method="post" action="util/pc/processo-anime.php">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link do
                Anbient: </label>
            <div class="col-sm-10">
                <input name="linkAnbient" id="linkAnbient" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link do
                Anime List: </label>
            <div class="col-sm-6">
                <input name="linkAnimeList" id="linkAnimeList" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
            <label style="margin-left: 40px">Quantidade de Página:</label>
            <div class="col-sm-2" style="float: right;">
                <input class="form-control col-sm-2" name="quantList" id="quantList" type="number" value="1">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link do
                AnimaKai: </label>
            <div class="col-sm-6">
                <input name="linkAnima" id="linkAnima" type="text"
                       class="form-control boxed" placeholder="" required>

            </div>
            <label style="margin-left: 40px">Quantidade de Página:</label>
            <div class="col-sm-2" style="float: right;">
                <input class="form-control col-sm-2" name="quantAnima" id="quantAnime" type="number" value="1">
            </div>
        </div>
        <div class="form-group row"></div>
        <div class="form-group row">
            <hr
                style="height: 2px; border: none; color: black; background-color: gray; margin-top: 0px; margin-bottom: 0px;" />
        </div>
        <div class="form-group row">
            <input style="margin-left: 225px" onclick="liberarLinkCode();" type="checkbox" value="false"> Adicionar Links Codificados?
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Servidores:
            </label> <input
                style="margin-left: 15px" type="radio" id="server9"
                onclick="serverSelecionado('server9', 'link-direto123')" name="downServer"
                value="link-direto123"> Link Direto
            <input style="margin-left: 15px" type="radio" id="server1"
                   onclick="serverSelecionado('server1', 'mega')" name="downServer"
                   value="mega"> Mega <input style="margin-left: 15px" type="radio"
                   id="server2" onclick="serverSelecionado('server2', 'uptobox')"
                   name="downServer" value="uptobox"> UpToBox <input
                   style="margin-left: 15px" type="radio" id="server3"
                   onclick="serverSelecionado('server3', 'file4go')" name="downServer"
                   value="file4go"> File4Go <input style="margin-left: 15px"
                   type="radio" id="server4"
                   onclick="serverSelecionado('server4', 'zippyshare')" name="downServer"
                   value="zippyshare"> Zippyshare <input style="margin-left: 15px"
                   type="radio" id="server5"
                   onclick="serverSelecionado('server5', 'userscloud')" name="downServer"
                   value="userscloud"> UsersCloud <input style="margin-left: 15px"
                   type="radio" id="server6"
                   onclick="serverSelecionado('server6', 'uppit')" name="downServer"
                   value="uppit"> Uppit <input style="margin-left: 15px" type="radio"
                   id="server7" onclick="serverSelecionado('server7', 'drive')"
                   name="downServer" value="drive"> Google drive <input
                   style="margin-left: 15px" type="radio" id="server8"
                   onclick="serverSelecionado('server8', 'usersfile')" name="downServer"
                   value="usersfile"> UsersFile 
        </div>
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Links de Download:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="linksdwn" id="linksdwn"></textarea>
            </div>
        </div>
        <div class="col-sm-10 form-group row" id="linkDecodi" style="display: none">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Links Para Decodificar:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="linksdeco" id="linksdeco"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <a style="margin-left: 220px" class="btn btn-primary"
               onclick="addLinks()">Adicionar Links</a>
            <a style="margin-left: 300px" class="btn btn-warning"
               href="paginas/pc/form-decodificador.php" target="_blank">Decodificador</a>
            <a
                style="float: right; margin-right: 40px" class="btn btn-danger"
                onclick="removerLinks()">Remover Links</a>
        </div>
        <div class="form-group row">
            <hr
                style="height: 2px; border: none; color: black; background-color: gray; margin-top: 0px; margin-bottom: 0px;" />
        </div>
        <div class="form-group row">
            <input type="hidden" id="linksDown" name="linksDown" >
            <input type="hidden" id="servers" name="servers" >
            <input type="hidden" id="serversCodi" name="serversCodi" >
            <input type="hidden" id="linksCodi" name="linksCodi">
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link da
                Imagem 1: </label>
            <div class="col-sm-10">
                <input name="linkimg1" id="linkimg1" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link da
                Imagem 2: </label>
            <div class="col-sm-10">
                <input name="linkimg2" id="linkimg2" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link da
                Imagem 3: </label>
            <div class="col-sm-10">
                <input name="linkimg3" id="linkimg3" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Trailer: </label>
            <div class="col-sm-10">
                <input name="linkyoutube" id="linkyoutube" type="text"
                       class="form-control boxed">
            </div>
        </div>
        <div class="form-group row">
            <a style="margin-left: 220px" onclick="if (verificar_anime()) {
                        document.getElementById('gerarPost').click();
                    }
                    ;"
               class="btn btn-success">Gerar Post</a>
            <a id="gerarPost" href="#" style="display: none" data-toggle="modal" data-target="#modal-media"
               onclick="enviarLinks(); gerarPost()">Gerar Post</a>
        </div>
    </div>
</form>
