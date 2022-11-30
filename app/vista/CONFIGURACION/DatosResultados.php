<main id="main" class="main">
  <br>

  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h1 class="card-title" style="font-size:30px;">RESULTADOS&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-primary" id="agregar_competencias" type="submit" style="height: 50px;" data-bs-toggle="modal" data-bs-target="#ModalRegistroResultado">AGREGAR</button></h1>
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
              <table class="table" id="tablaResultados" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">COMPETENCIA</th>
                    <th scope="col">RESULTADO</th>
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
    <form action="" method="POST" id="RegistrarResultado">
      <div class="modal fade" id="ModalRegistroResultado" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>REGISTRAR RESULTADO</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                    <div class="col-12">
                        <b>COMPETENCIA</b>
                        <select class="form-select" data-width="100%" data-size="3" name="menuCompetencias" id="menuCompetencias">
                        </select>
                    </div>
                    <div class="col-12">
                        <b>RESULTADO</b>
                        <textarea class="form-control" name="nombre_resultado" id="nombre_resultado" rows="3"></textarea>
                        <select hidden name="codigo_resultado" id="codigo_resultado" class="form-select"></select>
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
    <form action="" method="POST" id="EditarResultados">
      <div class="modal fade" id="ModalEditarResultado" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><b>EDITAR RESULTADO</b></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="col-12">
                    <b>COMPETENCIA</b>
                    <input type="text" class="form-control" name="menuCompetenciaE" id="menuCompetenciaE">
                    </input>
                    <input type="hidden" name="id_competencia" id="id_competencia" class="form-control" >
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <b>RESULTADO</b>
                    <textarea class="form-control" name="nombre_resultadoE" id="nombre_resultadoE" rows="3" required></textarea>
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