<?php
session_start();

function __autoload($class) {
    require_once ("../../class/" . $class . ".class.php");
}

include '../../html2pdf/html2pdf.class.php';
$session = new session;
$userlogin = $session->getSession();
if (!$session->checkAcesso(1)):
    header('Location: ../../../index.php?logoff=true');
endif;

set_time_limit(240);

$data = filter_input(INPUT_GET, 'data', FILTER_VALIDATE_INT);
$nomeArq = base64_decode(filter_input(INPUT_GET, 'nomeArq', FILTER_DEFAULT));
$html = new ArquivoHtmlPdf($nomeArq, $data, $userlogin[0]['login'], $userlogin[0]['setor']);
$conteudo = "
             <pre style=\"font-size:{$html->getTamFonte()}\"; "
             . "font-family:\"verdana\"; font-family:\"sans-serif\"; margin-top: 10px;\">{$html->getHtml()}
             </pre>
            ";
try {

    $html2pdf = new HTML2PDF($html->getOrientacao(), 'A4', 'pt', true, 'UTF-8', 1);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($conteudo);
    /* Exibe o PDF:
     * 1º parâmetro: Nome do arquivo PDF. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
      I: Abre o PDF gerado no navegador.
      D: Abre a janela para você realizar o download do PDF.
      F: Salva o PDF em alguma pasta do servidor. */
    $html2pdf->Output("$nomeArq.pdf", 'I');
} catch (HTML2PDF_exception $e) {
    echo $e;
}
//ob_clean();
?>
