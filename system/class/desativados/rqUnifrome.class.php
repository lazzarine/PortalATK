<?php

/**
 * Description of rqUnifrome
 *
 * @author upadova
 */
class rqUnifrome {

    private $User;
    private $Data;
    private $Error;
    private $Result;
    private $Item;
    private $Estilo;
    private $Qtd;
    private $TotalCam;
    private $TotalCal;
    private $TotalBlu;
    private $TotalBt;

    //Nome da tabela no banco de dados
    const Entity = 'requisicao';

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
    public function ExeUpdate($Id, array $Data) {
        $this->User = (int) $Id;
        $this->Data = $Data;
        $this->Update();
    }

    public function ExeDelete($Id) {
        $this->User = (int) $Id;
        $this->Delete();
    }

    /**
     * <b>Calcula o valor do uniforme:</b>
     * @param String $item = Camisa, Calca, Blusa, Bota
     * @param String $estilo = estilo do item
     * @param INT $quantidade
     */
    public function Calcular($item, $estilo, $quantidade = 0) {
        $this->Item = $item;
        $this->Estilo = $estilo;
        $this->Qtd = $quantidade;

        if ($this->Item == "Camisa"):
            $this->CalCamisa();
        elseif ($this->Item == "Calca"):
            $this->CalCalca();
        elseif ($this->Item == "Blusa"):
            $this->CalBlusa();
        elseif ($this->Item == "Bota"):
            $this->CalBota();
        endif;
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

    public function getTotalCam() {
        return $this->TotalCam;
    }

    public function getTotalCal() {
        return $this->TotalCal;
    }

    public function getTotalBlu() {
        return $this->TotalBlu;
    }

    public function getTotalBt() {
        return $this->TotalBt;
    }

    /*
     * ***************************************
     * **********  PRIVATE METODOS  **********
     * ***************************************
     */

    //Cadasrtra
    private function Create() {
        $Create = new Database();
        $Create->connect();
        if ($Create->insert(self::Entity, $this->Data)):
            $this->Error = "A requisição do Uniforme do <b>{$this->Data['nome']}</b> foi cadastrado com sucesso no sistema!";
            $this->Result = true;
        else:
            $this->Error = "A requisição do Uniforme do <b>{$this->Data['nome']}</b> não foi cadastrada no sistema!";
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
            $this->Error = "A requisição numero <b>{$this->User}</b> foi alterada com sucesso!";
            $this->Result = true;
        else:
            $this->Error = "A requisição numero <b>{$this->User}</b> não foi possivel alterar!";
            $this->Result = false;
        endif;
        $Update->disconnect();
    }

    //Remove Usuário
    private function Delete() {
        $Delete = new Database;
        $Delete->connect();
        if ($Delete->delete(self::Entity, "id = {$this->User}")):
            $this->Error = "A requisição numero: <b>{$this->User}</b> foi excluida!";
            $this->Result = true;
        else:
            $this->Error = "A requisição numero: <b>{$this->User}</b> não foi possivel exckuir!";
            $this->Result = FALSE;
        endif;

        $Delete->disconnect();
    }

    private function LerXml() {
        if (!file_exists("valores.xml")):
            $this->Result = FALSE;
            $this->Error = "Não foi possivel ler os valores.";
        else:
            return simplexml_load_file('valores.xml');
        endif;
    }

    private function CalCamisa() {
        switch ($this->Estilo):
            case "Cinza":
                $this->TotalCam = (float) $this->Qtd * str_replace(",", ".", $this->LerXml()->CamCinza);
                break;

            case "Polo Verde":
                $this->TotalCam = (float) $this->Qtd * str_replace(",", ".", $this->LerXml()->CamVerde);
                break;

            case "Polo Caqui":
                $this->TotalCam = (float) $this->Qtd * str_replace(",", ".", $this->LerXml()->CamCaqui);
                break;
            
            case "Polo Branca":
                $this->TotalCam = (float) $this->Qtd * str_replace(",", ".", $this->LerXml()->CamBranca);
                break;
        endswitch;
    }

    private function CalCalca() {

        switch ($this->Estilo):
            case "Jeans":
                $this->TotalCal = $this->Qtd * str_replace(",", ".", $this->LerXml()->CalJeans);
                break;
            case "Preta":
                $this->TotalCal = $this->Qtd * str_replace(",", ".", $this->LerXml()->CalPreta);
                break;
            case "Cinza":
                $this->TotalCal = $this->Qtd * str_replace(",", ".", $this->LerXml()->CalCinza);
                break;
            case "Branca":
                $this->TotalCal = $this->Qtd * str_replace(",", ".", $this->LerXml()->CalBranca);
                break;
        endswitch;
    }

    private function CalBlusa() {
        switch ($this->Estilo):
            case "Cinza":
                $this->TotalBlu = $this->Qtd * str_replace(",", ".", $this->LerXml()->BluCinza);
                break;
            case "Azul":
                $this->TotalBlu = $this->Qtd * str_replace(",", ".", $this->LerXml()->BluAzul);
                break;
            case "Preta":
                $this->TotalBlu = $this->Qtd * str_replace(",", ".", $this->LerXml()->BluPreta);
                break;
            case "Branca":
                $this->TotalBlu = $this->Qtd * str_replace(",", ".", $this->LerXml()->BluBranca);
                break;
        endswitch;
    }

    private function CalBota() {
        switch ($this->Estilo):
            case "Preta":
                $this->TotalBt = $this->Qtd * str_replace(",", ".", $this->LerXml()->BtPreta);
                break;
            case "Branca":
                $this->TotalBt = $this->Qtd * str_replace(",", ".", $this->LerXml()->BtBranca);
                break;
            case "7Leguas":
                $this->TotalBt = $this->Qtd * str_replace(",", ".", $this->LerXml()->BtLeguas);
                break;
        endswitch;
    }

}
