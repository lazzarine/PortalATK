<?php
$EquipDel = filter_input(INPUT_GET, 'del', FILTER_DEFAULT);
?>
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label class="fa fa-2x">Equipamentos Cadastrados</label>
            </div>
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="_table_">
                        <thead>
                            <tr>
                                <th>Numero do equipamento</th>
                                <th>Numero de série</th>
                                <th>Modelo do Equipamento</th>
                                <th>Status</th>
                                <th>Editar</th>
                                <th>Excluir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('equipamentos', '*', NULL, "statusEquip = 'OK'");
                            $ok = $read->numRows();
                            $read->select('equipamentos', '*', NULL, "statusEquip = 'Manutenção'");
                            $mnt = $read->numRows();
                            $read->select('equipamentos', '*', NULL, "statusEquip = 'Quebrado'");
                            $qbd = $read->numRows();
                            $read->select('equipamentos');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $numEquip ?></td>
                                    <td><?= $numSerie ?></td>
                                    <td><?= $tpEquip ?></td>
                                    <td><?= $statusEquip ?></td>
                                    <td><a href="painel.php?exe=equip/Equip&id=<?= $idEquip; ?>" class="fa fa-user btn btn-info"> Editar</a></td>
                                    <td><?php echo "<a class =\"fa fa-eraser btn btn-danger\" onclick='Confirmation(\"$idEquip\")'> Excluir</a>"; ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                <label>Funcionando <span class="badge bg-color-green"><?=$ok ?></span></label>&nbsp;
                <label>Manutenção <span class="badge bg-color-blue"><?=$mnt ?></span></label>&nbsp;
                <label>Quebrados <span class="badge bg-color-red"><?=$qbd ?></span></label>
            </div>
            <div class="panel-footer">
                <?php
                if ($EquipDel):
                    $Del = new Equip();
                    $Del->ExeDelete($EquipDel);
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
            window.location.href = "painel.php?exe=equip/editEquip&del=" + id;
    }
</script>
<?php
$read->disconnect();


