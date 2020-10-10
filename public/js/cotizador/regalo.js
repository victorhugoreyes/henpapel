
// matriz de Impresiones
var aImpEC  = [];
var aImpFC  = [];
var aImpET  = [];
var aImpFT  = [];

// matriz de acabados
var aAcbEC  = [];
var aAcbFC  = [];
var aAcbET  = [];
var aAcbFT  = [];

// matriz de cierres y accesorios y bancos
var aCierres    = [];
var aAccesorios = [];
var aBancos     = [];

//se aloja las impresiones o acabados. No borrar.
var divisionesImps = "";
var divisionesAcbs = "";

//para descuento
var descuento = 0;

var cliente = "";
var url     = "";

jQuery214(".chosen").chosen();

function setClient( cliente ){

    this.cliente = cliente;
}

function setURL( url ){

    this.url = url;
}

function emptyTables(){

    $('#table_adicionales_tr').empty();
    $('#resumenEC').empty();
    $('#resumenFC').empty();
    $('#resumenET').empty();
    $('#resumenFT').empty();
    $('#resumenCartones').empty();
    $('#resumenOtros').empty();
    $("#resumenHead").empty();
    $("#resumenMensajeria").empty();
    $("#resumenEmpaque").empty();
    $('#resumenEncuadernacion').empty();
    $('#table_papeles_tr').empty();
    $('#proceso_offset_M1').hide();
    $('#proceso_serigrafia_M1').hide();
    $('#proceso_digital_M1').hide();
    $('#table_proc_offset').empty();
    $('#table_proc_serigrafia').empty();
    $('#table_proc_digital').empty();
    $('#proceso_hs_M1').hide();
    $('#proceso_grab_M1').hide();
    $('#proceso_lam_M1').hide();
    $('#proceso_suaje_M1').hide();
    $('#proceso_laser_M1').hide();
    $('#proceso_barnizuv_M1').hide();
    $('#table_proc_HS').empty();
    $('#table_proc_Grab').empty();
    $('#table_proc_Lam').empty();
    $('#table_proc_Suaje').empty();
    $('#table_proc_Laser').empty();
    $('#table_proc_BarnizUV').empty();
    $('#bancos').hide();
    $('#tabla_bancos').empty();
    $('#resumenBancos').empty();
    $('#divCierres').hide();
    $('#tabla_cierres').empty();
    $('#resumenCierres').empty();
    $('#divAccesorios').hide();
    $('#tabla_accesorios').empty();
    $('#resumenAccesorios').empty();
}

//funciona para decir a que tabla se apendizara, se ocupa en modcajacircular
function setTableBtn(texto, impAcb){

    switch(texto){

        case "ECaj":
            return 'list'+impAcb+'EC';
        break;

        case "FCaj":
            return 'list'+impAcb+'FC';
        break;

        case "ETap":
            return 'list'+impAcb+'ET';
        break;

        case "FTap":
            return 'list'+impAcb+'FT';
        break;
    }
}

//funciones para circular como modcajacircular
function vacioModalBancos() {

    document.getElementById('SelectBanEmp').value = "selected";

    document.getElementById('llevasuajemodBanco').style.display = "none";

    document.getElementById('SelectSuajeBanco').value = "No";
    document.getElementById('LargoBanco').value       = 1;
    document.getElementById('AnchoBanco').value       = 1;
    document.getElementById('ProfundidadBanco').value = 1;
}

function vacioModalAccesorios() {

    document.getElementById('LargoAcc').value = 1;
    document.getElementById('AnchoAcc').value = 1;

    document.getElementById('SelectAccesorio').value = "selected";
    document.getElementById('SelectHerraje').value   = "selected";
    document.getElementById('SelectColor').value     = "selected";

    $('#opColores').hide('slow');
    $('#opMedidas').hide('slow');
    $('#opHerraje').hide('slow');
    $('#opOjillo').hide('slow');
    $('#alerterror7').empty();
}


function revisarPropiedades(variable, texto){

    if( variable == null || variable == "" || variable == undefined ){

        showModError("");
        $("#txtContenido").html();
        $("#txtContenido").html("Ingrese " + texto);
        return false;
    }
}

function revisarImpAcb(){

    if( aImpEC.length == 0 && aImpFC.length == 0 && aImpET.length == 0 && aImpFT.length == 0 && aAcbEC.length == 0 && aAcbFC.length == 0 && aAcbET.length == 0 && aAcbFT.length == 0 ){

        showModError("");
        $("#txtContenido").html();
        $("#txtContenido").html("Ingrese por lo menos un proceso");
        return false;
    }
}

function appndImp( aImp, lblaImp ){

    if ( aImp == undefined ) return false;
    if ( aImp['Offset'] !== undefined ) var offset        = aImp['Offset'];
    if ( aImp['maquila'] !== undefined ) var offsetMaquila = aImp['maquila'];
    if ( aImp['Digital'] !== undefined ) var digital       = aImp['Digital'];
    if ( aImp['Serigrafia'] !== undefined )var serigrafia    = aImp['Serigrafia'];
    
    var titulo        = insrtTitulo(lblaImp);
    var tabla         = "";

    if( offset ){

        for( var i = 0; i < offset.length; i++ ){

            var cantidad  = offset[i]['cantidad'];
            var tintas    = offset[i]['num_tintas'];
            var tipo      = offset[i]['tipo_offset'];
            var cULam     = offset[i]['costo_unitario_laminas'];
            var cTLam     = offset[i]['costo_tot_laminas'];
            var cUArr     = offset[i]['costo_unitario_arreglo'];
            var cTArr     = offset[i]['costo_tot_arreglo'];
            var cUTir     = offset[i]['costo_unitario_tiro'];
            var cTTir     = offset[i]['costo_tiro'];
            var total     = parseFloat(offset[i]['costo_tot_proceso']);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>$'+ cULam +'</td><td>$'+ cTLam +'</td></tr><tr><td>Arreglo</td><td>$'+ cUArr +'</td><td>$'+ cTArr +'</td></tr><tr><td>Tiro</td><td>$'+ cUTir +'</td><td>$'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

                $('#table_proc_offset').append(tr);
                $('#proceso_offset_M1').show();

                var trResumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

                $('#resumen'+lblaImp).append(trResumen);
        }
    }else{

        if( offsetMaquila !== undefined ){

            for( var i = 0; i < offsetMaquila.length; i++ ){
                
                var cantidad  = offsetMaquila[i]['cantidad'];
                var tintas    = offsetMaquila[i]['num_tintas'];
                var tipo      = offsetMaquila[i]['Tipo'];
                var cULam     = offsetMaquila[i]['costo_unitario_laminas'];
                var cTLam     = offsetMaquila[i]['costo_laminas'];
                var cUArr     = offsetMaquila[i]['arreglo_costo_unitario'];
                var cTArr     = offsetMaquila[i]['arreglo_costo'];
                var total     = parseFloat(offsetMaquila[i]['costo_tot_proceso']);

                var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ cULam +'</td><td>'+ cTLam +'</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

                $('#table_proc_offset').append(tr);

                $('#proceso_offset_M1').show();

                var trResumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

                $('#resumen'+lblaImp).append(trResumen);
            }
        }
    }

    if( digital ){

        for( var i = 0; i < digital.length; i++ ){

            var cantidad = digital[i]['cantidad'];
            var cUDig    = digital[i]['costo_unitario'];
            var cTDig    = digital[i]['costo_tot_proceso'];
            var cabe     = digital[i]['cabe_digital'];
            if ( cabe == "NO" ){

                var tr = '';
            }else{

                var tr = '<tr><td colspan="4" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Costo Total</td></tr><tr><td>'+ cantidad +'</td><td>$'+ cUDig +'</td><td>$'+ cTDig +'</td></tr><tr><td colspan="4"></td></tr>';
            }
            
            $('#table_proc_digital').append(tr);

            $('#proceso_digital_M1').show();

            var trResumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ cTDig +'<input type="hidden" class="pricesresumenempalme" value="'+ cTDig +'"></td><td></td></tr>';

            $('#resumen'+lblaImp).append(trResumen);
        }
    }

    if( serigrafia ){

        for( var i = 0; i < serigrafia.length; i++ ){

            var cantidad  = serigrafia[i]['cantidad'];
            var tintas    = serigrafia[i]['num_tintas'];
            var tipo      = serigrafia[i]['tipo'];
            var cUArr     = serigrafia[i]['costo_unit_arreglo'];
            var cTArr     = serigrafia[i]['costo_arreglo'];
            var cUTir     = serigrafia[i]['costo_unitario_tiro'];
            var cTTir     = serigrafia[i]['costo_tiro'];
            var total     = parseFloat(serigrafia[i]['costo_tot_proceso']);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>$'+ cUArr +'</td><td>$'+ cTArr +'</td></tr><tr><td>Tiro</td><td>$'+ cUTir +'</td><td>$'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_serigrafia').append(tr);

            $('#proceso_serigrafia_M1').show();

            var trResumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaImp).append(trResumen);
        }
    }
}

function changeData(url){

    $("#dataForm").prop("action","");
    $("#dataForm").prop("action", url);
}

