<?php
$NovoRelat = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($NovoRelat && $NovoRelat['SendPostForm']):
    unset($NovoRelat['SendPostForm']);
    $Create = new AdminRelat();
    $Create->CreateRelat($NovoRelat);
    if ($Create->getResult()):
        echo "<pre class='alert-success'>{$Create->getError()}</pre>";
    else:
        echo "<pre class='alert-danger'>{$Create->getError()}</pre>";
    endif;
endif;
?> 
<script>

    $(function () {
        $("#calendario").datepicker({dateFormat: 'dd-mm-yy',
            dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'],
            dayNamesMin: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'],
            dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'],
            monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
        });
    });
</script>
<?php
date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');
$hora = date('H:i:s');
$data_br = $data;
//$data_br = '01/02/2010';
list($dia, $mes, $ano) = explode('/', $data_br);
$time = mktime(0, 0, 0, $mes, $dia, $ano);
//echo strftime('%d/%m/%Y', $time);
?>


<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                <label>
                    Criar novo Relatório
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label>Matricula</label>
                                <input class="form-control"
                                       type ="text" name="matricula"
                                       placeholder="Matricula do operador"
                                       title="Digite a matricula"
                                       maxlength="5"
                                       required
                                       />
                            </div>
                            <div class="col-md-4">
                                <label>Nome</label>
                                <input class="form-control"
                                       type ="text" name="nome"
                                       placeholder="Nome do Operador"
                                       title="Nome do Operador"
                                       maxlength="5"
                                       required
                                       />
                            </div>
                            <div class="col-md-4">
                                <label>Função</label>
                                <input class="form-control"
                                       type ="text" name="nome"
                                       placeholder="Função"
                                       title="Cargo do operador"
                                       maxlength="5"
                                       required
                                       />
                            </div>
                        </div>
                        <hr>
                       
                        <div class="row">
                           
                                <br />
                                <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Atualizar</button>
                                <button type="reset" class="btn btn-primary">Resetar</button>
                            </div>
                            
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
<?php



