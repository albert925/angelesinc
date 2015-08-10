<?php
	session_start();
	include '../../config.php';
	if (isset($_SESSION['adm'])) {
		$usrRad=$_SESSION['adm'];
		$datos_adm="SELECT * from administrador where useradm='$usrRad'";
		$sql_datad=mysql_query($datos_adm,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_datad)) {
			$idad=$ad['id_adm'];
			$usad=$ad['useradm'];
			$corad=$ad['cor_adm'];
		}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<title>Angeles Inc</title>
	<link rel="icon" href="../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../css/normalize.css" />
	<link rel="stylesheet" href="../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../css/style.css" />
	<link rel="stylesheet" href="../../css/styleadmin.css" />
	<script src="../../js/jquery_2_1_1.js"></script>
	<script src="../../js/scripadmin.js"></script>
	<script src="../../js/admin.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<a href="">
				<img src="../../imagenes/2.png" alt="logo" />
			</a>
		</figure>
	</header>
	<article id="mnuPp">
		<nav id="mnP">
			<ul>
				<li class="submen" data-num="3"><a href="imagenes">Imágenes</a>
					<ul class="children3">
						<li><a href="markfoot">Marcas I.</a></li>
					</ul>
				</li>
				<li><a href="productos">Productos</a></li>
				<li class="submen" data-num="1">
					<a href="videos">Videos</a>
				</li>
				<li><a href="eventos">Eventos</a></li>
				<li class="submen" data-num="2"><a href="factura">Historial Ventas</a>
				</li>
				<li><a href="usuarios">Usuarios</a></li>
				<li><a href="sectores">Sectores</a></li>
				<li><a href="donde">Donde Estamos</a></li>
				<li><a href="../../cerrar">Salir</a></li>
			</ul>
		</nav>
		<div id="mnmov"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnA">
		<a href="" class="seliA"><?php echo "$usrRad"; ?></a>
	</nav>
	<section>
		<h1>Adminsitrador <?php echo "$usad"; ?></h1>
		<article id="automargen" class="artflex">
			<article class="columninput">
				<h2>Modificación Nombre Usuario</h2>
				<input type="text" value="<?php echo $usad ?>" id="usdF" />
				<div id="txB"></div>
				<input type="submit" value="Modificar" id="modifA" class="botonstyle" data-ad="<?php echo $idad ?>" />
			</article>
			<article class="columninput">
				<h2>Modificación Correo</h2>
				<input type="email" value="<?php echo $corad ?>" id="cordF" />
				<div id="txC"></div>
				<input type="submit" value="Modificar" id="modifB" class="botonstyle" data-ad="<?php echo $idad ?>" />
			</article>
			<article class="columninput">
				<h2>Modificación Contraseña</h2>
				<label>Contraseña Actual</label>
				<input type="password" id="psA" />
				<label>Contraseña Nueva</label>
				<input type="password" id="psNa" />
				<label>Repite la contraseña Nueva</label>
				<input type="password" id="psNb" />
				<div id="txD"></div>
				<input type="submit" value="Modificar" id="modifC" class="botonstyle" data-ad="<?php echo $idad ?>" />
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
				<a href="imagenes">Imágenes</a>
				<a href="productos">Productos</a>
				<a href="videos">Videos</a>
				<a href="eventos">Eventos</a>
				<a href="factura">Historial Ventas</a>
			</article>
			<article class="columart">
				<a href="usuarios">Usuarios</a>
				<a href="sectores">Sectores</a>
				<a href="donde">Donde Estamos</a>
				<a href="../../cerrar">Salir</a>
			</article> 
		</article>
		<article class="fooffin">
			CONAXPORT © 2015 &nbsp;&nbsp;todos los derechos reservados &nbsp;- &nbsp;PBX (5) 841 733 &nbsp;&nbsp;Cúcuta - Colombia &nbsp;&nbsp;
			<a href="http://conaxport.com/" target="_blank">www.conaxport.com</a>
		</article>
	</footer>
</body>
</html>
<?php
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../erroradmin.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>