<?php


class Controller {

    public $db = null;

    function __construct() {

        $this->openDatabaseConnection();
    }


    private function openDatabaseConnection() {

        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");

        try {

            $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);

        } catch (PDOException $e) {

            print "ERROR de conexion PDO: " . $e->getMessage() . "<br/>";

            exit();
        }
    }


    public function loadModel($model_name) {

        require_once 'application/models/' . strtolower($model_name) . '.php';

        $temp = "";

        $temp = 'application/models/' . strtolower($model_name) . '.php';

        return new $model_name($this->db);
    }


    public function loadController($controller_name) {

        require_once 'application/controller/' . strtolower($controller_name) . '.php';

        return new $controller_name();
    }


    public function mError(&$aJson, $mensaje, $error) {

        $aJson["mensaje"] = strval($mensaje);
        $aJson["error"]   = $aJson["error"] . strval($error);

        return $aJson;
    }


    public function admin() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $options_model = $this->loadModel('OptionsModel');

        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/cajas/admin.php';
        require 'application/views/templates/footer.php';
    }


    public function getClient($opt) {

        $nombrecliente = '--';

        if (isset($_GET['cliente'])) {

            $nombrecliente = $opt->getClientInfo($_GET['cliente'],'nombre');
            //$nombrecliente = $opt->getClientInfo($_GET['cliente'],'nombre') . ' ' . $opt->getClientInfo($_GET['cliente'],'apellido');
        }

        return $nombrecliente;
    }


    public function getCotizacionesByCliente() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login         = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            if (isset($_GET['c'])) {

                $rows = $ventas_model->getCotizacionByClient($_GET['c']);

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/cotizador/cotizaciones.php';
                require 'application/views/templates/footer.php';
            } else {

                echo '<script language="javascript">';
                echo 'window.location.href="' . URL . 'cotizador/clientes/"';
                echo '</script>';
                //header("Location:" . URL . 'cotizador/clientes/');
            }
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function getCotizaciones() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $cotizaciones = $ventas_model->getCotizaciones();
            $clientes     = $ventas_model->getClients();


            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/listaCotizaciones.php';
            require 'application/views/templates/footer.php';
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    // carga los modelos necesarios del modelo cajas
    public function cajas() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');


        if(!$login->isLoged()) {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }


        $procesos   = $options_model->getProcessCatalog();
        $papers     = $options_model->getPapers();
        $cartones   = $options_model->getCartones();

        $cierres           = $options_model->getCostoCierre();
        $acabados          = $options_model->getCostoAcabados();
        $accesorios        = $options_model->getCostoAccesorios();
        $descuentos        = $options_model->getCostoDescuentos();
        $bancos            = $options_model->getCostoBancos();
        $impresiones       = $options_model->getImpresiones();
        $Digital           = $options_model->getProcDigital();
        $ALaminados        = $options_model->getALaminados();
        $AHotStamping      = $options_model->getAHotStamping();
        $Colores           = $options_model->getAHotStampingColor();
        $AGrabados         = $options_model->getAGrabados();
        $APEspeciales      = $options_model->getAPEspeciales();
        $ABarnizUV         = $options_model->getABarnizUV();
        $ASuaje            = $options_model->getASuaje();
        $ALaser            = $options_model->getALaser();
        $TipoImp           = $options_model->getTipoSerigrafia();
        $modeloscaj        = $options_model->getBoxModels();
        $TipoListon        = $options_model->getTipoListon();
        $ColoresListon     = $options_model->getColoresListon();
        $Porcentajes       = $options_model->getPorcentajes();
        $Herrajes          = $options_model->getHerraje();
        if (isset($_GET['cliente'])) {

            $nombre_cliente = $options_model->getClientInfo($_GET['cliente'],'nombre');
            //$apell_cliente  = $options_model->getClientInfo($_GET['cliente'],'apellido');
            $nombrecliente  = utf8_encode($nombre_cliente);
            //$nombrecliente  = utf8_encode($nombre_cliente) . " " . utf8_encode($apell_cliente);

        } else {

            $nombrecliente = '--';
        }

        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/cotizador/cajas.php';
        require 'application/views/templates/footer.php';
    }


    public function sumArrayDato($aArray, $seccion, $dato) {

        $suma = 0;

        if (array_key_exists($seccion, $aArray)) {

            $suma = round(floatval(array_sum(array_column($aArray[$seccion], $dato))), 2);
        }

        return $suma;
    }


    protected function findKeyInArray($array, $keySearch) {

        foreach ($array as $key => $item) {

            if ($key == $keySearch) {

                //echo 'Si existe';

                return true;
            } elseif (is_array($item) && $this->findKeyInArray($item, $keySearch)) {

                return true;
            }
        }
        return false;
    }


    public function prettyPrint($aArray, $texto = null, $num_linea = null) {

        echo PHP_EOL;

        if ($texto == null and $num_linea == null) {

            echo '<pre>' . print_r($aArray, true) . '</pre>';
        } elseif($num_linea == null) {

            echo '<pre>' . $texto . ": " . print_r($aArray, true) . '</pre>';
        } else {

            echo '<pre>(' . $num_linea . ") " . $texto . ": " . print_r($aArray, $return = TRUE) . '</pre>';
        }
    }


    public function checaTablaExiste($tableName) {

        $tableName = preg_replace('/[^\da-z_]/i', '', $tableName);

        $sql = "SHOW TABLES LIKE '$tableName'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $tableExists = $query !== false && $query->rowCount() > 0;

        return $tableExists;
    }


    public function checaAnchoLargo($ancho, $largo) {

        if ($largo > $ancho) {

            return true;
        } elseif($ancho > $largo) {

            return false;
        } else {

            return true;
        }
    }


    public function checaCostos($aArray, $seccion) {

        $checa_ok = true;

        switch ($seccion) {
            case 'Offset':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['corte_costo_unitario'] <= 0
                 or $aArray['corte_por_millar'] <= 0
                 or $aArray['costo_corte'] <= 0
                 or $aArray['costo_unitario_laminas'] <= 0
                 or $aArray['costo_tot_laminas'] <= 0
                 or $aArray['costo_unitario_arreglo'] <= 0
                 or $aArray['costo_tot_arreglo'] <= 0
                 or $aArray['costo_unitario_tiro'] <= 0
                 or $aArray['costo_tiro'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Offset_Maquila':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['arreglo_costo_unitario'] <= 0
                 or $aArray['arreglo_costo'] <= 0
                 or $aArray['costo_unitario_laminas'] <= 0
                 or $aArray['costo_laminas'] <= 0
                 or $aArray['costo_unitario_maq'] <= 0
                 or $aArray['costo_tot_maq'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Digital':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['costo_unitario'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Serigrafia':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['costo_unit_arreglo'] <= 0
                 or $aArray['costo_arreglo'] <= 0
                 or $aArray['costo_unitario_tiro'] <= 0
                 or $aArray['costo_tiro'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Barniz':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['costo_unitario'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Laser':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['costo_unitario'] <= 0
                 or $aArray['tiempo_requerido'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Grabado':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['placa_costo_unitario'] <= 0
                 or $aArray['placa_costo'] <= 0
                 or $aArray['arreglo_costo_unitario'] <= 0
                 or $aArray['arreglo_costo'] <= 0
                 or $aArray['costo_unitario'] <= 0
                 or $aArray['costo_tiro'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'HotStamping':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['placa_costo_unitario'] <= 0
                 or $aArray['placa_costo'] <= 0
                 or $aArray['pelicula_costo_unitario'] <= 0
                 or $aArray['pelicula_costo'] <= 0
                 or $aArray['arreglo_costo_unitario'] <= 0
                 or $aArray['arreglo_costo'] <= 0
                 or $aArray['costo_unitario'] <= 0
                 or $aArray['costo_tiro'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Laminado':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['costo_unitario'] <= 0) {

                    $checa_ok = false;
                }

                break;

            case 'Suaje':

                if ($aArray['costo_tot_proceso'] <= 0
                 or $aArray['arreglo'] <= 0
                 or $aArray['tiro_costo_unitario'] <= 0
                 or $aArray['costo_tiro'] <= 0) {

                    $checa_ok = false;
                }

                break;
        }

        return $checa_ok;
    }


    // calculo del corte de papel y/o carton
    public function getPapelCarton($seccion, $id_papel, $options_model) {

        $nombre_papel     = "";
        $ancho_papel      = 0;
        $largo_papel      = 0;
        $costo_unit_papel = 0;

        $seccion = trim(strval($seccion));

        $l_carton = false;

        switch ($seccion) {
            case 'grosor_carton':

                $row  = $options_model->getMaxCostoCartonId($id_papel);

                $l_carton = true;

                break;
            case 'grosor_tapa':

                $row  = $options_model->getMaxCostoCartonId($id_papel);

                $l_carton = true;

                break;
            case 'grosor_cajon':

                $row  = $options_model->getMaxCostoCartonId($id_papel);

                $l_carton = true;

                break;
            case 'grosor_cartera':

                $row  = $options_model->getMaxCostoCartonId($id_papel);

                $l_carton = true;

                break;
            default:

                $row = $options_model->getPapelId($id_papel);

                break;
        }

        $id_papel = $row['id_papel'];
        $id_papel = intval($id_papel);

        $nombre_papel = $row['nombre'];
        $nombre_papel = utf8_decode(trim(strval($nombre_papel)));

        $ancho_papel = $row['ancho'];
        $ancho_papel = floatval($ancho_papel);

        $largo_papel = $row['largo'];
        $largo_papel = floatval($largo_papel);

        $costo_unit_papel = $row['costo_unitario'];
        $costo_unit_papel = floatval($costo_unit_papel);

        if ($id_papel > 0) {

            $aCalcPapel = array();

            $aCalcPapel['id_papel']         = $id_papel;
            $aCalcPapel['Parte']            = "Carton";
            $aCalcPapel['papel']            = utf8_decode(trim(strval($row['tipo'])));
            $aCalcPapel['nombre_papel']     = $nombre_papel;
            $aCalcPapel['ancho_papel']      = $ancho_papel;
            $aCalcPapel['largo_papel']      = $largo_papel;
            $aCalcPapel['costo_unit_papel'] = $costo_unit_papel;
            $aCalcPapel['carton']           = $l_carton;

            return $aCalcPapel;
        } else {

            return false;
        }
    }


    protected function checaCortes(&$aJson) {

        foreach ($aJson['cortes'] as $key => $value) {

            $valor = $aJson['cortes'][$key];

            if( !is_int($valor) or $valor <= (int)0) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . " Error en el calculo de cortes. Medidas de algun papel?" . " (" . $key . ");";

                return false;
            }
        }

        return true;
    }


    public function costo_corte($corte, $tiraje, $cortes_pliego, $ventas_model) {

        $aJson_corte_tmp = [];

        $corte_db = $ventas_model->costo_offset($corte);

        foreach($corte_db as $row) {

            $corte_costo_unitario = floatval($row['costo_unitario']);
            $corte_por_millar     = floatval($row['por_millar']);
        }

        $tot_pliegos_emp = self::Deltax($tiraje, $cortes_pliego);

        $costo_millar = self::Deltax($tot_pliegos_emp, $corte_por_millar);
        $costo_corte  = floatval($costo_millar * $corte_costo_unitario);

        $aJson_corte_tmp['tiraje'] = intval($tiraje);
        $aJson_corte_tmp['costo_unitario_corte_papel'] = floatval($corte_costo_unitario);
        $aJson_corte_tmp['cortes_pliego']              = intval($cortes_pliego);
        $aJson_corte_tmp['tot_pliegos']                = intval($tot_pliegos_emp);
        $aJson_corte_tmp['millares']                   = intval($costo_millar);
        $aJson_corte_tmp['tot_costo_corte']            = $costo_corte;

        return $aJson_corte_tmp;
    }


    // calculo del papel incluyendo cortes
    protected function calculaPapel($seccion, $id_papel, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model) {

        $papel_secc = self::getPapelCarton($seccion, $id_papel, $options_model);

        // medidas del papel
        $p_ancho = floatval($papel_secc['ancho_papel']);
        $p_largo = floatval($papel_secc['largo_papel']);
        $c_ancho = floatval($secc_ancho);
        $c_largo = floatval($secc_largo);

        $b      = max($p_ancho, $p_largo);
        $h      = min($p_ancho, $p_largo);
        $cb     = $c_ancho;
        $ch     = $c_largo;
        $escala = 250 / $b;



        $costo_unit_papel = floatval($papel_secc['costo_unit_papel']);

        $cortes = self::Acomoda($b, $h, $c_ancho, $c_largo, "V", "V");
        $cortes['c_ancho'] = $c_ancho;
        $cortes['c_largo'] = $c_largo;
        
        $totalCortes = $cortes['cortesT'];

        $cortes_H = self::Acomoda($b, $h, $c_ancho, $c_largo, "H", "V");
        $cortes_H['c_ancho'] = $c_ancho;
        $cortes_H['c_largo'] = $c_largo;

        $totalCortes_H = $cortes_H['cortesT'];

        if ($cortes['sobranteB'] >= $ch) {

            $sobrante = self::Acomoda($cortes['sobranteB'], $b, $c_ancho, $c_largo, "H", "H");

            $totalCortes += $sobrante['cortesT'];
        } elseif($cortes['sobranteH'] >= $cb) {

            $sobrante = self::Acomoda($cortes['sobranteH'], $h, $c_ancho, $c_largo, "H", "H");

            $totalCortes += $sobrante['cortesT'];
        } else {

           $sobrante = [$cortes['cortesT'] = 0, $cortes['cortesB'] = 0, $cortes['cortesH'] = 0, $cortes['sobranteB'] = 0, $cortes['sobranteH'] = 0, $cortes['areaUtilizada'] = 0]; 
        }


        if ($cortes_H['sobranteB'] >= $ch) {

            $sobranteH = self::Acomoda($cortes_H['sobranteB'], $h, $c_ancho, $c_largo, "H", "H");

            $totalCortes_H += $sobranteH['cortesT'];
        } else if ($cortes_H['sobranteH'] >= $cb) {

            $sobranteH = self::Acomoda($cortes_H['sobranteH'], $b, $c_ancho, $c_largo, "H", "H");

            $totalCortes_H += $sobranteH['cortesT'];
        } else {

           $sobrante = [$cortes['cortesT'] = 0, $cortes['cortesB'] = 0, $cortes['cortesH'] = 0, $cortes['sobranteB'] = 0, $cortes['sobranteH'] = 0, $cortes['areaUtilizada'] = 0]; 
        }


        /*
        if (intval($cb) < intval($ch)) {

            $cortesV  = $cortes['cortesT'];
            $cortesV2 = $sobrante['cortesT'];
            $cortesH  = $cortes_H['cortesT'];
            $cortesH2 = $sobranteH['cortesT'];
        } else {

            $cortesH2 = $sobrante['cortesT'];
            $cortesH  = $cortes['cortesT'];
            $cortesV2 = $sobranteH['cortesT'];
            $cortesV  = $cortesH['cortesT'];
        }
        */

        $corte   = $cortes['cortesT'];
        $corte_H = $cortes_H['cortesT'];

        $corte_secc = max($corte, $corte_H);

        $tot_pliegos = self::Deltax($tiraje, $corte_secc);

        $tot_costo = round(floatval($tot_pliegos * $costo_unit_papel), 2);

        $aPapel_secc = [];

        $aPapel_secc['id_papel'] = $papel_secc['id_papel'];
        $aPapel_secc['tiraje']   = $tiraje;

        if ($papel_secc['carton'] === true) {

            $aPapel_secc['num_carton'] = $id_papel;
        }

        $aPapel_secc['nombre_papel']     = $papel_secc['nombre_papel'];
        $aPapel_secc['ancho_papel']      = $papel_secc['ancho_papel'];
        $aPapel_secc['largo_papel']      = $papel_secc['largo_papel'];
        $aPapel_secc['costo_unit_papel'] = $papel_secc['costo_unit_papel'];
        $aPapel_secc['corte']            = $corte_secc;
        $aPapel_secc['tot_pliegos']      = $tot_pliegos;
        $aPapel_secc['tot_costo']        = $tot_costo;

        if ($papel_secc['costo_unit_papel'] <= 0) {

            $aPapel_secc['tot_costo'] = 0;
        }

        $a_Calculadora_secc = array();

        $a_Calculadora_secc['corte_ancho'] = min($secc_ancho, $secc_largo);
        $a_Calculadora_secc['corte_largo'] = max($secc_ancho, $secc_largo);

        if ($corte > $corte_H) {

            $cortes['orientacion'] = "vertical";
            $a_Calculadora_secc['corte'] = $cortes;
        } else {

            $cortes_H['orientacion'] = "horizontal";
            $a_Calculadora_secc['corte'] = $cortes_H;
        }


        $aPapel_secc['calculadora'] = $a_Calculadora_secc;


        unset($a_Calculadora_secc);


        return $aPapel_secc;
    }


    // Redondea al entero superior siguiente
    protected function Deltax($cant, $algo) {

        $cant_red1 = 0;
        $cant_red2 = 0;
        $delta     = 0;
        $alfa      = 0;

        $cant = intval($cant);
        $algo = intval($algo);

        if ($algo <= 0) {

            return 0;
        }

        $cant_red1 = ($cant / $algo);
        $cant_red2 = intval($cant / $algo);

        $delta = $cant_red1 - $cant_red2;

        if ($algo <= 0) {

            $alfa = 0;
        } elseif($delta > 0) {

            $alfa = $cant_red2 + 1;
        } else {

            $alfa = $cant_red2;
        }

        return $alfa;
    }


    protected function Acomoda($d1, $d2, $c_ancho, $c_largo, $acomodoCorte, $acomodoPliego) {

        $d1         = floatval($d1);
        $d2         = floatval($d2);
        $corteAncho = floatval($c_ancho);
        $corteLargo = floatval($c_largo);

        if ($d1 <= 0) {

            $d1 = 0;
        }

        if ($d2 <= 0) {

            $d2 = 0;
        }

        if ($corteAncho <= 0) {

            $corteAncho = 0;
        }

        if ($corteLargo <= 0) {

            $corteLargo = 0;
        }

        $b  = 1;
        $h  = 1;
        $cb = 1;
        $ch = 1;

        $acom_corte  = "";
        $acom_pliego = "";

        if($acomodoPliego === "V") {

            $b = max($d1, $d2);
            $h = min($d1, $d2);

            $acom_pliego = "V";
        } else if ($acomodoPliego === "H") {

            // Acomodo del pliego en horizontal para el calculo del maximo
            $b = max($d1, $d2);
            $h = min($d1, $d2);

            $acom_pliego = "H";
        } else {

            $b = $d1;
            $h = $d2;
        }


        if ($acomodoCorte === 'H') {

            $cb = max($corteAncho, $corteLargo);
            $ch = min($corteAncho, $corteLargo);

            $acom_corte = "H";
        } else if($acomodoCorte === 'V') {

            $cb = min($corteAncho, $corteLargo);
            $ch = max($corteAncho, $corteLargo);

            $acom_corte = "V";
        } else {

            $cb = $corteAncho;
            $ch = $corteLargo;
        }


        $cortesT       = 0;
        $cortesB       = 0;
        $cortesH       = 0;
        $sobranteB     = 0;
        $sobranteH     = 0;
        $areaUtilizada = 0;
        $orientacion   = "";

        //if ($b > 0 and $h > 0) {

            $cortesT       = intval($b / $cb) * intval($h / $ch);
            $cortesB       = intval($b / $cb);
            $cortesH       = intval($h / $ch);
            $sobranteB     = round(Floatval($b - ($cortesB * $cb)), 2);
            $sobranteH     = round(Floatval($h - ($cortesH * $ch)), 2);
            //$areaUtilizada = floatval( ($cb * $ch) * intval($cb / $b) * intval($ch / $h) );
            $areaUtilizada = round(floatval( ($cb * $ch) * intval($b / $cb) * intval($h / $ch) ), 2);
            $orientacion = $acom_corte . $acom_pliego;
        //}

        $cortes_tmp = array();

        $cortes_tmp['cortesT']       = $cortesT;
        $cortes_tmp['cortesB']       = $cortesB;
        $cortes_tmp['cortesH']       = $cortesH;
        $cortes_tmp['sobranteB']     = $sobranteB;
        $cortes_tmp['sobranteH']     = $sobranteH;
        $cortes_tmp['areaUtilizada'] = $areaUtilizada;
        $cortes_tmp['corte_pliego']  = $orientacion;


        return $cortes_tmp;
    }


    public function checaODT($odt) {

        if (!isset($_SESSION)) {

            session_start();
        }

        $odt = strval($odt);

        $sql = "SELECT * FROM cot_odt where num_odt = '$odt'";

        try {

            $query = $this->db->prepare($sql);

            $query->execute();

            if ( $query->rowCount() == 0 ) {

                return false;
            } else {

                return true;
            }
        } catch (Exception $ex) {

            return false;
        }
    }


/**** Inician las funciones de Impresión *******/

    // calcula los costos de offset
    protected function calculoOffset($tipo_offset, $id_papel = null, $nombre_tipo_offset, $tiraje, $num_tintas, $corte_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model) {

        $aCosto_Offset = [];

        $aCosto_Offset['maquila'] = "NO";


        // corte
        $db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");

        $corte_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $corte_costo_unitario = $row['costo_unitario'];
            $corte_costo_unitario = floatval($corte_costo_unitario);

            $corte_por_millar = $row['por_millar'];
            $corte_por_millar = floatval($corte_por_millar);
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $delta_costo = self:: Deltax($tiraje, $corte_pliego);
        $delta_corte = self:: Deltax($tiraje, $corte_por_millar);

        $costo_corte = floatval($corte_costo_unitario * $delta_corte);

        $aCosto_Offset["id_papel"]             = $id_papel;
        $aCosto_Offset["tipo_offset"]          = $nombre_tipo_offset;
        $aCosto_Offset["cantidad"]             = $tiraje;
        $aCosto_Offset["num_tintas"]           = $num_tintas;
        $aCosto_Offset["papel_corte_ancho"]    = $papel_corte_ancho;
        $aCosto_Offset["papel_corte_largo"]    = $papel_corte_largo;
        $aCosto_Offset["corte_pliego"]         = $corte_pliego;
        $aCosto_Offset["total_pliegos"]        = $delta_costo;
        $aCosto_Offset["corte_costo_unitario"] = $corte_costo_unitario;
        $aCosto_Offset["corte_por_millar"]     = $corte_por_millar;
        $aCosto_Offset["costo_corte"]          = $costo_corte;


        if ($nombre_tipo_offset == "Seleccion") {


            // Laminas
            $db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas");

            $costo_unitario_laminas = 0;

            foreach ($db_tmp as $row) {

                $costo_unitario_laminas = $row['costo_unitario'];
                $costo_unitario_laminas = floatval($costo_unitario_laminas);
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }


            $costo_laminas_offset = floatval($costo_unitario_laminas * $num_tintas);

            $aCosto_Offset["costo_unitario_laminas"] = $costo_unitario_laminas;

            $aCosto_Offset["costo_tot_laminas"] = $costo_laminas_offset;


            // Arreglo
            //$db_tmp = $ventas_model->costo_offset("Arreglo");
            $db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo");


            $arreglo_costo_unitario = 0;

            foreach ($db_tmp as $row) {

                $arreglo_tiraje_min = $row['tiraje_minimo'];
                $arreglo_tiraje_min = intval($arreglo_tiraje_min);

                $arreglo_tiraje_max = $row['tiraje_maximo'];
                $arreglo_tiraje_max = intval($arreglo_tiraje_max);

                if ($tiraje >= $arreglo_tiraje_min and $tiraje <= $arreglo_tiraje_max) {

                    $arreglo_costo_unitario = $row['costo_unitario'];
                    $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                    break;
                }
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }


            $costo_arreglo_offset = floatval($arreglo_costo_unitario * $num_tintas);


            $aCosto_Offset["costo_unitario_arreglo"] = $arreglo_costo_unitario;
            $aCosto_Offset["costo_tot_arreglo"]      = $costo_arreglo_offset;


            $db_tmp = $ventas_model->costo_proceso("proc_offset", $tipo_offset);

            $costo_unitario = 0;

            foreach ($db_tmp as $row) {

                $costo_unitario = $row['costo_unitario'];
                $costo_unitario = floatval($costo_unitario);

                $por_millar = $row['por_millar'];
                $por_millar = intval($por_millar);

                if ($tipo_offset == "Tiro") {

                    $num_color = $row['num_color'];
                    $num_color = intval($num_color);
                }
            }

            $alfa = self:: Deltax($tiraje, $por_millar);

            // tiro
            if ($tipo_offset == "Tiro") {

                $num_tintas_alfa = intval($num_tintas / $num_color);

                $costo_tiro_offset = floatval($costo_unitario * $alfa * $num_tintas_alfa);
            } else {

                $costo_tiro_offset = floatval($costo_unitario * $alfa);
            }

            $costo_proceso = floatval($costo_corte + $costo_laminas_offset + $costo_arreglo_offset + $costo_tiro_offset);

            $aCosto_Offset['costo_unitario_tiro'] = $costo_unitario;
            $aCosto_Offset['costo_tiro']          = $costo_tiro_offset;
            $aCosto_Offset['costo_tot_proceso']   = $costo_proceso;

            if ($costo_unitario <= 0) {

                $aCosto_Offset['costo_tot_proceso'] = 0;
            }
        }


        if ($nombre_tipo_offset === "Pantone") {

            $db_tmp = $ventas_model->costo_offset("Laminas Pantone");

            $pantone_costo_unitario_laminas = 0;

            foreach ($db_tmp as $row) {

                $pantone_costo_unitario_laminas = $row['costo_unitario'];
                $pantone_costo_unitario_laminas = floatval($pantone_costo_unitario_laminas);
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }


            $aCosto_Offset['costo_unitario_laminas'] = $pantone_costo_unitario_laminas;

            $costo_tot_laminas = floatval($pantone_costo_unitario_laminas * $num_tintas);

            $aCosto_Offset['costo_tot_laminas'] = $costo_tot_laminas;



            // Arreglo de Pantone
            $db_tmp = $ventas_model->costo_offset("Arreglo de Pantone");

            $arreglo_pantone_costo_unitario = 0;

            foreach ($db_tmp as $row) {

                $arreglo_pantone_costo_unitario = $row['costo_unitario'];

                $arreglo_pantone_costo_unitario = floatval($arreglo_pantone_costo_unitario);
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }


            $costo_tot_arreglo_pantone = floatval($arreglo_pantone_costo_unitario * $num_tintas);

            $aCosto_Offset["costo_unitario_arreglo"] = $arreglo_pantone_costo_unitario;

            $aCosto_Offset["costo_tot_arreglo"] = $costo_tot_arreglo_pantone;

            $costo_offset_arreglo_pantone = $costo_tot_arreglo_pantone;


            // tiro
            $db_tmp = $ventas_model->costo_offset("Tiro Pantone");

            $tiro_pantone_costo_unitario = 0;

            foreach ($db_tmp as $row) {

                $tiro_pantone_costo_unitario = $row['costo_unitario'];
                $tiro_pantone_costo_unitario = floatval($tiro_pantone_costo_unitario);

                $por_millar = $row['por_millar'];
                $por_millar = floatval($por_millar);
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }

            $alfa = self::Deltax($tiraje, $por_millar);

            $costo_tiro_offset = floatval($tiro_pantone_costo_unitario * $alfa);

            $aCosto_Offset['costo_unitario_tiro'] = $tiro_pantone_costo_unitario;
            $aCosto_Offset['costo_tiro']     = $costo_tiro_offset;

            $costo_proceso = floatval($costo_corte + $costo_tot_laminas + $costo_tot_arreglo_pantone + $costo_tiro_offset);

            $aCosto_Offset['costo_tot_proceso'] = $costo_proceso;
        }

        return $aCosto_Offset;
    }


    protected function calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $corte_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model) {

        $Off_maq_tmp = [];

        $Off_maq_tmp["es_maquila"]        = "SI";
        $Off_maq_tmp["Tipo"]              = $nombre_tipo_offset;
        $Off_maq_tmp["cantidad"]          = $tiraje;
        $Off_maq_tmp["num_tintas"]        = $num_tintas;
        $Off_maq_tmp["papel_corte_ancho"] = $papel_corte_ancho;
        $Off_maq_tmp["papel_corte_largo"] = $papel_corte_largo;


        if ($nombre_tipo_offset == "Seleccion") {

            // Maquila arreglo
            $db_tmp = $ventas_model->costo_offset("Maquila Arreglo");

            $arreglo_costo_unitario = 0;

            foreach ($db_tmp as $row) {

                $arreglo_costo_unitario = $row['costo_unitario'];
                $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }


            $costo_arreglo = $arreglo_costo_unitario * $num_tintas;
            $costo_arreglo = round(floatval($costo_arreglo), 2);


            $Off_maq_tmp["arreglo_costo_unitario"] = $arreglo_costo_unitario;
            $Off_maq_tmp["arreglo_costo"]          = $costo_arreglo;


            // Maquila lamina
            $db_tmp = $ventas_model->costo_offset("Maquila Lamina");

            $costo_unitario_laminas_maquila = 0;

            foreach ($db_tmp as $row) {

                $costo_unitario_laminas_maquila = $row['costo_unitario'];
                $costo_unitario_laminas_maquila = floatval($costo_unitario_laminas_maquila);
            }


            if (is_array($db_tmp)) {

                unset($db_tmp);
            }


            $costo_laminas = $costo_unitario_laminas_maquila * $num_tintas;
            $costo_laminas = round(floatval($costo_laminas), 2);


            $Off_maq_tmp["costo_unitario_laminas"] = $costo_unitario_laminas_maquila;
            $Off_maq_tmp["costo_laminas"]          = $costo_laminas;



            // Maquila
            $maquila_db_rango = $ventas_model->costo_offset("Maquila");

            $maquila_costo_unitario = 0;
            $por_millar_maq         = 1;

            foreach ($maquila_db_rango as $row) {

                $tiraje_min_maq = intval($row['tiraje_minimo']);
                $tiraje_max_maq = intval($row['tiraje_maximo']);

                if ($tiraje >= $tiraje_min_maq and $tiraje <= $tiraje_max_maq) {

                    $maquila_costo_unitario = $row['costo_unitario'];
                    $maquila_costo_unitario = round(floatval($maquila_costo_unitario), 2);

                    $por_millar_maq = $row['por_millar'];
                    $por_millar_maq = intval($por_millar_maq);

                    break;
                }
            }

            if (is_array($maquila_db_rango)) {

                unset($maquila_db_rango);
            }


            $delta_maq = self::Deltax($tiraje, $por_millar_maq);

            $costo_maquila = $delta_maq * $maquila_costo_unitario * $num_tintas;
            $costo_maquila = round(floatval($costo_maquila), 2);


            $costo_proceso_maq = round(floatval($costo_arreglo + $costo_laminas + $costo_maquila), 2);


            $Off_maq_tmp["costo_unitario_maq"] = $maquila_costo_unitario;
            $Off_maq_tmp["costo_tot_maq"]      = $costo_maquila;
            $Off_maq_tmp["costo_tot_proceso"]  = $costo_proceso_maq;
        }



        if ($nombre_tipo_offset == "Pantone") {

            $db_tmp = $ventas_model->costo_offset("Maquila Arreglo Pantone");

            $costo_maq_arreglo_pantone = 0;

            foreach ($db_tmp as $row) {

                 $costo_maq_arreglo_pantone = $row['costo_unitario'];

                 $costo_maq_arreglo_pantone = floatval($costo_maq_arreglo_pantone);
            }

            if (is_array($db_tmp)) {

                unset($db_tmp);
            }

            $arreglo_costo = floatval($costo_maq_arreglo_pantone * $num_tintas);


            $Off_maq_tmp['arreglo_costo_unitario'] = $costo_maq_arreglo_pantone;
            $Off_maq_tmp['arreglo_costo']          = $arreglo_costo;


            // Lamina Pantone
            $db_tmp = $ventas_model->costo_offset("Maquila Lamina Pantone");

            $costo_maq_lamina_pantone = 0;

            foreach ($db_tmp as $row) {

                 $costo_maq_lamina_pantone = $row['costo_unitario'];

                 $costo_maq_lamina_pantone = floatval($costo_maq_lamina_pantone);
            }

            if (is_array($db_tmp)) {

                unset($db_tmp);
            }

            $costo_laminas = floatval($costo_maq_lamina_pantone * $num_tintas);

            $Off_maq_tmp['costo_unitario_laminas'] = $costo_maq_lamina_pantone;
            $Off_maq_tmp['costo_laminas']          = $costo_laminas;


             // Maquila
            $maquila_db_rango = $ventas_model->costo_offset("Maquila Pantone");


            $maquila_costo_unitario = 0;
            $por_millar_maq         = 1;

            foreach ($maquila_db_rango as $row) {

                $tiraje_min_maq = intval($row['tiraje_minimo']);
                $tiraje_max_maq = intval($row['tiraje_maximo']);

                if ($tiraje >= $tiraje_min_maq and $tiraje <= $tiraje_max_maq) {

                    $maquila_costo_unitario = floatval($row['costo_unitario']);

                    $por_millar_maq = intval($row['por_millar']);

                    break;
                }
            }

            if (is_array($maquila_db_rango)) {

                unset($maquila_db_rango);
            }


            $delta = self::Deltax($tiraje, $por_millar_maq);

            $costo_maquila     = round(floatval($delta * $maquila_costo_unitario * $num_tintas), 2);
            $costo_proceso_maq = round(floatval($arreglo_costo + $costo_laminas + $costo_maquila), 2);


            $Off_maq_tmp["costo_unitario_maq"] = $maquila_costo_unitario;
            $Off_maq_tmp["costo_tot_maq"]      = $costo_maquila;
            $Off_maq_tmp["costo_tot_proceso"]  = $costo_proceso_maq;
        }


        return $Off_maq_tmp;
    }


    // calcula los costos de digital
    protected function calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model) {

        $aDig_tmp = [];

        $costo_unitario_digital = 0;

        $digital_db_rango = $ventas_model->costo_digital_rango($nomb_tam_emp);

        foreach ($digital_db_rango as $row) {

            $tiraje_min = 0;
            $tiraje_max = 0;

            $tiraje_min = $row['tiraje_minimo'];
            $tiraje_max = $row['tiraje_maximo'];

            $tiraje_min = intval($tiraje_min);
            $tiraje_max = intval($tiraje_max);

            if ($tiraje >= $tiraje_min and $tiraje <= $tiraje_max) {

                $costo_unitario_digital = $row['costo_unitario'];
                $costo_unitario_digital = floatval($costo_unitario_digital);

                break;
            }
        }

        if (is_array($digital_db_rango)) {

            unset($digital_db_rango);
        }


        $costo_tot_digital = floatval($costo_unitario_digital * $tiraje);

        $tam_ok = self::rec_maquila_digital($corte_ancho_proceso, $corte_largo_proceso, $nomb_tam_emp);

                // tamaño carta digital
        $imp_ancho_dig = 20.5;
        $imp_largo_dig = 27;

        // tamaño doble carta digital
        $t_2carta_ancho = 32;
        $t_2carta_largo = 46.5;

        if ($nomb_tam_emp === "Frente Doble Carta") {

            $imp_ancho = $t_2carta_ancho;
            $imp_largo = $t_2carta_largo;
        } else {

            $imp_ancho = $imp_ancho_dig;
            $imp_largo = $imp_largo_dig;
        }

        $tot_pliegos = self:: Deltax($tiraje, $cortes_por_pliego);

        $costo_tot_proceso = floatval($tot_pliegos * $costo_unitario_digital);


        if ( $tam_ok ) {

            $aDig_tmp['cabe_digital'] = "SI";

            $aDig_tmp['tipo_impresion']    = $nomb_tam_emp;
            $aDig_tmp['imp_ancho']         = $imp_ancho;
            $aDig_tmp['imp_largo']         = $imp_largo;
            $aDig_tmp['papel_corte_ancho'] = $papel_corte_ancho;
            $aDig_tmp['papel_corte_largo'] = $papel_corte_largo;
            $aDig_tmp["costo_unitario"]    = $costo_unitario_digital;
            $aDig_tmp["cantidad"]          = $tiraje;
            $aDig_tmp["corte_ancho"]       = $corte_ancho_proceso;
            $aDig_tmp["corte_largo"]       = $corte_largo_proceso;
            $aDig_tmp["cortes_por_pliego"] = $cortes_por_pliego;
            $aDig_tmp["tot_pliegos"]       = $tot_pliegos;
            $aDig_tmp["costo_tot_proceso"] = $costo_tot_proceso;


            if ($costo_unitario_digital <= 0) {

                $aDig_tmp["costo_tot_proceso"] = 0;
            }


            $Merma_digital_tmp = $ventas_model->getCotizaMermaDigital();

            foreach ($Merma_digital_tmp as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($Merma_digital_tmp)) {

                unset($Merma_digital_tmp);
            }

            $merma_color      = 0;
            $merma_color_adic = 0;
            $num_tintas_adic  = 0;

            $num_tintas_tmp  = 1;
            $num_tintas_adic = 1;

            $cantidad_color_merma = $tiraje;


            if ($tiraje < $cantidad_minima) {

                $merma_color      = $cantidad_color_merma;
                $merma_color_adic = 0;
                $merma_tot        = $merma_color + $merma_color_adic;
            } else {

                $cantidad_adic = $tiraje - $cantidad_minima;

                $cant_adic = self::Deltax($cantidad_adic, $por_cada_x);

                $merma_color      = $cantidad_color_merma;
                $merma_color_adic = $cant_adic * $adicional;
                $merma_tot        = $merma_color + $merma_color_adic;
            }

            $merma_tot = $merma_color + $merma_color_adic;

            $aMerma_DigBCaj = [];

            $aMerma_DigBCaj['merma_min']      = $merma_color;
            $aMerma_DigBCaj['merma_adic']     = $merma_color_adic;
            $aMerma_DigBCaj['merma_tot']      = $merma_tot;
            $aMerma_DigBCaj['costo_unitario'] = floatval($costo_unitario_digital);
            $aMerma_DigBCaj['costo_tot']      = round(floatval($tot_pliegos * $costo_unitario_digital), 2);

            $aDig_tmp['mermas'] = $aMerma_DigBCaj;

            unset($aMerma_DigBCaj);
        } else {

            $aDig_tmp['cabe_digital']      = "NO";
            $aDig_tmp['tam_impresion']     = $nomb_tam_emp;
            $aDig_tmp['imp_ancho']         = $imp_ancho;
            $aDig_tmp['imp_largo']         = $imp_largo;
            $aDig_tmp["corte_ancho"]       = $corte_ancho_proceso;
            $aDig_tmp["corte_largo"]       = $corte_largo_proceso;
            $aDig_tmp["costo_tot_proceso"] = 0;
        }


        return $aDig_tmp;
    }


    protected function calculoDigitalMax($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model) {

        $aDig_tmp = [];

        $costo_unitario_digital = 0;

        $digital_db_rango = $ventas_model->costo_digital_rango($nomb_tam_emp);

        foreach ($digital_db_rango as $row) {

            $tiraje_min = 0;
            $tiraje_max = 0;

            $tiraje_min = $row['tiraje_minimo'];
            $tiraje_max = $row['tiraje_maximo'];

            $tiraje_min = intval($tiraje_min);
            $tiraje_max = intval($tiraje_max);

            if ($tiraje >= $tiraje_min and $tiraje <= $tiraje_max) {

                $costo_unitario_digital = $row['costo_unitario'];
                $costo_unitario_digital = floatval($costo_unitario_digital);

                break;
            }
        }

        if (is_array($digital_db_rango)) {

            unset($digital_db_rango);
        }


        $costo_tot_digital = floatval($costo_unitario_digital * $tiraje);

        $tam_ok = self::rec_maquila_digital($corte_ancho_proceso, $corte_largo_proceso, $nomb_tam_emp);

        // tamaño carta digital
        $imp_ancho_dig = 27;
        $imp_largo_dig = 120;

        // tamaño doble carta digital
        $t_2carta_ancho = 46.5;
        $t_2carta_largo = 120;

        if ($nomb_tam_emp === "Frente Doble Carta") {

            $imp_ancho = $t_2carta_ancho;
            $imp_largo = $t_2carta_largo;
        } else {

            $imp_ancho = $imp_ancho_dig;
            $imp_largo = $imp_largo_dig;
        }

        if ( $tam_ok ) {

            $aDig_tmp['cabe_digital'] = "SI";

            $aDig_tmp['tipo_impresion'] = $nomb_tam_emp;
            $aDig_tmp['imp_ancho']      = $imp_ancho;
            $aDig_tmp['imp_largo']      = $imp_largo;
            $aDig_tmp["cantidad"]      = $tiraje;
            $aDig_tmp["corte_ancho"]   = $corte_ancho_proceso;
            $aDig_tmp["corte_largo"]   = $corte_largo_proceso;

            $aDig_tmp["costo_unitario"] = $costo_unitario_digital;

            if ($costo_unitario_digital <= 0) {

                $aDig_tmp["costo_tot_proceso"] = 0;
            } else {

                $aDig_tmp["costo_tot_proceso"] = $costo_tot_digital;
            }


            $Merma_digital_tmp = $ventas_model->getCotizaMermaDigital();

            foreach ($Merma_digital_tmp as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($Merma_digital_tmp)) {

                unset($Merma_digital_tmp);
            }

            $merma_color      = 0;
            $merma_color_adic = 0;
            $num_tintas_adic  = 0;

            $num_tintas_tmp  = 1;
            $num_tintas_adic = 1;

            $cantidad_color_merma = $tiraje;


            if ($tiraje < $cantidad_minima) {

                $merma_color      = $cantidad_color_merma;
                $merma_color_adic = 0;
                $merma_tot        = $merma_color + $merma_color_adic;
            } else {

                $cantidad_adic = $tiraje - $cantidad_minima;

                $cant_adic = self::Deltax($cantidad_adic, $por_cada_x);

                $merma_color      = $cantidad_color_merma;
                $merma_color_adic = $cant_adic * $adicional;
                $merma_tot        = $merma_color + $merma_color_adic;
            }

            $merma_tot = $merma_color + $merma_color_adic;


            $aMerma_DigBCaj = [];

            $aMerma_DigBCaj['merma_min']  = $merma_color;
            $aMerma_DigBCaj['merma_adic'] = $merma_color_adic;
            $aMerma_DigBCaj['merma_tot']  = $merma_tot;
            $aMerma_DigBCaj['costo_unitario'] = floatval($costo_unitario_digital);
            $aMerma_DigBCaj['costo_tot']  = round(floatval($merma_tot * $costo_unitario_digital), 2);

            $aDig_tmp['mermas'] = $aMerma_DigBCaj;

            unset($aMerma_DigBCaj);
        } else {

            $aDig_tmp['cabe_digital']      = "NO";
            $aDig_tmp['tam_impresion']     = $nomb_tam_emp;
            $aDig_tmp['imp_ancho']         = $imp_ancho;
            $aDig_tmp['imp_largo']         = $imp_largo;
            $aDig_tmp["corte_ancho"]       = $corte_ancho_proceso;
            $aDig_tmp["corte_largo"]       = $corte_largo_proceso;
            $aDig_tmp["costo_tot_proceso"] = 0;
        }


        return $aDig_tmp;
    }


    // calcula los costos de serigrafia
    protected function calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $papel_corte_ancho, $papel_corte_largo, $ventas_model) {


        $aSerigrafia_tmp = [];

        $aSerigrafia_tmp['tipo']              = $tipo_offset_serigrafia;
        $aSerigrafia_tmp['cantidad']          = $tiraje;
        $aSerigrafia_tmp['num_tintas']        = $num_tintas;
        $aSerigrafia_tmp['papel_corte_ancho'] = $papel_corte_ancho;
        $aSerigrafia_tmp['papel_corte_largo'] = $papel_corte_largo;

        // Arreglo
        $arreglo_db_tmp = $ventas_model->costo_arreglo_serigrafia("Arreglo");

        $costo_unitario_arreglo = $arreglo_db_tmp['costo_unitario'];
        $por_cada = $arreglo_db_tmp['por_cada'];

        $delta = self::Deltax($tiraje, $por_cada);

        $costo_arreglo = floatval($costo_unitario_arreglo * $delta * $num_tintas);



        if (is_array($arreglo_db_tmp)) {

            unset($arreglo_db_tmp);
        }

        if ($tipo_offset_serigrafia == "Seleccion") {

            $rango_db_tmp = $ventas_model->costo_serigrafia_rango("cantidad");
        } else {

            $rango_db_tmp = $ventas_model->costo_serigrafia_rango("cantidad Pantone");
        }


        $costo_unitario_tiro = 0;
        $por_cada            = 0;
        $delta               = 0;

        foreach ($rango_db_tmp as $row) {

            $tiraje_min = intval($row['tiraje_minimo']);
            $tiraje_max = intval($row['tiraje_maximo']);

            if ($tiraje >= $tiraje_min and $tiraje <= $tiraje_max) {

                $costo_unitario_tiro = $row['costo_unitario'];
                $costo_unitario_tiro = floatval($costo_unitario_tiro);

                $por_cada = intval($row['por_cada']);

                break;
            }
        }


        if (is_array($rango_db_tmp)) {

            unset($rango_db_tmp);

        }


        $delta = self::Deltax($tiraje, $por_cada);

        $costo_tiro = round(floatval($costo_unitario_tiro * $delta * $num_tintas), 2);


        $costo_tot_serigrafia = floatval($costo_tiro + $costo_arreglo);
        $costo_tot_serigrafia = round($costo_tot_serigrafia, 2);


        $aSerigrafia_tmp['costo_unit_arreglo']  = floatval($costo_unitario_arreglo);
        $aSerigrafia_tmp['costo_arreglo']       = $costo_arreglo;
        $aSerigrafia_tmp['costo_unitario_tiro'] = $costo_unitario_tiro;
        $aSerigrafia_tmp['costo_tiro']          = $costo_tiro;

        if ($costo_unitario_tiro <= 0) {

            $aSerigrafia_tmp['costo_tot_proceso'] = 0;
        } else {

            $aSerigrafia_tmp['costo_tot_proceso'] = $costo_tot_serigrafia;
        }



        return $aSerigrafia_tmp;
    }


    protected function calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel_merma, $ventas_model) {

        $sql_tabla_temp_db = $ventas_model->costo_offset_color_merma();

        foreach ($sql_tabla_temp_db as $row) {

            $cantidad_minima = intval($row['cantidad_minima']);
            $c_4colores      = intval($row['c_4colores']);
            $c_3colores      = intval($row['c_3colores']);
            $c_2colores      = intval($row['c_2colores']);
            $c_1color        = intval($row['c_1color']);
            $por_cada_x      = intval($row['por_cada_x']);

            $adicional_4colores = intval($row['adicional_4colores']);
            $adicional_3colores = intval($row['adicional_3colores']);
            $adicional_2colores = intval($row['adicional_2colores']);
            $adicional_1color   = intval($row['adicional_1color']);
        }


        $merma_color      = 0;
        $merma_color_adic = 0;
        $num_tintas_adic  = 0;

        $num_tintas_adic = $num_tintas - 4;


        if ($num_tintas >= 1 and $num_tintas <= 4) {

            switch ($num_tintas) {

                case 1:

                    $cantidad_color_merma = $c_1color;

                    break;
                case 2:

                    $cantidad_color_merma = $c_2colores;

                    break;
                case 3:

                    $cantidad_color_merma = $c_3colores;

                    break;
                case 4:

                    $cantidad_color_merma = $c_4colores;

                    break;
            }
        }


        if ($tiraje < $cantidad_minima) {

            if ($num_tintas >= 1 and $num_tintas <= 4) {

                $merma_color      = $cantidad_color_merma;
                $merma_color_adic = 0;
                $merma_tot        = $merma_color + $merma_color_adic;
            } elseif ($num_tintas > 4) {

                $n_tintas_adic = $num_tintas - 4;

                // colores adicionales
                $merma_color_adic = $adicional_1color * $n_tintas_adic;

                $merma_color      = $c_4colores;
                $merma_color_adic = $merma_color_adic;
                $merma_tot        = $merma_color + $merma_color_adic;
            }
        } else {

            $cantidad_adic = $tiraje - $cantidad_minima;

            //$cant_adic = $cantidad_adic / $por_cada_x;
            $cant_adic = self::Deltax($cantidad_adic, $por_cada_x);

            if ($num_tintas >= 1 and $num_tintas <= 4) {

                $merma_color      = $cantidad_color_merma;
                $merma_color_adic = $cant_adic * $cantidad_color_merma;
                $merma_tot        = $merma_color + $merma_color_adic;
            } else {

                $merma_color = $c_4colores;
                $merma_color_adic = (($num_tintas - 4) * $adicional_1color * $cant_adic);
                $merma_tot = $merma_color + $merma_color_adic;
            }
        }


        $merma_tot = $merma_color + $merma_color_adic;

        $tot_pliegos = self::Deltax($merma_tot, $cortes_por_pliego);

        $costo_tot_pliegos_merma = round(floatval($tot_pliegos * $costo_unit_papel_merma), 3);


        $aMerma_offset_tmp = [];

        $aMerma_offset_tmp['merma_min']               = $merma_color;
        $aMerma_offset_tmp['merma_adic']              = $merma_color_adic;
        $aMerma_offset_tmp['merma_tot']               = $merma_tot;
        $aMerma_offset_tmp['cortes_por_pliego']       = $cortes_por_pliego;
        $aMerma_offset_tmp['merma_tot_pliegos']       = $tot_pliegos;
        $aMerma_offset_tmp['costo_unit_papel_merma']  = $costo_unit_papel_merma;
        $aMerma_offset_tmp['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


        if (is_array($sql_tabla_temp_db)) {

            unset($sql_tabla_temp_db);
        }


        return $aMerma_offset_tmp;
    }


    protected function calcTamDigital($corte_ancho_proceso, $corte_largo_proceso) {

        // medidas fisicas de impresion de la maquina digital(en cms)
        $ancho_fis = 33;
        $largo_fis = 100;


        $tam  = "";
        $aTam = [];

        if ( $ancho_fis > $corte_ancho_proceso and $largo_fis > $corte_largo_proceso ) {

            // tamaño carta
            $imp_ancho_dig = 20.5;
            $imp_largo_dig = 27;

            if ( $imp_ancho_dig > $corte_ancho_proceso and $imp_largo_dig > $corte_largo_proceso ) {

                $aTam[0] = "TC";
                $aTam[1] = 1;
                $aTam['imp_ancho_dig'] = $imp_ancho_dig;
                $aTam['imp_largo_dig'] = $imp_largo_dig;
                $aTam['tipo_digital']  = "Frente Carta";
            }


            // tamaño doble carta
            $imp_ancho_dig = 32;
            $imp_largo_dig = 46.5;

            if ( $imp_ancho_dig > $corte_ancho_proceso and $imp_largo_dig > $corte_largo_proceso ) {

                $aTam[0] = "T2C";
                $aTam[1] = 1;
                $aTam['imp_ancho_dig'] = $imp_ancho_dig;
                $aTam['imp_largo_dig'] = $imp_largo_dig;
                $aTam['tipo_digital']  = "Frente Doble Carta";
            }
        } else {

            $aTam[0]              = "";
            $aTam[1]              = 0;
            $aTam['tipo_digital'] = "";
        }

        return $aTam;
    }


    protected function esDigital($nomb_tam_emp) {

        $tam = "";
        $tam1 = 0;

        $aTam = [];

        switch ($nomb_tam_emp) {
            case 'Frente Carta':

                $imp_ancho_dig = 20.5;
                $imp_largo_dig = 27;
                $tam = "TC";
                $tam1 = 1;

                break;
            case 'Vuelta Carta':

                $imp_ancho_dig = 20.5;
                $imp_largo_dig = 27;
                $tam = "TC";
                $tam1 = 1;

                break;
            case 'Frente Doble Carta':

                $imp_ancho_dig = 32;
                $imp_largo_dig = 46.5;
                $tam = "T2C";
                $tam1 = 1;

                break;
            case 'Vuelta Doble Carta':

                $imp_ancho_dig = 32;
                $imp_largo_dig = 46.5;
                $tam = "T2C";
                $tam1 = 1;

                break;
        }

        $aTam[0] = $tam;
        $aTam[1] = $tam1;
        $aTam['imp_ancho_dig'] = $imp_ancho_dig;
        $aTam['imp_largo_dig'] = $imp_largo_dig;

        return $aTam;
    }


    // Checa si la ODT (Offset) se va a maquila
    protected function recMaquila($ancho, $largo) {

        $datox = floatval($ancho);
        $datoy = floatval($largo);

        $datox1 = intval(51);
        $datoy1 = intval(70);

        $datox2 = intval(72);
        $datoy2 = intval(102);


        // medidas entre rangos
        if ( ($datox >= $datox1 and $datox <= $datox2) or ($datoy >= $datoy1 and $datoy <= $datoy2) ) {

            return true;
        } else {

            return false;
        }
    }


    protected function rec_maquila_digital($corte_ancho, $corte_largo, $impresion) {

        $impresion = trim(strval($impresion));

        // tamaño carta digital
        $imp_ancho_dig = 20.5;
        $imp_largo_dig = 27;

        // tamaño doble carta digital
        $t_2carta_ancho = 32;
        $t_2carta_largo = 46.5;


        $tam2 = 0;

        if ($impresion === "TC" or
            $impresion === "Frente Carta" or
            $impresion === "Vuelta Carta" ) {

            if (($corte_ancho <= $imp_ancho_dig) and ($corte_largo <= $imp_largo_dig)) {

                $tam2 = 1;       // tamaño carta
            }
        }

        if  ($impresion === "T2C" or
            $impresion === "Frente Doble Carta" or
            $impresion === "Vuelta Doble Carta" ) {

            if (($corte_ancho <= $t_2carta_ancho) and ($corte_largo <= $t_2carta_largo)) {

                $tam2 = 1;        // tamaño doble carta
            }
        }

        return $tam2;
    }


    public function calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional) {

        $tiraje = intval($_POST['qty']);

        $merma_acabados = [];

        if ($tiraje < $cantidad_minima) {

            $cantidad_min  = intval($cantidad);
            $cantidad_adic = 0;
            $cantidad_tot  = intval($cantidad);
        } else {

            $cantidad_min  = intval($cantidad);

            $delta_tmp = intval($tiraje - $cantidad_minima);

            $delta = self::Deltax($delta_tmp, $por_cada_x);

            $cantidad_adic = intval($delta * $adicional);
            $cantidad_tot  = intval($cantidad) + $cantidad_adic;
        }

        $merma_acabados[0] = $cantidad_min;
        $merma_acabados[1] = $cantidad_adic;
        $merma_acabados[2] = $cantidad_tot;

        return $merma_acabados;
    }

