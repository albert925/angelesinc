<?php
	include '../config.php';
	$idR=$_POST['idb'];//id usuario
	$cc=$_POST['cc'];//cedula
	if ($idR=="" || $cc=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from usuario where cc_us='$cc'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE usuario set cc_us='$cc' where id_us='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>