<?php
$codigo = getCodigo();
$tags = getTags();
$metaDesc = getMetaDesc();
$titulo = getTitulo();
$desc = getDesc();
$quantImagens = getQuantImagens();
?>
<div class="title-block">
    <h3 class="title">
        Post Gerado <span class="sparkline bar" data-type="bar"></span>
    </h3>
</div>
<div class="card card-block">
    <div class="form-group row">
        <label class="col-sm-2 form-control-label text-xs-right">1 - Titulo: </label>
        <div id="div_titulo" style="display: none" class="col-sm-10 form-group"><input name="titulo" id="titulo" value="<?=$titulo?>" type="text" class="form-control boxed" onclick="this.focus();this.select()">
        </div>
        <div style="margin-left: 230px" class="form-group">
            <button class="btn btn-success" onclick="copiar_dados('titulo');mostrar_alerta_copiado('Titulo')">Copiar</button>
            <a id="btn_mostrar1" onclick="mostrar_div('div_titulo','btn_mostrar1');" class="btn btn-info">Visualizar</a>
            <h7>Obs: Use Teclas númericas para copiar</h7>
        </div>
    </div>
    <div class="col-sm-10 form-group row">
        <div class="form-group">
            <label style="margin-left: 30px" class="col-sm-2 form-control-label text-xs-right">2 - Código: </label>
            <textarea style="margin-left: 208px; height: 200px;display: none" class="form-control" name="code" id="code"  onclick="this.focus();this.select()"><?=$codigo?></textarea>
        </div>
        <div style="margin-left: 215px" class="form-group">
            <button class="btn btn-success" onclick="copiar_dados('code');mostrar_alerta_copiado('Código')">Copiar</button>
            <a id="btn_mostrar2" onclick="mostrar_div('code','btn_mostrar2');" class="btn btn-info">Visualizar</a>
        </div>
        <div class="form-group">
            <label style="margin-left: 30px" class="col-sm-2 form-control-label text-xs-right">3 - Tags: </label>
            <textarea style="margin-left: 208px; height: 100px;display: none" class="form-control" name="tags" id="tags" onclick="this.focus();this.select()"><?=$tags?></textarea>
        </div>
        <div style="margin-left: 215px" class="form-group">
            <button class="btn btn-success" onclick="copiar_dados('tags');mostrar_alerta_copiado('Tags')">Copiar</button>
            <a id="btn_mostrar3" onclick="mostrar_div('tags','btn_mostrar3');" class="btn btn-info">Visualizar</a>
        </div>
    </div>
    <div class="form-group row">

    </div>
    <div class="form-group row">
        <label  class="col-sm-2 form-control-label text-xs-right">4 - Focus Keyword: </label>
        <div id="div_focusKeyword" style="display: none" class="col-sm-10"><input name="focusKeyword" id="focusKeyword" value="<?=$desc?>" type="text" class="form-control boxed" onclick="this.focus();this.select()">
        </div>
        <div style="margin-left: 230px" class="form-group">
            <button class="btn btn-success" onclick="copiar_dados('focusKeyword');mostrar_alerta_copiado('FocusKeyWord')">Copiar</button>
            <a id="btn_mostrar4" onclick="mostrar_div('div_focusKeyword','btn_mostrar4');" class="btn btn-info">Visualizar</a>
        </div>
    </div>
    
    <div class="form-group row">
        <label  class="col-sm-2 form-control-label text-xs-right">5 - META: </label>
        <div id="div_seo" style="display: none" class="col-sm-10"><input name="seo" id="seo" value="<?=$metaDesc?>" type="text" class="form-control boxed" onclick="this.focus();this.select()">
        </div>
        <div style="margin-left: 230px" class="form-group">
            <button class="btn btn-success" onclick="copiar_dados('seo');mostrar_alerta_copiado('Meta Descrição')">Copiar</button>
            <a id="btn_mostrar5" onclick="mostrar_div('div_seo','btn_mostrar5');" class="btn btn-info">Visualizar</a>
        </div>
    </div>
    <div class="form-group">
        <label style="margin-left: 210px">Imagens Geradas este mês: <?=$quantImagens?>/500</label>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 col-sm-offset-2">
            <a href="home.php"  class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

