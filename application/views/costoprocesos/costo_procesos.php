<style type="text/css">

	@keyframes rotate {
		from {transform: rotate(1deg);}
    	to {transform: rotate(360deg);}
    }

	@-webkit-keyframes rotate {
		from {-webkit-transform: rotate(1deg);}
  		to {-webkit-transform: rotate(360deg);}
  	}
  	
	.imgr{
	    -webkit-animation: 2s rotate linear infinite;
	    animation: 2s rotate linear infinite;
	    -webkit-transform-origin: 50% 50%;
	    transform-origin: 50% 50%;
	}
	.posicion{

		position: absolute;
		display: block;
		width: 100%;
		height: 100%;
	}
	.mod{
		color: #fff;
		font-size: 30px;
		display: flex;
		align-items: center;
		justify-content: center; 
 		position: fixed; 
 		z-index: 1; 
 		padding-top: 100px; 
 		left: 0;
 		top: 0;
 		width: 100%; 
 		height: 100%; 
 		overflow: auto;
 		background-color: rgba(0,0,0,0.7); 
	}
	table{
		border-collapse: collapse;
		width: 100%;
		padding: 0px;
		margin: 0px;
	}
	.idInit{

		width: 100%;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.btnPrinc{
		display: flex;
		justify-content: center;
		align-items: center;
		position: relative;
		width: 25%;
		height: 25%;
		float: left;
	}
	.menu-left{
		background-color: #2A3F54;
		position: absolute;
		display: block;
		width: 15%;
		height: 92%;
		overflow: auto;
		overflow-x: hidden;
	}
	.menu-s{
		align-items: center;
		justify-content: center;
		background-color: #2A3F54;
		position: fixed;
		width: 80%;
		height: 96%;
		overflow: auto;
		overflow-x: hidden;
	}
	.menu-right{
		position: relative;
		display: block;
		width: 84%;
		height: 90%;
		float: right;
		overflow: auto;
	}
	body{
		display: block;
  		flex-direction: column;
  		overflow-y: hidden;
  		width: 100%;
  		height: 100%;
	}
	.boton{
		width:100%;
		height:60px;
		text-align: left;
		display: block;	
		background-color: #2A3F54;
		color: #fff;
		font-size: 16px;
		border: none;
		cursor: pointer;
	}

	.boton:hover {
		background: #fff;
		color: #000;
	}
	.boton2{
		background: #556D85;
		width:100%;
		height:30px;
		border: none;
		color: #DEDEDE;
		font-size: 14px;
		cursor: pointer;
		text-align:left;
		padding-left: 15%;
	}

	.boton2:hover{
		background: #fff;
		color: #000;
	}
	ul{
		list-style: none;
		margin: 0px;
	}
	li{
		list-style: none;
	}
	.formulario{
		margin-left: auto;
		margin-right: auto;
		width: 98%;
		height: 98%;
		margin-top: 1%;
		margin-bottom: 1%;
		border: 1px solid rgb(0,0,0,.2); 
		border-radius: 9px;
		background: #D7D7D7;
		text-align: center;
	}
	h4, input, select, label{
		margin-bottom: 0px;
		font-size: 17px;
		margin-top: 5px;
		border: none;
		border-radius: 2px;
		color: #212939;
		width: 120px;
		text-align: center;
	}
	h4{
		text-align: left;	
	}
	.btnModificar{
		cursor: pointer;
		width: 300px;
		height: 35px;
		background: #272B34;
		color: #fff;
		border: none;
		border-radius: 9px;
		margin-bottom: 10px;
	}
	.btnModificar:hover{
		background: #2F3541;
	}
	p{
		margin-top: 20px;
		color: #212939;
		font-size: 25px;
		font-weight: bold;
		margin-bottom: 20px;
	}
	.titulo{
		margin-top: 40px;
		display: flex;
		justify-content: center;
		align-items: center;
		background: #46607B;
		border-radius: 9px;
		margin-left: 10%;
		margin-right: 10%;
		width: 80%;
		height: 60px;
		margin-bottom: 40px;	
	}
	.seccion{
		display: flex;
		justify-content: center;
		align-items: center;
		background: #46607B;
		border-radius: 9px;
		margin-left: 15%;
		margin-right: 15%;
		width: 70%;
		height: auto;
		margin-bottom:10px;
		margin-top: 10px;
	}
	.seccion p, h4, label{
		color: #D9D9D9;
	}

	.aForms{

		display: none;
		height: 80%;
	}
</style>

<div class="posicion">

	<div class="menu-left">
		<button id="btnCorte" name="Corte" class="boton" onclick="hideForm('btnCorte','formCorte','tipoProcesoCor');">Corte</button>
		<button class="boton" onclick="show('idOffset')">Offset</button>
		<div id="idOffset" style="display: none;">

			<button id="btnOffNormal" name=" Offset Normal" class="boton2" onclick="hideForm('btnOffNormal','formOffset','tipoProcesoOff');">Normal</button>

			<button id="btnOffPantone" name="Offset Pantone" class="boton2" onclick="hideForm('btnOffPantone','formOffset','tipoProcesoOff');">Pantone</button>

			<button id="btnOffMaquila" name="Offset Maquila" class="boton2" onclick="hideForm('btnOffMaquila','formOffset','tipoProcesoOff');">Maquila</button>

			<button id="btnOffMaquilaPantone" name=" Offset Maquila Pantone" class="boton2" onclick="hideForm('btnOffMaquilaPantone','formOffset','tipoProcesoOff');">Maquila Pantone</button>
		</div>
		<button class="boton" onclick="show('idSerigrafia'); ">Serigrafia</button>
		<div id="idSerigrafia" style="display: none;">

			<button id="btnSerNormal" name=" Serigrafia Normal" class="boton2" onclick="hideForm('btnSerNormal','formSerigrafia','tipoProcesoSer');">Normal</button>

			<button id="btnSerPantone" name="Serigrafia Pantone" class="boton2" onclick="hideForm('btnSerPantone','formSerigrafia','tipoProcesoSer');">Pantone</button>
		</div>
		<button id="btnDigital" name="Digital" class="boton" onclick="hideForm('btnDigital','formDigital','tipoProcesoDig');">Digital</button>

		<button id="btnLaminado" name="Laminado" class="boton" onclick="hideForm('btnLaminado','formLaminado','tipoProcesoLam')">Laminado</button>
		
		<button id="btnCorLas" name="Corte Laser" class="boton" onclick="hideForm('btnCorLas','formCorteLaser','tipoProcesoCor')">Corte Laser</button>
		
		<button class="boton" onclick="show('idHotStamping')">Hot Stamping</button>
		<div id="idHotStamping" style="display: none;">

			<button id="btnHotH" name="Hot Stamping H" class="boton2" onclick="hideForm('btnHotH','formHotStamping','tipoProcesoHot')">H</button>
			<button id="btnHotH1" name="Hot Stamping H1" class="boton2" onclick="hideForm('btnHotH1','formHotStamping','tipoProcesoHot')">HG1</button>
			<button id="btnHotH2" name="Hot Stamping H2" class="boton2" onclick="hideForm('btnHotH2','formHotStamping','tipoProcesoHot')">HG2</button>
		</div>
		<button class="boton" onclick="show('idGrabado')">Grabado</button>
		<div id="idGrabado" style="display: none;">
			<button id="btnGraG1" name="Grabado G1" class="boton2" onclick="hideForm('btnGraG1','formGrabado','tipoProcesoGra')">G1</button>
			<button id="btnGraG2" name="Grabado G2" class="boton2" onclick="hideForm('btnGraG2','formGrabado','tipoProcesoGra')">G2</button>
		</div>
		<button id="btnSuaje" name="Suaje" class="boton" onclick="hideForm('btnSuaje','formSuaje','tipoProcesoSua')">Suaje</button>
	</div>

	<div class="menu-right">

		<div class="titulo">

			<p id="txtTitulo" style="color: #fff;">Procedimientos</p>
		</div>

		<div id="principal" style="display: none;" class="mod">
			<img id="rotate1" class="imgr" style="width: 80px; height: 80px;" src="<?= URL?>public/img/cargando.png">
			Cargando...
		</div>

		<div id="formCorte" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcCor/" method="POST">
			<div class="formulario">

				<div class="seccion" id="LamCor">

					<table>
						<tr>
							<td align="center">
								<h4>Costo por Millar:</h4>
							</td>
							<td align="center">
								<input style="width: 60px;" onkeyup="asignaNum();" type="text" id="txtCosCor" name="txtCosCor" placeholder="Costo Unitario"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdCorte" name="txtIdCorte">
							</td>
						</tr>

					</table>
					<input type="text" id="tipoProcesoCor" name="tipoProcesoCor" style="display: none">	

				</div>
				<input type="submit" onclick="opacidad();" name="btnAceptarCor" value="Modificar" class="btnModificar">
			</div>	
			</form>
		</div>

		<div id="idInit" class="idInit">
			<div class="btnPrinc">
				
			</div>
			<div class="btnPrinc">
				<span class="codigo">
					<button id="btnImpresion" style="border:none; background: #fff;">
					<img src="<?=URL?>public/img/impresion.png"></button>
				</span>
			</div>
			<div class="btnPrinc">
				
			</div>
		</div>

		<div id="formOffset" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcOff/" method="POST">
			<div class="formulario">

				<div class="seccion" id="Lamina">

					<table>
						<tr>
							<th align="center" colspan="2">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Lamina</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo Por Color:</h4>
							</td>
							<td align="center">
								<input style="width: 60px;" onkeyup="asignaNum();" type="text" id="txtCosOffLam" name="txtCosOffLam" placeholder="Costo Unitario"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdLamOffset" name="txtIdLamOffset">
							</td>
						</tr>
					</table>
				</div>

				<div class="seccion" id="Arreglo">
					<table>
						<tr>
							<th align="center" colspan="2">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Arreglo</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo Por Color:</h4>
							</td>
							<td align="center">
								<input style="width: 60px;" onkeyup="asignaNum();" type="text" id="txtCosOffArr" name="txtCosOffArr" placeholder="Costo Unitario"><label> MXN</label>
							</td>
						</tr>
						<tr>
							<td align="center">
								<h4 id="lblTirMin">Tiraje Minimo: </h4>
							</td>
							<td align="center">
								<input style="width: 60px;" onkeyup="asignaNum();" type="text" id="txtTirMinOff" name="txtTirMinOff" placeholder="Ingrese Tiraje Minimo">
							</td>
						</tr>
						<tr>
							<td align="center">
								<h4 id="lblTirMax">Tiraje Maximo: </h4>
							</td>
							<td align="center">
								<input style="width: 60px;" onkeyup="asignaNum();" type="text" id="txtTirMaxOff" name="txtTirMaxOff" placeholder="Ingrese Tiraje Maximo">
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdArrOffset" name="txtIdArrOffset">
							</td>
						</tr>
						
					</table>
				</div>

				<div class="seccion" id="Tiro">
					<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Tiro</p>
							</th>
						</tr>
						
						<tr>
							<td align="center">
								<h4 id="lblCosMillCol">Costo Por Millar Por Color:</h4>
							</td>
							<td align="center" colspan="2">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosOffTir" name="txtCosOffTir" placeholder="Costo Unitario"><label id="lblCosMillCol1"> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirOffset1" name="txtIdTirOffset1">
							</td>
						</tr>
						<tr>
							<th align="center" colspan="2">
								<h4 id="lblRanOff" style="text-align: center;">Rango</h4>
							</th>
							<th align="center">
								<h4 id="lblPreOff" style="text-align: center;">Precio</h4>
							</th>
						</tr>
						<tr>
							<th id="lblMinOff" align="center">
								<h4 style="text-align: center;">Min</h4>
							</th>
							<th align="center">
								<h4 id="lblMaxOff" style="text-align: center;">Max</h4>
							</th>
						</tr>

						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangOff11" name="txtRangOff11" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangOff12" name="txtRangOff12" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniOff1" name="txtCosUniOff1" placeholder="Precio Frente"><label id="lblTirOff1"> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirOffset2" name="txtIdTirOffset2">
							</td>
						</tr>
						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangOff21" name="txtRangOff21" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangOff22" name="txtRangOff22" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniOff2" name="txtCosUniOff2" placeholder="Precio Frente"><label id="lblTirOff2"> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirOffset3" name="txtIdTirOffset3">
							</td>	 
						</tr>
						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangOff31" name="txtRangOff31" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangOff32" name="txtRangOff32" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniOff3" name="txtCosUniOff3" placeholder="Precio Frente"><label id="lblTirOff3"> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirOffset4" name="txtIdTirOffset4">
							</td> 
						</tr>
					</table>
					<input type="text" id="tipoProcesoOff" name="tipoProcesoOff" style="display: none">

					<input type="text" id="usuarioOff" name="usuarioOff" value="<?=$_SESSION['id_usuario']?>" style="display: none">	
				</div>
				<input type="submit" onclick="opacidad();" name="btnAceptarOff" value="Modificar" class="btnModificar">
			</div>	
			</form>
		</div>

		<div id="formSerigrafia" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcSer/" method="POST">
				<div class="formulario">
					<div class="seccion" id="ArregloSer">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Arreglo</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo Por Color:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosSerArr" name="txtCosSerArr" placeholder="Costo Unitario"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdArrSerigrafia" name="txtIdArrSerigrafia">
							</td>
						</tr>
						</table>
					</div>
					<div class="seccion" id="TiroSer">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Tiro</p>
							</th>
						</tr>
						<tr>
							<th align="center" colspan="2">
								<h4 id="lblRanSer" style="text-align: center;">Rango</h4>
							</th>
							<th align="center">
								<h4 id="lblPreSer" style="text-align: center;">Precio</h4>
							</th>
						</tr>
						<tr>
							<th id="lblMinSer" align="center">
								<h4 style="text-align: center;">Min</h4>
							</th>
							<th align="center">
								<h4 id="lblMaxSer" style="text-align: center;">Max</h4>
							</th>
						</tr>

						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;"  type="text" id="txtRangSer11" name="txtRangSer11" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer12" name="txtRangSer12" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniSer1" name="txtCosUniSer1" placeholder="Precio Frente"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirSerigrafia1" name="txtIdTirSerigrafia1">
							</td> 
						</tr>
						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer21" name="txtRangSer21" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer22" name="txtRangSer22" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniSer2" name="txtCosUniSer2" placeholder="Precio Frente"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirSerigrafia2" name="txtIdTirSerigrafia2">
							</td> 
						</tr>
						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer31" name="txtRangSer31" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer32" name="txtRangSer32" placeholder="Rango">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniSer3" name="txtCosUniSer3" placeholder="Precio Frente"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirSerigrafia3" name="txtIdTirSerigrafia3">
							</td>
						</tr>
						<tr>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer41" name="txtRangSer41" placeholder="Rango 4">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRangSer42" name="txtRangSer42" placeholder="Rango 4">
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosUniSer4" name="txtCosUniSer4" placeholder="Precio Frente"><label> MXN</label>
							</td>
							<td style="display: none;">
								<input type="text" id="txtIdTirSerigrafia4" name="txtIdTirSerigrafia4">
							</td>
						</tr>
						</table>
						<input type="text" id="tipoProcesoSer" name="tipoProcesoSer" style="display: none;">

						<input type="text" id="usuarioSer" name="usuarioSer" value="<?=$_SESSION['id_usuario']?>" style="display: none">
					</div>
					<input type="submit" onclick="opacidad();" name="btnAceptarSer" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>

		<div id="formDigital" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcDig/" method="POST">
				<div class="formulario">

					<div class="seccion" id="ArregloDig">
						<table>
							<tr>
								<th colspan="2" align="center">
									
								</th>
								<th colspan="2" align="center">
									<h4 style="text-align: center;">Carta</h4>
								</th>
								<th colspan="2" align="center">
									<h4 style="text-align: center;">Doble Carta</h4>
								</th>
							</tr>
							<tr>
								<th align="center" colspan="2" style="border-right: 1px solid;">
									<h4 style="text-align: center;">Rango</h4>
								</th>
								<th align="center">
									<h4>Frente</h4>
								</th>
								<th align="center" style="border-right: 1px solid;">
									<h4>Frente Vuelta</h4>
								</th>
								<th align="center">
									<h4>Frente</h4>
								</th>
								<th align="center">
									<h4>Frente Vuelta</h4>
								</th>
							</tr>
							<tr>
								<th align="center">
									<h4 style="text-align: center;">Min</h4>
								</th>
								<th align="center" style="border-right: 1px solid;">
									<h4 style="text-align: center;">Max</h4>
								</th>
								<th colspan="2" style="border-right: 1px solid;">
									
								</th>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinDig1" name="txtRanMinDig1" placeholder="Rango">
								</td>
								<td align="center" style="border-right: 1px solid;">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxDig1" name="txtRanMaxDig1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosFreDig11" name="txtCosFreDig11" placeholder="Precio Frente"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdFreDigital1" name="txtIdFreDigital1">
								</td>
								<td align="center" style="border-right: 1px solid;">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosVueDig11" name="txtCosVueDig11" placeholder="Precio Vuelta"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdVueDigital1" name="txtIdVueDigital1">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosFreDig12" name="txtCosFreDig12" placeholder="Precio Frente"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdFreDigital2" name="txtIdFreDigital2">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosVueDig12" name="txtCosVueDig12" placeholder="Precio Vuelta"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdVueDigital2" name="txtIdVueDigital2">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinDig2" name="txtRanMinDig2" placeholder="Rango">
								</td>
								<td align="center" style="border-right: 1px solid;">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxDig2" name="txtRanMaxDig2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosFreDig21" name="txtCosFreDig21" placeholder="Precio Frente"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdFreDigital3" name="txtIdFreDigital3">
								</td>
								<td align="center" style="border-right: 1px solid;">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosVueDig21" name="txtCosVueDig21" placeholder="Precio Vuelta"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdVueDigital3" name="txtIdVueDigital3">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosFreDig22" name="txtCosFreDig22" placeholder="Precio Frente"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdFreDigital4" name="txtIdFreDigital4">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosVueDig22" name="txtCosVueDig22" placeholder="Precio Vuelta"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdVueDigital4" name="txtIdVueDigital4">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinDig3" name="txtRanMinDig3" placeholder="Rango">
								</td>
								<td align="center" style="border-right: 1px solid;">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxDig3" name="txtRanMaxDig3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosFreDig31" name="txtCosFreDig31" placeholder="Precio Frente"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdFreDigital5" name="txtIdFreDigital5">
								</td>
								<td align="center" style="border-right: 1px solid;">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosVueDig31" name="txtCosVueDig31" placeholder="Precio Vuelta"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdVueDigital5" name="txtIdVueDigital5">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosFreDig32" name="txtCosFreDig32" placeholder="Precio Frente"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdFreDigital6" name="txtIdFreDigital6">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosVueDig32" name="txtCosVueDig32" placeholder="Precio Vuelta"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdVueDigital6" name="txtIdVueDigital6">  
								</td>
							</tr>

						</table>
						<input type="text" id="tipoProcesoDig" name="tipoProcesoDig" style="display: none">

						<input type="text" id="usuarioDig" name="usuarioDig" value="<?=$_SESSION['id_usuario']?>" style="display: none">
					</div>
					<input type="submit" onclick="opacidad();" name="btnAceptarDig" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>
		
		<div id="formLaminado" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcLam/" method="POST">
				<div class="formulario">

					<div class="seccion" id="ArregloDig">
						<table>
							<tr>
								<th>
									
								</th>
								<th align="center" colspan="2">
									<h4 style="text-align: center;">Rango</h4>
								</th>
								<th align="center">
									<h4>Costo Por m2</h4>
								</th>
							</tr>
							<tr>
								<th>
									
								</th>
								<th align="center">
									<h4 style="text-align: center;">Min</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Max</h4>
								</th>
							</tr>
							<tr>
								<td align="right"><h4>Mate</h4></td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinLam1" name="txtRanMinLam1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxLam1" name="txtRanMaxLam1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosLam1" name="txtCosLam1" placeholder="Costo"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdLam1" name="txtIdLam1">
								</td>
							</tr>
							<tr>
								<td align="right"><h4>Soft Touch</h4></td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinLam2" name="txtRanMinLam2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxLam2" name="txtRanMaxLam2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosLam2" name="txtCosLam2" placeholder="Costo"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdLam2" name="txtIdLam2">
								</td>
							</tr>
							<tr>
								<td align="right"><h4>Anti Scratch</h4></td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinLam3" name="txtRanMinLam3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxLam3" name="txtRanMaxLam3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosLam3" name="txtCosLam3" placeholder="Costo"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdLam3" name="txtIdLam3">
								</td>
							</tr>
							<tr>
								<td align="right"><h4>Superadherente</h4></td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMinLam4" name="txtRanMinLam4" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtRanMaxLam4" name="txtRanMaxLam4" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosLam4" name="txtCosLam4" placeholder="Costo"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdLam4" name="txtIdLam4">
								</td>
							</tr>

						</table>
						<input type="text" id="tipoProcesoLam" name="tipoProcesoLam" style="display: none">

						<input type="text" id="usuarioLam" name="usuarioLam" value="<?=$_SESSION['id_usuario']?>" style="display: none">
					</div>
					<input type="submit" onclick="opacidad();" name="btnAceptarDig" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>

		<div id="formCorteLaser" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcCorLas/" method="POST">
				<div class="formulario">
					<div class="seccion" style="width: 80%;">
						<table style="table-layout: fixed;">
							
							<tr>
								<th></th>

								<th align="center" colspan="2">
									<h4 style="text-align: center;">Figura</h4>
								</th>
								<th align="center" colspan="2">
									<h4 style="text-align: center;">Ranura</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Personalizada</h4>
								</th>
							</tr>
							<tr>
								<th></th>
								<th align="center">
									<h4 style="text-align: center;">Sencilla</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Detallada</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Sencilla</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Detallada</h4>
								</th>
								<th align="center">
									
								</th>
							</tr>
							<tr>
								<th><h4 style="text-align: right;">Tiempo</h4></th>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasT1" name="txtCosCorLasT1" placeholder="Tiempo">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasT2" name="txtCosCorLasT2" placeholder="Tiempo">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasT3" name="txtCosCorLasT3" placeholder="Tiempo">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasT4" name="txtCosCorLasT4" placeholder="Tiempo">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasT5" name="txtCosCorLasT5" placeholder="Tiempo">
								</td>
							</tr>
							<tr>
								<th><h4 style="text-align: right;">Costo Unitario:</h4></th>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasC1" name="txtCosCorLasC1" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdSenLaser1" name="txtIdSenLaser1">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasC2" name="txtCosCorLasC2" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdDetLaser1" name="txtIdDetLaser1">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasC3" name="txtCosCorLasC3" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdSenLaser2" name="txtIdSenLaser2">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasC4" name="txtCosCorLasC4" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdDetLaser2" name="txtIdDetLaser2">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosCorLasC5" name="txtCosCorLasC5" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display: none;">
									<input type="text" id="txtIdPerLaser" name="txtIdPerLaser">
								</td>
							</tr>	
							
						</table>
						<input  type="text" id="tipoProcesoCorLas" name="tipoProcesoCorLas" style="display: none;">
					</div>
					<input type="submit" onclick="opacidad();"  name="btnAceptarCorLas" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>

		<div id="formHotStamping" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcHotStam/" method="POST">
				<div class="formulario">
					<div class="seccion" id="HotStamPlac">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Placa</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo Por cm2:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosHotPlac" name="txtCosHotPlac" placeholder="Costo Unitario"><label> MXN</label>
							</td>
						</tr>
						<tr>
							<td align="center">
								<h4>Tamaño Minimo:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtTamHot" name="txtTamHot" placeholder="Tamaño Minimo"><label> cm2</label>	
							</td>
							<td style="display:none;">
								<input type="text" id="txtIdPlaHS" name="txtIdPlaHS">
							</td>
						</tr>

						</table>
					</div>
					<div class="seccion" id="HotStamPel">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Pelicula</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo Por cm2:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosHotPel" name="txtCosHotPel" placeholder="Costo Unitario"><label> MXN</label>
							</td>
							<td style="display:none;">
								<input type="text" id="txtIdPelHS" name="txtIdPelHS">
							</td>
						</tr>
						</table>
					</div>

					<div class="seccion" id="HotStamArr">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Arreglo</p>
							</th>
							
						</tr>
						<tr>
							<td align="center">
								<h4>Costo:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosHotArr" name="txtCosHotArr" placeholder="Costo Unitario"><label> MXN</label>
							</td>
							<td style="display:none;">
								<input type="text" id="txtIdArrHS" name="txtIdArrHS">
							</td>
						</tr>
						</table>
					</div>
					<div class="seccion" id="HotStamTir">
						<table>
							<tr>
								<th align="center" colspan="3">
									<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Tiro</p>
								</th>
							</tr>
							<tr>
								<th align="center" colspan="2">
									<h4 style="text-align: center;">Rango</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Precio</h4>
								</th>
							</tr>
							<tr>
								<th align="center">
									<h4 style="text-align: center;">Min</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Max</h4>
								</th>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMinHot1" name="txtMinHot1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMaxHot1" name="txtMaxHot1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosHot1" name="txtCosHot1" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdTirHS1" name="txtIdTirHS1">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMinHot2" name="txtMinHot2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMaxHot2" name="txtMaxHot2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosHot2" name="txtCosHot2" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdTirHS2" name="txtIdTirHS2">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMinHot3" name="txtMinHot3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMaxHot3" name="txtMaxHot3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosHot3" name="txtCosHot3" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdTirHS3" name="txtIdTirHS3">
								</td>
							</tr>
						</table>
						<input type="text" id="tipoProcesoHot" name="tipoProcesoHot" style="display: none">

						<input type="text" id="usuarioHot" name="usuarioHot" value="<?=$_SESSION['id_usuario']?>" style="display: none">
					</div>
					<input type="submit" onclick="opacidad();" id="btnAceptarHot" name="btnAceptarHot" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>

		<div id="formGrabado" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcGra/" method="POST">
				<div class="formulario">
					<div class="seccion" id="HotStamPlac">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Placa</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo por cm2:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosGraPlac" name="txtCosGraPlac" placeholder="Costo Unitario"><label> MXN</label>
							</td>
						</tr>
						<tr>
							<td align="center">
								<h4>Tamaño Minimo:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtTamGra" name="txtTamGra" placeholder="Tamaño Minimo"><label> cm2</label>	
							</td>
							<td style="display:none;">
								<input type="text" id="txtIdPlaG" name="txtIdPlaG">
							</td>
						</tr>
						</table>
						
					</div>
					<div class="seccion" id="HotStamArr">
						<table>
						<tr>
							<th align="center" colspan="3">
								<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Arreglo</p>
							</th>
						</tr>
						<tr>
							<td align="center">
								<h4>Costo:</h4>
							</td>
							<td align="center">
								<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosGraArr" name="txtCosGraArr" placeholder="Costo Unitario"><label> MXN</label>
							</td>
							<td style="display:none;">
								<input type="text" id="txtIdArrG" name="txtIdArrG">
							</td>
						</tr>
						</table>
					</div>
					<div class="seccion" id="HotStamTir">
						<table>
							<tr>
								<th align="center" colspan="3">
									<p style="text-align: center; margin-top: 0px; margin-bottom: 0px;">Tiro</p>
								</th>
							</tr>
							<tr>
								<th align="center" colspan="2">
									<h4 style="text-align: center;">Rango</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Precio</h4>
								</th>
							</tr>
							<tr>
								<th align="center">
									<h4 style="text-align: center;">Min</h4>
								</th>
								<th align="center">
									<h4 style="text-align: center;">Max</h4>
								</th>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMinGra1" name="txtMinGra1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMaxGra1" name="txtMaxGra1" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosGra1" name="txtCosGra1" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdTirG1" name="txtIdTirG1">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMinGra2" name="txtMinGra2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMaxGra2" name="txtMaxGra2" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosGra2" name="txtCosGra2" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdTirG2" name="txtIdTirG2">
								</td>
							</tr>
							<tr>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMinGra3" name="txtMinGra3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtMaxGra3" name="txtMaxGra3" placeholder="Rango">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosGra3" name="txtCosGra3" placeholder="Costo Unitario"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdTirG3" name="txtIdTirG3">
								</td>
							</tr>
						</table>
						<input type="text" id="tipoProcesoGra" name="tipoProcesoGra" style="display: none">	

						<input type="text" id="usuarioGra" name="usuarioGra" value="<?=$_SESSION['id_usuario']?>" style="display: none">
					</div>
					<input type="submit" onclick="opacidad();"  name="btnAceptarHot" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>
				
		<div id="formSuaje" class="aForms">
			<form action="<?php echo URL?>modificaprocesos/updateProcSua/" method="POST">
				<div class="formulario">
					<div class="seccion" id="ArregloDig">
						<table>
							
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
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtPerimetro1" name="txtPerimetro1" placeholder="P. Minimo">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtTiro1" name="txtTiro1" placeholder="Figura"><label> MXN</label>
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtArreglo1" name="txtArreglo1" placeholder="Arreglo"><label> MXN</label>
								</td>

								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosto1" name="txtCosto1" placeholder="Costo"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdPerSuaje" name="txtIdPerSuaje">
								</td>
							</tr>
							<tr>
								<td align="right"><h4>Figura</h4></td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtPerimetro2" name="txtPerimetro2" placeholder="P. Minimo">
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtTiro2" name="txtTiro2" placeholder="Figura"><label> MXN</label>
								</td>
								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtArreglo2" name="txtArreglo2" placeholder="Arreglo"><label> MXN</label>
								</td>

								<td align="center">
									<input onkeyup="asignaNum();" style="width: 60px;" type="text" id="txtCosto2" name="txtCosto2" placeholder="Costo"><label> MXN</label>
								</td>
								<td style="display:none;">
									<input type="text" id="txtIdFigSuaje" name="txtIdFigSuaje">
								</td>
							</tr>
						</table>
						<input type="text" id="tipoProcesoSua" name="tipoProcesoSua" style="display: none">

						<input type="text" id="usuarioSua" name="usuarioSua" value="<?=$_SESSION['id_usuario']?>" style="display: none">
					</div>
					<input type="submit" onclick="opacidad();" name="btnAceptarDig" value="Modificar" class="btnModificar">
				</div>
			</form>
		</div>	
	</div>
</div>

<script>
	var a=0;
	var b;
	lblRangOff1  = document.getElementById('lblRangOff1');
	lblRangOff2  = document.getElementById('lblRangOff2');
	lblTirMin    = document.getElementById('lblTirMin');
	lblTirMax    = document.getElementById('lblTirMax');
	lbltxtTitulo = document.getElementById('txtTitulo');
	divLamina    = document.getElementById('Lamina');
	divArreglo   = document.getElementById('Arreglo');
	divTiro      = document.getElementById('Tiro');
	rotate       = document.getElementById('rotate1');
	prin         = document.getElementById('principal');
	formOff      = document.getElementById('formOffset');
	formSer      = document.getElementById('formSerigrafia');
	formDig      = document.getElementById('formDigital');
	formLam      = document.getElementById('formLaminado');
	formCor      = document.getElementById('formCorteLaser');
	formHot      = document.getElementById('formHotStamping');
	formGra      = document.getElementById('formGrabado');
	formSua      = document.getElementById('formSuaje');
	formInit     = document.getElementById('idInit');

	function hideForm(btn,form,txt){
		btn1=document.getElementById(btn);
		txt1=document.getElementById(txt);
		if (a==0) {
		formInit.style.display  = "none";
		formCorte.style.display = "none";
		formOff.style.display   = "none";
		formSer.style.display   = "none";
		formDig.style.display   = "none";
		formLam.style.display   = "none";
		formGra.style.display   = "none";
		formCor.style.display   = "none";
		formHot.style.display   = "none";
		formSua.style.display   = "none";
		formSwitch              = document.getElementById(form);
		$(formSwitch).show("slow");	
		txt1.value              = btn1.id;
		lbltxtTitulo.innerHTML  = btn1.name;}
		else{
			var opcion = confirm("Ha Hecho un Cambio. ¿Realmente Quiere Salir?");
    		if (opcion == true) {
    			a=0;
        		hideForm(btn,form,txt);
			}
		}
	}

	$("#btnOffNormal").click(function() {
		if(a==0){
		$("#Arreglo").show();
		$("#Lamina").show();
		$("#lblTirOff1").hide();
		$("#lblTirOff2").hide();
		$("#lblTirOff3").hide();
		$("#lblTirMin").show();
		$("#lblTirMax").show();
		$("#txtTirMinOff").show();
		$("#txtTirMaxOff").show();

		$("#txtCosOffTir").show();
		$("#lblCosMillCol").show();
		$("#lblCosMillCol1").show();

		$("#txtRangOff11").hide();
		$("#txtRangOff12").hide();
		$("#txtRangOff22").hide();
		$("#txtRangOff32").hide();
		$("#txtCosUniOff1").hide();
		$("#txtCosUniOff2").hide();
		$("#txtCosUniOff3").hide();
		$("#txtRangOff21").hide();		
		$("#txtRangOff31").hide();
		$("#lblMinOff").hide();
		$("#lblMaxOff").hide();
		$("#lblRanOff").hide();
		$("#lblPreOff").hide();
		txtTirMinOff.value    = "<?= $procesosOffset['Arreglo']['tiraje_minimo']?>";
		txtTirMaxOff.value    = "<?= $procesosOffset['Arreglo']['tiraje_maximo']?>";
		txtCosOffLam.value    = "<?= $procesosOffset['Laminas']['costo_unitario']?>";
		txtCosOffArr.value    = "<?= $procesosOffset['Arreglo']['costo_unitario']?>";
		txtCosOffTir.value    = "<?= $procesosOffset['Tiro']['costo_unitario']?>";
		txtIdLamOffset.value  = "<?= $procesosOffset['Laminas']['id_offset']?>";
		txtIdArrOffset.value  = "<?= $procesosOffset['Arreglo']['id_offset']?>";
		txtIdTirOffset1.value = "<?= $procesosOffset['Tiro']['id_offset']?>";
		}
	});

	$("#btnOffPantone").click(function() {
		if(a==0){
		$("#Arreglo").show();
		$("#Lamina").show();
		$("#lblTirMin").hide();
		$("#lblTirMax").hide();
		$("#txtTirMinOff").hide();
		$("#txtTirMaxOff").hide();
		$("#lblTirOff1").hide();
		$("#lblTirOff2").hide();
		$("#lblTirOff3").hide();
		$("#txtCosOffTir").show();
		$("#lblCosMillCol").show();
		$("#lblCosMillCol1").show();

		$("#txtRangOff11").hide();
		$("#txtRangOff12").hide();
		$("#txtRangOff22").hide();
		$("#txtRangOff32").hide();
		$("#txtCosUniOff1").hide();
		$("#txtCosUniOff2").hide();
		$("#txtCosUniOff3").hide();
		$("#txtRangOff21").hide();		
		$("#txtRangOff31").hide();
		$("#lblMinOff").hide();
		$("#lblMaxOff").hide();
		$("#lblRanOff").hide();
		$("#lblPreOff").hide();
		txtCosOffTir.value    = "<?= $procesosOffset['Tiro Pantone']['costo_unitario']?>";
		txtCosOffArr.value    = "<?= $procesosOffset['Arreglo de Pantone']['costo_unitario']?>";
		txtCosOffLam.value    = "<?= $procesosOffset['Laminas Pantone']['costo_unitario']?>";
		txtIdLamOffset.value  = "<?= $procesosOffset['Laminas Pantone']['id_offset']?>";
		txtIdArrOffset.value  = "<?= $procesosOffset['Arreglo de Pantone']['id_offset']?>";
		txtIdTirOffset1.value = "<?= $procesosOffset['Tiro Pantone']['id_offset']?>";
		}
	});

	$("#btnOffMaquila").click(function(){
		if(a==0){
		$("#Lamina").show();
		$("#Arreglo").show();
		$("#txtCosOffTir").hide();
		$("#lblCosMillCol").hide();
		$("#lblCosMillCol1").hide();

		$("#lblTirOff1").show();
		$("#lblTirOff2").show();
		$("#lblTirOff3").show();

		$("#lblTirMin").hide();
		$("#lblTirMax").hide();
		$("#txtTirMinOff").hide();
		$("#txtTirMaxOff").hide();

		$("#txtRangOff11").show();
		$("#txtRangOff12").show();
		$("#txtRangOff22").show();
		$("#txtRangOff32").show();
		$("#txtCosUniOff1").show();
		$("#txtCosUniOff2").show();
		$("#txtCosUniOff3").show();
		$("#txtRangOff21").show();		
		$("#txtRangOff31").show();
		$("#lblMinOff").show();
		$("#lblMaxOff").show();
		$("#lblRanOff").show();
		$("#lblPreOff").show();
		txtCosOffLam.value    = "<?= $procesosOffset['Maquila Lamina']['costo_unitario']?>";
		txtCosOffArr.value    = "<?= $procesosOffset['Maquila Arreglo']['costo_unitario']?>";
		txtRangOff11.value    = "<?= $procesosOffset['Maquila1']['tiraje_minimo']?>";
		txtRangOff12.value    = "<?= $procesosOffset['Maquila1']['tiraje_maximo']?>";
		txtRangOff21.value    = "<?= $procesosOffset['Maquila2']['tiraje_minimo']?>";
		txtRangOff22.value    = "<?= $procesosOffset['Maquila2']['tiraje_maximo']?>";
		txtRangOff31.value    = "<?= $procesosOffset['Maquila3']['tiraje_minimo']?>";
		txtRangOff32.value    = "<?= $procesosOffset['Maquila3']['tiraje_maximo']?>";
		txtCosUniOff1.value   = "<?= $procesosOffset['Maquila1']['costo_unitario']?>";
		txtCosUniOff2.value   = "<?= $procesosOffset['Maquila2']['costo_unitario']?>";
		txtCosUniOff3.value   = "<?= $procesosOffset['Maquila3']['costo_unitario']?>";
		txtIdLamOffset.value  = "<?= $procesosOffset['Maquila Lamina']['id_offset']?>";
		txtIdArrOffset.value  = "<?= $procesosOffset['Maquila Arreglo']['id_offset']?>";
		txtIdTirOffset2.value = "<?= $procesosOffset['Maquila1']['id_offset']?>";
		txtIdTirOffset3.value = "<?= $procesosOffset['Maquila2']['id_offset']?>";
		txtIdTirOffset4.value = "<?= $procesosOffset['Maquila3']['id_offset']?>";
		}
	});

	$("#btnOffMaquilaPantone").click(function(){
		if(a==0){
		$("#Lamina").show();
		$("#Arreglo").show();
		$("#txtCosOffTir").hide();
		$("#lblCosMillCol").hide();
		$("#lblCosMillCol1").hide();

		$("#lblTirOff1").show();
		$("#lblTirOff2").show();
		$("#lblTirOff3").show();

		$("#lblTirMin").hide();
		$("#lblTirMax").hide();
		$("#txtTirMinOff").hide();
		$("#txtTirMaxOff").hide();

		$("#txtRangOff11").show();
		$("#txtRangOff12").show();
		$("#txtRangOff22").show();
		$("#txtRangOff32").show();
		$("#txtCosUniOff1").show();
		$("#txtCosUniOff2").show();
		$("#txtCosUniOff3").show();
		$("#txtRangOff21").show();		
		$("#txtRangOff31").show();
		$("#lblMinOff").show();
		$("#lblMaxOff").show();
		$("#lblRanOff").show();
		$("#lblPreOff").show();
		txtCosOffArr.value    = "<?= $procesosOffset['Maquila Arreglo Pantone']['costo_unitario']?>";
		txtRangOff11.value    = "<?= $procesosOffset['Maquila Pantone1']['tiraje_minimo']?>";
		txtRangOff12.value    = "<?= $procesosOffset['Maquila Pantone1']['tiraje_maximo']?>";
		txtRangOff21.value    = "<?= $procesosOffset['Maquila Pantone2']['tiraje_minimo']?>";
		txtRangOff22.value    = "<?= $procesosOffset['Maquila Pantone2']['tiraje_maximo']?>";
		txtRangOff31.value    = "<?= $procesosOffset['Maquila Pantone3']['tiraje_minimo']?>";
		txtRangOff32.value    = "<?= $procesosOffset['Maquila Pantone3']['tiraje_maximo']?>";
		txtCosUniOff1.value   = "<?= $procesosOffset['Maquila Pantone1']['costo_unitario']?>";
		txtCosUniOff2.value   = "<?= $procesosOffset['Maquila Pantone2']['costo_unitario']?>";
		txtCosUniOff3.value   = "<?= $procesosOffset['Maquila Pantone3']['costo_unitario']?>";
		txtCosOffLam.value    = "<?= $procesosOffset['Maquila Lamina Pantone']['costo_unitario']?>";
		txtIdLamOffset.value  = "<?= $procesosOffset['Maquila Lamina Pantone']['id_offset']?>";
		txtIdArrOffset.value  = "<?= $procesosOffset['Maquila Arreglo Pantone']['id_offset']?>";
		txtIdTirOffset2.value = "<?= $procesosOffset['Maquila Pantone1']['id_offset']?>";
		txtIdTirOffset3.value = "<?= $procesosOffset['Maquila Pantone2']['id_offset']?>";
		txtIdTirOffset4.value = "<?= $procesosOffset['Maquila Pantone3']['id_offset']?>";
		}
	});

	$("#btnCorte").click(function(){
		if (a==0) {
			txtCosCor.value="<?= $procesosOffset['Corte']['costo_unitario']?>";
			txtIdCorte.value="<?= $procesosOffset['Corte']['id_offset']?>";
		}
	});

	$("#btnSerNormal").click(function(){
		if(a==0){
		txtRangSer11.value        = "<?= $procesosSerigrafia['cantidad1']['tiraje_minimo']?>";
		txtRangSer12.value        = "<?= $procesosSerigrafia['cantidad1']['tiraje_maximo']?>";
		txtRangSer21.value        = "<?= $procesosSerigrafia['cantidad2']['tiraje_minimo']?>";
		txtRangSer22.value        = "<?= $procesosSerigrafia['cantidad2']['tiraje_maximo']?>";
		txtRangSer31.value        = "<?= $procesosSerigrafia['cantidad3']['tiraje_minimo']?>";
		txtRangSer32.value        = "<?= $procesosSerigrafia['cantidad3']['tiraje_maximo']?>";
		txtRangSer41.value        = "<?= $procesosSerigrafia['cantidad4']['tiraje_minimo']?>";
		txtRangSer42.value        = "<?= $procesosSerigrafia['cantidad4']['tiraje_maximo']?>";	
		txtCosSerArr.value        = "<?= $procesosSerigrafia['Arreglo']['costo_unitario']?>";
		txtCosUniSer1.value       = "<?= $procesosSerigrafia['cantidad1']['costo_unitario']?>";
		txtCosUniSer2.value       = "<?= $procesosSerigrafia['cantidad2']['costo_unitario']?>";
		txtCosUniSer3.value       = "<?= $procesosSerigrafia['cantidad3']['costo_unitario']?>";
		txtCosUniSer4.value       = "<?= $procesosSerigrafia['cantidad4']['costo_unitario']?>";
		txtIdArrSerigrafia.value  = "<?= $procesosSerigrafia['Arreglo']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia1.value = "<?= $procesosSerigrafia['cantidad1']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia2.value = "<?= $procesosSerigrafia['cantidad2']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia3.value = "<?= $procesosSerigrafia['cantidad3']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia4.value = "<?= $procesosSerigrafia['cantidad4']['id_proc_serigrafia']?>";
		}
	});

	$("#btnSerPantone").click(function(){
		if(a==0){
		<?php
			$i=0;
			foreach ( $procesosSerigrafia as $proc ) {
				$nombre=$proc['nombre'];
			}
		?>
		txtRangSer11.value       ="<?= $procesosSerigrafia['cantidad Pantone1']['tiraje_minimo']?>";
		txtRangSer12.value       ="<?= $procesosSerigrafia['cantidad Pantone1']['tiraje_maximo']?>";
		txtRangSer21.value       ="<?= $procesosSerigrafia['cantidad Pantone2']['tiraje_minimo']?>";
		txtRangSer22.value       ="<?= $procesosSerigrafia['cantidad Pantone2']['tiraje_maximo']?>";
		txtRangSer31.value       ="<?= $procesosSerigrafia['cantidad Pantone3']['tiraje_minimo']?>";
		txtRangSer32.value       ="<?= $procesosSerigrafia['cantidad Pantone3']['tiraje_maximo']?>";
		txtRangSer41.value       ="<?= $procesosSerigrafia['cantidad Pantone4']['tiraje_minimo']?>";
		txtRangSer42.value       ="<?= $procesosSerigrafia['cantidad Pantone4']['tiraje_maximo']?>";
		txtCosSerArr.value       ="<?= $procesosSerigrafia['Arreglo Pantone']['costo_unitario']?>";
		txtCosUniSer1.value      ="<?= $procesosSerigrafia['cantidad Pantone1']['costo_unitario']?>";
		txtCosUniSer2.value      ="<?= $procesosSerigrafia['cantidad Pantone2']['costo_unitario']?>";
		txtCosUniSer3.value      ="<?= $procesosSerigrafia['cantidad Pantone3']['costo_unitario']?>";
		txtCosUniSer4.value      ="<?= $procesosSerigrafia['cantidad Pantone4']['costo_unitario']?>";
		txtIdArrSerigrafia.value  = "<?= $procesosSerigrafia['Arreglo Pantone']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia1.value = "<?= $procesosSerigrafia['cantidad Pantone1']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia2.value = "<?= $procesosSerigrafia['cantidad Pantone2']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia3.value = "<?= $procesosSerigrafia['cantidad Pantone3']['id_proc_serigrafia']?>";
		txtIdTirSerigrafia4.value = "<?= $procesosSerigrafia['cantidad Pantone4']['id_proc_serigrafia']?>";
		}
	});

	$("#btnDigital").click(function(){
		if(a==0){

			
			txtRanMinDig1.value  ="<?= $digital['Frente Carta'][1]['tiraje_minimo']?>";
			txtRanMaxDig1.value  ="<?= $digital['Frente Carta'][1]['tiraje_maximo']?>";
			txtCosFreDig11.value ="<?= $digital['Frente Carta'][1]['costo_unitario']?>";
			txtCosVueDig11.value ="<?= $digital['Vuelta Carta'][1]['costo_unitario']?>";
			txtCosFreDig12.value ="<?= $digital['Frente Doble Carta'][1]['costo_unitario']?>";
			txtCosVueDig12.value ="<?= $digital['Vuelta Doble Carta'][1]['costo_unitario']?>";


			txtRanMinDig2.value  ="<?= $digital['Frente Carta'][2]['tiraje_minimo']?>";
			txtRanMaxDig2.value  ="<?= $digital['Frente Carta'][2]['tiraje_maximo']?>";
			txtCosFreDig21.value ="<?= $digital['Frente Carta'][2]['costo_unitario']?>";
			txtCosVueDig21.value ="<?= $digital['Vuelta Carta'][2]['costo_unitario']?>";
			txtCosFreDig22.value ="<?= $digital['Frente Doble Carta'][2]['costo_unitario']?>";
			txtCosVueDig22.value ="<?= $digital['Vuelta Doble Carta'][2]['costo_unitario']?>";
			
			txtRanMinDig3.value  ="<?= $digital['Frente Carta'][3]['tiraje_minimo']?>";
			txtRanMaxDig3.value  ="<?= $digital['Frente Carta'][3]['tiraje_maximo']?>";
			txtCosFreDig31.value ="<?= $digital['Frente Carta'][3]['costo_unitario']?>";
			txtCosVueDig31.value ="<?= $digital['Vuelta Carta'][3]['costo_unitario']?>";
			txtCosFreDig32.value ="<?= $digital['Frente Doble Carta'][3]['costo_unitario']?>";
			txtCosVueDig32.value ="<?= $digital['Vuelta Doble Carta'][3]['costo_unitario']?>";

			txtIdFreDigital1.value="<?= $digital['Frente Carta'][1]['id_proc_digital']?>";
			txtIdFreDigital2.value="<?= $digital['Frente Doble Carta'][1]['id_proc_digital']?>";
			txtIdFreDigital3.value="<?= $digital['Frente Carta'][2]['id_proc_digital']?>";
			txtIdFreDigital4.value="<?= $digital['Frente Doble Carta'][2]['id_proc_digital']?>";
			txtIdFreDigital5.value="<?= $digital['Frente Carta'][3]['id_proc_digital']?>";
			txtIdFreDigital6.value="<?= $digital['Frente Doble Carta'][3]['id_proc_digital']?>";

			txtIdVueDigital1.value="<?= $digital['Vuelta Carta'][1]['id_proc_digital']?>";
			txtIdVueDigital2.value="<?= $digital['Vuelta Doble Carta'][1]['id_proc_digital']?>";
			txtIdVueDigital3.value="<?= $digital['Vuelta Carta'][2]['id_proc_digital']?>";
			txtIdVueDigital4.value="<?= $digital['Vuelta Doble Carta'][2]['id_proc_digital']?>";
			txtIdVueDigital5.value="<?= $digital['Vuelta Carta'][3]['id_proc_digital']?>";
			txtIdVueDigital6.value="<?= $digital['Vuelta Doble Carta'][3]['id_proc_digital']?>";
		}
	});

	$("#btnHotH").click( function(){
		if(a==0){

			txtCosHotPlac.value = "<?= $procesosHotStamping['Placa']['precio_unitario']?>";
			txtCosHotArr.value  = "<?= $procesosHotStamping['Arreglo']['precio_unitario']?>";
			txtCosHotPel.value  = "<?= $procesosHotStamping['Pelicula']['precio_unitario']?>";
			txtMinHot1.value    = "<?= $procesosHotStamping['Estampado1']['tiraje_minimo']?>";
			txtMaxHot1.value    = "<?= $procesosHotStamping['Estampado1']['tiraje_maximo']?>";
			txtMinHot2.value    = "<?= $procesosHotStamping['Estampado2']['tiraje_minimo']?>";
			txtMaxHot2.value    = "<?= $procesosHotStamping['Estampado2']['tiraje_maximo']?>";
			txtMinHot3.value    = "<?= $procesosHotStamping['Estampado3']['tiraje_minimo']?>";
			txtMaxHot3.value    = "<?= $procesosHotStamping['Estampado3']['tiraje_maximo']?>";
			txtCosHot1.value    = "<?= $procesosHotStamping['Estampado1']['precio_unitario']?>";
			txtCosHot2.value    = "<?= $procesosHotStamping['Estampado2']['precio_unitario']?>";
			txtCosHot3.value    = "<?= $procesosHotStamping['Estampado3']['precio_unitario']?>";
			txtTamHot.value     = "<?= $procesosHotStamping['Placa']['tamano_minimo_placa']?>";
			txtIdPlaHS.value    = "<?= $procesosHotStamping['Placa']['id_hotstamping']?>";
			txtIdArrHS.value    = "<?= $procesosHotStamping['Arreglo']['id_hotstamping']?>";
			txtIdPelHS.value    = "<?= $procesosHotStamping['Pelicula']['id_hotstamping']?>";
			txtIdTirHS1.value   = "<?= $procesosHotStamping['Estampado1']['id_hotstamping']?>";
			txtIdTirHS2.value   = "<?= $procesosHotStamping['Estampado2']['id_hotstamping']?>";
			txtIdTirHS3.value   = "<?= $procesosHotStamping['Estampado3']['id_hotstamping']?>";

		}
	});

	$("#btnHotH1").click( function(){
		if(a==0){
		txtCosHotPlac.value = "<?= $procesosHotStamping['HG1 Placa']['precio_unitario']?>";
		txtCosHotArr.value  = "<?= $procesosHotStamping['HG1 Arreglo']['precio_unitario']?>";
		txtCosHotPel.value  = "<?= $procesosHotStamping['HG1 Pelicula']['precio_unitario']?>";
		txtMinHot1.value    = "<?= $procesosHotStamping['HG1 Estampado1']['tiraje_minimo']?>";
		txtMaxHot1.value    = "<?= $procesosHotStamping['HG1 Estampado1']['tiraje_maximo']?>";
		txtMinHot2.value    = "<?= $procesosHotStamping['HG1 Estampado2']['tiraje_minimo']?>";
		txtMaxHot2.value    = "<?= $procesosHotStamping['HG1 Estampado2']['tiraje_maximo']?>";
		txtMinHot3.value    = "<?= $procesosHotStamping['HG1 Estampado3']['tiraje_minimo']?>";
		txtMaxHot3.value    = "<?= $procesosHotStamping['HG1 Estampado3']['tiraje_maximo']?>";
		txtCosHot1.value    = "<?= $procesosHotStamping['HG1 Estampado1']['precio_unitario']?>";
		txtCosHot2.value    = "<?= $procesosHotStamping['HG1 Estampado2']['precio_unitario']?>";
		txtCosHot3.value    = "<?= $procesosHotStamping['HG1 Estampado3']['precio_unitario']?>";
		txtTamHot.value     = "<?= $procesosHotStamping['Placa']['tamano_minimo_placa']?>";
		txtIdPlaHS.value    = "<?= $procesosHotStamping['HG1 Placa']['id_hotstamping']?>";
		txtIdArrHS.value    = "<?= $procesosHotStamping['HG1 Arreglo']['id_hotstamping']?>";
		txtIdPelHS.value    = "<?= $procesosHotStamping['HG1 Pelicula']['id_hotstamping']?>";
		txtIdTirHS1.value   = "<?= $procesosHotStamping['HG1 Estampado1']['id_hotstamping']?>";
		txtIdTirHS2.value   = "<?= $procesosHotStamping['HG1 Estampado2']['id_hotstamping']?>";
		txtIdTirHS3.value   = "<?= $procesosHotStamping['HG1 Estampado3']['id_hotstamping']?>";
		}
	});

	$("#btnHotH2").click( function(){
		if(a==0){
		txtCosHotPlac.value = "<?= $procesosHotStamping['HG2 Placa']['precio_unitario']?>";
		txtCosHotArr.value  = "<?= $procesosHotStamping['HG2 Arreglo']['precio_unitario']?>";
		txtCosHotPel.value  = "<?= $procesosHotStamping['HG2 Pelicula']['precio_unitario']?>";
		txtMinHot1.value    = "<?= $procesosHotStamping['HG2 Estampado1']['tiraje_minimo']?>";
		txtMaxHot1.value    = "<?= $procesosHotStamping['HG2 Estampado1']['tiraje_maximo']?>";
		txtMinHot2.value    = "<?= $procesosHotStamping['HG2 Estampado2']['tiraje_minimo']?>";
		txtMaxHot2.value    = "<?= $procesosHotStamping['HG2 Estampado2']['tiraje_maximo']?>";
		txtMinHot3.value    = "<?= $procesosHotStamping['HG2 Estampado3']['tiraje_minimo']?>";
		txtMaxHot3.value    = "<?= $procesosHotStamping['HG2 Estampado3']['tiraje_maximo']?>";
		txtCosHot1.value    = "<?= $procesosHotStamping['HG2 Estampado1']['precio_unitario']?>";
		txtCosHot2.value    = "<?= $procesosHotStamping['HG2 Estampado2']['precio_unitario']?>";
		txtCosHot3.value    = "<?= $procesosHotStamping['HG2 Estampado3']['precio_unitario']?>";
		txtTamHot.value     = "<?= $procesosHotStamping['HG2 Placa']['tamano_minimo_placa']?>";
		txtIdPlaHS.value    = "<?= $procesosHotStamping['HG2 Placa']['id_hotstamping']?>";
		txtIdArrHS.value    = "<?= $procesosHotStamping['HG2 Arreglo']['id_hotstamping']?>";
		txtIdPelHS.value    = "<?= $procesosHotStamping['HG2 Pelicula']['id_hotstamping']?>";
		txtIdTirHS1.value   = "<?= $procesosHotStamping['HG2 Estampado1']['id_hotstamping']?>";
		txtIdTirHS2.value   = "<?= $procesosHotStamping['HG2 Estampado2']['id_hotstamping']?>";
		txtIdTirHS3.value   = "<?= $procesosHotStamping['HG2 Estampado3']['id_hotstamping']?>";
		}
	});

	$("#btnGraG1").click( function(){
		if(a==0){
			txtCosGraPlac.value = "<?= $procesosGrabado['G1 Placa']['precio_unitario']?>";
			txtCosGraArr.value  = "<?= $procesosGrabado['G1 Arreglo']['precio_unitario']?>";
			txtMinGra1.value    = "<?= $procesosGrabado['G1 Estampado1']['tiraje_minimo']?>";
			txtMaxGra1.value    = "<?= $procesosGrabado['G1 Estampado1']['tiraje_maximo']?>";
			txtMinGra2.value    = "<?= $procesosGrabado['G1 Estampado2']['tiraje_minimo']?>";
			txtMaxGra2.value    = "<?= $procesosGrabado['G1 Estampado2']['tiraje_maximo']?>";
			txtMinGra3.value    = "<?= $procesosGrabado['G1 Estampado3']['tiraje_minimo']?>";
			txtMaxGra3.value    = "<?= $procesosGrabado['G1 Estampado3']['tiraje_maximo']?>";
			txtCosGra1.value    = "<?= $procesosGrabado['G1 Estampado1']['precio_unitario']?>";
			txtCosGra2.value    = "<?= $procesosGrabado['G1 Estampado2']['precio_unitario']?>";
			txtCosGra3.value    = "<?= $procesosGrabado['G1 Estampado3']['precio_unitario']?>";
			txtTamGra.value     = "<?= $procesosGrabado['G1 Placa']['tamano_minimo_placa']?>";
			txtIdPlaG.value     = "<?= $procesosGrabado['G1 Placa']['id_grabado']?>";
			txtIdArrG.value     = "<?= $procesosGrabado['G1 Arreglo']['id_grabado']?>";
			txtIdTirG1.value    = "<?= $procesosGrabado['G1 Estampado1']['id_grabado']?>";
			txtIdTirG2.value    = "<?= $procesosGrabado['G1 Estampado2']['id_grabado']?>";
			txtIdTirG3.value    = "<?= $procesosGrabado['G1 Estampado3']['id_grabado']?>";
		}
	});

	$("#btnCorLas").click( function(){
		if(a==0){
			txtCosCorLasT1.value = "<?= $procesosLaser['Figura Sencilla']['tiempo_requerido']?>";
			txtCosCorLasT2.value = "<?= $procesosLaser['Figura Detallada']['tiempo_requerido']?>";
			txtCosCorLasT3.value = "<?= $procesosLaser['Ranura Sencilla']['tiempo_requerido']?>";
			txtCosCorLasT4.value = "<?= $procesosLaser['Ranura Detallada']['tiempo_requerido']?>";
			txtCosCorLasT5.value = "<?= $procesosLaser['Personalizado']['tiempo_requerido']?>";
			txtCosCorLasC1.value = "<?= $procesosLaser['Figura Sencilla']['costo_unitario']?>";
			txtCosCorLasC2.value = "<?= $procesosLaser['Figura Detallada']['costo_unitario']?>";
			txtCosCorLasC3.value = "<?= $procesosLaser['Ranura Sencilla']['costo_unitario']?>";
			txtCosCorLasC4.value = "<?= $procesosLaser['Ranura Detallada']['costo_unitario']?>";
			txtCosCorLasC5.value = "<?= $procesosLaser['Personalizado']['costo_unitario']?>";
			txtIdSenLaser1.value= "<?= $procesosLaser['Figura Sencilla']['id_proc_corte_laser']?>";
			txtIdSenLaser2.value= "<?= $procesosLaser['Ranura Sencilla']['id_proc_corte_laser']?>";
			txtIdDetLaser1.value= "<?= $procesosLaser['Figura Detallada']['id_proc_corte_laser']?>";
			txtIdDetLaser2.value= "<?= $procesosLaser['Ranura Detallada']['id_proc_corte_laser']?>";
			txtIdPerLaser.value= "<?= $procesosLaser['Personalizado']['id_proc_corte_laser']?>";
		}
	});

	$("#btnGraG2").click( function(){
		if(a==0){
			txtCosGraPlac.value = "<?= $procesosGrabado['G2 Placa']['precio_unitario']?>";
			txtCosGraArr.value  = "<?= $procesosGrabado['G2 Arreglo']['precio_unitario']?>";
			txtMinGra1.value    = "<?= $procesosGrabado['G2 Estampado1']['tiraje_minimo']?>";
			txtMaxGra1.value    = "<?= $procesosGrabado['G2 Estampado1']['tiraje_maximo']?>";
			txtMinGra2.value    = "<?= $procesosGrabado['G2 Estampado2']['tiraje_minimo']?>";
			txtMaxGra2.value    = "<?= $procesosGrabado['G2 Estampado2']['tiraje_maximo']?>";
			txtMinGra3.value    = "<?= $procesosGrabado['G2 Estampado3']['tiraje_minimo']?>";
			txtMaxGra3.value    = "<?= $procesosGrabado['G2 Estampado3']['tiraje_maximo']?>";
			txtCosGra1.value    = "<?= $procesosGrabado['G2 Estampado1']['precio_unitario']?>";
			txtCosGra2.value    = "<?= $procesosGrabado['G2 Estampado2']['precio_unitario']?>";
			txtCosGra3.value    = "<?= $procesosGrabado['G2 Estampado3']['precio_unitario']?>";
			txtTamGra.value     = "<?= $procesosGrabado['G2 Placa']['tamano_minimo_placa']?>";
			txtIdPlaG.value     = "<?= $procesosGrabado['G2 Placa']['id_grabado']?>";
			txtIdArrG.value     = "<?= $procesosGrabado['G2 Arreglo']['id_grabado']?>";
			txtIdTirG1.value    = "<?= $procesosGrabado['G2 Estampado1']['id_grabado']?>";
			txtIdTirG2.value    = "<?= $procesosGrabado['G2 Estampado2']['id_grabado']?>";
			txtIdTirG3.value    = "<?= $procesosGrabado['G2 Estampado3']['id_grabado']?>";
		}
	});

	$("#btnSuaje").click( function(){
		if(a==0){
			
			txtCosto1.value   = "<?= $procesosSuaje['Perimetral']['costo_unitario']?>";
			txtCosto2.value   = "<?= $procesosSuaje['Figura']['costo_unitario']?>";

			txtTiro1.value   = "<?= $procesosSuaje['Tiro']['costo_unitario']?>";
			txtTiro2.value   = "<?= $procesosSuaje['Tiro Figura']['costo_unitario']?>";
			txtArreglo1.value   = "<?= $procesosSuaje['Arreglo']['costo_unitario']?>";
			txtArreglo2.value   = "<?= $procesosSuaje['Arreglo Figura']['costo_unitario']?>";

			txtPerimetro1.value   = "<?= $procesosSuaje['Perimetral']['perimetro_minimo']?>";
			txtPerimetro2.value   = "<?= $procesosSuaje['Figura']['perimetro_minimo']?>";
			txtIdPerSuaje.value = "<?= $procesosSuaje['Perimetral']['id_suaje']?>";
			txtIdFigSuaje.value = "<?= $procesosSuaje['Figura']['id_suaje']?>";
		}
	});

	$("#btnLaminado").click(function(){
		if(a==0){
		txtCosLam1.value    = "<?= $procesosLaminado['Mate']['costo_unitario']?>";
		txtCosLam2.value    = "<?= $procesosLaminado['Soft Touch']['costo_unitario']?>";
		txtCosLam3.value    = "<?= $procesosLaminado['Anti Scratch']['costo_unitario']?>";
		txtCosLam4.value    = "<?= $procesosLaminado['Superadherente']['costo_unitario']?>";
		txtRanMinLam1.value = "<?= $procesosLaminado['Mate']['tiraje_minimo']?>";
		txtRanMinLam2.value = "<?= $procesosLaminado['Soft Touch']['tiraje_minimo']?>";
		txtRanMinLam3.value = "<?= $procesosLaminado['Anti Scratch']['tiraje_minimo']?>";
		txtRanMinLam4.value = "<?= $procesosLaminado['Superadherente']['tiraje_minimo']?>";
		txtRanMaxLam1.value = "<?= $procesosLaminado['Mate']['tiraje_maximo']?>";
		txtRanMaxLam2.value = "<?= $procesosLaminado['Soft Touch']['tiraje_maximo']?>";
		txtRanMaxLam3.value = "<?= $procesosLaminado['Anti Scratch']['tiraje_maximo']?>";
		txtRanMaxLam4.value = "<?= $procesosLaminado['Superadherente']['tiraje_maximo']?>";
		txtIdLam1.value     = "<?= $procesosLaminado['Mate']['id_proc_laminado']?>";
		txtIdLam2.value     = "<?= $procesosLaminado['Soft Touch']['id_proc_laminado']?>";
		txtIdLam3.value     = "<?= $procesosLaminado['Anti Scratch']['id_proc_laminado']?>";
		txtIdLam4.value     = "<?= $procesosLaminado['Superadherente']['id_proc_laminado']?>";
		}
	});
	function opacidad(){

		prin.style.display="flex";
	}

	function show(obj){

		formSwitch=document.getElementById(obj);
		$("#idOffset").hide("Normal");
		$("#idSerigrafia").hide("Normal");
		$("#idDigital").hide("Normal");
		$("#idLaminado").hide("Normal");
		$("#idGrabado").hide("Normal");
		$("#idHotStamping").hide("Normal");
		$("#idSuaje").hide("Normal");
		if (formSwitch.style.display=="none") {

			$(formSwitch).show("Normal");
		}
	}
	
	function asignaNum(){

		a=1;
	}

	function validaNumericos(event) {

	    if(event.charCode >= 48 && event.charCode <= 57){
	      return true;
	     }
	     return false;        
	}

	$("#btnImpresion").click( function(){

		var ventana = window.open("<?=URL?>modificaprocesos/imprProcesos", "Impresion", "width=600, height=600");
		return true;
	});
</script>