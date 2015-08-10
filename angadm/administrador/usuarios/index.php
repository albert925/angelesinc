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
	<script src="../../../js/usuarios.js"></script>
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
				<li><a href="../productos">Productos</a></li>
				<li class="submen" data-num="1">
					<a href="../videos">Videos</a>
				</li>
				<li><a href="../eventos">Eventos</a></li>
				<li class="submen" data-num="2"><a href="../factura">Historial Ventas</a>
				</li>
				<li><a class="selC" href="../usuarios">Usuarios</a></li>
				<li><a href="../sectores">Sectores</a></li>
				<li><a href="../donde">Donde Estamos</a></li>
				<li><a href="../../../cerrar">Salir</a></li>
			</ul>
		</nav>
		<div id="mnmov"><span class="icon-menu"></span></div>
	</article>
	<nav id="mnA">
		<a href="../"><?php echo "$usrRad"; ?></a>
	</nav>
	<section>
		<h1>Usuarios</h1>
		<article id="automargen">
			<article id="otraL" class="columninput">
			<?php
				error_reporting(E_ALL ^ E_NOTICE);
				$tamno_pagina=24;
				$pagina= $_GET['pagina'];
				if (!$pagina) {
					$inicio=0;
					$pagina=1;
				}
				else{
					$inicio= ($pagina - 1)*$tamno_pagina;
				}
				$ssql="SELECT * from usuario order by nom_us asc";
				$rs=mysql_query($ssql,$conexion) or die (mysql_error());
				$num_total_registros= mysql_num_rows($rs);
				$total_paginas= ceil($num_total_registros / $tamno_pagina);
				$gsql="SELECT * from usuario order by nom_us asc limit $inicio, $tamno_pagina";
				$impsql=mysql_query($gsql,$conexion) or die (mysql_error());
				while ($gh=mysql_fetch_array($impsql)) {
					$idus=$gh['id_us'];
					$avus=$gh['avat_us'];
					$ccus=$gh['cc_us'];
					$nomus=$gh['nom_us'];
					$apus=$gh['ape_us'];
					$corus=$gh['cor_us'];
					$celus=$gh['cel_us'];
					$telus=$gh['tel_us'];
					$depus=$gh['depart_id'];
					$munus=$gh['muni_id'];
					$dirus=$gh['direc_us'];
					$estdus=$gh['estd_us'];
					$tipus=$gh['tip_us'];
					$dpU="SELECT * from departamento where id_depart='$depus'";
					$sql_dpU=mysql_query($dpU,$conexion) or die (mysql_error());
					$numeroA=mysql_num_rows($sql_dpU);
					if ($numeroA>0) {
						while ($kUd=mysql_fetch_array($sql_dpU)) {
							$namdpt=$kUd['nam_depart'];
						}
					}
					else{
						$namdpt="";
					}
					$mnU="SELECT * from municipio where id_muni='$munus'";
					$sql_mnU=mysql_query($mnU,$conexion) or die (mysql_error());
					$numeroB=mysql_num_rows($sql_mnU);
					if ($numeroB>0) {
						while ($kUm=mysql_fetch_array($sql_mnU)) {
							$nammn=$kUm['nam_muni'];
						}
					}
					else{
						$nammn="";
					}
			?>
			<article id="cajas_al" class="flexjustyA">
				<div><b><?php echo "$idus"; ?></b></div>
				<div><?php echo "$nomus $apus"; ?></div>
				<div><?php echo "$corus"; ?></div>
				<div><?php echo "$telus/$celus"; ?></div>
				<div id="depar_muni"><?php echo "$namdpt/$nammn"; ?></div>
				<div>
					<select id="Cmes_<?php echo $idus ?>" class="cambiarE" data-us="<?php echo $idus ?>">
						<?php
							for ($cE=0; $cE <=2 ; $cE++) { 
								if ($cE==$estdus) {
									$selEs="selected";
								}
								else{
									$selEs="";
								}
								switch ($cE) {
									case '0':
										$plaestado="Estado";
										break;
									case '1':
										$plaestado="Activado";
										break;
									case '2':
										$plaestado="Desactivado";
										break;
									default:
										$plaestado="Error";
										break;
								}
						?>
						<option value="<?php echo $cE ?>" <?php echo $selEs ?>><?php echo "$plaestado"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
				<div>
					<select id="Tpus_<?php echo $idus ?>" class="cambTus" data-us="<?php echo $idus ?>">
						<?php
							for ($tU=0; $tU <=2 ; $tU++) { 
								if ($tU==$tipus) {
									$selTip="selected";
								}
								else{
									$selTip="";
								}
								switch ($tU) {
									case '0':
										$platipos="Tipos Usuario";
										break;
									case '1':
										$platipos="No puede ver precio";
										break;
									case '2':
										$platipos="Si puede ver precio";
										break;
									default:
										$platipos="Error";
										break;
								}
						?>
						<option value="<?php echo $tU ?>" <?php echo $selTip ?>><?php echo "$platipos"; ?></option>
						<?php
							}
						?>
					</select>
				</div>
			</article>
			<article id="carg_<?php echo $idus ?>"></article>
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