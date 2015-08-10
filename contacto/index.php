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
	}
	else{
		$inicius="0";
		$tipus="1";
		$imaavatar="../imagenes/avatar/default.png";
	}
	if ($tipus=="1") {
		$csssubm="right: 12%;";
	}
	else{
		$csssubm="right: 5%;";
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
	<link rel="stylesheet" href="../css/cloudzoom.css" />
	<link rel="stylesheet" href="../css/popu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrpag.js"></script>
	<script src="../js/filtro_producs.js"></script>
	<script src="../js/cloudzoom.js"></script>
	<script src="../js/popup.js"></script>
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
		<a href="../nosotros">Empresa</a>
		<a href="../campa">Colecciones</a>
		<a href="../productos">Productos</a>
		<a href="../video">Videos</a>
		<a href="../prensa">Eventos</a>
		<a href="../contacto" class="selB">Donde Estamos</a>
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
		<a href="../registro" id="reg">Mi perfil/Regístrate</a>
		<?php
			}
			else{
		?>
		<a href="../usuario" id="log"><?php echo "$nomus"; ?></a>
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
	<aside id="igredos">
		<article>
			<a href="../registro">Resgístrate</a>
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
	<figure id="fodA" class="modelang">
		<h1 id="hunodos">DONDE ENCONTRARNOS?</h1>
	</figure>
	<section>
		<article class="flexanormal">
			<?php
				$bodegas="SELECT * from bodega order by nam_bd asc";
				$sql_bodegas=mysql_query($bodegas,$conexion) or die (mysql_error());
				while ($bs=mysql_fetch_array($sql_bodegas)) {
					$idD=$bs['id_bodega'];
					$nmD=$bs['nam_bd'];
					$mapE=$bs['map_bd'];
					$drE=$bs['dir_bd'];
					$psD=$bs['pslc_bd'];
					$tlD=$bs['tel_bd'];
			?>
			<article id="bodeS" class="columninput">
				<h2 id="cotDis"><?php echo "$nmD"; ?></h2>
				<div id="mapalk" class="gelcl" data-id="<?php echo $idD ?>">Ver Mapa</div>
				<div><b>Dirección:</b></div>
				<div><?php echo "$drE"; ?></div>
				<?php
					if ($psD!="") {
				?>
				<div><?php echo "$psD"; ?></div>
				<?php
					}
				?>
				<div><b>Teléfono:</b></div>
				<div><?php echo "$tlD"; ?></div>
				<?php
					$wahPP="SELECT * from whatsap where bd_id=$idD";
					$sql_wah=mysql_query($wahPP,$conexion) or die (mysql_error());
					$numeroW=mysql_num_rows($sql_wah);
					if ($numeroW>0) {
				?>
				<figure id="Wh">
					<img src="../imagenes/whasapt.png" alt="Whatsapp" />
					<figcaption>
						<b>Whatsapp</b>
					</figcaption>
				</figure>
				<?php
						while ($kw=mysql_fetch_array($sql_wah)) {
							$nmw=$kw['num_whas'];
				?>
				<div><?php echo "$nmw"; ?></div>
				<?php
						}
					}
				?>
			</article>
			<article id="popupContact_<?php echo $idD ?>" class="popupContact">
				<a href="#" id="popupContactClose_<?php echo $idD ?>" class="popupContactClose">x</a>
				<article id="contactArea">
					<h2 id="cotDis">Mapa <?php echo "$nmD"; ?></h2>
					<iframe src="https:<?php echo $mapE ?>" width="100%" height="480">	
					</iframe>
				</article>
			</article>
			<?php
				}
			?>
		</article>
	</section>
	<footer>
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="../">Inicio</a>
				<a href="../nosotros">Empresa</a>
				<a href="../campa">Colecciones</a>
				<a href="../productos">Productos</a>
				<a href="../video">Videos</a>
			</article>
			<article class="columart">
				<a href="../prensa">Eventos</a>
				<a href="../contacto" class="selB">Donde Estamos</a>
				<a href="../contacto/ind2x.php">Contáctenos</a>
				<?php
					if ($inicius=="0") {
				?>
				<a href="../registro">Mi perfil/Regístrate</a>
				<?php
					}
					else{
				?>
				<a href="../usuario"><?php echo "$nomus"; ?></a>
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