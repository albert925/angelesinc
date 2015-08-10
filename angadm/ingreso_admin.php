<?php
	include '../config.php';
	$a=$_POST['a'];//user admin
	$b=$_POST['b'];//pass admin
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from administrador where useradm='$a' and pass_Adm='$b'";
		$sql_exist=mysql_query($existe,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_exist);
		if ($numero>0) {
			session_start();
			$_SESSION['adm']=$a;
			echo "3";
		}
		else{
			echo "2";
		}
	}
?>