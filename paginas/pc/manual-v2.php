<?php ?>
<div class="title-block">
    <h3 class="title">
        Adicionando dados para o post Manualmente <span class="sparkline bar" data-type="bar"></span>
    </h3></div>
<form id="formPost" method="post" enctype="multipart/form-data" action="util/pc/processo-manualv2.php">
    <div class="card card-block">
        
        <div class="col-sm-10 form-group row">
            <div class="form-group">
                <label style="margin-left: 30px"
                       class="col-sm-2 form-control-label text-xs-right">Código Fonte:
                </label>
                <textarea style="margin-left: 208px; height: 200px" class="form-control"
                          name="fonte" id="descricao"></textarea>
            </div>
            
        </div>  
        
        <div class="form-group row">

        </div>
        <div class="form-group row">
            <div class="checkbox" style="margin-left: 225px">
                <label><input type="checkbox" name="traducao" value="false" > Deseja Traduzir?</label>
            </div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Nome de Lançamento:
            </label>
            <div class="col-sm-8"><input name="nomeLancamento" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Tamanho:
            </label>
            <div class="col-sm-2"><input name="tamanhoArquivo"  type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Site Oficial:
            </label>
            <div class="col-sm-10"><input name="siteOficial" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Steam:
            </label>
            <div class="col-sm-10"><input name="linkSteam" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                NFO:
            </label>
            <div class="col-sm-10"><input name="nfo" type="text" class="form-control boxed"></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Imagem Capa:
            </label>
            <div class="col-sm-10"><input name="imgCapa" type="text" class="form-control boxed"></div>
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
                Link Do Trailer:
            </label>
            <div class="col-sm-10"><input name="trailer-link" type="text" class="form-control boxed"></div>
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
                <a href="paginas/pc/form-testador.php" style="float: right"class="btn btn-warning">Testador</a>                
            </div>
        </div>
    </div>
</form>
