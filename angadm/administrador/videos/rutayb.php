<?php
	include '../../../config.php';
	$idRvd=$_POST['rid'];
	$rutYB=$_POST['rty'];
	$hoy=date("Y-m-d");
	if ($idRvd=="" || $idRvd=="0" || $rutYB=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into rut_videos(video_id,ruta_y,fec_y) values($idRvd,'$rutYB','$hoy')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>