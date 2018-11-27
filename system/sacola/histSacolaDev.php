<?php
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$total = 0;
$totalAva = 0;
$totalDev = 0;
$verdeDev = 0;
$verdeAva = 0;
$cinzaDev = 0;
$cinzaAva = 0;
$brancaDev = 0;
$brancaAva = 0;
$totalRet = 0;
$verde = 0;
$branca = 0;
$cinza = 0;
if ($data):
    $dtInicio = $data['dataInicio'];
    $dtFinal = $data['dataFinal'];
    $read = new Database;
    $read->connect();
    $read->select('dev_sacola', '*', NULL, "dev_data between '$dtInicio' and '$dtFinal'");
else:
    Mensagem("Erro !!", ERROR);
endif;
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label class="fa fa-2x">Histórico de Devolução de Sacolas</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nome</th>
                                <th>Quantidade Devolvida</th>
                                <th>Motivo</th>
                                <th>Tipo de Sacola</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                $total += (int) $qtd_devolvida;
                                if ($tp_sacola == "Verde" and $motivo == "Devolução"):
                                    $verdeDev += $qtd_devolvida;
                                elseif ($tp_sacola == "Verde" and $motivo == "Avariada"):
                                    $verdeAva += $qtd_devolvida;
                                elseif ($tp_sacola == "Cinza" and $motivo == "Devolução"):
                                    $cinzaDev += $qtd_devolvida;
                                elseif ($tp_sacola == "Cinza" and $motivo == "Avariada"):
                                    $cinzaAva += $qtd_devolvida;
                                elseif ($tp_sacola == "Branca" and $motivo == "Devolução"):
                                    $brancaDev += $qtd_devolvida;
                                elseif ($tp_sacola == "Branca" and $motivo == "Avariada"):
                                    $brancaAva += $qtd_devolvida;
                                endif;
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $matricula ?></td>
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $qtd_devolvida ?></td>
                                    <td><?php echo $motivo ?></td>
                                    <td><?php echo $tp_sacola ?></td>
                                    <td><?php echo $dev_data ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                    <button type="button" class="btn btn-info btn-group-justified" data-toggle="modal" data-target="#myModal">Totais de Devolução</button>
                </div>
            </div>
            <div class="panel-footer">
                <?php
                $totalAva = $verdeAva + $cinzaAva + $brancaAva;
                $totalDev = $verdeDev + $cinzaDev + $brancaDev;
                ?> 
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-responsive table-striped">
                                    <thead>
                                        <tr>
                                            <th>Motivo</th>
                                            <th>Tipo</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Avariada</td>
                                            <td>Verde</td>
                                            <td><?php echo $verdeAva ?></td>
                                        </tr>
                                        <tr>
                                            <td>Avariada</td>
                                            <td>Cinza</td>
                                            <td><?php echo $cinzaAva ?></td>
                                        </tr>
                                        <tr>
                                            <td>Avariada</td>
                                            <td>Branca</td>
                                            <td><?php echo $brancaAva ?></td>
                                        </tr>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th><?php echo $totalAva ?></th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th>Motivo</th>
                                            <th>Tipo</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <td>Devolução</td>
                                        <td>Verde</td>
                                        <td><?php echo $verdeDev ?></td>
                                    </tr>
                                    <tr>
                                        <td>Devolução</td>
                                        <td>Verde</td>
                                        <td><?php echo $cinzaDev ?></td>
                                    </tr>
                                    <tr>
                                        <td>Devolução</td>
                                        <td>Verde</td>
                                        <td><?php echo $brancaDev ?></td>
                                    </tr>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th><?php echo $totalDev ?></th>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <th>Devolução + Avarias</th>
                                            <th>Total</th>
                                            <th><?php echo $total ?></th>
                                        </tr>
                                    </thead>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<?php
$read->disconnect();
