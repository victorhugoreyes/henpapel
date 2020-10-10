
<div style="padding-left:16px"></div>
<div class="separator"></div>

<div class="table-section">
    
    <div class="table-controls">

        <p style="float: left;font-size: 20px;margin: 4px 8px;">Buscar o Modificar</p>
        
        <input type="text" id="searcher" name="" placeholder="Buscar...">
    </div>

    <div class="table-container">

        <table class="hep-table">
            <thead>
                <tr>
                    <th>ODT</th>
                    <th>Fecha</th>
                    <th>Orden</th>
                    <th>Accion</th> 
                </tr>
            </thead>
            <tbody id="inv-body">

                <?php  
                $rows5 = $optionsmodel->getVelada2();
                    
                foreach ($rows5 as $row) {
                
                    ?>
                    <tr>
                        <td > <?php echo $row['clave'];?></td>
                        <td > <?php echo $row['fecha'];?></td>
                        <td ><?php echo $row['descripcion'];?></td>   
                        <td >
                            <a class="boton_4" href="<?php echo URL?>velada/detalles?id_velada=<?php echo $row['id_velada'];?>">Ver Detalles</a> 

                            <a class="boton_1" href="<?php echo URL?>velada/detalles2?id_velada=<?php echo $row['id_velada'];?>"> Editar Orden</a>
                        </td> 
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>
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
    });

</script>  





