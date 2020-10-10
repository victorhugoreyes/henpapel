<style type="text/css">

    .seccionP{
    }
</style>


<!-- form Circular modelo (2) -->
    <div id="form_modelo_1">

        <form class="caja-form" name="caja-form" id="caja-form" method="post" action="<?php echo URL; ?>circular/saveCaja/">

            <div class="wrap cont-grid" id="form_modelo_1_grid">

                <!-- Contenido del selector del modelo de caja -->
                <div class="div-izquierdo" style="height: 89%;">

                    <!-- muestra imagenes -->
                    <div style="width: 100%; text-align: center; display: inline-block; background-image: url(<?=URL ;?>public/img/worn_dots.png); background-repeat: repeat; height: 200px;">
                        <!-- imagenes de circular -->
                        <div class="img" id="image_2" style="background-image:url(<?=URL ?>/public/img/2.png); position: relative; width: 200px;"></div>

                        <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
                        </div>
                        <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
                        </div>
                        <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
                        </div>

                        <br>
                    </div>

                    <!-- formulario de la caja circular -->
                    <div class="form-content medidas" style="height: 500px;">

                        <input type="hidden" name="modelo" id="modelo" value="2">

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

                        <!-- Diámetro -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Diámetro: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="diametro" id="diametro" type="number" placeholder="cm" tabindex="2" min="0.01" step="any" required>
                            </div>
                        </div>

                        <!-- Profundidad -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Profundidad: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="profundidad" id="profundidad" type="number" step="any" min="0.01" tabindex="3" placeholder="cm" required>
                            </div>
                        </div>

                        <!-- Altura tapa -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Altura tapa: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="altura_tapa" id="altura_tapa" type="number" step="any" min="0.1" tabindex="4" placeholder="cm" required>
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

                    <br>

                    <!-- botón modal cierres y divs -->
                    <div>

                        <button type="button" id="btnabrecierres" class="btn btn-outline-primary" data-toggle="modal" data-target="#cierres" >Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaCierres" class="container divcierres">

                            <table class="table" id="cieTable">

                                <tbody id="listcierres"></tbody>
                            </table>
                        </div>
                    </div>

                    <br>

                    <!-- botón modal accesorios y divs -->
                    <div>

                        <button type="button" id="btnabreaccesorios" class="btn btn-outline-primary" data-toggle="modal" data-target="#accesorios" >Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                        <div id="ListaAccesoriosEmp" class="container divaccesorios">

                            <table class="table" id="accesoriosTable">
                                <tbody id="listaccesorios">

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- botón modal bancos y divs -->
                    <div style="margin-top: 40px;">

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

                <!-- empieza el lado derecho -->

                <div class="grid div-derecho" id="form_modelo_1_derecho" style="height: 530px; display: none;">

                    <!-- Base del Cajon -->
                    <div id="gridBCaj" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?= URL ?>/public/img/2.png" style="width: 100px;">

                            <br>
                            Base del Cajón
                        </div>

                        <br>

                        <!-- Papel -->
                        <div>
                            <select class="chosen forros" name="optBasCajon" id="optBasCajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon"  tabindex="7">

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

                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('base_cajon')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listImpBC">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <!-- Añadir Acabados -->
                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('base_cajon')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosEmp" class="container divacabados">
                                <table class="table" id="acbTable">
                                    <tbody id="listAcbBC">
                                        <!-- contenido seleccionado -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>
                    </div>

                    <!-- Circunferencia del cajón -->
                    <div id="gridCirCaj" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Circunferencia del Cajón
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optCirCajon" id="optCirCajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon"  tabindex="8" required>
                                <option value="nulo" selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>"  data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?>
                                </option> <?php } ?>
                            </select>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('circunferencia_cajon')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table" id="Imptablefcajon">
                                    <tbody id="listImpCC">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('circunferencia_cajon')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcajon" class="container divacabados">
                                <table class="table" id="acbTableFcajon">
                                    <tbody id="listAcbCC">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Forro Exterior del Cajón -->
                    <div id="gridFextCaj" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Forro Exterior del Cajón
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optExtCajon" id="optExtCajon" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" tabindex="9" required>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_exterior_cajon')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                <table class="table" id="Imptablefcartera">
                                    <tbody id="listImpFEC">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_exterior_cajon')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="container divacabados">
                                <table class="table" id="acbTableFcartera">
                                    <tbody id="listAcbFEC">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pompa del Cajón -->
                    <div id="gridPomCaj" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Pompa del Cajón
                        </div>

                        <br>

                        <div>
                            <select class="chosen forros" name="optPomCajon" id="optPomCajon" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera"  tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('pompa_cajon')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                <table class="table" id="Imptablefcartera">
                                    <tbody id="listImpPC">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('pompa_cajon')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="container divacabados">
                                <table class="table" id="acbTableFcartera">
                                    <tbody id="listAcbPC">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Forro Interior del Cajón -->
                    <div id="gridFcajonin" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Forro Interior del Cajón
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optIntCajon" id="optIntCajon" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_interior_cajon')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                <table class="table" id="ImptableGuarda">
                                    <tbody id="listImpFIC">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_interior_cajon')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="container divacabados">
                                <table class="table" id="acbTableGuarda">
                                    <tbody id="listAcbFIC">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Base Tapa -->
                    <div id="gridBtapa" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Base Tapa
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optBasTapa" id="optBasTapa" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda"  tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('base_tapa')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table" id="ImpTableGuarda">
                                    <tbody id="listImpBT">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('base_tapa')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="container divacabados">
                                <table class="table" id="acbTableGuarda">
                                    <tbody id="listAcbBT">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Circunferencia de la Tapa -->
                    <div id="gridCirtapa" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Circunferencia Tapa
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optCirTapa" id="optCirTapa" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda"  tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('circunferencia_tapa')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="container divimpresiones">
                                <table class="table" id="ImpTableGuarda">
                                    <tbody id="listImpCT">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('circunferencia_tapa')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="container divacabados">
                                <table class="table" id="acbTableGuarda">
                                    <tbody id="listAcbCT">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Forro de la Tapa -->
                    <div id="gridFtapa" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Forro de la Tapa
                        </div>

                        <br>

                        <div>

                            <select class="chosen forros" name="optForTapa" id="optForTapa" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda"  tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_tapa')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listImpFT">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_tapa')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listAcbFT">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Forro Exterior de la Tapa -->
                    <div id="gridFtapaex" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Forro Exterior de la Tapa
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optExtTapa" id="optExtTapa" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>"  data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?>
                                </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_exterior_tapa')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listImpFET">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_exterior_tapa')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listAcbFET">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br>
                    </div>

                    <!-- Forro Interior de la Tapa -->
                    <div id="gridFtapain" class="divgral seccionP">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/2.png" style="width: 100px;">
                            <br>
                            Forro Interior de la Tapa
                        </div>
                        <br>

                        <div>
                            <select class="chosen forros" name="optIntTapa" id="optIntTapa" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>"  data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?>
                                </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp('forro_interior_tapa')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listImpFIT">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb('forro_interior_tapa')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listAcbFIT">

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

                <div class="social" style="/*width: 45%;*/ float: right;">

                    <button id="papeles_submit" type="button" class="btn btn-primary" style="font-size: 10px;">CALCULAR</button>

                    <button id="subForm" type="button" class="btn btn-success" style="font-size: 10px;" enabled="" data-toggle="modal" data-target="#modalSaveAll">GUARDAR</button>

                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

                    <button type="button" class="btn btn-warning" id="btnResumen" style="font-size: 10px;">RESUMEN</button>

                    <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>
                    <br>


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
                                        <td><b>Total</b></td>
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

            <tbody id="resumenBCaj">
                <!-- -->
            </tbody>

            <tbody id="resumenCirCaj">
                <!-- -->
            </tbody>

            <tbody id="resumenFextCaj">
                <!-- -->
            </tbody>

            <tbody id="resumenPomCaj">
                <!-- -->
            </tbody>

            <tbody id="resumenFintCaj">
                <!-- -->
            </tbody>

            <tbody id="resumenBasTap">
                <!-- -->
            </tbody>

            <tbody id="resumenCirTap">
                <!-- -->
            </tbody>

            <tbody id="resumenFTap">
                <!-- -->
            </tbody>
            <tbody id="resumenFexTap">
                <!-- -->
            </tbody>

            <tbody id="resumenFinTap">
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
<?php

