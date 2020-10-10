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
        Cliente: <?=$nombrecliente ?>
        <!--<select class="">
            <option selected disabled>Seleccione Cliente</option>
        </select>
        <button type="button" class="btn btn-outline-light" href="<?=URL ?>cotizador/nuevo_cliente">Nuevo Cliente</button> -->
    </div>
</div>