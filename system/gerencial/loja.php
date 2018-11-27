<?php
$dia = date("d") - 1;
if ($dia == 0):
    $mes = date("m") - 1;
    $ano = date("Y");
    $dia = date("t", mktime(0, 0, 0, $mes, '01', $ano));
    $dir = "./arquivos/relatorios/$dia/csv/srt50.csv";
else:
    $dir = "./arquivos/relatorios/$dia/csv/srt50.csv";
endif;

if (!file_exists($dir)):
    die(Mensagem("Arquivo não encontrado !", ERROR));
endif;
?>
<?php
$handle = fopen($dir, "r");
$i = 0;
while (($data = fgetcsv($handle, 0, ";")) !== FALSE) {
    if(isset($data[2]) and $data[2] > 0):
        echo $data[3];
    endif;
    $i ++;
}
fclose($handle);


