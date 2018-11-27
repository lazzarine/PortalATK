<?php
$id = filter_input(INPUT_GET, "id", FILTER_DEFAULT);
$retirar = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($retirar && $retirar['SendPostForm']):
    unset($retirar['SendPostForm']);
    $sb1 = new CadColaborador();
    $sb1->ExeUpdate($id, $retirar);
endif;

$read = new Database;
$read->connect();
$read->select('usersEquip', '*', NULL, "id = $id");
$res = $read->getResult();
$read->disconnect();
?>
<div class="row">
    <div class="col-sm-6 text-center" style="margin-top: 5px; margin-left:22%">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label class="fa fa-2x">
                    Cadastrar Colaborador
                </label>
            </div>
            <div class="panel-body fa h3">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <label class="col-sm-12">Matricula</label>
                    <input class="form-control col-sm-12"
                           type ="text" name="matricula"
                           value="<?= $res[0]["matricula"] ?>"
                           placeholder="Matricula"
                           title="Digite a matricula"
                           maxlength="10"
                           pattern="[0-9\s]+$"
                           required
                           />
                    <label class="col-sm-12">Nome</label>
                    <input class="form-control col-sm-12"
                           type ="text" name="nome"
                           value="<?= $res[0]["nome"] ?>"
                           placeholder="Nome"
                           title="Digite o Nome"
                           maxlength="30"
                           pattern="[a-zA-Z\s]+$"
                           required
                           />
                    <label class="col-sm-12">Setor</label>
                    <select class="form-control col-sm-12" name="setor" title="Selecione um setor" required>
                        <option value="<?= $res[0]["setor"] ?>"><?= $res[0]["setor"] ?></option>
                        <option value=""/>Selecione</option>
                        <option value="Aprendiz"/>Aprendiz</option>
                        <option value="Almoxarifado"/>Almoxarifado</option>
                        <option value="Atendimento ao cliente">Atendimento ao cliente</option>
                        <option value="Cartaz">Cartaz</option>
                        <option value="Cozinha">Cozinha</option>
                        <option value="Depósito">Depósito</option>
                        <option value="Estoque">Estoque</option>
                        <option value="FCXA">Frente de Caixa</option>
                        <option value="Frios">Frios</option>
                        <option value="Gerência">Gerência</option>
                        <option value="Hort-Fruti">Hort-Fruti</option>
                        <option value="Informática">Informática</option>
                        <option value="Loja">Loja</option>
                        <option value="Prevenção">Prevenção</option>
                        <option value="Recursos Humanos">Recursos Humanos</option>
                    </select>
                    <label class="col-sm-12">Função</label>
                    <select class="form-control col-sm-12" name="funcao" title="Selecione um cargo" required>
                        <option value="<?= $res[0]["funcao"] ?>"><?= $res[0]["funcao"] ?></option>
                        <option value=""/>Selecione</option>
                        <option value="Analista R.H"/>Analista R.H</option>
                        <option value="Apoio a FCXA">Apoio a FCXA</option>
                        <option value="Apoio a gerência">Apoio a gerência</option>
                        <option value="Aprendiz"/>Aprendiz</option>
                        <option value="Assistente ADM.">Assistente ADM.</option>
                        <option value="Atendente P.P">Atendente P.P</option>
                        <option value="Aux. Almoxarifado">Aux. Almoxarifado</option>
                        <option value="Aux. Cadastro">Aux. Cadastro</option>
                        <option value="Aux. Recebimento">Aux. Recebimento</option>
                        <option value="Cartazista">Cartazista</option>
                        <option value="Conferente">Conferente</option>
                        <option value="Estoquista">Estoquista</option>
                        <option value="Gerente">Gerente</option>
                        <option value="Informática">Informática</option>
                        <option value="Lider">Lider</option>
                        <option value="Nutricionista">Nutricionista</option>
                        <option value="Operador(a)">Operador(a)</option>
                        <option value="Prevenção">Prevenção</option>
                        <option value="Repositor(a)">Repositor(a)</option>
                        <option value="Supervisor ADM.">Supervisor ADM.</option>
                        <option value="Supervisor OPE.">Supervisor OPE.</option>
                    </select>
                    <label class="col-sm-12">Status</label>
                    <select class="form-control col-sm-12" name="statusUser" title="Selecione um cargo" required>
                        <option value="<?= $res[0]["statusUser"] ?>">
                            <?php
                            if ($res[0]["statusUser"] != 0):
                                echo "Liberado";
                            else:
                                echo "Bloqueado";
                            endif;
                            ?>
                        </option>
                        <option value="1">Liberado</option>
                        <option value="0">Bloqueado</option>
                    </select>
                    <div class="col-sm-12">
                        <hr>
                        <label class="col-sm-12">Termo Assinado</label><br />
                        <?php
                        if ($res[0]["termo"] == 1):
                            echo "<input type=\"radio\" name=\"termo\" value=\"1\" checked=\"true\"/> Sim
                                  <input type=\"radio\" name=\"termo\" value=\"0\"/> Não";

                        else:
                            echo "<input type=\"radio\" name=\"termo\" value=\"1\"/> Sim
                                      <input type=\"radio\" name=\"termo\" value=\"0\" checked=\"true\"/> Não";
                        endif;
                        ?>
                    </div>
                    <div class="col-sm-12">
                        <hr>
                        <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Atualizar</button>
                        <button type="reset" class="btn btn-primary">Resetar</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <?php
                if (isset($sb1)):
                    if (!$sb1->getResult()):
                        Mensagem($sb1->getError(), ERROR);
                    else:
                        Mensagem($sb1->getError(), ACCEPT);
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
