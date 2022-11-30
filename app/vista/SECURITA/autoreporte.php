<main id="main" class="main">
  <div class="pagetitle">
    <h1>AUTO REPORTE CONDICIONES DE SALUD</h1>
    <br>
  </div>
  <section class="section">
    <div class="content" id="ContenedorDanger" style="display:none;" >
      <div class="container-fluid">
        <div class="alert alert-danger bg-danger row">
          <div class="col-md-8">
            <h4 style="color:white;">Bienvenido al Sistema de Autoreporte de Bioseguridad - SECURITAS</h4>
            <p style="text-align:justify; color:white;">Es importante reiterar, que todos somos responsables y debemos acatar las
              medidas de autocuidado y protecci&oacute;n adoptadas por la entidad a trav&eacute;s de
              la implementaci&oacute;n del protocolo general de bioseguridad para mitigar,
              controlar y realizar el adecuado manejo de la pandemia del coronavirus
              COVID-19.</p>
            <p class="mb-0" style="color:white;">En estos momentos tu acceso es: DENEGADO</p>
          </div>
          <div class="col-md-4 my-2">
          
              <img src="public/assets/img/restringido.png" width="70%" height="70%" alt="logo"><br>
             
           
          </div>
        </div>
      </div>
    </div>

    <div class="content" id="ContenedorSuccess"  style="display:none;" >
      <div class="container-fluid">
        <div class="alert alert-success bg-success row">
          <div class="col-md-8">
            <h4 style="color:white;">Bienvenido al Sistema de Autoreporte de Bioseguridad - SECURITAS</h4>
            <p style="text-align:justify; color:white;">Es importante reiterar, que todos somos responsables y debemos acatar las
              medidas de autocuidado y protecci&oacute;n adoptadas por la entidad a trav&eacute;s de
              la implementaci&oacute;n del protocolo general de bioseguridad para mitigar,
              controlar y realizar el adecuado manejo de la pandemia del coronavirus
              COVID-19.</p>
            <p class="mb-0" style="color:white;">En estos momentos tu acceso es: PERMITIDO</p>
          </div>
          <div class="col-md-4">

            <img src="public/assets/img/autorizado.png" width="70%" height="70%" alt="logo"><br>


          </div>
        </div>
      </div>
    </div>


    <form action="" id="EnviarAutoreporte">
      <div class="row" id="FormularioAutoreporte" style="display:none;" >
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">MARQUE SI O NO. SI PRESENTA ALGUNO DE ESTOS SÍNTOMAS, NO DEBE INGRESAR A LAS INSTALACIONES. INFORME A SU
                JEFE INMEDIATO O SUPERVISOR DE CONTRATO Y A SU MÉDICO-EPS.</h5>
              <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalTerminos">VER TERMINOS Y CONDICIONES</button>
              <br><br>

              <div class="row">
                <div class="col-12">
                  <b>¿Ha presentado resultado positivo para covid-19?</b>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="sintomas" id="si" value="1" required> &nbsp;SI
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="sintomas" id="no" value="0" required checked> &nbsp;NO
                </div>
              </div>

              <br>

              <div class="row">
                <div class="col-12">
                  <b>¿Presenta actualmente alguna de las siguientes enfermedades?:</b>
                  <br>
                  - Enfermedad Pulmonar Crónica o Grave
                  <br>
                  - Enfermedad Cardiaca Crónica o Grave
                  <br>
                  - Enfermedad Renal Crónica o Grave
                  <br>
                  - Enfermedad Hepática Crónica
                  <br>
                  - Hipertensión Arterial No Controlada
                  <br>
                  - Diabetes No Controlada
                  <br>
                  - Enfermedad Inmunosupresora
                  <br>
                  - Otra
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="enfermedad" id="SI" value="1" required> &nbsp;SI
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="enfermedad" id="NO" value="0" required checked> &nbsp;NO
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-12">
                  <b>¿Recibe tratamiento prolongado con corticosteroides y otros medicamentos que debilitan el sistema inmunitario, entre otros?</b>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="tratamiento" id="si" value="1" required> &nbsp;SI
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="tratamiento" id="no" value="0" required checked> &nbsp;NO
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-12">
                  <b>¿Has estado en contacto estrecho (cercano), sin usar elementos de protección, por más de 15 minutos con una persona con diagnóstico confirmado de COVID-19?</b>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="contacto" id="si" value="1" required> &nbsp;SI
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <input class="form-check-input" type="radio" name="contacto" id="no" value="0" required checked> &nbsp;NO
                </div>
              </div>

              <br>
              <div class="row">
                <div class="col-12">
                  <b>.¿Ha presentado alguno de estos síntomas recientemente (en los últimos 14 días)?</b>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12">
                  <div class="card">
                    <div class="card-body">
                      <br>
                      <div class="table-responsive">
                        <table class="table" id="tablaautoreporte" style="width:100%">
                          <thead>
                            <tr>
                              <th scope="col"></th>
                              <th scope="col">SI</th>
                              <th scope="col">NO</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><b>Fiebre de 38°C o más</b></td>
                              <td><input class="form-check-input" type="radio" name="fiebre" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="fiebre" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Ha presentado en los últimos 14 días fiebre?</b></td>
                              <td><input class="form-check-input" type="radio" name="fiebre14" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="fiebre14" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Presenta tos persistente?</b></td>
                              <td><input class="form-check-input" type="radio" name="tos" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="tos" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Presenta dificultad respiratoria?</b></td>
                              <td><input class="form-check-input" type="radio" name="respiracion" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="respiracion" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Tiene Fatiga/decaimiento o debilidad?</b></td>
                              <td><input class="form-check-input" type="radio" name="fatiga" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="fatiga" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Ha padecido o tiene pérdida del sentido del olfato o del gusto?</b></td>
                              <td><input class="form-check-input" type="radio" name="olfato" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="olfato" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Tiene dolores de cabeza recurrente?</b></td>
                              <td><input class="form-check-input" type="radio" name="dolor_cabeza" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="dolor_cabeza" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Presenta dolor u opresión persistente en el pecho?</b></td>
                              <td><input class="form-check-input" type="radio" name="pecho" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="pecho" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Ha presentado náuseas, vómitos, Diarrea recientemente?</b></td>
                              <td><input class="form-check-input" type="radio" name="nauseas" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="nauseas" id="no" value="0" required checked></td>
                            </tr>
                            <tr>
                              <td><b>¿Presenta dolor de garganta (odinofagia)?</b></td>
                              <td><input class="form-check-input" type="radio" name="garganta" id="si" value="1" required> </td>
                              <td><input class="form-check-input" type="radio" name="garganta" id="no" value="0" required checked></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="card-footer text-muted">
                      <input type="hidden" value="<?php echo $id; ?>" name="id_PERSONA" id="id_PERSONA">
                      <input type="hidden" value="<?php echo $cargoP; ?>" name="cargo_PERSONA" id="cargo_PERSONA">
                      <button type="submit" class="btn btn-primary">ENVIAR</button>
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </div>

        </div>
      </div>
    </form>

    <div class="modal fade" id="ModalTerminos" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title"><b>TERMINOS Y CONDICIONES</b></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"></h5>

                  <div class="row">
                    <div class="col-12">
                      <p style="text-align:justify;">1.CONSENTIMIENTO INFORMADO Y PROTECCIÓN DE DATOS. Entiendo que mi participación consiste en el diligenciamiento de un
                        cuestionario en el cual se me harán preguntas sobre mi identificación como talento humano en la entidad SENA,
                        tipo de vinculación laboral y condiciones de salud. Todas las preguntas han sido contestadas claramente y he
                        tenido el tiempo suficiente para pensar acerca de mi decisión. No tengo ninguna duda sobre mi participación en
                        este censo, por lo que estoy de acuerdo en hacer parte de él. Acepto voluntariamente. participar y se que tengo el
                        derecho de terminar mi participación en cualquier momento. Al aceptar el presente consentimiento informado no he
                        renunciado a ninguno de mis derechos legales. Reconozco que la información que yo suministre en el diligenciamiento
                        de este censo es estrictamente confidencial y no sera usada para ningún otro propósito sin mi consentimiento.
                        Adicionalmente, otorgo mi autorización para que los datos personales proveídos en el presente censo sean
                        recolectados, almacenados, usados, circulados, suprimidos y en general, sean tratados por parte de los médicos
                        del grupo de SST del SENA de conformidad con la Ley 1581 de 2012 (Ley de Protección de Datos Personales).
                        La información recolectada en este formulario será administrada por el Profesional de Medicina de Seguridad y
                        Salud en el Trabajo de la Regional a través de la cuenta de correo electrónico _seslait@sena.edu.co, por medio de
                        la cuenta el titular podrá en todo momento solicitar la actualización, rectificación y/o supresión de los datos
                        personales. Al diligenciar esta planilla y firmar, declaro que he sido informado de las acciones que debo tener
                        para mi autocuidado y el de las personas que me rodean en el trabajo, he sido informado respecto a las medidas de
                        higiene para prevenir contagios por COVID-19 y declaró que no estoy ocultando información respecto a mi
                        condición de salud actual. Me comprometo a que mientras esté dentro de las instalaciones del SENA cumpliré
                        con todas las medidas para la prevención de riesgo biológico, declaro que entiendo y acepto.. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CERRAR</button>
            </div>
          </div>
        </div>
      </div>
    </div>



  </section>
</main><!-- End #main -->