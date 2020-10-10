<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>
<div class="table-section"><a href="<?= URL ;?>recibos/facturadas">
  <img border="0" alt="REGRESAR" src="<?=URL ;?>public/img/regresar.png" width="35" height="35"></a></div>
  <div class="container">
    <h3>Factura <?= $_GET['factura']?></h3>
    <br>

    <div class="table-container">
      <table class="table">
        <thead>
          <tr>
            
            <th>REGISTRO</th>
            <th>ARCHIVO</th>
            <th>BOLETA</th>
            <th>MONTO</th>   
            <th colspan="2">AGREGADO</th>
            <th colspan="2">ACCIONES</th>
          </thead>
          <tbody id="inv-body">

            <?php 
            $rows=$ventas_model->getFacturaModificar();
            foreach ($rows as $row){

              ?>
              <tr>
                <td > <?php echo $row['fecharegistro'];?></td>
                <td style="width: 15%"> <?php echo $row['archivo'];?></td>
                <td > <?php echo $row['boleta'];?></td>
                <td style="width: 15%">   <?php echo "$". number_format($row['monto'],2); ?></td>                       
                <td > <?php echo $row['fecharevision'];?></td>
                <td > <?php echo $row['horarevision'];?></td>
                <td > <a class="btn btn-danger btn-sm" id="elim" href="<?php echo URL?>recibos/eliminarElemento?id_boleta=<?php echo $row['id_boleta'];?>&factura=<?= $_GET['factura']?>" style="width: 80%">Quitar</a> </td>
                <td></td>


              </tr>
              <?php 
            }
            ?>
          </tbody>
        </table>
      </div>
      <br>
      <p>Las siguientes boletas <b>NO ESTAN</b> agregadas a esta factura</p>

      <div class="table-container">
        <form method="POST" action="<?=URL ?>/recibos/actualizarFactura/">
          <table class="table">
            <thead>
              <tr>
                
                <th>REGISTRO</th>
                <th>ARCHIVO</th>
                <th>BOLETA</th>
                <th>MONTO</th>
                
                <th colspan="2">AGREGADO</th>
                <th colspan="2">ACCIONES</th>

              </thead>
              <tbody id="inv-body">

                <?php 
                $rows=$ventas_model->getFiles52();
                foreach ($rows as $row){

                  ?>
                  <tr>    
                    
                    <td > <?php echo $row['fecharegistro'];?></td>
                    <td style="width: 15%"> <?php echo $row['archivo'];?></td>
                    <td > <?php echo $row['boleta'];?></td>
                    <td style="width: 15%">   <?php echo "$". number_format($row['monto'],2); ?></td>                       
                    <td > <?php echo $row['fecharevision'];?></td>
                    <td > <?php echo $row['horarevision'];?></td>
                    
                    <td > <a style="width: 80%" class="btn btn-info btn-sm" href="<?=URL.'public/uploads/recibos/'.str_replace(" ","%20",$row['archivo']);?>" target="blank">Ver Boleta</a> </td>
                    <td>
                      <input type="checkbox" name="nuevoid[]" value="<?php echo $row['id_boleta'];?>" class="mis-checkboxes" tu-attr-precio="<?= $row['monto'];?>" onchange="restar(); sumar(); calcular();" onmousemove="suma2();">
                    </td>

                  </tr>
                  <?php 
                }
                ?>
              </tbody>
            </table>
          </div>
          <br>

          <?php 
          $rows=$ventas_model->getFiles42();
          foreach ($rows as $row){
            ?>
            <input type="hidden" id="id" name="id" value="<?= $row['id_factura'];?>">

            <h5 style="text-align: right;">Número de Factura:&nbsp &nbsp<input type="text" name="factura" value="<?= $row['factura'];?>" style="width: 25%" readonly></h5>

            <h5 style="text-align: right;">Monto Facturado:&nbsp &nbsp<input type="text" id="porfacturar" name="porfacturar" placeholder="0.00"  onkeyup="restar()" required style="width: 25%" value="<?= $row['totalfactura'];?>" readonly/></h5>

            <h5 style="text-align: right;">Monto de Selección Anterior:&nbsp &nbsp<input id="selecc" type="text" name="selecc" style="width: 25%" value="<?= $row['sumaboletas'];?>" disabled/></h5>

            <h5 style="text-align: right;">Monto por Validar Anterior:&nbsp &nbsp<input type="text" id="porvalidar1" name="porvalidar1" style="width: 25%" disabled value="<?= $row['porvalidar'];?>"/></h5>

            <hr size="20" style="color: #020202">
            <h5 style="text-align: right;">Monto Seleccionadas:&nbsp &nbsp<input id="totalrecibos1" type="text" name="totalrecibos1" placeholder="0.00" onchange="restar();" style="width: 25%" required class="readonly" /></h5>

            <h4 style="text-align: right;"><b>Monto por Validar:&nbsp &nbsp</b><input type="text" id="porvalidar" name="porvalidar" placeholder="0.00" onkeyup="sumar()" onmousemove="suma2()" required style="width: 25%" class="monto" value="<?= $row['porvalidar'];?>" readonly/></h4>

            <h5 style="text-align: right;">Monto de Selección Total:&nbsp &nbsp<input id="totalrecibos" type="text" name="totalrecibos" style="width: 25%" class="readonly" required value="<?= $row['sumaboletas'];?>" /></h5>
            <br>
            <h5 style="text-align: right;"><button type="button" id="btnEnviar" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="width: 25%" disabled> ACTUALIZAR FACTURA</button></h5>

          </div>
          <?php 
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de continuar?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                La factura se actualizará con las <br>
                nuevas boletas añadidas

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                <input class="btn btn-primary" type="submit" name="submit" value="ENVIAR"></div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="table-section">
      <small>
        Instrucciones de uso del modulo:
        <ul>
          <li>Ingresar el numero de factura</li>
          <li>Si aún no carga la suma del monto seleccionado, acerque el mouse a cualquier selección</li>
          <li>´Después de seleccionar o deseleccionar una boleta mover el mouse para que se actualice el monto a validar.</li>
        </ul>
      </small>
    </div>

    <script>

    // buscador en JavaScript
    $(document).ready(function() {

      $("#searcher").on("keyup", function() {
        
        var value = $(this).val().toLowerCase();
        
        $("#inv-body tr").filter(function() {
          
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $('[data-toggle="tooltip"]').tooltip()
    });

  </script>
  <script type="text/javascript">
    $(document).ready(function() {
     
     $(document).on('click keyup','.mis-checkboxes',function() {
       calcular();
     });

   });

    function calcular() {
      var tot = $('#totalrecibos1');
      tot.val(0);
      $('.mis-checkboxes').each(function() {
        if($(this).hasClass('mis-checkboxes')) {
          tot.val(($(this).is(':checked') ? parseFloat($(this).attr('tu-attr-precio')) : 0) + parseFloat(tot.val()));  
        }
        else {
          tot.val(parseFloat(tot.val()) + (isNaN(parseFloat($(this).val())) ? 0 : parseFloat($(this).val())));
        }
      });
      var totalParts = parseFloat(tot.val()).toFixed(2).split('.');
      tot.val(totalParts[0].replace(/\B(?=(\d{3})+(?!\d))/g,"") + '.' +  (totalParts.length > 1 ? totalParts[1] : '00'));  
    }

    function mayus(e) {
      e.value = e.value.toUpperCase();
    }

  </script>
  <script type="text/javascript">

    function suma2() {

     var resultado =
     parseFloat(document.getElementById('selecc').value)
     + parseFloat(document.getElementById('totalrecibos1').value);

     document.getElementById('totalrecibos').value = resultado.toFixed(2);

     if (isNaN(resultado)) {
      document.getElementById('totalrecibos').value = "Cargando..."
    }

  }

  function restar() {

   var resultado =
   parseFloat(document.getElementById('porvalidar1').value)
   - parseFloat(document.getElementById('totalrecibos1').value);

   document.getElementById('porvalidar').value = resultado.toFixed(2);

   if (isNaN(resultado)) {
    document.getElementById('porvalidar').value = "Cargando..."
  }

}


function sumar() {

  var resultado =
  parseFloat(document.getElementById('totalrecibos1').value)
  +parseFloat(document.getElementById('porvalidar').value);

  document.getElementById('total').value = resultado.toFixed(2);

  if (isNaN(resultado)) {
    document.getElementById('total').value = "Cargando..."
  }
}


$('document').ready(function(){
 $("#checkTodos").change(function () {
  $("input:checkbox").prop('checked', $(this).prop("checked"));
});
});
</script>
<script type="text/javascript">
  window.addEventListener("load", function() {
    miformulario.porfacturar.addEventListener("keypress", soloNumeros, false);
  });

//Solo permite introducir numeros.
function soloNumeros(e){
  var key = window.event ? e.which : e.keyCode;
  if (key < 48 || key > 57) {
    e.preventDefault();
  }
}

$(".readonly").on('keydown paste', function(e){
  e.preventDefault();
});

</script>
<script type="text/javascript">
  var btnEnviar = document.getElementById('btnEnviar');
  var inputTest = document.getElementById('totalrecibos1');
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
