<main id="main" class="main">

  <section class="section">

    <form action="" id="RegistrarInvitadoPorteria">
      <div class="card">
        <div class="card-header">
          <b style="font-size:20px;">REGISTRO DE INVITADO</b>
        </div>
        <div class="card-body">
          <br>
          <div class="row">
            <div class="col-6">
              <b>NOMBRES</b>
              <input type="text" class="form-control" id="nombresInvitado" required>
            </div>
            <div class="col-6 ">
              <b>APELLIDOS</b>
              <input type="text" class="form-control" id="apellidosInvitado" required>
            </div>
          </div>
          
          <div class="row">
            <div class="col-6">
              <label id="porteriaPrograma"><b>TIPO DE DOCUMENTO</b></label>
              <select class="form-select" data-width="100%" data-size="3" name="tipoDCI" id="tipoDCI">
                <option value="null">---SELECCIONE---</option>
                <option value="1">CEDULA DE CIUDADANIA</option>
                <option value="2">TARJETA DE IDENTIDAD</option>
                <option value="3">CEDULA DE EXTRANJERIA</option>
                <option value="4">PERMISO ESPECIAL DE PERMANENCIA</option>
              </select>
            </div>
            <div class="col-6 ">
              <label id=""><b>NUMERO DE DOCUMENTO</b></label>
              <input type="text" class="form-control" id="ndInvitado" required>
            </div>
          </div>
         
          <div class="row">
            <div class="col-6">
              <b>TELEFONO:</b> <input type="number" name="telefonoInvitado" id="telefonoInvitado" class="form-control">
              <input type="hidden" id="sedeInvitado" name="sedeInvitado" value="<?php echo $id_sede; ?>">
            </div>
            
          </div>
          <br>
          <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">GUARDAR</button>
            <button type="reset" class="btn btn-secondary">LIMPIAR</button>
          </div>
        </div>
      </div>

    </form>

  </section>
</main>