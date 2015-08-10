<?php
	include '../config.php';
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
			$imaavatar="../".$avus;
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
	<title>Angeles Inc</title>
	<link rel="icon" href="../imagenes/icono.png" />
	<link rel="stylesheet" href="../css/normalize.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/default/default.css" />
	<link rel="stylesheet" href="../css/nivo_slider.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrpag.js"></script>
	<script src="../js/cambiusers.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<a href="../">
				<img src="../imagenes/2.png" alt="logo" />
			</a>
		</figure>
		<aside id="extr">
			<input type="search" id="bgnP" placeholder="Busqueda" />
			<!-- <figure style="background-image:url(<?php echo $imaavatar ?>);"></figure> -->
		</aside>
	</header>
	<nav id="mnP">
		<a href="../">Inicio</a>
		<a href="../nosotros">Marca</a>
		<a href="../campa">Colecciones</a>
		<a href="../productos">Productos</a>
		<a href="../video">Videos</a>
		<a href="../prensa">Prensa</a>
		<a href="../contacto">Donde Estamos</a>
		<a href="../contacto/ind2x.php">Contáctenos</a>
		<?php
			if ($tipus!="1") {
		?>
		<a href="../carrito.php" id="carajax">Mi carrito (0 artículo[$000])</a>
		<?php
			}
		?>
		<?php
			if ($inicius=="0") {
		?>
		<a href="../registro">Mi perfil/Regístrate</a>
		<?php
			}
			else{
		?>
		<a href="../usuario" id="log" class="selB"><?php echo "$nomus"; ?></a>
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
		<a href="../usuario">Información</a>
		<a href="../factura">Historial o Compras</a>
		<a href="../cerrar/us.php">Salir</a>
	</aside>
	<?php
		}
	?>
	<aside id="resultado">
	</aside>
	<section>
		<h1>Información de <?php echo "$nomus $apus"; ?></h1>
		<article id="automargen">
			<figure id="usimages">
				<?php
					if ($avus=="") {
						$presaat="../imagenes/avatar/default.png";
					}
					else{
						$presaat="../".$avus;
					}
				?>
				<img src="<?php echo $presaat ?>" alt="avatar_<?php echo $nomus ?>" />
				<figcaption>
					<form action="#" method="post" enctype="multipart/form-data" id="avatFus" class="columninput">
						<input type="text" name="ideus" id="ideus" value="<?php echo $idus ?>" required="required" style="display:none;" />
						<input type="file" name="imaavat" id="imaavat" required="required" />
						<div id="infus"></div>
						<input type="submit" value="Modificar" id="camavart" class="botonstyle" />
					</form>
				</figcaption>
			</figure>
			<article class="flexartcl">
				<article class="columninput">
					<h2>Datos</h2>
					<label><b>Nombre(s)</b></label>
					<input type="text" value="<?php echo $nomus ?>" id="nmFs" />
					<label><b>Apellido(s)</b></label>
					<input type="text" value="<?php echo $apus ?>" id="apFs" />
					<label><b>Teléfono fijo</b></label>
					<input type="tel" value="<?php echo $telus ?>" id="tlFs" />
					<label><b>Celular</b></label>
					<input type="tel" value="<?php echo $celus ?>" id="clFs" />
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
					<label><b>Dirección</b></label>
					<input type="text" value="<?php echo $dirus ?>" id="drFs" />
					<div id="txA"></div>
					<input type="submit" value="Modificar" id="datmF" class="botonstyle" data-us="<?php echo $idus ?>" />
				</article>
				<article class="columninput">
					<h2>Cédula</h2>
					<?php
						if ($ccus=="") {
					?>
					<input type="number" id="ccFs" value="<?php echo $ccus ?>" />
					<div id="txB"></div>
					<input type="submit" value="Modificar" id="CccF" class="botonstyle" data-us="<?php echo $idus ?>" />
					<?php
						}
						else{
					?>
					<b><?php echo "$ccus"; ?></b>
					<?php
						}
					?>
				</article>
				<article class="columninput">
					<h2>Cambiar Correo</h2>
					<input type="email" id="corFs" value="<?php echo $corus ?>" />
					<div id="txC"></div>
					<input type="submit" value="Modificar" id="emaF" class="botonstyle" data-us="<?php echo $idus ?>" />
				</article>
				<article class="columninput">
					<h2>Cambiar Contraseña</h2>
					<label><b>Contraseña Actual</b></label>
					<input type="password" id="psA" />
					<label><b>Contraseña Nueva</b></label>
					<input type="password" id="psNa" />
					<label><b>Repite Contraseña Nueva</b></label>
					<input type="password" id="psNb" />
					<div id="txD"></div>
					<input type="submit" value="Modificar" id="psapsF" class="botonstyle" data-us="<?php echo $idus ?>" />
				</article>
			</article>
		</article>
	</section>
	<footer>
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="../">Inicio</a>
				<a href="../nosotros">Marca</a>
				<a href="../campa">Colecciones</a>
				<a href="../productos">Productos</a>
				<a href="../video">Videos</a>
			</article>
			<article class="columart">
				<a href="../prensa">Prensa</a>
				<a href="../contacto">Donde Estamos</a>
				<a href="../contacto/ind2x.php">Contáctenos</a>
				<?php
					if ($inicius=="0") {
				?>
				<a href="../registro">Mi perfil/Regístrate</a>
				<?php
					}
					else{
				?>
				<a href="../usuario" class="selB"><?php echo "$nomus"; ?></a>
				<?php
					}
				?>
				<div>
					<a href="../politicas.php">Políticas</a> y <a href="../terminos.php">Terminos y condiciones</a>
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
<?php
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../errorus.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>