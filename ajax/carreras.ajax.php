<?php

require_once "../controladores/carrera.controlador.php";
require_once "../modelos/carrera.modelo.php";


class AjaxCarrera{



  /*=============================================
  EDITAR CARRERA
  =============================================*/ 

  public $idCarrera;

  public function ajaxEditarCarrera(){

	$item= "id";
	$valor = $this->idCarrera;

	$respuesta = ControladorCarrera::ctrMostrarCarrera($item, $valor);

	echo json_encode($respuesta);

  }

}

if (isset($_POST["idCarrera"])){

	$carrera = new ajaxCarrera();
	$carrera -> idCliente = $_POST["idCliente"];
	$carrera -> ajaxEditarCarrera();

}

