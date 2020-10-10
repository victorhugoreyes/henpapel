<?php

class Recibos extends Controller
{
    
 public function index(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

       
if($login->isLoged()){
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/recibos/altas.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }
 }


 public function detallesRecibo() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

        $row = $ventas_model->getAddTicket($_GET['id_boleta']);


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/addticket.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }

    public function facturacion() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/facturarcheck.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }

    public function facturar() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');


        if($login->isLoged()) {

          $inserted = $ventas_model->getFacturar($_POST['factura'],$_POST['total'],$_POST['porvalidar'], $_POST['totalrecibos']);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/facturadas.php';
            require 'application/views/templates/footer.php';
        
        } else {

            header("Location:" . URL . 'login/');
        }
    }

 public function uploadFiles(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

        $store=$_SESSION['user']['id_tienda'];

        $id_boleta = "";

        $id_boleta=$_POST['id_boleta'];

        $inserted=$ventas_model->getUpdatetoRevisado($id_boleta);

        if($login->isLoged()){

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/altas.php';
            require 'application/views/templates/footer.php';
                
  
    }else{

        header("Location:".URL.'login/');

    }

    }


    public function altas(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){
        
    
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/recibos/altas.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }
 }

 public function revisadas(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){
        
    
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/recibos/revisadas.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }
 }
 public function facturadas(){
        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

if($login->isLoged()){
        
    
    require 'application/views/templates/head.php';
    require 'application/views/templates/top_menu.php';
    require 'application/views/recibos/facturadas.php';
    require 'application/views/templates/footer.php';
  
    }else{

        header("Location:".URL.'login/');

    }
 }

 public function factura() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

        $row = $ventas_model->getDetallesFactura($_GET['factura']);


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/factura.php';
            require 'application/views/templates/footer.php';
        
        } else {

            header("Location:" . URL . 'login/');
        }
    }

     public function BuscarFechas() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

        $row = $ventas_model->getFiles5();


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/facturarCheck.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }


public function detallesFactura() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

        $row = $ventas_model->getFacturaModificar($_GET['factura']);


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/modificarfactura.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }

public function actualizarFactura() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');


        if($login->isLoged()) {

          $inserted = $ventas_model->getActualizaFactura();

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/facturadas.php';
            require 'application/views/templates/footer.php';
        
        } else {

            header("Location:" . URL . 'login/');
        }
    }

    public function eliminarElemento() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');

        $row = $ventas_model->getModFacElement($_GET['id_boleta'], $_GET['factura']);


        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/modfactura1.php';
            require 'application/views/templates/footer.php';

        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function eliminarBFac() {

        session_start();
        
        $login= $this->loadController('login');
        
        $login_model = $this->loadModel('LoginModel');

        $ventas_model = $this->loadModel('VentasModel');


        if($login->isLoged()) {

          $inserted = $ventas_model->getFacturaMod2();
          $inserted2 = $ventas_model->getFacturaMod3();

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/recibos/facturadas.php';
            require 'application/views/templates/footer.php';
        
        } else {

            header("Location:" . URL . 'login/');
        }
    }
}



?>