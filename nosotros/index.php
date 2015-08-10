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
	<script src="../js/empresa.js"></script>
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
		<a href="../nosotros" class="selB">Empresa</a>
		<a href="../campa">Colecciones</a>
		<a href="../productos">Productos</a>
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
	<figure id="fodA" class="modelang">
		<h1>NOSOTROS</h1>
	</figure>
	<section class="micmd" id="automargen">
		<nav id="mnm">
			<h2 id="BA" class="cont">¿POR QUÉ LOS ANGELES INC?</h2>
			<h2 id="BD" class="cont">VALORES CORPORATIVOS</h2>
			<h2 id="BB" class="cont">MISIÓN</h2>
			<h2 id="BC" class="cont">VISIÓN</h2>
		</nav>
		<article id="contcnosotros">
			<section id="AI" class="stsc">
				<article>
					<p>
						Los Ángeles actúan como mensajeros de Dios, 
						son la compañía de las personas quienes creen en ello y 
						son personajes del cielo que están al lado de cada uno de nosotros y de Dios, 
						es por esto que nuestra Bodega recibe este nombre ya que somos los mensajeros 
						en trasmitir la moda en nuestra ciudad, para irla transmitiendo a 
						todos los rincones de nuestro territorio Colombiano, ya que contamos 
						con una maravilloso ángel quien tiene el don de seleccionar o elegir la moda, 
						exclusividad de cada una de nuestras  colecciones, sin embargo nuestra empresa 
						cuenta con una aurora de Ángeles quien son los encargados de dar la  accesoria 
						necesaria para la selección de atuendos para las diversas ocasiones. 
						Por lo que es inspirado en la atención y de nuestro personal a la hora prestar el 
						servicio para que nuestro ángel de compra sea atendido de la mejor manera y disposición
						Por otro lado nos caracterizamos por importar mercancía directamente de la 
						ciudad de los Ángeles (USA); es por esto que también nos denominamos INC ya que 
						estamos fomentando nuestro trabajo para generar empleo y crecimiento como una marca 
						con crecimiento empresarial y de importación  en la última exclusividad de la moda 
						americana.
					</p>
				</article>
			</section>
			<section id="MI" class="stsc">
				<article>
					<p>
						Los Angeles Inc es una  tienda que presenta las últimas tendencias de ropa americana para dama traída directamente de Los Ángeles, orientada a ofrecer la mejor calidad y variedad en nuestros productos, 
						brindándole a nuestros clientes las mejores opciones de compras al por mayor y detal, ofreciendo en las diversas ciudades la presencia de un estilo único e innovador con el compromiso de que las clientes vistan prendas de ultimo talente de la moda, 
						teniendo variedad de ropa como vestidos, pantalones, abrigos, blusas, 
						zapatos, entre otras. 
						Contando con  establecimientos que poseen el mejor ambiente de comodidad y seguridad, para obtener de esta manera confianza y lealtad de nuestra clientela en sus compras. 
					</p>
				</article>
			</section>
			<section id="VI" class="stsc">
				<article>
					<p>
						Ser una  cadena de tiendas por todos los ciudades a nivel nacional e internacional  que ofrezca la mejor calidad y variedad de nuestros productos al por mayor 
						y detal al ultimo estilo de la moda americana, fortaleciendo en nuestra empresa una gran solidez gracias al trabajo en equipo.
					</p>
				</article>
			</section>
			<section id="VC" class="stsc">
				<article>
					<p>
						Todas las personas que trabajan en los ángeles inc., deben buscar la mejor manera de atender a sus clientes con respeto, 
						entrega, compromiso y paciencia, utilizando las prendas con mayor responsabilidad buscando siempre la máxima conformidad del cliente.
					</p>
				</article>
			</section>
		</article>
	</section>
	<footer>
		<article id="automargen" class="footeflx">
			<article class="columart">
				<a href="../">Inicio</a>
				<a href="../nosotros" class="selB">Empresa</a>
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