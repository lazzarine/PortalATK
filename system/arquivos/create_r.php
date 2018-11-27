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

<div class="row">
    <div class="col-md-4 text-center" style="margin-top: 50px; margin-left:30%">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label>
                    Criar novo Relatório
                </label>
            </div>
            <div class="panel-body">
                        <form role="form" action="" method="post" name="UserCreateForm">
                            <div class="form-group">
                                <label>Relatórios</label>
                                <input class="form-control"
                                       type ="text" name="nome_r"
                                       placeholder="Nome do Relatório"
                                       title="Digite o Nome do Relatório"
                                       maxlength="12"
                                       required
                                       />
                                <label>Descrição</label>
                                <textarea class="form-control" type="text" name="descricao_r" placeholder="Descrição do relatóro" title="Digite a Descrição do Relatório" maxlength="60"></textarea>
                                <label>Possui arquivo CSV</label><br />
                                <input type="radio" name="csv" value="true"/> Sim
                                <input type="radio" name="csv" value="false"/> Não
                                <hr />
                                <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Atualizar</button>
                                <button type="reset" class="btn btn-primary">Resetar</button>
                            </div>
                        </form>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
