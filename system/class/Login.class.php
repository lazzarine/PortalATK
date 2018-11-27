<?php

/**
 * Login.class
 * Responável por autenticar, validar, e checar usuário do sistema de login!
 * 
 * @copyright (c) 2014, Uelinton Padova
 */
class Login {

    private $Level;
    private $Nome;
    private $User;
    private $Senha;
    private $NivelAcesso;
    private $Status;
    private $Error;
    private $Result;
    private $Sessao;

    /**
     * <b>Informar Level:</b> Informe o nível de acesso mínimo para a área a ser protegida.
     * @param INT $Level = Nível mínimo para acesso
     */
    function __construct($Level) {
        $this->Level = (int) $Level;
        
    }

    /**
     * <b>Efetuar Login:</b> Envelope um array atribuitivo com índices STRING user [email], STRING pass.
     * Ao passar este array na ExeLogin() os dados são verificados e o login é feito!
     * @param ARRAY $UserData = use, pass
     */
    public function ExeLogin($user , $pass) {
        $this->User = (string) strip_tags(trim($user));
        $this->Senha = (string) strip_tags(trim($pass));
        //$this->getUser();
        $this->setLogin();
    }

    /**
     * <b>Verificar Login:</b> Executando um getResult é possível verificar se foi ou não efetuado
     * o acesso com os dados.
     * @return BOOL $Var = true para login e false para erro
     */
    public function getResult() {
        return $this->Result;
    }

    /**
     * <b>Obter Erro:</b> Retorna um array associativo com uma mensagem e um tipo de erro WS_.
     * @return ARRAY $Error = Array associatico com o erro
     */
    public function getError() {
        return $this->Error;
    }

    /**
     * <b>Checar Login:</b> Execute esse método para verificar a sessão USERLOGIN e revalidar o acesso
     * para proteger telas restritas.
     * @return BOLEAM $login = Retorna true ou mata a sessão e retorna false!
     */
    public function CheckLogin() {
        if (empty($_SESSION['userlogin']) || $_SESSION['userlogin']['nivel_acesso'] < $this->Level):
            unset($_SESSION['userlogin']);
            return false;
        else:
            return true;
        endif;
    }

    /*
     * ***************************************
     * **********  PRIVATE METHODS  **********
     * ***************************************
     */

    //Valida os dados e armazena os erros caso existam. Executa o login!
    private function setLogin() {
        if (!$this->User || !$this->Senha):
            $this->Error = ("<label class='row badge alert-warning'>Informe seu usuário e senha para efetuar o login!</label>");
            $this->Result = false;
        elseif (!$this->getUser()):
            $this->Error = ("<label class='row badge alert-warning'>Os dados informados não são compatíveis!</label>");
            $this->Result = false;
        elseif ($this->NivelAcesso < $this->Level):
            $this->Error = ("Desculpe {$this->Nome}, <label class='row badge alert-danger'>você não tem permissão para acessar esta área!</label>");
            $this->Result = false;
        elseif ($this->Status <= 0):
            $this->Error = ("<label class='row badge alert-danger'>Desculpe, sua conta está bloqueada!</label>");
            $this->Result = false;
        else:
            $this->Execute();
        endif;
    }

    //Vetifica usuário e senha no banco de dados!
    private function getUser() {
        $this->Senha = md5($this->Senha);

        $read = new Database;
        $read->connect();
        $read->select('users', '*', NULL, "login = '{$this->User}' AND senha = '{$this->Senha}'");

        $temp = $read->getResult();
        if ($read->numRows() > 0):

            foreach ($temp as $resultado):
                extract($resultado);
                $this->Nome = $nome;
                $this->NivelAcesso = $nivel_acesso;
                $this->Status = $status_usuario;
            endforeach;
            $this->Sessao = $temp;
            return true;
        else:
            return false;
        endif;
        $read->disconnect();
    }

    //Executa o login armazenando a sessão!
    private function Execute() {
       //if (!session_id()):
            //session_start();
       // endif;
        //session_start();
        //$_SESSION['userlogin'] = $this->Result;
        $session = new session;
        $session->exeSession($this->Sessao);
        $this->Error = ("Olá {$this->Nome}, <label class='row badge alert-success'>seja bem vindo(a). Aguarde redirecionamento!</label>");
        $this->Result = true;
    }

}
