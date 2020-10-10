<?php

class Regalo extends Controller {

    public function index() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');

        $models = $options_model->getBoxModels();

        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cajas/index.php';
            require 'application/views/templates/footer.php';
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }

    // Calculadora Regalo (id_modelo = 4)
    function regaloCalc($base, $alto, $profundidad_cajon, $profundidad_tapa, $grosor_carton, $grosor_tapa) {

        $calculadora = array();

        $b = floatval($base);
        $h = floatval($alto);
        $p = floatval($profundidad_cajon);
        $T = floatval($profundidad_tapa);
        $g = floatval($grosor_carton);
        $G = floatval($grosor_tapa);

        $e = round(floatval($g / 20), 2);
        $E = round(floatval($G / 20), 2);


        $b1  = round(floatval($b + (2 * $e)), 2);
        $h1  = round(floatval($h + (2 * $e)), 2);
        $p1  = round(floatval($p + $e), 2);
        $x   = round(floatval((2 * $p1) + $b1), 2);
        $y   = round(floatval((2 * $p1) + $h1), 2);
        $x1  = round(floatval($x + (1.2)), 2);
        $y1  = round(floatval($y + (1.2)), 2);
        $x11 = round(floatval($x + (1)), 2);
        $y11 = round(floatval($y + (1)), 2);
        $b11 = round(floatval($x + (2 * 1.6)), 2);
        $h11 = round(floatval($y + (2 * 1.6)), 2);
        $f   = round(floatval($b11 + (1.5)), 2);
        $k   = round(floatval($h11 + (1.5)), 2);

        //tapa
        $B   = round(floatval($b1 + (2 * (0.15))), 2);
        $H   = round(floatval($h1 + (2 * (0.15))), 2);
        $B1  = round(floatval($B + (2 * $E)), 2);
        $H1  = round(floatval($H + (2 * $E)), 2);
        $T   = round($T, 2);
        $X   = round(floatval((2 * $T) + $B1), 2);
        $Y   = round(floatval((2 * $T) + $H1), 2);
        $X1  = round(floatval($X + (1.2)), 2);
        $Y1  = round(floatval($Y + (1.2)), 2);
        $X11 = round(floatval($X + (1)), 2);
        $Y11 = round(floatval($Y + (1)), 2);
        $B11 = round(floatval($X + (2 * ($E + 1.4))), 2);
        $H11 = round(floatval($Y + (2 * ($E + 1.4))), 2);
        $F   = round(floatval($B11 + (1.5)), 2);
        $K   = round(floatval($H11 + (1.5)), 2);

        $calculadora["b"] = $b;
        $calculadora["h"] = $h;
        $calculadora["p"] = $p;
        $calculadora["T"] = $T;
        $calculadora["g"] = $g;
        $calculadora["G"] = $g;

        $calculadora["e"] = $e;
        $calculadora["E"] = $E;

        // base
        $calculadora["b1"]  = $b1;
        $calculadora["h1"]  = $h1;
        $calculadora["p1"]  = $p1;
        $calculadora["x"]   = $x;
        $calculadora["y"]   = $y;
        $calculadora["x1"]  = $x1;
        $calculadora["y1"]  = $y1;
        $calculadora["x11"] = $x11;
        $calculadora["y11"] = $y11;
        $calculadora["b11"] = $b11;
        $calculadora["h11"] = $h11;
        $calculadora["f"]   = $f;
        $calculadora["k"]   = $k;


        // tapa
        $calculadora["B"]   = $B;
        $calculadora["H"]   = $H;
        $calculadora["B1"]  = $B1;
        $calculadora["H1"]  = $H1;
        $calculadora["T"]   = $T;
        $calculadora["X"]   = $X;
        $calculadora["Y"]   = $Y;
        $calculadora["X1"]  = $X1;
        $calculadora["Y1"]  = $Y1;
        $calculadora["X11"] = $X11;
        $calculadora["Y11"] = $Y11;
        $calculadora["B11"] = $B11;
        $calculadora["H11"] = $H11;
        $calculadora["F"]   = $F;
        $calculadora["K"]   = $K;

        return $calculadora;
    }


    public function caja_regalo() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            $procesos      = $options_model->getProcessCatalog();
            $papers        = $options_model->getPapers();
            $cartones      = $options_model->getCartones();
            $cierres       = $options_model->getCostoCierre();
            $acabados      = $options_model->getCostoAcabados();
            $accesorios    = $options_model->getCostoAccesorios();
            $descuentos    = $options_model->getCostoDescuentos();
            $bancos        = $options_model->getCostoBancos();
            $impresiones   = $options_model->getImpresiones();
            $Digital       = $options_model->getProcDigital();
            $ALaminados    = $options_model->getALaminados();
            $AHotStamping  = $options_model->getAHotStamping();
            $Colores       = $options_model->getAHotStampingColor();
            $AGrabados     = $options_model->getAGrabados();
            $APEspeciales  = $options_model->getAPEspeciales();
            $ABarnizUV     = $options_model->getABarnizUV();
            $ASuaje        = $options_model->getASuaje();
            $ALaser        = $options_model->getALaser();
            $TipoImp       = $options_model->getTipoSerigrafia();
            $modeloscaj    = $options_model->getBoxModels();
            $TipoListon    = $options_model->getTipoListon();
            $ColoresListon = $options_model->getColoresListon();
            $Porcentajes   = $options_model->getPorcentajes();
            $Herrajes      = $options_model->getHerraje();

            $nombrecliente = utf8_encode($this->getClient($options_model));

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/regalo/plantilla.php';
            echo "<script>$('#divDerecho').empty()</script>";
            echo "<script>$('#divIzquierdo').empty()</script>";
            echo "<script>$('#divDerecho').hide()</script>";
            require 'application/views/cotizador/regalo/caja_regalo.php';
            echo "<script>$('#divDerecho').show('slow')</script>";

            /*
            // plantilla
            echo "<script>$('#form_modelo_0').hide();</script>";

            echo "<script>$('#form_modelo_1_derecho').show('slow');</script>";
            */
            require 'application/views/templates/footer.php';
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    // regresa el JSON para renderizar la odt
    public function modCajaRegalo() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');
        $regalo_model  = $this->loadModel('RegaloModel');


        if(!$login->isLoged()) {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }


        if (isset($_GET['num_odt'])) {

            $odt = $_GET['num_odt'];
            $odt = trim(strval($odt));
            $odt = strtoupper($odt);
            $odt = strval($odt);

            $_POST['odt'] = $odt;

            $num_odt = $_GET['num_odt'];
            $num_odt = trim(strval($num_odt));
        } else {

            return false;
        }


        /*
        $l_existe = $ventas_model->chkODT();
        $l_existe = self::checaODT($odt);

        if ($l_existe) {

            return;
        }
        */

        $cierres           = $options_model->getCostoCierre();
        $acabados          = $options_model->getCostoAcabados();
        $accesorios        = $options_model->getCostoAccesorios();
        $procesos          = $options_model->getProcessCatalog();
        $papers            = $options_model->getPapers();
        $cartones          = $options_model->getCartones();
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


        $aJson = [];

        $tabla_db = $ventas_model->getNumOdt($num_odt);

        foreach ($tabla_db as $row) {

            $id_odt            = intval($row['id_odt']);
            $id_usuario        = intval($row['id_usuario']);
            $id_cliente        = intval($row['id_cliente']);
            $tiraje            = intval($row['tiraje']);
            $diametro          = intval($row['diametro']);
            $profundidad       = intval($row['profundidad']);
            $altura            = intval($row['alto']);
            $id_vendedor       = intval($row['id_vendedor']);
            $costo_total       = floatval($row['costo_total']);
            $subtotal          = floatval($row['subtotal']);
            $utilidad          = floatval($row['utilidad']);
            $iva               = floatval($row['iva']);
            $ISR               = floatval($row['ISR']);
            $comisiones        = floatval($row['comisiones']);
            $indirecto         = floatval($row['indirecto']);
            $venta             = floatval($row['venta']);
            $descuento         = floatval($row['descuento']);
            $descuento_pcte    = floatval($row['descuento_pcte']);
            $empaque           = floatval($row['empaque']);
            $mensajeria        = floatval($row['mensajeria']);
            $procesos          = trim(strval($row['procesos']));
            $fecha_odt         = strtotime($row['fecha_odt']);
            $hora_odt          = strtotime($row['hora_odt']);
        }


        $fecha = date("Y/m/d", $fecha_odt);
        $hora  = date("H:i:s", $hora_odt);


        $aJson['papel_BCaj']    = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelbcaj");
        $aJson['papel_CirCaj']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelcircaj");
        $aJson['papel_FextCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelfextcaj");
        $aJson['papel_PomCaj']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelpomcaj");
        $aJson['papel_FintCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelfintcaj");
        $aJson['papel_BasTap']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelbastap");
        $aJson['papel_CirTap']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelcirtap");
        $aJson['papel_ForTap']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelfortap");
        $aJson['papel_FexTap']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelfexttap");
        $aJson['papel_FinTap']  = $ventas_model->getPapelTabla($id_odt, "cot_reg_papelfinttap");

        // carton cajon
        $aJson['carton_cir'] = $ventas_model->getIdCartonTabla($id_odt, "cot_reg_cartoncir");
        $id_grosor_carton    = intval($aJson['carton_cir']['id_cajon']);

        $id_papel_bcaj    = intval($aJson['papel_BCaj']['id_papel']);
        $id_papel_circaj  = intval($aJson['papel_CirCaj']['id_papel']);
        $id_papel_fextcaj = intval($aJson['papel_FextCaj']['id_papel']);
        $id_papel_pomcaj  = intval($aJson['papel_PomCaj']['id_papel']);
        $id_papel_fintcaj = intval($aJson['papel_FintCaj']['id_papel']);
        $id_papel_bastap  = intval($aJson['papel_BasTap']['id_papel']);
        $id_papel_cirtap  = intval($aJson['papel_CirTap']['id_papel']);
        $id_papel_fortap  = intval($aJson['papel_ForTap']['id_papel']);
        $id_papel_fexttap = intval($aJson['papel_FexTap']['id_papel']);
        $id_papel_finttap = intval($aJson['papel_FinTap']['id_papel']);


        $carton_db = $options_model->getDatos($id_grosor_carton);

        $id_carton     = intval($carton_db['id_papel']);
        $grosor_carton = intval($carton_db['numcarton']);

        if (is_array($carton_db)) {

            unset($carton_db);
        }


        /*
        $procesos = str_replace("[", "", $procesos);
        $procesos = str_replace("]", "", $procesos);
        $procesos = str_replace('"', "", $procesos);
        */


        $tabla_db = $ventas_model->getClientById($id_cliente);

        foreach ($tabla_db as $row) {

            $Nombre_cliente = $row['nombre'];
            $Nombre_cliente = utf8_encode(trim(strval($Nombre_cliente)));
        }

        $nombrecliente = $Nombre_cliente;

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }



        $tabla_db = $ventas_model->getNombUsuario($id_usuario);

        foreach ($tabla_db as $row) {

            $id_tienda    = intval($row['id_tienda']);
            $nomb_usuario = trim(strval($row['nombre_usuario']));
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        $aJson['mensaje']         = "OK";
        $aJson['error']           = "";
        $aJson['id_odt']          = $id_odt;
        $aJson['num_odt']         = $num_odt;
        $aJson['Fecha']           = $fecha;
        $aJson['hora']            = $hora;
        $aJson['modelo']          = $id_modelo;
        $aJson['id_cliente']      = $id_cliente;
        $aJson['Nombre_cliente']  = $Nombre_cliente;
        $aJson['id_usuario']      = $id_usuario;
        $aJson['tiraje']          = $tiraje;
        $aJson['id_tienda']       = $id_tienda;
        $aJson['diametro']        = $diametro;
        $aJson['profundidad']     = $profundidad;
        $aJson['altura']          = $altura;
        $aJson['costo_odt']       = $costo_total;
        $aJson['costo_subtotal']  = $subtotal;
        $aJson['Utilidad']        = $utilidad;
        $aJson['iva']             = $iva;
        $aJson['comisiones']      = $comisiones;
        $aJson['indirecto']       = $indirecto;
        $aJson['ventas']          = $venta;
        $aJson['descuento']       = $descuento;
        $aJson['descuento_pctje'] = $descuento_pcte;
        $aJson['ISR']             = $ISR;
        $aJson['empaque']         = $empaque;
        $aJson['mensajeria']      = $mensajeria;
        //$aJson['procesos']        = $procesos;

        $aJson['id_grosor_carton'] = $id_grosor_carton;
        $aJson['id_vendedor']      = $id_vendedor;
        $aJson['id_papel_bcaj']    = $id_papel_bcaj;
        $aJson['id_papel_circaj']  = $id_papel_circaj;
        $aJson['id_papel_fextcaj'] = $id_papel_fextcaj;
        $aJson['id_papel_pomcaj']  = $id_papel_pomcaj;
        $aJson['id_papel_fintcaj'] = $id_papel_fintcaj;
        $aJson['id_papel_bastap']  = $id_papel_bastap;
        $aJson['id_papel_cirtap']  = $id_papel_cirtap;
        $aJson['id_papel_fortap']  = $id_papel_fortap;
        $aJson['id_papel_fexttap'] = $id_papel_fexttap;
        $aJson['id_papel_finttap'] = $id_papel_finttap;



        // empiezan los costos variables (procesos)

        $num_procesos = 0;

        if (strlen($procesos) > 0) {

            if ($procesos[strlen($procesos) -1 ] === ";") {

                $procesos = substr($procesos, 0, strlen($procesos) - 1);
            }

            $tabla_procesos = explode(";", $procesos);

            $num_procesos = count($tabla_procesos);
        } else {

        }

        // Inicia procesos

        $prefijo = "cot_reg_";
        $len_prefijo = strlen($prefijo);

        for ($i = 0; $i < $num_procesos; $i++) {

            $nombre_tabla_tmp   = trim(strval($tabla_procesos[$i]));
            $nombreProcesoTabla = substr($nombre_tabla_tmp, $len_prefijo);
            $proceso            = substr($nombre_tabla_tmp, $len_prefijo, 3);

            $aOffset_tmp     = "";
            $aOffset_tmp_len = 0;

            switch ($proceso) {

                case 'off':

                    $nombre_seccion_tmp = substr($nombreProcesoTabla, strlen("offset"));

                    $grupo_seccion = 'aImp' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getOffsetTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);


                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]["Offset"][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'dig':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_dig") - 1);

                    $grupo_seccion = 'aImp' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getDigitalTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);


                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]["Digital"][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'ser':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_ser") - 1);

                    $grupo_seccion = 'aImp' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getSerigrafiaTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);


                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]["Serigrafia"][$ii] = $aOffset_tmp[$ii];
                    }


                    break;
                case 'bar':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_barnizuv") - 1);

                    $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getBarnizuvTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);


                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]["Barniz"][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'las':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_laser") - 1);

                    $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getLaserTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);

                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]['Laser'][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'gra':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_grab") - 1);

                    $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getGrabadoTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);

                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]['Grabado'][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'lam':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_lam") - 1);

                    $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getLaminadoTabla($id_odt, $nombre_tabla_tmp);

                    $aOffset_tmp_len = count($aOffset_tmp);

                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]['Laminado'][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'sua':

                    $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_suaje") - 1);

                    $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                    $aOffset_tmp     = $regalo_model->getSuajeTabla($id_odt, $nombre_tabla_tmp);
                    $aOffset_tmp_len = count($aOffset_tmp);

                    for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                        $aJson[$grupo_seccion]['Suaje'][$ii] = $aOffset_tmp[$ii];
                    }

                    break;
                case 'acc':

                    $aJson['Accesorios'] = self::detalle_proc_Accesorios($id_odt, "cot_accesorios", $ventas_model);

                    break;
                case 'ban':

                    $aJson['Bancos'] = self::detalle_proc_Bancos($id_odt, "cot_bancos", $ventas_model);

                    break;
                case 'cie':

                    $aJson['Cierres'] = self::detalle_proc_Cierres($id_odt, "cot_cierres", $ventas_model);

                    break;
            }

            $proceso = substr($nombre_tabla_tmp, $len_prefijo, 2);

            if( $proceso == "hs"){

                $nombre_seccion_tmp = substr($nombre_tabla_tmp, $len_prefijo + strlen("_hs") - 1);

                $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                $aOffset_tmp     = $regalo_model->getHotStampingTabla($id_odt, $nombre_tabla_tmp);
                $aOffset_tmp_len = count($aOffset_tmp);


                for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                    $aJson[$grupo_seccion]['HotStamping'][$ii] = $aOffset_tmp[$ii];
                }
            }
        }


        json_encode($aJson);


        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/cotizador/cajas.php';

        echo "<script>$('#form_modelo_0').hide();</script>";

        require 'application/views/cotizador/mod_cajas_regalo.php';

        echo "<script>$('#form_modelo_1_derecho').show('slow');</script>";

        require 'application/views/templates/footer.php';
    }


    // Empieza el calculo de circular
    public function saveCaja() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');
        $regalo_model  = $this->loadModel('RegaloModel');


        if( !$login->isLoged() ) {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }


        $aJson     = [];
        $id_modelo = 4;

        $odt = strip_tags(trim($_POST['odt']));
        $odt = strtoupper($odt);
        $odt = strval($odt);

        $_POST['odt'] = $odt;

        //$l_existe = $ventas_model->chkODT();
        $l_existe = self::checaODT($odt);

        if ($l_existe) {

            self::mError($aJson, $mensaje, "Ya existe esta ODT; No debe grabar esta ODT;");
            //$aJson['error'] = "Ya existe esta ODT; No debe grabar esta ODT;";

            return json_encode($aJson);
        }


        $tiraje = $_POST['qty'];
        $tiraje = intval($tiraje);


        if (isset($_POST['submit'])) {

            if ($tiraje <= 0) {

                echo "Oops! Por favor capture todos los datos.";

                return false;
            }
        }


        if ( (!isset($_SESSION["id_usuario"])) or (session_status() == PHP_SESSION_NONE) or (false == array_key_exists("id_usuario", $_SESSION)) or (false == array_key_exists("id_tienda", $_SESSION) ) ) {

            // "success", "notmodified", "error", "timeout", "abort", or "parsererror";

            self::mError($aJson, $mensaje, "Sesion terminada;");
            //$aJson['error'] = "Sesion terminada.;";

            return json_encode($aJson);
        }


        $id_usuario = $_SESSION['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_tienda = $_SESSION['id_tienda'];
        $id_tienda = intval($id_tienda);


        $num_dec2 = 2;
        $num_dec4 = 4;

        $cantidad        = 0;
        $costo_total     = 0;
        $costo_corte     = 0;
        $cantidad_offset = 0;


        $modelo = $_POST['modelo'];
        $modelo = intval($modelo);

        $base = 0;
        $base = $_POST['base'];
        $base = floatval($base);

        $alto = 0;
        $alto = $_POST['alto'];
        $alto = floatval($alto);

        $profundidad_cajon = 0;
        $profundidad_cajon = $_POST['profundidad_cajon'];
        $profundidad_cajon = floatval($profundidad_cajon);

        $profundidad_tapa = 0;
        $profundidad_tapa = $_POST['profundidad_tapa'];
        $profundidad_tapa = floatval($profundidad_tapa);

        $grosor_carton = 0;
        $grosor_carton = $_POST['grosor_carton'];
        $grosor_carton = floatval($grosor_carton);

        $grosor_tapa = 0;
        $grosor_tapa = $_POST['grosor_tapa'];
        $grosor_tapa = floatval($grosor_tapa);

        $nombre_cliente = $_POST['nombre_cliente'];

        $id_cliente = $ventas_model->getIdClient($nombre_cliente);


        $aCalculadora = self::regaloCalc($base, $alto, $profundidad_cajon, $profundidad_tapa, $grosor_carton, $grosor_tapa);


        $NombProcesos = "";

    // aJson
        // crea el array principal
        $aJson['mensaje']             = "Correcto";
        $aJson['error']               = "";
        $aJson['id_cliente']          = $id_cliente;
        $aJson['nombre_cliente']      = $nombre_cliente;
        $aJson['nomb_odt']            = trim(strval($_POST['odt']));
        $aJson['Fecha']               = date("Y-m-d");
        $aJson['modelo']              = $id_modelo;
        $aJson['tiraje']              = $tiraje;
        $aJson['id_usuario']          = $id_usuario;
        $aJson['id_tienda']           = $id_tienda;
        $aJson['base']                = $base;
        $aJson['alto']                = $alto;
        $aJson['base']                = $base;
        $aJson['profundidad_cajon']   = $profundidad_cajon;
        $aJson['profundidad_tapa']    = $profundidad_tapa;
        $aJson['grosor_carton']       = $grosor_carton;
        $aJson['grosor_tapa']         = $grosor_tapa;

        $aJson['costo_odt']           = 0;
        $aJson['costo_subtotal']      = 0;
        $aJson['Utilidad']            = 0;
        $aJson['iva']                 = 0;
        $aJson['comisiones']          = 0;
        $aJson['indirecto']           = 0;
        $aJson['ventas']              = 0;
        $aJson['descuento']           = 0;
        $aJson['descuento_pctje']     = floatval($_POST['descuento_pctje']);
        $aJson['ISR']                 = 0;
        $aJson['empaque']             = 0;
        $aJson['mensajeria']          = 0;
        $aJson['costo_papeles']       = 0;
        $aJson['costo_cartones']      = 0;
        $aJson['costos_fijos']        = 0;

        $aJson['ranurado']            = 0;
        $aJson['ranurado_tapa']       = 0;
        $aJson['encuadernacion']      = 0;
        $aJson['elab_FCaj']           = 0;
        $aJson['elab_FTap']           = 0;
        $aJson['costo_grosor_carton'] = 0;
        $aJson['costo_grosor_tapa']   = 0;
        $aJson['costo_bancos']        = 0;
        $aJson['costo_cierres']       = 0;
        $aJson['costo_accesorios']    = 0;

        $aJson['costo_EmpCaj']        = 0;
        $aJson['costo_FCaj']          = 0;
        $aJson['costo_EmpTap']        = 0;
        $aJson['costo_FTap']          = 0;

        $aJson['costo_tot_corte_carton'] = 0;
        $aJson['costo_tot_papel_corte']  = 0;
        $aJson['costo_corte_refine_emp'] = 0;
        $aJson['costo_tot_corte_papel']  = 0;
        $aJson['costo_tot_corte_refine'] = 0;


        $aJson['Calculadora'] = $aCalculadora;


        $subtotal = 0;


    // Grosor Carton
        $id_grosor_carton = 0;

        $id_grosor_carton_db = $options_model->getCartonById($grosor_carton);

        $id_grosor_carton = $id_grosor_carton_db['id_papel'];
        $id_grosor_carton = intval($id_grosor_carton);

        //$cart_ancho = floatval($id_grosor_carton_db['ancho']);
        //$cart_largo = floatval($id_grosor_carton_db['largo']);

        $cart_ancho = $aJson['Calculadora']['b1'];
        $cart_largo = $aJson['Calculadora']['b1'];

        $aPapel_tmp = self::calculaPapel("grosor_carton", $grosor_carton, $cart_ancho, $cart_largo, $tiraje, $options_model, $ventas_model);


        $aJson['costo_grosor_carton'] = $aPapel_tmp;

        $subtotal = $subtotal + $aPapel_tmp['tot_costo'];


    // corte cajon
        $corte_cajon = intval($aPapel_tmp['calculadora']['corte']['cortesT']);

        if ($corte_cajon <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al carton del cajon;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al carton del cajon;";
        }


        $aCortes = [];

        $aCortes['cajon'] = $corte_cajon;


    // Grosor Tapa
        $id_grosor_tapa = 0;

        $id_grosor_tapa_db = $options_model->getCartonById($grosor_tapa);

        $id_grosor_tapa = $id_grosor_tapa_db['id_papel'];
        $id_grosor_tapa = intval($id_grosor_tapa);

        $cart_ancho = floatval($id_grosor_tapa_db['ancho']);
        $cart_largo = floatval($id_grosor_tapa_db['largo']);

        $aPapel_tmp = self::calculaPapel("grosor_tapa", $grosor_tapa, $cart_ancho, $cart_largo, $tiraje, $options_model, $ventas_model);


        $aJson['costo_grosor_tapa'] = $aPapel_tmp;


        $subtotal = $subtotal + $aPapel_tmp['tot_costo'];


        $aJson['costo_cartones'] = $aJson['costo_grosor_carton']['tot_costo'] + $aJson['costo_grosor_tapa']['tot_costo'];


    // corte tapa
        $corte_tapa = intval($aPapel_tmp['calculadora']['corte']['cortesT']);

        if ($corte_tapa <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al carton de la tapa;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al carton de la tapa;";
        }


        $aCortes['tapa'] = $corte_tapa;


        // Empalme del cajon
        $x1 = $aCalculadora['x1'];         // largo
        $x1 = floatval($x1);

        $y1 = $aCalculadora['y1'];         // ancho
        $y1 = floatval($y1);


        // Forro Cajon
        $f = $aCalculadora['f'];           // largo
        $f = floatval($f);

        $k = $aCalculadora['k'];           // ancho
        $k = floatval($k);


        // Empalme de la Tapa
        $X1 = $aCalculadora['X1'];         // largo
        $X1 = round(floatval($X1), 2);

        $Y1 = $aCalculadora['Y1'];         // ancho
        $Y1 = floatval($Y1);


        // Forro de la Tapa
        $F = $aCalculadora['F'];       // largo
        $F = floatval($F);

        $K = $aCalculadora['K'];       // ancho
        $K = floatval($K);


        $id_papel_empalme      = intval($_POST['optEC']);
        $id_papel_forro_cajon  = intval($_POST['optFC']);
        $id_papel_empalme_tapa = intval($_POST['optET']);
        $id_papel_forro_tapa   = intval($_POST['optFT']);


    // corte Empalme
        $secc_ancho = floatval($y1);
        $secc_largo = floatval($x1);

        $aPapel_tmp = self::calculaPapel("Empalme", $id_papel_empalme, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model);

        if (intval($aPapel_tmp['calculadora']['corte']['cortesT']) <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al pliego en Empalme;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Empalme;";
        }

        //$aPapelEmp = [];

        //$aPapelEmp = $aPapel_tmp;

        $aCortes['empalme']  = intval($aPapel_tmp['calculadora']['corte']['cortesT']);


/**************** Inicia el calculo de todos los papeles **************/

    // calcular los papeles

        $id_papel_Emp    = 0;
        $id_papel_FCaj   = 0;
        $id_papel_EmpTap = 0;
        $id_papel_FTap   = 0;


        $tot_costo_papeles = 0;


    /*********** Empalme del Cajon *************/

        $id_papel_empalme = intval($id_papel_empalme);

        $secc_ancho = floatval($y1);
        $secc_largo = floatval($x1);

        $aPapel_tmp = self::calculaPapel("empalme", $id_papel_empalme, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model);

        if (intval($aPapel_tmp['corte']) <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al pliego en Empalme del cajon;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Empalme del cajon;";
        }

        $aJson['cortes']['papel_Emp'] = $aPapel_tmp['corte'];

        $aJson['papel_Emp'] = $aPapel_tmp;

        $tot_costo_papeles = $tot_costo_papeles + $aPapel_tmp['tot_costo'];

        $subtotal = $subtotal + $aPapel_tmp['tot_costo'];

        if ($aPapel_tmp['tot_costo'] <= 0) {

            self::mError($aJson, $mensaje, "No existe costo para el papel en empalme del cajon;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Empalme del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Forro del Cajon *************/


        $id_papel_forro_cajon = intval($id_papel_forro_cajon);

        $secc_ancho = floatval($k);
        $secc_largo = floatval($f);

        $aPapel_tmp = self::calculaPapel("FCaj", $id_papel_forro_cajon, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model);

        if (intval($aPapel_tmp['corte']) <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al pliego en Forro del cajon;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Forro del cajon;";
        }

        $aJson['cortes']['papel_FCaj'] = $aPapel_tmp['corte'];

        $aJson['papel_FCaj'] = $aPapel_tmp;

        $tot_costo_papeles = $tot_costo_papeles + $aPapel_tmp['tot_costo'];

        $subtotal = $subtotal + $aPapel_tmp['tot_costo'];

        if ($aPapel_tmp['tot_costo'] <= 0) {

            self::mError($aJson, $mensaje, "No existe costo para el papel en: Forro del cajon;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }


    /*********** Empalme de la Tapa *************/

        $id_papel = intval($id_papel_empalme_tapa);

        $secc_ancho = floatval($Y1);
        $secc_largo = floatval($X1);

        $aPapel_tmp = self::calculaPapel("FextCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model);

        if (intval($aPapel_tmp['corte']) <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al pliego en Empalme de la Tapa;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Empalme de la Tapa;";
        }

        $aJson['cortes']['papel_EmpTap'] = $aPapel_tmp['corte'];

        $aJson['papel_EmpTap'] = $aPapel_tmp;

        $tot_costo_papeles = $tot_costo_papeles + $aPapel_tmp['tot_costo'];

        $subtotal = $subtotal + $aPapel_tmp['tot_costo'];

        if ($aPapel_tmp['tot_costo'] <= 0) {

            self::mError($aJson, $mensaje, "No existe costo para el papel en empalme de la Tapa;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Empalme de la Tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Forro de la Tapa *************/

        $id_papel = intval($id_papel_forro_tapa);

        $secc_ancho = floatval($K);
        $secc_largo = floatval($F);

        $aPapel_tmp = self::calculaPapel("PomCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model);

        if (intval($aPapel_tmp['corte']) <= 0) {

            self::mError($aJson, $mensaje, "Las medidas del corte son mayores al pliego en Forro de la Tapa;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Forro de la Tapa;";
        }

        $aJson['cortes']['papel_FTap'] = $aPapel_tmp['corte'];

        $aJson['papel_FTap'] = $aPapel_tmp;

        $tot_costo_papeles = $tot_costo_papeles + $aPapel_tmp['tot_costo'];

        $subtotal = $subtotal + $aPapel_tmp['tot_costo'];

        if ($aPapel_tmp['tot_costo'] <= 0) {

            self::mError($aJson, $mensaje, "No existe costo para el papel en Forro de la Tapa;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro de la Tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }


        $aJson['costo_papeles'] = $tot_costo_papeles;

/**************** Termina el calculo de todos los papeles **************/


        $aMerma = [];



/******************* Inicia Costos fijos *************************/

    // corte(guillotina)

        // empalme cajon
        $aJson['costo_corte_carton_empcaj'] = [];

        $cortes_pliego_emp = $aCortes['empalme'];

        $aJson['costo_corte_carton_empcaj'] = self::costo_corte("Corte", $tiraje, $cortes_pliego_emp, $ventas_model);

        $aJson['costo_tot_corte_carton'] = $aJson['costo_corte_carton_empcaj']['tot_costo_corte'];


        // empalme tapa
        $aJson['costo_corte_carton_emptap'] = [];

        $cortes_pliego_emp = $aCortes['empalme'];

        $aJson['costo_corte_carton_emptap'] = self::costo_corte("Corte", $tiraje, $cortes_pliego_emp, $ventas_model);

        $aJson['costo_tot_corte_carton'] = $aJson['costo_corte_carton_emptap']['tot_costo_corte'];


        // corte papel empalme
        $cortes_papel_cajon = $aCortes['empalme'];

        $aJson['costo_papel_corte']     = self::costo_corte("Corte", $tiraje, $cortes_papel_cajon, $ventas_model);
        $aJson['costo_tot_corte_papel'] = $aJson['costo_papel_corte']['tot_costo_corte'];


        // corte refine empalme
        $cortes_papel_refine = $aCortes['empalme'];

        $aJson['costo_corte_refine_emp'] = self::costo_corte("Corte", $tiraje, $cortes_papel_refine, $ventas_model);
        $aJson['costo_tot_corte_refine'] = $aJson['costo_corte_refine_emp']['tot_costo_corte'];



    /****************** ranurado ********************************/


        $costos_fijos = 0;

        $costo_ranurado = self::calculoRanurado($tiraje, $ventas_model);

        $aJson['ranurado'] = $costo_ranurado;

        $subtotal = $subtotal + $costo_ranurado['costo_tot_proceso'];

        $costos_fijos = $costos_fijos + $costo_ranurado['costo_tot_proceso'];

        if ($costo_ranurado['costo_tot_proceso'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe algun costo para ranurado;";
        }


    // areglo ranurado
        $aJson['arreglo_ranurado_hor_emp'] = 0;
        $aJson['arreglo_ranurado_ver_emp'] = 0;

        $arreglo_ranurado                  = self::arregloRanurado($ventas_model);
        $aJson['arreglo_ranurado_hor_emp'] = $arreglo_ranurado;

        if ($base > $alto or $base < $alto) {

            $aJson['arreglo_ranurado_ver_emp'] = $arreglo_ranurado;
        }


    /****************** ranurado tapa ********************************/


        $costos_fijos = 0;


        $costo_ranurado_tapa = self::calculoRanurado($tiraje, $ventas_model);

        $aJson['ranurado_tapa'] = $costo_ranurado_tapa;

        $subtotal = $subtotal + $costo_ranurado_tapa['costo_tot_proceso'];

        $costos_fijos = $costos_fijos + $costo_ranurado_tapa['costo_tot_proceso'];

        if ($costo_ranurado_tapa['costo_tot_proceso'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe algun costo para ranurado tapa;";
        }


    /********************* encuadernacion ******************************/

        $enc_cortes_emp = intval($aJson['cortes']['papel_Emp']);

        $id_papel_emp = intval($aJson['papel_Emp']['id_papel']);

        $aJson['encuadernacion'] = self::calculoEncuadernacion($tiraje, $enc_cortes_emp, $id_papel_emp, $ventas_model);

        $temp = floatval($aJson['encuadernacion']['costo_tot_proceso']);

        $costos_fijos = $costos_fijos + $temp;

        $subtotal = $subtotal + $temp;


        if ($temp <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para encuadernacion;";
        }


    /******* despunte de esquinas emnpalme cajon ******/

        $desp_tmp = self::calculoEncuadernacion($tiraje, $id_papel_emp, $enc_cortes_emp, $ventas_model);


        $costo_unit_despunte_esquinas = $desp_tmp['despunte_costo_unitario'];
        $costo_tot_despunte_esquinas  = $desp_tmp['despunte_de_esquinas_para_cajon'];

        //$tiraje = intval($desp_tmp['tiraje']);

        $desp_tmp = [];

        $desp_temp['tiraje']             = $tiraje;
        $desp_temp['costo_unit']         = $costo_unit_despunte_esquinas;
        $desp_temp['costo_tot_despunte'] = $costo_tot_despunte_esquinas;

        $aJson['despunte_esquinas_empcaj'] = $desp_temp;

        $desp_temp = [];


    /************ forro exterior del cajon  ******************/

        $aJson['elab_FCaj'] = self::calculoForradoCajon($tiraje, $aJson['cortes']['papel_FCaj'], $id_papel_FCaj, $ventas_model);

        $temp = floatval($aJson['elab_FCaj']['costo_tot_proceso']);

        $costos_fijos = $costos_fijos + $temp;

        $subtotal = $subtotal + $temp;

        if ($temp <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para forro del cajon;";
        }

        // forro cajon
        $cortes_pliego_fcaj = $aJson['cortes']['papel_FCaj'];

        $aJson['costo_corte_papel_fcaj'] = self::costo_corte("Corte", $tiraje, $cortes_pliego_fcaj, $ventas_model);

        $aJson['costo_tot_corte_papel']  = $aJson['costo_tot_corte_papel'] + $aJson['costo_corte_papel_fcaj']['tot_costo_corte'];


        //suaje(fijo)

        $tipoGrabado = "Perimetral";

    // falta definir el tamaño del suaje fijo

        $Largo            = $aJson['costo_grosor_carton']['calculadora']['corte_largo'];
        $Ancho            = $aJson['costo_grosor_carton']['calculadora']['corte_ancho'];
        $papel_costo_unit = $aJson['costo_grosor_carton']['costo_unit_papel'];
        $cortes           = $aJson['costo_grosor_carton']['corte'];
        $tot_pliegos      = $aJson['costo_grosor_carton']['tot_pliegos'];

        $aJson['suaje_fcaj_fijo'] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);




////


    /************ Forro de la Tapa  ******************/

        $aJson['elab_FTap'] = self::calculoForradoCajon($tiraje, $aJson['cortes']['papel_FTap'], $id_papel_FTap, $ventas_model);

        $temp = floatval($aJson['elab_FTap']['costo_tot_proceso']);

        $costos_fijos = $costos_fijos + $temp;

        $subtotal = $subtotal + $temp;

        if ($temp <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para forro de la tapa;";
        }


        $aJson['costos_fijos'] = $costos_fijos;


/************** Termina Costos fijos *************************/



/******************* inicia boton de Impresion ******************************/


        $mensaje = "ERROR";
        $error   = "No existe costo para ";



    /****************** Inicia los calculos de Empalme del Cajon *****************/

        $secc_sufijo = "Emp";
        $nomb_inner  = "papel_" . $secc_sufijo;

        // Base del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpEC'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);


        $num_rows = count($Tipo_proceso_tmp2);

        $a_tmp             = $aJson[$nomb_inner];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];


        $aOffEmp      = [];
        $aOff_maq_Emp = [];
        $aDigEmp      = [];
        $aSerEmp      = [];

        // boton impresion
        if ($num_rows > 0) {

            for ($i = 0; $i < $num_rows; $i++) {

                $Nombre_proceso         = "";
                $laminas_db_tmp         = "";
                $laminas_db_num_color   = 0;
                $arreglo_db_tmp         = "";
                $tiro_db_tmp            = "";
                $pantone_db_tmp         = "";
                $arreglo_pantone_db_tmp = "";

                $num_tintas                        = 0;
                $costo_unitario_laminas            = 0;
                $costo_laminas_offset              = 0;
                $arreglo_tiraje_max                = 0;
                $arreglo_num_color                 = 0;
                $arreglo_costo_unitario            = 0;
                $costo_arreglo_offset              = 0;
                $tiro_por_millar                   = 0;
                $costo_unitario_tiro               = 0;
                $alfa                              = 0;
                $costo_tiro_offset                 = 0;
                $pantone_tiraje_max                = 0;
                $pantone_por_millar                = 0;
                $costo_unitario_pantone            = 0;
                $costo_pantone_offset              = 0;
                $arreglo_pantone_color             = 0;
                $costo_unitario_arreglo_de_pantone = 0;
                $costo_arreglo_de_pantone          = 0;
                $maquila_por_millar                = 0;


                $i = intval($i);

                $Nombre_proceso = $Tipo_proceso_tmp[$i]["Tipo_impresion"];


                $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
                $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);

                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    // merma offset
                    $cantidad_offset = $tiraje;

                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];
                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = parent::calculoOffset("Tiro", $id_papel_Emp, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = parent::calculoOffset("Tiro Pantone", $id_papel_Emp, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }

                        if (!self::checaCostos($offset_tiro, "Offset")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset(Empalme del Cajon);";
                        }

                        $aOffEmp[$i] = $offset_tiro;

                        $aOffEmp[$i]["mermas"] = $aMerma;

                        $subtotal = $subtotal + $offset_tiro['costo_tot_proceso'];

                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_Emp[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aOff_maq_Emp[$i]['costo_tot_proceso'];

                        if (!self::checaCostos($aOff_maq_Emp[$i], "Offset_Maquila")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Empalme del Cajon);";
                        }
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    //$nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    //$nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $tam0 = self::calcTamDigital($corte_ancho_proceso, $corte_largo_proceso);

                    $tam          = "";
                    $tam1         = 0;
                    $nomb_tam_emp = "";

                    if (count($tam0) > 0) {

                        $tam          = $tam0[0];
                        $tam1         = $tam0[1];
                        $nomb_tam_emp = $tam0['tipo_digital'];
                    }


                    if ( $tam1 ) {

                        //$papel_digital =  calculaPapel("BCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $options_model, $ventas_model);

                        $aDigEmp[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aDigEmp[$i]['costo_tot_proceso'];

                        if ($aDigEmp[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "Digital. No cabe con las medidas proporcionadas (Base del cajon);";
                        } elseif (!self::checaCostos($aDigEmp[$i], "Digital")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Digital. No existe costo (Empalme del cajon);";
                        }
                    } else {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error .  "Digital. No cabe con las medidas proporcionadas en Empalme del cajon;";

                        $aDigEmp[$i]['cabe_digital']      = "NO";
                        $aDigEmp[$i]['cantidad']          = $tiraje;
                        $aDigEmp[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigEmp[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigEmp[$i]['imp_ancho']         = 0;
                        $aDigEmp[$i]['imp_largo']         = 0;
                        $aDigEmp[$i]["costo_unitario"]    = 0;
                        $aDigEmp[$i]["costo_tot_proceso"] = 0;

                        $aMerma_DigBCaj = [];

                        $aMerma_DigBCaj['merma_min']               = 0;
                        $aMerma_DigBCaj['merma_adic']              = 0;
                        $aMerma_DigBCaj['merma_tot']               = 0;
                        $aMerma_DigBCaj['cortes_por_pliego']       = 0;
                        $aMerma_DigBCaj['merma_tot_pliegos']       = 0;
                        $aMerma_DigBCaj['costo_unit_papel_merma']  = 0;
                        $aMerma_DigBCaj['costo_tot_pliegos_merma'] = 0;


                        $aDigEmp[$i]["mermas"] = $aMerma_DigBCaj;

                        if (is_array($aMerma_DigBCaj)) {

                            unset($aMerma_DigBCaj);
                        }
                    }
                }


                if ($Nombre_proceso === "Serigrafia") {

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $tipo_offset_serigrafia = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $cortes_pliego = intval($aJson['cortes'][$nomb_inner]);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]['costo_unit_papel']);


                    $aSerEmp[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                    $subtotal = $subtotal + $aSerEmp[$i]['costo_tot_proceso'];

                    if ( !self::checaCostos($aSerEmp[$i], "Serigrafia") ) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Base del Cajon);";
                    }


                    $aSerEmp[$i]['mermas'] = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);
                }
            }
        }


        if (count($aOffEmp) > 0) {

            $aOffEmp_R = array_values($aOffEmp);

            $aJson['aImpEmp']['Offset'] = $aOffEmp_R;

            $NombProcesos = $NombProcesos . "cot_reg_offsetempcaj;";

            unset($aOffEmp);
            unset($aOffEmp_R);
        }


        if (count($aOff_maq_Emp) > 0) {

            $aOff_maq_Emp_R = array_values($aOff_maq_Emp);

            $aJson['aImpEmp']['Maquila'] = $aOff_maq_Emp_R;

            $NombProcesos = $NombProcesos . "cot_reg_offset_maq_empcaj;";

            unset($aOff_maq_Emp);
            unset($aOff_maq_Emp_R);
        }


        if (count($aDigEmp) > 0) {

            $aDigEmp_R = array_values($aDigEmp);

            $aJson['aImpEmp']['Digital'] = $aDigEmp_R;

            $NombProcesos = $NombProcesos . "cot_reg_digempcaj;";

            unset($aDigEmp);
            unset($aDigEmp_R);
        }


        if (count($aSerEmp) > 0) {

            $aSerEmp_R = array_values($aSerEmp);

            $aJson['aImpEmp']['Serigrafia'] = $aSerEmp_R;

            $NombProcesos = $NombProcesos . "cot_reg_serempcaj;";

            unset($aSerEmp);
            unset($aSerEmp_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /******************* Termina los calculos de la Empalme del Cajon ***************/


    /*************** Inicia los calculos de Forro del cajon ***************/


        $secc_sufijo = "FCaj";
        $nomb_inner  = "papel_" . $secc_sufijo;

        // Forro del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFC'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp             = $aJson[$nomb_inner];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];

        $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
        $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);

        $aOffFCaj      = [];
        $aOff_maq_FCaj = [];
        $aDigFCaj      = [];
        $aSerFCaj      = [];


        if ($num_rows > 0) {

            for ($i = 0; $i < $num_rows; $i++) {

                $Nombre_proceso         = "";
                $laminas_db_tmp         = "";
                $laminas_db_num_color   = 0;
                $arreglo_db_tmp         = "";
                $tiro_db_tmp            = "";
                $pantone_db_tmp         = "";
                $arreglo_pantone_db_tmp = "";

                $num_tintas                        = 0;
                $costo_unitario_laminas            = 0;
                $costo_laminas_offset              = 0;
                $arreglo_tiraje_max                = 0;
                $arreglo_num_color                 = 0;
                $arreglo_costo_unitario            = 0;
                $costo_arreglo_offset              = 0;
                $tiro_por_millar                   = 0;
                $costo_unitario_tiro               = 0;
                $alfa                              = 0;
                $costo_tiro_offset                 = 0;
                $pantone_tiraje_max                = 0;
                $pantone_por_millar                = 0;
                $costo_unitario_pantone            = 0;
                $costo_pantone_offset              = 0;
                $arreglo_pantone_color             = 0;
                $costo_unitario_arreglo_de_pantone = 0;
                $costo_arreglo_de_pantone          = 0;
                $maquila_por_millar                = 0;


                $i = intval($i);

                $Nombre_proceso = $Tipo_proceso_tmp[$i]["Tipo_impresion"];


                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    // merma offset
                    $cantidad_offset = $tiraje;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);


                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);


                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
                    $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];
                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }

                        if (!self::checaCostos($offset_tiro, "Offset")) {

                                $aJson['mensaje'] = $mensaje;
                                $aJson['error']   = $aJson['error'] . $error . "Offset(Forro del Cajon);";
                        }

                        $aOffFCaj[$i]           = $offset_tiro;
                        $aOffFCaj[$i]["mermas"] = $aMerma;

                        $subtotal = $subtotal + $aOffFCaj[$i]['costo_tot_proceso'];

                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FCaj[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aOff_maq_FCaj[$i]['costo_tot_proceso'];

                        if (!self::checaCostos($aOff_maq_FCaj[$i], "Offset_Maquila")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Forro del cajon);";
                        }
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $tam0 = self::calcTamDigital($corte_ancho_proceso, $corte_largo_proceso);

                    $tam          = "";
                    $tam1         = 0;
                    $nomb_tam_emp = "";

                    if (count($tam0) > 0) {

                        $tam          = $tam0[0];
                        $tam1         = $tam0[1];
                        $nomb_tam_emp = $tam0['tipo_digital'];
                    }

                    if ( $tam1 ) {

                        $aDigFCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aDigFCaj[$i]['costo_tot_proceso'];

                        if ($aDigFCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas (Forro del cajon);";
                        } elseif (!self::checaCostos($aDigFCaj[$i], "Digital")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital (Forro del cajon);";
                        }
                    } else {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Digital (Forro del cajon);";

                        $aDigFCaj[$i]['cabe_digital']      = "NO";
                        $aDigFCaj[$i]['cantidad']          = $tiraje;
                        $aDigFCaj[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFCaj[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFCaj[$i]['imp_ancho']         = 0;
                        $aDigFCaj[$i]['imp_largo']         = 0;
                        $aDigFCaj[$i]["costo_unitario"]    = 0;
                        $aDigFCaj[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFCaj[$i]["mermas"] = $aMerma_Dig;

                        if (is_array($aMerma_Dig)) {

                            unset($aMerma_Dig);
                        }
                    }
                }


                if ($Nombre_proceso === "Serigrafia") {

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $tipo_offset_serigrafia = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cortes_pliego    = intval($aJson['cortes'][$nomb_inner]);
                    $costo_unit_papel = floatval($aJson[$nomb_inner]['costo_unit_papel']);

                    $aSerFCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $papel_corte_ancho, $papel_corte_largo, $ventas_model);


                    $subtotal = $subtotal + $aSerFCaj[$i]['costo_tot_proceso'];

                    if ( !self::checaCostos($aSerFCaj[$i], "Serigrafia") ) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Forro del Cajon);";
                    }


                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);

                    $aSerFCaj[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffFCaj) > 0) {

            $aOffFCaj_R = array_values($aOffFCaj);

            $aJson['aImpFCaj']['Offset'] = $aOffFCaj_R;

            $NombProcesos = $NombProcesos . "cot_reg_offsetfcaj;";

            unset($aOffFCaj);
            unset($aOffFCaj_R);
        }


        if (count($aOff_maq_FCaj) > 0) {

            $aOff_maq_FCaj_R = array_values($aOff_maq_FCaj);

            $aJson['aImpFCaj']['Maquila'] = $aOff_maq_FCaj_R;

            $NombProcesos = $NombProcesos . "cot_reg_offset_maq_fcaj;";

            unset($aOff_maq_FCaj);
            unset($aOff_maq_FCaj_R);
        }

        if (count($aDigFCaj) > 0) {

            $aDigFCaj_R = array_values($aDigFCaj);

            $aJson['aImpFCaj']['Digital'] = $aDigFCaj_R;

            $NombProcesos = $NombProcesos . "cot_reg_digfcaj;";

            unset($aDigFCaj);
            unset($aDigFCaj_R);
        }


        if (count($aSerFCaj) > 0) {

            $aSerFCaj_R = array_values($aSerFCaj);

            $aJson['aImpFCaj']['Serigrafia'] = $aSerFCaj_R;

            $NombProcesos = $NombProcesos . "cot_reg_serfcaj;";

            unset($aSerFCaj);
            unset($aSerFCaj_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /******************* Termina los calculos Forro del Cajon ***********/



    /******************* Inicia los calculos Empalme de la Tapa **********/


        $num_rows                          = 0;
        $costo_corte                       = 0;
        $costo_offset                      = 0;
        $costo_offset_laminas              = 0;
        $costo_offset_arreglo              = 0;
        $costo_offset_tiro                 = 0;
        $costo_offset_pantone              = 0;
        $costo_offset_arreglo_pantone      = 0;
        $costo_offset_maquila              = 0;
        $costo_offset_maquila_lamina       = 0;
        $costo_offset_maquila_pantone      = 0;
        $costo_unitario_serigrafia         = 0;
        $costo_unitario_arreglo_serigrafia = 0;
        $costo_arreglo_serigrafia          = 0;
        $costo_total_serigrafia            = 0;
        $costo_serigrafia_total            = 0;
        $costo_serigrafia_arreglo          = 0;
        $costo_unitario_digital            = 0;
        $costo_tot_digital                 = 0;
        $costo_digital_frente              = 0;
        $cantidad_serigrafia               = 0;
        $cantidad_digital                  = 0;
        $costo_maquila_lamina              = 0;
        $costo_serigrafia                  = 0;
        $costo_maquila                     = 0;


        $aOffEmpTap      = [];
        $aOff_maq_EmpTap = [];
        $aDigEmpTap      = [];
        $aSerEmpTap      = [];


        $secc_sufijo = "EmpTap";
        $nomb_inner  = "papel_" . $secc_sufijo;

        // Empalme de la Tapa
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpET'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
        $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp             = $aJson[$nomb_inner];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];


        // boton impresion
        if ($num_rows > 0) {

            for ($i = 0; $i < $num_rows; $i++) {

                $Nombre_proceso         = "";
                $laminas_db_tmp         = "";
                $laminas_db_num_color   = 0;
                $arreglo_db_tmp         = "";
                $tiro_db_tmp            = "";
                $pantone_db_tmp         = "";
                $arreglo_pantone_db_tmp = "";

                $num_tintas                        = 0;
                $costo_unitario_laminas            = 0;
                $costo_laminas_offset              = 0;
                $arreglo_tiraje_max                = 0;
                $arreglo_num_color                 = 0;
                $arreglo_costo_unitario            = 0;
                $costo_arreglo_offset              = 0;
                $tiro_por_millar                   = 0;
                $costo_unitario_tiro               = 0;
                $alfa                              = 0;
                $costo_tiro_offset                 = 0;
                $pantone_tiraje_max                = 0;
                $pantone_por_millar                = 0;
                $costo_unitario_pantone            = 0;
                $costo_pantone_offset              = 0;
                $arreglo_pantone_color             = 0;
                $costo_unitario_arreglo_de_pantone = 0;
                $costo_arreglo_de_pantone          = 0;
                $maquila_por_millar                = 0;


                $i = intval($i);

                $Nombre_proceso = $Tipo_proceso_tmp[$i]["Tipo_impresion"];


                $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];


                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    // merma offset
                    $cantidad_offset = $tiraje;

                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_EmpTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_EmpTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }

                        if (!self::checaCostos($offset_tiro, "Offset")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Empalme de la Tapa);";
                        }

                        $aOffEmpTap[$i]           = $offset_tiro;
                        $aOffEmpTap[$i]["mermas"] = $aMerma;

                        $subtotal = $subtotal + $aOffEmpTap[$i]['costo_tot_proceso'];

                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_EmpTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aOff_maq_EmpTap[$i]['costo_tot_proceso'];

                        if (!self::checaCostos($aOff_maq_EmpTap[$i], "Offset_Maquila")) {

                                $aJson['mensaje'] = $mensaje;
                                $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Empalme de la Tapa);";
                        }
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $tam0 = self::calcTamDigital($corte_ancho_proceso, $corte_largo_proceso);

                    $tam          = "";
                    $tam1         = 0;
                    $nomb_tam_emp = "";

                    if (count($tam0) > 0) {

                        $tam          = $tam0[0];
                        $tam1         = $tam0[1];
                        $nomb_tam_emp = $tam0['tipo_digital'];
                    }


                    if ( $tam1 ) {

                        $aDigEmpTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aDigEmpTap[$i]['costo_tot_proceso'];

                        if ($aDigEmpTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas (Empalme de la Tapa);";
                        } elseif (!self::checaCostos($aDigEmpTap[$i], "Digital")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital (Empalme de la Tapa);";
                        }
                    } else {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Empalme de la Tapa;";

                        $aDigEmpTap[$i]['cabe_digital']      = "NO";
                        $aDigEmpTap[$i]['cantidad']          = $tiraje;
                        $aDigEmpTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigEmpTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigEmpTap[$i]['imp_ancho']         = 0;
                        $aDigEmpTap[$i]['imp_largo']         = 0;
                        $aDigEmpTap[$i]["costo_unitario"]    = 0;
                        $aDigEmpTap[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigEmpTap[$i]["mermas"] = $aMerma_Dig;

                        if (is_array($aMerma_Dig)) {

                            unset($aMerma_Dig);
                        }
                    }
                }


                if ($Nombre_proceso === "Serigrafia") {

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $tipo_offset_serigrafia = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cortes_pliego    = intval($aJson['cortes'][$nomb_inner]);
                    $costo_unit_papel = floatval($aJson[$nomb_inner]['costo_unit_papel']);


                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);


                    $aSerEmpTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                    $subtotal = $subtotal + $aSerEmpTap[$i]['costo_tot_proceso'];

                    if ( !self::checaCostos($aSerEmpTap[$i], "Serigrafia") ) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Empalme de la Tapa);";
                    }

                    $aSerEmpTap[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffEmpTap) > 0) {

            $aOffEmpTap_R = array_values($aOffEmpTap);

            $aJson['aImpEmpTap']['Offset'] = $aOffEmpTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_offsetemptap;";

            unset($aOffEmpTap);
            unset($aOffEmpTap_R);
        }


        if (count($aOff_maq_EmpTap) > 0) {

            $aOff_maq_EmpTap_R = array_values($aOff_maq_EmpTap);

            $aJson['aImpEmpTap']['Maquila'] = $aOff_maq_EmpTapj_R;

            $NombProcesos = $NombProcesos . "cot_reg_offset_maq_emptap;";

            unset($aOff_maq_EmpTap);
            unset($aOff_maq_EmpTap_R);
        }


        if (count($aDigEmpTap) > 0) {

            $aDigEmpTap_R = array_values($aDigEmpTap);

            $aJson['aImpEmpTap']['Digital'] = $aDigEmpTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_digemptap;";

            unset($aDigEmpTap);
            unset($aDigEmpTap_R);
        }


        if (count($aSerEmpTap) > 0) {

            $aSerEmpTap_R = array_values($aSerEmpTap);

            $aJson['aImpEmpTap']['Serigrafia'] = $aSerEmpTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_seremptap;";

            unset($aSerEmpTap);
            unset($aSerEmpTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /***************** Termina los calculos Empalme de la Tapa ************/



    /******************* Inicia los calculos de Forro de la Tapa ********************/


        $num_rows                          = 0;
        $costo_corte                       = 0;
        $costo_offset                      = 0;
        $costo_offset_laminas              = 0;
        $costo_offset_arreglo              = 0;
        $costo_offset_tiro                 = 0;
        $costo_offset_pantone              = 0;
        $costo_offset_arreglo_pantone      = 0;
        $costo_offset_maquila              = 0;
        $costo_offset_maquila_lamina       = 0;
        $costo_offset_maquila_pantone      = 0;
        $costo_unitario_serigrafia         = 0;
        $costo_unitario_arreglo_serigrafia = 0;
        $costo_arreglo_serigrafia          = 0;
        $costo_total_serigrafia            = 0;
        $costo_serigrafia_total            = 0;
        $costo_serigrafia_arreglo          = 0;
        $costo_unitario_digital            = 0;
        $costo_tot_digital                 = 0;
        $costo_digital_frente              = 0;
        $cantidad_serigrafia               = 0;
        $cantidad_digital                  = 0;
        $costo_maquila_lamina              = 0;
        $costo_serigrafia                  = 0;
        $costo_maquila                     = 0;


        $aOffFTap      = [];
        $aOff_maq_FTap = [];
        $aDigFTap      = [];
        $aSerFTap      = [];


        $secc_sufijo = "FTap";
        $nomb_inner  = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFT'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp             = $aJson[$nomb_inner];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
        $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];


        // boton impresion
        if ($num_rows > 0) {

            for ($i = 0; $i < $num_rows; $i++) {

                $Nombre_proceso         = "";
                $laminas_db_tmp         = "";
                $laminas_db_num_color   = 0;
                $arreglo_db_tmp         = "";
                $tiro_db_tmp            = "";
                $pantone_db_tmp         = "";
                $arreglo_pantone_db_tmp = "";

                $num_tintas                        = 0;
                $costo_unitario_laminas            = 0;
                $costo_laminas_offset              = 0;
                $arreglo_tiraje_max                = 0;
                $arreglo_num_color                 = 0;
                $arreglo_costo_unitario            = 0;
                $costo_arreglo_offset              = 0;
                $tiro_por_millar                   = 0;
                $costo_unitario_tiro               = 0;
                $alfa                              = 0;
                $costo_tiro_offset                 = 0;
                $pantone_tiraje_max                = 0;
                $pantone_por_millar                = 0;
                $costo_unitario_pantone            = 0;
                $costo_pantone_offset              = 0;
                $arreglo_pantone_color             = 0;
                $costo_unitario_arreglo_de_pantone = 0;
                $costo_arreglo_de_pantone          = 0;
                $maquila_por_millar                = 0;


                $i = intval($i);

                $Nombre_proceso = $Tipo_proceso_tmp[$i]["Tipo_impresion"];


                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    // merma offset
                    $cantidad_offset = $tiraje;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];
                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];

                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);


                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);
                        }

                        if (!self::checaCostos($offset_tiro, "Offset")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Forro de la Tapa);";
                        }

                        $aOffFTap[$i]           = $offset_tiro;
                        $aOffFTap[$i]["mermas"] = $aMerma;

                        $subtotal = $subtotal + $aOffFTap[$i]['costo_tot_proceso'];


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aOff_maq_FTap[$i]['costo_tot_proceso'];

                        if (!self::checaCostos($aOff_maq_FTap[$i], "Offset_Maquila")) {

                                $aJson['mensaje'] = $mensaje;
                                $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Forro de la Tapa);";
                        }
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $tam0 = self::calcTamDigital($corte_ancho_proceso, $corte_largo_proceso);

                    $tam          = "";
                    $tam1         = 0;
                    $nomb_tam_emp = "";

                    if (count($tam0) > 0) {

                        $tam          = $tam0[0];
                        $tam1         = $tam0[1];
                        $nomb_tam_emp = $tam0['tipo_digital'];
                    }


                    if ( $tam1 ) {

                        $aDigFTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $cortes_por_pliego, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                        $subtotal = $subtotal + $aDigFTap[$i]['costo_tot_proceso'];

                        if ($aDigFTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas (Forro de la Tapa);";
                        } elseif (!self::checaCostos($aDigFTap[$i], "Digital")) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital (Forro de la Tapa);";
                        }
                    } else {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital (Forro de la Tapa);";

                        $aDigFTap[$i]['cabe_digital']      = "NO";
                        $aDigFTap[$i]['cantidad']          = $tiraje;
                        $aDigFTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFTap[$i]['imp_ancho']         = 0;
                        $aDigFTap[$i]['imp_largo']         = 0;
                        $aDigFTap[$i]["costo_unitario"]    = 0;
                        $aDigFTap[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFTap[$i]["mermas"] = $aMerma_Dig;

                        if (is_array($aMerma_Dig)) {

                            unset($aMerma_Dig);
                        }
                    }
                }


                if ($Nombre_proceso === "Serigrafia") {

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $tipo_offset_serigrafia = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cortes_pliego = intval($aJson['cortes'][$nomb_inner]);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]['costo_unit_papel']);


                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);


                    $aSerFTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $papel_corte_ancho, $papel_corte_largo, $ventas_model);

                    $subtotal = $subtotal + $aSerFTap[$i]['costo_tot_proceso'];

                    if ( !self::checaCostos($aSerFTap[$i], "Serigrafia") ) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Forro de la Tapa;";
                    }

                    $aSerFTap[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffFTap) > 0) {

            $aOffFTap_R = array_values($aOffFTap);

            $aJson['aImpFTap']['Offset'] = $aOffFTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_offsetftap";

            unset($aOffFTap);
            unset($aOffFTap_R);
        }


        if (count($aOff_maq_FTap) > 0) {

            $aOff_maq_FTap_R = array_values($aOff_maq_FTap);

            $aJson['aImpFTap']['Maquila'] = $aOff_maq_FTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_offset_maq_ftap;";

            unset($aOff_maq_FTap);
            unset($aOff_maq_FTap_R);
        }

        if (count($aDigFTap) > 0) {

            $aDigFTap_R = array_values($aDigFTap);

            $aJson['aImpFTap']['Digital'] = $aDigFTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_digftap;";

            unset($aDigFTap);
            unset($aDigFTap_R);
        }


        if (count($aSerFTap) > 0) {

            $aSerFTap_R = array_values($aSerFTap);

            $aJson['aImpFTap']['Serigrafia'] = $aSerFTap_R;

            $NombProcesos = $NombProcesos . "cot_reg_serftap;";

            unset($aSerFTap);
            unset($aSerFTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }


    /****************** Termina los calculos de Forro de la Tapa ********************/


/********************** Termina boton impresion ****************************/



/********************** Inicia boton acabados ****************************/



/************************ Inicia Empalme del Cajon *******************************/



    $aEmpBUV   = [];
    $aEmpLaser = [];
    $aEmpGrab  = [];
    $aEmpHS    = [];
    $aEmpLam   = [];
    $aEmpSuaje = [];

    $aAcb = [];

    $aAcb = json_decode($_POST['aAcbEC'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcb);


    $papel_costo_unit = floatval($aJson['papel_Emp']['costo_unit_papel']);
    $papel_costo_unit = round($papel_costo_unit, 4);

    $cortes = $aJson['papel_Emp']['corte'];


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcb[$i]['Tipo_acabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));
            $AnchoBarniz = floatval($aJson['papel_Emp']['calculadora']['corte_ancho']);
            $LargoBarniz = $aJson['papel_Emp']['calculadora']['corte_largo'];

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcb[$i]['Ancho']);
                $LargoBarniz = floatval($aAcb[$i]['Largo']);
            }

            $barniz_tmp = self::calculoBarniz($tipoGrabado, $tiraje, $AnchoBarniz, $LargoBarniz, $ventas_model);

            $merma_Acab = $ventas_model->merma_acabados("Barniz UV");

            foreach ($merma_Acab as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_Acab)) {

                unset($merma_Acab);
            }


            // calcula la merma de acabados
            $merma_HS_tmp = self:: calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_cortes      = $cortes;


            $tot_pliegos = self::Deltax($merma_tot_pliegos, $merma_cortes);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit * $tot_pliegos);
            $costo_tot_pliegos_merma = round($costo_tot_pliegos_merma, 2);

            $aMerma_BUV = [];

            $aMerma_BUV['merma_min']               = $merma_HS_tmp[0];
            $aMerma_BUV['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_BUV['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_BUV['cortes_por_pliego']       = $merma_cortes;
            $aMerma_BUV['merma_tot_pliegos']       = $tot_pliegos;
            $aMerma_BUV['costo_unit_merma']        = $papel_costo_unit;
            $aMerma_BUV['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            if ( !self::checaCostos($barniz_tmp,"Barniz") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Empalme del cajon);";
            }

            $aEmpBUV[$i] = $barniz_tmp;

            $subtotal = $subtotal + $aEmpBUV[$i]['costo_tot_proceso'];

            $aEmpBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));
            $Largo       = intval($aAcb[$i]['LargoLaser']);
            $Ancho       = intval($aAcb[$i]['AnchoLaser']);


            $costo_laser_tmp = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            if ( !self::checaCostos($costo_laser_tmp,"Laser") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Empalme del cajon);";
            }


            $aEmpLaser[$i] = $costo_laser_tmp;

            $subtotal = $subtotal + $aEmpLaser[$i]['costo_tot_proceso'];

            if (is_array($costo_laser_tmp)) {

                unset($costo_laser_tmp);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado   = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));
            $LargoGrab     = $aAcb[$i]['Largo'];
            $AnchoGrab     = $aAcb[$i]['Ancho'];
            $ubicacionGrab = $aAcb[$i]['ubicacion'];

            $papel_seccion        = intval($aJson['cortes']['papel_Emp']);
            $papel_costo_unit_tmp = floatval($aJson['papel_Emp']['costo_unit_papel']);


            $grabado_temp = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);


            if ( !self::checaCostos($grabado_temp,"Grabado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Empalme del cajon);";
            }

            $aEmpGrab[$i] = $grabado_temp;

            $subtotal = $subtotal + $aEmpGrab[$i]['costo_tot_proceso'];

            if (is_array($grabado_temp)) {

                unset($grabado_temp);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $tipoGrabado = trim(strval($aAcb[$i]['tipoGrabado']));
            $LargoHS     = intval($aAcb[$i]['LargoHS']);
            $AnchoHS     = intval($aAcb[$i]['AnchoHS']);
            $ColorHS     = utf8_encode(trim(strval($aAcb[$i]['ColorHS'])));

            $papel_seccion        = intval($aJson['cortes']['papel_Emp']);
            $papel_costo_unit_tmp = floatval($aJson['papel_Emp']['costo_unit_papel']);


            $grabado_HS_temp = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            if ( !self::checaCostos($grabado_HS_temp,"HotStamping") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Empalme del cajon);";
            }

            $aEmpHS[$i] = $grabado_HS_temp;

            $subtotal = $subtotal + $aEmpHS[$i]['costo_tot_proceso'];

            if (is_array($grabado_HS_temp)) {

                unset($grabado_HS_temp);
            }
        }


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = trim(strval($aAcb[$i]['tipo']));
            $LargoLam    = floatval($aJson['papel_Emp']['calculadora']['corte_largo']);
            $AnchoLam    = floatval($aJson['papel_Emp']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_Emp']['costo_unit_papel'];
            $cortes           = $aJson['cortes']['papel_Emp'];

            $Laminado_tmp = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);


            if ( !self::checaCostos($Laminado_tmp,"Laminado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Empalme del cajon);";
            }

            $aEmpLam[$i] = $Laminado_tmp;

            $subtotal = $subtotal + $aEmpLam[$i]['costo_tot_proceso'];

            if (count($Laminado_tmp) > 0) {

                unset($Laminado_tmp);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));
            $Largo       = floatval($aAcb[$i]['LargoSuaje']);
            $Ancho       = floatval($aAcb[$i]['AnchoSuaje']);

            $aAcbSuaje_tmp = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            if ( !self::checaCostos($aAcbSuaje_tmp,"Suaje") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Empalme del cajon);";
            }

            $aEmpSuaje[$i] = $aAcbSuaje_tmp;

            $subtotal = $subtotal + $aEmpSuaje[$i]['costo_tot_proceso'];
        }
    }


    if (count($aEmpBUV) > 0) {

        $aEmpBUV_R = array_values($aEmpBUV);

        $aJson['aAcbEmp']['Barniz_UV'] = $aEmpBUV_R;

        $NombProcesos = $NombProcesos . "cot_reg_barnizuvempcaj;";

        unset($aEmpBUV);
        unset($aEmpBUV_R);
    }


    if (count($aEmpLaser) > 0) {

        $aEmpLaser_R = array_values($aEmpLaser);

        $aJson['aAcbEmp']['Corte_Laser'] = $aEmpLaser_R;

        $NombProcesos = $NombProcesos . "cot_reg_laserempcaj;";

        unset($aEmpLaser);
        unset($aEmpLaser_R);
    }


    if (count($aEmpGrab) > 0) {

        $aEmpGrab_R = array_values($aEmpGrab);

        $aJson['aAcbEmp']['Grabado'] = $aEmpGrab_R;

        $NombProcesos = $NombProcesos . "cot_reg_grabempcaj;";

        unset($aEmpGrab);
        unset($aEmpGrab_R);
    }


    if (count($aEmpHS) > 0) {

        $aEmpHS_R = array_values($aEmpHS);

        $aJson['aAcbEmp']['HotStamping'] = $aEmpHS_R;

        $NombProcesos = $NombProcesos . "cot_reg_hsempcaj;";

        unset($aEmpHS);
        unset($aEmpHS_R);
    }


    if (count($aEmpLam) > 0) {

        $aEmpLam_R = array_values($aEmpLam);

        $aJson['aAcbEmp']['Laminado'] = $aEmpLam_R;

        $NombProcesos = $NombProcesos . "cot_reg_lamempcaj;";

        unset($aEmpLam);
        unset($aEmpLam_R);
    }


    if (count($aEmpSuaje) > 0) {

        $aEmpSuaje_R = array_values($aEmpSuaje);

        $aJson['aAcbEmp']['Suaje'] = $aEmpSuaje_R;

        $NombProcesos = $NombProcesos . "cot_reg_suajeempcaj;";

        unset($aEmpSuaje);
        unset($aEmpSuaje_R);
    }


