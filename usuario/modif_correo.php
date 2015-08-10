<?php
	include '../config.php';
	$idR=$_POST['idc'];//id usuario
	$correoM=$_POST['core'];//cedula
	if ($idR=="" || $correoM=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from usuario where cor_us='$correoM'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
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
			$modificar="UPDATE usuario set corr_cambio='$correoM',cod_actv_us='$codigoal' 
				where id_us='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());

			$sql_datos_us="SELECT * from usuario where id_us='$idR'";
			$sql_ver=mysql_query($sql_datos_us,$conexion) or die (mysql_error());
			while ($sd=mysql_fetch_array($sql_ver)) {
				$nomus=$sd['nom_us'];
				$apus=$sd['ape_us'];
				$corus=$sd['cor_us'];
			}
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
							Hola $nomus $apus, has solicitado cambio de correo con el siguiente $correoM, para cofirmar el cambio ingrese al link.
						</p>
						<p>
							Link de cambio correo: 
							<a style='padding: 0.5em 1em;background: #EC268F;color:#fff;text-decoration: none;' 
								href='http://conaxport.com/angeles/usuario/corB.php?cod=$codigoal&id=$idR' target='_blank'>
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
			$address="$corus";
			$mail->AddAddress($address, "$nomus $apus");
			$mail->Subject = "Cambio de correo";
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