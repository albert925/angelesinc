<?php
	include '../../../config.php';
	$a=$_POST['ka'];//nombre clase
	$b=$_POST['kb'];//tipo id
	if ($a=="" || $b=="0" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from marca where nam_mk='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into marca(nam_mk,tp_id) values('$a','$b')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>