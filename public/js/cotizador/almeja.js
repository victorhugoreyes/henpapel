function vistaResumen(opcion){

    switch( opcion ){

        case "show":
            $('#form_modelo_0').hide();
            $('#form_modelo_1').hide();
            $('#form_modelo_1_derecho').hide();
            $('#form_modelo_2').hide();
            $('#form_modelo_2_derecho').hide();
            $('#form_modelo_3').hide();
            $('#form_modelo_3_derecho').hide();
            $('#form_modelo_4').hide();
            $('#form_modelo_5').hide();
            $('#form_modelo_6').hide();
            $('#form_modelo_7').hide();
            $('.selectormodelo').hide();
            $('#resumentodocaja').show();
        break;

        case "hide":
            $('.selectormodelo').show();
            $('#form_modelo_1').show();
            $('#form_modelo_1_derecho').show('normal');
            $('#form_modelo_0').hide();
            $('#form_modelo_2').hide();
            $('#form_modelo_2_derecho').hide();
            $('#form_modelo_3').hide();
            $('#form_modelo_3_derecho').hide();
            $('#form_modelo_4').hide();
            $('#form_modelo_5').hide();
            $('#form_modelo_6').hide();
            $('#form_modelo_7').hide();
            $('#resumentodocaja').hide();
        break;
    }
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
function getIdClient() {

    var url     = location.href;
    var cliente = url.split("?");

    cliente = cliente[1].split("=");
    cliente = cliente[1].split("&");
    cliente = parseInt(cliente[0]);

    return cliente;
}
function hideSelectImp(select){

    $('#opImpresionOffset').hide('slow');
    $('#opImpresionDigital').hide('slow');
    $('#opImpresionSerigrafia').hide('slow');

    $('#opImpresionOffsetFcajon').hide('slow');
    $('#opImpresionDigitalFcajon').hide('slow');
    $('#opImpresionSerigrafiaFcajon').hide('slow');

    $('#opImpresionOffsetFcartera').hide('slow');
    $('#opImpresionDigitalFcartera').hide('slow');
    $('#opImpresionSerigrafiaFcartera').hide('slow');

    $('#opImpresionOffsetGuarda').hide('slow');
    $('#opImpresionDigitalGuarda').hide('slow');
    $('#opImpresionSerigrafiaGuarda').hide('slow');

    $('#'+select).show('slow');

}

function activarBtn() {

    $("#btnabrebancoemp").prop("disabled",false);
    $("#btnabreaccesorios").prop("disabled",false);
    $("#btnabrecierres").prop("disabled",false);
}


function desactivarBtn() {
    
    if( aImp.length == 0 && aImpFCaj.length == 0 && aImpFCar.length == 0 && aImpG.length == 0 && aAcb.length == 0 && aAcbFCaj.length== 0 && aAcbFCar.length == 0 && aAcbG.length == 0 ){

        /*$("#btnabrebancoemp").prop("disabled",true);
        $("#btnabreaccesorios").prop("disabled",true);
        $("#btnabrecierres").prop("disabled",true);*/
    }
}

function vacioModalBancos() {

    document.getElementById('SelectBanEmp').value = "selected";

    document.getElementById('llevasuajemodBanco').style.display = "none";

    document.getElementById('SelectSuajeBanco').value = "No";
    document.getElementById('LargoBanco').value       = 1;
    document.getElementById('AnchoBanco').value       = 1;
    document.getElementById('ProfundidadBanco').value = 1;
}


function vacioModalImpresiones() {

    document.getElementById('miSelect').value                      = "selected";
    document.getElementById('SelectImpTipoOff').value              = "selected";
    document.getElementById('SelectImpTipoSeri').value             = "selected";
    document.getElementById('opImpresionSerigrafia').style.display = "none";
    document.getElementById('opImpresionOffset').style.display     = "none";
    document.getElementById('opImpresionDigital').style.display    = "none";

    document.getElementById('miSelectFcajon').value                        = "selected";
    document.getElementById('SelectImpTipoSeriFcajon').value               = "selected";
    document.getElementById('SelectImpTipoOffFcajon').value                = "selected";
    document.getElementById('opImpresionSerigrafiaFcajon').style.display   = "none";
    document.getElementById('opImpresionOffsetFcajon').style.display       = "none";
    document.getElementById('opImpresionDigitalFcajon').style.display      = "none";
    document.getElementById('miSelectFcartera').value                      = "selected";
    document.getElementById('SelectImpTipoSeriFcartera').value             = "selected";
    document.getElementById('SelectImpTipoOffFcartera').value              = "selected";
    document.getElementById('opImpresionSerigrafiaFcartera').style.display = "none";
    document.getElementById('opImpresionOffsetFcartera').style.display     = "none";
    document.getElementById('opImpresionDigitalFcartera').style.display    = "none";

    document.getElementById('miSelectGuarda').value                      = "selected";
    document.getElementById('SelectImpTipoOffGuarda').value              = "selected";
    document.getElementById('SelectImpTipoSeriGuarda').value             = "selected";
    document.getElementById('opImpresionSerigrafiaGuarda').style.display = "none";
    document.getElementById('opImpresionOffsetGuarda').style.display     = "none";
    document.getElementById('opImpresionDigitalGuarda').style.display    = "none";
}

function vacioModalAcabados() {

    document.getElementById('SelectAcEmp').value         = "selected";
    document.getElementById('SelectLaminadoEmp').value   = "selected";
    document.getElementById('SelectHSEmp').value         = "selected";
    document.getElementById('SelectColorHSEmp').value    = "selected";
    document.getElementById('SelectGrabEmp').value       = "selected";
    document.getElementById('SelectEspecialesEmp').value = "selected";
    document.getElementById('SelectBarnizUVEmp').value   = "selected";
    document.getElementById('SelectSuajeEmp').value      = "selected";
    document.getElementById('SelectLaserEmp').value      = "selected";

    document.getElementById('SelectAcFcajon').value         = "selected";
    document.getElementById('SelectLaminadoFcajon').value   = "selected";
    document.getElementById('SelectHSFcajon').value         = "selected";
    document.getElementById('SelectColorHSFcajon').value    = "selected";
    document.getElementById('SelectGrabFcajon').value       = "selected";
    document.getElementById('SelectEspecialesFcajon').value = "selected";
    document.getElementById('SelectBarnizUVFcajon').value   = "selected";
    document.getElementById('SelectSuajeFcajon').value      = "selected";
    document.getElementById('SelectLaserFcajon').value      = "selected";

    document.getElementById('SelectAcFcartera').value         = "selected";
    document.getElementById('SelectLaminadoFcartera').value   = "selected";
    document.getElementById('SelectHSFcartera').value         = "selected";
    document.getElementById('SelectColorHSFcartera').value    = "selected";
    document.getElementById('SelectGrabFcartera').value       = "selected";
    document.getElementById('SelectEspecialesFcartera').value = "selected";
    document.getElementById('SelectBarnizUVFcartera').value   = "selected";
    document.getElementById('SelectSuajeFcartera').value      = "selected";
    document.getElementById('SelectLaserFcartera').value      = "selected";

    document.getElementById('SelectAcGuarda').value         = "selected";
    document.getElementById('SelectLaminadoGuarda').value   = "selected";
    document.getElementById('SelectHSGuarda').value         = "selected";
    document.getElementById('SelectColorHSGuarda').value    = "selected";
    document.getElementById('SelectGrabGuarda').value       = "selected";
    document.getElementById('SelectEspecialesGuarda').value = "selected";
    document.getElementById('SelectBarnizUVGuarda').value   = "selected";
    document.getElementById('SelectSuajeGuarda').value      = "selected";
    document.getElementById('SelectLaserGuarda').value      = "selected";

    document.getElementById('opAcLaminadoFcajon').style.display    = "none";
    document.getElementById('opAcHotStampingFcajon').style.display = "none";
    document.getElementById('opAcGrabadoFcajon').style.display     = "none";
    document.getElementById('opAcEspecialesFcajon').style.display  = "none";
    document.getElementById('opAcBarnizUVFcajon').style.display    = "none";
    document.getElementById('opAcSuajeFcajon').style.display       = "none";
    document.getElementById('opAcLaserFcajon').style.display       = "none";

    document.getElementById('opAcLaminadoFcartera').style.display    = "none";
    document.getElementById('opAcHotStampingFcartera').style.display = "none";
    document.getElementById('opAcGrabadoFcartera').style.display     = "none";
    document.getElementById('opAcEspecialesFcartera').style.display  = "none";
    document.getElementById('opAcBarnizUVFcartera').style.display    = "none";
    document.getElementById('opAcSuajeFcartera').style.display       = "none";
    document.getElementById('opAcLaserFcartera').style.display       = "none";

    document.getElementById('opAcLaminadoGuarda').style.display    = "none";
    document.getElementById('opAcHotStampingGuarda').style.display = "none";
    document.getElementById('opAcGrabadoGuarda').style.display     = "none";
    document.getElementById('opAcEspecialesGuarda').style.display  = "none";
    document.getElementById('opAcBarnizUVGuarda').style.display    = "none";
    document.getElementById('opAcSuajeGuarda').style.display       = "none";
    document.getElementById('opAcLaserGuarda').style.display       = "none";

    document.getElementById('opAcLaminadoEmp').style.display    = "none";
    document.getElementById('opAcHotStampingEmp').style.display = "none";
    document.getElementById('opAcGrabadoEmp').style.display     = "none";
    document.getElementById('opAcEspecialesEmp').style.display  = "none";
    document.getElementById('opAcBarnizUVEmp').style.display    = "none";
    document.getElementById('opAcSuajeEmp').style.display       = "none";
    document.getElementById('opAcLaserEmp').style.display       = "none";
    document.getElementById('opAcBarUVguarda').style.display    = "none";
    document.getElementById('opAcBarUVEmp').style.display       = "none";
    document.getElementById('opAcBarUVFcajon').style.display    = "none";
    document.getElementById('opAcBarUVFcartera').style.display  = "none";

    document.getElementById('LargoLaser_guarda').value   = "1";
    document.getElementById('AnchoLaser_guarda').value   = "1";
    document.getElementById('LargoLaser_fcajon').value   = "1";
    document.getElementById('AnchoLaser_fcajon').value   = "1";
    document.getElementById('LargoLaser_fcartera').value = "1";
    document.getElementById('AnchoLaser_fcartera').value = "1";
    document.getElementById('LargoLaser1').value         = "1";
    document.getElementById('AnchoLaser1').value         = "1";
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