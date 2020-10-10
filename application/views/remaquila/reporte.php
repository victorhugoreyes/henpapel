  <div style="padding-left:16px">
 
</div>
<div class="separator"></div>
<div class="table-section">
<div class="table-container">
  <table class="hep-table">
  <thead>
  <tr>
        <th>Fecha</th>
        <th>Nombre del responsable que entrega material</th>
        <th>Orden de trabajo</th>
        <th>Nombre y parte de la pieza de trabajo</th>
        <th>Cantidad de pliegos</th>
        <th>Pliegos cortado en base</th>
        <th>Pliegos cortado en altura</th>
        <th>Cantidad de tamaño total para impresion</th>
        <th>Tamaño total para impresion cortado en base</th>
        <th>Tamaño total para impresion cortado en altura</th>
        <th>Tamaño individual total</th>
  </tr>
  </thead>
  <tbody id="inv-body">

  <?php  
    $rows5 = $optionsmodel->getremaquila1();
                    
  foreach ($rows5 as $row) {
     ?>
  <tr>
    
                     <td>    <?php echo $row['fecha'];?> </td>
                     <td>    <?php echo $row['persona_responsable_entrega'];?> </td>
                     <td>    <?php echo $row['orden_trabajo'];?> </td>
                     <td>    <?php echo $row['nombreypieza_trabajo'];?> </td>
                     <td>    <?php echo $row['pliegos_cantidad'];?> </td>
                     <td>    <?php echo $row['pliegos_cortado_base'];?> </td>
                     <td>    <?php echo $row['pliegos_cortado_altura'];?> </td>
                     <td>    <?php echo $row['tamtotal_impresion_cantidad'];?> </td>
                     <td>    <?php echo $row['tamtotal_impresion_cortado_base'];?> </td>
                     <td>    <?php echo $row['tamtotal_impresion_cortado_altura'];?> </td>
                     <td>    <?php echo $row['tamindividual_total'];?> </td>
                        <td > <a class="boton_4" href="<?php echo URL?>gastosespeciales/index?id_maquila=<?php echo $row['id_maquila'];?>">Gastos</a> </td>                       
  </tr>
  <?php 
    }
   ?>
   </tbody>
</table>
</div>         








