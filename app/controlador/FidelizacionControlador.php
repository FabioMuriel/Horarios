<?php
// llamamos al modelo 
require_once "../modelo/FidelizacionModelo.php";

// creamos la clase del controlador de fidelizacion
class FidelizacionControlador
{
	//  metodo para listar los aprendices
	public function ListarFidelizacion($id_bienestar)
    {
		    //llamamos al metodo que esta en el modelo y el cual nos va a traer los datos de los aprendices en un array
	  		$respuesta = FidelizacionModelo::ListarFidelizacion($id_bienestar);
            return $respuesta;
	}
	//metodo para traer los datos de un solo aprendiz 
	public function ListarFidelizacionAprendiz($numero_documento,$envio)
    {
	  		$respuesta = FidelizacionModelo::ListarFidelizacionAprendiz($numero_documento,$envio);
            return $respuesta;
	}

	public function GuardarProcesoFidelizacion($datos)
    {
	  		$respuesta = FidelizacionModelo::GuardarProcesoFidelizacion($datos);
            return $respuesta;
	}

	public function ListarObservacion($id)
    {
	  		$respuesta = FidelizacionModelo::ListarObservacion($id);
            return $respuesta;
	}

	public function GuardarObservacion($id,$descripcion)
    {
	  		$respuesta = FidelizacionModelo::GuardarObservacion($id,$descripcion);
            return $respuesta;
	}

	public function ConsultarObservacion($id)
    {
	  		$respuesta = FidelizacionModelo::ConsultarObservacion($id);
            return $respuesta;
	}

	public function ActualizarObservacion($id,$texto_observacion)
    {
	  		$respuesta = FidelizacionModelo::ActualizarObservacion($id,$texto_observacion);
            return $respuesta;
	}

	public function EliminarObservacion($id)
    {
	  		$respuesta = FidelizacionModelo::EliminarObservacion($id);
            return $respuesta;
	}

	
	public function GuardarInasistenciaAprendices($id_aprendiz,$id_instructor,$id_ficha)
    {
	  		$respuesta = FidelizacionModelo::GuardarInasistenciaAprendices($id_aprendiz,$id_instructor,$id_ficha);
            return $respuesta;
	}

	public function CerrarCaso($datos)
    {
		$respuesta = FidelizacionModelo::CerrarCaso($datos);
        return $respuesta;
	}

	public function GuardarReporteComportamiento($datos)
    {
		$respuesta = FidelizacionModelo::GuardarReporteComportamiento($datos);
        return $respuesta;
	}

	public function ListarReporteDisciplinario()
    {
		$respuesta = FidelizacionModelo::ListarReporteDisciplinario();
        return $respuesta;
	}

	public function GuardarObservacionRD($id,$descripcion)
    {
	  		$respuesta = FidelizacionModelo::GuardarObservacionRD($id,$descripcion);
            return $respuesta;
	}
	public function ListarObservacionRD($id)
    {
	  		$respuesta = FidelizacionModelo::ListarObservacionRD($id);
            return $respuesta;
	}
	public function ConsultarObservacionRD($id)
    {
	  		$respuesta = FidelizacionModelo::ConsultarObservacionRD($id);
            return $respuesta;
	}

	public function ActualizarObservacionRD($id,$texto_observacion)
    {
	  		$respuesta = FidelizacionModelo::ActualizarObservacionRD($id,$texto_observacion);
            return $respuesta;
	}

	public function EliminarObservacionRD($id)
    {
	  		$respuesta = FidelizacionModelo::EliminarObservacionRD($id);
            return $respuesta;
	}

	public function CerrarCasoRD($datos)
    {
		$respuesta = FidelizacionModelo::CerrarCasoRD($datos);
        return $respuesta;
	}

	public function ListarReporteFidelizacionHoy()
    {
		$respuesta = FidelizacionModelo::ListarReporteFidelizacionHoy();
        return $respuesta;
	}
	public function ListarReporteFidelizacionEntreFechas($fechaI, $fechaF)
    {
		$respuesta = FidelizacionModelo::ListarReporteFidelizacionEntreFechas($fechaI, $fechaF);
        return $respuesta;
	}

	public function ListarHistorialFidelizacion()
    {
		$respuesta = FidelizacionModelo::ListarHistorialFidelizacion();
        return $respuesta;
	}


	

}

