
// matriz de Impresiones
var aImpBC  = [];
var aImpCC  = [];
var aImpPC  = [];
var aImpBT  = [];
var aImpCT  = [];
var aImpFT  = [];
var aImpFET = [];
var aImpFIT = [];
var aImpFEC = [];
var aImpFIC = [];

// matriz de acabados
var aAcbBC  = [];
var aAcbCC  = [];
var aAcbPC  = [];
var aAcbBT  = [];
var aAcbCT  = [];
var aAcbFT  = [];
var aAcbFET = [];
var aAcbFIT = [];
var aAcbFEC = [];
var aAcbFIC = [];

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
    $('#resumenBCaj').empty();
    $('#resumenCirCaj').empty();
    $('#resumenFextCaj').empty();
    $('#resumenPomCaj').empty();
    $('#resumenFintCaj').empty();
    $('#resumenBasTap').empty();
    $('#resumenCirTap').empty();
    $('#resumenFTap').empty();
    $('#resumenFexTap').empty();
    $('#resumenFinTap').empty();
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

        case "BCaj":
            return 'list'+impAcb+'BC';
        break;

        case "CirCaj":
            return 'list'+impAcb+'CC';
        break;

        case "FextCaj":
            return 'list'+impAcb+'FEC';
        break;

        case "PomCaj":
            return 'list'+impAcb+'PC';
        break;

        case "FintCaj":
            return 'list'+impAcb+'FIC';
        break;

        case "BasTap":
            return 'list'+impAcb+'BT';
        break;

        case "CirTap":
            return 'list'+impAcb+'CT';
        break;

        case "FTap":
            return 'list'+impAcb+'FT';
        break;

        case "FexTap":
            return 'list'+impAcb+'FET';
        break;

        case "FinTap":
            return 'list'+impAcb+'FIT';
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

    if( aImpBC.length == 0 && aImpCC.length == 0 && aImpFEC.length == 0 && aImpPC.length == 0 && aImpFIC.length == 0 && aImpBT.length == 0 && aImpCT.length == 0 && aImpFT.length == 0 && aImpFET.length == 0 &&aImpFIT.length == 0 && aAcbBC.length == 0 && aAcbCC.length == 0 &&aAcbFEC.length == 0 && aAcbPC.length == 0 && aAcbFIC.length == 0 && aAcbBT.length == 0 && aAcbCT.length == 0 && aAcbFT.length == 0 && aAcbFET.length == 0 && aAcbFIT.length == 0 ){

        showModError("");
        $("#txtContenido").html();
        $("#txtContenido").html("Ingrese por lo menos un proceso");
        return false;
    }
}

function appndImp( aImp, lblaImp ){

    if ( aImp == undefined ) return false;
    if ( aImp['Offset'] !== undefined ) var offset        = aImp['Offset'];
    if ( aImp['Maquila'] !== undefined ) var offsetMaquila = aImp['Maquila'];
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

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">' + titulo + '</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ cantidad +'</td><td>Tipo: '+ tipo +'</td><td>Tintas: '+ tintas +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

            $('#table_proc_serigrafia').append(tr);

            $('#proceso_serigrafia_M1').show();

            var trResumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaImp).append(trResumen);
        }
    }
}

function changeData(url){

    //circular/saveCaja/
    $("#dataForm").prop("action","");
    $("#dataForm").prop("action", url);
}

/*la funcion appndImp con 3 argumentos es para la modificación y apendizacion
del mismo*/
function appndImpMod( aImp, lblaImp, arrPrincipal ){


    if ( aImp == undefined ) return false;
    if ( aImp['Offset'] !== undefined ) var offset        = aImp['Offset'];
    if ( aImp['Maquila'] !== undefined ) var offsetMaquila = aImp['Maquila'];
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

        case "BCaj":

            titulo = "Base del cajon";
        break;

        case "CirCaj":

            titulo = "Circunferencia del cajon";
        break;

        case "FextCaj":
        
            titulo = "Forro exterior del cajon";
        break;

        case "PomCaj":
        
            titulo = "Pompa del cajon";
        break;

        case "FintCaj":
        
            titulo = "Forro interior del cajon";
        break;

        case "BasTap":
        
            titulo = "Base tapa";
        break;

        case "CirTap":
        
            titulo = "Circunferencia tapa";
        break;

        case "FTap":
        
            titulo = "Forro de la tapa";
        break;

        case "FexTap":
            
            titulo = "Forro exterior de la tapa";
        break;

        case "FinTap":
        
            titulo = "Forro interior de la tapa";
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

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ cUnitario +'</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="2"></td></tr>';

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
            var largo  = laser[i]['largo'];
            var ancho  = laser[i]['ancho'];
            var cUnitario  = laser[i]['costo_unitario'];
            var total  = laser[i]['costo_tot_proceso'];

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo + 'x' + ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ cUnitario +'</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ cUnitario +'"></td></tr><tr><td colspan="2"></td></tr>';
            
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

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td><td>Ubicacion: '+ ubicacion +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ cUPlaca +'</td><td>'+ cTPlaca +'</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';

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
            var tipo      = laminado[i]['tipoGrabado'];
            var largo     = laminado[i]['Largo'];
            var ancho     = laminado[i]['Ancho'];
            var total     = laminado[i]['costo_tot_proceso'];
            var costo     = laminado[i]['costo_unitario'];

            var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ costo +'</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="2"></td></tr>';

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

            var tr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ tipo +'</td><td>Tamaño: '+ largo +'x'+ ancho +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ cUArr +'</td><td>'+ cTArr +'</td></tr><tr><td>Tiro</td><td>'+ cUTir +'</td><td>'+ cTTir +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ total +'<input type="hidden" class="prices" value="'+ total +'"></td></tr><tr><td colspan="3"></td></tr>';


            $('#table_proc_Suaje').append(tr);

            $('#proceso_suaje_M1').show();

            var trResumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ total +'<input type="hidden" class="pricesresumenempalme" value="'+ total +'"></td><td></td></tr>';

            $('#resumen'+lblaAcb).append(trResumen );      
        }
    }
}