/*la funcion appndImp con 3 argumentos es para la modificación y apendizacion
del mismo*/
function appndImpMod( aImp, lblaImp, arrPrincipal ){


    if ( aImp == undefined ) return false;
    if ( aImp['Offset'] !== undefined ) var offset        = aImp['Offset'];
    if ( aImp['maquila'] !== undefined ) var offsetMaquila = aImp['maquila'];
    if ( aImp['Digital'] !== undefined ) var digital       = aImp['Digital'];
    if ( aImp['Serigrafia'] !== undefined )var serigrafia    = aImp['Serigrafia'];
    
    var titulo        = insrtTitulo(lblaImp);
    var tabla         = "";

    if( offset ){

        for( var i = 0; i < offset.length; i++ ){


            var cantidad  = offset[i]['cantidad'];
            var tintas    = offset[i]['num_tintas'];
            var tipo      = offset[i]['tipo_offset'];
            var cULam     = offset[i]['costo_unitario_laminas'];
            var cTLam     = offset[i]['costo_tot_laminas'];
            var cUArr     = offset[i]['costo_unitario_arreglo'];
            var cTArr     = offset[i]['costo_tot_arreglo'];
            var cUTir     = offset[i]['costo_unitario_tiro'];
            var cTTir     = offset[i]['costo_tiro'];

            if( cTTir == undefined ) {

                cTTir = offset[i]['costo_tot_tiro'];
                tipo  = offset[i]['tipo'];

                id =0;
                tabla = setTableBtn(lblaImp,'Imp');
            }

            var imp  = '<tr><td class="textImp">Offset</td><td style="display: none">'+ id +'<input name="IDopImpSerEmp" style="display:none" type="hidden" value="'+ id +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td class="tintasImp" style="display: none;">'+ tintas +'<input name="tintasselSerEmp" type="hidden" value="'+ tintas +'"></td><td class="tipoSeri" style="display: none;">'+ tipo +'<input name="tipoSeriEmp" type="hidden" value="'+ id +'"></td><td class="' + tabla +' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_impresion": "Offset", "tintas": tintas, "tipo_offset": tipo, "IDopImp": id, "idtipoOff": id});

            $("#"+tabla).append(imp);

            var total     = parseFloat(offset[i]['costo_tot_proceso']);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ cULam +'</td><td>'+ cTLam +'</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

                $('#table_proc_offset').append(tr);

                $('#proceso_offset_M1').show();

                var trResumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

                $('#resumen'+lblaImp).append(trResumen);
        }
    }else{

        if( offsetMaquila !== undefined ){

            for( var i = 0; i < offsetMaquila.length; i++ ){
                
                var cantidad  = offsetMaquila[i]['cantidad'];
                var tintas    = offsetMaquila[i]['num_tintas'];
                var tipo      = offsetMaquila[i]['Tipo'];
                var cULam     = offsetMaquila[i]['costo_unitario_laminas'];
                var cTLam     = offsetMaquila[i]['costo_laminas'];
                var cUArr     = offsetMaquila[i]['arreglo_costo_unitario'];
                var cTArr     = offsetMaquila[i]['arreglo_costo'];
                var total     = parseFloat(offsetMaquila[i]['costo_tot_proceso']);

                var imp  = '<tr><td class="textImp">Offset</td><td style="display: none">'+ id +'<input name="IDopImpSerEmp" style="display:none" type="hidden" value="'+ id +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td class="tintasImp" style="display: none;">'+ tintas +'<input name="tintasselSerEmp" type="hidden" value="'+ tintas +'"></td><td class="tipoSeri" style="display: none;">'+ tipo +'<input name="tipoSeriEmp" type="hidden" value="'+ id +'"></td><td class="' + tabla +' img_delete"></td></tr>';

                arrPrincipal.push({"Tipo_impresion": "Offset", "tintas": tintas, "tipo_offset": tipo, "IDopImp": id, "idtipoOff": id});

                $("#"+tabla).append(imp);

                var total     = parseFloat(offset[i]['costo_tot_proceso']);

                var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ cULam +'</td><td>'+ cTLam +'</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

                $('#table_proc_offset').append(tr);

                $('#proceso_offset_M1').show();

                var trResumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ total +'</td><td></td></tr>';

                $('#resumen'+lblaImp).append(trResumen);
            }
        }
    }

    if( digital ){

        for( var i = 0; i < digital.length; i++ ){

            var cantidad = digital[i]['cantidad'];
            var cUDig    = digital[i]['costo_unitario'];
            var cTDig    = digital[i]['costo_tot_proceso'];
            var cabe     = digital[i]['cabe_digital'];

            if( cantidad == undefined ){

                cantidad = digital[i]['tiraje'];
                tipo     = digital[i]['impresion'];
                id = 0;

                tabla = setTableBtn(lblaImp,'Imp');
            }

            var imp  = '<tr><td class="textImp">Digital</td><td style="display: none"><input  name="IDopImpDiEmp" type="hidden" value="'+ id +'"></td><td class="CellWithComment" >...<span class="CellComment">Tipo: ' + tipo + '</span></td><td class="tipoDig" style="display: none;">'+ tipo +'<input name="tipoDigEmp" type="hidden" value="'+ id +'"></td><td class="' + tabla +' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_impresion": "Digital", "tipo_digital": tipo, "idtipoDig": id});

            $("#"+tabla).append(imp);

            if ( cabe == "NO" ){

                var tr = '';
            }else{

                var tr = '<tr><td colspan="4" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Costo Total</td></tr><tr><td>'+ cantidad +'</td><td>'+ cUDig +'</td><td>$'+ cTDig +'<input type="hidden" class="prices" value=" '+ cTDig +'"></td></tr><tr><td colspan="4"></td></tr>';
            }
            

            $('#table_proc_digital').append(tr);

            $('#proceso_digital_M1').show();

            var trResumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ cTDig +'<input type="hidden" class="pricesresumenempalme" value="'+ cTDig +'"></td><td></td></tr>';

            $('#resumen'+lblaImp).append(trResumen);
        }
    }

    if( serigrafia ){

        for( var i = 0; i < serigrafia.length; i++ ){

            var cantidad  = serigrafia[i]['cantidad'];
            var tintas    = serigrafia[i]['num_tintas'];
            var tipo      = serigrafia[i]['tipo'];
            var cUArr     = serigrafia[i]['costo_unit_arreglo'];
            var cTArr     = serigrafia[i]['costo_arreglo'];
            var cUTir     = serigrafia[i]['costo_unitario_tiro'];
            var cTTir     = serigrafia[i]['costo_tiro'];
            var total     = parseFloat(serigrafia[i]['costo_tot_proceso']);


            if( cantidad == undefined ){

                cantidad = serigrafia[i]['tiraje'];
                cUTir    = serigrafia[i]['costo_unitario_tiro'];
                cUTir    = serigrafia[i]['costo_unit_tiro'];
                id       = 0;
                tabla    = setTableBtn(lblaImp,'Imp');
            }

            var imp  = '<tr><td class="textImp">Serigrafia</td><td style="display: none">'+ id +'<input name="IDopImpSerEmp" style="display:none" type="hidden" value="'+ id +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td class="tintasImp" style="display: none;">'+ tintas +'<input  name="tintasselSerEmp" type="hidden" value="'+ tintas +'"></td><td class="tipoSeri" style="display: none;">'+ tipo +'<input name="tipoSeriEmp" type="hidden" value="'+ id +'"></td><td class="' + tabla +' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_impresion": "Serigrafia",  "tintas": tintas, "tipo_offset": tipo, "IDopImp": id, "idtipoSeri": id});
            $("#"+tabla).append(imp);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_serigrafia').append(tr);

            $('#proceso_serigrafia_M1').show();

            var trResumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaImp).append(trResumen);
        }
    }
}


function insrtTitulo(lbl){

    var titulo = "";

    switch( lbl ){

        case "EC":

            titulo = "Empalme Cajón";
        break;

        case "FC":

            titulo = "Forro Cajón";
        break;

        case "ET":
        
            titulo = "Empalme Tapa";
        break;

        case "FT":
        
            titulo = "Forro Tapa";
        break;
    }

    return titulo;
}

