var axpr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_admin);
function inicio_admin () {
	$("#ingad").on("click",ingresar);
	$("#modifA").on("click",modiadA);
	$("#modifB").on("click",modiadB);
	$("#modifC").on("click",modiadC);
}
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normañ={color:"#000"};
function ingresar () {
	var adus=$("#usad").val();
	var adps=$("#psad").val();
	if (adus=="") {
		$("#txA").css(mal).text("Ingrese nombre de usuario");
		$("#txA").fadeIn();
		return false;
	}
	else{
		if (adps=="") {
			$("#txA").css(mal).text("Ingrese la contraseña");
			$("#txA").fadeIn();
			return false;
		}
		else{
			$("#txA").css(mal).text("");
			$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#txA").fadeIn();
			$.post("ingreso_admin.php",{a:adus,b:adps},resulingradmin);
			return false;
		}
	}
}
function resulingradmin (adR) {
	if (adR=="2") {
		$("#txA").css(mal).text("Usuario o Contraseña incorrecto");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
		return false;
	}
	else{
		if (adR=="3") {
			$("#txA").css(bien).text("Ingresando..");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			window.location.href="administrador";
		}
		else{
			$("#txA").css(mal).html(adR);
			$("#txA").fadeIn();
			return false;
		}
	}
}
function modiadA () {
	var idRa=$(this).attr("data-ad");
	var usadF=$("#usdF").val();
	if (usadF=="") {
		$("#txB").css(mal).text("Ingrese nombre de usuario");
		$("#txB").fadeIn();
	}
	else{
		$("#txB").css(mal).text("");
		$("#txB").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txB").fadeIn();
		$.post("oddif_useradm.php",{fa:idRa,fb:usadF},resulCambioA);
	}
}
function resulCambioA (aFf) {
	if (aFf=="2") {
		$("#txB").css(mal).text("Nobmre de usuario ya existe");
		$("#txB").fadeIn();$("#txB").fadeOut(3000);
	}
	else{
		if (aFf=="3") {
			$("#txB").css(bien).text("nombre modificado");
			$("#txB").fadeIn();$("#txB").fadeOut(3000);
			window.location.href="../../cerrar";
		}
		else{
			$("#txB").css(mal).html(aFf);
			$("#txB").fadeIn();
		}
	}
}
function modiadB () {
	var idRb=$(this).attr("data-ad");
	var coradF=$("#cordF").val();
	if (coradF=="" || !axpr.test(coradF)) {
		$("#txC").css(mal).text("ingrese un correo");
		$("#txC").fadeIn();
	}
	else{
		$("#txC").css(mal).text("");
		$("#txC").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txC").fadeIn();
		$.post("cambio_corad.php",{fc:idRb,fd:coradF},resulCambioB);
	}
}
function resulCambioB (bFf) {
	if (bFf=="2") {
		$("#txC").css(mal).text("Correo ya existe");
		$("#txC").fadeIn();$("#txC").fadeOut(3000);
	}
	else{
		if (bFf=="3") {
			$("#txC").css(bien).text("correo modificado");
			$("#txC").fadeIn();$("#txC").fadeOut(3000);
			location.reload(20);
		}
		else{
			$("#txC").css(mal).html(bFf);
			$("#txC").fadeIn();
		}
	}
}
function modiadC () {
	var idRc=$(this).attr("data-ad");
	var cac=$("#psA").val();
	var cna=$("#psNa").val();
	var cnb=$("#psNb").val();
	if (cac=="") {
		$("#txD").css(mal).text("Ingrese la contraseña actual");
		$("#txD").fadeIn();
	}
	else{
		if (cna=="" || cna.length<6) {
			$("#txD").css(mal).text("Contraseña mínimo 6 dígitos");
			$("#txD").fadeIn();
		}
		else{
			if (cnb!=cna) {
				$("#txD").css(mal).text("contraseñas no coinciden");
				$("#txD").fadeIn();
			}
			else{
				$("#txD").css(mal).text("");
				$("#txD").prepend("<center><img src='../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				$("#txD").fadeIn();
				$.post("cambio_passad.php",{fe:idRc,ff:cac,fg:cna},resulCambioC);
			}
		}
	}
}
function resulCambioC (cFf) {
	if (cFf=="2") {
		$("#txD").css(mal).text("Contraseña actual erronea");
		$("#txD").fadeIn();$("#txD").fadeOut(3000);
	}
	else{
		if (cFf=="3") {
			$("#txD").css(bien).text("contraseña modificada");
			$("#txD").fadeIn();$("#txD").fadeOut(3000);
			window.location.href="../../cerrar";
		}
		else{
			$("#txD").css(mal).html(cFf);
			$("#txD").fadeIn();
		}
	}
}