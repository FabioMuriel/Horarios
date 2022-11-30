<?php
require_once "../modelo/AprendizModelo.php";
class AprendizControlador
{
	public function ListarAprendiz($id_sedeA,$cargoU)
    {
	  	 $respuesta = AprendizModelo::ListarAprendiz($id_sedeA,$cargoU);
         return $respuesta;
	}
	public function GuardarAprendiz($datos,$vehiculo)
    {
	  	 $respuesta = AprendizModelo::GuardarAprendiz($datos,$vehiculo);
         return $respuesta;
	}
	public function ConsultarAprendiz($id)
    {
	  	 $respuesta = AprendizModelo::ConsultarAprendiz($id);
         return $respuesta;
	}
	public function ActualizarAprendiz($id)
    {
	  	 $respuesta = AprendizModelo::ActualizarAprendiz($id);
         return $respuesta;
	}
   
	public function EliminarAprendiz($id)
    {
	  	 $respuesta = AprendizModelo::EliminarAprendiz($id);
         return $respuesta;
	}
	
	public function EstadoAsistencia($id)
	{
	    $respuesta = AprendizModelo::EstadoAsistencia($id);
	    return $respuesta;
	}
	
	public function ValidaAsistenciaAprendices($datos)
	{
	    $respuesta = AprendizModelo::ValidaAsistenciaAprendices($datos);
	    return $respuesta;
	}
	
	public function ConsultaAprendiz($idSesionAp)
	{
	    $respuesta = AprendizModelo::ConsultaAprendiz($idSesionAp);
	    return $respuesta;
	}
	
	public function RegistrarIngreso($datos)
	{
	    $respuesta = AprendizModelo::RegistrarIngresos($datos);
	    
	    return $respuesta;
	}
	
	public function Redecicion($id)
	{
	    $respuesta = AprendizModelo::Redecicion($id);
	    return $respuesta;
	}
	
	public function RegistrarReingreso($datos)
	{
	    $respuesta = AprendizModelo::RegistrarReingreso($datos);
	    return $respuesta;
	}
	
	public function RegistrarSalida($datos)
	{
	    $respuesta = AprendizModelo::RegistrarSalida($datos);
	    return $respuesta;
	}

	public function ConsultarVehiculoAprendiz($id)
    {
		 
		 $respuesta = AprendizModelo::ConsultarVehiculoAprendiz($id);
		 return $respuesta;
	}

	public function GuardarVehiculoAprendiz($datos)
    {
		 $respuesta = AprendizModelo::GuardarVehiculoAprendiz($datos);
		 return $respuesta;
	}

	public function EliminarVehiculoAprendiz($id)
    {
		 $respuesta = AprendizModelo::EliminarVehiculoAprendiz($id);
		 return $respuesta;
	}
	
	public function GuardarDocumentosCertificacion($datos)
    {
		 $respuesta = AprendizModelo::GuardarDocumentosCertificacion($datos);
		 return $respuesta;
	}
	
	public function ContadorInasistencia($id)
	{
	    $respuesta = AprendizModelo::ContadorInasistencia($id);
	    return $respuesta;
	}
	
	public function ContadorExcusa($id)
	{
	    $respuesta = AprendizModelo::ContadorExcusa($id);
	    return $respuesta;
	}
	
	public function ContadorCasosA($id)
	{
	    $respuesta = AprendizModelo::ContadorCasosA($id);
	    return $respuesta;
	}
	
	public function ContadorCasosC($id)
	{
	    $respuesta = AprendizModelo::ContadorCasosC($id);
	    return $respuesta;
	}
	public function ConsultarDocumentacionAprendiz($id)
	{
	    $respuesta = AprendizModelo::ConsultarDocumentacionAprendiz($id);
	    return $respuesta;
	}

