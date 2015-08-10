<?php
	include 'config.php';
	session_start();
	if (isset($_SESSION['us'])) {
		$idRrr=$_SESSION['us'];
		$sql_datos_us="SELECT * from usuario where id_us='$idRrr'";
		$sql_ver=mysql_query($sql_datos_us,$conexion) or die (mysql_error());
		while ($sd=mysql_fetch_array($sql_ver)) {
			$idus=$sd['id_us'];
			$avus=$sd['avat_us'];
			$ccus=$sd['cc_us'];
			$nomus=$sd['nom_us'];
			$apus=$sd['ape_us'];
			$corus=$sd['cor_us'];
			$celus=$sd['cel_us'];
			$telus=$sd['tel_us'];
			$depus=$sd['depart_id'];
			$munus=$sd['muni_id'];
			$dirus=$sd['direc_us'];
			$estdus=$sd['estd_us'];
			$tipus=$sd['tip_us'];
			$inicius="1";
			$imaavatar=$avus;
		}
	}
	else{
		$inicius="0";
		$tipus="1";
		$imaavatar="imagenes/avatar/default.png";
	}
	if ($tipus=="1") {
		$csssubm="right: 12%;";
	}
	else{
		$csssubm="right: 5%;";
	}
	$monm_muni="SELECT * from municipio where id_muni='$munus'";
	$sql_nommn=mysql_query($monm_muni,$conexion) or die (mysql_error());
	while ($km=mysql_fetch_array($sql_nommn)) {
		$name_muni=$km['nam_muni'];
	}
	$deparV="SELECT * from departamento where id_depart='$depus'";
	$sql_Vdep=mysql_query($deparV,$conexion) or die (mysql_error());
	while ($dpt=mysql_fetch_array($sql_Vdep)) {
		$napt=$dpt['nam_depart'];
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<title>Angeles Inc productos descripción</title>
	<link rel="icon" href="imagenes/icono.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/carrito.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/scrpag.js"></script>
	<script src="js/carrito.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<a href="index.php">
				<img src="imagenes/2.png" alt="logo" />
			</a>
		</figure>
		<aside id="extr">
			<input type="search" id="bgnP" placeholder="Busqueda" />
			<!-- <figure style="background-image:url(<?php echo $imaavatar ?>);"></figure> -->
		</aside>
	</header>
	<nav id="mnP">
		<a href="index.php">Inicio</a>
		<a href="nosotros">Empresa</a>
		<a href="campa">Colecciones</a>
		<a href="productos">Productos</a>
		<a href="video">Videos</a>
		<a href="prensa">Eventos</a>
		<a href="contacto">Donde Estamos</a>
		<a href="contacto/ind2x.php">Contáctenos</a>
		<?php
			if ($tipus!="1") {
		?>
		<a href="carrito.php" id="carajax">Mi carrito (0 artículo[$000])</a>
		<?php
			}
		?>
		<?php
			if ($inicius=="0") {
		?>
		<a href="registro" id="reg">Mi perfil/Regístrate</a>
		<?php
			}
			else{
		?>
		<a href="usuario" id="log"><?php echo "$nomus"; ?></a>
		<?php
			}
		?>
	</nav>
	<figure id="flecMnp">
		<img src="abajo.png" alt="abajo" />
	</figure>
	<?php
		if ($inicius!="0") {
	?>
	<aside id="login">
		<a href="usuario">Información</a>
		<a href="factura">Historial o Compras</a>
		<a href="cerrar/us.php">Salir</a>
	</aside>
	<?php
		}
	?>
	<aside id="resultado">
	</aside>
	<aside id="igredos">
		<article>
			<a href="registro">Resgístrate</a>
		</article>
		<form action="#" method="post">
			<article>
				<input type="email" id="indos" required="required" placeholder="Correo" />
				<input type="password" id="passdos" required="required" placeholder="Contraseña" />
				<input type="submit" value="Ingresar" id="irdos" class="botonstyle" />
			</article>
			<article>
				<div id="Usc"></div>
			</article>
		</form>
	</aside>
	<section>
		<hgroup>
			<h1>Carrito de Compras</h1>
			<h2>Forma de pago.</h2>
		</hgroup>
		<nav id="pasos">
			<div id="Psb" class="fonflechas">
				<h2>Paso 1</h2>
				<span>
					Revisa los Productos <br/>de tu Carrito.
				</span>
			</div>
			<div id="Psb" class="fonflechas">
				<h2>Paso 2</h2>
				<span>
					Completa el formulario <br/>con tus datos de envio.
				</span>
			</div>
			<div id="Psa" class="fonflechas">
				<h2>Paso 3</h2>
				<span>
					Verifica tu orden y <br/>finaliza tu compra.
				</span>
			</div>
		</nav>
		<article id="automargen" class="flexartclB">
			<article>
				<h2>Datos Productos</h2>
				<table>
					<tr id="disTH">
						<td><b>Producto</b></td>
						<td><b>Precio</b></td>
						<td><b>Cantidad</b></td>
						<td><b>Subtotal</b></td>
					</tr>
					<?php
						$total=0;
						if (isset($_SESSION['carrito'])) {
							$datos=$_SESSION['carrito'];
							$total=0;
							for ($i=0; $i <count($datos) ; $i++) { 
					?>
					<tr id="fila_<?php echo $datos[$i]['Id'] ?>">
						<td>
							<figure id="im_carrito">
								<figcaption>
									<b>Cod: <i><?php echo $datos[$i]['Id']; ?></i></b> <?php echo $datos[$i]['Nomb']; ?>
								</figcaption>
							</figure>
						</td>
						<td>
							<?php
								$unoNum=number_format($datos[$i]['Prec']);
								$dosNum=number_format($datos[$i]['Precv']);
							?>
							<b>$<s><?php echo "$dosNum"; ?></s></b><br />
							<b>$<?php echo "$unoNum"; ?></b>
						</td>
						<td>
							<?php echo $datos[$i]['Cant'] ?>
						</td>
						<td>
							$<span>
								<?php
									$sub=$datos[$i]['Cant']*$datos[$i]['Prec'];
									$formatSubtotal=number_format($sub);
									echo "$formatSubtotal";
								?>
							</span>
						</td>
					</tr>
					<?php
								$total=($datos[$i]['Cant']*$datos[$i]['Prec'])+$total;
							}
						}
						else{
					?>
					<tr>
						<td colspan="4">
							<center>No has añadido ningún producto</center>
						</td>
					</tr>
					<?php
						}
					?>
					<tr id="disTotal">
						<td colspan="2">
							<b>Total:</b>
						</td>
						<td colspan="2">
							<b>$<span><?php $fomrTotal=number_format($total); echo "$fomrTotal"; ?></span></b>
						</td>
					</tr>
				</table>
			</article>
			<article id="datusers" class="columart">
				<h2>Datos Usuario</h2>
				<label id="colordat"><b>Nombres y Apellidos: </b><?php echo "$nomus $apus"; ?></label>
				<label><b>Cc: </b><?php echo "$ccus"; ?></label>
				<label id="colordat"><b>Correo: </b><?php echo "$corus"; ?></label>
				<label><b>Departamento: </b><?php echo "$napt"; ?></label>
				<label id="colordat"><b>Municipio: </b><?php echo "$name_muni"; ?></label>
				<label><b>Teléfono fijo: </b><?php echo "$telus"; ?></label>
				<label id="colordat"><b>Teléfono celular: </b><?php echo "$celus"; ?></label>
				<label><b>Dirección: </b><?php echo "$dirus"; ?></label>
			</article>
		</article>
		<article id="automargen">
			<label>Seleciona tipo de pago</label><br />
			<input type="radio" name="a" id="a" value="1" />
			<label>Consignación</label>
			<input type="radio" name="a" id="a" value="2" />
			<label>Pagos Online</label><br />
			<input type="checkbox" value="1" id="trU" />
			<label>Aceptos los terminos y Condiciones</label>
		</article>
		<div id="botonSps">
			<a href="carrito_psB.php" class="prd" data-pla="A">Atrás</a>
			<a id="fincarr" href="#" class="fcp" data-id="<?php echo $idus ?>">Finalizar Compra</a>
		</div>
	</section>
	<footer>
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="index.php">Inicio</a>
				<a href="nosotros">Empresa</a>
				<a href="campa">Colecciones</a>
				<a href="productos">Productos</a>
				<a href="video">Videos</a>
			</article>
			<article class="columart">
				<a href="prensa">Eventos</a>
				<a href="contacto">Donde Estamos</a>
				<a href="contacto/ind2x.php">Contáctenos</a>
				<?php
					if ($inicius=="0") {
				?>
				<a href="registro">Mi perfil/Regístrate</a>
				<?php
					}
					else{
				?>
				<a href="usuario"><?php echo "$nomus"; ?></a>
				<?php
					}
				?>
				<div>
					<a href="politicas.php">Políticas</a> y <a href="terminos.php">Terminos y condiciones</a>
				</div>
			</article>
			<article class="columart">
				<h2 id="Serv"><a href="#">Servicios</a></h2>
			</article>
			<article class="columart">
				<h2>Diseño</h2>
				<a href="http://conaxport.com/" target="_blank" id="cnxpt">Conaxport</a>
			</article>
		</article>
	</footer>
</body>
</html>