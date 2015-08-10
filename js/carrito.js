$(document).on("ready",inicio_carrito);
function inicio_carrito () {
	$("#datcar").on("click",datos_carro);
	$(".cant_carrito").change(cambiar_cantidad);
	$(".eliminar_carr").on("click",eliminar_carro);
}
var mal={color:"#FF5555"};
var bien={color:"#10801F"};
var normal={color:"#000"};
function conComas (valor) {
	var nums= new Array();
	var simb=",";
	valor=valor.toString();
	valor=valor.replace(/\D/g, "");//Solo permite numeros
	nums=valor.split("");
	var lonG=nums.length-1;//Se saca la longitud del arreglo
	var patron=3;//Induca cada cuanto se ponen las comas
	var prox=2;//Indica en que lugar se deve insertar la siguiente coma
	var res="";
	while(lonG>prox){
		nums.splice((lonG-prox),0,simb);//Se agrega la coma
		prox+=patron;//Se incremente la posición máxima para colocar la coma
	}
	for (var i = 0; i <= nums.length-1; i++) {
		res+=nums[i];//se cre la nueva cadena para devolver el valor formateado
	};
	return res;
}
function cambiar_cantidad () {
	var idC=$(this).attr("data-id");
	var precio=$(this).attr("data-prec");
	var cantidad=$("#cantCar_"+idC).val();
	var subtotal=cantidad*precio;
	var conFormato=conComas(subtotal);
	$("#subto_"+idC).text(conFormato);
	$.post("modificar_carrito.php",{cid:idC,cpr:precio,cct:cantidad},mostrar_cambios);
}
function mostrar_cambios (numseSs) {
	$("#totalcompletado").html(numseSs);
	//$("#fcompr").attr("href","comprar.php?totil="+numseSs);
}
function eliminar_carro () {
	var idBr=$(this).attr("data-id");
	$("#fila_"+idBr).remove();
	$.post("quitarcarro.php",{del:idBr},resul_elimn);
}
function resul_elimn (bordel) {
	if (bordel=="1") {
		window.location.href="carrito.php";
	}
	window.location.href="carrito.php";
}
function datos_carro (ty) {
	ty.preventDefault();
	var idusCr=$(this).attr("data-id");
	var cra=$("#cccar").val();
	var crb=$("#nmcar").val();
	var crc=$("#apcar").val();
	var crd=$("#dpFs").val();
	var cre=$("#mnFs").val();
	var crf=$("#tlcar").val();
	var crg=$("#clcar").val();
	var crh=$("#drcar").val();
	if (cra=="" || cra.length<5) {
		$("#txF").css(mal).text("Cedula minimo 6 díditos");
		$("#txF").fadeIn();
	}
	else{
		if (crb=="") {
			$("#txF").css(mal).text("Ingrese el nombre");
			$("#txF").fadeIn();
		}
		else{
			if (crc=="") {
				$("#txF").css(mal).text("Ingrese el apellido");
				$("#txF").fadeIn();
			}
			else{
				if (crd=="" || crd=="0") {
					$("#txF").css(mal).text("Seleccione le departamento");
					$("#txF").fadeIn();
				}
				else{
					if (cre=="" || cre=="0") {
						$("#txF").css(mal).text("Seleccione el municipio");
						$("#txF").fadeIn();
					}
					else{
						if (crg.length!=10) {
							$("#txF").css(mal).text("Número celular es de 10 dígitos");
							$("#txF").fadeIn();
						}
						else{
							if (crh=="") {
								$("#txF").css(mal).text("Ingrese la dirección y Barrio");
								$("#txF").fadeIn();
							}
							else{
								$("#txF").css(normal).text("");
								$("#txF").prepend("<center><img src='imagenes/loadingb.gif' alt='loading' style='width:20px;' /></center>");
								$("#txF").fadeIn();
								$.post("modif_datos_carro.php",{
									a:cra,b:crb,c:crc,d:crd,e:cre,f:crf,g:crg,h:crh,idc:idusCr
								},resul_dat_car);
							}
						}
					}
				}
			}
		}
	}
}
function resul_dat_car (Crtdat) {
	if (Crtdat=="2") {
		$("#txF").css(bien).text("Datos modificado");
		$("#txF").fadeIn();
		window.location.href="carrito_psC.php";
	}
	else{
		$("#txF").css(mal).html(Crtdat);
		$("#txF").fadeIn();
	}
}