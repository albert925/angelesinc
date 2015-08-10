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
			<h2>Formulario con tus datos de envío</h2>
		</hgroup>
		<nav id="pasos">
			<div id="Psb" class="fonflechas">
				<h2>Paso 1</h2>
				<span>
					Revisa los Productos <br/>de tu Carrito.
				</span>
			</div>
			<div id="Psa" class="fonflechas">
				<h2>Paso 2</h2>
				<span>
					Completa el formulario <br/>con tus datos de envio.
				</span>
			</div>
			<div class="fonflechas">
				<h2>Paso 3</h2>
				<span>
					Verifica tu orden y <br/>finaliza tu compra.
				</span>
			</div>
		</nav>
		<article id="automargen" class="ifor_carrito">
			<figure id="ifcB">
				<img src="imagenes/car_b.png" alt="despacho" />
				<figcaption>
					<ol>
						<li>
							Debes comunicarte con nuestros asesores si eres una persona jurídica y efectúas algún tipo de retención. 
						</li>
						<li>
							Método de pago por consignación se recargan $10.000 pesos Colombianos por comisión bancaria. 
						</li>
					</ol>
				</figcaption>
			</figure>
		</article>
		<article id="automargen">
			<article class="columninput">
				<label><b>N° Cédula</b></label>
				<input type="tel" id="cccar" value="<?php echo $ccus ?>" />
				<label><b>Nombres</b></label>
				<input type="text" id="nmcar" value="<?php echo $nomus ?>" />
				<label><b>Apellidos</b></label>
				<input type="text" id="apcar" value="<?php echo $apus ?>" />
				<label><b>Correo</b></label>
				<label><?php echo "$corus"; ?></label>
				<label><b>Departamento</b></label>
				<select id="dpFs">
					<option value="0">Departamentos</option>
					<?php
						$deparV="SELECT * from departamento order by nam_depart asc";
						$sql_Vdep=mysql_query($deparV,$conexion) or die (mysql_error());
						while ($dpt=mysql_fetch_array($sql_Vdep)) {
							$idpt=$dpt['id_depart'];
							$napt=$dpt['nam_depart'];
							if ($idpt==$depus) {
								$seldepatr="selected";
							}
							else{
								$seldepatr="";
							}
					?>
					<option value="<?php echo $idpt ?>" <?php echo $seldepatr ?>><?php echo "$napt"; ?></option>
					<?php
						}
					?>
				</select>
				<label><b>Municipios</b></label>
				<select id="mnFs">
					<?php
						if ($munus=="" || $munus=="0" || $munus=="null" | $munus=="NULL") {
							$plaslecmuni="selecione";
							$codmuni=0;
						}
						else{
							$plaslecmuni=$name_muni;
							$codmuni=$munus;
						}
					?>
					<option value="<?php echo $codmuni ?>"><?php echo "$plaslecmuni"; ?></option>
				</select>
			</article>
			<article class="columninput">
				<label><b>Teléfono fijo</b></label>
				<input type="tel" id="tlcar" value="<?php echo $telus ?>" />
				<label><b>Teléfono celular</b></label>
				<input type="tel" id="clcar" value="<?php echo $celus ?>" />
				<label><b>Dirección</b></label>
				<input type="text" id="drcar" value="<?php echo $dirus ?>" />
			</article>
			<article class="columninput">
				<div id="txF"></div>
			</article>
		</article>
		<div id="botonSps">
			<a href="carrito.php" class="prd" data-pla="A">Atrás</a>
			<a id="datcar" href="#" class="fcp" data-id="<?php echo $idus ?>">Continuar el proceso de Compra</a>
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