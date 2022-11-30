<main id="main" class="main">
  <br>


  <div class="card">
    <div class="card-header">
      <b style="font-size:20px;">OBSERVACIONES</b>
    </div>
    <div class="card-body">

      <br>
      <div class="row">
        <div class="col-4">
          <b>FICHA:</b>
          <select class="form-select" data-size="3" name="ficha_asistencia_historial" id="ficha_asistencia_historial">
          </select>
        </div>
        <div class="col-4">
          <b>FECHA:</b>
          <select class="form-select" data-size="3" name="fecha_historial_asistencia" id="fecha_historial_asistencia">
              <option value="null">---SELECCIONE---</option>
              <option value="HOY">HOY</option>
              <option value="ENTRE FECHAS">ENTRE FECHAS</option>
          </select>
        </div>
      </div>
        <div class="row">
       <div class="col-4" style="display: none" id="fi">
            <b>FECHA INICIAL</b>
            <input type="date" name="FechaInicial" id="FechaInicial" class="form-control">
          </div>
          <div class="col-4" style="display: none" id="ff">
            <b>FECHA FINAL</b>
            <input type="date" name="FechaFinal" id="FechaFinal" class="form-control">
          </div>
        </div>
      <div class="row">
          <div class="col-4">
            <i class="ri-file-search-line" style="font-size:49px;" id="buscarHA"></i>
          </div>
        </div>

      <br> <br>
      <div class="table-responsive">
        <table class="table" id="Historial_Asistecnia_Aprendiz" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">NOMBRE</th>
              <th scope="col">ASISTENCIA</th>
              <th scope="col">FECHA</th>
              <th scope="col">OBSERVACION</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</main>