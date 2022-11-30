<?php
require_once "../modelo/AutoreporteModelo.php";
class AutoreproteControlador
{
	public function GuardarAutoreporte($datos)
	{
		$respuesta = AutoreporteModelo::GuardarAutoreporte($datos);
		return $respuesta;
	}
	public function ConsultarAutoreporte($id)
	{
		$respuesta = AutoreporteModelo::ConsultarAutoreporte($id);
		return $respuesta;
	}
	public function GuardarAutoreporteAprendiz($datos)
	{
		$respuesta = AutoreporteModelo::GuardarAutoreporteAprendiz($datos);
		return $respuesta;
	}
	public function ConsultarAutoreporteAprendiz($id)
	{
		$respuesta = AutoreporteModelo::ConsultarAutoreporteAprendiz($id);
		return $respuesta;
	}
}



if (isset($_POST["opcion"])) {
	if ($_POST["opcion"] == "GuardarAutoreporte") :
		$id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : null;
		$fiebre = (isset($_POST['fiebre'])) ? $_POST['fiebre'] : null;
		$fiebre14 = (isset($_POST['fiebre14'])) ? $_POST['fiebre14'] : null;
		$tos = (isset($_POST['tos'])) ? $_POST['tos'] : null;
		$respiracion = (isset($_POST['respiracion'])) ? $_POST['respiracion'] : null;
		$fatiga = (isset($_POST['fatiga'])) ? $_POST['fatiga'] : null;
		$olfato = (isset($_POST['olfato'])) ? $_POST['olfato'] : null;
		$dolor_cabeza = (isset($_POST['dolor_cabeza'])) ? $_POST['dolor_cabeza'] : null;
		$pecho = (isset($_POST['pecho'])) ? $_POST['pecho'] : null;
		$nauseas = (isset($_POST['nauseas'])) ? $_POST['nauseas'] : null;
		$garganta = (isset($_POST['garganta'])) ? $_POST['garganta'] : null;

		$datos = [
			"id_persona" => $id_persona,
			"fiebre" => $fiebre,
			"fiebre14" => $fiebre14,
			"tos" => $tos,
			"respiracion" => $respiracion,
			"fatiga" => $fatiga,
			"olfato" => $olfato,
			"dolor_cabeza" => $dolor_cabeza,
			"pecho" => $pecho,
			"nauseas" => $nauseas,
			"garganta" => $garganta,
		];

		$respuesta = new AutoreproteControlador();
		$respuesta = $respuesta->GuardarAutoreporte($datos);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;

	elseif ($_POST["opcion"] == "ConsultarAutoreporte") :
		$id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : null;
		$respuesta = new AutoreproteControlador();
		$respuesta = $respuesta->ConsultarAutoreporte($id_persona);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	elseif ($_POST["opcion"] == "GuardarAutoreporteAprendiz") :
		$id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : null;
		$fiebre = (isset($_POST['fiebre'])) ? $_POST['fiebre'] : null;
		$fiebre14 = (isset($_POST['fiebre14'])) ? $_POST['fiebre14'] : null;
		$tos = (isset($_POST['tos'])) ? $_POST['tos'] : null;
		$respiracion = (isset($_POST['respiracion'])) ? $_POST['respiracion'] : null;
		$fatiga = (isset($_POST['fatiga'])) ? $_POST['fatiga'] : null;
		$olfato = (isset($_POST['olfato'])) ? $_POST['olfato'] : null;
		$dolor_cabeza = (isset($_POST['dolor_cabeza'])) ? $_POST['dolor_cabeza'] : null;
		$pecho = (isset($_POST['pecho'])) ? $_POST['pecho'] : null;
		$nauseas = (isset($_POST['nauseas'])) ? $_POST['nauseas'] : null;
		$garganta = (isset($_POST['garganta'])) ? $_POST['garganta'] : null;

		$datos = [
			"id_persona" => $id_persona,
			"fiebre" => $fiebre,
			"fiebre14" => $fiebre14,
			"tos" => $tos,
			"respiracion" => $respiracion,
			"fatiga" => $fatiga,
			"olfato" => $olfato,
			"dolor_cabeza" => $dolor_cabeza,
			"pecho" => $pecho,
			"nauseas" => $nauseas,
			"garganta" => $garganta,
		];

		$respuesta = new AutoreproteControlador();
		$respuesta = $respuesta->GuardarAutoreporteAprendiz($datos);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	elseif ($_POST["opcion"] == "ConsultarAutoreporteAprendiz") :
		$id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : null;
		$respuesta = new AutoreproteControlador();
		$respuesta = $respuesta->ConsultarAutoreporteAprendiz($id_persona);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	endif;
}
