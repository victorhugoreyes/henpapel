
var model;
var costo_papel;
var costo_carton;
var costo_final;
var ancho_almeja;
var alto_almeja;
var grosor_cajon_almeja;
var grosor_cartera_almeja;
var t_cortes;
var ancho_cartera;
var largo_cartera;
var a_forro_ext_cartera;
var l_forro_ext_cartera;
var a_forro_int_cartera;
var l_forro_int_cartera;
var l_forro_ext_cajon;
var a_forro_ext_cajon;
var largo_cajon;
var ancho_cajon;
var precio_forros;
var papel_elegido  = false;
var costos_papeles = {guarda_cajon:0, forro_cajon:0, forro_cartera:0, guarda:0, cajon:0, cartera:0}
var ancho_lados;
var largo_lados;
var ancho_frentes;
var largo_frentes;
var ancho_tapas;
var largo_tapas;
var d1;
var d2;
var d_inicial                    = '';
var valida_impresiones           = 0;
var forro_cajon_offset           = true;
var forro_cajon_digital          = true;
var forro_guarda_cajon_offset    = true;
var forro_guarda_cajon_digital   = true;
var forro_cartera_offset         = true;
var forro_cartera_digital        = true;
var forro_guarda_cartera_offset  = true;
var forro_guarda_cartera_digital = true;

var cantidad_minima_offset      = 0;
var cantidad_minima_digital     = 0;
var cantidad_minima_serigrafia  = 0;
var cantidad_minima_hotstamping = 0;
var cantidad_minima_laminado    = 0;
var cantidad_minima_barniz      = 0;
var cantidad_minima_suaje       = 0;
var cantidad_minima_forrado     = 0;
var cantidad_minima_grabado     = 0;

var parte_texto         = "";
var cantidad_print      = 0;
var papel               = "";
var costo_final_print   = 0;
var p_largo             = 0;
var p_ancho             = 0;
var corte_largo         = 0;
var corte_ancho         = 0;
var cortes_final        = 0;
var total_Pliegos_print = 0;
var total_costo_print   = 0;

// variable del boton de impresiones (modal)
var ImpOffset = "";

var aCalculos = {};
var aCortes   = {};
var aTr3      = [];

var aImp     = [];
var aImpFCaj = [];
var aImpFCar = [];
var aImpG    = [];

var aAcb     = [];
var aAcbFCaj = [];
var aAcbFCar = [];
var aAcbG    = [];

var aCierres = [];
var aBancos  = [];

var aAccesorios  = [];


var j = 0;
var data_offset;
var data_digital;
var data_laminado;
var row_listimpresiones;
var row_listimpresionesfcajon;
var row_listimpresionesfcartera;
var row_listimpresionesguarda;
/*
 * variables globales de merma
*/

var cantidad_minima;
var c_4colores;
var por_cada_x;
var adicional_4colores;
var qty_adic;
var adic;
var merma_exc;

var cantidad;
var adicional;

var merma_offset           = 0;
var merma_offset_adic      = 0;
var merma_digital          = 0;
var merma_digital_adic     = 0;
var merma_serigrafia       = 0;
var merma_serigrafia_adic  = 0;
var merma_HotStamping      = 0;
var merma_HotStamping_adic = 0;
var merma_Laminado         = 0;
var merma_Laminado_adic    = 0;
var merma_Barniz           = 0;
var merma_Barniz_adic      = 0;
var merma_Suaje            = 0;
var merma_Suaje_adic       = 0;
var merma_Forrado          = 0;
var merma_Forrado_adic     = 0;
var merma_Grabado          = 0;
var merma_Grabado_adic     = 0;


$(document).ready(function() {

    var width       = jQuery214('.img-viewer').width();
    var page_height = jQuery214(window).height();

    jQuery214('.img-viewer').height(width - (width / 2));
    jQuery214('.tab-content').height(page_height - 100);
});


$(window).resize(function() {

    var width       = jQuery214('.img-viewer').width();
    var page_height = jQuery214(window).height();

    jQuery214('.img-viewer').height(width - (width / 3));
    jQuery214('.tab-content').height(page_height - 100);
});


jQuery214(".chosen").chosen();


jQuery214(document).on("change", "#proceso", function () {

    $.ajax({
        type:"POST",
        url:"<?php echo URL; ?>cotizador/getOptions/",
        data:{process:jQuery214(this).val()},

        success:function(data) {

            jQuery214('.cotizador_box').html(data);
            //closeModal();
        }
    });
});


jQuery214(document).on("change", "#papel_exterior", function () {

    var precio = jQuery214(this).find(':selected').data('precio');
    var ancho  = jQuery214(this).find(':selected').data('ancho');
    var largo  = jQuery214(this).find(':selected').data('largo');
    var nombre = jQuery214('#papel_exterior option:selected').html();
});

// focus => Ancho Interior
jQuery214(document).on("focus", "#corte_ancho", function () {

    jQuery214('#image_1_ancho').show();
    jQuery214('#image_1').hide();
});


// focus => Alto Interior
jQuery214(document).on("focus", "#corte_largo", function () {

    jQuery214('#image_1_alto').show();
    jQuery214('#image_1').hide();
});


// focus => profundidad
jQuery214(document).on("focus", "#profundidad_1", function () {

    jQuery214('#image_1_profundidad').show();
    jQuery214('#image_1').hide();
});


// focusout
jQuery214(document).on("focusout", "#corte_largo", function () {

    jQuery214('#image_1_alto').hide();
    jQuery214('#image_1').show();
});


// focusout => Ancho Interior
jQuery214(document).on("focusout", "#corte_ancho", function () {

    jQuery214('#image_1_ancho').hide();
    jQuery214('#image_1').show();
});


// focusout => profundidad
jQuery214(document).on("focusout", "#profundidad_1", function () {

    jQuery214('#image_1_profundidad').hide();
    jQuery214('#image_1').show();
});


function showModal(modalID, backdrop2 = false) {

    $('#' + modalID).animate({'opacity':'1'}, 300, 'linear');
    $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop, #' + modalID).css('display', 'block');

    if (backdrop2) {

        $('.backdrop2').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop2, #' + modalID).css('display', 'block');
    }
}


function closeModal(target=false, drop_target=false) {

    if (!target) {

        $('.backdrop, .cotizador_box, .loader,.backdrop2, .cotizador_box2').animate({'opacity':'0'}, 300, 'linear', function() {

            $('.backdrop, .cotizador_box, .loader,.backdrop2, .cotizador_box2').css('display', 'none');
        });

        setTimeout(function() {

            $('.second').hide();
            $('.first').show();
            $('.b-checked').find('input').prop('checked', false);
            $('.b-checked').removeClass('b-checked');
        }, 400);
    } else {

        $('.backdrop2, .cotizador_box2').animate({'opacity':'0'}, 300, 'linear', function() {

            $('.backdrop2, .cotizador_box2').css('display', 'none');
        });
    }
}

window.onbeforeunload = function(event){

    return confirm("Si recargas la pagina perderas los datos de la cotizacion actual");
};


/* group  */
jQuery214(document).on("click", ".b-check", function () {

    $('.b-checked').removeClass('b-checked');
    $(this).addClass('b-checked').find('input').prop('checked', true);

    var value = jQuery214(this).data('value');
    var text  = jQuery214(this).data('text');
    var price = jQuery214(this).data('price');
    var group = jQuery214(this).data('group');

        var imp  = '<tr><td><div class="delete"></div></td><input type="hidden" class="" value="' + price + '"><td>$' + price + '</td><td>' + text + '</td></tr>';

        // --------------------Empalme del Cajón---------------------
        //obtiene y envia el valor a divs acabados empalme
        var acabadoemp = jQuery214(this).data('acabadoemp');
        jQuery214('#'+ acabadoemp +'_empalme').html(imp);

        //obtiene y envia el valor a divs cierres empalme
        var cierreemp = jQuery214(this).data('cierreemp');
        jQuery214('#'+ cierreemp +'_empalme').html(imp);

        //obtiene y envia el valor a divs accesorios empalme
        var accesorioemp = jQuery214(this).data('accesorioemp');
        jQuery214('#'+ accesorioemp +'_empalme').html(imp);


        // --------------------Forro del Cajón---------------------
        //obtiene y envia el valor a divs acabados forro del cajon
        var acabadofcajon = jQuery214(this).data('acabadofcajon');
        jQuery214('#'+ acabadofcajon +'_fcajon').html(imp);

        //obtiene y envia el valor a divs cierres forro del cajon
        var cierrefcajon = jQuery214(this).data('cierrefcajon');
        jQuery214('#'+ cierrefcajon +'_fcajon').html(imp);

        //obtiene y envia el valor a divs accesorios forro del cajon
        var accesoriofcajon = jQuery214(this).data('accesoriofcajon');
        jQuery214('#'+ accesoriofcajon +'_fcajon').html(imp);


        // -------------------Forro de la Cartera-----------------
        //obtiene y envia el valor a divs acabados forro de la cartera
        var acabadofcartera = jQuery214(this).data('acabadofcartera');
        jQuery214('#'+ acabadofcartera +'_fcartera').html(imp);

        //obtiene y envia el valor a divs cierres forro de la cartera
        var cierrefcartera = jQuery214(this).data('cierrefcartera');
        jQuery214('#'+ cierrefcartera +'_fcartera').html(imp);

        //obtiene y envia el valor a divs accesorios forro de la cartera
        var accesoriofcartera = jQuery214(this).data('accesoriofcartera');
        jQuery214('#'+ accesoriofcartera +'_fcartera').html(imp);


        // -------------------Guarda------------------------------------
        //obtiene y envia el valor a divs acabados guarda
        var acabadoguarda = jQuery214(this).data('acabadoguarda');
        jQuery214('#'+ acabadoguarda +'_guarda').html(imp);

        //obtiene y envia el valor a divs cierres guarda
        var cierreguarda = jQuery214(this).data('cierreguarda');
        jQuery214('#'+ cierreguarda +'_guarda').html(imp);

        //obtiene y envia el valor a divs accesorios guarda
        var accesorioguarda = jQuery214(this).data('accesorioguarda');
        jQuery214('#'+ accesorioguarda +'_guarda').html(imp);

    // se quitaron los dos input name= + group
    var html  = '<tr><td>' + text + '</td><td>$' + price + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + price + '"></tr>';

    jQuery214('#resume-body').append(html);

    closeModal();
    collectPrices();
});

/* Descuento */
jQuery214(document).on("click", ".d-check", function (){

    $('.b-checked').removeClass('b-checked');
    $(this).addClass('b-checked').find('input').prop('checked', true);
    $('.discounted').remove();

    var discount = jQuery214(this).data('discount');
    var html     = 'Descuento del ' + discount + '%<input type="hidden" class="discounts" value="' + discount + '">';

    jQuery214('#DescuentoDrop').html(html);

    closeModal();
    collectPrices();
});

jQuery214(document).on("click", "#descuentoModal", function (){

    //showModal('d_grabado',true);
    $('#descuentos').modal('show');
});


/* display + group*/
jQuery214(document).on("click", ".c-check", function (){

    $('.b-checked').removeClass('b-checked');
    $(this).addClass('b-checked').find('input').prop('checked', true);

    var display =  jQuery214(this).data('display');
    var group   =  jQuery214(this).data('group');

    jQuery214('#' + group + '_content').hide();
    jQuery214('#display_' + display).show();
});


/* selecciona imagen */
jQuery214(document).on("click", ".image-option", function () {

    showModal('d_grabado',true);

    d_inicial = '';

    $('#grabado_ancho').val('');
    $('#grabado_alto').val('');

    jQuery214('.option-selected').removeClass('option-selected');
    jQuery214(this).addClass('option-selected');

    var area = $(this).data('area');

    if (area == 'tapas') {

        d1 = ancho_tapas;
        d2 = largo_tapas;
    } else if ( area == 'lados' ) {

        d1 = ancho_lados;
        d2 = largo_lados;
    }else if ( area == 'frentes' ) {

        d1 = ancho_frentes;
        d2 = largo_frentes;
    }
});


/* Selecciona el modelo de caja */
jQuery214(document).on("change", "#box-model", function () {

    model = jQuery214(this).val();
    jQuery214('.watcher').show();
    jQuery214('#medidas').hide();
    jQuery214('.' + model + '-stuff').show();
    jQuery214('#image_' + model).show();
});

// calculadora
// este debe ser llemada desde papeles_submit
jQuery214(document).on("keyup change", ".medidas-input", function () {

    if (!jQuery214(this).val()) {

        jQuery214(this).removeClass('not-empty');
    } else {

        jQuery214(this).addClass('not-empty');
    }

    var odt = "";
    var b   = 0;
    var h   = 0;
    var p   = 0;
    var g   = 0;
    var G   = 0;

    var e;
    var E;
    var b1;
    var h1;
    var b11;
    var h11;
    var B;
    var H;
    var P;
    var Y;
    var B1;
    var Y1;
    var B11;
    var Y11;
    var p1;

    var x;
    var y;
    var x1;
    var x11;
    var y1;
    var y11;
    var f;
    var k;

    var B;
    var B1;
    var B11;
    var Y;
    var Y1;
    var Y11;

    if (jQuery214(".not-empty").length > 5) {

        jQuery214('#opciones').hide();

        // se usan estas 4 variables?
        ancho_almeja          = jQuery214('#corte_ancho').val();
        alto_almeja           = jQuery214('#corte_largo').val();
        grosor_cajon_almeja   = jQuery214('#grosor_cajon_1').val();
        grosor_cartera_almeja = jQuery214('#grosor_cartera_1').val();

        $G = parseFloat($('#grosor_cartera_1 option:selected').val());

        if ($G.toFixed(2) > 0.1) {

            odt = jQuery214('#odt-1').val();
            h   = parseFloat($('#corte_ancho').val());       // alto
            b   = parseFloat($('#corte_largo').val());       // base
            p   = parseFloat($('#profundidad_1').val());
            g   = parseFloat($('#grosor_cajon_1 option:selected').val());
            G   = parseFloat($('#grosor_cartera_1 option:selected').val());

            e = g / 20;
            e = parseFloat(e);

            E = G / 20;
            E = parseFloat(E);

            /* Diseño */
            b1 = b + (2 * e);
            b1 = parseFloat(b1);

            h1 = h + (2 * e);
            h1 = parseFloat(h1);

            p1 = p + e;
            p1 = parseFloat(p1);

            x = b1 + (2 * p1);
            x = parseFloat(x);

            y = h1 + (2 * p1);
            y = parseFloat(y);

            x1 = x + 1.2;
            x1 = parseFloat(x1);

            y1 = y + 1.2;
            y1 = parseFloat(y1);

            x11 = x + 1;
            x11 = parseFloat(x11);

            y11 = y + 1;
            y11 = parseFloat(y11);


            //forro
            b11 = x + 2 * (e + 1.4);
            b11 = parseFloat(b11);

            h11 = y + 2 * (e + 1.4);
            h11 = parseFloat(h11);

            f = b11 + 1.5;
            f = parseFloat(f);

            k = h11 + 1.5;
            k = parseFloat(k);

            //cartera
            B = b1 + 0.2;
            B = parseFloat(B);

            H = h1 + 0.1 + (2 * e);
            H = parseFloat(H);

            P = p1 + 0.25;
            P = parseFloat(P);

            Y = H + (2 * P);
            Y = parseFloat(Y);

            B1 = B + 2 * (E + 1.4);
            B1 = parseFloat(B1);

            Y1 = Y + 2 *(E + 1.4);
            Y1 = parseFloat(Y1);

            B11 = B - 1;
            B11 = parseFloat(B11);

            Y11 = H + (P - 0.5) + 2.5;
            Y11 = parseFloat(Y11);


            //dimensiones para grabado hotstamping etc
            ancho_lados         = h1;
            ancho_cartera       = B.toFixed(2);
            ancho_frentes       = b1;
            ancho_tapas         = B;

            largo_lados         = p1;
            largo_frentes       = p1;
            largo_tapas         = P;
            largo_cartera       = Y.toFixed(2);

            a_forro_ext_cartera = B1.toFixed(2);
            l_forro_ext_cartera = Y1.toFixed(2);

            a_forro_int_cartera = B11.toFixed(2);
            l_forro_int_cartera = Y11.toFixed(2);

            l_forro_ext_cajon   = k.toFixed(2);
            a_forro_ext_cajon   = f.toFixed(2);

            largo_cajon         = y1.toFixed(2);
            ancho_cajon         = x1.toFixed(2);

            aCalculos["odt"] = odt;
            aCalculos["h"]   = h.toFixed(2);
            aCalculos["b"]   = b.toFixed(2);
            aCalculos["p"]   = p.toFixed(2);
            aCalculos["g"]   = g.toFixed(2);
            aCalculos["G"]   = G.toFixed(2);
            aCalculos["e"]   = e.toFixed(2);
            aCalculos["E"]   = E.toFixed(2);

            aCalculos["b1"]  = b1.toFixed(2);
            aCalculos["h1"]  = h1.toFixed(2);
            aCalculos["b11"] = b11.toFixed(2);
            aCalculos["h11"] = h11.toFixed(2);
            aCalculos["B"]   = B.toFixed(2);
            aCalculos["H"]   = H.toFixed(2);
            aCalculos["P"]   = P.toFixed(2);
            aCalculos["Y"]   = Y.toFixed(2);
            aCalculos["B1"]  = B1.toFixed(2);
            aCalculos["Y1"]  = Y1.toFixed(2);
            aCalculos["B11"] = B11.toFixed(2);
            aCalculos["Y11"] = Y11.toFixed(2);
            aCalculos["p1"]  = p1.toFixed(2);
            aCalculos["x"]   = x.toFixed(2);
            aCalculos["y"]   = y.toFixed(2);
            aCalculos["x1"]  = x1.toFixed(2);
            aCalculos["y1"]  = y1.toFixed(2);
            aCalculos["x11"] = x11.toFixed(2);
            aCalculos["y11"] = y11.toFixed(2);
            aCalculos["f"]   = f.toFixed(2);
            aCalculos["k"]   = k.toFixed(2);
            aCalculos["B11"] = B11.toFixed(2);

            aCalculos["ancho_lados"]   = ancho_lados.toFixed(2);
            aCalculos["ancho_frentes"] = ancho_frentes.toFixed(2);
            aCalculos["ancho_tapas"]   = ancho_tapas.toFixed(2);

            aCalculos["largo_lados"]   = largo_lados.toFixed(2);
            aCalculos["largo_frentes"] = largo_frentes.toFixed(2);
            aCalculos["largo_tapas"]   = largo_tapas.toFixed(2);
            

            aCalculos["a_forro_ext_cartera"] = a_forro_ext_cartera;
            aCalculos["l_forro_ext_cartera"] = l_forro_ext_cartera;

            aCalculos["a_forro_int_cartera"] = a_forro_int_cartera;
            aCalculos["l_forro_int_cartera"] = l_forro_int_cartera;

            aCalculos["l_forro_ext_cajon"] = l_forro_ext_cajon;
            aCalculos["a_forro_ext_cajon"] = a_forro_ext_cajon;

            aCalculos["largo_cajon"] = largo_cajon;
            aCalculos["ancho_cajon"] = ancho_cajon;

            aCalculos["largo_cartera"] = largo_cartera; 
            aCalculos["ancho_cartera"] = ancho_cartera;
        }

//        aCalculos_tmp = JSON.stringify(aCalculos, null, 4);

//        var calc_data = JSON.stringify(aCalculos, null, 4);

//        var calc_form_data = aCalculos.serialize();

        if (papel_elegido) {

            precio_forros = 0;
            $('.paper_selected').each(function(i, obj) {

                var forro_parte  = $(this).data('parte');
/*
                var part_ancho   = $(this).data('ancho');
                var part_largo   = $(this).data('largo');
*/
                var part_ancho   = h;
                var part_largo   = b;

                var data_name    = $(this).data('name');
                var data_offset  = $(this).data('offset');
                var data_digital = $(this).data('digital');
                var data_id      = $(this).find('option:selected').val();

                data_laminado = $(this).data('laminado');

/*
                var p_ancho = parseFloat(jQuery214(this).find('option:selected').data('ancho'));
                var p_largo = parseFloat(jQuery214(this).find('option:selected').data('largo'));
*/
                var p_ancho = h;
                var p_largo = b;

                var precio  = parseFloat(jQuery214(this).find('option:selected').data('precio'));
                var papel   = jQuery214(this).find('option:selected').html();

                if (ancho_cajon > p_ancho || ancho_cajon > p_largo || largo_cajon > p_ancho || largo_cajon > p_largo) {

//                    alert("ERROR: el corte no puede ser mas grande que las dimensiones del papel (" + p_ancho + 'cmX' + p_largo + 'cm)')

                    return false;
                } else {

                    calculaPapel(p_ancho, p_largo, eval(part_ancho), eval(part_largo), forro_parte, false, precio, papel, data_name, data_laminado, data_id, data_offset, data_digital);
                }
            });

            var grosor_cajon   = $('#grosor_cajon_1').val();
            var ancho_carton1  = $('#grosor_cajon_1').find('option:selected').data('ancho');
            var largo_carton1  = $('#grosor_cajon_1').find('option:selected').data('largo');
            var precio_carton1 = $('#grosor_cajon_1').find('option:selected').data('price');
            var id_carton1     = $('#grosor_cajon_1').find('option:selected').data('id');


            calculaPapel(ancho_carton1, largo_carton1, ancho_cajon, largo_cajon, 'cajon', false, precio_carton1, 'carton', 'carton_cajon', 'false', id_carton1, 'false', 'false');

            var grosor_cajon   = $('#grosor_cartera_1').val();
            var ancho_carton2  = $('#grosor_cartera_1').find('option:selected').data('ancho');
            var largo_carton2  = $('#grosor_cartera_1').find('option:selected').data('largo');
            var precio_carton2 = $('#grosor_cartera_1').find('option:selected').data('price');
            var id_carton2     = $('#grosor_cartera_1').find('option:selected').data('id');


            calculaPapel(ancho_carton2, largo_carton2, ancho_cartera, largo_cartera, 'cartera', false, precio_carton2, 'carton', 'carton_cartera', 'false', id_carton2, 'false', 'false');

            //$('.grand-total').html('$'+precio_forros.toFixed(2));
            $('#materiales-base').val(precio_forros.toFixed(2));

            collectPrices();
        } else {

            //showModal('papeles');
        }
    } else {

        jQuery214('#opciones').show();

        // revisar y buscar la posición de estos jQueries
        document.getElementById('gridEmp').style.setProperty('pointer-events', 'all');
        document.getElementById('gridEmp').style.setProperty('opacity', '1');

        document.getElementById('gridFcajon').style.setProperty('pointer-events', 'all');
        document.getElementById('gridFcajon').style.setProperty('opacity', '1');

        document.getElementById('gridFcartera').style.setProperty('pointer-events', 'all');
        document.getElementById('gridFcartera').style.setProperty('opacity', '1');

        document.getElementById('gridGuarda').style.setProperty('pointer-events', 'all');
        document.getElementById('gridGuarda').style.setProperty('opacity', '1');
    }
});


jQuery214(document).on("click", ".modal-close", function () {

    closeModal();
    $('#grabados').show();
});


jQuery214(document).on("click", ".modal-close2", function () {

    closeModal('backdrop2','cotizador_box2');
    $('#grabados').show();
});


jQuery214(document).on("click", "#banco_submit", function () {

    var ancho       = jQuery214('#banco_ancho').val();
    var alto        = jQuery214('#banco_alto').val();
    var profundidad = jQuery214('#banco_profundidad').val();
    var material    = jQuery214('#banco_material').val();

    var price       = 47.85;    // que significa?

    var html        = '<tr><td>Banco de ' + material + ' de ' + ancho + 'mm por ' + alto + 'mm por ' + profundidad + 'mm </td><td>$' + price + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + price + '"></tr>';

    jQuery214('#resume-body').append(html);

    closeModal();
    collectPrices();
});


jQuery214(document).on("click", "#grabado_submit", function () {

    $('#grabados').show();

    d_inicial = '';

    $('.option-selected').removeClass('option-selected');

    var ancho    = jQuery214('#grabado_ancho').val();
    var alto     = jQuery214('#grabado_alto').val();
    var posicion = jQuery214('#acabados .option-selected').data('posicion');

    $('#grabado_ancho').val('');
    $('#grabado_alto').val('');

    var price = 56.34;              // que significa?

    var html = '<tr><td>Grabado de ' + ancho + 'mm por ' + alto + 'mm ' + posicion + '</td><td>$' + price + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + price + '"></tr>';

    jQuery214('#resume-body').append(html);

    closeModal();
    collectPrices();
});