function appndAcb( aAcb, lblaAcb ){

    var arrAcbTmp =[];

    var titulo = insrtTitulo(lblaAcb);

    if ( aAcb == undefined ) return false;

    var barniz      = aAcb['Barniz_UV'];
    var laser       = aAcb['Corte_Laser'];
    var grabado     = aAcb['Grabado'];
    var hotStamping = aAcb['HotStamping'];
    var laminado    = aAcb['Laminado'];
    var suaje       = aAcb['Suaje'];

    if ( barniz !== undefined ) {

        for (var i = 0; i < barniz.length ; i++) {

            var nombre = "Barniz UV";
            var tipo   = barniz[i]['tipoGrabado'];
            var largo  = barniz[i]['Largo'];
            var ancho  = barniz[i]['Ancho'];
            var cUnitario  = barniz[i]['costo_unitario'];
            var total  = barniz[i]['costo_tot_proceso'];

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ cUnitario +'</td><td>$'+ total +'</td></tr><tr><td colspan="2"></td></tr>';

            $('#table_proc_BarnizUV').append(tr);

            $('#proceso_barnizuv_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);
        }   
    }

    if ( laser !== undefined ) {

        //arrAcbTmp[i++]['nombre']     = "Laser";
        for (var i = 0; i < laser.length ; i++) {

            var nombre = "Corte Laser";
            var tipo   = laser[i]['tipo_grabado'];
            var largo  = laser[i]['Largo'];
            var ancho  = laser[i]['Ancho'];
            var cUnitario  = laser[i]['costo_unitario'];
            var total  = laser[i]['costo_tot_proceso'];

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo + 'x' + ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ cUnitario +'</td><td>$'+ total +'</td></tr><tr><td colspan="2"></td></tr>';
            
            $('#table_proc_Laser').append(tr);

            $('#proceso_laser_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);
        }
    }

    if ( grabado !== undefined ) {

        for (var i = 0; i < grabado.length ; i++) {

            var nombre    = "Grabado";
            var tipo      = grabado[i]['tipoGrabado'];
            var largo     = grabado[i]['Largo'];
            var ancho     = grabado[i]['Ancho'];
            var ubicacion = grabado[i]['ubicacion'];
            var cUPlaca   = grabado[i]['placa_costo_unitario'];
            var cTPlaca   = grabado[i]['placa_costo'];
            var cUArr     = grabado[i]['arreglo_costo_unitario'];
            var cTArr     = grabado[i]['arreglo_costo'];
            var total     = grabado[i]['costo_tot_proceso'];
            var cUTir     = grabado[i]['costo_unitario'];
            var cTTir     = grabado[i]['costo_tiro'];

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td><td>Ubicacion: '+ ubicacion +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>$'+ cUPlaca +'</td><td>$'+ cTPlaca +'</td></tr><tr><td>Arreglo</td><td>$'+ cUArr +'</td><td>$'+ cTArr +'</td></tr><tr><td>Tiro</td><td>$'+ cUTir +'</td><td>$'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_Grab').append(tr);

            $('#proceso_grab_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);

        }
    }

    if ( hotStamping !== undefined ) {

        for (var i = 0; i < hotStamping.length ; i++) {

            var nombre    = "Hot Stamping";
            var tipo      = hotStamping[i]['tipoGrabado'];
            var largo     = hotStamping[i]['Largo'];
            var ancho     = hotStamping[i]['Ancho'];
            var color     = hotStamping[i]['Color'];
            //var ubicacion = aAcb['HotStamping'][i]['ubicacion'];
            var cUPlaca   = hotStamping[i]['placa_costo_unitario'];
            var cTPlaca   = hotStamping[i]['placa_costo'];
            var cUPel     = hotStamping[i]['pelicula_costo_unitario'];
            var cTPel     = hotStamping[i]['pelicula_costo'];
            var cUArr     = hotStamping[i]['arreglo_costo_unitario'];
            var cTArr     = hotStamping[i]['arreglo_costo'];
            var total     = hotStamping[i]['costo_tot_proceso'];
            var cUTir     = hotStamping[i]['costo_unitario'];
            var cTTir     = hotStamping[i]['costo_tiro'];

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Color: '+ color +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>$'+ cUPlaca +'</td><td>$'+ cTPlaca +'</td></tr><tr><td>Pelicula</td><td>$'+ cUPel +'</td><td>$'+ cTPel +'</td></tr><tr><td>Arreglo</td><td>$'+ cUArr +'</td><td>$'+ cTArr +'</td></tr><tr><td>Tiro</td><td>$'+ cUTir +'</td><td>$'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_HS').append(tr);

            $('#proceso_hs_M1').show();

            var trResumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);  
        }
    }

    if ( laminado !== undefined ) {

        for (var i = 0; i < laminado.length ; i++) {

            var nombre    = "Laminado";
            var tipo      = laminado[i]['tipoGrabado'];
            var largo     = laminado[i]['Largo'];
            var ancho     = laminado[i]['Ancho'];
            var total     = laminado[i]['costo_tot_proceso'];
            var costo     = laminado[i]['costo_unitario'];

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ total +'</td></tr><tr><td colspan="2"></td></tr>';

            $('#table_proc_Lam').append(tr);

            $('#proceso_lam_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);
        }
    }

    if ( suaje !== undefined ) {

        for (var i = 0; i < suaje.length ; i++) {

            var nombre    = "Suaje";
            var tipo      = suaje[i]['tipoGrabado'];
            var largo     = suaje[i]['Largo'];
            var ancho     = suaje[i]['Ancho'];
            var total     = suaje[i]['costo_tot_proceso'];
            var costo     = suaje[i]['costo_unitario'];
            var cUArr     = suaje[i]['costo_unitario_arreglo'];
            var cTArr     = suaje[i]['arreglo'];
            var cUTir     = suaje[i]['tiro_costo_unitario'];
            var cTTir     = suaje[i]['costo_tiro'];

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>$'+ cUArr +'</td><td>$'+ cTArr +'</td></tr><tr><td>Tiro</td><td>$'+ cUTir +'</td><td>$'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_Suaje').append(tr);

            $('#proceso_suaje_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen );      
        }
    }
}

function appndAcbMod( aAcb, lblaAcb, arrPrincipal ){

    if ( aAcb == undefined ) return false;
    
    var barniz      = aAcb['Barniz'];
    var laser       = aAcb['Laser'];
    var grabado     = aAcb['Grabado'];
    var hotStamping = aAcb['HotStamping'];
    var laminado    = aAcb['Laminado'];
    var suaje       = aAcb['Suaje'];

    var titulo = insrtTitulo(lblaAcb);
    var tabla = setTableBtn(lblaAcb,'Acb');

    if ( barniz !== undefined ) {

        for (var i = 0; i < barniz.length ; i++) {

            var nombre    = "Barniz UV";
            var tipo      = barniz[i]['tipo_grabado'];
            var largo     = barniz[i]['largo'];
            var ancho     = barniz[i]['ancho'];
            var cUnitario = barniz[i]['costo_unitario'];
            var total     = barniz[i]['costo_tot_proceso'];

            if(tipo == "Registro Mate" || tipo == "Registro Brillante") {

                var tr  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + nombre +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipo + ', Medidas: ' + largo + 'x' + ancho +'</span></td><td style="display: none">' + tipo + '</td><td style="display: none">' + largo + '</td><td style="display: none">' + ancho + '</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPrincipal.push({"Tipo_acabado": nombre, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho});
            } else {

                var tr  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + nombre +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipo + '</span></td><td style="display: none">' + tipo + '</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPrincipal.push({"Tipo_acabado": nombre, "tipoGrabado": tipo, "Largo": null, "Ancho": null});
            }

            $('#' + tabla).append(tr);

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ cUnitario +'</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="2"></td></tr>';

            $('#table_proc_BarnizUV').append(tr);

            $('#proceso_barnizuv_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Barniz UV</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);
        }   
    }

    if ( laser !== undefined ) {

        for (var i = 0; i < laser.length ; i++) {

            var nombre = "Corte Laser";
            var tipo   = laser[i]['tipo_grabado'];
            var largo  = laser[i]['largo'];
            var ancho  = laser[i]['ancho'];
            var cUnitario  = laser[i]['costo_unitario'];
            var total  = laser[i]['costo_tot_proceso'];
            var opAcb = "Corte Laser";
            var acb = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipo + ', Medidas: ' + largo + 'x' +  ancho + '</span></td><td class="tipoLaser" style="display: none;">' + tipo + '</td><td class="LargoLaser" style="display: none;">' + largo + '</td><td class="AnchoLaser" style="display: none;">' + ancho + '</td><td class="' + tabla + ' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "LargoLaser": largo, "AnchoLaser": ancho});

            jQuery214('#' + tabla).append(acb);

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo + 'x' + ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ cUnitario +'</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ cUnitario +'"></td></tr><tr><td colspan="2"></td></tr>';
            
            $('#table_proc_Laser').append(tr);

            $('#proceso_laser_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Corte Laser</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);
        }
    }

    if ( grabado !== undefined ) {

        for (var i = 0; i < aAcb['Grabado'].length ; i++) {

            var nombre    = "Grabado";
            var tipo      = grabado[i]['tipo_grabado'];
            var largo     = grabado[i]['largo'];
            var ancho     = grabado[i]['ancho'];
            var ubicacion = grabado[i]['ubicacion'];
            var cUPlaca   = grabado[i]['placa_costo_unitario'];
            var cTPlaca   = grabado[i]['placa_costo'];
            var cUArr     = grabado[i]['arreglo_costo_unitario'];
            var cTArr     = grabado[i]['arreglo_costo'];
            var total     = grabado[i]['costo_tot_proceso'];
            var cUTir     = grabado[i]['costo_unitario'];
            var cTTir     = grabado[i]['costo_tiro'];

            var tr  = '<tr id="AcGrabEmp"><td style="text-align: left;" class="textAcb">' + nombre +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Medidas: '+ largo +'x'+ ancho +', Ubicacion: '+ ubicacion +'</span></td><td style="display: none;">'+ tipo +'</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td style="display: none;">'+ ubicacion +'</td><td class="' + tabla + ' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_acabado": nombre, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho, "ubicacion": ubicacion});

            $('#' + tabla).append(tr);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td><td>Ubicacion: '+ ubicacion +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ cUPlaca +'</td><td>'+ cTPlaca +'</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_Grab').append(tr);

            var trResumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);

        }
    }

    if ( hotStamping !== undefined ) {

        for (var i = 0; i < hotStamping.length ; i++) {

            var nombre    = "Hot Stamping";
            var tipo      = hotStamping[i]['tipo_grabado'];
            var largo     = hotStamping[i]['largo'];
            var ancho     = hotStamping[i]['ancho'];
            var color     = hotStamping[i]['color'];
            var cUPlaca   = hotStamping[i]['placa_costo_unitario'];
            var cTPlaca   = hotStamping[i]['placa_costo'];
            var cUPel     = hotStamping[i]['pelicula_costo_unitario'];
            var cTPel     = hotStamping[i]['pelicula_costo'];
            var cUArr     = hotStamping[i]['arreglo_costo_unitario'];
            var cTArr     = hotStamping[i]['arreglo_costo'];
            var total     = hotStamping[i]['costo_tot_proceso'];
            var cUTir     = hotStamping[i]['costo_unitario'];
            var cTTir     = hotStamping[i]['costo_tiro'];
            var opAcb     = "HotStamping";

            var tr  = '<tr id="AcHSEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Color: '+ color +', Medidas: '+ largo +'x'+ ancho +'</span></td><td style="display: none;" >'+ tipo +'</td><td style="display: none;" ></td><td style="display: none;" >' + color + '</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td class="' + tabla + ' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "ColorHS": color, "LargoHS": largo, "AnchoHS": ancho});

            $('#' + tabla).append(tr);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Color: '+ color +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ cUPlaca +'</td><td>'+ cTPlaca +'</td></tr><tr><td>Pelicula</td><td>'+ cUPel +'</td><td>'+ cTPel +'</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_HS').append(tr);

            $('#proceso_hs_M1').show();

            var trResumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);  
        }
    }

    if ( laminado !== undefined ) {

        for (var i = 0; i < laminado.length ; i++) {

            var nombre    = "Laminado";
            var tipo      = laminado[i]['tipo_grabado'];
            var largo     = laminado[i]['largo'];
            var ancho     = laminado[i]['ancho'];
            var total     = laminado[i]['costo_tot_proceso'];
            var costo     = laminado[i]['costo_unitario'];

            var tr  = '<tr id="AcLamEmp"><td style="text-align: left;" class="textAcbEmp">' + nombre +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipo +'</td><td class="' + tabla + ' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_acabado": nombre, "tipo": tipo});

            jQuery214('#' + tabla).append(tr);

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="2"></td></tr>';

            $('#table_proc_Lam').append(tr);

            $('#proceso_lam_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen);    
        }
    }

    if ( suaje !== undefined ) {

        for (var i = 0; i < aAcb['Suaje'].length ; i++) {

            var nombre    = "Suaje";
            var tipo      = suaje[i]['tipo_grabado'];
            var largo     = suaje[i]['largo'];
            var ancho     = suaje[i]['ancho'];
            var total     = suaje[i]['costo_tot_proceso'];
            var costo     = suaje[i]['costo_unitario'];
            var cUArr     = suaje[i]['costo_unitario_arreglo'];
            var cTArr     = suaje[i]['arreglo'];
            var cUTir     = suaje[i]['tiro_costo_unitario'];
            var cTTir     = suaje[i]['costo_tiro'];

            var tr  = '<tr id="AcSuajeEmp"><td style="text-align: left;" class="textAcb">' + nombre +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Medidas: '+ largo +'x'+ ancho +'</span></td><td style="display: none;">'+ tipo +'</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td class="' + tabla + ' img_delete"></td></tr>';

            arrPrincipal.push({"Tipo_acabado": nombre, "tipoGrabado": tipo, "LargoSuaje": largo, "AnchoSuaje": ancho});

            $('#acabados').modal('hide');

            $('#' + tabla).append(tr);

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_Suaje').append(tr);

            $('#proceso_suaje_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen );      
        }
    }
}

function appndPapeles(arrPapel, seccion){


        if( arrPapel[seccion] == undefined || arrPapel[seccion] == null ) return false;

        var nombreP      = arrPapel[seccion]['nombre_papel'];
        var ancho        = arrPapel[seccion]['ancho_papel'];
        var largo        = arrPapel[seccion]['largo_papel'];
        var cortes       = arrPapel[seccion]['corte'];
        var totalPliegos = arrPapel[seccion]['tot_pliegos'];
        var costoTotal   = parseFloat(arrPapel[seccion]['tot_costo']);
        var titulo       = "";
        var tablaAppnd   = "";

        if (nombreP == undefined ) {
            
            var nombreP      = arrPapel[seccion]['nombre'];
            var ancho      = arrPapel[seccion]['ancho'];
            var largo      = arrPapel[seccion]['largo'];
            var cortes       = arrPapel[seccion]['cortes'];
            var totalPliegos = arrPapel[seccion]['pliegos'];
            var costoTotal   = parseFloat(arrPapel[seccion]['costo_tot_pliegos']);
        }

        switch(seccion){

            case "papel_Emp":

                titulo = "Empalme Cajón";
                tablaAppnd = "resumenEC";
                var nombreCarton = arrPapel['costo_grosor_carton']['nombre_papel'];
                var precioCarton = arrPapel['costo_grosor_carton']['tot_costo'];
                var trCarton = "<tr><td></td><td>" + nombreCarton + "</td><td>" + precioCarton + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trCarton);

                var precioEnc = arrPapel['encuadernacion']['costo_tot_proceso'];
                var trEnc = "<tr><td></td><td>Encuadernación</td><td>$" + precioEnc + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trEnc);
            break;

            case "papel_FCaj":

                titulo = "Forro Cajón";
                tablaAppnd = "resumenFC";
                var precioElab = arrPapel['elab_FCaj']['costo_tot_proceso'];
                var trElab = "<tr><td></td><td>Elaboración</td><td>$" + precioElab + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trElab);

                var precioRanurado = arrPapel['ranurado']['costo_tot_proceso'];
                var trRan = "<tr><td></td><td>Ranurado</td><td>$" + precioRanurado + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trRan);

                var precioEnc = arrPapel['encuadernacion']['costo_tot_proceso'];
                var trEnc = "<tr><td></td><td>Encuadernación</td><td>$" + precioEnc + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trEnc);
            break;

            case "papel_EmpTap":

                titulo = "Empalme Tapa";
                tablaAppnd = "resumenET";
                var nombreCarton = arrPapel['costo_grosor_tapa']['nombre_papel'];
                var precioCarton = arrPapel['costo_grosor_tapa']['tot_costo'];
                var trCarton = "<tr><td></td><td>" + nombreCarton + "</td><td>$" + precioCarton + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trCarton);
            break;

            case "papel_FTap":

                titulo = "Forro Tapa";
                tablaAppnd = "resumenFT";
                var precioElab = arrPapel['elab_FTap']['costo_tot_proceso'];
                var trElab = "<tr><td></td><td>Elaboración</td><td>$" + precioElab + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trElab);

                var precioRanurado = arrPapel['ranurado']['costo_tot_proceso'];
                var trRan = "<tr><td></td><td>Ranurado</td><td>$" + precioRanurado + "</td><td></td></tr>";
                $('#'+tablaAppnd).append(trRan);
            break;
        }

        var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr><td>Material</td><td>'+ nombreP +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ largo +' Ancho: '+ ancho +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ cortes +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ totalPliegos +'</td></tr><tr><td>Costo Total</td><td>$'+ costoTotal +'<input type="hidden" class="prices" value="' + costoTotal + '"></td></tr>';

        $('#table_papeles_tr').append(tr);

        var trResumen = '<tr><td></td><td>Papel '+ nombreP +'</td><td>$'+ costoTotal +'<input type="hidden" class="pricesresumenempalme" value="' + costoTotal + '"></td><td></td></tr>';

        $('#'+tablaAppnd).append(trResumen);
}

