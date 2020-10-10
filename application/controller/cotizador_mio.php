<?php

class Cotizador extends Controller {

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


    private function almejaCalc($base, $alto, $profundidad, $grosor_cajon, $grosor_cartera) {

        $calculadora = array();

        $b = $base;
        $h = $alto;
        $p = $profundidad;
        $g = $grosor_cajon;
        $G = $grosor_cartera;

        $e = round(floatval($g / 20), 2);
        $E = round(floatval($G / 20), 2);

        // Diseño
        $b1  = round(floatval($b + (2 * $e)), 2);
        $h1  = round(floatval($h + (2 * $e)), 2);
        $p1  = round(floatval($p + $e), 2);
        $x   = round(floatval($b1 + (2 * $p1)), 2);
        $y   = round(floatval($h1 + (2 * $p1)), 2);
        $x1  = round(floatval($x + 1.2), 2);
        $y1  = round(floatval($y + 1.2), 2);
        $x11 = round(floatval($x + 1), 2);
        $y11 = round(floatval($y + 1), 2);

        //forro
        $b11 = round(floatval($x + 2 * ($e + 1.4)), 2);
        $h11 = round(floatval($y + 2 * ($e + 1.4)), 2);
        $f   = round(floatval($b11 + 1.5), 2);
        $k   = round(floatval($h11 + 1.5), 2);
        //$a11=$a1+$h1+3;
        //$h111=

        //cartera
        $B   = round(floatval($b1 + 0.2), 2);
        $H   = round(floatval($h1 + 0.1 + (2 * $e)), 2);
        $P   = round(floatval($p1 + 0.25), 2);
        $Y   = round(floatval($H + (2 * $P)), 2);
        $B1  = round(floatval($B + 2 * ($E + 1.4)), 2);
        $Y1  = round(floatval($Y + 2 *($E + 1.4)), 2);
        $B11 = round(floatval($B-1), 2);
        $Y11 = round(floatval($H + ($P - 0.5) + 2.5), 2);

        $calculadora["base"]           = $base;
        $calculadora["alto"]           = $alto;
        $calculadora["profundidad"]    = $profundidad;
        $calculadora["grosor_cajon"]   = $grosor_cajon;
        $calculadora["grosor_cartera"] = $grosor_cartera;

        $calculadora["b"] = $b;
        $calculadora["h"] = $h;
        $calculadora["p"] = $p;
        $calculadora["g"] = $g;
        $calculadora["G"] = $G;

        $calculadora["e"] = $e;
        $calculadora["E"] = $E;

        // diseño
        $calculadora["b1"]  = $b1;
        $calculadora["h1"]  = $h1;
        $calculadora["p1"]  = $p1;
        $calculadora["x"]   = $x;
        $calculadora["y"]   = $y;
        $calculadora["x1"]  = $x1;
        $calculadora["y1"]  = $y1;
        $calculadora["x11"] = $x11;
        $calculadora["y11"] = $y11;

        // forro
        $calculadora["b11"] = $b11;
        $calculadora["h11"] = $h11;
        $calculadora["f"]   = $f;
        $calculadora["k"]   = $k;

        // cartera
        $calculadora["B"]   = $B;
        $calculadora["H"]   = $H;
        $calculadora["P"]   = $P;
        $calculadora["Y"]   = $Y;
        $calculadora["B1"]  = $B1;
        $calculadora["Y1"]  = $Y1;
        $calculadora["B11"] = $B11;
        $calculadora["Y11"] = $Y11;

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


    // llama al formulario (cajas_almeja.php)
    public function caja_almeja() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');

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
            require 'application/views/cotizador/cajas.php';

            // plantilla
            echo "<script>$('#form_modelo_0').hide();</script>";

            require 'application/views/cotizador/cajas_almeja.php';

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


    protected function detalle_proc_offset($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']                 = intval($row['id_odt']);
            $aJson_tmp['Tipo']                   = trim(strval($row['tipo']));
            $aJson_tmp['tiraje']                 = intval($row['tiraje']);
            $aJson_tmp['num_tintas']             = intval($row['num_tintas']);
            $aJson_tmp['corte_costo_unitario']   = floatval($row['corte_costo_unitario']);
            $aJson_tmp['corte_por_millar']       = intval($row['corte_por_millar']);
            $aJson_tmp['costo_corte']            = floatval($row['costo_corte']);
            $aJson_tmp['costo_unitario_laminas'] = floatval($row['costo_unitario_laminas']);
            $aJson_tmp['costo_tot_laminas']      = floatval($row['costo_tot_laminas']);
            $aJson_tmp['costo_unitario_arreglo'] = floatval($row['costo_unitario_arreglo']);
            $aJson_tmp['costo_tot_arreglo']      = floatval($row['costo_tot_arreglo']);
            $aJson_tmp['costo_unitario_tiro']    = floatval($row['costo_unitario_tiro']);
            $aJson_tmp['costo_tot_tiro']         = floatval($row['costo_tot_tiro']);
            $aJson_tmp['costo_tot_proceso']      = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_maq_proc_offset($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']                 = intval($row['id_odt']);
            $aJson_tmp['Tipo']                   = trim(strval($row['tipo']));
            $aJson_tmp['tiraje']                 = intval($row['tiraje']);
            $aJson_tmp['num_tintas']             = intval($row['num_tintas']);
            $aJson_tmp['arreglo_costo_unitario'] = floatval($row['arreglo_costo_unitario']);
            $aJson_tmp['arreglo_costo']          = intval($row['arreglo_costo']);
            $aJson_tmp['costo_unitario_laminas'] = floatval($row['costo_unitario_laminas']);
            $aJson_tmp['costo_laminas']          = floatval($row['costo_laminas']);
            $aJson_tmp['costo_unitario']         = floatval($row['costo_unitario']);
            $aJson_tmp['costo_tot']              = floatval($row['costo_tot']);
            $aJson_tmp['costo_tot_proceso']      = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_digital($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']            = intval($row['id_odt']);
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['corte_ancho']       = floatval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = floatval($row['corte_largo']);
            $aJson_tmp['imp_ancho']         = floatval($row['imp_ancho']);
            $aJson_tmp['imp_largo']         = floatval($row['imp_largo']);
            $aJson_tmp['impresion']         = utf8_encode($row['impresion']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_serigrafia($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']              = intval($row['id_odt']);
            $aJson_tmp['tipo']                = utf8_encode(trim(strval($row['tipo'])));
            $aJson_tmp['tiraje']              = intval($row['tiraje']);
            $aJson_tmp['num_tintas']          = intval($row['num_tintas']);
            $aJson_tmp['costo_unit_arreglo']  = floatval($row['costo_unit_arreglo']);
            $aJson_tmp['costo_arreglo']       = floatval($row['costo_arreglo']);
            $aJson_tmp['costo_unitario_tiro'] = floatval($row['costo_unit_tiro']);
            $aJson_tmp['costo_tiro']          = floatval($row['costo_tiro']);
            $aJson_tmp['cortes_por_pliego']   = intval($row['cortes_por_pliego']);
            $aJson_tmp['costo_tot_proceso']   = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Barniz_UV($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']            = intval($row['id_odt']);
            $aJson_tmp['tipoGrabado']       = utf8_encode(trim(strval($row['tipo_grabado'])));
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['Largo']             = floatval($$row['largo']);
            $aJson_tmp['Ancho']             = floatval($$row['ancho']);
            $aJson_tmp['area']              = floatval($$row['area']);
            $aJson_tmp['costo_unitario']    = floatval($$row['costo_unitario']);
            $aJson_tmp['costo_tot_proceso'] = floatval($$row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Laser($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']            = intval($row['id_odt']);
            $aJson_tmp['tipo_grabado']      = utf8_encode(trim(strval($row['tipo_grabado'])));
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['Largo']             = floatval($row['largo']);
            $aJson_tmp['Ancho']             = floatval($row['ancho']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['tiempo_requerido']  = floatval($row['tiempo_requerido']);
            $aJson_tmp['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Grabado($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']                 = intval($row['id_odt']);
            $aJson_tmp['tipoGrabado']            = utf8_encode(trim(strval($row['tipo_grabado'])));
            $aJson_tmp['Largo']                  = intval($row['largo']);
            $aJson_tmp['Ancho']                  = intval($row['ancho']);
            $aJson_tmp['ubicacion']              = trim(strval($row['ubicacion']));
            $aJson_tmp['placa_area']             = floatval($row['placa_area']);
            $aJson_tmp['placa_costo_unitario']   = floatval($row['placa_costo_unitario']);
            $aJson_tmp['placa_costo']            = floatval($row['placa_costo']);
            $aJson_tmp['arreglo_costo_unitario'] = floatval($row['arreglo_costo_unitario']);
            $aJson_tmp['arreglo_costo']          = floatval($row['arreglo_costo']);
            $aJson_tmp['costo_unitario']         = floatval($row['costo_unitario']);
            $aJson_tmp['costo_tiro']             = floatval($row['costo_tiro']);
            $aJson_tmp['costo_tot_proceso']      = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_HotStamping($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']                  = intval($row['id_odt']);
            $aJson_tmp['tipoGrabado']             = utf8_encode(trim(strval($row['tipo_grabado'])));
            $aJson_tmp['Largo']                   = intval($row['largo']);
            $aJson_tmp['Ancho']                   = intval($row['ancho']);
            $aJson_tmp['Color']                   = trim(strval($row['color']));
            $aJson_tmp['placa_area']              = floatval($row['placa_area']);
            $aJson_tmp['placa_costo_unitario']    = floatval($row['placa_costo_unitario']);
            $aJson_tmp['placa_costo']             = floatval($row['placa_costo']);
            $aJson_tmp['pelicula_Largo']          = intval($row['pelicula_largo']);
            $aJson_tmp['pelicula_Ancho']          = intval($row['pelicula_ancho']);
            $aJson_tmp['pelicula_area']           = floatval($row['pelicula_area']);
            $aJson_tmp['pelicula_costo_unitario'] = floatval($row['pelicula_costo_unitario']);
            $aJson_tmp['pelicula_costo']          = floatval($row['pelicula_costo']);
            $aJson_tmp['arreglo_costo_unitario']  = floatval($row['arreglo_costo_unitario']);
            $aJson_tmp['arreglo_costo']           = floatval($row['arreglo_costo']);
            $aJson_tmp['costo_unitario']          = floatval($row['costo_unitario']);
            $aJson_tmp['costo_tiro']              = floatval($row['costo_tiro']);
            $aJson_tmp['costo_tot_proceso']       = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Laminado($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']            = intval($row['id_odt']);
            $aJson_tmp['tipoGrabado']       = utf8_encode(trim(strval($row['tipo_grabado'])));
            $aJson_tmp['Largo']             = intval($row['largo']);
            $aJson_tmp['Ancho']             = intval($row['ancho']);
            $aJson_tmp['area']              = floatval($row['area']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Suaje($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']              = intval($row['id_odt']);
            $aJson_tmp['tipoGrabado']         = utf8_encode(trim(strval($row['tipo_grabado'])));
            $aJson_tmp['Largo']               = intval($row['largo']);
            $aJson_tmp['Ancho']               = intval($row['ancho']);
            $aJson_tmp['perimetro']           = intval($row['perimetro']);
            $aJson_tmp['tabla_suaje']         = floatval($row['tabla_suaje']);
            $aJson_tmp['arreglo']             = floatval($row['arreglo_costo_unitario']);
            $aJson_tmp['tiro_costo_unitario'] = floatval($row['tiro_costo_unitario']);
            $aJson_tmp['costo_tiro']          = floatval($row['costo_tiro']);
            $aJson_tmp['costo_tot_proceso']   = floatval($row['costo_tot_proceso']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Accesorios($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']               = intval($row['id_odt']);
            $aJson_tmp['Tipo_accesorio']       = utf8_encode(trim(strval($row['tipo'])));
            $aJson_tmp['Tipo']                 = utf8_encode(trim(strval($row['tipo_accesorio'])));
            $aJson_tmp['tiraje']               = intval($row['tiraje']);
            $aJson_tmp['Largo']                = floatval($row['largo']);
            $aJson_tmp['Ancho']                = floatval($row['ancho']);
            $aJson_tmp['Color']                = utf8_encode(trim(strval($row['color'])));
            $aJson_tmp['costo_unit_accesorio'] = floatval($row['costo_unit']);
            $aJson_tmp['costo_accesorios']     = floatval($row['costo_tot_accesorio']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Bancos($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']           = intval($row['id_odt']);
            $aJson_tmp['Tipo_banco']       = utf8_encode(trim(strval($row['tipo'])));
            $aJson_tmp['tiraje']           = intval($row['tiraje']);
            $aJson_tmp['largo']            = intval($row['largo']);
            $aJson_tmp['ancho']            = intval($row['ancho']);
            $aJson_tmp['profundidad']      = intval($row['profundidad']);
            $aJson_tmp['Suaje']            = utf8_encode(trim(strval($row['suaje'])));
            $aJson_tmp['costo_unit_banco'] = floatval($row['costo_unit']);
            $aJson_tmp['costo_bancos']     = floatval($row['costo_tot_banco']);
        }

        return $aJson_tmp;
    }


    protected function detalle_proc_Cierres($id_odt, $nombre_tabla_tmp, $ventas_model) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));

        $aJson_tmp = [];

        $sql_tabla_temp_db = $ventas_model->detalle_tabla_offset($id_odt, $nombre_tabla_tmp);

        foreach ($sql_tabla_temp_db as $row) {

            $aJson_tmp['id_odt']         = intval($row['id_odt']);
            $aJson_tmp['Tipo_cierre']    = utf8_encode(trim(strval($row['tipo_cierre'])));
            $aJson_tmp['tiraje']         = intval($row['tiraje']);
            $aJson_tmp['numpares']       = intval($row['numpares']);
            $aJson_tmp['largo']          = intval($row['largo']);
            $aJson_tmp['ancho']          = intval($row['ancho']);
            $aJson_tmp['tipo']           = utf8_encode(trim(strval($row['tipo'])));
            $aJson_tmp['color']          = utf8_encode(trim(strval($row['color'])));
            $aJson_tmp['costo_unitario'] = floatval($row['costo_unit']);
            $aJson_tmp['costo_cierre']   = floatval($row['costo_tot_cierre']);
        }

        return $aJson_tmp;
    }


    // inicia actualizacion de almeja (cambia el estado y graba los nuevos calculos)
    public function actCajaAlmeja() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $ventas_model = $this->loadModel('VentasModel');

        $odt_anterior = $_POST['odt_anterior'];
        $odt_anterior = trim(strval($odt_anterior));

        $odt_nueva = $_POST['odt_nueva'];
        $odt_nueva = trim(strval($odt_nueva));

        $id_cliente = $_POST['id_cliente'];
        $id_cliente = intval($id_cliente);

        $id_odt_ant_db = $ventas_model->getNumOdt($odt_anterior);

        foreach ($id_odt_ant_db as $row) {

            $id_odt_ant = $row['id_odt'];
            $id_odt_ant = intval($id_odt_ant);

            $_POST['id_odt_ant'] = $id_odt_ant;
        }

        if (is_array($id_odt_ant_db)) {

            unset($id_odt_ant_db);
        }


        $modifica_odt = self:: saveCaja();

        if ($modifica_odt) {

            // return true;

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'cotizador/listaCotizaciones/"';
            echo '</script>';
            //header("Location:" . URL . 'cotizador/listaCotizaciones');
        } else {

            return false;
        }
    }


    // regresa el JSON para renderizar la odt
    public function modCajaAlmeja() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');


        if(!$login->isLoged()) {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }


        if (isset($_GET['num_odt'])) {

            $num_odt = $_GET['num_odt'];
            $num_odt = trim(strval($num_odt));
        } else {

            return false;
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

        /*
        $modificado = self::actCajaAlmeja($ventas_model, $num_odt);

        if (!$modificado) {

            return false;
        }
        */

        $tabla_db = $ventas_model->getNumOdt($num_odt);

        foreach ($tabla_db as $row) {

            $id_odt            = intval($row['id_odt']);
            $id_usuario        = intval($row['id_usuario']);
            $id_cliente        = intval($row['id_cliente']);
            $tiraje            = intval($row['tiraje']);
            $base              = intval($row['base']);
            $alto              = intval($row['alto']);
            $profundidad       = intval($row['profundidad']);
            $id_grosor_cajon   = intval($row['id_grosor_cajon']);
            $id_grosor_cartera = intval($row['id_grosor_cartera']);
            $id_vendedor       = intval($row['id_vendedor']);
            $id_papel_empalme  = intval($row['id_papel_empalme']);
            $id_papel_Fcajon   = intval($row['id_papel_Fcajon']);
            $id_papel_Fcartera = intval($row['id_papel_Fcartera']);
            $id_papel_guarda   = intval($row['id_papel_guarda']);
            $costo_total       = floatval($row['costo_total']);
            $subtotal          = round(floatval($row['subtotal']), 2);
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

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }

        $fecha = date("Y/m/d", $fecha_odt);
        $hora  = date("H:i:s", $hora_odt);


        $carton_db = $options_model->getDatos($id_grosor_cajon);

        $grosor_cajon = intval($carton_db['numcarton']);


        $carton_db = $options_model->getDatos($id_grosor_cartera);

        $grosor_cartera = intval($carton_db['numcarton']);

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


        $aJson = [];

        $aJson['mensaje']        = "OK";
        $aJson['error']          = "";
        $aJson['id_odt']         = $id_odt;
        $aJson['num_odt']        = $num_odt;
        $aJson['Fecha']          = $fecha;
        $aJson['hora']           = $hora;
        $aJson['modelo']         = 1;
        $aJson['id_cliente']     = $id_cliente;
        $aJson['Nombre_cliente'] = $Nombre_cliente;
        $aJson['id_usuario']     = $id_usuario;
        $aJson['tiraje']         = $tiraje;


        $tabla_db = $ventas_model->getNombUsuario($id_usuario);

        foreach ($tabla_db as $row) {

            $id_tienda = intval($row['id_tienda']);

            $nomb_usuario = trim(strval($row['nombre_usuario']));
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        $aJson['id_tienda']       = $id_tienda;
        $aJson['base']            = $base;
        $aJson['alto']            = $alto;
        $aJson['profundidad']     = $profundidad;
        $aJson['costo_odt']       = $costo_total;
        $aJson['costo_subtotal']  = round($subtotal, 2);
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

        $aJson['id_grosor_cajon']   = $id_grosor_cajon;
        $aJson['id_grosor_cartera'] = $id_grosor_cartera;
        $aJson['id_vendedor']       = $id_vendedor;
        $aJson['id_papel_empalme']  = $id_papel_empalme;
        $aJson['id_papel_Fcajon']   = $id_papel_Fcajon;
        $aJson['id_papel_Fcartera'] = $id_papel_Fcartera;
        $aJson['id_papel_guarda']   = $id_papel_guarda;


        $tabla_db = $ventas_model->getPapel($id_odt, "Empalme");

        $aJson_tmp = [];

        foreach ($tabla_db as $row) {

            $aJson_tmp['id_papel']          = intval($row['id_papel']);
            $aJson_tmp['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $aJson_tmp['ancho']             = intval($row['ancho']);
            $aJson_tmp['largo']             = intval($row['largo']);
            $aJson_tmp['corte_ancho']       = intval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = intval($row['corte_largo']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['cortes']            = intval($row['cortes']);
            $aJson_tmp['pliegos']           = intval($row['pliegos']);
            $aJson_tmp['costo_tot_pliegos'] = floatval($row['costo_tot_pliegos']);
        }

        $aJson['Papel_Empalme'] = $aJson_tmp;

        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        $tabla_db = $ventas_model->getPapel($id_odt, "FCajon");

        $aJson_tmp = [];

        foreach ($tabla_db as $row) {

            $aJson_tmp['id_papel']          = intval($row['id_papel']);
            $aJson_tmp['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $aJson_tmp['ancho']             = intval($row['ancho']);
            $aJson_tmp['largo']             = intval($row['largo']);
            $aJson_tmp['corte_ancho']       = intval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = intval($row['corte_largo']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['cortes']            = intval($row['cortes']);
            $aJson_tmp['pliegos']           = intval($row['pliegos']);
            $aJson_tmp['costo_tot_pliegos'] = floatval($row['costo_tot_pliegos']);
        }

        $aJson['Papel_FCaj'] = $aJson_tmp;

        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        $tabla_db = $ventas_model->getPapel($id_odt, "Fcartera");

        $aJson_tmp = [];

        foreach ($tabla_db as $row) {

            $aJson_tmp['id_papel']          = intval($row['id_papel']);
            $aJson_tmp['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $aJson_tmp['ancho']             = intval($row['ancho']);
            $aJson_tmp['largo']             = intval($row['largo']);
            $aJson_tmp['corte_ancho']       = intval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = intval($row['corte_largo']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['cortes']            = intval($row['cortes']);
            $aJson_tmp['pliegos']           = intval($row['pliegos']);
            $aJson_tmp['costo_tot_pliegos'] = floatval($row['costo_tot_pliegos']);
        }

        $aJson['Papel_FCar'] = $aJson_tmp;


        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        $tabla_db = $ventas_model->getPapel($id_odt, "Guarda");

        $aJson_tmp = [];

        foreach ($tabla_db as $row) {

            $aJson_tmp['id_papel']          = intval($row['id_papel']);
            $aJson_tmp['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $aJson_tmp['ancho']             = intval($row['ancho']);
            $aJson_tmp['largo']             = intval($row['largo']);
            $aJson_tmp['corte_ancho']       = intval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = intval($row['corte_largo']);
            $aJson_tmp['costo_unitario']    = floatval($row['costo_unitario']);
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['cortes']            = intval($row['cortes']);
            $aJson_tmp['pliegos']           = intval($row['pliegos']);
            $aJson_tmp['costo_tot_pliegos'] = floatval($row['costo_tot_pliegos']);
        }

        $aJson['Papel_Guarda'] = $aJson_tmp;

        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        // cartones
        $tabla_db = $ventas_model->getIdCarton($id_odt, "Cajon");

        $aJson_tmp = [];

        foreach ($tabla_db as $row) {

            $aJson_tmp['id_cajon']          = intval($row['id_cajon']);
            $aJson_tmp['num_cajon']         = intval($row['num_cajon']);
            $aJson_tmp['tiraje']          = intval($row['tiraje']);
            $aJson_tmp['papel']             = utf8_encode(trim(strval($row['papel'])));
            $aJson_tmp['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $aJson_tmp['precio']            = floatval($row['precio']);
            $aJson_tmp['ancho']             = floatval($row['ancho']);
            $aJson_tmp['largo']             = floatval($row['largo']);
            $aJson_tmp['corte_ancho']       = floatval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = floatval($row['corte_largo']);
            $aJson_tmp['piezas_por_pliego'] = intval($row['piezas_por_pliego']);
            $aJson_tmp['num_pliegos']       = intval($row['num_pliegos']);
            $aJson_tmp['costo_tot_carton']  = floatval($row['costo_tot_carton']);
        }

        $aJson['CartonCaj'] = $aJson_tmp;

        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }

        if (is_array($tabla_db)) {

            unset($tabla_db);
        }


        $tabla_db = $ventas_model->getIdCarton($id_odt, "Cartera");

        $aJson_tmp = [];

        foreach ($tabla_db as $row) {

            $aJson_tmp['id_cartera']        = intval($row['id_cajon']);
            $aJson_tmp['num_cajon']         = floatval($row['num_cajon']);
            $aJson_tmp['tiraje']            = intval($row['tiraje']);
            $aJson_tmp['papel']             = utf8_encode(trim(strval($row['papel'])));
            $aJson_tmp['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $aJson_tmp['precio']            = floatval($row['precio']);
            $aJson_tmp['ancho']             = floatval($row['ancho']);
            $aJson_tmp['largo']             = floatval($row['largo']);
            $aJson_tmp['corte_ancho']       = floatval($row['corte_ancho']);
            $aJson_tmp['corte_largo']       = floatval($row['corte_largo']);
            $aJson_tmp['piezas_por_pliego'] = intval($row['piezas_por_pliego']);
            $aJson_tmp['num_pliegos']       = intval($row['num_pliegos']);
            $aJson_tmp['costo_tot_carton']  = floatval($row['costo_tot_carton']);
        }

        $aJson['CartonCar'] = $aJson_tmp;

        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }


        if (is_array($tabla_db)) {

            unset($tabla_db);
        }



    // empiezan los costos variables (procesos)


        $tabla_procesos = [];

        $procesos = str_replace("[", "", $procesos);
        $procesos = str_replace("]", "", $procesos);
        $procesos = str_replace('"', "", $procesos);

        $aProcesos = explode(",", $procesos);

        $num_procesos = count($aProcesos);

    // Inicia Impresiones Empalme

        // agregar los procesos de maquila en el switch
        /*
        echo PHP_EOL . PHP_EOL . "(1219) aProcesos: ";
        self::prettyPrint($aProcesos);

        echo PHP_EOL . PHP_EOL . "(1222) num_procesos: ";
        print_r($num_procesos);
        */
        for ($i = 0; $i < $num_procesos; $i++) {

            $nombre_proceso_tmp = trim(strval($aProcesos[$i]));

            //echo PHP_EOL . PHP_EOL . "(1213) nombre_proceso_tmp: ";
            //self::prettyPrint($nombre_proceso_tmp);


            $nombre_tabla_db = $ventas_model->getNombTablaProceso($nombre_proceso_tmp);

            foreach($nombre_tabla_db as $row) {

                $nombre_tabla = trim(strval($row['nombre']));
            }


            switch ($nombre_proceso_tmp) {
                case 'OffEmp':

                    $aJson['OffEmp'] = self::detalle_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'OffFCaj':

                    $aJson['OffFCaj'] = self::detalle_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'OffFCar':

                    $aJson['OffFCar'] = self::detalle_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'OffG':

                    $aJson['OffG'] = self::detalle_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Off_maq_Emp':

                    $aJson['Off_maq_Emp'] = self::detalle_maq_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Off_maq_FCaj':

                    $aJson['Off_maq_FCaj'] = self::detalle_maq_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Off_maq_FCar':

                    $aJson['Off_maq_FCar'] = self::detalle_maq_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Off_maq_G':

                    $aJson['Off_maq_G'] = self::detalle_maq_proc_offset($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'DigEmp':

                    $aJson['DigEmp'] = self::detalle_proc_digital($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'DigFCaj':

                    $aJson['DigFCaj'] = self::detalle_proc_digital($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'DigFCar':

                    $aJson['DigFCar'] = self::detalle_proc_digital($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'DigG':

                    $aJson['DigG'] = self::detalle_proc_digital($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SerEmp':

                    $aJson['SerEmp'] = self::detalle_proc_serigrafia($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SerFCaj':

                    $aJson['SerFCaj'] = self::detalle_proc_serigrafia($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SerFCar':

                    $aJson['SerFCar'] = self::detalle_proc_serigrafia($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SerG':

                    $aJson['SerG'] = self::detalle_proc_serigrafia($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Barniz_UV':

                    $aJson['Barniz_UV'] = self::detalle_proc_Barniz_UV($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'BarnizFcaj':

                    $aJson['BarnizFcaj'] = self::detalle_proc_Barniz_UV($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'BarnizFcar':

                    $aJson['BarnizFcar'] = self::detalle_proc_Barniz_UV($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'BarnizG':

                    $aJson['BarnizG'] = self::detalle_proc_Barniz_UV($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Laser':

                    $aJson['Laser'] = self::detalle_proc_Laser($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'LaserFcaj':

                    $aJson['LaserFcaj'] = self::detalle_proc_Laser($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'LaserFcar':

                    $aJson['LaserFcar'] = self::detalle_proc_Laser($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'LaserG':

                    $aJson['LaserG'] = self::detalle_proc_Laser($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Grabado':

                    $aJson['Grabado'] = self::detalle_proc_Grabado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'GrabadoFcaj':

                    $aJson['GrabadoFcaj'] = self::detalle_proc_Grabado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'GrabadoFcar':

                    $aJson['GrabadoFcar'] = self::detalle_proc_Grabado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'GrabadoG':

                    $aJson['GrabadoG'] = self::detalle_proc_Grabado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'HotStamping':

                    $aJson['HotStamping'] = self::detalle_proc_HotStamping($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'HotStampingFcaj':

                    $aJson['HotStampingFcaj'] = self::detalle_proc_HotStamping($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'HotStampingFcar':

                    $aJson['HotStampingFcar'] = self::detalle_proc_HotStamping($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'HotStampingG':

                    $aJson['HotStampingG'] = self::detalle_proc_HotStamping($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Laminado':

                    $aJson['Laminado'] = self::detalle_proc_Laminado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'LaminadoFcaj':

                    $aJson['LaminadoFcaj'] = self::detalle_proc_Laminado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'LaminadoFcar':

                    $aJson['LaminadoFcar'] = self::detalle_proc_Laminado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'LaminadoG':

                    $aJson['LaminadoG'] = self::detalle_proc_Laminado($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Suaje':

                    $aJson['Suaje'] = self::detalle_proc_Suaje($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SuajeFcaj':

                    $aJson['SuajeFcaj'] = self::detalle_proc_Suaje($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SuajeFcar':

                    $aJson['SuajeFcar'] = self::detalle_proc_Suaje($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'SuajeG':

                    $aJson['SuajeG'] = self::detalle_proc_Suaje($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Accesorios':

                    $aJson['Accesorios'] = self::detalle_proc_Accesorios($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Bancos':

                    $aJson['Bancos'] = self::detalle_proc_Bancos($id_odt, $nombre_tabla, $ventas_model);

                    break;
                case 'Cierres':

                    $aJson['Cierres'] = self::detalle_proc_Cierres($id_odt, $nombre_tabla, $ventas_model);

                    break;
            }
        }


        json_encode($aJson);


        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/cotizador/cajas.php';

        echo "<script>$('#form_modelo_0').hide();</script>";

        require 'application/views/cotizador/mod_cajas_almeja.php';

        echo "<script>$('#form_modelo_1_derecho').show('slow');</script>";

        require 'application/views/templates/footer.php';
    }

    protected static $mensajes = array(

        JSON_ERROR_NONE           => 'No ha habido ningun error',
        JSON_ERROR_DEPTH          => 'Se ha alcanzado el máximo nivel de profundidad',
        JSON_ERROR_STATE_MISMATCH => 'JSON inválido o mal formado',
        JSON_ERROR_CTRL_CHAR      => 'Error de control de caracteres, posiblemente incorrectamente codificado',
        JSON_ERROR_SYNTAX         => 'Error de sintaxis',
        JSON_ERROR_UTF8           => 'Caracteres UTF-8 mal formados, posiblemente incorrectamente codificado'
    );
    

    public static function encode($value, $options = 0){

        $result = json_encode($value, $options);
        $error =  static::$mensajes[json_last_error()];
        $value['jsonError'] = $error;
        $result = json_encode($value);
        
        if ($result[0] == "<") {
            
            echo "mal";
        }
    }


    public function vistaAct() {

        if (isset($_GET['num_odt'])) {

            $num_odt = $_GET['num_odt'];
            //$num_odt = trim(strval($num_odt));

            //$nombrecliente = $opt->getClientInfo($_GET['cliente'],'nombre');
            //$nombrecliente = $opt->getClientInfo($_GET['cliente'],'nombre') . ' ' . $opt->getClientInfo($_GET['cliente'],'apellido');
        }


        if (isset($_GET['caja'])) {

            $caja = $_GET['caja'];
        }
    }


    // calculo del modelo caja almeja
    public function saveCaja() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $aJson      = [];
        $aCortes    = [];


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');

        $odt = strip_tags(trim($_POST['odt']));
        $odt = strtoupper($odt);
        $odt = strval($odt);

        //$l_existe = $ventas_model->chkODT();
        $l_existe = self::checaODT($odt);

        if (!$l_existe) {

            return false;
        }

        $_POST['odt'] = $odt;

        $id_usuario = $_SESSION['user']['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_tienda = $_SESSION['user']['id_tienda'];
        $id_tienda = intval($id_tienda);

        $num_dec2 = 2;
        $num_dec4 = 4;

        $l_subtotal = true;
        $l_costo    = true;

        $cantidad        = 0;
        $costo_total     = 0;
        $costo_corte     = 0;

        $cantidad = $_POST["qty"];
        $cantidad = intval($cantidad);

        $tiraje = $_POST['qty'];
        $tiraje = intval($tiraje);

        if (isset($_POST['submit'])) {

            if ($tiraje <= 0) {

                echo "Oops! Por favor capture todos los datos.";

                return false;
            }
        }


        $id_cliente = $_POST['id_cliente'];

        $cliente_db = $ventas_model->getClientById($id_cliente);

        foreach ($cliente_db as $row) {

            $nombre_cliente = $row['nombre'];
        }

        $nombre_cliente = strval($nombre_cliente);
        $nombre_cliente = trim($nombre_cliente);
        $nombre_cliente = utf8_encode($nombre_cliente);

        $id_modelo = $_POST['modelo'];
        $id_modelo = intval($id_modelo);


        $base = 0;
        $base = $_POST['base'];
        $base = floatval($base);

        $alto = 0;
        $alto = $_POST['alto'];
        $alto = floatval($alto);

        $profundidad     = 0;
        $profundidad     = $_POST['profundidad'];
        $profundidad     = floatval($profundidad);

        $grosor_cajon    = 0;
        $grosor_cajon    = $_POST['grosor-cajon'];
        $grosor_cajon    = floatval($grosor_cajon);

        $grosor_cartera  = 0;
        $grosor_cartera  = $_POST['grosor-cartera'];
        $grosor_cartera  = floatval($grosor_cartera);

        $cajon           = $grosor_cajon;
        $cartera         = $grosor_cartera;

        $offset1         = $_POST['offset1'];
        $offset1         = floatval($offset1);

        $offsetadic      = $_POST['offsetadic'];
        $offsetadic      = floatval($offsetadic);

        $offset          = $_POST['offset'];
        $offset          = floatval($offset);

        $digital1        = $_POST['digital1'];
        $digital1        = floatval($digital1);

        $digitaladic     = $_POST['digitaladic'];
        $digitaladic     = floatval($digitaladic);

        $digital         = $_POST['digital'];
        $digital         = floatval($digital);

        $serigrafia1     = $_POST['serigrafia1'];
        $serigrafia1     = floatval($serigrafia1);

        $serigrafiaadic  = $_POST['serigrafiaadic'];
        $serigrafiaadic  = floatval($serigrafiaadic);

        $serigrafia      = $_POST['serigrafia'];
        $serigrafia      = floatval($serigrafia);

        $hs1             = $_POST['hs1'];
        $hs1             = floatval($hs1);

        $hsadic          = $_POST['hsadic'];
        $hsadic          = floatval($hsadic);

        $hs              = $_POST['hs'];
        $hs              = floatval($hs);

        $laminado1       = $_POST['laminado1'];
        $laminado1       = floatval($laminado1);

        $laminadoadic    = $_POST['laminadoadic'];
        $laminadoadic    = floatval($laminadoadic);

        $laminado        = $_POST['laminado'];
        $laminado        = floatval($laminado);

        $barniz1         = $_POST['barniz1'];
        $barniz1         = floatval($barniz1);

        $barnizadic      = $_POST['barnizadic'];
        $barnizadic      = floatval($barnizadic);

        $barniz          = $_POST['barniz'];
        $barniz          = floatval($barniz);

        $suaje1          = $_POST['suaje1'];
        $suaje1          = floatval($suaje1);

        $suajeadic       = $_POST['suajeadic'];
        $suajeadic       = floatval($suajeadic);

        $suaje           = $_POST['suaje'];
        $suaje           = floatval($suaje);

        $forrado1        = $_POST['forrado1'];
        $forrado1        = floatval($forrado1);

        $forradoadic     = $_POST['forradoadic'];
        $forradoadic     = floatval($forradoadic);

        $forrado         = $_POST['forrado'];
        $forrado         = floatval($forrado);

        $grabadomin      = $_POST['grabadomin'];
        $grabadomin      = floatval($grabadomin);

        $grabadoadic     = $_POST['grabadoadic'];
        $grabadoadic     = floatval($grabadoadic);

        $grabadotot      = $_POST['grabadotot'];
        $grabadotot      = floatval($grabadotot);


    // Calculadora
        $aCalculos = self::almejaCalc($base, $alto, $profundidad, $grosor_cajon, $grosor_cartera);

        //$aCalculos_temp = $_POST['aCalculos'];
        //$aCalculos      = json_decode($aCalculos_temp, true);

        // Empalme
        $x1 = $aCalculos['x1'];         // largo
        $x1 = floatval($x1);

        $y1 = $aCalculos['y1'];         // ancho
        $y1 = floatval($y1);


        // Forro Cajon
        $f = $aCalculos['f'];           // largo
        $f = floatval($f);

        $k = $aCalculos['k'];           // ancho
        $k = floatval($k);


        // Forro Cartera
        $B1 = $aCalculos['B1'];         // ancho
        $B1 = round(floatval($B1), 2);

        $Y1 = $aCalculos['Y1'];         // largo
        $Y1 = floatval($Y1);


        // Guarda
        $B11 = $aCalculos['B11'];       // largo
        $B11 = floatval($B11);

        $Y11 = $aCalculos['Y11'];       // ancho
        $Y11 = floatval($Y11);


        $aJson = [];

        $modelo = intval($_POST['modelo']);


    // aJson
        // crea el array principal
        $aJson['mensaje']         = "Correcto";
        $aJson['error']           = "";
        $aJson['nomb_odt']        = trim(strval($_POST['odt']));
        $aJson['Fecha']           = date("Y-m-d");
        $aJson['modelo']          = $id_modelo;
        $aJson['id_cliente']      = $id_cliente;
        $aJson['Nombre_cliente']  = $nombre_cliente;
        $aJson['id_usuario']      = $id_usuario;
        $aJson['tiraje']          = $tiraje;
        $aJson['id_tienda']       = $id_tienda;
        $aJson['base']            = $base;
        $aJson['alto']            = $alto;
        $aJson['profundidad']     = $profundidad;
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
        $aJson['costo_emp']       = 0;
        $aJson['costo_fcaj']      = 0;
        $aJson['costo_fcar']      = 0;
        $aJson['costo_g']         = 0;

        $aJson['costo_impresiones']     = 0;
        $aJson['costo_impresiones_emp'] = 0;
        $aJson['costo_offset_emp']      = 0;
        $aJson['costo_digital_emp']     = 0;
        $aJson['costo_serigrafia_emp']  = 0;

        $aJson['costo_impresiones_fcaj'] = 0;
        $aJson['costo_offset_fcaj']      = 0;
        $aJson['costo_digital_fcaj']     = 0;
        $aJson['costo_serigrafia_fcaj']  = 0;

        $aJson['costo_impresiones_fcar'] = 0;
        $aJson['costo_offset_fcar']      = 0;
        $aJson['costo_digital_fcar']     = 0;
        $aJson['costo_serigrafia_fcar']  = 0;

        $aJson['costo_impresiones_g'] = 0;
        $aJson['costo_offset_g']      = 0;
        $aJson['costo_digital_g']     = 0;
        $aJson['costo_serigrafia_g']  = 0;

        $aJson['costo_acabados']    = 0;
        $aJson['costo_acab_emp']    = 0;
        $aJson['costo_BUV_emp']     = 0;
        $aJson['costo_Laser_emp']   = 0;
        $aJson['costo_Grabado_emp'] = 0;
        $aJson['costo_HS_emp']      = 0;
        $aJson['costo_Lam_emp']     = 0;
        $aJson['costo_Suaje_emp']   = 0;

        $aJson['costo_acab_fcaj']    = 0;
        $aJson['costo_BUV_fcaj']     = 0;
        $aJson['costo_Laser_fcaj']   = 0;
        $aJson['costo_Grabado_fcaj'] = 0;
        $aJson['costo_HS_fcaj']      = 0;
        $aJson['costo_Lam_fcaj']     = 0;
        $aJson['costo_Suaje_fcaj']   = 0;

        $aJson['costo_acab_fcar']    = 0;
        $aJson['costo_BUV_fcar']     = 0;
        $aJson['costo_Laser_fcar']   = 0;
        $aJson['costo_Grabado_fcar'] = 0;
        $aJson['costo_HS_fcar']      = 0;
        $aJson['costo_Lam_fcar']     = 0;
        $aJson['costo_Suaje_fcar']   = 0;

        $aJson['costo_acab_g']    = 0;
        $aJson['costo_BUV_g']     = 0;
        $aJson['costo_Laser_g']   = 0;
        $aJson['costo_Grabado_g'] = 0;
        $aJson['costo_HS_g']      = 0;
        $aJson['costo_Lam_g']     = 0;
        $aJson['costo_Suaje_g']   = 0;


        $aJson['costo_bancos']     = 0;
        $aJson['costo_cierres']    = 0;
        $aJson['costo_accesorios'] = 0;


        $aCortes    = [];


        $id_papel_empalme       = intval($_POST['papel_interior_cajon']);
        $id_papel_forro_cajon   = intval($_POST['papel_exterior_cajon']);
        $id_papel_forro_cartera = intval($_POST['papel_exterior_cartera']);
        $id_papel_guarda        = intval($_POST['papel_interior_cartera']);


        // corte Empalme
        $secc_ancho = floatval($y1);
        $secc_largo = floatval($x1);

        $aPapel_tmp = self::calculaPapel("Empalme", $id_papel_empalme, $secc_ancho, $secc_largo, $tiraje, $ventas_model);

        if (intval($aPapel_tmp['calculadora']['corte']['cortesT']) <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Empalme;";
        }

        $aPapelEmp = [];

        $aPapelEmp = $aPapel_tmp;

        $aCortes['guarda_cajon']  = intval($aPapel_tmp['calculadora']['corte']['cortesT']);



        // Corte Forro Cajon
        $secc_ancho = floatval($k);
        $secc_largo = floatval($f);

        $aPapel_tmp = self::calculaPapel("FCaj", $id_papel_forro_cajon, $secc_ancho, $secc_largo, $tiraje, $ventas_model);

        if (intval($aPapel_tmp['calculadora']['corte']['cortesT']) <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Forro del cajon;";
        }


        $aPapelFCaj = [];

        $aPapelFCaj = $aPapel_tmp;

        $aCortes['forro_cajon'] = intval($aPapel_tmp['calculadora']['corte']['cortesT']);


        // Corte Forro Cartera
        $secc_ancho = floatval($B1);
        $secc_largo = floatval($Y1);

        $aPapel_tmp = self::calculaPapel("FCar", $id_papel_forro_cartera, $secc_ancho, $secc_largo, $tiraje, $ventas_model);

        if (intval($aPapel_tmp['calculadora']['corte']['cortesT']) <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en Forro de la cartera;";
        }


        $aPapelFCar = [];

        $aPapelFCar = $aPapel_tmp;

        $aCortes['forro_cartera'] = intval($aPapel_tmp['calculadora']['corte']['cortesT']);


        // Guarda
        $secc_ancho = floatval($Y11);
        $secc_largo = floatval($B11);

        $aPapel_tmp = self::calculaPapel("Guarda", $id_papel_guarda, $secc_ancho, $secc_largo, $tiraje, $ventas_model);

        if (intval($aPapel_tmp['calculadora']['corte']['cortesT']) <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al pliego en la Guarda;";
        }


        $aPapelG = [];

        $aPapelG = $aPapel_tmp;

        $aCortes['guarda'] = intval($aPapel_tmp['calculadora']['corte']['cortesT']);



    // Grosor Cajon
        $id_grosor_cajon = $_POST['grosor-cajon'];
        $id_grosor_cajon = floatval($id_grosor_cajon);

        $grosor_caj = self::getPapelCarton("grosor_cajon", $id_grosor_cajon);

        $c_ancho = floatval($grosor_caj['ancho_papel']);
        $c_largo = floatval($grosor_caj['largo_papel']);

        $aPapel_tmp = self::calculaPapel("grosor_cajon", $id_grosor_cajon, $c_ancho, $c_largo, $tiraje, $ventas_model);


        $aCartonCajon = [];

        $aCartonCajon = $aPapel_tmp;

        $corte_cajon = intval($aPapel_tmp['calculadora']['corte']['cortesT']);

        if ($corte_cajon <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al carton del cajon;";
        }

        $aCortes['cajon'] = $corte_cajon;


    // Grosor Cartera
        $id_grosor_cartera = $_POST['grosor-cartera'];
        $id_grosor_cartera = floatval($id_grosor_cartera);

        $grosor_cartera = self::getPapelCarton("grosor_cartera", $id_grosor_cartera);

        $c_ancho = floatval($grosor_cartera['ancho_papel']);
        $c_largo = floatval($grosor_cartera['largo_papel']);

        $aPapel_tmp = self::calculaPapel("grosor_cartera", $id_grosor_cartera, $c_ancho, $c_largo, $tiraje, $ventas_model);


        $aCartonCartera = [];

        $aCartonCartera = $aPapel_tmp;

        $corte_cajon_cartera = intval($aPapel_tmp['calculadora']['corte']['cortesT']);

        if ($corte_cajon_cartera <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = $aJson['error'] . "Las medidas del corte son mayores al carton de la cartera;";
        }

        $aCortes['cartera'] = $corte_cajon_cartera;


        $costo_odt     = 0;
        $costo_papeles = 0;

        $aMerma = [];


        // total papel + cartones
        $costo_odt = $aPapelEmp["tot_costo"];

        $costo_papeles = $costo_papeles + $aPapelEmp['tot_costo'] + $aPapelFCaj['tot_costo'] + $aPapelFCar['tot_costo'] + $aPapelG['tot_costo'] + $aCartonCajon['tot_costo'] + $aCartonCartera['tot_costo'];


/******************* Inicia Costos fijos *************************/



    // ************ Elaboracion de Cartera **********************


        $base_tmp = floatval($_POST['base']);
        $alto_tmp = floatval($_POST['alto']);


        $aElab_Car_tmp = [];

        $aElab_Car_tmp = self::calculoElabCartera("proc_cartera", "Forro de Cartera", $base_tmp, $alto_tmp, $tiraje, $ventas_model);

        $aElab_Car['tiraje'] = $aElab_Car_tmp['tiraje'];
        $aElab_Car['forro_costo_unit'] = $aElab_Car_tmp['costo_unit'];
        $aElab_Car['forro_car'] = $aElab_Car_tmp["forro_costo_tot"];


        $aElab_Car_tmp = [];

        $aElab_Car_tmp = self::calculoElabCartera("proc_cartera", "Guarda", $base_tmp, $alto_tmp, $tiraje, $ventas_model);



        $aElab_G   = [];

        $aElab_G['tiraje']  = $aElab_Car_tmp['tiraje'];
        $aElab_G['guarda_costo_unit']  = $aElab_Car_tmp['costo_unit'];
        $aElab_G['guarda']             = $aElab_Car_tmp['forro_costo_tot'];


        $aElab_Car_tmp = [];



    // ****************** ranurado ********************************

        $proc_temp = [];

        $proc_temp = self::calculoRanurado($tiraje, $ventas_model);


        $aRanurado      = [];
        $aRanurado_Fcar = [];

        $aRanurado['tiraje']                = $proc_temp['tiraje'];
        $aRanurado['arreglo']               = $proc_temp['arreglo'];
        $aRanurado['costo_unit_por_ranura'] = $proc_temp['costo_unit_por_ranura'];
        $aRanurado['costo_por_ranura']      = $proc_temp['costo_por_ranura'];
        $aRanurado['costo_tot_ranurado']    = $proc_temp['costo_tot_proceso'];


        $aRanurado_Fcar['costo_unit_por_ranura'] = $proc_temp['costo_unit_por_ranura'];
        $aRanurado_Fcar['costo_por_ranura'] = $proc_temp['costo_por_ranura'];



    // ************ encuadernacion ******************************

        $aEncuadernacion      = [];
        $aEncuadernacion_Fcaj = [];

        $proc_temp = [];

        $id_papel_exterior_cajon = intval($_POST['papel_exterior_cajon']);

        $enc_cortes = intval($aCortes['guarda_cajon']);

        $proc_temp = self::calculoEncuadernacion($tiraje, $id_papel_exterior_cajon, $enc_cortes, $ventas_model);

        $aEncuadernacion = $proc_temp;


        $enc_cortes_fcaj = intval($aCortes['forro_cajon']);

        $proc_temp = self::calculoEncuadernacion_FCaj($tiraje, $id_papel_exterior_cajon, $enc_cortes_fcaj, $ventas_model);

        $aEncuadernacion_Fcaj = $proc_temp;

        if ($proc_temp['costo_unit_forrado_cajon'] <= 0) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error'] = $aJson['error'] . "No existe costo para costo unit forrado cajon(encuadernacion_Fcaj);";
        }


        if ($proc_temp['arreglo_de_forrado_de_cajon'] <= 0 and $tiraje >= 500) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error'] = $aJson['error'] . "No existe costo para arreglo de forrado de cajon(encuadernacion_Fcaj);";
        }


/************** Termina Costos fijos *************************/


    /******************* proceso Impresion ******************************/

    $mensaje = "ERROR";
    $error   = "No existe costo para ";


/****************** Inicia los calculos de Empalme *****************/

        $aOffEmp      = [];
        $aOff_maq_Emp = [];
        $aDigEmp      = [];
        $aSerEmp      = [];
        $aHSEmp       = [];
        $aGrabEmp     = [];


        // Empalme
        $Tipo_proceso_tmp2 = json_decode($_POST['aImp'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = 0;
        $num_rows = count($Tipo_proceso_tmp2);


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

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];
                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];


                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);


                    $papel_emp_corte_ancho = $aPapelEmp['calculadora']['corte_ancho'];
                    $papel_emp_corte_largo = $aPapelEmp['calculadora']['corte_largo'];


                    $es_maquila = self::recMaquila($papel_emp_corte_ancho, $papel_emp_corte_largo);


                    $cortes_por_pliego = intval($aPapelEmp['corte']);

                    $costo_unit_papel = floatval($aPapelEmp['costo_unit_papel']);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);


                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $id_papel_empalme = $aPapelEmp['id_papel'];

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_empalme, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_empalme, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset(Empalme);";
                        }

                        $aOffEmp[$i] = $offset_tiro;

                        $aOffEmp[$i]["mermas"] = $aMerma;
                    } else {        // si es maquila

                        $offset_tiro = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Empalme);";
                        }

                        $aOff_maq_Emp[$i] = $offset_tiro;

                        //$aOff_maq_Emp[$i]["mermas"] = $aMerma;
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $x1;
                    $corte_largo_proceso = $y1;

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

                        $aDigEmp[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        $aDigEmp[$i]['cortes_por_pliego'] = $aCortes['guarda_cajon'];

                        if ($aDigEmp[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "Digital. No cabe con las medidas proporcionadas en Empalme;";
                        } elseif ($aDigEmp[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Digital. No existe costo en Digital Empalme;";
                        }
                    } else {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error .  "Digital. No cabe con las medidas proporcionadas en Digital Empalme;";

                        $aDigEmp[$i]['cabe_digital']      = "NO";
                        $aDigEmp[$i]['cantidad']          = $tiraje;
                        $aDigEmp[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigEmp[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigEmp[$i]['imp_ancho']         = 0;
                        $aDigEmp[$i]['imp_largo']         = 0;
                        $aDigEmp[$i]["costo_unitario"]    = 0;
                        $aDigEmp[$i]["costo_tot_proceso"] = 0;

                        $aMerma_DigEmp = [];

                        $aMerma_DigEmp['merma_min']               = 0;
                        $aMerma_DigEmp['merma_adic']              = 0;
                        $aMerma_DigEmp['merma_tot']               = 0;
                        $aMerma_DigEmp['cortes_por_pliego']       = 0;
                        $aMerma_DigEmp['merma_tot_pliegos']       = 0;
                        $aMerma_DigEmp['costo_unit_papel_merma']  = 0;
                        $aMerma_DigEmp['costo_tot_pliegos_merma'] = 0;


                        $aDigEmp[$i]["mermas"] = $aMerma_DigEmp;

                        if (is_array($aMerma_DigEmp)) {

                            unset($aMerma_DigEmp);
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

                    $cortes_pliego = intval($aPapelEmp['corte']);

                    $costo_unit_papel = floatval($aPapelEmp['costo_unit_papel']);


                    $aSerEmp[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);

                    if ($aSerEmp[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Empalme);";
                    }


                    $aSerEmp[$i]['mermas'] = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);
                }
            }
        }


        $aJson['aCalculos']     = $aCalculos;
        $aJson['Papel_Empalme'] = $aPapelEmp;
        $aJson['Papel_FCaj']    = $aPapelFCaj;
        $aJson['Papel_FCar']    = $aPapelFCar;
        $aJson['Papel_Guarda']  = $aPapelG;
        $aJson['CartonCaj']     = $aCartonCajon;
        $aJson['CartonCar']     = $aCartonCartera;
        $aJson['Cortes']        =  $aCortes;


        $aJson['elab_car']            = $aElab_Car;
        $aJson['elab_guarda']         = $aElab_G;
        $aJson['ranurado']            = $aRanurado;
        $aJson['ranurado_Fcar']       = $aRanurado_Fcar;
        $aJson['encuadernacion']      = $aEncuadernacion;
        $aJson['encuadernacion_Fcaj'] = $aEncuadernacion_Fcaj;


        if (is_array($aElab_Car)) {

            unset($aElab_Car);
        }

        if (is_array($aElab_G)) {

            unset($aElab_G);
        }


        if (is_array($aRanurado)) {

            unset($aRanurado);
        }


        if (is_array($aRanurado_Fcar)) {

            unset($aRanurado_Fcar);
        }


        if (is_array($aEncuadernacion)) {

            unset($aEncuadernacion);
        }


        if (is_array($aEncuadernacion_Fcaj)) {

            unset($aEncuadernacion_Fcaj);
        }



        if (count($aOffEmp) > 0 ) {

            $aOffEmp_R = array_values($aOffEmp);

            $aJson['OffEmp'] = $aOffEmp_R;

            if (is_array($aOffEmp)) {

                unset($aOffEmp);
                unset($aOffEmp_R);
            }
        }

        if (count($aOff_maq_Emp) > 0) {

            $aOff_maq_Emp_R = array_values($aOff_maq_Emp);

            $aJson['Off_maq_Emp'] = $aOff_maq_Emp_R;

            if (is_array($aOff_maq_Emp)) {

                unset($aOff_maq_Emp);
                unset($aOff_maq_Emp_R);
            }
        }

        if (count($aDigEmp) > 0) {

            $aDigEmp_R = array_values($aDigEmp);

            $aJson['DigEmp'] = $aDigEmp_R;

            if (is_array($aDigEmp)) {

                unset($aDigEmp);
                unset($aDigEmp_R);
            }
        }

        if (count($aSerEmp) > 0) {

            $aSerEmp_R = array_values($aSerEmp);

            $aJson['SerEmp'] = $aSerEmp_R;

            if (is_array($aSerEmp)) {

                unset($aSerEmp);
                unset($aSerEmp_R);
            }
        }



/******************* Termina los calculos de Empalme ***************/


/***************** Inicia los calculos Forro del Cajon **************/


        // Forro del Cajon
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpFCaj'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $a_tmp = $aJson['Papel_FCaj'];
        $a_tmp_calculadora = $a_tmp['calculadora'];

        $papel_corte_ancho = $a_tmp_calculadora['corte_ancho'];
        $papel_corte_largo = $a_tmp_calculadora['corte_largo'];


        $num_rows = count($Tipo_proceso_tmp2);


        $aJsonFcaj = [];

        $aOffFCaj      = [];
        $aOff_maq_FCaj = [];
        $aDigFCaj      = [];
        $aSerFCaj      = [];

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

                    // merma offset

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);


                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);


                    $cortes_por_pliego = intval($aJson['Papel_FCaj']['corte']);

                    $costo_unit_papel = floatval($aJson['Papel_FCaj']["costo_unit_papel"]);


                    $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];
                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    $id_papel_Fcaj = intval($_POST['papel_exterior_cajon']);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_Fcaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_Fcaj, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        if ($offset_tiro['costo_tot_proceso'] <= 0) {

                                $aJson['mensaje'] = $mensaje;
                                $aJson['error']   = $aJson['error'] . $error . "Offset(Forro del Cajon);";
                        }

                        $aOffFCaj[$i] = $offset_tiro;

                        $aOffFCaj[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $offset_tiro = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Empalme);";
                        }

                        $aOff_maq_FCaj[$i] = $offset_tiro;

                        //$aOff_maq_FCaj[$i]["mermas"] = $aMerma;
                    }
                }


                if ($Nombre_proceso == "Digital") {

                    $corte_ancho_proceso = $f;
                    $corte_largo_proceso = $k;

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

                        $aDigFCaj[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFCaj[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "Digital. No cabe con las medidas proporcionadas en Digital Forro del cajon;";
                        } elseif ($aDigFCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Digital Forro del cajon;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error . "Digital. No cabe con las medidas proporcionadas en Digital (Forro del cajon);";

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

                    $cortes_pliego = intval($aJson['Papel_FCaj']['corte']);

                    $costo_unit_papel = floatval($aJson['Papel_FCaj']['costo_unit_papel']);



                    $Merma_Ser_tmp = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);


                    $aSerFCaj[$i] = self::calculoSerigrafia($tiraje, $tipo_offset_serigrafia, $num_tintas, $ventas_model);


                    if ($aSerFCaj[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Forro del Cajon);";
                    }

                    $aSerFCaj[$i]["mermas"] = $Merma_Ser_tmp;


                    if (is_array($Merma_Ser_tmp)) {

                        unset($Merma_Ser_tmp);
                    }

                }
            }
        }

        if (count($aOffFCaj) > 0 ) {

            $aOffFCaj_R = array_values($aOffFCaj);

            $aJson['OffFCaj'] = $aOffFCaj_R;

            if (is_array($aOffFCaj)) {

                unset($aOffFCaj);
                unset($aOffFCaj_R);
            }
        }

        if (count($aOff_maq_FCaj) > 0) {

            $aOff_maq_FCaj_R  = array_values($aOff_maq_FCaj);

            $aJson['Off_maq_FCaj'] = $aOff_maq_FCaj_R;

            if (is_array($aOff_maq_FCaj)) {

                unset($aOff_maq_FCaj);
                unset($aOff_maq_FCaj_R);
            }
        }

        if (count($aDigFCaj) > 0) {

            $aDigFCaj_R = array_values($aDigFCaj);

            $aJson['DigFCaj'] = $aDigFCaj_R;

            if (is_array($aDigFCaj)) {

                unset($aDigFCaj);
                unset($aDigFCaj_R);
            }
        }

        if (count($aSerFCaj) > 0) {

            $aSerFCaj_R = array_values($aSerFCaj);

            $aJson['SerFCaj'] = $aSerFCaj_R;

            if (is_array($aSerFCaj)) {

                unset($aSerFCaj);
                unset($aSerFCaj_R);
            }
        }



/******************* Termina los calculos Forro del Cajon ***********/


/******************* Inicia los calculos Forro de la Cartera **********/


        // Forro de la Cartera
        $Tipo_proceso_FCar_tmp2 = json_decode($_POST['aImpFCar'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_FCar_tmp2);

        $num_rows = 0;
        $num_rows = count($Tipo_proceso_tmp);

        $papel_corte_ancho = $aJson['Papel_FCar']['calculadora']['corte_ancho'];
        $papel_corte_largo = $aJson['Papel_FCar']['calculadora']['corte_largo'];


        $aJsonFcar     = [];

        $aOffFCar      = [];
        $aOff_maq_FCar = [];
        $aDigFCar      = [];
        $aSerFCar      = [];

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


                $cortes_por_pliego = intval($aJson['Papel_FCar']['corte']);
                $costo_unit_papel  = floatval($aJson['Papel_FCar']["costo_unit_papel"]);


                if ($Nombre_proceso == "Offset") {

                    $id_papel_FCar = intval($aJson['Papel_FCar']['id_papel']);

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = utf8_encode(trim(strval($nombre_tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    // merma offset
                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_FCar, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_FCar, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset(Forro de la Cartera);";
                        }

                        $aOffFCar[$i] = $offset_tiro;

                        $aOffFCar[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $offset_tiro = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Empalme);";
                        }

                        $aOff_maq_FCar[$i] = $offset_tiro;

                        //$aOff_maq_FCar[$i]["mermas"] = $aMerma;
                    }
                }



                if ($Nombre_proceso === "Digital") {

                    $corte_ancho_proceso = $B1;
                    $corte_largo_proceso = $Y1;

                    $tam0 = self::calcTamDigital($corte_ancho_proceso, $corte_largo_proceso);

                    $tam          = "";
                    $tam1         = 0;
                    $nomb_tam_emp = "";

                    if (count($tam0) > 0) {

                        $tam          = $tam0[0];
                        $tam1         = $tam0[1];
                        $nomb_tam_emp = $tam0['tipo_digital'];
                    }

                    if ($tam == "TC") {

                        $imp_ancho_dig = 20.5;
                        $imp_largo_dig = 27;
                    } elseif ($tam == "T2C") {

                        $imp_ancho_dig = 32;
                        $imp_largo_dig = 46.5;
                    }

                    if ( $tam1 ) {

                        $aDigFCar[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigFCar[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "Digital. No cabe con las medidas proporcionadas en Forro de la Cartera;";
                        } elseif ($aDigFCar[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Digital. No existe costo en Forro de la Cartera;";
                        }
                    } else {

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error .  "Digital. No cabe con las medidas proporcionadas en Forro de la Cartera;";

                        $aDigFCar[$i]['cabe_digital']      = "NO";
                        $aDigFCar[$i]['cantidad']          = $tiraje;
                        $aDigFCar[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigFCar[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigFCar[$i]['imp_ancho']         = 0;
                        $aDigFCar[$i]['imp_largo']         = 0;
                        $aDigFCar[$i]["costo_unitario"]    = 0;
                        $aDigFCar[$i]["costo_tot_proceso"] = 0;

                        $aMerma_Dig = [];

                        $aMerma_Dig['merma_min']               = 0;
                        $aMerma_Dig['merma_adic']              = 0;
                        $aMerma_Dig['merma_tot']               = 0;
                        $aMerma_Dig['cortes_por_pliego']       = 0;
                        $aMerma_Dig['merma_tot_pliegos']       = 0;
                        $aMerma_Dig['costo_unit_papel_merma']  = 0;
                        $aMerma_Dig['costo_tot_pliegos_merma'] = 0;


                        $aDigFCar[$i]["mermas"] = $aMerma_Dig;

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


                    $aSerFCar[$i] = self::calculoSerigrafia($tiraje, $nombre_tipo_offset, $num_tintas, $ventas_model);


                    if ($aSerFCar[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Forro de la Cartera);";
                    }


                    $aSerFCar[$i]['mermas'] = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);
                }
            }
        }

        if (count($aOffFCar) > 0 ) {

            $aOffFCar_R = array_values($aOffFCar);

            $aJson['OffFCar'] = $aOffFCar_R;

            if (is_array($aOffFCar)) {

                unset($aOffFCar);
                unset($aOffFCar_R);
            }
        }

        if (count($aOff_maq_FCar) > 0) {

            $aOff_maq_FCar_R = array_values($aOff_maq_FCar)
            ;
            $aJson['Off_maq_FCar'] = $aOff_maq_FCar_R;

            if (is_array($aOff_maq_FCar)) {

                unset($aOff_maq_FCar);
                unset($aOff_maq_FCar_R);
            }
        }

        if (count($aDigFCar) > 0) {

            $aDigFCar_R = array_values($aDigFCar);

            $aJson['DigFCar'] = $aDigFCar_R;

            if (is_array($aDigFCar)) {

                unset($aDigFCar);
                unset($aDigFCar_R);
            }
        }

        if (count($aSerFCar) > 0) {

            $aSerFCar_R = array_values($aSerFCar);

            $aJson['SerFCar'] = $aSerFCar_R;

            if (is_array($aSerFCar)) {

                unset($aSerFCar);
                unset($aSerFCar_R);
            }
        }


/******************* Termina los calculos Forro de la Cartera ************/



/******************* Inicia los calculos de la Guarda ********************/

        // Guarda
        $Tipo_proceso_tmp2 = json_decode($_POST['aImpG'], true);
        $Tipo_proceso_tmp  = array_values($Tipo_proceso_tmp2);

        $num_rows = 0;
        $num_rows = count($Tipo_proceso_tmp2);

        $papel_corte_ancho = $aJson['Papel_Guarda']['calculadora']['corte_ancho'];
        $papel_corte_largo = $aJson['Papel_Guarda']['calculadora']['corte_largo'];


        $aOffG       = [];
        $aOff_maq_G  = [];
        $aDigG       = [];
        $aSerG       = [];

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


                $cortes_por_pliego = intval($aJson['Papel_Guarda']['corte']);
                $costo_unit_papel  = floatval($aJson['Papel_Guarda']["costo_unit_papel"]);

                $Tipo_impresion = $Tipo_proceso_tmp[$i]['Tipo_impresion'];


                $id_papel_guarda = intval($aJson['Papel_Guarda']['id_papel']);

                if ($Nombre_proceso == "Offset") {

                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $tipo_offset    = utf8_encode(trim(strval($tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    // merma offset
                    $es_maquila = $this->recMaquila($papel_corte_ancho, $papel_corte_largo);

                    $aMerma = self::calculoMermaOffset($tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_papel, $ventas_model);


                    if (!$es_maquila) {

                        if ($tipo_offset == "Seleccion") {

                            $offset_tiro = self::calculoOffset("Tiro", $id_papel_guarda, $tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }


                        if ($tipo_offset === "Pantone") {

                            $offset_tiro = self::calculoOffset("Tiro Pantone", $id_papel_guarda, $tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);
                        }

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset(Base del Cajon);";
                        }

                        $aOffG[$i] = $offset_tiro;

                        $aOffG[$i]["mermas"] = $aMerma;


                        if (is_array($aMerma)) {

                            unset($aMerma);
                        }
                    } else {        // si es maquila

                        $offset_tiro = self::calculo_offset_merma($tipo_offset, $nombre_tipo_offset, $tiraje, $num_tintas, $cortes_por_pliego, $ventas_model);

                        $offset_tiro_tmp = floatval($offset_tiro['costo_tot_proceso']);

                        if ($offset_tiro_tmp <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Offset Maquila(Empalme);";
                        }

                        $aOff_maq_G[$i] = $offset_tiro;

                        //$aOff_maq_G[$i]["mermas"] = $aMerma;
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

                        $aDigG[$i] = self::calculoDigital($tiraje, $nomb_tam_emp, $corte_ancho_proceso, $corte_largo_proceso, $ventas_model);

                        if ($aDigG[$i]['cabe_digital'] === "NO") {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . "Digital. No cabe con las medidas proporcionadas en Guarda;";
                        } elseif ($aDigG[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error .  "Digital. No existe costo en Guarda;";
                        }
                    } else {

                        $l_subtotal = false;
                        $l_costo    = false;

                        $aJson['mensaje'] = $mensaje;
                        $aJson['error']   = $aJson['error'] . $error .  "Digital. No cabe con las medidas proporcionadas en Guarda;";

                        $aDigG[$i]['cabe_digital']      = "NO";
                        $aDigG[$i]['cantidad']          = $tiraje;
                        $aDigG[$i]['corte_ancho_emp']   = $corte_ancho_proceso;
                        $aDigG[$i]['corte_largo_emp']   = $corte_largo_proceso;
                        $aDigG[$i]['imp_ancho']         = 0;
                        $aDigG[$i]['imp_largo']         = 0;
                        $aDigG[$i]["costo_unitario"]    = 0;
                        $aDigG[$i]["costo_tot_proceso"] = 0;

                        $aMerma_DigBCaj = [];

                        $aMerma_DigBCaj['merma_min']               = 0;
                        $aMerma_DigBCaj['merma_adic']              = 0;
                        $aMerma_DigBCaj['merma_tot']               = 0;
                        $aMerma_DigBCaj['cortes_por_pliego']       = 0;
                        $aMerma_DigBCaj['merma_tot_pliegos']       = 0;
                        $aMerma_DigBCaj['costo_unit_papel_merma']  = 0;
                        $aMerma_DigBCaj['costo_tot_pliegos_merma'] = 0;


                        $aDigG[$i]["mermas"] = $aMerma_DigBCaj;

                        if (is_array($aMerma_DigBCaj)) {

                            unset($aMerma_DigBCaj);
                        }
                    }
                }


                if ($Nombre_proceso === "Serigrafia") {

                    $tipo_offset    = $Tipo_proceso_tmp[$i]['tipo_offset'];
                    $tipo_offset    = utf8_encode(trim(strval($tipo_offset)));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cortes_pliego = intval($aJson['Papel_Guarda']['corte']);

                    $costo_unit_papel = floatval($aJson['Papel_Guarda']['costo_unit_papel']);


                    $aSerG[$i] = self::calculoSerigrafia($tiraje, $tipo_offset, $num_tintas, $ventas_model);

                    if ($aSerG[$i]['costo_tot_proceso'] <= 0) {

                            $aJson['mensaje'] = $mensaje;
                            $aJson['error']   = $aJson['error'] . $error . "Serigrafia(Guarda);";
                    }


                    $aSerG[$i]['mermas'] = self:: calculoMermaOffset($tiraje, $num_tintas, $cortes_pliego, $costo_unit_papel, $ventas_model);
                }
            }
        }


        if (count($aOffG) > 0 ) {

            $aOffG_R = array_values($aOffG);

            $aJson['OffG'] = $aOffG_R;

            if (is_array($aOffG)) {

                unset($aOffG);
                unset($aOffG_R);
            }
        }


        if (count($aOff_maq_G) > 0) {

            $aOff_maq_G_R = array_values($aOff_maq_G);

            $aJson['Off_maq_G'] = $aOff_maq_G_R;

            if (is_array($aOff_maq_G)) {

                unset($aOff_maq_G);
                unset($aOff_maq_G_R);
            }
        }


        if (count($aDigG) > 0) {

            $aDigG_R = array_values($aDigG);

            $aJson['DigG'] = $aDigG_R;

            if (is_array($aDigG)) {

                unset($aDigG);
                unset($aDigG_R);
            }
        }


        if (count($aSerG) > 0) {

            $aSerG_R = array_values($aSerG);

            $aJson['SerG'] = $aSerG_R;

            if (is_array($aSerG)) {

                unset($aSerG);
                unset($aSerG_R);
            }
        }


/****************** Termina los calculos de la Guarda ********************/




/********************** Inicia boton acabados ****************************/


/************************ Inicia Empalme *******************************/

    $aAcb = json_decode($_POST['aAcb'], true);

    $cuantos_aAcb = count($aAcb);

    $papel_corte_ancho = floatval($aJson['Papel_Empalme']['calculadora']['corte_ancho']);

    $papel_corte_largo = floatval($aJson['Papel_Empalme']['calculadora']['corte_largo']);

    $papel_costo_unit = floatval($aJson['Papel_Empalme']['costo_unit_papel']);

    $cortes = $aJson['Papel_Empalme']['corte'];


    $aAcbBUV   = [];
    $aAcbLaser = [];
    $aAcbGrab  = [];
    $aAcbHS    = [];
    $aAcbLam   = [];
    $aAcbSuaje = [];

    $aAcbMaq   = [];


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipoGrabado = utf8_encode(trim(strval($aAcb[$i]['tipoGrabado'])));

        $tipo_acabado = utf8_encode(trim(strval($aAcb[$i]['Tipo_acabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = 0;
            $LargoBarniz = 0;

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
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Empalme);";
            }

            $aAcbBUV[$i] = $barniz_tmp;

            $aAcbBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }
        }

        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcb[$i]['LargoLaser']);
            $Ancho = intval($aAcb[$i]['AnchoLaser']);


            $costo_laser_tmp = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            if ($costo_laser_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Empalme);";
            }


            $aAcbLaser[$i] = $costo_laser_tmp;


            if (is_array($costo_laser_tmp)) {

                unset($costo_laser_tmp);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcb[$i]['Largo'];
            $AnchoGrab     = $aAcb[$i]['Ancho'];
            $ubicacionGrab = $aAcb[$i]['ubicacion'];

            $papel_seccion = intval($aJson['Papel_Empalme']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_Empalme']['costo_unit_papel']);


            $grabado_temp = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            if ($grabado_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Empalme);";
            }

            $aAcbGrab[$i] = $grabado_temp;


            if (is_array($grabado_temp)) {

                unset($grabado_temp);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcb[$i]['LargoHS']);
            $AnchoHS = intval($aAcb[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcb[$i]['ColorHS'])));

            $papel_seccion = intval($aJson['Papel_Empalme']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_Empalme']['costo_unit_papel']);


            $grabado_HS_temp = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);


            if ($grabado_HS_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Empalme);";
            }

            $aAcbHS[$i] = $grabado_HS_temp;


            if (is_array($grabado_HS_temp)) {

                unset($grabado_HS_temp);
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['Papel_Empalme']['largo_papel']);
            $AnchoLam = floatval($aJson['Papel_Empalme']['ancho_papel']);

            $papel_costo_unit = $aJson['Papel_Empalme']['costo_unit_papel'];

            $cortes = intval($aJson['Papel_Empalme']['corte']);

            $Laminado_tmp = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            if ($Laminado_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Empalme);";
            }

            $aAcbLam[$i] = $Laminado_tmp;

            if (count($Laminado_tmp) > 0) {

                unset($Laminado_tmp);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcb[$i]['LargoSuaje']);
            $Ancho = floatval($aAcb[$i]['AnchoSuaje']);

            $papel_costo_unit = floatval($aJson['Papel_Empalme']['costo_unit_papel']);

            $cortes = intval($aJson['Papel_Empalme']['corte']);

            $aAcbSuaje_tmp = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            if ($aAcbSuaje_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Empalme);";
            }

            $aAcbSuaje[$i] = $aAcbSuaje_tmp;

            if (count($aAcbSuaje_tmp) > 0) {

                unset($aAcbSuaje_tmp);
            }
        }
    }


    if (count($aAcbBUV) > 0) {

        $aAcbBUV_R = array_values($aAcbBUV);

        $aJson['Barniz_UV'] = $aAcbBUV_R;

        if (is_array($aAcbBUV)) {

            unset($aAcbBUV);
            unset($aAcbBUV_R);
        }
    }


    if (count($aAcbLaser) > 0) {

        $aAcbLaser_R = array_values($aAcbLaser);

        $aJson['Laser'] = $aAcbLaser_R;

        if (is_array($aAcbLaser)) {

            unset($aAcbLaser);
            unset($aAcbLaser_R);
        }
    }


    if (count($aAcbGrab) > 0) {

        $aAcbGrab_R = array_values($aAcbGrab);

        $aJson['Grabado'] = $aAcbGrab_R;

        if (is_array($aAcbGrab)) {

            unset($aAcbGrab);
            unset($aAcbGrab_R);
        }
    }


    if (count($aAcbHS) > 0) {

        $aAcbHS_R = array_values($aAcbHS);

        $aJson['HotStamping'] = $aAcbHS_R;


        if (is_array($aAcbHS)) {

            unset($aAcbHS);
            unset($aAcbHS_R);
        }
    }


    if (count($aAcbLam) > 0) {

        $aAcbLam_R = array_values($aAcbLam);

        $aJson['Laminado'] = $aAcbLam_R;

        if (is_array($aAcbLam)) {

            unset($aAcbLam);
            unset($aAcbLam_R);
        }
    }


    if (count($aAcbSuaje) > 0) {

        $aAcbSuaje_R = array_values($aAcbSuaje);

        $aJson['Suaje'] = $aAcbSuaje_R;

        if (is_array($aAcbSuaje)) {

            unset($aAcbSuaje);
            unset($aAcbSuaje_R);
        }
    }


/************************ Termina Empalme ******************************/



/************************* Inicia Forro del Cajon **********************/


    $aAcbFCaj = json_decode($_POST['aAcbFCaj'], true);

    $cuantos_aAcbFCaj = count($aAcbFCaj);

    $aAcbFcajBUV   = [];
    $aAcbFcajLaser = [];
    $aAcbFcajGrab  = [];
    $aAcbFcajHS    = [];
    $aAcbFcajLam   = [];
    $aAcbFcajSuaje = [];

    $aAcbFcajMaq   = [];


    for ($i = 0; $i < $cuantos_aAcbFCaj; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbFCaj[$i]['Tipo_acabado'])));

        $tipoGrabado = utf8_encode(trim(strval($aAcbFCaj[$i]['tipoGrabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = 0;
            $LargoBarniz = 0;

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $LargoBarniz = floatval($aAcbFCaj[$i]['Largo']);

                $AnchoBarniz = floatval($aAcbFCaj[$i]['Ancho']);
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

            $merma_cortes = intval($aJson['Papel_FCaj']['corte']);


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


            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro del Cajon);";
            }

            $aAcbFcajBUV[$i] = $barniz_tmp;

            $aAcbFcajBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }
        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFCaj[$i]['LargoLaser']);
            $Ancho = intval($aAcbFCaj[$i]['AnchoLaser']);


            $costo_laser_tmp = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            if ($costo_laser_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro del Cajon);";
            }


            $aAcbFcajLaser[$i] = $costo_laser_tmp;


            if (is_array($costo_laser_tmp)) {

                unset($costo_laser_tmp);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbFCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbFCaj[$i]['ubicacion'];

            $papel_seccion = intval($aJson['Papel_FCaj']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_FCaj']['costo_unit_papel']);


            $grabado_temp = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            if ($grabado_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro del Cajon);";
            }

            $aAcbFcajGrab[$i] = $grabado_temp;


            if (is_array($grabado_temp)) {

                unset($grabado_temp);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFCaj[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFCaj[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFCaj[$i]['ColorHS'])));

            $papel_seccion = intval($aJson['Papel_FCaj']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_FCaj']['costo_unit_papel']);


            $grabado_HS_temp = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);


            if ($grabado_HS_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro del Cajon);";
            }

            $aAcbFcajHS[$i] = $grabado_HS_temp;


            if (is_array($grabado_HS_temp)) {

                unset($grabado_HS_temp);
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['Papel_FCaj']['largo_papel']);
            $AnchoLam = floatval($aJson['Papel_FCaj']['ancho_papel']);

            $papel_costo_unit = $aJson['Papel_FCaj']['costo_unit_papel'];

            $cortes = intval($aJson['Papel_FCaj']['corte']);

            $Laminado_tmp = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            if ($Laminado_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro del Cajon);";
            }

            $aAcbFcajLam[$i] = $Laminado_tmp;

            if (count($Laminado_tmp) > 0) {

                unset($Laminado_tmp);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFCaj[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFCaj[$i]['AnchoSuaje']);

            $papel_costo_unit = floatval($aJson['Papel_FCaj']['costo_unit_papel']);

            $cortes = intval($aJson['Papel_FCaj']['corte']);

            $aAcbSuaje_tmp = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            if ($aAcbSuaje_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro del Cajon);";
            }

            $aAcbFcajSuaje[$i] = $aAcbSuaje_tmp;

            if (count($aAcbSuaje_tmp) > 0) {

                unset($aAcbSuaje_tmp);
            }
        }
    }


    if (count($aAcbFcajBUV) > 0) {

        $aAcbFcajBUV_R = array_values($aAcbFcajBUV);

        $aJson['BarnizFcaj'] = $aAcbFcajBUV_R;

        if (is_array($aAcbFcajBUV)) {

            unset($aAcbFcajBUV);
            unset($aAcbFcajBUV_R);
        }
    }


    if (count($aAcbFcajLaser) > 0) {

        $aAcbFcajLaser_R = array_values($aAcbFcajLaser);

        $aJson['LaserFcaj'] = $aAcbFcajLaser_R;

        if (is_array($aAcbFcajLaser)) {

            unset($aAcbFcajLaser);
            unset($aAcbFcajLaser_R);
        }
    }


    if (count($aAcbFcajGrab) > 0) {

        $aAcbFcajGrab_R = array_values($aAcbFcajGrab);

        $aJson['GrabadoFcaj'] = $aAcbFcajGrab_R;


        if (is_array($aAcbFcajGrab)) {

            unset($aAcbFcajGrab);
            unset($aAcbFcajGrab_R);
        }
    }


    if (count($aAcbFcajHS) > 0) {

        $aAcbFcajHS_R = array_values($aAcbFcajHS);

        $aJson['HotStampingFcaj'] = $aAcbFcajHS_R;


        if (is_array($aAcbFcajHS)) {

            unset($aAcbFcajHS);
            unset($aAcbFcajHS_R);
        }
    }


    if (count($aAcbFcajLam) > 0) {

        $aAcbFcajLam_R = array_values($aAcbFcajLam);

        $aJson['LaminadoFcaj'] = $aAcbFcajLam_R;

        if (is_array($aAcbFcajLam)) {

            unset($aAcbFcajLam);
            unset($aAcbFcajLam_R);
        }
    }


    if (count($aAcbFcajSuaje) > 0) {

        $aAcbFcajSuaje_R = array_values($aAcbFcajSuaje);

        $aJson['SuajeFcaj'] = $aAcbFcajSuaje_R;


        if (is_array($aAcbFcajSuaje)) {

            unset($aAcbFcajSuaje);
            unset($aAcbFcajSuaje_R);
        }
    }


/************************* Termina Forro del Cajon *********************/



/************************* Inicia Forro de la Cartera ******************/


    $aAcbFCar = json_decode($_POST['aAcbFCar'], true);

    $cuantos_aAcbFCar = count($aAcbFCar);


    $aAcbFcarBUV   = [];
    $aAcbFcarLaser = [];
    $aAcbFcarGrab  = [];
    $aAcbFcarHS    = [];
    $aAcbFcarLam   = [];
    $aAcbFcarSuaje = [];

    $aAcbFcarMaq   = [];


    for ($i = 0; $i < $cuantos_aAcbFCar; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbFCar[$i]['Tipo_acabado'])));

        $tipoGrabado = utf8_encode(trim(strval($aAcbFCar[$i]['tipoGrabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = 0;
            $LargoBarniz = 0;

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $LargoBarniz = floatval($aAcbFCar[$i]['Largo']);

                $AnchoBarniz = floatval($aAcbFCar[$i]['Ancho']);
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

            $merma_cortes = intval($aJson['Papel_FCar']['corte']);


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


            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Forro de la Cartera);";
            }

            $aAcbFcarBUV[$i] = $barniz_tmp;

            $aAcbFcarBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }
        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbFCar[$i]['LargoLaser']);
            $Ancho = intval($aAcbFCar[$i]['AnchoLaser']);


            $costo_laser_tmp = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            if ($costo_laser_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Forro de la Cartera);";
            }


            $aAcbFcarLaser[$i] = $costo_laser_tmp;


            if (is_array($costo_laser_tmp)) {

                unset($costo_laser_tmp);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbFCar[$i]['Largo'];
            $AnchoGrab     = $aAcbFCar[$i]['Ancho'];
            $ubicacionGrab = $aAcbFCar[$i]['ubicacion'];

            $papel_seccion = intval($aJson['Papel_FCar']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_FCar']['costo_unit_papel']);


            $grabado_temp = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            if ($grabado_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Forro de la Cartera);";
            }

            $aAcbFcarGrab[$i] = $grabado_temp;


            if (is_array($grabado_temp)) {

                unset($grabado_temp);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFCar[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFCar[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbFCar[$i]['ColorHS'])));

            $papel_seccion = intval($aJson['Papel_FCar']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_FCar']['costo_unit_papel']);


            $grabado_HS_temp = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);


            if ($grabado_HS_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Forro de la Cartera);";
            }

            $aAcbFcarHS[$i] = $grabado_HS_temp;


            if (is_array($grabado_HS_temp)) {

                unset($grabado_HS_temp);
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['Papel_FCar']['largo_papel']);
            $AnchoLam = floatval($aJson['Papel_FCar']['ancho_papel']);

            $papel_costo_unit = $aJson['Papel_FCar']['costo_unit_papel'];

            $cortes = intval($aJson['Papel_FCar']['corte']);

            $Laminado_tmp = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            if ($Laminado_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Forro de la Cartera);";
            }

            $aAcbFcarLam[$i] = $Laminado_tmp;

            if (count($Laminado_tmp) > 0) {

                unset($Laminado_tmp);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbFCar[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFCar[$i]['AnchoSuaje']);

            $papel_costo_unit = floatval($aJson['Papel_FCar']['costo_unit_papel']);

            $cortes = intval($aJson['Papel_FCar']['corte']);

            $aAcbSuaje_tmp = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            if ($aAcbSuaje_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Forro de la Cartera);";
            }

            $aAcbFcarSuaje[$i] = $aAcbSuaje_tmp;

            if (count($aAcbSuaje_tmp) > 0) {

                unset($aAcbSuaje_tmp);
            }
        }
    }


    if (count($aAcbFcarBUV) > 0) {

        $aAcbFcarBUV_R = array_values($aAcbFcarBUV);

        $aJson['BarnizFcar'] = $aAcbFcarBUV_R;

        if (is_array($aAcbFcarBUV)) {

            unset($aAcbFcarBUV);
            unset($aAcbFcarBUV_R);
        }
    }


    if (count($aAcbFcarLaser) > 0) {

        $aAcbFcarLaser_R = array_values($aAcbFcarLaser);

        $aJson['LaserFcar'] = $aAcbFcarLaser_R;

        if (is_array($aAcbFcarLaser)) {

            unset($aAcbFcarLaser);
            unset($aAcbFcarLaser_R);
        }
    }


    if (count($aAcbFcarLam) > 0) {

        $aAcbFcarLam_R = array_values($aAcbFcarLam);

        $aJson['LaminadoFcar'] = $aAcbFcarLam_R;


        if (is_array($aAcbFcarLam)) {

            unset($aAcbFcarLam);
            unset($aAcbFcarLam_R);
        }
    }


    if (count($aAcbFcarGrab) > 0) {

        $aAcbFcarGrab_R = array_values($aAcbFcarGrab);

        $aJson['GrabadoFcar'] = $aAcbFcarGrab_R;

        if (is_array($aAcbFcarGrab)) {

            unset($aAcbFcarGrab);
            unset($aAcbFcarGrab_R);
        }
    }


    if (count($aAcbFcarHS) > 0) {

        $aAcbFcarHS_R = array_values($aAcbFcarHS);

        $aJson['HotStampingFcar'] = $aAcbFcarHS_R;


        if (is_array($aAcbFcarHS)) {

            unset($aAcbFcarHS);
            unset($aAcbFcarHS_R);
        }
    }


    if (count($aAcbFcarSuaje) > 0) {

        $aAcbFcarSuaje_R = array_values($aAcbFcarSuaje);

        $aJson['SuajeFcar'] = $aAcbFcarSuaje_R;

        if (is_array($aAcbFcarSuaje)) {

            unset($aAcbFcarSuaje);
            unset($aAcbFcarSuaje_R);
        }
    }


/************************* Termina Forro de la Cartera *****************/



/*************************** Inicia Guarda *****************************/



    $aAcbG = json_decode($_POST['aAcbG'], true);

    $cuantos_aAcbG = count($aAcbG);

    $aAcbGBUV   = [];
    $aAcbGLaser = [];
    $aAcbGGrab  = [];
    $aAcbGHS    = [];
    $aAcbGLam   = [];
    $aAcbGSuaje = [];

    $aAcbGMaq   = [];

    for ($i = 0; $i < $cuantos_aAcbG; $i++) {

        $tipo_acabado = utf8_encode(trim(strval($aAcbG[$i]['Tipo_acabado'])));

        $tipoGrabado = utf8_encode(trim(strval($aAcbG[$i]['tipoGrabado'])));


        if ($tipo_acabado == "Barniz UV") {

            $AnchoBarniz = 0;
            $LargoBarniz = 0;

            if ($tipoGrabado == "Registro Mate" or $tipoGrabado == "Registro Brillante") {

                $LargoBarniz = floatval($aAcbG[$i]['Largo']);

                $AnchoBarniz = floatval($aAcbG[$i]['Ancho']);
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

            $merma_cortes = intval($aJson['Papel_Guarda']['corte']);


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


            if ($barniz_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Barniz UV (Guarda);";
            }

            $aAcbGBUV[$i] = $barniz_tmp;

            $aAcbGBUV[$i]['mermas'] = $aMerma_BUV;

            if (is_array($barniz_tmp)) {

                unset($barniz_tmp);
            }

            if (is_array($aMerma_BUV)) {

                unset($aMerma_BUV);
            }
        }


        if ($tipo_acabado == "Corte Laser") {

            $Largo = intval($aAcbG[$i]['LargoLaser']);
            $Ancho = intval($aAcbG[$i]['AnchoLaser']);


            $costo_laser_tmp = self::calculoLaser($tipoGrabado, $tiraje, $Ancho, $Largo, $ventas_model);

            if ($costo_laser_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Corte Laser (Guarda);";
            }


            $aAcbGLaser[$i] = $costo_laser_tmp;


            if (is_array($costo_laser_tmp)) {

                unset($costo_laser_tmp);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $LargoGrab     = $aAcbG[$i]['Largo'];
            $AnchoGrab     = $aAcbG[$i]['Ancho'];
            $ubicacionGrab = $aAcbG[$i]['ubicacion'];

            $papel_seccion = intval($aJson['Papel_Guarda']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_Guarda']['costo_unit_papel']);


            $grabado_temp = self::calculoGrabado($tipoGrabado, $tiraje, $AnchoGrab, $LargoGrab, $ubicacionGrab, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);

            if ($grabado_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Grabado (Guarda);";
            }

            $aAcbGGrab[$i] = $grabado_temp;


            if (is_array($grabado_temp)) {

                unset($grabado_temp);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbG[$i]['LargoHS']);
            $AnchoHS = intval($aAcbG[$i]['AnchoHS']);
            $ColorHS = utf8_encode(trim(strval($aAcbG[$i]['ColorHS'])));

            $papel_seccion = intval($aJson['Papel_Guarda']['corte']);
            $papel_costo_unit_tmp = floatval($aJson['Papel_Guarda']['costo_unit_papel']);


            $grabado_HS_temp = self::calculoHotStamping($tipoGrabado, $tiraje, $AnchoHS, $LargoHS, $ColorHS, $papel_seccion, $papel_costo_unit_tmp, $ventas_model);


            if ($grabado_HS_temp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "HotStamping (Guarda);";
            }

            $aAcbGHS[$i] = $grabado_HS_temp;


            if (is_array($grabado_HS_temp)) {

                unset($grabado_HS_temp);
            }
        }


        if ($tipo_acabado == "Laminado") {

            $LargoLam = floatval($aJson['Papel_Guarda']['largo_papel']);
            $AnchoLam = floatval($aJson['Papel_Guarda']['ancho_papel']);

            $papel_costo_unit = $aJson['Papel_Guarda']['costo_unit_papel'];

            $cortes = intval($aJson['Papel_Guarda']['corte']);

            $Laminado_tmp = self::calculoLaminado($tipoGrabado, $tiraje, $AnchoLam, $LargoLam, $papel_costo_unit, $cortes, $ventas_model);

            if ($Laminado_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Laminado (Guarda);";
            }

            $aAcbGLam[$i] = $Laminado_tmp;

            if (count($Laminado_tmp) > 0) {

                unset($Laminado_tmp);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $Largo = floatval($aAcbG[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbG[$i]['AnchoSuaje']);

            $papel_costo_unit = floatval($aJson['Papel_Guarda']['costo_unit_papel']);

            $cortes = intval($aJson['Papel_Guarda']['corte']);

            $aAcbSuaje_tmp = self::calculoSuaje($tipoGrabado, $tiraje, $Largo, $Ancho, $papel_costo_unit, $cortes, $ventas_model);

            if ($aAcbSuaje_tmp['costo_tot_proceso'] <= 0) {

                $aJson['mensaje'] = $mensaje;
                $aJson['error']   = $aJson['error'] . $error . "Suaje (Guarda);";
            }

            $aAcbGSuaje[$i] = $aAcbSuaje_tmp;

            if (count($aAcbSuaje_tmp) > 0) {

                unset($aAcbSuaje_tmp);
            }
        }
    }


    if (count($aAcbGBUV) > 0) {

        $aAcbGBUV_R = array_values($aAcbGBUV);

        $aJson['BarnizG'] = $aAcbGBUV_R;

        if (is_array($aAcbGBUV)) {

            unset($aAcbGBUV);
            unset($aAcbGBUV_R);
        }
    }


    if (count($aAcbGLaser) > 0) {

        $aAcbGLaser_R = array_values($aAcbGLaser);

        $aJson['LaserG'] = $aAcbGLaser_R;

        if (is_array($aAcbGLaser)) {

            unset($aAcbGLaser);
            unset($aAcbGLaser_R);
        }
    }


    if (count($aAcbGGrab) > 0) {

        $aAcbGGrab_R = array_values($aAcbGGrab);

        $aJson['GrabadoG'] = $aAcbGGrab_R;


        if (is_array($aAcbGGrab)) {

            unset($aAcbGGrab);
            unset($aAcbGGrab_R);
        }
    }


    if (count($aAcbGHS) > 0) {

        $aAcbGHS_R = array_values($aAcbGHS);

        $aJson['HotStampingG'] = $aAcbGHS_R;


        if (is_array($aAcbGHS)) {

            unset($aAcbGHS);
            unset($aAcbGHS_R);
        }
    }


    if (count($aAcbGLam) > 0) {

        $aAcbGLam_R = array_values($aAcbGLam);

        $aJson['LaminadoG'] = $aAcbGLam_R;


        if (is_array($aAcbGLam)) {

            unset($aAcbGLam);
            unset($aAcbGLam_R);
        }
    }


    if (count($aAcbGSuaje) > 0) {

        $aAcbGSuaje_R = array_values($aAcbGSuaje);

        $aJson['SuajeG'] = $aAcbGSuaje_R;

        if (is_array($aAcbGSuaje)) {

            unset($aAcbGSuaje);
            unset($aAcbGSuaje_R);
        }
    }


/*************************** Termina Guarda ****************************/



/**************************** Termina boton acabados *******************/


/*************************** Inicia Cierres *****************************/


    if (isset($_POST["aCierres"]) and !empty($_POST["aCierres"])) {

        $aCierres_tmp = json_decode($_POST['aCierres'], true);

        $cuantos_aCierres_tmp = count($aCierres_tmp);


        $aCierres = [];


        $cierre_tiraje = intval($_POST['qty']);

        for ($i = 0; $i < $cuantos_aCierres_tmp; $i++) {

            $Tipo_cierre = "";
            $Tipo_cierre = utf8_encode(trim(strval($aCierres_tmp[$i]['Tipo_cierre'])));


            $aCierres[$i]['Tipo_cierre'] = $Tipo_cierre;
            $aCierres[$i]['tiraje']      = $cierre_tiraje;

            $numpares = 0;
            $largo    = null;
            $ancho    = null;
            $tipo     = null;
            $color    = null;

            $costo_cierre = 0;

            $numpares = $aCierres_tmp[$i]['numpares'];
            $numpares = intval($numpares);


            switch ($Tipo_cierre) {
                case 'Iman':

                    $largo = $aCierres_tmp[$i]['largo'];
                    $ancho = $aCierres_tmp[$i]['ancho'];

                    $costo_cierres_tmp = $ventas_model->costo_cierres("Iman");


                    $costo_unit_cierre = 0;

                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }

                    if ($costo_unit_cierre <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = round(floatval($cierre_tiraje * $numpares * $costo_unit_cierre), $num_dec2);

                    break;
                case 'Liston':

                    $largo = $aCierres_tmp[$i]['largo'];
                    $ancho = $aCierres_tmp[$i]['ancho'];
                    $tipo  = $aCierres_tmp[$i]['tipo'];
                    $color = $aCierres_tmp[$i]['color'];


                    $costo_cierres_tmp = $ventas_model->costo_cierres("Liston");


                    $costo_unit_cierre = 0;

                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }

                    if ($costo_unit_cierre <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = round(floatval($cierre_tiraje * $numpares * $costo_unit_cierre), $num_dec2);

                    break;
                case 'Marialuisa':

                    $costo_cierres_tmp = $ventas_model->costo_cierres("Marialuisa");


                    $costo_unit_cierre = 0;

                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }

                    if ($costo_unit_cierre <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = round(floatval($cierre_tiraje * $numpares * $costo_unit_cierre), $num_dec2);

                    break;
                case 'Suaje calado':

                    $largo = intval($aCierres_tmp[$i]['largo']);
                    $ancho = intval($aCierres_tmp[$i]['ancho']);
                    $tipo  = utf8_encode(trim(strval($aCierres_tmp[$i]['tipo'])));


                    $costo_cierres_tmp = $ventas_model->costo_cierres("Suaje calado");


                    $costo_unit_cierre = 0;

                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }

                    if ($costo_unit_cierre <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = round(floatval($cierre_tiraje * $numpares * $costo_unit_cierre), $num_dec2);

                    break;
                case 'Velcro':

                    $costo_cierres_tmp = $ventas_model->costo_cierres("Velcro");


                    $costo_unit_cierre = 0;

                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }

                    if ($costo_unit_cierre <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = round(floatval($cierre_tiraje * $numpares * $costo_unit_cierre), $num_dec2);

                    break;
            }


            $aCierres[$i]['numpares'] = intval($numpares);


            if ($largo != null) {

                $aCierres[$i]['largo'] = intval($largo);
            } else {

                $aCierres[$i]['largo'] = null;
            }


            if ($ancho != null) {

                $aCierres[$i]['ancho'] = intval($ancho);
            } else {

                $aCierres[$i]['ancho'] = null;
            }


            if ($tipo != null) {

                $aCierres[$i]['tipo'] = utf8_encode(trim(strval($tipo)));
            } else {

                $aCierres[$i]['tipo'] = null;
            }


            if ($color != null) {

                $aCierres[$i]['color'] = utf8_encode(trim(strval($color)));
            } else {

                $aCierres[$i]['color'] = null;
            }


            $aCierres[$i]['costo_unitario'] = $costo_unit_cierre;

            $aCierres[$i]['costo_cierre'] = $costo_cierre;

        }


        if (count($aCierres) > 0) {

            $aJson['Cierres'] = $aCierres;

            if (is_array($aCierres)) {

                unset($aCierres);
            }
        }
    }


/************************** Termina Cierres *****************************/



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

            $accesorio_tiraje = intval($_POST['qty']);

            switch ($Tipo_accesorio) {
                case 'Herraje':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Herraje");

                    break;
                case 'Ojillos':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Ojillos");

                    break;
                case 'Resorte':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Resorte");

                    break;
                case 'Lengueta de Liston':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Lengueta de Liston");

                    break;
            }

            $costo_unit_accesorio = 0;

            foreach ($costo_accesorios_tmp as $row) {

                $costo_unit_accesorio = $row['costo_unitario'];
                $costo_unit_accesorio = floatval($costo_unit_accesorio);
            }


            if ($costo_unit_accesorio <= 0) {

                $l_subtotal = false;
                $l_costo    = false;
            }


            if (is_array($costo_accesorios_tmp)) {

                unset($costo_accesorios_tmp);
            }


            $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);
            $costo_accesorio = round($costo_accesorio, 2);


            $aAccesorios[$i]['Tipo_accesorio']       = $Tipo_accesorio;
            $aAccesorios[$i]['Tipo']                 = $Tipo;
            $aAccesorios[$i]['tiraje']               = $accesorio_tiraje;
            $aAccesorios[$i]['Largo']                = $Largo;
            $aAccesorios[$i]['Ancho']                = $Ancho;
            $aAccesorios[$i]['Color']                = $Color;
            $aAccesorios[$i]['costo_unit_accesorio'] = $costo_unit_accesorio;
            $aAccesorios[$i]['costo_accesorios']     = $costo_accesorio;
        }


        if (count($aAccesorios) > 0) {

            $aJson['Accesorios'] = $aAccesorios;

            if (is_array($aAccesorios)) {

                unset($aAccesorios);
            }
        }
    }


/************************* Inicia Bancos ********************************/


    if (isset($_POST["aBancos"]) and !empty($_POST["aBancos"])) {

        $aBancos_tmp = json_decode($_POST['aBancos'], true);

        $aBancos_R   = array_values($aBancos_tmp);

        $cuantos_aBancos_tmp = count($aBancos_tmp);


        $aBancos = [];


        $cierre_tiraje = intval($_POST['qty']);

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

            $banco_tiraje = intval($_POST['qty']);

            switch ($Tipo_banco) {
                case 'Carton':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));


                    $costo_bancos_tmp = $ventas_model->costo_bancos("Carton");


                    $costo_unit_banco = 0;

                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }

                    if ($costo_unit_banco <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }

                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);
                    $costo_banco = round($costo_banco, 2);


                    break;
                case 'Eva':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));


                    $costo_bancos_tmp = $ventas_model->costo_bancos("Eva");


                    $costo_unit_banco = 0;

                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }

                    if ($costo_unit_banco <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }

                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);
                    $costo_banco = round($costo_banco, 2);

                    break;
                case 'Espuma':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));

                    $costo_bancos_tmp = $ventas_model->costo_bancos("Espuma");


                    $costo_unit_banco = 0;

                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }

                    if ($costo_unit_banco <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);
                    $costo_banco = round($costo_banco, 2);

                    break;
                case 'Empalme Banco':

                    $suaje = utf8_encode(trim(strval($aBancos_R[$i]['Suaje'])));

                    $costo_bancos_tmp = $ventas_model->costo_bancos("Empalme Banco");


                    $costo_unit_banco = 0;

                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }

                    if ($costo_unit_banco <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);
                    $costo_banco = round($costo_banco, 2);

                    break;
                case 'Cartulina Suajada':

                    $suaje = "SI";

                    $costo_bancos_tmp = $ventas_model->costo_bancos("Cartulina Suajada");


                    $costo_unit_banco = 0;

                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }

                    if ($costo_unit_banco <= 0) {

                        $l_subtotal = false;
                        $l_costo    = false;
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);
                    $costo_banco = round($costo_banco, 2);

                    break;
            }


            $aBancos[$i]['Tipo_banco']       = $Tipo_banco;
            $aBancos[$i]['tiraje']           = $banco_tiraje;
            $aBancos[$i]['largo']            = $largo;
            $aBancos[$i]['ancho']            = $ancho;
            $aBancos[$i]['profundidad']      = $profundidad;
            $aBancos[$i]['Suaje']            = $suaje;
            $aBancos[$i]['costo_unit_banco'] = $costo_unit_banco;
            $aBancos[$i]['costo_bancos']     = $costo_banco;
        }


        if (count($aBancos) > 0) {

            $aJson['Bancos'] = $aBancos;

            if (is_array($aBancos)) {

                unset($aBancos);
            }
        }
    }


/************************ Termina Bancos ********************************/




/********************* Termina Accesorios *****************************/


        // $aJson['mermas'] = $aMerma;

        $aJson_tmp = $aJson;


        $costo_papeles = round($costo_papeles, 2);

        $costo_cartones = $aCartonCajon['tot_costo'] + $aCartonCartera['tot_costo'];


        $costos_fijos = $aJson['elab_car']['forro_car'] + $aJson['elab_guarda']['guarda'] + $aJson['ranurado']['costo_tot_ranurado'] + $aJson['ranurado_Fcar']['costo_por_ranura'] + $aJson['encuadernacion']['despunte_de_esquinas_para_cajon'] + $aJson['encuadernacion_Fcaj']['forrado_de_cajon'];


        $costo_off_emp_tmp     = self::suma_costo_procesos($aJson_tmp, 'OffEmp');
        $costo_maq_off_emp_tmp = self::suma_costo_procesos($aJson_tmp, 'Off_maq_Emp');
        $costo_dig_emp_tmp     = self::suma_costo_procesos($aJson_tmp, 'DigEmp');
        $costo_ser_emp_tmp     = self::suma_costo_procesos($aJson_tmp, 'SerEmp');


        $costo_off_fcaj_tmp     = self::suma_costo_procesos($aJson_tmp, 'OffFCaj');
        $costo_maq_off_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'Off_maq_FCaj');
        $costo_dig_fcaj_tmp     = self::suma_costo_procesos($aJson_tmp, 'DigFCaj');
        $costo_ser_fcaj_tmp     = self::suma_costo_procesos($aJson_tmp, 'SerFCaj');


        $costo_off_fcar_tmp     = self::suma_costo_procesos($aJson_tmp, 'OffFCar');
        $costo_maq_off_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'Off_maq_FCar');
        $costo_dig_fcar_tmp     = self::suma_costo_procesos($aJson_tmp, 'DigFCar');
        $costo_ser_fcar_tmp     = self::suma_costo_procesos($aJson_tmp, 'SerFCar');


        $costo_off_g_tmp = self::suma_costo_procesos($aJson_tmp, 'OffG');
        $costo_dig_g_tmp = self::suma_costo_procesos($aJson_tmp, 'DigG');
        $costo_ser_g_tmp = self::suma_costo_procesos($aJson_tmp, 'SerG');


        $costo_impresiones = $costo_off_emp_tmp + $costo_maq_off_emp_tmp
                        + $costo_dig_emp_tmp + $costo_ser_emp_tmp
                        + $costo_off_fcaj_tmp + $costo_maq_off_fcaj_tmp
                        + $costo_dig_fcaj_tmp + $costo_ser_fcaj_tmp
                        + $costo_off_fcar_tmp + $costo_maq_off_fcar_tmp
                        + $costo_dig_fcar_tmp + $costo_ser_fcar_tmp
                        + $costo_off_g_tmp
                        + $costo_dig_g_tmp
                        + $costo_ser_g_tmp;


        // suma de costos de Acabados Empalme
        $costo_lam_emp_tmp      = self::suma_costo_procesos($aJson_tmp, 'Laminado');
        $costo_hs_emp_tmp       = self::suma_costo_procesos($aJson_tmp, 'HotStamping');
        $costo_grab_emp_tmp     = self::suma_costo_procesos($aJson_tmp, 'Grabado');
        $costo_suaje_emp_tmp    = self::suma_costo_procesos($aJson_tmp, 'Suaje');
        $costo_BarnizUV_emp_tmp = self::suma_costo_procesos($aJson_tmp, 'Barniz_UV');
        $costo_laser_emp_tmp    = self::suma_costo_procesos($aJson_tmp, 'Laser');


        $costo_lam_fcaj_tmp   = self::suma_costo_procesos($aJson_tmp, 'LaminadoFcaj');
        $costo_hs_fcaj_tmp    = self::suma_costo_procesos($aJson_tmp, 'HotStampingFcaj');
        $costo_grab_fcaj_tmp  = self::suma_costo_procesos($aJson_tmp, 'GrabadoFcaj');
        $costo_suaje_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'SuajeFcaj');
        $costo_laser_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'LaserFcaj');
        $costo_buv_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'BarnizFcaj');


        $costo_lam_fcar_tmp   = self::suma_costo_procesos($aJson_tmp, 'LaminadoFcar');
        $costo_hs_fcar_tmp    = self::suma_costo_procesos($aJson_tmp, 'HotStampingFcar');
        $costo_grab_fcar_tmp  = self::suma_costo_procesos($aJson_tmp, 'GrabadoFcar');
        $costo_suaje_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'SuajeFcar');
        $costo_laser_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'LaserFcar');
        $costo_buv_fcar_tmp   = self::suma_costo_procesos($aJson_tmp, 'BarnizFcar');


        $costo_lam_g_tmp   = self::suma_costo_procesos($aJson_tmp, 'LaminadoG');
        $costo_hs_g_tmp    = self::suma_costo_procesos($aJson_tmp, 'HotStampingG');
        $costo_grab_g_tmp  = self::suma_costo_procesos($aJson_tmp, 'GrabadoG');
        $costo_suaje_g_tmp = self::suma_costo_procesos($aJson_tmp, 'SuajeG');
        $costo_laser_g_tmp = self::suma_costo_procesos($aJson_tmp, 'LaserG');
        $costo_buv_g_tmp   = self::suma_costo_procesos($aJson_tmp, 'BarnizG');



        $costo_acabados = $costo_lam_emp_tmp + $costo_hs_emp_tmp + $costo_grab_emp_tmp + $costo_suaje_emp_tmp + $costo_lam_fcaj_tmp + $costo_hs_fcaj_tmp + $costo_grab_fcaj_tmp + $costo_suaje_fcaj_tmp + $costo_lam_fcar_tmp + $costo_hs_fcar_tmp + $costo_grab_fcar_tmp + $costo_suaje_fcar_tmp + $costo_lam_g_tmp + $costo_hs_g_tmp + $costo_grab_g_tmp + $costo_suaje_g_tmp + $costo_laser_emp_tmp + $costo_laser_fcaj_tmp + $costo_laser_fcar_tmp + $costo_laser_g_tmp + $costo_BarnizUV_emp_tmp + $costo_buv_fcaj_tmp + $costo_buv_fcar_tmp + $costo_buv_g_tmp;



        $costo_cierres    = self::suma_costo_cierres($aJson_tmp, 'Cierres');
        $costo_bancos     = self::suma_costo_bancos($aJson_tmp, 'Bancos');
        $costo_accesorios = self::suma_costo_accesorios($aJson_tmp, 'Accesorios');


        if ($l_subtotal) {

            $subtotal = floatval($costo_papeles + $costo_cartones + $costos_fijos + $costo_impresiones + $costo_acabados + $costo_cierres + $costo_bancos + $costo_accesorios);

            $subtotal = round($subtotal, 2);
        } else {

            $subtotal = 0;

            $aJson['mensaje'] = "Error";
            $aJson['error'] = $aJson['error'] .  "Existe un costo unitario con cero pesos;";
        }


        $aJson['costo_subtotal'] = round($subtotal, 2);
        //$aJson['costo_odt']      = $subtotal;

        $aJson['costo_papeles']     = round(floatval($costo_papeles), 2);
        $aJson['costo_cartones']    = round(floatval($costo_cartones), 2);
        $aJson['costos_fijos']      = round(floatval($costos_fijos), 2);
        $aJson['costo_impresiones'] = round(floatval($costo_impresiones), 2);
        $aJson['costo_acabados']    = round(floatval($costo_acabados), 2);
        $aJson['costo_cierres']     = round(floatval($costo_cierres), 2);
        $aJson['costo_bancos']      = round(floatval($costo_bancos), 2);
        $aJson['costo_accesorios']  = round(floatval($costo_accesorios), 2);


        if (is_array($row)) {

            unset($row);
        }


        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }

        if (array_key_exists('OffEmp', $aJson)) {

            $OffsetEmpalme_tmp = $aJson['OffEmp'];
            $OffsetEmpalme_tmp_R = array_values($OffsetEmpalme_tmp);

            $OffsetEmp_tot_proceso = 0;

            $OffsetEmpalme_tmp_count = count($OffsetEmpalme_tmp);

            for ($i = 0; $i < $OffsetEmpalme_tmp_count; $i++) {

                $OffsetEmp_tot_proceso = $OffsetEmp_tot_proceso + floatval($OffsetEmpalme_tmp_R[$i]['costo_tot_proceso']);

                $OffsetEmp_tot_proceso = round($OffsetEmp_tot_proceso, 2);
            }


            //$subtotal = $subtotal + $OffsetEmp_tot_proceso;

            //$aJson['costo_subtotal'] = $subtotal;

            //$aJson['costo_odt'] = floatval($subtotal);
        }


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


        $subtotal = $subtotal + $empaque;


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

                    $subtotal = $costo_mensajeria;

                    break;
                }
            }
        }


        $aJson['mensajeria'] = round(floatval($costo_mensajeria), 2);


        $costo_papeles =
             $aJson['Papel_Empalme']['tot_costo']
           + $aJson['Papel_FCaj']['tot_costo']
           + $aJson['Papel_FCar']['tot_costo']
           + $aJson['Papel_Guarda']['tot_costo']
           + $aJson['CartonCaj']['tot_costo']
           + $aJson['CartonCar']['tot_costo'];


        $costo_cartones = $aJson['CartonCaj']['tot_costo']
           + $aJson['CartonCar']['tot_costo'];


        $costos_fijos =
              $aJson['elab_car']['forro_car']
            + $aJson['elab_guarda']['guarda']
            + $aJson['ranurado']['costo_tot_ranurado']
            + $aJson['ranurado_Fcar']['costo_por_ranura']
            + $aJson['encuadernacion']['despunte_de_esquinas_para_cajon']
            + $aJson['encuadernacion_Fcaj']['costo_tot_proceso'];


        $aJson['costo_papeles']  = round(floatval($costo_papeles), 2);
        $aJson['costo_cartones'] = round(strval($costo_cartones), 2);
        $aJson['costos_fijos']   = round(strval($costos_fijos), 2);


        $costo_subtotal = $costo_subtotal + $costo_papeles + $costo_cartones + $costos_fijos;

        $aJson['costo_subtotal'] = round($costo_subtotal, 2);



