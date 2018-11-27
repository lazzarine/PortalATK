<?php
session_start();

function __autoload($class) {
    require_once ("../class/" . $class . ".class.php");
}

include '../html2pdf/html2pdf.class.php';
$session = new session;
$userlogin = $session->getSession();
if (!$session->checkAcesso(1)):
    header('Location: ../../index.php?logoff=true');
endif;

    ob_start();
    include('cod.php');
    $conteudo = ob_get_clean();
try {
    $html2pdf = new HTML2PDF('P', 'A4', 'pt', true, 'UTF-8');
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->setDefaultFont('Arial');
    # Passamos o html que queremos converte.
    $html2pdf->writeHTML($conteudo);
    /* Exibe o PDF:
     * 1º parâmetro: Nome do arquivo PDF. O nome que você quer dar ao pdf gerado. 
     * 2º parâmetro: Tipo de saída: 
      I: Abre o PDF gerado no navegador.
      D: Abre a janela para você realizar o download do PDF.
      F: Salva o PDF em alguma pasta do servidor. */
    $html2pdf->Output('equip.pdf', 'I');
} catch (HTML2PDF_exception $e) {
    echo $e;
    exit;
}
//ob_clean();



