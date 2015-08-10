<?php
	session_start();
	include '../../../config.php';
	if (isset($_SESSION['adm'])) {
		$usrRad=$_SESSION['adm'];
		$datos_adm="SELECT * from administrador where useradm='$usrRad'";
		$sql_datad=mysql_query($datos_adm,$conexion) or die (mysql_error());
		while ($ad=mysql_fetch_array($sql_datad)) {
			$idad=$ad['id_adm'];
			$usad=$ad['useradm'];
			$corad=$ad['cor_adm'];
		}
		$a=$_POST['nmP'];//Nombre
		$b=$_POST['Stp'];//Tipo
		$c=$_POST['Scl'];//Clase
		$d=$_POST['Smk'];//Marca
		$e=$_POST['pcA'];//Precio Anterior
		$f=$_POST['pcN'];//Precio Actual
		$g=$_POST['cant'];//Cantidad
		$h=$_POST['desP'];//Descripcion
		$diH=date("d");
		$meH=date("m");
		$yeH=date("Y");
		$fecha_hoy=$yeH."-".$meH.$diH;
		if ($a=="" || $b=="0" || $b=="" || $c=="0" || $c=="" || $f=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Nombre, id tipo, id clase, id marca o Precio en blanco o 0');";
				echo "var pagina='../productos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($d=="0" || $d=="") {
				$ingresar="INSERT into producto(nam_p,cl_id,tip_id,precA_p,precN_p,cant_p,txt_p,fech_p,estd_p) 
					values('$a','$b','$c','$e','$f','$g','$h','$fecha_hoy','1')";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Producto ingresado');";
					echo "var pagina='../productos';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				$ingresar="INSERT into producto(nam_p,cl_id,tip_id,mark_id,precA_p,precN_p,cant_p,txt_p,fech_p,estd_p) 
					values('$a','$b','$c','$d','$e','$f','$g','$h','$fecha_hoy','1')";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Producto ingresado');";
					echo "var pagina='../productos';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
		}
	}
	else{
		echo "<script type='text/javascript'>";
			echo "var pagina='../../erroradmin.html';";
			echo "document.location.href=pagina;";
		echo "</script>";
	}
?>