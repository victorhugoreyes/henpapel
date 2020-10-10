<?php

class RegaloModel {

    function __construct($db) {

        try {

            $this->db = $db;
        } catch (PDOException $e) {

            exit('Ups! Error de conexion a la Base de Datos. ' . $e);
        }
    }


    public function mError(&$aJson, $mensaje, $error) {

        $aJson["mensaje"] = strval($mensaje);
        $aJson["error"]   = $aJson["error"] . strval($error);

        return $aJson;
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
            $result[$iii]['corte_costo_unitario']   = floatval($row['corte_costo_unitario']);
            $result[$iii]['corte_por_millar']       = intval($row['corte_por_millar']);
            $result[$iii]['costo_corte']            = floatval($row['costo_corte']);
            $result[$iii]['costo_unitario_laminas'] = floatval($row['costo_unitario_laminas']);
            $result[$iii]['costo_tot_laminas']      = floatval($row['costo_tot_laminas']);
            $result[$iii]['costo_unitario_arreglo'] = floatval($row['costo_unitario_arreglo']);
            $result[$iii]['costo_tot_arreglo']      = floatval($row['costo_tot_arreglo']);
            $result[$iii]['costo_unitario_tiro']    = floatval($row['costo_unitario_tiro']);
            $result[$iii]['costo_tot_tiro']         = floatval($row['costo_tot_tiro']);
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


    public function insertRegalo(&$aJson, $ventas_model) {

        $fecha = TODAY;

        $d_fecha = date("Y-m-d", strtotime($fecha));
        $time    = date("H:i:s", time());

        $id_usuario = $aJson['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_modelo         = intval($aJson['modelo']);
        $nomb_odt          = strtoupper(trim(strval($aJson['nomb_odt'])));
        $id_cliente        = intval($aJson['id_cliente']);
        $tiraje            = intval($aJson['tiraje']);
        $base              = floatval($aJson['base']);
        $alto              = floatval($aJson['alto']);
        $profundidad_cajon = floatval($aJson['profundidad_cajon']);
        $profundidad_tapa  = floatval($aJson['profundidad_tapa']);
        $id_grosor_carton  = intval($aJson['costo_grosor_carton']['id_papel']);
        $id_grosor_tapa    = intval($aJson['costo_grosor_tapa']['id_papel']);
        $id_usuario        = intval($aJson['id_usuario']);
        $id_tienda         = intval($aJson['id_tienda']);
        $id_papel_EmpCaj   = intval($aJson['papel_Emp']['id_papel']);
        $id_papel_FCaj     = intval($aJson['papel_FCaj']['id_papel']);
        $id_papel_EmpTap   = intval($aJson['papel_EmpTap']['id_papel']);
        $id_papel_FTap     = intval($aJson['papel_FTap']['id_papel']);


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

            self::mError($aJson, $mensaje, "Ya existe esta Orden de Trabajo;");
            //$aJson['mensaje'] = "ERROR";
            //$aJson['error']   = "Ya existe esta Orden de Trabajo...";

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
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad_cajon, profundidad_tapa, id_vendedor, id_tienda,  costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, id_odt_ant, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$nomb_odt', $id_cliente, $tiraje, $base, $alto, $profundidad_cajon, $profundidad_tapa, $id_usuario, $id_tienda, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', $id_odt_ant, '$d_fecha', '$time')";
            } else {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad_cajon, profundidad_tapa, id_vendedor, id_tienda,  costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$nomb_odt', $id_cliente, $tiraje, $base, $alto, $profundidad_cajon, $profundidad_tapa, $id_usuario, $id_tienda, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', '$d_fecha', '$time')";
            }

            $query_odt = $this->db->prepare($sql);

            $l_inserted = $query_odt->execute();

            $id_caja_odt = 0;

            $id_caja_odt = $this->db->lastInsertId();
            $id_caja_odt = intval($id_caja_odt);

            if ($id_caja_odt <= 0 or !$l_inserted) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_odt" . $sql . ";");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_odt" . $sql;

