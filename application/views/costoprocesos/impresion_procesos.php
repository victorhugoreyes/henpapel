<style type="text/css">
	table th,td{
		height: 5px;
	}
	.te td,th{
		padding: 0px;
	}
</style>
<div style="width: 100%;height: 100%;">

	<div align="center" class="form-group corteq" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th colspan="2" style="text-align: center;">
					CORTE
				</th>
			</tr>
			<tr>
				<td style="text-align: center;">
					Costo unitario:
				</td>
				<td style="text-align:center;">
					<label><?= $procesosOffset['Corte']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
	</div>
	<div align="center" class="form-group offset" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th style="text-align: center;" colspan="4" align="center">
					OFFSET
				</th>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align:center;">
					Normal
				</th>
			</tr>
			<tr>
				<td align="center">
					Lamina
				</td>
				<td align="center" colspan="2">
					Costo Por Color:
				</td>
				<td align="center" style="text-align: center;">
					<label><?= $procesosOffset['Laminas']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Arreglo']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Tiro
				</td>
				<td align="center" colspan="2">
					Costo Por Millar Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Tiro']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center" colspan="2">
					Tiraje Minimo:
				</td>
				<td align="center">
					<?= $procesosOffset['Arreglo']['tiraje_minimo']?>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center" colspan="2">
					Tiraje Maximo:
				</td>
				<td align="center">
					<?= $procesosOffset['Arreglo']['tiraje_maximo']?>
				</td>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;">
					Pantone
				</th>
			</tr>
			<tr>
				<td align="center">
					Lamina
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Laminas Pantone']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Arreglo de Pantone']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>

				<td align="center">
					Tiro
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Millar Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Tiro Pantone']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;">
					Maquila
				</th>
			</tr>
			<tr>
				<td align="center">
					Lamina
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Maquila Lamina']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Maquila Arreglo']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">

			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosOffset['Maquila1']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff2"><?= $procesosOffset['Maquila2']['costo_unitario']?> MXN</label>
				</td> 
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff3"><?= $procesosOffset['Maquila3']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<th colspan="4">
					
				</th>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th style="text-align: center;" colspan="2">
					Maquila Pantone
				</th>
			</tr>
			<tr>
				<td align="center">
					Lamina
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Maquila Lamina Pantone']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosOffset['Maquila Arreglo Pantone']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">

			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila Pantone1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila Pantone1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosOffset['Maquila Pantone1']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila Pantone2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila Pantone2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff2"><?= $procesosOffset['Maquila Pantone2']['costo_unitario']?> MXN</label>
				</td> 
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila Pantone3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosOffset['Maquila Pantone3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff3"><?= $procesosOffset['Maquila3']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
	</div>
	<div align="center" class="form-group serigrafia" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th colspan="4" style="text-align: center;">
					SERIGRAFIA
				</th>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th style="text-align: center;" colspan="2">
					Normal	
				</th>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['Arreglo']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" style="table-layout: fixed;">

			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['cantidad1']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['cantidad2']['costo_unitario']?> MXN</label>
				</td> 
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['cantidad3']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad4']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad4']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['cantidad4']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" style="table-layout: fixed;">
			<th colspan="4">
				
			</th>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th style="text-align: center;" colspan="2">
					Pantone	
				</th>
			</tr>
			<tr>
				
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['Arreglo']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosSerigrafia['cantidad Pantone1']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff2"><?= $procesosSerigrafia['cantidad Pantone2']['costo_unitario']?> MXN</label>
				</td> 
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff3"><?= $procesosSerigrafia['cantidad Pantone3']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone4']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosSerigrafia['cantidad Pantone4']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label id="lblTirOff3"><?= $procesosSerigrafia['cantidad Pantone4']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
	</div>
	<div align="center" class="digital" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th style="text-align: center;" colspan="6">
					DIGITAL
				</th>
			</tr>
			<tr>
				<td colspan="2">
									
				</td>
				<td style="text-align: center;" colspan="2">
					Carta
				</td>
				<td style="text-align: center;" colspan="2">
					Doble Carta
				</td>
			</tr>
			<tr>
				<td style="text-align: center;" colspan="2">
					Rango
				</td>
				<td align="center">
					Frente
				</td>
				<td align="center">
					Frente Vuelta
				</td>
				<td align="center">
					Frente
				</td>
				<td align="center">
					Frente Vuelta
				</td>
			</tr>
			<tr>
				<td align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
				<td>
									
				</td>
			</tr>
			<tr>
				<td align="center">
					<?= $digital['Frente Carta'][1]['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $digital['Frente Carta'][1]['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $digital['Frente Carta'][1]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Vuelta Carta'][1]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Frente Doble Carta'][1]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Vuelta Doble Carta'][1]['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					<?= $digital['Frente Carta'][2]['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $digital['Frente Carta'][2]['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $digital['Frente Carta'][2]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Vuelta Carta'][2]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Frente Doble Carta'][2]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Vuelta Doble Carta'][2]['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					<?= $digital['Frente Carta'][3]['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $digital['Frente Carta'][3]['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $digital['Frente Carta'][3]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Vuelta Carta'][3]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Frente Doble Carta'][3]['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $digital['Frente Doble Carta'][3]['costo_unitario']?> MXN</label>
				</td>
				</tr>
		</table>
	</div>
	<br>
	<div align="center" class="laminado" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th colspan="4" style="text-align: center;">
					LAMINADO
				</th>
			</tr>
			<tr>
				<td>
									
				</td>
				<td style="text-align: center;" align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Costo Por m2
				</td>
			</tr>
			<tr>
				<td>
									
				</td>
				<td align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>
			<tr>
				<td align="center">
					Mate
				</td>
					<td align="center">
						<?= $procesosLaminado['Mate']['tiraje_minimo']?>
					</td>
					<td align="center">
						<?= $procesosLaminado['Mate']['tiraje_maximo']?>
					</td>
					<td align="center">
						<label><?= $procesosLaminado['Mate']['costo_unitario']?> MXN</label>
					</td>
				</tr>
				<tr>
					<td align="center">
						Soft Touch
					</td>
					<td align="center">
						<?= $procesosLaminado['Soft Touch']['tiraje_minimo']?>			
					</td>
					<td align="center">
						<?= $procesosLaminado['Soft Touch']['tiraje_maximo']?>						
					</td>
					<td align="center">
						<label><?= $procesosLaminado['Soft Touch']['costo_unitario']?>			 MXN</label>
					</td>
				</tr>
				<tr>
					<td align="center">
						Anti Scratch
					</td>
					<td align="center">
						<?= $procesosLaminado['Anti Scratch']['tiraje_minimo']?>
					</td>
					<td align="center">
						<?= $procesosLaminado['Anti Scratch']['tiraje_maximo']?>			
					</td>
					<td align="center">
						<label><?= $procesosLaminado['Anti Scratch']['costo_unitario']?> MXN</label>
					</td>
				</tr>
				<tr>
					<td align="center">
						Superadherente
					</td>
					<td align="center">
						<?= $procesosLaminado['Superadherente']['tiraje_minimo']?>
					</td>
					<td align="center">
						<?= $procesosLaminado['Superadherente']['tiraje_maximo']?>			
					</td>
					<td align="center">
						<label><?= $procesosLaminado['Superadherente']['costo_unitario']?> MXN</label>
					</td>
				</tr>
		</table>
	</div>
	<br>
	<div align="center" class="corteLaser" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th colspan="6" style="text-align: center;">
					CORTE LASER
				</th>
			</tr>
			<tr>
				<th></th>

				<td align="center" colspan="2">
					Figura
				</td>
				<td align="center" colspan="2">
					Ranura
				</td>
				<td align="center">
					Personalizada
				</td>
			</tr>
			<tr>
				<th></th>
				<td align="center">
					Sencilla
				</td>
				<td align="center">
					Detallada
				</td>
				<td align="center">
					Sencilla
				</td>
				<td align="center">
					Detallada
				</td>
				<td align="center">
									
				</td>
			</tr>
			<tr>
				<td align="center">
					Tiempo
				</td>
				<td align="center">
					<?= $procesosLaser['Figura Sencilla']['tiempo_requerido']?>
				</td>
				<td align="center">
					<?= $procesosLaser['Figura Detallada']['tiempo_requerido']?>
				</td>
				<td align="center">
					<?= $procesosLaser['Ranura Sencilla']['tiempo_requerido']?>
				</td>
				<td align="center">
					<?= $procesosLaser['Ranura Detallada']['tiempo_requerido']?>
				</td>
				<td align="center">
					<?= $procesosLaser['Personalizado']['tiempo_requerido']?>
				</td>
			</tr>
			<tr>
				<td align="center">
					Costo Unitario:
				</td>
				<td align="center">
					<label><?= $procesosLaser['Figura Sencilla']['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $procesosLaser['Figura Detallada']['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $procesosLaser['Ranura Sencilla']['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $procesosLaser['Ranura Detallada']['costo_unitario']?> MXN</label>
				</td>
				<td align="center">
					<label><?= $procesosLaser['Personalizado']['costo_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
	</div>
	<br>
	<div align="center" class="HS" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			<tr>
				<th style="text-align: center;" colspan="2" align="center">
					HOT STAMPING
				</th>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<th colspan="4">
					
				</th>
			</tr>
			<tr>
				
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;">
					H
				</th>
			</tr>
			<tr>
				<td align="center">
					Placa
				</td>
				<td align="center" style="text-align: center;" colspan="2">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['Placa']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Pelicula
				</td>
				<td align="center" style="text-align: center;" colspan="2">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['Pelicula']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" style="text-align: center;" colspan="2">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['Arreglo']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['Estampado1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['Estampado1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['Estampado1']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['Estampado2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['Estampado2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['Estampado2']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['Estampado3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['Estampado3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['Estampado3']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<th style="text-align: center;"align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;">
					H1
				</th>
			</tr>
			<tr>
				<td align="center">
					Placa
				</td>
				<td align="center" style="text-align: center;" colspan="2">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG1 Placa']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Pelicula
				</td>
				<td align="center" style="text-align: center;" colspan="2">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG1 Pelicula']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" style="text-align: center;" colspan="2">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG1 Arreglo']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG1 Estampado1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG1 Estampado1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG1 Estampado1']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG1 Estampado2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG1 Estampado2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG1 Estampado2']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG1 Estampado3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG1 Estampado3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG1 Estampado3']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<th colspan="4">
					
				</th>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;" align="center">
					H2
				</th>
			</tr>
			<tr>
				<td align="center">
					Placa
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG2 Placa']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Pelicula
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG2 Pelicula']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG2 Arreglo']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
				
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG2 Estampado1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG2 Estampado1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG2 Estampado1']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG2 Estampado2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG2 Estampado2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG2 Estampado2']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG2 Estampado3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosHotStamping['HG2 Estampado3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosHotStamping['HG2 Estampado3']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
	</div>
	<br>
	<div align="center" class="grabado" style="border: 3px solid;">
		<table class="table te">
			<tr>
				<th style="text-align: center;" colspan="2" align="center">
					GRABADO
				</th>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<th colspan="4">
					
				</th>
			</tr>
			<tr>
				<th style="text-align: center;" align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;" align="center">
					G1
				</th>
			</tr>
			<tr>
				<td align="center">
					Placa
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por cm2:
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G1 Placa']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G1 Arreglo']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosGrabado['G1 Estampado1']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosGrabado['G1 Estampado1']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G1 Estampado1']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosGrabado['G1 Estampado2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosGrabado['G1 Estampado2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G1 Estampado2']['precio_unitario']?> MXN</label>
				</td> 
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosGrabado['G1 Estampado3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosGrabado['G1 Estampado3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G1 Estampado3']['precio_unitario']?> MXN</label>
				</td> 
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<th colspan="4">
					
				</th>
			</tr>
			<tr>
				<th style="text-align: center;"align="center">
					Tipo
				</th>
				<th colspan="2" style="text-align: center;" align="center">
					G2
				</th>
			</tr>
			<tr>
				<td align="center">
					Placa
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por cm2:	
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G2 Placa']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="center">
					Arreglo
				</td>
				<td align="center" colspan="2" style="text-align: center;">
					Costo Por Color:
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G2 Arreglo']['precio_unitario']?> MXN</label>
				</td>
			</tr>
		</table>
		<table class="table te" align="center" style="table-layout: fixed;">
			<tr>
				<td align="center" style="text-align: center;">
					Tiro
				</td>
				<td align="center" colspan="2">
					Rango
				</td>
				<td align="center">
					Precio
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td id="lblMinOff" align="center">
					Min
				</td>
				<td align="center">
					Max
				</td>
			</tr>

			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosGrabado['G2 Estampado2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosGrabado['G2 Estampado2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G2 Estampado2']['precio_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosGrabado['G2 Estampado2']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosGrabado['G2 Estampado2']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G2 Estampado2']['precio_unitario']?> MXN</label>
				</td> 
			</tr>
			<tr>
				<td>
					
				</td>
				<td align="center">
					<?= $procesosGrabado['G2 Estampado3']['tiraje_minimo']?>
				</td>
				<td align="center">
					<?= $procesosGrabado['G2 Estampado3']['tiraje_maximo']?>
				</td>
				<td align="center">
					<label><?= $procesosGrabado['G2 Estampado3']['precio_unitario']?> MXN</label>
				</td> 
			</tr>
		</table>
	</div>
	<br>
	<div align="center" class="suaje" style="border: 3px solid;">
		<table class="table te" style="table-layout: fixed;">
			
			<tr>
				<th></th>
				<th align="center">
					<h4 style="text-align: center;">P. Minimo</h4>
				</th>
				<th align="center">
					<h4 style="text-align: center;">Tiro</h4>
				</th>
				<th align="center">
					<h4 style="text-align: center;">Arreglo</h4>
				</th>

				<th align="center">
					<h4 style="text-align: center;">Costo</h4>
				</th>
			</tr>
			</tr>
			<tr>
				<td align="right"><h4>Perimetral</h4></td>
				
				<td align="center">
					<?= $procesosSuaje['Perimetral']['costo_unitario']?>
				</td>
				<td align="center">
					<?= $procesosSuaje['Figura']['costo_unitario']?>MXN
				</td>
				<td align="center">
					<?= $procesosSuaje['Tiro']['costo_unitario']?>MXN
				</td>
				<td align="center">
					<label> <?= $procesosSuaje['Tiro Figura']['costo_unitario']?> MXN</label>
				</td>
			</tr>
			<tr>
				<td align="right"><h4>Figura</h4></td>
				
				<td align="center">
					<?= $procesosSuaje['Arreglo']['costo_unitario']?>
				</td>
				<td align="center">
					<?= $procesosSuaje['Arreglo Figura']['costo_unitario']?>MXN
				</td>
				<td align="center">
					<?= $procesosSuaje['Perimetral']['perimetro_minimo']?>MXN
				</td>
				<td align="center">
					<label> <?= $procesosSuaje['Figura']['perimetro_minimo']?> MXN</label>
				</td>
			</tr>
		</table>
	</div>
</div>
<script type="text/javascript">
	window.print();
		window.addEventListener("afterprint", function(){
    	this.close();
		}, false);
</script>