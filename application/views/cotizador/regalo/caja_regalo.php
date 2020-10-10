<style type="text/css">
    
    .lblTituloSec{

        align-content: center;
    }
    .panel{

        align-content: center;
    }
    .secciones{

        background-color: lightsteelblue;
        padding: 10px 0;
        border-radius: 5px;
        transition: background-color .4s;
    }
    .secciones:hover{

        background: #5B84B1;
    }

    .groupButton2{

        transition: 2s linear ;

    }

    .divContenido{

        display: block; text-align: center; width: 100%;
    }
</style>

<div id="divIzquierdo-slave" class="div-izquierdo" style="display: none; height: 98%;">

    <div style="width: 100%; text-align: center; display: inline-block; background-image: url(<?=URL ;?>public/img/worn_dots.png); background-repeat: repeat; height: 25%;">
        <!-- imagenes de circular -->
        <div class="img" id="image_2" style="background-image:url(<?=URL ?>/public/img/regalo2.png); position: relative; width: 100%;"></div>

        <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
        </div>
        <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
        </div>
        <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
        </div>

        <br>
    </div>

    <!-- formulario de la caja circular -->
    <div class="form-content medidas" style="height: 50%; overflow-y: auto;margin-left: 5px;">

        <input type="hidden" name="modelo" id="modelo" value="$id_modelo">

        <!-- ODT -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <input type="hidden" name="nombre_cliente" id="nombre_cliente" value="<?= $nombrecliente ?>">
                <span>ODT: </span>
            </div>

            <div class="cajas-col-input t-right">

                <input class="cajas-input medidas-input" name="odt" id="odt" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus="" required="">
            </div>


        </div>

        <!-- Base -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Base: </span>
            </div>

            <div class="cajas-col-input t-right">

                <input class="cajas-input medidas-input" name="base" id="base" type="number" placeholder="cm" tabindex="2" min="0.01" step="any" required>
            </div>
        </div>

        <!-- Alto -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Alto: </span>
            </div>

            <div class="cajas-col-input t-right">

                <input class="cajas-input medidas-input" name="alto" id="alto" type="number" step="any" min="0.01" tabindex="3" placeholder="cm" required>
            </div>
        </div>

        <!-- Profundidad del Cajón -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Profundidad Cajón: </span>
            </div>

            <div class="cajas-col-input t-right">

                <input class="cajas-input medidas-input" name="profundidad_cajon" id="profundidad_cajon" type="number" step="any" min="0.1" tabindex="4" placeholder="cm" required>
            </div>
        </div>

        <!-- Profundidad de la Tapa -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Profundidad Tapa: </span>
            </div>

            <div class="cajas-col-input t-right">

                <input class="cajas-input medidas-input" name="profundidad_tapa" id="profundidad_tapa" type="number" step="any" min="0.1" tabindex="4" placeholder="cm" required>
            </div>
        </div>

        <!-- Grosor Cajón -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Grosor Cartón: </span>
            </div>

            <div class="cajas-col-input t-right">

                <select class="cajas-input medidas-input" name="grosor_carton" id="grosor_carton" tabindex="5" required>

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

        <!-- Grosor Tapa -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Grosor Tapa: </span>
            </div>

            <div class="cajas-col-input t-right">

                <select class="cajas-input medidas-input" name="grosor_tapa" id="grosor_tapa" tabindex="5" required>

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

        <!-- Cantidad -->
        <div class="input-group">

            <div class="cajas-col-input t-left">

                <span>Cantidad: </span>
            </div>

            <div class="cajas-col-input t-right">

                <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="6" required="">
            </div>
        </div>
    </div>

    <div class="div-buttons" style="height: 20%; margin-top: 4%; padding: 5px;">
        
        <button type="button" id="btnabrecierres" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#cierres" >Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

        <div id="ListaCierres" class="">

            <table class="table" id="cieTable">

                <tbody id="listcierres"></tbody>
            </table>
        </div>


        <button type="button" id="btnabreaccesorios" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#accesorios" >Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

        <div id="ListaAccesoriosEmp" class="">

            <table class="table" id="accesoriosTable">
                <tbody id="listaccesorios">

                </tbody>
            </table>
        </div>

        <button id="btnabrebancoemp" type="button" class="btn btn-outline-primary chkSize  btn-sm" data-toggle="modal" data-target="#bancoemp">Añadir Banco <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

        <div id="ListaBancoEmp" class="">
            <table class="table" id="banTable">
                <tbody id="listbancoemp">
                    <!-- contenido seleccionado -->
                </tbody>
            </table>
        </div>    
    </div>
