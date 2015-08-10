$(document).on("ready",inicio_filtros);
function inicio_filtros () {
	$("#preciorangi").change(ver_precio_min);
	$("#preciorangx").change(ver_precio_max);
	$("#orD,#pTP,#pMK").on("change",filtroA);
}
function ver_precio_min () {
	var tipo_P=$(this).attr("data-tp");
	var numA=$("#preciorangi").val();
	$("#precrangmin").text(numA);
	var Aa=$("#orD").val();
	var Ab=$("#pTP").val();
	var Ac=$("#pMK").val();
	var min=$("#preciorangi").val();
	var max=$("#preciorangx").val();
	window.location.href="ind3x.php?ez="+tipo_P+"&fa="+Aa+"&fb="+Ab+"&fc="+Ac+"&min="+min+"&max="+max;
}
function ver_precio_max () {
	var tipo_P=$(this).attr("data-tp");
	var numB=$("#preciorangx").val();
	$("#precrangmax").text(numB);
	var Aa=$("#orD").val();
	var Ab=$("#pTP").val();
	var Ac=$("#pMK").val();
	var min=$("#preciorangi").val();
	var max=$("#preciorangx").val();
	window.location.href="ind3x.php?ez="+tipo_P+"&fa="+Aa+"&fb="+Ab+"&fc="+Ac+"&min="+min+"&max="+max;
}
function filtroA () {
	var tipo_P=$(this).attr("data-tp");
	var Aa=$("#orD").val();
	var Ab=$("#pTP").val();
	var Ac=$("#pMK").val();
	var min=$("#preciorangi").val();
	var max=$("#preciorangx").val();
	window.location.href="ind3x.php?ez="+tipo_P+"&fa="+Aa+"&fb="+Ab+"&fc="+Ac+"&min="+min+"&max="+max;
}