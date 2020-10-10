<?php

class AlmejaModel extends Controller {

    function __construct($db) {

        try {

            $this->db = $db;
        } catch (PDOException $e) {

            exit('Ups! Error de conexion a la Base de Datos.');
        }
    }


    public function insertCaja_Almeja(&$aJson, $id_modelo) {

        $id_cliente     = 0;
        $nombre_cliente = "";
        $odt            = "";
        $tiraje         = 0;
        $base           = 0;
        $alto           = 0;
        $profundidad    = 0;
        $grosor_cajon   = 0;
        $grosor_cartera = 0;


        $fecha = TODAY;

        $d_fecha = date("Y-m-d", strtotime($fecha));
        $time    = date("H:i:s", time());


        $id_usuario = $aJson['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_tienda  = $aJson['id_tienda'];
        $id_tienda  = intval($id_tienda);

        $id_modelo = intval($id_modelo);

        $id_cliente = $aJson['id_cliente'];
        $id_cliente = intval($id_cliente);

        $id_tienda = $aJson['id_tienda'];
        $id_tienda = intval($id_tienda);


        $tiraje = intval($aJson['tiraje']);

        $nombre_cliente = $aJson['Nombre_cliente'];
        $nombre_cliente = strval($nombre_cliente);
        $nombre_cliente = trim($nombre_cliente);

        $odt    = $aJson['nomb_odt'];
        $odt    = trim(strval($odt));

        $base           = floatval($aJson['base']);
        $alto           = floatval($aJson['alto']);
        $profundidad    = floatval($aJson['profundidad']);
        $grosor_cajon   = floatval($_POST['grosor-cajon']);
        $grosor_cartera = floatval($_POST['grosor-cartera']);

        $id_grosor_cajon   = intval($aJson['CartonCaj']['id_papel']);
        $id_grosor_cartera = intval($aJson['CartonCar']['id_papel']);


        $costo_total_odt   = floatval($aJson['costo_odt']);
        $subtotal          = floatval($aJson['costo_subtotal']);
        $utilidad          = floatval($aJson['Utilidad']);
        $iva               = floatval($aJson['iva']);
        $ISR               = floatval($aJson['ISR']);
        $comisiones        = floatval($aJson['comisiones']);
        $indirecto         = floatval($aJson['indirecto']);
        $ventas            = floatval($aJson['ventas']);
        $descuento         = floatval($aJson['descuento']);
        $descuento_pctje   = floatval($aJson['descuento_pctje']);
        $empaque           = floatval($aJson['empaque']);
        $mensajeria        = floatval($aJson['mensajeria']);


    // calculos
        $aCalculos = $aJson['aCalculos'];

        // datos de la calculadora
        $h       = floatval($aCalculos['h']);
        $b       = floatval($aCalculos['b']);
        $p       = floatval($aCalculos['p']);
        $g       = floatval($aCalculos['g']);
        $g_may   = floatval($aCalculos['G']);
        $e       = floatval($aCalculos['e']);
        $e_may   = floatval($aCalculos['E']);
        $b1      = floatval($aCalculos['b1']);
        $h1      = floatval($aCalculos['h1']);
        $b11     = floatval($aCalculos['b11']);
        $h11     = floatval($aCalculos['h11']);
        $b_may   = floatval($aCalculos['B']);
        $h_may   = floatval($aCalculos['H']);
        $p_may   = floatval($aCalculos['P']);
        $y_may   = floatval($aCalculos['Y']);
        $b1_may  = floatval($aCalculos['B1']);
        $y1_may  = floatval($aCalculos['Y1']);
        $b11_may = floatval($aCalculos['B11']);
        $y11_may = floatval($aCalculos['Y11']);
        $p1      = floatval($aCalculos['p1']);
        $x       = floatval($aCalculos['x']);
        $y       = floatval($aCalculos['y']);
        $x1      = floatval($aCalculos['x1']);
        $y1      = floatval($aCalculos['y1']);
        $x11     = floatval($aCalculos['x11']);
        $y11     = floatval($aCalculos['y11']);
        $f       = floatval($aCalculos['f']);
        $k       = floatval($aCalculos['k']);


    // papeles
        $aPap_emp             = [];
        $aPap_fcaj            = [];
        $aPap_fcar            = [];
        $aPap_g               = [];
        $aCaj_Caj             = [];
        $aCar_Car             = [];
        $aElab_car            = [];
        $aElab_guarda         = [];
        $aRanurado            = [];
        $aRanurado_Fcar       = [];
        $aEncuadernacion      = [];
        $aEncuadernacion_Fcaj = [];



        $aPap_emp  = $aJson['Papel_Empalme'];
        $aPap_fcaj = $aJson['Papel_FCaj'];
        $aPap_fcar = $aJson['Papel_FCar'];
        $aPap_g    = $aJson['Papel_Guarda'];

        $aCar_Caj = $aJson['CartonCaj'];
        $aCar_Car = $aJson['CartonCar'];

        $aElab_car            = $aJson['elab_car'];
        $aElab_guarda         = $aJson['elab_guarda'];
        $aRanurado            = $aJson['ranurado'];
        $aRanurado_Fcar       = $aJson['ranurado_Fcar'];
        $aEncuadernacion      = $aJson['encuadernacion'];
        $aEncuadernacion_Fcaj = $aJson['encuadernacion_Fcaj'];


    // Empalme
        $id_papel_empalme            = intval($aPap_emp['id_papel']);
        $nombre_papel_emp            = utf8_decode(trim(strval($aPap_emp['nombre_papel'])));
        $ancho_papel_emp             = intval($aPap_emp['ancho_papel']);
        $largo_papel_emp             = intval($aPap_emp['largo_papel']);
        $costo_unit_papel_emp        = floatval($aPap_emp['costo_unit_papel']);
        $cortes_papel_emp            = intval($aPap_emp['corte']);
        $pliegos_papel_emp           = intval($aPap_emp['tot_pliegos']);
        $costo_tot_pliegos_papel_emp = floatval($aPap_emp['tot_costo']);
        $corte_ancho_papel_emp       = intval($aPap_emp['calculadora']['corte_ancho']);
        $corte_largo_papel_emp       = intval($aPap_emp['calculadora']['corte_largo']);


        unset($aPap_emp);



    // Forro del Cajon
        $id_papel_Fcajon       = intval($aPap_fcaj['id_papel']);
        $nombre_papel_fcaj     = utf8_decode(trim(strval($aPap_fcaj['nombre_papel'])));
        $ancho_papel_fcaj      = intval($aPap_fcaj['ancho_papel']);
        $largo_papel_fcaj      = intval($aPap_fcaj['largo_papel']);
        $costo_unit_papel_fcaj = floatval($aPap_fcaj['costo_unit_papel']);


        $cortes_papel_fcaj            = intval($aPap_fcaj['corte']);
        $pliegos_papel_fcaj           = intval($aPap_fcaj['tot_pliegos']);
        $costo_tot_pliegos_papel_fcaj = floatval($aPap_fcaj['tot_costo']);
        $corte_ancho_papel_fcaj       = intval($aPap_fcaj['calculadora']['corte_ancho']);
        $corte_largo_papel_fcaj       = intval($aPap_fcaj['calculadora']['corte_largo']);

        unset($aPap_fcaj);



    // forro de la cartera
        $id_papel_Fcartera     = intval($aPap_fcar['id_papel']);
        $nombre_papel_fcar     = utf8_decode(trim(strval($aPap_fcar['nombre_papel'])));
        $ancho_papel_fcar      = intval($aPap_fcar['ancho_papel']);
        $largo_papel_fcar      = intval($aPap_fcar['largo_papel']);
        $costo_unit_papel_fcar = floatval($aPap_fcar['costo_unit_papel']);


        $cortes_papel_fcar            = intval($aPap_fcar['corte']);
        $pliegos_papel_fcar           = intval($aPap_fcar['tot_pliegos']);
        $costo_tot_pliegos_papel_fcar = floatval($aPap_fcar['tot_costo']);
        $corte_ancho_papel_fcar       = intval($aPap_fcar['calculadora']['corte_ancho']);
        $corte_largo_papel_fcar       = intval($aPap_fcar['calculadora']['corte_largo']);

        unset($aPap_fcar);


    // Guarda
        $id_papel_guarda    = intval($aPap_g['id_papel']);
        $nombre_papel_g     = utf8_decode(trim(strval($aPap_g['nombre_papel'])));
        $ancho_papel_g      = intval($aPap_g['ancho_papel']);
        $largo_papel_g      = intval($aPap_g['largo_papel']);
        $costo_unit_papel_g = floatval($aPap_g['costo_unit_papel']);

        $cortes_papel_g            = intval($aPap_g['corte']);
        $pliegos_papel_g           = intval($aPap_g['tot_pliegos']);
        $costo_tot_pliegos_papel_g = floatval($aPap_g['tot_costo']);
        $corte_ancho_papel_g       = intval($aPap_g['calculadora']['corte_ancho']);
        $corte_largo_papel_g       = intval($aPap_g['calculadora']['corte_largo']);

        unset($aPap_g);



    // Carton Cajon
        $id_cajon                = intval($aCar_Caj['id_papel']);
        $cajon_nombre            = utf8_decode(trim(strval($aCar_Caj['nombre_papel'])));
        $id_num_cajon            = floatval($grosor_cajon);
        $cajon_papel             = utf8_decode(trim(strval($aCar_Caj['nombre_papel'])));
        $cajon_precio            = floatval($aCar_Caj['costo_unit_papel']);
        $cajon_ancho             = floatval($aCar_Caj['ancho_papel']);
        $cajon_largo             = floatval($aCar_Caj['largo_papel']);
        $cajon_corte_ancho       = floatval($aCar_Caj['calculadora']['corte_ancho']);
        $cajon_corte_largo       = floatval($aCar_Caj['calculadora']['corte_largo']);
        $cajon_piezas_por_pliego = intval($aCar_Caj['corte']);
        $cajon_num_pliegos       = intval($aCar_Caj['tot_pliegos']);
        $cajon_costo_tot_carton  = floatval($aCar_Caj['tot_costo']);

        unset($aCar_Caj);



    // Carton Cartera
        $id_carton_cartera                = intval($aCar_Car['id_papel']);
        $carton_cartera_nombre            = utf8_decode(trim(strval($aCar_Car['nombre_papel'])));
        $carton_id_num_cartera            = floatval($grosor_cartera);
        $carton_cartera_papel             = utf8_decode(trim(strval($aCar_Car['nombre_papel'])));
        $carton_cartera_precio            = floatval($aCar_Car['costo_unit_papel']);
        $carton_cartera_ancho             = floatval($aCar_Car['ancho_papel']);
        $carton_cartera_largo             = floatval($aCar_Car['largo_papel']);
        $carton_cartera_corte_ancho       = floatval($aCar_Car['calculadora']['corte_ancho']);
        $carton_cartera_corte_largo       = floatval($aCar_Car['calculadora']['corte_largo']);
        $carton_cartera_piezas_por_pliego = intval($aCar_Car['corte']);
        $carton_cartera_num_pliegos       = intval($aCar_Car['tot_pliegos']);
        $carton_cartera_costo_tot_carton  = floatval($aCar_Car['tot_costo']);


        unset($aCar_Car);


    // elab_car
        $elab_car_costo_unit  = floatval($aElab_car['forro_costo_unit']);
        $elab_car_forro_car   = floatval($aElab_car['forro_car']);
        $elab_car_costo_total = floatval($aElab_car['forro_car']);


        unset($aElab_car);


    // elab_guarda
        $elab_guarda_costo_unit = floatval($aElab_guarda['guarda_costo_unit']);
        $elab_guarda_costo_tot  = floatval($aElab_guarda['guarda']);


        unset($aElab_guarda);


    // Ranurado
        $ranurado_arreglo               = floatval($aRanurado['arreglo']);
        $ranurado_costo_unit_por_ranura = floatval($aRanurado['costo_unit_por_ranura']);
        $ranurado_costo_por_ranura      = floatval($aRanurado['costo_por_ranura']);
        $ranurado_costo_tot_ranurado    = floatval($aRanurado['costo_tot_ranurado']);


        unset($aRanurado);



    // Ranurado_Fcar
        $ranurado_fcar_costo_unit_por_ranura = floatval($aRanurado_Fcar['costo_unit_por_ranura']);
        $ranurado_fcar_costo_por_ranura      = floatval($aRanurado_Fcar['costo_por_ranura']);


        unset($aRanurado_Fcar);


    // Encuadernacion
        $perf_iman_costo_unitario               = floatval($aEncuadernacion['perf_iman_costo_unitario']);
        $perf_iman_y_puesta                     = floatval($aEncuadernacion['perf_iman_y_puesta']);
        $encuad_despunte_costo_unitario         = floatval($aEncuadernacion['despunte_costo_unitario']);
        $encuad_despunte_de_esquinas_para_cajon = floatval($aEncuadernacion['despunte_de_esquinas_para_cajon']);
        $encuad_encajada_costo_unitario         = floatval($aEncuadernacion['encajada_costo_unitario']);
        $encuad_encajada                        = floatval($aEncuadernacion['costo_encajada']);
        $encuad_costo_tot_proceso               = floatval($aEncuadernacion['costo_tot_proceso']);
        $encuad_costo_tot_encuadernacion        = floatval($encuad_costo_tot_proceso + $encuad_encajada);

        unset($aEncuadernacion);


    // Encuadernacion_fcaj
        $encuad_fcaj_costo_unit_forrado_cajon     = floatval($aEncuadernacion_Fcaj['costo_unit_forrado_cajon']);
        $encuad_fcaj_forrado_de_cajon             = floatval($aEncuadernacion_Fcaj['forrado_de_cajon']);
        $encuad_fcaj_empalme_cajon_costo_unitario = floatval($aEncuadernacion_Fcaj['empalme_cajon_costo_unitario']);
        $encuad_fcaj_empalme_de_cajon             = floatval($aEncuadernacion_Fcaj['empalme_de_cajon']);
        $encuad_fcaj_arreglo_de_forrado_de_cajon  = floatval($aEncuadernacion_Fcaj['arreglo_de_forrado_de_cajon']);
        $encuad_fcaj_costo_tot_proceso            = floatval($aEncuadernacion_Fcaj['costo_tot_proceso']  - $encuad_encajada);

        unset($aEncuadernacion_Fcaj);

        //$aJsonGrab = array_keys($aJson);        // $aJsonGrab[18];

        //$s_miArrayJson = json_encode($aJsonGrab);

        $keys = $aJson['keys'];
        $keys = json_encode($keys);

        $aJson['mensaje'] = gettype($keys);

        $l_modificar_odt = false;

        $modificar = $_POST['modificar'];
        $modificar = trim(strval($modificar));

        if ($modificar == "SI") {

            $l_modificar_odt = true;

            $id_odt_anterior = intval($_POST['id_cot_odt_ant']);
        }

        // inicializa variables logicas
        $inserted     = false;
        $inserted_mod = true;

        $inserted_calc       = false;
        $inserted_papel_emp  = true;
        $inserted_papel_fcaj = true;
        $inserted_papel_fcar = true;
        $inserted_papel_g    = true;

        $l_corte_emp    = true;
        $l_corte_fcaj   = true;
        $l_corte_fcar   = true;
        $l_corte_guarda = true;

        $l_corte_carton_emp  = true;
        $l_corte_carton_fcar = true;

        $inserted_papel_caj   = true;
        $inserted_papel_car   = true;
        $inserted_elab_car    = true;
        $inserted_elab_guarda = true;

        $inserted_ranurado      = true;
        $inserted_ranurado_fcar = true;

        $l_arr_ran_hor_emp  = true;
        $l_arr_ran_vert_emp = true;

        $l_arreglo_ranurado_fcar = true;

        $inserted_encuadernacion      = true;
        $inserted_encuadernacion_fcaj = true;

        $l_despunte_esquinas = true;

        $l_pegado_guarda = true;

        $l_armado_caja_final = true;


        $l_insert_accesorios = true;
        $l_insert_bancos     = true;
        $l_insert_cierres    = true;


        $inserted_mermas  = false;
        $inserted_cortes  = false;
        $inserted_papeles = false;

        // Offset Empame
        $l_insert_OffEmp  = true;
        $l_insert_OffFcaj = true;
        $l_insert_OffFcar = true;
        $l_insert_OffG    = true;

        $l_insert_Off_maq_Emp  = true;
        $l_insert_Off_maq_Fcaj = true;
        $l_insert_Off_maq_Fcar = true;
        $l_insert_Off_maq_G    = true;

        $l_insert_DigEmp  = true;
        $l_insert_DigFCaj = true;
        $l_insert_DigFCar = true;
        $l_insert_DigG    = true;

        $l_insert_SerEmp  = true;
        $l_insert_SerFCaj = true;
        $l_insert_SerFCar = true;
        $l_insert_SerG    = true;

        $l_insert_BUVEmp  = true;
        $l_insert_BUVFcaj = true;
        $l_insert_BUVFcar = true;
        $l_insert_BUVG    = true;

        $l_insert_LaserEmp  = true;
        $l_insert_LaserFcaj = true;
        $l_insert_LaserFcar = true;
        $l_insert_LaserG    = true;

        $l_insert_GrabEmp  = true;
        $l_insert_GrabFcaj = true;
        $l_insert_GrabFcar = true;
        $l_insert_GrabG    = true;

        $l_insert_HSEmp  = true;
        $l_insert_HSFcaj = true;
        $l_insert_HSFcar = true;
        $l_insert_HSG    = true;

        $l_insert_LamEmp  = true;
        $l_insert_LamFcaj = true;
        $l_insert_LamFcar = true;
        $l_insert_LamG    = true;

        $l_insert_SuaEmp  = true;
        $l_insert_SuaFcaj = true;
        $l_insert_SuaFcar = true;
        $l_insert_SuaG    = true;

        // inserta en las tablas
        try {

            $this->db->beginTransaction();

            $costo_total_odt = floatval($aJson['costo_odt']);

            if ($l_modificar_odt) {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad, id_vendedor, id_tienda, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, id_odt_ant, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$odt', $id_cliente, $tiraje, $base, $alto, $profundidad, $id_usuario, $id_tienda, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', $id_odt_anterior, '$d_fecha', '$time')";
            } else {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad, id_vendedor, id_tienda, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$odt', $id_cliente, $tiraje, $base, $alto, $profundidad, $id_usuario, $id_tienda, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', '$d_fecha', '$time')";
            }

            $query_odt = $this->db->prepare($sql);

            $inserted = $query_odt->execute();

            $id_caja_odt = 0;

            $id_caja_odt = $this->db->lastInsertId();
            $id_caja_odt = intval($id_caja_odt);

            if ($id_caja_odt <= 0) {

                $inserted = false;
            }


            if ($l_modificar_odt) {

                //$sql_mod = "UPDATE cot_odt SET status = 'M', id_odt_ant = " . $id_caja_odt . " WHERE id_odt = " . $id_odt_anterior;
                $sql_mod = "UPDATE cot_odt SET status = 'M' WHERE id_odt = " . $id_odt_anterior;

                $query_mod_odt = $this->db->prepare($sql_mod);

                $inserted_mod = $query_mod_odt->execute();
            }


        // calculadora
            $sql_calc = "INSERT INTO cot_alm_calculadora
                (id_modelo, id_odt, b, h, p, g_cajon, g_cartera, e, e_may, b1, h1, p1, x, y, x1, y1, x11, y11, b11, h11, f, k, b_may, h_may, p_may, y_may, b1_may, y1_may, b11_may, y11_may, fecha_odt, hora_odt)
            VALUES
                ($id_modelo, $id_caja_odt, $b, $h, $p, $grosor_cajon, $grosor_cartera, $e, $e_may, $b1, $h1, $p1, $x, $y, $x1, $y1, $x11, $y11, $b11, $h11, $f, $k, $b_may, $h_may, $p_may, $y_may, $b1_may, $y1_may, $b11_may, $y11_may, '$d_fecha', '$time')";

            $query_calc = $this->db->prepare($sql_calc);

            $inserted_calc = $query_calc->execute();


        // papel empalme
            $sql_papel_emp = "INSERT INTO cot_alm_papelemp
                (id_odt, id_modelo, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $id_papel_empalme, '$nombre_papel_emp', $ancho_papel_emp, $largo_papel_emp, $costo_unit_papel_emp, $tiraje, $cortes_papel_emp, $pliegos_papel_emp, $costo_tot_pliegos_papel_emp, $corte_ancho_papel_emp, $corte_largo_papel_emp, '$d_fecha')";


            $query_papel_emp = $this->db->prepare($sql_papel_emp);

            $inserted_papel_emp = $query_papel_emp->execute();


        // Forro del Cajon
            $sql_papel_fcaj = "INSERT INTO cot_alm_papelfcaj
                (id_odt, id_modelo, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos,  costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $id_papel_Fcajon, '$nombre_papel_fcaj', $ancho_papel_fcaj, $largo_papel_fcaj, $costo_unit_papel_fcaj, $tiraje, $cortes_papel_fcaj, $pliegos_papel_fcaj, $costo_tot_pliegos_papel_fcaj, $corte_ancho_papel_fcaj, $corte_largo_papel_fcaj, '$d_fecha')";


            $query_papel_fcaj = $this->db->prepare($sql_papel_fcaj);

            $inserted_papel_fcaj = $query_papel_fcaj->execute();


        // Forro de la cartera
            $sql_papel_fcar = "INSERT INTO cot_alm_papelfcar
                (id_odt, id_modelo, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos,  costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $id_papel_Fcartera, '$nombre_papel_fcar', $ancho_papel_fcar, $largo_papel_fcar, $costo_unit_papel_fcar, $tiraje, $cortes_papel_fcar, $pliegos_papel_fcar, $costo_tot_pliegos_papel_fcar, $corte_ancho_papel_fcar, $corte_largo_papel_fcar, '$d_fecha')";


            $query_papel_fcar = $this->db->prepare($sql_papel_fcar);

            $inserted_papel_fcar = $query_papel_fcar->execute();


        // Guarda
            $sql_papel_g = "INSERT INTO cot_alm_papelguarda
                (id_odt, id_modelo, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos,  costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $id_papel_guarda, '$nombre_papel_g', $ancho_papel_g, $largo_papel_g, $costo_unit_papel_g, $tiraje, $cortes_papel_g, $pliegos_papel_g, $costo_tot_pliegos_papel_g, $corte_ancho_papel_g, $corte_largo_papel_g, '$d_fecha')";


            $query_papel_g = $this->db->prepare($sql_papel_g);

            $inserted_papel_g = $query_papel_g->execute();


        // corte

            // empalme
            $corte_costo_unitario = floatval($aJson['costo_corte_papel_emp']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_papel_emp']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_papel_emp']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_papel_emp']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_papel_emp']['tot_costo_corte']);

            $sql_corte_emp = "INSERT INTO cot_alm_corte_emp
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_emp = $this->db->prepare($sql_corte_emp);

            $l_corte_emp = $query_corte_emp->execute();


            // forro cajon
            $corte_costo_unitario = floatval($aJson['costo_corte_papel_fcaj']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_papel_fcaj']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_papel_fcaj']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_papel_fcaj']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_papel_fcaj']['tot_costo_corte']);

            $sql_corte_fcaj = "INSERT INTO cot_alm_corte_fcaj
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_fcaj = $this->db->prepare($sql_corte_fcaj);

            $l_corte_fcaj = $query_corte_fcaj->execute();


