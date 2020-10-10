<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>

<div class="table-section"><a href="javascript:window.history.back();">
  <img border="0" alt="REGRESAR" src="<?=URL ;?>public/img/regresar.png" width="35" height="35"></a></div>
  <div class="container">
    <h2><center>Confirma la operación</h2>
      <br>
      <center><h5>¿Estas Seguro de quitar la boleta <?= $row['boleta']; ?> de la factura <?= $_GET['factura']?>?</h5></center>
      <br>
      <div class="secction">
       <form action="<?=URL ?>/recibos/eliminarBFac/" method="post">
         <input type="hidden" name="id_boletaup" value="<?= $row['id_boleta']; ?>">
         <div class="form-group" style="width: 70%">
           <center>
            <h5 style="text-align: right;">Monto de boleta:&nbsp $
              <input style="width: 30%; font-size: 20px" type="text" id="monto" value="<?= $row['monto']; ?>" onmousemove="restar(); restar2();" disabled/></h5>
              <hr>
              <?php 
              $rows=$ventas_model->getFiles42();
              foreach ($rows as $row){
               ?>
               <input type="hidden" name="facturaup" value="<?= $row['id_factura']; ?>">
               <h5 style="text-align: right;">Suma Actual:&nbsp $
                 <input style="width: 30%; font-size: 20px" type="text" id="sumaboletas" name="sumaboletasup" value="<?= $row['sumaboletas']; ?>" onmousemove="restar(); restar2();" disabled/></h5>

                 <h5 style="text-align: right;">Suma sin esta boleta:&nbsp $
                   <input style="width: 30%; font-size: 20px" type="text" class=" readonly" id="total" name="totalup" placeholder="Cargando..." required onmousemove="restar(); restar2();"/></h5>
                   <hr>
                   <h5 style="text-align: right;">Monto por validar Actual:&nbsp $
                     <input style="width: 30%; font-size: 20px" type="text" disabled id="porvalidar1" value="<?= $row['porvalidar']; ?>" onmousemove="restar(); restar2();"></h5>

                     <h5 style="text-align: right;">Monto por validar sin esta boleta:&nbsp $
                       <input style="width: 30%; font-size: 20px" type="text" class=" readonly" id="porvalidar" name="porvalidarup" placeholder="Cargando..." required onmousemove="restar(); restar2();"></h5>
                       <?php 
                     }
                     ?>
                     <br>

                   </center>
                 </div>
                 <center><button style="width: 40%" type="submit" id="btnEnviar" class="btn btn-danger" disabled onmouseout="restar(); restar2();">SÍ, DESEO QUITARLA</button></center>
               </form>
               <br>
               <p>NOTA: Si aparece el texto 'Cargando...' acercar el mouse a ese texto</p>
               <br>
             </div>
           </div>
           <script type="text/javascript">
             function restar() {

               var resultado =
               parseFloat(document.getElementById('sumaboletas').value)
               - parseFloat(document.getElementById('monto').value);

               document.getElementById('total').value = resultado.toFixed(2);

               if (isNaN(resultado)) {
                document.getElementById('total').value = "Cargando..."
              }

            }
            function restar2() {

             var resultado =
             parseFloat(document.getElementById('porvalidar1').value)
             + parseFloat(document.getElementById('monto').value);

             document.getElementById('porvalidar').value = resultado.toFixed(2);

             if (isNaN(resultado)) {
              document.getElementById('porvalidar').value = "Cargando..."
            }

          }


          $(".readonly").on('keydown paste', function(e){
            e.preventDefault();
          });
        </script>
        <script type="text/javascript">
         var btnEnviar = document.getElementById('btnEnviar');
         var inputTest = document.getElementById('porvalidar');
         var datos = inputTest.val;

         inputTest.addEventListener("mousemove",function(){

          if(inputTest.value.length === 0){
            console.log('desactivado');
            btnEnviar.disabled = true;
          }

          else {  

            console.log('activado');
            btnEnviar.disabled = false;

          }
        });
      </script>