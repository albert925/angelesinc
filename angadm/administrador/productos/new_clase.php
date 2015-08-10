<?php
	include '../../../config.php';
	$a=$_POST['cla'];//nombre clase
	if ($a=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from tip_producto where nam_tp='$a'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$ingresar="INSERT into tip_producto(nam_tp) values('$a')";
			mysql_query($ingresar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>