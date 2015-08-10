$(document).on("ready",iniciobodega);
function iniciobodega () {
	$("#nvdb").on("click",nuevo_bodega);
	$("#nvwhas").on("click",nuevo_whastap);
	$(".mofwah").on("click",modif_whasap);
	$(".cambbd").on("click",modif_bodega);
}
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
function nuevo_bodega () {
	var ba=$("#nmbd").val();
	var bb=$("#mpbd").val();
	var bc=$("#drbd").val();
	var bd=$("#pslcbd").val();
	var be=$("#tlbd").val();
	if (ba=="") {
		$("#txA").css(mal).text("Ingrese el nombre");
		$("#txA").fadeIn();
	}
	else{
		$("#txA").css(normal).text("");
		$("#txA").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txA").fadeIn();
		$.post("new_bodega.php",{a:ba,b:bb,c:bc,d:bd,e:be},resulnbdA);
	}
}
function resulnbdA (tf) {
	if (tf=="2") {
		$("#txA").css(bien).text("Bodega ingresada");
		$("#txA").fadeIn();
		location.reload(20);
	}
	else{
		$("#txA").css(mal).html(tf);
		$("#txA").fadeIn();
	}
}
function nuevo_whastap () {
	var delbodega=$("#rdbg").val();
	var numerowh=$("#wh").val();
	if (delbodega=="" || delbodega=="0") {
		$("#txB").css(mal).text("Id bodega no disponible");
		$("#txB").fadeIn();
	}
	else{
		if (numerowh=="") {
			$("#txB").css(mal).text("Ingrese el número");
			$("#txB").fadeIn();
		}
		else{
			$("#txB").css(normal).text("");
			$("#txB").prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#txB").fadeIn();
			$.post("new_numero.php",{wa:delbodega,wb:numerowh},function (funci) {
				if (funci=="2") {
					$("#txB").css(bien).text("Numero ingresado");
					$("#txB").fadeIn();
					window.location.href="whatss.php?EV="+delbodega;
				}
				else{
					$("#txB").css(mal).html(funci);
					$("#txB").fadeIn();
				}
			});
		}
	}
}
function modif_whasap () {
	var delida=$(this).attr("data-id");
	var ntlf=$("#tlwF_"+delida).val();
	if (ntlf=="") {
		$("#txC_"+delida).css(mal).text("Ingres el número");
		$("#txC_"+delida).fadeIn();
	}
	else{
		$("#txC_"+delida).css(normal).text("");
		$("#txC_"+delida).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txC_"+delida).fadeIn();
		$.post("modif_numwap.php",{ida:delida,fa:ntlf},function (Sgff) {
			if (Sgff=="2") {
				$("#txC_"+delida).css(bien).text("numero modificado");
				$("#txC_"+delida).fadeIn();
				location.reload(20);
			}
			else{
				$("#txC_"+delida).css(mal).html(Sgff);
				$("#txC_"+delida).fadeIn();
			}
		});
	}
}
function modif_bodega () {
	var idRs=$(this).attr("data-id");
	var una=$("#nmF_"+idRs).val();
	var doa=$("#mpF_"+idRs).val();
	var tra=$("#drF_"+idRs).val();
	var cua=$("#psF_"+idRs).val();
	var cia=$("#tlF_"+idRs).val();
	if (una=="") {
		$("#txG_"+idRs).css(mal).text("Ingrese el nombre");
		$("#txG_"+idRs).fadeIn();
	}
	else{
		$("#txG_"+idRs).css(normal).text("");
		$("#txG_"+idRs).prepend("<center><img src='../../../imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
		$("#txG_"+idRs).fadeIn();
		$.post("modif_bodega.php",{idb:idRs,ga:una,gb:doa,gc:tra,gd:cua,ge:cia},function (BDgfg) {
			if (BDgfg=="2") {
				$("#txG_"+idRs).css(bien).text("Modificado");
				$("#txG_"+idRs).fadeIn();
				location.reload(20);
			}
			else{
				$("#txG_"+idRs).css(mal).html(BDgfg);
				$("#txG_"+idRs).fadeIn();
			}
		});
	}
}