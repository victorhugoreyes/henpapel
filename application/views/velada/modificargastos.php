  <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
      
<h1 class="page-header">
    Actualizar Registro
</h1>

<ol class="breadcrumb">
  <li><a href="<?php echo URL?>velada/editar">Editar</a></li>
  <li class="active">Modificar Gastos</li>
</ol>
<div class="container" >

    <div class="col-md-8 col-md-offset-4">

        <div class="row">

            <div class="col-md-5">

                <div class="table-responsive">

                    <thead>

                        <form  id="frm-papeles" action="<?php echo URL?>crud/Update" method="post" enctype="">
                            
                            <div class="form-group" class="text-center">
                            
                                <label>Tipo de Gasto</label>
                                <input type="text" id="Gasto" name="tipo_gasto" value="<?php echo $datos['tipo_gasto'] ;?>" class="form-control"  required=""  />
                            </div>

                            <div class="form-group">

                                <label>Costo</label>
                                <input type="text" id="costo" name="costo" value="<?php echo $datos['costo'] ;?>" class="form-control" required="" />
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
