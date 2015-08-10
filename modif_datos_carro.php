<?php
	include 'config.php';
	$idR=$_POST['idc'];
	$a=$_POST['a'];//cedula
	$b=$_POST['b'];//nombre
	$c=$_POST['c'];//apellido
	$d=$_POST['d'];//departamento
	$e=$_POST['e'];//municipio
	$f=$_POST['f'];//telfono
	$g=$_POST['g'];//celular
	$h=$_POST['h'];//direccion
	if ($idR=="" || $a=="" || $g=="") {
		echo "1";
	}
	else{
		$eciste="SELECT * from usuario where cc_us='$a'";
		$sql_existe=mysql_query($eciste,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			$modificar="UPDATE usuario set nom_us='$b',ape_us='$c',cel_us='$g',tel_us='$f',depart_id='$d',
				muni_id='$e',direc_us='$h' where id_us='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "2";
		}
		else{
			$modificar="UPDATE usuario set cc_us='$a',nom_us='$b',ape_us='$c',cel_us='$g',tel_us='$f',depart_id='$d',
				muni_id='$e',direc_us='$h' where id_us='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "2";
		}
	}
?>