<?php
$RelatDel = filter_input(INPUT_GET, 'RelatDel', FILTER_VALIDATE_INT);
if ($RelatDel):
    $Delete = new VinculaRelatorio();
    $Delete->DeleteRelat($RelatDel);
    if ($Delete->getResult() == TRUE):
        echo "<label class='alert-success'>{$Delete->getError()}</label>";
    else:
        echo "<label class='alert-danger'>{$Delete->getError()}</label>";
    endif;
endif;
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading  text-center">
                <label>Listagem de relatórios cadastrados</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="_table_" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Relatório</th>
                                <th>Descrição</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('acesso_relatorio', '*', NULL, NULL, 'usuario');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td class="center"><?php echo utf8_encode($nome_r) ?></td>
                                    <td><?php echo utf8_encode($usuario) ?></td>
                                    <td><?php echo "<a class=\"fa fa-eraser\" onclick='Confirmation(".$idacesso_r.")'>Excluir</a>"; ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="panel-footer">
                
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<script>
function Confirmation(id){
if(confirm('Deseja deletar esse Acesso ?'))
window.location.href="painel.php?exe=arquivos/readUser_r&RelatDel="+id;
}
</script>
<?php
$read->disconnect();

