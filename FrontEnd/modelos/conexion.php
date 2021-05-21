<?php


class Conexion{

	public function conectar(){
			//cuando tegasmos el nombe del servidor, cambiamos el localhost por el nombre
		$link = new PDO("mysql:host=localhost;dbname=ecommerce",
						"root",
						"",
					    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
					          PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
					    );
		return $link;
	}

}