function appndCartones(arrPapel, seccion){

    if( arrPapel[seccion] == undefined || arrPapel[seccion] == null ) return false;
    
    var carton     = arrPapel[seccion];
    var titulo = "";
    if( seccion == "costo_grosor_carton" ){

        titulo = "Carton Cajón";
    }else{

        titulo = "Carton Tapa";
    }
    var nombreP      = carton['nombre_papel'];
    var largo        = carton['largo_papel'];
    var ancho        = carton['ancho_papel'];
    var costoTotal   = carton['tot_costo'];
    var totalPliegos = carton['tot_pliegos'];
    var cortes       = carton['corte'];

    var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr><td>Material</td><td>'+ nombreP +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ largo +' Ancho: '+ ancho +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ cortes +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ totalPliegos +'</td></tr><tr><td>Costo Total</td><td>$'+ costoTotal +'<input type="hidden" class="prices" value="' + costoTotal + '"></td></tr>';

    $('#table_papeles_tr').append(tr);
}

function appndPD(aGlobal){

    if( aGlobal == undefined || aGlobal == null ) return false;

    var cantidad = aGlobal['tiraje'];
    //Elaboracion

        var elabFC = aGlobal['elab_FCaj'];
        var elabFT = aGlobal['elab_FTap'];
        
        var trFC = appndE(elabFC,'Forro Cajón');
        var trFT = appndE(elabFT, 'Forro Tapa');

        var suma = parseInt( parseInt(elabFC['costo_tot_proceso']) + parseInt(elabFT['costo_tot_proceso']));
        var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Elaboración</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ cantidad +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Totales</td></tr>' + trFC + trFT + '<tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ suma +'<input type="hidden" class="prices" value="'+ suma +'"></td></tr><tr><td colspan="3"></td></tr>';
        $("#table_adicionales_tr").append(tr);
        function appndE(proceso, titulo){

            var costoT = parseInt(proceso['costo_tot_proceso']);
            var costoU = parseInt(proceso['costo_unit_forrado_cajon']);
            var tr = '<tr><td>' + titulo + '</td><td>$'+ costoU +'</td><td>$'+ costoT +'</td></tr>';
            return tr;
        }
    //Ranurado

        var ranFC = aGlobal['ranurado'];
        //var ranFT = aGlobal['elab_FTap'];
        
        var trFC = appndR(ranFC,'Arreglo');
        //var trFT = appndE(ranFT, 'Forro Tapa');

        var suma = parseInt( parseInt(ranFC['costo_tot_proceso']));
        var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Ranura</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ cantidad +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Totales</td></tr>' + trFC + '<tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ suma +'<input type="hidden" class="prices" value="'+ suma +'"></td></tr><tr><td colspan="3"></td></tr>';
        $("#table_adicionales_tr").append(tr);
        function appndR(proceso, titulo){

            var costoU = proceso['costo_unit_por_ranura'];
            var costoT = proceso['costo_tot_proceso'];
            return tr = '<tr><td>' + titulo + '</td><td>$'+ costoU +'</td><td>$'+ costoT +'</td></tr>'
        }
    //Encuadernacion
        var enc        = aGlobal['encuadernacion'];
        var cUDespunte = enc['despunte_costo_unitario'];
        var cTDespunte = enc['despunte_de_esquinas_para_cajon'];
        var cUEncajada = enc['encajada_costo_unitario'];
        var cTEncajada = enc['costo_encajada'];
        var total      = enc['costo_tot_proceso'];
        var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Encuadernación</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ cantidad +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Despunte</td><td>$'+ cUDespunte +'</td><td>$'+ cTDespunte +'</td></tr><tr><td>Encajada</td><td>$'+ cUEncajada +'</td><td>$'+ cTEncajada +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'</td></tr>';
        $("#table_adicionales_tr").append(tr);
}

function getIdClient() {

    var url     = location.href;
    var cliente = url.split("?");

    cliente = cliente[1].split("=");
    cliente = cliente[1].split("&");
    cliente = parseInt(cliente[0]);

    return cliente;
}

function showModError(proceso) {

    $("#txtContenido").html("No existe el costo para el proceso: " + proceso + " con este tiraje.");

    // $("#modalError").modal("show");
    $('#modalError').modal({backdrop: 'static', keyboard: false});
}

function showModCorrecto(texto) {

    $("#txtContCorrecto").html(texto);

    $('#modalCorrecto').modal({backdrop: 'static', keyboard: false});
}

function appndImg(div, src){

	$(div).html(src)
}

function divisionesImp(opcion) {

    divisionesImps=opcion;
}

function divisionesAcb(opcion) {

    divisionesAcbs=opcion;
}

function saveBtnAcabados(arrPapeles, tabla) {


    var IDopAcb  = $("#SelectAcEmp option:selected").data('id');
    var opAcb    = $("#SelectAcEmp option:selected").text();

    switch(opAcb){

        case "Laminado":

            var tipo  = $("#SelectLaminadoEmp option:selected").text();
            var id    = $("#SelectLaminadoEmp option:selected").data('id');
            var nuloo = document.getElementById('SelectLaminadoEmp').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var tr  = '<tr><td style="text-align: left;" class="textAcbEmp">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipo +'</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPapeles.push({"Tipo_acabado": opAcb, "tipo": tipo});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(tr);

                vacioModalAcabados();
            }
        break;

        case "HotStamping":

            var tipo    = $("#SelectHSEmp option:selected").text();
            var id      = $("#SelectHSEmp option:selected").data('id');
            var color   = $("#SelectColorHSEmp option:selected").text();
            var idColor = $("#SelectHSEmp option:selected").data('id');
            var largo   = parseInt(document.getElementById('LargoHS_ver').value,10);
            var ancho   = parseInt(document.getElementById('AnchoHS_ver').value,10);
            var nulo1   = document.getElementById('SelectHSEmp').value;
            var nulo2   = document.getElementById('SelectColorHSEmp').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var tr  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Color: '+ color +', Medidas: '+ largo +'x'+ ancho +'</span></td><td style="display: none;" >'+ tipo +'</td><td style="display: none;" >' + idColor + '</td><td style="display: none;" >' + color + '</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "ColorHS": color, "LargoHS": largo, "AnchoHS": ancho});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(tr);

                vacioModalAcabados();
            }
        break;

        case "Grabado":

            var tipo      = $("#SelectGrabEmp option:selected").text();
            var idTipo    = $("#SelectHSEmp option:selected").data('id');
            var largo     = document.getElementById('LargoGrab').value;
            var ancho     = document.getElementById('AnchoGrab').value;
            var ubicacion = $("#SelectUbiGrabEmp option:selected").text();
            var nulo1 = document.getElementById('SelectGrabEmp').value;
            var nulo2 = document.getElementById('SelectUbiGrabEmp').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var tr  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Medidas: '+ largo +'x'+ ancho +', Ubicacion: '+ ubicacion +'</span></td><td style="display: none;">'+ tipo +'</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td style="display: none;">'+ ubicacion +'</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho, "ubicacion": ubicacion});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(tr);

                vacioModalAcabados();
            }
        break;

        case "Suaje":

            var tipo   = $("#SelectSuajeEmp option:selected").text();
            var idTipo = $("#SelectHSEmp option:selected").data('id');
            var largo  = document.getElementById('LargoSuaje').value;
            var ancho  = document.getElementById('AnchoSuaje').value;
            var nulo1 = document.getElementById('SelectSuajeEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var tr  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Medidas: '+ largo +'x'+ ancho +'</span></td><td style="display: none;">'+ tipo +'</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "LargoSuaje": largo, "AnchoSuaje": ancho});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(tr);

                vacioModalAcabados();
            }
        break;

        case "Corte Laser":

            var tipo   = $("#SelectLaserEmp option:selected").text();
            var idTipo = $("#SelectHSEmp option:selected").data('id');
            var largo  = parseInt(document.getElementById('LargoLaser1').value,10);
            var ancho  = parseInt(document.getElementById('AnchoLaser1').value,10);
            var nulo1  = document.getElementById('SelectLaserEmp').value;

            if (nulo1 == 'selected')  {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var tr = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipo + ', Medidas: ' + largo + 'x' +  ancho + '</span></td><td style="display: none;">' + tipo + '</td><td style="display: none;">' + largo + '</td><td style="display: none;">' + ancho + '</td><td class="' + tabla + ' img_delete"></td></tr>';

                arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "LargoLaser": largo, "AnchoLaser": ancho});

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(tr);

                vacioModalAcabados();
            }
        break;

        case "Barniz UV":

            var tipo   = $("#SelectBarnizUVEmp option:selected").text();
            var idTipo = $("#SelectHSEmp option:selected").data('id');
            var largo  = document.getElementById('LargoBarUVEmp').value;
            var ancho  = document.getElementById('AnchoBarUVEmp').value;
            var nulo1  = document.getElementById('SelectBarnizUVEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                if(tipo == "Registro Mate" || tipo == "Registro Brillante") {

                    var tr  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipo + ', Medidas: ' + largo + 'x' + ancho +'</span></td><td style="display: none">' + tipo + '</td><td style="display: none">' + largo + '</td><td style="display: none">' + ancho + '</td><td class="' + tabla + ' img_delete"></td></tr>';

                    arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho});
                } else {

                    var tr  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipo + '</span></td><td style="display: none">' + tipo + '</td><td class="' + tabla + ' img_delete"></td></tr>';

                    arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "Largo": null, "Ancho": null});
                }

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(tr);

                vacioModalAcabados();
            }
        break;

        case "Pegados Especiales":

            var tipoEspeciales   = $("#SelectEspecialesEmp option:selected").text();
            var idtipoEspeciales = $("#SelectHSEmp option:selected").data('id');
            var nulo1 = document.getElementById('SelectEspecialesEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else {

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoEspeciales +'</span></td><td class="tipoEspeciales" style="display: none">'+ tipoEspeciales +'<input id="tipoEspeciales" name="tipoEspeciales" type="hidden" value="'+ idtipoEspeciales +'"></td><td class="' + tabla + ' img_delete"></td></tr>';

                $('#acabados').modal('hide');

                jQuery214('#' + tabla).append(acb);

                vacioModalAcabados();
            }
        break;
    }
    activarBtn();
}


