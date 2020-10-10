<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>
<div class="table-section"><a href="<?= URL ;?>recibos/facturadas">
  <img border="0" alt="REGRESAR" src="<?=URL ;?>public/img/regresar.png" width="35" height="35"></a></div>
  <div class="container">
    <h3>Factura <?= $_GET['factura']?></h3>
    <br>
    <div style="text-align:center;">
      <div class="table-responsive">
        <table class="table">
          <tr class="table-secondary">
            <th scope="col">ID</th>
            <th scope="col">BOLETA</th>
            <th scope="col">FECHA</th>
            <th scope="col">MONTO</th>
            
          </tr>
          <tbody>
            <?php
            $rows=$ventas_model->getDetallesFactura();
            foreach ($rows as $row){
              ?>
              <tr>
                
                <td > <?php echo $row['idaccess'];?></td>
                <td > <?php echo $row['boleta'];?></td>
                <td > <?php echo $row['fecharegistro'];?></td>
                <td style=" text-align: right;"> <?php echo "$". number_format($row['monto'],2); ?></td>
              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
        <?php
        $rows=$ventas_model->getSumaFactura();
        foreach ($rows as $row){
          ?>
          <h6 align="right"> <?php echo "Monto por Validar: &nbsp &nbsp &nbsp &nbsp &nbsp"."$". number_format($row['porvalidar'],2);?>&nbsp &nbsp</h6>
          <hr size="20" style="color: #020202">
          <h5 align="right"><?php echo "TOTAL:&nbsp &nbsp &nbsp $". number_format($row['totalfactura'],2);?> &nbsp</h5>
          <hr size="10" />
          <h6 align="left"><?php echo "Factura Realizada el " . $row['fechafacturacion']; ?></h6>
          <?php 
        }
        ?>
        <br>
        <br>
      </div>
    </div>
  </div>
