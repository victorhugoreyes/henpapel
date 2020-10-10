<?php

class Circular extends Controller {

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

    // Calculadora Circular (id_modelo = 2)
    function circularCalc($diametro, $profundidad, $altura_tapa, $grosor_carton) {

        $calculadora = array();

        $d = floatval($diametro);
        $p = floatval($profundidad);
        $P = floatval($altura_tapa);
        $g = floatval($grosor_carton);


        $e = floatval($g / 20);

        /* Base */
        $z     = round(floatval($d + 1.6), 2);
        $z_1   = round(floatval($d + 1.4), 2);
        $d_1   = round(floatval($d + ($e * 2)), 2);
        $p_1   = floatval($e + $p);
        $c     = round(floatval($d_1 * (pi())), 2);
        $d_1_1 = round(floatval((2 * 0.4) + $d_1), 2);
        $r     = round(floatval($d + 1.4), 2);
        $p_1_1 = floatval($p_1 + $e + (2 * 0.4));
        $c_1   = round(floatval($c + 1), 2);
        $i     = floatval($p - 0.1);
        $c_1_1 = floatval($c + 0.5);

        /* Tapa */
        $D     = round(floatval($d_1 + 0.4), 2);
        $Z     = round(floatval($D + 1.6), 2);
        $Z_1   = round(floatval($D + 1.4), 2);
        $D_1   = round(floatval(($e * 2) + $D), 2);
        $C     = round(floatval($D_1 * (pi())), 2);
        $D_1_1 = round(floatval($D_1 + (2 * 0.4)), 2);
        $R     = round(floatval($D_1_1 + 1.5), 2);
        $P_1   = round(floatval($P + $e + 0.4), 2);
        $P_1_1 = round(floatval($P - $e -0.1), 2);
        $C_1   = round(floatval($C + 1), 2);
        $C_1_1 = round(floatval($C + 0.5), 2);

        $calculadora["d"]   = $d;
        $calculadora["p"]   = $p;
        $calculadora["P"]   = $P;
        $calculadora["g"]   = $g;

        $calculadora["e"] = $e;

        // base
        $calculadora["z"]     = $z;
        $calculadora["z_1"]   = $z_1;
        $calculadora["d_1"]   = $d_1;
        $calculadora["p_1"]   = $p_1;
        $calculadora["c"]     = $c;
        $calculadora["d_1_1"] = $d_1_1;
        $calculadora["r"]     = $r;
        $calculadora["p_1_1"] = $p_1_1;
        $calculadora["c_1"]   = $c_1;
        $calculadora["i"]     = $i;
        $calculadora["c_1_1"] = $c_1_1;

        // tapa
        $calculadora["D"]     = $D;
        $calculadora["Z"]     = $Z;
        $calculadora["Z_1"]   = $Z;
        $calculadora["D_1"]   = $D_1;
        $calculadora["C"]     = $C;
        $calculadora["D_1_1"] = $D_1_1;
        $calculadora["R"]     = $R;
        $calculadora["P_1"]   = $P_1;
        $calculadora["P_1_1"] = $P_1_1;
        $calculadora["C_1"]   = $C_1;
        $calculadora["C_1_1"] = $C_1_1;

        return $calculadora;
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


    // llama al formulario (cajas_circular.php)
    public function caja_circular() {

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

            $nombrecliente = $this->getClient($options_model);

            $idCliente = $_GET['cliente'];
            $idCliente = intval($idCliente);

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/cajas.php';

            // plantilla
            echo "<script>$('#form_modelo_0').hide();</script>";

            require 'application/views/cotizador/cajas_circular.php';

            echo "<script>$('#form_modelo_1_derecho').show('slow');</script>";

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



    // regresa el JSON para renderizar la odt
    public function modCajaCircular() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login          = $this->loadController('login');
        $login_model    = $this->loadModel('LoginModel');
        $options_model  = $this->loadModel('OptionsModel');
        $ventas_model   = $this->loadModel('VentasModel');
        $circular_model = $this->loadModel('CircularModel');


        if (isset($_GET['num_odt'])) {

            $num_odt = $_GET['num_odt'];
            $num_odt = trim(strval($num_odt));
        } else {

            return false;
        }


        if($login->isLoged()) {

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

            /*
            $modificado = self::actCajaAlmeja($ventas_model, $num_odt);

            if (!$modificado) {

                return false;
            }
            */

            $aJson = [];

            $tabla_db = $ventas_model->getNumOdt($num_odt);

            foreach ($tabla_db as $row) {

                $id_odt            = intval($row['id_odt']);
                $id_usuario        = intval($row['id_usuario']);
                $id_modelo         = intval($row['id_modelo']);
                $id_cliente        = intval($row['id_cliente']);
                $tiraje            = intval($row['cantidad']);
                $diametro          = intval($row['diametro']);
                $profundidad       = intval($row['profundidad']);
                $altura            = intval($row['altura']);
                $id_grosor_carton  = intval($row['id_grosor_carton']);
                $id_vendedor       = intval($row['id_vendedor']);
                $id_papel_bcaj     = intval($row['id_papel_bcaj']);
                $id_papel_circaj   = intval($row['id_papel_circaj']);
                $id_papel_fextcaj  = intval($row['id_papel_fextcaj']);
                $id_papel_pomcaj   = intval($row['id_papel_pomcaj']);
                $id_papel_fintcaj  = intval($row['id_papel_fintcaj']);
                $id_papel_bastap   = intval($row['id_papel_bastap']);
                $id_papel_cirtap   = intval($row['id_papel_cirtap']);
                $id_papel_fortap   = intval($row['id_papel_fortap']);
                $id_papel_fexttap  = intval($row['id_papel_fexttap']);
                $id_papel_finttap  = intval($row['id_papel_finttap']);

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

            /*
            $procesos = str_replace("[", "", $procesos);
            $procesos = str_replace("]", "", $procesos);
            $procesos = str_replace('"', "", $procesos);
            */

            if (is_array($tabla_db)) {

                unset($tabla_db);
            }

            $fecha = date("Y/m/d", $fecha_odt);
            $hora  = date("H:i:s", $hora_odt);


            $carton_db = $options_model->getDatos($id_grosor_carton);

            $id_carton     = intval($carton_db['id_papel']);
            $grosor_carton = intval($carton_db['numcarton']);

            if (is_array($carton_db)) {

                unset($carton_db);
            }


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


            $aJson['mensaje']        = "OK";
            $aJson['error']          = "";
            $aJson['id_odt']         = $id_odt;
            $aJson['num_odt']        = $num_odt;
            $aJson['Fecha']          = $fecha;
            $aJson['hora']           = $hora;
            $aJson['modelo']         = $id_modelo;
            $aJson['id_cliente']     = $id_cliente;
            $aJson['Nombre_cliente'] = $Nombre_cliente;
            $aJson['id_usuario']     = $id_usuario;
            $aJson['tiraje']         = $tiraje;

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

            $aJson['id_grosor_carton']  = $id_grosor_carton;
            $aJson['id_vendedor']       = $id_vendedor;

            $aJson['id_papel_bcaj']  = $id_papel_bcaj;
            $aJson['id_papel_circaj']  = $id_papel_circaj;
            $aJson['id_papel_fextcaj']  = $id_papel_fextcaj;
            $aJson['id_papel_pomcaj']  = $id_papel_pomcaj;
            $aJson['id_papel_fintcaj']  = $id_papel_fintcaj;
            $aJson['id_papel_bastap']  = $id_papel_bastap;
            $aJson['id_papel_cirtap']  = $id_papel_cirtap;
            $aJson['id_papel_fortap']  = $id_papel_fortap;
            $aJson['id_papel_fexttap']  = $id_papel_fexttap;
            $aJson['id_papel_finttap']  = $id_papel_finttap;


            $aJson['papel_BCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_papelbcaj");

            $aJson['papel_CirCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_papelcircaj");

            $aJson['papel_FextCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_papelfextcaj");

            $aJson['papel_PomCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_papelpomcaj");

            $aJson['papel_FintCaj'] = $ventas_model->getPapelTabla($id_odt, "cot_papelfintcaj");

            $aJson['papel_BasTap'] = $ventas_model->getPapelTabla($id_odt, "cot_papelbastap");

            $aJson['papel_CirTap'] = $ventas_model->getPapelTabla($id_odt, "cot_papelcirtap");

            $aJson['papel_ForTap'] = $ventas_model->getPapelTabla($id_odt, "cot_papelfortap");

            $aJson['papel_FexTap'] = $ventas_model->getPapelTabla($id_odt, "cot_papelfexttap");

            $aJson['papel_FinTap'] = $ventas_model->getPapelTabla($id_odt, "cot_papelfinttap");

            // carton cajon
            $aJson['carton_cir'] = $ventas_model->getIdCartonTabla($id_odt, "cot_cartoncir");


        // empiezan los costos variables (procesos)

            if ($procesos[strlen($procesos) -1 ] === ";") {

                $procesos = substr($procesos, 0, strlen($procesos) - 1);
            }

            $tabla_procesos = explode(";", $procesos);


        // Inicia procesos

            $num_procesos = count($tabla_procesos);

            for ($i = 0; $i < $num_procesos; $i++) {

                $nombre_tabla_tmp   = trim(strval($tabla_procesos[$i]));

                $nombreProcesoTabla = substr($nombre_tabla_tmp, 4);

                $proceso = $nombreProcesoTabla[0] . $nombreProcesoTabla[1] . $nombreProcesoTabla[2];

                $aOffset_tmp     = "";
                $aOffset_tmp_len = 0;

                switch ($proceso) {

                    case 'off':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_offset") - 1);

                        $grupo_seccion = 'aImp' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getOffsetTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);


                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]["Offset"][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'dig':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_dig") - 1);

                        $grupo_seccion = 'aImp' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getDigitalTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);


                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]["Digital"][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'ser':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_ser") - 1);

                        $grupo_seccion = 'aImp' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getSerigrafiaTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);


                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]["Serigrafia"][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'bar':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_barnizuv") - 1);

                        $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getBarnizuvTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);


                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]["Barniz"][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'las':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_laser") - 1);

                        $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getLaserTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);

                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]['Laser'][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'gra':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_grab") - 1);

                        $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getGrabadoTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);

                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]['Grabado'][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'lam':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_lam") - 1);

                        $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getLaminadoTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);

                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]['Laminado'][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                    case 'sua':

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_suaje") - 1);

                        $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getSuajeTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);

                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]['Suaje'][$ii] = $aOffset_tmp[$ii];
                        }

