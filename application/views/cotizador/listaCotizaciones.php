  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/cotizador.css">

<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/style.css">

<style type="text/css">

    #divSelect2{

        height: 200px;
        background-color: white;
        text-align: left;
        overflow: auto;
    }

    .lista{

        cursor: pointer;
        -moz-user-select: none; 
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: black;
        margin-left: 5px;
    }

    .lista:hover{

        background-color: #315BB2;
        color: white;
    }

</style>

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

                <input id="datepicker" width="155" onchange="buscarFecha()" placeholder="YYYY/MM/DD" />
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
                        <th><strong>Cliente</strong></th>
                        <th><strong>Cantidad</strong></th>
                        <th><strong>Fecha de cotizacion</strong></th>
                        
                        <th style="width: 110px;" colspan="3"><strong>Acciones</strong></th>
                    </tr>
                </thead>
                <tbody id="inv-body">

                    <?php $i = 0;?>
                    <?php foreach ($cotizaciones as $row) {

                        ?>
                        <tr>
                            <td ><?= $row['num_odt'];?></td>
                            <td ><?= $row['nombre_caja'];?></td>
                            <td ><?= $row['nombre_cliente'] ?></td>
                            <td ><?= $row['cantidad'];?></td>
                            <td ><?= $row['fecha_odt'];?></td>
                            <td>

                                <a href="<?=URL; ?>cotizador/imprimir?ct=<?= $row['id_cotizacion'];?>&c=<?= $_GET['c'];?>" data-id="<?= $row['id_cliente'];?>" class="table-button blue3 nueva">Imprimir</a>
                            </td>
                            <td>

                                <!-- <?=URL; ?>cotizador/modCajaAlmeja?num_odt=<?= $row['num_odt'];?> -->
                                <a id="<?= $row['id_odt']; ?>" href="#" data-id="<?= $row['num_odt'];?>" data-caja="<?=$row['nombre_caja']?>" onclick="vistaAct('<?= $row['id_odt']; ?>');" class="table-button orange2">Modificar</a>
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

<!-- modal Eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header" style="background-color: #E53333; color: white;">

                <h5 class="modal-title">Confirmación</h5>
                <!--
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>
                </button>
                -->
            </div>
    
            <div class="modal-body">

                <p style="color: black; font-size: 1.1em">¿Esta seguro de eliminar la cotizacion?</p>
            </div>
    
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnEliminar">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    var nombreCliente = [];
    var idCliente = [];
</script>
<?php

    for ($i=0; $i < count($clientes) ; $i++) {

        $nombre = $clientes[$i]['nombre'];
        $id = $clientes[$i]['id_cliente'];
?>

        <script type="text/javascript">
            
            nombreCliente[<?=$i?>] = "<?= $nombre ?>";
            idCliente[<?=$i?>] = "<?= $id ?>";
        </script>
<?php

    }
?>
<!-- modal muestra clientes para cotizacion-->
<div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="modalClientes" aria-hidden="true">
        
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content" style="height: 400px !important">

            <div class="modal-header azulWhi">

                <h5 class="modal-title" id="txtTitModCorrecto">SELECCIONA</h5>
            </div>
    
            <div class="modal-body">


                <div id="accordion" style="width: 90%; display: block; margin-left: auto; margin-right: auto;">
                    
                    <div class="card" style="border: none;">
                        
                        <div class="card-header" id="headingOne" style="padding: 0px; width: 100%; height: 40px; border: none; margin: 0px">

                            <input class="form-group" placeholder="Ingrese un cliente" onkeyup="searchClient();" type="text" name="txtSearch" id="txtSearch" autofocus="focus" style="width: 93%; height: 100%; border: 1px gray solid; border-bottom: none; outline: none;" autofocus="" />
                            
                            <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" style="height: 100%; float: right; width: 7%; background-color: rgb(0, 45, 98);" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                        </div>
                        

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style=" margin: 0px; width: 100%;">
                            <div class="card-body" id="divSelect2" style=" border: 1px rgb(0,0,0,0.5) solid; padding: 0px; border-top: none;">

                                <script type="text/javascript">
                                    for (var i = 0; i < nombreCliente.length; i++) {

                                        var cliente = nombreCliente[i];
                                        var appnd = '<li style="list-style:none;" class="lista" data-id="' + idCliente[i] + '" onclick="enviar('+idCliente[i]+')">' + cliente +'</li>';
                                        $("#divSelect2").append(appnd);
                                    }    
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                
                <button style="display: none;" class="btn btn-success" id="btnCliente">Agregar Cliente</button>
                <button class="btn azulWhi" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!-- modal error-->
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="modalError" aria-hidden="true">
    
<div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">

        <div class="modal-header azulWhi" style="background-color: #E53333; color: white;">

            <h5 class="modal-title" id="txtTituloModal">Error</h5>
        </div>

        <div class="modal-body">

            <p id="txtContenido" style="color: black; font-size: 1.1em"></p>
        </div>

        <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>


<script type="text/javascript">

    var id;

    function getId(id){

        this.id = parseInt(id);

        console.log(id);
    }

    function evaluar(){

        var cliente = $("#optCliente option:selected").data("id");

        location.href = '<?php echo URL; ?>cotizador/cajas/?cliente=' + cliente + '&tipo=caja';
    }

    $("#btnEliminar").click( function() {

        var url = location.href;
        $.ajax({

            type: "POST",
            url: "<?= URL ?>cotizador/deleteCotizacion/",
            data: {id: id},
            
            success: function(response) {
                
                if( response == "true" ){

                    location.href="<?=URL?>cotizador/getCotizaciones/";
                }else{
                    console.log(response);
                    showModError("No se pudo eliminar la cotización");
                }
            }

        });
    });

    function showModError(texto) {

        $("#txtContenido").html(texto);
        $('#modalError').modal({backdrop: 'static', keyboard: false});
    }

    function vistaAct(id){

        var num_odt = $("#"+id).data("id");
        var caja = $("#"+id).data("caja");
        switch( caja ){

            case"Almeja":

                location.href = "<?php echo URL; ?>cotizador/modCajaAlmeja/?num_odt=" + num_odt + "&caja=" +caja;
            break;
            case"Circular":

                location.href = "<?php echo URL; ?>circular/modCajaCircular/?num_odt=" + num_odt + "&caja=" +caja;
            break;
            case"Libro":
            break;
            case"Regalo":
            break;
            case"Marco":
            break;
            case"Cerillera":
            break;
            case"Vino":
            break;



        }
        
    }

    function buscarODT(){

        var text   = $("#txtSearchODT").val();
        var filtro = text.toUpperCase();
        var tabla  = document.getElementById("tbeCotizaciones");

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

        var text    = $("#datepicker").val();
        var limpiar = text.split("/");
        var text    = limpiar[0] + "-" + limpiar[1] + "-" + limpiar[2];
        var tabla   = document.getElementById("tbeCotizaciones");

        tr = tabla.getElementsByTagName("tr");

        if( limpiar[0] == undefined || limpiar[1] == undefined || limpiar[2] == undefined){

            for (i = 0; i < tr.length; i++) {

                    tr[i].style.display = "";
            }
        } else {

            for (i = 0; i < tr.length; i++) {

                td = tr[i].getElementsByTagName("td")[4];

                if (td) {

                    txtValue = td.textContent || td.innerText;

                    if (txtValue.indexOf(text) > -1) {

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

    function searchClient(){

        $("#collapseOne").show();
        var texto  = $("#txtSearch").val();
        var filtro = texto.toUpperCase();
        var ul     = document.getElementById("divSelect2");
        var li     = ul.getElementsByTagName("li");
        var len    = li.length;
        for (i = 0; i < len; i++) {

            var li1 = li[i];
            if (li1) {

                txtValue = li1.innerText;

                if (txtValue.toUpperCase().indexOf(filtro) > -1) {

                    $(li[i]).show();
                } else {

                    $(li[i]).hide();
                }
            }
        }
        var primerValor=$("#divSelect2 li:visible:eq(0)").html();
        console.log(primerValor);

        var cont = $("#divSelect2 li:visible").length;

        if( cont == 0){

            $("#btnCliente").show("normal");
        }else{

            $("#btnCliente").hide("normal");
        }
    }

    $("#btnCliente").click( function(){

        location.href = "<?= URL ?>cotizador/nuevo_cliente";
    });

    function enviar(id){
        
        location.href = '<?php echo URL; ?>cotizador/cajas/?cliente=' + id + '&tipo=caja';
    }

</script>
