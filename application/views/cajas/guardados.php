
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>


<div style="padding-left:16px">
 
</div>

<div class="separator"></div>

<div class="table-section">

    <div class="table-controls">

        <p style="float: left;font-size: 20px;margin: 4px 8px;">Cálculos Guardados</p>
        
        <input type="text" id="searcher" name="" placeholder="Buscar..."></div>

        <div class="table-container">

            <table class="hep-table">
            
                <thead>
                    <tr>
                        <th><strong>id_calculo</strong></th>
                        <th><strong>ODT</strong></th>
                        <th><strong>Num Modelo</strong></th>
                        <th><strong>Modelo</strong></th>
                        <th><strong>id Usuario</strong></th>
                        <th><strong>Nomb Usuario</strong></th>
                        <th><strong>Usu Modif</strong></th>
                        <th><strong>modif por</strong></th>
                        <th><strong>Fecha Modif</strong></th>
                        <th><strong>Hora Modif</strong></th>
                        <th><strong>Fecha calculo</strong></th>
                        <th><strong>Hora calculo</strong></th>                
                        <th colspan="3"><strong>Acción</strong></th>
                    </tr>
                </thead>

                <tbody id="inv-body">

                    <?php
                    foreach ($rows as $row) {
                    
                        $fecha_modif  = "";
                        $hora_modif   = "";

                        $id_usuario   = 0;
                        $nomb_usuario = "";

                        $id_usuario = $_SESSION['id_usuario'];
                        $id_usuario = intval($id_usuario);

                        $nomb_usuario = $_SESSION['nombre_usuario'];
                        $nomb_usuario = strval($nomb_usuario);
                        $nomb_usuario = trim($nomb_usuario);

                        $hora_modif = $row['hora_modif'];
                        $hora_modif = strval($hora_modif);
                        $hora_modif = trim($hora_modif);

                        $fecha_modif = $row['fecha_modif'];
                        $fecha_modif = strval($fecha_modif);
                        $fecha_modif = trim($fecha_modif);

                        ?>

                        <tr>
                            
                            <td><?= $row['id_calculo'] ?></td>
                            <td><?= $row['odt'] ?></td>
                            <td><?= $row['id_modelo'];?></td>
                            <td><?= $row['modelo'];?></td>
                            <td><?= ucfirst($row['id_usuario']);?></td>
                            <td><?= ucfirst($row['usuario']);?></td>
                            
                            <?php
                            if (strlen($hora_modif) >= 5) {

/*
                                echo "<br />80. id_usuario: " . $id_usuario;
                                echo "<br />81. nomb_usuario: " . $nomb_usuario . "<br />";
*/
                                echo '<td>';
                                echo $row['usuario_modif'];
                                echo '</td>';
                                echo "<td>";
                                echo ucfirst($row['nomb_usuario_modif']);
                                echo "</td>";
                                echo "<td>";
                                echo $fecha_modif;
                                echo "</td>";
                                echo "<td>";
                                echo $hora_modif;
                                echo "</td>";
                            } else {
                                echo "<td> </td>";
                                echo "<td> </td>";
                                echo "<td> </td>";
                                echo "<td> </td>";
                            }
                            ?>

                            <td><?= $row['fecha_calculo'];?></td>
                            <td><?= $row['hora_calculo'];?></td>

                            <td width="80px">

                                <?php $_SESSION['id_calculo'] = $row['id_calculo']; ?>


                                <a class="table-button btn btn-warning btn-sm" href="<?php echo URL?>cajasedit/detalles?id_calculo=<?php echo $row['id_calculo'];?>"><span style="color:white; font-weight: bold">Editar</span></a>

<!--
                                <a href="#" class="table-button btn btn-warning btn-xs" title="Pendiente">Editar</a>
-->
                            </td>

                            <td width="80px">
                            
                                <?php $_SESSION['id_calculo'] = $row['id_calculo']; ?>
                                
                                <a href="javascript:void(0)" class="table-button btn btn-success btn-sm c-details" data-id="<?=$row['id_calculo'] ?>" data-model="<?=strtolower($row['modelo']) ?>" data-idmodel="<?=strtolower($row['id_modelo']) ?>"><span style=" font-weight: bold">Ver</span></a>
                            </td>

                            <?php 
                            
                            if ($_SESSION['user']['is_admin']=='true') { ?>
                            
                                <td width="80px">

                                    <a href="javascript:void(0)" class="table-button btn btn-danger btn-sm c-delete" data-id="<?=$row['id_calculo'] ?>"><span style=" font-weight: bold">Eliminar</span></a>
                                </td>
                            <?php
                            } 
                            ?>
                        </tr>

                    <?php 
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script>

    $(document).ready(function() {

        $("#searcher").on("keyup", function() {
        
            var value = $(this).val().toLowerCase();
        
            $("#inv-body tr").filter(function() {
          
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('[data-toggle="tooltip"]').tooltip()
    });

    
    jQuery214(document).on("click", ".c-details", function () {
        
        var model = jQuery214(this).data('model');

        $.ajax({  
                          
            type:"POST",
            url:"<?php echo URL; ?>cajas/viewCalc/",   
            data:{
                id:jQuery214(this).data('id'),
                id_model:jQuery214(this).data('idmodel')
            }, 
            
            success:function(data) {

                console.log(data);
                location.href = '<?php echo URL; ?>calculadora/' + model + '/';
            }
        });
    });


    jQuery214(document).on("click", ".c-edit", function () {
        
        var model = jQuery214(this).data('model');

        $.ajax({  
                          
            type:"POST",
            url:"<?php echo URL; ?>cajasedit/viewCalc/",   
            data:{id: jQuery214(this).data('id'), id_model:jQuery214(this).data('idmodel')}, 
            
            success:function(data) {


                console.log(data);
                //location.reload();
                
                location.href = '<?php echo URL; ?>cajasedit/' + model + '/';
            }
        });
    });

    
    jQuery214(document).on("click", ".c-delete", function () {

        if (confirm("Seguro que deseas eliminar este calculo?")) {

            $.ajax({  
            
                type:"POST",
                url:"<?php echo URL; ?>cajas/deleteCalc/",   
                
                data:{id: jQuery214(this).data('id')}, 
                
                success:function(data) {

                    console.log(data);
                    location.reload();
                }
            });
        }
    });


</script>