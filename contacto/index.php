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
	<link rel="stylesheet" href="../css/iconos/style.css" />
	<link rel="stylesheet" href="../css/style.css" />
	<link rel="stylesheet" href="../css/contact.css" />
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
			<center>
				<a href="../">
					<img src="../imagenes/2.png" alt="logo" />
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
				<a href="../carrito.php">
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
				<li><a href="../index.php">Inicio</a></li>
				<li><a href="../nosotros">Empresa</a></li>
				<li><a href="../campa">Colecciones</a></li>
				<li class="submen" data-num="1"><a href="../productos">Productos</a>
					<ul class="children1">
						<?php
							$CLou="SELECT * from cliente order by nam_cl asc";
							$sql_clou=mysql_query($CLou,$conexion) or die (mysql_error());
							while ($ouA=mysql_fetch_array($sql_clou)) {
								$idCLy=$ouA['id_cl'];
								$nmCLy=$ouA['nam_cl'];
						?>
						<li><a href="../productos/ind2x.php?tp=<?php echo $idCLy ?>"><?php echo "$nmCLy"; ?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><a href="../prensa">Eventos</a></li>
				<li class="submen" data-num="2"><a class="selB" href="../contacto">Contacto</a>
					<ul class="children2">
						<li><a class="selB" href="../contacto">Donde Estamos</a></li>
						<li><a href="../contacto/ind2x.php">Contáctenos</a></li>
					</ul>
				</li>
				<?php
					if ($inicius=="0") {
						//<li><a href="../video">Videos</a></li>
				?>
				<li><a href="../registro" id="reg">Usuario</a></li>
				<?php
					}
					else{
				?>
				<li class="submen" data-num="3"><a href="../usuario"><?php echo "$nomus"; ?></a>
					<ul class="children3">
						<li><a href="../usuario">Información</a></li>
						<li><a href="../factura">Historial o Compras</a></li>
						<li><a href="../cerrar/us.php">Salir</a></li>
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
</body>
</html>