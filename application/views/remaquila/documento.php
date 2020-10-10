<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"  />
<style>
 .aumentos{width: 98%!important; background:#F9F9F9!important;height:470px!important;font-size:0;overflow:hidden}.tab-content{padding-top:2px!important;background:transparent}.aumentos h2{margin:5px auto;font-size:15px;font-weight:400}.results-preview{width: 98%!important;background:#F9F9F9}.results-preview h2{padding:8px;margin-top:10px;margin-bottom:5px;font-size:20px}.cotizador-button{margin:10px}.previews{width:20%}.previews input,select{width:90%!important;margin:0 auto}.top-inputs{margin-top:13px!important;font-size: 13px!important;}.col3{width:33.3%;display:inline-block;vertical-align:top;padding:10px;border-radius:4px}.col2{width:66.6%;display:inline-block;vertical-align:top;padding:10px;border-radius:4px}.hep-table td,.hep-table th{padding:4px}.table-container{background:#fff;border-radius:4px;border:solid 1px #ccc}.table-container .login-input{text-transform: none!important;text-align: left; margin-top:0!important;width: 95%!important;}@media all and (max-width : 700px){.previews{width:100%;text-align:center}.cotizador-button{float:none}.col3{width:100%}.aumentos{height:auto!important}.table-container{height: auto!important;}}#resumen{ padding: 20px; }#resumen p{text-align: left;}#resumen span{font-weight: bold}.p-list{margin-left: 70px;} #cancelar,#guardar{margin: 20px!important;}#messages{max-width: 99%!important;}.chosen-single span{font-weight: normal;text-transform: none;}.chosen-container .chosen-results li.active-result{font-weight: normal;text-transform: none;}
</style>
<div class="separator" id="messages">
  
</div>
<div class="tab-content">
<form  id="maquilaa"  action="<?php echo URL?>remaquila/registrar" method="post">
  <div class="results-preview" style="margin:0 auto;">
          <div class="previews result1">
          <h2>Registros de Maquila</h2>
          
         
          </div><div class="previews result2">
         
         <input type="text" class="login-input top-inputs" id="datepicker" name="fecha"required placeholder="Fecha" autocomplete="off">
          </div><div class="previews">
          <input type="text"  class="login-input top-inputs" name="orden_trabajo" required placeholder="Orden de Trabajo" autocomplete="off">
            
          </div><div class="previews">
                    <select name="persona_responsable_entrega" value="responsable" class="login-input top-inputs" required>
                
                <option disabled selected value="">Responsable:</option>
                  <?php
            
          foreach ($rows2 as $row) {                               
           ?>  
          <option><?php echo $row['usuario'];?> </option>
          <?php
            }
           ?>


  <?php  
    $rows18 = $remaquilamodel->getinfo($_GET['id_maquila']);

  foreach ($rows18 as $row) {
     ?>
  <tr>
    

                        <td> <?php echo $row['nombre'];?> </td>
                        <td> <?php echo $row['cantidad_entrada_proceso'];?> </td>
                        <td> <?php echo $row['cantidad_salida_proceso_correcta'];?> </td>
                        <td> <?php echo $row['cantidad_proceso_merma'];?> </td>
                        <td> <?php echo $row['total'];?> </td>
                        <td> <?php echo $row['proveedor'];?> </td>
                        <td> <?php echo $row['firma'];?> </td>
                        <td> <?php echo $row['id_maquila'];?> </td>

  </tr>
  <?php 
    }
   ?>


              </select>
          </div><div class="previews result3">
            <button type="submit" id="btn1" name="insertar" class="cotizador-button blue2" "="">Guardar</button>
          </div>

          <button>
          <a class="cotizador-button blue2" href="<?php echo URL?>remaquila/maquila">Regresar</a>
          </button>
          
        </div>
<div class="aumentos">
    
    
 
      <div  class="col3">
      <div class="table-container" style="background: #EFEFEF;">
      <h2 >Nombre y parte de la pieza de trabajo:</h2>
    <select style="width: 98%!important" id="letra2" name="nombreypieza_trabajo" value="responsable" class="login-input" required>
        
        <option disabled selected value="">Pieza de trabajo:</option>
        <option value="Forro">Forro</option>
           <option value="Cartera">Cartera</option>
           <option value="Pasta">Pasta</option>

      </select>

      <table id="number-inputs">
        <tr>
        <th></th>
        <th></th>
        </tr>
        <tr>
          <td>
            Cantidad de pliegos:
          </td>
          <td>
            <input  type="number" placeholder="" class="login-input" required step="any" name="pliegos_cantidad">
          </td>
        </tr>

        <tr>
          <td>
            Pliego cortado en base:
          </td>
          <td>
            <input step="any" name="pliegos_cortado_base" type="number" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Pliego cortado en altura:
          </td>
          <td>
            <input step="any" name="pliegos_cortado_altura" type="number" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Cantidad de tamaño total para impresion:
          </td>
          <td>
            <input step="any" name="tamtotal_impresion_cantidad" type="number" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Tamaño total para impresion cortado en base:
          </td>
          <td>
            <input step="any" name="tamtotal_impresion_cortado_base" type="number" placeholder="" class="login-input" required >
          </td>
        </tr>

        <tr>
          <td>
            Tamaño total para impresion cortado en altura:
          </td>
          <td>
            <input step="any" name="tamtotal_impresion_cortado_altura" type="number" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Tamaño individual total:
          </td>
          <td>
            <input step="any" name="tamindividual_total" type="number" placeholder="" class="login-input" required>
          </td>
        </tr>

        
      </table>

    



 </div>
     </div>

   
<div  class="col2" >
<div class="table-container">
  

  <table class="hep-table" >
    <tbody id="tabla4">
    <tr>
    <th class="other-th"></th>
    <th class="other-th"></th>
    <th class="other-th"></th>
    <th></th>
    <th class="other-th">Procesos:</th>
      <th colspan="3" class="other-th">
        <select class="chosen" id="procesos-select">
        <option selected disabled>Elige un proceso...</option>
        <?php
        foreach ($rows as $row) {   ?>
          <option value="<?=$row['IDCatPro']?>" data-nombre="<?=$row['Nombre'] ?>"><?=$row['Nombre'] ?></option>

        <?php 
      }
        ?>
      </select>
      </th>
    </tr>
      <tr>
        <th style="width: 100px;">Proceso</th>
        <th class="a-left">Cantidad que entra al proceso</th>
        <th class="a-left">Cantidad que sale del proceso correcta </th>
        <th class="a-left">Cantidad que sale del proceso merma</th>
        <th class="a-left">Total</th>
        <th class="a-left">Proveedor</th>
        <th class="a-left">Firma de responsable que entrega material </th>
        <th class="a-left">Firma responsable que entrega material </th>
        <th></th>
      </tr>

      <tbody id="procesos">
      

      </tbody>
      

    </tbody>
   
          

  </table>

   
 </div>
   </div>
  </div>


   
    
  </div>
  

</div>
</form>
</div>

<div class="cotizador_box">
  <div class="modal-close"></div>
  <h2>¿Todos los datos son correctos?</h2>
  <div  id="resumen">
  
  </div>
  <button class="tab-btn-sumbit" id="guardar">Si</button><button class="tab-btn-cancel" id="cancelar">No</button>
</div>
<div class="loader">
  <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>

<div class="backdrop"></div>

 

<script>
        jQuery214(".chosen").chosen();

        $(function(){

          
          
    
        $("#adicional2").on('click', function(){

          var row='<tr><td><select name="area[]" class="login-input" id="letra2" required><option disabled selected value="">Area de trabajo:</option><option value="maquinas">Maquinas</option><option value="encuadernacion">Encuadernacion</option><option value="acabado">Acabado</option></select></td><td><select name="personal[]" class="login-input" required ><option disabled selected value="">Nombre del trabajador:</option><?=$options_nombre ?></select></td><td class="eliminar"><div class="table-button orange2">Quitar</div></td>';

          $("#tabla2").append(row);
          
        });
        $("#adicional3").on('click', function(){

          var row= '<tr><td><input required type="text" class="login-input"  name="clave[]" placeholder="ODT"/></td><td><input required type="text" placeholder="Ingrese decripcion" class="login-input" name="descripcion[]"/></td><td class="eliminar"><div class="table-button orange2">Quitar</div></td></tr>';

          

          $("#tabla3").append(row);

        
        });
        $("#adicional4").on('click', function(){ 

        var row='<tr><td><select  name="tipo_gasto[]" class="login-input" required><option disabled selected value="">Gastos velada:</option><option value="Transporte">Tansporte</option><option value="Alimentos">Alimentos</option><option value="Otros gastos">Otros gastos</option></select></td><td><input required type="number" class="login-input" step="any" name="costo[]" placeholder="Ingrese Costo"/></td><td class="eliminar"><div class="table-button orange2">Quitar</div></td></tr>';
          $("#tabla4").append(row);
        
      });

$(document).on("click",".eliminar",function(){
      var parent = $(this).parents().get(0);
      $(parent).remove();
    });
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

$(document).on("click",".modal-close",function(e){
  closeModal();
});  
  $(document).on("submit","#form-velada",function(e){
    e.preventDefault();

    $('.cotizador_box').animate({'opacity':'1'}, 300, 'linear');
    $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop, .cotizador_box').css('display', 'block');

    var html='<p><span>Fecha:</span> 34/45/2019<p>';
    html+='<p><span>Autorizo:</span> Pedro Pedraza<p>';
    html+='<p><span>Responsable:</span> Fernando Fernandez<p><br>';
    html+='<p><span>Personal:</span><p>';
    html+='<p class="p-list">-Eduardo, Encuadernacion</p>';
    html+='<p class="p-list">-Naomi, Acabado</p>';
    html+='<p class="p-list">-Martin, Taller</p>';
    html+='<p><span>Ordenes:</span><p>';
    html+='<p class="p-list">-QWE34, Esquela</p>';
    html+='<p class="p-list">-GDDE45, Mapa</p>';
    html+='<p class="p-list">-FDEE34, Sobre</p>';
    html+='<p><span>Gastos:</span><p>';
    html+='<p class="p-list">-Comida, $56</p>';
    html+='<p class="p-list">-Transporte, $456</p>';
    html+='<p class="p-list">-Otros, $345</p>';
    $('#resumen').append(html);


    }); 

$(document).on("click","#cancelar",function(e){
  closeModal();
});
$(document).on("click","#guardar",function(e){
  $('.cotizador_box').hide();
  $('.loader').show();
  $.ajax({  
           type:"POST",
           url:"<?=URL?>velada/Guardar",   
          data:$('#form-velada').serialize(),
          dataType:"json",   
          success:function(data){ 
           closeModal();
           $('#messages').html(data.message);
           $('#resumen').html('');
          }  
  });
});
function closeModal(){

   $('.backdrop, .cotizador_box, .loader').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .cotizador_box, .loader').css('display', 'none');
        });  
    
}


jQuery214(document).on("change", "#procesos-select", function() {
 

  var nombre=jQuery214(this).find(':selected').data('nombre');
  var id=jQuery214(this).find(':selected').val();
  

  var line='<tr><td>'+nombre+' </td><td>';
  line+='<input type="hidden" name="nombres['+id+']" value="'+nombre+'">';
  line+='<input required type="number" class="login-input" step="any" name="cantidad_entra['+id+']" placeholder=""/></td>';
  line+='<td><input required type="number" class="login-input" step="any" name="cantidad_sale['+id+']" placeholder=""/></td>';
  line+='<td><input required type="number" class="login-input" step="any" name="merma['+id+']" placeholder=""/></td><td><input required type="number"';
  line+='class="login-input" step="any" name="total['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="proveedor['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="firma['+id+']" placeholder=""/></td>';
  line+='<input type="hidden" name="procesos[]" value="'+id+'"><td><div class="delete"></div></td> </tr>';

      $('#procesos').append(line);
      $(this).prop('selectedIndex',0);
      var text=jQuery214('#procesos-select  option:selected').html(); 
      jQuery214('.chosen-single span').html('Elige un proceso');
      
});

jQuery214(document).on("click", ".delete", function () {
 $(this).closest('tr').remove();
 
});

    </script>