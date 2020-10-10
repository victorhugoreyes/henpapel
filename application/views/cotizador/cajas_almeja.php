<style type="text/css">

    .seccionP{
    }
</style>

<!-- ******* Formulario de Almeja modelo (1) -->
    <div id="form_modelo_1">
        <form class="caja-form" name="caja-form" id="caja-form" method = "post" action = "<?php echo URL; ?>cotizador/saveCaja/">

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
                    <div class="form-content medidas" style="height: 450px;">

                        <input type="hidden" name="modelo" id="modelo" value="1">

                        <!-- ODT -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <input type="hidden" name="nombre_cliente" id="nombre_cliente" value="<?= utf8_decode($nombrecliente);?>">
                                <span>ODT: </span>
                            </div>


                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="odt"id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus required style="text-transform: uppercase;">
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
                                <input class="cajas-input medidas-input" name="base" id="corte_largo" type="number" step="any" min="0.01" tabindex="2" placeholder="cm" required>
                            </div>
                        </div>

                        <!-- Ancho Interior -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Alto: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="alto" id="corte_ancho" type="number" step="any" min="0.01" tabindex="3" placeholder="cm" required>
                            </div>
                        </div>

                        <!-- Profundidad -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Profundidad: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="profundidad" id="profundidad_1" type="number" step="any" min="0.01" placeholder="cm" tabindex="4" required="">
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
                                <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required="">
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

                        <button type="button" id="btnabreaccesorios" class="btn btn-outline-primary" data-toggle="modal" data-target="#accesorios" disabled>Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

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

                        <!-- Papel Empalme -->
                        <div>
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" tabindex="7">

                                <option value="nulo" selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>

                                    <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- mismo papel para todos -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" name="btnCheckPaper" id="btnCheckPaper" class="custom-control-input">
                            <label class="custom-control-label" for="btnCheckPaper"style="font-size: 15px; cursor: pointer;" class="btn btn-outline-primary">Mismo Papel Para Todos</label>
                        </div>

                        <!-- Añadir Impresiones -->
                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listimpresiones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <!-- Añadir Acabados -->
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

                        <!-- Banco Empalme -->
                        <div>
                            <button id="btnabrebancoemp" type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#bancoemp" disabled>Añadir Banco <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

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

                                <h5 class="modal-title">GUARDAR</h5>
                                <!--
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                                    <span aria-hidden="true">&times;</span>
                                </button>
                                -->
                            </div>

                            <div class="modal-body">

                                <p style="color: black; font-size: 1.1em">¿Esta seguro de guardar la cotizacion?</p>
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

                    <button id="papeles_submit" type="button" class="btn btn-primary" style="font-size: 10px;" enabled="">CALCULAR</button>

                    <button id="subForm" name="subForm" type="button" class="btn btn-success" style="font-size: 10px;" disabled="" data-toggle="modal" data-target="#modalSaveAll">GUARDAR</button>

                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

                    <button type="button" class="btn btn-warning" id="btnResumen" style="font-size: 10px;">RESUMEN</button>

                    <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>
                    <br>

                    <!--<div style="float: left; font-size: 18px; text-align: right; margin-right: 375px;">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required></div>-->

                    <!-- Suma de la ODT(Total)  -->
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
                                    <td>ISR: </td>
                                    <td id="ISRDrop">$0.00</td>
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
                                    <td>Ventas: </td>
                                    <td id="VentasDrop">$0.00</td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" id="descuentoModal" style="border: none; background: white;">Descuento: (0%) </button>
                                    </td>
                                    <td id="DescuentoDrop">$0.00</td>
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

    <!-- Modal Impresiones Forro del Cajon -->
    <div class="modal fade" id="Impresionesfcajon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi">

                    <h5 class="modal-title" id="exampleModalLongTitle">Impresiones</h5>

                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div id="alerterrorimp2">

                    </div>

                    <div>

                        <select  id="miSelectFcajon" class="SelectTSM">

                            <option selected value="selected" disabled>Elige el tipo de impresión</option>

                            <?php
                            foreach ($impresiones as $impresion) {   ?>

                                <option id="Imp" value="<?=$impresion['nombre']?>" data-precio="<?=$impresion['precio']?>" data-id="<?=$impresion['id_impresion']?>"><?=$impresion['nombre']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div id="opImpresionOffsetFcajon" style="display: none;">

                        <table class="table" style="text-align: left;" >

                            <tbody>
                                <tr>
                                    <td>Número de tintas:</td>
                                    <td><input type="number" id="tintasOFcajon" value="1" style="width: 50px;" min="1" max="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectImpTipoOffFcajon" class="SelectTSM">
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

                    <div id="opImpresionDigitalFcajon" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>
                                <tr>

                                    <td colspan="2">

                                        <!--<select  id="SelectImpDigitalFCajon" class="SelectTSM">

                                            <option selected value="selected" disabled>Elige el tipo de Digital</option>

                                            <?php
                                            foreach ($Digital as $dig) {   ?>

                                                <option id="ImpDig" value="<?=$dig['nombre']?>"  data-id="<?=$dig['id_proc_digital']?>"><?=$dig['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        </select>
                                        -->
                                        <label>Se agregará una impresión digital</label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="opImpresionSerigrafiaFcajon" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>
                                <tr>
                                    <td>Número de tintas:</td>
                                    <td><input type="number" value="1" id="tintasSFcajon" style="width: 50px;" min="1" max="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectImpTipoSeriFcajon" class="SelectTSM">
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

                    <button type="button" id="btnImpresionesFcajon" class="btn btn-guardar-blues">Guardar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Impresiones Forro de la Cartera -->
    <div class="modal fade" id="Impresionesfcartera" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi">

                    <h5 class="modal-title" id="exampleModalLongTitle">Impresiones</h5>

                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div id="alerterrorimp3">

                    </div>

                    <div>
                        <select  id="miSelectFcartera" class="SelectTSM">

                            <option selected value="selected" disabled>Elige el tipo de impresión</option>

                            <?php
                            foreach ($impresiones as $impresion) {   ?>

                                <option id="Imp" value="<?=$impresion['nombre']?>" data-precio="<?=$impresion['precio']?>" data-id="<?=$impresion['id_impresion']?>"><?=$impresion['nombre']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div id="opImpresionOffsetFcartera" style="display: none;">

                        <table class="table" style="text-align: left;" >

                            <tbody>
                                <tr>
                                    <td>Número de tintas:</td>
                                    <td><input type="number" id="tintasOFcartera" value="1" style="width: 50px;" min="1" max="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectImpTipoOffFcartera" class="SelectTSM">
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

                    <div id="opImpresionDigitalFcartera" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>
                                <tr>

                                    <td colspan="2">

                                        <label>Se agregará una impresión digital</label>
                                        <!--<select  id="SelectImpDigitalFCartera" class="SelectTSM">

                                            <option selected value="selected" disabled>Elige el tipo de Digital</option>

                                            <?php
                                            foreach ($Digital as $dig) {   ?>

                                                <option id="ImpDig" value="<?=$dig['nombre']?>"  data-id="<?=$dig['id_proc_digital']?>"><?=$dig['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        </select>
                                        -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="opImpresionSerigrafiaFcartera" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>
                                <tr>
                                    <td>Número de tintas:</td>
                                    <td><input type="number" value="1" id="tintasSFcartera" style="width: 50px;" min="1" max="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectImpTipoSeriFcartera" class="SelectTSM">
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

                    <button type="button" id="btnImpresionesFcartera" class="btn btn-guardar-blues">Guardar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Impresiones Guarda -->
    <div class="modal fade" id="Impresionesguarda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi">

                    <h5 class="modal-title" id="exampleModalLongTitle">Impresiones</h5>

                    <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div id="alerterrorimp4">

                    </div>

                    <div>

                        <select  id="miSelectGuarda" class="SelectTSM">

                            <option selected value="selected" disabled>Elige el tipo de impresión</option>

                            <?php
                            foreach ($impresiones as $impresion) {   ?>

                                <option id="Imp" value="<?=$impresion['nombre']?>" data-precio="<?=$impresion['precio']?>" data-id="<?=$impresion['id_impresion']?>"><?=$impresion['nombre']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div id="opImpresionOffsetGuarda" style="display: none;">

                        <table class="table" style="text-align: left;" >
                            <tbody>
                                <tr>
                                    <td>Número de tintas:</td>
                                    <td><input type="number" id="tintasOGuarda" value="1" style="width: 50px;" min="1" max="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectImpTipoOffGuarda" class="SelectTSM">
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

                    <div id="opImpresionDigitalGuarda" style="display: none;">

                        <table class="table" style="text-align: left;">
                            <tbody>
                                <tr>

                                    <td colspan="2">

                                        <label>Se agregará una impresión digital</label>
                                        <!--<select  id="SelectImpDigitalG" class="SelectTSM">

                                            <option selected value="selected" disabled>Elige el tipo de Digital</option>

                                            <?php
                                            foreach ($Digital as $dig) {   ?>

                                                <option id="ImpDig" value="<?=$dig['nombre']?>"  data-id="<?=$dig['id_proc_digital']?>"><?=$dig['nombre']?></option>
                                            <?php
                                            }

                                        ?>
                                        </select>
                                        -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div id="opImpresionSerigrafiaGuarda" style="display: none;">

                        <table class="table" style="text-align: left;">

                            <tbody>
                                <tr>
                                    <td>Número de tintas:</td>
                                    <td><input type="number" value="1" id="tintasSGuarda" style="width: 50px;" min="1" max="6"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <select  id="SelectImpTipoSeriGuarda" class="SelectTSM">
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

                    <button type="button" id="btnImpresionesGuarda" class="btn btn-guardar-blues">Guardar</button>

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

<!-- ******* Todos los Modales Acabados ******* -->
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

    <!-- Acabados Forro del Cajón -->
    <div class="modal fade" id="acabados_fcajon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header azulWhi">
            <h5 class="modal-title" id="exampleModalLongTitle">Acabados</h5>
            <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

                <div id="alerterror2">

                </div>
                <div>
                    <select  id="SelectAcFcajon" class="SelectTSM">
                        <option selected value="selected" disabled>Elige el tipo de acabado</option>
                        <?php
                        foreach ($acabados as $acabado) {   ?>
                        <option id="Acb" value="<?=$acabado['nombre']?>" data-precio="<?=$acabado['precio']?>" data-id="<?=$acabado['id_acabados']?>"><?=$acabado['nombre']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="opAcLaminadoFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectLaminadoFcajon" class="SelectTSM">
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

                <div id="opAcHotStampingFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoHS_fcajon" name="LargoHS_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoHS_fcajon" name="AnchoHS_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectHSFcajon" class="SelectTSM">
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
                                    <select  id="SelectColorHSFcajon" class="SelectTSM">
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

                <div id="opAcGrabadoFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoGrab_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoGrab_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectGrabFcajon" class="SelectTSM">
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
                                    <select  id="SelectUbiGrabFcajon" class="SelectTSM">
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
                    <div id="imagengrabados2">
                        <img border="0" src="<?=URL ;?>public/img/1.png" style="width: 70%">
                    </div>
                </div>

                <div id="opAcEspecialesFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectEspecialesFcajon" class="SelectTSM">
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

                <div id="opAcBarnizUVFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectBarnizUVFcajon" class="SelectTSM">
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

                <div id="opAcSuajeFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoSuaje_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoSuaje_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectSuajeFcajon" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de Suaje</option>
                                        <?php
                                        foreach ($ASuaje as $asuaj) {   ?>
                                        <option id="aSuaj" value="<?=$asuaj['nombre']?>" data-precio="<?=$asuaj['precio']?>"><?=$asuaj['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcLaserFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoLaser_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoLaser_fcajon" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectLaserFcajon" class="SelectTSM">
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
                <div id="opAcBarUVFcajon" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoBarUVFcajon" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoBarUVFcajon" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAcabadosfcajon" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>

    <!-- Acabados Forro de la Cartera -->
    <div class="modal fade" id="acabados_fcartera" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header azulWhi">
            <h5 class="modal-title" id="exampleModalLongTitle">Acabados</h5>
            <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

                <div id="alerterror3">

                </div>
                <div>
                    <select  id="SelectAcFcartera" class="SelectTSM">
                        <option selected value="selected" disabled>Elige el tipo de acabado</option>
                        <?php
                        foreach ($acabados as $acabado) {   ?>
                        <option id="Acb" value="<?=$acabado['nombre']?>" data-precio="<?=$acabado['precio']?>" data-id="<?=$acabado['id_acabados']?>"><?=$acabado['nombre']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="opAcLaminadoFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectLaminadoFcartera" class="SelectTSM">
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

                <div id="opAcHotStampingFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoHS_fcartera" name="LargoHS_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoHS_fcartera" name="AnchoHS_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectHSFcartera" class="SelectTSM">
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
                                    <select  id="SelectColorHSFcartera" class="SelectTSM">
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

                <div id="opAcGrabadoFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoGrab_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoGrab_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectGrabFcartera" class="SelectTSM">
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
                                    <select  id="SelectUbiGrabFcartera" class="SelectTSM">
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
                    <div id="imagengrabados3">
                        <img border="0" src="<?=URL ;?>public/img/1.png" style="width: 70%">
                    </div>
                </div>

                <div id="opAcEspecialesFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectEspecialesFcartera" class="SelectTSM">
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

                <div id="opAcBarnizUVFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectBarnizUVFcartera" class="SelectTSM">
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

                <div id="opAcSuajeFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoSuaje_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoSuaje_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectSuajeFcartera" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de Suaje</option>
                                        <?php
                                        foreach ($ASuaje as $asuaj) {   ?>
                                        <option id="aSuaj" value="<?=$asuaj['nombre']?>" data-precio="<?=$asuaj['precio']?>"><?=$asuaj['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcLaserFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoLaser_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoLaser_fcartera" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectLaserFcartera" class="SelectTSM">
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

                <div id="opAcBarUVFcartera" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoBarUVFcartera" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoBarUVFcartera" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAcabadosfcartera" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>

    <!-- Acabados Guarda -->
    <div class="modal fade" id="acabados_guarda" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header azulWhi">
            <h5 class="modal-title" id="exampleModalLongTitle">Acabados</h5>
            <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

                <div id="alerterror4">

                </div>
                <div>
                    <select  id="SelectAcGuarda" class="SelectTSM">
                        <option selected value="selected" disabled>Elige el tipo de acabado</option>
                        <?php
                        foreach ($acabados as $acabado) {   ?>
                        <option id="Acb" value="<?=$acabado['nombre']?>" data-precio="<?=$acabado['precio']?>" data-id="<?=$acabado['id_acabados']?>"><?=$acabado['nombre']?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>

                <div id="opAcLaminadoGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectLaminadoGuarda" class="SelectTSM">
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

                <div id="opAcHotStampingGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoHS_guarda" name="LargoHS_guarda" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoHS_guarda" name="AnchoHS_guarda" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectHSGuarda" class="SelectTSM">
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
                                    <select  id="SelectColorHSGuarda" class="SelectTSM">
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

                <div id="opAcGrabadoGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoGrab_guarda" name="LargoGrab_guarda" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoGrab_guarda" name="AnchoGrab_guarda" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectGrabGuarda" class="SelectTSM">
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
                                    <select  id="SelectUbiGrabGuarda" class="SelectTSM">
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
                    <div id="imagengrabados4">
                        <img border="0" src="<?=URL ;?>public/img/1.png" style="width: 70%">
                    </div>
                </div>

                <div id="opAcEspecialesGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectEspecialesGuarda" class="SelectTSM">
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

                <div id="opAcBarnizUVGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>
                                    <select  id="SelectBarnizUVGuarda" class="SelectTSM">
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

                <div id="opAcSuajeGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoSuaje_guarda" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoSuaje_guarda" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectSuajeGuarda" class="SelectTSM">
                                        <option selected value="selected" disabled>Elige un tipo de Suaje</option>
                                        <?php
                                        foreach ($ASuaje as $asuaj) {   ?>
                                        <option id="aSuaj" value="<?=$asuaj['nombre']?>" data-precio="<?=$asuaj['precio']?>"><?=$asuaj['nombre']?></option>
                                        <?php
                                        } ?>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div id="opAcLaserGuarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoLaser_guarda" name="LargoLaser_guarda" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoLaser_guarda" name="AnchoLaser_guarda" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <select  id="SelectLaserGuarda" class="SelectTSM">
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
                <div id="opAcBarUVguarda" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Largo: <input type="number" id="LargoBarUVGuarda" value="1" style="width: 70px;" min="1">cm</td>
                                <td>Ancho: <input type="number" id="AnchoBarUVGuarda" value="1" style="width: 70px;" min="1">cm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnAcabadosguarda" class="btn btn-guardar-blues">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
      </div>
    </div>

<!-- ******* Todos los modales Banco ******** -->
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

<!-- ******* Todo el Modal Cierres ******* -->
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

                <!--<div id="opCieVelcro" style="display: none;">
                    <br>
                    <table class="table" style="text-align: left;">
                        <tbody>
                            <tr>
                                <td>Número de pares:</td>
                                <td>
                                    <input type="number" id="paresVelcro" value="1" style="width: 50px;" min="1">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
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
                <!--
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>
                </button>
                -->
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
                <!--
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>
                </button>
                -->
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

<!-- desde aqui comienza javascript de cajas.php -->

<?php

/* Datos leidos de la tabla porcentaje_adicional */
foreach ($Porcentajes as $porcentaje) { ?>

    <input type="hidden" id="porcentaje_<?=$porcentaje['nombre_aumento']?>" value="<?=$porcentaje['porcentaje']?>">
<?php }

?>


<script type="text/javascript" src="<?= URL ?>public/js/cotizador/almeja.js"></script>
<script>

    /* variables globales */
    /*var model;
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
    var papel_elegido  = false;

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

    var aCalculos = {};
    var aCortes   = {};
    var aTr3      = [];


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


    /*var j = 0;
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


    // focus => Ancho Interior
    jQuery214(document).on("focus", "#corte_ancho", function () {

        jQuery214('#image_1_ancho').show();
        jQuery214('#image_1').hide();
    });


    // focus => Alto Interior
    jQuery214(document).on("focus", "#corte_largo", function () {

        jQuery214('#image_1_alto').show();
        jQuery214('#image_1').hide();
    });


    // focus => profundidad
    jQuery214(document).on("focus", "#profundidad_1", function () {

        jQuery214('#image_1_profundidad').show();
        jQuery214('#image_1').hide();
    });


    // focusout
    jQuery214(document).on("focusout", "#corte_largo", function () {

        jQuery214('#image_1_alto').hide();
        jQuery214('#image_1').show();
    });


    // focusout => Ancho Interior
    jQuery214(document).on("focusout", "#corte_ancho", function () {

        jQuery214('#image_1_ancho').hide();
        jQuery214('#image_1').show();
    });


    // focusout => profundidad
    jQuery214(document).on("focusout", "#profundidad_1", function () {

        jQuery214('#image_1_profundidad').hide();
        jQuery214('#image_1').show();
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

    var descuento = 0;

    /* Descuento */
    jQuery214(document).on("click", ".d-check", function (){

        descuento = $(this).val();

        closeModal();
    });


    jQuery214(document).on("click", "#btnSaveDescuento", function (){

        $("#descuentoModal").html("Descuento: (" + descuento + "%)");

        $("#descuentos").modal("hide");
    });


    jQuery214(document).on("click", "#btnCancelDescuento", function (){

        jQuery214('#DescuentoDrop').html("$0.00");

        $('#descuentos').find("input:checked").prop("checked", false);

        $("#descuentoModal").html("Descuento: (0%)");

        descuento = 0;
    });


    jQuery214(document).on("click", "#descuentoModal", function (){

        //showModal('d_grabado',true);
        $('#descuentos').modal('show');
    });

    // papel(es) seleccionado(s)
    jQuery214(document).on("click", "#papeles_submit", function () {


        var p_ancho;
        var p_largo;
        var precio
        var papel;
        var forro_parte;
        var part_ancho;
        var part_largo;
        var data_name;

        var precio_forros = 0;


        while (aTr3.length > 6) {

            aTr3.pop();
        }

        var grosor_cajon   = $('#grosor_cajon_1').val();
        var ancho_carton1  = $('#grosor_cajon_1').find('option:selected').data('ancho');
        var largo_carton1  = $('#grosor_cajon_1').find('option:selected').data('largo');
        var precio_carton1 = $('#grosor_cajon_1').find('option:selected').data('price');
        var id_carton1     = $('#grosor_cajon_1').find('option:selected').data('id');

        var grosor_cajon   = $('#grosor_cartera_1').val();
        var ancho_carton2  = $('#grosor_cartera_1').find('option:selected').data('ancho');
        var largo_carton2  = $('#grosor_cartera_1').find('option:selected').data('largo');
        var precio_carton2 = $('#grosor_cartera_1').find('option:selected').data('price');
        var id_carton2     = $('#grosor_cartera_1').find('option:selected').data('id');

        closeModal();

    /////////Aqui Comienza el boton submit//////

        var grabar = "NO";

        var empalme       = $("#interior_cajon").val();             // empalme
        var forro_cajon   = $("#exterior_cajon").val();             // forro cajon
        var forro_cartera = $("#exterior_cartera").val();           // forro cartera
        var guarda        = $("#interior_cartera").val();          // guarda

        var odt         = $("#odt-1").val();
        var base        = $("#corte_largo").val();
        var altura      = $("#corte_ancho").val();
        var profundidad = $("#profundidad_1").val();
        var gCajon      = $("#grosor_cajon_1").val();
        var gCartera      = $("#grosor_cartera_1").val();
        var cantidad    = $("#qty").val();

        if( revisarPropiedades(odt,"ODT") == false ) return false;

        if( revisarPropiedades(base,"base") == false ) return false;

        if( revisarPropiedades(altura,"altura") == false ) return false;

        if( revisarPropiedades(profundidad,"profundidad") == false ) return false;

        if( revisarPropiedades(gCajon,"grosor cajon") == false ) return false;

        if( revisarPropiedades(gCartera,"grosor cartera") == false ) return false;

        if( revisarPropiedades(cantidad,"cantidad") == false ) return false;

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
            var aCalculos_tmp = JSON.stringify(aCalculos, null, 4);
            var aCortes_tmp   = JSON.stringify(aCortes, null, 4);
            var aTr3_tmp      = JSON.stringify(aTr3, null, 4);

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


            var cliente        = getIdClient();
            var id_cliente_tmp = JSON.stringify(cliente, null, 4);

            formData.push({name: 'aCalculos', value: aCalculos_tmp});   // calculadora
            formData.push({name: 'id_cliente', value: id_cliente_tmp});
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

            var modificar_odt = "NO";

            formData.push({name: 'modificar', value: modificar_odt});


            aCalculos_tmp   = [];
            aCortes_tmp     = [];
            aTr3_tmp        = [];
            aImp_tmp        = [];
            aImpFCaj_tmp    = [];
            aImpFCar_tmp    = [];
            aImpG_tmp       = [];
            aAcb_tmp        = [];
            aAcbFCaj_tmp    = [];
            aAcbFCar_tmp    = [];
            aAcbG_tmp       = [];
            aCierres_tmp    = [];
            aBancos_tmp     = [];
            aAccesorios_tmp = [];

            $.ajax({                    // boton CALCULAR
                type:"POST",
                //dataType: "json",
                url: $('#caja-form').attr('action'),
                data: formData,
            })
            .done(function(response) {


                console.log("(3678) response: ");

                console.log(response);

                if (response) {

                    try {

                        var js_respuesta = JSON.parse(response); // trae toda la matriz
                        var error        = js_respuesta.error;

                        if (error.length > 0) {

                            document.getElementsByName("subForm").disabled = true;

                            showModError("");
                            //$("#txtContenido").html("");
                            $("#txtContenido").html("(3695) " + error);

                            return false;
                        } else {

                            document.getElementsByName("subForm").enabled = true;

                            $("#subForm").prop("enabled", true);

                            var aJson_stringify = JSON.stringify(js_respuesta, null, 4);

                            console.log('(3706) aJson_stringify: ' + aJson_stringify);

                            console.log('(3708) error: ' + error);
                        }
                    } catch(e) {

                        var js_respuesta = JSON.parse(response); // trae toda la matriz
                        var error        = js_respuesta.error;

                        if (error.length > 0) {

                            showModError("");
                            //$("#txtContenido").html("");
                            $("#txtContenido").html("(3719) " + error);

                            return false;
                        }
                    }
                } else {

                    showModError("");

                    $("#txtContenido").html("(3728) Ya existe esta ODT...");

                    return false;
                }

                console.log('(3733) mensaje: ' + js_respuesta.mensaje);

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

                    var costo_msj = "<tr><td></td><td></td><td></td><td>$" + js_respuesta['mensajeria'] + "</td></tr>";
                    $('#resumenMensajeria').append(costo_msj);

                // (EMPAQUE)

                    var costo_emp = "<tr><td></td><td></td><td></td><td>$" + js_respuesta['empaque'] + "</td></tr>";
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
                        }

                        if (c === 'Papel_FCaj') {

                            js_parte_nombre = "Forro del Cajón";
                        }

                        if (c === 'Papel_FCar') {

                            js_parte_nombre = "Forro de la Cartera";
                        }


                        if (c === 'Papel_Guarda') {

                            js_parte_nombre = "Guarda";
                        }

                        // Papeles todos

                        if (c === 'Papel_Empalme' || c === 'Papel_FCaj' || c === 'Papel_FCar' || c === 'Papel_Guarda') {

                            var js_papel_interior_cajon_nombre_emp  = js_respuesta[c]['nombre_papel'];
                            var js_corte_largo_Emp                  = js_respuesta[c]['calculadora']['corte_largo'];
                            var js_corte_ancho_Emp                  = js_respuesta[c]['calculadora']['corte_ancho'];
                            var js_papel_interior_cajon_cortes_Emp  = js_respuesta[c]['corte'];
                            var js_papel_interior_cajon_pliegos_Emp = js_respuesta[c]['tot_pliegos'];
                            var js_Costo_total_pliegos_emp_Emp      = js_respuesta[c]['tot_costo'];


                            if (js_papel_interior_cajon_nombre_emp === undefined || js_corte_largo_Emp === undefined || js_corte_ancho_Emp === undefined || js_papel_interior_cajon_cortes_Emp === undefined || js_papel_interior_cajon_pliegos_Emp === undefined || js_Costo_total_pliegos_emp_Emp === undefined) {

                                //console.log('(5040) Buscando los papeles elegidos en: '+ js_parte_nombre);

                            } else {

                                var trpapelesEmp = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr><td>Material</td><td>'+ js_papel_interior_cajon_nombre_emp +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_Emp +' Ancho: '+ js_corte_ancho_Emp +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_papel_interior_cajon_cortes_Emp +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_papel_interior_cajon_pliegos_Emp +'</td></tr><tr><td>Costo Total</td><td>$'+ js_Costo_total_pliegos_emp_Emp +'<input type="hidden" class="prices" value="' + js_Costo_total_pliegos_emp_Emp + '"></td></tr>';

                                jQuery214('#table_papeles_tr').append(trpapelesEmp); //imprime tr

                                var parteresumen;


                                if (js_parte_nombre == 'Empalme del Cajón') {

                                    parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp +'<input type="hidden" class="pricesresumenempalme" value="' + js_Costo_total_pliegos_emp_Emp + '"></td><td></td></tr>';

                                    jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                }


                                if (js_parte_nombre == 'Forro del Cajón') {

                                    parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp +'<input type="hidden" class="pricesresumenfcajon" value="' + js_Costo_total_pliegos_emp_Emp + '"></td><td></td></tr>';

                                    jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                }


                                if (js_parte_nombre == 'Forro de la Cartera') {

                                   parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp +'<input type="hidden" class="pricesresumenfcartera" value="' + js_Costo_total_pliegos_emp_Emp + '"></td><td></td></tr>';

                                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                }


                                if (js_parte_nombre == 'Guarda') {

                                    parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp +'<input type="hidden" class="pricesresumenguarda" value="' + js_Costo_total_pliegos_emp_Emp + '"></td><td></td></tr>';

                                    jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                }
                            }
                        }
                    }

                // (CARTONES)

                    var js_nombre_cajon_CartonCaj      = js_respuesta.CartonCaj['nombre_papel'];
                    var js_corte_largo_CartonCaj       = js_respuesta.CartonCaj['largo_papel'];
                    var js_corte_ancho_CartonCaj       = js_respuesta.CartonCaj['ancho_papel'];
                    var js_Piezas_por_Pliego_CartonCaj = js_respuesta.CartonCaj['tot_pliegos'];
                    var js_Num_pliegos_CartonCaj       = js_respuesta.CartonCaj['corte'];
                    var js_costo_total_CartonCaj       = js_respuesta.CartonCaj['tot_costo'];

                    var trpapelescartonj = '<tr><td colspan="2" style="background: steelblue;color: white;">Carton del Cajón</td></tr><tr><td>Material</td><td>'+ js_nombre_cajon_CartonCaj +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_CartonCaj +' Ancho: '+ js_corte_ancho_CartonCaj +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_Piezas_por_Pliego_CartonCaj +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_Num_pliegos_CartonCaj +'</td></tr><tr><td>Costo Total</td><td>$'+ js_costo_total_CartonCaj +'<input type="hidden" class="prices" value="'+ js_costo_total_CartonCaj +'"></td></tr>';

                    jQuery214('#table_papeles_tr').append(trpapelescartonj);

                    parteresumen = '<tr><td></td><td>'+ js_nombre_cajon_CartonCaj +'</td><td>$'+ js_costo_total_CartonCaj +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_total_CartonCaj +'"></td><td></td></tr>';

                    jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

                    var js_nombre_cajon_cartera_CartonCar = js_respuesta.CartonCar['nombre_papel'];
                    var js_corte_largo_CartonCar          = js_respuesta.CartonCar['largo_papel'];
                    var js_corte_ancho_CartonCar          = js_respuesta.CartonCar['ancho_papel'];
                    var js_Piezas_por_Pliego_CartonCar    = js_respuesta.CartonCar['tot_pliegos'];
                    var js_Num_pliegos_CartonCar          = js_respuesta.CartonCar['corte'];
                    var js_costo_total_CartonCar          = js_respuesta.CartonCar['tot_costo'];

                    var trpapelescartoncr = '<tr><td colspan="2" style="background: steelblue;color: white;">Carton Cartera</td></tr><tr><td>Material</td><td>'+ js_nombre_cajon_cartera_CartonCar +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_CartonCar +' Ancho: '+ js_corte_ancho_CartonCar +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_Piezas_por_Pliego_CartonCar +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_Num_pliegos_CartonCar +'</td></tr><tr><td>Costo Total</td><td>$'+ js_costo_total_CartonCar +'<input type="hidden" class="prices" value="'+ js_costo_total_CartonCar +'"></td></tr>';

                    jQuery214('#table_papeles_tr').append(trpapelescartoncr);

                    parteresumen = '<tr><td></td><td>'+ js_nombre_cajon_cartera_CartonCar +'</td><td>$'+ js_costo_total_CartonCar +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_total_CartonCar +'"></td><td></td></tr>';

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


                    var elab_car_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Elaboración</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_elab_car_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Totales</td></tr><tr><td>Forro</td><td>'+ js_elab_car_forro_costo_unit +'</td><td>'+ js_elab_car_forro_car +'</td></tr><tr><td>Guarda</td><td>'+ js_elab_car_guarda_costo_unit +'</td><td>'+ js_elab_car_guarda +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_elab_costo_tot_elab_car +'<input type="hidden" class="prices" value="'+ js_elab_costo_tot_elab_car +'"></td></tr><tr><td colspan="3"></td></tr>';

                    jQuery214('#table_adicionales_tr').append(elab_car_tr);

                    var parteresumen = '<tr><td></td><td>Elaboración</td><td>$'+ js_elab_car_forro_car +'<input type="hidden" class="pricesresumenfcartera" value="' + js_elab_car_forro_car + '"></td><td></td></tr>';

                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

                    var parteresumen = '<tr><td></td><td>Elaboración</td><td>$'+ js_elab_car_guarda +'<input type="hidden" class="pricesresumenguarda" value="' + js_elab_car_guarda + '"></td><td></td></tr>';

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

                    var ranurado_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Ranurado</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_ranurado_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_ranurado_arreglo +'</td><td>'+ js_ranurado_arreglo +'</td></tr><tr><td>Ranurado Cajón</td><td>'+ js_ranurado_costo_unit_por_ranura +'</td><td>'+ js_ranurado_costo_por_ranura +'</td></tr><tr><td>Ranurado Cartera</td><td>'+ js_ranurado_costo_unit_por_ranura2 +'</td><td>'+ js_ranurado_costo_por_ranura2 +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_ranurado_costo_tot_todo_ranura +'<input type="hidden" class="prices" value="'+ js_ranurado_costo_tot_todo_ranura +'"></td></tr><tr><td colspan="3"></td></tr>';

                    jQuery214('#table_adicionales_tr').append(ranurado_tr);

                    var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_tot_ranurado +'<input type="hidden" class="pricesresumenfcajon" value="' + js_ranurado_costo_tot_ranurado + '"></td><td></td></tr>';

                    jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen

                    var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_por_ranura2 +'<input type="hidden" class="pricesresumenfcartera" value="' + js_ranurado_costo_por_ranura2 + '"></td><td></td></tr>';

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



                    var js_encuadernacion_Encajada = js_respuesta.encuadernacion['costo_encajada'];

                    var js_encuadernacion_costo_tot_proceso = js_respuesta.encuadernacion['costo_tot_proceso'];


                    var js_encuadernacion_puesta_banco_costo_unit = js_respuesta.encuadernacion['puesta_banco_costo_unit'];


                    if (js_encuadernacion_puesta_banco_costo_unit <= 0) {

                        showModError("Encuadernacion (costo unitario puesta banco)");
                    }


                    var js_encuadernacion_Puesta_de_banco = js_respuesta.encuadernacion['puesta_de_banco'];

                    var js_encuadernacion_costo_tot_proceso = js_respuesta.encuadernacion['costo_tot_proceso'];

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


                    var ranurado_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Encuadernación</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_encuadernacionranurado_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Despunte</td><td>'+ js_encuadernacion_despunte_costo_unitario +'</td><td>'+ js_encuadernacion_Despunte_de_esquinas_para_cajon +'</td></tr><tr><td>Forrado</td><td>'+ js_encuadernacion_costo_unitario_Forrado_de_cajon +'</td><td>'+ js_encuadernacion_Forrado_de_cajon +'</td></tr><tr><td>Arreglo Forrado</td><td>'+ js_encuadernacion_Arreglo_de_Forrado_de_cajon +'</td><td>'+ js_encuadernacion_Arreglo_de_Forrado_de_cajon +'</td></tr><tr><td>Encajada</td><td>'+ js_encuadernacion_encajada_costo_unitario +'</td><td>'+ js_encuadernacion_Encajada +'</td></tr><tr><td>Empalme</td><td>'+ js_encuadernacion_empalme_cajon_costo_unitario +'</td><td>'+ js_encuadernacion_Empalme_de_cajon +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_encuadernacion_costo_tot_proceso +'<input type="hidden" class="prices" value="'+ js_encuadernacion_costo_tot_proceso +'"></td></tr><tr><td colspan="3"></td></tr>';

                    var parteresumen = '<tr><td></td><td></td><td></td><td>$'+ js_respuesta['encuadernacion']['costo_tot_proceso'] +'</td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_tot_serigrafia_emp +'"></td><td></td></tr>';

                            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                        }
                    }


                    // Empalme Proceso Digital
                    if ("DigEmp" in js_respuesta) {

                        var js_variable_extra3 = js_respuesta.DigEmp; //trae los valores de DigEmp

                        if ("impresion_digital" in js_variable_extra3) {

                            showModError("No cabe la impresión en Digital(Empalme) con estas medidas.");
                        } else  {

                            for ( c in js_variable_extra3 ) {

                                var js_cantidad_con_merma_digital = js_variable_extra3[c]['cantidad'];


                                var js_costo_unitario_digital = js_variable_extra3[c]['costo_unitario'];


                                if (js_costo_unitario_digital <= 0) {

                                    showModError("Digital Empalme (costo unitario tiro)");
                                }


                                var js_costo_tot_digital = js_variable_extra3[c]['costo_tot_proceso'];
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


                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_tot_serigrafia_emp +'"></td><td></td></tr>';

                            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                        }
                    }

                    // Fcajon Proceso Digital

                    if ("DigFCaj" in js_respuesta) {

                        var js_variable_extra6 = js_respuesta.DigFCaj; //trae los valores de DigFCaj

                        if ("impresion_digital" in js_variable_extra6) {

                            showModError("No cabe la impresión Digital(Forro del Cajon) con estas medidas.");
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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_tot_serigrafia_emp +'"></td><td></td></tr>';

                            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                        }
                    }

                    // Fcartera Proceso Digital

                    if ("DigFCar" in js_respuesta) {

                        var js_variable_extra9 = js_respuesta.DigFCar; //trae los valores de DigFCar

                        if ("impresion_digital" in js_variable_extra9) {

                            showModError("No cabe la impresión en Digital(Forro Cartera) con estas medidas.");
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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

                            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                        }
                    } else if ( js_respuesta.Off_maq_G ){

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

                            var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_total_offset_emp +'"></td><td></td></tr>';

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

                            var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_tot_serigrafia_emp +'"></td><td></td></tr>';

                            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                        }
                    }


                    // Guarda Proceso Digital

                    if ("DigG" in js_respuesta) {

                        var js_variable_extra12 = js_respuesta.DigG; //trae los valores de DigG

                        if ("impresion_digital" in js_variable_extra12) {

                            showModError("No cabe la impresión en Digital(Guada) con estas medidas.");
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

                                    console.log('(6283) Buscando los laminados agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoLam_emp +'</td><td>Tamaño: '+ js_LargoLam_emp +'x'+ js_AnchoLam_emp +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_lam_emp +'</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="prices" value="'+ js_costo_tiro_lam_emp +'"></td></tr><tr><td colspan="2"></td></tr>';

                                    jQuery214('#table_proc_Lam').append(acabadoTr);

                                    $('#tabla_view_acabados').show();   // donde esta este id?

                                    $('#proceso_lam_M1').show();


                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tiro_lam_emp +'"></td><td></td></tr>';

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

                                js_pelicula_costo_unitario_emp = js_pelicula_costo_unitario_emp;


                                if (js_pelicula_costo_unitario_emp <= 0) {

                                    showModError("HotStamping (costo unitario pelicula)");
                                }



                                var js_pelicula_costo_emp = js_respuesta[c][a]['pelicula_costo'];


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

                                    console.log('(6389) Buscando los hoststamping agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoHS_emp +'</td><td>Color: '+ js_ColorHS_emp +'</td><td>Tamaño: '+ js_LargoHS_emp +'x'+ js_AnchoHS_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ js_placa_costo_unitario_emp +'</td><td>'+ js_placa_costo_emp +'</td></tr><tr><td>Pelicula</td><td>'+ js_pelicula_costo_unitario_emp +'</td><td>'+ js_pelicula_costo_emp +'</td></tr><tr><td>Arrego</td><td>'+ js_arreglo_costo_unitario_emp +'</td><td>'+ js_arreglo_costo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_emp +'</td><td>'+ js_estampado_costo_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="prices" value="'+ js_costo_acabadohs_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                                    jQuery214('#table_proc_HS').append(acabadoTr);

                                    $('#tabla_view_acabados').show();

                                    $('#proceso_hs_M1').show();

                                    var parteresumen;


                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabadohs_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabadohs_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabadohs_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabadohs_emp +'"></td><td></td></tr>';

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

                                    console.log('(6481) Buscando los hoststamping agregados');

                                } else {

                                    var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoGrab_emp +'</td><td>Tamaño: '+ js_LargoGrab_emp +'x'+ js_AnchoGrab_emp +'</td><td>Ubicacion: '+ js_Ubicacion_grab_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ js_placa_costo_unitario_grab_emp +'</td><td>'+ js_placa_costo_grab_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_arreglo_costo_unitario_grab_emp +'</td><td>'+ js_arreglo_costo_grab_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_grab_emp +'</td><td>'+ js_estampado_costo_tiro_grab_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="prices" value="'+ js_costo_acabado_grab_emp +'"></td></tr><tr><td colspan="3"></td></tr>';


                                    jQuery214('#table_proc_Grab').append(acabadoTr);

                                    $('#tabla_view_acabados').show();

                                    $('#proceso_grab_M1').show();


                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabado_grab_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabado_grab_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabado_grab_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabado_grab_emp +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }
                            }


                            // Acabados Suaje todos
                            if (c === 'Suaje' || c === 'SuajeFcaj' || c === 'SuajeFcar' || c === 'SuajeG') {

                                var js_tipoGrabadoSuaje = js_respuesta[c][a]['tipoGrabado'];
                                var js_LargoSuaje       = js_respuesta[c][a]['Largo'];
                                var js_AnchoSuaje       = js_respuesta[c][a]['Ancho'];


                                //var js_arreglo_costo_unitario_suaje = js_respuesta[c][a]['arreglo_costo_unitario'];
                                var js_arreglo_costo_unitario_suaje = js_respuesta[c][a]['arreglo'];


                                if (js_arreglo_costo_unitario_suaje <= 0) {

                                    showModError("Suaje (costo unitario arreglo)");
                                }


                                //var js_arreglo_costo_suaje = js_respuesta[c][a]['arreglo_costo_unitario'];
                                var js_arreglo_costo_suaje = js_respuesta[c][a]['arreglo'];
                                var js_estampado_costo_unitario_suaje = js_respuesta[c][a]['tiro_costo_unitario'];


                                if (js_estampado_costo_unitario_suaje <= 0) {

                                    showModError("Suaje (costo unitario " + js_tipoGrabadoSuaje + ")");
                                }


                                var js_estampado_costo_tiro_suaje = js_respuesta[c][a]['costo_tiro'];
                                var js_costo_acabado_suaje = js_respuesta[c][a]['costo_tot_proceso'];

                                if (js_tipoGrabadoSuaje === undefined || js_LargoSuaje === undefined || js_AnchoSuaje === undefined || js_arreglo_costo_unitario_suaje === undefined || js_arreglo_costo_suaje === undefined || js_estampado_costo_unitario_suaje === undefined || js_estampado_costo_tiro_suaje === undefined || js_costo_acabado_suaje === undefined) {

                                    showModError('');
                                    $("#txtContenido").html("");
                                    $("#txtContenido").html("Hay una variable indefinida.");
                                } else {

                                    var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ js_tipoGrabadoSuaje +'</td><td>Tamaño: '+ js_LargoSuaje +'x'+ js_AnchoSuaje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_arreglo_costo_unitario_suaje +'</td><td>'+ js_arreglo_costo_suaje +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_suaje +'</td><td>'+ js_estampado_costo_tiro_suaje +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="prices" value="'+ js_costo_acabado_suaje +'"></td></tr><tr><td colspan="3"></td></tr>';


                                    jQuery214('#table_proc_Suaje').append(acabadoTr);

                                    $('#tabla_view_acabados').show();

                                    $('#proceso_suaje_M1').show();

                                    var parteresumen;

                                    if (js_parte_nombre == 'Empalme del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabado_suaje +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Forro del Cajón') {

                                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabado_suaje +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Forro de la Cartera') {

                                       parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabado_suaje +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (js_parte_nombre == 'Guarda') {

                                        parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabado_suaje +'"></td><td></td></tr>';

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

                                    console.log('(6626) Buscando barniz agregados');

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


                                if (js_tipoGrabadoLaser === undefined || js_costo_unitario_Laser_emp === undefined || js_costo_Laser_emp === undefined) {

                                    console.log('(6697) Buscando Corte Laser agregados');

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

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Offset</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';


                                    if (c == "OffEmp") {

                                        parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "OffFCaj") {

                                        parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "OffFCar") {

                                       parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "OffG") {

                                        parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //digital
                                if (c === "DigEmp" || c === "DigFCaj" || c === "DigFCar" || c === "DigG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Digital</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';


                                    if (c == "DigEmp") {

                                        parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "DigFCaj") {

                                        parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "DigFCar") {

                                       parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "DigG") {

                                        parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //serigrafia
                                if (c === "SerEmp" || c === "SerFCaj" || c === "SerFCar" || c === "SerG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Serigrafia</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';


                                    if (c == "SerEmp") {

                                        parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "SerFCaj") {

                                        parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "SerFCar") {

                                       parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "SerG") {

                                        parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //Laminado
                                if (c === "Laminado" || c === "LaminadoFcaj" || c === "LaminadoFcar" || c === "LaminadoG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Laminado</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';

                                    if (c == "Laminado") {

                                        parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "LaminadoFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "LaminadoFcar") {

                                       parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }


                                    if (c == "LaminadoG") {

                                        parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }


                                //HotStamping
                                if (c === "HotStamping" || c === "HotStampingFcaj" || c === "HotStampingFcar" || c === "HotStampingG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>HotStamping</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';

                                    if (c == "HotStamping") {

                                        parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "HotStampingFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "HotStampingFcar") {

                                       parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "HotStampingG") {

                                        parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }

                                //Grabado
                                if (c === "Grabado" || c === "GrabadoFcaj" || c === "GrabadoFcar" || c === "GrabadoG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Grabado</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';

                                    if (c == "Grabado") {

                                        parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "GrabadoFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "GrabadoFcar") {

                                       parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "GrabadoG") {

                                        parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                                    }
                                }

                                //Suaje
                                if (c === "Suaje" || c === "SuajeFcaj" || c === "SuajeFcar" || c === "SuajeG") {

                                    var mermastr = '<tr>'+ js_color_parte +'<td>Suaje</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m +'</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm +'"></td></tr>';

                                    if (c == "Suaje") {

                                        parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SuajeFcaj") {

                                        parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SuajeFcar") {

                                       parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

                                        jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                                    }

                                    if (c == "SuajeG") {

                                        parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm +'"></td><td></td></tr>';

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

                            tr = '<tr><td>' + js_respuesta['Bancos'][cont]['Tipo_banco'] +'</td><td>' + js_respuesta['Bancos'][cont]['Suaje'] + '</td><td>$' + js_respuesta['Bancos'][cont]['costo_unit_banco'] +'<td>' + js_respuesta['Bancos'][cont]['costo_bancos'] + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ js_respuesta['Bancos'][cont]['costo_bancos'] +'"></td></tr>';

                            $('#tabla_bancos').append(tr);

                            var resumen = '<tr><td></td><td>' + js_respuesta['Bancos'][cont]['Tipo_banco'] +'</td><td></td><td>$'+ js_respuesta['Bancos'][cont]['costo_bancos'] +'<input type="hidden" class="pricesresumenbancos" value="'+ js_respuesta['Bancos'][cont]['costo_bancos'] +'"></td><td></td></tr>';

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
                            var color = "N/A";
                            var tipo = "N/A";
                            if( js_respuesta['Cierres'][cont]['color'] != null ){

                                color = js_respuesta['Cierres'][cont]['color'];
                            }
                            if( js_respuesta['Cierres'][cont]['largo'] != null ){

                                largoAncho = js_respuesta['Cierres'][cont]['largo'] + "x" + js_respuesta['Cierres'][cont]['ancho'];
                            }
                            if( js_respuesta['Cierres'][cont]['tipo'] != null ){

                                tipo = js_respuesta['Cierres'][cont]['tipo'];
                            }

                            tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + js_respuesta['Cierres'][cont]['Tipo_cierre'] +'</td><td>$' + js_respuesta['Cierres'][cont]['costo_unitario'] +'<td>' + js_respuesta['Cierres'][cont]['costo_cierre'] + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ js_respuesta['Cierres'][cont]['costo_cierre'] +'"></td></tr>';

                            $('#tabla_cierres').append(tr);

                            var resumen = '<tr><td></td><td>' + js_respuesta['Cierres'][cont]['Tipo_cierre'] +'</td><td>$'+ js_respuesta['Cierres'][cont]['costo_cierre'] +'<input type="hidden" class="pricesresumenbancos" value="'+ js_respuesta['Cierres'][cont]['costo_cierre'] +'"></td><td></td></tr>';
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

                            tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + js_respuesta['Accesorios'][cont]['Tipo_accesorio'] +'</td><td>$' + js_respuesta['Accesorios'][cont]['costo_unit_accesorio'] +'<td>' + js_respuesta['Accesorios'][cont]['costo_accesorios'] + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ js_respuesta['Accesorios'][cont]['costo_accesorios'] +'"></td></tr>';

                            $('#tabla_accesorios').append(tr);

                            var resumen = '<tr><td></td><td>' + js_respuesta['Accesorios'][cont]['Tipo_accesorio'] +'</td><td></td><td>$'+ js_respuesta['Accesorios'][cont]['costo_accesorios'] +'<input type="hidden" class="pricesresumenbancos" value="'+ js_respuesta['Accesorios'][cont]['costo_accesorios'] +'"></td></tr>';

                            $('#resumenAccesorios').append(resumen);
                        }

                        $('#resumenAccesorios').append("<tr><td></td><td></td><td></td><td>$" + js_respuesta['costo_accesorios'] + "</td></tr>");

                        $('#divAccesorios').show();
                    }

                //DESCUENTOSMIO
                    $("#tdSubtotalCaja").html("$" + js_respuesta['costo_subtotal']);

                    $("#UtilidadDrop").html("$" + js_respuesta['Utilidad']);

                    $("#Totalplus").html("$" + js_respuesta['costo_odt']);

                    $("#IVADrop").html("$" + js_respuesta['iva']);

                    $("#ComisionesDrop").html("$" + js_respuesta['comisiones']);

                    $("#IndirectoDrop").html("$" + js_respuesta['indirecto']);

                    $("#VentasDrop").html("$" + js_respuesta['ventas']);

                    $("#ISRDrop").html("$" + js_respuesta['ISR']);


                    $("#DescuentoDrop").html("$" + js_respuesta['descuento']);


                //final

                    var parteresumen;

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalEmpalme">$0.00</td></tr>';

                    jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

                    //collectTotEmpalme();

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcajon">$0.00</td></tr>';

                    jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen

                    //collectTotFcajon();

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcartera">$0.00</td></tr>';

                    jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

                    //collectTotFcartera();

                    parteresumen = '<tr><td></td><td></td><td></td><td class="totalGuarda">$0.00</td></tr>';

                    jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen

                    //collectTotGuarda();

                   parteresumen = '<tr><td></td><td></td><td><b>Subtotal:</b></td><td class="grand-total"><b>$' + js_respuesta['costo_subtotal'] +'</b></td></tr><tr><td></td><td></td><td>Utilidad: </td><td id="UtilidadResumen">$' + js_respuesta['Utilidad'] + '</td></tr><tr><td></td><td></td><td>IVA:</td><td id="IVAResumen">$' + js_respuesta['iva'] + '</td></tr><tr><td></td><td></td><td>ISR: </td><td id="ISResumen">$' + js_respuesta['ISR'] + '</td></tr><tr><td></td><td></td><td>Comisiones: </td><td id="ComisionesResumen">$ ' + js_respuesta['comisiones'] + '</td></tr><tr><td></td><td></td><td>% Indirecto: </td><td id="IndirectoResumen">$' + js_respuesta['indirecto'] + '</td></tr><tr><td></td><td></td><td>Ventas: </td><td id="ventaResumen">$' + js_respuesta['ventas'] + '</td></tr><tr><td></td><td></td><td>Descuento: </td><td id="descuentoResumen">$' + js_respuesta['descuento'] + '</td></tr><tr><tr><td></td><td></td><td><b>Total: </b></td><td id="TotalResumen"><b>$' + js_respuesta['costo_odt'] + '</b></td></tr>';

                        //<tr><td></td><td></td><td>Descuento: </td><td id="DescuentoResumen" style="color: red;">$0.00</td></tr>

                    jQuery214('#resumenOtros').append(parteresumen); //imprime para el resumen

                    $("#subForm").prop("disabled", false);
            })
            .fail(function(response) {

                console.log('(6112) Error. Revisa.');

                $("#subForm").prop("disabled", true);
            });
        }
    });

    $("#btnModCorrecto").click( function() {

        location.href="<?=URL?>cotizador/getCotizaciones/";

        $("#subForm").prop("disabled", true);
    });


    // graba en la Base de Datos
    $("#subForm2").click( function() {

        if(formData){

            if (formData.length > 0) {

                formData = [];
            }
        }


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

        var cliente  = getIdClient();

        var id_cliente_tmp = JSON.stringify(cliente, null, 4);

        formData.push({name: 'id_cliente', value: id_cliente_tmp});   // calculadora

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

        var modificar_odt = "NO";

        formData.push({name: 'modificar', value: modificar_odt});

        $("#subForm").prop("disabled", true);

        var odt1 = $("#odt-1").val();

        var odtval = [];

        odtval.push({name: 'odt', value: odt1});

        $.ajax({                    // boton GUARDAR(grabar)
            type:"POST",
            async: false,
            //dataType: "json",
            url: $('#caja-form').attr('action'),
            data: formData,
        })
        .done(function( response ) {

            console.log(response);

            try {

                var js_respuesta = JSON.parse( response );
                var error        = js_respuesta.error;

                if (error.length > 0) {

                    showModError("");
                    $("#txtContenido").html("(6231) " + error);

                } else {

                    showModCorrecto("Los datos han sido guardados correctamente...");
                }
            } catch(e) {

                showModError("");
                $("#txtContenido").html("(6240) Error al grabar en la Base de Datos");
            }
        })
        .fail(function(response) {

            console.log('(6245) Bug!');
        });
    });


    jQuery214(document).on("click", ".listimpresiones", function () {

        $(this).closest('tr').remove();

        aImp.length = 0;

        var TableData       = "";
        var tipo_imp_offset = "";

        $("#Imptable tr").each(function(row, tr){

            var opImp   = $(tr).find('td:eq(0)').text(); // IDopImp
            var IDopImp = parseInt($(tr).find('td:eq(1)').text());

            var tintassel_str = $(tr).find('td:eq(3)').text();
            var tintassel     = parseInt(tintassel_str, 10);
            var tipo          = $(tr).find('td:eq(4)').text();

            if (opImp == 'Offset') {

                var idtipoOff = parseInt($("#tipoOffEmp").val());

                aImp.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoOff": idtipoOff});
            } else if (opImp == "Digital") {

                /*var tipo    = $(tr).find('td:eq(3)').text();
                var tipoDig = $(tr).find('td:eq(2)').text();

                var idtipoDig_str = $("#tipoDigFCajon").val();
                var idtipoDig     = parseInt(idtipoDig_str, 10);

                aImp.push({"Tipo_impresion": opImp, "tipo_digital": tipo, "idtipoDig": idtipoDig});*/
                aImp.push({"Tipo_impresion": opImp});

            } else if (opImp == "Serigrafia") {

                var idtipoSeri = parseInt($("#tipoSeriEmp").val());

                aImp.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});
            }
        });

        desactivarBtn();
    });


    jQuery214(document).on("click", ".listimpresionesfcajon", function () {

        $(this).closest('tr').remove();

        aImpFCaj.length = 0;

        var TableData       = "";
        var tipo_imp_offset = "";

        $("#Imptablefcajon tr").each(function(row, tr) {

            var IDopImp       = parseInt($(tr).find('td:eq(1)').text());
            var tintassel_str = $(tr).find('td:eq(3)').text();
            var tintassel     = parseInt(tintassel_str, 10);
            var tipo          = $(tr).find('td:eq(4)').text();

            var opImp = $(tr).find('td:eq(0)').text(); // IDopImp

            if (opImp == 'Offset') {

                var idtipoOff = parseInt($("#tipoOffFcajon").val());

                aImpFCaj.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoOff": idtipoOff});
            } else if (opImp == "Digital") {

                /*var tipo    = $(tr).find('td:eq(3)').text();
                var tipoDig = $(tr).find('td:eq(2)').text();

                var idtipoDig_str = $("#tipoDigFCajon").val();
                var idtipoDig     = parseInt(idtipoDig_str, 10);

                aImpFCaj.push({"Tipo_impresion": opImp, "tipo_digital": tipo, "idtipoDig": idtipoDig});*/
                aImpFCaj.push({"Tipo_impresion": opImp});
            } else if (opImp == "Serigrafia") {

                var idtipoSeri = parseInt($("#tipoSeriFcajon").val());

                aImpFCaj.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});
            }
        });

        desactivarBtn();
    });


    jQuery214(document).on("click", ".listimpresionesfcartera", function () {

        $(this).closest('tr').remove();

        aImpFCar.length = 0;

        $("#Imptablefcartera tr").each(function(row, tr) {

            var IDopImp       = parseInt($(tr).find('td:eq(1)').text());
            var tintassel_str = $(tr).find('td:eq(3)').text();
            var tintassel     = parseInt(tintassel_str, 10);
            var tipo          = $(tr).find('td:eq(4)').text();

            var opImp = $(tr).find('td:eq(0)').text(); // IDopImp

            if (opImp == 'Offset') {

                var idtipoOff = parseInt($("#tipoOffFcartera").val());

                aImpFCar.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoOff": idtipoOff});
            } else if (opImp == "Digital") {

                /*var tipo    = $(tr).find('td:eq(3)').text();
                var tipoDig = $(tr).find('td:eq(2)').text();

                var idtipoDig_str = $("#tipoDigFCajon").val();
                var idtipoDig     = parseInt(idtipoDig_str, 10);

                aImpFCar.push({"Tipo_impresion": opImp, "tipo_digital": tipo, "idtipoDig": idtipoDig});*/
                aImpFCar.push({"Tipo_impresion": opImp});
            } else if (opImp == "Serigrafia") {

                var idtipoSeri = parseInt($("#tipoSeriFcartera").val());

                aImpFCar.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});
            }
        });

        desactivarBtn();
    });


    jQuery214(document).on("click", ".listimpresionesguarda", function () {

        $(this).closest('tr').remove();

        aImpG.length = 0;

        var TableData       = "";
        var tipo_imp_offset = "";

        $("#Imptableguarda tr").each(function(row, tr) {

            var IDopImp       = parseInt($(tr).find('td:eq(1)').text());
            var tintassel_str = $(tr).find('td:eq(3)').text();
            var tintassel     = parseInt(tintassel_str, 10);
            var tipo          = $(tr).find('td:eq(4)').text();

            var opImp = $(tr).find('td:eq(0)').text(); // IDopImp

            if (opImp == 'Offset') {

                var idtipoOff = parseInt($("#tipoOffGuarda").val());

                aImpG.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoOff": idtipoOff});
            } else if (opImp == "Digital") {

                /*var tipo    = $(tr).find('td:eq(3)').text();
                var tipoDig = $(tr).find('td:eq(2)').text();

                var idtipoDig_str = $("#tipoDigFCajon").val();
                var idtipoDig     = parseInt(idtipoDig_str, 10);

                aImpG.push({"Tipo_impresion": opImp, "tipo_digital": tipo, "idtipoDig": idtipoDig});*/
                aImpG.push({"Tipo_impresion": opImp});
            } else if (opImp == "Serigrafia") {

                var idtipoSeri = parseInt($("#tipoSeriGuarda").val());

                aImpG.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipo, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});
            }
        });

        desactivarBtn();
    });


    jQuery214(document).on("click", ".delete", function () {

        $(this).closest('tr').remove();

    });

</script>

<!-- boton de impresiones -->
<script type="text/javascript">

    /* -------- Activa los div de los select impresiones ---------*/
    document.getElementById('miSelect').onchange = function(event) {

        var opcionact = document.getElementById('miSelect').value;

        switch(opcionact){

            case "Offset":
                hideSelectImp('opImpresionOffset');
            break;
            case "Digital":
                hideSelectImp('opImpresionDigital');
            break;
            case "Serigrafia":
                hideSelectImp('opImpresionSerigrafia');
            break;

        }
    }

    document.getElementById('miSelectFcajon').onchange = function(event) {

        var opcionact = document.getElementById('miSelectFcajon').value;

        switch(opcionact){

            case "Offset":
                hideSelectImp('opImpresionOffsetFcajon');
            break;
            case "Digital":
                hideSelectImp('opImpresionDigitalFcajon');
            break;
            case "Serigrafia":
                hideSelectImp('opImpresionSerigrafiaFcajon');
            break;
        }
    }


    document.getElementById('miSelectFcartera').onchange = function(event) {

        var opcionact = document.getElementById('miSelectFcartera').value;

        switch(opcionact){

            case "Offset":
                hideSelectImp('opImpresionOffsetFcartera');
            break;
            case "Digital":
                hideSelectImp('opImpresionDigitalFcartera');
            break;
            case "Serigrafia":
                hideSelectImp('opImpresionSerigrafiaFcartera');
            break;
        }
    }


    document.getElementById('miSelectGuarda').onchange = function(event) {

        var opcionact = document.getElementById('miSelectGuarda').value;

        switch(opcionact){

            case "Offset":
                hideSelectImp('opImpresionOffsetGuarda');
            break;
            case "Digital":
                hideSelectImp('opImpresionDigitalGuarda');
            break;
            case "Serigrafia":
                hideSelectImp('opImpresionSerigrafiaGuarda');
            break;
        }
    }

    $(document).on('click', '#btnImpresiones', function(event) {

        var IDopImp  = $("#miSelect option:selected").data('id');
        var opImp    = $("#miSelect option:selected").text();
        var precio   = $("#miSelect option:selected").data('precio'); //precio unitario


        //para Offset
        var tipoOffset     = $("#SelectImpTipoOff option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOff option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOff option:selected").data('id');
        var tintassel      = document.getElementById('tintasO').value;


        //para digital
        //var tipoDig   = $("#SelectImpDigital option:selected").text();
        //var idtipoDig = $("#SelectImpDigital option:selected").data('id');


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

                var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none">'+ IDopImp +'<input id="IDopImpOfEmp" name="IDopImpOfEmp" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel +'<input id="tintasselOfEmp" name="tintasselOfEmp" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset +'<input id="tipoOffEmp" name="tipoOffEmp" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresiones img_delete"></td></tr>';

                aImp.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresiones').modal('hide');

                jQuery214('#listimpresiones').append(imp);

                vacioModalImpresiones();
            }
        }


        if (opImp == 'Digital') {

            var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td class="CellWithComment">...<span class="CellComment">Se agregó una impresión digital</span></td><td class="listimpresiones img_delete"></td></tr>';
            aImp.push({"Tipo_impresion": opImp});

            $('#Impresiones').modal('hide');

            jQuery214('#listimpresiones').append(imp);

            vacioModalImpresiones();
            /*var nuloo = document.getElementById('SelectImpDigital').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp').innerHTML = "";

                //var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none"><input id="IDopImpDiEmp" name="IDopImpDiEmp" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipoDig + '</span></td><td class="tipoDig" style="display: none;">'+ tipoDig +'<input id="tipoDigEmp" name="tipoDigEmp" type="hidden" value="'+ idtipoDig +'"></td><td class="listimpresiones img_delete"></td></tr>';

                var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td></td><td class="listimpresiones img_delete"></td></tr>';

                //aImp.push({"Tipo_impresion": opImp, "tipo_digital": tipoDig, "idtipoDig": idtipoDig});
                aImp.push({"Tipo_impresion": opImp});

                $('#Impresiones').modal('hide');

                jQuery214('#listimpresiones').append(imp);

                vacioModalImpresiones();
            }*/
        }


        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeri').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp').innerHTML = "";

                var imp  = '<tr id="ImpSerEmp"><td class="textImp">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpSerEmp" name="IDopImpSerEmp" style="display:none" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel2 +'<input id="tintasselSerEmp" name="tintasselSerEmp" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeri" style="display: none;">'+ tipoSeri +'<input id="tipoSeriEmp" name="tipoSeriEmp" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresiones img_delete"></td></tr>';

                aImp.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresiones').modal('hide');

                jQuery214('#listimpresiones').append(imp);

                vacioModalImpresiones();
            }
        }

        activarBtn();
    });


    $(document).on('click', '#btnImpresionesFcajon', function(event) {

        var IDopImp  = $("#miSelectFcajon option:selected").data('id');
        var opImp    = $("#miSelectFcajon option:selected").text();
        var precio   = $("#miSelectFcajon option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOffFcajon option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOffFcajon option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOffFcajon option:selected").data('id');
        var tintassel      = document.getElementById('tintasOFcajon').value;

        //para digital

        //var tipoDig   = $("#SelectImpDigitalFCajon option:selected").text();
        //var idtipoDig = $("#SelectImpDigitalFCajon option:selected").data('id');

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeriFcajon option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeriFcajon option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeriFcajon option:selected").data('id');
        var tintassel2     = document.getElementById('tintasSFcajon').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';


        if (opImp == 'Offset') {

            var nuloo = document.getElementById('SelectImpTipoOffFcajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp2').innerHTML = "";

                var imp  = '<tr id="ImpOfFcajon"><td class="textImp">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpOfFcajon" name="IDopImpOfFcajon" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImpFcajon" style="display: none;">'+ tintassel + '<input id="tintasselOfFcajon" name="tintasselOfFcajon" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset + '<input id="tipoOffFcajon" name="tipoOffFcajon" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresionesfcajon img_delete"></td></tr>';

                aImpFCaj.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresionesfcajon').modal('hide');

                jQuery214('#listimpresionesfcajon').append(imp);

                vacioModalImpresiones();
            }
        }


        if (opImp == 'Digital') {

            var imp  = '<tr id="ImpOfFcajon"><td class="textImp">' + opImp + '</td><td class="CellWithComment">...<span class="CellComment">Se agregó una impresión digital</span></td><td class="listimpresionesfcajon img_delete"></td></tr>';
            aImpFCaj.push({"Tipo_impresion": opImp});

            $('#Impresionesfcajon').modal('hide');

            jQuery214('#listimpresionesfcajon').append(imp);

            vacioModalImpresiones();

            /*var nuloo = document.getElementById('SelectImpDigitalFCajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp2').innerHTML = "";

                var imp  = '<tr id="ImpOfFcajon"><td class="textImp">' + opImp + '</td><td style="display: none"><input id="IDopImpDigFcajon" name="IDopImpDigFcajon" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipoDig + '</span></td><td class="tipoDig" style="display: none;">'+ tipoDig +'<input id="tipoDigFCajon" name="tipoDigFCajon" type="hidden" value="'+ idtipoDig +'"></td><td class="listimpresionesfcajon img_delete"></td></tr>';

                aImpFCaj.push({"Tipo_impresion": opImp, "tipo_digital": tipoDig, "idtipoDig": idtipoDig});

                $('#Impresionesfcajon').modal('hide');

                jQuery214('#listimpresionesfcajon').append(imp);

                vacioModalImpresiones();
            }*/
        }


        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeriFcajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp2').innerHTML = "";

                var imp  = '<tr id="ImpSerFcajon"><td class="textImpFcajon">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpSerFcajon" name="IDopImpSerFcajon" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImpFcajon" style="display: none;">'+ tintassel2 +'<input id="tintasselSerFcajon" name="tintasselSerFcajon" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeriFcajon" style="display: none;">'+ tipoSeri +'<input id="tipoSeriFcajon" name="tipoSeriFcajon" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresionesfcajon img_delete"></td></tr>';

                aImpFCaj.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresionesfcajon').modal('hide');

                jQuery214('#listimpresionesfcajon').append(imp);

                vacioModalImpresiones();
            }
        }


        activarBtn();
    });


    $(document).on('click', '#btnImpresionesFcartera', function(event) {

        var IDopImp  = $("#miSelectFcartera option:selected").data('id');
        var opImp    = $("#miSelectFcartera option:selected").text();
        var precio   = $("#miSelectFcartera option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOffFcartera option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOffFcartera option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOffFcartera option:selected").data('id');
        var tintassel      = document.getElementById('tintasOFcartera').value;

        //para digital

        //var tipoDig   = $("#SelectImpDigitalFCartera option:selected").text();
        //var idtipoDig = $("#SelectImpDigitalFCartera option:selected").data('id');

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeriFcartera option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeriFcartera option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeriFcartera option:selected").data('id');
        var tintassel2     = document.getElementById('tintasSFcartera').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opImp == 'Offset') {

            var nuloo = document.getElementById('SelectImpTipoOffFcartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp3').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp3').innerHTML = "";

                var imp  = '<tr id="ImpOfFcartera"><td class="textImpFcartera">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpOfFcartera" name="IDopImpOfFcartera" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImpFcartera" style="display: none;">'+ tintassel + '<input id="tintasselOfFcartera" name="tintasselOfFcartera" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset + '<input id="tipoOffFcartera" name="tipoOffFcartera" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresionesfcartera img_delete"></td></tr>';

                aImpFCar.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresionesfcartera').modal('hide');

                jQuery214('#listimpresionesfcartera').append(imp);

                vacioModalImpresiones();
            }
        }


        if (opImp == 'Digital') {

            var imp  = '<tr id="ImpDigFcartera"><td class="textImp">' + opImp + '</td><td class="CellWithComment">...<span class="CellComment">Se agregó una impresión digital</span></td><td class="listimpresionesfcartera img_delete"></td></tr>';
            aImpFCar.push({"Tipo_impresion": opImp});

            $('#Impresionesfcartera').modal('hide');

            jQuery214('#listimpresionesfcartera').append(imp);

            vacioModalImpresiones();
            /*var nuloo = document.getElementById('SelectImpDigitalFCartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp3').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp3').innerHTML = "";

                var imp  = '<tr id="ImpDigFcartera"><td class="textImpFcartera">' + opImp + '</td><td style="display: none"><input id="IDopImpDigFcartera" name="IDopImpDigFcartera" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipoDig + '</span></td><td class="tipoDig" style="display: none;">'+ tipoDig +'<input id="tipoDigFCartera" name="tipoDigFCartera" type="hidden" value="'+ idtipoDig +'"></td><td class="listimpresionesfcartera img_delete"></td></tr>';

                aImpFCar.push({"Tipo_impresion": opImp, "tipo_digital": tipoDig, "idtipoDig": idtipoDig});

                $('#Impresionesfcartera').modal('hide');

                jQuery214('#listimpresionesfcartera').append(imp);

                vacioModalImpresiones();
            }*/
        }


        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeriFcartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp3').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp3').innerHTML = "";

                var imp  = '<tr id="ImpSerFcartera"><td class="textImpFcartera">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpSerFcartera" name="IDopImpSerFcartera" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImpFcartera" style="display: none;">'+ tintassel2 +'<input id="tintasselSerFcartera" name="tintasselSerFcartera" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeriFcartera" style="display: none;">'+ tipoSeri +'<input id="tipoSeriFcartera" name="tipoSeriFcartera" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresionesfcartera img_delete"></td></tr>';



                aImpFCar.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresionesfcartera').modal('hide');

                jQuery214('#listimpresionesfcartera').append(imp);

                vacioModalImpresiones();
            }
        }

        activarBtn();
    });


    $(document).on('click', '#btnImpresionesGuarda', function(event) {

        var IDopImp  = $("#miSelectGuarda option:selected").data('id');
        var opImp    = $("#miSelectGuarda option:selected").text();
        var precio   = $("#miSelectGuarda option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOffGuarda option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOffGuarda option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOffGuarda option:selected").data('id');
        var tintassel      = document.getElementById('tintasOGuarda').value;

        //para digital

        //var tipoDig   = $("#SelectImpDigitalG option:selected").text();
        //var idtipoDig = $("#SelectImpDigitalG option:selected").data('id');

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeriGuarda option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeriGuarda option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeriGuarda option:selected").data('id');
        var tintassel2     = document.getElementById('tintasSGuarda').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';


        if (opImp == 'Offset') {

                var nuloo = document.getElementById('SelectImpTipoOffGuarda').value;


                if (nuloo == 'selected') {

                    document.getElementById('alerterrorimp4').innerHTML = alertDiv;

                } else {

                    document.getElementById('alerterrorimp4').innerHTML = "";

                    var imp  = '<tr id="ImpOfGuarda"><td class="textImpGuarda">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpOfGuarda" name="IDopImpOfGuarda" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImpGuarda" style="display: none;">'+ tintassel + '<input id="tintasselOfGuarda" name="tintasselOfGuarda" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset + '<input id="tipoOffGuarda" name="tipoOffGuarda" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresionesguarda img_delete"></td></tr>';

                    aImpG.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                    $('#Impresionesguarda').modal('hide');

                    jQuery214('#listimpresionesguarda').append(imp);

                    vacioModalImpresiones();
                }
        }


        if (opImp == 'Digital') {

            var imp  = '<tr id="ImpDigGuarda"><td class="textImp">' + opImp + '</td><td class="CellWithComment">...<span class="CellComment">Se agregó una impresión digital</span></td><td class="listimpresionesguarda img_delete"></td></tr>';
            aImpG.push({"Tipo_impresion": opImp});

            $('#Impresionesguarda').modal('hide');

            jQuery214('#listimpresionesguarda').append(imp);

            vacioModalImpresiones();
            /*var nuloo = document.getElementById('SelectImpDigitalG').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterrorimp2').innerHTML = "";

                var imp  = '<tr id="ImpDigGuarda"><td class="textImpGuarda">' + opImp + '</td><td style="display: none"><input id="IDopImpDigGuarda" name="IDopImpDigGuarda" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipoDig + '</span></td><td class="tipoDig" style="display: none;">'+ tipoDig +'<input id="tipoDigGuarda" name="tipoDigGuarda" type="hidden" value="'+ idtipoDig +'"></td><td class="listimpresionesguarda img_delete"></td></tr>';

                aImpG.push({"Tipo_impresion": opImp, "tipo_digital": tipoDig, "idtipoDig": idtipoDig});

                $('#Impresionesguarda').modal('hide');

                jQuery214('#listimpresionesguarda').append(imp);

                vacioModalImpresiones();
            }*/
        }


        if (opImp == 'Serigrafia') {

                var nuloo = document.getElementById('SelectImpTipoSeriGuarda').value;

                if (nuloo == 'selected') {

                    document.getElementById('alerterrorimp4').innerHTML = alertDiv;

                } else {

                    document.getElementById('alerterrorimp4').innerHTML = "";

                    var imp  = '<tr id="ImpSerGuarda"><td class="textImpGuarda">' + opImp +'</td><td style="display: none">'+ IDopImp +'<input id="IDopImpSerGuarda" name="IDopImpSerGuarda" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImpGuarda" style="display: none;">'+ tintassel2 +'<input id="tintasselSerGuarda" name="tintasselSerGuarda" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeriGuarda" style="display: none;">'+ tipoSeri +'<input id="tipoSeriGuarda" name="tipoSeriGuarda" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresionesguarda img_delete"></td></tr>';

                    aImpG.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                    $('#Impresionesguarda').modal('hide');

                    jQuery214('#listimpresionesguarda').append(imp);

                    vacioModalImpresiones();
                }
        }

        activarBtn();
    });
</script>


<script>

    $("#btnCheckPaper").click( function() {

        var chk   =$("#btnCheckPaper").prop("checked");
        var texto = $("#interior_cajon_chosen span").html();


        if(chk) {

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

<script>

    //Activa los div de los select acabados en parte empalme del cajon -------
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


    //Activa los div de los select acabados en parte forro del cajon ---------
    document.getElementById('SelectAcFcajon').onchange = function(event) {

        var opcionact = document.getElementById('SelectAcFcajon').value;

        $('#opAcLaminadoFcajon').hide('slow');
        $('#opAcHotStampingFcajon').hide('slow');
        $('#opAcGrabadoFcajon').hide('slow');
        $('#opAcEspecialesFcajon').hide('slow');
        $('#opAcBarnizUVFcajon').hide('slow');
        $('#opAcSuajeFcajon').hide('slow');
        $('#opAcLaserFcajon').hide('slow');
        $('#opAcBarUVFcajon').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoFcajon').show('normal');
        }


        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingFcajon').show('normal');
        }


        if (opcionact == 'Grabado') {

            $('#opAcGrabadoFcajon').show('normal');
        }


        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesFcajon').show('normal');
        }


        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVFcajon').show('normal');
        }


        if (opcionact == 'Suaje') {

            $('#opAcSuajeFcajon').show('normal');
        }


        if (opcionact == 'Corte Laser') {

            $('#opAcLaserFcajon').show('normal');
        }


        document.getElementById('SelectBarnizUVFcajon').onchange = function(event) {

            var seleccion = document.getElementById('SelectBarnizUVFcajon').value;


            if (seleccion == 'Registro Mate') {

                $('#opAcBarUVFcajon').show('normal');
            }


            if (seleccion == 'Mate') {

                $('#opAcBarUVFcajon').hide('normal');
            }


            if (seleccion == 'Brillante') {

                $('#opAcBarUVFcajon').hide('normal');
            }


            if (seleccion == 'Registro Brillante') {

                $('#opAcBarUVFcajon').show('normal');
            }

        }


        document.getElementById('SelectUbiGrabFcajon').onchange = function(event) {

            var ubicacion = document.getElementById('SelectUbiGrabFcajon').value;


            if (ubicacion == 'Lomo') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }


            if (ubicacion == 'Cierre') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }


            if (ubicacion == 'Tapa') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }


            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }


            if (ubicacion == 'Derecho') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }


            if (ubicacion == 'Fondo') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    //Activa los div de los select acabados en parte forro de la cartera------
    document.getElementById('SelectAcFcartera').onchange = function(event) {

        var opcionact = document.getElementById('SelectAcFcartera').value;

        $('#opAcLaminadoFcartera').hide('slow');
        $('#opAcHotStampingFcartera').hide('slow');
        $('#opAcGrabadoFcartera').hide('slow');
        $('#opAcEspecialesFcartera').hide('slow');
        $('#opAcBarnizUVFcartera').hide('slow');
        $('#opAcSuajeFcartera').hide('slow');
        $('#opAcLaserFcartera').hide('slow');
        $('#opAcBarUVFcartera').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoFcartera').show('normal');
        }


        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingFcartera').show('normal');
        }


        if (opcionact == 'Grabado') {

            $('#opAcGrabadoFcartera').show('normal');
        }


        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesFcartera').show('normal');
        }


        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVFcartera').show('normal');
        }


        if (opcionact == 'Suaje') {

            $('#opAcSuajeFcartera').show('normal');
        }


        if (opcionact == 'Corte Laser') {

            $('#opAcLaserFcartera').show('normal');
        }


        document.getElementById('SelectBarnizUVFcartera').onchange = function(event) {

            var seleccion = document.getElementById('SelectBarnizUVFcartera').value;


            if (seleccion == 'Registro Mate') {

                $('#opAcBarUVFcartera').show('normal');
            }


            if (seleccion == 'Mate') {

                $('#opAcBarUVFcartera').hide('normal');
            }


            if (seleccion == 'Brillante') {

                $('#opAcBarUVFcartera').hide('normal');
            }


            if (seleccion == 'Registro Brillante') {

                $('#opAcBarUVFcartera').show('normal');
            }

        }


        document.getElementById('SelectUbiGrabFcartera').onchange = function(event) {

            var ubicacion = document.getElementById('SelectUbiGrabFcartera').value;


            if (ubicacion == 'Lomo') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }


            if (ubicacion == 'Cierre') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }


            if (ubicacion == 'Tapa') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }


            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }


            if (ubicacion == 'Derecho') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }


            if (ubicacion == 'Fondo') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    //Activa los div de los select acabados en parte guarda------
    document.getElementById('SelectAcGuarda').onchange = function(event) {

        var opcionact = document.getElementById('SelectAcGuarda').value;

        $('#opAcLaminadoGuarda').hide('slow');
        $('#opAcHotStampingGuarda').hide('slow');
        $('#opAcGrabadoGuarda').hide('slow');
        $('#opAcEspecialesGuarda').hide('slow');
        $('#opAcBarnizUVGuarda').hide('slow');
        $('#opAcSuajeGuarda').hide('slow');
        $('#opAcLaserGuarda').hide('slow');
        $('#opAcBarUVguarda').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoGuarda').show('normal');
        }


        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingGuarda').show('normal');
        }


        if (opcionact == 'Grabado') {

            $('#opAcGrabadoGuarda').show('normal');
        }


        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesGuarda').show('normal');
        }


        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVGuarda').show('normal');
        }


        if (opcionact == 'Suaje') {

            $('#opAcSuajeGuarda').show('normal');
        }


        if (opcionact == 'Corte Laser') {

            $('#opAcLaserGuarda').show('normal');
        }


        document.getElementById('SelectBarnizUVGuarda').onchange = function(event) {

            var seleccion = document.getElementById('SelectBarnizUVGuarda').value;


            if (seleccion == 'Registro Mate') {

                $('#opAcBarUVguarda').show('normal');
            }


            if (seleccion == 'Mate') {

                $('#opAcBarUVguarda').hide('normal');
            }


            if (seleccion == 'Brillante') {

                $('#opAcBarUVguarda').hide('normal');
            }


            if (seleccion == 'Registro Brillante') {

                $('#opAcBarUVguarda').show('normal');
            }
        }


        // Ubicacion de la impresion
        document.getElementById('SelectUbiGrabGuarda').onchange = function(event) {

            var ubicacion = document.getElementById('SelectUbiGrabGuarda').value;


            if (ubicacion == 'Lomo') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }


            if (ubicacion == 'Cierre') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }


            if (ubicacion == 'Tapa') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }


            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }


            if (ubicacion == 'Derecho') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }


            if (ubicacion == 'Fondo') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    // -------- onclick Guardar de modales acabados (tr)---------
    $(document).on('click', '#btnAcabados', function(event) {

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

                var acb  = '<tr id="AcLamEmp"><td style="text-align: left;" class="textAcbEmp">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipoLaminado +'<input id="tipoLaminadoEmp" name="tipoLaminadoEmp" type="hidden" value="'+ idtipoLaminado +'"></td><td class="listacabadosemp img_delete"></td></tr>';


                aAcb.push({"Tipo_acabado": opAcb, "IDopAcb": IDopAcb, "tipoGrabado": tipoLaminado, "idtipoLaminado": idtipoLaminado});


                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

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

                var acb  = '<tr id="AcHSEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td class="tipoAcabadoHS" style="display: none;" >'+ tipoGrabadoHS +'<input id="tipoAcabadoHS" name="tipoAcabadoHS" type="hidden" value="'+ idtipoHS +'"></td><td class="idcolorHS" style="display: none;" >' + idcolorHS + '<input id="idcolorHS" name="idcolorHS" type="hidden" value="'+ idcolorHS +'"></td><td class="ColorHS" style="display: none;" >' + ColorHS + '<input id="ColorHS" name="ColorHS" type="hidden" value="'+ ColorHS +'"></td><td class="LargoHS" style="display: none;">'+ LargoHS_ver +'<input id="LargoHS" name="LargoHS" type="hidden" value="'+ LargoHS_ver +'"></td><td class="AnchoHS" style="display: none;">'+ AnchoHS_ver +'<input id="AnchoHS" name="AnchoHS" type="hidden" value="'+ AnchoHS_ver +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);

                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});


                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

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

                var acb  = '<tr id="AcGrabEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td class="tipoGrabadoG" style="display: none;">'+ tipoGrabadoG +'<input id="tipoGrabadoG" name="tipoGrabadoG" type="hidden" value="'+ idtipoGrabado +'"></td><td class="LargoGrab" style="display: none;">'+ LargoGrab +'</td><td class="AnchoGrab" style="display: none;">'+ AnchoGrab +'</td><td class="ubicacionGrab" style="display: none;">'+ ubicacionGrab +'<input id="ubicacionGrab" name="ubicacionGrab" type="hidden" value="'+ ubicacionGrab +'"></td><td class="listacabadosemp img_delete"></td></tr>';


                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});


                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcSuajeEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosemp img_delete"></td></tr>';


                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

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

                var acb = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipoLaser + ', Medidas: ' + LargoLaser + 'x' +  AnchoLaser + '</span></td><td class="tipoLaser" style="display: none;">' + tipoLaser + '<input id="tipoLaser" name="tipoLaser" type="hidden" value="' + idtipoLaser + '"></td><td class="LargoLaser" style="display: none;">' + LargoLaser + '<input id="LargoLaser" name="LargoLaser" type="hidden" value="' + LargoLaser + '"></td><td class="AnchoLaser" style="display: none;">' + AnchoLaser + '<input id="AnchoLaser" name="AnchoLaser" type="hidden" value="' + AnchoLaser + '"></td><td class="listacabadosemp img_delete"></td></tr>';

                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaser, "LargoLaser": LargoLaser, "AnchoLaser": AnchoLaser});

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

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

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + ', Medidas: ' + LargoBarnizUV + 'x' + AnchoBarnizUV +'</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + LargoBarnizUV + '<input id="LargoBarnizUVEmp" name="LargoBarnizUVEmp" type="hidden" value="' + LargoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + AnchoBarnizUV + '<input id="AnchoBarnizUVEmp" name="AnchoBarnizUVEmp" type="hidden" value="' + AnchoBarnizUV + '"></td><td class="listacabadosemp img_delete"></td></tr>';

                    aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": LargoBarnizUV, "Ancho": AnchoBarnizUV});
                } else {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="listacabadosemp img_delete"></td></tr>';

                    aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": null, "Ancho": null});
                }

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Pegados Especiales') {

            var nulo1 = document.getElementById('SelectEspecialesEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcEspecialesEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoEspeciales +'</span></td><td class="tipoEspeciales" style="display: none">'+ tipoEspeciales +'<input id="tipoEspeciales" name="tipoEspeciales" type="hidden" value="'+ idtipoEspeciales +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        activarBtn();
    });


    $(document).on('click', '#btnAcabadosfcajon', function(event) {

        var IDopAcb  = $("#SelectAcFcajon option:selected").data('id');
        var opAcb    = $("#SelectAcFcajon option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoFcajon option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoFcajon option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSFcajon option:selected").text();
        var idtipoHS        = $("#SelectHSFcajon option:selected").data('id');
        var ColorHS         = $("#SelectColorHSFcajon option:selected").text();
        var idcolorHS       = $("#SelectHSFcajon option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_fcajon').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_fcajon').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabFcajon option:selected").text();
        var LargoGrab     = document.getElementById('LargoGrab_fcajon').value;
        var AnchoGrab     = document.getElementById('AnchoGrab_fcajon').value;
        var ubicacionGrab = $("#SelectUbiGrabFcajon option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesFcajon option:selected").text();

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVFcajon option:selected").text();
        var idtipoBarnizUV = $("#SelectHSFcajon option:selected").data('id');
        var LargoBarnizUV  = document.getElementById('LargoBarUVFcajon').value;
        var AnchoBarnizUV  = document.getElementById('AnchoBarUVFcajon').value;

        //para suaje
        var tipoSuaje   = $("#SelectSuajeFcajon option:selected").text();
        var LargoSuaje  = document.getElementById('LargoSuaje_fcajon').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje_fcajon').value;


        //para laser
        var tipoLaser   = $("#SelectLaserFcajon option:selected").text();
        var idtipoLaser = $("#SelectHSFcajon option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser_fcajon').value;
        var AnchoLaser  = document.getElementById('AnchoLaser_fcajon').value;


        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';


        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoFcajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror2').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td style="display: none">'+ tipoLaminado +'</td><td class="listacabadosfcajon img_delete"></td></tr>';


                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaminado});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSFcajon').value;
            var nulo2 = document.getElementById('SelectColorHSFcajon').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror2').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td style="display: none;" >'+ tipoGrabadoHS +'</td><td style="display: none;" >' + ColorHS + '</td><td style="display: none;">'+ LargoHS_ver +'</td><td style="display: none;">'+ AnchoHS_ver +'</td><td class="listacabadosfcajon img_delete"></td></tr>';


                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);

                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabFcajon').value;
            var nulo2 = document.getElementById('SelectUbiGrabFcajon').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror2').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror2').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td style="display: none;">'+ tipoGrabadoG +'</td><td style="display: none;">'+ LargoGrab +'</td><td style="display: none;">'+ AnchoGrab +'</td><td style="display: none;">'+ ubicacionGrab +'</td><td class="listacabadosfcajon img_delete"></td></tr>';


                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});


                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeFcajon').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosfcajon img_delete"></td></tr>';


                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Barniz UV')  {

            var nulo1 = document.getElementById('SelectBarnizUVFcajon').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                if (tipoBarnizUV === 'undefined' || tipoBarnizUV === 'null') {

                    tipoBarnizUV = '';
                }

                if(tipoBarnizUV == "Registro Mate" || tipoBarnizUV == "Registro Brillante") {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + ', Medidas: ' + LargoBarnizUV + 'x' + AnchoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + LargoBarnizUV + '<input id="LargoBarnizUVEmp" name="LargoBarnizUVEmp" type="hidden" value="' + LargoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + AnchoBarnizUV + '<input id="AnchoBarnizUVEmp" name="AnchoBarnizUVEmp" type="hidden" value="' + AnchoBarnizUV + '"></td><td class="listacabadosfcajon img_delete"></td></tr>';

                    aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": LargoBarnizUV, "Ancho": AnchoBarnizUV});
                } else {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="listacabadosfcajon img_delete"></td></tr>';

                    aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": null, "Ancho": null});
                }

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Corte Laser')  {

            var nulo1 = document.getElementById('SelectLaserFcajon').value;

            if (nulo1 == 'selected')  {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var LargoLaser = parseInt(LargoLaser, 10);
                var AnchoLaser = parseInt(AnchoLaser, 10);

                var acb = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipoLaser + ', Medidas: ' + LargoLaser + 'x' +  AnchoLaser + '</span></td><td class="tipoLaser" style="display: none;">' + tipoLaser + '<input id="tipoLaser" name="tipoLaser" type="hidden" value="' + idtipoLaser + '"></td><td class="LargoLaser" style="display: none;">' + LargoLaser + '<input id="LargoLaser" name="LargoLaser" type="hidden" value="' + LargoLaser + '"></td><td class="AnchoLaser" style="display: none;">' + AnchoLaser + '<input id="AnchoLaser" name="AnchoLaser" type="hidden" value="' + AnchoLaser + '"></td><td class="listacabadosfcajon img_delete"></td></tr>';

                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaser, "LargoLaser": LargoLaser, "AnchoLaser": AnchoLaser});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }

        activarBtn();
    });


    $(document).on('click', '#btnAcabadosfcartera', function(event) {

        var IDopAcb  = $("#SelectAcFcartera option:selected").data('id');
        var opAcb    = $("#SelectAcFcartera option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoFcartera option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoFcartera option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSFcartera option:selected").text();
        var idtipoHS        = $("#SelectHSFcartera option:selected").data('id');
        var ColorHS         = $("#SelectColorHSFcartera option:selected").text();
        var idcolorHS       = $("#SelectHSFcartera option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_fcartera').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_fcartera').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabFcartera option:selected").text();
        var LargoGrab     = document.getElementById('LargoGrab_fcartera').value;
        var AnchoGrab     = document.getElementById('AnchoGrab_fcartera').value;
        var ubicacionGrab = $("#SelectUbiGrabFcartera option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesFcartera option:selected").text();

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVFcartera option:selected").text();
        var idtipoBarnizUV = $("#SelectHSFcartera option:selected").data('id');
        var LargoBarnizUV  = document.getElementById('LargoBarUVFcartera').value;
        var AnchoBarnizUV  = document.getElementById('AnchoBarUVFcartera').value;

        //para suaje
        var tipoSuaje   = $("#SelectSuajeFcartera option:selected").text();
        var LargoSuaje  = document.getElementById('LargoSuaje_fcartera').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje_fcartera').value;

        //para laser
        var tipoLaser   = $("#SelectLaserFcartera option:selected").text();
        var idtipoLaser = $("#SelectHSFcartera option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser_fcartera').value;
        var AnchoLaser  = document.getElementById('AnchoLaser_fcartera').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoFcartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror3').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror3').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td style="display: none">'+ tipoLaminado +'</td><td class="listacabadosfcartera img_delete"></td></tr>';


                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaminado});


                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSFcartera').value;
            var nulo2 = document.getElementById('SelectColorHSFcartera').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror3').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror3').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td style="display: none;" >'+ tipoGrabadoHS +'</td><td style="display: none;" >' + ColorHS + '</td><td style="display: none;">'+ LargoHS_ver +'</td><td style="display: none;">'+ AnchoHS_ver +'</td><td class="listacabadosfcartera img_delete"></td></tr>';


                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);

                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});


                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabFcartera').value;
            var nulo2 = document.getElementById('SelectUbiGrabFcartera').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror3').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror3').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td style="display: none;">'+ tipoGrabadoG +'</td><td style="display: none;">'+ LargoGrab +'</td><td style="display: none;">'+ AnchoGrab +'</td><td style="display: none;">'+ ubicacionGrab +'</td><td class="listacabadosfcartera img_delete"></td></tr>';


                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});

                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeFcartera').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosfcartera img_delete"></td></tr>';


                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Barniz UV')  {

            var nulo1 = document.getElementById('SelectBarnizUVFcartera').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";


                if (tipoBarnizUV === 'undefined' || tipoBarnizUV === 'null') {

                    tipoBarnizUV = '';
                }


                if(tipoBarnizUV == "Registro Mate" || tipoBarnizUV == "Registro Brillante") {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + ', Medidas: ' + LargoBarnizUV + 'x' + AnchoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + LargoBarnizUV + '<input id="LargoBarnizUVEmp" name="LargoBarnizUVEmp" type="hidden" value="' + LargoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + AnchoBarnizUV + '<input id="AnchoBarnizUVEmp" name="AnchoBarnizUVEmp" type="hidden" value="' + AnchoBarnizUV + '"></td><td class="listacabadosfcartera img_delete"></td></tr>';

                    aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": LargoBarnizUV, "Ancho": AnchoBarnizUV});
                } else {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="listacabadosfcartera img_delete"></td></tr>';

                    aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": null, "Ancho": null});
                }

                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Corte Laser')  {

            var nulo1 = document.getElementById('SelectLaserFcartera').value;

            if (nulo1 == 'selected')  {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var LargoLaser = parseInt(LargoLaser, 10);
                var AnchoLaser = parseInt(AnchoLaser, 10);

                var acb = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipoLaser + ', Medidas: ' + LargoLaser + 'x' +  AnchoLaser + '</span></td><td class="tipoLaser" style="display: none;">' + tipoLaser + '<input id="tipoLaser" name="tipoLaser" type="hidden" value="' + idtipoLaser + '"></td><td class="LargoLaser" style="display: none;">' + LargoLaser + '<input id="LargoLaser" name="LargoLaser" type="hidden" value="' + LargoLaser + '"></td><td class="AnchoLaser" style="display: none;">' + AnchoLaser + '<input id="AnchoLaser" name="AnchoLaser" type="hidden" value="' + AnchoLaser + '"></td><td class="listacabadosfcartera img_delete"></td></tr>';

                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaser, "LargoLaser": LargoLaser, "AnchoLaser": AnchoLaser});

                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }

        activarBtn();
    });


    $(document).on('click', '#btnAcabadosguarda', function(event) {

        var IDopAcb  = $("#SelectAcGuarda option:selected").data('id');
        var opAcb    = $("#SelectAcGuarda option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoGuarda option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoGuarda option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSGuarda option:selected").text();
        var idtipoHS        = $("#SelectHSGuarda option:selected").data('id');
        var ColorHS         = $("#SelectColorHSGuarda option:selected").text();
        var idcolorHS       = $("#SelectHSGuarda option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_guarda').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_guarda').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabGuarda option:selected").text();
        var LargoGrab     = document.getElementById('LargoGrab_guarda').value;
        var AnchoGrab     = document.getElementById('AnchoGrab_guarda').value;
        var ubicacionGrab = $("#SelectUbiGrabGuarda option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesGuarda option:selected").text();

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVGuarda option:selected").text();
        var idtipoBarnizUV = $("#SelectHSGuarda option:selected").data('id');
        var LargoBarnizUV  = document.getElementById('LargoBarUVGuarda').value;
        var AnchoBarnizUV  = document.getElementById('AnchoBarUVGuarda').value;

        //para suaje
        var tipoSuaje   = $("#SelectSuajeGuarda option:selected").text();
        var LargoSuaje  = document.getElementById('LargoSuaje_guarda').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje_guarda').value;

        //para laser
        var tipoLaser   = $("#SelectLaserGuarda option:selected").text();
        var idtipoLaser = $("#SelectHSGuarda option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser_guarda').value;
        var AnchoLaser  = document.getElementById('AnchoLaser_guarda').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoGuarda').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror4').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror4').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td style="display: none">'+ tipoLaminado +'</td><td class="listacabadosguarda img_delete"></td></tr>';


                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaminado});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSGuarda').value;
            var nulo2 = document.getElementById('SelectColorHSGuarda').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror4').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror4').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td style="display: none;" >'+ tipoGrabadoHS +'</td><td style="display: none;" >' + ColorHS + '</td><td style="display: none;">'+ LargoHS_ver +'</td><td style="display: none;">'+ AnchoHS_ver +'</td><td class="listacabadosguarda img_delete"></td></tr>';


                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);

                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabGuarda').value;
            var nulo2 = document.getElementById('SelectUbiGrabGuarda').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror4').innerHTML = alertDiv;

            } else {

                document.getElementById('alerterror4').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td style="display: none;">'+ tipoGrabadoG +'</td><td style="display: none;">'+ LargoGrab +'</td><td style="display: none;">'+ AnchoGrab +'</td><td style="display: none;">'+ ubicacionGrab +'</td><td class="listacabadosguarda img_delete"></td></tr>';


                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeGuarda').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosguarda img_delete"></td></tr>';


                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Barniz UV')  {

            var nulo1 = document.getElementById('SelectBarnizUVGuarda').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                if (tipoBarnizUV === 'undefined' || tipoBarnizUV === 'null') {

                    tipoBarnizUV = '';
                }


                if(tipoBarnizUV == "Registro Mate" || tipoBarnizUV == "Registro Brillante") {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + ', Medidas: ' + LargoBarnizUV + 'x' + AnchoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + LargoBarnizUV + '<input id="LargoBarnizUVEmp" name="LargoBarnizUVEmp" type="hidden" value="' + LargoBarnizUV + '"></td><td class="tipoBarnizUV" style="display: none">' + AnchoBarnizUV + '<input id="AnchoBarnizUVEmp" name="AnchoBarnizUVEmp" type="hidden" value="' + AnchoBarnizUV + '"></td><td class="listacabadosguarda img_delete"></td></tr>';

                    aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": LargoBarnizUV, "Ancho": AnchoBarnizUV});
                } else {

                    var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipoBarnizUV + '</span></td><td class="tipoBarnizUV" style="display: none">' + tipoBarnizUV + '<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="' + idtipoBarnizUV + '"></td><td class="listacabadosguarda img_delete"></td></tr>';

                    aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoBarnizUV, "Largo": null, "Ancho": null});
                }

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }


        if (opAcb === 'Corte Laser')  {

            var nulo1 = document.getElementById('SelectLaserGuarda').value;

            if (nulo1 == 'selected')  {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var LargoLaser = parseInt(LargoLaser, 10);
                var AnchoLaser = parseInt(AnchoLaser, 10);

                var acb = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="' + IDopAcb + '"></td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipoLaser + ', Medidas: ' + LargoLaser + 'x' +  AnchoLaser + '</span></td><td class="tipoLaser" style="display: none;">' + tipoLaser + '<input id="tipoLaser" name="tipoLaser" type="hidden" value="' + idtipoLaser + '"></td><td class="LargoLaser" style="display: none;">' + LargoLaser + '<input id="LargoLaser" name="LargoLaser" type="hidden" value="' + LargoLaser + '"></td><td class="AnchoLaser" style="display: none;">' + AnchoLaser + '<input id="AnchoLaser" name="AnchoLaser" type="hidden" value="' + AnchoLaser + '"></td><td class="listacabadosguarda img_delete"></td></tr>';

                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaser, "LargoLaser": LargoLaser, "AnchoLaser": AnchoLaser});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }

        activarBtn();
    });

    jQuery214(document).on("click", ".listacabadosemp", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosemp > tr').length;

        aAcb = [];

        var oTable = document.getElementById('acbTable');

        var rowLength = oTable.rows.length;


        var tipo_acabado = "";

        $("#acbTable tr").each(function(row, tr) {

            var tipo_acabado  = "";
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


                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Laminado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "Suaje") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }


            if (tipo_acabado == "Barniz UV") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo       = parseInt($(tr).find('td:eq(3)').text());
                Ancho       = parseInt($(tr).find('td:eq(4)').text());

                if(tipoGrabado == "Registro Mate" || tipoGrabado == "Registro Brillante") {

                    aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho});

                } else {

                    aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": null, "Ancho": null});
                }

            }


            if (tipo_acabado == "Corte Laser") {

                row_listimpresiones = $('#listacabadosemp > tr').length;

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoLaser": Largo, "AnchoLaser": Ancho});
            }

        });

        desactivarBtn();
    });


    jQuery214(document).on("click", ".listacabadosfcajon", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosfcajon > tr').length;

        aAcbFCaj = [];

        var oTable = document.getElementById('acbTableFcajon');

        var rowLength = oTable.rows.length;

        var tipo_acabado = "";

        $("#acbTableFcajon tr").each(function(row, tr) {

            var tipo_acabado  = "";
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

            if (tipo_acabado == "Laminado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "HotStamping") {

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(3)').text();
                LargoHS_str   = $(tr).find('td:eq(4)').text();
                AnchoHS_str   = $(tr).find('td:eq(5)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Suaje") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }


            if (tipo_acabado == "Barniz UV") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo       = parseInt($(tr).find('td:eq(3)').text());
                Ancho       = parseInt($(tr).find('td:eq(4)').text());

                if(tipoGrabado == "Registro Mate" || tipoGrabado == "Registro Brillante") {

                    aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho});

                } else {

                    aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": null, "Ancho": null});
                }
                console.log(aAcbFCaj);
            }


            if (tipo_acabado == "Corte Laser") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoLaser": Largo, "AnchoLaser": Ancho});
            }
        });

        desactivarBtn();
    });



    jQuery214(document).on("click", ".listacabadosfcartera", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosfcartera > tr').length;

        aAcbFCar = [];

        var oTable = document.getElementById('acbTableFcartera');

        var rowLength = oTable.rows.length;

        var tipo_acabado = "";

        $("#acbTableFcartera tr").each(function(row, tr) {

            var tipo_acabado  = "";
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


            if (tipo_acabado == "Laminado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "HotStamping") {

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(3)').text();
                LargoHS_str   = $(tr).find('td:eq(4)').text();
                AnchoHS_str   = $(tr).find('td:eq(5)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Suaje") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }


            if (tipo_acabado == "Barniz UV") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo       = parseInt($(tr).find('td:eq(3)').text());
                Ancho       = parseInt($(tr).find('td:eq(4)').text());

                if(tipoGrabado == "Registro Mate" || tipoGrabado == "Registro Brillante"){

                    aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho});

                } else {

                    aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": null, "Ancho": null});
                }
                console.log(aAcbFCar);
            }


            if (tipo_acabado == "Corte Laser") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoLaser": Largo, "AnchoLaser": Ancho});
            }
        });

        desactivarBtn();
    });



    jQuery214(document).on("click", ".listacabadosguarda", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosguarda > tr').length;

        aAcbG = [];

        var oTable = document.getElementById('acbTableGuarda');

        var rowLength = oTable.rows.length;

        var tipo_acabado = "";

        $("#acbTableGuarda tr").each(function(row, tr) {

            var tipo_acabado  = "";
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

            if (tipo_acabado == "Laminado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "HotStamping") {

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(3)').text();
                LargoHS_str   = $(tr).find('td:eq(4)').text();
                AnchoHS_str   = $(tr).find('td:eq(5)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Suaje") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }


            if (tipo_acabado == "Barniz UV") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo       = parseInt($(tr).find('td:eq(3)').text());
                Ancho       = parseInt($(tr).find('td:eq(4)').text());

                if(tipoGrabado == "Registro Mate" || tipoGrabado == "Registro Brillante") {

                    aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho});

                } else {

                    aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": null, "Ancho": null});
                }
                console.log(aAcbG);
            }


            if (tipo_acabado == "Corte Laser") {

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoLaser": Largo, "AnchoLaser": Ancho});
            }
        });

        desactivarBtn();
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

                Largo_str   = $(tr).find('td:eq(2)').text();
                Ancho_str   = $(tr).find('td:eq(3)').text();
                tipo        = $(tr).find('td:eq(4)').text();

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

            switch(nombreAccesorio) {

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
    document.getElementById('SelectBanEmp').onchange = function(event) {

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
    document.getElementById('SelectCieEmp').onchange = function(event) {

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

            } else {

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


    jQuery214(document).on("click", "#btnabrebancofcajon", function () {

        $('#footerBancoFcajon').show();
        $('#footerBancoEmp').hide();
        $('#footerBancoFcartera').hide();
        $('#footerBancoGuarda').hide();
    });


    jQuery214(document).on("click", "#btnabrebancofcartera", function () {

        $('#footerBancoFcartera').show();
        $('#footerBancoEmp').hide();
        $('#footerBancoFcajon').hide();
        $('#footerBancoGuarda').hide();
    });


    jQuery214(document).on("click", "#btnabrebancoguarda", function () {

        $('#footerBancoGuarda').show();
        $('#footerBancoEmp').hide();
        $('#footerBancoFcajon').hide();
        $('#footerBancoFcartera').hide();
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

        switch(nombreAccesorio) {

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

                if( $("#SelectColor option:selected").val() != "selected") {

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

                if( $("#SelectColor option:selected").val() != "selected") {

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


    document.getElementById('SelectAccesorio').onchange = function(event) {

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

    $("#btnCancelAccesorios").click( function () {

        vacioModalAccesorios();
    });

    $(document).on('click', '#btnResumen', function(event) {

        vistaResumen("show");
    });

    $(document).on('click', '#btnQuitarResumen', function(event) {

        vistaResumen("hide");
    });

    $("#imgEC").mouseover( function(){

        $("#imgEC").find("img").prop("src", "<?=URL?>public/img/almeja-EC.gif");
    });

    $("#imgEC").mouseout( function(){

        $("#imgEC").find("img").prop("src", "<?=URL?>public/img/banco.png");
    });

    $("#imgFCaj").mouseover( function(){

        $("#imgFCaj").find("img").prop("src", "<?=URL?>public/img/almeja-FCaj.gif");
    });

    $("#imgFCaj").mouseout( function(){

        $("#imgFCaj").find("img").prop("src", "<?=URL?>public/img/banco2.png");
    });

    $("#imgFCar").mouseover( function(){

        $("#imgFCar").find("img").prop("src", "<?=URL?>public/img/almeja-FCar.gif");
    });

    $("#imgFCar").mouseout( function(){

        $("#imgFCar").find("img").prop("src", "<?=URL?>public/img/banco.png");
    });

    $("#imgG").mouseover( function(){

        $("#imgG").find("img").prop("src", "<?=URL?>public/img/almeja-G.gif");
    });

    $("#imgG").mouseout( function(){

        $("#imgG").find("img").prop("src", "<?=URL?>public/img/banco2.png");
    });

    history.forward();
</script>