/************************ Termina Empalme del Cajon ******************************/



/************************* Inicia Forro del Cajon **********************/


    $aFCajBUV   = [];
    $aFCajLaser = [];
    $aFCajGrab  = [];
    $aFCajHS    = [];
    $aFCajLam   = [];
    $aFCajSuaje = [];


    $aAcbFCaj = [];

    $aAcbFCaj = json_decode($_POST['aAcbFC'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFCaj);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbFCaj[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FCaj']['costo_unit_papel'];
        $papel_costo_unit_tmp = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FCaj']);

        $merma_cortes = intval($aJson['papel_FCaj']['corte']);


        if ($tipo_acabado == "Barniz UV") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFCaj[$i]['tipoGrabado'])));
            $AnchoBarniz = floatval($aJson['papel_FCaj']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FCaj']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFCaj[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFCaj[$i]['Largo']);
            }

            $barniz_tmp = self::calculoBarniz($tipoGrabado, $tiraje, $AnchoBarniz, $LargoBarniz, $ventas_model);

            $merma_Acab = $ventas_model->merma_acabados("Barniz UV");

            foreach ($merma_Acab as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_Acab)) {

                unset($merma_Acab);
            }


            // calcula la merma de acabados
            $merma_tmp = self:: calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_tot_pliegos = intval($merma_tmp[2]);

            $tot_pliegos = self:: Deltax($merma_tot_pliegos, $merma_cortes);


            $costo_tot_pliegos_merma = floatval($papel_costo_unit * $tot_pliegos);
            $costo_tot_pliegos_merma = round($costo_tot_pliegos_merma, 2);

            $aMerma_BUV = [];

            $aMerma_BUV['merma_min']               = $merma_tmp[0];
            $aMerma_BUV['merma_adic']              = $merma_tmp[1];
            $aMerma_BUV['merma_tot']               = $merma_tmp[2];
            $aMerma_BUV['cortes_por_pliego']       = $merma_cortes;
            $aMerma_BUV['merma_tot_pliegos']       = $tot_pliegos;
            $aMerma_BUV['costo_unit_merma']        = $papel_costo_unit;
            $aMerma_BUV['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;

            if ( !self::checaCostos($barniz_tmp,"Barniz") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro del cajon);";
            }

            $aFCajBUV[$i]           = $barniz_tmp;
            $aFCajBUV[$i]['mermas'] = $aMerma_BUV;

            $subtotal = $subtotal + $aFCajBUV[$i]['costo_tot_proceso'];

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFCaj[$i]['tipoGrabado'])));
            $Largo       = intval($aAcbFCaj[$i]['LargoLaser']);
            $Ancho       = intval($aAcbFCaj[$i]['AnchoLaser']);


            $aFCajLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            if ( !self::checaCostos($aFCajLaser[$i],"Laser") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro del cajon);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado   = utf8_encode(trim(strval($aAcbFCaj[$i]['tipoGrabado'])));
            $LargoGrab     = $aAcbFCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbFCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbFCaj[$i]['ubicacion'];


            $aFCajGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            $subtotal = $subtotal + $aFCajGrab[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFCajGrab[$i],"Grabado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro del cajon);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFCaj[$i]['tipoGrabado'])));
            $LargoHS     = intval($aAcbFCaj[$i]['LargoHS']);
            $AnchoHS     = intval($aAcbFCaj[$i]['AnchoHS']);
            $ColorHS     = utf8_encode(trim(strval($aAcbFCaj[$i]['ColorHS'])));


            $aFCajHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            $subtotal = $subtotal + $aFCajHS[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFCajHS[$i],"HotStamping") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro del cajon);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFCaj[$i]['tipo'])));
            $LargoLam    = floatval($aJson['papel_FCaj']['calculadora']['corte_largo']);
            $AnchoLam    = floatval($aJson['papel_FCaj']['calculadora']['corte_ancho']);

            $papel_costo_unit = floatval($aJson['papel_FCaj']['costo_unit_papel']);


            $aFCajLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            $subtotal = $subtotal + $aFCajLam[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFCajLam[$i],"Laminado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro del cajon);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFCaj[$i]['tipoGrabado'])));
            $Largo       = floatval($aAcbFCaj[$i]['LargoSuaje']);
            $Ancho       = floatval($aAcbFCaj[$i]['AnchoSuaje']);

            $cortes = $aJson['cortes']['papel_FCaj'];

            $aFCajSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            $subtotal = $subtotal + $aFCajSuaje[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFCajSuaje[$i],"Suaje") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro del cajon);";
            }
        }
    }



    if (count($aFCajBUV) > 0) {

        $aFCajBUV_R = array_values($aFCajBUV);

        $aJson['aAcbFCaj']['Barniz_UV'] = $aFCajBUV_R;

        $NombProcesos = $NombProcesos . "cot_reg_barnizuvfcaj;";

        unset($aFCajBUV);
        unset($aFCajBUV_R);
    }


    if (count($aFCajLaser) > 0) {

        $aFCajLaser_R = array_values($aFCajLaser);

        $aJson['aAcbFCaj']['Corte_Laser'] = $aFCajLaser_R;

        $NombProcesos = $NombProcesos . "cot_reg_laserfcaj;";

        unset($aFCajLaser);
        unset($aFCajLaser_R);
    }


    if (count($aFCajGrab) > 0) {

        $aFCajGrab_R = array_values($aFCajGrab);

        $aJson['aAcbFCaj']['Grabado'] = $aFCajGrab_R;

        $NombProcesos = $NombProcesos . "cot_reg_grabfcaj;";

        unset($aFCajGrab);
        unset($aFCajGrab_R);
    }


    if (count($aFCajHS) > 0) {

        $aFCajHS_R = array_values($aFCajHS);

        $aJson['aAcbFCaj']['HotStamping'] = $aFCajHS_R;

        $NombProcesos = $NombProcesos . "cot_reg_hsfcaj;";

        unset($aFCajHS);
        unset($aFCajHS_R);
    }


    if (count($aFCajLam) > 0) {

        $aFCajLam_R = array_values($aFCajLam);

        $aJson['aAcbFCaj']['Laminado'] = $aFCajLam_R;

        $NombProcesos = $NombProcesos . "cot_reg_lamfcaj;";

        unset($aFCajLam);
        unset($aFCajLam_R);
    }


    if (count($aFCajSuaje) > 0) {

        $aFCajSuaje_R = array_values($aFCajSuaje);

        $aJson['aAcbFCaj']['Suaje'] = $aFCajSuaje_R;

        $NombProcesos = $NombProcesos . "cot_reg_suajefcaj;";

        unset($aFCajSuaje);
        unset($aFCajSuaje_R);
    }


