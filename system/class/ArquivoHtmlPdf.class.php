<?php

/**
 * Description of ArquivoHtmlPdf
 *
 * @author upadova
 */
class ArquivoHtmlPdf {

    private $NomeArq;    // Nome Do Atquivo
    private $Dia;      //   Dia da Arquivo gerado
    private $User;
    private $Setor;
    private $Html;    //    Retorna arquivo em html
    private $Error;  //     Retorna Mensagem 
    private $Result; //      Retorna TRUE ou FALSE
    private $QuebraPag;
    private $TamFonte;
    private $Orientacao;

    public function __construct($NomeArq, $Dia, $user = NULL, $setor = NULL) {
        $this->NomeArq = (String) $NomeArq;
        $this->Dia = (int) $Dia;
        $this->User = (String) $user;
        $this->Setor = (String) $setor;
        $this->GeraTxtHtml();
    }

    public function getHtml() {
        return $this->Html;
    }

    public function getError() {
        return $this->Error;
    }

    public function getResult() {
        return $this->Result;
    }
    public function getNomeArq() {
        return $this->NomeArq;
    }

    private function GeraTxtHtml() {
        $this->setAjustaPag();
        $page = (int) 0;
        if ($arquivo = fopen("./{$this->Dia}/{$this->NomeArq}", "r")):
            $this->Html = "Usuário.: {$this->User} Setor.: {$this->Setor}<br/>"
                    . "Cause uma boa impressão, imprima somente o necessário !!!<hr/>";
            while (!feof($arquivo)):
                $linha = fgets($arquivo);
                if (strpos($linha, $this->QuebraPag)):
                    $page += 1;
                    if ($page != 1):
                        $this->Html .= "<br/><page>Usuário.: {$this->User} Setor.: {$this->Setor}<br/></page>"
                                . "Cause uma boa impressão, imprima somente o necessário !!!<hr/>";
                    endif;
                endif;
                $this->Html .= $linha;
            endwhile;
            $this->Result = TRUE;
        elseif ($this->Html == NULL):
            $this->Error = "Não foi possivel abrir o arquivo !";
            $this->Result = FALSE;
        endif;
    }

    private function setAjustaPag() {
        $read = new Database;
        $read->connect();
        $read->select('relatorios_save', '*', NULL, "nome_r = '{$this->NomeArq}'");
        $value = $read->getResult();
        if ($value[0]['paginacao'] == NULL):
            $this->QuebraPag = NULL;
        else:
            $this->QuebraPag = $value[0]['paginacao'];
        endif;
        if ($value[0]['tamfonte'] == NULL):
            $this->TamFonte = "7pt";
        else:
            $this->TamFonte = $value[0]['tamfonte'];
        endif;

        if ($value[0]['orientacao'] == NULL):
            $this->Orientacao = "L";
        else:
            $this->Orientacao = $value[0]['orientacao'];
        endif;

        $read->disconnect();
    }

    public function getTamFonte() {
        return $this->TamFonte;
    }

    public function getOrientacao() {
        return $this->Orientacao;
    }

}
