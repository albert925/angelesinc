<?php
	include 'config.php';
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
			$imaavatar=$avus;
		}
	}
	else{
		$inicius="0";
		$tipus="1";
		$imaavatar="imagenes/avatar/default.png";
	}
	if ($tipus=="1") {
		$csssubm="right: 12%;";
	}
	else{
		$csssubm="right: 5%;";
	}
	error_reporting(E_ALL ^ E_NOTICE);
	$idProductoG=$_GET['cod'];
	if ($idProductoG!="" && $idProductoG!="0") {
		if (isset($_SESSION['carrito'])) {
			$arreglo=$_SESSION['carrito'];
			$encontro=false;
			$numero=0;
			for ($i=0; $i <count($arreglo) ; $i++) { 
				if ($arreglo[$i]['Id']==$idProductoG) {  //$arreglo[$i]['Id']==$idProductoG
					$encontro=true;
					$numero=$i;
				}
			}
			if ($encontro==true) {
				//$arreglo['cant']=$arreglo['cant']+1;
				$arreglo[$numero]['Cant']=$arreglo[$numero]['Cant']+1;
				$_SESSION['carrito']=$arreglo;
			}
			else{
				$skt="SELECT * from producto where cod_p='$idProductoG'";
				$re=mysql_query($skt,$conexion) or die (mysql_error());
				while ($j=mysql_fetch_array($re)) {
					$idP=$j['cod_p'];
					$nmP=$j['nam_p'];
					$cantP=$j['cant_p'];
					$pcvP=$j['precA_p'];
					$pcnP=$j['precN_p'];
				}
				$imagenP="SELECT * from images_p where p_cod='$idProductoG' 
					order by id_img_p asc limit 1";
				$serty=mysql_query($imagenP,$conexion) or die (mysql_error());
				while ($gtp=mysql_fetch_array($serty)) {
					$idimgpro=$gtp['id_img_p'];
					$imagen=$gtp['ruta_p'];
				}
				$datosnuevos= array('Id'=>$idProductoG,
														'Nomb'=>$nmP, 
														'Precv'=>$pcvP,
														'Prec'=>$pcnP,  
														'Imag'=>$imagen,
														'Cantmx'=>$cantP,
														'Cant'=>1);
				array_push($arreglo, $datosnuevos);
				$_SESSION['carrito']=$arreglo;
			}
		}
		else{
			if ($idProductoG) {
				/*$nombre="";
				$precio=0;
				$imagen="";*/
				$skt="SELECT * from producto where cod_p='$idProductoG'";
				$re=mysql_query($skt,$conexion) or die (mysql_error());
				while ($j=mysql_fetch_array($re)) {
					$idP=$j['cod_p'];
					$nmP=$j['nam_p'];
					$cantP=$j['cant_p'];
					$pcvP=$j['precA_p'];
					$pcnP=$j['precN_p'];
				}
				$imagenP="SELECT * from images_p where p_cod='$idProductoG' 
					order by id_img_p asc limit 1";
				$serty=mysql_query($imagenP,$conexion) or die (mysql_error());
				while ($gtp=mysql_fetch_array($serty)) {
					$idimgpro=$gtp['id_img_p'];
					$imagen=$gtp['ruta_p'];
				}
				$arreglo[]= array('Id'=>$idProductoG,
														'Nomb'=>$nmP, 
														'Precv'=>$pcvP,
														'Prec'=>$pcnP,  
														'Imag'=>$imagen,
														'Cantmx'=>$cantP,
														'Cant'=>1);
				$_SESSION['carrito']=$arreglo;
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<title>Angeles Inc productos descripción</title>
	<link rel="icon" href="imagenes/icono.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/carrito.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/scrpag.js"></script>
	<script src="js/carrito.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<a href="index.php">
				<img src="imagenes/2.png" alt="logo" />
			</a>
		</figure>
		<aside id="extr">
			<input type="search" id="bgnP" placeholder="Busqueda" />
			<!-- <figure style="background-image:url(<?php echo $imaavatar ?>);"></figure> -->
		</aside>
	</header>
	<nav id="mnP">
		<a href="index.php">Inicio</a>
		<a href="nosotros">Empresa</a>
		<a href="campa">Colecciones</a>
		<a href="productos">Productos</a>
		<a href="video">Videos</a>
		<a href="prensa">Eventos</a>
		<a href="contacto">Donde Estamos</a>
		<a href="contacto/ind2x.php">Contáctenos</a>
		<?php
			if ($tipus!="1") {
		?>
		<a href="carrito.php" id="carajax">Mi carrito (0 artículo[$000])</a>
		<?php
			}
		?>
		<?php
			if ($inicius=="0") {
		?>
		<a href="registro" id="reg">Mi perfil/Regístrate</a>
		<?php
			}
			else{
		?>
		<a href="usuario" id="log"><?php echo "$nomus"; ?></a>
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
		<a href="usuario">Información</a>
		<a href="factura">Historial o Compras</a>
		<a href="cerrar/us.php">Salir</a>
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
		<hgroup>
			<h1>Carrito de Compras</h1>
			<h2>Proceso de compra en línea</h2>
		</hgroup>
		<nav id="pasos">
			<div id="Psa" class="fonflechas">
				<h2>Paso 1</h2>
				<span>
					Revisa los Productos <br/>de tu Carrito.
				</span>
			</div>
			<div class="fonflechas">
				<h2>Paso 2</h2>
				<span>
					Completa el formulario <br/>con tus datos de envio.
				</span>
			</div>
			<div class="fonflechas">
				<h2>Paso 3</h2>
				<span>
					Verifica tu orden y <br/>finaliza tu compra.
				</span>
			</div>
		</nav>
		<article id="automargen">
			<table>
				<tr id="disTH">
					<td><b>Producto</b></td>
					<td><b>Precio</b></td>
					<td><b>Cantidad</b></td>
					<td><b>Subtotal</b></td>
					<td><b>Eliminar</b></td>
				</tr>
				<?php
					$total=0;
					if (isset($_SESSION['carrito'])) {
						$datos=$_SESSION['carrito'];
						$total=0;
						for ($i=0; $i <count($datos) ; $i++) { 
				?>
				<tr id="fila_<?php echo $datos[$i]['Id'] ?>">
					<td>
						<figure id="im_carrito">
							<img src="<?php echo $datos[$i]['Imag'] ?>" alt="imagen_<?php echo $datos[$i]['Id'] ?>" />
							<figcaption>
								<?php echo $datos[$i]['Nomb']; ?>
							</figcaption>
						</figure>
					</td>
					<td>
						<?php
							$unoNum=number_format($datos[$i]['Prec']);
							$dosNum=number_format($datos[$i]['Precv']);
						?>
						<b>$<s><?php echo "$dosNum"; ?></s></b><br />
						<b>$<?php echo "$unoNum"; ?></b>
					</td>
					<td>
						<input type="number" class="cant_carrito" id="cantCar_<?php echo $datos[$i]['Id'] ?>" 
							value="<?php echo $datos[$i]['Cant'] ?>" data-id="<?php echo $datos[$i]['Id'] ?>" 
							data-prec="<?php echo $datos[$i]['Prec'] ?>" min="0" max="<?php echo $datos[$i]['Cantmx'] ?>" />
						<div id="load_<?php echo $datos[$i]['Id'] ?>"></div>
					</td>
					<td>
						$<span id="subto_<?php echo $datos[$i]['Id'] ?>">
							<?php
								$sub=$datos[$i]['Cant']*$datos[$i]['Prec'];
								$formatSubtotal=number_format($sub);
								echo "$formatSubtotal";
							?>
						</span>
					</td>
					<td>
						<center>
							<div class="eliminar_carr" data-id="<?php echo $datos[$i]['Id'] ?>"></div>
						</center>
					</td>
				</tr>
				<?php
							$total=($datos[$i]['Cant']*$datos[$i]['Prec'])+$total;
						}
					}
					else{
				?>
				<tr>
					<td colspan="5">
						<center>No has añadido ningún producto</center>
					</td>
				</tr>
				<?php
					}
				?>
				<tr id="disTotal">
					<td colspan="2"></td>
					<td>
						<b>Total:</b>
					</td>
					<td colspan="2">
						<b>$<span id="totalcompletado"><?php $fomrTotal=number_format($total); echo "$fomrTotal"; ?></span></b>
					</td>
				</tr>
			</table>
		</article>
		<article id="automargen" class="ifor_carrito">
			<h3>Recuerda que una vez finalices tu compra, no podrás realizar cambios. </h3>
			<figure id="ifcA">
				<img src="imagenes/car_a.png" alt="duracion" />
				<figcaption>
					<p>
						<b>Duración carrito:</b> Tu pedido estará activo durante las siguientes 24 horas, 
						sin embargo, no será reservados los productos hasta que finalices por completo la 
						orden.
					</p>
				</figcaption>
			</figure>
			<figure id="ifcB">
				<img src="imagenes/car_b.png" alt="despacho" />
				<figcaption>
					<p>
						<b>Depacho de orden:</b> Una vez confirmado el pago, 
						el despacho se realizará en un plazo máximo de 24 horas. <br />
						*Válido sólo para Colombia.
					</p>
				</figcaption>
			</figure>
			<figure id="ifcC">
				<img src="imagenes/car_c.png" alt="anulada" />
				<figcaption>
					<p>
						<b>Orden anulada:</b> La validez de tu orden, una vez la finalices, será de 48 horas. 
						Si en este tiempo no recibimos información de tu pago, la orden será anulada.
					</p>
				</figcaption>
			</figure>
		</article>
		<div id="botonSps">
			<a href="productos" class="prd" data-pla="A">Elegir mas productos</a>
			<?php
				if ($total!=0) {
			?>
			<a id="fcompr" href="carrito_psB.php" class="fcp">Continuar el proceso de Compra</a>
			<?php
				}
			?>
		</div>
	</section>
	<footer>
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="index.php">Inicio</a>
				<a href="nosotros">Empresa</a>
				<a href="campa">Colecciones</a>
				<a href="productos">Productos</a>
				<a href="video">Videos</a>
			</article>
			<article class="columart">
				<a href="prensa">Eventos</a>
				<a href="contacto">Donde Estamos</a>
				<a href="contacto/ind2x.php">Contáctenos</a>
				<?php
					if ($inicius=="0") {
				?>
				<a href="registro">Mi perfil/Regístrate</a>
				<?php
					}
					else{
				?>
				<a href="usuario"><?php echo "$nomus"; ?></a>
				<?php
					}
				?>
				<div>
					<a href="politicas.php">Políticas</a> y <a href="terminos.php">Terminos y condiciones</a>
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