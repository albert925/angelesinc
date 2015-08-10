$(document).on("ready",inicio_imagesikik);
function inicio_imagesikik (argument) {
	$("#kkimk").on("click",nueva_immarkk);
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
function nueva_immarkk () {
	var kl=$("#lkIk").val();
	var ki=$("#nvIk")[0].files[0];
	var nameki=ki.name;
	var exteki=nameki.substring(nameki.lastIndexOf('.')+1);
	var tamki=ki.size;
	var tipoki=ki.type;
	if (!es_imagen(exteki)) {
		$("#txA").css(mal).text("Tipo de imagen no permitido");
		$("#txA").fadeIn();
		return false;
	}
	else{
		$("#txA").css(mal).text("");
		$("#txA").fadeIn();
		var formu=new FormData($("#nvG_ikk")[0]);
		$.ajax({
			url: '../../../nuevoimgMarka.php',
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