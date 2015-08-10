<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$id_prD=$_POST['pB'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['nimgPd']['name'];
		$tipfotA=$_FILES['nimgPd']['type'];
	 	$almfotA=$_FILES['nimgPd']['tmp_name'];
	 	$tamfotA=$_FILES['nimgPd']['size'];
	 	$erorfotA=$_FILES['nimgPd']['error'];
		//----------------------------------------
		if ($fotAcosmodT=="" || $id_prD=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/productos/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "Una imagen tiene el mismo nombre";
					}
					else{
						$subiendo=@move_uploaded_file($almfotA, $ruta);
						if ($subiendo) {
							$ddf="INSERT into images_p(p_cod,ruta_p) values('$id_prD','$ruta')";
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