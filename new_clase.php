<?php
	include 'config.php';
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$namTipo=$_POST['nmtC'];
		$texto=$_POST['tsdes'];
		//-------------------------------------------
		$fotAcosmodT=$_FILES['gmcap']['name'];
		$tipfotA=$_FILES['gmcap']['type'];
	 	$almfotA=$_FILES['gmcap']['tmp_name'];
	 	$tamfotA=$_FILES['gmcap']['size'];
	 	$erorfotA=$_FILES['gmcap']['error'];
		//----------------------------------------
		$hoy=date("Y-m-d");
		if ($fotAcosmodT=="" || $namTipo=="") {
			echo "1";
		}
		else{
			if ($erorfotA>0) {
				echo "2";
			}
			else{
				$maAximo = 100204000;
				if ($tamfotA<=$maAximo*1024) {
					$ruta="imagenes/campa/".$fotAcosmodT;
					if (file_exists($ruta)) {
						echo "La Imagen ya esxiste es logico porque un imagen A y el imagen B no pueden tener la misma imagen
							y si son dos imagenes diferentes y tiene el mismo nombre lo que hace es reemplazar el archivo eso es logico tambien  
							es lo mismo cuando usted esta copiando un archivo de su pc de una carpeta  otra y entonces quedara la misma imagen del Porducto A como el imagen B";
					}
					else{
						$existe="SELECT * from tip_producto where nam_tp='$namTipo'";
						$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
						$numero=mysql_num_rows($sql_existe);
						if ($numero>0) {
							echo "5";
						}
						else{
							$subiendo=@move_uploaded_file($almfotA, $ruta);
							if ($subiendo) {
								$ingresar="INSERT into tip_producto(nam_tp,imag_col,fec_camp,texto_tp) 
									values('$namTipo','$ruta','$hoy','$texto')";
								mysql_query($ingresar,$conexion) or die (mysql_error());
								echo "6";
							}
							else{
								echo "4";
							}
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