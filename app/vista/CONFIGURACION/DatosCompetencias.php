<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">COMPETENCIAS&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroCompetencia">AGREGAR</button></h1>
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
              <table class="table" id="tablaCompetencia" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">REGIONAL</th>
                    <th scope="col">CENTRO</th>
                    <th scope="col">SEDE</th>
                    <th scope="col">PROGRAMA</th>
                    <th scope="col">COMPETENCIA</th>
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

    <form action="" method="POST" id="RegistrarCompetencia">
      <div class="modal fade" id="ModalRegistroCompetencia" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR COMPETENCIA</b></h5>
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
                      <select class="selectpicker" data-live-search="true" data-size="3" data-width="100%" name="regional_competencia" id="regional_competencia">
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UN CENTRO:</b>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="centro_competencia" id="centro_competencia">
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UNA SEDE:</b>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="sede_competencia" id="sede_competencia">
                      </select>
                    </div>
                  </div>
                  <br>
                <?php
                } else {
                ?>
                  <input type="hidden" name="regional_competencia" id="regional_competencia" value="0">
                  <input type="hidden" name="centro_competencia" id="centro_competencia" value="0">
                  <input type="hidden" name="sede_competencia" id="sede_competencia" value="<?php echo $id_sede; ?>">
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-12">
                        <b>PROGRAMA:</b>
                    <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="programa_competencia" id="programa_competencia">
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <b>COMPETENCIA</b>
                    <input type="text" name="nombre_competencia" id="nombre_competencia" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
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

    <form action="" method="POST" id="EditarCompetencia">
      <div class="modal fade" id="ModalEditCompetencia" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR COMPETENCIA</b></h5>
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
                      <input type="text" name="regional_competenciaE" id="regional_competenciaE" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>CENTRO:</b>
                      <input type="text" name="centro_competenciaE" id="centro_competenciaE" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SEDE:</b>
                      <input type="text" name="sede_competenciaE" id="sede_competenciaE" class="form-control" disabled>
                    </div>
                  </div>
                <?php
                }
                ?>
                <br>
                <div class="row">
                  <div class="col-12">
                        <b>PROGRAMA:</b>
                    <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="programa_competenciaE" id="programa_competenciaE">
                    </select>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <b>COMPETENCIA</b>
                    <input type="text" name="nombre_competenciaE" id="nombre_competenciaE" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                    <input type="hidden" name="id_competencia" id="id_competencia" class="form-control" >
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