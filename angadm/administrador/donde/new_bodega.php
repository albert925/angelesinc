<?php
	include '../../../config.php';
	$a=$_POST['a'];//titulo
	$b=$_POST['b'];//mapa
	$c=$_POST['c'];//direccion
	$d=$_POST['d'];//piso o local
	$e=$_POST['e'];//telefono fijo
	if ($a=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into bodega(nam_bd,map_bd,dir_bd,pslc_bd,tel_bd) 
			values('$a','$b','$c','$d','$e')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>