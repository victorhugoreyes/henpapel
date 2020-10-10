<?php

class CircularModel {

    function __construct($db) {
        try {            $this->db = $db;
        } catch (PDOException $e) {

            exit('Ups! Error de conexion a la Base de Datos.');
        }
    }



    // Tablas Offset
    public function getOffsetTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                     = intval($row['id']);
            $result[$iii]['id_odt']                 = intval($row['id_odt']);
            $result[$iii]['id_modelo']              = intval($row['id_modelo']);
            $result[$iii]['tipo']                   = utf8_encode(trim(strval($row['tipo'])));
            $result[$iii]['tiraje']                 = intval($row['tiraje']);
            $result[$iii]['num_tintas']             = intval($row['num_tintas']);
            $result[$iii]['costo_unitario_laminas'] = floatval($row['costo_unitario_laminas']);
            $result[$iii]['costo_laminas']          = floatval($row['costo_laminas']);
            $result[$iii]['arreglo_costo']          = floatval($row['arreglo_costo']);
            $result[$iii]['arreglo_costo_unitario'] = floatval($row['arreglo_costo_unitario']);
            $result[$iii]['costo_unitario']         = floatval($row['costo_unitario']);
            $result[$iii]['costo_tot']              = floatval($row['costo_tot']);
            $result[$iii]['costo_tot_proceso']      = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }


    // Tablas Digital
    public function getDigitalTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                = intval($row['id']);
            $result[$iii]['id_odt']            = intval($row['id_odt']);
            $result[$iii]['id_modelo']         = intval($row['id_modelo']);
            $result[$iii]['cabe_digital']      = trim(strval($row['cabe_digital']));
            $result[$iii]['tiraje']            = intval($row['tiraje']);
            $result[$iii]['corte_ancho']       = floatval($row['corte_ancho']);
            $result[$iii]['corte_largo']       = floatval($row['corte_largo']);
            $result[$iii]['imp_ancho']         = floatval($row['imp_ancho']);
            $result[$iii]['imp_largo']         = floatval($row['imp_largo']);
            $result[$iii]['impresion']         = trim(strval($row['impresion']));
            $result[$iii]['costo_unitario ']   = floatval($row['costo_unitario']);
            $result[$iii]['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }

    // Tablas serigrafia
    public function getSerigrafiaTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                 = intval($row['id']);
            $result[$iii]['id_odt']             = intval($row['id_odt']);
            $result[$iii]['id_modelo']          = intval($row['id_modelo']);
            $result[$iii]['tipo']               = utf8_encode(trim(strval($row['tipo'])));
            $result[$iii]['tiraje']             = intval($row['tiraje']);
            $result[$iii]['num_tintas']         = intval($row['num_tintas']);
            $result[$iii]['cortes_por_pliego']  = intval($row['cortes_por_pliego']);
            $result[$iii]['costo_unit_arreglo'] = floatval($row['costo_unit_arreglo']);
            $result[$iii]['costo_arreglo']      = intval($row['costo_arreglo']);
            $result[$iii]['costo_unit_tiro']    = floatval($row['costo_unit_tiro']);
            $result[$iii]['costo_tiro']         = floatval($row['costo_tiro']);
            $result[$iii]['costo_tot_proceso']  = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }


    // Tablas barnizuv
    public function getBarnizuvTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                 = intval($row['id']);
            $result[$iii]['id_odt']             = intval($row['id_odt']);
            $result[$iii]['id_modelo']          = intval($row['id_modelo']);
            $result[$iii]['tipo_grabado']       = utf8_encode(trim(strval($row['tipo_grabado'])));
            $result[$iii]['largo']             = floatval($row['largo']);
            $result[$iii]['ancho']             = floatval($row['ancho']);
            $result[$iii]['area']              = floatval($row['area']);
            $result[$iii]['costo_unitario']    = floatval($row['costo_unitario']);
            $result[$iii]['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);
            $result[$iii]['cortes_por_pliego'] = intval($row['cortes_por_pliego']);

            $iii++;
        }

        return $result;
    }


    // Tablas corte laser
    public function getLaserTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                = intval($row['id']);
            $result[$iii]['id_odt']            = intval($row['id_odt']);
            $result[$iii]['id_modelo']         = intval($row['id_modelo']);
            $result[$iii]['tipo_grabado']      = utf8_encode(trim(strval($row['tipo_grabado'])));
            $result[$iii]['largo']             = floatval($row['largo']);
            $result[$iii]['ancho']             = floatval($row['ancho']);
            $result[$iii]['costo_unitario']    = floatval($row['costo_unitario']);
            $result[$iii]['tiempo_requerido']  = floatval($row['tiempo_requerido']);
            $result[$iii]['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }


    // Tablas grabado
    public function getGrabadoTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                     = intval($row['id']);
            $result[$iii]['id_odt']                 = intval($row['id_odt']);
            $result[$iii]['id_modelo']              = intval($row['id_modelo']);
            $result[$iii]['tipo_grabado']           = utf8_encode(trim(strval($row['tipo_grabado'])));
            $result[$iii]['largo']                  = floatval($row['largo']);
            $result[$iii]['ancho']                  = floatval($row['ancho']);
            $result[$iii]['ubicacion']              = trim(strval($row['ubicacion']));
            $result[$iii]['placa_area']             = floatval($row['placa_area']);
            $result[$iii]['placa_costo_unitario']   = floatval($row['placa_costo_unitario']);
            $result[$iii]['placa_costo']            = floatval($row['placa_costo']);
            $result[$iii]['arreglo_costo_unitario'] = floatval($row['arreglo_costo_unitario']);
            $result[$iii]['arreglo_costo']          = floatval($row['arreglo_costo']);
            $result[$iii]['costo_unitario']         = floatval($row['costo_unitario']);
            $result[$iii]['costo_tiro']             = floatval($row['costo_tiro']);
            $result[$iii]['costo_tot_proceso']      = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }


    // Tablas HotStamping
    public function getHotStampingTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                      = intval($row['id']);
            $result[$iii]['id_odt']                  = intval($row['id_odt']);
            $result[$iii]['id_modelo']               = intval($row['id_modelo']);
            $result[$iii]['tipo_grabado']            = utf8_encode(trim(strval($row['tipo_grabado'])));
            $result[$iii]['largo']                   = floatval($row['largo']);
            $result[$iii]['ancho']                   = floatval($row['ancho']);
            $result[$iii]['color']                   = trim(strval($row['color']));
            $result[$iii]['placa_area']              = floatval($row['placa_area']);
            $result[$iii]['placa_costo_unitario']    = floatval($row['placa_costo_unitario']);
            $result[$iii]['placa_costo']             = floatval($row['placa_costo']);
            $result[$iii]['pelicula_largo']          = intval($row['pelicula_largo']);
            $result[$iii]['pelicula_ancho']          = intval($row['pelicula_ancho']);
            $result[$iii]['pelicula_area']           = floatval($row['pelicula_area']);
            $result[$iii]['pelicula_costo_unitario'] = floatval($row['pelicula_costo_unitario']);
            $result[$iii]['pelicula_costo']          = floatval($row['pelicula_costo']);
            $result[$iii]['arreglo_costo_unitario']  = floatval($row['arreglo_costo_unitario']);
            $result[$iii]['arreglo_costo']           = floatval($row['arreglo_costo']);
            $result[$iii]['costo_unitario']          = floatval($row['costo_unitario']);
            $result[$iii]['costo_tiro']              = floatval($row['costo_tiro']);
            $result[$iii]['costo_tot_proceso']       = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }


    // Tablas Suaje
    public function getSuajeTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                      = intval($row['id']);
            $result[$iii]['id_odt']                  = intval($row['id_odt']);
            $result[$iii]['id_modelo']               = intval($row['id_modelo']);
            $result[$iii]['tipo_grabado']            = utf8_encode(trim(strval($row['tipo_grabado'])));
            $result[$iii]['largo']                   = floatval($row['largo']);
            $result[$iii]['ancho']                   = floatval($row['ancho']);
            $result[$iii]['perimetro']              = intval($row['perimetro']);
            $result[$iii]['tabla_suaje']    = floatval($row['tabla_suaje']);
            $result[$iii]['arreglo_costo_unitario']    = floatval($row['arreglo_costo_unitario']);
            $result[$iii]['tiro_costo_unitario']             = floatval($row['tiro_costo_unitario']);
            $result[$iii]['costo_tiro']          = intval($row['costo_tiro']);

            $iii++;
        }

        return $result;
    }


    // Tablas Laminado
    public function getLaminadoTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        $iii = 0;
        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[$iii]['id']                = intval($row['id']);
            $result[$iii]['id_odt']            = intval($row['id_odt']);
            $result[$iii]['id_modelo']         = intval($row['id_modelo']);
            $result[$iii]['tipo_grabado']      = utf8_encode(trim(strval($row['tipo_grabado'])));
            $result[$iii]['largo']             = floatval($row['largo']);
            $result[$iii]['ancho']             = floatval($row['ancho']);
            $result[$iii]['area']              = floatval($row['area']);
            $result[$iii]['costo_unitario']    = floatval($row['costo_unitario']);
            $result[$iii]['costo_tot_proceso'] = floatval($row['costo_tot_proceso']);

            $iii++;
        }

        return $result;
    }


    public function readODT($num_odt) {

        $sql = "SELECT * from cot_odt where status = 'A' and num_odt = '" . $num_odt . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function insertCircular(&$aJson, $ventas_model) {

        $fecha = TODAY;

        $d_fecha = date("Y-m-d", strtotime($fecha));

        $time  = date("H:i:s", time());

        $id_usuario = $aJson['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_modelo         = intval($aJson['modelo']);
        $nomb_odt          = strtoupper(trim(strval($aJson['nomb_odt'])));
        $id_cliente        = intval($aJson['id_cliente']);
        $tiraje            = intval($aJson['tiraje']);
        $diametro          = floatval($aJson['diametro']);
        $profundidad       = floatval($aJson['profundidad']);
        $altura_tapa       = floatval($aJson['altura_tapa']);
        $id_grosor_carton  = intval($aJson['grosor_carton']['id_carton']);
        $id_usuario        = intval($aJson['id_usuario']);
        $id_tienda         = intval($aJson['id_tienda']);
        $id_papel_BCaj     = intval($aJson['papel_BCaj']['id_papel']);
        $id_papel_CirCaj   = intval($aJson['papel_CirCaj']['id_papel']);
        $id_papel_FextCaj  = intval($aJson['papel_FextCaj']['id_papel']);
        $id_papel_PomCaj   = intval($aJson['papel_PomCaj']['id_papel']);
        $id_papel_FintCaj  = intval($aJson['papel_FintCaj']['id_papel']);
        $id_papel_BasTap   = intval($aJson['papel_BasTap']['id_papel']);
        $id_papel_CirTap   = intval($aJson['papel_CirTap']['id_papel']);
        $id_papel_ForTap   = intval($aJson['papel_ForTap']['id_papel']);
        $id_papel_FexTap   = intval($aJson['papel_FexTap']['id_papel']);
        $id_papel_FinTap   = intval($aJson['papel_FinTap']['id_papel']);


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

        $keys              = trim(strval($aJson['keys']));


        $l_existe = $ventas_model->chkODT();

        if (!$l_existe) {

            $aJson['mensaje'] = "ERROR";
            $aJson['error']   = "Ya existe esta Orden de Trabajo...";

            return $aJson;
        }


        // variables booleanas

        $l_inserted = true;

        $l_modificar_odt = false;

        $modificar = $_POST['modificar'];
        $modificar = trim(strval($modificar));

        if ($modificar == "SI") {

            $l_modificar_odt = true;

            $id_odt_ant = intval($_POST['id_cot_odt_ant']);
        }

        try {

            $this->db->beginTransaction();

            if ($l_modificar_odt) {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, diametro, id_vendedor, id_tienda, profundidad, alto, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, id_odt_ant, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$nomb_odt', $id_cliente, $tiraje, $diametro, $id_usuario, $id_tienda, $profundidad, $altura_tapa, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', $id_odt_ant, '$d_fecha', '$time')";
            } else {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, diametro, id_vendedor, id_tienda, profundidad, alto, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$nomb_odt', $id_cliente, $tiraje, $diametro, $id_usuario, $id_tienda, $profundidad, $altura_tapa, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', '$d_fecha', '$time')";
            }

            $query_odt = $this->db->prepare($sql);

            $l_inserted = $query_odt->execute();

            $id_caja_odt = 0;

            $id_caja_odt = $this->db->lastInsertId();
            $id_caja_odt = intval($id_caja_odt);

            if ($id_caja_odt <= 0 or !$l_inserted) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_odt" . $sql;

                $l_inserted = false;
            }


            if ($l_modificar_odt) {

                //$sql_mod = "UPDATE cot_odt SET status = 'M', id_odt_ant = " . $id_caja_odt . ", id_usuario_baja = " . $id_usuario . ", fecha_baja = '$d_fecha', hora_baja = '$time' WHERE id_odt = " . $id_odt_ant;
                $sql_mod = "UPDATE cot_odt SET status = 'M', id_usuario_baja = " . $id_usuario . ", fecha_baja = '$d_fecha', hora_baja = '$time' WHERE id_odt = " . $id_odt_ant;
                //$sql_mod = "UPDATE cot_odt SET status = 'M' WHERE id_odt = " . $id_odt_anterior;

                $query_mod_odt = $this->db->prepare($sql_mod);

                $mod_odt = $query_mod_odt->execute();

                if (!$mod_odt) {

                    $aJson['mensaje'] = "ERROR";
                    $aJson['error']   = $aJson['error'] . "; Error al actualizar en la tabla cot_odt " . $sql_mod;

                    $l_inserted = false;
                    $mod_odt    = false;
                }
            }

        // Calculadora
            $l_calculadora = true;

            $id_modelo = intval($aJson['modelo']);

            $d     = floatval($aJson['Calculadora']['d']);
            $p     = floatval($aJson['Calculadora']['p']);
            $P     = floatval($aJson['Calculadora']['P']);
            $g     = floatval($aJson['Calculadora']['g']);
            $e     = floatval($aJson['Calculadora']['e']);
            $z     = floatval($aJson['Calculadora']['z']);
            $z_1   = floatval($aJson['Calculadora']['z_1']);
            $d_1   = floatval($aJson['Calculadora']['d_1']);
            $p_1   = floatval($aJson['Calculadora']['p_1']);
            $c     = floatval($aJson['Calculadora']['c']);
            $d_1_1 = floatval($aJson['Calculadora']['d_1_1']);
            $r     = floatval($aJson['Calculadora']['r']);
            $p_1_1 = floatval($aJson['Calculadora']['p_1_1']);
            $c_1   = floatval($aJson['Calculadora']['c_1']);
            $i     = floatval($aJson['Calculadora']['i']);
            $c_1_1 = floatval($aJson['Calculadora']['c_1_1']);
            $D     = floatval($aJson['Calculadora']['D']);
            $Z     = floatval($aJson['Calculadora']['Z']);
            $Z_1   = floatval($aJson['Calculadora']['Z_1']);
            $D_1   = floatval($aJson['Calculadora']['D_1']);
            $C     = floatval($aJson['Calculadora']['C']);
            $D_1_1 = floatval($aJson['Calculadora']['D_1_1']);
            $R     = floatval($aJson['Calculadora']['R']);
            $P_1   = floatval($aJson['Calculadora']['P_1']);
            $P_1_1 = floatval($aJson['Calculadora']['P_1_1']);
            $C_1   = floatval($aJson['Calculadora']['C_1']);
            $C_1_1 = floatval($aJson['Calculadora']['C_1_1']);



            $sql_calculadora = "INSERT INTO cot_cir_calculadora(id_modelo, id_odt, d, p, p_may, g, e, z, z_1, d_1, p_1, c, d_1_1, r, p_1_1, c_1, i, c_1_1, d_may, z_may, z1_may, d1_may, c_may, d11_may, r_may, p1_may, p11_may, c1_may, c11_may, fecha_odt, hora_odt)
                VALUES($id_modelo, $id_caja_odt, $d, $p, $P, $g, $e, $z, $z_1, $d_1, $p_1, $c, $d_1_1, $r, $p_1_1, $c_1, $i, $c_1_1, $D, $Z, $Z_1, $D_1, $C, $D_1_1, $R, $P_1, $P_1_1, $C_1, $C_1_1, '$d_fecha', '$time')";

            $query_calculadora = $this->db->prepare($sql_calculadora);

            $l_calculadora = $query_calculadora->execute();

            if (!$l_calculadora) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_calculadora;" . $sql_calculadora;

                $l_calculadora = false;
            }


            $inserted_papel_cir = true;

            $id_carton     = intval($aJson['grosor_carton']['id_carton']);
            $cantidad      = $tiraje;
            $grosor_carton = floatval($aJson['grosor_carton']['grosor_carton']);
            $nombre        = trim(strval($aJson['grosor_carton']['nombre']));
            $costo_unit    = floatval($aJson['grosor_carton']['costo_unit']);
            $ancho         = floatval($aJson['grosor_carton']['ancho']);
            $largo         = floatval($aJson['grosor_carton']['largo']);
            $c_ancho       = floatval($aJson['grosor_carton']['calculadora']['c_ancho']);
            $c_largo       = floatval($aJson['grosor_carton']['calculadora']['c_largo']);
            $corte         = intval($aJson['grosor_carton']['corte']);
            $tot_pliegos   = floatval($aJson['grosor_carton']['tot_pliegos']);
            $tot_costo     = floatval($aJson['grosor_carton']['tot_costo']);

        // Carton Cajon
            $sql_papel_cir = "INSERT INTO cot_cir_cartoncir
                (id_modelo, id_odt, id_cajon, num_cajon, tiraje, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha, hora)
            VALUES
                ($id_modelo, $id_caja_odt, $id_carton, $grosor_carton, $tiraje, '$nombre', $costo_unit, $ancho, $largo, $c_ancho, $c_largo, $corte, $tot_pliegos, $tot_costo, '$d_fecha', '$time')";


            $query_papel_cir = $this->db->prepare($sql_papel_cir);

            $inserted_papel_cir = $query_papel_cir->execute();

            if (!$inserted_papel_cir) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_cartoncir";

                $inserted_papel_cir = false;
            }

    /********* inicia papeles ************/

        // papel bcaj
            $inserted_papel_bcaj = true;

            $id_papel          = intval($aJson['papel_BCaj']['id_papel']);
            $nombre            = trim(strval($aJson['papel_BCaj']['nombre_papel']));
            $ancho             = floatval($aJson['papel_BCaj']['ancho_papel']);
            $largo             = floatval($aJson['papel_BCaj']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_BCaj']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_BCaj']['corte']);
            $pliegos           = intval($aJson['papel_BCaj']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_BCaj']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_BCaj']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_BCaj']['calculadora']['corte_largo']);

            $sql_papel_bcaj = "INSERT INTO cot_cir_papelbcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_bcaj = $this->db->prepare($sql_papel_bcaj);

            $inserted_papel_bcaj = $query_papel_bcaj->execute();

            if (!$inserted_papel_bcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelbcaj";

                $inserted_papel_bcaj = false;
            }


        // papel circaj
            $inserted_papel_circaj = true;

            $id_papel          = intval($aJson['papel_CirCaj']['id_papel']);
            $nombre            = trim(strval($aJson['papel_CirCaj']['nombre_papel']));
            $ancho             = floatval($aJson['papel_CirCaj']['ancho_papel']);
            $largo             = floatval($aJson['papel_CirCaj']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_CirCaj']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_CirCaj']['corte']);
            $pliegos           = intval($aJson['papel_CirCaj']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_CirCaj']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_CirCaj']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_CirCaj']['calculadora']['corte_largo']);

            $sql_papel_circaj = "INSERT INTO cot_cir_papelcircaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_circaj = $this->db->prepare($sql_papel_circaj);

            $inserted_papel_circaj = $query_papel_circaj->execute();

            if (!$inserted_papel_circaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelcircaj";

                $inserted_papel_circaj = false;
            }


        // papel fextcaj
            $inserted_papel_fextcaj = true;

            $id_papel          = intval($aJson['papel_FextCaj']['id_papel']);
            $nombre            = trim(strval($aJson['papel_FextCaj']['nombre_papel']));
            $ancho             = floatval($aJson['papel_FextCaj']['ancho_papel']);
            $largo             = floatval($aJson['papel_FextCaj']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_FextCaj']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_FextCaj']['corte']);
            $pliegos           = intval($aJson['papel_FextCaj']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_FextCaj']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_FextCaj']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_FextCaj']['calculadora']['corte_largo']);

            $sql_papel_fextcaj = "INSERT INTO cot_cir_papelfextcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_fextcaj = $this->db->prepare($sql_papel_fextcaj);

            $inserted_papel_fextcaj = $query_papel_fextcaj->execute();

            if (!$inserted_papel_fextcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelfextcaj";

                $inserted_papel_fextcaj = false;
            }


        // papel pomcaj
            $inserted_papel_pomcaj = true;

            $id_papel          = intval($aJson['papel_PomCaj']['id_papel']);
            $nombre            = trim(strval($aJson['papel_PomCaj']['nombre_papel']));
            $ancho             = floatval($aJson['papel_PomCaj']['ancho_papel']);
            $largo             = floatval($aJson['papel_PomCaj']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_PomCaj']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_PomCaj']['corte']);
            $pliegos           = intval($aJson['papel_PomCaj']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_PomCaj']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_PomCaj']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_PomCaj']['calculadora']['corte_largo']);

            $sql_papel_pomcaj = "INSERT INTO cot_cir_papelpomcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_pomcaj = $this->db->prepare($sql_papel_pomcaj);

            $inserted_papel_pomcaj = $query_papel_pomcaj->execute();

            if (!$inserted_papel_pomcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelpomcaj";

                $inserted_papel_pomcaj = false;
            }


        // papel fintcaj
            $inserted_papel_fintcaj = true;

            $id_papel          = intval($aJson['papel_FintCaj']['id_papel']);
            $nombre            = trim(strval($aJson['papel_FintCaj']['nombre_papel']));
            $ancho             = floatval($aJson['papel_FintCaj']['ancho_papel']);
            $largo             = floatval($aJson['papel_FintCaj']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_FintCaj']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_FintCaj']['corte']);
            $pliegos           = intval($aJson['papel_FintCaj']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_FintCaj']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_FintCaj']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_FintCaj']['calculadora']['corte_largo']);

            $sql_papel_fintcaj = "INSERT INTO cot_cir_papelfintcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_fintcaj = $this->db->prepare($sql_papel_fintcaj);

            $inserted_papel_fintcaj = $query_papel_fintcaj->execute();

            if (!$inserted_papel_fintcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelfintcaj";

                $inserted_papel_fintcaj = false;
            }


        // papel bastap
            $inserted_papel_bastap = true;

            $id_papel          = intval($aJson['papel_BasTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_BasTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_BasTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_BasTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_BasTap']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_BasTap']['corte']);
            $pliegos           = intval($aJson['papel_BasTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_BasTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_BasTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_BasTap']['calculadora']['corte_largo']);

            $sql_papel_bastap = "INSERT INTO cot_cir_papelbastap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_bastap = $this->db->prepare($sql_papel_bastap);

            $inserted_papel_bastap = $query_papel_bastap->execute();

            if (!$inserted_papel_bastap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelbastap";

                $inserted_papel_bastap = false;
            }


        // papel cirtap
            $inserted_papel_cirtap = true;

            $id_papel          = intval($aJson['papel_CirTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_CirTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_CirTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_CirTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_CirTap']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_CirTap']['corte']);
            $pliegos           = intval($aJson['papel_CirTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_CirTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_CirTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_CirTap']['calculadora']['corte_largo']);

            $sql_papel_cirtap = "INSERT INTO cot_cir_papelcirtap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_cirtap = $this->db->prepare($sql_papel_cirtap);

            $inserted_papel_cirtap = $query_papel_cirtap->execute();

            if (!$inserted_papel_cirtap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelcirtap";

                $inserted_papel_cirtap = false;
            }


        // papel fortap
            $inserted_papel_fortap = true;

            $id_papel          = intval($aJson['papel_ForTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_ForTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_ForTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_ForTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_ForTap']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_ForTap']['corte']);
            $pliegos           = intval($aJson['papel_ForTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_ForTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_ForTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_ForTap']['calculadora']['corte_largo']);

            $sql_papel_fortap = "INSERT INTO cot_cir_papelfortap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_fortap = $this->db->prepare($sql_papel_fortap);

            $inserted_papel_fortap = $query_papel_fortap->execute();

            if (!$inserted_papel_fortap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelfortap";

                $inserted_papel_fortap = false;
            }


        // papel fexttap
            $inserted_papel_fexttap = true;

            $id_papel          = intval($aJson['papel_FexTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_FexTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_FexTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_FexTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_FexTap']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_FexTap']['corte']);
            $pliegos           = intval($aJson['papel_FexTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_FexTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_FexTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_FexTap']['calculadora']['corte_largo']);

            $sql_papel_fexttap = "INSERT INTO cot_cir_papelfexttap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_fexttap = $this->db->prepare($sql_papel_fexttap);

            $inserted_papel_fexttap = $query_papel_fexttap->execute();

            if (!$inserted_papel_fexttap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelfexttap";

                $inserted_papel_fexttap = false;
            }


        // papel finttap
            $inserted_papel_finttap = true;

            $id_papel          = intval($aJson['papel_FinTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_FinTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_FinTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_FinTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_FinTap']['costo_unit_papel']);
            $tiraje            = intval($aJson['tiraje']);
            $cortes            = intval($aJson['papel_FinTap']['corte']);
            $pliegos           = intval($aJson['papel_FinTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_FinTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_FinTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_FinTap']['calculadora']['corte_largo']);

            $sql_papel_finttap = "INSERT INTO cot_cir_papelfinttap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_finttap = $this->db->prepare($sql_papel_finttap);

            $inserted_papel_finttap = $query_papel_finttap->execute();

            if (!$inserted_papel_finttap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_papelfinttap";

                $inserted_papel_finttap = false;
            }


    /********* terminados los papeles **********/


    /********* inicia costos fijos **********/

        // ranurado
            $l_ranurado = true;

            $ranurado = $aJson['ranurado'];

            $arreglo               = floatval($ranurado['arreglo']);
            $costo_unit_por_ranura = floatval($ranurado['costo_unit_por_ranura']);
            $costo_por_ranura      = floatval($ranurado['costo_por_ranura']);
            $costo_tot_proceso     = floatval($ranurado['costo_tot_proceso']);


            $sql_ranurado = "INSERT INTO cot_cir_ranurado
                (id_modelo, id_odt, tiraje, arreglo, costo_unit, costo_por_ranura, costo_tot_ranurado, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $arreglo, $costo_unit_por_ranura, $costo_por_ranura, $costo_tot_proceso, '$d_fecha')";


            $query_ranurado = $this->db->prepare($sql_ranurado);

            $l_ranurado = $query_ranurado->execute();

            if (!$l_ranurado) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_ranurado";

                $l_ranurado = false;
            }


        // encuadernacion

            $l_encuadernacion = true;

            $perf_iman_costo_unitario        = floatval($aJson['encuadernacion']['perf_iman_costo_unitario']);
            $perf_iman_y_puesta              = floatval($aJson['encuadernacion']['perf_iman_y_puesta']);
            $despunte_costo_unitario         = floatval($aJson['encuadernacion']['despunte_costo_unitario']);
            $despunte_de_esquinas_para_cajon = floatval($aJson['encuadernacion']['despunte_de_esquinas_para_cajon']);
            $encajada_costo_unitario         = floatval($aJson['encuadernacion']['encajada_costo_unitario']);
            $costo_encajada                  = floatval($aJson['encuadernacion']['costo_encajada']);
            $costo_tot_proceso               = floatval($aJson['encuadernacion']['costo_tot_proceso']);
            $costo_tot_encuadernacion               = floatval($costo_tot_proceso + $costo_encajada);


            $sql_encuadernacion = "INSERT INTO cot_cir_encuadernacion
                (id_modelo, id_odt, tiraje, costo_unit_iman, perforado_iman_y_puesta, despunte_costo_unit, despunte_esquina_cajon, encajada_costo_unit, encajada_costo_tot, costo_tot_proceso, costo_tot_encuadernacion, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $perf_iman_costo_unitario, $perf_iman_y_puesta, $despunte_costo_unitario, $despunte_de_esquinas_para_cajon, $encajada_costo_unitario, $costo_encajada, $costo_tot_proceso, $costo_tot_encuadernacion, '$d_fecha')";


            $query_encuadernacion = $this->db->prepare($sql_encuadernacion);

            $l_encuadernacion = $query_encuadernacion->execute();

            if (!$l_encuadernacion) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_encuadernacion" . $sql_encuadernacion . ";";

                $l_encuadernacion = false;
            }


            $l_fextcaj = true;
            $l_fintcaj = true;
            $l_fortap  = true;
            $l_fexttap = true;
            $l_finttap = true;

            $costo_unit_forrado_cajon     = $aJson['forro_FextCaj']['costo_unit_forrado_cajon'];
            $forrado_de_cajon             = $aJson['forro_FextCaj']['forrado_de_cajon'];
            $arreglo                      = $aJson['forro_FextCaj']['arreglo'];
            $empalme_cajon_costo_unitario = $aJson['forro_FextCaj']['empalme_cajon_costo_unitario'];
            $empalme_de_cajon             = $aJson['forro_FextCaj']['empalme_de_cajon'];
            $costo_tot_proceso            = $aJson['forro_FextCaj']['costo_tot_proceso'];

            $sql_enc_fextcaj = "INSERT INTO cot_cir_encuadernacion_fextcaj
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit_forrado_cajon, $forrado_de_cajon, $arreglo, $empalme_cajon_costo_unitario, $empalme_de_cajon, $costo_tot_proceso, '$d_fecha')";


            $query_enc_fextcaj = $this->db->prepare($sql_enc_fextcaj);

            $l_fextcaj = $query_enc_fextcaj->execute();

            if (!$l_fextcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_encuadernacion_fextcaj" . $sql_enc_fextcaj . ";";

                $l_fextcaj = false;
            }


            $costo_unit_forrado_cajon     = $aJson['forro_FintCaj']['costo_unit_forrado_cajon'];
            $forrado_de_cajon             = $aJson['forro_FintCaj']['forrado_de_cajon'];
            $arreglo                      = $aJson['forro_FintCaj']['arreglo'];
            $empalme_cajon_costo_unitario = $aJson['forro_FintCaj']['empalme_cajon_costo_unitario'];
            $empalme_de_cajon             = $aJson['forro_FintCaj']['empalme_de_cajon'];
            $costo_tot_proceso            = $aJson['forro_FintCaj']['costo_tot_proceso'];


            $sql_enc_fintcaj = "INSERT INTO cot_cir_encuadernacion_fintcaj
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit_forrado_cajon, $forrado_de_cajon, $arreglo, $empalme_cajon_costo_unitario, $empalme_de_cajon, $costo_tot_proceso, '$d_fecha')";

            $query_enc_fintcaj = $this->db->prepare($sql_enc_fintcaj);

            $l_fintcaj = $query_enc_fintcaj->execute();

            if (!$l_fintcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_encuadernacion_fintcaj" . $sql_enc_fintcaj . ";";

                $l_fintcaj = false;
            }


            $costo_unit_forrado_cajon     = $aJson['forro_ForTap']['costo_unit_forrado_cajon'];
            $forrado_de_cajon             = $aJson['forro_ForTap']['forrado_de_cajon'];
            $arreglo                      = $aJson['forro_ForTap']['arreglo'];
            $empalme_cajon_costo_unitario = $aJson['forro_ForTap']['empalme_cajon_costo_unitario'];
            $empalme_de_cajon             = $aJson['forro_ForTap']['empalme_de_cajon'];
            $costo_tot_proceso            = $aJson['forro_ForTap']['costo_tot_proceso'];


            $sql_enc_fortap = "INSERT INTO cot_cir_encuadernacion_fortap
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit_forrado_cajon, $forrado_de_cajon, $arreglo, $empalme_cajon_costo_unitario, $empalme_de_cajon, $costo_tot_proceso, '$d_fecha')";

            $query_enc_fortap = $this->db->prepare($sql_enc_fortap);

            $l_fortap = $query_enc_fortap->execute();

            if (!$l_fortap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_encuadernacion_fortap" . $sql_enc_fortap . ";";

                $l_fortap = false;
            }



            $costo_unit_forrado_cajon     = $aJson['forro_FexTap']['costo_unit_forrado_cajon'];
            $forrado_de_cajon             = $aJson['forro_FexTap']['forrado_de_cajon'];
            $arreglo                      = $aJson['forro_FexTap']['arreglo'];
            $empalme_cajon_costo_unitario = $aJson['forro_FexTap']['empalme_cajon_costo_unitario'];
            $empalme_de_cajon             = $aJson['forro_FexTap']['empalme_de_cajon'];
            $costo_tot_proceso            = $aJson['forro_FexTap']['costo_tot_proceso'];


            $sql_enc_fexttap = "INSERT INTO cot_cir_encuadernacion_fexttap
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit_forrado_cajon, $forrado_de_cajon, $arreglo, $empalme_cajon_costo_unitario, $empalme_de_cajon, $costo_tot_proceso, '$d_fecha')";

            $query_enc_fexttap = $this->db->prepare($sql_enc_fexttap);

            $l_fexttap = $query_enc_fexttap->execute();

            if (!$l_fexttap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_encuadernacion_fexttap" . $sql_enc_fexttap . ";";

                $l_fexttap = false;
            }


            $costo_unit_forrado_cajon     = $aJson['forro_FinTap']['costo_unit_forrado_cajon'];
            $forrado_de_cajon             = $aJson['forro_FinTap']['forrado_de_cajon'];
            $arreglo                      = $aJson['forro_FinTap']['arreglo'];
            $empalme_cajon_costo_unitario = $aJson['forro_FinTap']['empalme_cajon_costo_unitario'];
            $empalme_de_cajon             = $aJson['forro_FinTap']['empalme_de_cajon'];
            $costo_tot_proceso            = $aJson['forro_FinTap']['costo_tot_proceso'];


            $sql_enc_finttap = "INSERT INTO cot_cir_encuadernacion_fintap
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit_forrado_cajon, $forrado_de_cajon, $arreglo, $empalme_cajon_costo_unitario, $empalme_de_cajon, $costo_tot_proceso, '$d_fecha')";

            $query_enc_finttap = $this->db->prepare($sql_enc_finttap);

            $l_finttap = $query_enc_finttap->execute();

            if (!$l_finttap) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_encuadernacion_fintap" . $sql_enc_finttap . ";";

                $l_finttap = false;
            }


        /********* termina costos fijos **********/


    /********* inicia impresion **********/


        /********* impresion base del cajon **********/

            $l_offset_bcaj     = true;
            $l_offset_maq_bcaj = true;
            $l_digital_bcaj    = true;
            $l_serigrafia_bcaj = true;

            if (array_key_exists("aImpBCaj", $aJson)) {

                $aImpBCaj = [];

                $aImpBCaj = $aJson['aImpBCaj'];


                if (array_key_exists("Offset", $aImpBCaj)) {

                    $aOffset = [];

                    $aOffset = $aImpBCaj['Offset'];

                    foreach($aOffset as $row) {

                        $costo_tot_proceso = 0;

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        /*
                        $corte_pliego            = intval($row['corte_pliego']);
                        $total_pliegos           = intval($row['total_pliegos']);
                        */

                        if ($costo_tot_proceso > 0) {

                            $sql_offset_bcaj = "INSERT INTO cot_cir_offsetbcaj(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_offset_bcaj = $this->db->prepare($sql_offset_bcaj);

                            $l_offset_bcaj = $query_offset_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset en Base del cajon";

                            $l_offset_bcaj = false;

                            break;
                        }


                        if (!$l_offset_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetbcaj";

                            $l_offset_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpBCaj)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpBCaj['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_bcaj = "INSERT INTO cot_cir_offset_maq_bcaj(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_bcaj = $this->db->prepare($sql_offset_maq_bcaj);

                            $l_offset_maq_bcaj = $query_offset_maq_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Base del cajon";

                            $l_offset_maq_bcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_bcaj";

                            $l_offset_maq_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpBCaj)) {

                    $aDigital = [];

                    $aDigital = $aImpBCaj['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);

                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_bcaj = false;

                            break;
                        }

                        if ($costo_tot_proceso > 0 and $cabe_digital == "SI") {

                            $sql_digital_bcaj = "INSERT INTO cot_cir_digbcaj(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos,  $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                            $query_digital_bcaj = $this->db->prepare($sql_digital_bcaj);

                            $l_digital_bcaj = $query_digital_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Digital en Base del cajon";

                            $l_digital_bcaj = false;

                            break;
                        }

                        if (!$l_digital_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digbcaj";

                            $l_digital_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpBCaj)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpBCaj['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_bcaj = "INSERT INTO cot_cir_serbcaj(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_bcaj = $this->db->prepare($sql_serigrafia_bcaj);

                        $l_serigrafia_bcaj = $query_serigrafia_bcaj->execute();

                        if (!$l_serigrafia_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serbcaj";

                            $l_serigrafia_bcaj = false;

                            break;
                        }
                    }
                }
            }


        /********* termina impresion base del cajon **********/


        /********* inicia impresion circunferencia del cajon **********/

            $l_offset_circaj     = true;
            $l_offset_maq_circaj = true;
            $l_digital_circaj    = true;
            $l_serigrafia_circaj = true;

            if (array_key_exists("aImpCirCaj", $aJson)) {

                $aImpCirCaj = [];

                $aImpCirCaj = $aJson['aImpCirCaj'];


                if (array_key_exists("Offset", $aImpCirCaj)) {

                    $aOffset = [];

                    $aOffset = $aImpCirCaj['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        /*
                        $corte_pliego            = intval($row['corte_pliego']);
                        $total_pliegos           = intval($row['total_pliegos']);
                        */

                        $sql_offset_circaj = "INSERT INTO cot_cir_offsetcircaj(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_circaj = $this->db->prepare($sql_offset_circaj);

                        $l_offset_circaj = $query_offset_circaj->execute();

                        if (!$l_offset_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetcircaj";

                            $l_offset_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpCirCaj)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpCirCaj['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_circaj = "INSERT INTO cot_cir_offset_maq_circaj(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_circaj = $this->db->prepare($sql_offset_maq_circaj);

                            $l_offset_maq_circaj = $query_offset_maq_circaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Circunferencia del cajon";

                            $l_offset_maq_circaj = false;

                            break;
                        }


                        if (!$l_offset_maq_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_circaj";

                            $l_offset_maq_circaj = false;

                            break;
                        }
                    }
                }

                if (array_key_exists("Digital", $aImpCirCaj)) {

                    $aDigital = [];

                    $aDigital = $aImpCirCaj['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_circaj = false;

                            break;
                        }

                        $sql_digital_circaj = "INSERT INTO cot_cir_digcircaj(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_circaj = $this->db->prepare($sql_digital_circaj);

                        $l_digital_circaj = $query_digital_circaj->execute();

                        if (!$l_digital_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digcircaj";

                            $l_digital_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpCirCaj)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpCirCaj['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_circaj = "INSERT INTO cot_cir_sercircaj(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_circaj = $this->db->prepare($sql_serigrafia_circaj);

                        $l_serigrafia_circaj = $query_serigrafia_circaj->execute();

                        if (!$l_serigrafia_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_sercircaj";

                            $l_serigrafia_circaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion circunferencia del cajon **********/


        /********* inicia impresion forro exterior del cajon **********/

            $l_offset_fextcaj     = true;
            $l_offset_maq_fextcaj = true;
            $l_digital_fextcaj    = true;
            $l_serigrafia_fextcaj = true;

            if (array_key_exists("aImpFextCaj", $aJson)) {

                $aImpFextCaj = [];

                $aImpFextCaj = $aJson['aImpFextCaj'];


                if (array_key_exists("Offset", $aImpFextCaj)) {

                    $aOffset = [];

                    $aOffset = $aImpFextCaj['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_fextcaj = "INSERT INTO cot_cir_offsetfextcaj(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fextcaj = $this->db->prepare($sql_offset_fextcaj);

                        $l_offset_fextcaj = $query_offset_fextcaj->execute();

                        if (!$l_offset_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetfextcaj";

                            $l_offset_fextcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpFextCaj)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpFextCaj['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_fextcaj = "INSERT INTO cot_cir_offset_maq_fextcaj(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fextcaj = $this->db->prepare($sql_offset_maq_fextcaj);

                            $l_offset_maq_fextcaj = $query_offset_maq_fextcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro exterior del cajon";

                            $l_offset_maq_fextcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_fextcaj";

                            $l_offset_maq_fextcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpFextCaj)) {

                    $aDigital = [];

                    $aDigital = $aImpFextCaj['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_fextcaj = false;

                            break;
                        }

                        $sql_digital_fextcaj = "INSERT INTO cot_cir_digfextcaj(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fextcaj = $this->db->prepare($sql_digital_fextcaj);

                        $l_digital_fextcaj = $query_digital_fextcaj->execute();

                        if (!$l_digital_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digfextcaj";

                            $l_digital_fextcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpFextCaj)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpFextCaj['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_fextcaj = "INSERT INTO cot_cir_serfextcaj(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fextcaj = $this->db->prepare($sql_serigrafia_fextcaj);

                        $l_serigrafia_fextcaj = $query_serigrafia_fextcaj->execute();

                        if (!$l_serigrafia_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serfextcaj";

                            $l_serigrafia_fextcaj = false;

                            break;
                        }
                    }
                }
            }


        /********* termina impresion forro exterior del cajon **********/


        /********* inicia impresion pompa del cajon **********/

            $l_offset_pomcaj     = true;
            $l_offset_maq_pomcaj = true;
            $l_digital_pomcaj    = true;
            $l_serigrafia_pomcaj = true;

            if (array_key_exists("aImpPomCaj", $aJson)) {

                $aImpPomCaj = [];

                $aImpPomCaj = $aJson['aImpPomCaj'];


                if (array_key_exists("Offset", $aImpPomCaj)) {

                    $aOffset = [];

                    $aOffset = $aImpPomCaj['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_pomcaj = "INSERT INTO cot_cir_offsetpomcaj(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_pomcaj = $this->db->prepare($sql_offset_pomcaj);

                        $l_offset_pomcaj = $query_offset_pomcaj->execute();

                        if (!$l_offset_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetpomcaj";

                            $l_offset_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpPomCaj)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpPomCaj['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_pomcaj = "INSERT INTO cot_cir_offset_maq_pomcaj(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_pomcaj = $this->db->prepare($sql_offset_maq_pomcaj);

                            $l_offset_maq_pomcaj = $query_offset_maq_pomcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Pompa del cajon";

                            $l_offset_maq_pomcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_pomcaj";

                            $l_offset_maq_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpPomCaj)) {

                    $aDigital = [];

                    $aDigital = $aImpPomCaj['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_pomcaj = false;

                            break;
                        }

                        $sql_digital_pomcaj = "INSERT INTO cot_cir_digpomcaj(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $sql_digital_pomcaj = $this->db->prepare($sql_digital_pomcaj);

                        $l_digital_pomcaj = $sql_digital_pomcaj->execute();

                        if (!$l_digital_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digpomcaj";

                            $l_digital_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpPomCaj)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpPomCaj['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_pomcaj = "INSERT INTO cot_cir_serpomcaj(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_pomcaj = $this->db->prepare($sql_serigrafia_pomcaj);

                        $l_serigrafia_pomcaj = $query_serigrafia_pomcaj->execute();

                        if (!$l_serigrafia_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serpomcaj";

                            $l_serigrafia_pomcaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion pompa del cajon **********/


        /********* inicia impresion forro interior del cajon **********/

            $l_offset_fintcaj     = true;
            $l_offset_maq_fintcaj = true;
            $l_digital_fintcaj    = true;
            $l_serigrafia_fintcaj = true;

            if (array_key_exists("aImpFintCaj", $aJson)) {

                $aImpFintCaj = [];

                $aImpFintCaj = $aJson['aImpFintCaj'];


                if (array_key_exists("Offset", $aImpFintCaj)) {

                    $aOffset = [];

                    $aOffset = $aImpFintCaj['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_fintcaj = "INSERT INTO cot_cir_offsetfintcaj(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fintcaj = $this->db->prepare($sql_offset_fintcaj);

                        $l_offset_fintcaj = $query_offset_fintcaj->execute();

                        if (!$l_offset_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetfintcaj";

                            $l_offset_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("maquila", $aImpFintCaj)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpFintCaj['maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_fintcaj = "INSERT INTO cot_cir_offset_maq_fintcaj(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fintcaj = $this->db->prepare($sql_offset_maq_fintcaj);

                            $l_offset_maq_fintcaj = $query_offset_maq_fintcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Pompa del cajon";

                            $l_offset_maq_fintcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_fintcaj";

                            $l_offset_maq_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpFintCaj)) {

                    $aDigital = [];

                    $aDigital = $aImpFintCaj['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_fintcaj = false;

                            break;
                        }

                        $sql_digital_fintcaj = "INSERT INTO cot_cir_digfintcaj(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fintcaj = $this->db->prepare($sql_digital_fintcaj);

                        $l_digital_fintcaj = $query_digital_fintcaj->execute();

                        if (!$l_digital_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digfintcaj";

                            $l_digital_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpFintCaj)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpFintCaj['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_fintcaj = "INSERT INTO cot_cir_serfintcaj(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fintcaj = $this->db->prepare($sql_serigrafia_fintcaj);

                        $l_serigrafia_fintcaj = $query_serigrafia_fintcaj->execute();

                        if (!$l_serigrafia_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serfintcaj";

                            $l_serigrafia_fintcaj = false;

                            break;
                        }
                    }
                }
            }


        /********* termina impresion forro interior del cajon **********/


        /********* empieza impresion base de la tapa **********/


            $l_offset_bastap     = true;
            $l_offset_maq_bastap = true;
            $l_digital_bastap    = true;
            $l_serigrafia_bastap = true;

            if (array_key_exists("aImpBasTap", $aJson)) {

                $aImpBasTap = [];

                $aImpBasTap = $aJson['aImpBasTap'];


                if (array_key_exists("Offset", $aImpBasTap)) {

                    $aOffset = [];

                    $aOffset = $aImpBasTap['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_bastap = "INSERT INTO cot_cir_offsetbastap(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_bastap = $this->db->prepare($sql_offset_bastap);

                        $l_offset_bastap = $query_offset_bastap->execute();

                        if (!$l_offset_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetbastap";

                            $l_offset_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpBasTap)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpBasTap['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_bastap = "INSERT INTO cot_cir_offset_maq_bastap(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_bastap = $this->db->prepare($sql_offset_maq_bastap);

                            $l_offset_maq_bastap = $query_offset_maq_bastap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Base de la tapa";

                            $l_offset_maq_bastap = false;

                            break;
                        }


                        if (!$l_offset_maq_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_bastap";

                            $l_offset_maq_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpBasTap)) {

                    $aDigital = [];

                    $aDigital = $aImpBasTap['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_bastap = false;

                            break;
                        }

                        $sql_digital_bastap = "INSERT INTO cot_cir_digbastap(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_bastap = $this->db->prepare($sql_digital_bastap);

                        $l_digital_bastap = $query_digital_bastap->execute();

                        if (!$l_digital_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digbastap";

                            $l_digital_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpBasTap)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpBasTap['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_bastap = "INSERT INTO cot_cir_serbastap(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_bastap = $this->db->prepare($sql_serigrafia_bastap);

                        $l_serigrafia_bastap = $query_serigrafia_bastap->execute();

                        if (!$l_serigrafia_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serbastap";

                            $l_serigrafia_bastap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion base de la tapa **********/


        /********* inicia impresion circunferencia de la tapa **********/


            $l_offset_cirtap     = true;
            $l_offset_maq_cirtap = true;
            $l_digital_cirtap    = true;
            $l_serigrafia_cirtap = true;

            if (array_key_exists("aImpCirTap", $aJson)) {

                $aImpCirTap = [];

                $aImpCirTap = $aJson['aImpCirTap'];


                if (array_key_exists("Offset", $aImpCirTap)) {

                    $aOffset = [];

                    $aOffset = $aImpCirTap['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_cirtap = "INSERT INTO cot_cir_offsetcirtap(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_cirtap = $this->db->prepare($sql_offset_cirtap);

                        $l_offset_cirtap = $query_offset_cirtap->execute();

                        if (!$l_offset_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetcirtap";

                            $l_offset_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpCirTap)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpCirTap['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_cirtap = "INSERT INTO cot_cir_offset_maq_cirtap(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_cirtap = $this->db->prepare($sql_offset_maq_cirtap);

                            $l_offset_maq_cirtap = $query_offset_maq_cirtap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Circunferencia de la tapa";

                            $l_offset_maq_cirtap = false;

                            break;
                        }


                        if (!$l_offset_maq_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_cirtap";

                            $l_offset_maq_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpCirTap)) {

                    $aDigital = [];

                    $aDigital = $aImpCirTap['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_cirtap = false;

                            break;
                        }

                        $sql_digital_cirtap = "INSERT INTO cot_cir_digcirtap(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_cirtap = $this->db->prepare($sql_digital_cirtap);

                        $l_digital_cirtap = $query_digital_cirtap->execute();

                        if (!$l_digital_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digcirtap";

                            $l_digital_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpCirTap)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpCirTap['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_cirtap = "INSERT INTO cot_cir_sercirtap(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_cirtap = $this->db->prepare($sql_serigrafia_cirtap);

                        $l_serigrafia_cirtap = $query_serigrafia_cirtap->execute();

                        if (!$l_serigrafia_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_sercirtap";

                            $l_serigrafia_cirtap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina impresion circunferencia de la tapa **********/


        /********* inicia impresion forro de la tapa **********/

            $l_offset_fortap     = true;
            $l_offset_maq_fortap = true;
            $l_digital_fortap    = true;
            $l_serigrafia_fortap = true;

            if (array_key_exists("aImpFTap", $aJson)) {

                $aImpFTap = [];

                $aImpFTap = $aJson['aImpFTap'];


                if (array_key_exists("Offset", $aImpFTap)) {

                    $aOffset = [];

                    $aOffset = $aImpFTap['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_fortap = "INSERT INTO cot_cir_offsetfortap(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fortap = $this->db->prepare($sql_offset_fortap);

                        $l_offset_fortap = $query_offset_fortap->execute();

                        if (!$l_offset_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetfortap";

                            $l_offset_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpFTap)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpFTap['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_fortap = "INSERT INTO cot_cir_offset_maq_fortap(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fortap = $this->db->prepare($sql_offset_maq_fortap);

                            $l_offset_maq_fortap = $query_offset_maq_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro de la tapa";

                            $l_offset_maq_fortap = false;

                            break;
                        }


                        if (!$l_offset_maq_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_fortap";

                            $l_offset_maq_fortap = false;

                            break;
                        }
                    }
                }

                if (array_key_exists("Digital", $aImpFTap)) {

                    $aDigital = [];

                    $aDigital = $aImpFTap['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_fortap = false;

                            break;
                        }

                        $sql_digital_fortap = "INSERT INTO cot_cir_digfortap(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fortap = $this->db->prepare($sql_digital_fortap);

                        $l_digital_fortap = $query_digital_fortap->execute();

                        if (!$l_digital_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digfortap";

                            $l_digital_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpFTap)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpFTap['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_fortap = "INSERT INTO cot_cir_serfortap(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fortap = $this->db->prepare($sql_serigrafia_fortap);

                        $l_serigrafia_fortap = $query_serigrafia_fortap->execute();

                        if (!$l_serigrafia_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serfortap";

                            $l_serigrafia_fortap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion forro de la tapa **********/


        /********* inicia impresion forro exterior de la tapa **********/

            $l_offset_fextap     = true;
            $l_offset_maq_fextap = true;
            $l_digital_fextap    = true;
            $l_serigrafia_fextap = true;

            if (array_key_exists("aImpFexTap", $aJson)) {

                $aImpFexTap = [];

                $aImpFexTap = $aJson['aImpFexTap'];


                if (array_key_exists("Offset", $aImpFexTap)) {

                    $aOffset = [];

                    $aOffset = $aImpFexTap['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_fextap = "INSERT INTO cot_cir_offsetfexttap(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fextap = $this->db->prepare($sql_offset_fextap);

                        $l_offset_fextap = $query_offset_fextap->execute();

                        if (!$l_offset_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetfexttap";

                            $l_offset_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpFexTap)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpFexTap['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_fexttap = "INSERT INTO cot_cir_offset_maq_fexttap(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fexttap = $this->db->prepare($sql_offset_maq_fexttap);

                            $l_offset_maq_fextap = $query_offset_maq_fexttap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro exterior de la tapa";

                            $l_offset_maq_fextap = false;

                            break;
                        }


                        if (!$l_offset_maq_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_fexttap";

                            $l_offset_maq_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpFexTap)) {

                    $aDigital = [];

                    $aDigital = $aImpFexTap['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_fextap = false;

                            break;
                        }

                        $sql_digital_fextap = "INSERT INTO cot_cir_digfexttap(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fextap = $this->db->prepare($sql_digital_fextap);

                        $l_digital_fextap = $query_digital_fextap->execute();

                        if (!$l_digital_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digfexttap";

                            $l_digital_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpFexTap)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpFexTap['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_fextap = "INSERT INTO cot_cir_serfexttap(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fextap = $this->db->prepare($sql_serigrafia_fextap);

                        $l_serigrafia_fextap = $query_serigrafia_fextap->execute();

                        if (!$l_serigrafia_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serfexttap";

                            $l_serigrafia_fextap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion forro exterior de la tapa **********/


        /********* inicia impresion forro interior de la tapa **********/

            $l_offset_fintap     = true;
            $l_offset_maq_fintap = true;
            $l_digital_fintap    = true;
            $l_serigrafia_fintap = true;

            if (array_key_exists("aImpFinTap", $aJson)) {

                $aImpFinTap = [];

                $aImpFinTap = $aJson['aImpFinTap'];


                if (array_key_exists("Offset", $aImpFinTap)) {

                    $aOffset = [];

                    $aOffset = $aImpFinTap['Offset'];

                    foreach($aOffset as $row) {

                        $tipo_offset             = trim(strval($row['tipo_offset']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $corte_costo_unitario    = floatval($row['corte_costo_unitario']);
                        $corte_por_millar        = intval($row['corte_por_millar']);
                        $costo_corte             = floatval($row['costo_corte']);
                        $costo_unitario_laminas  = floatval($row['costo_unitario_laminas']);
                        $costo_tot_laminas       = floatval($row['costo_tot_laminas']);
                        $costo_unitario_arreglo  = floatval($row['costo_unitario_arreglo']);
                        $costo_tot_arreglo       = floatval($row['costo_tot_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        $sql_offset_fintap = "INSERT INTO cot_cir_offsetfinttap(id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fintap = $this->db->prepare($sql_offset_fintap);

                        $l_offset_fintap = $query_offset_fintap->execute();

                        if (!$l_offset_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offsetfinttap";

                            $l_offset_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpFinTap)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpFinTap['Maquila'];

                    foreach($aOffset_maq as $row) {

                        $costo_tot_proceso = 0;

                        $es_maquila             = trim(strval($row['es_maquila']));
                        $Tipo                   = trim(strval($row['Tipo']));
                        $tiraje                 = intval($row['cantidad']);
                        $num_tintas             = intval($row['num_tintas']);
                        $arreglo_costo_unitario = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo          = floatval($row['arreglo_costo']);
                        $costo_unitario_laminas = floatval($row['costo_unitario_laminas']);
                        $costo_laminas          = floatval($row['costo_laminas']);
                        $costo_unitario_maq     = floatval($row['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($row['costo_tot_maq']);
                        $costo_tot_proceso      = floatval($row['costo_tot_proceso']);

                        if ( $costo_tot_proceso > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_laminas > 0 and $costo_laminas > 0 and $costo_unitario_maq > 0 and $costo_tot_maq > 0 ) {

                            $sql_offset_maq_finttap = "INSERT INTO cot_cir_offset_maq_finttap(id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_finttap = $this->db->prepare($sql_offset_maq_finttap);

                            $l_offset_maq_fintap = $query_offset_maq_finttap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro interior de la tapa";

                            $l_offset_maq_fintap = false;

                            break;
                        }


                        if (!$l_offset_maq_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_offset_maq_finttap";

                            $l_offset_maq_fintap = false;

                            break;
                        }
                    }
                }

                if (array_key_exists("Digital", $aImpFinTap)) {

                    $aDigital = [];

                    $aDigital = $aImpFinTap['Digital'];

                    foreach($aDigital as $row) {

                        $cabe_digital      = trim(strval($row['cabe_digital']));
                        $tipo_impresion     = trim(strval($row['tipo_impresion']));
                        $imp_ancho         = trim(strval($row['imp_ancho']));
                        $imp_largo         = trim(strval($row['imp_largo']));
                        $tiraje            = intval($row['cantidad']);
                        $corte_ancho       = floatval($row['corte_ancho']);
                        $corte_largo       = floatval($row['corte_largo']);
                        $costo_unitario    = floatval($row['costo_unitario']);
                        $cortes_por_pliego = intval($row['cortes_por_pliego']);
                        $tot_pliegos       = intval($row['tot_pliegos']);
                        $costo_tot_proceso = floatval($row['costo_tot_proceso']);
                        $merma_min         = intval($row['mermas']['merma_min']);
                        $merma_adic        = intval($row['mermas']['merma_adic']);
                        $merma_tot         = intval($row['mermas']['merma_tot']);
                        $costo_unitario    = floatval($row['mermas']['costo_unitario']);
                        $costo_tot         = floatval($row['mermas']['costo_tot']);

                        if ($cabe_digital == "NO") {

                            $l_digital_fintap = false;

                            break;
                        }

                        $sql_digital_fintap = "INSERT INTO cot_cir_digfinttap(id_odt, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fintap = $this->db->prepare($sql_digital_fintap);

                        $l_digital_fintap = $query_digital_fintap->execute();

                        if (!$l_digital_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_digfinttap";

                            $l_digital_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpFinTap)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpFinTap['Serigrafia'];

                    foreach($aSerigrafia as $row) {

                        $tipo                    = trim(strval($row['tipo']));
                        $tiraje                  = intval($row['cantidad']);
                        $num_tintas              = intval($row['num_tintas']);
                        $costo_unit_arreglo      = floatval($row['costo_unit_arreglo']);
                        $costo_arreglo           = floatval($row['costo_arreglo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario_tiro']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_papel_merma  = floatval($row['mermas']['costo_unit_papel_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_serigrafia_fintap = "INSERT INTO cot_cir_serfinttap(id_odt, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fintap = $this->db->prepare($sql_serigrafia_fintap);

                        $l_serigrafia_fintap = $query_serigrafia_fintap->execute();

                        if (!$l_serigrafia_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_serfinttap";

                            $l_serigrafia_fintap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion forro interior de la tapa **********/


   /********** termina impresion *


   /******************** inicia acabados  ************************/

        /********* inicia acabados base del cajon ***************/

            $l_Barniz_UV_bcaj   = true;
            $l_Corte_Laser_bcaj = true;
            $l_Grabado_bcaj     = true;
            $l_HotStamping_bcaj = true;
            $l_Laminado_bcaj    = true;
            $l_Suaje_bcaj       = true;

            if (array_key_exists("aAcbBCaj", $aJson)) {

                $aAcbBCaj = [];

                $aAcbBCaj = $aJson['aAcbBCaj'];


                if (array_key_exists("Barniz_UV", $aAcbBCaj)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbBCaj['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_bcaj = "INSERT INTO cot_cir_barnizuvbcaj(id_odt, id_modelo, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, 2, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_bcaj = $this->db->prepare($sql_barnizuv_bcaj);

                            $l_Barniz_UV_bcaj = $query_barnizuv_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Base del cajon";

                            $l_Barniz_UV_bcaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvbcaj";

                            $l_Barniz_UV_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbBCaj)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbBCaj['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_bcaj = "INSERT INTO cot_cir_laserbcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_bcaj = $this->db->prepare($sql_laser_bcaj);

                            $l_Corte_Laser_bcaj = $query_laser_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Base del Cajon";

                            $l_Corte_Laser_bcaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserbcaj";

                            $l_Corte_Laser_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbBCaj)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbBCaj['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = floatval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_bcaj = "INSERT INTO cot_cir_grabbcaj(id_odt, id_modelo, tipo_grabado, largo, tiraje, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $Largo, $tiraje, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_bcaj = $this->db->prepare($sql_grab_bcaj);

                            $l_Grabado_bcaj = $query_grab_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Base del Cajon";

                            $l_Grabado_bcaj = false;

                            break;
                        }


                        if (!$l_Grabado_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabbcaj";

                            $l_Grabado_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbBCaj)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbBCaj['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = floatval($row['pelicula_Largo']);
                        $pelicula_Ancho          = floatval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_bcaj = "INSERT INTO cot_cir_hsbcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_bcaj = $this->db->prepare($sql_hs_bcaj);

                            $l_HotStamping_bcaj = $query_hs_bcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsbcaj";

                            $l_HotStamping_bcaj = false;

                            break;
                        }


                        if (!$l_HotStamping_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsbcaj";

                            $l_HotStamping_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbBCaj)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbBCaj['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_bcaj = "INSERT INTO cot_cir_lambcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_bcaj = $this->db->prepare($sql_laminado_bcaj);

                        $l_Laminado_bcaj = $query_laminado_bcaj->execute();

                        if (!$l_Laminado_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lambcaj";

                            $l_Laminado_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbBCaj)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbBCaj['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_bcaj = "INSERT INTO cot_cir_suajebcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_bcaj = $this->db->prepare($sql_suaje_bcaj);

                        $l_Suaje_bcaj = $query_suaje_bcaj->execute();

                        if (!$l_Suaje_bcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajebcaj";

                            $l_Suaje_bcaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina acabados base del cajon ***************/


        /********* inicia acabados circunferencia del cajon ***************/

            $l_Barniz_UV_circaj   = true;
            $l_Corte_Laser_circaj = true;
            $l_Grabado_circaj     = true;
            $l_HotStamping_circaj = true;
            $l_Laminado_circaj    = true;
            $l_Suaje_circaj       = true;

            if (array_key_exists("aAcbCirCaj", $aJson)) {

                $aAcbCirCaj = [];

                $aAcbCirCaj = $aJson['aAcbCirCaj'];


                if (array_key_exists("Barniz_UV", $aAcbCirCaj)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbCirCaj['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_circaj = "INSERT INTO cot_cir_barnizuvcircaj(id_odt, id_modelo, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, 2, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_circaj = $this->db->prepare($sql_barnizuv_circaj);

                            $l_Barniz_UV_circaj = $query_barnizuv_circaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Circunferencia del cajon";

                            $l_Barniz_UV_circaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvcircaj";

                            $l_Barniz_UV_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbCirCaj)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbCirCaj['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_circaj = "INSERT INTO cot_cir_lasercircaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_circaj = $this->db->prepare($sql_laser_circaj);

                            $l_Corte_Laser_circaj = $query_laser_circaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Circunferencia del Cajon";

                            $l_Corte_Laser_circaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lasercircaj";

                            $l_Corte_Laser_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbCirCaj)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbCirCaj['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_circaj = "INSERT INTO cot_cir_grabcircaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_circaj = $this->db->prepare($sql_grab_circaj);

                            $l_Grabado_circaj = $query_grab_circaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Circunferencia del Cajon";

                            $l_Grabado_circaj = false;

                            break;
                        }


                        if (!$l_Grabado_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabcircaj";

                            $l_Grabado_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbCirCaj)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbCirCaj['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_circaj = "INSERT INTO cot_cir_hscircaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_circaj = $this->db->prepare($sql_hs_circaj);

                            $l_HotStamping_circaj = $query_hs_circaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Circunferencia del Cajon";

                            $l_HotStamping_circaj = false;

                            break;
                        }

                        if (!$l_HotStamping_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hscircaj";

                            $l_HotStamping_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbCirCaj)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbCirCaj['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_circaj = "INSERT INTO cot_cir_lamcircaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_circaj = $this->db->prepare($sql_laminado_circaj);

                        $l_Laminado_circaj = $query_laminado_circaj->execute();

                        if (!$l_Laminado_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamcircaj";

                            $l_Laminado_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbCirCaj)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbCirCaj['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_circaj = "INSERT INTO cot_cir_suajecircaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_circaj = $this->db->prepare($sql_suaje_circaj);

                        $l_Suaje_circaj = $query_suaje_circaj->execute();

                        if (!$l_Suaje_circaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajecircaj";

                            $l_Suaje_circaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina acabados circunferencia del cajon ***************/


        /********* inicia acabados forro exterior del cajon ***************/


            $l_Barniz_UV_fextcaj   = true;
            $l_Corte_Laser_fextcaj = true;
            $l_Grabado_fextcaj     = true;
            $l_HotStamping_fextcaj = true;
            $l_Laminado_fextcaj    = true;
            $l_Suaje_fextcaj       = true;

            if (array_key_exists("aAcbFextCaj", $aJson)) {

                $aAcbFextCaj = [];

                $aAcbFextCaj = $aJson['aAcbFextCaj'];


                if (array_key_exists("Barniz_UV", $aAcbFextCaj)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFextCaj['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_fextcaj = "INSERT INTO cot_cir_barnizuvfextcaj(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_fextcaj = $this->db->prepare($sql_barnizuv_fextcaj);

                            $l_Barniz_UV_fextcaj = $query_barnizuv_fextcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro Exterior del cajon";

                            $l_Barniz_UV_fextcaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvfextcaj";

                            $l_Barniz_UV_fextcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFextCaj)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFextCaj['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_fextcaj = "INSERT INTO cot_cir_laserfextcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_fextcaj = $this->db->prepare($sql_laser_fextcaj);

                            $l_Corte_Laser_fextcaj = $query_laser_fextcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro Exterior del Cajon";

                            $l_Corte_Laser_fextcaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserfextcaj";

                            $l_Corte_Laser_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFextCaj)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFextCaj['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_fextcaj = "INSERT INTO cot_cir_grabfextcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_fextcaj = $this->db->prepare($sql_grab_fextcaj);

                            $l_Grabado_fextcaj = $query_grab_fextcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro Exterior del Cajon";

                            $l_Grabado_fextcaj = false;

                            break;
                        }


                        if (!$l_Grabado_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabfextcaj";

                            $l_Grabado_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFextCaj)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFextCaj['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_fextcaj = "INSERT INTO cot_cir_hsfextcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_fextcaj = $this->db->prepare($sql_hs_fextcaj);

                            $l_HotStamping_fextcaj = $query_hs_fextcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsfextcaj";

                            $l_HotStamping_fextcaj = false;

                            break;
                        }

                        if (!$l_HotStamping_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsfextcaj";

                            $l_HotStamping_circaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFextCaj)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFextCaj['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_fextcaj = "INSERT INTO cot_cir_lamfextcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_fextcaj = $this->db->prepare($sql_laminado_fextcaj);

                        $l_Laminado_fextcaj = $query_laminado_fextcaj->execute();

                        if (!$l_Laminado_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamfextcaj";

                            $l_Laminado_fextcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFextCaj)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFextCaj['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_fextcaj = "INSERT INTO cot_cir_suajefextcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_fextcaj = $this->db->prepare($sql_suaje_fextcaj);

                        $l_Suaje_fextcaj = $query_suaje_fextcaj->execute();

                        if (!$l_Suaje_fextcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajefextcaj";

                            $l_Suaje_fextcaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina acabados forro exterior del cajon ***************/


        /********* inicia acabados pompa del cajon ***************/


            $l_Barniz_UV_pomcaj   = true;
            $l_Corte_Laser_pomcaj = true;
            $l_Grabado_pomcaj     = true;
            $l_HotStamping_pomcaj = true;
            $l_Laminado_pomcaj    = true;
            $l_Suaje_pomcaj       = true;

            if (array_key_exists("aAcbPomCaj", $aJson)) {

                $aAcbPomCaj = [];

                $aAcbPomCaj = $aJson['aAcbPomCaj'];


                if (array_key_exists("Barniz_UV", $aAcbPomCaj)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbPomCaj['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_pomcaj = "INSERT INTO cot_cir_barnizuvpomcaj(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_pomcaj = $this->db->prepare($sql_barnizuv_pomcaj);

                            $l_Barniz_UV_pomcaj = $query_barnizuv_pomcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Pompa del cajon";

                            $l_Barniz_UV_pomcaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvpomcaj";

                            $l_Barniz_UV_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbPomCaj)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbPomCaj['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_pomcaj = "INSERT INTO cot_cir_laserpomcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_pomcaj = $this->db->prepare($sql_laser_pomcaj);

                            $l_Corte_Laser_pomcaj = $query_laser_pomcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Pompa del Cajon";

                            $l_Corte_Laser_pomcaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserpomcaj";

                            $l_Corte_Laser_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbPomCaj)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbPomCaj['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_pomcaj = "INSERT INTO cot_cir_grabpomcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_pomcaj = $this->db->prepare($sql_grab_pomcaj);

                            $l_Grabado_pomcaj = $query_grab_pomcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Pompa del Cajon";

                            $l_Grabado_pomcaj = false;

                            break;
                        }


                        if (!$l_Grabado_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabpomcaj";

                            $l_Grabado_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbPomCaj)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbPomCaj['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_pomcaj = "INSERT INTO cot_cir_hspomcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_pomcaj = $this->db->prepare($sql_hs_pomcaj);

                            $l_HotStamping_pomcaj = $query_hs_pomcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Pompa del Cajon";

                            $l_HotStamping_pomcaj = false;

                            break;
                        }

                        if (!$l_HotStamping_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hspomcaj";

                            $l_HotStamping_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbPomCaj)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbPomCaj['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_pomcaj = "INSERT INTO cot_cir_lampomcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_pomcaj = $this->db->prepare($sql_laminado_pomcaj);

                        $l_Laminado_pomcaj = $query_laminado_pomcaj->execute();

                        if (!$l_Laminado_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lampomcaj";

                            $l_Laminado_pomcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbPomCaj)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbPomCaj['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_pomcaj = "INSERT INTO cot_cir_suajepomcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_pomcaj = $this->db->prepare($sql_suaje_pomcaj);

                        $l_Suaje_pomcaj = $query_suaje_pomcaj->execute();

                        if (!$l_Suaje_pomcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajepomcaj";

                            $l_Suaje_pomcaj = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados pompa del cajon ***************/



        /********* inicia acabados forro interior del cajon ***************/


            $l_Barniz_UV_fintcaj   = true;
            $l_Corte_Laser_fintcaj = true;
            $l_Grabado_fintcaj     = true;
            $l_HotStamping_fintcaj = true;
            $l_Laminado_fintcaj    = true;
            $l_Suaje_fintcaj       = true;

            if (array_key_exists("aAcbFintCaj", $aJson)) {

                $aAcbFintCaj = [];

                $aAcbFintCaj = $aJson['aAcbFintCaj'];


                if (array_key_exists("Barniz_UV", $aAcbFintCaj)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFintCaj['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_fintcaj = "INSERT INTO cot_cir_barnizuvfintcaj(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_fintcaj = $this->db->prepare($sql_barnizuv_fintcaj);

                            $l_Barniz_UV_fintcaj = $query_barnizuv_fintcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro Interior del cajon";

                            $l_Barniz_UV_fintcaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvfintcaj";

                            $l_Barniz_UV_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFintCaj)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFintCaj['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_fintcaj = "INSERT INTO cot_cir_laserfintcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_fintcaj = $this->db->prepare($sql_laser_fintcaj);

                            $l_Corte_Laser_fintcaj = $query_laser_fintcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro Interior del Cajon";

                            $l_Corte_Laser_fintcaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserfintcaj";

                            $l_Corte_Laser_bcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFintCaj)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFintCaj['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_fintcaj = "INSERT INTO cot_cir_grabfintcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_fintcaj = $this->db->prepare($sql_grab_fintcaj);

                            $l_Grabado_fintcaj = $query_grab_fintcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro Interior del Cajon";

                            $l_Grabado_fintcaj = false;

                            break;
                        }


                        if (!$l_Grabado_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabfintcaj";

                            $l_Grabado_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFintCaj)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFintCaj['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_fintcaj = "INSERT INTO cot_cir_hsfintcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_fintcaj = $this->db->prepare($sql_hs_fintcaj);

                            $l_HotStamping_fintcaj = $query_hs_fintcaj->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Forro Interior del Cajon";

                            $l_HotStamping_fintcaj = false;

                            break;
                        }

                        if (!$l_HotStamping_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsfintcaj";

                            $l_HotStamping_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFintCaj)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFintCaj['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_fintcaj = "INSERT INTO cot_cir_lamfintcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_fintcaj = $this->db->prepare($sql_laminado_fintcaj);

                        $l_Laminado_fintcaj = $query_laminado_fintcaj->execute();

                        if (!$l_Laminado_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamfintcaj";

                            $l_Laminado_fintcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFintCaj)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFintCaj['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_fintcaj = "INSERT INTO cot_cir_suajefintcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_fintcaj = $this->db->prepare($sql_suaje_fintcaj);

                        $l_Suaje_fintcaj = $query_suaje_fintcaj->execute();

                        if (!$l_Suaje_fintcaj) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajefintcaj";

                            $l_Suaje_fintcaj = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados forro interior del cajon ***************/



        /********* inicia acabados base de la tapa ****************/


            $l_Barniz_UV_bastap   = true;
            $l_Corte_Laser_bastap = true;
            $l_Grabado_bastap     = true;
            $l_HotStamping_bastap = true;
            $l_Laminado_bastap    = true;
            $l_Suaje_bastap       = true;

            if (array_key_exists("aAcbBTapa", $aJson)) {

                $aAcbBTapa = [];

                $aAcbBTapa = $aJson['aAcbBTapa'];


                if (array_key_exists("Barniz_UV", $aAcbBTapa)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbBTapa['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_bastap = "INSERT INTO cot_cir_barnizuvbastap(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_bastap = $this->db->prepare($sql_barnizuv_bastap);

                            $l_Barniz_UV_bastap = $query_barnizuv_bastap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Base de la tapa";

                            $l_Barniz_UV_bastap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvbastap";

                            $l_Barniz_UV_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbBTapa)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbBTapa['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_bastap = "INSERT INTO cot_cir_laserbastap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_bastap = $this->db->prepare($sql_laser_bastap);

                            $l_Corte_Laser_bastap = $query_laser_bastap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Base de la Tapa";

                            $l_Corte_Laser_bastap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserbastap";

                            $l_Corte_Laser_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbBTapa)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbBTapa['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_bastap = "INSERT INTO cot_cir_grabbastap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_bastap = $this->db->prepare($sql_grab_bastap);

                            $l_Grabado_bastap = $query_grab_bastap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Base de la Tapa";

                            $l_Grabado_bastap = false;

                            break;
                        }


                        if (!$l_Grabado_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabbastap";

                            $l_Grabado_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbBTapa)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbBTapa['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_bastap = "INSERT INTO cot_cir_hsbastap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_bastap = $this->db->prepare($sql_hs_bastap);

                            $l_HotStamping_bastap = $query_hs_bastap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Base de la Tapa";

                            $l_HotStamping_bastap = false;

                            break;
                        }

                        if (!$l_HotStamping_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsbastap";

                            $l_HotStamping_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbBTapa)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbBTapa['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_lambastap = "INSERT INTO cot_cir_lambastap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_lambastap = $this->db->prepare($sql_laminado_lambastap);

                        $l_Laminado_bastap = $query_laminado_lambastap->execute();

                        if (!$l_Laminado_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lambastap";

                            $l_Laminado_bastap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbBTapa)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbBTapa['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_bastap = "INSERT INTO cot_cir_suajebastap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_bastap = $this->db->prepare($sql_suaje_bastap);

                        $l_Suaje_bastap = $query_suaje_bastap->execute();

                        if (!$l_Suaje_bastap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajebastap";

                            $l_Suaje_bastap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados base de la tapa ***************/


        /********* inicia acabados circunferencia de la tapa ***************/


            $l_Barniz_UV_cirtap   = true;
            $l_Corte_Laser_cirtap = true;
            $l_Grabado_cirtap     = true;
            $l_HotStamping_cirtap = true;
            $l_Laminado_cirtap    = true;
            $l_Suaje_cirtap       = true;

            if (array_key_exists("aAcbCirTapa", $aJson)) {

                $aAcbCirTapa = [];

                $aAcbCirTapa = $aJson['aAcbCirTapa'];


                if (array_key_exists("Barniz_UV", $aAcbCirTapa)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbCirTapa['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_cirtap = "INSERT INTO cot_cir_barnizuvcirtap(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_cirtap = $this->db->prepare($sql_barnizuv_cirtap);

                            $l_Barniz_UV_cirtap = $query_barnizuv_cirtap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Circunferencia de la tapa";

                            $l_Barniz_UV_cirtap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvcirtap";

                            $l_Barniz_UV_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbCirTapa)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbCirTapa['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_cirtap = "INSERT INTO cot_cir_lasercirtap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_cirtap = $this->db->prepare($sql_laser_cirtap);

                            $l_Corte_Laser_cirtap = $query_laser_cirtap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Circunferencia de la tapa";

                            $l_Corte_Laser_cirtap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lasercirtap";

                            $l_Corte_Laser_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbCirTapa)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbCirTapa['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_cirtap = "INSERT INTO cot_cir_grabcirtap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_cirtap = $this->db->prepare($sql_grab_cirtap);

                            $l_Grabado_cirtap = $query_grab_cirtap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Circunferencia de la Tapa";

                            $l_Grabado_cirtap = false;

                            break;
                        }


                        if (!$l_Grabado_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabcirtap";

                            $l_Grabado_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbCirTapa)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbCirTapa['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_cirtap = "INSERT INTO cot_cir_hscirtap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_cirtap = $this->db->prepare($sql_hs_cirtap);

                            $l_HotStamping_cirtap = $query_hs_cirtap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Circunferencia de la Tapa";

                            $l_HotStamping_cirtap = false;

                            break;
                        }

                        if (!$l_HotStamping_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hscirtap";

                            $l_HotStamping_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbCirTapa)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbCirTapa['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_laminado_cirtap = "INSERT INTO cot_cir_lamcirtap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_cirtap = $this->db->prepare($sql_laminado_cirtap);

                        $l_Laminado_cirtap = $query_laminado_cirtap->execute();

                        if (!$l_Laminado_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamcirtap";

                            $l_Laminado_cirtap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbCirTapa)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbCirTapa['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        $sql_suaje_cirtap = "INSERT INTO cot_cir_suajecirtap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_cirtap = $this->db->prepare($sql_suaje_cirtap);

                        $l_Suaje_cirtap = $query_suaje_cirtap->execute();

                        if (!$l_Suaje_cirtap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajecirtap";

                            $l_Suaje_cirtap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados circunferencia de la tapa ***************/



        /********* inicia acabados forro de la tapa ***************/


            $l_Barniz_UV_fortap   = true;
            $l_Corte_Laser_fortap = true;
            $l_Grabado_fortap     = true;
            $l_HotStamping_fortap = true;
            $l_Laminado_fortap    = true;
            $l_Suaje_fortap       = true;

            if (array_key_exists("aAcbFTapa", $aJson)) {

                $aAcbFTapa = [];

                $aAcbFTapa = $aJson['aAcbFTapa'];


                if (array_key_exists("Barniz_UV", $aAcbFTapa)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFTapa['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_fortap = "INSERT INTO cot_cir_barnizuvfortap(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_fortap = $this->db->prepare($sql_barnizuv_fortap);

                            $l_Barniz_UV_fortap = $query_barnizuv_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro de la tapa";

                            $l_Barniz_UV_fortap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvfortap";

                            $l_Barniz_UV_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFTapa)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFTapa['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_fortap = "INSERT INTO cot_cir_laserfortap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_fortap = $this->db->prepare($sql_laser_fortap);

                            $l_Corte_Laser_fortap = $query_laser_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro de la tapa";

                            $l_Corte_Laser_fortap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserfortap";

                            $l_Corte_Laser_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFTapa)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFTapa['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_fortap = "INSERT INTO cot_cir_grabfortap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_fortap = $this->db->prepare($sql_grab_fortap);

                            $l_Grabado_fortap = $query_grab_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro de la Tapa";

                            $l_Grabado_fortap = false;

                            break;
                        }


                        if (!$l_Grabado_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabfortap";

                            $l_Grabado_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFTapa)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFTapa['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_fortap = "INSERT INTO cot_cir_hsfortap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_fortap = $this->db->prepare($sql_hs_fortap);

                            $l_HotStamping_fortap = $query_hs_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Forro de la Tapa";

                            $l_HotStamping_fortap = false;

                            break;
                        }

                        if (!$l_HotStamping_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsfortap";

                            $l_HotStamping_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFTapa)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFTapa['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        if ($laminado_costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laminado_fortap = "INSERT INTO cot_cir_lamfortap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_laminado_fortap = $this->db->prepare($sql_laminado_fortap);

                            $l_Laminado_fortap = $query_laminado_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Laminado en Forro de la Tapa";

                            $l_Laminado_fortap = false;

                            break;
                        }

                        if (!$l_Laminado_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamfortap";

                            $l_Laminado_fortap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFTapa)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFTapa['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($tiro_costo_unitario > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_suaje_fortap = "INSERT INTO cot_cir_suajefortap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_suaje_fortap = $this->db->prepare($sql_suaje_fortap);

                            $l_Suaje_fortap = $query_suaje_fortap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Suaje en Forro de la Tapa";

                            $l_Suaje_fortap = false;

                            break;
                        }

                        if (!$l_Suaje_fortap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajefortap";

                            $l_Suaje_fortap = false;

                            break;
                        }
                    }
                }
            }




        /********* termina acabados forro de la tapa ***************/


        /********* inicia acabados forro exterior de la tapa ***************/


            $l_Barniz_UV_fextap   = true;
            $l_Corte_Laser_fextap = true;
            $l_Grabado_fextap     = true;
            $l_HotStamping_fextap = true;
            $l_Laminado_fextap    = true;
            $l_Suaje_fextap       = true;

            if (array_key_exists("aAcbFexTapa", $aJson)) {

                $aAcbFexTapa = [];

                $aAcbFexTapa = $aJson['aAcbFexTapa'];


                if (array_key_exists("Barniz_UV", $aAcbFexTapa)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFexTapa['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_fextap = "INSERT INTO cot_cir_barnizuvfexttap(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_fextap = $this->db->prepare($sql_barnizuv_fextap);

                            $l_Barniz_UV_fextap = $query_barnizuv_fextap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro exterior de la tapa";

                            $l_Barniz_UV_fextap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvfexttap";

                            $l_Barniz_UV_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFexTapa)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFexTapa['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_fextap = "INSERT INTO cot_cir_laserfexttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_fextap = $this->db->prepare($sql_laser_fextap);

                            $l_Corte_Laser_fextap = $query_laser_fextap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro exterior de la tapa";

                            $l_Corte_Laser_fextap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserfexttap";

                            $l_Corte_Laser_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFexTapa)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFexTapa['Grabado'];

                    foreach($aGrabado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_fextap = "INSERT INTO cot_cir_grabfexttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_fextap = $this->db->prepare($sql_grab_fextap);

                            $l_Grabado_fextap = $query_grab_fextap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro exterior de la Tapa";

                            $l_Grabado_fextap = false;

                            break;
                        }


                        if (!$l_Grabado_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabfexttap";

                            $l_Grabado_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFexTapa)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFexTapa['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_fextap = "INSERT INTO cot_cir_hsfexttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_fextap = $this->db->prepare($sql_hs_fextap);

                            $l_HotStamping_fextap = $query_hs_fextap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Forro exterior de la Tapa";

                            $l_HotStamping_fextap = false;

                            break;
                        }

                        if (!$l_HotStamping_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsfexttap";

                            $l_HotStamping_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFexTapa)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFexTapa['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        if ($laminado_costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laminado_fextap = "INSERT INTO cot_cir_lamfexttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_laminado_fextap = $this->db->prepare($sql_laminado_fextap);

                            $l_Laminado_fextap = $query_laminado_fextap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Laminado en Forro exterior de la Tapa";

                            $l_Laminado_fextap = false;

                            break;
                        }

                        if (!$l_Laminado_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamfexttap";

                            $l_Laminado_fextap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFexTapa)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFexTapa['Suaje'];

                    foreach($aSuaje as $row) {

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($tiro_costo_unitario > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_suaje_fextap = "INSERT INTO cot_cir_suajefexttap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_suaje_fextap = $this->db->prepare($sql_suaje_fextap);

                            $l_Suaje_fextap = $query_suaje_fextap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Suaje en Forro exterior de la Tapa";

                            $l_Suaje_fextap = false;

                            break;
                        }

                        if (!$l_Suaje_fextap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajefexttap";

                            $l_Suaje_fextap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados forro exterior de la tapa ***************/


        /********* inicia acabados forro interior de la tapa ***************/


            $l_Barniz_UV_fintap   = true;
            $l_Corte_Laser_fintap = true;
            $l_Grabado_fintap     = true;
            $l_HotStamping_fintap = true;
            $l_Laminado_fintap    = true;
            $l_Suaje_fintap       = true;

            if (array_key_exists("aAcbFinTapa", $aJson)) {

                $aAcbFinTapa = [];

                $aAcbFinTapa = $aJson['aAcbFinTapa'];


                if (array_key_exists("Barniz_UV", $aAcbFinTapa)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFinTapa['Barniz_UV'];

                    foreach($aBarniz_UV as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($costo_tot_proceso > 0 and $costo_unitario > 0) {

                            $sql_barnizuv_fintap = "INSERT INTO cot_cir_barnizuvfinttap(id_odt, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_fintap = $this->db->prepare($sql_barnizuv_fintap);

                            $l_Barniz_UV_fintap = $query_barnizuv_fintap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro interior de la tapa";

                            $l_Barniz_UV_fintap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_barnizuvfinttap";

                            $l_Barniz_UV_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFinTapa)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFinTapa['Corte_Laser'];

                    foreach($aCorte_Laser as $row) {

                        $costo_tot_proceso = 0;
                        $costo_unitario    = 0;

                        $tipo_grabado            = trim(strval($row['tipo_grabado']));
                        $Largo                   = floatval($row['Largo']);
                        $Ancho                   = floatval($row['Ancho']);
                        $costo_unitario          = floatval($row['costo_unitario']);
                        $tiempo_requerido        = floatval($row['tiempo_requerido']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['merma_min']);
                        $merma_tot               = intval($row['merma_tot']);

                        if ($costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laser_fintap = "INSERT INTO cot_cir_laserfinttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_fintap = $this->db->prepare($sql_laser_fintap);

                            $l_Corte_Laser_fintap = $query_laser_fintap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro interior de la tapa";

                            $l_Corte_Laser_fintap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_laserfinttap";

                            $l_Corte_Laser_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFinTapa)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFinTapa['Grabado'];

                    foreach($aGrabado as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $ubicacion               = trim(strval($row['ubicacion']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $arreglo_costo_unitario > 0 and $costo_unitario_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_grab_fintap = "INSERT INTO cot_cir_grabfinttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_fintap = $this->db->prepare($sql_grab_fintap);

                            $l_Grabado_fintap = $query_grab_fintap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro interior de la Tapa";

                            $l_Grabado_fintap = false;

                            break;
                        }


                        if (!$l_Grabado_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_grabfinttap";

                            $l_Grabado_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFinTapa)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFinTapa['HotStamping'];

                    foreach($aHotStamping as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $Color                   = trim(strval($row['Color']));
                        $placa_area              = floatval($row['placa_area']);
                        $placa_costo_unitario    = floatval($row['placa_costo_unitario']);
                        $placa_costo             = floatval($row['placa_costo']);
                        $pelicula_Largo          = intval($row['pelicula_Largo']);
                        $pelicula_Ancho          = intval($row['pelicula_Ancho']);
                        $pelicula_area           = floatval($row['pelicula_area']);
                        $pelicula_costo_unitario = floatval($row['pelicula_costo_unitario']);
                        $pelicula_costo          = floatval($row['pelicula_costo']);
                        $arreglo_costo_unitario  = floatval($row['arreglo_costo_unitario']);
                        $arreglo_costo           = floatval($row['arreglo_costo']);
                        $costo_unitario_tiro     = floatval($row['costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($placa_costo_unitario > 0 and $placa_costo > 0 and $pelicula_costo_unitario > 0 and $pelicula_costo > 0 and $arreglo_costo_unitario > 0 and $arreglo_costo > 0 and $costo_unitario_tiro > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_hs_fintap = "INSERT INTO cot_cir_hsfinttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_fintap = $this->db->prepare($sql_hs_fintap);

                            $l_HotStamping_fintap = $query_hs_fintap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Forro interior de la Tapa";

                            $l_HotStamping_fintap = false;

                            break;
                        }

                        if (!$l_HotStamping_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_hsfinttap";

                            $l_HotStamping_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFinTapa)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFinTapa['Laminado'];

                    foreach($aLaminado as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $area                    = floatval($row['area']);
                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);


                        if ($laminado_costo_unitario > 0 and $costo_tot_proceso > 0) {

                            $sql_laminado_fintap = "INSERT INTO cot_cir_lamfinttap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_laminado_fintap = $this->db->prepare($sql_laminado_fintap);

                            $l_Laminado_fintap = $query_laminado_fintap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Laminado en Forro interior de la Tapa";

                            $l_Laminado_fintap = false;

                            break;
                        }

                        if (!$l_Laminado_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_lamfinttap";

                            $l_Laminado_fintap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFinTapa)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFinTapa['Suaje'];

                    foreach($aSuaje as $row) {

                        $costo_tot_proceso = 0;

                        $tipoGrabado             = trim(strval($row['tipoGrabado']));
                        $Largo                   = intval($row['Largo']);
                        $Ancho                   = intval($row['Ancho']);
                        $perimetro               = intval($row['perimetro']);
                        $tabla_suaje             = floatval($row['tabla_suaje']);
                        $arreglo                 = floatval($row['arreglo']);
                        $tiro_costo_unitario     = floatval($row['tiro_costo_unitario']);
                        $costo_tiro              = floatval($row['costo_tiro']);
                        $costo_tot_proceso       = floatval($row['costo_tot_proceso']);
                        $merma_min               = intval($row['mermas']['merma_min']);
                        $merma_adic              = intval($row['mermas']['merma_adic']);
                        $merma_tot               = intval($row['mermas']['merma_tot']);
                        $cortes_por_pliego       = intval($row['mermas']['cortes_por_pliego']);
                        $merma_tot_pliegos       = intval($row['mermas']['merma_tot_pliegos']);
                        $costo_unit_merma        = floatval($row['mermas']['costo_unit_merma']);
                        $costo_tot_pliegos_merma = floatval($row['mermas']['costo_tot_pliegos_merma']);

                        if ($tiro_costo_unitario > 0 and $costo_tiro > 0 and $costo_tot_proceso > 0) {

                            $sql_suaje_fintap = "INSERT INTO cot_cir_suajefinttap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_suaje_fintap = $this->db->prepare($sql_suaje_fintap);

                            $l_Suaje_fintap = $query_suaje_fintap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Suaje en Forro interior de la Tapa";

                            $l_Suaje_fintap = false;

                            break;
                        }

                        if (!$l_Suaje_fintap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cir_suajefinttap";

                            $l_Suaje_fintap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados forro interior de la tapa ***************/



   /******************** termina acabados  ************************/


   /******************** inicia cierres  ************************/

            $l_Cierres   = true;

            if (array_key_exists("Cierres", $aJson)) {

                $aCierres = [];

                $aCierres = $aJson['Cierres'];

                foreach($aCierres as $row) {

                    $costo_tot_proceso = 0;

                    $Tipo_cierre       = trim(strval($row['Tipo_cierre']));
                    $tiraje            = intval($row['tiraje']);
                    $numpares          = intval($row['numpares']);

                    $costo_unitario    = floatval($row['costo_unitario']);
                    $costo_tot_proceso = floatval($row['costo_tot_proceso']);


                    switch ($Tipo_cierre) {
                        case 'Iman':

                            $largo = intval($row['largo']);
                            $ancho = intval($row['ancho']);

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, largo, ancho, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, 2, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Liston':

                            $largo = intval($row['largo']);
                            $ancho = intval($row['ancho']);
                            $tipo  = trim(strval($row['tipo']));
                            $color = trim(strval($row['color']));

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, largo, ancho, tipo, color, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, 2, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, '$tipo', '$color', $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Marialuisa':

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, 2, '$Tipo_cierre', $tiraje, $numpares, $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Suaje calado':

                            $largo = intval($row['largo']);
                            $ancho = intval($row['ancho']);
                            $tipo  = trim(strval($row['tipo']));

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, largo, ancho, tipo, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, 2, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, '$tipo', $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Velcro':

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, 2, '$Tipo_cierre', $tiraje, $numpares, $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                    }

                    if ($costo_tot_proceso > 0) {

                        $query_cierres = $this->db->prepare($sql_cierres);

                        $l_Cierres = $query_cierres->execute();
                    } else {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; No existe costo para Cierres";

                        $l_Cierres = false;

                        break;
                    }

                    if (!$l_Cierres) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_cierres";

                        $l_Cierres = false;

                        break;
                    }
                }
            }


   /******************** termina cierres  ************************/


   /******************** inicia accesorios  ************************/
            $l_Accesorios = true;

            if (array_key_exists("Accesorios", $aJson)) {

                $aAccesorios = [];

                $aAccesorios = $aJson['Accesorios'];

                foreach($aAccesorios as $row) {

                    $costo_tot_proceso = 0;

                    $Tipo_accesorio = trim(strval($row['Tipo_accesorio']));
                    $tiraje         = intval($row['tiraje']);

                    $costo_unit_accesorio = floatval($row['costo_unit_accesorio']);
                    $costo_tot_proceso    = floatval($row['costo_tot_proceso']);


                    switch ($Tipo_accesorio) {
                        case 'Herraje':

                            $Tipo = trim(strval($row['Tipo']));

                            $sql_accesorios = "INSERT INTO cot_accesorios(id_odt, id_modelo, tiraje, tipo, tipo_accesorio, costo_unit, costo_tot_accesorio, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$Tipo', '$Tipo_accesorio', $costo_unit_accesorio, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Lengueta de Liston':

                            $largo = intval($row['Largo']);
                            $ancho = intval($row['Ancho']);
                            $color = trim(strval($row['Color']));

                            $sql_accesorios = "INSERT INTO cot_accesorios(id_odt, id_modelo, tiraje, tipo_accesorio, largo, ancho, color, costo_unit, costo_tot_accesorio, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$Tipo_accesorio', $largo, $ancho, '$color', $costo_unit_accesorio, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Ojillos':

                            $sql_accesorios = "INSERT INTO cot_accesorios(id_odt, id_modelo, tiraje, tipo_accesorio, costo_unit, costo_tot_accesorio, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$Tipo_accesorio', $costo_unit_accesorio, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Resorte':

                            $largo = intval($row['Largo']);
                            $ancho = intval($row['Ancho']);
                            $color = trim(strval($row['Color']));

                            $sql_accesorios = "INSERT INTO cot_accesorios(id_odt, id_modelo, tiraje, tipo_accesorio, largo, ancho, color, costo_unit, costo_tot_accesorio, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$Tipo_accesorio', $largo, $ancho, '$color', $costo_unit_accesorio, $costo_tot_proceso, '$d_fecha')";

                            break;
                    }

                    if ($costo_tot_proceso > 0) {

                        $query_accesorios = $this->db->prepare($sql_accesorios);

                        $l_Accesorios = $query_accesorios->execute();
                    } else {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; No existe costo para Accesorios";

                        $l_Accesorios = false;

                        break;
                    }

                    if (!$l_Accesorios) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_accesorios";

                        $l_Accesorios = false;

                        break;
                    }
                }
            }


   /******************** termina accesorios  ************************/


   /******************** inicia bancos  ************************/

            $l_Bancos = true;

            if (array_key_exists("Bancos", $aJson)) {

                $aBancos = [];

                $aBancos = $aJson['Bancos'];

                foreach($aBancos as $row) {

                    $costo_tot_proceso = 0;

                    $Tipo_banco = trim(strval($row['Tipo_banco']));
                    $tiraje         = intval($row['tiraje']);

                    $largo             = intval($row['largo']);
                    $ancho             = intval($row['ancho']);
                    $profundidad       = intval($row['profundidad']);
                    $Suaje             = trim(strval($row['Suaje']));
                    $costo_unit_banco  = floatval($row['costo_unit_banco']);
                    $costo_tot_proceso = floatval($row['costo_tot_proceso']);


                    $sql_bancos = "INSERT INTO cot_bancos(id_odt, id_modelo, tiraje, tipo, largo, ancho, profundidad, suaje, costo_unit, costo_tot_banco, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$Tipo_banco', $largo, $ancho, '$profundidad', '$Suaje', $costo_unit_banco, $costo_tot_proceso, '$d_fecha')";


                    if ($costo_tot_proceso > 0) {

                        $query_bancos = $this->db->prepare($sql_bancos);

                        $l_Bancos = $query_bancos->execute();
                    } else {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; No existe costo para Bancos";

                        $l_Bancos = false;

                        break;
                    }

                    if (!$l_Bancos) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_bancos";

                        $l_Bancos = false;

                        break;
                    }
                }
            }

   /******************** termina bancos  ************************/


            // variables booleanas
            if (
                ($l_inserted and $l_calculadora and $inserted_papel_cir)
                and ($inserted_papel_bcaj and $inserted_papel_circaj and $inserted_papel_fextcaj)
                and ($inserted_papel_pomcaj and $inserted_papel_fintcaj and $inserted_papel_bastap)
                and ($inserted_papel_cirtap and $inserted_papel_fortap and $inserted_papel_fexttap)
                and ($inserted_papel_finttap and $l_ranurado and $l_encuadernacion)
                and ($l_fextcaj and $l_fintcaj and $l_fortap)
                and ($l_fexttap and $l_finttap)
                and ($l_offset_bcaj and $l_digital_bcaj and $l_serigrafia_bcaj)
                and ($l_offset_circaj and $l_digital_circaj and $l_serigrafia_circaj)
                and ($l_offset_fextcaj and $l_digital_fextcaj and $l_serigrafia_fextcaj)
                and ($l_offset_pomcaj and $l_digital_pomcaj and $l_serigrafia_pomcaj)
                and ($l_offset_fintcaj and $l_digital_fintcaj and $l_serigrafia_fintcaj)
                and ($l_offset_bastap and $l_digital_bastap and $l_serigrafia_bastap)
                and ($l_offset_cirtap and $l_digital_cirtap and $l_serigrafia_cirtap)
                and ($l_offset_fortap and $l_digital_fortap and $l_serigrafia_fortap)
                and ($l_offset_fextap and $l_digital_fextap and $l_serigrafia_fextap)
                and ($l_offset_fintap and $l_digital_fintap and $l_serigrafia_fintap)
                and ($l_Barniz_UV_bcaj and $l_Corte_Laser_bcaj and $l_Grabado_bcaj)
                and ($l_HotStamping_bcaj and $l_Laminado_bcaj and $l_Suaje_bcaj)
                and ($l_Barniz_UV_circaj and $l_Corte_Laser_circaj and $l_Grabado_circaj)
                and ($l_HotStamping_circaj and $l_Laminado_circaj and $l_Suaje_circaj)
                and ($l_Barniz_UV_fextcaj and $l_Corte_Laser_fextcaj and $l_Grabado_fextcaj)
                and ($l_HotStamping_fextcaj and $l_Laminado_fextcaj and $l_Suaje_fextcaj)
                and ($l_Barniz_UV_pomcaj and $l_Corte_Laser_pomcaj and $l_Grabado_pomcaj)
                and ($l_HotStamping_pomcaj and $l_Laminado_pomcaj and $l_Suaje_pomcaj)
                and ($l_Barniz_UV_fintcaj and $l_Corte_Laser_fintcaj and $l_Grabado_fintcaj)
                and ($l_HotStamping_fintcaj and $l_Laminado_fintcaj and $l_Suaje_fintcaj)
                and ($l_Barniz_UV_bastap and $l_Corte_Laser_bastap and $l_Grabado_bastap)
                and ($l_HotStamping_bastap and $l_Laminado_bastap and $l_Suaje_bastap)
                and ($l_Barniz_UV_cirtap and $l_Corte_Laser_cirtap and $l_Grabado_cirtap)
                and ($l_HotStamping_cirtap and $l_Laminado_cirtap and $l_Suaje_cirtap)
                and ($l_Barniz_UV_fortap and $l_Corte_Laser_fortap and $l_Grabado_fortap)
                and ($l_HotStamping_fortap and $l_Laminado_fortap and $l_Suaje_fortap)
                and ($l_Barniz_UV_fextap and $l_Corte_Laser_fextap and $l_Grabado_fextap)
                and ($l_HotStamping_fextap and $l_Laminado_fextap and $l_Suaje_fextap)
                and ($l_Barniz_UV_fintap and $l_Corte_Laser_fintap and $l_Grabado_fintap)
                and ($l_HotStamping_fintap and $l_Laminado_fintap and $l_Suaje_fintap)
                and ($l_Cierres and $l_Accesorios and $l_Bancos)
                and ($l_offset_maq_bcaj and $l_offset_maq_circaj and $l_offset_maq_fextcaj)
                and ($l_offset_maq_pomcaj and $l_offset_maq_fintcaj and $l_offset_maq_bastap)
                and ($l_offset_maq_cirtap and $l_offset_maq_fortap and $l_offset_maq_fextap)
                and ($l_offset_maq_fintap)
            ) {

                $this->db->commit();

                return $aJson;
            } else {

                $this->db->rollBack();

                return $aJson['error'];
            }
        } catch (Exception $e) {

            $this->db->rollBack();

            return $aJson['error'];
        }
    }       // end function

}           // end class