jQuery214(document).on("keyup", "#grabado_ancho", function () {

    var big_size   = Math.max(d1,d2);
    var small_size = Math.min(d1,d2);
    var value      = $(this).val();

    if (d_inicial == 'big') {

        if (value>small_size) {

            alert('ERROR: el ancho no puede ser mayor que ' + small_size.toFixed(2) + ' cm');
            $(this).val('');
        } else {

            if( value <= small_size ) {

            } else {

                alert('ERROR: el ancho no puede ser mayor que ' + small_size.toFixed(2) + 'cm');
                $(this).val('');
            }
        }
    } else if(d_inicial == 'small') {

        if ( value > big_size) {

            alert('ERROR: el ancho no puede ser mayor que ' + big_size.toFixed(2) + ' cm');
            $(this).val('');
        } else {

            if (value > small_size && value <= big_size) {

            }else if(value <= small_size) {

            } else {

                alert('ERROR: el ancho no puede ser mayor que ' + big_size.toFixed(2) + ' cm');
                $(this).val('');
            }
        }
    } else {

        if(value > big_size) {

            alert('ERROR: el ancho no puede ser mayor que ' + big_size.toFixed(2) + ' cm');
            $(this).val('');
        }
    }
});


jQuery214(document).on("focusout", "#grabado_ancho", function () {

    var big_size   = Math.max(d1,d2);
    var small_size = Math.min(d1,d2);
    var value      = $(this).val();

    if (value != '') {

        if (value > small_size && value <= big_size) {

            d_inicial = 'big';
        } else if( value <= small_size ) {

            d_inicial = 'small';
        }
    }
});


jQuery214(document).on("focusout", "#grabado_alto", function () {

    var big_size   = Math.max(d1,d2);
    var small_size = Math.min(d1,d2);
    var value      = $(this).val();

    if (value != '') {

        if (value > small_size && value <= big_size) {

            d_inicial = 'big';
        } else if( value <= small_size ) {

            d_inicial = 'small';
        }
    }
});


jQuery214(document).on("keyup", "#grabado_alto", function () {

    var big_size   = Math.max(d1,d2);
    var small_size = Math.min(d1,d2);
    var value      = $(this).val();

    if (d_inicial == 'big') {

        if (value > small_size){

            alert('ERROR: el ancho no puede ser mayor que ' + small_size.toFixed(2) + 'cm');
            $(this).val('');
        } else {

            if( value <= small_size ) {

            } else {

                alert('ERROR: el ancho no puede ser mayor que ' + small_size.toFixed(2) + 'cm');
                $(this).val('');
            }
        }
    } else if( d_inicial == 'small' ) {

        if (value > big_size) {

            alert('ERROR: el ancho no puede ser mayor que ' + big_size.toFixed(2) + ' cm');
            $(this).val('');

        } else {

            if ( value > small_size && value <= big_size ) {

            }else if( value <= small_size ) {

            } else {

            alert('ERROR: el ancho no puede ser mayor que ' + big_size.toFixed(2) + ' cm');
            $(this).val('');
            }
        }
    } else {

        if( value > big_size ) {

            alert('ERROR: el ancho no puede ser mayor que ' + big_size.toFixed(2) + ' cm');
            $(this).val('');
        }
    }
});


jQuery214(document).on("click", "#divisiones_submit", function () {

    var material = jQuery214('#divisiones_material option:selected').val();

    var price = 6.34;           // que significa?

    var html = '<tr><td>Divisiones de ' + material + '</td><td>$' + price + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + price + '"></tr>';

    jQuery214('#resume-body').append(html);
    closeModal();
    collectPrices();
});


jQuery214(document).on("click", "#impresiones_submit", function () {

    var ancho    = jQuery214('#grabado_ancho').val();
    var tintas   = jQuery214('#tintas').val();
    var posicion = jQuery214('#impresiones .option-selected').data('posicion');

    var price = 56.34;          // que significa?

    var precio         = jQuery214('#papel_exterior option:selected').data('precio');
    var ancho          = jQuery214('#papel_exterior option:selected').data('ancho');
    var largo          = jQuery214('#papel_exterior option:selected').data('largo');
    var papel          = jQuery214('#papel_exterior option:selected').html();
    var forro_interior = jQuery214('#papel_interior').val();
    var forro_exterior = jQuery214('#papel_exterior').val();

    var html = '<tr><td>Impresion de Serigrafia a ' + tintas + ' tintas en el ' + posicion + '</td><td>$' + price + '</td><td><div class="delete"></div></td></tr>' + '<tr><td>Forro Exterior de ' + papel + '</td><td>$' + precio + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + precio + '"></tr>';

    if ( forro_interior == null ) {

        html += '<tr><td>Forro Interior de ' + papel + '</td><td>$' + precio + '</td><td><div class="delete"></div></td></tr>';
    } else {
    }

    collectPrices();
    jQuery214('#resume-body').append(html);
    closeModal();
});

// papel(es) seleccionado(s)
jQuery214(document).on("click", "#papeles_submit", function () {


    var p_ancho;
    var p_largo;
    var precio
    var precio_forros = 0;
    var papel;
    var forro_parte;
    var part_ancho;
    var part_largo;
    var data_name;


    while (aTr3.length > 6) {

        aTr3.pop();
    }

    $('.paper_selected').each(function(i, obj) {

        papel_elegido = true;

        forro_parte = $(this).data('parte');
        p_ancho = parseFloat($(this).find('option:selected').data('ancho'));
        p_largo = parseFloat($(this).find('option:selected').data('largo'));

        var data_id      = parseFloat($(this).find('option:selected').val());
        var data_offset  = $(this).data('offset');
        var data_digital = $(this).data('digital');

        part_ancho    = $(this).data('ancho');
        data_name     = $(this).data('name');
        data_laminado = $(this).data('laminado');
        part_largo    = $(this).data('largo');
        precio        = parseFloat(jQuery214(this).find('option:selected').data('precio'));
        papel         = jQuery214(this).find('option:selected').html();

        if ( ancho_cajon > p_ancho || ancho_cajon > p_largo || largo_cajon > p_ancho || largo_cajon > p_largo ) {

//            if ( confirm("ERROR: el corte no puede ser mas grande que las dimensiones del papel (" + p_ancho + ' cmX' + p_largo + ' cm)')) {

                resetDimentions();

                return false;
//            }
        } else {

            calculaPapel(p_ancho, p_largo, eval(part_ancho), eval(part_largo), forro_parte, false, precio, papel, data_name, data_laminado, data_id, data_offset, data_digital);
        }

    });

    var grosor_cajon   = $('#grosor_cajon_1').val();
    var ancho_carton1  = $('#grosor_cajon_1').find('option:selected').data('ancho');
    var largo_carton1  = $('#grosor_cajon_1').find('option:selected').data('largo');
    var precio_carton1 = $('#grosor_cajon_1').find('option:selected').data('price');
    var id_carton1     = $('#grosor_cajon_1').find('option:selected').data('id');


    calculaPapel(ancho_carton1, largo_carton1, ancho_cajon, largo_cajon, 'cajon', false, precio_carton1, 'carton', 'carton_cajon', 'false', id_carton1, 'false', 'false');

    var grosor_cajon   = $('#grosor_cartera_1').val();
    var ancho_carton2  = $('#grosor_cartera_1').find('option:selected').data('ancho');
    var largo_carton2  = $('#grosor_cartera_1').find('option:selected').data('largo');
    var precio_carton2 = $('#grosor_cartera_1').find('option:selected').data('price');
    var id_carton2     = $('#grosor_cartera_1').find('option:selected').data('id');


    calculaPapel(ancho_carton2, largo_carton2, ancho_cartera, largo_cartera, 'cartera', false, precio_carton2, 'carton', 'carton_cartera', 'false', id_carton2, 'false', 'false');

    closeModal();

    $('#materiales-base').val(precio_forros.toFixed(2));

    collectPrices();

/*
    var html = '<tr><td>Forro de ' + papel + ' </td><td>$' + precio + '</td><td><div class="delete"></div></td><input type="hidden" class="prices" value="' + precio + '"></tr>';

    jQuery214('#resume-body').append(html);
*/
});


jQuery214(document).on("click", "#m_forros", function () {

    showModal('papeles');
});


function calculaPapel(papel_ancho, papel_largo, corte_ancho, corte_largo, parte, textura, precio, papel, data_name, data_laminado, id_papel, data_offset, data_digital) {

    id_canvas = parte;
    p_ancho   = papel_ancho;
    p_largo   = papel_largo;
    c_ancho   = corte_ancho;
    c_largo   = corte_largo;

    if(validarForma() === 1) {

        var b      = Math.max(papel_ancho, papel_largo);
        var h      = Math.min(papel_ancho, papel_largo);
        var cb     = c_ancho;
        var ch     = c_largo;
        var escala = 250 / b;

        var cortes, sobrante;
        var cortes_H, sobrante_H;
        var totalCortes;
        var totalCortes_H;
        var cortesV, cortesH = 0;
        var cortesV2, cortesH2 = 0;
        var V_cortes;
        var H_cortes;
        var calcular_area_V;
        var calcular_area_H;
        var quepues;
        var costo = 0;
        var obligados;

//        cortes        = acomoda(b, h, c_ancho, c_largo, "N", "V");
        cortes        = acomoda(b, h, c_ancho, c_largo, "V", "V");
        totalCortes   = cortes.cortesT;
//        cortes_H      = acomoda(b, h, c_ancho, c_largo, "N", "H");
        cortes_H      = acomoda(b, h, c_ancho, c_largo, "H", "V");
        totalCortes_H = cortes_H.cortesT;

        if (cortes.sobranteB >= ch) {

            sobrante = acomoda(cortes.sobranteB, b, c_ancho, c_largo, "H", "H");
            totalCortes += sobrante.cortesT;

            //dibujaCuadricula(sobrante.cortesH, sobrante.cortesB, ch, cb, cortes.cortesB * cb * escala, 0, escala, "R");
        } else if (cortes.sobranteH >= cb) {

            sobrante = acomoda(cortes.sobranteH, h, c_ancho, c_largo, "H", "H");
            totalCortes += sobrante.cortesT;

            //dibujaCuadricula(sobrante.cortesB, sobrante.cortesH, ch, cb, 0, cortes.cortesH * ch * escala, escala, "R");
        } else {
            sobrante = {
                cortesT: 0,
                cortesB: 0,
                cortesH: 0,
                sobranteB: 0,
                sobranteH: 0,
                areaUtilizada: 0
            };
        }

        if (cortes_H.sobranteB >= ch) {

            sobrante_H    = acomoda(cortes_H.sobranteB, h,  c_ancho, c_largo, "H", "H");
            totalCortes_H += sobrante_H.cortesT;

            //dibujaCuadricula(sobrante.cortesH, sobrante.cortesB, ch, cb, cortes.cortesB * cb * escala, 0, escala, "R");
        } else if (cortes_H.sobranteH >= cb) {

            sobrante_H    = acomoda(cortes_H.sobranteH, b,  c_ancho, c_largo, "H", "H");
            totalCortes_H += sobrante_H.cortesT;

            //dibujaCuadricula(sobrante.cortesB, sobrante.cortesH, ch, cb, 0, cortes.cortesH * ch * escala, escala, "R");
        } else {
            sobrante_H = {
                cortesT: 0,
                cortesB: 0,
                cortesH: 0,
                sobranteB: 0,
                sobranteH: 0,
                areaUtilizada: 0
            };
        }

        if (parseInt(cb) < parseInt(ch)) {

            cortesV  = cortes.cortesT;
//            cortesH  = sobrante.cortesT;
            cortesV2  = sobrante.cortesT;
//            cortesV2 = cortes_H.cortesT;
            cortesH  = cortes_H.cortesT;
            cortesH2 = sobrante_H.cortesT;
        } else {

//            cortesV  = sobrante.cortesT;
            cortesH2  = sobrante.cortesT;
            cortesH   = cortes.cortesT;
            cortesV2  = sobrante_H.cortesT;
//            cortesH2 = cortes_H.cortesT;
            cortesV   = cortes_H.cortesT;
        }

/*
        calcular_area_V = calcularArea(b, h, cb, ch, totalCortes);
        calcular_area_H = calcularArea(b, h, cb, ch, totalCortes_H);

*/

        // cortes_deseados es merma
//        V_cortes = calcular(b, h, cortesV, cortesH, totalCortes, cortes.cortesT, cortes_deseados, "V");

//        H_cortes = calcular(b, h, cortesV2, cortesH2, totalCortes_H, cortes_H.cortesT, cortes_deseados, "H");

        var orientacion;
        var cortes_final = 0;

        V_cortes = totalCortes;
        H_cortes = totalCortes_H;

        if (V_cortes > H_cortes) {

            clearCanvas();

            $("#" + id_canvas).attr({width: h * escala, height: b * escala, style: "background-color: #272B34;"});

            dibujaCuadricula(cortes.cortesB, cortes.cortesH, cb, ch, 0, 0, escala,id_canvas);

            costo        = (precio / V_cortes);
            cortes_final = V_cortes;
            orientacion  = 'vertical';
        }else{

            clearCanvas();

            // forzamos que el corte de la cartera sea vertical
            if (id_canvas == 'cartera') {

                $("#" + id_canvas).attr({width: h * escala, height: b * escala, style: "background-color: #272B34;"});

                dibujaCuadricula(cortes.cortesB, cortes.cortesH, cb, ch, 0, 0, escala,id_canvas);

                costo        = (precio / V_cortes);
                cortes_final = V_cortes;
                orientacion  = 'vertical';
            } else {

                $("#" + id_canvas).attr({width: b * escala, height: h * escala, style: "background-color: #272B34;"});

                dibujaCuadricula(cortes_H.cortesB, cortes_H.cortesH, cb, ch, 0, 0, escala,id_canvas);

                orientacion  = 'horizontal';
                cortes_final = H_cortes;
                costo        = precio / H_cortes;
            }
        }

        costos_papeles[parte] = costo.toFixed(2);

        if (aCortes && aCortes.length) {

            aCortes[0] = null;
        }

        aCortes[parte] = cortes_final.toFixed(0);

        var costo_final = costo;

        $('#calc-' + id_canvas).remove();

        if (data_laminado == 'true'){

            obligados = '<input type="hidden" name="' + data_name + '[laminado]" value="si">';
        } else {

            obligados = '<input type="hidden" name="' + data_name + '[laminado]" value="no">';
        }

        /* tabla de papeles */
/*
        document.getElementById("parte_texto").value        = parte_texto;
        document.getElementById("cantidad_print").value        = cantidad_print;
        document.getElementById("papel").value        = papel;
        document.getElementById("costo_final_print").value        = costo_final_print;
        document.getElementById("p_largo").value        = p_largo;
        document.getElementById("p_ancho").value        = p_ancho;
        document.getElementById("corte_largo").value        = corte_largo;
        document.getElementById("corte_ancho").value        = corte_ancho;
        document.getElementById("cortes_final").value        = cortes_final;
        document.getElementById("total_Pliegos_print").value        = total_Pliegos_print;
        document.getElementById("total_costo_print").value        = total_costo_print;
*/

        /* tabla mermas */
/*
        document.getElementById("offset1").value        = cantidad_minima_offset;
        document.getElementById("offsetadic").value     = merma_offset_adic;
        document.getElementById("offset").value         = merma_offset;

        document.getElementById("digital1").value       = cantidad_minima_digital;
        document.getElementById("digitaladic").value    = merma_digital_adic;
        document.getElementById("digital").value        = merma_digital;

        document.getElementById("serigrafia1").value    = cantidad_minima_serigrafia;
        document.getElementById("serigrafiaadic").value = merma_serigrafia_adic;
        document.getElementById("serigrafia").value     = merma_serigrafia;

        document.getElementById("hs1").value            = cantidad_minima_hotstamping;
        document.getElementById("hsadic").value         = merma_HotStamping_adic;
        document.getElementById("hs").value             = merma_HotStamping;

        document.getElementById("laminado1").value      = cantidad_minima_laminado;
        document.getElementById("laminadoadic").value   = merma_Laminado_adic;
        document.getElementById("laminado").value       = merma_Laminado;

        document.getElementById("barniz1").value        = cantidad_minima_barniz;
        document.getElementById("barnizadic").value     = merma_Barniz_adic;
        document.getElementById("barniz").value         = merma_Barniz;

        document.getElementById("suaje1").value         = cantidad_minima_suaje;
        document.getElementById("suajeadic").value      = merma_Suaje_adic;
        document.getElementById("suaje").value          = merma_Suaje;

        document.getElementById("forrado1").value       = cantidad_minima_forrado;
        document.getElementById("forradoadic").value    = merma_Forrado_adic;
        document.getElementById("forrado").value        = merma_Forrado;

        document.getElementById("grabadomin").value      = cantidad_minima_grabado;
        document.getElementById("grabadoadic").value     = merma_Grabado_adic;
        document.getElementById("grabadotot").value      = merma_Grabado;
*/
        //precio_forros += costo;

        var total_Pliegos = parseInt($('#qty').val()) / cortes_final;
        total_Pliegos = Math.ceil(total_Pliegos);
        total_Pliegos = Math.ceil(total_Pliegos);

        var total_costo = parseInt($('#qty').val()) * costo_final.toFixed(2);

        // iguala los nombres al calculo de la caja(calculadora)
        var parte_texto;

        switch (id_canvas) {

            case 'forro_cajon':

                parte_texto = "Forro del Cajón";

                break;
            case 'guarda_cajon':

                parte_texto = "Empalme del Cajón";

                break;
            case 'forro_cartera':

                parte_texto = "Forro de la Cartera";

                break;
            case 'guarda':

                parte_texto = "Guarda";

                break;
            case 'cajon':

                parte_texto = "Cajón";

                break;
            case 'cartera':

                parte_texto = "Carton de la Cartera";

                break;
        }

        papel = papel.trim();

        if (papel != 'carton') {

            var tr = '<tr style="display:none;" id="calc-' + id_canvas + '"><td><strong> ' + id_canvas + ':</strong> ' + corte_ancho + ' cm por ' + corte_largo + 'cm <strong>Ancho Pliego: </strong>' + p_ancho + ' cm <strong>Largo Pliego: </strong>' + p_largo + ' cm <strong> Cantidad_Solicitada: </strong>' + parseInt($('#qty').val()) + ' <strong> Piezas_por_Pliego: </strong>' + cortes_final + ' <strong>total_Pliegos: </strong>' + total_Pliegos + ' <strong>Papel: </strong>' + papel + '</td><td>$' + costo_final.toFixed(2) + '</td><td><div class=""></div></td><input type="hidden" name="' + data_name + '[costo]" value=' + costo_final.toFixed(2) + '><input type="hidden" name="' + data_name + '[cortes]" value=' + cortes_final + '><input type="hidden" name="' + data_name + '[orientacion]" value=' + orientacion + '><input type="hidden" name="' + data_name + '[corte_ancho]" value=' + corte_ancho + '><input type="hidden" name="' + data_name + '[corte_largo]" value=' + corte_largo + '><input type="hidden" name="' + data_name + '[id]" value=' + id_papel + '>' + obligados + '</tr>';

            var tr2 = '<tr id="calc-' + id_canvas + '"><td style="color: steelblue;"><strong>Material para ' + parte_texto + ': </strong>' + papel + '</td><td>$' + total_costo.toFixed(2) + '</td><td><div class="delete"></div><input type="hidden" class="" value="' + total_costo.toFixed(2) + '"></td></tr>';

            cantidad_print      = parseInt($('#qty').val());
            costo_final_print   = costo_final.toFixed(2);
            total_Pliegos_print = total_Pliegos.toFixed(0);
            total_costo_print   = total_costo.toFixed(2);

            parte_texto = parte_texto.trim();

            var tr3 = '<tr style="text-align: center;" id="calc-' + id_canvas + '"><td name="parte_texto" id="parte_texto">' + parte_texto + '</td><td name="cantidad_print" id="cantidad_print">' + cantidad_print + '</td><td name="papel" id="papel" style="width: 20%;">' + papel + '</td><td name="costo_final_print" id="costo_final_print">' + costo_final_print + '</td><td name="p_largo" id="p_largo">' + p_largo + ' cm</td><td name="p_ancho" id="p_ancho">' + p_ancho + ' cm</td><td name="corte_largo" id="corte_largo">' + corte_largo + 'cm</td><td name="corte_ancho" id="corte_ancho">' + corte_ancho + ' cm </td><td name="cortes_final" id="cortes_final">' + cortes_final + '</td><td name="total_Pliegos_print" id="total_Pliegos_print">' + total_Pliegos_print + '</td><td name="total_costo_print" id="total_costo_print">' + total_costo_print + '</td></tr>';

            if (papel != "Elegir tipo de papel") {

                aTr3.push({"Parte": parte_texto, "Cantidad_Solicitada": cantidad_print, "Papel": papel, "Precio": costo_final_print, "Largo": p_largo, "Ancho": p_ancho, "Corte_Largo": corte_largo, "Corte_Ancho": corte_ancho, "Piezas_por_Pliego": cortes_final, "Total_Pliegos": total_Pliegos_print, "Total_Costo": total_costo_print});
            };

            var tr4 = '<tr><td>Offset</td><td>'+ cantidad_minima_offset +'</td><td>'+ merma_offset_adic +'</td><td>'+ merma_offset +'</td></tr><tr><td>Digital</td><td>'+ cantidad_minima_digital +'</td><td>'+ merma_digital_adic +'</td><td>'+ merma_digital +'</td></tr><tr><td>Serigrafia</td><td>'+ cantidad_minima_serigrafia +'</td><td>'+ merma_serigrafia_adic +'</td><td>'+ merma_serigrafia +'</td></tr><tr><td>HotStamping</td><td>'+ cantidad_minima_hotstamping +'</td><td>'+ merma_HotStamping_adic +'</td><td>'+ merma_HotStamping +'</td></tr><tr><td>Laminado</td><td>'+ cantidad_minima_laminado +'</td><td>'+ merma_Laminado_adic +'</td><td>'+ merma_Laminado +'</td></tr><tr><td>Barniz UV</td><td>'+ cantidad_minima_barniz +'</td><td>'+ merma_Barniz_adic +'</td><td>'+ merma_Barniz +'</td></tr><tr><td>Suaje</td><td>'+ cantidad_minima_suaje +'</td><td>'+ merma_Suaje_adic +'</td><td>'+ merma_Suaje +'</td></tr><tr><td>Forrado</td><td>'+ cantidad_minima_forrado +'</td><td>'+ merma_Forrado_adic +'</td><td>'+ merma_Forrado +'</td><td>Grabado</td><td>' + grabadomin + '</td><td>' + grabadoadic + '</td><td>' + grabadotot + '</td></tr>';
        } else {

            var tr = '<tr style="display:none;" id="calc-' + id_canvas + '"><td><strong>Carton base de ' + id_canvas + ':</strong> ' + corte_ancho + 'cm por ' + corte_largo + ' cm <strong>Ancho Pliego: </strong>' + p_ancho + ' cm <strong>Largo Pliego: </strong>' + p_largo + ' cm <strong>Papel: </strong>' + papel + '</td><td>$' + costo_final.toFixed(2) + '</td><td><div class=""></div></td><input type="hidden" name="' + data_name + '[costo]" value=' + costo_final.toFixed(2) + '><input type="hidden" name="' + data_name + '[cortes]" value=' + cortes_final + '><input type="hidden" name="' + data_name + '[orientacion]" value=' + orientacion + '><input type="hidden" name="' + data_name + '[corte_ancho]" value=' + corte_ancho + '><input type="hidden" name="' + data_name + '[corte_largo]" value=' + corte_largo + '><input type="hidden" name="' + data_name + '[id]" value=' + id_papel + '>' + obligados + '</tr>';

            var tr2 = '<tr id="calc-' + id_canvas + '"><td style="color: steelblue;"><strong>Material para ' + parte_texto + ': </strong>' + papel + '</td><td>$' + total_costo.toFixed(2) + '</td><td><div class="delete"><input type="hidden" class="" value="' + total_costo.toFixed(2) + '"></div></td></tr>';

            var cant_tmp          = parseInt($('#qty').val());
            var costo_final_tmp   = costo_final.toFixed(2);
            var total_Pliegos_tmp = total_Pliegos.toFixed(0);
            var total_costo_tmp   = total_costo.toFixed(2);

            parte_texto = parte_texto.trim();

            var tr3 = '<tr style="text-align: center;" id="calc-' + id_canvas + '"><td name="parte_texto" id="parte_texto">' + parte_texto + '</td><td name="cant_tmp" id="cant_tmp">' + cant_tmp + '</td><td name="papel" id="papel" style="width: 20%;">' + papel + '</td><td name="costo_final_tmp" id="costo_final_tmp">' + costo_final_tmp + '</td><td name="p_largo" id="p_largo">' + p_largo + ' cm</td><td name="p_ancho" id="p_ancho">' + p_ancho + ' cm</td><td name="corte_largo" id="corte_largo">' + corte_largo + 'cm</td><td name="corte_ancho" id="corte_ancho">' + corte_ancho + ' cm </td><td name="cortes_final" id="cortes_final">' + cortes_final + '</td><td name="total_Pliegos_tmp" id="total_Pliegos_tmp">' + total_Pliegos_tmp + '</td><td name="total_costo_tmp" id="total_costo_tmp">' + total_costo_tmp + '</td></tr>';

            if ( papel != "Elegir tipo de papel") {

                aTr3.push({"Parte": parte_texto, "Cantidad_Solicitada": cant_tmp, "Papel": papel, "Precio": costo_final_tmp, "Largo": p_largo, "Ancho": p_ancho, "Corte_Largo": corte_largo, "Corte_Ancho": corte_ancho, "Piezas_por_Pliego": cortes_final, "Total_Pliegos": total_Pliegos_tmp, "Total_Costo": total_costo_tmp});
            };

            var tr4 = '<tr><td>Offset</td><td>'+ cantidad_minima_offset +'</td><td>'+ merma_offset_adic +'</td><td>'+ merma_offset +'</td></tr><tr><td>Digital</td><td>'+ cantidad_minima_digital +'</td><td>'+ merma_digital_adic +'</td><td>'+ merma_digital +'</td></tr><tr><td>Serigrafia</td><td>'+ cantidad_minima_serigrafia +'</td><td>'+ merma_serigrafia_adic +'</td><td>'+ merma_serigrafia +'</td></tr><tr><td>HotStamping</td><td>'+ cantidad_minima_hotstamping +'</td><td>'+ merma_HotStamping_adic +'</td><td>'+ merma_HotStamping +'</td></tr><tr><td>Laminado</td><td>'+ cantidad_minima_laminado +'</td><td>'+ merma_Laminado_adic +'</td><td>'+ merma_Laminado +'</td></tr><tr><td>Barniz UV</td><td>'+ cantidad_minima_barniz +'</td><td>'+ merma_Barniz_adic +'</td><td>'+ merma_Barniz +'</td></tr><tr><td>Suaje</td><td>'+ cantidad_minima_suaje +'</td><td>'+ merma_Suaje_adic +'</td><td>'+ merma_Suaje +'</td></tr><tr><td>Forrado</td><td>'+ cantidad_minima_forrado +'</td><td>'+ merma_Forrado_adic +'</td><td>'+ merma_Forrado +'</td><td>Grabado</td><td>' + grabadomin + '</td><td>' + grabadoadic + '</td><td>' + grabadotot + '</td></tr>';
        }


        // convierte un objeto Javascript a un string
        aTr3_tmp        = JSON.stringify(aTr3, null, 4);
        costo_papel_tmp = JSON.stringify(costos_papeles, null, 4);
        acortes_tmp     = JSON.stringify(aCortes, null, 4);

//        console.log('(4305) aTr3_tmp: ' + aTr3_tmp);
//        console.log('(4306) aCortes: ' + acortes_tmp);

        var qty_temp;
        var num_rows;
        var k;

        //num_rows = document.getElementById("table-cont").rows.length;
        //num_rows = num_rows.toFixed(0);

        if (num_rows > 6) {

            for (k = 0; k < 6; k++) {

//                document.getElementById("table-general").deleteRow(0);
                document.getElementById("table-cont").deleteRow(0);
            }
        }

        qty_temp = $('#qty').val();

        if (qty_temp > 1 && (merma_offset > 0 || merma_digital > 0)) {

//            jQuery214('#table-general').append(tr1);
            jQuery214('#forros-select').append(tr2);    // tabla de mermas
            jQuery214('#table-cont').append(tr3);       // tabla de papeles
        }

        collectPrices();
    }

    while (aTr3.length > 6) {

        aTr3.shift();
    }

    aTr3_tmp = JSON.stringify(aTr3, null, 4);

//    console.log('(4343) aTr3_tmp: ' + aTr3_tmp);

}


