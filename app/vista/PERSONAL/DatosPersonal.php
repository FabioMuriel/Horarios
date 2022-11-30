<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">PERSONAL &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroPersonal">AGREGAR</button></h1>
        </div>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"></h5>

          <!-- Accordion without outline borders -->
          <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  <b>ADMINISTRACIÓN</b>
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="row">
                    <br><br>
                    <?php
                    if ($cargo == "PARAMETRIZACION") {
                    ?>
                      <div class="col">
                        <div class="card" style="width: 18rem;">
                          <img src="public/assets/img/administrador.png" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">ADMINISTRADOR</h5>
                            <p class="card-text"></p>
                            <button type="button" class="btn btn-primary abrir" data-bs-toggle="modal" data-bs-target="#ModalAdmin">Ver <i class="bi bi-eye-fill"></i></button>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="col">
                      <div class="card col" style="width: 18rem;">
                        <img src="public/assets/img/instructor.png" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">INSTRUCTOR </h5>
                          <p class="card-text"></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalInstructor">Ver <i class="bi bi-eye-fill"></i></button>
                        </div>
                      </div>
                    </div>
                    <?php
                    if ($id_sede == 1) {
                    ?>
                      <div class="col">
                        <div class="card col" style="width: 18rem;">
                          <img src="public/assets/img/herramentero.png" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">HERRAMENTERO</h5>
                            <p class="card-text"></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalHerra">Ver <i class="bi bi-eye-fill"></i></button>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <?php
                    if ($id_sede == 1) {
                    ?>
                      <div class="col">
                        <div class="card col" style="width: 18rem;">
                          <img src="public/assets/img/BienestarP.png" class="card-img-top">
                          <div class="card-body">
                            <h5 class="card-title">BIENESTAR</h5>
                            <p class="card-text"></p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalBienestar">Ver <i class="bi bi-eye-fill"></i></button>
                          </div>
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                    <div class="col">
                      <div class="card col" style="width: 18rem;">
                        <img src="public/assets/img/invitados.png" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">INVITADOS</h5>
                          <p class="card-text"></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalInvitados">Ver <i class="bi bi-eye-fill"></i></button>
                        </div>
                      </div>
                    </div>

                    <div class="col">
                      <div class="card col" style="width: 18rem;">
                        <img src="public/assets/img/funcionario.png" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">FUNCIONARIOS</h5>
                          <p class="card-text"></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalFuncionario">Ver <i class="bi bi-eye-fill"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  <b>ESTUDIANTES</b>
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="row">
                    <div class="col">
                      <div class="card col" style="width: 18rem;">
                        <img src="public/assets/img/aprendiz.png" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">APRENDIZ</h5>
                          <p class="card-text"></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAprendiz">Ver <i class="bi bi-eye-fill"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="flush-headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sg" aria-expanded="false" aria-controls="sg">
                  <b>SERVICIOS GENERALES</b>
                </button>
              </h2>
              <div id="sg" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                  <div class="row">
                    <div class="col">
                      <div class="card col" style="width: 18rem;">
                        <img src="public/assets/img/sg.png" class="card-img-top">
                        <div class="card-body">
                          <h5 class="card-title">PERSONAL DE LIMPIEZA</h5>
                          <p class="card-text"></p>
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalPlimpieza">Ver <i class="bi bi-eye-fill"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div><!-- End Accordion without outline borders -->

        </div>
      </div>

    </div>
  </div>





  <!-- Modal administrador-->
  <div class="modal fade" id="ModalAdmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">ADMINISTRADOR</label> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaAdministrador" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO</th>
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

  <!-- Modal Funcionario-->
  <div class="modal fade" id="ModalFuncionario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">FUNCIONARIOS</label> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaFuncionario" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO</th>
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
  <!-- Modal Instructor-->
  <div class="modal fade" id="ModalInstructor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">INSTRUCTOR</label></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaInstructor" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>



  <!-- Modal Herramentero-->
  <div class="modal fade" id="ModalHerra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">HERRAMENTERO</label></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaHerramentero" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO</th>
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
  <!-- Modal Bienestar-->
  <div class="modal fade" id="ModalBienestar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">BIENESTAR</label></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaBienestar" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO</th>
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

  <!-- Modal Aprendiz-->
  <div class="modal fade" id="ModalAprendiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">APRENDIZ</label></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaAprendiz" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
  <div class="modal fade" id="ModalPlimpieza" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">PERSONAL DE LIMPIEZA</label></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaLimpieza" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">CEDULA</th>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!--MODAL PARA INVITADOS-->

  <div class="modal fade" id="ModalInvitados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><label style="font-size:20px; font-weight: bold;">INVITADOS</label></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table" id="tablaInvitados" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">REGIONAL</th>
                  <th scope="col">CENTRO</th>
                  <th scope="col">SEDE</th>
                  <th scope="col">NUMERO DOCUMENTO</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">TELEFONO</th>
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

  <!-- modal para editar administrador -->
  <form action="" method="POST" id="EditarAdministrador">
    <div class="modal fade" id="ModalEditAdministrador" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR ADMINISTRADOR</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>CEDULA:</b> <input type="number" name="cedulaE" id="cedulaE" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresE" id="nombresE" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosE" id="apellidosE" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>FECHA DE NAC:</b> <input type="date" name="fechaNacE" id="fechaNacE" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>DIRECCION:</b> <input type="text" name="direccionE" id="direccionE" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoE" id="telefonoE" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>CORREO:</b> <input type="text" name="correoE" id="correoE" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>CONTRASEÑA:</b> <input type="text" name="contraseñaE" id="contraseñaE" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>SEDE:</b>
                  <select class="form-select" data-width="100%" data-size="3" name="sedeE" id="sedeE">
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="id_persona" name="id_persona">
            <button type="button" class="btn btn-dark ListarVehiculoA">VEHICULO</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="ModalVehiculoA" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoA" id="tipo_vehiculoA">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaA" id="placaA">
                      <input type="hidden" class="form-control" name="id_PV" id="id_PV">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculoA">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculoA" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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

  <!-- modal para editar instrcutor -->



  <form action="" method="POST" id="EditarInstructor">
    <div class="modal fade" id="ModalEditInstructor" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">EDITAR INSTRUCTOR</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>CEDULA:</b> <input type="number" name="cedulaI" id="cedulaI" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresI" id="nombresI" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosI" id="apellidosI" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>FECHA DE NAC:</b> <input type="date" name="fechaNacI" id="fechaNacI" class="form-control">
                </div>

              </div>
              <div class="row">
                <div class="col-6">
                  <b>DIRECCION:</b> <input type="text" name="direccionI" id="direccionI" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoI" id="telefonoI" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>CORREO:</b> <input type="text" name="correoI" id="correoI" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>CONTRASEÑA:</b> <input type="text" name="contraseñaI" id="contraseñaI" class="form-control" required>
                </div>
              </div>
              <?php
              if ($id_sede == 1) {
              ?>
                <div class="row">
                  <div class="col-6">
                    <b>SEDE:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="sedeI" id="sedeI">
                    </select>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark ListarVehiculoI">VEHICULO</button>
            <input type="hidden" id="id_personaI" name="id_personaI">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalVehiculoI" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoI" id="tipo_vehiculoI">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaI" id="placaI">
                      <input type="hidden" class="form-control" name="id_PVI" id="id_PVI">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculoI">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculoI" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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

  <!-- modal para editar Funcionarios -->



  <form action="" method="POST" id="EditarFuncionario">
    <div class="modal fade" id="ModalEditFuncionario" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">EDITAR FUNCIONARIO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>CEDULA:</b> <input type="number" name="cedulaF" id="cedulaF" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresF" id="nombresF" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosF" id="apellidosF" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>FECHA DE NAC:</b> <input type="date" name="fechaNacF" id="fechaNacF" class="form-control">
                </div>

              </div>
              <div class="row">
                <div class="col-6">
                  <b>DIRECCION:</b> <input type="text" name="direccionF" id="direccionF" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoF" id="telefonoF" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>CORREO:</b> <input type="text" name="correoF" id="correoF" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>CONTRASEÑA:</b> <input type="text" name="contraseñaF" id="contraseñaF" class="form-control" required>
                </div>
              </div>
              <?php
              if ($id_sede == 1) {
              ?>
                <div class="row">
                  <div class="col-6">
                    <b>SEDE:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="sedeF" id="sedeF">
                    </select>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark ListarVehiculoI">VEHICULO</button>
            <input type="hidden" id="id_personaF" name="id_personaF">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="ModalVehiculoI" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoI" id="tipo_vehiculoI">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaI" id="placaI">
                      <input type="hidden" class="form-control" name="id_PVI" id="id_PVI">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculoI">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculoI" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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


  <!-- modal para editar herramentero -->

  <form action="" method="POST" id="EditarHerramentero">
    <div class="modal fade" id="ModalEditHerramentero" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">EDITAR HERRAMENTERO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>CEDULA:</b> <input type="number" name="cedulaH" id="cedulaH" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresH" id="nombresH" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosH" id="apellidosH" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>FECHA DE NAC:</b> <input type="date" name="fechaNacH" id="fechaNacH" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>DIRECCION:</b> <input type="text" name="direccionH" id="direccionH" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoH" id="telefonoH" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>CORREO:</b> <input type="text" name="correoH" id="correoH" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>CONTRASEÑA:</b> <input type="text" name="contraseñaH" id="contraseñaH" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>SEDE:</b>
                  <select class="form-select" data-width="100%" data-size="3" name="sedeH" id="sedeH">
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark ListarVehiculoH">VEHICULO</button>
            <input type="hidden" id="id_personaH" name="id_personaH">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="ModalVehiculoH" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoH" id="tipo_vehiculoH">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaH" id="placaH">
                      <input type="hidden" class="form-control" name="id_PVH" id="id_PVH">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculoH">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculoH" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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

  <!-- modal para editar bienestar -->
  <form action="" method="POST" id="EditarBienestar">
    <div class="modal fade" id="ModalEditBienestar" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">EDITAR BIENESTAR</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>CEDULA:</b> <input type="number" name="cedulaB" id="cedulaB" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresB" id="nombresB" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosB" id="apellidosB" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>FECHA DE NAC:</b> <input type="date" name="fechaNacB" id="fechaNacB" class="form-control">
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>DIRECCION:</b> <input type="text" name="direccionB" id="direccionB" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoB" id="telefonoB" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>CORREO:</b> <input type="text" name="correoB" id="correoB" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>CONTRASEÑA:</b> <input type="text" name="contraseñaB" id="contraseñaB" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>SEDE:</b>
                  <select class="form-select" data-width="100%" data-size="3" name="sedeB" id="sedeB">
                  </select>
                </div>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark ListarVehiculoB">VEHICULO</button>
            <input type="hidden" id="id_personaB" name="id_personaB">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="ModalVehiculoB" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoB" id="tipo_vehiculoB">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaB" id="placaB">
                      <input type="hidden" class="form-control" name="id_PVB" id="id_PVB">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculoB">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculoB" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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

  <!-- modal para editar aprendiz -->

  <form action="" method="POST" id="EditarAprendiz">
    <div class="modal fade" id="ModalEditAprendiz" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">EDITAR APRENDIZ</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>TIPO DE DOCUMENTO:</b>
                  <select name="tipo_documentoA" id="tipo_documentoA" class="form-select">
                    <option value="null">---SELECCIONE---</option>
                    <option value="1">CEDULA DE CIUDADANIA</option>
                    <option value="2">TARJETA DE IDENTIDAD</option>
                    <option value="3">CEDULA DE EXTRANJERIA</option>
                    <option value="4">PERMISO ESPECIAL DE PERMANENCIA</option>
                  </select>
                </div>
                <div class="col-6">
                  <b>NUMERO DE DOCUMENTO:</b> <input type="number" name="numero_documentoA" id="numero_documentoA" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresA" id="nombresA" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosA" id="apellidosA" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoA" id="telefonoA" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>CORREO:</b> <input type="text" name="correoA" id="correoA" class="form-control" required>
                </div>
              </div>
              <?php
              if ($id_sede == 1) {
              ?>
                <div class="row">
                  <div class="col-6">
                    <b>REGIONAL:</b>
                    <select class="form-select" data-live-search="true" data-width="100%" data-size="3" name="regional_aprendizA" id="regional_aprendizA">
                    </select>
                  </div>
                  <div class="col-6">
                    <b>CENTRO:</b>
                    <select class="form-select" data-live-search="true" data-width="100%" data-size="3" name="centro_aprendizA" id="centro_aprendizA">
                    </select>
                  </div>
                </div>
              <?php
              }
              ?>

              <div class="row">
                <div class="col-6">
                  <b>SEDE:</b>
                  <?php
                  if ($id_sede == 1) {
                  ?>
                    <select class="form-select" data-live-search="true" data-width="100%" data-size="3" name="sede_aprendizA" id="sede_aprendizA">
                    </select>
                  <?php
                  } else {
                  ?>
                    <select class="form-select" data-live-search="true" data-width="100%" data-size="3" name="sede_aprendizA" id="sede_aprendizA" disabled>
                    </select>
                  <?php
                  }
                  ?>
                </div>
                <div class="col-6">
                  <b>PROGRAMA:</b>
                  <select class="form-select" name="programaA" id="programaA">
                  </select>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <b>FICHA:</b>
                  <select class="form-select" name="fichaA" id="fichaA">
                  </select>
                </div>
                <div class="col-6">
                  <b>DIRECCION:</b> <input type="text" name="direccionA" id="direccionA" class="form-control" required>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <b>CONTRASEÑA:</b> <input type="text" name="contraseñaA" id="contraseñaA" class="form-control" required>
                </div>
                <div class="col-6">
                  <b>IMAGEN:</b>
                  <div class="file-upload" id="FileA">
                    <div class="file-select">
                      <div class="file-select-button" id="fileName">CARGAR</div>
                      <div class="file-select-name" id="fileIA">Ningun Archivo Seleccionado</div>
                      <input type="file" name="imagenA" id="imagenA">
                      <input type="hidden" name="textoIA" id="textoIA">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-6">
                  <b>ESTADO:</b> <input type="text" name="estadoA" id="estadoA" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
        
          <div class="modal-footer">
            <button type="button" class="btn btn-dark ListarVehiculoAP">VEHICULO</button>
            <input type="hidden" name="id_aprendiz" id="id_aprendiz">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="ModalVehiculoAP" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content ">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">EDITAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoAP" id="tipo_vehiculoAP">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaAP" id="placaAP">
                      <input type="hidden" class="form-control" name="id_AP" id="id_AP">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculoAP">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculoAP" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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

  <form action="" method="POST" id="RegistrarPersonal">
    <div class="modal fade" id="ModalRegistroPersonal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>REGISTRO DE PERSONAL</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- formulario si es la sede de malambo -->
          <?php
          if ($cargo == "PARAMETRIZACION" || $cargo == "ADMINISTRADOR" && $id_sede == 1) {
          ?>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-6">
                    <b>CARGO:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="cargoP" id="cargoP">
                      <option value="null">---SELECCIONE---</option>
                      <option value="1">ADMINISTRADOR</option>
                      <option value="2">HERRAMENTERO</option>
                      <option value="3">INSTRUCTOR</option>
                      <option value="4">BIENESTAR</option>
                      <option value="5">APRENDIZ</option>
                      <option value="6">PORTERIA</option>
                      <option value="7">INVITADO</option>
                      <option value="8">FUNCIONARIO</option>
                      <option value="9">SERVICIOS GENERALES</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <b>NOMBRES:</b> <input type="text" name="nombresP" id="nombresP" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <b>APELLIDOS:</b> <input type="text" name="apellidosP" id="apellidosP" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                  <div class="col-6">
                    <b>FECHA DE NAC:</b> <input type="date" name="fechaNacP" id="fechaNacP" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <b>DIRECCION:</b> <input type="text" name="direccionP" id="direccionP" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                  <div class="col-6">
                    <b>TELEFONO:</b> <input type="number" name="telefonoP" id="telefonoP" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <b>CORREO:</b> <input type="text" name="correoP" id="correoP" class="form-control" required>
                  </div>
                  <div class="col-6">
                    <b>NUMERO DE DOCUMENTO:</b> <input type="number" name="numero_documentoP" id="numero_documentoP" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <b>CONTRASEÑA:</b> <input type="text" name="contraseñaP" id="contraseñaP" class="form-control" required>
                  </div>
                  <div class="col-6">
                    <b>TIPO DE DOCUMENTO:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="tipo_dcP" id="tipo_dcP">
                      <option value="null">---SELECCIONE---</option>
                      <option value="1">CEDULA DE CIUDADANIA</option>
                      <option value="2">TARJETA DE IDENTIDAD</option>
                      <option value="3">CEDULA DE EXTRANJERIA</option>
                      <option value="4">PERMISO ESPECIAL DE PERMANENCIA</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <b>REGIONAL:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="regionalP" id="regionalP">
                    </select>
                  </div>
                  <div class="col-6">
                    <b>CENTRO:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="centroP" id="centroP">
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <b>SEDE:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="sedeP" id="sedeP">
                    </select>
                  </div>
                  <div class="col-6">
                    <b>IMAGEN:</b>
                    <div class="file-upload" id="file">
                      <div class="file-select">
                        <div class="file-select-button" id="fileName">CARGAR</div>
                        <div class="file-select-name" id="noFile">Ningun Archivo Seleccionado</div>
                        <input type="file" name="imagenP" id="imagenP">
                      </div>
                    </div>
                  </div>


                </div>

                <div class="row" id="datosAP" style="display: none">
                  <div class="col-6" id="datosAP2">
                    <b>PROGRAMA:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="programaP" id="programaP">
                    </select>
                  </div>
                  <div class="col-6">
                    <b>FICHA:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="fichaP" id="fichaP">
                    </select>
                  </div>

                </div>
                <br>
              </div>
            </div>
          <?php
          } else {
          ?>

            <!-- formulario si es otra sede -->


            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-6">
                    <b>CARGO:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="cargoP" id="cargoP">
                      <option value="null">---SELECCIONE---</option>
                      <option value="3">INSTRUCTOR</option>
                      <option value="5">APRENDIZ</option>
                      <option value="7">INVITADO</option>
                    </select>
                  </div>
                  <div class="col-6">
                    <b>NOMBRES:</b> <input type="text" name="nombresP" id="nombresP" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <b>APELLIDOS:</b> <input type="text" name="apellidosP" id="apellidosP" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                  <div class="col-6">
                    <b>FECHA DE NAC:</b> <input type="date" name="fechaNacP" id="fechaNacP" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <b>DIRECCION:</b> <input type="text" name="direccionP" id="direccionP" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                  </div>
                  <div class="col-6">
                    <b>TELEFONO:</b> <input type="number" name="telefonoP" id="telefonoP" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <b>CORREO:</b> <input type="text" name="correoP" id="correoP" class="form-control" required>
                  </div>
                  <div class="col-6">
                    <b>NUMERO DE DOCUMENTO:</b> <input type="number" name="numero_documentoP" id="numero_documentoP" class="form-control" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <b>CONTRASEÑA:</b> <input type="text" name="contraseñaP" id="contraseñaP" class="form-control" required>
                  </div>
                  <div class="col-6">
                    <b>TIPO DE DOCUMENTO:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="tipo_dcP" id="tipo_dcP">
                      <option value="null">---SELECCIONE---</option>
                      <option value="1">CEDULA DE CIUDADANIA</option>
                      <option value="2">TARJETA DE IDENTIDAD</option>
                      <option value="3">CEDULA DE EXTRANJERIA</option>
                      <option value="4">PERMISO ESPECIAL DE PERMANENCIA</option>
                    </select>
                    <input type="hidden" name="regionalP" id="regionalP" value="0">
                    <input type="hidden" name="centroP" id="centroP" value="0">
                    <input type="hidden" name="sedeP" id="sedeP" value="<?php echo $id_sede ?>">
                  </div>
                </div>

                <div class="row" id="datosAP2">
                  <div class="col-6">
                    <b>PROGRAMA:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="programaP" id="programaP">
                    </select>
                  </div>
                  <div class="col-6">
                    <b>FICHA:</b>
                    <select class="form-select" data-width="100%" data-size="3" name="fichaP" id="fichaP">
                    </select>
                  </div>
                </div>
                <br>
              </div>
            </div>
          <?php
          }
          ?>

          <div class="modal-footer">
            <button type="button" class="btn btn-dark ListarVehiculo">AGREGAR VEHICULO</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
          </div>
        </div>
      </div>
    </div>




    <div class="modal fade" id="ModalVehiculo" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="elquis-header">
            <h5 class="modal-title"><b style="color:white;">AGREGAR VEHICULO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <div class="row">
                    <div class="col-12">
                      <b>TIPO DE VEHICULO:</b>
                      <select class="form-select" data-width="100%" data-size="3" name="tipo_vehiculoP" id="tipo_vehiculoP">
                        <option value="null">---SELECCIONE---</option>
                        <option value="MOTO">MOTO</option>
                        <option value="CARRO">CARRO</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <b>PLACA:</b>
                      <input type="text" class="form-control" name="placaP" id="placaP">
                    </div>
                  </div>
                  <br>
                  <div class="text-center">
                    <button type="button" class="btn btn-primary GuardarVehiculo">AGREGAR</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaVehiculo" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">TIPO DE VEHICULO</th>
                              <th scope="col">PLACA</th>
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


  <div class="modal fade" id="ModalAccesoProgramas" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="jesus-header">
          <h5 class="modal-title"><b style="color:white;">ACCESO DE PERSONAL</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container">

            <div class="row">
              <div class="col-6">
                <b>BIENESTAR:</b>
              </div>
              <div class="col-6">
                <div class="form-check form-switch"> <input class="form-check-input" type="checkbox" id="acceso_bienestar" name="acceso_bienestar" checked> <label class="form-check-label" for="flexSwitchCheckChecked"> </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <b>HORARIO:</b>
              </div>
              <div class="col-6">
                <div class="form-check form-switch"> <input class="form-check-input" type="checkbox" id="acceso_horario" name="acceso_horario" checked> <label class="form-check-label" for="flexSwitchCheckChecked"> </div>
              </div>
            </div>

            <div class="row">
              <div class="col-6">
                <b>SIGINV:</b>
              </div>
              <div class="col-6">
                <div class="form-check form-switch"> <input class="form-check-input" type="checkbox" id="acceso_siginv" name="acceso_siginv" checked> <label class="form-check-label" for="flexSwitchCheckChecked"> </div>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" id="id_INSTRUCTOR" name="id_INSTRUCTOR">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-primary btnGuardarAcceso">GUARDAR</button>
        </div>
      </div>
    </div>
  </div>



  <form action="" method="POST" id="EditarInvitado">
    <div class="modal fade" id="ModalEditInvitado" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="jesus-header">
            <h5 class="modal-title"><b style="color: white;">EDITAR INVITADO</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-6">
                  <b>TIPO DOCUMENTO:</b>
                  <select class="form-select" data-width="100%" data-size="3" name="tipo_dcPIN" id="tipo_dcPIN">
                    <option value="null">---SELECCIONE---</option>
                    <option value="1">CEDULA DE CIUDADANIA</option>
                    <option value="2">TARJETA DE IDENTIDAD</option>
                    <option value="3">CEDULA DE EXTRANJERIA</option>
                    <option value="4">PERMISO ESPECIAL DE PERMANENCIA</option>
                  </select>
                </div>
                <div class="col-6">
                  <b>NUMERO DE DOCUMENTO:</b> <input type="number" name="numero_documentoIN" id="numero_documentoIN" class="form-control" required>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <b>NOMBRES:</b> <input type="text" name="nombresIN" id="nombresIN" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>
                <div class="col-6">
                  <b>APELLIDOS:</b> <input type="text" name="apellidosIN" id="apellidosIN" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                </div>

              </div>
              <div class="row">
                <div class="col-6">
                  <b>TELEFONO:</b> <input type="number" name="telefonoIN" id="telefonoIN" class="form-control">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" id="id_invitado" name="id_invitado">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
          </div>
        </div>
      </div>
    </div>

  </form>





</main>