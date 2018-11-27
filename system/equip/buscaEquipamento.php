<?php

require('../class/Database.class.php');

$serie = filter_input(INPUT_GET, 'serie', FILTER_DEFAULT);
$readOperador = new Database;
$readOperador->connect();
$readOperador->select('equipamentos', '*', NULL, "numSerie = '{$serie}'");
$result = $readOperador->getResult();
switch ($result[0]["statusEquip"]):
    case NULL:
        echo "<div class=\"col-lg-12\" id=\"load_buscaEquip\" >
    <label class=\"fa\"><h3>Mensagem</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"numEquip\"
           value=\"Não encontrado\"
           disabled=\"true\"
           />
</div>";
    break;
    case "Quebrado":
        echo "<div class=\"col-lg-12\" id=\"load_buscaEquip\" >
    <label class=\"fa\"><h3>Mensagem</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"numEquip\"
           value=\"Equipamento {$result[0]["statusEquip"]}\"
           disabled=\"true\"
           />
</div>";
        break;
    case "Manutenção":
        echo "<div class=\"col-lg-12\" id=\"load_buscaEquip\" >
    <label class=\"fa\"><h3>Mensagem</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"numEquip\"
           value=\"Equipamento em {$result[0]["statusEquip"]}\"
           disabled=\"true\"
           />
</div>";
        break;
    case "OK":
        echo "<div class=\"col-lg-12\" id=\"load_buscaEquip\" >
    <label class=\"fa\"><h3>Numero do Equipamento</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"numEquip\"
           value=\"{$result[0]["numEquip"]}\"
           disabled=\"true\"
           />
</div>";
        break;
endswitch;
$readOperador->disconnect();
?>

