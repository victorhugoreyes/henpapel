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
      Boletas Revisadas
  </p>

  <input type="text" id="searcher" name="" placeholder="Buscar..."></div>
  <a class="btn btn-secondary btn-sm" href="<?= URL ;?>recibos/altas" role="button">ALTAS</a>
  <a class="btn btn-secondary btn-sm" href="<?= URL ;?>recibos/revisadas" role="button">REVISADAS</a>

  <div class="table-container">
      <form name="myform" method="POST" action="">
        <table class="hep-table">
          <thead>
            <tr>
              <th>TIENDA</th>
              <th>BOLETA</th>
              <th>MONTO</th>
              <th>ARCHIVO</th>
              <th colspan="2">AGREGADO</th>
              <th>CLIENTE</th>
              <th>USUARIO</th>
              <th>ESTADO</th>
              <th>ACCIONES</th>
          </tr>
      </thead>
      <tbody id="inv-body">

        <?php 
        $rows=$ventas_model->getFiles3();
        foreach ($rows as $row) {


          ?>
          <tr>
              
            <td > <?php echo $row['tienda'];?></td>
            <td > <b><?php echo $row['boleta'];?></b></td>
            <td > <?php echo "$".$row['monto'];?></td>
            <td > <?php echo $row['archivo'];?></td>
            <td > <?php echo $row['fecharevision'];?></td>
            <td > <?php echo $row['horarevision'];?></td>
            <td > <?php echo $row['cliente'];?></td>
            <td > <?php echo $row['usuario'];?></td>
            <td style="color: #FF8B01; "><b><i> <?php echo $row['estado'];?> </i></b></td>    
            <td > <a class="btn btn-warning btn-sm" href="<?=URL.'public/uploads/recibos/'.str_replace(" ","%20",$row['archivo']);?>" target="blank">Ver Boleta</a> </td>
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

</script>