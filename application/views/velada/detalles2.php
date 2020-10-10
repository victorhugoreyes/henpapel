 <div style="padding-left:16px">
 
</div>
<div class="separator"></div>

<div class="table-section">
    
    <div class="table-container">

        <h1 class="page-header" ></h1>
 
        <body>

            <center><h3>VELADA</h3></center>
  
            <table class="hep-table">
            
                <thead>
                    
                    <tr>
                        <th>Fecha</th>
                        <th>Responsable</th>
                        <th>Autorizo</th>
                        <th>Accion</th> 
                    </tr>
                </thead> 

                <?php  
                $rows18 = $optionsmodel->getinformacion4($_GET['id_velada']);

                foreach ($rows18 as $row) {

                    ?>
                    <tr>

                        <td> <?php echo $row['fecha'];?></td>
                        <td> <?php echo $row['responsable_velada'];?> </td>
                        <td> <?php echo $row['autorizo'];?> </td>
                        <td>

                            <a value="btenenvio" href="<?php echo URL?>Velada/envio4?id=<?php echo $row['id_velada'];?>" class="boton_1" >Modificar</a>
                        </td>
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
                        <th>Modificar</th>
                    </tr>
                </thead>

                <?php  
                $rows19 = $optionsmodel->getinformacion($_GET['id_velada']);

                foreach ($rows19 as $row) {
                
                    ?>
                    <tr>
    
                        <td> <?php echo $row['nombre'];?> </td>
                        <td> <?php echo $row['area'];?> </td>

                        <td>

                            <a value="btenenvio"  href="<?php echo URL?>Velada/envio?id=<?php echo $row['id_personal'];?>" class="boton_1" >Modificar</a>
                        </td>
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
     <th>Modificar</th>
  
  </tr>
  </thead> 
 

  <?php  
    $rows18 = $optionsmodel->getinformacion2($_GET['id_velada']);

  foreach ($rows18 as $row) {
     ?>
  <tr>
    
                        <td> <?php echo $row['clave'];?> </td>
                        <td> <?php echo $row['descripcion'];?> </td>
                         <td><a value="btenenvio"  href="<?php echo URL?>Velada/envio2?id=<?php echo $row['id_orden'];?>" class="boton_1" >Modificar</a></td>


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
     <th>Modificar</th>
  
  </tr>
  </thead>
 

  <?php  
    $rows17 = $optionsmodel->getinformacion3($_GET['id_velada']);

  foreach ($rows17 as $row) {
     ?>
  <tr>
    
                        <td> <?php echo $row['tipo_gasto'];?> </td>
                        <td> <?php echo $row['costo'];?> </td>
                           <td><a value="btenenvio"  href="<?php echo URL?>Velada/envio3?id=<?php echo $row['id_gastos'];?>" class="boton_1" >Modificar</a></td>



  </tr>
  <?php 
    }
   ?>

</table>
</div>    
  </body>