function resetDimentions() {

    $('#corte_ancho').val('');
    $('#corte_largo').val('');
    $('#profundidad_1').val('');
    $('#grosor_cajon_1').prop('selectedIndex',0);
    $('#grosor_cartera_1').prop('selectedIndex',0);

    papel_elegido = false;

    $('.not-empty').removeClass('not-empty');
}


function collectPrices() {

    var sum        = 0;
    var discounts  = 0;
    var percentage = 0;
    var final      = 0;
    var proDefault = costoProcesosDefault();

    discounts  = $(".discounts").length;

    if (discounts > 0) {

        discounts = parseFloat($(".discounts").val());
    }

    $('.prices').each(function(){

        sum += parseFloat($(this).val());
    });

    //var total = sum * parseFloat($("#qty").val());
    var total = sum;

    percentage = (discounts * total) / 100;

//    final = (total + proDefault) - percentage;
    final = total - percentage;

    var costo_unitario_tmp = parseFloat($("#qty").val());
    costo_unitario_tmp     = (final / costo_unitario_tmp);

    //**********nuevos***********
    var porUtilidad   = document.getElementById('porcentaje_Utilidad').value;
    var porIVA        = document.getElementById('porcentaje_IVA').value;
    var porComisiones = document.getElementById('porcentaje_Comisiones').value;
    var porIndirecto  = document.getElementById('porcentaje_Indirecto').value;
    var porVenta     = document.getElementById('porcentaje_Venta').value;
    var porcentaje1   = final * porUtilidad;
    var porcentaje2   = final * porIVA;
    var porcentaje3   = final * porComisiones;
    var porcentaje4   = final * porIndirecto;
    var porcentaje5   = final * porVenta;
    var totalplus     = porcentaje1 + porcentaje2 + porcentaje3 + porcentaje4 + porcentaje5 + final;

    if (isNaN(total)) {

        $('#monto-total').val('0.00');
        $('#costo-unitario').val('0.00');
        $('.grand-total').html('$0.00');
        $('#total').html('$0.00');

        $('#UtilidadDrop').html('$0.00');
        $('#IVADrop').html('$0.00');
        $('#ComisionesDrop').html('$0.00');
        $('#IndirectoDrop').html('$0.00');
        $('#VentasDrop').html('$0.00');
        $('#Totalplus').html('$0.00');

        $('#UtilidadResumen').html('$0.00');
        $('#IVAResumen').html('$0.00');
        $('#ComisionesResumen').html('$0.00');
        $('#IndirectoResumen').html('$0.00');
        $('#VentasResumen').html('$0.00');
        //$('#DescuentoResumen').html('$0.00');
        $('#TotalResumen').html('$0.00');

    } else {

        $('#monto-total').val(final.toFixed(2));
//        $('#costo-unitario').val(final / parseFloat($("#qty").val()));
        $('#costo-unitario').val(costo_unitario_tmp.toFixed(2));
        $('.grand-total').html('$' + final.toFixed(2));
        $('#total').html('$' + final.toFixed(2));

        $('#UtilidadDrop').html('$' + porcentaje1.toFixed(2));
        $('#IVADrop').html('$' + porcentaje2.toFixed(2));
        $('#ComisionesDrop').html('$' + porcentaje3.toFixed(2));
        $('#IndirectoDrop').html('$' + porcentaje4.toFixed(2));
        $('#VentasDrop').html('$' + porcentaje5.toFixed(2));
        $('#Totalplus').html('$' + totalplus.toFixed(2));

        $('#UtilidadResumen').html('$' + porcentaje1.toFixed(2));
        $('#IVAResumen').html('$' + porcentaje2.toFixed(2));
        $('#ComisionesResumen').html('$' + porcentaje3.toFixed(2));
        $('#IndirectoResumen').html('$' + porcentaje4.toFixed(2));
        $('#VentasResumen').html('$' + porcentaje5.toFixed(2));
        //$('#DescuentoResumen').html('-$' + percentage.toFixed(2));
        $('#TotalResumen').html('$' + totalplus.toFixed(2));
    }
}


jQuery214(document).on("click", ".listimpresiones", function () {

    $(this).closest('tr').remove();

/*
    row_listimpresiones = $('#listimpresiones > tr').length;

    // barrido
    var oTable = document.getElementById('Imptable');

    var rowLength = oTable.rows.length;

    console.log("(3719) rowLength: " + rowLength);

    var oCells = oTable.rows.item(0).cells;
    var cellLength = oCells.length;

    console.log("(3724) cellLength: " + cellLength);

    for (var i = 0; i < rowLength; i++) {

        var oCells = oTable.rows.item(i).cells;

        var cellLength = oCells.length;

        for (var j = 0; j < cellLength; j++) {

            var cellVal = oCells.item(j).innerHTML;

            alert("j: " + j + " = " + cellVal);
        }
    }
*/

    aImp.length = 0;

    var TableData       = "";
    var tipo_imp_offset = "";

    $("#Imptable tr").each(function(row, tr){

        var IDopImp       = "";
        var tintassel     = "";
        var tintassel_str = "";
        var tipoOffset    = "";

        var tipo_imp_emp = $(tr).find('td:eq(0)').text(); // IDopImp

        if (tipo_imp_emp == 'Offset') {

            tintassel_str = $(tr).find('td:eq(3)').text();
            tintassel     = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(4)').text();  
        } else if (tipo_imp_emp == "Digital") {

            tintassel_str = '1';
            tintassel     = parseInt(tintassel_str, 10);

            tipoOffset = "";  // tipoOffset

        } else if (tipo_imp_emp == "Serigrafia") {
            
//            IDopImp = $(tr).find('td:eq(1)').text();
            tintassel_str = $(tr).find('td:eq(3)').text();
            tintassel     = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(4)').text();  
        }

        aImp.push({"Tipo_impresion": tipo_imp_emp, "tintas": tintassel, "tipo_offset": tipoOffset});
    });

    collectPrices();

});


jQuery214(document).on("click", ".listimpresionesfcajon", function () {

    $(this).closest('tr').remove();

/*
    row_listimpresionesfcajon = $('#listimpresionesfcajon > tr').length;

    console.log("(3712) cuantos renglones: " + row_listimpresionesfcajon);

    // barrido
    var oTable = document.getElementById('Imptablefcajon');

    var rowLength = oTable.rows.length;

    console.log("(3719) rowLength: " + rowLength);

    var oCells = oTable.rows.item(0).cells;
    var cellLength = oCells.length;

    console.log("(3724) cellLength: " + cellLength);

    for (var i = 0; i < rowLength; i++) {

        var oCells = oTable.rows.item(i).cells;

        var cellLength = oCells.length;

        for (var j = 0; j < cellLength; j++) {

            var cellVal = oCells.item(j).innerHTML;

            alert("j: " + j + " = " + cellVal);
        }
    }
*/

    aImpFCaj.length = 0;

    var TableData       = "";
    var tipo_imp_offset = "";

    $("#Imptablefcajon tr").each(function(row, tr){

        var IDopImp       = "";
        var tintassel     = "";
        var tintassel_str = "";
        var tipoOffset    = "";

        var tipo_imp_offset = $(tr).find('td:eq(0)').text(); // IDopImp

        if (tipo_imp_offset == 'Offset') {

            tintassel_str = $(tr).find('td:eq(3)').text();
            tintassel = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(4)').text();  
        } else if (tipo_imp_offset == "Digital") {

            tintassel_str = '1';
            tintassel = parseInt(tintassel_str, 10);

            tipoOffset = "";  // tipoOffset
        } else if (tipo_imp_offset == "Serigrafia") {
            
            tintassel_str = $(tr).find('td:eq(3)').text();
            tintassel = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(4)').text();  
        }


        aImpFCaj.push({"Tipo_impresion": tipo_imp_offset, "tintas": tintassel, "tipo_offset": tipoOffset});
    });


    collectPrices();
});


jQuery214(document).on("click", ".listimpresionesfcartera", function () {

    $(this).closest('tr').remove();

/*
    row_listimpresionesfcartera = $('#listimpresionesfcartera > tr').length;

    console.log("(3712) cuantos renglones: " + row_listimpresionesfcartera);

    // barrido
    var oTable = document.getElementById('Imptablefcartera');

    var rowLength = oTable.rows.length;

    console.log("(3819) rowLength: " + rowLength);

    var oCells = oTable.rows.item(0).cells;
    var cellLength = oCells.length;

    console.log("(3824) cellLength: " + cellLength);

    for (var i = 0; i < rowLength; i++) {

        var oCells = oTable.rows.item(i).cells;

        var cellLength = oCells.length;

        for (var j = 0; j < cellLength; j++) {

            var cellVal = oCells.item(j).innerHTML;

            alert("j: " + j + " = " + cellVal);
        }
    }
*/

    aImpFCar.length = 0;


    $("#Imptablefcartera tr").each(function(row, tr){

        var IDopImp       = "";
        var tintassel     = "";
        var tintassel_str = "";
        var tipoOffset    = "";

        tipo_imp_fcartera = $(tr).find('td:eq(0)').text(); // IDopImp

        if (tipo_imp_fcartera == 'Offset') {

            tintassel_str = $(tr).find('td:eq(2)').text();
            tintassel = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(3)').text();  
        } else if (tipo_imp_fcartera == "Digital") {

            tintassel_str = '1';
            tintassel = parseInt(tintassel_str, 10);

            tipoOffset = "";  // tipoOffset
        } else if (tipo_imp_fcartera == "Serigrafia") {
            
            tintassel_str = $(tr).find('td:eq(2)').text();
            tintassel = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(3)').text();  
        }

        aImpFCar.push({"Tipo_impresion": tipo_imp_fcartera, "tintas": tintassel, "tipo_offset": tipoOffset});
    });

    collectPrices();
});


jQuery214(document).on("click", ".listimpresionesguarda", function () {

    $(this).closest('tr').remove();

/*
    row_listimpresionesguarda = $('#listimpresionesguarda > tr').length;

    console.log("(3889) cuantos renglones: " + row_listimpresionesguarda);


    // barrido
    var oTable = document.getElementById('Imptableguarda');

    var rowLength = oTable.rows.length;

    console.log("(3897) rowLength: " + rowLength);

    var oCells     = oTable.rows.item(0).cells;
    var cellLength = oCells.length;

    console.log("(3902) cellLength: " + cellLength);

    for (var i = 0; i < rowLength; i++) {

        var oCells = oTable.rows.item(i).cells;

        var cellLength = oCells.length;

        for (var j = 0; j < cellLength; j++) {

            var cellVal = oCells.item(j).innerHTML;

            alert("j: " + j + " = " + cellVal);
        }
    }
*/

    aImpG.length = 0;

    var TableData       = "";
    var tipo_imp_offset = "";

    $("#Imptableguarda tr").each(function(row, tr){

        var IDopImp       = "";
        var tintassel     = "";
        var tintassel_str = "";
        var tipoOffset    = "";

        tipo_imp_guarda = $(tr).find('td:eq(0)').text(); // IDopImp

        if (tipo_imp_guarda == 'Offset') {

            tintassel_str = $(tr).find('td:eq(2)').text();
            tintassel     = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(3)').text();  
        } else if (tipo_imp_guarda == "Digital") {

            tintassel_str = '1';
            tintassel     = parseInt(tintassel_str, 10);

            tipoOffset = "";  // tipoOffset

        } else if (tipo_imp_guarda == "Serigrafia") {
            
            tintassel_str = $(tr).find('td:eq(2)').text();
            tintassel     = parseInt(tintassel_str, 10);

            tipoOffset = $(tr).find('td:eq(3)').text();  
        }

        aImpG.push({"Tipo_impresion": tipo_imp_guarda, "tintas": tintassel, "tipo_offset": tipoOffset});
    });

    collectPrices();
});


jQuery214(document).on("click", ".delete", function () {

    $(this).closest('tr').remove();

    collectPrices();
});






function calculaCosto(CostoCiento, CostoMillar, CostoCiento, papel, CUnidad, CostoUnico) {

    var Cantidad   = parseInt($('#qty').val());
    var final      = 0;
    var cientounit = CostoCiento / 100;

    if (Cantidad > 0 && Cantidad <= 100) {

        final += CostoUnico + (CUnidad * Cantidad) + (papel * Cantidad) + CostoCiento + CostoMillar;
    } else if (Cantidad == 0 ) {

        final += 0;
    } else if (Cantidad >= 101 && Cantidad <= 999) {

        final += CostoUnico + (CUnidad * Cantidad) + (papel * Cantidad) + CostoCiento + ((Cantidad - 100) * cientounit) + CostoMillar;
    } else if (Cantidad >= 1000 && Cantidad <= 20000) {

        final += CostoUnico + CostoCiento + CostoMillar + ((Cantidad - 1000) * (CostoMillar / 1000)) + ((Cantidad - 100) * (CostoCiento / 100)) + (Cantidad * CUnidad) + (papel * Cantidad);
    }

    return final;
}


jQuery214(document).on("click", "#print_submit", function () {

    calculaImpresiones();
    collectPrices();
    closeModal();
});


function calculaImpresiones(){

    var lines = $('#impresiones .vertical-line-active');

    $('.prints').remove();

    $('#impresiones .vertical-line-active').each(function(i, obj) {

        var descript    = $(this).data('descript');
        var lugar       = $(this).data('lugar');
        var tipo        = $(this).data('tipo');
        var posicion    = $(this).data('posicion');
        var input_tintas;
        var tintas      = (($(this).find('input').val() != undefined)? ' ' + $(this).find('input').val() + ' tintas ': '');
        var CostoCiento = parseFloat($(this).data('costociento'));
        var CostoMillar = parseFloat($(this).data('costomillar'));
        var CostoUnico  = parseFloat($(this).data('costounico'));
        var papel       = parseFloat($(this).data('papel'));
        var CUnidad     = parseFloat($(this).data('costounitario'));

        if ($(this).find('input').val()!=undefined) {

            input_tintas = '<input type="hidden" class="" name="impresiones[' + posicion + '][' + tipo + '][tintas]" value="' + $(this).find('input').val() + '">';
        } else {

            input_tintas = '';
        }

        var line_costo = calculaCosto(CostoCiento, CostoMillar, CostoCiento, papel, CUnidad, CostoUnico);

        var tr = '<tr class="prints"><td>' + descript + tintas + ' en ' + lugar + '</td><td>$' + line_costo.toFixed(2) + '</td><td><div class=""></div></td><input type="hidden" class="" name="impresiones[' + posicion + '][' + tipo + '][costo]" value="' + line_costo.toFixed(2) + '">' + input_tintas + '</tr>';

        jQuery214('#resume-body').append(tr);
    });
}


jQuery214(document).on("click", "#impresiones-button", function () {

    var qty = parseInt($('#qty').val());

    if (qty <= 30) {

        $('.offset-tab .watcher-tab').show();
    } else {

        $('.offset-tab .watcher-tab').hide();
    }

    showModal('impresiones');
});


