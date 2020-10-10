

        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
      
       


<h1 class="page-header">
    Actualizar Registro
</h1>

<ol class="breadcrumb">
  <li><a href="<?php echo URL?>velada/editar">Editar</a></li>
  <li class="active">Modificar Datos Personal</li>
</ol>
<div class="container" >
  <div class="col-md-8 col-md-offset-4">
   <div class="row">
    <div class="col-md-5">
        <div class="table-responsive">

             <thead>
<form  id="frm-papeles"  action="<?php echo URL?>velada/Updateper" method="post" enctype="">
    <div class="form-group" class="text-center">

   <div class="form-group">
        <label>Area</label>
        <input type="text" id="area" name="area" value="<?php echo $datos['area'] ;?>" class="form-control" required="" />
    </div>




      
      <label>Nombre</label>
      <input type="text" id="nombre" name="nombre" value="<?php echo $datos['nombre'] ;?>" class="form-control"  required=""  />
        
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