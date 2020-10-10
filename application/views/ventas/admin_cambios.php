<style>
  textarea{
    border: solid 1px #ccc;
    border-radius: 3px;
    padding: 5px 10px;
  }

  .hep-table th {
    
    font-size: 10px;
}
</style>
<div style="padding-left:16px">
 
</div>
<div class="separator"></div>
<div class="table-section">
<div class="table-controls">
<div class="table-title">Cambios <?=$title ?></div>
<input type="text" id="searcher" name="" placeholder="Buscar.."></div>
<div class="table-container">
  <table class="hep-table">
  <thead>
  <tr>
    <th><strong>ODT</strong></th>
    <th><strong>Modelo</strong></th>
    <th><strong>Razon del Cambio</strong></th>
    
    <th ><strong>Observaciones</strong></th>
                      
    <th><strong>Costo Nuevo</strong></th>
    <th><strong>Quien autorizo</strong></th>
     <th><strong>Fecha de Autorizacion</strong></th>       
    <th><strong>Hora de Registro</strong></th>
              
    <th><strong>Fecha de registro</strong></th>
    <th><strong>Usuario</strong></th>
    <th><strong>Tienda</strong></th>
    <?php if ($title=='Realizados') { ?>
     <th>FECHA DE REALIZACION</th>
     <th>Seguimiento</th>
    <?php } ?>
    <th>Archivo</th>
    <?php if ($_SESSION['user']['cambios_admin']=='true'&&$title=='Pendientes') { ?>
    <th>Seguimiento</th>
     <th></th>
    <?php } ?>
    
   
  </tr>
  </thead>
  <tbody id="inv-body">
  <?php foreach ($rows as $row) {
                        ?>
  <tr>
    
                        <td > <?= $row['odt'];?></td>
                        <td >    <?= $row['modelo'];?>      </td>
                        <td >    <?= $row['razon'];?>      </td>
                        
                        <td >    <?= $row['observaciones'].' '.$row['porque_no_es_posible'];?> </td>
                        <td >    <?=($row['modifica_costo']=='SI')? '$'.$row['costo_nuevo']:'N/A';?>   </td>
                        <td >    <?=(!empty($row['quien_autorizo']))? $row['quien_autorizo']:'N/A';?> </td>
                        <td >    <?=(!empty($row['fecha_autorizacion']))? $row['fecha_autorizacion']:'N/A';?> </td>
                        
                        <td >    <?= $row['hora'];?> </td>
                        <td >    <?= $row['fecha'];?> </td>
                        <td >    <?= $row['nombre_usuario'];?> </td>
                        <td >    <?=strtoupper($row['tienda']);?> </td>
                         <?php if ($title=='Realizados') { ?>
                        
     <td><?= $row['fecha_realizado'];?></td>
     <td><strong style="color: #000"><?= $row['seguimiento'];?></strong></td> 
    <?php } ?>
                        <td>
                        <?php if (!empty($row['archivo'])) { ?>
                        <a href="<?=URL ?>public/uploads/cambios/<?=$row['archivo'] ?>" target="_blank" class="download-file">Ver</a>
                        <?php }else{ ?>
                        --
                        <?php }?>
                         </td>
                         <?php if ($_SESSION['user']['cambios_admin']=='true'&&$title=='Pendientes') { ?>
                         <td> <textarea id="area-<?= $row['id_cambio'];?>" placeholder="Agrega una observacion.."></textarea></td>
                           <td><div data-id="<?= $row['id_cambio'];?>" class="cambio-chekc">Completar</div></td>
                          <?php } ?>
                         

  </tr>
  <?php 
    }
   ?>
   </tbody>
</table>
</div>

 
</div>
<div class="popup" style="display: none;">

</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<script>



$(document).ready(function () {
$('#info').addClass('active-page');
var wind=$(window).height()-90;
$('.table-cont').height(wind);
$('.tablespace').height(wind-120);  


$(window).keydown(function(event){
    if(event.keyCode == 13){
      event.preventDefault();
      return false;
    }
  });
  
});
$(window).resize(function () {
    replyHeight();

});
 
 $(document).on('click', '.remove', function () {
  this.closest('tr').remove();
  collectPrices();
     collectQty();
});


$(document).on('change', '.qty', function () {
  var id=$(this).data('id');
  aumentarManual(id);
  collectPrices();
     collectQty();
});
$(document).on('keyup', '#searcher', function () {
  var parameter=$(this).val();

   $.ajax({  
           type:"POST",
           url:"<?=URL?>ventas/cambiosSearch",   
          data:{param:parameter,filter:'<?=$title ?>'},  
          success:function(data){ 
           $('#inv-body').html(data);
          }  
  });
});