</div>

<div id="divDerecho-slave" class="grid div-derecho"  style="display: none;">

    <!-- Empalme Cajon -->
    <div class="divgral">
        
        <div class="secciones divContenido">
            <img src="<?= URL ?>/public/images/regalo/regalo.png" style="width: 40%;">
            
            <br>
            <label class="lblTituloSec">Empalme del Cajón</label>
        </div>

        <br>

        <!-- Papel -->
        <div>
            <select class="chosen forros" name="optEC" id="optEC" tabindex="7">

                <option selected disabled>Elegir tipo de papel</option>
                <?php
                foreach ($papers as $paper) {   ?>

                    <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                <?php } ?>
            </select>
        </div>

        <!-- mismo papel para todos -->
        <div class="custom-control custom-checkbox mr-sm-2">

            <input type="checkbox" name="btnCheckPaper" id="btnCheckPaper" class="custom-control-input">
            <label class="custom-control-label" for="btnCheckPaper"style="font-size: 15px; cursor: pointer;" class="btn btn-outline-primary">Mismo Papel P/Todos</label>
        </div>

        <!-- Añadir Impresiones -->
        <div>

            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('EC')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div class="container divimpresiones">

                <table class="table">
                    <tbody id="listImpEC">

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Añadir Acabados -->
        <div>
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('EC')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div class="container divacabados">
                <table class="table">
                    <tbody id="listAcbEC">
                        <!-- contenido seleccionado -->
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>

    <!-- Forro Cajon -->
    <div class="divgral">

        <div class="secciones divContenido">
            <img src="<?=URL ?>/public/images/regalo/regalo.png" style="width: 40%;">
            <br>
            <label class="lblTituloSec">Forro del Cajón</label>
        </div>
        <br>

        <div>
            <select class="chosen forros" name="optFC" id="optFC" tabindex="8" required>
                <option value="nulo" selected disabled>Elegir tipo de papel</option>
                <?php
                foreach ($papers as $paper) {   ?>
                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>"  data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?>
                </option> <?php } ?>
            </select>
        </div>

        <br>

        <div>
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('FC')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div class="divimpresiones">
                <table class="table">
                    <tbody id="listImpFC">

                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('FC')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div class="container divacabados">
                <table class="table" id="acbTableFcajon">
                    <tbody id="listAcbFC">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Empalme Tapa -->
    <div class="divgral">

        <div class="secciones divContenido">
            <img src="<?=URL ?>/public/images/regalo/regalo.png" style="width: 40%;">
            <br>
            <label class="lblTituloSec">Empalme de la Tapa</label>
        </div>
        <br>

        <div>
            <select class="chosen forros" name="optET" id="optET" tabindex="9" required>

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
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('ET')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div id="ListaImpresiones" class="container divimpresiones">
                <table class="table">
                    <tbody id="listImpET">

                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('ET')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div id="ListaAcabadosFcartera" class="container divacabados">
                <table class="table">
                    <tbody id="listAcbET">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Forro Tapa -->
    <div class="divgral">

        <div class="secciones divContenido">
            <img src="<?=URL ?>/public/images/regalo/regalo.png"  style="width: 40%;">
            <br>
            <label class="lblTituloSec">Forro de la Tapa</label>
        </div>

        <br>

        <div>
            <select class="chosen forros" name="optFT" id="optFT" tabindex="9" required>

                <option selected disabled>Elegir tipo de papel</option>

                <?php
                foreach ($papers as $paper) {   ?>

                <option value="<?=$paper['id_papel']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <br>

        <div>
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('FT')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div id="ListaImpresiones" class="container divimpresiones">
                <table class="table">
                    <tbody id="listImpFT">

                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('FT')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

            <div id="ListaAcabadosFcartera" class="container divacabados">
                <table class="table">
                    <tbody id="listAcbFT">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSaveAll" tabindex="-1" role="dialog" aria-labelledby="modalSaveAll" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header azulWhi">

                <h5 class="modal-title">Cotizacion</h5>
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


<!--<div id="divToggle" style="position:fixed; top:95%; right:0%; float: right; width: 90%;text-align: right; padding: 0px; margin: 0px;">
    <button id="btnToggle" class="btn btn-primary btn-slave" style="margin-right: 10px;">▲</button>
    <br>
    <br>
    <button id="papeles_submit" type="button" class="btn btn-primary btn-slave" style="font-size: 10px;">CALCULAR</button>

    <button id="subForm" type="button" class="btn btn-success btn-slave" style="font-size: 10px;" enabled="" data-toggle="modal" data-target="#modalSaveAll">GUARDAR</button>

    <button type="button" class="btn btn-warning btn-slave" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

    <button type="button" class="btn btn-warning btn-slave" id="btnResumen" style="font-size: 10px;">RESUMEN</button>

    <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>

    <button type="button" class="btn btn-lg dropdown-toggle btn-slave" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: left;">
        <label style="font-size: 25px; margin-right: 100px;">Total: </label>
        <label id="Totalplus" style="font-size: 25px;">$0.00</label>
    </button>

    <div class="dropdown-menu" style="width: 350px;">

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
</div>-->

<div id="groupButton1" style="position:fixed; top:90%; right:0; float: right; width: 70%;text-align: right;">

    <button id="papeles_submit" type="button" class="btn btn-primary" style="font-size: 10px;">CALCULAR</button>

    <button id="subForm" type="button" class="btn btn-success" style="font-size: 10px;" enabled="" data-toggle="modal" data-target="#modalSaveAll">GUARDAR</button>

    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

    <button type="button" class="btn btn-warning" id="btnResumen" style="font-size: 10px;">RESUMEN</button>

    <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>
    <br>

    <button type="button" class="btn btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-align: left;">
        <label style="font-size: 25px; margin-right: 100px;">Total: </label>
        <label id="Totalplus" style="font-size: 25px;">$0.00</label>
    </button>

    <div class="dropdown-menu" style="width: 350px;">

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
                                            foreach ($Digital as $dig) {   ?>

                                                <option id="ImpDig" value="<?=$dig['nombre']?>"  data-id="<?=$dig['id_proc_digital']?>"><?=$dig['nombre']?></option>
                                            <?php
                                            }

                                        ?>-->
                                        </select>
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

                    <div id="alerterror6"></div>
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

<!-- ******* Todo el Modal Accesorios ******* -->
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

<!-- ******* Modal Error ******* -->
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

<!-- ******* Modal Correcto ******* -->
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

            <thead class="thead-dark">

                <tr>
                    <th style="width: 20%"></th>
                    <th>Adiciones</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                </tr>
            </thead>

            <thead id="resumenHead">
                <!-- -->
            </thead>

            <tbody id="resumenPapeles">
                <!-- -->
            </tbody>

            <tbody id="resumenEC">
                <!-- -->
            </tbody>

            <tbody id="resumenFC">
                <!-- -->
            </tbody>

            <tbody id="resumenET">
                <!-- -->
            </tbody>

            <tbody id="resumenFT">
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

<script type="text/javascript" src="<?= URL ?>public/js/cotizador/regalo.js"></script>

<script type="text/javascript">

    //checkDimensions();
    var contenidoIzquierdo = $("#divIzquierdo-slave").contents();
    $("#divIzquierdo").empty();
    $("#divIzquierdo").append(contenidoIzquierdo);

    var contenidoDerecho = $("#divDerecho-slave").contents();
    $("#divDerecho").empty();
    $("#divDerecho").append(contenidoDerecho);

    /*divSecciones("Empalme Cajón", "optEC" , "EC", "<?=URL ?>/public/images/regalo/regalo.png");
    divSecciones("Forro Cajón", "optFC" , "FC", "<?=URL ?>/public/images/regalo/regalo.png");
    divSecciones("Empalme Tapa", "optET" , "ET", "<?=URL ?>/public/images/regalo/regalo.png");
    divSecciones("Forro Tapa", "optFT" , "FT", "<?=URL ?>/public/images/regalo/regalo.png");
    
    $( window ).resize(function() {
        
        checkDimensions();
    });
    */
    var cliente = getIdClient();
    //eligira a donde se enviara la informacion
    changeData("<?=URL?>regalo/saveCaja");
    setClient( cliente );
    setURL("<?= URL ?>");

    /*function checkDimensions(){

        var valor = parseInt($("#divToggle").css("width"));

        if( valor < 650 ){

            $("#divToggle").find(".btn-slave").addClass("btn-sm");
        }else{

            $("#divToggle").find(".btn-slave").removeClass("btn-sm");
        }
    }*/

    //Boton Calcular
    $("#subForm2").click( function() {

        var precio;
        var papel;

        var odt               = $("#odt").val();
        var base              = $("#base").val();
        var alto              = $("#alto").val();
        var profundidad_cajon = $("#profundidad_cajon").val();
        var profundidad_tapa  = $("#profundidad_tapa").val();
        var grosor_carton      = $("#grosor_carton").val();
        var grosor_tapa       = $("#grosor_tapa").val();
        var cantidad          = $("#qty").val();

        if( revisarPropiedades(odt,"ODT") == false ) return false;

        if( revisarPropiedades(base,"base") == false ) return false;
        
        if( revisarPropiedades(alto,"alto") == false ) return false;
        
        if( revisarPropiedades(profundidad_cajon,"Profundidad Cajón") == false ) return false;

        if( revisarPropiedades(profundidad_tapa,"Profundidad Tapa") == false ) return false;
        
        if( revisarPropiedades(grosor_carton,"Grosor Cartón") == false ) return false;

        if( revisarPropiedades(grosor_tapa,"Grosor Tapa") == false ) return false;

        if( revisarPropiedades(cantidad,"Cantidad") == false ) return false;
        //if( revisarImpAcb() == false ) return false;

        var grabar = "SI";
        var optEC  = $("#optEC").val();
        var optFC  = $("#optFC").val();
        var optET  = $("#optET").val();
        var optFT  = $("#optFT").val();

        if (typeof formData !== 'undefined' && formData.length > 0) {

            formData = [];
        }

        var formData      = $("#dataForm").serializeArray();

        // impresion
        var aImpEC_tmp  = JSON.stringify(aImpEC, null, 4);
        var aImpFC_tmp  = JSON.stringify(aImpFC, null, 4);
        var aImpET_tmp = JSON.stringify(aImpET, null, 4);
        var aImpFT_tmp  = JSON.stringify(aImpFT, null, 4);

        // acabados
        var aAcbEC_tmp  = JSON.stringify(aAcbEC, null, 4);
        var aAcbFC_tmp  = JSON.stringify(aAcbFC, null, 4);
        var aAcbET_tmp = JSON.stringify(aAcbET, null, 4);
        var aAcbFT_tmp  = JSON.stringify(aAcbFT, null, 4);

        // cierres
        var aCierres_tmp = JSON.stringify(aCierres, null, 4);


        // bancos
        var aBancos_tmp = JSON.stringify(aBancos, null, 4);


        // accesorios
        var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);

        var id_cliente_tmp = JSON.stringify(cliente, null, 4);
        
        formData.push({name: 'id_cliente', value: id_cliente_tmp});
        
        formData.push({name: 'aImpEC', value: aImpEC_tmp});
        formData.push({name: 'aImpFC', value: aImpFC_tmp});
        formData.push({name: 'aImpET', value: aImpET_tmp});
        formData.push({name: 'aImpFT', value: aImpFT_tmp});

        formData.push({name: 'aAcbEC', value: aAcbEC_tmp});
        formData.push({name: 'aAcbFC', value: aAcbFC_tmp});
        formData.push({name: 'aAcbET', value: aAcbET_tmp});
        formData.push({name: 'aAcbFT', value: aAcbFT_tmp});

        formData.push({name: 'aCierres', value: aCierres_tmp});
        formData.push({name: 'aBancos', value: aBancos_tmp});
        formData.push({name: 'aAccesorios', value: aAccesorios_tmp});
        formData.push({name: 'descuento_pctje', value: descuento});
        formData.push({name: 'grabar', value: grabar});

        var modificar_odt = "NO";

        formData.push({name: 'modificar', value: modificar_odt});

        $.ajax({
            type:"POST",
            //dataType: "json",
            url: $('#dataForm').attr('action'),
            data: formData,
        })
        .done(function(response) {

            console.log("(3033) response: ");
            console.log(response);

            try {

                var respuesta = JSON.parse( response );

                if (!respuesta.hasOwnProperty("error")) {

                    var error = respuesta.error;
                    showModError("");
                    $("#txtContenido").html("(2277) " + error);

                } else {

                    showModCorrecto("Los datos han sido guardados correctamente...");
                }
            } catch( e ) {

                showModError("");
                $("#txtContenido").html("(3310) Error..." + e);
            }
        })
        .fail(function(response) {

            console.log('(2307) Hubo un Error inesperado. Por favor llame a sistemas.');

            $("#subForm").prop("disabled", true);
        });
    });
