
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= URL; ?>public/css/screen.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?= URL; ?>public/css/print.css" type="text/css" media="print" />
    <link rel="stylesheet" href="<?= URL; ?>public/css/cajas.css" type="text/css" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>
    <script src="<?= URL; ?>public/js/zoomsl.js"></script>
    <script src="<?= URL; ?>public/js/script.js"></script>

<script type="text/javascript">
    $(function() {
/*
        $('#aside').prepend('<a class="print-preview"><img src="<?= URL; ?>public/images/icon-print-preview.png" width="40" heigh="40">&nbsp;Imprimir</img></a>');
*/
        $('#aside').prepend('<a class="print-preview"><img src="<?= URL; ?>public/images/icon-print.png" width="20" heigh="20">&nbsp;</img></a>');
        $('a.print-preview').printPreview();
    });
</script>

<div class="content container">
    
    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Libro.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor cartón: <?=$g ?> | Grosor cartera: <?=$G ?> |
            </div>
        </div>

        <!-- imagen de impresion -->
<!--
        <div id="aside" class="col-md-4 img-print img-space-right"></div>
-->
    <div>

    <div><?php echo "<br />"; ?></div>

    <!-- Empalme Cajón -->
    <div class="row">
	
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Empalme Cajón</div>

                <img src="<?= URL; ?>public/images/libro/nuevas/Desarrollo-Libro--Empalme-cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>
            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                    </tr>
                    <tr>
                        <td class="td-center" style="width: 60%; font-weight: bold">Descripción</td>
                        <td class="td-center" style="width: 40%; font-weight: bold">Dimensiones</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Base del Cajón</td>
                        <td class="td-center color_desc_azul">b' = <?= round($b1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Altura del Cajón</td>
                        <td class="td-center color_desc_azul">h' = <?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_verde">Profundidad del Cajón</td>
                        <td class="td-center color_desc_verde">p' = <?= round($p1, 2); ?> cm</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr>
                        <td class="td-center titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_naranja">1</td>
                        <td class="color_desc_naranja">Base de Cartón para Empalme para Cajón</td>
                        <td class="td-center color_desc_naranja">x'=<?= round($x1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Alto de Cartón para Empalme para Cajón</td>
                        <td class="td-center color_desc_naranja">y'=<?= round($y1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">2</td>
                        <td class="color_desc_negro">Base de Papel Empalme para Cajón</td>
                        <td class="td-center color_desc_negro">x''=<?= round($x11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Alto de Papel Empalme para Cajón</td>
                        <td class="td-center color_desc_negro">y''=<?= round($y11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">3</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalme de Papel y Cartón para Cajón</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_rosa">4</td>
                        <td class="color_desc_rosa">Base final extendida del Empalmado de Cajón</td>
                        <td class="td-center color_desc_rosa">x=<?= round($x, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Altura final extendida del Empalmado de Cajón</td>
                        <td class="td-center color_desc_rosa">y=<?= round($y, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_verde">5</td>
                        <td class="color_desc_verde">Distancia a Ranurar el Empalmado de Cajón</td>
                        <td class="td-center color_desc_verde">p'=<?= round($p1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_verde">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado del Empalmado de Cajón</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Libro.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor cartón: <?=$g ?> | Grosor cartera: <?=$G ?> |
            </div>
        </div>
    <div>

    <!-- Forro completo (Opción A)-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro completo</div>

                <img src="<?= URL; ?>public/images/libro/nuevas/Desarrollo-Libro--Forro-completo---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

                <!-- DISEÑO -->
                <table class="table table-bordered table-hover table-responsive-md">
                    <tbody>
                        <tr>
                            <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                        </tr>
                        <tr>
                            <td class="td-center" style="width: 60%; font-weight: bold">Descripción</td>
                            <td class="td-center" style="width: 40%; font-weight: bold">Dimensiones</td>
                        </tr>
                    <tr>
                        <td class="color_desc_azul">Base del Cajón</td>
                        <td class="td-center color_desc_azul">b' = <?= round($b1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Altura del Cajón</td>
                        <td class="td-center color_desc_azul">h' = <?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_verde">Profundidad del Cajón</td>
                        <td class="td-center color_desc_verde">p' = <?= round($p1, 2); ?> cm</td>
                    </tr>
                        <tr>
                            <td class="color_desc_rosa">Base Forro del Cajón</td>
                            <td class="td-center color_desc_rosa">b'' = <?= round($b11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Alto Forro del Cajón</td>
                            <td class="td-center color_desc_rosa">h'' = <?= round($h11, 2); ?> cm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr>
                        <td class="td-center titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">6A</td>
                        <td class="color_desc_negro">Base de Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">f=<?= round($f, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura del Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">k=<?= round($k, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">7A</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Papel Forro de Cajón</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="td-center">8A</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Cajón</td>
                        <td class="td-center">Guillotina</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro en Tira del Cajón (Opción B)-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro en Tira del Cajón</div>

                <img src="<?= URL; ?>public/images/libro/nuevas/Desarrollo-Libro--Forro-en-tira---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

                <!-- DISEÑO -->
                <table class="table table-bordered table-hover table-responsive-md">
                    <tbody>
                        <tr>
                            <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                        </tr>
                        <tr>
                            <td class="td-center" style="width: 60%; font-weight: bold">Descripción</td>
                            <td class="td-center" style="width: 40%; font-weight: bold">Dimensiones</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Profundidad del Forro del Cajón en Tira</td>
                            <td class="td-center color_desc_rosa">p'' = <?= round($p11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Largo de Forro en Tira con pestañas</td>
                            <td class="td-center color_desc_rosa">l = <?= round($l, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Largo de Forro en Tira</td>
                            <td class="td-center color_desc_rosa">l' = <?= round($l1, 2); ?> cm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr>
                        <td class="td-center titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">6B</td>
                        <td class="color_desc_negro">Profundidad de Material Rebasado Forro en Tira</td>
                        <td class="td-center color_desc_negro">r=<?= round($r, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Largo de Material Rebasado Forro en Tira</td>
                        <td class="td-center color_desc_negro">l''=<?= round($l11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">7B</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Papel Forro en Tira del Cajón</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="td-center">8B</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Cajón</td>
                        <td class="td-center">Guillotina</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Libro.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor cartón: <?=$g ?> | Grosor cartera: <?=$G ?> |
            </div>
        </div>
    <div>

    <!-- Cartón para Cartera -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Cartón para Cartera</div>

                <img src="<?= URL; ?>public/images/libro/nuevas/Desarrollo-Libro--Carton-cartera---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

                <!-- DISEÑO -->
                <table class="table table-bordered table-hover table-responsive-md">
                    <tbody>
                        <tr>
                            <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                        </tr>
                        <tr>
                            <td class="td-center" style="width: 60%; font-weight: bold">Descripción</td>
                            <td class="td-center" style="width: 40%; font-weight: bold">Dimensiones</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Lomo de la Cartera</td>
                            <td class="td-center color_desc_verde">P = <?= round($P, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Alto de la Tapa</td>
                            <td class="td-center color_desc_azul">H = <?= round($H, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Base de la Tapa</td>
                            <td class="td-center color_desc_rosa">B = <?= round($B, 2); ?> cm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr>
                        <td class="td-center titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_rosa">9</td>
                        <td class="color_desc_rosa">Base de Cartón de la Tapa</td>
                        <td class="td-center color_desc_rosa">B=<?= round($B, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Altura total del Cartón de la Tapa</td>
                        <td class="td-center color_desc_rosa">Y=<?= round($Y, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_azul">10</td>
                        <td class="color_desc_azul">Distancia a Ranurar el Cartón de la Cartera</td>
                        <td class="td-center color_desc_azul">H=<?= round($H, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_azul">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado del Cartón de la Cartera</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Libro.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor cartón: <?=$g ?> | Grosor cartera: <?=$G ?> |
            </div>
        </div>
    <div>

    <!-- Forro de la Cartera -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de la Cartera</div>

                <img src="<?= URL; ?>public/images/libro/nuevas/Desarrollo-Libro--Forro-cartera---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

                <!-- DISEÑO -->
                <table class="table table-bordered table-hover table-responsive-md">
                    <tbody>
                        <tr>
                            <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                        </tr>
                        <tr>
                            <td class="td-center" style="width: 60%; font-weight: bold">Descripción</td>
                            <td class="td-center" style="width: 40%; font-weight: bold">Dimensiones</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Lomo de la Cartera</td>
                            <td class="td-center color_desc_verde">P = <?= round($P, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Alto de la Tapa</td>
                            <td class="td-center color_desc_azul">H = <?= round($H, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Base de la Tapa</td>
                            <td class="td-center color_desc_rosa">B = <?= round($B, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_naranja">Base del Forro Cartera</td>
                            <td class="td-center color_desc_naranja">B' = <?= round($B1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_naranja">Altura total del Forro de la Cartera</td>
                            <td class="td-center color_desc_naranja">Y' = <?= round($Y1, 2); ?> cm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr>
                        <td class="td-center titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_naranja">11</td>
                        <td class="color_desc_naranja">Base de Papel Forro de Cartera</td>
                        <td class="td-center color_desc_naranja">B'=<?= round($B1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Altura total de Papel del Forro de la Cartera</td>
                        <td class="td-center color_desc_naranja">Y'=<?= round($Y1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">12</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Despunte del Forro de la Cartera</td>
                        <td class="td-center">Despuntadora</td>
                    </tr>
                    <tr>
                        <td class="td-center">13</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forro de la Cartera</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Guarda de la Cartera -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Guarda de la Cartera</div>

                <img src="<?= URL; ?>public/images/libro/nuevas/Desarrollo-Libro--Forro-guarda---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

                <!-- DISEÑO -->
                <table class="table table-bordered table-hover table-responsive-md">
                    <tbody>
                        <tr>
                            <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                        </tr>
                        <tr>
                            <td class="td-center" style="width: 60%; font-weight: bold">Descripción</td>
                            <td class="td-center" style="width: 40%; font-weight: bold">Dimensiones</td>
                        </tr>
                        <tr>
                            <td class="color_desc_negro">Base de Guarda</td>
                            <td class="td-center color_desc_negro">B'' = <?= round($B11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_negro">Alto de la Guarda</td>
                            <td class="td-center color_desc_negro">Y'' = <?= round($Y11, 2); ?> cm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr>
                        <td class="td-center titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">15</td>
                        <td class="color_desc_negro">Base de Papel Guarda</td>
                        <td class="td-center color_desc_negro">B''=<?= round($B11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura de Papel de la Guarda</td>
                        <td class="td-center color_desc_negro">Y''=<?= round($Y11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">16</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Pegado de la Guarda</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                    <tr>
                        <td class="td-center">17</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Armado de la Caja</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

