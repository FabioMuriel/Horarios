<main id="main" class="main">
  <br>


  <div class="card">
    <div class="card-header">
      <b style="font-size:20px;">ASISTENCIA</b>
    </div>
    <div class="card-body">

      <br>
      <div class="row">
        <div class="col-6">
          <b>FICHA:</b>
          <select class="form-select" data-size="3" name="ficha_asistencia" id="ficha_asistencia">
          </select>
        </div>

      </div>
      <br> <br>
      <div class="table-responsive">
        <table class="table" id="tablaAsistenciaAprendiz" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">HORA DE ENTRADA A LA SEDE</th>
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


  </section>
  <form action="" id="ObservacionesAsistencia">
    <div class="modal fade" id="ObserA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><B>OBSERVACION</B></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
              <label class="col-form-label"><b>OBSERVACION:</b></label>
            <br>
            <textarea class="form-control" id="obsAsistencia" name="obsAsistencia" rows="3" required></textarea>
            <input type="hidden" id="idAP" name="idAP">
            <input type="hidden" id="fila" name="fila">
          </div>

          <div class="modal-footer">
            <input type="hidden" id="IDA" name="IDA">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary ">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>