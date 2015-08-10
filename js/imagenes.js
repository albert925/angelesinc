$(document).on("ready",inicio_images);
function inicio_images (argument) {
	$("#sbimG").on("click",nueva_imGal);
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
function nueva_imGal () {
	var imG=$("#nvGy")[0].files[0];
	var nameimG=imG.name;
	var exteimG=nameimG.substring(nameimG.lastIndexOf('.')+1);
	var tamimG=imG.size;
	var tipoimG=imG.type;
	if (!es_imagen(exteimG)) {
		$("#txA").css(mal).text("Tipo de imagen no permitido");
		$("#txA").fadeIn();
		return false;
	}
	else{
		$("#txA").css(mal).text("");
		$("#txA").fadeIn();
		var formu=new FormData($("#nvG_image")[0]);
		$.ajax({
			url: '../../../nuevoimgGalery.php',
			type: 'POST',
			data: formu,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend:function () {
				$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			},
			success:resultawimw,
			error:function () {
				$("#txA").css(mal).text("Ocurrió un error");
				$("#txA").fadeIn();$("#txA").fadeOut(3000);
			}
		});
		return false;
	}
}
function resultawimw (Gg) {
	if (Gg=="2") {
		$("#txA").css(mal).text("Carpeta sin permisos o resoluciónn de imagen no permitido");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
		return false;
	}
	else{
		if (Gg=="3") {
			$("#txA").css(mal).text("Tamaño no permitido");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			return false;
		}
		else{
			if (Gg=="4") {
				$("#txA").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txA").fadeIn();$("#txA").fadeOut(3000);
				return false;
			}
			else{
				if (Gg=="5") {
					$("#txA").css(bien).text("Imagen subida");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txA").css(mal).html(Gg);
					$("#txA").fadeIn();
					return false;
				}
			}
		}
	}
}