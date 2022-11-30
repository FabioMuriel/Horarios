<main id="main" class="main">

  <section class="section">
   <div class="card">
       <div class="card-header">
        <b style="font-size:20px;">OCUPACION SENA</b>
      </div>
      <br>
    <div class="card-body">
      <div class="row" style="padding-left:400px">
       <div class="col-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">INSTRUCTORES:</h5>
        <H1><label id="Total_instructores"></label></H1>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">APRENDICES:</h5>
         <H1><label id="Total_instructore"></label></H1>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">FUNCIONARIOS:</h5>
         <H1><label id="Total_instructor"></label></H1>
      </div>
    </div>
  </div>
  <div class="col-2">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">SERVICIOS GENERALES:</h5>
         <H1><label id="Total_instructo"></label></H1>
      </div>
    </div>
  </div>
</div>
       </div>
    </div>

    <div class="card">
      <div class="card-header">
        <b style="font-size:20px;">REPORTES</b>
      </div>
      <div class="card-body">
        <br>

        <div class="row">
          <div class="col-4">
            <b>PERSONAL</b>
            <select class="form-select" data-size="3" name="personaT" id="personaT">
              <option value="null">---SELECCIONE---</option>
              <option value="APRENDIZ">APRENDIZ</option>
              <option value="INSTRUCTOR">INSTRUCTOR</option>
              <option value="VIGILANCIA">VIGILANCIA</option>
              <option value="FUNCIONARIO">FUNCIONARIO</option>
              <option value="SERVICIOSG">SERVICIOS GENERALES</option>
            </select>
          </div>
          <div class="col-4">
            <b>PERIODO</b>
            <select class="form-select" data-size="3" name="periodoR" id="periodoR">
              <option value="null">---SELECCIONE---</option>
              <option value="1">HOY</option>
              <option value="2">ENTRE FECHAS</option>
            </select>
          </div>
          <div class="col-4" style="display: none" id="f_i">
            <b>FECHA INICIAL</b>
            <input type="date" name="fechaInicial" id="fechaInicial" class="form-control">
          </div>
        </div>

        <div class="row">
          <div class="col-4" style="display: none" id="f_f">
            <b>FECHA FINAL</b>
            <input type="date" name="fechaFinal" id="fechaFinal" class="form-control">
          </div>
          <div class="col-4" style="display: none" id="pr">
            <b>PROGRAMA</b>
            <select class="form-select" data-size="3" name="programaReporte" id="programaReporte">
            </select>
          </div>
          <div class="col-4" style="display: none" id="fr">
            <b>FICHA</b>
            <select class="form-select" data-size="3" name="fichaReporte" id="fichaReporte">
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-4">
            <i class="ri-file-search-line" style="font-size:49px;" id="buscarR"></i>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <label id="Total_Reporte"></label>
          </div>
        </div>

      </div>
    </div>


    <div class="card">
     
      <div class="card-body">

        <br>
        <div class="row">

          <div class="table-responsive">
            <table class="table" id="tablaReportes" style="width:100%">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">NOMBRE</th>
                  <th scope="col">FECHA</th>
                  <th scope="col">HORA DE ENTRADA</th>
                  <th scope="col">HORA DE SALIDA</th>
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