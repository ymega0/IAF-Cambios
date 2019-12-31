<?php
class ControladorClientes{
	/*=============================================
	CREAR CLIENTES
	=============================================*/
	static public function ctrCrearCliente(){
		if(isset($_POST["nuevoCliente"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoCliente"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoapellido_paterno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoapellido_materno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoLugarNacimiento"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoNacionalidad"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoCURP"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["nuevaDireccion"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["nuevaEntreCalles"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["nuevoMunicipio"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["nuevoEstado"]) &&
			   preg_match('/^[0-9 ]+$/',                                                                                   $_POST["nuevoCodigoPostal"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoTutor"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoGenero"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/',                                                                               $_POST["nuevoTelefono"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoNivelEducativo"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoGrado"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoGrupo"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoMatriculaInterna"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["nuevoMatriculaOficial"])){
			   	$tabla = "clientes";
				   $datos = array("nombre"=>          $_POST["nuevoCliente"],
								  "apellido_paterno"=>$_POST["nuevoapellido_paterno"],
								  "apellido_materno"=>$_POST["nuevoapellido_materno"],
								  "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"],
								  "LugarNacimiento"=> $_POST["nuevoLugarNacimiento"],
								  "Nacionalidad"=>    $_POST["nuevoNacionalidad"],
							      "CURP"=>            $_POST["nuevoCURP"],
							      "Direccion"=>       $_POST["nuevaDireccion"],
							      "EntreCalles"=>     $_POST["nuevaEntreCalles"],
							      "Municipio"=>       $_POST["nuevoMunicipio"],
								  "Estado"=>          $_POST["nuevoEstado"],
								  "CodigoPostal"=>    $_POST["nuevoCodigoPostal"],
								  "Tutor"=>           $_POST["nuevoTutor"],
								  "Genero"=>          $_POST["nuevoGenero"],
					              "email"=>           $_POST["nuevoEmail"],
								  "telefono"=>        $_POST["nuevoTelefono"],
								  "NivelEducativo"=>  $_POST["nuevoNivelEducativo"],
								  "Grado"=>           $_POST["nuevoGrado"],
								  "Grupo"=>           $_POST["nuevoGrupo"],
								  "MatriculaInterna"=>$_POST["nuevoMatriculaInterna"],
								  "Modalidad"=>$_POST["Modalidad"],
								  "Escuela"=>$_POST["Escuela"],
								  "MatriculaOficial"=>$_POST["nuevoMatriculaOficial"]);
			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);
			   	if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El Estudiante ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "clientes";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El Estudiante no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "clientes";
							}
						})
			  	</script>';
			}
		}
	}
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
	static public function ctrMostrarClientes($item, $valor){
		$tabla = "clientes";
		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);
		return $respuesta;
	}
	/*=============================================
	EDITAR CLIENTE
	=============================================*/
	static public function ctrEditarCliente(){
		if(isset($_POST["editarCliente"])){
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarCliente"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarapellido_paterno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarapellido_materno"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarLugarNacimiento"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarNacionalidad"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarCURP"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["editarDireccion"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["editarEntreCalles"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["editarMunicipio"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/',                                                                        $_POST["editarEstado"]) &&
			   preg_match('/^[0-9 ]+$/',                                                                                   $_POST["editarCodigoPostal"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarTutor"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarGenero"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/',                                                                               $_POST["editarTelefono"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarNivelEducativo"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarGrado"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarGrupo"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarMatriculaInterna"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/',                                                                 $_POST["editarMatriculaOficial"])){
			   	$tabla = "clientes";
			   	$datos = array(   "id"=>              $_POST["idCliente"],
								  "nombre"=>          $_POST["editarCliente"],
								  "apellido_paterno"=>$_POST["editarapellido_paterno"],
								  "apellido_materno"=>$_POST["editarapellido_materno"],
								  "fecha_nacimiento"=>$_POST["editarFechaNacimiento"],
								  "LugarNacimiento"=> $_POST["editarLugarNacimiento"],
								  "Nacionalidad"=>    $_POST["editarNacionalidad"],
							   	  "CURP"=>            $_POST["editarCURP"],
							      "Direccion"=>       $_POST["editarDireccion"],
							      "EntreCalles"=>     $_POST["editarEntreCalles"],
							      "Municipio"=>       $_POST["editarMunicipio"],
								  "Estado"=>          $_POST["editarEstado"],
								  "CodigoPostal"=>    $_POST["editarCodigoPostal"],
								  "Tutor"=>           $_POST["editarTutor"],
								  "Genero"=>          $_POST["editarGenero"],
					              "email"=>           $_POST["editarEmail"],
								  "telefono"=>        $_POST["editarTelefono"],
								  "NivelEducativo"=>  $_POST["editarNivelEducativo"],
								  "Grado"=>           $_POST["editarGrado"],
								  "Grupo"=>           $_POST["editarGrupo"],
								  "MatriculaInterna"=>$_POST["editarMatriculaInterna"],
								  "MatriculaOficial"=>$_POST["editarMatriculaOficial"]);
			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
			   	if($respuesta == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "El Estudiante ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {
									window.location = "clientes";
									}
								})
					</script>';
				}
			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El Estudiante no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							window.location = "clientes";
							}
						})
			  	</script>';
			}
		}
	}
	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/
	static public function ctrEliminarCliente(){
		if(isset($_GET["idCliente"])){
			$tabla ="clientes";
			$datos = $_GET["idCliente"];
			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);
			if($respuesta == "ok"){
				echo'<script>
				swal({
					  type: "success",
					  title: "El Estudiante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {
								window.location = "clientes";
								}
							})
				</script>';
			}		
		}
	}
}
