<?php
	include '../../../config.php';
	$idR=$_POST['fpc'];
	$b=$_POST['fpd'];//nombre tipo producto
	$c=$_POST['fptext'];//texto
	if ($idR=="" || $b=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE tip_producto set nam_tp='$b',texto_tp='$c' where id_tp='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "3";
	}
?>