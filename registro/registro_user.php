<?php
	include '../config.php';
	$a=$_POST['a'];//nombre
	$b=$_POST['b'];//correo
	$c=$_POST['c'];//contraseña
	if ($a=="" || $b=="" || $c=="") {
		echo "1";
	}
	else{
		$existe_correo="SELECT * from usuario where cor_us='$b'";
		$sql_existe=mysql_query($existe_correo,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
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
			$codigoal=rand_code($caracteres,$longitud);
			$registrar="INSERT into usuario(nom_us,cor_us,pass_us,cod_actv_us,estd_us,tip_us) 
				values('$a','$b','$c','$codigoal','2','1')";
			mysql_query($registrar,$conexion) or die (mysql_error());
			$sacar_id="SELECT * from usuario where cor_us='$b'";
			$sql_id=mysql_query($sacar_id,$conexion) or die (mysql_error());
			while ($did=mysql_fetch_array($sql_id)) {
				$idus=$did['id_us'];
			}
			include '../miler/class.phpmailer.php';
			$mail=new PHPMailer();
			$body="<header bgcolor='#EC268F' color= '#fff'>
					<figure>
						<center>
							<img src='http://conaxport.com/angeles/imagenes/logo.png' alt='logo' width='40%' />
						</center>
					</figure>
					<h1>Registro Angeles Inc</h1>
				</header>
				<section>
					<article>
						<p>
							Hola $a te has registrado en la página de Angeles Inc para 
							completar tu registro ingrese el siguiente link para activar tu cuenta.
						</p>
						<p>
							Link de activación: 
							<a style='padding: 0.5em 1em;background: #EC268F;color:#fff;text-decoration: none;' 
								href='http://conaxport.com/angeles/activacion.php?alg=$codigoal&di=$idus' target='_blank'>
								Terminar Registro
							</a>
						</p>
						<p>
							<b>Antención: </b>Si no te has registrado en la pagina y te llegó este correo ingnore el mensaje y borrelo inmediatamente. 
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
			$address="$b";
			$mail->AddAddress($address, "$a");
			$mail->Subject = "Registro";
			$mail->AltBody = "Cuerpo alternativo del mensaje";
			$mail->MsgHTML($body);
			if(!$mail->Send()) {
				echo "Error al enviar el mensaje: " . $mail­>ErrorInfo;
			} 
			else {
				echo "3";
			}
		}
	}
?>