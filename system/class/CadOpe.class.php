<?php

/**
 * CadOpe.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os usuários no Admin do sistema!
 * 
 * @copyright (c) 2017, Uelinton Padova
 */

class CadOpe {
    private $Data;
    private $Error;
    private $Result;
    
    //Nome da tabela no banco de dados
    const Entity = 'operador';
    
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->Create();
    }
    
    /**
     * <b>Atualizar Usuário:</b> Envelope os dados em uma array atribuitivo e informe o id de um
     * usuário para atualiza-lo no sistema!
     * @param INT $UserId = Id do usuário
     * @param ARRAY $Data = Atribuitivo
     */
    public function ExeUpdate($UserId, array $Data) {
        $this->User = (int) $UserId;
        $this->Data = $Data;
        $this->Update();
    }
    public function ExeDelete($UserId) {
        $this->User = (int) $UserId;
        $this->Delete();
    }
    
        /**
     * <b>Verificar Cadastro:</b> Retorna TRUE se o cadastro ou update for efetuado ou FALSE se não.
     * Para verificar erros execute um getError();
     * @return BOOL $Var = True or False
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com um erro e um tipo.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /*
     * ***************************************
     * **********  PRIVATE METODOS  **********
     * ***************************************
     */

    //Cadasrtra Usuário!
    private function Create() {
        $Create = new Database();
        $Create->connect();
        $Create->insert(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Error = "O colaborador <b>{$this->Data['nome_operador']}</b> foi cadastrado com sucesso no sistema!";
            $this->Result = true;
        endif;
        $Create->disconnect();
    }
    
    //Atualiza Usuário!
    private function Update() {
        $Update = new Database;
        $Update->connect();
        $Update->update(self::Entity, $this->Data, "idoperador = {$this->User}");
        if ($Update->getResult()):
            $this->Error = "<pre class='alert-success'>O colaborador <b>{$this->Data['nome_operador']}</b> foi atualizado com sucesso!</pre>";
            $this->Result = true;
        endif;
        $Update->disconnect();
    }
    
    //Remove Usuário
    private function Delete() {
        $Delete = new Database;
        $Delete->connect();
        $Delete->delete(self::Entity, "idoperador = {$this->User}");
        $this->Error = "Dados removidos com sucesso !";
        $this->Result = true;
        $Delete->disconnect();
    }
}
