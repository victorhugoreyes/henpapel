
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/js/jquery-ui/jquery-ui.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">  

<h1 class="page-header">
    Actualizar Registro
</h1>

<ol class="breadcrumb">

    <li>

        <a href="<?php echo URL?>crud/index">PAPELES</a>
    </li>
    <li class="active">Modificar Papel</li>
</ol>

<div class="container" >

    <div class="col-md-8 col-md-offset-4">

        <div class="row">
    
            <div class="col-md-5">
            
                <div class="table-responsive">

                    <thead>
                        <form  id="frm-papeles" action="<?php echo URL?>crud/Update" method="post" enctype="">
    
                            <div class="form-group" class="text-center">
                                
                                <label>Nombre</label>
                                <input class="form-control" name="nombre" id="nombre"  type="text" style="width: 700px; overflow-x: auto" value="<?php echo $datos['nombre'] ;?>"  required="" />
                            </div>

                            <div class="form-group">
                                
                                <label>Costo</label>
                                <input type="number" step="any" id="costo"  name="costo" value="<?php echo $datos['costo_unitario'] ;?>" class="form-control" required="" />
                            </div>

                            <div class="form-group">
        
                                <label>Ancho</label>
                                <input type="number" step="any" id="ancho" name="ancho" value="<?php echo $datos['ancho'] ;?>" class="form-control" required="" />
                            </div>

                            <div class="form-group">
        
                                <label>Largo</label>
                                <input type="number" step="any" id="lago" name="largo" value="<?php echo $datos['largo'] ;?>" class="form-control"   required="" />
                            </div>

                            <div class="form-group">
                            
                                <label>Gramaje</label>
                                <input type="number"step="any" id="gramaje" name="gramaje" value="<?php echo $datos['gramaje'] ;?>" class="form-control" required="" />
                            </div>

                            <hr />

                            <div class="text-right">
                            
                                <center>
                                    <button class="btn btn-success"  >Actualizar</button>
                                <center/>
                                <input type="hidden" name="id" value="<?=$_GET['id']?>" />
                            </div>
                        </form>
                    </thead>
                </div>
            </div>
        </div>
    </div>
</div>
