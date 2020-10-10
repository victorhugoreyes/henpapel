
    <link rel="stylesheet" href="<?= URL; ?>public/css/960.css" type="text/css" media="screen">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="<?= URL; ?>public/css/screen.css" type="text/css" media="screen" />
    <link rel="stylesheet" href= "<?= URL; ?>public/css/print-preview.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?= URL; ?>public/css/print.css" type="text/css" media="print" />

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>
    <script src="<?= URL; ?>public/js/jquery.print-preview.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= URL; ?>public/js/zoomsl.js"></script>
    <script src="<?= URL; ?>public/js/script.js"></script>

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
        height: 300px;
        width: 300px;
        margin: 0 auto 10px auto;
    }

    h2 {
        margin: 0 auto 10px auto;
    }

    p {
        margin: 0 auto 10px auto;
    }

    .resume1{
        font-size: 1em;
        font-family: Arial, sans-serif, 'Trebuchet MS', Futura;
        color:#D0E2F4;
        padding-left: 60px;
        background: transparent;    /* #2A3F54; */
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

    <strong>:: Circular ::</strong>
</div>
-->

<div id="content" class="container_12 clearfix">

    <div class="resume1">

        <div>Caja Circular. ODT: <span><?=$odt ?> | </span></div>
        <div>Diámetro: <span><?=$d ?></span> cm | </div>
        <div>Profundidad: <span><?=$p ?></span> cm | </div>
        <div>Grosor de Cartón: <span><?=$g ?></span> | </div>
        <div>Altura Tapa: <span><?=$P ?> | </span></div>
    </div>

    <!-- imagen de impresion -->
    <div id="aside" class="grid_3_1"></div>

    <div><?php echo "<br /><br /><br />"; ?></div>

	<!-- Diámetro del cajón -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items row">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Suaje_Cajon_Caja_Redonda-11.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Diámetro del Cajón</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Diámetro del suaje del cajón</td>
                                    <td class="nomenclatura_2">d</td>
                                    <td class="print-td"><?= round($d,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Diámetro exterior del cajón</td>
                                    <td class="nomenclatura_2">d'</td>
                                    <td class="print-td"><?=round($d_1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Diámetro de la pompa de cajón</td>
                                    <td class="nomenclatura_2">d</td>
                                    <td class="print-td"><?=round($d,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Cartón para empalme de cajón</td>
                                    <td class="nomenclatura_2">z</td>
                                    <td class="print-td"><?php echo round($z,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Papel para empalme de cajón</td>
                                    <td class="nomenclatura_2">z'</td>
                                    <td class="print-td"><?php echo round($z_1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Papel rebasado para pompa de cajón</td>
                                    <td class="nomenclatura_2">r</td>
                                    <td class="print-td"><?php echo round($r,2) ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cartón -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Circunferencia_Exterior_Cajon_Caja_Redonda-12.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Cartón</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad Exterior del cajón</td>
                                    <td class="nomenclatura_2">p'</td>
                                    <td class="print-td"><?php echo round($p_1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Circunferencia Exterior del Cartón del cajón</td>
                                    <td class="nomenclatura_2">c</td>
                                    <td class="print-td"><?php echo round($c, 2); ?> cm</td>
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

        <div>Caja Circular. ODT: <span><?=$odt ?> | </span></div>
        <div>Diámetro: <span><?=$d ?></span> cm | </div>
        <div>Profundidad: <span><?=$p ?></span> cm | </div>
        <div>Grosor de Cartón: <span><?=$g ?></span> | </div>
        <div>Altura Tapa: <span><?=$P ?> | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Forro exterior -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Forro_Exterior_Cajon_Caja_Redonda-13.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro Exterior</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad del forro Exterior del cajón</td>
                                    <td class="nomenclatura_2">p''</td>
                                    <td class="print-td"><?php echo round($p_1_1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Circunferencia del forro exterior del cajón</td>
                                    <td class="nomenclatura_2">c'</td>
                                    <td class="print-td"><?php echo round($c_1, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forro interior -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Forro_Interior_Cajon_Caja_Redonda-14.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro interior</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad del forro Interior del cajón</td>
                                    <td class="nomenclatura_2">i</td>
                                    <td class="print-td"><?php echo round($i, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Circunferencia del forro Interior (Cartulina)</td>
                                    <td class="nomenclatura_2">c''</td>
                                    <td class="print-td"><?php echo round($c_1_1, 2); ?> cm</td>
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

        <div>Caja Circular. ODT: <span><?=$odt ?> | </span></div>
        <div>Diámetro: <span><?=$d ?></span> cm | </div>
        <div>Profundidad: <span><?=$p ?></span> cm | </div>
        <div>Grosor de Cartón: <span><?=$g ?></span> | </div>
        <div>Altura Tapa: <span><?=$P ?> | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Tapa de la caja -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Suaje_Tapa_Caja_Redonda-16.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Tapa de la Caja</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Diámetro Interior de la Tapa</td>
                                    <td class="nomenclatura_2">D</td>
                                    <td class="print-td"><?php echo round($D, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Diámetro Exterior de la Tapa</td>
                                    <td class="nomenclatura_2">D'</td>
                                    <td class="print-td"><?php echo round($D_1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Cartón para Empalme Tapa</td>
                                    <td class="nomenclatura_2">Z</td>
                                    <td class="print-td"><?php echo round($Z, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Papel para Empalme Tapa</td>
                                    <td class="nomenclatura_2">Z'</td>
                                    <td class="print-td"><?php echo round($Z_1, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tapa de la Caja -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Forro_Tapa_Caja_Redonda-17.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Tapa de la Caja</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Forro de la Tapa</td>
                                    <td class="nomenclatura_2">D''</td>
                                    <td class="print-td"><?php echo round($D_1_1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Papel Rebasado para forro de la tapa</td>
                                    <td class="nomenclatura_2">R</td>
                                    <td class="print-td"><?php echo round($R, 2); ?> cm</td>
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

        <div>Caja Circular. ODT: <span><?=$odt ?> | </span></div>
        <div>Diámetro: <span><?=$d ?></span> cm | </div>
        <div>Profundidad: <span><?=$p ?></span> cm | </div>
        <div>Grosor de Cartón: <span><?=$g ?></span> | </div>
        <div>Altura Tapa: <span><?=$P ?> | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Cartón Taja -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Circunferencia_Exterior_Caja_Redonda-18.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Cartón Tapa</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad Exterior de la Tapa</td>
                                    <td class="nomenclatura_2">P</td>
                                    <td class="print-td"><?php echo round($P, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Circunferencia del Cartón de la Tapa</td>
                                    <td class="nomenclatura_2">C</td>
                                    <td class="print-td"><?php echo round($C, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forro Exterior Tapa -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Forro_Exterior_Caja_Redonda-19.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro Exterior Tapa</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad Forro Exterior Tapa</td>
                                    <td class="nomenclatura_2">P'</td>
                                    <td class="print-td"><?php echo round($P_1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Circunferencia Forro Exterior Tapa</td>
                                    <td class="nomenclatura_2">C'</td>
                                    <td class="print-td"><?php echo round($C_1, 2); ?> cm</td>
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

        <div>Caja Circular. ODT: <span><?=$odt ?> | </span></div>
        <div>Diámetro: <span><?=$d ?></span> cm | </div>
        <div>Profundidad: <span><?=$p ?></span> cm | </div>
        <div>Grosor de Cartón: <span><?=$g ?></span> | </div>
        <div>Altura Tapa: <span><?=$P ?> | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Forro Interior Tapa -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/redondo/Forro_Interior_Caja_Redonda-20.jpg" class="block__pic" style="width: 300px; height: 300px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro Interior Tapa</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad del Forro Interior de la Tapa(Cartulina)</td>
                                    <td class="nomenclatura_2">P''</td>
                                    <td class="print-td"><?php echo round($P_1_1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Circunferencia del Forro Interior de la Tapa</td>
                                    <td class="nomenclatura_2">C''</td>
                                    <td class="print-td"><?php echo round($C_1_1, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

