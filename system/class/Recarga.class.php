<?php

/**
 * Description of recarga
 *
 * @author upadova
 */
class Recarga {

    private $Operador;
    private $valor;
    private $Result;
    private $Error;
    private $Dir;

    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

    public function VerificaArq($arq) {
        $this->Dir = "./recarga/$arq";
        if (!file_exists($this->Dir)):
            $this->Error = "Arquivo não encontrado !";
            $this->Result = False;
        else:
            $this->Result = True;
        endif;
    }

    public function AtuRecarga() {
        $this->LerArquivo();
    }

    private function LerArquivo() {
        $read = new Database;
        $read->connect();
        $read->select('operador');
        $operadores = $read->getResult();
        $soma = 0;
        foreach ($operadores as $x):
            extract($x);
            $handle = fopen($this->Dir, "r");
            while (($data = fgetcsv($handle, 0, ";")) !== FALSE):
                $oper = $data[15];
                $valor = (float) str_replace(",", ".", $data[12]);
                if ($matricula == $oper):
                    $soma += $valor;
                endif;
            endwhile;
            echo $matricula . "->" . $nome_operador . "->" . $soma . "<br>";
            $soma = 0;
            fclose($handle);
        endforeach;
        $read->disconnect();
    }

}