//pendiente
function appndAcbMod( aAcb, lblaAcb, arrPrincipal ){

    if ( aAcb == undefined ) return false;
    var barniz        = aAcb['Barniz'];
    var laser = aAcb['Laser'];
    var grabado       = aAcb['Grabado'];
    var hotStamping    = aAcb['HotStamping'];
    var laminado    = aAcb['Laminado'];
    var suaje    = aAcb['Suaje'];

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

        if (nombreP == undefined ) {
            
            var nombreP      = arrPapel[seccion]['nombre'];
            var ancho      = arrPapel[seccion]['ancho'];
            var largo      = arrPapel[seccion]['largo'];
            var cortes       = arrPapel[seccion]['cortes'];
            var totalPliegos = arrPapel[seccion]['pliegos'];
            var costoTotal   = parseFloat(arrPapel[seccion]['costo_tot_pliegos']);
        }

        switch(seccion){

            case "papel_BCaj":

                titulo = "Base cajon";
            break;

            case "papel_CirCaj":

                titulo = "Circunferencia del cajon";
            break;

            case "papel_FextCaj":

                titulo = "Forro exterior del cajon";
            break;

            case "papel_PomCaj":

                titulo = "Pompa del cajon";
            break;

            case "papel_FintCaj":

                titulo = "Forro interior del cajon";
            break;

            case "papel_BasTap":

                titulo = "Base tapa";
            break;

            case "papel_CirTap":

                titulo = "Circunferencia tapa";
            break;

            case "papel_ForTap":

                titulo = "Forro de la tapa";
            break;

            case "papel_FexTap":

                titulo = "Forro exterior de la tapa";
            break;

            case "papel_FinTap":

                titulo = "Forro interior de la tapa";
            break;
        }

        var tr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ titulo +'</td></tr><tr><td>Material</td><td>'+ nombreP +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ largo +' Ancho: '+ ancho +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ cortes +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ totalPliegos +'</td></tr><tr><td>Costo Total</td><td>$'+ costoTotal +'<input type="hidden" class="prices" value="' + costoTotal + '"></td></tr>';

        $('#table_papeles_tr').append(tr);

        var trResumen = '<tr><td></td><td>Papel '+ nombreP +'</td><td>$'+ costoTotal +'<input type="hidden" class="pricesresumenempalme" value="' + costoTotal + '"></td><td></td></tr>';

        $('#resumenEmpalme').append(trResumen);
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

                var tr  = '<tr id="AcLamEmp"><td style="text-align: left;" class="textAcbEmp">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipo +'</td><td class="' + tabla + ' img_delete"></td></tr>';

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

                var tr  = '<tr id="AcHSEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Color: '+ color +', Medidas: '+ largo +'x'+ ancho +'</span></td><td style="display: none;" >'+ tipo +'</td><td style="display: none;" >' + idColor + '</td><td style="display: none;" >' + color + '</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td class="' + tabla + ' img_delete"></td></tr>';

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

                var tr  = '<tr id="AcGrabEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Medidas: '+ largo +'x'+ ancho +', Ubicacion: '+ ubicacion +'</span></td><td style="display: none;">'+ tipo +'</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td style="display: none;">'+ ubicacion +'</td><td class="' + tabla + ' img_delete"></td></tr>';

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

                var tr  = '<tr id="AcSuajeEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipo +', Medidas: '+ largo +'x'+ ancho +'</span></td><td style="display: none;">'+ tipo +'</td><td style="display: none;">'+ largo +'</td><td style="display: none;">'+ ancho +'</td><td class="' + tabla + ' img_delete"></td></tr>';

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

                var tr = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' + tipo + ', Medidas: ' + largo + 'x' +  ancho + '</span></td><td style="display: none;">' + tipo + '</td><td style="display: none;">' + largo + '</td><td style="display: none;">' + ancho + '</td><td class="' + tabla + ' img_delete"></td></tr>';

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

                    var tr  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipo + ', Medidas: ' + largo + 'x' + ancho +'</span></td><td style="display: none">' + tipo + '</td><td style="display: none">' + largo + '</td><td style="display: none">' + ancho + '</td><td class="' + tabla + ' img_delete"></td></tr>';

                    arrPapeles.push({"Tipo_acabado": opAcb, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho});
                } else {

                    var tr  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: ' +  tipo + '</span></td><td style="display: none">' + tipo + '</td><td class="' + tabla + ' img_delete"></td></tr>';

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

                var acb  = '<tr id="AcEspecialesEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoEspeciales +'</span></td><td class="tipoEspeciales" style="display: none">'+ tipoEspeciales +'<input id="tipoEspeciales" name="tipoEspeciales" type="hidden" value="'+ idtipoEspeciales +'"></td><td class="' + tabla + ' img_delete"></td></tr>';

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

            var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td style="display: none;">'+ tintas +'</td><td style="display: none;">'+ tipo +'</td><td class="' + tabla +' img_delete"></td></tr>';

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

        var tipo       = $("#SelectImpTipoSeri option:selected").text();
        var precio = $("#SelectImpTipoSeri option:selected").data('precio');
        var tintas     = document.getElementById('tintasS').value;
        var nuloo = document.getElementById('SelectImpTipoSeri').value;

        if (nuloo == 'selected') {

            document.getElementById('alerterrorimp').innerHTML = alertDiv;

        } else {

            document.getElementById('alerterrorimp').innerHTML = "";

            var imp  = '<tr id="ImpSerEmp"><td class="textImp">' + opImp +'</td></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintas +', Tipo: '+ tipo +'</span></td><td style="display: none;">'+ tintas +'</td><td style="display: none;">'+ tipo +'</td><td class="' + tabla +' img_delete"></td></tr>';

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

        var tipoGrabadoHS = "";
        var ColorHS       = "";
        var LargoHS_str   = "";
        var AnchoHS_str   = "";
        var LargoHS       = 0;
        var AnchoHS       = 0;

        var tipoGrabado = "";
        var Largo_str   = "";
        var Ancho_str   = "";
        var ubicacion   = "";
        var Largo       = 0;
        var Ancho       = 0;


        tipo_acabado = $(tr).find('td:eq(0)').text();

        if (tipo_acabado == "HotStamping") {

            tipoGrabadoHS = $(tr).find('td:eq(2)').text();
            ColorHS       = $(tr).find('td:eq(4)').text();
            LargoHS_str   = $(tr).find('td:eq(5)').text();
            AnchoHS_str   = $(tr).find('td:eq(6)').text();

            LargoHS = parseInt(LargoHS_str, 10);
            AnchoHS = parseInt(AnchoHS_str, 10);


            arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});

        }


        if (tipo_acabado == "Grabado") {

            tipoGrabado = $(tr).find('td:eq(2)').text();
            Largo_str   = $(tr).find('td:eq(3)').text();
            Ancho_str   = $(tr).find('td:eq(4)').text();
            ubicacion   = $(tr).find('td:eq(5)').text();

            Largo = parseInt(Largo_str, 10);
            Ancho = parseInt(Ancho_str, 10);

            arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
        }


        if (tipo_acabado == "Laminado") {

            tipoGrabado = $(tr).find('td:eq(2)').text();

            arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
        }


        if (tipo_acabado == "Suaje") {

            tipoGrabado = $(tr).find('td:eq(2)').text();
            Largo_str   = $(tr).find('td:eq(3)').text();
            Ancho_str   = $(tr).find('td:eq(4)').text();

            Largo = parseInt(Largo_str, 10);
            Ancho = parseInt(Ancho_str, 10);

            arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
        }


        if (tipo_acabado == "Barniz UV") {

            tipo = $(tr).find('td:eq(2)').text();
            largo       = parseInt($(tr).find('td:eq(3)').text());
            ancho       = parseInt($(tr).find('td:eq(4)').text());

            if(tipo == "Registro Mate" || tipo == "Registro Brillante"){

                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipo, "Largo": largo, "Ancho": ancho});

            } else {

                arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipo, "Largo": null, "Ancho": null});
            }
        }

        if (tipo_acabado == "Corte Laser") {

            tipoGrabado = $(tr).find('td:eq(2)').text();
            Largo_str   = $(tr).find('td:eq(3)').text();
            Ancho_str   = $(tr).find('td:eq(4)').text();

            Largo = parseInt(Largo_str, 10);
            Ancho = parseInt(Ancho_str, 10);

            arrPapeles.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoLaser": Largo, "AnchoLaser": Ancho});
        }

    });
    desactivarBtn();
}


