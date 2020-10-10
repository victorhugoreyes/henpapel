  <div class="separator" id="messages">
  <div class="notification <?=(!isset($_SESSION['notification']))? '' : $_SESSION['notification'] ?>" style="<?=(!isset($_SESSION['notification']))? 'display:none;' : '' ?>">
    <div></div>
    <p><span><?=$_SESSION['result'] ?></span> <?=$_SESSION['messages'] ?></p>
  </div>
</div>

    <div class="container">
        <div class="form-box">
        <div class="form-inner">
          <form id="datos" action="<?=URL ?>/ventas/uploadList/" method="post"  enctype="multipart/form-data">
        
        
        <?php 
 if (isset($_SESSION['log_incorrect'])) { ?>
      <p>Usuario o contraseè´–a incorrectos</p>
    <?php }
       ?>
            
             <h1 style="text-align:center;color:#999999;margin-top:20px;font-weight:normal;font-size:18px;">LISTAS DE ROTULACION</h1>
             <input type="hidden" name="form" value="lista">
            <input name="odt" type="text" placeholder="Numero de Orden" class="login-input" required="" style="margin-top:0;" />
             <input name="numlist" type="number" placeholder="Numero de Lista" class="login-input" required="" />
              <input name="qty" type="number" placeholder="Cantidad" class="login-input" required="" />
            <textarea required name="comments" placeholder="comentarios.." style="text-align: left; padding: 5px;"></textarea>
            <div class="inputfile">
              <div class="filename">Ningun archivo seleccionado
              </div><div class="filebutton">Seleccionar</div>
              <input style="display: none;" type="file" id="the-file" name="up-file">
            </div>
         
             
             
              
             
            
                
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
 

<script>

  $(document).on('click', '.filebutton', function () {
    $('#the-file').click();
 
});

$(document).on('submit', '#datos', function () {
    $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop').css('display', 'block');
    $('.loader').show();
 
});
  function checkFileSize(id){
    
      
}


  $('#the-file').change(function(e){
            var fileName = e.target.files[0].name;
            var size=$(this)[0].files[0].size;

    
    if (size>2097152) {
      
      alert('Este archivo pesa mas de 2MB, perdon pero no podemos aceptarlo.');
      $(this).val(null);
      
    }else{
      
      
      $('.filename').html(fileName);
      
    }
            
        });
</script>

<?php
unset($_SESSION['messages']);
unset($_SESSION['notification']);
unset($_SESSION['result']);



?>