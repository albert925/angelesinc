<?php
	include 'config.php';
	$a=$_POST['hm'];//id departamento
	if ($a=="" || $a=="0") {
?>
<option value="0">Selecione</option>
<?php
	}
	else{
?>
<option value="0">Municipios</option>
<?php
		$busq_muni="SELECT * from rel_dpt_muni 
				inner join municipio on(rel_dpt_muni.muni_id=municipio.id_muni) 
			where depart_id='$a' order by municipio.nam_muni asc";
		$sql_muni=mysql_query($busq_muni,$conexion) or die (mysql_error());
		while ($nm=mysql_fetch_array($sql_muni)) {
			$idmn=$nm['muni_id'];
			$nammn=$nm['nam_muni'];
?>
<option value="<?php echo $idmn ?>"><?php echo "$nammn"; ?></option>
<?php
		}
	}
?>