$(document).on('keyup', '.qty', function () {
  var id=$(this).data('id');
  aumentarManual(id);
  collectPrices();
     collectQty();
});

  function addProduct(id,internalId){
    if ($("#prod-"+id).length){ 
      if(confirm('Deseas Agregar este producto otra vez?')) {
              aumentar(id);
             
                  
   }else{
    return false;
   }
     }else{
      var wrapper=$('#customers');
    var price=$('#'+id+'-precio').val();
    var stock=$('#'+id+'-stock').val();
    var name=$('#'+id+'-nombre').val();
     var new_prod='<tr id="prod-'+id+'" class="temporal"><td class="delete"><img class="remove" src="../images/delete.png"></td>'+
        '<td class="product-name">'+name+'</td>'+
        '<td><input type="number" name="cantidades['+id+']" class="qty" value="1" data-id="'+id+'"></td>'+
        '<input type="hidden" name="productos[]" value="'+id+'">'+
        '<input type="hidden" name="productosId['+id+']" value="'+internalId+'">'+
        '<input type="hidden" name="costos['+id+']" class="costo" value="'+price+'">'+
        '<input type="hidden" name="stocks['+id+']" value="'+stock+'">'+
        '<input type="hidden" class="fixcosto" name="unitarios['+id+']" value="'+price+'">'+
        '<td class="price">'+price+'</td></tr>';

$(wrapper).append(new_prod);
     }
    //console.log($("#prod-"+id).length);
 collectQty();    
collectPrices(); 
  }

  function collectPrices(){
      var sum = 0;
$('.costo').each(function(){
  var val= this.value;
  if (val==''){ val=0;}
    sum += parseFloat(val);
});
//var desc=$('#descu').val();
//var conD = sum * parseFloat(desc);
//var ConIva = (sum - conD) * 0.16;
 
//var general=conD + ConIva;

//var general=conD + ConIva;

$('#pricetotal').html(sum.toFixed(2));
$('#total-amount').html(sum.toFixed(2));
$('#costo-total').val(sum.toFixed(2));

  }
  function collectQty(){
      var qty=$('#customers tr').length-1;
//var desc=$('#descu').val();
//var conD = sum * parseFloat(desc);
//var ConIva = (sum - conD) * 0.16;
 
//var general=conD + ConIva;

//var general=conD + ConIva;

$('#totalqty').html(qty);


  }
function aumentar(id){
  var incease_price=$('#prod-'+id+' .fixcosto').val();
              var increase_qty=$('#prod-'+id+' .qty').val();
              var aumento=parseInt(increase_qty)+1;
              console.log(aumento);
              $('#prod-'+id+' .qty').val(aumento);
              
              //$('#prod-'+id+' .costo').val(parseInt(incease_price));
              $('#prod-'+id+' .costo').val(parseInt(incease_price)*aumento);
              $('#prod-'+id+' .price').html(parseInt(incease_price)*aumento);
              $('#costo-total').val(aumento);
}
function aumentarManual(id){
  var incease_price=$('#prod-'+id+' .fixcosto').val();
              var increase_qty=$('#prod-'+id+' .qty').val();
              var aumento=parseInt(increase_qty);
              console.log(aumento);
              $('#prod-'+id+' .qty').val(aumento);
              
              //$('#prod-'+id+' .costo').val(parseInt(incease_price));
              $('#prod-'+id+' .costo').val(parseInt(incease_price)*aumento);
              $('#prod-'+id+' .price').html(parseInt(incease_price)*aumento);
              $('#costo-total').val(aumento);
}
function getCategorie(id){
  $.ajax({  
                      
                     type:"POST",
                     url:"search.php",   
                     data:{catego:id},  
                       
                     success:function(data){ 
                          
                          $('#searchresults').html(data);
                          
                     }  
                });
}
function saveMovement(){
  event.preventDefault();
  var lenghts= $('[name="productos[]"]').length;
  if (lenghts>0) {
      $.ajax({  
                      
                     type:"POST",
                     url:"checkout.php",   
                     data:$('#movimiento').serialize(),  
                       
                     success:function(data){ 
                          
                          $('#searchresults').html(data);
                          $('.temporal').remove();
                          $('#total-amount').html(0.00);
                           $('#pricetotal').html(0.00);
                           $('#totalqty').html(0);

                          
                     }  
                });
    }else{
      $('#formvacio').show();
      setTimeout(function() {   
                   $('#formvacio').hide();
                }, 3000);
    }

}

$(document).on('click', '.cambio-chekc', function () {
  var id=$(this).data('id');
  var comments=$('#area-'+id).val();
console.log('se envio');
   $.ajax({  
           type:"POST",
           url:"<?=URL?>ventas/completeCambio",   
          data:{id:id,coments:comments}, 
          dataType:"json",  
          success:function(data){ 
            console.log(data);
            if (data.logged=='true') {
               $('.popup').html(data.result);
               $('.popup').fadeIn("slow");
               $('#inv-body').html(data.html);
               if (data.restantes>0) {
                 $('.small-notif').html(data.restantes);
               }else{
                $('.small-notif').fadeOut("slow");
               }
               
               setTimeout(function() {   
                   $('.popup').fadeOut("slow");
                }, 1500);
            }else{
              location.reload();
            }
          
          }  
  });
});

</script>