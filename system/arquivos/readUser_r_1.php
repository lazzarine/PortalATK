<?php
$RelatDel = filter_input(INPUT_GET,'RelatDel', FILTER_DEFAULT);
if ($RelatDel):
    $Delete = new AdminRelat();
    $Delete->DeleteRelat($RelatDel);
      if ($Delete->getResult()== TRUE):
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                    <td><a href="painel.php?exe=arquivos/read_r&RelatDel=<?php echo $id_r; ?>" class="fa fa-eraser"> Excluir</a></td>
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
<?php
$read->disconnect();

