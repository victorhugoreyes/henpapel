 <div class="table-section">
<div class="table-controls"><input type="text" id="searcher" name="" placeholder="Buscar..."></div>
<div class="table-container">
  <table class="hep-table">

<h1 class="page-header">Registros Maquila</h1>

<body>
<button>
<a href="<?php echo URL?>remaquila/reg">Registrar</a>
</button>
</body>
<body>
<button>
<a href="<?php echo URL?>remaquila/maquila">Guardar</a>
</button>
</body>


  
  <thead>
      <tr>
      
        <th>Id</th>
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
  
  foreach ($rows as $row) {
  ?>

  <tr>
    <form action="<?php echo URL?>remaquila/borrar" method="POST">
                      
                       
                      
                        <td>    <?php echo $row['id_maquila'];?> </td>
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
                        
                      
                      <td>
                      <input type="submit" style="background:#FC7777"  value="Eliminar">
                  
                      <input type="hidden" name="id_maquila" value="<?=$row['id_maquila']?>">
                    
                        </td>
                        </form>


                      <td>
                      <button>
                      <a style="background:#2DEA19" value="btnmodificar"  href="<?php echo URL?>remaquila/mod?id=<?php echo $row['id_maquila'];?>" class="btn btn-warning btn-sm" >Modificar</a>
                      </button>
                      </td>


                      <td > <a class="boton_4" href="<?php echo URL?>gastosespeciales/index?id_maquila=<?php echo $row['id_maquila'];?>">Gastos</a> </td>

                    
  </tr>

  <?php
    }
   ?>
   </tbody>
</table>
</div>