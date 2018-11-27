<?php
$dtInicial = filter_input(INPUT_POST, 'dataInicial');
$dtFinal = filter_input(INPUT_POST, 'dataFinal');
$eunaosei = new Sacola();
$eunaosei->GeraRelatorio($dtInicial, $dtFinal);
?>

<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">                
                <label class="fa fa-2x">Relatório de Sacolas</label>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" action="#" method="post" name="UserCreateForm">
                    <span class="glyphicon glyphicon-calendar"></span>
                    <input type="text" class="datepicker" name="dataInicial" placeholder="Data Inicial"/>&nbsp;
                    <span class="glyphicon glyphicon-calendar"></span>
                    <input type="text" class="datepicker" name="dataFinal" placeholder="Data Final"/>&nbsp;
                    <button type="submit" name="enviar" value="Visualizar" class="btn btn-sm btn-primary "><strong> Visualizar</strong></button>&nbsp;
                    <a class="btn btn-md btn-info fa fa-print" target="_blank" href="sacola\imp_sacola.php?dataInicial=<?php echo $dtInicial. "&dataFinal=". $dtFinal  ?>">  Imprimir</a>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nome</th>
                                <th>Sacola</th>
                                <th>Retirada</th>
                                <th>Devolvida</th>
                                <th>Avariada</th>
                                <th>Vendidas</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($eunaosei->getRelat_total() as $value):
                                extract($value);
                                //print_r($value);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?=$matricula ?></td>
                                    <td><?=$nome ?></td>
                                    <td><?=$tp_sacola ?></td>
                                    <td><?=$qtd_retirada ?></td>
                                    <td><?=$qtd_devolvida ?></td>
                                    <td><?=$qtd_avariada ?></td>
                                    <td><?=$Vendidas ?></td>
                                    <td><?=$data ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>


