<?php

error_reporting(0);

?>

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

<!--
<div id="header" class="container_12" align="center">
    <strong>:: Almeja ::</strong>
</div>
-->

<div class="content container">
    
    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Almeja.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cajon: <?=$g ?> | Grosor de Cartera: <?=$G ?> |
            </div>
        </div>

        <!-- imagen de impresion -->
<!--
        <div id="aside" class="col-md-4 img-print img-space-right"></div>
-->
    <div>

    <div><?php echo "<br />"; ?></div>

    <!-- Empalme del Cajón -->
    <div class="row">
	
        <div class="col-md-5">

            <div>

                <div class="titulo">Empalme del Cajón</div>

                <img src="<?= URL; ?>public/images/almeja/nuevas/Desarrollo-almeja---carton---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>
            <table class="table table-bordered table-hover table-responsive-md">

                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                    </tr>
                    <tr>
                        <td class="tit_desc_dim">Descripción</td>

                        <td class="tit_desc_dim" >Dimensiones</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_azul">Base del Cajón</td>
                        <td class="color_desc_azul">b' = <?= $b1; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_azul">Altura del Cajón</td>
                        <td class="color_desc_azul">h' = <?= $h1; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_verde">Profundidad del Cajón</td>
                        <td class="color_desc_verde">p' = <?= $p1; ?> cm</td>
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
                        <td class="titulo_paso">Paso</td>
                        <td class="titulo_desc">Descripción</td>
                        <td class="titulo_dim">Dimensiones</td>
                        <td class="titulo_proc">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="color_desc_naranja">1</td>
                        <td class="text_desc color_desc_naranja">Base de Cartón para Empalme para Cajón</td>
                        <td class="color_desc_naranja">x'=<?= $x1; ?> cm</td>
                        <td rowspan="2" class="color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_naranja">Alto de Cartón para Empalme para Cajón</td>
                        <td class="color_desc_naranja">y'=<?= $y1; ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="color_desc_negro">2</td>
                        <td class="text_desc color_desc_negro">Base de Papel Empalme para Cajón</td>
                        <td class="color_desc_negro">x''=<?= $x11; ?> cm</td>
                        <td rowspan="2" class="color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_negro">Alto de Papel Empalme para Cajón</td>
                        <td class="color_desc_negro">y''=<?= $y11; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">3</td>
                        <td colspan="2" class="text-darkgray bg-dark td_gris colspan-gray sweep-to-right text_desc color_desc_negro">Empalme de Papel y Cartón para Cajón</td>
                        <td class="color_desc_negro">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="color_desc_rosa">4</td>
                        <td class="text_desc color_desc_rosa">Base final extendida del Empalmado de Cajón</td>
                        <td class="color_desc_rosa">x=<?= $x; ?> cm</td>
                        <td rowspan="2" class="color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_rosa">Altura final extendida del Empalmado de Cajón</td>
                        <td class="color_desc_rosa">y=<?= $y; ?> cm</td>
                    </tr>
                    <tr style="margin-top: 1px;">
                        <td rowspan="2" class="color_desc_verde">5</td>
                        <td class="text_desc color_desc_verde">Distancia a Ranurar el Empalmado de Cajón</td>
                        <td class="color_desc_verde">p'=<?= $p1; ?> cm</td>
                        <td class="color_desc_verde">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Ranurado del Empalmado de Cajón</td>
                        <td class="color_desc_negro">Ranuradora</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro del Cajón</div>

                <img src="<?= URL; ?>public/images/almeja/nuevas/Desarrollo-almeja---Forro-cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>
                <table class="table table-bordered table-hover table-responsive-md">

                    <tbody>
                        <tr>
                            <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                        </tr>
                        <tr>
                            <td class="tit_desc_dim">Descripción</td>
                            <td class="tit_desc_dim">Dimensiones</td>
                        </tr>
                        <tr>
                            <td class="text_desc color_desc_azul">Base del Cajón</td>
                            <td class="color_desc_azul">b' = <?= $b1; ?> cm</td>
                        </tr>
                        <tr>
                            <td class="text_desc color_desc_azul">Altura del Cajón</td>
                            <td class="color_desc_azul">h' = <?= $h1; ?> cm</td>
                        </tr>
                        <tr>
                            <td class="text_desc color_desc_verde">Profundidad del Cajón</td>
                            <td class="color_desc_verde">p' = <?= $p1; ?> cm</td>
                        </tr>
                        <tr>
                            <td class="text_desc color_desc_rosa">Base de Papel Forro del Cajón</td>
                            <td class="color_desc_rosa">b'' = <?= $b11; ?> cm</td>
                        </tr>
                        <tr>
                            <td class="text_desc color_desc_rosa">Alto de Papel Forro del Cajón</td>
                            <td class="color_desc_rosa">h'' = <?= $h11; ?> cm</td>
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
                        <td class="titulo_paso">Paso</td>
                        <td class="titulo_desc">Descripción</td>
                        <td class="titulo_dim">Dimensiones</td>
                        <td class="titulo_proc">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="color_desc_negro">6</td>
                        <td class="text_desc color_desc_negro">Base del Papel Rebasado para Suajar forro</td>
                        <td class="color_desc_negro">f=<?= $f; ?> cm</td>
                        <td rowspan="2" class="color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_negro color_desc_negro">Altura del Papel Rebasado para Suajar Forro</td>
                        <td class="color_desc_negro">k=<?= $k; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">7</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Suajado del Papel Forro de Cajón</td>
                        <td class="color_desc_negro">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">8</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Forrado con Papel del Cajón</td>
                        <td class="color_desc_negro">Forradora de Cajón</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Almeja.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cajon: <?=$g ?> | Grosor de Cartera: <?=$G ?> |
            </div>
        </div>
    <div>

    <!-- Cartón de la Cartera -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Cartón de la Cartera</div>

                <img src="<?= URL; ?>public/images/almeja/nuevas/Desarrollo-almeja---carton-Cartera---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                    </tr>
                    <tr>
                        <td class="tit_desc_dim">Descripción</td>
                        <td class="tit_desc_dim">Dimensiones</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_rosa">Base de la Cartera</td>
                        <td class="color_desc_rosa">B = <?= $B; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_azul">Alto de la Tapa</td>
                        <td class="color_desc_azul">H = <?= $H; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_rosa">Altura total de la Cartera</td>
                        <td class="color_desc_rosa">Y = <?= $Y; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_verde">Profundidad de Lomos de la Cartera</td>
                        <td class="color_desc_verde">P = <?= $P; ?> cm</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <!-- PRODUCCIÓN -->
        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr style="width: 100%">
                        <td class="titulo_paso">Paso</td>
                        <td class="titulo_desc">Descripción</td>
                        <td class="titulo_dim">Dimensiones</td>
                        <td class="titulo_proc">Proceso</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="color_desc_rosa">9</td>
                        <td class="text_desc color_desc_rosa">Base Cartón de la Cartera</td>
                        <td class="color_desc_rosa">B=<?= $B; ?> cm</td>
                        <td rowspan="2" class="color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_rosa">Altura total del Cartón de la Cartera</td>
                        <td class="color_desc_rosa">Y=<?= $Y; ?> cm</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="color_desc_verde">10</td>
                        <td class="text_desc color_desc_verde">Profundidad a Ranurar de Lomos de la Cartera</td>
                        <td class="color_desc_verde">P=<?= $P; ?> cm</td>
                        <td class="color_desc_verde">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Ranurado de Cartera</td>
                        <td class="color_desc_negro">Ranuradora</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro de la Cartera -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de la Cartera</div>

                <img src="<?= URL; ?>public/images/almeja/nuevas/Desarrollo-almeja---Cartera---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

            <div>

            <!-- DISEÑO -->
            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="2">DISEÑO</td>
                    </tr>
                    <tr>
                        <td class="tit_desc_dim">Descripción</td>
                        <td class="tit_desc_dim">Dimensiones</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_rosa">Base de la Cartera</td>
                        <td class="color_desc_rosa">B = <?= $B; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_azul">Alto de la Tapa</td>
                        <td class="color_desc_azul">H = <?= $H; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_rosa">Altura total de la Cartera</td>
                        <td class="color_desc_rosa">Y = <?= $Y; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_verde">Profundidad de Lomos de la Cartera</td>
                        <td class="color_desc_verde">P = <?= $P; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_naranja">Base total del Forro Cartera</td>
                        <td class="color_desc_naranja">B' = <?= $B1; ?> cm</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_naranja">Altura total del Forro de la Cartera</td>
                        <td class="color_desc_naranja">Y' = <?= $Y1; ?> cm</td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>

        <!-- PRODUCCIÓN -->
        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr style="width: 100%">
                        <td class="titulo_paso">Paso</td>
                        <td class="titulo_desc">Descripción</td>
                        <td class="titulo_dim">Dimensiones</td>
                        <td class="titulo_proc">Proceso</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="color_desc_naranja">11</td>
                        <td class="text_desc color_desc_naranja">Base total de Papel del Forro Cartera</td>
                        <td class="color_desc_naranja">B'=<?= $B1; ?> cm</td>
                        <td rowspan="2" class="color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_naranja">Altura total de Papel del Forro de la Cartera</td>
                        <td class="color_desc_naranja">Y'=<?= $Y1; ?> cm</td>
                    </tr>

                    <tr>
                        <td class="color_desc_negro">12</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Despunte del Forro de la Cartera</td>
                        <td class="color_desc_negro">Depuntadora</td>
                    </tr>

                    <tr>
                        <td class="color_desc_negro">13</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Forrado de Cartera</td>
                        <td class="color_desc_negro">Forradora de Cartera</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Guarda -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Guarda</div>

                <img src="<?= URL; ?>public/images/almeja/nuevas/Desarrollo-almeja---Guarda---1000x1000px.jpg" class="img-width block__pic" alt="" />
            </div>

        </div>

        <!-- PRODUCCIÓN -->
        <div class="col-md-7">

            <table class="table table-bordered table-hover table-responsive-md">
                <tbody>
                    <tr>
                        <td class="titulo-tipo td_gris" colspan="4">PRODUCCIÓN</td>
                    </tr>
                    <tr style="width: 100%">
                        <td class="titulo_paso">Paso</td>
                        <td class="titulo_desc">Descripción</td>
                        <td class="titulo_dim">Dimensiones</td>
                        <td class="titulo_proc">Proceso</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="color_desc_negro">14</td>
                        <td class="text_desc color_desc_negro">Base de Papel Guarda</td>
                        <td class="color_desc_negro">B''=<?= $B11; ?> cm</td>
                        <td rowspan="2" class="color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="text_desc color_desc_negro">Alto de Papel Guarda</td>
                        <td class="color_desc_negro">Y''=<?= $Y11; ?> cm</td>
                    </tr>

                    <tr>
                        <td class="color_desc_negro">15</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Pegado de Guarda</td>
                        <td class="color_desc_negro">Engomado y Calandra</td>
                    </tr>

                    <tr>
                        <td class="color_desc_negro">16</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right text_desc color_desc_negro">Armado de Caja</td>
                        <td class="color_desc_negro">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

