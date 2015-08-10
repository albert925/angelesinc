$(document).on("ready",inicio_user_adm);
function inicio_user_adm () {
	$(".cambiarE").on("change",act_desacus);
	$(".cambTus").on("change",ver_si_no_precio);
}
function act_desacus () {
	var idusa=$(this).attr("data-us");
	var selAcDe=$("#Cmes_"+idusa).val();
	if (selAcDe=="" || selAcDe=="0") {
		alert("selecione activado o desactivado");
	}
	else{
		$("#carg_"+idusa+" img").remove();
		$("#carg_"+idusa).fadeIn();
		$("#carg_"+idusa).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("cambio_estado_users.php",{ida:idusa,a:selAcDe},cambio_estado);
	}
}
function cambio_estado (esdus) {
	if (esdus=="2") {
		alert("Estado de usuario cambiado");
		location.reload(20);
	}
	else{
		alert(esdus);
	}
}
function ver_si_no_precio (argument) {
	var idusb=$(this).attr("data-us");
	var selTipo=$("#Tpus_"+idusb).val();
	if (selTipo=="" || selTipo=="0") {
		alert("Selecione si puede ver o no el precio");
	}
	else{
		$("#carg_"+idusb+" img").remove();
		$("#carg_"+idusb).fadeIn();
		$("#carg_"+idusb).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$.post("cambio_ver_no_precio.php",{idb:idusb,b:selTipo},cambioTIpo);
	}
}
function cambioTIpo (tpus) {
	if (tpus=="2") {
		alert("Tipo de usuario cambiado");
		location.reload(20);
	}
	else{
		alert(tpus);
	}
}