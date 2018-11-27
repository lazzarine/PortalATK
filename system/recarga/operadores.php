<?php
$UserDel = filter_input(INPUT_GET, 'delete', FILTER_DEFAULT);

if ($UserDel):
    $Delete = new CadOpe();
    $Delete->ExeDelete($UserDel);
      if ($Delete->getResult()== TRUE):
        Mensagem($Delete->getError(), ACCEPT);
      else:
        Mensagem($Delete->getError(), ERROR);
      endif;
endif;
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label class="fa fa-2x">Operadores Cadastrados</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Matricula</th>
                                <th>Nome</th>
                                <th>Função</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('operador');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $matricula ?></td>
                                    <td><?php echo $nome_operador ?></td>
                                    <td><?php echo $cargo ?></td>
                                    <td><a href="painel.php?exe=recarga/operadoredit&id=<?php echo $idoperador; ?>" class="fa fa-user btn btn-info"> Editar</a></td>
                                    <td><?php echo "<a class =\"fa fa-eraser btn btn-danger\" onclick='Confirmation(\"$idoperador\")'> Excluir</a>"; ?></td>
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
if(confirm('Deseja deletar esse Usuário ?'))
window.location.href="painel.php?exe=recarga/operadores&delete="+id;
}
</script>
<?php
$read->disconnect();



