<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of atualizaimg
 *
 * @author upadova
 */
class atualizaimg {

    private $Target_dir = "../../../portal_v3/images/";
    private $Options;
    private $Result;
    private $Error;
    
    private $diretorio;
    
    
    
    
    public function setOptions($option) {
        $this->Options = $option;
    }
    public function getResult() {
        return $this->Result;
    }

    public function getError() {
        return $this->Error;
    }

        public function Atualiza() {
        $target_file = "$this->Target_dir{$this->Options}" . basename($_FILES["arquivo"]["name"]);
        if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file) and isset($_FILES["arquivo"])):
            $this->Error = "O arquivo" . basename($_FILES["arquivo"]["name"]) . " atualizado com sucesso!.";
            $this->Result = TRUE;        
        else:
            $this->Error = "Arquivo" . basename($_FILES["arquivo"]["name"]) . " não atualizado!.";
            $this->Result = FALSE;
        endif;
    }
}
