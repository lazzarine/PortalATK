<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading text-center col-sm-12">
                <label class="fa fa-2x col-sm-10">Equipamentos Em Uso</label>
                <label class="fa fa-refresh btn btn-sm btn-success col-xs-2" onclick="Refresh ()"> Atualizar</label>
            </div>
            <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover table-responsive" id="_table_">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Matricula</th>
                                <th>Setor</th>
                                <th>Nº Equip.</th>
                                <th>Modelo</th>
                                <th>Data Retirada</th>
                                <th>Hora Retirada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $read = new Database;
                            $read->connect();
                            $read->select('retiradaEquip');
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?= $nome ?></td>
                                    <td><?= $matricula ?></td>
                                    <td><?= $setor ?></td>
                                    <td><?= $numEquip ?></td>
                                    <td><?= $tpEquip ?></td>
                                    <td><?= $dtRetirada ?></td>
                                    <td><?= $hrRetirada ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>
        <!--End Advanced Tables -->
    </div>
</div>
<script>
    function Refresh () {
        window.location.href = "painel.php?exe=equip/pendente";
    };
</script>
<?php
$read->disconnect();


