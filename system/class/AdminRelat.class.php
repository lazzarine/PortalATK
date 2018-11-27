<?php

/**
 * Description of AdminRelat
 *
 * @author upadova
 */
class AdminRelat {
    
    private $User;
    private $Result;
    private $Error;
    private $Data;

    const Entity = "relatorios_save";

    public function CreateRelat(array $Data) {
        $this->Data = $Data;
        $this->Create();
    }
    
    public function UpdateRelat($ID, array $Data){
        $this->User = (int) $ID;
        $this->Data = (array) $Data;
        if($ID && $Data):
            $this->Update();
        endif;
    }
    
    public function DeleteRelat($ID){
        $this->User = (int) $ID;
        if($ID):
            $this->Delete();
        endif;
    }

    public function getResult(){
        return $this->Result;
    }
    
    public function getError(){
        return $this->Error;
    }

    private function Create() {
        $create = new Database();
        $create->connect();
        if ($create->insert(self::Entity, $this->Data)):
            $this->Result = TRUE;
            $this->Error = "Relatório cadastrado com sucesso !!!";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao cadastrar relatório.";
        endif;
        $create->disconnect();
    }
    
    private function Update(){
        $update = new Database;
        $update->connect();
        if($update->update(self::Entity, $this->Data, "id_r = {$this->User}")):
            $this->Result = TRUE;
            $this->Error = "Relatório atualizado com sucesso !!!";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao atualizar o relatório.";
        endif;
        $update->disconnect();
    }
    
    private function Delete(){
        $Delete = new Database;
        $Delete->connect();
        if($Delete->delete(self::Entity,"id_r = {$this->User}")):
            $this->Result = TRUE;
            $this->Error = "Relatório excluido com sucesso !!!";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao excluir o relatório.";
        endif;
            
    }

}
