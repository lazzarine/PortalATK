<?php

/**
 * Description of devEquipamento
 *
 * @author upadova
 */
class devEquipamento extends Database {

    private $Serie;
    private $User;
    private $Obs;
    private $Error;
    private $Res;
    private $Data;

    public function getError() {
        return $this->Error;
    }

    public function getRes() {
        return $this->Res;
    }
    
    public function getData() {
        return $this->Data;
    }

    function setSerie($Serie) {
        $this->Serie = $Serie;
    }

    function setUser($User) {
        $this->User = $User;
    }

    function setObs($Obs) {
        $this->Obs = $Obs;
    }

    public function Devolucao() {
        if ($this->DevUpdate()):
            $this->Res = true;
            $this->Error = "Equipamento devovido com sucesso!";
        else:
            $this->Res = false;
            $this->Error = "Erro ao inserir os dados !";
        endif;
    }

    private function setData() {
        $temp = array("dtEntrega" => date("d/m/Y"),
            "hrEntrega" => date("H:i:s"),
            "userRcb" => $this->User,
            "obs" => $this->Obs
        );
        $this->Data = array_merge($this->Data, $temp);
    }

    private function Inserir() {
        $this->connect();
        if ($this->insert('histEquip', $this->Data)):
            return TRUE;
        else:
            return FALSE;
        endif;
        $this->disconnect();
    }

    private function Deletar() {
        $this->connect();
        if ($this->delete('retiradaEquip', "id = {$this->Data["id"]}")):
            return TRUE;
        else:
            return FALSE;
        endif;
        $this->disconnect();
    }

    private function DevUpdate() {
        $this->connect();
        $this->select('retiradaEquip', '*', NULL, "numSerie = '{$this->Serie}'");
        if ($this->numRows() > 0):
            $r = $this->getResult();
            $this->Data = $r[0];
            $this->setData();
            if ($this->Inserir()):
                $this->Deletar();
                return TRUE;
            endif;
        else:
            return FALSE;
        endif;
        $this->disconnect();
    }

}
