<?php
	session_start();
	include '../../../config.php';
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
	<link rel="icon" href="../../../imagenes/icono.png" />
	<link rel="stylesheet" href="../../../css/normalize.css" />
	<link rel="stylesheet" href="../../../css/iconos/style.css" />
	<link rel="stylesheet" href="../../../css/style.css" />
	<link rel="stylesheet" href="../../../css/styleadmin.css" />
	<script src="../../../js/jquery_2_1_1.js"></script>
	<script src="../../../js/scripadmin.js"></script>
	<script src="../../../js/productos.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<a href="../">
				<img src="../../../imagenes/2.png" alt="logo" />
			</a>
		</figure>
	</header>
	<article id="mnuPp">
		<nav id="mnP">
			<ul>
				<li class="submen" data-num="3"><a href="../imagenes">Imágenes</a>
					<ul class="children3">
						<li><a href="../markfoot">Marcas I.</a></li>
					</ul>
				</li>
				<li><a class="selC" href="../productos">Productos</a></li>
				<li class="submen" data-num="1">
					<a href="../videos">Videos</a>
				</li>
				<li><a href="../eventos">Eventos</a></li>
				<li class="submen" data-num="2"><a href="../factura">Historial Ventas</a>
				</li>
				<li><a href="../usuarios">Usuarios</a></li>
				<li><a href="../sectores">Sectores</a></li>
				<li><a href="../donde">Donde Estamos</a></li>
				<li><a href="../../../cerrar">Salir</a></li>
			</ul>
		</nav>
		<div id="mnmov"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnA">
		<a href="../"><?php echo "$usrRad"; ?></a>
		<a href="../productos">Ver Productos</a>
		<a href="tipo_P.php">Tipos de Producto</a>
		<a href="clase_p.php" class="seliA">Colecciones</a>
		<a href="mark_p.php">Marcas de producto</a>
		<a href="img_p.php">Nueva Imagen Producto</a>
	</nav>
	<section>
		<h1>Colecciones</h1>
		<article id="automargen">
			<form action="#" method="post" enctype="multipart/form-data" id="nvCam_image" class="columninput">
				<label>Nuevo Coleccion</label>
				<input type="text" id="nmtC" name="nmtC" required="required" />
				<label>Imagen</label>
				<input type="file" id="gmcap" name="gmcap" required="required" />
				<label>Texto</label>
				<textarea id="tsdes" name="tsdes"></textarea>
				<div id="txC"></div>
				<input type="submit" value="Ingresar" id="tpC" class="botonstyle" />
			</form>
			<article class="flexjustyB">
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
				$ssql="SELECT * from tip_producto order by nam_tp asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from tip_producto order by nam_tp asc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idTP=$gh['id_tp'];
					$nmTP=$gh['nam_tp'];
					$rutTP=$gh['imag_col'];
					$txtTP=$gh['texto_tp'];
			?>
			<figure class="columninput">
				<img src="../../../<?php echo $rutTP ?>" alt="<?php echo $nmTP ?>" />
				<figcaption class="columninput">
					<article class="columninput">
						<input type="text" id="nmFtp_<?php echo $idTP ?>" value="<?php echo $nmTP ?>" />
						<textarea id="cartxt_<?php echo $idTP ?>"><?php echo "$txtTP"; ?></textarea>
						<div id="txD_<?php echo $idTP ?>"></div>
						<input type="submit" value="Modificar texto" id="botonB" class="cambiotp" data-id="<?php echo $idTP ?>" />
					</article>
					<form action="#" method="post" enctype="multipart/form-data" id="nvCm_<?php echo $idTP ?>" class="columninput" style="width:100%;">
						<input type="text" name="caid" id="caid_<?php echo $idTP ?>" value="<?php echo $idTP ?>" required="required" style="display:none;" />
						<input type="file" name="camgmF" id="camgmF_<?php echo $idTP ?>" required="required" />
						<div id="txDd_<?php echo $idTP ?>"></div>
						<input type="submit" value="Modificar imagen" id="botonB" class="cambgmcamp" data-id="<?php echo $idTP ?>" />
					</form>
					<a href="../../../borr_TP.php?br=<?php echo $idTP ?>" class="dell">Borrar</a>
				</figcaption>
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
						<a href="clase_p.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

			<?php
					}
				}
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
				<a href="../imagenes">Imágenes</a>
				<a href="../productos">Productos</a>
				<a href="../videos">Videos</a>
				<a href="../eventos">Eventos</a>
				<a href="../factura">Historial Ventas</a>
			</article>
			<article class="columart">
				<a href="../usuarios">Usuarios</a>
				<a href="../sectores">Sectores</a>
				<a href="../donde">Donde Estamos</a>
				<a href="../../../cerrar">Salir</a>
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
			echo "var pagina='../../erroradmin.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>