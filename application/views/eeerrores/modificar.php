

<h1 class="page-header">Modificar Reporte de Errores</h1>

<div class="container" >
  <div class="col-md-8 col-md-offset-4">
   <div class="row">
    <div class="col-md-5">
        <div class="table-responsive">

 
<button>
  <a style="background:#04EDF0" href="<?php echo URL?>eeerrores/index">Regresar</a>
</button>

   <thead>
<form  id="reportess"  action="<?php echo URL?>eeerrores/modificar" method="post" enctype="">
    <div class="form-group" class="text-center">
      <label>Fecha</label>
      <input type="text" id="fechax" name="fechax" value="<?php echo $datos['fechax'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Nombre de la persona que reporta</label>
      <input type="text" id="nombre_persona_reportax" name="nombre_persona_reportax"value="<?php echo $datos['nombre_persona_reportax'] ;?>" class="form-control"required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Nombre del fallo</label>
      <input type="text" id="nombre_fallox" name="nombre_fallox" value="<?php echo $datos['nombre_fallox'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Especificaciones</label>
      <input type="text" id="especificacionesx" name="especificacionesx" value="<?php echo $datos['especificacionesx'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Tiempo en que duro el fallo</label>
      <input type="text" id="tiempo_duracion_fallox" name="tiempo_duracion_fallox" value="<?php echo $datos['tiempo_duracion_fallox'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Tiempo especificado</label>
      <input type="text" id="tiempo_especificadox" name="tiempo_especificadox" value="<?php echo $datos['tiempo_especificadox'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Observaciones</label>
      <input type="text" id="observacionesx" name="observacionesx" value="<?php echo $datos['observacionesx'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Terminado</label>
      <input type="text" id="terminadox" name="terminadox" value="<?php echo $datos['terminadox'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Solucion</label>
      <input type="text" id="solucionx" name="solucionx" value="<?php echo $datos['solucionx'] ;?>" class="form-control"  required=""/>
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