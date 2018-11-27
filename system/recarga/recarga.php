<?php
//$session->TempRestante();
$recarga = new Recarga;
$recarga->VerificaArq("CEL20180901_20180909.csv");
if (!$recarga->getResult()):
    Mensagem($recarga->getError(), ERROR,True);
endif;

$recarga->AtuRecarga();

?>
<div class="row">
    <div class="col-md-12 text-center">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Recarga de Celular
                </label>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="_table_">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr class="odd gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                    </tbody>
                </table>
            </div>
            <div class="panel-footer" style="height:70px">
            </div>
        </div>
    </div>
</div>

