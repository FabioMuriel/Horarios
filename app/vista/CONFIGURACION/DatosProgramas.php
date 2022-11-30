<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">PROGRAMAS &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroPrograma">AGREGAR</button></h1>
        </div>
      </div>
    </div>
  </div>




  <section class="section">

    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <br>
            <div class="table-responsive">
              <table class="table" id="tablaPrograma" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">REGIONAL</th>
                    <th scope="col">CENTRO</th>
                    <th scope="col">SEDE</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">NOMBRE</th>
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

    <form action="" method="POST" id="RegistrarPrograma">
      <div class="modal fade" id="ModalRegistroPrograma" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR PROGRAMA</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <?php
                  if ($id_sede == 1) {
                  ?>
                    <div class="col-12">
                      <b>SELECCIONE UNA REGIONAL:</b>
                      <br>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="regional_programa" id="regional_programa">
                      </select>
                      <br><br>
                    </div>

                    <div class="col-12">
                      <b>SELECCIONE UN CENTRO:</b>
                      <br>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="centro_programa" id="centro_programa">
                      </select>
                      <br><br>
                    </div>

                    <div class="col-12">
                      <b>SELECCIONE UNA SEDE:</b>
                      <br>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="sede_programa" id="sede_programa">
                      </select>
                      <br>
                    </div>
                  <?php
                  } else {
                  ?>
                    <input type="hidden" name="regional_programa" id="regional_programa" value="0">
                    <input type="hidden" name="centro_programa" id="centro_programa" value="0">
                    <input type="hidden" name="sede_programa" id="sede_programa" value="<?php echo $id_sede; ?>">
                  <?php
                  }
                  ?>
                  <div class="col-12">
                    <b>CODIGO:</b>
                    <input type="number" name="codigo_programa" id="codigo_programa" class="form-control" required>
                  </div>



                  <div class="col-12">
                    <b>NOMBRE:</b>
                    <input type="text" name="nombre_programa" id="nombre_programa" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
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


    <form action="" method="POST" id="EditarPrograma">
      <div class="modal fade" id="ModalEditPrograma" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR PROGRAMA</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <?php
                  if ($id_sede == 1) {
                  ?>
                    <div class="col-12">
                      <b>REGIONAL:</b>

                      <input type="text" name="regional_programae" id="regional_programae" class="form-control" disabled>
                    </div>

                    <div class="col-12">
                      <b>CENTRO:</b>

                      <input type="text" name="centro_programae" id="centro_programae" class="form-control" disabled>
                    </div>

                    <div class="col-12">
                      <b>SEDE:</b>

                      <input type="text" name="sede_programae" id="sede_programae" class="form-control" disabled>
                    </div>
                  <?php
                  }
                  ?>

                  <div class="col-12">
                    <b>CODIGO:</b>
                    <input type="number" name="codigo_programae" id="codigo_programae" class="form-control" required>
                  </div>

                  <div class="col-12">
                    <b>NOMBRE:</b>
                    <input type="text" name="nombre_programae" id="nombre_programae" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                    <input type="hidden" name="id_programa" id="id_programa">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

</main>