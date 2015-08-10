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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<meta name="description" content="Los Angeles Inc es una tienda que presenta las últimas tendencias de ropa americana para dama traída directamente de Los Ángeles" />
	<title>Angeles Inc</title>
	<link rel="icon" href="imagenes/icono.png" />
	<link rel="image_src" href="imagenes/icono.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/iconos/style.css" />
	<link rel="stylesheet" href="css/default/default.css" />
	<link rel="stylesheet" href="css/nivo_slider.css" />
	<link rel="stylesheet" href="css/owl_carousel.css" />
	<link rel="stylesheet" href="css/owl_theme_min.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/inicio.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/owl_carousel_min.js"></script>
	<script src="js/scrpag.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<center>
				<a href="">
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
				<li><a href="" class="selB">Inicio</a></li>
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
		<figure id="galery">
			<div class="slider-wrapper theme-default"><!--title="#caption1"-->
				<div id="slider" class="nivoSlider">
					<?php
						$imGy="SELECT * from galerya order by id_gal asc";
						$sql_Gy=mysql_query($imGy,$conexion) or die (mysql_error());
						while ($gy=mysql_fetch_array($sql_Gy)) {
							$idGal=$gy['id_gal'];
							$rutGal=$gy['rut_gal'];
					?>
					<img src="<?php echo $rutGal ?>" alt="imagen<?php echo $idGal ?>" />
					<?php
				 		}
				 	?>
				</div>
				<!--div id="caption1" style="display:none;">
					<span>Texto</span>
				</div>-->
			</div>
		</figure>
		<article id="automargen">
			<article class="ultm">
				<figure class="imgYp">
					<?php
						$ulA="SELECT * from producto order by cod_p desc limit 1";
						$sqluA=mysql_query($ulA,$conexion) or die (mysql_error());
						while ($ka=mysql_fetch_array($sqluA)) {
							$idka=$ka['cod_p'];
						}
						$igA="SELECT * from images_p where p_cod=$idka order by id_img_p asc limit 1";
						$sqiga=mysql_query($igA,$conexion) or die (mysql_error());
						$numAaa=mysql_num_rows($sqiga);
						if ($numAaa>0) {
							while ($gmaa=mysql_fetch_array($sqiga)) {
								$ruaa=$gmaa['ruta_p'];
							}
						}
						else{
							$ruaa="imagenes/productos/predeterminado.jpg";
						}
					?>
					<a href="productdescrip.php?cd=<?php echo $idka ?>">
						<img src="<?php echo $ruaa ?>" alt="imgP" />
					</a>
				</figure>
				<article class="tresul">
					<h2>Lo Ultimo!</h2>
					<article>
						<?php
							$igB="SELECT * from images_p where p_cod=$idka order by id_img_p asc limit 1,3";
							$sqigb=mysql_query($igB,$conexion) or die (mysql_error());
							while ($gmbb=mysql_fetch_array($sqigb)) {
								$rubb=$gmbb['ruta_p'];
						?>
						<figure>
							<a href="productdescrip.php?cd=<?php echo $idka ?>">
								<img src="<?php echo $rubb ?>" alt="recients" />
							</a>
						</figure>
						<?php
							}
						?>
					</article>
				</article>
			</article>
			<article class="categorias">
				<article id="gnC">
					<figure>
						<a href="productos/ind2x.php?tp=1">
							<figcaption>
								<span>Acesorios</span>
							</figcaption>
						</a>
						<img src="imagenes/phog.jpg" alt="acesorios" />
					</figure>
				</article>
				<article id="rsC">
					<article id="doscat">
						<figure>
							<a href="productos/ind2x.php?tp=2">
								<figcaption>
									<span>Blusas</span>
								</figcaption>
							</a>
							<img src="imagenes/phoc.jpg" alt="acesorios" />
						</figure>
						<figure>
							<a href="productos/ind2x.php?tp=3">
								<figcaption>
									<span>Jeans</span>
								</figcaption>
							</a>
							<img src="imagenes/phob.jpg" alt="acesorios" />
						</figure>
					</article>
					<article id="ulcat">
						<figure>
							<a href="productos/ind2x.php?tp=4">
								<figcaption>
									<span>Otros</span>
								</figcaption>
							</a>
							<img src="imagenes/phod.jpg" alt="acesorios" />
						</figure>
					</article>
				</article>
			</article>
		</article>
		<article class="otmn">
			<article id="automargen">
				<div id="ya"><a href="prensa">Eventos</a></div>
				<div id="yb"><a href="video">Videos</a></div>
				<div id="yc"><a href="contacto">Donde estamos</a></div>
			</article>
		</article>
		<article id="automargen">
			<h2 id="dosh">Recientes</h2>
		</article>
	</section>
	<section class="ulpdsec">
		<article id="automargen" class="flxgA">
			<?php
				$rrp="SELECT * from producto order by cod_p desc limit 8";
				$sql_rrp=mysql_query($rrp,$conexion) or die (mysql_error());
				while ($prrp=mysql_fetch_array($sql_rrp)) {
					$idPr=$prrp['cod_p'];
					$nmPr=$prrp['nam_p'];
					$clPr=$prrp['cl_id'];
					$tiPr=$prrp['tip_id'];
					$mkPr=$prrp['mark_id'];
					$cantPr=$prrp['cant_p'];
					$txtPr=$prrp['txt_p'];
					$ffPr=$prrp['fech_p'];
					$prAPr=$prrp['precA_p'];
					$prcPr=$prrp['precN_p'];
					$igC="SELECT * from images_p where p_cod=$idPr order by id_img_p asc limit 1";
					$sqigc=mysql_query($igC,$conexion) or die (mysql_error());
					$numCcc=mysql_num_rows($sqigc);
					if ($numCcc>0) {
						while ($gmcc=mysql_fetch_array($sqigc)) {
							$rucc=$gmcc['ruta_p'];
						}
					}
					else{
						$rucc="imagenes/productos/predeterminado.jpg";
					}
			?>
			<figure>
				<a href="productdescrip.php?cd=<?php echo $idPr ?>">
					<img src="<?php echo $rucc ?>" alt="<?php echo $nmPr ?>" />
				</a>
			</figure>
			<?php
				}
			?>
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
				<a href="" class="selB">Inicio</a>
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
		</article>
		<article class="fooffin">
			CONAXPORT © 2015 &nbsp;&nbsp;todos los derechos reservados &nbsp;- &nbsp;PBX (5) 841 733 &nbsp;&nbsp;Cúcuta - Colombia &nbsp;&nbsp;
			<a href="http://conaxport.com/" target="_blank">www.conaxport.com</a>
		</article>
	</footer>
	<script src="js/nivo_slider.js"></script>
	<script type="text/javascript">
		$(window).load(function(){
      $('#slider').nivoSlider({
					effect: 'fade',
					slices: 15,
					boxCols: 8,
					boxRows: 4,
					animSpeed: 500,
					pauseTime: 5000,
					pauseOnHover:true,
					startSlide: 0,
					directionNav: true,
					controlNav: false,
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