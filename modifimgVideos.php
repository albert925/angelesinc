<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$Idr=$_POST['idvd'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['FgmY']['name'];
		$tipfotA=$_FILES['FgmY']['type'];
	 	$almfotA=$_FILES['FgmY']['tmp_name'];
	 	$tamfotA=$_FILES['FgmY']['size'];
	 	$erorfotA=$_FILES['FgmY']['error'];
		//----------------------------------------
		if ($Idr=="" || $fotAcosmodT=="") {
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
							$borima="SELECT ima_vd from videos where id_video=$Idr";
							$sql_borim=mysql_query($borima,$conexion) or die (mysql_error());
							while ($kt=mysql_fetch_array($sql_borim)) {
								$delrut=$kt['ima_vd'];
							}
							unlink($delrut);
							$ddf="UPDATE videos set ima_vd='$ruta' where id_video=$Idr";
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