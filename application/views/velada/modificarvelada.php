 <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
       

<h1 class="page-header">
    Actualizar Registro
</h1>

<ol class="breadcrumb">
  <li><a href="<?php echo URL?>velada/editar">Editar</a></li>
  <li class="active">Modificar Ordenes</li>
</ol>
<div class="container" >
  <div class="col-md-8 col-md-offset-4">
   <div class="row">
    <div class="col-md-5">
        <div class="table-responsive">

             <thead>
<form id="frm-papeles" action="<?php echo URL?>velada/Updatevel" method="post" enctype="">
    <div class="form-group" class="text-center">
      <label>Fecha</label>
      <input type="text" id="fecha" name="fecha" value="<?php echo $datos['fecha'] ;?>" class="form-control"  required=""  />
        
    </div>

    <div class="form-group">
        <label>Responsable</label>
        <input type="text" id="responsable_velada" name="responsable_velada" value="<?php echo $datos['responsable_velada'] ;?>" class="form-control" required="" />
    </div>
  <div class="form-group">
        <label>Autorizo</label>
        <input type="text" id="autorizo" name="autorizo" value="<?php echo $datos['autorizo'] ;?>" class="form-control" required="" />
    </div>

    <hr />

    <div class="text-right">
         <center><button class="boton_4"  >Actualizar</button> <center/>
        <input type="hidden" name="id" value="<?=$_GET['id']?>">
    </div>
</form>
   </thead>
  </div>
   </div>
   </div>
    </div>
     </div>