/* Datos leidos de la tabla porcentaje_adicional */
foreach ($Porcentajes as $porcentaje) { ?>

    <input type="hidden" id="porcentaje_<?=$porcentaje['nombre_aumento']?>" value="<?=$porcentaje['porcentaje']?>">
<?php }

?>

<!-- mensaje "Cargando..." -->
<div class="loader">

    <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>

<script type="text/javascript" src="<?= URL ?>public/js/cotizador/circular.js"></script>

<script>

    setClient("<?= $idCliente?>");
    setURL("<?= URL ?>");

    //Boton Grabar
    $("#subForm2").click( function() {

        if(formData){

            if (formData.length > 0) {

                formData = [];
            }
        }

        var odt         = $("#odt").val();
        var diametro    = $("#diametro").val();
        var profundidad = $("#profundidad").val();
        var altura      = $("#altura_tapa").val();
        var grosor      = $("#grosor_carton").val();
        var cantidad    = $("#qty").val();

        var optBasCajon = $("#optBasCajon").val();
        var optCirCajon = $("#optCirCajon").val();
        var optExtCajon = $("#optExtCajon").val();
        var optPomCajon = $("#optPomCajon").val();
        var optIntCajon = $("#optIntCajon").val();
        var optBasTapa  = $("#optBasTapa").val();
        var optCirTapa  = $("#optCirTapa").val();
        var optForTapa  = $("#optForTapa").val();
        var optExtTapa  = $("#optExtTapa").val();
        var optIntTapa  = $("#optIntTapa").val();

        var grabar = "SI";

        var formData = $("#caja-form").serializeArray();

        var formData      = $("#caja-form").serializeArray();

        // impresion
        var aImpBC_tmp  = JSON.stringify(aImpBC, null, 4);
        var aImpCC_tmp  = JSON.stringify(aImpCC, null, 4);
        var aImpFEC_tmp = JSON.stringify(aImpFEC, null, 4);
        var aImpPC_tmp  = JSON.stringify(aImpPC, null, 4);
        var aImpFIC_tmp = JSON.stringify(aImpFIC, null, 4);
        var aImpBT_tmp  = JSON.stringify(aImpBT, null, 4);
        var aImpCT_tmp  = JSON.stringify(aImpCT, null, 4);
        var aImpFT_tmp  = JSON.stringify(aImpFT, null, 4);
        var aImpFET_tmp = JSON.stringify(aImpFET, null, 4);
        var aImpFIT_tmp = JSON.stringify(aImpFIT, null, 4);

        // acabados
        var aAcbBC_tmp  = JSON.stringify(aAcbBC, null, 4);
        var aAcbCC_tmp  = JSON.stringify(aAcbCC, null, 4);
        var aAcbFEC_tmp = JSON.stringify(aAcbFEC, null, 4);
        var aAcbPC_tmp  = JSON.stringify(aAcbPC, null, 4);
        var aAcbFIC_tmp = JSON.stringify(aAcbFIC, null, 4);
        var aAcbBT_tmp  = JSON.stringify(aAcbBT, null, 4);
        var aAcbCT_tmp  = JSON.stringify(aAcbCT, null, 4);
        var aAcbFT_tmp  = JSON.stringify(aAcbFT, null, 4);
        var aAcbFET_tmp = JSON.stringify(aAcbFET, null, 4);
        var aAcbFIT_tmp = JSON.stringify(aAcbFIT, null, 4);

        // cierres
        var aCierres_tmp = JSON.stringify(aCierres, null, 4);


        // bancos
        var aBancos_tmp = JSON.stringify(aBancos, null, 4);


        // accesorios
        var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);

        var cliente  = getIdClient();

        var id_cliente_tmp = JSON.stringify(cliente, null, 4);

        formData.push({name: 'id_cliente', value: id_cliente_tmp});   // calculadora

        formData.push({name: 'aImpBCaj', value: aImpBC_tmp});
        formData.push({name: 'aImpCirCaj', value: aImpCC_tmp});
        formData.push({name: 'aImpFextCaj', value: aImpFEC_tmp});
        formData.push({name: 'aImpPomCaj', value: aImpPC_tmp});
        formData.push({name: 'aImpFintCaj', value: aImpFIC_tmp});
        formData.push({name: 'aImpBTapa', value: aImpBT_tmp});
        formData.push({name: 'aImpCirTapa', value: aImpCT_tmp});
        formData.push({name: 'aImpFTapa', value: aImpFT_tmp});
        formData.push({name: 'aImpFextTapa', value: aImpFET_tmp});
        formData.push({name: 'aImpFintTapa', value: aImpFIT_tmp});

        formData.push({name: 'aAcbBCaj', value: aAcbBC_tmp});
        formData.push({name: 'aAcbCirCaj', value: aAcbCC_tmp});
        formData.push({name: 'aAcbFextCaj', value: aAcbFEC_tmp});
        formData.push({name: 'aAcbPomCaj', value: aAcbPC_tmp});
        formData.push({name: 'aAcbFintCaj', value: aAcbFIC_tmp});
        formData.push({name: 'aAcbBTapa', value: aAcbBT_tmp});
        formData.push({name: 'aAcbCirTapa', value: aAcbCT_tmp});
        formData.push({name: 'aAcbFTapa', value: aAcbFT_tmp});
        formData.push({name: 'aAcbFextTapa', value: aAcbFET_tmp});
        formData.push({name: 'aAcbFintTapa', value: aAcbFIT_tmp});

        formData.push({name: 'aCierres', value: aCierres_tmp});
        formData.push({name: 'aBancos', value: aBancos_tmp});
        formData.push({name: 'aAccesorios', value: aAccesorios_tmp});

        // descuento
        formData.push({name: 'descuento_pctje', value: descuento});
        formData.push({name: 'grabar', value: grabar});

        var modificar_odt = "NO";

        formData.push({name: 'modificar', value: modificar_odt});

        //$("#subForm").prop("disabled", true);

        var odt1 = $("#odt").val();

        var odtval = [];

        odtval.push({name: 'odt', value: odt1});

        //if( revisarImpAcb() == false ) return false;

        $.ajax({                                // GRABAR
            type:"POST",
            async: false,
            //dataType: "json",
            url: $('#caja-form').attr('action'),
            data: formData,
        })
        .done(function( response ) {

            console.log("(3033) response: ");
            console.log(response);

            try {

                var js_respuesta = JSON.parse( response );
                var error        = js_respuesta.error;

                if (error.length > 0) {

                    document.getElementsByName("subForm").disabled = true;

                    showModError("");
                    $("#txtContenido").html("(3046 " + error);

                } else {

                    showModCorrecto("Los datos han sido guardados correctamente...");
                }
            } catch(e) {

                var js_respuesta = JSON.parse( response );
                var error        = js_respuesta.error;

                if (error.length > 0) {

                    document.getElementsByName("subForm").disabled = true;

                    showModError("");
                    $("#txtContenido").html("(3062) " + error);
                } else {

                    document.getElementsByName("subForm").disabled = true;

                    showModError("");
                    $("#txtContenido").html("(3068) Error al grabar en la Base de Datos");
                }
            }
        })
        .fail(function(response) {

            console.log('(3074) Bug! revisa...');
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

    history.forward();
</script>