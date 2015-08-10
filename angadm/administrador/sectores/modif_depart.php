<?php
	include '../../../config.php';
	$idr=$_POST['ida'];
	$nomDp=$_POST['pa'];
	if ($idr=="" || $nomDp=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from departamento where nam_depart='$nomDp'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE departamento set nam_depart='$nomDp' where id_depart='$idr'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>