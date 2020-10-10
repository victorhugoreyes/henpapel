<style>

    .cotizador_box p {
        text-align: left;
        margin-left: 10px;
    }

    .cotizador_box label {
        color: #53bfe2;
        font-size: 13px;
        vertical-align: top;
        cursor: pointer;
    }

    .cotizador_box label:hover {

        text-decoration: underline;
    }

    .chk {

        margin: 0 3px;
    }

    .buscador1 {

        margin: 17px;
    }
    
    .aumentos {
        background:#fff !important;
        height: 470px!important;
    }

    .tab-content{

        background:#ededed;
    }
</style>

<script>

    var i=0;
</script>

<div class="tab-content">

    <!-- Contenido de la tab -->
    <form id="invitacion-form">
        
        <input type="hidden" name="case" value="<?=($update)? 'update':'insert'?>">
        <input type="hidden" name="id_cotizacion" value="<?=($update)? $_GET['ct']:''?>">
        
        <div class="results-preview" style="margin:0 auto;">

            <div class="previews result1">
            
                <div class="buscador1">
                
                    <select class="chosen" id="modelos">
                        
                        <option selected disabled>Agregar modelo</option>
                        <?php
                            foreach ($invitations as $invit) { 

                                $desc = ($invit['p100'] * 35) / 100;
                                $pexpo = $invit['p100'] - $desc;
                                
                                ?>
                                <option value="<?=$invit['id_product']?>" data-sku="<?=$invit['sku'] ?>" data-p100="<?=$invit['p100'] ?>" data-unidad="<?=$invit['unidad'] ?>" data-millar="<?=$invit['millar'] ?>" data-papel="<?=$invit['papel'] ?>"  data-cajuste="<?=$invit['cajuste'] ?>" data-id="<?=$invit['id_product'] ?>" data-ciento="<?=$invit['ciento'] ?>" data-unico="<?=$invit['unico']?>" data-pexpo="<?=round($pexpo,2)?>"><?=$invit['sku'] ?></option>
                            <?php 
                            }
                    ?>
                    </select>
                </div>
            </div>

            <div class="previews result2">
 
            </div>

            <div class="previews result3">
            
                <button type="submit" class="cotizador-button blue2" ">Guardar</button>
            </div>
        </div>
        
        <div class="aumentos" style="height: 400px;">
         
            <?php if ($update) {

                include 'contenido.php';
            }?> 
        </div>
        
        <input type="hidden" name="cliente" value="<?=$cliente; ?>">
    </form>

    <!-- Contenido de la tab -->
</div>

<div class="cotizador_box" id="aumentos">

    <div class="modal-close"></div>

    <div>

        <div class="buscador1">
        
            <select class="chosen" id="select-aumentos">
            
                <option selected disabled>Elige un aumento para agregar</option>
                
                <?php foreach ($rows as $row) {   ?>

                    <option value="<?=$row['id_aumento']?>" data-clave="<?=$row['clave'] ?>" data-name="<?=$row['clave'] ?>" data-price="<?=$row['costo_unico'] ?>" data-id="<?=$row['id_aumento'] ?>" data-cunidad="<?=$row['costo_u'] ?>" data-costociento="<?=$row['costo_c'] ?>"  data-costomillar="<?=$row['costo_m'] ?>"><?=$row['clave'] ?></option>
                <?php 
                }
            ?>
            </select>
        </div>
    </div>
</div>

<div class="popup" style="display: none;">
</div>

<div class="backdrop"></div>

<script>

var quote;
var model;


$(document).ready(function() {

    var width       = jQuery214('.img-viewer').width();
    var page_height = jQuery214(window).height();

    jQuery214('.img-viewer').height(width - (width / 2));
    jQuery214('.tab-content').height(page_height - 100);
});


jQuery214(".chosen").chosen();


function closeModal() {

    $('.backdrop, .cotizador_box, .loader').animate({'opacity':'0'}, 300, 'linear', function() {

        $('.backdrop, .cotizador_box, .loader').css('display', 'none');
    });  
}


function showModal(modalID) {

    $('#' + modalID).animate({'opacity':'1'}, 300, 'linear');
    $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop, #' + modalID).css('display', 'block');
}


jQuery214(document).on("click", ".modal-close", function () {

    closeModal();
});


