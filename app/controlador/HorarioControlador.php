<?php
require_once "../modelo/HorarioModelo.php";
class HorarioControlador
{
	public function GuardarHorario($datos)
	{
		$respuesta = HorarioModelo::GuardarHorario($datos);
		return $respuesta;
	}
	public function ListarHorario($sede)
	{
		$respuesta = HorarioModelo::ListarHorario($sede);
		return $respuesta;
	}
	public function EliminarHorario($id,$id_salon)
	{
		$respuesta = HorarioModelo::EliminarHorario($id,$id_salon);
		return $respuesta;
	}
	public function ConsultarHorario($id)
	{
		$respuesta = HorarioModelo::ConsultarHorario($id);
		return $respuesta;
	}
	public function ActualizarHorario($datos)
	{
		$respuesta = HorarioModelo::ActualizarHorario($datos);
		return $respuesta;
	}
	public function BorrarCasillaHorario($datos)
	{
		$respuesta = HorarioModelo::BorrarCasillaHorario($datos);
		return $respuesta;
	}
	public function ConsultarPosicion($datos)
	{
		$respuesta = HorarioModelo::ConsultarPosicion($datos);
		return $respuesta;
	}
	public function ConsultarPosicionFicha($datos)
	{
		$respuesta = HorarioModelo::ConsultarPosicionFicha($datos);
		return $respuesta;
	}

	public function ConsultarHorarioInstructor($id)
	{
		$respuesta = HorarioModelo::ConsultarHorarioInstructor($id);
		return $respuesta;
	}
	public function ConsultarHorarioSalon($id)
	{
		$respuesta = HorarioModelo::ConsultarHorarioSalon($id);
		return $respuesta;
	}
	public function ConsultarHorarioFicha($id)
	{
		$respuesta = HorarioModelo::ConsultarHorarioFicha($id);
		return $respuesta;
	}
}



