
<div class="table-section">
<div class="table-controls"><input type="text" id="searcher" name="" placeholder="Buscar.."></div>
<div class="table-container">
  <table class="hep-table">

<h1 class="page-header">Gastos Especiales</h1>

<body>
<button>
<a style="background:#04EDF0" href="<?php echo URL?>remaquila/maquilar"><-Regresar</a>
</button>
</body> 
<body>
<button>
<a href="<?php echo URL?>gastosespeciales/reg">Registrar</a>
</button>
</body> 
<body>
<button>
<a href="<?php echo URL?>gastosespeciales/index">Guardar</a>
</button>
</body> 

  
  <thead>
      <tr>
      
        <th>Id</th>
        <th>Nombre</th>
        <th>Cantidad que entra al proceso</th>
        <th>Cantidad que sale del proceso correcta</th>
        <th>Cantidad que sale del proceso merma</th>
        <th>Total</th>
        <th>Proveedor</th>
        <th>Firma</th>
        <th>Id maquila</th>
    


      </tr>
    
    </thead>

  <tbody id="inv-body">


  



  <?php 

  foreach ($rows as $row) {
  ?>

  <tr>
    <form action="<?php echo URL?>gastosespeciales/borrar" method="POST">

    
                        <td >    <?php echo $row['id_tipotec']?> </td> 
                        <td >    <?php echo $row['nombre'];?> </td> 
                        <td >    <?php echo $row['cantidad_entrada_proceso'];?> </td>      
                        <td >    <?php echo $row['cantidad_salida_proceso_correcta'];?> </td>
                        <td >    <?php echo $row['cantidad_proceso_merma'];?> </td>
                        <td >    <?php echo $row['total'];?> </td>
                        <td >    <?php echo $row['proveedor'];?> </td>
                        <td >    <?php echo $row['firma'];?> </td>
                        <td >    <?php echo $row['id_maquila'];?> </td>



                      <td>
                      <input type="submit" style="background:#FC7777"  value="Eliminar">
                  
                      <input type="hidden" name="id_tipotec" value="<?=$row['id_tipotec']?>">
                    
                        </td>
                        </form>


                      <td>
                      <button>
                      <a style="background:#2DEA19" value="btnmodificar"  href="<?php echo URL?>gastosespeciales/mod?id=<?php echo $row['id_tipotec'];?>" class="btn btn-warning btn-sm" >Modificar</a>
                      </button>
                      </td>


                    
  </tr>

  <?php 
    }
   ?>
   </tbody>
</table>
</div>