<?php

/**
 * Description of CreateAcesso
 *
 * @author upadova
 */
class AdminAcesso {

    private $Data;
    private $User;
    private $Acesso;
    private $Error;
    private $Result;

    //Nome da tabela no banco de dados
    const Entity = 'modulos';
    
    /*
     * Informe array
     * @param array $Data
     */
    public function ExeCreate(array $Data) {
        $this->Data = $Data;
        $this->User = $Data['username'];
        $this->Acesso = $Data['acesso'];
        $this->CreateAcesso();
    }
    
    /*
     * Informe ID da tabela para ser excluido
     * @param (int) $IdAcesso
     */
    public function ExeDelete($IdAcesso) {
        $this->User = (int) $IdAcesso;
        $this->DeleteAcesso();
    }
    
    /*
     * Retorna o resultado do método
     * @param (boolean) TRUE OU FALSE 
     */
    public function getResult() {
        return $this->Result;
    }
    
    /*
     * Retorna uma mensagem
     * @param (String)
     */
    public function getError() {
        return $this->Error;
    }
    
    ########################################
    ########## Metódos protegidos ##########
    ########################################
    
    protected function DeleteAcesso() {

        $Delete = new Database;
        $Delete->connect();
        $Delete->select(self::Entity, '*', NULL, "idmodulo != {$this->User} AND acesso = 'liberar acesso'");
        if (!$Delete->numRows()):
            $this->Result = FALSE;
            $this->Error = "Falha ao excluir acesso";
        else:
            $Delete->delete(self::Entity, "idmodulo = {$this->User}");
            $this->Result = TRUE;
            $this->Error = "Acesso excluido com sucesso !";
        endif;

        $Delete->disconnect();
    }

    protected function CreateAcesso() {

        $create = new Database;
        $create->connect();
        $create->select(self::Entity, '*', NULL, "acesso = '{$this->Acesso}' AND username = '{$this->User}'");
        if ($create->numRows() > 0):
            $this->Result = TRUE;
            $this->Error = "O usuário <b>{$this->User}</b> já possui este acesso !!!";
        else:
            $this->Result = FALSE;
            $this->Error = "Acesso liberado ao usuário <b>{$this->User}</b>";
            $create->insert(self::Entity, $this->Data);
        endif;
        $create->disconnect();
    }

}
