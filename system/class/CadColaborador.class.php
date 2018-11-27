<?php
/**
 * Description of CadColaborador
 *
 * @author upadova
 */
class CadColaborador {

    private $Data;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'usersEquip';

    public function ExeCreate(array $Data) {
        $Data = array_merge($Data, array("statusUser" => 1));
        $this->Data = $Data;
        //var_dump($this->Data);
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
        if ($Create->insert(self::Entity, $this->Data)):
            $this->Error = "O colaborador <b>{$this->Data['nome']}</b> foi, <br> cadastrado com sucesso no sistema!";
            $this->Result = true;
        else:
            $this->Error = "O colaborador <b>{$this->Data['nome']}</b> não foi, <br> cadastrado no sistema!";
            $this->Result = false;
        endif;
        $Create->disconnect();
    }

    //Atualiza Usuário!
    private function Update() {
        $Update = new Database;
        $Update->connect();
        $Update->update(self::Entity, $this->Data, "id = {$this->User}");
        if ($Update->getResult()):
            $this->Error = "O colaborador <b>{$this->Data['nome']}</b> foi <br> atualizado com sucesso!";
            $this->Result = true;
        else:
            $this->Error = "O colaborador <b>{$this->Data['nome']}</b> não foi <br> atualizado com sucesso!";
            $this->Result = false;
        endif;
        $Update->disconnect();
    }

    //Remove Usuário
    private function Delete() {
        $Delete = new Database;
        $Delete->connect();
        if ($Delete->delete(self::Entity, "id = {$this->User}")):
            $this->Error = "Dados removidos com sucesso !";
            $this->Result = true;
        else:
            $this->Error = "Erro ao remover os dados !";
            $this->Result = false;
        endif;
        $Delete->disconnect();
    }

}
