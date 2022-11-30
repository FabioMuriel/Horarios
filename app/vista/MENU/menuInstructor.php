<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="autoreporte">
        <i class="bi bi-person-check-fill"></i><span>AUTOREPORTE</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="AsistenciaAprendiz">
        <i class="bi bi-clipboard-check"></i><span>ASISTENCIA</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="ReporteAprendiz">
        <i class="bi bi-journal-check"></i><span>REPORTES</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="novedades">
        <i class="bi bi-chat-right-text"></i></i><span>NOVEDADES</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="HistorialAsistenciaAprendiz">
        <i class="ri-line-chart-fill"></i><span>HISTORIAL DE ASISTENCIA</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="SGP">
        <i class="bi bi-bag-plus"></i><span>SGP</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed" href="MiHorarioInstructor">
      <i class="bi bi-table"></i><span>MI HORARIO</span>
      </a>
    </li>
    <?php
    if ($consulta) {
      $bienestar = $consulta["bienestar"];
      $horario = $consulta["horario"];
      if ($bienestar == 1) {
        echo '
        <li class="nav-item">
      <a class="nav-link collapsed" href="bienestar">
        <i class="bx bxs-hand"></i><span>BIENESTAR</span>
      </a>
    </li>
   ';
      }
      if ($horario == 1) {
        echo '
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#horario" data-bs-toggle="collapse" href="">
          <i class="bi bi-table"></i><span>HORARIO</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="horario" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="HorarioAmbiente">
            <i class="bi bi-circle"></i><span>AMBIENTES</span>
          </a>
        </li>
        <li>
          <a href="ImprimirHorarioInstructor" target="_blank">
            <i class="bi bi-circle"></i><span>INSTRUCTORES</span>
          </a>
        </li>
        <li>
          <a href="ImprimirHorarioFichas" target="_blank">
            <i class="bi bi-circle"></i><span>FICHAS</span>
          </a>
        </li>
      </ul>
      </li>
  
              ';
      }
    }
    ?>


  </ul>

</aside>