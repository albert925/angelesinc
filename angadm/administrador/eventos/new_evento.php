<?php
	include '../../../config.php';
	$a=$_POST['va'];
	$b=$_POST['vb'];
	$hoy=date("Y-m-d");
	if ($a=="") {
		echo "1";
	}
	else{
		$ingresar="INSERT into eventos(nam_evet,text_evet,fech_evet) 
			values('$a','$b','$hoy')";
		mysql_query($ingresar,$conexion) or die (mysql_error());
		echo "2";
	}
?>