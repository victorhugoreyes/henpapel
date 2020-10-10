<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>


<style type="text/css">
  th{
    background-color: #E6E6E6;
  }
</style>

<div style="padding-left:16px">

</div>

<div class="table-section">

  <div class="table-controls">

    <p style="float: left;font-size: 20px;margin: 4px 8px;">
      Archivos
    </p>

    <a class="btn btn-primary" href="<?=URL ?>/empresarial/archivos">
    + Agregar Nuevo</a>
    <input type="text" id="searcher" name="" placeholder="Buscar...">
  </div>

  <div class="table-container">
    <form name="myform" method="POST" action="">
      <table class="hep-table">
        <thead>
          <tr>
            <th>FECHA</th>
            <th>ODT</th>
            <th>CATEGORIA</th>
            <th>ARCHIVO</th>
            <th colspan="2">ACCIONES</th>
          </tr>
        </thead>
        <tbody id="inv-body">

          <?php

          foreach ($rows as $row) {

            ?>
            <tr>

              <td > <?php echo $row['fecha'];?></td>
              <td > <?php echo $row['odt'];?></td>
              <td > <?php echo $row['categoria'];?></td>
              <td > <?php echo $row['archivo'];?></td>
              <td > <a style="width: 80%" class="btn btn-success btn-sm" href="<?=URL.'public/uploads/empresariales/'.str_replace(" ","%20",$row['archivo']);?>" target="blank">Visualizar</a></td>
              <td > <a href="javascript:void(0)" style="width: 80%" class="btn btn-danger btn-sm c-delete" data-id="<?=$row['idarchivo'] ?>" data-direc="<?=$row['archivo'] ?>">Eliminar</a></td>
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>
    </form>
  </div>
</div>

<script>

    // buscador en JavaScript
    $(document).ready(function() {

      $("#searcher").on("keyup", function() {

        var value = $(this).val().toLowerCase();
        
        $("#inv-body tr").filter(function() {

          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $('[data-toggle="tooltip"]').tooltip()
    });


    jQuery214(document).on("click", ".c-delete", function () {

        if (confirm("¿Seguro que deseas eliminar este archivo?")) {

            $.ajax({  
            
                type:"POST",
                url:"<?php echo URL; ?>empresarial/deleteArch/",   
                
                data:{id: jQuery214(this).data('id'), direc: jQuery214(this).data('direc')}, 
                
                success:function(data) {

                    console.log(data);
                    location.reload();
                }
            });
        }
    });

  </script>