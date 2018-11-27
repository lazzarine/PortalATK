<?php
$ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($ClienteData && $ClienteData['SendPostForm']):
    unset($ClienteData['SendPostForm']);
    $value = explode(";", $ClienteData['acesso']);
    unset($ClienteData['acesso']);
    $value = array("acesso" => $value[0], "link" => $value[1]);
    $ClienteData = array_merge($ClienteData, $value);

    $CriarAcesso = new AdminAcesso;
    $CriarAcesso->ExeCreate($ClienteData);
    if ($CriarAcesso->getResult()):
        echo "<pre class='alert-danger'>{$CriarAcesso->getError()}</pre>";
    else:
        echo "<pre class='alert-success'>{$CriarAcesso->getError()}</pre>";
    endif;
endif;
$read = new Database;
$read->connect();
$read->select('users', 'login');
$login = $read->getResult();
$read->selectDst('acess', 'modulo');
?>  

<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Adicionar acesso ao usuário
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" action="" method="post" name="UserCreateForm">
                            <div class="form-group">
                                <label>Usuário</label>
                                <select class="form-control" name="username" title="Selecione um usuário" required>
                                    <option value="">Selecione um usuário</option>
                                    <?php
                                    foreach ($login as $value):
                                        extract($value);
                                        ?>
                                        <option value="<?php echo $login ?>"><?php echo $login ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Módulo</label>
                                <select class="form-control" id="acesso" name="modulo" title="Selecione um setor" onchange="buscar();" required/>
                                <option value="">Selecione um módulo</option>
                                <?php
                                foreach ($read->getResult() as $read_result):
                                    extract($read_result);
                                    ?>
                                    <option value="<?php echo $modulo ?>"><?php echo utf8_encode($modulo) ?></option>
                                    <?php
                                endforeach;
                                ?>
                                </select>
                                <label>Acesso</label>
                                <select class="form-control" id="load_acesso" name="acesso" title="Selecione um acesso" required>
                                    <option value="">Selecione um acesso</option>
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