function delBtnImpresiones(arrPapeles, tabla) {

    var TableData       = "";
    var tipo_imp_offset = "";

    $("#" + tabla + " tr").each(function(row, tr) {

        var opImp   = $(tr).find('td:eq(0)').text(); // IDopImp
        var tintas  = parseInt($(tr).find('td:eq(2)').text(),10);
        var tipo    = $(tr).find('td:eq(3)').text();

        if (opImp == 'Offset') {

            var idtipoOff = parseInt($("#tipoOffEmp").val());

            arrPapeles.push({"Tipo_impresion": opImp, "tintas": tintas, "tipo_offset": tipo});
        } else if (opImp == "Digital") {

            arrPapeles.push({"Tipo_impresion": opImp});

        } else if (opImp == "Serigrafia") {

            var idtipoSeri = parseInt($("#tipoSeriEmp").val());

            arrPapeles.push({"Tipo_impresion": opImp,  "tintas": tintas, "tipo_offset": tipo});
        }
    });
    console.log(arrPapeles);
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

    $('#form_modelo_1').hide();
    $('#form_modelo_1_derecho').hide();
    $('.selectormodelo').hide();
    $('#resumentodocaja').show();

}); 

$(document).on('click', '#btnQuitarResumen', function(event) {

    $('.selectormodelo').show();
    $('#form_modelo_1').show();
    $('#form_modelo_1_derecho').show('normal');
    $('#resumentodocaja').hide();
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
    var texto = $("#optBasCajon_chosen span").html();

    if(chk) {

        $("#optCirCajon_chosen span").html(texto);
        $("#optExtCajon_chosen span").html(texto);
        $("#optPomCajon_chosen span").html(texto);
        $("#optIntCajon_chosen span").html(texto);
        $("#optBasTapa_chosen span").html(texto);
        $("#optCirTapa_chosen span").html(texto);
        $("#optForTapa_chosen span").html(texto);
        $("#optExtTapa_chosen span").html(texto);
        $("#optIntTapa_chosen span").html(texto);

        $("#optCirCajon option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optExtCajon option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optPomCajon option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optIntCajon option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optBasTapa option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optCirTapa option[data-nombre='" + texto +"']").prop("selected",true);

        $("#optForTapa option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optExtTapa option[data-nombre='" + texto +"']").prop("selected",true);
        $("#optIntTapa option[data-nombre='" + texto +"']").prop("selected",true);


        papel_elegido = true;

        $("#optCirCajon").addClass('paper_selected');
        $("#optExtCajon").addClass('paper_selected');
        $("#optPomCajon").addClass('paper_selected');
        $("#optIntCajon").addClass('paper_selected');
        $("#optBasTapa").addClass('paper_selected');
        $("#optCirTapa").addClass('paper_selected');
        $("#optForTapa").addClass('paper_selected');
        $("#optExtTapa").addClass('paper_selected');
        $("#optIntTapa").addClass('paper_selected');
        $('#papers_config_button').hide();
    } else {

        $("#optCirCajon_chosen span").html("Elegir tipo de papel");
        $("#optExtCajon_chosen span").html("Elegir tipo de papel");
        $("#optPomCajon_chosen span").html("Elegir tipo de papel");
        $("#optIntCajon_chosen span").html("Elegir tipo de papel");
        $("#optBasTapa_chosen span").html("Elegir tipo de papel");
        $("#optCirTapa_chosen span").html("Elegir tipo de papel");
        $("#optForTapa_chosen span").html("Elegir tipo de papel");
        $("#optExtTapa_chosen span").html("Elegir tipo de papel");
        $("#optIntTapa_chosen span").html("Elegir tipo de papel");

        $("#optCirCajon option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optExtCajon option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optPomCajon option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optIntCajon option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optBasTapa option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optCirTapa option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optForTapa option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optExtTapa option[data-nombre='" + texto +"']").prop("selected",false);
        $("#optIntTapa option[data-nombre='" + texto +"']").prop("selected",false);

        $("#optCirCajon").val(null);
        $("#optExtCajon").val(null);
        $("#optPomCajon").val(null);
        $("#optIntCajon").val(null);
        $("#optBasTapa").val(null);
        $("#optCirTapa").val(null);
        $("#optForTapa").val(null);
        $("#optExtTapa").val(null);
        $("#optIntTapa").val(null);
        papel_elegido = false;

        $("#optCirCajon").removeClass('paper_selected');
        $("#optExtCajon").removeClass('paper_selected');
        $("#optPomCajon").removeClass('paper_selected');
        $("#optIntCajon").removeClass('paper_selected');
        $("#optBasTapa").removeClass('paper_selected');
        $("#optCirTapa").removeClass('paper_selected');
        $("#optForTapa").removeClass('paper_selected');
        $("#optExtTapa").removeClass('paper_selected');
        $("#optIntTapa").removeClass('paper_selected');
        $('#papers_config_button').show();
    }
});

