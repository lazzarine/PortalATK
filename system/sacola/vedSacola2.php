<?php
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$dtInicio = date("01/m/Y");
$dtFinal = date("d/m/Y");
?>
<div class="row">
    <div class="col-md-12 text-center">
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Acompanhamento de Saidas de Sacolas
                </label>
            </div>
            <div class="panel-body">
                <div class="col-md-4">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Relatório de Retirada</legend>
                        <form role="form" action="http://smiguel/portal_v2/sistema_relat/system/painel.php?exe=sacola/histSacola" method="post" name="UserCreateForm">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="dataInicio" placeholder="Data inicial"/>
                            </div>
                            <hr>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="dataFinal" placeholder="Data final"/>
                            </div>
                            <hr>
                            <button type="submit" name="SendPostForm" value="Visualizar" class="btn btn-block btn-lg btn-primary input-group"> Visualizar</button>
                            <br>
                        </form>
                    </fieldset>
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Relatório de Devolução</legend>
                        <form role="form" action="http://smiguel/portal_v2/sistema_relat/system/painel.php?exe=sacola/histSacolaDev" method="post" name="UserCreateForm">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="dataInicio" placeholder="Data inicial"/>
                            </div>
                            <hr>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="dataFinal" placeholder="Data final"/>
                            </div>
                            <hr>
                            <button type="submit" name="SendPostForm" value="Visualizar" class="btn btn-block btn-lg btn-primary input-group"> Visualizar</button>
                            <br>
                        </form>
                    </fieldset> 
                </div>
                <fieldset class="scheduler-border">
                    <legend class="scheduler-border">Acompanhamento do Mês</legend>
                    <?php
                    $mes = new Sacola;
                    $mes->TotalAvari($dtInicio,$dtFinal);
                    $mes->TotalReti($dtInicio,$dtFinal);
                    ?>
                    <table class="table table-condensed text-center">
                        <tbody>
                            <tr>
                                <td><b>Motivo</b></td>
                                <td><b>Tipo de Sacola</b></td>
                                <td><b>Total</b></td>
                            </tr>

                            <tr>
                                <td>Retirada</td>
                                <td>Verde</td>
                                <td><?php echo $mes->getVerde(); ?></td>
                            </tr>
                            <tr>
                                <td>Retirada</td>
                                <td>Cinza</td>
                                <td><?php echo $mes->getCinza(); ?></td>
                            </tr>
                            <tr>
                                <td>Retirada</td>
                                <td>Branca</td>
                                <td><?php echo $mes->getBranca(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="bg-info">Total</td>
                                <td class="bg-info"><?php echo $mes->getTotalRet(); ?></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td><b>Motivo</b></td>
                                <td><b>Tipo de Sacola</b></td>
                                <td><b>Total</b></td>
                            </tr>

                            <tr>
                                <td>Avaria</td>
                                <td>Verde</td>
                                <td><?php echo $mes->getVerdeAva(); ?></td>
                            </tr>
                            <tr>
                                <td>Avaria</td>
                                <td>Cinza</td>
                                <td><?php echo $mes->getCinzaAva(); ?></td>
                            </tr>
                            <tr>
                                <td>Avaria</td>
                                <td>Branca</td>
                                <td><?php echo $mes->getBrancaAva(); ?></td>
                            </tr>
                            <tr >
                                <td></td>
                                <td class="bg-info">Total</td>
                                <td class="bg-info"><?php echo $mes->getTotalAva(); ?></td>
                            </tr>
                        </tbody>
                        <tbody>
                            <tr>
                                <td><b>Motivo</b></td>
                                <td><b>Tipo de Sacola</b></td>
                                <td><b>Total</b></td>
                            </tr>

                            <tr>
                                <td>Devolução</td>
                                <td>Verde</td>
                                <td><?php echo $mes->getVerdeDev(); ?></td>
                            </tr>
                            <tr>
                                <td>Devolução</td>
                                <td>Cinza</td>
                                <td><?php echo $mes->getCinzaDev(); ?></td>
                            </tr>
                            <tr>
                                <td>Devolução</td>
                                <td>Branca</td>
                                <td><?php echo $mes->getBrancaDev(); ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="bg-info">Total</td>
                                <td class="bg-info"><?php echo $mes->getTotalDev(); ?></td>
                            </tr>
                            <tr class="bg-warning">
                                <td><b>Devolução - Avarias</b></td>
                                <td><b>Total</b></td>
                                <td><b><?php echo $mes->getTotalDev() - $mes->getTotalAva(); ?></b></td>
                            </tr>
                        </tbody>
                    </table>
                </fieldset>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>

