<?php
$UserDel = filter_input(INPUT_GET, 'del', FILTER_DEFAULT);
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label class="fa fa-2x">Colaboradores Cadastrados</label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="_table_">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matricula</th>
                                <th>Setor</th>
                                <th>Função</th>
                                <th>Termo assinado</th>
                                <th>Status</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('usersEquip');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $nome ?></td>
                                    <td><?= $matricula ?></td>
                                    <td><?= $setor ?></td>
                                    <td><?= $funcao ?></td>
                                    <td><?php
                                        if ($termo == 1):
                                            echo "Assinado";
                                        else:
                                            echo "Falta Assinar";
                                        endif;
                                        ?></td>
                                    <td><?php if ($statusUser == 1):
                                            echo "Liberado";
                                        else:
                                            echo "Bloqueado";
                                        endif; ?></td>
                                    <td><a href="painel.php?exe=equip/User&id=<?= $id; ?>" class="fa fa-user btn btn-info"> Editar</a></td>
                                    <td><?php echo "<a class =\"fa fa-eraser btn btn-danger\" onclick='Confirmation(\"$id\")'> Excluir</a>"; ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <?php
                if ($UserDel):
                    $Del = new CadColaborador();
                    $Del->ExeDelete($UserDel);
                    if (!$Del->getResult()):
                        Mensagem($Del->getError(), ERROR);
                    else:
                        Mensagem($Del->getError(), ACCEPT);
                    endif;
                endif;
                ?>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<script>
    function Confirmation(id) {
        if (confirm('Deseja deletar esse Usuário ?'))
            window.location.href = "painel.php?exe=equip/editUser&del=" + id;
    }
</script>
<?php
$read->disconnect();


