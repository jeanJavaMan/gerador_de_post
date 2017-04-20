<?php
    function acesso_negado($urlIndex){
        ?>
        <div class="app blank sidebar-opened">
            <article class="content">
                <div class="error-card global">
                    <div class="error-title-block">
                        <h1 class="error-title">403</h1>
                        <h2 class="error-sub-title">
                            Acesso Negado
                        </h2></div>
                    <div class="error-container">
                        <p>Você não tem acesso a está página</p>
                        <br>
                        <a class="btn btn-primary" href="<?=$urlIndex?>"> <i class="fa fa-angle-left"></i> Fazer Login</a>
                    </div>
                </div>
            </article>
        </div>
        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>

        <?php
    }
?>

