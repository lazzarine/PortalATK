<?php

/**
 * Description of QtdBlu
 *
 * @author upadova
 */
class QtdBlu {

    private $Data;
    private $BluCinzaP = 0;
    private $BluCinzaM = 0;
    private $BluCinzaG = 0;
    private $BluCinzaGG = 0;
    private $BluCinzaXG = 0;
    private $BluBrancaP = 0;
    private $BluBrancaM = 0;
    private $BluBrancaG = 0;
    private $BluBrancaGG = 0;
    private $BluBrancaXG = 0;
    private $BluAzulP = 0;
    private $BluAzulM = 0;
    private $BluAzulG = 0;
    private $BluAzulGG = 0;
    private $BluAzulXG = 0;
    private $BluPretaP = 0;
    private $BluPretaM = 0;
    private $BluPretaG = 0;
    private $BluPretaGG = 0;
    private $BluPretaXG = 0;

    public function setData($Data) {
        $this->Data = (array) $Data;
    }

    public function qtdBlu() {
        for ($i = 0; $i <= count($this->Data); $i++):
            switch ($this->Data[$i]['estBlu']):
                case "Cinza":
                    $this->qtdCinza($this->Data[$i]);
                    break;
                case "Azul":
                    $this->qtdAzul($this->Data[$i]);
                    break;
                case "Preta":
                    $this->qtdPreta($this->Data[$i]);
                    break;
                case "Branca":
                    $this->qtdBranca($this->Data[$i]);
                    break;
            endswitch;
        endfor;
    }


    public function getBluCinzaP() {
        return $this->BluCinzaP;
    }

    public function getBluCinzaM() {
        return $this->BluCinzaM;
    }

    public function getBluCinzaG() {
        return $this->BluCinzaG;
    }
    public function getBluCinzaGG() {
        return $this->BluCinzaGG;
    }

    public function getBluCinzaXG() {
        return $this->BluCinzaXG;
    }

    public function getBluAzulP() {
        return $this->BluAzulP;
    }

    public function getBluAzulM() {
        return $this->BluAzulM;
    }

    public function getBluAzulG() {
        return $this->BluAzulG;
    }
    public function getBluAzulGG() {
        return $this->BluAzulGG;
    }

    public function getBluAzulXG() {
        return $this->BluAzulXG;
    }

    public function getBluPretaP() {
        return $this->BluPretaP;
    }

    public function getBluPretaM() {
        return $this->BluPretaM;
    }

    public function getBluPretaG() {
        return $this->BluPretaG;
    }
    public function getBluPretaGG() {
        return $this->BluPretaGG;
    }

    public function getBluPretaXG() {
        return $this->BluPretaXG;
    }
    
    public function getBluBrancaP() {
        return $this->BluBrancaP;
    }

    public function getBluBrancaM() {
        return $this->BluBrancaM;
    }

    public function getBluBrancaG() {
        return $this->BluBrancaG;
    }

    public function getBluBrancaGG() {
        return $this->BluBrancaGG;
    }

    public function getBluBrancaXG() {
        return $this->BluBrancaXG;
    }

    
        private function qtdCinza($Blu) {
        switch ($Blu['tamBlu']):
            case "P":
                $this->BluCinzaP += $Blu['qtdBlu'];
                break;
            case "M":
                $this->BluCinzaM += $Blu['qtdBlu'];
                break;
            case "G":
                $this->BluCinzaG += $Blu['qtdBlu'];
                break;
            case "GG":
                $this->BluCinzaGG += $Blu['qtdBlu'];
                break;
            case "XG":
                $this->BluCinzaXG += $Blu['qtdBlu'];
                break;
        endswitch;
    }

    private function qtdAzul($Blu) {
        switch ($Blu['tamBlu']):
            case "P":
                $this->BluAzulP += $Blu['qtdBlu'];
                break;
            case "M":
                $this->BluAzulM += $Blu['qtdBlu'];
                break;
            case "G":
                $this->BluAzulG += $Blu['qtdBlu'];
                break;
            case "GG":
                $this->BluAzulGG += $Blu['qtdBlu'];
                break;
            case "XG":
                $this->BluAzulXG += $Blu['qtdBlu'];
                break;
        endswitch;
    }

    private function qtdPreta($Blu) {
        switch ($Blu['tamBlu']):
            case "P":
                $this->BluPretaP += $Blu['qtdBlu'];
                break;
            case "M":
                $this->BluPretaM += $Blu['qtdBlu'];
                break;
            case "G":
                $this->BluPretaG += $Blu['qtdBlu'];
                break;
            case "GG":
                $this->BluPretaGG += $Blu['qtdBlu'];
                break;
            case "XG":
                $this->BluPretaXG += $Blu['qtdBlu'];
                break;
        endswitch;
    }
    
    private function qtdBranca($Blu) {
        switch ($Blu['tamBlu']):
            case "P":
                $this->BluBrancaP += $Blu['qtdBlu'];
                break;
            case "M":
                $this->BluBrancaM += $Blu['qtdBlu'];
                break;
            case "G":
                $this->BluBrancaG += $Blu['qtdBlu'];
                break;
            case "GG":
                $this->BluBrancaGG += $Blu['qtdBlu'];
                break;
            case "XG":
                $this->BluBrancaXG += $Blu['qtdBlu'];
                break;
        endswitch;
    }

}