/************************* Termina Forro del Cajon *********************/



/************************* Inicia Empalme de la Tapa ******************/


    $aEmpTapBUV   = [];
    $aEmpTapLaser = [];
    $aEmpTapGrab  = [];
    $aEmpTapHS    = [];
    $aEmpTapLam   = [];
    $aEmpTapSuaje = [];


    $aAcbEmpTap = [];

    $aAcbEmpTap = json_decode($_POST['aAcbET'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbEmpTap);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbEmpTap[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FTap']);


        if ($tipo_acabado == "Barniz UV") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbEmpTap[$i]['tipoGrabado'])));
            $AnchoBarniz = floatval($aJson['papel_FTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbEmpTap[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbEmpTap[$i]['Largo']);
            }

            $barniz_tmp = self::calculoBarniz($tipoGrabado, $tiraje, $AnchoBarniz, $LargoBarniz, $ventas_model);

            $merma_Acab = $ventas_model->merma_acabados("Barniz UV");

            foreach ($merma_Acab as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_Acab)) {

                unset($merma_Acab);
            }


            // calcula la merma de acabados
            $merma_tmp = self:: calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_tot_pliegos = intval($merma_tmp[2]);

            $tot_pliegos = self:: Deltax($merma_tot_pliegos, $cortes);


            $costo_tot_pliegos_merma = floatval($papel_costo_unit * $tot_pliegos);
            $costo_tot_pliegos_merma = round($costo_tot_pliegos_merma, 2);

            $aMerma_BUV = [];

            $aMerma_BUV['merma_min']               = $merma_tmp[0];
            $aMerma_BUV['merma_adic']              = $merma_tmp[1];
            $aMerma_BUV['merma_tot']               = $merma_tmp[2];
            $aMerma_BUV['cortes_por_pliego']       = $cortes;
            $aMerma_BUV['merma_tot_pliegos']       = $tot_pliegos;
            $aMerma_BUV['costo_unit_merma']        = $papel_costo_unit;
            $aMerma_BUV['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;

            if ( !self::checaCostos($barniz_tmp,"Barniz") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Empalme de la Tapa);";
            }

            $aEmpTapBUV[$i]           = $barniz_tmp;
            $aEmpTapBUV[$i]['mermas'] = $aMerma_BUV;

            $subtotal = $subtotal + $aEmpTapBUV[$i]['costo_tot_proceso'];

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbEmpTap[$i]['tipoGrabado'])));
            $Largo       = intval($aAcbEmpTap[$i]['LargoLaser']);
            $Ancho       = intval($aAcbEmpTap[$i]['AnchoLaser']);


            $aEmpTapLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            $subtotal = $subtotal + $aEmpTapLaser[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aEmpTapLaser[$i],"Laser") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Empalme de la Tapa);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado   = utf8_encode(trim(strval($aAcbEmpTap[$i]['tipoGrabado'])));
            $LargoGrab     = $aAcbEmpTap[$i]['Largo'];
            $AnchoGrab     = $aAcbEmpTap[$i]['Ancho'];
            $ubicacionGrab = $aAcbEmpTap[$i]['ubicacion'];


            $aEmpTapGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            $subtotal = $subtotal + $aEmpTapGrab[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aEmpTapGrab[$i],"Grabado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Empalme de la Tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbEmpTap[$i]['tipoGrabado'])));
            $LargoHS     = intval($aAcbEmpTap[$i]['LargoHS']);
            $AnchoHS     = intval($aAcbEmpTap[$i]['AnchoHS']);
            $ColorHS     = utf8_encode(trim(strval($aAcbEmpTap[$i]['ColorHS'])));


            $aEmpTapHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            $subtotal = $subtotal + $aEmpTapHS[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aEmpTapHS[$i],"HotStamping") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Empalme de la Tapa;";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbEmpTap[$i]['tipo'])));
            $LargoLam    = floatval($aJson['papel_FTap']['calculadora']['corte_largo']);
            $AnchoLam    = floatval($aJson['papel_FTap']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_FTap']['costo_unit_papel'];
            $cortes           = $aJson['cortes']['papel_FTap'];

            $aEmpTapLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            $subtotal = $subtotal + $aEmpTapLam[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aEmpTapLam[$i],"Laminado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Empalme de la Tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbEmpTap[$i]['tipoGrabado'])));
            $Largo       = floatval($aAcbEmpTap[$i]['LargoSuaje']);
            $Ancho       = floatval($aAcbEmpTap[$i]['AnchoSuaje']);

            $cortes = $aJson['cortes']['papel_FTap'];

            $aEmpTapSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            $subtotal = $subtotal + $aEmpTapSuaje[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aEmpTapSuaje[$i],"Suaje") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Empalme de la Tapa);";
            }
        }
    }


    if (count($aEmpTapBUV) > 0) {

        $aEmpTapBUV_R = array_values($aEmpTapBUV);

        $aJson['aAcbEmpTap']['Barniz_UV'] = $aEmpTapBUV_R;

        $NombProcesos = $NombProcesos . "cot_reg_barnizuvemptap;";

        unset($aEmpTapBUV);
        unset($aEmpTapBUV_R);
    }


    if (count($aEmpTapLaser) > 0) {

        $aEmpTapLaser_R = array_values($aEmpTapLaser);

        $aJson['aAcbEmpTap']['Corte_Laser'] = $aEmpTapLaser_R;

        $NombProcesos = $NombProcesos . "cot_reg_laseremptap;";

        unset($aEmpTapLaser);
        unset($aEmpTapLaser_R);
    }


    if (count($aEmpTapGrab) > 0) {

        $aEmpTapGrab_R = array_values($aEmpTapGrab);

        $aJson['aAcbEmpTap']['Grabado'] = $aEmpTapGrab_R;

        $NombProcesos = $NombProcesos . "cot_reg_grabemptap;";

        unset($aEmpTapGrab);
        unset($aEmpTapGrab_R);
    }


    if (count($aEmpTapHS) > 0) {

        $aEmpTapHS_R = array_values($aEmpTapHS);

        $aJson['aAcbEmpTap']['HotStamping'] = $aEmpTapHS_R;

        $NombProcesos = $NombProcesos . "cot_reg_hsemptap;";

        unset($aEmpTapHS);
        unset($aEmpTapHS_R);
    }


    if (count($aEmpTapLam) > 0) {

        $aEmpTapLam_R = array_values($aEmpTapLam);

        $aJson['aAcbEmpTap']['Laminado'] = $aEmpTapLam_R;

        $NombProcesos = $NombProcesos . "cot_reg_lamemptap;";

        unset($aEmpTapLam);
        unset($aEmpTapLam_R);
    }


    if (count($aEmpTapSuaje) > 0) {

        $aEmpTapSuaje_R = array_values($aEmpTapSuaje);

        $aJson['aAcbEmpTap']['Suaje'] = $aEmpTapSuaje_R;

        $NombProcesos = $NombProcesos . "cot_reg_suajeemptap;";

        unset($aEmpTapSuaje);
        unset($aEmpTapSuaje_R);
    }