</script>

<script type="text/javascript">

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

        switch(opcionact){

            case "Laminado":
                $('#opAcLaminadoEmp').show('normal');
            break;

            case "HotStamping":
                $('#opAcHotStampingEmp').show('normal');
            break;

            case "Grabado":
                $('#opAcGrabadoEmp').show('normal');
            break;

            case "Pegados Especiales":
                $('#opAcEspecialesEmp').show('normal');
            break;

            case "Barniz UV":
                $('#opAcBarnizUVEmp').show('normal');
            break;

            case "Suaje":
                $('#opAcSuajeEmp').show('normal');
            break;

            case "Corte Laser":
                $('#opAcLaserEmp').show('normal');
            break;
        }

        document.getElementById('SelectUbiGrabEmp').onchange = function(event) {

            var ubicacion = document.getElementById('SelectUbiGrabEmp').value;

            switch( ubicacion ){

                case "Lomo":
                    appndImg('#imagengrabados', '<img style="width: 70%" border="0" src="<?=URL ;?>public/img/lomo.png" >');
                break;

                case "Cierre":
                    appndImg('#imagengrabados', '<img style="width: 70%" border="0" src="<?=URL ;?>public/img/cierre.png" >');
                break;

                case "Tapa":
                    appndImg('#imagengrabados', '<img style="width: 70%" border="0" src="<?=URL ;?>public/img/tapa.png">')
                break;

                case "Izquierdo":
                    appndImg('#imagengrabados', '<img style="width: 70%" border="0" src="<?=URL ;?>public/img/izquierdo.png">')
                break;

                case "Derecho":
                    appndImg('#imagengrabados', '<img style="width: 70%" border="0" src="<?=URL ;?>public/img/derecho.png">')
                break;

                case "Fondo":
                    appndImg('#imagengrabados', '<img style="width: 70%" border="0" src="<?=URL ;?>public/img/fondo.png">')
                break;
            }
        }
    }

    document.getElementById('SelectBarnizUVEmp').onchange = function(event) {

        var seleccion = document.getElementById('SelectBarnizUVEmp').value;


        if (seleccion == 'Registro Mate' || seleccion == 'Registro Brillante') {

            $('#opAcBarUVEmp').show('normal');
        }


        if (seleccion == 'Mate' || seleccion == 'Brillante') {

            $('#opAcBarUVEmp').hide('normal');
        }
    }

</script>

<!-- boton de impresiones -->
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

</script>

<!-- cierres -->
<script>

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
</script>

<!-- banco -->
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
</script>

<!-- accesorios -->
<script>

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

    /*var o = 1;
    $("#btnToggle").click( function(){

        if( o == 1 ){
            
            $("#btnToggle").text("▼");
            $("#divToggle").animate({ "top": "-=8%" }, 250 ,"");
            o = 0;
        }else{

            $("#btnToggle").text("▲");
            $("#divToggle").animate({ "top": "+=8%" }, 250 ,"");
            o = 1;
        }
        
    });*/

    history.forward();
</script>