function collectPrices() {

    var sum        = 0;
    var discounts  = ($(".discounts").length > 0)? parseFloat($(".discounts").val()) : 0;
    var percentage = 0;
    var final      = 0;
    var proDefault = costoProcesosDefault();

    $('.prices').each(function() {

        sum += parseFloat($(this).val());
    });
 
    var total = sum * parseFloat($("#qty").val());

    percentage = (discounts * total) / 100;
    final = (total + proDefault) - percentage;

    if (isNaN(total)) {

        $('.grand-total').html('$0.00');
        $('#total').html('$0.00');
    } else {
        
        $('.grand-total').html('$' + final.toFixed(2));
        $('#total').html('$' + final.toFixed(2));
    }
}

jQuery214(document).on("click", ".delete", function () {
 $(this).closest('tr').remove();
 collectPrices();
});


jQuery214(document).on("click", ".quit_add", function () {

    var substract = $(this).attr('data-increase');
    var id        = $(this).attr('data-id');

    console.log('id: ' + id + ' price: ' + substract);

    var amount = $('#amount-' + id).val();
    var total  = parseFloat(amount) - parseFloat(substract);

    $('#amount-' + id).val(total.toFixed(2));
    $('#total-' + id).html('Total: $' + total.toFixed(2));

    $(this).closest('.extra-tr').remove();
});


jQuery214(document).on("keyup change", "#qty", function () {

    calculaImpresiones();
    collectPrices();
});


jQuery214(document).on("change", "#modelos", function() {

  var sku      = jQuery214(this).find(':selected').data('sku');
  var price    = parseFloat(jQuery214(this).find(':selected').data('p100'));
  var unico    = parseFloat(jQuery214(this).find(':selected').data('unico'));
  var unitario = parseFloat(jQuery214(this).find(':selected').data('unidad'));
  var millar   = parseFloat(jQuery214(this).find(':selected').data('millar'));
  var papel    = parseFloat(jQuery214(this).find(':selected').data('papel'));
  var ajuste   = parseFloat(jQuery214(this).find(':selected').data('cajuste'));
  var image    = '2';
  var idp      = jQuery214(this).find(':selected').data('id');
  var ciento   = parseFloat(jQuery214(this).find(':selected').data('ciento'));
  var desc     = parseFloat(jQuery214(this).find(':selected').data('pexpo'));


  var line = '<div class="added"> <table class="quotadd" id="quot-' + i + '"> <tr> <td> <div class="extra-cover"></div> <div class="thumbnail" data-sku="' + sku + '" data-image="' + image + '" style="background-image:url(photos/' + image + ')"></div> </td> <td>' + sku + '</td> <td> <div class="qty-cover"></div> <div>Cantidad:</div> <input id="' + i + '" type="number" data-quote="' + i + '" name="quotes[' + i + ']" class="quotes" value="100"/><input type="hidden" id="price-' + i + '" name="prices[' + i + ']" value="' + price + '"><input type="hidden" id="ciento-' + i + '" value="' + ciento + '"><input type="hidden" id="amount-' + i + '" name="total[' + i + ']" value="' + desc + '"><input type="hidden" id="p_listas-' + i + '" name="p_listas[' + i + ']" value="' + price + '"><input type="hidden" id="unico-' + i + '" value="' + unico + '"><input type="hidden" id="unitario-' + i + '" value="' + unitario + '"><input type="hidden" id="ajuste-' + i + '" value="' + ajuste + '"><input type="hidden" id="papel-' + i + '" value="' + papel + '"><input type="hidden" id="millar-' + i + '" value="' + millar + '"><input type="hidden" id="qty-p-' + i + '" name="qty[' + i + ']" value="100"><input type="hidden" name="models[' + i + ']" value="' + sku + '"><input type="hidden" name="id_prods[' + i + ']" value="' + idp + '"><input type="hidden" name="ids[]" value="' + i + '"> </td> <td> <div class="extra-cover"></div> <div class="quot-user extra" data-quote="' + i + '"> <div class="aument">+ Agregar aumentos</div> </div> </td> <td id="total-' + i + '">$' + desc + '</td> <td style="width:55px"> <div class="extra-cover"></div> <div class="remove"> <img src="<?=URL ?>public/img/remove.png"/></div> </td> </tr> </table> </div>';

      $('.aumentos').append(line);
      $(this).prop('selectedIndex',0);

      var text = jQuery214('#modelos  option:selected').html(); 

      jQuery214('#modelos_chosen .chosen-single span').html(text);

      i++;
});


jQuery214(document).on("click", ".extra", function() {

    showModal('aumentos');

    var id = $(this).data('quote');

    quote = id;
});


