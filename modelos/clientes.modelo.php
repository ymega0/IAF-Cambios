<?php

require_once "conexion.php";

class ModeloClientes{

	/*=============================================
	CREAR CLIENTE
	=============================================*/

	static public function mdlIngresarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(
			nombre, 
			apellido_paterno, 
			apellido_materno, 
			fecha_nacimiento, 
			LugarNacimiento, 
			Nacionalidad, 
			CURP, 
			Direccion, 
			EntreCalles, 
			Municipio, 
			Estado, 
			CodigoPostal, 
			Tutor, 
			Genero, 
			email, 
			telefono, 
			NivelEducativo, 
			Grado, 
			Grupo, 
			MatriculaInterna,
			MatriculaOficial) 
			VALUES 
			(:nombre, 
			:apellido_paterno, 
			:apellido_materno, 
			:fecha_nacimiento, 
			:LugarNacimiento, 
			:Nacionalidad, 
			:CURP, 
			:Direccion, 
			:EntreCalles, 
			:Municipio, 
			:Estado, 
			:CodigoPostal, 
			:Tutor, 
			:Genero, 
			:email, 
			:telefono, 
			:NivelEducativo, 
			:Grado, 
			:Grupo, 
			:MatriculaInterna,
			:MatriculaOficial)
			");

		$stmt->bindParam(":nombre",           $datos["nombre"],           PDO::PARAM_STR);
		$stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":LugarNacimiento",  $datos["LugarNacimiento"],  PDO::PARAM_STR);
		$stmt->bindParam(":Nacionalidad",     $datos["Nacionalidad"],     PDO::PARAM_STR);
		$stmt->bindParam(":CURP",             $datos["CURP"],             PDO::PARAM_STR);
		$stmt->bindParam(":Direccion",        $datos["Direccion"],        PDO::PARAM_STR);
		$stmt->bindParam(":EntreCalles",      $datos["EntreCalles"],      PDO::PARAM_STR);
		$stmt->bindParam(":Municipio",        $datos["Municipio"],        PDO::PARAM_STR);
		$stmt->bindParam(":Estado",           $datos["Estado"],           PDO::PARAM_STR);
		$stmt->bindParam(":CodigoPostal",     $datos["CodigoPostal"],     PDO::PARAM_STR);
		$stmt->bindParam(":Tutor",            $datos["Tutor"],            PDO::PARAM_STR);
		$stmt->bindParam(":Genero",           $datos["Genero"],           PDO::PARAM_STR);
		$stmt->bindParam(":email",            $datos["email"],            PDO::PARAM_STR);
		$stmt->bindParam(":telefono",         $datos["telefono"],         PDO::PARAM_STR);
		$stmt->bindParam(":NivelEducativo",   $datos["NivelEducativo"],   PDO::PARAM_STR);
		$stmt->bindParam(":Grado",            $datos["Grado"],            PDO::PARAM_STR);
		$stmt->bindParam(":Grupo",            $datos["Grupo"],            PDO::PARAM_STR);
		$stmt->bindParam(":MatriculaInterna", $datos["MatriculaInterna"], PDO::PARAM_STR);
		$stmt->bindParam(":MatriculaOficial", $datos["MatriculaOficial"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function mdlMostrarClientes($tabla, $item, $valor){

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
	EDITAR CLIENTE
	=============================================*/

	static public function mdlEditarCliente($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		nombre = :nombre, 
		apellido_paterno = :apellido_paterno, 
		apellido_materno = :apellido_materno, 
		fecha_nacimiento = :fecha_nacimiento, 
		LugarNacimiento = :LugarNacimiento, 
		Nacionalidad = :Nacionalidad, 
		CURP = :CURP, 
		Direccion = :Direccion, 
		EntreCalles = :EntreCalles, 
		Municipio = :Municipio, 
		Estado = :Estado, 
		CodigoPostal = :CodigoPostal, 
		Tutor = :Tutor, 
		Genero = :Genero, 
		email = :email, 
		telefono = :telefono, 
		NivelEducativo = :NivelEducativo, 
		Grado = :Grado, 
		Grupo = :Grupo, 
		MatriculaInterna = :MatriculaInterna,
		MatriculaOficial = :MatriculaOficial 
		WHERE 
		id = :id");

		$stmt->bindParam(":id",               $datos["id"],               PDO::PARAM_INT);
		$stmt->bindParam(":nombre",           $datos["nombre"],           PDO::PARAM_STR);
		$stmt->bindParam(":apellido_paterno", $datos["apellido_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":apellido_materno", $datos["apellido_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":LugarNacimiento",  $datos["LugarNacimiento"],  PDO::PARAM_STR);
		$stmt->bindParam(":Nacionalidad",     $datos["Nacionalidad"],     PDO::PARAM_STR);
		$stmt->bindParam(":CURP",             $datos["CURP"],             PDO::PARAM_STR);
		$stmt->bindParam(":Direccion",        $datos["Direccion"],        PDO::PARAM_STR);
		$stmt->bindParam(":EntreCalles",      $datos["EntreCalles"],      PDO::PARAM_STR);
		$stmt->bindParam(":Municipio",        $datos["Municipio"],        PDO::PARAM_STR);
		$stmt->bindParam(":Estado",           $datos["Estado"],           PDO::PARAM_STR);
		$stmt->bindParam(":CodigoPostal",     $datos["CodigoPostal"],     PDO::PARAM_STR);
		$stmt->bindParam(":Tutor",            $datos["Tutor"],            PDO::PARAM_STR);
		$stmt->bindParam(":Genero",           $datos["Genero"],           PDO::PARAM_STR);
		$stmt->bindParam(":email",            $datos["email"],            PDO::PARAM_STR);
		$stmt->bindParam(":telefono",         $datos["telefono"],         PDO::PARAM_STR);
		$stmt->bindParam(":NivelEducativo",   $datos["NivelEducativo"],   PDO::PARAM_STR);
		$stmt->bindParam(":Grado",            $datos["Grado"],            PDO::PARAM_STR);
		$stmt->bindParam(":Grupo",            $datos["Grupo"],            PDO::PARAM_STR);
		$stmt->bindParam(":MatriculaInterna", $datos["MatriculaInterna"], PDO::PARAM_STR);
		$stmt->bindParam(":MatriculaOficial", $datos["MatriculaOficial"], PDO::PARAM_STR);
		
		

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function mdlEliminarCliente($tabla, $datos){

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

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarCliente($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}