/**** Terminan las funciones de Impresión *******/


/**** Inician las funciones de Acabados ****/

    protected function calculoBarniz($tipoGrabado, $tiraje, $AnchoBarniz, $LargoBarniz, $ventas_model) {

        $db_tmp = $ventas_model->costo_BarnizUV($tipoGrabado);


        $costo_unitario_barniz = 0;

        foreach ($db_tmp as $row) {

            $barniz_tiraje_minimo = $row['tiraje_minimo'];
            $barniz_tiraje_minimo = intval($barniz_tiraje_minimo);

            $barniz_tiraje_maximo = $row['tiraje_maximo'];
            $barniz_tiraje_maximo = intval($barniz_tiraje_maximo);

            if ($tiraje >= $barniz_tiraje_minimo and $tiraje <= $barniz_tiraje_maximo) {

                $costo_unitario_barniz = $row['costo_unitario'];

                $costo_unitario_barniz = round(floatval($row['costo_unitario']), 4);

                $costo_minimo = $row['costo_minimo'];
                $costo_minimo = floatval($costo_minimo);

                break;
            }
        }

        $area_barniz = round(floatval($LargoBarniz / 100) * floatval($AnchoBarniz / 100), 4);

        $costo_barniz = floatval($area_barniz * $costo_unitario_barniz * intval($tiraje));

        $costo_barniz = round($costo_barniz, 2);

        if ($costo_barniz < $costo_minimo) {

            $costo_barniz = $costo_minimo;
        } elseif ($costo_unitario_barniz <= 0) {

            $costo_barniz = 0;
        }

        $barniz_temp = [];

        $barniz_temp['tipoGrabado']       = $tipoGrabado;
        $barniz_temp['Largo']             = floatval($LargoBarniz);
        $barniz_temp['Ancho']             = floatval($AnchoBarniz);
        $barniz_temp['area']              = $area_barniz;
        $barniz_temp['costo_unitario']    = $costo_unitario_barniz;
        $barniz_temp['costo_tot_proceso'] = $costo_barniz;

        return $barniz_temp;
    }


    protected function calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model) {

        $costo_laser_temp = $ventas_model->costo_laser($tipoGrabado);

        $costo_unitario_laser = 0;
        $tiempo_requerido     = 0;
        $merma_min            = 0;

        foreach ($costo_laser_temp as $row) {

            $costo_unitario_laser = $row['costo_unitario'];
            $costo_unitario_laser = floatval($costo_unitario_laser);

            $tiempo_requerido = $row['tiempo_requerido'];
            $tiempo_requerido = intval($tiempo_requerido);

            $merma_min = $row['merma_min'];
            $merma_min = intval($merma_min);

            $merma_tot = round(floatval($costo_unitario_laser * $merma_min), 2);
        }

        $costo_laser = floatval($costo_unitario_laser * $tiraje);
        $costo_laser = round($costo_laser, 2);


        $laser_tmp = [];

        $laser_tmp['tipo_grabado']      = $tipoGrabado;
        $laser_tmp['Largo']             = $Largo;
        $laser_tmp['Ancho']             = $Ancho;
        $laser_tmp['costo_unitario']    = $costo_unitario_laser;
        $laser_tmp['tiempo_requerido']  = $tiempo_requerido;
        $laser_tmp['costo_tot_proceso'] = $costo_laser;
        $laser_tmp['merma_min']         = $merma_min;
        $laser_tmp['merma_tot']         = $merma_tot;


        return $laser_tmp;
    }


    protected function calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model) {


        $aGrab_tmp = [];

        $placa_LargoGrab = $LargoGrab;
        $placa_AnchoGrab = $AnchoGrab;
        $placa_area      = floatval($placa_LargoGrab * $placa_AnchoGrab);

        switch ($tipoGrabado) {

            case 'G1 Estampado':

                // placa
                $costo_placa_tmp = $ventas_model->costo_grabado("G1 Placa");

                $placa_costo_unitario = 0;

                foreach ($costo_placa_tmp as $row) {

                    $placa_costo_unitario = $row['precio_unitario'];
                    $placa_costo_unitario = round(floatval($placa_costo_unitario), 4);

                    $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                }

                if (is_array($costo_placa_tmp)) {

                    unset($costo_placa_tmp);
                }

                if ($placa_area < $placa_tamano_minimo) {

                    $placa_area = $placa_tamano_minimo;
                }

                $placa_costo = floatval($placa_area * $placa_costo_unitario);
                $placa_costo = round($placa_costo, 2);

                $aGrab_tmp['tipoGrabado']          = $tipoGrabado;
                $aGrab_tmp['Largo']                = $placa_LargoGrab;
                $aGrab_tmp['Ancho']                = $placa_AnchoGrab;
                $aGrab_tmp['ubicacion']            = $ubicacionGrab;
                $aGrab_tmp['placa_area']           = $placa_area;
                $aGrab_tmp['placa_costo_unitario'] = $placa_costo_unitario;
                $aGrab_tmp['placa_costo']          = $placa_costo;


                // arreglo
                $costo_arreglo_tmp = $ventas_model->costo_grabado("G1 Arreglo");


                $arreglo_costo_unitario = 0;

                foreach ($costo_arreglo_tmp as $row) {

                    $arreglo_costo_unitario = floatval($row['precio_unitario']);
                }


                if (is_array($costo_arreglo_tmp)) {

                    unset($costo_arreglo_tmp);
                }


                $aGrab_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aGrab_tmp['arreglo_costo']          = $arreglo_costo_unitario;


                // tiro
                $estampado_tmp = $ventas_model->costo_grabado("G1 Estampado");

                $estampado_costo_unitario = 0;

                foreach ($estampado_tmp as $row) {

                    $tiraje_minimo = intval($row['tiraje_minimo']);
                    $tiraje_maximo = intval($row['tiraje_maximo']);

                    if ($tiraje >= $tiraje_minimo and $tiraje <= $tiraje_maximo) {

                        $estampado_costo_unitario = $row['precio_unitario'];
                        $estampado_costo_unitario = round(floatval($row['precio_unitario']), 4);

                        break;
                    }
                }

                if (is_array($estampado_tmp)) {

                    unset($estampado_tmp);
                }


                $estampado_costo_tiro = floatval($tiraje * $estampado_costo_unitario);
                $estampado_costo_tiro = round($estampado_costo_tiro, 2);

                $g1_estampado_costo_proceso = $placa_costo + $arreglo_costo_unitario + $estampado_costo_tiro;

                $aGrab_tmp['costo_unitario']    = $estampado_costo_unitario;
                $aGrab_tmp['costo_tiro']        = $estampado_costo_tiro;
                $aGrab_tmp['costo_tot_proceso'] = $g1_estampado_costo_proceso;

                //$aMermaEmp['acbGrab_G1_Estampado'] = intval($_POST['grabadotot']);

                break;
            case 'G2 Estampado':

                // placa
                $costo_placa_tmp = $ventas_model->costo_grabado("G2 Placa");

                $placa_costo_unitario = 0;

                foreach ($costo_placa_tmp as $row) {

                    $placa_costo_unitario = $row['precio_unitario'];
                    $placa_costo_unitario = round(floatval($row['precio_unitario']), 4);

                    $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                }

                if (is_array($costo_placa_tmp)) {

                    unset($costo_placa_tmp);
                }

                if ($placa_area < $placa_tamano_minimo) {

                    $placa_area = $placa_tamano_minimo;
                }

                $placa_costo = round(floatval($placa_area * $placa_costo_unitario), 2);
                $placa_costo = round($placa_costo, 2);

                $aGrab_tmp['tipoGrabado']          = $tipoGrabado;
                $aGrab_tmp['Largo']                = $placa_LargoGrab;
                $aGrab_tmp['Ancho']                = $placa_AnchoGrab;
                $aGrab_tmp['ubicacion']            = $ubicacionGrab;
                $aGrab_tmp['placa_area']           = $placa_area;
                $aGrab_tmp['placa_costo_unitario'] = $placa_costo_unitario;
                $aGrab_tmp['placa_costo']          = $placa_costo;


                // arreglo
                $costo_arreglo_tmp = $ventas_model->costo_grabado("G2 Arreglo");


                $arreglo_costo_unitario = 0;

                foreach ($costo_arreglo_tmp as $row) {

                    $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    $arreglo_costo_unitario = round($arreglo_costo_unitario, 4);
                }


                if (is_array($costo_arreglo_tmp)) {

                    unset($costo_arreglo_tmp);
                }

                $arreglo_costo = $arreglo_costo_unitario;

                $aGrab_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aGrab_tmp['arreglo_costo']          = $arreglo_costo;


                // tiro
                $estampado_tmp = $ventas_model->costo_grabado("G2 Estampado");

                $estampado_costo_unitario = 0;

                foreach ($estampado_tmp as $row) {

                    $tiraje_minimo = intval($row['tiraje_minimo']);
                    $tiraje_maximo = intval($row['tiraje_maximo']);

                    if ($tiraje >= $tiraje_minimo and $tiraje <= $tiraje_maximo) {

                        $estampado_costo_unitario = $row['precio_unitario'];

                        $estampado_costo_unitario = round(floatval($row['precio_unitario']), 4);

                        break;
                    }
                }

                if (is_array($estampado_tmp)) {

                    unset($estampado_tmp);
                }


                $estampado_costo_tiro       = floatval($tiraje * $estampado_costo_unitario);
                $estampado_costo_tiro       = round($estampado_costo_tiro, 2);
                $g2_estampado_costo_proceso = $placa_costo + $arreglo_costo + $estampado_costo_tiro;


                $aGrab_tmp['costo_unitario']    = $estampado_costo_unitario;
                $aGrab_tmp['costo_tiro']        = $estampado_costo_tiro;
                $aGrab_tmp['costo_tot_proceso'] = $g2_estampado_costo_proceso;

                //$aMermaEmp['acbGrab_G2_Estampado'] = intval($_POST['grabadotot']);

                break;
        }


        $merma_HS = $ventas_model->merma_acabados("Grabado");

        foreach ($merma_HS as $row) {

            $cantidad_minima = intval($row['cantidad_minima']);
            $cantidad        = intval($row['cantidad']);
            $por_cada_x      = intval($row['por_cada_x']);
            $adicional       = intval($row['adicional']);
        }


        if (is_array($merma_HS)) {

            unset($merma_HS);
        }


        // calcula la merma de acabados
        $merma_HS_tmp = self::calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

        $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
        $merma_HS_cortes      = $cortes;


        $tot_pliegos_HS = self::Deltax($merma_HS_tot_pliegos, $merma_HS_cortes);

        $costo_tot_pliegos_merma = round(floatval($papel_costo_unit * $tot_pliegos_HS), 2);

        $aMerma_tmp = [];

        $aMerma_tmp['merma_min']               = $merma_HS_tmp[0];
        $aMerma_tmp['merma_adic']              = $merma_HS_tmp[1];
        $aMerma_tmp['merma_tot']               = $merma_HS_tmp[2];
        $aMerma_tmp['cortes_por_pliego']       = $merma_HS_cortes;
        $aMerma_tmp['merma_tot_pliegos']       = $tot_pliegos_HS;
        $aMerma_tmp['costo_unit_merma']        = $papel_costo_unit;
        $aMerma_tmp['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


        $aGrab_tmp['mermas'] = $aMerma_tmp;

        if (is_array($aMerma_tmp)) {

            unset($aMerma_tmp);
        }


        return $aGrab_tmp;
    }


    protected function calculoHotStamping($tipoGrabadoHS, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit, $ventas_model) {

        $aAcbHS_tmp = [];

        $placa_area = 0;


        // placa
        $placa_LargoHS = $LargoHS;
        $placa_AnchoHS = $AnchoHS;
        $placa_area    = floatval($placa_LargoHS * $placa_AnchoHS);

        switch ($tipoGrabadoHS) {
            case 'Estampado':

                $db_tmp = $ventas_model->costo_hotstamping("Placa");
                //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Placa");

                $placa_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $placa_costo_unitario = $row['precio_unitario'];
                    $placa_costo_unitario = round(floatval($placa_costo_unitario), 4);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $placa_costo = floatval($placa_area * $placa_costo_unitario);
                $placa_costo = round($placa_costo, 2);

                $aAcbHS_tmp['tipoGrabado']          = $tipoGrabadoHS;
                $aAcbHS_tmp['Largo']                = $LargoHS;
                $aAcbHS_tmp['Ancho']                = $AnchoHS;
                $aAcbHS_tmp['Color']                = $ColorHS;
                $aAcbHS_tmp['placa_area']           = $placa_area;
                $aAcbHS_tmp['placa_costo_unitario'] = $placa_costo_unitario;
                $aAcbHS_tmp['placa_costo']          = $placa_costo;


                // pelicula
                $pelicula_LargoHS = $LargoHS;
                $pelicula_AnchoHS = $AnchoHS;
                $pelicula_area    = floatval($pelicula_LargoHS * $pelicula_AnchoHS);

                $db_tmp = $ventas_model->costo_hotstamping("Pelicula");
                //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Pelicula");

                $pelicula_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $pelicula_costo_unitario = $row['precio_unitario'];
                    $pelicula_costo_unitario = floatval($pelicula_costo_unitario);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }

                $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiraje);
                $pelicula_costo = round($pelicula_costo, 2);


                $aAcbHS_tmp['pelicula_Largo']          = $pelicula_LargoHS;
                $aAcbHS_tmp['pelicula_Ancho']          = $pelicula_AnchoHS;
                $aAcbHS_tmp['pelicula_area']           = $pelicula_area;
                $aAcbHS_tmp['pelicula_costo_unitario'] = $pelicula_costo_unitario;
                $aAcbHS_tmp['pelicula_costo']          = $pelicula_costo;


                $pelicula_area_costo_unitario = floatval($pelicula_area * $pelicula_costo_unitario);
                $pelicula_area_costo_unitario = round($pelicula_area_costo_unitario, 2);


                // arreglo
                $arreglo_LargoHS = $LargoHS;
                $arreglo_AnchoHS = $AnchoHS;
                $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;

                $db_tmp = $ventas_model->costo_hotstamping("Arreglo");

                $arreglo_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $arreglo_costo_unitario = $row['precio_unitario'];
                    $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                    $arreglo_costo_unitario = round($arreglo_costo_unitario, 2);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $arreglo_costo = floatval($arreglo_costo_unitario);
                $arreglo_costo = round($arreglo_costo, 2);


                $aAcbHS_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aAcbHS_tmp['arreglo_costo']          = $arreglo_costo;


                // tiro
                $db_tmp = $ventas_model->costo_hotstamping("Estampado");

                $estampado_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $tiraje_minimo = intval($row['tiraje_minimo']);
                    $tiraje_maximo = intval($row['tiraje_maximo']);

                    if ($tiraje >= $tiraje_minimo and $tiraje <= $tiraje_maximo) {

                        $estampado_costo_unitario = $row['precio_unitario'];
                        $estampado_costo_unitario = floatval($estampado_costo_unitario);
                        $estampado_costo_unitario = round($estampado_costo_unitario, 2);

                        break;
                    }
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $estampado_costo_tiro    = floatval($tiraje * $estampado_costo_unitario);
                $estampado_costo_tiro    = round($estampado_costo_tiro, 2);
                $estampado_costo_proceso = $placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro;

                $aAcbHS_tmp['costo_unitario']    = $estampado_costo_unitario;
                $aAcbHS_tmp['costo_tiro']        = $estampado_costo_tiro;
                $aAcbHS_tmp['costo_tot_proceso'] = $estampado_costo_proceso;


                //$aMermaEmp['acbHS_Estampado'] = intval($_POST['hs']);

                break;
            case 'HG1 Estampado':

                $db_tmp = $ventas_model->costo_hotstamping("HG1 Placa");

                $placa_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $placa_costo_unitario = $row['precio_unitario'];
                    $placa_costo_unitario = floatval($placa_costo_unitario);
                    $placa_costo_unitario = round($placa_costo_unitario, 4);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }

                $placa_costo = floatval($placa_area * $placa_costo_unitario);
                $placa_costo = round($placa_costo, 2);

                $aAcbHS_tmp['tipoGrabado']          = $tipoGrabadoHS;
                $aAcbHS_tmp['Largo']                = $LargoHS;
                $aAcbHS_tmp['Ancho']                = $AnchoHS;
                $aAcbHS_tmp['Color']                = $ColorHS;
                $aAcbHS_tmp['placa_area']           = $placa_area;
                $aAcbHS_tmp['placa_costo_unitario'] = $placa_costo_unitario;
                $aAcbHS_tmp['placa_costo']          = $placa_costo;


                // pelicula
                $pelicula_LargoHS = $LargoHS;
                $pelicula_AnchoHS = $AnchoHS;
                $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;

                $db_tmp = $ventas_model->costo_hotstamping("HG1 Pelicula");

                $pelicula_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $pelicula_costo_unitario = $row['precio_unitario'];
                    $pelicula_costo_unitario = floatval($pelicula_costo_unitario);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }

                $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiraje);
                $pelicula_costo = round($pelicula_costo, 2);


                $aAcbHS_tmp['pelicula_Largo']          = $pelicula_LargoHS;
                $aAcbHS_tmp['pelicula_Ancho']          = $pelicula_AnchoHS;
                $aAcbHS_tmp['pelicula_area']           = $pelicula_area;
                $aAcbHS_tmp['pelicula_costo_unitario'] = $pelicula_costo_unitario;
                $aAcbHS_tmp['pelicula_costo']          = $pelicula_costo;

                $pelicula_area_costo_unitario = floatval($pelicula_area * $pelicula_costo_unitario);
                $pelicula_area_costo_unitario = round($pelicula_area_costo_unitario, 2);


                // arreglo
                $arreglo_LargoHS = $LargoHS;
                $arreglo_AnchoHS = $AnchoHS;
                $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;

                $db_tmp = $ventas_model->costo_hotstamping("HG1 Arreglo");

                $arreglo_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $arreglo_costo_unitario = $row['precio_unitario'];
                    $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                    $arreglo_costo_unitario = round($arreglo_costo_unitario, 2);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $arreglo_costo = floatval($arreglo_costo_unitario);
                $arreglo_costo = round($arreglo_costo, 2);


                $aAcbHS_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aAcbHS_tmp['arreglo_costo']           = $arreglo_costo_unitario;


                // tiro
                $db_tmp = $ventas_model->costo_hotstamping("HG1 Estampado");

                $estampado_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $tiraje_minimo = intval($row['tiraje_minimo']);
                    $tiraje_maximo = intval($row['tiraje_maximo']);

                    if ($tiraje >= $tiraje_minimo and $tiraje <= $tiraje_maximo) {

                        $estampado_costo_unitario = $row['precio_unitario'];
                        $estampado_costo_unitario = floatval($estampado_costo_unitario);
                        $estampado_costo_unitario = round($estampado_costo_unitario, 4);

                        break;
                    }
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $estampado_costo_tiro = floatval($tiraje * $estampado_costo_unitario);
                $estampado_costo_tiro = round($estampado_costo_tiro, 2);

                $hg1_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                $aAcbHS_tmp['costo_unitario']    = $estampado_costo_unitario;
                $aAcbHS_tmp['costo_tiro']        = $estampado_costo_tiro;
                $aAcbHS_tmp['costo_tot_proceso'] = $hg1_estampado_costo_proceso;


                //$aMermaEmp['acbHS_HG1_Estampado'] = intval($_POST['hs']);

                break;
            case 'HG2 Estampado':

                $db_tmp = $ventas_model->costo_hotstamping("HG2 Placa");

                $placa_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $placa_costo_unitario = $row['precio_unitario'];
                    $placa_costo_unitario = round(floatval($placa_costo_unitario), 4);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }

                $placa_costo = round(floatval($placa_area * $placa_costo_unitario), 2);


                $aAcbHS_tmp['tipoGrabado']          = $tipoGrabadoHS;
                $aAcbHS_tmp['Largo']                = $LargoHS;
                $aAcbHS_tmp['Ancho']                = $AnchoHS;
                $aAcbHS_tmp['Color']                = $ColorHS;
                $aAcbHS_tmp['placa_area']           = $placa_area;
                $aAcbHS_tmp['placa_costo_unitario'] = $placa_costo_unitario;
                $aAcbHS_tmp['placa_costo']          = $placa_costo;


                // pelicula
                $pelicula_LargoHS = $LargoHS;
                $pelicula_AnchoHS = $AnchoHS;
                $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;

                $db_tmp = $ventas_model->costo_hotstamping("HG2 Pelicula");

                $pelicula_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $pelicula_costo_unitario = $row['precio_unitario'];
                    $pelicula_costo_unitario = floatval($pelicula_costo_unitario);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }

                $pelicula_costo = round(floatval($pelicula_area * $pelicula_costo_unitario * $tiraje), 2);


                $aAcbHS_tmp['pelicula_Largo']          = $pelicula_LargoHS;
                $aAcbHS_tmp['pelicula_Ancho']          = $pelicula_AnchoHS;
                $aAcbHS_tmp['pelicula_area']           = $pelicula_area;
                $aAcbHS_tmp['pelicula_costo_unitario'] = $pelicula_costo_unitario;
                $aAcbHS_tmp['pelicula_costo']          = $pelicula_costo;


                $pelicula_area_costo_unitario = floatval($pelicula_area * $pelicula_costo_unitario);
                $pelicula_area_costo_unitario = round($pelicula_area_costo_unitario, 2);


                // arreglo
                $arreglo_LargoHS = $LargoHS;
                $arreglo_AnchoHS = $AnchoHS;
                $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;

                $db_tmp = $ventas_model->costo_hotstamping("HG2 Arreglo");

                $arreglo_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $arreglo_costo_unitario = $row['precio_unitario'];
                    $arreglo_costo_unitario = round(floatval($arreglo_costo_unitario), 4);
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $arreglo_costo = round(floatval($arreglo_costo_unitario), 2);


                $aAcbHS_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aAcbHS_tmp['arreglo_costo']          = $arreglo_costo;


                // tiro
                $db_tmp = $ventas_model->costo_hotstamping("HG2 Estampado");

                $estampado_costo_unitario = 0;

                foreach ($db_tmp as $row) {

                    $tiraje_minimo = intval($row['tiraje_minimo']);
                    $tiraje_maximo = intval($row['tiraje_maximo']);

                    if ($tiraje >= $tiraje_minimo and $tiraje <= $tiraje_maximo) {

                        $estampado_costo_unitario = $row['precio_unitario'];
                        $estampado_costo_unitario = round(floatval($estampado_costo_unitario), 4);

                        break;
                    }
                }

                if (is_array($db_tmp)) {

                    unset($db_tmp);
                }


                $estampado_costo_tiro = round(floatval($tiraje * $estampado_costo_unitario), 2);

                $hg2_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                $aAcbHS_tmp['costo_unitario']    = $estampado_costo_unitario;
                $aAcbHS_tmp['costo_tiro']        = $estampado_costo_tiro;
                $aAcbHS_tmp['costo_tot_proceso'] = $hg2_estampado_costo_proceso;


                //$aMermaEmp['acbHS_HG2_Estampado'] = intval($_POST['hs']);

                break;
        }


        $merma_HS = $ventas_model->merma_acabados("HotStamping");

        foreach ($merma_HS as $row) {

            $cantidad_minima = intval($row['cantidad_minima']);
            $cantidad        = intval($row['cantidad']);
            $por_cada_x      = intval($row['por_cada_x']);
            $adicional       = intval($row['adicional']);
        }


        if (is_array($merma_HS)) {

            unset($merma_HS);
        }


        // calcula la merma de acabados
        $merma_HS_tmp = self::calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

        $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
        $merma_HS_cortes      = $papel_seccion;

        $tot_pliegos_HS = self::Deltax($merma_HS_tot_pliegos, $merma_HS_cortes);

        $papel_costo_unit = floatval($papel_costo_unit);
        $papel_costo_unit = round($papel_costo_unit, 2);

        $costo_tot_pliegos_merma = round(floatval($papel_costo_unit * $tot_pliegos_HS), 2);

        $aMerma_HS = [];

        $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
        $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
        $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
        $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
        $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
        $aMerma_HS['costo_unit_merma']        = $papel_costo_unit;
        $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


        $aAcbHS_tmp['mermas'] = $aMerma_HS;


        if (is_array($aMerma_HS)) {

            unset($aMerma_HS);
        }


        return $aAcbHS_tmp;
    }


    protected function calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model) {

        $costo_minimo = 0;

        switch ($tipoGrabado) {
            case 'Mate':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Mate");

                break;
            case 'Soft Touch':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch");

                break;
            case 'Anti Scratch':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch");

                break;
            case 'Superadherente':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Superadherente");

                break;
            case 'Brillante':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Brillante");

                break;
            case 'Anti Scratch Brillante':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch Brillante");

                break;
            case 'Soft Touch Brillante':

                $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch Brillante");

                break;
        }


        $laminado_costo_unitario = 0;

        foreach ($costo_laminado_tmp as $row) {

            $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
            $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

            if ($tiraje >= $laminado_tiraje_minimo and $tiraje <= $laminado_tiraje_maximo) {

                $laminado_costo_unitario = floatval($row['costo_unitario']);
                $laminado_costo_unitario = round($laminado_costo_unitario, 2);

                if ($tipoGrabado == 'Mate' or $tipoGrabado == 'Brillante') {

                    $costo_minimo = floatval($row['costo_minimo']);
                    $es_maquila   = intval($row['es_maquila']);
                }

                break;
            }
        }

        if (is_array($costo_laminado_tmp)) {

            unset($costo_laminado_tmp);
        }


        $area_laminado  = round(floatval($LargoLam / 100) * floatval($AnchoLam / 100), 4);
        $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * $tiraje);
        $costo_laminado = round($costo_laminado, 2);


        if ($costo_laminado < $costo_minimo and $costo_minimo > 0) {

            $costo_laminado = $costo_minimo;
        }


        $Lam_tmp = [];

        $Lam_tmp['tipoGrabado']       = $tipoGrabado;
        $Lam_tmp['Largo']             = $LargoLam;
        $Lam_tmp['Ancho']             = $AnchoLam;
        $Lam_tmp['area']              = $area_laminado;
        $Lam_tmp['costo_unitario']    = $laminado_costo_unitario;
        $Lam_tmp['costo_tot_proceso'] = $costo_laminado;


        $merma_Lam = $ventas_model->merma_acabados("Laminado");

        foreach ($merma_Lam as $row) {

            $cantidad_minima = intval($row['cantidad_minima']);
            $cantidad        = intval($row['cantidad']);
            $por_cada_x      = intval($row['por_cada_x']);
            $adicional       = intval($row['adicional']);
        }


        if (is_array($merma_Lam)) {

            unset($merma_Lam);
        }


        // calcula la merma de acabados
        $merma_HS_tmp = self::calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

        $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
        $merma_HS_cortes      = intval($cortes);


        $tot_pliegos_HS = self::Deltax($merma_HS_tot_pliegos, $merma_HS_cortes);


        $papel_costo_unit = round($papel_costo_unit, 4);

        $costo_tot_pliegos_merma = round(floatval($papel_costo_unit * $tot_pliegos_HS), 2);

        $aMerma_tmp = [];

        $aMerma_tmp['merma_min']               = $merma_HS_tmp[0];
        $aMerma_tmp['merma_adic']              = $merma_HS_tmp[1];
        $aMerma_tmp['merma_tot']               = $merma_HS_tmp[2];
        $aMerma_tmp['cortes_por_pliego']       = $merma_HS_cortes;
        $aMerma_tmp['merma_tot_pliegos']       = $tot_pliegos_HS;
        $aMerma_tmp['costo_unit_merma']        = $papel_costo_unit;
        $aMerma_tmp['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


        $Lam_tmp['mermas'] = $aMerma_tmp;


        if (is_array($aMerma_tmp)) {

            unset($aMerma_tmp);
        }

        return $Lam_tmp;
    }


    protected function calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model) {

        $aSuaje_tmp = [];

        $aSuaje_tmp['tipoGrabado'] = $tipoGrabado;
        $aSuaje_tmp['Largo']       = $Largo;
        $aSuaje_tmp['Ancho']       = $Ancho;
        //$aSuaje_tmp['cortes']      = $cortes;

        $perimetro_suaje = floatval(($Largo * 2) + ($Ancho * 2));

        switch ($tipoGrabado) {
            case 'Perimetral':

                // tabla suaje
                $costo_arreglo_tmp = $ventas_model->costo_suaje("Perimetral");


                $perimetral_costo_unitario = 0;

                foreach ($costo_arreglo_tmp as $row) {

                    $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    $perimetral_costo_unitario = round($perimetral_costo_unitario, 4);

                    $perimetro_minimo = intval($row['perimetro_minimo']);

                    $por_cada = intval($row['por_cada']);
                }

                if (is_array($costo_arreglo_tmp)) {

                    unset($costo_arreglo_tmp);
                }


                if ($perimetro_suaje < $perimetro_minimo) {

                    $perimetro_suaje = $perimetro_minimo;
                }

                $aSuaje_tmp['perimetro'] = $perimetro_suaje;


                $suaje_por_millar = self::Deltax($tiraje, $por_cada);

                $tabla_suaje = floatval($perimetro_suaje * $perimetral_costo_unitario);

                $aSuaje_tmp['tabla_suaje'] = $tabla_suaje;


                // arreglo suaje
                $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");

                $arreglo_costo_unitario = 0;

                foreach ($costo_arreglo_tmp as $row) {

                    $arreglo_costo_unitario = $row['costo_unitario'];
                    $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                }

                if (is_array($costo_arreglo_tmp)) {

                    unset($costo_arreglo_tmp);
                }


                $aSuaje_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aSuaje_tmp['arreglo']                = $arreglo_costo_unitario;


                // tiro
                $costo_tiro_tmp = $ventas_model->costo_suaje("Tiro");

                $tiro_costo_unitario = 0;

                foreach ($costo_tiro_tmp as $row) {

                    $tiro_costo_unitario = floatval($row['costo_unitario']);
                }


                if (is_array($costo_tiro_tmp)) {

                    unset($costo_tiro_tmp);
                }


                $tiro_por_millar = self::Deltax($tiraje, $por_cada);

                $suaje_costo_tiro    = floatval($tiro_por_millar * $tiro_costo_unitario);
                $suaje_costo_proceso = floatval($tabla_suaje + $arreglo_costo_unitario + $suaje_costo_tiro);

                $aSuaje_tmp['tiro_costo_unitario'] = $tiro_costo_unitario;
                $aSuaje_tmp['costo_tiro']          = $suaje_costo_tiro;
                $aSuaje_tmp['costo_tot_proceso']   = $suaje_costo_proceso;


                break;
            case 'Figura':

                // tabla suaje
                $costo_arreglo_tmp = $ventas_model->costo_suaje("Figura");


                $perimetral_costo_unitario = 0;

                foreach ($costo_arreglo_tmp as $row) {

                    $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    $perimetral_costo_unitario = round($perimetral_costo_unitario, 4);

                    $perimetro_minimo = intval($row['perimetro_minimo']);

                    $por_cada = intval($row['por_cada']);
                }

                if (is_array($costo_arreglo_tmp)) {

                    unset($costo_arreglo_tmp);
                }


                if ($perimetro_suaje < $perimetro_minimo) {

                    $perimetro_suaje = $perimetro_minimo;
                }

                $aSuaje_tmp['perimetro'] = $perimetro_suaje;


                $suaje_por_millar = self::Deltax($tiraje, $por_cada);

                $tabla_suaje = floatval($perimetro_suaje * $perimetral_costo_unitario);

                $aSuaje_tmp['tabla_suaje'] = $tabla_suaje;


                // arreglo suaje
                $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo Figura");

                $arreglo_costo_unitario = 0;

                foreach ($costo_arreglo_tmp as $row) {

                    $arreglo_costo_unitario = $row['costo_unitario'];
                    $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                }

                if (is_array($costo_arreglo_tmp)) {

                    unset($costo_arreglo_tmp);
                }


                $aSuaje_tmp['arreglo_costo_unitario'] = $arreglo_costo_unitario;
                $aSuaje_tmp['arreglo']                = $arreglo_costo_unitario;


                // tiro
                $costo_tiro_tmp = $ventas_model->costo_suaje("Tiro Figura");

                $tiro_costo_unitario = 0;

                foreach ($costo_tiro_tmp as $row) {

                    $tiro_costo_unitario = floatval($row['costo_unitario']);
                }

                if (is_array($costo_tiro_tmp)) {

                    unset($costo_tiro_tmp);
                }


                $tiro_por_millar = self::Deltax($tiraje, $por_cada);

                $suaje_costo_tiro    = floatval($tiro_por_millar * $tiro_costo_unitario);

                $suaje_costo_proceso = floatval($tabla_suaje + $arreglo_costo_unitario + $suaje_costo_tiro);


                $aSuaje_tmp['tiro_costo_unitario'] = $tiro_costo_unitario;
                $aSuaje_tmp['costo_tiro']          = $suaje_costo_tiro;
                $aSuaje_tmp['costo_tot_proceso']   = $suaje_costo_proceso;


                break;
        }

        $merma_S = $ventas_model->merma_acabados("Suaje");


        foreach ($merma_S as $row) {

            $cantidad_minima = intval($row['cantidad_minima']);
            $cantidad        = intval($row['cantidad']);
            $por_cada_x      = intval($row['por_cada_x']);
            $adicional       = intval($row['adicional']);
        }


        if (is_array($merma_S)) {

            unset($merma_S);
        }


        // calcula la merma de acabados
        $merma_tmp = self::calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

        $merma_tot_pliegos = intval($merma_tmp[2]);
        $merma_cortes      = intval($cortes);


        $tot_pliegos_S = self::Deltax($merma_tot_pliegos, $merma_cortes);

        $costo_tot_pliegos_merma = floatval($papel_costo_unit * $tot_pliegos_S);
        $costo_tot_pliegos_merma = round($costo_tot_pliegos_merma, 2);

        $aMerma_S = [];

        $aMerma_S['merma_min']               = $merma_tmp[0];
        $aMerma_S['merma_adic']              = $merma_tmp[1];
        $aMerma_S['merma_tot']               = $merma_tmp[2];
        $aMerma_S['cortes_por_pliego']       = $merma_cortes;
        $aMerma_S['merma_tot_pliegos']       = $tot_pliegos_S;
        $aMerma_S['costo_unit_merma']        = $papel_costo_unit;
        $aMerma_S['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;

        $aSuaje_tmp['mermas'] = $aMerma_S;


        return $aSuaje_tmp;
    }

/**** Terminan las funciones de Acabados ****/

    protected function arregloRanurado($ventas_model) {

        $ranurado_arreglo_costo = 0;

        $db_tmp = $ventas_model->costo_proceso("proc_ranurado", "Arreglo");

        foreach ($db_tmp as $row) {

            $ranurado_arreglo_costo = $row['precio_unitario'];
            $ranurado_arreglo_costo = floatval($ranurado_arreglo_costo);
        }

        return $ranurado_arreglo_costo;
    }


    protected function calculoRanurado($tiraje, $ventas_model) {

        $calculo_tmp = [];

        //$db_tmp = $ventas_model->costo_ranurado("Arreglo");
        $db_tmp = $ventas_model->costo_proceso("proc_ranurado", "Arreglo");

        $ranurado_arreglo_costo = 0;

        foreach ($db_tmp as $row) {

            $ranurado_arreglo_costo = $row['precio_unitario'];
            $ranurado_arreglo_costo = floatval($ranurado_arreglo_costo);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        //$db_tmp = $ventas_model->costo_ranurado("Por Ranura");
        $db_tmp = $ventas_model->costo_proceso("proc_ranurado", "Por Ranura");

        $ranurado_costo_unit_por_ranura = 0;

        foreach ($db_tmp as $row) {

            $ranurado_por_ranura_costo_unitario_min = floatval($row['tiraje_minimo']);
            $ranurado_por_ranura_costo_unitario_max = floatval($row['tiraje_maximo']);

            if ($tiraje >= $ranurado_por_ranura_costo_unitario_min and $tiraje <= $ranurado_por_ranura_costo_unitario_max) {

                $ranurado_costo_unit_por_ranura = $row['precio_unitario'];
                $ranurado_costo_unit_por_ranura = floatval($ranurado_costo_unit_por_ranura);

                break;
            }
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $costo_por_ranura = round(floatval($ranurado_costo_unit_por_ranura * $tiraje), 2);

        /*
        if ($base_tmp <> $alto_tmp) {

            $ranurado_arreglo_costo = floatval(2 * $ranurado_arreglo_costo);
            $costo_por_ranura       = floatval(2 * $costo_por_ranura);
        }
        */

        $calculo_tmp['tiraje']                = $tiraje;
        $calculo_tmp['arreglo']               = $ranurado_arreglo_costo;
        $calculo_tmp['costo_unit_por_ranura'] = $ranurado_costo_unit_por_ranura;
        $calculo_tmp['costo_por_ranura']      = $costo_por_ranura;
        $calculo_tmp['costo_tot_proceso']     = floatval($ranurado_arreglo_costo + $costo_por_ranura);

        if ($ranurado_arreglo_costo <= 0 or $ranurado_costo_unit_por_ranura <= 0) {

            $calculo_tmp['costo_tot_proceso'] = 0;
        }

        return $calculo_tmp;
    }


    protected function calculoEncuadernacion($tiraje, $id_papel_exterior_cajon, $enc_cortes_fcaj, $ventas_model) {

        $calculo_tmp = [];

        $costo_tot_proceso        = 0;

        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Perforado para iman y puesta de iman");

        $perf_iman_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $perf_iman_tiraje_min = intval($row['tiraje_minimo']);
            $perf_iman_tiraje_max = intval($row['tiraje_maximo']);

            if ($tiraje >= $perf_iman_tiraje_min and $tiraje <= $perf_iman_tiraje_max) {

                $perf_iman_costo_unitario = $row['precio_unitario'];
                $perf_iman_costo_unitario = round(floatval($perf_iman_costo_unitario), 2);

                break;
            }
        }

        $perf_iman_y_puesta = round(floatval($perf_iman_costo_unitario * $tiraje), 2);


        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Despunte de esquinas para cajon");

        $enc_costo_unitario_esquinas = 0;

        foreach ($db_tmp as $row) {

            $enc_costo_unitario_esquinas = $row['precio_unitario'];
            $enc_costo_unitario_esquinas = round(floatval($enc_costo_unitario_esquinas), 4);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $despunte_de_esquinas_para_cajon = round(floatval($enc_costo_unitario_esquinas * $tiraje), 2);


        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Encajada");

        $enc_encajada_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_encajada_costo_unitario = $row['precio_unitario'];
            $enc_encajada_costo_unitario = round(floatval($enc_encajada_costo_unitario), 4);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $enc_costo_encajada = round(floatval($enc_encajada_costo_unitario * $tiraje), 2);

        $calculo_tmp['tiraje']                          = $tiraje;
        $calculo_tmp['perf_iman_costo_unitario']        = $perf_iman_costo_unitario;
        $calculo_tmp['perf_iman_y_puesta']              = $perf_iman_y_puesta;
        $calculo_tmp['despunte_costo_unitario']         = $enc_costo_unitario_esquinas;
        $calculo_tmp['despunte_de_esquinas_para_cajon'] = $despunte_de_esquinas_para_cajon;
        $calculo_tmp['encajada_costo_unitario']         = $enc_encajada_costo_unitario;
        $calculo_tmp['costo_encajada']                  = $enc_costo_encajada;
        $calculo_tmp['costo_tot_proceso']               = $despunte_de_esquinas_para_cajon + $enc_costo_encajada;

        return $calculo_tmp;
    }


    protected function calculoEncuadernacion_FCaj($tiraje, $id_papel_exterior_cajon, $enc_cortes_fcaj, $ventas_model) {

        $calculo_tmp = [];

        $costo_tot_proceso = 0;

        $calculo_tmp['tiraje'] = $tiraje;

        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Forrado de cajon");


        $enc_costo_unitario_forrado = 0;

        foreach ($db_tmp as $row) {

            $enc_costo_unitario_forrado = $row['precio_unitario'];
            $enc_costo_unitario_forrado = round(floatval($enc_costo_unitario_forrado), 2);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $calculo_tmp['costo_unit_forrado_cajon'] = round(floatval($enc_costo_unitario_forrado), 4);
        $calculo_tmp['forrado_de_cajon']         = round( floatval($enc_costo_unitario_forrado * $tiraje), 4);

        $costo_tot_proceso = $costo_tot_proceso + $calculo_tmp['forrado_de_cajon'];


        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Empalme de cajon");


        $empalme_cajon_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $empalme_cajon_costo_unitario = $row['precio_unitario'];
            $empalme_cajon_costo_unitario = round(floatval($empalme_cajon_costo_unitario), 2);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $calculo_tmp['empalme_cajon_costo_unitario'] = round( floatval($empalme_cajon_costo_unitario), 4);
        $calculo_tmp['empalme_de_cajon']             = round( floatval($empalme_cajon_costo_unitario * $tiraje), 2);


        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Arreglo de Forrado de cajon");


        $enc_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_arreglo_forrado_tiraje_min = intval($row['tiraje_minimo']);
            $enc_arreglo_forrado_tiraje_max = intval($row['tiraje_maximo']);

            if ($tiraje >= $enc_arreglo_forrado_tiraje_min and $tiraje <= $enc_arreglo_forrado_tiraje_max) {

                $enc_costo_unitario = $row['precio_unitario'];
                $enc_costo_unitario = round(floatval($enc_costo_unitario), 4);
            }
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $costo_tot_proceso = $costo_tot_proceso + $enc_costo_unitario;

        $calculo_tmp['arreglo_de_forrado_de_cajon'] = $enc_costo_unitario;
        $calculo_tmp['costo_tot_proceso']           = $costo_tot_proceso;

        //if ($enc_costo_unitario_forrado <= 0 or $enc_costo_unitario <= 0) {
        if ($enc_costo_unitario_forrado <= 0) {

            $calculo_tmp['costo_tot_proceso'] = 0;
        }


        // Mermas de encuadernacion
        $Merma_SerEmp_tmp = $ventas_model->getCotizaMermaSerigrafia();

        foreach ($Merma_SerEmp_tmp as $row) {

            $c_1color        = intval($row['c_1color']);
            $cantidad_minima = intval($row['cantidad_minima']);
            $por_cada_x      = intval($row['por_cada_x']);
            $adic_1color     = intval($row['adicional_1color']);
        }

        if (is_array($Merma_SerEmp_tmp)) {

            unset($Merma_SerEmp_tmp);
        }


        $merma_color      = 0;
        $merma_color_adic = 0;
        $num_tintas_adic  = 0;


        if ($tiraje < $cantidad_minima) {

            $merma_color      = $c_1color;
            $merma_color_adic = 0;
            $merma_tot        = $merma_color;
        } else {

            $cantidad_adic = $tiraje - $cantidad_minima;

            $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

            $merma_color      = $c_1color;
            $merma_color_adic = $cant_adic * $adic_1color;
            $merma_tot        = $merma_color + $merma_color_adic;
        }


        $merma_tot = $merma_color + $merma_color_adic;


        $aMerma_enc_Fcaj = [];

        $aMerma_enc_Fcaj['merma_min']  = $merma_color;
        $aMerma_enc_Fcaj['merma_adic'] = $merma_color_adic;
        $aMerma_enc_Fcaj['merma_tot']  = $merma_tot;

        //$enc_cortes = json_decode($_POST['aCortes'], true);

        $tot_pliegos_merma_enc = self:: deltax($merma_tot, $enc_cortes_fcaj);
        $tot_pliegos_merma_enc = round($tot_pliegos_merma_enc, 2);


        $enc_costo_unit_fcaj_tmp = $ventas_model->getPrecioPapelById($id_papel_exterior_cajon);

        $enc_costo_unit_fcaj = round(floatval($enc_costo_unit_fcaj_tmp), 2);

        if (is_array($enc_costo_unit_fcaj_tmp)) {

            unset($enc_costo_unit_fcaj_tmp);
        }


        $aMerma_enc_Fcaj['cortes_por_pliego'] = $enc_cortes_fcaj;
        $aMerma_enc_Fcaj['merma_tot_pliegos'] = $tot_pliegos_merma_enc;
        $aMerma_enc_Fcaj['costo_unit_merma']  = $enc_costo_unit_fcaj;

        $aMerma_enc_Fcaj['costo_tot_pliegos_merma'] = round(floatval($enc_costo_unit_fcaj * $tot_pliegos_merma_enc), 2);


        $calculo_tmp['mermas'] = $aMerma_enc_Fcaj;

        if (is_array($aMerma_enc_Fcaj)) {

            unset($aMerma_enc_Fcaj);
        }

        return $calculo_tmp;
    }


    // ***** Ojo *****
    // revisar la tabla proc_cartera
    // porque no tiene dato suficientes
    // para calcular los costos de elaboración cartera
    protected function calculoElabCartera($proceso, $seccion, $base_tmp, $alto_tmp, $tiraje, $ventas_model) {

        $db_tmp = $ventas_model->costo_proceso($proceso, $seccion);

        $elab_car_forro_costo_unit = 0;

        foreach ($db_tmp as $row) {

            $elab_car_rango = "";

            $elab_car_forro_ancho = floatval($row['ancho']);
            $elab_car_forro_largo = floatval($row['largo']);
            $elab_car_rango       = trim(strval($row['rango']));

            if ( strlen($elab_car_rango) > 0 and ($base_tmp > $elab_car_forro_ancho or $alto_tmp > $elab_car_forro_largo) ) {

                $elab_car_forro_costo_unit = floatval($row['precio_unitario']);

                break;
            } elseif ($base_tmp < $elab_car_forro_ancho and $alto_tmp < $elab_car_forro_largo) {

                $elab_car_forro_costo_unit = floatval($row['precio_unitario']);

                break;
            }

            /*
            if ($base_tmp < $elab_car_forro_ancho and $alto_tmp < $elab_car_forro_largo) {

                $elab_car_forro_costo_unit = floatval($row['precio_unitario']);

                break;
            } elseif ($base_tmp > $elab_car_forro_ancho and $alto_tmp > $elab_car_forro_largo) {

                $elab_car_forro_costo_unit = floatval($row['precio_unitario']);

                break;
            }
            */
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $elab_forro_car_costo = floatval($elab_car_forro_costo_unit * $tiraje);


        $calculo_tmp = [];

        $calculo_tmp['tiraje']          = $tiraje;
        $calculo_tmp['costo_unit']      = $elab_car_forro_costo_unit;
        $calculo_tmp['forro_costo_tot'] = $elab_forro_car_costo;

        return $calculo_tmp;

    }


    protected function calculoForradoCajon($tiraje, $enc_cortes_fcaj, $id_papel_exterior_cajon, $ventas_model) {

        $calculo_tmp_Fcaj = [];

        $db_tmp = $ventas_model->costo_encuadernacion("Forrado de cajon");
        //$db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Forrado");

        $enc_forrado_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_forrado_costo_unitario = $row['precio_unitario'];
            $enc_forrado_costo_unitario = round(floatval($enc_forrado_costo_unitario), 2);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $enc_costo_forrado_cajon = round(floatval($enc_forrado_costo_unitario * $tiraje), 2);

        $calculo_tmp_Fcaj['tiraje']                   = $tiraje;
        $calculo_tmp_Fcaj['costo_unit_forrado_cajon'] = $enc_forrado_costo_unitario;
        $calculo_tmp_Fcaj['forrado_de_cajon']         = $enc_costo_forrado_cajon;


        $db_tmp = $ventas_model->costo_encuadernacion("Arreglo de Forrado de cajon");

        $enc_arreglo_forrado = 0;

        foreach ($db_tmp as $row) {

            $enc_arreglo_forrado = $row['precio_unitario'];
            $enc_arreglo_forrado = round(floatval($enc_arreglo_forrado), 2);
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $calculo_tmp_Fcaj['arreglo'] = $enc_arreglo_forrado;


        $db_tmp = $ventas_model->costo_encuadernacion("Empalme de cajon");

        $enc_empalme_cajon_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_empalme_cajon_costo_unitario = $row['precio_unitario'];
            $enc_empalme_cajon_costo_unitario = round(floatval($enc_empalme_cajon_costo_unitario), 2);
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $enc_costo_empalme_cajon = round(floatval($enc_empalme_cajon_costo_unitario * $tiraje), 2);

        $costo_tot_proceso = round(floatval($enc_costo_forrado_cajon + $enc_arreglo_forrado + $enc_costo_empalme_cajon), 2);


        $calculo_tmp_Fcaj['empalme_cajon_costo_unitario'] = $enc_empalme_cajon_costo_unitario;
        $calculo_tmp_Fcaj['empalme_de_cajon']             = $enc_costo_empalme_cajon;
        $calculo_tmp_Fcaj['costo_tot_proceso']            = $costo_tot_proceso;

       if ($enc_costo_forrado_cajon <= 0 or $enc_arreglo_forrado <= 0 or $enc_costo_empalme_cajon <= 0) {

            $calculo_tmp_Fcaj['costo_tot_proceso'] = 0;
        }

        // Mermas de encuadernacion
        $Merma_SerEmp_tmp = $ventas_model->getCotizaMermaSerigrafia();

        foreach ($Merma_SerEmp_tmp as $row) {

            $c_1color        = intval($row['c_1color']);
            $cantidad_minima = intval($row['cantidad_minima']);
            $por_cada_x      = intval($row['por_cada_x']);
            $adic_1color     = intval($row['adicional_1color']);
        }

        if (is_array($Merma_SerEmp_tmp)) {

            unset($Merma_SerEmp_tmp);
        }


        $merma_color      = 0;
        $merma_color_adic = 0;
        $num_tintas_adic  = 0;


        if ($tiraje < $cantidad_minima) {

            $merma_color      = $c_1color;
            $merma_color_adic = 0;
            $merma_tot        = $merma_color;
        } else {

            $cantidad_adic = $tiraje - $cantidad_minima;

            $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

            $merma_color      = $c_1color;
            $merma_color_adic = $cant_adic * $adic_1color;
            $merma_tot        = $merma_color + $merma_color_adic;
        }


        $merma_tot = $merma_color + $merma_color_adic;


        $aMerma_enc_Fcaj = [];

        $aMerma_enc_Fcaj['merma_min']         = $merma_color;
        $aMerma_enc_Fcaj['merma_adic']        = $merma_color_adic;
        $aMerma_enc_Fcaj['merma_tot']         = $merma_tot;
        $aMerma_enc_Fcaj['cortes_por_pliego'] = $enc_cortes_fcaj;

        $tot_pliegos_merma_enc = self:: deltax($merma_tot, $enc_cortes_fcaj);
        $tot_pliegos_merma_enc = round($tot_pliegos_merma_enc, 2);


        $enc_costo_unit_fcaj_tmp = $ventas_model->getPrecioPapelById($id_papel_exterior_cajon);

        $enc_costo_unit_fcaj = round(floatval($enc_costo_unit_fcaj_tmp), 2);

        if (is_array($enc_costo_unit_fcaj_tmp)) {

            unset($enc_costo_unit_fcaj_tmp);
        }


        $aMerma_enc_Fcaj['merma_tot_pliegos']       = $tot_pliegos_merma_enc;
        $aMerma_enc_Fcaj['costo_unit_merma']        = $enc_costo_unit_fcaj;
        $aMerma_enc_Fcaj['costo_tot_pliegos_merma'] = round(floatval($enc_costo_unit_fcaj * $tot_pliegos_merma_enc), 2);


        $calculo_tmp_Fcaj['mermas'] = $aMerma_enc_Fcaj;

        if (is_array($aMerma_enc_Fcaj)) {

            unset($aMerma_enc_Fcaj);
        }

        return $calculo_tmp_Fcaj;

    }


    protected function calculoAccesorios($Tipo_accesorio, $tiraje,  $ventas_model) {

        $costo_accesorios_tmp = $ventas_model->costo_accesorios($Tipo_accesorio);

        $costo_unit_accesorio = 0;

        foreach ($costo_accesorios_tmp as $row) {

            $costo_unit_accesorio = $row['costo_unitario'];
            $costo_unit_accesorio = floatval($costo_unit_accesorio);
        }

        if (is_array($costo_accesorios_tmp)) {

            unset($costo_accesorios_tmp);
        }


        $costo_accesorio = floatval($tiraje * $costo_unit_accesorio);
        $costo_accesorio = round($costo_accesorio, 2);

        $aCosto_accesorios = [];

        $aCosto_accesorios['accesorio_costo_unitario'] = $costo_unit_accesorio;
        $aCosto_accesorios['costo_tot_proceso']        = $costo_accesorio;

        return $aCosto_accesorios;
    }


    protected function calculoBancos($Tipo_banco, $tiraje, $ventas_model) {

        $costo_unit_banco = 0;

        $costo_bancos_tmp = $ventas_model->costo_bancos($Tipo_banco);

        foreach ($costo_bancos_tmp as $row) {

            $costo_unit_banco = $row['precio'];
            $costo_unit_banco = floatval($costo_unit_banco);
        }

        if (is_array($costo_bancos_tmp)) {

            unset($costo_bancos_tmp);
        }


        $costo_banco = floatval($tiraje * $costo_unit_banco);
        $costo_banco = round($costo_banco, 2);


        $aCosto_Banco = [];

        $aCosto_Banco['banco_costo_unitario'] = $costo_unit_banco;
        $aCosto_Banco['costo_tot_proceso']    = $costo_banco;

        return $aCosto_Banco;
    }


    protected function calculoCierre($Tipo_cierre, $tiraje, $numpares, $ventas_model) {

        $costo_cierres_tmp = $ventas_model->costo_cierres($Tipo_cierre);


        $costo_unit_cierre = 0;

        foreach ($costo_cierres_tmp as $row) {

            $costo_unit_cierre = $row['precio'];
            $costo_unit_cierre = floatval($costo_unit_cierre);
        }

        if (is_array($costo_cierres_tmp)) {

            unset($costo_cierres_tmp);
        }


        $aCosto_cierre = [];

        $costo_cierre = round(floatval($tiraje * $numpares * $costo_unit_cierre), 2);


        $aCosto_cierre['cierre_costo_unitario'] = $costo_unit_cierre;
        $aCosto_cierre['costo_tot_proceso']     = $costo_cierre;


        return $aCosto_cierre;
    }


    protected function detalle_proc_Accesorios($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        $cuantos_db = count($sql_tabla_temp_db);

        for ($j = 0; $j < $cuantos_db; $j++) {

            $aJson_tmp[$j]['id_odt']               = intval($sql_tabla_temp_db[$j]['id_odt']);
            $aJson_tmp[$j]['id_modelo']       = intval($sql_tabla_temp_db[$j]['id_modelo']);
            $aJson_tmp[$j]['Tipo_accesorio']       = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['tipo_accesorio'])));
            $aJson_tmp[$j]['Tipo']                 = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['tipo'])));
            $aJson_tmp[$j]['tiraje']               = intval($sql_tabla_temp_db[$j]['tiraje']);
            $aJson_tmp[$j]['Largo']                = floatval($sql_tabla_temp_db[$j]['largo']);
            $aJson_tmp[$j]['Ancho']                = floatval($sql_tabla_temp_db[$j]['ancho']);
            $aJson_tmp[$j]['Color']                = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['color'])));
            $aJson_tmp[$j]['costo_unit_accesorio'] = floatval($sql_tabla_temp_db[$j]['costo_unit']);
            $aJson_tmp[$j]['costo_accesorios']     = floatval($sql_tabla_temp_db[$j]['costo_tot_accesorio']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Bancos($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        $cuantos_db = count($sql_tabla_temp_db);

        for ($j = 0; $j < $cuantos_db; $j++) {

            $aJson_tmp[$j]['id_odt']           = intval($sql_tabla_temp_db[$j]['id_odt']);
            $aJson_tmp[$j]['Tipo_banco']       = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['tipo'])));
            $aJson_tmp[$j]['tiraje']           = intval($sql_tabla_temp_db[$j]['tiraje']);
            $aJson_tmp[$j]['largo']            = intval($sql_tabla_temp_db[$j]['largo']);
            $aJson_tmp[$j]['ancho']            = intval($sql_tabla_temp_db[$j]['ancho']);
            $aJson_tmp[$j]['profundidad']      = intval($sql_tabla_temp_db[$j]['profundidad']);
            $aJson_tmp[$j]['Suaje']            = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['suaje'])));
            $aJson_tmp[$j]['costo_unit_banco'] = floatval($sql_tabla_temp_db[$j]['costo_unit']);
            $aJson_tmp[$j]['costo_bancos']     = floatval($sql_tabla_temp_db[$j]['costo_tot_banco']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Cierres($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        $cuantos_db = count($sql_tabla_temp_db);

        for ($j = 0; $j < $cuantos_db; $j++) {

            $aJson_tmp[$j]['id_odt']         = intval($sql_tabla_temp_db[$j]['id_odt']);
            $aJson_tmp[$j]['Tipo_cierre']    = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['tipo_cierre'])));
            $aJson_tmp[$j]['tiraje']         = intval($sql_tabla_temp_db[$j]['tiraje']);
            $aJson_tmp[$j]['numpares']       = intval($sql_tabla_temp_db[$j]['numpares']);
            $aJson_tmp[$j]['largo']          = intval($sql_tabla_temp_db[$j]['largo']);
            $aJson_tmp[$j]['ancho']          = intval($sql_tabla_temp_db[$j]['ancho']);
            $aJson_tmp[$j]['tipo']           = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['tipo'])));
            $aJson_tmp[$j]['color']          = utf8_encode(trim(strval($sql_tabla_temp_db[$j]['color'])));
            $aJson_tmp[$j]['costo_unitario'] = floatval($sql_tabla_temp_db[$j]['costo_unit']);
            $aJson_tmp[$j]['costo_cierre']   = floatval($sql_tabla_temp_db[$j]['costo_tot_cierre']);
        }

        return $aJson_tmp;
    }


    /**** Inicia sumas por seccion *************/

    protected function sumaImp($nombSeccion, $aJson_tmp) {

        $sumaSeccion = 0;

        if (array_key_exists($nombSeccion, $aJson_tmp)) {

            $aNombSeccion = $aJson_tmp[$nombSeccion];

            if (array_key_exists("Offset", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Offset'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

            if (array_key_exists("Digital", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Digital'];
                $cuantos   = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }


            if (array_key_exists("Serigrafia", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Serigrafia'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

        }

        return $sumaSeccion;
    }


    protected function sumaAcb($nombSeccion, $aJson_tmp) {

        $sumaSeccion = 0;

        if (array_key_exists($nombSeccion, $aJson_tmp)) {

            $aNombSeccion = $aJson_tmp[$nombSeccion];

            if (array_key_exists("Barniz_UV", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Barniz_UV'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

            if (array_key_exists("Corte_Laser", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Corte_Laser'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }


            if (array_key_exists("Grabado", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Grabado'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }


            if (array_key_exists("HotStamping", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['HotStamping'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }


            if (array_key_exists("Laminado", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Laminado'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

            if (array_key_exists("Suaje", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Suaje'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

        }

        return $sumaSeccion;
    }


    protected function sumaBancos($nombSeccion, $aJson_tmp) {

        $sumaSeccion = 0;

        if (array_key_exists($nombSeccion, $aJson_tmp)) {

            $aNombSeccion = $aJson_tmp[$nombSeccion];

            if (array_key_exists("Offset", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Offset'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

            if (array_key_exists("Digital", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Digital'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }


            if (array_key_exists("Serigrafia", $aNombSeccion)) {

                $aNomb_tmp = $aNombSeccion['Serigrafia'];
                $cuantos = count($aNomb_tmp);

                for ($i = 0; $i < $cuantos; $i++) {

                    $sumaSeccion = $sumaSeccion + $aNomb_tmp[$i]['costo_tot_proceso'];
                }
            }

        }

        return $sumaSeccion;
    }

}
