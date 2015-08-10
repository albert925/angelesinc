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
	<script src="../../../ckeditor/ckeditor.js"></script>
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
		<a href="#" id="nvB">Nuevo Producto</a>
		<a href="tipo_P.php">Tipos de Producto</a>
		<a href="clase_p.php">Colecciones</a>
		<a href="mark_p.php">Marcas de producto</a>
		<a href="img_p.php">Nueva Imagen Producto</a>
	</nav>
	<section>
		<h1>Productos</h1>
		<article id="automargen">
			<article id="mB" class="ocultingre">
				<form action="new_producto.php" method="post" class="columninput">
					<label><b>Nombre</b></label>
					<input type="text" name="nmP" required="required" />
					<label><b>Tipo</b></label>
					<select id="Stp" name="Stp">
						<option value="0">Selecione</option>
						<?php
							$tpV="SELECT * from cliente order by nam_cl asc";
							$sql_tpV=mysql_query($tpV,$conexion) or die (mysql_error());
							while ($tP=mysql_fetch_array($sql_tpV)) {
								$idTP=$tP['id_cl'];
								$nmTP=$tP['nam_cl'];
						?>
						<option value="<?php echo $idTP ?>"><?php echo "$nmTP"; ?></option>
						<?php
							}
						?>
					</select>
					<label><b>Campaña</b></label>
					<select id="Scl" name="Scl">
						<option value="0">Selecione</option>
						<?php
							$clV="SELECT * from tip_producto order by nam_tp asc";
							$sql_clV=mysql_query($clV,$conexion) or die (mysql_error());
							while ($tC=mysql_fetch_array($sql_clV)) {
								$idCL=$tC['id_tp'];
								$nmCL=$tC['nam_tp'];
						?>
						<option value="<?php echo $idCL ?>"><?php echo "$nmCL"; ?></option>
						<?php
							}
						?>
					</select>
					<label><b>Marca</b></label>
					<select id="Smk" name="Smk">
						<option value="0">Selecione</option>
						<?php
							$mkV="SELECT * from marca order by nam_mk asc";
							$sql_mkV=mysql_query($mkV,$conexion) or die (mysql_error());
							while ($tK=mysql_fetch_array($sql_mkV)) {
								$idMK=$tK['id_mk'];
								$nmMK=$tK['nam_mk'];
						?>
						<option value="<?php echo $idMK ?>"><?php echo "$nmMK"; ?></option>
						<?php
							}
						?>
					</select>
					<label><b>Precio superior</b></label>
					<input type="number" name="pcA" placeholder="solo números (10000.00)" required />
					<label><b>Precio inferior</b></label>
					<input type="number" name="pcN" placeholder="solo números (10000.00)" required="required" />
					<label><b>Precio acesorios</b></label>
					<input type="number" name="pcT" placeholder="solo números (10000.00)" required />
					<label><b>Cantidad</b></label>
					<input type="number" name="cant" required="required" />
					<label><b>Descripción</b></label>
					<textarea name="desP" id="editor1"></textarea>
					<script>
						CKEDITOR.replace('desP');
					</script>
					<div id="msPP"></div>
					<input type="submit" value="Ingresar" class="botonstyle" />
				</form>
			</article>
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
					$ssql="SELECT * from producto order by cod_p desc";
					$rs=mysql_query($ssql,$conexion) or die (mysql_error());
					$num_total_registros= mysql_num_rows($rs);
					$total_paginas= ceil($num_total_registros / $tamno_pagina);
					$gsql="SELECT * from producto order by cod_p desc limit $inicio, $tamno_pagina";
					$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
					while ($gh=mysql_fetch_array($impsql)) {
						$idPr=$gh['cod_p'];
						$nmPr=$gh['nam_p'];
						$primera_imagen="SELECT * from images_p where p_cod='$idPr' order by id_img_p asc limit 1";
						$sql_pryimg=mysql_query($primera_imagen,$conexion) or die (mysql_error());
						$numimages=mysql_num_rows($sql_pryimg);
						if ($numimages>0) {
							while ($gmk=mysql_fetch_array($sql_pryimg)) {
								$rutaP=$gmk['ruta_p'];
							}
						}
						else{
							$rutaP="imagenes/productos/predeterminado.jpg";
						}
				?>
				<figure>
					<h2><?php echo "$nmPr"; ?></h2>
					<img src="../../../<?php echo $rutaP ?>" alt="imagen_<?php echo $idPr ?>" />
					<figcaption class="columninput">
						<a href="images_pd.php?PD=<?php echo $idPr ?>" class="lkP">Imagenes</a>
						<a href="dat_prd.php?PD=<?php echo $idPr ?>" class="lkP">Modificar</a>
						<a href="../../../borr_prdT.php?br=<?php echo $idPr ?>" class="dell">Borrar</a>
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
							<a href="index.php?pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>

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