$(document).on("ready",inicio_productos);
function inicio_productos () {
	$("#tpP").on("click",nuevo_tipoP);
	$("#tpC").on("click",nuevo_ptp);
	$("#tmK").on("click",nuevo_mk);
	$("#nvP").on("click",val_prodc);
	$("#imPsub").on("click",img_prodc);
	$(".cambiocl").on("click",modif_tipoP);
	$(".cambiotp").on("click",modif_ptp);
	$(".cambiomk").on("click",modif_mk);
	$(".cambgmcamp").on("click",modif_imagenA);
}
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
//prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
function nuevo_tipoP () {
	var namtpR=$("#nmtp").val();
	if (namtpR=="") {
		$("#txA").css(mal).text("Ingrese nombre");
		$("#txA").fadeIn();
	}
	else{
		$("#txA").css(mal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txA").fadeIn();
		$.post("new_tipo.php",{pa:namtpR},resA);
	}
}
function resA (ppa) {
	if (ppa=="2") {
		$("#txA").css(mal).text("Nombre ya existe");
		$("#txA").fadeIn();$("#txA").fadeOut(3000);
	}
	else{
		if (ppa=="3") {
			$("#txA").css(bien).text("Tipo de producto ingresado");
			$("#txA").fadeIn();$("#txA").fadeOut(3000);
			location.reload(3000);
		}
		else{
			$("#txA").css(mal).html(ppa);
			$("#txA").fadeIn();
		}
	}
}
function modif_tipoP () {
	var idrA=$(this).attr("data-id");
	var nmFtp=$("#nmFcl_"+idrA).val();
	if (nmFtp=="") {
		$("#txB_"+idrA).css(mal).text("Ingrese el nombre");
		$("#txB_"+idrA).fadeIn();
	}
	else{
		$("#txB_"+idrA).css(mal).text("");
		$("#txB_"+idrA).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txB_"+idrA).fadeIn();
		$.post("modif_tipoP.php",{fpa:idrA,fpb:nmFtp},function (fka) {
			if (fka=="2") {
				$("#txB_"+idrA).css(mal).text("Nombre ya existe");
				$("#txB_"+idrA).fadeIn();$("#txB_"+idrA).fadeOut(3000);
			}
			else{
				if (fka=="3") {
					$("#txB_"+idrA).css(bien).text("Nombre modificado");
					$("#txB_"+idrA).fadeIn();
					location.reload(20);
				}
				else{
					$("#txB_"+idrA).css(mal).html(fka);
					$("#txB_"+idrA).fadeIn();
				}
			}
		});
	}
}
function nuevo_ptp () {
	var nmRtpt=$("#nmtC").val();
	var gmgmCamp=$("#gmcap")[0].files[0];
	var namegmgmCamp=gmgmCamp.name;
	var extegmgmCamp=namegmgmCamp.substring(namegmgmCamp.lastIndexOf('.')+1);
	var tamgmgmCamp=gmgmCamp.size;
	var tipogmgmCamp=gmgmCamp.type;
	if (nmRtpt=="") {
		$("#txC").css(mal).text("Ingrese el nombre");
		$("#txC").fadeIn();
		return false;
	}
	else{
		if (!es_imagen(extegmgmCamp)) {
			$("#txC").css(mal).text("Tipo de imagen no permitido");
			$("#txC").fadeIn();
			return false;
		}
		else{
			var forcampa=new FormData($("#nvCam_image")[0]);
			$("#txC").css(normal).text("");
			$("#txC").fadeIn();
			$.ajax({
				url: '../../../new_clase.php',
				type: 'POST',
				data: forcampa,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txC").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:resB,
				error:function () {
					$("#txC").css(mal).text("Ocurrió un error");
					$("#txC").fadeIn();$("#txC").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function resB (ppb) {
	if (ppb=="2") {
		$("#txC").css(mal).text("Carpeta sin permisos o resoluciónn de imagen no permitido");
		$("#txC").fadeIn();$("#txC").fadeOut(3000);
		return false;
	}
	else{
		if (ppb=="3") {
			$("#txC").css(mal).text("Tamaño no permitido");
			$("#txC").fadeIn();$("#txC").fadeOut(3000);
			return false;
		}
		else{
			if (ppb=="4") {
				$("#txC").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
				$("#txC").fadeIn();$("#txC").fadeOut(3000);
				return false;
			}
			else{
				if (ppb=="5") {
					$("#txC").css(mal).text("Nombre producto ya existe");
					$("#txC").fadeIn();$("#txC").fadeOut(3000);
				}
				else{
					if (ppb=="6") {
						$("#txC").css(bien).text("Imagen Subida");
						$("#txC").fadeIn();$("#txC").fadeOut(3000);
						location.reload(20);
					}
					else{
						$("#txC").css(mal).html(ppb);
						$("#txC").fadeIn();
						return false;
					}
				}
			}
		}
	}
}
function modif_ptp () {
	var idrB=$(this).attr("data-id");
	var nmFtppt=$("#nmFtp_"+idrB).val();
	var fcartexto=$("#cartxt_"+idrB).val();
	if (nmFtppt=="") {
		$("#txD_"+idrB).css(mal).text("Ingrese el nombre");
		$("#txD_"+idrB).fadeIn();
	}
	else{
		$("#txD_"+idrB).css(mal).text("");
		$("#txD_"+idrB).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txD_"+idrB).fadeIn();
		$.post("modif_ptp.php",{fpc:idrB,fpd:nmFtppt,fptext:fcartexto},function (Fb) {
			if (Fb=="2") {
				$("#txD_"+idrB).css(mal).text("Nombre ya existe");
				$("#txD_"+idrB).fadeIn();$("#txD_"+idrB).fadeOut(3000);
			}
			else{
				if (Fb=="3") {
					$("#txD_"+idrB).css(bien).text("texto modificado");
					$("#txD_"+idrB).fadeIn();$("#txD_"+idrB).fadeOut(3000);
					location.reload(3000);
				}
				else{
					$("#txD_"+idrB).css(mal).html(Fb);
					$("#txD_"+idrB).fadeIn();
				}
			}
		});
	}
}
function nuevo_mk () {
	var nmKmK=$("#nmmk").val();
	var tipoRl=$("#clmk").val()
	if (nmKmK=="") {
		$("#txE").css(mal).text("Ingrese el nombre");
		$("#txE").fadeIn();
	}
	else{
		if (tipoRl=="0" || tipoRl=="") {
			$("#txE").css(mal).text("Selecione la coleccion");
			$("#txE").fadeIn();
		}
		else{
			$("#txE").css(normal).text("");
			$("#txE").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#txE").fadeIn();
			$.post("new_mark.php",{ka:nmKmK,kb:tipoRl},resC);
		}
	}
}
function resC (ppc) {
	if (ppc=="2") {
		$("#txE").css(mal).text("Nombre ya existe");
		$("#txE").fadeIn();$("#txE").fadeOut(3000);
	}
	else{
		if (ppc=="3") {
			$("#txE").css(bien).text("marca ingresado");
			$("#txE").fadeIn();$("#txE").fadeOut(3000);
			location.reload(5000);
		}
		else{
			$("#txE").css(mal).html(ppc);
			$("#txE").fadeIn();
		}
	}
}
function modif_mk () {
	var idrC=$(this).attr("data-id");
	var nmFmk=$("#nmFmk_"+idrC).val();
	var colFmkk=$("#colFmk_"+idrC).val();
	if (nmFmk=="") {
		$("#txF_"+idrC).css(mal).text("Ingrese el nombre");
		$("#txF_"+idrC).fadeIn();
	}
	else{
		if (colFmkk=="0" || colFmkk=="") {
			$("#txF_"+idrC).css(mal).text("Seleccione la colecion");
			$("#txF_"+idrC).fadeIn();
		}
		else{
			$("#txF_"+idrC).css(normal).text("");
			$("#txF_"+idrC).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#txF_"+idrC).fadeIn();
			$.post("modif_mk.php",{fpe:idrC,fpf:nmFmk,fpKk:colFmkk},function (Fc) {
				if (Fc=="2") {
					$("#txF_"+idrC).css(mal).text("Nombre ya existe");
					$("#txF_"+idrC).fadeIn();$("#txF_"+idrC).fadeOut(3000);
				}
				else{
					if (Fc=="3") {
						$("#txF_"+idrC).css(bien).text("Nombre modificado");
						$("#txF_"+idrC).fadeIn();$("#txF_"+idrC).fadeOut(3000);
						location.reload(5000);
					}
					else{
						$("#txF_"+idrC).css(mal).html(Fc);
						$("#txF_"+idrC).fadeIn();
					}
				}
			})
		}
	}
}
function val_prodc () {
	var valuno=$("#Stp").val();
	var valdos=$("#Scl").val();
	var valtres=$("#Smk").val();
	if (valuno=="0" || valuno=="") {
		$("#sPP").css(mal).text("Selecione tipo de producto");
		$("#sPP").fadeIn();
		return false;
	}
	else{
		if (valdos=="0" || valdos=="") {
			$("#sPP").css(mal).text("Selecione clase de producto");
			$("#sPP").fadeIn();
			return false;
		}
		else{
			$("#sPP").css(normal).text("");
			$("#sPP").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#sPP").fadeIn();
			return true;
		}
	}
}
function img_prodc () {
	var pdidR=$("#pB").val();
	var pdimg=$("#nimgPd")[0].files[0];
	var namepdimg=pdimg.name;
	var extepdimg=namepdimg.substring(namepdimg.lastIndexOf('.')+1);
	var tampdimg=pdimg.size;
	var tipopdimg=pdimg.type;
	if (pdidR=="" || pdidR=="0") {
		$("#txH").css(mal).text("Selecione el producto");
		$("#txH").fadeIn();
		return false;
	}
	else{
		if (!es_imagen(extepdimg)) {
			$("#txH").css(mal).text("Tipo de imagen no permitido");
			$("#txH").fadeIn();
			return false;
		}
		else{
			$("#txH").css(normal).text("");
			$("#txH").fadeIn();
			var formuP=new FormData($("#nvPd_image")[0]);
			$.ajax({
				url: '../../../nuevoimgProducto.php',
				type: 'POST',
				data: formuP,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txH").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:function (siS) {
					if (siS=="2") {
						$("#txH").css(mal).text("Carpeta sin permisos o resoluciónn de imagen no permitido");
						$("#txH").fadeIn();$("#txH").fadeOut(3000);
						return false;
					}
					else{
						if (siS=="3") {
							$("#txH").css(mal).text("Tamaño no permitido");
							$("#txH").fadeIn();$("#txH").fadeOut(3000);
							return false;
						}
						else{
							if (siS=="4") {
								$("#txH").css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
								$("#txH").fadeIn();$("#txH").fadeOut(3000);
								return false;
							}
							else{
								if (siS=="5") {
									$("#txH").css(bien).text("Imagen subida");
									$("#txH").fadeIn();$("#txH").fadeOut(3000);
									window.location.href="images_pd.php?PD="+pdidR;
								}
								else{
									$("#txH").css(mal).html(siS);
									$("#txH").fadeIn();
									return false;
								}
							}
						}
					}
				},
				error:function () {
					$("#txH").css(mal).text("Ocurrió un error");
					$("#txH").fadeIn();$("#txH").fadeOut(3000);
				}
			});
			return false;
		}
	}
}
function modif_imagenA () {
	var idCic=$(this).attr("data-id");
	var ocl=$("#caid_"+idCic).val();
	var imegF=$("#camgmF_"+idCic)[0].files[0];
	var nameimegF=imegF.name;
	var exteimegF=nameimegF.substring(nameimegF.lastIndexOf('.')+1);
	var tamimegF=imegF.size;
	var tipoimegF=imegF.type;
	if (ocl=="") {
		$("#txDd_"+idCic).css(mal).text("Id tipo no disponible");
		$("#txDd_"+idCic).fadeIn();
		return false;
	}
	else{
		if (!es_imagen(exteimegF)) {
			$("#txDd_"+idCic).css(mal).text("Tipo de imagen no permitido");
			$("#txDd_"+idCic).fadeIn();
			return false;
		}
		else{
			$("#txDd_"+idCic).css(normal).text("");
			$("#txDd_"+idCic).fadeIn();
			var forcambio=new FormData($("#nvCm_"+idCic)[0]);
			$.ajax({
				url: '../../../modifgmi_clase.php',
				type: 'POST',
				data: forcambio,
				cache: false,
				contentType: false,
				processData: false,
				beforeSend:function () {
					$("#txDd_"+idCic).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
				},
				success:function (zsr) {
					if (zsr=="2") {
						$("#txDd_"+idCic).css(mal).text("Carpeta sin permisos o resoluciónn de imagen no permitido");
						$("#txDd_"+idCic).fadeIn();$("#txDd_"+idCic).fadeOut(3000);
						return false;
					}
					else{
						if (zsr=="3") {
							$("#txDd_"+idCic).css(mal).text("Tamaño no permitido");
							$("#txDd_"+idCic).fadeIn();$("#txDd_"+idCic).fadeOut(3000);
							return false;
						}
						else{
							if (zsr=="4") {
								$("#txDd_"+idCic).css(mal).text("Carpeta sin permisos o resolución de imagen no permitido");
								$("#txDd_"+idCic).fadeIn();$("#txDd_"+idCic).fadeOut(3000);
								return false;
							}
							else{
								if (zsr=="5") {
									$("#txDd_"+idCic).css(bien).text("Imagen subida");
									$("#txDd_"+idCic).fadeIn();$("#txDd_"+idCic).fadeOut(3000);
									location.reload(20);
								}
								else{
									$("#txDd_"+idCic).css(mal).html(zsr);
									$("#txDd_"+idCic).fadeIn();
									return false;
								}
							}
						}
					}
				},
				error:function () {
					$("#txC").css(mal).text("Ocurrió un error");
					$("#txC").fadeIn();$("#txC").fadeOut(3000);
				}
			});
			return false;
		}
	}
}