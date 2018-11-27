<?php

/**
 * Description of AprovarRq
 *
 * @author upadova
 */
class AprovarRq extends Database {

    private $Id;
    private $Data;
    private $Mensagem;
    private $Retorno;
    private $Valor;

    //tabelas no banco de dados
    const tbRequisicao = 'requisicao';
    const tbAprovada = 'aprRequisicao';

    public function Aprovar($Id) {
        $this->Id = (int) $Id;
        if ($this->Leitura()):
            if ($this->Inserir()):
                if ($this->Excluir()):
                    $this->Mensagem = "A requisição N° {$this->Id} foi aprovada.";
                    $this->Retorno = TRUE;
                endif;
            endif;
        endif;
    }

    public function getMensagem() {
        return $this->Mensagem;
    }

    public function getRetorno() {
        return $this->Retorno;
    }

    public function setValor($valor) {
        $this->Valor = str_replace(",", ".", $valor);
    }

    private function Leitura() {
        $this->connect();
        if ($this->select(self::tbRequisicao, '*', NULL, "id = {$this->Id}")):
            $this->Data = $this->getResult();
            $dataRq = array("dataApr" => date("d/m/Y"));
            $this->Data[0] = array_merge($this->Data[0], $dataRq);
            $valor = array("valor" => $this->Valor);
            $this->Data[0] = array_merge($this->Data[0], $valor);
            return TRUE;
        else:
            $this->Retorno = FALSE;
            $this->Mensagem = "Não foi possivel ler os dados!";
            return FALSE;
        endif;
        $this->disconnect();
    }

    private function Inserir() {
        $this->connect();
        if ($this->insert(self::tbAprovada, $this->Data[0])):
            $this->disconnect();
            return TRUE;
        else:
            $this->Retorno = FALSE;
            $this->Mensagem = "Não foi possivel inserir os dados!";
            $this->disconnect();
            return FALSE;
        endif;
    }

    private function Excluir() {
        $this->connect();
        if ($this->delete(self::tbRequisicao, "id = {$this->Id}")):
            return TRUE;
        else:
            $this->Retorno = FALSE;
            $this->Mensagem = "Não foi possivel excluir os dados!";
            return FALSE;
        endif;
    }

}
