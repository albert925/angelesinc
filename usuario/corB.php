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
	$idsc=$_GET['id'];
	$codR=$_GET['cod'];
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
	<link rel="stylesheet" href="../css/default/default.css" />
	<link rel="stylesheet" href="../css/nivo_slider.css" />
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrpag.js"></script>
	<script src="../js/cambiusers.js"></script>
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
		<h1>Cambio paso 1</h1>
		<article id="automargen">
			<?php
				if ($idsc=="" || $codR=="") {
					echo "<script type='text/javascript'>";
						echo "alert('id o cod erroneo')";
						echo "var pagina='../';";
						echo "document.location.href=pagina;";
					echo "</script>";
				}
				else{
					$existe="SELECT * from usuario where id_us='$idsc' and cod_actv_us='$codR'";
					$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
					$numeroS=mysql_num_rows($sql_existe);
					if ($numeroS>0) {
						while ($sdCc=mysql_fetch_array($sql_existe)) {
							$nomusCc=$sdCc['nom_us'];
							$apusCc=$sdCc['ape_us'];
							$corVCc=$sdCc['cor_us'];
							$corN=$sdCc['corr_cambio'];
						}
						function rand_code($chars,$long)
						{
							$code="";
							for ($x=0; $x <=$long ; $x++) { 
								$rand=rand(1,strlen($chars));
								$code.=substr($chars, $rand,1);
							}
							return $code;
						}
						$caracteres="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012456789";
						$longitud=20;
						$codigoalBB=rand_code($caracteres,$longitud);

						$modificar="UPDATE usuario set cod_actv_us='$codigoalBB' where id_us='$idsc'";
						mysql_query($modificar,$conexion) or die (mysql_error());

						include '../miler/class.phpmailer.php';
						$mail=new PHPMailer();
						$body="<header bgcolor='#EC268F' color= '#fff'>
								<figure>
									<center>
										<img src='http://conaxport.com/angeles/imagenes/logo.png' alt='logo' width='40%' />
									</center>
								</figure>
								<h1>Angeles Inc</h1>
							</header>
							<section>
								<article>
									<p>
										Hola $nomusCc $apusCc, has solicitado cambio del correo anterior $corVCc, para cofirmar el cambio ingrese al link.
									</p>
									<p>
										Link de cambio correo: 
										<a style='padding: 0.5em 1em;background: #EC268F;color:#fff;text-decoration: none;' 
											href='http://conaxport.com/angeles/usuario/corC.php?cod=$codigoalBB&id=$idsc' target='_blank'>
											Confirmar Cambio
										</a>
									</p>
									<p>
										<b>Antención: </b>Si no has oslicitado cambio de correo y te llegó este correo ingnore el mensaje y borrelo inmediatamente. 
									</p>
								</article>
							</section>
							<footer style='background:#EC268F;color:#fff;margin-top: 1em;padding-bottom: 1em;'>
								<article style='margin: 0 auto;max-width: 800px;display: flex;justify-content: space-around;'>
									<article>
										<h2>Contacto</h2>
										<div>Dirección</div>
										<div>Teléfonos</div>
									</article>
									<article>
										<h2>Diseño</h2>
										<a href='http://conaxport.com/' target='_blank' id='cnxpt'>Conaxport</a>
									</article>
								</article>
							</footer>";
						$mail->SetFrom('contacto@AngelesInc.com','Angeles Inc');
						$mail->From = "contacto@AngelesInc.com";
						$mail->FromName = "Angeles Inc";
						$mail->AddReplyTo('contacto@AngelesInc.com','Angeles Inc');
						$address="$corN";
						$mail->AddAddress($address, "$nomusCc $apusCc");
						$mail->Subject = "Cambio de correo";
						$mail->AltBody = "Cuerpo alternativo del mensaje";
						$mail->MsgHTML($body);
						if(!$mail->Send()) {
							echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
						} 
						else {
			?>
			<h2>Solicitud confirmada</h2>
			<h5>Le ha llegado un mensaje al correo nuevo para cofirmar y terminar el cambio</h5>
			<script type="text/javascript">
				setTimeout(direcionar,5000);
				function direcionar () {
					window.location.href="../";
				}
			</script>
			<?php
						}
					}
					else{
						$quitarcod="UPDATE usuario set cod_actv_us='000' where id_us='$idsc'";
						mysql_query($quitarcod,$conexion) or die (mysql_error());
			?>
			<h2>Link Incorrecto</h2>
			<script type="text/javascript">
				setTimeout(direcionar,3000);
				function direcionar () {
					window.location.href="../";
				}
			</script>
			<?php
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