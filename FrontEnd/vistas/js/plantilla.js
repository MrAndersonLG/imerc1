/*=============================================
PLANTILLA
=============================================*/

var rutaOculta = $("#rutaOculta").val();
// Herramienta TOOLTIP
$('[data-toggle= "tooltip"]').tooltip();


$.ajax({

	url: rutaOculta+"ajax/plantilla.ajax.php",
	success:function(respuesta){

		 var colorFondo = JSON.parse(respuesta).colorFondo;
		 var colorTexto = JSON.parse(respuesta).colorTexto;
		 var barraSuperior = JSON.parse(respuesta).barraSuperior;
		 var textoSuperior = JSON.parse(respuesta).textoSuperior;
		 
		 $(".backColor, .backColor a").css({"background": colorFondo,
											"color": colorTexto})

		 $(".barraSuperior, .barraSuperior a").css({"background": barraSuperior, 
		 											"color": textoSuperior})
	}


})

/*=============================================
CUADRICULA O LISTA
=============================================*/

var btnList = $(".btnList")

for(var i= 0; i<btnList.length; i++){

	$("#btnGrid"+i).click(function (){
		
		var numero = $(this).attr("id").substr(-1);

		$(".list"+numero).hide();
		$(".grid"+numero).show();	

		$("#btnGrid"+numero).addClass("backColor");
		$("#btnList"+numero).removeClass("backColor");

	})

	$("#btnList"+i).click(function (){

		var numero = $(this).attr("id").substr(-1);

		$(".list"+numero).show();
		$(".grid"+numero).hide();	

		$("#btnList"+numero).addClass("backColor");
		$("#btnGrid"+numero).removeClass("backColor");
		

	})

}

/*=============================================
EFECTOS CON EL SCROLL
=============================================*/


$(window).scroll(function(){

	var srollY = window.pageYOffset;

	if (window.matchMedia("(min-width:768px)").matches) {

		if($(".banner").html() != null){		

			if($(".banner").html() != null){

				if(srollY < ($(".banner").offset().top)-200){

					$(".banner img").css({"margin-top":-scrollY/2+"px"})

				}else{
					scrollY = 0;
				}
			}
		
		}
	}
})


$.scrollUp({
	scrollText:"",
	scrollSpeed: 2000,
	easingType: "easeOutQuint"
});

/*=============================================
MIGAS DE PAN
=============================================*/

var pagActiva = $(".pagActiva").html();

if(pagActiva != null){ 

	var regPagActiva = pagActiva.replace(/-/g, " ");

	$(".pagActiva").html(regPagActiva);

}

/*=============================================
ENLACES PAGINACION
=============================================*/

var url = window.location.href;
var indice = url.split("/"); 
var pagActual = indice[6];  ////Actualizar el indice con respecto a la configuracion

 if(isNaN(pagActual)){

 	$("#item1").addClass("active");

 }else{

 	$("#item"+pagActual).addClass("active");
 	
 }
 
	

