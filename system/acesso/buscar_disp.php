<?php
require('../class/Database.class.php');

$IdAcesso = $_GET['acesso'];
$readAcesso = new Database;
$readAcesso->connect();
$readAcesso->selectDst('acess', 'acesso, link', NULL, "modulo = '{$IdAcesso}'");
?>

<select class="form-control" id="load_acesso" name="acesso" title="Selecione um acesso">
    <option value="">Selecione um acesso</option>
    <?php
    foreach ($readAcesso->getResult() as $readAcesso_result):
        extract($readAcesso_result);
        ?>
        <option value="<?php echo $acesso. ";" .$link ?>"><?php echo $acesso ?></option>
        <?php
    endforeach;
    $readAcesso->disconnect();
    ?>
</select>