//boton eliminar. Es el que hace la magia ;)
jQuery214(document).on("click", ".delete", function () {

    $(this).closest('tr').remove();
});


//Acabados
$('#btnAcabados').click(function() {

    switch(divisionesAcbs){

        case "base_cajon":

            saveBtnAcabados(aAcbBC,"listAcbBC");
            
            break;
        case "circunferencia_cajon":

            saveBtnAcabados(aAcbCC,"listAcbCC");
            
            break;
        case "forro_exterior_cajon":

            saveBtnAcabados(aAcbFEC,"listAcbFEC");
            
            break;
        case "pompa_cajon":

            saveBtnAcabados(aAcbPC,"listAcbPC");
            
            break;
        case "forro_interior_cajon":

            saveBtnAcabados(aAcbFIC,"listAcbFIC");
            
            break;
        case "base_tapa":

            saveBtnAcabados(aAcbBT,"listAcbBT");
            
            break;
        case "circunferencia_tapa":

            saveBtnAcabados(aAcbCT,"listAcbCT");
            
            break;
        case "forro_tapa":

            saveBtnAcabados(aAcbFT,"listAcbFT");
            
            break;
        case "forro_exterior_tapa":

            saveBtnAcabados(aAcbFET,"listAcbFET");
            
            break;
        case "forro_interior_tapa":

            saveBtnAcabados(aAcbFIT,"listAcbFIT");
            
            break;
    }
});

