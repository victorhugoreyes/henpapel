<?php 



class Product_x extends Controller {

	  public function index(){
        session_start();
        
        $login= $this->loadController('login');


        $optionsmodel =$this->loadModel('options_i_model');
        $login_model = $this->loadModel('LoginModel');

       
    if($login->isLoged()){
        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/crud_i/index.php';
        require 'application/views/templates/footer.php';
      
        }else{

            header("Location:".URL.'login/');

        }
     }


    public function Guardar(){
       
        error_reporting(0);
         $optionsmodel =$this->loadModel('OptionsModel');
         $insertar= $optionsmodel->getInsert($_POST);
         $response=array();
        
        if ($insertar) {
            $response['message']='<div class="notification success"><div></div><p><span>Exito: </span>Datos guardados correctamente!</p></div>';
            $response['success']='true';
        } else {
            $response['message']='<div class="notification fail"><div></div><p><span>Error: </span>Ocurrio un problema y no se guardo la informacion</p></div>';
           $response['success']='false';
        }  

        echo json_encode($response);
                                                                                         
    }
    

    public function reporte(){
        
        session_start();
      
        $login= $this->loadController('login');
        $optionsmodel =$this->loadModel('OptionsModel');
        $login_model = $this->loadModel('LoginModel');
       

       
        if($login->isLoged()){
        
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/crud_i/index.php'; /* velada/reporte.php */
            require 'application/views/templates/footer.php';
          
        } else {

            header("Location:".URL.'login/');
        }

    }
    
  
    public function detalles(){
  
        session_start();
      
            $login= $this->loadController('login');
            $optionsmodel =$this->loadModel('OptionsModel');
            $login_model = $this->loadModel('LoginModel');
       
        if($login->isLoged()){
  
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/detalles.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:".URL.'login/');
        }

    }
  
                                                                                           
  }


?>