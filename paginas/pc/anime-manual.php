<?php ?>
<div class="title-block">
    <h3 class="title">
        Adicionando dados para o post Anime Episódio <span
            class="sparkline bar" data-type="bar"></span>
    </h3>
</div>
<form id="formPost" method="post" action="util/pc/processo-anime-manual.php">
    <div class="card card-block">
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Episódio
                Apartir De: </label>
            <div class="col-sm-2">
                <input name="epStart" id="epStart" type="number"
                       class="form-control boxed" value="1" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link do
                AnimaKai: </label>
            <h7 style="margin-left: 15px">Obs: a pagina onde contém a imagem do
                episódio</h7>
            <div class="col-sm-10">
                <input name="linkAnima" id="linkAnima" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Link do
                AnimeList: </label>
            <h7 style="margin-left: 15px">Obs: a pagina onde contém o nome do
                episódio</h7>
            <div class="col-sm-10">
                <input name="linkAnimeList" id="linkAnimeList" type="text"
                       class="form-control boxed" placeholder="" required>
            </div>
        </div>
        <div class="form-group row"></div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right"> Servidores:
            </label><input
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
                   onclick="serverSelecionado('server4', 'zippyshare')"
                   name="downServer" value="zippyshare"> Zippyshare <input
                   style="margin-left: 15px" type="radio" id="server5"
                   onclick="serverSelecionado('server5', 'userscloud')"
                   name="downServer" value="userscloud"> UsersCloud <input
                   style="margin-left: 15px" type="radio" id="server6"
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
                       class="col-sm-2 form-control-label text-xs-right">Links de
                    Download: </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="linksdwn" id="linksdwn"></textarea>
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
            <input type="hidden" id="linksDown" name="linksDown" >
            <input type="hidden" id="servers" name="servers" >
        </div>
        <div class="form-group row">
            <hr
                style="height: 2px; border: none; color: black; background-color: gray; margin-top: 0px; margin-bottom: 0px;" />
        </div>
        <div style="margin-top: 40px"  class="form-group row">
            <a style="margin-left: 220px" class="btn btn-success" onclick="if (verificar_anime_manual()) {
                        document.getElementById('gerarPost').click();
                    }">Gerar Post</a>
            <a id="gerarPost" href="#" style="display: none" data-toggle="modal" data-target="#modal-media" onclick="enviarLinks(); gerarPost();">Gerar Post</a>
        </div>

    </div>

</form>