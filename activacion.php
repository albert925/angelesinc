<?php
	include 'config.php';
	$codigoR=$_GET['alg'];
	$idR=$_GET['di'];
	if ($codigoR=="" || $idR=="") {
		echo "<script type='text/javascript'>";
			echo "alert('id o codigo no disponible');";
			echo "var pagina='index.php';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
	else{
		$existe="SELECT * from usuario where id_us='$idR' and cod_actv_us='$codigoR'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_existe);
		if ($numero>0) {
			$modificar="UPDATE usuario set cod_actv_us='000',estd_us='1' where id_us='$idR'";
			mysql_query($modificar,$conexion) or die (mysql_error());
			echo "<script type='text/javascript'>";
				echo "var pagina='completado.php?and=1';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			echo "<script type='text/javascript'>";
				echo "var pagina='completado.php?and=2';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
	}
?>