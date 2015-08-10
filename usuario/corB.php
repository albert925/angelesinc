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
		<a href="../nosotros">Marca</a>
		<a href="../campa">Colecciones</a>
		<a href="../productos">Productos</a>
		<a href="../video">Videos</a>
		<a href="../prensa">Prensa</a>
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
		<a href="../registro" id="reg">Inicio/Registrarse</a>
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
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="../">Inicio</a>
				<a href="../nosotros">Marca</a>
				<a href="../campa">Colecciones</a>
				<a href="../productos">Productos</a>
				<a href="../video">Videos</a>
			</article>
			<article class="columart">
				<a href="../prensa">Prensa</a>
				<a href="../contacto">Donde Estamos</a>
				<a href="../contacto/ind2x.php">Contáctenos</a>
				<?php
					if ($inicius=="0") {
				?>
				<a href="../registro">Inicio/Registrarse</a>
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