 

<h1 class="page-header">Modificar Registros Maquila</h1>

<div class="container" >
  <div class="col-md-8 col-md-offset-4">
   <div class="row">
    <div class="col-md-5">
        <div class="table-responsive">

 
<button>
  <a style="background:#04EDF0" href="<?php echo URL?>remaquila/maquila">Regresar</a>
</button>

   <thead>
<form  id="maquilaa"  action="<?php echo URL?>remaquila/modificar" method="post" enctype="">
    <div class="form-group" class="text-center">
      <label>Fecha</label>
      <input type="text" id="fecha" name="fecha" value="<?php echo $datos['fecha'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Nombre del responsable que entrega material</label>
      <input type="text" id="persona_responsable_entrega" name="persona_responsable_entrega"value="<?php echo $datos['persona_responsable_entrega'] ;?>" class="form-control"required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Orden de trabajo</label>
      <input type="text" id="orden_trabajo" name="orden_trabajo" value="<?php echo $datos['orden_trabajo'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Nombre y parte de la pieza del trabajo</label>
      <input type="text" id="nombreypieza_trabajo" name="nombreypieza_trabajo" value="<?php echo $datos['nombreypieza_trabajo'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Cantidad de pliegos</label>
      <input type="text" id="pliegos_cantidad" name="pliegos_cantidad" value="<?php echo $datos['pliegos_cantidad'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Pliegos cortado en base</label>
      <input type="text" id="pliegos_cortado_base" name="pliegos_cortado_base" value="<?php echo $datos['pliegos_cortado_base'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Pliegos cortado en altura</label>
      <input type="text" id="pliegos_cortado_altura" name="pliegos_cortado_altura" value="<?php echo $datos['pliegos_cortado_altura'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Cantidad de tamaño total para impresion</label>
      <input type="text" id="tamtotal_impresion_cantidad" name="tamtotal_impresion_cantidad" value="<?php echo $datos['tamtotal_impresion_cantidad'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Tamaño total para impresion cortado en base</label>
      <input type="text" id="tamtotal_impresion_cortado_base" name="tamtotal_impresion_cortado_base" value="<?php echo $datos['tamtotal_impresion_cortado_base'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Tamaño total para impresion cortado en altura</label>
      <input type="text" id="tamtotal_impresion_cortado_altura" name="tamtotal_impresion_cortado_altura" value="<?php echo $datos['tamtotal_impresion_cortado_altura'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Tamaño individual total</label>
      <input type="text" id="tamindividual_total" name="tamindividual_total" value="<?php echo $datos['tamindividual_total'] ;?>" class="form-control"  required=""/>
    </div>


    <hr />

    <div class="text-right">
         <center><button class="btn btn-success">Aceptar</button> <center/>
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
    </div>
</form>
   </thead>
  </div>
   </div>
   </div>
    </div>
     </div>