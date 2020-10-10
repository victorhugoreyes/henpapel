<!DOCTYPE html>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="<?=URL?>public/css/cotizador.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
	
	p{

		font-size: 10px;
	}
	.izquierdo{

		float: left;
		display: block;
		width:68%;
		height: 100%;
	}

	.derecho{

		float: right;
		display: block;
		width: 28%;
		height: 100%;
	}
	td{

		border: 1px #000 solid;
		height: 5px;
	}
</style>
<html>
	<head>
		<title>datos</title>
		
	</head>
	<body>

		<div class="izquierdo">
			
			<?php

				setlocale(LC_ALL, "es_ES");
	        	$meses = ['Enero', 'Febrero', 'Marzo' , 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
	        	$nMes = intval(date("m"))-1;
	        	$mes = $meses[$nMes];

	        	$fecha = "Ciudad de Mexico, " . date("d") . " de " . $mes . " del " . date("Y");

			?>
			<p style="margin-bottom: 10%; margin-top: 10px;"><?= $fecha;?></p>

			<p><?= strtoupper($cotizaciones[0]['nombre']); ?></p>
			<p>TDI</p>

			<p style="margin-bottom: 15px;">por medio de la presente, me permito presentar la siguiente cotización:</p>		

			<table class="table" style="">
				<tr style="background-color: #173756; color: white; height: 10px;">
					<th style="width: 20%;"><p>ESPECIFICACIONES<br>PRODUCTO</p></th>
					<th style="width: 10%;"><p>ODT</p></th>
					<th style="width: 10%;"><p>CANTIDAD</p></th>
					<th style="width: 10%;"><p>PRECIO<br>UNITARIO</p></th>
					<th style="width: 10%;"><p>IVA</p></th>
					<th style="width: 10%;"><p>TOTAL</p></th>
				</tr>
				<!--<tr style="background-color: #173756; color: white; height: 10px;">
					<th><p>PRODUCTO</p></th>
					<th><p></p></th>
					<th><p></p></th>
					<th><p>UNITARIO</p></th>
					<th><p></p></th>
					<th><p></p></th>
				</tr>-->

				<?php

					foreach ($cotizaciones as $row) {?>

						<tr>
							
							<td><p><?=$row['descripcion']?></p></td>
							<td><p><?=$row['odt']?></p></td>
							<td><p><?=$row['cantidad']?></p></td>
							<td><p>$<?=round(floatval($row['precio']),2)?></p></td>
							<td><p>$<?=round(floatval($row['iva']),2)?></p></td>
							<td><p>$<?=round(floatval($row['monto']),2)?></p></td>
						</tr>
				<?php
					}
				?>
				<tr>
					
					<td style="border: none;"></td>
					<td style="border: none;"></td>
					<td colspan="2">
						<p>Precio Total</p>
					</td>
						
					<td>
						<p>$<?= $cotizaciones[0]['iva_total']; ?></p>
					</td>
					<td>
						<p>$<?= $cotizaciones[0]['monto_total']; ?></p>
					</td>
				</tr>
			</table>

			<p style="margin-top: 10px;">Tiempo de entrega 12 dias habiles a partir de la autorización de originales y recepción del anticipo</p>

			<a href="historiasenpapel.com" style="text-decoration: underline; font-size: 10px; color: blue;">Forma de pago: %50 Anticipo %50 Contra entrega</a>
			
			<p style="font-size: 9px;">Angeles Calderón Chavolla</p>
			<p style="font-size: 9px;">Dirección de Imagen Historias en Papel</p>

			<a href="historiasenpapel.com" style="text-decoration: underline; font-size: 9px; color: blue;">www.historiasenpapel.com</a>
			<br>
			<a href="historiasenpapel.com" style="text-decoration: underline; font-size: 10px; color: blue;">angeles@historiasenpapel.com</a>

		</div>

		<div class="derecho">
			
			<img src="public/img/marca1.png" style="width: 80%; margin-top: 65px;">
		</div>
		
	</body>
</html>