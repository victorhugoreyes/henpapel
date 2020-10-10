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
     Facturas
   </p>
   
   
   <input type="text" id="searcher" name="" placeholder="Buscar...">
   <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> + Nueva Factura</button>
 </div>

 <div class="table-container">
  <table class="hep-table">
    <thead>
      <tr>
        <th>REALIZACIÓN</th>
        <th>NO. FACTURA</th>
        <th>MONTO FACTURA</th>
        <th>POR VALIDAR</th>
        <th colspan="2">ACCIONES</th>
      </tr>
    </thead>
    <tbody id="inv-body">

      <?php 
      $rows=$ventas_model->getFiles4();
      foreach ($rows as $row){

        ?>
        <tr>
          <td > <?php echo $row['fechafacturacion'];?></td> 
          <td > <?php echo $row['factura'];?></td>
          <td > <?php echo "$". number_format($row['totalfactura'],2);?></td>
          <td style="color: red "> <?php echo "$". number_format($row['porvalidar'],2);?></td> 
          
          <td > 
            <a style="width: 80%" class="btn btn-success btn-sm" href="<?php echo URL?>recibos/factura?factura=<?php echo $row['factura'];?>">Ver Detalles</a> 
          </td>
          <td>
            <a style="width: 80%" class="table-button btn btn-warning btn-sm" href="<?php echo URL?>recibos/detallesFactura?factura=<?php echo $row['factura'];?>">Modificar</a>
          </td>
        </tr>
        <?php 
      }
      ?>
    </tbody>
  </table>
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

  </script>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Selecciona un límite de fecha:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?=URL ?>recibos/BuscarFechas/" method="post">
            <input name="date2" type="date" class="login-input" required style="width: 65%" />
            <input class="btn btn-primary" type="submit" name="submit" value="Continuar">
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


