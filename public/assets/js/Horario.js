$(document).ready(function () {

    var id_sedeA = $("#id_sedeA").val();
    contadorHORARIO = 0;



    var tablaHorario = $('#tablaHorario').DataTable({ retrieve: true, paging: false });
    tablaHorario.destroy();
    tablaHorario = $('#tablaHorario').DataTable({
        "ajax": {
            "url": "app/controlador/HorarioControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarHorario", sede: id_sedeA },
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function (data, type, row) {
                    contadorHORARIO = contadorHORARIO + 1;
                    return "<b>" + contadorHORARIO + "</b>";
                }
            },
            { "data": "salon" },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-primary btnEditarHorario" data-idsalon="' + data.id_salon + '" data-id="' + data.id_horario + '"  data-bs-toggle="modal" data-bs-target="#ModalTablaHorario" ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-danger btnEliminarHorario" data-idsalon="' + data.id_salon + '" data-id="' + data.id_horario + '" ><i class="bi bi-trash"></i></button>';
                }
            },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-secondary btnVerHorario" data-id="' + data.id_horario + '" ><i class="bi bi-eye-fill"></i></button>';
                }
            },
        ]
    });

    $('#days-list a').on('click', function () {
        var dias = $(this).attr('data-day');
        var dataset = $('#days-chose');
        var addday = dataset.val();
        var removeday = dataset.val().replace(dias + ',', '');
        var dum = $(this);
        if (dum.hasClass('active-day')) {
            dum.removeClass('active-day');
            dataset.val(removeday);
            dataset.click();
        } else {
            dum.addClass('active-day');
            dataset.val(addday + dias + ',');
            dataset.click();
        }
    });

    $("#RegistrarHorario").submit(function (e) {
        e.preventDefault();
        opcion = "GuardarHorario";
        sede = $("#sede_horario").val();
        salon = $("#salon_horario").val();
        resultado = $("#resultado_horario").val();
        horaI = $("#horaI").val();
        horaF = $("#horaF").val();
        dias = $.trim($('#days-chose').val());
        if (salon == "null" || dias == "") {
            swal("", "Faltan Datos Por llenar", "error");
        }
        else {
            $.ajax({
                url: "app/controlador/HorarioControlador.php",
                type: "POST",
                data: { salon: salon, dias: dias, horaI: horaI, horaF: horaF, opcion: opcion, sede: sede }
            }).done(function (data) {
                if (data == 1) {
                    swal("GUARDADO EXITOSAMENTE", "", "success").then((value) => { location.reload(); });
                    $(".checked").prop("checked", false);
                }
                else {
                    swal("El Horario Para este Ambiente Ya Fue Creado", "", "error");
                }
            });
        }
    });

    $(document).on("click", ".btnEliminarHorario", function () {
        opcion = "EliminarHorario";
        fila = $(this);
        id_horario = $(this).data("id");
        id_salon = $(this).data("idsalon");
        swal({
            title: "Estas Seguro De Eliminar ",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "app/controlador/HorarioControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_horario: id_horario, id_salon: id_salon }
                    }).done(function (data) {
                        if (data == 1) {
                            swal("DATOS ELIMINADOS", "", "success");
                            tablaHorario.row(fila.parents('tr')).remove().draw();
                        }
                        else {
                            alert(data);
                        }
                    });
                }
            });
    });

    $(document).on("click", ".btnEditarHorario", function () {
        opcion = "ConsultarHorario";
        fila = $(this).closest("tr");
        salon = fila.find('td:eq(1)').text();
        id_horario = $(this).data("id");
        id_salon = $(this).data("idsalon");
        $("#txtsalon").text(salon);
        $("#id_horario").val(id_horario);
        $("#id_salon").val(id_salon);

        $.ajax({
            url: "app/controlador/HorarioControlador.php",
            type: "POST",
            data: { opcion: opcion, id_horario: id_horario }
        }).done(function (data) {
            var datos = JSON.parse(data);
            $("#CargarHorario").html(datos.horario_tabla);
            $(".CentrarTexto").hover(
                function () {
                    $(this).find('button').show();
                },
                function () {
                    $(this).find('button').hide();
                }
            );
            $(".btnEliminarCasilla").hover(
                function () {
                    $(this).find('a').show();
                },
                function () {
                    $(this).find('a').hide();
                }
            );
        });
    });

    $(document).on("click", ".btnAgregarAHorario", function () {
        idtd = $(this).attr('data-row');
        DiaYHora = $(this).attr('data-dh');
        $("#DiaYHora").text(DiaYHora);
        $("#ModalLLenarHorario").modal("show");
        $("#idtd").val(idtd);
    });



    $("#RegistrarEnHorario").submit(function (e) {
        e.preventDefault();
        Swal.fire('Guardando....');
        Swal.showLoading();
        idtd = $("#idtd").val();
        id_horario = $("#id_horario").val();
        id_salon = $("#id_salon").val();
        competencia = $("#competencia_horario").val();
        resultados = $("#resultado_horario").val();
        instructor = $("#instructor_horario").val();
        ficha = $("#ficha_horario").val();
        color = $("#color_horario").val();
        horas = $("#horas_horario").val();
        texto_ficha = $("#ficha_horario option:selected").text();
        texto_competencia = $("#competencia_horario option:selected").text();
        texto_resultado = $("#resultado_horario option:selected").text();
        texto_instructor = $("#instructor_horario option:selected").text();
        texto_salon = $("#salon_horario op tion:selected").text();
        numeroDeHoras = parseInt(horas);
        contador = 1;
        sumador = parseInt(idtd);
        contadorLabel = 0;
        if (competencia == "null" || instructor == "null" || ficha == "null" || color == "null" || resultados == "null" || horas == "") {
            swal("Faltan Campos por llenar", "", "error");
            Swal.close();
        }
        else {
            opcion = "ConsultarPosicion";
            $.ajax({
                url: "app/controlador/HorarioControlador.php",
                type: "POST",
                data: { opcion: opcion, horas: horas, posicion: idtd, instructor: instructor }
            }).done(function (data) {
                if (data == 1) {
                    opcion = "ConsultarPosicionFicha";
                    $.ajax({
                        url: "app/controlador/HorarioControlador.php",
                        type: "POST",
                        data: { opcion: opcion, horas: horas, posicion: idtd, ficha: ficha }
                    }).done(function (data) {
                        if (data == 1) {
                            while (contador <= numeroDeHoras) {
                                label = $('#' + sumador).find("label").text();
                                if (label != "") {
                                    contadorLabel = contadorLabel + 1;
                                }
                                sumador = sumador + 10;
                                contador = contador + 1;
                            }
                            contador = 1;
                            sumador = parseInt(idtd);
                            if (contadorLabel > 0) {
                                swal("error al ingresar el numero de horas", "", "error");
                                Swal.close();
                            }
                            else {
                                if (color === "azul") {
                                    while (contador <= numeroDeHoras) {
                                        $('#' + sumador).html('<label class="cuadroAzul" style="font-size:10px;"><a class="borrar" data-instructor="' + instructor + '"  data-row="' + sumador + '"><i class="bi-x-square-fill"></i></a><br>&nbsp;' + texto_competencia + '&nbsp;<br>&nbsp;&nbsp;' + "RESULTADOS" + '&nbsp;&nbsp;<br>&nbsp;' + resultados + '&nbsp;&nbsp;<br>&nbsp;' + texto_instructor + '&nbsp;&nbsp;<br>&nbsp;' + texto_ficha + '&nbsp;&nbsp;<br>&nbsp;' + '<a class = "ver-mas" id = "VerMas" name = "VerMas">EDITAR</a>' + '&nbsp;<br><br></label>');
                                        sumador = sumador + 10;
                                        contador = contador + 1;
                                    }
                                }
                                else if (color === "verde") {
                                    while (contador <= numeroDeHoras) {
                                        $('#' + sumador).html('<label class="cuadroVerde" style="font-size:10px;" ><a class="borrar" data-instructor="' + instructor + '"  data-row="' + sumador + '"><i class="bi-x-square-fill"></i></a><br>&nbsp;' + texto_competencia + '&nbsp;<br>&nbsp;&nbsp;' + "RESULTADOS" + '&nbsp;&nbsp;<br>&nbsp;' + resultados + '&nbsp;&nbsp;<br>&nbsp;' + texto_instructor + '&nbsp;&nbsp;<br>&nbsp;' + texto_ficha + '&nbsp;&nbsp;<br>&nbsp;' + '<a class = "ver-mas" id = "VerMas" name = "VerMas">EDITAR</a>' + '&nbsp;<br><br></label>');
                                        sumador = sumador + 10;
                                        contador = contador + 1;
                                    }
                                }
                                else if (color === "morado") {
                                    while (contador <= numeroDeHoras) {
                                        $('#' + sumador).html('<label class="cuadroMorado" style="font-size:10px;"><a class="borrar"  data-instructor="' + instructor + '" data-row="' + sumador + '"><i class="bi-x-square-fill"></i></a><br>&nbsp;' + texto_competencia + '&nbsp;<br>&nbsp;&nbsp;' + "RESULTADOS" + '&nbsp;&nbsp;<br>&nbsp;' + resultados + '&nbsp;&nbsp;<br>&nbsp;' + texto_instructor + '&nbsp;&nbsp;<br>&nbsp;' + texto_ficha + '&nbsp;&nbsp;<br>&nbsp;' + '<a class = "ver-mas" id = "VerMas" name = "VerMas">EDITAR</a>' + '&nbsp;<br><br></label>');
                                        sumador = sumador + 10;
                                        contador = contador + 1;
                                    }
                                }
                                else if (color === "rojo") {
                                    while (contador <= numeroDeHoras) {
                                        $('#' + sumador).html('<label class="cuadroRojo" style="font-size:10px;"><a class="borrar" data-instructor="' + instructor + '"  data-row="' + sumador + '"><i class="bi-x-square-fill"></i></a><br>&nbsp;' + texto_competencia + '&nbsp;<br>&nbsp;&nbsp;' + "RESULTADO" + '&nbsp;&nbsp;<br>&nbsp;' + resultados + '&nbsp;&nbsp;<br>&nbsp;' + texto_instructor + '&nbsp;&nbsp;<br>&nbsp;' + texto_ficha + '&nbsp;&nbsp;<br>&nbsp;' + '<a class = "ver-mas" id = "VerMas" name = "VerMas">EDITAR</a>' + '&nbsp;<br><br></label>');
                                        sumador = sumador + 10;
                                        contador = contador + 1;
                                    }
                                }
                                else if (color === "amarillo") {
                                    while (contador <= numeroDeHoras) {
                                        $('#' + sumador).html('<label class="cuadroAmarillo" style="font-size:10px;"><a class="borrar" data-instructor="' + instructor + '"  data-row="' + sumador + '"><i class="bi-x-square-fill"></i></a><br>&nbsp;' + texto_competencia + '&nbsp;<br>&nbsp;&nbsp;' + "RESULTADO" + '&nbsp;&nbsp;<br>&nbsp;' + resultados + '&nbsp;&nbsp;<br>&nbsp;' + texto_instructor + '&nbsp;&nbsp;<br>&nbsp;' + texto_ficha + '&nbsp;&nbsp;<br>&nbsp;' + '<a class = "ver-mas" id = "VerMas" name = "VerMas">EDITAR</a>' + '&nbsp;<br><br></label>');
                                        sumador = sumador + 10;
                                        contador = contador + 1;
                                    }
                                }
                                else if (color === "rosado") {
                                    while (contador <= numeroDeHoras) {
                                        $('#' + sumador).html('<label class="cuadroRosado" style="font-size:10px;"><a class="borrar" data-instructor="' + instructor + '"  data-row="' + sumador + '"><i class="bi-x-square-fill"></i></a><br>&nbsp;' + texto_competencia + '&nbsp;<br>&nbsp;&nbsp;' + "RESULTADO" + '&nbsp;&nbsp;<br>&nbsp;' + resultados + '&nbsp;&nbsp;<br>&nbsp;' + texto_instructor + '&nbsp;&nbsp;<br>&nbsp;' + texto_ficha + '&nbsp;&nbsp;<br>&nbsp;' + '<a class = "ver-mas" id = "VerMas" name = "VerMas">EDITAR</a>' + '&nbsp;<br><br></label>');
                                        sumador = sumador + 10;
                                        contador = contador + 1;
                                    }
                                }
                                tabla = $("#CargarHorario").html();
                                opcion = "ActualizarHorario";
                                $.ajax({
                                    url: "app/controlador/HorarioControlador.php",
                                    type: "POST",
                                    data: { opcion: opcion, horas: horas, posicion: idtd, id_horario: id_horario, tabla: tabla, competencia: competencia, resultados: resultados, ficha: ficha, instructor: instructor, id_salon: id_salon }
                                }).done(function (data) {
                                    Swal.close();
                                    if (data == 1) {
                                        $("#ModalLLenarHorario").modal("hide");
                                        $("#programa_horario").val("null").selectpicker('refresh');
                                        $("#ficha_horario").val("null").selectpicker('refresh');
                                        $("#competencia_horario").val("null").selectpicker('refresh');
                                        $("#resultado_horario").val("null").selectpicker('refresh');
                                        $("#instructor_horario").val("null").selectpicker('refresh');
                                        $("#color_horario").val("null").selectpicker('refresh');
                                        $("#horas_horario").val("");
                                    }
                                    else {
                                        alert(data);
                                    }
                                });
                            }
                        }
                        else {
                            Swal.close();
                            swal("Esta Ficha Ya se Encuentra Asignada en esta hora en otro horario", "", "error");
                        }
                    });
                }
                else {
                    Swal.close();
                    swal("Este Instructor Ya se Encuentra Asignado en esta hora en otro horario", "", "error");
                }
            });
        }
    });


    $(document).on("click", ".borrar", function () {
        opcion = "BorrarCasillaHorario";
        idtd = $(this).attr('data-row');
        instructor = $(this).attr('data-instructor');
        id_horario = $("#id_horario").val();
        id_salon = $("#id_salon").val();
        $('#' + idtd).html('<button type="button" class="btnAgregarAHorario btn-primary" data-row="' + idtd + '" > <i class="bi-file-plus" ></i></button>');
        tabla = $("#CargarHorario").html();
        $.ajax({
            url: "app/controlador/HorarioControlador.php",
            type: "POST",
            data: { opcion: opcion, posicion: idtd, id_horario: id_horario, tabla: tabla, instructor: instructor, id_salon: id_salon }
        }).done(function (data) {
            if (data == 1) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 600
                });
            }
            else {
                alert(data);
            }
        });
    });


    $("#instructor_CH").change(function () {
        opcion = "ConsultarHorarioInstructor";
        id_instructor = $(this).val();
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
    });


    $("#ficha_CH").change(function () {
        opcion = "ConsultarHorarioFicha";
        id_ficha = $(this).val();
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
        $("#CargarHorarioFicha").html(tablaIH);
        $.ajax({
            url: "app/controlador/HorarioControlador.php",
            type: "POST",
            data: { opcion: opcion, id_ficha: id_ficha }
        }).done(function (data) {
            if (data != 1) {
                var datos = JSON.parse(data);
                console.log(datos);
                var longitudHS = Object.keys(datos).length;
                for (var i = 0; i < longitudHS; i++) {
                    posicion = datos[i].posicion;
                    competencia = datos[i].competencia;
                    salon = datos[i].salon;
                    instructor = datos[i].nombres + " " + datos[i].apellidos;
                    $('#' + posicion).html('<label style="font-size:9px;">' + salon + '<br>' + competencia + ' <br>' + instructor + '</label>');
                    
                }
            }else{                
            }
        });
    });



    $(document).on("click", ".btnExportarPDF", function () {
        $(this).hide();
        $("#instructor_CH").hide();
        $("#NombreInstructor").text($("#instructor_CH option:selected").text());
        window.print();
    });

    $(document).on("click", ".btnExportarPDFSalon", function () {
        $(this).hide();
        $("#salon_CH").hide();
        $("#NombreSalon").text($("#salon_CH option:selected").text());
        window.print();
    });

    $(document).on("click", ".btnVerHorario", function () {
        window.open("ImprimirHorarioSalon");
    });

    $("#salon_CH").change(function () {
        opcion = "ConsultarHorarioSalon";
        id_salon = $(this).val();
        $.ajax({
            url: "app/controlador/HorarioControlador.php",
            type: "POST",
            data: { opcion: opcion, id_salon: id_salon }
        }).done(function (data) {
            if (data == 1) {
                swal("No hay datos Para la consulta", "", "warning");
                $("#CargarHorarioSalon").html("");
            }
            else {
                var datos = JSON.parse(data);
                $("#CargarHorarioSalon").html(datos.horario_tabla);
            }

        });
    });

    $(document).on("click", ".btnExportarPDFFicha", function () {
        $(this).hide();
        $("#ficha_CH").hide();
        $("#NombreFicha").text($("#ficha_CH option:selected").text());
        window.print();
    });

});




