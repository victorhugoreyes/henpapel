<?php

/*
function html_spec($string) {

    a = &aacute

é = &eacute

í = &iacute

ó = &oacute

ú = &uacute

ñ = &ntilde

}
*/

?>


<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<div class="table-section">

    <div class="table-controls">

        <input type="text" id="searcher" name="" placeholder="Buscar..">
    </div>

    <div class="table-container">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>

        <h1 class="page-header" >Papeles</h1>

        <div class="well well-sm text-left">
    
            <a class="btn btn-primary" href="<?php echo URL?>crud/envio2">Nuevo Papel</a>
        </div>

<table class="hep-table">
    <thead>
        <tr>
          
            <th style="width:180px;">Nombre</th>
            <th style="width:120px;">Costo unitario</th>
            <th style="width:120px;">ancho</th>
            <th style="width:120px;">largo</th>
            <th style="width:120px;">gramaje</th>
            <th style="width:180px;">acciones</th>
        </tr>
    </thead>
    <tbody id="inv-body">
 
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">
          <link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">
  
        <?php 
        foreach ($rows as $row) { ?>

            <tr>
                <form action="<?php echo URL?>crud/eliminar" method="POST">
    
                    <?php
                        $nombre = $row['nombre'];
                        $nombre = strval($nombre);
                        $nombre = trim($nombre);
                        $nombre = utf8_decode($nombre);

                    ?>

                    <td><?php echo $nombre;?> </td> 
                    <td><?php echo $row['costo_unitario'];?> </td>                    
                    <td >    <?php echo $row['ancho'];?> </td>
                    <td >    <?php echo $row['largo'];?> </td>
                    <td >    <?php echo $row['gramaje'];?> </td>
                    <td >

                        <a value="btenenvio" href="<?php echo URL?>crud/envio?id=<?php echo $row['id_papel'];?>" class="btn btn-warning btn-sm" >Modificar</a>
               
                        <button  onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" value="btnEliminar " style="background:red" class="btn btn-danger btn-sm" type="submit" >Eliminar</button>
        
                        <input  type="hidden" name="id_papel" value="<?=$row['id_papel']?>">
                    </td >                   
                </form>
            </tr>
        <?php 
        }
        ?>
    </tbody>
</table>
