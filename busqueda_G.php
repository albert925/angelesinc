<?php
	include 'config.php';
	$plabrP=$_POST['pl'];
	if ($plabrP=="") {
		echo "";
	}
	else{
		$busqueda="SELECT * from producto where nam_p like '$plabrP%' order by nam_p asc";
		$sql_busquda=mysql_query($busqueda,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_busquda);
		if ($numero>0) {
			while ($pd=mysql_fetch_array($sql_busquda)) {
				$codP=$pd['cod_p'];
				$nmP=$pd['nam_p'];
?>
<a href="productdescrip.php?cd=<?php echo $codP ?>"><?php echo "$nmP"; ?></a>
<?php
			}
		}
		else{
			echo "";
		}
	}
?>