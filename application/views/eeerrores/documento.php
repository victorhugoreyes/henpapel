<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"  />
<style>
 .aumentos{width: 180%!important; background:#F9F9F9!important;height:470px!important;font-size:0;overflow:hidden}.tab-content{padding-top:2px!important;background:transparent}.aumentos h2{margin:5px auto;font-size:15px;font-weight:400}.results-preview{width: 98%!important;background:#F9F9F9}.results-preview h2{padding:8px;margin-top:10px;margin-bottom:5px;font-size:20px}.cotizador-button{margin:10px}.previews{width:20%}.previews input,select{width:90%!important;margin:0 auto}.top-inputs{margin-top:13px!important;font-size: 13px!important;}.col3{width:33.3%;display:inline-block;vertical-align:top;padding:10px;border-radius:4px}.col2{width:66.6%;display:inline-block;vertical-align:top;padding:10px;border-radius:4px}.hep-table td,.hep-table th{padding:4px}.table-container{background:#fff;border-radius:20px;border:solid 10px #ccc}.table-container .login-input{text-transform: none!important;text-align: left; margin-top:0!important;width: 100%!important;}@media all and (max-width : 700px){.previews{width:100%;text-align:center}.cotizador-button{float:none}.col3{width:100%}.aumentos{height:auto!important}.table-container{height: auto!important;}}#resumen{ padding: 20px; }#resumen p{text-align: left;}#resumen span{font-weight: bold}.p-list{margin-left: 70px;} #cancelar,#guardar{margin: 20px!important;}#messages{max-width: 99%!important;}.chosen-single span{font-weight: normal;text-transform: none;}.chosen-container .chosen-results li.active-result{font-weight: normal;text-transform: none;}
</style>
<div class="separator" id="messages">
  
</div>
<div class="tab-content">
<form  id="eeerrores"  action="<?php echo URL?>eeerrores/registrar" method="post">
  <div class="results-preview" style="margin:0 auto;">
          <div class="previews result1">
          <h2>Reporte de Fallos</h2>
          
         
          </div><div class="previews result2">
         
         <input type="text" class="login-input top-inputs" id="datepicker" name="fechax"required placeholder="Fecha:" autocomplete="off">
          </div><div class="previews">
          <input type="text"  class="login-input top-inputs" name="nombre_persona_reportax" required placeholder="Responsable:" autocomplete="off">
            
          </div>


  <?php  
    $rows18 = $optionsmodel->getinfo($_GET['id_errores']);

  foreach ($rows18 as $row) {
     ?>
  <tr>
    

                        <td> <?php echo $row['nombre_persona_reportax'];?> </td>
                        <td> <?php echo $row['fechax'];?> </td>
                        <td> <?php echo $row['nombre_fallox'];?> </td>
                        <td> <?php echo $row['especificacionesx'];?> </td>
                        <td> <?php echo $row['tiempo_duracion_fallox'];?> </td>
                        <td> <?php echo $row['tiempo_especificadox'];?> </td>
                        <td> <?php echo $row['observacionesx'];?> </td>
                        <td> <?php echo $row['solucionx'];?> </td>


  </tr>
  <?php 
    }
   ?>


              </select>
          </div><div class="previews result3">
            <button type="submit" id="btn1" name="insertar" class="cotizador-button blue2" "="">Guardar</button>
          </div>

          <button>
          <a class="cotizador-button blue2" href="<?php echo URL?>eeerrores/index">Regresar</a>
          </button>
          
        </div>
<div class="aumentos">
    
    
 
      <div  class="col3">
      <div class="table-container" style="background: #EFEFEF;">
      <h2 >Nombre del fallo:</h2>
    <select style="width: 98%!important" id="letra2" name="nombre_fallox" value="responsable" class="login-input" required>
        
        <option disabled selected value="">Tipo de fallo:</option>
           <option value="Ajustes en el equipo">Ajustes en el equipo</option>
           <option value="Cambio de monitor">Cambio de monitor</option>
           <option value="Equipo lento">Equipo lento</option>
           <option value="Escaner">Escaner</option>
           <option value="Falta de material">Falta de material</option>
           <option value="Impresora">Impresora</option>
           <option value="Internet lento">Internet lento</option>
           <option value="Limpieza en el area de trabajo">Limpieza en el area de trabajo</option>
           <option value="Mantenimiento del equipo">Mantenimiento del equipo</option>
           <option value="Mantenimiento del site">Mantenimiento del site</option>
           <option value="Otros">Otros</option>
           <option value="Toner">Toner</option>
           <option value="Virus en el equipo">Virus en el equipo</option>

           

      </select>0 P´
    E3456

      <table id="number-inputs">
        <tr>
        <th></th>
        <th></th>
        </tr>
        <tr>
          <td>
            Especificaciones del fallo:
          </td>
          <td>
            <input  type="text" placeholder="" class="login-input" required step="any" name="especificacionesx">
          </td>
        </tr>

        <div class="cajas-input-group even">
                    <div class="cajas-col-input left"><span>Tiempo que duro el fallo: </span></div>
                    <div class="cajas-col-input right">
                       <select class="cajas-input" name="tiempo_duracion_fallox">
                          <option selected="" disabled="">Elige el tiempo aproximado de fallo</option>
                          <option value="menos de 15 min">menos de 15 min</option>
                          <option value="15 min">15 min</option>
                          <option value="30 min">30 min</option>
                          <option value="45 min">45 min</option>
                          <option value="1 hr">1 hr</option>
                          <option value="1 hr 15 min">1 hr 15 min</option>
                          <option value="1 hr 30 min">1 hr 30 min</option>
                          <option value="1 hr 45 min">1 hr 45 min</option>
                          <option value="2 hrs">2 hrs</option>
                          <option value="2 hrs 15 min">2 hrs 15 min</option>
                          <option value="2 hrs 30 min">2 hrs 30 min</option>
                          <option value="2 hrs 45 min">2 hrs 45 min</option>
                          <option value="3 hrs">3 hrs</option>
                          <option value="3 hrs 15 min">3 hrs 15 min</option>
                          <option value="3 hrs 30 min">3 hrs 30 min</option>
                          <option value="3 hrs 45 min">3 hrs 45 min</option>
                          <option value="4 hrs">4 hrs</option>
                          <option value="4 hrs 15 min">4 hrs 15 min</option>
                          <option value="4 hrs 30 min">4 hrs 30 min</option>
                          <option value="4 hrs 45 min">4 hrs 45 min</option>
                          <option value="5 hrs">5 hrs</option>
                          <option value="5 hrs 15 min">5 hrs 15 min</option>
                          <option value="5 hrs 30 min">5 hrs 30 min</option>
                          <option value="5 hrs 45 min">5 hrs 45 min</option>
                          <option value="6 hrs">6 hrs</option>
                          <option value="6 hrs 15 min">6 hrs 15 min</option>
                          <option value="6 hrs 30 min">6 hrs 30 min</option>
                          <option value="6 hrs 45 min">6 hrs 45 min</option>
                          <option value="7 hrs">7 hrs</option>
                          <option value="7 hrs 15 min">7 hrs 15 min</option>
                          <option value="7 hrs 30 min">7 hrs 30 min</option>
                          <option value="7 hrs 45 min">7 hrs 45 min</option>
                          <option value="8 hrs">8 hrs</option>
                          <option value="8 hrs 15 min">8 hrs 15 min</option>
                          <option value="8 hrs 30 min">8 hrs 30 min</option>
                          <option value="8 hrs 45 min">8 hrs 45 min</option>
                          <option value="9 hrs">9 hrs</option>
                          <option value="9 hrs 15 min">9 hrs 15 min</option>
                          <option value="9 hrs 30 min">9 hrs 30 min</option>
                          <option value="9 hrs 45 min">9 hrs 45 min</option>
                          <option value="10 hrs">10 hrs</option>
                          <option value="10 hrs 15 min">10 hrs 15 min</option>
                          <option value="10 hrs 30 min">10 hrs 30 min</option>
                          <option value="10 hrs 45 min">10 hrs 45 min</option>
                          <option value="11 hrs">11 hrs</option>
                          <option value="11 hrs 15 min">11 hrs 15 min</option>
                          <option value="11 hrs 30 min">11 hrs 30 min</option>
                          <option value="11 hrs 45 min">11 hrs 45 min</option>
                          <option value="12 hrs">12 hrs</option>
                          <option value="12 hrs 15 min">12 hrs 15 min</option>
                          <option value="12 hrs 30 min">12 hrs 30 min</option>
                          <option value="12 hrs 45 min">12 hrs 45 min</option>
                          <option value="mas tiempo">mas tiempo</option>
                       </select>
                    </div>
                 </div>

        <tr>
          <td>
            En caso de ser mas tiempo, especifique ¿Cuanto tiempo duro el fallo?:
          </td>
          <td>
            <input step="any" name="tiempo_especificadox" type="text" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Observaciones:
          </td>
          <td>
            <input step="any" name="observacionesx" type="text" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Terminado:
          </td>
          <td>
            <input step="any" name="terminadox" type="text" placeholder="" class="login-input" required>
          </td>
        </tr>

        <tr>
          <td>
            Solucion del error:
          </td>
          <td>
            <input step="any" name="solucionx" type="text" placeholder="" class="login-input" required>
          </td>
        </tr>

        
      </table>

    



 </div>
     </div>

   

      <tbody id="procesos">
      

      </tbody>
      

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
  line+='<input type="hidden" name="nombre_persona_reporta['+id+']" value="'+nombre+'">';
  line+='<input required type="text" class="login-input" step="any" name="fecha['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="nombre_fallo['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="especificaciones['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="tiempo_duracion_fallo['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="tiempo_especificado['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="observaciones['+id+']" placeholder=""/></td>';
  line+='<td><input required type="text" class="login-input" step="any" name="solucion['+id+']" placeholder=""/></td>';
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