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
    //private $Responsavel;
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
    private $Relat_r;
    private $Relat_dev;
    private $Relat_total = array();

    public function setDadosRt($Array) {
        if (strlen($Array["matricula"]) >= 5):
            $this->Matricula = (int) substr($Array["matricula"], 5);
            var_dump(strlen($Array["matricula"]));
        else:
            $this->Matricula = (int) $Array["matricula"];
        endif;
        $this->QtdRetirada = (int) $Array["qtd_retirada"];
        $this->TpSacola = $Array["tp_sacola"];
        $this->VerificaUser();
    }

    public function setDadosDv($Array) {
        if (strlen($Array["matricula"]) >= 5):
            $this->Matricula = (int) substr($Array["matricula"], 5);
        else:
            $this->Matricula = (int) $Array["matricula"];
        endif;
        $this->QtdDev = (int) $Array["qtd_devolvida"];
        $this->TpSacola = $Array["tp_sacola"];
        $this->Motivo = $Array["motivo"];
        $this->VerificaUser();
    }

    /**
     * Metódo para setar a data,
     * formata para yyyy-mm-dd
     * @param Date $data dd/mm/yyyy
     * @return Date $data yyyy-mm-dd
     */
    public function setData($data) {
        $data = str_replace('/', '-', $data);
        $data = date('Y-m-d', strtotime($data));
        return $data;
    }

    public function ExeRetirada() {
        $data = date("Y-m-d");
        $inserir = new Database();
        $inserir->connect();
        if ($this->getQTD()):
            $id = $this->getQTD()["idretirada"];
            $qtd = $this->getQTD()["qtd_retirada"];

            $this->Array = array("qtd_retirada" => $this->QtdRetirada += $qtd);

            if ($inserir->update('retirada', $this->Array, "idretirada = {$id}") == TRUE):
                $this->Result = TRUE;
                $this->Error = "Dados gravado com sucesso.";
            else:
                $this->Result = FALSE;
                $this->Error = "Erro ao gravar dados.";
            endif;

        else:
            $this->Array = array(
                "matricula" => $this->Matricula,
                "nome" => $this->Nome,
                "qtd_retirada" => $this->QtdRetirada,
                "tp_sacola" => $this->TpSacola,
                "data_ret" => $data
            );
            if ($inserir->insert('retirada', $this->Array) == TRUE):
                $this->InsertDev();
                $this->Result = TRUE;
                $this->Error = "Dados gravado com sucesso.";
            else:
                $this->Result = FALSE;
                $this->Error = "Erro ao gravar dados.";
            endif;
        endif;
        $inserir->disconnect();
    }

    public function ExeDevolucao() {
        $this->Devolucao();
    }

    public function TotalAvari($dtInicio, $dtFinal) {
        $dtInicio = $this->setData($dtInicio);
        $dtFinal = $this->setData($dtFinal);
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

    public function TotalReti($dtInicio, $dtFinal) {
        $dtInicio = $this->setData($dtInicio);
        $dtFinal = $this->setData($dtFinal);
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

    public function RelatRet($dtInicial, $dtFinal) {
        $read = new Database();
        $read->connect();
        $read->select('retirada', '*', NULL, "data_ret between '$dtInicial' and '$dtFinal'");
        $this->Relat_r = $read->getResult();
        $read->disconnect();
    }

    public function RelatDev($dtInicial, $dtFinal) {
        $read = new Database();
        $read->connect();
        $read->select('dev_sacola', '*', NULL, "dev_data between '$dtInicial' and '$dtFinal'");
        $this->Relat_dev = $read->getResult();
        $read->disconnect();
    }

    public function GeraRelatorio($dtInicial, $dtFinal) {
        $dtInicial = $this->setData($dtInicial);
        $dtFinal = $this->setData($dtFinal);
        $this->RelatRet($dtInicial, $dtFinal);
        $this->RelatDev($dtInicial, $dtFinal);
        $ret = $this->getRelat_r();
        $dev = $this->getRelat_dev();
        for ($i = 0; $i < count($ret); $i++):
            $d = 0;
            $a = 0;
            for ($x = 0; $x < count($dev); $x++):
                if ($ret[$i]["matricula"] == $dev[$x]["matricula"] and $ret[$i]["data_ret"] == $dev[$x]["dev_data"] and $ret[$i]["tp_sacola"] == $dev[$x]["tp_sacola"]):
                    switch ($dev[$x]["motivo"]):
                        case "Devolução":
                            $d += $dev[$x]["qtd_devolvida"];
                            break;
                        case "Avariada":
                            $a += $dev[$x]["qtd_devolvida"];
                            break;
                    endswitch;
                endif;
            endfor;
            $ar = array("matricula" => $ret[$i]["matricula"],
                "nome" => $ret[$i]["nome"],
                "tp_sacola" => $ret[$i]["tp_sacola"],
                "qtd_retirada" => $ret[$i]["qtd_retirada"],
                "qtd_devolvida" => $d,
                "qtd_avariada" => $a,
                "Vendidas" => $ret[$i]["qtd_retirada"] - ($a + $d),
                "data" => $ret[$i]["data_ret"]);
            $this->Relat_total[$i] = $ar;
        endfor;
    }
    
    public function getRelat_total() {
        return $this->Relat_total;
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

    public function getRelat_r() {
        return $this->Relat_r;
    }

    public function getRelat_dev() {
        return $this->Relat_dev;
    }

    /*
     * *****************************
     * ** Metodos Privados *********
     * *****************************
     */

    private function getQTD() {
        $data = date("Y-m-d");
        $read = new Database();
        $read->connect();
        $read->select('retirada', 'idretirada, qtd_retirada', NULL, "matricula = {$this->Matricula} and tp_sacola = '{$this->TpSacola}' and data_ret = '$data'");
        if ($read->numRows() > 0):
            return $read->getResult()[0];
        else:
            return false;
        endif;
        $read->disconnect();
    }

    private function Devolucao() {
        $data = date("Y-m-d");
        $read = new Database();
        $read->connect();
        $read->select('dev_sacola', 'idSacola, SUM(qtd_devolvida)', NULL, "matricula = {$this->Matricula} and tp_sacola = '{$this->TpSacola}' and dev_data = '$data'");
        $r = (int) $read->getResult()[0]["SUM(qtd_devolvida)"];
        $r += $this->QtdDev;
        $qtdRet = (int) $this->getQTD()["qtd_retirada"];
        if ($qtdRet >= $r and $this->QtdDev > 0):
            $read->select('dev_sacola', 'idSacola, qtd_devolvida', NULL, "matricula = {$this->Matricula} and (motivo = '{$this->Motivo}' or motivo = '*') and tp_sacola = '{$this->TpSacola}' and dev_data = '$data'");
            if ($read->numRows() > 0):
                $this->UpdateDev($read->getResult());
            else:
                $this->InsertDev();
            endif;
        else:
            $this->Result = FALSE;
            $this->Error = "Dados invalidos, verifique!";
        endif;
        $read->disconnect();
    }

    private function UpdateDev($update) {
        $inserir = new Database();
        $inserir->connect();
        if ($update):
            $id = (int) $update[0]["idSacola"];
            $qtd = (int) $update[0]["qtd_devolvida"];
            $this->Array = array("qtd_devolvida" => $this->QtdDev += $qtd, "motivo" => $this->Motivo);
            if ($inserir->update('dev_sacola', $this->Array, "idSacola = {$id}") == TRUE):
                $this->Result = TRUE;
                $this->Error = "Devolução atualizada";
            else:
                $this->Result = FALSE;
                $this->Error = "Erro ao atualizar a devolução";
            endif;
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao atualizar a devolução";
        endif;
        $inserir->disconnect();
    }

    private function InsertDev() {
        $inserir = new Database();
        $inserir->connect();
        $this->Array = array(
            "matricula" => $this->Matricula,
            "nome" => $this->Nome,
            "qtd_devolvida" => $this->QtdDev,
            "motivo" => $this->Motivo,
            "tp_sacola" => $this->TpSacola,
            "dev_data" => date("Y-m-d")
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

}
