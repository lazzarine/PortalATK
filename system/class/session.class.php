<?php

/**
 * Description of session
 *
 * @author upadova
 */
class session {

    private $Nivel;

    const limite = 1500;

    public function exeSession(array $resultado) {
        if (!session_id()):
            session_start();
            session_cache_limiter(30);
        endif;
        $_SESSION['userlogin'] = (array) $resultado;
    }

    public function getSession() {
        return $_SESSION['userlogin'];
    }

    public function DestroySession() {
        $_SESSION = array();
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 1500, '/');
        }
        session_destroy();
        header('Location: ../index.php?logoff=true');
    }

    public function TempRestante() {

        if (isset($_SESSION['tempolimite'])):
            if (time() > $_SESSION['tempolimite']):
                $this->DestroySession();
                die();
            else:
                $_SESSION['tempolimite'] += 50;
            endif;
        else:
            $_SESSION['tempolimite'] = time() + self::limite;
        endif;
    }

    public function checkAcesso($nivel) {
        $this->Nivel = $this->getSession();
        $this->Nivel = $this->Nivel[0]['nivel_acesso'];

        if ($this->Nivel >= $nivel):
            return true;
        endif;

        return false;
    }

}
