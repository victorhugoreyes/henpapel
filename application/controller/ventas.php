<?php


class Ventas extends Controller {
    
    public function index() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        if($login->isLoged()){
            
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/ventas/index.php';
            require 'application/views/templates/footer.php';
          
        }else{

            header("Location:".URL.'login/');
        }
    }


    public function listas() {

        session_start();
        
        $login       = $this->loadController('login');
        $login_model = $this->loadModel('LoginModel');

        if($login->isLoged()) {
    
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/ventas/uploads.php';
            require 'application/views/templates/footer.php';
  
        }else{

            header("Location:" . URL . 'login/');
        }
    }


    public function informacion() {

        session_start();
        
        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $page = (isset($_REQUEST['p'])?$_REQUEST['p'] : 0);
            
            // por qué 500?
            $limit = 500;

            if($page == '') {

                $page  = 1;
                $start = 0;
            } else {

                $start = $limit * ($page - 1);
            }

            $store = strtoupper($_SESSION['nom_tienda']);

            $query3 = "";
    
            $rows = $ventas_model->getInfoByStore($store,$start,$limit);
            $total = $ventas_model->getInfoNumRows();
            
            $num_page = ceil($total/$limit);
    
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/ventas/info.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function archivos() {
        
        session_start();
        
        $login       = $this->loadController('login');
        $login_model = $this->loadModel('LoginModel');

        if($login->isLoged()){
            
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/ventas/files.php';
            require 'application/views/templates/footer.php';
          
        }else{

            header("Location:" . URL . 'login/');
        }
    }


    public function cambios() {
        
        session_start();
        
        $login       = $this->loadController('login');
        $login_model = $this->loadModel('LoginModel');

        if($login->isLoged()) {
    
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/ventas/cambios.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function uploadFiles() {

        session_start();
        
        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        $session_messages = '';
        $filescharged     = '';

        if($login->isLoged()) {
    
            $store = $_SESSION['user']['id_tienda'];
            
            $target_dir = "public/uploads/archivos/";

            $odt = $_POST['odt'];
            $comments = (isset($_POST['comments']))? $_POST['comments']:'--';
            $idfact = (isset($_POST['idfact']))? $_POST['idfact'] : null;
            
            $fecha = date("d-m-Y");
            
            $user = $_SESSION['user']['id_usuario'];
            if (empty($_FILES["up-file"]["name"])) {

                $session_messages = '<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> No seleccionaste ningun archivo, no se guardo nada</p>
                </div>';
              
                $_SESSION['notification'] = 'warning';
                $_SESSION['result'] = 'ERROR:';
                
                 header("Location:" . URL . 'ventas/archivos/');
                
                //echo '<script> self.location.replace("index.php");</script>';
            } else {

                //print_r($_FILES);
                foreach ($_FILES["up-file"]["name"] as $key => $file) {
                
                    $upfile = (isset($file))? "'" . str_replace(" ","_",$file) . "'":null;
                    $target_file = $target_dir . basename(str_replace(" ","_",$file));

                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {

                        // $_SESSION['messages']=" Solo se permiten archivos pdf, jpg o png";
                    
                        $session_messages .= '<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> El archivo <strong>' . $file . '</strong> es invalido, se ha omitido.</p>
                        </div>';
                  
                        $uploadOk = 0;
                    }

                    if (file_exists($target_file)) {
                    
                        //$_SESSION['messages'].=" El archivo <span>".$file."</span> ya existe ";
                       $uploadOk = 0; 
                       $session_messages .= '<div class="notification fail" style=""><div></div><p><span>ERROR:</span> El archivo <span>"' . $file . '"</span> ya existe, se ha omitido. </p></div>';   
                    }

                    $filename = str_replace(" ","_",$file);
            

                    if ($uploadOk == 0) {
                
                        $_SESSION['notification'] = 'fail';
                    
                        $_SESSION['result'] = 'ERROR:';
                    
                        header("Location:" . URL . 'ventas/archivos/');
                    
                        // echo '<script> self.location.replace("index.php");</script>';
                    } else {
                
                        if (move_uploaded_file($_FILES["up-file"]["tmp_name"][$key], $target_file)) {
                    
                            $inserted = $ventas_model->saveFileInfo(strtoupper($odt),$comments,$filename);
                    
                            if ($inserted) {
                      
                                $filescharged .= " " . basename($file) . "</span>,"; 

                                //$_SESSION['messages']="El archivo".$filescharged."</span> se ha cargado correctamente.";

                                $session_messages .= '<div class="notification success" style=""><div></div><p><span>LISTO:</span> El archivo <strong>"' . basename($file) . '"</strong></span> se ha cargado correctamente.</p></div>';

                                $_SESSION['notification'] = 'success';
                                $_SESSION['result'] = 'LISTO:';
                            
                                header("Location:" . URL . 'ventas/archivos/');
                                //echo '<script> self.location.replace("index.php");</script>';
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


    public function saveCambio() {
    
        session_start();
        
        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        $session_messages = '';
        $filescharged = '';

        if($login->isLoged()) {
    
            $store = $_SESSION['user']['id_tienda'];
                
            $target_dir = "public/uploads/cambios/";

            $odt      = $_POST['odt'];
            $comments = (isset($_POST['comments']))? $_POST['comments']:'';
            $idfact   = (isset($_POST['idfact']))? $_POST['idfact'] : null;
            
            $fecha = date("d-m-Y");
            
            $razon         = $_POST['razon'];
            $modificaCosto = $_POST['radios'];

            $costoNuevo = (!empty($_POST['costo_nuevo']))?$_POST['costo_nuevo']:'0';

            $fecha_aut = (isset($_POST['fecha_aut']) && !empty($_POST['fecha_aut']))? "'" . $_POST['fecha_aut'] . "'":'NULL';

            $quien_aut = (isset($_POST['quien_aut']) && !empty($_POST['quien_aut']))? "'" . $_POST['quien_aut'] . "'":'NULL';

            $modelo = (isset($_POST['modelo']) && !empty($_POST['modelo']))? "'" . $_POST['modelo'] . "'":'NULL';

            $porqueno = (isset($_POST['porqueno']) && !empty($_POST['porqueno']))? "'" . $_POST['porqueno'] . "'":'NULL';

            $user = $_SESSION['user']['id_usuario'];

            if (empty($_FILES["up-file"]["name"])) {
                  
                $session_messages = '<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> No seleccionaste ningun archivo, no se guardo nada</p>
                  </div>';
                
                $_SESSION['notification'] = 'warning';
                $_SESSION['result']       = 'ERROR:';

                header("Location:" . URL . 'ventas/cambios/');
                    
                //echo '<script> self.location.replace("index.php");</script>';
            } elseif (!is_numeric($costoNuevo)) {
                   
                $session_messages = '<div class="notification fail" style=""><div></div><p><span>ERROR:</span> El costo nuevo que enviaste no es un numero</p>
                    </div>';
                  
                $_SESSION['notification'] = 'warning';
                $_SESSION['result']       = 'ERROR:';
                
                header("Location:" . URL . 'ventas/cambios/');
            } else {

                //print_r($_FILES);
                foreach ($_FILES["up-file"]["name"] as $key => $file) {
                    
                    $upfile = (isset($file))? "'" . str_replace(" ","_",$file) . "'":null;
                    $target_file = $target_dir . basename(str_replace(" ","_",$file));
                    $uploadOk = 1;

                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf") {
                   
                        // $_SESSION['messages']=" Solo se permiten archivos pdf, jpg o png";
                        $session_messages .= '<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> El archivo <strong>' . $file . '</strong> es invalido, se ha omitido.</p>
                        </div>';
                  
                        $uploadOk = 0;
                    }
                
                    if (file_exists($target_file)) {
                    
                        //$_SESSION['messages'].=" El archivo <span>".$file."</span> ya existe ";
                       
                        $uploadOk = 0; 
                        $session_messages .= '<div class="notification fail" style=""><div></div><p><span>ERROR:</span> El archivo <span>"' . $file . '"</span> ya existe, se ha omitido. </p></div>';   
                    }

                    $filename = str_replace(" ","_",$file);
                

                    if ($uploadOk == 0) {
                    
                        $_SESSION['notification'] = 'fail';
                        $_SESSION['result']       = 'ERROR:';
                        
                        header("Location:" . URL . 'ventas/cambios/');

                        // echo '<script> self.location.replace("index.php");</script>';
                    } else {
    
                        if (move_uploaded_file($_FILES["up-file"]["tmp_name"][$key], $target_file)) {
                        
                            $inserted = $ventas_model->saveCambio(strtoupper($odt),$razon,$comments,$modificaCosto,$costoNuevo,$filename,$fecha_aut,$quien_aut,$modelo,$porqueno);
                        
                            if ($inserted) {
    
                                $filescharged .= " " . basename($file) . "</span>,"; 

                                $session_messages .= '<div class="notification success" style=""><div></div><p><span>LISTO:</span> El archivo <strong>"'.basename($file) . '"</strong></span> se ha cargado correctamente.</p></div>';

                                $_SESSION['notification']='success';
                                $_SESSION['result']='LISTO:';
                          
                                header("Location:" . URL . 'ventas/cambios/');
                            } else {

                                echo "Ocurrio un error a la hora de guardar.";
                            }
                        } else {
                        
                            $_SESSION['messages']='<div class="notification fail" style=""><div></div><p><span>ERROR:</span> no fue posible subir los archivos</p></div>';
                        }
                    }
                }
            }

                $_SESSION['messages'] = $session_messages;
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function uploadList() {
        
        session_start();
        
        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $target_dir = "public/uploads/listas/";
            //print_r($_POST);
                
            $odt      = $_POST['odt'];
            $numlist  = $_POST['numlist'];
            $qty      = $_POST['qty'];
            $user     = $_SESSION['logged_in'];
            $comments = (isset($_POST['comments']))? $_POST['comments']:'--';
            $idfact   = (isset($_POST['idfact']))? $_POST['idfact'] : null;
            
            $fecha = date("d-m-Y");
                
            if (empty($_FILES["up-file"]["name"])) {
        
                $_SESSION['messages']     = " No seleccionaste un archivo";
                $_SESSION['notification'] = 'warning';
                $_SESSION['result']       = 'ERROR:';
                
                header("Location:" . URL . 'ventas/listas/');
                
                //echo '<script> self.location.replace("uploadList.php");</script>';
            } else {

                $upfile = (isset($_FILES["up-file"]["name"]))? "'" . str_replace(" ","_",$_FILES["up-file"]["name"]) . "'":null;

                $target_file = $target_dir . basename(str_replace(" ","_",$_FILES["up-file"]["name"]));

                $uploadOk = 1;

                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                /*
                if($imageFileType != "jpg"&&$imageFileType != "png") {
                    $_SESSION['messages']=" Solo se permiten archivos jpg o png";
                    $uploadOk = 0;
                } 
                */
                
                if (file_exists($target_file)) {
                
                    $_SESSION['messages'] .= " El archivo <span>" . $_FILES["up-file"]["name"] . "</span> ya existe ";
                       
                    $uploadOk = 0;    
                }

                $filename = str_replace(" ","_",$_FILES["up-file"]["name"]);

                if ($uploadOk == 0) {
                    
                    $_SESSION['notification'] = 'fail';
                    $_SESSION['result']       = 'ERROR:';
                    
                    header("Location:" . URL . 'ventas/listas/');
                    
                    //echo '<script> self.location.replace("uploadList.php");</script>';
                } else {

                    if (move_uploaded_file($_FILES["up-file"]["tmp_name"], $target_file)) {
                        
                        $query = "";
                        $inserted = $ventas_model->saveListInfo($odt,$comments,$filename,$numlist,$qty);
                        
                        if ($inserted) {
                        
                            $_SESSION['messages'] = "El archivo <span>". basename($_FILES["up-file"]["name"]) . "</span> se ha cargado correctamente.";
                          $_SESSION['notification'] = 'success';
                          $_SESSION['result'] = 'LISTO:';
                          
                          header("Location:" . URL . 'ventas/listas/');
                          
                          //echo '<script> self.location.replace("uploadList.php");</script>';
                        } else {

                            echo $query;
                        }
                    } else {
                        
                        echo "Ocurrio un error a la hora de subir.";
                    }
                }
            }
        } else {

            header("Location:".URL.'login/');
        }
    }


    public function productos() {
        
        session_start();
        
        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()){


    $page=(isset($_REQUEST['p'])?$_REQUEST['p'] : 0);
      $limit=500;
      if($page=='')
      {
       $page=1;
       $start=0;
      }
      else
      {
       $start=$limit*($page-1);
      }
     $store=strtoupper($_SESSION['nom_tienda']);

        $query3="";
    
        $rows=$ventas_model->getProductsByStore($start,$limit);
        $total=$ventas_model->getProductsNumRows();
        
        $num_page=ceil($total/$limit);




    
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/ventas/products.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }



    }

    public function invitaciones(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


    $page=(isset($_REQUEST['p'])?$_REQUEST['p'] : 0);
      $limit=500;
      if($page=='')
      {
       $page=1;
       $start=0;
      }
      else
      {
       $start=$limit*($page-1);
      }
     $store=strtoupper($_SESSION['nom_tienda']);

        $query3="";
    

        $rows=$ventas_model->getInvitations($start,$limit);
        $total=$ventas_model->getInvitNumRows();
        
        $num_page=ceil($total/$limit);




    
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/ventas/invitations.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }



    }


     public function archivos_cargados(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


    $page=(isset($_REQUEST['p'])?$_REQUEST['p'] : 0);
      $limit=500;
      if($page=='')
      {
       $page=1;
       $start=0;
      }
      else
      {
       $start=$limit*($page-1);
      }
     $store=strtoupper($_SESSION['nom_tienda']);

        $query3="";
    

        $rows=$ventas_model->getFiles($start,$limit);
        $total=$ventas_model->getFilesNumRows();
        
        $num_page=ceil($total/$limit);

   
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/ventas/uploaded_files.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }



    }


    public function pagesSearch(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


   
    

        $rows=$ventas_model->getFilesByParam($_POST['param']);
        $html='';
       foreach ($rows as $row) {
                        
 
                        $html.='<tr><td >'.$row['ODT'].'</td>';
                       $html.='<td >'.$row['Cliente'].'</td>';                        
                        $html.='<td><a class="download-file" href="'.URL.'public/uploads/archivos/'.str_replace(" ","%20",$row['archivo']).'" target="blank">Descargar</a> </td></tr>';
                        
                        
                        
  
  
    }
        
echo $html;
  
    }else{

        header("Location:".URL.'login/');

    }



    }


    public function invitSearch(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


   
    

        $rows=$ventas_model->getInvitByParam($_POST['param']);
        
       foreach ($rows as $row) {
                        ?>
  <tr>
    <td><?php echo $row['TipoProd'];?></td>
                        <td > <?php echo $row['Modelo'];?></td>
                        <td >    <?php echo $row['Descripcion'];?>      </td>
                        
                        <td >    <?php echo round($row['P100'],2);?>  </td>
                        <td >    <?php echo round($row['U100'],2);?>   </td>
                        
                        <td >    <?php echo round($row['P200'],2);?> </td>
                        <td >    <?php echo round($row['U200'],2);?> </td>
                        <td >    <?php echo round($row['P300'],2);?> </td>
                        <td >    <?php echo round($row['U300'],2);?> </td>
                        <td >    <?php echo round($row['P400'],2);?> </td>
                        <td >
                        <?=round($row['U400'],2) ?> </td>
                        <td >
                        <?=round($row['P500'],2) ?>    </td>
                        
                        <td >    <?php echo round($row['U500'],2);?> </td>
  </tr>
  <?php 
    }
        

  
    }else{

        header("Location:".URL.'login/');

    }



    }

    public function cambiosSearch(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


   
    

        $rows=$ventas_model->getCambiosByParam($_POST['param'],$_POST['filter']);
        
       foreach ($rows as $row) {
                        ?>
  <tr>
    
                        <td > <?= $row['odt'];?></td>
                        <td >    <?= $row['modelo'];?>      </td>
                        <td >    <?= $row['razon'];?>      </td>
                        
                        <td >    <?= $row['observaciones'].' '.$row['porque_no_es_posible'];?> </td>
                        <td >    <?=($row['modifica_costo']=='SI')? '$'.$row['costo_nuevo']:'N/A';?>   </td>
                        <td >    <?=(!empty($row['quien_autorizo']))? $row['quien_autorizo']:'N/A';?> </td>
                        <td >    <?=(!empty($row['fecha_autorizacion']))? $row['fecha_autorizacion']:'N/A';?> </td>
                        
                        <td >    <?= $row['hora'];?> </td>
                        <td >    <?= $row['fecha'];?> </td>
                        <td >    <?= $row['nombre_usuario'];?> </td>
                        <td >    <?=strtoupper($row['tienda']);?> </td>
                        
                        <td>
                        <?php if (!empty($row['archivo'])) { ?>
                        <a href="<?=URL ?>public/uploads/cambios/<?=$row['archivo'] ?>" target="_blank" class="download-file">Ver</a>
                        <?php }else{ ?>
                        --
                        <?php }?>
                         </td> 
                          <?php if ($_SESSION['user']['cambios_admin']=='true'&&$_POST['filter']=='Pendientes') { ?>
                           <td><div data-id="<?= $row['id_cambio'];?>" class="cambio-chekc">Completar</div></td>
                          <?php } ?>
  </tr>
  <?php 
    }
        

  
    }else{

        header("Location:".URL.'login/');

    }



    }

    public function infoSearch(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


   
    

        $rows=$ventas_model->getInfoByParam($_POST['param'],$_SESSION['nom_tienda']);
        
       foreach ($rows as $row) {
                        ?>
  <tr>
                        <td><?=$row['IdPedido'] ?></td>
                        <td > <?= $row['NodeOrden'];?></td>
                        <td >    <?= $row['FechaPedido'];?>      </td>
                        
                        <td >    <?=$row['ClaveCliente']; ?>  </td>
                        <td >    <?=$row['VentaTotal']; ?>   </td>
                        
                        <td >    <?= $row['PagosTotales'];?> </td>
                        <td >    <?= $row['ImporteDebido'];?> </td>
                        <td >  <?= $row['Tipo'];?> </td>
                        <td >  <?= $row['Estado'];?></td>
                        <td >  <?= $row['FechaEntregaCliente'];?></td>
                        <td > <img class="palomitas" src="<?=($row['Autorizado']=='FALSO')? URL.'public/img/off.png':URL.'public/img/on.png' ;?>"></td>
                        <td ><img class="palomitas" src="<?=($row['EntregasProduccion']=='FALSO')? URL.'public/img/off.png':URL.'public/img/on.png' ;?>"></td>
                        
                        <td ><?=$row['Tienda']; ?></td>
  </tr>
  <?php 
    }
        

  
    }else{

        header("Location:".URL.'login/');

    }



    }


 public function productSearch(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){


   
    

        $rows=$ventas_model->getProductsByParam($_POST['param']);
        
       foreach ($rows as $row) {
                        ?>
  <tr>
    
                        <td > <?php echo $row['TipoProd'];?></td>
                        <td >    <?php echo $row['Modelo'];?>      </td>
                        
                        <td >    <?php echo $row['Descripcion'];?>  </td>
                        <td >    <?php echo round($row['PrecioUnit'],2);?>   </td>
                        
                        
  </tr>
  <?php 
    }
        

  
    }else{

        header("Location:".URL.'login/');

    }



    }



     public function newProduct(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        if($login->isLoged()){
    
            $target_dir = "../product_photos/";
                  //print_r($_POST);

                require("../conexion/conexion.php");
                $sku=$_POST['sku'];
                $description=(isset($_POST['description']))? $_POST['description']:'--';
                $price=(isset($_POST['price']))? $_POST['price'] : 'null';
                $category=(isset($_POST['category']))? $_POST['category'] : 'null';
                $stock=(isset($_POST['stock']))? $_POST['stock'] : 'null';
                 //print_r($_FILES);
                 if (empty($_FILES)) {
                  $query="INSERT INTO productos (id_producto, id_categoria, clave,descripcion,precio,inventario, imagen) VALUES (NULL,$category,'$sku','$description','$price','$stock',NULL)";
                        $inserted=$mysqli->query($query);
                         $prod=$mysqli->insert_id;
                         $mysqli->query("INSERT INTO stocks(id_stock, id_almacen,id_producto,stock) VALUES(NULL,1,$prod,$stock)");
                        if ($inserted) {
                          
                          //$_SESSION['messages']="El archivo".$filescharged."</span> se ha cargado correctamente.";

                          $_SESSION['messages'].='<div class="notification success" style=""><div></div><p><span>LISTO:</span> Se agrego el producto <strong>"'.$sku.'"</strong></span> sin imagen.</p></div>';

                          $_SESSION['notification']='success';
                          $_SESSION['result']='LISTO:';
                          //header("Location: newProduct.php");
                          echo '<script> self.location.replace("newProduct.php");</script>';
                        }else{
                          printf($mysqli->error);
                        }



                 }else{

                $file=$_FILES["up-file"]["name"];
                    
                $upfile=(isset($file))? "'".str_replace(" ","_",$file)."'":null;
                $target_file = $target_dir . basename(str_replace(" ","_",$file));
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                if($imageFileType != "jpg"&&$imageFileType != "png"&&$imageFileType != "jpeg"&&$imageFileType != "pdf") {
                   // $_SESSION['messages']=" Solo se permiten archivos pdf, jpg o png";
                    $_SESSION['messages'].='<div class="notification warning" style=""><div></div><p><span>PROBLEMAS:</span> El archivo <strong>'.$file.'</strong> es invalido</p>
                  </div>';
                  
                    $uploadOk = 0;
                }
                if (file_exists($target_file)) {
                    //$_SESSION['messages'].=" El archivo <span>".$file."</span> ya existe ";
                       $uploadOk = 0; 
                       $_SESSION['messages'].='<div class="notification fail" style=""><div></div><p><span>ERROR:</span> El archivo <span>"'.$file.'"</span> ya existe </p></div>';   
                }

                $filename='product_photos/'.str_replace(" ","_",$file);

                if ($uploadOk == 0) {
                    $_SESSION['notification']='fail';
                          $_SESSION['result']='ERROR:';
                          //header("Location: newProduct.php");
                          echo '<script> self.location.replace("newProduct.php");</script>';
                    

                } else {
                    if (move_uploaded_file($_FILES["up-file"]["tmp_name"], $target_file)) {
                        $query="INSERT INTO productos (id_producto, id_categoria, clave,descripcion,precio,inventario, imagen) VALUES (NULL,$category,'$sku','$description','$price','$stock','$filename')";
                        $inserted=$mysqli->query($query);
                         $prod=$mysqli->insert_id;
                         $mysqli->query("INSERT INTO stocks(id_stock, id_almacen,id_producto,stock) VALUES(NULL,1,$prod,$stock)");
                        if ($inserted) {
                          $filescharged.=" ".basename($file)."</span>,"; 
                          //$_SESSION['messages']="El archivo".$filescharged."</span> se ha cargado correctamente.";

                          $_SESSION['messages'].='<div class="notification success" style=""><div></div><p><span>LISTO:</span> El producto <strong>"'.$sku.'"</strong></span> se ha agregado correctamente con su imagen.</p></div>';

                          $_SESSION['notification']='success';
                          $_SESSION['result']='LISTO:';
                          //header("Location: newProduct.php");
                          echo '<script> self.location.replace("newProduct.php");</script>';
                        }else{
                          printf($mysqli->error);
                        }
                    } else {
                        echo "Ocurrio un error a la hora de subir.";
                    }
}


}

    }else{

        header("Location:".URL.'login/');

    }



    }

    
public function cambios_pendientes(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');
         $ventas_model = $this->loadModel('VentasModel');
if($login->isLoged()){
  $title='Pendientes';
    $rows=$ventas_model->getPendingCambios(); 
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/ventas/admin_cambios.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }



    }

public function completeCambio(){
        session_start();
        error_reporting(0);
        $login= $this->loadController('login');
        $response=array();
        $login_model = $this->loadModel('LoginModel');
         $ventas_model = $this->loadModel('VentasModel');
if($login->isLoged()){
  $response['logged']='true';
  $completed=$ventas_model->completeCambio($_POST);
  if ($completed) {
    $response['result']='<div class="c-successs"><div></div><span>Exito: </span>Cambio completado!</div>';
    $rest=$login_model->getPendingCambios();
    $response['restantes']=$rest;
    $_SESSION['cambios_pendientes']=$rest;
     $rows=$ventas_model->getPendingCambios(); 
      $table='';  
       foreach ($rows as $row) {
                      
  $table.="<tr><td >".$row['odt']."</td><td> ".$row['modelo']."</td>";
  $table.="<td>".$row['razon']."</td>;";
  $table.="<td>".$row['observaciones'].' '.$row['porque_no_es_posible']."</td>";
  $table.="<td>".(($row['modifica_costo']=='SI')? '$'.$row['costo_nuevo']:'N/A')."</td>";
  $table.="<td> ".((!empty($row['quien_autorizo']))? $row['quien_autorizo']:'N/A')." </td>";
  $table.="<td> ".((!empty($row['fecha_autorizacion']))? $row['fecha_autorizacion']:'N/A')."</td>";
                        
  $table.="<td>".$row['hora']." </td>";
  $table.="<td>".$row['fecha']." </td>";
  $table.="<td>".$row['nombre_usuario']." </td>";
  $table.="<td>".strtoupper($row['tienda'])." </td><td>";
  if (!empty($row['archivo'])) { 
  $table.="<a href=".URL."public/uploads/cambios/".$row['archivo']." target='_blank' class='download-file'>Ver</a>";
  }else{ 
                        $table.='--';
                         }
                         $table.="</td>";
                         $table.="<td><textarea id='area-".$row['id_cambio']."' placeholder='Agrega una observacion..'></textarea></td>";
                         $table.="<td><div class='cambio-chekc' data-id='".$row['id_cambio']."'>Completar</div></td></tr>";
  
    }

$response['html']=$table;

  }else{
    $response['result']='<div class="c-fail"><div></div><span>Error: </span>No se pudo marcar el cambio</div>';

  }
  
  
    }else{

       $response['logged']='false';

    }

echo json_encode($response);

    }
    public function cambios_completados(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');
         $ventas_model = $this->loadModel('VentasModel');
if($login->isLoged()){
   $title='Realizados';
    $rows=$ventas_model->getCompletedCambios(); 
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/ventas/admin_cambios.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }



    }

    public function solicitud_facturas(){

        session_start();
        
        $login= $this->loadController('login');
        
        //$login_model = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');
        if($login->isLoged()){

            $facturas = $ventas_model->getFacturas();
            $clientes = $ventas_model->getClients();

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/facturas/solicitud_facturas.php';
            require 'application/views/templates/footer.php';
        }else{

            header("Location:".URL.'login/');
        }
    }

    public function newFactura(){

        session_start();
        
        $login         = $this->loadController('login');
        $options_model = $this->loadModel('optionsmodel');
        $ventas_model  = $this->loadModel('VentasModel');

        $idCliente  = $_GET['cliente'];
        $cliente    = $ventas_model->getClientById($idCliente);
        $porcentaje = $options_model->getPorcentajes();
        $cfdi       = $ventas_model->getCfdi();
        $formaPago  = $ventas_model->getFormaPago();
        $metodoPago = $ventas_model->getMetodoPago();
        $catalogo = $ventas_model->getCatServicios();

        if($login->isLoged()){

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/facturas/nva_factura.php';
            require 'application/views/templates/footer.php';
        }
        
    }

    public function uploadFileFactura(){

        $ventas_model       = $this->loadModel('VentasModel');
        $envio              = $ventas_model->uploadDatos();
        $result             = false;
        if( $envio )$result = true;

        echo json_encode($result);
    }

    public function uploadFacturas(){

        $ventas_model        = $this->loadModel('VentasModel');
        $upload              = $ventas_model->uploadFacturas();
        $result              = false;
        if( $upload )$result = true;

        echo json_encode($result);
    }

    public function getFacturasByFactura(){

        $ventas_model  = $this->loadModel('VentasModel');
        $result = $ventas_model->getFacturasByFactura();
        echo json_encode($result);
    }
}
