<?php
if (!file_exists("../cardapio.xml")):
    Mensagem("Erro ao abrir o arquivo !", ERROR);
else:
    $readxml = simplexml_load_file('../cardapio.xml');
endif;
?>
<style type="text/css">
    <!--
    .ex1
    {
        border-collapse: separate;
        border-spacing: 2px 50px;
    }
    .fonteGd
    {
        font: 15px arial, sans-serif;
        font-size:    40pt;
        font-weight:  bold;
        padding:      1px;
        text-align:   center;
        text-decoration: underline;
        text-transform: capitalize;
    }
    .fontePq
    {
        font: 15px arial, sans-serif;
        font-size:    30pt;
        padding:      1px;
        text-align:   center;
        text-transform: capitalize;
    }
    -->
</style>
<div style="margin-top: 100px">
    <table class="ex1" align="center" >
        <tr>
            <td class="fonteGd">Cardápio do Dia</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->data ?></td>
        </tr>
        <tr>
            <td class="fonteGd">Prato Principal</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->principal ?></td>
        </tr>
        <tr>
            <td class="fonteGd">Opção</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->opcao ?></td>
        </tr>
        <tr>
            <td class="fonteGd">Guarnição</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->guarnicao ?></td>
        </tr>
        <tr>
            <td class="fonteGd">Saladas</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->saladas ?></td>
        </tr>
        <tr>
            <td class="fonteGd">Bebida</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->bebida ?></td>
        </tr>
        <tr>
            <td class="fonteGd">Sobremessa</td>
        </tr>
        <tr>
            <td class="fontePq"><?php echo $readxml->sobremesa ?></td>
        </tr>
    </table>
</div>