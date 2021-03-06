<?php

require_once "conexion.php";

class ModeloCarrera{

	/*=============================================
	CREAR CATEGORIA
	=============================================*/

	static public function mdlIngresarCarrera($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(escuela, codigo, carrera, Meses, Turno, planestudio, cordinador ) VALUES (:escuela, :codigo, :carrera, :Meses, :Turno, :planestudio, :cordinador)");

		$stmt->bindParam(":escuela", $datos["Escuela"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo", $datos["codigoModalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":carrera", $datos["NombreModalidad"], PDO::PARAM_STR);
		$stmt->bindParam(":Meses", $datos["Meses"], PDO::PARAM_STR);
		$stmt->bindParam(":cordinador", $datos["cordinador"], PDO::PARAM_STR);
		$stmt->bindParam(":Turno", $datos["turno"], PDO::PARAM_STR);
		$stmt->bindParam(":planestudio", $datos["planestudio"], PDO::PARAM_STR);
		
	

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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function mdlEditarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria WHERE id = :id");

		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

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

