
<?php
$option = filter_input(INPUT_POST, "opt");
$up = new atualizaimg;
$up->setOptions($option);
$up->Atualiza();
if ($up->getResult()):
    Mensagem($up->getError(), ACCEPT);
else:
    Mensagem($up->getError(), ERROR);
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
            <?php
        $diretorio = "../../../portal_v3/images/galeria/";
        $ponteiro = opendir($diretorio);
        while ($nome_imgs = readdir($ponteiro)):
            $imgs[] = $nome_imgs;
        endwhile;
        sort($imgs);
        var_dump($option)
     ?>      
            <div class="panel-body">
                <form action="#" name="form" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <select name="opt">
                            <option>Escolha o local</option>
                            <option value="copahurra/">Copa Hurra</option>
                            <option value="campanhas/">Campanhas</option>
                            <option value="destaques/">Destaques do mês</option>
                            <option value="copahurra/">Gifs</option>
                            <option value="fundo/">Fundo</option>         
                        </select>
                        <ul>
                        <?php
                            $num = 0;
                            foreach ($imgs as $jpg):
                                if ($jpg != "." and $jpg != ".."):
                                    
                                    echo "<li>
                                            <img src=\"$diretorio$jpg\">imagem[$num]</a>
                                          </li>";
                                    $num ++;
                                endif;
                            endforeach;
                        ?>
                        </ul>
                    </div>
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

