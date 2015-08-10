<?php
	include '../../../config.php';
	$idR=$_POST['fpa'];
	$b=$_POST['fpb'];//nombre tipo producto
	if ($idR=="" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from cliente where nam_cl='$b'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE cliente set nam_cl='$b' where id_cl='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>