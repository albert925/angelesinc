<?php
	$idR=$_POST['cid'];
	$precio=$_POST['cpr'];
	$cantidad=$_POST['cct'];
	session_start();
	$arreglo=$_SESSION['carrito'];
	$total=0;
	$numero=0;
	for ($i=0; $i <count($arreglo) ; $i++) { 
		if ($arreglo[$i]['Id']==$idR) {
			$numero=$i;
		}
	}

	$arreglo[$numero]['Cant']=$cantidad;
	for ($i=0; $i <count($arreglo) ; $i++) { 
		$total=($arreglo[$i]['Prec']*$arreglo[$i]['Cant'])+$total;
	}
	$_SESSION['carrito']=$arreglo;
	$foFtotal=number_format($total);
	echo $foFtotal;
?>