	public function ActualizarDocumentacionAprendiz($datos)
	{
	    $respuesta = AprendizModelo::ActualizarDocumentacionAprendiz($datos);
	    return $respuesta;
	}


}
if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ListarAprendiz")
	{
		$id_sedeA = (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
		$cargoU= (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null;
		$respuesta = new AprendizControlador();
		$respuesta =$respuesta -> ListarAprendiz($id_sedeA,$cargoU);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
	else if($_POST["opcion"]=="GuardarAprendiz")
	{
		 $tipo_documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : null;
		 $numero_docuemnto = (isset($_POST['numero_documento'])) ? $_POST['numero_documento'] : null;
		 $nombres= (isset($_POST['nombres'])) ? $_POST['nombres'] : null;
		 $apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
		 $direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
		 $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
		 $correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
		 $ficha= (isset($_POST['ficha'])) ? $_POST['ficha'] : null;
		 $programa = (isset($_POST['programa'])) ? $_POST['programa'] : null;
		 $contraseña= (isset($_POST['contraseña'])) ? $_POST['contraseña'] : null;
		 $sede= (isset($_POST['sede'])) ? $_POST['sede'] : null;
		 $estado ="EN FORMACION";
		 $cargo="APRENDIZ";
		 $vehiculo = json_decode($_POST['vehiculoPersona']);
		 if(isset($_FILES['imagen']))
		 {
			
            $imagen=$_FILES["imagen"]["tmp_name"];
			$urlImagen="../../public/assets/img/fotos_aprendices/".$_FILES['imagen']['name'];
			move_uploaded_file($imagen,$urlImagen);
		 }
		 else
		 {
			$urlImagen="";
		 }
			
		 $datos=
		 [
			 'tipo_documento' => $tipo_documento,
			 'numero_documento' => $numero_docuemnto,
			 'nombres' => $nombres,
			 'apellidos' => $apellidos,
			 'direccion' => $direccion,
			 'telefono' => $telefono,
			 'correo' => $correo,
			 'ficha' => $ficha,
			 'programa' => $programa,
			 'contraseña' => $contraseña,
			 'imagen' => $urlImagen,
			 'estado' => $estado,
			 'sede' => $sede,
			 'cargo' => $cargo
		];

		$respuesta = new AprendizControlador();
		$respuesta =$respuesta -> GuardarAprendiz($datos,$vehiculo);
		if($respuesta):
			echo 1;
		else:
			echo 2;
		endif;
	}
	else if($_POST["opcion"]=="ConsultarAprendiz")
	{
	  $id_aprendiz= (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
 	  $respuesta = new AprendizControlador();
	  $respuesta =$respuesta -> ConsultarAprendiz($id_aprendiz);
	  echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
	else if($_POST["opcion"]=="ActualizarAprendiz")
	{
		$id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
		$tipo_documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : null;
		$numero_docuemnto = (isset($_POST['numero_documento'])) ? $_POST['numero_documento'] : null;
		$nombres= (isset($_POST['nombres'])) ? $_POST['nombres'] : null;
		$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
		$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
		$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
		$correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
		$ficha= (isset($_POST['ficha'])) ? $_POST['ficha'] : null;
		$estado = (isset($_POST['estadoA'])) ? $_POST['estadoA'] : null;
		$programa = (isset($_POST['programa'])) ? $_POST['programa'] : null;
		$contraseña= (isset($_POST['contraseña'])) ? $_POST['contraseña'] : null;
		$sede= (isset($_POST['sede'])) ? $_POST['sede'] : null;
		$imagen= (isset($_POST['imagen'])) ? $_POST['imagen'] : null;
		$textoIA= (isset($_POST['textoIA'])) ? $_POST['textoIA'] : null;

		if($textoIA=="primeraVez")
		{
			if(isset($_FILES['imagen']))
			{
				$imagen=$_FILES["imagen"]["tmp_name"];
				$urlImagen="../../public/assets/img/fotos_aprendices/".$_FILES['imagen']['name'];
				move_uploaded_file($imagen,$urlImagen);
			}
			else
			{
				$urlImagen="";
			}
			
		}
		else if($textoIA==$imagen)
		{
			$urlImagen="../../public/assets/img/fotos_aprendices/".$textoIA;
		}
		else
		{
			$urlV="../../public/assets/img/fotos_aprendices/".$textoIA;
			unlink($urlV);
			$urlImagen="../../public/assets/img/fotos_aprendices/".$_FILES['imagen']['name'];
		    $imagen=$_FILES["imagen"]["tmp_name"];
			move_uploaded_file($imagen,$urlImagen);
		}
		
		
		$datos=
		[
			'id_aprendiz' => $id_aprendiz,
			'tipo_documento' => $tipo_documento,
			'numero_documento' => $numero_docuemnto,
			'nombres' => $nombres,
			'apellidos' => $apellidos,
			'direccion' => $direccion,
			'telefono' => $telefono,
			'correo' => $correo,
			'ficha' => $ficha,
			'estado'=> $estado,
			'programa' => $programa,
			'contraseña' => $contraseña,
			'sede' => $sede,
			'imagen' => $urlImagen
			
	   ];
	   $respuesta = new AprendizControlador();
	   $respuesta =$respuesta -> ActualizarAprendiz($datos);
	   if($respuesta):
		 echo 1;
	   else:
		 echo 2;
	   endif;
	}
	else if($_POST["opcion"]=="EliminarAprendiz")
	{
		$id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
    	$respuesta = new AprendizControlador();
   		$respuesta =$respuesta -> EliminarAprendiz($id_aprendiz);
   		if($respuesta):
	 		echo 1;
   		else:
	 		echo 2;
   		endif;
	}
	else if ($_POST["opcion"] == "ConsultaAprendiz")
    {
        $idSesionAp = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;

        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ConsultaAprendiz($idSesionAp);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    else if($_POST["opcion"] == "ValidaAsistenciaAprendices")
    {
        $idSesionAp = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : null;
        $boton;
        
        $datos = [
            'idSesionAp' => $idSesionAp,
            'fecha' => $fecha
            
        ];
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ValidaAsistenciaAprendices($datos);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        
    }
    else if($_POST["opcion"] == "RegistrarIngreso")
    {
       $idSesionAp = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;
        $idFicha = (isset($_POST['idFicha'])) ? $_POST['idFicha'] : null;
        $idPrograma = (isset($_POST['idPrograma'])) ? $_POST['idPrograma'] : null;
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : null;
        $hora = (isset($_POST['hora'])) ? $_POST['hora'] : null;
        /*$latitud = (isset($_POST['latitudes'])) ? $_POST['latitudes'] : null;
        $longitud = (isset($_POST['longitudes'])) ? $_POST['longitudes'] : null;*/
        $datos = [
            'idSesionAp' => $idSesionAp,
            'idFicha' => $idFicha,
            'idPrograma' => $idPrograma,
            'fecha' => $fecha,
            'hora' => $hora,
            /*'latitud' => $latitud,
            'longitud' => $longitud*/
        ];
        
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> RegistrarIngreso($datos);
        
        if($respuesta):
            echo 1;
        else: 
            echo 2;
        endif;
    }
    else if($_POST['opcion'] == "EstadoAsistencia")
    {
        $id = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;

        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> EstadoAsistencia($id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    else if($_POST['opcion'] == "Redecicion")
    {
        $id = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;
        
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> Redecicion($id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    else if($_POST['opcion'] == "RegistrarReingreso")
    {
        $id = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;
        $idFicha = (isset($_POST['idFicha'])) ? $_POST['idFicha'] : null;
        $idPrograma = (isset($_POST['idPrograma'])) ? $_POST['idPrograma'] : null;
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : null;
        $hora = (isset($_POST['hora'])) ? $_POST['hora'] : null;
        
        $datos = [
            'id' => $id,
            'idFicha' => $idFicha,
            'idPrograma' => $idPrograma,
            'fecha' => $fecha,
            'hora' => $hora
        ];
        
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> RegistrarReingreso($datos);
        if($respuesta):
            echo 1;
        else:
            echo 2;
        endif;
    }
    else if($_POST["opcion"] == "RegistrarSalida")
    {
        $id = (isset($_POST['idSesionAp'])) ? $_POST['idSesionAp'] : null;
        $idFicha = (isset($_POST['idFicha'])) ? $_POST['idFicha'] : null;
        $idPrograma = (isset($_POST['idPrograma'])) ? $_POST['idPrograma'] : null;
        $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : null;
        $hora = (isset($_POST['hora'])) ? $_POST['hora'] : null;
        
        $datos = [
            'id' => $id,
            'idFicha' => $idFicha,
            'idPrograma' => $idPrograma,
            'fecha' => $fecha,
            'hora' => $hora
        ];
        
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> RegistrarSalida($datos);
        
        if($respuesta):
            echo 1;
        else: 
            echo 2;
        endif;
    }
	else if($_POST["opcion"] == "CosnultarVehiculoAprendiz")
    {
        $idA = (isset($_POST['idA'])) ? $_POST['idA'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ConsultarVehiculoAprendiz($idA);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
      
    }
	else if($_POST["opcion"] == "GuardarVehiculoAprendiz")
    {
        $idA = (isset($_POST['idA'])) ? $_POST['idA'] : null;
		$placa = (isset($_POST['placa'])) ? $_POST['placa'] : null;
		$tipo_vehiculo = (isset($_POST['tipo_vehiculo'])) ? $_POST['tipo_vehiculo'] : null;
		
		$datos = [
            'id_aprendiz' => $idA,
            'tipo_vehiculo' => $placa,
            'placa' => $tipo_vehiculo
        ];

        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> GuardarVehiculoAprendiz($datos);

		if($respuesta):
            echo 1;
        else: 
            echo 2;
        endif;
    }
	else if($_POST["opcion"] == "EliminarVehiculoAprendiz")
    {
        $idv = (isset($_POST['idv'])) ? $_POST['idv'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> EliminarVehiculoAprendiz($idv);
		
		if($respuesta):
            echo 1;
        else: 
            echo 2;
        endif;
      
    }
	else if($_POST["opcion"] == "GuardarDocumentosCertificacion")
    {
		$id_aprendiz= (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
		$documento_identidadPDF=$_FILES['documento_identidad']['type'];
		$bitacoraPDF=$_FILES['bitacora']['type'];
		$constanciaPDF=$_FILES['constancia_practicas']['type'];
		$carnetPDF=$_FILES['carnet']['type'];
		if($documento_identidadPDF=="application/pdf" && $bitacoraPDF=="application/pdf" && $constanciaPDF=="application/pdf"  && $carnetPDF=="application/pdf" )
		{
			$carnet =$_FILES["carnet"]["tmp_name"];
			$documento_identidad =$_FILES["documento_identidad"]["tmp_name"];
			$bitacora =$_FILES["bitacora"]["tmp_name"];
			$constancia_practicas =$_FILES["constancia_practicas"]["tmp_name"];

			$urlCarnet="../../public/assets/CERTIFICACION/".$_FILES['carnet']['name'];
			$urlDI="../../public/assets/CERTIFICACION/".$_FILES['documento_identidad']['name'];
			$urlBitacora="../../public/assets/CERTIFICACION/".$_FILES['bitacora']['name'];
			$urlConstanciaP="../../public/assets/CERTIFICACION/".$_FILES['constancia_practicas']['name'];

			move_uploaded_file($carnet, $urlCarnet);
			move_uploaded_file($documento_identidad,$urlDI);
			move_uploaded_file($bitacora, $urlBitacora);
			move_uploaded_file($constancia_practicas,$urlConstanciaP);
			$datos=[
				"id_aprendiz"=>$id_aprendiz,
				"documento_identidad"=>$urlDI,
				"bitacora"=>$urlBitacora,
				"constancia_practicas"=>$urlConstanciaP,
				"carnet"=>$urlCarnet
			];
			
			$respuesta = new AprendizControlador();
			$respuesta = $respuesta -> GuardarDocumentosCertificacion($datos);
			if($respuesta):
				echo 1;
			else: 
				echo 2;
			endif;
		}
		else
		{
			echo 2;
		}
    }	
    else if($_POST["opcion"] == "ContadorInasistencia")
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ContadorInasistencia($id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    else if($_POST["opcion"] == "ContadorExcusa")
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ContadorExcusa($id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    else if($_POST["opcion"] == "ContadorCasosA")
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ContadorCasosA($id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    else if($_POST["opcion"] == "ContadorCasosC")
    {
        $id = (isset($_POST['id'])) ? $_POST['id'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ContadorCasosC($id);
        
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
	else if($_POST["opcion"] == "ConsultarDocumentacionAprendiz")
    {
        $id = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
        $respuesta = new AprendizControlador();
        $respuesta = $respuesta -> ConsultarDocumentacionAprendiz($id);
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
	else if($_POST["opcion"] == "ActualizarDocumentosCertificacion")
    {
		$id_aprendiz= (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
		$filedi = (isset($_POST['filedi'])) ? $_POST['filedi'] : null;
		$filebitacora = (isset($_POST['filebitacora'])) ? $_POST['filebitacora'] : null;
		$fileconstancia = (isset($_POST['fileconstancia'])) ? $_POST['fileconstancia'] : null;
		$filecarnet = (isset($_POST['filecarnet'])) ? $_POST['filecarnet'] : null;
		$documento_identidad = (isset($_POST['documento_identidad'])) ? $_POST['documento_identidad'] : null;
		$bitacora= (isset($_POST['bitacora'])) ? $_POST['bitacora'] : null;
		$constancia_practicas = (isset($_POST['constancia_practicas'])) ? $_POST['constancia_practicas'] : null;
		$carnet = (isset($_POST['carnet'])) ? $_POST['carnet'] : null;

        if($filedi==$documento_identidad)
		{
			$urlDI="../../public/assets/CERTIFICACION/".$filedi;
		}
		else
		{
			$documento_identidad =$_FILES["documento_identidad"]["tmp_name"];
			$urlDI="../../public/assets/CERTIFICACION/".$_FILES['documento_identidad']['name'];
			$urlfiledi="../../public/assets/CERTIFICACION/".$filedi;
			unlink($urlfiledi);
			move_uploaded_file($documento_identidad, $urlDI);
		}
		if($filebitacora==$bitacora)
		{
			$urlBitacora="../../public/assets/CERTIFICACION/".$filebitacora;
		}
		else
		{
			$bitacora =$_FILES["bitacora"]["tmp_name"];
			$urlBitacora="../../public/assets/CERTIFICACION/".$_FILES['bitacora']['name'];
			$urlfilebitacora="../../public/assets/CERTIFICACION/".$filebitacora;
			unlink($urlfilebitacora);
			move_uploaded_file($bitacora, $urlBitacora);
		}
		if($fileconstancia==$constancia_practicas)
		{
			$urlConstanciaP="../../public/assets/CERTIFICACION/".$fileconstancia;
		}
		else
		{
			$constancia_practicas =$_FILES["constancia_practicas"]["tmp_name"];
			$urlConstanciaP="../../public/assets/CERTIFICACION/".$_FILES['constancia_practicas']['name'];
			$urlfileconstancia="../../public/assets/CERTIFICACION/".$fileconstancia;
			unlink($urlfileconstancia);
			move_uploaded_file($constancia_practicas, $urlConstanciaP);
		}
		if($filecarnet==$carnet)
		{
			$urlCarnet="../../public/assets/CERTIFICACION/".$filecarnet;
		}
		else
		{
			$carnet =$_FILES["carnet"]["tmp_name"];
			$urlCarnet="../../public/assets/CERTIFICACION/".$_FILES['carnet']['name'];
			$urlfilecarnet="../../public/assets/CERTIFICACION/".$filecarnet;
			unlink($urlfilecarnet);
			move_uploaded_file($carnet, $urlCarnet);
		}

		$datos=[
			"id_aprendiz"=>$id_aprendiz,
			"documento_identidad"=>$urlDI,
			"bitacora"=>$urlBitacora,
			"constancia_practicas"=>$urlConstanciaP,
			"carnet"=>$urlCarnet
		];

		$respuesta = new AprendizControlador();
		$respuesta = $respuesta -> ActualizarDocumentacionAprendiz($datos);
		if($respuesta):
			echo 1;
		else: 
			echo 2;
		endif;
    }
}





   
?> 
