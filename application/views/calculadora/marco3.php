
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

                <span class="tipo_caja">Caja Marco Interno.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Altura: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Espesor de la Tapa: <?=$E ?> |
            </div>
        </div>

        <!-- imagen de impresion -->
<!--
        <div id="aside" class="col-md-4 img-print img-space-right"></div>
-->
    <div>

    <div><?php echo "<br />"; ?></div>

    <!-- Forro de Marco con Interno -->
    <div class="row">
	
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de Marco con Interno</div>

                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo---Caja-Marco-Interno---Forro-Marco-Interno---1000x1000px.jpg" class="img-width block__pic" alt="" />
                <!--
                <img src="<?= URL; ?>public/images/marco/nuevas/SVG/ Desarrollo - Caja Marco Interno - ORIGINAL - BOB-01.svg" class="img-width block__pic" alt="" />
                -->
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
                        <td class="color_desc_azul">Altura del Marco Interno</td>
                        <td class="td-center color_desc_azul">n = <?= round($n, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Base del Marco Interno</td>
                        <td class="td-center color_desc_azul">m = <?= round($m, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_negro">1</td>
                        <td class="color_desc_negro">Largo Rebasado del Papel Forro de medio marco Interno</td>
                        <td class="td-center color_desc_negro">l=<?= round($l, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Profundidad del Papel Forro del Marco Interno</td>
                        <td class="td-center color_desc_negro">q''=<?= round($q11, 2); ?> cm</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Marco con Interno -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Marco con Interno</div>

                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo - Caja Marco Interno - Marco con interno - 1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td class="color_desc_azul">Altura del Marco Interno</td>
                        <td class="td-center color_desc_azul">n = <?= round($n, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Base del Marco Interno</td>
                        <td class="td-center color_desc_azul">m = <?= round($m, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_naranja">2</td>
                        <td class="color_desc_naranja">Largo Rebasado del Cartón de medio Marco Interno</td>
                        <td class="td-center color_desc_naranja">l=<?= round($l, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Profundidad del Cartón del Marco Interno</td>
                        <td class="td-center color_desc_naranja">q'=<?= round($q1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center color_desc_azul">3</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Marco Interno</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td class="td-center color_desc_azul">4</td>
                        <td class="color_desc_azul">Largo Final de medio Marco Interno</td>
                        <td class="td-center color_desc_azul">l'=<?= round($l1, 2); ?> cm</td>
                        <td class="td-center color_desc_azul">Guillotina</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center">5</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado de Marco Interno</td>
                        <td rowspan="2" class="td-center">Ranuradora</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Base del Marco Interno</td>
                        <td class="td-center color_desc_azul">m=<?= round($m, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center color_desc_verde">6</td>
                        <td class="color_desc_verde">Profundidad del Marco Interno</td>
                        <td class="td-center color_desc_verde">q=<?= round($q, 2); ?> cm</td>
                        <td class="td-center color_desc_verde">Guillotina</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Marco Interno.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Altura: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Espesor de la Tapa: <?=$E ?> |
            </div>
        </div>
    <div>

    <!-- Empalme del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Empalme del Cajón</div>

                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo---Caja-Marco-Interno---Empalme-Cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
                <!--
                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo-almeja---carton---1000x1000px.png" class="img-width block__pic" alt="" />
                
                <img src="<?= URL; ?>public/images/marco/nuevas/SVG/ Desarrollo - Caja Marco Interno - ORIGINAL - BOB-01.svg" class="img-width block__pic" alt="" />
                 -->
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
                            <td>Base Interior del Cajón</td>
                            <td class="td-center">m' = <?= round($m1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura Interior del Cajón</td>
                            <td class="td-center">n' = <?= round($n1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Profundidad Interior del Cajón</td>
                            <td class="td-center">p/2 = <?= round($p/2, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Base Exterior del Cajón</td>
                            <td class="td-center color_desc_azul">m'' = <?= round($m11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Altura Exterior del Cajón</td>
                            <td class="td-center color_desc_azul">n'' = <?= round($n11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Exterior del Cajón</td>
                            <td class="td-center color_desc_verde">p' = <?= round($p1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Base Exendida del Cajón</td>
                            <td class="td-center color_desc_rosa">x = <?= round($x, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Altura Extendida del Cajón</td>
                            <td class="td-center color_desc_rosa">y = <?= round($y, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Base del Forro del Cajón</td>
                            <td class="td-center">f = <?= round($f, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura del Forro del Cajón</td>
                            <td class="td-center">j = <?= round($j, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_naranja">7</td>
                        <td class="color_desc_naranja">Base de Cartón para Empalme</td>
                        <td class="td-center color_desc_naranja">x'=<?= round($x1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Altura de Cartón para Empalme</td>
                        <td class="td-center color_desc_naranja">y'=<?= round($y1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">8</td>
                        <td class="color_desc_negro">Base de Papel para Empalme</td>
                        <td class="td-center color_desc_negro">x''=<?= round($x11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura de Papel para Empalme</td>
                        <td class="td-center color_desc_negro">y''=<?= round($y11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">9</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalme de Cartón y Papel del Cajón</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_verde">10</td>
                        <td class="color_desc_verde">Profundidad exterior del Cajón</td>
                        <td class="td-center color_desc_verde">p'=<?= round($p1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_verde">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado de Cajón</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Marco Interno.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Altura: <?=$h ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Espesor de la Tapa: <?=$E ?> |
            </div>
        </div>
    <div>

    <!-- Forro del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro del Cajón</div>

                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo---Caja-Marco-Interno---Forro-Cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td>Base Interior del Cajón</td>
                            <td class="td-center">m' = <?= round($m1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura Interior del Cajón</td>
                            <td class="td-center">n' = <?= round($n1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Profundidad Interior del Cajón</td>
                            <td class="td-center">p/2 = <?= round($p/2, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Base Exterior del Cajón</td>
                            <td class="td-center color_desc_azul">m'' = <?= round($m11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Altura Exterior del Cajón</td>
                            <td class="td-center color_desc_azul">n'' = <?= round($n11, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Exterior del Cajón</td>
                            <td class="td-center color_desc_verde">p' = <?= round($p1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Base Exendida del Cajón</td>
                            <td class="td-center">x = <?= round($x, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura Extendida del Cajón</td>
                            <td class="td-center">y = <?= round($y, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Base del Forro del Cajón</td>
                            <td class="td-center">f = <?= round($f, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura del Forro del Cajón</td>
                            <td class="td-center">j = <?= round($j, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_negro">11</td>
                        <td class="color_desc_negro">Base del Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">f'=<?= round($f1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura del Papel Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">j'=<?= round($j1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">12</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suaje del Forro del Cajón</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                    <tr>
                        <td class="td-center">13</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Pegado del Marco Interno</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Empalme de la Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Empalme de la Tapa</div>

                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo---Caja-Marco-Interno---Empalme-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td class="color_desc_azul">Medida Base Tapa</td>
                            <td class="td-center color_desc_azul">B = <?= round($B, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Medida Altura Tapa</td>
                            <td class="td-center color_desc_azul">H = <?= round($H, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Exterior de la Tapa</td>
                            <td class="td-center color_desc_verde">T = <?= round($T, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Base extendida de la Tapa</td>
                            <td class="td-center color_desc_rosa">X = <?= round($X, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Altura extendida de la Tapa</td>
                            <td class="td-center color_desc_rosa">Y = <?= round($Y, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_naranja">14</td>
                        <td class="color_desc_naranja">Base de Cartón para Empalme</td>
                        <td class="td-center color_desc_naranja">X'=<?= round($X1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Alto de Cartón para Empalme</td>
                        <td class="td-center color_desc_naranja">Y'=<?= round($Y1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_negro">15</td>
                        <td class="color_desc_negro">Base de Papel para Empalme</td>
                        <td class="td-center color_desc_negro">X''=<?= round($X11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Alto de Papel para Empalme</td>
                        <td class="td-center color_desc_negro">Y''=<?= round($Y11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">16</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalme de Cartón y Papel de la Tapa</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_verde">17</td>
                        <td class="color_desc_verde">Distancia a Ranurar del Empalmado de la Tapa</td>
                        <td class="td-center color_desc_verde">T=<?= round($T, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_verde">Ranuradora</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado de la Tapa</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de la Tapa</div>

                <img src="<?= URL; ?>public/images/marco/nuevas/Desarrollo---Caja-Marco-Interno---Forro-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td class="color_desc_azul">Medida Base Tapa</td>
                            <td class="td-center color_desc_azul">B = <?= round($B, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_azul">Medida Altura Tapa</td>
                            <td class="td-center color_desc_azul">H = <?= round($H, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_verde">Profundidad Exterior de la Tapa</td>
                            <td class="td-center color_desc_verde">T = <?= round($T, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Base extendida de la Tapa</td>
                            <td class="td-center">X = <?= round($X, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td>Altura extendida de la Tapa</td>
                            <td class="td-center">Y = <?= round($Y, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Base Forro del Cajón</td>
                            <td class="td-center color_desc_rosa">B' = <?= round($B1, 2); ?> cm</td>
                        </tr>
                        <tr>
                            <td class="color_desc_rosa">Alto Forro del Cajón</td>
                            <td class="td-center color_desc_rosa">H' = <?= round($H1, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_negro">18</td>
                        <td class="color_desc_negro">Base del Material Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">B''=<?= round($B11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_negro">Altura del Material Rebasado para Suajar Forro</td>
                        <td class="td-center color_desc_negro">H''=<?= round($H11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">19</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Tapa</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

