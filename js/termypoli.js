$(document).on("ready",inicioanimterpoli);
function inicioanimterpoli () {
	$("#aT").on("click",abrirA);
	$("#bT").on("click",abrirB);
	$("#cT").on("click",abrirC);
	$("#dT").on("click",abrirD);
	$("#eT").on("click",abrirE);
	$("#fT").on("click",abrirF);
}
function abrirA () {
	$("#cja").each(animarA);
	$("#cjb").animate({height:"0"}, 500);
	$("#cjc").animate({height:"0"}, 500);
	$("#cjd").animate({height:"0"}, 500);
	$("#cje").animate({height:"0"}, 500);
	$("#cjf").animate({height:"0"}, 500);
}
function abrirB () {
	$("#cjb").each(animarB);
	$("#cja").animate({height:"0"}, 500);
	$("#cjc").animate({height:"0"}, 500);
	$("#cjd").animate({height:"0"}, 500);
	$("#cje").animate({height:"0"}, 500);
	$("#cjf").animate({height:"0"}, 500);
}
function abrirC () {
	$("#cjc").each(animarA);
	$("#cjb").animate({height:"0"}, 500);
	$("#cja").animate({height:"0"}, 500);
	$("#cjd").animate({height:"0"}, 500);
	$("#cje").animate({height:"0"}, 500);
	$("#cjf").animate({height:"0"}, 500);
}
function abrirD () {
	$("#cjd").each(animarB);
	$("#cjb").animate({height:"0"}, 500);
	$("#cjc").animate({height:"0"}, 500);
	$("#cja").animate({height:"0"}, 500);
	$("#cje").animate({height:"0"}, 500);
	$("#cjf").animate({height:"0"}, 500);
}
function abrirE () {
	$("#cje").each(animarC);
	$("#cjb").animate({height:"0"}, 500);
	$("#cjc").animate({height:"0"}, 500);
	$("#cjd").animate({height:"0"}, 500);
	$("#cja").animate({height:"0"}, 500);
	$("#cjf").animate({height:"0"}, 500);
}
function abrirF () {
	$("#cjf").each(animarD);
	$("#cjb").animate({height:"0"}, 500);
	$("#cjc").animate({height:"0"}, 500);
	$("#cjd").animate({height:"0"}, 500);
	$("#cje").animate({height:"0"}, 500);
	$("#cja").animate({height:"0"}, 500);
}
function animarA () {
	var altA=$(this).css("height");
	if (altA=="350px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"350px"}, 500);
	}
}
function animarB () {
	var altB=$(this).css("height");
	if (altB=="550px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"550px"}, 500);
	}
}
function animarC () {
	var altC=$(this).css("height");
	if (altC=="850px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"850px"}, 500);
	}
}
function animarD () {
	var altD=$(this).css("height");
	if (altD=="1150px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"1150px"}, 500);
	}
}