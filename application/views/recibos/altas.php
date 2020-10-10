<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>
<div class="separator" id="messages">
  <?php 
  if (isset($_SESSION['messages'])) {
   echo $_SESSION['messages'];
 }
 ?>
</div>
<script>
  var i=1;
  var list = [];
  var total=0;
  $(document).ready(function() {
    quitSessionMessages();
  });
  function quitSessionMessages(){
    setTimeout(function(){ $('.notification').remove(); }, 1300);
  }
</script>
<?php
unset($_SESSION['messages']);
unset($_SESSION['notification']);
unset($_SESSION['result']);

?>
<style type="text/css">
  th{
    background-color: #E6E6E6;
  }
</style>

<div style="padding-left:16px">
 
</div>

<div class="separator"></div>

<div class="table-section">

  <div class="table-controls">

    <p style="float: left;font-size: 20px;margin: 4px 8px;">
      Boletas
    </p>
    
    <input type="text" id="searcher" name="" placeholder="Buscar..."></div>
    <div class="table-container">
      <table class="hep-table">
        <thead>
          <tr>
            <th><strong>TIENDA</strong></th>
            <th><strong>ID</strong></th>
            <th><strong>BOLETA</strong></th>
            <th><strong>MONTO</strong></th>
            <th><strong>REGISTRO</strong></th>
            <th><strong>CLIENTE</strong></th>
            <th><strong>USUARIO</strong></th>
            <th><strong>ESTADO</strong></th>
            <th><strong>ACCIONES</strong></th>
          </tr>
        </thead>

        <tbody id="inv-body">

          <?php 
          $rows=$ventas_model->getFiles2();
          foreach ($rows as $row) {
            ?>
            <tr>    
              <td > <?php echo $row['tienda'];?></td>
              <td >   <?php echo $row['idaccess'];?></td>
              <td >   <?php echo $row['boleta'];?></td>
              <td >   <?php echo "$". number_format($row['monto'],2); ?></td>
              <td >   <?php echo $row['fecharegistro'];?></td>
              <td >   <?php echo $row['cliente'];?></td>
              <td >   <?php echo $row['usuario'];?></td>
              <td style="color: #01A3FF; "><b><i> <?php echo $row['estado'];?> </i></b></td>    
              <td style="margin:none;">
                <a class="table-button btn btn-primary btn-sm" href="<?php echo URL?>recibos/detallesRecibo?id_boleta=<?php echo $row['id_boleta'];?>">Añadir Boleta</a>
              </td>  
              
            </tr>
            <?php 
          }
          ?>
        </tbody>
      </table>
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