<?php

require('../class/Database.class.php');

$matricula = filter_input(INPUT_GET, 'matricula', FILTER_DEFAULT);
$readOperador = new Database;
$readOperador->connect();
$readOperador->select('usersEquip', '*', NULL, "matricula = '{$matricula}'");
$result = $readOperador->getResult();
switch ($result[0]["statusUser"]):
    case NULL :
        echo "<div class=\"col-lg-12\" id=\"load_buscaOperador\" >
    <label class=\"fa\"><h3>Mensagem</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"nome\"
           value=\"Não encontrado\"
           disabled=\"true\"
           />
</div>";
        break;
    case 0:
        echo "<div class=\"col-lg-12\" id=\"load_buscaOperador\" >
    <label class=\"fa\"><h3>Mensagem</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"nome\"
           value=\"Usuário Bloqueado\"
           disabled=\"true\"
           />
</div>";
        break;
    case 1:
        echo "<div class=\"col-lg-12\" id=\"load_buscaOperador\" >
    <label class=\"fa\"><h3>Nome</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"nome\"
           value=\"{$result[0]["nome"]}\"
           disabled=\"true\"
           />
</div>";
        break;
endswitch;
$readOperador->disconnect();
?>

