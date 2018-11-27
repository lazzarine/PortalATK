<?php
$dev_sacola = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>  
<div class="row">
    <div class="col-md-8 text-center" style="margin-left: 15%">
        <!-- Form Elements -->
        <div class="panel panel-success">
            <div class="panel-heading ">
                <label class="fa fa-2x">
                    Devolução de Sacolas
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
                                   maxlength="50"
                                   required
                                   disabled="true"
                                   />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="fa"><h3>Quantidade</h3></label>
                            <input class="form-control altinho fa-2x"
                                   type ="text" name="qtd_devolvida"
                                   placeholder="Quantidade"
                                   title="Digite a quantidade"
                                   maxlength="3"
                                   required
                                   />
                        </div>
                        <div class="col-md-4">
                            <label class="fa"><h3>Motivo</h3></label>
                            <select class="form-control altinho fa-2x" name="motivo" title="Selecione um motivo" required>
                                <option value="">Selecione</option>
                                <option value="Avariada">Avariada</option>
                                <option value="Devolução">Devolução</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="fa"><h3>Tipo de Sacola</h3></label>
                            <select class="form-control altinho fa-2x" name="tp_sacola" title="Selecione o tipo da sacola" required>
                                <option value="">Selecione</option>
                                <option value="Verde">Verde</option>
                                <option value="Cinza">Cinza</option>
                                <option value="Branca">Branca</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="SendPostForm" value="Salvar" class="btn btn-lg btn-primary fa fa-save"> Gravar</button>
                    <button type="reset" class="btn btn-lg btn-primary fa fa-eraser"> Limpar</button>
                    <hr>
                    <label class="">
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/cadastrarope"> Cadastrar Operador</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/operadores"> Operadores Cadastrados</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/retirar"> Retirada de Sacola</a>
                        <a class="btn btn-primary fa" href="painel.php?exe=sacola/vedSacola"> Acompanhamento</a>
                    </label>
                </form>
            </div>
            <div class="panel-footer" style="height:70px">
                <?php
                if ($dev_sacola && $dev_sacola['SendPostForm']):
                    unset($dev_sacola['SendPostForm']);
                    $devolucao = new Sacola;
                    $devolucao->setDadosDv($dev_sacola);
                    if (!$devolucao->getResult()):
                        Mensagem($devolucao->getError(), ERROR);
                    else:
                        $devolucao->ExeDevolucao();
                        if (!$devolucao->getResult()):
                            Mensagem($devolucao->getError(), ERROR);
                        else:
                            Mensagem($devolucao->getError(), ACCEPT);
                        endif;
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
