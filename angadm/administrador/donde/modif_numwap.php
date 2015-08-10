<?php
	include '../../../config.php';
	$idR=$_POST['ida'];
	$tlf=$_POST['fa'];
	if ($idR=="" || $idR=="0" || $tlf=="") {
		echo "1";
	}
	else{
		$modifcar="UPDATE whatsap set num_whas='$tlf' where id_whasap=$idR";
		mysql_query($modifcar,$conexion) or die (mysql_error());
		echo "2";
	}
?>