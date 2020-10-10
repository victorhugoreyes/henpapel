<?php

class OptionsModel {

    function __construct($db) {

        try {

            $this->db = $db;
        } catch (PDOException $e) {

            exit('Vaya! No se pudo establecer conexion con la base de datos.');
        }
    }


    // obtiene el tipo de modelo de cajas
    public function getBoxModels() {

        $sql = "SELECT * FROM modelos_cajas where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        };

        return $result;
    }


    // obtiene el nombre del modelo de cajas
    public function getNombModelsById_calculo($id_calculo) {

        $sql_model = "SELECT mc.nombre from cajas_calculadas cc join modelos_cajas mc on cc.modelo = mc.id_modelo WHERE cc.status = 'A' and cc.id_calculo = " . $id_calculo;

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // inserta en la tabla papeles
    public function getRegistrar($post) {

        $nombre  = $_POST['nombre'];
        $nombre  = strval($nombre);
        $nombre  = trim($nombre);

        $costo   = $_POST['costo'];
        $costo   = floatval($costo);

        $ancho   = $_POST['ancho'];
        $ancho   = floatval($costo);

        $largo   = $_POST['largo'];
        $largo   = floatval($largo);

        $gramaje = $_POST['gramaje'];
        $gramaje = floatval(gramaje);

        $sql = "INSERT INTO papeles (nombre, costo_unitario, ancho, largo, gramaje)
                VALUES ('"
                . $nombre . "', "
                . $costo . ", "
                . $ancho . ", "
                . $largo . ", "
                . $gramaje
                .")";

        $query = $this->db->prepare($sql);

        if ($query->execute()) {

            return true;
        } else {

            return false;
        }
    }


    // elimina el papel (tabla: papeles; field: id_papel)
    public function getDelete($id) {

        $id    = intval($id);

        $sql   = "DELETE FROM papeles WHERE status = 'A' and id_papel = " . $id;

        $query = $this->db->prepare($sql);

        if ( $query->execute()) {

            return true;

        } else {

            return false;
        }
    }


    // actualiza la tabla papeles
    public function getUpdate($post) {

        $id      = $_POST['id'];
        $id      = intval($id);

        $nombre  = $_POST['nombre'];
        $nombre  = strval($nombre);
        $nombre  = trim($nombre);

        $costo   = $_POST['costo'];
        $costo   = floatval($costo);

        $ancho   = $_POST['ancho'];
        $ancho   = floatval($ancho);

        $largo   = $_POST['largo'];
        $largo   = floatval($largo);

        $gramaje = $_POST['gramaje'];
        $gramaje = floatval($gramaje);

        $sql = "UPDATE papeles SET "
                . "nombre = '" . $nombre . "', "
                . "costo_unitario = " . $costo . ", "
                . "ancho = " . $ancho . ", "
                . "largo = " . $largo . ", "
                . "gramaje = " . $gramaje
                . " WHERE id_papel = " . $id;

        $query = $this->db->prepare($sql);

        if ( $query->execute()) {

            return true;
        } else {

            return false;
        }
    }


    // selecciona el catálogo de products y los ordena ascendente
    public function getInvitations() {

        $sql   = "SELECT * FROM products WHERE status = 'A' ORDER BY sku ASC";
        $query = $this->db->prepare($sql);

        $query->execute();
        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene el catálogo de aumentos ordenado por clave asc
    public function getAumentos() {

        $sql   = "SELECT * FROM aumentos WHERE status = 'A' ORDER BY clave ASC";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene información del cliente(tabla: clientes)
    public function getClientInfo($id, $campo) {

        $id = intval($id);

        $sql = "SELECT $campo FROM clientes WHERE status = 'A' and id_cliente = " . $id;

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result[$campo];
    }


    // obtiene el catálogo de procesos
    public function getAllProcesos() {

        $sql   = "SELECT * FROM procesos_catalogo WHERE status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene los costos de la tabla cierres
    public function getCostoCierre() {

        $sql = "SELECT * FROM cierres WHERE status = 'A' order by nombre asc";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene los costos de la tabla acabados
    public function getCostoAcabados() {

        $sql = "SELECT * FROM acabados WHERE status = 'A' order by nombre asc";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene los costos de la tabla accesorios
    public function getCostoAccesorios() {

        $sql = "SELECT * FROM proc_accesorios WHERE status = 'A' order by nombre asc";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene los costos de la tabla descuentos
    public function getCostoDescuentos() {

        $sql = "SELECT * FROM descuentos WHERE status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene los costos de la tabla bancos
    public function getCostoBancos() {

        $sql = "SELECT * FROM bancos WHERE status = 'A' order by nombre asc";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getPapelId($id) {

        $id_temp = intval($id);

        $sql = "SELECT * FROM papeles where status = 'A' and id_papel = " . $id_temp . " and numcarton = '0' order by costo_unitario desc limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;

    }


    // obtiene el catálogo de papeles (tabla: papeles)
    public function getPapers() {

        $sql = "SELECT * FROM papeles where status = 'A' and numcarton = '0' order by nombre asc";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCartonById($num_carton) {

        $sql = "SELECT * FROM papeles WHERE status = 'A' and numcarton = " . $num_carton . " ORDER BY costo_unitario desc limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    // igual a getCartonById() ???
    public function getMaxCostoCartonId($number) {

        $sql = "SELECT * FROM papeles WHERE status = 'A' and numcarton = " . $number . " order by costo_unitario desc limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // Obtiene el mayor costo unitario de un papel (tabla: papeles)
    public function mostExpensive($number, $costo) {

        $sql = "SELECT MAX(costo_unitario) AS maximo FROM papeles WHERE status = 'A' and numcarton = $number";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        if (round($row['maximo'],2) == $costo) {

            return true;
        } else {

            return false;
        }
    }


    // Obtiene el listado de cartones (tabla: papeles; field: tipo)
    public function getCartones() {

        $sql = "SELECT * FROM papeles WHERE status = 'A' and tipo LIKE 'Carton' ORDER BY numcarton ASC";

        // $sql = "SELECT * FROM papeles WHERE tipo LIKE 'Carton' AND (proveedor LIKE '%Lumen%' OR proveedor LIKE '%Lozano%') ORDER BY numcarton ASC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Inserta nueva variante de cajas(tablas: variantes_cajas, variantes_valores)
    public function addNewOption($post) {

        $modelo  = $post['modelo-caja'];
        $titulo  = $post['titulo'];
        $tipo    = $post['tipo-opcion'];
        $options = $post['options'];
        $name    = $post['name'];

        $sql_variantes = "INSERT INTO `variantes_cajas` (`id_variante`, `nombre`, `tipo_opcion`, `modelo_caja`, `name`) VALUES (NULL, '$titulo', '$tipo',$modelo,'$name')";

        $query = $this->db->prepare($sql_variantes);

        $this->db->beginTransaction();

        $inserted = $query->execute();

        if ($inserted) {

            $variante_id = $this->db->lastInsertId();

            $count = count($options);

            $i = 0;

            foreach ($options as  $option) {

                $sql_valores = "INSERT INTO `variantes_valores` (`id_valor`, `valor`, `id_variante`) VALUES (NULL, '$option', $variante_id)";

                $query2 = $this->db->prepare($sql_valores);

                $inserted2 = $query2->execute();

                if ($inserted2) {

                    $i++;
                } else {

                    break;
                }
            }

            if ($inserted and $inserted2) {

                $this->db->commit();
            } else {

                $this->db->rollBack();
            }

            if ($i == $count) {


                return true;
            } else {

                return false;
            }
        } else {

            return false;
        }
    }


    // Inserta los datos calculados
	// en las tablas cajas_calculadas y detalles_calculo
    public function saveCalc($odt, $modelo, $datos) {

        $user = $_SESSION['user']['id_usuario'];
        $user = intval($user);

        $date = TODAY;
        $hora = date("H:i:s", time());

        $sql = "INSERT INTO `cajas_calculadas` (odt, modelo, usuario, fecha_calculo, hora_calculo) VALUES ('$odt', $modelo, $user, '$date', '$hora')";

        $this->db->beginTransaction();

        $query = $this->db->prepare($sql);

        $inserted = $query->execute();

        if ($inserted) {

            $calculo_id = $this->db->lastInsertId();

            $count = count($datos);

            $i = 0;
            foreach ($datos as $key => $dato) {

                $sql_detalles = "INSERT INTO `detalles_calculo` (id_calculo, `dato`, `valor`) VALUES ($calculo_id, '$key', $dato)";

                $query2 = $this->db->prepare($sql_detalles);

                $inserted2 = $query2->execute();

                if ($inserted2) {

                    $i++;
                } else {

                    break;
                }
            }

            if ($inserted and $inserted2 and $i==$count) {

                $this->db->commit();

                return true;
            } else {

                $this->db->rollBack();

                return false;
            }
        } else {

            $this->db->rollBack();

            return false;
        }
    }


    // Edita los datos calculados(Tablas: cajas_calculadas, detalles_calculo)
    // public function updateCalc($id_calculo, $modelo, $datos) {
    public function updateCalculo() {

        $fecha = TODAY;
        $hora = date("H:i:s", time());

        $id_calculo = intval($_POST['id']);

        $id_modelo = $_POST['modelo'];
        $id_modelo = intval($id_modelo);

        $_SESSION['calculo'] = $_POST;

        $id_usuario     = 0;
        $nombre_usuario = "";

        $id_usuario = $_SESSION['id_usuario'];
        $id_usuario = intval($id_usuario);

        $nombre_usuario = $_SESSION['nombre_usuario'];
        $nombre_usuario = strval($nombre_usuario);
        $nombre_usuario = trim($nombre_usuario);

        $datos = array();

        switch ($id_modelo) {
            case 1:

                $datos['base']           = $_POST['base'];
                $datos['alto']           = $_POST['alto'];
                $datos['profundidad']    = $_POST['profundidad'];
                $datos['grosor-cajon']   = $_POST['grosor-cajon'];
                $datos['grosor-cartera'] = $_POST['grosor-cartera'];

                break;

            case 2:

                $datos['diametro']      = $_POST['diametro'];
                $datos['profundidad']   = $_POST['profundidad'];
                $datos['altura-tapa']   = $_POST['altura-tapa'];
                $datos['grosor-carton'] = $_POST['grosor-carton'];

                break;
            case 3:

                $datos['base']           = $_POST['base'];
                $datos['alto']           = $_POST['alto'];
                $datos['profundidad']    = $_POST['profundidad'];
                $datos['grosor-carton']  = $_POST['grosor-carton'];
                $datos['grosor-cartera'] = $_POST['grosor-cartera'];

                break;
            case 4:

                $datos['base']              = $_POST['base'];
                $datos['alto']              = $_POST['alto'];
                $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                $datos['profundidad-tapa']  = $_POST['profundidad-tapa'];
                $datos['grosor-cajon']      = $_POST['grosor-cajon'];
                $datos['grosor-tapa']       = $_POST['grosor-tapa'];

                break;
            case 5:

                $datos['base']              = $_POST['base'];
                $datos['alto']              = $_POST['alto'];
                $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                $datos['grosor-carton']     = $_POST['grosor-carton'];

                break;
            case 6:

                $datos['base']              = $_POST['base'];
                $datos['alto']              = $_POST['alto'];
                $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                $datos['profundidad-tapa']  = $_POST['profundidad-tapa'];
                $datos['grosor-cajon']      = $_POST['grosor-cajon'];
                $datos['grosor-tapa']       = $_POST['grosor-tapa'];

                break;
            case 7:

                $datos['base']              = $_POST['base'];
                $datos['alto']              = $_POST['alto'];
                $datos['profundidad-cajon'] = $_POST['profundidad-cajon'];
                $datos['grosor-cajon']      = $_POST['grosor-cajon'];

                break;
        }

        $sql = "UPDATE cajas_calculadas
                SET usuario_modif = " . $id_usuario . ",
                    fecha_modif = '$fecha',
                    hora_modif  = '$hora'
                    WHERE id_calculo = " . $id_calculo .
                    " and modelo = " . $id_modelo;

        $this->db->beginTransaction();

        $query = $this->db->prepare($sql);

        $updated = $query->execute();

        if ($updated) {

            $ok = true;

            foreach ($datos as $key => $dato) {

                $sql_detalles = "UPDATE detalles_calculo
                            SET valor = $dato
                            WHERE id_calculo = " . $id_calculo
                            . " and dato = '$key'";

                $query2 = $this->db->prepare($sql_detalles);

                $updated2 = $query2->execute();

                if (!$updated2) {

                    $ok = false;

                    break;
                }
            }

            if ($updated and $ok) {

                $response['result']  = 'correct';

                $this->db->commit();

                return true;
            } else {

                $this->db->rollBack();

                return false;
            }
        } else {

            $this->db->rollBack();

            echo "<br /><br />565. No se actualizó la tabla cajas_calculadas";

            exit();

            return false;
        }
    }


    // obtiene las cajas calculadas(Menu->Cajas->Calculos guardados)
    // obtiene todos los cálculos de las cajas (todas las ODTs)
    public function getSavedCalcs($id_calculo = null) {

        if ($id_calculo == null) {

            $sql = "SELECT c.id_calculo, c.odt, c.modelo as id_modelo, mc.nombre as modelo, c.usuario id_usuario, u.nombre_usuario usuario, c.usuario_modif, uu.nombre_usuario as nomb_usuario_modif, c.fecha_modif, c.hora_modif, c.fecha_calculo, c.hora_calculo from usuarios u join cajas_calculadas c on u.id_usuario = c.usuario left join usuarios uu on c.usuario_modif = uu.id_usuario join modelos_cajas mc on c.modelo = mc.id_modelo WHERE u.status = 'A' ORDER BY c.id_calculo DESC";
        } else {

            $id_calculo = intval($id_calculo);

            $sql = "SELECT c.id_calculo, c.usuario id_usuario, u.nombre_usuario usuario, c.usuario_modif, uu.nombre_usuario as nomb_usuario_modif, c.odt, c.modelo as id_modelo, mc.nombre as modelo,c.fecha_calculo, c.hora_calculo from usuarios u join cajas_calculadas c on u.id_usuario = c.usuario join usuarios uu on c.usuario_modif = uu.id_usuario join modelos_cajas mc on c.modelo = mc.id_modelo where uu.status = 'A' and  c.id_calculo = " . $id_calculo . " ORDER BY c.id_calculo DESC";
        }

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene el nombre del usuario que modificó el registro?
    // revisar el select
    public function getNameUserModif() {

        $sql_nomb_usuario = "SELECT * from usuarios WHERE status = 'A' and  usuario_modif > 0 ";

        $queryNomb_usuario = $this->db->prepare($sql_nomb_usuario);
        $queryNomb_usuario->execute();

        $result = array();

        while ($row = $queryNomb_usuario->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Elimina la odt (tablas: cajas_calculadas, detalles_calculo)
    public function deleteCalculo($id) {

        $id = intval($id);

        $this->db->beginTransaction();

        $sql = "DELETE FROM cajas_calculadas WHERE status = 'A' and id_calculo = " . $id;
        $query = $this->db->prepare($sql);

        if ($query->execute()) {

            $sql2 = "DELETE FROM detalles_calculo WHERE id_calculo = " . $id;

            $query2 = $this->db->prepare($sql2);

            if ($query2->execute()) {

                $this->db->commit();
                return true;
            } else {

                $this->db->rollBack();
                return false;
            }
        }
    }


    // Obtiene la variante de caja(tabla: variantes_cajas)
    public function getOptionsByModel($model) {

        $sql = "SELECT * FROM variantes_cajas WHERE modelo_caja = $model ORDER BY id_variante ASC";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result=array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[]=$row;
        }

        return $result;
    }


    // Obtiene la cotización (tabla: cotizaciones)
    public function getCotizacionById($id) {

        $sql = "SELECT * FROM cotizaciones WHERE status = 'A' and id_cotizacion=$id";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // Obtiene información del producto(Tabla: products)
    public function getModelInfo($id) {

        $sql = "SELECT * FROM products WHERE status = 'A' and id_product=$id";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // Obtiene aumentos por id; (Tabla: aumentos)
    public function getAumentoInfo($id) {

        $sql = "SELECT * FROM aumentos WHERE status = 'A' and id_aumento = $id";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // Obtiene detalles de calculo (Tablas: cajas_calculadas, detalles_calculo)
    public function getCalcDetails($id) {

        $id = intval($id);

        $sql = "SELECT * FROM cajas_calculadas WHERE status = 'A' and id_calculo = " . $id;

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        $result = $row;

        $sql2 = "SELECT * FROM detalles_calculo WHERE id_calculo = " . $id;

        $query2 = $this->db->prepare($sql2);
        $query2->execute();

        while ($row2 = $query2->fetch(PDO::FETCH_ASSOC)) {

            $result[$row2['dato']] = $row2['valor'];
        }

        return $result;
    }


    // Obtine opciones por proceso (Tabla: opciones_procesos)
    public function getOptionsByProcess($process) {

        $sql = "SELECT * FROM opciones_procesos WHERE id_proceso = $process ORDER BY id_opcion ASC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    //Obtiene variante por proceso(Tabla: variantes_opciones_procesos)
    public function getOptionChilds($option) {

        $sql = "SELECT * FROM variantes_opciones_procesos WHERE id_opcion = $option ORDER BY id_opcion ASC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene varianstes hijos (Tabla: variantes_hijos)
    public function getOptionGrandChilds($id) {

        $sql = "SELECT * FROM variantes_hijos WHERE id_variante = $id ORDER BY id_variante ASC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene valores de variantes por opción (Tabla: variantes_valores)
    public function getValuesByOption($option) {

        $sql = "SELECT * FROM variantes_valores WHERE id_variante=$option ORDER BY id_valor ASC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene el catálogo de procesos
    public function getProcessCatalog() {


        $sql = "SELECT * FROM procesos_catalogo WHERE status = 'A' ORDER BY IDCatPro ASC";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Idem a la función getProcessCatalog
    public function getProcessInfo($processID= null) {

        $sql = "SELECT * FROM procesos_catalogo WHERE status = 'A' ORDER BY IDCatPro ASC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[]=$row;
        }

        return $result;
    }


    // Idem a la función getProcessCatalog
    /*
    public function getItemsInfo($itemID = null) {

        $sql = "SELECT * FROM procesos_catalogo WHERE status = 'A' ORDER BY IDCatPro ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[]=$row;
        }

        return $result;
    }
    */


    public function getDatos($id) {

        $sql   = "SELECT * FROM papeles WHERE status = 'A' and id_papel = $id";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getDatosgasto($id) {

        $sql   = "SELECT * FROM  gastos_velada WHERE status = 'A' and  id_gastos = $id";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    // obtiene datos del personal por su $id
    public function getDatospersonal($id) {

        $sql   = "SELECT * FROM personal_velada WHERE status = 'A' and id_personal=$id";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getDatosorden($id) {

        $sql   = "SELECT * FROM orden_velada WHERE status = 'A' and id_orden =$id";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getDatosvelada($id) {

        $sql   = "SELECT * FROM velada WHERE status = 'A' and id_velada = $id";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // actualiza personal_velada por id_personal
    public function getUpdateper($post) {

        $id     = $_POST['id'];
        $nombre = $_POST['nombre'];
        $area   = $_POST['area'];

        $sql = "UPDATE personal_velada SET nombre = '$nombre',
            area = '$area'  WHERE id_personal = $id";

        $this->db->beginTransaction();

        $query = $this->db->prepare($sql);

        if ( $query->execute()) {

            $this->db->commit();

            return true;
        } else {

            $this->db->rollBack();

            return false;
        }
    }


    public function getUpdateor($post) {

        $id          = $_POST['id'];
        $clave       = $_POST['clave'];
        $descripcion = $_POST['descripcion'];

        $sql = "UPDATE orden_velada SET clave = '$clave',
            descripcion = '$descripcion'  WHERE id_orden = $id";

        $this->db->beginTransaction();

        $query = $this->db->prepare($sql);

        if ( $query->execute()) {

            $this->db->commit();

            return true;
        } else {

            $this->db->rollBack();

            return false;
        }
    }


    public function getUpdatevel($post) {

        $id          = $_POST['id'];
        $fecha       = $_POST['fecha'];
        $responsable = $_POST['responsable_velada'];
        $autorizo    = $_POST['autorizo'];

        $sql = "UPDATE velada SET fecha = '$fecha',
           responsable_velada = '$responsable',
           autorizo = '$autorizo' WHERE id_velada = $id";

        $this->db->beginTransaction();

        $query = $this->db->prepare($sql);

        if ( $query->execute()) {

            $this->db->commit();

            return true;
        } else {

            $this->db->rollBack();

            return false;
        }
    }


    public function getInsert($post) {

        $fecha = $post['fecha'];

        $responsable_velada = $post['responsable_velada'];
        $autorizo           = $post['autorizo'];

        $sql1 = "INSERT INTO velada (fecha, responsable_velada, autorizo)
          VALUES ('$fecha', '$responsable_velada', '$autorizo')";

        $ok = true;

        $this->db->beginTransaction();

        $query1 = $this->db->prepare($sql1);
        $query1->execute();

        if ($query1) {

            $id_velada = $this->db->lastInsertId();
        } else {

            $ok = false;
        }

        if ($query1) {

            foreach ($post["personal"] as $key => $nombre) {

                $area = $post["area"][$key];

                $sqlpersonas = "INSERT INTO personal_velada (id_velada, fecha, nombre, area)
                VALUES ($id_velada, '$fecha', '$nombre', '$area')";

                $querypersonas = $this->db->prepare($sqlpersonas);

                if (!$querypersonas->execute()){

                    $ok = false;

                    break;
                }
            }
        }

        if ($ok) {

            foreach ($post["clave"] as $key => $clave) {

                $descripcion = $post["descripcion"][$key];
                $descripcion = strval($descripcion);
                $descripcion = trim($descripcion);

                $sql3 = "INSERT INTO orden_velada (id_velada, fecha, clave, descripcion)
                VALUES ($id_velada, '$fecha', '$clave', '$descripcion')";

                $query3 = $this->db->prepare($sql3);

                if(!$query3->execute()) {

                    $ok = false;

                    break;
                }
            }
        }

        if ($ok) {

            foreach ($post["tipo_gasto"] as $key => $tipo_gasto) {

                $costo = $post["costo"][$key];
                $costo = floatval($costo);
                $costo = abs($costo);

                $tipo_gasto2 = $tipo_gasto;
                $tipo_gasto2 = strval($tipo_gasto2);
                $tipo_gasto2 = trim($tipo_gasto2);

                $sql4 = "INSERT INTO gastos_velada (id_velada, fecha , tipo_gasto, costo)
                VALUES ($id_velada, '$fecha', '$tipo_gasto2', $costo)";

                $query4 = $this->db->prepare($sql4);

                if (!$query4->execute()) {

                    $ok = false;

                    break;
                }
            }
        }

        if (($query1 and $querypersonas) and ($query3 and $query4)) {

            $this->db->commit();

            return true;
        } else {

            $this->db->rollBack();

            return false;
        }
    }


    public function getPersonal() {

        $sql = "SELECT * FROM personal WHERE status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getGastos() {

        $sql = "SELECT * FROM tipogastos WHERE status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

       return $result;
    }


    public function getinformacion($id) {

        $sql= "SELECT * FROM personal_velada WHERE status = 'A' and id_velada = $id";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

       return $result;
    }


    public function getinformacion2($id) {

        $sql   = "SELECT * FROM orden_velada WHERE status = 'A' and id_velada = $id";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();


        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[]=$row;
        }

       return $result;
    }


    public function getinformacion4($id) {

        $sql = "SELECT * FROM velada WHERE status = 'A' and id_velada = $id";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

       return $result;
    }


    public function getinformacion3($id) {

        $sql = "SELECT * FROM gastos_velada WHERE status = 'A' and id_velada = $id";

        $query = $this->db->prepare($sql);

        $query->execute();
        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[]=$row;
        }

        return $result;
    }


    public function getVelada() {

        $sql = "SELECT * FROM velada WHERE status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

       return $result;
    }


    public function getVelada2() {

        $sql = "SELECT * FROM orden_velada WHERE status = 'A' order by id_orden desc";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

       return $result;
    }


    public function getPersonalVelada() {

        $sql = "SELECT * FROM personal_velada WHERE status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

       return $result;
    }


    public function getAutorizo() {

        $sql   = "SELECT * FROM autorizar_velada WHERE status = 'A'";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function archiemprCons() {

        $sql = "SELECT * FROM archiempr WHERE status = 'A' ORDER BY fecha DESC";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function deleteAE($id) {

        $id = intval($id);

        $this->db->beginTransaction();

        $sql = "DELETE FROM archiempr WHERE status = 'A' and idarchivo = " . $id;
        $query = $this->db->prepare($sql);

        $query->execute();

        $this->db->commit();

        return true;
    }


    public function getImpresionesByName($nombre) {

        $sql = "SELECT * FROM impresiones where status = 'A' and nombre = '" . $nombre . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getImpresiones_slaveByName($nombre) {

        $sql = "SELECT * FROM impresiones_slave where status = 'A' and nombre = '" . $nombre . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }

    // obtiene datos de la tabla impresiones
    public function getImpresiones() {

        $sql = "SELECT * FROM impresiones where status = 'A' and grupo = 'Lista'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla impresiones - grupo Serigrafia
    public function getTipoSerigrafia() {

        $sql = "SELECT * FROM impresiones_slave where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo Laminado
    public function getALaminados() {

        $sql = "SELECT * FROM proc_laminado where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo HotStamping
    public function getAHotStamping() {

        //$sql = "SELECT * FROM proc_hotstamping_slave where status = 'A'";
        $sql = "SELECT * FROM proc_hotstamping where status = 'A' and vista = 'S'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo HotStampingColor
    public function getAHotStampingColor() {

        $sql = "SELECT * FROM colores where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo Grabados
    public function getAGrabados() {

        $sql = "SELECT * FROM proc_grabado_slave where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo PegadosEspeciales
    public function getAPEspeciales() {

        $sql = "SELECT * FROM proc_pegados_slave where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo BarnizUV
    public function getABarnizUV() {

        //$sql = "SELECT * FROM proc_barniz_slave where status = 'A'";
        $sql = "SELECT * FROM proc_barniz_uv where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo Suaje
    public function getASuaje() {

        $sql = "SELECT * FROM proc_suaje where status = 'A' and vista = 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // obtiene datos de la tabla acabados - grupo Laser
    public function getALaser() {

        $sql = "SELECT * FROM proc_corte_laser where status = 'A' and vista = 'S' order by nombre asc";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcOffset() {

        $sql   = "SELECT * FROM proc_offset where status = 'A'";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcLaser() {

        $sql   = "SELECT * FROM proc_corte_laser where status = 'A'";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcSerigrafia() {

        $sql   = "SELECT * FROM proc_serigrafia where status = 'A'";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcDigital() {

        //$sql = "SELECT * FROM proc_digital where status = 'A' and vista = 1 order by nombre";
        //$sql   = "SELECT * FROM `proc_digital` WHERE status = 'A' and vista = 1 order by nombre ASC";
        $sql   = "SELECT * FROM proc_digital where status = 'A' order by nombre";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            if( $row['tipo'] == "carta" ){

                $result['carta'][] = $row;
            }else{

                $result['dobleCarta'][] = $row;
            }
        }

        return $result;
    }


    public function getViewDigital() {

        //$sql = "SELECT * FROM proc_digital where status = 'A' and vista='1'";
        $sql = "SELECT * FROM proc_digital where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcLaminado() {

        $sql = "SELECT * FROM proc_laminado where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcHotStamping() {

        $sql = "SELECT * FROM proc_hotstamping where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcGrabado() {

        $sql = "SELECT * FROM proc_grabado WHERE status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getProcSuaje() {

        $sql = "SELECT * FROM proc_suaje where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function UpdateProcOff() {

        $boton        = strval($_POST['tipoProcesoOff']);
        $tirajeMinimo = intval($_POST['txtTirMinOff']);
        $tirajeMaximo = intval($_POST['txtTirMaxOff']);
        $costoLam     = floatval($_POST['txtCosOffLam']);
        $costoArr     = floatval($_POST['txtCosOffArr']);
        $costoTir     = floatval($_POST['txtCosOffTir']);
        $rango11      = intval($_POST['txtRangOff11']);
        $rango12      = intval($_POST['txtRangOff12']);
        $rango21      = intval($_POST['txtRangOff21']);
        $rango22      = intval($_POST['txtRangOff22']);
        $rango31      = intval($_POST['txtRangOff31']);
        $rango32      = intval($_POST['txtRangOff32']);
        $cos1         = floatval($_POST['txtCosUniOff1']);
        $cos2         = floatval($_POST['txtCosUniOff2']);
        $cos3         = floatval($_POST['txtCosUniOff3']);
        $hoy          = date("Y.m.d");
        $usu          = strval($_POST['usuarioOff']);
        $idLam        = intval($_POST['txtIdLamOffset']);
        $idArr        = intval($_POST['txtIdArrOffset']);
        $idTir1       = intval($_POST['txtIdTirOffset1']);
        $idTir2       = intval($_POST['txtIdTirOffset2']);
        $idTir3       = intval($_POST['txtIdTirOffset3']);
        $idTir4       = intval($_POST['txtIdTirOffset4']);
        switch ($boton) {

            case 'btnOffNormal':

                try{

                    $this->db->beginTransaction();
                    $actLamina="UPDATE proc_offset SET costo_unitario=$costoLam WHERE id_offset=$idLam";
                    $query1 = $this->db->prepare($actLamina);
                    $inserted1 = $query1->execute();
                    $actArreglo="UPDATE proc_offset SET costo_unitario=$costoArr, tiraje_minimo=$tirajeMinimo, tiraje_maximo=$tirajeMaximo WHERE id_offset=$idArr";
                    $query2 = $this->db->prepare($actArreglo);
                    $inserted2 = $query2->execute();
                    $actTiro="UPDATE proc_offset SET costo_unitario=$costoTir WHERE id_offset=$idTir1";
                    $query3 = $this->db->prepare($actTiro);
                    $inserted3 = $query3->execute();
                    if($inserted1 and $inserted2 and $inserted3){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
            break;

            case 'btnOffPantone':

                try{

                    $this->db->beginTransaction();
                    $actArreglo="UPDATE proc_offset SET costo_unitario=$costoArr WHERE id_offset=$idArr";
                    $query1 = $this->db->prepare($actArreglo);
                    $inserted1 = $query1->execute();
                    $actTiro="UPDATE proc_offset SET costo_unitario=$costoTir WHERE id_offset=$idTir1";
                    $query2 = $this->db->prepare($actTiro);
                    $inserted2 = $query2->execute();
                    $actLamina="UPDATE proc_offset SET costo_unitario=$costoLam WHERE id_offset=$idLam";
                    $query3 = $this->db->prepare($actLamina);
                    $inserted3 = $query3->execute();
                    if($inserted1 and $inserted2 and $inserted3){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }

                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
            break;

            case 'btnOffMaquila':

                try{

                    $this->db->beginTransaction();
                    $actOff1="UPDATE proc_offset SET costo_unitario=$cos1, tiraje_minimo=$rango11, tiraje_maximo=$rango12 where id_offset=$idTir2";
                    $query1 = $this->db->prepare($actOff1);
                    $inserted1 = $query1->execute();
                    $actOff2="UPDATE proc_offset SET costo_unitario=$cos2, tiraje_minimo=$rango21, tiraje_maximo=$rango22 where id_offset=$idTir3";
                    $query2 = $this->db->prepare($actOff2);
                    $inserted2 = $query2->execute();
                    $actOff3="UPDATE proc_offset SET costo_unitario=$cos3, tiraje_minimo=$rango31, tiraje_maximo=$rango32 where id_offset=$idTir4";
                    $query13 = $this->db->prepare($actOff3);
                    $inserted3 = $query13->execute();
                    $actOff4="UPDATE proc_offset SET costo_unitario=$costoLam where id_offset=$idLam";
                    $query4 = $this->db->prepare($actOff4);
                    $inserted4 = $query4->execute();
                    $actOff5="UPDATE proc_offset SET costo_unitario=$costoArr where id_offset=$idArr";
                    $query5 = $this->db->prepare($actOff5);
                    $inserted5 = $query5->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
            break;

            case 'btnOffMaquilaPantone':

                try{

                    $this->db->beginTransaction();
                    $actOff1="UPDATE proc_offset SET costo_unitario=$cos1, tiraje_minimo=$rango11, tiraje_maximo=$rango12 WHERE id_offset=$idTir2";
                    $query1 = $this->db->prepare($actOff1);
                    $inserted1 = $query1->execute();
                    $actOff2="UPDATE proc_offset SET costo_unitario=$cos2, tiraje_minimo=$rango21, tiraje_maximo=$rango22 WHERE id_offset=$idTir3";
                    $query2 = $this->db->prepare($actOff2);
                    $inserted2 = $query2->execute();
                    $actOff3="UPDATE proc_offset SET costo_unitario=$cos3, tiraje_minimo=$rango31, tiraje_maximo=$rango32 WHERE id_offset=$idTir4";
                    $query3 = $this->db->prepare($actOff3);
                    $inserted3 = $query3->execute();
                    $actOff4="UPDATE proc_offset SET costo_unitario=$costoArr WHERE id_offset=$idArr";
                    $query4 = $this->db->prepare($actOff4);
                    $inserted4 = $query4->execute();
                    $actOff5="UPDATE proc_offset SET costo_unitario=$costoLam WHERE id_offset=$idLam";
                    $query5 = $this->db->prepare($actOff5);
                    $inserted5 = $query5->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
            break;
        }
    }


    public function UpdateProcSer() {

        $boton    = strval($_POST['tipoProcesoSer']);
        $costoArr = floatval($_POST['txtCosSerArr']);
        $rango11  = intval($_POST['txtRangSer11']);
        $rango12  = intval($_POST['txtRangSer12']);
        $rango21  = intval($_POST['txtRangSer21']);
        $rango22  = intval($_POST['txtRangSer22']);
        $rango31  = intval($_POST['txtRangSer31']);
        $rango32  = intval($_POST['txtRangSer32']);
        $rango41  = intval($_POST['txtRangSer41']);
        $rango42  = intval($_POST['txtRangSer42']);
        $cos1     = floatval($_POST['txtCosUniSer1']);
        $cos2     = floatval($_POST['txtCosUniSer2']);
        $cos3     = floatval($_POST['txtCosUniSer3']);
        $cos4     = floatval($_POST['txtCosUniSer4']);
        $hoy      = date("Y.m.d");
        $usu      = strval($_POST['usuarioSer']);
        $idArr    = intval($_POST['txtIdArrSerigrafia']);
        $idTir1   = intval($_POST['txtIdTirSerigrafia1']);
        $idTir2   = intval($_POST['txtIdTirSerigrafia2']);
        $idTir3   = intval($_POST['txtIdTirSerigrafia3']);
        $idTir4   = intval($_POST['txtIdTirSerigrafia4']);
        switch ($boton) {

            case 'btnSerNormal':

                try{

                    $this->db->beginTransaction();
                    $ser1="UPDATE proc_serigrafia SET costo_unitario=$cos1, tiraje_minimo=$rango11, tiraje_maximo=$rango12 WHERE id_proc_serigrafia=$idTir1";
                    $query1 = $this->db->prepare($ser1);
                    $inserted1 = $query1->execute();
                    $ser2="UPDATE proc_serigrafia SET costo_unitario=$cos2, tiraje_minimo=$rango21, tiraje_maximo=$rango22 WHERE id_proc_serigrafia=$idTir2";
                    $query2 = $this->db->prepare($ser2);
                    $inserted2 = $query2->execute();
                    $ser3="UPDATE proc_serigrafia SET costo_unitario=$cos3, tiraje_minimo=$rango31, tiraje_maximo=$rango32 WHERE id_proc_serigrafia=$idTir3";
                    $query3 = $this->db->prepare($ser3);
                    $inserted3 = $query3->execute();
                    $ser4="UPDATE proc_serigrafia SET costo_unitario=$cos4, tiraje_minimo=$rango41, tiraje_maximo=$rango42 WHERE id_proc_serigrafia=$idTir4";
                    $query4 = $this->db->prepare($ser4);
                    $inserted4 = $query4->execute();
                    $ser5="UPDATE proc_serigrafia SET costo_unitario=$costoArr WHERE id_proc_serigrafia=$idArr";
                    $query5 = $this->db->prepare($ser5);
                    $inserted5 = $query5->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
            break;
            case 'btnSerPantone':

                try{

                    $this->db->beginTransaction();
                    $ser1="UPDATE proc_serigrafia SET costo_unitario=$cos1, tiraje_minimo=$rango11, tiraje_maximo=$rango12 WHERE id_proc_serigrafia=$idTir1";
                    $query1 = $this->db->prepare($ser1);
                    $inserted1 = $query1->execute();
                    $ser2="UPDATE proc_serigrafia SET costo_unitario=$cos2, tiraje_minimo=$rango21, tiraje_maximo=$rango22 WHERE id_proc_serigrafia=$idTir2";
                    $query2 = $this->db->prepare($ser2);
                    $inserted2 = $query2->execute();
                    $ser3="UPDATE proc_serigrafia SET costo_unitario=$cos3, tiraje_minimo=$rango31, tiraje_maximo=$rango32 WHERE id_proc_serigrafia=$idTir3";
                    $query3 = $this->db->prepare($ser3);
                    $inserted3 = $query3->execute();
                    $ser4="UPDATE proc_serigrafia SET costo_unitario=$cos4, tiraje_minimo=$rango41, tiraje_maximo=$rango42 WHERE id_proc_serigrafia=$idTir4";
                    $query4 = $this->db->prepare($ser4);
                    $inserted4 = $query4->execute();
                    $ser5="UPDATE proc_serigrafia SET costo_unitario=$costoArr WHERE id_proc_serigrafia=$idArr";
                    $query5 = $this->db->prepare($ser5);
                    $inserted5 = $query5->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
            break;
        }
    }


    public function UpdateProcCor() {
        $costoUnitario = floatval($_POST['txtCosCor']);
        $idCorte=intval($_POST['txtIdCorte']);
        $sql = "UPDATE proc_offset SET  costo_unitario = '$costoUnitario' WHERE id_offset=$idCorte";
        try{
            $query = $this->db->prepare($sql);
            if ( $query->execute()) {

                return true;
            } else {

                return false;
            }
        }catch(Exception $ex){

            return false;
        }
    }


    public function UpdateProcCorLas() {

        $cos1     = floatval($_POST['txtCosCorLasC1']);
        $cos2     = floatval($_POST['txtCosCorLasC2']);
        $cos3     = floatval($_POST['txtCosCorLasC3']);
        $cos4     = floatval($_POST['txtCosCorLasC4']);
        $cos5     = floatval($_POST['txtCosCorLasC5']);
        $t1       = floatval($_POST['txtCosCorLasT1']);
        $t2       = floatval($_POST['txtCosCorLasT2']);
        $t3       = floatval($_POST['txtCosCorLasT3']);
        $t4       = floatval($_POST['txtCosCorLasT4']);
        $t5       = floatval($_POST['txtCosCorLasT5']);
        $idFigSen = intval($_POST['txtIdSenLaser1']);
        $idRanSen = intval($_POST['txtIdSenLaser2']);
        $idFigDet = intval($_POST['txtIdDetLaser1']);
        $idRanDet = intval($_POST['txtIdDetLaser2']);
        $idPer    = intval($_POST['txtIdPerLaser']);
        try{

            $this->db->beginTransaction();
            $FigSenc="UPDATE proc_corte_laser SET tiempo_requerido='$t1', costo_unitario =$cos1 WHERE id_proc_corte_laser=$idFigSen";
            $query1 = $this->db->prepare($FigSenc);
            $inserted1 = $query1->execute();
            $FigDet="UPDATE proc_corte_laser SET tiempo_requerido='$t2', costo_unitario = $cos2 WHERE id_proc_corte_laser=$idFigDet";
            $query2 = $this->db->prepare($FigDet);
            $inserted2 = $query2->execute();
            $RanSenc="UPDATE proc_corte_laser SET tiempo_requerido='$t3', costo_unitario =$cos3 WHERE id_proc_corte_laser=$idRanSen";
            $query3 = $this->db->prepare($RanSenc);
            $inserted3 = $query3->execute();
            $RanDet="UPDATE proc_corte_laser SET tiempo_requerido='$t4', costo_unitario = $cos4 WHERE id_proc_corte_laser=$idRanDet";
            $query4 = $this->db->prepare($RanDet);
            $inserted4 = $query4->execute();
            $pers="UPDATE proc_corte_laser SET tiempo_requerido='$t5', costo_unitario = $cos5 WHERE id_proc_corte_laser=$idPer";
            $query5 = $this->db->prepare($pers);
            $inserted5 = $query5->execute();
            if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                $this->db->commit();
                return true;
            }else{

                $this->db->rollBack();
            return false;
            }
        }catch(Exception $ex){

            $this->db->rollBack();
            return false;
        }
    }


    public function UpdateProcDig() {

        $min11     = intval($_POST['txtRanMinDig1']);
        $max12     = intval($_POST['txtRanMaxDig1']);
        $fre11     = floatval($_POST['txtCosFreDig11']);
        $vue11     = floatval($_POST['txtCosVueDig11']);
        $fre12     = floatval($_POST['txtCosFreDig12']);
        $vue12     = floatval($_POST['txtCosVueDig12']);

        $min21     = intval($_POST['txtRanMinDig2']);
        $max22     = intval($_POST['txtRanMaxDig2']);
        $fre21     = floatval($_POST['txtCosFreDig21']);
        $vue21     = floatval($_POST['txtCosVueDig21']);
        $fre22     = floatval($_POST['txtCosFreDig22']);
        $vue22     = floatval($_POST['txtCosVueDig22']);

        $min31     = intval($_POST['txtRanMinDig3']);
        $max32     = intval($_POST['txtRanMaxDig3']);
        $fre31     = floatval($_POST['txtCosFreDig31']);
        $vue31     = floatval($_POST['txtCosVueDig31']);
        $fre32     = floatval($_POST['txtCosFreDig32']);
        $vue32     = floatval($_POST['txtCosVueDig32']);
        $hoy       = date("Y.m.d");
        $usu       = strval($_POST['usuarioDig']);
        $idFrente1 = intval($_POST['txtIdFreDigital1']);
        $idFrente2 = intval($_POST['txtIdFreDigital2']);
        $idFrente3 = intval($_POST['txtIdFreDigital3']);
        $idFrente4 = intval($_POST['txtIdFreDigital4']);
        $idFrente5 = intval($_POST['txtIdFreDigital5']);
        $idFrente6 = intval($_POST['txtIdFreDigital6']);
        $idVuelta1 = intval($_POST['txtIdVueDigital1']);
        $idVuelta2 = intval($_POST['txtIdVueDigital2']);
        $idVuelta3 = intval($_POST['txtIdVueDigital3']);
        $idVuelta4 = intval($_POST['txtIdVueDigital4']);
        $idVuelta5 = intval($_POST['txtIdVueDigital5']);
        $idVuelta6 = intval($_POST['txtIdVueDigital6']);

        try{

            $this->db->beginTransaction();
            $dig1="UPDATE proc_digital SET tiraje_minimo=$min11,tiraje_maximo=$max12,costo_unitario=$fre11 WHERE id_proc_digital=$idFrente1";
            $query1 = $this->db->prepare($dig1);
            $inserted1 = $query1->execute();
            $dig2="UPDATE proc_digital SET tiraje_minimo=$min11,tiraje_maximo=$max12,costo_unitario=$vue11 WHERE id_proc_digital=$idVuelta1";
            $query2 = $this->db->prepare($dig2);
            $inserted2 = $query2->execute();
            $dig3="UPDATE proc_digital SET tiraje_minimo=$min11,tiraje_maximo=$max12,costo_unitario=$fre12 WHERE id_proc_digital=$idFrente2";
            $query3 = $this->db->prepare($dig3);
            $inserted3 = $query3->execute();
            $dig4="UPDATE proc_digital SET tiraje_minimo=$min11,tiraje_maximo=$max12,costo_unitario=$vue12 WHERE id_proc_digital=$idVuelta2";
            $query4 = $this->db->prepare($dig4);
            $inserted4 = $query4->execute();
            $dig5="UPDATE proc_digital SET tiraje_minimo=$min21,tiraje_maximo=$max22,costo_unitario=$fre21 WHERE id_proc_digital=$idFrente3";
            $query5 = $this->db->prepare($dig5);
            $inserted5 = $query5->execute();
            $dig6="UPDATE proc_digital SET tiraje_minimo=$min21,tiraje_maximo=$max22,costo_unitario=$vue21 WHERE id_proc_digital=$idVuelta3";
            $query6 = $this->db->prepare($dig6);
            $inserted6 = $query6->execute();
            $dig7="UPDATE proc_digital SET tiraje_minimo=$min21,tiraje_maximo=$max22,costo_unitario=$fre22 WHERE id_proc_digital=$idFrente4";
            $query7 = $this->db->prepare($dig7);
            $inserted7 = $query7->execute();
            $dig8="UPDATE proc_digital SET tiraje_minimo=$min21,tiraje_maximo=$max22,costo_unitario=$vue22 WHERE id_proc_digital=$idVuelta4";
            $query8 = $this->db->prepare($dig8);
            $inserted8 = $query8->execute();
            $dig9="UPDATE proc_digital SET tiraje_minimo=$min31,tiraje_maximo=$max32,costo_unitario=$fre31 WHERE id_proc_digital=$idFrente5";
            $query9 = $this->db->prepare($dig9);
            $inserted9 = $query9->execute();
            $dig10="UPDATE proc_digital SET tiraje_minimo=$min31,tiraje_maximo=$max32,costo_unitario=$vue31 WHERE id_proc_digital=$idVuelta5";
            $query10 = $this->db->prepare($dig10);
            $inserted10 = $query10->execute();
            $dig11="UPDATE proc_digital SET tiraje_minimo=$min31,tiraje_maximo=$max32,costo_unitario=$fre32 WHERE id_proc_digital=$idFrente6";
            $query11 = $this->db->prepare($dig11);
            $inserted11 = $query11->execute();
            $dig12="UPDATE proc_digital SET tiraje_minimo=$min31,tiraje_maximo=$max32,costo_unitario=$vue32 WHERE id_proc_digital=$idVuelta6";
            $query12 = $this->db->prepare($dig12);
            $inserted12 = $query12->execute();
            if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5 and $inserted6 and $inserted7 and $inserted8 and $inserted9 and $inserted10 and $inserted11 and $inserted12){

                $this->db->commit();
                return true;
            }else{

                $this->db->rollBack();
                return false;
            }

        }catch(Exception $ex){

            $this->db->rollBack();
            return false;
        }
    }


    public function UpdateProcLam() {

        $rango11 = intval($_POST['txtRanMinLam1']);
        $rango12 = intval($_POST['txtRanMaxLam1']);
        $rango21 = intval($_POST['txtRanMinLam2']);
        $rango22 = intval($_POST['txtRanMaxLam2']);
        $rango31 = intval($_POST['txtRanMinLam3']);
        $rango32 = intval($_POST['txtRanMaxLam3']);
        $rango41 = intval($_POST['txtRanMinLam4']);
        $rango42 = intval($_POST['txtRanMaxLam4']);
        $costo1  = floatval($_POST['txtCosLam1']);
        $costo2  = floatval($_POST['txtCosLam2']);
        $costo3  = floatval($_POST['txtCosLam3']);
        $costo4  = floatval($_POST['txtCosLam4']);
        $btn     = strval($_POST['tipoProcesoLam']);
        $hoy     = date("Y.m.d");
        $usu     = strval($_POST['usuarioLam']);
        $idLam1  = intval($_POST['txtIdLam1']);
        $idLam2  = intval($_POST['txtIdLam2']);
        $idLam3  = intval($_POST['txtIdLam3']);
        $idLam4  = intval($_POST['txtIdLam4']);

        try{

            $this->db->beginTransaction();
            $dig1="UPDATE proc_laminado SET tiraje_minimo=$rango11, tiraje_maximo=$rango12, costo_unitario=$costo1 WHERE id_proc_laminado=$idLam1";
            $query1 = $this->db->prepare($dig1);
            $inserted1 = $query1->execute();
            $dig2="UPDATE proc_laminado SET tiraje_minimo=$rango21, tiraje_maximo=$rango22, costo_unitario=$costo2 WHERE id_proc_laminado=$idLam2";
            $query2 = $this->db->prepare($dig2);
            $inserted2 = $query2->execute();
            $dig3="UPDATE proc_laminado SET tiraje_minimo=$rango31, tiraje_maximo=$rango32, costo_unitario=$costo3 WHERE id_proc_laminado=$idLam3";
            $query3 = $this->db->prepare($dig3);
            $inserted3 = $query3->execute();
            $dig4="UPDATE proc_laminado SET tiraje_minimo=$rango41, tiraje_maximo=$rango42, costo_unitario=$costo4 WHERE id_proc_laminado=$idLam4";
            $query4 = $this->db->prepare($dig4);
            $inserted4 = $query4->execute();
            if($inserted1 and $inserted2 and $inserted3 and $inserted4){

                $this->db->commit();
                return true;
            }else{

                $this->db->rollBack();
                return false;
            }
        }catch(Exception $ex){
            $this->db->rollBack();
            return false;
        }
    }


    public function UpdateProcHotStam() {

        $boton          = strval($_POST['tipoProcesoHot']);
        $precioPelicula = floatval($_POST['txtCosHotPel']);
        $precioPlaca    = floatval($_POST['txtCosHotPlac']);
        $precioArreglo  = floatval($_POST['txtCosHotArr']);
        $tam            = floatval($_POST['txtTamHot']);
        $min1           = intval($_POST['txtMinHot1']);
        $min2           = intval($_POST['txtMinHot2']);
        $min3           = intval($_POST['txtMinHot3']);
        $max1           = intval($_POST['txtMaxHot1']);
        $max2           = intval($_POST['txtMaxHot2']);
        $max3           = intval($_POST['txtMaxHot3']);
        $precio1        = floatval($_POST['txtCosHot1']);
        $precio2        = floatval($_POST['txtCosHot2']);
        $precio3        = floatval($_POST['txtCosHot3']);
        $hoy            = date("Y.m.d");
        $usu            = strval($_POST['usuarioHot']);
        $idPlaca        = intval($_POST['txtIdPlaHS']);
        $idPelicula     = intval($_POST['txtIdPelHS']);
        $idArreglo      = intval($_POST['txtIdArrHS']);
        $idTiro1        = intval($_POST['txtIdTirHS1']);
        $idTiro2        = intval($_POST['txtIdTirHS2']);
        $idTiro3        = intval($_POST['txtIdTirHS3']);

        switch ($boton) {

            case 'btnHotH':

                try{

                    $this->db->beginTransaction();
                    $hot1      = "UPDATE proc_hotStamping set precio_unitario= $precioPlaca, tamano_minimo_placa=$tam where id_hotstamping=$idPlaca";
                    $query1    = $this->db->prepare($hot1);
                    $inserted1 = $query1->execute();
                    $hot2      = "UPDATE proc_hotStamping set precio_unitario= $precioPelicula where id_hotstamping=$idPelicula";
                    $query2    = $this->db->prepare($hot2);
                    $inserted2 = $query2->execute();
                    $hot3      = "UPDATE proc_hotStamping set precio_unitario= $precioArreglo where id_hotstamping=$idArreglo";
                    $query3    = $this->db->prepare($hot3);
                    $inserted3 = $query3->execute();
                    $hot4      = "UPDATE proc_hotStamping set tiraje_minimo=$min1,tiraje_maximo=$max1, precio_unitario=$precio1 where id_hotstamping=$idTiro1";
                    $query4    = $this->db->prepare($hot4);
                    $inserted4 = $query4->execute();
                    $hot5      = "UPDATE proc_hotStamping set tiraje_minimo=$min2,tiraje_maximo=$max2, precio_unitario=$precio2 where id_hotstamping=$idTiro2";
                    $query5    = $this->db->prepare($hot5);
                    $inserted5 = $query5->execute();
                    $hot6      = "UPDATE proc_hotStamping set tiraje_minimo=$min3,tiraje_maximo=$max3, precio_unitario=$precio3 where id_hotstamping=$idTiro3";
                    $query6    = $this->db->prepare($hot6);
                    $inserted6 = $query6->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5 and $inserted6){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){
                    $this->db->rollBack();
                    return false;
                }
                break;
            case 'btnHotH1':

                try{

                    $this->db->beginTransaction();
                    $hot1      = "UPDATE proc_hotStamping SET precio_unitario= $precioPlaca, tamano_minimo_placa=$tam WHERE id_hotstamping=$idPlaca";
                    $query1    = $this->db->prepare($hot1);
                    $inserted1 = $query1->execute();
                    $hot2      ="UPDATE proc_hotStamping SET precio_unitario= $precioPelicula WHERE id_hotstamping=$idPelicula";
                    $query2    = $this->db->prepare($hot2);
                    $inserted2 = $query2->execute();
                    $hot3      = "UPDATE proc_hotStamping SET precio_unitario= $precioArreglo WHERE id_hotstamping=$idArreglo";
                    $query3    = $this->db->prepare($hot3);
                    $inserted3 = $query3->execute();
                    $hot4      = "UPDATE proc_hotStamping SET tiraje_minimo=$min1,tiraje_maximo=$max1, precio_unitario=$precio1 WHERE id_hotstamping=$idTiro1";
                    $query4    = $this->db->prepare($hot4);
                    $inserted4 = $query4->execute();
                    $hot5      = "UPDATE proc_hotStamping SET tiraje_minimo=$min2,tiraje_maximo=$max2, precio_unitario=$precio2 WHERE id_hotstamping=$idTiro2";
                    $query5    = $this->db->prepare($hot5);
                    $inserted5 = $query5->execute();
                    $hot6      = "UPDATE proc_hotStamping SET tiraje_minimo=$min3,tiraje_maximo=$max3, precio_unitario=$precio3 WHERE id_hotstamping=$idTiro3";
                    $query6    = $this->db->prepare($hot6);
                    $inserted6 = $query6->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5 and $inserted6){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){
                    $this->db->rollBack();
                    return false;
                }
                break;
                case 'btnHotH2':

                try{

                    $this->db->beginTransaction();
                    $hot1      = "UPDATE proc_hotStamping SET precio_unitario= $precioPlaca, tamano_minimo_placa=$tam WHERE id_hotstamping=$idPlaca";
                    $query1    = $this->db->prepare($hot1);
                    $inserted1 = $query1->execute();
                    $hot2      = "UPDATE proc_hotStamping SET precio_unitario= $precioPelicula WHERE id_hotstamping=$idPelicula";
                    $query2    = $this->db->prepare($hot2);
                    $inserted2 = $query2->execute();
                    $hot3      = "UPDATE proc_hotStamping SET precio_unitario= $precioArreglo WHERE id_hotstamping=$idArreglo";
                    $query3    = $this->db->prepare($hot3);
                    $inserted3 = $query3->execute();
                    $hot4      = "UPDATE proc_hotStamping SET tiraje_minimo=$min1,tiraje_maximo=$max1, precio_unitario=$precio1 WHERE id_hotstamping=$idTiro1";
                    $query4    = $this->db->prepare($hot4);
                    $inserted4 = $query4->execute();
                    $hot5      = "UPDATE proc_hotStamping SET tiraje_minimo=$min2,tiraje_maximo=$max2, precio_unitario=$precio2 WHERE id_hotstamping=$idTiro2";
                    $query5    = $this->db->prepare($hot5);
                    $inserted5 = $query5->execute();
                    $hot6      = "UPDATE proc_hotStamping SET tiraje_minimo=$min3,tiraje_maximo=$max3, precio_unitario=$precio3 WHERE id_hotstamping=$idTiro3";
                    $query6    = $this->db->prepare($hot6);
                    $inserted6 = $query6->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5 and $inserted6){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){
                    $this->db->rollBack();
                    return false;
                }
                break;
        }
    }


    public function UpdateProcGra() {

        $boton         = strval($_POST['tipoProcesoGra']);
        $precioPlaca   = floatval($_POST['txtCosGraPlac']);
        $precioArreglo = floatval($_POST['txtCosGraArr']);
        $min1          = intval($_POST['txtMinGra1']);
        $min2          = intval($_POST['txtMinGra2']);
        $min3          = intval($_POST['txtMinGra3']);
        $max1          = intval($_POST['txtMaxGra1']);
        $max2          = intval($_POST['txtMaxGra2']);
        $max3          = intval($_POST['txtMaxGra3']);
        $precio1       = floatval($_POST['txtCosGra1']);
        $precio2       = floatval($_POST['txtCosGra2']);
        $precio3       = floatval($_POST['txtCosGra3']);
        $tam           = floatval($_POST['txtTamGra']);
        $hoy           = date("Y.m.d");
        $usu           = strval($_POST['usuarioGra']);
        $idPlaca       = intval($_POST['txtIdPlaG']);
        $idArreglo     = intval($_POST['txtIdArrG']);
        $idTiro1       = intval($_POST['txtIdTirG1']);
        $idTiro2       = intval($_POST['txtIdTirG2']);
        $idTiro3       = intval($_POST['txtIdTirG3']);

        switch ($boton) {

            case 'btnGraG1':

                try{

                    $this->db->beginTransaction();
                    $gra1      = "UPDATE proc_grabado SET precio_unitario= $precioPlaca, tamano_minimo_placa=$tam WHERE id_grabado=$idPlaca";
                    $query1    = $this->db->prepare($gra1);
                    $inserted1 = $query1->execute();
                    $gra2      = "UPDATE proc_grabado SET precio_unitario=$precioArreglo WHERE id_grabado=$idArreglo";
                    $query2    = $this->db->prepare($gra2);
                    $inserted2 = $query2->execute();
                    $gra3      = "UPDATE proc_grabado SET tiraje_minimo=$min1,tiraje_maximo=$max1, precio_unitario=$precio1 WHERE id_grabado=$idTiro1";
                    $query3    = $this->db->prepare($gra3);
                    $inserted3 = $query3->execute();
                    $gra4      = "UPDATE proc_grabado SET tiraje_minimo=$min2,tiraje_maximo=$max2, precio_unitario=$precio2 WHERE id_grabado=$idTiro2";
                    $query4    = $this->db->prepare($gra4);
                    $inserted4 = $query4->execute();
                    $gra5      = "UPDATE proc_grabado SET tiraje_minimo=$min3,tiraje_maximo=$max3, precio_unitario=$precio3 where id_grabado=$idTiro3";
                    $query5    = $this->db->prepare($gra5);
                    $inserted5 = $query5->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }

                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
                break;
            case 'btnGraG2':

                try{

                    $this->db->beginTransaction();
                    $dig1      = "UPDATE proc_grabado SET precio_unitario= $precioPlaca, tamano_minimo_placa=$tam WHERE id_grabado=$idPlaca";
                    $query1    = $this->db->prepare($dig1);
                    $inserted1 = $query1->execute();
                    $dig2      = "UPDATE proc_grabado SET precio_unitario=$precioArreglo WHERE id_grabado=$idArreglo";
                    $query2    = $this->db->prepare($dig2);
                    $inserted2 = $query2->execute();
                    $dig3      = "UPDATE proc_grabado SET tiraje_minimo=$min1,tiraje_maximo=$max1, precio_unitario=$precio1 WHERE id_grabado=$idTiro1";
                    $query3    = $this->db->prepare($dig3);
                    $inserted3 = $query3->execute();
                    $dig4      = "UPDATE proc_grabado SET tiraje_minimo=$min2,tiraje_maximo=$max2, precio_unitario=$precio2 WHERE id_grabado=$idTiro2";
                    $query4    = $this->db->prepare($dig4);
                    $inserted4 = $query4->execute();
                    $dig5      = "UPDATE proc_grabado SET tiraje_minimo=$min3,tiraje_maximo=$max3, precio_unitario=$precio3 WHERE id_grabado=$idTiro3";
                    $query5    = $this->db->prepare($dig5);
                    $inserted5 = $query5->execute();
                    if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5){

                        $this->db->commit();
                        return true;
                    }else{

                        $this->db->rollBack();
                        return false;
                    }
                }catch(Exception $ex){

                    $this->db->rollBack();
                    return false;
                }
                break;
        }
    }


    public function UpdateProcSua() {

        $perimetro1   = intval($_POST['txtPerimetro1']);
        $perimetro2   = intval($_POST['txtPerimetro2']);
        $costo1       = floatval($_POST['txtCosto1']);
        $costo2       = floatval($_POST['txtCosto2']);
        $Arreglo1     = floatval($_POST['txtArreglo1']);
        $Arreglo2     = floatval($_POST['txtArreglo2']);
        $Tiro1        = floatval($_POST['txtTiro1']);
        $Tiro2        = floatval($_POST['txtTiro2']);

        $hoy          = date("Y.m.d");
        $usu          = strval($_POST['usuarioSua']);
        $idPerimetral = intval($_POST['txtIdPerSuaje']);
        $idFigura     = intval($_POST['txtIdFigSuaje']);

        try{

            $this->db->beginTransaction();

            $sua1      = "UPDATE proc_suaje SET costo_unitario=$costo1, perimetro_minimo=$perimetro1 WHERE id_suaje=$idPerimetral";
            $query1    = $this->db->prepare($sua1);
            $inserted1 = $query1->execute();


            $sua2      = "UPDATE proc_suaje SET costo_unitario=$costo2, perimetro_minimo=$perimetro2 WHERE id_suaje=$idFigura";
            $query2    = $this->db->prepare($sua2);
            $inserted2 = $query2->execute();

            $sua3      = "UPDATE proc_suaje SET costo_unitario=$Arreglo1 WHERE nombre='Arreglo';";
            $query3    = $this->db->prepare($sua3);
            $inserted3 = $query3->execute();


            $sua4      = "UPDATE proc_suaje SET costo_unitario=$Arreglo2 WHERE nombre='Arreglo Figura';";
            $query4    = $this->db->prepare($sua4);
            $inserted4 = $query4->execute();


            $sua5      = "UPDATE proc_suaje SET costo_unitario=$Tiro1 WHERE nombre='Tiro';";
            $query5    = $this->db->prepare($sua5);
            $inserted5 = $query5->execute();

            $sua6      = "UPDATE proc_suaje SET costo_unitario=$Tiro2 WHERE nombre='Tiro Figura';";
            $query6    = $this->db->prepare($sua6);
            $inserted6 = $query6->execute();

            if($inserted1 and $inserted2 and $inserted3 and $inserted4 and $inserted5 and $inserted6 ){

                $this->db->commit();
                return true;
            }else{
                $this->db->rollBack();
                return false;
            }

        }catch(Exception $ex){

            $this->db->rollBack();
            return false;
        }
    }



    public function getTipoListon() {

        $sql = "SELECT * FROM listones where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getColoresListon() {

        $sql = "SELECT * FROM colores_listones where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getPorcentajes() {

        $sql = "SELECT * FROM porcentaje_adicional where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // es vista
    // reemplazar por queries
    public function getUltimateBox($user) {

        $sql = "SELECT * FROM vistaCaja where idUsuario = $user LIMIT 1";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        if($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result['odt']           = $row['odt'];
            $result['caja']          = $row['modelo'];
            $result['usuario']       = $row['NombreUsuario'];
            $result['cliente']       = $row['Cliente'];
            $result['base']          = $row['base'];
            $result['alto']          = $row['alto'];
            $result['profundidad']   = $row['profundidad'];
            $result['cantidad']      = $row['cantidad'];
            $result['tienda']        = $row['Tienda'];
            $result['usuario']       = $row['NombreUsuario'];
            $result['total']         = $row['Total'];
            $result['grosorCajon']   = $row['GrosorCajon'];
            $result['grosorCartera'] = $row['GrosorCartera'];
            $result['idCajaODT']     = $row['idCajaODT'];
        }

        return $result;
    }


    // es vista. Reemplazar por queries
    public function getPaperIntCart($idBox) {

        $sql = "SELECT * FROM vistaPapelInteriorCartera where ID = $idBox";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();
        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row['papelInteriorCartera'];
        }

        return $result;
    }


    // es vista; reemplazar por queries
    public function getPaperExtCart($idBox) {

        $sql = "SELECT * FROM vistaPapelExteriorCartera where ID = $idBox";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row['papelExteriorCartera'];
        }

        return $result;
    }


    // es vista; reemplazar por queries
    public function getPaperIntCaj($idBox) {

        $sql = "SELECT * FROM vistaPapelInteriorCajon where ID = $idBox";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row['papelInteriorCajon'];
        }

        return $result;
    }


    // es vista; reemplazar por queries
    public function getPaperExtCaj($idBox) {

        $sql = "SELECT * FROM vistaPapelExteriorCajon where ID = $idBox";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row['papelExteriorCajon'];
        }

        return $result;
    }


    public function getHerraje(){

        $sql = "SELECT * FROM proc_herraje where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }

}

