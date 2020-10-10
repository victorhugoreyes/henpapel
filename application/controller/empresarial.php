<?php


class Empresarial extends Controller {
    
    public function index() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $options_model = $this->loadModel('OptionsModel');
        
        $models=$options_model->getBoxModels();

        if($login->isLoged()) {

            $rows=$options_model->archiemprCons();
      
          require 'application/views/templates/head.php';
          require 'application/views/templates/top_menu.php';
          require 'application/views/empresarial/index.php';
          require 'application/views/templates/footer.php';
        } else {

            header("Location:".URL.'login/');
        }

    }


    public function archivos() {

        session_start();

        $login= $this->loadController('login');

        $login_model = $this->loadModel('LoginModel');

        $options_model = $this->loadModel('OptionsModel');
        $models=$options_model->getBoxModels();

        if($login->isLoged()) {

          require 'application/views/templates/head.php';
          require 'application/views/templates/top_menu.php';
          require 'application/views/empresarial/uparchivo.php';
          require 'application/views/templates/footer.php';
        } else {

          header("Location:".URL.'login/');
        }
      }


    public function uploadFiles() {

        session_start();

        $login= $this->loadController('login');
        $login_model = $this->loadModel('LoginModel');

        $empresarial_model = $this->loadModel('EmpresarialModel');

        $session_messages = '';
        $filescharged     = '';

        if($login->isLoged()) {
  
            $store = $_SESSION['user']['id_tienda'];

            $target_dir = "public/uploads/empresariales/";

            $odt    = $_POST['odt'];
            $catego = (isset($_POST['catego']))? $_POST['catego']:'false';


            $user = $_SESSION['user']['id_usuario'];

            if (empty($_FILES["up-file"]["name"])) {
            
                $session_messages = '<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> No seleccionaste ningun archivo, no se guardo nada</p>
                    </div>';

                $_SESSION['notification'] = 'warning';

                $_SESSION['result'] = 'ERROR:';

                    header("Location:".URL.'empresarial/archivos');
            } else {

                foreach ($_FILES["up-file"]["name"] as $key => $file) {

                    $upfile = (isset($file))? "'" . str_replace(" ", "_", $file) . "'":null;

                    $target_file = $target_dir . basename(str_replace(" ", "_", $file));

                    $uploadOk = 1;
                    
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    
                    if($catego == 'false') {

                        $session_messages .= '<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> No seleccionaste una  <strong>categoria</strong>, no se guardo nada.</p>
                            </div>';

                        $uploadOk = 0;
                    }
                    
                    /*
                    if($imageFileType != "jpg"&&$imageFileType != "png"&&$imageFileType != "jpeg"&&$imageFileType != "pdf") {

                    $session_messages.='<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> El archivo <strong>'.$file.'</strong> es invalido, se ha omitido.</p>
                    </div>';

                    $uploadOk = 0;
                    } 
                    */

                    $filename = str_replace(" ", "_", $file);

                    if ($uploadOk == 0) {
                    
                        $_SESSION['notification'] = 'fail';
                        $_SESSION['result']       = 'ERROR:';

                        header("Location:".URL.'empresarial/archivos');
                    } else {


                        if (file_exists($target_file)) {

                            $uploaded = true;
                        } else {

                            $uploaded = move_uploaded_file($_FILES["up-file"]["tmp_name"][$key], $target_file);
                        }
                    

                        if ($uploaded) {

                            $inserted = $empresarial_model->saveFileInfo($odt,$catego,$filename);

                            if ($inserted) {
                                
                                $filescharged .= " " . basename($file) . "</span>,"; 

                                $session_messages .= '<div class="notification success" style=""><div></div><p><span>LISTO:</span> El archivo <strong>"'.basename($file).'"</strong></span> se ha cargado correctamente.</p></div>';

                                $_SESSION['notification'] = 'success';
                                $_SESSION['result']       = 'LISTO:';
                                
                                header("Location:".URL.'empresarial/archivos');
                            } else {

                                echo "Ocurrio un error a la hora de guardar.";
                            }
                        } else {

                            $_SESSION['messages'] = '<div class="notification fail" style=""><div></div><p><span>ERROR:</span> no fue posible subir los archivos</p></div>'; 
                        }
                    }
                }
            }

            $_SESSION['messages']=$session_messages;
        } else {

            header("Location:".URL.'login/');
        }
    }


    public function deleteArch() {

        $options_model = $this->loadModel('OptionsModel');
        $deleted       = $options_model->deleteAE($_POST['id']);

        if ($deleted) {

            $direc = $_POST['direc'];

            unlink('public/uploads/empresariales/'.$direc);

            echo "Correcto...";
        } else {

            echo "Error!";
        }
    }
}
