$(document).ready(function () {
  var opcion;
  var fila;
  var idI = $("#id_Instructor").val();
  var FichasInstructorSelect = '<option value="null" >--SELECCIONE--</option>';
  var programaSelect='<option value="null" >--SELECCIONE--</option>';
  var AprendicesAsistencia = [];
  var AprendizReporte = [];
  var AprendizObservaciones = [];
  var AprendizNovedades =[];



  function llenarFichaPorInstructor(idI) {
    $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      datatype: "json",
      data: { opcion: "ListarFichaPorInstructor", id_instructor: idI }
    }).done(function (res) {
      var datos = JSON.parse(res);
      $.each(datos, function (i, item) {
        FichasInstructorSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha + " - " + datos[i].nombre_programa + '</option>';
      });
      $("#ficha_asistencia").html(FichasInstructorSelect);
      $("#ficha_asistenciaR").html(FichasInstructorSelect);
      $("#ficha_asistencia_historial").html(FichasInstructorSelect);
      $("#ficha_novedades").html(FichasInstructorSelect);
    });
  }

  function llenartabla(id_ficha) {
    $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      datatype: "json",
      data: { opcion: "ListarAprendizPorFichaYAsistencia", id_ficha: id_ficha }
    }).done(function (res) {
      if (res != 1) {
        var c = 0;
        var datos = JSON.parse(res);
        console.log(datos);
        let busqueda;
        let id_aprendiz;
        let nombre;
        AprendicesAsistencia = [];
        var LongitudListadoAprendiz = Object.keys(datos.aprendiz).length;
        ExisteAsistencia = datos.hasOwnProperty('asistencia_clase');
        for (var j = 0; j < LongitudListadoAprendiz; j++) {
          id_aprendiz = datos.aprendiz[j].id_aprendiz;
          nombre = datos.aprendiz[j].nombres + " " + datos.aprendiz[j].apellidos;
          if (ExisteAsistencia) {
            busqueda = datos.asistencia_clase.find(b => b.id_aprendiz === id_aprendiz);
            bhe = datos.asistencia.findIndex(b => b.id_aprendiz === id_aprendiz);
            if (bhe != -1) {
              hora_entrada = datos.asistencia[bhe].hora_entrada;
            }
            else {
              hora_entrada = "SIN REGISTRAR";
            }
            if (!busqueda) {
              let datosA = {
                "id_aprendiz": id_aprendiz,
                "nombre": nombre,
                "hora_entrada": hora_entrada
              };
              AprendicesAsistencia.push(datosA);
              c = c + 1;
            }
          }
          else {
            bhe = datos.asistencia.findIndex(b => b.id_aprendiz === id_aprendiz);
            if (bhe != -1) {
              hora_entrada = datos.asistencia[bhe].hora_entrada;
            }
            else {
              hora_entrada = "SIN REGISTRAR";
            }
            let datosA = {
              "id_aprendiz": id_aprendiz,
              "nombre": nombre,
              "hora_entrada": hora_entrada
            };
            AprendicesAsistencia.push(datosA);
            c = c + 1;
          }
        }

        var longitudAprendicesAsistencia = Object.keys(AprendicesAsistencia).length;
        if (longitudAprendicesAsistencia > 0) {
          var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false ,searching: false});
          tablaAsistenciaAprendiz.destroy();
          contadorAI = 0;
          $('#tablaAsistenciaAprendiz').DataTable({
            data: AprendicesAsistencia,
            "columns": [
              {
                data: null, render: function (data, type, row) {
                  contadorAI = contadorAI + 1;
                  return "<b>" + contadorAI + "</b>";
                }
              },
              { "data": "nombre" },
              {
                data: null, render: function (data, type, row) {
                  horaE = data.hora_entrada;
                  if (horaE == "SIN REGISTRAR") {
                    return "<b style='color:red;'>" + data.hora_entrada + "</b>";
                  }
                  else {
                    return data.hora_entrada;
                  }
                }
              },
              {
                data: null, render: function (data, type, row) {
                  return '<button type="button" class="btn btn-success  BtnManoArriba"  data-id="' + data.id_aprendiz + '"><i class="bi bi-hand-thumbs-up"></i></button>';
                }
              },
              {
                data: null, render: function (data, type, row) {
                  return ' <button type="button" class="btn btn-danger  BtnManoAbajo"  data-id="' + data.id_aprendiz + '"><i class="bi bi-hand-thumbs-down"></i>';
                }
              },
              {
                data: null, render: function (data, type, row) {
                  return '<button type="button" class="btn btn-primary BtnOBSA" data-bs-toggle="modal" data-bs-target="#ObserA" data-id="' + data.id_aprendiz + '"><i class="bi bi-eye"></i>';
                }
              },
            ]
          });
         
        }
        else {
          swal("", "Ya se ha realizado la Asistencia Para todos los aprendices el dia de Hoy", "warning");
        }
      }
      else {
        swal("", "No se encontraron registros de asistencia para esta ficha", "warning");
        var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
        tablaAsistenciaAprendiz.clear().draw();
        tablaAsistenciaAprendiz.destroy();
      }
      



    });
  }


  function llenartablaR(id_ficha) {
    $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      datatype: "json",
      data: { opcion: "ListarAprendizPorFichaYAsistencia", id_ficha: id_ficha }
    }).done(function (res) {

      if (res != 1) {
        var c = 0;
        var datos = JSON.parse(res);
        let busqueda;
        let id_aprendiz;
        let nombre;
        AprendizReporte = [];


        var LongitudListadoAprendiz = Object.keys(datos.aprendiz).length;

        for (var j = 0; j < LongitudListadoAprendiz; j++) {

          id_aprendiz = datos.aprendiz[j].id_aprendiz;
          nombre = datos.aprendiz[j].nombres + " " + datos.aprendiz[j].apellidos;


          let datosR = {
            "id_aprendiz": id_aprendiz,
            "nombre": nombre
          };
          AprendizReporte.push(datosR);
          c = c + 1;

        }

        var tablaReporteAprendiz = $('#tablaReporteAprendiz').DataTable({ retrieve: true, paging: false });
        tablaReporteAprendiz.destroy();
        contadorAR = 0;
        $('#tablaReporteAprendiz').DataTable({
          data: AprendizReporte,
          "columns": [
            {
              data: null, render: function (data, type, row) {
                contadorAR = contadorAR + 1;
                return "<b>" + contadorAR + "</b>";
              }
            },
            { "data": "nombre" },
            {
              data: null, render: function (data, type, row) {
                return '<button type="button" class="btn btn-primary BtnReporte" data-bs-toggle="modal" data-bs-target="#ReporteModal" data-id="' + data.id_aprendiz + '"><i class="bi bi-eye-fill"></i></button>';
              }
            },
          ]
        });

      }
      else {
        swal("", "No se encontraron los aprendices de esta ficha", "warning");
        var tablaReporteAprendiz = $('#tablaReporteAprendiz').DataTable({ retrieve: true, paging: false });
        tablaReporteAprendiz.clear().draw();
        tablaReporteAprendiz.destroy();
      }
    });
  }

   function llenartablaN(id_ficha){
       $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      datatype: "json",
      data: { opcion: "ListarAprendizPorFichaYAsistencia", id_ficha: id_ficha }
    }).done(function (res) {

      if (res != 1) {
        var c = 0;
        var datos = JSON.parse(res);
        let id_aprendiz;
        let nombre;
        AprendizNovedades = []; 
         var LongitudListadoAprendiz = Object.keys(datos.aprendiz).length;

        for (var j = 0; j < LongitudListadoAprendiz; j++) {

          id_aprendiz = datos.aprendiz[j].id_aprendiz;
          nombre = datos.aprendiz[j].nombres + " " + datos.aprendiz[j].apellidos;


          let datosN = {
            "id_aprendiz": id_aprendiz,
            "nombre": nombre
          };
          AprendizNovedades.push(datosN);
          c = c + 1;

        }
        var tablaNovedadesAprendiz = $('#tablaNovedadesAprendiz').DataTable({ retrieve: true, paging: false });
        tablaNovedadesAprendiz.destroy();
        contadorAN = 0;
        $('#tablaNovedadesAprendiz').DataTable({
          data: AprendizNovedades,
          "columns": [
            {
              data: null, render: function (data, type, row) {
                contadorAN = contadorAN + 1;
                return "<b>" + contadorAN + "</b>";
              }
            },
            { "data": "nombre" },
            {
              data: null, render: function (data, type, row) {
                return '<button type="button" class="btn btn-danger BtnNovedad" data-bs-toggle="modal" data-bs-target="#NoveA" data-id="' + data.id_aprendiz + '"><i class="bi bi-chat-right-text"></i></button>';
              }
              },
          ]
        });

      }
      else {
        swal("", "No se encontraron los aprendices de esta ficha", "warning");
        var tablaNovedadesAprendiz = $('#tablaNovedadesAprendiz').DataTable({ retrieve: true, paging: false });
        tablaNovedadesAprendiz.clear().draw();
        tablaNovedadesAprendiz.destroy();
      }
    });
   }


  llenarFichaPorInstructor(idI);
 


  $("#ficha_asistencia").change(function () {
    id_ficha = $(this).val();
    if (id_ficha != "null") {
      llenartabla(id_ficha);
    }
  });

  $("#ficha_asistenciaR").change(function () {
    id_ficha = $(this).val();
    if (id_ficha != "null") {
      llenartablaR(id_ficha);
    }
  });
  
  $("#ficha_novedades").change(function () {
    id_ficha = $(this).val();
    if (id_ficha != "null") {
      llenartablaN(id_ficha);
    }
  });

 $(document).on("click", ".BtnNovedadM", function () {
     Swal.fire({
      title: 'Estas Seguro de Hacerlo?',
      text: "",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'si!'
   }).then((result) => {
      if (result.isConfirmed){
          opcion ="NovedadAprendiz";
           tipo_novedad=$.trim($('#tipo_Novedad').val());
           idA = $("#id_AN").val();
           fila = $("#fila_AN").val();
          $.ajax({
          url: "app/controlador/InstructorControlador.php",
          type: 'post',
          data: { opcion: opcion, tipo_novedad : tipo_novedad, id_aprendiz: idA}
          }).done(function (data){
            if(data == 1){ 
            contadorAN = 0;
            var tablaNovedadesAprendiz = $('#tablaNovedadesAprendiz').DataTable({ retrieve: true, paging: false });
            tablaNovedadesAprendiz.row(':eq('+fila+')').remove().draw();
              $("#NoveA").modal("hide");
               Swal.fire(
                '',
                'Novedad Registrada Con Exito.',
                'success')
            }
            else
            {
              Swal.fire({
              title: 'error!',
              icon: 'error',
              showConfirmButton: false,
              timer: 1200
            })  
            }
          });
      }
  })
});

  $(document).on("click", ".BtnManoArriba", function () {
    opcion = "GuardarAsistenciaClase";
    id_instructor = $("#id_Instructor").val();
    id_ficha = $("#ficha_asistencia").val();
    asistencia_tipo = "ASISTENCIA";
    asistencia_observacion = "";
    fila = $(this);
    idA = $(this).data("id");

    $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      data: { opcion: opcion, id_instructor: id_instructor, id_aprendiz: idA, id_ficha: id_ficha, asistencia_tipo: asistencia_tipo, asistencia_observacion: asistencia_observacion }
    }).done(function (data) {

      if (data == 1) {
        var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
        contadorAI = 0;
        tablaAsistenciaAprendiz.row(fila.parents('tr')).remove().draw();

        Swal.fire({
          position: 'top-end',
          title: 'Asistencia Registrada Con Exito!',
          icon: 'success',
          showConfirmButton: false,
          timer: 1200
        })
      }
      else {
        Swal.fire({
          title: 'error!',
          icon: 'error',
          showConfirmButton: false,
          timer: 1200
        })
      }
    });
  });
  
  function EnivarABienestar(id_aprendiz) {
    id_instructor = $("#id_Instructor").val();
    id_ficha = $("#ficha_asistencia").val();

    $.ajax({
      url: "app/controlador/FidelizacionControlador.php",
      type: 'post',
      data: { opcion: "GuardarAprendicesInasistencia", id_aprendiz: id_aprendiz, id_instructor: id_instructor, id_ficha: id_ficha }

    }).done(function (res) {

      Swal.fire({
        position: 'top-end',
        title: 'Inasistencia Reportada A Bienestar',
        icon: 'success',
        showConfirmButton: false,
        timer: 1000
      })

    });
  }


  $(document).on("click", ".BtnManoAbajo", function () {
    opcion = "GuardarAsistenciaClase";
    id_instructor = $("#id_Instructor").val();
    id_ficha = $("#ficha_asistencia").val();
    asistencia_tipo = "INASISTENCIA";
    asistencia_observacion = "";
    fila = $(this);
    idA = $(this).data("id");

    $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      data: { opcion: opcion, id_instructor: id_instructor, id_aprendiz: idA, id_ficha: id_ficha, asistencia_tipo: asistencia_tipo, asistencia_observacion: asistencia_observacion }
    }).done(function (data) {

      if (data == 1) {
        var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
        contadorAI = 0;
        tablaAsistenciaAprendiz.row(fila.parents('tr')).remove().draw();
        EnivarABienestar(idA);
      }
      else {
        Swal.fire({
          title: 'error!',
          icon: 'error',
          showConfirmButton: false,
          timer: 1000
        })
      }
    });
  });



  $(document).on("click", ".BtnReporte", function () {
    idA = $(this).data("id");
    $("#IDA").val(idA);
  });

  $('#EnviarReporteComportamiento').submit(function (e) {
    e.preventDefault();
    opcion = "GuardarReporteComportamiento";
    tipo_reporte = $('#tipo_reporte').val();
    observacion = $("#obsComportamiento").val();
    id_aprendiz = $("#IDA").val();
    id_instructor = $("#id_Instructor").val();
    id_ficha = $("#ficha_asistenciaR").val();
    if (tipo_reporte === "null") {
      swal("No Ha Seleccionado una opcion", "", "error");
    }
    else {

      $.ajax({
        url: "app/controlador/FidelizacionControlador.php",
        type: 'post',
        data: { opcion: opcion, id_instructor: id_instructor, id_ficha: id_ficha, id_aprendiz: id_aprendiz, observacion: observacion, tipo_reporte: tipo_reporte }

      }).done(function (res) {

        if (res == 1) {
          $("#ReporteModal").modal("hide");
          swal("", "Datos enviados A bienestar", "success");
          $("#obsComportamiento").val("");
          $("#tipo_reporte").val("");
        }
        else {
          swal("", "Ya Este Aprendiz Fue Enviado a Bienestar Hoy", "error");
        }
      });
    }
  });

  $(document).on("click", ".BtnOBSA", function () {
    var $d = $(this).parent("td");     
    var fila = $d.parent().parent().children().index($d.parent());
    idA = $(this).data("id");
    $("#idAP").val(idA);
    $("#fila").val(fila);
  });

  $('#ObservacionesAsistencia').submit(function (e) {
    e.preventDefault();
    opcion = "GuardarAsistenciaClase";
    id_instructor = $("#id_Instructor").val();
    id_ficha = $("#ficha_asistencia").val();
    asistencia_tipo = "EXCUSA";
    asistencia_observacion = $("#obsAsistencia").val();
    idA = $("#idAP").val();
    fila = $("#fila").val();
    
    if(asistencia_tipo === "null" || asistencia_observacion === "null"){
       swall("Faltan Datos Por Llenar", "", "error"); 
    }
    else{
    $.ajax({
      url: "app/controlador/InstructorControlador.php",
      type: 'post',
      data: { opcion: opcion, id_instructor: id_instructor, id_aprendiz: idA, id_ficha: id_ficha, asistencia_tipo: asistencia_tipo, asistencia_observacion: asistencia_observacion }
    }).done(function (data) {

      if (data == 1) {
        var tablaAsistenciaAprendiz = $('#tablaAsistenciaAprendiz').DataTable({ retrieve: true, paging: false });
        contadorAI = 0;
        tablaAsistenciaAprendiz.row(':eq('+fila+')').remove().draw();
        $("#ObserA").modal("hide");
        $("#obsAsistencia").val("");
        Swal.fire({
          position: 'top-end',
          title: 'Observacion Registrada Con Exito!',
          icon: 'success',
          showConfirmButton: false,
          timer: 1200
        })
      }
      else {
        Swal.fire({
          position: 'top-end',
          title: 'error!',
          icon: 'error',
          showConfirmButton: false,
          timer: 1200
        })
      }
    });
  }
  });
  
  
 $("#fecha_historial_asistencia").change(function() {
        periodo = $(this).val();
        if (periodo == "ENTRE FECHAS") {
            $("#fi").show();
            $("#ff").show();
        } else {
            $("#fi").hide();
            $("#ff").hide();
        }
    });

    
  $(document).on("click", "#buscarHA", function () {
    Swal.fire('CARGANDO....');
    Swal.showLoading();
    ficha = $("#ficha_asistencia_historial").val();
    fecha = $("#fecha_historial_asistencia").val();
    fechaI = $("#FechaInicial").val();
    fechaF = $("#FechaFinal").val();

    if (fechaI === "" && fechaF === "") {
      fechaI = "0000-00-00";
      fechaF = "0000-00-00";
    }
    else if (fechaI === "") {
      fechaI = "0000-00-00";
    }
    else if (fechaF === "") {
      fechaF = "0000-00-00";
    }

    if (ficha === "null" || fecha === "null") {
      swal("Faltan datos Por llenar", "", "error");
    }
    else if (fecha == "HOY") {
      opcion = "HistorialAsistenciaAprendizHoy";
      $.ajax({
        url: "app/controlador/InstructorControlador.php",
        type: "POST",
        data: { opcion: opcion, ficha: ficha }
      }).done(function (data) {
        Swal.close();
        if(data==1)
        {
          swal("", "No se encontraron datos", "warning");
          var tablaHistorialAsistenciaAprendiz = $('#Historial_Asistecnia_Aprendiz').DataTable({ retrieve: true, paging: false });
          tablaHistorialAsistenciaAprendiz.clear().draw();
          tablaHistorialAsistenciaAprendiz.destroy();
        }
        else
        {
          datos = JSON.parse(data);
          llenarTablaHistorialAsistencia(datos);
        }
      })
    }
    else {
      opcion = "HistorialAsistenciaAprendizEntreFechas";
      $.ajax({
        url: "app/controlador/InstructorControlador.php",
        type: "POST",
        data: { opcion: opcion, ficha: ficha, fechaI:fechaI, fechaF:fechaF }
      }).done(function (data) {
        Swal.close();
        if(data==1)
        {
          swal("", "No se encontraron datos", "warning");
          var tablaHistorialAsistenciaAprendiz = $('#Historial_Asistecnia_Aprendiz').DataTable({ retrieve: true, paging: false });
          tablaHistorialAsistenciaAprendiz.clear().draw();
          tablaHistorialAsistenciaAprendiz.destroy();
        }
        else
        {
          datos = JSON.parse(data);
          llenarTablaHistorialAsistencia(datos);
        }
      })

    }
  })



  function llenarTablaHistorialAsistencia(listado) {
    var tablaHistorialAsistenciaAprendiz = $('#Historial_Asistecnia_Aprendiz').DataTable({ retrieve: true, paging: false });
    tablaHistorialAsistenciaAprendiz.destroy();
    contadorHA = 0;
    $('#Historial_Asistecnia_Aprendiz').DataTable({
      data: listado,
      "columns": [
        {
          data: null, render: function (data, type, row) {
            contadorHA = contadorHA + 1;
            return "<b>" + contadorHA + "</b>";
          }
        },
        {
          data: null, render: function (data, type, row) {
            return data.nombres + " " + data.apellidos;
          }
        },
        {
          data: null, render: function (data, type, row) {
            if (data.tipo_asistencia == "ASISTENCIA") {
              return '<i class="bi bi-check-lg" style="color:green;"></i>';
            }
            else {
              return '<i class="bi bi-x-circle-fill" style="color:red;"></i>';
            }
          }
        },
        { "data": "fecha" },
        { "data": "observacion" },
      ]
    });
  }


  $(document).on("click", ".BtnNovedad", function () {
    var $d = $(this).parent("td");     
    var fila = $d.parent().parent().children().index($d.parent());
    idA = $(this).data("id");
    $("#id_AN").val(idA);
    $("#fila_AN").val(fila);
  });
 


  function MiHorarioInstructor(id_instructor) {
    opcion = "ConsultarHorarioInstructor";
    id_instructor = id_instructor;
    cI = 1;
    cF = 12;
    hI = 6;
    hI2 = 7;
    trInicio = "<tr>";
    trFinal = "</tr>";
    tablaIH = "";
    while (cI <= cF) {
      if (hI < 11) {
        td = '<td class="table-secondary"><b >' + hI + ':00 am - ' + hI2 + ':00 am</b></td> ';
      }
      else if (hI == 11) {
        td = '<td class="table-secondary"><b >' + hI + ':00 am - ' + hI2 + ':00 pm</b></td> ';
      }
      else {
        td = '<td class="table-secondary"><b >' + hI + ':00 pm - ' + hI2 + ':00 pm</b></td> ';
      }
      tablaIH = tablaIH + trInicio + td;
      for (let index = 0; index <= 5; index++) {
        td2 = '<td class="CentrarTexto btnEliminarCasilla"> <div id="' + cI + index + '"> <b>-</b></div>  </td>';
        tablaIH = tablaIH + td2;
      }
      tablaIH = tablaIH + trFinal;
      cI = cI + 1;
      hI = hI + 1;
      hI2 = hI2 + 1;
    }
    $("#CargarHorarioInstructor").html(tablaIH);
    $.ajax({
      url: "app/controlador/HorarioControlador.php",
      type: "POST",
      data: { opcion: opcion, id_instructor: id_instructor }
    }).done(function (data) {
      if (data != 1) {
        var datos = JSON.parse(data);
        var longitudHI = Object.keys(datos).length;
        for (var i = 0; i < longitudHI; i++) {
          posicion = datos[i].posicion;
          competencia = datos[i].competencia;
          salon = datos[i].salon;
          ficha = datos[i].ficha;
          grupo = datos[i].grupo;
          $('#' + posicion).html('<label style="font-size:9px;">' + salon + '<br>' + competencia + ' <br>' + grupo + '<br>' + ficha + '</label>');
        }
      }
    });

  }

   MiHorarioInstructor(idI);


});