jQuery214(document).on("change", "#select-aumentos", function() {
 
    var id          = parseFloat(jQuery214(this).find(':selected').data('id'));
    var clave       = jQuery214(this).find(':selected').data('clave');
    var price       = parseFloat(jQuery214(this).find(':selected').data('price'));
    var CUnidad     = parseFloat(jQuery214(this).find(':selected').data('cunidad'));
    var CostoCiento = parseFloat(jQuery214(this).find(':selected').data('costociento'));
    var CostoMillar = parseFloat(jQuery214(this).find(':selected').data('costomillar'));
    var CostoUnico  = price;
    var Cantidad    = $('#'+quote).val();
    var ex_final;

    if (Cantidad > 0 && Cantidad <= 100) { 

        ex_final = CostoUnico + (CUnidad * Cantidad) + CostoCiento + CostoMillar;
    } else if (Cantidad >= 101 && Cantidad <= 999) {

        ex_final = CostoUnico + CostoCiento + CostoMillar + (Cantidad - 100) * (CostoCiento / 100) + (Cantidad * CUnidad); 

        console.log('if 2: '+Cantidad);
    } else if (Cantidad >= 1000 && Cantidad <= 20000) {

        ex_final = CostoUnico + CostoCiento + CostoMillar + ((Cantidad - 1000) * (CostoMillar / 1000)) + ((Cantidad - 100) * (CostoCiento / 100)) + (Cantidad * CUnidad) + .58;

        console.log('if 3: '+Cantidad);
    }

    var line = '<tr class="extra-tr extra-' + quote + '"><td colspan="4">' + clave + '</td><td class="each-extra">$' + ex_final.toFixed(2) + '</td>' + '<input type="hidden" class="ex-price" name="price-' + quote + '[' + id + ']" value="' + price + '">' + '<input type="hidden" class="ex-unico" value="' + price + '">' +'<input type="hidden" class="ex-unidad" value="' + CUnidad + '">' + '<input type="hidden" class="ex-ciento" value="' + CostoCiento + '">'; 

    console.log('quote:' + quote);
    console.log('Cantidad:' + Cantidad);
    console.log('final:' + ex_final);

    line += '<input type="hidden" class="ex-millar" value="' + CostoMillar + '"><input type="hidden" class="ex-increment" name="ex-increment[' + id + ']" value="' + ex_final.toFixed(2) + '"><td class="quit_add" data-increase="' + ex_final.toFixed(2) + '" data-id="' + quote + '">Quitar</td><input type="hidden" name="extra-' + quote + '[' + id + ']" value="' + id + '"><tr>';

    var ini_price   = $('#amount-' + quote).val();
    var final_price = parseFloat(ini_price) + parseFloat(ex_final);

    $('#total-' + quote).html('Total: $' + final_price.toFixed(2));
    $('#amount-' + quote).val(final_price.toFixed(2));

    console.log('quote: ' + quote);
    console.log('cant: ' + Cantidad + ' id: ' + id + ' clave: ' + clave + 'cant: ' + Cantidad + ' price: ' + price + ' CUnidad: ' + CUnidad + ' CostoCiento: ' + CostoCiento + ' CostoMillar: ' + CostoMillar + ' CostoUnico: ' + CostoUnico);
  
    $('#quot-' + quote).append(line);
      
    closeModal();
    
    $(this).prop('selectedIndex',0);
    
    var text = jQuery214('#select-aumentos  option:selected').html(); 

    jQuery214('#select_aumentos_chosen .chosen-single span').html(text);
});


jQuery214(document).on("keyup", ".quotes", function () {

    jQuery214('#qty-p-' + $(this).data('quote')).val($(this).val());

    amount_calculator(this.id);

});


