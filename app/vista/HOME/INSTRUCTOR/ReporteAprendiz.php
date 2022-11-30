<main id="main" class="main">
  <br>


  <div class="card">
    <div class="card-header">
      <b style="font-size:20px;">REPORTES</b>
    </div>
    <div class="card-body">

      <br>
      <div class="row">
        <div class="col-6">
          <b>FICHA:</b>
          <select class="form-select" data-size="3" name="ficha_asistenciaR" id="ficha_asistenciaR">
          </select>
        </div>

      </div>
      <br> <br>
      <div class="table-responsive">
        <table class="table" id="tablaReporteAprendiz" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">ACCION</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

    </div>
  </div>

  <form action="" id="EnviarReporteComportamiento">
  <div class="modal fade" id="ReporteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><B>Reporte Aprendiz</B></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <label class="col-form-label"><b>TIPO DE REPORTE:</b></label>
            <select name="tipo_reporte" id="tipo_reporte" class="form-select">
              <option value="null">---SELECCIONE---</option>
              <option value="Reporte Disiplinario">REPORTE DISIPLINARIO</option>
              <option value="Reporte Academico">REPORTE ACADEMICO</option>
            </select>
            <br>
          <label class="col-form-label"><b>OBSERVACION:</b></label>
          <textarea class="form-control" id="obsComportamiento" name="obsComportamiento" rows="3" required></textarea>
        </div>
            
        <div class="modal-footer">
          <input type="hidden" id="IDA" name="IDA">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary " id="EnviarABienestar">Enviar</button>
        </div>
      </div>
    </div>
  </div>
  </form>


</main>