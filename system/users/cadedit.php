<?php
$ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$id = filter_input(INPUT_GET, 'user', FILTER_DEFAULT);

if ($ClienteData && $ClienteData['SendPostForm']):
    unset($ClienteData['SendPostForm']);
    $upadate = new AdminUser;
    $upadate->ExeUpdate($id, $ClienteData);

    if ($upadate->getResult()):
        echo $upadate->getError();
    else:
        echo "Erro ao cadastrar";
    endif;
endif;

$read = new Database;
$read->connect();
$read->select('users', '*', NULL, "id_user = '{$id}'");
$resultado = $read->getResult();
?>  

<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Adicionar Novo Usuário
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" action="" method="post" name="UserCreateForm">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control"
                                       placeholder="Nome"
                                       type="text"
                                       name="nome"
                                       value="<?php echo $resultado[0]['nome'] ?>"
                                       title="Informe seu nome completo"
                                       required
                                       />

                                <label>Login</label>
                                <input class="form-control"
                                       placeholder="Login"
                                       type="text"
                                       name="login"
                                       value="<?php echo $resultado[0]['login'] ?>"
                                       title="Informe seu login"
                                       required
                                       />
                                <label>Senha</label>
                                <input class="form-control"
                                       placeholder="Senha"
                                       type="password"
                                       name="senha"
                                       value=""
                                       title="Informe sua senha [ de 6 a 12 caracteres! ]"
                                       pattern = ".{6,32}"
                                       />
                                <label>Setor</label>

                                <select class="form-control" name="setor" title="Selecione um setor" required>
                                <option value="<?php echo $resultado[0]['setor'] ?>"><?php echo $resultado[0]['setor'] ?></option>
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
                                
                                <label>Função</label>
                                <select class="form-control" name="funcao" title="Selecione um setor" required>
                                <option value="<?php echo $resultado[0]['funcao'] ?>"><?php echo $resultado[0]['funcao'] ?></option>
                                <option value="Analista R.H"/>Analista R.H</option>
                                <option value="Apoio a FCXA">Apoio a FCXA</option>
                                <option value="Apoio a gerência">Apoio a gerência</option>
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

                                <label>Nivel Acesso</label>
                                <select class="form-control" name="nivel_acesso" title="Selecione o nivel de acesso" required>
                                <?php
                                if ($resultado[0]['nivel_acesso'] == 1):
                                    echo "<option value='1'>Administrador</option>";
                                    echo "<option value='2'>Normal</option>";
                                else:
                                    echo "<option value='{$resultado[0]['nivel_acesso']}'>Normal</option>";
                                    echo "<option value='1'>Administrador</option>";
                                endif;
                                ?>
                                
                                </select>

                                <label>Status</label>
                                <select class="form-control" name="status_usuario" title="Selecione">
                                <?php
                                if ($resultado[0]['status_usuario'] == 1):
                                    echo "<option value='1'>Liberado</option>";
                                    echo "<option value='0'>Bloqueado</option>";
                                else:
                                    echo "<option value='{$resultado[0]['status_usuario']}'>Bloqueado</option>";
                                    echo "<option value='1'>liberado</option>";
                                endif;
                                ?>
                                </select>

                                <br />
                                <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Atualizar</button>
                                <button type="reset" class="btn btn-primary">Resetar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form Elements -->
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
</div>
<?php
$read->disconnect();
