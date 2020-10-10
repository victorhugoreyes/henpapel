
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?= URL; ?>public/css/cotizador.css">

<div class="div-principal" style="width: 100%; height: 93%; position: absolute; overflow-y: hidden;">

    <form id="dataForm" method="post" action="" style="width: 100%; height: 100%; position: absolute; overflow-y: hidden;">
        
        <div id="topCotizador" style="width: 100%; height: 25px;">
            <select  id="box-model" class="seleccionModelo" style="background: #1A2C4C;color:#fff;font-size: 16px; width: 20%; border: none; height: 100%;">

                <option selected disabled>Seleccione Modelo de Caja</option>
                    <?php
                    foreach ($modeloscaj as $modelca) {   ?>
                    <option style="font-size: 1em" value="<?=$modelca['id_modelo']?>"><?=$modelca['nombre']?></option>
                    <?php
                      } ?>
            </select>
            <div style="background: cornflowerblue; border: none; text-align: center; color: white; width: 80%;height: 100%; float: right;">

                Cliente: <?= $nombrecliente; ?>
            </div>
        </div>
        

        <div id="divIzquierdo" class="div-izquierdo" style="width: 20%; height: 97%; display: block; overflow: auto; position: absolute;">

            <div style="width: 100%; text-align: center; background-image: url(<?=URL ;?>public/img/worn_dots.png); background-repeat: repeat; height: 25%;">
            </div>
            <!-- formulario de la caja almeja -->
            <div class="form-content medidas" style="height: 74%;">
            </div>
        </div>

        

        <div id="divDerecho" class="grid div-derecho" style=" width: 80%; height: 96%; position: relative;">

            <img id="imgPrincipal" border="0" src="<?=URL ;?>public/img/henpp.png" style="">
        </div>
    </form>
</div>

<script>

    function divSecciones(titulo, idOpt, seccion, imagen){
        
        var option = "";
        <?php foreach ($papers as $paper) {?>
            
            option += '<option value="<?=$paper['id_papel']?>" data-nombre="<?=$paper['nombre'] ?>"><?=$paper['nombre'] ?></option>';
        <?php }?>
        
        var divSeccion = '<div class="divgral"><div class="secciones divContenido"><img src="' + imagen + '"  style="width: 40%;"><br><label class="lblTituloSec">' + titulo + '</label></div><br><div><select class="chosen forros" name="' + idOpt +'" id="' + idOpt + '" tabindex="9" required><option selected disabled>Elegir tipo de papel</option>' + option + '</select></div><br><div><button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#Impresiones" onclick="divisionesImp(\'' + seccion + '\')">Añadir Impresiones <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button><div class="container divimpresiones"><table class="table"><tbody id="listImp' + seccion + '"></tbody></table></div></div><div><button type="button" class="btn btn-outline-primary chkSize btn-sm" data-toggle="modal" data-target="#acabados" onclick="divisionesAcb(\'' + seccion + '\')">Añadir Acabados <img border="0" src="<?=URL ;?>public/img/add.png" style="width: 7%;"></button><div class="container divacabados"><table class="table"><tbody id=listAcb' + seccion + '></tbody></table></div></div></div>';

        $("#divDerecho").append(divSeccion);
        jQuery214(".chosen").chosen();
    }

    document.getElementById('box-model').onchange = function(event){

        var model = parseInt(document.getElementById('box-model').value);
        var link  = "" + window.location;
        var datos = link.split("/");
        
        switch(model){

            case 1:
                
                location.href = "<?=URL?>cotizador/caja_almeja/" + datos[6];

            break;
            case 2:

                location.href = "<?=URL?>circular/caja_circular/" + datos[6];

            break;
            case 3:

                location.href = "<?=URL?>cotizador/caja_libro/" + datos[6];

            break;
            case 4:

                location.href = "<?=URL?>regalo/" + datos[6];

            break;
            case 5:

                location.href = "<?=URL?>cotizador/caja_marco/" + datos[6];

            break;
            case 6:

                location.href = "<?=URL?>cotizador/caja_cerillera/" + datos[6];

            break;
            case 7:

                location.href = "<?=URL?>cotizador/caja_vino/" + datos[6];

            break;
            default:

                alert("El modelo de caja no existe");
            break;
        }
    };
</script>
