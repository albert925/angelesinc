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
	<link rel="stylesheet" href="../css/popu.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrpag.js"></script>
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
		<a href="../campa" class="selB">Colecciones</a>
		<a href="../productos">Productos</a>
		<a href="../video">Videos</a>
		<a href="../prensa">Eventos</a>
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
		<h1>CAMPAÑAS</h1>
	</figure>
	<section id="automargen">
		<article id="campverdise">
			<?php
				$minimo="SELECT min(precN_p) as precN_p from producto";
				$maximo="SELECT max(precN_p) as precN_p from producto";
				$minas=mysql_query($minimo,$conexion) or die (mysql_error());
				$maxnas=mysql_query($maximo,$conexion) or die (mysql_error());
				while ($minn=mysql_fetch_array($minas)) {
					$mi=$minn['precN_p'];
				}
				while ($mann=mysql_fetch_array($maxnas)) {
					$ma=$mann['precN_p'];
				}

				$Cole="SELECT * from tip_producto order by nam_tp asc";
				$sql_Cole=mysql_query($Cole,$conexion) or die (mysql_error());
				while ($cmp=mysql_fetch_array($sql_Cole)) {
					$idCamp=$cmp['id_tp'];
					$nmCamp=$cmp['nam_tp'];
					$imagCamp=$cmp['imag_col'];
					$textoCamp=$cmp['texto_tp'];
					$ffCamp=$cmp['fec_camp'];
			?>
			<figure id="genfig" class="gelcl" data-id="<?php echo $idCamp ?>">
				<h2><?php echo "$nmCamp"; ?></h2>
				<img src="../<?php echo $imagCamp ?>" alt="<?php echo $nmCamp ?>" />
			</figure>
			<figcaption id="popupContact_<?php echo $idCamp ?>" class="popupContact" data-id="<?php echo $idCamp ?>">
				<a id="popupContactClose_<?php echo $idCamp ?>" class="popupContactClose" data-id="<?php echo $idCamp ?>">x</a>
				<figure id="contactArea" class="campadise">
					<div>
						<img src="../<?php echo $imagCamp ?>" alt="<?php echo $nmCamp ?>" />
					</div>
					<figcaption>
						<h3>Descripción</h3>
						<p>
							<?php echo "$textoCamp" ?>
						</p>
						<div>
							<a href="../productos/ind3x.php?ez=0&fa=0&fb=<?php echo $idCamp ?>
							&fc=0&min=<?php echo $mi ?>&max=<?php echo $ma ?>">Ir</a>
						</div>
					</figcaption>
				</figure>
			</figcaption>
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
				<a href="../campa" class="selB">Colecciones</a>
				<a href="../productos">Productos</a>
				<a href="../video">Videos</a>
			</article>
			<article class="columart">
				<a href="../prensa">Eventos</a>
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