<?php

class CotizacionModel {
    
    function __construct($db) {

        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Conexion No establecida con la Base de Datos.');
        }
    }


    // ========= Inicia calculo del Forro del Cajon ========
    public function cotizaEmpalme($ventas_model) {

        $cantidad     = 0;
        $costo_total  = 0;

        $costo_corte = 0;

        $cantidad = $_POST["qty"];
        $cantidad = intval($cantidad); 

        $cantidad_offset = 0; 

        $odt = strip_tags(trim($_POST['odt']));
        $odt = strtoupper($odt);
        $odt = strval($odt);

        $base = $_POST['base'];
        $base = floatval($base);

        $alto = $_POST['alto'];
        $alto = floatval($alto);

        $profundidad     = $_POST['profundidad'];
        $profundidad     = floatval($profundidad);

        $grosor_cajon    = $_POST['grosor-cajon'];
        $grosor_cajon    = floatval($grosor_cajon);

        $grosor_cartera  = $_POST['grosor-cartera'];
        $grosor_cartera  = floatval($grosor_cartera);

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
        
        $cajon           = $_POST['grosor-cajon'];
        $cartera         = $_POST['grosor-cartera'];
        $nombre_cliente  = $_POST['nombre_cliente'];

        $Tipo_proceso_tmp  = json_decode($_POST['aImp'], true);

        $num_rows = 0;
        $num_rows = count($Tipo_proceso_tmp);

        echo PHP_EOL . PHP_EOL . "======================" . PHP_EOL;
        echo PHP_EOL . "(999) cuantos procesos: " . $num_rows;

        $es_offset     = false;
        $es_digital    = false;
        $es_serigrafia = false;

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

        // boton impresion
        if ($num_rows > 0) {

            echo PHP_EOL . PHP_EOL . "Empalme";
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
                    $cantidad_offset = $cantidad + intval($offset);

                    $nombre_tipo_offset = $Tipo_proceso_tmp[$i]['tipo_offset'];

                    $nombre_tipo_offset = trim($nombre_tipo_offset);

                    $num_tintas = $Tipo_proceso_tmp[$i]['tintas'];

                    $num_tintas = intval($num_tintas);

                    echo PHP_EOL . "Offset";
                    echo PHP_EOL . "(1080) num de tintas: ";
                    print_r($num_tintas);
                    echo PHP_EOL . "(1082) tiraje + merma (Offset): ";
                    print_r($cantidad_offset);

                    $es_maquila = $ventas_model->rec_maquila($papel_empalme_corte_ancho, $papel_empalme_corte_largo);

                    if (!$es_maquila) {

                        if ($nombre_tipo_offset == "Normal") {

                            // Laminas
                            $laminas_db_tmp = $ventas_model->costo_offset("Laminas");

                            $costo_unitario_laminas = $laminas_db_tmp['costo_unitario'];
                            $costo_unitario_laminas = floatval($costo_unitario_laminas);

                            $laminas_db_num_color = $laminas_db_tmp['num_color'];
                            $laminas_db_num_color = intval($laminas_db_num_color);

                            $costo_laminas_offset = ($costo_unitario_laminas * $num_tintas) / $laminas_db_num_color;
                            $costo_laminas_offset = floatval($costo_laminas_offset);

                            echo PHP_EOL . PHP_EOL . "(1103) Impresion: ";
                            print_r($nombre_tipo_offset);
                            echo PHP_EOL . "(1105) costo unitario laminas: ";
                            print_r($costo_unitario_laminas);
                            
                            echo PHP_EOL . "(1108) costo laminas(offset): ";
                            print_r($costo_laminas_offset);

                            $costo_offset_laminas = $costo_offset_laminas + $costo_laminas_offset;

                            // Arreglo
                            $arreglo_db_tmp = $ventas_model->costo_offset("Arreglo");

                            $arreglo_tiraje_max = $arreglo_db_tmp['tiraje_maximo'];
                            $arreglo_tiraje_max = intval($arreglo_tiraje_max);

                            if ($cantidad < $arreglo_tiraje_max) {

                                $arreglo_num_color = $arreglo_db_tmp['num_color'];
                                $arreglo_num_color = intval($arreglo_num_color);

                                $arreglo_costo_unitario = $arreglo_db_tmp['costo_unitario'];
                                $arreglo_costo_unitario = floatval($arreglo_costo_unitario);

                                $costo_arreglo_offset = ($arreglo_costo_unitario * $num_tintas) / $arreglo_num_color;
                                $costo_arreglo_offset = floatval($costo_arreglo_offset);
                            } else {

                                $costo_arreglo_offset = 0;
                            }

                            echo PHP_EOL . "(1134) costo unitario arreglo: ";
                            print_r($arreglo_costo_unitario);
                            echo PHP_EOL . "(1136) costo arreglo(offset): ";
                            print_r($costo_arreglo_offset);

                            $costo_offset_arreglo = $costo_offset_arreglo + $costo_arreglo_offset;

                            // Tiro
                            $tiro_db_tmp = $ventas_model->costo_offset("Tiro");

                            $tiro_por_millar = $tiro_db_tmp['por_millar'];
                            $tiro_por_millar = intval($tiro_por_millar);

                            $costo_unitario_tiro = $tiro_db_tmp['costo_unitario'];
                            $costo_unitario_tiro = floatval($costo_unitario_tiro);

                            $alfa = $ventas_model->deltax($cantidad_offset, $tiro_por_millar);

                            $costo_tiro_offset = ($costo_unitario_tiro * $alfa * $num_tintas);
                            $costo_tiro_offset = floatval($costo_tiro_offset);

                            echo PHP_EOL . "(1155) costo unitario tiro(Offset): ";
                            print_r($costo_unitario_tiro);
                            echo PHP_EOL . "(1157) costo tiro(Offset): ";
                            print_r($costo_tiro_offset);

                            $costo_offset_tiro = $costo_offset_tiro + $costo_tiro_offset;
                        } 



                        if ($nombre_tipo_offset === "Pantone") {

                            $delta = $ventas_model->deltax($cantidad_offset, 1000);

                            $cantidad_offset = $delta;

                            $pantone_db_tmp = $ventas_model->costo_offset("Pantone");
                           
                            $pantone_tiraje_max = $pantone_db_tmp['tiraje_maximo']; 

                            $pantone_tiraje_max = intval($pantone_tiraje_max);


                            echo PHP_EOL . '(1178) nombre tipo offset: ';
                            print_r($nombre_tipo_offset);
                            echo PHP_EOL . PHP_EOL . "(1184) cant offset: ";
                            print_r($cantidad_offset);

                            if ($cantidad_offset < $pantone_tiraje_max) {

                                $pantone_por_millar = $pantone_db_tmp['por_millar']; 
                                $pantone_por_millar = intval($pantone_por_millar);

                                $costo_unitario_pantone = $pantone_db_tmp['costo_unitario'];
                                $costo_unitario_pantone = floatval($costo_unitario_pantone);

                                $alfa = $ventas_model->deltax($cantidad_offset, $pantone_por_millar);

                                $costo_pantone_offset = 0;

                                $costo_pantone_offset = ($costo_unitario_pantone * $alfa);

                                echo PHP_EOL . "(1197) costo unitario pantone(offset): ";
                                print_r($costo_unitario_pantone);
                                echo PHP_EOL . "(1199) costo pantone(Offset): ";
                                print_r($costo_pantone_offset);

                                $costo_offset_pantone = $costo_offset_pantone + $costo_pantone_offset;
                            } else {

                                $costo_pantone_offset = 0;

                                echo PHP_EOL . "(1207) costo pantone(Offset): ";
                                print_r($costo_pantone_offset);
                            }

                            $arreglo_db_pantone_color = $ventas_model->costo_offset("Arreglo de Pantone");

                            $arreglo_num_color_pantone = $arreglo_db_pantone_color['num_color'];

                            $arreglo_num_color_pantone = intval($arreglo_num_color_pantone);

                            $arreglo_pantone_costo_unitario = $arreglo_db_pantone_color['costo_unitario'];

                            $arreglo_pantone_costo_unitario = floatval($arreglo_pantone_costo_unitario);

                            $costo_tot_arreglo_pantone = ($arreglo_pantone_costo_unitario * $num_tintas);

                            echo PHP_EOL . PHP_EOL . "(1223) Costo unitario arreglo pantone: ";
                            print_r($arreglo_pantone_costo_unitario);
                            echo PHP_EOL . "(1225) Costo arreglo pantone: ";
                            print_r($costo_tot_arreglo_pantone);

                            $costo_offset_arreglo_pantone = $costo_offset_arreglo_pantone + $costo_tot_arreglo_pantone;
                        }
                    } else {        // si es maquila

                        echo PHP_EOL . PHP_EOL . "=======";
                        echo PHP_EOL . "Maquila";
                        echo PHP_EOL . "=======";

                        if ($es_offset) {

                            $cantidad_offset = $cantidad + intval($offset);
                        } else {

                            $cantidad_offset = $cantidad;
                        }

                        $costo_db_laminas_maquila = $ventas_model->costo_offset("Maquila lamina");

                        $costo_unitario_laminas_maquila = $costo_db_laminas_maquila['costo_unitario'];
                        $costo_unitario_laminas_maquila = floatval($costo_unitario_laminas_maquila);

                        $costo_offset_laminas = $costo_unitario_laminas_maquila * $num_tintas;
                        $costo_offset_laminas = floatval($costo_offset_laminas);

                        $costo_maquila_lamina = 400;

                        if ($nombre_tipo_offset == "Normal") {

                            $cantidad = $_POST['qty'];
                            $cantidad = intval($cantidad);
                            $cantidad_offset = $cantidad + intval($offset);

                            if ($cantidad_offset < 3000) {

                                $maquila_db_tmp = $ventas_model->costo_offset_maquila_tiraje("Maquila", 1, 3000);

                                $maquila_costo_unitario = $maquila_db_tmp['costo_unitario'];
                                $maquila_costo_unitario = floatval($maquila_costo_unitario);

                                $costo_maquila = ($maquila_costo_unitario * $num_tintas);

                                $costo_maquila = floatval($costo_maquila);
                            } elseif ($cantidad_offset < 5000) {

                                $maquila_db_tmp = $ventas_model->costo_offset_maquila_tiraje("Maquila", 3000, 5000);

                                $maquila_costo_unitario = $maquila_db_tmp['costo_unitario'];
                                $maquila_costo_unitario = floatval($maquila_costo_unitario);

                                $costo_maquila = ($maquila_costo_unitario * $num_tintas);

                                $costo_maquila = floatval($costo_maquila);
                            } elseif ($cantidad_offset > 5000) {

                                $maquila_db_tmp = $ventas_model->costo_offset_maquila_tiraje("Maquila", 5000, 500000);

                                $maquila_costo_unitario = $maquila_db_tmp['costo_unitario'];
                                $maquila_costo_unitario = floatval($maquila_costo_unitario);

                                $maquila_por_millar = $maquila_db_tmp['por_millar'];
                                $maquila_por_millar = intval($maquila_por_millar);

                                $delta = $ventas_model->deltax($cantidad_offset, $maquila_por_millar);

                                $maquila_por_millar = $delta;

                                $maquila_por_color = $maquila_db_tmp['num_color'];
                                $maquila_por_color = intval($maquila_por_color);

                                $costo_maquila = ($maquila_por_millar * $maquila_costo_unitario * $num_tintas);
                                $costo_maquila = floatval($costo_maquila);
                            }

                            $costo_offset_maquila_lamina = $costo_maquila_lamina;

                            $costo_offset_maquila = $costo_offset_maquila + $costo_maquila + $costo_offset_maquila_lamina;

                            echo PHP_EOL . PHP_EOL . "Maquila";
                            echo PHP_EOL . "(1306) cantidad:";
                            print_r($cantidad_offset);
                            echo PHP_EOL . "(1308) num de tintas: ";
                            print_r($num_tintas);
                            echo PHP_EOL . "(1310) Costo unitario: ";
                            print_r($maquila_costo_unitario);
                            echo PHP_EOL . "(1312) costo unitario lamina: ";
                            print_r($costo_maquila_lamina);
                            echo PHP_EOL . "(1314) Costo Laminas: ";
                            print_r($costo_offset_laminas);
                            echo PHP_EOL . "(1316) costo maquila: ";
                            print_r($costo_maquila);
                        } 

                        if ($nombre_tipo_offset == "Pantone") {

                            $costo_maquila_lamina = 400;

                            $cantidad = intval($_POST['qty']);
                            if ($es_offset) {

                                $cantidad_offset = $cantidad + intval($offset);
                            } else {

                                $cantidad_offset = $cantidad;
                            }

                            if ($cantidad_offset < 3000) {

                                $maquila_db_tmp = $ventas_model->costo_offset_maquila_tiraje("Maquila Pantone", 1, 3000);

                                $maquila_costo_unitario = $maquila_db_tmp['costo_unitario'];
                                $maquila_costo_unitario = floatval($maquila_costo_unitario);

                                $costo_maquila = ($maquila_costo_unitario * $num_tintas);

                                $costo_maquila = floatval($costo_maquila);
                            } elseif ($cantidad_offset < 5000) {

                                $maquila_db_tmp = $ventas_model->costo_offset_maquila_tiraje("Maquila Pantone", 3000, 5000);

                                $maquila_costo_unitario = $maquila_db_tmp['costo_unitario'];
                                $maquila_costo_unitario = floatval($maquila_costo_unitario);

                                $costo_maquila = ($maquila_costo_unitario * $num_tintas);

                                $costo_maquila = floatval($costo_maquila);
                            } elseif ($cantidad_offset > 5000) {

                                $maquila_db_tmp = $ventas_model->costo_offset_maquila_tiraje("Maquila Pantone", 5000, 500000);

                                $maquila_costo_unitario = $maquila_db_tmp['costo_unitario'];
                                $maquila_costo_unitario = floatval($maquila_costo_unitario);

                                $maquila_por_millar = $maquila_db_tmp['por_millar'];
                                $maquila_por_millar = intval($maquila_por_millar);

                                $delta = $ventas_model->deltax($cantidad_offset, $maquila_por_millar);

                                $maquila_por_millar = $delta;

                                $maquila_por_color = $maquila_db_tmp['num_color'];
                                $maquila_por_color = intval($maquila_por_color);

                                $costo_maquila = ($maquila_por_millar * $maquila_costo_unitario * $num_tintas);
                                $costo_maquila = floatval($costo_maquila);
                            }

                            echo PHP_EOL . PHP_EOL . "(1374) tiraje: ";
                            print_r($cantidad_offset);
                            echo PHP_EOL . "(1376) num de tintas(pantone): ";
                            print_r($num_tintas);
                            echo PHP_EOL . "(1378) costo unitario maquila: ";
                            print_r($maquila_costo_unitario);
                            echo PHP_EOL . "(1380) costo maquila: ";
                            print_r($costo_maquila);
                            echo PHP_EOL . "(1382) costo maquila lamina: ";
                            print_r($costo_maquila_lamina);

                            $costo_offset_maquila_lamina = $costo_maquila_lamina;

                            $costo_offset_maquila_pantone = $costo_offset_maquila_pantone + $costo_offset_maquila_lamina;
                        }
                    }
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
                    $tipo_offset_serigrafia = trim($tipo_offset_serigrafia);

                    $num_tintas = $aImp_tmp[$i]['tintas'];
                    $num_tintas = intval($num_tintas);

                    $cantidad_serigrafia = $cantidad + $merma_serigrafia;

                    if ($cantidad_serigrafia <= 1000) {

                        $seri_db_tmp = $ventas_model->costo_serigrafia(1, 1000);

                        $costo_unitario_por_cada_100 = $seri_db_tmp['por_cada'];
                        $costo_unitario_por_cada_100 = intval($costo_unitario_por_cada_100);

                        $costo_unitario_serigrafia = $seri_db_tmp['costo_unitario'];
                        $costo_unitario_serigrafia = floatval($costo_unitario_serigrafia);
                    } elseif ($cantidad_serigrafia > 1000 and $cantidad_serigrafia <= 2000) {
                        
                        $seri_db_tmp = $ventas_model->costo_serigrafia(1001, 2000);

                        $costo_unitario_por_cada_100 = $seri_db_tmp['por_cada'];
                        $costo_unitario_por_cada_100 = intval($costo_unitario_por_cada_100);

                        $costo_unitario_serigrafia = $seri_db_tmp['costo_unitario'];
                        $costo_unitario_serigrafia = floatval($costo_unitario_serigrafia);
                    } elseif ($cantidad_serigrafia > 2000 and $cantidad_serigrafia <= 3000) {

                        $seri_db_tmp = $ventas_model->costo_serigrafia(2001, 3000);

                        $costo_unitario_por_cada_100 = $seri_db_tmp['por_cada'];
                        $costo_unitario_por_cada_100 = intval($costo_unitario_por_cada_100);

                        $costo_unitario_serigrafia = $seri_db_tmp['costo_unitario'];
                        $costo_unitario_serigrafia = floatval($costo_unitario_serigrafia);
                    } else {

                        $seri_db_tmp = $ventas_model->costo_serigrafia(3001, 300000000);

                        $costo_unitario_por_cada_100 = $seri_db_tmp['por_cada'];
                        $costo_unitario_por_cada_100 = intval($costo_unitario_por_cada_100);

                        $costo_unitario_serigrafia = $seri_db_tmp['costo_unitario'];
                        $costo_unitario_serigrafia = floatval($costo_unitario_serigrafia);
                    }

                    $delta = $ventas_model->deltax($cantidad_serigrafia, $costo_unitario_por_cada_100);

                    $costo_total_serigrafia = ($costo_unitario_serigrafia * $delta * $num_tintas);

                    $costo_total_serigrafia = floatval($costo_total_serigrafia);

                    $arreglo_db_tmp = $ventas_model->costo_arreglo_serigrafia("Arreglo");

                    $costo_arreglo_seri = $arreglo_db_tmp['costo_unitario'];
                    
                    $costo_unitario_arreglo_serigrafia = floatval($costo_arreglo_seri);
                    
                    $costo_arreglo_serigrafia = $costo_unitario_arreglo_serigrafia * $num_tintas;

                    $costo_total_serigrafia = $costo_total_serigrafia + $costo_arreglo_serigrafia;

                    echo PHP_EOL . PHP_EOL . "Serigrafia";
                    echo PHP_EOL . "(1471) Tipo impresion: ";
                    print_r($tipo_offset_serigrafia);
                    echo PHP_EOL . "(1473) Cantidad: ";
                    print_r($cantidad);
                    echo PHP_EOL . "(1475) Merma: ";
                    print_r($merma_serigrafia);
                    echo PHP_EOL . "(1477) Cantidad (incluye merma): ";
                    print_r($cantidad_serigrafia);
                    echo PHP_EOL . "(1479) Num tintas: ";
                    print_r($num_tintas);
                    echo PHP_EOL . "(1481) costo unitario: ";
                    print_r($costo_unitario_serigrafia);
                    echo PHP_EOL . "(1483) Arreglo serigrafia: ";
                    print_r($costo_unitario_arreglo_serigrafia);
                    echo PHP_EOL . "(1485) Costo Arreglo Serigrafia: ";
                    print_r($costo_arreglo_serigrafia);
                    echo PHP_EOL . "(1487) Costo serigrafia: ";
                    print_r($costo_total_serigrafia);
                }

                if ($Nombre_proceso === "Digital") {
                    
                    $es_digital = true;

                    $costo_unitario_digital = 0;
                    $merma_digital          = 0;
                    $cantidad_digital       = 0;

                    $cantidad = $_POST['qty'];
                    $cantidad = intval($cantidad);

                    $merma_digital = $_POST['digital'];
                    $merma_digital = intval($merma_digital);

                    $cantidad_digital = $cantidad + $merma_digital;

                    $delta = $ventas_model->deltax($cantidad_digital, 1);

                    $cantidad_digital = $delta;

                    if ($cantidad_digital <= 100) {

                        $digital_db_tmp = $ventas_model->costo_digital("frente", 1, 100);

                        $costo_unitario_digital = $digital_db_tmp['costo_unitario'];
                        $costo_unitario_digital = floatval($costo_unitario_digital);
                    } elseif ($cantidad_digital >= 101 and $cantidad_digital < 200) {
                        
                        $digital_db_tmp = $ventas_model->costo_digital("frente", 101, 200);

                        $costo_unitario_digital = $digital_db_tmp['costo_unitario'];
                        $costo_unitario_digital = floatval($costo_unitario_digital);
                    } else {
                        
                        $digital_db_tmp = $ventas_model->costo_digital("frente", 201, 2000000);

                        $costo_unitario_digital = $digital_db_tmp['costo_unitario'];
                        $costo_unitario_digital = floatval($costo_unitario_digital);
                    }

                    $costo_tot_digital = $costo_unitario_digital * $cantidad_digital;
                    $costo_tot_digital = floatval($costo_tot_digital);


                    echo PHP_EOL . PHP_EOL . "(1535) Cantidad digital (incluye merma): ";
                    print_r($cantidad_digital);
                    echo PHP_EOL . "(1537) Merma digital: ";
                    print_r($merma_digital);
                    echo PHP_EOL . "(1539) costo unitario digital: ";
                    print_r($costo_unitario_digital);
                    echo PHP_EOL . "(1541) Costo digital: ";
                    print_r($costo_tot_digital);
                }
            }
        }

        $cantidad = $_POST['qty'];
        $cantidad = intval($cantidad);

        if ($es_offset > 0) {

            $cantidad_offset = $cantidad + $offset;
        } else {

            $cantidad_offset = $cantidad;
        }


        if ($es_offset) {

            $cantidad_offset = $cantidad + intval($offset);
        } else {

            $cantidad_offset = $cantidad;
        }

        
        if ($es_digital) {

            $cantidad_offset = $cantidad_offset + $merma_digital;
        }


        if ($es_serigrafia) {

            $cantidad_offset = $cantidad_offset + $merma_serigrafia;
        }

        // costo de corte
        $delta = 0;

        $delta = $ventas_model->deltax($cantidad_offset, 1000);

        $costo_corte = $delta * 100;    // $100 por millar

        echo PHP_EOL . PHP_EOL . "(1586) costo corte: ";
        print_r($costo_corte);

        echo PHP_EOL . PHP_EOL . '=============' . PHP_EOL . PHP_EOL;

        // resumen

        echo PHP_EOL . PHP_EOL . "=======";
        echo PHP_EOL . "Resumen";
        echo PHP_EOL . "=======";

        echo PHP_EOL . PHP_EOL . "ODT: ";
        print_r($odt);
        echo PHP_EOL . "base: ";
        print_r($base);
        echo PHP_EOL . "alto: ";
        print_r($alto);
        echo PHP_EOL . "profundidad: ";
        print_r($profundidad);
        echo PHP_EOL . "Grosor cajon: ";
        print_r($grosor_cajon);
        echo PHP_EOL . "Grosor cartera: ";
        print_r($grosor_cartera);

        echo PHP_EOL . PHP_EOL . "cantidad solicitada: ";
        print_r($cantidad);
        echo PHP_EOL . "cantidad(incluye merma): ";
        print_r($cantidad_offset);

        echo PHP_EOL . PHP_EOL . "Costo corte: ";
        print_r($costo_corte);


        // Cajon
        echo PHP_EOL . PHP_EOL . "Cajon: ";
        echo PHP_EOL . "id cajon: ";
        print_r($id_cajon);
        echo PHP_EOL . "Nombre cajon: ";
        print_r($nombre_cajon);
        echo PHP_EOL . "num cajon: ";
        print_r($num_cajon);
        echo PHP_EOL . "Cajon largo: ";
        print_r($cajon_largo);
        echo PHP_EOL . "Cajon ancho: ";
        print_r($cajon_ancho);
        echo PHP_EOL . "Cantidad: ";
        print_r($cantidad_offset);
        echo PHP_EOL . "costo unitario cajon: ";
        print_r($costo_unitario_cajon);
        echo PHP_EOL . "Piezas por pliego: ";
        print_r($corte_cajon);

        $delta = $ventas_model->deltax($cantidad_offset, $corte_cajon);

        $total_pliegos_cajon = $delta;

        echo PHP_EOL . "Pliegos requeridos: ";
        print_r($total_pliegos_cajon);

        $costo_total_cajon = floatval($costo_unitario_cajon * $total_pliegos_cajon);

        echo PHP_EOL . "Costo total cajon: ";
        print_r($costo_total_cajon);


        // carton cartera
        echo PHP_EOL . PHP_EOL . "Cartera: ";
        echo PHP_EOL . "id carton cartera: ";
        print_r($id_cartera);
        echo PHP_EOL . "Nombre: ";
        print_r($nombre_cajon_cartera);
        echo PHP_EOL . "num cajon cartera: ";
        print_r($num_cajon_cartera);
        echo PHP_EOL . "Carton cartera largo: ";
        print_r($cajon_cartera_largo);
        echo PHP_EOL . "Carton cartera ancho: ";
        print_r($cajon_cartera_ancho);
        echo PHP_EOL . "costo unitario carton cartera: ";
        print_r($costo_unitario_cartera);
        echo PHP_EOL . "Piezas por pliego: ";
        print_r($corte_cartera);

        $delta = $ventas_model->deltax($cantidad_offset, $corte_cartera);

        $total_pliegos_cartera = $delta;

        echo PHP_EOL . "Pliegos requeridos: ";
        print_r($total_pliegos_cartera);

        $costo_total_cartera = floatval($costo_unitario_cartera * $total_pliegos_cartera);

        echo PHP_EOL . "Costo total cartera: ";
        print_r($costo_total_cartera);


        echo PHP_EOL . PHP_EOL . "id cliente: ";
        print_r($id_cliente);
        echo PHP_EOL . "Nombre cliente: ";
        print_r($nombre_cliente);


        // papel empalme
        echo PHP_EOL . PHP_EOL . "Empalme: ";
        echo PHP_EOL . "id papel empalme: ";
        print_r($id_papel_interior_cajon);
        echo PHP_EOL . "Nombre papel empalme: ";
        print_r($nomb_papel_interior_cajon);
        echo PHP_EOL . "Parte: ";
        print_r($papel_empalme_parte);
        echo PHP_EOL . "Ancho: ";
        print_r($papel_empalme_ancho);
        echo PHP_EOL . "Largo: ";
        print_r($papel_empalme_largo);
        echo PHP_EOL . "Corte ancho: ";
        print_r($papel_empalme_corte_ancho);
        echo PHP_EOL . "Corte Largo: ";
        print_r($papel_empalme_corte_largo);
        echo PHP_EOL . "Cantidad: ";
        print_r($cantidad_offset);
        echo PHP_EOL . "Costo unitario papel empalme: ";
        print_r($papel_empalme_precio);
        echo PHP_EOL . "Piezas por pliego: ";
        print_r($papel_empalme_piezas_pliego);

        $delta = $ventas_model->deltax($cantidad_offset, $papel_empalme_piezas_pliego);

        $total_pliego = $delta;

        $costo_total_papel_empalme = floatval($total_pliego * $papel_empalme_precio);

        echo PHP_EOL . "Total pliegos: ";
        print_r($total_pliego);
        echo PHP_EOL . "Total costo papel empalme: ";
        print_r(number_format($costo_total_papel_empalme, 2, '.', ','));


        // Forro del cajon
        $costo_papel = $options_model->getPapelId($id_papel_exterior_cajon);

        $costo_unitario_papel_exterior_cajon = $costo_papel['costo_unitario'];
        $costo_unitario_papel_exterior_cajon = floatval($costo_unitario_papel_exterior_cajon);

        echo PHP_EOL . PHP_EOL . "Papel exterior cajon: ";
        echo PHP_EOL . "id papel exterior cajon: ";
        print_r($id_papel_exterior_cajon);
        echo PHP_EOL . "Nombre (Forro del cajon): ";
        print_r($nomb_papel_exterior_cajon);
        echo PHP_EOL . "Parte: ";
        print_r($papel_ext_cajon_parte);
        echo PHP_EOL . "Ancho: ";
        print_r($papel_ext_cajon_ancho);
        echo PHP_EOL . "Largo: ";
        print_r($papel_ext_cajon_largo);
        echo PHP_EOL . "Corte ancho: ";
        print_r($papel_ext_cajon_corte_ancho);
        echo PHP_EOL . "Corte Largo: ";
        print_r($papel_ext_cajon_corte_largo);
        echo PHP_EOL . "Cantidad: ";
        print_r($cantidad_offset);
        echo PHP_EOL . "Costo unitario papel exterior cajon: ";
        print_r($costo_unitario_papel_exterior_cajon);
        echo PHP_EOL . "Piezas por pliego: ";
        print_r($papel_ext_cajon_piezas_pliego);

        $delta = $ventas_model->deltax($cantidad_offset, $papel_ext_cajon_piezas_pliego);

        $total_pliego_papel_ext_cajon = $delta;

        $costo_total_papel_ext_cajon = floatval($total_pliego_papel_ext_cajon * $costo_unitario_papel_exterior_cajon);

        echo PHP_EOL . "Total pliegos: ";
        print_r($total_pliego_papel_ext_cajon);
        echo PHP_EOL . "Total costo papel empalme: ";
        print_r(number_format($costo_total_papel_ext_cajon, 2, '.', ','));


        // Forro de la Cartera

        if ($es_offset) {

            $cantidad_offset = $cantidad + intval($offset);
        } else {

            $cantidad_offset = $cantidad;
        }

        $papeles_tmp  = json_decode($_POST['aTr3'], true);

        $costo_papel = $options_model->getPapelId($id_papel_exterior_cartera);

        echo PHP_EOL . PHP_EOL . "Papel exterior cartera: ";
        echo PHP_EOL . "id papel exterior cartera: ";
        print_r($id_papel_exterior_cartera);
        echo PHP_EOL . "Nombre (Forro del cajon): ";
        print_r($nomb_papel_exterior_cartera);
        echo PHP_EOL . "Parte: ";
        print_r($papel_ext_cartera_parte);
        echo PHP_EOL . "Ancho: ";
        print_r($papel_ext_cartera_ancho);
        echo PHP_EOL . "Largo: ";
        print_r($papel_ext_cartera_largo);
        echo PHP_EOL . "Corte ancho: ";
        print_r($papel_ext_cartera_corte_ancho);
        echo PHP_EOL . "Corte Largo: ";
        print_r($papel_ext_cartera_corte_largo);
        echo PHP_EOL . "Cantidad: ";
        print_r($cantidad_offset);
        echo PHP_EOL . "Costo unitario papel exterior cajon: ";
        print_r($costo_unitario_papel_exterior_cartera);
        echo PHP_EOL . "Piezas por pliego: ";
        print_r($papel_ext_cartera_piezas_pliego);

        $delta = $ventas_model->deltax($cantidad_offset, $papel_ext_cartera_piezas_pliego);

        $total_pliego_papel_ext_cartera = $delta;

        $costo_total_papel_ext_cartera = floatval($total_pliego_papel_ext_cartera * $costo_unitario_papel_exterior_cartera);

        echo PHP_EOL . "Total pliegos: ";
        print_r($total_pliego_papel_ext_cartera);
        echo PHP_EOL . "Total costo Forro de la cartera: ";
        print_r(number_format($costo_total_papel_ext_cartera, 2, '.', ','));



        // Guarda

        if ($es_offset) {

            $cantidad_offset = $cantidad + intval($offset);
        } else {

            $$cantidad_offset = $cantidad;
        }

        $papeles_tmp  = json_decode($_POST['aTr3'], true);

        $costo_papel = $options_model->getPapelId($id_papel_interior_cartera);

        echo PHP_EOL . PHP_EOL . "Papel exterior cartera: ";
        echo PHP_EOL . "id papel exterior cartera: ";
        print_r($id_papel_interior_cartera);
        echo PHP_EOL . "Nombre (Guarda): ";
        print_r($nomb_papel_interior_cartera);
        echo PHP_EOL . "Parte: ";
        print_r($papel_guarda_parte);
        echo PHP_EOL . "Ancho: ";
        print_r($papel_guarda_ancho);
        echo PHP_EOL . "Largo: ";
        print_r($papel_guarda_largo);
        echo PHP_EOL . "Corte ancho: ";
        print_r($papel_guarda_corte_ancho);
        echo PHP_EOL . "Corte Largo: ";
        print_r($papel_guarda_corte_largo);
        echo PHP_EOL . "Cantidad: ";
        print_r($cantidad_offset);
        echo PHP_EOL . "Costo unitario guarda: ";
        print_r($costo_unitario_papel_interior_cartera);
        echo PHP_EOL . "Piezas por pliego: ";
        print_r($papel_guarda_piezas_pliego);

        $delta = $ventas_model->deltax($cantidad_offset, $papel_guarda_piezas_pliego);

        $total_pliego_papel_guarda = $delta;

        $costo_total_papel_guarda = floatval($total_pliego_papel_guarda * $costo_unitario_papel_interior_cartera);

        echo PHP_EOL . "Total pliegos: ";
        print_r($total_pliego_papel_guarda);
        echo PHP_EOL . "Total costo Forro de la cartera: ";
        print_r(number_format($costo_total_papel_guarda, 2, '.', ','));

        echo PHP_EOL . PHP_EOL . "===================" . PHP_EOL;

        $costo_total_papeles_cartones_corte = 0;

        $costo_total_papeles_cartones_corte = $costo_corte + $costo_total_cajon + $costo_total_cartera + $costo_total_papel_empalme + $costo_total_papel_ext_cajon + $costo_total_papel_ext_cartera + $costo_total_papel_guarda;


        echo PHP_EOL . PHP_EOL . "Costo offset(papeles, cartones, corte): ";
        print_r($costo_total_papeles_cartones_corte);


        $costo_offset = $costo_offset_laminas + $costo_offset_arreglo + $costo_offset_tiro + $costo_offset_pantone + $costo_offset_arreglo_pantone + $costo_offset_maquila + $costo_offset_maquila_lamina + $costo_offset_maquila_pantone;


        echo PHP_EOL . PHP_EOL . "Empalme: ";
        echo PHP_EOL . "Offset: ";
        echo PHP_EOL . "Costo laminas: ";
        print_r($costo_offset_laminas);
        echo PHP_EOL . "Costo arreglo: ";
        print_r($costo_offset_arreglo);
        echo PHP_EOL . "Costo offset tiro: ";
        print_r($costo_offset_tiro);
        echo PHP_EOL . "Costo offset pantone: ";
        print_r($costo_offset_pantone);
        echo PHP_EOL . "Costo offset arreglo de pantone: ";
        print_r($costo_offset_arreglo_pantone);
        echo PHP_EOL . "Costo offset maquila: ";
        print_r($costo_offset_maquila);
        echo PHP_EOL . "Costo offset maquila lamina: ";
        print_r($costo_offset_maquila_lamina);
        echo PHP_EOL . "Costo offset maquila pantone: ";
        print_r($costo_offset_maquila_pantone);

        echo PHP_EOL . PHP_EOL . "Costo offset impresion: ";
        print_r($costo_offset);


        echo PHP_EOL . PHP_EOL . "Serigrafia: ";
        echo PHP_EOL . "Cantidad (incluye merma): ";
        print_r($cantidad_serigrafia);
        echo PHP_EOL . "Num de tintas: ";
        print_r($num_tintas);
        echo PHP_EOL . "Costo unitario arreglo: ";
        print_r($costo_unitario_arreglo_serigrafia);
        echo PHP_EOL . "Costo unitario: ";
        print_r($costo_unitario_serigrafia);
        echo PHP_EOL . PHP_EOL . "Costo arreglo: ";
        print_r($costo_arreglo_serigrafia);
        echo PHP_EOL. "Costo total serigrafia:";
        print_r($costo_total_serigrafia);



        echo PHP_EOL . PHP_EOL . "Digital: ";
        echo PHP_EOL . "Cantidad (incluye merma): ";
        print_r($cantidad_digital);
        echo PHP_EOL . "Costo unitario digital: ";
        print_r($costo_unitario_digital);
        echo PHP_EOL . "Costo total digital: ";
        print_r($costo_tot_digital);

        $costo_odt = $costo_total_papeles_cartones_corte + $costo_offset + $costo_serigrafia_total + $costo_tot_digital;

        echo PHP_EOL . PHP_EOL . "Costo ODT: ";
        print_r($costo_odt);

        echo PHP_EOL . PHP_EOL . "=================" . PHP_EOL . PHP_EOL;


    }
    // ========= Termina calculo de Empalme ========

    public function getCotizacion(){

        $idUsuario = intval($_SESSION['user']['id_usuario']);

        $sql = "SELECT cotizaciones.*, clientes.nombre as cliente, tiendas.nombre_tienda as tienda FROM cotizaciones INNER JOIN clientes on clientes.id_cliente = cotizaciones.id_cliente INNER JOIN tiendas on tiendas.id_tienda = clientes.tienda WHERE cotizaciones.status = 'A' AND cotizaciones.id_usuario = '$idUsuario' ORDER BY fecha_realizacion DESC, hora_realizacion DESC";

        $query = $this->db->prepare($sql);

        $query->execute();
        
        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            $result[] = $row;
        }

        return $result;
    }

    public function getUltimateCotizacion($idCotizacion){

        $idUsuario = intval($_SESSION['user']['id_usuario']);

        $sql = "SELECT * FROM detalle_cotizaciones inner join cotizaciones on cotizaciones.id_cotizacion = detalle_cotizaciones.id_cotizacion INNER JOIN clientes on clientes.id_cliente = cotizaciones.id_cliente WHERE cotizaciones.status = 'A' AND cotizaciones.id_usuario = '$idUsuario' and detalle_cotizaciones.id_cotizacion = $idCotizacion and detalle_cotizaciones.status= 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();
        
        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            $result[] = $row;
        }

        return $result;
    }

    public function uploadCotizacion(){

        session_start();

        $idCliente = intval($_POST['idCliente']);
        $fecha     = date("Y-m-d");
        $hora      = date("H:i:s");
        $arrCotizacion   = json_decode($_POST['arrFactura']);
        $total     = floatval($_POST['txtTotal']);
        $idUsuario = intval($_SESSION['user']['id_usuario']);
        $error     = false;

        try{

            $this->db->beginTransaction();

            $ivaT = 0;

            for( $i=0; $i < count($arrCotizacion); $i++ ){

                $ivaT += floatval($arrCotizacion[$i][4]->value);
            }

            $sql = "INSERT INTO cotizaciones( id_cliente, fecha_realizacion, hora_realizacion, iva_total, monto_total, id_usuario ) VALUES( $idCliente, '$fecha', '$hora', '$ivaT' , '$total', $idUsuario )";
                
            $query = $this->db->prepare($sql);
            $inserted = $query->execute();

            if( !$inserted ) $error = true;

            $sql1 = "SELECT max(id_cotizacion) as id_cotizacion from cotizaciones";

            $query1 = $this->db->prepare($sql1);
            
            $query1->execute();
            $id = "";
            if ($row = $query1->fetch(PDO::FETCH_ASSOC)) {
                
                $id = $row['id_cotizacion'];
            }

            for ( $i=0; $i < count($arrCotizacion); $i++ ) {

                //$odt         = strval($arrCotizacion[$i][0]->value);
                $descripcion = strval($arrCotizacion[$i][0]->value);
                $cantidad    = intval($arrCotizacion[$i][1]->value);
                $precio      = floatval($arrCotizacion[$i][2]->value);
                $subtotal    = floatval($arrCotizacion[$i][3]->value);
                $iva         = floatval($arrCotizacion[$i][4]->value);
                $total       = floatval($arrCotizacion[$i][5]->value);


                $sql2 = "INSERT INTO detalle_cotizaciones ( id_cotizacion, descripcion, cantidad, precio, iva, monto ) VALUES ( $id, '$descripcion', '$cantidad', '$precio', '$iva', '$total' )";
                
                $query2 = $this->db->prepare($sql2);
                $inserted2 = $query2->execute();

                if( $inserted2 ){

                    $error = false;
                }else{

                    $error = true;
                    break;
                }
            }

            if( $error == false ){

                $this->db->commit();
                return $id;
            }else{

                $this->db->rollBack();
                return false;
            }

        }catch( Exception $ex ){

            return false;
        }
        
    }

    public function getCotizacionByID($idCotizacion){

        $idUsuario = intval($_SESSION['user']['id_usuario']);

        $sql = "SELECT * FROM detalle_cotizaciones inner join cotizaciones on cotizaciones.id_cotizacion = detalle_cotizaciones.id_cotizacion where cotizaciones.id_cotizacion = '$idCotizacion' and detalle_cotizaciones.status = 'A'";

        $query = $this->db->prepare($sql);

        $query->execute();
        
        $result = array();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            
            $result[] = $row;
        }

        return $result;
    }

    public function updateCotizacion(){

        session_start();

        $arrCotizacion   = json_decode($_POST['arrFactura']);
        $total     = floatval($_POST['txtTotal']);
        $idUsuario = intval($_SESSION['user']['id_usuario']);
        $idCotizacion = intval($_GET['idCot']);
        $error     = false;

        try{

            $this->db->beginTransaction();

            $ivaT = 0;

            for( $i=0; $i < count($arrCotizacion); $i++ ){

                $ivaT += floatval($arrCotizacion[$i][4]->value);
            }

            $sql = "UPDATE cotizaciones set iva_total ='$ivaT', monto_total = '$total' where id_cotizacion = '$idCotizacion'";

            $query = $this->db->prepare($sql);
            $inserted = $query->execute();

            if( !$inserted ) $error = true;

            $sql1 = "UPDATE detalle_cotizaciones set status='B' where id_cotizacion = '$idCotizacion'";

            $query1 = $this->db->prepare($sql1);
            $update = $query1->execute();

            if( !$update ) $error = true;

            for ( $i=0; $i < count($arrCotizacion); $i++ ) {

                //$odt         = strval($arrCotizacion[$i][0]->value);
                $descripcion = strval($arrCotizacion[$i][0]->value);
                $cantidad    = intval($arrCotizacion[$i][1]->value);
                $precio      = floatval($arrCotizacion[$i][2]->value);
                $subtotal    = floatval($arrCotizacion[$i][3]->value);
                $iva         = floatval($arrCotizacion[$i][4]->value);
                $total       = floatval($arrCotizacion[$i][5]->value);

                $sql2 = "INSERT INTO detalle_cotizaciones (id_cotizacion, descripcion, cantidad, precio, iva, monto) VALUES('$idCotizacion', '$descripcion', '$cantidad', '$precio', '$iva', '$total')";

                $query2 = $this->db->prepare($sql2);
                $inserted2 = $query2->execute();

                if( $inserted2 ){

                    $error = false;
                }else{

                    $error = true;
                    break;
                }
            }

            if( $error == false ){

                $this->db->commit();
                return true;
            }else{

                $this->db->rollBack();
                return false;
            }

        }catch( Exception $ex ){

            return false;
        }
        
    }
}


?>
