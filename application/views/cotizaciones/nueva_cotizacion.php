<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/cotizador.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/style.css">

<style type="text/css">

    #headingOne{

        background-color: #A6A6A6;
        cursor: pointer;
        border-radius: 6px; 
        text-align: center;
        font-family: monse-light;
        color: white;
        font-size: 18px;
        transition: background-color .5s;
    }

    #headingOne:hover{

        background-color: #909090
    }

    select{

        cursor: pointer;
        border: 1px #0F97CA solid;
        border-radius: 3px;
        height: 35px;
        width: 100%;
        background-color: white;
        color: #0F97CA;
        transition: background-color .5s;
        font-weight: bold;
    }

    select option{

        background-color: white;
        color: gray;
        transition: background-color .5s;
    }

    select:hover{

        background-color: #0F97CA;
        color: white;

    }

    p{

        color: #000;
    }
    .agregar1{

        display: block;
        border-radius: 6px;
        background-color: #2A9C3C;
        color: #fff;
        transition: background-color .3s;
    }
    .agregar1:hover{

        background-color: #1E8C30;
    }

    .seleccion {

        user-select: none;
        -moz-user-select: none; 
        -webkit-user-select: none;
        -ms-user-select: none;
        -khtml-user-select: none;
    }

    #btnEnviar{

        background-color: rgb(0, 45, 98);
        color: white;
        transition: background-color .5s;
    }
    #btnEnviar:hover{

        background-color: #001858;
    }

</style>

<?php

    foreach ($cliente as $row) {
        
        $nombreCliente = $row['nombre'];
    }
?>

<!-- contenido -->
<div class="container" style="display: flex; width: 100%; height: 100%; justify-content: center; align-items: center;">

    <div class="login-box2" style="border-color: #999;" >

        <div class="form-inner">

            <!-- CABECERA -->
            <div  style="margin-top: 10px; border-bottom: dashed 1px black;padding-bottom: 15px; border-top-left-radius: 15px; border-top-right-radius: 15px; display: flex; justify-content: center; align-items: center;" class="azulWhi">
                
                <h1 style="text-align:center;color:#fff;margin-top:20px;font-weight:normal;font-size:18px; text-transform: uppercase;">NUEVA COTIZACIÓN   <?= $nombreCliente ?></h1>
                <br>
            </div>

            <!-- CONTENIDO -->
            <div  style="border-bottom: dashed 1px black;padding-bottom: 15px;">
                
                <table class="table">
                    
                    
                </table>
            </div>

            <!--<button  class="login-button agregar1" style="margin-bottom: 10px; width: 70%; margin-left: auto; margin-right: auto;"> + AGREGAR </button>-->
            <div id="collapseOne" aria-labelledby="headingOne">
                        <div class="card-body" style="">
                            <table class="table" id="tblDetalle" style="display: block;">
                    
                                <tr style="background-color: #ACACAC;">
                                    
                                    <!--<td style=" border-right: 1px #999 solid; border-top-left-radius: 15px; width: 20%;">
                                        
                                        <p>ODT</p>
                                        
                                    </td>-->
                                    <td style=" border-right: 1px #999 solid; border-top-left-radius: 15px; width: 20%;">
                                        
                                        <p>CONCEPTO</p>
                                        
                                    </td>

                                    <td style=" border-right: 1px #999 solid; width: 10%;">
                                        
                                        <p>CANT.</p>
                                        
                                    </td>

                                    <td style="width: 12%;">
                                        
                                        <p>PRECIO</p>
                                        
                                    </td>
                                    <td style=" border-left: 1px #999 solid; width: 12%;">
                                        
                                        <p>TOTAL</p>
                                    </td>
                                    <td style=" border-left: 1px #999 solid; width: 12%;border-top-right-radius: 15px;">
                                        
                                        <p>ELIMINAR</p>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
            </div>

            <div  style="border-top: dashed 1px black;padding-bottom: 15px;">
                
                <table id="tblTotal" class="table">
                    
                    <tr id="trTotal">
                                    
                        <!--<td>
                            
                        </td>-->
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>

                        <td style=" border-left: 1px #999 dashed">
                            
                            <p id="lblTotalT">$0.00</p>
                            
                        </td>
                    </tr>
                </table>
            </div>

            <div class="btn-group" role="group" aria-label="Basic example" style="align-items: center; justify-content: center; display: flex; margin: 15px;">
                
                <button id="btnFacturas" type="button" class="btn btn-success"> AGREGAR </button>
                <button id="btnEnviar" type="button" class="btn">GUARDAR</button>
            </div>
        </div>
    </div>
