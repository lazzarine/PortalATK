<?php
    //$session->TempRestante();
    $mat = filter_input(INPUT_POST, "matricula", FILTER_DEFAULT);
    $serie = filter_input(INPUT_POST, "numSerie", FILTER_DEFAULT);
?>
<div class="row">
    <div class="col-md-12 text-center">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Equipe
                </label>
            </div>
            <div class="panel-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="arquivo">Arquivo</label>
                        <div class="input-group-addon margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-upload fa-fw" aria-hidden="true"></i></span>
                            <input name="arquivo" class="form-control" type="file" placeholder="Upload do arquivo">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

