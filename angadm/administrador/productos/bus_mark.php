<?php
	include '../../../config.php';
	$TIpo=$_POST['ba'];
	if ($TIpo=="0" || $TIpo=="") {
?>
<option value="0">Tipo no selecionado</option>
<?php
	}
	else{
		$busqueda="SELECT * from marca where tp_id=$TIpo";
		$sql_busqueda=mysql_query($busqueda,$conexion) or die (mysql_error());
		$numero=mysql_num_rows($sql_busqueda);
		if ($numero>0) {
			while ($jh=mysql_fetch_array($sql_busqueda)) {
				$idmk=$jh['id_mk'];
				$nmmk=$jh['nam_mk'];
?>
<option value="<?php echo $idmk ?>"><?php echo "$nmmk"; ?></option>
<?php
			}
		}
		else{
?>
<option value="0">Marca no encontrada</option>
<?php
		}
	}
?>