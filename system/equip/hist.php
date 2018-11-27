<?php
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($data):
    $dtInicio = $data['inicio'];
    $dtFinal = $data['final'];
    $read = new Database;
    $read->connect();
    $read->select('histEquip', '*', NULL, "dtRetirada between '$dtInicio' and '$dtFinal'");
else:
    Mensagem("Erro !!", ERROR);
endif;
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label class="fa fa-2x">Histórico de Devolução de Equipamentos</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matricula</th>
                                <th>Setor</th>
                                <th>Nº Equip.</th>
                                <th>Retirada</th>
                                <th>Hora</th>
                                <th>Devolução</th>
                                <th>Hora</th>
                                <th>Recebido</th>
                                <th>Observação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $matricula ?></td>
                                    <td><?php echo $setor ?></td>
                                    <td><?php echo $tpEquip . " Nº ". $numEquip ?></td>
                                    <td><?php echo $dtRetirada?></td>
                                    <td><?php echo $hrRetirada ?></td>
                                    <td><?php echo $dtEntrega?></td>
                                    <td><?php echo $hrEntrega ?></td>
                                    <td><?php echo $userRcb ?></td>
                                    <td><?php echo $obs ?></td>
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
<?php
$read->disconnect();
