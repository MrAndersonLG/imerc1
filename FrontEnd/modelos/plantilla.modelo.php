<?php

require_once "conexion.php";

class ModeloPlantilla{

   static public function mdlEstiloPlantilla($tabla){

   	  $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
   	  $stmt -> execute();

   	  return  $stmt -> fetch(); // solo de una linea fetch

   	  $stmt -> close();

   }

}