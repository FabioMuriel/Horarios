<?php
require_once "../modelo/InstructorModelo.php";
class InstructorControlador
{
	public function ListarFichaPorInstructor($id_instructor)
	{
		$respuesta = InstructorModelo::ListarFichaPorInstructor($id_instructor);
		return $respuesta;
	}
	public function ListarAprendizPorFichaYAsistencia($id_ficha)
	{
		$respuesta = InstructorModelo::ListarAprendizPorFichaYAsistencia($id_ficha);
		return $respuesta;
	}

	public function GuardarAsistenciaClase($datos)
	{
		$respuesta = InstructorModelo::GuardarAsistenciaClase($datos);
		return $respuesta;
	}

	public function HistorialAsistenciaAprendizHoy($ficha)
	{
		$respuesta = InstructorModelo::HistorialAsistenciaAprendizHoy($ficha);
		return $respuesta;
	}

	public function HistorialAsistenciaAprendizEntreFechas($ficha,$fechaI,$fechaF)
	{
		$respuesta = InstructorModelo::HistorialAsistenciaAprendizEntreFechas($ficha,$fechaI,$fechaF);
		return $respuesta;
	}
	
	
	public function NovedadAprendiz($id_aprendiz,$tipo_novedad){
	    $respuesta = InstructorModelo::NovedadAprendiz($id_aprendiz,$tipo_novedad);
		return $respuesta;
	}
}



if (isset($_POST["opcion"])) {
	if ($_POST["opcion"] == "ListarFichaPorInstructor") :
		$id_instructor = (isset($_POST['id_instructor'])) ? $_POST['id_instructor'] : null;
		$respuesta = new InstructorControlador();
		$respuesta = $respuesta->ListarFichaPorInstructor($id_instructor);
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);

	elseif ($_POST["opcion"] == "ListarAprendizPorFichaYAsistencia") :
		$id_ficha = (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
		$respuesta = new InstructorControlador();
		$respuesta = $respuesta->ListarAprendizPorFichaYAsistencia($id_ficha);
		if ($respuesta == false) :
			echo 1;
		else :
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		endif;

	elseif ($_POST["opcion"] == "GuardarAsistenciaClase") :
		$id_ficha = (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
		$id_instructor = (isset($_POST['id_instructor'])) ? $_POST['id_instructor'] : null;
		$id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
		$asistencia_tipo = (isset($_POST['asistencia_tipo'])) ? $_POST['asistencia_tipo'] : null;
		$asistencia_observacion = (isset($_POST['asistencia_observacion'])) ? $_POST['asistencia_observacion'] : null;

		$datos = [
			"id_ficha" => $id_ficha,
			"id_instructor" => $id_instructor,
			"id_aprendiz" => $id_aprendiz,
			"asistencia_tipo" => $asistencia_tipo,
			"asistencia_observacion" => $asistencia_observacion
		];

		$respuesta = new InstructorControlador();
		$respuesta = $respuesta->GuardarAsistenciaClase($datos);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	elseif ($_POST["opcion"] == "HistorialAsistenciaAprendizHoy") :

		$ficha = (isset($_POST['ficha'])) ? $_POST['ficha'] : null;

		$respuesta = new InstructorControlador();
		$respuesta = $respuesta->HistorialAsistenciaAprendizHoy($ficha);
		if ($respuesta == false) :
			echo 1;
		else :
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		endif;
	elseif ($_POST["opcion"] == "HistorialAsistenciaAprendizEntreFechas") :

		$ficha = (isset($_POST['ficha'])) ? $_POST['ficha'] : null;
		$fechaI = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : null;
		$fechaF = (isset($_POST['fechaI'])) ? $_POST['fechaF'] : null;

		$respuesta = new InstructorControlador();
		$respuesta = $respuesta->HistorialAsistenciaAprendizEntreFechas($ficha,$fechaI,$fechaF);
		if ($respuesta == false) :
			echo 1;
		else :
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		endif;
	elseif ($_POST["opcion"] == "NovedadAprendiz"):
	       
		$id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
		$tipo_novedad = (isset($_POST['tipo_novedad'])) ? $_POST['tipo_novedad'] : null;
		
        $respuesta = new InstructorControlador();
        $respuesta = $respuesta->NovedadAprendiz($id_aprendiz,$tipo_novedad);
       if ($respuesta == false) :
			echo 1;
		else :
			echo 2;
		endif;
		
	elseif ($_POST["opcion"] == "listarprogramas"):
		   	$respuesta = $respuesta->ListarProgramasSGP();
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE); 
		
	endif;
}
