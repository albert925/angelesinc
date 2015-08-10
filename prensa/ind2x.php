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

	$idR=$_GET['ev'];
	if ($idR=="") {
		echo "<script type='text/javascript'>";
			echo "alert('id no disponible');";
			echo "var pagina='../prensa';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		$texEvet="SELECT * from eventos where id_evet=$idR";
		$sql_texev=mysql_query($texEvet,$conexion) or die (mysql_error());
		while ($kt=mysql_fetch_array($sql_texev)) {
			$idE=$kt['id_evet'];
			$nmE=$kt['nam_evet'];
			$txtE=$kt['text_evet'];
			$ffE=$kt['fech_evet'];
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
		<a href="../prensa" class="selB">Eventos</a>
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
		<h1>EVENTOS</h1>
	</figure>
	<section id="automargen">
		<h2 id="hdos"><?php echo "$nmE"; ?></h2>
		<figure>
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
					<?php
						$imE="SELECT * from iamges_evet where evet_id=$idR order by id_img_evet asc";
						$sql_ime=mysql_query($imE,$conexion) or die (mysql_error());
						while ($gk=mysql_fetch_array($sql_ime)) {
							$idG=$gk['id_img_evet'];
							$imgG=$gk['rut_evet'];
					?>
					<img src="../<?php echo $imgG ?>" alt="<?php echo $nmE ?>" /><!--title="#caption1"-->
					<?php
						}
					?>
				</div>
				<!--div id="caption1" style="display: none;">
        	<h2>
        		Guia
        	</h2>
        </div><caption-->
			</div>
		</figure>
		<script src="../js/nivo_slider.js"></script>
		<script type="text/javascript">
			$(window).load(function(){
	      $('#slider').nivoSlider({
	          effect: 'boxRainGrowReverse',
	          slices: 15,
	          boxCols: 8,
	          boxRows: 4,
	          animSpeed: 800,
	          pauseTime: 3000,
	          startSlide: 0,
	          directionNav: true,
	          controlNav: true,
	          controlNavThumbs: false,
	          pauseOnHover: true,
	          manualAdvance: false,
	          prevText: 'Prev',
	          nextText: 'Next',
	          randomStart: false,
	      });
	   	});
	   	// http://web.tursos.com/como-implementar-nivo-slider-en-tu-pagina-web/
		</script>
		<article>
			<?php
				echo "$txtE";
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
				<a href="../prensa" class="selB">Eventos</a>
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
<?php
	}
?>