                        break;
                }

                $proceso = $nombreProcesoTabla[0] . $nombreProcesoTabla[1];

                if( $proceso == "hs"){

                        $nombre_seccion_tmp = substr($nombre_tabla_tmp, 4 + strlen("_hs") - 1);

                        $grupo_seccion = 'aAcb' . $nombre_seccion_tmp;

                        $aOffset_tmp     = $circular_model->getHotStampingTabla($id_odt, $nombre_tabla_tmp);
                        $aOffset_tmp_len = count($aOffset_tmp);

                        for ($ii = 0; $ii < $aOffset_tmp_len; $ii++) {

                            $aJson[$grupo_seccion]['HS'][$ii] = $aOffset_tmp[$ii];
                        }
                }
            }

            /*
            print '<br>(752) aJson: <pre>';
            print_r($aJson);
            print '</pre>';


            die();
            */

            json_encode($aJson);


            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/cajas.php';

            echo "<script>$('#form_modelo_0').hide();</script>";

            require 'application/views/cotizador/mod_cajas_circular.php';

            echo "<script>$('#form_modelo_1_derecho').show('slow');</script>";

            require 'application/views/templates/footer.php';
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    // Empieza el calculo de circular
    public function saveCaja() {

        if (!isset($_SESSION)) {

            session_start();
        }
        
        $login          = $this->loadController('login');
        $login_model    = $this->loadModel('LoginModel');
        $options_model  = $this->loadModel('OptionsModel');
        $ventas_model   = $this->loadModel('VentasModel');
        $circular_model = $this->loadModel('CircularModel');


        if( !$login->isLoged() ) {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }


        $aJson   = [];

        $l_existe = true;

        $l_existe = $ventas_model->chkODT();

        if (!$l_existe) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = "Ya existe esta ODT;";

            return $aJson;
        }

        


        $tiraje = $_POST['qty'];
        $tiraje = intval($tiraje);

        if (isset($_POST['submit'])) {

            if ($tiraje <= 0) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] .  "Ingrese todoso los datos;";

                return $aJson;
            }
        }


        $id_usuario = $_SESSION['id_usuario'];
        $id_usuario = intval($id_usuario);

        //$id_usuario = $_SESSION['user']['id_usuario'];
        //$id_usuario = intval($id_usuario);

        $id_tienda = $_SESSION['id_tienda'];
        $id_tienda = intval($id_tienda);

        $num_dec2 = 2;
        $num_dec4 = 4;

        $l_subtotal = true;
        $l_costo    = true;

        $cantidad        = 0;
        $costo_total     = 0;
        $costo_corte     = 0;
        $cantidad_offset = 0;


        $modelo = $_POST['modelo'];
        $modelo = intval($modelo);

        $odt = strip_tags(trim($_POST['odt']));
        $odt = strtoupper($odt);
        $odt = strval($odt);


        $diametro = 0;
        $diametro = $_POST['diametro'];
        $diametro = floatval($diametro);

        $profundidad = 0;
        $profundidad = $_POST['profundidad'];
        $profundidad = floatval($profundidad);

        $altura_tapa = 0;
        $altura_tapa = $_POST['altura_tapa'];
        $altura_tapa = floatval($altura_tapa);

        $grosor_carton = 0;
        $grosor_carton = $_POST['grosor_carton'];
        $grosor_carton = floatval($grosor_carton);


        $id_cliente = $_POST['id_cliente'];

        $id_cliente = (int) filter_var($id_cliente, FILTER_SANITIZE_NUMBER_INT);
        //$id_cliente = intval(preg_replace('/\D/', '', $id_cliente));              // OK
        //$id_cliente1 = intval(preg_replace('/[^0-9]+/', '', $id_cliente), 10);    // OK

        $nombre_cliente = "";

        $cliente_db = $ventas_model->getClientById($id_cliente);

        foreach ($cliente_db as $row) {

            $nombre_cliente = $row['nombre'];

            $nombre_cliente = trim(strval($nombre_cliente));
            //$nombre_cliente = utf8_encode($nombre_cliente);
        }

        $aCalculadora = self::circularCalc($diametro, $profundidad, $altura_tapa, $grosor_carton);

        $aCortes = [];

        $NombProcesos = "";

    // aJson
        // crea el array principal
        $aJson['mensaje']         = "Correcto";
        $aJson['error']           = "";
        $aJson['id_cliente']      = $id_cliente;
        $aJson['nombre_cliente']  = $nombre_cliente;
        $aJson['nomb_odt']        = trim(strval($_POST['odt']));
        $aJson['Fecha']           = date("Y-m-d");
        $aJson['modelo']          = $modelo;
        $aJson['tiraje']          = $tiraje;
        $aJson['id_usuario']      = $id_usuario;
        $aJson['id_tienda']       = $id_tienda;
        $aJson['diametro']        = $diametro;
        $aJson['profundidad']     = $profundidad;
        $aJson['altura_tapa']     = $altura_tapa;

        $aJson['costo_odt']       = 0;
        $aJson['costo_subtotal']  = 0;
        $aJson['Utilidad']        = 0;
        $aJson['iva']             = 0;
        $aJson['comisiones']      = 0;
        $aJson['indirecto']       = 0;
        $aJson['ventas']          = 0;
        $aJson['descuento']       = 0;
        $aJson['descuento_pctje'] = floatval($_POST['descuento_pctje']);
        $aJson['ISR']             = 0;
        $aJson['empaque']         = 0;
        $aJson['mensajeria']      = 0;
        $aJson['costo_papeles']   = 0;
        $aJson['costo_cartones']  = 0;
        $aJson['costos_fijos']    = 0;

        $aJson['costo_bcaj']     = 0;
        $aJson['costo_circaj']   = 0;
        $aJson['costo_fextcaj']  = 0;
        $aJson['costo_pomcaj']   = 0;
        $aJson['costo_fintcaj']  = 0;
        $aJson['costo_btapa']    = 0;
        $aJson['costo_cirtapa']  = 0;
        $aJson['costo_ftapa']    = 0;
        $aJson['costo_fexttapa'] = 0;
        $aJson['costo_finttapa'] = 0;

        $aJson['ranurado']         = 0;
        $aJson['encuadernacion']   = 0;
        $aJson['forrado_cajon']    = 0;
        $aJson['costo_bancos']     = 0;
        $aJson['costo_cierres']    = 0;
        $aJson['costo_accesorios'] = 0;


    // Grosor Carton
        $id_grosor_carton = floatval($_POST['grosor_carton']);

        $grosor_caj = self::getPapelCarton("grosor_carton", $id_grosor_carton);

        $c_ancho = floatval($grosor_caj['ancho_papel']);
        $c_largo = floatval($grosor_caj['largo_papel']);


        $aJson['Calculadora'] = $aCalculadora;

        $d       = floatval($aCalculadora['d']);
        $d_1     = floatval($aCalculadora['d_1']);
        $z       = floatval($aCalculadora['z']);
        $z_1     = floatval($aCalculadora['z_1']);

        $aGrosorCajon = array();

        $aGrosorCajon['d']       = $d;
        $aGrosorCajon['d_1']     = $d_1;
        $aGrosorCajon['z']       = $z;
        $aGrosorCajon['z_1']     = $z_1;
        $aGrosorCajon['c_ancho'] = $c_ancho;
        $aGrosorCajon['c_largo'] = $c_largo;

        $acomodoCorte  = "V";
        $acomodoPliego = "V";

        $cortes = self::Acomoda($z, $z_1, $c_ancho, $c_largo, $acomodoCorte, $acomodoPliego);

        $totalCortes = $cortes['cortesT'];

        $acomodoCorte  = "H";
        $acomodoPliego = "V";

        $cortes_H = self::Acomoda($z, $z_1, $c_ancho, $c_largo, $acomodoCorte, $acomodoPliego);

        $totalCortes_H = $cortes_H['cortesT'];


        $corte   = $cortes['cortesT'];
        $corte_H = $cortes_H['cortesT'];

        $corte_carton = max($corte, $corte_H);

        if ($corte_carton) {

            $aCortes['grosor_carton'] = $corte_carton;
        }

        $aJson['cortes'] = $aCortes;



    // calcular los costos del carton
        $id_grosor_carton = $_POST['grosor_carton'];
        $id_grosor_carton = floatval($id_grosor_carton);

        $id_carton         = $grosor_caj['id_papel'];
        $nombre_carton     = $grosor_caj['nombre_papel'];
        $ancho_carton      = $grosor_caj['ancho_papel'];
        $largo_carton      = $grosor_caj['largo_papel'];
        $costo_unit_carton = $grosor_caj['costo_unit_papel'];


        $tot_pliegos_carton = self::Deltax($tiraje, $corte_carton);

        $tot_costo_carton = round(floatval($tot_pliegos_carton * $costo_unit_carton), 2);


        $aGrosor_carton = array();

        $aGrosor_carton['id_carton']     = $id_carton;
        $aGrosor_carton['nombre']        = $nombre_carton;
        $aGrosor_carton['grosor_carton'] = $id_grosor_carton;
        $aGrosor_carton['ancho']         = $ancho_carton;
        $aGrosor_carton['largo']         = $largo_carton;
        $aGrosor_carton['corte']         = $corte_carton;
        $aGrosor_carton['costo_unit']    = $costo_unit_carton;
        $aGrosor_carton['tot_pliegos']   = $tot_pliegos_carton;
        $aGrosor_carton['tot_costo']     = $tot_costo_carton;
        $aGrosor_carton['calculadora']   = $aGrosorCajon;

        $aJson['grosor_carton'] = $aGrosor_carton;

        if (is_array($aGrosorCajon) and count($aGrosorCajon) > 0) {

            unset($aGrosorCajon);
        }

        if (is_array($aGrosor_carton) and count($aGrosor_carton) > 0) {

            unset($aGrosor_carton);
        }


