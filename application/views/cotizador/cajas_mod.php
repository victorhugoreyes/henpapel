
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?= URL; ?>public/css/cotizador.css">

<script>

    $(document).ready(function() {

        $('#odt-1').val('<?=$cotizacion['id_odt']?>');
        $('#corte_largo').val('<?=$cotizacion['base']?>');
        $('#corte_ancho').val('<?=$cotizacion['alto']?>');
        $('#profundidad_1').val('<?=$cotizacion['profundidad']?>');
        $('#grosor_cajon_1').val('<?=$grosor_cajon1['numcarton']?>');
        $('#grosor_cartera_1').val('<?=$grosor_cartera1['numcarton']?>');
        //$('#interior_cajon').val('<?=$papelempalme1['id_papel']?>');
        //$('#exterior_cajon').val('<?=$papelfcajon1['id_papel']?>');
        //$('#exterior_cartera').val('<?=$papelfcartera1['id_papel']?>');
        //$('#interior_cartera').val('<?=$papelguarda1['id_papel']?>');
        //jQuery214('#interior_cajon option:eq(<?=$papelempalme1['id_papel']?>)').prop("selected", true);

    });
</script>

<?php

/* Datos leidos de la tabla papeles */
foreach ($procesos as $proceso) { ?>

    <input type="hidden" id="pro-<?=$proceso['IDCatPro']?>" data-costounico="<?=$proceso['CostoUnico']?>" data-costounitario="<?=$proceso['CostoUnitario']?>" data-costociento="<?=$proceso['CostoCiento']?>" data-costomillar="<?=$proceso['CostoMillar']?>">
<?php }

?>

<?php

/* Datos leidos de la tabla porcentaje_adicional */
foreach ($Porcentajes as $porcentaje) { ?>

    <input type="hidden" id="porcentaje_<?=$porcentaje['nombre_aumento']?>" value="<?=$porcentaje['porcentaje']?>">
<?php }

?>

<!-- seleccion de modelo -->
<div class="selectormodelo">

    <div class="div-izquierdo">

        <select  id="box-model" class="seleccionModelo" style="background: #1A2C4C;color:#fff;font-size: 16px; width: -webkit-fill-available; border: none; height: 35px">

            <option selected disabled value="<?=$tipoC?>"><?=$TipoModelo;?></option>
        </select>
    </div>

    <div class="div-derecho" style="background: cornflowerblue; border: none; height: 35px; text-align: center; color: white;">
    </div>
</div>

