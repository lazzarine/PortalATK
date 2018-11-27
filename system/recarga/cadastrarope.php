<?php
$CadOperador = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($CadOperador && $CadOperador['SendPostForm']):
    unset($CadOperador['SendPostForm']);
    $Create = new CadOpe;
    $Create->ExeCreate($CadOperador);
    if ($Create->getResult()):
        echo "<pre class='alert-success'>{$Create->getError()}</pre>";
    else:
        echo "<pre class='alert-danger'>{$Create->getError()}</pre>";
    endif;
endif;
?>  

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
                                   title="Informe a matricula [ de 1 a 4 caracteres! ]"
                                   maxlength="4"
                                   pattern=".{1,4}"
                                   required
                                   />
                        </div>
                        <div class="col-md-8">
                            <label class="fa"><h3>Nome</h3></label>
                            <input class="form-control altinho fa-2x"
                                   type ="text" name="nome_operador"
                                   placeholder="Nome"
                                   title="Digite o Nome"
                                   maxlength="50"
                                   required
                                   />
                        </div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-md-4">
                            <label class="fa"><h3>Função</h3></label>
                            <select class="form-control altinho fa-2x" name="cargo" title="Selecione a funcao" required>
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
