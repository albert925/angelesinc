<?php
	include '../config.php';
	$idR=$_POST['idd'];
	$pasAct=$_POST['a'];
	$pasNv=$_POST['b'];
	if ($idR=="" || $pasAct=="" || $pasNv=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from usuario where id_us='$idR' and pass_us='$pasAct'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			$modifcar="UPDATE usuario set pass_us='$pasNv' where id_us='$idR'";
			mysql_query($modifcar,$conexion) or die (mysql_error());
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>