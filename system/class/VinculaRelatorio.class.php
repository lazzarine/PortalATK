<?php

/**
 * Description of VinculaRelatorio
 *
 * @author upadova
 */
class VinculaRelatorio {

    private $User;
    private $Data;
    private $Result;
    private $Error;

    //Nome da tabela no banco de dados
    const Tabela = 'acesso_relatorio';

    public function VinRelatorio($user, $array) {
        $this->User = (string) $user;
        $this->Data = (array) $array;
        $this->VerificaRelatorio();
        $this->Create();
    }
    
    public function DeleteRelat($ID){
        $this->User = (int) $ID;
        if($ID):
            $this->Delete();
        endif;
    }

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    private function VerificaRelatorio() {
        $read = new Database;
        $read->connect();
        $read->select(self::Tabela, 'nome_r', NULL, "usuario = '{$this->User}'");
        $a = $read->getResult(); // acessos existente no banco
        $b = $this->Data; // enviado pelo usuário
        for ($i = 0; $i < count($b); $i++):
            for ($x = 0; $x < count($a); $x++):
                if ($b[$i][0] == $a[$x]['nome_r']):
                    $b[$i] = NULL;
                    break;
                endif;
            endfor;
        endfor;
        $this->Data = array_filter($b);
        $read->disconnect();
    }

    private function Create() {
        $create = new Database;
        $create->connect();
        $x = count($this->Data);
        if ($x >= 1):
            foreach ($this->Data as $value):
                $array = array("usuario" => $this->User, "nome_r" => $value[0], "descricao_r" => $value[1], "csv" => $value[2]);
                if ($create->insert(self::Tabela, $array)):
                    $this->Result = TRUE;
                    $this->Error = "Relatório vinculado ao usuário com sucesso !!!";
                else:
                    $this->Result = FALSE;
                    $this->Error = "Erro ao vincular ao usuário !!!";
                endif;
            endforeach;
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao vincular ao usuário !!!";
        endif;
        $create->disconnect();
    }
    
    private function Delete(){
        $Delete = new Database;
        $Delete->connect();
        if($Delete->delete(self::Tabela,"idacesso_r = '{$this->User}'")):
            $this->Result = TRUE;
            $this->Error = "Relatório excluido com sucesso !!!";
        else:
            $this->Result = FALSE;
            $this->Error = "Erro ao excluir o relatório.";
        endif;
        $Delete->disconnect();
            
    }

}
