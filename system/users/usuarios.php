<?php
$UserDel = filter_input(INPUT_GET, 'delete', FILTER_DEFAULT);

if ($UserDel):
    $Delete = new AdminUser;
    $Delete->ExeDelete($UserDel);
      if ($Delete->getResult()== TRUE):
      echo "<pre class='alert-success'>{$Delete->getError()}</pre>";
      else:
      echo "<pre class='alert-danger'>{$Delete->getError()}</pre>";
      endif;
endif;
?>
<div class="row">
    <div class="col-md-12">
        <a class="btn btn-success circle-btn" href="painel.php?exe=users/caduser">Cadastar novo usuário</a>
        <hr />
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label>Lista de usuários</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Login</th>
                                <th>Setor</th>
                                <th>Função</th>
                                <th>Nivel Acesso</th>
                                <th>Status</th>
                                <th>Editar</th>
                                <th>Excluir  usuário</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('users');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $nome ?></td>
                                    <td><?php echo $login ?></td>
                                    <td><?php echo $setor ?></td>
                                    <td><?php echo $funcao ?></td>
                                    <td class="center"><?php echo $nivel_acesso <= 1 ? "Admin" : "Normal"; ?></td>
                                    <td class="center"><?php echo $status_usuario >= 1 ? "Ativo" : "Bloqueado"; ?></td>
                                    <td><a href="painel.php?exe=users/cadedit&user=<?php echo $id_user; ?>" class="fa fa-user"> Editar</a></td>
                                    <td><?php echo "<a class=\"fa fa-eraser\" onclick='Confirmation(\"$id_user\")'>Excluir</a>"; ?></td>
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
window.location.href="painel.php?exe=users/usuarios&delete="+id;
}
</script>
<?php
$read->disconnect();

