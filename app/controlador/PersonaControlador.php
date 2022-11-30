<?php
if(isset($_POST["opcion"]))
{
	require_once "../modelo/PersonaModelo.php";
}
else
{
	//si la opcion no es mandada por ajax entra aqui
	require_once "app/modelo/PersonaModelo.php";
}

// creamos clase persona que va a tener todos los metodos para los datos de la tabla persona en la cual estan los datos de instructores , administrador, bienestar y parametrizacion
class PersonaControlador
{
	//metodo para traer los datos de las personas dependiendo el cargo 
	public function ListarPersona($cargo,$id_sedeA,$cargoU)
    {
	  		$respuesta = PersonaModelo::ListarPersona($cargo,$id_sedeA,$cargoU);
         return $respuesta;
	}

	public function ListarPersonaPorSede($id_sede)
    {
	  		$respuesta = PersonaModelo::ListarPersonaPorSede($id_sede);
            return $respuesta;
	}

    // metodo para guardar datos una persona
	public function GuardarPersona($datos,$vehiculo)
    {
	  	 
		 $respuesta = PersonaModelo::GuardarPersona($datos,$vehiculo);
         return $respuesta;
	}
	// metodo para consultar una persona por medio de la cedula
	public function ConsultarPersona($cedula)
    {
		 
		 $respuesta = PersonaModelo::ConsultarPersona($cedula);
		 return $respuesta;
	}
	//metodo para actualizar los datos de una persona
	public function ActualizarPersona($datos)
    {
		 
		 $respuesta = PersonaModelo::ActualizarPersona($datos);
		 return $respuesta;
	}
	// metodo para eliminar una persona
	public function EliminarPersona($id)
    {
		 
		 $respuesta = PersonaModelo::EliminarPersona($id);
		 return $respuesta;
	}

	public function ConsultarVehiculoPersona($id)
    {
		 
		 $respuesta = PersonaModelo::ConsultarVehiculoPersona($id);
		 return $respuesta;
	}

	public function GuardarVehiculoPersona($datos)
    {
		 $respuesta = PersonaModelo::GuardarVehiculoPersona($datos);
		 return $respuesta;
	}

	public function EliminarVehiculoPersona($id)
    {
		 $respuesta = PersonaModelo::EliminarVehiculoPersona($id);
		 return $respuesta;
	}

	public function GuardarAcceso($datos)
    {
		 $respuesta = PersonaModelo::GuardarAcceso($datos);
		 return $respuesta;
	}

	public function ConsultarAcceso($id)
    {
		 $respuesta = PersonaModelo::ConsultarAcceso($id);
		 return $respuesta;
	}

	public function GuardarInvitado($datos)
    {
		 $respuesta = PersonaModelo::GuardarInvitado($datos);
		 return $respuesta;
	}

