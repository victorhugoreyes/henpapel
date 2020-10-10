
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"  />
<style type="text/css">
  .cajas-col-input input:not(.chk){
    width: 95%!important;
  }
  .cajas-col-input select{
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

#odt{
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
</style>
    <div class="separator" id="messages">
   
<?php 
if (isset($_SESSION['messages'])) {
 echo $_SESSION['messages'];
} ?>
</div>

    <div class="container">
        <div class="login-box2">
        <div class="form-inner" style="font-size: 0">
          <form id="datos" action="<?=URL ?>ventas/saveCambio/" method="post"  enctype="multipart/form-data">
        
        
        <?php 
 if (isset($_SESSION['log_incorrect'])) { ?>
      <p>Usuario o contraseña incorrectos</p>
    <?php }
       ?>
            





            <h1 style="text-align:center;color:#999999;margin-top:20px;font-weight:normal;font-size:18px;">CAMBIOS</h1>
              <input type="hidden" name="form" value="archivo">
              <div class="cajas-col-input t-left"><input id="odt" name="odt" type="text" placeholder="Numero de Orden" class="login-input" required="" style="" /></div>
              <div class="cajas-col-input t-right">
                <select class="login-input" id="razon" name="razon" required>
              <option disabled selected value="">Razon del cambio</option>
              <option data-cases='3' value="Error en sistema">Error en sistema</option>
              <option data-cases='3' value="No es posible hacer cambio">No es posible hacer cambio</option>
              <option data-cases='3' value="Proceso faltante">Proceso faltante</option>
              <option data-cases='2' value="Producto nuevo">Producto nuevo</option>
              
              
            </select>
              </div>
              <div id="cases">
                <div id="case-2" style="display: none;">
                <div class="cajas-col-input t-left"><input  name="quien_aut" type="text" id="autoriza" placeholder="Nombre de quien autorizo" class="login-input"  style="" /></div>
                <div class="cajas-col-input t-right">
               <input id="datepicker"  name="fecha_aut" type="text" placeholder="Fecha de autorizacion" class="login-input"  style="" />
                </div>

                </div>
                <div id="case-3" style="display: none;">
                <div class="cajas-col-input t-left"><input  name="modelo" type="text" id="modelo" placeholder="Modelo" class="login-input"  style="" /></div>
                <div class="cajas-col-input t-right">
               <input id="nosepudo" autocomplete="off" name="porqueno" type="text" placeholder="¿Que fue lo que no se pudo hacer?" class="login-input"  style="" />
               <div id="counter" class="text-right"></div>
                </div>

                </div>
              </div>
            

            

            

            
            
            
            <p style="text-align: left; margin-top: 10px;border-top: dashed 1px #ccc;padding-top: 10px">¿Se modificara el costo?</p>
            <div  style="border-bottom: dashed 1px #ccc;padding-bottom: 15px;">
            <div class="checkboxer"><div class="checks"><input type="radio" class="radios" name="radios" id="change-price" value="SI"></div><label>SI</label>
              </div><div class="checkboxer"><div class="checks on"><input type="radio" class="radios" name="radios" value="NO" checked ></div><label>NO</label>
              </div>
              <div id="new-price-value" class="input-tooltip"  style="display: none;">
            <p style="text-align: left; margin-top: 10px;">Por favor agrega el costo nuevo:</p>
            <span style="font-size: 15px;">$</span><input id="new_price" name="costo_nuevo" type="text" placeholder="0.0" class="login-input"  />
            <span class="tooltiptext" id="price-tooltip">Copiar precio de aumento y escribir el concepto tal cual viene en el aumento</span>
            </div>
             </div> 
             <div id="yes-no"></div>
            <p class="errormsg" id="rads">Porfavor elige una opcion ↑</p>
            
             <div id="comments-container" style="display: none;">
            <p style="text-align: left; margin-top: 10px;">Comentarios:</p>
            <textarea id="comments" name="comments" placeholder="Agrega un comentario.." style="text-align: left; padding: 5px;"></textarea>
              <div  id="comments-count" class="text-right"></div>
           </div>
            <div class="inputfile">

              
              
            </div>
         <div class="morefiles">+ Agregar un archivo</div>
           <br>  
          <p>Archivos permitidos: jpg, png, jpeg y pdf</p>
          <p style="margin-top: 10px;"><strong>IMPORTANTE:</strong>Si es una foto debe ser tomada en baja resolucion</p>   
              <br>
             
            
                
            <input type="submit" id="singlebutton" value="ENVIAR" name="singlebutton" class="login-button" style="margin-bottom: 40px;">
            </form>
        </div>
            
        </div>

    </div> 
   <div class="backdrop"></div>
   <div class="loader">
  <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>

<div class="box">
  <div class="saveloader">
    <div class="closer" onclick="close_box();">X</div>
    <img src="../images/recibo.jpg">
    <p style="text-align: center; font-weight: bold;"><a href="#">Click aqui si no tienes recibo</a></p>
  </div>
  <div class="savesucces" style="display: none;">
  
    <img src="images/success.png">
    <p style="text-align: center; font-weight: bold;">Listo!</p>
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   


<script src="<?php echo URL; ?>public/js/jquery.limitText.js"></script>
<script>
var i=1;
var list = [];
var total=0;
var aut=false;
var kase;
var yes_no=false;
$(document).ready(function () {
        $('#nosepudo').limitText({limit: 150});
        $('#comments').limitText({limit: 150,statusMessage: '#comments-count'
 });
     });
$(document).ready(function() {
  quitSessionMessages();
  $('#new_price').attr('autocomplete', 'off');
  $('#datepicker').attr('autocomplete', 'off');

});

function quitSessionMessages(){
  setTimeout(function(){ $('.notification').remove(); }, 60000);
  
  
}
  $(document).on('click', '.filebutton', function () {
    $('#the-file').click();
 
});
$(document).on('click', '.morefiles', function () {
  
  var newinput='<div class="filename" style="margin-top:15px;">Ningun archivo seleccionado'+
 '<input style="display: none;" type="file"  name="up-file[]"></div>'+
              '<div class="filebutton">Seleccionar</div>';


var newfile='<input style="display: none;" id="'+i+'" type="file" class="up-file" onchange="getFileName('+i+');checkFileSize('+i+');" >';
            
    $('.inputfile').append(newfile);
    $('#'+i).click();

 i++;
});

function checkFileSize(id){
    var size=$('#'+id)[0].files[0].size;

    
    if (size>2097152) {
      
      alert('Este archivo pesa mas de 2MB, perdon pero no podemos aceptarlo.');
      removeFile(id);
      
    }else{
      total+=size;
      var sum_total=total/1048576;
      
      console.log('total: '+sum_total.toFixed(2)+'MB');
    }
      
}



$(document).on('change', '.up-file', function () {
 $(this).attr('name', 'up-file[]');

});

jQuery214(document).on("focusin", "#new_price", function () {
 jQuery214('#price-tooltip').css('visibility','visible')
});
jQuery214(document).on("focusout", "#new_price", function () {
 jQuery214('#price-tooltip').css('visibility','hidden')
});

(function($) {  

            $(function(){
                  jQuery214( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy',onSelect: function() {
    $(this).change();
  } });
                 
            })
  })(jQuery);

   (function($){
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '&#x3c;Ant',
    nextText: 'Sig&#x3e;',
    currentText: 'Hoy',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
    'Jul','Ago','Sep','Oct','Nov','Dic'],
    dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
    dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''};
  $.datepicker.setDefaults($.datepicker.regional['es']);
})(jQuery214);

