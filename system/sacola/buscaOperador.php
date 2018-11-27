<?php

require('../class/Database.class.php');

$matricula = filter_input(INPUT_GET, 'matricula', FILTER_DEFAULT);
if (strlen($matricula) >= 5):
    $matricula = substr($matricula, 5);
endif;
$readOperador = new Database;
$readOperador->connect();
$readOperador->select('operador', '*', NULL, "matricula = '{$matricula}'");
$result = $readOperador->getResult();
if ($result):

    echo "<div class=\"col-lg-12\" id=\"load_buscaOperador\" >
    <label class=\"fa\"><h3>Nome</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"nome\"
           value=\"{$result[0]["nome_operador"]}\"
           disabled=\"true\"
           />
</div>";

else:
    echo "<div class=\"col-lg-12\" id=\"load_buscaOperador\" >
    <label class=\"fa\"><h3>Nome</h3></label>
    <input 
           class=\"form-control altinho fa-2x\"
           type =\"text\" name=\"nome\"
           value=\"Erro !!!\"
           disabled=\"true\"
           />
</div>";
endif;
$readOperador->disconnect();
?>

