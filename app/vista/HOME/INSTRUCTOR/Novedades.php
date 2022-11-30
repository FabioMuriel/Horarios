<main id="main" class="main">
  <br>


  <div class="card">
    <div class="card-header">
      <b style="font-size:20px;">NOVEDADES</b>
    </div>
    <div class="card-body">

      <br>
      <div class="row">
        <div class="col-6">
          <b>FICHA:</b>
          <select class="form-select" data-size="3" name="ficha_novedades" id="ficha_novedades">
          </select>
        </div>

      </div>
      <br> <br>
      <div class="table-responsive">
        <table class="table" id="tablaNovedadesAprendiz" style="width:100%">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col" >NOMBRE</th>
              <th scope="col">ACCION</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
  </div>


  </section>
  <form action="" id="AprendizNovedades">
    <div class="modal fade" id="NoveA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><B>NOVEDADES</B></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
              <label class="col-form-label"><b>TIPO DE NOVEDAD:</b></label>
            <select name="tipo_Novedad" id="tipo_Novedad" class="form-select">
              <option value="null">---SELECCIONE---</option>
              <option value="RETIRO VOLUNTARIO">RETIRO VOLUNTARIO</option>
              <option value="DESERCION">DESERCION</option>
              <option value="TRASLADADO">TRASLADADO</option>
              <option value="APLASAMIENTO">APLAZAMIENTO</option>
            </select>
            <br>
          </div>

          <div class="modal-footer">
            <input type="hidden" name="id_AN" id="id_AN">
            <input type="hidden" name="fila_AN" id="fila_AN">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary BtnNovedadM">Enviar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</main>