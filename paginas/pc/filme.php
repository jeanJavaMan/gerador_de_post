<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="title-block">
    <h3 class="title">
        Adicionando dados para o post de Filme <span class="sparkline bar" data-type="bar"></span>
    </h3></div>
<form id="formPost" method="post" enctype="multipart/form-data" action="util/pc/processo-filme.php">
    <div class="card card-block">
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Nome do Filme:
            </label>
            <div class="col-sm-10"><input name="nomeFilme" id="nomeFilme" type="text" class="form-control boxed" required></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Imagem Capa:
            </label>
            <div class="col-sm-10"><input name="imgCapa" type="text" class="form-control boxed"></div>
        </div>
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Introducao:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="introducao" id="introducao"></textarea>
            </div>
        </div> 
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Informações:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="informacoes" id="informacoes"></textarea>
            </div>
        </div>  
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Sinopse:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="sinopse" id="sinopse"></textarea>
            </div>
        </div>
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Elenco:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="elenco" id="elenco"></textarea>
            </div>
        </div>
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Dados Técnicos:
                </label>
                <textarea style="margin-left: 208px" class="form-control"
                          name="dados" id="dados"></textarea>
            </div>
        </div>
        <div class="form-group row">

        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Imagem Post 1:
            </label>
            <div class="col-sm-10"><input name="img1" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Imagem Post 2:
            </label>
            <div class="col-sm-10"><input name="img2" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Imagem Post 3:
            </label>
            <div class="col-sm-10"><input name="img3" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Trailer:
            </label>
            <div class="col-sm-10"><input name="trailer" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row">
            <div class="checkbox" style="margin-left: 225px">
                <label><input type="checkbox" name="semTorrent" value="false" > Sem Torrent</label>
            </div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Torrent:
            </label>
            <div class="col-sm-10"><input type="file" name="arquivo" id="arquivo" size="20"></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <a href="#" onclick="gerarPost();" data-toggle="modal" data-target="#modal-media" class="btn btn-success">Gerar Post</a>                             
            </div>
        </div>
    </div>
    
</form>
