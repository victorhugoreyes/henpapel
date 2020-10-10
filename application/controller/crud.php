<?php 

class Crud extends Controller {

    public function index() {


        if(!isset($_SESSION)) {

            session_start();
        }
        
        $login= $this->loadController('login');

        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');

        $rows = $optionsmodel->getPapers();
       
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/crud/index.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:".URL.'login/');
        }

    }


    public function Guardar() {
       
        $optionsmodel = $this->loadModel('OptionsModel');
        $registrar    = $optionsmodel->getRegistrar($_POST);

        if ($registrar ) {

            echo "<script> alert('registro exitoso');</script>";
            header( "Location: ". URL ."crud/envio2");
        } else {
        
            echo "error";
        }
    }


    public function eliminar() {

        $id = $_POST['id_papel'];
        
        $optionsmodel = $this->loadModel('OptionsModel');
        $delete       = $optionsmodel->getDelete($id);

        if ($delete ) {

          ?> <script type="text/javascript">eliminado exitosamente</script> <?php 
        } else {

            echo "error";
       }
    }


    public function Update() {

        $optionsmodel = $this->loadModel('OptionsModel');
        $update       = $optionsmodel->getUpdate($_POST);

        if ($update) {

            echo " Se ha modificado el registro exitosamente" ;
            echo '<a href="<?php echo URL?>crud/index">Regresar</a>';
        } else {

            echo "error";
        }
    }


    public function envio() {

        session_start();
      
        $login = $this->loadController('login');
        
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            $id = $_GET['id'];
            $datos = $optionsmodel->getDatos($id);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/crud/modificar.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:".URL.'login/');
        }
    }
  

    public function envio2() {

        session_start();
      
        $login = $this->loadController('login');
        
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {
    
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/crud/agregar.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:".URL.'login/');
        }
    }
}


