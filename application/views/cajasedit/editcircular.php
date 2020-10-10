
<?php

/*
echo "<br />5. archivo: /views/cajasedit/editcircular.php";
echo "<br />6. url: " . URL . 'cajasedit/editcircular' . "<br />";
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
$diametro       = $rows_almeja['diametro'];
$profundidad    = $rows_almeja['profundidad'];
$altura_tapa    = $rows_almeja['altura-tapa'];
$grosor_carton  = $rows_almeja['grosor-carton'];

/*
print "<br />";

print "<br />37. fecha_hoy: " . $fecha_hoy;
print "<br />hora_act: " . $hora_act;
print "<br />id_calculo: " . $id_calculo;
print "<br />odt: " . $odt;
print "<br />fecha: " . $fecha;
print "<br />hora: " . $hora;
print "<br />diametro: " . $diametro;
print "<br />profundidad: " . $profundidad;
print "<br />altura_tapa: " . $altura_tapa;
print "<br />grosor_carton: " . $grosor_carton;

print "<br /><br />";
print "48. id: " . $id;

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

            <span class="tit_cajasedit">Circular</span>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            
            <div class="viewer-section table-responsive" style="">
            
                <img src="<?= URL; ?>public/images/circular/circular.png" />
            </div>
        </div>

        <div class="col-md-6">

            <div class="table-responsive">

               <form name="form2" id="form2" class="model-form" method="POST" data-model="circular" action="<?php echo URL; ?>cajas/updateCajas">

                    <input type="hidden" name="modelo" value="2">
                    <input type="hidden" name="id" value="<?=$id;?>">

                    <table>

                        <tr>
                            <td>ODT:</td>
                            <td>
                            
                                <input class="form_cajas" type="text" name="odt" value="<?php echo $odt; ?>" readonly="readonly">
                            </td>
                        </tr>

                        <tr>
                            <td>Diametro:</td>
                            <td>

                                <input class="form_cajas" type="number" step="any" placeholder="cm" name="diametro" value="<?php echo $diametro; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Profundidad:</td>
                            <td>
                            
                                <input class="form_cajas" type="number" step="any" placeholder="cm" name="profundidad" value="<?php echo $profundidad; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Altura tapa:</td>
                            <td>
                            
                                <input class="form_cajas" type="number" step="any" placeholder="cm" name="altura-tapa" value="<?php echo $altura_tapa; ?>">
                            </td>
                        </tr>

                        <tr>
                            <td>Grosor Carton:</td>
                            <td>
                            
                                <select class="cajas-input" name="grosor-carton" value="<?php echo $grosor_carton; ?>">
                                    
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
                    document.forms['form2'].elements['diametro'].focus();
                </script>
            </div>
        </div>
    </div>
</div>


<?php exit(); ?>
