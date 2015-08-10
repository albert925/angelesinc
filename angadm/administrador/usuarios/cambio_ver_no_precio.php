<?php
	include '../../../config.php';
	$idR=$_POST['idb'];
	$tipoS=$_POST['b'];
	if ($idR=="" || $tipoS=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE usuario set tip_us='$tipoS' where id_us='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>