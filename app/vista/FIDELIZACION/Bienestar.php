<main id="main" class="main">
  <br>
  <div class="pagetitle">
    <h1>BIENESTAR</h1>
  </div>
  
  <section class="section">
    <br>
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <br><br>
            <div class="row">
              <div class="col">
                <div class="card" style="width: 20rem;">
                    <br>
                  <img src="public/assets/img/cuidado.png" class="card-img-top">
                  <div class="card-body">
                    <h5 class="card-title">FIDELIZACION</h5>
                    <button type="button" class="btn btn-primary abrir" data-bs-toggle="modal" data-bs-target="#ModalFidelizacion">Ver <i class="bi bi-eye-fill"></i></button>
                  </div>
                </div>
              </div>
            <div class="col">
              <div class="card" style="width: 20rem;">
                  <br>
                <img src="public/assets/img/reporte.png" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">APRENDICES REPORTADOS</h5>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalReportes">Ver <i class="bi bi-eye-fill"></i></button>
                </div>
              </div>
            </div>
            <div class="col">
                <div class="card" style="width: 20rem;">
                    <br>
                <img src="public/assets/img/historial2.png" class="card-img-top" >
                <div class="card-body">
                  <h5 class="card-title">HISTORIAL DE FIDELIZACION</h5>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalHistorialCasosCerrados">Ver <i class="bi bi-eye-fill"></i></button>
                </div>
              </div>
                </div>
                <div class="col">
                </div>
                <div class="col">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
   
    
 <!--Modal historial casos cerrados-->
 <div class="modal fade" id="ModalHistorialCasosCerrados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">HISTORIAL CASOS CERRADOS</label> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaHistorialFidelizacion" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">PROGRAMA</th>
                  <th scope="col">FICHA</th>
                  <th scope="col">ESTADO</th>
                  <th scope="col">FECHA DE CREACION</th>
                  <th scope="col">FECHA DE CIERRE</th>
                  <th scope="col">MOTIVO DE CIERRE</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
 <!--Modal de fidelizacion tabla-->
 <div class="modal fade" id="ModalFidelizacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">FIDELIZACION</label> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaFidelizacion" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">DOCUMENTO</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">REMITIDO POR</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
     <!-- modal para ver los datos de los aprendice -->
   
    <form action="" id="RegistrarProcesoFidelizacion">
      <div class="modal fade" id="ModalRegistrarProcesoFidelizacion" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="jesus-header">
              <h5 class="modal-title"><b style="color: white;">REGISTRAR PROCESO</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">

                <div class="row">
                  <div class="col-6">
                    <label><b> T.DOCUMENTO:</b> &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <label id="tp_proceso"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label><b>N° DOCUMENTO</b>: &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <label id="numero_documento_proceso"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label><b>NOMBRE</b>: &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <label id="nombre_proceso"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <label><b>PROGRAMA Y FICHA:</b> &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <label id="programa_ficha_proceso"></label>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <textarea name="descripcion_proceso" id="descripcion_proceso" cols="20" rows="5" class="form-control" required></textarea>
                    <input type="hidden" name="id_proceso" id="id_proceso">
                    <input type="hidden" name="id_bienestar" id="id_bienestar" value="<?php echo $_SESSION["sesion_active"]["id_persona"]; ?>">
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">GUARDAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    <form action="" id="ListarObservacionFidelizacion">
      <div class="modal fade" id="ModalListarObservacionFidelizacion" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="jesus-header">
              <h5 class="modal-title"><b style="color:white;"> LISTADO DE OBSERVACIONES - <label id="aprendiz_titulo"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">

                <div class="card" id="LISTOBS">
                  <div class="card-body">
                    <h5 class="card-title">AGREGAR OBSERVACION</h5>

                    <div class="col-12">
                      <div class="form-floating">
                        <textarea class="form-control" id="descripcion_observacion" name="descripcion_observacion" style="height: 100px;" required></textarea>
                        <input type="hidden" id="id_proceso_observacion" name="id_proceso_observacion">
                      </div>
                    </div>
                    <br>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                      <button type="reset" class="btn btn-secondary">BORRAR</button>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <br>
                        <div class="table-responsive">
                          <table class="table" id="tablaObservacion" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">HORA</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    
      <div class="modal fade" id="ModalVerObservacionFidelizacion" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content ">
            <div class="elquis-header">
              <h5 class="modal-title"><b style="color:white;">OBSERVACION <label id="numero_observacion"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <div class="container">
               
               <label id="vista_descripcion"></label>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>

      <form action="" id="EditarObservacion">
      <div class="modal fade" id="ModalEditObservacionFidelizacion" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="elquis-header">
              <h5 class="modal-title"><b style="color:white;"> EDITAR OBSERVACION <label id="numero_observacione"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <div class="container">
               
              <textarea class="form-control" id="descripcion_observacione" name="descripcion_observacione" style="height: 100px;" required></textarea>
              <input type="hidden" id="id_descripcion" name="id_descripcion">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
     </form>

     <form action="" id="CerrarCaso">
      <div class="modal fade" id="ModalCerrarCasoFidelizacion" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="jesus-header">
              <h5 class="modal-title"><b style="color:white;"> CERRAR CASO <label id="numero_observacione"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <div class="container">

               <div class="row">
                  <div class="col-6">
                    <label><b> MOTIVO DEL CIERRE:</b> &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <select name="motivo_cierre" id="motivo_cierre" class="form-select">
                       <option value="null">---SELECCIONE---</option>
                       <option value="EXCUSA">EXCUSA</option>
                       <option value="INASISTENCIA">INASISTENCIA</option>
                    </select>
                  </div>
                </div>
                 <br>
                <div class="row">
                  <div class="col-6">
                    <label><b> URL DE LA EXCUSA:</b> &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <input type="text" name="url_excusa" id="url_excusa" class="form-control">
                    <input type="hidden" name="id_proceso_cerrar" id="id_proceso_cerrar" class="form-control"> 
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">CERRAR CASO</button>
            </div>
          </div>
        </div>
      </div>
     </form>
  
  <!--Modal tabla reporte-->
  <div class="modal fade" id="ModalReportes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">REPORTES</label> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaReporteDisciplinario" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">DOCUMENTO</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO</th>
                  <th scope="col">TIPO DE REPORTE</th>
                   <th scope="col">MOTIVO DEL REPORTE</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
    <!-- modal para ver los datos de los aprendices -->

    <form action="" id="ListarObservacionRD">
      <div class="modal fade" id="ModalListarObservacionRD" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="jesus-header">
              <h5 class="modal-title"><b style="color:white;"> LISTADO DE OBSERVACIONES - <label id="aprendiz_tituloRD"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">AGREGAR OBSERVACION</h5>

                    <div class="col-12">
                      <div class="form-floating">
                        <textarea class="form-control" id="descripcion_observacion" name="descripcion_observacion" style="height: 100px;" required></textarea>
                        <input type="hidden" id="id_proceso_observacionRD" name="id_proceso_observacionRD">
                      </div>
                    </div>
                    <br>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">GUARDAR</button>
                      <button type="reset" class="btn btn-secondary">BORRAR</button>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <br>
                        <div class="table-responsive">
                          <table class="table" id="tablaObservacionRD" style="width:100%">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">HORA</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>


    
      <div class="modal fade" id="ModalVerObservacionRD" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content ">
            <div class="elquis-header">
              <h5 class="modal-title"><b style="color:white;">OBSERVACION <label id="numero_observacion"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <div class="container">
               
               <label id="vista_descripcion"></label>
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>

      <form action="" id="EditarObservacionRD">
      <div class="modal fade" id="ModalEditObservacionRD" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="elquis-header">
              <h5 class="modal-title"><b style="color:white;"> EDITAR OBSERVACION <label id="numero_observacione"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <div class="container">
               
              <textarea class="form-control" id="descripcion_observacione" name="descripcion_observacione" style="height: 100px;" required></textarea>
              <input type="hidden" id="id_descripcion" name="id_descripcion">
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
     </form>

     <form action="" id="CerrarCasoRD">
      <div class="modal fade" id="ModalCerrarCasoRD" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="jesus-header">
              <h5 class="modal-title"><b style="color:white;"> CERRAR CASO <label id="numero_observacione"></label></b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <div class="container">

               <div class="row">
                  <div class="col-6">
                    <label><b> MOTIVO DEL CIERRE:</b> &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <select name="motivo_cierre" id="motivo_cierreRD" class="form-select">
                       <option value="null">---SELECCIONE---</option>
                       <option value="COMITE">COMITE</option>
                       <option value="ACTA DE COMPROMISO">ACTA DE COMPROMISO</option>
                       <option value="PLAN DE MEJORAMIENTO">PLAN DE MEJORAMIENTO</option>
                    </select>
                  </div>
                </div>
                 <br>
                <div class="row">
                  <div class="col-6">
                    <label><b> URL DE LA EXCUSA:</b> &nbsp;&nbsp;</label>
                  </div>
                  <div class="col-6">
                    <input type="text" name="url_excusa" id="url_excusa" class="form-control">
                    <input type="hidden" name="id_proceso_cerrar" id="id_proceso_cerrar" class="form-control"> 
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">CERRAR CASO</button>
            </div>
          </div>
        </div>
      </div>
     </form>

     <div class="modal fade" id="ModalDatosAprendiz" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">DATOS APRENDIZ</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">

              <div class="row">
                <div class="col-6">
                  <label><b>TIPO DE DOCUMENTO :</b></label>
                </div>
                <div class="col-6">
                  <label id="tipo_documento_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>Nº DOCUMENTO :</b></label>
                </div>
                <div class="col-6">
                  <label id="numero_documento_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>NOMBRES :</b></label>
                </div>
                <div class="col-6">
                  <label id="nombres_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>APELLIDOS :</b></label>
                </div>
                <div class="col-6">
                  <label id="apellidos_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>DIRECCION :</b></label>
                </div>
                <div class="col-6">
                  <label id="direccion_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>TELEFONO :</b></label>
                </div>
                <div class="col-6">
                  <label id="telefono_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>CORREO :</b></label>
                </div>
                <div class="col-6">
                  <label id="correo_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>PROGRAMA :</b></label>
                </div>
                <div class="col-6">
                  <label id="programa_fidelizacion"></label>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <label><b>FICHA :</b></label>
                </div>
                <div class="col-6">
                  <label id="ficha_fidelizacion"></label>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
          </div>
        </div>
      </div>
    </div>

  </section>
</main>