</div>

<?php
    
    foreach ($porcentaje as $row ) {
        
        if( $row['nombre_aumento'] == 'IVA' ) {
?>

<script type="text/javascript">var ivaB = parseFloat(<?= round($row['porcentaje'],2)?>) </script>

<?php 
    
    break;
        }
    }    
?>

<!-- modal nueva especificacion -->
<div class="modal fade bd-example-modal-lg" id="modalNvaEsp" tabindex="-1" role="dialog" aria-labelledby="modalNvaEsp" aria-hidden="true">
      
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header azulWhi">

                <h5 class="modal-title" id="txtTitModCorrecto">AÑADIR ESPECIFICACIÓN</h5>

            </div>
    
            <div class="modal-body" style="height: 150px;">
                
                <table class="table" id="tblContenido" style="overflow: auto !important;">
                    
                    <tr>

                        <!--<th style="width: 15%; display: block;">

                            <label>ODT</label>

                        </th>-->

                        <th>

                            <label>Concepto</label>

                        </th>        
                        
                        <th style="width: 11%; display: block;">

                            <label>Cantidad</label>
                        </th>
                        <th style="width: 13% display: block;">

                            <label>Costo Unitario</label>
                        </th>
                        <th style="width: 11% display: block;">

                            <label>Subtotal</label>
                        </th>
                        <th style="width: 10% display: block;">

                            <label>IVA</label>
                        </th>
                        <th style="width: 10% display: block;">

                            <label>TOTAL</label>
                        </th>

                    </tr>

                    <tr>

                        <!--<th>

                            <input id="txtODT" type="text" placeholder="ODT" class="form-control text-md" id="inputZip">
                        </th>-->

                        <th>
                            <input class="form-control text-md" id="txtDescripcion" onkeyup="pegarTexto()" onblur ="prueba()" onmouseleave ="prueba()" placeholder="Concepto">
                            <label class="CellWithComment">
                                <span id="lblComentario" class="CellComment"></span>
                            </label>
                        </th>
                        <th>

                            <input id="txtCantidad" onkeypress="return soloNumeros(event);" onkeyup="costear();" type="text" placeholder="Cantidad" class="form-control text-md" id="inputZip">
                        </th>
                        <th>

                            <input id="txtPrecio" onkeypress="return soloNumeros(event);" onkeyup="costear(); insertar0('txtPrecio')" type="text" placeholder="$0.00" class="form-control text-md" id="inputZip">
                            
                        </th>
                        <th>

                            <label id="lblSubtotal">$0.00</label>
                        </th>
                        <th>

                            <label id="lblIVA">$0.00</label>
                        </th>
                        <th>

                            <label id="lblTotal">$0.00</label>
                        </th>
                    </tr>
                </table>
            </div>
    
            <div class="modal-footer">

                <button style="margin-left: auto; margin-right: auto;" type="button" data-dismiss="modal" class="btn azulWhi">Cerrar</button>
                <button id="btnAgregar" style="margin-left: auto; margin-right: auto;" type="button" class="btn btn-success">+ Agregar</button>
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

