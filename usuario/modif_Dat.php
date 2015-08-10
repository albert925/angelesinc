<?php
	include '../config.php';
	$idR=$_POST['ida'];//id usuario
	$a=$_POST['a'];//nombre
	$b=$_POST['b'];//apellido
	$c=$_POST['c'];//telefono fijo
	$d=$_POST['d'];//telefono movil
	$e=$_POST['e'];//departamento id
	$f=$_POST['f'];//municipio id
	$g=$_POST['g'];//direccion
	if ($idR=="" || $a=="" || $b=="" || $d=="" || $e=="" || $e=="0" || $f=="" || $f=="0") {
		echo "1";
	}
	else{
		$modificar="UPDATE usuario set nom_us='$a',ape_us='$b',tel_us='$c',cel_us='$d',depart_id='$e',
			muni_id='$f',direc_us='$g' where id_us='$idR'";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>