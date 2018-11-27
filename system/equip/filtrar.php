<div class="row">
    <div class="col-sm-6 text-center" style="margin-top: 5px; margin-left:20%">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading ">
                <label class="fa fa-2x">
                    Histórico
                </label>
            </div>
            <div class="panel-body">
                <form role="form" action="painel.php?exe=equip/hist" method="post" name="UserCreateForm">
                    <div class="form-group">
                        <label class="h3">Data Inicial</label>
                        <input class="form-control datepicker fa-2x altinho"
                               type ="date" name="inicio"
                               placeholder="__/__/__"
                               title="Data inicial"
                               required
                               />
                        <label class="h3">Data Final</label>
                        <input class="form-control datepicker fa-2x altinho"
                               type ="date" name="final"
                               placeholder="__/__/__"
                               title="Data Final"
                               required
                               />
                        <label class="h3">Nº Equipamento (Opcional)</label>
                        <input class="form-control fa-2x altinho"
                               type ="number" name="numEquip"
                               placeholder="Numero do equipamento"
                               title="Digite o numero do equipamento"
                               pattern="[a-zA-Z0-9\s]+$"
                               />
                        <label class="h3">Usuário (Opcional)</label>
                        <input class="form-control fa-2x altinho"
                               type ="text" name="nome"
                               placeholder="Nome"
                               title="Digite o nome do colaborador"
                               pattern="[a-zA-Z\s]+$"
                               />
                        <hr />
                        <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-lg btn-primary">Buscar</button>
                        <button type="reset" class="btn btn-lg btn-primary">Resetar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