function amount_calculator(id) {

    var CostoCiento = parseFloat($('#ciento-' + id).val());
    var CostoMillar = parseFloat($('#millar-' + id).val());
    var CostoUnico  = parseFloat($('#unico-' + id).val());
    var papel       = parseFloat($('#papel-' + id).val());
    var CUnidad     = parseFloat($('#unitario-' + id).val());
    var Cantidad    = (($('#' + id).val() == '')? 0:parseFloat($('#' + id).val())) ;
    var CAjuste     = parseFloat($('#ajuste-'+id).val());
    var cientounit  = CostoCiento / 100;

    /**** cotizacion de modelo ****/
    if (Cantidad > 0 && Cantidad <= 100) { 

        final = CostoUnico + (CUnidad * Cantidad) + (papel * Cantidad) + CostoCiento  + CostoMillar + (CAjuste * Cantidad);
    } else if (Cantidad == 0 ) { 

        final = 0;
    } else if (Cantidad >= 101 && Cantidad <= 999) {
            
        final = CostoUnico + (CUnidad * Cantidad) + (papel * Cantidad) + CostoCiento + ((Cantidad - 100) * cientounit) + CostoMillar + (CAjuste * Cantidad);
    } else if (Cantidad >= 1000 && Cantidad <= 20000) {

        final = CostoUnico + CostoCiento + CostoMillar + ((Cantidad-1000) * (CostoMillar / 1000)) + ((Cantidad-100) * (CostoCiento / 100)) + (Cantidad  * CUnidad) + (papel * Cantidad) + (CAjuste * Cantidad);

        console.log('if 3: '+Cantidad);
    }

  /**** termina cotizacion de modelo ****/

    var Descuento = (final * 35) / 100;

    /**** cotizacion de aumentos ****/
    var clase = ".extra-"+id;
    var sum   = 0;

    $(clase).each(function(i,obj) {
  
        var ex_unidad = parseFloat($(this).find(' .ex-unidad').val());
        var ex_ciento = parseFloat($(this).find(' .ex-ciento').val());
        var ex_millar = parseFloat($(this).find(' .ex-millar').val());
        var ex_unico  = parseFloat($(this).find(' .ex-unico').val());
     
        if (Cantidad > 0 && Cantidad <= 100) { 

            ex_final = ex_unico + (ex_unidad * Cantidad) + ex_ciento + ex_millar;
        } else if (Cantidad == 0 || Cantidad =='') {

            ex_final = 0;
        } else if (Cantidad >= 101 && Cantidad <= 999) {

            ex_final = ex_unico + ex_ciento + ex_millar + (Cantidad - 100) * (ex_ciento / 100) + (Cantidad * ex_unidad); 

            //ex_final = ex_unico + (ex_unidad * Cantidad)  + ex_ciento + ((Cantidad - 100) * cientounit) + ex_millar;
        } else if (Cantidad >= 1000 && Cantidad <= 20000) {

            ex_final = ex_unico + ex_ciento + ex_millar + ((Cantidad - 1000) * (ex_millar / 1000)) + ((Cantidad - 100) * (ex_ciento / 100)) + (Cantidad * ex_unidad) + .58;
        }

        console.log('extra unico: ' + ex_unico);
        console.log('extra final: ' + ex_final);
        
        sum += ex_final;

        var incr = $(this).find('.ex-increment');
        var dat  = $(this).find('.quit_add');
        var disp = $(this).find('.each-extra');

        incr.val(ex_final.toFixed(2));
        dat.attr('data-increase', ex_final.toFixed(2));
        disp.html('$'+ex_final.toFixed(2));
    });

    /**** termina cotizacion de aumentos ****/

    console.log('sum: ' + sum);

    //var IVA =  0.16;
    //var ConIva = (final - conD) * IVA;

    var total = (((final-Descuento) / 0.9) / 0.9) + sum;

    console.log('desc:' + Descuento);
    console.log('final:' + final);

    var p_lista = (final / 0.9) / 0.9;

    $('#p_listas-' + id).val(p_lista.toFixed(2));
    $('#total-' + id).html('Total: $' + total.toFixed(2));
    $('#amount-' + id).val(total.toFixed(2));
}


jQuery214(document).on("click", ".remove", function () {
 $(this).closest('.added').remove();
});

jQuery214(document).on("submit", "#invitacion-form", function (e) {

    e.preventDefault();
    $.ajax({  
        type:"POST",
        url:"<?php echo URL; ?>cotizador/saveInvitation/",   
        data:$(this).serialize(), 
        dataType:"json",  

        success:function(data) {
            if (data.logged == 'true') {
               
                if (data.success == 'true') {

                    location.href = '<?php echo URL; ?>cotizador/clientes/';
                } else {

                    $('.popup').html(data.message);
                    $('.popup').fadeIn("slow");
                }
            } else {

                $('.popup').html('<div class="c-fail"><div></div><span>Error: </span>Se acabo el tiempo de la sesion</div>');
                $('.popup').fadeIn("slow");

                setTimeout(function() {   

                    location.reload();
                }, 1500);
            }
        }
    });
});

</script>
