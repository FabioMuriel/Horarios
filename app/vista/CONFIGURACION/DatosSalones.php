<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">SALONES &nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroSalon">AGREGAR</button></h1>
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
              <table class="table" id="tablaSalones" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">REGIONAL</th>
                    <th scope="col">CENTRO</th>
                    <th scope="col">SEDE</th>
                    <th scope="col">NOMBRE DEL SALON</th>
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

    <form action="" method="POST" id="RegistrarSalon">
      <div class="modal fade" id="ModalRegistroSalon" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR SALON</b></h5>
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
                      <select class="selectpicker" data-live-search="true" data-size="3" data-width="100%" name="regional_salon" id="regional_salon">
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UN CENTRO:</b>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="centro_salon" id="centro_salon">
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SELECCIONE UNA SEDE:</b>
                      <select class="selectpicker" data-live-search="true" data-width="100%" data-size="3" name="sede_salon" id="sede_salon">
                      </select>
                    </div>
                  </div>
                  <br>
                <?php
                } else {
                ?>
                  <input type="hidden" name="regional_salon" id="regional_salon" value="0">
                  <input type="hidden" name="centro_salon" id="centro_salon" value="0">
                  <input type="hidden" name="sede_salon" id="sede_salon" value="<?php echo $id_sede; ?>">
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-12">
                    <b>NOMBRE DEL SALON</b>
                    <input type="text" name="nombre_salon" id="nombre_salon" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
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


    <form action="" method="POST" id="EditarSalon">
      <div class="modal fade" id="ModalEditSalon" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR SALON</b></h5>
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
                      <input type="text" name="regional_salonE" id="regional_salonE" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>CENTRO:</b>
                      <input type="text" name="centro_salonE" id="centro_salonE" class="form-control" disabled>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-12">
                      <b>SEDE:</b>
                      <input type="text" name="sede_salonE" id="sede_salonE" class="form-control" disabled>
                    </div>
                  </div>
                <?php
                }
                ?>
                <br>
                <div class="row">
                  <div class="col-12">
                    <b>NOMBRE DEL SALON</b>
                    <input type="text" name="nombre_salonE" id="nombre_salonE" class="form-control" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()" required>
                    <input type="hidden" name="id_salon" id="id_salon" class="form-control" >
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