/************************* Termina Empalme de la Tapa *****************/


/*********************** Inicia Forro de la Tapa **************************/


    $aFTapBUV   = [];
    $aFTapLaser = [];
    $aFTapGrab  = [];
    $aFTapHS    = [];
    $aFTapLam   = [];
    $aFTapSuaje = [];


    $aAcbFTap = [];

    $aAcbFTap = json_decode($_POST['aAcbFT'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFTap);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbFTap[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FTap']);


        if ($tipo_acabado == "Barniz UV") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFTap[$i]['tipoGrabado'])));

            $AnchoBarniz = floatval($aJson['papel_FTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFTap[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFTap[$i]['Largo']);
            }

            $barniz_tmp = self::calculoBarniz($tipoGrabado, $tiraje, $AnchoBarniz, $LargoBarniz, $ventas_model);

            $merma_Acab = $ventas_model->merma_acabados("Barniz UV");

            foreach ($merma_Acab as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_Acab)) {

                unset($merma_Acab);
            }


            // calcula la merma de acabados
            $merma_tmp = self:: calculoMermaAcabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_tot_pliegos = intval($merma_tmp[2]);

            $tot_pliegos = self:: Deltax($merma_tot_pliegos, $cortes);


            $costo_tot_pliegos_merma = floatval($papel_costo_unit * $tot_pliegos);
            $costo_tot_pliegos_merma = round($costo_tot_pliegos_merma, 2);

            $aMerma_BUV = [];

            $aMerma_BUV['merma_min']               = $merma_tmp[0];
            $aMerma_BUV['merma_adic']              = $merma_tmp[1];
            $aMerma_BUV['merma_tot']               = $merma_tmp[2];
            $aMerma_BUV['cortes_por_pliego']       = $cortes;
            $aMerma_BUV['merma_tot_pliegos']       = $tot_pliegos;
            $aMerma_BUV['costo_unit_merma']        = $papel_costo_unit;
            $aMerma_BUV['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;

            if ( !self::checaCostos($barniz_tmp,"Barniz") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro de la Tapa);";
            }

            $aFTapBUV[$i]           = $barniz_tmp;
            $aFTapBUV[$i]['mermas'] = $aMerma_BUV;

            $subtotal = $subtotal + $aFTapBUV[$i]['costo_tot_proceso'];

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFTap[$i]['tipoGrabado'])));

            $Largo = intval($aAcbFTap[$i]['LargoLaser']);
            $Ancho = intval($aAcbFTap[$i]['AnchoLaser']);

            $aFTapLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            $subtotal = $subtotal + $aFTapLaser[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFTapLaser[$i],"Laser") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro de la Tap);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFTap[$i]['tipoGrabado'])));

            $LargoGrab     = $aAcbFTap[$i]['Largo'];
            $AnchoGrab     = $aAcbFTap[$i]['Ancho'];
            $ubicacionGrab = $aAcbFTap[$i]['ubicacion'];


            $aFTapGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            $subtotal = $subtotal + $aFTapGrab[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFTapGrab[$i],"Grabado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro de la Tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFTap[$i]['tipoGrabado'])));

            $LargoHS = intval($aAcbFTap[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFTap[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFTap[$i]['ColorHS'])));


            $aFTapHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            $subtotal = $subtotal + $aFTapHS[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFTapHS[$i],"HotStamping") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro de la Tapa);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFTap[$i]['tipo'])));

            $LargoLam = floatval($aJson['papel_FTap']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_FTap']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_FTap']['costo_unit_papel'];


            $aFTapLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            $subtotal = $subtotal + $aFTapLam[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFTapLam[$i],"Laminado") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro de la Tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = utf8_encode(trim(strval($aAcbFTap[$i]['tipoGrabado'])));

            $Largo = floatval($aAcbFTap[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFTap[$i]['AnchoSuaje']);


            $aFTapSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            $subtotal = $subtotal + $aFTapSuaje[$i]['costo_tot_proceso'];

            if ( !self::checaCostos($aFTapSuaje[$i],"Suaje") ) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro de la Tapa);";
            }
        }
    }


    if (count($aFTapBUV) > 0) {

        $aFTapBUV_R = array_values($aFTapBUV);

        $aJson['aAcbFTap']['Barniz_UV'] = $aFTapBUV_R;

        $NombProcesos = $NombProcesos . "cot_reg_barnizuvftap;";

        unset($aFTapBUV);
        unset($aFTapBUV_R);
    }


    if (count($aFTapLaser) > 0) {

        $aFTapLaser_R = array_values($aFTapLaser);

        $aJson['aAcbFTap']['Corte_Laser'] = $aFTapLaser_R;

        $NombProcesos = $NombProcesos . "cot_reg_laserftap;";

        unset($aFTapLaser);
        unset($aFTapLaser_R);
    }


    if (count($aFTapGrab) > 0) {

        $aFTapGrab_R = array_values($aFTapGrab);

        $aJson['aAcbFTap']['Grabado'] = $aFTapGrab_R;

        $NombProcesos = $NombProcesos . "cot_reg_grabftap;";

        unset($aFTapGrab);
        unset($aFTapGrab_R);
    }


    if (count($aFTapHS) > 0) {

        $aFTapHS_R = array_values($aFTapHS);

        $aJson['aAcbFTap']['HotStamping'] = $aFTapHS_R;

        $NombProcesos = $NombProcesos . "cot_reg_hsftap;";

        unset($aFTapHS);
        unset($aFTapHS_R);
    }


    if (count($aFTapLam) > 0) {

        $aFTapLam_R = array_values($aFTapLam);

        $aJson['aAcbFTap']['Laminado'] = $aFTapLam_R;

        $NombProcesos = $NombProcesos . "cot_reg_lamftap;";

        unset($aFTapLam);
        unset($aFTapLam_R);
    }


    if (count($aFTapSuaje) > 0) {

        $aFTapSuaje_R = array_values($aFTapSuaje);

        $aJson['aAcbFTap']['Suaje'] = $aFTapSuaje_R;

        $NombProcesos = $NombProcesos . "cot_reg_suajeftap;";

        unset($aFTapSuaje);
        unset($aFTapSuaje_R);
    }


