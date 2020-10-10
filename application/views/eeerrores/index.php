
<div class="table-section">
<div class="table-controls"><input type="text" id="searcher" name="" placeholder="Buscar.."></div>
<div class="table-container">
  <table class="hep-table">

<h1 class="page-header">Reporte de Errores</h1>


<body>
<button>
<a href="<?php echo URL?>eeerrores/reg">Registrar</a>
</button>
</body> 
<body>
<button>
<a href="<?php echo URL?>eeerrores/index">Guardar</a>
</button>
</body> 

  
  <thead>
      <tr>
      
        <th>Id</th>
        <th>Nombre de la persona que reporta</th>
        <th>Fecha</th>
        <th>Nombre del fallo</th>
        <th>Especificaciones</th>
        <th>Tiempo en que duro el fallo</th>
        <th>Tiempo especificado</th>
        <th>Observaciones</th>
        <th>Terminado</th>
        <th>Solucion</th>


      </tr>
    
    </thead>

  <tbody id="inv-body">


  



  <?php 

  foreach ($rows as $row) {
  ?>

  <tr>
    <form action="<?php echo URL?>eeerrores/borrar" method="POST">

    
                        <td >    <?php echo $row['id_errores']?> </td> 
                        <td >    <?php echo $row['nombre_persona_reportax'];?> </td> 
                        <td >    <?php echo $row['fechax'];?> </td>      
                        <td >    <?php echo $row['nombre_fallox'];?> </td>
                        <td >    <?php echo $row['especificacionesx'];?> </td>
                        <td >    <?php echo $row['tiempo_duracion_fallox'];?> </td>
                        <td >    <?php echo $row['tiempo_especificadox'];?> </td>
                        <td >    <?php echo $row['observacionesx'];?> </td>
                        <td >    <?php echo $row['terminadox'];?> </td>
                        <td >    <?php echo $row['solucionx'];?> </td>


                      <td>
                      <input type="submit" style="background:#FC7777"  value="Eliminar">
                  
                      <input type="hidden" name="id_errores" value="<?=$row['id_errores']?>">
                    
                        </td>
                        </form>


                      <td>
                      <button>
                      <a style="background:#2DEA19" value="btnmodificar"  href="<?php echo URL?>eeerrores/mod?id=<?php echo $row['id_errores'];?>" class="btn btn-warning btn-sm" >Modificar</a>
                      </button>
                      </td>


                    
  </tr>

  <?php 
    }
   ?>
   </tbody>
</table>
</div>