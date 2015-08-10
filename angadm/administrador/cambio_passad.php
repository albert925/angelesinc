<?php
	include '../../config.php';
	$idR=$_POST['fe'];
	$passAct=$_POST['ff'];
	$passNew=$_POST['fg'];
	if ($idR=="" || $passAct=="" || $passNew=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from administrador where id_adm='$idR' and pass_adm='$passAct'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			$modificar="UPDATE administrador set pass_adm='$passNew' where id_adm='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>