/************************* costos impresiones ***********************/


        $aJson['costo_impresiones'] = 0;


    // Empalme

        $sum_costo_offset_emp = 0;

        if (array_key_exists("OffEmp", $aJson)) {

            $Offset_emp_tmp = $aJson['OffEmp'];

            foreach ($Offset_emp_tmp as $row) {

                $sum_costo_offset_emp = $sum_costo_offset_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_offset_emp'] = $sum_costo_offset_emp;


        $sum_costo_dig_emp = 0;

        if (array_key_exists("DigEmp", $aJson)) {

            $Dig_emp_tmp = $aJson['DigEmp'];

            foreach ($Dig_emp_tmp as $row) {

                $sum_costo_dig_emp = $sum_costo_dig_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_digital_emp'] = $sum_costo_dig_emp;


        $sum_costo_ser_emp = 0;

        if (array_key_exists("SerEmp", $aJson)) {

            $Dig_emp_tmp = $aJson['SerEmp'];

            foreach ($Dig_emp_tmp as $row) {

                $sum_costo_ser_emp = $sum_costo_ser_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_serigrafia_emp'] = $sum_costo_ser_emp;


        $suma_costo_emp = $sum_costo_offset_emp
                        + $sum_costo_dig_emp
                        + $sum_costo_ser_emp;


        $aJson['costo_impresiones_emp'] = $suma_costo_emp;



    // Forro Cajon
        $sum_costo_offset_fcaj = 0;

        if (array_key_exists("OffFCaj", $aJson)) {

            $Offset_fcaj_tmp = $aJson['OffFCaj'];

            foreach ($Offset_fcaj_tmp as $row) {

                $sum_costo_offset_fcaj = $sum_costo_offset_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_offset_fcaj'] = $sum_costo_offset_fcaj;


        $sum_costo_dig_fcaj = 0;

        if (array_key_exists("DigFCaj", $aJson)) {

            $Dig_fcaj_tmp = $aJson['DigFCaj'];

            foreach ($Dig_fcaj_tmp as $row) {

                $sum_costo_dig_fcaj = $sum_costo_dig_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_digital_fcaj'] = $sum_costo_dig_fcaj;


        $sum_costo_ser_fcaj = 0;

        if (array_key_exists("SerFCaj", $aJson)) {

            $Ser_fcaj_tmp = $aJson['SerFCaj'];

            foreach ($Ser_fcaj_tmp as $row) {

                $sum_costo_ser_fcaj = $sum_costo_ser_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_serigrafia_fcaj'] = $sum_costo_ser_fcaj;


        $aJson['costo_impresiones_fcaj'] = $sum_costo_offset_fcaj
                                         + $sum_costo_dig_fcaj
                                         + $sum_costo_ser_fcaj;



    // Forro Cartera
        $sum_costo_offset_fcar = 0;

        if (array_key_exists("OffFCar", $aJson)) {

            $Offset_fcar_tmp = $aJson['OffFCar'];

            foreach ($Offset_fcar_tmp as $row) {

                $sum_costo_offset_fcar = $sum_costo_offset_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_offset_fcar'] = $sum_costo_offset_fcar;


        $sum_costo_dig_fcar = 0;

        if (array_key_exists("DigFCar", $aJson)) {

            $Dig_fcar_tmp = $aJson['DigFCar'];

            foreach ($Dig_fcar_tmp as $row) {

                $sum_costo_dig_fcar = $sum_costo_dig_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_digital_fcar'] = $sum_costo_dig_fcar;


        $sum_costo_ser_fcar = 0;

        if (array_key_exists("SerFCar", $aJson)) {

            $Ser_fcar_tmp = $aJson['SerFCar'];

            foreach ($Ser_fcar_tmp as $row) {

                $sum_costo_ser_fcar = $sum_costo_ser_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_serigrafia_fcar'] = $sum_costo_ser_fcar;


        $aJson['costo_impresiones_fcar'] = $sum_costo_offset_fcar
                                         + $sum_costo_dig_fcar
                                         + $sum_costo_ser_fcar;



    // Guarda
        $sum_costo_offset_g = 0;

        if (array_key_exists("OffG", $aJson)) {

            $Offset_g_tmp = $aJson['OffG'];

            foreach ($Offset_g_tmp as $row) {

                $sum_costo_offset_g = $sum_costo_offset_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_offset_g'] = $sum_costo_offset_g;


        $sum_costo_dig_g = 0;

        if (array_key_exists("DigG", $aJson)) {

            $G_fcar_tmp = $aJson['DigG'];

            foreach ($G_fcar_tmp as $row) {

                $sum_costo_dig_g = $sum_costo_dig_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_digital_g'] = $sum_costo_dig_g;


        $sum_costo_ser_g = 0;

        if (array_key_exists("SerG", $aJson)) {

            $Ser_g_tmp = $aJson['SerG'];

            foreach ($Ser_g_tmp as $row) {

                $sum_costo_ser_g = $sum_costo_ser_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_serigrafia_g'] = $sum_costo_ser_g;


        $aJson['costo_impresiones_g'] = $sum_costo_offset_g
                                      + $sum_costo_dig_g
                                      + $sum_costo_ser_g;


        $aJson['costo_impresiones'] = $aJson['costo_impresiones_emp']
                                    + $aJson['costo_impresiones_fcaj']
                                    + $aJson['costo_impresiones_fcar']
                                    + $aJson['costo_impresiones_g'];



    // Acabados

        // empalme
        $sum_costo_buv_emp = 0;

        if (array_key_exists("Barniz_UV", $aJson)) {

            $buv_emp_tmp = $aJson['Barniz_UV'];

            foreach ($buv_emp_tmp as $row) {

                $sum_costo_buv_emp = $sum_costo_buv_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_BUV_emp']  = $sum_costo_buv_emp;


        $sum_costo_laser_emp = 0;

        if (array_key_exists("Laser", $aJson)) {

            $laser_emp_tmp = $aJson['Laser'];

            foreach ($laser_emp_tmp as $row) {

                $sum_costo_laser_emp = $sum_costo_laser_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Laser_emp'] = $sum_costo_laser_emp;


        $sum_costo_grab_emp = 0;

        if (array_key_exists("Grabado", $aJson)) {

            $grab_emp_tmp = $aJson['Grabado'];

            foreach ($grab_emp_tmp as $row) {

                $sum_costo_grab_emp = $sum_costo_grab_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Grabado_emp'] = $sum_costo_grab_emp;



        $sum_costo_hs_emp = 0;

        if (array_key_exists("HotStamping", $aJson)) {

            $hs_emp_tmp = $aJson['HotStamping'];

            foreach ($hs_emp_tmp as $row) {

                $sum_costo_hs_emp = $sum_costo_hs_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_HS_emp'] = $sum_costo_hs_emp;



        $sum_costo_lam_emp = 0;

        if (array_key_exists("Laminado", $aJson)) {

            $lam_emp_tmp = $aJson['Laminado'];

            foreach ($lam_emp_tmp as $row) {

                $sum_costo_lam_emp = $sum_costo_lam_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Lam_emp'] = $sum_costo_lam_emp;


        $sum_costo_suaje_emp = 0;

        if (array_key_exists("Suaje", $aJson)) {

            $suaje_emp_tmp = $aJson['Suaje'];

            foreach ($suaje_emp_tmp as $row) {

                $sum_costo_suaje_emp = $sum_costo_suaje_emp + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Suaje_emp'] = $sum_costo_suaje_emp;



        $aJson['costo_acab_emp'] = round(floatval(
                                      $sum_costo_buv_emp
                                    + $sum_costo_laser_emp
                                    + $sum_costo_grab_emp
                                    + $sum_costo_hs_emp
                                    + $sum_costo_lam_emp
                                    + $sum_costo_suaje_emp
                                ), 2);



        // forro cajon

        $sum_costo_buv_fcaj = 0;

        if (array_key_exists("BarnizFcaj", $aJson)) {

            $buv_fcaj_tmp = $aJson['BarnizFcaj'];

            foreach ($buv_fcaj_tmp as $row) {

                $sum_costo_buv_fcaj = $sum_costo_buv_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_BUV_fcaj']  = $sum_costo_buv_fcaj;


        $sum_costo_laser_fcaj = 0;

        if (array_key_exists("LaserFcaj", $aJson)) {

            $laser_fcaj_tmp = $aJson['LaserFcaj'];

            foreach ($laser_fcaj_tmp as $row) {

                $sum_costo_laser_fcaj = $sum_costo_laser_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Laser_fcaj'] = $sum_costo_laser_fcaj;



        $sum_costo_grab_fcaj = 0;

        if (array_key_exists("GrabadoFcaj", $aJson)) {

            $grab_fcaj_tmp = $aJson['GrabadoFcaj'];

            foreach ($grab_fcaj_tmp as $row) {

                $sum_costo_grab_fcaj = $sum_costo_grab_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Grabado_fcaj'] = $sum_costo_grab_fcaj;



        $sum_costo_hs_fcaj = 0;

        if (array_key_exists("HotStampingFcaj", $aJson)) {

            $hs_fcaj_tmp = $aJson['HotStampingFcaj'];

            foreach ($hs_fcaj_tmp as $row) {

                $sum_costo_hs_fcaj = $sum_costo_hs_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_HS_fcaj'] = $sum_costo_hs_fcaj;



        $sum_costo_lam_fcaj = 0;

        if (array_key_exists("LaminadoFcaj", $aJson)) {

            $lam_fcaj_tmp = $aJson['LaminadoFcaj'];

            foreach ($lam_fcaj_tmp as $row) {

                $sum_costo_lam_fcaj = $sum_costo_lam_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Lam_fcaj'] = $sum_costo_lam_fcaj;


        $sum_costo_suaje_fcaj = 0;

        if (array_key_exists("SuajeFcaj", $aJson)) {

            $suaje_fcaj_tmp = $aJson['SuajeFcaj'];

            foreach ($suaje_fcaj_tmp as $row) {

                $sum_costo_suaje_fcaj = $sum_costo_suaje_fcaj + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Suaje_fcaj'] = $sum_costo_suaje_fcaj;


        $aJson['costo_acab_fcaj'] = round(floatval(
                                    $sum_costo_buv_fcaj
                                    + $sum_costo_laser_fcaj
                                    + $sum_costo_grab_fcaj
                                    + $sum_costo_hs_fcaj
                                    + $sum_costo_lam_fcaj
                                    + $sum_costo_suaje_fcaj
                                ), 2);


        // Acabado Forro Cartera
        $sum_costo_buv_fcar = 0;

        if (array_key_exists("BarnizFcar", $aJson)) {

            $buv_fcar_tmp = $aJson['BarnizFcar'];

            foreach ($buv_fcar_tmp as $row) {

                $sum_costo_buv_fcar = $sum_costo_buv_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_BUV_fcar']  = $sum_costo_buv_fcar;


        $sum_costo_laser_fcar = 0;

        if (array_key_exists("LaserFcar", $aJson)) {

            $laser_fcar_tmp = $aJson['LaserFcar'];

            foreach ($laser_fcar_tmp as $row) {

                $sum_costo_laser_fcar = $sum_costo_laser_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Laser_fcar'] = $sum_costo_laser_fcar;



        $sum_costo_grab_fcar = 0;

        if (array_key_exists("GrabadoFcar", $aJson)) {

            $grab_fcar_tmp = $aJson['GrabadoFcar'];

            foreach ($grab_fcar_tmp as $row) {

                $sum_costo_grab_fcar = $sum_costo_grab_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Grabado_fcar'] = $sum_costo_grab_fcar;



        $sum_costo_hs_fcar = 0;

        if (array_key_exists("HotStampingFcar", $aJson)) {

            $hs_fcar_tmp = $aJson['HotStampingFcar'];

            foreach ($hs_fcar_tmp as $row) {

                $sum_costo_hs_fcar = $sum_costo_hs_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_HS_fcar'] = $sum_costo_hs_fcar;



        $sum_costo_lam_fcar = 0;

        if (array_key_exists("LaminadoFcar", $aJson)) {

            $lam_fcar_tmp = $aJson['LaminadoFcar'];

            foreach ($lam_fcar_tmp as $row) {

                $sum_costo_lam_fcar = $sum_costo_lam_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Lam_fcar'] = $sum_costo_lam_fcar;



        $sum_costo_suaje_fcar = 0;

        if (array_key_exists("SuajeFcar", $aJson)) {

            $suaje_fcar_tmp = $aJson['SuajeFcar'];

            foreach ($suaje_fcar_tmp as $row) {

                $sum_costo_suaje_fcar = $sum_costo_suaje_fcar + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Suaje_fcar'] = $sum_costo_suaje_fcar;


        $aJson['costo_acab_fcar'] = round(floatval(
                                    $sum_costo_buv_fcar
                                    + $sum_costo_laser_fcar
                                    + $sum_costo_grab_fcar
                                    + $sum_costo_hs_fcar
                                    + $sum_costo_lam_fcar
                                    + $sum_costo_suaje_fcar
                                ), 2);



        // Acabados Guarda
        $sum_costo_buv_g = 0;


        if (array_key_exists("BarnizG", $aJson)) {

            $buv_g_tmp = $aJson['BarnizG'];

            foreach ($buv_g_tmp as $row) {

                $sum_costo_buv_g = $sum_costo_buv_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_BUV_g']  = $sum_costo_buv_g;


        $sum_costo_laser_g = 0;


        if (array_key_exists("LaserG", $aJson)) {

            $laser_g_tmp = $aJson['LaserG'];

            foreach ($laser_g_tmp as $row) {

                $sum_costo_laser_g = $sum_costo_laser_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Laser_g'] = $sum_costo_laser_g;


        $sum_costo_grab_g = 0;


        if (array_key_exists("GrabadoG", $aJson)) {

            $grab_g_tmp = $aJson['GrabadoG'];

            foreach ($grab_g_tmp as $row) {

                $sum_costo_grab_g = $sum_costo_grab_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Grabado_g'] = $sum_costo_grab_g;


        $sum_costo_hs_g = 0;


        if (array_key_exists("HotStampingG", $aJson)) {

            $hs_g_tmp = $aJson['HotStampingG'];

            foreach ($hs_g_tmp as $row) {

                $sum_costo_hs_g = $sum_costo_hs_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_HS_g'] = $sum_costo_hs_g;


        $sum_costo_lam_g = 0;


        if (array_key_exists("LaminadoG", $aJson)) {

            $lam_g_tmp = $aJson['LaminadoG'];

            foreach ($lam_g_tmp as $row) {

                $sum_costo_lam_g = $sum_costo_lam_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Lam_g'] = $sum_costo_lam_g;



        $sum_costo_suaje_g = 0;


        if (array_key_exists("SuajeG", $aJson)) {

            $suaje_g_tmp = $aJson['SuajeG'];

            foreach ($suaje_g_tmp as $row) {

                $sum_costo_suaje_g = $sum_costo_suaje_g + floatval($row['costo_tot_proceso']);
            }
        }

        $aJson['costo_Suaje_g'] = $sum_costo_suaje_g;


        $aJson['costo_acab_g'] = round(floatval(
                                    $sum_costo_buv_g
                                    + $sum_costo_laser_g
                                    + $sum_costo_grab_g
                                    + $sum_costo_hs_g
                                    + $sum_costo_lam_g
                                    + $sum_costo_suaje_g
                                ), 2);



    // Bancos
        $sum_costo_carton_ban = 0;

        if (array_key_exists("Bancos", $aJson)) {

            $carton_ban_tmp = $aJson['Bancos'];

            foreach ($carton_ban_tmp as $row) {

                $sum_costo_carton_ban = $sum_costo_carton_ban + floatval($row['costo_bancos']);
            }
        }


        $aJson['costo_bancos'] = round(strval($sum_costo_carton_ban), 2);



    // Cierres
        $sum_costo_cierres = 0;

        if (array_key_exists("Cierres", $aJson)) {

            $cierres_tmp = $aJson['Cierres'];

            foreach ($cierres_tmp as $row) {

                $sum_costo_cierres = $sum_costo_cierres + floatval($row['costo_cierre']);
            }
        }

        $aJson['costo_cierres'] = round(strval($sum_costo_cierres), 2);



    // Accesorios
        $sum_costo_accesorios = 0;

        if (array_key_exists("Accesorios", $aJson)) {

            $accesorios_tmp = $aJson['Accesorios'];

            foreach ($accesorios_tmp as $row) {

                $sum_costo_accesorios = $sum_costo_accesorios + floatval($row['costo_accesorios']);
            }
        }


        $aJson['costo_accesorios'] = round(strval($sum_costo_accesorios), 2);



    // sumas por secciones

        $aJson['costo_emp']  = $aJson['costo_impresiones_emp'];
        $aJson['costo_fcaj'] = $aJson['costo_impresiones_fcaj'];
        $aJson['costo_fcar'] = $aJson['costo_impresiones_fcar'];
        $aJson['costo_g']    = $aJson['costo_impresiones_g'];


        $costo_subtotal = $costo_subtotal
                        + $aJson['costo_impresiones']
                        + $aJson['costo_acabados']
                        + $aJson['costo_bancos']
                        + $aJson['costo_cierres']
                        + $aJson['costo_accesorios'];

        $subtotal = $costo_subtotal;


        $aJson['costo_subtotal'] = round($costo_subtotal, 2);



/************************ subtotal ******************************/



        $db_tmp = $ventas_model->costos_descuentos("Utilidad");

        $utilidad_pctje = 0;

        foreach($db_tmp as $row) {

            $utilidad_pctje = $row['porcentaje'];
            $utilidad_pctje = floatval($utilidad_pctje);
            $utilidad_pctje = round($utilidad_pctje, 2);
        }


        $utilidad = 0;

        $utilidad = floatval($subtotal * $utilidad_pctje);
        $utilidad = round($utilidad, 2);

        $aJson['Utilidad'] = $utilidad;


        $db_tmp = $ventas_model->costos_descuentos("IVA");

        $iva_pctje = 0;

        foreach($db_tmp as $row) {

            $iva_pctje = $row['porcentaje'];
            $iva_pctje = floatval($iva_pctje);
            $iva_pctje = round($iva_pctje, 2);
        }

        $iva = 0;

        $iva = floatval($subtotal * $iva_pctje);
        $iva = round($iva, 2);

        $aJson['iva'] = $iva;


        $db_tmp = $ventas_model->costos_descuentos("Comisiones");

        $comisiones_pctje = 0;

        foreach($db_tmp as $row) {

            $comisiones_pctje = $row['porcentaje'];
            $comisiones_pctje = floatval($comisiones_pctje);
            $comisiones_pctje = round($comisiones_pctje, 2);
        }

        $comisiones = 0;

        $comisiones = floatval($subtotal * $comisiones_pctje);
        $comisiones = round($comisiones, 2);

        $aJson['comisiones'] = $comisiones;


        $db_tmp = $ventas_model->costos_descuentos("Indirecto");

        $indirecto_pctje = 0;

        foreach($db_tmp as $row) {

            $indirecto_pctje = $row['porcentaje'];
            $indirecto_pctje = floatval($indirecto_pctje);
            $indirecto_pctje = round($indirecto_pctje, 2);
        }

        $indirecto = 0;

        $indirecto = floatval($subtotal * $indirecto_pctje);
        $indirecto = round($indirecto, 2);

        $aJson['indirecto'] = $indirecto;


        $db_tmp = $ventas_model->costos_descuentos("Venta");

        $venta_pctje = 0;

        foreach($db_tmp as $row) {

            $venta_pctje = $row['porcentaje'];
            $venta_pctje = floatval($venta_pctje);
            $venta_pctje = round($venta_pctje, 2);
        }

        $venta = 0;

        $venta = floatval($subtotal * $venta_pctje);
        $venta = round($venta, 2);

        $aJson['ventas'] = $venta;


        // ISR
        $db_tmp = $ventas_model->costos_descuentos("ISR");

        $isr = 0;

        foreach($db_tmp as $row) {

            $isr_pctje = $row['porcentaje'];
            $isr_pctje = floatval($isr_pctje);
            $isr_pctje = round($isr_pctje, 2);
        }

        $isr = 0;

        $isr = floatval($subtotal * $isr_pctje);
        $isr = round($isr, 2);

        $aJson['ISR'] = $isr;



        // descuento porcentaje
        $descuento_pctje = floatval($_POST['descuento_pctje']);

        $descuento = 0;

        $descuento = floatval($subtotal * ($descuento_pctje / 100));

        $descuento = round($descuento, 2);

        $aJson['descuento'] = $descuento;


        $costo_odt_total = floatval($costo_odt_total + $subtotal + $utilidad + $iva + $comisiones + $indirecto + $venta - $descuento + $empaque + $isr);

        $costo_odt_total = round($costo_odt_total, 2);

        $aJson['costo_odt'] = $costo_odt_total;


        $aKeys = array_keys($aJson);

        $aKeys = str_replace('\"', "", $aKeys);

        $aJson['keys'] = $aKeys;


        $cuantos_procesos = count($aJson['keys']);

        $keys = json_encode($aJson['keys']);

        $pos_proceso = strpos($keys, "encuadernacion_Fcaj");

        $longitud = strlen("encuadernacion_Fcaj");

        $procesos_ok = substr($keys, $pos_proceso + $longitud + 2);
        $procesos_ok = str_replace("]", "", $procesos_ok);

        $aProcesos_ok = explode(',', $procesos_ok);
        $aProcesos_ok = str_replace('\"', "", $aProcesos_ok);

        $long_procesos_ok = strlssen($procesos_ok);

        $cuantos_procesos_ok = count($aProcesos_ok);


        $aProcesos_ok = str_replace('"', "", $aProcesos_ok);
        $aProcesos_ok = str_replace('"', "", $aProcesos_ok);

        $aJson['keys'] = $aProcesos_ok;


/******************************************/
/******************************************/


/******************************************/


        $debuger  = false;
        $post     = false;
        $grabar   = true;
        $saved    = false;

        $respuesta = false;


        $id_modelo = intval($aJson['modelo']);         // Almeja

        if ($grabar and $_POST['grabar'] == "SI") {

            $respuesta = $ventas_model->insertCaja_Almeja($aJson, $id_modelo);

            echo json_encode($respuesta);
        } else {

            if ($post) {

                echo PHP_EOL . PHP_EOL . "(6541) post: ";
                print_r($_POST);
            }

            if ($debuger) {

                echo PHP_EOL . "(6547) aJson: ";
                print_r($aJson);

            } else {

                self::encode($aJson);
            }
        }
    }


/****************** Termina la funcion saveCaja() **********************/


    public function calcMerma() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $qty = $_POST['cant'];
            $qty = intval($qty);

            $row1 = [];

            $row1 = $ventas_model->getCotizaMermaOffset();
            $row2 = $ventas_model->getCotizaMermaDigital();
            $row3 = $ventas_model->getCotizaMermaSerigrafia();
            $row4 = $ventas_model->getCotizaMermaHotStamping();
            $row5 = $ventas_model->getCotizaMermaLaminado();
            $row6 = $ventas_model->getCotizaMermaBarniz();
            $row7 = $ventas_model->getCotizaMermaSuaje();
            $row8 = $ventas_model->getCotizaMermaForrado();
            $row9 = $ventas_model->getCotizaMermaGrabado();


            $row_all = [];

            $row_all[0] = $row1;
            $row_all[1] = $row2;
            $row_all[]  = $row3;
            $row_all[]  = $row4;
            $row_all[]  = $row5;
            $row_all[]  = $row6;
            $row_all[]  = $row7;
            $row_all[]  = $row8;
            $row_all[]  = $row9;

            echo json_encode($row_all);
        }
    }


    protected function deltax_merma($cant, $algo) {

        $cant_red1 = 0;
        $cant_red2 = 0;
        $delta     = 0;
        $alfa      = 0;

        $cant = intval($cant);
        $algo = intval($algo);

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



    protected function rec_maquila_digital($corte_ancho, $corte_largo, $impresion) {

        $impresion = trim(strval($impresion));

        // tamaño carta digital
        $imp_ancho_dig = 20.5;
        $imp_largo_dig = 27;

        // tamaño doble carta digital
        $t_2carta_ancho = 32;
        $t_2carta_largo = 46.5;


        $tam2 = 0;

        if ($impresion === "TC") {

            if (($corte_ancho <= $imp_ancho_dig) and ($corte_largo <= $imp_largo_dig)) {

                $tam2 = 1;       // tamaño carta
            }
        }

        if  ($impresion === "T2C") {

            if (($corte_ancho <= $t_2carta_ancho) and ($corte_largo <= $t_2carta_largo)) {

                $tam2 = 1;        // tamaño doble carta
            }
        }

        return $tam2;
    }


    // Redondea al entero superior siguiente
    protected function deltax($cant, $algo) {

        $cant_red1 = 0;
        $cant_red2 = 0;
        $delta     = 0;
        $alfa      = 0;

        $cant = intval($cant);
        $algo = intval($algo);

        if ($algo > 0) {

            $cant_red1 = ($cant / $algo);
            $cant_red2 = intval($cant / $algo);
        }

        $delta = $cant_red1 - $cant_red2;

        if($delta > 0) {

            $alfa = $cant_red2 + 1;
        } else {

            $alfa = $cant_red2;
        }

        return $alfa;
    }


    public function calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional) {

        $tiraje = intval($_POST['qty']);

        $merma_acabados = [];

        if ($tiraje < $cantidad_minima) {

            $cantidad_min  = intval($cantidad);
            $cantidad_adic = 0;
            $cantidad_tot  = intval($cantidad);
        } else {

            $cantidad_min  = intval($cantidad);

            $delta_tmp = intval($tiraje - $cantidad_minima);

            $delta = self:: deltax_merma($delta_tmp, $por_cada_x);

            $cantidad_adic = intval($delta * $adicional);
            $cantidad_tot  = intval($cantidad) + $cantidad_adic;
        }

        $merma_acabados[0] = $cantidad_min;
        $merma_acabados[1] = $cantidad_adic;
        $merma_acabados[2] = $cantidad_tot;

        return $merma_acabados;
    }


    protected function suma_costo_procesos($aJson_tmp, $nomb_proceso) {

        $costo_proc_tmp = 0;

        if (array_key_exists($nomb_proceso, $aJson_tmp)) {

            $nomb_proceso_tmp = array_values($aJson_tmp[$nomb_proceso]);

            for ($k = 0; $k < count($nomb_proceso_tmp); $k++) {

                $costo_tot_proceso = $nomb_proceso_tmp[$k]['costo_tot_proceso'];
                $costo_tot_proceso = floatval($costo_tot_proceso);

                $costo_proc_tmp = $costo_proc_tmp + $costo_tot_proceso;
            }
        }

        return $costo_proc_tmp;
    }


    protected function suma_costo_cierres($aJson_tmp, $nomb_proceso) {

        $nombre_proceso = trim(strval($nomb_proceso));

        $costo_proc_tmp = 0;

        if (array_key_exists($nombre_proceso, $aJson_tmp)) {

            $nomb_proceso_tmp = array_values($aJson_tmp[$nombre_proceso]);

            for ($k = 0; $k < count($nomb_proceso_tmp); $k++) {

                $costo_tot_proceso = floatval($nomb_proceso_tmp[$k]['costo_cierre']);

                $costo_proc_tmp = $costo_proc_tmp + $costo_tot_proceso;
            }
        }

        return $costo_proc_tmp;
    }


    protected function suma_costo_bancos($aJson_tmp, $nomb_proceso) {

        $nombre_proceso = trim(strval($nomb_proceso));

        $costo_proc_tmp = 0;
        if (array_key_exists($nombre_proceso, $aJson_tmp)) {

            $nomb_proceso_tmp = array_values($aJson_tmp[$nombre_proceso]);

            for ($k = 0; $k < count($nomb_proceso_tmp); $k++) {

                $costo_tot_proceso = floatval($nomb_proceso_tmp[$k]['costo_bancos']);

                $costo_proc_tmp = $costo_proc_tmp + $costo_tot_proceso;
            }
        }

        return $costo_proc_tmp;
    }



    protected function suma_costo_accesorios($aJson_tmp, $nomb_proceso) {

        $nombre_proceso = trim(strval($nomb_proceso));

        $costo_proc_tmp = 0;
        if (array_key_exists($nombre_proceso, $aJson_tmp)) {

            $nomb_proceso_tmp = array_values($aJson_tmp[$nombre_proceso]);

            for ($k = 0; $k < count($nomb_proceso_tmp); $k++) {

                $costo_tot_proceso = floatval($nomb_proceso_tmp[$k]['costo_accesorios']);

                $costo_proc_tmp = $costo_proc_tmp + $costo_tot_proceso;
            }
        }

        return $costo_proc_tmp;
    }


    public function getAllForms($model, $options_model) {

        $html = '';
        $i    = 1;

        $options = $options_model->getOptionsByModel($model);

        foreach ($options as $option) {

            $even   = ($i & 1)? 'even':'';
            $html   .= '<div class="cajas-input-group ' . $even . '">';
            $html   .= '<div class="cajas-col-input left"><span>' . $option['nombre'] . ': </span></div>';
            $html   .= '<div class="cajas-col-input right">';
            $values = $options_model->getValuesByOption($option['id_variante']);

            switch ($option['tipo_opcion']) {

                case 'text':

                    foreach ($values as $value) {

                        $html .= '<input type="text" step="any" required placeholder="cm" class="cajas-input" name="' . $option['name'] . '">';
                    }

                    break;
                case 'number':

                    foreach ($values as $value) {

                        $html .= '<input type="number" step="any" required placeholder="cm" class="cajas-input" name="' . $option['name'] . '">';
                    }

                    break;
                case 'radio':

                    foreach ($values as $value) {

                        $html .= '<input type="radio" id="' . $value['id_valor'] . '" required  name="' . $option['name'] . '" value="' . $value['valor'] . '" ><label for="' . $value['id_valor'] . '" >' . $value['valor'] . ' </label>';
                    }

                    break;
                case 'select':

                    $html .= '<select class="cajas-input" name="' . $option['name'] . '" >';
                    $html .= '<option selected disabled>Elige una opcion</option>';

                    foreach ($values as $value) {

                        $html .= '<option value="' . $value['valor'] . '">' . $value['valor'] . '</option>';
                    }

                    $html .= '</select>';

                    break;
            }

            $html .= '</div></div>';

            $i++;
        }

        $html .= '<input class="cajas-form-submitter" type="submit" value="CALCULAR">';


        if ($model == '1') {

            return $html;
        } else {

            return "<p style='font-weight:bold;padding:30px;'>En desarrollo</p>";
        }
    }


    public function newOption() {

        $options_model = $this->loadModel('OptionsModel');

        $saved = $options_model->addNewOption($_POST);

        if ($saved) {

            echo "Datos guardados";
        } else {

            echo "Error al grabar los datos.";
        }
    }


    public function clientes() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $title ='Pendientes';
            $rows  = $ventas_model->getClients();

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/clientes.php';
            require 'application/views/templates/footer.php';

        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function deleteCotizacion() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $ventas_model = $this->loadModel('VentasModel');

        if ( isset($_POST['id']) ) {

            $eliminacion = $ventas_model->deleteCotizacion();

            if( $eliminacion ) {

                echo "true";

                return true;
            } else {

                echo "false";

                return false;
            }
        } else {

            return false;
        }
    }

    public function deleteCliente(){

        if (!isset($_SESSION)) {

            session_start();
        }

        $ventas_model = $this->loadModel('VentasModel');

        if ( isset($_POST['id']) ) {

            $eliminacion = $ventas_model->deleteCliente($_POST['id']);

            if( $eliminacion ) {

                $respuesta = true;
            }else{

                $respuesta = false;
            }
        } else {

            $respuesta = false;
        }

        echo json_encode($respuesta);
    }


    public function getcotizacionAll() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        $cotizaciones = $ventas_model->getCotizaciones();

        echo json_encode($cotizaciones);
    }


    public function guardadas() {

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


    public function nuevo_cliente() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/cliente_form.php';

        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function newCliente(){

        if (!isset($_SESSION)) {

            session_start();
        }

        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $registro  = $ventas_model->addNewCliente();

            if ( $registro ) {

                $response = true;
            } else {

                $response = false;
            }
        }

        echo json_encode($response);
    }

    public function modificar_cliente() {

        if (!isset($_SESSION)) {

            session_start();
        }

        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');


        if($login->isLoged()) {

            if( $_GET['idCliente'] ){

                $id = $_GET['idCliente'];
                $datos = $ventas_model->getClientById($id);

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/cotizador/mod_cliente_form.php';
                require 'application/views/cotizador/footer.php';
            }else{

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'cotizador/clientes/"';
            echo '</script>';
                //header("Location:" . URL."cotizador/clientes");
            }


        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function updateCliente(){

        if (!isset($_SESSION)) {

            session_start();
        }

        $ventas_model = $this->loadModel('VentasModel');

        $update  = $ventas_model->updateCliente();

        if ( $update ) {

            $response = true;
        } else {

            $response = false;
        }
        echo json_encode($response);
    }


    public function checkClient(){

        if (!isset($_SESSION)) {

            session_start();
        }

        $ventas_model = $this->loadModel('VentasModel');
        $nombre       = trim(strval($_POST['nombre']));
        $check        = $ventas_model->checkClient($nombre);
        $response     = false;

        if ( $check ) {

            $response = true;
        }
        echo json_encode($response);
    }


    public function getOptions() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');

        if($login->isLoged()) {

            $process = $_POST['process'];
            $html    = '';
            $i       = 1;
            $options = $options_model->getOptionsByProcess($process);

            foreach ($options as $option) {

                if ($option['tipo']=='parent') {

                    $childs = $options_model->getOptionChilds($option['id_opcion']);

                    foreach ($childs as $child) {

                        if ($child['tipo'] == 'parent') {

                            $grand_childs = $options_model->getOptionGrandChilds($child['id_pvariante']);

                            $html .= '<p>' . $child['texto'] . '</p>';

                            foreach ($grand_childs as $key => $grand_child) {

                                switch ($grand_child['tipo']) {

                                    case 'text':

                                        $html .= '<input type="text" step="any" required placeholder="cm" class="cajas-input" name="' . $grand_child['html_name'] . '">';

                                        break;
                                    case 'number':

                                        $html .= '<input type="number" step="any" required placeholder="cm" class="cajas-input" name="' . $grand_child['html_name'] . '">';

                                        break;
                                    case 'radio':

                                        $html .= '<input type="radio" id="' . $grand_child['id_hijo'] . '" required  name="' . $grand_child['html_name'] . '" value="' . $grand_child['value'] . '" ><label for="'.$grand_child['id_hijo'] . '" >' . $grand_child['texto'] . ' </label>';

                                        break;
                                }
                            }
                        } else {
                        }
                    }
                } else {

                    switch ($option['tipo_opcion']) {

                        case 'text':

                            foreach ($values as $value) {

                                $html .= '<input type="text" step="any" required placeholder="cm" class="cajas-input" name="' . $option['name'] . '">';
                            }

                            break;
                        case 'number':

                            foreach ($values as $value) {

                                $html .= '<input type="number" step="any" required placeholder="cm" class="cajas-input" name="' . $option['name'] . '">';
                            }

                            break;
                        case 'radio':

                            foreach ($values as $value) {

                                $html .= '<input type="radio" id="'.$value['id_valor'] . '" required name="' . $option['name'] . '" value="' . $value['valor'] . '" ><label for="' . $value['id_valor'] . '" >' . $value['valor'] . ' </label>';
                            }

                            break;
                        case 'select':

                            $html .= '<select class="cajas-input" name="' . $option['name'] . '" >';
                            $html .= '<option selected disabled>Elige una opcion</option>';

                            foreach ($values as $value) {

                                $html .= '<option value="' . $value['valor'] . '">' . $value['valor'] . '</option>';
                            }

                            $html .= '</select>';

                            break;
                    }
                }

                $i++;

                $html .= '<button class="tab-btn-sumbit" onclick="closeModal();">Listo</button>';

                echo $html;
            }

            $html .= '<input class="cajas-form-submitter" type="submit" value="CALCULAR">';
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function invitaciones() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $title = 'Pendientes';

            if (isset($_GET['c'])) {

                $cliente       = $_GET['c'];
                $invitations   = $options_model->getInvitations();
                $rows          = $options_model->getAumentos();
                $update        = false;
                $nombrecliente = $options_model->getClientInfo($_GET['c'],'nombre');

                //$nombrecliente =$options_model->getClientInfo($_GET['c'],'nombre') . ' ' . $options_model->getClientInfo($_GET['c'],'apellido');
            } else {

                $nombrecliente = '--';
            }

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/invitaciones.php';
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function detalles() {

        if (!isset($_SESSION)) {

            session_start();
        }


        $login         = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $title = 'Pendientes';

            if (isset($_GET['ct']) &&! empty($_GET['ct'])) {

                $cotizacion    = $options_model->getCotizacionById($_GET['ct']);
                $invitations   = $options_model->getInvitations();
                $rows          = $options_model->getAumentos();
                $update        = true;

                $nombrecliente = $options_model->getClientInfo($_GET['c'],'nombre');

                $cliente = $_GET['c'];

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/cotizador/invitaciones.php';
            } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'cotizador/clientes/"';
            echo '</script>';
                //header("Location:" . URL . 'cotizador/clientes');
            }
        } else {

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }
    }


    public function saveInvitation() {

        if (!isset($_SESSION)) {

            session_start();
        }

        error_reporting(0);


        $login         = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        $response = array();

        if($login->isLoged()) {

            $response['logged'] = 'true';

            $total      = $_POST['total'];
            $models     = $_POST['models'];
            $prices     = $_POST['prices'];
            $p_listas   = $_POST['p_listas'];
            $idps       = $_POST['id_prods'];
            $ex_amounts = $_POST['ex-increment'];

            $detalle = array();

            $ids = (isset($_POST['ids']))? $_POST['ids']:'false';

            foreach ($ids as $key => $id) {

                $model   = $models[$id];
                $price   = $total[$id];
                $q       = (empty($qty[$id]))? 100: $qty[$id];
                $idp     = $idps[$id];
                $plista  = $p_listas[$id];
                $cliente = $_POST['cliente'];

                $detalle[$id]['modelo']    = $models[$id];
                $detalle[$id]['cantidad']  = $q;
                $detalle[$id]['monto']     = $price;
                $detalle[$id]['id_modelo'] = $idp;

                if (isset($_POST['extra-'.$id])) {

                    foreach ($_POST['extra-' . $id] as $key => $extra) {

                        $detalle[$id]['aumentos'][$extra]['costo'] = $ex_amounts[$extra];
                        $detalle[$id]['aumentos'][$extra]['id_aumento'] = $extra;
                    }
                }
            }

            $contenido = json_encode($detalle);

            if ($_POST['case'] == 'insert') {

                $saved = $ventas_model->newCotizacion($model, $q, $price, $cliente, $idp, $plista, $contenido, 'invitacion');

                if ($saved) {

                    $_SESSION['messages']     .= 'La informacion se guardo correctamente.';
                    $_SESSION['notification'] = 'success';
                    $_SESSION['result']       = 'LISTO:';
                    $response['message']      = '<div class="c-successs"><div></div><span>Exito: </span>Datos guardados correctamente!</div>';
                    $response['success']      = 'true';
                } else {

                    $response['success'] = 'false';
                }
            } else {

                $updated = $ventas_model->updateCotizacion($model, $q, $price, $cliente, $idp, $plista, $contenido, 'invitacion', $_POST['id_cotizacion']);

                if ($updated) {

                    $_SESSION['messages']     .= 'La informacion se guardo correctamente.';
                    $_SESSION['notification'] = 'success';
                    $_SESSION['result']       = 'LISTO:';
                    $response['message']      = '<div class="c-successs"><div></div><span>Exito: </span>Datos guardados correctamente!</div>';
                    $response['success']      = 'true';
                } else {

                    $response['message'] = '<div class="c-fail"><div></div><span>Error: </span>Ocurrio un problema y no se guardo la informacion</div>';
                    $response['success'] = 'false';
                }
            }
        } else {

            $response['logged'] = 'false';

            echo '<script language="javascript">';
            echo 'window.location.href="' . URL . 'login/"';
            echo '</script>';
            //header("Location:" . URL . 'login/');
        }

        echo json_encode($response);
    }


    public function getCotizacion(){

        session_start();
        $login        = $this->loadController('login');
        $cotizacion   = $this->loadModel('CotizacionModel');
        $ventas_model = $this->loadModel('VentasModel');

        if( $login->isLoged() ) {

            $cotizaciones = $cotizacion->getCotizacion();
            $clientes     = $ventas_model->getClients();

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizaciones/lista_cotizaciones.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function newCotizacion(){

        session_start();

        $login         = $this->loadController('login');
        $options_model = $this->loadModel('optionsmodel');
        $ventas_model  = $this->loadModel('VentasModel');

        $idCliente  = $_GET['cliente'];
        $cliente    = $ventas_model->getClientById($idCliente);
        $porcentaje = $options_model->getPorcentajes();

        if( $login->isLoged() ) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizaciones/nueva_cotizacion.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function saveCotizacion(){

        $modeloCotizacion            = $this->loadModel('CotizacionModel');
        $upload                      = $modeloCotizacion->uploadCotizacion();
        $result                      = false;

        if( $upload ) $result        = true;

        echo json_encode($result);
    }


    public function modificar_cotizacion(){

        session_start();

        $login         = $this->loadController('login');
        $options_model = $this->loadModel('optionsmodel');
        $modeloCotizacion = $this->loadModel('CotizacionModel');

        $idCot  = intval($_GET['idCot']);

        $cotizacion = $modeloCotizacion->getCotizacionByID($idCot);

        $porcentaje = $options_model->getPorcentajes();

        if( $login->isLoged() ) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizaciones/modificar_cotizacion.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function updateCotizacion(){

        $modeloCotizacion            = $this->loadModel('CotizacionModel');
        $upload                      = $modeloCotizacion->updateCotizacion();
        $result                      = false;

        if( $upload ) $result        = true;

        echo json_encode($result);
    }

}
