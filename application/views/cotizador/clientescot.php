<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<div class="container">
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
<div class="table-controls">
    
    <div class="table-title">Clientes</div>
    
        <a href="<?=URL ?>cotizador/nuevo_cliente" class="header-button blue2">Nuevo Cliente</a> 
        
        <input type="text" id="searcher" name="" placeholder="Buscar..">
    </div>
    
    <div class="table-container">
    
        <table class="hep-table">
            
            <thead>
                <tr>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Correo</strong></th>
                    <th><strong>Fecha de evento</strong></th>

                    <th  style="width: 100px;"><strong>Modificar</strong></th>
                              
                    <th style="width: 120px;"><strong>Cotizaciones</strong></th>
                    <th style="width: 140px;"><strong>Nueva</strong></th>
                </tr>
            </thead>
            
            <tbody id="inv-body">

                <!-- loop de datos -->
                <?php 

                foreach ($rows as $row) { 
                
                    $nombre = $row['nombre'];
                    $nombre = strval($nombre);
                    $nombre = trim($nombre);
                    $nombre = utf8_decode($nombre);

                    $apellido = $row['apellido'];
                    $apellido = strval($apellido);
                    $apellido = trim($apellido);
                    $apellido = utf8_decode($apellido);
                    ?>
                    <tr>

                        <td >

                            <?= $nombre . ' ' . $apellido;?>
                        </td>

                        <td ><?= $row['email'];?></td>
                        <td ><?= $row['fecha_evento'];?></td>
                        <td>

                            <a href="<?=URL; ?>cotizador/modificar_cliente" data-id="<?= $row['id_cliente'];?>" class="table-button blue3">Modificar
                            </a>
                        </td>
                        
                        <td>
                            <!-- /views/cotizador/cotizaciones.php -->
                            <a href="<?=URL; ?>cotizador/guardadas/?c=<?= $row['id_cliente'];?>"  class="table-button green2">Cotizaciones
                            </a>
                        </td>
                        
                        <td>

                            <a href="#" data-id="<?= $row['id_cliente'];?>" class="table-button orange2 nueva">Nueva Cotizacion
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>