/*************************** Termina Forro de la Tapa ****************************/


/**************************** Termina boton acabados *******************/




/************************* Inicia Accesorios ***************************/


    if (isset($_POST["aAccesorios"]) and !empty($_POST["aAccesorios"])) {

        $aAccesorios_tmp = json_decode($_POST['aAccesorios'], true);
        $aAccesorios_R   = array_values($aAccesorios_tmp);

        $cuantos_aAccesorios_tmp = count($aAccesorios_tmp);


        $aAccesorios = [];

        for ($i = 0; $i < $cuantos_aAccesorios_tmp; $i++) {

            $Tipo_accesorio = "";
            $Tipo           = null;
            $Largo          = null;
            $Ancho          = null;
            $Color          = null;

            $Tipo_accesorio = utf8_encode(trim(strval($aAccesorios_R[$i]['Tipo_accesorio'])));
            $Tipo           = $aAccesorios_R[$i]['Herraje'];
            $Largo          = $aAccesorios_R[$i]['Largo'];
            $Ancho          = $aAccesorios_R[$i]['Ancho'];
            $Color          = $aAccesorios_R[$i]['Color'];

            $accesorio_tiraje = $tiraje;

            $aCosto_accesorio = self::calculoAccesorios($Tipo_accesorio, $tiraje, $ventas_model);


            $aAccesorios[$i]['Tipo_accesorio']       = $Tipo_accesorio;
            $aAccesorios[$i]['Tipo']                 = $Tipo;
            $aAccesorios[$i]['tiraje']               = $accesorio_tiraje;
            $aAccesorios[$i]['Largo']                = $Largo;
            $aAccesorios[$i]['Ancho']                = $Ancho;
            $aAccesorios[$i]['Color']                = $Color;
            $aAccesorios[$i]['costo_unit_accesorio'] = $aCosto_accesorio['accesorio_costo_unitario'];
            $aAccesorios[$i]['costo_tot_proceso']     = $aCosto_accesorio['costo_tot_proceso'];


            $subtotal = $subtotal + $aAccesorios[$i]['costo_tot_proceso'];
        }


        if (count($aAccesorios) > 0) {

            $aJson['Accesorios'] = $aAccesorios;

            $NombProcesos = $NombProcesos . "cot_accesorios;";

            if (is_array($aAccesorios)) {

                unset($aAccesorios);
            }
        }
    }