                $l_inserted = false;
            }


            if ($l_modificar_odt) {

                //$sql_mod = "UPDATE cot_odt SET status = 'M', id_odt_ant = " . $id_caja_odt . ", id_usuario_baja = " . $id_usuario . ", fecha_baja = '$d_fecha', hora_baja = '$time' WHERE id_odt = " . $id_odt_ant;
                $sql_mod = "UPDATE cot_odt SET status = 'M', id_usuario_baja = " . $id_usuario . ", fecha_baja = '$d_fecha', hora_baja = '$time' WHERE id_odt = " . $id_odt_ant;
                //$sql_mod = "UPDATE cot_odt SET status = 'M' WHERE id_odt = " . $id_odt_anterior;

                $query_mod_odt = $this->db->prepare($sql_mod);

                $mod_odt = $query_mod_odt->execute();

                if (!$mod_odt) {

                    self::mError($aJson, $mensaje, "Error al actualizar en la tabla cot_odt" . $sql_mod . ";");
                    //$aJson['mensaje'] = "ERROR";
                    //$aJson['error']   = $aJson['error'] . "; Error al actualizar en la tabla cot_odt " . $sql_mod;

                    $l_inserted = false;
                    $mod_odt    = false;
                }
            }

        // Calculadora
            $l_calculadora = true;

            $b     = floatval($aJson['Calculadora']['b']);
            $h     = floatval($aJson['Calculadora']['h']);
            $p     = floatval($aJson['Calculadora']['p']);
            $T     = floatval($aJson['Calculadora']['T']);
            $g     = floatval($aJson['Calculadora']['g']);
            $G     = floatval($aJson['Calculadora']['G']);
            $e     = floatval($aJson['Calculadora']['e']);
            $E     = floatval($aJson['Calculadora']['E']);
            $b1    = floatval($aJson['Calculadora']['b1']);
            $h1    = floatval($aJson['Calculadora']['h1']);
            $p1    = floatval($aJson['Calculadora']['p1']);
            $x     = floatval($aJson['Calculadora']['x']);
            $y     = floatval($aJson['Calculadora']['y']);
            $x1    = floatval($aJson['Calculadora']['x1']);
            $y1    = floatval($aJson['Calculadora']['y1']);
            $x11   = floatval($aJson['Calculadora']['x11']);
            $y11   = floatval($aJson['Calculadora']['y11']);
            $b11   = floatval($aJson['Calculadora']['b11']);
            $h11   = floatval($aJson['Calculadora']['h11']);
            $f     = floatval($aJson['Calculadora']['f']);
            $k     = floatval($aJson['Calculadora']['k']);
            $B     = floatval($aJson['Calculadora']['B']);
            $H     = floatval($aJson['Calculadora']['H']);
            $X     = floatval($aJson['Calculadora']['X']);
            $Y     = floatval($aJson['Calculadora']['Y']);
            $B1    = floatval($aJson['Calculadora']['B1']);
            $H1    = floatval($aJson['Calculadora']['H1']);
            $X1    = floatval($aJson['Calculadora']['X1']);
            $Y1    = floatval($aJson['Calculadora']['Y1']);
            $X11   = floatval($aJson['Calculadora']['X11']);
            $Y11   = floatval($aJson['Calculadora']['Y11']);
            $B11   = floatval($aJson['Calculadora']['B11']);
            $H11   = floatval($aJson['Calculadora']['H11']);
            $F     = floatval($aJson['Calculadora']['F']);
            $K     = floatval($aJson['Calculadora']['K']);



            $sql_calculadora = "INSERT INTO cot_reg_calculadora(id_modelo, id_odt, b, h, p, t_may, g, g_may, e, e_may, b1, h1, p1, x, y, x1, y1, x11, y11, b11, h11, f, k, b_may, h_may, x_may, y_may, b1_may, h1_may, x1_may, y1_may, x11_may, y11_may, b11_may, h11_may, f_may, k_may, fecha_odt, hora_odt)
                VALUES($id_modelo, $id_caja_odt, $b, $h, $p, $T, $g, $G, $e, $E, $b1, $h1, $p1, $x, $y, $x1, $y1, $x11, $y11, $b11, $h11, $f, $k, $B, $H, $X, $Y, $B1, $H1, $X1, $Y1, $X11, $Y11, $B11, $H11, $F, $K, '$d_fecha', '$time')";

            $query_calculadora = $this->db->prepare($sql_calculadora);

            $l_calculadora = $query_calculadora->execute();

            if (!$l_calculadora) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_calculadora;" . $sql_calculadora . ";");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_calculadora;" . $sql_calculadora;

                $l_calculadora = false;
            }


        /******* Carton *******/

            $inserted_papel_car = true;

            $id_papel     = intval($aJson['grosor_carton']['id_papel']);
            $cantidad      = $tiraje;
            $nombre        = trim(strval($aJson['costo_grosor_carton']['nombre_papel']));
            $costo_unit    = floatval($aJson['costo_grosor_carton']['costo_unit_papel']);
            $ancho         = floatval($aJson['costo_grosor_carton']['ancho_papel']);
            $largo         = floatval($aJson['costo_grosor_carton']['largo_papel']);
            $c_ancho       = floatval($aJson['costo_grosor_carton']['calculadora']['corte_ancho']);
            $c_largo       = floatval($aJson['costo_grosor_carton']['calculadora']['corte_largo']);
            $corte         = intval($aJson['costo_grosor_carton']['corte']);
            $tot_pliegos   = floatval($aJson['costo_grosor_carton']['tot_pliegos']);
            $tot_costo     = floatval($aJson['costo_grosor_carton']['tot_costo']);



        // Carton Cajon
            $sql_papel_car = "INSERT INTO cot_reg_carton
                (id_modelo, id_odt, id_cajon, tiraje, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, $tiraje, '$nombre', $costo_unit, $ancho, $largo, $c_ancho, $c_largo, $corte, $tot_pliegos, $tot_costo, '$d_fecha')";


            $query_papel_car = $this->db->prepare($sql_papel_car);

            $inserted_papel_car = $query_papel_car->execute();

            if (!$inserted_papel_car) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_carton;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_carton";

                $inserted_papel_car = false;
            }


            $inserted_papel_cartap = true;

        /******* Carton de la Tapa *******/

            $id_papel     = intval($aJson['costo_grosor_tapa']['id_papel']);
            $cantidad      = $tiraje;
            $nombre        = trim(strval($aJson['costo_grosor_tapa']['nombre_papel']));
            $costo_unit    = floatval($aJson['costo_grosor_tapa']['costo_unit_papel']);
            $ancho         = floatval($aJson['costo_grosor_tapa']['ancho_papel']);
            $largo         = floatval($aJson['costo_grosor_tapa']['largo_papel']);
            $c_ancho       = floatval($aJson['costo_grosor_tapa']['calculadora']['corte_ancho']);
            $c_largo       = floatval($aJson['costo_grosor_tapa']['calculadora']['corte_largo']);
            $corte         = intval($aJson['costo_grosor_tapa']['corte']);
            $tot_pliegos   = floatval($aJson['costo_grosor_tapa']['tot_pliegos']);
            $tot_costo     = floatval($aJson['costo_grosor_tapa']['tot_costo']);


        // Carton Tapa
            $sql_papel_cartap = "INSERT INTO cot_reg_cartontap
                (id_modelo, id_odt, id_cajon, tiraje, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, $tiraje, '$nombre', $costo_unit, $ancho, $largo, $c_ancho, $c_largo, $corte, $tot_pliegos, $tot_costo, '$d_fecha')";


            $query_papel_cartap = $this->db->prepare($sql_papel_cartap);

            $inserted_papel_cartap = $query_papel_cartap->execute();

            if (!$inserted_papel_cartap) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_cartontap;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_cartontap";

                $inserted_papel_cartap = false;
            }



    /********* inicia papeles ************/

        // papel Empalme del Cajon

            $inserted_papel_empcaj = true;

            $id_papel          = intval($aJson['papel_Emp']['id_papel']);
            $nombre            = trim(strval($aJson['papel_Emp']['nombre_papel']));
            $ancho             = floatval($aJson['papel_Emp']['ancho_papel']);
            $largo             = floatval($aJson['papel_Emp']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_Emp']['costo_unit_papel']);
            $cortes            = intval($aJson['papel_Emp']['corte']);
            $pliegos           = intval($aJson['papel_Emp']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_Emp']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_Emp']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_Emp']['calculadora']['corte_largo']);


            $sql_papel_empcaj = "INSERT INTO cot_reg_papelempcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_empcaj = $this->db->prepare($sql_papel_empcaj);

            $inserted_papel_empcaj = $query_papel_empcaj->execute();

            if (!$inserted_papel_empcaj) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_papelempcaj;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_papelempcaj";

                $inserted_papel_empcaj = false;
            }


        // papel Forro del Cajon

            $inserted_papel_fcaj = true;

            $id_papel          = intval($aJson['papel_FCaj']['id_papel']);
            $nombre            = trim(strval($aJson['papel_FCaj']['nombre_papel']));
            $ancho             = floatval($aJson['papel_FCaj']['ancho_papel']);
            $largo             = floatval($aJson['papel_FCaj']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_FCaj']['costo_unit_papel']);
            $cortes            = intval($aJson['papel_FCaj']['corte']);
            $pliegos           = intval($aJson['papel_FCaj']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_FCaj']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_FCaj']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_FCaj']['calculadora']['corte_largo']);


            $sql_papel_fcaj = "INSERT INTO cot_reg_papelfcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_fcaj = $this->db->prepare($sql_papel_fcaj);

            $inserted_papel_fcaj = $query_papel_fcaj->execute();

            if (!$inserted_papel_fcaj) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_papelfcaj;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_papelfcaj";

                $inserted_papel_fcaj = false;
            }


        // papel empalme de la tapa
            $inserted_papel_emptap = true;

            $id_papel          = intval($aJson['papel_EmpTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_EmpTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_EmpTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_EmpTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_EmpTap']['costo_unit_papel']);
            $cortes            = intval($aJson['papel_EmpTap']['corte']);
            $pliegos           = intval($aJson['papel_EmpTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_EmpTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_EmpTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_EmpTap']['calculadora']['corte_largo']);


            $sql_papel_emptap = "INSERT INTO cot_reg_papelemptap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";



            $query_papel_emptap = $this->db->prepare($sql_papel_emptap);

            $inserted_papel_emptap = $query_papel_emptap->execute();

            if (!$inserted_papel_emptap) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_papelemptap;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_papelemptap";

                $inserted_papel_emptap = false;
            }


        // papel Forro de la Tapa
            $inserted_papel_ftap = true;

            $id_papel          = intval($aJson['papel_FTap']['id_papel']);
            $nombre            = trim(strval($aJson['papel_FTap']['nombre_papel']));
            $ancho             = floatval($aJson['papel_FTap']['ancho_papel']);
            $largo             = floatval($aJson['papel_FTap']['largo_papel']);
            $costo_unit        = floatval($aJson['papel_FTap']['costo_unit_papel']);
            $cortes            = intval($aJson['papel_FTap']['corte']);
            $pliegos           = intval($aJson['papel_FTap']['tot_pliegos']);
            $costo_tot_pliegos = floatval($aJson['papel_FTap']['tot_costo']);
            $corte_ancho       = floatval($aJson['papel_FTap']['calculadora']['corte_ancho']);
            $corte_largo       = floatval($aJson['papel_FTap']['calculadora']['corte_largo']);

            $sql_papel_ftap = "INSERT INTO cot_reg_papelftap
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel, '$nombre', $ancho, $largo, $costo_unit, $tiraje, $cortes, $pliegos, $costo_tot_pliegos, $corte_ancho, $corte_largo, '$d_fecha')";


            $query_papel_ftap = $this->db->prepare($sql_papel_ftap);

            $inserted_papel_ftap = $query_papel_ftap->execute();

            if (!$inserted_papel_ftap) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_papelftap;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_papelftap";

                $inserted_papel_ftap = false;
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


            $sql_ranurado = "INSERT INTO cot_reg_ranurado
                (id_modelo, id_odt, tiraje, arreglo, costo_unit, costo_por_ranura, costo_tot_ranurado, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $arreglo, $costo_unit_por_ranura, $costo_por_ranura, $costo_tot_proceso, '$d_fecha')";


            $query_ranurado = $this->db->prepare($sql_ranurado);

            $l_ranurado = $query_ranurado->execute();

            if (!$l_ranurado) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_ranurado;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_ranurado";

                $l_ranurado = false;
            }


        // ranurado tapa
            $l_ranurado_tap = true;

            $ranurado = $aJson['ranurado'];

            $arreglo               = floatval($ranurado['arreglo']);
            $costo_unit_por_ranura = floatval($ranurado['costo_unit_por_ranura']);
            $costo_por_ranura      = floatval($ranurado['costo_por_ranura']);
            $costo_tot_proceso     = floatval($ranurado['costo_tot_proceso']);


            $sql_ranurado = "INSERT INTO cot_reg_ranurado_tap
                (id_modelo, id_odt, tiraje, arreglo, costo_unit, costo_por_ranura, costo_tot_ranurado, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $arreglo, $costo_unit_por_ranura, $costo_por_ranura, $costo_tot_proceso, '$d_fecha')";


            $query_ranurado = $this->db->prepare($sql_ranurado);

            $l_ranurado_tap = $query_ranurado->execute();

            if (!$l_ranurado_tap) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_ranurado_tap;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_ranurado_tap";

                $l_ranurado_tap = false;
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


            $sql_encuadernacion = "INSERT INTO cot_reg_encuadernacion
                (id_modelo, id_odt, tiraje, costo_unit_iman, perforado_iman_y_puesta, despunte_costo_unit, despunte_esquina_cajon, encajada_costo_unit, encajada_costo_tot, costo_tot_proceso, costo_tot_encuadernacion, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $perf_iman_costo_unitario, $perf_iman_y_puesta, $despunte_costo_unitario, $despunte_de_esquinas_para_cajon, $encajada_costo_unitario, $costo_encajada, $costo_tot_proceso, $costo_tot_encuadernacion, '$d_fecha')";


            $query_encuadernacion = $this->db->prepare($sql_encuadernacion);

            $l_encuadernacion = $query_encuadernacion->execute();

            if (!$l_encuadernacion) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_encuadernacion;" . $sql_encuadernacion . ";");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_encuadernacion;" . $sql_encuadernacion . ";";

                $l_encuadernacion = false;
            }


            // Encuadernacion forro del Cajon
            $l_elab_fcaj = true;

            $forro_costo_unit       = floatval($aJson['elab_FCaj']['costo_unit_forrado_cajon']);
            $forro_cajon            = floatval($aJson['elab_FCaj']['forrado_de_cajon']);
            $arreglo                = floatval($aJson['elab_FCaj']['arreglo']);
            $empalme_costo_unitario = floatval($aJson['elab_FCaj']['empalme_cajon_costo_unitario']);
            $empalme_de_cajon       = floatval($aJson['elab_FCaj']['empalme_de_cajon']);
            $costo_total            = floatval($aJson['elab_FCaj']['costo_tot_proceso']);


            $sql_elabfcaj = "INSERT INTO cot_reg_elab_fcaj
                (id_modelo, id_odt, tiraje, forro_costo_unit, forro_cajon, arreglo, empalme_costo_unitario, empalme_de_cajon, costo_total, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $forro_costo_unit, $forro_cajon, $arreglo, $empalme_costo_unitario, $empalme_de_cajon, $costo_total,  '$d_fecha')";


            $query_elabfcaj = $this->db->prepare($sql_elabfcaj);

            $l_elab_fcaj = $query_elabfcaj->execute();

            if (!$l_elab_fcaj) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_elab_fcaj;" . $sql_elabfcaj . ";");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_elab_fcaj;" . $sql_elabfcaj . ";";

                $l_elab_fcaj = false;
            }


            // Encuadernacion forro de la Tapa
            $l_elab_ftap = true;

            $forro_costo_unit       = floatval($aJson['elab_FTap']['costo_unit_forrado_cajon']);
            $forro_cajon            = floatval($aJson['elab_FTap']['forrado_de_cajon']);
            $arreglo                = floatval($aJson['elab_FTap']['arreglo']);
            $empalme_costo_unitario = floatval($aJson['elab_FTap']['empalme_cajon_costo_unitario']);
            $empalme_de_cajon       = floatval($aJson['elab_FTap']['empalme_de_cajon']);
            $costo_total            = floatval($aJson['elab_FTap']['costo_tot_proceso']);

            $sql_elab_ftap = "INSERT INTO cot_reg_elab_ftap
                (id_modelo, id_odt, tiraje, forro_costo_unit, forro_cajon, arreglo, empalme_costo_unitario, empalme_de_cajon, costo_total, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $forro_costo_unit, $forro_cajon, $arreglo, $empalme_costo_unitario, $empalme_de_cajon, $costo_total,  '$d_fecha')";


            $query_elab_ftap = $this->db->prepare($sql_elab_ftap);

            $l_elab_ftap = $query_elab_ftap->execute();

            if (!$l_elab_ftap) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_elab_ftap;" . $sql_elab_ftap . ";");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_elab_ftap;" . $sql_elab_ftap . ";";

                $l_elab_ftap = false;
            }


            // corte carton
            $l_corte_carton_empcaj  = true;

            // corte carton empalme
            $corte_costo_unitario = floatval($aJson['costo_corte_carton_empcaj']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_carton_empcaj']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_carton_empcaj']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_carton_empcaj']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_carton_empcaj']['tot_costo_corte']);

            $sql_corte_carton = "INSERT INTO cot_reg_corte_carton_empcaj
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_carton = $this->db->prepare($sql_corte_carton);

            $l_corte_carton_empcaj = $query_corte_carton->execute();

            if (!$l_corte_carton_empcaj) {

                self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_corte_carton_empcaj;");
                //$aJson['mensaje'] = "ERROR";
                //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_corte_carton_empcaj";

                $l_corte_carton_empcaj = false;
            }


            // corte carton empalme tapa
            $l_corte_carton_emptap = true;

            $corte_costo_unitario = floatval($aJson['costo_corte_carton_emptap']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_carton_emptap']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_carton_emptap']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_carton_emptap']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_carton_emptap']['tot_costo_corte']);

            $sql_corte_carton_emptap = "INSERT INTO cot_reg_corte_carton_emptap
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_carton_emptap = $this->db->prepare($sql_corte_carton_emptap);

            $l_corte_carton_emptap = $query_corte_carton_emptap->execute();


            // corte papel
            $l_corte_papel_emp  = true;

            // corte carton empalme
            $corte_costo_unitario = floatval($aJson['costo_papel_corte']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_papel_corte']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_papel_corte']['tot_pliegos']);
            $millares             = intval($aJson['costo_papel_corte']['millares']);
            $costo_corte          = floatval($aJson['costo_papel_corte']['tot_costo_corte']);

            $sql_corte_papel = "INSERT INTO cot_reg_corte_papel_empcaj
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_papel = $this->db->prepare($sql_corte_papel);

            $l_corte_papel_emp = $query_corte_papel->execute();



            // corte refine empalme
            $l_corte_refine_emp  = true;

            $corte_costo_unitario = floatval($aJson['costo_corte_refine_emp']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_refine_emp']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_refine_emp']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_refine_emp']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_refine_emp']['tot_costo_corte']);

            $sql_corte_refine = "INSERT INTO cot_reg_corte_refine_empcaj
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_refine = $this->db->prepare($sql_corte_refine);

            $l_corte_refine_emp = $query_corte_refine->execute();



            $l_corte_papel_fcar = true;



        // arreglo ranurado horizontal
            $costo_unit = floatval($aJson['arreglo_ranurado_hor_emp']);

            $sql_ranurado_arreglo_ran_hor = "INSERT INTO cot_reg_arreglo_ranurado_hor_empcaj
                (id_odt, id_modelo, tiraje, costo_unit, costo_tot_ranurado, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $costo_unit, $costo_unit, '$d_fecha')";

            $query_arreglo_ranurado_hor = $this->db->prepare($sql_ranurado_arreglo_ran_hor);

            $l_arr_ran_hor_emp = $query_arreglo_ranurado_hor->execute();


        // arreglo ranurado vertical
            $l_arr_ran_vert_emp = true;

            if ( ($aJson['base'] > $aJson['alto'])  or ($aJson['base'] < $aJson['alto']) ) {

                $costo_unit = 0;
                $costo_unit = floatval($aJson['arreglo_ranurado_ver_emp']);

                if ($costo_unit > 0) {

                    $sql_ranurado_arreglo_ran_ver = "INSERT INTO cot_reg_arreglo_ranurado_vert_empcaj
                        (id_odt, id_modelo, tiraje, costo_unit, costo_tot_ranurado, fecha)
                    VALUES
                        ($id_caja_odt, $id_modelo, $tiraje, $costo_unit, $costo_unit, '$d_fecha')";

                    $query_arreglo_ranurado_vert = $this->db->prepare($sql_ranurado_arreglo_ran_ver);

                    $l_arr_ran_vert_emp = $query_arreglo_ranurado_vert->execute();
                } else {

                    $l_arr_ran_vert_emp = false;
                }
            }

        // despunte de esquinas empalme cajon
            $costo_unit         = floatval($aJson['despunte_esquinas_empcaj']['costo_unit']);
            $costo_tot_despunte = floatval($aJson['despunte_esquinas_empcaj']['costo_tot_despunte']);

            $sql_despunte_emp = "INSERT INTO cot_reg_despunte_esquinas_empcaj(id_modelo, id_odt, tiraje, costo_unit, costo_tot_despunte, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $costo_unit, $costo_tot_despunte, '$d_fecha')";

            $query_despunte_emp = $this->db->prepare($sql_despunte_emp);

            $l_despunte_esquinas = $query_despunte_emp->execute();



            // forro cajon
            $corte_costo_unitario = floatval($aJson['costo_corte_papel_fcaj']['costo_unitario_corte_papel']);
            $cortes_pliego        = intval($aJson['costo_corte_papel_fcaj']['cortes_pliego']);
            $tot_pliegos          = intval($aJson['costo_corte_papel_fcaj']['tot_pliegos']);
            $millares             = intval($aJson['costo_corte_papel_fcaj']['millares']);
            $costo_corte          = floatval($aJson['costo_corte_papel_fcaj']['tot_costo_corte']);

            $sql_corte_fcaj = "INSERT INTO cot_reg_corte_fcaj
                (id_odt, id_modelo, tiraje, corte_costo_unitario, cortes_pliego, tot_pliegos, millares, costo_corte, fecha)
            VALUES
                ($id_caja_odt, $id_modelo, $tiraje, $corte_costo_unitario, $cortes_pliego, $tot_pliegos, $millares, $costo_corte, '$d_fecha')";


            $query_corte_fcaj = $this->db->prepare($sql_corte_fcaj);

            $l_corte_fcaj = $query_corte_fcaj->execute();


            // suaje forro cajon(fijo)

            $l_Suaje_fcaj_fijo = true;

            $tipoGrabado             = trim(strval($aJson['suaje_fcaj_fijo']['tipoGrabado']));
            $Largo                   = intval($aJson['suaje_fcaj_fijo']['Largo']);
            $Ancho                   = intval($aJson['suaje_fcaj_fijo']['Ancho']);
            $perimetro               = intval($aJson['suaje_fcaj_fijo']['perimetro']);
            $tabla_suaje             = floatval($aJson['suaje_fcaj_fijo']['tabla_suaje']);
            $arreglo                 = floatval($aJson['suaje_fcaj_fijo']['arreglo']);
            $tiro_costo_unitario     = floatval($aJson['suaje_fcaj_fijo']['tiro_costo_unitario']);
            $costo_tiro              = floatval($aJson['suaje_fcaj_fijo']['costo_tiro']);
            $costo_tot_proceso       = floatval($aJson['suaje_fcaj_fijo']['costo_tot_proceso']);
            $merma_min               = intval($aJson['suaje_fcaj_fijo']['mermas']['merma_min']);
            $merma_adic              = intval($aJson['suaje_fcaj_fijo']['mermas']['merma_adic']);
            $merma_tot               = intval($aJson['suaje_fcaj_fijo']['mermas']['merma_tot']);
            $cortes_por_pliego       = intval($aJson['suaje_fcaj_fijo']['mermas']['cortes_por_pliego']);
            $merma_tot_pliegos       = intval($aJson['suaje_fcaj_fijo']['mermas']['merma_tot_pliegos']);
            $costo_unit_merma        = floatval($aJson['suaje_fcaj_fijo']['mermas']['costo_unit_merma']);
            $costo_tot_pliegos_merma = floatval($aJson['suaje_fcaj_fijo']['mermas']['costo_tot_pliegos_merma']);

            $sql_suaje_fcaj_fijo = "INSERT INTO cot_reg_suajefcaj_fijo(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

            $query_suaje_fcaj_fijo = $this->db->prepare($sql_suaje_fcaj_fijo);

            $l_Suaje_fcaj_fijo = $query_suaje_fcaj_fijo->execute();


