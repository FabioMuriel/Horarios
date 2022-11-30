<main id="main" class="main">

  <section class="section">


    <div class="card">
      <div class="card-header">
        <b style="font-size:20px;">REPORTES BIENESTAR</b>
      </div>
      <div class="card-body">
        <br>

        <div class="row">
          <div class="col-6">
            <b>TIPO DE CASO</b>
            <select class="form-select" data-size="3" name="Tcaso" id="Tcaso">
              <option value="null">---SELECCIONE---</option>
              <option value="FIDELIZACION">FIDELIZACION</option>
              <option value="DISCIPLINARIO">DISCIPLINARIO</option>
            </select>
          </div>
          <div class="col-6">
            <b>PERIODO</b>
            <select class="form-select" data-size="3" name="periodoC" id="periodoC">
              <option value="null">---SELECCIONE---</option>
              <option value="1">HOY</option>
              <option value="2">ENTRE FECHAS</option>
            </select>
          </div>

        </div>

        <div class="row">
          <div class="col-6" style="display: none" id="fiC">
            <b>FECHA INICIAL</b>
            <input type="date" name="FechaIncialC" id="FechaInicialC" class="form-control">
          </div>
          <div class="col-6" style="display: none" id="ffC">
            <b>FECHA FINAL</b>
            <input type="date" name="FechaFinalC" id="FechaFinalC" class="form-control">
          </div>
        </div>
        
        <div class="row">
          <div class="col-4">
            <i class="bx bxs-file-pdf" style="font-size:55px;" id="pdfC"></i>
            <i class="ri-file-search-line" style="font-size:49px;" id="buscarC"></i>
          </div>
          <div class="col-4">
            <label id="Total_ReporteC"></label>
          </div>
        </div>


      </div>
    </div>


    <div class="card">

      <div class="card-body">

        <br>
        <div class="row">

          <div class="table-responsive">
            <table class="table" id="tablaReportesBienestar" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">FECHA&nbsp;&nbsp;</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">PROGRAMA</th>
                  <th scope="col">FICHA</th>
                  <th scope="col">ESTADO DEL CASO</th>
                  <th scope="col">MOTIVO DEL CASO</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>

        </div>

      </div>
    </div>


  </section>
</main><!-- End #main -->