/********************* Termina Accesorios *****************************/



/************************* Inicia Bancos ********************************/


    if (isset($_POST["aBancos"]) and !empty($_POST["aBancos"])) {

        $aBancos_tmp = json_decode($_POST['aBancos'], true);

        $aBancos_R   = array_values($aBancos_tmp);

        $cuantos_aBancos_tmp = count($aBancos_tmp);


        $aBancos = [];

        for ($i = 0; $i < $cuantos_aBancos_tmp; $i++) {

            $Tipo_banco = "";
            $Tipo_banco = utf8_encode(trim(strval($aBancos_R[$i]['Tipo_banco'])));

            $largo       = 0;
            $ancho       = 0;
            $profundidad = 0;
            $suaje       = "";

            $largo       = $aBancos_R[$i]['largo'];
            $ancho       = $aBancos_R[$i]['ancho'];
            $profundidad = $aBancos_R[$i]['Profundidad'];


            $aCosto_Banco = self::calculoBancos($Tipo_banco, $tiraje, $ventas_model);

            switch ($Tipo_banco) {
                case 'Carton':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));

                    break;
                case 'Eva':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));

                    break;
                case 'Espuma':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));

                    break;
                case 'Empalme Banco':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));

                    break;
                case 'Cartulina Suajada':

                    $suaje = "SI";

                    break;
            }


            $aBancos[$i]['Tipo_banco']       = $Tipo_banco;
            $aBancos[$i]['tiraje']           = $tiraje;
            $aBancos[$i]['largo']            = $largo;
            $aBancos[$i]['ancho']            = $ancho;
            $aBancos[$i]['profundidad']      = $profundidad;
            $aBancos[$i]['Suaje']            = $suaje;
            $aBancos[$i]['costo_unit_banco'] = $aCosto_Banco['banco_costo_unitario'];
            $aBancos[$i]['costo_tot_proceso']= $aCosto_Banco['costo_tot_proceso'];

            $subtotal = $subtotal + $aBancos[$i]['costo_tot_proceso'];

            if (count($aCosto_Banco) > 0) {

                unset($aCosto_accesorio);
            }
        }


        if (count($aBancos) > 0) {

            $aJson['Bancos'] = $aBancos;

            $NombProcesos = $NombProcesos . "cot_bancos;";

            if (is_array($aBancos)) {

                unset($aBancos);
            }
        }
    }


