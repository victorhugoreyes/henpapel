<?php


class Cajasedit extends Controller {
    
    public function index() {

        session_start();
        
        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');

        $optionsmodel = $this->loadModel('OptionsModel');
        $models       = $optionsmodel->getBoxModels();
        
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cajasedit/editalmeja.php';
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

        $row = $optionsmodel->getNombModelsById_calculo($_GET['id_calculo']);

        $nomb_modelo = $row['nombre'];
        $nomb_modelo = strval($nomb_modelo);
        $nomb_modelo = trim($nomb_modelo);
        $nomb_modelo = strtolower($nomb_modelo);
        $nomb_modelo = "edit" . $nomb_modelo;

        $editar_modelo = 'application/views/cajasedit/' . $nomb_modelo . '.php';


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cajasedit/' . $nomb_modelo . '.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }


}
