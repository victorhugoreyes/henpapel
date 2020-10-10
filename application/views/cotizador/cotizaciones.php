
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<div style="padding-left:16px">
    
</div>
<div class="separator"></div>
<div class="table-section">

    <div class="table-controls">
        
        <div class="table-title">
            <?php
                if(isset($rows[0])) {
            ?>
                Cotizaciones de <?= utf8_encode($rows[0]['nombre_cliente']); ?>
            <?php
                } else {
            ?>
                No existe cotizaciones del cliente
            <?php
                }
            ?>
        </div>

        <label>
            
            <input type="text" id="txtSearchODT" onkeyup="buscarODT()" name="txtSearchODT" placeholder="Buscar ODT">
        </label>
        <label>

            <div class="gj-margin-top-10">

                <input id="datepicker" width="200" onchange="buscarFecha()" placeholder="DD/MM/YYYY" />
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
                
                    <?php $i = 0;?>
                    <?php foreach ($rows as $row) {

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

                                <a href="<?=URL; ?>cotizador/modCajaAlmeja?num_odt=<?= $row['num_odt'];?>" data-id="<?= $row['id_odt'];?>" class="table-button orange2">Modificar</a>
                            </td>
                            <td>
                                <a href="#" onclick="getId('<?= $row['id_odt'] ?>')" data-toggle="modal" data-target="#modalEliminar" class="table-button red2" >Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }

                    if (count($rows) == 0) {

                        ?>
                        <tr>

                            <td colspan="5">Este cliente no tiene cotizaciones guardadas
                            </td>
                        </tr>
                    <?php  }
                    ?>
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
</div>
<script>
    var id;

    function getId(id){

        this.id=parseInt(id);
    }

    $("#btnEliminar").click( function() {

        var url = location.href;
        var datos = url.split("/");
        datos = datos[6].split("=");
        $.ajax({

            type: "POST",
            url: "<?= URL ?>cotizador/deleteCotizacion/",
            data: {id: id},
            
            success: function(response) {
                
                if( response == "true" ){

                    location.href="<?=URL?>cotizador/guardadas/?c=" + datos[1];
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


    var cliente;

    $(document).ready(function () {

        $('#info').addClass('active-page');

        var wind = $(window).height() - 90;

        $('.table-cont').height(wind);
        $('.tablespace').height(wind - 120);
    

        $(window).keydown(function(event) {

            if(event.keyCode == 13) {

                event.preventDefault();
                return false;
            }
        });
    });


    $(window).resize(function () {

        //replyHeight();
    });
    

    $(document).on('click', '.remove', function () {

        this.closest('tr').remove();
        collectPrices();
        collectQty();
    });


    $(document).on('change', '.qty', function () {

        var id = $(this).data('id');

        aumentarManual(id);
        collectPrices();
        collectQty();
    });

    /*
    $(document).on('keyup', '#searcher', function () {

        var parameter = $(this).val();

        $.ajax({
            type:"POST",
            url:"<?=URL?>ventas/cambiosSearch",
            data:{param:parameter,filter:'<?=$title ?>'},

            success:function(data) {

                $('#inv-body').html(data);
            }
        });
    });
    */

    $(document).on('keyup', '.qty', function () {

        var id = $(this).data('id');

        aumentarManual(id);
        collectPrices();
        collectQty();
    });


    function addProduct(id,internalId) {

        if ($("#prod-" + id).length) {
        
            if(confirm('Deseas Agregar este producto otra vez?')) {

                aumentar(id);
            } else {

                return false;
            }
        } else {

            var wrapper = $('#customers');
            var price   = $('#' + id + '-precio').val();
            var stock   = $('#' + id + '-stock').val();
            var name    = $('#' + id + '-nombre').val();

            var new_prod = '<tr id="prod-' + id + '" class="temporal"><td class="delete"><img class="remove" src="../images/delete.png"></td>' + 
            '<td class="product-name">' + name + '</td>'+
            '<td><input type="number" name="cantidades[' + id + ']" class="qty" value="1" data-id="' + id + '"></td>' + 
            '<input type="hidden" name="productos[]" value="' + id + '">'+
            '<input type="hidden" name="productosId[' + id + ']" value="' + internalId + '">' +  
            '<input type="hidden" name="costos[' + id + ']" class="costo" value="' + price + '">' +
            '<input type="hidden" name="stocks[' + id + ']" value="' + stock + '">' + 
            '<input type="hidden" class="fixcosto" name="unitarios[' + id + ']" value="' + price + '">' + 
            '<td class="price">' + price + '</td></tr>';
            
            $(wrapper).append(new_prod);
        }
    
        //console.log($("#prod-"+id).length);
        collectQty();
        collectPrices();
    }


    function collectPrices() {
    
        var sum = 0;
    
        $('.costo').each(function() {

            var val = this.value;

            if (val == '') { 

                val = 0;
            }
            
            sum += parseFloat(val);
        });

        //var desc=$('#descu').val();
        //var conD = sum * parseFloat(desc);
        //var ConIva = (sum - conD) * 0.16;
        
        //var general=conD + ConIva;
        //var general=conD + ConIva;

        $('#pricetotal').html(sum.toFixed(2));
        $('#total-amount').html(sum.toFixed(2));
        $('#costo-total').val(sum.toFixed(2));
    }


    function collectQty() {

        var qty = $('#customers tr').length - 1;
        
        //var desc=$('#descu').val();
        //var conD = sum * parseFloat(desc);
        //var ConIva = (sum - conD) * 0.16;
        
        //var general=conD + ConIva;
        //var general=conD + ConIva;
        $('#totalqty').html(qty);
    }


    function aumentar(id) {

        var incease_price = $('#prod-' + id + ' .fixcosto').val();
        var increase_qty  = $('#prod-' + id + ' .qty').val();
        var aumento       = parseInt(increase_qty) + 1;

        console.log(aumento);

        $('#prod-' + id + ' .qty').val(aumento);
        
        //$('#prod-'+id+' .costo').val(parseInt(incease_price));
        $('#prod-' + id + ' .costo').val(parseInt(incease_price) * aumento);
        $('#prod-' + id + ' .price').html(parseInt(incease_price) * aumento);
        $('#costo-total').val(aumento);
    }


    function aumentarManual(id) {

        var incease_price = $('#prod-' + id + ' .fixcosto').val();
        var increase_qty  = $('#prod-' + id + ' .qty').val();
        var aumento       = parseInt(increase_qty);

        console.log(aumento);

        $('#prod-' + id + ' .qty').val(aumento);
        
        //$('#prod-'+id+' .costo').val(parseInt(incease_price));
        $('#prod-' + id + ' .costo').val(parseInt(incease_price) * aumento);
        $('#prod-' + id + ' .price').html(parseInt(incease_price) * aumento);
        $('#costo-total').val(aumento);
    }


    function getCategorie(id) {
    
        $.ajax({
            type:"POST",
            url:"search.php",
            data:{catego:id},
            
            success:function(data) {
            
                $('#searchresults').html(data);
            }
        });
    }


    function saveMovement() {

        event.preventDefault();

        var lenghts = $('[name="productos[]"]').length;

        if (lenghts > 0) {
    
            $.ajax({
            
                type:"POST",
                url:"checkout.php",
                data:$('#movimiento').serialize(),
                
                success:function(data) {
                
                    $('#searchresults').html(data);
                    $('.temporal').remove();
                    $('#total-amount').html(0.00);
                    $('#pricetotal').html(0.00);
                    $('#totalqty').html(0);
                }
            });
        } else {

            $('#formvacio').show();

            setTimeout(function() {

                $('#formvacio').hide();
            }, 3000);
        }
    }


    $(document).on('click', '.cambio-chekc', function () {

        var id = $(this).data('id');

        console.log('se envio');

        $.ajax({
            type:"POST",
            url:"<?=URL?>ventas/completeCambio",
            data:{id:id},
            dataType:"json",

            success:function(data) {

                console.log(data);

                if (data.logged == 'true') {

                    $('.popup').html(data.result);
                    $('.popup').fadeIn("slow");
                    $('#inv-body').html(data.html);
                    
                    setTimeout(function() {

                        $('.popup').fadeOut("slow");
                    }, 1500);
                }else{
                
                    location.reload();
                }
            }
        });
    });


    function closeModal(){

        $('.backdrop, .cotizador_box, .loader').animate({'opacity':'0'}, 300, 'linear', function() {

            $('.backdrop, .cotizador_box, .loader').css('display', 'none');
        });
    }


    function showModal(modalID) {

        $('.cotizador_box').animate({'opacity':'1'}, 300, 'linear');
        $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop, .cotizador_box').css('display', 'block');
    }


    $(document).on('click', '.nueva', function () {

        cliente = $(this).data('id');
        
        showModal();
    });


    $(document).on('click', '.image-option', function () {

        var tipo = $(this).data('tipo');

        location.href = '<?php echo URL; ?>cotizador/cajas/?cliente=' + cliente + '&tipo=' + tipo;
    });

</script>
