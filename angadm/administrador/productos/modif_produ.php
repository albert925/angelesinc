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
		$idR=$_POST['idDc'];//ID
		$a=$_POST['nmP'];//Nombre
		$b=$_POST['Stp'];//Tipo
		$c=$_POST['Scl'];//Clase
		$d=$_POST['Smk'];//Marca
		$e=$_POST['pcA'];//Precio Anterior
		$f=$_POST['pcN'];//Precio Actual
		$i=$_POST['pcT'];//precio tercero
		$g=$_POST['cant'];//Cantidad
		$h=$_POST['desPF'];//Descripcion
		$diH=date("d");
		$meH=date("m");
		$yeH=date("Y");
		$fecha_hoy=$yeH."-".$meH.$diH;
		if ($idR=="" || $a=="" || $b=="0" || $b=="" || $c=="0" || $c=="" || $f=="") {
			echo "<script type='text/javascript'>";
				echo "alert('Nombre, id tipo, id clase, id marca o Precio en blanco o 0');";
				echo "var pagina='../productos';";
				echo "document.location.href=pagina;";
			echo "</script>";
		}
		else{
			if ($d=="0" || $d=="") {
				$ingresar="UPDATE producto set nam_p='$a',cl_id='$b',tip_id='$c',
					precA_p='$e',precN_p='$f',cant_p='$g',txt_p='$h',precT_p=$i where cod_p=$idR";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Producto modificado');";
					echo "var pagina='../productos/dat_prd.php?PD=$idR';";
					echo "document.location.href=pagina;";
				echo "</script>";
			}
			else{
				$ingresar="UPDATE producto set nam_p='$a',cl_id='$b',tip_id='$c',mark_id='$d',precA_p='$e',precN_p='$f',cant_p='$g',txt_p='$h' where cod_p=$idR";
				mysql_query($ingresar,$conexion) or die (mysql_error());
				echo "<script type='text/javascript'>";
					echo "alert('Producto modificado');";
					echo "var pagina='../productos/dat_prd.php?PD=$idR';";
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