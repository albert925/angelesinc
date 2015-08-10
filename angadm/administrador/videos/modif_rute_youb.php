<?php
	include '../../../config.php';
	$idR=$_POST['cid'];
	$rutYB=$_POST['cfy'];
	if ($idR=="" || $idR=="0" || $rutYB=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE rut_videos set ruta_y='$rutYB' where id_rut_vid_y=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>