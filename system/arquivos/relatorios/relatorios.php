<?php
$data = filter_input(INPUT_GET, 'Data', FILTER_VALIDATE_INT);
?>
<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label>
                    Você está visualizando os arquivos do dia 
                    <i class="text-danger">
                        <?php
                        if ($data >= date("d")):
                            echo $data . "/" . (date("m") - 1);
                        else:
                            echo $data . "/" . date("m");
                        endif;
                        ?>
                    </i>.
                </label>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="_table_" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Visualizar Relatório</th>
                                <th>Descrição</th>
                                <th>PDF</th>
                                <th>CSV</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                                    
                            $read = new Database;
                            $read->connect();
                            $read->select('acesso_relatorio', '*', NULL, "usuario = '{$userlogin[0]['login']}'");
                            foreach ($read->getResult() as $resultado):
                                extract($resultado);
                                $relat = base64_encode($nome_r);
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo "<a class=\"fa fa-eye\" target=\"_blank\" href=\"arquivos/relatorios/arq.php?data={$data}&nomeArq={$relat}\">&nbsp;{$nome_r}</a>" ?></td>
                                    <td><?php echo $descricao_r ?></td>
                                    <td><?php echo "<a class=\"fa fa-print\" target=\"_blank\" href=\"arquivos/relatorios/pdf.php?data={$data}&nomeArq={$relat}\">&nbsp;{$nome_r}.pdf</a>" ?></td>
                                    <td><?php echo $csv == "true" ? "<a class=\"fa fa-arrow-down\" href=\"arquivos/relatorios/{$data}/csv/{$nome_r}.csv\">&nbsp;Download</a>" : "Não tem arquivo" ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div> 
            </div>
            <div class="panel-footer text-muted">
               Desenvolvido por CPD São Miguel, 2016
            </div>
        </div>
    </div>
</div>
<?php
$read->disconnect();
