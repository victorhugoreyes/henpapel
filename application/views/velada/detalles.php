 <div style="padding-left:16px">
 
</div>
<div class="separator"></div>
<div class="table-section">
<div class="table-container">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" ></script>
<h1 class="page-header" ></h1>

  <center><h3>VELADA</h3></center>
  <body>

        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/js/jquery-ui/jquery-ui.min.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/style.css" />
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/demo.css">



  <table class="hep-table">
  <thead>
  <tr>
    <th>Fecha</th>
    <th>Responsable</th>
     <th>Autorizo</th>
    

  
  </tr>
  </thead> 
 

  <?php  
    $rows18 = $optionsmodel->getinformacion4($_GET['id_velada']);

  foreach ($rows18 as $row) {
     ?>
  <tr>
    
                        <td> <?php echo $row['fecha'];?> </td>
                        <td> <?php echo $row['responsable_velada'];?> </td>
                          <td> <?php echo $row['autorizo'];?> </td>
                     


  </tr>
  <?php 
    }
   ?>

</table>
 <br>


    <center><h3>PERSONAL</h3></center>
  <table class="hep-table">
  <thead>
  <tr>

    <th>Nombre</th>
    <th>Area</th>

  </tr>
  </thead>
 

  <?php  
    $rows19 = $optionsmodel->getinformacion($_GET['id_velada']);

  foreach ($rows19 as $row) {
     ?>
  <tr>
    
                        <td> <?php echo $row['nombre'];?> </td>
                        <td> <?php echo $row['area'];?> </td>

               


  </tr>
  <?php 
    }
   ?>

</table>

  <br>
<center><h3>ORDENES</h3></center>
  <table class="hep-table">
  <thead>
  <tr>
    <th>ODT</th>
    <th>Descripcion</th>

  
  </tr>
  </thead>
 

  <?php  
    $rows18 = $optionsmodel->getinformacion2($_GET['id_velada']);

  foreach ($rows18 as $row) {
     ?>
  <tr>
    
                        <td> <?php echo $row['clave'];?> </td>
                        <td> <?php echo $row['descripcion'];?> </td>
                       


  </tr>
  <?php 
    }
   ?>

</table>
 <br>
<center><h3>GASTOS</h3></center>
  <table class="hep-table">
  <thead>
  <tr>
    <th>Gasto</th>
    <th>Costo</th>

  
  </tr>
  </thead>
 

  <?php  
    $rows17 = $optionsmodel->getinformacion3($_GET['id_velada']);

  foreach ($rows17 as $row) {
     ?>
  <tr>
    
                        <td> <?php echo $row['tipo_gasto'];?> </td>
                        <td> <?php echo $row['costo'];?> </td>
                           



  </tr>
  <?php 
    }
   ?>

</table>
</div>    
  </body>