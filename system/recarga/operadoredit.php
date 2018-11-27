<?php
$ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$id = filter_input(INPUT_GET, 'id', FILTER_DEFAULT);

if ($ClienteData && $ClienteData['SendPostForm']):
    unset($ClienteData['SendPostForm']);
    $upadate = new CadOpe;
    $upadate->ExeUpdate($id, $ClienteData);

    if ($upadate->getResult()):
        echo $upadate->getError();
    else:
        echo "<label class=\"label-danger\">Erro ao cadastrar</label>";
    endif;
endif;

$read = new Database;
$read->connect();
$read->select('operador', '*', NULL, "idoperador = '{$id}'");
$resultado = $read->getResult();
?>  
<label class="pull-right">
    <a class="btn btn-primary fa fa-arrow-left" href="painel.php?exe=sacola/operadores"> voltar</a>
</label>
<div class="row">
    <div class="col-md-8 text-center" style="margin-left: 15%; margin-top: 5%">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Cadastro de Operador
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="fa"><h3>Matricula</h3></label>
                            <input class="form-control altinho fa-2x"
                                   type ="text" name="matricula"
                                   placeholder="Matricula"
                                   value="<?php echo $resultado[0]['matricula'] ?>"
                                   title="Informe a matricula [ de 1 a 4 caracteres! ]"
                                   maxlength="4"
                                   pattern=".{1,4}"
                                   disabled
                                   />
                        </div>
                        <div class="col-md-8">
                            <label class="fa"><h3>Nome</h3></label>
                            <input class="form-control altinho fa-2x"
                                   type ="text" name="nome_operador"
                                   placeholder="Nome"
                                   value="<?php echo $resultado[0]['nome_operador'] ?>"
                                   title="Digite o Nome"
                                   maxlength="50"
                                   />
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label class="fa"><h3>Função</h3></label>
                            <select id="load_armario" class="form-control altinho fa-2x" name="cargo" title="Selecione a funcao" required>
                                <option value="">Selecione</option>
                                <option value="Operador(a)">Operador(a)</option>
                                <option value="Passador(a)">Passador(a)</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-lg btn-primary">Cadastrar</button>
                    <button type="reset" class="btn btn-lg btn-primary">Resetar</button>
                </form>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>



