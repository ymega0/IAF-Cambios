<?php

require_once "conexion.php";

class ModeloCarrera{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(escuela, codigo, carrera,cordinador) VALUES (:escuela, :codigo, :carrera, :cordinador)");

		$stmt->bindParam(":escuela", $datos["escuela"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt->bindParam(":cordinador", $datos["cordinador"], PDO::PARAM_STR);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarCarrera($tabla, $item, $valor){

		if($item != null){
			//Este If se ocupa para buscar un resultado predeterminado en labarra de buscador de la tabla

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY id DESC");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY $orden DESC");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera");

		$stmt -> bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
		$stmt -> bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt -> bindParam(":cordinador", $datos["codigo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}