/**************** Inicia el calculo de todos los papeles **************/

    // calcular los papeles

        $id_papel_BCaj     = 0;
        $id_papel_CirCaj   = 0;
        $id_papel_FextCaj  = 0;
        $id_papel_PomCaj   = 0;
        $id_papel_FintCaj  = 0;
        $id_papel_BTapa    = 0;
        $id_papel_CirTapa  = 0;
        $id_papel_FTapa    = 0;
        $id_papel_FextTapa = 0;
        $id_papel_FintTapa = 0;



    /*********** Base del Cajon *************/

        $id_papel_BCaj = intval($_POST['optBasCajon']);

        $secc_ancho = floatval($aCalculadora['z_1']);
        $secc_largo = floatval($aCalculadora['z']);

        $aPapel_tmp = self::calculaPapel("BCaj", $id_papel_BCaj, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes']['papel_BCaj'] = $aPapel_tmp['corte'];

        $aJson['papel_BCaj'] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Base del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Circunferencia del Cajon *************/


        $id_papel = intval($_POST['optCirCajon']);

        $id_papel_CirCaj = $id_papel;

        $secc_ancho = floatval($aCalculadora['p_1']);
        $secc_largo = floatval($aCalculadora['c']);

        $aPapel_tmp = self::calculaPapel("CirCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes']['papel_CirCaj'] = $aPapel_tmp['corte'];

        $aJson['papel_CirCaj'] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Circunferencia del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }


    /*********** Forro Exterior del Cajon *************/

        $id_papel = intval($_POST['optExtCajon']);

        $id_papel_FextCaj = $id_papel;

        $secc_ancho = floatval($aCalculadora['p_1_1']);
        $secc_largo = floatval($aCalculadora['c']);

        $aPapel_tmp = self::calculaPapel("FextCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes']['papel_FextCaj'] = $aPapel_tmp['corte'];

        $aJson['papel_FextCaj'] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro exterior del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Pompa del Cajon *************/

        $id_papel = intval($_POST['optPomCajon']);

        $id_papel_PomCaj = $id_papel;

        $secc_ancho = floatval($aCalculadora['d']);
        $secc_largo = floatval($aCalculadora['r']);

        $aPapel_tmp = self::calculaPapel("PomCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes']['papel_PomCaj'] = $aPapel_tmp['corte'];

        $aJson['papel_PomCaj'] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Pompa del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Forro Interior del Cajon *************/

        $id_papel = intval($_POST['optIntCajon']);

        $id_papel_FintCaj = $id_papel;

        $secc_ancho = floatval($aCalculadora['i']);
        $secc_largo = floatval($aCalculadora['c_1_1']);

        $aPapel_tmp = self::calculaPapel("PomCaj", $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes']['papel_FintCaj'] = $aPapel_tmp['corte'];

        $aJson['papel_FintCaj'] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro interior del cajon;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Base de la Tapa *************/

        $id_papel = intval($_POST['optBasTapa']);

        $id_papel_BasTap = $id_papel;

        $secc_sufijo = "BasTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        $secc_ancho = floatval($aCalculadora['Z']);
        $secc_largo = floatval($aCalculadora['Z']);

        $aPapel_tmp = self::calculaPapel($secc_sufijo, $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes'][$nomb_inner] = $aPapel_tmp['corte'];

        $aJson[$nomb_inner] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Base de la tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Circunferencia de la Tapa *************/

        $id_papel = intval($_POST['optCirTapa']);

        $id_papel_CirTap = $id_papel;

        $secc_sufijo = "CirTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        $secc_ancho = floatval($aCalculadora['P']);
        $secc_largo = floatval($aCalculadora['C']);

        $aPapel_tmp = self::calculaPapel($secc_sufijo, $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes'][$nomb_inner] = $aPapel_tmp['corte'];

        $aJson[$nomb_inner] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Circunferencia de la tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Forro de la Tapa *************/

        $id_papel = intval($_POST['optForTapa']);

        $id_papel_ForTap = $id_papel;

        $secc_sufijo = "ForTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        $secc_ancho = floatval($aCalculadora['R']);
        $secc_largo = floatval($aCalculadora['R']);

        $aPapel_tmp = self::calculaPapel($secc_sufijo, $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes'][$nomb_inner] = $aPapel_tmp['corte'];

        $aJson[$nomb_inner] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro de la tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Forro Exterior de la Tapa *************/

        $id_papel = intval($_POST['optExtTapa']);

        $id_papel_FexTap = $id_papel;

        $secc_sufijo = "FexTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        $secc_ancho = floatval($aCalculadora['R']);
        $secc_largo = floatval($aCalculadora['R']);

        $aPapel_tmp = self::calculaPapel($secc_sufijo, $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes'][$nomb_inner] = $aPapel_tmp['corte'];

        $aJson[$nomb_inner] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro exterior de la tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }



    /*********** Forro Interior de la Tapa *************/

        $id_papel = intval($_POST['optIntTapa']);

        $id_papel_FinTap = $id_papel;

        $secc_sufijo = "FinTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        $secc_ancho = floatval($aCalculadora['R']);
        $secc_largo = floatval($aCalculadora['R']);

        $aPapel_tmp = self::calculaPapel($secc_sufijo, $id_papel, $secc_ancho, $secc_largo, $tiraje, $ventas_model);


        $aJson['cortes'][$nomb_inner] = $aPapel_tmp['corte'];

        $aJson[$nomb_inner] = $aPapel_tmp;

        if ($aPapel_tmp['tot_costo'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe costo para el papel en: Forro interior de la tapa;";
        }

        if (is_array($aPapel_tmp) and count($aPapel_tmp) > 0) {

            unset($aPapel_tmp);
        }


/**************** Termina el calculo de todos los papeles **************/


        $aMerma = [];



/******************* Inicia Costos fijos *************************/

        $tiraje_ranurado = $tiraje;

        $base_tmp = floatval($aJson['Calculadora']['z_1']);
        $alto_tmp = floatval($aJson['Calculadora']['z_1']);


    /****************** ranurado ********************************/


        $costo_ranurado = self::calculoRanurado($tiraje, $ventas_model);

        $aJson['ranurado'] = $costo_ranurado;

        if ($costo_ranurado['costo_tot_proceso'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe algun costo para ranurado;";
        }

    /********************* encuadernacion ******************************/

        $enc_cortes_fcaj = intval($aJson['cortes']['papel_BCaj']);
        $id_papel_exterior_cajon = intval($aJson['papel_BCaj']['id_papel']);

        $aJson['encuadernacion'] = self::calculoEncuadernacion($tiraje, $enc_cortes_fcaj, $id_papel_exterior_cajon, $ventas_model);

        $temp = floatval($aJson['encuadernacion']['costo_tot_proceso']);

        if ($temp <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe algun costo para encuadernacion;";
        }


    /************ forrado del cajon ( faltan datos de los forrados ) ******************/

        /*
        $aJson['forrado_cajon'] = self::calculoForradoCajon($tiraje, $enc_cortes_fcaj, $id_papel_exterior_cajon, $ventas_model);

        $temp = floatval($aJson['forrado_cajon']['costo_tot_proceso']);

        if ($temp <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "No existe algun costo para forrado del cajon;";
        }
        */


/************** Termina Costos fijos *************************/



/******************* inicia boton de Impresion ******************************/


    $mensaje = "ERROR";
    $error   = "No existe costo para ";



    /****************** Inicia los calculos de Base del Cajon *****************/


        $secc_sufijo = "BCaj";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Base del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpBCaj'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);


        $num_rows = count($Tipo_proceso_tmp2);

        $a_tmp             = $aJson[$nomb_inner];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];


        $aOffBCaj      = [];
        $aOff_maq_BCaj = [];
        $aDigBCaj      = [];
        $aSerBCaj      = [];

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

                $Nombre_proceso     = $Tipo_proceso_tmp[$i]["Tipo_impresion"];


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

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_BCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_BCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset(Base del Cajon);";
                        }

                        $aOffBCaj[$i] = $offset_tiro;

                        $aOffBCaj[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        //$aOff_maq_BCaj[$i] = self::calculoOffset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);

                        $aOff_maq_BCaj[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam  = $tam0[0];
                    $tam1 = $tam0[1];

                    if ($tam == "TC") {

                        $imp_ancho_dig = 20.5;
                        $imp_largo_dig = 27;
                    } elseif ($tam == "T2C") {

                        $imp_ancho_dig = 32;
                        $imp_largo_dig = 46.5;
                    }

                    if ( $tam1 ) {

                        $aDigBCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigBCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "digital. No cabe con las medidas proporcionadas en Base del cajon;";
                        } elseif ($aDigBCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "digital. No existe costo en Base del cajon;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error .  "digital. No cae con las medidas proporcionadas en Base del cajon;";

                        $aDigBCaj[$i]['cabe_digital']      = "NO";
                        $aDigBCaj[$i]['cantidad']          = $tiraje;
                        $aDigBCaj[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigBCaj[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigBCaj[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigBCaj[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigBCaj[$i]["costo_unitario"]    = 0;
                        $aDigBCaj[$i]["costo_tot_proceso"] = 0;

                        $aMerma_DigBCaj = [];

                        $aMerma_DigBCaj['merma_min']               = 0;
                        $aMerma_DigBCaj['merma_adic']              = 0;
                        $aMerma_DigBCaj['merma_tot']               = 0;
                        $aMerma_DigBCaj['cortes_por_pliego']       = 0;
                        $aMerma_DigBCaj['merma_tot_pliegos']       = 0;
                        $aMerma_DigBCaj['costo_unit_papel_merma']  = 0;
                        $aMerma_DigBCaj['costo_tot_pliegos_merma'] = 0;


                        $aDigBCaj[$i]["mermas"] = $aMerma_DigBCaj;

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

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cortes_pliego = intval($aJson['cortes'][$nomb_inner]);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]['costo_unit_papel']);


                    $aSerBCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerBCaj[$i]['costo_tot_proceso'] = 0;

                    if ($aSerBCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Base del Cajon);";
                    }


                    $Merma_SerBCaj_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);

                    $aSerBCaj[$i]['mermas'] = $Merma_SerBCaj_tmp;

                    if (is_array($Merma_SerBCaj_tmp)) {

                        unset($Merma_SerBCaj_tmp);
                    }
                }
            }
        }


        if (count($aOffBCaj) > 0) {

            $aOffBCaj_R = array_values($aOffBCaj);

            $aJson['aImpBCaj']['Offset'] = $aOffBCaj_R;

            $NombProcesos = $NombProcesos . "cot_offsetbcaj;";

            unset($aOffBCaj);
            unset($aOffBCaj_R);
        }


        if (count($aOff_maq_BCaj) > 0) {

            $aOff_maq_BCaj_R = array_values($aOff_maq_BCaj);

            $aJson['aImpBCaj']['Maquila'] = $aOff_maq_BCaj_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_bcaj;";

            unset($aOff_maq_BCaj_R);
        }


        if (count($aDigBCaj) > 0) {

            $aDigBCaj_R = array_values($aDigBCaj);

            $aJson['aImpBCaj']['Digital'] = $aDigBCaj_R;

            $NombProcesos = $NombProcesos . "cot_digbcaj;";

            unset($aDigBCaj);
            unset($aDigBCaj);
        }


        if (count($aSerBCaj) > 0) {

            $aSerBCaj_R = array_values($aSerBCaj);

            $aJson['aImpBCaj']['Serigrafia'] = $aSerBCaj_R;

            $NombProcesos = $NombProcesos . "cot_serbcaj;";

            unset($aSerBCaj);
            unset($aSerBCaj_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }


    /******************* Termina los calculos de la Base del Cajon ***************/



    /*************** Inicia los calculos de Circunferencia del cajon ***************/


        $secc_sufijo = "CirCaj";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpCirCaj'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];


        $aOffCirCaj      = [];
        $aOff_maq_CirCaj = [];
        $aDigCirCaj      = [];
        $aSerCirCaj      = [];


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

                    $costo_unit_papel = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];
                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_CirCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_CirCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                                $aJson['mensaje'] = $mensaje;
                                $aJson['error']   = $aJson['error'] . $error . "Offset(Circunferencia del Cajon);";
                        }

                        $aOffCirCaj[$i] = $offset_tiro;

                        $aOffCirCaj[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_CirCaj[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam  = $tam0[0];
                    $tam1 = $tam0[1];


                    if ( $tam1 ) {

                        $aDigCirCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigCirCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Circunferencia del cajon;";
                        } elseif ($aDigCirCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Circunferencia del cajon;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Digital. Medidas? (Circunferencia del cajon);";

                        $aDigCirCaj[$i]['cabe_digital']          = "NO";
                        $aDigCirCaj[$i]['cantidad']          = $tiraje;
                        $aDigCirCaj[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigCirCaj[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigCirCaj[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigCirCaj[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigCirCaj[$i]["costo_unitario"]    = 0;
                        $aDigCirCaj[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigCirCaj[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerCirCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerCirCaj[$i]['costo_tot_proceso'] = 0;

                    if ($aSerCirCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Circunferencia del Cajon);";
                    }

                    $aSerCirCaj[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffCirCaj) > 0) {

            $aOffCirCaj_R = array_values($aOffCirCaj);

            $aJson['aImpCirCaj']['Offset'] = $aOffCirCaj_R;

            $NombProcesos = $NombProcesos . "cot_offsetcircaj;";

            unset($aOffCirCaj);
            unset($aOffCirCaj_R);
        }


        if (count($aOff_maq_CirCaj) > 0) {

            $aOff_maq_CirCaj_R = array_values($aOff_maq_CirCaj);

            $aJson['aImpCirCaj']['Maquila'] = $aOff_maq_CirCaj_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_circaj;";

            unset($aOff_maq_CirCaj);
            unset($aOff_maq_CirCaj_R);
        }

        if (count($aDigCirCaj) > 0) {

            $aDigCirCaj_R = array_values($aDigCirCaj);

            $aJson['aImpCirCaj']['Digital'] = $aDigCirCaj_R;

            $NombProcesos = $NombProcesos . "cot_digcircaj;";

            unset($aDigCirCaj);
            unset($aDigCirCaj_R);
        }


        if (count($aSerCirCaj) > 0) {

            $aSerCirCaj_R = array_values($aSerCirCaj);

            $aJson['aImpCirCaj']['Serigrafia'] = $aSerCirCaj_R;

            $NombProcesos = $NombProcesos . "cot_sercircaj;";

            unset($aSerCirCaj);
            unset($aSerCirCaj_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /******************* Termina los calculos Circunferencia del Cajon ***********/




    /******************* Inicia los calculos Forro Exterior del Cajon **********/


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


        $aOffFextCaj      = [];
        $aOff_maq_FextCaj = [];
        $aDigFextCaj      = [];
        $aSerFextCaj      = [];


        $secc_sufijo = "FextCaj";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFextCaj'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);


        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FextCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FextCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Forro exterior del cajon);";
                        }

                        $aOffFextCaj[$i] = $offset_tiro;


                        $aOffFextCaj[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FextCaj[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $tipo_offset = $Tipo_proceso_tmp[$i]['tipo_digital'];

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam  = $tam0[0];
                    $tam1 = $tam0[1];


                    if ( $tam1 ) {

                        $aDigFextCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFextCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Forro exterior del cajon;";
                        } elseif ($aDigFextCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Forro exterior del cajon;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Forro exterior del cajon;";

                        $aDigFextCaj[$i]['cabe_digital']          = "NO";
                        $aDigFextCaj[$i]['cantidad']          = $tiraje;
                        $aDigFextCaj[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFextCaj[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFextCaj[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigFextCaj[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigFextCaj[$i]["costo_unitario"]    = 0;
                        $aDigFextCaj[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFextCaj[$i]["mermas"] = $aMerma_Dig;

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

                    $cortes_pliego = intval($aJson['cortes'][$nomb_inner]);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]['costo_unit_papel']);



                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);


                    $aSerFextCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerFextCaj[$i]['costo_tot_proceso'] = 0;

                    if ($aSerFextCaj[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Forro exterior del cajon);";
                    }

                    $aSerFextCaj[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffFextCaj) > 0) {

            $aOffFextCaj_R = array_values($aOffFextCaj);

            $aJson['aImpFextCaj']['Offset'] = $aOffFextCaj_R;

            $NombProcesos = $NombProcesos . "cot_offsetfextcaj;";

            unset($aOffFextCaj);
            unset($aOffFextCaj_R);
        }


        if (count($aOff_maq_FextCaj) > 0) {

            $aOff_maq_FextCaj_R = array_values($aOff_maq_FextCaj);

            $aJson['aImpFextCaj']['Maquila'] = $aOff_maq_FextCaj_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_fextcaj;";

            unset($aOff_maq_FextCaj);
            unset($aOff_maq_FextCaj_R);
        }


        if (count($aDigFextCaj) > 0) {

            $aDigFextCaj_R = array_values($aDigFextCaj);

            $aJson['aImpFextCaj']['Digital'] = $aDigFextCaj_R;

            $NombProcesos = $NombProcesos . "cot_digfextcaj;";

            unset($aDigFextCaj);
            unset($aDigFextCaj_R);
        }


        if (count($aSerFextCaj) > 0) {

            $aSerFextCaj_R = array_values($aSerFextCaj);

            $aJson['aImpFextCaj']['Serigrafia'] = $aSerFextCaj_R;

            $NombProcesos = $NombProcesos . "cot_serfextcaj;";

            unset($aSerFextCaj);
            unset($aSerFextCaj_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /******************* Termina los calculos Forro Exterior del Cajon ************/



    /******************* Inicia los calculos de Pompa del Cajon ********************/


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


        $aOffPomCaj      = [];
        $aOff_maq_PomCaj = [];
        $aDigPomCaj      = [];
        $aSerPomCaj      = [];


        $secc_sufijo = "PomCaj";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpPomCaj'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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


                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]["costo_unit_papel"]);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_PomCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_PomCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Pompa del cajon;";
                        }

                        $aOffPomCaj[$i] = $offset_tiro;


                        $aOffPomCaj[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_PomCaj[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam  = $tam0[0];
                    $tam1 = $tam0[1];


                    if ( $tam1 ) {

                        $aDigPomCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigPomCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Pompa del cajon;";
                        } elseif ($aDigPomCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Pompa del cajon;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Pompa del cajon;";

                        $aDigPomCaj[$i]['cabe_digital']          = "NO";
                        $aDigPomCaj[$i]['cantidad']          = $tiraje;
                        $aDigPomCaj[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigPomCaj[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigPomCaj[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigPomCaj[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigPomCaj[$i]["costo_unitario"]    = 0;
                        $aDigPomCaj[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigPomCaj[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerPomCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerPomCaj[$i]['costo_tot_proceso'] = 0;

                    if ($aSerPomCaj[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Pompa del cajon;";
                    }

                    $aSerPomCaj[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffPomCaj) > 0) {

            $aOffPomCaj_R = array_values($aOffPomCaj);

            $aJson['aImpPomCaj']['Offset'] = $aOffPomCaj_R;

            $NombProcesos = $NombProcesos . "cot_offsetpomcaj;";

            unset($aOffPomCaj);
            unset($aOffPomCaj_R);
        }


        if (count($aOff_maq_PomCaj) > 0) {

            $aOff_maq_PomCaj_R = array_values($aOff_maq_PomCaj);

            $aJson['aImpPomCaj']['Maquila'] = $aOff_maq_PomCaj_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_pomcaj;";

            unset($aOff_maq_PomCaj);
            unset($aOff_maq_PomCaj_R);
        }

        if (count($aDigPomCaj) > 0) {

            $aDigPomCaj_R = array_values($aDigPomCaj);

            $aJson['aImpPomCaj']['Digital'] = $aDigPomCaj_R;

            $NombProcesos = $NombProcesos . "cot_digpomcaj;";

            unset($aDigPomCaj);
            unset($aDigPomCaj_R);
        }


        if (count($aSerPomCaj) > 0) {

            $aSerPomCaj_R = array_values($aSerPomCaj);

            $aJson['aImpPomCaj']['Serigrafia'] = $aSerPomCaj_R;

            $NombProcesos = $NombProcesos . "cot_serpomcaj;";

            unset($aSerPomCaj);
            unset($aSerPomCaj_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }


    /****************** Termina los calculos de Pompa del Cajon ********************/



    /******************* Inicia los calculos de Forro Interior del Cajon ********************/


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


        $aOffFintCaj      = [];
        $aOff_maq_FintCaj = [];
        $aDigFintCaj      = [];
        $aSerFintCaj      = [];


        $secc_sufijo = "FintCaj";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFintCaj'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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

                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FintCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FintCaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error'] = $aJson['error'] . $error . "Offset (Forro interior del cajon;";
                        }


                        $aOffFintCaj[$i] = $offset_tiro;

                        $aOffFintCaj[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FintCaj[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam1 = $tam0[1];


                    if ( $tam1 ) {

                        $aDigFintCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFintCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Forro interior del cajon;";
                        } elseif ($aDigFintCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error'] = $aJson['error'] . $error . "digital Forro interior del cajon;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $error;
                        $aJson['error'] = $aJson['error'] . $error . "digital Forro interior del cajon;";

                        $aDigFintCaj[$i]['cabe_digital']      = "NO";
                        $aDigFintCaj[$i]['cantidad']          = $tiraje;
                        $aDigFintCaj[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFintCaj[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFintCaj[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigFintCaj[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigFintCaj[$i]["costo_unitario"]    = 0;
                        $aDigFintCaj[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFintCaj[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerFintCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerFintCaj[$i]['costo_tot_proceso'] = 0;

                    if ($aSerFintCaj[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error'] = $aJson['error'] . $error . "Serigrafia (Forro interior del cajon;";
                    }


                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);

                    $aSerFintCaj[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffFintCaj) > 0) {

            $aOffFintCaj_R = array_values($aOffFintCaj);

            $aJson['aImpFintCaj']['Offset'] = $aOffFintCaj_R;

            $NombProcesos = $NombProcesos . "cot_offsetfintcaj;";

            unset($aOffFintCaj);
            unset($aOffFintCaj_R);
        }


        if (count($aOff_maq_FintCaj) > 0) {

            $aOff_maq_FintCaj_R = array_values($aOff_maq_FintCaj);

            $aJson['aImpFintCaj']['Maquila'] = $aOff_maq_FintCaj_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_fintcaj;";

            unset($aOff_maq_FintCaj);
            unset($aOff_maq_FintCaj_R);
        }


        if (count($aDigFintCaj) > 0) {

            $aDigFintCaj_R = array_values($aDigFintCaj);

            $aJson['aImpFintCaj']['Digital'] = $aDigFintCaj_R;

            $NombProcesos = $NombProcesos . "cot_digfintcaj;";

            unset($aDigFintCaj);
            unset($aDigFintCaj_R);
        }


        if (count($aSerFintCaj) > 0) {

            $aSerFintCaj_R = array_values($aSerFintCaj);

            $aJson['aImpFintCaj']['Serigrafia'] = $aSerFintCaj_R;

            $NombProcesos = $NombProcesos . "cot_serfintcaj;";

            unset($aSerFintCaj);
            unset($aSerPomCaj_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }


    /****************** Termina los calculos de Forro Interior del Cajon ********************/



    /******************* Inicia los calculos de Base de la tapa ********************/


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


        $aOffBasTap      = [];
        $aOff_maq_BasTap = [];
        $aDigBasTap      = [];
        $aSerBasTap      = [];


        $secc_sufijo = "BasTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpBTapa'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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

                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]["costo_unit_papel"]);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_BasTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_BasTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Base de la tapa);";
                        }

                        $aOffBasTap[$i] = $offset_tiro;


                        $aOffBasTap[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_BasTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam1 = $tam0[1];

                    if ( $tam1 ) {

                        $aDigBasTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigBasTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Base de la tapa;";
                        } elseif ($aDigBasTap[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Base de la tapa;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Base de la tapa;";

                        $aDigBasTap[$i]['cabe_digital']      = "NO";
                        $aDigBasTap[$i]['cantidad']          = $tiraje;
                        $aDigBasTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigBasTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigBasTap[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigBasTap[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigBasTap[$i]["costo_unitario"]    = 0;
                        $aDigBasTap[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigBasTap[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerBasTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerBasTap[$i]['costo_tot_proceso'] = 0;

                    if ($aSerBasTap[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Base de la tapa);";
                    }

                    $aSerBasTap[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffBasTap) > 0) {

            $aOffBasTap_R = array_values($aOffBasTap);

            $aJson['aImpBasTap']['Offset'] = $aOffBasTap_R;

            $NombProcesos = $NombProcesos . "cot_offsetbastap;";

            unset($aOffBasTap);
            unset($aOffBasTap_R);
        }


        if (count($aOff_maq_BasTap) > 0) {

            $aOff_maq_BasTap_R = array_values($aOff_maq_BasTap);

            $aJson['aImpBasTap']['Maquila'] = $aOff_maq_BasTap_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_bastap;";

            unset($aOff_maq_BasTap);
            unset($aOff_maq_BasTap_R);
        }


        if (count($aDigBasTap) > 0) {

            $aDigBasTap_R = array_values($aDigBasTap);

            $aJson['aImpBasTap']['Digital'] = $aDigBasTap_R;

            $NombProcesos = $NombProcesos . "cot_digbastap;";

            unset($aDigBasTap);
            unset($aDigBasTap_R);
        }


        if (count($aSerBasTap) > 0) {

            $aSerBasTap_R = array_values($aSerBasTap);

            $aJson['aImpBasTap']['Serigrafia'] = $aSerBasTap_R;

            $NombProcesos = $NombProcesos . "cot_serbastap;";

            unset($aSerBasTap);
            unset($aSerBasTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /****************** Termina los calculos de Base de la tapa ********************/



    /******************* Inicia los calculos de Circunferencia de la tapa ********************/


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


        $aOffCirTap      = [];
        $aOff_maq_CirTap = [];
        $aDigCirTap      = [];
        $aSerCirTap      = [];


        $secc_sufijo = "CirTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpCirTapa'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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


                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_CirTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_CirTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Circunferencia de la tapa);";
                        }

                        $aOffCirTap[$i] = $offset_tiro;


                        $aOffCirTap[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_CirTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam1 = $tam0[1];

                    if ( $tam1 ) {

                        $aDigCirTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigCirTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Circunferencia de la tapa;";
                        } elseif ($aDigCirTap[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Circunferencia de la tapa;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Circunferencia de la tapa;";

                        $aDigCirTap[$i]['cabe_digital']      = "NO";
                        $aDigCirTap[$i]['cantidad']          = $tiraje;
                        $aDigCirTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigCirTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigCirTap[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigCirTap[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigCirTap[$i]["costo_unitario"]    = 0;
                        $aDigBasTap[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigCirTap[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerCirTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerCirTap[$i]['costo_tot_proceso'] = 0;

                    if ($aSerCirTap[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Circunferencia de la tapa);";
                    }

                    $aSerCirTap[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffCirTap) > 0) {

            $aOffCirTap_R = array_values($aOffCirTap);

            $aJson['aImpCirTap']['Offset'] = $aOffCirTap_R;

            $NombProcesos = $NombProcesos . "cot_offsetcirtap;";

            unset($aOffCirTap);
            unset($aOffCirTap_R);
        }


        if (count($aOff_maq_CirTap) > 0) {

            $aOff_maq_CirTap_R = array_values($aOff_maq_CirTap);

            $aJson['aImpCirTap']['Maquila'] = $aOff_maq_CirTap_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_cirtap;";

            unset($aOff_maq_CirTap);
            unset($aOff_maq_CirTap_R);
        }


        if (count($aDigCirTap) > 0) {

            $aDigCirTap_R = array_values($aDigCirTap);

            $aJson['aImpCirTap']['Digital'] = $aDigCirTap_R;

            $NombProcesos = $NombProcesos . "cot_digcirtap;";

            unset($aDigCirTap);
            unset($aDigCirTap_R);
        }


        if (count($aSerCirTap) > 0) {

            $aSerCirTap_R = array_values($aSerCirTap);

            $aJson['aImpCirTap']['Serigrafia'] = $aSerCirTap_R;

            $NombProcesos = $NombProcesos . "cot_sercirtap;";

            unset($aSerCirTap);
            unset($aSerCirTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /****************** Termina los calculos de Circunferencia de la tapa ********************/



    /******************* Inicia los calculos de Forro de la tapa ********************/


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


        $secc_sufijo = "ForTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFTapa'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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

                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);

                    $costo_unit_papel = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_ForTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_ForTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Forro de la tapa);";
                        }

                        $aOffFTap[$i] = $offset_tiro;


                        $aOffFTap[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam1 = $tam0[1];

                    if ( $tam1 ) {

                        $aDigFTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Forro de la tapa;";
                        } elseif ($aDigFTap[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Forro de la tapa;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital  Forro de la tapa;";

                        $aDigFTap[$i]['cabe_digital']      = "NO";
                        $aDigFTap[$i]['cantidad']          = $tiraje;
                        $aDigFTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFTap[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigFTap[$i]['imp_largo']         = $imp_largo_dig;
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


                    $aSerFTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerFTap[$i]['costo_tot_proceso'] = 0;

                    if ($aSerFTap[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Forro de la tapa);";
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

            $NombProcesos = $NombProcesos . "cot_offsetfortap;";

            unset($aOffFTap);
            unset($aOffFTap_R);
        }


        if (count($aOff_maq_FTap) > 0) {

            $aOff_maq_FTap_R = array_values($aOff_maq_FTap);

            $aJson['aImpFTap']['Maquila'] = $aOff_maq_FTap_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_fortap;";

            unset($aOff_maq_FTap);
            unset($aOff_maq_FTap_R);
        }


        if (count($aDigFTap) > 0) {

            $aDigFTap_R = array_values($aDigFTap);

            $aJson['aImpFTap']['Digital'] = $aDigFTap_R;

            $NombProcesos = $NombProcesos . "cot_digfortap;";

            unset($aDigFTap);
            unset($aDigFTap_R);
        }


        if (count($aSerFTap) > 0) {

            $aSerFTap_R = array_values($aSerFTap);

            $aJson['aImpFTap']['Serigrafia'] = $aSerFTap_R;

            $NombProcesos = $NombProcesos . "cot_serfortap;";

            unset($aSerFTap);
            unset($aSerFTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /****************** Termina los calculos de Forro de la tapa ********************/



    /******************* Inicia los calculos de Forro Exterior de la tapa ********************/


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


        $aOffFexTap      = [];
        $aOff_maq_FexTap = [];
        $aDigFexTap      = [];
        $aSerFexTap      = [];


        $secc_sufijo = "FexTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFextTapa'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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


                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
                    $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FexTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FexTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Forro exterior de la tapa);";
                        }

                        $aOffFexTap[$i] = $offset_tiro;


                        $aOffFexTap[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FexTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam1 = $tam0[1];

                    if ( $tam1 ) {

                        $aDigFexTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFexTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Forro exterior de la tapa;";
                        } elseif ($aDigFexTap[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Forro exterior de la tapa;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Forro exterior de la tapa;";

                        $aDigFexTap[$i]['cabe_digital']      = "NO";
                        $aDigFexTap[$i]['cantidad']          = $tiraje;
                        $aDigFexTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFexTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFexTap[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigFexTap[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigFexTap[$i]["costo_unitario"]    = 0;
                        $aDigFexTap[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFexTap[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerFexTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    //$aSerFexTap[$i]['costo_tot_proceso'] = 0;

                    if ($aSerFexTap[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia. Medidas? (Forro exterior de la tapa);";
                    }

                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);

                    $aSerFexTap[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffFexTap) > 0) {

            $aOffFexTap_R = array_values($aOffFexTap);

            $aJson['aImpFexTap']['Offset'] = $aOffFexTap_R;

            $NombProcesos = $NombProcesos . "cot_offsetfexttap;";

            unset($aOffFexTap);
            unset($aOffFexTap_R);
        }


        if (count($aOff_maq_FexTap) > 0) {

            $aOff_maq_FexTap_R = array_values($aOff_maq_FexTap);

            $aJson['aImpFexTap']['Maquila'] = $aOff_maq_FexTap_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_fexttap;";

            unset($aOff_maq_FexTap);
            unset($aOff_maq_FexTap_R);
        }


        if (count($aDigFexTap) > 0) {

            $aDigFexTap_R = array_values($aDigFexTap);

            $aJson['aImpFexTap']['Digital'] = $aDigFexTap_R;

            $NombProcesos = $NombProcesos . "cot_digfexttap;";

            unset($aDigFexTap);
            unset($aDigFexTap_R);
        }


        if (count($aSerFexTap) > 0) {

            $aSerFexTap_R = array_values($aSerFexTap);

            $aJson['aImpFexTap']['Serigrafia'] = $aSerFexTap_R;

            $NombProcesos = $NombProcesos . "cot_serfexttap;";

            unset($aSerFexTap);
            unset($aSerFexTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /****************** Termina los calculos de Forro Exterior de la tapa ********************/



    /******************* Inicia los calculos de Forro Interior de la tapa ********************/


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


        $aOffFinTap      = [];
        $aOff_maq_FinTap = [];
        $aDigFinTap      = [];
        $aSerFinTap      = [];


        $secc_sufijo = "FinTap";
        $nomb_inner = "papel_" . $secc_sufijo;

        // Circunferencia del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFintTapa'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = count($Tipo_proceso_tmp2);


        $a_tmp = $aJson[$nomb_inner];
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


                    $cortes_por_pliego = intval($aJson[$nomb_inner]['corte']);
                    $costo_unit_papel  = floatval($aJson[$nomb_inner]["costo_unit_papel"]);


                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FinTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FinTap, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        //$offset_tiro['costo_tot_proceso'] = 0;

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Offset (Forro interior de la tapa);";
                        }

                        $aOffFinTap[$i] = $offset_tiro;


                        $aOffFinTap[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $aOff_maq_FinTap[$i] = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $nomb_inner, $ventas_model);
                    }
                }



                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $papel_corte_ancho;
                    $corte_largo_proceso = $papel_corte_largo;

                    $imp_ancho_dig = 0;
                    $imp_largo_dig = 0;

                    $nomb_tam_emp  = "";

                    $nomb_tam_emp = $Tipo_proceso_tmp[$i]['tipo_digital'];
                    $nomb_tam_emp = trim(strval($nomb_tam_emp));

                    $tam0 = self::esDigital($nomb_tam_emp);

                    $tam1 = $tam0[1];

                    if ( $tam1 ) {

                        $aDigFinTap[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFinTap[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "No cabe con las medidas proporcionadas en Forro interior de la tapa;";
                        } elseif ($aDigFinTap[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "digital Forro interior de la tapa;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "digital Forro interior de la tapa;";

                        $aDigFinTap[$i]['cabe_digital']      = "NO";
                        $aDigFinTap[$i]['cantidad']          = $tiraje;
                        $aDigFinTap[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFinTap[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFinTap[$i]['imp_ancho']         = $imp_ancho_dig;
                        $aDigFinTap[$i]['imp_largo']         = $imp_largo_dig;
                        $aDigFinTap[$i]["costo_unitario"]    = 0;
                        $aDigFinTap[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFinTap[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerFinTap[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);


                    //$aSerFinTap[$i]['costo_tot_proceso'] = 0;

                    if ($aSerFinTap[$i]['costo_tot_proceso'] <= 0) {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Serigrafia (Forro interior de la tapa);";
                    }

                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);

                    $aSerFinTap[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }
                }
            }
        }


        if (count($aOffFinTap) > 0) {

            $aOffFinTap_R = array_values($aOffFinTap);

            $aJson['aImpFinTap']['Offset'] = $aOffFinTap_R;

            $NombProcesos = $NombProcesos . "cot_offsetfinttap;";

            unset($aOffFinTap);
            unset($aOffFinTap_R);
        }


        if (count($aOff_maq_FinTap) > 0) {

            $aOff_maq_FinTap_R = array_values($aOff_maq_FinTap);

            $aJson['aImpFinTap']['Maquila'] = $aOff_maq_FinTap_R;

            $NombProcesos = $NombProcesos . "cot_offset_maq_finttap;";

            unset($aOff_maq_FinTap);
            unset($aOff_maq_FinTap_R);
        }


        if (count($aDigFinTap) > 0) {

            $aDigFinTap_R = array_values($aDigFinTap);

            $aJson['aImpFinTap']['Digital'] = $aDigFinTap_R;

            $NombProcesos = $NombProcesos . "cot_digfinttap;";

            unset($aDigFinTap);
            unset($aDigFinTap_R);
        }


        if (count($aSerFinTap) > 0) {

            $aSerFinTap_R = array_values($aSerFinTap);

            $aJson['aImpFinTap']['Serigrafia'] = $aSerFinTap_R;

            $NombProcesos = $NombProcesos . "cot_serfinttap;";

            unset($aSerFinTap);
            unset($aSerFinTap_R);
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }



    /****************** Termina los calculos de Forro Interior de la tapa ********************/


/********************** Termina boton impresion ****************************/


/********************** Inicia boton acabados ****************************/


    /************************ Inicia Base del Cajon *******************************/


    $aBCajBUV   = [];
    $aBCajLaser = [];
    $aBCajGrab  = [];
    $aBCajHS    = [];
    $aBCajLam   = [];
    $aBCajSuaje = [];

    $aAcb = [];

    $aAcb = json_decode($_POST['aAcbBCaj'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcb);


    $papel_costo_unit = floatval($aJson['papel_BCaj']['costo_unit_papel']);
    $papel_costo_unit = round($papel_costo_unit, 4);

    $cortes = $aJson['papel_BCaj']['corte'];


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcb[$i]['Tipo_acabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_BCaj']['calculadora']['corte_ancho']);
            $LargoBarniz = $aJson['papel_BCaj']['calculadora']['corte_largo'];

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));

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


            $tot_pliegos = self:: Deltax($merma_tot_pliegos, $merma_cortes);

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


            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Base del cajon);";
            }

            $aBCajBUV[$i] = $barniz_tmp;

            $aBCajBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $tipoGrabado = $aAcb[$i]['tipoGrabado'];
            $tipoGrabado = utf8_encode(trim(strval($tipoGrabado)));

            $Largo = intval($aAcb[$i]['LargoLaser']);
            $Ancho = intval($aAcb[$i]['AnchoLaser']);


            $costo_laser_tmp = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$costo_laser_tmp['costo_tot_proceso'] = 0;

            if ($costo_laser_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Base del cajon);";
            }


            $aBCajLaser[$i] = $costo_laser_tmp;


            if (is_array($costo_laser_tmp)) {

                unset($costo_laser_tmp);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));

            $LargoGrab     = $aAcb[$i]['Largo'];
            $AnchoGrab     = $aAcb[$i]['Ancho'];
            $ubicacionGrab = $aAcb[$i]['ubicacion'];

            $papel_seccion = intval($aJson['cortes']['papel_BCaj']);
            $papel_costo_unit_tmp = floatval($aJson['papel_BCaj']['costo_unit_papel']);


            $grabado_temp = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            //$grabado_temp['costo_tot_proceso'] = 0;

            if ($grabado_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Base del cajon);";
            }

            $aBCajGrab[$i] = $grabado_temp;


            if (is_array($grabado_temp)) {

                unset($grabado_temp);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcb[$i]['LargoHS']);
            $AnchoHS = intval($aAcb[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcb[$i]['ColorHS'])));

            $tipoGrabadoHS = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));

            $papel_seccion = intval($aJson['cortes']['papel_BCaj']);
            $papel_costo_unit_tmp = floatval($aJson['papel_BCaj']['costo_unit_papel']);


            $grabado_HS_temp = self::calculoHotStamping($tipoGrabadoHS, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            //$grabado_HS_temp['costo_tot_proceso'] = 0;

            if ($grabado_HS_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Base del cajon);";
            }

            $aBCajHS[$i] = $grabado_HS_temp;


            if (is_array($grabado_HS_temp)) {

                unset($grabado_HS_temp);
            }
        }


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));

            $LargoLam = floatval($aJson['papel_BCaj']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_BCaj']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_BCaj']['costo_unit_papel'];

            $cortes = $aJson['cortes']['papel_BCaj'];

            $Laminado_tmp = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$Laminado_tmp['costo_tot_proceso'] = 0;

            if ($Laminado_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Base del cajon);";
            }

            $aBCajLam[$i] = $Laminado_tmp;

            if (count($Laminado_tmp) > 0) {

                unset($Laminado_tmp);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));

            $Largo = floatval($aAcb[$i]['LargoSuaje']);
            $Ancho = floatval($aAcb[$i]['AnchoSuaje']);


            $aAcbSuaje_tmp = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aAcbSuaje_tmp['costo_tot_proceso'] = 0;

            if ($aAcbSuaje_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Base del cajon);";
            }

            $aBCajSuaje[$i] = $aAcbSuaje_tmp;
        }
    }


    if (count($aBCajBUV) > 0) {

        $aBCajBUV_R = array_values($aBCajBUV);

        $aJson['aAcbBCaj']['Barniz_UV'] = $aBCajBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvbcaj;";

        unset($aBCajBUV);
        unset($aBCajBUV_R);
    }


    if (count($aBCajLaser) > 0) {

        $aBCajLaser_R = array_values($aBCajLaser);

        $aJson['aAcbBCaj']['Corte_Laser'] = $aBCajLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserbcaj;";

        unset($aBCajLaser);
        unset($aBCajLaser_R);
    }


    if (count($aBCajGrab) > 0) {

        $aBCajGrab_R = array_values($aBCajGrab);

        $aJson['aAcbBCaj']['Grabado'] = $aBCajGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabbcaj;";

        unset($aBCajGrab);
        unset($aBCajGrab_R);
    }


    if (count($aBCajHS) > 0) {

        $aBCajHS_R = array_values($aBCajHS);

        $aJson['aAcbBCaj']['HotStamping'] = $aBCajHS_R;

        $NombProcesos = $NombProcesos . "cot_hsbcaj;";

        unset($aBCajHS);
        unset($aBCajHS_R);
    }


    if (count($aBCajLam) > 0) {

        $aBCajLam_R = array_values($aBCajLam);

        $aJson['aAcbBCaj']['Laminado'] = $aBCajLam_R;

        $NombProcesos = $NombProcesos . "cot_lambcaj;";

        unset($aBCajLam);
        unset($aBCajLam_R);
    }


    if (count($aBCajSuaje) > 0) {

        $aBCajSuaje_R = array_values($aBCajSuaje);

        $aJson['aAcbBCaj']['Suaje'] = $aBCajSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajebcaj;";

        unset($aBCajSuaje);
        unset($aBCajSuaje_R);
    }



    /************************ Termina Base del Cajon ******************************/



    /************************* Inicia Circunferencia del Cajon **********************/


    $aCirCajBUV   = [];
    $aCirCajLaser = [];
    $aCirCajGrab  = [];
    $aCirCajHS    = [];
    $aCirCajLam   = [];
    $aCirCajSuaje = [];


    $aAcbCirCaj = [];

    $aAcbCirCaj = json_decode($_POST['aAcbCirCaj'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbCirCaj);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbCirCaj[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_CirCaj']['costo_unit_papel'];
        $papel_costo_unit_tmp = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_CirCaj']);

        $merma_cortes = intval($aJson['papel_CirCaj']['corte']);


        $tipoGrabado = utf8_encode(trim(strval($aAcbCirCaj[$i]['tipoGrabado'])));

        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_CirCaj']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_CirCaj']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbCirCaj[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbCirCaj[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Circunferencia del cajon);";
            }

            $aCirCajBUV[$i]           = $barniz_tmp;
            $aCirCajBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbCirCaj[$i]['LargoLaser']);
            $Ancho = intval($aAcbCirCaj[$i]['AnchoLaser']);


            $aCirCajLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Ancho, $ventas_model);

            //$aCirCajLaser[$i]['costo_tot_proceso'] = 0;

            if ($aCirCajLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Circunferencia del cajon);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbCirCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbCirCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbCirCaj[$i]['ubicacion'];


            $aCirCajGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aCirCajGrab[$i]['costo_tot_proceso'] = 0;

            if ($aCirCajGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Circunferencia del cajon);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbCirCaj[$i]['LargoHS']);
            $AnchoHS = intval($aAcbCirCaj[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbCirCaj[$i]['ColorHS'])));


            $aCirCajHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aCirCajHS[$i]['costo_tot_proceso'] = 0;

            if ($aCirCajHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Circunferencia del cajon);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_CirCaj']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_CirCaj']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_CirCaj']['costo_unit_papel'];


            $aCirCajLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aCirCajLam[$i]['costo_tot_proceso'] = 0;

            if ($aCirCajLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Circunferencia del cajon);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbCirCaj[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbCirCaj[$i]['AnchoSuaje']);

            $cortes = $aJson['cortes']['papel_CirCaj'];

            $aCirCajSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aCirCajSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aCirCajSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Circunferencia del cajon);";
            }
        }
    }



    if (count($aCirCajBUV) > 0) {

        $aCirCajBUV_R = array_values($aCirCajBUV);

        $aJson['aAcbCirCaj']['Barniz_UV'] = $aCirCajBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvcircaj;";

        unset($aCirCajBUV);
        unset($aCirCajBUV_R);
    }


    if (count($aCirCajLaser) > 0) {

        $aCirCajLaser_R = array_values($aCirCajLaser);

        $aJson['aAcbCirCaj']['Corte_Laser'] = $aCirCajLaser_R;

        $NombProcesos = $NombProcesos . "cot_lasercircaj;";

        unset($aCirCajLaser);
        unset($aCirCajLaser_R);
    }


    if (count($aCirCajGrab) > 0) {

        $aCirCajGrab_R = array_values($aCirCajGrab);

        $aJson['aAcbCirCaj']['Grabado'] = $aCirCajGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabcircaj;";

        unset($aCirCajGrab);
        unset($aCirCajGrab_R);
    }


    if (count($aCirCajHS) > 0) {

        $aCirCajHS_R = array_values($aCirCajHS);

        $aJson['aAcbCirCaj']['HotStamping'] = $aCirCajHS_R;

        $NombProcesos = $NombProcesos . "cot_hscircaj;";

        unset($aCirCajHS);
        unset($aCirCajHS_R);
    }


    if (count($aCirCajLam) > 0) {

        $aCirCajLam_R = array_values($aCirCajLam);

        $aJson['aAcbCirCaj']['Laminado'] = $aCirCajLam_R;

        $NombProcesos = $NombProcesos . "cot_lamcircaj;";

        unset($aCirCajLam);
        unset($aCirCajLam_R);
    }


    if (count($aCirCajSuaje) > 0) {

        $aCirCajSuaje_R = array_values($aCirCajSuaje);

        $aJson['aAcbCirCaj']['Suaje'] = $aCirCajSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajecircaj;";

        unset($aCirCajSuaje);
        unset($aCirCajSuaje_R);
    }


    /************************* Termina Circunferencia del Cajon *********************/



    /************************* Inicia Forro Exterior del Cajon ******************/



    $aFextCajBUV   = [];
    $aFextCajLaser = [];
    $aFextCajGrab  = [];
    $aFextCajHS    = [];
    $aFextCajLam   = [];
    $aFextCajSuaje = [];


    $aAcbFextCaj = [];

    $aAcbFextCaj = json_decode($_POST['aAcbFextCaj'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFextCaj);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbFextCaj[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FextCaj']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FextCaj']);


        $tipoGrabado = utf8_encode(trim(strval($aAcbFextCaj[$i]['tipoGrabado'])));

        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_FextCaj']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FextCaj']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFextCaj[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFextCaj[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro exterior del cajon);";
            }

            $aFextCajBUV[$i] = $barniz_tmp;
            $aFextCajBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFextCaj[$i]['LargoLaser']);
            $Ancho = intval($aAcbFextCaj[$i]['AnchoLaser']);


            $aFextCajLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aFextCajLaser[$i]['costo_tot_proceso'] = 0;

            if ($aFextCajLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro exterior del cajon);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFextCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbFextCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbFextCaj[$i]['ubicacion'];


            $aFextCajGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aFextCajGrab[$i]['costo_tot_proceso'] = 0;

            if ($aFextCajGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro exterior del cajon);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFextCaj[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFextCaj[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFextCaj[$i]['ColorHS'])));


            $aFextCajHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aFextCajHS[$i]['costo_tot_proceso'] = 0;

            if ($aFextCajHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro exterior del cajon;";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_FextCaj']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_FextCaj']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_FextCaj']['costo_unit_papel'];

            $cortes = $aJson['cortes']['papel_FextCaj'];

            $aFextCajLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aFextCajLam[$i]['costo_tot_proceso'] = 0;

            if ($aFextCajLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro exterior del cajon);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFextCaj[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFextCaj[$i]['AnchoSuaje']);

            $cortes = $aJson['cortes']['papel_FextCaj'];

            $aFextCajSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aFextCajSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aFextCajSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro exterior del cajon;";
            }
        }
    }


    if (count($aFextCajBUV) > 0) {

        $aFextCajBUV_R = array_values($aFextCajBUV);

        $aJson['aAcbFextCaj']['Barniz_UV'] = $aFextCajBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvfextcaj;";

        unset($aFextCajBUV);
        unset($aFextCajBUV_R);
    }


    if (count($aFextCajLaser) > 0) {

        $aFextCajLaser_R = array_values($aFextCajLaser);

        $aJson['aAcbFextCaj']['Corte_Laser'] = $aFextCajLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserfextcaj;";

        unset($aFextCajLaser);
        unset($aFextCajLaser_R);
    }


    if (count($aFextCajGrab) > 0) {

        $aFextCajGrab_R = array_values($aFextCajGrab);

        $aJson['aAcbFextCaj']['Grabado'] = $aFextCajGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabfextcaj;";

        unset($aFextCajGrab);
        unset($aFextCajGrab_R);
    }


    if (count($aFextCajHS) > 0) {

        $aFextCajHS_R = array_values($aFextCajHS);

        $aJson['aAcbFextCaj']['HotStamping'] = $aFextCajHS_R;

        $NombProcesos = $NombProcesos . "cot_hsfextcaj;";

        unset($aFextCajHS);
        unset($aFextCajHS_R);
    }


    if (count($aFextCajLam) > 0) {

        $aFextCajLam_R = array_values($aFextCajLam);

        $aJson['aAcbFextCaj']['Laminado'] = $aFextCajLam_R;

        $NombProcesos = $NombProcesos . "cot_lamfextcaj;";

        unset($aFextCajLam);
        unset($aFextCajLam_R);
    }


    if (count($aFextCajSuaje) > 0) {

        $aFextCajSuaje_R = array_values($aFextCajSuaje);

        $aJson['aAcbFextCaj']['Suaje'] = $aFextCajSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajefextcaj;";

        unset($aFextCajSuaje);
        unset($aFextCajSuaje_R);
    }


    /************************* Termina Forro Exterior del Cajon *****************/



    /*************************** Inicia Pompa del Cajon *****************************/


    $aPomCajBUV   = [];
    $aPomCajLaser = [];
    $aPomCajGrab  = [];
    $aPomCajHS    = [];
    $aPomCajLam   = [];
    $aPomCajSuaje = [];


    $aAcbPomCaj = [];

    $aAcbPomCaj = json_decode($_POST['aAcbPomCaj'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbPomCaj);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbPomCaj[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_PomCaj']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_PomCaj']);


        $tipoGrabado = utf8_encode(trim(strval($aAcbPomCaj[$i]['tipoGrabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_PomCaj']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_PomCaj']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbPomCaj[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbPomCaj[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Pompa del cajon);";
            }

            $aPomCajBUV[$i] = $barniz_tmp;
            $aPomCajBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbPomCaj[$i]['LargoLaser']);
            $Ancho = intval($aAcbPomCaj[$i]['AnchoLaser']);

            $aPomCajLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aPomCajLaser[$i]['costo_tot_proceso'] = 0;

            if ($aPomCajLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Pompa del cajon);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbPomCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbPomCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbPomCaj[$i]['ubicacion'];


            $aPomCajGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aPomCajGrab[$i]['costo_tot_proceso'] = 0;

            if ($aPomCajGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Pompa del cajon);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbPomCaj[$i]['LargoHS']);
            $AnchoHS = intval($aAcbPomCaj[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbPomCaj[$i]['ColorHS'])));


            $aPomCajHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aPomCajHS[$i]['costo_tot_proceso'] = 0;

            if ($aPomCajHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Pompa del cajon);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_PomCaj']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_PomCaj']['calculadora']['corte_ancho']);

            $papel_costo_unit = $aJson['papel_PomCaj']['costo_unit_papel'];


            $aPomCajLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aPomCajLam[$i]['costo_tot_proceso'] = 0;

            if ($aPomCajLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Pompa del cajon);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbPomCaj[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbPomCaj[$i]['AnchoSuaje']);


            $aPomCajSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aPomCajSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aPomCajSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Pompa del cajon);";
            }
        }
    }


    if (count($aPomCajBUV) > 0) {

        $aPomCajBUV_R = array_values($aPomCajBUV);

        $aJson['aAcbPomCaj']['Barniz_UV'] = $aPomCajBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvpomcaj;";

        unset($aPomCajBUV);
        unset($aPomCajBUV_R);
    }


    if (count($aPomCajLaser) > 0) {

        $aPomCajLaser_R = array_values($aPomCajLaser);

        $aJson['aAcbPomCaj']['Corte_Laser'] = $aPomCajLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserpomcaj;";

        unset($aPomCajLaser);
        unset($aPomCajLaser_R);
    }


    if (count($aPomCajGrab) > 0) {

        $aPomCajGrab_R = array_values($aPomCajGrab);

        $aJson['aAcbPomCaj']['Grabado'] = $aPomCajGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabpomcaj;";

        unset($aPomCajGrab);
        unset($aPomCajGrab_R);
    }


    if (count($aPomCajHS) > 0) {

        $aPomCajHS_R = array_values($aPomCajHS);

        $aJson['aAcbPomCaj']['HotStamping'] = $aPomCajHS_R;

        $NombProcesos = $NombProcesos . "cot_hspomcaj;";

        unset($aPomCajHS);
        unset($aPomCajHS_R);
    }


    if (count($aPomCajLam) > 0) {

        $aPomCajLam_R = array_values($aPomCajLam);

        $aJson['aAcbPomCaj']['Laminado'] = $aPomCajLam_R;

        $NombProcesos = $NombProcesos . "cot_lampomcaj;";

        unset($aPomCajLam);
        unset($aPomCajLam_R);
    }


    if (count($aPomCajSuaje) > 0) {

        $aPomCajSuaje_R = array_values($aPomCajSuaje);

        $aJson['aAcbPomCaj']['Suaje'] = $aPomCajSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajepomcaj;";

        unset($aPomCajSuaje);
        unset($aPomCajSuaje_R);
    }


    /*************************** Termina Pompa del Cajon ****************************/



    /*************************** Inicia Forro Interior del Cajon *****************************/


    $aFintCajBUV   = [];
    $aFintCajLaser = [];
    $aFintCajGrab  = [];
    $aFintCajHS    = [];
    $aFintCajLam   = [];
    $aFintCajSuaje = [];


    $aAcbFintCaj = [];

    $aAcbFintCaj = json_decode($_POST['aAcbFintCaj'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFintCaj);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcbFintCaj[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcbFintCaj[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FintCaj']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FintCaj']);


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_FintCaj']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FintCaj']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFintCaj[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFintCaj[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro interior del cajon);";
            }

            $aFintCajBUV[$i] = $barniz_tmp;
            $aFintCajBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFintCaj[$i]['LargoLaser']);
            $Ancho = intval($aAcbFintCaj[$i]['AnchoLaser']);

            $aFintCajLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aFintCajLaser[$i]['costo_tot_proceso'] = 0;

            if ($aFintCajLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro interior del cajon);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFintCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbFintCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbFintCaj[$i]['ubicacion'];


            $aFintCajGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aFintCajGrab[$i]['costo_tot_proceso'] = 0;

            if ($aFintCajGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro interior del cajon);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFintCaj[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFintCaj[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFintCaj[$i]['ColorHS'])));


            $aFintCajHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aFintCajHS[$i]['costo_tot_proceso'] = 0;

            if ($aFintCajHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro interior del cajon);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_FintCaj']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_FintCaj']['calculadora']['corte_ancho']);


            $aFintCajLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aFintCajLam[$i]['costo_tot_proceso'] = 0;

            if ($aFintCajLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro interior del cajon);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFintCaj[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFintCaj[$i]['AnchoSuaje']);

            $aFintCajSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aFintCajSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aFintCajSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro interior del cajon);";
            }
        }
    }



    if (count($aFintCajBUV) > 0) {

        $aFintCajBUV_R = array_values($aFintCajBUV);

        $aJson['aAcbFintCaj']['Barniz_UV'] = $aFintCajBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvfintcaj;";

        unset($aFintCajBUV);
        unset($aFintCajBUV_R);
    }


    if (count($aFintCajLaser) > 0) {

        $aFintCajLaser_R = array_values($aFintCajLaser);

        $aJson['aAcbFintCaj']['Corte_Laser'] = $aFintCajLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserfintcaj;";

        unset($aFintCajLaser);
        unset($aFintCajLaser_R);
    }


    if (count($aFintCajGrab) > 0) {

        $aFintCajGrab_R = array_values($aFintCajGrab);

        $aJson['aAcbFintCaj']['Grabado'] = $aFintCajGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabfintcaj;";

        unset($aFintCajGrab);
        unset($aFintCajGrab_R);
    }


    if (count($aFintCajHS) > 0) {

        $aFintCajHS_R = array_values($aFintCajHS);

        $aJson['aAcbFintCaj']['HotStamping'] = $aFintCajHS_R;

        $NombProcesos = $NombProcesos . "cot_hsfintcaj;";

        unset($aFintCajHS);
        unset($aFintCajHS_R);
    }


    if (count($aFintCajLam) > 0) {

        $aFintCajLam_R = array_values($aFintCajLam);

        $aJson['aAcbFintCaj']['Laminado'] = $aFintCajLam_R;

        $NombProcesos = $NombProcesos . "cot_lamfintcaj;";

        unset($aFintCajLam);
        unset($aFintCajLam_R);
    }


    if (count($aFintCajSuaje) > 0) {

        $aFintCajSuaje_R = array_values($aFintCajSuaje);

        $aJson['aAcbFintCaj']['Suaje'] = $aFintCajSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajefintcaj;";

        unset($aFintCajSuaje);
        unset($aFintCajSuaje_R);
    }



    /*************************** Termina Forro Interior del Cajon ****************************/



    /*************************** Inicia Base Tapa *****************************/


    $aBTapaBUV   = [];
    $aBTapaLaser = [];
    $aBTapaGrab  = [];
    $aBTapaHS    = [];
    $aBTapaLam   = [];
    $aBTapaSuaje = [];


    $aAcbBTapa = [];

    $aAcbBTapa = json_decode($_POST['aAcbBTapa'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbBTapa);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcbBTapa[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcbBTapa[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_BasTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_BasTap']);


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_BasTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_BasTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbBTapa[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbBTapa[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Base de la tapa);";
            }

            $aBTapaBUV[$i] = $barniz_tmp;
            $aBTapaBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbBTapa[$i]['LargoLaser']);
            $Ancho = intval($aAcbBTapa[$i]['AnchoLaser']);

            $aBTapaLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aBTapaLaser[$i]['costo_tot_proceso'] = 0;

            if ($aBTapaLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Base de la tapa);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbBTapa[$i]['Largo'];
            $AnchoGrab     = $aAcbBTapa[$i]['Ancho'];
            $ubicacionGrab = $aAcbBTapa[$i]['ubicacion'];


            $aBTapaGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aBTapaGrab[$i]['costo_tot_proceso'] = 0;

            if ($aBTapaGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Base de la tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbBTapa[$i]['LargoHS']);
            $AnchoHS = intval($aAcbBTapa[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbBTapa[$i]['ColorHS'])));


            $aBTapaHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aBTapaHS[$i]['costo_tot_proceso'] = 0;

            if ($aBTapaHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Base de la tapa);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_BasTap']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_BasTap']['calculadora']['corte_ancho']);

            $aBTapaLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aBTapaLam[$i]['costo_tot_proceso'] = 0;

            if ($aBTapaLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Base de la tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbBTapa[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbBTapa[$i]['AnchoSuaje']);


            $aBTapaSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aBTapaSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aBTapaSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Base de la tapa);";
            }
        }
    }



    if (count($aBTapaBUV) > 0) {

        $aBTapaBUV_R = array_values($aBTapaBUV);

        $aJson['aAcbBTapa']['Barniz_UV'] = $aBTapaBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvbastap;";

        unset($aBTapaBUV);
        unset($aBTapaBUV_R);
    }


    if (count($aBTapaLaser) > 0) {

        $aBTapaLaser_R = array_values($aBTapaLaser);

        $aJson['aAcbBTapa']['Corte_Laser'] = $aBTapaLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserbastap;";

        unset($aBTapaLaser);
        unset($aBTapaLaser_R);
    }


    if (count($aBTapaGrab) > 0) {

        $aBTapaGrab_R = array_values($aBTapaGrab);

        $aJson['aAcbBTapa']['Grabado'] = $aBTapaGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabbastap;";

        unset($aBTapaGrab);
        unset($aBTapaGrab_R);
    }


    if (count($aBTapaHS) > 0) {

        $aBTapaHS_R = array_values($aBTapaHS);

        $aJson['aAcbBTapa']['HotStamping'] = $aBTapaHS_R;

        $NombProcesos = $NombProcesos . "cot_hsbastap;";

        unset($aBTapaHS);
        unset($aBTapaHS_R);
    }


    if (count($aBTapaLam) > 0) {

        $aBTapaLam_R = array_values($aBTapaLam);

        $aJson['aAcbBTapa']['Laminado'] = $aBTapaLam_R;

        $NombProcesos = $NombProcesos . "cot_lambastap;";

        unset($aBTapaLam);
        unset($aBTapaLam_R);
    }


    if (count($aBTapaSuaje) > 0) {

        $aBTapaSuaje_R = array_values($aBTapaSuaje);

        $aJson['aAcbBTapa']['Suaje'] = $aBTapaSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajebastap;";

        unset($aBTapaSuaje);
        unset($aBTapaSuaje_R);
    }



    /*************************** Termina Base Tapa ****************************/



    /*************************** Inicia Circunferencia de la Tapa *****************************/


    $aCirTapaBUV   = [];
    $aCirTapaLaser = [];
    $aCirTapaGrab  = [];
    $aCirTapaHS    = [];
    $aCirTapaLam   = [];
    $aCirTapaSuaje = [];


    $aAcbCirTapa = [];

    $aAcbCirTapa = json_decode($_POST['aAcbCirTapa'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbCirTapa);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcbCirTapa[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcbCirTapa[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_CirTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_CirTap']);


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_CirTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_CirTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbCirTapa[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbCirTapa[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Circunferencia de la tapa);";
            }

            $aCirTapaBUV[$i] = $barniz_tmp;
            $aCirTapaBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbCirTapa[$i]['LargoLaser']);
            $Ancho = intval($aAcbCirTapa[$i]['AnchoLaser']);


            $aCirTapaLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aCirTapaLaser[$i]['costo_tot_proceso'] = 0;

            if ($aCirTapaLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Circunferencia de la tapa);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbCirTapa[$i]['Largo'];
            $AnchoGrab     = $aAcbCirTapa[$i]['Ancho'];
            $ubicacionGrab = $aAcbCirTapa[$i]['ubicacion'];


            $aCirTapaGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aCirTapaGrab[$i]['costo_tot_proceso'] = 0;

            if ($aCirTapaGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Circunferencia de la tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbCirTapa[$i]['LargoHS']);
            $AnchoHS = intval($aAcbCirTapa[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbCirTapa[$i]['ColorHS'])));


            $aCirTapaHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aCirTapaHS[$i]['costo_tot_proceso'] = 0;

            if ($aCirTapaHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Circunferencia de la tapa);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_CirTap']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_CirTap']['calculadora']['corte_ancho']);


            $aCirTapaLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aCirTapaLam[$i]['costo_tot_proceso'] = 0;

            if ($aCirTapaLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Circunferencia de la tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbCirTapa[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbCirTapa[$i]['AnchoSuaje']);

            $aCirTapaSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aCirTapaSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aCirTapaSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Circunferencia de la tapa);";
            }
        }
    }



    if (count($aCirTapaBUV) > 0) {

        $aCirTapaBUV_R = array_values($aCirTapaBUV);

        $aJson['aAcbCirTapa']['Barniz_UV'] = $aCirTapaBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvcirtap;";

        unset($aCirTapaBUV);
        unset($aCirTapaBUV_R);
    }


    if (count($aCirTapaLaser) > 0) {

        $aCirTapaLaser_R = array_values($aCirTapaLaser);

        $aJson['aAcbCirTapa']['Corte_Laser'] = $aCirTapaLaser_R;

        $NombProcesos = $NombProcesos . "cot_lasercirtap;";

        unset($aCirTapaLaser);
        unset($aCirTapaLaser_R);
    }


    if (count($aCirTapaGrab) > 0) {

        $aCirTapaGrab_R = array_values($aCirTapaGrab);

        $aJson['aAcbCirTapa']['Grabado'] = $aCirTapaGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabcirtap;";

        unset($aCirTapaGrab);
        unset($aCirTapaGrab_R);
    }


    if (count($aCirTapaHS) > 0) {

        $aCirTapaHS_R = array_values($aCirTapaHS);

        $aJson['aAcbCirTapa']['HotStamping'] = $aCirTapaHS_R;

        $NombProcesos = $NombProcesos . "cot_hscirtap;";

        unset($aCirTapaHS);
        unset($aCirTapaHS_R);
    }


    if (count($aCirTapaLam) > 0) {

        $aCirTapaLam_R = array_values($aCirTapaLam);

        $aJson['aAcbCirTapa']['Laminado'] = $aCirTapaLam_R;

        $NombProcesos = $NombProcesos . "cot_lamcirtap;";

        unset($aCirTapaLam);
        unset($aCirTapaLam_R);
    }


    if (count($aCirTapaSuaje) > 0) {

        $aCirTapaSuaje_R = array_values($aCirTapaSuaje);

        $aJson['aAcbCirTapa']['Suaje'] = $aCirTapaSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajecirtap;";

        unset($aCirTapaSuaje);
        unset($aCirTapaSuaje_R);
    }



    /*************************** Termina Circunferencia de la Tapa ****************************/



    /*************************** Inicia Forro de la Tapa *****************************/


    $aFTapaBUV   = [];
    $aFTapaLaser = [];
    $aFTapaGrab  = [];
    $aFTapaHS    = [];
    $aFTapaLam   = [];
    $aFTapaSuaje = [];


    $aAcbFTapa = [];

    $aAcbFTapa = json_decode($_POST['aAcbFTapa'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFTapa);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcbFTapa[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcbFTapa[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_ForTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_ForTap']);


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_ForTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_ForTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFTapa[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFTapa[$i]['Largo']);
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


            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro de la tapa);";
            }


            $aFTapaBUV[$i] = $barniz_tmp;
            $aFTapaBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFTapa[$i]['LargoLaser']);
            $Ancho = intval($aAcbFTapa[$i]['AnchoLaser']);


            $aFTapaLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aFTapaLaser[$i]['costo_tot_proceso'] = 0;

            if ($aFTapaLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro de la tapa);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFTapa[$i]['Largo'];
            $AnchoGrab     = $aAcbFTapa[$i]['Ancho'];
            $ubicacionGrab = $aAcbFTapa[$i]['ubicacion'];


            $aFTapaGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aFTapaGrab[$i]['costo_tot_proceso'] = 0;

            if ($aFTapaGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro de la tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFTapa[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFTapa[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFTapa[$i]['ColorHS'])));


            $aFTapaHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aFTapaHS[$i]['costo_tot_proceso'] = 0;

            if ($aFTapaHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro de la tapa);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_ForTap']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_ForTap']['calculadora']['corte_ancho']);


            $aFTapaLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aFTapaLam[$i]['costo_tot_proceso'] = 0;

            if ($aFTapaLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro de la tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFTapa[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFTapa[$i]['AnchoSuaje']);

            $aFTapaSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aFTapaSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aFTapaSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro de la tapa);";
            }
        }
    }



    if (count($aFTapaBUV) > 0) {

        $aFTapaBUV_R = array_values($aFTapaBUV);

        $aJson['aAcbFTapa']['Barniz_UV'] = $aFTapaBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvfortap;";

        unset($aFTapaBUV);
        unset($aFTapaBUV_R);
    }


    if (count($aFTapaLaser) > 0) {

        $aFTapaLaser_R = array_values($aFTapaLaser);

        $aJson['aAcbFTapa']['Corte_Laser'] = $aFTapaLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserfortap;";

        unset($aFTapaLaser);
        unset($aFTapaLaser_R);
    }


    if (count($aFTapaGrab) > 0) {

        $aFTapaGrab_R = array_values($aFTapaGrab);

        $aJson['aAcbFTapa']['Grabado'] = $aFTapaGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabfortap;";

        unset($aFTapaGrab);
        unset($aFTapaGrab_R);
    }


    if (count($aFTapaHS) > 0) {

        $aFTapaHS_R = array_values($aFTapaHS);

        $aJson['aAcbFTapa']['HotStamping'] = $aFTapaHS_R;

        $NombProcesos = $NombProcesos . "cot_hsfortap;";

        unset($aFTapaHS);
        unset($aFTapaHS_R);
    }


    if (count($aFTapaLam) > 0) {

        $aFTapaLam_R = array_values($aFTapaLam);

        $aJson['aAcbFTapa']['Laminado'] = $aFTapaLam_R;

        $NombProcesos = $NombProcesos . "cot_lamfortap;";

        unset($aFTapaLam);
        unset($aFTapaLam_R);
    }


    if (count($aFTapaSuaje) > 0) {

        $aFTapaSuaje_R = array_values($aFTapaSuaje);

        $aJson['aAcbFTapa']['Suaje'] = $aFTapaSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajefortap;";

        unset($aFTapaSuaje);
        unset($aFTapaSuaje_R);
    }



    /*************************** Termina Forro de la Tapa ****************************/



    /*************************** Inicia Forro Exterior de la Tapa *****************************/


    $aFextTapaBUV   = [];
    $aFextTapaLaser = [];
    $aFextTapaGrab  = [];
    $aFextTapaHS    = [];
    $aFextTapaLam   = [];
    $aFextTapaSuaje = [];


    $aAcbFextTapa = [];

    $aAcbFextTapa = json_decode($_POST['aAcbFextTapa'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFextTapa);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcbFextTapa[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcbFextTapa[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FexTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FexTap']);


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_FexTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FexTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFextTapa[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFextTapa[$i]['Largo']);
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

            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro exterior de la tapa);";
            }

            $aFextTapaBUV[$i] = $barniz_tmp;
            $aFextTapaBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFextTapa[$i]['LargoLaser']);
            $Ancho = intval($aAcbFextTapa[$i]['AnchoLaser']);


            $aFextTapaLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aFextTapaLaser[$i]['costo_tot_proceso'] = 0;

            if ($aFextTapaLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro exterior de la tapa);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFextTapa[$i]['Largo'];
            $AnchoGrab     = $aAcbFextTapa[$i]['Ancho'];
            $ubicacionGrab = $aAcbFextTapa[$i]['ubicacion'];


            $aFextTapaGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aFextTapaGrab[$i]['costo_tot_proceso'] = 0;

            if ($aFextTapaGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro exterior de la tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFextTapa[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFextTapa[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFextTapa[$i]['ColorHS'])));


            $aFextTapaHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aFextTapaHS[$i]['costo_tot_proceso'] = 0;

            if ($aFextTapaHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro exterior de la tapa);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_FexTap']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_FexTap']['calculadora']['corte_ancho']);


            $aFextTapaLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aFextTapaLam[$i]['costo_tot_proceso'] = 0;

            if ($aFextTapaLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro exterior de la tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFextTapa[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFextTapa[$i]['AnchoSuaje']);


            $aFextTapaSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aFextTapaSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aFextTapaSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro exterior de la tapa);";
            }
        }
    }



    if (count($aFextTapaBUV) > 0) {

        $aFextTapaBUV_R = array_values($aFextTapaBUV);

        $aJson['aAcbFexTapa']['Barniz_UV'] = $aFextTapaBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvfexttap;";

        unset($aFTapaBUV);
        unset($aFextTapaBUV_R);
    }


    if (count($aFextTapaLaser) > 0) {

        $aFextTapaLaser_R = array_values($aFextTapaLaser);

        $aJson['aAcbFexTapa']['Corte_Laser'] = $aFextTapaLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserfexttap;";

        unset($aFextTapaLaser);
        unset($aFextTapaLaser_R);
    }


    if (count($aFextTapaGrab) > 0) {

        $aFextTapaGrab_R = array_values($aFextTapaGrab);

        $aJson['aAcbFexTapa']['Grabado'] = $aFextTapaGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabfexttap;";

        unset($aFextTapaGrab);
        unset($aFextTapaGrab_R);
    }


    if (count($aFextTapaHS) > 0) {

        $aFextTapaHS_R = array_values($aFextTapaHS);

        $aJson['aAcbFexTapa']['HotStamping'] = $aFextTapaHS_R;

        $NombProcesos = $NombProcesos . "cot_hsfexttap;";

        unset($aFextTapaHS);
        unset($aFextTapaHS_R);
    }


    if (count($aFextTapaLam) > 0) {

        $aFextTapaLam_R = array_values($aFextTapaLam);

        $aJson['aAcbFexTapa']['Laminado'] = $aFextTapaLam_R;

        $NombProcesos = $NombProcesos . "cot_lamfexttap;";

        unset($aFextTapaLam);
        unset($aFextTapaLam_R);
    }


    if (count($aFextTapaSuaje) > 0) {

        $aFextTapaSuaje_R = array_values($aFextTapaSuaje);

        $aJson['aAcbFexTapa']['Suaje'] = $aFextTapaSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajefexttap;";

        unset($aFextTapaSuaje);
        unset($aFextTapaSuaje_R);
    }



    /*************************** Termina Forro Exterior de la Tapa ****************************/



    /*************************** Inicia Forro Interior de la Tapa *****************************/


    $aFintTapaBUV   = [];
    $aFintTapaLaser = [];
    $aFintTapaGrab  = [];
    $aFintTapaHS    = [];
    $aFintTapaLam   = [];
    $aFintTapaSuaje = [];


    $aAcbFintTapa = [];

    $aAcbFintTapa = json_decode($_POST['aAcbFintTapa'], true);

    $cuantos_aAcb = 0;

    $cuantos_aAcb = count($aAcbFintTapa);


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcbFintTapa[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcbFintTapa[$i]['Tipo_acabado'])));

        $papel_costo_unit = $aJson['papel_FinTap']['costo_unit_papel'];
        $papel_costo_unit = round(floatval($papel_costo_unit), 4);

        $cortes = intval($aJson['cortes']['papel_FinTap']);


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = floatval($aJson['papel_FinTap']['calculadora']['corte_ancho']);
            $LargoBarniz = floatval($aJson['papel_FinTap']['calculadora']['corte_largo']);

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $AnchoBarniz = floatval($aAcbFintTapa[$i]['Ancho']);
                $LargoBarniz = floatval($aAcbFintTapa[$i]['Largo']);
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


            //$barniz_tmp['costo_tot_proceso'] = 0;

            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro interior de la tapa);";
            }

            $aFintTapaBUV[$i] = $barniz_tmp;
            $aFintTapaBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }

        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFintTapa[$i]['LargoLaser']);
            $Ancho = intval($aAcbFintTapa[$i]['AnchoLaser']);

            $aFintTapaLaser[$i] = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            //$aFintTapaLaser[$i]['costo_tot_proceso'] = 0;

            if ($aFintTapaLaser[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro interior de la tapa);";
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFintTapa[$i]['Largo'];
            $AnchoGrab     = $aAcbFintTapa[$i]['Ancho'];
            $ubicacionGrab = $aAcbFintTapa[$i]['ubicacion'];


            $aFintTapaGrab[$i] = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $cortes, $papel_costo_unit, $ventas_model);

            //$aFintTapaGrab[$i]['costo_tot_proceso'] = 0;

            if ($aFintTapaGrab[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro interior de la tapa);";
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFintTapa[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFintTapa[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFintTapa[$i]['ColorHS'])));


            $aFintTapaHS[$i] = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $cortes, $papel_costo_unit, $ventas_model);

            //$aFintTapaHS[$i]['costo_tot_proceso'] = 0;

            if ($aFintTapaHS[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro interior de la tapa);";
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['papel_FinTap']['calculadora']['corte_largo']);
            $AnchoLam = floatval($aJson['papel_FinTap']['calculadora']['corte_ancho']);


            $aFintTapaLam[$i] = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            //$aFintTapaLam[$i]['costo_tot_proceso'] = 0;

            if ($aFintTapaLam[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro interior de la tapa);";
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFintTapa[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFintTapa[$i]['AnchoSuaje']);


            $aFintTapaSuaje[$i] = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            //$aFintTapaSuaje[$i]['costo_tot_proceso'] = 0;

            if ($aFintTapaSuaje[$i]['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro interior de la tapa);";
            }
        }
    }



    if (count($aFintTapaBUV) > 0) {

        $aFextTapaBUV_R = array_values($aFintTapaBUV);

        $aJson['aAcbFinTapa']['Barniz_UV'] = $aFextTapaBUV_R;

        $NombProcesos = $NombProcesos . "cot_barnizuvfinttap;";

        unset($aFintTapaBUV);
        unset($aFextTapaBUV_R);
    }


    if (count($aFintTapaLaser) > 0) {

        $aFintTapaLaser_R = array_values($aFintTapaLaser);

        $aJson['aAcbFinTapa']['Corte_Laser'] = $aFintTapaLaser_R;

        $NombProcesos = $NombProcesos . "cot_laserfinttap;";

        unset($aFintTapaLaser);
        unset($aFintTapaLaser_R);
    }


    if (count($aFintTapaGrab) > 0) {

        $aFintTapaGrab_R = array_values($aFintTapaGrab);

        $aJson['aAcbFinTapa']['Grabado'] = $aFintTapaGrab_R;

        $NombProcesos = $NombProcesos . "cot_grabfinttap;";

        unset($aFintTapaGrab);
        unset($aFintTapaGrab_R);
    }


    if (count($aFintTapaHS) > 0) {

        $aFintTapaHS_R = array_values($aFintTapaHS);

        $aJson['aAcbFinTapa']['HotStamping'] = $aFintTapaHS_R;

        $NombProcesos = $NombProcesos . "cot_hsfinttap;";

        unset($aFintTapaHS);
        unset($aFintTapaHS_R);
    }


    if (count($aFintTapaLam) > 0) {

        $aFintTapaLam_R = array_values($aFintTapaLam);

        $aJson['aAcbFinTapa']['Laminado'] = $aFintTapaLam_R;

        $NombProcesos = $NombProcesos . "cot_lamfinttap;";

        unset($aFintTapaLam);
        unset($aFintTapaLam_R);
    }


    if (count($aFintTapaSuaje) > 0) {

        $aFintTapaSuaje_R = array_values($aFintTapaSuaje);

        $aJson['aAcbFinTapa']['Suaje'] = $aFintTapaSuaje_R;

        $NombProcesos = $NombProcesos . "cot_suajefinttap;";

        unset($aFintTapaSuaje);
        unset($aFintTapaSuaje_R);
    }



    /*************************** Termina Forro Interior de la Tapa ****************************/



