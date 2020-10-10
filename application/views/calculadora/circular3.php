
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

                <span class="tipo_caja">Caja Circular.</span> ODT: <?=$odt ?> | Diámetro: <?=$d ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Altura Tapa: <?=$P ?> |
            </div>
        </div>

        <!-- imagen de impresion -->
<!--
        <div id="aside" class="col-md-4 img-print img-space-right"></div>
-->
    <div>

    <div><?php echo "<br />"; ?></div>

    <!-- Base del Cajón -->
    <div class="row">
	
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Base del Cajón</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Base-cajon---5000x5000px.jpg" class="img-width block__pic" alt="" />
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
                        <td>Diámetro Exterior del Cajón</td>
                        <td class="td-center">d' = <?= $d_1; ?> cm</td>
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
                        <td class="titulo-produccion titulo-produccion-paso">Paso</td>
                        <td class="td-center titulo-produccion titulo-produccion-descripcion">Descripción</td>
                        <td class="td-center titulo-produccion titulo-produccion-dimensiones">Dimensiones</td>
                        <td class="td-center titulo-produccion titulo-produccion-proceso">Proceso</td>
                    </tr>
                    <tr>
                        <td class="td-center color_desc_negro">1</td>
                        <td class="color_desc_negro">Cartón para Empalme Base de Cajón</td>
                        <td class="td-center color_desc_negro">z=<?= round($z, 2); ?> cm</td>
                        <td class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="td-center color_desc_rosa">2</td>
                        <td class="color_desc_rosa">Papel para Empalme Base de Cajón</td>
                        <td class="td-center color_desc_rosa">z'=<?= round($z_1, 2); ?> cm</td>
                        <td class="td-center color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="td-center">3</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalmado de Cartón y Papel de Base Cajón</td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_azul">4</td>
                        <td class="color_desc_azul">Diámetro del Suaje Empalmado del Cajón</td>
                        <td class="td-center color_desc_azul">d=<?= round($d, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_azul">Maq. Suaje</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Empalmado de Base del Cajón</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Circunferencia del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Circunferencia del Cajón</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Circunferencia-cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td class="color_desc_rosa">Profundidad Exterior del Cajón</td>
                        <td class="td-center color_desc_rosa">p' = <?= round($p_1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Circunferencia Exterior del Cajón</td>
                        <td class="td-center color_desc_rosa">c = <?= round($c, 2); ?> cm</td>
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
                        <td rowspan="2" class="td-center color_desc_rosa">5</td>
                        <td class="color_desc_rosa">Profundidad del Cartón Exterior del Cajón</td>
                        <td class="td-center color_desc_rosa">p'=<?= round($p_1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Largo de la Circunferencia del Cartón del Cajón</td>
                        <td class="td-center color_desc_rosa">c=<?= round($c, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">6</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Armado de Cajón</td>
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

                <span class="tipo_caja">Caja Circular.</span> ODT: <?=$odt ?> | Diámetro: <?=$d ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Altura Tapa: <?=$P ?> |
            </div>
        </div>
    <div>

    <!-- Forro Exterior del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro Exterior del Cajón</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Forro-Exterior-Cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center color_desc_naranja">7</td>
                        <td class="color_desc_naranja">Profundidad de Papel Forro Exterior del Cajón</td>
                        <td class="td-center color_desc_naranja">p''=<?= round($p_1_1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Largo de Papel Forro Exterior del Cajón</td>
                        <td class="td-center color_desc_naranja">c'=<?= round($c_1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">8</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado con Papel del Exterior del Cajón</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pompa del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Pompa del Cajón</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Pompa-cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td class="color_desc_azul">Diámetro del Papel Pompa del Cajón</td>
                        <td class="td-center color_desc_azul">d = <?= $d; ?> cm</td>
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
                        <td class="td-center color_desc_negro">9</td>
                        <td class="color_desc_negro">Papel Rebasado para Pompa del Cajón</td>
                        <td class="td-center color_desc_negro">r=<?= round($r, 2); ?> cm</td>
                        <td class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center color_desc_azul">10</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Papel Pompa del Cajón</td>
                        <td rowspan="2" class="td-center">Suaje</td>
                    </tr>
                    <tr>
                        <td class="color_desc_azul">Diámetro del Papel Pompa del Cajón</td>
                        <td class="td-center color_desc_azul">d=<?= round($d, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">11</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Pegado de la Pompa de Papel del Cajón</td>
                        <td class="td-center"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro Interior del Cajón -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro Interior del Cajón</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Forro-interior-cajon---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center color_desc_morado">12</td>
                        <td class="color_desc_morado">Profundidad de la Cartulina Forro Interior del Cajón (Cartulina)</td>
                        <td class="td-center color_desc_morado">i=<?= round($i, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_morado">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_morado">Largo de la Cartulina Forro Interior del Cajón (Cartulina)</td>
                        <td class="td-center color_desc_morado">c''=<?= round($c_1_1, 2); ?> cm</td>
                    </tr>
                    <tr>
                        <td class="td-center">13</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado con Papel del Interior del Cajón</td>
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

                <span class="tipo_caja">Caja Circular.</span> ODT: <?=$odt ?> | Diámetro: <?=$d ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Altura Tapa: <?=$P ?> |
            </div>
        </div>
    <div>

    <!-- Base Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Base Tapa</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Base-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td>Diámetro Exterior de la Tapa</td>
                            <td class="td-center">D' = <?= round($D_1, 2); ?> cm</td>
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
                        <td class="td-center color_desc_negro">14</td>
                        <td class="color_desc_negro">Cartón para Empalme de la Base de Tapa</td>
                        <td class="td-center color_desc_negro">Z=<?= round($Z, 2); ?> cm</td>
                        <td class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="td-center color_desc_rosa">15</td>
                        <td class="color_desc_rosa">Papel para Empalme de la Base de Tapa</td>
                        <td class="td-center color_desc_rosa">Z'=<?= round($Z_1, 2); ?> cm</td>
                        <td class="td-center color_desc_rosa">Guillotina</td>
                    </tr>

                    <tr>
                        <td class="td-center">16</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Empalmado de Cartón y Papel de la Tapa </td>
                        <td class="td-center">Engomadora y Calandra</td>
                    </tr>

                    <tr>
                        <td rowspan="2" class="td-center color_desc_azul">17</td>
                        <td class="color_desc_azul">Diámetro Interior de la Base de Tapa</td>
                        <td class="td-center color_desc_azul">D=<?= round($D, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_azul">Suaje</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajado del Empalmado Base de la Tapa</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Circunferencia de la Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Circunferencia de la Tapa</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Circunferencia-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center color_desc_morado">18</td>
                        <td class="color_desc_morado">Profundidad Exterior del Cartón de la Tapa</td>
                        <td class="td-center color_desc_morado">P=<?= round($P, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_morado">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_morado">Largo de la Circunferencia del Cartón de la Tapa</td>
                        <td class="td-center color_desc_morado">C=<?= round($C, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td class="td-center">19</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Armado de la Tapa </td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro de la Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro de la Tapa</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Forro-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td class="td-center color_desc_negro">20</td>
                        <td class="color_desc_negro">Papel Rebasado para Forro Superior de la Tapa</td>
                        <td class="td-center color_desc_negro">R=<?= round($R, 2); ?> cm</td>
                        <td class="td-center color_desc_negro">Guillotina</td>
                    </tr>
                    <tr>
                        <td rowspan="2" class="td-center">21</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Suajar Forro Papel de la Tapa</td>
                        <td rowspan="2" class="td-center">Suaje</td>
                    </tr>

                    <tr>
                        <td class="color_desc_verde">Forro de Papel de la Tapa</td>
                        <td class="td-center color_desc_verde">D''=<?= round($D_1_1, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td class="td-center">22</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado con Papel de Tapa</td>
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

                <span class="tipo_caja">Caja Circular.</span> ODT: <?=$odt ?> | Diámetro: <?=$d ?> cm | Profundidad: <?=$p ?> cm | Grosor de Cartón: <?=$g ?> | Altura Tapa: <?=$P ?> |
            </div>
        </div>
    <div>

    <!-- Forro Exterior de la Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro Exterior de la Tapa</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Forro-Exterior-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                            <td class="color_desc_negro">Profundidad Exterior de la Tapa</td>
                            <td class="td-center color_desc_negro">P=<?= round($P, 2); ?> cm</td>
                            <td class="td-center color_desc_negro"></td>
                        </tr>
                        <tr>
                            <td>Circunferencia Exterior del Cartón de la Tapa</td>
                            <td class="td-center">C=<?= round($C, 2); ?> cm</td>
                            <td class="td-center"></td>
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
                        <td rowspan="2" class="td-center color_desc_rosa">23</td>
                        <td class="color_desc_rosa">Profundidad de Papel Forro Exterior de la Tapa</td>
                        <td class="td-center color_desc_rosa">P’=<?= round($P_1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_rosa">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_rosa">Circunferencia de Papel Forro Exterior de la Tapa</td>
                        <td class="td-center color_desc_rosa">C’=<?= round($C_1, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td class="td-center">24</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado con Papel del Exterior de la Tapa</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Forro Interior Tapa -->
    <div class="row">
    
        <div class="col-md-5">
            
            <div>

                <div class="titulo">Forro Interior de la Tapa</div>

                <img src="<?= URL; ?>public/images/circular/nuevas/Desarrollo---Caja-Redonda---Forro-Interior-Tapa---1000x1000px.jpg" class="img-width block__pic" alt="" />
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
                        <td rowspan="2" class="td-center color_desc_naranja">25</td>
                        <td class="color_desc_naranja">Profundidad de la Cartulina Forro Interior de la Tapa (Cartulina)</td>
                        <td class="td-center color_desc_naranja">P''=<?= round($P_1_1, 2); ?> cm</td>
                        <td rowspan="2" class="td-center color_desc_naranja">Guillotina</td>
                    </tr>
                    <tr>
                        <td class="color_desc_naranja">Circunferencia de la Cartulina Forro Interior de la Tapa</td>
                        <td class="td-center color_desc_naranja">C''=<?= round($C_1_1, 2); ?> cm</td>
                    </tr>

                    <tr>
                        <td class="td-center">26</td>
                        <td colspan="2" class="colspan-gray td_gris sweep-to-right">Forrado del Interior de la Tapa</td>
                        <td class="td-center">Encuadernación</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>

