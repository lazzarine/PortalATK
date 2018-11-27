<?php

require('../class/Database.class.php');

$serie = filter_input(INPUT_GET, 'serie', FILTER_DEFAULT);
$readOperador = new Database;
$readOperador->connect();
$readOperador->select('retiradaEquip', '*', NULL, "numSerie = '{$serie}'");
$r = $readOperador->getResult();
if($readOperador->numRows() > 0):
       echo "<div id=\"load_buscaDev\" class=\"text-left\">
                        <fieldset class=\"scheduler-border col-sm-12\">
                            <legend class=\"scheduler-border\">Dados do Colaborador</legend>
                            <label class=\"col-sm-6\">Nome: {$r[0]["nome"]}</label>
                            <label class=\"col-sm-6\">Matricula: {$r[0]["matricula"]}</label>
                            <label class=\"col-sm-6\">Setor: {$r[0]["setor"]}</label>
                            <label class=\"col-sm-6\">Função: {$r[0]["funcao"]}</label>
                        </fieldset> 
                        <fieldset class=\"scheduler-border col-sm-12\">
                            <legend class=\"scheduler-border\">Dados do Equipamento</legend>
                            <label class=\"col-sm-4\">Numero: {$r[0]["numEquip"]}</label>
                            <label class=\"col-sm-4\">Nº Série: {$r[0]["numSerie"]}</label>
                            <label class=\"col-sm-4\">Equipamento: {$r[0]["tpEquip"]}</label>
                            <label class=\"col-sm-4\">Data de Retirada: {$r[0]["dtRetirada"]} as {$r[0]["hrRetirada"]}</label>
                            <label class=\"col-sm-4\">Data de Entrega: </label>
                            <label class=\"col-sm-12\">Observação: {$r[0]["obs"]}</label></div>";
      else:
          echo "<div id=\"load_buscaDev\" class=\"text-left\">
              <fieldset class=\"scheduler-border col-sm-12\">
                            <legend class=\"scheduler-border\">Dados do Colaborador</legend>
                            <label class=\"col-sm-6\">Nome: Não encontrado</label>
                            <label class=\"col-sm-6\">Matricula: Não encontrado</label>
                            <label class=\"col-sm-6\">Setor: Não encontrado</label>
                            <label class=\"col-sm-6\">Função: Não encontrado</label>
                        </fieldset> 
                        <fieldset class=\"scheduler-border col-sm-12\">
                            <legend class=\"scheduler-border\">Dados do Equipamento</legend>
                            <label class=\"col-sm-4\">Numero: Não encontrado</label>
                            <label class=\"col-sm-4\">Nº Série: Não encontrado</label>
                            <label class=\"col-sm-4\">Equipamento: Não encontrado</label>
                            <label class=\"col-sm-4\">Data de Retirada: Não encontrado</label>
                            <label class=\"col-sm-4\">Observação: Não encontrado</label></div>";
endif;
$readOperador->disconnect();

