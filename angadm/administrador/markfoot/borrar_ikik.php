<?php
	session_start();
	include '../../../config.php';
	if (isset($_SESSION['adm'])) {
		$usrRad=$_SESSION['adm'];
		$datos_adm="SELECT * from administrador where useradm='$usrRad'";
		$sql_datad=mysql_query($datos_adm,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_datad)) {
			$idad=$ad['id_adm'];
			$usad=$ad['useradm'];
			$corad=$ad['cor_adm'];
		}
		$idR=$_GET['br'];
		if ($idR=="") {
			echo "<script type='text/javascript'>";
				echo "alert('id de img marca no diponible');";
				echo "var pagina='../markfoot';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$ruta="SELECT * from marksimg where id_ik=$idR";
			$sql_ruta=mysql_query($ruta,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_ruta)) {
				$rtlk=$tr['rut_ik'];
			}
			unlink("../../../".$rtlk);
			$borrar="DELETE from marksimg where id_ik=$idR";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('marca footer borrado');";
				echo "var pagina='../markfoot';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradmin.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>