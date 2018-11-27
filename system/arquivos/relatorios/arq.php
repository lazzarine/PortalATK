<?php
//ob_start();
session_start();

function __autoload($class) {
    require_once ("../../class/" . $class . ".class.php");
}

$session = new session;
$userlogin = $session->getSession();
if (!$session->checkAcesso(1)):
    header('Location: ../../../index.php?logoff=true');
endif;


$data = filter_input(INPUT_GET, 'data', FILTER_VALIDATE_INT);
$nomeArq = base64_decode(filter_input(INPUT_GET, 'nomeArq', FILTER_DEFAULT));
$html = new ArquivoHtmlPdf($nomeArq, $data, $userlogin[0]['login'], $userlogin[0]['setor']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale-1" />        
        <link rel="stylesheet" href="../../assets/css/custom.css" />      
        <title><?= $html->getNomeArq() ?></title>
    </head>
    <body class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="margin-left: 10px;">
                <?php
                if ($html->getResult() == TRUE):
                    echo "<pre style=\"margin-top: 10px; \"font-size:{$html->getTamFonte()};\">{$html->getHtml()}</pre>";
                else:
                    echo "<pre style=\"margin-top: 200px; margin-left: 230px;\">{$html->getError()}</pre>";
                endif;
                ?>
            </div>
        </div>
    </body>
</html>
