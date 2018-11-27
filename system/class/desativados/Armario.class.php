<?php

/**
 * Description of armario
 *
 * @author upadova
 */
class Armario {

    private $Id;
    private $mat;
    private $Nome;
    private $Setor;
    private $Funcao;
    private $TpArmario;
    private $NArmario;
    private $Status;
    private $DtEntrega;
    private $Result;
    private $Error;
    private $Data;

    const tabela = "vinculo_armario";

    public function ExeCreate($data) {

        $this->setBanco($data);
        $this->Create();
    }

    public function ExeDevolucao($id) {
        $this->Id = (int) $id;
        if ($this->Id):
            $this->Devolucao();
        endif;
    }

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    private function setBanco($data) {
        $this->Id = (int) $data['id_vinculo'];
        $this->mat = (int) $data['matricula'];
        $this->TpArmario = (String) $data['tipo_armario'];
        $this->NArmario = (int) $data['n_armario'];
        if ($this->Id):
            $this->Nome = (String) $data['nome'];
            $this->Setor = (String) $data['setor'];
            $this->Funcao = (String) $data['funcao'];
            $this->Status = (String) $data['status'];
            ;
            $this->DtEntrega = $data['dt_entrega'];
            $this->Data = array(
                "id_vinculo" => $this->Id,
                "matricula" => $this->mat,
                "nome" => $this->Nome,
                "setor" => $this->Setor,
                "funcao" => $this->Funcao,
                "tipo_armario" => $this->TpArmario,
                "n_armario" => $this->NArmario,
                "dt_entrega" => $this->DtEntrega
            );
        else:
            $this->Nome = (String) utf8_decode($data['nome']);
            $this->Setor = (String) utf8_decode($data['setor']);
            $this->Funcao = (String) utf8_decode($data['funcao']);
            $this->Status = "Ocupado";
            $this->Data = array(
                "matricula" => $this->mat,
                "nome" => $this->Nome,
                "setor" => $this->Setor,
                "funcao" => $this->Funcao,
                "tipo_armario" => $this->TpArmario,
                "n_armario" => $this->NArmario,
                "status" => $this->Status,
                "dt_entrega" => date("d/m/Y")
            );
        endif;
    }

    private function Create() {
        $create = new Database;
        $create->connect();
        $update = $create;
        if ($create->insert(self::tabela, $this->Data)):
            $update->update(self::tabela, $this->Data);
            $data = array("status" => $this->Status);
            $update->update('armario', $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
            $this->Result = TRUE;
            $this->Error = "Armario vinculado com sucesso !";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao vincular armario.";
        endif;
        $create->disconnect();
    }

    public function update($tipo = NULL, $n_armario = NULL, $status = NULL) {
        $this->NArmario = (int) $n_armario;
        $this->TpArmario = $tipo;
        $this->Status = $status;
        $data = array("status" => $this->Status);

        $read = new Database;
        $read->connect();
        $update = $read;
        $read->select('vinculo_armario', '*', NULL, "tipo_armario = '{$this->TpArmario}' AND n_armario = {$this->NArmario}");
        if ($read->numRows() > 0):
            $result = $read->getResult();
            if ($result[0]["status"] == "Ocupado" && $this->Status == "Quebrado"):
                $update->update(self::tabela, $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
                $update->update('armario', $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
                $this->Result = TRUE;
                $this->Error = "Status atualizado com sucesso !";
            elseif ($result[0]["status"] == "Quebrado" && $this->Status == "Ocupado"):
                $update->update(self::tabela, $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
                $update->update('armario', $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
                $this->Result = TRUE;
                $this->Error = "Status atualizado com sucesso !";
            else:
                $this->Result = FALSE;
                $this->Error = "Esse armario está vinculado, status possiveis [Quebrado ou Ocupado]";
            endif;
        else:
            if ($this->Status == "Quebrado" || $this->Status == "Livre"):
                $update->update('armario', $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
                $this->Result = TRUE;
                $this->Error = "Status atualizado com sucesso !";
            else:
                $this->Result = FALSE;
                $this->Error = "Esse armario está vinculado, status possiveis [Quebrado ou Livre]";
            endif;

        endif;
    }

    public function updateUser($id, $data) {
        $this->Id = (int) $id;
        $this->Nome = (String) utf8_decode($data['nome']);
        $this->Setor = (String) utf8_decode($data['setor']);
        $this->Funcao = (String) utf8_decode($data['funcao']);
        $this->Data = array("nome" => $this->Nome, "setor" => $this->Setor, "funcao" => $this->Setor);
        $update = new Database;
        $update->connect();
        if($update->update(self::tabela, $this->Data, "id_vinculo = {$this->Id}")):
            $this->Result = TRUE;
            $this->Error = "Usuário atualizado com sucesso !";
            else:
            $this->Result = FALSE;
            $this->Error = "Erro ao atualizar o usuário.";
        endif;
            
        $update->disconnect();
    }

    private function Delete() {
        $delete = new Database;
        $delete->connect();
        $delete->delete('vinculo_armario', "id_vinculo = {$this->Id}");
        $delete->disconnect();
    }

    private function Devolucao() {
        $read = new Database;
        $read->connect();
        $read->select(self::tabela, '*', NULL, "id_vinculo = {$this->Id}");
        foreach ($read->getResult() as $result)
            ;
        $this->setBanco($result);
        $dt_devolucao = array("dt_devolucao" => date("d/m/Y"));
        $this->Data = array_merge($this->Data, $dt_devolucao);
        $this->Status = $result['status'];
        $create = $read;
        $update = $read;
        if ($create->insert("hist_armario", $this->Data)):
            $this->Result = TRUE;
            $this->Error = "Devolução do armario com sucesso !";
            var_dump($this->Status);
            if ($this->Status == "Ocupado"):
                $data = array("status" => "Livre");
                $update->update('armario', $data, " n_armario = {$this->NArmario} AND tipo_armario = '{$this->TpArmario}'");
            endif;
            $this->Delete();
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao devolver o armario.";
        endif;
        $read->disconnect();
    }

}
