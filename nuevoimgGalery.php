<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		//-------------------------------------------
		$fotAcosmodT=$_FILES['nvGy']['name'];
		$tipfotA=$_FILES['nvGy']['type'];
	 	$almfotA=$_FILES['nvGy']['tmp_name'];
	 	$tamfotA=$_FILES['nvGy']['size'];
	 	$erorfotA=$_FILES['nvGy']['error'];
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
					$ruta="imagenes/galerya/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "La Imagen ya esxiste es logico porque un imagen A y el imagen B no pueden tener la misma imagen
							y si son dos imagenes diferentes y tiene el mismo nombre lo que hace es reemplazar el archivo eso es logico tambien  
							es lo mismo cuando usted esta copiando un archivo de su pc de una carpeta  otra y entonces quedara la misma imagen del Porducto A como el imagen B";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						if ($subiendo) {
							$ddf="INSERT into galerya(rut_gal) values('$ruta')";
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