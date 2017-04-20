<?php ?>
<div class="title-block">
    <h3 class="title">
        Adicionando dados para o post <span class="sparkline bar" data-type="bar"></span>
    </h3></div>
<form id="formPost" method="post" action="util/android/processo.php">
    <div class="card card-block">
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Do PDALIFE:
            </label>
            <div class="col-sm-10"><input name="linkSite" id="linkSite" type="text" class="form-control boxed" placeholder=""
                                          required></div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Link Do FARSANDROID:
            </label>
            <div class="col-sm-10"><input name="linkfars" id="linkfars" type="text" class="form-control boxed" placeholder=""
                                          required></div>
        </div>
        <div class="form-group row">
            <div class="checkbox" style="margin-left: 225px">
                <label><input type="checkbox" name="temMod" value="false" > Possui Mod?</label>
                <label><input type="checkbox" name="mudaImagem" value="false"> Mudar imagem para mobile?</label>
            </div>
        </div>
        <div class="form-group row"><label class="col-sm-2 form-control-label text-xs-right">
                Descrição:
            </label>
            <div class="col-sm-10">
                <div class="wyswyg">
                    <div class="toolbar"> <span class="ql-format-group">
                            <select title="Tamanho" class="ql-size">
                                <option value="10px">Pequeno</option>
                                <option value="13px" selected>Normal</option>
                                <option value="18px">Médio</option>
                                <option value="32px">Grande</option>
                            </select>
                        </span> <span class="ql-format-group">
                            <span title="Bold" class="ql-format-button ql-bold"></span> <span
                                class="ql-format-separator"></span> <span title="Italic"
                                class="ql-format-button ql-italic"></span> <span
                                class="ql-format-separator"></span> <span title="Underline"
                                class="ql-format-button ql-underline"></span>                                            <span
                                class="ql-format-separator"></span> <span title="Strikethrough"
                                class="ql-format-button ql-strike"></span> </span> <span
                            class="ql-format-group">
                            <select title="Text Color" class="ql-color">
                                <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)" selected></option>
                                <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)"></option>
                                <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                            </select>
                            <span class="ql-format-separator"></span> <select title="Background Color"
                                                                              class="ql-background">
                                <option value="rgb(0, 0, 0)" label="rgb(0, 0, 0)"></option>
                                <option value="rgb(230, 0, 0)" label="rgb(230, 0, 0)"></option>
                                <option value="rgb(255, 153, 0)" label="rgb(255, 153, 0)"></option>
                                <option value="rgb(255, 255, 0)" label="rgb(255, 255, 0)"></option>
                                <option value="rgb(0, 138, 0)" label="rgb(0, 138, 0)"></option>
                                <option value="rgb(0, 102, 204)" label="rgb(0, 102, 204)"></option>
                                <option value="rgb(153, 51, 255)" label="rgb(153, 51, 255)"></option>
                                <option value="rgb(255, 255, 255)" label="rgb(255, 255, 255)" selected></option>
                                <option value="rgb(250, 204, 204)" label="rgb(250, 204, 204)"></option>
                                <option value="rgb(255, 235, 204)" label="rgb(255, 235, 204)"></option>
                                <option value="rgb(255, 255, 204)" label="rgb(255, 255, 204)"></option>
                                <option value="rgb(204, 232, 204)" label="rgb(204, 232, 204)"></option>
                                <option value="rgb(204, 224, 245)" label="rgb(204, 224, 245)"></option>
                                <option value="rgb(235, 214, 255)" label="rgb(235, 214, 255)"></option>
                                <option value="rgb(187, 187, 187)" label="rgb(187, 187, 187)"></option>
                                <option value="rgb(240, 102, 102)" label="rgb(240, 102, 102)"></option>
                                <option value="rgb(255, 194, 102)" label="rgb(255, 194, 102)"></option>
                                <option value="rgb(255, 255, 102)" label="rgb(255, 255, 102)"></option>
                                <option value="rgb(102, 185, 102)" label="rgb(102, 185, 102)"></option>
                                <option value="rgb(102, 163, 224)" label="rgb(102, 163, 224)"></option>
                                <option value="rgb(194, 133, 255)" label="rgb(194, 133, 255)"></option>
                                <option value="rgb(136, 136, 136)" label="rgb(136, 136, 136)"></option>
                                <option value="rgb(161, 0, 0)" label="rgb(161, 0, 0)"></option>
                                <option value="rgb(178, 107, 0)" label="rgb(178, 107, 0)"></option>
                                <option value="rgb(178, 178, 0)" label="rgb(178, 178, 0)"></option>
                                <option value="rgb(0, 97, 0)" label="rgb(0, 97, 0)"></option>
                                <option value="rgb(0, 71, 178)" label="rgb(0, 71, 178)"></option>
                                <option value="rgb(107, 36, 178)" label="rgb(107, 36, 178)"></option>
                                <option value="rgb(68, 68, 68)" label="rgb(68, 68, 68)"></option>
                                <option value="rgb(92, 0, 0)" label="rgb(92, 0, 0)"></option>
                                <option value="rgb(102, 61, 0)" label="rgb(102, 61, 0)"></option>
                                <option value="rgb(102, 102, 0)" label="rgb(102, 102, 0)"></option>
                                <option value="rgb(0, 55, 0)" label="rgb(0, 55, 0)"></option>
                                <option value="rgb(0, 41, 102)" label="rgb(0, 41, 102)"></option>
                                <option value="rgb(61, 20, 102)" label="rgb(61, 20, 102)"></option>
                            </select> </span> <span class="ql-format-group">
                            <span title="List" class="ql-format-button ql-list"></span> <span
                                class="ql-format-separator"></span> <span title="Bullet"
                                class="ql-format-button ql-bullet"></span> <span
                                class="ql-format-separator"></span> <select title="Text Alignment" class="ql-align">
                                <option value="left" label="Left" selected></option>
                                <option value="center" label="Center"></option>
                                <option value="right" label="Right"></option>
                                <option value="justify" label="Justify"></option>
                            </select> </span> <span class="ql-format-group">
                        </span> <span class="ql-format-group">
                        </span></div>
                    <!-- Create the editor container -->
                    <div id="descricao_editor" class="editor">
                    </div>
                    <div>
                        <input class="form-control boxed" name="introducao" id="introducao" type="hidden"
                               placeholder="">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">Imagem Capa:</label>
            <div class="col-sm-10"><input name="linkImgCapa" id="linkImgCapa" type="text" class="form-control boxed"
                                          placeholder="" required></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">Imagem 1:</label>
            <div class="col-sm-10"><input name="linkImg1" id="linkImg1" type="text" class="form-control boxed"
                                          placeholder="" required></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">Imagem 2:</label>
            <div class="col-sm-10"><input name="linkImg2" id="linkImg2" type="text" class="form-control boxed"
                                          placeholder="" required></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">Imagem 3:</label>
            <div class="col-sm-10"><input name="linkImg3" id="linkImg3" type="text" class="form-control boxed"
                                          placeholder="" required></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">Imagem 4:</label>
            <div class="col-sm-10"><input name="linkImg4" id="linkImg4" class="form-control boxed"
                                          placeholder="" required></div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 form-control-label text-xs-right">Link do Youtube:</label>
            <div class="col-sm-10"><input name="linkYoutube" id="linkYoutube" class="form-control boxed"></div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10 col-sm-offset-2">
                <a href="#" onclick="pegarDescricao('descricao_editor', 'introducao'); gerarPost();" data-toggle="modal" data-target="#modal-media" class="btn btn-success">Gerar Post</a>
            </div>
        </div>
    </div>
</form>

