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

	$tipoRR=$_GET['ez'];
	$a=$_GET['fa'];//odernar
	$b=$_GET['fb'];//clases
	$c=$_GET['fc'];//marca
	$d=$_GET['min'];//minimo
	$e=$_GET['max'];//maximo
	switch ($tipoRR) {
		case '':
			$eztp="1";
			break;
		case '0':
			$eztp="1";
			break;
		default:
			$eztp="cl_id='$tipoRR'";
			break;
	}
	switch ($a) {
		case '':
			$aa="order by precN_p asc";
			break;
		case '0':
			$aa="order by precN_p asc";
			break;
		case '1':
			$aa="order by nam_p asc";
			break;
		case '2':
			$aa="order by nam_p desc";
			break;
		case '3':
			$aa="order by precN_p asc";
			break;
		case '4':
			$aa="order by precN_p desc";
			break;
		default:
			$aa="order by precN_p asc";
			break;
	}
	switch ($b) {
		case '':
			$bb="";
			break;
		case '0':
			$bb="";
			break;
		default:
			$bb="and tip_id='$b'";
			break;
	}
	switch ($c) {
		case '':
			$cc="";
			break;
		case '0':
			$cc="";
			break;
		default:
			$cc="and mark_id='$c'";
			break;
	}
	switch ($d) {
		case '':
			$dd="";
			break;
		case '0':
			$dd="";
			break;
		default:
			$dd="and precN_p>='$d'";
			break;
	}
	switch ($e) {
		case '':
			$ee="";
			break;
		case '0':
			$ee="";
			break;
		default:
			$ee="and precN_p<='$e'";
			break;
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
	<link rel="stylesheet" href="../css/productos.css" />
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
				<li class="submen" data-num="1"><a class="selB" href="../productos">Productos</a>
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
			<select id="orD" data-tp="<?php echo $tipoRR ?>">
				<?php
					for ($dro=0; $dro <=4 ; $dro++) {
						if ($dro==$a) {
							$selaa="selected";
						}
						else{
							$selaa="";
						}
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
				<option value="<?php echo $dro ?>" <?php echo $selaa ?>><?php echo "$plaorder"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="pTP" data-tp="<?php echo $tipoRR ?>">
				<option value="0">Clases de Producto</option>
				<?php
					$Ucl="SELECT * from tip_producto order by nam_tp asc";
					$sql_Ucl=mysql_query($Ucl,$conexion) or die (mysql_error());
					while ($wa=mysql_fetch_array($sql_Ucl)) {
						$idclU=$wa['id_tp'];
						$nmclU=$wa['nam_tp'];
						if ($idclU==$b) {
							$selbb="selected";
						}
						else{
							$selbb="";
						}
				?>
				<option value="<?php echo $idclU ?>" <?php echo $selbb ?>><?php echo "$nmclU"; ?></option>
				<?php
					}
				?>
			</select>
			<select id="pMK" data-tp="<?php echo $tipoRR ?>">
				<option value="0">Marca de Producto</option>
				<?php
					$Umk="SELECT * from marca order by nam_mk asc";
					$sql_Umk=mysql_query($Umk,$conexion) or die (mysql_error());
					while ($wb=mysql_fetch_array($sql_Umk)) {
						$idUmk=$wb['id_mk'];
						$nmUmk=$wb['nam_mk'];
						if ($idUmk==$c) {
							$selcc="selected";
						}
						else{
							$selcc="";
						}
				?>
				<option value="<?php echo $idUmk ?>" <?php echo $selcc ?>><?php echo "$nmUmk"; ?></option>
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
			<input type="range" id="preciorangi" value="<?php echo $d ?>" min="<?php echo $mi ?>" max="<?php echo $ma ?>" step="2" value="<?php echo $mi ?>" data-tp="<?php echo $tipoRR ?>" />
			<input type="range" id="preciorangx" value="<?php echo $e ?>" min="<?php echo $mi ?>" max="<?php echo $ma ?>" step="2" value="<?php echo $ma ?>" data-tp="<?php echo $tipoRR ?>" />
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
						if ($idMP==$tipoRR) {
							$csscl="style='color: #EC268F;'";
						}
						else{
							$csscl="";
						}
				?>
				<a <?php echo $csscl ?> href="../productos/ind2x.php?tp=<?php echo $idMP ?>"><?php echo "$nmMP"; ?></a>
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
						$ssql="SELECT * from producto where $eztp $bb $cc $dd $ee $aa";
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
								<a href="ind3x.php?ez=<?php echo $tipoRR ?>&fa=<?php echo $a ?>
								&fb=<?php echo $b ?>&fc=<?php echo $c ?>&min=<?php echo $d ?>&max=<?php echo $e ?>
								&pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>
					<?php
							}
						}
					}
					?>
				</article>
				<article class="flexartclC">
					<?php
						$gsql="SELECT * from producto where $eztp $bb $cc $dd $ee $aa limit $inicio, $tamno_pagina";
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
								<a href="ind3x.php?ez=<?php echo $tipoRR ?>&fa=<?php echo $a ?>
								&fb=<?php echo $b ?>&fc=<?php echo $c ?>&min=<?php echo $d ?>&max=<?php echo $e ?>
								&pagina=<?php echo $i ?>"><?php echo "$i"; ?></a>
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