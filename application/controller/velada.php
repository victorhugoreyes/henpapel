<?php 



class Velada extends Controller {

	public function index() {

        session_start();
        
        $login= $this->loadController('login');

        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/index.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }

    // Inserta en las tablas
    public function Guardar() {
       
        error_reporting(0);

        $optionsmodel = $this->loadModel('OptionsModel');
        $insertar     = $optionsmodel->getInsert($_POST);

        $response = array();
      
        if ($insertar) {

            $response['message'] = '<div class="notification success"><div></div><p><span>Exito: </span>Datos guardados correctamente!</p></div>';
      
            $response['success'] = 'true';
        } else {

            $response['message'] = '<div class="notification fail"><div></div><p><span>Error: </span>Ocurrio un problema y no se guardo la informacion</p></div>';

            $response['success'] = 'false';
        }  

        echo json_encode($response);
    }
    

    public function reporte() {
  
        session_start();
      
        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');

        if($login->isLoged()){

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/reporte.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function editar() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
   
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/editar.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }
    

    public function detalles() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/detalles.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function detalles2() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/detalles2.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function envio() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            $id    = $_GET['id'];
            $datos = $optionsmodel->getDatospersonal($id);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/modificar.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL .'login/');
        }
    }


    public function envio2() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            $id    = $_GET['id'];

            $datos = $optionsmodel->getDatosorden($id);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/modificarorden.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function envio3() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            $id    = $_GET['id'];
            $datos = $optionsmodel->getDatosgasto($id);
            
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/modificargastos.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function envio4() {

        session_start();

        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            $id    = $_GET['id'];
            $datos = $optionsmodel->getDatosvelada($id);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/modificarvelada.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function Updateper() {

        $optionsmodel = $this->loadModel('OptionsModel');
        $update       = $optionsmodel->getUpdateper($_POST);

        if ($update) {

            echo " Se ha modificado el registro exitosamente" ;
        }else {

            echo "error";
        }
    }


    public function Updateor() {

        $optionsmodel = $this->loadModel('OptionsModel');
        $update       = $optionsmodel->getUpdateor($_POST);

        if ($update) {

            echo " Se ha modificado el registro exitosamente" ;
        } else {
        
            echo "error";
        }
    }
  

    public function Updatevel() {

        $optionsmodel = $this->loadModel('OptionsModel');
        $update       = $optionsmodel->getUpdatevel($_POST);

        if ($update) {

            echo " Se ha modificado el registro exitosamente" ;
        } else {

            echo "error";
        }
    }
}

