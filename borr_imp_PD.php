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
		$cdP=$_GET['cde'];
		if ($idR=="" || $cdP=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Id de imagen o producto no disponible');";
				echo "var pagina='angadm/administrador/productos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$rutaB="SELECT * from images_p where id_img_p='$idR'";
			$sql_bri=mysql_query($rutaB,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_bri)) {
				$rutaBor=$tr['ruta_p'];
			}
			unlink($rutaBor);
			$borrar="DELETE from images_p where id_img_p='$idR'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('imagen borrada');";
				echo "var pagina='angadm/administrador/productos/images_pd.php?PD=$cdP';";
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