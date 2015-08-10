<?php
	include '../../../config.php';
	$idR=$_POST['fpe'];
	$b=$_POST['fpf'];//nombre tipo producto
	$c=$_POST['fpKk'];//id tipo
	if ($idR=="" || $b=="" || $c=="0" || $c=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from marca where nam_mk='$b'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE marca set nam_mk='$b',tp_id='$c' where id_mk='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>