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
				echo "alert('Id de evento no disponible');";
				echo "var pagina='angadm/administrador/eventos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			$rutaB="SELECT * from iamges_evet where evet_id='$idR'";
			$sql_bri=mysql_query($rutaB,$conexion) or die (mysql_error());
			while ($tr=mysql_fetch_array($sql_bri)) {
				$idRT=$tr['id_img_evet'];
				$rutaBor=$tr['rut_evet'];
				unlink($rutaBor);
				$borBrt="DELETE from iamges_evet where id_img_evet='$idRT'";
				mysql_query($borBrt,$conexion) or die (mysql_error());
			}
			$borrar="DELETE from eventos where id_evet='$idR'";
			mysql_query($borrar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "alert('Evento borrado');";
				echo "var pagina='angadm/administrador/eventos';";
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