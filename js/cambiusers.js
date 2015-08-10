var expr=/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
$(document).on("ready",inicio_cambiousers);
function inicio_cambiousers () {
	$("#camavart").on("click",inicar_imagen_cambio);
	$("#datmF").on("click",datos_modifc);
	$("#CccF").on("click",cedula_modifc);
	$("#emaF").on("click",correo_modifc);
	$("#psapsF").on("click",pass_modifc);
}
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
function es_imagen (tipederf) {
	switch(tipederf.toLowerCase()){
		case 'jpg':
			return true;
			break;
		case 'gif':
			return true;
			break;
		case 'png':
			return true;
			break;
		case 'jpeg':
			return true;
			break;
		default:
			return false;
			break;
	}
}
function inicar_imagen_cambio () {
	var iduserC=$("#ideus").val();
	var avR=$("#imaavat")[0].files[0];
	var nameavR=avR.name;
	var exteavR=nameavR.substring(nameavR.lastIndexOf('.')+1);
	var tamavR=avR.size;
	var tipoavR=avR.type;
	if (iduserC=="" || iduserC=="0") {
		$("#infus").css(mal).text("Id de usuario no disponible");
		$("#infus").fadeIn();
		return false;
	}
	else{
		if (!es_imagen(exteavR)) {
			$("#infus").css(mal).text("Tipo de imagen no permitido");
			$("#infus").fadeIn();
			return false;
		}
		else{
			var formu=new FormData($("#avatFus")[0]);
			$.ajax({
				url: '../modifAvatar.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#infus").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:resultaavact,
				error:function () {
					$("#infus").css(mal).text("Ocurrió un error");
					$("#infus").fadeIn();$("#infus").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function resultaavact (Gg) {
	if (Gg=="2") {
		$("#infus").css(mal).text("Carpeta sin permisos o resoluciónn de imagen no permitido");
		$("#infus").fadeIn();$("#infus").fadeOut(3000);
		return false;
	}
	else{
		if (Gg=="3") {
			$("#infus").css(mal).text("Tamaño no permitido");
			$("#infus").fadeIn();$("#infus").fadeOut(3000);
			return false;
		}
		else{
			if (Gg=="4") {
				$("#infus").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#infus").fadeIn();$("#infus").fadeOut(3000);
				return false;
			}
			else{
				if (Gg=="5") {
					$("#infus").css(bien).text("Imagen subida");
					$("#infus").fadeIn();$("#infus").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#infus").css(mal).html(Gg);
					$("#infus").fadeIn();
					return false;
				}
			}
		}
	}
}
function datos_modifc () {
	var idRa=$(this).attr("data-us");
	var Aa=$("#nmFs").val();
	var Ab=$("#apFs").val();
	var Ac=$("#tlFs").val();
	var Ad=$("#clFs").val();
	var Ae=$("#dpFs").val();
	var Af=$("#mnFs").val();
	var Ag=$("#drFs").val();
	if (Aa=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
		$("#txA").fadeIn();
	}
	else{
		if (Ab=="") {
			$("#txA").css(mal).text("Ingrese el apellido");
			$("#txA").fadeIn();
		}
		else{
			if (Ad.length!=10) {
				$("#txA").css(mal).text("Celular son de 10 dígitos");
				$("#txA").fadeIn();
			}
			else{
				if (Ae=="" || Ae=="0") {
					$("#txA").css(mal).text("Selecione el departamento");
					$("#txA").fadeIn();
				}
				else{
					if (Af=="" || Af=="0") {
						$("#txA").css(mal).text("Selecione el municipio");
						$("#txA").fadeIn();
					}
					else{
						$("#txA").css(normal).text("");
						$("#txA").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
						$("#txA").fadeIn();
						$.post("modif_Dat.php",{ida:idRa,a:Aa,b:Ab,c:Ac,d:Ad,e:Ae,f:Af,g:Ag},resul_usA);
					}
				}
			}
		}
	}
}
function resul_usA (Rza) {
	if (Rza=="2") {
		$("#txA").css(bien).text("Datos modificados");
		$("#txA").fadeIn();
		location.reload(20);
	}
	else{
		$("#txA").css(mal).html(Rza);
		$("#txA").fadeIn();
	}
}
function cedula_modifc () {
	var idRb=$(this).attr("data-us");
	var Ba=$("#ccFs").val();
	if (Ba=="") {
		$("#txB").css(mal).text("Escribe número de la cédula");
		$("#txB").fadeIn();
	}
	else{
		$("#txB").css(normal).text("");
		$("#txB").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txB").fadeIn();
		$.post("modif_CC.php",{idb:idRb,cc:Ba},resul_usB);
	}
}
function resul_usB (Rzb) {
	if (Rzb=="2") {
		$("#txB").css(mal).text("Cedula ya está registrada");
		$("#txB").fadeIn();$("#txB").fadeOut(3000);
	}
	else{
		if (Rzb=="3") {
			$("#txB").css(bien).text("Cédula ingresada");
			$("#txB").fadeIn();$("#txB").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#txB").css(mal).html(Rzb);
			$("#txB").fadeIn();
		}
	}
}
function correo_modifc () {
	var idRc=$(this).attr("data-us");
	var crus=$("#corFs").val();
	if (crus=="" || !expr.test(crus)) {
		$("#txC").css(mal).text("Ingrese el correo");
		$("#txC").fadeIn();
	}
	else{
		$("#txC").css(normal).text("");
		$("#txC").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txC").fadeIn();
		$.post("modif_correo.php",{idc:idRc,core:crus},resul_usC);
	}
}
function resul_usC (Rzc) {
	if (Rzc=="2") {
		$("#txC").css(mal).text("Correo ingresado ya existe");
		$("#txC").fadeIn();
	}
	else{
		if (Rzc=="3") {
			$("#txC").css(bien).text("confirmación mensaje correo enviado");
			$("#txC").fadeIn();
			setTimeout(direcionar,3000);
		}
		else{
			$("#txC").css(mal).html(Rzc);
			$("#txC").fadeIn();
		}
	}
}
function direcionar () {
	window.location.href="../usuario";
}
function pass_modifc () {
	var idRd=$(this).attr("data-us");
	var ca=$("#psA").val();
	var nca=$("#psNa").val();
	var ncb=$("#psNb").val();
	if (ca=="") {
		$("#txD").css(mal).text("Ingrese la contraseña actual");
		$("#txD").fadeIn();
	}
	else{
		if (nca=="" || nca.length<6) {
			$("#txD").css(mal).text("Contraseña mínimo 6 dígitos");
			$("#txD").fadeIn();
		}
		else{
			if (ncb!=nca) {
				$("#txD").css(mal).text("Contraseñas no coinciden");
				$("#txD").fadeIn();
			}
			else{
				$("#txD").css(normal).text("");
				$("#txD").prepend("<center><img src='../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				$("#txD").fadeIn();
				$.post("modif_pass.php",{idd:idRd,a:ca,b:nca},resul_usD);
			}
		}
	}
}
function resul_usD (Rzd) {
	if (Rzd=="2") {
		$("#txD").css(mal).text("Contraseña actual erronea");
		$("#txD").fadeIn();$("#txD").fadeOut(3000);
	}
	else{
		if (Rzd=="3") {
			$("#txD").css(bien).text("Contraseña modifcada");
			$("#txD").fadeIn();
			window.location.href="../cerrar/us.php";
		}
		else{
			$("#txD").css(mal).html(Rzd);
			$("#txD").fadeIn();
		}
	}
}