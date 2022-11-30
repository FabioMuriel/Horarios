<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">INSTRUCTOR VS FICHA &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroInstructorVSFicha">AGREGAR</button></h1>
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
              <table class="table" id="tablaFVSI" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">REGIONAL</th>
                    <th scope="col">CENTRO</th>
                    <th scope="col">SEDE</th>
                    <th scope="col">INSTRUCTOR</th>
                    <th scope="col">FICHA</th>
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

    <form action="" method="POST" id="RegistrarIntrsuctorVSFicha">
      <div class="modal fade" id="ModalRegistroInstructorVSFicha" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR INSTRUCTOR VS FICHA</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <?php
                if ($id_sede == 1) {
                ?>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UNA REGIONAL:</b>
                      <select class="selectpicker" data-live-search="true" data-size="3" data-width="100%" name="regional_fvsi" id="regional_fvsi">
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UN CENTRO:</b>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="centro_fvsi" id="centro_fvsi">
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UNA SEDE:</b>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="sede_fvsi" id="sede_fvsi">
                      </select>
                    </div>
                  </div>
                  <br>
                <?php
                } else {
                ?>
                  <input type="hidden" name="regional_fvsi" id="regional_fvsi" value="0">
                  <input type="hidden" name="centro_fvsi" id="centro_fvsi" value="0">
                  <input type="hidden" name="sede_fvsi" id="sede_fvsi" value="<?php echo $id_sede; ?>">
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-12">
                    <b>SELECCIONE UNA FICHA:</b>
                    <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="ficha_fvsi" id="ficha_fvsi">
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <b>SELECCIONE UN INSTRUCTOR:</b>
                    <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="instructor_fvsi" id="instructor_fvsi">
                    </select>
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


    <form action="" method="POST" id="EditarFVSI">
      <div class="modal fade" id="ModalEditFVSI" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR INSTRUCTOR VS FICHA</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <?php
                if ($id_sede == 1) {
                ?>
                  <div class="row">
                    <div class="col-12">
                      <b>REGIONAL:</b>
                      <input type="text" name="regional_fvsiE" id="regional_fvsiE" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>CENTRO:</b>
                      <input type="text" name="centro_fvsiE" id="centro_fvsiE" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SEDE:</b>
                      <input type="text" name="sede_fvsiE" id="sede_fvsiE" class="form-control" disabled>
                    </div>
                  </div>
                <?php
                }
                ?>
                <br>
                <div class="row">
                  <div class="col-12">
                    <b>SELECCIONE UNA FICHA:</b>
                    <select class="form-select" data-live-search="true" data-width="100%" data-size="3" name="ficha_fvsiE" id="ficha_fvsiE">
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <b>INSTRUCTOR:</b>
                    <input type="text" name="instructor_fvsiE" id="instructor_fvsiE" class="form-control" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="id_fvsi" id="id_fvsi">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
              <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>

</main>