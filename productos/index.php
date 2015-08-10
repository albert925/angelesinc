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
		<a href="../productos" class="selB">Productos</a>
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
	<h1>PRODUCTOS</h1>
	<!-- <figure id="fodB" class="modelang">
		<h1>COLECCIONES</h1>
	</figure> -->
	<section>
		<article class="anuncio">
			<p>
				SOMOS UNA BODEGA ONLINE, POR ESO LAS COMPRAS MINIMAS SON DE $200.000
			</p>
		</article>
		<article id="filtros">
			<select id="orD" data-tp="0">
				<?php
					for ($dro=0; $dro <=4 ; $dro++) { 
						switch ($dro) {
							case '0':
								$plaorder="Ordernar Por";
								break;
							case '1':
								$plaorder="A-Z";
								break;
							case '2':
								$plaorder="Z-A";
								break;
							case '3':
								$plaorder="Menor a Mayor precio";
								break;
							case '4':
								$plaorder="Mayor a Menor precio";
								break;
							default:
								$plaorder="Error";
								break;
						}
				?>
				<option value="<?php echo $dro ?>"><?php echo "$plaorder"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="pTP" data-tp="0">
				<option value="0">Clases de Producto</option>
				<?php
					$Ucl="SELECT * from tip_producto order by nam_tp asc";
					$sql_Ucl=mysql_query($Ucl,$conexion) or die (mysql_error());
					while ($wa=mysql_fetch_array($sql_Ucl)) {
						$idclU=$wa['id_tp'];
						$nmclU=$wa['nam_tp'];
				?>
				<option value="<?php echo $idclU ?>"><?php echo "$nmclU"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="pMK" data-tp="0">
				<option value="0">Marca de Producto</option>
				<?php
					$Umk="SELECT * from marca order by nam_mk asc";
					$sql_Umk=mysql_query($Umk,$conexion) or die (mysql_error());
					while ($wb=mysql_fetch_array($sql_Umk)) {
						$idUmk=$wb['id_mk'];
						$nmUmk=$wb['nam_mk'];
				?>
				<option value="<?php echo $idUmk ?>"><?php echo "$nmUmk"; ?></option>
				<?php
					}
				?>
			</select>
			<label><b>Precio: </b></label>
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
				if ($tipus!="1") {
			?>
			<label><i>$</i><i id="precrangmin"><?php echo "$mi"; ?></i></label>
			<?php
				}
			?>
			<input type="range" id="preciorangi" min="<?php echo $mi ?>" max="<?php echo $ma ?>" step="2" value="<?php echo $mi ?>" data-tp="0" />
			<input type="range" id="preciorangx" min="<?php echo $mi ?>" max="<?php echo $ma ?>" step="2" value="<?php echo $ma ?>" data-tp="0" />
			<?php
				if ($tipus!="1") {
			?>
			<label><i>$</i><i id="precrangmax"><?php echo "$ma"; ?></i></label>
			<?php
				}
			?>
		</article>
		<article id="nw_produ">
			<nav id="mnV">
				<h2>Colecciones</h2>
				<?php
					$menP="SELECT * from cliente order by id_cl asc";
					$sql_menP=mysql_query($menP,$conexion) or die (mysql_error());
					while ($pnm=mysql_fetch_array($sql_menP)) {
						$idMP=$pnm['id_cl'];
						$nmMP=$pnm['nam_cl'];
				?>
				<a href="../productos/ind2x.php?tp=<?php echo $idMP ?>"><?php echo "$nmMP"; ?></a>
				<?php
					}
				?>
			</nav>
			<article id="prdonw">
				<?php
						error_reporting(E_ALL ^ E_NOTICE);
						$tamno_pagina=30;
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
				?>
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
				<article class="flexartclC">
					<?php
						$gsql="SELECT * from producto order by cod_p desc limit $inicio, $tamno_pagina";
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
					<figure id="galcl_<?php echo $idPr ?>" data-id="<?php echo $idPr ?>"><!--class="gelcl"-->
						<a href="../productdescrip.php?cd=<?php echo $idPr ?>">
							<img src="../<?php echo $rutaP ?>" alt="imagen_<?php echo $idPr ?>" />
						</a>
						<figcaption class="columninput">
							<b><?php echo "$nmPr"; ?></b>
							<?php
								if ($tipus!="1") {
							?>
							<b><strike>$<?php echo "$precioUno"; ?></strike></b>
							<b>$<?php echo "$precioDos"; ?></b>
							<?php
								}
							?>
						</figcaption>
					</figure>
					<article id="popupContact_<?php echo $idPr ?>" class="popupContact" data-id="<?php echo $idPr ?>">
						<a id="popupContactClose_<?php echo $idPr ?>" class="popupContactClose" data-id="<?php echo $idPr ?>">x</a>
						<article id="contactArea" class="dise">
							<figure id="galerias">
								<img id="cloudzoom<?php echo $idPr ?>" class="cloudzoom" src="../<?php echo $rutaP ?>" alt="imagen" 
									data-cloudzoom="zoomImage: '../<?php echo $rutaP ?>',zoomPosition: 'inside',autoInside: true" />
								<figcaption>
									<?php
										$todas_las_imagesP="SELECT * from images_p where p_cod='$idPr' order by id_img_p";
										$sql_todas=mysql_query($todas_las_imagesP,$conexion) or die (mysql_error());
										while ($kgmi=mysql_fetch_array($sql_todas)) {
											$idgT=$kgmi['id_img_p'];
											$rugT=$kgmi['ruta_p'];
									?>
									<img class="cloudzoom-gallery" src="../<?php echo $rugT ?>" 
										data-cloudzoom="useZoom: '#cloudzoom<?php echo $idPr ?>', image: '../<?php echo $rugT ?>', zoomImage: '../<?php echo $rugT ?>'" />
									<?php
										}
									?>
								</figcaption>
								<script type="text/javascript">
									CloudZoom.quickStart();
								</script> 
							</figure>
							<article id="descproduct">
								<h2><?php echo "$nmPr"; ?></h2>
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
								<!-- <article id="select">
									<label><b>Tallas</b></label>
									<select>
										<option>Selecione</option>
										<option>11</option>
										<option>12</option>
									</select>
								</article> -->
								<?php
									if ($tipus!="1") {
								?>
								<a href="../carrito.php?cod=<?php echo $idPr ?>">Comprar</a>
								<?php
									}
								?>
								<article>
									<h5>Detalles</h5>
									<?php echo "$nmclO"; ?> 
									<?php echo "$nmtpO"; ?> 
									<?php echo "$nmmkO"; ?> 
									<article>
										<?php echo "$txtPr"; ?>
									</article>
								</article>
							</article>
						</article>
					</article>
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
		</article>
	</section>
	<footer>
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="../">Inicio</a>
				<a href="../nosotros">Empresa</a>
				<a href="../campa">Colecciones</a>
				<a href="../productos" class="selB">Productos</a>
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