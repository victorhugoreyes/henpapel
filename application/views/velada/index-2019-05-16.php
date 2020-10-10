<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"  />
<style>
 .aumentos{width: 98%!important; background:#F9F9F9!important;height:470px!important;font-size:0;overflow:hidden}.tab-content{padding-top:2px!important;background:transparent}.aumentos h2{margin:10px auto;font-size:18px;font-weight:400}.results-preview{width: 98%!important;background:#F9F9F9}.results-preview h2{padding:8px;margin-top:10px;margin-bottom:5px;font-size:20px}.cotizador-button{margin:10px}.previews{width:20%}.previews input,select{width:90%!important;margin:0 auto}#letra2{margin-top:13px}.col3{width:33.3%;display:inline-block;vertical-align:top;padding:10px;border-radius:4px}.hep-table td,.hep-table th{padding:4px}.table-container{background:#fff;border-radius:4px;border:solid 1px #ccc}.table-container .login-input{margin-top:0!important}@media all and (max-width : 700px){.previews{width:100%;text-align:center}.cotizador-button{float:none}.col3{width:100%}.aumentos{height:auto!important}.table-container{height: auto!important;}}#resumen{ padding: 20px; }#resumen p{text-align: left;}#resumen span{font-weight: bold}.p-list{margin-left: 70px;} #cancelar,#guardar{margin: 20px!important;}#messages{max-width: 99%!important;}
</style>
<div class="separator" id="messages">
  
</div>
<div class="tab-content">
<form  method="post" id="form-velada"  enctype="multipart/form-data">
  <div class="results-preview" style="margin:0 auto;">
          <div class="previews result1">
          <h2>Formato de Velada</h2>
          
         
          </div><div class="previews result2">
         
         <input type="text" id="letra2" class="login-input" name="fecha" required placeholder="Fecha" autocomplete="off">
          </div><div class="previews">
            <select name="autorizo" id="autorizo" class="login-input" required>option
       
        <option disabled selected value="autorizo">Autorizo</option>
    <?php
    $rows3=$optionsmodel->getAutorizo(); 
  foreach ($rows3 as $row) {                               
   ?>  
  <option value="<?= $row['Nombre'];?>"><?= $row['Nombre'];?> </option>
  <?php 
    }
   ?>

      </select>
          </div><div class="previews">
            <select id="responsable" name="responsable_velada" value="responsable" class="login-input" required>
        
        <option disabled selected value="">Responsable:</option>
          <?php
    $rows4=$optionsmodel->getPersonal(); 
  foreach ($rows4 as $row) {                               
   ?>  
  <option><?php echo $row['usuario'];?> </option>
  <?php 
    }
   ?>

      </select>
          </div><div class="previews result3">
            <button type="submit" id="btn1" name="insertar" class="cotizador-button blue2" "="">Guardar</button>
          </div>
          
        </div>
<div class="aumentos">

   
 
    
 
      <div  class="col3">
      <div class="table-container">
      <h2 >Personal:</h2>
     
<table class="hep-table" >
<tbody id="tabla2">
  <tr>
      <th>Area</th>
      <th>Nombre</th>
      <th></th>
    </tr>
    <tr class="fila2">
    <td><select name="area[]" class="login-input" id="area" required="">
        <option disabled selected value="">Area de trabajo:</option>
        <option value="maquinas">Maquinas</option>
        <option value="encuadernacion">Encuadernacion</option>
        <option value="acabado">Acabado</option>
      </select> </td>

       

      <td> <select name="personal[]" class="login-input" id="personal" required="" >
        <option disabled selected value="">Nombre del trabajador:</option>
    <?php
    $rows2=$optionsmodel->getPersonal(); 
    $options_nombre='';
  foreach ($rows2 as $row) { 
  $options_nombre.='<option value="'.$row['usuario'].'">'.$row['usuario'].'</option>';                             
   ?>  
  <option value="<?php echo $row['usuario'];?>"><?php echo $row['usuario'];?> </option>
  <?php 
    }
   ?>

      </select></td>
<td></td>

          </tr> 
</tbody>
<tbody>
  <tr>
    <td></td>
    <td></td>
    <td><div class="table-button green2" id="adicional2">+ Agregar</div></td>
  </tr>
</tbody>
    
        </table>
 </div>
     </div>

   <div  class="col3">
   <div class="table-container">
      <h2>Ordenes : </h2> 
   <table class="hep-table">
   <tbody id="tabla3">
     <tr>
        <th>ODT</th>
        <th>Descripción</th>
        <th></th>
      </tr>
     <tr >
        <td><input required type="text" id="ODT" class="login-input"  name="clave[]" placeholder="ODT"/></td>
        <td><input required type="text" id="descripcion" placeholder="Ingrese decripcion" class="login-input" name="descripcion[]"/></td>
        <td></td>
      </tr> 
   </tbody>
  <tbody>
  <tr>
    <td></td>
    <td></td>
    <td><div class="table-button green2" id="adicional3">+Agregar</div></td>
  </tr>
  </tbody>
      
    </table>


 
     
</div>
</div>
<div  class="col3" >
<div class="table-container">
   <h2>Gastos : </h2>

  <table class="hep-table" >
    <tbody id="tabla4">
      <tr>
        <th style="width: 100px;">Gasto</th>
        <th>Costo</th>
        <th></th>
      </tr>
      <tr>
      <td><select  name="tipo_gasto[]" id="gasto" class="login-input" required>
        <option disabled selected value="">Gastos velada:</option>
        <option value="Transporte">Tansporte</option>
        <option value="Alimentos">Alimentos</option>
         <option value="Otros gastos">Otros gastos</option>
      </select></td>
      <td><input required type="number" id="costo" class="login-input" step="any" name="costo[]" placeholder="Ingrese costo"/></td>
     <td></td>
    </tr>
    </tbody>
    <tbody>
  <tr>
    <td></td>
    <td></td>
    <td><div class="table-button green2" id="adicional4">+ Agregar</div></td>
  </tr>
  </tbody>
          

  </table>

   
 </div>
   </div>
  </div >  


   
    
  </div>
  

</div>
</form>
</div>

<div class="cotizador_box" id="limpiar">
  <div class="modal-close"></div>
  <h2>¿Todos los datos son correctos?</h2>
  <div  id="resumen">
  
  </div>
  <button type="submit" class="tab-btn-sumbit" id="guardar">Si</button>

  <button  class="tab-btn-cancel" id="cancelar">No</button>
</div>
<div class="loader">
  <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>

<div class="backdrop"></div>



<script>


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
                  jQuery214( "#letra2" ).datepicker({ dateFormat: 'dd-mm-yy',onSelect: function() {
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
 
  html='<p><span>fecha:</span><p>';
  var fecha = $("#letra2").val();
  html+= ""+fecha;

  html+='<p><span>Autorizo:</span><p>';
  var autorizo = $("#autorizo").val();  
  html+= ""+autorizo;

  html+='<p><span>Responsable:</span><p>';
  var responsable = $("#responsable").val();
  html+= ""+responsable; 

  html+='<p><span>Personal:</span><p>';
  var areas = $("select[name='area[]'").map(function(){return $(this).val();}).get(); 
   html+= "Area:   "+areas+"  <br>  ";
   html+='';

 var personal = $("select[name='personal[]'").map(function(){return $(this).val();}).get();
  html+= "Personal:   "+personal;

  html+='<p><span>Ordenes:</span><p>';

 var descripcion = $("input[name='descripcion[]'").map(function(){return $(this).val();}).get();

  var ODT = $("input[name='clave[]'").map(function(){return $(this).val();}).get();

 html+= "Descripción:   "+descripcion+"   ";
 html+='<br>'; 
 html+= "ODT:   "+ODT;

 html+='<p><span>Gastos:</span><p>'; 
 var gasto = $("select[name='tipo_gasto[]'").map(function(){return $(this).val();}).get();

 var costo = $("input[name='costo[]'").map(function(){return $(this).val();}).get();

html+= "Gastos:   "+gasto+"   ";
   html+='<br>';
html+= "Costo:   "+costo;

$('#resumen').empty().append(html);

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



function closeModal(


  ) {

   $('.backdrop, .cotizador_box, .loader').animate({'opacity':'0'}, 300, 'linear', function(){
   $('.backdrop, .cotizador_box, .loader').css('display', 'none');
});  
    
}

    </script>