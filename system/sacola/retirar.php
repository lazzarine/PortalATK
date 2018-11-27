<?php
$retirar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>
<div class="row">
    <div class="col-md-8 text-center" style="margin-left: 15%;">
        <!-- Form Elements -->
        <div class="panel panel-success">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Retirada de Sacolas
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="fa"><h3>Matricula</h3></label>
                            <input id="buscaOpe"
                                   onchange="buscaOperador()"
                                   class="form-control altinho fa-2x"
                                   type ="text" name="matricula"
                                   placeholder="Matricula"
                                   title="Informe a matricula [ de 1 a 9 caracteres! ]"
                                   maxlength="9"
                                   pattern=".{1,9}"
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
                        <div class="col-md-4">
                            <label class="fa"><h3>Quantidade</h3></label>
                            <select class="form-control altinho fa-2x" name="qtd_retirada" title="Selecione o numero do armario" required>
                                <option value="">Selecione</option>
                                <option value="1">1</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="40">40</option>
                                <option value="60">60</option>
                                <option value="80">80</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label class="fa"><h3>Tipo de Sacola</h3></label>
                            <select class="form-control altinho fa-2x" name="tp_sacola" title="Selecione o numero do armario" required>
                                <option value="">Selecione</option>
                                <option value="Verde">Verde</option>
                                <option value="Cinza">Cinza</option>
                                <option value="Branca">Branca</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="SendPostForm" value="Gravar" class="btn btn-lg btn-primary fa fa-save"> Gravar</button>
                    <button type="reset" class="btn btn-lg btn-primary fa fa-eraser"> Limpar</button>
                    <hr>
                    <label class="">
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/cadastrarope"> Cadastrar Operador</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/operadores"> Operadores Cadastrados</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/devolucaosac"> Devolução de Sacola</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/vedSacola"> Acompanhamento</a>
                    </label>
                </form>
            </div>
            <div class="panel-footer" style="height:70px">
                <?php
                if ($retirar && $retirar['SendPostForm']):
                    unset($retirar['SendPostForm']);
                    $sac = new Sacola();
                    $sac->setDadosRt($retirar);
                    if (!$sac->getResult()):
                        Mensagem($sac->getError(), ERROR);
                    else:
                        $sac->ExeRetirada();
                        if (!$sac->getResult()):
                            Mensagem($sac->getError(), ERROR);
                        else:
                            Mensagem($sac->getError(), ACCEPT);
                        endif;
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
