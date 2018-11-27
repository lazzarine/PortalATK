<?php

/**
 * Description of QtdBota
 *
 * @author upadova
 */
class QtdBota extends Database {

    private $BP = array();
    private $BB = array();
    private $B7 = array();

    public function BotaP() {
        $this->connect();
        $d = 0;
        for ($i = 35; $i <= 44; $i++):
            $this->select('aprRequisicao', 'tamBt', NULL, "tpBt = 'Preta' AND tamBt = '$i'");
            $c = $this->getResult();
            $c = count($c);
            if ($c > 0):
                $a[$d] = array("qtdBt" => $c, "tamBt" => $i, "tpBt" => "Preta");
                $d++;
            endif;
        endfor;
        $this->BP = $a;
        $this->disconnect();
    }

    public function BotaBr() {
        $this->connect();
        $d = 0;
        for ($i = 35; $i <= 44; $i++):
            $this->select('aprRequisicao', 'tamBt', NULL, "tpBt = 'Branca' AND tamBt = '$i'");
            $c = $this->getResult();
            $c = count($c);
            if ($c > 0):
                $a[$d] = array("qtdBt" => $c, "tamBt" => $i, "tpBt" => "Branca");
                $d++;
            endif;
        endfor;
        $this->BB = $a;
        $this->disconnect();
    }

    public function BotaB7() {
        $this->connect();
        $d = 0;
        for ($i = 35; $i <= 44; $i++):
            $this->select('aprRequisicao', 'tamBt', NULL, "tpBt = '7Leguas' AND tamBt = '$i'");
            $c = $this->getResult();
            $c = count($c);
            if ($c > 0):
                $a[$d] = array("qtdBt" => $c, "tamBt" => $i, "tpBt" => "7Leguas");
                $d++;
            endif;
        endfor;
        $this->B7 = $a;
        $this->disconnect();
    }

    public function getBP() {
        return $this->BP;
    }

    public function getBB() {
        return $this->BB;
    }

    public function getB7() {
        return $this->B7;
    }

}
