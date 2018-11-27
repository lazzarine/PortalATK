<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label>
                    Selecione um dia para visualizar os relatórios correspondentes, ultima atualização dos arquivos <i class="text-danger">
                        <?php
                        if ((date("d") - 1) == 0):
                            $mes = date("m") - 1;
                            $ultimo_dia = date("t", mktime(0, 0, 0, $mes, '01'));
                            echo $ultimo_dia . "/" . $mes;
                        else:
                            echo date("d") - 1 . "/" . date("m");
                        endif;
                        ?>

                    </i>.
                </label>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-offset-3 text-center">
                        <div style="padding: 15px 50px 5px 50px;float: left;font-size: 16px; margin-left: 5px; width: 600px; height: 300px;">
                            <?php
                            for ($i = 1; $i <= 31; $i++):
                                if ($i == 10 || $i == 18 || $i == 26):
                                    echo "<hr style='width:400px;' />";
                                endif;
                                ?> 
                                <a href="painel.php?exe=arquivos/relatorios/relatorios&Data=<?php echo $i; ?>" class="btn-lg btn-info circle-btn"><?php echo $i ?></a>
                                <?php
                            endfor;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
<?php

