<main id="main" class="main">

  <section class="section">

    <form action="" id="ConsultarIngreso">
      <div class="card">
        <div class="card-header">
          <b style="font-size:20px;">INGRESO</b>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 form-group input-material">
              <b>IDENTIFICACION</b>
              <input type="text" class="form-control" id="identificacion" required>
            </div>
            <div class="col-6">
              <br>
              <img   id="imagenPorteria" src="public/assets/img/porteria.png" alt="" class="img-thumbnail" style="width:250px; height:350px;">
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <b>NOMBRE</b>
              <input type="text" class="form-control" id="nombrePorteria" disabled>
            </div>
            <div class="col-6 ">
              <b>PERFIL</b>
              <input type="text" class="form-control" id="perfilPorteria" disabled>
            </div>
          </div>

          <div class="row" id="PyF">
            <div class="col-6">
              <label id="porteriaPrograma"><b>PROGRAMA</b></label>
              <input type="text" class="form-control" id="programaPorteria" disabled>
            </div>
            <div class="col-6 ">
            <label id="porteriaFicha"><b>FICHA</b></label>
              <input type="text" class="form-control" id="fichaPorteria" disabled>
            </div>
          </div>
          <br>
          <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">CONSULTAR</button>
            <button type="reset" class="btn btn-secondary">LIMPIAR</button>
          </div>
        </div>
      </div>

    </form>

  </section>
</main>