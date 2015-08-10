var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_users);
function inicio_users () {
	$("#nvus").on("click",registrousers);
	$("#irus").on("click",ingresar);
}
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
//prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
function registrousers () {
	var nms=$("#nmrus").val();
	var crs=$("#corrus").val();
	var psas=$("#passrusa").val();
	var psbs=$("#passrusb").val();
	if (nms=="") {
		$("#Usa").css(mal).text("Ingrese el nombre");
		$("#Usa").fadeIn();
	}
	else{
		if (crs=="" || !expr.test(crs)) {
			$("#Usa").css(mal).text("Ingrese el correo");
			$("#Usa").fadeIn();
		}
		else{
			if (psas=="" || psas.length<6) {
				$("#Usa").css(mal).text("Contraseña mínom 6 dígitos");
				$("#Usa").fadeIn();
			}
			else{
				if (psbs!=psas) {
					$("#Usa").css(mal).text("Contraseñas no coinciden");
					$("#Usa").fadeIn();
				}
				else{
					if ($("#trcd").is(':checked')) {
						$("#Usa").css(normal).text("");
						$("#Usa").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
						$("#Usa").fadeIn();
						$.post("registro_user.php",{a:nms,b:crs,c:psas},resuusA);
					}
					else{
						$("#Usa").css(mal).text("Acepta las Políticas y Terminos y condiciones");
						$("#Usa").fadeIn();
					}
				}
			}
		}
	}
}
function resuusA (susa) {
	if (susa=="2") {
		$("#Usa").css(mal).text("Correo ya está registrado");
		$("#Usa").fadeIn();
	}
	else{
		if (susa=="3") {
			$("#Usa").css(bien).text("Registrado");
			$("#Usa").fadeIn();
			window.location.href="comple.html";
		}
		else{
			$("#Usa").css(mal).html(susa);
			$("#Usa").fadeIn();
		}
	}
}
function ingresar () {
	var ia=$("#incorus").val();
	var ib=$("#passcorus").val();
	if (ia=="" || !expr.test(ia)) {
		$("#Usb").css(mal).text("Ingrese el correo");
		$("#Usb").fadeIn();
		return false;
	}
	else{
		if (ib=="") {
			$("#Usb").css(mal).text("Ingrese la contraseña");
			$("#Usb").fadeIn();
			return false;
		}
		else{
			$("#Usb").css(normal).text("");
			$("#Usb").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#Usb").fadeIn();
			$.post("Ingres_us.php",{ja:ia,jb:ib},result_ingreso);
			return false;
		}
	}
}
function result_ingreso (frus) {
	if (frus=="2") {
		$("#Usb").css(mal).text("Correo o Contraseña incorrectas");
		$("#Usb").fadeIn();
		return false;
	}
	else{
		if (frus=="3") {
			$("#Usb").css(mal).text("Cuenta desactivada");
			$("#Usb").fadeIn();
			return false;
		}
		else{
			if (frus=="4") {
				$("#Usb").css(bien).text("Ingresando..");
				$("#Usb").fadeIn();
				window.location.href="../";
			}
			else{
				$("#Usb").css(mal).html(frus);
				$("#Usb").fadeIn();
				return false;
			}
		}
	}
}