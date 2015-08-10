<?php
	include '../../config.php';
	$idR=$_POST['fa'];
	$nomUSerAd=$_POST['fb'];
	if ($idR=="" || $nomUSerAd=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from administrador where useradm='$nomUSerAd'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE administrador set useradm='$nomUSerAd' where id_adm='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>