<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/cotizador.css">
<style type="text/css">

    .cajas-col-input input:not(.chk):not(.mailname):not(.mailserver){

        width: 95%!important;
    }

    .cajas-col-input select:not(.mailserver){

        width: 95%!important;
    }

    .filediv{

        font-size: 14px;
    }

    #new_price{

        width: 200px;
        display: inline-block;
        margin-left: 5px;
        background:#FFF8C4;
        text-align: left;
    }


    @media all and (max-width : 735px) {

        .checkboxer label {
            
            left: 85%;
        }
    }


    @media all and (max-width : 680px) {

        .checkboxer label {
      
            left: 65%;
        }
    }


    @media all and (max-width : 415px) {

        .checkboxer label {
      
            left: 85%;
        }

        #odt {
      
            width: 100%;
        }

        .cajas-col-input{
        
            width: 100%;
        }
    }


    @media all and (max-width : 380px) {

        .checkboxer label {
      
            left: 95%;
        }
    }


    @media all and (max-width : 330px) {

        .checkboxer label {
      
            left: 110%;
        }
    }


    .login-input {

        margin-top: 5px; 
        text-align: left;
    }

    .cajas-col-input p {

        text-align: left;
    }

    .checkboxer label {

        width: auto;
        left: 48px;
        font-size: 12px;
    }

    .checkboxer {

        width: 100px;
    }

    .checks {

        width: 20px;
        height: 20px;
    }

    .envio{

        background-color: white;
        display: block;
        margin-bottom: 10px;
        border-color: #1F438B;
        height: 38px;
        width: 40%;
        margin-left: auto;
        margin-right: auto;
        border-radius: 5px;
        color: #1F438B;
        text-align: center;
        font-weight:normal;font-size:18px;
        text-transform: uppercase;
        cursor: pointer;
        transition: background-color .3s;
    }
    .envio:hover{

        background-color: #1F438B;
        color: white;
    }

    p{

        color: #000;
    }

    label{

        text-align: center;
    }
</style>

<div class="container" style="display: flex; width: 100%; height: 100%; justify-content: center; align-items: center;">

    <div class="login-box2" style="border-color: #1F438B; border-right: 18px #1F438B solid;">

        <div class="form-inner">


            <div  style="margin-top: 10px; padding-bottom: 15px; border-top-left-radius: 15px; border-top-right-radius: 15px; display: flex; justify-content: center; align-items: center;">
                <label><img src="<?=URL?>public/img/clientes.png" style="width: 80%;"></label>
                
                <br>
            </div>

            <div>
                <table class="table" style=" border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    
                    <tr>
                        
                        <th>
                            
                            <label>Nombre
                            <input id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" class="login-input" style="" required="" /></label>
                        </th>
                        <th>
                            
                            <label>Telefono
                            <input id="txtTelefono" name="txtTelefono" type="text" placeholder="Telefono" class="login-input" style="" /></label>
                        </th>

                        <th>
                            
                            <label>email
                            <input id="txtEmail" name="txtEmail" type="text" placeholder="Email" class="login-input"  style="" /></label>
                        </th>
                    </tr>
                </table>
            </div>
            
            <div style="margin-top: 10px; padding-bottom: 15px;display: flex; justify-content: center; align-items: center; border-bottom: 1px #1F438B solid">
                
                <h1 style="text-align:center;margin-top:20px;font-weight:normal;font-size:18px; text-transform: uppercase; ">DATOS FISCALES</h1>
                <br>
            </div>

            <div>
                
                <table class="table" style=" border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                    
                    <tr>
                        
                        <th colspan="2">
                            
                            <label>Razon Social
                            <input id="txtRS" name="txtRS" type="text" placeholder="Razon Social" class="login-input" style="" required="" /></label>
                        </th>
                        <th>
                            
                            <label>RFC
                            <input id="txtRFC" onkeydown ="checkLength();" name="txtRFC" type="text" placeholder="RFC" class="login-input" /></label>
                        </th>
                        
                    </tr>
                    <tr>

                        <th>
                            
                            <label>Calle
                            <input id="txtCalle" name="txtCalle" type="text" placeholder="Calle" class="login-input" style="" /></label>
                        </th>
                        <th>
                            
                            <label>Colonia
                            <input id="txtColonia" name="txtColonia" type="text" placeholder="Colonia" class="login-input"  style="" /></label>
                        </th>
                        <th>
                            
                            <label>N° Exterior
                            <input id="txtNExterior" name="txtNExterior" type="text" placeholder="N° Exterior" class="login-input text-md"  style="" /></label>
                        </th>
                        <th>
                            
                            <label>N° Interior
                            <input id="txtNInterior" name="txtNInterior" type="text" placeholder="N° Interior" class="login-input text-md" style="" /></label>
                        </th>
                    </tr>
                    <tr>
                        
                        <th>
                            
                            <label>Codigo Postal
                            <input id="txtCP" name="txtCP" type="text" placeholder="Codigo Postal" class="login-input" style="" /></label>
                        </th>
                        <th>
                            
                            <label>Estado
                            <input id="txtEstado" name="txtEstado" type="text" placeholder="Estado" class="login-input"  style="" /></label>
                        </th>
                        <th>
                            
                            <label>Delegacion
                            <input id="txtDelegacion" name="txtDelegacion" type="text" placeholder="Delegacion" class="login-input" style="" /></label>
                        </th>
                        
                    </tr>
                </table>
            </div> 
            <button type="submit" id="btnEnviar" name="btnEnviar" class="login-input envio" style="margin-bottom: 10px; text-align: center;">REGISTRAR</button>
        </div>
    </div>