function saveBtnImpresiones(arrpapeles, tabla) {


    var IDopImp  = $("#miSelect option:selected").data('id');
    var opImp    = $("#miSelect option:selected").text();
    var precio   = $("#miSelect option:selected").data('precio'); //precio unitario
    var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    if (opImp == 'Offset') {

        var tipo   = $("#SelectImpTipoOff option:selected").text();
        var precio = $("#SelectImpTipoOff option:selected").data('precio');
        var idTipo = $("#SelectImpTipoOff option:selected").data('id');
        var tintas = document.getElementById('tintasO').value;
        var nuloo  = document.getElementById('SelectImpTipoOff').value;

        if (nuloo == 'selected') {

            document.getElementById('alerterrorimp').innerHTML = alertDiv;

        } else {

            document.getElementById('alerterrorimp').innerHTML = "";

            var imp  = '<tr><td class="textImp">' + opImp + '</td></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td style="display: none;">'+ tintas +'</td><td style="display: none;">'+ tipo +'</td><td class="' + tabla +' img_delete"></td></tr>';

            arrpapeles.push({"Tipo_impresion": opImp, "tintas": tintas, "tipo_offset": tipo});

            $('#Impresiones').modal('hide');

            $('#' + tabla).append(imp);

            vacioModalImpresiones();
        }
    }

    if (opImp == 'Digital') {

        var tipo   = $("#SelectImpDigital option:selected").text();

        var imp  = '<tr><td class="textImp">' + opImp + '</td><td class="CellWithComment">...<span class="CellComment">Se agregó una impresión digital</span></td><td class="' + tabla +' img_delete"></td></tr>';
        arrpapeles.push({"Tipo_impresion": opImp});

        $('#Impresiones').modal('hide');

        $('#' + tabla).append(imp);

        vacioModalImpresiones();
    }

    if (opImp == 'Serigrafia') {

        var tipo   = $("#SelectImpTipoSeri option:selected").text();
        var precio = $("#SelectImpTipoSeri option:selected").data('precio');
        var tintas = document.getElementById('tintasS').value;
        var nuloo  = document.getElementById('SelectImpTipoSeri').value;

        if (nuloo == 'selected') {

            document.getElementById('alerterrorimp').innerHTML = alertDiv;

        } else {

            document.getElementById('alerterrorimp').innerHTML = "";

            var imp  = '<tr><td class="textImp">' + opImp +'</td></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td style="display: none;">'+ tintas +'</td><td style="display: none;">'+ tipo +'</td><td class="' + tabla +' img_delete"></td></tr>';

            arrpapeles.push({"Tipo_impresion": opImp,  "tintas": tintas, "tipo_offset": tipo});

            $('#Impresiones').modal('hide');

            jQuery214('#' + tabla).append(imp);

            vacioModalImpresiones();
        }
    }

    activarBtn();
}


function delBtnAcabados(arrPapeles, tabla) {

    var tipo_acabado = "";

    $("#" + tabla + " tr").each(function(row, tr) {

        var opcion = $(tr).find('td:eq(0)').text();

        switch( opcion ){

            case "HotStamping":

                tipo  = $(tr).find('td:eq(2)').text();
                color = $(tr).find('td:eq(4)').text();
                largo = parseInt($(tr).find('td:eq(5)').text());
                ancho = parseInt($(tr).find('td:eq(6)').text());

                arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo, "ColorHS": color, "LargoHS": largo, "AnchoHS": ancho});
            break;
            case "Grabado":

                tipo      = $(tr).find('td:eq(2)').text();
                largo     = parseInt($(tr).find('td:eq(3)').text());
                ancho     = parseInt($(tr).find('td:eq(4)').text());
                ubicacion = $(tr).find('td:eq(5)').text();

                arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho, "ubicacion": ubicacion});
            break;
            case "Laminado":

                tipo = $(tr).find('td:eq(2)').text();
                arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo});
            break;
            case "Suaje":

                tipo  = $(tr).find('td:eq(2)').text();
                largo = parseInt($(tr).find('td:eq(3)').text());
                ancho = parseInt($(tr).find('td:eq(4)').text());

                arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo, "LargoSuaje": largo, "AnchoSuaje": ancho});
            break;
            case "Barniz UV":

                tipo  = $(tr).find('td:eq(2)').text();
                largo = parseInt($(tr).find('td:eq(3)').text());
                ancho = parseInt($(tr).find('td:eq(4)').text());

                if(tipo == "Registro Mate" || tipo == "Registro Brillante"){

                    arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho});

                } else {

                    arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo, "Largo": null, "Ancho": null});
                }
            break;
            case "Corte Laser":

                tipo  = $(tr).find('td:eq(2)').text();
                largo = parseInt($(tr).find('td:eq(3)').text());
                ancho = parseInt($(tr).find('td:eq(4)').text());

                arrPapeles.push({"Tipo_acabado": opcion, "tipoGrabado": tipo, "LargoLaser": largo, "AnchoLaser": ancho});
            break;
        }
    });
    desactivarBtn();
}

function delBtnImpresiones(arrPapeles, tabla) {

    var TableData       = "";
    var tipo_imp_offset = "";

    $("#" + tabla + " tr").each(function(row, tr) {

        var opImp   = $(tr).find('td:eq(0)').text();
        var tintas  = parseInt($(tr).find('td:eq(2)').text(),10);
        var tipo    = $(tr).find('td:eq(3)').text();

        switch( opImp ){

            case "Offset":

                var idtipoOff = parseInt($("#tipoOffEmp").val());

                arrPapeles.push({"Tipo_impresion": opImp, "tintas": tintas, "tipo_offset": tipo});
            break;
            case "Digital":

                arrPapeles.push({"Tipo_impresion": opImp});
            break;
            case "Serigrafia":

                var idtipoSeri = parseInt($("#tipoSeriEmp").val());

                arrPapeles.push({"Tipo_impresion": opImp,  "tintas": tintas, "tipo_offset": tipo});
            break;
        }
    });
    desactivarBtn();
}

function activarBtn() {

    $("#btnabrebancoemp").prop("disabled",false);
    $("#btnabreaccesorios").prop("disabled",false);
    $("#btnabrecierres").prop("disabled",false);
}


function desactivarBtn() {
    
    /*if( aImpBC.length == 0 && aImpCC.length == 0 && aImpFEC.length == 0 && aImpPC.length == 0 && aImpFIC.length == 0 && aImpBT.length == 0 && aImpCT.length == 0 && aImpFT.length == 0 && aImpFET.length == 0 && aImpFIT.length == 0 && aAcbBC.length == 0 && aAcbCC.length == 0 && aAcbFEC.length == 0 && aAcbPC.length == 0 && aAcbFIC.length == 0 && aAcbBT.length == 0 && aAcbCT.length == 0 && aAcbFT.length == 0 && aAcbFET.length == 0 && aAcbFIT.length == 0 ){

        $("#btnabrebancoemp").prop("disabled",true);
        $("#btnabreaccesorios").prop("disabled",true);
        $("#btnabrecierres").prop("disabled",true);
    }*/
}

function vacioModalImpresiones() {

    document.getElementById('miSelect').value                      = "selected";
    document.getElementById('SelectImpTipoOff').value              = "selected";
    document.getElementById('SelectImpTipoSeri').value             = "selected";
    document.getElementById('opImpresionSerigrafia').style.display = "none";
    document.getElementById('opImpresionOffset').style.display     = "none";
    document.getElementById('opImpresionDigital').style.display    = "none";
}

function vacioModalAcabados() {

    document.getElementById('SelectAcEmp').value                = "selected";
    document.getElementById('SelectLaminadoEmp').value          = "selected";
    document.getElementById('SelectHSEmp').value                = "selected";
    document.getElementById('SelectColorHSEmp').value           = "selected";
    document.getElementById('SelectGrabEmp').value              = "selected";
    document.getElementById('SelectEspecialesEmp').value        = "selected";
    document.getElementById('SelectBarnizUVEmp').value          = "selected";
    document.getElementById('SelectSuajeEmp').value             = "selected";
    document.getElementById('SelectLaserEmp').value             = "selected";
    document.getElementById('SelectUbiGrabEmp').value           = "selected";
    document.getElementById('opAcLaminadoEmp').style.display    = "none";
    document.getElementById('opAcHotStampingEmp').style.display = "none";
    document.getElementById('opAcGrabadoEmp').style.display     = "none";
    document.getElementById('opAcEspecialesEmp').style.display  = "none";
    document.getElementById('opAcBarnizUVEmp').style.display    = "none";
    document.getElementById('opAcSuajeEmp').style.display       = "none";
    document.getElementById('opAcLaserEmp').style.display       = "none";
    document.getElementById('opAcBarUVEmp').style.display       = "none";
    document.getElementById('LargoLaser1').value                = "1";
    document.getElementById('AnchoLaser1').value                = "1";
    document.getElementById('LargoGrab').value                  = "1";
    document.getElementById('AnchoGrab').value                  = "1";
    document.getElementById('LargoHS_ver').value                = "1";
    document.getElementById('AnchoHS_ver').value                = "1";
    document.getElementById('LargoSuaje').value                 = "1";
    document.getElementById('AnchoSuaje').value                 = "1";
    document.getElementById('LargoBarUVEmp').value              = "1";
    document.getElementById('AnchoBarUVEmp').value              = "1";
}


//accion onclick botones

//resumen
$(document).on('click', '#btnResumen', function(event) {

    $('#divDerecho').hide();
    $('#divIzquierdo').hide();
    $('#topCotizador').hide();
    $('#groupButton1').hide();
    $('#resumentodocaja').css("position","absolute");
    $('#resumentodocaja').show();

}); 

$(document).on('click', '#btnQuitarResumen', function(event) {

    $('#divDerecho').show("normal");
    $('#divIzquierdo').show();
    $('#topCotizador').show();
    $('#resumentodocaja').css("position","none");
    $('#resumentodocaja').hide();
    $('#groupButton1').show();
});

$("#btnCancelAccesorios").click( function () {

    vacioModalAccesorios();
});

