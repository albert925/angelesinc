$(document).on("ready",inicio_videos);
function inicio_videos () {
	$("#vdnvg").on("click",nuevo_nom_video);
	$("#rutrlyb").on("click",ruta_video_youtube);
	$(".cambiimgY").on("click",modif_img_video);
	$(".camtitle").on("click",modif_titulo);
	$(".camrutyb").on("click",modif_ruta_youtube);
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
function nuevo_nom_video () {
	var titVid=$("#nmvd").val();
	var imgvid=$("#gmvd")[0].files[0];
	var nameimgvid=imgvid.name;
	var exteimgvid=nameimgvid.substring(nameimgvid.lastIndexOf('.')+1);
	var tamimgvid=imgvid.size;
	var tipoimgvid=imgvid.type;
	if (titVid=="") {
		$("#txA").css(mal).text("Ingrese el título");
		$("#txA").fadeIn();
		return false;
	}
	else{
		if (!es_imagen(exteimgvid)) {
			$("#txA").css(mal).text("Tipo de imagen no permitido");
			$("#txA").fadeIn();
			return false;
		}
		else{
			$("#txA").css(normal).text("");
			$("#txA").fadeIn();
			var formu=new FormData($("#nv_video")[0]);
			$.ajax({
				url: '../../../nuevoimgVideos.php',
				type: 'POST',
				data: formu,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:relvideoimg,
				error:function () {
					$("#txA").css(mal).text("Ocurrió un error");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function relvideoimg (vdY) {
	if (vdY=="2") {
		$("#txA").css(mal).text("Carpeta sin permisos o resolución maxima de imagen no permitido");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
		return false;
	}
	else{
		if (vdY=="3") {
			$("#txA").css(mal).text("Tamaño no permitido");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			return false;
		}
		else{
			if (vdY=="4") {
				$("#txA").css(mal).text("Carpeta sin permisos o resolución maxima de imagen no permitido");
				$("#txA").fadeIn();$("#txA").fadeOut(3000);
				return false;
			}
			else{
				if (vdY=="5") {
					$("#txA").css(bien).text("Imagen subida");
					$("#txA").fadeIn();$("#txA").fadeOut(3000);
					location.reload(20);
				}
				else{
					$("#txA").css(mal).html(vdY);
					$("#txA").fadeIn();
					return false;
				}
			}
		}
	}
}
function modif_img_video () {
	var idav=$(this).attr("data-id");
	var idcaj=$("#idvd_"+idav).val();
	var imgFy=$("#FgmY_"+idav)[0].files[0];
	var nameimgFy=imgFy.name;
	var exteimgFy=nameimgFy.substring(nameimgFy.lastIndexOf('.')+1);
	var tamimgFy=imgFy.size;
	var tipoimgFy=imgFy.type;
	if (idcaj=="") {
		$("#txB_"+idav).css(mal).text("Id no disponible");
		$("#txB_"+idav).fadeIn();
		return false;
	}
	else{
		if (!es_imagen(exteimgFy)) {
			$("#txB_"+idav).css(mal).text("Tipo de imagen no permitido");
			$("#txB_"+idav).fadeIn();
			return false;
		}
		else{
			$("#txB_"+idav).css(normal).text("");
			$("#txB_"+idav).fadeIn();
			var forF=new FormData($("#ca_vdy_"+idav)[0]);
			$.ajax({
				url: '../../../modifimgVideos.php',
				type: 'POST',
				data: forF,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txB_"+idav).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:function (ZfY) {
					if (ZfY=="2") {
						$("#txB_"+idav).css(mal).text("Carpeta sin permisos o resolución maxima de imagen no permitido");
						$("#txB_"+idav).fadeIn();$("#txB_"+idav).fadeOut(3000);
						return false;
					}
					else{
						if (ZfY=="3") {
							$("#txB_"+idav).css(mal).text("Tamaño no permitido");
							$("#txB_"+idav).fadeIn();$("#txB_"+idav).fadeOut(3000);
							return false;
						}
						else{
							if (ZfY=="4") {
								$("#txB_"+idav).css(mal).text("Carpeta sin permisos o resolución maxima de imagen no permitido");
								$("#txB_"+idav).fadeIn();$("#txB_"+idav).fadeOut(3000);
								return false;
							}
							else{
								if (ZfY=="5") {
									$("#txB_"+idav).css(bien).text("Imagen subida");
									$("#txB_"+idav).fadeIn();$("#txB_"+idav).fadeOut(3000);
									location.reload(20);
								}
								else{
									$("#txB_"+idav).css(mal).html(ZfY);
									$("#txB_"+idav).fadeIn();
									return false;
								}
							}
						}
					}
				},
				error:function () {
					$("#txB_"+idav).css(mal).text("Ocurrió un error");
					$("#txB_"+idav).fadeIn();$("#txA").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function modif_titulo () {
	var idbv=$(this).attr("data-id");
	var titF=$("#tiYf_"+idbv).val();
	if (titF=="") {
		$("#txC_"+idbv).css(mal).text("Ingrese el título");
		$("#txC_"+idbv).fadeIn();
	}
	else{
		$("#txC_"+idbv).css(normal).text("");
		$("#txC_"+idbv).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txC_"+idbv).fadeIn();
		$.post("camb_tit_video.php",{idf:idbv,ca:titF},function (sicA) {
			if (sicA=="2") {
				$("#txC_"+idbv).css(bien).text("Titulo modificado");
				$("#txC_"+idbv).fadeIn();
				location.reload(20);
			}
			else{
				$("#txC_"+idbv).css(mal).html(sicA);
				$("#txC_"+idbv).fadeIn();
			}
		});
	}
}
function ruta_video_youtube () {
	var iddelVd=$("#idVd").val();
	var Yb=$("#rutYb").val();
	var embid=$("#rutYb").val().split("/");
	var plabraY="embed";
	if (iddelVd=="0" || iddelVd=="") {
		$("#txD").css(mal).text("Id de video no disponible");
		$("#txD").fadeIn();
	}
	else{
		if (Yb=="") {
			$("#txD").css(mal).text("Ingrese la ruta");
			$("#txD").fadeIn();
		}
		else{
			if (plabraY!=embid[3]) {
				$("#txD").css(mal).text("La ruta le falta /embed/ reemplazar watch?v= por embed/");
				$("#txD").fadeIn();
			}
			else{
				$("#txD").css(normal).text("");
				$("#txD").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				$("#txD").fadeIn();
				$.post("rutayb.php",{rid:iddelVd,rty:Yb},function (siyb) {
					if (siyb=="2") {
						$("#txD").css(bien).text("Ruta ingresada");
						$("#txD").fadeIn();
						window.location.href="rut_de_vid.php?vy="+iddelVd;
					}
					else{
						$("#txD").css(mal).html(siyb);
						$("#txD").fadeIn();
					}
				});
			}
		}
	}
}
function modif_ruta_youtube () {
	var yid=$(this).attr("data-id");
	var rutF=$("#rutFyb_"+yid).val();
	var rutembed=$("#rutFyb_"+yid).val().split("/");
	var pleber="embed";
	if (rutF=="") {
		$("#txE_"+yid).css(mal).text("Ingrese la ruta");
		$("#txE_"+yid).fadeIn();
	}
	else{
		if (pleber!=rutembed[3]) {
			$("#txE_"+yid).css(mal).text("La ruta le falta /embed/ reemplazar watch?v= por embed/");
			$("#txE_"+yid).fadeIn();
		}
		else{
			$("#txE_"+yid).css(normal).text("");
			$("#txE_"+yid).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#txE_"+yid).fadeIn();
			$.post("modif_rute_youb.php",{cid:yid,cfy:rutF},function (stCyb) {
				if (stCyb=="2") {
					$("#txE_"+yid).css(bien).text("Ruta modificada");
					$("#txE_"+yid).fadeIn();
					location.reload(20);
				}
				else{
					$("#txE_"+yid).css(mal).html(stCyb);
					$("#txE_"+yid).fadeIn();
				}
			});
		}
	}
}