jQuery214(document).on("submit", "#caja-form", function(e) {

/*
    var p_ancho;
    var p_largo;
    var precio
    var precio_forros = 0;
    var papel;
    var forro_parte;
    var part_ancho;
    var part_largo;
    var data_name;


    while (aTr3.length > 6) {

        aTr3.pop();
    }

    $('.paper_selected').each(function(i, obj) {

        papel_elegido = true;

        forro_parte = $(this).data('parte');
        p_ancho = parseFloat($(this).find('option:selected').data('ancho'));
        p_largo = parseFloat($(this).find('option:selected').data('largo'));

        var data_id      = parseFloat($(this).find('option:selected').val());
        var data_offset  = $(this).data('offset');
        var data_digital = $(this).data('digital');

        part_ancho    = $(this).data('ancho');
        data_name     = $(this).data('name');
        data_laminado = $(this).data('laminado');
        part_largo    = $(this).data('largo');
        precio        = parseFloat(jQuery214(this).find('option:selected').data('precio'));
        papel         = jQuery214(this).find('option:selected').html();

        if ( ancho_cajon > p_ancho || ancho_cajon > p_largo || largo_cajon > p_ancho || largo_cajon > p_largo ) {

//            if ( confirm("ERROR: el corte no puede ser mas grande que las dimensiones del papel (" + p_ancho + ' cmX' + p_largo + ' cm)')) {

                resetDimentions();

                return false;
//            }
        } else {

            calculaPapel(p_ancho, p_largo, eval(part_ancho), eval(part_largo), forro_parte, false, precio, papel, data_name, data_laminado, data_id, data_offset, data_digital);
        }

    });

    var grosor_cajon   = $('#grosor_cajon_1').val();
    var ancho_carton1  = $('#grosor_cajon_1').find('option:selected').data('ancho');
    var largo_carton1  = $('#grosor_cajon_1').find('option:selected').data('largo');
    var precio_carton1 = $('#grosor_cajon_1').find('option:selected').data('price');
    var id_carton1     = $('#grosor_cajon_1').find('option:selected').data('id');


    calculaPapel(ancho_carton1, largo_carton1, ancho_cajon, largo_cajon, 'cajon', false, precio_carton1, 'carton', 'carton_cajon', 'false', id_carton1, 'false', 'false');

    var grosor_cajon   = $('#grosor_cartera_1').val();
    var ancho_carton2  = $('#grosor_cartera_1').find('option:selected').data('ancho');
    var largo_carton2  = $('#grosor_cartera_1').find('option:selected').data('largo');
    var precio_carton2 = $('#grosor_cartera_1').find('option:selected').data('price');
    var id_carton2     = $('#grosor_cartera_1').find('option:selected').data('id');


    calculaPapel(ancho_carton2, largo_carton2, ancho_cartera, largo_cartera, 'cartera', false, precio_carton2, 'carton', 'carton_cartera', 'false', id_carton2, 'false', 'false');

    closeModal();

    $('#materiales-base').val(precio_forros.toFixed(2));

    collectPrices();
*/

    /*********** checar arriba ************** 
*/

    e.preventDefault();

    var formData = $("#caja-form").serializeArray();

    var aCalculos_tmp = JSON.stringify(aCalculos, null, 4);
    var aCortes_tmp   = JSON.stringify(aCortes, null, 4);
    var aTr3_tmp      = JSON.stringify(aTr3, null, 4);

    // impresion
    var aImp_tmp     = JSON.stringify(aImp, null, 4);
    var aImpFCaj_tmp = JSON.stringify(aImpFCaj, null, 4);
    var aImpFCar_tmp = JSON.stringify(aImpFCar, null, 4);
    var aImpG_tmp    = JSON.stringify(aImpG, null, 4);


    // acababos
    var aAcb_tmp     = JSON.stringify(aAcb, null, 4);
    var aAcbFCaj_tmp = JSON.stringify(aAcbFCaj, null, 4);
    var aAcbFCar_tmp = JSON.stringify(aAcbFCar, null, 4);
    var aAcbG_tmp    = JSON.stringify(aAcbG, null, 4);


    // cierres
    var aCierres_tmp = JSON.stringify(aCierres, null, 4);


    // bancos
    var aBancos_tmp = JSON.stringify(aBancos, null, 4);


    // accesorios
    var aAccesorios_tmp = JSON.stringify(aAccesorios, null, 4);


    formData.push({name: 'aCalculos', value: aCalculos_tmp});   // calculadora
    formData.push({name: 'aCortes', value: aCortes_tmp});
    formData.push({name: 'aTr3', value: aTr3_tmp});             // mermas
    
    formData.push({name: 'aImp', value: aImp_tmp});
    formData.push({name: 'aImpFCaj', value: aImpFCaj_tmp});
    formData.push({name: 'aImpFCar', value: aImpFCar_tmp});
    formData.push({name: 'aImpG', value: aImpG_tmp});

    formData.push({name: 'aAcb', value: aAcb_tmp});
    formData.push({name: 'aAcbFCaj', value: aAcbFCaj_tmp});
    formData.push({name: 'aAcbFCar', value: aAcbFCar_tmp});
    formData.push({name: 'aAcbG', value: aAcbG_tmp});

    formData.push({name: 'aCierres', value: aCierres_tmp});
    formData.push({name: 'aBancos', value: aBancos_tmp});
    formData.push({name: 'aAccesorios', value: aAccesorios_tmp});

/*
    formData.push({name: 'row_listimpresiones', value: row_listimpresiones});
    formData.push({name: 'row_listimpresionesfcajon', value: row_listimpresionesfcajon});
    formData.push({name: 'row_listimpresionesfcartera', value: row_listimpresionesfcartera});
    formData.push({name: 'row_listimpresionesguarda', value: row_listimpresionesguarda});
*/

    $.ajax({
        type:"POST",
//        dataType: "json",
        url: $('#caja-form').attr('action'),
        data: formData,
    })
    .done(function(response) {

        console.log('(5252) Correcto');

        console.log('(5254) respuesta: ' + response);

        var jsonactivado = true;

        if (jsonactivado) {

            var js_respuesta =  JSON.parse(response); // trae toda la matriz 

            $('#table_adicionales_tr').empty();

        // (RESUMEN)

            $('#resumenEmpalme').empty();
            $('#resumenFcajon').empty();
            $('#resumenFcartera').empty();
            $('#resumenGuarda').empty();
            $('#resumenCartones').empty();
            $('#resumenCierres').empty();

            var rm_empalme   = '<tr><td><b>Empalme del Cajón</b></td><td></td><td></td><td></td></tr>';
            var rm_fcajon    = '<tr><td><b>Forro del Cajón</b></td><td></td><td></td><td></td></tr>';
            var rm_fcartera  = '<tr><td><b>Forro de la Cartera</b></td><td></td><td></td><td></td></tr>';
            var rm_guarda    = '<tr><td><b>Guarda</b></td><td></td><td></td><td></td></tr>';
            //var rm_cartoncaj = '<tr><td><b>Cartón Cajón</b></td><td></td><td></td><td></td></tr>';
            //var rm_cartoncar = '<tr><td><b>Cartón Cartera</b></td><td></td><td></td><td></td></tr>';
            var rm_cierres   = '<tr><td><b>Cierres</b></td><td></td><td></td><td></td></tr>';

            jQuery214('#resumenEmpalme').append(rm_empalme); //imprime para el resumen
            jQuery214('#resumenFcajon').append(rm_fcajon); //imprime para el resumen
            jQuery214('#resumenFcartera').append(rm_fcartera); //imprime para el resumen
            jQuery214('#resumenGuarda').append(rm_guarda); //imprime para el resumen
            jQuery214('#resumenCierres').append(rm_cierres); //imprime para el resumen

        // (PAPELES)

            $('#table_papeles_tr').empty();

            var respuestapapeles;

            var js_parte_nombre;

            var js_color_parte;

            for (c in js_respuesta) {

            //titulos nombre parte
                if (c === 'Papel_Empalme') {

                    js_parte_nombre = "Empalme del Cajón";

                    //js_color_parte  = '<td style="background: paleturquoise;"></td>';
                }

                if (c === 'Papel_FCaj') {

                    js_parte_nombre = "Forro del Cajón";

                    //js_color_parte  = '<td style="background: thistle;"></td>';
                }

                if (c === 'Papel_FCar') {

                    js_parte_nombre = "Forro de la Cartera";

                    //js_color_parte  = '<td style="background: wheat;"></td>';
                }

                if (c === 'Papel_Guarda') {

                    js_parte_nombre = "Guarda";

                    //js_color_parte  = '<td style="background: #a5e8a5;"></td>';
                }
                
            //comparaciones y asignación
            
            // Papeles todos
                if (c === 'Papel_Empalme' || c === 'Papel_FCaj' || c === 'Papel_FCar' || c === 'Papel_Guarda') {

                    var js_papel_interior_cajon_nombre_emp  = js_respuesta[c]['nombre'];
                    var js_corte_largo_Emp                  = js_respuesta[c]['corte_largo'];
                    var js_corte_ancho_Emp                  = js_respuesta[c]['corte_ancho'];
                    var js_papel_interior_cajon_cortes_Emp  = js_respuesta[c]['cortes'];
                    var js_papel_interior_cajon_pliegos_Emp = js_respuesta[c]['pliegos'];
                    var js_Costo_total_pliegos_emp_Emp      = js_respuesta[c]['costo_tot_pliegos'];

                    if (js_papel_interior_cajon_nombre_emp === undefined || js_corte_largo_Emp === undefined || js_corte_ancho_Emp === undefined || js_papel_interior_cajon_cortes_Emp === undefined || js_papel_interior_cajon_pliegos_Emp === undefined || js_Costo_total_pliegos_emp_Emp === undefined) {

                        console.log('Buscando los papeles elegidos en: '+ js_parte_nombre);

                    }else{

                        console.log('Se encontró el papel para: '+ js_parte_nombre);

                        var trpapelesEmp = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr><td>Material</td><td>'+ js_papel_interior_cajon_nombre_emp +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_Emp +' Ancho: '+ js_corte_ancho_Emp +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_papel_interior_cajon_cortes_Emp +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_papel_interior_cajon_pliegos_Emp +'</td></tr><tr><td>Costo Total</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="prices" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td></tr>';

                        jQuery214('#table_papeles_tr').append(trpapelesEmp); //imprime tr

                        var parteresumen;

                        if (js_parte_nombre == 'Empalme del Cajón') {

                            parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                        }

                        if (js_parte_nombre == 'Forro del Cajón') {

                            parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                        }

                        if (js_parte_nombre == 'Forro de la Cartera') {

                           parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                        }

                        if (js_parte_nombre == 'Guarda') {

                            parteresumen = '<tr><td></td><td>Papel '+ js_papel_interior_cajon_nombre_emp +'</td><td>$'+ js_Costo_total_pliegos_emp_Emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="' + js_Costo_total_pliegos_emp_Emp.toFixed(2) + '"></td><td></td></tr>';

                            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                        }
                    }
                }
            }

        // (CARTONES)

            var js_nombre_cajon_CartonCaj      = js_respuesta.CartonCaj['nombre'];
            var js_corte_largo_CartonCaj       = js_respuesta.CartonCaj['corte_largo'];
            var js_corte_ancho_CartonCaj       = js_respuesta.CartonCaj['corte_ancho'];
            var js_Piezas_por_Pliego_CartonCaj = js_respuesta.CartonCaj['piezas_por_pliego'];
            var js_Num_pliegos_CartonCaj       = js_respuesta.CartonCaj['num_pliegos'];
            var js_costo_total_CartonCaj       = js_respuesta.CartonCaj['costo_tot_carton'];

            var trpapelescartonj = '<tr><td colspan="2" style="background: steelblue;color: white;">Carton del Cajón</td></tr><tr><td>Material</td><td>'+ js_nombre_cajon_CartonCaj +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_CartonCaj +' Ancho: '+ js_corte_ancho_CartonCaj +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_Piezas_por_Pliego_CartonCaj +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_Num_pliegos_CartonCaj +'</td></tr><tr><td>Costo Total</td><td>$'+ js_costo_total_CartonCaj.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_total_CartonCaj.toFixed(2) +'"></td></tr>';

            jQuery214('#table_papeles_tr').append(trpapelescartonj);

            parteresumen = '<tr><td></td><td>'+ js_nombre_cajon_CartonCaj +'</td><td>$'+ js_costo_total_CartonCaj.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_total_CartonCaj.toFixed(2) +'"></td><td></td></tr>';

            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

            var js_nombre_cajon_cartera_CartonCar = js_respuesta.CartonCar['nombre'];
            var js_corte_largo_CartonCar          = js_respuesta.CartonCar['corte_largo'];
            var js_corte_ancho_CartonCar          = js_respuesta.CartonCar['corte_ancho'];
            var js_Piezas_por_Pliego_CartonCar    = js_respuesta.CartonCar['piezas_por_pliego'];
            var js_Num_pliegos_CartonCar          = js_respuesta.CartonCar['num_pliegos'];
            var js_costo_total_CartonCar          = js_respuesta.CartonCar['costo_tot_carton'];

            var trpapelescartoncr = '<tr><td colspan="2" style="background: steelblue;color: white;">Carton Cartera</td></tr><tr><td>Material</td><td>'+ js_nombre_cajon_cartera_CartonCar +'</td></tr><tr><td>Cortes Aplicados</td><td>Largo: '+ js_corte_largo_CartonCar +' Ancho: '+ js_corte_ancho_CartonCar +'</td></tr><tr><td>Piezas por Hoja</td><td>'+ js_Piezas_por_Pliego_CartonCar +'</td></tr><tr><td>Hojas necesarias (sin merma)</td><td>'+ js_Num_pliegos_CartonCar +'</td></tr><tr><td>Costo Total</td><td>$'+ js_costo_total_CartonCar.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_total_CartonCar.toFixed(2) +'"></td></tr>';

            jQuery214('#table_papeles_tr').append(trpapelescartoncr);

            parteresumen = '<tr><td></td><td>'+ js_nombre_cajon_cartera_CartonCar +'</td><td>$'+ js_costo_total_CartonCar.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_total_CartonCar.toFixed(2) +'"></td><td></td></tr>';

            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

        // Elaboración
            var js_elab_car_tiraje            = js_respuesta.elab_car['tiraje'];
            var js_elab_car_forro_costo_unit  = js_respuesta.elab_car['forro_costo_unit'];
            var js_elab_car_forro_car         = js_respuesta.elab_car['forro_car'];
            var js_elab_car_guarda_costo_unit = js_respuesta.elab_guarda['guarda_costo_unit'];
            var js_elab_car_guarda            = js_respuesta.elab_guarda['guarda'];
            var js_elab_costo_tot_elab_car    = js_elab_car_forro_car + js_elab_car_guarda;

            var elab_car_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Elaboración</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_elab_car_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Totales</td></tr><tr><td>Forro</td><td>'+ js_elab_car_forro_costo_unit +'</td><td>'+ js_elab_car_forro_car +'</td></tr><tr><td>Guarda</td><td>'+ js_elab_car_guarda_costo_unit +'</td><td>'+ js_elab_car_guarda +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_elab_costo_tot_elab_car.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_elab_costo_tot_elab_car.toFixed(2) +'"></td></tr><tr><td colspan="3"></td></tr>';

            jQuery214('#table_adicionales_tr').append(elab_car_tr);

            var parteresumen = '<tr><td></td><td>Elaboración</td><td>$'+ js_elab_car_forro_car.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_elab_car_forro_car.toFixed(2) + '"></td><td></td></tr>';

            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

            var parteresumen = '<tr><td></td><td>Elaboración</td><td>$'+ js_elab_car_guarda.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="' + js_elab_car_guarda.toFixed(2) + '"></td><td></td></tr>';

            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen

        // Ranurado
            var js_ranurado_tiraje                = js_respuesta.ranurado['tiraje'];
            var js_ranurado_arreglo               = js_respuesta.ranurado['arreglo'];
            var js_ranurado_costo_unit_por_ranura = js_respuesta.ranurado['costo_unit_por_ranura'];
            var js_ranurado_costo_por_ranura      = js_respuesta.ranurado['costo_por_ranura'];
            var js_ranurado_costo_tot_ranurado    = js_respuesta.ranurado['costo_tot_ranurado'];

            var js_ranurado_costo_unit_por_ranura2 = js_respuesta.ranurado_Fcar['costo_unit_por_ranura'];
            var js_ranurado_costo_por_ranura2      = js_respuesta.ranurado_Fcar['costo_por_ranura'];

            var js_ranurado_costo_tot_todo_ranura  = js_ranurado_costo_tot_ranurado + js_ranurado_costo_por_ranura2;

            var ranurado_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Ranurado</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_ranurado_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_ranurado_arreglo +'</td><td>'+ js_ranurado_arreglo +'</td></tr><tr><td>Ranurado Cajón</td><td>'+ js_ranurado_costo_unit_por_ranura +'</td><td>'+ js_ranurado_costo_por_ranura +'</td></tr><tr><td>Ranurado Cartera</td><td>'+ js_ranurado_costo_unit_por_ranura2 +'</td><td>'+ js_ranurado_costo_por_ranura2 +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_ranurado_costo_tot_todo_ranura.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_ranurado_costo_tot_todo_ranura.toFixed(2) +'"></td></tr><tr><td colspan="3"></td></tr>';

            jQuery214('#table_adicionales_tr').append(ranurado_tr);

            var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_tot_ranurado.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="' + js_ranurado_costo_tot_ranurado.toFixed(2) + '"></td><td></td></tr>';

            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen

            var parteresumen = '<tr><td></td><td>Ranurado</td><td>$'+ js_ranurado_costo_por_ranura2.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="' + js_ranurado_costo_por_ranura2.toFixed(2) + '"></td><td></td></tr>';

            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

        // Encuadernacion
            var js_encuadernacionranurado_tiraje                       = js_respuesta.encuadernacion['tiraje'];
            var js_encuadernacion_costo_unitario_iman                  = js_respuesta.encuadernacion['costo_unitario_iman'];
            var js_encuadernacion_Perforado_para_iman_y_puesta_de_iman = js_respuesta.encuadernacion['perforado_para_iman_y_puesta_de_iman'];
            var js_encuadernacion_despunte_costo_unitario              = js_respuesta.encuadernacion['despunte_costo_unitario'];
            var js_encuadernacion_Despunte_de_esquinas_para_cajon      = js_respuesta.encuadernacion['despunte_de_esquinas_para_cajon'];
            var js_encuadernacion_costo_unitario_Forrado_de_cajon      = js_respuesta.encuadernacion_Fcaj['costo_unit_forrado_cajon'];
            var js_encuadernacion_Forrado_de_cajon                     = js_respuesta.encuadernacion_Fcaj['forrado_de_cajon'];
            var js_encuadernacion_Arreglo_de_Forrado_de_cajon          = js_respuesta.encuadernacion_Fcaj['arreglo_de_forrado_de_cajon'];
            var js_encuadernacion_encajada_costo_unitario              = js_respuesta.encuadernacion['encajada_costo_unitario'];
            var js_encuadernacion_Encajada                             = js_respuesta.encuadernacion['encajada'];
            var js_encuadernacion_empalme_cajon_costo_unitario         = js_respuesta.encuadernacion_Fcaj['empalme_cajon_costo_unitario'];
            var js_encuadernacion_Empalme_de_cajon                     = js_respuesta.encuadernacion_Fcaj['empalme_de_cajon'];
            var js_encuadernacion_puesta_banco_costo_unit              = js_respuesta.encuadernacion['puesta_banco_costo_unit'];
            var js_encuadernacion_Puesta_de_banco                      = js_respuesta.encuadernacion['puesta_de_banco'];
            var js_encuadernacion_costo_tot_proceso                    = js_respuesta.encuadernacion['costo_tot_proceso'];

            var ranurado_tr = '<tr><td colspan="3" style="background: steelblue;color: white;">Encuadernación</td></tr><tr style="background: #87ceeb73;"><td colspan="3">Cantidad: '+ js_encuadernacionranurado_tiraje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Iman</td><td>'+ js_encuadernacion_costo_unitario_iman +'</td><td>'+ js_encuadernacion_Perforado_para_iman_y_puesta_de_iman +'</td></tr><tr><td>Despunte</td><td>'+ js_encuadernacion_despunte_costo_unitario +'</td><td>'+ js_encuadernacion_Despunte_de_esquinas_para_cajon +'</td></tr><tr><td>Forrado</td><td>'+ js_encuadernacion_costo_unitario_Forrado_de_cajon +'</td><td>'+ js_encuadernacion_Forrado_de_cajon +'</td></tr><tr><td>Arreglo Forrado</td><td>'+ js_encuadernacion_Arreglo_de_Forrado_de_cajon +'</td><td>'+ js_encuadernacion_Arreglo_de_Forrado_de_cajon +'</td></tr><tr><td>Encajada</td><td>'+ js_encuadernacion_encajada_costo_unitario +'</td><td>'+ js_encuadernacion_Encajada +'</td></tr><tr><td>Empalme</td><td>'+ js_encuadernacion_empalme_cajon_costo_unitario +'</td><td>'+ js_encuadernacion_Empalme_de_cajon +'</td></tr><tr><td>Banco</td><td>'+ js_encuadernacion_puesta_banco_costo_unit +'</td><td>'+ js_encuadernacion_Puesta_de_banco +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_encuadernacion_costo_tot_proceso.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_encuadernacion_costo_tot_proceso.toFixed(2) +'"></td></tr><tr><td colspan="3"></td></tr>';

            jQuery214('#table_adicionales_tr').append(ranurado_tr);

            var parteresumen = '<tr><td></td><td>Encuadernación</td><td></td><td>$'+ js_encuadernacion_costo_tot_proceso.toFixed(2) +'</td></tr>';

            jQuery214('#resumenOtros').append(parteresumen); //imprime para el resumen

        //Variables gral de IMPRESIONES

            $('#proceso_offset_M1').hide();

            $('#proceso_serigrafia_M1').hide();

            $('#proceso_digital_M1').hide();

            $('#table_proc_offset').empty();

            $('#table_proc_serigrafia').empty();

            $('#table_proc_digital').empty();

            var js_variable_extra1   = js_respuesta.OffEmp; //trae los valores del array OffEmp

            var js_variable_extra1_1 = js_respuesta.Off_maq_Emp; //trae los valores del array Off_maq_Emp

            var js_variable_extra2   = js_respuesta.SerEmp; //trae los valores del array SerEmp

            var js_variable_extra3   = js_respuesta.DigEmp; //trae los valores del array DigEmp

            var js_variable_extra4   = js_respuesta.OffFCaj; //trae los valores del array OffFCaj

            var js_variable_extra5   = js_respuesta.SerFCaj; //trae los valores del array SerFCaj

            var js_variable_extra6   = js_respuesta.DigFCaj; //trae los valores del array DigFCaj

            var js_variable_extra7   = js_respuesta.OffFCar; //trae los valores del array OffFCar

            var js_variable_extra8   = js_respuesta.SerFCar; //trae los valores del array SerFCar

            var js_variable_extra9   = js_respuesta.DigFCar; //trae los valores del array DigFCar

            var js_variable_extra10  = js_respuesta.OffG; //trae los valores del array OffG

            var js_variable_extra11  = js_respuesta.SerG; //trae los valores del array SerG

            var js_variable_extra12  = js_respuesta.DigG; //trae los valores del array DigG

        // Empalme (IMPRESIONES)
            // Empalme Proceso Offset
            for ( a in js_variable_extra1 ) {

                var js_costo_unitario_laminas_emp = js_variable_extra1[a]['costo_unitario_laminas'];
                var js_costo_tot_laminas_emp      = js_variable_extra1[a]['costo_tot_laminas'];
                var js_costo_unitario_arreglo_emp = js_variable_extra1[a]['costo_unitario_arreglo'];
                var js_costo_tot_arreglo_emp      = js_variable_extra1[a]['costo_tot_arreglo'];
                var js_costo_unitario_tiro_emp    = js_variable_extra1[a]['costo_unitario_tiro'];
                var js_costo_tot_tiro_emp         = js_variable_extra1[a]['costo_unitario_tiro']; //js_variable_extra1[a]['costo_tot_tiro'];

                //*** otros datos ****
                var js_cantidad_emp               = js_variable_extra1[a]['cantidad'];
                var js_tipo_emp                   = js_variable_extra1[a]['tipo'];
                var js_num_tintas_emp             = js_variable_extra1[a]['num_tintas'];

                var js_total_offset_emp           = js_variable_extra1[a]['costo_tot_proceso'];

                // imprime en la tabla de procesos añadidos Offset
                var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_offset').append(processoffset);

                $('#proceso_offset_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
            }

            // Empalme Proceso Offset Maquila
            for ( a_a in js_variable_extra1_1 ) {

                var js_costo_unitario_laminas_emp = js_variable_extra1_1[a_a]['costo_unitario_laminas_maq'];
                var js_costo_tot_laminas_emp      = js_variable_extra1_1[a_a]['costo_laminas_maq'];
                var js_costo_unitario_arreglo_emp = js_variable_extra1_1[a_a]['costo_unitario_arreglo_maq'];
                var js_costo_tot_arreglo_emp      = js_variable_extra1_1[a_a]['costo_arreglo_maq'];
                var js_costo_unitario_maquila     = js_variable_extra1_1[a_a]['costo_unitario_maq'];
                var js_costo_tot_maquila          = js_variable_extra1_1[a_a]['costo_tot_maquila'];

                //*** otros datos ****
                var js_cantidad_emp               = js_variable_extra1_1[a_a]['cantidad'];
                var js_tipo_emp                   = js_variable_extra1_1[a_a]['Tipo'];
                var js_num_tintas_emp             = js_variable_extra1_1[a_a]['num_tintas_maq'];

                var js_total_offset_emp           = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_maquila;

                // imprime en la tabla de procesos añadidos Offset
                var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Maquila</td><td>'+ js_costo_unitario_maquila +'</td><td>'+ js_costo_tot_maquila +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                $('#table_proc_offset').empty();

                jQuery214('#table_proc_offset').append(processoffset);

                $('#proceso_offset_M1').show();
            }

            // Empalme Proceso Serigrafia
            for ( b in js_variable_extra2 ) {

                var js_cantidad_seri               = js_variable_extra2[b]['cantidad'];
                var js_tipo_seri                   = js_variable_extra2[b]['tipo'];
                var js_num_tintas_seri             = js_variable_extra2[b]['num_tintas'];
                var js_costo_unitario_arreglo_seri = js_variable_extra2[b]['costo_unitario_arreglo'];
                var js_costo_arreglo_seri          = js_variable_extra2[b]['costo_arreglo'];
                var js_costo_unitario_tiro_seri    = js_variable_extra2[b]['costo_unitario_tiro'];
                var js_costo_tot_tiro_serigrafia   = js_variable_extra2[b]['costo_unitario_tiro']; //js_variable_extra2[b]['costo_tiro'];
                var js_tot_serigrafia_emp          = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia

                var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_serigrafia').append(processserigrafia);

                $('#proceso_serigrafia_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
            }

            // Empalme Proceso Digital
            for ( c in js_variable_extra3 ) {

                var js_cantidad_con_merma_digital = js_variable_extra3[c]['cantidad'];
                var js_costo_unitario_digital     = js_variable_extra3[c]['costo_unitario'];
                var js_costo_tot_digital          = js_variable_extra3[c]['costo_tot'];

                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Empalme del Cajón</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Costo Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                jQuery214('#table_proc_digital').append(processdigital);

                $('#proceso_digital_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_digital.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
            }

        //Forro del Cajón (IMPRESIONES)

            // Fcajon Proceso Offset
            for ( a in js_variable_extra4 ) {

                var js_costo_unitario_laminas_emp = js_variable_extra4[a]['costo_unitario_laminas'];
                var js_costo_tot_laminas_emp      = js_variable_extra4[a]['costo_tot_laminas'];
                var js_costo_unitario_arreglo_emp = js_variable_extra4[a]['costo_unitario_arreglo'];
                var js_costo_tot_arreglo_emp      = js_variable_extra4[a]['costo_tot_arreglo'];
                var js_costo_unitario_tiro_emp    = js_variable_extra4[a]['costo_unitario_tiro'];
                var js_costo_tot_tiro_emp         = js_variable_extra4[a]['costo_unitario_tiro']; //js_variable_extra4[a]['costo_tot_tiro'];

                // *** otros datos ****
                var js_cantidad_emp               = js_variable_extra4[a]['cantidad'];
                var js_tipo_emp                   = js_variable_extra4[a]['tipo'];
                var js_num_tintas_emp             = js_variable_extra4[a]['num_tintas'];

                var js_total_offset_emp           = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;

                // imprime en la tabla de procesos añadidos Offset
                var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_offset').append(processoffset);

                $('#proceso_offset_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen     
            }

            // Fcajon Proceso Serigrafia
            for ( b in js_variable_extra5 ) {

                var js_cantidad_seri               = js_variable_extra5[b]['cantidad'];
                var js_tipo_seri                   = js_variable_extra5[b]['tipo'];
                var js_num_tintas_seri             = js_variable_extra5[b]['num_tintas'];
                var js_costo_unitario_arreglo_seri = js_variable_extra5[b]['costo_unitario_arreglo'];
                var js_costo_arreglo_seri          = js_variable_extra5[b]['costo_arreglo'];
                var js_costo_unitario_tiro_seri    = js_variable_extra5[b]['costo_unitario_tiro'];
                var js_costo_tot_tiro_serigrafia   = js_variable_extra5[b]['costo_tiro'];
                var js_tot_serigrafia_emp          = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia

                var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_serigrafia').append(processserigrafia);

                $('#proceso_serigrafia_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
            }

            // Fcajon Proceso Digital
            for ( c in js_variable_extra6 ) {

                var js_cantidad_con_merma_digital = js_variable_extra6[c]['cantidad'];
                var js_costo_unitario_digital     = js_variable_extra6[c]['costo_unitario'];
                var js_costo_tot_digital          = js_variable_extra6[c]['costo_tot'];

                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Forro del Cajón</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Coto Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                jQuery214('#table_proc_digital').append(processdigital);

                $('#proceso_digital_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_digital.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
            }

        // Forro de la Cartera (IMPRESIONES)

            // Fcartera Proceso Offset
            for ( a in js_variable_extra7 ) {

                var js_costo_unitario_laminas_emp = js_variable_extra7[a]['costo_unitario_laminas'];
                var js_costo_tot_laminas_emp      = js_variable_extra7[a]['costo_tot_laminas'];
                var js_costo_unitario_arreglo_emp = js_variable_extra7[a]['costo_unitario_arreglo'];
                var js_costo_tot_arreglo_emp      = js_variable_extra7[a]['costo_tot_arreglo'];
                var js_costo_unitario_tiro_emp    = js_variable_extra7[a]['costo_unitario_tiro'];
                var js_costo_tot_tiro_emp         = js_variable_extra7[a]['costo_unitario_tiro']; //js_variable_extra7[a]['costo_tot_tiro'];

                //*** otros datos ****
                var js_cantidad_emp               = js_variable_extra7[a]['cantidad'];
                var js_tipo_emp                   = js_variable_extra7[a]['tipo'];
                var js_num_tintas_emp             = js_variable_extra7[a]['num_tintas'];

                var js_total_offset_emp           = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;

                // imprime en la tabla de procesos añadidos Offset
                var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_offset').append(processoffset);

                $('#proceso_offset_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
            }

            // Fcartera Proceso Serigrafia
            for ( b in js_variable_extra8 ) {

                var js_cantidad_seri               = js_variable_extra8[b]['cantidad'];
                var js_tipo_seri                   = js_variable_extra8[b]['tipo'];
                var js_num_tintas_seri             = js_variable_extra8[b]['num_tintas'];
                var js_costo_unitario_arreglo_seri = js_variable_extra8[b]['costo_unitario_arreglo'];
                var js_costo_arreglo_seri          = js_variable_extra8[b]['costo_arreglo'];
                var js_costo_unitario_tiro_seri    = js_variable_extra8[b]['costo_unitario_tiro'];
                var js_costo_tot_tiro_serigrafia   = js_variable_extra8[b]['costo_tiro'];
                var js_tot_serigrafia_emp          = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia

                var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_serigrafia').append(processserigrafia);

                $('#proceso_serigrafia_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
            }

            // Fcartera Proceso Digital
            for ( c in js_variable_extra9 ) {

                var js_cantidad_con_merma_digital = js_variable_extra9[c]['cantidad'];
                var js_costo_unitario_digital     = js_variable_extra9[c]['costo_unitario'];
                var js_costo_tot_digital          = js_variable_extra9[c]['costo_tot'];

                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Forro de la Cartera</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Coto Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                jQuery214('#table_proc_digital').append(processdigital);

                $('#proceso_digital_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_digital.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
            }

        // Guarda (IMPRESIONES)

            // Guarda Proceso Offset
            for ( a in js_variable_extra10 ) {

                var js_costo_unitario_laminas_emp = js_variable_extra10[a]['costo_unitario_laminas'];
                var js_costo_tot_laminas_emp      = js_variable_extra10[a]['costo_tot_laminas'];
                var js_costo_unitario_arreglo_emp = js_variable_extra10[a]['costo_unitario_arreglo'];
                var js_costo_tot_arreglo_emp      = js_variable_extra10[a]['costo_tot_arreglo'];
                var js_costo_unitario_tiro_emp    = js_variable_extra10[a]['costo_unitario_tiro'];
                var js_costo_tot_tiro_emp         = js_variable_extra10[a]['costo_unitario_tiro']; //js_variable_extra10[a]['costo_tot_tiro'];

                //*** otros datos ****
                var js_cantidad_emp               = js_variable_extra10[a]['cantidad'];
                var js_tipo_emp                   = js_variable_extra10[a]['tipo'];
                var js_num_tintas_emp             = js_variable_extra10[a]['num_tintas'];

                var js_total_offset_emp           = js_costo_tot_laminas_emp + js_costo_tot_arreglo_emp + js_costo_tot_tiro_emp;

                // imprime en la tabla de procesos añadidos Offset
                var processoffset = '<tr><td colspan="3" style="background: steelblue;color: white;">Guarda</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_emp +'</td><td>Tipo: '+ js_tipo_emp +'</td><td>Tintas: '+ js_num_tintas_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Laminas</td><td>'+ js_costo_unitario_laminas_emp +'</td><td>'+ js_costo_tot_laminas_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_emp +'</td><td>'+ js_costo_tot_arreglo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_emp +'</td><td>'+ js_costo_tot_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_total_offset_emp +'<input type="hidden" class="prices" value="'+ js_total_offset_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_offset').append(processoffset);

                $('#proceso_offset_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Offset</td><td>$'+ js_total_offset_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_total_offset_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
            }

            // Guarda Proceso Serigrafia
            for ( b in js_variable_extra11 ) {

                var js_cantidad_seri               = js_variable_extra11[b]['cantidad'];
                var js_tipo_seri                   = js_variable_extra11[b]['tipo'];
                var js_num_tintas_seri             = js_variable_extra11[b]['num_tintas'];
                var js_costo_unitario_arreglo_seri = js_variable_extra11[b]['costo_unitario_arreglo'];
                var js_costo_arreglo_seri          = js_variable_extra11[b]['costo_arreglo'];
                var js_costo_unitario_tiro_seri    = js_variable_extra11[b]['costo_unitario_tiro'];
                var js_costo_tot_tiro_serigrafia   = js_variable_extra11[b]['costo_tiro'];
                var js_tot_serigrafia_emp          = js_costo_arreglo_seri + js_costo_tot_tiro_serigrafia

                var processserigrafia = '<tr><td colspan="3" style="background: steelblue;color: white;">Guarda</td></tr><tr style="background: #87ceeb73;"><td>Cantidad: '+ js_cantidad_seri +'</td><td>Tipo: '+ js_tipo_seri +'</td><td>Tintas: '+ js_num_tintas_seri +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_costo_unitario_arreglo_seri +'</td><td>'+ js_costo_arreglo_seri +'</td></tr><tr><td>Tiro</td><td>'+ js_costo_unitario_tiro_seri +'</td><td>'+ js_costo_tot_tiro_serigrafia +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_tot_serigrafia_emp +'<input type="hidden" class="prices" value="'+ js_tot_serigrafia_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                jQuery214('#table_proc_serigrafia').append(processserigrafia);

                $('#proceso_serigrafia_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Serigrafia</td><td>$'+ js_tot_serigrafia_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_tot_serigrafia_emp.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
            }

            // Guarda Proceso Digital
            for ( c in js_variable_extra12 ) {

                var js_cantidad_con_merma_digital = js_variable_extra12[c]['cantidad'];
                var js_costo_unitario_digital     = js_variable_extra12[c]['costo_unitario'];
                var js_costo_tot_digital          = js_variable_extra12[c]['costo_tot_proceso'];

                var processdigital = '<tr><td colspan="4" style="background: steelblue;color: white;">Guarda</td></tr><tr><td>Cantidad</td><td>Costo Unitario</td><td>Coto Total</td></tr><tr><td>'+ js_cantidad_con_merma_digital +'</td><td>'+ js_costo_unitario_digital +'</td><td>$'+ js_costo_tot_digital +'<input type="hidden" class="prices" value="'+ js_costo_tot_digital +'"></td></tr><tr><td colspan="4"></td></tr>';

                jQuery214('#table_proc_digital').append(processdigital);

                $('#proceso_digital_M1').show();

                var parteresumen = '<tr><td></td><td>Impresión Digital</td><td>$'+ js_costo_tot_digital.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_digital.toFixed(2) +'"></td><td></td></tr>';

                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
            }

        //

            $('#proceso_hs_M1').hide();

            $('#proceso_grab_M1').hide();

            $('#proceso_lam_M1').hide();

            $('#proceso_suaje_M1').hide();

            $('#table_proc_Lam').empty();

            $('#table_proc_HS').empty();

            $('#table_proc_Grab').empty();

            $('#table_proc_Suaje').empty();

        // (ACABADOS)

            var respuestaacabados;
            var js_parte_nombre;

            for (c in js_respuesta) {

                respuestaacabados = js_respuesta[c];

                for (a in respuestaacabados) {

                //titulos nombre parte
                    if (c === 'Laminado' || c === 'HotStamping' || c === 'Grabado' || c === 'Suaje') {

                        js_parte_nombre = "Empalme del Cajón";
                    }

                    if (c === 'LaminadoFcaj' || c === 'HotStampingFcaj' || c === 'GrabadoFcaj' || c === 'SuajeFcaj') {

                        js_parte_nombre = "Forro del Cajón";
                    }

                    if (c === 'LaminadoFcar' || c === 'HotStampingFcar' || c === 'GrabadoFcar' || c === 'SuajeFcar') {

                        js_parte_nombre = "Forro de la Cartera";
                    }

                    if (c === 'LaminadoG' || c === 'HotStampingG' || c === 'GrabadoG' || c === 'SuajeG') {

                        js_parte_nombre = "Guarda";
                    }
                
                //comparaciones y asignación
                
                // Acabados Laminado todos
                    if (c === 'Laminado' || c === 'LaminadoFcaj' || c === 'LaminadoFcar' || c === 'LaminadoG') {

                        var js_tipoGrabadoLam_emp = js_respuesta[c][a]['tipoGrabado'];
                        var js_LargoLam_emp       = js_respuesta[c][a]['Largo'];
                        var js_AnchoLam_emp       = js_respuesta[c][a]['Ancho'];
                        
                        var js_costo_unitario_lam_emp = js_respuesta[c][a]['costo_unitario'];
                        var js_costo_tiro_lam_emp     = js_respuesta[c][a]['costo_tot_proceso'];

                        if (js_tipoGrabadoLam_emp === undefined || js_LargoLam_emp === undefined || js_AnchoLam_emp === undefined || js_costo_unitario_lam_emp === undefined || js_costo_tiro_lam_emp === undefined) {

                            console.log('Buscando los laminados agregados');

                        }else{

                            console.log('Se encontro un resultado');

                            var acabadoTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoLam_emp +'</td><td>Tamaño: '+ js_LargoLam_emp +'x'+ js_AnchoLam_emp +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_lam_emp +'</td><td>$'+ js_costo_tiro_lam_emp +'<input type="hidden" class="prices" value="'+ js_costo_tiro_lam_emp +'"></td></tr><tr><td colspan="2"></td></tr>';

                            jQuery214('#table_proc_Lam').append(acabadoTr);

                            $('#tabla_view_acabados').show();

                            $('#proceso_lam_M1').show();

                            var parteresumen;

                            if (js_parte_nombre == 'Empalme del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tiro_lam_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tiro_lam_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro de la Cartera') {

                               parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tiro_lam_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Guarda') {

                                parteresumen = '<tr><td></td><td>Acabado Laminado</td><td>$'+ js_costo_tiro_lam_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tiro_lam_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }
                
                // Acabados HotStamping todos
                    if (c === 'HotStamping' || c === 'HotStampingFcaj' || c === 'HotStampingFcar' || c === 'HotStampingG') {

                        var js_tipoGrabadoHS_emp = js_respuesta[c][a]['tipoGrabado'];
                        var js_ColorHS_emp       = js_respuesta[c][a]['Color'];
                        var js_LargoHS_emp       = js_respuesta[c][a]['Largo'];
                        var js_AnchoHS_emp       = js_respuesta[c][a]['Ancho'];

                        var js_placa_costo_unitario_emp     = js_respuesta[c][a]['placa_costo_unitario'];
                        var js_placa_costo_emp              = js_respuesta[c][a]['placa_costo'];
                        var js_pelicula_costo_unitario_emp  = js_respuesta[c][a]['pelicula_costo_unitario'];
                        var js_pelicula_costo_emp           = js_respuesta[c][a]['pelicula_costo'];
                        var js_arreglo_costo_unitario_emp   = js_respuesta[c][a]['arreglo_costo_unitario'];
                        var js_arreglo_costo_emp            = js_respuesta[c][a]['arreglo_costo'];
                        var js_estampado_costo_unitario_emp = js_respuesta[c][a]['costo_unitario'];
                        var js_estampado_costo_tiro_emp     = js_respuesta[c][a]['costo_tiro'];
                        var js_costo_acabadohs_emp          = js_respuesta[c][a]['costo_tot_proceso'];

                        if (js_tipoGrabadoHS_emp === undefined || js_ColorHS_emp === undefined || js_LargoHS_emp === undefined || js_placa_costo_unitario_emp === undefined || js_placa_costo_emp === undefined || js_pelicula_costo_unitario_emp === undefined || js_pelicula_costo_emp === undefined || js_arreglo_costo_unitario_emp === undefined || js_arreglo_costo_emp === undefined || js_estampado_costo_unitario_emp === undefined || js_estampado_costo_tiro_emp === undefined || js_costo_acabadohs_emp === undefined) {

                            console.log('Buscando los hoststamping agregados');

                        }else{

                            console.log('Se encontro un resultado');

                            var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoHS_emp +'</td><td>Color: '+ js_ColorHS_emp +'</td><td>Tamaño: '+ js_LargoHS_emp +'x'+ js_AnchoHS_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ js_placa_costo_unitario_emp +'</td><td>'+ js_placa_costo_emp +'</td></tr><tr><td>Pelicula</td><td>'+ js_pelicula_costo_unitario_emp +'</td><td>'+ js_pelicula_costo_emp +'</td></tr><tr><td>Arrego</td><td>'+ js_arreglo_costo_unitario_emp +'</td><td>'+ js_arreglo_costo_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_emp +'</td><td>'+ js_estampado_costo_tiro_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabadohs_emp +'<input type="hidden" class="prices" value="'+ js_costo_acabadohs_emp +'"></td></tr><tr><td colspan="3"></td></tr>';

                            jQuery214('#table_proc_HS').append(acabadoTr);

                            $('#tabla_view_acabados').show();

                            $('#proceso_hs_M1').show();

                            var parteresumen;

                            if (js_parte_nombre == 'Empalme del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro de la Cartera') {

                               parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Guarda') {

                                parteresumen = '<tr><td></td><td>Acabado HotStamping</td><td>$'+ js_costo_acabadohs_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabadohs_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }
                
                // Acabados Grabados todos
                    if (c === 'Grabado' || c === 'GrabadoFcaj' || c === 'GrabadoFcar' || c === 'GrabadoG') {

                        var js_tipoGrabadoGrab_emp = js_respuesta[c][a]['tipoGrabado'];
                        var js_LargoGrab_emp       = js_respuesta[c][a]['Largo'];
                        var js_AnchoGrab_emp       = js_respuesta[c][a]['Ancho'];
                        var js_Ubicacion_grab_emp  = js_respuesta[c][a]['ubicacion'];

                        var js_placa_costo_unitario_grab_emp     = js_respuesta[c][a]['placa_costo_unitario'];
                        var js_placa_costo_grab_emp              = js_respuesta[c][a]['placa_costo'];
                        var js_arreglo_costo_unitario_grab_emp   = js_respuesta[c][a]['arreglo_costo_unitario'];
                        var js_arreglo_costo_grab_emp            = js_respuesta[c][a]['arreglo_costo'];
                        var js_estampado_costo_unitario_grab_emp = js_respuesta[c][a]['costo_unitario'];
                        var js_estampado_costo_tiro_grab_emp     = js_respuesta[c][a]['costo_tiro'];
                        var js_costo_acabado_grab_emp            = js_respuesta[c][a]['costo_tot_proceso'];

                        if (js_tipoGrabadoGrab_emp === undefined || js_LargoGrab_emp === undefined || js_AnchoGrab_emp === undefined || js_Ubicacion_grab_emp === undefined || js_placa_costo_unitario_grab_emp === undefined || js_placa_costo_grab_emp === undefined || js_arreglo_costo_unitario_grab_emp === undefined || js_arreglo_costo_grab_emp === undefined || js_estampado_costo_unitario_grab_emp === undefined || js_estampado_costo_tiro_grab_emp === undefined || js_costo_acabado_grab_emp === undefined) {

                            console.log('Buscando los hoststamping agregados');

                        }else{

                            console.log('Se encontro un resultado');

                            var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipoGrabadoGrab_emp +'</td><td>Tamaño: '+ js_LargoGrab_emp +'x'+ js_AnchoGrab_emp +'</td><td>Ubicacion: '+ js_Ubicacion_grab_emp +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Placa</td><td>'+ js_placa_costo_unitario_grab_emp +'</td><td>'+ js_placa_costo_grab_emp +'</td></tr><tr><td>Arreglo</td><td>'+ js_arreglo_costo_unitario_grab_emp +'</td><td>'+ js_arreglo_costo_grab_emp +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_grab_emp +'</td><td>'+ js_estampado_costo_tiro_grab_emp +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabado_grab_emp +'<input type="hidden" class="prices" value="'+ js_costo_acabado_grab_emp +'"></td></tr><tr><td colspan="3"></td></tr>';


                            jQuery214('#table_proc_Grab').append(acabadoTr);

                            $('#tabla_view_acabados').show();

                            $('#proceso_grab_M1').show();

                            var parteresumen;

                            if (js_parte_nombre == 'Empalme del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro de la Cartera') {

                               parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Guarda') {

                                parteresumen = '<tr><td></td><td>Acabado Grabado</td><td>$'+ js_costo_acabado_grab_emp.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabado_grab_emp.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }

                // Acabados Suaje todos
                    if (c === 'Suaje' || c === 'SuajeFcaj' || c === 'SuajeFcar' || c === 'SuajeG') {

                        var js_tipoGrabadoSuaje = js_respuesta[c][a]['tipoGrabado'];
                        var js_LargoSuaje       = js_respuesta[c][a]['Largo'];
                        var js_AnchoSuaje       = js_respuesta[c][a]['Ancho'];

                        var js_arreglo_costo_unitario_suaje   = js_respuesta[c][a]['arreglo_costo_unitario'];
                        var js_arreglo_costo_suaje            = js_respuesta[c][a]['costo_arreglo'];
                        var js_estampado_costo_unitario_suaje = 0; //js_respuesta[c][a]['figura_costo_unitario'];
                        var js_estampado_costo_tiro_suaje     = js_respuesta[c][a]['costo_tiro'];
                        var js_costo_acabado_suaje            = js_respuesta[c][a]['costo_tot_proceso'];

                        if (js_tipoGrabadoSuaje === undefined || js_LargoSuaje === undefined || js_AnchoSuaje === undefined || js_arreglo_costo_unitario_suaje === undefined || js_arreglo_costo_suaje === undefined || js_estampado_costo_unitario_suaje === undefined || js_estampado_costo_tiro_suaje === undefined || js_costo_acabado_suaje === undefined) {

                            console.log('Buscando los suajes agregados');

                        }else{

                            console.log('Se encontro un resultado');

                            var acabadoTr = '<tr><td colspan="3" style="background: steelblue;color: white;">'+ js_parte_nombre +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Tipo: '+ js_tipoGrabadoSuaje +'</td><td>Tamaño: '+ js_LargoSuaje +'x'+ js_AnchoSuaje +'</td></tr><tr><td></td><td>Costo Unitario</td><td>Subtotal</td></tr><tr><td>Arreglo</td><td>'+ js_arreglo_costo_unitario_suaje +'</td><td>'+ js_arreglo_costo_suaje +'</td></tr><tr><td>Tiro</td><td>'+ js_estampado_costo_unitario_suaje +'</td><td>'+ js_estampado_costo_tiro_suaje +'</td></tr><tr style="border-top: 2px solid #cccc;"><td></td><td>Total</td><td>$'+ js_costo_acabado_suaje +'<input type="hidden" class="prices" value="'+ js_costo_acabado_suaje +'"></td></tr><tr><td colspan="3"></td></tr>';


                            jQuery214('#table_proc_Suaje').append(acabadoTr);

                            $('#tabla_view_acabados').show();

                            $('#proceso_suaje_M1').show();

                            var parteresumen;

                            if (js_parte_nombre == 'Empalme del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro del Cajón') {

                                parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Forro de la Cartera') {

                               parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (js_parte_nombre == 'Guarda') {

                                parteresumen = '<tr><td></td><td>Acabado Suaje</td><td>$'+ js_costo_acabado_suaje.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_acabado_suaje.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }
                    }
                }
            }

        // (CIERRES)

            $('#table_cierres').empty();

            var respuestacierres;

            for (c in js_respuesta) {

                respuestacierres = js_respuesta[c];

                for (a in respuestacierres) {

                    if (c === "Cierres") {

                        var js_Tipo_cierre_seleccion = js_respuesta[c][a]['Tipo_cierre'];
                        var js_tiraje_cierre         = js_respuesta[c][a]['tiraje'];
                        var js_numpares_cierre       = js_respuesta[c][a]['numpares'];
                        var js_largo_cierre          = js_respuesta[c][a]['largo'];
                        var js_ancho_cierre          = js_respuesta[c][a]['ancho'];
                        var js_tipo_cierre           = js_respuesta[c][a]['tipo'];
                        var js_color_cierre          = js_respuesta[c][a]['color'];
                        var js_costo_unitario_cierre = js_respuesta[c][a]['costo_unitario'];
                        var js_costo_cierre_cierre   = js_respuesta[c][a]['costo_cierre'];

                        if (js_costo_cierre_cierre > 0) {

                            if (js_Tipo_cierre_seleccion == "Iman") {

                                var cierreTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_Tipo_cierre_seleccion +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Numero de pares: '+ js_numpares_cierre +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_cierre +'</td><td>$'+ js_costo_cierre_cierre +'<input type="hidden" class="prices" value="'+ js_costo_cierre_cierre +'"></td></tr><tr><td colspan="2"></td></tr>';
                            }

                            if (js_Tipo_cierre_seleccion == "Liston") {

                                var cierreTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_Tipo_cierre_seleccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipo_cierre +'</td><td>Tamaño: '+ js_largo_cierre +'x'+ js_ancho_cierre +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_cierre +'</td><td>$'+ js_costo_cierre_cierre +'<input type="hidden" class="prices" value="'+ js_costo_cierre_cierre +'"></td></tr><tr><td colspan="2"></td></tr>';
                            }

                            if (js_Tipo_cierre_seleccion == "Marialuisa") {

                                var cierreTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_Tipo_cierre_seleccion +'</td><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_cierre +'</td><td>$'+ js_costo_cierre_cierre +'<input type="hidden" class="prices" value="'+ js_costo_cierre_cierre +'"></td></tr><tr><td colspan="2"></td></tr>';
                            }

                            if (js_Tipo_cierre_seleccion == "Suaje calado") {

                                var cierreTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_Tipo_cierre_seleccion +'</td></tr><tr style="background: #87ceeb73;"><td>Tipo: '+ js_tipo_cierre +'</td><td>Tamaño: '+ js_largo_cierre +'x'+ js_ancho_cierre +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_cierre +'</td><td>$'+ js_costo_cierre_cierre +'<input type="hidden" class="prices" value="'+ js_costo_cierre_cierre +'"></td></tr><tr><td colspan="2"></td></tr>';
                            }

                            if (js_Tipo_cierre_seleccion == "Velcro") {

                                var cierreTr = '<tr><td colspan="2" style="background: steelblue;color: white;">'+ js_Tipo_cierre_seleccion +'</td></tr><tr style="background: #87ceeb73;"><td colspan="2">Numero de pares: '+ js_numpares_cierre +'</td></tr><tr><td>Costo Unitario</td><td>Total</td></tr><tr><td>$'+ js_costo_unitario_cierre +'</td><td>$'+ js_costo_cierre_cierre +'<input type="hidden" class="prices" value="'+ js_costo_cierre_cierre +'"></td></tr><tr><td colspan="2"></td></tr>';
                            }

                            jQuery214('#table_cierres').append(cierreTr);

                            var parteresumen;

                            parteresumen = '<tr><td></td><td>'+ js_Tipo_cierre_seleccion +'</td><td>$'+ js_costo_cierre_cierre.toFixed(2) +'<input type="hidden" class="pricesresumencierres" value="'+ js_costo_cierre_cierre.toFixed(2) +'"></td><td></td></tr>';

                            jQuery214('#resumenCierres').append(parteresumen); //imprime para el resumen
                        }
                    }
                }
            }

        // (MERMAS)
            $('#table_mermas_tr').empty();

            var respuestamermas;

            var js_color_parte;

            for (c in js_respuesta) {

                respuestamermas = js_respuesta[c];

                for (a in respuestamermas) {

                    //titulos nombre parte
                    if (c == 'OffEmp' || c == 'SerEmp' || c == 'DigEmp' || c == 'Laminado' || c == 'HotStamping' || c == 'Grabado' || c == 'Suaje') {

                        js_parte_nombre = "Empalme del Cajón";

                        js_color_parte  = '<td style="background: paleturquoise;">E</td>';
                    }

                    if (c == 'OffFCaj' || c == 'SerFCaj' || c == 'DigFCaj' || c == 'LaminadoFcaj' || c == 'HotStampingFcaj' || c == 'GrabadoFcaj' || c == 'SuajeFcaj') {

                        js_parte_nombre = "Forro del Cajón";

                        js_color_parte  = '<td style="background: thistle;">Fj</td>';
                    }

                    if (c == 'OffFCar' || c == 'SerFCar' || c == 'DigFCar' || c == 'LaminadoFcar' || c == 'HotStampingFcar' || c == 'GrabadoFcar' || c == 'SuajeFcar') {

                        js_parte_nombre = "Forro de la Cartera";

                        js_color_parte  = '<td style="background: wheat;">Fr</td>';
                    }

                    if (c == 'OffG' || c == 'SerG' || c == 'DigG' || c == 'LaminadoG' || c == 'HotStampingG' || c == 'GrabadoG' || c == 'SuajeG') {

                        js_parte_nombre = "Guarda";

                        js_color_parte  = '<td style="background: # a5e8a5;">G</td>';
                    }

                    if (c === "OffEmp" || c === "SerEmp" || c === "DigEmp" || c === "OffFCaj" || c === "SerFCaj" || c === "DigFCaj" || c === "OffFCar" || c === "SerFCar" || c === "DigFCar" || c === "OffG" || c === "SerG" || c === "DigG" || c == 'Laminado' || c == 'HotStamping' || c == 'Grabado' || c == 'Suaje' || c == 'OffFCaj' || c == 'SerFCaj' || c == 'DigFCaj' || c == 'LaminadoFcaj' || c == 'HotStampingFcaj' || c == 'GrabadoFcaj' || c == 'SuajeFcaj' || c == 'OffFCar' || c == 'SerFCar' || c == 'DigFCar' || c == 'LaminadoFcar' || c == 'HotStampingFcar' || c == 'GrabadoFcar' || c == 'SuajeFcar' || c == 'OffG' || c == 'SerG' || c == 'DigG' || c == 'LaminadoG' || c == 'HotStampingG' || c == 'GrabadoG' || c == 'SuajeG'){

                        var js_tiraje_mm           = js_respuesta[c][a]['cantidad'];
                        var js_merma_min_mm        = js_respuesta[c][a]['mermas']['merma_min']; //minima
                        var js_merma_adic_mm       = js_respuesta[c][a]['mermas']['merma_adic']; // adicional
                        var js_merma_tot_mm        = js_respuesta[c][a]['mermas']['merma_tot']; // total merma
                        var js_costo_unit_merma_mm = js_respuesta[c][a]['mermas']['costo_unit_papel_merma'];
                        var js_costo_unit_merma_2m = js_respuesta[c][a]['mermas']['costo_unit_merma'];
                        var js_costo_tot_merma_mm  = js_respuesta[c][a]['mermas']['costo_tot_pliegos_merma'];


                        console.log('Se encontro mermas en: ' + js_parte_nombre);


                        if (c === "OffEmp" || c === "OffFCaj" || c === "OffFCar" || c === "OffG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>Offset</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "OffEmp") {

                                parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "OffFCaj") {

                                parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "OffFCar") {

                               parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "OffG") {

                                parteresumen = '<tr><td></td><td>Merma Offset</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        //digital
                        if (c === "DigEmp" || c === "DigFCaj" || c === "DigFCar" || c === "DigG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>Digital</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "DigEmp") {

                                parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "DigFCaj") {

                                parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "DigFCar") {

                               parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "DigG") {

                                parteresumen = '<tr><td></td><td>Merma Digital</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        //serigrafia
                        if (c === "SerEmp" || c === "SerFCaj" || c === "SerFCar" || c === "SerG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>Serigrafia</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_mm.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "SerEmp") {

                                parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "SerFCaj") {

                                parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "SerFCar") {

                               parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "SerG") {

                                parteresumen = '<tr><td></td><td>Merma Serigrafia</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        //Laminado
                        if (c === "Laminado" || c === "LaminadoFcaj" || c === "LaminadoFcar" || c === "LaminadoG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>Laminado</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "Laminado") {

                                parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "LaminadoFcaj") {

                                parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "LaminadoFcar") {

                               parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "LaminadoG") {

                                parteresumen = '<tr><td></td><td>Merma Laminado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        //HotStamping
                        if (c === "HotStamping" || c === "HotStampingFcaj" || c === "HotStampingFcar" || c === "HotStampingG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>HotStamping</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "HotStamping") {

                                parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "HotStampingFcaj") {

                                parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "HotStampingFcar") {

                               parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "HotStampingG") {

                                parteresumen = '<tr><td></td><td>Merma HotStamping</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        //Grabado
                        if (c === "Grabado" || c === "GrabadoFcaj" || c === "GrabadoFcar" || c === "GrabadoG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>Grabado</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "Grabado") {

                                parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "GrabadoFcaj") {

                                parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "GrabadoFcar") {

                               parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "GrabadoG") {

                                parteresumen = '<tr><td></td><td>Merma Grabado</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        //Suaje
                        if (c === "Suaje" || c === "SuajeFcaj" || c === "SuajeFcar" || c === "SuajeG") {

                            var mermastr = '<tr>'+ js_color_parte +'<td>Suaje</td><td>'+ js_merma_min_mm +'</td><td>'+ js_merma_adic_mm +'</td><td>'+ js_merma_tot_mm +'</td><td>$'+ js_costo_unit_merma_2m.toFixed(2) +'</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="prices" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td></tr>';

                            if (c == "Suaje") {

                                parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenempalme" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "SuajeFcaj") {

                                parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcajon" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "SuajeFcar") {

                               parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenfcartera" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen
                            }

                            if (c == "SuajeG") {

                                parteresumen = '<tr><td></td><td>Merma Suaje</td><td>$'+ js_costo_tot_merma_mm.toFixed(2) +'<input type="hidden" class="pricesresumenguarda" value="'+ js_costo_tot_merma_mm.toFixed(2) +'"></td><td></td></tr>';

                                jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen
                            }
                        }

                        jQuery214('#table_mermas_tr').append(mermastr);
                    
                    } else{

                        console.log('Buscando las mermas agregadas en: ' + js_parte_nombre);
                    }
                }
            }

        //final

            var parteresumen;

            parteresumen = '<tr><td></td><td></td><td></td><td class="totalEmpalme">$0.00</td></tr>';

            jQuery214('#resumenEmpalme').append(parteresumen); //imprime para el resumen

            collectTotEmpalme();

            parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcajon">$0.00</td></tr>';

            jQuery214('#resumenFcajon').append(parteresumen); //imprime para el resumen

            collectTotFcajon();

            parteresumen = '<tr><td></td><td></td><td></td><td class="totalFcartera">$0.00</td></tr>';

            jQuery214('#resumenFcartera').append(parteresumen); //imprime para el resumen

            collectTotFcartera();

            parteresumen = '<tr><td></td><td></td><td></td><td class="totalGuarda">$0.00</td></tr>';

            jQuery214('#resumenGuarda').append(parteresumen); //imprime para el resumen

            collectTotGuarda();

            parteresumen = '<tr><td></td><td><b>Subtotal:</b></td><td class="grand-total">$0.00</td><td class="grand-total">$0.00</td></tr><tr><td></td><td></td><td>Utilidad: </td><td id="UtilidadResumen">$0.00</td></tr><tr><td></td><td></td><td>IVA:</td><td id="IVAResumen">$0.00</td></tr><tr><td></td><td></td><td>Comisiones: </td><td id="ComisionesResumen">$0.00</td></tr><tr><td></td><td></td><td>% Indirecto: </td><td id="IndirectoResumen">$0.00</td></tr><tr><td></td><td></td><td>% Ventas: </td><td id="VentasResumen">$0.00</td></tr><tr><td></td><td></td><td><b>Total: </b></td><td id="TotalResumen">$0.00</td></tr>';

                //<tr><td></td><td></td><td>Descuento: </td><td id="DescuentoResumen" style="color: red;">$0.00</td></tr>

            jQuery214('#resumenOtros').append(parteresumen); //imprime para el resumen

            collectPrices();
            }
    })
    .fail(function(response) {

        console.log('(4680) Error. Revisa.');
    });
});

function collectTotEmpalme() {

    var sum = 0;

    $('.pricesresumenempalme').each(function(){

        sum += parseFloat($(this).val());
    });

    var total = sum;

    if (isNaN(total)) {

        $('.totalEmpalme').html('$0.00');

    } else {

        $('.totalEmpalme').html('$' + total.toFixed(2));
    }
}

function collectTotFcajon() {

    var sum = 0;

    $('.pricesresumenfcajon').each(function(){

        sum += parseFloat($(this).val());
    });

    var total = sum;

    if (isNaN(total)) {

        $('.totalFcajon').html('$0.00');

    } else {

        $('.totalFcajon').html('$' + total.toFixed(2));
    }
}

function collectTotFcartera() {

    var sum = 0;

    $('.pricesresumenfcartera').each(function(){

        sum += parseFloat($(this).val());
    });

    var total = sum;

    if (isNaN(total)) {

        $('.totalFcartera').html('$0.00');

    } else {

        $('.totalFcartera').html('$' + total.toFixed(2));
    }
}

function collectTotGuarda() {

    var sum = 0;

    $('.pricesresumenguarda').each(function(){

        sum += parseFloat($(this).val());
    });

    var total = sum;

    if (isNaN(total)) {

        $('.totalGuarda').html('$0.00');

    } else {

        $('.totalGuarda').html('$' + total.toFixed(2));
    }
}


/* por revisar */
function costoProcesosDefault() {

    var Cantidad = parseInt($('#qty').val());
    var final    = 0;

    /* la siguiente variable costea los procesos de suaje, ranurado y
     * pegado esquina. ¿Por qué?
     *
     * Debe costear los procesos mínimos más aquellos prcesos seleccionados
     * por el usuario cotizador e incluirles las correspondientes
     * mermas de papeles.
     * 
    */
    var procesos = [2, 13, 21];     // Suaje, Ranuradora, Pegado Esquina???

    /* Corregir el siguiente foreach, ya que está basado en la tabla
     * "procesos_catalogo" que tiene datos inventados y no considera
     * las variantes de cada proceso.
     *
    */
    $.each(costos_papeles, function(index, ppapel) {

        $.each(procesos, function(index, item) {

            var CostoUnico  = parseFloat($('#pro-' + item).data('costounico'));
            var CUnidad     = parseFloat($('#pro-' + item).data('costounitario'));
            var CostoCiento = parseFloat($('#pro-' + item).data('costociento'));
            var CostoMillar = parseFloat($('#pro-' + item).data('costomillar'));
            var papel       = parseFloat(ppapel);
            var cientounit  = CostoCiento / 100;

            if (Cantidad > 0 && Cantidad <= 100) {

                final += CostoUnico + (CUnidad * Cantidad) + (papel * Cantidad) + CostoCiento + CostoMillar;
            } else if (Cantidad == 0 ) {

                final += 0;
            } else if (Cantidad >= 101 && Cantidad <= 999) {

                final += CostoUnico + (CUnidad * Cantidad) + (papel * Cantidad) + CostoCiento + ((Cantidad - 100) * cientounit) + CostoMillar;
            } else if (Cantidad >= 1000 && Cantidad <= 20000) {

                final += CostoUnico + CostoCiento + CostoMillar + ((Cantidad - 1000) * (CostoMillar / 1000)) + ((Cantidad - 100) * (CostoCiento / 100)) + (Cantidad * CUnidad) + (papel * Cantidad);
            }
        });
    });

    return final;
}


//<!-- muestra el menu de modelos de cajas -->
    document.getElementById('box-model').onchange = function(event){
        var model = document.getElementById('box-model').value;

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

        if (model > 0 && model < 8) {
            $('#form_modelo_'+model).show();
            $('#form_modelo_'+model+'_derecho').show('normal');
        }

        if (model > 7) {
            $('#form_modelo_0').show();
        }
    };

    $(document).on('click', '#btnResumen', function(event) {

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

    });

    $(document).on('click', '#btnQuitarResumen', function(event) {

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

    });


    /* -------- Activa los div de los select impresiones ---------*/
    document.getElementById('miSelect').onchange = function(event){
        var opcionact = document.getElementById('miSelect').value;

        if (opcionact == 'Offset') {

            $('#opImpresionOffset').show('slow');
            $('#opImpresionDigital').hide('slow');
            $('#opImpresionSerigrafia').hide('slow');
        }

        if (opcionact == 'Digital') {

            $('#opImpresionDigital').show('slow');
            $('#opImpresionOffset').hide('slow');
            $('#opImpresionSerigrafia').hide('slow');
        }

        if (opcionact == 'Serigrafia') {

            $('#opImpresionSerigrafia').show('slow');
            $('#opImpresionOffset').hide('slow');
            $('#opImpresionDigital').hide('slow');
        }
    }


    document.getElementById('miSelectFcajon').onchange = function(event){

        var opcionact = document.getElementById('miSelectFcajon').value;

        if (opcionact == 'Offset') {

            $('#opImpresionOffsetFcajon').show('slow');
            $('#opImpresionDigitalFcajon').hide('slow');
            $('#opImpresionSerigrafiaFcajon').hide('slow');
        }

        if (opcionact == 'Digital') {

            $('#opImpresionDigitalFcajon').show('slow');
            $('#opImpresionOffsetFcajon').hide('slow');
            $('#opImpresionSerigrafiaFcajon').hide('slow');
        }

        if (opcionact == 'Serigrafia') {

            $('#opImpresionSerigrafiaFcajon').show('slow');
            $('#opImpresionOffsetFcajon').hide('slow');
            $('#opImpresionDigitalFcajon').hide('slow');
        }
    }


    document.getElementById('miSelectFcartera').onchange = function(event){

        var opcionact = document.getElementById('miSelectFcartera').value;

        if (opcionact == 'Offset') {

            $('#opImpresionOffsetFcartera').show('slow');
            $('#opImpresionDigitalFcartera').hide('slow');
            $('#opImpresionSerigrafiaFcartera').hide('slow');
        }

        if (opcionact == 'Digital') {

            $('#opImpresionDigitalFcartera').show('slow');
            $('#opImpresionOffsetFcartera').hide('slow');
            $('#opImpresionSerigrafiaFcartera').hide('slow');
        }

        if (opcionact == 'Serigrafia') {

            $('#opImpresionSerigrafiaFcartera').show('slow');
            $('#opImpresionOffsetFcartera').hide('slow');
            $('#opImpresionDigitalFcartera').hide('slow');
        }
    }


    document.getElementById('miSelectGuarda').onchange = function(event){

        var opcionact = document.getElementById('miSelectGuarda').value;

        if (opcionact == 'Offset') {

            $('#opImpresionOffsetGuarda').show('slow');
            $('#opImpresionDigitalGuarda').hide('slow');
            $('#opImpresionSerigrafiaGuarda').hide('slow');
        }

        if (opcionact == 'Digital') {

            $('#opImpresionDigitalGuarda').show('slow');
            $('#opImpresionOffsetGuarda').hide('slow');
            $('#opImpresionSerigrafiaGuarda').hide('slow');
        }

        if (opcionact == 'Serigrafia') {

            $('#opImpresionSerigrafiaGuarda').show('slow');
            $('#opImpresionOffsetGuarda').hide('slow');
            $('#opImpresionDigitalGuarda').hide('slow');
        }
    }


    /* -------- onclick Listo de modales impresiones (tr)---------*/
    /*
     * Esta rutina debe tener identificados cada celda del <tr> con su 
     * respectivo name forzosamente y en su caso el val (cuando proceda).
    */

    $(document).on('click', '#btnImpresiones', function(event) {

        var IDopImp  = $("#miSelect option:selected").data('id');
        var opImp    = $("#miSelect option:selected").text();
        var precio   = $("#miSelect option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOff option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOff option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOff option:selected").data('id');
        var tintassel      = document.getElementById('tintasO').value;

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeri option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeri option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeri option:selected").data('id');
        var tintassel2     = document.getElementById('tintasS').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opImp == 'Offset') {

            var nuloo = document.getElementById('SelectImpTipoOff').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterrorimp').innerHTML = "";

                var imp  = '<tr id="ImpOfEmp"><td class="textImp">' + opImp + '</td><td style="display: none"><input id="IDopImpOfEmp" name="IDopImpOfEmp" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment" >...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel +'<input id="tintasselOfEmp" name="tintasselOfEmp" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset +'<input id="tipoOffEmp" name="tipoOffEmp" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresiones img_delete"></td></tr>';

                aImp.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresiones').modal('hide');

                jQuery214('#listimpresiones').append(imp);

                vacioModalImpresiones();
            }
        }

        if (opImp == 'Digital') {
            var imp  = '<tr id="ImpDigEmp"><td class="textImp">' + opImp +'</td><td style="display: none"><input id="IDopImpDigEmp" name="IDopImpDigEmp" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Se agrego una impresión</span></td><td class="listimpresiones img_delete"></td></tr>';
        
            aImp.push({"Tipo_impresion": opImp, "IDopImp": IDopImp});

            $('#Impresiones').modal('hide');

            jQuery214('#listimpresiones').append(imp);

            vacioModalImpresiones();
        }

        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeri').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterrorimp').innerHTML = "";

                var imp  = '<tr id="ImpSerEmp"><td class="textImp">' + opImp +'</td><td style="display: none"><input id="IDopImpSerEmp" name="IDopImpSerEmp" style="display:none" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImp" style="display: none;">'+ tintassel2 +'<input id="tintasselSerEmp" name="tintasselSerEmp" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeri" style="display: none;">'+ tipoSeri +'<input id="tipoSeriEmp" name="tipoSeriEmp" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresiones img_delete"></td></tr>';
        
                aImp.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresiones').modal('hide');

                jQuery214('#listimpresiones').append(imp);

                vacioModalImpresiones();
            }
        }
    });


    $(document).on('click', '#btnImpresionesFcajon', function(event) {

        var IDopImp  = $("#miSelectFcajon option:selected").data('id');
        var opImp    = $("#miSelectFcajon option:selected").text();
        var precio   = $("#miSelectFcajon option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOffFcajon option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOffFcajon option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOffFcajon option:selected").data('id');
        var tintassel      = document.getElementById('tintasOFcajon').value;

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeriFcajon option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeriFcajon option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeriFcajon option:selected").data('id');
        var tintassel2     = document.getElementById('tintasSFcajon').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opImp == 'Offset') {

            var nuloo = document.getElementById('SelectImpTipoOffFcajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp2').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterrorimp2').innerHTML = "";

                var imp  = '<tr id="ImpOfFcajon"><td class="textImp">' + opImp +'</td><td style="display: none"><input id="IDopImpOfFcajon" name="IDopImpOfFcajon" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImpFcajon" style="display: none;">'+ tintassel + '<input id="tintasselOfFcajon" name="tintasselOfFcajon" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset + '<input id="tipoOffFcajon" name="tipoOffFcajon" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresionesfcajon img_delete"></td></tr>';

                aImpFCaj.push({"Tipo_impresion": opImp, "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresionesfcajon').modal('hide');

                jQuery214('#listimpresionesfcajon').append(imp);

                vacioModalImpresiones();
            }
        }

        if (opImp == 'Digital') {
            var imp  = '<tr id="ImpDigFcajon"><td>' + opImp +'</td><td style="display: none"><input id="IDopImpDigFcajon" name="IDopImpDigFcajon" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Se agrego una impresión</span></td><td class="listimpresionesfcajon img_delete"></td></tr>';

            aImpFCaj.push({"Tipo_impresion": opImp, "IDopImp": IDopImp});

            $('#Impresionesfcajon').modal('hide');

            jQuery214('#listimpresionesfcajon').append(imp);

            vacioModalImpresiones();
        }

        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeriFcajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp2').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterrorimp2').innerHTML = "";

                var imp  = '<tr id="ImpSerFcajon"><td class="textImpFcajon">' + opImp +'</td><td style="display: none"><input id="IDopImpSerFcajon" name="IDopImpSerFcajon" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImpFcajon" style="display: none;">'+ tintassel2 +'<input id="tintasselSerFcajon" name="tintasselSerFcajon" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeriFcajon" style="display: none;">'+ tipoSeri +'<input id="tipoSeriFcajon" name="tipoSeriFcajon" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresionesfcajon img_delete"></td></tr>';

                aImpFCaj.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresionesfcajon').modal('hide');

                jQuery214('#listimpresionesfcajon').append(imp);

                vacioModalImpresiones();
            }
        }
    });


    $(document).on('click', '#btnImpresionesFcartera', function(event) {

        var IDopImp  = $("#miSelectFcartera option:selected").data('id');
        var opImp    = $("#miSelectFcartera option:selected").text();
        var precio   = $("#miSelectFcartera option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOffFcartera option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOffFcartera option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOffFcartera option:selected").data('id');
        var tintassel      = document.getElementById('tintasOFcartera').value;

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeriFcartera option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeriFcartera option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeriFcartera option:selected").data('id');
        var tintassel2     = document.getElementById('tintasSFcartera').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opImp == 'Offset') {

            var nuloo = document.getElementById('SelectImpTipoOffFcartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp3').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterrorimp3').innerHTML = "";

                var imp  = '<tr id="ImpOfFcartera"><td class="textImpFcartera">' + opImp +'<input id="IDopImpOfFcartera" name="IDopImpOfFcartera" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImpFcartera" style="display: none;">'+ tintassel +'<input id="tintasselOfFcartera" name="tintasselOfFcartera" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset +'<input id="tipoOffFcartera" name="tipoOffFcartera" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresionesfcartera img_delete"></td></tr>';

                aImpFCar.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                $('#Impresionesfcartera').modal('hide');

                jQuery214('#listimpresionesfcartera').append(imp);

                vacioModalImpresiones();
            }
        }

        if (opImp == 'Digital') {
            var imp  = '<tr id="ImpDigFcartera"><td class="textImpFcartera">' + opImp +'<input id="IDopImpDigFcartera" name="IDopImpDigFcartera" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Se agrego una impresión</span></td><td class="listimpresionesfcartera img_delete"></td></tr>';

            aImpFCar.push({"Tipo_impresion": opImp, "IDopImp": IDopImp});

            $('#Impresionesfcartera').modal('hide');

            jQuery214('#listimpresionesfcartera').append(imp);

            vacioModalImpresiones();
        }

        if (opImp == 'Serigrafia') {

            var nuloo = document.getElementById('SelectImpTipoSeriFcartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterrorimp3').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterrorimp3').innerHTML = "";

                var imp  = '<tr id="ImpSerFcartera"><td class="textImpFcartera">' + opImp +'<input id="IDopImpSerFcartera" name="IDopImpSerFcartera" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImpFcartera" style="display: none;">'+ tintassel2 +'<input id="tintasselSerFcartera" name="tintasselSerFcartera" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeriFcartera" style="display: none;">'+ tipoSeri +'<input id="tipoSeriFcartera" name="tipoSeriFcartera" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresionesfcartera img_delete"></td></tr>';

                aImpFCar.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipo_offset": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                $('#Impresionesfcartera').modal('hide');

                jQuery214('#listimpresionesfcartera').append(imp);

                vacioModalImpresiones();
            }
        }
    });


    $(document).on('click', '#btnImpresionesGuarda', function(event) {

        var IDopImp  = $("#miSelectGuarda option:selected").data('id');
        var opImp    = $("#miSelectGuarda option:selected").text();
        var precio   = $("#miSelectGuarda option:selected").data('precio'); //precio unitario

        //para Offset
        var tipoOffset     = $("#SelectImpTipoOffGuarda option:selected").text();
        var preciotipoOff  = $("#SelectImpTipoOffGuarda option:selected").data('precio');
        var idtipoOff      = $("#SelectImpTipoOffGuarda option:selected").data('id');
        var tintassel      = document.getElementById('tintasOGuarda').value;

        //para Serigrafia
        var tipoSeri       = $("#SelectImpTipoSeriGuarda option:selected").text();
        var preciotipoSeri = $("#SelectImpTipoSeriGuarda option:selected").data('precio');
        var idtipoSeri     = $("#SelectImpTipoSeriGuarda option:selected").data('id');
        var tintassel2     = document.getElementById('tintasSGuarda').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opImp == 'Offset') {

                var nuloo = document.getElementById('SelectImpTipoOffGuarda').value;

                if (nuloo == 'selected') {

                    document.getElementById('alerterrorimp4').innerHTML = alertDiv;

                } else{

                    document.getElementById('alerterrorimp4').innerHTML = "";

                    var imp  = '<tr id="ImpOfGuarda"><td class="textImpGuarda">' + opImp +'<input id="IDopImpOfGuarda" name="IDopImpOfGuarda" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel +', Tipo: '+ tipoOffset +'</span></td><td class="tintasImpGuarda" style="display: none;">'+ tintassel +'<input id="tintasselOfGuarda" name="tintasselOfGuarda" type="hidden" value="'+ tintassel +'"></td><td class="tipoOffset" style="display: none;">'+ tipoOffset +'<input id="tipoOffGuarda" name="tipoOffGuarda" type="hidden" value="'+ idtipoOff +'"></td><td class="listimpresionesguarda img_delete"></td></tr>';

                    aImpG.push({"Tipo_impresion": opImp,  "tintas": tintassel, "tipo_offset": tipoOffset, "IDopImp": IDopImp, "idtipoOff": idtipoOff});

                    $('#Impresionesguarda').modal('hide');

                    jQuery214('#listimpresionesguarda').append(imp);

                    vacioModalImpresiones();
                }
        }

        if (opImp == 'Digital') {
            var imp  = '<tr id="ImpDigGuarda"><td class="textImpGuarda">' + opImp +'<input id="IDopImpDigGuarda" name="IDopImpDigGuarda" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Se agrego una impresión</span></td><td class="listimpresionesguarda img_delete"></td></tr>';

            aImpG.push({"Tipo_impresion": opImp, "opImp": IDopImp});

            $('#Impresionesguarda').modal('hide');

            jQuery214('#listimpresionesguarda').append(imp);
        }

        if (opImp == 'Serigrafia') {

                var nuloo = document.getElementById('SelectImpTipoSeriGuarda').value;

                if (nuloo == 'selected') {

                    document.getElementById('alerterrorimp4').innerHTML = alertDiv;

                } else{

                    document.getElementById('alerterrorimp4').innerHTML = "";

                    var imp  = '<tr id="ImpSerGuarda"><td class="textImpGuarda">' + opImp +'<input id="IDopImpSerGuarda" name="IDopImpSerGuarda" type="hidden" value="'+ IDopImp +'"></td><td class="CellWithComment">...<span class="CellComment">Numero de Tintas: '+ tintassel2 +', Tipo: '+ tipoSeri +'</span></td><td class="tintasImpGuarda" style="display: none;">'+ tintassel2 +'<input id="tintasselSerGuarda" name="tintasselSerGuarda" type="hidden" value="'+ tintassel2 +'"></td><td class="tipoSeriGuarda" style="display: none;">'+ tipoSeri +'<input id="tipoSeriGuarda" name="tipoSeriGuarda" type="hidden" value="'+ idtipoSeri +'"></td><td class="listimpresionesguarda img_delete"></td></tr>';

                    aImpG.push({"Tipo_impresion": opImp,  "tintas": tintassel2, "tipoSeri": tipoSeri, "IDopImp": IDopImp, "idtipoSeri": idtipoSeri});

                    $('#Impresionesguarda').modal('hide');

                    jQuery214('#listimpresionesguarda').append(imp);

                    vacioModalImpresiones();
                }
        }
    });


    
    function vacioModalImpresiones(){

        document.getElementById('miSelect').value = "selected";
        document.getElementById('SelectImpTipoOff').value = "selected";
        document.getElementById('SelectImpTipoSeri').value = "selected";
        document.getElementById('opImpresionSerigrafia').style.display = "none";
        document.getElementById('opImpresionOffset').style.display = "none";
        document.getElementById('opImpresionDigital').style.display = "none";

        document.getElementById('miSelectFcajon').value = "selected";
        document.getElementById('SelectImpTipoSeriFcajon').value = "selected";
        document.getElementById('SelectImpTipoOffFcajon').value = "selected";
        document.getElementById('opImpresionSerigrafiaFcajon').style.display = "none";
        document.getElementById('opImpresionOffsetFcajon').style.display = "none";
        document.getElementById('opImpresionDigitalFcajon').style.display = "none";
        document.getElementById('miSelectFcartera').value = "selected";
        document.getElementById('SelectImpTipoSeriFcartera').value = "selected";
        document.getElementById('SelectImpTipoOffFcartera').value = "selected";
        document.getElementById('opImpresionSerigrafiaFcartera').style.display = "none";
        document.getElementById('opImpresionOffsetFcartera').style.display = "none";
        document.getElementById('opImpresionDigitalFcartera').style.display = "none";

        document.getElementById('miSelectGuarda').value = "selected";
        document.getElementById('SelectImpTipoOffGuarda').value = "selected";
        document.getElementById('SelectImpTipoSeriGuarda').value = "selected";
        document.getElementById('opImpresionSerigrafiaGuarda').style.display = "none";
        document.getElementById('opImpresionOffsetGuarda').style.display = "none";
        document.getElementById('opImpresionDigitalGuarda').style.display = "none";

/*
        document.getElementById('tintasO').value         = "1";
        document.getElementById('tintasS').value         = "1";
        document.getElementById('tintasOFcajon').value   = "1";
        document.getElementById('tintasSFcajon').value   = "1";
        document.getElementById('tintasOFcartera').value = "1";
        document.getElementById('tintasSFcartera').value = "1";
        document.getElementById('tintasOGuarda').value   = "1";
        document.getElementById('tintasSGuarda').value   = "1";
*/
    }


    /*    document.getElementById('interior_cajon').onchange = function(event){
        
        $('#paratodos').show('slow');

        var cambio = jQuery214('#interior_cajon  option:selected').html();

        const checkbox = document.getElementById('paratodos');

        checkbox.addEventListener('change', (event) => {
            if (event.target.checked) {
                jQuery214('#interior_cartera_chosen .chosen-single span').html(cambio);
                jQuery214('#exterior_cartera_chosen .chosen-single span').html(cambio);
                jQuery214('#interior_cajon_chosen .chosen-single span').html(cambio);
                jQuery214('#exterior_cajon_chosen .chosen-single span').html(cambio);
                $('#paratodos').hide('slow');
              } else {
                console('error en cambiar papeles');
              }
        })

        $("#paratodos").prop('checked', false);
    }*/

    $(document).on('click', '#buttonProcesos', function(event) {

        $('#tabla_view_procesos').show('normal');
        $('#tabla_view_papeles').hide('normal');
        $('#tabla_view_mermas').hide('normal');
        $('#tabla_view_acabados').show('normal');
    });

    $(document).on('click', '#buttonPapelesYC', function(event) {

        $('#tabla_view_papeles').show('normal');
        $('#tabla_view_procesos').hide('normal');
        $('#tabla_view_mermas').hide('normal');
        $('#tabla_view_acabados').hide('normal');
    });

    $(document).on('click', '#buttonMermas', function(event) {

        $('#tabla_view_mermas').show('normal');
        $('#tabla_view_papeles').hide('normal');
        $('#tabla_view_procesos').hide('normal');
        $('#tabla_view_acabados').hide('normal');
    });


    //Activa los div de los select acabados en parte empalme del cajon -------
    document.getElementById('SelectAcEmp').onchange = function(event){
    
        var opcionact = document.getElementById('SelectAcEmp').value;

        $('#opAcLaminadoEmp').hide('slow');
        $('#opAcHotStampingEmp').hide('slow');
        $('#opAcGrabadoEmp').hide('slow');
        $('#opAcEspecialesEmp').hide('slow');
        $('#opAcBarnizUVEmp').hide('slow');
        $('#opAcSuajeEmp').hide('slow');
        $('#opAcLaserEmp').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoEmp').show('normal');
        }

        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingEmp').show('normal');
        }

        if (opcionact == 'Grabado') {

            $('#opAcGrabadoEmp').show('normal');
        }

        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesEmp').show('normal');
        }

        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVEmp').show('normal');
        }

        if (opcionact == 'Suaje') {

            $('#opAcSuajeEmp').show('normal');
        }

        if (opcionact == 'Corte Laser') {

            $('#opAcLaserEmp').show('normal');
        }

        document.getElementById('SelectUbiGrabEmp').onchange = function(event){

            var ubicacion = document.getElementById('SelectUbiGrabEmp').value;

            if (ubicacion == 'Lomo') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }

            if (ubicacion == 'Cierre') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }

            if (ubicacion == 'Tapa') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }

            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }

            if (ubicacion == 'Derecho') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }

            if (ubicacion == 'Fondo') {

                $('#imagengrabados').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    //Activa los div de los select acabados en parte forro del cajon ---------
    document.getElementById('SelectAcFcajon').onchange = function(event){
    
        var opcionact = document.getElementById('SelectAcFcajon').value;

        $('#opAcLaminadoFcajon').hide('slow');
        $('#opAcHotStampingFcajon').hide('slow');
        $('#opAcGrabadoFcajon').hide('slow');
        $('#opAcEspecialesFcajon').hide('slow');
        $('#opAcBarnizUVFcajon').hide('slow');
        $('#opAcSuajeFcajon').hide('slow');
        $('#opAcLaserFcajon').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoFcajon').show('normal');
        }

        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingFcajon').show('normal');
        }

        if (opcionact == 'Grabado') {

            $('#opAcGrabadoFcajon').show('normal');
        }

        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesFcajon').show('normal');
        }

        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVFcajon').show('normal');
        }

        if (opcionact == 'Suaje') {

            $('#opAcSuajeFcajon').show('normal');
        }

        if (opcionact == 'Corte Laser') {

            $('#opAcLaserFcajon').show('normal');
        }


        document.getElementById('SelectUbiGrabFcajon').onchange = function(event){

            var ubicacion = document.getElementById('SelectUbiGrabFcajon').value;

            if (ubicacion == 'Lomo') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }

            if (ubicacion == 'Cierre') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }

            if (ubicacion == 'Tapa') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }

            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }

            if (ubicacion == 'Derecho') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }

            if (ubicacion == 'Fondo') {

                $('#imagengrabados2').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    //Activa los div de los select acabados en parte forro de la cartera------
    document.getElementById('SelectAcFcartera').onchange = function(event){
    
        var opcionact = document.getElementById('SelectAcFcartera').value;

        $('#opAcLaminadoFcartera').hide('slow');
        $('#opAcHotStampingFcartera').hide('slow');
        $('#opAcGrabadoFcartera').hide('slow');
        $('#opAcEspecialesFcartera').hide('slow');
        $('#opAcBarnizUVFcartera').hide('slow');
        $('#opAcSuajeFcartera').hide('slow');
        $('#opAcLaserFcartera').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoFcartera').show('normal');
        }

        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingFcartera').show('normal');
        }

        if (opcionact == 'Grabado') {

            $('#opAcGrabadoFcartera').show('normal');
        }

        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesFcartera').show('normal');
        }

        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVFcartera').show('normal');
        }

        if (opcionact == 'Suaje') {

            $('#opAcSuajeFcartera').show('normal');
        }

        if (opcionact == 'Corte Laser') {

            $('#opAcLaserFcartera').show('normal');
        }


        document.getElementById('SelectUbiGrabFcartera').onchange = function(event){

            var ubicacion = document.getElementById('SelectUbiGrabFcartera').value;

            if (ubicacion == 'Lomo') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }

            if (ubicacion == 'Cierre') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }

            if (ubicacion == 'Tapa') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }

            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }

            if (ubicacion == 'Derecho') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }

            if (ubicacion == 'Fondo') {

                $('#imagengrabados3').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }

    //Activa los div de los select acabados en parte guarda------
    document.getElementById('SelectAcGuarda').onchange = function(event){
    
        var opcionact = document.getElementById('SelectAcGuarda').value;

        $('#opAcLaminadoGuarda').hide('slow');
        $('#opAcHotStampingGuarda').hide('slow');
        $('#opAcGrabadoGuarda').hide('slow');
        $('#opAcEspecialesGuarda').hide('slow');
        $('#opAcBarnizUVGuarda').hide('slow');
        $('#opAcSuajeGuarda').hide('slow');
        $('#opAcLaserGuarda').hide('slow');


        if (opcionact == 'Laminado') {

            $('#opAcLaminadoGuarda').show('normal');
        }

        if (opcionact == 'HotStamping') {

            $('#opAcHotStampingGuarda').show('normal');
        }

        if (opcionact == 'Grabado') {

            $('#opAcGrabadoGuarda').show('normal');
        }

        if (opcionact == 'Pegados Especiales') {

            $('#opAcEspecialesGuarda').show('normal');
        }

        if (opcionact == 'Barniz UV') {

            $('#opAcBarnizUVGuarda').show('normal');
        }

        if (opcionact == 'Suaje') {

            $('#opAcSuajeGuarda').show('normal');
        }

        if (opcionact == 'Corte Laser') {

            $('#opAcLaserGuarda').show('normal');
        }


        // Ubicacion de la impresion
        document.getElementById('SelectUbiGrabGuarda').onchange = function(event){

            var ubicacion = document.getElementById('SelectUbiGrabGuarda').value;

            if (ubicacion == 'Lomo') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/lomo.png" style="width: 70%">')
            }

            if (ubicacion == 'Cierre') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/cierre.png" style="width: 70%">')
            }

            if (ubicacion == 'Tapa') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/tapa.png" style="width: 70%">')
            }

            if (ubicacion == 'Izquierdo') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/izquierdo.png" style="width: 70%">')
            }

            if (ubicacion == 'Derecho') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/derecho.png" style="width: 70%">')
            }

            if (ubicacion == 'Fondo') {

                $('#imagengrabados4').html('<img border="0" src="<?=URL ;?>public/img/fondo.png" style="width: 70%">')
            }
        }
    }


    // -------- onclick Guardar de modales acabados (tr)---------
    $(document).on('click', '#btnAcabados', function(event) {
        
        var IDopAcb  = $("#SelectAcEmp option:selected").data('id');
        var opAcb    = $("#SelectAcEmp option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoEmp option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoEmp option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSEmp option:selected").text();
        var idtipoHS        = $("#SelectHSEmp option:selected").data('id');
        var ColorHS         = $("#SelectColorHSEmp option:selected").text();
        var idcolorHS       = $("#SelectHSEmp option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_ver').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_ver').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabEmp option:selected").text();
        var idtipoGrabado = $("#SelectHSEmp option:selected").data('id');
        var LargoGrab     = document.getElementById('LargoGrab').value;
        var AnchoGrab     = document.getElementById('AnchoGrab').value;
        var ubicacionGrab = $("#SelectUbiGrabEmp option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesEmp option:selected").text();
        var idtipoEspeciales = $("#SelectHSEmp option:selected").data('id');

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVEmp option:selected").text();
        var idtipoBarnizUV = $("#SelectHSEmp option:selected").data('id');

        //para suaje
        var tipoSuaje   = $("#SelectSuajeEmp option:selected").text();
        var idtipoSuaje = $("#SelectHSEmp option:selected").data('id');
        var LargoSuaje  = document.getElementById('LargoSuaje').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje').value;

        //para laser
        var tipoLaser   = $("#SelectLaserEmp option:selected").text();
        var idtipoLaser = $("#SelectHSEmp option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser').value;
        var AnchoLaser  = document.getElementById('AnchoLaser').value;

        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoEmp').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcLamEmp"><td style="text-align: left;" class="textAcbEmp">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td class="tipoLamEmp" style="display: none">'+ tipoLaminado +'<input id="tipoLaminadoEmp" name="tipoLaminadoEmp" type="hidden" value="'+ idtipoLaminado +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                
                aAcb.push({"Tipo_acabado": opAcb, "IDopAcb": IDopAcb, "tipoGrabado": tipoLaminado, "idtipoLaminado": idtipoLaminado});


                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSEmp').value;
            var nulo2 = document.getElementById('SelectColorHSEmp').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcHSEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td class="tipoAcabadoHS" style="display: none;" >'+ tipoGrabadoHS +'<input id="tipoAcabadoHS" name="tipoAcabadoHS" type="hidden" value="'+ idtipoHS +'"></td><td class="idcolorHS" style="display: none;" >' + idcolorHS + '<input id="idcolorHS" name="idcolorHS" type="hidden" value="'+ idcolorHS +'"></td><td class="ColorHS" style="display: none;" >' + ColorHS + '<input id="ColorHS" name="ColorHS" type="hidden" value="'+ ColorHS +'"></td><td class="LargoHS" style="display: none;">'+ LargoHS_ver +'<input id="LargoHS" name="LargoHS" type="hidden" value="'+ LargoHS_ver +'"></td><td class="AnchoHS" style="display: none;">'+ AnchoHS_ver +'<input id="AnchoHS" name="AnchoHS" type="hidden" value="'+ AnchoHS_ver +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);
                
                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});


                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabEmp').value;
            var nulo2 = document.getElementById('SelectUbiGrabEmp').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcGrabEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td class="tipoGrabadoG" style="display: none;">'+ tipoGrabadoG +'<input id="tipoGrabadoG" name="tipoGrabadoG" type="hidden" value="'+ idtipoGrabado +'"></td><td class="LargoGrab" style="display: none;">'+ LargoGrab +'</td><td class="AnchoGrab" style="display: none;">'+ AnchoGrab +'</td><td class="ubicacionGrab" style="display: none;">'+ ubicacionGrab +'<input id="ubicacionGrab" name="ubicacionGrab" type="hidden" value="'+ ubicacionGrab +'"></td><td class="listacabadosemp img_delete"></td></tr>';


                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});


                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Pegados Especiales') {

            var nulo1 = document.getElementById('SelectEspecialesEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcEspecialesEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoEspeciales +'</span></td><td class="tipoEspeciales" style="display: none">'+ tipoEspeciales +'<input id="tipoEspeciales" name="tipoEspeciales" type="hidden" value="'+ idtipoEspeciales +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Barniz UV') {

            var nulo1 = document.getElementById('SelectBarnizUVEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcBarnizUVEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoBarnizUV +'</span></td><td class="tipoBarnizUV" style="display: none">'+ tipoBarnizUV +'<input id="tipoBarnizUV" name="tipoBarnizUV" type="hidden" value="'+ idtipoBarnizUV +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcSuajeEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosemp img_delete"></td></tr>';

                
                aAcb.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Corte Laser') {

            var nulo1 = document.getElementById('SelectLaserEmp').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr id="AcLaserEmp"><td style="text-align: left;" class="textAcb">' + opAcb +'<input id="IDopAcbEmp" name="IDopAcbEmp" type="hidden" value="'+ IDopAcb +'"></td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaser +', Medidas: '+ LargoLaser +'x'+ AnchoLaser +'</span></td><td class="tipoLaser" style="display: none;">'+ tipoLaser +'<input id="tipoLaser" name="tipoLaser" type="hidden" value="'+ idtipoLaser +'"></td><td class="LargoLaser" style="display: none;">'+ LargoLaser +'<input id="LargoLaser" name="LargoLaser" type="hidden" value="'+ LargoLaser +'"></td><td class="AnchoLaser" style="display: none;">'+ AnchoLaser +'<input id="AnchoLaser" name="AnchoLaser" type="hidden" value="'+ AnchoLaser +'"></td><td class="listacabadosemp img_delete"></td></tr>';

                $('#acabados').modal('hide');

                jQuery214('#listacabadosemp').append(acb);

                vacioModalAcabados();
            }
        }
    });


    $(document).on('click', '#btnAcabadosfcajon', function(event) {
        
        var IDopAcb  = $("#SelectAcFcajon option:selected").data('id');
        var opAcb    = $("#SelectAcFcajon option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoFcajon option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoFcajon option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSFcajon option:selected").text();
        var idtipoHS        = $("#SelectHSFcajon option:selected").data('id');
        var ColorHS         = $("#SelectColorHSFcajon option:selected").text();
        var idcolorHS       = $("#SelectHSFcajon option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_fcajon').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_fcajon').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabFcajon option:selected").text();
        var LargoGrab     = document.getElementById('LargoGrab_fcajon').value;
        var AnchoGrab     = document.getElementById('AnchoGrab_fcajon').value;
        var ubicacionGrab = $("#SelectUbiGrabFcajon option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesFcajon option:selected").text();

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVFcajon option:selected").text();

        //para suaje
        var tipoSuaje   = $("#SelectSuajeFcajon option:selected").text();
        var LargoSuaje  = document.getElementById('LargoSuaje_fcajon').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje_fcajon').value;


        //para laser
        var tipoLaser   = $("#SelectLaserFcajon option:selected").text();
        var idtipoLaser = $("#SelectHSFcajon option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser_fcajon').value;
        var AnchoLaser  = document.getElementById('AnchoLaser_fcajon').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoFcajon').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror2').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror2').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td style="display: none">'+ tipoLaminado +'</td><td class="listacabadosfcajon img_delete"></td></tr>';

                
                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaminado});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSFcajon').value;
            var nulo2 = document.getElementById('SelectColorHSFcajon').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror2').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror2').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td style="display: none;" >'+ tipoGrabadoHS +'</td><td style="display: none;" >' + ColorHS + '</td><td style="display: none;">'+ LargoHS_ver +'</td><td style="display: none;">'+ AnchoHS_ver +'</td><td class="listacabadosfcajon img_delete"></td></tr>';


                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);
                
                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabFcajon').value;
            var nulo2 = document.getElementById('SelectUbiGrabFcajon').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror2').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror2').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td style="display: none;">'+ tipoGrabadoG +'</td><td style="display: none;">'+ LargoGrab +'</td><td style="display: none;">'+ AnchoGrab +'</td><td style="display: none;">'+ ubicacionGrab +'</td><td class="listacabadosfcajon img_delete"></td></tr>';


                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});


                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeFcajon').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosfcajon img_delete"></td></tr>';

                
                aAcbFCaj.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados_fcajon').modal('hide');

                jQuery214('#listacabadosfcajon').append(acb);

                vacioModalAcabados();
            }
        }
    });


    $(document).on('click', '#btnAcabadosfcartera', function(event) {
        
        var IDopAcb  = $("#SelectAcFcartera option:selected").data('id');
        var opAcb    = $("#SelectAcFcartera option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoFcartera option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoFcartera option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSFcartera option:selected").text();
        var idtipoHS        = $("#SelectHSFcartera option:selected").data('id');
        var ColorHS         = $("#SelectColorHSFcartera option:selected").text();
        var idcolorHS       = $("#SelectHSFcartera option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_fcartera').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_fcartera').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabFcartera option:selected").text();
        var LargoGrab     = document.getElementById('LargoGrab_fcartera').value;
        var AnchoGrab     = document.getElementById('AnchoGrab_fcartera').value;
        var ubicacionGrab = $("#SelectUbiGrabFcartera option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesFcartera option:selected").text();

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVFcartera option:selected").text();

        //para suaje
        var tipoSuaje   = $("#SelectSuajeFcartera option:selected").text();
        var LargoSuaje  = document.getElementById('LargoSuaje_fcartera').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje_fcartera').value;

        //para laser
        var tipoLaser   = $("#SelectLaserFcartera option:selected").text();
        var idtipoLaser = $("#SelectHSFcartera option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser_fcartera').value;
        var AnchoLaser  = document.getElementById('AnchoLaser_fcartera').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoFcartera').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror3').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror3').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td style="display: none">'+ tipoLaminado +'</td><td class="listacabadosfcartera img_delete"></td></tr>';

                
                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaminado});


                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSFcartera').value;
            var nulo2 = document.getElementById('SelectColorHSFcartera').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror3').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror3').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td style="display: none;" >'+ tipoGrabadoHS +'</td><td style="display: none;" >' + ColorHS + '</td><td style="display: none;">'+ LargoHS_ver +'</td><td style="display: none;">'+ AnchoHS_ver +'</td><td class="listacabadosfcartera img_delete"></td></tr>';


                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);
                
                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});


                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabFcartera').value;
            var nulo2 = document.getElementById('SelectUbiGrabFcartera').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror3').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror3').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td style="display: none;">'+ tipoGrabadoG +'</td><td style="display: none;">'+ LargoGrab +'</td><td style="display: none;">'+ AnchoGrab +'</td><td style="display: none;">'+ ubicacionGrab +'</td><td class="listacabadosfcartera img_delete"></td></tr>';


                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});

                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeFcartera').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosfcartera img_delete"></td></tr>';

                
                aAcbFCar.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados_fcartera').modal('hide');

                jQuery214('#listacabadosfcartera').append(acb);

                vacioModalAcabados();
            }
        }
    });


    $(document).on('click', '#btnAcabadosguarda', function(event) {
        
        var IDopAcb  = $("#SelectAcGuarda option:selected").data('id');
        var opAcb    = $("#SelectAcGuarda option:selected").text();

        //para laminado
        var tipoLaminado   = $("#SelectLaminadoGuarda option:selected").text();
        var idtipoLaminado = $("#SelectLaminadoGuarda option:selected").data('id');

        //para hoststamping
        var tipoGrabadoHS   = $("#SelectHSGuarda option:selected").text();
        var idtipoHS        = $("#SelectHSGuarda option:selected").data('id');
        var ColorHS         = $("#SelectColorHSGuarda option:selected").text();
        var idcolorHS       = $("#SelectHSGuarda option:selected").data('id');
        var LargoHS_ver     = document.getElementById('LargoHS_guarda').value;
        var AnchoHS_ver     = document.getElementById('AnchoHS_guarda').value;

        //para grabados
        var tipoGrabadoG  = $("#SelectGrabGuarda option:selected").text();
        var LargoGrab     = document.getElementById('LargoGrab_guarda').value;
        var AnchoGrab     = document.getElementById('AnchoGrab_guarda').value;
        var ubicacionGrab = $("#SelectUbiGrabGuarda option:selected").text();

        //para pegados especiales
        var tipoEspeciales   = $("#SelectEspecialesGuarda option:selected").text();

        //para barnizuv
        var tipoBarnizUV   = $("#SelectBarnizUVGuarda option:selected").text();

        //para suaje
        var tipoSuaje   = $("#SelectSuajeGuarda option:selected").text();
        var LargoSuaje  = document.getElementById('LargoSuaje_guarda').value;
        var AnchoSuaje  = document.getElementById('AnchoSuaje_guarda').value;

        //para laser
        var tipoLaser   = $("#SelectLaserGuarda option:selected").text();
        var idtipoLaser = $("#SelectHSGuarda option:selected").data('id');
        var LargoLaser  = document.getElementById('LargoLaser_guarda').value;
        var AnchoLaser  = document.getElementById('AnchoLaser_guarda').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (opAcb == 'Laminado') {

            var nuloo = document.getElementById('SelectLaminadoGuarda').value;

            if (nuloo == 'selected') {

                document.getElementById('alerterror4').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror4').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoLaminado +'</span></td><td style="display: none">'+ tipoLaminado +'</td><td class="listacabadosguarda img_delete"></td></tr>';

                
                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoLaminado});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'HotStamping') {

            var nulo1 = document.getElementById('SelectHSGuarda').value;
            var nulo2 = document.getElementById('SelectColorHSGuarda').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror4').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror4').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoHS +', Color: '+ ColorHS +', Medidas: '+ LargoHS_ver +'x'+ AnchoHS_ver +'</span></td><td style="display: none;" >'+ tipoGrabadoHS +'</td><td style="display: none;" >' + ColorHS + '</td><td style="display: none;">'+ LargoHS_ver +'</td><td style="display: none;">'+ AnchoHS_ver +'</td><td class="listacabadosguarda img_delete"></td></tr>';


                LargoHS = parseInt(LargoHS_ver, 10);
                AnchoHS = parseInt(AnchoHS_ver, 10);
                
                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Grabado') {

            var nulo1 = document.getElementById('SelectGrabGuarda').value;
            var nulo2 = document.getElementById('SelectUbiGrabGuarda').value;

            if (nulo1 == 'selected' || nulo2 == 'selected' ) {

                document.getElementById('alerterror4').innerHTML = alertDiv;

            } else{

                document.getElementById('alerterror4').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoGrabadoG +', Medidas: '+ LargoGrab +'x'+ AnchoGrab +', Ubicacion: '+ ubicacionGrab +'</span></td><td style="display: none;">'+ tipoGrabadoG +'</td><td style="display: none;">'+ LargoGrab +'</td><td style="display: none;">'+ AnchoGrab +'</td><td style="display: none;">'+ ubicacionGrab +'</td><td class="listacabadosguarda img_delete"></td></tr>';


                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoGrabadoG, "Largo": LargoGrab, "Ancho": AnchoGrab, "ubicacion": ubicacionGrab});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }

        if (opAcb == 'Suaje') {

            var nulo1 = document.getElementById('SelectSuajeGuarda').value;

            if (nulo1 == 'selected') {

                document.getElementById('alerterror').innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

            } else{

                document.getElementById('alerterror').innerHTML = "";

                var acb  = '<tr><td style="text-align: left;" class="textAcb">' + opAcb +'</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ tipoSuaje +', Medidas: '+ LargoSuaje +'x'+ AnchoSuaje +'</span></td><td class="tipoSuaje" style="display: none;">'+ tipoSuaje +'</td><td class="LargoSuaje" style="display: none;">'+ LargoSuaje +'</td><td class="AnchoSuaje" style="display: none;">'+ AnchoSuaje +'</td><td class="listacabadosguarda img_delete"></td></tr>';

                
                aAcbG.push({"Tipo_acabado": opAcb, "tipoGrabado": tipoSuaje, "LargoSuaje": LargoSuaje, "AnchoSuaje": AnchoSuaje});

                $('#acabados_guarda').modal('hide');

                jQuery214('#listacabadosguarda').append(acb);

                vacioModalAcabados();
            }
        }

    });

    function vacioModalAcabados(){

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
/*
        document.getElementById('LargoHS_ver').value = "1";
        document.getElementById('AnchoHS_ver').value = "1";
        document.getElementById('LargoGrab').value   = "1";
        document.getElementById('AnchoGrab').value   = "1";
        document.getElementById('LargoSuaje').value  = "1";
        document.getElementById('AnchoSuaje').value  = "1";
        document.getElementById('LargoLaser').value  = "1";
        document.getElementById('AnchoLaser').value  = "1";

        document.getElementById('LargoHS_fcajon').value    = "1";
        document.getElementById('AnchoHS_fcajon').value    = "1";
        document.getElementById('LargoGrab_fcajon').value  = "1";
        document.getElementById('AnchoGrab_fcajon').value  = "1";
        document.getElementById('LargoSuaje_fcajon').value = "1";
        document.getElementById('AnchoSuaje_fcajon').value = "1";
        document.getElementById('LargoLaser_fcajon').value = "1";
        document.getElementById('AnchoLaser_fcajon').value = "1";

        document.getElementById('LargoHS_fcartera').value    = "1";
        document.getElementById('AnchoHS_fcartera').value    = "1";
        document.getElementById('LargoGrab_fcartera').value  = "1";
        document.getElementById('AnchoGrab_fcartera').value  = "1";
        document.getElementById('LargoSuaje_fcartera').value = "1";
        document.getElementById('AnchoSuaje_fcartera').value = "1";
        document.getElementById('LargoLaser_fcartera').value = "1";
        document.getElementById('AnchoLaser_fcartera').value = "1";

        document.getElementById('LargoHS_guarda').value    = "1";
        document.getElementById('AnchoHS_guarda').value    = "1";
        document.getElementById('LargoGrab_guarda').value  = "1";
        document.getElementById('AnchoGrab_guarda').value  = "1";
        document.getElementById('LargoSuaje_guarda').value = "1";
        document.getElementById('AnchoSuaje_guarda').value = "1";
        document.getElementById('LargoLaser_guarda').value = "1";
        document.getElementById('AnchoLaser_guarda').value = "1";
*/
    }


    // hacer esta misma funcion para los demas papeles
    jQuery214(document).on("click", ".listacabadosemp", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosemp > tr').length;

        aAcb = [];

        var oTable = document.getElementById('acbTable');

        var rowLength = oTable.rows.length;

/*
        for (var i = 0; i < rowLength; i++) {

            var oCells = oTable.rows.item(i).cells;

            var cellLength = oCells.length;

            var IDOpAcabado   = oCells.item(0).val();
            var tipoGrabadoHS = oCells.item(2).val();
            var ColorHS       = oCells.item(4).val();
            var LargoHS       = oCells.item(5).val();
            var AnchoHS       = oCells.item(6).val();
        }
*/

        var tipo_acabado = "";

        $("#acbTable tr").each(function(row, tr) {

            var tipo_acabado  = "";
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

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(4)').text();
                LargoHS_str   = $(tr).find('td:eq(5)').text();
                AnchoHS_str   = $(tr).find('td:eq(6)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Laminado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "Suaje") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/
                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcb.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }
        });
    });


    jQuery214(document).on("click", ".listacabadosfcajon", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosfcajon > tr').length;

        aAcbFCaj = [];

        var oTable = document.getElementById('acbTableFcajon');

        var rowLength = oTable.rows.length;

/*
        for (var i = 0; i < rowLength; i++) {

            var oCells = oTable.rows.item(i).cells;

            var cellLength = oCells.length;

            var IDOpAcabado   = oCells.item(0).val();
            var tipoGrabadoHS = oCells.item(2).val();
            var ColorHS       = oCells.item(3).val();
            var LargoHS       = oCells.item(4).val();
            var AnchoHS       = oCells.item(5).val();
        }
*/

        var tipo_acabado = "";

        $("#acbTableFcajon tr").each(function(row, tr) {

            var tipo_acabado  = "";
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

            if (tipo_acabado == "Laminado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/
                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "HotStamping") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(3)').text();
                LargoHS_str   = $(tr).find('td:eq(4)').text();
                AnchoHS_str   = $(tr).find('td:eq(5)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Suaje") {
/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/
                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCaj.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }
        });
    });



    jQuery214(document).on("click", ".listacabadosfcartera", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosfcartera > tr').length;

        aAcbFCar = [];

        var oTable = document.getElementById('acbTableFcartera');

        var rowLength = oTable.rows.length;

/*
        for (var i = 0; i < rowLength; i++) {

            var oCells = oTable.rows.item(i).cells;

            var cellLength = oCells.length;

            var IDOpAcabado   = oCells.item(0).val();
            var tipoGrabadoHS = oCells.item(2).val();
            var ColorHS       = oCells.item(3).val();
            var LargoHS       = oCells.item(4).val();
            var AnchoHS       = oCells.item(5).val();
        }
*/

        var tipo_acabado = "";

        $("#acbTableFcartera tr").each(function(row, tr) {

            var tipo_acabado  = "";
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

            if (tipo_acabado == "Laminado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "HotStamping") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(3)').text();
                LargoHS_str   = $(tr).find('td:eq(4)').text();
                AnchoHS_str   = $(tr).find('td:eq(5)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Suaje") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/
                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbFCar.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }
        });
    });



    jQuery214(document).on("click", ".listacabadosguarda", function () {

        $(this).closest('tr').remove();

        row_listacabados = 0;
        row_listacabados = $('#listacabadosguarda > tr').length;

        aAcbG = [];

        var oTable = document.getElementById('acbTableGuarda');

        var rowLength = oTable.rows.length;

/*
        for (var i = 0; i < rowLength; i++) {

            var oCells = oTable.rows.item(i).cells;

            var cellLength = oCells.length;

            var IDOpAcabado   = oCells.item(0).val();
            var tipoGrabadoHS = oCells.item(2).val();
            var ColorHS       = oCells.item(3).val();
            var LargoHS       = oCells.item(4).val();
            var AnchoHS       = oCells.item(5).val();
        }
*/

        var tipo_acabado = "";

        $("#acbTableGuarda tr").each(function(row, tr) {

            var tipo_acabado  = "";
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

            if (tipo_acabado == "Laminado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado});
            }


            if (tipo_acabado == "HotStamping") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabadoHS = $(tr).find('td:eq(2)').text();
                ColorHS       = $(tr).find('td:eq(3)').text();
                LargoHS_str   = $(tr).find('td:eq(4)').text();
                AnchoHS_str   = $(tr).find('td:eq(5)').text();

                LargoHS = parseInt(LargoHS_str, 10);
                AnchoHS = parseInt(AnchoHS_str, 10);


                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabadoHS, "ColorHS": ColorHS, "LargoHS": LargoHS, "AnchoHS": AnchoHS});
            }


            if (tipo_acabado == "Grabado") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/

                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();
                ubicacion   = $(tr).find('td:eq(5)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "Largo": Largo, "Ancho": Ancho, "ubicacion": ubicacion});
            }


            if (tipo_acabado == "Suaje") {

/*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
*/
                tipoGrabado = $(tr).find('td:eq(2)').text();
                Largo_str   = $(tr).find('td:eq(3)').text();
                Ancho_str   = $(tr).find('td:eq(4)').text();

                Largo = parseInt(Largo_str, 10);
                Ancho = parseInt(Ancho_str, 10);

                aAcbG.push({"Tipo_acabado": tipo_acabado, "tipoGrabado": tipoGrabado, "LargoSuaje": Largo, "AnchoSuaje": Ancho});
            }
        });
    });


    function js_print_r(arr,level) {

        var dumped_text = "";
        if(!level) level = 0;

        // El padding dado al principio de la linea.
        var level_padding = "";
        
        for(var j = 0; j < level + 1; j++) level_padding += "    ";

        if(typeof(arr) == 'object') { //Array/Hashes/Objects 
            
            for(var item in arr) {
                var value = arr[item];

                if(typeof(value) == 'object') { // Si es un array,
                    
                    dumped_text += level_padding + "'" + item + "' ...\n";
                    dumped_text += print_r(value,level+1);
                } else {
                    
                    dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
                }
            }
        } else { //Stings/Chars/Numbers etc.
            
            dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
        }

        return dumped_text;
    }


    jQuery214(document).on("click", ".listcierres", function () {

        $(this).closest('tr').remove();

        row_listacierres = 0;
        row_listacierres = $('#listcierres > tr').length;

        aCierres = [];

        var oTable = document.getElementById('cieTable');

        var rowLength = oTable.rows.length;

/*
        for (var i = 0; i < rowLength; i++) {

            var oCells = oTable.rows.item(i).cells;

            var cellLength = oCells.length;

            var IDOpAcabado   = oCells.item(0).val();
            var tipoGrabadoHS = oCells.item(2).val();
            var ColorHS       = oCells.item(3).val();
            var LargoHS       = oCells.item(4).val();
            var AnchoHS       = oCells.item(5).val();
        }
*/

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

                /*
                // barrido
                for (var i = 0; i < rowLength; i++) {

                    var oCells = oTable.rows.item(i).cells;

                    var cellLength = oCells.length;

                    for (var j = 0; j < cellLength; j++) {

                        var cellVal = oCells.item(j).innerHTML;

                        alert("j: " + j + " = " + cellVal);
                    }
                }
                */

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

/*
            // barrido
            for (var i = 0; i < rowLength; i++) {

                var oCells = oTable.rows.item(i).cells;

                var cellLength = oCells.length;

                for (var j = 0; j < cellLength; j++) {

                    var cellVal = oCells.item(j).innerHTML;

                    alert("j: " + j + " = " + cellVal);
                }
            }
*/

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

    jQuery214(document).on("click", ".listaccesoriosemp", function () {

        $(this).closest('tr').remove();

        row_listabancos = 0;
        row_listabancos = $('#listaccesoriosemp > tr').length;

        aAccesorios = [];

        var oTable = document.getElementById('accesoriosTable');

        var rowLength = oTable.rows.length;

        var tipo_accesorio = "";

        $("#listaccesoriosemp tr").each(function(row, tr) {

            tipo_accesorio = $(tr).find('td:eq(0)').text(); 
            tipo_accesorio = tipo_accesorio.trim(); 

            aAccesorios.push({"Tipo_accesorio": tipo_accesorio});
        });
    });


    function js_print_r(arr,level) {

        var dumped_text = "";
        if(!level) level = 0;

        // El padding dado al principio de la linea.
        var level_padding = "";
        
        for(var j = 0; j < level + 1; j++) level_padding += "    ";

        if(typeof(arr) == 'object') { //Array/Hashes/Objects 
            
            for(var item in arr) {
                var value = arr[item];

                if(typeof(value) == 'object') { // Si es un array,
                    
                    dumped_text += level_padding + "'" + item + "' ...\n";
                    dumped_text += print_r(value,level+1);
                } else {
                    
                    dumped_text += level_padding + "'" + item + "' => \"" + value + "\"\n";
                }
            }
        } else { //Stings/Chars/Numbers etc.
            
            dumped_text = "===>"+arr+"<===("+typeof(arr)+")";
        }

        return dumped_text;
    }


    //Activa los div de los select acabados en parte guarda------
    document.getElementById('SelectBanEmp').onchange = function(event){
    
        var opcionbanco = document.getElementById('SelectBanEmp').value;

        if (opcionbanco === 'Carton Suajado' || opcionbanco === 'Cartulina Suajada') {

            $('#llevasuajemodBanco').hide('normal');
        }

        if (opcionbanco === 'Carton' || opcionbanco === 'Eva' || opcionbanco === 'Espuma' || opcionbanco === 'Empalme Banco') {

            $('#llevasuajemodBanco').show('slow');
        }
    }

    $(document).on('click', '#btnBancoEmp', function(event) {
        
        var IDopBan  = $("#SelectBanEmp option:selected").data('id');
        var opBan    = $("#SelectBanEmp option:selected").text();

        var LargoMBanco       = document.getElementById('LargoBanco').value;
        var AnchoMBanco       = document.getElementById('AnchoBanco').value;
        var ProfundidadMBanco = document.getElementById('ProfundidadBanco').value;
        var LLevaSuajeM       = $("#SelectSuajeBanco option:selected").text();

        var nuloo = document.getElementById('SelectBanEmp').value;

        var alertDiv = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Problemas!</strong> No seleccionaste todos los elementos.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

        if (nuloo === 'selected') {

            document.getElementById('alerterror5').innerHTML = alertDiv;

        }else if (opBan === 'Carton' || opBan === 'Eva' || opBan === 'Espuma' || opBan === 'Empalme Banco') {

            document.getElementById('alerterror5').innerHTML = "";

            var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ opBan +', Largo: '+ LargoMBanco +', Ancho: '+ AnchoMBanco +', Profundidad: '+ ProfundidadMBanco +', Suaje: '+ LLevaSuajeM +'</span></td><td style="display: none">'+ opBan +'</td><td style="display: none">'+ LargoMBanco +'</td><td style="display: none">'+ AnchoMBanco +'</td><td style="display: none">'+ ProfundidadMBanco +'</td><td style="display: none">'+ LLevaSuajeM +'</td><td class="listbancoemp img_delete"></td></tr>';

            aBancos.push({"Tipo_banco": opBan, "largo": LargoMBanco, "ancho": AnchoMBanco, "Profundidad": ProfundidadMBanco, "Suaje": LLevaSuajeM});

            $('#bancoemp').modal('hide');

            jQuery214('#listbancoemp').append(ban);

            //vacioModalBancos();
        }else if (opBan === 'Carton Suajado' || opBan === 'Cartulina Suajada') {

            document.getElementById('alerterror5').innerHTML = "";

            var ban  = '<tr><td style="text-align: left;">Banco</td><td class="CellWithComment">...<span class="CellComment">Tipo: '+ opBan +', Largo: '+ LargoMBanco +', Ancho: '+ AnchoMBanco +', Profundidad: '+ ProfundidadMBanco +'</span></td><td style="display: none">'+ opBan +'</td><td style="display: none">'+ LargoMBanco +'</td><td style="display: none">'+ AnchoMBanco +'</td><td style="display: none">'+ ProfundidadMBanco +'</td><td class="listbancoemp img_delete"></td></tr>';

            aBancos.push({"Tipo_banco": opBan, "largo": LargoMBanco, "ancho": AnchoMBanco, "Profundidad": ProfundidadMBanco, "Suaje": null});

            $('#bancoemp').modal('hide');

            jQuery214('#listbancoemp').append(ban);

            //vacioModalBancos();
        }
    });


    //Activa los div de los select cierres------
    document.getElementById('SelectCieEmp').onchange = function(event){
    
        var opcioncierre = document.getElementById('SelectCieEmp').value;

        $('#opCieParaPares').hide('slow');
        $('#opCieListon').hide('slow');
        $('#opCieMarialuisa').hide('slow');
        $('#opCieSuajeCalado').hide('slow');

        if (opcioncierre == 'Iman') {

            $('#opCieParaPares').show('normal');
        }

        if (opcioncierre == 'Liston') {

            $('#opCieListon').show('normal');
        }

        if (opcioncierre == 'Marialuisa') {

            $('#opCieMarialuisa').show('normal');
        }

        if (opcioncierre == 'Suaje calado') {

            $('#opCieSuajeCalado').show('normal');
        }

        if (opcioncierre == 'Velcro') {

            $('#opCieParaPares').show('normal');
        }
    }


        // ------------------------- check cierres --------------------------- 
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

            } else{

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

            } else{

                document.getElementById('alerterror6').innerHTML = "";

                var cie = '<tr><td style="text-align: left;">' + opCie +'</td><td class="CellWithComment">...<span class="CellComment">Largo: '+ LarSuajCal +', Ancho: '+ AnchSuajCal +', Tipo: '+ tipoSuajCal +'</span></td><td style="display: none">'+ LarSuajCal +'</td><td style="display: none">'+ AnchSuajCal +'</td><td style="display: none">'+ tipoSuajCal +'</td><td class="listcierres img_delete"></td></tr>';


                aCierres.push({"Tipo_cierre": opCie, "numpares": 1, "largo": LarSuajCal, "ancho": AnchSuajCal, "tipo": tipoSuajCal, "color": null});

                $('#cierres').modal('hide');

                jQuery214('#listcierres').append(cie);

                //vacioModalCierres();
            }
        }
    });


    jQuery214(document).on("click", "#btnabrebancoemp", function () {

        $('#footerBancoEmp').show();
        $('#footerBancoFcajon').hide();
        $('#footerBancoFcartera').hide();
        $('#footerBancoGuarda').hide();
    });

    jQuery214(document).on("click", "#btnabrebancofcajon", function () {

        $('#footerBancoFcajon').show();
        $('#footerBancoEmp').hide();
        $('#footerBancoFcartera').hide();
        $('#footerBancoGuarda').hide();
    });

    jQuery214(document).on("click", "#btnabrebancofcartera", function () {

        $('#footerBancoFcartera').show();
        $('#footerBancoEmp').hide();
        $('#footerBancoFcajon').hide();
        $('#footerBancoGuarda').hide();
    });

    jQuery214(document).on("click", "#btnabrebancoguarda", function () {

        $('#footerBancoGuarda').show();
        $('#footerBancoEmp').hide();
        $('#footerBancoFcajon').hide();
        $('#footerBancoFcartera').hide();
    });


    // ------------------------- b-check-accesorios ---------------------------
    jQuery214(document).on("click", ".b-check-accesoriosemp", function () {

        var value = jQuery214(this).data('value');
        var text  = jQuery214(this).data('text');
        var group = jQuery214(this).data('group');

        var textotro = document.getElementById('otroaccesorio').value;

        if (text == 'Otro') {

            if (textotro == "") {

                console.log('No hay texto en accesorio')

            }else{

                 var imp = '<tr><td style="text-align: left;">' + textotro + '</td><td class="listaccesoriosemp img_delete"></td></tr>';
            }

        } else {

            var imp = '<tr><td style="text-align: left;">' + text + '</td><td class="listaccesoriosemp img_delete"></td></tr>';
        }

        aAccesorios.push({"Tipo_accesorio": text});

        $('#accesorios').modal('hide');

        jQuery214('#listaccesoriosemp').append(imp);
    });

    /*jQuery214(document).on("keyup change", "#qty", function () {

        $('#form_modelo_1_derecho').css('pointer-events','');
        //$('#btnsGrals').css('pointer-events','');
        
        //$('#form_modelo_1_derecho').animate({'opacity':'1'}, 300, 'linear');
    }*/

