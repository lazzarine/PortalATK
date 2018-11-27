<?php
$cadEquip = filter_input_array(INPUT_POST, FILTER_DEFAULT);
?>
<div class="row">
    <div class="col-sm-6 text-center" style="margin-top: 5px; margin-left:20%">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label class="fa fa-2x">
                    Cadastrar Equipamento
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="" method="post" name="UserCreateForm">
                    <div class="form-group">
                        <label class="h3">Numero de Serie</label>
                        <input class="form-control"
                               type ="text" name="numSerie"
                               placeholder="Numero de Serie"
                               title="Digite o numero de serie"
                               required
                               />
                        <label class="h3">Numero do equipamento</label>
                        <input class="form-control"
                               type ="text" name="numEquip"
                               placeholder="Numero do equipamento"
                               title="Digite o numero do equipamento"
                               required
                               />
                        <label class="h3">Equipamento</label>
                        <select class="form-control" name="tpEquip" title="Equipamento" required>
                            <option value=""/>Selecione</option>
                            <option value="SB1"/>SB1</option>
                        </select>
                        <hr />
                        <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-lg btn-primary">Atualizar</button>
                        <button type="reset" class="btn btn-lg btn-primary">Resetar</button>
                    </div>
                </form>
            </div>
            <div class="panel-footer">
                <?php
                if ($cadEquip && $cadEquip['SendPostForm']):
                    unset($cadEquip['SendPostForm']);
                    $equip = new Equip();
                    $equip->ExeCreate($cadEquip);
                    if (!$equip->getResult()):
                        Mensagem($equip->getError(), ERROR);
                    else:
                        Mensagem($equip->getError(), ACCEPT);
                    endif;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>