if (isset($_POST["opcion"])) 
{
	if ($_POST["opcion"] == "GuardarHorario") {
		$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;
		$salon = (isset($_POST['salon'])) ? $_POST['salon'] : null;
		$hora_inicial = (isset($_POST['horaI'])) ? $_POST['horaI'] : null;
		$hora_final = (isset($_POST['horaF'])) ? $_POST['horaF'] : null;
		$dia = (isset($_POST['dias'])) ? $_POST['dias'] : null;


		$dias = explode(',', $dia);
		$I = new DateTime($hora_inicial);
		$F = new DateTime($hora_final);
		$diferencia = $I->diff($F);

		$hf = new DateTime($hora_inicial);
		$hi = $I->format('h:i a');
		$hf->modify('+1 hours');
		$hfi = $hf->format('h:i a');
		$dhora = $diferencia->format('%H');
		$contadordias = count($dias);
		$a = 0;
		$b = 0;
		$DH = "";

		for ($j = 0; $j < $contadordias - 1; $j++) {
			for ($k = 1; $k < $contadordias - 1; $k++) {
				if ($dias[$j] > $dias[$k]) {
					if ($j < $k) {
						$a = $dias[$j];
						$b = $dias[$k];
						$dias[$j] = $b;
						$dias[$k] = $a;
					}
				}
			}
		}
		$c = 1;
		$fila = 0;
		$horario = null;

		$horario = null;

		$horario = '
        
        <table class="table">
          <thead class="table-secondary">
            <tr >
              <th scope="col" class="CentrarTexto">HORAS</th>';

		for ($i = 0; $i < $contadordias; $i++) {
			if ($dias[$i] == 1) {
				$horario = $horario . '<th class="CentrarTexto"> Lunes</th>';
			} elseif ($dias[$i] == 2) {
				$horario = $horario . '<th class="CentrarTexto"> Martes</th>';
			} elseif ($dias[$i] == 3) {
				$horario = $horario . '<th class="CentrarTexto"> Miercoles</th>';
			} elseif ($dias[$i] == 4) {
				$horario = $horario . '<th class="CentrarTexto"> Jueves</th>';
			} elseif ($dias[$i] == 5) {
				$horario = $horario . '<th class="CentrarTexto"> Viernes</th>';
			} elseif ($dias[$i] == 6) {
				$horario = $horario . '<th class="CentrarTexto"> Sabado</th>';
			} elseif ($dias[$i] == 7) {
				$horario = $horario . '<th class="CentrarTexto"> Domingo</th>';
			}
		}

		$horario = $horario . '
             </tr>
               </thead>
                 <tbody>';
		while ($c <= $dhora) {
			$horario = $horario . '<tr >';
			$horario = $horario . '<td class="table-secondary"><b>' . $hi . ' - ' . $hfi . '</b></td>';
			for ($i = 1; $i < $contadordias; $i++) {
				if ($i == 1) {
					$DH = "LUNES";
				} else if ($i == 2) {
					$DH = "MARTES";
				} else if ($i == 3) {
					$DH = "MIERCOLES";
				} else if ($i == 4) {
					$DH = "JUEVES";
				} else if ($i == 5) {
					$DH = "VIERNES";
				} else if ($i == 6) {
					$DH = "SABADO";
				}
				$horario = $horario . '<td class="CentrarTexto btnEliminarCasilla">
                        <div id="' . $c . $fila . '" >
                        <button type="button" class="btnAgregarAHorario btn-primary" data-row="' . $c . $fila . '" data-dh="' . $DH . " " . $hi . " - " . $hfi . '"> 
						<i class="bi-file-plus" ></i></button>
                        </div>
                        </td>
                       ';
				$fila = $fila + 1;
			}
			$fila = 0;
			$horario = $horario . '</tr>';
			$I->modify('+1 hours');
			$hi = $I->format('h:i a');
			$hf->modify('+1 hours');
			$hfi = $hf->format('h:i a');

			$c = $c + 1;
		}
		$horario = $horario . '</tbody>';
		

		$horario = $horario . '
            
               </table>';
		$contadordias = $contadordias - 1;
		$datos = [
			"sede" => $sede,
			"salon" => $salon,
			"horario" => $horario,
			"horas" => $dhora,
			"dias" => $contadordias
		];

		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->GuardarHorario($datos);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	}
	else if($_POST["opcion"] == "ListarHorario")
	{
		$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;
		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ListarHorario($sede);
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
	else if($_POST["opcion"] == "EliminarHorario")
	{
		$id_horario = (isset($_POST['id_horario'])) ? $_POST['id_horario'] : null;
		$id_salon = (isset($_POST['id_salon'])) ? $_POST['id_salon'] : null;
		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->EliminarHorario($id_horario,$id_salon);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	}
	else if($_POST["opcion"] == "ConsultarHorario")
	{
		$id_horario = (isset($_POST['id_horario'])) ? $_POST['id_horario'] : null;
		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ConsultarHorario($id_horario);
		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
	else if($_POST["opcion"] == "ActualizarHorario")
	{
		$id_horario = (isset($_POST['id_horario'])) ? $_POST['id_horario'] : null;
		$tabla= (isset($_POST['tabla'])) ? $_POST['tabla'] : null;
		$competencia= (isset($_POST['competencia'])) ? $_POST['competencia'] : null;
		$ficha= (isset($_POST['ficha'])) ? $_POST['ficha'] : null;
		$instructor= (isset($_POST['instructor'])) ? $_POST['instructor'] : null;
		$id_salon= (isset($_POST['id_salon'])) ? $_POST['id_salon'] : null;
		$posicion= (isset($_POST['posicion'])) ? $_POST['posicion'] : null;
		$horas= (isset($_POST['horas'])) ? $_POST['horas'] : null;
		
		$datos=[
			"id_horario"=>$id_horario,
			"id_salon"=>$id_salon,
			"competencia"=>$competencia,
			"ficha"=>$ficha,
			"instructor"=>$instructor,
			"posicion"=>$posicion,
			"horas"=>$horas,
			"tabla"=>$tabla
		];

		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ActualizarHorario($datos);
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	}
	else if($_POST["opcion"] == "BorrarCasillaHorario")
	{
		$id_horario = (isset($_POST['id_horario'])) ? $_POST['id_horario'] : null;
		$tabla= (isset($_POST['tabla'])) ? $_POST['tabla'] : null;
		$instructor= (isset($_POST['instructor'])) ? $_POST['instructor'] : null;
		$id_salon= (isset($_POST['id_salon'])) ? $_POST['id_salon'] : null;
		$posicion= (isset($_POST['posicion'])) ? $_POST['posicion'] : null;
		$horas=0;

		$datos=[
			"id_horario"=>$id_horario,
			"id_salon"=>$id_salon,
			"instructor"=>$instructor,
			"posicion"=>$posicion,
			"horas"=>$horas,
			"tabla"=>$tabla
		];

		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->BorrarCasillaHorario($datos);
		
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	}
	else if($_POST["opcion"] == "ConsultarPosicion")
	{
		$instructor= (isset($_POST['instructor'])) ? $_POST['instructor'] : null;
		$posicion= (isset($_POST['posicion'])) ? $_POST['posicion'] : null;
		$horas= (isset($_POST['horas'])) ? $_POST['horas'] : null;

		$datos=[
			"instructor"=>$instructor,
			"posicion"=>$posicion,
			"horas"=>$horas,
		];

		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ConsultarPosicion($datos);
		
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	}
	else if($_POST["opcion"] == "ConsultarPosicionFicha")
	{
		$ficha= (isset($_POST['ficha'])) ? $_POST['ficha'] : null;
		$posicion= (isset($_POST['posicion'])) ? $_POST['posicion'] : null;
		$horas= (isset($_POST['horas'])) ? $_POST['horas'] : null;

		$datos=[
			"ficha"=>$ficha,
			"posicion"=>$posicion,
			"horas"=>$horas,
		];

		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ConsultarPosicionFicha($datos);
		
		if ($respuesta) :
			echo 1;
		else :
			echo 2;
		endif;
	}
	else if($_POST["opcion"] == "ConsultarHorarioInstructor")
	{
		$id_instructor= (isset($_POST['id_instructor'])) ? $_POST['id_instructor'] : null;
		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ConsultarHorarioInstructor($id_instructor);
		if ($respuesta==false) :
			echo 1;
		else :
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		endif;
	}
	else if($_POST["opcion"] == "ConsultarHorarioFicha")
	{
		$id_ficha= (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ConsultarHorarioFicha($id_ficha);
		if ($respuesta==false) :
			echo 1;
		else :
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		endif;
	}
	else if($_POST["opcion"] == "ConsultarHorarioSalon")
	{
		$id_salon = (isset($_POST['id_salon'])) ? $_POST['id_salon'] : null;
		$respuesta = new HorarioControlador();
		$respuesta = $respuesta->ConsultarHorarioSalon($id_salon);
		if ($respuesta==false) :
			echo 1;
		else :
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		endif;
	}
}
