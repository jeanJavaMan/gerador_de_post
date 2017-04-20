<?php
$tipo = $_GET["type"];
?>
<div class="title-block">
    <h3 class="title">
        Leito de Logs <span class="sparkline bar" data-type="bar"></span>
    </h3>
</div>
<div class="card card-block">
    <div class="col-sm-10 form-group row">
        <div class="form-group">
            <label style="margin-left: 30px" class="col-sm-2 form-control-label text-xs-right">Texto Do Log: </label>
            <textarea style="margin-left: 208px; height: 350px" class="form-control"><?=$util_log->ler_log($tipo)?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 col-sm-offset-2">
            <a href="util/remove-log.php?type=<?=$tipo?>"  class="btn btn-danger">Apagar Log</a>
            <a href="home.php?key=log&type=votos" class="btn btn-warning" style="float: right">Ver Votos</a>
        </div>
    </div>    
</div>