<!-- modal correcto -->
<div class="modal fade" id="modalCorrecto" tabindex="-1" role="dialog" aria-labelledby="modalError" aria-hidden="true">
    
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">

            <div class="modal-header azulWhi">

                <h5 class="modal-title" id="txtTituloModal">REGISTRO EXITOSO</h5>
            </div>
    
            <div class="modal-body">

                <label><img src="<?=URL?>public/img/correcto.gif" style="width: 120px; height: 90px">
                <label id="lblCorrecto" style="color: black; font-size: 1.1em"></label>
                <br>
                <label id="lblCont">Espere un Momento</label>
                <script type="text/javascript">
                    
                    puntos();
                    var i = 0;
                    function puntos(){

                        if( i >= 4 ){$("#lblCont").html("Espere un Momento");i=0;}
                        var time = setTimeout(function(){var texto = $("#lblCont").html();$("#lblCont").html(texto + ".");puntos();}, 1000);   
                        i++;                        

                    }
                </script>
            </div>
    
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    var arrFactura = [];
    var contador   = 0;
    var totalT     = 0;
    var subTotalT  = 0;
    var ivaT       = 0;


    function prueba(){

        $("#lblComentario").hide("slow");
    }

    function pegarTexto(){

        var texto = $("#txtDescripcion").val();
        
        if( texto.length > 0 ){

            $("#lblComentario").html(texto);
            $("#lblComentario").show("slow");
        }else{

            $("#lblComentario").hide("slow");
        }
    }

    function setTotal(){

        var anticipo = parseFloat($("#txtAnticipo").val());
        totalT = totalT - anticipo;
        $("#lblTotalT").val(totalT);
    }

    function showModError(texto) {

        $("#txtContenido").html(texto);
        $('#modalError').modal({backdrop: 'static', keyboard: false});
    }

    function showModCorrecto(texto) {

        $("#lblCorrecto").html(texto);

        $('#modalCorrecto').modal({backdrop: 'static', keyboard: false});
    }

    function costear(){

        var cantidad = parseInt($("#txtCantidad").val());
        var precio = parseFloat($("#txtPrecio").val());
        var iva = parseFloat(ivaB);

        if( !isNaN(cantidad) && !isNaN(precio) ){

            var subtotal = parseFloat(cantidad * precio);
            var iva = parseFloat( subtotal * iva );
            var total =  parseFloat(subtotal + iva);
            
            $("#lblSubtotal").html("$"+subtotal.toFixed(2));
            $("#lblIVA").html("$"+iva.toFixed(2));
            $("#lblTotal").html("$"+total.toFixed(2));
        }else{

            $("#lblTotal").html("$0.00");
        }
    }

    function insertar0(txtValor){
        
        var texto = $("#" + txtValor).val();
        if(texto == ".") $("#" + txtValor).val("0.");
        if(texto == "0") $("#" + txtValor).val("");
    }

    function soloNumeros(e){
        
        var key = window.event ? e.which : e.keyCode;
        
        if (key < 46 || key > 57 ) {

            e.preventDefault();
        }
    }

    $("#btnEnviar").click( function(){

        var total        = $("#lblTotalT").html();
        total = total.split("$");

        if( arrFactura.length == 0 ){ showModError("Debe de agregar por lo menos un Concepto."); return false; }

        var datos = [];
        
        var arrFactura_tmp = [];

        arrFactura_tmp = JSON.stringify(arrFactura, null, 4);
        cliente = parseInt("<?= $idCliente ?>");

        datos.push({ name: "idCliente" , value: cliente });
        datos.push({ name: "txtTotal" , value: total[1] });
        datos.push({ name: "arrFactura" , value: arrFactura_tmp });
        
        $.ajax({

            url: "<?= URL ?>cotizador/saveCotizacion",
            method: "POST",
            data: datos,
            success: function( respuesta ){

                console.log( respuesta );
                try{

                    respuesta = JSON.parse( respuesta );
                }catch(e){

                    showModError("Hubo un error al obtener la respuesta.");
                }
                
                if( respuesta == true ){

                    showModCorrecto("Los datos han sido guardados correctamente.");
                    var time = setTimeout( function(){ window.location = "<?= URL?>cotizador/getCotizacion" },2000);
                }else{

                    showModError("Hubo un error al insertar la cotización.");
                }
            },
        });
    });

    $("#btnAgregar").click( function(){

        arr_tmp      = [];
        var esp      = $("#txtDescripcion").val();
        var cantidad = parseInt($("#txtCantidad").val());
        var precio   = parseFloat($("#txtPrecio").val());
        var subtotal = $("#lblSubtotal").html();
        var total    = $("#lblTotal").html();
        var iva      = $("#lblIVA").html();
        //var odt = $("#txtODT").val();
        
        subtotal = subtotal.split("$");
        total = total.split("$");
        iva = iva.split("$");

        subtotal = subtotal[1]
        total = total[1]
        iva = iva[1]

        //if( odt.length == 0 ){ showModError("Ingrese una ODT."); return false; };
        if( esp.length == 0 ){ showModError("Ingrese una descripcion."); return false; };
        if( isNaN(cantidad) ){ showModError("Debe de ingresar un numero."); return false; };
        if( isNaN(precio) ){ showModError("Debe de ingresar un numero."); return false; };

        //arr_tmp.push({ name: "odt" , value: odt });
        arr_tmp.push({ name: "descripcion" , value: esp });
        arr_tmp.push({ name: "cantidad" , value: cantidad });
        arr_tmp.push({ name: "precio" , value: precio });
        arr_tmp.push({ name: "subtotal" , value: subtotal });
        arr_tmp.push({ name: "iva" , value: iva });
        arr_tmp.push({ name: "total" , value: total });

        arrFactura.push(arr_tmp);

        arr_tmp = [];

        $("#trTotal").remove();

        //<td style=" border-right: 1px #999 solid; "><p>' + odt +'</p></td>
        var detalle = '<tr class="detalle"><td style=" border-right: 1px #999 solid; "><p>' + esp + '</p></td><td style=" border-right: 1px #999 solid; "><p>' + cantidad + '</p></td><td style=" border-right: 1px #999 solid;"><p>' + "$" + precio + '</p></td><td style="display: none;"><p>' + subtotal + '</p></td><td style="display: none;"><p>' + iva + '</p></td><td style="border-right: 1px #999 dashed;"><p>' + total + '</p></td><td class="eliminar" style=" display: flex; align-items: center; justify-content: center"><img class="btnEliminar" src="<?= URL ?>public/img/tf.png" style="width: 25px; cursor: pointer" /></td></tr>';

        $("#tblDetalle").append(detalle);

        var totalT = sumaFactura(arrFactura);

        //<td></td>
        detalle = '<tr id="trTotal"><td></td><td></td><td></td><td></td><td style=" border-left: 1px #999 solid"><p id="lblTotalT">$' + totalT.toFixed(2) + '</p></td></tr>';

        $("#tblTotal").append(detalle);
        $("#modalNvaEsp").modal("hide");

        $("#txtDescripcion").val("");
        $("#txtCantidad").val("");
        $("#txtPrecio").val("");
        $("#lblSubtotal").html("$0.00");
        $("#lblTotal").html("$.00");
        $("#lblIVA").html("$0.00");
        //$("#txtODT").val("");

        console.log(arrFactura);
    });

    $(document).on("click", ".btnEliminar", function() {

        $(this).closest("tr").remove();

        $("#trTotal").remove();

        arrFactura = [];

        $("#tblDetalle .detalle").each(function(row, tr){

            var arr_tmp  = [];
            //var odt      = $(tr).find('td:eq(0) p').html();
            var esp      = $(tr).find('td:eq(0) p').html();
            var cantidad = parseInt($(tr).find('td:eq(1) p').html());
            var precio   = $(tr).find('td:eq(2) p').html();
            var subtotal = parseFloat($(tr).find('td:eq(3) p').html());
            var iva      = parseFloat($(tr).find('td:eq(4) p').html());
            var total    = $(tr).find('td:eq(5) p').html();
            
            precio = precio.split("$");
            precio = parseFloat(precio[1]);
            //arr_tmp.push({ name: "odt" , value: odt });
            arr_tmp.push({ name: "descripcion" , value: esp });
            arr_tmp.push({ name: "cantidad" , value: cantidad });
            arr_tmp.push({ name: "precio" , value: precio });
            arr_tmp.push({ name: "subtotal" , value: subtotal });
            arr_tmp.push({ name: "iva" , value: iva });
            arr_tmp.push({ name: "total" , value: total });

            arrFactura.push(arr_tmp);
        });

        var totalT = sumaFactura(arrFactura);

        //<td></td>
        detalle = '<tr id="trTotal"><td></td><td></td><td></td><td></td><td style=" border-left: 1px #999 solid"><p id="lblTotalT">$' + totalT.toFixed(2) + '</p></td></tr>';

        $("#tblTotal").append(detalle);
        console.log(arrFactura);
    });

    $("#btnFacturas").click( function(){

        $("#modalNvaEsp").modal("show");
    });

    function sumaFactura(arrFactura){

        var totalT = 0;

        for( var i=0; i < arrFactura.length; i++ ){

            totalT += parseFloat(arrFactura[i][5]['value']);
        }

        return totalT;
    }
</script>
