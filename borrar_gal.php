<?php
	session_start();
	include 'config.php';
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
				echo "alert('Id de imagen no disponible');";
				echo "var pagina='angadm/administrador/imagenes';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$rutaB="SELECT * from galerya where id_gal='$idR'";
			$sql_bri=mysql_query($rutaB,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_bri)) {
				$rutaBor=$tr['rut_gal'];
			}
			unlink($rutaBor);
			$borrar="DELETE from galerya where id_gal='$idR'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('imagen borrada');";
				echo "var pagina='angadm/administrador/imagenes';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='angadm/erroradmin.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>