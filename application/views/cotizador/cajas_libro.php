    <!-- form Libro modelo (3) -->
    <div id="form_modelo_3">

        <form class="caja-form3" name="caja-form3" id="caja-form3" method="post" action="">

            <div class="wrap cont-grid" id="form_modelo_3_grid">

                <!-- Contenido del selector del modelo de caja -->
                <div class="div-izquierdo">
                    
                    <!-- muestra imagenes -->
                    <div style="width: 100%; text-align: center; display: inline-block; background-image: url(<?=URL ;?>public/img/worn_dots.png); background-repeat: repeat; height: 200px;">

                        <!-- imagenes de libro -->
                        <div class="img" id="image_3" style="background-image:url(<?=URL ?>/public/img/3.png); position: relative; width: 200px;"></div>
                        <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
                        </div>
                        <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
                        </div>
                        <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
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

                                <input class="cajas-input medidas-input" name="odt" id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus required>
                            </div>
                        </div>

                        <!-- Base -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Base: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="base" id="base" type="number" step="any" min="0.1" tabindex="2" placeholder="cm" required>
                            </div>
                        </div>

                        <!-- Alto -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Alto: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="alto" id="alto" type="number" step="any" min="0.1" tabindex="3" placeholder="cm" required>
                            </div>
                        </div>

                        <!-- Profundidad -->
                        <div class="input-group">

                            <div class="cajas-col-input t-left">

                                <span>Profundidad: </span>
                            </div>

                            <div class="cajas-col-input t-right">

                                <input class="cajas-input medidas-input" name="profundidad" id="profundidad" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required="">
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
                    </div>

                    <br>
                        
                    <!-- botón modal cierres y divs -->
                    <div>

                        <button type="button" class="btn btn-outline-primary" onclick="showModal('cierres')">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                      <div id="ListaCierresEmp" class="divcierres">
                        <table class="table">
                            <tbody id="listcierresemp"></tbody>
                        </table>
                    </div>
                    </div>

                    <br>
                    
                    <!-- botón modal accesorios y divs -->
                    <div>

                        <button type="button" class="btn btn-outline-primary" onclick="showModal('accesorios')">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                      <div id="ListaAccesoriosEmp" class="divaccesorios">
                        <table class="table">
                            <tbody id="listaccesoriosemp">

                            </tbody>
                        </table>
                      </div>
                    </div>
                </div>

                <div class="grid div-derecho" id="form_modelo_3_derecho" style="display: none;">

                    <!-- grid Empalme del Cajón -->
                    <div id="M3_gridEmp" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Empalme del Cajón
                        </div>
                        <br>
                        <!-- Niveles mostrados -->
                        <div id="">
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" onchange="document.getElementById('costo_tabla1').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="7" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listimpresiones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosEmp" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosemp">
                                        <!-- contenido seleccionado -->
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>

                    <!-- grid Forro completo -->
                    <div id="M3_gridFcompleto" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro Completo
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" onchange="document.getElementById('costo_tabla2').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="8" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre']?>
                                </option> <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcajon">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcajon">
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcajon">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcajon" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcajon">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro en tira del cajón -->
                    <div id="M3_gridFtira" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro en tira del cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" onchange="document.getElementById('costo_tabla3').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcartera">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcartera">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Carton para cartera -->
                    <div id="M3_gridCarcartera" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Carton para cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro de la cartera -->
                    <div id="M3_gridFcartera" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro de la cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Guarda -->
                    <div id="M3_gridGuarda" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Guarda de la cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="social" style="/*width: 45%;*/ float: right;">
                    <!--<button type="button" id="papeles_submit" type="button" class="btn btn-primary" style="font-size: 10px;" disabled>CALCULAR</button>-->

                    <button id="subForm2" type="button" class="btn btn-success" style="font-size: 10px;" onclick="validar();" disabled="">GUARDAR</button>

                    <!--<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#procesosModal" style="font-size: 10px;">TABLAS</button>

                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#resumenModal" style="font-size: 10px;">RESUMEN</button>-->

                    <a class="btn btn-info" style="font-size: 10px; border: none;" href="<?=URL ;?>cajas/impre_cajas" target="_blank">IMPRIMIR</a>
                    <br>

                    <!--<div style="float: left; font-size: 18px; text-align: right; margin-right: 375px;">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" placeholder="Cantidad" tabindex="7" required></div>-->

                    <div style="float: left; font-size: 25px;">Total: </div>

                    <div class="grand-total2" id="gran_total2">$0.00</div>
                </div>
            </div>
        </form>
    </div>

    <!-- form Regalo modelo (4) -->
    <div id="form_modelo_4" style="display: none;">

        <form class="#" name="#" id="#" method="post" action="<?php echo URL; ?>cotizador/saveCaja/">

            <!-- Contenido del selector del modelo de caja -->
            <div class="left" style="margin-left: 7px; text-align: center;">

                <!-- muestra imagenes -->
                <div class="img-viewer">

                    <!-- imagenes de almeja -->
                    <div class="img" id="image_1" style="background-image:url(<?=URL ?>/public/img/4.png);"></div>

                    <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
                    </div>
                    <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
                    </div>
                    <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
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

                            <input class="cajas-input medidas-input" name="odt" id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus required>
                        </div>
                    </div>

                    <!-- Base -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Base: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="base" id="base" type="number" step="any" min="0.1" tabindex="2" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Alto -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Alto: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="alto" id="alto" type="number" step="any" min="0.1" tabindex="3" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Profundidad del cajon -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad del cajón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad_cajon" id="profundidad_cajon" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required="">
                        </div>
                    </div>

                    <!-- Profundidad de tapa -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad de tapa: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad_tapa" id="profundidad_tapa" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required="">
                        </div>
                    </div>

                    <!-- Grosor Cajón -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Grosor Cajón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <select class="cajas-input medidas-input" name="grosor_cajon" id="grosor_cajon" tabindex="5" required>

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

                            <select class="cajas-input medidas-input" name="grosor_tapa" id="grosor_tapa" tabindex="6" required>

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
                </div>

                <br>
                    
                <!-- botón modal cierres y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('cierres')">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaCierresEmp" class="divcierres">
                    <table class="table">
                        <tbody id="listcierresemp"></tbody>
                    </table>
                </div>
                </div>

                <br>
                
                <!-- botón modal accesorios y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('accesorios')">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaAccesoriosEmp" class="divaccesorios">
                    <table class="table">
                        <tbody id="listaccesoriosemp">

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="wrap right">

                <!-- Cliente, Cantidad, Calcular, Total $ -->
                <div style="background: #647A92; border-radius: 10px; text-align: center;">
                    <table style="display: inline-block;">
                        <tbody>
                            <tr>
                                <td style="color: white; font-size: 20px">Cliente: <?=$nombrecliente ?>
                                </td>
                                <td style="color: white; font-size: 20px">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" required style="width: 35%; height: 35px">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="papeles_submit" style="margin-right: 40px;">Calcular</button>
                                </td>

                                <td class="grand-total" id="gran_total">$0.00
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button style="display: none;" class="add-discount" onclick="showModal('descuentos')">Agregar Descuento</button>
                </div>

                <div class="grid">
                    <!-- grid Empalme del Cajón -->
                    <div id="M4_gridEmp" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Empalme del Cajón
                        </div>
                        <br>
                        <!-- Niveles mostrados -->
                        <div id="">
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" onchange="document.getElementById('costo_tabla1').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="7" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listimpresiones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosEmp" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosemp">
                                        <!-- contenido seleccionado -->
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>

                    <!-- grid Forro completo -->
                    <div id="M4_gridFcompleto" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro Completo
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" onchange="document.getElementById('costo_tabla2').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="8" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre']?>
                                </option> <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcajon">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcajon">
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcajon">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcajon" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcajon">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro en tira del cajón -->
                    <div id="M4_gridFtira" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro en tira del cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" onchange="document.getElementById('costo_tabla3').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcartera">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcartera">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Carton para cartera -->
                    <div id="M4_gridCarcartera" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Carton para cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro de la cartera -->
                    <div id="M4_gridFcartera" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro de la cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Guarda -->
                    <div id="M4_gridGuarda" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Guarda de la cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modulos de botones azules -->
                <div class="wrap right" style="width: 100%; margin-left: 8px; display: none;">

                    <div class="aumentos">

                        <table class="t-resume">

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

                        <table class="t-resume">

                            <thead style="text-align: center; vertical-align: top">

                                <tr>
                                    <th>Parte</th>
                                    <th>Cant. Solicitada</th>
                                    <th>Papel</th>
                                    <th>Precio</th>
                                    <th>Largo</th>
                                    <th>Ancho</th>
                                    <th>Corte L</th>
                                    <th>Corte A</th>
                                    <th>Piezas por Pliego</th>
                                    <th>Total Pliego</th>
                                    <th>Total Costo</th>
                                </tr>
                            </thead>

                            <tbody id="table-cont">

                            </tbody>
                        </table>

                        <!-- tabla de papeles -->
                        <!-- tabla de mermas -->
                        <div class="container" style="text-align: left;">

                            <table>

                                <h4>Mermas</h4>
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

                                        <input name="grabadomin" id="grabadomin" type="text" readonly required>
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

                    <button type="submit" class="btn btn-c-blues" style="width: 40%;">GUARDAR</button>
                </div>
            </div>
        </form>
    </div>

    <!-- form Marco modelo (5) -->
    <div id="form_modelo_5" style="display: none;">

        <form class="#" name="#" id="#" method="post" action="<?php echo URL; ?>cotizador/saveCaja/">

            <!-- Contenido del selector del modelo de caja -->
            <div class="left" style="margin-left: 7px; text-align: center;">

                <!-- muestra imagenes -->
                <div class="img-viewer">

                    <!-- imagenes de almeja -->
                    <div class="img" id="image_1" style="background-image:url(<?=URL ?>/public/img/loading.gif);"></div>

                    <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
                    </div>
                    <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
                    </div>
                    <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
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

                            <input class="cajas-input medidas-input" name="odt" id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus required>
                        </div>
                    </div>

                    <!-- Base -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Base: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="base" id="base" type="number" step="any" min="0.1" tabindex="2" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Alto -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Alto: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="alto" id="alto" type="number" step="any" min="0.1" tabindex="3" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Profundidad -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad" id="profundidad" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required="">
                        </div>
                    </div>

                    <!-- Grosor del cartón -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Grosor del cartón: </span>
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
                </div>

                <br>
                    
                <!-- botón modal cierres y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('cierres')">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaCierresEmp" class="divcierres">
                    <table class="table">
                        <tbody id="listcierresemp"></tbody>
                    </table>
                </div>
                </div>

                <br>
                
                <!-- botón modal accesorios y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('accesorios')">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaAccesoriosEmp" class="divaccesorios">
                    <table class="table">
                        <tbody id="listaccesoriosemp">

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="wrap right">

                <!-- Cliente, Cantidad, Calcular, Total $ -->
                <div style="background: #647A92; border-radius: 10px; text-align: center;">
                    <table style="display: inline-block;">
                        <tbody>
                            <tr>
                                <td style="color: white; font-size: 20px">Cliente: <?=$nombrecliente ?>
                                </td>
                                <td style="color: white; font-size: 20px">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" required style="width: 35%; height: 35px">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="papeles_submit" style="margin-right: 40px;">Calcular</button>
                                </td>

                                <td class="grand-total" id="gran_total">$0.00
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button style="display: none;" class="add-discount" onclick="showModal('descuentos')">Agregar Descuento</button>
                </div>

                <div class="grid">
                    <!-- grid Forro de Marco con Interno -->
                    <div id="M5_gridFmarcoint" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro de Marco con Interno
                        </div>
                        <br>
                        <!-- Niveles mostrados -->
                        <div id="">
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" onchange="document.getElementById('costo_tabla1').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="7" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listimpresiones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosEmp" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosemp">
                                        <!-- contenido seleccionado -->
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>

                    <!-- grid Marco con Interno -->
                    <div id="M5_gridMarcoint" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Marco Interno
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" onchange="document.getElementById('costo_tabla2').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="8" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre']?>
                                </option> <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcajon">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcajon">
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcajon">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcajon" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcajon">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Empalme del cajón -->
                    <div id="M5_gridEmp" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Empalme del cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" onchange="document.getElementById('costo_tabla3').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcartera">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcartera">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro del cajón -->
                    <div id="M5_gridFcajon" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro del cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Empalme de la tapa -->
                    <div id="M5_gridEmptapa" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Empalme de la tapa
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro de la tapa -->
                    <div id="M5_gridFtapa" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro de la tapa
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modulos de botones azules -->
                <div class="wrap right" style="width: 100%; margin-left: 8px; display: none;">

                    <div class="aumentos">

                        <table class="t-resume">

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

                        <table class="t-resume">

                            <thead style="text-align: center; vertical-align: top">

                                <tr>
                                    <th>Parte</th>
                                    <th>Cant. Solicitada</th>
                                    <th>Papel</th>
                                    <th>Precio</th>
                                    <th>Largo</th>
                                    <th>Ancho</th>
                                    <th>Corte L</th>
                                    <th>Corte A</th>
                                    <th>Piezas por Pliego</th>
                                    <th>Total Pliego</th>
                                    <th>Total Costo</th>
                                </tr>
                            </thead>

                            <tbody id="table-cont">

                            </tbody>
                        </table>

                        <!-- tabla de papeles -->
                        <!-- tabla de mermas -->
                        <div class="container" style="text-align: left;">

                            <table>

                                <h4>Mermas</h4>
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

                                        <input name="grabadomin" id="grabadomin" type="text" readonly required>
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

                    <button type="submit" class="btn btn-c-blues" style="width: 40%;">GUARDAR</button>
                </div>
            </div>
        </form>
    </div>

    <!-- form Cerillera modelo (6) -->
    <div id="form_modelo_6" style="display: none;">

        <form class="#" name="#" id="#" method="post" action="<?php echo URL; ?>cotizador/saveCaja/">

            <!-- Contenido del selector del modelo de caja -->
            <div class="left" style="margin-left: 7px; text-align: center;">

                <!-- muestra imagenes -->
                <div class="img-viewer">

                    <!-- imagenes de almeja -->
                    <div class="img" id="image_1" style="background-image:url(<?=URL ?>/public/img/loading.gif);"></div>

                    <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
                    </div>
                    <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
                    </div>
                    <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
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

                            <input class="cajas-input medidas-input" name="odt" id="odt-1" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus required>
                        </div>
                    </div>

                    <!-- Base -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Base: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="base" id="base" type="number" step="any" min="0.1" tabindex="2" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Alto -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Alto: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="alto" id="alto" type="number" step="any" min="0.1" tabindex="3" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Profundidad del cajon -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad del cajón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad_cajon" id="profundidad_cajon" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required="">
                        </div>
                    </div>

                    <!-- Profundidad de tapa -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad de tapa: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad_tapa" id="profundidad_tapa" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required="">
                        </div>
                    </div>

                    <!-- Grosor Cajón -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Grosor Cajón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <select class="cajas-input medidas-input" name="grosor_cajon" id="grosor_cajon" tabindex="5" required>

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

                            <select class="cajas-input medidas-input" name="grosor_tapa" id="grosor_tapa" tabindex="6" required>

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
                </div>

                <br>
                    
                <!-- botón modal cierres y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('cierres')">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaCierresEmp" class="divcierres">
                    <table class="table">
                        <tbody id="listcierresemp"></tbody>
                    </table>
                </div>
                </div>

                <br>
                
                <!-- botón modal accesorios y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('accesorios')">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaAccesoriosEmp" class="divaccesorios">
                    <table class="table">
                        <tbody id="listaccesoriosemp">

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="wrap right">

                <!-- Cliente, Cantidad, Calcular, Total $ -->
                <div style="background: #647A92; border-radius: 10px; text-align: center;">
                    <table style="display: inline-block;">
                        <tbody>
                            <tr>
                                <td style="color: white; font-size: 20px">Cliente: <?=$nombrecliente ?>
                                </td>
                                <td style="color: white; font-size: 20px">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" required style="width: 35%; height: 35px">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="papeles_submit" style="margin-right: 40px;">Calcular</button>
                                </td>

                                <td class="grand-total" id="gran_total">$0.00
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button style="display: none;" class="add-discount" onclick="showModal('descuentos')">Agregar Descuento</button>
                </div>

                <div class="grid">
                    <!-- grid Empalme del Cajón -->
                    <div id="M3_gridEmp" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Empalme del Cajón
                        </div>
                        <br>
                        <!-- Niveles mostrados -->
                        <div id="">
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" onchange="document.getElementById('costo_tabla1').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="7" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresiones">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">

                                <table class="table" id="Imptable">
                                    <tbody id="listimpresiones">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosEmp" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosemp">
                                        <!-- contenido seleccionado -->
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>

                    <!-- grid Forro completo -->
                    <div id="M3_gridFcompleto" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro Completo
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" onchange="document.getElementById('costo_tabla2').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="8" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre']?>
                                </option> <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcajon">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcajon">
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcajon">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcajon" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcajon">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro en tira del cajón -->
                    <div id="M3_gridFtira" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro en tira del cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" onchange="document.getElementById('costo_tabla3').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

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
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#Impresionesfcartera">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_fcartera">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Carton para cartera -->
                    <div id="M3_gridCarcartera" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Carton para cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Forro de la cartera -->
                    <div id="M3_gridFcartera" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro de la cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- grid Guarda -->
                    <div id="M3_gridGuarda" class="divgral">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Guarda de la cartera
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

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

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div>
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#acabados_guarda">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modulos de botones azules -->
                <div class="wrap right" style="width: 100%; margin-left: 8px; display: none;">

                    <div class="aumentos">

                        <table class="t-resume">

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

                        <table class="t-resume">

                            <thead style="text-align: center; vertical-align: top">

                                <tr>
                                    <th>Parte</th>
                                    <th>Cant. Solicitada</th>
                                    <th>Papel</th>
                                    <th>Precio</th>
                                    <th>Largo</th>
                                    <th>Ancho</th>
                                    <th>Corte L</th>
                                    <th>Corte A</th>
                                    <th>Piezas por Pliego</th>
                                    <th>Total Pliego</th>
                                    <th>Total Costo</th>
                                </tr>
                            </thead>

                            <tbody id="table-cont">

                            </tbody>
                        </table>

                        <!-- tabla de papeles -->
                        <!-- tabla de mermas -->
                        <div class="container" style="text-align: left;">

                            <table>

                                <h4>Mermas</h4>
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

                                        <input name="grabadomin" id="grabadomin" type="text" readonly required>
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

                    <button type="submit" class="btn btn-c-blues" style="width: 40%;">GUARDAR</button>
                </div>
            </div>
        </form>
    </div>

    <!-- form Vino modelo (7) -->
    <div id="form_modelo_7" style="display: none;">

        <form class="#" name="#" id="#" method="post" action="<?php echo URL; ?>cotizador/saveCaja/">

            <!-- Contenido del selector del modelo de caja -->
            <div class="left" style="margin-left: 7px; text-align: center;">

                <!-- muestra imagenes -->
                <div class="img-viewer">

                    <!-- imagenes de almeja -->
                    <div class="img" id="image_2" style="background-image:url(<?=URL ?>/public/img/loading.gif);"></div>

                    <div class="img" id="image_1_ancho" style="display:none;background-image:url(<?=URL ?>/public/img/1_ancho.png);">
                    </div>
                    <div class="img" id="image_1_alto" style="display:none;background-image:url(<?=URL ?>/public/img/1_alto.png);">
                    </div>
                    <div class="img" id="image_1_profundidad" style="display:none;background-image:url(<?=URL ?>/public/img/1_profundidad.png);">
                    </div>

                    <br>
                </div>

                <!-- formulario de la caja vino -->
                <div class="form-content medidas" style="height: 450px;">

                    <input type="hidden" name="modelo" id="modelo" value="7">

                    <!-- ODT -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>ODT: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="odt" id="odt-7" type="text" placeholder="ODT" tabindex="1" min="1" step="1" autofocus required>
                        </div>
                    </div>

                    <!-- Base -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Base: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="base" id="base" type="number" placeholder="Diámetro" tabindex="2" min="1" step="1" required>
                        </div>
                    </div>

                    <!-- Alto -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Alto: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="alto" id="alto" type="number" step="any" min="0.1" tabindex="3" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Profundidad Cajón -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Profundidad Cajón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <input class="cajas-input medidas-input" name="profundidad-cajon" id="altura_tapa" type="number" step="any" min="0.1" tabindex="4" placeholder="cm" required>
                        </div>
                    </div>

                    <!-- Grosor Cajón -->
                    <div class="input-group">

                        <div class="cajas-col-input t-left">

                            <span>Grosor Cartón: </span>
                        </div>

                        <div class="cajas-col-input t-right">

                            <select class="cajas-input medidas-input" name="grosor_carton_7" id="grosor_carton_7" tabindex="5" required>

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
                </div>

                <br>
                    
                <!-- botón modal cierres y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('#')">Añadir Cierres <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaCierresEmp" class="divcierres">
                    <table class="table">
                        <tbody id="listcierresemp"></tbody>
                    </table>
                </div>
                </div>

                <br>
                
                <!-- botón modal accesorios y divs -->
                <div>

                    <button type="button" class="btn btn-outline-primary" onclick="showModal('#')">Añadir Accesorios <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                  <div id="ListaAccesoriosEmp" class="divaccesorios">
                    <table class="table">
                        <tbody id="listaccesoriosemp">

                        </tbody>
                    </table>
                  </div>
                </div>
            </div>

            <div class="wrap right">

                <!-- Cliente, Cantidad, Calcular, Total $ -->
                <div style="background: #647A92; border-radius: 10px; text-align: center;">
                    <table style="display: inline-block;">
                        <tbody>
                            <tr>
                                <td style="color: white; font-size: 20px">Cliente: <?=$nombrecliente ?>
                                </td>
                                <td style="color: white; font-size: 20px">Cantidad: <input class="cajas-input" name="qty" id="qty" type="number" min="1" step="1" required style="width: 35%; height: 35px">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="papeles_submit" style="margin-right: 40px;">Calcular</button>
                                </td>

                                <td class="grand-total" id="gran_total">$0.00
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button style="display: none;" class="add-discount" onclick="showModal('descuentos')">Agregar Descuento</button>
                </div>

                <div class="grid">

                    <div id="M7_gridEmp" class="divgral" style="align-items: center;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Empalme del Cajón
                        </div>
                        <br>

                        <!-- Niveles mostrados -->
                        <div>
                            <select class="chosen forros" name="papel_interior_cajon" id="interior_cajon" data-ancho="ancho_cajon" data-largo="largo_cajon" data-name="papel_interior_cajon" data-parte="guarda_cajon" onchange="document.getElementById('costo_tabla1').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="7" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresionest" class="divimpresionest">

                                <table class="table" id="Imptablett">
                                    <tbody id="listimpresionesoooo">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosEmp" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosemp">
                                        <!-- contenido seleccionado -->
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>

                    <div id="M7_gridFoncajon" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Fondo del Cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen" name="papel_exterior_cajon" id="exterior_cajon" data-name="papel_exterior_cajon" data-parte="forro_cajon" data-ancho="a_forro_ext_cajon" data-largo="l_forro_ext_cajon" onchange="document.getElementById('costo_tabla2').value = this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="8" required>

                                <option selected disabled>Elegir tipo de papel</option>
                                <?php
                                foreach ($papers as $paper) {   ?>
                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre']?>
                                </option> <?php } ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcajon">
                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>


                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcajon" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcajon">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="M7_gridFcajon" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro del Cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" onchange="document.getElementById('costo_tabla3').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="M7_gridPcajon" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Pompa del Cajón
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_exterior_cartera" id="exterior_cartera" data-ancho="a_forro_ext_cartera" data-largo="l_forro_ext_cartera" data-name="papel_exterior_cartera" data-parte="forro_cartera" onchange="document.getElementById('costo_tabla3').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="9" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>
                            </a>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosFcartera" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosfcartera">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="M7_gridCartapa" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Cartón para Tapa
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="M7_gridFtapa" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Forro de la Tapa
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="M7_gridGuardatapa" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Guarda de la Tapa
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div id="M7_gridSuaje" class="divgral" style="align-items: baseline;">

                        <div class="panel">
                            <img src="<?=URL ?>/public/img/henpp.png" style="width: 100px;">
                            <br>
                            Suaje de Eva
                        </div>
                        <br>
                        
                        <div>
                            <select class="chosen forros" name="papel_interior_cartera" id="interior_cartera" data-ancho="a_forro_int_cartera" data-largo="l_forro_int_cartera" data-name="papel_interior_cartera" data-parte="guarda" onchange="document.getElementById('costo_tabla4').value =this.options[this.selectedIndex].getAttribute('data-precio');" tabindex="10" required>

                                <option selected disabled>Elegir tipo de papel</option>

                                <?php
                                foreach ($papers as $paper) {   ?>

                                <option value="<?=$paper['id_papel']?>" data-ancho="<?=$paper['ancho']?>" data-largo="<?=$paper['largo']?>" data-digital="<?=(strtolower($paper['digital'])=='verdadero')? 'true':'false' ?>" data-offset="<?=(strtolower($paper['offset'])=='verdadero')? 'true':'false' ?>" data-laminado="<?=(strtolower($paper['laminado'])=='verdadero')? 'true':'false' ?>" data-precio="<?=$paper['costo_unitario']?>"><?=$paper['nombre'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaImpresiones" class="divimpresiones">
                                <table class="table">
                                    <tbody id="listimpresionesguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <div style="align-self: start;">
                            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button>

                            <div id="ListaAcabadosGuarda" class="divacabados">
                                <table class="table">
                                    <tbody id="listacabadosguarda">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Modulos de botones azules -->
                <div class="wrap right" style="width: 100%; margin-left: 8px; display: none;">

                    <div class="aumentos">

                        <table class="t-resume">

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

                        <table class="t-resume">

                            <thead style="text-align: center; vertical-align: top">

                                <tr>
                                    <th>Parte</th>
                                    <th>Cant. Solicitada</th>
                                    <th>Papel</th>
                                    <th>Precio</th>
                                    <th>Largo</th>
                                    <th>Ancho</th>
                                    <th>Corte L</th>
                                    <th>Corte A</th>
                                    <th>Piezas por Pliego</th>
                                    <th>Total Pliego</th>
                                    <th>Total Costo</th>
                                </tr>
                            </thead>

                            <tbody id="table-cont">

                            </tbody>
                        </table>

                        <!-- tabla de papeles -->
                        <!-- tabla de mermas -->
                        <div class="container" style="text-align: left;">

                            <table>

                                <h4>Mermas</h4>
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

                                        <input name="grabadomin" id="grabadomin" type="text" readonly required>
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

                    <button type="submit" class="btn btn-c-blues" style="width: 40%;">GUARDAR</button>
                </div>
            </div>
        </form>
    </div>
    <script type="text/javascript">
    jQuery214(".chosen").chosen();
</script>