//Impresiones
$("#btnImpresiones").click( function () {

    switch(divisionesImps){

        case "base_cajon":

            saveBtnImpresiones(aImpBC,"listImpBC");
            
            break;
        case "circunferencia_cajon":

            saveBtnImpresiones(aImpCC,"listImpCC");
            
            break;
        case "forro_exterior_cajon":

            saveBtnImpresiones(aImpFEC,"listImpFEC");
            
            break;
        case "pompa_cajon":

            saveBtnImpresiones(aImpPC,"listImpPC");
            
            break;
        case "forro_interior_cajon":

            saveBtnImpresiones(aImpFIC,"listImpFIC");
            
            break;
        case "base_tapa":

            saveBtnImpresiones(aImpBT,"listImpBT");
            
            break;
        case "circunferencia_tapa":

            saveBtnImpresiones(aImpCT,"listImpCT");
            
            break;
        case "forro_tapa":

            saveBtnImpresiones(aImpFT,"listImpFT");
            
            break;
        case "forro_exterior_tapa":

            saveBtnImpresiones(aImpFET,"listImpFET");
            
            break;
        case "forro_interior_tapa":

            saveBtnImpresiones(aImpFIT,"listImpFIT");
            
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

    var precio;
    var papel;

    var odt         = $("#odt").val();
    var diametro    = $("#diametro").val();
    var profundidad = $("#profundidad").val();
    var altura      = $("#altura_tapa").val();
    var grosor      = $("#grosor_carton").val();
    var cantidad    = $("#qty").val();

    if( revisarPropiedades(odt,"ODT") == false ) return false;

    if( revisarPropiedades(diametro,"diametro") == false ) return false;
    
    if( revisarPropiedades(profundidad,"profundidad") == false ) return false;
    
    if( revisarPropiedades(altura,"altura") == false ) return false;

    if( revisarPropiedades(grosor,"grosor") == false ) return false;
    
    if( revisarPropiedades(cantidad,"cantidad") == false ) return false;

    //if( revisarImpAcb() == false ) return false;


    var grabar      = "NO";
    var optBasCajon = $("#optBasCajon").val();
    var optCirCajon = $("#optCirCajon").val();
    var optExtCajon = $("#optExtCajon").val();
    var optPomCajon = $("#optPomCajon").val();
    var optIntCajon = $("#optIntCajon").val();
    var optBasTapa  = $("#optBasTapa").val();
    var optCirTapa  = $("#optCirTapa").val();
    var optForTapa  = $("#optForTapa").val();
    var optExtTapa  = $("#optExtTapa").val();
    var optIntTapa  = $("#optIntTapa").val();

    if( optBasCajon == null || optCirCajon == null || optExtCajon == null || optPomCajon == null || optIntCajon == null || optBasTapa == null || optCirTapa == null || optForTapa == null || optExtTapa == null || optIntTapa == null ){
        
        var cadena = "";

        if( optBasCajon == null ) cadena += "Base cajon <br>";
        if( optCirCajon == null ) cadena += "Circunferencia cajon <br>";
        if( optExtCajon == null ) cadena += "Forro exterior cajon <br>";
        if( optPomCajon == null ) cadena += "Pompa cajon";
        if( optIntCajon == null ) cadena += "Forro interior cajon <br>";
        if( optBasTapa == null ) cadena += "Base tapa <br>";
        if( optCirTapa == null ) cadena += "Circunferencia tapa <br>";
        if( optForTapa == null ) cadena += "Forro tapa <br>";
        if( optExtTapa == null ) cadena += "Forro exterior tapa <br>";
        if( optIntTapa == null ) cadena += "Forro interior tapa <br>";

        showModError("");

        $("#txtContenido").attr("align", "left");
        $("#txtContenido").html("");
        $("#txtContenido").html("Debe de seleccionar un papel para las siguientes secciones: " + cadena + ".");

    } else {

        if (typeof formData !== 'undefined' && formData.length > 0) {

            formData = [];
        }

        var formData      = $("#caja-form").serializeArray();

        // impresion
        var aImpBC_tmp  = JSON.stringify(aImpBC, null, 4);
        var aImpCC_tmp  = JSON.stringify(aImpCC, null, 4);
        var aImpFEC_tmp = JSON.stringify(aImpFEC, null, 4);
        var aImpPC_tmp  = JSON.stringify(aImpPC, null, 4);
        var aImpFIC_tmp = JSON.stringify(aImpFIC, null, 4);
        var aImpBT_tmp  = JSON.stringify(aImpBT, null, 4);
        var aImpCT_tmp  = JSON.stringify(aImpCT, null, 4);
        var aImpFT_tmp  = JSON.stringify(aImpFT, null, 4);
        var aImpFET_tmp = JSON.stringify(aImpFET, null, 4);
        var aImpFIT_tmp = JSON.stringify(aImpFIT, null, 4);

        // acabados
        var aAcbBC_tmp  = JSON.stringify(aAcbBC, null, 4);
        var aAcbCC_tmp  = JSON.stringify(aAcbCC, null, 4);
        var aAcbFEC_tmp = JSON.stringify(aAcbFEC, null, 4);
        var aAcbPC_tmp  = JSON.stringify(aAcbPC, null, 4);
        var aAcbFIC_tmp = JSON.stringify(aAcbFIC, null, 4);
        var aAcbBT_tmp  = JSON.stringify(aAcbBT, null, 4);
        var aAcbCT_tmp  = JSON.stringify(aAcbCT, null, 4);
        var aAcbFT_tmp  = JSON.stringify(aAcbFT, null, 4);
        var aAcbFET_tmp = JSON.stringify(aAcbFET, null, 4);
        var aAcbFIT_tmp = JSON.stringify(aAcbFIT, null, 4);

        // cierres
        var aCierres_tmp = JSON.stringify(aCierres, null, 4);


        // bancos
        var aBancos_tmp = JSON.stringify(aBancos, null, 4);


        // accesorios
        var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);

        var id_cliente_tmp = JSON.stringify(cliente, null, 4);
        
        formData.push({name: 'id_cliente', value: id_cliente_tmp});
        
        formData.push({name: 'aImpBCaj', value: aImpBC_tmp});
        formData.push({name: 'aImpCirCaj', value: aImpCC_tmp});
        formData.push({name: 'aImpFextCaj', value: aImpFEC_tmp});
        formData.push({name: 'aImpPomCaj', value: aImpPC_tmp});
        formData.push({name: 'aImpFintCaj', value: aImpFIC_tmp});
        formData.push({name: 'aImpBTapa', value: aImpBT_tmp});
        formData.push({name: 'aImpCirTapa', value: aImpCT_tmp});
        formData.push({name: 'aImpFTapa', value: aImpFT_tmp});
        formData.push({name: 'aImpFextTapa', value: aImpFET_tmp});
        formData.push({name: 'aImpFintTapa', value: aImpFIT_tmp});

        formData.push({name: 'aAcbBCaj', value: aAcbBC_tmp});
        formData.push({name: 'aAcbCirCaj', value: aAcbCC_tmp});
        formData.push({name: 'aAcbFextCaj', value: aAcbFEC_tmp});
        formData.push({name: 'aAcbPomCaj', value: aAcbPC_tmp});
        formData.push({name: 'aAcbFintCaj', value: aAcbFIC_tmp});
        formData.push({name: 'aAcbBTapa', value: aAcbBT_tmp});
        formData.push({name: 'aAcbCirTapa', value: aAcbCT_tmp});
        formData.push({name: 'aAcbFTapa', value: aAcbFT_tmp});
        formData.push({name: 'aAcbFextTapa', value: aAcbFET_tmp});
        formData.push({name: 'aAcbFintTapa', value: aAcbFIT_tmp});

        formData.push({name: 'aCierres', value: aCierres_tmp});
        formData.push({name: 'aBancos', value: aBancos_tmp});
        formData.push({name: 'aAccesorios', value: aAccesorios_tmp});
        formData.push({name: 'descuento_pctje', value: descuento});
        formData.push({name: 'grabar', value: grabar});

        var modificar_odt = "NO";

        formData.push({name: 'modificar', value: modificar_odt});


        aImpBC_tmp      = [];
        aImpCC_tmp      = [];
        aImpFEC_tmp     = [];
        aImpPC_tmp      = [];
        aImpFIC_tmp     = [];
        aImpBT_tmp      = [];
        aImpCT_tmp      = [];
        aImpFT_tmp      = [];
        aImpFET_tmp     = [];
        aImpFIT_tmp     = [];

        aAcbBC_tmp      = [];
        aAcbCC_tmp      = [];
        aAcbFEC_tmp     = [];
        aAcbPC_tmp      = [];
        aAcbFIC_tmp     = [];
        aAcbBT_tmp      = [];
        aAcbCT_tmp      = [];
        aAcbFT_tmp      = [];
        aAcbFET_tmp     = [];
        aAcbFIT_tmp     = [];

        aCierres_tmp    = [];
        aBancos_tmp     = [];
        aAccesorios_tmp = [];

        $.ajax({
            type:"POST",
            //dataType: "json",
            url: $('#caja-form').attr('action'),
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
                        
                        var trBaseCajon   = '<tr><td><b>Base Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trCirCajon    = '<tr><td><b>Circunferencia Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trFExtCajon  = '<tr><td><b>Forro Exterior Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trPomCajon    = '<tr><td><b>Pompa Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trFIntCajon    = '<tr><td><b>Forro Interior Cajón</b></td><td></td><td></td><td></td></tr>';
                        var trBasTapa    = '<tr><td><b>Base Tapa</b></td><td></td><td></td><td></td></tr>';
                        var trCirTapa    = '<tr><td><b>Circunferencia Tapa</b></td><td></td><td></td><td></td></tr>';
                        var trFTapa    = '<tr><td><b>Forro Tapa</b></td><td></td><td></td><td></td></tr>';
                        var trFExtTapa    = '<tr><td><b>Forro Exterior Tapa</b></td><td></td><td></td><td></td></tr>';
                        var trFIntTapa    = '<tr><td><b>Forro Interior Tapa</b></td><td></td><td></td><td></td></tr>';
                        var trMensajeria = '<tr><td><b>Costo Mensajería</b></td><td></td><td></td><td></td></tr>';
                        var trEmpaque = '<tr><td><b>Costo Empaque</b></td><td></td><td></td><td></td></tr>';
                        var trEncuadernacion = '<tr><td><b>Encuadernación</b></td><td></td><td></td><td></td></tr>';

                        //imprime titulos para resumen
                        $('#resumenBCaj').append(trBaseCajon);
                        $('#resumenCirCaj').append(trCirCajon);
                        $('#resumenFextCaj').append(trFExtCajon);
                        $('#resumenPomCaj').append(trPomCajon);
                        $('#resumenFintCaj').append(trFIntCajon);

                        $('#resumenBasTap').append(trBasTapa);
                        $('#resumenCirTap').append(trCirTapa);
                        $('#resumenFTap').append(trFTapa);
                        $('#resumenFexTap').append(trFExtTapa);
                        $('#resumenFinTap').append(trFIntTapa);

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

                        appndPapeles(respuesta,'papel_BCaj');
                        appndPapeles(respuesta,'papel_CirCaj');
                        appndPapeles(respuesta,'papel_FextCaj');
                        appndPapeles(respuesta,'papel_PomCaj');
                        appndPapeles(respuesta,'papel_FintCaj');
                        appndPapeles(respuesta,'papel_BasTap');
                        appndPapeles(respuesta,'papel_CirTap');
                        appndPapeles(respuesta,'papel_ForTap');
                        appndPapeles(respuesta,'papel_FexTap');
                        appndPapeles(respuesta,'papel_FinTap');  

                    // IMPRESIONES
                    
                        appndImp( respuesta['aImpBCaj'], "BCaj" );
                        appndImp( respuesta['aImpCirCaj'], "CirCaj" );
                        appndImp( respuesta['aImpFextCaj'], "FextCaj" );
                        appndImp( respuesta['aImpPomCaj'], "PomCaj" );
                        appndImp( respuesta['aImpFintCaj'], "FintCaj" );
                        appndImp( respuesta['aImpBasTap'], "BasTap" );
                        appndImp( respuesta['aImpCirTap'], "CirTap" );
                        appndImp( respuesta['aImpFTap'], "FTap" );
                        appndImp( respuesta['aImpFexTap'], "FexTap" );
                        appndImp( respuesta['aImpFinTap'], "FinTap" );

                    // ACABADOS
                        appndAcb( respuesta['aAcbBCaj'], "BCaj" );
                        appndAcb( respuesta['aAcbCirCaj'], "CirCaj" );
                        appndAcb( respuesta['aAcbFextCaj'], "FextCaj" );
                        appndAcb( respuesta['aAcbPomCaj'], "PomCaj" );
                        appndAcb( respuesta['aAcbFintCaj'], "FintCaj" );
                        appndAcb( respuesta['aAcbBasTap'], "BasTap" );
                        appndAcb( respuesta['aAcbCirTap'], "CirTap" );
                        appndAcb( respuesta['aAcbFTapa'], "FTap" );
                        appndAcb( respuesta['aAcbFexTap'], "FexTap" );
                        appndAcb( respuesta['aAcbFinTap'], "FinTap" );

                    // BANCOS
                        
                        if(respuesta['Bancos']) {

                            var titulo = '<tr><td><b>Bancos</b></td><td></td><td></td><td></td></tr>';
                            $('#resumenBancos').append(titulo);

                            for(var cont = 0; cont < respuesta['Bancos'].length; cont++) {

                                var tipo = respuesta['Bancos'][cont]['Tipo_banco'];
                                var costoU = parseFloat(respuesta['Bancos'][cont]['costo_unit_banco']);
                                var costoT = parseFloat(respuesta['Bancos'][cont]['costo_tot_proceso']);

                                tr = '<tr><td>' + tipo +'</td><td>' + respuesta['Bancos'][cont]['Suaje'] + '</td><td>$' + costoU +'<td>' + costoT + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ costoT +'"></td></tr>';

                                $('#tabla_bancos').append(tr);
                                
                                var resumen = '<tr><td></td><td>' + tipo +'</td><td></td><td>$'+ costoT +'<input type="hidden" class="pricesresumenbancos" value="'+ costoT +'"></td><td></td></tr>';

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
                                
                                tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipoCierre + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td></td><td>$' + costoU +'</td><td>' + costoT + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ costoT +'"></td></tr>';

                                $('#tabla_cierres').append(tr);

                                var resumen = '<tr><td></td><td>' + tipo +'</td><td>$'+ costoT +'"></td><td></td></tr>';

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
                                var tipo = "N/A";
                                var costoU = parseFloat(respuesta['Accesorios'][cont]['costo_unit_accesorio']);
                                var costoT = parseFloat(respuesta['Accesorios'][cont]['costo_tot_proceso']);
                                if( respuesta['Accesorios'][cont]['Color'] != null ){

                                    color = respuesta['Accesorios'][cont]['Color'];
                                }
                                if( respuesta['Accesorios'][cont]['Largo'] != null ){

                                    largoAncho = respuesta['Accesorios'][cont]['Largo'] + "x" + respuesta['Accesorios'][cont]['Ancho'];
                                }
                                if( respuesta['Accesorios'][cont]['Tipo'] != null ){

                                    tipo = respuesta['Accesorios'][cont]['Tipo'];
                                }

                                tr = '<tr style="background: steelblue;color: white;"><td style="color: white">Tipo: ' + tipo + '</td><td style="color: white">Color: ' + color + ' </td><td style="color: white">Tamaño: ' + largoAncho + ' </td></tr><tr><td></td><td>Costo Unitario</td><td>Total</td></tr><tr><td>' + tipo +'</td><td>$' + costoU +'<td>' + costoT + '</td><td style="display: none;"><input type="hidden" class="prices" value="'+ costoT +'"></td></tr>';

                                $('#tabla_accesorios').append(tr);

                                var resumen = '<tr><td></td><td>' + tipo +'</td><td></td><td>$'+ costoT +'<input type="hidden" class="pricesresumenbancos" value="'+ costoT +'"></td></tr>';

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
jQuery214(document).on("click", ".listImpBC", function () {

    $(this).closest('tr').remove();
    aImpBC = [];
    delBtnImpresiones(aImpBC, "listImpBC");
});

jQuery214(document).on("click", ".listImpCC", function () {

    $(this).closest('tr').remove();
    aImpCC = [];
    delBtnImpresiones(aImpCC, "listImpCC");
});

jQuery214(document).on("click", ".listImpFEC", function () {

    $(this).closest('tr').remove();
    aImpFEC = [];
    delBtnImpresiones(aImpFEC, "listImpFEC");
});

jQuery214(document).on("click", ".listImpPC", function () {

    $(this).closest('tr').remove();
    aImpPC = [];
    delBtnImpresiones(aImpPC, "listImpPC");
});

jQuery214(document).on("click", ".listImpFIC", function () {

    $(this).closest('tr').remove();
    aImpFIC = [];
    delBtnImpresiones(aImpFIC, "listImpFIC");
});

jQuery214(document).on("click", ".listImpBT", function () {

    $(this).closest('tr').remove();
    aImpBT = [];
    delBtnImpresiones(aImpBT, "listImpBT");
});

jQuery214(document).on("click", ".listImpCT", function () {

    $(this).closest('tr').remove();
    aImpCT = [];
    delBtnImpresiones(aImpCT, "listImpCT");
});

jQuery214(document).on("click", ".listImpFT", function () {

    $(this).closest('tr').remove();
    aImpFT = [];
    delBtnImpresiones(aImpFT, "listImpFT");
});

jQuery214(document).on("click", ".listImpFET", function () {

    $(this).closest('tr').remove();
    aImpFET = [];
    delBtnImpresiones(aImpFET, "listImpFET");
});

jQuery214(document).on("click", ".listImpFIT", function () {

    $(this).closest('tr').remove();
    aImpFIT = [];
    delBtnImpresiones(aImpFIT, "listImpFIT");
});


//Eliminacion de Acabados

jQuery214(document).on("click", ".listAcbBC", function () {

    $(this).closest('tr').remove();
    aAcbBC = [];
    delBtnAcabados(aAcbBC, "listAcbBC");
});

jQuery214(document).on("click", ".listAcbCC", function () {

    $(this).closest('tr').remove();
    aAcbCC = [];
    delBtnAcabados(aAcbCC, "listAcbCC");
});

jQuery214(document).on("click", ".listAcbFEC", function () {

    $(this).closest('tr').remove();
    aAcbFEC = [];
    delBtnAcabados(aAcbFEC, "listAcbFEC");
});

jQuery214(document).on("click", ".listAcbPC", function () {

    $(this).closest('tr').remove();
    aAcbPC = [];
    delBtnAcabados(aAcbPC, "listAcbPC");
});

jQuery214(document).on("click", ".listAcbFIC", function () {

    $(this).closest('tr').remove();
    aAcbFIC = [];
    delBtnAcabados(aAcbFIC, "listAcbFIC");
});

jQuery214(document).on("click", ".listAcbBT", function () {

    $(this).closest('tr').remove();
    aAcbBT = [];
    delBtnAcabados(aAcbBT, "listAcbBT");
});

jQuery214(document).on("click", ".listAcbCT", function () {

    $(this).closest('tr').remove();
    aAcbCT = [];
    delBtnAcabados(aAcbCT, "listAcbCT");
});

jQuery214(document).on("click", ".listAcbFT", function () {

    $(this).closest('tr').remove();
    aAcbFT = [];
    delBtnAcabados(aAcbFT, "listAcbFT");
});

jQuery214(document).on("click", ".listAcbFET", function () {

    $(this).closest('tr').remove();
    aAcbFET = [];
    delBtnAcabados(aAcbFET, "listAcbFET");
});

jQuery214(document).on("click", ".listAcbFIT", function () {

    $(this).closest('tr').remove();
    aAcbFIT = [];
    delBtnAcabados(aAcbFIT, "listAcbFIT");
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