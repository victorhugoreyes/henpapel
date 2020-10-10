<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
	function actual_date () {  
	    $week_days = array ("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado");  
	    $months = array ("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  
	    $year_now = date ("Y");  
	    $month_now = date ("n");  
	    $day_now = date ("j");  
	    $week_day_now = date ("w");  
	    $date = "Ciudad de México a" . " " . $day_now . " de " . $months[$month_now] . " de " . $year_now;   
	    return $date;    
	} 
?>
<style type="text/css">

	p{
		margin-bottom: 5px;
	}

	header{
		position: relative;
		width: 100%;
	}

	.cabezera{
		position: relative;
		width: 100%;
	}

	.propiedades{
    	width: 100%;
		margin: auto;
	}
	.propiedades h4{
		margin-top: 5px;
		margin-bottom: 5px;
	}
	h4{
		margin: auto;
		margin-bottom: 10px;

	}

	*{
		margin: 20px;
		font-family: "Arial";
		font-size: 14px;
		background: #fff;
	}
	p{
		color: #000;
		text-align: left;
		font-size: 12px;
	}
	.imagen_logo{
    	background-size: 100% 100%;	
    	background-repeat: no-repeat;
    	float: left;
	}
	.contenedor_logo{
    	height: 150px;
    	padding: 0px;
    	margin-bottom: 50px;
	}

	footer{
		float: left;
		position: relative;
		width: 97%;
	}

	.tablaHeader{
		float:right;
		margin-top: 50px;
		margin-right: 50px;
	}
	.precio-imagen{
		float: left;
	}
	.tablaPrecios{
		text-align: center;
		width: 300px;
		height: auto;
		position: static;
		display: flex;
		justify-content: center;
		align-items: center;
		margin: 0px;

	}
	.tablaPrecios p{
		text-align: center;
	}	
	.propiedades_caja{
		float: left;
		position: relative;
		width: 300px;
		margin: 0px;
		display: inline-block;
		position: static;
	}
	.imagen_caja{
		background-repeat: no-repeat;
		width: 300px;
		margin: 0px;
		position:static;
		display: flex;
		justify-content: center;
	}
</style>

<body style="background: #fff;  position: relative;">
	<header class="contenedor_logo">
		<div class="imagen_logo">

			<img src="<?=URL ;?>public/img/logo-hp-con-mini1.png" style="width: 200px;">
		</div>
		<div class="tablaHeader">
			
			<p><?= actual_date(); ?></p>
			<p><strong>Cotizacion:</strong> <?= $rows['odt']?></p>
		</div>
	</header>

	<div>
		<h4>Empresa: <?= $rows['tienda'] ?></h4>
		<h4>Atención</h4>
		<p><?= $rows['cliente']?></p>
		<p style="margin-bottom: 50px;">Aprovecho para saludarle y así mismo para enviarle la siguiente cotización de acuerdo a las especifiaciones indicadas.</p>
	</div>
	<br>
	<hr>
	<br>
	<div class="propiedades">

		<div class="propiedades_caja">

			<p><strong>Producto</strong></p>
			<br>
			<p><strong>Caja: <?= $rows['caja']?>.</strong></p>
			 <p><strong>Tamaño: <?=$rows['base'];?> X <?= $rows['alto']?> X <?= $rows['profundidad']?> cm.</strong></p>
			<br>
			<p><strong>Papeles del empalme cajón: </strong></p>
			<p><?php
			echo "<ul>";
			for ($i=0; $i < count($papeles['papelInteriorCajon']) ; $i++) {

				echo "<li>";
				echo "<p>".$papeles['papelInteriorCajon'][$i] ."</p>";
				echo "</li>";
			}
			echo "</ul>";
			?>
			</p>
			<p><strong>Papeles del forro cajón: </strong></p>
			<p><?php
				echo "<ul>";
				for ($i=0; $i < count($papeles['papelExteriorCajon']) ; $i++) {

					echo "<li>";
					echo"<p>" . $papeles['papelExteriorCajon'][$i] ."</p>";
					echo "</li>";
				}
				echo "</ul>";
				?>
			</p>
			<p><strong>Papeles del forro de la cartera: </strong></p>
			<p><?php
				echo "<ul>";
				for ($i=0; $i < count($papeles['papelExteriorCartera']) ; $i++) {

					echo "<li>";
					echo "<p>" . $papeles['papelExteriorCartera'][$i] ."</p>";
					echo "</li>";
				}
				echo "</ul>";
				?>
			</p>
			<p><strong>Papeles del forro de la guarda:</strong></p>
			<p><?php
				echo "<ul>";
				for ($i=0; $i < count($papeles['papelInteriorCartera']) ; $i++) {

					echo "<li>";
					echo "<p>" . $papeles['papelInteriorCartera'][$i] ."</p>";
					echo "</li>";
				}
				echo "</ul>";
				?>
			</p>
		</div>

		<div class="precio-imagen">
			<div class="tablaPrecios">
				<table style="position: static;">
					<tr>
						<td>
							<p>Cantidad</p>
						</td>
						<td>
							<p>Costo Unitario</p>
						</td>
						<td>
							<p>Total</p>
						</td>
					</tr>
					<tr>
						<td style="border-right: 1px solid;">
							<strong><?= $rows['cantidad']?></strong>
						</td>
						<td style="border-right: 1px solid;">
							<strong>$<?= $rows['cantidad']?></strong>
						</td>
						<td>
							<strong>$<?= $rows['total']?></strong>
						</td>
					</tr>
				</table>
			</div>

			<div class="imagen_caja">
				<?php

				if($rows['caja']=='Almeja'){
						echo "<img src='" . URL . "public/img/tapa.png'style='width: 200px; display:block;'>";
					}elseif ($rows['caja']=='Circular') {
						echo "<img src='" . URL . "public/img/2.png'style='width:90%; height: auto;'>";
					}elseif ($rows['caja']=='Libro') {
						echo "<img src='" . URL . "public/images/libro/libro.jpeg'style='width:90%; height: auto;'>";
					}elseif ($rows['caja']=='Regalo') {
						echo "<img src='" . URL . "public/img/4.png'style='width:90%; height: auto;'>";
					}elseif ($rows['caja']=='Marco Interno') {
						echo "<img src='" . URL . "public/images/marco/marcointerno.jpeg'style='width:90%; height: auto;'>";
					}elseif ($rows['caja']=='Cerillera') {
						echo "<img src='" . URL . "public/images/cerillera/cerillera.jpeg'style='width:90%; height: auto;'>";
					}elseif ($rows['caja']=='Vino') {
						echo "<img src='" . URL . "public/images/vino/vino.jpeg'style='width:90%; height: auto;'>";
					}
				?>
			</div>
			
		</div>

		
	</div>
	<footer style="background: #fff;">
		<p>
			Puede cambiar SIN PREVIO AVISO debido a la volatilidad del dolar
		</p>
		<p>Los precios antes mencionados no incluen I.V.A.</p>
		<br>
		<hr>
		<br>
		<p><strong>Formatos Aceptados:</strong></p>
		<p>InDesign, Illustrator, Photoshop, Page Maker, CorelDraw.</p>
		<p>Se requiere autorización de arte.</p>
		<br>
		<p>Esperando la presente le sea de utilidad, quedo a sus órdenes en espera de su atenta respuesta.</p>
	</footer>
</body>