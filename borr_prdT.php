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
				echo "alert('Id de producto no disponible');";
				echo "var pagina='angadm/administrador/productos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$rutaB="SELECT * from images_p where p_cod='$idR'";
			$sql_bri=mysql_query($rutaB,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_bri)) {
				$idRT=$tr['id_img_p'];
				$rutaBor=$tr['ruta_p'];
				unlink($rutaBor);
				$borBrt="DELETE from images_p where id_img_p='$idRT'";
				mysql_query($borBrt,$conexion) or die (mysql_error());
			}
			$borrar="DELETE from producto where cod_p='$idR'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('imagenes y producto borrado');";
				echo "var pagina='angadm/administrador/productos';";
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