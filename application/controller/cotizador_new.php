<?php

class Cotizador extends Controller {

    public function index() {

        session_start();

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

            header("Location:" . URL . 'login/');
        }
    }


    public function cajas() {

        session_start();

        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');

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

            if (isset($_GET['cliente'])) {

                $nombrecliente = $options_model->getClientInfo($_GET['cliente'],'nombre') . ' ' . $options_model->getClientInfo($_GET['cliente'],'apellido');

            } else {

                $nombrecliente = '--';
            }

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/cajas.php';
            require 'application/views/templates/footer.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function getOptions() {

        session_start();

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
                                    default:

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
                        default:
                            # code...
                            break;
                    }
                }

                $i++;

                $html .= '<button class="tab-btn-sumbit" onclick="closeModal();">Listo</button>';

                echo $html;
            }

            $html .= '<input class="cajas-form-submitter" type="submit" value="CALCULAR">';
        } else {

            header("Location:".URL.'login/');
        }
    }


    public function invitaciones() {

        session_start();

        $login         = $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');
        $login_model   = $this->loadModel('LoginModel');
        $ventas_model  = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            $title='Pendientes';

            if (isset($_GET['c'])) {

                $cliente       =$_GET['c'];
                $invitations   =$options_model->getInvitations();
                $rows          =$options_model->getAumentos();
                $update        =false;
                $nombrecliente =$options_model->getClientInfo($_GET['c'],'nombre') . ' ' . $options_model->getClientInfo($_GET['c'],'apellido');
            }else{

                $nombrecliente = '--';
            }

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/invitaciones.php';
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function detalles() {

        session_start();

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

                header("Location:" . URL . 'cotizador/clientes');
            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function saveInvitation(){

        session_start();
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

            if ($_POST['case']=='insert') {

                $saved = $ventas_model->newCotizacion($model, $q, $price, $cliente, $idp, $plista, $contenido, 'invitacion');

                if ($saved) {

                    $_SESSION['messages'] .= 'La informacion se guardo correctamente.';
                    $_SESSION['notification'] = 'success';
                    $_SESSION['result'] = 'LISTO:';
                    $response['message'] = '<div class="c-successs"><div></div><span>Exito: </span>Datos guardados correctamente!</div>';
                    $response['success'] = 'true';
                } else {

                    $response['success']='false';
                }
            } else {

                $updated = $ventas_model->updateCotizacion($model, $q, $price, $cliente, $idp, $plista, $contenido, 'invitacion', $_POST['id_cotizacion']);

                if ($updated) {

                    $_SESSION['messages'] .= 'La informacion se guardo correctamente.';
                    $_SESSION['notification'] = 'success';
                    $_SESSION['result'] = 'LISTO:';
                    $response['message'] = '<div class="c-successs"><div></div><span>Exito: </span>Datos guardados correctamente!</div>';
                    $response['success'] = 'true';
                } else {

                    $response['message'] = '<div class="c-fail"><div></div><span>Error: </span>Ocurrio un problema y no se guardo la informacion</div>';
                    $response['success'] = 'false';
                }
            }
        } else {

            $response['logged']='false';
            header("Location:" . URL . 'login/');
        }

        echo json_encode($response);
    }


    public function calcMerma() {

        session_start();

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


    // Checa si la ODT se va a maquila
    protected function rec_maquila($ancho, $largo) {

        $datox = floatval($ancho);
        $datoy = floatval($largo);

        $datox1 = intval(51);
        $datoy1 = intval(70);

        $datox2 = intval(72);
        $datoy2 = intval(102);

        if ( ($datox > $datox1 and $datox < $datox2) or ($datoy > $datoy1 and $datoy < $datoy2) ) {

            return true;
        } else {

            return false;
        }

    }


    // Redondea al entero superior siguiente
    protected function deltax($cant, $algo) {

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


    public function calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional) {

        $tiraje = intval($_POST['qty']);

        $merma_acabados = [];

        if ($tiraje < $cantidad_minima) {

            $cantidad_min  = intval($cantidad);
            $cantidad_adic = 0;
            $cantidad_tot  = intval($cantidad);
        } else {

            $delta_tmp = intval($tiraje - $cantidad_minima);

            $delta = self:: deltax_merma($delta_tmp, $por_cada_x);

            $cantidad_adic = intval($delta * $adicional);

            $cantidad_min  = intval($cantidad);
            $cantidad_tot  = intval($cantidad) + $cantidad_adic;
        }

        $merma_acabados[0] = $cantidad_min;
        $merma_acabados[1] = $cantidad_adic;
        $merma_acabados[2] = $cantidad_tot;

        return $merma_acabados;
    }


    // Falta indicar el id_modelo (Almeja = 1; Circular = 2; etc.)
    public function saveCaja() {

        session_start();

        $login         = $this->loadController('login');
        $login_model   = $this->loadModel('LoginModel');
        $options_model = $this->loadModel('OptionsModel');
        $ventas_model  = $this->loadModel('VentasModel');

        $id_usuario = $_SESSION['user']['id_usuario'];
        $id_usuario = intval($id_usuario);

        $id_tienda = $_SESSION['user']['id_tienda'];
        $id_tienda = intval($id_tienda);


        $cantidad        = 0;
        $costo_total     = 0;
        $costo_corte     = 0;
        $cantidad_offset = 0;

        $cantidad = $_POST["qty"];
        $cantidad = intval($cantidad);


        if (isset($_POST['submit'])) {

            if ($cantidad <= 0) {

                echo "Oops! Por favor capture todos los datos.";

                return false;
            }
        }

        $l_costo = true;


        $odt = strip_tags(trim($_POST['odt']));
        $odt = strtoupper($odt);
        $odt = strval($odt);

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

        $nombre_cliente = $_POST['nombre_cliente'];
        $nombre_cliente = strval($nombre_cliente);
        $nombre_cliente = trim($nombre_cliente);


        $aCalculos_temp = $_POST['aCalculos'];
        $aCalculos      = json_decode($aCalculos_temp, true);

        $x1 = $aCalculos['x1'];
        $x1 = floatval($x1);

        $y1 = $aCalculos['y1'];
        $y1 = floatval($y1);

        $f = $aCalculos['f'];
        $f = floatval($f);

        $k = $aCalculos['k'];
        $k = floatval($k);

        $B1 = $aCalculos['B1'];
        $B1 = floatval($B1);

        $Y1 = $aCalculos['Y1'];
        $Y1 = floatval($Y1);

        $B11 = $aCalculos['B11'];
        $B11 = floatval($B11);

        $Y11 = $aCalculos['Y11'];
        $Y11 = floatval($Y11);


        $aJson      = [];
        $aCortes    = [];

        $id_cliente = 0;
        $modelo     = 1;

        $aCliente   = $ventas_model->getClientByName($nombre_cliente);

        $id_cliente = $aCliente['id_cliente'];
        $id_cliente = intval($id_cliente);


        $descuento_pctje = $_POST['descuento_pctje'];
        $descuento_pctje = floatval($descuento_pctje);

        echo PHP_EOL . PHP_EOL . "(717) descuento_pctje: ";
        print_r($descuento_pctje);


        // insertar este dato si el grabado en la BD es correcto.
        // de lo contrario insertar "Error".
        $aJson['mensaje']           = "Correcto";
        $aJson['nomb_odt']          = trim(strval($_POST['odt']));

        $aJson['costo_odt']         = 0;
        $aJson['costo_subtotal']    = 0;
        $aJson['Utilidad']          = 0;
        $aJson['iva']               = 0;
        $aJson['comisiones']        = 0;
        $aJson['indirecto']         = 0;
        $aJson['ventas']            = 0;
        $aJson['descuento']         = 0;
        $aJson['descuento_pctje']   = $descuento_pctje;
        $aJson['costo_papeles']     = 0;
        $aJson['costo_cartones']    = 0;
        $aJson['costos_fijos']      = 0;
        $aJson['costo_impresiones'] = 0;
        $aJson['costo_acabados']    = 0;
        $aJson['costo_cierres']     = 0;
        $aJson['costo_bancos']      = 0;
        $aJson['costo_accesorios']  = 0;


        $aJson['modelo']         = intval($_POST['modelo']);
        $aJson['id_cliente']     = $id_cliente;
        $aJson['Nombre_cliente'] = utf8_decode($nombre_cliente);
        $aJson['id_usuario']     = $id_usuario;
        $aJson['tiraje']         = intval($_POST["qty"]);
        $aJson['id_tienda']      = $id_tienda;


        $cortes = json_decode($_POST['aCortes'], true);

        $aCortes['guarda_cajon']  = intval($cortes['guarda_cajon']);
        $aCortes['forro_cajon']   = intval($cortes['forro_cajon']);
        $aCortes['forro_cartera'] = intval($cortes['forro_cartera']);
        $aCortes['guarda']        = intval($cortes['guarda']);
        $aCortes['cajon']         = intval($cortes['cajon']);
        $aCortes['cartera']       = intval($cortes['cartera']);


        // Forro del Cajon

        // Impresiones Offset
        $IDopImpOfFcajon    = 0;
        $tintasselOfFcajon  = 0;
        $tipoOffFcajon      = 0;
        $precioImpOfFcajon  = 0;

        $id_papel_interior_cajon   = 0;
        $id_papel_exterior_cajon   = 0;
        $id_papel_exterior_cartera = 0;
        $id_papel_interior_cartera = 0;

        $id_papel_interior_cajon   = $_POST['papel_interior_cajon'];
        $id_papel_exterior_cajon   = $_POST['papel_exterior_cajon'];
        $id_papel_exterior_cartera = $_POST['papel_exterior_cartera'];
        $id_papel_interior_cartera = $_POST['papel_interior_cartera'];

        $id_papel_interior_cajon   = intval($id_papel_interior_cajon);
        $id_papel_exterior_cajon   = intval($id_papel_exterior_cajon);
        $id_papel_exterior_cartera = intval($id_papel_exterior_cartera);
        $id_papel_interior_cartera = intval($id_papel_interior_cartera);


        $papel_interior_cajon   = $options_model->getDatos($id_papel_interior_cajon);
        $papel_exterior_cajon   = $options_model->getDatos($id_papel_exterior_cajon);
        $papel_exterior_cartera = $options_model->getDatos($id_papel_exterior_cartera);
        $papel_interior_cartera = $options_model->getDatos($id_papel_interior_cartera);


        $aTr3_temp = json_decode($_POST['aTr3'], true);

        $aMerma = [];



/******************** Papel empalme ****************************/


        $aPapelEmp = [];

        $costo_unitario_papel_emp = floatval($papel_interior_cajon['costo_unitario']);

        $aPapelEmp["id_papel"]    = $id_papel_interior_cajon;

        $nombre_tmp = trim(strval($papel_interior_cajon["nombre"]));
        $aPapelEmp["nombre"]      = utf8_decode($nombre_tmp);

        $aPapelEmp["ancho"]       = floatval($papel_interior_cajon["ancho"]);
        $aPapelEmp["largo"]       = floatval($papel_interior_cajon["largo"]);
        $aPapelEmp['corte_ancho'] = $x1;
        $aPapelEmp['corte_largo'] = $y1;

        $aPapelEmp["costo_unitario"] = $costo_unitario_papel_emp;

        // Mermas de Impresion Empalme
        if (isset($_POST["aImp"]) and !empty($_POST["aImp"])) {

            $aImp_temp  = json_decode($_POST["aImp"], true);

            $aImp_count = count($aImp_temp);

            $Tipo_impresion = "";

            for ($i = 0; $i < $aImp_count; $i++) {

                $Tipo_impresion = "";

                $Tipo_impresion = $aImp_temp[$i]["Tipo_impresion"];
                $Tipo_impresion = trim(strval($Tipo_impresion));
            }

            if (is_array($aImp_temp)) {

                unset($aImp_temp);
            }
        }


        $aPapelEmp["tiraje"] = intval($_POST['qty']);
        $aPapelEmp["cortes"] = $aCortes['guarda_cajon'];


        $pliegos_emp = self:: deltax($_POST['qty'], $aCortes['guarda_cajon']);

        $aPapelEmp["pliegos"] = intval($pliegos_emp);

        $aPapelEmp["costo_tot_pliegos"] = floatval(intval($pliegos_emp) * $costo_unitario_papel_emp);

        $costo_odt = 0;

        $costo_odt = $aPapelEmp["costo_tot_pliegos"];


/*************** Papel Forro del cajon **********************/


       // Impresiones Offset

        $aPapelFCaj = [];

        $costo_unitario_papel_Forro_cajon = floatval($papel_exterior_cajon["costo_unitario"]);

        $aPapelFCaj["id_papel"]    = $id_papel_exterior_cajon;

        $nombre_tmp2 = trim(strval($papel_exterior_cajon["nombre"]));

        $aPapelFCaj["nombre"] = utf8_decode($nombre_tmp2);


        $aPapelFCaj["ancho"]       = floatval($papel_exterior_cajon["ancho"]);
        $aPapelFCaj["largo"]       = floatval($papel_exterior_cajon["largo"]);
        $aPapelFCaj['corte_ancho'] = $f;
        $aPapelFCaj['corte_largo'] = $k;

        $aPapelFCaj["costo_unitario"] = $costo_unitario_papel_Forro_cajon;


        // Mermas de Impresion Forro del Cajon
        if (isset($_POST["aImpFCaj"]) and !empty($_POST["aImpFCaj"])) {

            $aImpFCaj_temp  = json_decode($_POST["aImpFCaj"], true);

            $aImpFCaj_count = count($aImpFCaj_temp);

            $Tipo_impresion = "";

            for ($i = 0; $i < $aImpFCaj_count; $i++) {

                $Tipo_impresion = "";

                $Tipo_impresion = $aImpFCaj_temp[$i]["Tipo_impresion"];
                $Tipo_impresion = trim(strval($Tipo_impresion));
            }

            if (is_array($aImpFCaj_temp)) {

                unset($aImpFCaj_temp);
            }
        }


        $aPapelFCaj["tiraje"] = intval($_POST['qty']);

        $cantidad_temp = intval($_POST['qty']);


        $pliegos_fcaj = self:: deltax($cantidad_temp, $aCortes['forro_cajon']);

        $aPapelFCaj["cortes"]  = $aCortes['forro_cajon'];
        $aPapelFCaj["pliegos"] = intval($pliegos_fcaj);

        $aPapelFCaj['costo_tot_pliegos'] = floatval(intval($pliegos_fcaj) * $costo_unitario_papel_Forro_cajon);

/*
        $cero = intval($aPapelFCaj["cortes"]);
        $uno  = intval($aPapelFCaj['tiraje']);


        $num_pliegos_fcaj = self:: deltax($uno, $cero);
*/



/*********************** Papel Forro de la Cartera ********************/


       // Impresiones Offset
        $IDopImpOfFcartera   = 0;
        $IDopImpDigFcartera  = 0;
        $IDopImpSerFcartera  = 0;


        if (isset($_POST["IDopImpOfFcartera"]) and !empty($_POST["IDopImpOfFcartera"])) {

            $IDopImpOfFcartera = intval($_POST["IDopImpOfFcartera"]);
        }


        if (isset($_POST["IDopImpDigFcartera"]) and !empty($_POST["IDopImpDigFcartera"])) {

            $IDopImpDigFcartera = intval($_POST["IDopImpDigFcartera"]);
        }


        if (isset($_POST["IDopImpSerFcartera"]) and !empty($_POST["IDopImpSerFcartera"])) {

            $IDopImpSerFcartera = intval($_POST["IDopImpSerFcartera"]);
        }


        $cantidad_offset = intval($_POST['qty']);


        if ($IDopImpOfFcartera = 1) {

            $cantidad_offset = intval($_POST['qty']) + intval($_POST["offset"]);
        }


        if ($IDopImpDigFcartera = 2) {

            $cantidad_offset = intval($_POST['qty']) + intval($_POST["digital"]);
        }


        if ($IDopImpSerFcartera = 3) {

            $IDopImpSerFcartera = intval($_POST["qty"]) + intval($_POST["serigrafia"]);
        }



        // Forro de la Cartera
        $aPapelFCar = [];

        $papel_exterior_cartera_costo_unitario = floatval($papel_exterior_cartera["costo_unitario"]);

        $aPapelFCar["id_papel"]    = $id_papel_exterior_cartera;


        $nombre_temp2 = trim(strval($papel_exterior_cartera["nombre"]));
        $nombre_temp2 = utf8_decode($nombre_temp2);

        $aPapelFCar["nombre"] = $nombre_temp2;


        $aPapelFCar["ancho"]       = floatval($papel_exterior_cartera["ancho"]);
        $aPapelFCar["largo"]       = floatval($papel_exterior_cartera["largo"]);
        $aPapelFCar['corte_ancho'] = $B1;
        $aPapelFCar['corte_largo'] = $Y1;

        $aPapelFCar["costo_unitario"] = $papel_exterior_cartera_costo_unitario;

        $IDopImpOfFCar       = 0;
        $IDopImpDigFCar      = 0;
        $IDopImpSerFCar      = 0;
        $cantidad_offset     = 0;
        $cantidad_offset_dig = 0;
        $cantidad_offset_ser = 0;


        // Mermas de Impresion Forro de la Cartera
        if (isset($_POST["aImpFCar"]) and !empty($_POST["aImpFCar"])) {

            $aImpFCar_temp  = json_decode($_POST["aImpFCar"], true);

            $aImpFCar_count = count($aImpFCar_temp);

            $Tipo_impresion = "";

            for ($i = 0; $i < $aImpFCar_count; $i++) {

                $Tipo_impresion = $aImpFCar_temp[$i]["Tipo_impresion"];
                $Tipo_impresion = trim(strval($Tipo_impresion));
            }

            if (is_array($aImpFCar_temp)) {

                unset($aImpFCar_temp);
            }
        }


        $tiraje_temp = intval($_POST['qty']);


        $aPapelFCar["tiraje"] = $tiraje_temp;


        $pliegos_fcar = self:: deltax($_POST['qty'], $aCortes['forro_cartera']);

        $pliegos_fcar = intval($pliegos_fcar);


        $aPapelFCar["cortes"] = $aCortes['forro_cartera'];
        $aPapelFCar["pliegos"] = $pliegos_fcar;
        $aPapelFCar['costo_tot_pliegos'] = floatval($pliegos_fcar * $papel_exterior_cartera_costo_unitario);



/******************** Papel Guarda ******************************/


        $aPapelG = [];

        $papel_costo_unitario = floatval($papel_interior_cartera['costo_unitario']);

        $aPapelG["id_papel"]    = $id_papel_interior_cartera;


        $nombre_temp2 = trim(strval($papel_interior_cartera["nombre"]));
        $nombre_temp2 = utf8_decode($nombre_temp2);

        $aPapelG["nombre"] = $nombre_temp2;


        $aPapelG["ancho"]       = floatval($papel_interior_cartera["ancho"]);
        $aPapelG["largo"]       = floatval($papel_interior_cartera["largo"]);
        $aPapelG['corte_ancho'] = $B11;
        $aPapelG['corte_largo'] = $Y11;

        $aPapelG["costo_unitario"] = $papel_costo_unitario;


        $IDopImpOfG          = 0;
        $IDopImpDigG         = 0;
        $IDopImpSerG         = 0;
        $cantidad_offset     = 0;
        $cantidad_offset_dig = 0;
        $cantidad_offset_ser = 0;


        // Mermas Impresion de la Guarda
        if (isset($_POST["aImpG"]) and !empty($_POST["aImpG"])) {

            $aImpG_temp  = json_decode($_POST["aImpG"], true);

            $aImpG_count = count($aImpG_temp);

            $Tipo_impresion = "";


            for ($i = 0; $i < $aImpG_count; $i++) {

                $Tipo_impresion = "";

                $Tipo_impresion = $aImpG_temp[$i]["Tipo_impresion"];
                $Tipo_impresion = trim(strval($Tipo_impresion));
            }

            if (is_array($aImpG_temp)) {

                unset($aImpG_temp);
            }
        }


        $tiraje = intval($_POST['qty']);

        $pliegos_guarda = self:: deltax($tiraje, $aCortes['guarda']);

        $pliegos_guarda = intval($pliegos_guarda);

        $aPapelG["tiraje"]            = $tiraje;
        $aPapelG["cortes"]            = $aCortes['guarda'];
        $aPapelG["pliegos"]           = intval($pliegos_guarda);
        $aPapelG['costo_tot_pliegos'] = floatval($pliegos_guarda * $papel_costo_unitario);



/*********************** Carton Cajon *****************************/


        $punto = "";

        $punto = strpos($cajon, ".");

        if ($punto) {

            $cajon = floatval($cajon);
        } else {

            $cajon = intval($cajon);
        }


        $punto = "";

        $punto = strpos($cartera, ".");

        if ($punto) {

            $cartera = floatval($cartera);
        } else {

            $cartera = intval($cartera);
        }


        $cajon_tmp = $options_model->getCartonById($cajon);

        $id_cajon =  $cajon_tmp['id_papel'];
        $id_cajon = intval($id_cajon);

        $nombre_cajon = $cajon_tmp['nombre'];
        $nombre_cajon = trim($nombre_cajon);
        $nombre_cajon = utf8_decode($nombre_cajon);

        $num_cajon = $cajon_tmp['numcarton'];
        $num_cajon = floatval($num_cajon);

        $cajon_largo = $cajon_tmp['largo'];
        $cajon_largo = intval($cajon_largo);

        $cajon_ancho = $cajon_tmp['ancho'];
        $cajon_ancho = intval($cajon_ancho);

        $costo_unitario_cajon = $cajon_tmp['costo_unitario'];
        $costo_unitario_cajon = floatval($costo_unitario_cajon);


        if (is_array($cajon_tmp)) {

            unset($cajon_tmp);
        }


/******************* Carton Cartera ****************************/


        $cartera_tmp = $options_model->getCartonById($cartera);

        $id_cartera = $cartera_tmp['id_papel'];
        $id_cartera = intval($id_cartera);

        $nombre_cajon_cartera = $cartera_tmp['nombre'];
        $nombre_cajon_cartera = trim($nombre_cajon_cartera);

        $num_cajon_cartera = $cartera_tmp['numcarton'];
        $num_cajon_cartera = floatval($num_cajon_cartera);

        $cajon_cartera_largo = $cartera_tmp['largo'];
        $cajon_cartera_largo = intval($cajon_cartera_largo);

        $cajon_cartera_ancho = $cartera_tmp['ancho'];
        $cajon_cartera_ancho = intval($cajon_cartera_ancho);

        $costo_unitario_cartera = $cartera_tmp['costo_unitario'];
        $costo_unitario_cartera = floatval($costo_unitario_cartera);

        if (is_array($cartera_tmp)) {

            unset($cartera_tmp);
        }



/******************** Carton Cajon *****************************/

        $parte_temp = trim(strval($aTr3_temp[4]['Parte']));
        $parte_temp = utf8_decode($parte_temp);

        $papel_temp2 = trim(strval($aTr3_temp[4]['Papel']));
        $papel_temp2 = utf8_decode($papel_temp2);

        $aCartonCajon = [];

        $aCartonCajon["id_cajon"]          = $id_cajon;
        $aCartonCajon['Parte']             = $parte_temp;
        $aCartonCajon["num_cajon"]         = $num_cajon;
        $aCartonCajon['cantidad']          = intval($aTr3_temp[4]['Cantidad_Solicitada']);
        $aCartonCajon['papel']             = $papel_temp2;
        $aCartonCajon["nombre"]            = trim(strval($nombre_cajon));
        $aCartonCajon['precio']            = floatval($costo_unitario_cajon);
        $aCartonCajon['ancho']             = floatval($aTr3_temp[4]['Ancho']);
        $aCartonCajon['largo']             = floatval($aTr3_temp[4]['Largo']);
        $aCartonCajon['corte_ancho']       = floatval($aTr3_temp[4]['Corte_Ancho']);
        $aCartonCajon['corte_largo']       = floatval($aTr3_temp[4]['Corte_Largo']);
        $aCartonCajon['piezas_por_pliego'] = intval($aTr3_temp[4]['Piezas_por_Pliego']);
        $aCartonCajon['num_pliegos']       = intval($aTr3_temp[4]['Total_Pliegos']);

        $aCartonCajon['costo_tot_carton']  = floatval($aCartonCajon['num_pliegos'] * $aCartonCajon['precio']);




/********************** Carton Cartera ***************************/


        $aCartonCartera = [];

        $aCartonCartera["id_cartera"] = $id_cartera;
        $aCartonCartera['parte']      = trim(strval($aTr3_temp[5]['Parte']));
        $aCartonCartera["num_cajon"]  = $num_cajon_cartera;
        $aCartonCartera['cantidad']   = intval($aTr3_temp[5]['Cantidad_Solicitada']);
        $aCartonCartera['papel']      = trim(strval($aTr3_temp[5]['Papel']));
        $aCartonCartera["nombre"]     = trim(strval($nombre_cajon_cartera));
        $aCartonCartera['precio']     = floatval($costo_unitario_cartera);
        $aCartonCartera['ancho']      = floatval($aTr3_temp[5]['Ancho']);
        $aCartonCartera['largo']      = floatval($aTr3_temp[5]['Largo']);


        $aCartonCartera['corte_ancho'] = floatval($aTr3_temp[5]['Corte_Ancho']);
        $aCartonCartera['corte_largo'] = floatval($aTr3_temp[5]['Corte_Largo']);

        $aCartonCartera['piezas_por_pliego'] = intval($aTr3_temp[5]['Piezas_por_Pliego']);

        $aCartonCartera['num_pliegos'] = intval($aTr3_temp[5]['Total_Pliegos']);

        $aCartonCartera['costo_tot_carton'] = floatval($aCartonCartera['num_pliegos'] * $aCartonCartera['precio']);

        if (is_array($aTr3_temp)) {

            unset($aTr3_temp);
        }


/************** Inicia Costos fijos *************************/


// ************ Elaboracion de Cartera **********************


        $tiraje_ranurado = intval($_POST['qty']);

        $base_tmp = intval($_POST['base']);
        $alto_tmp = intval($_POST['alto']);

        //$db_tmp = $ventas_model->costo_elab_cartera("Forro de Cartera");
        $db_tmp = $ventas_model->costo_proceso("proc_cartera", "Forro de Cartera");

        $elab_car_forro_costo_unit = 0;

        foreach ($db_tmp as $row) {

            $elab_car_forro_ancho = floatval($row['ancho']);
            $elab_car_forro_largo = floatval($row['largo']);

            if ($base_tmp < $elab_car_forro_ancho and $alto_tmp < $elab_car_forro_largo) {

                $elab_car_forro_costo_unit = floatval($row['precio_unitario']);

                break;
            }
        }


        if ($elab_car_forro_costo_unit <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $elab_forro_car_costo = floatval($elab_car_forro_costo_unit * $tiraje_ranurado);


        //$db_tmp = $ventas_model->costo_elab_cartera("Guarda");
        $db_tmp = $ventas_model->costo_proceso("proc_cartera", "Guarda");


        $elab_car_guarda_costo_unit = 0;

        foreach ($db_tmp as $row) {

            $elab_car_guarda_ancho = floatval($row['ancho']);
            $elab_car_guarda_largo = floatval($row['largo']);

            if ($base_tmp < $elab_car_guarda_ancho and $alto_tmp < $elab_car_guarda_largo) {

                $elab_car_guarda_costo_unit = floatval($row['precio_unitario']);

                break;
            }
        }


        if ($elab_car_guarda_costo_unit <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $elab_car_guarda_costo = floatval($elab_car_guarda_costo_unit * $tiraje_ranurado);


        $aElab_Car = [];
        $aElab_G   = [];

        $aElab_Car['tiraje']           = $tiraje_ranurado;
        $aElab_Car['forro_costo_unit'] = $elab_car_forro_costo_unit;
        $aElab_Car['forro_car']        = $elab_forro_car_costo;
        $aElab_G['guarda_costo_unit']  = $elab_car_guarda_costo_unit;
        $aElab_G['guarda']             = $elab_car_guarda_costo;




// ****************** ranurado ********************************



        //$db_tmp = $ventas_model->costo_ranurado("Arreglo");
        $db_tmp = $ventas_model->costo_proceso("proc_ranurado", "Arreglo");


        $ranurado_arreglo_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $ranurado_arreglo_costo_unitario = $row['precio_unitario'];
            $ranurado_arreglo_costo_unitario = floatval($ranurado_arreglo_costo_unitario);
        }


        if ($ranurado_arreglo_costo_unitario <= 0) {

            $l_costo = false;
        }

        $ranurado_arreglo_costo = $ranurado_arreglo_costo_unitario;

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        //$db_tmp = $ventas_model->costo_ranurado("Por Ranura");
        $db_tmp = $ventas_model->costo_proceso("proc_ranurado", "Por Ranura");


        $ranurado_costo_unit_por_ranura = 0;

        foreach ($db_tmp as $row) {

            $ranurado_por_ranura_costo_unitario_min = floatval($row['tiraje_minimo']);
            $ranurado_por_ranura_costo_unitario_max = floatval($row['tiraje_maximo']);

            if ($tiraje_ranurado >= $ranurado_por_ranura_costo_unitario_min and $tiraje_ranurado <= $ranurado_por_ranura_costo_unitario_max) {

                $ranurado_costo_unit_por_ranura = $row['precio_unitario'];
                $ranurado_costo_unit_por_ranura = floatval($ranurado_costo_unit_por_ranura);

                break;
            }
        }


        if ($ranurado_costo_unit_por_ranura <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $costo_por_ranura = floatval($ranurado_costo_unit_por_ranura * $tiraje_ranurado);

        $costo_por_ranura_Fcar = floatval($ranurado_costo_unit_por_ranura * $tiraje_ranurado);


        if ($base_tmp <> $alto_tmp) {

            $ranurado_arreglo_costo = floatval(2 * $ranurado_arreglo_costo);
            $costo_por_ranura       = floatval(2 * $costo_por_ranura);
        }


        $aRanurado      = [];
        $aRanurado_Fcar = [];

        $aRanurado['tiraje']                = $tiraje_ranurado;
        $aRanurado['arreglo']               = $ranurado_arreglo_costo;
        $aRanurado['costo_unit_por_ranura'] = $ranurado_costo_unit_por_ranura;
        $aRanurado['costo_por_ranura']      = $costo_por_ranura;
        $aRanurado['costo_tot_ranurado']    = floatval($ranurado_arreglo_costo + $costo_por_ranura);


        $aRanurado_Fcar['costo_unit_por_ranura'] = $ranurado_costo_unit_por_ranura;
        $aRanurado_Fcar['costo_por_ranura'] = $costo_por_ranura_Fcar;



// ************ encuadernacion ******************************


        $enc_tiraje = intval($_POST['qty']);

        $aEncuadernacion      = [];
        $aEncuadernacion_Fcaj = [];


        $aEncuadernacion['tiraje'] = $enc_tiraje;


        $db_tmp = $ventas_model->costo_encuadernacion("Despunte");
        //$db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Despunte");

        $enc_despunte_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_despunte_costo_unitario = $row['precio_unitario'];
            $enc_despunte_costo_unitario = floatval($enc_despunte_costo_unitario);
        }


        if ($enc_despunte_costo_unitario <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $enc_costo_despunte = floatval($enc_despunte_costo_unitario * $enc_tiraje);

        $aEncuadernacion['despunte_costo_unitario']         = $enc_despunte_costo_unitario;
        $aEncuadernacion['despunte_de_esquinas_para_cajon'] = $enc_costo_despunte;



        $db_tmp = $ventas_model->costo_encuadernacion("Forrado");
        //$db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Forrado");

        $enc_forrado_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_forrado_costo_unitario = $row['precio_unitario'];
            $enc_forrado_costo_unitario = floatval($enc_forrado_costo_unitario);
        }


        if ($enc_forrado_costo_unitario <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $enc_costo_forrado_cajon = floatval($enc_forrado_costo_unitario);

        $aEncuadernacion_Fcaj['costo_unit_forrado_cajon'] = $enc_forrado_costo_unitario;
        $aEncuadernacion_Fcaj['forrado_de_cajon'] = $enc_costo_forrado_cajon;


        $db_tmp = $ventas_model->costo_encuadernacion("Arreglo");
        //$db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Arreglo");

        $enc_arreglo_forrado_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_arreglo_forrado_costo_unitario = $row['precio_unitario'];
            $enc_arreglo_forrado_costo_unitario = floatval($enc_arreglo_forrado_costo_unitario);

            $enc_arreglo_forrado_tiraje_min = intval($row['tiraje_minimo']);
            $enc_arreglo_forrado_tiraje_max = intval($row['tiraje_maximo']);
        }


        if ($enc_arreglo_forrado_costo_unitario <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $enc_arreglo_forrado = $enc_arreglo_forrado_costo_unitario;

        $aEncuadernacion_Fcaj['arreglo_de_forrado_de_cajon'] = $enc_arreglo_forrado;



        //$db_tmp = $ventas_model->costo_encuadernacion("Encajada");
        $db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Encajada");

        $enc_encajada_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_encajada_costo_unitario = $row['precio_unitario'];
            $enc_encajada_costo_unitario = floatval($enc_encajada_costo_unitario);
        }


        if ($enc_encajada_costo_unitario <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }

        $enc_costo_encajada = floatval($enc_encajada_costo_unitario * $enc_tiraje);


        $aEncuadernacion['encajada_costo_unitario'] = $enc_encajada_costo_unitario;
        $aEncuadernacion['encajada'] = $enc_costo_encajada;


        $db_tmp = $ventas_model->costo_encuadernacion("Empalme");
        //$db_tmp = $ventas_model->costo_proceso("proc_encuadernacion", "Empalme");

        $enc_empalme_cajon_costo_unitario = 0;

        foreach ($db_tmp as $row) {

            $enc_empalme_cajon_costo_unitario = $row['precio_unitario'];
            $enc_empalme_cajon_costo_unitario = floatval($enc_empalme_cajon_costo_unitario);
        }


        if ($enc_empalme_cajon_costo_unitario <= 0) {

            $l_costo = false;
        }

        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $enc_costo_empalme_cajon = floatval($enc_empalme_cajon_costo_unitario * $enc_tiraje);


        $aEncuadernacion_Fcaj['empalme_cajon_costo_unitario'] = $enc_empalme_cajon_costo_unitario;
        $aEncuadernacion_Fcaj['empalme_de_cajon'] = $enc_costo_empalme_cajon;


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


        $tiraje = intval($_POST['qty']);

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

        $enc_cortes = json_decode($_POST['aCortes'], true);

        $enc_cortes_fcaj = intval($enc_cortes['forro_cajon']);

        $aMerma_enc_Fcaj['cortes_por_pliego'] = $enc_cortes_fcaj;

        $tot_pliegos_merma_enc = self:: deltax($merma_tot, $enc_cortes_fcaj);


        $id_papel_exterior_cajon = intval($_POST['papel_exterior_cajon']);



        $enc_costo_unit_fcaj_tmp = $ventas_model->getPrecioPapelById($id_papel_exterior_cajon);

        $enc_costo_unit_fcaj = floatval($enc_costo_unit_fcaj_tmp);

        if (is_array($enc_costo_unit_fcaj_tmp)) {

            unset($enc_costo_unit_fcaj_tmp);
        }


        $aMerma_enc_Fcaj['merma_tot_pliegos'] = $tot_pliegos_merma_enc;
        $aMerma_enc_Fcaj['costo_unit_merma'] = $enc_costo_unit_fcaj;
        $aMerma_enc_Fcaj['costo_tot_pliegos_merma'] = floatval($enc_costo_unit_fcaj * $tot_pliegos_merma_enc);


        $aEncuadernacion_Fcaj['mermas'] = $aMerma_enc_Fcaj;

        if (is_array($aMerma_enc_Fcaj)) {

            unset($aMerma_enc_Fcaj);
        }


        $aEncuadernacion['costo_tot_proceso'] = $enc_costo_despunte + $enc_costo_forrado_cajon + $enc_arreglo_forrado + $enc_costo_encajada + $enc_costo_empalme_cajon;



/************** Termina Costos fijos *************************/



/******************* proceso Impresion ******************************/


        $Tipo_proceso = 0;
        $num_tintas   = 0;
        $tipo_imp     = 0;


        // Empalme
        $Tipo_proceso_tmp = json_decode($_POST['aImp'], true);


        // Forro del Cajon
        $Tipo_proceso_FCaj_tmp = json_decode($_POST['aImpFCaj'], true);


        // Forro de la Cartera
        $Tipo_proceso_FCar_tmp   = json_decode($_POST['aImpFCar'], true);


        // Guarda
        $Tipo_proceso_Guarda_tmp = json_decode($_POST['aImpG'], true);



// =========== Inicia los calculos de Empalme ===========


        $es_offset     = false;
        $es_digital    = false;
        $es_serigrafia = false;

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

        $aOffEmp      = [];
        $aOff_maq_Emp = [];
        $aDigEmp      = [];
        $aSerEmp      = [];
        $aHSEmp       = [];
        $aGrabEmp     = [];


        // Empalme
        $Tipo_proceso_tmp = json_decode($_POST['aImp'], true);

        $num_rows = count($Tipo_proceso_tmp);


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
                    $cantidad_offset = $cantidad;

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];


                    $nombre_tipo_offset = trim(strval($nombre_tipo_offset));

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);


                    //$aMerma_OffEmp_tmp = self:: calculo_merma_offset($num_tintas);
                    $Merma_OffEmp_tmp = $ventas_model->costo_offset_color_merma();

                    foreach ($Merma_OffEmp_tmp as $row) {

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

                    if (is_array($Merma_OffEmp_tmp)) {

                        unset($Merma_OffEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

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

                        $cant_adic = $cantidad_adic / $por_cada_x;

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


                    $aMerma_OffEmp = [];

                    $aMerma_OffEmp['merma_min']  = $merma_color;
                    $aMerma_OffEmp['merma_adic'] = $merma_color_adic;
                    $aMerma_OffEmp['merma_tot']  = $merma_tot;

                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelEmp['cortes']);


                    $tot_pliegos_merma_offset_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_emp_merma = floatval($aPapelEmp["costo_unitario"]);

                    $cortes_papel_emp = intval($aPapelEmp["costo_unitario"]);

                    $costo_tot_merma_offset = floatval($tot_pliegos_merma_offset_tmp * $costo_unit_papel_emp_merma);

                    $aMerma_OffEmp['cortes_por_pliego']  = $cortes_por_pliego;
                    $aMerma_OffEmp['merma_tot_pliegos']  = intval($tot_pliegos_merma_offset_tmp);

                    $aMerma_OffEmp['costo_unit_papel_merma'] = $costo_unit_papel_emp_merma;

                    $aMerma_OffEmp['costo_tot_pliegos_merma'] = $costo_tot_merma_offset;


                    //$db_tmp = $ventas_model->costo_offset("Corte");
                    $db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");

                    $corte_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $corte_costo_unitario = $row['costo_unitario'];
                        $corte_costo_unitario = floatval($corte_costo_unitario);

                        $corte_por_millar = $row['por_millar'];
                        $corte_por_millar = floatval($corte_por_millar);
                    }


                    if ($corte_costo_unitario <= 0) {

                        $l_costo = false;
                    }

                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $delta = self:: deltax($cantidad_offset, $corte_por_millar);

                    $costo_corte = $corte_costo_unitario * $delta;
                    $costo_corte = floatval($costo_corte);

                    $aOffEmp[$i]["tipo"]                 = $nombre_tipo_offset;
                    $aOffEmp[$i]["cantidad"]             = intval($_POST['qty']);
                    $aOffEmp[$i]["num_tintas"]           = $num_tintas;
                    $aOffEmp[$i]["mermas"]               = $aMerma_OffEmp;

                    $aOffEmp[$i]["corte_costo_unitario"] = $corte_costo_unitario;
                    $aOffEmp[$i]["corte_por_millar"]     = $corte_por_millar;
                    $aOffEmp[$i]["costo_corte"]          = $costo_corte;

                    if (is_array($aMerma_OffEmp)) {

                        unset($aMerma_OffEmp);

                    }


                    $papel_empalme_corte_ancho = $aPapelEmp['corte_ancho'];
                    $papel_empalme_corte_largo = $aPapelEmp['corte_largo'];


                    //$offset_merma_tmp = $ventas_model->getCotizaMermaOffset();

                    $es_maquila = self:: rec_maquila($papel_empalme_corte_ancho, $papel_empalme_corte_largo);


                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {


                            // Laminas
                            //$db_tmp = $ventas_model->costo_offset("Laminas");
                            $db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas");

                            $costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $costo_unitario_laminas = $row['costo_unitario'];
                                $costo_unitario_laminas = floatval($costo_unitario_laminas);
                            }


                            if ($costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_laminas_offset = ($costo_unitario_laminas * $num_tintas);
                            $costo_laminas_offset = floatval($costo_laminas_offset);


                            $aOffEmp[$i]["costo_unitario_laminas"] = $costo_unitario_laminas;

                            $aOffEmp[$i]["costo_tot_laminas"] = $costo_laminas_offset;



                            // Arreglo
                            //$db_tmp = $ventas_model->costo_offset("Arreglo");
                            $db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo");


                            $arreglo_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_tiraje_max = $row['tiraje_maximo'];
                                $arreglo_tiraje_max = intval($arreglo_tiraje_max);

                                $arreglo_costo_unitario = $row['costo_unitario'];
                                $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                            }


                            if ($arreglo_costo_unitario <= 0) {

                                $l_costo = false;
                            }

                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            if ($cantidad_offset < $arreglo_tiraje_max) {

                                $costo_arreglo_offset = ($arreglo_costo_unitario * $num_tintas);
                                $costo_arreglo_offset = floatval($costo_arreglo_offset);
                            } else {

                                $arreglo_costo_unitario = 0;
                                $costo_arreglo_offset   = 0;
                            }


                            $aOffEmp[$i]["costo_unitario_arreglo"] = $arreglo_costo_unitario;
                            $aOffEmp[$i]["costo_tot_arreglo"] = $costo_arreglo_offset;


                            // Tiro
                            //$db_tmp = $ventas_model->costo_offset("Tiro");
                            $db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro");


                            $costo_unitario_tiro = 0;

                            foreach ($db_tmp as $row) {

                                $tiro_por_millar = $row['por_millar'];
                                $tiro_por_millar = intval($tiro_por_millar);

                                $costo_unitario_tiro = $row['costo_unitario'];
                                $costo_unitario_tiro = floatval($costo_unitario_tiro);
                            }


                            if ($costo_unitario_tiro <= 0) {

                                $l_costo = false;
                            }

                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $merma_offset_color = $ventas_model->costo_offset_color_merma();

                            // revisar y corregir este for
                            foreach ($merma_offset_color as $row) {

                                $cantidad_minima = intval($row['cantidad_minima']);
                                $c_4colores = intval($row['c_4colores']);
                                $c_3colores = intval($row['c_3colores']);
                                $c_2colores = intval($row['c_2colores']);
                                $c_1color   = intval($row['c_1color']);
                                $por_cada_x = intval($row['por_cada_x']);

                                $adicional_4colores = intval($row['adicional_4colores']);
                                $adicional_3colores = intval($row['adicional_3colores']);
                                $adicional_2colores = intval($row['adicional_2colores']);
                                $adicional_1color = intval($row['adicional_1color']);
                            }

                            if (is_array($merma_offset_color)) {

                                unset($merma_offset_color);
                            }


                            $cantidad_offset_tmp = intval($_POST['qty']);

                            if ($cantidad_offset_tmp < $cantidad_minima) {

                                if ($num_tintas >= 1) {

                                    switch ($num_tintas) {

                                        case 1:

                                            $cantidad_color_merma = intval($row['c_1color']);

                                            break;
                                    }
                                }
                            } else {

                                $costo_tiro_offset = 0;
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_por_millar);

                            $costo_tiro_offset = ($costo_unitario_tiro * $alfa * $num_tintas);
                            $costo_tiro_offset = floatval($costo_tiro_offset);


                            $costo_proceso = floatval($costo_corte + $costo_laminas_offset + $costo_arreglo_offset +$costo_tiro_offset);

                            $aOffEmp[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;
                            $aOffEmp[$i]["costo_tot_tiro"] = $costo_tiro_offset;
                            $aOffEmp[$i]["costo_tot_proceso"] = $costo_proceso;
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $db_tmp = $ventas_model->costo_offset("Laminas_Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas_Pantone");

                            $pantone_costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_costo_unitario_laminas = $row['costo_unitario'];
                                $pantone_costo_unitario_laminas = floatval($pantone_costo_unitario_laminas);
                            }


                            if ($pantone_costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }

                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $aOffEmp[$i]['costo_unitario_laminas'] = $pantone_costo_unitario_laminas;

                            $costo_tot_laminas = floatval($pantone_costo_unitario_laminas * $num_tintas);

                            $aOffEmp[$i]['costo_tot_laminas'] = $costo_tot_laminas;



                            // Arreglo de Pantone
                            $db_tmp = $ventas_model->costo_offset("Arreglo de Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo de Pantone");

                            $arreglo_pantone_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_pantone_costo_unitario = $row['costo_unitario'];

                                $arreglo_pantone_costo_unitario = floatval($arreglo_pantone_costo_unitario);
                            }


                            if ($arreglo_pantone_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_tot_arreglo_pantone = ($arreglo_pantone_costo_unitario * $num_tintas);

                            $costo_tot_arreglo_pantone = floatval($costo_tot_arreglo_pantone);

                            $aOffEmp[$i]["costo_unitario_arreglo"] = $arreglo_pantone_costo_unitario;

                            $aOffEmp[$i]["costo_tot_arreglo"] = $costo_tot_arreglo_pantone;

                            $costo_offset_arreglo_pantone = $costo_tot_arreglo_pantone;


                            // Tiro
                            $db_tmp = $ventas_model->costo_offset("Tiro Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro Pantone");


                            $costo_unitario_pantone = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_tiraje_max = $row['tiraje_maximo'];
                                $pantone_tiraje_max = intval($pantone_tiraje_max);

                                $tiro_pantone_por_millar = $row['por_millar'];
                                $tiro_pantone_por_millar = intval($tiro_pantone_por_millar);

                                $costo_unitario_pantone = $row['costo_unitario'];
                                $costo_unitario_pantone = floatval($costo_unitario_pantone);

                                $pantone_tiro = $row['costo_unitario'];
                                $pantone_tiro = floatval($pantone_tiro);

                                $por_millar = intval($row['por_millar']);
                            }


                            if ($costo_unitario_pantone <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $cantidad_offset = $_POST['qty'];
                            $cantidad_offset = intval($cantidad_offset);

                            $alfa = self:: deltax($cantidad_offset, $tiro_pantone_por_millar);

                            $costo_pantone_offset = 0;

                            $costo_pantone_offset = ($costo_unitario_pantone * $alfa * $num_tintas);

                            $costo_pantone_offset = floatval($costo_pantone_offset);


                            $aOffEmp[$i]["costo_unitario_tiro"] = $costo_unitario_pantone;


                            // Tirro Pantone
                            $aOffEmp[$i]['costo_unitario_tiro'] = $pantone_tiro;

                            //$delta = $ventas_model->deltax($cantidad_offset, $por_millar);

                            $delta = self:: deltax($cantidad_offset, $por_millar);

                            $costo_tot_tiro = floatval($pantone_tiro * $delta);

                            $aOffEmp[$i]['costo_tot_tiro'] = $costo_tot_tiro;

                            $costo_proceso = floatval($costo_corte + $costo_tot_laminas + $costo_tot_arreglo_pantone + $costo_tot_tiro);

                            $aOffEmp[$i]['costo_tot_proceso'] = $costo_proceso;
                        }
                    } else {        // si es maquila

                        $aOff_maq_Emp[$i]["Tipo"]           = $nombre_tipo_offset;
                        $aOff_maq_Emp[$i]["cantidad"]       = $cantidad_offset;
                        $aOff_maq_Emp[$i]["num_tintas_maq"] = intval($num_tintas);


                        // Maquila lamina
                        $db_tmp = $ventas_model->costo_offset("Maquila lamina");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila lamina");

                        $costo_unitario_laminas_maquila = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_laminas_maquila = $row['costo_unitario'];
                            $costo_unitario_laminas_maquila = floatval($costo_unitario_laminas_maquila);
                        }


                        if ($costo_unitario_laminas_maquila <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_laminas = $costo_unitario_laminas_maquila * $num_tintas;
                        $costo_maquila_laminas = floatval($costo_maquila_laminas);


                        $aOff_maq_Emp[$i]["costo_unitario_laminas_maq"] = $costo_unitario_laminas_maquila;

                        $aOff_maq_Emp[$i]["costo_laminas_maq"] = $costo_maquila_laminas;


                        // Maquila arreglo
                        $db_tmp = $ventas_model->costo_offset("Maquila Arreglo");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila Arreglo");

                        $costo_unitario_maquila_arreglo = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_maquila_arreglo = $row['costo_unitario'];
                            $costo_unitario_maquila_arreglo = floatval($costo_unitario_maquila_arreglo);
                        }


                        if ($costo_unitario_maquila_arreglo <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_arreglo = $costo_unitario_maquila_arreglo * $num_tintas;
                        $costo_maquila_arreglo = floatval($costo_maquila_arreglo);


                        $aOff_maq_Emp[$i]["costo_unitario_arreglo_maq"] = $costo_unitario_maquila_arreglo;

                        $aOff_maq_Emp[$i]["costo_arreglo_maq"] = $costo_maquila_arreglo;


                        if ($nombre_tipo_offset == "Seleccion") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila");


                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }

                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $costo_proceso_maq = floatval($costo_maquila_laminas + $costo_maquila_arreglo + $costo_maquila);

                            $aOff_maq_Emp[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_Emp[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_Emp[$i]["costo_tot_maquila"] = $costo_maquila;
                            $aOff_maq_Emp[$i]["costo_tot_proceso_maquila"] = $costo_proceso_maq;
                        }


                        if ($nombre_tipo_offset == "Pantone") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila Pantone");


                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }

                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $costo_proceso_maq = floatval($costo_maquila_laminas + $costo_maquila_arreglo + $costo_maquila);


                            $aOff_maq_Emp[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_Emp[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_Emp[$i]["costo_tot_maquila"] = $costo_maquila;

                            $aOff_maq_Emp[$i]["costo_tot_proceso_maquila"] = $costo_proceso_maq;
                        }
                    }
                }

                if ($Nombre_proceso === "Digital") {

                    $es_digital         = true;
                    $nombre_tipo_offset = "Seleccion";


                    $costo_unitario_digital = 0;
                    $merma_digital          = 0;
                    $cantidad_digital       = 0;


                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $merma_digital = $_POST['digital'];
                    $merma_digital = intval($merma_digital);

                    $cantidad_digital = $cantidad;
                    $cantidad_digital = intval($cantidad_digital);


                    $delta = self:: deltax($cantidad_digital, 1);

                    $cantidad_digital = $delta;

                    $digital_db_rango = $ventas_model->costo_digital_rango("frente");

                    $es_maquila = 0;
                    $tiraje_min = 0;
                    $tiraje_max = 0;
                    foreach ($digital_db_rango as $row) {

                        $es_maquila = $row['es_maquila'];
                        $tiraje_min = $row['tiraje_minimo'];
                        $tiraje_max = $row['tiraje_maximo'];

                        $es_maquila = intval($es_maquila);
                        $tiraje_min = intval($tiraje_min);
                        $tiraje_max = intval($tiraje_max);

                        if ($cantidad_digital >= $tiraje_min and $cantidad_digital <= $tiraje_max and !$es_maquila) {

                            $costo_unitario_digital = 0;

                            $costo_unitario_digital = $row['costo_unitario'];
                            $costo_unitario_digital = floatval($row['costo_unitario']);

                            break;
                        }
                    }


                    if (is_array($digital_db_rango)) {

                        unset($digital_db_rango);
                    }


                    $costo_tot_digital = $costo_unitario_digital * $cantidad_digital;
                    $costo_tot_digital = floatval($costo_tot_digital);


                    $aDigEmp[$i]["cantidad"]       = $cantidad_digital;
                    $aDigEmp[$i]["costo_unitario"] = $costo_unitario_digital;


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


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_tmp  = 1;
                    $num_tintas_adic = 1;

                    $cantidad_color_merma = $cantidad;


                    if ($tiraje < $cantidad_minima) {

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = 0;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    } else {

                        $cantidad_adic = $tiraje - $cantidad_minima;

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = $cant_adic * $adicional;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_DigEmp = [];

                    $aMerma_DigEmp['merma_min']  = $merma_color;
                    $aMerma_DigEmp['merma_adic'] = $merma_color_adic;
                    $aMerma_DigEmp['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelEmp['cortes']);


                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelEmp["costo_unitario"]);
                    $cortes_papel_emp       = intval($costo_unitario_digital);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_DigEmp['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_DigEmp['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_DigEmp['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_DigEmp['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aDigEmp[$i]["mermas"] = $aMerma_DigEmp;

                    if (is_array($aMerma_DigEmp)) {

                        unset($aMerma_DigEmp);
                    }


                    $aDigEmp[$i]["costo_tot"]         = $costo_tot_digital;
                    $aDigEmp[$i]["costo_tot_proceso"] = $costo_tot_digital;
                }


                if ($Nombre_proceso === "Serigrafia") {

                    $es_serigrafia = true;

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $merma_serigrafia = $_POST['serigrafia'];
                    $merma_serigrafia = intval($merma_serigrafia);

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $aImp_tmp = json_decode($_POST['aImp'], true);

                    $tipo_offset_serigrafia = $aImp_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $num_tintas = $aImp_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cantidad_serigrafia = $cantidad;

                    $rango_db_tmp = $ventas_model->costo_serigrafia_rango("cantidad");


                    $costo_unitario_tiro = 0;
                    $por_cada            = 0;
                    $delta               = 0;

                    // corregir deltax en todos los casos
                    foreach ($rango_db_tmp as $row) {

                        $tiraje_min = intval($row['tiraje_minimo']);
                        $tiraje_max = intval($row['tiraje_maximo']);

                        if ($cantidad_serigrafia >= $tiraje_min and $cantidad_serigrafia <= $tiraje_max) {

                            $costo_unitario_tiro = floatval($row['costo_unitario']);
                            $por_cada = intval($row['por_cada']);

                            $delta = self:: deltax($cantidad_serigrafia, $por_cada);

                            break;
                        }
                    }

                    if (is_array($rango_db_tmp)) {

                        unset($rango_db_tmp);
                    }


                    $costo_tiro = ($costo_unitario_tiro * $delta * $num_tintas);
                    $costo_tiro = floatval($costo_tiro);


                    // Arreglo
                    $arreglo_db_tmp = $ventas_model->costo_arreglo_serigrafia("Arreglo");

                    $costo_arreglo_seri = $arreglo_db_tmp['costo_unitario'];


                    if (is_array($arreglo_db_tmp)) {

                        unset($arreglo_db_tmp);
                    }


                    $costo_unitario_arreglo_serigrafia = floatval($costo_arreglo_seri);

                    $costo_arreglo_serigrafia = $costo_unitario_arreglo_serigrafia * $num_tintas;
                    $costo_arreglo_serigrafia = floatval($costo_arreglo_serigrafia);

                    $costo_total_serigrafia = $costo_tiro + $costo_arreglo_serigrafia;
                    $costo_total_serigrafia = floatval($costo_total_serigrafia);


                    $costo_proceso = floatval($costo_arreglo_serigrafia + $costo_tiro);

                    $aSerEmp[$i]["tipo"]       = $tipo_offset_serigrafia;
                    $aSerEmp[$i]["cantidad"]   = $cantidad;
                    $aSerEmp[$i]["num_tintas"] = $num_tintas;


                    $Merma_SerEmp_tmp = $ventas_model->getCotizaMermaSerigrafia();

                    foreach ($Merma_SerEmp_tmp as $row) {

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

                    if (is_array($Merma_SerEmp_tmp)) {

                        unset($Merma_SerEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_adic = $num_tintas - 4;


                    if ($num_tintas >= 1 and $num_tintas <= 4) {

                        // $cantidad_color_merma
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
                            $merma_tot        = $merma_color;
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

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        if ($num_tintas >= 1 and $num_tintas <= 4) {

                            $merma_color      = $cantidad_color_merma;
                            $merma_color_adic = $cant_adic * $cantidad_color_merma;
                            $merma_tot        = $merma_color + $merma_color_adic;
                        } else {

                            $merma_color      = $c_4colores;

                            $merma_color_adic = (($num_tintas - 4) * $adicional_1color * $cant_adic);

                            $merma_tot        = $merma_color + $merma_color_adic;
                        }
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_SerEmp = [];

                    $aMerma_SerEmp['merma_min']  = $merma_color;
                    $aMerma_SerEmp['merma_adic'] = $merma_color_adic;
                    $aMerma_SerEmp['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelEmp['cortes']);


                    $tot_pliegos_merma_ser_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_emp_merma = floatval($aPapelEmp["costo_unitario"]);

                    $cortes_papel_emp = intval($aPapelEmp["costo_unitario"]);

                    $costo_tot_merma_ser = floatval($tot_pliegos_merma_ser_tmp * $costo_unit_papel_emp_merma);

                    $aMerma_SerEmp['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_SerEmp['merma_tot_pliegos'] = intval($tot_pliegos_merma_ser_tmp);

                    $aMerma_SerEmp['costo_unit_papel_merma'] = $costo_unit_papel_emp_merma;
                    $aMerma_SerEmp['costo_tot_pliegos_merma'] = $costo_tot_merma_ser;


                    $aSerEmp[$i]["mermas"] = $aMerma_SerEmp;

                    if (is_array($aMerma_SerEmp)) {

                        unset($aMerma_SerEmp);
                    }


                    $aSerEmp[$i]["costo_unitario_arreglo"] = $costo_unitario_arreglo_serigrafia;

                    $aSerEmp[$i]["costo_arreglo"] = $costo_arreglo_serigrafia;

                    $aSerEmp[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                    $aSerEmp[$i]["costo_tiro"] = $costo_tiro;

                    $aSerEmp[$i]["costo_tot_proceso"] = $costo_proceso;
                }
            }
        }


        if (is_array($Tipo_proceso_tmp)) {

            unset($Tipo_proceso_tmp);
        }


        $cantidad = $_POST['qty'];
        $cantidad = intval($cantidad);

        $cantidad_offset = $cantidad;


        // costo de corte
        //$db_tmp = $ventas_model->costo_offset("Corte");
        $db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");

        $costo_unitario_corte   = 0;
        $costo_corte_por_millar = 0;

        foreach ($db_tmp as $row) {

            $costo_unitario_corte = $row['costo_unitario'];
            $costo_unitario_corte = floatval($costo_unitario_corte);

            $costo_corte_por_millar = $row['por_millar'];
            $costo_corte_por_millar = intval($costo_corte_por_millar);
        }


        if ($costo_unitario_corte <= 0) {

            $l_costo = false;
        }


        if ($costo_corte_por_millar <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $delta = 0;

        $delta = self:: deltax($cantidad_offset, $costo_corte_por_millar);

        $costo_corte = $costo_unitario_corte * $delta;
        $costo_corte = floatval($costo_corte);

        $aJson['costo_corte']   = $costo_corte;
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

            $aJson['OffEmp'] = $aOffEmp;

            if (is_array($aOffEmp)) {

                unset($aOffEmp);
            }
        }

        if (count($aOff_maq_Emp) > 0) {

            $aJson['Off_maq_Emp'] = $aOff_maq_Emp;

            if (is_array($aOff_maq_Emp)) {

                unset($aOff_maq_Emp);
            }
        }

        if (count($aDigEmp) > 0) {

            $aJson['DigEmp'] = $aDigEmp;

            if (is_array($aDigEmp)) {

                unset($aDigEmp);
            }
        }

        if (count($aSerEmp) > 0) {

            $aJson['SerEmp'] = $aSerEmp;

            if (is_array($aSerEmp)) {

                unset($aSerEmp);
            }
        }



// =========== Termina los calculos de Empalme ===========




// =========== Inicia los calculos Forro del Cajon ===========


        $aJsonFcaj = [];

        $es_offset     = false;
        $es_digital    = false;
        $es_serigrafia = false;

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

        $aOffFCaj      = [];
        $aOff_maq_FCaj = [];
        $aDigFCaj      = [];
        $aSerFCaj      = [];


        // Forro del Cajon
        $Tipo_proceso_FCaj_tmp = json_decode($_POST['aImpFCaj'], true);

        $num_rows = count($Tipo_proceso_FCaj_tmp);

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

                $Nombre_proceso = $Tipo_proceso_FCaj_tmp[$i]["Tipo_impresion"];

                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    // merma offset
                    $cantidad_offset = $cantidad;

                    $nombre_tipo_offset = $Tipo_proceso_FCaj_tmp[$i]['tipo_offset'];

                    $nombre_tipo_offset = trim(strval($nombre_tipo_offset));

                    $num_tintas = $Tipo_proceso_FCaj_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $db_tmp = $ventas_model->costo_offset("Corte");
                    //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");

                    $corte_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $corte_costo_unitario = $row['costo_unitario'];
                        $corte_costo_unitario = floatval($corte_costo_unitario);

                        $corte_por_millar = $row['por_millar'];
                        $corte_por_millar = floatval($corte_por_millar);
                    }


                    if ($corte_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $delta = self:: deltax($cantidad_offset, $corte_por_millar);

                    $costo_corte = $corte_costo_unitario * $delta;
                    $costo_corte = floatval($costo_corte);

                    $aOffFCaj[$i]["tipo"]       = $nombre_tipo_offset;
                    $aOffFCaj[$i]["cantidad"]   = intval($_POST['qty']);
                    $aOffFCaj[$i]["num_tintas"] = $num_tintas;


                    $Merma_OffEmp_tmp = $ventas_model->costo_offset_color_merma();

                    foreach ($Merma_OffEmp_tmp as $row) {

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

                    if (is_array($Merma_OffEmp_tmp)) {

                        unset($Merma_OffEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

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

                        $cant_adic = $cantidad_adic / $por_cada_x;

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


                    $aMerma_OffFCaj = [];

                    $aMerma_OffFCaj['merma_min']  = $merma_color;
                    $aMerma_OffFCaj['merma_adic'] = $merma_color_adic;
                    $aMerma_OffFCaj['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelFCaj['cortes']);


                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelFCaj["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_OffFCaj['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_OffFCaj['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_OffFCaj['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_OffFCaj['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aOffFCaj[$i]["mermas"] = $aMerma_OffFCaj;

                    unset($aMerma_OffFCaj);

                    $aOffFCaj[$i]["corte_costo_unitario"] = $corte_costo_unitario;
                    $aOffFCaj[$i]["corte_por_millar"]     = $corte_por_millar;
                    $aOffFCaj[$i]["costo_corte"]          = $costo_corte;


                    $papel_fcaj_corte_ancho = $aPapelFCaj['corte_ancho'];
                    $papel_fcaj_corte_largo = $aPapelFCaj['corte_largo'];


                    $es_maquila = self:: rec_maquila($papel_fcaj_corte_ancho, $papel_fcaj_corte_largo);


                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {

                            // Laminas
                            $db_tmp = $ventas_model->costo_offset("Laminas");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas");

                            $costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $costo_unitario_laminas = $row['costo_unitario'];
                                $costo_unitario_laminas = floatval($costo_unitario_laminas);
                            }


                            if ($costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_laminas_offset = ($costo_unitario_laminas * $num_tintas);
                            $costo_laminas_offset = floatval($costo_laminas_offset);


                            $aOffFCaj[$i]["costo_unitario_laminas"] = $costo_unitario_laminas;

                            $aOffFCaj[$i]["costo_tot_laminas"] = $costo_laminas_offset;


                            // Arreglo
                            $db_tmp = $ventas_model->costo_offset("Arreglo");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo");

                            $arreglo_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_tiraje_max = $row['tiraje_maximo'];
                                $arreglo_tiraje_max = intval($arreglo_tiraje_max);

                                $arreglo_costo_unitario = $row['costo_unitario'];
                                $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                            }


                            if ($arreglo_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            if ($cantidad_offset < $arreglo_tiraje_max) {

                                $costo_arreglo_offset = ($arreglo_costo_unitario * $num_tintas);
                                $costo_arreglo_offset = floatval($costo_arreglo_offset);
                            } else {

                                $costo_arreglo_offset = 0;
                            }


                            $aOffFCaj[$i]["costo_unitario_arreglo"] = $arreglo_costo_unitario;

                            $aOffFCaj[$i]["costo_tot_arreglo"] = $costo_arreglo_offset;


                            // Tiro
                            //$db_tmp = $ventas_model->costo_offset("Tiro");
                            $db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro");


                            $costo_unitario_tiro = 0;

                            foreach ($db_tmp as $row) {

                                $tiro_por_millar = $row['por_millar'];
                                $tiro_por_millar = intval($tiro_por_millar);

                                $costo_unitario_tiro = $row['costo_unitario'];
                                $costo_unitario_tiro = floatval($costo_unitario_tiro);
                            }


                            if ($costo_unitario_tiro <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_por_millar);

                            $costo_tiro_offset = ($costo_unitario_tiro * $alfa * $num_tintas);
                            $costo_tiro_offset = floatval($costo_tiro_offset);


                            $costo_proceso = floatval($costo_laminas_offset + $costo_arreglo_offset + $costo_tiro_offset);

                            $aOffFCaj[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                            $aOffFCaj[$i]["costo_tot_tiro"] = $costo_tiro_offset;

                            $aOffFCaj[$i]["costo_tot_proceso"] = $costo_proceso;
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $db_tmp = $ventas_model->costo_offset("Laminas_Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas_Pantone");

                            $pantone_costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_costo_unitario_laminas = $row['costo_unitario'];
                                $pantone_costo_unitario_laminas = floatval($pantone_costo_unitario_laminas);
                            }


                            if ($pantone_costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $aOffFCaj[$i]['costo_unitario_laminas'] = $pantone_costo_unitario_laminas;

                            $costo_tot_laminas = floatval($pantone_costo_unitario_laminas * $num_tintas);

                            $aOffFCaj[$i]['costo_tot_laminas'] = $costo_tot_laminas;


                            // Arreglo de Pantone
                            $db_tmp = $ventas_model->costo_offset("Arreglo de Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo de Pantone");

                            $arreglo_pantone_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_pantone_costo_unitario = $row['costo_unitario'];

                                $arreglo_pantone_costo_unitario = floatval($arreglo_pantone_costo_unitario);
                            }


                            if ($arreglo_pantone_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_tot_arreglo_pantone = ($arreglo_pantone_costo_unitario * $num_tintas);

                            $costo_tot_arreglo_pantone = floatval($costo_tot_arreglo_pantone);

                            $aOffFCaj[$i]["costo_unitario_arreglo"] = $arreglo_pantone_costo_unitario;

                            $aOffFCaj[$i]["costo_tot_arreglo"] = $costo_tot_arreglo_pantone;

                            $costo_offset_arreglo_pantone = $costo_tot_arreglo_pantone;


                            // Tiro

                            $db_tmp = $ventas_model->costo_offset("Tiro Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro Pantone");

                            $costo_unitario_pantone = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_tiraje_max = $row['tiraje_maximo'];
                                $pantone_tiraje_max = intval($pantone_tiraje_max);

                                $tiro_pantone_por_millar = $row['por_millar'];
                                $tiro_pantone_por_millar = intval($tiro_pantone_por_millar);

                                $costo_unitario_pantone = $row['costo_unitario'];
                                $costo_unitario_pantone = floatval($costo_unitario_pantone);

                                $por_millar = $row['por_millar'];
                                $por_millar = intval($por_millar);
                            }


                            if ($costo_unitario_pantone <= 0) {

                                $l_costo = false;
                            }

                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_pantone_por_millar);

                            $costo_pantone_offset = 0;

                            $costo_pantone_offset = ($costo_unitario_pantone * $alfa * $num_tintas);
                            $costo_pantone_offset = floatval($costo_pantone_offset);


                            $aOffFCaj[$i]["costo_unitario_tiro"] = $costo_unitario_pantone;


                            // Tirro Pantone
                            $aOffFCaj[$i]['costo_unitario_tiro'] = $costo_unitario_pantone;


                            $delta = self:: deltax($cantidad_offset, $por_millar);

                            $costo_tot_tiro = floatval($costo_unitario_pantone * $delta);

                            $costo_proceso = floatval($costo_tot_laminas + $costo_tot_arreglo_pantone + $costo_tot_tiro);


                            $aOffFCaj[$i]['costo_tot_tiro'] = $costo_tot_tiro;

                            $aOffFCaj[$i]['costo_tot_proceso']  = $costo_proceso;
                        }
                    } else {        // si es maquila

                        $aOff_maq_FCaj[$i]["Tipo"] = $nombre_tipo_offset;

                        $aOff_maq_FCaj[$i]["cantidad_maq"] = $cantidad_offset;

                        $aOff_maq_FCaj[$i]["num_tintas_maq"] = intval($num_tintas);


                        // Maquila lamina
                        $db_tmp = $ventas_model->costo_offset("Maquila lamina");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila lamina");

                        $costo_unitario_laminas_maquila = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_laminas_maquila = $row['costo_unitario'];
                            $costo_unitario_laminas_maquila = floatval($costo_unitario_laminas_maquila);
                        }


                        if ($costo_unitario_laminas_maquila <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_laminas = $costo_unitario_laminas_maquila * $num_tintas;
                        $costo_maquila_laminas = floatval($costo_maquila_laminas);


                        $aOff_maq_FCaj[$i]["costo_unitario_laminas_maq"] = $costo_unitario_laminas_maquila;

                        $aOff_maq_FCaj[$i]["costo_laminas_maq"] = $costo_maquila_laminas;


                        // Maquila arreglo
                        $db_tmp = $ventas_model->costo_offset("Maquila Arreglo");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila Arreglo");

                        $costo_unitario_maquila_arreglo = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_maquila_arreglo = $row['costo_unitario'];
                            $costo_unitario_maquila_arreglo = floatval($costo_unitario_maquila_arreglo);
                        }


                        if ($costo_unitario_maquila_arreglo <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_arreglo = $costo_unitario_maquila_arreglo * $num_tintas;
                        $costo_maquila_arreglo = floatval($costo_maquila_arreglo);


                        $aOff_maq_FCaj[$i]["costo_unitario_arreglo_maq"] = $costo_unitario_maquila_arreglo;

                        $aOff_maq_FCaj[$i]["costo_arreglo_maq"] = $costo_maquila_arreglo;


                        if ($nombre_tipo_offset == "Seleccion") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila");


                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }

                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $costo_proceso_maq = floatval($costo_maquila_laminas + $costo_maquila_arreglo + $costo_maquila);


                            $aOff_maq_FCaj[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_FCaj[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_FCaj[$i]["costo_tot_maquila"] = $costo_maquila;

                            $aOff_maq_FCaj[$i]["costo_tot_proceso_maq"] = $costo_proceso_maq;
                        }


                        if ($nombre_tipo_offset == "Pantone") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila Pantone");


                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }


                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $costo_proceso_maq = floatval($costo_maquila_laminas + $costo_maquila_arreglo + $costo_maquila);


                            $aOff_maq_FCaj[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_FCaj[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_FCaj[$i]["costo_tot_maquila"] = $costo_maquila;

                            $aOff_maq_FCaj[$i]["costo_tot_proceso_maq"] = $costo_proceso_maq;
                        }
                    }
                }



                if ($Nombre_proceso === "Digital") {

                    $es_digital         = true;
                    $nombre_tipo_offset = "Seleccion";

                    $costo_unitario_digital = 0;
                    $merma_digital          = 0;
                    $cantidad_digital       = 0;

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $merma_digital = $_POST['digital'];
                    $merma_digital = intval($merma_digital);

                    $cantidad_digital = $cantidad;
                    $cantidad_digital = intval($cantidad_digital);


                    $delta = self:: deltax($cantidad_digital, 1);

                    $cantidad_digital = $delta;

                    $digital_db_rango = $ventas_model->costo_digital_rango("frente");


                    $costo_unitario_digital = 0;
                    foreach ($digital_db_rango as $row) {

                        $es_maquila = $row['es_maquila'];
                        $tiraje_min = $row['tiraje_minimo'];
                        $tiraje_max = $row['tiraje_maximo'];

                        $es_maquila = intval($es_maquila);
                        $tiraje_min = intval($tiraje_min);
                        $tiraje_max = intval($tiraje_max);

                        if ($cantidad_digital >= $tiraje_min and $cantidad_digital <= $tiraje_max and !$es_maquila) {

                            $costo_unitario_digital = $row['costo_unitario'];
                            $costo_unitario_digital = floatval($row['costo_unitario']);

                            break;
                        }
                    }


                    if (is_array($digital_db_rango)) {

                        unset($digital_db_rango);
                    }


                    $costo_tot_digital = $costo_unitario_digital * $cantidad_digital;
                    $costo_tot_digital = floatval($costo_tot_digital);


                    $aDigFCaj[$i]["cantidad"]       = $cantidad_digital;
                    $aDigFCaj[$i]["costo_unitario"] = $costo_unitario_digital;


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


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_tmp  = 1;
                    $num_tintas_adic = 1;

                    $cantidad_color_merma = $cantidad;


                    if ($tiraje < $cantidad_minima) {

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = 0;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    } else {

                        $cantidad_adic = $tiraje - $cantidad_minima;

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = $cant_adic * $adicional;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    }

                    $merma_tot = $merma_color + $merma_color_adic;

                    $aMerma_DigFcaj = [];

                    $aMerma_DigFcaj['merma_min']  = $merma_color;
                    $aMerma_DigFcaj['merma_adic'] = $merma_color_adic;
                    $aMerma_DigFcaj['merma_tot']  = $merma_tot;

                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelFCaj["cortes"]);


                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelFCaj["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_DigFcaj['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_DigFcaj['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_DigFcaj['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_DigFcaj['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aDigFCaj[$i]["mermas"] = $aMerma_DigFcaj;


                    if (is_array($aMerma_DigFcaj)) {

                        unset($aMerma_DigFcaj);
                    }


                    $aDigFCaj[$i]["costo_tot"]         = $costo_tot_digital;
                    $aDigFCaj[$i]["costo_tot_proceso"] = $costo_tot_digital;
                }



                if ($Nombre_proceso === "Serigrafia") {

                    $es_serigrafia = true;

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $merma_serigrafia = $_POST['serigrafia'];
                    $merma_serigrafia = intval($merma_serigrafia);

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $aImp_tmp = json_decode($_POST['aImpFCaj'], true);

                    $tipo_offset_serigrafia = $aImp_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $num_tintas = $aImp_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cantidad_serigrafia = $cantidad;

                    $rango_db_tmp = $ventas_model->costo_serigrafia_rango("cantidad");


                    $costo_unitario_tiro = 0;
                    $por_cada            = 0;
                    $delta               = 0;

                    // corregir deltax en todos los casos
                    foreach ($rango_db_tmp as $row) {

                        $tiraje_min = intval($row['tiraje_minimo']);
                        $tiraje_max = intval($row['tiraje_maximo']);

                        if ($cantidad_serigrafia >= $tiraje_min and $cantidad_serigrafia <= $tiraje_max) {

                            $costo_unitario_tiro = floatval($row['costo_unitario']);
                            $por_cada = intval($row['por_cada']);

                            $delta = self:: deltax($cantidad_serigrafia, $por_cada);

                            break;
                        }
                    }

                    if (is_array($rango_db_tmp)) {

                        unset($rango_db_tmp);
                    }

                    $costo_tiro = ($costo_unitario_tiro * $delta * $num_tintas);
                    $costo_tiro = floatval($costo_tiro);


                    // Arreglo
                    $arreglo_db_tmp = $ventas_model->costo_arreglo_serigrafia("Arreglo");

                    $costo_arreglo_seri = $arreglo_db_tmp['costo_unitario'];


                    if (is_array($arreglo_db_tmp)) {

                        unset($arreglo_db_tmp);
                    }

                    $costo_unitario_arreglo_serigrafia = floatval($costo_arreglo_seri);

                    $costo_arreglo_serigrafia = $costo_unitario_arreglo_serigrafia * $num_tintas;
                    $costo_arreglo_serigrafia = floatval($costo_arreglo_serigrafia);

                    $costo_total_serigrafia = $costo_tiro + $costo_arreglo_serigrafia;
                    $costo_total_serigrafia = floatval($costo_total_serigrafia);


                    $costo_proceso = floatval($costo_arreglo_serigrafia + $costo_tiro);

                    $aSerFCaj[$i]["tipo"] = $tipo_offset_serigrafia;

                    $aSerFCaj[$i]["cantidad"] = $cantidad;

                    $aSerFCaj[$i]["num_tintas"] = $num_tintas;


                    $Merma_SerEmp_tmp = $ventas_model->getCotizaMermaSerigrafia();

                    foreach ($Merma_SerEmp_tmp as $row) {

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


                    if (is_array($Merma_SerEmp_tmp)) {

                        unset($Merma_SerEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_adic = $num_tintas - 4;


                    if ($num_tintas >= 1 and $num_tintas <= 4) {

                        // $cantidad_color_merma
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
                            $merma_tot        = $merma_color;
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

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        if ($num_tintas >= 1 and $num_tintas <= 4) {

                            $merma_color      = $cantidad_color_merma;
                            $merma_color_adic = $cant_adic * $cantidad_color_merma;
                            $merma_tot        = $merma_color + $merma_color_adic;
                        } else {

                            $merma_color      = $c_4colores;

                            $merma_color_adic = (($num_tintas - 4) * $adicional_1color * $cant_adic);

                            $merma_tot        = $merma_color + $merma_color_adic;
                        }
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_SerFCaj = [];

                    $aMerma_SerFCaj['merma_min']  = $merma_color;
                    $aMerma_SerFCaj['merma_adic'] = $merma_color_adic;
                    $aMerma_SerFCaj['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelEmp['cortes']);


                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelFCaj["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_SerFCaj['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_SerFCaj['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_SerFCaj['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_SerFCaj['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aSerFCaj[$i]["mermas"] = $aMerma_SerFCaj;

                    unset($aMerma_SerFCaj);


                    $aSerFCaj[$i]["costo_unitario_arreglo"] = $costo_unitario_arreglo_serigrafia;

                    $aSerFCaj[$i]["costo_arreglo"] = $costo_arreglo_serigrafia;

                    $aSerFCaj[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                    $aSerFCaj[$i]["costo_tiro"] = $costo_tiro;


                    $aSerFCaj[$i]["costo_tot_proceso"] = $costo_proceso;
                }
            }
        }


        $cantidad = $_POST['qty'];
        $cantidad = intval($cantidad);

        $cantidad_offset = $cantidad;


        // costo de corte
        $db_tmp = $ventas_model->costo_offset("Corte");
        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");


        $costo_unitario_corte   = 0;
        $costo_corte_por_millar = 0;

        foreach ($db_tmp as $row) {

            $costo_unitario_corte = $row['costo_unitario'];
            $costo_unitario_corte = floatval($costo_unitario_corte);

            $costo_corte_por_millar = $row['por_millar'];
            $costo_corte_por_millar = intval($costo_corte_por_millar);
        }


        if ($costo_unitario_corte <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $delta = 0;

        $delta = self:: deltax($cantidad_offset, $costo_corte_por_millar);

        $costo_corte = $costo_unitario_corte * $delta;
        $costo_corte = floatval($costo_corte);

        $aJson['costo_corte']   = $costo_corte;
        $aJson['Papel_Empalme'] = $aPapelEmp;
        $aJson['Papel_FCaj']    = $aPapelFCaj;
        $aJson['Papel_FCar']    = $aPapelFCar;
        $aJson['Papel_Guarda']  = $aPapelG;
        $aJson['CartonCaj']     = $aCartonCajon;
        $aJson['CartonCar']     = $aCartonCartera;



        if (count($aOffFCaj) > 0 ) {

            $aJson['OffFCaj'] = $aOffFCaj;

            if (is_array($aOffFCaj)) {

                unset($aOffFCaj);
            }
        }

        if (count($aOff_maq_FCaj) > 0) {

            $aJson['Off_maq_FCaj'] = $aOff_maq_FCaj;

            if (is_array($aOff_maq_FCaj)) {

                unset($aOff_maq_FCaj);
            }
        }

        if (count($aDigFCaj) > 0) {

            $aJson['DigFCaj'] = $aDigFCaj;

            if (is_array($aDigFCaj)) {

                unset($aDigFCaj);
            }
        }

        if (count($aSerFCaj) > 0) {

            $aJson['SerFCaj'] = $aSerFCaj;

            if (is_array($aSerFCaj)) {

                unset($aSerFCaj);
            }
        }



// =========== Termina los calculos Forro del Cajon ===========




// =========== Inicia los calculos Forro de la Cartera ===========


        $aJsonFcar = [];

        $es_offset     = false;
        $es_digital    = false;
        $es_serigrafia = false;

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

        $aOffFCar      = [];
        $aOff_maq_FCar = [];
        $aDigFCar      = [];
        $aSerFCar      = [];


        // Forro de la Cartera
        $Tipo_proceso_FCar_tmp = json_decode($_POST['aImpFCar'], true);

        $num_rows = count($Tipo_proceso_FCar_tmp);

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

                $Nombre_proceso = $Tipo_proceso_FCar_tmp[$i]["Tipo_impresion"];

                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    // merma offset
                    $cantidad_offset = $cantidad;

                    $nombre_tipo_offset = $Tipo_proceso_FCar_tmp[$i]['tipo_offset'];


                    $nombre_tipo_offset = trim(strval($nombre_tipo_offset));

                    $num_tintas = $Tipo_proceso_FCar_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);


                    $db_tmp = $ventas_model->costo_offset("Corte");
                    //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");

                    $corte_costo_unitario = 0;
                    $corte_por_millar     = 0;

                    foreach ($db_tmp as $row) {

                        $corte_costo_unitario = $row['costo_unitario'];
                        $corte_costo_unitario = floatval($corte_costo_unitario);

                        $corte_por_millar = $row['por_millar'];
                        $corte_por_millar = floatval($corte_por_millar);
                    }


                    if ($corte_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }

                    $delta = self:: deltax($cantidad_offset, $corte_por_millar);

                    $costo_corte = $corte_costo_unitario * $delta;
                    $costo_corte = floatval($costo_corte);

                    $aOffFCar[$i]["tipo"]       = $nombre_tipo_offset;
                    $aOffFCar[$i]["cantidad"]   = intval($_POST['qty']);
                    $aOffFCar[$i]["num_tintas"] = $num_tintas;


                    $Merma_OffEmp_tmp = $ventas_model->costo_offset_color_merma();

                    foreach ($Merma_OffEmp_tmp as $row) {

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

                    if (is_array($Merma_OffEmp_tmp)) {

                        unset($Merma_OffEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

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

                        $cant_adic = $cantidad_adic / $por_cada_x;

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

                    $aMerma_OffFCar = [];

                    $aMerma_OffFCar['merma_min']  = $merma_color;
                    $aMerma_OffFCar['merma_adic'] = $merma_color_adic;
                    $aMerma_OffFCar['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelFCar['cortes']);


                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelFCar["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_OffFCar['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_OffFCar['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_OffFCar['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_OffFCar['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aOffFCar[$i]["mermas"] = $aMerma_OffFCar;


                    if (is_array($aMerma_OffFCar)) {

                        unset($aMerma_OffFCar);
                    }


                    $aOffFCar[$i]["corte_costo_unitario"] = $corte_costo_unitario;
                    $aOffFCar[$i]["corte_por_millar"]     = $corte_por_millar;
                    $aOffFCar[$i]["costo_corte"]          = $costo_corte;


                    $papel_fcar_corte_ancho = intval($aPapelFCar['corte_ancho']);
                    $papel_fcar_corte_largo = intval($aPapelFCar['corte_largo']);


                    $es_maquila = self:: rec_maquila($papel_fcar_corte_ancho, $papel_fcar_corte_largo);


                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {


                            // Laminas
                            $db_tmp = $ventas_model->costo_offset("Laminas");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas");

                            $costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $costo_unitario_laminas = $row['costo_unitario'];
                                $costo_unitario_laminas = floatval($costo_unitario_laminas);
                            }


                            if ($costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_laminas_offset = ($costo_unitario_laminas * $num_tintas);
                            $costo_laminas_offset = floatval($costo_laminas_offset);


                            $aOffFCar[$i]["costo_unitario_laminas"] = $costo_unitario_laminas;

                            $aOffFCar[$i]["costo_tot_laminas"] = $costo_laminas_offset;


                            // Arreglo
                            $db_tmp = $ventas_model->costo_offset("Arreglo");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo");

                            $arreglo_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_tiraje_max = $row['tiraje_maximo'];
                                $arreglo_tiraje_max = intval($arreglo_tiraje_max);

                                $arreglo_costo_unitario = $row['costo_unitario'];
                                $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                            }


                            if ($arreglo_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            if ($cantidad_offset < $arreglo_tiraje_max) {

                                $costo_arreglo_offset = ($arreglo_costo_unitario * $num_tintas);
                                $costo_arreglo_offset = floatval($costo_arreglo_offset);
                            } else {

                                $costo_arreglo_offset = 0;
                            }


                            $aOffFCar[$i]["costo_unitario_arreglo"] = $arreglo_costo_unitario;

                            $aOffFCar[$i]["costo_tot_arreglo"] = $costo_arreglo_offset;


                            // Tiro
                            $db_tmp = $ventas_model->costo_offset("Tiro");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro");

                            $costo_unitario_tiro = 0;

                            foreach ($db_tmp as $row) {

                                $tiro_por_millar = $row['por_millar'];
                                $tiro_por_millar = intval($tiro_por_millar);

                                $costo_unitario_tiro = $row['costo_unitario'];
                                $costo_unitario_tiro = floatval($costo_unitario_tiro);
                            }


                            if ($costo_unitario_tiro <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_por_millar);

                            $costo_tiro_offset = ($costo_unitario_tiro * $alfa * $num_tintas);
                            $costo_tiro_offset = floatval($costo_tiro_offset);


                            $costo_proceso = floatval($costo_laminas_offset + $costo_arreglo_offset + $costo_tiro_offset);

                            $aOffFCar[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                            $aOffFCar[$i]["costo_tot_tiro"] = $costo_tiro_offset;

                            $aOffFCar[$i]["costo_tot_proceso"] = $costo_proceso;
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $db_tmp = $ventas_model->costo_offset("Laminas_Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas_Pantone");

                            $pantone_costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_costo_unitario_laminas = $row['costo_unitario'];
                                $pantone_costo_unitario_laminas = floatval($pantone_costo_unitario_laminas);
                            }


                            if ($pantone_costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_tot_laminas = floatval($pantone_costo_unitario_laminas * $num_tintas);

                            $aOffFCar[$i]['costo_unitario_laminas'] = $pantone_costo_unitario_laminas;

                            $aOffFCar[$i]['costo_tot_laminas'] = $costo_tot_laminas;


                            // Arreglo de Pantone
                            $db_tmp = $ventas_model->costo_offset("Arreglo de Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo de Pantone");

                            $arreglo_pantone_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_pantone_costo_unitario = $row['costo_unitario'];

                                $arreglo_pantone_costo_unitario = floatval($arreglo_pantone_costo_unitario);
                            }


                            if ($arreglo_pantone_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_tot_arreglo_pantone = ($arreglo_pantone_costo_unitario * $num_tintas);
                            $costo_tot_arreglo_pantone = floatval($costo_tot_arreglo_pantone);


                            $aOffFCar[$i]["costo_unitario_arreglo"] = $arreglo_pantone_costo_unitario;

                            $aOffFCar[$i]["costo_tot_arreglo"] = $costo_tot_arreglo_pantone;

                            $costo_offset_arreglo_pantone = $costo_tot_arreglo_pantone;


                            // Tiro
                            $db_tmp = $ventas_model->costo_offset("Tiro Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro Pantone");


                            $costo_unitario_pantone = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_tiraje_max = $row['tiraje_maximo'];
                                $pantone_tiraje_max = intval($pantone_tiraje_max);

                                $tiro_pantone_por_millar = $row['por_millar'];
                                $tiro_pantone_por_millar = intval($tiro_pantone_por_millar);

                                $costo_unitario_pantone = $row['costo_unitario'];
                                $costo_unitario_pantone = floatval($costo_unitario_pantone);

                                $por_millar = $row['por_millar'];
                                $por_millar = intval($por_millar);
                            }


                            if ($costo_unitario_pantone <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_pantone_por_millar);

                            $costo_pantone_offset = 0;

                            $costo_pantone_offset = ($costo_unitario_pantone * $alfa * $num_tintas);
                            $costo_pantone_offset = floatval($costo_pantone_offset);


                            $aOffFCar[$i]["costo_unitario_tiro"] = $costo_unitario_pantone;


                            // Tirro Pantone
                            $aOffFCar[$i]['costo_unitario_tiro'] = $costo_unitario_pantone;


                            $delta = self:: deltax($cantidad_offset, $por_millar);

                            $costo_tot_tiro = floatval($costo_unitario_pantone * $delta);
                            $costo_proceso = floatval($costo_tot_laminas + $costo_tot_arreglo_pantone + $costo_tot_tiro);

                            $aOffFCar[$i]['costo_tot_tiro'] = $costo_tot_tiro;

                            $aOffFCar[$i]['costo_tot_proceso'] = $costo_proceso;
                        }
                    } else {        // si es maquila

                        $aOff_maq_FCar[$i]["Tipo"]         = $nombre_tipo_offset;
                        $aOff_maq_FCar[$i]["cantidad_maq"] = $cantidad_offset;

                        $aOff_maq_FCar[$i]["num_tintas_maq"] = intval($num_tintas);


                        // Maquila lamina
                        $db_tmp = $ventas_model->costo_offset("Maquila lamina");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila lamina");


                        $costo_unitario_laminas_maquila = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_laminas_maquila = $row['costo_unitario'];
                            $costo_unitario_laminas_maquila = floatval($costo_unitario_laminas_maquila);
                        }


                        if ($costo_unitario_laminas_maquila <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_laminas = $costo_unitario_laminas_maquila * $num_tintas;
                        $costo_maquila_laminas = floatval($costo_maquila_laminas);


                        $aOff_maq_FCar[$i]["costo_unitario_laminas_maq"] = $costo_unitario_laminas_maquila;

                        $aOff_maq_FCar[$i]["costo_laminas_maq"] = $costo_maquila_laminas;


                        // Maquila arreglo
                        $db_tmp = $ventas_model->costo_offset("Maquila Arreglo");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila Arreglo");

                        $costo_unitario_maquila_arreglo = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_maquila_arreglo = $row['costo_unitario'];
                            $costo_unitario_maquila_arreglo = floatval($costo_unitario_maquila_arreglo);
                        }


                        if ($costo_unitario_maquila_arreglo <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_arreglo = $costo_unitario_maquila_arreglo * $num_tintas;
                        $costo_maquila_arreglo = floatval($costo_maquila_arreglo);


                        $aOff_maq_FCar[$i]["costo_unitario_arreglo_maq"] = $costo_unitario_maquila_arreglo;

                        $aOff_maq_FCar[$i]["costo_arreglo_maq"] = $costo_maquila_arreglo;


                        if ($nombre_tipo_offset == "Seleccion") {


                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila");


                            $maquila_costo_unitario = 0;
                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }


                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $costo_proceso_maq = floatval($costo_maquila_laminas + $costo_maquila_arreglo + $costo_maquila);


                            $aOff_maq_FCar[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_FCar[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_FCar[$i]["costo_tot_maquila"] = $costo_maquila;
                            $aOff_maq_FCar[$i]["costo_tot_proceso_maq"] = $costo_proceso_maq;
                        }


                        if ($nombre_tipo_offset == "Pantone") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila Pantone");


                            $maquila_costo_unitario = 0;
                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }


                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $costo_proceso_maq = floatval($costo_maquila_laminas + $costo_maquila_arreglo + $costo_maquila);


                            $aOff_maq_FCar[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_FCar[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_FCar[$i]["costo_tot_maquila"] = $costo_maquila;

                            $aOff_maq_FCar[$i]["costo_tot_proceso_maq"] = $costo_proceso_maq;
                        }
                    }
                }


                if ($Nombre_proceso === "Digital") {

                    $es_digital         = true;
                    $nombre_tipo_offset = "Seleccion";

                    $costo_unitario_digital = 0;
                    $merma_digital          = 0;
                    $cantidad_digital       = 0;

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $merma_digital = $_POST['digital'];
                    $merma_digital = intval($merma_digital);

                    $cantidad_digital = $cantidad;
                    $cantidad_digital = intval($cantidad_digital);


                    $delta = self:: deltax($cantidad_digital, 1);

                    $cantidad_digital = $delta;

                    $digital_db_rango = $ventas_model->costo_digital_rango("frente");


                    $costo_unitario_digital = 0;
                    foreach ($digital_db_rango as $row) {

                        $es_maquila = $row['es_maquila'];
                        $tiraje_min = $row['tiraje_minimo'];
                        $tiraje_max = $row['tiraje_maximo'];

                        $es_maquila = intval($es_maquila);
                        $tiraje_min = intval($tiraje_min);
                        $tiraje_max = intval($tiraje_max);

                        if ($cantidad_digital >= $tiraje_min and $cantidad_digital <= $tiraje_max and !$es_maquila) {

                            $costo_unitario_digital = 0;

                            $costo_unitario_digital = $row['costo_unitario'];
                            $costo_unitario_digital = floatval($row['costo_unitario']);

                            break;
                        }
                    }


                    if (is_array($digital_db_rango)) {

                        unset($digital_db_rango);
                    }


                    $costo_tot_digital = $costo_unitario_digital * $cantidad_digital;
                    $costo_tot_digital = floatval($costo_tot_digital);


                    $aDigFCar[$i]["cantidad"]       = $cantidad_digital;
                    $aDigFCar[$i]["costo_unitario"] = $costo_unitario_digital;


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


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_tmp  = 1;
                    $num_tintas_adic = 1;

                    $cantidad_color_merma = $cantidad;


                    if ($tiraje < $cantidad_minima) {

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = 0;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    } else {

                        $cantidad_adic = $tiraje - $cantidad_minima;

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = $cant_adic * $adicional;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_DigFcar = [];

                    $aMerma_DigFcar['merma_min']  = $merma_color;
                    $aMerma_DigFcar['merma_adic'] = $merma_color_adic;
                    $aMerma_DigFcar['merma_tot']  = $merma_tot;

                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelFCar["cortes"]);


                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelFCar["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_DigFcar['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_DigFcar['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_DigFcar['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_DigFcar['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aDigFCar[$i]["mermas"] = $aMerma_DigFcar;


                    if (is_array($aMerma_DigFcar)) {

                        unset($aMerma_DigFcar);
                    }


                    $aDigFCar[$i]["costo_tot"]         = $costo_tot_digital;
                    $aDigFCar[$i]["costo_tot_proceso"] = $costo_tot_digital;
                }



                if ($Nombre_proceso === "Serigrafia") {

                    $es_serigrafia = true;

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $merma_serigrafia = $_POST['serigrafia'];
                    $merma_serigrafia = intval($merma_serigrafia);

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);


                    $aImp_tmp = json_decode($_POST['aImpFCar'], true);


                    $tipo_offset_serigrafia = $aImp_tmp[$i]['tipo_offset'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $num_tintas = $aImp_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);


                    $Merma_SerEmp_tmp = $ventas_model->getCotizaMermaSerigrafia();

                    foreach ($Merma_SerEmp_tmp as $row) {

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


                    if (is_array($Merma_SerEmp_tmp)) {

                        unset($Merma_SerEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_adic = $num_tintas - 4;


                    if ($num_tintas >= 1 and $num_tintas <= 4) {

                        // $cantidad_color_merma
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
                            $merma_tot        = $merma_color;
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

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        if ($num_tintas >= 1 and $num_tintas <= 4) {

                            $merma_color      = $cantidad_color_merma;
                            $merma_color_adic = $cant_adic * $cantidad_color_merma;
                            $merma_tot        = $merma_color + $merma_color_adic;
                        } else {

                            $merma_color      = $c_4colores;

                            $merma_color_adic = (($num_tintas - 4) * $adicional_1color * $cant_adic);

                            $merma_tot        = $merma_color + $merma_color_adic;
                        }
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_SerFcar = [];

                    $aMerma_SerFcar['merma_min']  = $merma_color;
                    $aMerma_SerFcar['merma_adic'] = $merma_color_adic;
                    $aMerma_SerFcar['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelFCar["cortes"]);


                    $tot_pliegos_merma_ser_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_emp_merma = floatval($aPapelFCar["costo_unitario"]);

                    $costo_tot_merma_ser = floatval($tot_pliegos_merma_ser_tmp * $costo_unit_papel_emp_merma);

                    $aMerma_SerFcar['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_SerFcar['merma_tot_pliegos'] = intval($tot_pliegos_merma_ser_tmp);

                    $aMerma_SerFcar['costo_unit_papel_merma'] = $costo_unit_papel_emp_merma;

                    $aMerma_SerFcar['costo_tot_pliegos_merma'] = $costo_tot_merma_ser;


                    $aSerFCar[$i]["mermas"] = $aMerma_SerFcar;


                    if (is_array($aMerma_SerFcar)) {

                        unset($aMerma_SerFcar);
                    }


                    $cantidad_serigrafia = $cantidad;

                    $rango_db_tmp = $ventas_model->costo_serigrafia_rango("cantidad");


                    $costo_unitario_tiro = 0;
                    $por_cada            = 0;
                    $delta               = 0;

                    // corregir deltax en todos los casos
                    foreach ($rango_db_tmp as $row) {

                        $tiraje_min = intval($row['tiraje_minimo']);
                        $tiraje_max = intval($row['tiraje_maximo']);

                        if ($cantidad_serigrafia >= $tiraje_min and $cantidad_serigrafia <= $tiraje_max) {

                            $costo_unitario_tiro = floatval($row['costo_unitario']);
                            $por_cada = intval($row['por_cada']);

                            $delta = self:: deltax($cantidad_serigrafia, $por_cada);

                            break;
                        }
                    }


                    if (is_array($rango_db_tmp)) {

                        unset($rango_db_tmp);
                    }

                    $costo_tiro = ($costo_unitario_tiro * $delta * $num_tintas);
                    $costo_tiro = floatval($costo_tiro);


                    // Arreglo
                    $arreglo_db_tmp = $ventas_model->costo_arreglo_serigrafia("Arreglo");

                    $costo_arreglo_seri = $arreglo_db_tmp['costo_unitario'];


                    if (is_array($arreglo_db_tmp)) {

                        unset($arreglo_db_tmp);
                    }


                    $costo_unitario_arreglo_serigrafia = floatval($costo_arreglo_seri);

                    $costo_arreglo_serigrafia = $costo_unitario_arreglo_serigrafia * $num_tintas;
                    $costo_arreglo_serigrafia = floatval($costo_arreglo_serigrafia);

                    $costo_total_serigrafia = $costo_tiro + $costo_arreglo_serigrafia;
                    $costo_total_serigrafia = floatval($costo_total_serigrafia);


                    $costo_proceso = floatval($costo_arreglo_serigrafia + $costo_tiro);


                    $aSerFCar[$i]["tipo"]       = $tipo_offset_serigrafia;
                    $aSerFCar[$i]["cantidad"]   = $cantidad;
                    $aSerFCar[$i]["num_tintas"] = $num_tintas;

                    $aSerFCar[$i]["costo_unitario_arreglo"] = $costo_unitario_arreglo_serigrafia;

                    $aSerFCar[$i]["costo_arreglo"] = $costo_arreglo_serigrafia;

                    $aSerFCar[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                    $aSerFCar[$i]["costo_tiro"] = $costo_tiro;

                    $aSerFCar[$i]["costo_tot_proceso"] = $costo_proceso;
                }
            }
        }

        $cantidad = $_POST['qty'];
        $cantidad = intval($cantidad);

        $cantidad_offset = $cantidad;


        // costo de corte
        $db_tmp = $ventas_model->costo_offset("Corte");
        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");


        $costo_unitario_corte = 0;

        foreach ($db_tmp as $row) {

            $costo_unitario_corte = $row['costo_unitario'];
            $costo_unitario_corte = floatval($costo_unitario_corte);

            $costo_corte_por_millar = $row['por_millar'];
            $costo_corte_por_millar = intval($costo_corte_por_millar);
        }


        if ($costo_unitario_corte <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $delta = 0;

        $delta = self:: deltax($cantidad_offset, $costo_corte_por_millar);

        $costo_corte = $costo_unitario_corte * $delta;
        $costo_corte = floatval($costo_corte);

        $aJson['costo_corte']   = $costo_corte;
        $aJson['Papel_Empalme'] = $aPapelEmp;
        $aJson['Papel_FCaj']    = $aPapelFCaj;
        $aJson['Papel_FCar']    = $aPapelFCar;
        $aJson['Papel_Guarda']  = $aPapelG;
        $aJson['CartonCaj']     = $aCartonCajon;
        $aJson['CartonCar']     = $aCartonCartera;



        if (count($aOffFCar) > 0 ) {

            $aJson['OffFCar'] = $aOffFCar;

            if (is_array($aOffFCar)) {

                unset($aOffFCar);
            }
        }

        if (count($aOff_maq_FCar) > 0) {

            $aJson['Off_maq_FCar'] = $aOff_maq_FCar;

            if (is_array($aOff_maq_FCar)) {

                unset($aOff_maq_FCar);
            }
        }

        if (count($aDigFCar) > 0) {

            $aJson['DigFCar'] = $aDigFCar;

            if (is_array($aDigFCar)) {

                unset($aDigFCar);
            }
        }

        if (count($aSerFCar) > 0) {

            $aJson['SerFCar'] = $aSerFCar;

            if (is_array($aSerFCar)) {

                unset($aSerFCar);
            }
        }




// =========== Termina los calculos Forro de la Cartera ===========





// =========== Inicia los calculos de la Guarda ===========

        $aJsonG = [];

        $es_offset     = false;
        $es_digital    = false;
        $es_serigrafia = false;

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

        $aOffG       = [];
        $aOff_maq_G  = [];
        $aDigG       = [];
        $aSerG       = [];


        // Guarda
        $Tipo_proceso_G_tmp = json_decode($_POST['aImpG'], true);

        $num_rows = count($Tipo_proceso_G_tmp);

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

                $tipo_offset_serigrafia = "";


                $Nombre_proceso = $Tipo_proceso_G_tmp[$i]["Tipo_impresion"];


                if ($Nombre_proceso == "Offset") {

                    $es_offset = true;

                    // merma offset
                    $cantidad_offset = $cantidad;

                    $nombre_tipo_offset = $Tipo_proceso_G_tmp[$i]['tipo_offset'];
                    $nombre_tipo_offset = trim(strval($nombre_tipo_offset));

                    $num_tintas = $Tipo_proceso_G_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $db_tmp = $ventas_model->costo_offset("Corte");
                    //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");

                    $corte_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $corte_costo_unitario = $row['costo_unitario'];
                        $corte_costo_unitario = floatval($corte_costo_unitario);

                        $corte_por_millar = $row['por_millar'];
                        $corte_por_millar = floatval($corte_por_millar);
                    }


                    if ($corte_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }

                    $delta = self:: deltax($cantidad_offset, $corte_por_millar);

                    $costo_corte = $corte_costo_unitario * $delta;
                    $costo_corte = floatval($costo_corte);

                    $aOffG[$i]["tipo"]       = $nombre_tipo_offset;
                    $aOffG[$i]["cantidad"]   = intval($_POST['qty']);
                    $aOffG[$i]["num_tintas"] = $num_tintas;


                    $Merma_OffEmp_tmp = $ventas_model->costo_offset_color_merma();

                    foreach ($Merma_OffEmp_tmp as $row) {

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


                    if (is_array($Merma_OffEmp_tmp)) {

                        unset($Merma_OffEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

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

                        $cant_adic = $cantidad_adic / $por_cada_x;

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

                    $aMerma_OffG = [];

                    $aMerma_OffG['merma_min']  = $merma_color;
                    $aMerma_OffG['merma_adic'] = $merma_color_adic;
                    $aMerma_OffG['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelG['cortes']);


                    $tot_pliegos_merma_G_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_G_merma = floatval($aPapelG["costo_unitario"]);

                    $costo_tot_merma_G = floatval($tot_pliegos_merma_G_tmp * $costo_unit_papel_G_merma);

                    $aMerma_OffG['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_OffG['merma_tot_pliegos'] = intval($tot_pliegos_merma_G_tmp);

                    $aMerma_OffG['costo_unit_papel_merma'] = $costo_unit_papel_G_merma;

                    $aMerma_OffG['costo_tot_pliegos_merma'] = $costo_tot_merma_G;


                    $aOffG[$i]["mermas"] = $aMerma_OffG;


                    if (is_array($aMerma_OffG)) {

                        unset($aMerma_OffG);
                    }


                    $aOffG[$i]["corte_costo_unitario"] = $corte_costo_unitario;
                    $aOffG[$i]["corte_por_millar"]     = $corte_por_millar;
                    $aOffG[$i]["costo_corte"]          = $costo_corte;


                    $papel_guarda_corte_ancho = $aPapelG['corte_ancho'];
                    $papel_guarda_corte_largo = $aPapelG['corte_largo'];


                    $es_maquila = self:: rec_maquila($papel_guarda_corte_ancho, $papel_guarda_corte_largo);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Seleccion") {


                            // Laminas
                            $db_tmp = $ventas_model->costo_offset("Laminas");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas");

                            $costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $costo_unitario_laminas = $row['costo_unitario'];
                                $costo_unitario_laminas = floatval($costo_unitario_laminas);
                            }


                            if ($costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_laminas_offset = ($costo_unitario_laminas * $num_tintas);
                            $costo_laminas_offset = floatval($costo_laminas_offset);


                            $aOffG[$i]["costo_unitario_laminas"] = $costo_unitario_laminas;

                            $aOffG[$i]["costo_tot_laminas"] = $costo_laminas_offset;


                            // Arreglo
                            $db_tmp = $ventas_model->costo_offset("Arreglo");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo");


                            $arreglo_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_tiraje_max = $row['tiraje_maximo'];
                                $arreglo_tiraje_max = intval($arreglo_tiraje_max);

                                $arreglo_costo_unitario = $row['costo_unitario'];
                                $arreglo_costo_unitario = floatval($arreglo_costo_unitario);
                            }


                            if ($arreglo_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            if ($cantidad_offset < $arreglo_tiraje_max) {

                                $costo_arreglo_offset = ($arreglo_costo_unitario * $num_tintas);
                                $costo_arreglo_offset = floatval($costo_arreglo_offset);
                            } else {

                                $costo_arreglo_offset = 0;
                            }


                            $aOffG[$i]["costo_unitario_arreglo"] = $arreglo_costo_unitario;

                            $aOffG[$i]["costo_tot_arreglo"] = $costo_arreglo_offset;


                            // Tiro
                            $db_tmp = $ventas_model->costo_offset("Tiro");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro");

                            $costo_unitario_tiro = 0;

                            foreach ($db_tmp as $row) {

                                $tiro_por_millar = $row['por_millar'];
                                $tiro_por_millar = intval($tiro_por_millar);

                                $costo_unitario_tiro = $row['costo_unitario'];
                                $costo_unitario_tiro = floatval($costo_unitario_tiro);
                            }


                            if ($costo_unitario_tiro <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_por_millar);

                            $costo_tiro_offset = ($costo_unitario_tiro * $alfa * $num_tintas);
                            $costo_tiro_offset = floatval($costo_tiro_offset);

                            $costo_tot_proceso = floatval($costo_corte + $costo_laminas_offset + $costo_arreglo_offset + $costo_tiro_offset);


                            $aOffG[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                            $aOffG[$i]["costo_tot_tiro"] = $costo_tiro_offset;

                            $aOffG[$i]["costo_tot_proceso"] = $costo_tot_proceso;
                        }


                        if ($nombre_tipo_offset === "Pantone") {

                            $db_tmp = $ventas_model->costo_offset("Laminas_Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Laminas_Pantone");

                            $pantone_costo_unitario_laminas = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_costo_unitario_laminas = $row['costo_unitario'];
                                $pantone_costo_unitario_laminas = floatval($pantone_costo_unitario_laminas);
                            }


                            if ($pantone_costo_unitario_laminas <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_tot_laminas = floatval($pantone_costo_unitario_laminas * $num_tintas);

                            $aOffG[$i]['costo_unitario_laminas'] = $pantone_costo_unitario_laminas;

                            $aOffG[$i]['costo_tot_laminas'] = $costo_tot_laminas;


                            // Arreglo de Pantone
                            $db_tmp = $ventas_model->costo_offset("Arreglo de Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Arreglo de Pantone");


                            $arreglo_pantone_costo_unitario = 0;

                            foreach ($db_tmp as $row) {

                                $arreglo_pantone_costo_unitario = $row['costo_unitario'];

                                $arreglo_pantone_costo_unitario = floatval($arreglo_pantone_costo_unitario);
                            }


                            if ($arreglo_pantone_costo_unitario <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $costo_tot_arreglo_pantone = ($arreglo_pantone_costo_unitario * $num_tintas);
                            $costo_tot_arreglo_pantone = floatval($costo_tot_arreglo_pantone);


                            $aOffG[$i]["costo_unitario_arreglo"] = $arreglo_pantone_costo_unitario;

                            $aOffG[$i]["costo_tot_arreglo"] = $costo_tot_arreglo_pantone;

                            $costo_offset_arreglo_pantone = $costo_tot_arreglo_pantone;


                            // Tiro
                            $db_tmp = $ventas_model->costo_offset("Tiro Pantone");
                            //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Tiro Pantone");


                            $costo_unitario_pantone = 0;

                            foreach ($db_tmp as $row) {

                                $pantone_tiraje_max = $row['tiraje_maximo'];
                                $pantone_tiraje_max = intval($pantone_tiraje_max);

                                $tiro_pantone_por_millar = $row['por_millar'];
                                $tiro_pantone_por_millar = intval($tiro_pantone_por_millar);

                                $costo_unitario_pantone = $row['costo_unitario'];
                                $costo_unitario_pantone = floatval($costo_unitario_pantone);

                                $pantone_tiro = $row['costo_unitario'];
                                $pantone_tiro = floatval($pantone_tiro);

                                $por_millar = intval($row['por_millar']);
                            }


                            if ($costo_unitario_pantone <= 0) {

                                $l_costo = false;
                            }


                            if (is_array($db_tmp)) {

                                unset($db_tmp);
                            }


                            $alfa = self:: deltax($cantidad_offset, $tiro_pantone_por_millar);

                            $costo_pantone_offset = 0;

                            $costo_pantone_offset = ($costo_unitario_pantone * $alfa * $num_tintas);
                            $costo_pantone_offset = floatval($costo_pantone_offset);


                            $aOffG[$i]["costo_unitario_tiro"] = $costo_unitario_pantone;


                            // Tirro Pantone
                            $aOffG[$i]['costo_unitario_tiro'] = $pantone_tiro;


                            $delta = self:: deltax($cantidad_offset, $por_millar);

                            $costo_tot_tiro = floatval($pantone_tiro * $delta);

                            $aOffG[$i]['costo_tot_tiro'] = $costo_tot_tiro;

                            $costo_tot_proceso = floatval($costo_corte + $costo_tot_laminas + $costo_tot_arreglo_pantone + $costo_tot_tiro);

                            $aOffG[$i]['costo_tot_proceso'] = $costo_tot_proceso;
                        }
                    } else {        // si es maquila

                        $aOff_maq_G[$i]["Tipo"]           = $nombre_tipo_offset;
                        $aOff_maq_G[$i]["cantidad"]       = $cantidad_offset;
                        $aOff_maq_G[$i]["num_tintas_maq"] = intval($num_tintas);


                        // Maquila lamina
                        $db_tmp = $ventas_model->costo_offset("Maquila lamina");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila lamina");


                        $costo_unitario_laminas_maquila = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_laminas_maquila = $row['costo_unitario'];
                            $costo_unitario_laminas_maquila = floatval($costo_unitario_laminas_maquila);
                        }


                        if ($costo_unitario_laminas_maquila <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_laminas = $costo_unitario_laminas_maquila * $num_tintas;
                        $costo_maquila_laminas = floatval($costo_maquila_laminas);


                        $aOff_maq_G[$i]["costo_unitario_laminas_maq"] = $costo_unitario_laminas_maquila;

                        $aOff_maq_G[$i]["costo_laminas_maq"] = $costo_maquila_laminas;


                        // Maquila arreglo
                        $db_tmp = $ventas_model->costo_offset("Maquila Arreglo");
                        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Maquila Arreglo");


                        $costo_unitario_maquila_arreglo = 0;

                        foreach ($db_tmp as $row) {

                            $costo_unitario_maquila_arreglo = $row['costo_unitario'];
                            $costo_unitario_maquila_arreglo = floatval($costo_unitario_maquila_arreglo);
                        }


                        if ($costo_unitario_maquila_arreglo <= 0) {

                            $l_costo = false;
                        }


                        if (is_array($db_tmp)) {

                            unset($db_tmp);
                        }


                        $costo_maquila_arreglo = $costo_unitario_maquila_arreglo * $num_tintas;
                        $costo_maquila_arreglo = floatval($costo_maquila_arreglo);


                        $aOff_maq_G[$i]["costo_unitario_arreglo_maq"] = $costo_unitario_maquila_arreglo;

                        $aOff_maq_G[$i]["costo_arreglo_maq"] = $costo_maquila_arreglo;


                        if ($nombre_tipo_offset == "Seleccion") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila");


                            $maquila_costo_unitario = 0;
                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }

                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }


                            $delta = $ventas_model->deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $aOff_maq_G[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_G[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_G[$i]["costo_tot_maquila"] = $costo_maquila;
                        }


                        if ($nombre_tipo_offset == "Pantone") {

                            $maquila_db_rango = $ventas_model->costo_maquila_rango("Maquila Pantone");


                            foreach ($maquila_db_rango as $row) {

                                $por_millar_maq = 1;

                                $tiraje_min_maq = intval($row['tiraje_minimo']);
                                $tiraje_max_maq = intval($row['tiraje_maximo']);

                                if ($cantidad_offset >= $tiraje_min_maq and $cantidad_offset <= $tiraje_max_maq) {

                                    $maquila_costo_unitario = floatval($row['costo_unitario']);
                                    $por_millar_maq = intval($row['por_millar']);

                                    break;
                                }
                            }


                            if (is_array($maquila_db_rango)) {

                                unset($maquila_db_rango);
                            }



                            $delta = self:: deltax($cantidad_offset, $por_millar_maq);

                            $costo_maquila = $delta * $maquila_costo_unitario * $num_tintas;
                            $costo_maquila = floatval($costo_maquila);


                            $aOff_maq_G[$i]["costo_unitario_maq"] = $maquila_costo_unitario;

                            $aOff_maq_G[$i]["por_millar_maq"] = $por_millar_maq;

                            $aOff_maq_G[$i]["costo_tot_maquila"] = $costo_maquila;
                        }
                    }
                }


                if ($Nombre_proceso === "Digital") {

                    $es_digital         = true;
                    $nombre_tipo_offset = "Seleccion";

                    $costo_unitario_digital = 0;
                    $merma_digital          = 0;
                    $cantidad_digital       = 0;

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $merma_digital = $_POST['digital'];
                    $merma_digital = intval($merma_digital);

                    $cantidad_digital = $cantidad;
                    $cantidad_digital = intval($cantidad_digital);

                    $delta = self:: deltax($cantidad_digital, 1);

                    $cantidad_digital = $delta;

                    $digital_db_rango = $ventas_model->costo_digital_rango("frente");


                    foreach ($digital_db_rango as $row) {

                        $es_maquila = $row['es_maquila'];
                        $tiraje_min = $row['tiraje_minimo'];
                        $tiraje_max = $row['tiraje_maximo'];

                        $es_maquila = intval($es_maquila);
                        $tiraje_min = intval($tiraje_min);
                        $tiraje_max = intval($tiraje_max);

                        if ($cantidad_digital >= $tiraje_min and $cantidad_digital <= $tiraje_max and !$es_maquila) {

                            $costo_unitario_digital = 0;

                            $costo_unitario_digital = $row['costo_unitario'];
                            $costo_unitario_digital = floatval($row['costo_unitario']);

                            break;
                        }
                    }


                    if (is_array($digital_db_rango)) {

                        unset($digital_db_rango);
                    }


                    $costo_tot_digital = $costo_unitario_digital * $cantidad_digital;
                    $costo_tot_digital = floatval($costo_tot_digital);


                    $aDigG[$i]["cantidad"] = $cantidad_digital;


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


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_tmp  = 1;
                    $num_tintas_adic = 1;

                    $cantidad_color_merma = $cantidad;


                    if ($tiraje < $cantidad_minima) {

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = 0;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    } else {

                        $cantidad_adic = $tiraje - $cantidad_minima;

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        $merma_color      = $cantidad_color_merma;
                        $merma_color_adic = $cant_adic * $adicional;
                        $merma_tot        = $merma_color + $merma_color_adic;
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_DigG = [];

                    $aMerma_DigG['merma_min']  = $merma_color;
                    $aMerma_DigG['merma_adic'] = $merma_color_adic;
                    $aMerma_DigG['merma_tot']  = $merma_tot;

                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelG["cortes"]);

                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelG["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_DigG['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_DigG['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_DigG['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_DigG['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aDigG[$i]["mermas"] = $aMerma_DigG;

                    if (is_array($aMerma_DigG)) {

                        unset($aMerma_DigG);
                    }


                    $aDigG[$i]["costo_unitario"]    = $costo_unitario_digital;
                    $aDigG[$i]["costo_tot_proceso"] = $costo_tot_digital;
                }



                if ($Nombre_proceso === "Serigrafia") {

                    $es_serigrafia = true;

                    $costo_unitario_serigrafia = 0;
                    $merma_serigrafia          = 0;
                    $cantidad_serigrafia       = 0;

                    $merma_serigrafia = $_POST['serigrafia'];
                    $merma_serigrafia = intval($merma_serigrafia);

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);


                    $aImp_tmp = json_decode($_POST['aImpG'], true);


                    $num_tintas = $aImp_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $tipo_offset_serigrafia = $aImp_tmp[$i]['tipoSeri'];
                    $tipo_offset_serigrafia = trim(strval($tipo_offset_serigrafia));

                    $cantidad_serigrafia = $cantidad;

                    $rango_db_tmp = $ventas_model->costo_serigrafia_rango("cantidad");


                    $costo_unitario_tiro = 0;
                    $por_cada            = 0;
                    $delta               = 0;

                    // corregir deltax en todos los casos
                    foreach ($rango_db_tmp as $row) {

                        $tiraje_min = intval($row['tiraje_minimo']);
                        $tiraje_max = intval($row['tiraje_maximo']);

                        if ($cantidad_serigrafia >= $tiraje_min and $cantidad_serigrafia <= $tiraje_max) {

                            $costo_unitario_tiro = floatval($row['costo_unitario']);
                            $por_cada = intval($row['por_cada']);

                            $delta = self:: deltax($cantidad_serigrafia, $por_cada);

                            break;
                        }
                    }


                    if (is_array($rango_db_tmp)) {

                        unset($rango_db_tmp);
                    }

                    $costo_tiro = ($costo_unitario_tiro * $delta * $num_tintas);
                    $costo_tiro = floatval($costo_tiro);


                    // Arreglo
                    $arreglo_db_tmp = $ventas_model->costo_arreglo_serigrafia("Arreglo");

                    $costo_arreglo_seri = $arreglo_db_tmp['costo_unitario'];


                    if (is_array($arreglo_db_tmp)) {

                        unset($arreglo_db_tmp);
                    }


                    $costo_unitario_arreglo_serigrafia = floatval($costo_arreglo_seri);

                    $costo_arreglo_serigrafia = $costo_unitario_arreglo_serigrafia * $num_tintas;
                    $costo_arreglo_serigrafia = floatval($costo_arreglo_serigrafia);

                    $costo_total_serigrafia = $costo_tiro + $costo_arreglo_serigrafia;
                    $costo_total_serigrafia = floatval($costo_total_serigrafia);


                    $aSerG[$i]["tipo"]       = $tipo_offset_serigrafia;
                    $aSerG[$i]["cantidad"]   = $cantidad;
                    $aSerG[$i]["num_tintas"] = $num_tintas;


                    $Merma_SerEmp_tmp = $ventas_model->getCotizaMermaSerigrafia();

                    foreach ($Merma_SerEmp_tmp as $row) {

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


                    if (is_array($Merma_SerEmp_tmp)) {

                        unset($Merma_SerEmp_tmp);
                    }


                    $tiraje = intval($_POST['qty']);

                    $merma_color      = 0;
                    $merma_color_adic = 0;
                    $num_tintas_adic  = 0;

                    $num_tintas_adic = $num_tintas - 4;


                    if ($num_tintas >= 1 and $num_tintas <= 4) {

                        // $cantidad_color_merma
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
                            $merma_tot        = $merma_color;
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

                        $cant_adic = self:: deltax($cantidad_adic, $por_cada_x);

                        if ($num_tintas >= 1 and $num_tintas <= 4) {

                            $merma_color      = $cantidad_color_merma;
                            $merma_color_adic = $cant_adic * $cantidad_color_merma;
                            $merma_tot        = $merma_color + $merma_color_adic;
                        } else {

                            $merma_color      = $c_4colores;

                            $merma_color_adic = (($num_tintas - 4) * $adicional_1color * $cant_adic);

                            $merma_tot        = $merma_color + $merma_color_adic;
                        }
                    }

                    $merma_tot = $merma_color + $merma_color_adic;


                    $aMerma_SerG = [];

                    $aMerma_SerG['merma_min']  = $merma_color;
                    $aMerma_SerG['merma_adic'] = $merma_color_adic;
                    $aMerma_SerG['merma_tot']  = $merma_tot;


                    $tot_merma_cortes  = intval($merma_tot);
                    $cortes_por_pliego = intval($aPapelG["cortes"]);

                    $tot_pliegos_merma_tmp = self:: deltax($tot_merma_cortes, $cortes_por_pliego);

                    $costo_unit_papel_merma = floatval($aPapelG["costo_unitario"]);
                    $cortes_papel_emp = intval($aPapelEmp["costo_unitario"]);

                    $costo_tot_merma = floatval($tot_pliegos_merma_tmp * $costo_unit_papel_merma);

                    $aMerma_SerG['cortes_por_pliego'] = $cortes_por_pliego;
                    $aMerma_SerG['merma_tot_pliegos'] = intval($tot_pliegos_merma_tmp);

                    $aMerma_SerG['costo_unit_papel_merma'] = $costo_unit_papel_merma;

                    $aMerma_SerG['costo_tot_pliegos_merma'] = $costo_tot_merma;


                    $aSerG[$i]["mermas"] = $aMerma_SerG;


                    if (is_array($aMerma_SerG)) {

                        unset($aMerma_SerG);
                    }


                    $aSerG[$i]["costo_unitario_arreglo"] = $costo_unitario_arreglo_serigrafia;

                    $aSerG[$i]["costo_arreglo"] = $costo_arreglo_serigrafia;

                    $aSerG[$i]["costo_unitario_tiro"] = $costo_unitario_tiro;

                    $aSerG[$i]["costo_tiro"] = $costo_tiro;

                    $aSerG[$i]["costo_tot_proceso"] = $costo_total_serigrafia;
                }
            }
        }


        $cantidad = $_POST['qty'];
        $cantidad = intval($cantidad);

        $cantidad_offset = $cantidad;


        // costo de corte
        $db_tmp = $ventas_model->costo_offset("Corte");
        //$db_tmp = $ventas_model->costo_proceso("proc_offset", "Corte");


        $costo_unitario_corte = 0;

        foreach ($db_tmp as $row) {

            $costo_unitario_corte = $row['costo_unitario'];
            $costo_unitario_corte = floatval($costo_unitario_corte);

            $costo_corte_por_millar = $row['por_millar'];
            $costo_corte_por_millar = intval($costo_corte_por_millar);
        }


        if ($costo_unitario_corte <= 0) {

            $l_costo = false;
        }


        if (is_array($db_tmp)) {

            unset($db_tmp);
        }


        $delta = 0;

        $delta = self:: deltax($cantidad_offset, $costo_corte_por_millar);

        $costo_corte = $costo_unitario_corte * $delta;
        $costo_corte = floatval($costo_corte);

        $aJson['costo_corte']   = $costo_corte;
        $aJson['Papel_Empalme'] = $aPapelEmp;
        $aJson['Papel_FCaj']    = $aPapelFCaj;
        $aJson['Papel_FCar']    = $aPapelFCar;
        $aJson['Papel_Guarda']  = $aPapelG;
        $aJson['CartonCaj']     = $aCartonCajon;
        $aJson['CartonCar']     = $aCartonCartera;


        if (count($aOffG) > 0 ) {

            $aJson['OffG'] = $aOffG;

            if (is_array($aOffG)) {

                unset($aOffG);
            }
        }


        if (count($aOff_maq_G) > 0) {

            $aJson['Off_maq_G'] = $aOff_maq_G;

            if (is_array($aOff_maq_G)) {

                unset($aOff_maq_G);
            }
        }


        if (count($aDigG) > 0) {

            $aJson['DigG'] = $aDigG;

            if (is_array($aDigG)) {

                unset($aDigG);
            }
        }


        if (count($aSerG) > 0) {

            $aJson['SerG'] = $aSerG;

            if (is_array($aSerG)) {

                unset($aSerG);
            }
        }



// =========== Termina los calculos de la Guarda ===========




// =========== Inicia boton acabados =======================



// =========== Inicia Empalme ==============================


    $tiro_HS = intval($_POST['qty']);

    $margen = 0;

    $aAcb = json_decode($_POST['aAcb'], true);

    $cuantos_aAcb = count($aAcb);


    $aAcbLam   = [];
    $aAcbHS    = [];
    $aAcbGrab  = [];
    $aAcbRet   = [];
    $aAcbPE    = [];
    $aAcbMaq   = [];
    $aAcbBUV   = [];
    $aAcbLaser = [];
    $aAcbSuaje = [];
    $aMermaEmp = [];


    for ($i = 0; $i < $cuantos_aAcb; $i++) {

        $tipo_acabado = trim(strval($aAcb[$i]['Tipo_acabado']));


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = trim(strval($aAcb[$i]['tipoGrabado']));

            $LargoLam = intval($_POST['base']);
            $AnchoLam = intval($_POST['alto']);

            $margen = 0;

            switch ($tipoGrabado) {
                case 'Mate':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Mate");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;

                    $aAcbLam[$i]['costo_unitario']    = $laminado_costo_unitario;
                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Mate'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));

                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;

                    $aAcbLam[$i]['costo_unitario']    = $laminado_costo_unitario;
                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Soft_Touch'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));

                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;

                    $aAcbLam[$i]['costo_unitario']    = $laminado_costo_unitario;
                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Anti_Scratch'] = intval($_POST['laminado']);

                    break;
                case 'Superadherente':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Superadherente");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));

                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;

                    $aAcbLam[$i]['costo_unitario']    = $laminado_costo_unitario;
                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Superadherente'] = intval($_POST['laminado']);

                    break;
                case 'Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Brillante");

                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;
                    $aAcbLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;

                    $aAcbLam[$i]['costo_unitario']    = $laminado_costo_unitario;
                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Anti_Scratch_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);
                        $tipo_impresion         = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbLam[$i]['tipo_impresion'] = $tipo_impresion;
                    $aAcbLam[$i]['Largo']          = intval($LargoLam + $margen);
                    $aAcbLam[$i]['Ancho']          = intval($AnchoLam + $margen);
                    $aAcbLam[$i]['area']           = $area_laminado;

                    $aAcbLam[$i]['costo_unitario']    = $laminado_costo_unitario;
                    $aAcbLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaEmp['acbLam_Soft_Touch_Brillante'] = intval($_POST['laminado']);

                    break;
            }

            $merma_HS = $ventas_model->merma_acabados("Laminado");

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
            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelEmp["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelEmp["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbLam[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcb[$i]['LargoHS']);
            $AnchoHS = intval($aAcb[$i]['AnchoHS']);
            $ColorHS = trim(strval($aAcb[$i]['ColorHS']));

            $tipoGrabadoHS = trim(strval($aAcb[$i]['tipoGrabado']));

            $placa_area = 0;

            switch ($tipoGrabadoHS) {
                case 'Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;
                    //$placa_area    = floatval($LargoHS * $AnchoHS);


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);

                    $aAcbHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbHS[$i]['Largo']       = $LargoHS;
                    $aAcbHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbHS[$i]['Color']       = $ColorHS;
                    $aAcbHS[$i]['placa_area']  = $placa_area;

                    $aAcbHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;
                    $aAcbHS[$i]['placa_costo']          = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }

                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbHS[$i]['pelicula_costo'] = $pelicula_costo;


                    $pelicula_area_costo_unitario = floatval($pelicula_area * $pelicula_costo_unitario);


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }

                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbHS[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $estampado_costo_proceso = $placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbHS[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbHS[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbHS[$i]['costo_tot_proceso'] = $estampado_costo_proceso;


                    $aMermaEmp['acbHS_Estampado']   = intval($_POST['hs']);

                    break;
                case 'HG1 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }

                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbHS[$i]['Largo']       = $LargoHS;
                    $aAcbHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbHS[$i]['Color']       = $ColorHS;

                    $aAcbHS[$i]['placa_area'] = $placa_area;

                    $aAcbHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }

                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbHS[$i]['pelicula_costo'] = $pelicula_costo;


                    $pelicula_area_costo_unitario = floatval($pelicula_area * $pelicula_costo_unitario);


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }

                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbHS[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg1_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbHS[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbHS[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbHS[$i]['costo_tot_proceso'] = $hg1_estampado_costo_proceso;


                    $aMermaEmp['acbHS_HG1_Estampado'] = intval($_POST['hs']);

                    break;
                case 'HG2 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }

                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbHS[$i]['Largo']       = $LargoHS;
                    $aAcbHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbHS[$i]['Color']       = $ColorHS;
                    $aAcbHS[$i]['placa_area']  = $placa_area;

                    $aAcbHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }

                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbHS[$i]['pelicula_costo'] = $pelicula_costo;


                    $pelicula_area_costo_unitario = floatval($pelicula_area * $pelicula_costo_unitario);



                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbHS[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg2_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbHS[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbHS[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbHS[$i]['costo_tot_proceso'] = $hg2_estampado_costo_proceso;


                    $aMermaEmp['acbHS_HG2_Estampado'] = intval($_POST['hs']);

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
            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelEmp["cortes"]);

            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);

            $papel_costo_unit_tmp = floatval($aPapelEmp["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbHS[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado = trim(strval($aAcb[$i]['tipoGrabado']));

            $LargoGrab     = $aAcb[$i]['Largo'];
            $AnchoGrab     = $aAcb[$i]['Ancho'];
            $ubicacionGrab = $aAcb[$i]['ubicacion'];


            switch ($tipoGrabado) {
                case 'G1 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G1 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_area = floatval($placa_LargoGrab * $placa_AnchoGrab);


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbGrab[$i]['placa_area']  = $placa_area;

                    $aAcbGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G1 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGrab[$i]['arreglo_costo'] = $arreglo_costo_unitario;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G1 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $aAcbGrab[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbGrab[$i]['costo_tiro'] = $estampado_costo_tiro;


                    $g1_estampado_costo_proceso = $placa_costo + $arreglo_costo_unitario + $estampado_costo_tiro;


                    $aAcbGrab[$i]['costo_tot_proceso'] = $g1_estampado_costo_proceso;


                    $aMermaEmp['acbGrab_G1_Estampado'] = intval($_POST['grabadotot']);

                    break;
                case 'G2 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G2 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_areaGrab = $placa_LargoGrab * $placa_AnchoGrab;


                    if ($placa_areaGrab < $placa_tamano_minimo) {

                        $placa_areaGrab = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_areaGrab * $placa_costo_unitario);


                    $aAcbGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbGrab[$i]['placa_area']  = $placa_areaGrab;

                    $aAcbGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G2 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $arreglo_costo = $arreglo_costo_unitario;


                    $aAcbGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGrab[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);


                    $estampado_tmp = $ventas_model->costo_grabado("G2 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $aAcbGrab[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbGrab[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $g2_estampado_costo_proceso = $placa_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbGrab[$i]['costo_tot_proceso'] = $g2_estampado_costo_proceso;


                    $aMermaEmp['acbGrab_G2_Estampado'] = intval($_POST['grabadotot']);

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
            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelEmp["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelEmp["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbGrab[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = trim(strval($aAcb[$i]['tipoGrabado']));

            $Largo = floatval($aAcb[$i]['LargoSuaje']);
            $Ancho = floatval($aAcb[$i]['AnchoSuaje']);


            switch ($tipoGrabado) {
                case 'Perimetral':

                    $aAcbSuaje[$i]['tipoGrabado'] = $tipoGrabado;

                    $aAcbSuaje[$i]['Largo'] = $Largo;
                    $aAcbSuaje[$i]['Ancho'] = $Ancho;

                    $perimetro_suaje = floatval($Largo + $Ancho);


                    $aAcbSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Perimetral");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;


                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);


                    $aAcbSuaje[$i]['costo_arreglo'] = $arreglo_costo;


                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;

                    $aAcbSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;

                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;

                    $aAcbSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaEmp['acbSuaje_Perimetral'] = intval($_POST['suaje']);

                    break;
                case 'Figura':

                    $aAcbSuaje[$i]['tipoGrabado'] = $tipoGrabado;

                    $aAcbSuaje[$i]['Largo'] = $Largo;
                    $aAcbSuaje[$i]['Ancho'] = $Ancho;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Figura");


                    $figura_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $figura_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $perimetro = floatval($Largo + $Ancho);


                    $aAcbSuaje[$i]['perimetro'] = $perimetro;


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbSuaje[$i]['costo_arreglo'] = $arreglo_costo;

                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $figura_costo_unitario * $perimetro);


                    $aAcbSuaje[$i]['tiro_costo_unitario'] = $figura_costo_unitario;

                    $aAcbSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;


                    $aAcbSuaje[$i]['costo_tot_proceso'] = $arreglo_costo + $suaje_costo_tiro;


                    $aMermaEmp['acbSuaje_Figura'] = intval($_POST['suaje']);


                    break;
            }


            $merma_HS = $ventas_model->merma_acabados("Suaje");


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
            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelEmp["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelEmp["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbSuaje[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }

    }


    if (count($aAcbLam) > 0) {

        $aJson['Laminado'] = $aAcbLam;

        if (is_array($aAcbLam)) {

            unset($aAcbLam);
        }
    }


    if (count($aAcbHS) > 0) {

        $aJson['HotStamping'] = $aAcbHS;


        if (is_array($aAcbHS)) {

            unset($aAcbHS);
        }
    }


    if (count($aAcbGrab) > 0) {

        $aJson['Grabado'] = $aAcbGrab;

        if (is_array($aAcbGrab)) {

            unset($aAcbGrab);
        }
    }


    if (count($aAcbSuaje) > 0) {

        $aJson['Suaje'] = $aAcbSuaje;

        if (is_array($aAcbSuaje)) {

            unset($aAcbSuaje);
        }
    }


// ============= Termina Empalme ================



// ============= Forro del Cajon ================


    $aAcbFCaj = json_decode($_POST['aAcbFCaj'], true);

    $cuantos_aAcbFCaj = count($aAcbFCaj);


    $aAcbFcajLam   = [];
    $aAcbFcajHS    = [];
    $aAcbFcajGrab  = [];
    $aAcbFcajRet   = [];
    $aAcbFcajPE    = [];
    $aAcbFcajMaq   = [];
    $aAcbFcajBUV   = [];
    $aAcbFcajLaser = [];
    $aAcbFcajSuaje = [];
    $aMermaFcaj    = [];


    for ($i = 0; $i < $cuantos_aAcbFCaj; $i++) {

        $tipo_acabado = trim(strval($aAcbFCaj[$i]['Tipo_acabado']));


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = trim(strval($aAcbFCaj[$i]['tipoGrabado']));

            $LargoLam = intval($_POST['base']);
            $AnchoLam = intval($_POST['alto']);

            $margen = 1;

            switch ($tipoGrabado) {
                case 'Mate':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Mate");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);
                        $tipo_impresion          = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Mate'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Soft_Touch'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Anti_Scratch'] = intval($_POST['laminado']);

                    break;
                case 'Superadherente':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Superadherente");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Superadherente'] = intval($_POST['laminado']);

                    break;
                case 'Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Anti_Scratch_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcajLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcajLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcajLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcajLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcajLam[$i]['area']  = $area_laminado;

                    $aAcbFcajLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcajLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcaj['acbLam_Soft_Touch_Brillante'] = intval($_POST['laminado']);

                    break;
            }

            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("Laminado");

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

            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCaj["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelFCaj["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcajLam[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFCaj[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFCaj[$i]['AnchoHS']);
            $ColorHS = trim(strval($aAcbFCaj[$i]['ColorHS']));

            $tipoGrabadoHS = trim(strval($aAcbFCaj[$i]['tipoGrabado']));

            switch ($tipoGrabadoHS) {
                case 'Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcajHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbFcajHS[$i]['Largo']       = $LargoHS;
                    $aAcbFcajHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbFcajHS[$i]['Color']       = $ColorHS;

                    $aAcbFcajHS[$i]['placa_area'] = $placa_area;

                    $aAcbFcajHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcajHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbFcajHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbFcajHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbFcajHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbFcajHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbFcajHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbFcajHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcajHS[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Estampado");

                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $estampado_costo_proceso = $placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbFcajHS[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcajHS[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcajHS[$i]['costo_tot_proceso'] = $estampado_costo_proceso;


                    $aMermaFcaj['acbHS_Estampado'] = intval($_POST['hs']);

                    break;
                case 'HG1 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;

                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcajHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbFcajHS[$i]['Largo']       = $LargoHS;
                    $aAcbFcajHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbFcajHS[$i]['Color']       = $ColorHS;

                    $aAcbFcajHS[$i]['placa_area'] = $placa_area;

                    $aAcbFcajHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcajHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbFcajHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbFcajHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbFcajHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbFcajHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbFcajHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }

                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbFcajHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcajHS[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg1_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbFcajHS[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcajHS[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcajHS[$i]['costo_tot_proceso'] = $hg1_estampado_costo_proceso;


                    $aMermaFcaj['acbHS_HG1_Estampado'] = intval($_POST['hs']);

                    break;
                case 'HG2 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcajHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbFcajHS[$i]['Largo']       = $LargoHS;
                    $aAcbFcajHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbFcajHS[$i]['Color']       = $ColorHS;
                    $aAcbFcajHS[$i]['placa_area']  = $placa_area;

                    $aAcbFcajHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcajHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbFcajHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbFcajHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbFcajHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbFcajHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbFcajHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbFcajHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcajHS[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }



                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg2_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbFcajHS[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcajHS[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcajHS[$i]['costo_tot_proceso'] = $hg2_estampado_costo_proceso;


                    $aMermaFcaj['acbHS_HG2_Estampado'] = intval($_POST['hs']);

                    break;
            }

            // calcula merma
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


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCaj["cortes"]);

            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);

            $papel_costo_unit_tmp = floatval($aPapelFCaj["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcajHS[$i]['mermas'] = $aMerma_HS;

            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado = trim(strval($aAcbFCaj[$i]['tipoGrabado']));

            $LargoGrab     = $aAcbFCaj[$i]['Largo'];
            $AnchoGrab     = $aAcbFCaj[$i]['Ancho'];
            $ubicacionGrab = $aAcbFCaj[$i]['ubicacion'];

            switch ($tipoGrabado) {
                case 'G1 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G1 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_area = floatval($placa_LargoGrab * $placa_AnchoGrab);


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcajGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcajGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbFcajGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbFcajGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbFcajGrab[$i]['placa_area']  = $placa_area;

                    $aAcbFcajGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcajGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G1 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbFcajGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcajGrab[$i]['arreglo_costo'] = $arreglo_costo_unitario;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G1 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $aAcbFcajGrab[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcajGrab[$i]['costo_tiro'] = $estampado_costo_tiro;


                    $g1_estampado_costo_proceso = $placa_costo + $arreglo_costo_unitario + $estampado_costo_tiro;


                    $aAcbFcajGrab[$i]['costo_tot_proceso'] = $g1_estampado_costo_proceso;


                    $aMermaFcaj['acbGrab_G1_Estampado'] = intval($_POST['grabadotot']);

                    break;
                case 'G2 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G2 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_areaGrab = $placa_LargoGrab * $placa_AnchoGrab;


                    if ($placa_areaGrab < $placa_tamano_minimo) {

                        $placa_areaGrab = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_areaGrab * $placa_costo_unitario);


                    $aAcbFcajGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcajGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbFcajGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbFcajGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbFcajGrab[$i]['placa_area']  = $placa_AnchoGrab;

                    $aAcbFcajGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcajGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G2 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $arreglo_costo = $arreglo_costo_unitario;


                    $aAcbFcajGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcajGrab[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G2 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $g2_estampado_costo_proceso = $placa_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbFcajGrab[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcajGrab[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcajGrab[$i]['costo_tot_proceso'] = $g2_estampado_costo_proceso;


                    $aMermaFcaj['acbGrab_G2_Estampado'] = intval($_POST['grabadotot']);

                    break;
            }

            // calcula merma
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


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCaj["cortes"]);

            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);

            $papel_costo_unit_tmp = floatval($aPapelFCaj["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcajGrab[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = trim(strval($aAcbFCaj[$i]['tipoGrabado']));

            $Largo = floatval($aAcbFCaj[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFCaj[$i]['AnchoSuaje']);


            switch ($tipoGrabado) {
                case 'Perimetral':

                    $aAcbFcajSuaje[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcajSuaje[$i]['Largo']       = $Largo;
                    $aAcbFcajSuaje[$i]['Ancho']       = $Ancho;

                    $perimetro_suaje = floatval($Largo + $Ancho);


                    $aAcbFcajSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Perimetral");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbFcajSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;


                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);


                    $aAcbFcajSuaje[$i]['costo_arreglo'] = $arreglo_costo;


                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbFcajSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;

                    $aAcbFcajSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;

                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;

                    $aAcbFcajSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaFcaj['acbSuaje_Perimetral'] = intval($_POST['suaje']);

                    break;
                case 'Figura':

                    $aAcbFcajSuaje[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcajSuaje[$i]['Largo']       = $Largo;
                    $aAcbFcajSuaje[$i]['Ancho']       = $Ancho;


                    $perimetro_suaje = floatval($Largo + $Ancho);

                    $aAcbFcajSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Figura");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbFcajSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;


                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);


                    $aAcbFcajSuaje[$i]['costo_arreglo'] = $arreglo_costo;


                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbFcajSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;

                    $aAcbFcajSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;

                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;

                    $aAcbFcajSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaFcaj['acbSuaje_Figura'] = intval($_POST['suaje']);


                    break;
            }

            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("Suaje");

            foreach ($merma_HS as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }

            if (is_array($merma_HS)) {

                unset($merma_HS);
            }


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCaj["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelFCaj["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcajSuaje[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }
    }


    if (count($aAcbFcajLam) > 0) {

        $aJson['LaminadoFcaj'] = $aAcbFcajLam;

        if (is_array($aAcbFcajLam)) {

            unset($aAcbFcajLam);
        }
    }


    if (count($aAcbFcajHS) > 0) {

        $aJson['HotStampingFcaj'] = $aAcbFcajHS;


        if (is_array($aAcbFcajHS)) {

            unset($aAcbFcajHS);
        }
    }


    if (count($aAcbFcajGrab) > 0) {

        $aJson['GrabadoFcaj'] = $aAcbFcajGrab;


        if (is_array($aAcbFcajGrab)) {

            unset($aAcbFcajGrab);
        }
    }


    if (count($aAcbFcajSuaje) > 0) {

        $aJson['SuajeFcaj'] = $aAcbFcajSuaje;


        if (is_array($aAcbFcajSuaje)) {

            unset($aAcbFcajSuaje);
        }
    }


// =========== Termina Forro del Cajon ==============




// =========== Inicia Forro de la Cartera ==============


    $aAcbFCar = json_decode($_POST['aAcbFCar'], true);

    $cuantos_aAcbFCar = count($aAcbFCar);


    $aAcbFcarLam   = [];
    $aAcbFcarHS    = [];
    $aAcbFcarGrab  = [];
    $aAcbFcarRet   = [];
    $aAcbFcarPE    = [];
    $aAcbFcarMaq   = [];
    $aAcbFcarBUV   = [];
    $aAcbFcarLaser = [];
    $aAcbFcarSuaje = [];
    $aMermaFcar    = [];


    for ($i = 0; $i < $cuantos_aAcbFCar; $i++) {

        $tipo_acabado = trim(strval($aAcbFCar[$i]['Tipo_acabado']));


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = trim(strval($aAcbFCar[$i]['tipoGrabado']));

            $LargoLam = intval($_POST['base']);
            $AnchoLam = intval($_POST['alto']);

            $margen = 1;

            switch ($tipoGrabado) {
                case 'Mate':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Mate");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);
                        $tipo_impresion          = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcar['acbLam_Mate'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcar['acbLam_Soft_Touch'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;



                    $aMermaFcar['acbLam_Anti_Scratch'] = intval($_POST['laminado']);

                    break;
                case 'Superadherente':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Superadherente");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcar['acbLam_Superadherente'] = intval($_POST['laminado']);

                    break;
                case 'Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcar['acbLam_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }

                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcar['acbLam_Anti_Scratch_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }

                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbFcarLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbFcarLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbFcarLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbFcarLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbFcarLam[$i]['area']  = $area_laminado;

                    $aAcbFcarLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbFcarLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaFcar['acbLam_Soft_Touch_Brillante'] = intval($_POST['laminado']);

                    break;
            }

            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("Laminado");

            foreach ($merma_HS as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_HS)) {

                unset($merma_HS);
            }


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCar["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelFCar["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcarLam[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbFCar[$i]['LargoHS']);
            $AnchoHS = intval($aAcbFCar[$i]['AnchoHS']);
            $ColorHS = trim(strval($aAcbFCar[$i]['ColorHS']));

            $tipoGrabadoHS = trim(strval($aAcbFCar[$i]['tipoGrabado']));

            switch ($tipoGrabadoHS) {
                case 'Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);

                    $aAcbFcarHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbFcarHS[$i]['Largo']       = $LargoHS;
                    $aAcbFcarHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbFcarHS[$i]['Color']       = $ColorHS;
                    $aAcbFcarHS[$i]['placa_area']  = $placa_area;

                    $aAcbFcarHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcarHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbFcarHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbFcarHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbFcarHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbFcarHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbFcarHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbFcarHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcarHS[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $estampado_costo_proceso = $placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbFcarHS[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcarHS[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcarHS[$i]['costo_tot_proceso'] = $estampado_costo_proceso;


                    $aMermaFcar['acbHS_Estampado'] = intval($_POST['hs']);

                    break;
                case 'HG1 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcarHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbFcarHS[$i]['Largo']       = $LargoHS;
                    $aAcbFcarHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbFcarHS[$i]['Color']       = $ColorHS;

                    $aAcbFcarHS[$i]['placa_area'] = $placa_area;

                    $aAcbFcarHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcarHS[$i]['placa_costo'] = $placa_costo;



                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Pelicula");

                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbFcarHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbFcarHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbFcarHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbFcarHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbFcarHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbFcarHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcarHS[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg1_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbFcarHS[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcarHS[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcarHS[$i]['costo_tot_proceso'] = $hg1_estampado_costo_proceso;

                    $aMermaFcar['acbHS_HG1_Estampado']  = intval($_POST['hs']);

                    break;
                case 'HG2 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcarHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbFcarHS[$i]['Largo']       = $LargoHS;
                    $aAcbFcarHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbFcarHS[$i]['Color']       = $ColorHS;

                    $aAcbFcarHS[$i]['placa_area'] = $placa_area;

                    $aAcbFcarHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcarHS[$i]['placa_costo'] = $placa_costo;



                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbFcarHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbFcarHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbFcarHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbFcarHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbFcarHS[$i]['pelicula_costo'] = $pelicula_costo;



                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbFcarHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcarHS[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg2_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbFcarHS[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcarHS[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcarHS[$i]['costo_tot_proceso'] = $hg2_estampado_costo_proceso;


                    $aMermaFcar['acbHS_HG2_Estampado'] = intval($_POST['hs']);

                    break;
            }

            // calcula merma
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


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCar["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelFCar["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcarHS[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado = trim(strval($aAcbFCar[$i]['tipoGrabado']));

            $LargoGrab     = $aAcbFCar[$i]['Largo'];
            $AnchoGrab     = $aAcbFCar[$i]['Ancho'];
            $ubicacionGrab = $aAcbFCar[$i]['ubicacion'];

            switch ($tipoGrabado) {
                case 'G1 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G1 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_area = floatval($placa_LargoGrab * $placa_AnchoGrab);


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbFcarGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcarGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbFcarGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbFcarGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbFcarGrab[$i]['placa_area']  = $placa_area;

                    $aAcbFcarGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcarGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G1 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbFcarGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcarGrab[$i]['arreglo_costo'] = $arreglo_costo_unitario;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G1 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $g1_estampado_costo_proceso = $placa_costo + $arreglo_costo_unitario + $estampado_costo_tiro;


                    $aAcbFcarGrab[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcarGrab[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcarGrab[$i]['costo_tot_proceso'] = $g1_estampado_costo_proceso;


                    $aMermaFcar['acbGrab_G1_Estampado'] = intval($_POST['grabadotot']);

                    break;
                case 'G2 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G2 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_areaGrab = $placa_LargoGrab * $placa_AnchoGrab;


                    if ($placa_areaGrab < $placa_tamano_minimo) {

                        $placa_areaGrab = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_areaGrab * $placa_costo_unitario);


                    $aAcbFcarGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcarGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbFcarGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbFcarGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbFcarGrab[$i]['placa_area']  = $placa_areaGrab;

                    $aAcbFcarGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbFcarGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G2 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $arreglo_costo = $arreglo_costo_unitario;


                    $aAcbFcarGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbFcarGrab[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G2 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $g2_estampado_costo_proceso = $placa_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbFcarGrab[$i]['costo_unitario'] = $estampado_costo_unitario;

                    $aAcbFcarGrab[$i]['costo_tiro'] = $estampado_costo_tiro;

                    $aAcbFcarGrab[$i]['costo_tot_proceso'] = $g2_estampado_costo_proceso;


                    $aMermaFcar['acbGrab_G2_Estampado'] = intval($_POST['grabadotot']);

                    break;
            }


            // calcula merma
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


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCar["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelFCar["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcarGrab[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = trim(strval($aAcbFCar[$i]['tipoGrabado']));

            $Largo = floatval($aAcbFCar[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbFCar[$i]['AnchoSuaje']);


            switch ($tipoGrabado) {
                case 'Perimetral':

                    $aAcbFcarSuaje[$i]['tipoGrabado'] = $tipoGrabado;

                    $aAcbFcarSuaje[$i]['Largo'] = $Largo;
                    $aAcbFcarSuaje[$i]['Ancho'] = $Ancho;

                    $perimetro_suaje = floatval($Largo + $Ancho);

                    $aAcbFcarSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Perimetral");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbFcarSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);

                    $aAcbFcarSuaje[$i]['costo_arreglo'] = $arreglo_costo;



                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbFcarSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;

                    $aAcbFcarSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;


                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;


                    $aAcbFcarSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaFcar['acbSuaje_Perimetral'] = intval($_POST['suaje']);

                    break;
                case 'Figura':

                    $aAcbFcarSuaje[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbFcarSuaje[$i]['Largo']       = $Largo;
                    $aAcbFcarSuaje[$i]['Ancho']       = $Ancho;


                    $perimetro_suaje = floatval($Largo + $Ancho);

                    $aAcbFcarSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Figura");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbFcarSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);

                    $aAcbFcarSuaje[$i]['costo_arreglo'] = $arreglo_costo;



                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbFcarSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;

                    $aAcbFcarSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;


                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;

                    $aAcbFcarSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaFcar['acbSuaje_Figura'] = intval($_POST['suaje']);


                    break;
            }


            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("Suaje");

            foreach ($merma_HS as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_HS)) {

                unset($merma_HS);
            }


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelFCar["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelFCar["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbFcarSuaje[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }
    }


    if (count($aAcbFcarLam) > 0) {

        $aJson['LaminadoFcar'] = $aAcbFcarLam;


        if (is_array($aAcbFcarLam)) {

            unset($aAcbFcarLam);
        }
    }


    if (count($aAcbFcarHS) > 0) {

        $aJson['HotStampingFcar'] = $aAcbFcarHS;


        if (is_array($aAcbFcarHS)) {

            unset($aAcbFcarHS);
        }
    }


    if (count($aAcbFcarGrab) > 0) {

        $aJson['GrabadoFcar'] = $aAcbFcarGrab;

        if (is_array($aAcbFcarGrab)) {

            unset($aAcbFcarGrab);
        }
    }


    if (count($aAcbFcarSuaje) > 0) {

        $aJson['SuajeFcar'] = $aAcbFcarSuaje;

        if (is_array($aAcbFcarSuaje)) {

            unset($aAcbFcarSuaje);
        }
    }


// =========== Termina Forro de la Cartera ==============



// =========== Inicia Guarda ==============



    $aAcbG = json_decode($_POST['aAcbG'], true);

    $cuantos_aAcbG = count($aAcbG);


    $aAcbGLam   = [];
    $aAcbGHS    = [];
    $aAcbGGrab  = [];
    $aAcbGRet   = [];
    $aAcbGPE    = [];
    $aAcbGMaq   = [];
    $aAcbGBUV   = [];
    $aAcbGLaser = [];
    $aAcbGSuaje = [];
    $aMermaG    = [];


    for ($i = 0; $i < $cuantos_aAcbG; $i++) {

        $tipo_acabado = trim(strval($aAcbG[$i]['Tipo_acabado']));


        if ($tipo_acabado == "Laminado") {

            $tipoGrabado = trim(strval($aAcbG[$i]['tipoGrabado']));

            $LargoLam = intval($_POST['base']);
            $AnchoLam = intval($_POST['alto']);

            $margen = 1;

            switch ($tipoGrabado) {
                case 'Mate':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Mate");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);
                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);
                        $tipo_impresion          = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']  = $tipoGrabado;

                    // $aAcbGLam[$i]['tipo_impresion']  = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Mate'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbGLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Soft_Touch'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbGLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Anti_Scratch'] = intval($_POST['laminado']);

                    break;
                case 'Superadherente':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Superadherente");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbGLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Superadherente'] = intval($_POST['laminado']);

                    break;
                case 'Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }



                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbGLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Anti Scratch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Anti Scratch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen)/100) * floatval(($AnchoLam + $margen)/100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbGLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Anti_Scratch_Brillante'] = intval($_POST['laminado']);

                    break;
                case 'Soft Touch Brillante':

                    $costo_laminado_tmp = $ventas_model->costo_laminado("Soft Touch Brillante");


                    $laminado_costo_unitario = 0;
                    foreach ($costo_laminado_tmp as $row) {

                        $laminado_costo_unitario = floatval($row['costo_unitario']);

                        $laminado_tiraje_minimo  = intval($row['tiraje_minimo']);
                        $laminado_tiraje_maximo  = intval($row['tiraje_maximo']);

                        $tipo_impresion = trim(strval($row['tipo_impresion']));
                    }


                    if (is_array($costo_laminado_tmp)) {

                        unset($costo_laminado_tmp);
                    }


                    $area_laminado = floatval(($LargoLam + $margen) / 100) * floatval(($AnchoLam + $margen) / 100);

                    $costo_laminado = floatval($area_laminado * $laminado_costo_unitario * intval($_POST['qty']));


                    $aAcbGLam[$i]['tipoGrabado']    = $tipoGrabado;
                    $aAcbGLam[$i]['tipo_impresion'] = $tipo_impresion;

                    $aAcbGLam[$i]['Largo'] = intval($LargoLam + $margen);
                    $aAcbGLam[$i]['Ancho'] = intval($AnchoLam + $margen);
                    $aAcbGLam[$i]['area']  = $area_laminado;

                    $aAcbGLam[$i]['costo_unitario'] = $laminado_costo_unitario;

                    $aAcbGLam[$i]['costo_tot_proceso'] = $costo_laminado;


                    $aMermaG['acbLam_Soft_Touch_Brillante'] = intval($_POST['laminado']);

                    break;
            }


            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("Laminado");

            foreach ($merma_HS as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_HS)) {

                unset($merma_HS);
            }


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelG["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelG["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbGLam[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "HotStamping") {

            $LargoHS = intval($aAcbG[$i]['LargoHS']);
            $AnchoHS = intval($aAcbG[$i]['AnchoHS']);
            $ColorHS = trim(strval($aAcbG[$i]['ColorHS']));

            $tipoGrabadoHS = trim(strval($aAcbG[$i]['tipoGrabado']));

            switch ($tipoGrabadoHS) {
                case 'Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);

                    $aAcbGHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbGHS[$i]['Largo']       = $LargoHS;
                    $aAcbGHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbGHS[$i]['Color']       = $ColorHS;
                    $aAcbGHS[$i]['placa_area']  = $placa_area;

                    $aAcbGHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbGHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbGHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbGHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbGHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbGHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbGHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbGHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGHS[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);


                    $aAcbGHS[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbGHS[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $estampado_costo_proceso = $placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro;

                    $aAcbGHS[$i]['costo_tot_proceso'] = $estampado_costo_proceso;


                    $aMermaG['acbHS_Estampado'] = intval($_POST['hs']);

                    break;
                case 'HG1 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbGHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbGHS[$i]['Largo']       = $LargoHS;
                    $aAcbGHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbGHS[$i]['Color']       = $ColorHS;
                    $aAcbGHS[$i]['placa_area']  = $placa_area;

                    $aAcbGHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbGHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbGHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbGHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbGHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbGHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbGHS[$i]['pelicula_costo'] = $pelicula_costo;


                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Arreglo");


                    $arreglo_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbGHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGHS[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG1 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG1 Estampado");


                    $estampado_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg1_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);



                    $aAcbGHS[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbGHS[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbFcarHS[$i]['costo_tot_proceso'] = $hg1_estampado_costo_proceso;

                    $estampado_costo_proceso = $placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro;

                    $aAcbGHS[$i]['costo_tot_proceso'] = $estampado_costo_proceso;


                    $aMermaG['acbHS_HG1_Estampado'] = intval($_POST['hs']);

                    break;
                case 'HG2 Estampado':

                    // placa
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Placa");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Placa");


                    $placa_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $placa_costo_unitario = $row['precio_unitario'];
                        $placa_costo_unitario = floatval($placa_costo_unitario);

                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($placa_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $placa_LargoHS = $LargoHS + $margen;
                    $placa_AnchoHS = $AnchoHS + $margen;
                    $placa_area    = $placa_LargoHS * $placa_AnchoHS;


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbGHS[$i]['tipoGrabado'] = $tipoGrabadoHS;
                    $aAcbGHS[$i]['Largo']       = $LargoHS;
                    $aAcbGHS[$i]['Ancho']       = $AnchoHS;
                    $aAcbGHS[$i]['Color']       = $ColorHS;
                    $aAcbGHS[$i]['placa_area']  = $placa_area;

                    $aAcbGHS[$i]['placa_costo_unitario'] = $placa_costo_unitario;

                    $aAcbGHS[$i]['placa_costo'] = $placa_costo;


                    // pelicula
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Pelicula");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Pelicula");


                    $pelicula_costo_unitario = 0;

                    foreach ($db_tmp as $row) {

                        $pelicula_costo_unitario = $row['precio_unitario'];
                        $pelicula_costo_unitario = floatval($pelicula_costo_unitario);

                        $pelicula_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($pelicula_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $pelicula_LargoHS = $LargoHS + $margen;
                    $pelicula_AnchoHS = $AnchoHS + $margen;
                    $pelicula_area    = $pelicula_LargoHS * $pelicula_AnchoHS;


                    if ($pelicula_area < $pelicula_tamano_minimo) {

                        $pelicula_area = $pelicula_tamano_minimo;
                    }


                    $pelicula_costo = floatval($pelicula_area * $pelicula_costo_unitario * $tiro_HS);


                    $aAcbGHS[$i]['pelicula_Largo'] = $pelicula_LargoHS;
                    $aAcbGHS[$i]['pelicula_Ancho'] = $pelicula_AnchoHS;
                    $aAcbGHS[$i]['pelicula_area']  = $pelicula_area;

                    $aAcbGHS[$i]['pelicula_costo_unitario'] = $pelicula_costo_unitario;

                    $aAcbGHS[$i]['pelicula_costo'] = $pelicula_costo;



                    // arreglo
                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Arreglo");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Arreglo");


                    $arreglo_costo_unitario = 0;
                    
                    foreach ($db_tmp as $row) {

                        $arreglo_costo_unitario = $row['precio_unitario'];
                        $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                        $arreglo_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if ($arreglo_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $arreglo_LargoHS = $LargoHS + $margen;
                    $arreglo_AnchoHS = $AnchoHS + $margen;
                    $arreglo_area    = $arreglo_LargoHS * $arreglo_LargoHS;


                    if ($arreglo_area < $arreglo_tamano_minimo) {

                        $arreglo_area = $arreglo_tamano_minimo;
                    }


                    $arreglo_costo = floatval($arreglo_costo_unitario);


                    $aAcbGHS[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGHS[$i]['arreglo_costo'] = $arreglo_costo;



                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $db_tmp = $ventas_model->costo_hotstamping("HG2 Estampado");
                    //$db_tmp = $ventas_model->costo_proceso("proc_hotstamping", "HG2 Estampado");


                    $estampado_costo_unitario = 0;
                    
                    foreach ($db_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = $row['precio_unitario'];
                            $estampado_costo_unitario = floatval($estampado_costo_unitario);

                            break;
                        }
                    }


                    if ($estampado_costo_unitario <= 0) {

                        $l_costo = false;
                    }


                    if (is_array($db_tmp)) {

                        unset($db_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $hg2_estampado_costo_proceso = floatval($placa_costo + $pelicula_costo + $arreglo_costo + $estampado_costo_tiro);


                    $aAcbGHS[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbGHS[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbGHS[$i]['costo_tot_proceso'] = $hg2_estampado_costo_proceso;


                    $aMermaG['acbHS_HG2 Estampado'] = intval($_POST['hs']);

                    break;
            }


            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("HotStamping");

            foreach ($merma_HS as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if(is_array($merma_HS)) {

                unset($merma_HS);
            }


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);

            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelG["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelG["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbGHS[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }


        if ($tipo_acabado == "Grabado") {

            $tipoGrabado = trim(strval($aAcbG[$i]['tipoGrabado']));

            $LargoGrab     = $aAcbG[$i]['Largo'];
            $AnchoGrab     = $aAcbG[$i]['Ancho'];
            $ubicacionGrab = $aAcbG[$i]['ubicacion'];

            switch ($tipoGrabado) {
                case 'G1 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G1 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_area = floatval($placa_LargoGrab * $placa_AnchoGrab);


                    if ($placa_area < $placa_tamano_minimo) {

                        $placa_area = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_area * $placa_costo_unitario);


                    $aAcbGGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbGGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbGGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbGGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbGGrab[$i]['placa_area']  = $placa_area;

                    $aAcbGGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;
                    $aAcbGGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G1 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbGGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGGrab[$i]['arreglo_costo'] = $arreglo_costo_unitario;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G1 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $g1_estampado_costo_proceso = $placa_costo + $arreglo_costo_unitario + $estampado_costo_tiro;


                    $aAcbGGrab[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbGGrab[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbGGrab[$i]['costo_tot_proceso'] = $g1_estampado_costo_proceso;


                    $aMermaG['acbGrab_G1_Estampado'] = intval($_POST['grabadotot']);

                    break;
                case 'G2 Estampado':

                    // placa
                    $costo_placa_tmp = $ventas_model->costo_grabado("G2 Placa");


                    $placa_costo_unitario = 0;
                    foreach ($costo_placa_tmp as $row) {

                        $placa_costo_unitario = floatval($row['precio_unitario']);
                        $placa_tamano_minimo  = floatval($row['tamano_minimo_placa']);
                    }


                    if (is_array($costo_placa_tmp)) {

                        unset($costo_placa_tmp);
                    }


                    $placa_LargoGrab = $LargoGrab + $margen;
                    $placa_AnchoGrab = $AnchoGrab + $margen;

                    $placa_areaGrab = $placa_LargoGrab * $placa_AnchoGrab;


                    if ($placa_areaGrab < $placa_tamano_minimo) {

                        $placa_areaGrab = $placa_tamano_minimo;
                    }


                    $placa_costo = floatval($placa_areaGrab * $placa_costo_unitario);


                    $aAcbGGrab[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbGGrab[$i]['Largo']       = $placa_LargoGrab;
                    $aAcbGGrab[$i]['Ancho']       = $placa_AnchoGrab;
                    $aAcbGGrab[$i]['ubicacion']   = $ubicacionGrab;
                    $aAcbGGrab[$i]['placa_area']  = $placa_areaGrab;

                    $aAcbGGrab[$i]['placa_costo_unitario'] = $placa_costo_unitario;
                    $aAcbGGrab[$i]['placa_costo'] = $placa_costo;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_grabado("G2 Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['precio_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $arreglo_costo = $arreglo_costo_unitario;


                    $aAcbGGrab[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $aAcbGGrab[$i]['arreglo_costo'] = $arreglo_costo;


                    // tiro
                    $estampado_tiro = intval($_POST['qty']);

                    $estampado_tmp = $ventas_model->costo_grabado("G2 Estampado");


                    $estampado_costo_unitario = 0;
                    foreach ($estampado_tmp as $row) {

                        $tiraje_minimo = intval($row['tiraje_minimo']);
                        $tiraje_maximo = intval($row['tiraje_maximo']);

                        if ($estampado_tiro >= $tiraje_minimo and $estampado_tiro <= $tiraje_maximo) {

                            $estampado_costo_unitario = floatval($row['precio_unitario']);

                            break;
                        }
                    }


                    if (is_array($estampado_tmp)) {

                        unset($estampado_tmp);
                    }


                    $estampado_costo_tiro = floatval($estampado_tiro * $estampado_costo_unitario);

                    $g2_estampado_costo_proceso = $placa_costo + $arreglo_costo + $estampado_costo_tiro;


                    $aAcbGGrab[$i]['costo_unitario'] = $estampado_costo_unitario;
                    $aAcbGGrab[$i]['costo_tiro']     = $estampado_costo_tiro;

                    $aAcbGGrab[$i]['costo_tot_proceso'] = $g2_estampado_costo_proceso;


                    $aMermaG['acbGrab_G2_Estampado'] = intval($_POST['grabadotot']);

                    break;
            }


            // calcula merma
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


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelG["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelG["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbGGrab[$i]['mermas'] = $aMerma_HS;

            unset($aMerma_HS);
        }


        if ($tipo_acabado == "Suaje") {

            $tipoGrabado = trim(strval($aAcbG[$i]['tipoGrabado']));

            $Largo = floatval($aAcbG[$i]['LargoSuaje']);
            $Ancho = floatval($aAcbG[$i]['AnchoSuaje']);


            switch ($tipoGrabado) {
                case 'Perimetral':

                    $aAcbGSuaje[$i]['tipoGrabado'] = $tipoGrabado;
                    $aAcbGSuaje[$i]['Largo']       = $Largo;
                    $aAcbGSuaje[$i]['Ancho']       = $Ancho;

                    $perimetro_suaje = floatval($Largo + $Ancho);

                    $aAcbGSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Perimetral");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }



                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }


                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbGSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);

                    $aAcbGSuaje[$i]['costo_arreglo'] = $arreglo_costo;



                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbGSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;

                    $aAcbGSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;

                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;

                    $aAcbGSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaG['acbSuaje_Perimetral'] = intval($_POST['suaje']);

                    break;
                case 'Figura':

                    $aAcbGSuaje[$i]['tipoGrabado'] = $tipoGrabado;

                    $aAcbGSuaje[$i]['Largo'] = $Largo;
                    $aAcbGSuaje[$i]['Ancho'] = $Ancho;


                    $perimetro_suaje = floatval($Largo + $Ancho);

                    $aAcbGSuaje[$i]['perimetro'] = $perimetro_suaje;


                    // arreglo
                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Figura");


                    $perimetral_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $perimetral_costo_unitario = floatval($row['costo_unitario']);
                    }



                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $costo_arreglo_tmp = $ventas_model->costo_suaje("Arreglo");


                    $arreglo_costo_unitario = 0;
                    foreach ($costo_arreglo_tmp as $row) {

                        $arreglo_costo_unitario = floatval($row['costo_unitario']);
                    }



                    if (is_array($costo_arreglo_tmp)) {

                        unset($costo_arreglo_tmp);
                    }


                    $aAcbGSuaje[$i]['arreglo_costo_unitario'] = $arreglo_costo_unitario;

                    $arreglo_costo = floatval($arreglo_costo_unitario * $perimetro_suaje);

                    $aAcbGSuaje[$i]['costo_arreglo'] = $arreglo_costo;



                    // tiro
                    $suaje_tiro = intval($_POST['qty']);

                    $suaje_costo_tiro = floatval($suaje_tiro * $perimetral_costo_unitario * $perimetro_suaje);


                    $aAcbGSuaje[$i]['tiro_costo_unitario'] = $perimetral_costo_unitario;
                    $aAcbGSuaje[$i]['costo_tiro'] = $suaje_costo_tiro;

                    $suaje_costo_proceso = $arreglo_costo + $suaje_costo_tiro;

                    $aAcbGSuaje[$i]['costo_tot_proceso'] = $suaje_costo_proceso;


                    $aMermaG['acbSuaje_Figura'] = intval($_POST['suaje']);


                    break;
            }


            // calcula merma
            $merma_HS = $ventas_model->merma_acabados("Suaje");

            foreach ($merma_HS as $row) {

                $cantidad_minima = intval($row['cantidad_minima']);
                $cantidad        = intval($row['cantidad']);
                $por_cada_x      = intval($row['por_cada_x']);
                $adicional       = intval($row['adicional']);
            }


            if (is_array($merma_HS)) {

                unset($merma_HS);
            }


            $merma_HS_tmp = self:: calculo_merma_acabados($cantidad_minima, $cantidad, $por_cada_x, $adicional);


            $merma_HS_tot_pliegos = intval($merma_HS_tmp[2]);
            $merma_HS_cortes      = intval($aPapelG["cortes"]);


            $tot_pliegos_HS = self:: deltax_merma($merma_HS_tot_pliegos, $merma_HS_cortes);


            $papel_costo_unit_tmp = floatval($aPapelG["costo_unitario"]);

            $costo_tot_pliegos_merma = floatval($papel_costo_unit_tmp * $tot_pliegos_HS);

            $aMerma_HS = [];

            $aMerma_HS['merma_min']               = $merma_HS_tmp[0];
            $aMerma_HS['merma_adic']              = $merma_HS_tmp[1];
            $aMerma_HS['merma_tot']               = $merma_HS_tmp[2];
            $aMerma_HS['cortes_por_pliego']       = $merma_HS_cortes;
            $aMerma_HS['merma_tot_pliegos']       = $tot_pliegos_HS;
            $aMerma_HS['costo_unit_merma']        = $papel_costo_unit_tmp;
            $aMerma_HS['costo_tot_pliegos_merma'] = $costo_tot_pliegos_merma;


            $aAcbGSuaje[$i]['mermas'] = $aMerma_HS;


            if (is_array($aMerma_HS)) {

                unset($aMerma_HS);
            }
        }

    }


    if (count($aAcbGLam) > 0) {

        $aJson['LaminadoG'] = $aAcbGLam;


        if (is_array($aAcbGLam)) {

            unset($aAcbGLam);
        }
    }


    if (count($aAcbGHS) > 0) {

        $aJson['HotStampingG'] = $aAcbGHS;


        if (is_array($aAcbGHS)) {

            unset($aAcbGHS);
        }
    }


    if (count($aAcbGGrab) > 0) {

        $aJson['GrabadoG'] = $aAcbGGrab;


        if (is_array($aAcbGGrab)) {

            unset($aAcbGGrab);
        }
    }


    if (count($aAcbGSuaje) > 0) {

        $aJson['SuajeG'] = $aAcbGSuaje;

        if (is_array($aAcbGSuaje)) {

            unset($aAcbGSuaje);
        }
    }


// =========== Termina Guarda ==============



// =========== Termina boton acabados ===============


        if (count($aMermaEmp) > 0) {

            $aMerma["AcabEmpalme"] = $aMermaEmp;


            if (is_array($aMermaEmp)) {

                unset($aMermaEmp);
            }
        }


        if (count($aMermaFcaj) > 0) {

            $aMerma["AcabFCaj"] = $aMermaFcaj;


            if (is_array($aMermaFcaj)) {

                unset($aMermaFcaj);
            }
        }


        if (count($aMermaFcar) > 0) {

            $aMerma["AcabFCar"] = $aMermaFcar;


            if (is_array($aMermaFcar)) {

                unset($aMermaFcar);
            }
        }


        if (count($aMermaG) > 0) {

            $aMerma["AcabGuarda"] = $aMermaG;


            if (is_array($aMermaG)) {

                unset($aMermaG);
            }
        }



/**************** Inicia Cierres *****************************/


    if (isset($_POST["aCierres"]) and !empty($_POST["aCierres"])) {

        $aCierres_tmp = json_decode($_POST['aCierres'], true);

        $cuantos_aCierres_tmp = count($aCierres_tmp);


        $aCierres = [];


        $cierre_tiraje = intval($_POST['qty']);

        for ($i = 0; $i < $cuantos_aCierres_tmp; $i++) {

            $Tipo_cierre = "";
            $Tipo_cierre = trim(strval($aCierres_tmp[$i]['Tipo_cierre']));


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

                    $costo_cierres_tmp = $ventas_model->costo_cierres("Iman");


                    $costo_unit_cierre = 0;
                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = floatval($cierre_tiraje * $numpares * $costo_unit_cierre);

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


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = floatval($cierre_tiraje * $numpares * $costo_unit_cierre);

                    break;
                case 'Marialuisa':

                    $costo_cierres_tmp = $ventas_model->costo_cierres("Marialuisa");


                    $costo_unit_cierre = 0;
                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = floatval($cierre_tiraje * $numpares * $costo_unit_cierre);

                    break;
                case 'Suaje calado':

                    $largo = intval($aCierres_tmp[$i]['largo']);
                    $ancho = intval($aCierres_tmp[$i]['ancho']);
                    $tipo  = trim(strval($aCierres_tmp[$i]['tipo']));


                    $costo_cierres_tmp = $ventas_model->costo_cierres("Suaje calado");


                    $costo_unit_cierre = 0;
                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = floatval($cierre_tiraje * $numpares * $costo_unit_cierre);

                    break;
                case 'Velcro':

                    $costo_cierres_tmp = $ventas_model->costo_cierres("Velcro");


                    $costo_unit_cierre = 0;
                    foreach ($costo_cierres_tmp as $row) {

                        $costo_unit_cierre = $row['precio'];
                        $costo_unit_cierre = floatval($costo_unit_cierre);
                    }


                    if (is_array($costo_cierres_tmp)) {

                        unset($costo_cierres_tmp);
                    }


                    $costo_cierre = floatval($cierre_tiraje * $numpares * $costo_unit_cierre);

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

                $aCierres[$i]['tipo'] = trim(strval($tipo));
            } else {

                $aCierres[$i]['tipo'] = null;
            }


            if ($color != null) {

                $aCierres[$i]['color'] = trim(strval($color));
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


/**************** Termina Cierres *****************************/



/**************** Inicia Bancos *****************************/


    if (isset($_POST["aBancos"]) and !empty($_POST["aBancos"])) {

        $aBancos_tmp = json_decode($_POST['aBancos'], true);

        $aBancos_R   = array_values($aBancos_tmp);

        $cuantos_aBancos_tmp = count($aBancos_tmp);


        $aBancos = [];


        $cierre_tiraje = intval($_POST['qty']);

        for ($i = 0; $i < $cuantos_aBancos_tmp; $i++) {

            $Tipo_banco = "";
            $Tipo_banco = trim(strval($aBancos_R[$i]['Tipo_banco']));

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

                    $suaje = trim(strval($aBancos_R[$i]['Suaje']));


                    $costo_bancos_tmp = $ventas_model->costo_bancos("Carton");


                    $costo_unit_banco = 0;
                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);


                    break;
                case 'Eva':

                    $suaje = trim(strval($aBancos_R[$i]['Suaje']));


                    $costo_bancos_tmp = $ventas_model->costo_bancos("Eva");


                    $costo_unit_banco = 0;
                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);

                    break;
                case 'Espuma':

                    $suaje = trim(strval($aBancos_R[$i]['Suaje']));

                    $costo_bancos_tmp = $ventas_model->costo_bancos("Espuma");


                    $costo_unit_banco = 0;
                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);

                    break;
                case 'Empalme Banco':

                    $suaje = trim(strval($aBancos_R[$i]['Suaje']));

                    $costo_bancos_tmp = $ventas_model->costo_bancos("Empalme Banco");


                    $costo_unit_banco = 0;
                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);

                    break;
                case 'Cartulina Suajada':

                    $suaje = "SI";

                    $costo_bancos_tmp = $ventas_model->costo_bancos("Cartulina Suajada");


                    $costo_unit_banco = 0;
                    foreach ($costo_bancos_tmp as $row) {

                        $costo_unit_banco = $row['precio'];
                        $costo_unit_banco = floatval($costo_unit_banco);
                    }


                    if (is_array($costo_bancos_tmp)) {

                        unset($costo_bancos_tmp);
                    }


                    $costo_banco = floatval($banco_tiraje * $costo_unit_banco);

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


/**************** Termina Bancos *****************************/



/**************** Inicia Accesorios *****************************/


    if (isset($_POST["aAccesorios"]) and !empty($_POST["aAccesorios"])) {

        $aAccesorios_tmp = json_decode($_POST['aAccesorios'], true);
        $aAccesorios_R   = array_values($aAccesorios_tmp);

        $cuantos_aAccesorios_tmp = count($aAccesorios_tmp);


        $aAccesorios = [];


        $accesorios_tiraje = intval($_POST['qty']);

        for ($i = 0; $i < $cuantos_aAccesorios_tmp; $i++) {

            $Tipo_accesorio = "";

            $Tipo_accesorio = trim(strval($aAccesorios_R[$i]['Tipo_accesorio']));

            $accesorio_tiraje = intval($_POST['qty']);

            switch ($Tipo_accesorio) {
                case 'Herrajes':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Herrajes");


                    $costo_unit_accesorio = 0;
                    foreach ($costo_accesorios_tmp as $row) {

                        $costo_unit_accesorio = $row['precio'];
                        $costo_unit_accesorio = floatval($costo_unit_accesorio);
                    }


                    if (is_array($costo_accesorios_tmp)) {

                        unset($costo_accesorios_tmp);
                    }


                    $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);


                    break;
                case 'Ojillos':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Ojillos");


                    $costo_unit_accesorio = 0;
                    foreach ($costo_accesorios_tmp as $row) {

                        $costo_unit_accesorio = $row['precio'];
                        $costo_unit_accesorio = floatval($costo_unit_accesorio);
                    }


                    if (is_array($costo_accesorios_tmp)) {

                        unset($costo_accesorios_tmp);
                    }


                    $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);

                    break;
                case 'Resorte':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Resorte");


                    $costo_unit_accesorio = 0;
                    foreach ($costo_accesorios_tmp as $row) {

                        $costo_unit_accesorio = $row['precio'];
                        $costo_unit_accesorio = floatval($costo_unit_accesorio);
                    }


                    if (is_array($costo_accesorios_tmp)) {

                        unset($costo_accesorios_tmp);
                    }


                    $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);

                    break;
                case 'Micas':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Micas");


                    $costo_unit_accesorio = 0;
                    foreach ($costo_accesorios_tmp as $row) {

                        $costo_unit_accesorio = $row['precio'];
                        $costo_unit_accesorio = floatval($costo_unit_accesorio);
                    }


                    if (is_array($costo_accesorios_tmp)) {

                        unset($costo_accesorios_tmp);
                    }


                    $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);

                    break;
                case 'Listones':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Listones");


                    $costo_unit_accesorio = 0;
                    foreach ($costo_accesorios_tmp as $row) {

                        $costo_unit_accesorio = $row['precio'];
                        $costo_unit_accesorio = floatval($costo_unit_accesorio);
                    }


                    if (is_array($costo_accesorios_tmp)) {

                        unset($costo_accesorios_tmp);
                    }


                    $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);

                    break;
                case 'Lenguetas':

                    $costo_accesorios_tmp = $ventas_model->costo_accesorios("Lenguetas");


                    $costo_unit_accesorio = 0;
                    foreach ($costo_accesorios_tmp as $row) {

                        $costo_unit_accesorio = $row['precio'];
                        $costo_unit_accesorio = floatval($costo_unit_accesorio);
                    }


                    if (is_array($costo_accesorios_tmp)) {

                        unset($costo_accesorios_tmp);
                    }


                    $costo_accesorio = floatval($accesorio_tiraje * $costo_unit_accesorio);

                    break;
            }


            $aAccesorios[$i]['Tipo_accesorio']       = $Tipo_accesorio;
            $aAccesorios[$i]['tiraje']               = $accesorio_tiraje;
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



/**************** Termina Accesorios *****************************/


        // $aJson['mermas'] = $aMerma;

        if (count($aMerma) > 0) {

            if (is_array($aMerma)) {

                unset($aMerma);
            }
        }



        $aJson_tmp = $aJson;


        $costo_papeles = $aPapelEmp['costo_tot_pliegos'] + $aPapelFCaj['costo_tot_pliegos'] + $aPapelFCar['costo_tot_pliegos'] + $aPapelG['costo_tot_pliegos'];

        $costo_cartones = $aCartonCajon['costo_tot_carton'] + $aCartonCartera['costo_tot_carton'];


        $costos_fijos = $aJson['elab_car']['forro_car'] + $aJson['elab_guarda']['guarda'] + $aJson['ranurado']['costo_tot_ranurado'] + $aJson['ranurado_Fcar']['costo_por_ranura'] + $aJson['encuadernacion']['costo_tot_proceso'] + $aJson['encuadernacion_Fcaj']['empalme_de_cajon'];


        $costo_off_emp_tmp = self::suma_costo_procesos($aJson_tmp, 'OffEmp');
        $costo_dig_emp_tmp = self::suma_costo_procesos($aJson_tmp, 'DigEmp');
        $costo_ser_emp_tmp = self::suma_costo_procesos($aJson_tmp, 'SerEmp');

        $costo_off_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'OffFCaj');
        $costo_dig_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'DigFCaj');
        $costo_ser_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'SerFCaj');

        $costo_off_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'OffFCar');
        $costo_dig_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'DigFCar');
        $costo_ser_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'SerFCar');

        $costo_off_g_tmp = self::suma_costo_procesos($aJson_tmp, 'OffG');
        $costo_dig_g_tmp = self::suma_costo_procesos($aJson_tmp, 'DigG');
        $costo_ser_g_tmp = self::suma_costo_procesos($aJson_tmp, 'SerG');


        $costo_impresiones = $costo_off_emp_tmp + $costo_dig_emp_tmp + $costo_ser_emp_tmp + $costo_off_fcaj_tmp + $costo_dig_fcaj_tmp + $costo_ser_fcaj_tmp + $costo_off_fcar_tmp + $costo_dig_fcar_tmp + $costo_ser_fcar_tmp + $costo_off_g_tmp + $costo_dig_g_tmp + $costo_ser_g_tmp;


        $costo_lam_emp_tmp   = self::suma_costo_procesos($aJson_tmp, 'Laminado');
        $costo_hs_emp_tmp    = self::suma_costo_procesos($aJson_tmp, 'HotStamping');
        $costo_grab_emp_tmp  = self::suma_costo_procesos($aJson_tmp, 'Grabado');
        $costo_suaje_emp_tmp = self::suma_costo_procesos($aJson_tmp, 'Suaje');


        $costo_lam_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'LaminadoFcaj');
        $costo_hs_fcaj_tmp  = self::suma_costo_procesos($aJson_tmp, 'HotStampingFcaj');
        $costo_grab_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'GrabadoFcaj');
        $costo_suaje_fcaj_tmp = self::suma_costo_procesos($aJson_tmp, 'SuajeFcaj');


        $costo_lam_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'LaminadoFcar');
        $costo_hs_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'HotStampingFcar');
        $costo_grab_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'GrabadoFcar');
        $costo_suaje_fcar_tmp = self::suma_costo_procesos($aJson_tmp, 'SuajeFcar');


        $costo_lam_g_tmp   = self::suma_costo_procesos($aJson_tmp, 'LaminadoG');
        $costo_hs_g_tmp    = self::suma_costo_procesos($aJson_tmp, 'HotStampingG');
        $costo_grab_g_tmp  = self::suma_costo_procesos($aJson_tmp, 'GrabadoG');
        $costo_suaje_g_tmp = self::suma_costo_procesos($aJson_tmp, 'SuajeG');



        $costo_acabados = $costo_lam_emp_tmp + $costo_hs_emp_tmp + $costo_grab_emp_tmp + $costo_suaje_emp_tmp + $costo_lam_fcaj_tmp + $costo_hs_fcaj_tmp + $costo_grab_fcaj_tmp + $costo_suaje_fcaj_tmp + $costo_lam_fcar_tmp + $costo_hs_fcar_tmp + $costo_grab_fcar_tmp + $costo_suaje_fcar_tmp + $costo_lam_g_tmp + $costo_hs_g_tmp + $costo_grab_g_tmp + $costo_suaje_g_tmp;



        $costo_cierres     = self::suma_costo_cierres($aJson_tmp, 'Cierres');
        $costo_bancos      = self::suma_costo_bancos($aJson_tmp, 'Bancos');
        $costo_accesorios  = self::suma_costo_accesorios($aJson_tmp, 'Accesorios');



        // suma
        $costo_subtot = floatval($costo_papeles + $costo_cartones + $costos_fijos + $costo_impresiones + $costo_acabados + $costo_cierres + $costo_bancos +$costo_accesorios);

        $costo_subtot = round($costo_subtot, 2);
        $costo_subtot = floatval($costo_subtot);

        $aJson['costo_subtotal'] = $costo_subtot;
        $aJson['costo_odt']       = $costo_subtot;


        $aJson['costo_papeles']     = floatval($costo_papeles);
        $aJson['costo_cartones']    = floatval($costo_cartones);
        $aJson['costos_fijos']      = floatval($costos_fijos);
        $aJson['costo_impresiones'] = floatval($costo_impresiones);
        $aJson['costo_acabados']    = floatval($costo_acabados);
        $aJson['costo_cierres']     = floatval($costo_cierres);
        $aJson['costo_bancos']      = floatval($costo_bancos);
        $aJson['costo_accesorios']  = floatval($costo_accesorios);


        if (is_array($row)) {

            unset($row);
        }


        if (is_array($aJson_tmp)) {

            unset($aJson_tmp);
        }


        $costo_subtotal = floatval($aJson['costo_odt']);
        $costo_subtotal = round($costo_subtotal, 2);

        echo PHP_EOL . PHP_EOL . "(13785) costo_odt: ";
        print_r($costo_subtotal);

        echo PHP_EOL . PHP_EOL . "(13788) costo_subtot: ";
        print_r($costo_subtot);

        echo PHP_EOL . PHP_EOL . "(13791) aJson(descuento_pctje): ";
        print_r($aJson['descuento_pctje']);

        echo PHP_EOL . PHP_EOL . "(13794) descuento %: ";
        print_r($descuento_pctje);


        $db_tmp = $ventas_model->costos_descuentos("Utilidad");

        $utilidad_pctje = 0;

        foreach($db_tmp as $row) {

            $utilidad_pctje = $row['porcentaje'];
            $utilidad_pctje = floatval($utilidad_pctje);
        }


        echo PHP_EOL . PHP_EOL . "(13809) utilidad %: ";
        print_r($utilidad_pctje);

        $utilidad = 0;

        $utilidad = floatval($costo_subtotal * $utilidad_pctje);
        $utilidad = round($utilidad, 2);

        echo PHP_EOL . PHP_EOL . "(13817 utilidad: ";
        print_r($utilidad);


        $db_tmp = $ventas_model->costos_descuentos("IVA");

        $iva_pctje = 0;

        foreach($db_tmp as $row) {

            $iva_pctje = $row['porcentaje'];
            $iva_pctje = floatval($iva_pctje);
        }

        $iva = 0;

        $iva = floatval($costo_subtotal * $iva_pctje);
        $iva = round($iva, 2);


        $aJson['iva'] = $iva;

        echo PHP_EOL . PHP_EOL . "(13839) iva: ";
        print_r($iva);

        echo PHP_EOL . PHP_EOL . "(13842) aJson(iva): ";
        print_r($aJson['iva']);



        $db_tmp = $ventas_model->costos_descuentos("Comisiones");

        $comisiones_pctje = 0;

        foreach($db_tmp as $row) {

            $comisiones_pctje = $row['porcentaje'];
            $comisiones_pctje = floatval($comisiones_pctje);
        }


        $comisiones = 0;

        $comisiones = floatval($costo_subtotal * $comisiones_pctje);
        $comisiones = round($comisiones, 2);

        $aJson['comisiones'] = $comisiones;


        echo PHP_EOL . PHP_EOL . "(13866) comisiones %: ";
        print_r($comisiones_pctje);

        echo PHP_EOL . PHP_EOL . "(13869) ajson(comisiones): ";
        print_r($comisiones);



        $db_tmp = $ventas_model->costos_descuentos("Indirecto");

        $indirecto_pctje = 0;

        foreach($db_tmp as $row) {

            $indirecto_pctje = $row['porcentaje'];
            $indirecto_pctje = floatval($indirecto_pctje);
        }

        $indirecto = 0;

        $indirecto = floatval($costo_subtotal * $indirecto_pctje);
        $indirecto = round($indirecto, 2);

        $aJson['indirecto'] = $indirecto;


        echo PHP_EOL . PHP_EOL . "(13892) indirecto %: ";
        print_r($indirecto_pctje);

        echo PHP_EOL . PHP_EOL . "(13895) indirecto: ";
        print_r($indirecto);



        $db_tmp = $ventas_model->costos_descuentos("Venta");

        $venta_pctje = 0;

        foreach($db_tmp as $row) {

            $venta_pctje = $row['porcentaje'];
            $venta_pctje = floatval($venta_pctje);
        }

        $venta = 0;

        $venta = floatval($costo_subtotal * $venta_pctje);
        $venta = round($venta, 2);


        echo PHP_EOL . PHP_EOL . "(13916) venta %: ";
        print_r($venta_pctje);

        echo PHP_EOL . PHP_EOL . "(13919) venta: ";
        print_r($venta);


        $descuento = 0;

        $descuento = floatval($costo_subtotal * $descuento_pctje / 100);
        $descuento = round($descuento, 2);


        echo PHP_EOL . PHP_EOL . "(13929) descuento %: ";
        print_r($descuento_pctje);

        echo PHP_EOL . PHP_EOL . "(13932) descuento: ";
        print_r($descuento);


        $total = 0;

        $total = floatval($costo_subtotal + $utilidad + $iva + $comisiones + $indirecto + $venta);
        $total = $total - $descuento;

        $total = round($total, 2);


        echo PHP_EOL . PHP_EOL . "(13944) total: ";
        print_r($total);

        echo PHP_EOL . PHP_EOL;



/*

        $aJson['costo_odt']         = $total;
        $aJson['costo_subtotal']    = $costo_subtotal;
        $aJson['Utilidad']          = $utilidad;
        $aJson['iva']               = $iva;
        $aJson['comisiones']        = $comisiones;
        $aJson['indirecto']         = $indirecto;
        $aJson['ventas']            = $venta;
        $aJson['descuento']         = descuento;
        $aJson['descuento_pctje']   = $descuento_pctje;

*/


        $debuger  = false;
        $post     = false;
        $variable = false;
        $grabar   = false;
        $saved    = false;
        $keys     = false;


        $id_modelo = intval($aJson['modelo']);         // Almeja

        if ($l_costo and $grabar and $_POST['grabar'] == "SI") {

            $saved = $ventas_model->insertCaja_Almeja($aJson, $id_modelo);
        }


        if ($saved) {

            echo PHP_EOL . PHP_EOL . "(13162) Grabado con exito.";
            echo PHP_EOL . PHP_EOL . "(13163) id_odt: ";
            print_r($saved);

            echo PHP_EOL . PHP_EOL;
        } elseif ($grabar and $_POST['grabar'] == "SI") {

            echo PHP_EOL . PHP_EOL . "(13169) Error al grabar en la Base de Datos." . PHP_EOL;

            return false;
        }


        if ($debuger) {

            if ($post) {

                echo PHP_EOL . PHP_EOL . "(13179) post: ";
                print_r($_POST);
            }

            if ($variable) {

                $variables = get_defined_vars();

                echo PHP_EOL . "=========" . PHP_EOL . PHP_EOL . "(13187) variables: ";
                print_r($variables);
                echo PHP_EOL . "==========" . PHP_EOL;
            }

            echo PHP_EOL . "(13192) aJson: ";
            print_r($aJson);

            if ($keys) {

                $miArrayJson = array_keys($aJson);

                $s_miArrayJson = json_encode($miArrayJson);


                echo PHP_EOL . PHP_EOL . "(13202) long miArrayJson: ";
                print_r(count($miArrayJson));
                echo PHP_EOL . PHP_EOL . "(13204) miArrayJson: ";
                print_r($miArrayJson);
                echo PHP_EOL . PHP_EOL . "(13206) s_miArrayJson: ";
                print_r($s_miArrayJson);
                echo PHP_EOL . PHP_EOL . "(13208) tipo s_miArrayJson: ";
                print_r(gettype($s_miArrayJson));


                $a_miArrayJson = json_decode($s_miArrayJson, true);

                echo PHP_EOL . PHP_EOL . "(13214) tipo a_miArrayJson: ";
                print_r(gettype($a_miArrayJson));

                echo PHP_EOL . PHP_EOL . "(13217) cuantos a_miArrayJson: ";
                print_r(count($a_miArrayJson));

                echo PHP_EOL . PHP_EOL . "(13220) a_miArrayJson: ";
                print_r($a_miArrayJson);
            }

            echo PHP_EOL . PHP_EOL . "=================" . PHP_EOL;
            echo PHP_EOL;
        }

        echo json_encode($aJson);

    }


    protected function suma_costo_procesos($aJson_tmp, $nomb_proceso) {

        $nombre_proceso = trim(strval($nomb_proceso));

        $costo_proc_tmp = 0;
        if (array_key_exists($nombre_proceso, $aJson_tmp)) {

            $nomb_proceso_tmp = array_values($aJson_tmp[$nombre_proceso]);

            for ($k = 0; $k < count($nomb_proceso_tmp); $k++) {

                $costo_tot_proceso = floatval($nomb_proceso_tmp[$k]['costo_tot_proceso']);

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
        $i = 1;
        $options = $options_model->getOptionsByModel($model);

        foreach ($options as $option) {

            $even  = ($i & 1)? 'even':'';
            $html .= '<div class="cajas-input-group ' . $even . '">';
            $html .= '<div class="cajas-col-input left"><span>' . $option['nombre'] . ': </span></div>';
            $html .= '<div class="cajas-col-input right">';
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
                default:
                    # code...

                    break;
            }

            $html .= '</div></div>';

            $i++;
        }

        $html.='<input class="cajas-form-submitter" type="submit" value="CALCULAR">';
        if ($model == '1') {

            return $html;
        } else {

            return "<p style='font-weight:bold;padding:30px;'>En desarrollo</p>";
        }
    }


    public function admin() {

        session_start();

        $options_model = $this->loadModel('OptionsModel');

        require 'application/views/templates/head.php';
        require 'application/views/templates/top_menu.php';
        require 'application/views/cajas/admin.php';
        require 'application/views/templates/footer.php';
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


    public function clientes(){

        session_start();

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

            header("Location:" . URL . 'login/');
        }
    }


    public function guardadas(){

        session_start();

        $login= $this->loadController('login');
        $options_model = $this->loadModel('OptionsModel');
        $login_model = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            if (isset($_GET['c'])) {

                $rows = $ventas_model->getCotizacionByClient($_GET['c']);

                require 'application/views/templates/head.php';
                require 'application/views/templates/top_menu.php';
                require 'application/views/cotizador/cotizaciones.php';
                require 'application/views/templates/footer.php';
            } else {

                header("Location:".URL.'cotizador/clientes/');
            }
        } else {

            header("Location:".URL.'login/');
        }
    }


    public function nuevo_cliente() {

        session_start();

        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');

        if($login->isLoged()) {

            require 'application/views/templates/head.php';
            require 'application/views/templates/top_menu.php';
            require 'application/views/cotizador/cliente_form.php';

            if ($_GET['tipo'] == 'caja') {

            } else {

            }
        } else {

            header("Location:" . URL . 'login/');
        }
    }


    public function newCliente(){

        session_start();
        error_reporting(0);

        $login        = $this->loadController('login');
        $login_model  = $this->loadModel('LoginModel');
        $ventas_model = $this->loadModel('VentasModel');
        $response     = array();

        if($login->isLoged()) {

            $response['logged'] = 'true';

            $completed = $ventas_model->addNewCliente($_POST);

            if ($completed) {

                $response['result'] = '<div class="c-successs"><div></div><span>Exito: </span>Correcto</div>';

                $response['success'] = 'true';
            }else{
                $response['result'] = '<div class="c-fail"><div></div><span>Error: </span>Error!</div>';
                $response['success'] = 'false';
            }
        } else {

            $response['logged'] = 'false';
        }

        echo json_encode($response);
    }
}
