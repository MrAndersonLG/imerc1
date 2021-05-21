<?php

require_once "conexion.php";

class ModeloProductos{

/*--=====================================
	 MOSTRAR CATEGORÍAS
  ======================================--*/

	static public function mdlMostrarCategorias($tabla, $item, $valor){

		if($item != null){

			$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stm -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stm -> execute();

			return $stm -> fetch(); // Cuando devuelve varios items usamos fetchAll

		}else{


			$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stm -> execute();

			return $stm -> fetchAll(); // Cuando devuelve varios items usamos fetchAll
	
		}


		$stm -> close();

		$stm = null;
	}

/*--=====================================
	 MOSTRAR SUBCATEGORÍAS
  ======================================--*/

	static public function mdlMostrarSubCategorias($tabla, $item, $valor){

		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stm -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stm -> execute();

		return $stm -> fetchAll(); // Cuando devuelve varios items usamos fetchAll

		$stm -> close();

		$stm = null;
	}

/*--=====================================
	 MOSTRAR PRODUCTOS
  ======================================--*/	

  static public function mdlMostrarProductos($tabla, $ordenar, $item, $valor, $base, $tope, $modo){

  	if($item != null){

  		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar $modo LIMIT $base, $tope");

  		$stm -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	  	$stm -> execute();

	  	return $stm -> fetchAll(); // Cuando devuelve varios items usamos fetchAll

  	}else{
 
  	 $stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar $modo LIMIT $base, $tope");

  	 $stm -> execute();

  	 return $stm -> fetchAll(); // Cuando devuelve varios items usamos fetchAll
	
	}


	$stm -> close();

	$stm = null;
  }

  /*--=====================================
	 MOSTRAR INFOPRODUCTO
  ======================================--*/

	static public function mdlMostrarInfoProducto($tabla, $item, $valor){

		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

		$stm -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stm -> execute();

		return $stm -> fetch(); // Cuando devuelve uno solo

		$stm -> close();

		$stm = null;
	}

/*--=====================================
	   LISTAR PRODUCTOS 
======================================--*/
	
	static public function mdlListarProductos($tabla,$ordenar,$item,$valor){

		if($item != null){

	  		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY $ordenar DESC");

	  		$stm -> bindParam(":".$item, $valor, PDO::PARAM_STR);

	  		$stm -> execute();

	  		return $stm -> fetchAll();  
 

	  	}else{
	 
	  	 	$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $ordenar DESC");

	  		$stm -> execute();

	  		return $stm -> fetchAll();  

		
		}

		$stm -> close();

		$stm = null;

	}

/*--=====================================
	 MOSTRAR BANNER
  ======================================--*/

	static public function mdlMostrarBanner($tabla, $ruta){

		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta = :ruta");

		$stm -> bindParam(":ruta",$ruta, PDO::PARAM_STR);

		$stm -> execute();

		return $stm -> fetch(); // Cuando devuelve uno solo

		$stm -> close();

		$stm = null;
	}

/*--=====================================
   BUSCADOR
  ======================================--*/

  	static public function mdlBuscarProductos($tabla, $busqueda,$ordenar,$modo,$base,$tope){

  		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta LIKE '%$busqueda%' OR titulo LIKE '%$busqueda%' OR titular LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%' ORDER BY $ordenar $modo LIMIT $base, $tope");

  		$stm -> execute();

		return $stm -> fetchAll(); // Cuando devuelve uno solo

		$stm -> close();

		$stm = null;

  	}

  /*--=====================================
	   LISTAR PRODUCTOS BUSCADOR
======================================--*/
	
	static public function mdlListarProductosBusqueda($tabla,$busqueda){

  		$stm = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE ruta LIKE '%$busqueda%' OR titulo LIKE '%$busqueda%' OR titular LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%'");

  		$stm -> execute();

		return $stm -> fetchAll(); // Cuando devuelve uno solo

		$stm -> close();

		$stm = null;

  	}


}