<?php
$ClienteData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($ClienteData && $ClienteData['SendPostForm']):
            unset($ClienteData['SendPostForm']);
            $cadastra = new AdminUser;
            $cadastra->ExeCreate($ClienteData);

            if($cadastra->getResult()):
               echo "<pre class='alert-success'>Usuário cadastrado com sucesso !</pre>";
            else:
                echo "<pre class='alert-danger'>Erro ao cadastrar o usuario. </pre>";
            endif;
        endif;


?>  

<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Adicionar Novo Usuário
            </div>


            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form role="form" action="" method="post" name="UserCreateForm">
                            <div class="form-group">
                                <label>Nome</label>
                                <input class="form-control"
                                       placeholder="Nome"
                                       type="text"
                                       name="nome"
                                       value="<?php if (!empty($ClienteData['nome'])) echo $ClienteData['nome']; ?>"
                                       title="Informe seu nome completo"
                                       required
                                       />
                                
                                <label>Login</label>
                                <input class="form-control"
                                       placeholder="Login"
                                       type="text"
                                       name="login"
                                       value="<?php if (!empty($ClienteData['login'])) echo $ClienteData['login']; ?>"
                                       title="Informe seu login"
                                       required
                                       />
                                <label>Senha</label>
                                <input class="form-control"
                                       placeholder="Senha"
                                       type="password"
                                       name="senha"
                                       value="<?php if (!empty($ClienteData['senha'])) echo $ClienteData['senha']; ?>"
                                       title="Informe sua senha [ de 6 a 12 caracteres! ]"
                                       pattern = ".{6,12}"
                                       required
                                       />
                                <label>Setor</label>
                                <select class="form-control" name="setor" title="Selecione um setor" required>
                                <option value="">Setor</option>
                                <option value="Almoxarifado"/>Almoxarifado</option>
                                <option value="Atendimento ao cliente">Atendimento ao cliente</option>
                                <option value="Cartaz">Cartaz</option>
                                <option value="Cozinha">Cozinha</option>
                                <option value="Depósito">Depósito</option>
                                <option value="Estoque">Estoque</option>
                                <option value="FCXA">Frente de Caixa</option>
                                <option value="Frios">Frios</option>
                                <option value="Gerência">Gerência</option>
                                <option value="Hort-Fruti">Hort-Fruti</option>
                                <option value="Informática">Informática</option>
                                <option value="Loja">Loja</option>
                                <option value="Prevenção">Prevenção</option>
                                <option value="Recursos Humanos">Recursos Humanos</option>
                                </select>
                                
                                <label>Função</label>
                                <select class="form-control" name="funcao" title="Selecione um setor" required>
                                <option value="">Função</option>
                                <option value="Analista R.H"/>Analista R.H</option>
                                <option value="Apoio a FCXA">Apoio a FCXA</option>
                                <option value="Apoio a gerência">Apoio a gerência</option>
                                <option value="Assistente ADM.">Assistente ADM.</option>
                                <option value="Atendente P.P">Atendente P.P</option>
                                <option value="Aux. Almoxarifado">Aux. Almoxarifado</option>
                                <option value="Aux. Cadastro">Aux. Cadastro</option>
                                <option value="Aux. Recebimento">Aux. Recebimento</option>
                                <option value="Cartazista">Cartazista</option>
                                <option value="Conferente">Conferente</option>
                                <option value="Estoquista">Estoquista</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Informática">Informática</option>
                                <option value="Lider">Lider</option>
                                <option value="Nutricionista">Nutricionista</option>
                                <option value="Operador(a)">Operador(a)</option>
                                <option value="Prevenção">Prevenção</option>
                                <option value="Repositor(a)">Repositor(a)</option>
                                <option value="Supervisor ADM.">Supervisor ADM.</option>
                                <option value="Supervisor OPE.">Supervisor OPE.</option>
                                </select>

                                <label>Nivel Acesso</label>
                                <select class="form-control" name="nivel_acesso" title="Selecione o nivel de acesso" required>
                                <option value="">Selecione o nivel de acesso</option>
                                <option value="1">Administrador</option>
                                <option value="2">Normal</option>
                                </select>

                                <label>Status</label>
                                <select class="form-control" name="status_usuario" title="Selecione">
                                <option value="0">Bloqueado</option>
                                <option value="1">Liberado</option>
                                </select>

                                <br />
                                <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Cadastrar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Form Elements -->
    </div>
</div>
<!-- /. ROW  -->
<div class="row">
</div>