/**************************** Termina boton acabados *******************/



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

            $aCierres[$i]['costo_unitario'] = $aCosto_cierres['cierre_costo_unitario'];

            $aCierres[$i]['costo_tot_proceso'] = $aCosto_cierres['costo_tot_proceso'];

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



/***************** Inicia suma de costos ******************/

    /********* suma costo cartones ***********/

    $suma_costo_cartones = $aJson['grosor_carton']['tot_costo'];

    $aJson['costo_cartones'] = round(floatval($suma_costo_cartones), 2);


    /********* suma costo papeles ***********/

    $suma_costo_papeles = 0;
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_BCaj']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_CirCaj']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_FextCaj']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_PomCaj']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_FintCaj']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_BasTap']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_CirTap']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_ForTap']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_FexTap']['tot_costo'];
    $suma_costo_papeles = $suma_costo_papeles + $aJson['papel_FinTap']['tot_costo'];


    $suma_costo_papeles = round(floatval($suma_costo_papeles), 2);

    $aJson['costo_papeles'] = $suma_costo_papeles;


    /********* suma costo Base del Cajon ***********/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpBCaj", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbBCaj", $aJson);

    $aJson['costo_bcaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /********* Circunferencia del Cajon ****************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpCirCaj", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbCirCaj", $aJson);

    $aJson['costo_circaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /*********** Forro Exterior del Cajon ***************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFextCaj", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFextCaj", $aJson);

    $aJson['costo_fextcaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /*********** Pompa del Cajon **********************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpPomCaj", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbPomCaj", $aJson);

    $aJson['costo_pomcaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /************** Forro Interior del Cajon ****************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFintCaj", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFintCaj", $aJson);


    $aJson['costo_fintcaj'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /**************** Base de la Tapa *********************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpBasTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbBTapa", $aJson);


    $aJson['costo_btapa'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /***************** Circunferencia de la Tapa ***************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpCirTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbCirTapa", $aJson);

    $aJson['costo_cirtapa'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /**************** Forro de la Tapa *******************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFTapa", $aJson);

    $aJson['costo_ftapa'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /************** Forro Exterior de la Tapa ****************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFexTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFexTapa", $aJson);

    $aJson['costo_fexttapa'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /***************** Forro Interior de la Tapa ***************/

    $suma_Imp_tmp = 0;
    $suma_Acb_tmp = 0;

    $suma_Imp_tmp = self::sumaImp("aImpFinTap", $aJson);
    $suma_Acb_tmp = self::sumaAcb("aAcbFinTapa", $aJson);

    $aJson['costo_finttapa'] = round(floatval($suma_Imp_tmp + $suma_Acb_tmp), 2);


    /**************** Bancos **********************/

    if (array_key_exists('Bancos', $aJson)) {

        $aJson['costo_bancos'] = round(floatval(array_sum(array_column($aJson['Bancos'], 'costo_tot_proceso'))), 2);
    }


    /****************** Accesorios ********************/

    if (array_key_exists('Accesorios', $aJson)) {

        $aJson['costo_accesorios'] = round(floatval(array_sum(array_column($aJson['Accesorios'], 'costo_tot_proceso'))), 2);
    }


    // Cierres
    if (array_key_exists('Cierres', $aJson)) {

        $aJson['costo_cierres'] = round(floatval(array_sum(array_column($aJson['Cierres'], 'costo_tot_proceso'))), 2);
    }


    $ranurado_total       = floatval($aJson['ranurado']['costo_tot_proceso']);
    $encuadernacion_total = floatval($aJson['encuadernacion']['costo_tot_proceso']);
    $forrado_cajon_total  = floatval($aJson['forrado_cajon']['costo_tot_proceso']);

    $suma_total = 0;

    $suma_total = floatval($aJson['costo_papeles'] + $aJson['costo_cartones'] + $aJson['costos_fijos'] + $aJson['costo_bcaj'] + $aJson['costo_circaj'] + $aJson['costo_fextcaj'] + $aJson['costo_pomcaj'] + $aJson['costo_fintcaj'] + $aJson['costo_btapa'] + $aJson['costo_cirtapa'] + $aJson['costo_ftapa'] + $aJson['costo_fexttapa'] + $aJson['costo_finttapa'] + $aJson['costo_bancos'] + $aJson['costo_cierres'] + $aJson['costo_accesorios'] + $ranurado_total + $encuadernacion_total + $forrado_cajon_total);

    $suma_total = round($suma_total, 2);

    $aJson['costo_subtotal'] = $suma_total;


/***************** Termina suma de costos ******************/


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


        $debuger  = false;
        $post     = false;
        $grabar   = true;
        $saved    = false;

        //if ($grabar and $_POST['grabar'] == "SI" and strlen($aJson['tablas_faltantes']) < 3 and
        if ($grabar and $_POST['grabar'] == "SI" and $aJson['mensaje'] == "Correcto") {

            //$respuesta = false;

            $saved = $circular_model->insertCircular($aJson);

            echo json_encode($saved);
        } else {

            if ($post) {

                echo PHP_EOL . PHP_EOL . "(8281) post: ";
                print_r($_POST);
            }

            if ($debuger) {

                echo PHP_EOL . "(8287) aJson: ";
                print_r($aJson);
            }

            echo json_encode($aJson);
        }
    }


/****************** Termina la funcion saveCaja() **********************/

}