/*
jQuery214(document).on("change", "#interior_cajon", function () {
   
    if (jQuery214('#same_paper').is(":checked")) {
        
      $("#impresiones_content .chosen").addClass('paper_selected');
      replicar();
            
    }
});*/

jQuery214(document).on("change", ".chosen", function () {
    
    
        if ($(this).val()) {
        papel_elegido=true;
        
        $(this).addClass('paper_selected');
        $('#papers_config_button').hide();
      }else{
        papel_elegido=false;
        $(this).removeClass('paper_selected');
        $('#papers_config_button').show();
      }

  
    
});
/*
jQuery214(document).on("change", "#same_paper", function () {
      if (jQuery214(this).is(":checked")) {
        jQuery214('#papers_config').show();
        replicar();
        //jQuery214('#exterior_cajon').trigger('change');
      }else{
        jQuery214('#papers_config').hide();
        
      }
});*/
/*
function replicar(){

  var value=jQuery214('#interior_cajon option:selected').val();

   console.log('value: '+value); 

    var text=jQuery214('#interior_cajon  option:selected').html();

      //jQuery214('.forros option:eq('+ value +')
      ').prop("selected", true);
      jQuery214('#exterior_cajon option:eq('+ value +')').prop("selected", true);
      jQuery214('#exterior_cartera option:eq('+ value +')').prop("selected", true);
      jQuery214('#interior_cartera option:eq('+ value +')').prop("selected", true);
      //$('.forros option[value="'+ value +'"]').attr('selected', 'selected');
      jQuery214('#exterior_cajon_chosen .chosen-single span').html(text);
      jQuery214('#exterior_cartera_chosen .chosen-single span').html(text);
      jQuery214('#interior_cartera_chosen .chosen-single span').html(text);
}*/

