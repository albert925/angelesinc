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
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, maximun-scale=1" />
	<title>Angeles Inc</title>
	<link rel="icon" href="imagenes/icono.png" />
	<link rel="stylesheet" href="css/normalize.css" />
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/politermn.css" />
	<script src="js/jquery_2_1_1.js"></script>
	<script src="js/scrpag.js"></script>
	<script src="js/termypoli.js"></script>
</head>
<body>
	<header>
		<figure id="logo">
			<center>
				<a href="index.php">
					<img src="imagenes/2.png" alt="logo" />
				</a>
			</center>
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
		<article id="automargen" class="animflx">
			<nav id="mnF">
				<div id="aT">TÉRMINOS Y CONDICIONES EN EL MOMENTO DE REGISTRO</div>
				<div id="bT">INCRIPCIÓN O REGISTRO</div>
				<div id="cT">SERVICIO DE ATENCIÓN</div>
				<div id="dT">MÉTODOS DE PAGO Y CONDICIONES</div>
			</nav>
			<section id="cjPs">
				<article id="cja" class="cajterpol" style="height:350px;">
					<h1>TÉRMINOS Y CONDICIONES EN EL MOMENTO DE REGISTRO</h1>
					<p>
						Los ángeles Inc., en Cúcuta y Medellín, coloca a disposición de sus clientes la posibilidad de comprar sus productos a través de internet los siguientes términos; 
						a continuación se enumeran deben ser aceptados por el cliente como requisitos y condición para realizar alguna compra por este sitio.
					</p>
					<p>
						Los Ángeles inc. Se reserva el derecho de aceptar las compras cuando el cliente cumpla con los términos y condiciones acá enumerados.
					</p>
				</article>
				<article id="cjb" class="cajterpol">
					<h2>INCRIPCIÓN O REGISTRO</h2>
					<p>
						Los Ángeles inc. Requiere tener un registro de los datos del cliente que nos permita tener un trato personal y directo y es por esto que debe 
						ingresar a la sección de registro encontrara un formulario, el cual debe ser completados según los requisitos allí establecidos.
					</p>
					<p>
						Una vez el cliente registre sus datos estarán guardados en la base de datos de NUESTRAS BODEGAS ONLINE, y si desea en un futuro realizar una compra solo necesitaras de ingresar su nombre de usuarios y la clave, para acceder al sitio.
					</p>
					<p>
						El cliente será responsable de actualizar los datos si así lo requiere, alguna modificación de la información suministrada en su registro, y puede variar las condiciones normales del proceso de compra y entrega de la mercancía.
					</p>
					<p>
						En el registro de los clientes, no se guardada información de tarjetas de créditos, cuentas, claves (pin) de sus clientes; 
						para esto contamos con el sistema PSE, la bodega cumple con los estándares de seguridad garantizado a la seguridad en sus transacciones, 
						encargado de los pagos derivados de los clientes, sin que LOS ANGELES INC tenga acceso a dicha información, 
						y por consiguiente está impedido para compartir información con otras empresas o entidades. 
						La información recibida de nuestros clientes, será confidencial y LOS ANGELES INC, garantiza el derecho a la privacidad y no divulgación de la misma
					</p>
				</article>
				<article id="cjc" class="cajterpol">
					<h2>SERVICIO DE ATENCIÓN</h2>
					<p>
						El horario de atención al público para acceder al sitio será de 24 horas, los 7 dias de la semana: los Ángeles inc. 
						se reserva el derecho a suspender o interrumpir el sitio, asi como el derecho  a modificar, actualizar cambiar, adicionar o corregir cualquier omisión o información sobre las condiciones de acceso y uso del servicio online. 
						Esta suspensión del servicio puede ser temporal o permanente, sin previo aviso. 
						Para acceder al servicio online del sitio, el cliente deberá identificarse con su nombre de usuario y clave de acceso.
					</p>
				</article>
				<article id="cjd" class="cajterpol">
					<h2>MÉTODOS DE PAGO Y CONDICIONES</h2>
					<p>
						En el momento de que hayas escogido las productos de compras, se desplegaran una serie de opciones de pagos que son los siguientes: 
					</p>
					<ul>
						<li>Por Efecty</li>
						<li>Por Consignaciones y transferencias</li>
						<li>Por datafono móvil (solo en Cúcuta y Medellín)</li>
						<li>Por Pagos con tarjeta crédito o débito</li>
					</ul>
					<p>
						Estarán sujetos a las normas  y aceptación de PSE,  así como  los requerimientos que dicha entidad maneje para la aceptación de los pagos.
					</p>
					<p>
						Los Ángeles inc., no se hace responsable por fallas en la comunicación de entidades bancarias o de crédito, ni de los daños causados a los clientes con ocasión de una acción u omisión de dichas entidades. 
						Así mismo los Ángeles inc., no se hace responsable por los daños o perjuicios que se originen con la manipulación hecha por terceros que accedan a la red.
					</p>
				</article>
			</section>
		</article>
		<article id="automargen">
			<h2 id="hdos">¡Siguénos!</h2>
			<article id="redes">
				<a href="https://www.facebook.com/pages/Bodega-Los-Angeles-Inc/515911208524753?fref=ts" id="Fa" target="_blank"></a>
				<a href="http://instagram.com/losangelesinc" id="In" target="_blank"></a>
				<a href="" id="Tw" target="_blank"></a>
				<a href="http://www.youtube.com/results?search_query=bodega+los+angelesinc" id="Vo" target="_blank"></a>
			</article>
		</article>
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
					<a href="politicas.php">Políticas</a> y <a href="terminos.php" class="selB">Terminos y condiciones</a>
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