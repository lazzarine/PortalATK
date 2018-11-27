<?php

class QtdCam {

    private $Data;
    private $CamCinzaP = 0;
    private $CamCinzaM = 0;
    private $CamCinzaG = 0;
    private $CamCinzaGG = 0;
    private $CamCinzaXG = 0;
    private $CamBrancaP = 0;
    private $CamBrancaM = 0;
    private $CamBrancaG = 0;
    private $CamBrancaGG = 0;
    private $CamBrancaXG = 0;
    private $CamVerdeP = 0;
    private $CamVerdeM = 0;
    private $CamVerdeG = 0;
    private $CamVerdeGG = 0;
    private $CamVerdeXG = 0;
    private $CamCaquiP = 0;
    private $CamCaquiM = 0;
    private $CamCaquiG = 0;
    private $CamCaquiGG = 0;
    private $CamCaquiXG = 0;

    public function setData($Data) {
        $this->Data = (array) $Data;
    }

    public function qtdCam() {
        for ($i = 0; $i <= count($this->Data); $i++):
            switch ($this->Data[$i]['estCam']):
                case "Cinza":
                    $this->qtdCinza($this->Data[$i]);
                    break;
                case "Polo Verde":
                    $this->qtdVerde($this->Data[$i]);
                    break;
                case "Polo Caqui":
                    $this->qtdCaqui($this->Data[$i]);
                    break;
                case "Polo Branca":
                    $this->qtdBranca($this->Data[$i]);
                    break;
            endswitch;
        endfor;
    }

    public function getCamCinzaP() {
        return $this->CamCinzaP;
    }

    public function getCamCinzaM() {
        return $this->CamCinzaM;
    }

    public function getCamCinzaG() {
        return $this->CamCinzaG;
    }

    public function getCamCinzaGG() {
        return $this->CamCinzaGG;
    }

    public function getCamCinzaXG() {
        return $this->CamCinzaXG;
    }

    public function getCamVerdeP() {
        return $this->CamVerdeP;
    }

    public function getCamVerdeM() {
        return $this->CamVerdeM;
    }

    public function getCamVerdeG() {
        return $this->CamVerdeG;
    }

    public function getCamVerdeGG() {
        return $this->CamVerdeGG;
    }

    public function getCamVerdeXG() {
        return $this->CamVerdeXG;
    }

    public function getCamCaquiP() {
        return $this->CamCaquiP;
    }

    public function getCamCaquiM() {
        return $this->CamCaquiM;
    }

    public function getCamCaquiG() {
        return $this->CamCaquiG;
    }

    public function getCamCaquiGG() {
        return $this->CamCaquiGG;
    }

    public function getCamCaquiXG() {
        return $this->CamCaquiXG;
    }
    
    public function getCamBrancaP() {
        return $this->CamBrancaP;
    }

    public function getCamBrancaM() {
        return $this->CamBrancaM;
    }

    public function getCamBrancaG() {
        return $this->CamBrancaG;
    }

    public function getCamBrancaGG() {
        return $this->CamBrancaGG;
    }

    public function getCamBrancaXG() {
        return $this->CamBrancaXG;
    }

    
    private function qtdCinza($Cam) {
        switch ($Cam['tamCam']):
            case "P":
                $this->CamCinzaP += $Cam['qtdCam'];
                break;
            case "M":
                $this->CamCinzaM += $Cam['qtdCam'];
                break;
            case "G":
                $this->CamCinzaG += $Cam['qtdCam'];
                break;
            case "GG":
                $this->CamCinzaGG += $Cam['qtdCam'];
                break;
            case "XG":
                $this->CamCinzaXG += $Cam['qtdCam'];
                break;
        endswitch;
    }

    private function qtdVerde($Cam) {
        switch ($Cam['tamCam']):
            case "P":
                $this->CamVerdeP += $Cam['qtdCam'];
                break;
            case "M":
                $this->CamVerdeM += $Cam['qtdCam'];
                break;
            case "G":
                $this->CamVerdeG += $Cam['qtdCam'];
                break;
            case "GG":
                $this->CamVerdeGG += $Cam['qtdCam'];
                break;
            case "XG":
                $this->CamVerdeXG += $Cam['qtdCam'];
                break;
        endswitch;
    }

    private function qtdCaqui($Cam) {
        switch ($Cam['tamCam']):
            case "P":
                $this->CamCaquiP += $Cam['qtdCam'];
                break;
            case "M":
                $this->CamCaquiM += $Cam['qtdCam'];
                break;
            case "G":
                $this->CamCaquiG += $Cam['qtdCam'];
                break;
            case "GG":
                $this->CamCaquiGG += $Cam['qtdCam'];
                break;
            case "XG":
                $this->CamCaquiXG += $Cam['qtdCam'];
                break;
        endswitch;
    }
    
    private function qtdBranca($Cam) {
        switch ($Cam['tamCam']):
            case "P":
                $this->CamBrancaP += $Cam['qtdCam'];
                break;
            case "M":
                $this->CamBrancaM += $Cam['qtdCam'];
                break;
            case "G":
                $this->CamBrancaG += $Cam['qtdCam'];
                break;
            case "GG":
                $this->CamBrancaGG += $Cam['qtdCam'];
                break;
            case "XG":
                $this->CamBrancaXG += $Cam['qtdCam'];
                break;
        endswitch;
    }

}