//capturamos la opcion a realizar mandada desde ajax
if(isset($_POST["opcion"]))
{
	if($_POST["opcion"]=="ListarFidelizacion")
	{
		//creamos un objeto de la clase fidelizacion y llamamos al metodo ListarFidelizacion que es el que nos trae todos los datos de los aprendices
		$id_bienestar = (isset($_POST['id_Bienestar'])) ? $_POST['id_Bienestar'] : null;
		$respuesta = new FidelizacionControlador();
		$respuesta =$respuesta -> ListarFidelizacion($id_bienestar);
		//enviamos los datos en formato json al ajax 
        echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
	}
	else
	{
		if($_POST["opcion"]=="ListarFidelizacionAprendiz")
	    {
		   //capturamos el numero de documento del aprendiz enviando por ajax
		   $envio = (isset($_POST['envio'])) ? $_POST['envio'] : null;
		   $numero_documento = (isset($_POST['numero_documento'])) ? $_POST['numero_documento'] : null;
           //creamos un objeto de la clase fidelizacion y llamamos al metodo ListarFidelizacionAprendiz  que es el que nos trae  los datos de un solo aprendiz
	   	   $respuesta = new FidelizacionControlador();
		   $respuesta =$respuesta -> ListarFidelizacionAprendiz($numero_documento,$envio);
		   //enviamos los datos en formato json al ajax
           echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
		}
		else
		{
			if($_POST["opcion"]=="GuardarProcesoFidelizacion")
	    	{
			   $id_proceso = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
			   $id_bienestar = (isset($_POST['id_bienestar'])) ? $_POST['id_bienestar'] : null;
			   $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : null;
			   $datos=[
					'id_proceso'=>$id_proceso,
					'id_bienestar'=>$id_bienestar,
					'descripcion'=>$descripcion
				];
	   		   $respuesta = new FidelizacionControlador();
		   	   $respuesta =$respuesta -> GuardarProcesoFidelizacion($datos);
			   if($respuesta):
				 echo 1;
			   else:
				 echo 2;
			   endif;
			}
			else
			{
				if($_POST["opcion"]=="ListarObservacion")
	    		{
			   		$id = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
			        $respuesta = new FidelizacionControlador();
		   	   	    $respuesta =$respuesta -> ListarObservacion($id);
				    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
			    }
			   else
			   {
				 if($_POST["opcion"]=="GuardarObservacion")
	    		 {
			   		$id = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
					$descripcion = (isset($_POST['descripcion_observacion'])) ? $_POST['descripcion_observacion'] : null;
			        $respuesta = new FidelizacionControlador();
		   	   	    $respuesta =$respuesta -> GuardarObservacion($id,$descripcion);
					if($respuesta):
						echo 1;
					else:
						echo 2;
					endif;
			     }
				 else
			  	 {
					 if($_POST["opcion"]=="ConsultarObservacion")
	    		   	 {
			   			$id = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : null;
			        	$respuesta = new FidelizacionControlador();
		   	   	    	$respuesta =$respuesta -> ConsultarObservacion($id);
						echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
				     }
					 else
					 {
					     if($_POST["opcion"]=="ActualizarObservacion")
						  {
							 $id_descripcion = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : null;
							 $texto_observacion= (isset($_POST['descripcion_observacione'])) ? $_POST['descripcion_observacione'] : null;
						     $respuesta = new FidelizacionControlador();
							 $respuesta =$respuesta -> ActualizarObservacion($id_descripcion,$texto_observacion);
							 if($respuesta):
								echo 1;
							 else:
								echo 2;
							 endif;
					      } 
						  else
						  {
							  if($_POST["opcion"]=="EliminarObservacion")
							   {
								  $id_descripcion = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : null;
								  $respuesta = new FidelizacionControlador();
								  $respuesta =$respuesta -> EliminarObservacion($id_descripcion);
								  if($respuesta):
									 echo 3;
								  else:
									 echo 2;
								  endif;
							   } 
							   else
						       {
							  	 if($_POST["opcion"]=="GuardarAprendicesInasistencia")
							   	 {
								    $id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
									$id_instructor = (isset($_POST['id_instructor'])) ? $_POST['id_instructor'] : null;
									$id_ficha = (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
									$respuesta = new FidelizacionControlador();
									$respuesta =$respuesta -> GuardarInasistenciaAprendices($id_aprendiz,$id_instructor,$id_ficha);
								     if($respuesta):
									   echo 1;
								     else:
									   echo 2;
									 endif;
							     } 
								 else
								 {
									 if($_POST["opcion"]=="CerrarCaso")
									  {
									    $id_proceso = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
										$url = (isset($_POST['url'])) ? $_POST['url'] : null;
										$motivo_cierre = (isset($_POST['motivo_cierre'])) ? $_POST['motivo_cierre'] : null;
									    $datos=[
											'id_proceso'=>$id_proceso,
											'url'=>$url,
											'motivo_cierre'=>$motivo_cierre
										];
										$respuesta = new FidelizacionControlador();
										$respuesta =$respuesta -> CerrarCaso($datos);
										if($respuesta):
											echo 1;
										 else:
											echo 2;
										 endif;
								      }
									  else
									  {
										if($_POST["opcion"]=="GuardarReporteComportamiento")
										{
                                            $id_aprendiz = (isset($_POST['id_aprendiz'])) ? $_POST['id_aprendiz'] : null;
										    $id_instrcutor = (isset($_POST['id_instructor'])) ? $_POST['id_instructor'] : null;
										    $id_ficha = (isset($_POST['id_ficha'])) ? $_POST['id_ficha'] : null;
											$observacion = (isset($_POST['observacion'])) ? $_POST['observacion'] : null;
					                        $tipo_reporte = (isset($_POST['tipo_reporte'])) ? $_POST['tipo_reporte'] : null;
											$datos=[
												"id_aprendiz"=>$id_aprendiz,
												"id_instructor"=>$id_instrcutor,
												"id_ficha"=>$id_ficha,
												"tipo_reporte"=>$tipo_reporte,
												"observacion"=>$observacion,
												"tipo_reporte"=>$tipo_reporte
											];
											$respuesta = new FidelizacionControlador();
										    $respuesta =$respuesta -> GuardarReporteComportamiento($datos);
											if($respuesta):
												echo 1;
											 else:
												echo 2;
											 endif;
										}
										else
										{
										   if($_POST["opcion"]=="ListarReporteDisciplinario")
										   {  
											  $respuesta = new FidelizacionControlador();
										      $respuesta =$respuesta -> ListarReporteDisciplinario();
											  echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
										   }
										   else
										   {
											 if($_POST["opcion"]=="GuardarObservacionRD")
											 {
												  $id = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
											      $descripcion = (isset($_POST['descripcion_observacion'])) ? $_POST['descripcion_observacion'] : null;
											      $respuesta = new FidelizacionControlador();
												  $respuesta =$respuesta -> GuardarObservacionRD($id,$descripcion);
											      if($respuesta):
												    echo 1;
											      else:
												    echo 2;
											      endif;
											 }
											 else
											 {
												if($_POST["opcion"]=="ListarObservacionRD")
												{
													$id = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
													$respuesta = new FidelizacionControlador();
													$respuesta =$respuesta -> ListarObservacionRD($id);
													echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
												}
												else
												{
													if($_POST["opcion"]=="ConsultarObservacionRD")
	    		   								    {
			   											$id = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : null;
			        									$respuesta = new FidelizacionControlador();
		   	   	    									$respuesta =$respuesta -> ConsultarObservacionRD($id);
														echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
				     								}
													else
													{
														if($_POST["opcion"]=="ActualizarObservacionRD")
													    {
							 								$id_descripcion = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : null;
							 								$texto_observacion= (isset($_POST['descripcion_observacione'])) ? $_POST['descripcion_observacione'] : null;
						     								$respuesta = new FidelizacionControlador();
							 								$respuesta =$respuesta -> ActualizarObservacionRD($id_descripcion,$texto_observacion);
							 								if($respuesta):
																echo 1;
							 								else:
																echo 2;
							 								endif;
					      								}
														else
														{
															if($_POST["opcion"]=="EliminarObservacionRD")
							  								{
								  								$id_descripcion = (isset($_POST['id_descripcion'])) ? $_POST['id_descripcion'] : null;
								  								$respuesta = new FidelizacionControlador();
								  								$respuesta =$respuesta -> EliminarObservacionRD($id_descripcion);
								  								if($respuesta):
									 								echo 3;
								  								else:
									 								echo 2;
								  								endif;
							   								}
															else
															{
																if($_POST["opcion"]=="CerrarCasoRD")
									  							{
									    							$id_proceso = (isset($_POST['id_proceso'])) ? $_POST['id_proceso'] : null;
																	$url = (isset($_POST['url'])) ? $_POST['url'] : null;
																	$motivo_cierre = (isset($_POST['motivo_cierre'])) ? $_POST['motivo_cierre'] : null;
									    							$datos=[
																		'id_proceso'=>$id_proceso,
																		'url'=>$url,
																		'motivo_cierre'=>$motivo_cierre
																	];
																	$respuesta = new FidelizacionControlador();
																	$respuesta =$respuesta -> CerrarCasoRD($datos);
																	if($respuesta):
																		echo 1;
										 							else:
																		echo 2;
										 							endif;
								      							}
																else if($_POST["opcion"]=="ListarReporteFidelizacionHoy")
																{
                                                                    $respuesta = new FidelizacionControlador();
																	$respuesta =$respuesta -> ListarReporteFidelizacionHoy();
																	if($respuesta == false):
																		echo 1;
																	 else:
																		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
																	 endif;
																}
																else if($_POST["opcion"]=="ListarReporteFidelizacionEntreFechas")
																{
																	$fechaInicial = (isset($_POST['fechaI'])) ? $_POST['fechaI'] : null;
																	$fechaFinal = (isset($_POST['fechaF'])) ? $_POST['fechaF'] : null;
                                                                    $respuesta = new FidelizacionControlador();
																	$respuesta =$respuesta -> ListarReporteFidelizacionEntreFechas($fechaInicial,$fechaFinal);
																	if($respuesta == false):
																		echo 1;
																	 else:
																		echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
																	 endif;
																}
																else if($_POST["opcion"]=="ListarHistorialFidelizacion")
																{
                                                                    $respuesta = new FidelizacionControlador();
																	$respuesta =$respuesta -> ListarHistorialFidelizacion();
																    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
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
		      	 }
		      }
		    }
		}
	}

}

   
?> 
