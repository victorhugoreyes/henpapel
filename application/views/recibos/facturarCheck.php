<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?= URL; ?>public/css/bootstrap-theme.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="<?= URL; ?>public/js/mi.jquery.tools.min.js"></script>

<style type="text/css">
	th{
		background-color: #E6E6E6;
	}
</style>

<form method="POST" action="<?=URL ?>/recibos/facturar/">
	<div class="table-section">

		<div class="table-controls">
			<p style="float: left;font-size: 20px;margin: 4px 8px;">
				Facturación
			</p>

			<input type="text" id="searcher" name="" placeholder="Buscar...">
			<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#instrucciones">
			Instrucciones</button></div>

			<div class="table-container">

				<table class="hep-table">
					<thead>
						<tr>
							<th>ESTADO</th>
							<th>REGISTRO</th>
							<th>ARCHIVO</th>
							<th>BOLETA</th>
							<th>MONTO</th>
							<th colspan="2">ACCIONES</th>
						</thead>
						<tbody id="inv-body">

							<?php 
							$rows=$ventas_model->getFiles5();
							foreach ($rows as $row){

								?>
								<tr>    
									<td style="color: green; "><b><i> <?php echo $row['estado'];?> </i></b></td>
									<td > <?php echo $row['fecharegistro'];?></td>
									<td > <?php echo $row['archivo'];?></td>
									<td > <b><?php echo $row['boleta'];?></b></td>
									<td >   <?php echo "$". number_format($row['monto'],2); ?></td>
									<td > <a style="width: 80%" class="btn btn-success btn-sm" href="<?=URL.'public/uploads/recibos/'.str_replace(" ","%20",$row['archivo']);?>" target="blank">Ver Boleta</a> </td>
									<td>
										<input type="checkbox" name="id[]" value="<?php echo $row['id_boleta'];?>" class="mis-checkboxes" tu-attr-precio="<?= $row['monto'];?>" onchange="restar(); sumar(); calcular()" onmousemove="calcular()" checked>
									</td>

								</tr>
								<?php 
							}
							?>
						</tbody>
					</table>
				</div>
				<br>
				<div class="table-section">
					<h5 style="text-align: right;">Número de Factura:&nbsp &nbsp<input type="text" name="factura" placeholder="X-000" required onkeyup="mayus(this);" style="width: 25%" onmousemove="calcular()"></h5>

					<h5 style="text-align: right;">Ingresa Monto a Facturar:&nbsp &nbsp<input type="text" id="porfacturar" name="porfacturar" placeholder="0.00"  onkeyup="restar(); sumar()" required style="width: 25%"/></h5>

					<h5 style="text-align: right;">Monto Seleccionado:&nbsp &nbsp<input id="totalrecibos" type="text" name="totalrecibos" placeholder="Cargando..." onchange="restar()" required style="width: 25%" class="readonly monto"/></h5>

					<h5 style="text-align: right;">Monto por Validar:&nbsp &nbsp<input type="text" id="porvalidar" name="porvalidar" placeholder="0.00" onkeyup="sumar()" required class="readonly" style="width: 25%" class="monto"/></h5>
					<br>
					<h5 style="text-align: right;"><b>Total:&nbsp &nbsp</b><input type="text" id="total" name="total" placeholder="0.00" onmousemove="sumar()" readonly required  style="width: 25%"/></h5>

					<h5 style="text-align: right;"><button type="button" id="btnEnviar" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="width: 25%" disabled> FACTURAR</button></h5>

				</div>
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
								Todos los datos registrados serán <br>
								enviados para generar la factura

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								<input class="btn btn-primary" type="submit" name="submit" value="Enviar Nueva Factura"></div>
							</div>
						</div>
					</div>
				</form>

				<small>
					Instrucciones de uso del modulo:
					<ul>
						<li>Ingresar el numero de factura</li>
						<li>Si aún no carga la suma del monto seleccionado, acerque el mouse a cualquier selección</li>
						<li>Después de seleccionar o deseleccionar verifique si se actualizó el Monto por Validar.</li>
						<li>Ya que todo haya cargado correctamente, damos click en "Facturar".</li>
					</ul>
				</small>

				<!-- Modal -->
				<div class="modal fade" id="instrucciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Instrucciones:</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<ul>
									<li style="text-align: left;">Ingresar el primer campo con numero de factura.</li>
									<li style="text-align: left;">Ingresar el monto total que deberá tener la factura.</li>
									<li style="text-align: left;">Si aún no carga la suma del monto seleccionado, acerque el mouse a cualquier selección.</li>
									<li style="text-align: left;">Después de seleccionar o deseleccionar verifique si se actualizó el Monto por Validar.</li>
									<li style="text-align: left;">Ya que todo haya cargado correctamente, damos click en "Facturar".</li>
								</ul>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
					</div>
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
		var tot = $('#totalrecibos');
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

	function sumar() {

		var resultado =
		parseFloat(document.getElementById('totalrecibos').value)
		+parseFloat(document.getElementById('porvalidar').value);

		document.getElementById('total').value = resultado.toFixed(2);

		if (isNaN(resultado)) {
			document.getElementById('total').value = "Cargando..."
		}
	}
	function restar() {

		var resultado =
		parseFloat(document.getElementById('porfacturar').value)
		-parseFloat(document.getElementById('totalrecibos').value);

		document.getElementById('porvalidar').value = resultado.toFixed(2);

		if (isNaN(resultado)) {
			document.getElementById('porvalidar').value = "Cargando..."
		}

	}

	$('document').ready(function(){
		$("#checkTodos").change(function () {
			$("input:checkbox").prop('checked', $(this).prop("checked"));
		});
	});
</script>
<script type="text/javascript">

	$(".readonly").on('keydown paste', function(e){
		e.preventDefault();
	});

</script>
<script type="text/javascript">
	var btnEnviar = document.getElementById('btnEnviar');
	var inputTest = document.getElementById('porfacturar');
	var datos = inputTest.val;

	inputTest.addEventListener("keyup",function(){

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
