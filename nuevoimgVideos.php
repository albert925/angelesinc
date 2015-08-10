<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$tituloY=$_POST['nmvd'];
		$hoy=date("Y-m-d");
		//-------------------------------------------
		$fotAcosmodT=$_FILES['gmvd']['name'];
		$tipfotA=$_FILES['gmvd']['type'];
	 	$almfotA=$_FILES['gmvd']['tmp_name'];
	 	$tamfotA=$_FILES['gmvd']['size'];
	 	$erorfotA=$_FILES['gmvd']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/videos/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "La Imagen no debe tener el mismo nombre a las otras imagenes";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						if ($subiendo) {
							$ddf="INSERT into videos(nam_vid,ima_vd,fec_vid) values('$tituloY','$ruta','$hoy')";
							mysql_query($ddf,$conexion) or die (mysql_error());
							echo "5";
						}
						else{
							echo "4";
						}
					}
				}
				else{
					echo "3";
				}
			}
		}
	}
	else{
		echo "error";
	}
?>