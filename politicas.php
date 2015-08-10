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
	<link rel="stylesheet" href="css/iconos/style.css" />
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
			<article id="avatar" style="background-image:url(<?php echo $imaavatar ?>);">
			</article>
			<?php
				if ($tipus!="1") {
			?>
			<article id="carrito">
				<a href="carrito.php">
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
				<li><a href="index.php">Inicio</a></li>
				<li><a href="nosotros">Empresa</a></li>
				<li><a href="campa">Colecciones</a></li>
				<li class="submen" data-num="1"><a href="productos">Productos</a>
					<ul class="children1">
						<?php
							$CLou="SELECT * from cliente order by nam_cl asc";
							$sql_clou=mysql_query($CLou,$conexion) or die (mysql_error());
							while ($ouA=mysql_fetch_array($sql_clou)) {
								$idCLy=$ouA['id_cl'];
								$nmCLy=$ouA['nam_cl'];
						?>
						<li><a href="productos/ind2x.php?tp=<?php echo $idCLy ?>"><?php echo "$nmCLy"; ?></a></li>
						<?php
							}
						?>
					</ul>
				</li>
				<li><a href="prensa">Eventos</a></li>
				<li class="submen" data-num="2"><a href="contacto">Contacto</a>
					<ul class="children2">
						<li><a href="contacto">Donde Estamos</a></li>
						<li><a href="contacto/ind2x.php">Contáctenos</a></li>
					</ul>
				</li>
				<?php
					if ($inicius=="0") {
						//<li><a href="video">Videos</a></li>
				?>
				<li><a href="registro" id="reg">Usuario</a></li>
				<?php
					}
					else{
				?>
				<li class="submen" data-num="3"><a href="usuario"><?php echo "$nomus"; ?></a>
					<ul class="children3">
						<li><a href="usuario">Información</a></li>
						<li><a href="factura">Historial o Compras</a></li>
						<li><a href="cerrar/us.php">Salir</a></li>
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
		<h1>POLITICAS DE ENVIOS, CAMBIOS, DEVOLUCIONES Y GARANTÍA</h1>
		<article id="automargen" class="animflx">
			<nav id="mnF">
				<div id="aT">Política de Envio</div>
				<div id="eT">Tiempos de Entrega</div>
				<div id="cT">Costos de Envio</div>
				<div id="fT">Políticas de Cambio o Devoluciones</div>
			</nav>
			<section id="cjPs">
				<article id="cja" class="cajterpol" style="height:350px;">
					<h2>Política de Envio</h2>
					<p>
						LOS ANGELES INC  realiza despachos a todos  los municipios del territorio Colombiano a través de las diferentes empresas como Coordinadora Mercantil, 
						Servientrega, Deprisa S.A, Envía Y TCC quienes nos garantiza la seguridad y 
						la cobertura para que tu compra llegue a la dirección que deseas.
					</p>
					<p>
						El tiempo de entrega de los productos es aproximadamente 2 días hábiles para las ciudades, y para pueblos y corregimientos de 3 a 5 días hábiles. 
					</p>
				</article>
				<article id="cje" class="cajterpol">
					<h2>Tiempos de Entrega</h2>
					<p>
						Los tiempos de entrega empiezan a partir de la confirmación de la compra:
					</p>
					<ul>
						<li>
							Para pagos con tarjeta de crédito y débito/PSE; nuestra plataforma de pagos, deberá aprobar la transacción de acuerdo con el análisis de los datos lo cual  puede tardar hasta un dia hábil.  
						</li>
						<li>
							Para pagos en efecty, transferencias y consignaciones; enviar a nuestro 
							correo electrónico <u>servicioalclientemedellin@losangelesinc.com.co</u> 
							o <u>servicioalclientecucuta@losangelesinc.com.co</u>; dependiendo de la ciudad  donde hayas realizado tu compra, 
							el recibo de verificación del pago realizado.
						</li>
					</ul>
					<p>
						En el momento de la aprobación del pago recibirás un correo electrónico o por medio de nuestros whatsapp oficiales en la ciudad de cucuta y en la ciudad de medellin la confirmación del mismo. 
						Para revisar el estado de tu compra puedes ingresar al menú de “Mi cuenta-Mis Pedidos” en nuestra página web.
					</p>
					<p>
						Las entregas no se pueden realizar en un horario exacto. 
						En caso de que tengas alguna inquiteud con el despacho del producto puedes comunicarte con la línea del Servicio al cliente de Los Angeles Inc. 
						en la ciudad de Cúcuta al (5) 895292 o 
						en la ciudad de Medellin al (094) 3666406 (en horario de lunes a viernes de 9:00am -5 pm o Sabados de 8am – 12pm), 
						a través de nuestro correo <u>servicioalclientemedellin@losangelesinc.com.co</u> o 
						<u>servicioalclientecucuta@losangelesinc.com.co</u> para verificar el estado del transporte.
					</p>
					<p>
						El producto podrá ser recibido e inspeccionado por cualquier persona mayor de edad que habite o esté presente en el lugar de entrega para  lo cual bastara con la firma de la guía del transportador.
					</p>
					<p>
						En caso que el producto tenga señas de daños o rupturas en su empaque en el momento de la entrega debes 
						registrarlo en la guía del transportador como una observación y comunicarte 
						con la línea de servicio al cliente de los angeles inc en la ciudad de cucuta (5) 895292 y en la ciudad de medellin (094) 3666406  
						dependiendo de donde realices el pedido (en horario de lunes a viernes de 9:00am -5 pm o Sabados de 9am – 12pm), 
						a través de nuestro correo <u>servicioalclientecucuta@losangeles.com.co</u> 
						o <u>servicioalclientemedellin@losangelesinc.com.co</u>
					</p>
				</article>
				<article id="cjc" class="cajterpol">
					<h2>Costos de Envio</h2>
					<p>
						EL envió de los pedidos es gratuito a todo el país por compras iguales o superiores a $400.000; 
						para compras inferiores a este valor, el costo del envió será determinado en cada caso particular dependiendo del destino, peso y volumen del paquete. 
						Este valor se calculara en el proceso de la compra y te será informado en el momento de la liquidación de la orden, antes de que realices el pago.
					</p>
				</article>
				<article id="cjf" class="cajterpol">
					<h2>Políticas de Cambio o Devoluciones</h2>
					<p>
						Si deseas hacer el cambio de alguno de nuestros productos, lo puedes hacer  de las siguientes  maneras: 
					</p>
					<ul>
						<li>
							Si la compra la realizaste en la ciudad de Cucuta o Medellin donde están ubicadas nuestras Bodegas 
							principales después de haber realizado la compra en un plazo de 8 dias puedes realizar el cambio y cumpliendo los requisitos correspondientes a nuestras políticas de cambio, 
							estos son, presentando la factura de compra podras realizar directamente tu cambio. Uno de nuestros 
							ángeles de venta te ayudara con el proceso de cambio.
						</li>
						<li>
							Si te encuentras fuera de estas ciudades un plazo de 15 dias luego de la fecha en que fue efectuada la compra; 
							fecha de elaboración de la factura (consulta aquí la tienda mas cercana) 
							nuestro correo <u>servicioalclientecucuta@losangeles.com.co</u> 
							o <u>servicioalclientemedellin@losangelesinc.coom.co</u>  en un plazo de 15 dias luego de la entrega del producto.
						</li>
					</ul>
					<p>
						Debes tener en cuenta que: las prendas en promoción o con descuento, de nuestra sección “sale” no tienen cambio. 
						Estas prendas presentan alguna de las siguientes condiciones: descontinuadas, por lo tanto la garantía legal no será exigible. 
						Los cambios siempre se realizaran por el valor de  la prenda. Los accesorios (collares,pulseras,correas, y bolsos) , ropa interior, cremas no tienen cambio. 
					</p>
					<p>
						Una vez hayas solicitado la devolución de tu producto podrás escoger entre las siguientes opciones:
					</p>
					<ul>
						<li>
							Cambio del producto por talla o color de la misma referencia, solo se  podrán realizar cambios por productos con valor igual a la prenda, 
							el cambio estará sujeto a la disponibilidad en el inventario. 
						</li>
					</ul>
					<p>
						Es importante que tengas en cuenta que: el producto no debe estar modificado o alterado de su estado original y la prenda debe estar en buen estado y limpia. 
					</p>
					<p>
						Los tiempos para el cambio según las políticas de LOS ANGELES INC son:
					</p>
					<p>
						Los cambios del producto por talla o color: se despachara dos días hábiles después de haber recibido el producto en nuestras bodegas y a partir de ese momento se aplican los mismos tiempos de una entrega normal.
					</p>
					<p>
						Verificadas las condiciones en que se encuentras el producto LOS ANGELES INC  tendrá 1 dia hábil para informarte si tu producto cumple con los criterios aquí establecidos para ser el cambio por talla o color según la disponibilidad del inventario o por otra prenda del mismo valor igual al del cambio. 
					</p>
					<p>
						En caso de que tu producto no cumpla con los criterios de nuestra política de cambios y garantías:
					</p>
					<ul>
						<li>
							El producto no debe estar modificado o alterado de su estado original.
						</li>
						<li>
							La prenda debe estar en buen estado y limpia
						</li>
						<li>
							Accesorios ropa interior y cosméticos no tienen cambio, ni las prendas de nuestra sección de promociones.
						</li>
						<li>
							La prenda no debe estar manchada ni sucia
						</li>
					</ul>	
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
		<article id="redes" class="auclasmarg">
			<a href="https://www.facebook.com/pages/Bodega-Los-Angeles-Inc/515911208524753?fref=ts" target="_blank"><span class="icon-facebook4"></span></a>
			<a href="" target="_blank"><span class="icon-twitter4"></span></a>
			<a href="https://instagram.com/losangelesinc/" target="_blank"><span class="icon-instagram2"></span></a>
			<a href="https://www.youtube.com/results?search_query=bodega+los+angelesinc" target="_blank"><span class="icon-youtube5"></span></a>
		</article>
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
		</article>
		<article class="fooffin">
			CONAXPORT © 2015 &nbsp;&nbsp;todos los derechos reservados &nbsp;- &nbsp;PBX (5) 841 733 &nbsp;&nbsp;Cúcuta - Colombia &nbsp;&nbsp;
			<a href="http://conaxport.com/" target="_blank">www.conaxport.com</a>
		</article>
	</footer>
</body>
</html>