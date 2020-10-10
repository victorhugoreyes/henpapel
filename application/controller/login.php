<?php


class Login extends Controller {
    
    public function index() {
        
        session_start();
        
        $logged = $this->isLoged();
        
        if(!$logged) {
          
            require 'application/views/templates/head.php';
            require 'application/views/login/index.php';
            require 'application/views/templates/footer.php';
        } else {      
        
            header("Location:" . URL . $_SESSION['area'].'/');  
        }
    }

    
    public function isLoged() {

        if (isset($_SESSION['logged_in'])) {
        
            return true;
        } else {
        
            return false;
        }
        
    }

    
    public function signIn() {
    
        $login_model = $this->loadModel('LoginModel');
      
        $logged = $login_model->login($_POST);
        
        if (!$logged) {

            session_start();
            
            $_SESSION['session_messages'] = '<p class="small-error-message">Usuario o contraseña incorrectos';

            header("Location:" . URL);
        } else {

            session_start();

            $_SESSION['user']           = $logged;
            $_SESSION['logged_in']      = 'true';

            $_SESSION['id_usuario']     = $logged['id_usuario'];
            $_SESSION['nombre_usuario'] = $logged['nombre_usuario'];
            $_SESSION['area']           = $logged['area'];
            $_SESSION['id_tienda']      = $logged['id_tienda'];
            $_SESSION['nom_tienda']     = $login_model->getStoreName($logged['id_tienda']);

            $_SESSION['cambios_pendientes'] = $login_model->getPendingCambios();

            header("Location:" . URL . $logged['area'] . '/');
        }
    }

  
    public function sessionMessage($type, $text) {

        $message = '<p>';
    }
}
