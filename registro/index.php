<?php
	include '../config.php';
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
	<script src="../js/jquery_2_1_1.js"></script>
	<script src="../js/scrpag.js"></script>
	<script src="../js/ussrging.js"></script>
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
		<a href="../productos">Productos</a>
		<a href="../video">Videos</a>
		<a href="../prensa">Eventos</a>
		<a href="../contacto">Donde Estamos</a>
		<a href="../contacto/ind2x.php">Contáctenos</a>
		<a href="../registro" class="selB">Mi perfil/Regístrate</a>
	</nav>
	<figure id="flecMnp">
		<img src="abajo.png" alt="abajo" />
	</figure>
	<aside id="resultado">
	</aside>
	<section>
		<h1>R e g i s t r o  &nbsp;e&nbsp; I n g r e s o &nbsp;de&nbsp; U s u a r i o</h1>
		<article id="automargen" class="flexartclB">
			<article class="columninput">
				<h2>R e g i s t r o</h2>
				<label><b>Nombre</b></label>
				<input type="text" id="nmrus" />
				<label><b>Correo</b></label>
				<input type="email" id="corrus" />
				<label><b>Contraseña</b></label>
				<input type="password" id="passrusa" />
				<label><b>Repite Contraseña</b></label>
				<input type="password" id="passrusb" />
				<div>
					<input type="checkbox" id="trcd" />&nbsp;&nbsp;<label>Acepta las <a href="../politicas.php">Políticas</a> y <a href="../terminos.php">Terminos y condiciones</a> </label>
				</div>
				<div id="Usa"></div>
				<input type="submit" value="Registrar" id="nvus" class="botonstyle" />
			</article>
			<form action="#" method="post" class="columninput">
				<h2>I n g r e s a r</h2>
				<label><b>Correo</b></label>
				<input type="email" id="incorus" required="required" />
				<label><b>Contraseña</b></label>
				<input type="password" id="passcorus" required="required" />
				<div id="Usb"></div>
				<input type="submit" value="Ingresar" id="irus" class="botonstyle" />
			</form>
		</article>
	</section>
	<footer>
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
				<a href="../registro" class="selB">Mi perfil/Regístrate</a>
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