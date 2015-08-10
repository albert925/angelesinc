<?php
	include '../../../config.php';
	$idR=$_POST['idf'];
	$ttiF=$_POST['ca'];
	if ($idR=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE videos set nam_vid='$ttiF' where id_video=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>