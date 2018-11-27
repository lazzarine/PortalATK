<?php
$relatorios = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($relatorios && $relatorios['SendPostForm'] && $relatorios['nome_r']):
    $user = $relatorios['usuario'];
    unset($relatorios['usuario']);
    unset($relatorios['SendPostForm']);
    foreach ($relatorios['nome_r'] as $value):
        $array[] = explode(";", $value);
    endforeach;
    $create = new VinculaRelatorio;
    $create->VinRelatorio($user, $array);
    if ($create->getResult()):
        echo "<pre class='alert-success'>{$create->getError()}</pre>";
    else:
        echo "<pre class='alert-danger'>{$create->getError()}</pre>";
    endif;

endif;
$read = new Database;
$read->connect();
$read->select('users', 'login');
?>  

<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label>
                    Vincular relatório ao usuário.
                </label>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" action="" method="post" name="UserCreateForm">
                            <div class="form-group">
                                <label>Usuário: </label>
                                <select class="form-inline" name="usuario" title="Selecione um usuário" required>
                                    <option value="">Selecione um usuário</option>
                                    <?php
                                    foreach ($read->getResult() as $result):
                                        extract($result);
                                        echo "<option value='{$login}'>{$login}</option>";
                                    endforeach;
                                    ?>
                                </select>
                                <hr />
                                <div class="row">
                                    <?php
                                    $read->select('relatorios_save');
                                    foreach ($read->getResult() as $result):
                                        extract($result);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="checkbox bg-info">
                                                <label>
                                                    <input type="checkbox" name="nome_r[]" value="<?php echo $nome_r . ";" . $descricao_r. ";". $csv ?>"/> <?php echo "<b>{$nome_r}</b> - {$descricao_r}" ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <br />
                                <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Atualizar</button>
                                <button type="reset" class="btn btn-primary">Resetar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
<?php
$read->disconnect();
