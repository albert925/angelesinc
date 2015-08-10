<?php
	include '../../../config.php';
	$idR=$_POST['fi'];
	$a=$_POST['fa'];//nombre
	$b=$_POST['fb'];//texto
	if ($idR=="" || $a=="") {
		echo "1";
	}
	else{
		$modificar="UPDATE eventos set nam_evet='$a',text_evet='$b' where id_evet=$idR";
		mysql_query($modificar,$conexion) or die (mysql_error());
		echo "2";
	}
?>