
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/cotizador.css">
<div class="table-section">

    <div class="table-controls">
        
        <div class="table-title">
            Cotizaciones
        </div>

        <label>
            
            <button class="btn btn-primary btn-sm" id="btnNvaCot">+ Nueva Cotizacion</button>
            <input type="text" style="width: 110px;" id="txtSearchODT" onkeyup="buscarODT()" name="txtSearchODT" placeholder="Buscar ODT">
        </label>
        <label>

            <div class="gj-margin-top-10">

                <input id="datepicker" width="155" onchange="buscarFecha()" placeholder="DD/MM/YYYY" />
            </div>
        </label>

        <script type="text/javascript">

            var config;
            config = {
                locale: 'es-es',
                format: "yyyy/mm/dd",
                uiLibrary: 'bootstrap4'
            };
            
            $(document).ready(function () {

                $('#datepicker').datepicker(config);
            });
        </script>

        <div class="table-container">

            <table class="hep-table" id="tbeCotizaciones">
                <thead>
                    <tr>
                        <th><strong>ODT</strong></th>
                        <th><strong>Modelo</strong></th>
                        <th><strong>Cantidad</strong></th>
                        <th><strong>Fecha de cotizacion</strong></th>
                        
                        <th style="width: 110px;" colspan="3"><strong>Acciones</strong></th>
                    </tr>
                </thead>
                <tbody id="inv-body">
                    <?php $i=0;?>
                    <?php foreach ($cotizaciones as $row) {

                        ?>
                        <tr>
                            <td ><?= $row['num_odt'];?></td>
                            <td ><?= $row['nombre_caja'];?></td>
                            <td ><?= $row['cantidad'];?></td>
                            <td ><?= $row['fecha_odt'];?></td>
                            <td>

                                <a href="<?=URL; ?>cotizador/imprimir?ct=<?= $row['id_cotizacion'];?>&c=<?= $_GET['c'];?>" data-id="<?= $row['id_cliente'];?>" class="table-button blue3 nueva">Imprimir</a>
                            </td>
                            <td>

                                <a href="<?=URL; ?>cotizador/modCaja?num_odt=<?= $row['id_odt'];?>" data-id="<?= $row['id_odt'];?>" class="table-button orange2">Modificar</a>
                            </td>
                            <td>
                                <a href="#" onclick="getId('<?= $row['id_odt'] ?>')" data-toggle="modal" data-target="#modalEliminar" class="table-button red2" >Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }

                    if (count($cotizaciones) == 0) {

                        ?>
                        <tr>

                            <td colspan="5">No hay cotizaciones guardadas
                            </td>
                        </tr>
                    <?php  }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="modalClientes" aria-hidden="true">
        
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header azulWhi">

                    <h5 class="modal-title" id="txtTitModCorrecto">Registro Exitoso</h5>

                </div>
        
                <div class="modal-body">

                    <select id="optCliente" onchange="evaluar();" class="SelectTSM" required>
                    	<option selected="" value="" disabled>Cliente a realizar cotizacion</option>
                    	<?php

                    		foreach( $clientes as $c ){?>

                    			<option>
                    				<?= utf8_encode($c['nombre']);?>
                    			</option>
                    	<?php

                    		}

                    	?>
                    </select>
                </div>
        
                <div class="modal-footer">

                    <!--<button id="btnModCorrecto" type="button" class="btn btn-primary azulWhi" data-dismiss="modal">Cerrar</button>--> 
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
	
	function evaluar(){

		console.log($("#optCliente").val());
	}



	function buscarODT(){

        var text = $("#txtSearchODT").val();
        var filtro = text.toUpperCase();
        var tabla = document.getElementById("tbeCotizaciones");
        tr = tabla.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {

                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filtro) > -1) {

                    tr[i].style.display = "";
                } else {

                    tr[i].style.display = "none";
                }
            }       
        }
    }

    function buscarFecha(){

        var text = $("#datepicker").val();
        var limpiar = text.split("/");
        var text = limpiar[0] + "-" + limpiar[1] + "-" + limpiar[2];
        var filtro = text.toUpperCase();
        var tabla = document.getElementById("tbeCotizaciones");
        tr = tabla.getElementsByTagName("tr");

        if( limpiar[0] == undefined || limpiar[1] == undefined || limpiar[2] == undefined){

            for (i = 0; i < tr.length; i++) {

                    tr[i].style.display = "";
            }
        }else{

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {

                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filtro) > -1) {

                        tr[i].style.display = "";
                    } else {

                        tr[i].style.display = "none";
                    }
                }       
            }
        }
    }

    $("#btnNvaCot").click(function(){

    	$("#modalClientes").modal("show");
    });

    function updateTabla(){

    	$.ajax({

    		type: "POST",
    		url: "<?=URL?>/cotizador/getcotizacionAll",

    		success:function( respuesta ){

    			if( JSON.parse(respuesta).length > parseInt(<?=count($cotizaciones)?>) || JSON.parse(respuesta).length < parseInt(<?=count($cotizaciones)?>) ){

    				window.location = "<?=URL?>cotizador/cotizaciones/";
    			}
    		}
    	});
    	  
    	var time = setTimeout(function(){updateTabla();}, 10000);
    }
    updateTabla();
</script>
