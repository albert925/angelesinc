$(document).on("ready",inicio_eventos);
function inicio_eventos () {
	$("#nuevevet").on("click",nuevo_eventro);
	$("#simagesevet").on("click",mnuevo_iamgen_evet);
	$("#fmfevet").on("click",mnodif_evet);
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
function nuevo_eventro () {
	var nnmv=$("#nmevet").val();
	var txtv=$("#txevet").val();
	if (nnmv=="") {
		$("#txA").css(mal).text("Ingrese nombre del evento");
		$("#txA").fadeIn();
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txA").fadeIn();
		$.post("new_evento.php",{va:nnmv,vb:txtv},resuleveA);
	}
}
function resuleveA (liv) {
	if (liv=="2") {
		$("#txA").css(bien).text("Evento ingresado");
		$("#txA").fadeIn();
		location.reload(20);
	}
	else{
		$("#txA").css(mal).html(liv);
		$("#txA").fadeIn();
	}
}
function mnuevo_iamgen_evet () {
	var evR=$("#evid").val();
	var gmiev=$("#nvGevet")[0].files[0];
	var namegmiev=gmiev.name;
	var extegmiev=namegmiev.substring(namegmiev.lastIndexOf('.')+1);
	var tamgmiev=gmiev.size;
	var tipogmiev=gmiev.type;
	if (evR=="0" || evR=="") {
		$("#txB").css(mal).text("Id evento no disponible");
		$("#txB").fadeIn();
		return false;
	}
	else{
		if (!es_imagen(extegmiev)) {
			$("#txB").css(mal).text("Tipo de imagen no permitido");
			$("#txB").fadeIn();
			return false;
		}
		else{
			$("#txB").css(normal).text("");
			$("#txB").fadeIn();
			var formu=new FormData($("#evet_image")[0]);
			$.ajax({
				url: '../../../nuevoimgEventos.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txB").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:function (subEvgmi) {
					if (subEvgmi=="2") {
						$("#txB").css(mal).text("Carpeta sin permisos o resoluciónn de imagen no permitido");
						$("#txB").fadeIn();$("#txB").fadeOut(3000);
						return false;
					}
					else{
						if (subEvgmi=="3") {
							$("#txB").css(mal).text("Tamaño no permitido");
							$("#txB").fadeIn();$("#txB").fadeOut(3000);
							return false;
						}
						else{
							if (subEvgmi=="4") {
								$("#txB").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
								$("#txB").fadeIn();$("#txB").fadeOut(3000);
								return false;
							}
							else{
								if (subEvgmi=="5") {
									$("#txB").css(bien).text("Imagen subida");
									$("#txB").fadeIn();$("#txB").fadeOut(3000);
									window.location.href="images_eve.php?EV="+evR;
								}
								else{
									$("#txB").css(mal).html(subEvgmi);
									$("#txB").fadeIn();
									return false;
								}
							}
						}
					}
				},
				error:function () {
					$("#txB").css(mal).text("Ocurrió un error");
					$("#txB").fadeIn();$("#txA").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function mnodif_evet () {
	var idevet=$(this).attr("data-id");
	var nmFv=$("#nmeFvet").val();
	var txFv=$("#txeFvet").val();
	if (nmFv=="") {
		$("#txC").css(mal).text("Ingrese el nombre");
		$("#txC").fadeIn();
	}
	else{
		$("#txC").css(normal).text("");
		$("#txC").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txC").fadeIn();
		$.post("modif_evet.php",{fi:idevet,fa:nmFv,fb:txFv},resul_cambioA);
	}
}
function resul_cambioA (eveF) {
	if (eveF=="2") {
		$("#txC").css(bien).text("Datos modificado");
		$("#txC").fadeIn();
		location.reload(20);
	}
	else{
		$("#txC").css(mal).html(eveF);
		$("#txC").fadeIn();
	}
}