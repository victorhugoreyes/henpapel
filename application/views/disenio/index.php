
<div class="left-col">
<select id="box-type" class="cajas-input" >
<option selected disabled>Elige un modelo de caja</option>
    <?php foreach ($models as $model) { ?>
    <option value="<?= $model['id_modelo'] ?>"><?= $model['nombre'] ?></option>
  <?php  } ?>
    
  </select>
  <img src="">
</div><div class="right-col">
  <div class="cajas-form">
<form method="POST" action="<?php echo URL; ?>calculadora/almeja3/">
<h1>Calculadora de cajas</h1>
<div id="form-content"></div>




</form>
</div>
</div>
<div class="loader">
  <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>
<div class="backdrop"></div>
<script>

 jQuery214(document).on("change", "#box-type", function () {
      var type=jQuery214(this).val();
      $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop').css('display', 'block');
    $('.loader').show();
      $.ajax({  
                      
          type:"POST",
          url:"<?php echo URL; ?>disenio/getForm/",   
          data:{model:type}, 
          success:function(data){

            jQuery214('.left-col img').attr("src","<?php echo URL; ?>public/img/"+type+".png");
            jQuery214('#form-content').html(data);
            closeModal();
         
                    }

});
});


function closeModal(){

   $('.backdrop, .box, .loader').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .box, .loader').css('display', 'none');
        });  
    
}
 
  
</script>


