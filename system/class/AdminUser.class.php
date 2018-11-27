<?php

/**
 * AdminUser.class [ MODEL ADMIN ]
 * Respnsável por gerenciar os usuários no Admin do sistema!
 * 
 * @copyright (c) 2016, Uelinton Padova
 */
class AdminUser {

    private $Data;
    private $User;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'users';

    /**
     * <b>Cadastrar Usuário:</b> Envelope os dados de um usuário em um array atribuitivo e execute esse método
     * para cadastrar o mesmo no sistema. Validações serão feitas!
     * @param ARRAY $Data = Atribuitivo
     */
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

        if (!$this->Data['senha']):
            unset($this->Data['senha']);
        endif;
        $this->Update();
    }

    /**
     * <b>Remover Usuário:</b> Informe o ID do usuário que deseja remover. Este método não permite deletar
     * o próprio perfil ou ainda remover todos os ADMIN'S do sistema!
     * @param INT $UserId = Id do usuário
     */
    public function ExeDelete($UserId) {
        $this->User = (int) $UserId;

        $readUser = new Database;
        $readUser->connect();
        $readUser->select(self::Entity, '*', NULL, "id_user = '{$this->User}'");
        $Session = new session;
        $User = $Session->getSession();

        if ($readUser->numRows() == 0):
            $this->Error = "Oppsss, você tentou remover um usuário que não existe no sistema!";
            $this->Result = false;
        elseif ($this->User == $User[0]['id_user']):
            $this->Error = "Oppsss, você tentou remover seu usuário. Essa ação não é permitida!!!";
            $this->Result = false;
        else:
            $readAdmin = $readUser;
            $readAdmin->connect();
            $readAdmin->select(self::Entity, '*', NULL, "id_user != {$this->User} AND nivel_acesso = 1");
            //var_dump($readAdmin->getSql());

            if (!$readAdmin->numRows()):
                $this->Error = "Oppsss, você está tentando remover o único ADMIN do sistema. Para remover cadastre outro antes!!!";
                $this->Result = false;
            else:
                $this->Delete();
            endif;
            $this->Delete();
        endif;
        $readUser->disconnect();
        $readAdmin->disconnect();
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
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Cadasrtra Usuário!
    private function Create() {
        $Create = new Database();
        $Create->connect();
        $this->Data['senha'] = md5($this->Data['senha']);
        $Create->insert(self::Entity, $this->Data);
        if ($Create->getResult()):
            $this->Error = "O usuário <b>{$this->Data['nome']}</b> foi cadastrado com sucesso no sistema!";
            $this->Result = true;
        endif;
        $Create->disconnect();
    }

    //Atualiza Usuário!
    private function Update() {
        $Update = new Database;
        $Update->connect();
        if (isset($this->Data['senha'])):
            $this->Data['senha'] = md5($this->Data['senha']);
        endif;
        $Update->update(self::Entity, $this->Data, "id_user = {$this->User}");
        if ($Update->getResult()):
            $this->Error = "<pre class='alert-success'>O usuário <b>{$this->Data['nome']}</b> foi atualizado com sucesso!</pre>";
            $this->Result = true;
        endif;
        $Update->disconnect();
    }

    //Remove Usuário
    private function Delete() {
        $Delete = new Database;
        $Delete->connect();
        $Delete->delete(self::Entity, "id_user = {$this->User}");
        $this->Error = "Usuário removido com sucesso do sistema!";
        $this->Result = true;
        $Delete->disconnect();
    }

}
