<?php
	include '../../../config.php';
	$idR=$_POST['idb'];//id
	$a=$_POST['ga'];//nombre
	$b=$_POST['gb'];//mapa
	$c=$_POST['gc'];//direcion
	$d=$_POST['gd'];//local
	$e=$_POST['ge'];//telefono
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE bodega set nam_bd='$a',map_bd='$b',dir_bd='$c',pslc_bd='$d',tel_bd='$e' 
			where id_bodega=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>