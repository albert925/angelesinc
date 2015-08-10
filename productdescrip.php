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

	$codR=$_GET['cd'];
	if ($codR=="") {
		echo "<script type='text/javascript'>";
			echo "alert('cod producto no disponible');";
			echo "var pagina='productos';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		$gsql="SELECT * from producto where cod_p='$codR'";
		$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
		while ($gh=mysql_fetch_array($impsql)) {
			$idPr=$gh['cod_p'];
			$nmPr=$gh['nam_p'];
			$clPr=$gh['cl_id'];
			$tiPr=$gh['tip_id'];
			$mkPr=$gh['mark_id'];
			$cantPr=$gh['cant_p'];
			$txtPr=$gh['txt_p'];
			$ffPr=$gh['fech_p'];
			$prAPr=$gh['precA_p'];
			$prcPr=$gh['precN_p'];
			$precioUno=number_format($prAPr);
			$precioDos=number_format($prcPr);
		}
		$primera_imagen="SELECT * from images_p where p_cod='$idPr' order by id_img_p asc limit 1";
		$sql_pryimg=mysql_query($primera_imagen,$conexion) or die (mysql_error());
		$numimages=mysql_num_rows($sql_pryimg);
		if ($numimages>0) {
			while ($gmk=mysql_fetch_array($sql_pryimg)) {
				$rutaP=$gmk['ruta_p'];
			}
		}
		else{
			$ruta_p="imagenes/productos/predeterminado.jpg";
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
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/productos.css" />
	<link rel="stylesheet" href="css/owl_carousel.css" />
	<link rel="stylesheet" href="css/owl_theme_min.css" />
	<link rel="stylesheet" href="css/cloudzoom.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/owl_carousel_min.js"></script>
	<script src="js/scrpag.js"></script>
	<script src="js/cloudzoom.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<center>
				<a href="index.php">
					<img src="imagenes/2.png" alt="logo" />
				</a>
			</center>
		</figure>
		<aside id="extr">
			<article id="avatar" style="background-image:url(<?php echo $imaavatar ?>);">
			</article>
			<?php
				if ($tipus!="1") {
			?>
			<article id="carrito">
				<a href="carrito.php">
					<span class="icon-carritoi"></span>
					<span id="decar">0</span>					
				</a>
			</article>
			<?php
				}
				//<a href="carrito.php" id="carajax">Mi carrito (0 artículo[$000])</a>
			?>
		</aside>
	</header>
	<article id="mnuPp">
		<nav id="mnP">
			<ul>
				<li><a href="index.php">Inicio</a></li>
				<li><a href="nosotros">Empresa</a></li>
				<li><a href="campa">Colecciones</a></li>
				<li class="submen" data-num="1"><a href="productos">Productos</a>
					<ul class="children1">
						<?php
							$CLou="SELECT * from cliente order by nam_cl asc";
							$sql_clou=mysql_query($CLou,$conexion) or die (mysql_error());
							while ($ouA=mysql_fetch_array($sql_clou)) {
								$idCLy=$ouA['id_cl'];
								$nmCLy=$ouA['nam_cl'];
						?>
						<li><a href="productos/ind2x.php?tp=<?php echo $idCLy ?>"><?php echo "$nmCLy"; ?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><a href="prensa">Eventos</a></li>
				<li class="submen" data-num="2"><a href="contacto">Contacto</a>
					<ul class="children2">
						<li><a href="contacto">Donde Estamos</a></li>
						<li><a href="contacto/ind2x.php">Contáctenos</a></li>
					</ul>
				</li>
				<?php
					if ($inicius=="0") {
						//<li><a href="video">Videos</a></li>
				?>
				<li><a href="registro" id="reg">Usuario</a></li>
				<?php
					}
					else{
				?>
				<li class="submen" data-num="3"><a href="usuario"><?php echo "$nomus"; ?></a>
					<ul class="children3">
						<li><a href="usuario">Información</a></li>
						<li><a href="factura">Historial o Compras</a></li>
						<li><a href="cerrar/us.php">Salir</a></li>
					</ul>
				</li>
				<?php
					}
				?>
			</ul>
		</nav>
		<article id="redes">
			<a href="https://www.facebook.com/pages/Bodega-Los-Angeles-Inc/515911208524753?fref=ts" target="_blank"><span class="icon-facebook4"></span></a>
			<a href="" target="_blank"><span class="icon-twitter4"></span></a>
			<a href="https://instagram.com/losangelesinc/" target="_blank"><span class="icon-instagram2"></span></a>
			<a href="https://www.youtube.com/results?search_query=bodega+los+angelesinc" target="_blank"><span class="icon-youtube5"></span></a>
		</article>
		<div id="mnmov"><span class="icon-menu"></span></div>
		<article class="search">
			<div id="bcicbs"><span class="icon-search"></span></div>
			<div id="dish">
				<input type="search" id="bgnP" placeholder="Busqueda" />
			</div>
		</article>
	</article>
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
		<h1><?php echo "$nmPr"; ?></h1>
		<article id="automargen" class="descipVer">
			<figure id="galerias">
				<img class="cloudzoom" src="<?php echo $rutaP ?>" alt="imagen" 
					data-cloudzoom="zoomImage: '<?php echo $rutaP ?>',zoomPosition: 'inside',autoInside: true" />
				<figcaption>
					<?php
						$todas_las_imagesP="SELECT * from images_p where p_cod='$idPr' order by id_img_p";
						$sql_todas=mysql_query($todas_las_imagesP,$conexion) or die (mysql_error());
						while ($kgmi=mysql_fetch_array($sql_todas)) {
							$idgT=$kgmi['id_img_p'];
							$rugT=$kgmi['ruta_p'];
					?>
					<img class="cloudzoom-gallery" src="<?php echo $rugT ?>" 
						data-cloudzoom="useZoom: '.cloudzoom', image: '<?php echo $rugT ?>', zoomImage: '<?php echo $rugT ?>'" />
					<?php
						}
					?>
				</figcaption>
				<script type="text/javascript">
					CloudZoom.quickStart();
				</script>
			</figure>
			<article id="descproduct">
				<h2>Producto <?php echo "$nmPr"; ?></h2>
				<?php
					$clO="SELECT * from cliente where id_cl='$clPr'";
					$sql_cl=mysql_query($clO,$conexion) or die (mysql_error());
					while ($Ocl=mysql_fetch_array($sql_cl)) {
						$nmclO=$Ocl['nam_cl'];
					}
					$tpO="SELECT * from tip_producto where id_tp='$tiPr'";
					$sql_tp=mysql_query($tpO,$conexion) or die (mysql_error());
					while ($Otp=mysql_fetch_array($sql_tp)) {
						$nmtpO=$Otp['nam_tp'];
					}
					$mkO="SELECT * from marca where id_mk='$mkPr'";
					$sql_mk=mysql_query($mkO,$conexion) or die (mysql_error());
					while ($Omk=mysql_fetch_array($sql_mk)) {
						$nmmkO=$Omk['nam_mk'];
					}
				?>
				<?php
					if ($tipus!="1") {
				?>
				<b><strike>$<?php echo "$precioUno"; ?></strike></b>
				<b>$<?php echo "$precioDos"; ?></b>
				<a href="carrito.php?cod=<?php echo $codR ?>">Comprar</a>
				<?php
					}
				?>
				<article>
					<h5>Detalles</h5>
					<b>Grupo</b> <?php echo "$nmclO"; ?>
					<b>Género</b> <?php echo "$nmtpO"; ?>
					<b>Marca</b> <?php echo "$nmmkO"; ?>
					<article>
						<?php echo "$txtPr"; ?>
					</article>
				</article>
			</article>
		</article>
	</section>
	<section class="marks">
		<h2 id="tresh">Marcas</h2>
		<article id="automargen">
			<article class="owl-carousel owl-theme owl-loaded">
				<?php
					$Tikk="SELECT * from marksimg order by id_ik desc";
					$sql_ikk=mysql_query($Tikk,$conexion) or die (mysql_error());
					while ($kki=mysql_fetch_array($sql_ikk)) {
						$idikk=$kki['id_ik'];
						$rutikk=$kki['rut_ik'];
						$lkkikk=$kki['lk_ik'];
						if ($lkkikk=="") {
							$tyuy="#";
						}
						else{
							$tyuy=$lkkikk;
						}
				?>
				<div class="item">
					<figure class="marseg">
						<a href="<?php echo $tyuy ?>" target="_blank">
							<img src="<?php echo $rutikk ?>" />
						</a>
					</figure>
				</div>
				<?php
					}
				?>
			</article>
		</article>
	</section>
	<footer>
		<article id="redes" class="auclasmarg">
			<a href="https://www.facebook.com/pages/Bodega-Los-Angeles-Inc/515911208524753?fref=ts" target="_blank"><span class="icon-facebook4"></span></a>
			<a href="" target="_blank"><span class="icon-twitter4"></span></a>
			<a href="https://instagram.com/losangelesinc/" target="_blank"><span class="icon-instagram2"></span></a>
			<a href="https://www.youtube.com/results?search_query=bodega+los+angelesinc" target="_blank"><span class="icon-youtube5"></span></a>
		</article>
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
		</article>
		<article class="fooffin">
			CONAXPORT © 2015 &nbsp;&nbsp;todos los derechos reservados &nbsp;- &nbsp;PBX (5) 841 733 &nbsp;&nbsp;Cúcuta - Colombia &nbsp;&nbsp;
			<a href="http://conaxport.com/" target="_blank">www.conaxport.com</a>
		</article>
	</footer>
	<script type="text/javascript">
		$(document).ready(function(){
		  $('.owl-carousel').owlCarousel({
				autoplay:true,
				autoplayTimeout:3000,
				autoplayHoverPause:true,
				dots:false,
				loop:false,
				margin:10,
				responsiveClass:true,
				nav:false,
				responsive:{
					0:{
						items:1
					},
					600:{
						items:2
					},
					1000:{
						items:4
					},
					1200:{
						items:6
					}
				}
			});
		});
	</script>
</body>
</html>
<?php
	}
?>