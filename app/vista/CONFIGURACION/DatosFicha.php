<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">FICHAS &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroFicha">AGREGAR</button></h1>
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
              <table class="table" id="tablaFicha" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">REGIONAL</th>
                    <th scope="col">CENTRO</th>
                    <th scope="col">SEDE</th>
                    <th scope="col">PROGRAMA</th>
                    <th scope="col">CODIGO</th>
                    <th scope="col">GRUPO</th>
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

    <form action="" method="POST" id="RegistrarFicha">
      <div class="modal fade" id="ModalRegistroFicha" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR FICHA</b></h5>
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
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="regional_ficha" id="regional_ficha">
                      </select>
                      <br><br>
                    </div>

                    <div class="col-12">
                      <b>SELECCIONE UN CENTRO:</b>
                      <br>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="centro_ficha" id="centro_ficha">
                      </select>
                      <br><br>
                    </div>

                    <div class="col-12">
                      <b>SELECCIONE UNA SEDE:</b>
                      <br>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="sede_ficha" id="sede_ficha">
                      </select>
                      <br>
                    </div>
                  <?php
                  } else {
                  ?>
                    <input type="hidden" name="regional_ficha" id="regional_ficha" value="0">
                    <input type="hidden" name="centro_ficha" id="centro_ficha" value="0">
                    <input type="hidden" name="sede_ficha" id="sede_ficha" value="<?php echo $id_sede; ?>">
                  <?php
                  }
                  ?>
                  <div class="col-12">
                    <b>SELECCIONE UN PROGRAMA:</b>
                    <br>
                    <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="programa_ficha" id="programa_ficha">
                    </select>
                    <br>
                  </div>

                  <div class="col-12">
                    <b>CODIGO:</b>
                    <input type="number" name="codigo_ficha" id="codigo_ficha" class="form-control" required>
                  </div>

                  <div class="col-12">
                    <b>GRUPO:</b>
                    <input type="text" name="grupo_ficha" id="grupo_ficha" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
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


    <form action="" method="POST" id="EditarFicha">
      <div class="modal fade" id="ModalEditFicha" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR FICHA</b></h5>
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
                      <br>
                      <input type="text" name="regional_fichae" id="regional_fichae" class="form-control" disabled>
                    </div>

                    <div class="col-12">
                      <b>CENTRO:</b>
                      <br>
                      <input type="text" name="centro_fichae" id="centro_fichae" class="form-control" disabled>
                    </div>

                    <div class="col-12">
                      <b>SEDE:</b>
                      <br>
                      <input type="text" name="sede_fichae" id="sede_fichae" class="form-control" disabled>
                    </div>
                  <?php
                  }
                  ?>
                  <div class="col-12">
                    <b>PROGRAMA:</b>
                    <br>
                    <input type="text" name="programa_fichae" id="programa_fichae" class="form-control" disabled>
                  </div>

                  <div class="col-12">
                    <b>CODIGO:</b>
                    <input type="number" name="codigo_fichae" id="codigo_fichae" class="form-control" required>
                  </div>

                  <div class="col-12">
                    <b>GRUPO:</b>
                    <input type="text" name="grupo_fichae" id="grupo_fichae" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                    <input type="hidden" name="id_ficha" id="id_ficha">

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