/************************ Termina Bancos ********************************/



/*************************** Inicia Cierres *****************************/


    if (isset($_POST["aCierres"]) and !empty($_POST["aCierres"])) {

        $aCierres_tmp2 = json_decode($_POST['aCierres'], true);
        $aCierres_tmp = array_values($aCierres_tmp2);

        $cuantos_aCierres = 0;
        $cuantos_aCierres = count($aCierres_tmp);

        $aCierres = [];

        $tiraje = $tiraje;

        for ($i = 0; $i < $cuantos_aCierres; $i++) {

            $Tipo_cierre = "";
            $Tipo_cierre = utf8_encode(trim(strval($aCierres_tmp[$i]['Tipo_cierre'])));


            $aCierres[$i]['Tipo_cierre'] = $Tipo_cierre;
            $aCierres[$i]['tiraje']      = $tiraje;

            $numpares = 0;
            $largo    = null;
            $ancho    = null;
            $tipo     = null;
            $color    = null;

            $costo_cierre = 0;

            $numpares = $aCierres_tmp[$i]['numpares'];
            $numpares = intval($numpares);


            $aCosto_cierres = self::calculoCierre($Tipo_cierre, $tiraje, $numpares, $ventas_model);

            switch ($Tipo_cierre) {
                case 'Iman':

                    $largo = intval($aCierres_tmp[$i]['largo']);
                    $ancho = intval($aCierres_tmp[$i]['ancho']);

                    break;
                case 'Liston':

                    $largo = intval($aCierres_tmp[$i]['largo']);
                    $ancho = intval($aCierres_tmp[$i]['ancho']);
                    $tipo  = utf8_encode(trim(strval($aCierres_tmp[$i]['tipo'])));
                    $color = utf8_encode(trim(strval($aCierres_tmp[$i]['color'])));

                    break;
                case 'Marialuisa':

                    break;
                case 'Suaje calado':

                    $largo = intval($aCierres_tmp[$i]['largo']);
                    $ancho = intval($aCierres_tmp[$i]['ancho']);
                    $tipo  = utf8_encode(trim(strval($aCierres_tmp[$i]['tipo'])));

                    break;
                case 'Velcro':

                    break;
            }


            $aCierres[$i]['numpares'] = intval($numpares);


            $aCierres[$i]['largo'] = $largo;
            $aCierres[$i]['ancho'] = $ancho;
            $aCierres[$i]['tipo']  = $tipo;
            $aCierres[$i]['color'] = $color;

            $aCierres[$i]['costo_unitario']    = $aCosto_cierres['cierre_costo_unitario'];
            $aCierres[$i]['costo_tot_proceso'] = $aCosto_cierres['costo_tot_proceso'];

            $subtotal = $subtotal + $aCierres[$i]['costo_tot_proceso'];

            if (count($aCosto_cierres) > 0) {

                unset($aCosto_cierres);
            }
        }


        if (count($aCierres) > 0) {

            $aJson['Cierres'] = $aCierres;

            $NombProcesos = $NombProcesos . "cot_cierres;";

            if (is_array($aCierres)) {

                unset($aCierres);
            }
        }
    }


