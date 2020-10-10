<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/style.css">

<script type="text/javascript">

    //esto es para sacar solo el arreglo dentro de la super matriz, no me deja obtener todas las variables por alguna razon ->
    var a = [<?php echo json_encode($aJson) ?>];
    
    console.log(a);
</script>

<!-- ******* Formulario de Almeja modelo (1) ***** -->
    <div id="form_modelo_1">

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

                        <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>public/img/1_ancho.png); position: relative; width: 200px;">
                        </div>

                        <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>public/img/1_profundidad.png); position: relative; width: 200px;">
                        </div>

                        <br>
                    </div>

                    <!-- formulario de la caja almeja -->
                    <div class="form-content medidas" style="height: 500px;">

                        <input type="hidden" name="modelo" id="modelo" value="1">

                        <!-- ODT -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <input type="hidden" name="nombre_cliente" id="nombre_cliente" value="<?= $Nombre_cliente?>">
                                <span>ODT: </span>
                            </div>

                            <div class="cajas-col-input t-right">
                                
                                <input class="cajas-input medidas-input" name="odt" id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1" value="<?= $aJson['num_odt']?>" autofocus>
                            </div>
                        </div>

                        <!-- id_odt anterior -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>ID: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="" id="id_odt_anterior" value="<?= $aJson['id_odt']?>" disabled>
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
                                <input class="cajas-input medidas-input" name="base" id="corte_largo" type="number" step="any" min="0.01" tabindex="2" placeholder="cm" value="<?= $aJson['base']?>" required>
                            </div>
                        </div>

                        <!-- Ancho Interior -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Alto: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="alto" id="corte_ancho" type="number" step="any" min="0.01" tabindex="3" placeholder="cm" value="<?= $aJson['alto']?>" required>
                            </div>
                        </div>

                        <!-- Profundidad -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Profundidad: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="profundidad" id="profundidad_1" type="number" step="any" min="0.01" placeholder="cm" value="<?= $aJson['profundidad']?>" tabindex="4" required="">
                            </div>
                        </div>

                        <!-- Grosor Cajón -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Grosor Cajón: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <select class="cajas-input medidas-input" name="grosor-cajon" id="grosor_cajon_1" tabindex="5" required>

                                    <option data-price="40" data-ancho="90" data-largo="130" selected="" value="" disabled>Elige</option>

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

                                    <option data-price="40" data-ancho="90" data-largo="130" selected="" disabled="">Elige</option>

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

                                <!--
                                <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required onclick="PrimeroInputs()">
                                -->
                                <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required="" value="<?=$aJson['tiraje']?>">
                            </div>
                        </div>
                    </div>

                    <br>

                    <!-- botón modal cierres y divs -->
                    <div>

                        <button type="button" id="btnabrecierres" class="btn btn-outline-primary" data-toggle="modal" data-target="#cierres">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaCierres" class="container divcierres">
                            
                            <table class="table" id="cieTable">
                                
                                <tbody id="listcierres"></tbody>
                            </table>
                        </div>
                    </div>

                    <br>

                    <!-- botón modal accesorios y divs -->
                    <div>

                        <button type="button" id="btnabreaccesorios" class="btn btn-outline-primary" data-toggle="modal" data-target="#accesorios">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaAccesoriosEmp" class="container divaccesorios">
                            <table class="table" id="accesoriosTable">
                                <tbody id="listaccesorios">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="grid div-derecho" id="form_modelo_1_derecho" style="height: 530px; display: none;">

                    <!-- grid Empalme del Cajón -->
                    <div id="gridEmp" class="divgral">

                        <div class="panel" id="imgEC">
                            <img src="<?=URL ?>/public/img/banco.png" style="width: 100px;">
                            
                            <br>
                            Empalme del Cajón
                        </div>

                        <br>

                        <!-- Niveles mostrados -->
                        <div>
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" tabindex="7">

                                <option value="nulo" selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                    
                                    <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" name="btnCheckPaper" id="btnCheckPaper" class="custom-control-input">
                            <label class="custom-control-label" for="btnCheckPaper"style="font-size: 15px; cursor: pointer;" class="btn btn-outline-primary">Mismo Papel Para Todos</label>
                        </div>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('Empalme')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listimpresiones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('Empalme');">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

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

                        <div class="panel" id="imgFCaj">
                            <img src="<?=URL ?>/public/img/banco2.png" style="width: 100px;">
                            
                            <br>
                            Forro del Cajón
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" tabindex="8" required>

                                <option value="nulo" selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                
                                    <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre']?>
                                </option> <?php } ?>
                            </select>
                        </div>
                        
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_cajon')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                <table class="table" id="Imptablefcajon">
                                    <tbody id="listimpresionesfcajon">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_cajon');">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

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

                        <div class="panel" id="imgFCar">
                            <img src="<?=URL ?>/public/img/banco.png" style="width: 100px;">
                            <br>
                            Forro de la Cartera
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera"  tabindex="9" required>

                                <option value="nulo" selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                    <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_cartera')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                <table class="table" id="Imptablefcartera">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_cartera');">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

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

                        <div class="panel" id="imgG">
                            <img src="<?=URL ?>/public/img/banco2.png" style="width: 100px;">
                            <br>
                            Guarda
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" tabindex="10" required>

                                <option value="nulo" selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                    <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('guarda')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                
                                <table class="table" id="Imptableguarda">
                                    
                                    <tbody id="listimpresionesguarda">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('guarda');">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="container divacabados">
                                
                                <table class="table" id="acbTableGuarda">
                                    
                                    <tbody id="listacabadosguarda">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--
                        <div>
                            <span style="color: black; font-size: 1.2em"> Grabar </span>
                            <br>
                            <input type="radio" name="grabar" id="grabar" value="NO" checked="checked"> No
                            <input type="radio" name="grabar" id="grabar" value="SI"> Si
                            <br>
                        </div>
                        -->
                    </div>
                </div>

                <div class="modal fade" id="modalSaveAll" tabindex="-1" role="dialog" aria-labelledby="modalSaveAll" aria-hidden="true">
    
                    <div class="modal-dialog modal-dialog-centered" role="document">

                        <div class="modal-content">

                            <div class="modal-header azulWhi">

                                <h5 class="modal-title">Error</h5>
                                <!--
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>
                                </button>
                                -->
                            </div>
                    
                            <div class="modal-body">

                                <p style="color: black; font-size: 1.1em">¿Esta seguro de grabar la cotizacion?</p>
                            </div>
                    
                            <div class="modal-footer">

                                <button type="button" class="btn btn-primary azulWhi" data-dismiss="modal" id="subForm2">Si</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Botones de CALCULAR, GUARDAR, TABLAS, RESUMEN e IMPRESION -->
                <div id="social" class="social" style="/*width: 45%;*/ float: right; /*display: none;*/">
                    
                    <button id="papeles_submit" type="button" class="btn btn-primary" style="font-size: 10px;">CALCULAR</button>

                    <button id="subForm" type="button" class="btn btn-success" style="font-size: 10px;" disabled="" data-toggle="modal" data-target="#modalSaveAll">ACTUALIZAR</button>

                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

                    <button type="button" class="btn btn-warning" id="btnResumen" style="font-size: 10px;">RESUMEN</button>

                    <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>
                    <br>

                    <!--<div style="float: left; font-size: 18px; text-align: right; margin-right: 375px;">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required></div>-->

                    <!-- Suma de la ODT(Total)  -->
                    <div class="btn-group dropup" style="width: 100%;">
                        
                        <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: left;">
                            <label style="font-size: 25px; margin-right: 100px;">Total: </label>
                            <label id="Totalplus" style="font-size: 25px;">$<?= $aJson['costo_odt']?></label>
                        </button>
                        
                        <div class="dropdown-menu">
                            
                            <table class="table">
                                <tr>
                                    <td>Subtotal: </td>
                                    <td id="tdSubtotalCaja" class="grand-total">$<?=$aJson['costo_subtotal']?></td>
                                </tr>
                                <tr>
                                    <td>Utilidad: </td>
                                    <td id="UtilidadDrop">$<?= $aJson['Utilidad']?></td>
                                </tr>
                                <tr>
                                    <td>IVA:</td>
                                    <td id="IVADrop">$<?= $aJson['iva']?></td>
                                </tr>
                                
                                <tr>
                                    <td>ISR: </td>
                                    <td id="ISRDrop">$<?= $aJson['ISR']?></td>
                                </tr>
                                <tr>
                                    <td>Comisiones: </td>
                                    <td id="ComisionesDrop">$<?= $aJson['comisiones']?></td>
                                </tr>
                                <tr>
                                    <td>% Indirecto: </td>
                                    <td id="IndirectoDrop">$<?= $aJson['indirecto']?></td>
                                </tr>
                                <tr>
                                    <td>Ventas: </td>
                                    <td id="VentasDrop">$<?= $aJson['ventas']?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" id="descuentoModal" style="border: none; background: white;">Descuento: (0%) </button>
                                    </td>

                                    <td id="DescuentoDrop"></td>
                                    <script type="text/javascript">

                                        $("#DescuentoDrop").html("$"+parseFloat(<?= $aJson['descuento']?>).toFixed(2));
                                        $("#descuentoModal").html("Descuento: (" + <?= $aJson['descuento_pctje'] ?> + "%)");
                                        descuento = <?= $aJson['descuento']?>;
                                        
                                    </script>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!--<div style="float: left; font-size: 25px;">Total: </div>-->

                    <!--<div  id="gran_total">$0.00</div>-->
                </div>

                <!-- Modulos de botones azules -->
                <div class="wrap right" style="width: 100%; margin-left: 8px; display: none;">

                    <div class="aumentos">

                        <table class="t-resume" style="display: none;">

                            <thead>

                                <tr>
                                    <th>Contenido</th>
                                    <th>Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody id="forros-select">

                            </tbody>

                            <tbody id="resume-body">

                            </tbody>

                            <tbody id="discount-body">

                            </tbody>

                            <tbody>

                                <tr>

                                    <td style="text-align: right; color: #2c3e50; font-weight: bold; back">TOTAL:</td>
                                    <td id="total">$0.0</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- tabla de mermas -->
                        <div class="container" style="text-align: left;">
                            <table>
                                <thead>
                                    <tr style="text-align: center;">
                                        <td></td>
                                        <td><strong>Minima</strong></td>
                                        <td></td>
                                        <td><strong>Adicional</strong></td>
                                        <td></td>
                                        <td><b>Total<b></td>
                                    </tr>
                                </thead>
                                
                                <tr>
                                    <td>Offset</td>
                                    <td>

                                        <input name="offset1" id="offset1" type="text" style="border: none;" readonly>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="offsetadic" id="offsetadic" type="text" style="border: none;" readonly>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="offset" id="offset" type="text" style="border: none;" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Digital</td>
                                    <td>

                                        <input name="digital1" id="digital1" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="digitaladic" id="digitaladic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="digital" id="digital" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Serigrafia</td>
                                    <td>

                                        <input name="serigrafia1" id="serigrafia1" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="serigrafiaadic" id="serigrafiaadic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="serigrafia" id="serigrafia" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>HS</td>
                                    <td>

                                        <input name="hs1" id="hs1" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="hsadic" id="hsadic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="hs" id="hs" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Laminado</td>
                                    <td>

                                        <input name="laminado1" id="laminado1" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="laminadoadic" id="laminadoadic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="laminado" id="laminado" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Barniz UV</td>
                                    <td>

                                        <input name="barniz1" id="barniz1" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="barnizadic" id="barnizadic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="barniz" id="barniz" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Suaje</td>
                                    <td>

                                        <input name="suaje1" id="suaje1" type="text" style="border: none;" readonly>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="suajeadic" id="suajeadic" type="text" style="border: none;" readonly>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="suaje" id="suaje" type="text" style="border: none;" readonly>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Forrado</td>
                                    <td>

                                        <input name="forrado1" id="forrado1" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="forradoadic" id="forradoadic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="forrado" id="forrado" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Grabado</td>
                                    <td>

                                        <input name="grabadomin" id="grabadomin" type="text" readonly style="border: none;">
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="grabadoadic" id="grabadoadic" type="text" style="border: none;" readonly required>
                                    </td>
                                    <td></td>
                                    <td>

                                        <input name="grabadotot" id="grabadotot" type="text" style="border: none;" readonly required>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="canvacero">

                            <p>Cajon</p>
                            <canvas height="175" width="250" id="cajon" style="margin-right:15px;background-color: #fff;">
                                Su navegador no soporta en elemento CANVAS
                            </canvas>
                        </div>

                        <div class="canvacero">

                            <p>Forro cajon</p>
                            <canvas height="175" width="250" id="forro_cajon" style="margin-right:15px;background-color: #fff;">
                                Su navegador no soporta en elemento CANVAS
                            </canvas>
                        </div>

                        <div class="canvacero">

                            <p>Guarda Cajon</p>
                            <canvas height="175" width="250" id="guarda_cajon" style="margin-right:15px;background-color: #fff;">
                                Su navegador no soporta en elemento CANVAS
                            </canvas>
                        </div>

                        <div class="canvacero">

                            <p>Cartera</p>
                            <canvas height="175" width="250" id="cartera" style="margin-right:15px;background-color: #fff;">
                                Su navegador no soporta en elemento CANVAS
                            </canvas>
                        </div>

                        <div class="canvacero">

                            <p>Forro exterior cartera</p>
                            <canvas height="175" width="250" id="forro_cartera" style="margin-right:15px;background-color: #fff;">
                                Su navegador no soporta en elemento CANVAS
                            </canvas>
                        </div>

                        <div class="canvacero">

                            <p>Forro interior Cartera</p>
                            <canvas height="175" width="250" id="guarda" style="margin-right:15px;background-color: #fff;">
                                Su navegador no soporta en elemento CANVAS
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<!-- ******* Todos los Modales Impresiones ******* -->
    <!-- Modal Impresiones Empalme -->
    
    <div class="modal fade" id="Impresiones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi">
                    <h5 class="modal-title" id="exampleModalLongTitle">Impresiones</h5>
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div id="alerterrorimp">

                    </div>

                    <div>

                        <select id="miSelect" class="SelectTSM">

                            <option selected value="selected" disabled>Elige el tipo de impresión</option>

                            <?php
                            foreach ($impresiones as $impresion) {   ?>

                                <option id="Imp" value="<?=$impresion['nombre']?>" data-precio="<?=$impresion['precio']?>" data-id="<?=$impresion['id_impresion']?>"><?=$impresion['nombre']?></option>
                            <?php
                            }

                            ?>
                        </select>
                    </div>
                
                    <div id="opImpresionOffset" style="display: none;">

                        <table class="table" style="text-align: left;" >

                            <tbody>

                                <tr>

                                    <td>Número de tintas:</td>
                                    <td>

                                        <input type="number" id="tintasO" value="1" style="width: 50px;" min="1" max="6">
                                    </td>
                                </tr>

                                <tr>

                                    <td colspan="2">

                                        <select  id="SelectImpTipoOff" class="SelectTSM">

                                            <option selected value="selected" disabled>Elige el tipo de offset</option>

                                            <?php
                                            foreach ($TipoImp as $TipoImps) {   ?>

                                                <option id="Imp" value="<?=$TipoImps['nombre']?>" data-precio="<?=$TipoImps['precio']?>" data-id="<?=$TipoImps['id_impresiones_slave']?>"><?=$TipoImps['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="opImpresionDigital" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>

                                <tr>

                                    <td colspan="2">

                                        <label>Se agregará una impresión digital</label>
                                        <!--<select  id="SelectImpDigital" class="SelectTSM">

                                            <option selected value="selected" disabled>Elige el tipo de Digital</option>

                                            <?php

                                                $carta  = $Digital['carta'];
                                                $carta2  = $Digital['dobleCarta'];
                                                foreach ($carta as $dig) { ?>

                                                    <option id="ImpDig" value="<?=$dig['nombre']?>"  data-id="<?=$dig['id_proc_digital']?>"><?=$dig['nombre']?></option>
                                            <?php

                                                }
                                            ?>
                                        </select>-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="opImpresionSerigrafia" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>

                                <tr>

                                    <td>Número de tintas:</td>
                                    <td>

                                        <input type="number" value="1" id="tintasS" style="width: 50px;" min="1" max="6">
                                    </td>
                                </tr>

                                <tr>

                                    <td colspan="2">

                                        <select  id="SelectImpTipoSeri" class="SelectTSM">

                                            <option selected value="selected" disabled>Elige el tipo de serigrafia</option>

                                            <?php
                                            foreach ($TipoImp as $TipoImps) {   ?>

                                                <option id="Imp" value="<?=$TipoImps['nombre']?>" data-precio="<?=$TipoImps['precio']?>" data-id="<?=$TipoImps['id_impresiones_slave']?>"><?=$TipoImps['nombre']?></option>
                                            <?php
                                            }
                                        ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                </div>

                <div class="modal-footer">

                    <button type="button" id="btnImpresiones" class="btn btn-guardar-blues">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
 
<!-- ******* Todos los Modales Acabados ********** -->
    <!-- Acabados Empalme -->
    <div class="modal fade" id="acabados" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                
                <div class="modal-header azulWhi">
                    
                    <h5 class="modal-title" id="exampleModalLongTitle">Acabados</h5>
                    
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
                        
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">

                    <div id="alerterror">

                    </div>
                    
                    <div>
                        
                        <select  id="SelectAcEmp" class="SelectTSM">
                            
                            <option selected value="selected" disabled>Elige el tipo de acabado</option>
                            
                            <?php
                            foreach ($acabados as $acabado) {   ?>
                                
                                <option id="Acb" value="<?=$acabado['nombre']?>" data-precio="<?=$acabado['precio']?>" data-id="<?=$acabado['id_acabados']?>"><?=$acabado['nombre']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div id="opAcLaminadoEmp" style="display: none;">
                        
                        <br>
                        <table class="table" style="text-align: left;">
                            
                            <tbody>
                                <tr>
                                    <td>
                                        <select  id="SelectLaminadoEmp" class="SelectTSM">
                                            <option selected value="selected" disabled>Elige un tipo de laminado</option>
                                            <?php
                                            foreach ($ALaminados as $alaminado) {   ?>
                                            <option id="aLam" value="<?=$alaminado['nombre']?>" data-precio="<?=$alaminado['precio']?>" data-id="<?=$alaminado['id_proc_laminado']?>"><?=$alaminado['nombre']?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="opAcHotStampingEmp" style="display: none;">
                        
                        <br>
                        <table class="table" style="text-align: left;">
                            <tbody>
                                <tr>
                                    <td>Largo: <input type="number" id="LargoHS_ver" name="LargoHS_ver" value="1" style="width: 70px;" min="1">cm</td>
                                    <td>Ancho: <input type="number" id="AnchoHS_ver" name="AnchoHS_ver" value="1" style="width: 70px;" min="1">cm</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectHSEmp" class="SelectTSM">
                                            <option selected value="selected" disabled>Elige un tipo de HotStamping</option>
                                            <?php
                                            foreach ($AHotStamping as $ahotstam) {   ?>
                                            <option id="aHS" value="<?=$ahotstam['nombre']?>" data-precio="<?=$ahotstam['precio']?>" data-id="<?=$ahotstam['id_slave_hs']?>"><?=$ahotstam['nombre']?></option>
                                            <?php
                                            }   ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectColorHSEmp" class="SelectTSM">
                                            <option selected value="selected" disabled>Elige un color</option>
                                            <?php
                                            foreach ($Colores as $Coloress) {   ?>
                                            <option id="cHS" value="<?=$Coloress['nombre']?>" data-precio="<?=$Coloress['precio']?>"><?=$Coloress['nombre']?></option>
                                            <?php
                                            } ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                <div id="opAcGrabadoEmp" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoGrab" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoGrab" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectGrabEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de grabado</option>
                                        <?php
                                        foreach ($AGrabados as $agrabado) {   ?>
                                        <option id="Grab" value="<?=$agrabado['nombre']?>" data-precio="<?=$agrabado['precio']?>"><?=$agrabado['nombre']?></option>
                                        <?php
                                        }   ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectUbiGrabEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige la ubicación del grabado</option>
                                        <option id="Ubi" value="Lomo" data-precio="">En el Lomo</option>
                                        <option id="Ubi" value="Cierre" data-precio="">En el cierre</option>
                                        <option id="Ubi" value="Tapa" data-precio="">En la Tapa</option>
                                        <option id="Ubi" value="Izquierdo" data-precio="">Lado Izquierdo</option>
                                        <option id="Ubi" value="Derecho" data-precio="">Lado Derecho</option>
                                        <option id="Ubi" value="Fondo" data-precio="">En el Fondo</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div id="imagengrabados">
                        <img border="0" src="<?=URL ;?>public/img/1.png" style="width: 70%">
                    </div>
                </div>

                <div id="opAcEspecialesEmp" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectEspecialesEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de Pegado Especial</option>
                                        <?php
                                        foreach ($APEspeciales as $aespeciales) {   ?>
                                        <option id="aLam" value="<?=$aespeciales['nombre']?>" data-precio="<?=$aespeciales['precio']?>"><?=$aespeciales['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcBarnizUVEmp" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectBarnizUVEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo</option>
                                        <?php
                                        foreach ($ABarnizUV as $aBarniz) {   ?>
                                        <option id="aBar" value="<?=$aBarniz['nombre']?>" data-precio="<?=$aBarniz['precio']?>"><?=$aBarniz['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcSuajeEmp" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoSuaje" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoSuaje" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectSuajeEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de Suaje</option>
                                        <?php
                                        foreach ($ASuaje as $asuaj) {   ?>
                                        <option id="aSuaj" value="<?=$asuaj['nombre']?>"><?=$asuaj['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcLaserEmp" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoLaser1" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoLaser1" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectLaserEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de laser</option>
                                        <?php
                                        foreach ($ALaser as $alaser) {   ?>
                                        <option id="alaser" value="<?=$alaser['nombre']?>" data-precio="<?=$alaser['precio']?>"><?=$alaser['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcBarUVEmp" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoBarUVEmp" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoBarUVEmp" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAcabados" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>

<!-- ******* Todos los modales Banco ************* -->
    <!-- Banco Empalme -->
    <div class="modal fade" id="bancoemp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header azulWhi">
            <h5 class="modal-title" id="exampleModalLongTitle">Banco</h5>
            <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

                <div id="alerterror5">

                </div>
                <div>
                    <select id="SelectBanEmp" class="SelectTSM">
                        <option selected value="selected" disabled>Elige un material</option>
                        <?php
                        foreach ($bancos as $banco) {   ?>
                        <option id="Ban" value="<?=$banco['nombre']?>" data-precio="<?=$banco['precio']?>" data-id="<?=$banco['id_acabados']?>"><?=$banco['nombre']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <br>

                <div>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: </td><td><input type="number" id="LargoBanco" name="LargoBanco" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                                <td>Ancho: </td><td><input type="number" id="AnchoBanco" name="AnchoBanco" value="1" style="width: 70px;" min="1">cm</td>
                            <tr>
                                <td>Profundidad: </td><td><input type="number" id="ProfundidadBanco" name="ProfundidadBanco" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr id="llevasuajemodBanco" style="display: none;">
                                <td>¿Lleva Suaje?: </td>
                                <td>
                                    <select class="SelectTSM" id="SelectSuajeBanco">

                                        <option value="No">No</option>
                                        <option value="Si">Si</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" id="footerBancoEmp" style="display: none">
                <button type="button" id="btnBancoEmp" name="btnBancoEmp" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="modal-footer" id="footerBancoFcajon" style="display: none">
                <button type="button" id="btnBancoFcajon" name="btnBancoFcajon" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="modal-footer" id="footerBancoFcartera" style="display: none">
                <button type="button" id="btnBancoFcartera" name="btnBancoFcartera" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            <div class="modal-footer" id="footerBancoGuarda" style="display: none">
                <button type="button" id="btnBancoGuarda" name="btnBancoGuarda" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>


<!-- ******* Todo el Modal Cierres ************** -->
    <div class="modal fade" id="cierres" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header azulWhi">
            <h5 class="modal-title" id="exampleModalLongTitle">Cierres</h5>
            <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

                <div id="alerterror6">

                </div>
                <div>
                    <select  id="SelectCieEmp" class="SelectTSM">
                        <option selected value="selected" disabled>Elige el tipo de cierre</option>
                        <?php
                        foreach ($cierres as $cierre) {   ?>
                        <option id="Acb" value="<?=$cierre['nombre']?>" data-precio="<?=$cierre['precio']?>" data-id="<?=$cierre['id_cierres']?>"><?=$cierre['nombre']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="opCieParaPares" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Número de pares:</td>
                                <td>
                                    <input type="number" id="paresCierre" value="1" style="width: 50px;" min="1">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opCieListon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoListon" name="LargoHS_ver" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoListon" name="AnchoHS_ver" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectListonEmp" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de liston</option>
                                        <?php
                                        foreach ($TipoListon as $tipliston) {   ?>
                                        <option id="listontip" value="<?=$tipliston['nombre']?>" data-precio="<?=$tipliston['precio']?>" data-id="<?=$tipliston['id_liston']?>"><?=$tipliston['nombre']?></option>
                                        <?php
                                        }   ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectColorListon" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un color</option>
                                        <?php
                                        foreach ($ColoresListon as $coloresls) {   ?>
                                        <option id="clis" value="<?=$coloresls['nombre']?>" data-precio="<?=$coloresls['precio']?>"><?=$coloresls['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opCieMarialuisa" style="display: none;">

                    <table class="table" style="text-align: left;">

                        <tbody>

                            <tr>

                                <td colspan="2">Se agregará un cierre Marialuisa
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opCieSuajeCalado" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoSCalado" name="LargoSCalado" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoSCalado" name="AnchoSCalado" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectSCalado" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo</option>
                                        <?php
                                        foreach ($ALaser as $alaser) {   ?>
                                        <option id="liston" value="<?=$alaser['nombre']?>" data-precio="<?=$alaser['precio']?>"><?=$alaser['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnCierres" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>

    <!-- se completo el cierre del div -->
    <div class="modal fade" id="accesorios" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header azulWhi">
            <h5 class="modal-title" id="exampleModalLongTitle">Accesorios</h5>
            <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

                <div id="alerterror7">

                </div>


                <div>
                    <table class="table">
                        <tr>
                            <td>
                                <select  id="SelectAccesorio" class="SelectTSM">
                                    <option selected value="selected" disabled>Elige un tipo</option>
                                    <?php
                                        foreach ($accesorios as $accesorio) {
                                    ?>
                                            <option id="idAccesorio" data-id="<?=$accesorio['id_accesorios']?>" data-group="accesorios" data-price="<?=$accesorio['precio']?>"><?=$accesorio['nombre']?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div id="opMedidas" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoAcc" name="LargoAcc" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoAcc" name="AnchoAcc" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="opOjillo" style="display: none;">
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td colspan="2">se agregará un accesorio Ojillo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="opColores" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select id="SelectColor" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un color</option>
                                            <?php
                                                foreach ($ColoresListon as $Colores) {
                                            ?>
                                                    <option id="cl" value="<?=$Colores['nombre']?>" data-precio="<?=$Colores['precio']?>"><?=$Colores['nombre']?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="opHerraje" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectHerraje" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un herraje</option>
                                            <?php
                                                foreach ($Herrajes as $herraje) {
                                            ?>
                                                    <option id="h" value="<?=$herraje['nombre']?>" data-precio="<?=$herraje['precio']?>"><?=$herraje['nombre']?></option>
                                            <?php
                                                }
                                            ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <div class="modal-footer">
                <button type="button" id="btnAccesorios" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" id="btnCancelAccesorios" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>
    </div>

    <!-- Modal Tablas (Tablas de Registros) -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="procesosModal">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            
            <div class="modal-content">
                
                <div class="modal-header azulWhi">
                    
                    <h5 class="modal-title" id="exampleModalLongTitle">Tablas de Registros</h5>
                    
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
                        
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <!-- Tabla de Registros -->
                <div class="modal-body">
                    
                    <div class="accordion" id="accordionExample">
                        
                        <!-- Cortes de Hojas -->
                        <div class="card">
                            
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" onmouseover="this.style.cursor='pointer'">
                                
                                <h2 class="mb-0">
                                
                                    <button class="btn btn-link" type="button" style="text-decoration: none;">
                                        Cortes de Hojas
                                    </button>
                                </h2>
                            </div>
                            
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            
                                <div class="card-body">
                                    
                                    <table class="t-resume" style="text-align: center;">
                                        
                                        <tbody id="table_papeles_tr">
                                            <!-- Aquí se registran los datos -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                        
                            <!-- Procesos Default -->
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" onmouseover="this.style.cursor='pointer'">
                                    
                                <h2 class="mb-0">
                                        
                                    <button class="btn btn-link collapsed" type="button" style="text-decoration: none;">
                                        Procesos Default
                                    </button>
                                </h2>
                            </div>
                    
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      
                                <div class="card-body">
                                    
                                    <table class="t-resume" style="text-align: center;">
                                        
                                        <tbody id="table_adicionales_tr">
                                            <!-- Aquí se registran los procesos default -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Mermas Integradas -->
                        <div class="card">
                            
                            <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" onmouseover="this.style.cursor='pointer'">
                                
                                <h2 class="mb-0">
                                
                                    <button class="btn btn-link collapsed" type="button" style="text-decoration: none;">
                                        Mermas Integradas
                                    </button>
                                </h2>
                            </div>
                            
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                
                                <div class="card-body">
                                    
                                    <!-- tabla de mermas resumen -->
                                    <table class="t-resume" style="text-align: center;">
                                        
                                        <thead style="background: darkslateblue; color: white;">
                    
                                            <tr>
                                                <td></td>
                                                <td style="color: white;">Proceso</td>
                                                <td style="color: white;">Minima</td>
                                                <td style="color: white;">Adicional</td>
                                                <td style="color: white;">Total</td>
                                                <td style="color: white;">Costo Unitario</td>
                                                <td style="color: white;">Costo Total</td>
                                            </tr>
                                        </thead>
                                        
                                        <tbody id="table_mermas_tr">
                                            <!-- Aquí se registran los datos -->
                                        </tbody>
                                        
                                        <tfoot>
                                            
                                            <tr>
                                                <td colspan="7" style="font-size: x-small;">E: Empalme | Fj: Forro del Cajón | Fr: Forro de la Cartera | G: Guarda</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Procesoso deImpresión -->
                        <div class="card">
                                
                            <div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" onmouseover="this.style.cursor='pointer'">
                                
                                <h2 class="mb-0">
                                
                                    <button class="btn btn-link collapsed" type="button" style="text-decoration: none;">
                                        Procesos de Impresión
                                    </button>
                                </h2>
                            </div>
                
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                
                                <div class="card-body">
                                    
                                    <!-- procesos offset Empalme-->
                                    <div class="container" id="proceso_offset_M1" style="display: none;">
                                        <h5>Offset</h5>
                                        
                                        <table id="tabla_view_offset_emp" class="t-resume" style="text-align: center;">
                                            
                                            <tbody id="table_proc_offset">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Serigrafia -->
                                    <div class="container" id="proceso_serigrafia_M1" style="display: none;">
                                    
                                        <h5>Serigrafia</h5>
                                        
                                        <table id="tabla_aj_serigrafia_emp" class="t-resume" style="text-align: center;">
                                        
                                            <tbody id="table_proc_serigrafia">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Digital -->
                                    <div class="container" id="proceso_digital_M1" style="display: none;">
                                        
                                        <h5>Digital</h5>
                                        
                                        <table id="tabla_aj_digital_emp" class="t-resume" style="text-align: center;">
                                            
                                            <tbody id="table_proc_digital">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Procesos de Acabados -->
                        <div class="card">
                        
                            <div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive" onmouseover="this.style.cursor='pointer'">
                            
                                <h2 class="mb-0">
                                    
                                    <button class="btn btn-link" type="button" style="text-decoration: none;">
                                        Procesos de Acabados
                                    </button>
                                </h2>
                            </div>
                
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                
                                <div class="card-body">
                                    <!-- proceso laminado-->
                                    <div class="container" id="proceso_lam_M1" style="display: none;">
                                    
                                        <h5>Laminado</h5>
                                        
                                        <table id="tabla_view_Lam" class="t-resume" style="text-align: center;">
                                            
                                            <tbody id="table_proc_Lam">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- proceso hot stamping-->
                                    <div class="container" id="proceso_hs_M1" style="display: none;">
                                        
                                        <h5>HotStamping</h5>
                                        
                                        <table id="tabla_view_HS" class="t-resume" style="text-align: center;">
                                            
                                            <tbody id="table_proc_HS">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                    
                                    <!-- proceso grabados-->
                                    <div class="container" id="proceso_grab_M1" style="display: none;">
                                        
                                        <h5>Grabados</h5>
                                        
                                        <table id="tabla_view_Grab" class="t-resume" style="text-align: center;">
                                            
                                            <tbody id="table_proc_Grab">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <!-- proceso suaje-->
                                    <div class="container" id="proceso_suaje_M1" style="display: none;">
                                        <h5>Suaje</h5>
                                        
                                        <table id="tabla_view_Suaje" class="t-resume" style="text-align: center;">
                                            <tbody id="table_proc_Suaje">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- proceso corte laser-->
                                    <div class="container" id="proceso_laser_M1" style="display: none;">
                                        <h5>Corte Laser</h5>
                                        
                                        <table id="tabla_view_Laser" class="t-resume" style="text-align: center;">
                                            <tbody id="table_proc_Laser">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- proceso barniz uv -->
                                    <div class="container" id="proceso_barnizuv_M1" style="display: none;">
                                        <h5>Barniz UV</h5>
                                        
                                        <table id="tabla_view_BarnizUV" class="t-resume" style="text-align: center;">
                                            <tbody id="table_proc_BarnizUV">
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Procesos Banco -->
                        <div class="card">

                            <div class="card-header" id="headingSix" onmouseover="this.style.cursor='pointer'"  data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            
                                <h2 class="mb-0">
                    
                                    <button class="btn btn-link" type="button" style="text-decoration: none;">Bancos
                                    </button>
                                </h2>
                            </div>
                            
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                            
                                <div class="card-body">
                        
                                    <!-- proceso laminado-->
                                    <div class="container" id="bancos" style="display:none;">
                                        
                                        <table id="" class="t-resume" style="text-align: center;">
                                            <thead style="background: steelblue;color: white;">
                                                <td style="color: white">Tipo</td>
                                                <td style="color: white">Suaje</td>
                                                <td style="color: white">Costo Unitario</td>
                                                <td style="color: white">Total</td>
                                            </thead>
                                            
                                            <tbody id="tabla_bancos">
                                                
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Procesos Cierres -->
                        <div class="card">

                            <div class="card-header" id="headingSeven" onmouseover="this.style.cursor='pointer'"  data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            
                                <h2 class="mb-0">
                    
                                    <button class="btn btn-link" type="button" style="text-decoration: none;">Cierres
                                    </button>
                                </h2>
                            </div>
                            
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                            
                                <div class="card-body">

                                    <div class="container" id="divCierres" style="display:none;">
                                        
                                        <table id="" class="t-resume" style="text-align: center;">
                                            
                                            <tbody id="tabla_cierres">
                                                
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Procesos Accesorios -->
                        <div class="card">

                            <div class="card-header" id="headingEight" onmouseover="this.style.cursor='pointer'"  data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
            
                                <h2 class="mb-0">
                    
                                    <button class="btn btn-link" type="button" style="text-decoration: none;">Accesorios
                                    </button>
                                </h2>
                            </div>
                            
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                            
                                <div class="card-body">
                        
                                    <!-- proceso laminado-->
                                    <div class="container" id="divAccesorios" style="display:none;">
                                        
                                        <table id="" class="t-resume" style="text-align: center;">

                                            <tbody id="tabla_accesorios">
                                                
                                                <!-- Aquí se registran los datos -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          
                <div class="modal-footer">
                        
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Resumen -->
    <div id="resumentodocaja" style="display: none;">

        <button type="button" style="text-align: end; border: none; background: none; width: 100%;" id="btnQuitarResumen"><img border="0" src="<?=URL ;?>public/img/eliminar.png" style="width: 2%;">
        </button>
        
        <table class="table tableresumenn" id="ResumenCostos">
        
            <thead id="resumenHead">
                <!-- -->
            </thead>

            <thead class="thead-dark">
        
                <tr>
                    <th style="width: 20%"></th>
                    <th>Adiciones</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody id="resumenEmpalme">
                <!-- -->
            </tbody>

            <tbody id="resumenFcajon">
                <!-- -->
            </tbody>

            <tbody id="resumenFcartera">
                <!-- -->
            </tbody>

            <tbody id="resumenGuarda">
                <!-- -->
            </tbody>

            <tbody id="resumenEncuadernacion">
                <!-- -->
            </tbody>

            <tbody id="resumenMensajeria">
                <!-- -->
            </tbody>

            <tbody id="resumenEmpaque">
                <!-- -->
            </tbody>

            <tbody id="resumenBancos">
                <!-- -->
            </tbody>

            <tbody id="resumenCierres">
                <!-- -->
            </tbody>

            <tbody id="resumenAccesorios">
                <!-- -->
            </tbody>

            <tbody id="resumenOtros">
                <!-- -->
            </tbody>
        </table>
        <img border="0" src="<?=URL ;?>public/img/henpp.png" style="width: 7%; margin: 2%"><small>Todos los derechos reservados. Historias En Papel 2019.</small>
    </div>


    <!-- Descuentos y botones de Guardar y Cancelar del modal "Descuentos" -->
    <div class="modal fade" id="descuentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                
                <div class="modal-header azulWhi">
                    
                    <h5 class="modal-title" id="exampleModalLongTitle">Descuentos</h5>
                    
                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
                        
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">

                    <!-- Descuentos: 3%; 5%; 10%; 15%; 20% -->
                    <div>
                        <table>
                            <?php
                            foreach ($descuentos as $descuento) { ?>

                                <tr>
                                    <td>
                                        Aplicar el <?=$descuento['cantidad']?>%
                                    </td>
                                    <td>
                                        <input class="d-check" type="radio" name="desc" data-discount="<?=$descuento['cantidad']?>" data-value="1"  value="<?=$descuento['cantidad']?>">
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" id="btnSaveDescuento" class="btn btn-guardar-blues">Guardar</button>

                    <button type="button" id="btnCancelDescuento" class="btn btn-danger" data-dismiss="modal">Eliminar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalError" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi" style="background: red">

                    <h5 class="modal-title" id="txtTituloModal">Error</h5>
                </div>
        
                <div class="modal-body">

                    <p id="txtContenido" style="color: black; font-size: 1.1em"></p>
                </div>
        
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary azulWhi" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCorrecto" tabindex="-1" role="dialog" aria-labelledby="modalCorrecto" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi">

                    <h5 class="modal-title" id="txtTitModCorrecto">Registro Exitoso</h5>

                </div>
        
                <div class="modal-body">

                    <p id="txtContCorrecto" style="color: black; font-size: 1.1em"></p>
                </div>
        
                <div class="modal-footer">

                    <button id="btnModCorrecto" type="button" class="btn btn-primary azulWhi" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php

if ($aJson) { ?>

    <script type="text/javascript">
        var papel_elegido  = false;
        var id_cajon     = <?= $aJson['id_grosor_cajon']?>;
        var id_cartera   = <?= $aJson['id_grosor_cartera']?>;
        var id_papelE    = <?= $aJson['id_papel_empalme']?>;
        var id_papelFCaj = <?= $aJson['id_papel_Fcajon']?>;
        var id_papelFCar = <?= $aJson['id_papel_Fcartera']?>;
        var id_papelG    = <?= $aJson['id_papel_guarda']?>;


        //option grosor cajon y grosor cartera
        $("#grosor_cajon_1 option[data-id=" + id_cajon +"]").attr("selected", true);
        $("#grosor_cartera_1 option[data-id=" + id_cartera +"]").attr("selected", true);


        //papeles en 4 secciones
        papel_elegido = true;

        $("#interior_cajon option[value='" + id_papelE +"']").prop("selected",true);
        $("#exterior_cajon option[value='" + id_papelFCaj +"']").prop("selected",true);
        $("#interior_cartera option[value='" + id_papelG +"']").prop("selected",true);
        $("#exterior_cartera option[value='" + id_papelFCar +"']").prop("selected",true);

        $("#interior_cajon").addClass('paper_selected');
        $("#exterior_cartera").addClass('paper_selected');
        $("#interior_cartera").addClass('paper_selected');
        $("#exterior_cajon").addClass('paper_selected');

    </script>
<?php
    }
?>


<!-- para generar la tabla resumen y tablas -->
<script type="text/javascript">
    
    var rm_empalme   = '<tr><td><b>Empalme del Cajón</b></td><td></td><td></td><td></td></tr>';
    var rm_fcajon    = '<tr><td><b>Forro del Cajón</b></td><td></td><td></td><td></td></tr>';
    var rm_fcartera  = '<tr><td><b>Forro de la Cartera</b></td><td></td><td></td><td></td></tr>';
    var rm_guarda    = '<tr><td><b>Guarda</b></td><td></td><td></td><td></td></tr>';
    var rm_cartoncaj = '<tr><td><b>Cartón Cajón</b></td><td></td><td></td><td></td></tr>';
    var rm_cartoncar = '<tr><td><b>Cartón Cartera</b></td><td></td><td></td><td></td></tr>';
    var rm_head = "<tr><td><b>ODT: </b><?= $aJson['num_odt']?></td><td><b>Cantidad: </b><?= $aJson['tiraje']?></td><td><b>Cliente: </b> <?= $aJson['Nombre_cliente']?></td><td><b>Fecha: <?= $aJson['Fecha']?> </b></td></tr>";
    var rm_msj = '<tr><td><b>Costo Mensajería</b></td><td></td><td></td><td></td></tr>';
    var rm_emp = '<tr><td><b>Costo Empaque</b></td><td></td><td></td><td></td></tr>';
    var rm_enc = '<tr><td><b>Encuadernación</b></td><td></td><td></td><td></td></tr>';


    jQuery214('#resumenEmpalme').append(rm_empalme); //imprime para el resumen
    jQuery214('#resumenFcajon').append(rm_fcajon); //imprime para el resumen
    jQuery214('#resumenFcartera').append(rm_fcartera); //imprime para el resumen
    jQuery214('#resumenGuarda').append(rm_guarda); //imprime para el resumen
    $('#resumenMensajeria').append(rm_msj);
    $('#resumenEmpaque').append(rm_emp);
    $('#resumenEncuadernacion').append(rm_enc);

    var mensajeria = parseFloat(<?=$aJson['mensajeria']?>).toFixed(2);
    var empaque = parseFloat(<?=$aJson['empaque']?>).toFixed(2);
    var costo_msj = "<tr><td></td><td></td><td></td><td>$" + mensajeria + "</td></tr>";
    $('#resumenMensajeria').append(costo_msj);

    var costo_emp= "<tr><td></td><td></td><td></td><td>$" + empaque + "</td></tr>";
    $('#resumenEmpaque').append(costo_emp);

    //resumen - papeles
    var parteresumen = '<tr><td></td><td>Papel <?=$aJson['Papel_Empalme']['nombre']?></td><td>$<?=$aJson['Papel_Empalme']['costo_unitario']?><input type="hidden" class="pricesresumenempalme" value="<?=$aJson['Papel_Empalme']['costo_tot_pliegos']?>"></td><td></td></tr>';
    $('#resumenEmpalme').append(parteresumen)
    parteresumen = '<tr><td></td><td>Papel <?=$aJson['Papel_FCaj']['nombre']?></td><td>$<?=$aJson['Papel_FCaj']['costo_unitario']?><input type="hidden" class="pricesresumenfcajon" value="<?=$aJson['Papel_FCaj']['costo_tot_pliegos']?>"></td><td></td></tr>';
    $('#resumenFcajon').append(parteresumen);
    parteresumen = '<tr><td></td><td>Papel <?=$aJson['Papel_FCar']['nombre']?></td><td>$<?=$aJson['Papel_FCar']['costo_unitario']?><input type="hidden" class="pricesresumenfcartera" value="<?=$aJson['Papel_FCar']['costo_tot_pliegos']?>"></td><td></td></tr>';
    $('#resumenFcartera').append(parteresumen);
    parteresumen = '<tr><td></td><td>Papel <?=$aJson['Papel_Guarda']['nombre']?></td><td>$<?=$aJson['Papel_Guarda']['costo_unitario']?><input type="hidden" class="pricesresumenguarda" value="<?=$aJson['Papel_Guarda']['costo_tot_pliegos']?>"></td><td></td></tr>';
    $('#resumenGuarda').append(parteresumen);

    //resumen - cartones
    parteresumen = '<tr><td></td><td><?=$aJson['CartonCaj']['nombre']?></td><td>$<?=$aJson['CartonCaj']['costo_tot_carton']?><input type="hidden" class="pricesresumenempalme" value="<?=$aJson['CartonCaj']['costo_tot_carton']?>"></td><td></td></tr>';
    $('#resumenEmpalme').append(parteresumen);
    parteresumen = '<tr><td></td><td><?=$aJson['CartonCar']['nombre']?>td><td>$<?=$aJson['CartonCar']['costo_tot_carton']?><input type="hidden" class="pricesresumenfcartera" value="<?=$aJson['CartonCar']['costo_tot_carton']?>"></td><td></td></tr>';
    $('#resumenFcartera').append(parteresumen);

    //resumen - ranurado
    var parteresumen = '<tr><td></td><td>Ranurado</td><td>$<?=$aJson['ranurado']['costo_por_ranura']?><input type="hidden" class="pricesresumenfcajon" value="<?=$aJson['ranurado']['costo_por_ranura']?>"></td><td></td></tr>';
    $('#resumenFcajon').append(parteresumen);

    // pendiente
    //var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_por_ranura2.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_ranurado_costo_por_ranura2.toFixed(2) + '"></td><td></td></tr>';
    //$('#resumenFcartera').append(parteresumen);

    //resumen - encuadernacion
    $('#resumenFcajon').append("<tr><td></td><td>Encuadernación</td><td>$<?=$aJson['encuadernacion_Fcaj']['costo_tot_proceso']?> <input type='hidden' class='pricesresumenfcajon' value=<?=$aJson['encuadernacion_Fcaj']['costo_tot_proceso']?>></td><td></td></tr>");
    $('#resumenEmpalme').append("<tr><td></td><td>Encuadernación</td><td>$<?=$aJson['encuadernacion']['costo_tot_proceso']?> <input type='hidden' class='pricesresumenempalme' value=<?=$aJson['encuadernacion']['costo_tot_proceso']?></td><td></td></tr>");

    //resumen - ultima tabla
    parteresumen = '<tr><td></td><td></td><td><b>Subtotal:</b></td><td class="grand-total"><b>$<?=$aJson['costo_subtotal']?></b></td></tr><tr><td></td><td></td><td>Utilidad: </td><td id="UtilidadResumen">$<?=$aJson['Utilidad']?></td></tr><tr><td></td><td></td><td>IVA:</td><td id="IVAResumen">$<?=$aJson['iva']?></td></tr><tr><td></td><td></td><td>ISR: </td><td id="ISResumen">$<?=$aJson['ISR']?></td></tr><tr><td></td><td></td><td>Comisiones: </td><td id="ComisionesResumen">$ <?=$aJson['comisiones']?></td></tr><tr><td></td><td></td><td>% Indirecto: </td><td id="IndirectoResumen">$<?=$aJson['indirecto']?></td></tr><tr><td></td><td></td><td>Ventas: </td><td id="ventaResumen">$<?=$aJson['ventas']?></td></tr><tr><td></td><td></td><td>Descuento: </td><td id="descuentoResumen">$<?=$aJson['descuento']?></td></tr><tr><tr><td></td><td></td><td><b>Total: </b></td><td id="TotalResumen"><b>$<?=$aJson['costo_odt']?></b></td></tr>';
    $('#resumenOtros').append(parteresumen);

    var parteresumen = '<tr><td></td><td></td><td></td><td>$<?=$aJson['encuadernacion']['costo_tot_encuadernacion']?></td></tr>';

    $('#resumenEncuadernacion').append(parteresumen);

</script>


<!-- para generar los procesos y acabados-->
<script type="text/javascript">

    // matriz de Impresiones
    var aImp     = [];
    var aImpFCaj = [];
    var aImpFCar = [];
    var aImpG    = [];
    // matriz de acabados
    var aAcb     = [];
    var aAcbFCaj = [];
    var aAcbFCar = [];
    var aAcbG    = [];

    // matriz de cierres y accesorios
    var aCierres    = [];
    var aAccesorios = [];


    // matriz de bancos
    var aBancos = [];

    var impOff     = <?php echo json_encode($aJson['OffEmp']) ?>;
    var impOffFCaj = <?php echo json_encode($aJson['OffFCaj']) ?>;
    var impOffFCar = <?php echo json_encode($aJson['OffFCar']) ?>;
    var impOffG    = <?php echo json_encode($aJson['OffG']) ?>;
    
    var impDig     = <?php echo json_encode($aJson['DigEmp']) ?>;
    var impDigFCaj = <?php echo json_encode($aJson['DigFCaj']) ?>;
    var impDigFCar = <?php echo json_encode($aJson['DigFCar']) ?>;
    var impDigG    = <?php echo json_encode($aJson['DigG']) ?>;
    
    var impSer     = <?php echo json_encode($aJson['SerEmp']) ?>;
    var impSerFCaj = <?php echo json_encode($aJson['SerFCaj']) ?>;
    var impSerFCar = <?php echo json_encode($aJson['SerFCar']) ?>;
    var impSerG    = <?php echo json_encode($aJson['SerG']) ?>;


    //llama a funcion para apendizar las impresiones
    appndImp("Offset", impOff,aImp,"listimpresiones","Impresiones","resumenEmpalme", "Empalme del Cajón");
    appndImp("Offset", impOffFCaj,aImpFCaj,"listimpresionesfcajon","Impresionesfcajon","resumenFcajon", "Forro del Cajón");
    appndImp("Offset", impOffFCar,aImpFCar,"listimpresionesfcartera","Impresionesfcartera","resumenFcartera", "Forro de la Cartera");
    appndImp("Offset", impOffG,aImpG,"listimpresionesguarda","listimpresionesguarda","resumenGuarda", "Guarda");

    appndImp("Digital", impDig, aImp, "listimpresiones", "Impresiones","resumenEmpalme", "Empalme del Cajón");
    appndImp("Digital", impDigFCaj, aImpFCaj, "listimpresionesfcajon","Impresionesfcajon","resumenFcajon", "Forro del Cajón");
    appndImp("Digital", impDigFCar, aImpFCar, "listimpresionesfcartera","Impresionesfcartera","resumenFcartera", "Forro de la Cartera");
    appndImp("Digital", impDigG, aImpG, "listimpresionesguarda","listimpresionesguarda","resumenGuarda", "Guarda");

    appndImp("Serigrafia", impSer, aImp, "listimpresiones", "Impresiones","resumenEmpalme", "Empalme del Cajón");
    appndImp("Serigrafia", impSerFCaj, aImpFCaj, "listimpresionesfcajon","Impresionesfcajon","resumenFcajon", "Forro del Cajón");
    appndImp("Serigrafia", impSerFCar, aImpFCar, "listimpresionesfcartera","Impresionesfcartera","resumenFcartera", "Forro de la Cartera");
    appndImp("Serigrafia", impSerG, aImpG, "listimpresionesguarda","listimpresionesguarda","resumenGuarda", "Guarda");

    //matriz de acabados

    var acbBarnizUV   = <?php echo json_encode($aJson['Barniz_UV']) ?>;
    var acbCorteLaser = <?php echo json_encode($aJson['Laser']) ?>;
    var acbGrabado    = <?php echo json_encode($aJson['Grabado']) ?>;
    var acbHS         = <?php echo json_encode($aJson['HotStamping']) ?>;
    var acbLaminado   = <?php echo json_encode($aJson['Laminado']) ?>;
    var acbSuaje      = <?php echo json_encode($aJson['Suaje']) ?>;

    var acbBarnizUVFCaj   = <?php echo json_encode($aJson['BarnizFcaj']) ?>;
    var acbCorteLaserFCaj = <?php echo json_encode($aJson['LaserFcaj']) ?>;
    var acbGrabadoFCaj    = <?php echo json_encode($aJson['GrabadoFcaj']) ?>;
    var acbHSFCaj         = <?php echo json_encode($aJson['HotStampingFcaj']) ?>;
    var acbLaminadoFCaj   = <?php echo json_encode($aJson['LaminadoFcaj']) ?>;
    var acbSuajeFCaj      = <?php echo json_encode($aJson['SuajeFcaj']) ?>;

    var acbBarnizUVFCar   = <?php echo json_encode($aJson['BarnizFcar']) ?>;
    var acbCorteLaserFCar = <?php echo json_encode($aJson['LaserFcar']) ?>;
    var acbGrabadoFCar    = <?php echo json_encode($aJson['GrabadoFcar']) ?>;
    var acbHSFCar         = <?php echo json_encode($aJson['HotStampingFcar']) ?>;
    var acbLaminadoFCar   = <?php echo json_encode($aJson['LaminadoFcar']) ?>;
    var acbSuajeFCar      = <?php echo json_encode($aJson['SuajeFcar']) ?>;

    var acbBarnizUVG   = <?php echo json_encode($aJson['BarnizG']) ?>;
    var acbCorteLaserG = <?php echo json_encode($aJson['LaserG']) ?>;
    var acbGrabadoG    = <?php echo json_encode($aJson['GrabadoG']) ?>;
    var acbHSG         = <?php echo json_encode($aJson['HotStampingG']) ?>;
    var acbLaminadoG   = <?php echo json_encode($aJson['LaminadoG']) ?>;
    var acbSuajeG      = <?php echo json_encode($aJson['SuajeG']) ?>;

    //llama a funcion para apendizar las impresiones

    appndAcb("Barniz UV", acbBarnizUV, aAcb, "listacabadosemp","acabados","resumenEmpalme", "Empalme del Cajón");
    appndAcb("Corte Laser", acbCorteLaser, aAcb, "listacabadosemp","acabados","resumenEmpalme", "Empalme del Cajón");
    appndAcb("Grabado", acbGrabado, aAcb, "listacabadosemp","acabados","resumenEmpalme", "Empalme del Cajón");
    appndAcb("HotStamping", acbHS, aAcb, "listacabadosemp","acabados","resumenEmpalme", "Empalme del Cajón");
    appndAcb("Laminado", acbLaminado, aAcb, "listacabadosemp","acabados","resumenEmpalme", "Empalme del Cajón");
    appndAcb("Suaje", acbSuaje, aAcb, "listacabadosemp","acabados","resumenEmpalme", "Empalme del Cajón");
    
    appndAcb("Barniz UV", acbBarnizUVFCaj, aAcbFCaj, "listacabadosfcajon","acabados_fcajon","resumenFcajon", "Forro del Cajón");
    appndAcb("Corte Laser", acbCorteLaserFCaj, aAcbFCaj, "listacabadosfcajon","acabados_fcajon","resumenFcajon", "Forro del Cajón");
    appndAcb("Grabado", acbGrabadoFCaj, aAcbFCaj, "listacabadosfcajon","acabados_fcajon","resumenFcajon", "Forro del Cajón");
    appndAcb("HotStamping", acbHSFCaj, aAcbFCaj, "listacabadosfcajon","acabados_fcajon","resumenFcajon", "Forro del Cajón");
    appndAcb("Laminado", acbLaminadoFCaj, aAcbFCaj, "listacabadosfcajon","acabados_fcajon","resumenFcajon", "Forro del Cajón");
    appndAcb("Suaje", acbSuajeFCaj, aAcbFCaj, "listacabadosfcajon","acabados_fcajon","resumenFcajon", "Forro del Cajón");


    appndAcb("Barniz UV", acbBarnizUVFCar, aAcbFCar, "listacabadosfcartera","acabados_fcartera","resumenFcartera", "Forro de la Cartera");
    appndAcb("Corte Laser", acbCorteLaserFCar, aAcbFCar, "listacabadosfcartera","acabados_fcartera","resumenFcartera", "Forro de la Cartera");
    appndAcb("Grabado", acbGrabadoFCar, aAcbFCar, "listacabadosfcartera","acabados_fcartera","resumenFcartera", "Forro de la Cartera");
    appndAcb("HotStamping", acbHSFCar, aAcbFCar, "listacabadosfcartera","acabados_fcartera","resumenFcartera", "Forro de la Cartera");
    appndAcb("Laminado", acbLaminadoFCar, aAcbFCar, "listacabadosfcartera","acabados_fcartera","resumenFcartera", "Forro de la Cartera");
    appndAcb("Suaje", acbSuajeFCar, aAcbFCar, "listacabadosfcartera","acabados_fcartera","resumenFcartera", "Forro de la Cartera");


    appndAcb("Barniz UV", acbBarnizUVG, aAcbG, "listacabadosguarda","acabados_guarda","resumenGuarda", "Guarda");
    appndAcb("Corte Laser", acbCorteLaserG, aAcbG, "listacabadosguarda","acabados_guarda","resumenGuarda", "Guarda");
    appndAcb("Grabado", acbGrabadoG, aAcbG, "listacabadosguarda","acabados_guarda","resumenGuarda", "Guarda");
    appndAcb("HotStamping", acbHSG, aAcbG, "listacabadosguarda","acabados_guarda","resumenGuarda", "Guarda");
    appndAcb("Laminado", acbLaminadoG, aAcbG, "listacabadosguarda","acabados_guarda","resumenGuarda", "Guarda");
    appndAcb("Suaje", acbSuajeG, aAcbG, "listacabadosguarda","acabados_guarda","resumenGuarda", "Guarda");


    function appndImp( opImp, arrImp, arrImpO, tabla, tablaO, tablaR, seccion ) {

        if(arrImp !== null) {

            var cantidad = parseInt(<?= $aJson['tiraje'] ?>);
            switch(opImp){

                case "Offset":

                    for( var i=0; i<arrImp.length; i++ ) {

                        if( arrImp[i]['Tipo'] ) {

                            var tipoOffset = arrImp[i]['Tipo'];    
                        } else {

                            var tipoOffset = arrImp[i]['tipo'];
                        }
                        
                        var tintassel = arrImp[i]['num_tintas'];
                        var costo = parseFloat(arrImp[i]['costo_tot_proceso']).toFixed(2);
                        var IDopImp = 1;
                        var idtipoOff = 1;
                        var cTLaminas = parseFloat(arrImp[i]['costo_tot_laminas']);
                        var cTArreglo = parseFloat(arrImp[i]['costo_tot_arreglo']);
                        var cTTiro    = parseFloat(arrImp[i]['costo_tot_tiro']);
                        var cULaminas = parseFloat(arrImp[i]['costo_unitario_laminas']);
                        var cUArreglo = parseFloat(arrImp[i]['costo_unitario_arreglo']);
                        var cUTiro    = parseFloat(arrImp[i]['costo_unitario_tiro']);
                        var cTotal    = cTLaminas + cTArreglo + cTTiro; 

                        var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none">'+ IDopImp +'<input type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel +'<input type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset +'<input type="hidden" value="'+ idtipoOff +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                        arrImpO.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(imp);

                        var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';

                        $('#'+ tablaR).append(parteresumen);

                        var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">' + seccion + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipoOffset +'</td><td>Tintas: '+ tintassel +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ cULaminas +'</td><td>'+ cTLaminas +'</td></tr><tr><td>Arreglo</td><td>'+ cUArreglo +'</td><td>'+ cTArreglo +'</td></tr><tr><td>Tiro</td><td>'+ cUTiro +'</td><td>'+ cTTiro +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ cTotal +'<input type="hidden" class="prices" value="'+ cTotal +'"></td></tr><tr><td colspan="3"></td></tr>';

                        $('#table_proc_offset').append(processoffset);
                    }
                    $('#proceso_offset_M1').show();
                    
                    break;

                case "Digital":

                    for( var i=0; i<arrImp.length; i++ ) {

                        var tipoDig = arrImp[i]['impresion'];    
                        var tintassel = arrImp[i]['num_tintas'];
                        var cosUnitario = parseFloat(arrImp[i]['costo_unitario']).toFixed(2);
                        var costo = parseFloat(arrImp[i]['costo_tot_proceso']).toFixed(2);
                        var IDopImp = 1;
                        var idtipoDig = 1;
                        var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none"><input  type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipoDig + '</span></td><td class="tipoDig" style="display: none;">'+ tipoDig +'<input type="hidden" value="'+ idtipoDig +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                        arrImpO.push({"Tipo_impresion": opImp, "tipo_digital": tipoDig, "idtipoDig": idtipoDig});

                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(imp);

                        var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';

                        $('#'+ tablaR).append(parteresumen);

                        var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">' + seccion + '</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Costo Total</td></tr><tr><td>'+ cantidad +'</td><td>'+ cosUnitario +'</td><td>$'+ costo +'<input type="hidden" class="prices" value=" '+ costo +'"></td></tr><tr><td colspan="4"></td></tr>';

                        $('#table_proc_digital').append(processdigital);
                    }
                    $('#proceso_digital_M1').show();
                
                    break;

                case "Serigrafia":

                    for( var i=0; i<arrImp.length; i++ ) {

                        if( arrImp[i]['Tipo'] ) {

                            var tipoSeri = arrImp[i]['Tipo'];    
                        } else {

                            var tipoSeri = arrImp[i]['tipo'];
                        }
                        
                        var tintassel2 = arrImp[i]['num_tintas'];
                        var costo      = parseFloat(arrImp[i]['costo_tot_proceso']).toFixed(2);
                        var IDopImp    = 1;
                        var idtipoSeri = 1;
                        var cUArreglo  = parseFloat(arrImp[i]['costo_unit_arreglo']);
                        var cTArreglo  = parseFloat(arrImp[i]['costo_arreglo']);
                        var cUTiro     = parseFloat(arrImp[i]['costo_unit_tiro']);
                        var cTTiro     = parseFloat(arrImp[i]['costo_tiro']);
                        
                        var cTotal     = cTArreglo + cTTiro; 

                        var imp  = '<tr id="ImpSerEmp"><td class="textImp">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input style="display:none" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel2 +'<input type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeri" style="display: none;">'+ tipoSeri +'<input type="hidden" value="'+ idtipoSeri +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                        arrImpO.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(imp);

                        var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';

                        $('#'+ tablaR).append(parteresumen);

                        var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">' + seccion + ' </td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipoSeri +'</td><td>Tintas: '+ tintassel2 +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ cUArreglo +'</td><td>'+ cTArreglo +'</td></tr><tr><td>Tiro</td><td>'+ cUTiro +'</td><td>'+ cTTiro +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ costo +'<input type="hidden" class="prices" value="'+ costo +'"></td></tr><tr><td colspan="3"></td></tr>';

                            $('#table_proc_serigrafia').append(processserigrafia);
                    }
                    $('#proceso_serigrafia_M1').show();
                
                    break;
            } 
        }
    }


    function appndAcb( opAcb, arrAcb, arrAcbO, tabla, tablaO, tablaR, seccion ) {

        if( arrAcb !== null ){

            switch(opAcb){

                case "Barniz UV":
                    
                    for( var i = 0; i < arrAcb.length; i++ ) {

                        var tipoBarnizUV   = arrAcb[i]['tipoGrabado'];
                        var idtipoBarnizUV = 1;
                        var LargoBarnizUV  = arrAcb[i]['Largo'];
                        var AnchoBarnizUV  = arrAcb[i]['Ancho'];
                        var costo          = parseFloat(arrAcb[i]['costo_unitario']).toFixed(2);
                        var costoT          = parseFloat(arrAcb[i]['costo_tot_proceso']).toFixed(2);

                        if(tipoBarnizUV == "Registro Mate" || tipoBarnizUV == "Registro Brillante") {

                            var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'<input type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + ', Medidas: ' + LargoBarnizUV + 'x' + AnchoBarnizUV +'</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input type="hidden" value="' + idtipoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + LargoBarnizUV + '<input  type="hidden" value="' + LargoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + AnchoBarnizUV + '<input type="hidden" value="' + AnchoBarnizUV + '"></td><td class="' + tabla + ' img_delete"></td></tr>';

                            arrAcbO.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": LargoBarnizUV, "Ancho": AnchoBarnizUV});

                            var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipoBarnizUV +'</td><td>Tamaño: '+ LargoBarnizUV +'x'+ AnchoBarnizUV +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ costoT +'<input type="hidden" class="prices" value="'+ costoT +'"></td></tr><tr><td colspan="2"></td></tr>';

                            $('#table_proc_BarnizUV').append(acabadoTr);

                            $('#proceso_barnizuv_M1').show();
                        } else {

                            var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'<input type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input type="hidden" value="' + idtipoBarnizUV + '"></td><td class="' + tabla + ' img_delete"></td></tr>';

                            arrAcbO.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": null, "Ancho": null});

                            var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipoBarnizUV +'</td><td>Tamaño: N/A </td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ costoT +'<input type="hidden" class="prices" value="'+ costoT +'"></td></tr><tr><td colspan="2"></td></tr>';

                            $('#table_proc_BarnizUV').append(acabadoTr);

                            $('#proceso_barnizuv_M1').show();
                        }                    
                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(acb);
                        parteresumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';
                        $('#' + tablaR).append(parteresumen);
                    }
                
                    break;

                case "Corte Laser":

                    for( var i = 0; i < arrAcb.length; i++ ) {

                        var LargoLaser_s = arrAcb[i]['Largo'];
                        var AnchoLaser_s = arrAcb[i]['Ancho'];
                        var tipoLaser    = arrAcb[i]['tipo_grabado'];
                        var LargoLaser   = parseInt(LargoLaser_s, 10);
                        var AnchoLaser   = parseInt(AnchoLaser_s, 10);
                        var idtipoLaser  = 1;
                        var costo        = parseFloat(arrAcb[i]['costo_unitario']).toFixed(2);
                        var costoT       = parseFloat(arrAcb[i]['costo_tot_proceso']).toFixed(2);
                        var acb = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'<input type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipoLaser + ', Medidas: ' + LargoLaser + 'x' +  AnchoLaser + '</span></td><td class="tipoLaser" style="display: none;">' + tipoLaser + '<input type="hidden" value="' + idtipoLaser + '"></td><td class="LargoLaser" style="display: none;">' + LargoLaser + '<input type="hidden" value="' + LargoLaser + '"></td><td class="AnchoLaser" style="display: none;">' + AnchoLaser + '<input type="hidden" value="' + AnchoLaser + '"></td><td class="' + tabla + ' img_delete"></td></tr>';

                        arrAcbO.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaser, "LargoLaser": LargoLaser, "AnchoLaser": AnchoLaser});
                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(acb);
                        parteresumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';
                        $('#' + tablaR).append(parteresumen);

                        var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipoLaser +'</td><td>Tamaño: '+ LargoLaser + 'x' + AnchoLaser +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ costoT +'<input type="hidden" class="prices" value="'+ costo +'"></td></tr><tr><td colspan="2"></td></tr>';

                            $('#table_proc_Laser').append(acabadoTr);

                            $('#proceso_laser_M1').show();
                    }
                    
                    break;

                case "Grabado":

                    for( var i = 0; i < arrAcb.length; i++ ) {

                        var tipoGrabadoG  = arrAcb[i]['tipoGrabado'];
                        var LargoGrab     = arrAcb[i]['Largo'];
                        var AnchoGrab     = arrAcb[i]['Ancho'];
                        var ubicacionGrab = arrAcb[i]['ubicacion'];
                        var idtipoGrabado = 1;
                        var costo         = parseFloat(arrAcb[i]['costo_unitario']).toFixed(2);
                        
                        var cUPlaca       = arrAcb[i]['placa_costo_unitario'];
                        var cTPlaca       = arrAcb[i]['placa_costo'];
                        var cUArreglo     = arrAcb[i]['arreglo_costo_unitario'];
                        var cTArreglo     = arrAcb[i]['arreglo_costo'];
                        var cTTiro        = arrAcb[i]['costo_tiro'];
                        var costoT        = arrAcb[i]['costo_tot_proceso'];

                        var acb  = '<tr id="AcGrabEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td class="tipoGrabadoG" style="display: none;">'+ tipoGrabadoG +'<input type="hidden" value="'+ idtipoGrabado +'"></td><td class="LargoGrab" style="display: none;">'+ LargoGrab +'</td><td class="AnchoGrab" style="display: none;">'+ AnchoGrab +'</td><td class="ubicacionGrab" style="display: none;">'+ ubicacionGrab +'<input type="hidden" value="'+ ubicacionGrab +'"></td><td class="' + tabla + ' img_delete"></td></tr>';


                        arrAcbO.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});
                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(acb);
                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';
                        $('#' + tablaR).append(parteresumen);

                        var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipoGrabadoG +'</td><td>Tamaño: '+ LargoGrab +'x'+ AnchoGrab +'</td><td>Ubicacion: '+ ubicacionGrab +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ cUPlaca +'</td><td>'+ cTPlaca +'</td></tr><tr><td>Arreglo</td><td>'+ cUArreglo +'</td><td>'+ cTArreglo +'</td></tr><tr><td>Tiro</td><td>'+ costo +'</td><td>'+ cTTiro +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ costoT +'<input type="hidden" class="prices" value="'+ costoT +'"></td></tr><tr><td colspan="3"></td></tr>';

                        $('#table_proc_Grab').append(acabadoTr);

                        $('#proceso_grab_M1').show();
                    }
                
                    break;

                case "HotStamping":

                    for( var i = 0; i < arrAcb.length; i++ ) {

                        var tipoGrabadoHS = arrAcb[i]['tipoGrabado'];
                        var ColorHS       = arrAcb[i]['Color'];
                        var LargoHS_ver   = arrAcb[i]['Largo'];
                        var AnchoHS_ver   = arrAcb[i]['Ancho'];
                        var idtipoHS      = 1;
                        var idcolorHS     = 1;
                        var costo         = parseFloat(arrAcb[i]['costo_unitario']).toFixed(2);
                        var cUPlaca       = arrAcb[i]['placa_costo_unitario'];
                        var cTPlaca       = arrAcb[i]['placa_costo'];
                        var cUPelicula    = arrAcb[i]['pelicula_costo_unitario'];
                        var cTPelicula    = arrAcb[i]['pelicula_costo'];
                        var cUArreglo     = arrAcb[i]['arreglo_costo_unitario'];
                        var cTArreglo     = arrAcb[i]['arreglo_costo'];
                        var cTTiro        = arrAcb[i]['costo_tiro'];
                        var costoT        = arrAcb[i]['costo_tot_proceso'];

                        var acb  = '<tr id="AcHSEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input  type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td class="tipoAcabadoHS" style="display: none;" >'+ tipoGrabadoHS +'<input type="hidden" value="'+ idtipoHS +'"></td><td class="idcolorHS" style="display: none;" >' + idcolorHS + '<input type="hidden" value="'+ idcolorHS +'"></td><td class="ColorHS" style="display: none;" >' + ColorHS + '<input type="hidden" value="'+ ColorHS +'"></td><td class="LargoHS" style="display: none;">'+ LargoHS_ver +'<input type="hidden" value="'+ LargoHS_ver +'"></td><td class="AnchoHS" style="display: none;">'+ AnchoHS_ver +'<input type="hidden" value="'+ AnchoHS_ver +'"></td><td class="' + tabla + ' img_delete"></td></tr>';

                        LargoHS = parseInt(LargoHS_ver, 10);
                        AnchoHS = parseInt(AnchoHS_ver, 10);

                        arrAcbO.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(acb);

                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ costo +'<input type="hidden" class="pricesresumenfcajon" value="'+ costo +'"></td><td></td></tr>';
                        $('#' + tablaR).append(parteresumen);

                        var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipoGrabadoHS +'</td><td>Color: '+ ColorHS +'</td><td>Tamaño: '+ LargoHS +'x'+ AnchoHS +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ cUPlaca +'</td><td>'+ cTPlaca +'</td></tr><tr><td>Pelicula</td><td>'+ cUPelicula +'</td><td>'+ cTPelicula +'</td></tr><tr><td>Arrego</td><td>'+ cUArreglo +'</td><td>'+ cTArreglo +'</td></tr><tr><td>Tiro</td><td>'+ costo +'</td><td>'+ cTTiro +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ costoT +'<input type="hidden" class="prices" value="'+ costoT +'"></td></tr><tr><td colspan="3"></td></tr>';

                       $('#table_proc_HS').append(acabadoTr);

                        $('#proceso_hs_M1').show();
                    }
                    
                    break;

                case "Laminado":

                    for( var i = 0; i < arrAcb.length; i++ ) {

                        var tipoLaminado   = arrAcb[i]['tipoGrabado'];
                        var Largo   = arrAcb[i]['Largo'];
                        var Ancho   = arrAcb[i]['Ancho'];
                        var IDopAcb        = 1;
                        var idtipoLaminado = 1;
                        var costo          = parseFloat(arrAcb[i]['costo_unitario']).toFixed(2);
                        var total   = parseFloat(arrAcb[i]['costo_tot_proceso']);
                        var acb  = '<tr id="AcLamEmp"><td style="text-align: left;" class="textAcbEmp">' + opAcb +'<input type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipoLaminado +'<input type="hidden" value="'+ idtipoLaminado +'"></td><td class="' + tabla + ' img_delete"></td></tr>';


                        arrAcbO.push({"Tipo_acabado": opAcb, "IDopAcb": IDopAcb, "tipoGrabado": tipoLaminado, "idtipoLaminado": idtipoLaminado});
                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(acb);
                        parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';
                        $('#' + tablaR).append(parteresumen);

                        var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipoLaminado +'</td><td>Tamaño: '+ Largo +'x'+ Ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ total +'<input type="hidden" class="prices" value="' + total + '"></td></tr><tr><td colspan="2"></td></tr>';

                            $('#table_proc_Lam').append(acabadoTr);
                            $('#proceso_lam_M1').show();
                    }
                    
                    break;

                case "Suaje":

                    for( var i = 0; i < arrAcb.length; i++ ) {
                        
                        var tipoSuaje  = arrAcb[i]['tipoGrabado'];
                        var LargoSuaje = arrAcb[i]['Largo'];
                        var AnchoSuaje = arrAcb[i]['Ancho'];
                        var costo      = parseFloat(arrAcb[i]['costo_tiro']).toFixed(2);
                        var cTArreglo  = arrAcb[i]['arreglo_costo_unitario'];
                        if( !cTArreglo ){

                            cTArreglo  = arrAcb[i]['arreglo'];
                        }
                        
                        var cTTiro     = arrAcb[i]['costo_tiro'];
                        var costoT     = arrAcb[i]['costo_tot_proceso'];
                        var acb  = '<tr id="AcSuajeEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="' + tabla + ' img_delete"></td></tr>';


                        arrAcbO.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});
                        $('#' + tablaO).modal('hide');
                        $('#' + tabla).append(acb);

                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ costo +'<input type="hidden" class="pricesresumenempalme" value="'+ costo +'"></td><td></td></tr>';
                        $('#' + tablaR).append(parteresumen);

                        var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ seccion +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ tipoSuaje +'</td><td>Tamaño: '+ LargoSuaje +'x'+ AnchoSuaje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ cTArreglo +'</td><td>'+ cTArreglo +'</td></tr><tr><td>Tiro</td><td>'+ costo +'</td><td>'+ cTTiro +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ costoT +'<input type="hidden" class="prices" value="'+ costoT +'"></td></tr><tr><td colspan="3"></td></tr>';

                            $('#table_proc_Suaje').append(acabadoTr);

                            $('#proceso_suaje_M1').show();
                    }
                
                    break;
            }
        }
    }
</script>


<!-- bancos, accesorios y cierres -->
<script type="text/javascript">
    
    var bancos     = <?php echo json_encode($aJson['Bancos']) ?>;
    var cierres    = <?php echo json_encode($aJson['Cierres']) ?>;
    var accesorios = <?php echo json_encode($aJson['Accesorios']) ?>;

    if( bancos !== null ) {

        for (var i = 0; i < bancos.length ; i++) {

            var tipoBanco   = bancos[i]['Tipo_banco'];
            var costo       = bancos[i]['costo_unit_banco'];
            var costoT      = bancos[i]['costo_bancos'];
            var suaje       = bancos[i]['Suaje'];
            var ancho       = bancos[i]['ancho'];
            var largo       = bancos[i]['largo'];
            var profundidad = bancos[i]['profundidad'];

            var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoBanco +', Largo: '+ largo +', Ancho: '+ ancho +', Profundidad: '+ profundidad +', Suaje: '+ suaje +'</span></td><td style="display: none">'+ tipoBanco +'</td><td style="display: none">'+ largo +'</td><td style="display: none">'+ ancho +'</td><td style="display: none">'+ profundidad +'</td><td style="display: none">'+ suaje +'</td><td class="listbancoemp img_delete"></td></tr>';

            aBancos.push({"Tipo_banco": tipoBanco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});

            jQuery214('#listbancoemp').append(ban);
        }
    }


    if( cierres !== null ) {

        for (var i = 0; i < cierres.length ; i++) {
            
            var tipoCierre = cierres[i]['Tipo_cierre'];
            var cie        = "";

            switch(tipoCierre) {

                case "Iman":

                    var numpares = cierres[i]['numpares'];
                    cie = '<tr><td style="text-align: left;">' + tipoCierre +'</td><td class="CellWithComment">...<span class="CellComment">Numero de Pares: '+ numpares +'</span></td><td style="display: none">'+ numpares +'</td><td class="listcierres img_delete"></td></tr>';


                    aCierres.push({"Tipo_cierre": tipoCierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
                    
                    break;

                case "Marialuisa":
                    
                    cie = '<tr><td style="text-align: left;">' + tipoCierre +'</td><td class="CellWithComment">...<span class="CellComment">Se agrego un cierre Marialuisa</span></td><td class="listcierres img_delete"></td></tr>';

                    aCierres.push({"Tipo_cierre": tipoCierre, "numpares": 1, "largo": null, "ancho": null, "tipo": null, "color": null});
                
                    break;

                case "Liston":
                    
                    var largo = cierres[i]['largo'];
                    var ancho = cierres[i]['ancho'];
                    var liston = cierres[i]['tipo'];
                    var color = cierres[i]['color'];

                    cie = '<tr><td style="text-align: left;">' + tipoCierre +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ largo +', Ancho: '+ ancho +', Tipo: '+ liston +', Color: '+ color +' </span></td><td style="display: none">'+ largo +'</td><td style="display: none">'+ ancho +'</td><td style="display: none">'+ liston +'</td><td style="display: none">'+ color +'</td><td class="listcierres img_delete"></td></tr>';


                    aCierres.push({"Tipo_cierre": tipoCierre, "numpares": 1, "largo": largo, "ancho": ancho, "tipo": liston, "color": color});
                    
                    break;

                case "Suaje calado":
                    
                    var largo = cierres[i]['largo'];
                    var ancho = cierres[i]['ancho'];
                    var suaje = cierres[i]['tipo'];

                    cie = '<tr><td style="text-align: left;">' + tipoCierre +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ largo +', Ancho: '+ ancho +', Tipo: '+ suaje +'</span></td><td style="display: none">'+ largo +'</td><td style="display: none">'+ ancho +'</td><td style="display: none">'+ suaje +'</td><td class="listcierres img_delete"></td></tr>';


                    aCierres.push({"Tipo_cierre": tipoCierre, "numpares": 1, "largo": largo, "ancho": ancho, "tipo": suaje, "color": null});
                    
                    break;

                case "Velcro":

                    var numpares = cierres[i]['numpares'];
                    cie = '<tr><td style="text-align: left;">' + tipoCierre +'</td><td class="CellWithComment">...<span class="CellComment">Numero de Pares: '+ numpares +'</span></td><td style="display: none">'+ numpares +'</td><td class="listcierres img_delete"></td></tr>';


                    aCierres.push({"Tipo_cierre": tipoCierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
                    
                    break;
            }

            $('#listcierres').append(cie);
        }
    }

    if( accesorios !== null ) {

        for (var i = 0; i < accesorios.length ; i++) {
            
            var tipoAccesorio = accesorios[i]['Tipo_accesorio'];
            var accesorio = "";

            switch(tipoAccesorio) {

                case "Herraje":

                    var tipo = accesorios[i]['Tipo'];

                    var precio = accesorios[i]['costo_unit_accesorio'];

                    accesorio = '<tr><td style="text-align: left;">' + tipoAccesorio + '</td><td class="CellWithComment">...<span class="CellComment">Herraje: ' + tipo + '</span></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+tipo+'</td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": tipoAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": tipo, "Precio": precio});
                    
                    break;

                case "Ojillos":

                    var precio = accesorios[i]['costo_unit_accesorio'];

                    accesorio = '<tr><td style="text-align: left;">' + tipoAccesorio + '</td><td style=""></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": tipoAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": null, "Precio": precio});
                
                    break;

                case "Resorte":

                    var largo = accesorios[i]['Largo'];
                    var ancho = accesorios[i]['Ancho'];
                    var color = accesorios[i]['Color'];
                    var precio = accesorios[i]['costo_unit_accesorio'];

                    accesorio = '<tr><td style="text-align: left;">' + tipoAccesorio +'</td><td class="CellWithComment">...<span class="CellComment">Largo: ' + largo + ' Ancho: ' + ancho + ' Color: ' + color + '</span></td><td style="display:none">'+ largo +'</td><td style="display:none">'+ancho+'</td><td style="display:none">'+ color +'</td><td style="display:none"></td><td style="display:none"></td><td style="display:none">' + precio + '</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": tipoAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});
                
                    break;

                case "Lengueta de Liston":

                    var largo = accesorios[i]['Largo'];
                    var ancho = accesorios[i]['Ancho'];
                    var color = accesorios[i]['Color'];
                    var precio = accesorios[i]['costo_unit_accesorio'];

                    accesorio = '<tr><td style="text-align: left;">' + tipoAccesorio +'</td><td class="CellWithComment">...<span class="CellComment">Largo: ' + largo + ' Ancho: ' + ancho + ' Color: ' + color + '</span></td><td style="display:none">'+ largo +'</td><td style="display:none">'+ancho+'</td><td style="display:none">'+ color +'</td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": tipoAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});
                
                    break;
            }

            $('#listaccesorios').append(accesorio);
        }
    }
</script>


<script>

    /* variables globales */
    /*var descuento = 0;
    var model;
    var costo_papel;
    var costo_carton;
    var costo_final;
    var ancho_almeja;
    var alto_almeja;
    var grosor_cajon_almeja;
    var grosor_cartera_almeja;
    var t_cortes;


    var ancho_cartera;
    var largo_cartera;
    var a_forro_ext_cartera;
    var l_forro_ext_cartera;
    var a_forro_int_cartera;
    var l_forro_int_cartera;
    var l_forro_ext_cajon;
    var a_forro_ext_cajon;


    var largo_cajon;
    var ancho_cajon;
    var precio_forros;
    

    var costos_papeles = {guarda_cajon:0, forro_cajon:0, forro_cartera:0, guarda:0, cajon:0, cartera:0}

    var ancho_lados;
    var largo_lados;
    var ancho_frentes;
    var largo_frentes;
    var ancho_tapas;
    var largo_tapas;
    var d1;
    var d2;
    var d_inicial                    = '';
    var valida_impresiones           = 0;


    var forro_cajon_offset           = true;
    var forro_cajon_digital          = true;
    var forro_guarda_cajon_offset    = true;
    var forro_guarda_cajon_digital   = true;
    var forro_cartera_offset         = true;
    var forro_cartera_digital        = true;
    var forro_guarda_cartera_offset  = true;
    var forro_guarda_cartera_digital = true;

    var cantidad_minima_offset      = 0;
    var cantidad_minima_digital     = 0;
    var cantidad_minima_serigrafia  = 0;
    var cantidad_minima_hotstamping = 0;
    var cantidad_minima_laminado    = 0;
    var cantidad_minima_barniz      = 0;
    var cantidad_minima_suaje       = 0;
    var cantidad_minima_forrado     = 0;
    var cantidad_minima_grabado     = 0;

    var parte_texto         = "";
    var cantidad_print      = 0;
    var papel               = "";
    var costo_final_print   = 0;
    var p_largo             = 0;
    var p_ancho             = 0;
    var corte_largo         = 0;
    var corte_ancho         = 0;
    var cortes_final        = 0;
    var total_Pliegos_print = 0;
    var total_costo_print   = 0;*/


    // variable del boton de impresiones (modal)
    var ImpOffset = "";

    /*var aCalculos = {};
    var aCortes   = {};
    var aTr3      = [];

    var j = 0;
    var data_offset;
    var data_digital;
    var data_laminado;
    var row_listimpresiones;
    var row_listimpresionesfcajon;
    var row_listimpresionesfcartera;
    var row_listimpresionesguarda;*/


    /*
     * variables globales de merma
    */
    /*var cantidad_minima;
    var c_4colores;
    var por_cada_x;
    var adicional_4colores;
    var qty_adic;
    var adic;
    var merma_exc;

    var cantidad;
    var adicional;

    var merma_offset           = 0;
    var merma_offset_adic      = 0;
    var merma_digital          = 0;
    var merma_digital_adic     = 0;
    var merma_serigrafia       = 0;
    var merma_serigrafia_adic  = 0;
    var merma_HotStamping      = 0;
    var merma_HotStamping_adic = 0;
    var merma_Laminado         = 0;
    var merma_Laminado_adic    = 0;
    var merma_Barniz           = 0;
    var merma_Barniz_adic      = 0;
    var merma_Suaje            = 0;
    var merma_Suaje_adic       = 0;
    var merma_Forrado          = 0;
    var merma_Forrado_adic     = 0;
    var merma_Grabado          = 0;
    var merma_Grabado_adic     = 0;*/

    jQuery214(".chosen").chosen();


    /* Plugin de jQuery */
    jQuery214(document).on("change", ".chosen", function () {

        if ($(this).val()) {

            papel_elegido = true;
            $(this).addClass('paper_selected');
            $('#papers_config_button').hide();
        } else {

            papel_elegido = false;

            $(this).removeClass('paper_selected');
            $('#papers_config_button').show();
        }
    });

    function showModal(modalID, backdrop2 = false) {

        $('#' + modalID).animate({'opacity':'1'}, 300, 'linear');
        $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop, #' + modalID).css('display', 'block');

        if (backdrop2) {

            $('.backdrop2').animate({'opacity':'.50'}, 300, 'linear');
            $('.backdrop2, #' + modalID).css('display', 'block');
        }
    }


    function closeModal(target = false, drop_target = false) {

        if (!target) {

            $('.backdrop, .cotizador_box, .loader,.backdrop2, .cotizador_box2').animate({'opacity':'0'}, 300, 'linear', function() {

                $('.backdrop, .cotizador_box, .loader,.backdrop2, .cotizador_box2').css('display', 'none');
            });

            setTimeout(function() {

                $('.second').hide();
                $('.first').show();
                $('.b-checked').find('input').prop('checked', false);
                $('.b-checked').removeClass('b-checked');
            }, 400);
        } else {

            $('.backdrop2, .cotizador_box2').animate({'opacity':'0'}, 300, 'linear', function() {

                $('.backdrop2, .cotizador_box2').css('display', 'none');
            });
        }
    }

    /* group  */
    jQuery214(document).on("click", ".b-check", function () {

        $('.b-checked').removeClass('b-checked');
        $(this).addClass('b-checked').find('input').prop('checked', true);

        var value = jQuery214(this).data('value');
        var text  = jQuery214(this).data('text');
        var price = jQuery214(this).data('price');
        var group = jQuery214(this).data('group');

        var imp  = '<tr><td><div class="delete"></div></td><input type="hidden" class="" value="' + price + '"><td>$' + price + '</td><td>' + text + '</td></tr>';

        // --------------------Empalme del Cajón---------------------

        //obtiene y envia el valor a divs acabados empalme
        var acabadoemp = jQuery214(this).data('acabadoemp');
        jQuery214('#'+ acabadoemp +'_empalme').html(imp);

        //obtiene y envia el valor a divs cierres empalme
        var cierreemp = jQuery214(this).data('cierreemp');
        jQuery214('#'+ cierreemp +'_empalme').html(imp);

        //obtiene y envia el valor a divs accesorios empalme
        var accesorioemp = jQuery214(this).data('accesorioemp');
        jQuery214('#'+ accesorioemp +'_empalme').html(imp);


        // --------------------Forro del Cajón---------------------

        //obtiene y envia el valor a divs acabados forro del cajon
        var acabadofcajon = jQuery214(this).data('acabadofcajon');
        jQuery214('#'+ acabadofcajon +'_fcajon').html(imp);

        //obtiene y envia el valor a divs cierres forro del cajon
        var cierrefcajon = jQuery214(this).data('cierrefcajon');
        jQuery214('#'+ cierrefcajon +'_fcajon').html(imp);

        //obtiene y envia el valor a divs accesorios forro del cajon
        var accesoriofcajon = jQuery214(this).data('accesoriofcajon');
        jQuery214('#'+ accesoriofcajon +'_fcajon').html(imp);


        // -------------------Forro de la Cartera-----------------

        //obtiene y envia el valor a divs acabados forro de la cartera
        var acabadofcartera = jQuery214(this).data('acabadofcartera');
        jQuery214('#'+ acabadofcartera +'_fcartera').html(imp);

        //obtiene y envia el valor a divs cierres forro de la cartera
        var cierrefcartera = jQuery214(this).data('cierrefcartera');
        jQuery214('#'+ cierrefcartera +'_fcartera').html(imp);

        //obtiene y envia el valor a divs accesorios forro de la cartera
        var accesoriofcartera = jQuery214(this).data('accesoriofcartera');
        jQuery214('#'+ accesoriofcartera +'_fcartera').html(imp);


        // -------------------Guarda------------------------------------

        //obtiene y envia el valor a divs acabados guarda
        var acabadoguarda = jQuery214(this).data('acabadoguarda');
        jQuery214('#'+ acabadoguarda +'_guarda').html(imp);

        //obtiene y envia el valor a divs cierres guarda
        var cierreguarda = jQuery214(this).data('cierreguarda');
        jQuery214('#'+ cierreguarda +'_guarda').html(imp);

        //obtiene y envia el valor a divs accesorios guarda
        var accesorioguarda = jQuery214(this).data('accesorioguarda');
        jQuery214('#'+ accesorioguarda +'_guarda').html(imp);


        // se quitaron los dos input name= + group
        var html  = '<tr><td>' + text + '</td><td>$' + price + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + price + '"></tr>';

        jQuery214('#resume-body').append(html);

        closeModal();

        //collectPrices();
    });


    /* Descuento */
    jQuery214(document).on("click", ".d-check", function () {

        descuento = $(this).val();
        closeModal();
    });



    jQuery214(document).on("click", "#btnSaveDescuento", function () {
        
        $("#descuentoModal").html("Descuento: (" + descuento + "%)");

        $("#descuentos").modal("hide");
    });


    jQuery214(document).on("click", "#btnCancelDescuento", function () {
        
        jQuery214('#DescuentoDrop').html("$0.00");

        $('#descuentos').find("input:checked").prop("checked", false);

        $("#descuentoModal").html("Descuento: (0%)");
        
        descuento = 0;
    });


    jQuery214(document).on("click", "#descuentoModal", function () {

        $('#descuentos').modal('show');
    });


    /* selecciona imagen */
    jQuery214(document).on("click", ".image-option", function () {

        showModal('d_grabado',true);

        d_inicial = '';

        $('#grabado_ancho').val('');
        $('#grabado_alto').val('');

        jQuery214('.option-selected').removeClass('option-selected');
        jQuery214(this).addClass('option-selected');

        var area = $(this).data('area');

        if (area == 'tapas') {

            d1 = ancho_tapas;
            d2 = largo_tapas;
        } else if ( area == 'lados' ) {

            d1 = ancho_lados;
            d2 = largo_lados;
        } else if ( area == 'frentes' ) {

            d1 = ancho_frentes;
            d2 = largo_frentes;
        }
    });

    jQuery214(document).on("click", "#papeles_submit", function () {

        var grabar = "NO";

        var empalme       = $("#interior_cajon").val();           // empalme
        var forro_cajon   = $("#exterior_cajon").val();       // forro cajon
        var forro_cartera = $("#exterior_cartera").val();   // forro cartera
        var guarda        = $("#interior_cartera").val();          // guarda

        if( empalme == null || forro_cajon == null || forro_cartera == null || guarda == null ){
            
            var cadena = "";
            if( empalme == null ) cadena += "empalme <br>";
            if( forro_cajon == null ) cadena += "forro cajon <br>";
            if( forro_cartera == null ) cadena += "forro cartera <br>";
            if( guarda == null ) cadena += "guarda";

            showModError("");

            $("#txtContenido").attr("align", "left");
            $("#txtContenido").html("");
            $("#txtContenido").html("Debe de seleccionar un papel para las siguientes secciones: " + cadena + ".");
        } else {

            if (typeof formData !== 'undefined' && formData.length > 0) {

                formData = [];
            }

            var formData      = $("#caja-form").serializeArray();

            // impresion
            var aImp_tmp     = JSON.stringify(aImp, null, 4);
            var aImpFCaj_tmp = JSON.stringify(aImpFCaj, null, 4);
            var aImpFCar_tmp = JSON.stringify(aImpFCar, null, 4);
            var aImpG_tmp    = JSON.stringify(aImpG, null, 4);

            // acabados
            var aAcb_tmp     = JSON.stringify(aAcb, null, 4);
            var aAcbFCaj_tmp = JSON.stringify(aAcbFCaj, null, 4);
            var aAcbFCar_tmp = JSON.stringify(aAcbFCar, null, 4);
            var aAcbG_tmp    = JSON.stringify(aAcbG, null, 4);

            // cierres
            var aCierres_tmp = JSON.stringify(aCierres, null, 4);


            // bancos
            var aBancos_tmp = JSON.stringify(aBancos, null, 4);


            // accesorios
            var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);

            var cliente        = parseInt(<?= $aJson['id_cliente']?>);
            var id_cliente_tmp = JSON.stringify(cliente, null, 4);

            formData.push({name: 'id_cliente', value: id_cliente_tmp});

            //se ingresa la odt pues si la caja esta deshabilitada no obtiene el valor
            var odt = $("#odt-1").val()

            formData.push({name: 'odt', value: odt});

            var cliente        = parseInt(<?= $aJson['id_cliente']?>);
            var id_cliente_tmp = JSON.stringify(cliente, null, 4);

            formData.push({name: 'id_cliente', value: id_cliente_tmp});          // mermas

            formData.push({name: 'aImp', value: aImp_tmp});
            formData.push({name: 'aImpFCaj', value: aImpFCaj_tmp});
            formData.push({name: 'aImpFCar', value: aImpFCar_tmp});
            formData.push({name: 'aImpG', value: aImpG_tmp});

            formData.push({name: 'aAcb', value: aAcb_tmp});
            formData.push({name: 'aAcbFCaj', value: aAcbFCaj_tmp});
            formData.push({name: 'aAcbFCar', value: aAcbFCar_tmp});
            formData.push({name: 'aAcbG', value: aAcbG_tmp});

            formData.push({name: 'aCierres', value: aCierres_tmp});
            formData.push({name: 'aBancos', value: aBancos_tmp});
            formData.push({name: 'aAccesorios', value: aAccesorios_tmp});

            // descuento
            formData.push({name: 'descuento_pctje', value: descuento});

            var modificar_odt = "NO";

            formData.push({name: 'modificar', value: modificar_odt});
            formData.push({name: 'grabar', value: grabar});

            $.ajax({
                type:"POST",
                //dataType: "json",
                url: $('#caja-form').attr('action'),
                data: formData,
            })
            .done(function(response) {

                console.log("(3655) response: ");

                console.log(response);
                
                if ( response !== " " ) {

                    try {

                        var js_respuesta =  JSON.parse(response); // trae toda la matriz

                        var aJson_stringify = JSON.stringify(js_respuesta, null, 4);

                        console.log('(3295) aJson_stringify: ' + aJson_stringify);
                    } catch(e) {
                        
                        console.log("(3298) error: " + e);
                        showModError("");
                        $("#txtContenido").text("Hubo un error al calcular la caja");
                        return false;
                    }
                }else{

                    showModError("");
                    $("#txtContenido").text("Hubo un error al calcular la caja");
                    return false;
                }

                console.log('(3674) mensaje: ' + js_respuesta.mensaje);

                console.log('==============');


                $('#table_adicionales_tr').empty();

                // (RESUMEN)
                    
                    $('#resumenEmpalme').empty();
                    $('#resumenFcajon').empty();
                    $('#resumenFcartera').empty();
                    $('#resumenGuarda').empty();
                    $('#resumenCartones').empty();
                    $('#resumenOtros').empty();
                    $("#resumenHead").empty();
                    $("#resumenMensajeria").empty();
                    $("#resumenEmpaque").empty();
                    $('#resumenEncuadernacion').empty();

                    var rm_empalme   = '<tr><td><b>Empalme del Cajón</b></td><td></td><td></td><td></td></tr>';
                    var rm_fcajon    = '<tr><td><b>Forro del Cajón</b></td><td></td><td></td><td></td></tr>';
                    var rm_fcartera  = '<tr><td><b>Forro de la Cartera</b></td><td></td><td></td><td></td></tr>';
                    var rm_guarda    = '<tr><td><b>Guarda</b></td><td></td><td></td><td></td></tr>';
                    var rm_cartoncaj = '<tr><td><b>Cartón Cajón</b></td><td></td><td></td><td></td></tr>';
                    var rm_cartoncar = '<tr><td><b>Cartón Cartera</b></td><td></td><td></td><td></td></tr>';
                    var rm_head = "<tr><td><b>ODT: </b>" + js_respuesta['nomb_odt'] + "</td><td><b>Cantidad: </b>" + js_respuesta['tiraje'] + "</td><td><b>Cliente: </b>" + js_respuesta['Nombre_cliente'] + "</td><td><b>Fecha: " + js_respuesta['Fecha'] + "</b></td></tr>";
                    var rm_msj = '<tr><td><b>Costo Mensajería</b></td><td></td><td></td><td></td></tr>';
                    var rm_emp = '<tr><td><b>Costo Empaque</b></td><td></td><td></td><td></td></tr>';
                    var rm_enc = '<tr><td><b>Encuadernación</b></td><td></td><td></td><td></td></tr>';


                    jQuery214('#resumenEmpalme').append(rm_empalme); //imprime para el resumen
                    jQuery214('#resumenFcajon').append(rm_fcajon); //imprime para el resumen
                    jQuery214('#resumenFcartera').append(rm_fcartera); //imprime para el resumen
                    jQuery214('#resumenGuarda').append(rm_guarda); //imprime para el resumen
                    $('#resumenMensajeria').append(rm_msj);
                    $('#resumenEmpaque').append(rm_emp);
                    $('#resumenEncuadernacion').append(rm_enc);


                // (MENSAJERIA)

                    var costo_msj= "<tr><td></td><td></td><td></td><td>$" + js_respuesta['mensajeria'].toFixed(2) + "</td></tr>";
                    $('#resumenMensajeria').append(costo_msj);

                // (EMPAQUE)

                    var costo_emp= "<tr><td></td><td></td><td></td><td>$" + js_respuesta['empaque'].toFixed(2) + "</td></tr>";
                    $('#resumenEmpaque').append(costo_emp);

                // (PAPELES)

                    $('#table_papeles_tr').empty();

                    var respuestapapeles;

                    var js_parte_nombre;

                    var js_color_parte;

                    var i = -1;

                    for (c in js_respuesta) {

                        i++;

                        //titulos nombre parte
                        if (c === 'Papel_Empalme') {

                            js_parte_nombre = "Empalme del Cajón";

                            //js_color_parte  = '<td style="background: paleturquoise;"></td>';
                        }

                        if (c === 'Papel_FCaj') {

                            js_parte_nombre = "Forro del Cajón";

                            //js_color_parte  = '<td style="background: thistle;"></td>';
                        }

                        if (c === 'Papel_FCar') {

                            js_parte_nombre = "Forro de la Cartera";

                            //js_color_parte  = '<td style="background: wheat;"></td>';
                        }

                        if (c === 'Papel_Guarda') {

                            js_parte_nombre = "Guarda";

                            //js_color_parte  = '<td style="background: #a5e8a5;"></td>';
                        }

                    
                        //comparaciones y asignación

                        // Papeles todos
                        if (c === 'Papel_Empalme' || c === 'Papel_FCaj' || c === 'Papel_FCar' || c === 'Papel_Guarda') {

                            var js_papel_interior_cajon_nombre_emp  = js_respuesta[c]['nombre'];
                            var js_corte_largo_Emp                  = js_respuesta[c]['corte_largo'];
                            var js_corte_ancho_Emp                  = js_respuesta[c]['corte_ancho'];
                            var js_papel_interior_cajon_cortes_Emp  = js_respuesta[c]['cortes'];
                            var js_papel_interior_cajon_pliegos_Emp = js_respuesta[c]['pliegos'];
                            var js_Costo_total_pliegos_emp_Emp      = js_respuesta[c]['costo_tot_pliegos'];

                            if (js_papel_interior_cajon_nombre_emp === undefined || js_corte_largo_Emp === undefined || js_corte_ancho_Emp === undefined || js_papel_interior_cajon_cortes_Emp === undefined || js_papel_interior_cajon_pliegos_Emp === undefined || js_Costo_total_pliegos_emp_Emp === undefined) {

                                console.log('(3791) Buscando los papeles elegidos en: '+ js_parte_nombre);

                            } else {

                                var trpapelesEmp = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr><td>Material</td><td>'+ js_papel_interior_cajon_nombre_emp +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_Emp +' Ancho: '+ js_corte_ancho_Emp +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_papel_interior_cajon_cortes_Emp +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_papel_interior_cajon_pliegos_Emp +'</td></tr><tr><td>Costo Total</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="prices" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td></tr>';

                                jQuery214('#table_papeles_tr').append(trpapelesEmp); //imprime tr

                                var parteresumen;

                                if (js_parte_nombre == 'Empalme del Cajón') {

                                    parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                                    jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                }

                                if (js_parte_nombre == 'Forro del Cajón') {

                                    parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                                    jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                }

                                if (js_parte_nombre == 'Forro de la Cartera') {

                                   parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                }

                                if (js_parte_nombre == 'Guarda') {

                                    parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                                    jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                }
                            }
                        }
                    }

                // (CARTONES)

                    var js_nombre_cajon_CartonCaj      = js_respuesta.CartonCaj['nombre'];
                    var js_corte_largo_CartonCaj       = js_respuesta.CartonCaj['corte_largo'];
                    var js_corte_ancho_CartonCaj       = js_respuesta.CartonCaj['corte_ancho'];
                    var js_Piezas_por_Pliego_CartonCaj = js_respuesta.CartonCaj['piezas_por_pliego'];
                    var js_Num_pliegos_CartonCaj       = js_respuesta.CartonCaj['num_pliegos'];
                    var js_costo_total_CartonCaj       = js_respuesta.CartonCaj['costo_tot_carton'];

                    var trpapelescartonj = '<tr><td colspan="2" style="background: steelblue;color: white;">Carton del Cajón</td></tr><tr><td>Material</td><td>'+ js_nombre_cajon_CartonCaj +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_CartonCaj +' Ancho: '+ js_corte_ancho_CartonCaj +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_Piezas_por_Pliego_CartonCaj +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_Num_pliegos_CartonCaj +'</td></tr><tr><td>Costo Total</td><td>$'+ js_costo_total_CartonCaj.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_total_CartonCaj.toFixed(2) +'"></td></tr>';

                    jQuery214('#table_papeles_tr').append(trpapelescartonj);

                    parteresumen = '<tr><td></td><td>'+ js_nombre_cajon_CartonCaj +'</td><td>$'+ js_costo_total_CartonCaj.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_total_CartonCaj.toFixed(2) +'"></td><td></td></tr>';

                    jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

                    var js_nombre_cajon_cartera_CartonCar = js_respuesta.CartonCar['nombre'];
                    var js_corte_largo_CartonCar          = js_respuesta.CartonCar['corte_largo'];
                    var js_corte_ancho_CartonCar          = js_respuesta.CartonCar['corte_ancho'];
                    var js_Piezas_por_Pliego_CartonCar    = js_respuesta.CartonCar['piezas_por_pliego'];
                    var js_Num_pliegos_CartonCar          = js_respuesta.CartonCar['num_pliegos'];
                    var js_costo_total_CartonCar          = js_respuesta.CartonCar['costo_tot_carton'];

                    var trpapelescartoncr = '<tr><td colspan="2" style="background: steelblue;color: white;">Carton Cartera</td></tr><tr><td>Material</td><td>'+ js_nombre_cajon_cartera_CartonCar +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_CartonCar +' Ancho: '+ js_corte_ancho_CartonCar +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_Piezas_por_Pliego_CartonCar +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_Num_pliegos_CartonCar +'</td></tr><tr><td>Costo Total</td><td>$'+ js_costo_total_CartonCar.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_total_CartonCar.toFixed(2) +'"></td></tr>';

                    jQuery214('#table_papeles_tr').append(trpapelescartoncr);

                    parteresumen = '<tr><td></td><td>'+ js_nombre_cajon_cartera_CartonCar +'</td><td>$'+ js_costo_total_CartonCar.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_total_CartonCar.toFixed(2) +'"></td><td></td></tr>';

                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

                // Elaboración cartera
                    var js_elab_car_tiraje = js_respuesta.elab_car['tiraje'];


                    var js_elab_car_forro_costo_unit  = js_respuesta.elab_car['forro_costo_unit'];


                    if (js_elab_car_forro_costo_unit <= 0) {

                        showModError("Elaboracion Cartera (costo unitario forro)");
                    }


                    var js_elab_car_forro_car = js_respuesta.elab_car['forro_car'];


                    var js_elab_car_guarda_costo_unit = js_respuesta.elab_guarda['guarda_costo_unit'];

                    if (js_elab_car_guarda_costo_unit <= 0) {

                        showModError("Elaboracion Guarda (costo unitario guarda");
                    }

                    var js_elab_car_guarda = js_respuesta.elab_guarda['guarda'];

                    var js_elab_costo_tot_elab_car = js_elab_car_forro_car + js_elab_car_guarda;


                    var elab_car_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Elaboración</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_elab_car_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Totales</td></tr><tr><td>Forro</td><td>'+ js_elab_car_forro_costo_unit +'</td><td>'+ js_elab_car_forro_car +'</td></tr><tr><td>Guarda</td><td>'+ js_elab_car_guarda_costo_unit +'</td><td>'+ js_elab_car_guarda +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_elab_costo_tot_elab_car.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_elab_costo_tot_elab_car.toFixed(2) +'"></td></tr><tr><td colspan="3"></td></tr>';

                    jQuery214('#table_adicionales_tr').append(elab_car_tr);

                    var parteresumen = '<tr><td></td><td>Elaboración</td><td>$'+ js_elab_car_forro_car.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_elab_car_forro_car.toFixed(2) + '"></td><td></td></tr>';

                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

                    var parteresumen = '<tr><td></td><td>Elaboración</td><td>$'+ js_elab_car_guarda.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="' + js_elab_car_guarda.toFixed(2) + '"></td><td></td></tr>';

                    jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen


                // Ranurado
                    var js_ranurado_tiraje  = js_respuesta.ranurado['tiraje'];
                    var js_ranurado_arreglo = js_respuesta.ranurado['arreglo'];


                    var js_ranurado_costo_unit_por_ranura = js_respuesta.ranurado['costo_unit_por_ranura'];

                    if (js_ranurado_costo_unit_por_ranura <= 0) {

                        showModError("Ranurado (costo unitario por ranura)");
                    }


                    var js_ranurado_costo_por_ranura      = js_respuesta.ranurado['costo_por_ranura'];
                    var js_ranurado_costo_tot_ranurado    = js_respuesta.ranurado['costo_tot_ranurado'];



                    var js_ranurado_costo_unit_por_ranura2 = js_respuesta.ranurado_Fcar['costo_unit_por_ranura'];

                    if (js_ranurado_costo_unit_por_ranura2 <= 0) {

                        showModError("Ranurado Forro Cartera (costo unitario por ranura)");
                    }


                    var js_ranurado_costo_por_ranura2 = js_respuesta.ranurado_Fcar['costo_por_ranura'];


                    var js_ranurado_costo_tot_todo_ranura  = js_ranurado_costo_tot_ranurado + js_ranurado_costo_por_ranura2;

                    var ranurado_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Ranurado</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_ranurado_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_ranurado_arreglo +'</td><td>'+ js_ranurado_arreglo +'</td></tr><tr><td>Ranurado Cajón</td><td>'+ js_ranurado_costo_unit_por_ranura +'</td><td>'+ js_ranurado_costo_por_ranura +'</td></tr><tr><td>Ranurado Cartera</td><td>'+ js_ranurado_costo_unit_por_ranura2 +'</td><td>'+ js_ranurado_costo_por_ranura2 +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_ranurado_costo_tot_todo_ranura.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_ranurado_costo_tot_todo_ranura.toFixed(2) +'"></td></tr><tr><td colspan="3"></td></tr>';

                    jQuery214('#table_adicionales_tr').append(ranurado_tr);

                    var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_tot_ranurado.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="' + js_ranurado_costo_tot_ranurado.toFixed(2) + '"></td><td></td></tr>';

                    jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen

                    var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_por_ranura2.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_ranurado_costo_por_ranura2.toFixed(2) + '"></td><td></td></tr>';

                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen


                // Encuadernacion

                    var js_encuadernacionranurado_tiraje = js_respuesta.encuadernacion['tiraje'];


                    var js_encuadernacion_despunte_costo_unitario = js_respuesta.encuadernacion['despunte_costo_unitario'];

                    
                    if (js_encuadernacion_despunte_costo_unitario <= 0) {

                        showModError("Encuadernacion (costo unitario despunte)");
                    }


                    var js_encuadernacion_despunte_de_esquinas_para_cajon = js_respuesta.encuadernacion['despunte_de_esquinas_para_cajon'];


                    var js_encuadernacion_encajada_costo_unitario = js_respuesta.encuadernacion['encajada_costo_unitario'];


                    if (js_encuadernacion_encajada_costo_unitario <= 0) {

                        showModError("Encuadernacion (costo unitario encajada)");
                    }



                    var js_encuadernacion_Encajada = js_respuesta.encuadernacion['encajada'];
                    
                    var js_encuadernacion_costo_tot_proceso = js_respuesta.encuadernacion['costo_tot_proceso'];


                    var js_encuadernacion_puesta_banco_costo_unit = js_respuesta.encuadernacion['puesta_banco_costo_unit'];


                    if (js_encuadernacion_puesta_banco_costo_unit <= 0) {

                        showModError("Encuadernacion (costo unitario puesta banco)");
                    }


                    var js_encuadernacion_Puesta_de_banco = js_respuesta.encuadernacion['puesta_de_banco'];

                    var js_encuadernacion_costo_tot_proceso = js_respuesta.encuadernacion['costo_tot_encuadernacion'];

                    var js_encuadernacion_costo_unitario_iman = js_respuesta.encuadernacion['costo_unitario_iman'];


                    if (js_encuadernacion_costo_unitario_iman <= 0) {

                        showModError("Encuadernacion (costo unitario iman)");
                    }


                    var js_encuadernacion_Perforado_para_iman_y_puesta_de_iman = js_respuesta.encuadernacion['perforado_para_iman_y_puesta_de_iman'];


                    var js_encuadernacion_despunte_costo_unitario = js_respuesta.encuadernacion['despunte_costo_unitario'];


                    if (js_encuadernacion_despunte_costo_unitario <= 0) {

                        showModError("Encuadernacion (costo unitario despunte)");
                    }


                    var js_encuadernacion_Despunte_de_esquinas_para_cajon = js_respuesta.encuadernacion['despunte_de_esquinas_para_cajon'];



                    var js_encuadernacion_costo_unitario_Forrado_de_cajon = js_respuesta.encuadernacion_Fcaj['costo_unit_forrado_cajon'];


                    if (js_encuadernacion_costo_unitario_Forrado_de_cajon <= 0) {

                        showModError("Encuadernacion (costo unitario Forrado de Cajon");
                    }


                    var js_encuadernacion_Forrado_de_cajon = js_respuesta.encuadernacion_Fcaj['forrado_de_cajon'];

                    var js_encuadernacion_Arreglo_de_Forrado_de_cajon = js_respuesta.encuadernacion_Fcaj['arreglo_de_forrado_de_cajon'];


                    var js_encuadernacion_empalme_cajon_costo_unitario = js_respuesta.encuadernacion_Fcaj['empalme_cajon_costo_unitario'];

                    if (js_encuadernacion_empalme_cajon_costo_unitario <= 0) {

                        showModError("Encuadernacion (costo unitario empalme cajon)");
                    }


                    var js_encuadernacion_Empalme_de_cajon = js_respuesta.encuadernacion_Fcaj['empalme_de_cajon'];


                    var ranurado_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Encuadernación</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_encuadernacionranurado_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Despunte</td><td>'+ js_encuadernacion_despunte_costo_unitario +'</td><td>'+ js_encuadernacion_Despunte_de_esquinas_para_cajon +'</td></tr><tr><td>Forrado</td><td>'+ js_encuadernacion_costo_unitario_Forrado_de_cajon +'</td><td>'+ js_encuadernacion_Forrado_de_cajon +'</td></tr><tr><td>Arreglo Forrado</td><td>'+ js_encuadernacion_Arreglo_de_Forrado_de_cajon +'</td><td>'+ js_encuadernacion_Arreglo_de_Forrado_de_cajon +'</td></tr><tr><td>Encajada</td><td>'+ js_encuadernacion_encajada_costo_unitario +'</td><td>'+ js_encuadernacion_Encajada +'</td></tr><tr><td>Empalme</td><td>'+ js_encuadernacion_empalme_cajon_costo_unitario +'</td><td>'+ js_encuadernacion_Empalme_de_cajon +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_encuadernacion_costo_tot_proceso.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_encuadernacion_costo_tot_proceso.toFixed(2) +'"></td></tr><tr><td colspan="3"></td></tr>';

                    var parteresumen = '<tr><td></td><td></td><td></td><td>$'+ js_respuesta['encuadernacion']['costo_tot_encuadernacion'].toFixed(2) +'</td></tr>';

                    $('#resumenEncuadernacion').append(parteresumen); //imprime para el resumen
                    $('#resumenFcajon').append("<tr><td></td><td>Encuadernación</td><td>$" + js_respuesta['encuadernacion_Fcaj']['costo_tot_proceso'] + " <input type='hidden' class='pricesresumenfcajon' value=" + js_respuesta['encuadernacion_Fcaj']['costo_tot_proceso'] + "></td><td></td></tr>");
                    $('#resumenEmpalme').append("<tr><td></td><td>Encuadernación</td><td>$" + js_respuesta['encuadernacion']['costo_tot_proceso'] + " <input type='hidden' class='pricesresumenempalme' value=" + js_respuesta['encuadernacion']['costo_tot_proceso'] + "</td><td></td></tr>");
                    $('#table_adicionales_tr').append(ranurado_tr);


                //Variables gral de IMPRESIONES

                    $('#proceso_offset_M1').hide();

                    $('#proceso_serigrafia_M1').hide();

                    $('#proceso_digital_M1').hide();

                    $('#table_proc_offset').empty();

                    $('#table_proc_serigrafia').empty();

                    $('#table_proc_digital').empty();


                    // Empalme Proceso Offset

                    if ("OffEmp" in js_respuesta) {

                        var js_variable_extra1 = js_respuesta.OffEmp; //trae los valores de OffEmp

                        for ( a in js_variable_extra1 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra1[a]['costo_unitario_laminas'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Empalme (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra1[a]['costo_tot_laminas'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra1[a]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Ofsset Empalme (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra1[a]['costo_tot_arreglo'];


                            var js_costo_unitario_tiro_emp = js_variable_extra1[a]['costo_unitario_tiro'];


                            if (js_costo_unitario_tiro_emp <= 0) {

                                showModError("Offset Empalme (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_emp = js_variable_extra1[a]['costo_tot_tiro'];

                            //*** otros datos ****
                            var js_cantidad_emp   = js_variable_extra1[a]['cantidad'];
                            var js_tipo_emp       = js_variable_extra1[a]['Tipo'];
                            var js_num_tintas_emp = js_variable_extra1[a]['num_tintas'];


                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;


                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                        }
                    } else if ( js_respuesta.Off_maq_Emp ){

                        var js_variable_extra1_1 = js_respuesta.Off_maq_Emp; //trae los valores de Off_maq_Emp

                        for ( a_a in js_variable_extra1_1 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra1_1[a_a]['costo_unitario_laminas_maq'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra1_1[a_a]['costo_laminas_maq'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra1_1[a_a]['arreglo_costo_unitario'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra1_1[a_a]['arreglo_costo'];


                            var js_costo_unitario_maquila = js_variable_extra1_1[a_a]['costo_unitario_maq'];


                            if (js_costo_unitario_maquila <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario tiro)");
                            }


                            var js_costo_tot_maquila = js_variable_extra1_1[a_a]['costo_tot_maquila'];

                            //*** otros datos ****
                            var js_cantidad_emp   = js_variable_extra1_1[a_a]['cantidad_maq'];
                            var js_tipo_emp       = js_variable_extra1_1[a_a]['Tipo'];
                            var js_num_tintas_emp = js_variable_extra1_1[a_a]['num_tintas_maq'];

                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_maquila;

                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Maquila</td><td>'+ js_costo_unitario_maquila +'</td><td>'+ js_costo_tot_maquila +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            //$('#table_proc_offset').empty();

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                        }
                    }



                    // Empalme Proceso Serigrafia

                    if ("SerEmp" in js_respuesta) {

                        var js_variable_extra2 = js_respuesta.SerEmp; //trae los valores de SerEmp

                        for ( b in js_variable_extra2 ) {

                            var js_cantidad_seri = js_variable_extra2[b]['cantidad'];

                            var js_tipo_seri = js_variable_extra2[b]['tipo'];

                            var js_num_tintas_seri = js_variable_extra2[b]['num_tintas'];


                            var js_costo_unitario_arreglo_seri = js_variable_extra2[b]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_seri <= 0) {

                                showModError("Serigrafia Empalme (costo unitario arreglo)");
                            }


                            var js_costo_arreglo_seri = js_variable_extra2[b]['costo_arreglo'];


                            var js_costo_unitario_tiro_seri = js_variable_extra2[b]['costo_unitario_tiro'];


                            if (js_costo_unitario_tiro_seri <= 0) {

                                showModError("Serigrafia Empalme (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_serigrafia = js_variable_extra2[b]['costo_tiro']; //js_variable_extra2[b]['costo_tiro'];


                            var js_tot_serigrafia_emp = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia;


                            var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_serigrafia').append(processserigrafia);

                            $('#proceso_serigrafia_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                        }
                    }


                    // Empalme Proceso Digital
                    if ("DigEmp" in js_respuesta) {

                        var js_variable_extra3 = js_respuesta.DigEmp; //trae los valores de DigEmp

                        if ("impresion_digital" in js_variable_extra3) {
                            
                            showModErrorDigital("No cabe la impresión en Digital(Empalme) con estas medidas.");
                        } else  {

                            for ( c in js_variable_extra3 ) {

                                var js_cantidad_con_merma_digital = js_variable_extra3[c]['cantidad'];


                                var js_costo_unitario_digital = js_variable_extra3[c]['costo_unitario'];


                                if (js_costo_unitario_digital <= 0) {

                                    showModError("Digital Empalme (costo unitario tiro)");
                                }


                                var js_costo_tot_digital = js_variable_extra3[c]['costo_tot_proceso'].toFixed(2);
                                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Costo Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value=" '+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                                jQuery214('#table_proc_digital').append(processdigital);

                                $('#proceso_digital_M1').show();

                                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_digital +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }


                //Forro del Cajón (IMPRESIONES)

                    // Fcajon Proceso Offset

                    if ("OffFCaj" in js_respuesta) {

                        var js_variable_extra4 = js_respuesta.OffFCaj; //trae los valores de OffFCaj

                        for ( a in js_variable_extra4 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra4[a]['costo_unitario_laminas'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Forro del Cajon (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra4[a]['costo_tot_laminas'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra4[a]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Forro del Cajon (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra4[a]['costo_tot_arreglo'];


                            var js_costo_unitario_tiro_emp = js_variable_extra4[a]['costo_unitario_tiro'];

                            
                            if (js_costo_unitario_tiro_emp <= 0) {

                                showModError("Offset Forro del Cajon (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_emp = js_variable_extra4[a]['costo_tot_tiro']; 
                            //js_variable_extra4[a]['costo_tot_tiro'];


                            // *** otros datos ****
                            var js_cantidad_emp = js_variable_extra4[a]['cantidad'];

                            var js_tipo_emp = js_variable_extra4[a]['tipo'];

                            var js_num_tintas_emp = js_variable_extra4[a]['num_tintas'];


                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;

                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();


                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                        }
                    } else if ( js_respuesta.Off_maq_FCaj ){

                        var js_variable_extra1_1 = js_respuesta.Off_maq_FCaj; //trae los valores de Off_maq_FCaj

                        for ( a_a in js_variable_extra1_1 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra1_1[a_a]['costo_unitario_laminas_maq'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra1_1[a_a]['costo_laminas_maq'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra1_1[a_a]['costo_unitario_arreglo_maq'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra1_1[a_a]['costo_arreglo_maq'];


                            var js_costo_unitario_maquila = js_variable_extra1_1[a_a]['costo_unitario_maq'];


                            if (js_costo_unitario_maquila <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario tiro)");
                            }


                            var js_costo_tot_maquila = js_variable_extra1_1[a_a]['costo_tot_maquila'];

                            //*** otros datos ****
                            var js_cantidad_emp   = js_variable_extra1_1[a_a]['cantidad_maq'];
                            var js_tipo_emp       = js_variable_extra1_1[a_a]['Tipo'];
                            var js_num_tintas_emp = js_variable_extra1_1[a_a]['num_tintas_maq'];

                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_maquila;

                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Maquila</td><td>'+ js_costo_unitario_maquila +'</td><td>'+ js_costo_tot_maquila +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            //$('#table_proc_offset').empty();

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                        }
                    }


                    // Fcajon Proceso Serigrafia

                    if ("SerFCaj" in js_respuesta) {

                        var js_variable_extra5 = js_respuesta.SerFCaj; //trae los valores de SerFCaj

                        for ( b in js_variable_extra5 ) {

                            var js_cantidad_seri = js_variable_extra5[b]['cantidad'];

                            var js_tipo_seri = js_variable_extra5[b]['tipo'];

                            var js_num_tintas_seri = js_variable_extra5[b]['num_tintas'];


                            var js_costo_unitario_arreglo_seri = js_variable_extra5[b]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_seri <= 0) {

                                showModError("Serigrafia Forro del Cajon (costo unitario arreglo)");
                            }


                            var js_costo_arreglo_seri = js_variable_extra5[b]['costo_arreglo'];


                            var js_costo_unitario_tiro_seri = js_variable_extra5[b]['costo_unitario_tiro'];

                            if (js_costo_unitario_tiro_seri <= 0) {

                                showModError("Serigrafia Forro del Cajon (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_serigrafia = js_variable_extra5[b]['costo_tiro'];


                            var js_tot_serigrafia_emp = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia;


                            var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_serigrafia').append(processserigrafia);

                            $('#proceso_serigrafia_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                        }
                    }

                    // Fcajon Proceso Digital

                    if ("DigFCaj" in js_respuesta) {

                        var js_variable_extra6 = js_respuesta.DigFCaj; //trae los valores de DigFCaj

                        if ("impresion_digital" in js_variable_extra6) {
                            
                            showModErrorDigital("No cabe la impresión Digital(Forro del Cajon) con estas medidas.");
                        } else  {

                            for ( c in js_variable_extra6 ) {

                                var js_cantidad_con_merma_digital = js_variable_extra6[c]['cantidad'];


                                var js_costo_unitario_digital = js_variable_extra6[c]['costo_unitario'];


                                if (js_costo_unitario_digital <= 0) {

                                    showModError("Digital Forro del Cajon (costo unitario tiro)");
                                }


                                var js_costo_tot_digital = js_variable_extra6[c]['costo_tot'];

                                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Coto Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                                jQuery214('#table_proc_digital').append(processdigital);

                                $('#proceso_digital_M1').show();

                                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_digital +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }

                // Forro de la Cartera (IMPRESIONES)

                    // Fcartera Proceso Offset

                    if ("OffFCar" in js_respuesta) {

                        var js_variable_extra7 = js_respuesta.OffFCar; //trae los valores de OffFCar

                        for ( a in js_variable_extra7 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra7[a]['costo_unitario_laminas'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Forro Cartera (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra7[a]['costo_tot_laminas'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra7[a]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Forro Cartera (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra7[a]['costo_tot_arreglo'];


                            var js_costo_unitario_tiro_emp = js_variable_extra7[a]['costo_unitario_tiro'];


                            if (js_costo_unitario_tiro_emp <= 0) {

                                showModError("Offset Forro Cartera (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_emp = js_variable_extra7[a]['costo_tot_tiro'];


                            //*** otros datos ****
                            var js_cantidad_emp     = js_variable_extra7[a]['cantidad'];
                            var js_tipo_emp         = js_variable_extra7[a]['tipo'];
                            var js_num_tintas_emp   = js_variable_extra7[a]['num_tintas'];

                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;


                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                        }
                    } else if ( js_respuesta.Off_maq_FCar ){

                        var js_variable_extra1_1 = js_respuesta.Off_maq_FCar; //trae los valores de Off_maq_FCar

                        for ( a_a in js_variable_extra1_1 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra1_1[a_a]['costo_unitario_laminas_maq'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra1_1[a_a]['costo_laminas_maq'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra1_1[a_a]['costo_unitario_arreglo_maq'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra1_1[a_a]['costo_arreglo_maq'];


                            var js_costo_unitario_maquila = js_variable_extra1_1[a_a]['costo_unitario_maq'];


                            if (js_costo_unitario_maquila <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario tiro)");
                            }


                            var js_costo_tot_maquila = js_variable_extra1_1[a_a]['costo_tot_maquila'];

                            //*** otros datos ****
                            var js_cantidad_emp   = js_variable_extra1_1[a_a]['cantidad_maq'];
                            var js_tipo_emp       = js_variable_extra1_1[a_a]['Tipo'];
                            var js_num_tintas_emp = js_variable_extra1_1[a_a]['num_tintas_maq'];

                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_maquila;

                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Maquila</td><td>'+ js_costo_unitario_maquila +'</td><td>'+ js_costo_tot_maquila +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            //$('#table_proc_offset').empty();

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                        }
                    }


                    // Fcartera Proceso Serigrafia

                    if ("SerFCar" in js_respuesta) {

                        var js_variable_extra8 = js_respuesta.SerFCar; //trae los valores de SerFCar

                        for ( b in js_variable_extra8 ) {

                            var js_cantidad_seri   = js_variable_extra8[b]['cantidad'];
                            var js_tipo_seri       = js_variable_extra8[b]['tipo'];
                            var js_num_tintas_seri = js_variable_extra8[b]['num_tintas'];


                            var js_costo_unitario_arreglo_seri = js_variable_extra8[b]['costo_unitario_arreglo'];

                            if (js_costo_unitario_arreglo_seri <= 0) {

                                showModError("Serigrafia Forro Cartera (costo unitario arreglo)");
                            }


                            var js_costo_arreglo_seri = js_variable_extra8[b]['costo_arreglo'];


                            var js_costo_unitario_tiro_seri  = js_variable_extra8[b]['costo_unitario_tiro'];

                            if (js_costo_unitario_tiro_seri <= 0) {

                                showModError("Serigrafia Forro Cartera (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_serigrafia = js_variable_extra8[b]['costo_tiro'];

                            var js_tot_serigrafia_emp  = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia

                            var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_serigrafia').append(processserigrafia);

                            $('#proceso_serigrafia_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                        }
                    }

                    // Fcartera Proceso Digital

                    if ("DigFCar" in js_respuesta) {

                        var js_variable_extra9 = js_respuesta.DigFCar; //trae los valores de DigFCar

                        if ("impresion_digital" in js_variable_extra9) {
                            
                            showModErrorDigital("No cabe la impresión en Digital(Forro Cartera) con estas medidas.");
                        } else  {

                            for ( c in js_variable_extra9 ) {

                                var js_cantidad_con_merma_digital = js_variable_extra9[c]['cantidad'];


                                var js_costo_unitario_digital = js_variable_extra9[c]['costo_unitario'];


                                if (js_costo_unitario_digital <= 0) {

                                    showModError("Digital Forro Cartera (costo unitario tiro)");
                                }


                                var js_costo_tot_digital = js_variable_extra9[c]['costo_tot'];

                                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Coto Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                                jQuery214('#table_proc_digital').append(processdigital);

                                $('#proceso_digital_M1').show();

                                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_digital +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }


                // Guarda (IMPRESIONES)

                    // Guarda Proceso Offset

                    if ("OffG" in js_respuesta) {

                        var js_variable_extra10 = js_respuesta.OffG; //trae los valores de OffG

                        for ( a in js_variable_extra10 ) {


                            var js_costo_unitario_laminas_emp = js_variable_extra10[a]['costo_unitario_laminas'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Guarda (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra10[a]['costo_tot_laminas'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra10[a]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Guarda (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra10[a]['costo_tot_arreglo'];


                            var js_costo_unitario_tiro_emp = js_variable_extra10[a]['costo_unitario_tiro'];

                            if (js_costo_unitario_tiro_emp <= 0) {

                                showModError("Offset Guarda (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_emp = js_variable_extra10[a]['costo_tot_tiro'];


                            //*** otros datos ****
                            var js_cantidad_emp    = js_variable_extra10[a]['cantidad'];
                            var js_tipo_emp        = js_variable_extra10[a]['tipo'];
                            var js_num_tintas_emp  = js_variable_extra10[a]['num_tintas'];

                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;


                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Guarda</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                        }
                    } else if ( js_respuesta.Off_maq_G ) {

                        var js_variable_extra1_1 = js_respuesta.Off_maq_G; //trae los valores de Off_maq_G

                        for ( a_a in js_variable_extra1_1 ) {

                            var js_costo_unitario_laminas_emp = js_variable_extra1_1[a_a]['costo_unitario_laminas_maq'];


                            if (js_costo_unitario_laminas_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario laminas)");
                            }


                            var js_costo_tot_laminas_emp = js_variable_extra1_1[a_a]['costo_laminas_maq'];


                            var js_costo_unitario_arreglo_emp = js_variable_extra1_1[a_a]['costo_unitario_arreglo_maq'];


                            if (js_costo_unitario_arreglo_emp <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario arreglo)");
                            }


                            var js_costo_tot_arreglo_emp = js_variable_extra1_1[a_a]['costo_arreglo_maq'];


                            var js_costo_unitario_maquila = js_variable_extra1_1[a_a]['costo_unitario_maq'];


                            if (js_costo_unitario_maquila <= 0) {

                                showModError("Offset Empalme Maquila (costo unitario tiro)");
                            }


                            var js_costo_tot_maquila = js_variable_extra1_1[a_a]['costo_tot_maquila'];

                            //*** otros datos ****
                            var js_cantidad_emp   = js_variable_extra1_1[a_a]['cantidad_maq'];
                            var js_tipo_emp       = js_variable_extra1_1[a_a]['Tipo'];
                            var js_num_tintas_emp = js_variable_extra1_1[a_a]['num_tintas_maq'];

                            var js_total_offset_emp = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_maquila;

                            // imprime en la tabla de procesos añadidos Offset
                            var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Guardado</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Maquila</td><td>'+ js_costo_unitario_maquila +'</td><td>'+ js_costo_tot_maquila +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            //$('#table_proc_offset').empty();

                            jQuery214('#table_proc_offset').append(processoffset);

                            $('#proceso_offset_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                        }
                    }



                    // Guarda Proceso Serigrafia

                    if ("SerG" in js_respuesta) {

                        var js_variable_extra11 = js_respuesta.SerG; //trae los valores de SerG

                        for ( b in js_variable_extra11 ) {

                            var js_cantidad_seri   = js_variable_extra11[b]['cantidad'];
                            var js_tipo_seri       = js_variable_extra11[b]['tipo'];
                            var js_num_tintas_seri = js_variable_extra11[b]['num_tintas'];


                            var js_costo_unitario_arreglo_seri = js_variable_extra11[b]['costo_unitario_arreglo'];


                            if (js_costo_unitario_arreglo_seri <= 0) {

                                showModError("Serigrafia Guarda (costo unitario arreglo)");
                            }


                            var js_costo_arreglo_seri = js_variable_extra11[b]['costo_arreglo'];


                            var js_costo_unitario_tiro_seri  = js_variable_extra11[b]['costo_unitario_tiro'];

                            if (js_costo_unitario_tiro_seri <= 0) {

                                showModError("Serigrafia Guarda (costo unitario tiro)");
                            }


                            var js_costo_tot_tiro_serigrafia = js_variable_extra11[b]['costo_tiro'];


                            var js_tot_serigrafia_emp = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia

                            var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Guarda</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_serigrafia').append(processserigrafia);

                            $('#proceso_serigrafia_M1').show();

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                        }
                    }


                    // Guarda Proceso Digital

                    if ("DigG" in js_respuesta) {

                        var js_variable_extra12 = js_respuesta.DigG; //trae los valores de DigG

                        if ("impresion_digital" in js_variable_extra12) {
                            
                            showModErrorDigital("No cabe la impresión en Digital(Guada) con estas medidas.");
                        } else  {

                            for ( c in js_variable_extra12 ) {

                                var js_cantidad_con_merma_digital = js_variable_extra12[c]['cantidad'];


                                var js_costo_unitario_digital = js_variable_extra12[c]['costo_unitario'];


                                if (js_costo_unitario_digital <= 0) {

                                    showModError("Digital Guarda (costo unitario tiro)");
                                }
                                

                                var js_costo_tot_digital = js_variable_extra12[c]['costo_tot_proceso'];


                                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Guarda</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Coto Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                                jQuery214('#table_proc_digital').append(processdigital);

                                $('#proceso_digital_M1').show();

                                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_digital +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }

                
                // oculta
                    $('#proceso_hs_M1').hide();

                    $('#proceso_grab_M1').hide();

                    $('#proceso_lam_M1').hide();

                    $('#proceso_suaje_M1').hide();

                    $('#table_proc_Lam').empty();

                    $('#table_proc_HS').empty();

                    $('#table_proc_Grab').empty();

                    $('#table_proc_Suaje').empty();
                    $('#table_proc_Laser').empty();
                    $('#table_proc_BarnizUV').empty();

                    
                    $('#table_proc_BarnizUV').empty();
                    $('#proceso_barnizuv_M1').hide();

                
                // (ACABADOS)

                    var respuestaacabados;
                    var js_parte_nombre;

                    for (c in js_respuesta) {

                        // js_parte_nombre
                        //titulos nombre parte en Empalme
                        if (c === 'Laminado' || c === 'HotStamping' || c === 'Grabado' || c === 'Suaje' || c === 'Barniz_UV' || c === 'Laser' || c === 'Pegados Especiales' || c === 'Retractilado') {

                            js_parte_nombre = "Empalme del Cajón";
                        }

                        // titulos en el Forro del Cajon
                        if (c === 'LaminadoFcaj' || c === 'HotStampingFcaj' || c === 'GrabadoFcaj' || c === 'SuajeFcaj' || c === 'BarnizFcaj' || c === 'LaserFcaj') {

                            js_parte_nombre = "Forro del Cajón";
                        }

                        // titulos en el Forro de la Cartera
                        if (c === 'LaminadoFcar' || c === 'HotStampingFcar' || c === 'GrabadoFcar' || c === 'SuajeFcar' || c === 'BarnizFcar' || c === 'LaserFcar') {

                            js_parte_nombre = "Forro de la Cartera";
                        }

                        // titulos en la Guarda
                        if (c === 'LaminadoG' || c === 'BarnizG' || c === 'GrabadoG' || c === 'SuajeG' || c === 'BarnizG' || c === 'LaserG') {

                            js_parte_nombre = "Guarda";
                        }


                        respuestaacabados = js_respuesta[c];

                        for (a in respuestaacabados) {

                            //listado de acabados

                            // Acabados Laminado todos
                            if (c === 'Laminado' || c === 'LaminadoFcaj' || c === 'LaminadoFcar' || c === 'LaminadoG') {

                                var js_tipoGrabadoLam_emp = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoLam_emp       = js_respuesta[c][a]['Largo'];
                                var js_AnchoLam_emp       = js_respuesta[c][a]['Ancho'];


                                var js_costo_unitario_lam_emp = js_respuesta[c][a]['costo_unitario'];
                                

                                if (js_costo_unitario_lam_emp <= 0) {

                                    showModError("Acabados (costo unitario laminado " + js_tipoGrabadoLam_emp + ")");
                                }


                                var js_costo_tiro_lam_emp = js_respuesta[c][a]['costo_tot_proceso'];
                                js_costo_tiro_lam_emp = js_costo_tiro_lam_emp;


                                if (js_tipoGrabadoLam_emp === undefined || js_LargoLam_emp === undefined || js_AnchoLam_emp === undefined || js_costo_unitario_lam_emp === undefined || js_costo_tiro_lam_emp === undefined) {

                                    console.log('(5038) Buscando los laminados agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoLam_emp +'</td><td>Tamaño: '+ js_LargoLam_emp +'x'+ js_AnchoLam_emp +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_lam_emp +'</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="prices" value="'+ js_costo_tiro_lam_emp +'"></td></tr><tr><td colspan="2"></td></tr>';

                                    jQuery214('#table_proc_Lam').append(acabadoTr);

                                    $('#tabla_view_acabados').show();   // donde esta este id?

                                    $('#proceso_lam_M1').show();

                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }
                            }

                            // Acabados HotStamping todos
                            if (c === 'HotStamping' || c === 'HotStampingFcaj' || c === 'HotStampingFcar' || c === 'HotStampingG') {

                                var js_tipoGrabadoHS_emp = js_respuesta[c][a]['tipoGrabado'];
                                var js_ColorHS_emp       = js_respuesta[c][a]['Color'];
                                var js_LargoHS_emp       = js_respuesta[c][a]['Largo'];
                                var js_AnchoHS_emp       = js_respuesta[c][a]['Ancho'];


                                var js_placa_costo_unitario_emp = js_respuesta[c][a]['placa_costo_unitario'];


                                if (js_placa_costo_unitario_emp <= 0) {

                                    showModError("HotStamping (costo unitario placa)");
                                }


                                var js_placa_costo_emp = js_respuesta[c][a]['placa_costo'];


                                var js_pelicula_costo_unitario_emp = js_respuesta[c][a]['pelicula_costo_unitario'];

                                js_pelicula_costo_unitario_emp = js_pelicula_costo_unitario_emp.toFixed(4);

                                if (js_pelicula_costo_unitario_emp <= 0) {

                                    showModError("HotStamping (costo unitario pelicula)");
                                }



                                var js_pelicula_costo_emp = js_respuesta[c][a]['pelicula_costo'];

                                js_pelicula_costo_emp = js_pelicula_costo_emp.toFixed(2);


                                var js_arreglo_costo_unitario_emp = js_respuesta[c][a]['arreglo_costo_unitario'];

                                if (js_arreglo_costo_unitario_emp <= 0) {

                                    showModError("HotStamping (costo unitario " + js_tipoGrabadoHS_emp + ")");
                                }


                                var js_arreglo_costo_emp = js_respuesta[c][a]['arreglo_costo'];


                                var js_estampado_costo_unitario_emp = js_respuesta[c][a]['costo_unitario'];

                                if (js_estampado_costo_unitario_emp <= 0) {

                                    showModError("HotStamping (costo unitario " + js_tipoGrabadoHS_emp + ")");
                                }


                                var js_estampado_costo_tiro_emp = js_respuesta[c][a]['costo_tiro'];
                                var js_costo_acabadohs_emp      = js_respuesta[c][a]['costo_tot_proceso'];


                                if (js_tipoGrabadoHS_emp === undefined || js_ColorHS_emp === undefined || js_LargoHS_emp === undefined || js_placa_costo_unitario_emp === undefined || js_placa_costo_emp === undefined || js_pelicula_costo_unitario_emp === undefined || js_pelicula_costo_emp === undefined || js_arreglo_costo_unitario_emp === undefined || js_arreglo_costo_emp === undefined || js_estampado_costo_unitario_emp === undefined || js_estampado_costo_tiro_emp === undefined || js_costo_acabadohs_emp === undefined) {

                                    console.log('(5144) Buscando los hoststamping agregados');

                                } else { 

                                    var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoHS_emp +'</td><td>Color: '+ js_ColorHS_emp +'</td><td>Tamaño: '+ js_LargoHS_emp +'x'+ js_AnchoHS_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ js_placa_costo_unitario_emp +'</td><td>'+ js_placa_costo_emp +'</td></tr><tr><td>Pelicula</td><td>'+ js_pelicula_costo_unitario_emp +'</td><td>'+ js_pelicula_costo_emp +'</td></tr><tr><td>Arrego</td><td>'+ js_arreglo_costo_unitario_emp +'</td><td>'+ js_arreglo_costo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_emp +'</td><td>'+ js_estampado_costo_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="prices" value="'+ js_costo_acabadohs_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                                    jQuery214('#table_proc_HS').append(acabadoTr);

                                    $('#tabla_view_acabados').show();

                                    $('#proceso_hs_M1').show();

                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }
                            }

                            // Acabados Grabados todos
                            if (c === 'Grabado' || c === 'GrabadoFcaj' || c === 'GrabadoFcar' || c === 'GrabadoG') {

                                var js_tipoGrabadoGrab_emp = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoGrab_emp       = js_respuesta[c][a]['Largo'];
                                var js_AnchoGrab_emp       = js_respuesta[c][a]['Ancho'];
                                var js_Ubicacion_grab_emp  = js_respuesta[c][a]['ubicacion'];


                                var js_placa_costo_unitario_grab_emp = js_respuesta[c][a]['placa_costo_unitario'];


                                if (js_placa_costo_unitario_grab_emp <= 0) {

                                    showModError("Grabado (costo unitaio " + js_tipoGrabadoGrab_emp + ")")
                                }


                                var js_placa_costo_grab_emp = js_respuesta[c][a]['placa_costo'];


                                var js_arreglo_costo_unitario_grab_emp = js_respuesta[c][a]['arreglo_costo_unitario'];


                                if (js_arreglo_costo_unitario_grab_emp <= 0) {

                                    showModError("Grabado (costo unitario arreglo)");
                                }


                                var js_arreglo_costo_grab_emp = js_respuesta[c][a]['arreglo_costo'];



                                var js_estampado_costo_unitario_grab_emp = js_respuesta[c][a]['costo_unitario'];

                                
                                if (js_estampado_costo_unitario_grab_emp <= 0) {

                                    showModError("Grabado (costo unitario " + js_tipoGrabadoGrab_emp + ")");
                                }


                                var js_estampado_costo_tiro_grab_emp = js_respuesta[c][a]['costo_tiro'];
                                var js_costo_acabado_grab_emp        = js_respuesta[c][a]['costo_tot_proceso'];

                                if (js_tipoGrabadoGrab_emp === undefined || js_LargoGrab_emp === undefined || js_AnchoGrab_emp === undefined || js_Ubicacion_grab_emp === undefined || js_placa_costo_unitario_grab_emp === undefined || js_placa_costo_grab_emp === undefined || js_arreglo_costo_unitario_grab_emp === undefined || js_arreglo_costo_grab_emp === undefined || js_estampado_costo_unitario_grab_emp === undefined || js_estampado_costo_tiro_grab_emp === undefined || js_costo_acabado_grab_emp === undefined) {

                                    console.log('(5236) Buscando los hoststamping agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoGrab_emp +'</td><td>Tamaño: '+ js_LargoGrab_emp +'x'+ js_AnchoGrab_emp +'</td><td>Ubicacion: '+ js_Ubicacion_grab_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ js_placa_costo_unitario_grab_emp +'</td><td>'+ js_placa_costo_grab_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_arreglo_costo_unitario_grab_emp +'</td><td>'+ js_arreglo_costo_grab_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_grab_emp +'</td><td>'+ js_estampado_costo_tiro_grab_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="prices" value="'+ js_costo_acabado_grab_emp +'"></td></tr><tr><td colspan="3"></td></tr>';


                                    jQuery214('#table_proc_Grab').append(acabadoTr);

                                    $('#tabla_view_acabados').show();

                                    $('#proceso_grab_M1').show();

                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }
                            }

                            // Acabados Suaje todos
                            if (c === 'Suaje' || c === 'SuajeFcaj' || c === 'SuajeFcar' || c === 'SuajeG') {

                                var js_tipoGrabadoSuaje = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoSuaje       = js_respuesta[c][a]['Largo'];
                                var js_AnchoSuaje       = js_respuesta[c][a]['Ancho'];


                                var js_arreglo_costo_unitario_suaje = js_respuesta[c][a]['arreglo'];


                                if (js_arreglo_costo_unitario_suaje <= 0) {

                                    showModError("Suaje (costo unitario arreglo)");
                                }


                                var js_arreglo_costo_suaje = js_respuesta[c][a]['arreglo'];



                                var js_estampado_costo_unitario_suaje = js_respuesta[c][a]['tiro_costo_unitario'];


                                if (js_estampado_costo_unitario_suaje <= 0) {

                                    showModError("Suaje (costo unitario " + js_tipoGrabadoSuaje + ")");
                                }


                                var js_estampado_costo_tiro_suaje = js_respuesta[c][a]['costo_tiro'];

                                var js_costo_acabado_suaje = js_respuesta[c][a]['costo_tot_proceso'];

                                if (js_tipoGrabadoSuaje === undefined || js_LargoSuaje === undefined || js_AnchoSuaje === undefined || js_arreglo_costo_unitario_suaje === undefined || js_arreglo_costo_suaje === undefined || js_estampado_costo_unitario_suaje === undefined || js_estampado_costo_tiro_suaje === undefined || js_costo_acabado_suaje === undefined) {

                                } else {

                                    var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ js_tipoGrabadoSuaje +'</td><td>Tamaño: '+ js_LargoSuaje +'x'+ js_AnchoSuaje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_arreglo_costo_unitario_suaje +'</td><td>'+ js_arreglo_costo_suaje +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_suaje +'</td><td>'+ js_estampado_costo_tiro_suaje +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="prices" value="'+ js_costo_acabado_suaje +'"></td></tr><tr><td colspan="3"></td></tr>';


                                    jQuery214('#table_proc_Suaje').append(acabadoTr);

                                    $('#tabla_view_acabados').show();

                                    $('#proceso_suaje_M1').show();

                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }
                            }


                            // Acabados Barniz UV (desarrollar)
                            if (c === 'Barniz_UV' || c === 'BarnizFcaj' || c === 'BarnizFcar' || c === 'BarnizG') {

                                var js_tipoGrabadoBUV_emp = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoBUV_emp       = js_respuesta[c][a]['Largo'];
                                var js_AnchoBUV_emp       = js_respuesta[c][a]['Ancho'];
                                var js_costo_unitario_buv_emp = js_respuesta[c][a]['costo_unitario'];

                                if (js_costo_unitario_buv_emp <= 0) {

                                    showModError("Acabados (costo unitario barniz uv " + js_tipoGrabadoBUV_emp + ")");
                                }


                                var js_costo_tiro_buv_emp = js_respuesta[c][a]['costo_tot_proceso'];
                                js_costo_tiro_buv_emp     = js_costo_tiro_buv_emp;

                                if (js_tipoGrabadoBUV_emp === undefined || js_LargoBUV_emp === undefined || js_AnchoBUV_emp === undefined || js_costo_unitario_buv_emp === undefined || js_costo_tiro_buv_emp === undefined) {

                                    console.log('(5379) Buscando barniz agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoBUV_emp +'</td><td>Tamaño: '+ js_LargoBUV_emp +'x'+ js_AnchoBUV_emp +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_buv_emp +'</td><td>$'+ js_costo_tiro_buv_emp +'<input type="hidden" class="prices" value="'+ js_costo_tiro_buv_emp +'"></td></tr><tr><td colspan="2"></td></tr>';

                                    jQuery214('#table_proc_BarnizUV').append(acabadoTr);

                                    $('#tabla_view_acabados').show();   // donde esta este id?

                                    $('#proceso_barnizuv_M1').show();

             

                                    var parteresumen;
                                    var js_costo_tiro_lam_emp = js_respuesta[c][a]['costo_tot_proceso'];
                                
                                    js_costo_tiro_lam_emp = js_costo_tiro_lam_emp;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }
                            }


                            // Acabados Corte Laser (desarrollar)
                            if (c === 'Laser' || c === 'LaserFcaj' || c === 'LaserFcar' || c === 'LaserG') {

                                var js_tipoGrabadoLaser = js_respuesta[c][a]['tipo_grabado'];
                                var js_LargoLaser       = js_respuesta[c][a]['Largo'];
                                var js_AnchoLaser       = js_respuesta[c][a]['Ancho'];

                                var js_costo_unitario_Laser_emp = js_respuesta[c][a]['costo_unitario'];
                                

                                if (js_costo_unitario_Laser_emp <= 0) {

                                    showModError("Acabados (costo unitario Corte Laser " + js_costo_unitario_BarnizUV_emp + ")");
                                }


                                var js_costo_Laser_emp = parseFloat(js_respuesta[c][a]['costo_tot_proceso']);
                                js_costo_Laser_emp     = js_costo_Laser_emp.toFixed(2);


                                if (js_tipoGrabadoLaser === undefined || js_costo_unitario_Laser_emp === undefined || js_costo_Laser_emp === undefined) {

                                    console.log('(5450) Buscando Corte Laser agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoLaser +'</td><td>Tamaño: '+ js_LargoLaser + 'x' + js_AnchoLaser +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_Laser_emp +'</td><td>$'+ js_costo_Laser_emp +'<input type="hidden" class="prices" value="'+ js_costo_unitario_Laser_emp +'"></td></tr><tr><td colspan="2"></td></tr>';
                                    //pendienteeeeeeeeee eliminar o vaciar la tabla para uv y laser
                                    jQuery214('#table_proc_Laser').append(acabadoTr);

                                    $('#tabla_view_acabados').show();   // donde esta este id?

                                    $('#proceso_laser_M1').show();


                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ js_costo_Laser_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_Laser_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ js_costo_Laser_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_Laser_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ js_costo_Laser_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_Laser_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ js_costo_Laser_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_Laser_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }

                            }


                            // Acabados Pegados Especiales (desarrollar)
                            if (c === 'Pegados Especiales') {

                                var js_tipoGrabadoLaser = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoLaser       = js_respuesta[c][a]['Largo'];
                                var js_AnchoLaser       = js_respuesta[c][a]['Ancho'];

                            }


                            // Acabados Retractilado (desarrollar)
                            if (c === 'Retractilado') {

                                var js_tipoGrabadoLaser = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoLaser       = js_respuesta[c][a]['Largo'];
                                var js_AnchoLaser       = js_respuesta[c][a]['Ancho'];

                            }
                        }
                    }


                // (MERMAS)
                    $('#table_mermas_tr').empty();

                    var respuestamermas;

                    var js_color_parte;

                    for (c in js_respuesta) {

                        respuestamermas = js_respuesta[c];

                        //titulos nombre parte
                        if (c == 'OffEmp' || c == 'SerEmp' || c == 'DigEmp' || c == 'Laminado' || c == 'HotStamping' || c == 'Grabado' || c == 'Suaje' || c == 'Barniz UV' || c == 'Corte Laser') {

                            js_parte_nombre = "Empalme del Cajón";

                            js_color_parte  = '<td style="background: paleturquoise;">E</td>';
                        }


                        if (c == 'OffFCaj' || c == 'SerFCaj' || c == 'DigFCaj' || c == 'LaminadoFcaj' || c == 'HotStampingFcaj' || c == 'GrabadoFcaj' || c == 'SuajeFcaj') {

                            js_parte_nombre = "Forro del Cajón";

                            js_color_parte  = '<td style="background: thistle;">Fj</td>';
                        }


                        if (c == 'OffFCar' || c == 'SerFCar' || c == 'DigFCar' || c == 'LaminadoFcar' || c == 'HotStampingFcar' || c == 'GrabadoFcar' || c == 'SuajeFcar') {

                            js_parte_nombre = "Forro de la Cartera";

                            js_color_parte  = '<td style="background: wheat;">Fr</td>';
                        }


                        if (c == 'OffG' || c == 'SerG' || c == 'DigG' || c == 'LaminadoG' || c == 'HotStampingG' || c == 'GrabadoG' || c == 'SuajeG') {

                            js_parte_nombre = "Guarda";

                            js_color_parte  = '<td style="background: # a5e8a5;">G</td>';
                        }


                        for (a in respuestamermas) {

                            if (c === "OffEmp" || c === "SerEmp" || c === "DigEmp" 
                                || c === "OffFCaj" || c === "SerFCaj" || c === "DigFCaj"

                                || c === "OffFCar" || c === "SerFCar" || c === "DigFCar"

                                || c === "OffG" || c === "SerG" || c === "DigG"

                                || c == 'Laminado' || c == 'HotStamping' || c == 'Grabado' 
                                || c == 'Suaje' 

                                || c == 'OffFCaj' || c == 'SerFCaj' || c == 'DigFCaj' 
                                || c == 'LaminadoFcaj' || c == 'HotStampingFcaj' 
                                || c == 'GrabadoFcaj' || c == 'SuajeFcaj'

                                || c == 'OffFCar' || c == 'SerFCar' || c == 'DigFCar' 
                                || c == 'LaminadoFcar' || c == 'HotStampingFcar' 
                                || c == 'GrabadoFcar' || c == 'SuajeFcar' 

                                || c == 'OffG' || c == 'SerG' || c == 'DigG' 
                                || c == 'LaminadoG' || c == 'HotStampingG' 
                                || c == 'GrabadoG' || c == 'SuajeG'
                                ) {

                                var js_tiraje_mm           = js_respuesta[c][a]['cantidad'];
                                var js_merma_min_mm        = js_respuesta[c][a]['mermas']['merma_min']; //minima
                                var js_merma_adic_mm       = js_respuesta[c][a]['mermas']['merma_adic']; // adicional
                                var js_merma_tot_mm        = js_respuesta[c][a]['mermas']['merma_tot']; // total merma
                                var js_costo_unit_merma_mm = js_respuesta[c][a]['mermas']['costo_unit_papel_merma'];
                                var js_costo_unit_merma_2m = js_respuesta[c][a]['mermas']['costo_unit_merma'];
                                var js_costo_tot_merma_mm  = js_respuesta[c][a]['mermas']['costo_tot_pliegos_merma'];


                                // Offset
                                if (c === "OffEmp" || c === "OffFCaj" || c === "OffFCar" || c === "OffG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Offset</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "OffEmp") {

                                        parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "OffFCaj") {

                                        parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "OffFCar") {

                                       parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "OffG") {

                                        parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //digital
                                if (c === "DigEmp" || c === "DigFCaj" || c === "DigFCar" || c === "DigG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Digital</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "DigEmp") {

                                        parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "DigFCaj") {

                                        parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "DigFCar") {

                                       parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "DigG") {

                                        parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //serigrafia
                                if (c === "SerEmp" || c === "SerFCaj" || c === "SerFCar" || c === "SerG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Serigrafia</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "SerEmp") {

                                        parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SerFCaj") {

                                        parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SerFCar") {

                                       parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SerG") {

                                        parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //Laminado
                                if (c === "Laminado" || c === "LaminadoFcaj" || c === "LaminadoFcar" || c === "LaminadoG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Laminado</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "Laminado") {

                                        parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "LaminadoFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "LaminadoFcar") {

                                       parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "LaminadoG") {

                                        parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //HotStamping
                                if (c === "HotStamping" || c === "HotStampingFcaj" || c === "HotStampingFcar" || c === "HotStampingG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>HotStamping</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "HotStamping") {

                                        parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "HotStampingFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "HotStampingFcar") {

                                       parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "HotStampingG") {

                                        parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }

                                //Grabado
                                if (c === "Grabado" || c === "GrabadoFcaj" || c === "GrabadoFcar" || c === "GrabadoG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Grabado</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "Grabado") {

                                        parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "GrabadoFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "GrabadoFcar") {

                                       parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "GrabadoG") {

                                        parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }

                                //Suaje
                                if (c === "Suaje" || c === "SuajeFcaj" || c === "SuajeFcar" || c === "SuajeG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Suaje</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                                    if (c == "Suaje") {

                                        parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SuajeFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SuajeFcar") {

                                       parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SuajeG") {

                                        parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }

                                jQuery214('#table_mermas_tr').append(mermastr);
                            }
                        }
                    }


                // BANCOS
                    $('#bancos').hide();
                    $('#tabla_bancos').empty();
                    $('#resumenBancos').empty();

                    if(js_respuesta['Bancos']) {

                        var titulo = '<tr><td><b>Bancos</b></td><td></td><td></td><td></td></tr>';

                        $('#resumenBancos').append(titulo);

                        for(var cont = 0; cont < js_respuesta['Bancos'].length; cont++) {

                            tr = '<tr><td>' + js_respuesta['Bancos'][cont]['Tipo_banco'] +'</td><td>' + js_respuesta['Bancos'][cont]['Suaje'] + '</td><td>$' + js_respuesta['Bancos'][cont]['costo_unit_banco'].toFixed(2) +'<td>' + js_respuesta['Bancos'][cont]['costo_bancos'].toFixed(2) + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ js_respuesta['Bancos'][cont]['costo_bancos'] +'"></td></tr>';

                            $('#tabla_bancos').append(tr);
                            
                            var resumen = '<tr><td></td><td>' + js_respuesta['Bancos'][cont]['Tipo_banco'] +'</td><td></td><td>$'+ js_respuesta['Bancos'][cont]['costo_bancos'] +'<input type="hidden" class="pricesresumenbancos" value="'+ js_respuesta['Bancos'][cont]['costo_bancos'].toFixed(2) +'"></td><td></td></tr>';

                            $('#resumenBancos').append(resumen);

                        }

                        
                        $('#resumenBancos').append("<tr><td></td><td></td><td></td><td>$" + js_respuesta['costo_bancos'] + "</td></tr>");
                        $('#bancos').show();
                    }

                //CIERRES
                    $('#divCierres').hide();
                    $('#tabla_cierres').empty();
                    $('#resumenCierres').empty();

                    if(js_respuesta['Cierres']) {

                        var titulo = '<tr><td><b>Cierres</b></td><td></td><td></td><td></td></tr>';
                        $('#resumenCierres').append(titulo);

                        for(var cont = 0; cont < js_respuesta['Cierres'].length; cont++) {

                            var largoAncho = "N/A";
                            var color      = "N/A";
                            var tipo       = "N/A";


                            if( js_respuesta['Cierres'][cont]['color'] != null ) {

                                color = js_respuesta['Cierres'][cont]['color'];
                            }


                            if( js_respuesta['Cierres'][cont]['largo'] != null ) {

                                largoAncho = js_respuesta['Cierres'][cont]['largo'] + "x" + js_respuesta['Cierres'][cont]['ancho'];
                            }


                            if( js_respuesta['Cierres'][cont]['tipo'] != null ) {

                                tipo = js_respuesta['Cierres'][cont]['tipo'];
                            }

                            tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + js_respuesta['Cierres'][cont]['Tipo_cierre'] +'</td><td>$' + js_respuesta['Cierres'][cont]['costo_unitario'].toFixed(2) +'<td>' + js_respuesta['Cierres'][cont]['costo_cierre'].toFixed(2) + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ js_respuesta['Cierres'][cont]['costo_cierre'] +'"></td></tr>';

                            $('#tabla_cierres').append(tr);

                            var resumen = '<tr><td></td><td>' + js_respuesta['Cierres'][cont]['Tipo_cierre'] +'</td><td>$'+ js_respuesta['Cierres'][cont]['costo_cierre'] +'<input type="hidden" class="pricesresumenbancos" value="'+ js_respuesta['Cierres'][cont]['costo_cierre'].toFixed(2) +'"></td><td></td></tr>';
                            $('#resumenCierres').append(resumen);
                        }

                        $('#resumenCierres').append("<tr><td></td><td></td><td></td><td>$" + js_respuesta['costo_cierres'] + "</td></tr>");

                        $('#divCierres').show();
                    }

                //ACCESORIOS
                    $('#divAccesorios').hide();
                    $('#tabla_accesorios').empty();
                    $('#resumenAccesorios').empty();


                    if(js_respuesta['Accesorios']) {

                        var titulo = '<tr><td><b>Accesorios</b></td><td></td><td></td><td></td></tr>';
                        $('#resumenAccesorios').append(titulo);

                        for(var cont = 0; cont < js_respuesta['Accesorios'].length; cont++) {

                            var largoAncho = "N/A";
                            var color = "N/A";
                            var tipo = "N/A";


                            if( js_respuesta['Accesorios'][cont]['Color'] != null ){

                                color = js_respuesta['Accesorios'][cont]['Color'];
                            }


                            if( js_respuesta['Accesorios'][cont]['Largo'] != null ){

                                largoAncho = js_respuesta['Accesorios'][cont]['Largo'] + "x" + js_respuesta['Accesorios'][cont]['Ancho'];
                            }


                            if( js_respuesta['Accesorios'][cont]['Tipo'] != null ){

                                tipo = js_respuesta['Accesorios'][cont]['Tipo'];
                            }

                            tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + js_respuesta['Accesorios'][cont]['Tipo_accesorio'] +'</td><td>$' + js_respuesta['Accesorios'][cont]['costo_unit_accesorio'].toFixed(2) +'<td>' + js_respuesta['Accesorios'][cont]['costo_accesorios'].toFixed(2) + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ js_respuesta['Accesorios'][cont]['costo_accesorios'] +'"></td></tr>';

                            $('#tabla_accesorios').append(tr);

                            var resumen = '<tr><td></td><td>' + js_respuesta['Accesorios'][cont]['Tipo_accesorio'] +'</td><td></td><td>$'+ js_respuesta['Accesorios'][cont]['costo_accesorios'] +'<input type="hidden" class="pricesresumenbancos" value="'+ js_respuesta['Accesorios'][cont]['costo_accesorios'].toFixed(2) +'"></td></tr>';

                            $('#resumenAccesorios').append(resumen);
                        }

                        $('#resumenAccesorios').append("<tr><td></td><td></td><td></td><td>$" + js_respuesta['costo_accesorios'] + "</td></tr>");

                        $('#divAccesorios').show();
                    }

                //DESCUENTOSMIO
                    $("#tdSubtotalCaja").html("$" + js_respuesta['costo_subtotal'].toFixed(2));

                    $("#UtilidadDrop").html("$" + js_respuesta['Utilidad'].toFixed(2));
                    
                    $("#Totalplus").html("$" + js_respuesta['costo_odt'].toFixed(2));
                    
                    $("#IVADrop").html("$" + js_respuesta['iva'].toFixed(2));
                    
                    $("#ComisionesDrop").html("$" + js_respuesta['comisiones'].toFixed(2));
                    
                    $("#IndirectoDrop").html("$" + js_respuesta['indirecto'].toFixed(2));
                    
                    $("#VentasDrop").html("$" + js_respuesta['ventas'].toFixed(2));

                    $("#ISRDrop").html("$" + js_respuesta['ISR'].toFixed(2));
                    
                    
                    $("#DescuentoDrop").html("$" + js_respuesta['descuento'].toFixed(2));


                //final

                    var parteresumen;

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalEmpalme">$0.00</td></tr>';

                    jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

                    collectTotEmpalme();

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcajon">$0.00</td></tr>';

                    jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen

                    collectTotFcajon();

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcartera">$0.00</td></tr>';

                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

                    collectTotFcartera();

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalGuarda">$0.00</td></tr>';

                    jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen

                    collectTotGuarda();

                   parteresumen = '<tr><td></td><td></td><td><b>Subtotal:</b></td><td class="grand-total"><b>$' + js_respuesta['costo_subtotal'].toFixed(2) +'</b></td></tr><tr><td></td><td></td><td>Utilidad: </td><td id="UtilidadResumen">$' + js_respuesta['Utilidad'].toFixed(2) + '</td></tr><tr><td></td><td></td><td>IVA:</td><td id="IVAResumen">$' + js_respuesta['iva'].toFixed(2) + '</td></tr><tr><td></td><td></td><td>ISR: </td><td id="ISResumen">$' + js_respuesta['ISR'].toFixed(2) + '</td></tr><tr><td></td><td></td><td>Comisiones: </td><td id="ComisionesResumen">$ ' + js_respuesta['comisiones'].toFixed(2) + '</td></tr><tr><td></td><td></td><td>% Indirecto: </td><td id="IndirectoResumen">$' + js_respuesta['indirecto'].toFixed(2) + '</td></tr><tr><td></td><td></td><td>Ventas: </td><td id="ventaResumen">$' + js_respuesta['ventas'].toFixed(2) + '</td></tr><tr><td></td><td></td><td>Descuento: </td><td id="descuentoResumen">$' + js_respuesta['descuento'].toFixed(2) + '</td></tr><tr><tr><td></td><td></td><td><b>Total: </b></td><td id="TotalResumen"><b>$' + js_respuesta['costo_odt'].toFixed(2) + '</b></td></tr>';

                        //<tr><td></td><td></td><td>Descuento: </td><td id="DescuentoResumen" style="color: red;">$0.00</td></tr>

                    jQuery214('#resumenOtros').append(parteresumen); //imprime para el resumen

                    $("#subForm").prop("disabled", false);
            })
            .fail(function(response) {

                console.log('(6010) Error. Revisa.');

                $("#subForm").prop("disabled", true);
            });
        }
    });


    $("#btnModCorrecto").click( function(){

        location.href="<?=URL?>cotizador/getCotizaciones/";

        $("#subForm").prop("disabled", true);
    });


    // graba en la Base de Datos
    $("#subForm2").click( function() {

        var grabar = "SI";

        var formData = $("#caja-form").serializeArray();

        var aCalculos_tmp = JSON.stringify(aCalculos, null, 4);
        var aCortes_tmp   = JSON.stringify(aCortes, null, 4);
        var aTr3_tmp      = JSON.stringify(aTr3, null, 4);

        // impresion
        var aImp_tmp     = JSON.stringify(aImp, null, 4);
        var aImpFCaj_tmp = JSON.stringify(aImpFCaj, null, 4);
        var aImpFCar_tmp = JSON.stringify(aImpFCar, null, 4);
        var aImpG_tmp    = JSON.stringify(aImpG, null, 4);


        // acababos
        var aAcb_tmp     = JSON.stringify(aAcb, null, 4);
        var aAcbFCaj_tmp = JSON.stringify(aAcbFCaj, null, 4);
        var aAcbFCar_tmp = JSON.stringify(aAcbFCar, null, 4);
        var aAcbG_tmp    = JSON.stringify(aAcbG, null, 4);


        // cierres
        var aCierres_tmp = JSON.stringify(aCierres, null, 4);


        // bancos
        var aBancos_tmp = JSON.stringify(aBancos, null, 4);


        // accesorios
        var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);

        var cliente        = parseInt(<?= $aJson['id_cliente']?>);
        var id_cliente_tmp = JSON.stringify(cliente, null, 4);

        formData.push({name: 'id_cliente', value: id_cliente_tmp});

        formData.push({name: 'aCalculos', value: aCalculos_tmp});   // calculadora
        formData.push({name: 'aCortes', value: aCortes_tmp});
        formData.push({name: 'aTr3', value: aTr3_tmp});             // mermas

        formData.push({name: 'aImp', value: aImp_tmp});
        formData.push({name: 'aImpFCaj', value: aImpFCaj_tmp});
        formData.push({name: 'aImpFCar', value: aImpFCar_tmp});
        formData.push({name: 'aImpG', value: aImpG_tmp});

        formData.push({name: 'aAcb', value: aAcb_tmp});
        formData.push({name: 'aAcbFCaj', value: aAcbFCaj_tmp});
        formData.push({name: 'aAcbFCar', value: aAcbFCar_tmp});
        formData.push({name: 'aAcbG', value: aAcbG_tmp});

        formData.push({name: 'aCierres', value: aCierres_tmp});
        formData.push({name: 'aBancos', value: aBancos_tmp});
        formData.push({name: 'aAccesorios', value: aAccesorios_tmp});

        // descuento
        formData.push({name: 'descuento_pctje', value: descuento});
        formData.push({name: 'grabar', value: grabar});

        
        $("#subForm").prop("disabled", true);

        formData.push({name: 'odt_anterior', value: "<?= $aJson['num_odt'] ?>"});

        $("#subForm").prop("disabled", true);
        
        var odt1 = $("#odt-1").val();

        var odtval = [];

        odtval.push({name: 'odt', value: odt1});

        formData.push({name: 'odt_nueva', value: odt1});

        var id_odt_anterior = $("#id_odt_anterior").val();

        formData.push({name: 'id_cot_odt_ant', value: id_odt_anterior});

        var modificar_odt = "SI";

        formData.push({name: 'modificar', value: modificar_odt});

        $.ajax({

            type:"POST",
            //async: false,
            //dataType: "json",
            //url: $('#caja-form').attr('action'),
            url: "<?php echo URL; ?>cotizador/actCajaAlmeja/",
            data: formData,
        })
        .done(function( response ) {

            console.log(response);

            try {
                
                var js_respuesta = JSON.parse( response );


                if ( js_respuesta == true) {

                    showModCorrecto("Los datos han sido guardados correctamente.");

                    //location.href="<?=URL?>cotizador/getCotizaciones/";
                } else {

                    showModError("");

                    $("#txtContenido").html("(6167) Error al grabar en la Base de Datos.");
                }
            } catch(e) {

                showModError("");

                $("#txtContenido").html("(6172) Error de parseo.");
            }
        })
        .fail(function(response) {

            console.log('(6177) Error. Revisa.');
        }); 
    });


    function showModError(proceso) {

        $("#txtContenido").html("No existe el costo para el proceso: " + proceso + " con este tiraje.");

        $('#modalError').modal({backdrop: 'static', keyboard: false});
    }


    function showModCorrecto(texto) {

        $("#txtContCorrecto").html(texto);

        $('#modalCorrecto').modal({backdrop: 'static', keyboard: false});
    }


    function showModErrorDigital(proceso) {

        $("#txtContenido").html(proceso);

        $('#modalError').modal({backdrop: 'static', keyboard: false});
    }
</script>


<!-- boton de impresiones y acabados -->
<script type="text/javascript">

    /* -------- Activa los div de los select impresiones ---------*/
    document.getElementById('miSelect').onchange = function(event) {

        var opcionact = document.getElementById('miSelect').value;


        if (opcionact == 'Offset') {

            $('#opImpresionOffset').show('slow');
            $('#opImpresionDigital').hide('slow');
            $('#opImpresionSerigrafia').hide('slow');
        }


        if (opcionact == 'Digital') {

            $('#opImpresionDigital').show('slow');
            $('#opImpresionOffset').hide('slow');
            $('#opImpresionSerigrafia').hide('slow');
        }


        if (opcionact == 'Serigrafia') {

            $('#opImpresionSerigrafia').show('slow');
            $('#opImpresionOffset').hide('slow');
            $('#opImpresionDigital').hide('slow');
        }
    }


    /* -------- Activa los div de los select acabados ----------- */
    document.getElementById('SelectAcEmp').onchange = function(event) {

        var opcionact = document.getElementById('SelectAcEmp').value;

        $('#opAcLaminadoEmp').hide('slow');
        $('#opAcHotStampingEmp').hide('slow');
        $('#opAcGrabadoEmp').hide('slow');
        $('#opAcEspecialesEmp').hide('slow');
        $('#opAcBarnizUVEmp').hide('slow');
        $('#opAcSuajeEmp').hide('slow');
        $('#opAcLaserEmp').hide('slow');
        $('#opAcBarUVEmp').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoEmp').show('normal');
        }


        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingEmp').show('normal');
        }


        if (opcionact == 'Grabado') {

            $('#opAcGrabadoEmp').show('normal');
        }


        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesEmp').show('normal');
        }


        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVEmp').show('normal');
        }


        if (opcionact == 'Suaje') {

            $('#opAcSuajeEmp').show('normal');
        }


        if (opcionact == 'Corte Laser') {

            $('#opAcLaserEmp').show('normal');
        }


        document.getElementById('SelectBarnizUVEmp').onchange = function(event) {

            var seleccion = document.getElementById('SelectBarnizUVEmp').value;


            if (seleccion == 'Registro Mate') {

                $('#opAcBarUVEmp').show('normal');
            }


            if (seleccion == 'Mate') {

                $('#opAcBarUVEmp').hide('normal');
            }


            if (seleccion == 'Brillante') {

                $('#opAcBarUVEmp').hide('normal');
            }


            if (seleccion == 'Registro Brillante') {

                $('#opAcBarUVEmp').show('normal');
            }
        }


        document.getElementById('SelectUbiGrabEmp').onchange = function(event) {

            var ubicacion = document.getElementById('SelectUbiGrabEmp').value;


            if (ubicacion == 'Lomo') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }


            if (ubicacion == 'Cierre') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }


            if (ubicacion == 'Tapa') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }


            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }


            if (ubicacion == 'Derecho') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }


            if (ubicacion == 'Fondo') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    function vacioModalAcabados() {

        document.getElementById('SelectAcEmp').value         = "selected";
        document.getElementById('SelectLaminadoEmp').value   = "selected";
        document.getElementById('SelectHSEmp').value         = "selected";
        document.getElementById('SelectColorHSEmp').value    = "selected";
        document.getElementById('SelectGrabEmp').value       = "selected";
        document.getElementById('SelectEspecialesEmp').value = "selected";
        document.getElementById('SelectBarnizUVEmp').value   = "selected";
        document.getElementById('SelectSuajeEmp').value      = "selected";
        document.getElementById('SelectLaserEmp').value      = "selected";

        document.getElementById('opAcLaminadoEmp').style.display    = "none";
        document.getElementById('opAcHotStampingEmp').style.display = "none";
        document.getElementById('opAcGrabadoEmp').style.display     = "none";
        document.getElementById('opAcEspecialesEmp').style.display  = "none";
        document.getElementById('opAcBarnizUVEmp').style.display    = "none";
        document.getElementById('opAcSuajeEmp').style.display       = "none";
        document.getElementById('opAcLaserEmp').style.display       = "none";
        document.getElementById('opAcBarUVEmp').style.display       = "none";

        document.getElementById('LargoLaser1').value = "1";
        document.getElementById('AnchoLaser1').value = "1";

    }


    function activarBtn() {

        /*$("#btnabrebancoemp").prop("disabled",false);
        $("#btnabreaccesorios").prop("disabled",false);
        $("#btnabrecierres").prop("disabled",false);*/
    }


    function desactivarBtn() {
        
        /*if( aImp.length == 0 && aImpFCaj.length == 0 && aImpFCar.length == 0 && aImpG.length == 0 && aAcb.length == 0 && aAcbFCaj.length == 0 && aAcbFCar.length == 0 && aAcbG.length == 0 ) {

            $("#btnabrebancoemp").prop("disabled",true);
            $("#btnabreaccesorios").prop("disabled",true);
            $("#btnabrecierres").prop("disabled",true);
        }*/
    }

    var divisionesImps="";
    var divisionesAcbs="";


    function divisionesImp(opcion) {

        divisionesImps=opcion;
    }


    function divisionesAcb(opcion) {

        divisionesAcbs=opcion;
    }


    $('#btnAcabados').click(function() {

        switch(divisionesAcbs){

            case "Empalme":

                saveBtnAcabados(aAcb,"listacabadosemp");
                
                break;
            case "forro_cajon":

                saveBtnAcabados(aAcbFCaj,"listacabadosfcajon");
                
                break;
            case "forro_cartera":

                saveBtnAcabados(aAcbFCar,"listacabadosfcartera");
                
                break;
            case "guarda":

                saveBtnAcabados(aAcbG,"listacabadosguarda");
            
                break;
        }
    });


    $("#btnImpresiones").click( function () {

        switch(divisionesImps){

            case "Empalme":

                saveBtnImpresiones(aImp,"listimpresiones");
                
                break;
            case "forro_cajon":

                saveBtnImpresiones(aImpFCaj,"listimpresionesfcajon");
                
                break;
            case "forro_cartera":

                saveBtnImpresiones(aImpFCar,"listimpresionesfcartera");
                
                break;
            case "guarda":

                saveBtnImpresiones(aImpG,"listimpresionesguarda");
                
                break;
        }
    });


    function saveBtnAcabados(arrPapeles, tabla) {
    

        var IDopAcb  = $("#SelectAcEmp option:selected").data('id');
        var opAcb    = $("#SelectAcEmp option:selected").text();


        //para laminado
        var tipoLaminado   = $("#SelectLaminadoEmp option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoEmp option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSEmp option:selected").text();
        var idtipoHS        = $("#SelectHSEmp option:selected").data('id');
        var ColorHS         = $("#SelectColorHSEmp option:selected").text();
        var idcolorHS       = $("#SelectHSEmp option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_ver').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_ver').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabEmp option:selected").text();
        var idtipoGrabado = $("#SelectHSEmp option:selected").data('id');
        var LargoGrab     = document.getElementById('LargoGrab').value;
        var AnchoGrab     = document.getElementById('AnchoGrab').value;
        var ubicacionGrab = $("#SelectUbiGrabEmp option:selected").text();

        //para suaje
        var tipoSuaje   = $("#SelectSuajeEmp option:selected").text();
        var idtipoSuaje = $("#SelectHSEmp option:selected").data('id');
        var LargoSuaje  = document.getElementById('LargoSuaje').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje').value;

        //para laser
        var tipoLaser   = $("#SelectLaserEmp option:selected").text();
        var idtipoLaser = $("#SelectHSEmp option:selected").data('id');
        var LargoLaser_s  = document.getElementById('LargoLaser1').value;
        
        var AnchoLaser_s  = document.getElementById('AnchoLaser1').value;


        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVEmp option:selected").text();
        var idtipoBarnizUV = $("#SelectHSEmp option:selected").data('id');
        var LargoBarnizUV  = document.getElementById('LargoBarUVEmp').value;
        var AnchoBarnizUV  = document.getElementById('AnchoBarUVEmp').value;

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesEmp option:selected").text();
        var idtipoEspeciales = $("#SelectHSEmp option:selected").data('id');


        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoEmp').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcLamEmp"><td style="text-align: left;" class="textAcbEmp">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipoLaminado +'<input id="tipoLaminadoEmp" name="tipoLaminadoEmp" type="hidden" value="'+ idtipoLaminado +'"></td><td class="' + tabla + ' img_delete"></td></tr>';


                arrPapeles.push({"Tipo_acabado": opAcb, "IDopAcb": IDopAcb, "tipoGrabado": tipoLaminado, "idtipoLaminado": idtipoLaminado});


                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSEmp').value;
            var nulo2 = document.getElementById('SelectColorHSEmp').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcHSEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td class="tipoAcabadoHS" style="display: none;" >'+ tipoGrabadoHS +'<input id="tipoAcabadoHS" name="tipoAcabadoHS" type="hidden" value="'+ idtipoHS +'"></td><td class="idcolorHS" style="display: none;" >' + idcolorHS + '<input id="idcolorHS" name="idcolorHS" type="hidden" value="'+ idcolorHS +'"></td><td class="ColorHS" style="display: none;" >' + ColorHS + '<input id="ColorHS" name="ColorHS" type="hidden" value="'+ ColorHS +'"></td><td class="LargoHS" style="display: none;">'+ LargoHS_ver +'<input id="LargoHS" name="LargoHS" type="hidden" value="'+ LargoHS_ver +'"></td><td class="AnchoHS" style="display: none;">'+ AnchoHS_ver +'<input id="AnchoHS" name="AnchoHS" type="hidden" value="'+ AnchoHS_ver +'"></td><td class="' + tabla + ' img_delete"></td></tr>';

                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);

                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});


                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabEmp').value;
            var nulo2 = document.getElementById('SelectUbiGrabEmp').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcGrabEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td class="tipoGrabadoG" style="display: none;">'+ tipoGrabadoG +'<input id="tipoGrabadoG" name="tipoGrabadoG" type="hidden" value="'+ idtipoGrabado +'"></td><td class="LargoGrab" style="display: none;">'+ LargoGrab +'</td><td class="AnchoGrab" style="display: none;">'+ AnchoGrab +'</td><td class="ubicacionGrab" style="display: none;">'+ ubicacionGrab +'<input id="ubicacionGrab" name="ubicacionGrab" type="hidden" value="'+ ubicacionGrab +'"></td><td class="' + tabla + ' img_delete"></td></tr>';


                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});


                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcSuajeEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="' + tabla + ' img_delete"></td></tr>';


                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb === 'Corte Laser')  {

            var nulo1 = document.getElementById('SelectLaserEmp').value;

            if (nulo1 == 'selected')  {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var LargoLaser = parseInt(LargoLaser_s, 10);
                var AnchoLaser = parseInt(AnchoLaser_s, 10);
                var acb = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipoLaser + ', Medidas: ' + LargoLaser + 'x' +  AnchoLaser + '</span></td><td class="tipoLaser" style="display: none;">' + tipoLaser + '<input id="tipoLaser" name="tipoLaser" type="hidden" value="' + idtipoLaser + '"></td><td class="LargoLaser" style="display: none;">' + LargoLaser + '<input id="LargoLaser" name="LargoLaser" type="hidden" value="' + LargoLaser + '"></td><td class="AnchoLaser" style="display: none;">' + AnchoLaser + '<input id="AnchoLaser" name="AnchoLaser" type="hidden" value="' + AnchoLaser + '"></td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaser, "LargoLaser": LargoLaser, "AnchoLaser": AnchoLaser});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Barniz UV')  {

            var nulo1 = document.getElementById('SelectBarnizUVEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                if (tipoBarnizUV === 'undefined' || tipoBarnizUV === 'null') {

                    tipoBarnizUV = '';    
                }

                if(tipoBarnizUV == "Registro Mate" || tipoBarnizUV == "Registro Brillante") {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + ', Medidas: ' + LargoBarnizUV + 'x' + AnchoBarnizUV +'</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + LargoBarnizUV + '<input id="LargoBarnizUVEmp" name="LargoBarnizUVEmp" type="hidden" value="' + LargoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + AnchoBarnizUV + '<input id="AnchoBarnizUVEmp" name="AnchoBarnizUVEmp" type="hidden" value="' + AnchoBarnizUV + '"></td><td class="' + tabla + ' img_delete"></td></tr>';

                    arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": LargoBarnizUV, "Ancho": AnchoBarnizUV});
                } else {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="' + tabla + ' img_delete"></td></tr>';

                    arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": null, "Ancho": null});
                }

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Pegados Especiales') {

            var nulo1 = document.getElementById('SelectEspecialesEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcEspecialesEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoEspeciales +'</span></td><td class="tipoEspeciales" style="display: none">'+ tipoEspeciales +'<input id="tipoEspeciales" name="tipoEspeciales" type="hidden" value="'+ idtipoEspeciales +'"></td><td class="' + tabla + ' img_delete"></td></tr>';

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        }

        activarBtn();
    }


    function saveBtnImpresiones(arrpapeles, tabla) {


        var IDopImp  = $("#miSelect option:selected").data('id');
        var opImp    = $("#miSelect option:selected").text();
        var precio   = $("#miSelect option:selected").data('precio'); //precio unitario


        //para Offset
        var tipoOffset     = $("#SelectImpTipoOff option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOff option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOff option:selected").data('id');
        var tintassel      = document.getElementById('tintasO').value;


        //para digital
        var tipoDig   = $("#SelectImpDigital option:selected").text();
        var idtipoDig = $("#SelectImpDigital option:selected").data('id');


        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeri option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeri option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeri option:selected").data('id');
        var tintassel2     = document.getElementById('tintasS').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opImp == 'Offset') {

            var nuloo = document.getElementById('SelectImpTipoOff').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp').innerHTML = "";

                var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none">'+ IDopImp +'<input id="IDopImpOfEmp" name="IDopImpOfEmp" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel +'<input id="tintasselOfEmp" name="tintasselOfEmp" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset +'<input id="tipoOffEmp" name="tipoOffEmp" type="hidden" value="'+ idtipoOff +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                arrpapeles.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresiones').modal('hide');

                jQuery214('#' + tabla).append(imp);

                vacioModalImpresiones();
            }
        }

        if (opImp == 'Digital') {

            /*var nuloo = document.getElementById('SelectImpDigital').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp').innerHTML = "";

                var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none"><input id="IDopImpDiEmp" name="IDopImpDiEmp" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipoDig + '</span></td><td class="tipoDig" style="display: none;">'+ tipoDig +'<input id="tipoDigEmp" name="tipoDigEmp" type="hidden" value="'+ idtipoDig +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                arrpapeles.push({"Tipo_impresion": opImp, "tipo_digital": tipoDig, "idtipoDig": idtipoDig});

                $('#Impresiones').modal('hide');

                jQuery214('#' + tabla).append(imp);

                vacioModalImpresiones();

            }*/
            var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td class="CellWithComment">...<span class="CellComment">Se agregó una impresión digital</span></td><td class="' + tabla +' img_delete"></td></tr>';

            arrpapeles.push({"Tipo_impresion": opImp});

            $('#Impresiones').modal('hide');

            jQuery214('#' + tabla).append(imp);

            vacioModalImpresiones();
        }

        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeri').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp').innerHTML = "";

                var imp  = '<tr id="ImpSerEmp"><td class="textImp">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpSerEmp" name="IDopImpSerEmp" style="display:none" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel2 +'<input id="tintasselSerEmp" name="tintasselSerEmp" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeri" style="display: none;">'+ tipoSeri +'<input id="tipoSeriEmp" name="tipoSeriEmp" type="hidden" value="'+ idtipoSeri +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                arrpapeles.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresiones').modal('hide');

                jQuery214('#' + tabla).append(imp);

                vacioModalImpresiones();
            }
        }

        //console.log(arrpapeles);

        activarBtn();
    }


    function delBtnAcabados(arrPapeles, tabla) {

        var tipo_acabado = "";

        $("#" + tabla + " tr").each(function(row, tr) {

            var tipoGrabadoHS = "";
            var ColorHS       = "";
            var LargoHS_str   = "";
            var AnchoHS_str   = "";
            var LargoHS       = 0;
            var AnchoHS       = 0;

            var tipoGrabado = "";
            var Largo_str   = "";
            var Ancho_str   = "";
            var ubicacion   = "";
            var Largo       = 0;
            var Ancho       = 0;


            tipo_acabado = $(tr).find('td:eq(0)').text();

            if (tipo_acabado == "HotStamping") {

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(4)').text();
                LargoHS_str   = $(tr).find('td:eq(5)').text();
                AnchoHS_str   = $(tr).find('td:eq(6)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Laminado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();

                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "Suaje") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }


            if (tipo_acabado == "Barniz UV") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo       = parseInt($(tr).find('td:eq(3)').text());
                Ancho       = parseInt($(tr).find('td:eq(4)').text());

                if(tipoGrabado == "Registro Mate" || tipoGrabado == "Registro Brillante"){

                    arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho});

                } else {

                    arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": null, "Ancho": null});
                }
                
            }


            if (tipo_acabado == "Corte Laser") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoLaser": Largo, "AnchoLaser": Ancho});
            }

        });

        desactivarBtn();
    }


    function delBtnImpresiones(arrPapeles, tabla) {

        var TableData       = "";
        var tipo_imp_offset = "";

        $("#" + tabla + " tr").each(function(row, tr) {

            var opImp   = $(tr).find('td:eq(0)').text(); // IDopImp
            var IDopImp = parseInt($(tr).find('td:eq(1)').text());

            var tintassel_str = $(tr).find('td:eq(3)').text();
            var tintassel     = parseInt(tintassel_str, 10);
            var tipo          = $(tr).find('td:eq(4)').text();

            if (opImp == 'Offset') {

                var idtipoOff = parseInt($("#tipoOffEmp").val());

                arrPapeles.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoOff": idtipoOff});
            } else if (opImp == "Digital") {

                /*var tipo    = $(tr).find('td:eq(3)').text();
                var tipoDig = $(tr).find('td:eq(2)').text();

                var idtipoDig_str = $("#tipoDigFCajon").val();
                var idtipoDig     = parseInt(idtipoDig_str, 10);

                arrPapeles.push({"Tipo_impresion": opImp, "tipo_digital": tipo, "idtipoDig": idtipoDig});*/
                arrPapeles.push({"Tipo_impresion": opImp});

            } else if (opImp == "Serigrafia") {

                var idtipoSeri = parseInt($("#tipoSeriEmp").val());

                arrPapeles.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});
            }
        });
        desactivarBtn();
    }


    function vacioModalBancos(){

        document.getElementById('SelectBanEmp').value               = "selected";
        document.getElementById('llevasuajemodBanco').style.display = "none";
        document.getElementById('SelectSuajeBanco').value           = "No";

        document.getElementById('LargoBanco').value       = 1;
        document.getElementById('AnchoBanco').value       = 1;
        document.getElementById('ProfundidadBanco').value = 1;
    }


    function vacioModalImpresiones() {

        document.getElementById('miSelect').value = "selected";
        document.getElementById('SelectImpTipoOff').value = "selected";
        document.getElementById('SelectImpTipoSeri').value = "selected";
        document.getElementById('opImpresionSerigrafia').style.display = "none";
        document.getElementById('opImpresionOffset').style.display = "none";
        document.getElementById('opImpresionDigital').style.display = "none";
    }


    $(document).on("click", ".listacabadosemp", function() {

        $(this).closest('tr').remove();

        aAcb = [];

        delBtnAcabados(aAcb, "listacabadosemp");
    });


    $(document).on("click", ".listacabadosfcajon", function() {

        $(this).closest('tr').remove();

        aAcbFCaj = [];

        delBtnAcabados(aAcbFCaj, "listacabadosfcajon");
    });


    $(document).on("click", ".listacabadosfcartera", function() {

        $(this).closest('tr').remove();

        aAcbFCar = [];

        delBtnAcabados(aAcbFCar, "listacabadosfcartera");
    });


    $(document).on("click", ".listacabadosguarda", function() {

        $(this).closest('tr').remove();

        aAcbG = [];

        delBtnAcabados(aAcbG, "listacabadosguarda");
    });


    jQuery214(document).on("click", ".listimpresiones", function () {

        $(this).closest('tr').remove();

        aImp = [];

        delBtnImpresiones(aImp, "listimpresiones");
    });


    jQuery214(document).on("click", ".listimpresionesfcajon", function () {

        $(this).closest('tr').remove();

        aImpFCaj = [];

        delBtnImpresiones(aImpFCaj, "listimpresionesfcajon");
    });


    jQuery214(document).on("click", ".listimpresionesfcartera", function () {

        $(this).closest('tr').remove();

        aImpFCar = [];

        delBtnImpresiones(aImpFCar, "listimpresionesfcartera");
    });


    jQuery214(document).on("click", ".listimpresionesguarda", function () {

        $(this).closest('tr').remove();

        aImpG = [];

        delBtnImpresiones(aImpG, "listimpresionesguarda");
    });


    jQuery214(document).on("click", ".delete", function () {

        $(this).closest('tr').remove();
    });
</script>


<!-- checa papel -->
<script>

    $("#btnCheckPaper").click( function(){

        var chk   = $("#btnCheckPaper").prop("checked");
        var texto = $("#interior_cajon_chosen span").html();

        if(chk){

            $("#exterior_cajon_chosen span").html(texto);
            $("#exterior_cartera_chosen span").html(texto);
            $("#interior_cartera_chosen span").html(texto);

            $("#exterior_cajon option[data-nombre='" + texto +"']").prop("selected",true);
            $("#exterior_cartera option[data-nombre='" + texto +"']").prop("selected",true);
            $("#interior_cartera option[data-nombre='" + texto +"']").prop("selected",true);

            papel_elegido = true;

            $("#interior_cajon").addClass('paper_selected');
            $("#exterior_cartera").addClass('paper_selected');
            $("#interior_cartera").addClass('paper_selected');
            $("#exterior_cajon").addClass('paper_selected');

            $('#papers_config_button').hide();
        } else {

            $("#exterior_cajon_chosen span").html("Elegir tipo de papel");
            $("#exterior_cartera_chosen span").html("Elegir tipo de papel");
            $("#interior_cartera_chosen span").html("Elegir tipo de papel");

            $("#exterior_cajon option[data-nombre='" + texto +"']").prop("selected",false);
            $("#exterior_cartera option[data-nombre='" + texto +"']").prop("selected",false);
            $("#interior_cartera option[data-nombre='" + texto +"']").prop("selected",false);

            $("#exterior_cajon").val(null);
            $("#exterior_cartera").val(null);
            $("#interior_cartera").val(null);

            papel_elegido = false;

            $("#interior_cajon").removeClass('paper_selected');
            $("#exterior_cartera").removeClass('paper_selected');
            $("#interior_cartera").removeClass('paper_selected');
            $("#exterior_cajon").removeClass('paper_selected');

            $('#papers_config_button').show();
        }   
    });
</script>


<!-- cierres -->
<script>

    jQuery214(document).on("click", ".listcierres", function () {

        $(this).closest('tr').remove();

        row_listacierres = 0;
        row_listacierres = $('#listcierres > tr').length;

        aCierres = [];

        var oTable = document.getElementById('cieTable');

        var rowLength = oTable.rows.length;

        var tipo_cierre = "";

        $("#cieTable tr").each(function(row, tr) {

            var tipo_cierre = "";
            var numpares    = 1;

            var numpares_str = "";
            var Largo_str    = "";
            var Ancho_str    = "";
            var tipo         = "";

            var Largo = 0;
            var Ancho = 0;

            tipo_cierre = $(tr).find('td:eq(0)').text();


            if (tipo_cierre == "Iman") {

                numpares_str = $(tr).find('td:eq(2)').text();
                numpares     = parseInt(numpares_str, 10);

                aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
            }


            // falta corregir el modal de Liston
            if (tipo_cierre == "Liston") {

                tipo_cierre = $(tr).find('td:eq(0)').text();

                aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": 1, "largo": null, "ancho": null, "tipo": null, "color": null});
            }


            if (tipo_cierre == "Marialuisa") {

                aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
            }


            if (tipo_cierre == "Suaje calado") {

                Largo_str = $(tr).find('td:eq(2)').text();
                Ancho_str = $(tr).find('td:eq(3)').text();
                tipo      = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": Largo, "ancho": Ancho, "tipo": tipo, "color": null});
            }


            if (tipo_cierre == "Velcro") {

                numpares_str = $(tr).find('td:eq(2)').text();
                numpares     = parseInt(numpares_str, 10);

                aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
            }
        });
    });
</script>


<!-- banco -->
<script>

    jQuery214(document).on("click", ".listbancoemp", function () {

        $(this).closest('tr').remove();

        row_listabancos = 0;
        row_listabancos = $('#listbancoemp > tr').length;

        aBancos = [];

        var oTable = document.getElementById('banTable');

        var rowLength = oTable.rows.length;

        var tipo_banco = "";

        $("#listbancoemp tr").each(function(row, tr) {

            var largo       = 0;
            var ancho       = 0;
            var profundidad = 0;
            var suaje       = "";
            var Largo_str   = "";
            var Ancho_str   = "";
            var profundidad_str   = "";


            tipo_banco      = $(tr).find('td:eq(2)').text();
            Largo_str       = $(tr).find('td:eq(3)').text();
            Ancho_str       = $(tr).find('td:eq(4)').text();
            profundidad_str = $(tr).find('td:eq(5)').text();

            tipo_banco  = tipo_banco.trim();
            largo       = parseInt(Largo_str, 10);
            ancho       = parseInt(Ancho_str, 10);
            profundidad = parseInt(profundidad_str, 10);


            if (tipo_banco == "Carton") {

                suaje = $(tr).find('td:eq(6)').text();
                suaje = suaje.trim();

                aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
            }


            if (tipo_banco == "Eva") {

                suaje = $(tr).find('td:eq(6)').text();
                suaje = suaje.trim();

                aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
            }


            if (tipo_banco == "Espuma") {

                suaje = $(tr).find('td:eq(6)').text();
                suaje = suaje.trim();

                aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
            }


            if (tipo_banco == "Empalme Banco") {

                suaje = $(tr).find('td:eq(6)').text();
                suaje = suaje.trim();

                aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
            }


            if (tipo_banco == "Cartulina Suajada") {

                aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": null});
            }
        });
    });
</script>


<!-- accesorios -->
<script>

    jQuery214(document).on("click", ".listaccesorios", function () {

        $(this).closest('tr').remove();

        row_listabancos = 0;
        row_listabancos = $('#listaccesorios > tr').length;

        aAccesorios = [];

        var oTable = document.getElementById('accesoriosTable');

        var rowLength = oTable.rows.length;

        $("#listaccesorios tr").each(function(row, tr) {

            var nombreAccesorio = $(tr).find('td:eq(0)').text();

            //se salta el 1 porque en el td 1 esta el span como comentario
            var largo   = $(tr).find('td:eq(2)').text();
            var ancho   = $(tr).find('td:eq(3)').text();
            var color   = $(tr).find('td:eq(4)').text();
            var herraje = $(tr).find('td:eq(5)').text();
            var precio  = $(tr).find('td:eq(6)').text();

            nombreAccesorio = nombreAccesorio.trim();

            switch(nombreAccesorio){

                case "Herraje":
                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": herraje, "Precio": precio});
                    
                    break;
                case "Ojillos":
                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": null, "Precio": precio});
                    
                    break;
                case "Resorte":
                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});
                    
                    break;
                case "Lengueta de Liston":
                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});
                    break;
            }
        });
    });
</script>


<script>

    //Activa los div de los select acabados en parte guarda------
    document.getElementById('SelectBanEmp').onchange = function(event){

        var opcionbanco = document.getElementById('SelectBanEmp').value;

        if (opcionbanco === 'Carton Suajado' || opcionbanco === 'Cartulina Suajada') {

            $('#llevasuajemodBanco').hide('normal');
        }

        if (opcionbanco === 'Carton' || opcionbanco === 'Eva' || opcionbanco === 'Espuma' || opcionbanco === 'Empalme Banco') {

            $('#llevasuajemodBanco').show('slow');
        }
    }


    $(document).on('click', '#btnBancoEmp', function(event) {

        var IDopBan = $("#SelectBanEmp option:selected").data('id');
        var opBan   = $("#SelectBanEmp option:selected").text();

        var LargoMBanco       = document.getElementById('LargoBanco').value;
        var AnchoMBanco       = document.getElementById('AnchoBanco').value;
        var ProfundidadMBanco = document.getElementById('ProfundidadBanco').value;
        var LLevaSuajeM       = $("#SelectSuajeBanco option:selected").text();

        var nuloo = document.getElementById('SelectBanEmp').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (nuloo === 'selected') {

            document.getElementById('alerterror5').innerHTML = alertDiv;
        } else if (opBan === 'Carton' || opBan === 'Eva' || opBan === 'Espuma' || opBan === 'Empalme Banco') {

            document.getElementById('alerterror5').innerHTML = "";

            var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ opBan +', Largo: '+ LargoMBanco +', Ancho: '+ AnchoMBanco +', Profundidad: '+ ProfundidadMBanco +', Suaje: '+ LLevaSuajeM +'</span></td><td style="display: none">'+ opBan +'</td><td style="display: none">'+ LargoMBanco +'</td><td style="display: none">'+ AnchoMBanco +'</td><td style="display: none">'+ ProfundidadMBanco +'</td><td style="display: none">'+ LLevaSuajeM +'</td><td class="listbancoemp img_delete"></td></tr>';

            aBancos.push({"Tipo_banco": opBan, "largo": LargoMBanco, "ancho": AnchoMBanco, "Profundidad": ProfundidadMBanco, "Suaje": LLevaSuajeM});

            $('#bancoemp').modal('hide');

            jQuery214('#listbancoemp').append(ban);

            vacioModalBancos();
        } else if (opBan === 'Cartulina Suajada') {

            document.getElementById('alerterror5').innerHTML = "";

            var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ opBan +', Largo: '+ LargoMBanco +', Ancho: '+ AnchoMBanco +', Profundidad: '+ ProfundidadMBanco +'</span></td><td style="display: none">'+ opBan +'</td><td style="display: none">'+ LargoMBanco +'</td><td style="display: none">'+ AnchoMBanco +'</td><td style="display: none">'+ ProfundidadMBanco +'</td><td class="listbancoemp img_delete"></td></tr>';

            aBancos.push({"Tipo_banco": opBan, "largo": LargoMBanco, "ancho": AnchoMBanco, "Profundidad": ProfundidadMBanco, "Suaje": null});

            $('#bancoemp').modal('hide');

            jQuery214('#listbancoemp').append(ban);

            vacioModalBancos();
        }
    });


    //Activa los div de los select cierres------
    document.getElementById('SelectCieEmp').onchange = function(event){

        var opcioncierre = document.getElementById('SelectCieEmp').value;

        $('#opCieParaPares').hide('slow');
        $('#opCieListon').hide('slow');
        $('#opCieMarialuisa').hide('slow');
        $('#opCieSuajeCalado').hide('slow');


        if (opcioncierre == 'Iman') {

            $('#opCieParaPares').show('normal');
        }

        if (opcioncierre == 'Liston') {

            $('#opCieListon').show('normal');
        }

        if (opcioncierre == 'Marialuisa') {

            $('#opCieMarialuisa').show('normal');
        }

        if (opcioncierre == 'Suaje calado') {

            $('#opCieSuajeCalado').show('normal');
        }

        if (opcioncierre == 'Velcro') {

            $('#opCieParaPares').show('normal');
        }
    }


    // ------------------------- check cierres ---------------------------

    jQuery214(document).on("click", "#btnCierres", function () {

        var IDopCie  = $("#SelectCieEmp option:selected").data('id');
        var opCie    = $("#SelectCieEmp option:selected").text();

        var numpares = document.getElementById('paresCierre').value;

        // para liston
        var LarListon    = document.getElementById('LargoListon').value;
        var AnchListon   = document.getElementById('AnchoListon').value;
        var tipoListon   = $("#SelectListonEmp option:selected").text();
        var colorListon  = $("#SelectColorListon option:selected").text();

        // para Suaje calado
        var LarSuajCal   = document.getElementById('LargoSCalado').value;
        var AnchSuajCal  = document.getElementById('AnchoSCalado').value;
        var tipoSuajCal  = $("#SelectSCalado option:selected").text();

        var alertmesserror = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opCie == 'Iman' || opCie == 'Velcro') {

            document.getElementById('alerterror6').innerHTML = "";

            var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Numero de Pares: '+ numpares +'</span></td><td style="display: none">'+ numpares +'</td><td class="listcierres img_delete"></td></tr>';


            aCierres.push({"Tipo_cierre": opCie, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});

            $('#cierres').modal('hide');

            jQuery214('#listcierres').append(cie);

            //vacioModalCierres();
        }

        if (opCie == 'Marialuisa') {

            document.getElementById('alerterror6').innerHTML = "";

            var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Se agrego un cierre Marialuisa</span></td><td class="listcierres img_delete"></td></tr>';

            aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": null, "ancho": null, "tipo": null, "color": null});

            $('#cierres').modal('hide');

            jQuery214('#listcierres').append(cie);

            //vacioModalCierres();
        }

        if (opCie == 'Liston') {

            var nulo1 = document.getElementById('SelectCieEmp').value;
            var nulo2 = document.getElementById('SelectListonEmp').value;
            var nulo3 = document.getElementById('SelectColorListon').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' || nulo3 == 'selected' ) {

                document.getElementById('alerterror6').innerHTML = alertmesserror;
            } else {

                document.getElementById('alerterror6').innerHTML = "";

                var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ LarListon +', Ancho: '+ AnchListon +', Tipo: '+ tipoListon +', Color: '+ colorListon +' </span></td><td style="display: none">'+ LarListon +'</td><td style="display: none">'+ AnchListon +'</td><td style="display: none">'+ tipoListon +'</td><td style="display: none">'+ colorListon +'</td><td class="listcierres img_delete"></td></tr>';


                aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": LarListon, "ancho": AnchListon, "tipo": tipoListon, "color": colorListon});

                $('#cierres').modal('hide');

                jQuery214('#listcierres').append(cie);

                //vacioModalCierres();
            }
        }

        if (opCie == 'Suaje calado') {

            var nulo1 = document.getElementById('SelectCieEmp').value;
            var nulo2 = document.getElementById('SelectSCalado').value;

            if (nulo1 == 'selected' || nulo2 == 'selected') {

                document.getElementById('alerterror6').innerHTML = alertmesserror;
            } else{

                document.getElementById('alerterror6').innerHTML = "";

                var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ LarSuajCal +', Ancho: '+ AnchSuajCal +', Tipo: '+ tipoSuajCal +'</span></td><td style="display: none">'+ LarSuajCal +'</td><td style="display: none">'+ AnchSuajCal +'</td><td style="display: none">'+ tipoSuajCal +'</td><td class="listcierres img_delete"></td></tr>';


                aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": LarSuajCal, "ancho": AnchSuajCal, "tipo": tipoSuajCal, "color": null});

                $('#cierres').modal('hide');

                jQuery214('#listcierres').append(cie);

                //vacioModalCierres();
            }
        }
    });


    jQuery214(document).on("click", "#btnabrebancoemp", function () {

        $('#footerBancoEmp').show();
        $('#footerBancoFcajon').hide();
        $('#footerBancoFcartera').hide();
        $('#footerBancoGuarda').hide();
    });


    $(document).on("click", "#btnAccesorios", function () {

        var idAccesorio     = $("#SelectAccesorio option:selected").data('id');
        var precio          = $("#SelectAccesorio option:selected").data('price');
        var nombreAccesorio = $("#SelectAccesorio option:selected").text();
        var herraje         = $("#SelectHerraje option:selected").text();
        var largo           = $('#LargoAcc').val();
        var ancho           = $('#AnchoAcc').val();
        var color           = $("#opColores option:selected").text();
        var accesorio       = "";

        var alertmesserror  = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        switch(nombreAccesorio){

            case "Herraje":

                if( $("#SelectHerraje option:selected").val() != "selected") {

                    accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio + '</td><td class="CellWithComment">...<span class="CellComment">Herraje: ' + herraje + '</span></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+herraje+'</td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": herraje, "Precio": precio});

                    $('#listaccesorios').append(accesorio);

                    $('#accesorios').modal('hide');

                    vacioModalAccesorios();
                } else {

                    document.getElementById('alerterror7').innerHTML = alertmesserror;
                }
                
                break;
            case "Ojillos":

                accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio + '</td><td style=""></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": null, "Precio": precio});

                $('#listaccesorios').append(accesorio);

                $('#accesorios').modal('hide');

                vacioModalAccesorios();
                
                break;
            case "Resorte":

                if( $("#SelectColor option:selected").val() != "selected"){

                    accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio +'</td><td class="CellWithComment">...<span class="CellComment">Largo: ' + largo + ' Ancho: ' + ancho + ' Color: ' + color + '</span></td><td style="display:none">'+ largo +'</td><td style="display:none">'+ancho+'</td><td style="display:none">'+ color +'</td><td style="display:none"></td><td style="display:none">'+herraje+'</td><td style="display:none">' + precio + '</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});

                    $('#listaccesorios').append(accesorio);

                    $('#accesorios').modal('hide');

                    vacioModalAccesorios();
                } else {

                    document.getElementById('alerterror7').innerHTML = alertmesserror;
                }
                
                break;
            case "Lengueta de Liston":

                if( $("#SelectColor option:selected").val() != "selected"){

                    accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio +'</td><td class="CellWithComment">...<span class="CellComment">Largo: ' + largo + ' Ancho: ' + ancho + ' Color: ' + color + '</span></td><td style="display:none">'+ largo +'</td><td style="display:none">'+ancho+'</td><td style="display:none">'+ color +'</td><td style="display:none"></td><td style="display:none">'+herraje+'</td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                    aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});

                    $('#listaccesorios').append(accesorio);

                    $('#accesorios').modal('hide');

                    vacioModalAccesorios();
                } else {

                    document.getElementById('alerterror7').innerHTML = alertmesserror;
                }
                
                break;
        }
        
    });

    document.getElementById('SelectAccesorio').onchange = function(event){

        var opcion = document.getElementById('SelectAccesorio').value;
        $('#opColores').hide('slow');
        $('#opMedidas').hide('slow');
        $('#opHerraje').hide('slow');
        $('#opOjillo').hide('slow');
        if (opcion == 'Herraje') {

            $('#opHerraje').show('normal');
        }  
        if (opcion == 'Ojillos') {

            $('#opOjillo').show('normal');
        }
        if (opcion == 'Resorte') {

            $('#opMedidas').show('normal');
            $('#opColores').show('normal');
        }
        if (opcion == 'Lengueta de Liston') {

            $('#opMedidas').show('normal');
            $('#opColores').show('normal');
        }
    }


    function vacioModalAccesorios(){

        document.getElementById('LargoAcc').value = 1;
        document.getElementById('AnchoAcc').value = 1;

        document.getElementById('SelectAccesorio').value = "selected";
        document.getElementById('SelectHerraje').value   = "selected";
        document.getElementById('SelectColor').value     = "selected";

        $('#opColores').hide('slow');
        $('#opMedidas').hide('slow');
        $('#opHerraje').hide('slow');
        $('#opOjillo').hide('slow');

        $('#alerterror7').empty();
    }


    $("#btnCancelAccesorios").click( function (){

        vacioModalAccesorios();
    });


    $(document).on('click', '#btnResumen', function(event) {

            $('#form_modelo_0').hide();
            $('#form_modelo_1').hide();
            $('#form_modelo_1_derecho').hide();
            $('#form_modelo_2').hide();
            $('#form_modelo_2_derecho').hide();
            $('#form_modelo_3').hide();
            $('#form_modelo_3_derecho').hide();
            $('.selectormodelo').hide();
            $('#resumentodocaja').show();
    });


    $(document).on('click', '#btnQuitarResumen', function(event) {

            $('.selectormodelo').show();
            $('#form_modelo_1').show();
            $('#form_modelo_1_derecho').show('normal');
            $('#form_modelo_0').hide();
            $('#form_modelo_2').hide();
            $('#form_modelo_2_derecho').hide();
            $('#form_modelo_3').hide();
            $('#form_modelo_3_derecho').hide();
            $('#resumentodocaja').hide();
    });


    history.forward();

    $(".medidas-input").addClass("not-empty");

</script>