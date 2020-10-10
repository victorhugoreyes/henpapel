
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/js/jquery-ui/jquery-ui.min.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
<link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">
<link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">

<h1 class="page-header">Nuevo Registro</h1>

<ol class="breadcrumb">

    <li> <a href="<?php echo URL?>crud/index">PAPELES</a></li>
    <li class="active">Nuevo Papel</li>
</ol>

<div class="container">

    <div class="col-md-8 col-md-offset-4">

        <div class="row">
        
            <div class="col-md-5">
            
                <div class="table-responsive">

                    <thead>
                        <form id="frm-papeles"  action="<?php echo URL?>crud/Guardar" method="post" enctype="">

                            <div class="form-group" class="text-center">

                                <label>Nombre</label>
                                <input type="text"  name="nombre"  class="form-control" placeholder="Ingrese nombre" required="" />
                            </div>

                            <div class="form-group">

                                <label>Costo</label>
                                <input type="number"  step="any" name="costo" value="" class="form-control" placeholder="Ingrese costo unitario" required="" />
                            </div>

                            <div class="form-group">

                                <label>Ancho</label>
                                <input type="number" step="any" name="ancho" value="" class="form-control" placeholder="Ingrese ancho" required="" />
                            </div>

                            <div class="form-group">
                                <label>Largo</label>
                                <input type="text" step="any" name="largo" value="" class="form-control" placeholder="Ingrese largo"  required=""/>
                            </div>

                            <div class="form-group">

                                <label>Gramaje</label>
                                <input type="text"step="any" name="gramaje" value="" class="form-control" placeholder="Ingrese gramaje" required="" />
                            </div>

                            <hr />

                            <div class="text-right">

                                <center>
                                    <button class="btn btn-success">Guardar</button>
                                <center/>
                            </div>
                        </form>
                    </thead>
                </div>
            </div>
        </div>
    </div>
</div>
