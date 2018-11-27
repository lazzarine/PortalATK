<?php

$Serie = filter_input(INPUT_POST, "numSerie", FILTER_DEFAULT);
$Obs = filter_input(INPUT_POST, "obs", FILTER_DEFAULT);
if (isset($Serie)):
    $dev = new devEquipamento();
    $dev->setSerie($Serie);
    $dev->setUser($userlogin[0]['login']);
    $dev->setObs($Obs);
    $dev->Devolucao();
    $r = $dev->getData();
endif;
?>
<div class="row">
    <div class="col-md-12 text-center">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Devolução de equipamento
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div style="margin-top: -30px;">
                        <div class="col-sm-4">
                            <label class="h3">Numero de Série</label>
                            <input id="buscaEquip"
                                   onchange="buscaDev()"
                                   class="form-control altinho fa-2x"
                                   type ="text" name="numSerie"
                                   placeholder="N/S"
                                   title=""
                                   maxlength="16"
                                   pattern="[a-zA-Z0-9\s]+$"
                                   required
                                   autofocus
                                   />
                        </div>
                        <div class="col-sm-8">
                            <label class="h3">Observação (Opcional)</label>
                            <input id=""
                                   class="form-control altinho fa-2x"
                                   type ="text" name="obs"
                                   placeholder="Observção"
                                   title=""
                                   autocomplete
                                   maxlength="50"
                                   spellcheck="true"
                                   />
                        </div>
                        </div>
                    <div id="load_buscaDev" class="text-left" style="margin-top: 10px">
                        <fieldset class="scheduler-border col-sm-12">
                            <legend class="scheduler-border">Dados do Colaborador</legend>
                            <label class="col-sm-4">Nome: <?php 
                            if (isset($r)):
                                echo $r["nome"];
                                endif; ?>
                            </label>
                            <label class="col-sm-4">Matricula: <?php 
                            if (isset($r)):
                                echo $r["matricula"];
                                endif; ?>
                            </label>
                            <label class="col-sm-4">Setor: <?php 
                            if (isset($r)):
                                echo $r["setor"];
                                endif; ?>
                            </label>
                            <label class="col-sm-4">Função: <?php 
                            if (isset($r)):
                                echo $r["funcao"];
                                endif; ?>
                            </label>
                        </fieldset> 
                        <fieldset class="scheduler-border col-sm-12">
                            <legend class="scheduler-border">Dados do Equipamento</legend>
                            <label class="col-sm-4">Numero: <?php 
                            if (isset($r)):
                                echo $r["numEquip"];
                                endif; ?>
                            </label>
                            <label class="col-sm-4">Nº Série: <?php 
                            if (isset($r)):
                                echo $r["numSerie"];
                                endif; ?>
                            </label>
                            <label class="col-sm-4">Equipamento: <?php 
                            if (isset($r)):
                                echo $r["tpEquip"];
                                endif; ?>
                            </label>
                            <label class="col-sm-4">Data de Retirada: <?php 
                            if (isset($r)):
                                echo $r["dtRetirada"]. " as ". $r["hrRetirada"];
                                endif; ?>
                            </label>
                            <label class="col-sm-6">Data de Devolução: <?php 
                            if (isset($r)):
                                echo $r["dtEntrega"]. " as ". $r["hrEntrega"];
                                endif; ?>
                            </label>
                            <label class="col-sm-12">Observação: <?php 
                            if (isset($r)):
                                echo $r["obs"];
                                endif; ?>
                            </label>
                        </fieldset> 
                    </div>
                    <div class="">
                        <button type="submit" name="SendPostForm" value="Gravar" class="btn btn-group btn-primary fa fa-save"> Gravar</button>
                        <button type="reset" class="btn btn-group btn-primary fa fa-eraser"> Limpar</button>                      
                        <a class="btn btn-group btn-primary fa" href="painel.php?exe=equip/pendente"> Em uso</a>
                        <a class="btn btn-group btn-primary fa" href="painel.php?exe=equip/retirada"> Retirada</a>
                        <a class="btn btn-group btn-primary fa" href="painel.php?exe=equip/filtrar"> Histórico</a>
                        </div>
                </form>
            </div>
            <div class="panel-footer" style="height:70px">
                <?php
                if (isset($Serie)):
                    if ($dev->getRes()):
                       Mensagem($dev->getError(), ACCEPT);
                        MsgAudio(true);
                    else:
                        Mensagem($dev->getError(), ERROR);
                        MsgAudio(false);
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>


