
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

                <span class="tipo_caja">Caja Vino.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Grosor del Cajón: <?=$g ?> cm |
            </div>
        </div>

        <!-- imagen de impresion -->
<!--
        <div id="aside" class="col-md-4 img-print img-space-right"></div>
-->
    <div>

    <div><?php echo "<br />"; ?></div>

    <!-- Empalme del Cajón (Parte de Caja A)-->
    <div class="row">
	
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Empalme del Cajón</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td>Base Exterior del Cajón</td>
                        <td class="td-center">b' = <?= round($b1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Altura Exterior del Cajón</td>
                        <td class="td-center">h' = <?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Profundidad Exterior del Cajón</td>
                        <td class="td-center">p' = <?= round($p1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Largo Extendido de los Laterales del Cajón</td>
                        <td class="td-center">l = <?= round($l, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Largo del Forro del Cajón</td>
                        <td class="td-center">f = <?= round($f, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Profundidad del Forro del Cajón</td>
                        <td class="td-center">k' = <?= round($k1, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center">1</td>
                        <td>Largo de Cartón Rebasado para Cajón</td>
                        <td class="td-center">l'=<?= round($l1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Profundidad de Cartón Rebasada del Cajón</td>
                        <td class="td-center">p''=<?= round($p11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center">2</td>
                        <td>Largo de Papel para Empalme del Cajón</td>
                        <td class="td-center">l''=<?= round($l11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Profundidad de Papel para Empalme del Cajón</td>
                        <td class="td-center">k=<?= round($k, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">3</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalmado de Papel y Cartón de Cajón</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td class="td-center">4</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Empalmado Cajón</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="td-center">5</td>
                        <td>Distancias a Ranurar Base Exterior del Cajón</td>
                        <td class="td-center">b'=<?= round($b1, 2); ?> cm</td>
                        <td rowspan="4" class="td-center">Ranuradora</td>
                    </tr>
                    <tr>
                        <td>Distancias a Ranurar Altura Exterior del Cajón</td>
                        <td class="td-center">h'=<?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Revisión con Albanene de medidas para Ranurado</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Ranurado de Cajón</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Fondo del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Fondo del Cajón</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center">6</td>
                        <td>Base Rebasada del Cartón para Fondo del Cajón</td>
                        <td class="td-center">b''=<?= round($b11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura Rebasada del Cartón para Fondo del Cajón</td>
                        <td class="td-center">h''=<?= round($h11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center">7</td>
                        <td>Base de Papel para Empalme del Fondo de la Caja</td>
                        <td class="td-center">m=<?= round($m, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura de Papel para Empalme del Fondo de la Caja</td>
                        <td class="td-center">n=<?= round($n, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">8</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalmado de Fondo Cajón</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td class="td-center">9</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Fondo del Cajón</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="td-center">10</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Armado de Cajón (Partes A+B)</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Vino.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Grosor del Cajón: <?=$g ?> cm |
            </div>
        </div>
    <div>

    <!-- Forro del Cajón (Parte de Caja C)-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro del Cajón</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td>Base Exterior del Cajón</td>
                        <td class="td-center">b' = <?= round($b1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Altura Exterior del Cajón</td>
                        <td class="td-center">h' = <?= round($h1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Profundidad Exterior del Cajón</td>
                        <td class="td-center">p' = <?= round($p1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Largo Extendido de los Laterales del Cajón</td>
                        <td class="td-center">l = <?= round($l, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Largo del Forro del Cajón</td>
                        <td class="td-center">f = <?= round($f, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Profundidad del Forro del Cajón</td>
                        <td class="td-center">k' = <?= round($k1, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center">11</td>
                        <td>Largo Rebasado del Papel Forro del Cajón</td>
                        <td class="td-center">f'=<?= round($f1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Profundidad Rebasado del Papel Forro del Cajón</td>
                        <td class="td-center">k''=<?= round($k11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">12</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suaje del Forro del Cajón</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="td-center">13</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Cajón</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Pompa del Cajón (Parte de Caja D)-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Pompa del Cajón</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center">14</td>
                        <td>Base de Papel de la Pompa del Cajón</td>
                        <td class="td-center">b=<?= round($b, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura de Papel de la Pompa del Cajón</td>
                        <td class="td-center">h=<?= round($h, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center">15</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Pegado de Fondo de Cajón</td>
                        <td rowspan="2" class="td-center">Encuadernación</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Armado de Partes de Caja A+B+C+D</td>
                    </tr>
                    <tr>
                        <td class="td-center">Op.</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Pegado de Banco o Suaje para Botella (Opcional)</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Vino.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Grosor del Cajón: <?=$g ?> cm |
            </div>
        </div>
    <div>

    <!-- Cartón para Tapa-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Cartón para Tapa</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td>Base Cartón Tapa</td>
                        <td class="td-center">B = <?= round($B, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Altura Cartón Tapa</td>
                        <td class="td-center">H = <?= round($H, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center">16</td>
                        <td>Base Cartón Tapa</td>
                        <td class="td-center">B=<?= round($B, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura Cartón Tapa</td>
                        <td class="td-center">H=<?= round($H, 2); ?> cm</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro de la Tapa-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de la Tapa</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td>Base Forro de la Tapa</td>
                        <td class="td-center">B'' = <?= round($B11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Altura Forro de la Tapa</td>
                        <td class="td-center">H'' = <?= round($H11, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center">17</td>
                        <td>Base de Papel Forro de la Tapa</td>
                        <td class="td-center">B''=<?= round($B11, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura de Papel Forro de la Tapa</td>
                        <td class="td-center">H''=<?= round($H11, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">18</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado de Tapa</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div id="row">

        <div class="col-md-12 resume1">

            <div style="display: inline-block; padding-left: 60px;">

                <span class="tipo_caja">Caja Vino.</span> ODT: <?=$odt ?> | Base: <?=$b ?> cm | Alto: <?=$h ?> cm | Profundidad Cajón: <?=$p ?> cm | Grosor del Cajón: <?=$g ?> cm |
            </div>
        </div>
    <div>

    <!-- Guarda de la Tapa-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Guarda de la Tapa</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td>Base Guarda de la Tapa</td>
                        <td class="td-center">b = <?= round($b, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td>Altura Guarda de la Tapa</td>
                        <td class="td-center">h = <?= round($h, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center">19</td>
                        <td>Base Guarda de Papel de la Tapa</td>
                        <td class="td-center">b=<?= round($b, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura Guarda de Papel de la Tapa</td>
                        <td class="td-center">h=<?= round($h, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">20</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Pegado de la Guarda</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <!-- Suaje de Eva-->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Suaje de Eva</div>

                <img src="<?= URL; ?>public/images/vino/default.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center">21</td>
                        <td>Base de Papel del Suaje de EVA o Cartón</td>
                        <td class="td-center">X=<?= round($X, 2); ?> cm</td>
                        <td rowspan="2" class="td-center">Guillotina</td>
                    </tr>
                    <tr>
                        <td>Altura de Papel del Suaje de EVA o Cartón</td>
                        <td class="td-center">Y=<?= round($Y, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">22</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado de EVA de la Tapa</td>
                        <td class="td-center">Máquina de Suaje</td>
                    </tr>
                    <tr>
                        <td class="td-center">23</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado de EVA de la Tapa o MariaLuisa</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</div>

