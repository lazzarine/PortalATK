<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="windows-1252">
        <title></title>
    </head>
    <body>
        <form method="POST" action="">
            <label>Principal</label>
            <input type="text" name="principal" /><br>
            <label>Opção</label>
            <input type="text" name="opcao" /><br>
            <label>Suco</label>
            <input type="text" name="suco" /><br>
            <input type="submit" name="cardapio" value="Gravar"/>
        </form>
        <?php
        $cardapio = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        unset($cardapio['cardapio']);
        //var_dump($cardapio);
        $xml = new SimpleXMLElement('<?xml version="1.0" ?><cardapio />');
        $xml->addChild('principal', $cardapio['principal']);
        $xml->addChild('opcao', $cardapio['opcao']);
        $xml->addChild('suco', $cardapio['suco']);
        $xml->asXML('Cardapio.xml');
        $readxml = simplexml_load_file('Cardapio.xml');
        echo "<pre>";
        var_dump($readxml);
        echo "</pre>";
        echo $readxml->principal;
        ?>
    </body>
</html>
