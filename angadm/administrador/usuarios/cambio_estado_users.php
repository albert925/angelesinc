<?php
	include '../../../config.php';
	$idR=$_POST['ida'];
	$estadS=$_POST['a'];
	if ($idR=="" || $estadS=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE usuario set estd_us='$estadS' where id_us='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>