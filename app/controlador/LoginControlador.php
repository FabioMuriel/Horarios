<?php

if(isset($_POST["opcion"]))
{
		require_once "../modelo/LoginModelo.php";
}
else
{
	//si la opcion no es mandada por ajax entra aqui
	require_once "app/modelo/LoginModelo.php";
}

class LoginControlador{
	public function IniciarSesion(){
		if(isset($_POST["usuario"])){
			if($_POST["usuario"]!= null && $_POST["password"]!=null)
			{
	    		$valor = $_POST["usuario"];
				$respuesta = ModeloUsuarios::ConsultarUsuario($valor);
				if($respuesta==false)
				{
					echo '
				    	<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                			Usuario o Contraseña Incorrecta
                		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              			</div>
					';
				}
				else
				{ 
                      $cargo= $respuesta["cargo"];
					  if($cargo=="APRENDIZ"):
						if(($respuesta["correo"] == $_POST["usuario"]) && ($respuesta["password"] == $_POST["password"])):
					        $id_aprendiz= $respuesta["id_aprendiz"];
							$id_sede= $respuesta["id_sede"];
						    $datos = 
						    [
							   'id_aprendiz' => $id_aprendiz,
							   'tipo_usuario' => $cargo,
							   'id_sede'=>$id_sede
						    ];
						    $_SESSION['sesion_active'] = $datos; 
						    echo '<script>
							    	window.location = "index";
							   </script>';
						else:
							echo '
							   	 <div class="alert alert-danger alert-dismissible fade show" role="alert">
            	    			 <i class="bi bi-exclamation-octagon me-1"></i>
               					 Usuario o Contraseña Incorrecta
                				 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              					 </div>
							   ';
						endif;
					  else:
					  	   if(($respuesta["numero_documento"] == $_POST["usuario"]) && ($respuesta["password"] == $_POST["password"])):
						      $id_persona= $respuesta["id_persona"];
							  $id_sede= $respuesta["id_sede"];
						      $datos = 
							  [
						   	 	'id_persona' => $id_persona,
							 	'tipo_usuario' => $cargo,
								'id_sede'=>$id_sede
							  ];
							  $_SESSION['sesion_active'] = $datos; 
							  echo '<script>
							   	window.location = "index";
							  </script>';
						   else:
						 	   echo '
							   	 <div class="alert alert-danger alert-dismissible fade show" role="alert">
            	    			 <i class="bi bi-exclamation-octagon me-1"></i>
               					 Usuario o Contraseña Incorrecta
                				 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              					 </div>
							   ';
						   endif;
				       endif;
			     }
			}
		}

	}

	public function ActualizarDatos($datos)
	{
		$respuesta = ModeloUsuarios::ActualizarDatos($datos);
		return $respuesta;
	}

	public function ActualizarDatosAprendiz($datos)
	{
		$respuesta = ModeloUsuarios::ActualizarDatosAprendiz($datos);
		return $respuesta;
	}
   
	public function DatosUsuario($id)
	{
		$id = $id;
	    $r = ModeloUsuarios::DatosUsuario($id);

		$datos=
	    	[
		     'nombres' => $r["nombres"],
		     'apellidos' => $r["apellidos"],
		     'direccion' => $r["direccion"],
		     'telefono' =>$r["telefono"],
		     'correo' => $r["correo"],
			 'cedula' =>$r["cedula"]
		   ];
    	
		return $datos;
	}

	public function DatosUsuarioAprendiz($id)
	{
		$id = $id;
	    $r = ModeloUsuarios::DatosUsuarioAprendiz($id);
			$datos=
	    	[
			 'tipo_documento_abreviatura' => $r["tipo_documento_abreviatura"],
		     'tipo_documento' => $r["tipo_documento"],
		     'numero_documento' => $r["numero_documento"],
		     'nombres' => $r["nombres"],
		     'apellidos' => $r["apellidos"],
		     'telefono' =>$r["telefono"],
		     'correo' => $r["correo"],
			 'direccion' =>$r["direccion"],
			 'ficha' =>$r["ficha"],
			 'programa' =>$r["programa"],
			 'id_ficha' =>$r["id_ficha"]
		   ];
    	
		return $datos;
	}

}



if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ActualizarDatosPersona")
	{
		$nombres = (isset($_POST['nombres'])) ? $_POST['nombres'] : null;
		$apellidos = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : null;
		$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
		$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
		$correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
		$id_usuario = (isset($_POST['id_usuario'])) ? $_POST['id_usuario'] : null;

		$datos=
		[
		  'nombres' => $nombres,
		  'apellidos' => $apellidos,
		  'direccion' => $direccion,
		  'telefono' => $telefono,
		  'correo' => $correo,
		  'id_usuario' => $id_usuario
		];
		
		$login = new LoginControlador();
		$login =$login -> ActualizarDatos($datos);
		
		if($login):
		    echo 1;
		else:
  			echo 2;	
		endif;
	}
	else
	{
		if($_POST["opcion"]=="ActualizarDatosAprendiz")
		{
			$direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : null;
			$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : null;
			$correo = (isset($_POST['correo'])) ? $_POST['correo'] : null;
			$id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;

			$datos=
	    	[
		     'id_aprendiz' => $id_aprendiz,
		     'direccion' => $direccion,
		     'telefono' => $telefono,
		     'correo' => $correo
		   ];
	
			$login = new LoginControlador();
			$login =$login -> ActualizarDatosAprendiz($datos);
			if($login):
			    echo 1;
			else:
  				echo 2;	
			endif;
		}
	}
}

