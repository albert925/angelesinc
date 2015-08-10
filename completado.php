<?php
	include 'config.php';
	$tf=$_GET['and'];
	if ($tf=="" || $tf=="0" || $tf>="2") {
		$pla="link erronea";
		$ruta="index.php";
	}
	else{
		if ($tf=="1") {
			$pla="Cuenta Activada";
			$ruta="registro";
		}
		else{
			echo "<script type='text/javascript'>";
				echo "alert('error')";
				echo "var pagina='index.php';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
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
	<script src="js/jquery_2_1_1.js"></script>
	<script type="text/javascript">
		setTimeout(direcion,3000);
		function direcion () {
			window.location.href="<?php echo $ruta ?>";
		}
	</script>
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
		<a href="registro" id="reg">Mi perfil/Regístrate</a>
	</nav>
	<figure id="flecMnp">
		<img src="abajo.png" alt="abajo" />
	</figure>
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
		<h1><?php echo "$pla"; ?></h1>
		<article id="automargen">
			<?php echo "$pla"; ?>
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
				<a href="registro">Mi perfil/Regístrate</a>
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