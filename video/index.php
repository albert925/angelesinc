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
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrpag.js"></script>
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
				<li class="submen" data-num="2"><a href="../contacto">Contacto</a>
					<ul class="children2">
						<li><a href="../contacto">Donde Estamos</a></li>
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
		<h1>VIDEOS</h1>
	</figure>
	<section id="automargen">
		<article class="fleaxtDlx">
			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$tamno_pagina=15;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from videos order by nam_vid asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from videos order by nam_vid asc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idV=$gh['id_video'];
					$nmV=$gh['nam_vid'];
					$imgV=$gh['ima_vd'];
					$ffV=$gh['fec_vid'];
			?>
			<figure id="vidL">
				<h2><?php echo "$nmV"; ?></h2>
				<a href="ind2x.php?vd=<?php echo $idV ?>">
					<img src="../<?php echo $imgV ?>" alt="<?php echo $nmV ?>" />
				</a>
			</figure>
			<?php
				}
			?>
		</article>
		<article>
			<br />
			<b>Páginas: </b>
			<?php
			//muestro los distintos indices de las paginas
			if ($total_paginas>1) {
				for ($i=1; $i <=$total_paginas ; $i++) { 
					if ($pagina==$i) {
						//si muestro el indice del la pagina actual, no coloco enlace
			?>
				<b><?php echo $pagina." "; ?></b>
			<?php
					}
					else{
						//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página 
			?>
						<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

			<?php
					}
				}
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