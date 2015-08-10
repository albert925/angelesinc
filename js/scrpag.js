$(document).on("ready",inicio_pagina);
var contador=1;
function inicio_pagina () {
	$("#log").on("click",menulogin);
	$("#log,#login").mouseenter(menulogin);
	$("#log,#login").mouseleave(mcerlogin);
	$("#dpFs").on("change",busq_muni);
	$("#bgnP").keydown(busq_general);
	$("#bgnP").keyup(busq_general);
	$("#decar").load("informacion_carrito.php");
	$("#reg").on("click",abrirsesion);
	$("#irdos").on("click",ingresuses);
	$("#mnmov").on("click",abrirmenP);
	$(".submen").on("click",abrirsubmenu);
	if ($(window).width()>=800) {
		$("#bcicbs").on("click",abrirsearch);
		$("#pdsm,#submenu").mouseenter(subabr);
		$("#pdsm,#submenu").mouseleave(subcer);
	}
}
var moscss={display:"flex"};
var olcss={display:"none"};
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
function menulogin (er) {
	er.preventDefault();
	$("#login").css(moscss);
}
function mcerlogin () {
	$("#login").css(olcss);
}
function busq_muni () {
	var dptr=$("#dpFs").val();
	$.post("busqueda_muni.php",{hm:dptr},resul_muni);
}
function resul_muni (rtpd) {
	$("#mnFs").html(rtpd);
}
function busq_general () {
	var palabraB=$("#bgnP").val();
	$.post("busqueda_G.php",{pl:palabraB},result_busqueda_G);
}
function result_busqueda_G (bsq) {
	$("#resultado").html(bsq);
	$("#resultado").css({display:"flex"});
	if ($("#resultado").text()=="" || $("#bgnP").val()=="") {
		$("#resultado").css({display:"none"});
	}
}
function subabr () {
	$("#submenu").css({display:"flex"});
}
function subcer () {
	$("#submenu").css({display:"none"});
}
function abrirsesion (cak) {
	cak.preventDefault();
	$("#igredos").each(seanime);
}
function seanime () {
	var altsis=$(this).css("height");
	if (altsis=="100px") {
		$(this).animate({height:"0"}, 500);
	}
	else{
		$(this).animate({height:"100px"}, 500);
	}
}
function ingresuses () {
	var usa=$("#indos").val();
	var psa=$("#passdos").val();
	if (usa=="") {
		$("#Usc").css(mal).text("Ingrese el correo");
		$("#Usc").fadeIn();
		return false;
	}
	else{
		if (psa=="") {
			$("#Usc").css(mal).text("Ingrese la contraseña");
			$("#Usc").fadeIn();
			return false;
		}
		else{
			$("#Usc").css(normal).text("");
			$("#Usc").prepend("<center><img src='loadingb.gif' alt='loading' style='width:20px;' /></center>");
			$("#Usc").fadeIn();
			$.post("ingeDosusers.php",{sa:usa,sb:psa},resingS);
			return false;
		}
	}
}
function resingS (ckgU) {
	if (ckgU=="2") {
		$("#Usc").css(mal).text("Correo o Contraseña incorrectas");
		$("#Usc").fadeIn();
		return false;
	}
	else{
		if (ckgU=="3") {
			$("#Usc").css(mal).text("Cuenta desactivada");
			$("#Usc").fadeIn();
			return false;
		}
		else{
			if (ckgU=="4") {
				$("#Usc").css(bien).text("Ingresando..");
				$("#Usc").fadeIn();
				location.reload(20);
			}
			else{
				$("#Usc").css(mal).html(ckgU);
				$("#Usc").fadeIn();
				return false;
			}
		}
	}
}
function abrirmenP () {
	if (contador==1) {
		$("#mnP").animate({left:"0"}, 500);
		contador=0;
	}
	else{
		$("#mnP").animate({left:"-100%"}, 500);
		contador=1;
	}
}
function abrirsubmenu () {
	var numerothis=$(this).attr("data-num");
	$(".children"+numerothis).slideToggle();
}
function abrirsearch () {
	$("#dish").each(animarsearch);
}
function animarsearch () {
	var acnhhg=$(this).css("width");
	console.log(acnhhg);
	if (acnhhg=="150px") {
		$(this).animate({width:"0"}, 500);
		$(".search").animate({width:"5%"}, 500);
	}
	else{
		$(this).animate({width:"150px"}, 500);
		$(".search").animate({width:"20%"}, 500);
	}
}