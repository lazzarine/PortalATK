<?php
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$totalRet = 0;
$verde = 0;
$branca = 0;
$cinza = 0;
if ($data):
    $dtInicio = $data['dataInicio'];
    $dtFinal = $data['dataFinal'];
    $read = new Database;
    $read->connect();
    $read->select('retirada', '*', NULL, "data_ret between '$dtInicio' and '$dtFinal'");
else:
    Mensagem("Erro !!", ERROR);
endif;
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label class="fa fa-2x">Histórico de Retirada de Sacolas</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nome</th>
                                <th>Quantidade retirada</th>
                                <th>Responsavel</th>
                                <th>Tipo de Sacola</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                $totalRet += (int) $qtd_retirada;
                                switch ($tp_sacola):
                                    case "Verde":
                                        $verde += $qtd_retirada;
                                        break;
                                    case "Cinza":
                                        $cinza += $qtd_retirada;
                                        break;
                                    case "Branca":
                                        $branca += $qtd_retirada;
                                        break;
                                endswitch;
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $matricula ?></td>
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $qtd_retirada ?></td>
                                    <td><?php echo $responsavel ?></td>
                                    <td><?php echo $tp_sacola ?></td>
                                    <td><?php echo $data_ret ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <?php
                echo "<div>"
                . "<span class=\"h4\">Verde: <label class=\"badge bg-color-green\"> $verde</label></span>&nbsp;"
                . "<span class=\"h4\">Cinza: <label class=\"badge\"> $cinza</label></span>&nbsp;"
                . "<span class=\"h4\">Branca: <label class=\"badge bg-color-brown\"> $branca</label></span>&nbsp;"
                . "<span class=\"h4\">Total: <label class=\"badge bg-color-red\"> $totalRet</label></span>&nbsp;"
                . "</div>"
                ;
                ?> 
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<?php
$read->disconnect();
