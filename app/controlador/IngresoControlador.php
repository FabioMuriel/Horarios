<?php
require_once "../modelo/IngresoModelo.php";
class IngresoControlador
{
	public function ConsultarIngreso($identifiacion)
    {
	  	 $respuesta = IngresoModelo::ConsultarIngreso($identifiacion);
         return $respuesta;
	}
	


}
if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ConsultarIngreso")
	{
		$identificacion = (isset($_POST['identificacion'])) ? $_POST['identificacion'] : null;
		$respuesta = new IngresoControlador();
		$respuesta =$respuesta -> ConsultarIngreso($identificacion);
        if($respuesta == 0):
            echo 0;
         else:
			echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		 endif;
	}
	
}





   
?> 
