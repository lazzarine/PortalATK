<?php
/**
 * Description of QtdCal
 *
 * @author upadova
 */
class QtdCal extends Database {

    private $JMC = array();
    private $JMP = array();
    private $JM = array();
    private $JFC = array();
    private $JFP = array();
    private $JF = array();
    
    private $CalBrancaP =0;
    private $CalBrancaM =0;
    private $CalBrancaG = 0;
    private $CalBrancaGG = 0;

    public function JeansMc() {
        $this->connect();
        for ($i = 38; $i <= 56; $i += 2):
            $this->select('aprRequisicao', 'sum(qtdCal),tamCal,estCal,tpCal', NULL, "tamCal = '$i' AND estCal = 'Cinza' AND tpCal = 'Masculino'");
            $r = $this->getResult();
            if ($r[0]['tamCal']):
                $this->JMC = array_merge($this->JMC, $r);
            endif;
        endfor;
        $this->disconnect();
    }
    
    public function JeansMp() {
        $this->connect();
        for ($i = 38; $i <= 56; $i += 2):
            $this->select('aprRequisicao', 'sum(qtdCal),tamCal,estCal,tpCal', NULL, "tamCal = '$i' AND estCal = 'Preta' AND tpCal = 'Masculino'");
            $r = $this->getResult();
            if ($r[0]['tamCal']):
                $this->JMP = array_merge($this->JMP, $r);
            endif;
        endfor;
        $this->disconnect();
    }
    public function JeansM() {
        $this->connect();
        for ($i = 38; $i <= 56; $i += 2):
            $this->select('aprRequisicao', 'sum(qtdCal),tamCal,estCal,tpCal', NULL, "tamCal = '$i' AND estCal = 'Jeans' AND tpCal = 'Masculino'");
            $r = $this->getResult();
            if ($r[0]['tamCal']):
                $this->JM = array_merge($this->JM, $r);
            endif;
        endfor;
        $this->disconnect();
    }
    public function JeansFc() {
        $this->connect();
        for ($i = 38; $i <= 56; $i += 2):
            $this->select('aprRequisicao', 'sum(qtdCal),tamCal,estCal,tpCal', NULL, "tamCal = '$i' AND estCal = 'Cinza' AND tpCal = 'Feminino'");
            $r = $this->getResult();
            if ($r[0]['tamCal']):
                $this->JFC = array_merge($this->JFC, $r);
            endif;
        endfor;
        $this->disconnect();
    }
    public function JeansFp() {
        $this->connect();
        for ($i = 38; $i <= 56; $i += 2):
            $this->select('aprRequisicao', 'sum(qtdCal),tamCal,estCal,tpCal', NULL, "tamCal = '$i' AND estCal = 'Preta' AND tpCal = 'Feminino'");
            $r = $this->getResult();
            if ($r[0]['tamCal']):
                $this->JFP = array_merge($this->JFP, $r);
            endif;
        endfor;
        $this->disconnect();
    }
    public function JeansF() {
        $this->connect();
        for ($i = 38; $i <= 56; $i += 2):
            $this->select('aprRequisicao', 'sum(qtdCal),tamCal,estCal,tpCal', NULL, "tamCal = '$i' AND estCal = 'Jeans' AND tpCal = 'Feminino'");
            $r = $this->getResult();
            if ($r[0]['tamCal']):
                $this->JF = array_merge($this->JF, $r);
            endif;
        endfor;
        $this->disconnect();
    }
    
    public function qtdCalBc() {
        $this->connect();
        $this->select('aprRequisicao', 'qtdCal,tamCal,estCal,tpCal', NULL, "estCal = 'Branca'");
        $Cal = $this->getResult();
        $this->disconnect();
        for ($i = 0; $i < count($Cal); $i++):
            switch ($Cal[$i]['tamCal']):
            case "P":
                $this->CalBrancaP += $Cal[$i]['qtdCal'];
                break;
            case "M":
                $this->CalBrancaM += $Cal[$i]['qtdCal'];
                break;
            case "G":
                $this->CalBrancaG += $Cal[$i]['qtdCal'];
                break;
            case "GG":
                $this->CalBrancaGG += $Cal[$i]['qtdCal'];
                break;
            /*
            case "XG":
                $this->CalBrancaXG += $Cal['qtdBlu'];
                break;
             * 
             */
        endswitch;
        endfor;
    }

    public function getJMC() {
        return $this->JMC;
    }
    public function getJMP() {
        return $this->JMP;
    }

    public function getJM() {
        return $this->JM;
    }
    public function getJFC() {
        return $this->JFC;
    }

    public function getJFP() {
        return $this->JFP;
    }

    public function getJF() {
        return $this->JF;
    }
    
    public function getCalBrancaP() {
        return $this->CalBrancaP;
    }

    public function getCalBrancaM() {
        return $this->CalBrancaM;
    }

    public function getCalBrancaG() {
        return $this->CalBrancaG;
    }
    
    public function getCalBrancaGG() {
        return $this->CalBrancaGG;
    }



}
