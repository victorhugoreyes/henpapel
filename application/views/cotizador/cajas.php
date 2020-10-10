
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="<?= URL; ?>public/css/cotizador.css">

<!-- seleccion de modelo -->
<div class="selectormodelo">

    <div class="div-izquierdo">

        <select  id="box-model" class="seleccionModelo" style="background: #1A2C4C;color:#fff;font-size: 16px; width: -webkit-fill-available; border: none; height: 35px">

            <option selected disabled>Seleccione Modelo de Caja</option>
                <?php
                foreach ($modeloscaj as $modelca) {   ?>
                <option style="font-size: 1em" value="<?=$modelca['id_modelo']?>"><?=$modelca['nombre']?></option>
                <?php
                  } ?>
        </select>
    </div>


    <div class="div-derecho" style="background: cornflowerblue; border: none; height: 35px; text-align: center; color: white;">
        Cliente: <?= $nombrecliente; ?> <!--  $aJson['Nombre_cliente']  cual de los dos? -->

        <!--<select class="">
            <option selected disabled>Seleccione Cliente</option>
        </select>
        
        <button type="button" class="btn btn-outline-light" href="<?=URL ?>cotizador/nuevo_cliente">Nuevo Cliente</button> -->
    </div>
</div>

<!-- form Default modelo (0) -->
<div id="form_modelo_0" style="width: 100%; text-align: center; display: background-size: 100%;">

    <div class="wrap cont-grid">

        <div class="div-izquierdo" style="height: 80%;">

            <!-- muestra imagenes -->
            <div style="width: 100%; text-align: center; display: inline-block; background-image: url(<?=URL ;?>public/img/worn_dots.png); background-repeat: repeat; height: 200px;">
            </div>
            <!-- formulario de la caja almeja -->
            <div class="form-content medidas" style="height: 450px;">
            </div>
        </div>

        <div class="div-derecho" style="height: 530px;">
            <img border="0" src="<?=URL ;?>public/img/henpp.png" style="width: 30%; margin: 12%">
            <!--<iframe width="100%" height="100%" src="https://www.youtube.com/embed/iBTkzbMweRE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
        </div>
    </div>
</div>


<!-- muestra el menu de modelos de cajas -->
<script>

    //para entregar
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
        
    /*
        $('#form_modelo_0').hide();
        $('#form_modelo_1').hide();
        $('#form_modelo_1_derecho').hide();
        $('#form_modelo_2').hide();
        $('#form_modelo_2_derecho').hide();
        $('#form_modelo_3').hide();
        $('#form_modelo_3_derecho').hide();
        $('#form_modelo_4').hide();
        $('#form_modelo_5').hide();
        $('#form_modelo_6').hide();
        $('#form_modelo_7').hide();

        if (model > 0 && model < 8) {
            $('#form_modelo_'+model).show();
            $('#form_modelo_'+model+'_derecho').show('normal');
        }

        if (model > 7) {
            $('#form_modelo_0').show();
        }
    */
    };

</script>
