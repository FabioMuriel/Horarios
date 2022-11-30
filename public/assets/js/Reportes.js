$(document).ready(function() {
    var id_sedeA=$("#id_sedeA").val();
    var cargoU=$("#cargoU").val();
    var opcion;
    var contadorRP;
    var fila;
    var ListadoReporte = [];
    
  window.onload = function() {
    $.ajax({
           url: "app/controlador/ReportesControlador.php",
           type: "POST",
           data:{ opcion:"contarInstructor"}
        }).done(function(data) {
            if (data){
                var total =  JSON.parse(data).total;
                $("#Total_instructores").html(total);
            } else {
              alert("no ha nada");
        }
    });
    $.ajax({
           url: "app/controlador/ReportesControlador.php",
           type: "POST",
           data:{ opcion:"contarInstructor"}
        }).done(function(data) {
            if (data){
                var total =  JSON.parse(data).total;
                $("#Total_instructore").html(total);
            } else {
              alert("no ha nada");
        }
    });
    $.ajax({
           url: "app/controlador/ReportesControlador.php",
           type: "POST",
           data:{ opcion:"contarInstructor"}
        }).done(function(data) {
            if (data){
                var total =  JSON.parse(data).total;
                $("#Total_instructor").html(total);
            } else {
              alert("no ha nada");
        }
    });
    $.ajax({
           url: "app/controlador/ReportesControlador.php",
           type: "POST",
           data:{ opcion:"contarInstructor"}
        }).done(function(data) {
            if (data){
                var total =  JSON.parse(data).total;
                $("#Total_instructo").html(total);
            } else {
              alert("no ha nada");
        }
    });
};
    
    
    $(document).on("click", "#pdfR", function() {

        alert("p");
    });

    $("#periodoR").change(function() {
        periodo = $(this).val();
        if (periodo == "2") {
            $("#f_i").show();
            $("#f_f").show();
        } else {
            $("#f_i").hide();
            $("#f_f").hide();
        }
    });

    $("#personaR").change(function() {
        personal = $(this).val();
        if (personal == "APRENDIZ") {
            $("#pr").show();
            $("#fr").show();
        } else {
            $("#pr").hide();
            $("#fr").hide();
        }
    });

$("#periodoR").change(function() {
        periodo = $(this).val();
        if (periodo == "2") {
            $("#f_i").show();
            $("#f_f").show();
        } else {
            $("#f_i").hide();
            $("#f_f").hide();
        }
    });

    $("#personaT").change(function() {
        personal = $(this).val();
        if (personal == "APRENDIZ") {
            $("#pr").show();
            $("#fr").show();
        } else {
            $("#pr").hide();
            $("#fr").hide();
        }
    });

    function llenarTablaReporte(ListadoReporte) {
        var tablaReporte = $('#tablaReportes').DataTable({ retrieve: true, paging: false });
        tablaReporte.destroy();
        contadorRP = 0;
        $('#tablaReportes').DataTable({
          
            data: ListadoReporte,
            "columns": [{
                    data: null,
                    render: function(data, type, row) {
                        contadorRP = contadorRP + 1;
                        return "<b>" + contadorRP + "</b>";
                    }
                },
                { "data": "nombre" },
                { "data": "fecha" },
                { "data": "hora_entrada" },
                {
                    data: null,
                    render: function(data, type, row) {
                        if (data.hora_salida == "sin registrar") {
                            return '<b style="color:red;">' + data.hora_salida + '</b>';
                        } else {
                            return data.hora_salida;
                        }
                    }
                }
            ],
            responsive: "true",
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: 'REPORTE DE ASISTENCIA',
                    titleAttr: 'Exportar a Excel',
                    text:'EXCEL',
                    className: 'btn btn-success'
                    //Columns to export
                    //exportOptions: {
                   //     columns: [0, 1, 2, 3,4,5,6]
                   // }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'REPORTE DE ASISTENCIA',
                    titleAttr: 'Exportar a PDF',
                    text: 'PDF',
                    className: 'btn btn-danger',
                    
                }
            ]
        });
    }



    $(document).on("click", "#buscarR", function() {
        persona = $('#personaT').val();
        periodo = $('#periodoR').val();
        fechaI = $('#fechaInicial').val();
        fechaF = $('#fechaFinal').val();
        programa = $('#programaReporte').val();
        ficha = $('#fichaReporte').val();

        if(fechaI==="" && fechaF==="")
        {
          fechaI="0000-00-00";
          fechaF="0000-00-00";
        }
        else if(fechaI==="")
        {
           fechaI="0000-00-00";
        }
        else if(fechaF==="")
        {
           fechaF="0000-00-00";
        }
        
        
        if (persona === "null" || periodo === "null") {
            swal("Faltan datos Por llenar", "", "error");
        } else if (periodo == "1") {
            if (persona == "INSTRUCTOR") {
                opcion = "ListarReporteInstructorHoy";
                $.ajax({
                    url: "app/controlador/ReportesControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_sedeA:id_sedeA, cargoU: cargoU }
                }).done(function(data) {
                    if (data == 1) {
                        swal("No se Encontraron Datos Para esta Consulta", "", "warning");
                    } else {
                        datos = JSON.parse(data);
                        var longitudPersona = Object.keys(datos.persona).length;
                        var longitudAsistenciaI = Object.keys(datos.asistenciaI).length;
                        var Total_IA = "<b>Total Instructores: &nbsp;</b>" + longitudAsistenciaI;
                        $("#Total_Reporte").html(Total_IA);
                        ExisteSalida = datos.hasOwnProperty('salidaI');

                        for (var j = 0; j < longitudPersona; j++) {
                            id_persona = datos.persona[j].id_persona;
                            nombre = datos.persona[j].nombres + " " + datos.persona[j].apellidos;
                            posicionHE = datos.asistenciaI.findIndex(A => A.id_instructor === id_persona);
                            posicionHS = -1;
                            if (ExisteSalida) {
                                busquedaI = datos.salidaI.filter(b => b.id_instructor === id_persona);
                                maxID_SALIDA_INSTRUCTOR = Math.max(...busquedaI.map(x => parseInt(x.id_salida)));
                                posicionHS = datos.salidaI.findIndex(S => S.id_instructor === id_persona && S.id_salida == maxID_SALIDA_INSTRUCTOR);
                            }
                            if (posicionHE != -1) {
                                hora_salida = "sin registrar";
                                if (posicionHS != -1) {
                                    hora_salida = datos.salidaI[posicionHS].hora_salidaI;
                                }
                                fecha = datos.asistenciaI[posicionHE].fecha_asistenciaI;
                                hora_entrada = datos.asistenciaI[posicionHE].hora_entradaI;
                                let datosP= {
                                    "id_persona": id_persona,
                                    "nombre": nombre,
                                    "fecha": fecha,
                                    "hora_entrada": hora_entrada,
                                    "hora_salida": hora_salida
                                };
                                ListadoReporte.push(datosP);
                            }
                        }
                        llenarTablaReporte(ListadoReporte);
                        ListadoReporte = [];
                    }
                });
            } else if (persona == "FUNCIONARIO"){
                opcion = "listarReporteFuncionarioHoy";
                $.ajax({
                    url : "app/controlador/ReportesControlador.php",
                    type: "POST",
                    data: {opcion: opcion, id_sedeA: idsedeA, cargoU: cargoU}
                }).done(function(data){
                    if(data == 1){
                        swal("No se Encontraron Datos Para La Persona", "", "warning");
                    }else{
                        datos = JSON.parse(data);
                        var longitudPersona = Object.keys(datos.personas).length;
                        var longutudAsistenciaF =Object.keys(datos.asistenciaI).length;
                        var Total_IA = "<b> Total Funcionarios : &nbsp;</b>" + longitudAsistenciaF;
                        $("Total_REporte").html(Total_IA);
                        ExistenciaSalida = datos.hasOwmProperty('salidaI');
                        
                        for(var j = 0; j<longitudPersona; j++) {
                            id_persona = datos.persona[j].id_persona;
                            nombre = datos.persona[j].nombre + " " + datos.persona[j].apellidos;
                            posicionHE = datos.asistencia.findIndex(A => A.id_instructor == id_persona);
                            posicionHS = -1;
                            if(ExisteSalida) {
                                
                            }
                            
                        }
                    }
                })
            }
            else if (persona == "APRENDIZ") {
                contador=0;
                opcion = "ListarReporteAprendizHoy";
                $.ajax({
                    url: "app/controlador/ReportesControlador.php",
                    type: "POST",
                    data: { opcion: opcion , id_sedeA:id_sedeA, cargoU: cargoU}
                }).done(function(data) {
                    if (data == 1) {
                        swal("No se Encontraron Datos Para esta Consulta", "", "warning");
                    } else {
                        datos = JSON.parse(data);
                        var longitudAprendiz = Object.keys(datos.aprendiz).length;
                        var longitudAsistenciaA = Object.keys(datos.asistenciaA).length;
                        ExisteSalida = datos.hasOwnProperty('salidaA');

                        for (var j = 0; j < longitudAprendiz; j++) {
                            id_aprendiz = datos.aprendiz[j].id_aprendiz;
                            nombre = datos.aprendiz[j].nombres + " " + datos.aprendiz[j].apellidos;
                            programaA=datos.aprendiz[j].programa;
                            fichaA=datos.aprendiz[j].ficha;
                              if(programa === "null" && ficha==null)
                              {
                                posicionHE = datos.asistenciaA.findIndex(A => A.id_aprendiz === id_aprendiz);  
                                var Total_AA = "<b>Total Aprendices: &nbsp;</b>" + longitudAsistenciaA;
                              }
                              else if(programa === "null" && ficha==="null") 
                              {
                                 posicionHE = datos.asistenciaA.findIndex(A => A.id_aprendiz === id_aprendiz); 
                                 var Total_AA = "<b>Total Aprendices: &nbsp;</b>" + longitudAsistenciaA;
                              }
                              else if(programaA===programa && fichaA===ficha)
                              {
                                  posicionHE = datos.asistenciaA.findIndex(A => A.id_aprendiz === id_aprendiz); 
                                  var Total_AA = "<b>Total Aprendices: &nbsp;</b>" + contador;
                                  contador=contador+1;
                              }
                              else
                              {
                                 posicionHE=-1;
                              }
                              posicionHS = -1;
                             if (ExisteSalida) {
                                 busquedaA = datos.salidaA.filter(b => b.id_aprendiz === id_aprendiz);
                                 maxID_SALIDA_APRENDIZ = Math.max(...busquedaA.map(x => parseInt(x.id_salida)));
                                 posicionHS = datos.salidaA.findIndex(S => S.id_aprendiz === id_aprendiz && S.id_salida == maxID_SALIDA_APRENDIZ);
                             }
                             if (posicionHE != -1) {
                                hora_salida = "sin registrar";
                                if (posicionHS != -1) {
                                    hora_salida = datos.salidaA[posicionHS].hora_salidaA;
                                }
                                fecha = datos.asistenciaA[posicionHE].fecha_asistenciaA;
                                hora_entrada = datos.asistenciaA[posicionHE].hora_entradaA;
                                let datosA = {
                                    "id_persona": id_aprendiz,
                                    "nombre": nombre,
                                    "fecha": fecha,
                                    "hora_entrada": hora_entrada,
                                    "hora_salida": hora_salida
                                };
                                ListadoReporte.push(datosA);
                            }
                        }
                        $("#Total_Reporte").html(Total_AA);
                        llenarTablaReporte(ListadoReporte);
                        ListadoReporte = [];
                    }
                });
            }
        } else if (periodo == "2") {
           if(persona=="INSTRUCTOR")
           {
              opcion = "ListarReporteInstructorEntreFechas";
              $.ajax({
                 url: "app/controlador/ReportesControlador.php",
                 type: "POST",
                 data: { opcion: opcion, fechaI: fechaI, fechaF: fechaF, id_sedeA:id_sedeA, cargoU: cargoU }
              }).done(function(data) {
                 if (data == 1) {
                     swal("No se Encontraron Datos Para esta Consulta", "", "warning");
                 } else {
                     datos = JSON.parse(data);
                     var longitudAsistenciaI = Object.keys(datos.asistenciaI).length;
                     var Total_AA = "<b>Total Instructores: &nbsp;</b>" + longitudAsistenciaI;
                     $("#Total_Reporte").html(Total_AA);
                     ExisteSalida = datos.hasOwnProperty('salidaI');

                     for (var j = 0; j < longitudAsistenciaI; j++) {
                         id_instructor = datos.asistenciaI[j].id_instructor;
                         hora_entrada=datos.asistenciaI[j].hora_entradaI;
                         fecha=datos.asistenciaI[j].fecha_asistenciaI;
                         posicionP = datos.persona.findIndex(I => I.id_persona === id_instructor);
                         posicionHS = -1;
                         if (ExisteSalida) {
                             busquedaI = datos.salidaI.filter(b => b.id_instructor === id_instructor && b.fechaSI===fecha);
                             maxID_SALIDA_INSTRUCTOR = Math.max(...busquedaI.map(x => parseInt(x.id_salida)));
                             posicionHS = datos.salidaI.findIndex(S => S.id_instructor === id_instructor && S.id_salida == maxID_SALIDA_INSTRUCTOR);
                         }
                         if (posicionP != -1) {
                            hora_salida = "sin registrar";
                            if (posicionHS != -1) {
                                hora_salida = datos.salidaI[posicionHS].hora_salidaI;
                            }
                            nombre = datos.persona[posicionP].nombres + " " + datos.persona[posicionP].apellidos;
                            let datosP = {
                              "id_persona": id_instructor,
                              "nombre": nombre,
                              "fecha": fecha,
                              "hora_entrada": hora_entrada,
                              "hora_salida": hora_salida
                            };
                           ListadoReporte.push(datosP);
                        }
                    }
                      llenarTablaReporte(ListadoReporte);
                      ListadoReporte = [];
                  }
               });
            }else if(persona=="APRENDIZ")
             {
                 opcion = "ListarReporteAprendizEntreFechas";
                 $.ajax({
                   url: "app/controlador/ReportesControlador.php",
                   type: "POST",
                   data: { opcion: opcion, fechaI: fechaI, fechaF: fechaF,id_sedeA:id_sedeA, cargoU: cargoU }
                 }).done(function(data) {
                   if (data == 1) {
                      swal("No se Encontraron Datos Para esta Consulta", "", "warning");
                   } else {
                       contador=0;
                       datos = JSON.parse(data);
                       console.log(datos);
                       var longitudAsistenciaA = Object.keys(datos.asistenciaA).length;
                       ExisteSalida = datos.hasOwnProperty('salidaA');
                      

                      for (var j = 0; j < longitudAsistenciaA; j++) {
                         id_aprendiz = datos.asistenciaA[j].id_aprendiz;
                         hora_entrada=datos.asistenciaA[j].hora_entradaA;
                         fecha=datos.asistenciaA[j].fecha_asistenciaA;
                         posicionA = datos.aprendiz.findIndex(I => I.id_aprendiz === id_aprendiz);
                         posicionHS = -1;
                         if (ExisteSalida) {
                             busquedaA = datos.salidaA.filter(b => b.id_aprendiz === id_aprendiz && b.fechaSA===fecha);
                             maxID_SALIDA_APRENDIZ = Math.max(...busquedaA.map(x => parseInt(x.id_salida)));
                             posicionHS = datos.salidaA.findIndex(S => S.id_aprendiz === id_aprendiz && S.id_salida == maxID_SALIDA_APRENDIZ);
                         }
                         if (posicionA != -1) {
                            hora_salida = "sin registrar";
                            if (posicionHS != -1) {
                                hora_salida = datos.salidaA[posicionHS].hora_salidaA;
                            }
                            programaA=datos.aprendiz[posicionA].programa;
                            fichaA=datos.aprendiz[posicionA].ficha;
                            nombre = datos.aprendiz[posicionA].nombres + " " + datos.aprendiz[posicionA].apellidos;
                            if(programa==="null" && ficha==null)
                            {
                                var Total_AA = "<b>Total Aprendices: &nbsp;</b>" + longitudAsistenciaA;
                                let datosA = {
                                    "id_persona": id_aprendiz,
                                    "nombre": nombre,
                                    "fecha": fecha,
                                    "hora_entrada": hora_entrada,
                                    "hora_salida": hora_salida
                                  };
                                 ListadoReporte.push(datosA);
                            }
                            else if(programa==="null" && ficha==="null")
                            {
                                var Total_AA = "<b>Total Aprendices: &nbsp;</b>" + longitudAsistenciaA;
                                let datosA = {
                                    "id_persona": id_aprendiz,
                                    "nombre": nombre,
                                    "fecha": fecha,
                                    "hora_entrada": hora_entrada,
                                    "hora_salida": hora_salida
                                  };
                                 ListadoReporte.push(datosA);
                            }
                            else if(programaA===programa && fichaA===ficha)
                            {
                                contador=contador+1;
                                var Total_AA = "<b>Total Aprendices: &nbsp;</b>" + contador;
                                let datosA = {
                                    "id_persona": id_aprendiz,
                                    "nombre": nombre,
                                    "fecha": fecha,
                                    "hora_entrada": hora_entrada,
                                    "hora_salida": hora_salida
                                  };
                                 ListadoReporte.push(datosA);
                            }
                           
                        }
                     }
                     $("#Total_Reporte").html(Total_AA);
                      llenarTablaReporte(ListadoReporte);
                      ListadoReporte = [];
                   }
                 });
              }
         }
    });
     
    
        
    
    


});