/************************** Termina Cierres *****************************/



/***************** Inicia suma de costos ******************/


    /********* suma costo Empalme del Cajon ***********/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpEmp", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbEmp", $aJson);

    $aJson['costo_EmpCaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);



    /********* Forro del Cajon ****************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFCaj", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFCaj", $aJson);

    $aJson['costo_FCaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /*********** Empalme de la Tapa ***************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpEmpTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbEmpTap", $aJson);

    $aJson['costo_EmpTap'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /*********** Forro de la Tapa **********************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFTap", $aJson);

    $aJson['costo_FTap'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);



    /****************** Accesorios ********************/

    if (array_key_exists('Accesorios', $aJson)) {

        $aJson['costo_accesorios'] = round(floatval(array_sum(array_column($aJson['Accesorios'], 'costo_tot_proceso'))), 2);
    }


    /**************** Bancos **********************/

    if (array_key_exists('Bancos', $aJson)) {

        $aJson['costo_bancos'] = round(floatval(array_sum(array_column($aJson['Bancos'], 'costo_tot_proceso'))), 2);
    }


    /****************** Cierres ********************/

    if (array_key_exists('Cierres', $aJson)) {

        $aJson['costo_cierres'] = round(floatval(array_sum(array_column($aJson['Cierres'], 'costo_tot_proceso'))), 2);
    }



/***************** Termina suma de costos ******************/


    $subtotal = round($subtotal, 2);

    $aJson['costo_subtotal'] = $subtotal;


    /***************** Inicia empaque ******************/

        $empaque    = 0;
        $mensajeria = 0;

        $unid_por_tarima = 50;


        // Empaque
        $db_tmp = $ventas_model->costos_empaque("Tarima");

        $tarima = 0;

        foreach($db_tmp as $row) {

            $tarima = $row['importe'];
            $tarima = floatval($tarima);
            $tarima = round($tarima, 2);
        }


        $tarima_temp = ceil($tiraje / $unid_por_tarima);

        $costo_tarima = floatval($tarima * $tarima_temp);


        $db_tmp = $ventas_model->costos_empaque("Playo");

        $playo = 0;

        foreach($db_tmp as $row) {

            $playo = $row['importe'];
            $playo = floatval($playo);
            $playo = round($playo, 2);
        }

        $costo_playo = floatval($tarima_temp * $playo / 2);


        $db_tmp = $ventas_model->costos_empaque("Caja");

        $caja = 0;

        foreach($db_tmp as $row) {

            $caja = $row['importe'];
            $caja = floatval($caja);
            $caja = round($caja, 2);
        }


        $costo_caja = floatval($caja * $tarima_temp);

        $empaque = $costo_tarima + $costo_playo + $costo_caja;
        $empaque = round(floatval($empaque), $num_dec2);


        $aJson['empaque'] = $empaque;


    /***************** termina empaque ******************/


    /***************** Inicia mensajeria ******************/

        // mensajeria
        $l_grabar_mensajeria = false;

        $costo_odt_total = 0;
        $costo_subtotal  = 0;


        $db_tmp = $ventas_model->costos_empaque("Mensajeria");

        $costo_mensajeria  = 0;
        $costo_mensajeria1 = 0;

        foreach($db_tmp as $row) {

            $tiraje_minimo = $row['tiraje_minimo'];
            $tiraje_minimo = intval($tiraje_minimo);

            $tiraje_maximo = $row['tiraje_maximo'];
            $tiraje_maximo = intval($tiraje_maximo);

            if ($tiraje >= $tiraje_minimo and $tiraje <= $tiraje_maximo) {

                $costo_mensajeria = $row['importe'];
                $costo_mensajeria = floatval($costo_mensajeria);

                break;
            }
        }


        if ($tiraje <= $tiraje_maximo) {

                $costo_odt_total = $costo_mensajeria;
        } else {

            $db_tmp = $ventas_model->costos_empaque("Flete");

            foreach($db_tmp as $row) {

                $tiraje_minimo1 = $row['tiraje_minimo'];
                $tiraje_minimo1 = intval($tiraje_minimo1);

                $tiraje_maximo1 = $row['tiraje_maximo'];
                $tiraje_maximo1 = intval($tiraje_maximo1);

                if ($tiraje >= $tiraje_minimo1 and $tiraje <= $tiraje_maximo1) {

                    $costo_mensajeria1 = $row['importe'];
                    $costo_mensajeria  = floatval($costo_mensajeria1);

                    //$subtotal = $costo_mensajeria;

                    break;
                }
            }
        }


        $aJson['mensajeria'] = round(floatval($costo_mensajeria), 2);


    /***************** Termina mensajeria ******************/



    /***************** Inicia utilidad ******************/

        $db_tmp = $ventas_model->costos_descuentos("Utilidad");

        $utilidad_pctje = 0;

        foreach($db_tmp as $row) {

            $utilidad_pctje = $row['porcentaje'];
            $utilidad_pctje = floatval($utilidad_pctje);
            $utilidad_pctje = round($utilidad_pctje, 2);
        }


        $utilidad = 0;

        $utilidad = floatval($aJson['costo_subtotal'] * $utilidad_pctje);
        $utilidad = round($utilidad, 2);

        $aJson['Utilidad'] = $utilidad;


    /***************** Termina utilidad ******************/



    /***************** Inicia IVA ******************/

        $db_tmp = $ventas_model->costos_descuentos("IVA");

        $iva_pctje = 0;

        foreach($db_tmp as $row) {

            $iva_pctje = $row['porcentaje'];
            $iva_pctje = floatval($iva_pctje);
            $iva_pctje = round($iva_pctje, 2);
        }

        $iva = 0;

        $iva = floatval($aJson['costo_subtotal'] * $iva_pctje);
        $iva = round($iva, 2);

        $aJson['iva'] = $iva;


    /***************** Termina IVA ******************/



    /***************** Inicia comisiones ******************/

        $db_tmp = $ventas_model->costos_descuentos("Comisiones");

        $comisiones_pctje = 0;

        foreach($db_tmp as $row) {

            $comisiones_pctje = $row['porcentaje'];
            $comisiones_pctje = floatval($comisiones_pctje);
            $comisiones_pctje = round($comisiones_pctje, 2);
        }

        $comisiones = 0;

        $comisiones = floatval($aJson['costo_subtotal'] * $comisiones_pctje);
        $comisiones = round($comisiones, 2);

        $aJson['comisiones'] = $comisiones;


    /***************** Termina comisiones ******************/



    /***************** Inicia indirecto ******************/

        $db_tmp = $ventas_model->costos_descuentos("Indirecto");

        $indirecto_pctje = 0;

        foreach($db_tmp as $row) {

            $indirecto_pctje = $row['porcentaje'];
            $indirecto_pctje = floatval($indirecto_pctje);
            $indirecto_pctje = round($indirecto_pctje, 2);
        }

        $indirecto = 0;

        $indirecto = floatval($aJson['costo_subtotal'] * $indirecto_pctje);
        $indirecto = round($indirecto, 2);

        $aJson['indirecto'] = $indirecto;


    /***************** Termina indirecto ******************/



    /***************** Inicia venta ******************/

        $db_tmp = $ventas_model->costos_descuentos("Venta");

        $venta_pctje = 0;

        foreach($db_tmp as $row) {

            $venta_pctje = $row['porcentaje'];
            $venta_pctje = floatval($venta_pctje);
            $venta_pctje = round($venta_pctje, 2);
        }

        $venta = 0;

        $venta = floatval($aJson['costo_subtotal'] * $venta_pctje);
        $venta = round($venta, 2);


        $aJson['ventas'] = $venta;


    /***************** Termina venta ******************/



    /***************** Inicia ISR ******************/

        $db_tmp = $ventas_model->costos_descuentos("ISR");

        $isr = 0;

        foreach($db_tmp as $row) {

            $isr_pctje = $row['porcentaje'];
            $isr_pctje = floatval($isr_pctje);
            $isr_pctje = round($isr_pctje, 2);
        }

        $isr = 0;

        $isr = floatval($aJson['costo_subtotal'] * $isr_pctje);
        $isr = round($isr, 2);

        $aJson['ISR'] = $isr;


    /***************** Termina ISR ******************/


    /***************** Inicia descuento pctje **************/

        // descuento porcentaje
        $descuento_pctje = floatval($_POST['descuento_pctje']);

        $descuento = 0;

        $descuento = floatval($aJson['costo_subtotal'] * ($descuento_pctje / 100));

        $descuento = round($descuento, 2);

        $aJson['descuento'] = $descuento;


    /***************** Termina descuento pctje **************/


/******************************************/
/******************************************/


        $aJson['costo_odt'] = round(floatval($aJson['costo_subtotal'] - $aJson['descuento'] + $aJson['ventas'] + $aJson['indirecto'] + $aJson['comisiones'] + $aJson['iva'] + $aJson['ISR'] + $aJson['Utilidad'] + $aJson['empaque'] + $aJson['mensajeria']), 2);

        $aJson['keys'] = $NombProcesos;


/******************************************/

        /*
        $aJson['post'] = $_POST;

        die(json_encode($aJson));
        */

/******************************************/


        $debuger   = false;
        $post      = false;
        $grabar    = true;
        $respuesta = false;

        $str_error_len = 0;
        $str_error_len = strlen($aJson['error']);

        if ($str_error_len > 0) {

            $aJson['error'] = $aJson['error'] . " No debe grabar esta ODT...";

            $grabar = false;
        }


        //if ($grabar and $_POST['grabar'] == "SI" and strlen($aJson['tablas_faltantes']) < 3 and
        if ($grabar and $_POST['grabar'] == "SI") {

            //$respuesta = false;

            $respuesta = $regalo_model->insertRegalo($aJson, $ventas_model);

            echo json_encode($respuesta);
        } else {

            if ($post) {

                self::prettyPrint($_POST, "post", 4592);
            }

            if ($debuger) {

                self::prettyPrint($aJson, "aJson", 4597);
            }

            echo json_encode($aJson);
        }
    }


/****************** Termina la funcion saveCaja() **********************/

}
