
<?php

/*
echo "<br />5. archivo: /views/cajasedit/editlibro.php";
echo "<br />6. url: " . URL . 'cajasedit/editlibro' . "<br />";
*/

$id_calculo = $_GET['id_calculo'];
$id_calculo = intval($id_calculo);
$id         = intval($id_calculo);

$rows_almeja = $optionsmodel->getCalcDetails($id_calculo);
       
//echo "<br />15. id_calculo: " . $id_calculo . "<br />";

$fecha_hoy     = TODAY;
$hora_act      = date("H:i:s", time());

/*
foreach ($rows_almeja as $key => $value) {

    print 'rows_almeja[' . $key . '] = ' . $value . "<br />";
}
*/

$odt            = $rows_almeja['odt'];
$fecha          = $rows_almeja['fecha_calculo'];
$hora           = $rows_almeja['hora_calculo'];
$base           = $rows_almeja['base'];
$alto           = $rows_almeja['alto'];
$profundidad    = $rows_almeja['profundidad'];
$grosor_carton  = $rows_almeja['grosor-carton'];
$grosor_cartera = $rows_almeja['grosor-cartera'];

/*
print "<br />";

print "<br />37. fecha_hoy: " . $fecha_hoy;
print "<br />hora_act: " . $hora_act;
print "<br />id_calculo: " . $id_calculo;
print "<br />odt: " . $odt;
print "<br />fecha: " . $fecha;
print "<br />hora: " . $hora;
print "<br />base: " . $base;
print "<br />alto: " . $alto;
print "<br />profundidad: " . $profundidad;
print "<br />grosor_carton: " . $grosor_carton;
print "<br />grosor_cartera " . $grosor_cartera;

print "<br /><br />";
print "51. id: " . $id;

exit();
*/

?>

<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />

<link rel="stylesheet" href="<?= URL; ?>public/css/cajasedit.css" type="text/css" />

<div class="container">

    <div class="row">

        <div class="col-md-6"></div>

        <div class="col-md-6">

            <span class="tit_cajasedit">Libro</span>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            
            <div class="viewer-section table-responsive" style="">
            
                <img src="<?= URL; ?>public/images/libro/libro.jpeg" />
            </div>
        </div>

        <div class="col-md-6">

            <div class="table-responsive">

                <form name="form2" id="form2" method="POST" action="<?php echo URL; ?>cajas/updateCajas">

                    <input type="hidden" name="modelo" value="3">
                    <input type="hidden" name="id" value="<?=$id;?>">

                    <table>
                        <tr>
                            <td>ODT:</td>
                            <td>
                            
                                <input class="form_cajas" type="text" name="odt" value="<?php echo $odt; ?>" readonly="readonly">
                            </td>
                        </tr>

                        <tr>
                            <td>Base:</td>
                            <td>

                                <input class="form_cajas" type="number" step="any" placeholder="cm" name="base" value="<?php echo $base; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Alto:</td>
                            <td>
                            
                                <input class="form_cajas" type="number" step="any" placeholder="cm" name="alto" value="<?php echo $alto; ?>" required>
                            </td>
                        </tr>

                        <tr>
                            <td>Profundidad:</td>
                            <td>
                            
                                <input class="form_cajas" type="number" step="any" placeholder="cm" name="profundidad" value="<?php echo $profundidad; ?>"  required>
                            </td>
                        </tr>

                        <tr>
                            <td>Grosor de carton del cajon:</td>
                            <td>
                            
                                <select class="cajas-input" name="grosor-carton" value="<?php echo $grosor_carton; ?>" required>
                                    
                                    <option selected><?php echo $grosor_carton; ?></option>
                                    <option value="1">1</option>
                                    <option value="1.25">1.25</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2">2</option>
                                    <option value="2.25">2.25</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3">3</option>
                                    <option value="3.25">3.25</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4">4</option>
                                    <option value="4.25">4.25</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5">5</option>
                                    <option value="5.25">5.25</option>
                                    <option value="5.5">5.5</option>
                                    <option value="6">6</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Grosor de carton de cartera:</td>
                            <td>
                            
                                <select class="cajas-input" name="grosor-cartera" value="<?php echo $grosor_cartera; ?>" required>
                                
                                    <option selected><?php echo $grosor_cartera; ?></option>
                                    <option value="1">1</option>
                                    <option value="1.25">1.25</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2">2</option>
                                    <option value="2.25">2.25</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3">3</option>
                                    <option value="3.25">3.25</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4">4</option>
                                    <option value="4.25">4.25</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5">5</option>
                                    <option value="5.25">5.25</option>
                                    <option value="5.5">5.5</option>
                                    <option value="6">6</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>

                            </td>
                            <td>

                                <input class="cajas-form-submitter" type="submit" value="Actualizar" style="margin: 6px; padding:4px 45px;">

                                <input type="hidden" name="id_calculo" value="<?=$id_calculo; ?>">
                            </td>
                        </tr>
                    </table>
                </form>
                <script type="text/javascript" language="JavaScript">
                    document.forms['form2'].elements['base'].focus();
                </script>
            </div>
        </div>
    </div>
</div>


<?php exit(); ?>
