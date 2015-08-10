<?php
	include '../../config.php';
	$idR=$_POST['fc'];
	$corAdm=$_POST['fd'];
	if ($idR=="" || $corAdm=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from administrador where cor_adm='$corAdm'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE administrador set cor_adm='$corAdm' where id_adm='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>