////

        /********* termina costos fijos **********/


    /********* inicia impresion **********/


        /********* impresion empalme del cajon **********/

            $l_offset_empcaj     = true;
            $l_offset_maq_empcaj = true;
            $l_digital_empcaj    = true;
            $l_serigrafia_empcaj = true;

            if (array_key_exists("aImpEmp", $aJson)) {

                $aImpEmp = [];

                $aImpEmp = $aJson['aImpEmp'];


                if (array_key_exists("Offset", $aImpEmp)) {

                    $aOffset = [];

                    $aOffset = $aImpEmp['Offset'];

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

                            $sql_offset_empcaj = "INSERT INTO cot_reg_offsetempcaj(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_offset_empcaj = $this->db->prepare($sql_offset_empcaj);

                            $l_offset_empcaj = $query_offset_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset Empalme del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset en Empalme del cajon";

                            $l_offset_empcaj = false;

                            break;
                        }


                        if (!$l_offset_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetempcaj";

                            $l_offset_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpEmp)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpEmp['Maquila'];

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

                            $sql_offset_maq_empcaj = "INSERT INTO cot_reg_offset_maq_empcaj(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_empcaj = $this->db->prepare($sql_offset_maq_empcaj);

                            $l_offset_maq_empcaj = $query_offset_maq_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Empalme del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Empalme del cajon";

                            $l_offset_maq_empcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_empcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_empcaj";

                            $l_offset_maq_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpEmp)) {

                    $aDigital = [];

                    $aDigital = $aImpEmp['Digital'];

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

                            $sql_digital_empcaj = "INSERT INTO cot_reg_digempcaj(id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos,  $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                            $query_digital_empcaj = $this->db->prepare($sql_digital_empcaj);

                            $l_digital_empcaj = $query_digital_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Digital en Empalme del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Digital en Empalme del cajon";

                            $l_digital_empcaj = false;

                            break;
                        }

                        if (!$l_digital_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digempcaj";

                            $l_digital_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpEmp)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpEmp['Serigrafia'];

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

                        $sql_serigrafia_empcaj = "INSERT INTO cot_reg_serempcaj(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_empcaj = $this->db->prepare($sql_serigrafia_empcaj);

                        $l_serigrafia_empcaj = $query_serigrafia_empcaj->execute();

                        if (!$l_serigrafia_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serempcaj";

                            $l_serigrafia_empcaj = false;

                            break;
                        }
                    }
                }
            }


        /********* termina impresion empalme del cajon **********/


        /********* inicia impresion forro del cajon **********/

            $l_offset_fcaj     = true;
            $l_offset_maq_fcaj = true;
            $l_digital_fcaj    = true;
            $l_serigrafia_fcaj = true;

            if (array_key_exists("aImpFCaj", $aJson)) {

                $aImpFCaj = [];

                $aImpFCaj = $aJson['aImpFCaj'];


                if (array_key_exists("Offset", $aImpFCaj)) {

                    $aOffset = [];

                    $aOffset = $aImpFCaj['Offset'];

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

                        $sql_offset_fcaj = "INSERT INTO cot_reg_offsetfcaj(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fcaj = $this->db->prepare($sql_offset_fcaj);

                        $l_offset_fcaj = $query_offset_fcaj->execute();

                        if (!$l_offset_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetfcaj";

                            $l_offset_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpFCaj)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpFCaj['Maquila'];

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

                            $sql_offset_maq_fcaj = "INSERT INTO cot_reg_offset_maq_fcaj(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fcaj = $this->db->prepare($sql_offset_maq_fcaj);

                            $l_offset_maq_fcaj = $query_offset_maq_fcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Forro del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro del cajon";

                            $l_offset_maq_fcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_fcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_fcaj";

                            $l_offset_maq_circaj = false;

                            break;
                        }
                    }
                }

                if (array_key_exists("Digital", $aImpFCaj)) {

                    $aDigital = [];

                    $aDigital = $aImpFCaj['Digital'];

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

                        $sql_digital_fcaj = "INSERT INTO cot_reg_digfcaj(id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fcaj = $this->db->prepare($sql_digital_fcaj);

                        $l_digital_fcaj = $query_digital_fcaj->execute();

                        if (!$l_digital_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digfcaj";

                            $l_digital_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafia", $aImpFCaj)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpFCaj['Serigrafia'];

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

                        $sql_serigrafia_fcaj = "INSERT INTO cot_reg_serfcaj(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fcaj = $this->db->prepare($sql_serigrafia_fcaj);

                        $l_serigrafia_fcaj = $query_serigrafia_fcaj->execute();

                        if (!$l_serigrafia_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serfcaj";

                            $l_serigrafia_fcaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion forro del cajon **********/


        /********* inicia impresion empalme de la tapa **********/

            $l_offset_emptap     = true;
            $l_offset_maq_emptap = true;
            $l_digital_emptap    = true;
            $l_serigrafia_emptap = true;

            if (array_key_exists("aImpEmpTap", $aJson)) {

                $aImpEmpTap = [];

                $aImpEmpTap = $aJson['aImpEmpTap'];


                if (array_key_exists("Offset", $aImpEmpTap)) {

                    $aOffset = [];

                    $aOffset = $aImpEmpTap['Offset'];

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


                        $sql_offset_emptap = "INSERT INTO cot_reg_offsetemptap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_emptap = $this->db->prepare($sql_offset_emptap);

                        $l_offset_emptap = $query_offset_emptap->execute();

                        if (!$l_offset_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetemptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetemptap";

                            $l_offset_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Maquila", $aImpEmpTap)) {

                    $aOffset_maq = [];

                    $aOffset_maq = $aImpEmpTap['Maquila'];

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

                            $sql_offset_maq_emptap = "INSERT INTO cot_reg_offset_maq_emptap(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_emptap = $this->db->prepare($sql_offset_maq_emptap);

                            $l_offset_maq_emptap = $query_offset_maq_emptap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Empalme de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro exterior del cajon";

                            $l_offset_maq_emptap = false;

                            break;
                        }


                        if (!$l_offset_maq_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_emptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_emptap";

                            $l_offset_maq_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Digital", $aImpEmpTap)) {

                    $aDigital = [];

                    $aDigital = $aImpEmpTap['Digital'];

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

                        $sql_digital_emptap = "INSERT INTO cot_reg_digemptap(id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_emptap = $this->db->prepare($sql_digital_emptap);

                        $l_serigrafia_emptap = $query_digital_emptap->execute();

                        if (!$l_serigrafia_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digemptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digemptap";

                            $l_serigrafia_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Serigrafiacot_reg_seremptap", $aImpEmpTap)) {

                    $aSerigrafia = [];

                    $aSerigrafia = $aImpEmpTap['Serigrafiacot_reg_seremptap'];

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

                        $sql_serigrafia_emptap = "INSERT INTO cot_reg_seremptap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_emptap = $this->db->prepare($sql_serigrafia_emptap);

                        $l_serigrafia_emptap = $query_serigrafia_emptap->execute();

                        if (!$l_serigrafia_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_seremptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_seremptap";

                            $l_serigrafia_emptap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina impresion empalme de la tapa **********/


        /********* inicia impresion forro de la tapa **********/

            $l_offset_ftap     = true;
            $l_offset_maq_ftap = true;
            $l_digital_ftap    = true;
            $l_serigrafia_ftap = true;

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


                        $sql_offset_ftap = "INSERT INTO cot_reg_offsetftap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_ftap = $this->db->prepare($sql_offset_ftap);

                        $l_offset_ftap = $query_offset_ftap->execute();

                        if (!$l_offset_ftap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetftap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetftap";

                            $l_offset_ftap = false;

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

                            $sql_offset_maq_ftap = "INSERT INTO cot_reg_offset_maq_ftap(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_ftap = $this->db->prepare($sql_offset_maq_ftap);

                            $l_offset_maq_ftapDigital = $query_offset_maq_ftap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Forro de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Pompa del cajon";

                            $l_offset_maq_ftap = false;

                            break;
                        }


                        if (!$l_offset_maq_ftap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_ftap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_ftap";

                            $l_offset_maq_ftap = false;

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

                            $l_digital_pomcaj = false;

                            break;
                        }

                        $sql_digital_ftap = "INSERT INTO cot_reg_digftap(id_odt, id_modelo, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $sql_digital_ftap = $this->db->prepare($sql_digital_ftap);

                        $l_digital_ftapSerigrafia = $sql_digital_ftap->execute();

                        if (!$l_digital_ftapSerigrafia) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digftap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digftap";

                            $l_digital_ftapSerigrafia = false;

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

                        $sql_serigrafia_ftap = "INSERT INTO cot_reg_serftap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_ftap = $this->db->prepare($sql_serigrafia_ftap);

                        $l_serigrafia_ftap = $query_serigrafia_ftap->execute();

                        if (!$l_serigrafia_ftap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serftap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serftap";

                            $l_serigrafia_ftap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion forro de la tapa **********/


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


                        $sql_offset_fintcaj = "INSERT INTO cot_reg_offsetfintcaj(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fintcaj = $this->db->prepare($sql_offset_fintcaj);

                        $l_offset_fintcaj = $query_offset_fintcaj->execute();

                        if (!$l_offset_fintcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetfintcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetfintcaj";

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

                            $sql_offset_maq_fintcaj = "INSERT INTO cot_reg_offset_maq_fintcaj(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fintcaj = $this->db->prepare($sql_offset_maq_fintcaj);

                            $l_offset_maq_fintcaj = $query_offset_maq_fintcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Forro interior del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Pompa del cajon";

                            $l_offset_maq_fintcaj = false;

                            break;
                        }


                        if (!$l_offset_maq_fintcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_fintcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_fintcaj";

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

                        $sql_digital_fintcaj = "INSERT INTO cot_reg_digfintcaj(id_odt, id_modelo, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fintcaj = $this->db->prepare($sql_digital_fintcaj);

                        $l_digital_fintcaj = $query_digital_fintcaj->execute();

                        if (!$l_digital_fintcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digfintcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digfintcaj";

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

                        $sql_serigrafia_fintcaj = "INSERT INTO cot_reg_serfintcaj(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fintcaj = $this->db->prepare($sql_serigrafia_fintcaj);

                        $l_serigrafia_fintcaj = $query_serigrafia_fintcaj->execute();

                        if (!$l_serigrafia_fintcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serfintcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serfintcaj";

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


                        $sql_offset_bastap = "INSERT INTO cot_reg_offsetbastap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_bastap = $this->db->prepare($sql_offset_bastap);

                        $l_offset_bastap = $query_offset_bastap->execute();

                        if (!$l_offset_bastap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetbastap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetbastap";

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

                            $sql_offset_maq_bastap = "INSERT INTO cot_reg_offset_maq_bastap(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_bastap = $this->db->prepare($sql_offset_maq_bastap);

                            $l_offset_maq_bastap = $query_offset_maq_bastap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Base de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Base de la tapa";

                            $l_offset_maq_bastap = false;

                            break;
                        }


                        if (!$l_offset_maq_bastap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_bastap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_bastap";

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

                        $sql_digital_bastap = "INSERT INTO cot_reg_digbastap(id_odt, id_modelo, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_bastap = $this->db->prepare($sql_digital_bastap);

                        $l_digital_bastap = $query_digital_bastap->execute();

                        if (!$l_digital_bastap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digbastap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digbastap";

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

                        $sql_serigrafia_bastap = "INSERT INTO cot_reg_serbastap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_bastap = $this->db->prepare($sql_serigrafia_bastap);

                        $l_serigrafia_bastap = $query_serigrafia_bastap->execute();

                        if (!$l_serigrafia_bastap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serbastap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serbastap";

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


                        $sql_offset_cirtap = "INSERT INTO cot_reg_offsetcirtap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_cirtap = $this->db->prepare($sql_offset_cirtap);

                        $l_offset_cirtap = $query_offset_cirtap->execute();

                        if (!$l_offset_cirtap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetcirtap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetcirtap";

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

                            $sql_offset_maq_cirtap = "INSERT INTO cot_reg_offset_maq_cirtap(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_cirtap = $this->db->prepare($sql_offset_maq_cirtap);

                            $l_offset_maq_cirtap = $query_offset_maq_cirtap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Circunferencia de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Circunferencia de la tapa";

                            $l_offset_maq_cirtap = false;

                            break;
                        }


                        if (!$l_offset_maq_cirtap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_cirtap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_cirtap";

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

                        $sql_digital_cirtap = "INSERT INTO cot_reg_digcirtap(id_odt, id_modelo, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, id_modelo, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_cirtap = $this->db->prepare($sql_digital_cirtap);

                        $l_digital_cirtap = $query_digital_cirtap->execute();

                        if (!$l_digital_cirtap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digcirtap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digcirtap";

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

                        $sql_serigrafia_cirtap = "INSERT INTO cot_reg_sercirtap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_cirtap = $this->db->prepare($sql_serigrafia_cirtap);

                        $l_serigrafia_cirtap = $query_serigrafia_cirtap->execute();

                        if (!$l_serigrafia_cirtap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_sercirtap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_sercirtap";

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


                        $sql_offset_fortap = "INSERT INTO cot_reg_offsetfortap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fortap = $this->db->prepare($sql_offset_fortap);

                        $l_offset_fortap = $query_offset_fortap->execute();

                        if (!$l_offset_fortap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetfortap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetfortap";

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

                            $sql_offset_maq_fortap = "INSERT INTO cot_reg_offset_maq_fortap(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fortap = $this->db->prepare($sql_offset_maq_fortap);

                            $l_offset_maq_fortap = $query_offset_maq_fortap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Forro de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro de la tapa";

                            $l_offset_maq_fortap = false;

                            break;
                        }


                        if (!$l_offset_maq_fortap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_fortap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_fortap";

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

                        $sql_digital_fortap = "INSERT INTO cot_reg_digfortap(id_odt, id_modelo, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fortap = $this->db->prepare($sql_digital_fortap);

                        $l_digital_fortap = $query_digital_fortap->execute();

                        if (!$l_digital_fortap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digfortap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digfortap";

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

                        $sql_serigrafia_fortap = "INSERT INTO cot_reg_serfortap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fortap = $this->db->prepare($sql_serigrafia_fortap);

                        $l_serigrafia_fortap = $query_serigrafia_fortap->execute();

                        if (!$l_serigrafia_fortap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serfortap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serfortap";

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


                        $sql_offset_fextap = "INSERT INTO cot_reg_offsetfexttap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fextap = $this->db->prepare($sql_offset_fextap);

                        $l_offset_fextap = $query_offset_fextap->execute();

                        if (!$l_offset_fextap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetfexttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetfexttap";

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

                            $sql_offset_maq_fexttap = "INSERT INTO cot_reg_offset_maq_fexttap(id_odt, id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_fexttap = $this->db->prepare($sql_offset_maq_fexttap);

                            $l_offset_maq_fextap = $query_offset_maq_fexttap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Forro exterior de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro exterior de la tapa";

                            $l_offset_maq_fextap = false;

                            break;
                        }


                        if (!$l_offset_maq_fextap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_fexttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_fexttap";

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

                        $sql_digital_fextap = "INSERT INTO cot_reg_digfexttap(id_odt, id_modelo, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fextap = $this->db->prepare($sql_digital_fextap);

                        $l_digital_fextap = $query_digital_fextap->execute();

                        if (!$l_digital_fextap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digfexttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digfexttap";

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

                        $sql_serigrafia_fextap = "INSERT INTO cot_reg_serfexttap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fextap = $this->db->prepare($sql_serigrafia_fextap);

                        $l_serigrafia_fextap = $query_serigrafia_fextap->execute();

                        if (!$l_serigrafia_fextap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serfexttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serfexttap";

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


                        $sql_offset_fintap = "INSERT INTO cot_reg_offsetfinttap(id_odt, id_modelo, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_offset', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_offset_fintap = $this->db->prepare($sql_offset_fintap);

                        $l_offset_fintap = $query_offset_fintap->execute();

                        if (!$l_offset_fintap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offsetfinttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offsetfinttap";

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

                            $sql_offset_maq_finttap = "INSERT INTO cot_reg_offset_maq_finttap(id_odt, $id_modelo, tipo, cantidad, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                            $query_offset_maq_finttap = $this->db->prepare($sql_offset_maq_finttap);

                            $l_offset_maq_fintap = $query_offset_maq_finttap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo en Offset maquila en Forro interior de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo en Offset maquila en Forro interior de la tapa";

                            $l_offset_maq_fintap = false;

                            break;
                        }


                        if (!$l_offset_maq_fintap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_offset_maq_finttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_offset_maq_finttap";

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

                        $sql_digital_fintap = "INSERT INTO cot_reg_digfinttap(id_odt, id_modelo, cabe_digital, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, cortes_por_pliego, tot_pliegos, costo_tot_proceso, merma_min, merma_adic, merma_tot, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$cabe_digital', $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$tipo_impresion', $costo_unitario, $cortes_por_pliego, $tot_pliegos, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $costo_unitario, $costo_tot, '$d_fecha')";

                        $query_digital_fintap = $this->db->prepare($sql_digital_fintap);

                        $l_digital_fintap = $query_digital_fintap->execute();

                        if (!$l_digital_fintap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_digfinttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_digfinttap";

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

                        $sql_serigrafia_fintap = "INSERT INTO cot_reg_serfinttap(id_odt, id_modelo, tipo, tiraje, num_tintas, cortes_por_pliego, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo', $tiraje, $num_tintas, $cortes_por_pliego, $costo_unit_arreglo, $costo_arreglo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_serigrafia_fintap = $this->db->prepare($sql_serigrafia_fintap);

                        $l_serigrafia_fintap = $query_serigrafia_fintap->execute();

                        if (!$l_serigrafia_fintap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_serfinttap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_serfinttap";

                            $l_serigrafia_fintap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina impresion forro interior de la tapa **********/


   /********** termina impresion ********************/



   /******************** inicia acabados  ************************/

        /********* inicia acabados empalme del cajon ***************/

            $l_Barniz_UV_empcaj   = true;
            $l_Corte_Laser_empcaj = true;
            $l_Grabado_empcaj     = true;
            $l_HotStamping_empcaj = true;
            $l_Laminado_empcaj    = true;
            $l_Suaje_empcaj       = true;

            if (array_key_exists("aAcbEmp", $aJson)) {

                $aAcbEmp = [];

                $aAcbEmp = $aJson['aAcbEmp'];


                if (array_key_exists("Barniz_UV", $aAcbEmp)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbEmp['Barniz_UV'];

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

                            $sql_barnizuv_empcaj = "INSERT INTO cot_reg_barnizuvempcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_empcaj = $this->db->prepare($sql_barnizuv_empcaj);

                            $l_Barniz_UV_empcaj = $query_barnizuv_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Barniz UV en Empalme del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Empalme del cajon";

                            $l_Barniz_UV_empcaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_barnizuvempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_barnizuvempcaj";

                            $l_Barniz_UV_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbEmp)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbEmp['Corte_Laser'];

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

                            $sql_laser_empcaj = "INSERT INTO cot_reg_laserempcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_empcaj = $this->db->prepare($sql_laser_empcaj);

                            $l_Corte_Laser_empcaj = $query_laser_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "NO existe costo para Corte Laser en Empalme del Cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Empalme del Cajon";

                            $l_Corte_Laser_empcaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_laserempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_laserempcaj";

                            $l_Corte_Laser_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbEmp)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbEmp['Grabado'];

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

                            $sql_grab_empcaj = "INSERT INTO cot_reg_grabempcaj(id_odt, id_modelo, tipo_grabado, largo, tiraje, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $Largo, $tiraje, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_empcaj = $this->db->prepare($sql_grab_empcaj);

                            $l_Grabado_empcaj = $query_grab_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Grabado en Empalme del Cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Empalme del Cajon";

                            $l_Grabado_empcaj = false;

                            break;
                        }


                        if (!$l_Grabado_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_grabempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_grabempcaj";

                            $l_Grabado_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbEmp)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbEmp['HotStamping'];

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

                            $sql_hs_empcaj = "INSERT INTO cot_reg_hsempcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_empcaj = $this->db->prepare($sql_hs_empcaj);

                            $l_HotStamping_empcaj = $query_hs_empcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para HotStamping en Empalme del Cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Empalme del Cajon";

                            $l_HotStamping_empcaj = false;

                            break;
                        }

                        if (!$l_HotStamping_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_hsempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_hsempcaj";

                            $l_HotStamping_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbEmp)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbEmp['Laminado'];

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

                        $sql_laminado_empcaj = "INSERT INTO cot_reg_lamempcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_empcaj = $this->db->prepare($sql_laminado_empcaj);

                        $l_Laminado_empcaj = $query_laminado_empcaj->execute();

                        if (!$l_Laminado_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_lamempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_lamempcaj";

                            $l_Laminado_empcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbEmp)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbEmp['Suaje'];

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

                        $sql_suaje_empcaj = "INSERT INTO cot_reg_suajeempcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_empcaj = $this->db->prepare($sql_suaje_empcaj);

                        $l_Suaje_empcaj = $query_suaje_empcaj->execute();

                        if (!$l_Suaje_empcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_suajeempcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_suajeempcaj";

                            $l_Suaje_empcaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina acabados empalme del cajon ***************/


        /********* inicia acabados forro del cajon ***************/

            $l_Barniz_UV_fcaj   = true;
            $l_Corte_Laser_fcaj = true;
            $l_Grabado_fcaj     = true;
            $l_HotStamping_fcaj = true;
            $l_Laminado_fcaj    = true;
            $l_Suaje_fcaj       = true;

            if (array_key_exists("aAcbFCaj", $aJson)) {

                $aAcbFCaj = [];

                $aAcbFCaj = $aJson['aAcbFCaj'];


                if (array_key_exists("Barniz_UV", $aAcbFCaj)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFCaj['Barniz_UV'];

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

                            $sql_barnizuv_fcaj = "INSERT INTO cot_reg_barnizuvfcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_fcaj = $this->db->prepare($sql_barnizuv_fcaj);

                            $l_Barniz_UV_fcaj = $query_barnizuv_fcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Barniz UV en Forro del cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro del cajon";

                            $l_Barniz_UV_fcaj = false;

                            break;
                        }

                        if (!$l_Barniz_UV_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_barnizuvfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_barnizuvfcaj";

                            $l_Barniz_UV_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFCaj)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFCaj['Corte_Laser'];

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

                            $sql_laser_fcaj = "INSERT INTO cot_reg_laserfcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_fcaj = $this->db->prepare($sql_laser_fcaj);

                            $l_Corte_Laser_fcaj = $query_laser_fcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "NO existe costo para Corte Laser en Forro del Cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro del Cajon";

                            $l_Corte_Laser_fcaj = false;

                            break;
                        }


                        if (!$l_Corte_Laser_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_laserfcaj " . $sql_laser_fcaj . ";");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_laserfcaj " . $sql_laser_fcaj;

                            $l_Corte_Laser_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFCaj)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFCaj['Grabado'];

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

                            $sql_grab_fcaj = "INSERT INTO cot_reg_grabfcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_fcaj = $this->db->prepare($sql_grab_fcaj);

                            $l_Grabado_fcaj = $query_grab_fcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Grabado en Forro del Cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro del Cajon";

                            $l_Grabado_fcaj = false;

                            break;
                        }


                        if (!$l_Grabado_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_grabfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_grabfcaj";

                            $l_Grabado_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFCaj)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFCaj['HotStamping'];

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

                            $sql_hs_fcaj = "INSERT INTO cot_reg_hsfcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_fcaj = $this->db->prepare($sql_hs_fcaj);

                            $l_HotStamping_fcaj = $query_hs_fcaj->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para HotStamping en Forro del Cajon;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Forro del Cajon";

                            $l_HotStamping_fcaj = false;

                            break;
                        }

                        if (!$l_HotStamping_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_hsfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_hsfcaj";

                            $l_HotStamping_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFCaj)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFCaj['Laminado'];

                    foreach($aLaminado as $row) {

                        $tipo_grabado            = trim(strval($row['tipoGrabado']));
                        $largo                   = intval($row['Largo']);
                        $ancho                   = intval($row['Ancho']);
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

                        $sql_laminado_fcaj = "INSERT INTO cot_reg_lamfcaj(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_fcaj = $this->db->prepare($sql_laminado_fcaj);

                        $l_Laminado_fcaj = $query_laminado_fcaj->execute();

                        if (!$l_Laminado_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_lamfcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_lamfcaj";

                            $l_Laminado_fcaj = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFCaj)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFCaj['Suaje'];

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

                        $sql_suaje_fcaj = "INSERT INTO cot_reg_suajefcaj(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_fcaj = $this->db->prepare($sql_suaje_fcaj);

                        $l_Suaje_fcaj = $query_suaje_fcaj->execute();

                        if (!$l_Suaje_fcaj) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_suajefcaj;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_suajefcaj";

                            $l_Suaje_fcaj = false;

                            break;
                        }
                    }
                }
            }

        /********* termina acabados forro del cajon ***************/


        /********* inicia acabados empalme de la tapa ***************/


            $l_Barniz_UV_emptap   = true;
            $l_Corte_Laser_emptap = true;
            $l_Grabado_emptap     = true;
            $l_HotStamping_emptap = true;
            $l_Laminado_emptap    = true;
            $l_Suaje_emptap       = true;

            if (array_key_exists("aAcbEmpTap", $aJson)) {

                $aAcbEmpTap = [];

                $aAcbEmpTap = $aJson['aAcbEmpTap'];


                if (array_key_exists("Barniz_UV", $aAcbEmpTap)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbEmpTap['Barniz_UV'];

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

                            $sql_barnizuv_emptap = "INSERT INTO cot_reg_barnizuvemptap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_emptap = $this->db->prepare($sql_barnizuv_emptap);

                            $l_Barniz_UV_emptap = $query_barnizuv_emptap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Barniz UV en Empalme de la tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Empalme de la tapa";

                            $l_Barniz_UV_emptap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_barnizuvemptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_barnizuvemptap";

                            $l_Barniz_UV_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbEmpTap)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbEmpTap['Corte_Laser'];

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

                            $sql_laser_emptap = "INSERT INTO cot_reg_laseremptap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_emptap = $this->db->prepare($sql_laser_emptap);

                            $l_Corte_Laser_emptap = $query_laser_emptap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "NO existe costo para Corte Laser en Empalme de la Tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Empalme de la Tapa";

                            $l_Corte_Laser_emptap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_laseremptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_laseremptap";

                            $l_Corte_Laser_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbEmpTap)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbEmpTap['Grabado'];

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

                            $sql_grab_emptap = "INSERT INTO cot_reg_grabemptap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_emptap = $this->db->prepare($sql_grab_emptap);

                            $l_Grabado_emptap = $query_grab_emptap->execute();
                        } else {

                            self::mError($aJson, $mensaje, "No existe costo para Grabado en Empalme de la Tapa;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Empalme de la Tapa";

                            $l_Grabado_emptap = false;

                            break;
                        }


                        if (!$l_Grabado_emptap) {

                            self::mError($aJson, $mensaje, "Error al grabar en la tabla cot_reg_grabemptap;");
                            //$aJson['mensaje'] = "ERROR";
                            //$aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_grabemptap";

                            $l_Grabado_emptap = false;

                            break;
                        }
                    }
                }


////
                if (array_key_exists("HotStamping", $aAcbEmpTap)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbEmpTap['HotStamping'];

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

                            $sql_hs_emptap = "INSERT INTO cot_reg_hsemptap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_emtap = $this->db->prepare($sql_hs_emptap);

                            $l_HotStamping_emptap = $query_hs_emtap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Empalme de la Tapa";

                            $l_HotStamping_emptap = false;

                            break;
                        }

                        if (!$l_HotStamping_emptap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_hsemptap";

                            $l_HotStamping_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbEmpTap)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbEmpTap['Laminado'];

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

                        $sql_laminado_emtap = "INSERT INTO cot_reg_lamemptap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_emptap = $this->db->prepare($sql_laminado_emtap);

                        $l_Laminado_emptap = $query_laminado_emptap->execute();

                        if (!$l_Laminado_emptap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_lamemptap";

                            $l_Laminado_emptap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbEmpTap)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbEmpTap['Suaje'];

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

                        $sql_suaje_emptap = "INSERT INTO cot_reg_suajeemptap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_emptap = $this->db->prepare($sql_suaje_emptap);

                        $l_Suaje_emptap = $query_suaje_emptap->execute();

                        if (!$l_Suaje_emptap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_suajeemptap";

                            $l_Suaje_emptap = false;

                            break;
                        }
                    }
                }
            }

        /********* termina acabados empalme de la tapa ***************/


        /********* inicia acabados forro de la tapa ***************/


            $l_Barniz_UV_ftap   = true;
            $l_Corte_Laser_ftap = true;
            $l_Grabado_ftap     = true;
            $l_HotStamping_ftap = true;
            $l_Laminado_ftap    = true;
            $l_Suaje_ftap       = true;

            if (array_key_exists("aAcbFTap", $aJson)) {

                $aAcbFTap = [];

                $aAcbFTap = $aJson['aAcbFTap'];


                if (array_key_exists("Barniz_UV", $aAcbFTap)) {

                    $aBarniz_UV = [];

                    $aBarniz_UV = $aAcbFTap['Barniz_UV'];

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

                            $sql_barnizuv_ftap = "INSERT INTO cot_reg_barnizuvftap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma,'$d_fecha')";

                            $query_barnizuv_ftap = $this->db->prepare($sql_barnizuv_ftap);

                            $l_Barniz_UV_ftap = $query_barnizuv_ftap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Barniz UV en Forro de la Tapa";

                            $l_Barniz_UV_ftap = false;

                            break;
                        }

                        if (!$l_Barniz_UV_ftap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_barnizuvftap";

                            $l_Barniz_UV_ftap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Corte_Laser", $aAcbFTap)) {

                    $aCorte_Laser = [];

                    $aCorte_Laser = $aAcbFTap['Corte_Laser'];

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

                            $sql_laser_ftap = "INSERT INTO cot_reg_laserftap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, merma_tot, fecha) VALUES($id_caja_odt, $id_modelo, '$tipo_grabado', $tiraje, $Largo, $Ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, $merma_tot, '$d_fecha')";

                            $query_laser_ftap = $this->db->prepare($sql_laser_ftap);

                            $l_Corte_Laser_ftap = $query_laser_ftap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; NO existe costo para Corte Laser en Forro de la Tapa";

                            $l_Corte_Laser_ftap = false;

                            break;
                        }


                        if (!$l_Corte_Laser_ftap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_laserftap";

                            $l_Corte_Laser_ftap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Grabado", $aAcbFTap)) {

                    $aGrabado = [];

                    $aGrabado = $aAcbFTap['Grabado'];

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

                            $sql_grab_ftap = "INSERT INTO cot_reg_grabftap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_grab_ftap = $this->db->prepare($sql_grab_ftap);

                            $l_Grabado_ftap = $query_grab_ftap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para Grabado en Forro de la Tapa";

                            $l_Grabado_ftap = false;

                            break;
                        }


                        if (!$l_Grabado_ftap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_grabftap";

                            $l_Grabado_ftap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("HotStamping", $aAcbFTap)) {

                    $aHotStamping = [];

                    $aHotStamping = $aAcbFTap['HotStamping'];

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

                            $sql_hs_ftap = "INSERT INTO cot_reg_hsftap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area, pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_Largo, $pelicula_Ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                            $query_hs_ftap = $this->db->prepare($sql_hs_ftap);

                            $l_HotStamping_ftap = $query_hs_ftap->execute();
                        } else {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; No existe costo para HotStamping en Forro de la TapaHotStamping";

                            $l_HotStamping_ftap = false;

                            break;
                        }

                        if (!$l_HotStamping_ftap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_hsftap";

                            $l_HotStamping_ftap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Laminado", $aAcbFTap)) {

                    $aLaminado = [];

                    $aLaminado = $aAcbFTap['Laminado'];

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

                        $sql_laminado_ftap = "INSERT INTO cot_reg_lamftap(id_odt, id_modelo, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $laminado_costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_laminado_ftap = $this->db->prepare($sql_laminado_ftap);

                        $l_Laminado_ftap = $query_laminado_ftap->execute();

                        if (!$l_Laminado_ftap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_lamftap";

                            $l_Laminado_ftap = false;

                            break;
                        }
                    }
                }


                if (array_key_exists("Suaje", $aAcbFTap)) {

                    $aSuaje = [];

                    $aSuaje = $aAcbFTap['Suaje'];

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

                        $sql_suaje_ftap = "INSERT INTO cot_reg_suajeftap(id_odt, id_modelo, tiraje, tipo_grabado, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha) VALUES($id_caja_odt, $id_modelo, $tiraje, '$tipoGrabado', $Largo, $Ancho, $perimetro, $tabla_suaje, $arreglo, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_suaje_ftap = $this->db->prepare($sql_suaje_ftap);

                        $l_Suaje_ftap = $query_suaje_ftap->execute();

                        if (!$l_Suaje_ftap) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_reg_suajeftap";

                            $l_Suaje_ftap = false;

                            break;
                        }
                    }
                }
            }


        /********* termina acabados forro de la tapa ***************/


   /******************** termina acabados  ************************/


   /******************** inicia cierres  ************************/

            $l_Cierres = true;

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

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, largo, ancho, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Liston':

                            $largo = intval($row['largo']);
                            $ancho = intval($row['ancho']);
                            $tipo  = trim(strval($row['tipo']));
                            $color = trim(strval($row['color']));

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, largo, ancho, tipo, color, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, '$tipo', '$color', $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Marialuisa':

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo_cierre', $tiraje, $numpares, $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Suaje calado':

                            $largo = intval($row['largo']);
                            $ancho = intval($row['ancho']);
                            $tipo  = trim(strval($row['tipo']));

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, largo, ancho, tipo, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo_cierre', $tiraje, $numpares, $largo, $ancho, '$tipo', $costo_unitario, $costo_tot_proceso, '$d_fecha')";

                            break;
                        case 'Velcro':

                            $sql_cierres = "INSERT INTO cot_cierres(id_odt, id_modelo, tipo_cierre, tiraje, numpares, costo_unit, costo_tot_cierre, fecha) VALUES($id_caja_odt, $id_modelo, '$Tipo_cierre', $tiraje, $numpares, $costo_unitario, $costo_tot_proceso, '$d_fecha')";

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
                ($l_inserted and $l_calculadora)
                and ($inserted_papel_empcaj and $inserted_papel_fcaj)
                and ($inserted_papel_emptap and $inserted_papel_ftap)

                and ($inserted_papel_car and $inserted_papel_cartap)

                and ($l_ranurado and $l_ranurado_tap and $l_encuadernacion)

                and ($l_arr_ran_hor_emp and $l_arr_ran_vert_emp)

                and ($l_Suaje_fcaj_fijo)

                and ($l_elab_fcaj and $l_elab_ftap)

                and ($l_corte_carton_empcaj and $l_corte_carton_emptap)
                and ($l_corte_papel_emp and $l_corte_refine_emp)

                and ($l_offset_empcaj and $l_offset_maq_empcaj)
                and ($l_digital_empcaj and $l_serigrafia_empcaj)

                and ($l_offset_fcaj and $l_offset_maq_fcaj)
                and ($l_digital_fcaj and $l_serigrafia_fcaj)

                and ($l_offset_emptap and $l_offset_maq_emptap)
                and ($l_digital_emptap and $l_serigrafia_emptap)

                and ($l_offset_ftap and $l_offset_maq_ftap)
                and ($l_digital_ftap and $l_serigrafia_ftap)

                and ($l_Barniz_UV_empcaj and $l_Corte_Laser_empcaj)
                and ($l_Grabado_empcaj and $l_HotStamping_empcaj)
                and ($l_Laminado_empcaj and $l_Suaje_empcaj)

                and ($l_Barniz_UV_fcaj and $l_Corte_Laser_fcaj)
                and ($l_Grabado_fcaj and $l_HotStamping_fcaj)
                and ($l_Laminado_fcaj and $l_Suaje_fcaj)

                and ($l_Barniz_UV_emptap and $l_Corte_Laser_emptap)
                and ($l_Grabado_emptap and $l_HotStamping_emptap)
                and ($l_Laminado_emptap and $l_Suaje_emptap)

                and ($l_Barniz_UV_ftap and $l_Corte_Laser_ftap)
                and ($l_Grabado_ftap and $l_HotStamping_ftap)
                and ($l_Laminado_ftap and $l_Suaje_ftap)

                and ($l_Cierres and $l_Accesorios and $l_Bancos)
            ) {

                $this->db->commit();

                return $aJson;
            } else {

                $this->db->rollBack();

                return $aJson['error'];
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
            //return $aJson['error'];
        }
    }       // end function

}           // end class