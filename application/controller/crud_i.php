<?php 

class Crud_i extends Controller {

    public function index() {

        if(!isset($_SESSION)) {

            session_start();
        }

        $login= $this->loadController('login');


        $optionsmodel =$this->loadModel('options_i_model');

        $login_model = $this->loadModel('LoginModel');

        $rows = $optionsmodel->getPapers();
       
        if($login->isLoged()){
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/crud_i/index.php';
            require 'application/views/templates/footer.php';
        }else{

            header("Location:".URL.'login/');
        }

    }


    public function Guardar() {
       
        $optionsmodel =$this->loadModel('OptionsModel');
        $registrar= $optionsmodel->getRegistrar($_POST);

        if ($registrar ) {

            echo '<script> alert("registro exitoso"); alert("registro exitoso");window.location= '.URL.'crud_i/envio2 </script>';
        } else {
        
            echo "error";
        }                                                  
    }


    public function eliminar(){
    
        $id=$_POST['id_papel'];
        $optionsmodel =$this->loadModel('OptionsModel');
        $delete = $optionsmodel->getDelete($id);

        if ($delete ) {

            ?> <script type="text/javascript">eliminado exitosamente</script> <?php 
        } else {
        
            echo "error";
        }
    }


    public function Update() {
    
        $optionsmodel =$this->loadModel('OptionsModel');
        $update= $optionsmodel->getUpdate($_POST);

        if ($update) {

            echo "Modificado el registro exitosamente" ;
            echo '<a href="<?php echo URL?>crud_i/index">Regresar</a>';
        } else {

            echo "error";
        }
    }
}


