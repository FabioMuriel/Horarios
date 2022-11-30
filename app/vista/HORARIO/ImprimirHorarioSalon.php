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
    <b style="font-size:20px;">HORARIO <label id="NombreSalon"></label></b>
  </div>
  <div class="card-body">

    <br>
    <div class="row">
      <div class="col-6">
        <select class="form-select" data-size="3" name="salon_CH" id="salon_CH">
        </select>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-danger btnExportarPDFSalon">IMPRIMIR</button>
      </div>
    </div>
    <br>
    <div class="table-responsive" id="CargarHorarioSalon">

    </div>
  </div>
</div>