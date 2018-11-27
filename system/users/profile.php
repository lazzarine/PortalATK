<?php
$ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$session = new session;
$id = $session->getSession();

if ($ClienteData && $ClienteData['SendPostForm']):
    unset($ClienteData['SendPostForm']);
    $upadate = new AdminUser;
    $upadate->ExeUpdate($id[0]['id_user'], $ClienteData);
    //var_dump($ClienteData);

    if ($upadate->getResult()):
        echo $upadate->getError();
    else:
        echo "Erro ao cadastrar";
    endif;
endif;

$read = new Database;
$read->connect();
$read->select('users', '*', NULL, "id_user = '{$id[0]['id_user']}'");
$resultado = $read->getResult();
?>  

<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Trocar senha</h4>
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
                                       title="Seu nome completo"
                                       Disabled
                                       />

                                <label>Login</label>
                                <input class="form-control"
                                       placeholder="Login"
                                       type="text"
                                       name="login"
                                       value="<?php echo $resultado[0]['login'] ?>"
                                       title="Seu login"
                                       Disabled
                                       />
                                <label>Senha</label>
                                <input class="form-control"
                                       placeholder="Senha"
                                       type="password"
                                       name="senha"
                                       value=""
                                       title="Informe sua senha [ de 6 a 12 caracteres! ]"
                                       pattern = ".{6,32}"
                                       required
                                       />
                                <label>Setor</label>

                                <select class="form-control" name="setor" title="Setor" Disabled>
                                <option value="<?php echo $resultado[0]['setor'] ?>"><?php echo $resultado[0]['setor'] ?></option>
                                </select>
                                
                                <label>Função</label>
                                <select class="form-control" name="setor" title="Setor" Disabled>
                                <option value="<?php echo $resultado[0]['funcao'] ?>"><?php echo $resultado[0]['funcao'] ?></option>
                                </select>

                                <label>Nivel Acesso</label>
                                <select class="form-control" name="nivel_acesso" title="Nivel de acesso" Disabled/>
                                <option value="<?php echo $resultado[0]['nivel_acesso'] ?>"><?php echo $resultado[0]['nivel_acesso']<= 1 ? "Admin" : "Normal"; ?>
                                
                                </option>
                                </select>

                                <label>Status</label>
                                <select class="form-control" name="status_usuario" title="Status" Disabled>
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
