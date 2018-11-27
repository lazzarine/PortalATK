<?php

/**
 * Description of sacola
 *
 * @author upadova
 */
class Sacola {

    private $Matricula;
    private $Nome;
    private $QtdRetirada;
    private $QtdDev;
    private $Motivo;
    private $Responsavel;
    private $TpSacola;
    private $Result;
    private $Error;
    private $Array;
    private $Total = 0;
    private $TotalAva = 0;
    private $TotalDev = 0;
    private $VerdeDev = 0;
    private $VerdeAva = 0;
    private $CinzaDev = 0;
    private $CinzaAva = 0;
    private $BrancaDev = 0;
    private $BrancaAva = 0;
    private $TotalRet = 0;
    private $Verde = 0;
    private $Branca = 0;
    private $Cinza = 0;

    public function setDadosRt($Array) {
        if(strlen($Array["matricula"]) >= 5):
            $this->Matricula = (int) substr($Array["matricula"], 5);
            var_dump(strlen($Array["matricula"]));
        else:
            $this->Matricula = (int) $Array["matricula"];
        endif;
        $this->QtdRetirada = (int) $Array["qtd_retirada"];
        $this->Responsavel = $Array["responsavel"];
        $this->TpSacola = $Array["tp_sacola"];
        $this->VerificaUser();
    }

    public function setDadosDv($Array) {
        if(strlen($Array["matricula"]) >= 5):
            $this->Matricula = (int) substr($Array["matricula"], 5);
        else:
            $this->Matricula = (int) $Array["matricula"];
        endif;
        $this->QtdDev = (int) $Array["qtd_devolvida"];
        $this->TpSacola = $Array["tp_sacola"];
        $this->Motivo = $Array["motivo"];
        $this->VerificaUser();
    }

    public function ExeRetirada() {
        $inserir = new Database();
        $inserir->connect();
        $this->Array = array(
            "matricula" => $this->Matricula,
            "nome" => $this->Nome,
            "qtd_retirada" => $this->QtdRetirada,
            "responsavel" => $this->Responsavel,
            "tp_sacola" => $this->TpSacola,
            "data_ret" => date("d/m/Y")
        );
        if ($inserir->insert('retirada', $this->Array) == TRUE):
            $this->Result = TRUE;
            $this->Error = "Dados gravado com sucesso.";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao gravar dados.";
        endif;
        $inserir->disconnect();
    }

    public function ExeDevolucao() {
        $inserir = new Database();
        $inserir->connect();
        $this->Array = array(
            "matricula" => $this->Matricula,
            "nome" => $this->Nome,
            "qtd_devolvida" => $this->QtdDev,
            "motivo" => $this->Motivo,
            "tp_sacola" => $this->TpSacola,
            "dev_data" => date("d/m/Y")
        );
        if ($inserir->insert('dev_sacola', $this->Array) == TRUE):
            $this->Result = TRUE;
            $this->Error = "Dados gravado com sucesso.";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao gravar dados.";
        endif;
        $inserir->disconnect();
    }

    public function TotalAvari($dtInicio,$dtFinal) {
        $read = new Database;
        $read->connect();
        $read->select('dev_sacola', 'qtd_devolvida,motivo,tp_sacola', NULL, "dev_data between '$dtInicio' and '$dtFinal'");

        foreach ($read->getResult() as $resDev):
            extract($resDev);
            $this->Total += (int) $qtd_devolvida;
            if ($tp_sacola == "Verde" and $motivo == "Devolução"):
                $this->VerdeDev += $qtd_devolvida;
                $this->TotalDev += $qtd_devolvida;
            elseif ($tp_sacola == "Verde" and $motivo == "Avariada"):
                $this->VerdeAva += $qtd_devolvida;
                $this->TotalAva += $qtd_devolvida;
            elseif ($tp_sacola == "Cinza" and $motivo == "Devolução"):
                $this->CinzaDev += $qtd_devolvida;
                $this->TotalDev += $qtd_devolvida;
            elseif ($tp_sacola == "Cinza" and $motivo == "Avariada"):
                $this->CinzaAva += $qtd_devolvida;
                $this->TotalAva += $qtd_devolvida;
            elseif ($tp_sacola == "Branca" and $motivo == "Devolução"):
                $this->BrancaDev += $qtd_devolvida;
                $this->TotalDev += $qtd_devolvida;
            elseif ($tp_sacola == "Branca" and $motivo == "Avariada"):
                $this->BrancaAva += $qtd_devolvida;
                $this->TotalAva += $qtd_devolvida;
            endif;
        endforeach;
        $read->disconnect();
    }

    public function TotalReti($dtInicio,$dtFinal) {
        $read = new Database;
        $read->connect();
        $read->select('retirada', '*', NULL, "data_ret between '$dtInicio' and '$dtFinal'");
        foreach ($read->getResult() as $resRet):
            extract($resRet);
            $this->TotalRet += (int) $qtd_retirada;
            switch ($tp_sacola):
                case "Verde":
                    $this->Verde += $qtd_retirada;
                    break;
                case "Cinza":
                    $this->Cinza += $qtd_retirada;
                    break;
                case "Branca":
                    $this->Branca += $qtd_retirada;
                    break;
            endswitch;
        endforeach;
    }

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }
    
    public function getQtdRetirada() {
        return $this->QtdRetirada;
    }

    public function getQtdDev() {
        return $this->QtdDev;
    }

    public function getTotal() {
        return $this->Total;
    }

    public function getTotalAva() {
        return $this->TotalAva;
    }

    public function getTotalDev() {
        return $this->TotalDev;
    }

    public function getVerdeDev() {
        return $this->VerdeDev;
    }

    public function getVerdeAva() {
        return $this->VerdeAva;
    }

    public function getCinzaDev() {
        return $this->CinzaDev;
    }

    public function getCinzaAva() {
        return $this->CinzaAva;
    }

    public function getBrancaDev() {
        return $this->BrancaDev;
    }

    public function getBrancaAva() {
        return $this->BrancaAva;
    }

    public function getTotalRet() {
        return $this->TotalRet;
    }

    public function getVerde() {
        return $this->Verde;
    }

    public function getBranca() {
        return $this->Branca;
    }

    public function getCinza() {
        return $this->Cinza;
    }

    
    /*
     * *****************************
     * ** Metodos Privados *********
     * *****************************
     */

    private function VerificaUser() {
        $ReadOpe = new Database();
        $ReadOpe->connect();
        $ReadOpe->select('operador', '*', NULL, "matricula = {$this->Matricula}");
        if ($ReadOpe->numRows() >= 1):
            $nome = $ReadOpe->getResult();
            $this->Nome = $nome[0]["nome_operador"];
            $this->Result = TRUE;
        else:
            $this->Result = FALSE;
            $this->Error = "Operador não existe.";
        endif;
        $ReadOpe->disconnect();
    }

    private function VerificaData() {
        $this->Date = date("d/m/Y");
        $ReadDate = new Database;
        $ReadDate->connect();
        $ReadDate->select('retirada', '*', NULL, "data = '{$this->Date}'");
        if ($ReadDate->numRows() >= 1):
            $result = $ReadDate->getResult();
            $this->Qtd = (int) $result[0]["qtd_retirada"];
            return TRUE;
        else:
            return FALSE;
        endif;
        $ReadDate->disconnect();
    }

}
