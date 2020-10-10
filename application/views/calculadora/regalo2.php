
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
    <strong>:: Almeja ::</strong>
</div>
-->

<div id="content" class="container_12">

    <div class="resume1">
        <div>Caja Regalo. ODT: <span><?=$odt ?> | </span></div>
        <div>Base: <span><?=$b ?></span> cm | </div>
        <div>Alto: <span><?=$h ?></span> cm | </div>
        <div>Profundidad Cajón: <span><?=$p ?></span> cm | </div>
        <div>Profundidad Tapa Exterior: <span><?=$T ?></span> cm | </div>
        <div>Grosor Cartón Cajón: <span><?=$g ?> cm | </span></div>
        <div>Grosor Cartón Tapa: <span><?=$G ?> cm | </span></div>
    </div>

    <!-- imagen de impresion -->
    <div id="aside" class="grid_3_1"></div>

    <div><?php echo "<br /><br />"; ?></div>

	<!-- Cajón -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/almeja/01_carton_cajon_Tipo Almeja16.ai.jpg" class="block__pic" style="width: 350px; height: 350px" />
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
                                    <td class="print-td">Base del cajón</td>
                                    <td class="nomenclatura_2">b'</td>
                                    <td class="print-td"><?= round($b1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura del cajón</td>
                                    <td class="nomenclatura_2">h'</td>
                                    <td class="print-td"><?=round($h1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad cajón</td>
                                    <td class="nomenclatura_2">p'</td>
                                    <td class="print-td"><?=round($p1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base extendida del cajón</td>
                                    <td class="nomenclatura_2">x</td>
                                    <td class="print-td"><?php echo round($x,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura extendida del cajón</td>
                                    <td class="nomenclatura_2">y</td>
                                    <td class="print-td"><?php echo round($y,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base de catón empalme</td>
                                    <td class="nomenclatura_2">x'</td>
                                    <td class="print-td"><?php echo round($x1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto del cartón para empalme</td>
                                    <td class="nomenclatura_2">y'</td>
                                    <td class="print-td"><?php echo round($y1,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base empalme papel</td>
                                    <td class="nomenclatura_2">x''</td>
                                    <td class="print-td"><?php echo round($x11,2) ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto empalme papel</td>
                                    <td class="nomenclatura_2">y''</td>
                                    <td class="print-td"><?php echo round($y11,2) ?> cm</td>
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

                    <img src="<?= URL; ?>public/images/almeja/02_forro_cajon_Tipo Almeja17.jpg" class="block__pic" style="width: 350px; height: 350px" />
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
                                    <td class="print-td">Base Forro Cajon</td>
                                    <td class="nomenclatura_2">b''</td>
                                    <td class="print-td"><?php echo round($b11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto Forro Cajon</td>
                                    <td class="nomenclatura_2">h''</td>
                                    <td class="print-td"><?php echo round($h11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base material rebasado para suaje forro</td>
                                    <td class="nomenclatura_2">f</td>
                                    <td class="print-td"><?php echo round($f, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura material rebasado para suaje Forro</td>
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
        <div>Caja Regalo. ODT: <span><?=$odt ?> | </span></div>
        <div>Base: <span><?=$b ?></span> cm | </div>
        <div>Alto: <span><?=$h ?></span> cm | </div>
        <div>Profundidad Cajón: <span><?=$p ?></span> cm | </div>
        <div>Profundidad Tapa Exterior: <span><?=$T ?></span> cm | </div>
        <div>Grosor Cartón Cajón: <span><?=$g ?> cm | </span></div>
        <div>Grosor Cartón Tapa: <span><?=$G ?> cm | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Forro Cartera -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/regalo/default.jpg" class="block__pic" style="width: 350px; height: 350px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro Exterior Cajón</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base forro del cajon</td>
                                    <td class="nomenclatura_2">b''</td>
                                    <td class="print-td"><?php echo round($b11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Alto forro del cajon</td>
                                    <td class="nomenclatura_2">h''</td>
                                    <td class="print-td"><?php echo round($h11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base del material rebasado para suajar forro</td>
                                    <td class="nomenclatura_2">f</td>
                                    <td class="print-td"><?php echo round($f, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura del material rebasado para suajar forro</td>
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

    <!-- Forro cartera -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/regalo/default.jpg" class="block__pic" style="width: 350px; height: 350px" />
                </div>

                <div class="grid_6">

                    <div class="print">
                        <div>
                            <table class="print-tabla">
                                <tr>
                                    <td colspan="2" class="print-titulo">
                                        <h2 style="text-align: center;">Forro Cartera</h2>
                                    </td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base de Forro</td>
                                    <td class="nomenclatura_2">B'</td>
                                    <td class="print-td"><?php echo round($B1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura total de forro cartera</td>
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

    <div class="pagebreak"></div>

    <div class="resume1">
        <div>Caja Regalo. ODT: <span><?=$odt ?> | </span></div>
        <div>Base: <span><?=$b ?></span> cm | </div>
        <div>Alto: <span><?=$h ?></span> cm | </div>
        <div>Profundidad Cajón: <span><?=$p ?></span> cm | </div>
        <div>Profundidad Tapa Exterior: <span><?=$T ?></span> cm | </div>
        <div>Grosor Cartón Cajón: <span><?=$g ?> cm | </span></div>
        <div>Grosor Cartón Tapa: <span><?=$G ?> cm | </span></div>
    </div>

    <div><?php echo "<br /><br /><br />"; ?></div>

    <!-- Tapa -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/regalo/default.jpg" class="block__pic" style="width: 350px; height: 350px" />
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
                                    <td class="print-td">Medida base de la tapa</td>
                                    <td class="nomenclatura_2">B</td>
                                    <td class="print-td"><?php echo round($B, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Medida altura de la tapa</td>
                                    <td class="nomenclatura_2">H</td>
                                    <td class="print-td"><?php echo round($H, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base de la tapa</td>
                                    <td class="nomenclatura_2">B'</td>
                                    <td class="print-td"><?php echo round($B1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura de la tapa</td>
                                    <td class="nomenclatura_2">H'</td>
                                    <td class="print-td"><?php echo round($H1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Profundidad exterior de la tapa</td>
                                    <td class="nomenclatura_2">T</td>
                                    <td class="print-td"><?php echo round($T, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base extendida de la tapa</td>
                                    <td class="nomenclatura_2">X</td>
                                    <td class="print-td"><?php echo round($X, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura extendida de la tapa</td>
                                    <td class="nomenclatura_2">Y</td>
                                    <td class="print-td"><?php echo round($Y, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base de Cartón para Empalme</td>
                                    <td class="nomenclatura_2">X'</td>
                                    <td class="print-td"><?php echo round($X1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura de Cartón para Empalme</td>
                                    <td class="nomenclatura_2">Y'</td>
                                    <td class="print-td"><?php echo round($Y1, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base Empalme Papel</td>
                                    <td class="nomenclatura_2">X''</td>
                                    <td class="print-td"><?php echo round($X11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura Empalme Papel</td>
                                    <td class="nomenclatura_2">Y''</td>
                                    <td class="print-td"><?php echo round($Y11, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Foro Tapa -->
    <div id="content-main" class="grid_12 clearfix">

        <div class="gallery">

            <div class="items">

                <div class="grid_6">

                    <img src="<?= URL; ?>public/images/regalo/default.jpg" class="block__pic" style="width: 350px; height: 350px" />
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
                                    <td class="print-td">Base forro del cajon</td>
                                    <td class="nomenclatura_2">B''</td>
                                    <td class="print-td"><?php echo round($B11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura forro del cajon</td>
                                    <td class="nomenclatura_2">H''</td>
                                    <td class="print-td"><?php echo round($H11, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Base del material rebasado para suajar forro</td>
                                    <td class="nomenclatura_2">F</td>
                                    <td class="print-td"><?php echo round($F, 2); ?> cm</td>
                                </tr>
                                <tr class="print-reng">
                                    <td class="print-td">Altura del material rebasado para suajar forro</td>
                                    <td class="nomenclatura_2">K'</td>
                                    <td class="print-td"><?php echo round($K, 2); ?> cm</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

