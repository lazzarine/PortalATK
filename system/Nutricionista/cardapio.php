
<?php
$cardapio = filter_input_array(INPUT_POST, FILTER_DEFAULT);
if ($cardapio && $cardapio['SendPostForm']):
    unset($cardapio['SendPostForm']);
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><cardapio />');
    $xml->addChild('data', date("d/m/y"));
    foreach ($cardapio as $indice => $valor):
        $xml->addChild($indice, $valor);
    endforeach;
    $xml->asXML("cardapio.xml");
endif;

if (!file_exists("cardapio.xml")):
    Mensagem("Erro ao abrir o arquivo !", ERROR);
else:
    $readxml = simplexml_load_file('cardapio.xml');
endif;
?>  

<div class="row">
    <div class="col-md-12">
        <!-- Form Elements -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <label class="fa fa-2x">Cardapio do Dia</label>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <form role="form" action="" method="post" name="UserCreateForm">
                            <div class="form-group">
                                <label>Prato Principal</label>
                                <input class="form-control"
                                       placeholder="Prato Principal"
                                       type="text"
                                       name="principal"
                                       value=""
                                       title="Informe o prato principal"
                                       required
                                       spellcheck="true"
                                       style="text-transform: capitalize"
                                       />

                                <label>Opção</label>
                                <input class="form-control"
                                       placeholder="opção"
                                       type="text"
                                       name="opcao"
                                       value=""
                                       title="Informe a opção"
                                       required
                                       spellcheck="true"
                                       style="text-transform: capitalize"
                                       />
                                <label>Guarnição</label>
                                <input class="form-control"
                                       placeholder="guarnição"
                                       type="text"
                                       name="guarnicao"
                                       value=""
                                       title="Informe a guarnição"
                                       required
                                       spellcheck="true"
                                       style="text-transform: capitalize"
                                       />
                                <label>Saladas</label>
                                <input class="form-control"
                                       placeholder="Saladas"
                                       type="text"
                                       name="saladas"
                                       value=""
                                       title="Informe a saladas"
                                       required
                                       spellcheck="true"
                                       style="text-transform: capitalize"
                                       />
                                <label>Bebida</label>
                                <input class="form-control"
                                       placeholder="Bebida"
                                       type="text"
                                       name="bebida"
                                       value=""
                                       title="Informe a Bebida"
                                       required
                                       spellcheck="true"
                                       style="text-transform: capitalize"
                                       />
                                <label>Sobremesa</label>
                                <input class="form-control"
                                       placeholder="Sobremessa"
                                       type="text"
                                       name="sobremesa"
                                       value=""
                                       title="Informe a sobremessa"
                                       required
                                       spellcheck="true"
                                       style="text-transform: capitalize"
                                       />

                                <br />
                                <button type="submit" name="SendPostForm" value="Cadastrar Usuário" class="btn btn-primary">Gravar</button>
                                <button type="reset" class="btn btn-primary">Limpar</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-6 text-center">
                        <table class="table table-condensed table-striped table-responsive table-hover">
                            <tr>
                                <td class="h4">Data</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->data ?></td>
                            </tr>
                            <tr>
                                <td class="h4">Prato Principal</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->principal ?></td>
                            </tr>
                            <tr>
                                <td class="h4">Opção</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->opcao ?></td>
                            </tr>
                            <tr>
                                <td class="h4">Guarnição</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->guarnicao ?></td>
                            </tr>
                            <tr>
                                <td class="h4">Saladas</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->saladas ?></td>
                            </tr>
                            <tr>
                                <td class="h4">Bebida</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->bebida ?></td>
                            </tr>
                            <tr>
                                <td class="h4">Sobremesa</td>
                            </tr>
                            <tr>
                                <td style="text-transform: capitalize"><?php echo $readxml->sobremesa ?></td>
                            </tr>
                        </table>
                        <?php echo "<a class=\"fa fa-print btn btn-primary btn-circle-adjust\" target=\"_blank\" href=Nutricionista\Cardapio_do_dia.php> Salvar</a>" ?>
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