$(document).on('change', '#razon', function () {
 var cases=jQuery214(this).find('option:selected').data('cases');

 switch(cases) {
  case 1:
    // code block
    break;
  case 2: 
    $('#case-2').fadeIn("slow");
    $('#case-3').fadeOut("slow");
    $('#datepicker').prop('required',true);
    $('#autoriza').prop('required',true);
    $('#modelo').prop('required',false);
    $('#nosepudo').prop('required',false);
    $('#change-price').click();
    $('#comments-container').fadeIn("slow");
    $('#comments').prop('required',true);

    aut=true;
    kase=2;
    break;
  case 3:
    $('#case-3').fadeIn("slow");
    $('#modelo').prop('required',true);
    $('#nosepudo').prop('required',true);
    if (aut==true&&yes_no==false) {
    
    $('#case-2').fadeOut("slow");
    $('#datepicker').prop('required',false);
    $('#autoriza').prop('required',false);
    $('#comments').prop('required',false);
    aut=false;
  }
    
    kase=3;
    break;
  default:
    aut=false;
    $('#case-2').fadeOut("slow");
    $('#case-3').fadeOut("slow");
    $('#datepicker').prop('required',false);
    $('#autoriza').prop('required',false);
    $('#modelo').prop('required',false);
    $('#nosepudo').prop('required',false);
    kase=0;
}

});

