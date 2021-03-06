<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8"> <!--- Metadato -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,
		maximum-scale=1.0, user-scalable=no"> <!---Para compatibilidad de distintos dispositivos-->
	
	<meta name="title" content="Tienda Virtual">
	<meta name="descripcion" content="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius eligendi, libero iusto ducimus modi, voluptas exercitationem laudantium animi deleniti perferendis.">
	
	<meta name="keyword" content="Lorem ipsum, dolor sit amet, consectetur adipisicing, elit. Eius eligendi, libero iusto ducimus modi, voluptas exercitationem, laudantium animi, deleniti, perferendis."> <!--- Palabras clabes -->

	<title>Tienda Virtual</title>
	
	<?php 

		session_start(); 

		$servidor = Ruta::ctrRutaServidor();	
		//Traigo desde la base de datos el icono
	
		$icono = ControladorPlantilla::ctrEstiloPlantilla();

		echo '<link rel="icon" href="'.$servidor.$icono["icono"].'">';

		/*=============================================
		=   MANTENER LA RUTA FIJA DEL PROYECTO         =
		=============================================*/
		
		$url = Ruta::ctrRuta();		

 
	?>
	<!--=========================================
		PLUGINS DE CSS
	==========================================-->

	<link rel="stylesheet" href="<?php echo $url?>vistas/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $url?>vistas/css/plugins/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $url?>vistas/css/plugins/flexslider.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu|Ubuntu+Condensed" rel="stylesheet">

	<!--=========================================
		HOJAS DE ESTILO PERSONALIZADAS
	==========================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo $url?>vistas/css/plantilla.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url?>vistas/css/cabezote.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url?>vistas/css/slide.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url?>vistas/css/productos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url?>vistas/css/infoproducto.css">

	<!--=========================================
		PLUGINS DE JAVASCRIPT
	==========================================-->

	<script src="<?php echo $url?>vistas/js/plugins/jquery.min.js"></script>
	<script src="<?php echo $url?>vistas/js/plugins/bootstrap.min.js"></script>
	<script src="<?php echo $url?>vistas/js/plugins/jquery.easing.js"></script> <!-- Funcion para retardos -->
	<script src="<?php echo $url?>vistas/js/plugins/jquery.scrollUp.js"></script>
	<script src="<?php echo $url?>vistas/js/plugins/jquery.flexslider.js"></script>
	<!-- Ayuda a subir la pantalla mediante un boton -->

</head>
<body>

<?php

/*=============================================
				CABEZOTE
=============================================*/
 include "modulos/cabezote.php";


/*=============================================
		CONTENIDO DIN??MICO
=============================================*/
 $rutas = array();
 $ruta = null;
 $infoProducto = null;

 if(isset($_GET["ruta"])){
 
 	$rutas = explode("/",$_GET["ruta"]);

 	$item = "ruta";
 	$valor = $rutas[0];

/*=============================================
	 URL'S AMIGABLES DE CATEGORIAS
=============================================*/

 	$rutaCategorias = ControladorProductos::ctrMostrarCategorias($item, $valor);
   
  	if($rutaCategorias){
	 	if($valor == $rutaCategorias["ruta"]){

	 		$ruta = $valor;
	 	} 
 	}

/*=============================================
	 URL??S AMIGABLES DE SUBCATEGORIAS
=============================================*/

 	$rutaSubCategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
   
   foreach ($rutaSubCategorias as $key => $value) {
   	
   	if($rutas[0] == $value["ruta"]){

   		$ruta = $rutas[0];	
   	
   	}

   }
/*=============================================
	 URL??S AMIGABLES DE PRODUCTOS
=============================================*/   
 	
 $rutaProductos = ControladorProductos::ctrMostrarInfoProducto($item, $valor);
 
 if($rutaProductos){//Sirve para verificar la existencia del valor

	if($rutas[0] == $rutaProductos["ruta"]){

   		$infoProducto = $rutas[0];	
   	
   	}

  }
/*=============================================
		LISTA BLANCA DE URL'S AMIGABLES
=============================================*/


 if($ruta != null || $rutas[0] == "articulos-gratis" || $rutas[0] == "lo-mas-vendido" || $rutas[0] == "lo-mas-visto"){

 		include "modulos/productos.php";
 }else if($infoProducto != null) {
 
 		include "modulos/infoproducto.php";

 }else if($rutas[0] == "buscador") {
 
 		include "modulos/buscador.php";

 }else{

 		include "modulos/error404.php";
 	}
 }else{

 	include "modulos/slide.php";

 	include 'modulos/destacados.php';

 }

?>
<input type="hidden" value="<?php echo $url?>" id ="rutaOculta">
<!--=========================================
	 JAVASCRIPT PERSONALIZADO
	==========================================-->

<script src="<?php echo $url?>vistas/js/cabezote.js"></script>
<script src="<?php echo $url?>vistas/js/plantilla.js"></script>
<script src="<?php echo $url?>vistas/js/slide.js"></script>				
<script src="<?php echo $url?>vistas/js/buscador.js"></script>		
<script src="<?php echo $url?>vistas/js/infoproducto.js"></script>	

</body>
</html>