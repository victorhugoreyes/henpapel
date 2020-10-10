
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

                <span class="tipo_caja">Caja Regalo.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Profundidad Tapa Exterior: <?=$T ?> cm | Grosor Cartón Cajón: <?=$g ?> cm | Grosor Cartón Tapa: <?=$G ?> cm |
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

                <img src="<?= URL; ?>public/images/regalo/nuevas/Desarrollo---Caja-REGALO---Empalme-cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td class="color_desc_azul">Base Exterior del Cajón</td>
                        <td class="td-center color_desc_azul">b' = <?= round($b1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Altura Exterior del Cajón</td>
                        <td class="td-center color_desc_azul">h' = <?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_verde">Profundidad Exterior del Cajón</td>
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
                        <td class="color_desc_rosa">Base Empalmado extendida del Cajón</td>
                        <td class="td-center color_desc_rosa">x=<?= round($x, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Altura Empalmado extendida del Cajón</td>
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

    <!-- Forro del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro del Cajón</div>

                <img src="<?= URL; ?>public/images/regalo/nuevas/Desarrollo---Caja-REGALO---Forro-Cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td class="color_desc_azul">Base Exterior del Cajón</td>
                        <td class="td-center color_desc_azul">b' = <?= round($b1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Altura Exterior del Cajón</td>
                        <td class="td-center color_desc_azul">h' = <?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_verde">Profundidad Exterior del Cajón</td>
                        <td class="td-center color_desc_verde">p' = <?= round($p1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Base de Papel Forro del Cajón</td>
                        <td class="td-center color_desc_rosa">b'' = <?= round($b11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Alto de Papel Forro del Cajón</td>
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
                        <td rowspan="2" class="td-center color_desc_negro">6</td>
                        <td class="color_desc_negro">Base del Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">f=<?= round($f, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura del Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">k=<?= round($k, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">7</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Papel Forro de Cajón</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="td-center">8</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado con Papel del Cajón</td>
                        <td class="td-center">Forradora de Cajón</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<!--
    <div class="pagebreak"></div>
-->

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Regalo.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Profundidad Tapa Exterior: <?=$T ?> cm | Grosor Cartón Cajón: <?=$g ?> cm | Grosor Cartón Tapa: <?=$G ?> cm |
            </div>
        </div>
    <div>

    <!-- Empalme de la Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Empalme de la Tapa</div>

                <img src="<?= URL; ?>public/images/regalo/nuevas/Desarrollo---Caja-REGALO---Empalme-tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td>Base Interior de la Tapa</td>
                            <td class="td-center">B = <?= round($B, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura Interior de la Tapa</td>
                            <td class="td-center">H = <?= round($H, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Base Exterior de la Tapa</td>
                            <td class="td-center color_desc_azul">B' = <?= round($B1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Altura Exterior de la Tapa</td>
                            <td class="td-center color_desc_azul">H' = <?= round($H1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Exterior de la Tapa</td>
                            <td class="td-center color_desc_verde">T = <?= round($T, 2); ?> cm</td>
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
                        <td class="td-center titulo-produccion" style="width: 1%">Paso</td>
                        <td class="td-center titulo-produccion" style="width: 40%">Descripción</td>
                        <td class="td-center titulo-produccion" style="width: 4%">Dimensiones</td>
                        <td class="td-center titulo-produccion" style="width: 13%">Proceso</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="td-center color_desc_naranja">9</td>
                        <td class="color_desc_naranja">Base de Cartón para Empalme de la Tapa</td>
                        <td class="td-center color_desc_naranja">X'=<?= round($X1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Alto de Cartón para Empalme de la Tapa</td>
                        <td class="td-center color_desc_naranja">Y'=<?= round($Y1, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">10</td>
                        <td class="color_desc_negro">Base de Papel Empalme de la Tapa</td>
                        <td class="td-center color_desc_negro">X''=<?= round($X11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Alto de Papel Empalme de la Tapa</td>
                        <td class="td-center color_desc_negro">Y''=<?= round($Y11, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td class="td-center">11</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalmado de Papel y Cartón de Tapa</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_rosa">12</td>
                        <td class="color_desc_rosa">Base final Extendida del Empalmado de la Tapa</td>
                        <td class="td-center color_desc_rosa">X=<?= round($X, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_rosa">Guillotina</td>
                    </tr>

                    <tr>
                        <td class="color_desc_rosa">Altura final Extendida del Empalmado de la Tapa</td>
                        <td class="td-center color_desc_rosa">Y=<?= round($Y, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="td-center color_desc_verde">13</td>
                        <td class="color_desc_verde">Distancia Ranurar de la Tapa</td>
                        <td class="td-center color_desc_verde">T=<?= round($T, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_verde">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado de Tapa</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Regalo.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Profundidad Tapa Exterior: <?=$T ?> cm | Grosor Cartón Cajón: <?=$g ?> cm | Grosor Cartón Tapa: <?=$G ?> cm |
            </div>
        </div>
    <div>
    <!-- Foro de la Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de la Tapa</div>

                <img src="<?= URL; ?>public/images/regalo/nuevas/Desarrollo---Caja-REGALO---Forro-tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td>Base Interior de la Tapa</td>
                            <td class="td-center">B = <?= round($B, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura Interior de la Tapa</td>
                            <td class="td-center">H = <?= round($H, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Base Exterior de la Tapa</td>
                            <td class="td-center color_desc_azul">B' = <?= round($B1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Altura Exterior de la Tapa</td>
                            <td class="td-center color_desc_azul">H' = <?= round($H1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Exterior de la Tapa</td>
                            <td class="td-center color_desc_verde">T = <?= round($T, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Base Forro del Cajón</td>
                            <td class="td-center color_desc_rosa">B'' = <?= round($B11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Alto Forro del Cajón</td>
                            <td class="td-center color_desc_rosa">H'' = <?= round($H11, 2); ?> cm</td>
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
                        <td class="td-center titulo-produccion" style="width: 1%">Paso</td>
                        <td class="td-center titulo-produccion" style="width: 40%">Descripción</td>
                        <td class="td-center titulo-produccion" style="width: 4%">Dimensiones</td>
                        <td class="td-center titulo-produccion" style="width: 13%">Proceso</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">14</td>
                        <td class="color_desc_negro">Base de Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">F=<?= round($F, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura de Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">K=<?= round($K, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td class="td-center">15</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado de Forro de la Tapa</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>

                    <tr>
                        <td class="td-center">16</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Tapa</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

