<?php

class VentasModel {

    function __construct($db) {

        try {

            $this->db = $db;
        } catch (PDOException $e) {

            exit('Ups! Error de conexion a la Base de Datos.');
        }
    }


    public function checaTablaExiste($tableName) {

        $tableName = preg_replace('/[^\da-z_]/i', '', $tableName);

        $mrSql = "SHOW TABLES LIKE :table_name";
        $mrStmt = $this->db->prepare($mrSql);

        //protege contra ataque de injeccion
        $mrStmt->bindParam(":table_name", $tableName, PDO::PARAM_STR);

        $sqlResult = $mrStmt->execute();
        if ($sqlResult) {

            $row = $mrStmt->fetch(PDO::FETCH_NUM);

            if ($row[0]) {

                //tabla encontrada
                return true;
            } else {

                //tabla no encontrada
                return false;
            }
        } else {

            // ocurrió algún error PDO
            echo("Could not check if table exists, Error: " . var_export($pdo->errorInfo(), true));

            return false;
        }
    }


    // Obtiene los datos de merma de un proceso
    public function merma_acabados($proceso) {

        $sql = "SELECT * from acabados_merma where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene los datos de Offset
    public function costo_offset($proceso) {

        $sql = "SELECT * from proc_offset where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene las mermas de procesos por tintas
    public function costo_offset_color_merma() {

        $sql = "SELECT * from proc_merma where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene los costos unitarios por rangos
    public function costo_offset_maquila_tiraje($proceso, $tiraje_min, $tiraje_max) {

        $tiraje_min_tmp = intval($tiraje_min);
        $tiraje_max_tmp = intval($tiraje_max);

        $sql = "SELECT * from proc_offset where status = 'A' and nombre like '%" . $proceso . "%' and tiraje_minimo = " . $tiraje_min_tmp . " and tiraje_maximo = " . $tiraje_max_tmp . " limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;

    }


    // Obtiene los costos de Serigrafia
    public function costo_serigrafia_rango($nombre_campo) {

        $nombre_campo = trim(strval($nombre_campo));

        $sql = "SELECT * from proc_serigrafia where status = 'A' and nombre = '" . $nombre_campo . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene los costos de Serigrafia por rango
    public function costo_serigrafia($tiraje_minimo, $tiraje_maximo) {

        $tiraje_min_tmp = intval($tiraje_minimo);
        $tiraje_max_tmp = intval($tiraje_maximo);

        $sql = "SELECT * from proc_serigrafia where status = 'A' and tiraje_minimo = " . $tiraje_min_tmp . " and tiraje_maximo = " . $tiraje_max_tmp . " limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // Costos unitarios de Serigrafia por arreglo
    public function costo_arreglo_serigrafia($arreglo) {

        $arreglo_tmp = trim($arreglo);

        $sql = "SELECT * from proc_serigrafia where status = 'A' and nombre like '%" . $arreglo_tmp . "%'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    // Costos de Digital por nombre de proceso
    public function costo_digital_rango($proceso) {

        $nombre_tmp = trim(strval($proceso));

        $sql = "SELECT * from proc_digital where status = 'A' and nombre = '" . $nombre_tmp . "'";

        $query = $this->db->prepare($sql);
        $query->execute();


        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Digital por rangos
    public function costo_digital($nombre, $tiraje_minimo, $tiraje_maximo) {

        $nombre_tmp     = trim($nombre);
        $tiraje_min_tmp = intval($tiraje_minimo);
        $tiraje_max_tmp = intval($tiraje_maximo);

        $sql = "SELECT * from proc_digital where status = 'A' and nombre like '%" . $nombre_tmp . "%' and tiraje_minimo = " . $tiraje_min_tmp . " and tiraje_maximo = " . $tiraje_max_tmp . " limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function costos_descuentos($nomb_desc) {

        $nomb_desc = trim(strval($nomb_desc));

        $sql = "SELECT * FROM porcentaje_adicional WHERE status = 'A' and nombre_aumento = '" . $nomb_desc . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function costos_empaque($nomb_desc) {

        $nomb_desc = trim(strval($nomb_desc));

        $sql = "SELECT * FROM costos_adic WHERE status = 'A' and nombre = '" . $nomb_desc . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function detalle_tabla_offset($id_odt, $nombre_tabla_tmp) {

        $nombre_tabla_tmp = trim(strval($nombre_tabla_tmp));
        $id_odt           = intval($id_odt);

        $sql = "SELECT * from " . $nombre_tabla_tmp . " where id_odt = " . $id_odt;

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;

    }


    public function costo_proceso($tabla, $proceso) {

        $tabla   = trim(strval($tabla));
        $proceso = trim(strval($proceso));

        $sql = "SELECT * from " . $tabla . " WHERE status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de HotStamping
    public function costo_hotstamping($proceso) {

        $sql = "SELECT * from proc_hotstamping where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costo fijo de Elaboracion de Cartera por proceso
    public function costo_elab_cartera($proceso) {

        $sql = "SELECT * from proc_cartera where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Ranurado
    public function costo_ranurado($proceso) {

        $sql = "SELECT * from proc_ranurado where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Grabado
    public function costo_grabado($proceso) {

        $sql = "SELECT * from proc_grabado where status = 'A' and nombre like '%" . $proceso . "%'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Laminado
    public function costo_laminado($proceso) {

        $sql = "SELECT * from proc_laminado where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Suaje por proceso
    public function costo_suaje($proceso) {

        $sql = "SELECT * from proc_suaje where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de HotStamping
    public function costo_BarnizUV($proceso) {

        $nomb_proceso = trim(strval($proceso));

        $sql = "SELECT * from proc_barniz_uv where status = 'A' and nombre like '%" . $nomb_proceso . "%'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Suaje por proceso
    public function costo_laser($proceso) {

        $sql = "SELECT * from proc_corte_laser where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Costos de Encuadernacion
    public function costo_encuadernacion($proceso) {

        $sql = "SELECT * from proc_encuadernacion where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene los datos de cierres
    public function costo_cierres($proceso) {

        $sql = "SELECT * from cierres where status = 'A' and nombre like '%" . $proceso . "%' limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene los datos de bancos
    public function costo_bancos($proceso) {

        $sql = "SELECT * from bancos where status = 'A' and nombre like '%" . $proceso . "%' limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Obtiene los datos de accesorios
    public function costo_accesorios($proceso) {

        $sql = "SELECT * from proc_accesorios where status = 'A' and nombre = '" . $proceso . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    // Graba nombre del archivo subido (Tabla: archivos)
    public function saveFileInfo($odt, $comments, $filename){

        $user  = $_SESSION['user']['id_usuario'];
        $store = $_SESSION['user']['id_tienda'];

        $time  = date("H:i:s", time());

        $sql = "INSERT INTO archivos (odt, cliente, archivo, Tienda, user) VALUES ('$odt', '$comments', '$filename', '$store', '$user')";

        $query = $this->db->prepare($sql);

        $inserted = $query->execute();

        if ($inserted) {

            return true;
        } else {

            return false;
        }
    }


    public function getFacturas(){

        $sql = "SELECT solicitud_factura.*, clientes.*, nombre_tienda FROM clientes join solicitud_factura on solicitud_factura.id_cliente = clientes.id_cliente join tiendas on tiendas.id_tienda = clientes.tienda where solicitud_factura.status = 'A' order by fecha_realizacion desc, hora_realizacion desc";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function addNewCliente(){

        $vendedor   = intval( $_SESSION['user']['id_usuario'] );
        $tienda     = intval( $_SESSION['user']['id_tienda'] );
        $nombre     = trim( strval($_POST['txtNombre']) );
        $email      = trim( strval($_POST['txtEmail']) );
        $telefono   = trim( strval($_POST['txtTelefono']) );

        $rSocial    = trim( strval($_POST['txtRS']) );
        $cp         = trim( strval($_POST["txtCP"]) );
        $calle      = trim( strval($_POST["txtCalle"]) );
        $colonia    = trim(strval($_POST["txtColonia"]) );
        $nInterior  = trim(strval($_POST["txtNInterior"]) );
        $nExterior  = trim(strval($_POST["txtNExterior"]) );
        $delegacion = trim(strval($_POST["txtDelegacion"]) );
        $estado     = trim(strval($_POST["txtEstado"]) );
        $rfc        = trim(strval($_POST["txtRFC"]) );

        $sql = "INSERT INTO clientes (nombre, email, tienda, vendedor, telefono, razon_social, calle, no_ext, no_int, cp, rfc, colonia, delegacion, estado) VALUES ('$nombre', '$email', $tienda, $vendedor, '$telefono', '$rSocial', '$calle', '$nExterior', '$nInterior', '$cp', '$rfc', '$colonia', '$delegacion', '$estado')";
        try{

            $query    = $this->db->prepare($sql);
            $inserted = $query->execute();

            if ($inserted) {

                return true;
            } else {

                return false;
            }
        }catch( Exception $ex){

            return false;
        }

    }


    public function updateCliente(){

        $vendedor  = intval( $_SESSION['user']['id_usuario'] );
        $tienda     = intval( $_SESSION['user']['id_tienda'] );
        $nombre    = trim(strval($_POST['txtNombre']) );
        $email     = trim(strval($_POST['txtEmail']) );
        $telefono  = trim(strval($_POST['txtTelefono']) );
        $rSocial   = trim(strval($_POST['txtRS']) );
        $cp        = trim(strval($_POST["txtCP"]) );
        $calle     = trim(strval($_POST["txtCalle"]) );
        $colonia   = trim(strval($_POST["txtColonia"]) );
        $nInterior = trim(strval($_POST["txtNInterior"]) );
        $nExterior = trim(strval($_POST["txtNExterior"]) );
        $delegacion = trim(strval($_POST["txtDelegacion"]) );
        $estado    = trim(strval($_POST["txtEstado"]) );
        $rfc       = trim(strval($_POST["txtRFC"]) );
        $idCliente = intval($_POST['idCliente']);

        $sql = "UPDATE clientes SET nombre='$nombre', email='$email', tienda=$tienda, vendedor=$vendedor, telefono='$telefono', razon_social='$rSocial', calle='$calle', no_ext='$nExterior', no_int='$nInterior', cp='$cp', rfc='$rfc', colonia='$colonia', delegacion='$delegacion', estado='$estado' where id_cliente= $idCliente";
        try{

            $query    = $this->db->prepare($sql);
            $update = $query->execute();

            if ($update) {

                return true;
            } else {

                return false;
            }
        }catch( Exception $ex){

            return false;
        }

    }


    public function deleteCliente($id_cliente) {

        $id_cliente = intval($id_cliente);

        $sql = "UPDATE clientes SET status = 'B' WHERE id_cliente = " . $id_cliente;

        $query = $this->db->prepare($sql);

        $updated = $query->execute();

        if ($updated) {

          return true;
        } else {

          return false;
        }
    }


    public function getNombProcesos() {

        $sql = "SELECT * from cot_procesos where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getNombTablaProceso($nomb_proceso) {

        //$sql = "SELECT proceso from cot_tablas_procesos where status = 'A' and nombre like '%" . $nomb_proceso . "%' limit 1";
        $sql = "SELECT nombre from cot_tablas_procesos where status = 'A' and proceso like '%" . $nomb_proceso . "%' LIMIT 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getNombTabla($nomb_proceso) {

        $sql = "SELECT * from cot_procesos where status = 'A' and nombre like '%" . $nomb_proceso . "%' limit 1";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getAllTipoProcesos() {

        $sql = "SELECT * from cot_tipo_aprocesos where status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;

    }


    public function getNombAllProcesos() {

        $sql_procesos = "select cp.id_procesos as id, ctp.nombre as par, cta.nombre as tipo
                        , ctproc.nombre as proceso
                        , ctiptabla.tipo as tipo_proceso, ctg.nomb_a as grupo, cp.nomb_tabla as tabla
                        from cot_procesos cp
                        join cot_tablas_par ctp on cp.id_tipo_seccion = ctp.id_seccion
                        and cp.id_tipo_grupo = ctp.id_grupo and cp.id_tipo_proceso = ctp.id_tipo_proceso

                        join cot_tipo_procesos ctproc on cp.id_tipo_proceso = ctproc.id_tipo_proceso
                        join cot_tipo_grupos ctg on cp.id_tipo_grupo = ctg.id_tipo_proceso
                        join cot_tablas_procesos ctabproc on cp.nomb_tabla = ctabproc.nombre
                        join cot_tipo_tablas ctiptabla on ctabproc.id_tipo_tabla = ctiptabla.id_fijo
                        join cot_tipos_ar cta on cta.id_grupo = ctg.id_tipo_proceso
                        WHERE cp.status = 'A'
                        order by cp.id_procesos";

        $query_procesos = $this->db->prepare($sql_procesos);
        $query_procesos->execute();

        $result = array();

        while ($row = $query_procesos->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;

    }


    public function getNombAllProcesosByTipo($nomb, $tipo, $nomb_proceso) {

        $sql_procesos = "select cp.id_procesos as id, ctp.nombre as par, cta.nombre as tipo
                        , ctproc.nombre as proceso
                        , ctiptabla.tipo as tipo_proceso, ctg.nomb_a as grupo, cp.nomb_tabla as tabla
                        from cot_procesos cp
                        join cot_tablas_par ctp on cp.id_tipo_seccion = ctp.id_seccion
                        and cp.id_tipo_grupo = ctp.id_grupo and cp.id_tipo_proceso = ctp.id_tipo_proceso
                        join cot_tipo_procesos ctproc on cp.id_tipo_proceso = ctproc.id_tipo_proceso
                        join cot_tipo_grupos ctg on cp.id_tipo_grupo = ctg.id_tipo_proceso
                        join cot_tablas_procesos ctabproc on cp.nomb_tabla = ctabproc.nombre
                        join cot_tipo_tablas ctiptabla on ctabproc.id_tipo_tabla = ctiptabla.id_fijo
                        join cot_tipos_ar cta on cta.id_grupo = ctg.id_tipo_proceso
                        WHERE cp.status = 'A' and ctp.nombre = '" . $nomb . "' and cta.nombre = '" . $tipo . "' and ctproc.nombre = '" . $nomb_proceso . "' limit 1";

        $query_procesos = $this->db->prepare($sql_procesos);
        $query_procesos->execute();

        $result = array();

        while ($row = $query_procesos->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;

    }


    public function modificar_odt($aResultadoAnt, $id_odt) {

        $id_odt = intval($id_odt);

        $cuantas_aProcesos = count($aProcesos);
        $cuantas_aProcesos = intval($cuantas_aProcesos);


        $fecha = TODAY;

        $d_fecha = date("Y-m-d", strtotime($fecha));

        $time  = date("H:i:s", time());

        $l_ok = true;

        try {

            $this->db->beginTransaction();

            $sql_odt_0 = "INSERT INTO cot_odtm (id_odt, id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad, id_grosor_cajon, id_grosor_cartera, id_vendedor, id_papel_empalme, id_papel_Fcajon, id_papel_Fcartera, id_papel_guarda, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, fecha_odt, hora_odt) SELECT id_odt, id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad, id_grosor_cajon, id_grosor_cartera, id_vendedor, id_papel_empalme, id_papel_Fcajon, id_papel_Fcartera, id_papel_guarda, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, fecha_odt, hora_odt FROM cot_odt WHERE id_odt = " . $id_odt;


            $query_odt0 = $this->db->prepare($sql_odt_0);

            $inserted_odt0 = $query_odt0->execute();

            for ($i = 0; $i < $cuantas_aProcesos; $i++) {

                $nombre_tabla = $aProcesos[$i];
                $nombre_tabla = trim(strval($aProcesos[$i]));

                $sql_odt = "UPDATE " . $nombre_tabla
                            . " SET status = 'M'
                            , fecha_baja = '" . $d_fecha
                            . "' , hora_baja = '" . $time
                            . "' WHERE id_odt = " . $id_odt;

                $query_odt = $this->db->prepare($sql_odt);

                $inserted_sql_odt =  $query_odt->execute();

                if( !$inserted_sql_odt ){

                    $l_ok = false;

                    throw new Exception($sql_odt);

                    break;
                }
            }


            if ($l_ok) {

                $this->db->commit();
            } else {

                $this->db->rollBack();
            }

            return $l_ok;
        } catch ( Exception $e) {

            $l_ok = false;

            $this->db->rollBack();

            return $l_ok;
        }
    }


    public function insertCaja_Almeja(&$aJson, $id_modelo) {

        $id_usuario = $_SESSION['user']['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_tienda  = $_SESSION['user']['id_tienda'];
        $id_tienda  = intval($id_tienda);


        $id_cliente     = 0;
        $nombre_cliente = "";
        $odt            = "";
        $tiraje         = 0;
        $base           = 0;
        $alto           = 0;
        $profundidad    = 0;
        $grosor_cajon   = 0;
        $grosor_cartera = 0;

        $id_modelo = intval($id_modelo);

        $id_cliente = $aJson['id_cliente'];
        $id_cliente = intval($id_cliente);


        $nombre_cliente = $aJson['Nombre_cliente'];
        $nombre_cliente = strval($nombre_cliente);
        $nombre_cliente = trim($nombre_cliente);

        $odt    = $_POST['odt'];
        $odt    = trim(strval($odt));

        $tiraje = $_POST['qty'];
        $tiraje = intval($tiraje);

        $base           = intval($_POST['base']);
        $alto           = intval($_POST['alto']);
        $profundidad    = intval($_POST['profundidad']);
        $grosor_cajon   = floatval($_POST['grosor-cajon']);
        $grosor_cartera = floatval($_POST['grosor-cartera']);

        $id_grosor_cajon   = intval($aJson['CartonCaj']['id_papel']);
        $id_grosor_cartera = intval($aJson['CartonCar']['id_papel']);


        // calculos
        $aCalculos_tmp = [];

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

        unset($aCalculos_tmp);


        // papeles

        $aPap_emp  = [];
        $aPap_fcaj = [];
        $aPap_fcar = [];
        $aPap_g    = [];
        $aCaj_Caj  = [];
        $aCar_Car  = [];

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



        $id_papel_empalme  = intval($aPap_emp['id_papel']);
        $id_papel_Fcajon   = intval($aPap_fcaj['id_papel']);
        $id_papel_Fcartera = intval($aPap_fcar['id_papel']);
        $id_papel_guarda   = intval($aPap_g['id_papel']);


        $fecha = TODAY;

        $d_fecha = date("Y-m-d", strtotime($fecha));

        $time  = date("H:i:s", time());

        $tiraje = intval($aJson['tiraje']);

        // Empalme
        $id_papel_papel_emp   = intval($aPap_emp['id_papel']);
        $nombre_papel_emp     = utf8_decode(trim(strval($aPap_emp['nombre_papel'])));
        $ancho_papel_emp      = intval($aPap_emp['ancho_papel']);
        $largo_papel_emp      = intval($aPap_emp['largo_papel']);
        $costo_unit_papel_emp = floatval($aPap_emp['costo_unit_papel']);
        $tiraje_papel_emp     = $tiraje;

        $cortes_papel_emp            = intval($aPap_emp['corte']);
        $pliegos_papel_emp           = intval($aPap_emp['tot_pliegos']);
        $costo_tot_pliegos_papel_emp = floatval($costo_unit_papel_emp * $pliegos_papel_emp);
        $corte_ancho_papel_emp       = intval($aPap_emp['calculadora']['corte_ancho']);
        $corte_largo_papel_emp       = intval($aPap_emp['calculadora']['corte_largo']);


        unset($aPap_emp);



        // Forro del Cajon
        $id_papel_papel_fcaj   = intval($aPap_fcaj['id_papel']);
        $nombre_papel_fcaj     = utf8_decode(trim(strval($aPap_fcaj['nombre_papel'])));
        $ancho_papel_fcaj      = intval($aPap_fcaj['ancho_papel']);
        $largo_papel_fcaj      = intval($aPap_fcaj['largo_papel']);
        $costo_unit_papel_fcaj = floatval($aPap_fcaj['costo_unit_papel']);
        $tiraje_papel_fcaj     = $tiraje;


        $cortes_papel_fcaj            = intval($aPap_fcaj['corte']);
        $pliegos_papel_fcaj           = intval($aPap_fcaj['tot_pliegos']);
        $costo_tot_pliegos_papel_fcaj = floatval($costo_unit_papel_fcaj * $pliegos_papel_fcaj);
        $corte_ancho_papel_fcaj       = intval($aPap_fcaj['calculadora']['corte_ancho']);
        $corte_largo_papel_fcaj       = intval($aPap_fcaj['calculadora']['corte_largo']);

        unset($aPap_fcaj);



        // forro de la cartera
        $id_papel_papel_fcar   = intval($aPap_fcar['id_papel']);
        $nombre_papel_fcar     = utf8_decode(trim(strval($aPap_fcar['nombre_papel'])));
        $ancho_papel_fcar      = intval($aPap_fcar['ancho_papel']);
        $largo_papel_fcar      = intval($aPap_fcar['largo_papel']);
        $costo_unit_papel_fcar = floatval($aPap_fcar['costo_unit_papel']);
        $tiraje_papel_fcar     = $tiraje;


        $cortes_papel_fcar            = intval($aPap_fcar['corte']);
        $pliegos_papel_fcar           = intval($aPap_fcar['tot_pliegos']);
        $costo_tot_pliegos_papel_fcar = floatval($costo_unit_papel_fcar * $pliegos_papel_fcar);
        $corte_ancho_papel_fcar       = intval($aPap_fcar['calculadora']['corte_ancho']);
        $corte_largo_papel_fcar       = intval($aPap_fcar['calculadora']['corte_largo']);

        unset($aPap_fcar);


        // Guarda
        $id_papel_papel_g   = intval($aPap_g['id_papel']);
        $nombre_papel_g     = utf8_decode(trim(strval($aPap_g['nombre_papel'])));
        $ancho_papel_g      = intval($aPap_g['ancho_papel']);
        $largo_papel_g      = intval($aPap_g['largo_papel']);
        $costo_unit_papel_g = floatval($aPap_g['costo_unit_papel']);
        $tiraje_papel_g     = $tiraje;

        $cortes_papel_g            = intval($aPap_g['corte']);
        $pliegos_papel_g           = intval($aPap_g['tot_pliegos']);
        $costo_tot_pliegos_papel_g = floatval($costo_unit_papel_g * $pliegos_papel_g);
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

        $cajon_parte = 0;

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

        $carton_cartera_parte = 0;

        unset($aCar_Car);


        // elab_car
        $elab_car_tiraje      = intval($aElab_car['tiraje']);
        $elab_car_costo_unit  = floatval($aElab_car['forro_costo_unit']);
        $elab_car_forro_car   = floatval($aElab_car['forro_car']);
        $elab_car_costo_total = floatval($aElab_car['forro_car']);


        unset($aElab_car);


        // elab_guarda
        $elab_guarda_costo_unit = floatval($aElab_guarda['guarda_costo_unit']);
        $elab_guarda_costo_tot  = floatval($aElab_guarda['guarda']);


        unset($aElab_guarda);


        // Ranurado
        $ranurado_tiraje                = intval($aRanurado['tiraje']);
        $ranurado_arreglo               = intval($aRanurado['arreglo']);
        $ranurado_costo_unit_por_ranura = floatval($aRanurado['costo_unit_por_ranura']);
        $ranurado_costo_por_ranura      = floatval($aRanurado['costo_por_ranura']);
        $ranurado_costo_tot_ranurado    = floatval($aRanurado['costo_tot_ranurado']);


        unset($aRanurado);



        // Ranurado_Fcar
        $ranurado_fcar_costo_unit_por_ranura = floatval($aRanurado_Fcar['costo_unit_por_ranura']);
        $ranurado_fcar_costo_por_ranura      = floatval($aRanurado_Fcar['costo_por_ranura']);


        unset($aRanurado_Fcar);


        // Encuadernacion
        $encuad_tiraje                          = $tiraje;
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
        $encuad_fcaj_arreglo_de_forrado_de_cajon  = floatval($aEncuadernacion_Fcaj['arreglo_de_forrado_de_cajon']);
        $encuad_fcaj_empalme_cajon_costo_unitario = floatval($aEncuadernacion_Fcaj['empalme_cajon_costo_unitario']);
        $encuad_fcaj_empalme_de_cajon             = floatval($aEncuadernacion_Fcaj['empalme_de_cajon']);
        $encuad_fcaj_costo_tot_proceso            = floatval($aEncuadernacion_Fcaj['costo_tot_proceso']  - $encuad_encajada);


        unset($aEncuadernacion_Fcaj);


        $aJsonGrab = array_keys($aJson);        // $aJsonGrab[18];

        //$s_miArrayJson = json_encode($aJsonGrab);

        $id_usuario = $aJson['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_modelo         = intval($id_modelo);
        $odt               = trim(strval($odt));
        $id_cliente        = intval($id_cliente);
        $tiraje            = intval($tiraje);
        $base              = floatval($base);
        $alto              = floatval($alto);
        $profundidad       = floatval($profundidad);
        $id_grosor_cajon   = floatval($id_grosor_cajon);
        $id_grosor_cartera = floatval($id_grosor_cartera);
        $id_usuario        = intval($id_usuario);
        $id_papel_empalme  = intval($id_papel_empalme);
        $id_papel_Fcajon   = intval($id_papel_Fcajon);
        $id_papel_Fcartera = intval($id_papel_Fcartera);
        $id_papel_guarda   = intval($id_papel_guarda);
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


        $keys = $aJson['keys'];
        $keys = json_encode($keys);

        $aJson['mensaje'] = gettype($keys);

        $id_tienda = $_SESSION['user']['id_tienda'];
        $id_tienda = intval($id_tienda);

        $l_modificar_odt = false;

        $modificar = $_POST['modificar'];
        $modificar = trim(strval($modificar));

        if ($modificar == "SI") {

            $l_modificar_odt = true;

            $id_odt_anterior = intval($_POST['id_odt_ant']);
        }

        // inserta en las tablas
        $inserted         = false;
        $inserted_calc    = false;
        $inserted_mermas  = false;
        $inserted_cortes  = false;
        $inserted_papeles = false;

        try {

            $this->db->beginTransaction();

            $costo_total_odt = floatval($aJson['costo_odt']);


            if ($l_modificar_odt) {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad, id_grosor_cajon, id_grosor_cartera, id_vendedor, id_papel_empalme, id_papel_Fcajon, id_papel_Fcartera, id_papel_guarda, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, id_odt_ant, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$odt', $id_cliente, $tiraje, $base, $alto, $profundidad, $id_grosor_cajon, $id_grosor_cartera, $id_usuario, $id_papel_empalme, $id_papel_Fcajon, $id_papel_Fcartera, $id_papel_guarda, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', $id_odt_anterior, '$d_fecha', '$time')";
            } else {

                $sql = "INSERT INTO cot_odt
                    (id_usuario, id_modelo, num_odt, id_cliente, tiraje, base, alto, profundidad, id_grosor_cajon, id_grosor_cartera, id_vendedor, id_papel_empalme, id_papel_Fcajon, id_papel_Fcartera, id_papel_guarda, costo_total, subtotal, utilidad, iva, ISR, comisiones, indirecto, venta, descuento, descuento_pcte, empaque, mensajeria, procesos, fecha_odt, hora_odt)
                VALUES
                    ($id_usuario, $id_modelo, '$odt', $id_cliente, $tiraje, $base, $alto, $profundidad, $id_grosor_cajon, $id_grosor_cartera, $id_usuario, $id_papel_empalme, $id_papel_Fcajon, $id_papel_Fcartera, $id_papel_guarda, $costo_total_odt, $subtotal, $utilidad, $iva, $ISR, $comisiones, $indirecto, $ventas, $descuento, $descuento_pctje, $empaque, $mensajeria, '$keys', '$d_fecha', '$time')";
            }

            $query_odt = $this->db->prepare($sql);

            $inserted = $query_odt->execute();

            $id_caja_odt = 0;

            $id_caja_odt = $this->db->lastInsertId();
            $id_caja_odt = intval($id_caja_odt);

            if ($id_caja_odt <= 0 or !$inserted) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla de ODT";

            }


            $inserted_mod = true;

            if ($l_modificar_odt) {

                //$sql_mod = "UPDATE cot_odt SET status = 'M', id_odt_ant = " . $id_caja_odt . " WHERE id_odt = " . $id_odt_anterior;
                $sql_mod = "UPDATE cot_odt SET status = 'M' WHERE id_odt = " . $id_odt_anterior;

                $query_mod_odt = $this->db->prepare($sql_mod);

                $inserted_mod = $query_mod_odt->execute();

                if (!$inserted_mod) {

                    $aJson['mensaje'] = "ERROR";
                    $aJson['error']   = $aJson['error'] . "; Error al actualizar en la tabla ODT";
                }
            }

        /*
            // clientes master
            $sql_cliem = "UPDATE clientes SET
                id_odt = " . $id_caja_odt . "
                , num_odt = '$odt'
                , fecha_odt = '$d_fecha'
                WHERE id_cliente = " . $id_cliente;

            $query_cliem = $this->db->prepare($sql_cliem);

            $inserted_cliem = $query_cliem->execute();


            if (!$inserted_cliem) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al actualizar en la tabla clientes";

                return $aJson['error'];
            }


            // clientes detalle
            $sql_clied = "INSERT INTO cot_clientes
                (id_usuario, id_tienda, id_odt, id_modelo, id_cliente, tiraje, costo_total, fecha, hora)
            VALUES
                ($id_usuario, $id_tienda, $id_caja_odt, $id_modelo, $id_cliente, $tiraje, $costo_total_odt, '$d_fecha', '$time')";

            $query_clied = $this->db->prepare($sql_clied);

            $inserted_clied = $query_clied->execute();

            if (!$inserted_clied) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla cot_clientes";

                return $aJson['error'];
            }
        */

            // calculadora
            $sql_calc = "INSERT INTO cot_calculadora
                (id_modelo, id_odt, b, h, p, g_cajon, g_cartera, e, e_may, b1, h1, p1, x, y, x1, y1, x11, y11, b11, h11, f, k, b_may, h_may, p_may, y_may, b1_may, y1_may, b11_may, y11_may)
            VALUES
                ($id_modelo, $id_caja_odt, $b, $h, $p, $grosor_cajon, $grosor_cartera, $e, $e_may, $b1, $h1, $p1, $x, $y, $x1, $y1, $x11, $y11, $b11, $h11, $f, $k, $b_may, $h_may, $p_may, $y_may, $b1_may, $y1_may, $b11_may, $y11_may)";

            $query_calc = $this->db->prepare($sql_calc);

            $inserted_calc = $query_calc->execute();

            if (!$inserted_calc) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Calculadora";
            }


            $sql_papel_emp = "INSERT INTO cot_papelemp
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos, costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel_papel_emp, '$nombre_papel_emp', $ancho_papel_emp, $largo_papel_emp, $costo_unit_papel_emp, $tiraje, $cortes_papel_emp, $pliegos_papel_emp, $costo_tot_pliegos_papel_emp, $corte_ancho_papel_emp, $corte_largo_papel_emp, '$d_fecha')";


            $query_papel_emp = $this->db->prepare($sql_papel_emp);

            $inserted_papel_emp = $query_papel_emp->execute();

            if (!$inserted_papel_emp) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Papel Empalme";
            }



            // Forro del Cajon
            $sql_papel_fcaj = "INSERT INTO cot_papelfcaj
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos,  costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel_papel_fcaj, '$nombre_papel_fcaj', $ancho_papel_fcaj, $largo_papel_fcaj, $costo_unit_papel_fcaj, $tiraje, $cortes_papel_fcaj, $pliegos_papel_fcaj, $costo_tot_pliegos_papel_fcaj, $corte_ancho_papel_fcaj, $corte_largo_papel_fcaj, '$d_fecha')";


            $query_papel_fcaj = $this->db->prepare($sql_papel_fcaj);

            $inserted_papel_fcaj = $query_papel_fcaj->execute();

            if (!$inserted_papel_fcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Papel Forro del Cajon";
            }


            // Forro de la cartera
            $sql_papel_fcar = "INSERT INTO cot_papelfcar
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos,  costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel_papel_fcar, '$nombre_papel_fcar', $ancho_papel_fcar, $largo_papel_fcar, $costo_unit_papel_fcar, $tiraje, $cortes_papel_fcar, $pliegos_papel_fcar, $costo_tot_pliegos_papel_fcar, $corte_ancho_papel_fcar, $corte_largo_papel_fcar, '$d_fecha')";


            $query_papel_fcar = $this->db->prepare($sql_papel_fcar);

            $inserted_papel_fcar = $query_papel_fcar->execute();

            if (!$inserted_papel_fcar) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Papel Forro de la Cartera";
            }


            // Guarda
            $sql_papel_g = "INSERT INTO cot_papelguarda
                (id_modelo, id_odt, id_papel, nombre, ancho, largo, costo_unitario, tiraje, cortes, pliegos,  costo_tot_pliegos, corte_ancho, corte_largo, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_papel_papel_g, '$nombre_papel_g', $ancho_papel_g, $largo_papel_g, $costo_unit_papel_g, $tiraje, $cortes_papel_g, $pliegos_papel_g, $costo_tot_pliegos_papel_g, $corte_ancho_papel_g, $corte_largo_papel_g, '$d_fecha')";


            $query_papel_g = $this->db->prepare($sql_papel_g);

            $inserted_papel_g = $query_papel_g->execute();

            if (!$inserted_papel_g) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Papel Guarda";
            }


            // Carton Cajon
            $sql_papel_caj = "INSERT INTO cot_cartoncaj
                (id_modelo, id_odt, id_cajon, num_cajon, tiraje, papel, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_cajon, $id_num_cajon, $tiraje, '$cajon_papel', '$cajon_nombre', $cajon_precio, $cajon_ancho, $cajon_largo, $cajon_corte_ancho, $cajon_corte_largo, $cajon_piezas_por_pliego, $cajon_num_pliegos, $cajon_costo_tot_carton, '$d_fecha')";


            $query_papel_caj = $this->db->prepare($sql_papel_caj);

            $inserted_papel_caj = $query_papel_caj->execute();

            if (!$inserted_papel_caj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Carton del Cajon";
            }


            // Carton Cartera
            $sql_papel_car = "INSERT INTO cot_cartoncar
                (id_modelo, id_odt, id_cajon, num_cajon, tiraje, papel, nombre, precio, ancho, largo, corte_ancho, corte_largo, piezas_por_pliego, num_pliegos, costo_tot_carton, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $id_carton_cartera, $carton_id_num_cartera, $tiraje, '$carton_cartera_papel', '$carton_cartera_nombre', $carton_cartera_precio, $carton_cartera_ancho, $carton_cartera_largo, $carton_cartera_corte_ancho, $carton_cartera_corte_largo, $carton_cartera_piezas_por_pliego, $carton_cartera_num_pliegos, $carton_cartera_costo_tot_carton, '$d_fecha')";


            $query_papel_car = $this->db->prepare($sql_papel_car);

            $inserted_papel_car = $query_papel_car->execute();

            if (!$inserted_papel_car) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Carton de la Cartera";
            }


            // Elab_car
            $sql_elab_car = "INSERT INTO cot_elab_car
                (id_modelo, id_odt, tiraje, forro_costo_unit, forro_car, costo_total, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $elab_car_costo_unit, $elab_car_forro_car, $elab_car_costo_total, '$d_fecha')";

            $query_elab_car = $this->db->prepare($sql_elab_car);

            $inserted_elab_car = $query_elab_car->execute();

            if (!$inserted_elab_car) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Elaboracion Cartera";
            }


            // Elab_guarda
            $sql_elab_guarda = "INSERT INTO cot_elab_guarda
                (id_modelo, id_odt, tiraje, costo_unit, costo_total, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $elab_guarda_costo_unit, $elab_guarda_costo_tot, '$d_fecha')";

            $query_elab_guarda = $this->db->prepare($sql_elab_guarda);

            $inserted_elab_guarda = $query_elab_guarda->execute();

            if (!$inserted_elab_guarda) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Elaboracion Guarda";
            }


            // Ranurado
            $sql_ranurado = "INSERT INTO cot_ranurado
                (id_modelo, id_odt, tiraje, arreglo, costo_unit, costo_por_ranura, costo_tot_ranurado, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $ranurado_arreglo, $ranurado_costo_unit_por_ranura, $ranurado_costo_por_ranura, $ranurado_costo_tot_ranurado, '$d_fecha')";

            $query_ranurado = $this->db->prepare($sql_ranurado);

            $inserted_ranurado = $query_ranurado->execute();

            if (!$inserted_ranurado) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Ranurado";
            }


            // Ranurado_Fcar
            $sql_ranurado_fcar = "INSERT INTO cot_ranurado_fcar
                (id_modelo, id_odt, tiraje, costo_unit_por_ranura, costo_por_ranura, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $ranurado_fcar_costo_unit_por_ranura, $ranurado_fcar_costo_por_ranura, '$d_fecha')";

            $query_ranurado_fcar = $this->db->prepare($sql_ranurado_fcar);

            $inserted_ranurado_fcar = $query_ranurado_fcar->execute();

            if (!$inserted_ranurado_fcar) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Ranurado Forro Cartera";
            }


            // Encuadernacion
            $sql_encuadernacion = "INSERT INTO cot_encuadernacion
                (id_modelo, id_odt, tiraje, perforado_iman_y_puesta, despunte_costo_unit, despunte_esquina_cajon, encajada_costo_unit, encajada_costo_tot, costo_tot_proceso, costo_tot_encuadernacion, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $perf_iman_y_puesta, $encuad_despunte_costo_unitario, $encuad_despunte_de_esquinas_para_cajon, $encuad_encajada_costo_unitario, $encuad_encajada, $encuad_costo_tot_proceso, $encuad_costo_tot_encuadernacion, '$d_fecha')";

            $query_encuadernacion = $this->db->prepare($sql_encuadernacion);

            $inserted_encuadernacion = $query_encuadernacion->execute();

            if (!$inserted_encuadernacion) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Encuadernacion";
            }


            // Encuadernacion_Fcaj
            $sql_encuadernacion_fcaj = "INSERT INTO cot_encuadernacion_fcaj
                (id_modelo, id_odt, tiraje, costo_unit_forrado_cajon, forrado_de_cajon, arreglo_de_forrado_de_cajon, empalme_cajon_costo_unitario, empalme_de_cajon, costo_tot_proceso, fecha)
            VALUES
                ($id_modelo, $id_caja_odt, $tiraje, $encuad_fcaj_costo_unit_forrado_cajon, $encuad_fcaj_forrado_de_cajon, $encuad_fcaj_arreglo_de_forrado_de_cajon, $encuad_fcaj_empalme_cajon_costo_unitario, $encuad_fcaj_empalme_de_cajon, $encuad_fcaj_costo_tot_proceso, '$d_fecha')";

            $query_encuadernacion_fcaj = $this->db->prepare($sql_encuadernacion_fcaj);

            $inserted_encuadernacion_fcaj = $query_encuadernacion_fcaj->execute();

            if (!$inserted_encuadernacion_fcaj) {

                $aJson['mensaje'] = "ERROR";
                $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Encuadernacion Forro Cajon";
            }



    /*************** Termina costos fijos **********************/

        /********** Bancos **************************/

            $l_insert_bancos = true;

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

                        if (!$l_insert_bancos or $costo_bancos <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Bancos";

                            break;
                        }
                    }
                }
            }


        /************* Accesorios *********************/

            $l_insert_accesorios = true;

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

                        if (!$l_insert_accesorios or $costo_accesorios <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Accesorios";

                            break;
                        }
                    }
                }
            }


        /************* Cierres ************************/

            $l_insert_cierres = true;

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

                        if (!$l_insert_cierres or $costo_cierre <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Cierres";

                            break;
                        }
                    }
                }
            }

    /*************** Inicia Impresiones *******************/


        /*********** Offset Empalme **************/

            // Offset Empame
            $l_insert_OffEmp      = true;
            $l_insert_Off_maq_Emp = true;

            if (array_key_exists("OffEmp", $aJson)) {

                $v_OffEmp1 = $aJson['OffEmp'];
                $v_tmp_R   = array_values($v_OffEmp1);

                $cuantos_v_OffEmp = count($v_OffEmp1);

                if ($cuantos_v_OffEmp > 0) {

                    for ($k = 0; $k < $cuantos_v_OffEmp; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = intval($v_tmp_R[$k]['corte_costo_unitario']);
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


                        $sql_OffEmp = "INSERT INTO cot_offsetemp
                            (id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffEmp = $this->db->prepare($sql_OffEmp);

                        $l_insert_OffEmp = $query_OffEmp->execute();

                        if (!$l_insert_OffEmp or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Empalme";

                            break;
                        }
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
                        $costo_unitario_maq         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot_maquila          = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_Emp = "INSERT INTO cot_offset_maq_emp
                            (id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maquila, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_Emp = $this->db->prepare($sql_Off_maq_Emp);

                        $l_insert_Off_maq_Emp = $query_Off_maq_Emp->execute();

                        if (!$l_insert_Off_maq_Emp or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Empalme Maquila";

                            break;
                        }
                    }
                }
            }


        /*********** Offset FCaj **************/

            // Offset Forro del Cajon
            $l_insert_OffFcaj      = true;
            $l_insert_Off_maq_Fcaj = true;

            if (array_key_exists("OffFCaj", $aJson)) {

                $v_OffFcaj1 = $aJson['OffFCaj'];
                $v_tmp_R    = array_values($v_OffFcaj1);

                $cuantos_v_OffFcaj = count($v_OffFcaj1);

                if ($cuantos_v_OffFcaj > 0) {

                    for ($k = 0; $k < $cuantos_v_OffFcaj; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = intval($v_tmp_R[$k]['corte_costo_unitario']);
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


                        $sql_OffFcaj = "INSERT INTO cot_offsetfcaj
                            (id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffFcaj = $this->db->prepare($sql_OffFcaj);

                        $l_insert_OffFcaj = $query_OffFcaj->execute();

                        if (!$l_insert_OffFcaj or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . " Error al grabar en la tabla Offset Forro Cajon;";

                            break;
                        }
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
                        $costo_unitario_maq         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_Fcaj = "INSERT INTO cot_offset_maq_fcaj
                            (id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_Fcaj = $this->db->prepare($sql_Off_maq_Fcaj);

                        $l_insert_Off_maq_Fcaj = $query_Off_maq_Fcaj->execute();

                        if (!$l_insert_Off_maq_Fcaj or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Forro Cajon Maquila";

                            break;
                        }
                    }
                }
            }


        /*********** Offset FCar **************/

            // Offset Forro de la Cartera
            $l_insert_OffFcar      = true;
            $l_insert_Off_maq_Fcar = true;

            if (array_key_exists("OffFCar", $aJson)) {

                $v_OffFcar1 = $aJson['OffFCar'];
                $v_tmp_R    = array_values($v_OffFcar1);

                $cuantos_v_OffFcar = count($v_OffFcar1);

                if ($cuantos_v_OffFcar > 0) {

                    for ($k = 0; $k < $cuantos_v_OffFcar; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = intval($v_tmp_R[$k]['corte_costo_unitario']);
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


                        $sql_OffFcar = "INSERT INTO cot_offsetfcar
                            (id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffFcar = $this->db->prepare($sql_OffFcar);

                        $l_insert_OffFcar = $query_OffFcar->execute();

                        if (!$l_insert_OffFcar or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Forro Cartera";

                            break;
                        }
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
                        $costo_unitario_maq         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_Fcar = "INSERT INTO cot_offset_maq_fcar
                            (id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_Fcar = $this->db->prepare($sql_Off_maq_Fcar);

                        $l_insert_Off_maq_Fcar = $query_Off_maq_Fcar->execute();

                        if (!$l_insert_Off_maq_Fcar or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Forro Cartera Maquila";

                            break;
                        }
                    }
                }
            }


        /*********** Offset Guarda **************/

            // Offset Guarda
            $l_insert_OffG      = true;
            $l_insert_Off_maq_G = true;

            if (array_key_exists("OffG", $aJson)) {

                $v_OffG1 = $aJson['OffG'];
                $v_tmp_R = array_values($v_OffG1);

                $cuantos_v_OffG = count($v_OffG1);

                if ($cuantos_v_OffG) {

                    for ($k = 0; $k < $cuantos_v_OffG; $k++) {

                        $costo_tot_proceso = 0;

                        $tipo                   = trim(strval($v_tmp_R[$k]['tipo_offset']));
                        $tiraje                 = intval($v_tmp_R[$k]['cantidad']);
                        $num_tintas             = intval($v_tmp_R[$k]['num_tintas']);
                        $corte_costo_unitario   = intval($v_tmp_R[$k]['corte_costo_unitario']);
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


                        $sql_OffG = "INSERT INTO cot_offsetguarda
                            (id_odt, tipo, tiraje, num_tintas, corte_costo_unitario, corte_por_millar, costo_corte, costo_unitario_laminas, costo_tot_laminas, costo_unitario_arreglo, costo_tot_arreglo, costo_unitario_tiro, costo_tot_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $corte_costo_unitario, $corte_por_millar, $costo_corte, $costo_unitario_laminas, $costo_tot_laminas, $costo_unitario_arreglo, $costo_tot_arreglo, $costo_unitario_tiro, $costo_tot_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                        $query_OffG = $this->db->prepare($sql_OffG);

                        $l_insert_OffG = $query_OffG->execute();

                        if (!$l_insert_OffG or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Guarda";

                            break;
                        }
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
                        $costo_unitario_maq         = floatval($v_tmp_R[$k]['costo_unitario_maq']);
                        $costo_tot_maq          = floatval($v_tmp_R[$k]['costo_tot_maq']);
                        $costo_tot_proceso          = floatval($v_tmp_R[$k]['costo_tot_proceso']);


                        $sql_Off_maq_G = "INSERT INTO cot_offset_maq_guarda
                            (id_odt, tipo, tiraje, num_tintas, arreglo_costo_unitario, arreglo_costo, costo_unitario_laminas, costo_laminas, costo_unitario, costo_tot, costo_tot_proceso, fecha)
                        VALUES
                            ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario_laminas, $costo_laminas, $costo_unitario_maq, $costo_tot_maq, $costo_tot_proceso, '$d_fecha')";

                        $query_Off_maq_G = $this->db->prepare($sql_Off_maq_G);

                        $l_insert_Off_maq_G = $query_Off_maq_G->execute();

                        if (!$l_insert_Off_maq_G or $costo_tot_proceso <= 0) {

                            $aJson['mensaje'] = "ERROR";
                            $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Offset Guarda Maquila";

                            break;
                        }
                    }
                }
            }


        /*********** Digital Empalme **************/

            // inicia digital Empalme
            $l_insert_DigEmp = true;

            if (array_key_exists("DigEmp", $aJson)) {

                $v_DigEmp = $aJson['DigEmp'];
                $v_tmp_R  = array_values($v_DigEmp);

                $cuantos_v_DigEmp = count($v_DigEmp);

                $cortes_por_pliego = intval($aJson['Cortes']['guarda_cajon']);

                for ($k = 0; $k < $cuantos_v_DigEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tiraje            = intval($v_tmp_R[$k]['cantidad']);
                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigEmp = "INSERT INTO cot_digemp
                        (id_odt, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego,  costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigEmp = $this->db->prepare($sql_DigEmp);

                    $l_insert_DigEmp = $query_DigEmp->execute();

                    if (!$l_insert_DigEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Digital Empalme";

                        break;
                    }
                }
            }


        /*********** Digital Fcaj ***************/

            // inicia digital Forro del Cajon
            $l_insert_DigFCaj = true;

            if (array_key_exists("DigFCaj", $aJson)) {

                $v_DigFCaj = $aJson['DigFCaj'];
                $v_tmp_R   = array_values($v_DigFCaj);

                $cuantos_v_DigFCaj = count($v_DigFCaj);

                $cortes_por_pliego = intval($aJson['Cortes']['forro_cajon']);

                for ($k = 0; $k < $cuantos_v_DigFCaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tiraje            = intval($v_tmp_R[$k]['cantidad']);
                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigFcaj = "INSERT INTO cot_digfcaj
                        (id_odt, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego,  costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigFcaj = $this->db->prepare($sql_DigFcaj);

                    $l_insert_DigFCaj = $query_DigFcaj->execute();

                    if (!$l_insert_DigFCaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Digital Forro Cajon";

                        break;
                    }
                }
            }


        /*********** Digital Fcar ***************/

            // inicia digital Forro de la Cartera
            $l_insert_DigFCar = true;

            if (array_key_exists("DigFCar", $aJson)) {

                $v_DigFCar = $aJson['DigFCar'];
                $v_tmp_R   = array_values($v_DigFCar);

                $cuantos_v_DigFCar = count($v_DigFCar);

                $cortes_por_pliego = intval($aJson['Cortes']['forro_cartera']);

                for ($k = 0; $k < $cuantos_v_DigFCar; $k++) {

                    $costo_tot_proceso = 0;

                    $tiraje            = intval($v_tmp_R[$k]['cantidad']);
                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigFcar = "INSERT INTO cot_digfcar
                        (id_odt, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigFcar = $this->db->prepare($sql_DigFcar);

                    $l_insert_DigFCar = $query_DigFcar->execute();

                    if (!$l_insert_DigFCar) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Digital Forro Cartera";

                        break;
                    }
                }
            }


        /*********** Digital Guarda ***************/

            // inicia digital Guarda
            $l_insert_DigG = true;

            if (array_key_exists("DigG", $aJson)) {

                $v_DigG  = $aJson['DigG'];
                $v_tmp_R = array_values($v_DigG);

                $cuantos_v_DigG = count($v_DigG);

                $cortes_por_pliego = intval($aJson['Cortes']['guarda']);

                for ($k = 0; $k < $cuantos_v_DigG; $k++) {

                    $costo_tot_proceso = 0;

                    $tiraje            = intval($v_tmp_R[$k]['cantidad']);
                    $corte_ancho       = floatval($v_tmp_R[$k]['corte_ancho']);
                    $corte_largo       = floatval($v_tmp_R[$k]['corte_largo']);
                    $imp_ancho         = floatval($v_tmp_R[$k]['imp_ancho']);
                    $imp_largo         = floatval($v_tmp_R[$k]['imp_largo']);
                    $impresion         = trim(strval($v_tmp_R[$k]['tipo_impresion']));
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);

                    $costo_unitario          = floatval($v_tmp_R[$k]['costo_unitario']);
                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unitario']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot']);


                    $sql_DigG = "INSERT INTO cot_digguarda
                        (id_odt, tiraje, corte_ancho, corte_largo, imp_ancho, imp_largo, impresion, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego,  costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, $tiraje, $corte_ancho, $corte_largo, $imp_ancho, $imp_largo, '$impresion', $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_DigG = $this->db->prepare($sql_DigG);

                    $l_insert_DigG = $query_DigG->execute();

                    if (!$l_insert_DigG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Digital Guarda";

                        break;
                    }
                }
            }


        /*********** Serigrafia Empalme ***************/

            // Inicia Serigrafia empalme
            $l_insert_SerEmp = true;

            if (array_key_exists("SerEmp", $aJson)) {

                $v_SerEmp = $aJson['SerEmp'];
                $v_tmp_R  = array_values($v_SerEmp);

                $cuantos_v_SerEmp = count($v_SerEmp);

                for ($k = 0; $k < $cuantos_v_SerEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $tiraje             = intval($v_tmp_R[$k]['cantidad']);
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = $v_tmp_R[$k]["costo_unit_arreglo"];
                    $costo_arreglo      = $v_tmp_R[$k]["costo_arreglo"];
                    $costo_unit_tiro    = $v_tmp_R[$k]["costo_unitario_tiro"];
                    $costo_tiro         = $v_tmp_R[$k]["costo_tiro"];
                    $costo_tot_proceso  = $v_tmp_R[$k]["costo_tot_proceso"];


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);

                    $sql_SerEmp = "INSERT INTO cot_seremp
                        (id_odt, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_SerEmp = $this->db->prepare($sql_SerEmp);

                    $l_insert_SerEmp = $query_SerEmp->execute();

                    if (!$l_insert_SerEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Serigrafia Empalme";

                        break;
                    }
                }
            }


        /*********** Serigrafia FCaj ***************/

            // Inicia Serigrafia Forro del Cajon
            $l_insert_SerFCaj = true;

            if (array_key_exists("SerFCaj", $aJson)) {

                $v_SerFCaj = $aJson['SerFCaj'];
                $v_tmp_R   = array_values($v_SerFCaj);

                $cuantos_v_SerFCaj = count($v_SerFCaj);

                for ($k = 0; $k < $cuantos_v_SerFCaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $tiraje             = intval($v_tmp_R[$k]['cantidad']);
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = $v_tmp_R[$k]["costo_unit_arreglo"];
                    $costo_arreglo      = $v_tmp_R[$k]["costo_arreglo"];
                    $costo_unit_tiro    = $v_tmp_R[$k]["costo_unitario_tiro"];
                    $costo_tiro         = $v_tmp_R[$k]["costo_tiro"];
                    $costo_tot_proceso  = $v_tmp_R[$k]["costo_tot_proceso"];


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SerFCaj = "INSERT INTO cot_serfcaj
                        (id_odt, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SerFCaj = $this->db->prepare($sql_SerFCaj);

                    $l_insert_SerFCaj = $query_SerFCaj->execute();

                    if (!$l_insert_SerFCaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Serigrafia Forro Cajon";

                        break;
                    }
                }
            }


        /*********** Serigrafia FCar ***************/

            // Inicia Serigrafia Forro de la Cartera
            $l_insert_SerFCar = true;

            if (array_key_exists("SerFCar", $aJson)) {

                $v_SerFCar   = $aJson['SerFCar'];
                $v_tmp_R = array_values($v_SerFCar);

                $cuantos_v_SerFCar = count($v_SerFCar);

                for ($k = 0; $k < $cuantos_v_SerFCar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $tiraje             = intval($v_tmp_R[$k]['cantidad']);
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = $v_tmp_R[$k]["costo_unit_arreglo"];
                    $costo_arreglo      = $v_tmp_R[$k]["costo_arreglo"];
                    $costo_unit_tiro    = $v_tmp_R[$k]["costo_unitario_tiro"];
                    $costo_tiro         = $v_tmp_R[$k]["costo_tiro"];
                    $costo_tot_proceso  = $v_tmp_R[$k]["costo_tot_proceso"];


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SerFCar = "INSERT INTO cot_serfcar
                        (id_odt, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_SerFCar = $this->db->prepare($sql_SerFCar);

                    $l_insert_SerFCar = $query_SerFCar->execute();

                    if (!$l_insert_SerFCar or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Serigrafia Forro Cartera";

                        break;
                    }
                }
            }


        /*********** Serigrafia Guarda ***************/

            // Inicia Serigrafia Guarda
            $l_insert_SerG = true;

            if (array_key_exists("SerG", $aJson)) {

                $v_SerG  = $aJson['SerG'];
                $v_tmp_R = array_values($v_SerG);

                $cuantos_v_SerG = count($v_SerG);

                for ($k = 0; $k < $cuantos_v_SerG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipo               = trim(strval($v_tmp_R[$k]['tipo']));
                    $tiraje             = intval($v_tmp_R[$k]['cantidad']);
                    $num_tintas         = intval($v_tmp_R[$k]['num_tintas']);
                    $costo_unit_arreglo = $v_tmp_R[$k]["costo_unit_arreglo"];
                    $costo_arreglo      = $v_tmp_R[$k]["costo_arreglo"];
                    $costo_unit_tiro    = $v_tmp_R[$k]["costo_unitario_tiro"];
                    $costo_tiro         = $v_tmp_R[$k]["costo_tiro"];
                    $costo_tot_proceso  = $v_tmp_R[$k]["costo_tot_proceso"];


                    $merma_min               = intval($v_tmp_R[$k]['mermas']['merma_min']);
                    $merma_adic              = intval($v_tmp_R[$k]['mermas']['merma_adic']);
                    $merma_tot               = intval($v_tmp_R[$k]['mermas']['merma_tot']);
                    $cortes_por_pliego       = intval($v_tmp_R[$k]['mermas']['cortes_por_pliego']);
                    $merma_tot_pliegos       = intval($v_tmp_R[$k]['mermas']['merma_tot_pliegos']);
                    $costo_unit_papel_merma  = floatval($v_tmp_R[$k]['mermas']['costo_unit_papel_merma']);
                    $costo_tot_pliegos_merma = floatval($v_tmp_R[$k]['mermas']['costo_tot_pliegos_merma']);


                    $sql_SerG = "INSERT INTO cot_serguarda
                        (id_odt, tipo, tiraje, num_tintas, costo_unit_arreglo, costo_arreglo, costo_unit_tiro, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_papel_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipo', $tiraje, $num_tintas, $costo_unit_arreglo, $costo_arreglo, $costo_unit_tiro, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_papel_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_SerG = $this->db->prepare($sql_SerG);

                    $l_insert_SerG = $query_SerG->execute();

                    if (!$l_insert_SerG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Serigrafia Guarda";

                        break;
                    }
                }
            }

    /*************** Termina Impresiones *******************/


    /************* Inicia Acabados ****************************/


        /*************** Barniz **************************/

            // Inicia Barniz Empalme
            $l_insert_BUVEmp = true;

            if (array_key_exists("Barniz_UV", $aJson)) {

                $v_BUVEmp = $aJson['Barniz_UV'];
                $v_tmp_R  = array_values($v_BUVEmp);

                $cuantos_v_BUVEmp = count($v_BUVEmp);

                for ($k = 0; $k < $cuantos_v_BUVEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_BUVEmp = "INSERT INTO cot_barnizuvemp
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVEmp = $this->db->prepare($sql_BUVEmp);

                    $l_insert_BUVEmp = $query_BUVEmp->execute();

                    if (!$l_insert_BUVEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Barniz Empalme";

                        break;
                    }
                }
            }

            // Inicia Barniz Forro Cajon
            $l_insert_BUVFcaj = true;

            if (array_key_exists("BarnizFcaj", $aJson)) {

                $v_BUVFcaj = $aJson['BarnizFcaj'];
                $v_tmp_R   = array_values($v_BUVFcaj);

                $cuantos_v_BUVFcaj = count($v_BUVFcaj);

                for ($k = 0; $k < $cuantos_v_BUVFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_BUVFcaj = "INSERT INTO cot_barnizuvfcaj
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVFcaj = $this->db->prepare($sql_BUVFcaj);

                    $l_insert_BUVFcaj = $query_BUVFcaj->execute();

                    if (!$l_insert_BUVFcaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Barniz Forro Cajon";

                        break;
                    }
                }
            }


            // Inicia Barniz Forro Cartera
            $l_insert_BUVFcar = true;

            if (array_key_exists("BarnizFcar", $aJson)) {

                $v_BUVFcar = $aJson['BarnizFcar'];
                $v_tmp_R   = array_values($v_BUVFcar);

                $cuantos_v_BUVFcar = count($v_BUVFcar);

                for ($k = 0; $k < $cuantos_v_BUVFcar; $k++) {

                    $tipoGrabado = trim(strval($v_tmp_R[$k]['tipoGrabado']));

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


                    $sql_BUVFcar = "INSERT INTO cot_barnizuvfcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVFcar = $this->db->prepare($sql_BUVFcar);

                    $l_insert_BUVFcar = $query_BUVFcar->execute();

                    if (!$l_insert_BUVFcar) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Barniz Forro Cartera";

                        break;
                    }
                }
            }

            // Inicia Barniz Guarda
            $l_insert_BUVG = true;

            if (array_key_exists("BarnizG", $aJson)) {

                $v_BUVG  = $aJson['BarnizG'];
                $v_tmp_R = array_values($v_BUVG);

                $cuantos_v_BUVG = count($v_BUVG);

                for ($k = 0; $k < $cuantos_v_BUVG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_BUVG = "INSERT INTO cot_barnizuvguarda
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_BUVG = $this->db->prepare($sql_BUVG);

                    $l_insert_BUVG = $query_BUVG->execute();

                    if (!$l_insert_BUVG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Barniz Guarda";

                        break;
                    }
                }
            }


        /*************** Corte Laser *********************/

            // Inicia Corte Laser Empalme
            $l_insert_LaserEmp = true;

            if (array_key_exists("Laser", $aJson)) {

                $v_LaserEmp = $aJson['Laser'];
                $v_tmp_R    = array_values($v_LaserEmp);

                $cuantos_v_LaserEmp = count($v_LaserEmp);

                for ($k = 0; $k < $cuantos_v_LaserEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserEmp = "INSERT INTO cot_laseremp
                        (id_odt, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserEmp = $this->db->prepare($sql_LaserEmp);

                    $l_insert_LaserEmp = $query_LaserEmp->execute();

                    if (!$l_insert_LaserEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laser Empalme";

                        break;
                    }
                }
            }


            // Inicia Corte Laser Cajon
            $l_insert_LaserFcaj = true;

            if (array_key_exists("LaserFcaj", $aJson)) {

                $v_LaserFcaj = $aJson['LaserFcaj'];
                $v_tmp_R     = array_values($v_LaserFcaj);

                $cuantos_v_LaserFcaj = count($v_LaserFcaj);


                for ($k = 0; $k < $cuantos_v_LaserFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserFcaj = "INSERT INTO cot_laserfcaj
                        (id_odt, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserFcaj = $this->db->prepare($sql_LaserFcaj);

                    $l_insert_LaserFcaj = $query_LaserFcaj->execute();

                    if (!$l_insert_LaserFcaj or $costo_tot_proceso <=  0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laser Forro Cajon";

                        break;
                    }
                }
            }


            // Inicia Corte Laser Cartera
            $l_insert_LaserFcar = true;

            if (array_key_exists("LaserFcar", $aJson)) {

                $v_LaserFcar = $aJson['LaserFcar'];
                $v_tmp_R     = array_values($v_LaserFcar);

                $cuantos_v_LaserFcar = count($v_LaserFcar);


                for ($k = 0; $k < $cuantos_v_LaserFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserFcar = "INSERT INTO cot_laserfcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserFcar = $this->db->prepare($sql_LaserFcar);

                    $l_insert_LaserFcar = $query_LaserFcar->execute();

                    if (!$l_insert_LaserFcar or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laser Forro Cartera";

                        break;
                    }
                }
            }


            // Inicia Corte Laser Guarda
            $l_insert_LaserG = true;

            if (array_key_exists("LaserG", $aJson)) {

                $v_LaserG = $aJson['LaserG'];
                $v_tmp_R  = array_values($v_LaserG);

                $cuantos_v_LaserG = count($v_LaserG);

                for ($k = 0; $k < $cuantos_v_LaserG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipo_grabado']));
                    $largo             = floatval($v_tmp_R[$k]['Largo']);
                    $ancho             = floatval($v_tmp_R[$k]['Ancho']);
                    $costo_unitario    = floatval($v_tmp_R[$k]['costo_unitario']);
                    $tiempo_requerido  = floatval($v_tmp_R[$k]['tiempo_requerido']);
                    $costo_tot_proceso = floatval($v_tmp_R[$k]['costo_tot_proceso']);
                    $merma_min         = intval($v_tmp_R[$k]['merma_min']);


                    $sql_LaserG = "INSERT INTO cot_laserguarda
                        (id_odt, tipo_grabado, tiraje, largo, ancho, costo_unitario, tiempo_requerido, costo_tot_proceso, merma_min, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $costo_unitario, $tiempo_requerido, $costo_tot_proceso, $merma_min, '$d_fecha')";


                    $query_LaserG = $this->db->prepare($sql_LaserG);

                    $l_insert_LaserG = $query_LaserG->execute();

                    if (!$l_insert_LaserG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laser Guarda";

                        break;
                    }
                }
            }


        /*************** Grabado ************************/

            // Inicia Grabado Empalme
            $l_insert_GrabEmp = true;

            if (array_key_exists("Grabado", $aJson)) {

                $v_GrabEmp = $aJson['Grabado'];
                $v_tmp_R   = array_values($v_GrabEmp);

                $cuantos_v_GrabEmp = count($v_GrabEmp);

                for ($k = 0; $k < $cuantos_v_GrabEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_GrabEmp = "INSERT INTO cot_grabemp
                        (id_odt, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabEmp = $this->db->prepare($sql_GrabEmp);

                    $l_insert_GrabEmp = $query_GrabEmp->execute();

                    if (!$l_insert_GrabEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Grabado Empalme";

                        break;
                    }
                }
            }


            // Inicia Grabado Forro del Cajon

            $l_insert_GrabFcaj = true;

            if (array_key_exists("GrabadoFcaj", $aJson)) {

                $v_GrabFcaj = $aJson['GrabadoFcaj'];
                $v_tmp_R    = array_values($v_GrabFcaj);

                $cuantos_v_GrabFcaj = count($v_GrabFcaj);


                for ($k = 0; $k < $cuantos_v_GrabFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_GrabFcaj = "INSERT INTO cot_grabfcaj
                        (id_odt, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabFcaj = $this->db->prepare($sql_GrabFcaj);

                    $l_insert_GrabFcaj = $query_GrabFcaj->execute();

                    if (!$l_insert_GrabFcaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Grabado Forro Cajon";

                        break;
                    }
                }
            }


            // Inicia  Grabado Forro de la Cartera
            $l_insert_GrabFcar = true;

            if (array_key_exists("GrabadoFcar", $aJson)) {

                $v_GrabFcar = $aJson['GrabadoFcar'];
                $v_tmp_R    = array_values($v_GrabFcar);

                $cuantos_v_GrabFcar = count($v_GrabFcar);

                for ($k = 0; $k < $cuantos_v_GrabFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_GrabFcar = "INSERT INTO cot_grabfcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabFcar = $this->db->prepare($sql_GrabFcar);

                    $l_insert_GrabFcar = $query_GrabFcar->execute();

                    if (!$l_insert_GrabFcar or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Grabado Forro Cartera";

                        break;
                    }
                }
            }


            $l_insert_GrabG = true;

            if (array_key_exists("GrabadoG", $aJson)) {

                $v_GrabG = $aJson['GrabadoG'];
                $v_tmp_R = array_values($v_GrabG);

                $cuantos_v_GrabG = count($v_GrabG);

                for ($k = 0; $k < $cuantos_v_GrabG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_GrabG = "INSERT INTO cot_grabguarda
                        (id_odt, tipo_grabado, tiraje, largo, ancho, ubicacion, placa_area, placa_costo_unitario, placa_costo,  arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$ubicacion', $placa_area, $placa_costo_unitario, $placa_costo,  $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_GrabG = $this->db->prepare($sql_GrabG);

                    $l_insert_GrabG = $query_GrabG->execute();

                    if (!$l_insert_GrabG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Grabado Guarda";

                        break;
                    }
                }
            }


        /*************** HotStamping *******************/

            // Inicia HotStamping Empalmme
            $l_insert_HSEmp = true;

            if (array_key_exists("HotStamping", $aJson)) {

                $v_HSEmp = $aJson['HotStamping'];
                $v_tmp_R = array_values($v_HSEmp);

                $cuantos_v_HSEmp = count($v_HSEmp);

                for ($k = 0; $k < $cuantos_v_HSEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado             = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_HSEmp = "INSERT INTO cot_hsemp
                        (id_odt, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area,pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso,   $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_HSEmp = $this->db->prepare($sql_HSEmp);

                    $l_insert_HSEmp = $query_HSEmp->execute();

                    if (!$l_insert_HSEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla HotStamping Empalme";

                        break;
                    }
                }
            }


            $l_insert_HSFcaj = true;

            if (array_key_exists("HotStampingFcaj", $aJson)) {

                $v_HSFcaj = $aJson['HotStampingFcaj'];
                $v_tmp_R  = array_values($v_HSFcaj);

                $cuantos_v_HSFcaj = count($v_HSFcaj);

                for ($k = 0; $k < $cuantos_v_HSFcaj; $k++) {

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


                    $sql_HSFcaj = "INSERT INTO cot_hsfcaj
                        (id_odt, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area,pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso,   $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_HSFcaj = $this->db->prepare($sql_HSFcaj);

                    $l_insert_HSFcaj = $query_HSFcaj->execute();

                    if (!$l_insert_HSFcaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla HotStamping Forro Cajon";

                        break;
                    }
                }
            }


            $l_insert_HSFcar = true;

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


                    $sql_HSFcar = "INSERT INTO cot_hsfcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area,pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso,   $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_HSFcar = $this->db->prepare($sql_HSFcar);

                    $l_insert_HSFcar = $query_HSFcar->execute();

                    if (!$l_insert_HSFcar or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla HotStamping Forro Cartera";

                        break;
                    }
                }
            }


            $l_insert_HSG = true;

            if (array_key_exists("HotStampingG", $aJson)) {

                $v_HSG   = $aJson['HotStampingG'];
                $v_tmp_R = array_values($v_HSG);

                $cuantos_v_HSG = count($v_HSG);

                for ($k = 0; $k < $cuantos_v_HSG; $k++) {

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


                    $sql_HSG = "INSERT INTO cot_hsguarda
                        (id_odt, tipo_grabado, tiraje, largo, ancho, color, placa_area, placa_costo_unitario, placa_costo, pelicula_largo, pelicula_ancho, pelicula_area,pelicula_costo_unitario, pelicula_costo, arreglo_costo_unitario, arreglo_costo, costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, '$Color', $placa_area, $placa_costo_unitario, $placa_costo, $pelicula_largo, $pelicula_ancho, $pelicula_area, $pelicula_costo_unitario, $pelicula_costo, $arreglo_costo_unitario, $arreglo_costo, $costo_unitario, $costo_tiro, $costo_tot_proceso,   $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_HSG = $this->db->prepare($sql_HSG);

                    $l_insert_HSG = $query_HSG->execute();

                    if (!$l_insert_HSG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla HotStamping Guarda";

                        break;
                    }
                }
            }


        /*************** Laminado **********************/

            // Inicia Laminado Empalme
            $l_insert_LamEmp = true;

            if (array_key_exists("Laminado", $aJson)) {

                $v_LamEmp = $aJson['Laminado'];
                $v_tmp_R  = array_values($v_LamEmp);

                $cuantos_v_LamEmp = count($v_LamEmp);

                for ($k = 0; $k < $cuantos_v_LamEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $Largo             = intval($v_tmp_R[$k]['Largo']);
                    $Ancho             = intval($v_tmp_R[$k]['Ancho']);
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


                    $sql_LamEmp = "INSERT INTO cot_lamemp
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_LamEmp = $this->db->prepare($sql_LamEmp);

                    $l_insert_LamEmp = $query_LamEmp->execute();

                    if (!$l_insert_LamEmp) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laminado Empalme";

                        break;
                    }
                }
            }


            // Inicia Laminado Forro del Cajon
            $l_insert_LamFcaj = true;

            if (array_key_exists("LaminadoFcaj", $aJson)) {

                $v_LamFcaj = $aJson['LaminadoFcaj'];
                $v_tmp_R   = array_values($v_LamFcaj);

                $cuantos_v_LamFcaj = count($v_LamFcaj);

                for ($k = 0; $k < $cuantos_v_LamFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado = trim(strval($v_tmp_R[$k]['tipoGrabado']));

                    $Largo             = intval($v_tmp_R[$k]['Largo']);
                    $Ancho             = intval($v_tmp_R[$k]['Ancho']);
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


                    $sql_LamFcaj = "INSERT INTO cot_lamfcaj
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_LamFcaj = $this->db->prepare($sql_LamFcaj);

                    $l_insert_LamFcaj = $query_LamFcaj->execute();

                    if (!$l_insert_LamFcaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laminado Forro Cajon";

                        break;
                    }
                }
            }


            $l_insert_LamFcar = true;

            if (array_key_exists("LaminadoFcar", $aJson)) {

                $v_LamFcar = $aJson['LaminadoFcar'];
                $v_tmp_R   = array_values($v_LamFcar);

                $cuantos_v_LamFcar = count($v_LamFcar);

                for ($k = 0; $k < $cuantos_v_LamFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $Largo             = intval($v_tmp_R[$k]['Largo']);
                    $Ancho             = intval($v_tmp_R[$k]['Ancho']);
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


                    $sql_LamFcar = "INSERT INTO cot_lamfcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";

                    $query_LamFcar = $this->db->prepare($sql_LamFcar);

                    $l_insert_LamFcar = $query_LamFcar->execute();

                    if (!$l_insert_LamFcar or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laminado Forro Cartera";

                        break;
                    }
                }
            }


            // Inicia Laminado Guarda
            $l_insert_LamG = true;

            if (array_key_exists("LaminadoG", $aJson)) {

                $v_LamG  = $aJson['LaminadoG'];
                $v_tmp_R = array_values($v_LamG);

                $cuantos_v_LamG = count($v_LamG);

                for ($k = 0; $k < $cuantos_v_LamG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado       = trim(strval($v_tmp_R[$k]['tipoGrabado']));
                    $Largo             = intval($v_tmp_R[$k]['Largo']);
                    $Ancho             = intval($v_tmp_R[$k]['Ancho']);
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


                    $sql_LamG = "INSERT INTO cot_lamguarda
                        (id_odt, tipo_grabado, tiraje, largo, ancho, area, costo_unitario, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $Largo, $Ancho, $area, $costo_unitario, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_LamG = $this->db->prepare($sql_LamG);

                    $l_insert_LamG = $query_LamG->execute();

                    if (!$l_insert_LamG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Laminado Guarda";

                        break;
                    }
                }
            }


        /****************** Suaje **********************/

            // Inicia Suaje Empalme
            $l_insert_SuaEmp = true;

            if (array_key_exists("Suaje", $aJson)) {

                $v_SuaEmp = $aJson['Suaje'];
                $v_tmp_R  = array_values($v_SuaEmp);

                $cuantos_v_SuaEmp = count($v_SuaEmp);

                for ($k = 0; $k < $cuantos_v_SuaEmp; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_SuaEmp = "INSERT INTO cot_suajeemp
                        (id_odt, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaEmp = $this->db->prepare($sql_SuaEmp);

                    $l_insert_SuaEmp = $query_SuaEmp->execute();

                    if (!$l_insert_SuaEmp or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Suaje Empalme";

                        break;
                    }
                }
            }


            $l_insert_SuaFcaj = true;

            if (array_key_exists("SuajeFcaj", $aJson)) {

                $v_SuaFcaj = $aJson['SuajeFcaj'];
                $v_tmp_R   = array_values($v_SuaFcaj);

                $cuantos_v_SuaFcaj = count($v_SuaFcaj);


                for ($k = 0; $k < $cuantos_v_SuaFcaj; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_SuaFcaj = "INSERT INTO cot_suajefcaj
                        (id_odt, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaFcaj = $this->db->prepare($sql_SuaFcaj);

                    $l_insert_SuaFcaj = $query_SuaFcaj->execute();

                    if (!$l_insert_SuaFcaj or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Suaje Forro Cajon";

                        break;
                    }
                }
            }


            $l_insert_SuaFcar = true;

            if (array_key_exists("SuajeFcar", $aJson)) {

                $v_SuaFcar = $aJson['SuajeFcar'];
                $v_tmp_R   = array_values($v_SuaFcar);

                $cuantos_v_SuaFcar = count($v_SuaFcar);

                for ($k = 0; $k < $cuantos_v_SuaFcar; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_SuaFcar = "INSERT INTO cot_suajefcar
                        (id_odt, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje,  arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaFcar = $this->db->prepare($sql_SuaFcar);

                    $l_insert_SuaFcar = $query_SuaFcar->execute();

                    if (!$l_insert_SuaFcar or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Suaje Forro Cartera";

                        break;
                    }
                }
            }


            $l_insert_SuaG = true;

            if (array_key_exists("SuajeG", $aJson)) {

                $v_SuaG  = $aJson['SuajeG'];
                $v_tmp_R = array_values($v_SuaG);

                $cuantos_v_SuaG = count($v_SuaG);

                for ($k = 0; $k < $cuantos_v_SuaG; $k++) {

                    $costo_tot_proceso = 0;

                    $tipoGrabado            = trim(strval($v_tmp_R[$k]['tipoGrabado']));
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


                    $sql_SuaG = "INSERT INTO cot_suajeguarda
                        (id_odt, tipo_grabado, tiraje, largo, ancho, perimetro, tabla_suaje, arreglo_costo_unitario, tiro_costo_unitario, costo_tiro, costo_tot_proceso, merma_min, merma_adic, merma_tot, cortes_por_pliego, merma_tot_pliegos, costo_unit_merma, costo_tot_pliegos_merma, fecha)
                    VALUES
                        ($id_caja_odt, '$tipoGrabado', $tiraje, $largo, $ancho, $perimetro, $tabla_suaje, $arreglo_costo_unitario, $tiro_costo_unitario, $costo_tiro, $costo_tot_proceso, $merma_min, $merma_adic, $merma_tot, $cortes_por_pliego, $merma_tot_pliegos, $costo_unit_merma, $costo_tot_pliegos_merma, '$d_fecha')";


                    $query_SuaG = $this->db->prepare($sql_SuaG);

                    $l_insert_SuaG = $query_SuaG->execute();

                    if (!$l_insert_SuaG or $costo_tot_proceso <= 0) {

                        $aJson['mensaje'] = "ERROR";
                        $aJson['error']   = $aJson['error'] . "; Error al grabar en la tabla Suaje Guarda";

                        break;
                    }
                }
            }



    /*************** Termina Acabados *****************/


            //and ($inserted_cliem and $inserted_clied)
            if (
                ($inserted and $inserted_mod and $inserted_calc)
                and ($inserted_papel_emp and $inserted_papel_fcaj)
                and ($inserted_papel_fcar and $inserted_papel_g)
                and ($inserted_papel_caj and $inserted_papel_car)
                and ($inserted_elab_car and $inserted_elab_guarda)
                and ($inserted_ranurado and $inserted_ranurado_fcar)
                and ($inserted_encuadernacion and $inserted_encuadernacion_fcaj)
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

                return $aJson['error'];
            }
        } catch (Exception $e) {

            $this->db->rollBack();

            return $aJson['error'];
        }
    }


    // Inserta nueva cotización (Tabla: cotizaciones)
    public function newCotizacion($model, $q, $price, $cliente, $idp, $plista, $detalles, $tipo) {

        $user  = $_SESSION['user']['id_usuario'];
        $store = $_SESSION['user']['id_tienda'];

        $time  = date("H:i:s", time());
        $fecha = TODAY;

        $sql = "INSERT INTO `cotizaciones` (`id_cotizacion`, `modelo`, `cantidad`, `id_cliente`,tipo,detalles,fecha) VALUES (NULL, '$model',$q,$cliente,'$tipo','$detalles','$fecha')";

        $query    = $this->db->prepare($sql);
        $inserted = $query->execute();

        if ($inserted) {

            return true;
        } else {

            return false;
        }
    }


    public function updateCotizacion($model, $q, $price, $cliente, $idp, $plista, $detalles, $tipo, $id_cotizacion) {

        $user  = $_SESSION['user']['id_usuario'];
        $store = $_SESSION['user']['id_tienda'];

        $time  = date("H:i:s", time());
        $fecha = TODAY;

        $sql   = "UPDATE cotizaciones SET detalles='$detalles' WHERE id_cotizacion = $id_cotizacion";

        $query    = $this->db->prepare($sql);

        $inserted = $query->execute();

        if ($inserted) {

          return true;
        } else {

          return false;
        }
    }


    public function saveCambio($odt, $razon, $comments, $modificaCosto, $costoNuevo, $file, $fecha_aut, $quien_aut, $modelo, $porqueno) {

        $user  = $_SESSION['user']['id_usuario'];
        $store = $_SESSION['user']['id_tienda'];

        $date  = TODAY;
        $time  = date("H:i:s", time());

        $observ  = (empty($comments))? 'NULL':"'" . $comments."'";
        $c_nuevo = (empty($costoNuevo))? 'NULL':$costoNuevo;

        $sql = "INSERT INTO `cambios` (`id_cambio`, `odt`, `razon`, `observaciones`, `modifica_costo`, `costo_nuevo`, `hora`, `fecha`, `usuario`,archivo, realizado, fecha_autorizacion, quien_autorizo, modelo,porque_no_es_posible, fecha_realizado, seguimiento) VALUES (NULL, '$odt', '$razon', $observ, '$modificaCosto', $c_nuevo, '$time', '$date', $user, '$file', 'false', $fecha_aut, $quien_aut, $modelo, $porqueno, NULL, NULL)";

        $query    = $this->db->prepare($sql);
        $inserted = $query->execute();

        $_SESSION['perro'] = $sql;

        if ($inserted) {

          return true;
        } else {

          return false;
        }
    }


    public function getCotizaMermaOffset() {

        $sql = "SELECT * FROM offset_merma where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaDigital() {

        $sql = "SELECT * FROM digital_merma where status = 'A'";
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaSerigrafia() {

        $sql = "SELECT * FROM serigrafia_merma where status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaHotStamping() {

        $sql = "SELECT * FROM acabados_merma WHERE status = 'A' and nombre like '%HotStamping%'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaLaminado() {

        $sql = "SELECT * FROM acabados_merma WHERE status = 'A' and nombre like '%Laminado%'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaBarniz() {

        $sql = "SELECT * FROM acabados_merma WHERE status = 'A' and nombre like '%Barniz UV%'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaSuaje() {

        $sql = "SELECT * FROM acabados_merma WHERE status = 'A' and nombre like '%Suaje%'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaForrado() {

        $sql = "SELECT * FROM acabados_merma WHERE status = 'A' and nombre like '%Forrado%'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCotizaMermaGrabado() {

        $sql = "SELECT * FROM acabados_merma WHERE status = 'A' and nombre like '%Grabado%'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getPrecioPapelById($id) {

        $id = intval($id);

        $sql = "SELECT * FROM papeles WHERE status = 'A' and id_papel = " . $id;

        $query = $this->db->prepare($sql);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['costo_unitario'];
    }


    public function deleteCotizacion() {

        $idCot      = intval($_POST['id']);
        $id_usuario = $_SESSION['user']['id_usuario'];
        $id_usuario = intval($id_usuario);


        $fecha = date("Y-m-d");
        $hora = date("H:i");

        $sql = "UPDATE cot_odt set
                status = 'B'
                , fecha_baja = '$fecha'
                , hora_baja  = '$hora'
                , id_usuario_baja = " . $id_usuario
                . " where id_odt = $idCot";

        try {

            $query = $this->db->prepare($sql);
            $deleted = $query->execute();

            if( $deleted ){

                return true;
            } else {

                return false;
            }
        }catch( Exception $ex ) {

            return false;
        }
    }


    public function getCotizaciones() {

        //$sql = "SELECT * FROM cot_odt WHERE status = 'A' order by fecha_odt desc";
        $sql = "SELECT cot_odt.id_odt, cot_odt.num_odt, cot_odt.id_modelo, cot_odt.tiraje, cot_odt.fecha_odt
                , cot_odt.hora_odt, modelos_cajas.nombre as nombre_caja
                , clientes.nombre as nombre_cliente
                FROM cot_odt
                join modelos_cajas on cot_odt.id_modelo = modelos_cajas.id_modelo
                join clientes on cot_odt.id_cliente = clientes.id_cliente
                WHERE cot_odt.status = 'A' order by cot_odt.fecha_odt desc, cot_odt.hora_odt desc";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;

    }


    public function getCotizacionByClient($idCliente) {

        $idUsuario = intval($_SESSION['user']['id_usuario']);

        $idCliente = intval($idCliente);

        //$sql = "SELECT *, modelos_cajas.nombre as nombre_caja, clientes.nombre as nombre_cliente FROM cot_odt join modelos_cajas on modelos_cajas.id_modelo = cot_odt.id_modelo join clientes on clientes.id_cliente=cot_odt.id_cliente WHERE cot_odt.status = 'A' and cot_odt.id_cliente = " . $idCliente . " and id_vendedor =  " . $idUsuario . " order by fecha_odt desc";

        $sql = "SELECT cot_odt.id_odt, cot_odt.id_usuario, cot_odt.num_odt, cot_odt.id_odt_ant, cot_odt.id_cliente, cot_odt.tiraje, cot_odt.fecha_odt, modelos_cajas.nombre as nombre_caja, clientes.nombre as nombre_cliente FROM cot_odt join modelos_cajas on modelos_cajas.id_modelo =cot_odt.id_modelo join clientes on clientes.id_cliente=cot_odt.id_cliente WHERE cot_odt.status = 'A' and cot_odt.id_cliente = $idCliente order by cot_odt.fecha_odt desc";

        $query = $this->db->prepare($sql);
        $result = array();

        try {

            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $result[] = $row;
            }

            return $result;
        } catch (Exception $ex) {

            return false;
        }
    }


    public function getClientById($id_cliente) {

        $id_cliente = intval($id_cliente);

        $sql_name = "SELECT * FROM clientes where status = 'A' and id_cliente = " . $id_cliente . " limit 1";

        $query = $this->db->prepare($sql_name);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getClientByName($nombre_orig) {

        $nombre = trim($nombre_orig);

        /*
        $nombre = strval($nombre);
        $nombre = trim($nombre);
        */

        $sql_name = "SELECT id_cliente FROM clientes where status = 'A' and nombre like '%" . utf8_encode($nombre) . "%'";

        $query = $this->db->prepare($sql_name);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getClients() {

        $idUsuario = intval($_SESSION['user']['id_usuario']);

        //$sql = "SELECT * FROM clientes WHERE status = 'A' and vendedor = $idUsuario ORDER BY nombre ASC limit 0, 500";
        $sql = "SELECT * FROM clientes WHERE status = 'A' ORDER BY nombre ASC";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getNombUsuario($id_usuario) {

        $id_usuario = intval($id_usuario);

        $sql = "SELECT * FROM usuarios WHERE status = 'A' and id_usuario = " . $id_usuario;

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;

    }


    public function getNombTienda($id_tienda) {

        $id_tienda = intval($id_tienda);

        $sql = "SELECT * FROM tiendas WHERE status = 'A' and id_tienda = " . $id_tienda;

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getNumOdt($num_odt) {

        $num_odt = trim(strval($num_odt));

        $sql_odt = "SELECT * from cot_odt where num_odt = '" . $num_odt . "' limit 1";

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getElabCar($id_odt) {

        $id_odt = intval($id_odt);

        $sql_odt = "SELECT * from cot_elab_car where id_odt = " . $id_odt;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getElabGuarda($id_odt) {

        $id_odt = intval($id_odt);

        $sql_odt = "SELECT * from cot_elab_guarda where id_odt = " . $id_odt;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getRanurado($id_odt) {

        $id_odt = intval($id_odt);

        $sql_odt = "SELECT * from cot_ranurado where id_odt = " . $id_odt;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getRanurado_fcar($id_odt) {

        $id_odt = intval($id_odt);

        $sql_odt = "SELECT * from cot_ranurado_fcar where id_odt = " . $id_odt;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getEncuadernacion($id_odt) {

        $id_odt = intval($id_odt);

        $sql_odt = "SELECT * from cot_encuadernacion where id_odt = " . $id_odt;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getEncuadernacionFcaj($id_odt) {

        $id_odt = intval($id_odt);

        $sql_odt = "SELECT * from cot_encuadernacion_fcaj where id_odt = " . $id_odt;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getImp($tabla, $id_odt) {

        $id_odt = intval($id_odt);
        $tabla  = trim(strval($tabla));

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = '" . $id_odt . "'";

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getPapelTabla($id, $tabla) {

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result['id_papel']          = intval($row['id_papel']);
            $result['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $result['ancho']             = intval($row['ancho']);
            $result['largo']             = intval($row['largo']);
            $result['corte_ancho']       = intval($row['corte_ancho']);
            $result['corte_largo']       = intval($row['corte_largo']);
            $result['costo_unitario']    = floatval($row['costo_unitario']);
            $result['tiraje']            = intval($row['tiraje']);
            $result['cortes']            = intval($row['cortes']);
            $result['pliegos']           = intval($row['pliegos']);
            $result['costo_tot_pliegos'] = floatval($row['costo_tot_pliegos']);
        }

        return $result;
    }


    public function getIdCartonTabla($id, $tabla) {

        $id_carton = intval($id);

        $sql_odt = "SELECT * from " . $tabla . " where id_odt = " . $id_carton;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result['id']                = intval($row['id']);
            $result['id_odt']            = intval($row['id_odt']);
            $result['id_modelo']         = intval($row['id_modelo']);
            $result['id_cajon']          = utf8_encode(trim(strval($row['id_cajon'])));
            $result['num_cajon']         = floatval($row['num_cajon']);
            $result['cantidad']          = intval($row['cantidad']);
            $result['nombre']            = utf8_encode(trim(strval($row['nombre'])));
            $result['precio']            = floatval($row['precio']);
            $result['ancho']             = floatval($row['ancho']);
            $result['largo']             = floatval($row['largo']);
            $result['corte_ancho']       = floatval($row['corte_ancho']);
            $result['corte_largo']       = floatval($row['corte_largo']);
            $result['piezas_por_pliego'] = intval($row['piezas_por_pliego']);
            $result['num_pliegos']       = intval($row['num_pliegos']);
            $result['costo_tot_carton']  = floatval($row['costo_tot_carton']);
        }

        return $result;
    }


    public function getPapel($id, $secc) {

        $id   = intval($id);
        $secc = trim(strval($secc));

        switch ($secc) {
            case 'Empalme':

                $nombre_tabla_tmp = "cot_papelemp";

                break;
            case 'FCajon':

                $nombre_tabla_tmp = "cot_papelfcaj";

                break;
            case 'Fcartera':

                $nombre_tabla_tmp = "cot_papelfcar";

                break;
            case 'Guarda':

                $nombre_tabla_tmp = "cot_papelguarda";

                break;
        }

        $sql_odt = "SELECT * from " . $nombre_tabla_tmp . " where id_odt = " . $id;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getIdCarton($id, $secc) {

        $id_carton = intval($id);
        $secc      = trim(strval($secc));

        switch ($secc) {
            case 'Cajon':

                $nombre_tabla_tmp = "cot_cartoncaj";

                break;
            case 'Cartera':

                $nombre_tabla_tmp = "cot_cartoncar";
                break;
        }


        $sql_odt = "SELECT * from " . $nombre_tabla_tmp . " where id_odt = " . $id_carton;

        $query_odt = $this->db->prepare($sql_odt);
        $query_odt->execute();

        $result = array();

        while ($row = $query_odt->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function chkODT() {

        $odt = strval($_POST['odt']);

        $sql = "SELECT * FROM cot_odt where num_odt = '$odt'";

        try {

            $query = $this->db->prepare($sql);

            $query->execute();

            if ( $query->rowCount() == 0 ) {

                return true;
            } else {

                return false;
            }
        } catch (Exception $ex) {

            return false;
        }
    }


/********** empieza el módulo de facturación **********************/

    /******* Modulo: Boletas y Facturas  ******/
    public function getFiles2() {

        $store = '';
        $store = $_SESSION['user']['id_tienda'];
        $store = strval($store);

        $result = array();

        if ($store != 1 ) {

            $sql = "SELECT * FROM recibos WHERE estado = 'ALTA' AND id_tienda = '$store' ORDER BY boleta ASC";

            $query = $this->db->prepare($sql);
            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $result[] = $row;
            }

            return $result;
        } else {

            $sql = "SELECT * FROM recibos WHERE estado = 'ALTA' ORDER BY tienda ASC";

            $query = $this->db->prepare($sql);
            $query->execute();

            while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

                $result[] = $row;
            }

            return $result;
        }
    }


    public function getFiles3() {

        $store = $_SESSION['user']['id_tienda'];

        $sql = "SELECT * FROM recibos WHERE estado = 'REVISADA' AND id_tienda = '$store' ORDER BY fecharevision DESC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFiles4() {

        $sql = "SELECT * FROM facturas ORDER BY factura DESC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFiles42() {

        $factura = "";
        $factura = $_GET['factura'];
        $factura = strval($factura);
        $factura = trim($factura);
        $factura = htmlspecialchars($factura);

        $sql = "SELECT * FROM facturas WHERE factura = '" . $factura . "'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFiles5() {

        //$date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        $sql = "SELECT * FROM recibos WHERE estado = 'REVISADA' AND fecharegistro BETWEEN '00/00/2019' AND '$date2' ORDER BY fecharegistro DESC";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFiles52() {

        $sql = "SELECT * FROM recibos WHERE estado = 'REVISADA'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFacturar() {

        if (isset($_POST['submit'])) {

            foreach ($_POST['id'] as $id) {

                $factura     = $_POST['factura'];
                $total       = $_POST['total'];
                $porvalidar  = $_POST['porvalidar'];
                $sumaboletas = $_POST['totalrecibos'];

                $fecha = date("y-m-d");

                $sql_model = "UPDATE recibos SET estado = 'FACTURADA', factura = '$factura', fechafactura = '$fecha' WHERE id_boleta = " . $id;

                $query = $this->db->prepare($sql_model);
                $inserted = $query->execute();
            }

            $sql_model2 = "INSERT INTO facturas SET factura = '$factura', totalfactura = '$total', sumaboletas = '$sumaboletas', porvalidar = '$porvalidar'";

            $query = $this->db->prepare($sql_model2);
            $inserted2 = $query->execute();
        }
    }


    public function getActualizaFactura() {

        if (isset($_POST['submit'])) {

            foreach ($_POST['nuevoid'] as $id) {

                $factura     = $_POST['factura'];
                $sumaboletas = $_POST['totalrecibos'];
                $porvalidar  = $_POST['porvalidar'];
                $id_factura  = $_POST['id'];

                $fecha = date("y-m-d");

                $sqloo = "UPDATE facturas SET sumaboletas = '$sumaboletas', porvalidar = '$porvalidar' WHERE id_factura = ".$id_factura;

                $query    = $this->db->prepare($sqloo);
                $inserted = $query->execute();
            }

            $sqlact = "UPDATE recibos SET estado = 'FACTURADA', factura = '$factura', fechafactura = '$fecha' WHERE id_boleta = " . $id;

            $query2   = $this->db->prepare($sqlact);
            $inserted = $query2->execute();
        }
    }


    // obtiene el id del recibo
    public function getUpdatetoRevisado() {

        $id_boleta = "";
        $destino   = "";
        $nombre    = "";
        $time      = "";
        $fecha     = "";

        $id_boleta = $_POST['id_boleta'];

        $target_dir = "public/uploads/recibos/";

        opendir($target_dir);

        $destino = $target_dir.$_FILES['archivo']['name'];

        copy($_FILES['archivo']['tmp_name'], $destino);

        echo '<div class="notification success" style=""><div></div><p><span>LISTO:</span> El archivo se ha cargado correctamente.</p></div>';

        $nombre = $_FILES['archivo']['name'];


        $time = date("H:i:s", time());
        $fecha = date("y-m-d");

        $sql_model = "";

        $sql_model = "UPDATE recibos SET estado = 'REVISADA', archivo='$nombre', horarevision = '$time', fecharevision = '$fecha'  WHERE id_boleta = ".$id_boleta;

        $query = $this->db->prepare($sql_model);
        $inserted=$query->execute();

        if ($inserted) {

            return true;
        } else {

            return false;
        }
    }


    // obtiene el id del recibo
    public function getAddTicket($id_boleta) {

        $sql_model = "SELECT * FROM recibos WHERE id_boleta = " . $id_boleta;

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getSumaMontos($nofactura) {

        $factura = $_POST['nofactura'];

        $sql_model = "SELECT SUM(monto) FROM recibos WHERE factura = " . $factura;

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getDetallesFactura() {

        $factura = $_GET['factura'];

        $sql_model = "SELECT factura, tienda, idaccess, boleta, monto, cliente, fecharegistro FROM recibos WHERE factura = '$factura'";

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;

        }

        return $result;

    }


    public function getSumaFactura() {

        $factura = $_GET['factura'];

        $sql_model = "SELECT totalfactura, fechafacturacion, porvalidar FROM facturas WHERE factura = '$factura'";

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;

        }

        return $result;
    }


    public function getFacturaModificar() {

        $factura = $_GET['factura'];

        $sql_model = "SELECT * FROM recibos WHERE factura = '$factura'";

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getModFacElement($id_boleta, $factura) {

        $sql_model = "SELECT * FROM recibos WHERE id_boleta = " . $id_boleta;

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row;
    }


    public function getFacturaMod2() {

        $id_boleta = $_POST['id_boletaup'];

        $sql = "UPDATE recibos SET estado = 'REVISADA', factura = 'NULL' WHERE id_boleta = '$id_boleta'";

        $query    = $this->db->prepare($sql);
        $inserted = $query->execute();

        if ($inserted) {

            return true;
        } else {

            return false;
        }
    }


    public function getFacturaMod3() {

        $factura    = $_POST['facturaup'];
        $total      = $_POST['totalup'];
        $porvalidar = $_POST['porvalidarup'];


        $sql = "UPDATE facturas SET sumaboletas = '$total', porvalidar = '$porvalidar' WHERE id_factura = " . $factura;

        $query    = $this->db->prepare($sql);
        $inserted = $query->execute();

        if ($inserted) {

            return true;
        } else {

            return false;
        }
    }


    public function saveListInfo($odt, $comments, $filename, $numlist, $qty) {

        $user  = $_SESSION['user']['id_usuario'];
        $store = $_SESSION['user']['id_tienda'];

        $time = date("H:i:s", time());

        $sql = "INSERT INTO rotulacion (usuario,odt, cliente, archivo, tienda, numlista, cantidadrot) VALUES ('$user', '$odt', '$comments', '$filename', '$store', $numlist, $qty)";

        $query    = $this->db->prepare($sql);
        $inserted = $query->execute();

        if ($inserted) {

          return true;
        } else {

          return false;
        }
    }


    public function completeCambio($post) {

        $id      = $post['id'];
        $coments = $post['coments'];
        $user    = $_SESSION['user']['id_usuario'];

        $fecha = TODAY;
        $time  = date("H:i:s", time());

        $sql = "UPDATE cambios SET realizado='true', fecha_realizado = '$fecha',seguimiento = '$coments', realizo = $user, hora_realizado = '$time' WHERE id_cambio = " . $id;

        $query    = $this->db->prepare($sql);
        $inserted = $query->execute();

        if ($inserted) {

          return true;
        } else {

          return false;
        }
    }


    public function getProductsNumRows() {

        $sql = "SELECT COUNT(*) AS total FROM productos_catalogo WHERE status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }



    public function getProductsByStore($start, $limit) {

        $sql = "SELECT * FROM productos_catalogo WHERE status = 'A' limit $start , $limit";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;

        }

        return $result;
    }


    public function getInvitNumRows(){

        $sql = "SELECT COUNT(*) AS total FROM invitaciones";

        $query = $this->db->prepare($sql);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }


    public function getInvitations($start, $limit) {

        $sql = "SELECT * FROM invitaciones limit  $start , $limit";

        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getPendingCambios() {

        $sql = "SELECT c.*,(SELECT nombre_usuario FROM usuarios WHERE id_usuario = c.usuario) AS nombre_usuario, (SELECT nombre_tienda FROM tiendas WHERE id_tienda = (SELECT id_tienda FROM usuarios WHERE id_usuario = c.usuario)) AS tienda FROM cambios c WHERE realizado = 'false' ORDER BY id_cambio DESC limit 0, 500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getCompletedCambios(){

        $sql = "SELECT c.*, (SELECT nombre_usuario FROM usuarios WHERE id_usuario = c.usuario) AS nombre_usuario, (SELECT nombre_tienda FROM tiendas WHERE id_tienda = (SELECT id_tienda FROM usuarios WHERE id_usuario = c.usuario)) AS tienda FROM cambios c WHERE realizado = 'true' ORDER BY id_cambio DESC limit 0, 500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFilesNumRows(){

        $sql = "SELECT COUNT(*) AS total FROM archivos";

        $query = $this->db->prepare($sql);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }


    public function getFiles($start, $limit) {

        $sql = "SELECT * FROM archivos ORDER BY idrotul DESC limit  $start, $limit";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFilesByParam($param){

        $sql = "SELECT * FROM archivos WHERE ODT LIKE '%" . $param . "%' OR Cliente LIKE'%" . $param . "%' OR archivo LIKE '%" . $param . "%' OR Fecha LIKE '%" . $param . "%' limit 500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)){

            $result[] = $row;
        }

        return $result;
    }


    public function getProductsByParam($param) {

        $sql = "SELECT * FROM productos_catalogo WHERE status = 'A' and TipoProd LIKE '%" . $param . "%' OR Modelo LIKE '%" . $param . "%' OR Descripcion LIKE '%" . $param . "%' LIMIT 0,500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result=array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)){

            $result[] = $row;
        }

        return $result;
    }


    public function getInvitByParam($param) {

        $sql = "SELECT * FROM invitaciones WHERE TipoProd LIKE '%".$param."%' OR Modelo LIKE '%".$param."%' OR Descripcion LIKE '%".$param."%' LIMIT 0,500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)){

            $result[] = $row;
        }

        return $result;
    }


    public function getCambiosByParam($param, $filter) {

        $realizado = ($filter == 'Pendientes')? "'false'":"'true'";

        $sql = "SELECT c.*, u.nombre_usuario, t.nombre_tienda AS tienda FROM cambios c LEFT JOIN usuarios u ON u.id_usuario = c.usuario LEFT JOIN tiendas t ON t.id_tienda = u.id_tienda WHERE  c.realizado = $realizado AND (odt LIKE '%" . $param . "%' OR razon LIKE '%" . $param . "%' OR quien_autorizo LIKE '%" . $param . "%' OR observaciones LIKE '%" . $param . "%' OR porque_no_es_posible LIKE '%" . $param . "%' OR t.nombre_tienda LIKE '%" . $param . "%' OR u.nombre_usuario LIKE '%" . $param . "%' OR modelo LIKE '%" . $param . "%')  ORDER BY c.id_cambio DESC  LIMIT 0,500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)){

            $result[] = $row;
        }

        return $result;
    }


    // NO se usa la tabla info; está vacía!
    public function getInfoByParam($param, $tienda){

        $sql = "SELECT * FROM info WHERE IdPedido LIKE '%".$param."%' AND Tienda='$tienda' OR NodeOrden AND Tienda='$tienda' LIKE '%".$param."%' AND Tienda='$tienda' OR FechaPedido LIKE '%".$param."%' AND Tienda='$tienda' OR ClaveCliente LIKE '%".$param."%' AND Tienda='$tienda' OR FechaEntregaCliente LIKE '%".$param."%' AND Tienda='$tienda'  LIMIT 0,500";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)){

            $result[] = $row;
        }

        return $result;
    }

    // NO se usa; la tabla info está vacía!
    public function getInfoNumRows() {

        $sql   = "SELECT COUNT(*) AS total FROM info";
        $query = $this->db->prepare($sql);

        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);

        return $row['total'];
    }


    // la tabla info no se usa, está vacía!
    public function getInfoByStore($store, $start, $limit) {

        $sql = "SELECT * FROM info WHERE Tienda = '" . $store . "' limit  $start , $limit";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFacturasById($id){

        $id = intval($id);
        $sql = "SELECT archivo_xml, archivo_pdf from solicitud_factura where status = 'A' and id_factura =" . $id;
        $query = $this->db->prepare($sql);

        $query->execute();

        $result = array();

        if ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result = $row;
        }

        return $result;

    }


    public function uploadDatos(){

        $actualizacion = false;

        $filename = URL . "public/images/facturas";

        foreach ($_FILES as $row) {

            $id        = explode("-", key($_FILES));
            $factura   = $this->getFacturasById($id[1]);
            $archivo   = strval($row["tmp_name"]);
            $nombre    = strval($row['name']);
            $ubicacion = "public/images/facturas/" . $nombre;
            $extra = "";
            $idB = intval($id[1]);

            if( $factura['archivo_pdf'] || $factura['archivo_xml'] ) $extra = ", enviada=true";

            if( $id[0] == "pdf" )$sql = "UPDATE solicitud_factura set archivo_pdf='$ubicacion' $extra where id_factura = " . $idB;

            if( $id[0] == "xml" )$sql = "UPDATE solicitud_factura set archivo_xml='$ubicacion' $extra where id_factura = " . $idB;

            $query = $this->db->prepare($sql);

            try{

                $actualizacion = $query->execute();

                if( $actualizacion ) move_uploaded_file( $archivo, $ubicacion );

            } catch (Exception $ex) {

                return false;
            }
        }

        if( $actualizacion ) {

            return true;

        } else {

            return false;
        }
    }


    public function uploadFacturas() {

        $idCliente = intval($_POST['idCliente']);
        $evento    = strval($_POST['txtEvento']);
        $compra    = strval($_POST['txtOCompra']);
        $anticipo  = floatval($_POST['txtAnticipo']);
        $CFDI      = intval($_POST['optCFDI']);
        $mPago     = intval($_POST['optMPago']);
        $fPago     = intval($_POST['optFPago']);
        $fecha     = date("Y-m-d");
        $hora      = date("H:i:s");
        $factura   = json_decode($_POST['arrFactura']);
        $total     = floatval($_POST['txtTotal']);
        $error     = false;
        try{

            $this->db->beginTransaction();

            if( $anticipo > 0 ){

                $sql = "INSERT INTO solicitud_factura( id_cliente, fecha_realizacion, hora_realizacion, clave_evento, orden_compra, anticipo, monto_anticipo, monto_total, id_cfdi, id_metodopago, id_formapago) VALUES ( $idCliente, '$fecha', '$hora', '$evento', '$compra', true, $anticipo, $total, $CFDI, $mPago, $fPago ) ";
            }else{

                $sql = "INSERT INTO solicitud_factura( id_cliente, fecha_realizacion, hora_realizacion, clave_evento, orden_compra, monto_total, id_cfdi, id_metodopago, id_formapago) VALUES ( $idCliente, '$fecha', '$hora', '$evento', '$compra', $total, $CFDI, $mPago, $fPago ) ";
            }

            $query = $this->db->prepare($sql);
            $inserted1 = $query->execute();

            if( !$factura ) goto snFactura;

            $error = true;

            $sql1 = "SELECT max(id_factura) as id_factura from solicitud_factura";

            $query1 = $this->db->prepare($sql1);

            $query1->execute();
            $id = "";
            if ($row = $query1->fetch(PDO::FETCH_ASSOC)) {

                $id = $row['id_factura'];
            }

            for ( $i=0; $i < count($factura); $i++ ) {

                $odt         = strval($factura[$i][0]->value);
                $descripcion = self::getServicioByName(strval($factura[$i][1]->value));
                $idServicio = intval($descripcion[0]['id_servicio']);
                $cantidad    = intval($factura[$i][2]->value);
                $precio      = floatval($factura[$i][3]->value);
                $iva         = floatval($factura[$i][5]->value);
                $total       = floatval($factura[$i][6]->value);

                $sql2 = "INSERT INTO detalle_factura ( id_factura, odt, id_servicio, cantidad, precio, iva, monto ) VALUES ( '$id' , '$odt', '$idServicio', '$cantidad', '$precio', '$iva', '$total' )";

                $query2 = $this->db->prepare($sql2);
                $inserted2 = $query2->execute();
                if( $inserted2 ){

                    $error = false;
                }else{

                    $error = true;
                    break;
                }
            }

            snFactura:
            if( $error == false ){

                return true;
                $this->db->commit();
            }else{

                return false;
                $this->db->rollBack();
            }
        }catch( Exception $ex ){

            return false;
        };
    }


    public function getCfdi(){

        $sql_model = "SELECT * FROM cfdi WHERE status = 'A'";

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFormaPago(){

        $sql_model = "SELECT * FROM forma_pago WHERE status = 'A'";

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getMetodoPago(){

        $sql_model = "SELECT * FROM metodo_pago WHERE status = 'A'";

        $query = $this->db->prepare($sql_model);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


   public function checkClient($nombre){

        $sql = "SELECT * FROM clientes WHERE status = 'A' and nombre = '$nombre'";

        $query = $this->db->prepare($sql);
        $query->execute();

        if ($query->rowCount() > 0) {

            return true;
        } else {

            return false;
        }
    }


    public function getCatServicios(){

        $sql = "SELECT * FROM cat_servicio WHERE status = 'A'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getServicioByName($servicio){

        $sql = "SELECT * FROM cat_servicio WHERE status = 'A' and servicio = '$servicio'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        if ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }

        return $result;
    }


    public function getFacturasByFactura(){

        $idFactura = intval($_POST['idFactura']);

        $sql = "SELECT * FROM detalle_factura inner join cat_servicio on cat_servicio.id_servicio = detalle_factura.id_servicio WHERE id_factura = '$idFactura'";

        $query = $this->db->prepare($sql);
        $query->execute();

        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {

            $result[] = $row;
        }
        return $result;
    }

}
