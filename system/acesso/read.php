<?php
$AcessoDel = filter_input(INPUT_GET,'AcessoDel', FILTER_DEFAULT);
if ($AcessoDel):
    $Delete = new AdminAcesso;
    $Delete->ExeDelete($AcessoDel);
      if ($Delete->getResult()== TRUE):
      echo "<pre class='alert-success'>{$Delete->getError()}</pre>";
      else:
      echo "<pre class='alert-danger'>{$Delete->getError()}</pre>";
      endif;
endif;

?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Lista de usuários
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Usuário</th>
                                <th>Módulo</th>
                                <th>Acesso</th>
                                <th>Link</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('modulos', '*', NULL, NULL, 'username');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td class="center"><?php echo utf8_encode($username) ?></td>
                                    <td><?php echo utf8_encode($modulo) ?></td>
                                    <td><?php echo utf8_encode($acesso) ?></td>
                                    <td><?php echo utf8_encode($link) ?></td>
                                    <td><?php echo "<a class=\"fa fa-eraser\" onclick='Confirmation(".$idmodulo.")'>Excluir</a>"; ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<script>
function Confirmation(id){
if(confirm('Deseja deletar esse Usuário?'))
window.location.href="painel.php?exe=acesso/read&AcessoDel="+id;
}
</script>
<?php
$read->disconnect();

