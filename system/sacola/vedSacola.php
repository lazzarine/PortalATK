<?php
//$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$dtInicio = date("01/m/Y");
$dtFinal = date("d/m/Y");
?>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Acompanhamento do Mês <?php echo "$dtInicio à $dtFinal "?>
                </label>
            </div>
            <div class="panel-body">
                    <?php
                    $mes = new Sacola;
                    $mes->TotalAvari($dtInicio,$dtFinal);
                    $mes->TotalReti($dtInicio,$dtFinal);
                    ?>
                    <table class="table table-condensed text-center">
                        <tbody>
                            <tr>
                                <td><b>Retirada</b></td>
                                <td><b>Tipo de Sacola</b></td>
                                <td><b>Total</b></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Verde</td>
                                <td><?php echo $mes->getVerde(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Cinza</td>
                                <td><?php echo $mes->getCinza(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="bg-danger">Total</td>
                                <td class="bg-danger"><?php echo $mes->getTotalRet(); ?></td>
                            </tr>
                            <tr>
                                <td><b>Avaria</b></td>
                                <td><b>Tipo de Sacola</b></td>
                                <td><b>Total</b></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Verde</td>
                                <td><?php echo $mes->getVerdeAva(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Cinza</td>
                                <td><?php echo $mes->getCinzaAva(); ?></td>
                            </tr>
                            <tr >
                                <td></td>
                                <td class="bg-danger">Total</td>
                                <td class="bg-danger"><?php echo $mes->getTotalAva(); ?></td>
                            </tr>
                            <tr>
                                <td><b>Devolução</b></td>
                                <td><b>Tipo de Sacola</b></td>
                                <td><b>Total</b></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>Verde</td>
                                <td><?php echo $mes->getVerdeDev(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Cinza</td>
                                <td><?php echo $mes->getCinzaDev(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="bg-danger">Total</td>
                                <td class="bg-danger"><?php echo $mes->getTotalDev(); ?></td>
                            </tr>
                            <tr class="bg-warning">
                                <td><b>Sacolas vendidas</b></td>
                                <td><b>Total</b></td>
                                <td><b><?php echo $mes->getTotalRet() - $mes->getTotalDev(); ?></b></td>
                            </tr>
                            <tr class="bg-warning">
                                <td><b>Sacolas não vendidas</b></td>
                                <td><b>Total</b></td>
                                <td><b><?php echo $mes->getTotalDev() - $mes->getTotalAva(); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>

