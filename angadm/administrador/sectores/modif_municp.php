<?php
	include '../../../config.php';
	$idr=$_POST['idb'];
	$nomMn=$_POST['pb'];
	if ($idr=="" || $nomMn=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from municipio where nam_muni='$nomMn'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			echo "2";
		}
		else{
			$modificar="UPDATE municipio set nam_muni='$nomMn' where id_muni='$idr'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "3";
		}
	}
?>