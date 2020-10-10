
    <link rel="stylesheet" href="<?= URL; ?>public/css/960.css" type="text/css" media="screen">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= URL; ?>public/css/screen.css" type="text/css" media="screen" />
    <link rel="stylesheet" href= "<?= URL; ?>public/css/print-preview.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?= URL; ?>public/css/print.css" type="text/css" media="print" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>
    <script src="<?= URL; ?>public/js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(function() {
/*
        $('#aside').prepend('<a class="print-preview"><img src="<?= URL; ?>public/images/icon-print-preview.png" width="40" heigh="40">&nbsp;Imprimir</img></a>');
*/
        $('#aside').prepend('<a class="print-preview"><img src="<?= URL; ?>public/images/icon-print-preview.png" width="20" heigh="20">&nbsp;</img></a>');
        $('a.print-preview').printPreview();
    });
</script>

<style>

    #navbar {
        display: none;
    }
    
    .items {
        margin: 0 auto;
        align-self: center;
    }

    .items div img {
        height: 350px;
        width: 350px;
        margin: 0 auto 10px auto;
    }

    h2 {
        margin: 0 auto 10px auto;
    }

    p {
        margin: 0 auto 10px auto;
    }

    .resume1{
        font-size: 1.1em;
        font-family: Arial, sans-serif, 'Trebuchet MS', Futura;
        padding-left: 60px;
        color:#D0E2F4;
        background: transparent;        /* #2A3F54; */
        border-radius: 3px;
    }

    .resume1 div{
        width: auto!important;
        display: inline-block;
        vertical-align: top;
        padding: 10px auto 5px auto;
        margin: 8px 0;
    }

    .grid_3_1{
        width:30px;
    }

</style>

<!--
<div id="header" class="container_12" align="center">
    <strong>:: Cerillera ::</strong>
</div>
-->

<div id="content" class="container_12">

    <div class="resume1">
        <div>Caja Cerillera. ODT: <span><?= $odt ?> | </span></div>
        <div>Base: <span><?= $b ?></span> cm | </div>
        <div>Altura: <span><?= $h ?></span> cm | </div>
        <div>Profundidad Cajón: <span><?= $p ?></span> cm | </div>
        <div>Profundidad Tapa: <span><?= $T ?></span> cm | </div>
        <div>Grosor de Cajón: <span><?= $g ?> cm | </span></div>
        <div>Grosor de Tapa: <span><?= $G ?> cm | </span></div>
    </div>

    <!-- imagen de impresion -->
    <div id="aside" class="grid_3_1"></div>

    <div><?php echo "<br /><br />"; ?></div>

	<!-- Cajón -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?php echo URL; ?>public/images/cerillera/default.jpg" alt="Falta imagen" style="width: 350px; height: 350px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Cajón</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base del Cajón</td>
                                    <td class="nomenclatura_2">b'</td>
                                    <td class="print-td"><?= round($b1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura del Cajón</td>
                                    <td class="nomenclatura_2">h'</td>
                                    <td class="print-td"><?=round($h1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad del Cajón</td>
                                    <td class="nomenclatura_2">p'</td>
                                    <td class="print-td"><?=round($p1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Extendida del Cajón</td>
                                    <td class="nomenclatura_2">x</td>
                                    <td class="print-td"><?php echo round($x,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Extendida del Cajón</td>
                                    <td class="nomenclatura_2">y</td>
                                    <td class="print-td"><?php echo round($y,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Cartón para Empalme</td>
                                    <td class="nomenclatura_2">x'</td>
                                    <td class="print-td"><?php echo round($x1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto Cartón para Empalme</td>
                                    <td class="nomenclatura_2">y'</td>
                                    <td class="print-td"><?php echo round($y1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Empalme Papel</td>
                                    <td class="nomenclatura_2">x''</td>
                                    <td class="print-td"><?php echo round($x11,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto Empalme Papel</td>
                                    <td class="nomenclatura_2">y''</td>
                                    <td class="print-td"><?php echo round($y11,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Forro del Cajón</td>
                                    <td class="nomenclatura_2">b''</td>
                                    <td class="print-td"><?php echo round($b11,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto Forro del Cajón</td>
                                    <td class="nomenclatura_2">h''</td>
                                    <td class="print-td"><?php echo round($h11,2) ?> cm</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forro -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?php echo URL; ?>public/images/cerillera/default.jpg" alt="Falta imagen" style="width: 350px; height: 350px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Material Rebasado para Suajar</td>
                                    <td class="nomenclatura_2">f</td>
                                    <td class="print-td"><?php echo round($f, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Material Rebasado para Suajar</td>
                                    <td class="nomenclatura_2">k</td>
                                    <td class="print-td"><?php echo round($k, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pagebreak"></div>

    <div class="resume1">
        <div>Caja Cerillera. ODT: <span><?= $odt ?> | </span></div>
        <div>Base: <span><?= $b ?></span> cm | </div>
        <div>Altura: <span><?= $h ?></span> cm | </div>
        <div>Profundidad Cajón: <span><?= $p ?></span> cm | </div>
        <div>Profundidad Tapa: <span><?= $T ?></span> cm | </div>
        <div>Grosor de Cajón: <span><?= $g ?> cm | </span></div>
        <div>Grosor de Tapa: <span><?= $G ?> cm | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Tapa -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?php echo URL; ?>public/images/cerillera/default.jpg" alt="Falta imagen" style="width: 350px; height: 350px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Tapa</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Interior</td>
                                    <td class="nomenclatura_2">B</td>
                                    <td class="print-td"><?php echo round($B, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Interior</td>
                                    <td class="nomenclatura_2">H</td>
                                    <td class="print-td"><?php echo round($H, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad Interior</td>
                                    <td class="nomenclatura_2">P</td>
                                    <td class="print-td"><?php echo round($P, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Exterior</td>
                                    <td class="nomenclatura_2">B'</td>
                                    <td class="print-td"><?php echo round($B1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad Exterior</td>
                                    <td class="nomenclatura_2">P'</td>
                                    <td class="print-td"><?php echo round($P1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Largo Extendido</td>
                                    <td class="nomenclatura_2">L</td>
                                    <td class="print-td"><?php echo round($L, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Largo Carton Extendido</td>
                                    <td class="nomenclatura_2">L'</td>
                                    <td class="print-td"><?php echo round($L1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Cartón Extendido</td>
                                    <td class="nomenclatura_2">H'</td>
                                    <td class="print-td"><?php echo round($H1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Largo Papel Empalme</td>
                                    <td class="nomenclatura_2">L''</td>
                                    <td class="print-td"><?php echo round($L11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Papel Empalme</td>
                                    <td class="nomenclatura_2">H''</td>
                                    <td class="print-td"><?php echo round($H11, 2); ?> cm</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forro Tapa-->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?php echo URL; ?>public/images/cerillera/default.jpg" alt="Falta imagen" style="width: 350px; height: 350px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro Tapa</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Largo Forro Tapa</td>
                                    <td class="nomenclatura_2">X</td>
                                    <td class="print-td"><?php echo round($X, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto Forro Tapa</td>
                                    <td class="nomenclatura_2">Y</td>
                                    <td class="print-td"><?php echo round($Y, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Largo Material Rebasado Suajar</td>
                                    <td class="nomenclatura_2">X'</td>
                                    <td class="print-td"><?php echo round($X1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Material Rebasado Suajar</td>
                                    <td class="nomenclatura_2">Y'</td>
                                    <td class="print-td"><?php echo round($Y1, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

