<div style="padding-left:16px">
 
</div>
<div class="separator"></div>
<div class="table-section">
<div class="table-controls"><input type="text" id="searcher" name="" placeholder="Buscar.."></div>
<div class="table-container">
  <table class="hep-table">
  <thead>
  <tr>
    <th><strong>Tipo</strong></th>
    <th><strong>Modelo</strong></th>
    <th ><strong>Descripcion</strong></th>
                      
    <th><strong>P100</strong></th>
    <th><strong>U100</strong></th>
                  
    <th><strong>P200</strong></th>
    <th><strong>U200</strong></th>
    <th><strong>P300</strong></th>
    <th><strong>U300</strong></th>
    <th><strong>P400</strong></th>
    <th><strong>U400</strong></th>
    <th><strong>P500</strong></th>
                      
    <td><strong>U500</strong></td>
  </tr>
  </thead>
  <tbody id="inv-body">
  <?php foreach ($rows as $row) {
                        ?>
  <tr>
    <td><?php echo $row['TipoProd'];?></td>
                        <td > <?php echo $row['Modelo'];?></td>
                        <td >    <?php echo $row['Descripcion'];?>      </td>
                        
                        <td >    <?php echo round($row['P100'],2);?>  </td>
                        <td >    <?php echo round($row['U100'],2);?>   </td>
                        
                        <td >    <?php echo round($row['P200'],2);?> </td>
                        <td >    <?php echo round($row['U200'],2);?> </td>
                        <td >    <?php echo round($row['P300'],2);?> </td>
                        <td >    <?php echo round($row['U300'],2);?> </td>
                        <td >    <?php echo round($row['P400'],2);?> </td>
                        <td >
                        <?=round($row['U400'],2) ?> </td>
                        <td >
                        <?=round($row['P500'],2) ?>    </td>
                        
                        <td >    <?php echo round($row['U500'],2);?> </td>
  </tr>
  <?php 
    }
   ?>
   </tbody>
</table>
</div>

  <div class="paginator" style="color: #fff;">
  <?php
  
  function pagination($page,$num_page)
{
  echo'<ul style="list-style-type:none; margin-bottom:0; display:inline-table;">';
  for($i=1;$i<=$num_page;$i++)
  {
     if($i==$page)
{
 echo'<li class="page-sel" style="float:left;padding:5px;"><div >'.$i.'</div></li>';
}
else
{
 echo'<li style="float:left;padding:5px;"><a  href="repordenes.php?p='.$i.'"><div class="page">'.$i.'</div></a></li>';
}
  }
  echo'</ul>';
}
if($num_page>1)
{
 pagination($page,$num_page);
}
?> 
</div>
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
replyHeight();

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
 function replyHeight(){
  var one = document.getElementById("left-sec");
  var two = document.getElementById("right-sec");
  style = window.getComputedStyle(one);
  wdt = style.getPropertyValue('height');
  console.log(wdt);
  two.style.height = wdt;
 }
 $(document).on('click', '.remove', function () {
  this.closest('tr').remove();
  collectPrices();
     collectQty();
});
$(document).on('keyup', '#finder', function () {
  var text=$('#finder').val();
     $.ajax({  
                      
                     type:"POST",
                     url:"search.php",   
                     data:{param:text},  
                       
                     success:function(data){ 
                          
                          $('#searchresults').html(data);
                          
                     }  
                });
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
           url:"<?=URL?>ventas/invitSearch",   
          data:{param:parameter},  
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
</script>