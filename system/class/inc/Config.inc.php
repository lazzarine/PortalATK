<?php

try {

    function __autoload($Class) {
        $dirName = 'class';
        if (file_exists("{$dirName}/{$Class}.class.php")):
            require_once("{$dirName}/{$Class}.class.php");
        else:
            die("Classe não encontrada: '{$dirName}/{$Class}.class.php' <hr>");
        endif;
    }

} catch (Exception $e) {
    echo $e->getMessage();
}


// TRATAMENTO DE ERROS #####################
//CSS constantes :: Mensagens de Erro
define('ACCEPT', 'success'); //verde
define('INFOR', 'info'); //azul
define('ALERT', 'warning'); //amarelo
define('ERROR', 'danger'); //vermelho
//Mensagem :: Exibe erros lançados :: Front
function Mensagem($ErrMsg, $ErrNo, $ErrDie = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? INFOR : ($ErrNo == E_USER_WARNING ? ALERT : ($ErrNo == E_USER_ERROR ? ERROR : $ErrNo)));
    echo "<div id=\"dialog\" title=\"Menssagem\"><p class=\"alert alert-{$CssClass}\">{$ErrMsg}</p></div>";
    if ($ErrDie):
        die;
    endif;
}

function MsgAudio($Audio = FALSE) {
    if ($Audio):
        echo "<audio src=\"./assets/audio/Acerto.mp3\" autoplay></audio>";
    else:
        echo "<audio src=\"./assets/audio/erro.mp3\" autoplay></audio>";
    endif;
}

//PHPErro :: personaliza o gatilho do PHP
function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? INFOR : ($ErrNo == E_USER_WARNING ? ALERT : ($ErrNo == E_USER_ERROR ? ERROR : $ErrNo)));
    echo "<p class=\"label label-{$CssClass}\">";
    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "</p>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');

//seta data para BR
setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
date_default_timezone_set('America/Sao_Paulo');