	public function ListarInvitado($id_sede,$cargo)
    {
		 $respuesta = PersonaModelo::ListarInvitado($id_sede,$cargo);
		 return $respuesta;
	}
	public function ConsultarInvitado($id)
    {
		 $respuesta = PersonaModelo::ConsultarInvitado($id);
		 return $respuesta;
	}
	public function ActualizarInvitado($datos)
    {
		 $respuesta = PersonaModelo::ActualizarInvitado($datos);
		 return $respuesta;
	}
	public function EliminarInvitado($id)
    {
		 $respuesta = PersonaModelo::EliminarInvitado($id);
		 return $respuesta;
	}





}
// recibimos la opcion y validamos si existe
if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ListarPersona")
	{
		//recibimos el cargo 
		$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : null;
		$id_sedeA= (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
		$cargoU= (isset($_POST['cargoU'])) ? $_POST['cargoU'] : null;
		// creamos un objeto de la clase persona controlador
		$respuesta = new PersonaControlador();
		//llamamos al metodo listarpersona de la clase persona controlador y le pasamos de parametro el cargo
		$respuesta =$respuesta -> ListarPersona($cargo,$id_sedeA,$cargoU);
		//obtenemos el array con los datos de las personas dependiendo al cargo enviando y hacemos un json para enviarlo al ajax
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
	else
	{
		if($_POST["opcion"]=="GuardarPersona")
	    {
			// obtenenmos todos los datos para guardarlos 
			$cedula = (isset($_POST['numero_documento'])) ? $_POST['numero_documento'] : null;
			$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : null;
			$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
			$fechaNac = (isset($_POST['fechaNac'])) ? $_POST['fechaNac'] : null;
			$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
			$correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
			$cargo =(isset($_POST['cargo'])) ? $_POST['cargo'] : null;;
			$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
			$contrato = (isset($_POST['contrato'])) ? $_POST['contrato'] : null;
			$tipo_documento ="CEDULA";
    		$contraseña = (isset($_POST['contraseña'])) ? $_POST['contraseña'] : null;
			$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;
			$vehiculo = json_decode($_POST['vehiculoPersona']);

			if(isset($_FILES['imagen']))
			{
			   
			   $imagen=$_FILES["imagen"]["tmp_name"];
			   $urlImagen="../../public/assets/img/fotos_funcionarios/".$_FILES['imagen']['name'];
			   move_uploaded_file($imagen,$urlImagen);
			}
			else
			{
			   $urlImagen="";
			}
			
			// creamos un array que se llame datos y metemos todos los datos de la persona a guardar
			$datos=
			[
         		'cedula' => $cedula,
		 		'nombres' => $nombres,
		 		'apellidos' => $apellidos,
		 		'fechaNac' => $fechaNac,
		 		'telefono' => $telefono,
		 		'correo' => $correo,
		 		'cargo' => $cargo,
		 		'direccion' => $direccion,
		 		'contrato' => $contrato,
		 		'tipo_documento' => $tipo_documento,
		 		'imagen'=> $urlImagen,
		 		'password' => $contraseña,
				'sede'=>$sede
				
			];
	         // creamos un objeto de la clase persona y llamamos al metodo guardar persona
			$objeto = new PersonaControlador();
			$objeto =$objeto -> GuardarPersona($datos,$vehiculo);
			// si los datos se guardaron objeto va a ser verdadero y se va enviar un 1 al ajax sino se envia 2
       		if($objeto)
			{
          		echo 1;
			}
			else
			{
				echo 2;   
			}
		
		}
		else
	    {
			
			if($_POST["opcion"]=="ConsultarPersona")
	        {
			   // optenemos la cedula de la persona y la consultamos mediante la cedula con el metodo consultar persona  
			   $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : null;
			   $objeto = new PersonaControlador();
			   $objeto =$objeto ->ConsultarPersona($cedula);
			   // este consulta nos retorna un array que enviamos en formato json al ajax
			   echo json_encode($objeto, JSON_UNESCAPED_UNICODE);
       		}
			else
			{
				if($_POST["opcion"]=="ActualizarPersona")
	       		{
					// obtenemos todos los datos de la persona para actualizarlos 
					$cedula = (isset($_POST['cedulaE'])) ? $_POST['cedulaE'] : null;
					$nombres = (isset($_POST['nombresE'])) ? $_POST['nombresE'] : null;
					$apellidos= (isset($_POST['apellidosE'])) ? $_POST['apellidosE'] : null;
					$fechaNac = (isset($_POST['fechaNacE'])) ? $_POST['fechaNacE'] : null;
					$telefono = (isset($_POST['telefonoE'])) ? $_POST['telefonoE'] : null;
					$correo = (isset($_POST['correoE'])) ? $_POST['correoE'] : null;
					$direccion = (isset($_POST['direccionE'])) ? $_POST['direccionE'] : null;
					$contraseña = (isset($_POST['contraseñaE'])) ? $_POST['contraseñaE'] : null;
					$id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : null;
					$sede = (isset($_POST['sedee'])) ? $_POST['sedee'] : null;
					// guardamos todos los datos en el array llamado datos
					$datos=
					[
						 'cedulaE' => $cedula,
						 'nombresE' => $nombres,
						 'apellidosE' => $apellidos,
						 'fechaNacE' => $fechaNac,
						 'telefonoE' => $telefono,
						 'correoE' => $correo,
						 'direccionE' => $direccion,
						 'id_persona' => $id_persona,
						 'passwordE' => $contraseña,
						 'sedee' => $sede
					];
					// enviamos el array al metodo actualizar persona
					$objeto = new PersonaControlador();
					$objeto =$objeto -> ActualizarPersona($datos);
					// si los datos se actualizaron enviamos 1 sino enviamos 2
       				if($objeto)
					{
          				echo 1;
					}
					else
					{
						echo 2;
					}
       			}
				else 
				{
					if($_POST["opcion"]=="EliminarPersona")
					{
						// obtenemos el id para enviarlo al metodo que eliminara los datos de la persona con ese id
                        $id_persona = (isset($_POST['id_persona'])) ? $_POST['id_persona'] : null;
						$objeto = new PersonaControlador();
						$objeto =$objeto ->EliminarPersona($id_persona);
       					if($objeto)
						{
          					echo 1;
						}
						else
						{
							echo 2;
						}
					}
					else 
					{
						if($_POST["opcion"]=="ListarpersonaPorSede")
						{
	                        $id_sede = (isset($_POST['id_sede'])) ? $_POST['id_sede'] : null;
							$objeto = new PersonaControlador();
							$objeto =$objeto ->ListarPersonaPorSede($id_sede);
							echo json_encode($objeto, JSON_UNESCAPED_UNICODE);
						}
						else 
					    {
						   if($_POST["opcion"]=="ConsultarVehivculo")
						   { 
	                         $id = (isset($_POST['idp'])) ? $_POST['idp'] : null;
						     $objeto = new PersonaControlador();
						 	 $objeto =$objeto ->ConsultarvehiculoPersona($id);
							 echo json_encode($objeto, JSON_UNESCAPED_UNICODE);
						   }
						   else 
					       {
						     if($_POST["opcion"]=="GuardarVehivculoPersona")
						     { 
	                           $idp = (isset($_POST['idp'])) ? $_POST['idp'] : null;
							   $tipo_vehiculo = (isset($_POST['tipo_vehiculo'])) ? $_POST['tipo_vehiculo'] : null;
							   $placa = (isset($_POST['placa'])) ? $_POST['placa'] : null;

							   $datos=[
								"id_persona"=>$idp,
								"tipo_vehiculo"=>$tipo_vehiculo,
								"placa"=>$placa
							   ];

						       $objeto = new PersonaControlador();
						 	   $objeto =$objeto ->GuardarVehiculoPersona($datos);
								if($objeto)
								{
									  echo 1;
								}
								else
								{
									echo 2;
								}
						      }
							  else
							  {
								if($_POST["opcion"]=="EliminarVehiculoPersona")
								{ 
								  $idv = (isset($_POST['idv'])) ? $_POST['idv'] : null;
								  $objeto = new PersonaControlador();
								  $objeto =$objeto ->EliminarVehiculoPersona($idv);
								  
								  if($objeto)
								   {
										 echo 1;
								   }
								   else
								   {
									   echo 2;
								   }
								 }
								 else
								 {
									if($_POST["opcion"]=="GuardarAcceso")
									{ 
								 		  $id_instrcutor = (isset($_POST['idI'])) ? $_POST['idI'] : null;
										  $bienestar = (isset($_POST['bienestar'])) ? $_POST['bienestar'] : null;
										  $horario = (isset($_POST['horario'])) ? $_POST['horario'] : null;

										  $datos=[
											"id_instructor"=>$id_instrcutor,
											"bienestar"=>$bienestar,
											"horario"=>$horario
										  ];
										  $objeto = new PersonaControlador();
								  		  $objeto =$objeto ->GuardarAcceso($datos);
	  								      if($objeto)
								   		  {
										   echo 1;
								   		  }
								   		  else
								   		  {
									   	 	echo 2;
								   		  }	
								 	}
									else
									{
										if($_POST["opcion"]=="ConsultarAcceso")
										{ 
								 		  $id_instrcutor = (isset($_POST['idI'])) ? $_POST['idI'] : null;
										  $objeto = new PersonaControlador();
								  		  $objeto =$objeto ->ConsultarAcceso($id_instrcutor);
										  echo json_encode($objeto, JSON_UNESCAPED_UNICODE);
								     	}
										else if($_POST["opcion"]=="GuardarInvitado")
										{
											$tipo_documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : null;
											$cedula = (isset($_POST['numero_documento'])) ? $_POST['numero_documento'] : null;
											$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : null;
											$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
											$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
											$sede = (isset($_POST['sede'])) ? $_POST['sede'] : null;
								
											$datos=
											[
								         		'numero_documento' => $cedula,
		 										'nombres' => $nombres,
		 										'apellidos' => $apellidos,
		 										'telefono' => $telefono,
		 										'tipo_documento' => $tipo_documento,
												'sede'=>$sede
											];
											$objeto = new PersonaControlador();
											$objeto =$objeto -> GuardarInvitado($datos);
						       				if($objeto)
											{
          										echo 1;
											}
											else
											{
												echo 2;
											}
										}
										else if($_POST["opcion"]=="ListarInvitado")
										{
											$cargo = (isset($_POST['cargo'])) ? $_POST['cargo'] : null;
											$id_sedeA= (isset($_POST['id_sedeA'])) ? $_POST['id_sedeA'] : null;
											$objeto = new PersonaControlador();
											$objeto =$objeto -> ListarInvitado($id_sedeA,$cargo);
											echo json_encode($objeto, JSON_UNESCAPED_UNICODE);
										}
										else if($_POST["opcion"]=="ConsultarInvitado")
										{
											$id = (isset($_POST['id_invitado'])) ? $_POST['id_invitado'] : null;
											$objeto = new PersonaControlador();
											$objeto =$objeto -> ConsultarInvitado($id);
											echo json_encode($objeto, JSON_UNESCAPED_UNICODE);
										}
										else if($_POST["opcion"]=="ActualizarInvitado")
										{
											$tipo_documento = (isset($_POST['tipo_documento'])) ? $_POST['tipo_documento'] : null;
											$cedula = (isset($_POST['numero_documento'])) ? $_POST['numero_documento'] : null;
											$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : null;
											$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
											$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
											$id_invitado = (isset($_POST['id_invitado'])) ? $_POST['id_invitado'] : null;
											$datos=
											[
								         		'numero_documento' => $cedula,
		 										'nombres' => $nombres,
		 										'apellidos' => $apellidos,
		 										'telefono' => $telefono,
		 										'tipo_documento' => $tipo_documento,
												'id_invitado'=>$id_invitado
											];
											$objeto = new PersonaControlador();
											$objeto =$objeto -> ActualizarInvitado($datos);
											if($objeto)
											{
          										echo 1;
											}
											else
											{
												echo 2;
											}
										}
										else if($_POST["opcion"]=="EliminarInvitado")
										{
											$id_invitado = (isset($_POST['id_invitado'])) ? $_POST['id_invitado'] : null;
											$objeto = new PersonaControlador();
											$objeto =$objeto -> EliminarInvitado($id_invitado);
											if($objeto)
											{
          										echo 1;
											}
											else
											{
												echo 2;
											}
										}
										
									}
								 }
							  }
							 
					       }
					    }
					}
					
				}

			}

		}

	}
}





   
?> 