<!-- form Default modelo (0) -->
<div>
    <form class="caja-form" name="caja-form" id="caja-form" method="post" action="<?php echo URL; ?>cotizador/saveCaja/">

        <div class="wrap cont-grid" id="form_modelo_1_grid">

            <!-- Contenido del selector del modelo de caja -->
            <div class="div-izquierdo" style="height: 80%;">

                <!-- muestra imagenes -->
                <div style="width: 100%; text-align: center; display: inline-block; background-image: url(<?=URL ;?>public/img/worn_dots.png); background-repeat: repeat; height: 200px;">

                    <!-- imagenes de almeja -->
                    <div class="img" id="image_1" style="background-image:url(<?=URL ?>public/img/1.png); position: relative; width: 200px;"></div>

                    <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>public/img/1_alto.png); position: relative; width: 200px;">
                    </div>

                    <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>public/img/1_ancho_1.png); position: relative; width: 200px;">
                    </div>

                    <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>public/img/1_profundidad.png); position: relative; width: 200px;">
                    </div>

                    <br>
                </div>

                <!-- formulario de la caja almeja -->
                <div class="form-content medidas" style="height: 450px;">

                    <input type="hidden" name="modelo" id="modelo" value="1">

                    <!-- ODT -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                        <input type="hidden" name="nombre_cliente" id="nombre_cliente" value="<?= $nombrecliente;?>">
                            <span>ODT: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="odt" id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1">
                        </div>
                    </div>

                    <!-- Base Interior -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Base: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <!--
                            <input class="cajas-input medidas-input" name="alto" id="corte_largo" type="number" step="any" min="0.1" tabindex="2" placeholder="cm" required="">
                            -->
                            <input class="cajas-input medidas-input" name="base" id="corte_largo" type="number" step="any" min="0.1" tabindex="2" placeholder="cm">
                        </div>
                    </div>

                    <!-- Ancho Interior -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Alto: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="alto" id="corte_ancho" type="number" step="any" min="0.1" tabindex="3" placeholder="cm">
                        </div>
                    </div>

                    <!-- Profundidad -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad" id="profundidad_1" type="number" step="any" min="0.1" placeholder="cm" tabindex="4">
                        </div>
                    </div>

                    <!-- Grosor Cajón -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Grosor Cajón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <select class="cajas-input medidas-input" name="grosor-cajon" id="grosor_cajon_1" tabindex="5" required>

                                <?php
                                foreach ($cartones as $carton) {

                                    $expensive = $options_model->mostExpensive($carton['numcarton'], round($carton['costo_unitario'], 2));

                                    if ($expensive) {

                                        ?>
                                        <option value="<?=$carton['numcarton']?>"  data-id="<?=$carton['id_papel']?>" data-ancho="<?=$carton['ancho']?>" data-largo="<?=$carton['largo']?>" data-price="<?=$carton['costo_unitario']?>" ><?=$carton['numcarton'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Grosor Cartera -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Grosor Cartera: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <select class="cajas-input medidas-input" name="grosor-cartera" id="grosor_cartera_1" tabindex="6" required>

                                <?php
                                foreach ($cartones as $carton) {

                                    $expensive = $options_model->mostExpensive($carton['numcarton'], round($carton['costo_unitario'], 2));

                                    if ($expensive) {

                                        ?>
                                        <option value="<?=$carton['numcarton']?>" data-id="<?=$carton['id_papel']?>" data-id="<?=$carton['id_papel']?>" data-ancho="<?=$carton['ancho']?>" data-largo="<?=$carton['largo']?>" data-price="<?=$carton['costo_unitario']?>" ><?=$carton['numcarton'] ?></option>
                                    <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- Cantidad -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Cantidad: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required>
                        </div>
                    </div>
                    <input type="hidden" class="prices" id="materiales-base">
                </div>

                <br>
                    
                <!-- botón modal cierres y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#cierres">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaCierres" class="container divcierres">
                    <table class="table" id="cieTable">
                        <tbody id="listcierres"></tbody>
                    </table>
                </div>
                </div>

                <br>
                
                <!-- botón modal accesorios y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#accesorios">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaAccesoriosEmp" class="container divaccesorios">
                    <table class="table">
                        <tbody id="listaccesoriosemp">

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="grid div-derecho impresiones_content" id="form_modelo_1_derecho" style="height: 530px;">

                <!-- grid Empalme del Cajón -->
                <div id="gridEmp" class="divgral">

                    <div class="panel">
                        <img src="<?=URL ?>/public/img/banco.png" style="width: 100px;">
                        <br>
                        Empalme del Cajón
                    </div>

                    <br>

                    <!-- Niveles mostrados -->
                    <div>
                        <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" tabindex="7">
                            
                            <option value="<?=$papelempalme1['id_papel']?>" data-ancho="<?=$papelempalme1['ancho']?>" data-largo="<?=$papelempalme1['largo']?>" data-digital="<?=(strtolower($papelempalme1['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($papelempalme1['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($papelempalme1['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$papelempalme1['costo_unitario']?>" data-nombre="<?=$papelempalme1['nombre'] ?>"><?=$papelempalme1['nombre'] ?></option>
                           
                        </select>
                    </div>
                    
                    <small>Mismo papel para todos <input type="checkbox" id="same_paper" class="chk" checked></small>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaImpresiones" class="container divimpresiones">

                            <table class="table" id="Imptable">
                                <tbody id="listimpresiones">
                                    <?php
                                /* Datos leidos de la tabla cot_offsetemp */
                                foreach ($CotOffsetEmp1 as $cotcffsetemp) { ?>
                                    <tr id="ImpOfEmp"><td class="textImp">Offset</td><td style="display: none"><input id="IDopImpOfEmp" name="IDopImpOfEmp" type="hidden" value="0"></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: <?=$cotcffsetemp['num_tintas']?>, Tipo: <?=$cotcffsetemp['tipo']?></span></td><td class="tintasImp" style="display: none;"><?=$cotcffsetemp['num_tintas']?><input id="tintasselOfEmp" name="tintasselOfEmp" type="hidden" value="<?=$cotcffsetemp['num_tintas']?>"></td><td class="tipoOffset" style="display: none;"><?=$cotcffsetemp['tipo']?><input id="tipoOffEmp" name="tipoOffEmp" type="hidden" value="<?=$cotcffsetemp['tipo']?>"></td><td class="listimpresiones img_delete"></td></tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaAcabadosEmp" class="container divacabados">
                            <table class="table" id="acbTable">
                                <tbody id="listacabadosemp">
                                    <!-- contenido seleccionado -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div>
                        <button id="btnabrebancoemp" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#bancoemp">Añadir Banco <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaBancoEmp" class="container divbancos">
                            <table class="table" id="banTable">
                                <tbody id="listbancoemp">
                                    <!-- contenido seleccionado -->
                                </tbody>
                            </table>
                        </div>
                        <br>
                    </div>
                </div>

                <!-- grid Forro del cajón -->
                <div id="gridFcajon" class="divgral">

                    <div class="panel">
                        <img src="<?=URL ?>/public/img/banco2.png" style="width: 100px;">
                        <br>
                        Forro del Cajón
                    </div>
                    <br>
                    
                    <div>
                        <select class="chosen forros" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" tabindex="8">

                            <option value="<?=$papelfcajon1['id_papel']?>" data-ancho="<?=$papelfcajon1['ancho']?>" data-largo="<?=$papelfcajon1['largo']?>" data-digital="<?=(strtolower($papelfcajon1['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($papelfcajon1['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($papelfcajon1['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$papelfcajon1['costo_unitario']?>"><?=$papelfcajon1['nombre']?>
                            </option>

                        </select>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcajon">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaImpresiones" class="container divimpresiones">
                            <table class="table" id="Imptablefcajon">
                                <tbody id="listimpresionesfcajon">
                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcajon">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaAcabadosFcajon" class="container divacabados">
                            <table class="table" id="acbTableFcajon">
                                <tbody id="listacabadosfcajon">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- grid Forro de la Cartera -->
                <div id="gridFcartera" class="divgral">

                    <div class="panel">
                        <img src="<?=URL ?>/public/img/banco.png" style="width: 100px;">
                        <br>
                        Forro de la Cartera
                    </div>
                    <br>
                    
                    <div>
                        <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera"  tabindex="9">

                            <option value="<?=$papelfcartera1['id_papel']?>" data-ancho="<?=$papelfcartera1['ancho']?>" data-largo="<?=$papelfcartera1['largo']?>" data-digital="<?=(strtolower($papelfcartera1['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($papelfcartera1['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($papelfcartera1['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$papelfcartera1['costo_unitario']?>" selected><?=$papelfcartera1['nombre'] ?>
                            </option>

                        </select>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcartera">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaImpresiones" class="container divimpresiones">
                            <table class="table" id="Imptablefcartera">
                                <tbody id="listimpresionesfcartera">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcartera">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaAcabadosFcartera" class="container divacabados">
                            <table class="table" id="acbTableFcartera">
                                <tbody id="listacabadosfcartera">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- grid Guarda -->
                <div id="gridGuarda" class="divgral">

                    <div class="panel">
                        <img src="<?=URL ?>/public/img/banco2.png" style="width: 100px;">
                        <br>
                        Guarda
                    </div>
                    <br>
                    
                    <div>
                        <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" tabindex="10">

                            <option value="<?=$papelguarda1['id_papel']?>" data-ancho="<?=$papelguarda1['ancho']?>" data-largo="<?=$papelguarda1['largo']?>" data-digital="<?=(strtolower($papelguarda1['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($papelguarda1['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($papelguarda1['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$papelguarda1['costo_unitario']?>" selected><?=$papelguarda1['nombre'] ?>
                            </option>

                            <?php
                            foreach ($papers as $paper) {   ?>

                            <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesguarda">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaImpresiones" class="container divimpresiones">
                            <table class="table" id="Imptableguarda">
                                <tbody id="listimpresionesguarda">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>

                    <div>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaAcabadosGuarda" class="container divacabados">
                            <table class="table" id="acbTableGuarda">
                                <tbody id="listacabadosguarda">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div id="social" class="social" style="/*width: 45%;*/ float: right; /*display: none;*/">
                <button type="button" id="papeles_submit" type="button" class="btn btn-primary" style="font-size: 10px;">CALCULAR</button>

                <button id="subForm" type="submit" class="btn btn-success" style="font-size: 10px;">GUARDAR</button>

                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

                <button type="button" class="btn btn-warning" id="btnResumen" style="font-size: 10px;">RESUMEN</button>

                <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>
                <br>

                <div class="btn-group dropup" style="width: 100%;">
                  <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: left;">
                    <label style="font-size: 25px; margin-right: 100px;">Total: </label>
                    <label id="Totalplus" style="font-size: 25px;">$0.00</label>
                  </button>
                  <div class="dropdown-menu">
                    <table class="table">
                        <tr>
                            <td>Subtotal: </td>
                            <td id="tdSubtotalCaja" class="grand-total">$0.00</td>
                        </tr>
                        <tr>
                            <td>Utilidad: </td>
                            <td id="UtilidadDrop">$0.00</td>
                        </tr>
                        <tr>
                            <td>IVA:</td>
                            <td id="IVADrop">$0.00</td>
                        </tr>
                        <tr>
                            <td>Comisiones: </td>
                            <td id="ComisionesDrop">$0.00</td>
                        </tr>
                        <tr>
                            <td>% Indirecto: </td>
                            <td id="IndirectoDrop">$0.00</td>
                        </tr>
                        <tr>
                            <td>% Ventas: </td>
                            <td id="VentasDrop">$0.00</td>
                        </tr>
                        <tr>
                            <td><button type="button" id="descuentoModal" style="border: none; background: white;">Descuentos: </button></td>
                            <td id="DescuentoDrop">Ninguno</td>
                        </tr>
                    </table>
                    
                  </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php require 'application/views/cotizador/cajas_almeja.php'; ?>

<script type="text/javascript">
    <?php require 'public/js/libs/cajas.js'; ?>
</script>