//Accesorios
$(document).on("click", "#btnAccesorios", function () {

    var idAccesorio     = $("#SelectAccesorio option:selected").data('id');
    var precio          = $("#SelectAccesorio option:selected").data('price');
    var nombreAccesorio = $("#SelectAccesorio option:selected").text();
    var herraje         = $("#SelectHerraje option:selected").text();
    var largo           = $('#LargoAcc').val();
    var ancho           = $('#AnchoAcc').val();
    var color           = $("#opColores option:selected").text();

    var accesorio       = "";

    var alertmesserror  = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    switch(nombreAccesorio) {

        case "Herraje":

            if( $("#SelectHerraje option:selected").val() != "selected") {

                accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio + '</td><td class="CellWithComment">...<span class="CellComment">Herraje: ' + herraje + '</span></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+herraje+'</td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": herraje, "Precio": precio});

                $('#listaccesorios').append(accesorio);

                $('#accesorios').modal('hide');

                vacioModalAccesorios();
            } else {

                document.getElementById('alerterror7').innerHTML = alertmesserror;
            }
            
            break;
        case "Ojillos":

            accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio + '</td><td style=""></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none"></td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

            aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": null, "Precio": precio});

            $('#listaccesorios').append(accesorio);

            $('#accesorios').modal('hide');

            vacioModalAccesorios();
            
            break;
        case "Resorte":

            if( $("#SelectColor option:selected").val() != "selected") {

                accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio +'</td><td class="CellWithComment">...<span class="CellComment">Largo: ' + largo + ' Ancho: ' + ancho + ' Color: ' + color + '</span></td><td style="display:none">'+ largo +'</td><td style="display:none">'+ancho+'</td><td style="display:none">'+ color +'</td><td style="display:none"></td><td style="display:none">'+herraje+'</td><td style="display:none">' + precio + '</td><td class="listaccesorios img_delete"></td></tr>';

                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});

                $('#listaccesorios').append(accesorio);

                $('#accesorios').modal('hide');

                vacioModalAccesorios();
            } else {

                document.getElementById('alerterror7').innerHTML = alertmesserror;
            }
            
            break;
        case "Lengueta de Liston":

            if( $("#SelectColor option:selected").val() != "selected") {

                accesorio = '<tr><td style="text-align: left;">' + nombreAccesorio +'</td><td class="CellWithComment">...<span class="CellComment">Largo: ' + largo + ' Ancho: ' + ancho + ' Color: ' + color + '</span></td><td style="display:none">'+ largo +'</td><td style="display:none">'+ancho+'</td><td style="display:none">'+ color +'</td><td style="display:none"></td><td style="display:none">'+herraje+'</td><td style="display:none">'+precio+'</td><td class="listaccesorios img_delete"></td></tr>';

                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});

                $('#listaccesorios').append(accesorio);

                $('#accesorios').modal('hide');

                vacioModalAccesorios();
            } else {

                document.getElementById('alerterror7').innerHTML = alertmesserror;
            }
            
            break;
    }
});

jQuery214(document).on("click", ".listaccesorios", function () {

    $(this).closest('tr').remove();

    row_listabancos = 0;

    row_listabancos = $('#listaccesorios > tr').length;

    aAccesorios = [];

    var oTable = document.getElementById('accesoriosTable');

    var rowLength = oTable.rows.length;

    $("#listaccesorios tr").each(function(row, tr) {

        var nombreAccesorio = $(tr).find('td:eq(0)').text();

        //se salta el 1 porque en el td 1 esta el span como comentario
        var largo   = $(tr).find('td:eq(2)').text();
        var ancho   = $(tr).find('td:eq(3)').text();
        var color   = $(tr).find('td:eq(4)').text();
        var herraje = $(tr).find('td:eq(5)').text();
        var precio  = $(tr).find('td:eq(6)').text();

        nombreAccesorio = nombreAccesorio.trim();

        switch(nombreAccesorio) {

            case "Herraje":
                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": herraje, "Precio": precio});
            
                break;
            case "Ojillos":
                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": null, "Ancho": null, "Color": null, "Herraje": null, "Precio": precio});
                
                break;
            case "Resorte":
                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});
                break;
            case "Lengueta de Liston":
                aAccesorios.push({"Tipo_accesorio": nombreAccesorio, "Largo": largo, "Ancho": ancho, "Color": color, "Herraje": null, "Precio": precio});
            
                break;
        }
    });
});

//Banco
$(document).on('click', '#btnBancoEmp', function(event) {

    var IDopBan = $("#SelectBanEmp option:selected").data('id');
    var opBan   = $("#SelectBanEmp option:selected").text();

    var LargoMBanco       = document.getElementById('LargoBanco').value;
    var AnchoMBanco       = document.getElementById('AnchoBanco').value;
    var ProfundidadMBanco = document.getElementById('ProfundidadBanco').value;
    var LLevaSuajeM       = $("#SelectSuajeBanco option:selected").text();

    var nuloo = document.getElementById('SelectBanEmp').value;

    var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

    if (nuloo === 'selected') {

        document.getElementById('alerterror5').innerHTML = alertDiv;

    } else if (opBan === 'Carton' || opBan === 'Eva' || opBan === 'Espuma' || opBan === 'Empalme Banco') {

        document.getElementById('alerterror5').innerHTML = "";

        var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ opBan +', Largo: '+ LargoMBanco +', Ancho: '+ AnchoMBanco +', Profundidad: '+ ProfundidadMBanco +', Suaje: '+ LLevaSuajeM +'</span></td><td style="display: none">'+ opBan +'</td><td style="display: none">'+ LargoMBanco +'</td><td style="display: none">'+ AnchoMBanco +'</td><td style="display: none">'+ ProfundidadMBanco +'</td><td style="display: none">'+ LLevaSuajeM +'</td><td class="listbancoemp img_delete"></td></tr>';

        aBancos.push({"Tipo_banco": opBan, "largo": LargoMBanco, "ancho": AnchoMBanco, "Profundidad": ProfundidadMBanco, "Suaje": LLevaSuajeM});

        $('#bancoemp').modal('hide');

        jQuery214('#listbancoemp').append(ban);

        vacioModalBancos();
    } else if (opBan === 'Cartulina Suajada') {

        document.getElementById('alerterror5').innerHTML = "";

        var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ opBan +', Largo: '+ LargoMBanco +', Ancho: '+ AnchoMBanco +', Profundidad: '+ ProfundidadMBanco +'</span></td><td style="display: none">'+ opBan +'</td><td style="display: none">'+ LargoMBanco +'</td><td style="display: none">'+ AnchoMBanco +'</td><td style="display: none">'+ ProfundidadMBanco +'</td><td class="listbancoemp img_delete"></td></tr>';

        aBancos.push({"Tipo_banco": opBan, "largo": LargoMBanco, "ancho": AnchoMBanco, "Profundidad": ProfundidadMBanco, "Suaje": null});

        $('#bancoemp').modal('hide');

        jQuery214('#listbancoemp').append(ban);

        vacioModalBancos();
    }
});

jQuery214(document).on("click", ".listbancoemp", function () {

    $(this).closest('tr').remove();

    row_listabancos = 0;
    row_listabancos = $('#listbancoemp > tr').length;

    aBancos = [];

    var oTable = document.getElementById('banTable');

    var rowLength = oTable.rows.length;

    var tipo_banco = "";

    $("#listbancoemp tr").each(function(row, tr) {

        var largo       = 0;
        var ancho       = 0;
        var profundidad = 0;
        var suaje       = "";
        var Largo_str   = "";
        var Ancho_str   = "";
        var profundidad_str   = "";


        tipo_banco      = $(tr).find('td:eq(2)').text();
        Largo_str       = $(tr).find('td:eq(3)').text();
        Ancho_str       = $(tr).find('td:eq(4)').text();
        profundidad_str = $(tr).find('td:eq(5)').text();

        tipo_banco  = tipo_banco.trim();
        largo       = parseInt(Largo_str, 10);
        ancho       = parseInt(Ancho_str, 10);
        profundidad = parseInt(profundidad_str, 10);


        if (tipo_banco == "Carton") {

            suaje = $(tr).find('td:eq(6)').text();
            suaje = suaje.trim();

            aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
        }


        if (tipo_banco == "Eva") {

            suaje = $(tr).find('td:eq(6)').text();
            suaje = suaje.trim();

            aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
        }


        if (tipo_banco == "Espuma") {

            suaje = $(tr).find('td:eq(6)').text();
            suaje = suaje.trim();

            aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
        }


        if (tipo_banco == "Empalme Banco") {

            suaje = $(tr).find('td:eq(6)').text();
            suaje = suaje.trim();

            aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": suaje});
        }


        if (tipo_banco == "Cartulina Suajada") {

            aBancos.push({"Tipo_banco": tipo_banco, "largo": largo, "ancho": ancho, "Profundidad": profundidad, "Suaje": null});
        }
    });
});

//Cierres
jQuery214(document).on("click", "#btnCierres", function () {

    var IDopCie  = $("#SelectCieEmp option:selected").data('id');
    var opCie    = $("#SelectCieEmp option:selected").text();

    var numpares = document.getElementById('paresCierre').value;

    // para liston
    var LarListon    = document.getElementById('LargoListon').value;
    var AnchListon   = document.getElementById('AnchoListon').value;
    var tipoListon   = $("#SelectListonEmp option:selected").text();
    var colorListon  = $("#SelectColorListon option:selected").text();

    // para Suaje calado
    var LarSuajCal   = document.getElementById('LargoSCalado').value;
    var AnchSuajCal  = document.getElementById('AnchoSCalado').value;
    var tipoSuajCal  = $("#SelectSCalado option:selected").text();

    var alertmesserror = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';


    if (opCie == 'Iman' || opCie == 'Velcro') {

        document.getElementById('alerterror6').innerHTML = "";

        var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Numero de Pares: '+ numpares +'</span></td><td style="display: none">'+ numpares +'</td><td class="listcierres img_delete"></td></tr>';


        aCierres.push({"Tipo_cierre": opCie, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});

        $('#cierres').modal('hide');

        jQuery214('#listcierres').append(cie);


        //vacioModalCierres();
    }


    if (opCie == 'Marialuisa') {

        document.getElementById('alerterror6').innerHTML = "";

        var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Se agrego un cierre Marialuisa</span></td><td class="listcierres img_delete"></td></tr>';

        aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": null, "ancho": null, "tipo": null, "color": null});

        $('#cierres').modal('hide');

        jQuery214('#listcierres').append(cie);

        //vacioModalCierres();
    }


    if (opCie == 'Liston') {

        var nulo1 = document.getElementById('SelectCieEmp').value;
        var nulo2 = document.getElementById('SelectListonEmp').value;
        var nulo3 = document.getElementById('SelectColorListon').value;

        if (nulo1 == 'selected' || nulo2 == 'selected' || nulo3 == 'selected' ) {

            document.getElementById('alerterror6').innerHTML = alertmesserror;

        } else {

            document.getElementById('alerterror6').innerHTML = "";

            var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ LarListon +', Ancho: '+ AnchListon +', Tipo: '+ tipoListon +', Color: '+ colorListon +' </span></td><td style="display: none">'+ LarListon +'</td><td style="display: none">'+ AnchListon +'</td><td style="display: none">'+ tipoListon +'</td><td style="display: none">'+ colorListon +'</td><td class="listcierres img_delete"></td></tr>';


            aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": LarListon, "ancho": AnchListon, "tipo": tipoListon, "color": colorListon});

            $('#cierres').modal('hide');

            jQuery214('#listcierres').append(cie);

            //vacioModalCierres();
        }
    }


    if (opCie == 'Suaje calado') {

        var nulo1 = document.getElementById('SelectCieEmp').value;
        var nulo2 = document.getElementById('SelectSCalado').value;

        if (nulo1 == 'selected' || nulo2 == 'selected') {

            document.getElementById('alerterror6').innerHTML = alertmesserror;

        } else {

            document.getElementById('alerterror6').innerHTML = "";

            var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ LarSuajCal +', Ancho: '+ AnchSuajCal +', Tipo: '+ tipoSuajCal +'</span></td><td style="display: none">'+ LarSuajCal +'</td><td style="display: none">'+ AnchSuajCal +'</td><td style="display: none">'+ tipoSuajCal +'</td><td class="listcierres img_delete"></td></tr>';


            aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": LarSuajCal, "ancho": AnchSuajCal, "tipo": tipoSuajCal, "color": null});

            $('#cierres').modal('hide');

            jQuery214('#listcierres').append(cie);

            //vacioModalCierres();
        }
    }
});

