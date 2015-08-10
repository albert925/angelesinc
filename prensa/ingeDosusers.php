<?php
	include '../config.php';
	$a=$_POST['sa'];
	$b=$_POST['sb'];
	if ($a=="" || $b=="") {
		echo "1";
	}
	else{
		$existe="SELECT * from usuario where cor_us='$a' and pass_us='$b'";
		$sql_existe=mysql_query($existe,$conexion) or die (mysql_error());
		$numeroA=mysql_num_rows($sql_existe);
		if ($numeroA>0) {
			$actvada="SELECT * from usuario where cor_us='$a' and estd_us='1'";
			$sql_act=mysql_query($actvada,$conexion) or die (mysql_error());
			$numeroB=mysql_num_rows($sql_act);
			if ($numeroB>0) {
				while ($sd=mysql_fetch_array($sql_existe)) {
					$idus=$sd['id_us'];
				}
				session_start();
				$_SESSION['us']=$idus;
				echo "4";
			}
			else{
				echo "3";
			}
		}
		else{
			echo "2";
		}
	}
?>