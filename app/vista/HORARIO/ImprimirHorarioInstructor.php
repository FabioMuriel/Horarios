<?php
$id = $_SESSION["sesion_active"]["id_persona"];
$id_sede = $_SESSION["sesion_active"]["id_sede"];
$cargo = $_SESSION["sesion_active"]["tipo_usuario"];
$login = new LoginControlador();
$datos = $login->DatosUsuario($id);
?>
<input type="hidden" id="id_sedeA" name="id_sedeA" value="<?php echo $id_sede; ?>">
<div class="card">
  <div class="card-header">
    <b style="font-size:20px;">HORARIO <label id="NombreInstructor"></label></b>
  </div>
  <div class="card-body">

    <div class="row">
      <div class="col-6">
        <select class="form-select" data-size="3" name="instructor_CH" id="instructor_CH">
        </select>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-danger btnExportarPDF">IMPRIMIR</button>
      </div>
    </div>

      <div class="table-responsive">
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