$(document).on("ready",inicio_aminisstrador_scrip);
function inicio_aminisstrador_scrip () {
	$("#nvA").on("click",abrirA);
	$("#nvB").on("click",abrirB);
	$("#nvC").on("click",abrirC);
	$("#nvD").on("click",abrirD);
	$("#Stp").on("change",busqueA);
	$("#flecMnp").on("click",animarmenuP);
	$(".dell").on("click",confir_borr);
}
function confir_borr () {
	return confirm("¿Estas seguro de Eliminarlo?");
}
function abrirA (aA) {
	aA.preventDefault();
	$("#mA").each(animA);
}
function abrirB (bB) {
	bB.preventDefault();
	$("#mB").each(animB);
}
function abrirC (cC) {
	cC.preventDefault();
	$("#mC").each(animC);
}
function abrirD (dD) {
	dD.preventDefault();
	$("#mD").each(animD);
}
function animA () {
	var altA=$(this).css("height");
	if (altA=="150px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"150px"}, 500);
	}
}
function animB () {
	var altB=$(this).css("height");
	if (altB=="850px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"850px"}, 500);
	}
}
function animC () {
	var altB=$(this).css("height");
	if (altB=="250px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"250px"}, 500);
	}
}
function animD () {
	var altB=$(this).css("height");
	if (altB=="450px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"450px"}, 500);
	}
}
function busqueA () {
	var opidA=$("#Stp").val();
	$.post("bus_mark.php",{ba:opidA},colocarA);
}
function colocarA (Dta) {
	$("#Smk").html(Dta);
}
function animarmenuP () {
	$("#mnP").each(animeMnPPp);
}
function animeMnPPp () {
	var altmnP=$(this).css("height");
	if (altmnP=="350px") {
		$(this).animate({height:"0"}, 500);
		$("#flecMnp img").remove();
		$("#flecMnp").prepend("<img src='abajo.png' alt='abajo' />");
	}
	else{
		$(this).animate({height:"350px"}, 500);
		$("#flecMnp img").remove();
		$("#flecMnp").prepend("<img src='arriba.png' alt='arriba' />");
	}
}