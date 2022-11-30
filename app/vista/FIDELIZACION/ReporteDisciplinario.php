<main id="main" class="main">
  <br>
  <div class="pagetitle">
    <h1>REPORTE DISCIPLINARIO </h1>
  </div>
  
  <section class="section">
    <br>
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <br>
            <div class="table-responsive">
              <table class="table" id="tablaReporteDisciplinario" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">N° DOCUMENTO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">TELEFONO</th>
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

    <!-- modal para ver los datos de los aprendices -->
    <div class="modal fade" id="ModalDatosAprendiz" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>DATOS APRENDIZ</b></h5>
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

              <div class="row">
                <div class="col-6">
                  <label><b>MOTIVO DE REPORTE:</b></label>
                </div>
                <div class="col-6">
                  <label id="motivo_reporte"></label>
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

    


    <form action="" id="ListarObservacionRD">
      <div class="modal fade" id="ModalListarObservacionRD" tabindex="-1">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b> LISTADO DE OBSERVACIONES - <label id="aprendiz_titulo"></label></b></h5>
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
            <div class="modal-header">
              <h5 class="modal-title"><b> CERRAR CASO <label id="numero_observacione"></label></b></h5>
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


  </section>

</main>