$(document).on("ready",inicio_sectores);
function inicio_sectores () {
	$(".camdepart").on("click",modifca_depart);
	$(".cammunic").on("click",modifca_muni);
}
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
function modifca_depart () {
	var idpt=$(this).attr("data-id");
	var nomdpt=$("#nmFdpt_"+idpt).val();
	if (nomdpt=="") {
		$("#txA_"+idpt).css(mal).text("Ingrese nombre");
		$("#txA_"+idpt).fadeIn();
	}
	else{
		$("#txA_"+idpt).css(normal).text("");
		$("#txA_"+idpt).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txA_"+idpt).fadeIn();
		$.post("modif_depart.php",{ida:idpt,pa:nomdpt},function (rdpt) {
			if (rdpt=="2") {
				$("#txA_"+idpt).css(mal).text("Nombre ya existe");
				$("#txA_"+idpt).fadeIn();
			}
			else{
				if (rdpt=="3") {
					$("#txA_"+idpt).css(bien).text("Departamento modificado");
					$("#txA_"+idpt).fadeIn();
					location.reload(3000);
				}
				else{
					$("#txA_"+idpt).css(mal).html(rdpt);
					$("#txA_"+idpt).fadeIn();
				}
			}
		})
	}
}
function modifca_muni (argument) {
	var idmn=$(this).attr("data-id");
	var nommn=$("#nmFmn_"+idmn).val();
	if (nommn=="") {
		$("#txB_"+idmn).css(mal).text("Ingrese nombre");
		$("#txB_"+idmn).fadeIn();
	}
	else{
		$("#txB_"+idmn).css(normal).text("");
		$("#txB_"+idmn).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txB_"+idmn).fadeIn();
		$.post("modif_municp.php",{idb:idmn,pb:nommn},function (rmn) {
			if (rmn=="2") {
				$("#txB_"+idmn).css(mal).text("Nombre ya existe");
				$("#txB_"+idmn).fadeIn();
			}
			else{
				if (rmn=="3") {
					$("#txB_"+idmn).css(bien).text("Municipio modificado");
					$("#txB_"+idmn).fadeIn();
					location.reload(3000);
				}
				else{
					$("#txB_"+idmn).css(mal).html(rmn);
					$("#txB_"+idmn).fadeIn();
				}
			}
		})
	}
}