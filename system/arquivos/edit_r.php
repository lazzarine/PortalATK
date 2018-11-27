<?php
$ID_r = filter_input(INPUT_GET, 'id_r', FILTER_DEFAULT);
$updateRelat = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($updateRelat && $updateRelat['SendPostForm']):
    unset($updateRelat['SendPostForm']);
    $update = new AdminRelat;
    $update->UpdateRelat($ID_r, $updateRelat);
    if ($update->getResult()):
        echo "<label class='alert-success'>{$update->getError()}</label>";
    else:
        echo "<label class='alert-danger'>{$update->getError()}</label>";
    endif;
endif;
if ($ID_r):
    $read = new Database;
    $read->connect();
    $read->select('relatorios_save', '*', NULL, "id_r = '{$ID_r}'");
    $result = $read->getResult();
endif;
?>  
<label class="pull-right">
    <a class="btn btn-primary fa fa-arrow-left" href="painel.php?exe=arquivos/read_r"> voltar</a>
</label>

<div class="row">
    <div class="col-md-4 text-center" style="margin-top: 50px; margin-left:30%">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label>
                    Criar novo Relatório
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div class="form-group">
                        <label>Relatórios</label>
                        <input class="form-control"
                               type ="text" name="nome_r"
                               title="Digite o Nome do Relatório"
                               value="<?php echo $result[0]['nome_r'] ?>"
                               required
                               />
                        <label>Descrição</label>
                        <textarea class="form-control" 
                                  rows="3" 
                                  cols="50" 
                                  name="descricao_r" 
                                  title="Digite a Descrição do Relatório"><?php echo utf8_encode($result[0]['descricao_r']) ?>
                        </textarea>
                        <label>Possui arquivo CSV</label><br />
                        <input type="radio" name="csv" value="true" <?php echo $result[0]['csv'] == "true" ? "checked": "" ?>/> Sim
                        <input type="radio" name="csv" value="false"<?php echo $result[0]['csv'] == "false" ? "checked": "" ?>/> Não
                        <hr />
                        <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Atualizar</button>
                        <button type="reset" class="btn btn-primary">Resetar</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
<?php
$read->disconnect();
