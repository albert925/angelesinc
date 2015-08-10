$(document).on("ready",inicio_empresa);
function inicio_empresa () {
	$("#BA").on("click",anim_abriA);
	$("#BB").on("click",anim_abriB);
	$("#BC").on("click",anim_abriC);
	$("#BD").on("click",anim_abriD);
}
function anim_abriA () {
	$("#AI").each(minerA);
	$("#MI").animate({height:"0"}, 500);
	$("#VI").animate({height:"0"}, 500);
	$("#VC").animate({height:"0"}, 500);
}
function anim_abriB () {
	$("#MI").each(minerA);
	$("#AI").animate({height:"0"}, 500);
	$("#VI").animate({height:"0"}, 500);
	$("#VC").animate({height:"0"}, 500);
}
function anim_abriC () {
	$("#VI").each(minerB);
	$("#MI").animate({height:"0"}, 500);
	$("#AI").animate({height:"0"}, 500);
	$("#VC").animate({height:"0"}, 500);
}
function anim_abriD () {
	$("#VC").each(minerB);
	$("#MI").animate({height:"0"}, 500);
	$("#VI").animate({height:"0"}, 500);
	$("#AI").animate({height:"0"}, 500);
}
function minerA () {
	var altoA=$(this).css("height");
	if (altoA=="350px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"350px"}, 500);
	}
}
function minerB () {
	var altoB=$(this).css("height");
	if (altoB=="150px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"150px"}, 500);
	}
}