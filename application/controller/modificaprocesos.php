<?php
 class modificaProcesos extends Controller{

    public function index() {

        if (!isset($_SESSION)) session_start();
        
        $login= $this->loadController('login');

        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model = $this->loadModel('LoginModel');
       
        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/velada/index.php';
            require 'application/views/templates/footer.php';

        } else {

            echo 'window.location="' . URL . 'login/";';
        }
    }
    
 	public function cambioProcesos() {

        if (!isset($_SESSION)) session_start();
        
        $login               = $this->loadController('login');
        $optionsmodel        = $this->loadModel('OptionsModel');
        $login_model         = $this->loadModel('LoginModel');
        $procesosOffset      = $optionsmodel->getProcOffset(); 
        $procesosSerigrafia  = $optionsmodel->getProcSerigrafia();
        $procesosDigital     = $optionsmodel->getProcDigital();
        $procesosLaminado    = $optionsmodel->getProcLaminado();
        $procesosHotStamping = $optionsmodel->getProcHotStamping();
        $procesosGrabado     = $optionsmodel->getProcGrabado();
        $procesosSuaje       = $optionsmodel->getProcSuaje();
        $procesosLaser       = $optionsmodel->getProcLaser();
        $i=1;
        $j=1;
        $k=1;
        $l=1;
        foreach ($procesosOffset as $offset) {
            $nombre=$offset['nombre'];
            if(isset($offset['tiraje_minimo'])){
                if($nombre=='Arreglo'){
                    $procesosOffset["$nombre"]=$offset;
                }else{
                    if($i>=4){$i=1;}
                    $procesosOffset["$nombre".$i++]=$offset;
                }
            }else{
                $procesosOffset["$nombre"]=$offset;
            }
        }
        foreach ($procesosSerigrafia as $serigrafia) {
            $nombre=$serigrafia['nombre'];
            if(isset($serigrafia['tiraje_minimo'])){
                if($j>=5){$j=1;}
                $procesosSerigrafia["$nombre".$j++]=$serigrafia;
                
            }else{
                $procesosSerigrafia["$nombre"]=$serigrafia;
            }
        }


        $carta = $procesosDigital['carta'];
        $dobleCarta = $procesosDigital['dobleCarta'];
        $digital = array();
        unset($procesosDigital);

        self::pDigital($carta, $digital, "Frente Carta", "Vuelta Carta");
        self::pDigital($dobleCarta, $digital, "Frente Doble Carta", "Vuelta Doble Carta");

        foreach ($procesosLaminado as $laminado) {
            $nombre=$laminado['nombre'];
            $procesosLaminado["$nombre"]=$laminado;
        }
        foreach ($procesosLaser as $laser) {
            $nombre=$laser['nombre'];
            $procesosLaser["$nombre"]=$laser;
        }
        foreach ($procesosSuaje as $suaje) {
            $nombre=$suaje['nombre'];
            $procesosSuaje["$nombre"]=$suaje;
        }
        foreach ($procesosHotStamping as $stamping) {
            $nombre=$stamping['nombre'];
            if(isset($stamping['tiraje_minimo'])){
                if($l>=4){$l=1;}
                $procesosHotStamping["$nombre".$l++]=$stamping;
            }else{
                $procesosHotStamping["$nombre"]=$stamping;
            }
        }
        foreach ($procesosGrabado as $grabado) {
            $nombre=$grabado['nombre'];
            if(isset($grabado['tiraje_minimo'])){
                if($l>=4){$l=1;}
                $procesosGrabado["$nombre".$l++]=$grabado;
            }else{
                $procesosGrabado["$nombre"]=$grabado;
            }
        }
        if($login->isLoged()) {
            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/costoprocesos/costo_procesos.php';
            require 'application/views/templates/footer.php';

        } else {

            echo 'window.location="' . URL . 'login/";';
        }
    }

    public function pDigital($arrD, &$arrO, $texto1, $texto2){

        $i = 1;
        $k = 1;
        foreach ($arrD as $datos) {
            
            if($datos['nombre'] == $texto1){

                $arrO[$texto1][$i++] = $datos;
            }else{

                $arrO[$texto2][$k++] = $datos;
            }

        }
    }

    public function imprProcesos() {

        if (!isset($_SESSION)) session_start();
        $login        = $this->loadController('login');
        $optionsmodel = $this->loadModel('OptionsModel');
        $login_model  = $this->loadModel('LoginModel');
        $procesosOffset      = $optionsmodel->getProcOffset(); 
        $procesosSerigrafia  = $optionsmodel->getProcSerigrafia();
        $procesosDigital     = $optionsmodel->getProcDigital();
        $procesosLaminado    = $optionsmodel->getProcLaminado();
        $procesosHotStamping = $optionsmodel->getProcHotStamping();
        $procesosGrabado     = $optionsmodel->getProcGrabado();
        $procesosSuaje       = $optionsmodel->getProcSuaje();
        $procesosLaser       = $optionsmodel->getProcLaser();
        $i=1;
        $j=1;
        $k=1;
        $l=1;
        foreach ($procesosOffset as $offset) {
            $nombre=$offset['nombre'];
            if(isset($offset['tiraje_minimo'])){
                if($nombre=='Arreglo'){
                    $procesosOffset["$nombre"]=$offset;
                }else{
                    if($i>=4){$i=1;}
                    $procesosOffset["$nombre".$i++]=$offset;
                }
            }else{
                $procesosOffset["$nombre"]=$offset;
            }
        }
        foreach ($procesosSerigrafia as $serigrafia) {
            $nombre=$serigrafia['nombre'];
            if(isset($serigrafia['tiraje_minimo'])){
                if($j>=5){$j=1;}
                $procesosSerigrafia["$nombre".$j++]=$serigrafia;
                
            }else{
                $procesosSerigrafia["$nombre"]=$serigrafia;
            }
        }

        $carta = $procesosDigital['carta'];
        $dobleCarta = $procesosDigital['dobleCarta'];
        unset($procesosDigital);
        $digital = array();
        self::pDigital($carta, $digital, "Frente Carta", "Vuelta Carta");
        self::pDigital($dobleCarta, $digital, "Frente Doble Carta", "Vuelta Doble Carta");

        foreach ($procesosLaminado as $laminado) {
            $nombre=$laminado['nombre'];
            $procesosLaminado["$nombre"]=$laminado;
        }
        foreach ($procesosLaser as $laser) {
            $nombre=$laser['nombre'];
            $procesosLaser["$nombre"]=$laser;
        }
        foreach ($procesosSuaje as $suaje) {
            $nombre=$suaje['nombre'];
            $procesosSuaje["$nombre"]=$suaje;
        }
        foreach ($procesosHotStamping as $stamping) {
            $nombre=$stamping['nombre'];
            if(isset($stamping['tiraje_minimo'])){
                if($l>=4){$l=1;}
                $procesosHotStamping["$nombre".$l++]=$stamping;
            }else{
                $procesosHotStamping["$nombre"]=$stamping;
            }
        }
        foreach ($procesosGrabado as $grabado) {
            $nombre=$grabado['nombre'];
            if(isset($grabado['tiraje_minimo'])){
                if($l>=4){$l=1;}
                $procesosGrabado["$nombre".$l++]=$grabado;
            }else{
                $procesosGrabado["$nombre"]=$grabado;
            }
        }
   
        if($login->isLoged()) {
            require 'application/views/templates/head.php';
            require 'application/views/costoprocesos/impresion_procesos.php';
            require 'application/views/templates/footer.php';

        } else {

            echo 'window.location="' . URL . 'login/";';
        }
    }


    public function updateProcOff() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->UpdateProcOff($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/;"';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcSer() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->UpdateProcSer($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcDig() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->UpdateProcDig($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcCor() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->updateProcCor($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcLam() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->updateProcLam($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcHotStam() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->updateProcHotStam($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcGra() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->updateProcGra($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
            } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcCorLas() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->updateProcCorLas($_POST);

        if ($update) {
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }

    public function updateProcSua() {

        $optionsModel = $this->loadModel('OptionsModel');
        $update       = $optionsModel->updateProcSua($_POST);

        if ($update) {
            
            echo '<script language="javascript">';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
            //header("Location:" . URL . "modificaprocesos/cambioProcesos/");
        } else {

            echo '<script language="javascript">';
            echo 'alert("No se pudo procesar modificacion");';
            echo 'window.location="' . URL . 'modificaprocesos/cambioProcesos/";';
            echo '</script>';
        }
    }
 }
?>