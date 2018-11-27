<?php
   
    $mat = filter_input(INPUT_POST, "matricula", FILTER_DEFAULT);
    $serie = filter_input(INPUT_POST, "numSerie", FILTER_DEFAULT);
?>
<div class="row">
    <div class="col-md-12 text-center">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Entrega de SB1
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="fa"><h3>Matricula</h3></label>
                            <input id="busca"
                                   onchange="buscaColaborador()"
                                   class="form-control altinho fa-2x"
                                   type ="text" name="matricula"
                                   placeholder="Matricula"
                                   title="Informe a matricula [ de 1 a 9 caracteres! ]"
                                   maxlength="10"
                                   pattern="[0-9\s]+$"
                                   autofocus
                                   required
                                   />
                        </div>
                        <div id="load_buscaOperador" class="col-md-8">
                            <label class="fa"><h3>Nome</h3></label>
                            <input class="form-control altinho fa-2x"
                                   type ="text" name="nome"
                                   placeholder="Nome"
                                   title="Digite o Nome"
                                   disabled="true"
                                   />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="fa"><h3>Numero de Série</h3></label>
                            <input id="buscaEquip"
                                   onchange="buscaEquipamento()"
                                   class="form-control altinho fa-2x"
                                   type ="text" name="numSerie"
                                   placeholder="N/S"
                                   title=""
                                   maxlength="20"
                                   pattern="[a-zA-Z0-9\s]+$"
                                   required
                                   />
                        </div>
                        <div id="load_buscaEquip" class="col-md-8">
                            <label class="fa"><h3>Numero do Equipamento</h3></label>
                            <input class="form-control altinho fa-2x"
                                   type ="text" name="numEquip"
                                   placeholder="Numero"
                                   title=""
                                   disabled="true"
                                   />
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="SendPostForm" value="Gravar" class="btn btn-primary fa fa-save"> Gravar</button>
					<button type="reset" class="btn btn-primary fa fa-eraser" onclick="Refresh()"> Limpar</button>
                    <hr>
                    <label class="">
                        <a class="btn btn-primary fa" href="painel.php?exe=equip/pendente"> Em uso</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=equip/devolucao"> Devolução</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=equip/filtrar"> Histórico</a>
                        <a class="btn btn-primary fa" href="equip/gerar.php"> Gerar Cod. Barras</a>
                    </label>
                </form>
            </div>
            <div class="panel-footer" style="height:70px">
                <?php
                if ($mat AND $serie):
                    $entrega = new RetiradaEquip();
                    $entrega->setSerie($serie);
                    $entrega->setMatricula($mat);
                    $entrega->ConsultarUser();
                    if (!$entrega->getRes()):
                        Mensagem($entrega->getError(), ERROR);
                    else:
                        $entrega->ConsultarEquip();
                        if (!$entrega->getRes()):
                            Mensagem($entrega->getError(), ERROR);
                           
                        elseif ($entrega->Vincular()):
                            Mensagem($entrega->getError(), ACCEPT);
                            MsgAudio(true);
                        else:
                            Mensagem($entrega->getError(), ERROR);
                            MsgAudio(false);
                        endif;
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    function Refresh() {
        window.location.href = "painel.php?exe=equip/retirada";
    }
    ;
</script>
