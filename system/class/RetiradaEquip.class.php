<?php

/**
 * Description of RetiradaEquip
 *
 * @author upadova
 */
class RetiradaEquip extends Database {

    private $Serie;
    private $Matricula;
    private $User;
    private $Equip;
    private $Error;
    private $Res;
    private $Data;

    public function setSerie($Serie) {
        $this->Serie = $Serie;
    }

    public function setMatricula($Matricula) {
        $this->Matricula = $Matricula;
    }

    public function getError() {
        return $this->Error;
    }

    public function getRes() {
        return $this->Res;
    }

    public function ConsultarUser() {
        $this->connect();
        $this->select('usersEquip', 'nome,matricula,setor,funcao', NULL, "matricula = '{$this->Matricula}' AND statusUser != '0'");
        if ($this->numRows() > 0):
            $this->User = $this->getResult();
            $this->Res = true;
        else:
            $this->Res = false;
            $this->Error = "Usuário Bloqueado";
        endif;
        $this->disconnect();
    }

    public function ConsultarEquip() {
        $this->connect();
        $this->select('equipamentos', 'numSerie, numEquip, tpEquip', NULL, "numSerie = '{$this->Serie}' AND statusEquip = 'OK'");       
        if ($this->numRows() > 0):
            $this->Equip = $this->getResult();
            $this->Res = true;
        else:
            $this->Res = false;
            $this->Error = "Equipamento não pode ser utilizado!";
        endif;
        $this->disconnect();
    }

    public function Vincular() {

        $this->connect();
        $this->select('retiradaEquip', '*', NULL, "matricula = {$this->Matricula} OR numSerie = '{$this->Serie}'");
        $r = $this->getResult();
        if ($this->numRows() > 0):
            $this->Error = "Equipamento {$r[0]["tpEquip"]} nº {$r[0]["numEquip"]} está vinculado ao colaborador {$r[0]["nome"]}.";
            return FALSE;
        else:
            $this->setData();
            if ($this->insert('retiradaEquip', $this->Data)):
                $this->Error = "Equipamento {$this->Data["tpEquip"]} nº {$this->Data["numEquip"]} está vinculado ao colaborador {$this->Data["nome"]}.";
                return TRUE;
            else:
                $this->Error = "Equipamento {$this->Data["tpEquip"]} nº {$this->Data["numEquip"]} está vinculado ao colaborador {$this->Data["nome"]}.";
                return FALSE;
            endif;
        endif;
        $this->disconnect();
    }

    private function setData() {

        $this->Data = array_merge($this->User[0], $this->Equip[0]);
        $data = array("dtRetirada" => date("d/m/Y"));
        $this->Data = array_merge($this->Data, $data);
        $hora = array("hrRetirada" => date("H:i:s"));
        $this->Data = array_merge($this->Data, $hora);
        //var_dump($this->Data);
    }

}
