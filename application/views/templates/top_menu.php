
    <nav id="navbar">
        <div id="logo">

            <img src="<?=URL ;?>public/img/white-logo.png">
            <label for="drop" class="toggle burger">☰</label>
        </div>
       
        <input type="checkbox" id="drop" />
        
        <ul id="first-ul" class="menu">
            <li class="first-level">

                <a href="<?= BASE_URL ;?>">Inicio</a>
            </li>

            <?php 
            error_reporting(0);
            
            $m_usuario = "";
            $m_usuario = $_SESSION['user']['nombre_usuario'];
            $m_usuario = strval($m_usuario);
            $m_usuario = trim($m_usuario);

            if ( $m_usuario != "Eduardo" ) { ?>

                <li class="first-level"><a href="#" style="display: none;"></a>

                    <label for="drop-9" class="toggle">Catálogo +</label>
                    <a href="#">Catálogo</a>
            
                    <input type="checkbox" id="drop-9"/>
                    <ul id="sec-ul">
                        <li class="sec-level">

                            <a href="<?= URL ;?>cotizador/clientes">Clientes</a>
                        </li>
                        <li class="sec-level">
                            
                            <a href="<?= URL ;?>crud/index.php">Papeles</a>
                        </li>
                    </ul>
                </li>
            <?php }

            $development=($_SESSION['user']['nombre_usuario']=='developer')? '':'style="display:none;"';
            
            if ($_SESSION['area'] =='ventas') {
            
                if (isset($_SESSION['tienda'])) {
            
                    if ($_SESSION['tienda'] == 1) { ?>
            
                        <li class="first-level">
               
                            <label for="drop-1" class="toggle">Mostrador +</label>
                            <a href="#">Mostrador</a>
                            <input type="checkbox" id="drop-1"/>
                            
                            <ul id="sec-ul">
                                <li class="sec-level">
                                    
                                    <a href="<?= BASE_URL ;?>ventas/">Punto de Venta</a>
                                </li>
                                <li class="sec-level" style="display: none;">

                                    <a href="<?= BASE_URL ;?>uploads/newProduct.php">Agregar Productos</a>
                                </li>
                                <li class="sec-level">

                                    <a href="<?= BASE_URL ;?>ventas/movimientos.php">Movimientos</a>
                                </li>
                            </ul> 
                        </li>
                    <?php } 
                } ?>
            
                <!-- Cotizaciones OK -->
                <li class="first-level">

                    <label for="drop-2" class="toggle">Cotizaciones +</label>
                    <a href="#">Cotizaciones</a>
                    
                    <input type="checkbox" id="drop-2"/>
            
                    <ul id="sec-ul">
                        
                        <li class="sec-level">

                            <a href="<?=URL ;?>cotizador/getCotizaciones">Cajas</a>
                        </li>
                        <li class="sec-level">

                            <a href="<?= URL ;?>cotizador/invitaciones">Invitaciones</a>
                        </li>
                        
                        <!-- //para entregar -->
                        <li class="sec-level">

                            <a href="<?=URL ;?>cotizador/getCotizacion">Formato Cotizaciones</a>
                        </li>
                    </ul>
                </li>

                <!-- Listas -->
                <li class="first-level">               
                
                    <label for="drop-3" class="toggle">Listas +</label>
                    <a href="#">Listas</a>
                    
                    <input type="checkbox" id="drop-3"/>
                    
                    <ul id="sec-ul">
                        
                        <li class="sec-level">

                            <a href="<?= URL ;?>ventas/informacion">Informacion</a>
                        </li>
                        <li class="sec-level">

                            <a href="<?=URL ;?>ventas/productos">Productos</a>
                        </li>
                        <li class="sec-level">

                            <a href="<?= URL ;?>ventas/invitaciones">Invitaciones</a>
                        </li>
                        <li class="sec-level">

                            <a href="<?= URL ;?>ventas/archivos_cargados">Archivos</a>
                        </li>
                        <li class="sec-level" <?=$development ?>>

                            <a href="<?= URL ;?>remaquila/maquila">Registros Maquila</a>
                        </li>
                        <li class="sec-level" <?=$liverpool ?>>

                            <a href="<?= URL ;?>recibos/altas">Boletas</a>
                        </li>
                        <li class="sec-level" <?=$development ?>>

                            <a href="<?= URL ;?>recibos/facturadas">Facturas</a>
                        </li>

                        <li class="sec-level" <?=$development ?>>

                            <a href="<?= URL ;?>cotizador/cotizaciones">Cotizaciones</a>
                        </li>
                    <!--
                    <li>

                        Second Tier Drop Down        
                        <label for="drop-3" class="toggle">Tutorials +</label>
                        <a href="#">Tutorials</a>         
                        <input type="checkbox" id="drop-3"/>

                        <ul>
                            <li><a href="#">HTML/CSS</a></li>
                            <li><a href="#">jQuery</a></li>
                            <li><a href="#">Other</a></li>
                        </ul>
                    </li>  
                    --> 
                    </ul>
                </li>

                <!-- Cambios -->
                <li class="first-level">

                    <!-- First Tier Drop Down -->
                    <label for="drop-5" class="toggle">Cambios +</label>
                    
                    <a href="#">Cambios
                        
                        <?php 
                        if (isset($_SESSION['cambios_pendientes']) && $_SESSION['cambios_pendientes'] > 0 && $_SESSION['user']['cambios_admin'] == 'true' ) { ?>
                
                            <div class="small-notif"><?=$_SESSION['cambios_pendientes'] ?></div>
                        <?php
                        } 
                        ?>
                    </a>
            
                    <input type="checkbox" id="drop-5"/>
            
                    <ul id="sec-ul">
                    
                        <li class="sec-level">

                            <a href="<?= BASE_URL ;?>ventas/cambios_pendientes">Pendientes</a>
                        </li>
                        
                        <li class="sec-level ">

                            <a class="" href="<?= BASE_URL ;?>ventas/cambios_completados">Realizados</a>
                        </li>
                        <li class="sec-level">

                            <a href="<?= BASE_URL ;?>ventas/solicitud_facturas">Solicitud de Facturas</a>
                        </li>
                    </ul>
                </li>
                <?php  } elseif($_SESSION['area'] == 'cajas') { ?>
            
                <li class="first-level">

                    <a href="<?= BASE_URL ;?>cajas/guardados">Calculos guardados</a>
                </li>
                <?php } ?>

                <?php if ($_SESSION['user']['cajas_calc'] == 'true') { ?>
            
                <!-- Cajas -->
                <li class="first-level">

                    <!-- First Tier Drop Down -->
                    <label for="drop-8" class="toggle">Cajas +</label>
                    <a href="#">Cajas</a>
            
                    <input type="checkbox" id="drop-8"/>
                    
                    <ul id="sec-ul">
                
                        <li class="sec-level">

                            <a href="<?= BASE_URL ;?>cajas/">Calculadora de cajas</a>
                        </li>
                        <li class="sec-level ">

                            <a class="" href="<?= BASE_URL ;?>cajas/guardados">Calculos guardados</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>

            <!-- Cotizaciones -->
            <li class="first-level" style="display: none;">

                <label for="drop-9" class="toggle">Cotizaciones +</label>
                <a href="#">Cotizaciones</a>
            
                <input type="checkbox" id="drop-9"/>
            
                <ul id="sec-ul">
                
                    <li class="sec-level">

                        <a href="<?= URL ;?>cotizador/invitaciones">Invitaciones</a>
                    </li>
                    <li class="sec-level">

                        <a href="<?=URL ;?>cotizador/cajas">Cajas</a>
                    </li>

                    
                </ul>
            </li> 
            
            <!-- Velada -->
            <li class="first-level">               

                <label for="drop-10" class="toggle">velada </label>
                <a href="#">Velada</a>
            
                <input type="checkbox" id="drop-10"/>

                <ul id="sec-ul">
                    
                    <li class="sec-level">

                        <a href="<?=URL ;?>velada/">Registro</a>
                    </li>
                    <li class="sec-level">

                        <a href="<?=URL ;?>velada/editar">Editar</a>
                    </li>
                    <li class="sec-level">

                        <a href="<?=URL ;?>velada/reporte ">Detalles</a>
                    </li>
                </ul>
            </li>
        
            <?php 

            error_reporting(0);
            
            $m_usuario = "";
            $m_usuario = $_SESSION['user']['nombre_usuario'];
            $m_usuario = strval($m_usuario);
            $m_usuario = trim($m_usuario);

            if ( $m_usuario != "Eduardo") { ?>

                <!-- Reporte Errores -->
                <li class="first-level" style="display: none">               
                    
                    <label for="drop-10" class="toggle">Reporte Errores</label>
                    <a href="#">Reporte Errores</a>
                    <input type="checkbox" id="drop-10"/>

                    <ul id="sec-ul">
                        
                        <li class="sec-level">
                            <a href="<?=URL ;?>eeerrores/">Reportar errores</a>
                        </li>
                    </ul>
                </li>

            <?php } ?>
        
            <!-- Salir -->
            <li class="exit first-level">

                <a href="<?=URL ;?>logout/">Salir</a>
            </li>

            <?php 
            if($_SESSION['user']['nombre_usuario'] == 'developer' or $_SESSION['user']['nombre_usuario'] == 'developer-prueba' or $_SESSION['user']['nombre_usuario'] == 'developer2'){ ?>

                <!-- Procesos -->
                <li class="first-level">
                <a href="<?= BASE_URL ;?>modificaprocesos/cambioprocesos">Procesos</a>
                </li>
                
                <!-- Cajas -->
                <li class="first-level">
            
                    <label for="drop-11" class="toggle">Cajas +</label>
                    <a href="#">Cajas</a>
            
                    <input type="checkbox" id="drop-11"/>
            
                    <ul id="sec-ul">
                        
                        <li class="sec-level">

                            <a href="<?= BASE_URL ;?>cajas/">Calculadora</a>
                        </li>
                        <li class="sec-level ">

                            <a class="" href="<?= BASE_URL ;?>cajas/guardados">Calculos guardados</a>
                        </li>
                    </ul>
                </li>
            <?php } ?>
        </ul>
        
        <a href="<?=URL ;?>logout/" class="exitpc">Salir</a>
    </nav>

<!-- ClickDesk Live Chat Service for websites -->
<!--
<script type='text/javascript'>
var _glc =_glc || []; _glc.push('all_ag9zfmNsaWNrZGVza2NoYXRyEgsSBXVzZXJzGICA0L-IgJALDA');
var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' : 
'http://my.clickdesk.com/clickdesk-ui/browser/');
var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
var glcspt = document.createElement('script'); glcspt.type = 'text/javascript'; 
glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);
</script>
-->
<!-- End of ClickDesk -->
