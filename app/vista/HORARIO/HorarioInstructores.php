<main id="main" class="main">
  <br>


  <section class="section">

    <div class="card">
      <div class="card-header">
        <b style="font-size:20px;">HORARIO DE INSTRUCTORES</b>
      </div>
      <div class="card-body">

        <br>
        <div class="row">
          <div class="col-6">
            <select class="form-select" data-size="3" name="instructor_CH" id="instructor_CH">
            </select>
          </div>
          <div class="col-6">
            <button type="button" class="btn btn-danger btnExportarPDF" >IMPRIMIR</button>
          </div>
        </div>

        <br> <br>
        <div class="table-responsive" >
          <table class="table" id="HorarioInstructor">
            <thead class="table-secondary">
              <tr>
                <th scope="col" class="CentrarTexto">HORAS</th>
                <th scope="col" class="CentrarTexto">LUNES</th>
                <th scope="col" class="CentrarTexto">MARTES</th>
                <th scope="col" class="CentrarTexto">MIERCOLES</th>
                <th scope="col" class="CentrarTexto">JUEVES</th>
                <th scope="col" class="CentrarTexto">VIERNES</th>
                <th scope="col" class="CentrarTexto">SABADO</th>
              </tr>
            </thead>
            <tbody id="CargarHorarioInstructor">
          
            </tbody>
          </table>
        </div>
      </div>
    </div>


  </section>

</main>