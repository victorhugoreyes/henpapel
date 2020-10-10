<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>

<style type="text/css">
  td{
    font-size: 110%;
  }
</style>

<div class="container">
  <br>
  <h2><center>Añadir una Boleta</center></h2>
  <br>
  <div class="col-md-10">
  </div>

  <div class="row login-box2" style="border-left: 15px solid #105C9B;">
    <div class="col-md-6">
      
      <div class="table-responsive">
        
        <input type="hidden" name="modelo" value="1">
        <input type="hidden" name="id" value="<?=$id;?>">
        
        <table>
          <tr>
            <td><b>Tienda:</b></td>
            <td><?php echo $row['tienda']; ?></td>
          </tr>
          <tr>
            <td><b>Boleta:</b></td>
            <td><?php echo $row['boleta']; ?></td>
          </tr>
          <tr>
            <td><b>Monto:</b></td>
            <td><?php echo $row['monto']; ?></td>
          </tr>
          <tr>
            <td><b>Fecha:</b></td>
            <td><?php echo $row['fecharegistro']; ?></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="col-md-6">

      <div class="table-responsive">
        <form id="datos" action="<?=URL ?>/recibos/uploadFiles/" method="post"  enctype="multipart/form-data">
          <?php 
          if (isset($_SESSION['log_incorrect'])) { ?>
            <p>Usuario o contraseña incorrectos</p>
            <?php
          }
          ?>
          <input type="hidden" name="id_boleta" value="<?=$row['id_boleta']?>">
          

          <br>
          <input class="input-file" name="archivo" type="file" required id="archivo" onchange="return validarExt()">
          <center><label tabindex="0" for="my-file" class="input-file-trigger">Selecciona un Archivo</label></center>

          <p>Permite .pdf, .jpeg, .jpg</p>
          <p class="file-return"></p>
          <br>
          <input type="submit" value="Enviar Boleta" class="btn btn-primary btn-sx" style="width: 100%">
          <br>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
unset($_SESSION['messages']);
unset($_SESSION['notification']);
unset($_SESSION['result']);

?>

<script type="text/javascript">
  
  document.querySelector("html").classList.add('js');

  var fileInput  = document.querySelector( ".input-file" ),  
  button     = document.querySelector( ".input-file-trigger" ),
  the_return = document.querySelector(".file-return");
  
  button.addEventListener( "keydown", function( event ) {  
    if ( event.keyCode == 13 || event.keyCode == 32 ) {  
      fileInput.focus();  
    }  
  });
  button.addEventListener( "click", function( event ) {
   fileInput.focus();
   return false;
 });  
  fileInput.addEventListener( "change", function( event ) {  
    the_return.innerHTML = this.value;  
  });  
</script>
<style type="text/css">
  .input-file-container {
    position: relative;
    width: 225px;
  } 
  .js .input-file-trigger {
    display: block;
    padding: 14px 45px;
    background: #39D2B4;
    color: #fff;
    font-size: 1em;
    transition: all .4s;
    cursor: pointer;
  }
  .js .input-file {
    position: absolute;
    top: 0; left: 0;
    width: 225px;
    opacity: 0;
    padding: 14px 0;
    cursor: pointer;
  }
  .js .input-file:hover + .input-file-trigger,
  .js .input-file:focus + .input-file-trigger,
  .js .input-file-trigger:hover,
  .js .input-file-trigger:focus {
    background: #34495E;
    color: #39D2B4;
  }

  .file-return {
    margin: 0;
  }
  .file-return:not(:empty) {
    margin: 1em 0;
  }
  .js .file-return {
    font-style: italic;
    font-size: .9em;
    font-weight: bold;
  }
  .js .file-return:not(:empty):before {
    content: "Selected file: ";
    font-style: normal;
    font-weight: normal;
  }

</style>
<script type="text/javascript">
  function validarExt(){
    var archivoInput = document.getElementById('archivo');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.PDF|.PNG|.JPG|.JPEG|.pdf|.png|.jpg|.jpeg)$/i;

    if (!extPermitidas.exec(archivoRuta))
    {
      alert('Tipo de archivo no admitido')
      archivoInput.value='';
      return false;
    }
    
  }
</script>