<?php

//Ya en el servidor se hace el cambio

class Ruta{

	/*=============================================
	RUTA LADO DEL CLIENTE
	=============================================*/

	public function ctrRuta(){

		return "http://localhost:84/ecomerce/frontend/";
	}

	/*=============================================
	RUTA LADO DEL SERVIDOR
	=============================================*/
	

	public function ctrRutaServidor(){

		return "http://localhost:84/ecomerce/backend/";
	}


}