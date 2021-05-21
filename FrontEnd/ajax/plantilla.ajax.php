<?php

require_once "../controladores/plantilla.controlador.php"; // Invocacion del objeto controlador
require_once "../modelos/plantilla.modelo.php";

class AjaxPlantilla{

	public function ajaxEstiloPlantilla(){

		$respuesta = ControladorPlantilla::ctrEstiloPlantilla();

		echo json_encode($respuesta);


	}
}

$objeto = new AjaxPlantilla();
$objeto -> ajaxEstiloPlantilla();