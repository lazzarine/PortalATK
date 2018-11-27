
<?php
$target_dir = "./recarga/";
$target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file) and isset($_FILES["arquivo"])):
    Mensagem("O arquivo" . basename($_FILES["arquivo"]["name"]) . " atualizado com sucesso!.", ACCEPT);
    echo "The file " . basename($_FILES["arquivo"]["name"]) . " has been uploaded.";
else:
    Mensagem("Arquivo não atualizado!", ERROR);
endif;
?>

<div class="row">
    <div class="col-md-12 text-center">
        <!-- Form Elements -->
        <div class="panel panel-primary">
            <div class="panel-heading ">
                <label class="fa fa-2x fa-edit">
                    Importação do arquivo
                </label>
            </div>
            <div class="panel-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="arquivo">Arquivo</label>
                        <div class="input-group-addon margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-upload fa-fw" aria-hidden="true"></i></span>
                            <input name="arquivo" class="form-control" type="file" placeholder="Upload do arquivo">
                            <input name="Enviar" class="form-control" type="submit" placeholder="Upload do arquivo">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