</div> 

<div class="backdrop"></div>

<!-- imagen cargando -->
<div class="loader">

    <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>

<!-- modal box -->
<div class="box">

    <div class="saveloader">

        <div class="closer" onclick="close_box();">X</div>
    
        <img src="../images/recibo.jpg" />
        <p style="text-align: center; font-weight: bold;"><a href="#">Click aqui si no tienes recibo</a></p>
    </div>
    
    <div class="savesucces" style="display: none;">

        <img src="images/success.png">
        <p style="text-align: center; font-weight: bold;">Listo!</p>
    </div>
</div>

<!-- modal error -->
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

                <h5 class="modal-title" id="txtTituloModal">Correcto</h5>
            </div>
    
            <div class="modal-body">

                <label><img src="<?=URL?>public/img/correcto.gif" style="width: 120px; height: 90px">
                <label id="lblCliente" style="color: black; font-size: 1.1em">Se Registró exitosamente el cliente: </label>
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

<div class="popup" style="display: none;">

<script>

    function mostrarError(proceso) {

        $("#txtContenido").html(proceso);

        $('#modalError').modal({backdrop: 'static', keyboard: false});
    }

    function mostrarLoad(){

        $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop').css('display', 'absolute');
        $('.loader').show();
    }

    function ocultarLoad(){

        $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop').css('display', 'none');
        $('.loader').hide();
    }

    function checkLength(){

        var text = $("#txtRFC").val();
        if(text.length > 14){

            var texto1 = text.slice(0,-1);
            $("#txtRFC").val(texto1);
        }
    }

    $("#btnEnviar").click( function (){

        var datos = [];
        var nombre    = $("#txtNombre").val();
        var email     = $("#txtEmail").val();
        var telefono  = parseInt($("#txtTelefono").val());
        var rSocial   = $("#txtRS").val();
        var cp        = $("#txtCP").val();
        var calle     = $("#txtCalle").val();
        var colonia   = $("#txtColonia").val();
        var nInterior = $("#txtNInterior").val();
        var nExterior = $("#txtNExterior").val();
        var delegacion = $("#txtDelegacion").val();
        var estado    = $("#txtEstado").val();
        var rfc       = $("#txtRFC").val();

        var respuesta = checkClient(nombre);
        if( respuesta ) return false;
        
        if( nombre.length <= 0 || email.length <= 0 ) { mostrarError("Ingrese todos los parametros para continuar");return false };
        datos.push({name: "txtNombre", value: nombre});
        datos.push({name: "txtEmail", value: email});
        datos.push({name: "txtTelefono", value: telefono});
        datos.push({name: "txtRS", value: rSocial});
        datos.push({name: "txtCP", value: cp});
        datos.push({name: "txtCalle", value: calle});
        datos.push({name: "txtColonia", value: colonia});
        datos.push({name: "txtNInterior", value: nInterior});
        datos.push({name: "txtNExterior", value: nExterior});
        datos.push({name: "txtDelegacion", value: delegacion});
        datos.push({name: "txtEstado", value: estado});
        datos.push({name: "txtRFC", value: rfc});

        email = email.split("@");
        var extencion = email[1];

        if( isNaN( telefono ) ) { mostrarError("Debe de ingresar un número de telefono."); return false };
        if( !extencion ) { mostrarError("Debe de ingresar una extencion correcta.<br> Ejemplo: <br>@outlook.com.<br>@gmail.com.<br>@hotmail.com.");return false };
        mostrarLoad();
        $.ajax({

            type:"POST",
            url: "<?= URL?>cotizador/newCliente",   
            data: datos, 
            //dataType:"json",  

            success:function(response) { 

                console.log(response);
                try{

                    response = JSON.parse(response);
                    if( response == true ){

                        var texto = $("#lblCliente").html();
                        $("#lblCliente").html(texto + nombre);
                        $("#modalCorrecto").modal("show");
                        ocultarLoad();
                        var time = setTimeout( function(){ window.location = "<?= URL?> cotizador/clientes" },2000);
                    }else{

                        ocultarLoad();
                        mostrarError("Hubo un Error al registrar el cliente.");
                    }
                }catch(e){

                    ocultarLoad();
                    mostrarError("Error al leer respuesta");
                }
            }  
        });    
    });

    function checkClient(nombre){

        datos = [];
        datos.push({name: "nombre", value: nombre});
        $.ajax({

            method: "POST",
            url: "<?= URL ?>cotizador/checkClient",
            data: datos,

            success:function(response) {

                console.log(response);
                try{

                    var respuesta = JSON.parse(response);

                    if( respuesta ){

                        mostrarError("Ya existe un cliente con ese nombre. <br>Por favor elija otro nombre");
                        return false;
                    }else{

                        return true;                        
                    }
                }catch( e ){

                    mostrarError("Hubo un error al verificar cliente existente.");
                    return true;
                }
            }
        });
    }

</script>