$(document).on('submit', '#datos', function () {
  $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop').css('display', 'block');
    $('.loader').show();

});



function closeModal(){

   $('.backdrop, .box, .loader').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .box, .loader').css('display', 'none');
        });  
    
}

function getFileName(id){
  if (i>0) {$('.morefiles').hide()}else{
    $('.morefiles').show();
  }
   var name = document.getElementById(id); 
    //list.push(name.files.item(0).name);  
   var find = function(input, target){
    console.log(target);
    var found;
    for (var prop in input) {
    if(input[prop] == target){
        found = prop;
    }
    };

    return found;
};

var found = find(list, name.files.item(0).name);
console.log(found);
  if (found){

    console.log(list);
    alert('Este archivo ya esta agregado en la lista, por favor elige otro');
  }else{
list['item-'+id] = name.files.item(0).name;
var indicator='<div class="filediv" id="ind-'+id+'">&nbsp&nbsp '+name.files.item(0).name+ 
            '<div class="removefile" onclick="removeFile('+id+')"></div></div>';
            
            $('.inputfile').append(indicator);
            console.log(list);
  }
 
 
}
function removeFile(id){
    var size=Object.keys(list).length;
    console.log('el size: '+size);
    $('.morefiles').show();
  var input = document.getElementById(id);
  var indicator = document.getElementById('ind-'+id);
  input.remove();
  indicator.remove();
  console.log(id);
  
  var key= 'item-'+id;
  delete list[key]; 
  //list.splice(key,1);
console.log(list);

}

$('#odt').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#comments').keypress(function (e) {
var regex = new RegExp("^[0-9a-zA-Z \b]+$");
var key = String.fromCharCode(!event.charCode ? event.which: event.charCode);
if (!regex.test(key)) 
{
    event.preventDefault();
    return false;
} 
 });

$(document).on('click', '.checks', function () {
    $('.on').removeClass('on');
  $(this).addClass('on');
  var radio=$(this).find('input:radio');
  radio.prop('checked', true);
  
   if (radio.val()=='SI') {
    console.log('aut: '+aut);
    if (aut==false) {
    
    $('#case-2').appendTo("#yes-no");
    $('#case-2').fadeIn("slow");
     $('#autoriza').prop('required',true);
     aut=true;
    }
    $('#new-price-value').fadeIn("slow");
    $('#new_price').prop('required',true);
    $('#datepicker').prop('required',true);
   yes_no=true;
    
  }else{
    console.log('kase: '+kase);
    if (aut==true&&kase!=2) {
    
    $('#case-2').hide();
    $('#case-2').appendTo("#cases");
    $('#datepicker').prop('required',false);
    $('#autoriza').prop('required',false);
    aut=false;
    }
    $('#new-price-value').fadeOut();
    
    $('#new_price').prop('required',false);
   
    yes_no=false;
    
  }
  
});




</script>

<?php
unset($_SESSION['messages']);
unset($_SESSION['notification']);
unset($_SESSION['result']);



?>