////


            // forro cartera
            $corte_costo_unitario = floatval($aJson['costo_corte_papel_fcar']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_papel_fcar']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_papel_fcar']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_papel_fcar']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_papel_fcar']['tot_costo_corte']);

            $sql_corte_fcar = "INSERT INTO cot_alm_corte_fcar
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_fcar = $this->db->prepare($sql_corte_fcar);

            $l_corte_fcar = $query_corte_fcar->execute();


            // forro guarda
            $corte_costo_unitario = floatval($aJson['costo_corte_papel_guarda']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_papel_guarda']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_papel_guarda']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_papel_guarda']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_papel_guarda']['tot_costo_corte']);

            $sql_corte_guarda = "INSERT INTO cot_alm_corte_guarda
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_guarda = $this->db->prepare($sql_corte_guarda);

            $l_corte_guarda = $query_corte_guarda->execute();


            // corte carton
            $corte_costo_unitario = floatval($aJson['costo_corte_carton']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_carton']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_carton']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_carton']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_carton']['tot_costo_corte']);

            $sql_corte_carton = "INSERT INTO cot_alm_corte_carton_emp
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_carton = $this->db->prepare($sql_corte_carton);

            $l_corte_carton_emp = $query_corte_carton->execute();


            // corte cartera
            $corte_costo_unitario = floatval($aJson['costo_corte_cartera']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_cartera']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_cartera']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_cartera']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_cartera']['tot_costo_corte']);

            $sql_corte_carton_fcar = "INSERT INTO cot_alm_corte_carton_fcar
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_carton_fcar = $this->db->prepare($sql_corte_carton_fcar);

            $l_corte_carton_fcar = $query_corte_carton_fcar->execute();


        // Carton Cajon
            $sql_papel_caj = "INSERT INTO cot_alm_cartoncaj
                (id_odt, id_modelo, id_cajon, num_cajon, tiraje, papel, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $id_cajon, $id_num_cajon, $tiraje, '$cajon_papel', '$cajon_nombre', $cajon_precio, $cajon_ancho, $cajon_largo, $cajon_corte_ancho, $cajon_corte_largo, $cajon_piezas_por_pliego, $cajon_num_pliegos, $cajon_costo_tot_carton, '$d_fecha')";


            $query_papel_caj = $this->db->prepare($sql_papel_caj);

            $inserted_papel_caj = $query_papel_caj->execute();


        // Carton Cartera
            $sql_papel_car = "INSERT INTO cot_alm_cartoncar
                (id_odt, id_modelo, id_cajon, num_cajon, tiraje, papel, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $id_carton_cartera, $carton_id_num_cartera, $tiraje, '$carton_cartera_papel', '$carton_cartera_nombre', $carton_cartera_precio, $carton_cartera_ancho, $carton_cartera_largo, $carton_cartera_corte_ancho, $carton_cartera_corte_largo, $carton_cartera_piezas_por_pliego, $carton_cartera_num_pliegos, $carton_cartera_costo_tot_carton, '$d_fecha')";


            $query_papel_car = $this->db->prepare($sql_papel_car);

            $inserted_papel_car = $query_papel_car->execute();


        // Elab_car
            $sql_elab_car = "INSERT INTO cot_alm_elab_car
                (id_modelo, id_odt, tiraje, forro_costo_unit, forro_car, costo_total, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $elab_car_costo_unit, $elab_car_forro_car, $elab_car_costo_total, '$d_fecha')";

            $query_elab_car = $this->db->prepare($sql_elab_car);

            $inserted_elab_car = $query_elab_car->execute();


        // Elab_guarda
            $sql_elab_guarda = "INSERT INTO cot_alm_elab_guarda
                (id_modelo, id_odt, tiraje, costo_unit, costo_total, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $elab_guarda_costo_unit, $elab_guarda_costo_tot, '$d_fecha')";

            $query_elab_guarda = $this->db->prepare($sql_elab_guarda);

            $inserted_elab_guarda = $query_elab_guarda->execute();


        // Ranurado
            $sql_ranurado = "INSERT INTO cot_alm_ranurado
                (id_odt, id_modelo, tiraje, arreglo, costo_unit, costo_por_ranura, costo_tot_ranurado, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $ranurado_arreglo, $ranurado_costo_unit_por_ranura, $ranurado_costo_por_ranura, $ranurado_costo_tot_ranurado, '$d_fecha')";

            $query_ranurado = $this->db->prepare($sql_ranurado);

            $inserted_ranurado = $query_ranurado->execute();


        // Ranurado_Fcar

            $sql_ranurado_fcar = "INSERT INTO cot_alm_ranurado_fcar
                (id_odt, id_modelo, tiraje, costo_unit_por_ranura, costo_por_ranura, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $ranurado_fcar_costo_unit_por_ranura, $ranurado_fcar_costo_por_ranura, '$d_fecha')";

            $query_ranurado_fcar = $this->db->prepare($sql_ranurado_fcar);

            $inserted_ranurado_fcar = $query_ranurado_fcar->execute();



        // arreglo ranurado horizontal
            $costo_unit = floatval($aJson['arreglo_ranurado_hor_emp']);

            $sql_ranurado_arreglo_ran_hor = "INSERT INTO cot_alm_arreglo_ranurado_hor_emp
                (id_odt, id_modelo, tiraje, costo_unit, costo_tot_ranurado, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $costo_unit, $costo_unit, '$d_fecha')";

            $query_arreglo_ranurado_hor = $this->db->prepare($sql_ranurado_arreglo_ran_hor);

            $l_arr_ran_hor_emp = $query_arreglo_ranurado_hor->execute();


        // arreglo ranurado vertical

            if ( ($aJson['base'] > $aJson['alto'])  or ($aJson['base'] < $aJson['alto']) ) {

                $costo_unit = 0;
                $costo_unit = floatval($aJson['arreglo_ranurado_ver_emp']);

                if ($costo_unit > 0) {

                    $sql_ranurado_arreglo_ran_ver = "INSERT INTO cot_alm_arreglo_ranurado_vert_emp
                        (id_odt, id_modelo, tiraje, costo_unit, costo_tot_ranurado, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, $tiraje, $costo_unit, $costo_unit, '$d_fecha')";

                    $query_arreglo_ranurado_vert = $this->db->prepare($sql_ranurado_arreglo_ran_ver);

                    $l_arr_ran_vert_emp = $query_arreglo_ranurado_vert->execute();
                } else {

                    $l_arr_ran_vert_emp = false;
                }
            }


        // arreglo ranurado forro de la cartera
            $costo_unit = $aJson['cot_alm_arreglo_ranurado_fcar'];
            $costo_unit = floatval($costo_unit);

            $sql_ranurado_arreglo_ran_fcar = "INSERT INTO cot_alm_arreglo_ranurado_fcar
                (id_odt, id_modelo, tiraje, costo_unit, costo_tot_ranurado, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $costo_unit, $costo_unit, '$d_fecha')";

            $query_arreglo_ranurado_fcar = $this->db->prepare($sql_ranurado_arreglo_ran_fcar);

            $l_arreglo_ranurado_fcar = $query_arreglo_ranurado_fcar->execute();


        // Encuadernacion
            $sql_encuadernacion = "INSERT INTO cot_alm_encuadernacion
                (id_modelo, id_odt, tiraje, costo_unit_iman, perforado_iman_y_puesta, despunte_costo_unit, despunte_esquina_cajon, encajada_costo_unit, encajada_costo_tot, costo_tot_proceso, costo_tot_encuadernacion, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $perf_iman_costo_unitario, $perf_iman_y_puesta, $encuad_despunte_costo_unitario, $encuad_despunte_de_esquinas_para_cajon, $encuad_encajada_costo_unitario, $encuad_encajada, $encuad_costo_tot_proceso, $encuad_costo_tot_encuadernacion, '$d_fecha')";

            $query_encuadernacion = $this->db->prepare($sql_encuadernacion);

            $inserted_encuadernacion = $query_encuadernacion->execute();


        // Encuadernacion_Fcaj
            $sql_encuadernacion_fcaj = "INSERT INTO cot_alm_encuadernacion_fcaj
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $encuad_fcaj_costo_unit_forrado_cajon, $encuad_fcaj_forrado_de_cajon, $encuad_fcaj_arreglo_de_forrado_de_cajon, $encuad_fcaj_empalme_cajon_costo_unitario, $encuad_fcaj_empalme_de_cajon, $encuad_fcaj_costo_tot_proceso, '$d_fecha')";

            $query_encuadernacion_fcaj = $this->db->prepare($sql_encuadernacion_fcaj);

            $inserted_encuadernacion_fcaj = $query_encuadernacion_fcaj->execute();


        // despunte de esquinas empalme
            $costo_unit         = floatval($aJson['despunte_esquinas']['costo_unit']);
            $costo_tot_despunte = floatval($aJson['despunte_esquinas']['costo_tot_despunte']);

            $sql_despunte_emp = "INSERT INTO cot_alm_despunte_esquinas_emp(id_modelo, id_odt, tiraje, costo_unit, costo_tot_despunte, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit, $costo_tot_despunte, '$d_fecha')";

            $query_despunte_emp = $this->db->prepare($sql_despunte_emp);

            $l_despunte_esquinas = $query_despunte_emp->execute();


        // Pegado guarda
            $costo_unit = $aJson['pegado_guarda']['costo_unitario'];
            $costo_unit = floatval($costo_unit);

            $costo_tot_proceso = $aJson['pegado_guarda']['costo_tot_proceso'];
            $costo_tot_proceso = floatval($costo_tot_proceso);

            $sql_pegado_g = "INSERT INTO cot_alm_pegado_guarda(id_modelo, id_odt, tiraje, costo_unit, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit, $costo_tot_proceso, '$d_fecha')";

            $query_pegado_g = $this->db->prepare($sql_pegado_g);

            $l_pegado_guarda = $query_pegado_g->execute();


        // armado caja final

            $armado_costo_unit        = floatval($aJson['armado_caja_final']['costo_unit']);
            $armado_costo_tot_proceso = floatval($aJson['armado_caja_final']['costo_tot_proceso']);

            $sql_armado_final = "INSERT INTO cot_alm_armado_caja_final(id_modelo, id_odt, tiraje, costo_unit, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $armado_costo_unit, $armado_costo_tot_proceso, '$d_fecha')";

            $query_armado_final= $this->db->prepare($sql_armado_final);

            $l_armado_caja_final = $query_armado_final->execute();



    /*************** Termina costos fijos **********************/

        /************* Accesorios *********************/

            if (array_key_exists("Accesorios", $aJson)) {

                $v_Accesorio  = "";
                $v_Accesorio1 = "";

                $v_Accesorio1  = $aJson['Accesorios'];
                $v_Accesorio_R = array_values($v_Accesorio1);

                $cuantos_v_Accesorio = count($v_Accesorio1);

                $id_modelo = intval($aJson['modelo']);

                if ($cuantos_v_Accesorio > 0) {

                    for ($k = 0; $k < $cuantos_v_Accesorio; $k++) {

                        $Tipo_accesorio = trim(strval($v_Accesorio_R[$k]['Tipo_accesorio']));

                        $Tipo           = trim(strval($v_Accesorio_R[$k]['Tipo']));

                        $largo  = floatval($v_Accesorio_R[$k]['Largo']);
                        $ancho  = floatval($v_Accesorio_R[$k]['Ancho']);
                        $color  = trim(strval($v_Accesorio_R[$k]['Color']));

                        $costo_unitario   = floatval($v_Accesorio_R[$k]['costo_unit_accesorio']);
                        $costo_accesorios = floatval($v_Accesorio_R[$k]['costo_accesorios']);


                        $sql_Accesorios = "INSERT INTO cot_accesorios
                            (id_modelo, id_odt, tiraje, tipo, tipo_accesorio, largo, ancho, color, costo_unit, costo_tot_accesorio, fecha)
                        VALUES
                            ($id_modelo, $id_caja_odt, $tiraje, '$Tipo', '$Tipo_accesorio', $largo, $ancho, '$color', $costo_unitario, $costo_accesorios, '$d_fecha')";

                        $query_Accesorios = $this->db->prepare($sql_Accesorios);

                        $l_insert_accesorios = $query_Accesorios->execute();
                    }
                }
            }


        /********** Bancos **************************/

            if (array_key_exists("Bancos", $aJson)) {

                $v_Banco  = "";
                $v_Banco1 = "";

                $v_Banco1 = $aJson['Bancos'];
                $v_Banco  = array_values($v_Banco1);

                $cuantos_v_Banco = 0;
                $cuantos_v_Banco = count($v_Banco1);

                $v_Banco_R = array_values($v_Banco);

                $id_modelo = intval($aJson['modelo']);

                if ($cuantos_v_Banco > 0) {

                    for ($k = 0; $k < $cuantos_v_Banco; $k++) {

                        $costo_bancos = 0;

                        $Tipo_banco = trim(strval($v_Banco_R[$k]['Tipo_banco']));

                        $tiraje      = intval($v_Banco_R[$k]['tiraje']);
                        $largo       = intval($v_Banco_R[$k]['largo']);
                        $ancho       = intval($v_Banco_R[$k]['ancho']);
                        $profundidad = intval($v_Banco_R[$k]['profundidad']);
                        $suaje       = trim(strval($v_Banco_R[$k]['Suaje']));

                        $costo_unitario = floatval($v_Banco_R[$k]['costo_unit_banco']);

                        $costo_bancos = floatval($v_Banco_R[$k]['costo_bancos']);


                        $sql_Bancos = "INSERT INTO cot_bancos
                            (id_modelo, id_odt, tiraje, tipo, largo, ancho, profundidad, suaje, costo_unit, costo_tot_banco, fecha)
                        VALUES
                            ($id_modelo, $id_caja_odt, $tiraje, '$Tipo_banco', $largo, $ancho, $profundidad, '$suaje', $costo_unitario, $costo_bancos, '$d_fecha')";

                        $query_Bancos = $this->db->prepare($sql_Bancos);

                        $l_insert_bancos = $query_Bancos->execute();
                    }
                }
            }


        /************* Cierres ************************/

            if (array_key_exists("Cierres", $aJson)) {

                $v_Cierre  = "";
                $v_Cierre1 = "";

                $v_Cierre1 = $aJson['Cierres'];
                $v_Cierre  = array_values($v_Cierre1);

                $cuantos_v_Cierre = 0;
                $cuantos_v_Cierre = count($v_Cierre1);

                $v_Cierre_R = array_values($v_Cierre);


                $id_modelo = intval($aJson['modelo']);


                if ($cuantos_v_Cierre > 0) {

                    for ($k = 0; $k < $cuantos_v_Cierre; $k++) {

                        $costo_cierre = 0;

                        $Tipo_cierre = trim(strval($v_Cierre_R[$k]['Tipo_cierre']));

                        $tiraje   = intval($v_Cierre_R[$k]['tiraje']);
                        $numpares = intval($v_Cierre_R[$k]['numpares']);
                        $largo    = intval($v_Cierre_R[$k]['largo']);
                        $ancho    = intval($v_Cierre_R[$k]['ancho']);
                        $tipo     = trim(strval($v_Cierre_R[$k]['tipo']));
                        $color    = trim(strval($v_Cierre_R[$k]['color']));

                        $costo_unitario = floatval($v_Cierre_R[$k]['costo_unitario']);

                        $costo_cierre = floatval($v_Cierre_R[$k]['costo_cierre']);


                        $sql_Cierres = "INSERT INTO cot_cierres
                            (id_modelo, id_odt, tipo_cierre, tiraje, numpares, largo, ancho, tipo, color, costo_unit, costo_tot_cierre, fecha)
                        VALUES
                            ($id_modelo, $id_caja_odt, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, '$tipo', '$color', $costo_unitario, $costo_cierre, '$d_fecha')";

                        $query_Cierres = $this->db->prepare($sql_Cierres);

                        $l_insert_cierres = $query_Cierres->execute();
                    }
                }
            }


    /*************** Inicia Impresiones *******************/


        /*********** Offset Empalme **************/


            if (array_key_exists("OffEmp", $aJson)) {

                $v_OffEmp1 = $aJson['OffEmp'];
                $v_tmp_R   = array_values($v_OffEmp1);

                $cuantos_v_OffEmp = count($v_OffEmp1);

                if ($cuantos_v_OffEmp > 0) {

                    for ($k = 0; $k < $cuantos_v_OffEmp; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = floatval($v_tmp_R[$k]['corte_costo_unitario']);
                        $corte_por_millar       = intval($v_tmp_R[$k]['corte_por_millar']);
                        $costo_corte            = floatval($v_tmp_R[$k]['costo_corte']);
                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_tot_laminas      = floatval($v_tmp_R[$k]['costo_tot_laminas']);
                        $costo_unitario_arreglo = floatval($v_tmp_R[$k]['costo_unitario_arreglo']);
                        $costo_tot_arreglo      = floatval($v_tmp_R[$k]['costo_tot_arreglo']);
                        $costo_unitario_tiro    = floatval($v_tmp_R[$k]['costo_unitario_tiro']);
                        $costo_tot_tiro         = floatval($v_tmp_R[$k]['costo_tiro']);
                        $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                        $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                        $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                        $sql_OffEmp = "INSERT INTO cot_alm_offsetemp
                            (id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffEmp = $this->db->prepare($sql_OffEmp);

                        $l_insert_OffEmp = $query_OffEmp->execute();
                    }
                }
            } elseif(array_key_exists("Off_maq_Emp", $aJson)) {

                $v_Off_maq_Emp1 = $aJson['Off_maq_Emp'];
                $v_tmp_R        = array_values($v_Off_maq_Emp1);

                $cuantos_v_Off_maq_Emp = count($v_Off_maq_Emp1);

                if ($cuantos_v_Off_maq_Emp > 0) {

                    for ($k = 0; $k < $cuantos_v_Off_maq_Emp; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                       = trim(strval($v_tmp_R[$k]['Tipo']));
                        $num_tintas                 = intval($v_tmp_R[$k]['num_tintas']);
                        $arreglo_costo_unitario     = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                        $arreglo_costo              = floatval($v_tmp_R[$k]['arreglo_costo']);
                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_laminas          = floatval($v_tmp_R[$k]['costo_laminas']);
                        $costo_unitario             = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot                  = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_Emp = "INSERT INTO cot_alm_offset_maq_emp
                            (id_odt, id_modelo, tiraje, tipo, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, $tiraje, '$tipo', $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario, $costo_tot, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_Emp = $this->db->prepare($sql_Off_maq_Emp);

                        $l_insert_Off_maq_Emp = $query_Off_maq_Emp->execute();
                    }
                }
            }


        /*********** Offset FCaj **************/

            // Offset Forro del Cajon

            if (array_key_exists("OffFCaj", $aJson)) {

                $v_OffFcaj1 = $aJson['OffFCaj'];
                $v_tmp_R    = array_values($v_OffFcaj1);

                $cuantos_v_OffFcaj = count($v_OffFcaj1);

                if ($cuantos_v_OffFcaj > 0) {

                    for ($k = 0; $k < $cuantos_v_OffFcaj; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = floatval($v_tmp_R[$k]['corte_costo_unitario']);
                        $corte_por_millar       = floatval($v_tmp_R[$k]['corte_por_millar']);
                        $costo_corte            = floatval($v_tmp_R[$k]['costo_corte']);
                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_tot_laminas      = floatval($v_tmp_R[$k]['costo_tot_laminas']);
                        $costo_unitario_arreglo = floatval($v_tmp_R[$k]['costo_unitario_arreglo']);
                        $costo_tot_arreglo      = floatval($v_tmp_R[$k]['costo_tot_arreglo']);
                        $costo_unitario_tiro    = floatval($v_tmp_R[$k]['costo_unitario_tiro']);
                        $costo_tot_tiro         = floatval($v_tmp_R[$k]['costo_tiro']);
                        $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                        $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                        $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                        $sql_OffFcaj = "INSERT INTO cot_alm_offsetfcaj
                            (id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffFcaj = $this->db->prepare($sql_OffFcaj);

                        $l_insert_OffFcaj = $query_OffFcaj->execute();
                    }
                }
            } elseif(array_key_exists("Off_maq_FCaj", $aJson)) {

                $v_Off_maq_Fcaj1 = $aJson['Off_maq_FCaj'];
                $v_tmp_R         = array_values($v_Off_maq_Fcaj1);

                $cuantos_v_Off_maq_Fcaj = count($v_Off_maq_Fcaj1);

                if ($cuantos_v_Off_maq_Fcaj > 0) {

                    for ($k = 0; $k < $cuantos_v_Off_maq_Fcaj; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo       = trim(strval($v_tmp_R[$k]['Tipo']));
                        $num_tintas = intval($v_tmp_R[$k]['num_tintas']);
                        $arreglo_costo_unitario     = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                        $arreglo_costo              = floatval($v_tmp_R[$k]['arreglo_costo']);
                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_laminas          = floatval($v_tmp_R[$k]['costo_laminas']);
                        $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot          = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_Fcaj = "INSERT INTO cot_alm_offset_maq_fcaj
                            (id_odt, id_modelo, tiraje, tipo, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, $tiraje, '$tipo', $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario, $costo_tot, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_Fcaj = $this->db->prepare($sql_Off_maq_Fcaj);

                        $l_insert_Off_maq_Fcaj = $query_Off_maq_Fcaj->execute();
                    }
                }
            }


        /*********** Offset FCar **************/

            // Offset Forro de la Cartera

            if (array_key_exists("OffFCar", $aJson)) {

                $v_OffFcar1 = $aJson['OffFCar'];
                $v_tmp_R    = array_values($v_OffFcar1);

                $cuantos_v_OffFcar = count($v_OffFcar1);

                if ($cuantos_v_OffFcar > 0) {

                    for ($k = 0; $k < $cuantos_v_OffFcar; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = floatval($v_tmp_R[$k]['corte_costo_unitario']);
                        $corte_por_millar       = floatval($v_tmp_R[$k]['corte_por_millar']);
                        $costo_corte            = floatval($v_tmp_R[$k]['costo_corte']);
                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_tot_laminas      = floatval($v_tmp_R[$k]['costo_tot_laminas']);
                        $costo_unitario_arreglo = floatval($v_tmp_R[$k]['costo_unitario_arreglo']);
                        $costo_tot_arreglo      = floatval($v_tmp_R[$k]['costo_tot_arreglo']);
                        $costo_unitario_tiro    = floatval($v_tmp_R[$k]['costo_unitario_tiro']);
                        $costo_tot_tiro         = floatval($v_tmp_R[$k]['costo_tiro']);
                        $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                        $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                        $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                        $sql_OffFcar = "INSERT INTO cot_alm_offsetfcar
                            (id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffFcar = $this->db->prepare($sql_OffFcar);

                        $l_insert_OffFcar = $query_OffFcar->execute();
                    }
                }
            } elseif(array_key_exists("Off_maq_FCar", $aJson)) {

                $v_Off_maq_Fcar1 = $aJson['Off_maq_FCar'];
                $v_tmp_R         = array_values($v_Off_maq_Fcar1);

                $cuantos_v_Off_maq_Fcar = count($v_Off_maq_Fcar1);

                if ($cuantos_v_Off_maq_Fcar > 0) {

                    for ($k = 0; $k < $cuantos_v_Off_maq_Fcar; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['Tipo']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $arreglo_costo_unitario = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($v_tmp_R[$k]['arreglo_costo']);


                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_laminas          = floatval($v_tmp_R[$k]['costo_laminas']);
                        $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot              = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_Fcar = "INSERT INTO cot_alm_offset_maq_fcar
                            (id_odt, id_modelo, tiraje, tipo, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, $tiraje, '$tipo', $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario, $costo_tot, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_Fcar = $this->db->prepare($sql_Off_maq_Fcar);

                        $l_insert_Off_maq_Fcar = $query_Off_maq_Fcar->execute();
                    }
                }
            }


        /*********** Offset Guarda **************/

            // Offset Guarda

            if (array_key_exists("OffG", $aJson)) {

                $v_OffG1 = $aJson['OffG'];
                $v_tmp_R = array_values($v_OffG1);

                $cuantos_v_OffG = count($v_OffG1);

                if ($cuantos_v_OffG) {

                    for ($k = 0; $k < $cuantos_v_OffG; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = floatval($v_tmp_R[$k]['corte_costo_unitario']);
                        $corte_por_millar       = floatval($v_tmp_R[$k]['corte_por_millar']);
                        $costo_corte            = floatval($v_tmp_R[$k]['costo_corte']);
                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_tot_laminas      = floatval($v_tmp_R[$k]['costo_tot_laminas']);
                        $costo_unitario_arreglo = floatval($v_tmp_R[$k]['costo_unitario_arreglo']);
                        $costo_tot_arreglo      = floatval($v_tmp_R[$k]['costo_tot_arreglo']);
                        $costo_unitario_tiro    = floatval($v_tmp_R[$k]['costo_unitario_tiro']);
                        $costo_tot_tiro         = floatval($v_tmp_R[$k]['costo_tiro']);
                        $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                        $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                        $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                        $sql_OffG = "INSERT INTO cot_alm_offsetguarda
                            (id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffG = $this->db->prepare($sql_OffG);

                        $l_insert_OffG = $query_OffG->execute();
                    }
                }
            } elseif(array_key_exists("Off_maq_G", $aJson)) {

                $v_Off_maq_Fcar1 = $aJson['Off_maq_G'];
                $v_tmp_R         = array_values($v_Off_maq_Fcar1);

                $cuantos_v_Off_maq_Fcar = 0;
                $cuantos_v_Off_maq_Fcar = count($v_Off_maq_Fcar1);

                if ($cuantos_v_Off_maq_Fcar > 0) {

                    for ($k = 0; $k < $cuantos_v_Off_maq_Fcar; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['Tipo']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $arreglo_costo_unitario = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($v_tmp_R[$k]['arreglo_costo']);


                        $costo_unitario_laminas = floatval($v_tmp_R[$k]['costo_unitario_laminas']);
                        $costo_laminas          = floatval($v_tmp_R[$k]['costo_laminas']);
                        $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot          = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_G = "INSERT INTO cot_alm_offset_maq_guarda
                            (id_odt, id_modelo, tiraje, tipo, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, $id_modelo, $tiraje, '$tipo', $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario, $costo_tot, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_G = $this->db->prepare($sql_Off_maq_G);

                        $l_insert_Off_maq_G = $query_Off_maq_G->execute();
                    }
                }
            }


        /*********** Digital Empalme **************/

            // inicia digital Empalme

            if (array_key_exists("DigEmp", $aJson)) {

                $v_DigEmp = $aJson['DigEmp'];
                $v_tmp_R  = array_values($v_DigEmp);

                $cuantos_v_DigEmp = count($v_DigEmp);

                $cortes_por_pliego = intval($aJson['Cortes']['guarda_cajon']);

                for ($k = 0; $k < $cuantos_v_DigEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tot_pliegos       = intval($v_tmp_R[$k]['tot_pliegos']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigEmp = "INSERT INTO cot_alm_digemp
                        (id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, tot_pliegos,  costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigEmp = $this->db->prepare($sql_DigEmp);

                    $l_insert_DigEmp = $query_DigEmp->execute();
                }
            }


        /*********** Digital Fcaj ***************/

            // inicia digital Forro del Cajon

            if (array_key_exists("DigFCaj", $aJson)) {

                $v_DigFCaj = $aJson['DigFCaj'];
                $v_tmp_R   = array_values($v_DigFCaj);

                $cuantos_v_DigFCaj = count($v_DigFCaj);

                $cortes_por_pliego = intval($aJson['Cortes']['forro_cajon']);

                for ($k = 0; $k < $cuantos_v_DigFCaj; $k++) {

                    $costo_tot_proceso = 0;

                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tot_pliegos       = intval($v_tmp_R[$k]['tot_pliegos']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigFcaj = "INSERT INTO cot_alm_digfcaj
                        (id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, tot_pliegos,  costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigFcaj = $this->db->prepare($sql_DigFcaj);

                    $l_insert_DigFCaj = $query_DigFcaj->execute();
                }
            }


        /*********** Digital Fcar ***************/

            // inicia digital Forro de la Cartera

            if (array_key_exists("DigFCar", $aJson)) {

                $v_DigFCar = $aJson['DigFCar'];
                $v_tmp_R   = array_values($v_DigFCar);

                $cuantos_v_DigFCar = count($v_DigFCar);

                $cortes_por_pliego = intval($aJson['Cortes']['forro_cartera']);


                for ($k = 0; $k < $cuantos_v_DigFCar; $k++) {

                    $costo_tot_proceso = 0;

                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tot_pliegos    = floatval($v_tmp_R[$k]['tot_pliegos']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigFcar = "INSERT INTO cot_alm_digfcar
                        (id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigFcar = $this->db->prepare($sql_DigFcar);

                    $l_insert_DigFCar = $query_DigFcar->execute();
                }
            }


        /*********** Digital Guarda ***************/

            // inicia digital Guarda

            if (array_key_exists("DigG", $aJson)) {

                $v_DigG  = $aJson['DigG'];
                $v_tmp_R = array_values($v_DigG);

                $cuantos_v_DigG = count($v_DigG);

                $cortes_por_pliego = intval($aJson['Cortes']['guarda']);

                for ($k = 0; $k < $cuantos_v_DigG; $k++) {

                    $costo_tot_proceso = 0;

                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tot_pliegos       = intval($v_tmp_R[$k]['tot_pliegos']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigG = "INSERT INTO cot_alm_digguarda
                        (id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, tot_pliegos,  costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigG = $this->db->prepare($sql_DigG);

                    $l_insert_DigG = $query_DigG->execute();
                }
            }


        /*********** Serigrafia Empalme ***************/

            // Inicia Serigrafia empalme

            if (array_key_exists("SerEmp", $aJson)) {

                $v_SerEmp = $aJson['SerEmp'];
                $v_tmp_R  = array_values($v_SerEmp);

                $cuantos_v_SerEmp = count($v_SerEmp);

                for ($k = 0; $k < $cuantos_v_SerEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = floatval($v_tmp_R[$k]["costo_unit_arreglo"]);
                    $costo_arreglo      = floatval($v_tmp_R[$k]["costo_arreglo"]);
                    $costo_unit_tiro    = floatval($v_tmp_R[$k]["costo_unitario_tiro"]);
                    $costo_tiro         = floatval($v_tmp_R[$k]["costo_tiro"]);
                    $costo_tot_proceso  = floatval($v_tmp_R[$k]["costo_tot_proceso"]);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = floatval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);

                    $sql_SerEmp = "INSERT INTO cot_alm_seremp
                        (id_odt, id_modelo, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_SerEmp = $this->db->prepare($sql_SerEmp);

                    $l_insert_SerEmp = $query_SerEmp->execute();
                }
            }


        /*********** Serigrafia FCaj ***************/

            // Inicia Serigrafia Forro del Cajon

            if (array_key_exists("SerFCaj", $aJson)) {

                $v_SerFCaj = $aJson['SerFCaj'];
                $v_tmp_R   = array_values($v_SerFCaj);

                $cuantos_v_SerFCaj = count($v_SerFCaj);

                for ($k = 0; $k < $cuantos_v_SerFCaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = floatval($v_tmp_R[$k]["costo_unit_arreglo"]);
                    $costo_arreglo      = floatval($v_tmp_R[$k]["costo_arreglo"]);
                    $costo_unit_tiro    = floatval($v_tmp_R[$k]["costo_unitario_tiro"]);
                    $costo_tiro         = floatval($v_tmp_R[$k]["costo_tiro"]);
                    $costo_tot_proceso  = floatval($v_tmp_R[$k]["costo_tot_proceso"]);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = floatval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SerFCaj = "INSERT INTO cot_alm_serfcaj
                        (id_odt, id_modelo, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SerFCaj = $this->db->prepare($sql_SerFCaj);

                    $l_insert_SerFCaj = $query_SerFCaj->execute();
                }
            }


        /*********** Serigrafia FCar ***************/

            // Inicia Serigrafia Forro de la Cartera

            if (array_key_exists("SerFCar", $aJson)) {

                $v_SerFCar   = $aJson['SerFCar'];
                $v_tmp_R = array_values($v_SerFCar);

                $cuantos_v_SerFCar = count($v_SerFCar);

                for ($k = 0; $k < $cuantos_v_SerFCar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = floatval($v_tmp_R[$k]["costo_unit_arreglo"]);
                    $costo_arreglo      = floatval($v_tmp_R[$k]["costo_arreglo"]);
                    $costo_unit_tiro    = floatval($v_tmp_R[$k]["costo_unitario_tiro"]);
                    $costo_tiro         = floatval($v_tmp_R[$k]["costo_tiro"]);
                    $costo_tot_proceso  = floatval($v_tmp_R[$k]["costo_tot_proceso"]);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = floatval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SerFCar = "INSERT INTO cot_alm_serfcar
                        (id_odt, id_modelo, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_SerFCar = $this->db->prepare($sql_SerFCar);

                    $l_insert_SerFCar = $query_SerFCar->execute();
                }
            }


        /*********** Serigrafia Guarda ***************/

            // Inicia Serigrafia Guarda

            if (array_key_exists("SerG", $aJson)) {

                $v_SerG  = $aJson['SerG'];
                $v_tmp_R = array_values($v_SerG);

                $cuantos_v_SerG = count($v_SerG);

                for ($k = 0; $k < $cuantos_v_SerG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = floatval($v_tmp_R[$k]["costo_unit_arreglo"]);
                    $costo_arreglo      = floatval($v_tmp_R[$k]["costo_arreglo"]);
                    $costo_unit_tiro    = floatval($v_tmp_R[$k]["costo_unitario_tiro"]);
                    $costo_tiro         = floatval($v_tmp_R[$k]["costo_tiro"]);
                    $costo_tot_proceso  = floatval($v_tmp_R[$k]["costo_tot_proceso"]);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SerG = "INSERT INTO cot_alm_serguarda
                        (id_odt, id_modelo, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_SerG = $this->db->prepare($sql_SerG);

                    $l_insert_SerG = $query_SerG->execute();
                }
            }

    /*************** Termina Impresiones *******************/


    /************* Inicia Acabados ****************************/


        /*************** Barniz **************************/

            // Inicia Barniz Empalme

            if (array_key_exists("Barniz_UV", $aJson)) {

                $v_BUVEmp = $aJson['Barniz_UV'];
                $v_tmp_R  = array_values($v_BUVEmp);

                $cuantos_v_BUVEmp = count($v_BUVEmp);

                for ($k = 0; $k < $cuantos_v_BUVEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_BUVEmp = "INSERT INTO cot_alm_barnizuvemp
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVEmp = $this->db->prepare($sql_BUVEmp);

                    $l_insert_BUVEmp = $query_BUVEmp->execute();
                }
            }

            // Inicia Barniz Forro Cajon

            if (array_key_exists("BarnizFcaj", $aJson)) {

                $v_BUVFcaj = $aJson['BarnizFcaj'];
                $v_tmp_R   = array_values($v_BUVFcaj);

                $cuantos_v_BUVFcaj = count($v_BUVFcaj);

                for ($k = 0; $k < $cuantos_v_BUVFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_BUVFcaj = "INSERT INTO cot_alm_barnizuvfcaj
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVFcaj = $this->db->prepare($sql_BUVFcaj);

                    $l_insert_BUVFcaj = $query_BUVFcaj->execute();
                }
            }


            // Inicia Barniz Forro Cartera

            if (array_key_exists("BarnizFcar", $aJson)) {

                $v_BUVFcar = $aJson['BarnizFcar'];
                $v_tmp_R   = array_values($v_BUVFcar);

                $cuantos_v_BUVFcar = count($v_BUVFcar);

                for ($k = 0; $k < $cuantos_v_BUVFcar; $k++) {

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));

                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_BUVFcar = "INSERT INTO cot_alm_barnizuvfcar
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVFcar = $this->db->prepare($sql_BUVFcar);

                    $l_insert_BUVFcar = $query_BUVFcar->execute();
                }
            }

            // Inicia Barniz Guarda

            if (array_key_exists("BarnizG", $aJson)) {

                $v_BUVG  = $aJson['BarnizG'];
                $v_tmp_R = array_values($v_BUVG);

                $cuantos_v_BUVG = count($v_BUVG);

                for ($k = 0; $k < $cuantos_v_BUVG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_BUVG = "INSERT INTO cot_alm_barnizuvguarda
                        (id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        (id_caja_odt, id_odt, $id_modelo, $tiraje, '$tipo_grabado', $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVG = $this->db->prepare($sql_BUVG);

                    $l_insert_BUVG = $query_BUVG->execute();
                }
            }


        /*************** Corte Laser *********************/

            // Inicia Corte Laser Empalme

            if (array_key_exists("Laser", $aJson)) {

                $v_LaserEmp = $aJson['Laser'];
                $v_tmp_R    = array_values($v_LaserEmp);

                $cuantos_v_LaserEmp = count($v_LaserEmp);

                for ($k = 0; $k < $cuantos_v_LaserEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserEmp = "INSERT INTO cot_alm_laseremp
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserEmp = $this->db->prepare($sql_LaserEmp);

                    $l_insert_LaserEmp = $query_LaserEmp->execute();
                }
            }


            // Inicia Corte Laser Cajon

            if (array_key_exists("LaserFcaj", $aJson)) {

                $v_LaserFcaj = $aJson['LaserFcaj'];
                $v_tmp_R     = array_values($v_LaserFcaj);

                $cuantos_v_LaserFcaj = count($v_LaserFcaj);


                for ($k = 0; $k < $cuantos_v_LaserFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserFcaj = "INSERT INTO cot_alm_laserfcaj
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserFcaj = $this->db->prepare($sql_LaserFcaj);

                    $l_insert_LaserFcaj = $query_LaserFcaj->execute();
                }
            }


            // Inicia Corte Laser Cartera

            if (array_key_exists("LaserFcar", $aJson)) {

                $v_LaserFcar = $aJson['LaserFcar'];
                $v_tmp_R     = array_values($v_LaserFcar);

                $cuantos_v_LaserFcar = count($v_LaserFcar);


                for ($k = 0; $k < $cuantos_v_LaserFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserFcar = "INSERT INTO cot_alm_laserfcar
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserFcar = $this->db->prepare($sql_LaserFcar);

                    $l_insert_LaserFcar = $query_LaserFcar->execute();
                }
            }


            // Inicia Corte Laser Guarda

            if (array_key_exists("LaserG", $aJson)) {

                $v_LaserG = $aJson['LaserG'];
                $v_tmp_R  = array_values($v_LaserG);

                $cuantos_v_LaserG = count($v_LaserG);

                for ($k = 0; $k < $cuantos_v_LaserG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserG = "INSERT INTO cot_alm_laserguarda
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserG = $this->db->prepare($sql_LaserG);

                    $l_insert_LaserG = $query_LaserG->execute();
                }
            }


        /*************** Grabado ************************/

            // Inicia Grabado Empalme

            if (array_key_exists("Grabado", $aJson)) {

                $v_GrabEmp = $aJson['Grabado'];
                $v_tmp_R   = array_values($v_GrabEmp);

                $cuantos_v_GrabEmp = count($v_GrabEmp);

                for ($k = 0; $k < $cuantos_v_GrabEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $ubicacion              = trim(strval($v_tmp_R[$k]['ubicacion']));
                    $placa_area             = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario   = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo            = floatval($v_tmp_R[$k]['placa_costo']);
                    $arreglo_costo_unitario = intval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo          = intval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_GrabEmp = "INSERT INTO cot_alm_grabemp
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabEmp = $this->db->prepare($sql_GrabEmp);

                    $l_insert_GrabEmp = $query_GrabEmp->execute();
                }
            }


            // Inicia Grabado Forro del Cajon


            if (array_key_exists("GrabadoFcaj", $aJson)) {

                $v_GrabFcaj = $aJson['GrabadoFcaj'];
                $v_tmp_R    = array_values($v_GrabFcaj);

                $cuantos_v_GrabFcaj = count($v_GrabFcaj);


                for ($k = 0; $k < $cuantos_v_GrabFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $ubicacion              = trim(strval($v_tmp_R[$k]['ubicacion']));
                    $placa_area             = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario   = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo            = floatval($v_tmp_R[$k]['placa_costo']);
                    $arreglo_costo_unitario = intval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo          = intval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_GrabFcaj = "INSERT INTO cot_alm_grabfcaj
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabFcaj = $this->db->prepare($sql_GrabFcaj);

                    $l_insert_GrabFcaj = $query_GrabFcaj->execute();
                }
            }


            // Inicia  Grabado Forro de la Cartera

            if (array_key_exists("GrabadoFcar", $aJson)) {

                $v_GrabFcar = $aJson['GrabadoFcar'];
                $v_tmp_R    = array_values($v_GrabFcar);

                $cuantos_v_GrabFcar = count($v_GrabFcar);

                for ($k = 0; $k < $cuantos_v_GrabFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $ubicacion              = trim(strval($v_tmp_R[$k]['ubicacion']));
                    $placa_area             = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario   = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo            = floatval($v_tmp_R[$k]['placa_costo']);
                    $arreglo_costo_unitario = intval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo          = intval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_GrabFcar = "INSERT INTO cot_alm_grabfcar
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabFcar = $this->db->prepare($sql_GrabFcar);

                    $l_insert_GrabFcar = $query_GrabFcar->execute();
                }
            }


            // Inicia  Grabado Guarda

            if (array_key_exists("GrabadoG", $aJson)) {

                $v_GrabG = $aJson['GrabadoG'];
                $v_tmp_R = array_values($v_GrabG);

                $cuantos_v_GrabG = count($v_GrabG);

                for ($k = 0; $k < $cuantos_v_GrabG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $ubicacion              = trim(strval($v_tmp_R[$k]['ubicacion']));
                    $placa_area             = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario   = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo            = floatval($v_tmp_R[$k]['placa_costo']);
                    $arreglo_costo_unitario = intval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo          = intval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario         = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_GrabG = "INSERT INTO cot_alm_grabguarda
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabG = $this->db->prepare($sql_GrabG);

                    $l_insert_GrabG = $query_GrabG->execute();
                }
            }


        /*************** HotStamping *******************/

            // Inicia HotStamping Empalmme

            if (array_key_exists("HotStamping", $aJson)) {

                $v_HSEmp = $aJson['HotStamping'];
                $v_tmp_R = array_values($v_HSEmp);

                $cuantos_v_HSEmp = count($v_HSEmp);

                for ($k = 0; $k < $cuantos_v_HSEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                   = intval($v_tmp_R[$k]['Largo']);
                    $ancho                   = intval($v_tmp_R[$k]['Ancho']);
                    $color                   = trim(strval($v_tmp_R[$k]['Color']));
                    $placa_area              = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario    = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo             = floatval($v_tmp_R[$k]['placa_costo']);
                    $pelicula_largo          = intval($v_tmp_R[$k]['pelicula_Largo']);
                    $pelicula_ancho          = intval($v_tmp_R[$k]['pelicula_Ancho']);
                    $pelicula_area           = floatval($v_tmp_R[$k]['pelicula_area']);
                    $pelicula_costo_unitario = floatval($v_tmp_R[$k]['pelicula_costo_unitario']);
                    $pelicula_costo          = floatval($v_tmp_R[$k]['pelicula_costo']);
                    $arreglo_costo_unitario  = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo           = floatval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario          = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro              = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso       = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_HSEmp = "INSERT INTO cot_alm_hsemp
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_HSEmp = $this->db->prepare($sql_HSEmp);

                    $l_insert_HSEmp = $query_HSEmp->execute();
                }
            }


            // Inicia HotStamping Forro Cajon

            if (array_key_exists("HotStampingFcaj", $aJson)) {

                $v_HSFcaj = $aJson['HotStampingFcaj'];
                $v_tmp_R  = array_values($v_HSFcaj);

                $cuantos_v_HSFcaj = count($v_HSFcaj);

                for ($k = 0; $k < $cuantos_v_HSFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                   = intval($v_tmp_R[$k]['Largo']);
                    $ancho                   = intval($v_tmp_R[$k]['Ancho']);
                    $color                   = trim(strval($v_tmp_R[$k]['Color']));
                    $placa_area              = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario    = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo             = floatval($v_tmp_R[$k]['placa_costo']);
                    $pelicula_largo          = intval($v_tmp_R[$k]['pelicula_Largo']);
                    $pelicula_ancho          = intval($v_tmp_R[$k]['pelicula_Ancho']);
                    $pelicula_area           = floatval($v_tmp_R[$k]['pelicula_area']);
                    $pelicula_costo_unitario = floatval($v_tmp_R[$k]['pelicula_costo_unitario']);
                    $pelicula_costo          = floatval($v_tmp_R[$k]['pelicula_costo']);
                    $arreglo_costo_unitario  = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo           = floatval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario          = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro              = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso       = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_HSFcaj = "INSERT INTO cot_alm_hsfcaj
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_HSFcaj = $this->db->prepare($sql_HSFcaj);

                    $l_insert_HSFcaj = $query_HSFcaj->execute();
                }
            }


            // Inicia HotStamping Forro Cartera

            if (array_key_exists("HotStampingFcar", $aJson)) {

                $v_HSFcar = $aJson['HotStampingFcar'];
                $v_tmp_R  = array_values($v_HSFcar);

                $cuantos_v_HSFcar = count($v_HSFcar);

                for ($k = 0; $k < $cuantos_v_HSFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado             = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                   = intval($v_tmp_R[$k]['Largo']);
                    $ancho                   = intval($v_tmp_R[$k]['Ancho']);
                    $Color                   = trim(strval($v_tmp_R[$k]['Color']));
                    $placa_area              = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario    = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo             = floatval($v_tmp_R[$k]['placa_costo']);
                    $pelicula_largo          = intval($v_tmp_R[$k]['pelicula_Largo']);
                    $pelicula_ancho          = intval($v_tmp_R[$k]['pelicula_Ancho']);
                    $pelicula_area           = floatval($v_tmp_R[$k]['pelicula_area']);
                    $pelicula_costo_unitario = floatval($v_tmp_R[$k]['pelicula_costo_unitario']);
                    $pelicula_costo          = floatval($v_tmp_R[$k]['pelicula_costo']);
                    $arreglo_costo_unitario  = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo           = floatval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario          = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro              = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso       = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_HSFcar = "INSERT INTO cot_alm_hsfcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area,pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso,   $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_HSFcar = $this->db->prepare($sql_HSFcar);

                    $l_insert_HSFcar = $query_HSFcar->execute();
                }
            }


            // Inicia HotStamping Guarda

            if (array_key_exists("HotStampingG", $aJson)) {

                $v_HSG   = $aJson['HotStampingG'];
                $v_tmp_R = array_values($v_HSG);

                $cuantos_v_HSG = count($v_HSG);

                for ($k = 0; $k < $cuantos_v_HSG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                   = intval($v_tmp_R[$k]['Largo']);
                    $ancho                   = intval($v_tmp_R[$k]['Ancho']);
                    $color                   = trim(strval($v_tmp_R[$k]['Color']));
                    $placa_area              = floatval($v_tmp_R[$k]['placa_area']);
                    $placa_costo_unitario    = floatval($v_tmp_R[$k]['placa_costo_unitario']);
                    $placa_costo             = floatval($v_tmp_R[$k]['placa_costo']);
                    $pelicula_largo          = intval($v_tmp_R[$k]['pelicula_Largo']);
                    $pelicula_ancho          = intval($v_tmp_R[$k]['pelicula_Ancho']);
                    $pelicula_area           = floatval($v_tmp_R[$k]['pelicula_area']);
                    $pelicula_costo_unitario = floatval($v_tmp_R[$k]['pelicula_costo_unitario']);
                    $pelicula_costo          = floatval($v_tmp_R[$k]['pelicula_costo']);
                    $arreglo_costo_unitario  = floatval($v_tmp_R[$k]['arreglo_costo_unitario']);
                    $arreglo_costo           = floatval($v_tmp_R[$k]['arreglo_costo']);
                    $costo_unitario          = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tiro              = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso       = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_HSG = "INSERT INTO cot_alm_hsguarda
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, '$color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_HSG = $this->db->prepare($sql_HSG);

                    $l_insert_HSG = $query_HSG->execute();
                }
            }


        /*************** Laminado **********************/

            // Inicia Laminado Empalme

            if (array_key_exists("Laminado", $aJson)) {

                $v_LamEmp = $aJson['Laminado'];
                $v_tmp_R  = array_values($v_LamEmp);

                $cuantos_v_LamEmp = count($v_LamEmp);

                for ($k = 0; $k < $cuantos_v_LamEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo             = intval($v_tmp_R[$k]['Largo']);
                    $ancho             = intval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_LamEmp = "INSERT INTO cot_alm_lamemp
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_LamEmp = $this->db->prepare($sql_LamEmp);

                    $l_insert_LamEmp = $query_LamEmp->execute();
                }
            }


            // Inicia Laminado Forro del Cajon

            if (array_key_exists("LaminadoFcaj", $aJson)) {

                $v_LamFcaj = $aJson['LaminadoFcaj'];
                $v_tmp_R   = array_values($v_LamFcaj);

                $cuantos_v_LamFcaj = count($v_LamFcaj);

                for ($k = 0; $k < $cuantos_v_LamFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));

                    $largo             = intval($v_tmp_R[$k]['Largo']);
                    $ancho             = intval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_LamFcaj = "INSERT INTO cot_alm_lamfcaj
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_LamFcaj = $this->db->prepare($sql_LamFcaj);

                    $l_insert_LamFcaj = $query_LamFcaj->execute();
                }
            }


            // Inicia Laminado Forro Cartera

            if (array_key_exists("LaminadoFcar", $aJson)) {

                $v_LamFcar = $aJson['LaminadoFcar'];
                $v_tmp_R   = array_values($v_LamFcar);

                $cuantos_v_LamFcar = count($v_LamFcar);

                for ($k = 0; $k < $cuantos_v_LamFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo             = intval($v_tmp_R[$k]['Largo']);
                    $ancho             = intval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_LamFcar = "INSERT INTO cot_alm_lamfcar
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_LamFcar = $this->db->prepare($sql_LamFcar);

                    $l_insert_LamFcar = $query_LamFcar->execute();
                }
            }


            // Inicia Laminado Guarda

            if (array_key_exists("LaminadoG", $aJson)) {

                $v_LamG  = $aJson['LaminadoG'];
                $v_tmp_R = array_values($v_LamG);

                $cuantos_v_LamG = count($v_LamG);

                for ($k = 0; $k < $cuantos_v_LamG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado      = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo             = intval($v_tmp_R[$k]['Largo']);
                    $ancho             = intval($v_tmp_R[$k]['Ancho']);
                    $area              = floatval($v_tmp_R[$k]['area']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_LamG = "INSERT INTO cot_alm_lamguarda
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_LamG = $this->db->prepare($sql_LamG);

                    $l_insert_LamG = $query_LamG->execute();
                }
            }


        /****************** Suaje **********************/

            // Inicia Suaje Empalme

            if (array_key_exists("Suaje", $aJson)) {

                $v_SuaEmp = $aJson['Suaje'];
                $v_tmp_R  = array_values($v_SuaEmp);

                $cuantos_v_SuaEmp = count($v_SuaEmp);

                for ($k = 0; $k < $cuantos_v_SuaEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $perimetro              = intval($v_tmp_R[$k]['perimetro']);
                    $tabla_suaje            = floatval($v_tmp_R[$k]['tabla_suaje']);
                    $arreglo_costo_unitario = floatval($v_tmp_R[$k]['arreglo']);
                    $tiro_costo_unitario    = floatval($v_tmp_R[$k]['tiro_costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SuaEmp = "INSERT INTO cot_alm_suajeemp
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaEmp = $this->db->prepare($sql_SuaEmp);

                    $l_insert_SuaEmp = $query_SuaEmp->execute();
                }
            }


            // Inicia Suaje Forro Cajon

            if (array_key_exists("SuajeFcaj", $aJson)) {

                $v_SuaFcaj = $aJson['SuajeFcaj'];
                $v_tmp_R   = array_values($v_SuaFcaj);

                $cuantos_v_SuaFcaj = count($v_SuaFcaj);


                for ($k = 0; $k < $cuantos_v_SuaFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $perimetro              = intval($v_tmp_R[$k]['perimetro']);
                    $tabla_suaje            = intval($v_tmp_R[$k]['tabla_suaje']);
                    $arreglo_costo_unitario = floatval($v_tmp_R[$k]['arreglo']);
                    $tiro_costo_unitario    = floatval($v_tmp_R[$k]['tiro_costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SuaFcaj = "INSERT INTO cot_alm_suajefcaj
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaFcaj = $this->db->prepare($sql_SuaFcaj);

                    $l_insert_SuaFcaj = $query_SuaFcaj->execute();
                }
            }


            // Inicia Suaje Forro Cartera

            if (array_key_exists("SuajeFcar", $aJson)) {

                $v_SuaFcar = $aJson['SuajeFcar'];
                $v_tmp_R   = array_values($v_SuaFcar);

                $cuantos_v_SuaFcar = count($v_SuaFcar);

                for ($k = 0; $k < $cuantos_v_SuaFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $perimetro              = intval($v_tmp_R[$k]['perimetro']);
                    $arreglo_costo_unitario = floatval($v_tmp_R[$k]['arreglo']);
                    $tabla_suaje            = floatval($v_tmp_R[$k]['tabla_suaje']);
                    $tiro_costo_unitario    = floatval($v_tmp_R[$k]['tiro_costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SuaFcar = "INSERT INTO cot_alm_suajefcar
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje,  arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaFcar = $this->db->prepare($sql_SuaFcar);

                    $l_insert_SuaFcar = $query_SuaFcar->execute();
                }
            }


            // Inicia Suaje Guarda

            if (array_key_exists("SuajeG", $aJson)) {

                $v_SuaG  = $aJson['SuajeG'];
                $v_tmp_R = array_values($v_SuaG);

                $cuantos_v_SuaG = count($v_SuaG);

                for ($k = 0; $k < $cuantos_v_SuaG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo_grabado           = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $largo                  = intval($v_tmp_R[$k]['Largo']);
                    $ancho                  = intval($v_tmp_R[$k]['Ancho']);
                    $perimetro              = intval($v_tmp_R[$k]['perimetro']);
                    $tabla_suaje            = intval($v_tmp_R[$k]['tabla_suaje']);
                    $arreglo_costo_unitario = floatval($v_tmp_R[$k]['arreglo']);
                    $tiro_costo_unitario    = floatval($v_tmp_R[$k]['tiro_costo_unitario']);
                    $costo_tiro             = floatval($v_tmp_R[$k]['costo_tiro']);
                    $costo_tot_proceso      = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_merma        = floatval($v_tmp_R[$k]['mermas']['costo_unit_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SuaG = "INSERT INTO cot_alm_suajeguarda
                        (id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaG = $this->db->prepare($sql_SuaG);

                    $l_insert_SuaG = $query_SuaG->execute();
                }
            }



    /*************** Termina Acabados *****************/

            // variables booleanas

            //and ($inserted_cliem and $inserted_clied)
            if (
                ($inserted and $inserted_mod and $inserted_calc)
                and ($inserted_papel_emp and $inserted_papel_fcaj)
                and ($l_corte_emp and $l_corte_fcaj)
                and ($l_corte_fcar and $l_corte_guarda)
                and ($l_corte_carton_emp and $l_corte_carton_fcar)
                and ($inserted_papel_fcar and $inserted_papel_g)
                and ($inserted_papel_caj and $inserted_papel_car)
                and ($inserted_elab_car and $inserted_elab_guarda)
                and ($inserted_ranurado and $inserted_ranurado_fcar)
                and ($l_arr_ran_hor_emp and $l_arr_ran_vert_emp and $l_arreglo_ranurado_fcar)
                and ($inserted_encuadernacion and $inserted_encuadernacion_fcaj)
                and ($l_despunte_esquinas and $l_pegado_guarda and $l_armado_caja_final)
                and ($l_insert_cierres and $l_insert_bancos and $l_insert_accesorios)
                and ($l_insert_OffEmp and $l_insert_OffFcaj)
                and ($l_insert_OffFcar and $l_insert_OffG)
                and ($l_insert_Off_maq_Emp and $l_insert_Off_maq_Fcaj)
                and ($l_insert_Off_maq_Fcar and $l_insert_Off_maq_G)
                and ($l_insert_DigEmp and $l_insert_DigFCaj)
                and ($l_insert_DigFCar and $l_insert_DigG)
                and ($l_insert_SerEmp and $l_insert_SerFCaj)
                and ($l_insert_SerFCar and $l_insert_SerG)
                and ($l_insert_LamEmp and $l_insert_LamFcaj)
                and ($l_insert_LamFcar and $l_insert_LamG)
                and ($l_insert_HSEmp and $l_insert_HSFcaj)
                and ($l_insert_HSFcar and $l_insert_HSG)
                and ($l_insert_GrabEmp and $l_insert_GrabFcaj)
                and ($l_insert_GrabFcar and $l_insert_GrabG)
                and ($l_insert_BUVEmp and $l_insert_BUVFcaj)
                and ($l_insert_BUVFcar and $l_insert_BUVG)
                and ($l_insert_SuaEmp and $l_insert_SuaFcaj)
                and ($l_insert_SuaFcar and $l_insert_SuaG)
                and ($l_insert_LaserEmp and $l_insert_LaserFcaj)
                and ($l_insert_LaserFcar and $l_insert_LaserG)
               ) {

                $this->db->commit();

                return $aJson;
            } else {

                $this->db->rollBack();

                return false;
            }
        } catch (PDOException $exception) {
        //} catch (Exception $e) {

            $this->db->rollBack();

            $excepcion = $exception->getMessage();

            $excepcion_pos  = strpos($excepcion, "Field");
            $excepcion_pos1 = strpos($excepcion, "General");

            if ($excepcion_pos) {

                $mensaje = substr($excepcion, $excepcion_pos);
            } elseif($excepcion_pos1) {

                $mensaje = substr($excepcion, $excepcion_pos1);
            } else {

                $mensaje = $exception->getMessage();
            }

            $aJson['error'] = $mensaje . "; Error al grabar en la BD";

            return $aJson;
        }
    }
}
