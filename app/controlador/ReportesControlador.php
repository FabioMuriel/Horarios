<?php
require_once "../modelo/ReportesModelo.php";
class ReportesControlador
{
	public function ListarReporteIntructorHoy($sede,$cargo)
    {
	  	 $respuesta = ReportesModelo::ListarReporteIntructorHoy($sede,$cargo);
         return $respuesta;
	}
	public function ListarReporteAprendizHoy($sede,$cargo)
    {
	  	 $respuesta = ReportesModelo::ListarReporteAprendizHoy($sede,$cargo);
         return $respuesta;
	}
	
	public function ListarReporteIntructorEntreFechas($fechaI,$fechaF,$sede,$cargo)
    {
	  	 $respuesta = ReportesModelo::ListarReporteIntructorEntreFechas($fechaI,$fechaF,$sede,$cargo);
         return $respuesta;
	}

	public function ListarReporteAprendizEntreFechas($fechaI,$fechaF,$sede,$cargo)
    {
	  	 $respuesta = ReportesModelo::ListarReporteAprendizEntreFechas($fechaI,$fechaF,$sede,$cargo);
         return $respuesta;
	}
		public function contarInstructor()
    {
	  	 $respuesta = ReportesModelo::contarInstructor();
         return $respuesta;
	}
}



if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ListarReporteInstructorHoy"):
		$sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
		$cargo = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null;
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteIntructorHoy($sede,$cargo);
		 if($respuesta == false):
            echo 1;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
		 
    elseif($_POST["opcion"]=="ListarReporteAprendizHoy"):
		$sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
		$cargo = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null;
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteAprendizHoy($sede,$cargo);
		 if($respuesta == false):
            echo 1;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	elseif($_POST["opcion"]=="ListarReporteInstructorEntreFechas"):
		$sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
		$cargo = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null;
		$fechaI = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : null;
		$fechaF = (isset($_POST['fechaF'])) ? $_POST['fechaF'] : null;
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteIntructorEntreFechas($fechaI,$fechaF,$sede,$cargo);
		 if($respuesta == false):
            echo 1;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	elseif($_POST["opcion"]=="ListarReporteAprendizEntreFechas"):
		$sede = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
		$cargo = (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null;
		$fechaI = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : null;
		$fechaF = (isset($_POST['fechaF'])) ? $_POST['fechaF'] : null;
		$respuesta = new ReportesControlador();
		$respuesta =$respuesta -> ListarReporteAprendizEntreFechas($fechaI,$fechaF,$sede,$cargo);
		 if($respuesta == false):
			echo 1;
		 else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
		 elseif($_POST["opcion"] == "contarInstructor"):
		     $respuesta= new ReportesControlador();
		     $respuesta =$respuesta -> contarInstructor();
		      if($respuesta == false):
			echo 1;
		 else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	endif;
}





   
?> 