jQuery214(document).on("click", ".listcierres", function () {

    $(this).closest('tr').remove();

    row_listacierres = 0;

    row_listacierres = $('#listcierres > tr').length;

    aCierres = [];

    var oTable = document.getElementById('cieTable');

    var rowLength = oTable.rows.length;

    var tipo_cierre = "";

    $("#cieTable tr").each(function(row, tr) {

        var tipo_cierre = "";
        var numpares    = 1;

        var numpares_str = "";
        var Largo_str    = "";
        var Ancho_str    = "";
        var tipo         = "";

        var Largo = 0;
        var Ancho = 0;

        tipo_cierre = $(tr).find('td:eq(0)').text();


        if (tipo_cierre == "Iman") {

            numpares_str = $(tr).find('td:eq(2)').text();
            numpares     = parseInt(numpares_str, 10);

            aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});

        }


        // falta corregir el modal de Liston
        if (tipo_cierre == "Liston") {

            tipo_cierre = $(tr).find('td:eq(0)').text();

            aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": 1, "largo": null, "ancho": null, "tipo": null, "color": null});
        }


        if (tipo_cierre == "Marialuisa") {

            aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
        }


        if (tipo_cierre == "Suaje calado") {

            Largo_str   = $(tr).find('td:eq(2)').text();
            Ancho_str   = $(tr).find('td:eq(3)').text();
            tipo        = $(tr).find('td:eq(4)').text();

            Largo = parseInt(Largo_str, 10);
            Ancho = parseInt(Ancho_str, 10);

            aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": Largo, "ancho": Ancho, "tipo": tipo, "color": null});
        }


        if (tipo_cierre == "Velcro") {

            numpares_str = $(tr).find('td:eq(2)').text();
            numpares     = parseInt(numpares_str, 10);

            aCierres.push({"Tipo_cierre": tipo_cierre, "numpares": numpares, "largo": null, "ancho": null, "tipo": null, "color": null});
        }
    });
});

jQuery214(document).on("click", "#btnabrebancoemp", function () {

    $('#footerBancoEmp').show();
    $('#footerBancoFcajon').hide();
    $('#footerBancoFcartera').hide();
    $('#footerBancoGuarda').hide();
});

//boton seleccionar papeles
$("#btnCheckPaper").click( function() {

    var chk   =$("#btnCheckPaper").prop("checked");
    //este id se genera con el plugin chosen
    var texto = $("#optEC_chosen span").html();

    if(chk) {

        $("#optEC_chosen span").html(texto);
        $("#optFC_chosen span").html(texto);
        $("#optET_chosen span").html(texto);
        $("#optFT_chosen span").html(texto);

        $("#optEC option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optFC option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optET option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optFT option[data-nombre='" + texto +"']").prop("selected",true);
    } else {

        $("#optFC_chosen span").html("Elegir tipo de papel");
        $("#optET_chosen span").html("Elegir tipo de papel");
        $("#optFT_chosen span").html("Elegir tipo de papel");

        $("#optFC option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optET option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optFT option[data-nombre='" + texto +"']").prop("selected",false);
    }
});

//boton eliminar. Es el que hace la magia ;)
jQuery214(document).on("click", ".delete", function () {

    $(this).closest('tr').remove();
});

//Acabados
$('#btnAcabados').click(function() {

    switch(divisionesAcbs){

        case "EC":

            saveBtnAcabados(aAcbEC,"listAcbEC");    
        break;
        case "FC":

            saveBtnAcabados(aAcbFC,"listAcbFC");
        break;
        case "ET":

            saveBtnAcabados(aAcbET,"listAcbET");    
        break;
        case "FT":

            saveBtnAcabados(aAcbFT,"listAcbFT");
        break;
    }
});

//Impresiones
$("#btnImpresiones").click( function () {

    switch(divisionesImps){

        case "EC":

            saveBtnImpresiones(aImpEC,"listImpEC");
        break;
        case "FC":

            saveBtnImpresiones(aImpFC,"listImpFC");
        break;
        case "ET":

            saveBtnImpresiones(aImpET,"listImpET");
        break;
        case "FT":

            saveBtnImpresiones(aImpFT,"listImpFT");
        break;
    }
});

//boton Correcto
$("#btnModCorrecto").click( function() {

    location.href= url + "cotizador/getCotizaciones/";

    $("#subForm").prop("disabled", true);
});

