/*=============================================
EDITAR CLIENTE jojo
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
      	 $("#idCliente").val(respuesta["id"]);
         $("#editarCliente").val(respuesta["nombre"]);
         $("#editarapellido_paterno").val(respuesta["apellido_paterno"]);
         $("#editarapellido_materno").val(respuesta["apellido_materno"]);
         $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
         $("#editarLugarNacimiento").val(respuesta["LugarNacimiento"]);
         $("#editarNacionalidad").val(respuesta["Nacionalidad"]);
         $("#editarCURP").val(respuesta["CURP"]);
         $("#editarDireccion").val(respuesta["Direccion"]);
         $("#editarEntreCalles").val(respuesta["EntreCalles"]);
         $("#editarMunicipio").val(respuesta["Municipio"]);
         $("#editarEstado").val(respuesta["Estado"]);
         $("#editarCodigoPostal").val(respuesta["CodigoPostal"]);
         $("#editarTutor").val(respuesta["Tutor"]);
         $("#editarGenero").val(respuesta["Genero"]);
         $("#editarEmail").val(respuesta["email"]);
	       $("#editarTelefono").val(respuesta["telefono"]);
         $("#editarNivelEducativo").val(respuesta["NivelEducativo"]);
         $("#editarGrado").val(respuesta["Grado"]);
         $("#editarGrupo").val(respuesta["Grupo"]);
         $("#editarMatriculaInterna").val(respuesta["MatriculaInterna"]);
         $("#editarMatriculaOficial").val(respuesta["MatriculaOficial"]);
         
	  }

  	})

})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

	var idCliente = $(this).attr("idCliente");
	
	swal({
        title: '¿Está Seguro de Borrar al Estudiante?',
        text: "¡Si no lo está puede CANCELAR la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, Borrar Estudiante!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})