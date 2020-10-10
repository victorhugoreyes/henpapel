<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/cotizador.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/style.css">
<style>

    #messages{
    
        max-width: 98%!important;
    }
</style>

<div style="padding-left:16px">
 
</div>

<div class="separator" id="messages">

    <div class="notification <?=(!isset($_SESSION['notification']))? '' : $_SESSION['notification'] ?>" style="<?=(!isset($_SESSION['notification']))? 'display:none;' : '' ?>">
    
        <div></div>
        
        <p>
            <span><?=(isset($_SESSION['result']))?$_SESSION['result'] : '' ?>
            </span> <?=(isset($_SESSION['messages']))? $_SESSION['messages']:'' ?>
        </p>
    </div>
</div>

<div class="table-section">
    
    <div class="table-controls">
    
        <div class="table-title">Clientes</div>
        
            <a href="<?=URL ?>cotizador/nuevo_cliente" class="header-button blue2">Nuevo Cliente</a> 
            
        <input type="text" id="searcher" name="" placeholder="Buscar..">
    </div>
        
    <div class="table-container">
    
        <table class="hep-table" id="tbeClientes">
            
            <thead>
                <tr>
                    <th><strong>Nombre</strong></th>
                    <th><strong>Correo</strong></th>
                    <th><strong>Fecha de evento</strong></th>
                    <th  style="width: 100px;" colspan="3"><strong>Acciones</strong></th>
                </tr>
            </thead>
            
            <tbody id="inv-body" >

                <!-- loop de datos -->
                <?php 

                foreach ($rows as $row) { 
                
                    $nombre = $row['nombre'];
                    $nombre = strval($nombre);
                    $nombre = trim($nombre);
                    //$nombre = utf8_decode($nombre);

                    ?>
                    <tr>

                        <td >

                            <?= $nombre;?>
                        </td>

                        <td ><?= $row['email'];?></td>
                        <td ><?= $row['fecha_evento'];?></td>
                        <td>

                            <a href="<?=URL; ?>cotizador/modificar_cliente/?idCliente=<?= $row['id_cliente'] ?>" data-id="<?= $row['id_cliente'];?>" class="table-button blue3">Modificar
                            </a>
                        </td>
                        
                        <td>
                            <!-- /views/cotizador/cotizaciones.php -->
                            <a href="<?=URL; ?>cotizador/guardadas/?c=<?= $row['id_cliente'];?>"  class="table-button green2">Cotizaciones
                            </a>
                        </td>
                        
                        <td>

                            <a href="#"onclick="getId('<?= $row['id_cliente'] ?>')" class="table-button red2" data-toggle="modal" data-target="#modalEliminar">Eliminar
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
    
    <div class="popup" style="display: none;">
    
    </div>

    <div class="cotizador_box">
        
        <div class="modal-close"></div>
        
        <h2>¿Que deseas cotizar?</h2>
        
        <div style="margin: 20px auto;">
            
            <div class="image-option" data-tipo="caja">

                <img src="<?=URL ?>/public/img/cajas.png">
                <p>Caja</p>
            </div>

            <div class="image-option" data-tipo="invitacion">

                <img src="<?=URL ?>/public/img/invita.png">

                <p>Invitacion</p>
            </div>
        </div>
    </div>

    <div class="backdrop"></div>

    <?php 
     unset($_SESSION['messages']);
     unset($_SESSION['notification']);
     unset($_SESSION['result']);
    ?>

<!-- modal Eliminar-->
<div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminar" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header" style="background-color: #E53333; color: white;">

                <h5 class="modal-title">Confirmación</h5>
            </div>
    
            <div class="modal-body">

                <p style="color: black; font-size: 1.1em">¿Esta seguro de eliminar el cliente?</p>
            </div>
    
            <div class="modal-footer">

                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnEliminar">Si</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<script>

    var id;
    var cliente;

    function getId(id){

        this.id=parseInt(id);
    }

    $("#btnEliminar").click( function() {

        $.ajax({

            type: "POST",
            url: "<?= URL ?>cotizador/deleteCliente/",
            data: {id: id},
            
            success: function(response) {
                
                console.log(response);
                try{

                    response = JSON.parse(response);
                    if( response == true ){

                        /*var texto = $("#lblCliente").html();
                        $("#lblCliente").html(texto + nombre);
                        $("#modalCorrecto").modal("show");
                        ocultarLoad();
                        var time = setTimeout( function(){
                            */

                        window.location = "<?= URL ?> cotizador/clientes";
                        /*},2000);*/
                    }else{

                        //ocultarLoad();
                        mostrarError("Hubo un Error al eliminar el cliente.");
                    }
                }catch(e){

                    //ocultarLoad();
                    mostrarError("Error al leer respuesta");
                }
            }
        });
    });

    function mostrarError(proceso) {

        $("#txtContenido").html(proceso);

        $('#modalError').modal({backdrop: 'static', keyboard: false});
    }

    $(document).on('keyup', '#searcher', function () {

        var parameter = $(this).val();
        var filtro = parameter.toUpperCase();
        var tabla = document.getElementById("tbeClientes");
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
        /*$.ajax({  
            type:"POST",
            url:"<?=URL?>ventas/cambiosSearch",   
            data:{param:parameter,filter:'<?=$title ?>'},  

            success:function(data) { 

                $('#inv-body').html(data);
            }  
        });*/
    });

    
    $(document).on('keyup', '.qty', function () {

        var id = $(this).data('id');
        
        aumentarManual(id);
        collectPrices();
        collectQty();
    });

    
    function closeModal() {

        $('.backdrop, .cotizador_box, .loader').animate({'opacity':'0'}, 300, 'linear', function() {

            $('.backdrop, .cotizador_box, .loader').css('display', 'none');
        });  
    }

</script>