//Boton Calcular
jQuery214(document).on("click", "#papeles_submit", function () {

    var odt               = $("#odt").val();
    var base              = $("#base").val();
    var alto              = $("#alto").val();
    var profundidad_cajon = $("#profundidad_cajon").val();
    var profundidad_tapa  = $("#profundidad_tapa").val();
    var grosor_carton      = $("#grosor_carton").val();
    var grosor_tapa       = $("#grosor_tapa").val();
    var cantidad          = $("#qty").val();

    if( revisarPropiedades(odt,"ODT") == false ) return false;

    if( revisarPropiedades(base,"base") == false ) return false;
    
    if( revisarPropiedades(alto,"alto") == false ) return false;
    
    if( revisarPropiedades(profundidad_cajon,"Profundidad Cajón") == false ) return false;

    if( revisarPropiedades(profundidad_tapa,"Profundidad Tapa") == false ) return false;
    
    if( revisarPropiedades(grosor_carton,"Grosor Cartón") == false ) return false;

    if( revisarPropiedades(grosor_tapa,"Grosor Tapa") == false ) return false;

    if( revisarPropiedades(cantidad,"Cantidad") == false ) return false;
    //if( revisarImpAcb() == false ) return false;


    var grabar      = "NO";
    var optEC = $("#optEC").val();
    var optFC = $("#optFC").val();
    var optET = $("#optET").val();
    var optFT = $("#optFT").val();

    if( optEC == null || optFC == null || optET == null || optFT == null ){
        
        var cadena = "";

        if( optEC == null ) cadena += "Empalme Cajón <br>";
        if( optFC == null ) cadena += "Forro Cajón <br>";
        if( optET == null ) cadena += "Empalme Tapa <br>";
        if( optFT == null ) cadena += "Forro Tapa";

        showModError("");

        $("#txtContenido").attr("align", "left");
        $("#txtContenido").html("");
        $("#txtContenido").html("Debe de seleccionar un papel para las siguientes secciones: " + cadena + ".");

    } else {

        if (typeof formData !== 'undefined' && formData.length > 0) {

            formData = [];
        }

        var formData      = $("#dataForm").serializeArray();

        // impresion
        var aImpEC_tmp  = JSON.stringify(aImpEC, null, 4);
        var aImpFC_tmp  = JSON.stringify(aImpFC, null, 4);
        var aImpET_tmp = JSON.stringify(aImpET, null, 4);
        var aImpFT_tmp  = JSON.stringify(aImpFT, null, 4);

        // acabados
        var aAcbEC_tmp  = JSON.stringify(aAcbEC, null, 4);
        var aAcbFC_tmp  = JSON.stringify(aAcbFC, null, 4);
        var aAcbET_tmp = JSON.stringify(aAcbET, null, 4);
        var aAcbFT_tmp  = JSON.stringify(aAcbFT, null, 4);

        // cierres
        var aCierres_tmp = JSON.stringify(aCierres, null, 4);


        // bancos
        var aBancos_tmp = JSON.stringify(aBancos, null, 4);


        // accesorios
        var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);

        var id_cliente_tmp = JSON.stringify(cliente, null, 4);
        
        formData.push({name: 'id_cliente', value: id_cliente_tmp});
        
        formData.push({name: 'aImpEC', value: aImpEC_tmp});
        formData.push({name: 'aImpFC', value: aImpFC_tmp});
        formData.push({name: 'aImpET', value: aImpET_tmp});
        formData.push({name: 'aImpFT', value: aImpFT_tmp});

        formData.push({name: 'aAcbEC', value: aAcbEC_tmp});
        formData.push({name: 'aAcbFC', value: aAcbFC_tmp});
        formData.push({name: 'aAcbET', value: aAcbET_tmp});
        formData.push({name: 'aAcbFT', value: aAcbFT_tmp});

        formData.push({name: 'aCierres', value: aCierres_tmp});
        formData.push({name: 'aBancos', value: aBancos_tmp});
        formData.push({name: 'aAccesorios', value: aAccesorios_tmp});
        formData.push({name: 'descuento_pctje', value: descuento});
        formData.push({name: 'grabar', value: grabar});

        var modificar_odt = "NO";

        formData.push({name: 'modificar', value: modificar_odt});

        aCierres_tmp    = [];
        aBancos_tmp     = [];
        aAccesorios_tmp = [];

        $.ajax({
            type:"POST",
            //dataType: "json",
            url: $('#dataForm').attr('action'),
            data: formData,
        })
        .done(function(response) {

            console.log(response);

            if (response !== " " || response !== "" || response !== undefined) {

                try {

                    var respuesta = JSON.parse(response);
                    var resp      = JSON.stringify(respuesta,null,4);
                    console.log(resp);
                    var error     = respuesta.error;
                    if (error.length > 0 || respuesta.mensaje === "ERROR") {

                        showModError("");
                        $("#txtContenido").html("");
                        $("#txtContenido").html(error);

                        return false;
                    }
                    
                    emptyTables();
                    // (RESUMEN)
                        
                        var trEC   = '<tr><td><b>Empalme Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trFC    = '<tr><td><b>Forro Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trET  = '<tr><td><b>Empalme Tapa</b></td><td></td><td></td><td></td></tr>';
                        var trFT    = '<tr><td><b>Forro Tapa</b></td><td></td><td></td><td></td></tr>';

                        var trMensajeria = '<tr><td><b>Costo Mensajería</b></td><td></td><td></td><td></td></tr>';
                        var trEmpaque = '<tr><td><b>Costo Empaque</b></td><td></td><td></td><td></td></tr>';
                        var trEncuadernacion = '<tr><td><b>Encuadernación</b></td><td></td><td></td><td></td></tr>';

                        //imprime titulos para resumen
                        $('#resumenEC').append(trEC);
                        $('#resumenFC').append(trFC);
                        $('#resumenET').append(trET);
                        $('#resumenFT').append(trFT);

                        $('#resumenMensajeria').append(trMensajeria);
                        $('#resumenEmpaque').append(trEmpaque);
                        $('#resumenEncuadernacion').append(trEncuadernacion);

                    // (MENSAJERIA)
                        var costo_msj = "<tr><td></td><td></td><td></td><td>$" + respuesta['mensajeria'] + "</td></tr>";
                        $('#resumenMensajeria').append(costo_msj);

                    // (EMPAQUE)
                        var costo_emp = "<tr><td></td><td></td><td></td><td>$" + respuesta['empaque'] + "</td></tr>";
                        $('#resumenEmpaque').append(costo_emp);

                    //ENCUADERNACION
                        var trEncuadernacion = "<tr><td></td><td></td><td></td><td>$" + respuesta['encuadernacion']['costo_tot_proceso'] + "</td></tr>";
                        $("#resumenEncuadernacion").append(trEncuadernacion);

                    // (PAPELES)

                        appndPapeles(respuesta,'papel_Emp');
                        appndPapeles(respuesta,'papel_FCaj');
                        appndPapeles(respuesta,'papel_EmpTap');
                        appndPapeles(respuesta,'papel_FTap');
                    // (CARTONES)

                        appndCartones(respuesta,'costo_grosor_carton');
                        appndCartones(respuesta,'costo_grosor_tapa');

                    // (PROCESOS DEFAULT)

                        appndPD(respuesta);
                    // IMPRESIONES
                    
                        appndImp( respuesta['aImpEmp'], "EC" );
                        appndImp( respuesta['aImpFCaj'], "FC" );
                        appndImp( respuesta['aImpEmpTap'], "ET" );
                        appndImp( respuesta['aImpFTap'], "FT" );

                    // ACABADOS
                        appndAcb( respuesta['aAcbEmp'], "EC" );
                        appndAcb( respuesta['aAcbFCaj'], "FC" );
                        appndAcb( respuesta['aAcbEmpTap'], "ET" );
                        appndAcb( respuesta['aAcbFTap'], "FT" );

                    // BANCOS
                        
                        if(respuesta['Bancos']) {

                            var titulo = '<tr><td><b>Bancos</b></td><td></td><td></td><td></td></tr>';
                            $('#resumenBancos').append(titulo);

                            for(var cont = 0; cont < respuesta['Bancos'].length; cont++) {

                                var tipo = respuesta['Bancos'][cont]['Tipo_banco'];
                                var costoU = parseFloat(respuesta['Bancos'][cont]['costo_unit_banco']);
                                var costoT = parseFloat(respuesta['Bancos'][cont]['costo_tot_proceso']);

                                tr = '<tr><td>' + tipo +'</td><td>' + respuesta['Bancos'][cont]['Suaje'] + '</td><td>$' + costoU +'<td>$' + costoT + '</td><td style="display: none;"></td></tr>';

                                $('#tabla_bancos').append(tr);
                                
                                var resumen = '<tr><td></td><td>' + tipo +'</td><td>$'+ costoT +'</td><td></td></tr>';

                                $('#resumenBancos').append(resumen);
                            }

                            $('#resumenBancos').append("<tr><td></td><td></td><td></td><td>$" + respuesta['costo_bancos'] + "</td></tr>");
                            $('#bancos').show();
                        }

                    // CIERRES
                        
                        if(respuesta['Cierres']) {

                            var titulo = '<tr><td><b>Cierres</b></td><td></td><td></td><td></td></tr>';
                            $('#resumenCierres').append(titulo);

                            for(var cont = 0; cont < respuesta['Cierres'].length; cont++) {

                                var largoAncho = "N/A";
                                var color = "N/A";
                                var tipoCierre = "N/A";
                                var tipo = respuesta['Cierres'][cont]['Tipo_cierre'];
                                var costoU = parseFloat(respuesta['Cierres'][cont]['costo_unitario']);
                                var costoT = parseFloat(respuesta['Cierres'][cont]['costo_tot_proceso']);


                                if( respuesta['Cierres'][cont]['color'] != null ){

                                    color = respuesta['Cierres'][cont]['color'];
                                }
                                if( respuesta['Cierres'][cont]['largo'] != null ){

                                    largoAncho = respuesta['Cierres'][cont]['largo'] + "x" + respuesta['Cierres'][cont]['ancho'];
                                }
                                if( respuesta['Cierres'][cont]['tipo'] != null ){

                                    tipoCierre = respuesta['Cierres'][cont]['tipo'];
                                }
                                
                                tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + tipoCierre + '</td><td>$' + costoU +'</td><td>$' + costoT + '</td><td style="display: none;"></td></tr>';

                                $('#tabla_cierres').append(tr);

                                var resumen = '<tr><td></td><td>' + tipo +'</td><td>$'+ costoT +'</td><td></td></tr>';

                                $('#resumenCierres').append(resumen);
                            }

                            $('#resumenCierres').append("<tr><td></td><td></td><td></td><td>$" + respuesta['costo_cierres'] + "</td></tr>");

                            $('#divCierres').show();
                        }

                    // ACCESORIOS
                        
                        if(respuesta['Accesorios']) {

                            var titulo = '<tr><td><b>Accesorios</b></td><td></td><td></td><td></td></tr>';
                            $('#resumenAccesorios').append(titulo);

                            for(var cont = 0; cont < respuesta['Accesorios'].length; cont++) {

                                var largoAncho = "N/A";
                                var color = "N/A";
                                var tipoAccesorio = "N/A";
                                var tipo = respuesta['Accesorios'][cont]['Tipo_accesorio'];
                                var costoU = parseFloat(respuesta['Accesorios'][cont]['costo_unit_accesorio']);
                                var costoT = parseFloat(respuesta['Accesorios'][cont]['costo_tot_proceso']);
                                if( respuesta['Accesorios'][cont]['Color'] != null ){

                                    color = respuesta['Accesorios'][cont]['Color'];
                                }
                                if( respuesta['Accesorios'][cont]['Largo'] != null ){

                                    largoAncho = respuesta['Accesorios'][cont]['Largo'] + "x" + respuesta['Accesorios'][cont]['Ancho'];
                                }
                                if( respuesta['Accesorios'][cont]['Tipo'] != null ){

                                    tipoAccesorio = respuesta['Accesorios'][cont]['Tipo'];
                                }

                                tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + tipo +'</td><td>$' + costoU +'<td>$' + costoT + '</td><td style="display: none;"></td></tr>';

                                $('#tabla_accesorios').append(tr);

                                var resumen = '<tr><td></td><td>' + tipo +'</td><td>$'+ costoT +'</td><td></td></tr>';

                                $('#resumenAccesorios').append(resumen);
                            }

                            $('#resumenAccesorios').append("<tr><td></td><td></td><td></td><td>$" + respuesta['costo_accesorios'] + "</td></tr>");

                            $('#divAccesorios').show();
                        }

                    // COSTOS
                        $("#tdSubtotalCaja").html("$" + respuesta['costo_subtotal']);
                        $("#UtilidadDrop").html("$" + respuesta['Utilidad']);
                        $("#Totalplus").html("$" + respuesta['costo_odt']);
                        $("#IVADrop").html("$" + respuesta['iva']);
                        $("#ComisionesDrop").html("$" + respuesta['comisiones']);
                        $("#IndirectoDrop").html("$" + respuesta['indirecto']);
                        $("#VentasDrop").html("$" + respuesta['ventas']);
                        $("#ISRDrop").html("$" + respuesta['ISR']);
                        $("#DescuentoDrop").html("$" + respuesta['descuento']);

                    //RESUMEN

                        var parteresumen;

                        parteresumen = '<tr><td></td><td></td><td></td><td class="totalEmpalme">$0.00</td></tr>';

                        jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

                        parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcajon">$0.00</td></tr>';

                        parteresumen = '<tr><td></td><td></td><td><b>Subtotal:</b></td><td class="grand-total"><b>$' + respuesta['costo_subtotal'] +'</b></td></tr><tr><td></td><td></td><td>Utilidad: </td><td id="UtilidadResumen">$' + respuesta['Utilidad'] + '</td></tr><tr><td></td><td></td><td>IVA:</td><td id="IVAResumen">$' + respuesta['iva'] + '</td></tr><tr><td></td><td></td><td>ISR: </td><td id="ISResumen">$' + respuesta['ISR'] + '</td></tr><tr><td></td><td></td><td>Comisiones: </td><td id="ComisionesResumen">$ ' + respuesta['comisiones'] + '</td></tr><tr><td></td><td></td><td>% Indirecto: </td><td id="IndirectoResumen">$' + respuesta['indirecto'] + '</td></tr><tr><td></td><td></td><td>Ventas: </td><td id="ventaResumen">$' + respuesta['ventas'] + '</td></tr><tr><td></td><td></td><td>Descuento: </td><td id="descuentoResumen">$' + respuesta['descuento'] + '</td></tr><tr><tr><td></td><td></td><td><b>Total: </b></td><td id="TotalResumen"><b>$' + respuesta['costo_odt'] + '</b></td></tr>';

                            //<tr><td></td><td></td><td>Descuento: </td><td id="DescuentoResumen" style="color: red;">$0.00</td></tr>

                        $('#resumenOtros').append(parteresumen); //imprime para el resumen

                        $("#subForm").prop("disabled", false);
                } catch(e) {
                    
                    console.log("(3328) No se pudo obtener los datos del controlador. Error:\n " + e);
                    showModError("");
                    $("#txtContenido").html("");
                    $("#txtContenido").html("Hubo un error al recibir datos.");
                    return false;
                }
            }else{

                console.log("Error: no se esta recibiendo informacion del controlador.");
                showModError("");
                $("#txtContenido").html("");
                $("#txtContenido").html("Hubo un error al recibir datos.");
                return false;
            }
        })
        .fail(function(response) {

            console.log('(7257) Error. Revisa.');

            $("#subForm").prop("disabled", true);
        });
    }
});

//Eliminacion de Impresiones
jQuery214(document).on("click", ".listImpEC", function () {

    $(this).closest('tr').remove();
    aImpEC = [];
    delBtnImpresiones(aImpEC, "listImpEC");
});

jQuery214(document).on("click", ".listImpFC", function () {

    $(this).closest('tr').remove();
    aImpFC = [];
    delBtnImpresiones(aImpFC, "listImpFC");
});

jQuery214(document).on("click", ".listImpET", function () {

    $(this).closest('tr').remove();
    aImpET = [];
    delBtnImpresiones(aImpET, "listImpET");
});

jQuery214(document).on("click", ".listImpFT", function () {

    $(this).closest('tr').remove();
    aImpFT = [];
    delBtnImpresiones(aImpFT, "listImpFT");
});


//Eliminacion de Acabados

jQuery214(document).on("click", ".listAcbEC", function () {

    $(this).closest('tr').remove();
    aAcbEC = [];
    delBtnAcabados(aAcbEC, "listAcbEC");
});

jQuery214(document).on("click", ".listAcbFC", function () {

    $(this).closest('tr').remove();
    aAcbFC = [];
    delBtnAcabados(aAcbFC, "listAcbFC");
});

jQuery214(document).on("click", ".listAcbET", function () {

    $(this).closest('tr').remove();
    aAcbET = [];
    delBtnAcabados(aAcbET, "listAcbET");
});

jQuery214(document).on("click", ".listAcbFT", function () {

    $(this).closest('tr').remove();
    aAcbFT = [];
    delBtnAcabados(aAcbFT, "listAcbFT");
});

//boton Descuento
jQuery214(document).on("click", "#btnSaveDescuento", function (){
        
    $("#descuentoModal").html("Descuento: (" + descuento + "%)");

    $("#descuentos").modal("hide");
});


jQuery214(document).on("click", "#btnCancelDescuento", function (){
    
    jQuery214('#DescuentoDrop').html("$0.00");

    $('#descuentos').find("input:checked").prop("checked", false);

    $("#descuentoModal").html("Descuento: (0%)");
    
    descuento = 0;
});

jQuery214(document).on("click", "#descuentoModal", function (){

    //showModal('d_grabado',true);
    $('#descuentos').modal('show');
});

jQuery214(document).on("click", ".d-check", function (){

    descuento = $(this).val();
});
