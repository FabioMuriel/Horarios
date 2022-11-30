<?php
$id = $_SESSION["sesion_active"]["id_persona"];
$id_sede = $_SESSION["sesion_active"]["id_sede"];
$cargo = $_SESSION["sesion_active"]["tipo_usuario"];
$login = new LoginControlador();
$datos = $login->DatosUsuario($id);
?>
<div class="card">
  <div class="card-header">
    <b style="font-size:20px;">HORARIO <label id="NombreFicha"></label></b>
  </div>
  <div class="card-body">
  <input type="hidden" id="id_sedeA" name="id_sedeA" value="<?php echo $id_sede; ?>">
    <input type="hidden" id="cargoU" name="cargoU" value="<?php echo $cargo; ?>">
   
    <div class="row">
      <div class="col-6">
        <select class="selectpicker" data-width="100%" data-size="3" name="ficha_CH" id="ficha_CH" data-live-search="true">
        </select> 
        <br>
      </div>
      <div class="col-6">
        <button type="button" class="btn btn-danger btnExportarPDFFicha">IMPRIMIR</button>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table">
        <thead class="table-secondary">
          <tr>
            <th scope="col" class="CentrarTexto">HORAS</th>
            <th class="CentrarTexto"> Lunes</th>
            <th class="CentrarTexto"> Martes</th>
            <th class="CentrarTexto"> Miercoles</th>
            <th class="CentrarTexto"> Jueves</th>
            <th class="CentrarTexto"> Viernes</th>
            <th class="CentrarTexto"> Sabado</th>
          </tr>
        </thead>
        <tbody id="CargarHorarioFicha">


        </tbody>
      </table>
    </div>
  </div>
</div>