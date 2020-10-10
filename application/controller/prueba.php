<?php 
/**
 * 
 */
class Prueba extends Controller
{
	
 public function index(){
        session_start();
        
        $login= $this->loadController('login');
        $optionsmodel =$this->loadModel('OptionsModel');
        $login_model = $this->loadModel('LoginModel');

       
if($login->isLoged()){
    require 'application/views/templates/head.php';
    require 'application/views/prueba/index.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }
 }


}



 ?>