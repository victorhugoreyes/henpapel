 

<h1 class="page-header">Modificar Gastos Especiales</h1>

<div class="container">
  <div class="col-md-8 col-md-offset-4">
   <div class="row">
    <div class="col-md-5">
        <div class="table-responsive">

<body>
<button>
<a style="background:#04EDF0" href="<?php echo URL?>gastosespeciales/index">Regresar</a>
</button>
</body>

   <thead>
<form  id="gastoss"  action="<?php echo URL?>gastosespeciales/modificar" method="post" enctype="">


    <div class="form-group" class="text-center">
      <label>Nombre</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ;?>"class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Cantidad que entra al proceso</label>
      <input type="text" id="cantidad_entrada_proceso" name="cantidad_entrada_proceso" value="<?php echo $datos['cantidad_entrada_proceso'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Cantidad que sale del proceso correcta</label>
      <input type="text" id="cantidad_salida_proceso_correcta" name="cantidad_salida_proceso_correcta" value="<?php echo $datos['cantidad_salida_proceso_correcta'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Cantidad que sale del proceso merma</label>
      <input type="text" id="cantidad_proceso_merma" name="cantidad_proceso_merma" value="<?php echo $datos['cantidad_proceso_merma'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Total</label>
      <input type="text" id="total" name="total" value="<?php echo $datos['total'] ;?>" class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Proveedor</label>
      <input type="text" id="proveedor" name="proveedor" value="<?php echo $datos['proveedor'] ;?>"class="form-control"  required=""/>
    </div>

    <div class="form-group" class="text-center">
      <label>Firma</label>
      <input type="text" id="firma" name="firma" value="<?php echo $datos['firma'] ;?>" class="form-control"  required=""/>
    </div>


    <hr/>

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