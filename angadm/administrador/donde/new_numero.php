<?php
	include '../../../config.php';
	$a=$_POST['wa'];//id bodega
	$b=$_POST['wb'];//numero whatsapt
	if ($a=="" || $a=="0" || $b=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into whatsap(bd_id,num_whas) values($a,'$b')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>