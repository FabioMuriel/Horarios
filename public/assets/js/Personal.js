    $(document).ready(function() {
    var id_sedeA=$("#id_sedeA").val();
    var cargoU=$("#cargoU").val();
    var opcion;
    var fila;
    var contador = 0;
    var contadorA = 0;
    var contadorI = 0;
    var contadorIN = 0;
    var contadorB = 0;
    var contadorFUN = 0;
    var contadorH = 0;
    var contadorV = 0;
    var opcion;
    var fila;
    var vehiculo = [];
    var opcion;
    var fila;
    var contadorAP = 0;
    var idv = 0;

    var programaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
    var fichaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
    var instructorSelect = '<option value="null" >--SELECCIONE--</option>';

    var casoP = 0;
    var casoF = 0;

    function llenarProgramaPorSede(id_sede) {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarProgramaPorsede", id_sede: id_sede }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $.each(datos, function(i, item) {
                programaAprendizSelect += ' <option value="' + datos[i].id_programa + '" >' + datos[i].nombre_programa + '</option>';
            });
             $("#ProgramasP").html(programaAprendizSelect);
             $("#programaP").html(programaAprendizSelect);
              $("#ProgramsEP").html(programaAprendizSelect);
             $("#ProgramaSGP").html(programaAprendizSelect);
            programaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
        });
    }

   

    function llenarProgramaEditarAprendiz(caso, id_sede) {
        if (caso == 0) {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: { opcion: "ListarPrograma", id_sedeA:id_sedeA, cargoU:cargoU }
            }).done(function(res) {
                var datos = JSON.parse(res);
                $.each(datos, function(i, item) {
                    programaAprendizSelect += ' <option value="' + datos[i].id_programa + '" >' + datos[i].nombre_programa + '</option>';
                });

                $("#programaA").html(programaAprendizSelect);
                programaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
            });
        } else {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: { opcion: "ListarProgramaPorsede", id_sede: id_sede }
            }).done(function(res) {
                var datos = JSON.parse(res);
                $.each(datos, function(i, item) {
                    programaAprendizSelect += ' <option value="' + datos[i].id_programa + '" >' + datos[i].nombre_programa + '</option>';
                });
                $("#programaA").html(programaAprendizSelect);
                programaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
            });

        }

    }

    function llenarFichaPorPrograma(id_programa) {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarFichaPorPrograma", id_programa: id_programa }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $.each(datos, function(i, item) {
                fichaAprendizSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha + '</option>';
            });
            $("#fichaP").html(fichaAprendizSelect);
            $("#fichaReporte").html(fichaAprendizSelect);
            $("#ficha_horario").html(fichaAprendizSelect);
            fichaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
        });
    }


    function llenarFichaPorProgramaEditar(caso, id_programa) {
        if (caso == 0) {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: { opcion: "ListarFicha", id_sedeA:id_sedeA, cargoU:cargoU }
            }).done(function(res) {
                var datos = JSON.parse(res);
                $.each(datos, function(i, item) {
                    fichaAprendizSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha + '</option>';
                });
                $("#fichaA").html(fichaAprendizSelect);
                fichaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
            });
        } else {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: { opcion: "ListarFichaPorPrograma", id_programa: id_programa }
            }).done(function(res) {
                var datos = JSON.parse(res);
                $.each(datos, function(i, item) {
                    fichaAprendizSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha + '</option>';
                });
                $("#fichaA").html(fichaAprendizSelect);
                fichaAprendizSelect = '<option value="null" >--SELECCIONE--</option>';
            });
        }

    }

    llenarProgramaPorSede(id_sedeA);
    llenarFichaPorProgramaEditar(casoF);
    llenarProgramaEditarAprendiz(casoP);

    $("#programa_horario").change(function() {
        id_programa = $(this).val();
        llenarFichaPorPrograma(id_programa);
    });

    $("#programaP").change(function() {
        id_programa = $(this).val();
        llenarFichaPorPrograma(id_programa);
    });

    $("#programaA").change(function() {
        casoP = 1;
        id_programa = $(this).val();
        llenarFichaPorProgramaEditar(casoP, id_programa);
    });

    $("#sedeP").change(function() {
        id_sede = $(this).val();
        llenarProgramaPorSede(id_sede);
    });

    $("#sede_aprendizA").change(function() {
        casoP = 1;
        id_sede = $(this).val();
        llenarProgramaEditarAprendiz(casoP, id_sede);
    });




    function llenarSelectInstructor(instructorSelect) {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarSede" }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $.each(datos, function(i, item) {
                instructorSelect += ' <option value="' + datos[i].id_sede + '" >' + datos[i].nombre_sede + '</option>';
            });
            $("#sede").html(instructorSelect);
            $("#sedeI").html(instructorSelect);
            $("#sedeF").html(instructorSelect);
            $("#sedeE").html(instructorSelect);
            $("#sedeH").html(instructorSelect);
            $("#sedeB").html(instructorSelect);
            instructorSelect = '<option value="null" >--SELECCIONE--</option>';
        });
    }

    llenarSelectInstructor(instructorSelect);


    var tablaAprendiz = $('#tablaAprendiz').DataTable({ retrieve: true, paging: false });
    tablaAprendiz.destroy();
    tablaAprendiz = $('#tablaAprendiz').DataTable({

        "ajax": {
            "url": "app/controlador/AprendizControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarAprendiz" ,id_sedeA:id_sedeA, cargoU:cargoU },
            "dataSrc": ""
        },
        "columns": [

            {
                data: null,
                render: function(data, type, row) {
                    contadorAP = contadorAP + 1;
                    return "<b>" + contadorAP + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "numero_documento" },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombres + " " + data.apellidos;
                }
            },
            { "data": "celular" },
            {
                data: null,
                render: function(data, type, row) {

                    return '<button type="button" class="btn btn-primary btnEditarAprendiz" data-id="' + data.id_aprendiz + '"  ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null,
                render: function(data, type, row) {

                    return '<button type="button" class="btn btn-danger btnEliminarAprendiz" data-id="' + data.id_aprendiz + '" ><i class="bi bi-trash"></i></button>';
                }
            },
            {
                data: null,
                render: function(data, type, row) {

                    return ' <div class="form-check form-switch"> <input class="form-check-input" type="checkbox" id="estado_aprendiz" name="estado_aprendiz" data-id="' + data.id_aprendiz + '" checked>  <label class="form-check-label" for="flexSwitchCheckChecked"> </div>';
                }
            }
        ]

    });

    var tablaAdministrador = $('#tablaAdministrador').DataTable({ retrieve: true, paging: false });
    tablaAdministrador.destroy();
    tablaAdministrador = $('#tablaAdministrador').DataTable({

        "ajax": {
            "url": "app/controlador/PersonaControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarPersona", cargo: 1 , id_sedeA:id_sedeA, cargoU:cargoU},
            "dataSrc": ""
        },
        "columns": [

            {
                data: null,
                render: function(data, type, row) {
                    contadorA = contadorA + 1;
                    return "<b>" + contadorA + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "cedula" },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombres + " " + data.apellidos;
                }
            },
            { "data": "telefono" },
            { "defaultContent": '<button type="button" class="btn btn-primary btnEditarAdministrador" ><i class="bi bi-pencil-square"></i></button>' },
            {
                data: null,
                render: function(data, type, row) {

                    return '<button type="button" class="btn btn-danger btnEliminarAdministrador" data-id="' + data.id_persona + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]

    });


    var tablaInstructor = $('#tablaInstructor').DataTable({ retrieve: true, paging: false });
    tablaInstructor.destroy();
    tablaInstructor = $('#tablaInstructor').DataTable({
        "ajax": {
            "url": "app/controlador/PersonaControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarPersona", cargo: 3, id_sedeA:id_sedeA, cargoU:cargoU},
            "dataSrc": ""
        },
        "columns": [{
                data: null,
                render: function(data, type, row) {

                    contadorI = contadorI + 1;
                    return "<b>" + contadorI + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "cedula" },
            {
                data: null,
                render: function(data, type, row) {

                    return data.nombres + " " + data.apellidos;
                }
            },
            { "data": "telefono" },
            {
                data: null,
                render: function(data, type, row) {
                     if(id_sedeA==1)
                     {
                        return '<button type="button" class="btn btn-secondary btnAcceso" data-id="' + data.id_persona + '"  ><i class="bi bi-door-open"></i></button>';
                     }
                     else
                     {
                        return"";
                     }
                }
            },
            { "defaultContent": '<button type="button" class="btn btn-primary btnEditarInstructor"  ><i class="bi bi-pencil-square"></i></button>' },
            {
                data: null,
                render: function(data, type, row) {

                    return '<button type="button" class="btn btn-danger btnEliminarInstructor" data-id="' + data.id_persona + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]

    });

        var tablaFuncionario = $('#tablaFuncionario').DataTable({ retrieve: true, paging: false });
            tablaFuncionario.destroy();
           tablaFuncionario = $('#tablaFuncionario').DataTable({
                "ajax": {
                    "url": "app/controlador/PersonaControlador.php",
                    "method": 'POST',
                    "data": { opcion: "ListarPersona", cargo: 8, id_sedeA:id_sedeA, cargoU:cargoU},
                    "dataSrc": ""
                },
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
        
                            contadorFUN = contadorFUN + 1;
                            return "<b>" + contadorFUN + "</b>";
                        }
                    },
                    { "data": "regional" },
                        { "data": "centro" },
                        { "data": "sede" },
                     { "data": "cedula" },
                    {
                        data: null,
                        render: function(data, type, row) {
        
                            return data.nombres + " " + data.apellidos;
                        }
                    },
                    { "data": "telefono" },
                    
                    { "defaultContent": '<button type="button" class="btn btn-primary btnEditarFuncionario"  ><i class="bi bi-pencil-square"></i></button>' },
                    {
                        data: null,
                        render: function(data, type, row) {
        
                            return '<button type="button" class="btn btn-danger btnEliminarFuncionario" data-id="' + data.id_persona + '" ><i class="bi bi-trash"></i></button>';
                        }
                    }
                ]
        
            });
    
    var tablaHerramentero = $('#tablaHerramentero').DataTable({ retrieve: true, paging: false });
    tablaHerramentero.destroy();
    tablaHerramentero = $('#tablaHerramentero').DataTable({
        "ajax": {
            "url": "app/controlador/PersonaControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarPersona", cargo: 2,id_sedeA:id_sedeA, cargoU:cargoU},
            "dataSrc": ""
        },
        "columns": [{
                data: null,
                render: function(data, type, row) {

                    contadorH = contadorH + 1;
                    return "<b>" + contadorH + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "cedula" },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombres + " " + data.apellidos;
                }
            },
            { "data": "telefono" },
            { "defaultContent": '<button type="button" class="btn btn-primary btnEditarHerramentero"  ><i class="bi bi-pencil-square"></i></button>' },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return '<button type="button" class="btn btn-danger btnEliminarHerramentero" data-id="' + data.id_persona + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]

    });


    var tablaBienestar = $('#tablaBienestar').DataTable({ retrieve: true, paging: false });
    tablaBienestar.destroy();
    tablaBienestar = $('#tablaBienestar').DataTable({
        "ajax": {
            "url": "app/controlador/PersonaControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarPersona", cargo: 4 , id_sedeA:id_sedeA, cargoU:cargoU},
            "dataSrc": ""
        },
        "columns": [{
                data: null,
                render: function(data, type, row) {

                    contadorB = contadorB + 1;
                    return "<b>" + contadorB + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "cedula" },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombres + " " + data.apellidos;
                }
            },
            { "data": "telefono" },
            { "defaultContent": '<button type="button" class="btn btn-primary btnEditarBienestar"  ><i class="bi bi-pencil-square"></i></button>' },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return '<button type="button" class="btn btn-danger btnEliminarBienestar" data-id="' + data.id_persona + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]
    });


    var tablaInvitados = $('#tablaInvitados').DataTable({ retrieve: true, paging: false });
    tablaInvitados.destroy();
    tablaInvitados = $('#tablaInvitados').DataTable({
        "ajax": {
            "url": "app/controlador/PersonaControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarInvitado",id_sedeA:id_sedeA, cargoU:cargoU},
            "dataSrc": ""
        },
        "columns": [{
                data: null,
                render: function(data, type, row) {

                    contadorIN = contadorIN + 1;
                    return "<b>" + contadorIN + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "numero_documento" },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombres + " " + data.apellidos;
                }
            },
            { "data": "telefono" },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return '<button type="button" class="btn btn-primary btnEditarInvitado" data-id="' + data.id_invitado + '" ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return '<button type="button" class="btn btn-danger btnEliminarInvitado" data-id="' + data.id_invitado + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]

    });
    
   

    $(document).on("click", ".btnEditarInstructor", function() {
        $("#ModalEditInstructor").modal("show");
        fila = $(this).closest("tr");
        cedula = parseInt(fila.find('td:eq(4)').text());
        opcion = "ConsultarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: { cedula: cedula, opcion: opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $("#cedulaI").val(cedula);
            $("#nombresI").val(datos.nombres);
            $("#apellidosI").val(datos.apellidos);
            $("#direccionI").val(datos.direccion);
            $("#telefonoI").val(datos.telefono);
            $("#correoI").val(datos.correo);
            $("#contraseñaI").val(datos.password);
            $("#fechaNacI").val(datos.fechaNac);
            $("#id_personaI").val(datos.id_persona);
            $("#sedeI").val(datos.sede);
        });
    });

    $('#EditarInstructor').submit(function(e) {

        e.preventDefault();
        cedulaE = $.trim($('#cedulaI').val());
        nombresE = $.trim($('#nombresI').val());
        apellidosE = $.trim($('#apellidosI').val());
        fechaNacE = $.trim($('#fechaNacI').val());
        direccionE = $.trim($('#direccionI').val());
        telefonoE = $.trim($('#telefonoI').val());
        correoE = $.trim($('#correoI').val());
        contraseñaE = $.trim($('#contraseñaI').val());
        id_persona = $.trim($('#id_personaI').val());
        sedee = $.trim($('#sedeI').val());
        opcion = "ActualizarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: { cedulaE: cedulaE, sedee: sedee, nombresE: nombresE, apellidosE: apellidosE, fechaNacE: fechaNacE, direccionE: direccionE, telefonoE: telefonoE, contraseñaE: contraseñaE, opcion: opcion, correoE: correoE, id_persona: id_persona }
        }).done(function(data) {
            if (data == 1) {
                $('#ModalEditInstructor').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorI = 0;
                tablaInstructor.ajax.reload(null, false);
            } else {
                swal("", "ERROR", "error");
            }
        });

    });

    $(document).on("click", ".btnEliminarInstructor", function() {
        opcion = "EliminarPersona";
        id_persona = $(this).data("id");
        fila = $(this);
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
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_persona: id_persona }
                    }).done(function(data) {
                        if (data = 1) {
                            contadorI = 0;
                            tablaInstructor.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        } else {
                            alert(data);
                        }


                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });


    $(document).on("click", ".btnEditarFuncionario", function() {
        $("#ModalEditFuncionario").modal("show");
        fila = $(this).closest("tr");
        cedula = parseInt(fila.find('td:eq(4)').text());
        opcion = "ConsultarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: { cedula: cedula, opcion: opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $("#cedulaF").val(cedula);
            $("#nombresF").val(datos.nombres);
            $("#apellidosF").val(datos.apellidos);
            $("#direccionF").val(datos.direccion);
            $("#telefonoF").val(datos.telefono);
            $("#correoF").val(datos.correo);
            $("#contraseñaF").val(datos.password);
            $("#fechaNacF").val(datos.fechaNac);
            $("#id_personaF").val(datos.id_persona);
            $("#sedeF").val(datos.sede);
        });
    });

    $('#EditarFuncionario').submit(function(e) {
        e.preventDefault();
        cedulaE = $.trim($('#cedulaF').val());
        nombresE = $.trim($('#nombresF').val());
        apellidosE = $.trim($('#apellidosF').val());
        fechaNacE = $.trim($('#fechaNacF').val());
        direccionE = $.trim($('#direccionF').val());
        telefonoE = $.trim($('#telefonoF').val());
        correoE = $.trim($('#correoF').val());
        contraseñaE = $.trim($('#contraseñaF').val());
        id_persona = $.trim($('#id_personaF').val());
        sedee = $.trim($('#sedeF').val());
        opcion = "ActualizarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: { cedulaE: cedulaE, sedee: sedee, nombresE: nombresE, apellidosE: apellidosE, fechaNacE: fechaNacE, direccionE: direccionE, telefonoE: telefonoE, contraseñaE: contraseñaE, opcion: opcion, correoE: correoE, id_persona: id_persona }
        }).done(function(data) {
            if (data == 1) {
                $('#ModalEditFuncionario').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorI = 0;
                tablaFuncionario.ajax.reload(null, false);
            } else {
                swal("", "ERROR", "error");
            }
        }); 
    });

    $(document).on("click", ".btnEliminarFuncionario", function() {
        opcion = "EliminarPersona";
        id_persona = $(this).data("id");
        fila = $(this);
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
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_persona: id_persona }
                    }).done(function(data) {
                        if (data = 1) {
                            contadorFUN = 0;
                            tablaFuncionario.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        } else {
                            alert(data);
                        }


                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });
    
    
    $(document).on("click", ".btnEditarAdministrador", function() {

        $("#ModalEditAdministrador").modal('show');
        fila = $(this).closest("tr");
        cedula = parseInt(fila.find('td:eq(4)').text());
        opcion = "ConsultarPersona";
       
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: { cedula: cedula, opcion: opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $("#cedulaE").val(cedula);
            $("#nombresE").val(datos.nombres);
            $("#apellidosE").val(datos.apellidos);
            $("#direccionE").val(datos.direccion);
            $("#telefonoE").val(datos.telefono);
            $("#correoE").val(datos.correo);
            $("#contraseñaE").val(datos.password);
            $("#fechaNacE").val(datos.fechaNac);
            $("#id_persona").val(datos.id_persona);
            $("#sedeE").val(datos.sede);
           
        });
    });



    $('#EditarAdministrador').submit(function(e) {

        e.preventDefault();
        cedulaE = $.trim($('#cedulaE').val());
        nombresE = $.trim($('#nombresE').val());
        apellidosE = $.trim($('#apellidosE').val());
        fechaNacE = $.trim($('#fechaNacE').val());
        direccionE = $.trim($('#direccionE').val());
        telefonoE = $.trim($('#telefonoE').val());
        correoE = $.trim($('#correoE').val());
        contraseñaE = $.trim($('#contraseñaE').val());
        id_persona = $.trim($('#id_persona').val());
        opcion = "ActualizarPersona";
        sedee = $('#sedeE').val();
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: { cedulaE: cedulaE, sedee: sedee, nombresE: nombresE,apellidosE: apellidosE, fechaNacE: fechaNacE, direccionE: direccionE, telefonoE: telefonoE, contraseñaE: contraseñaE, opcion: opcion, correoE: correoE, id_persona: id_persona }
        }).done(function(data) {
            if (data == 1) {
                $('#ModalEditAdministrador').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorA = 0;
                tablaAdministrador.ajax.reload(null, false);
            } else {
                swal("", "ERROR", "error");
            }
        });

    });



    $(document).on("click", ".btnEliminarAdministrador", function() {
        opcion = "EliminarPersona";
        id_persona = $(this).data("id");
        fila = $(this);
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
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_persona: id_persona }
                    }).done(function(data) {
                        if (data = 1) {
                            contadorA = 0;
                            tablaAdministrador.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        } else {
                            alert(data);
                        }


                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });









    $(document).on("click", ".btnEditarHerramentero", function() {
        $("#ModalEditHerramentero").modal('show');
        fila = $(this).closest("tr");
        cedula = parseInt(fila.find('td:eq(4)').text());
        opcion = "ConsultarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: { cedula: cedula, opcion: opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $("#cedulaH").val(cedula);
            $("#nombresH").val(datos.nombres);
            $("#apellidosH").val(datos.apellidos);
            $("#direccionH").val(datos.direccion);
            $("#telefonoH").val(datos.telefono);
            $("#correoH").val(datos.correo);
            $("#contraseñaH").val(datos.password);
            $("#fechaNacH").val(datos.fechaNac);
            $("#id_personaH").val(datos.id_persona);
            $("#sedeH").val(datos.sede);
        });
    });


    $('#EditarHerramentero').submit(function(e) {

        e.preventDefault();
        cedulaE = $.trim($('#cedulaH').val());
        nombresE = $.trim($('#nombresH').val());
        apellidosE = $.trim($('#apellidosH').val());
        fechaNacE = $.trim($('#fechaNacH').val());
        direccionE = $.trim($('#direccionH').val());
        telefonoE = $.trim($('#telefonoH').val());
        correoE = $.trim($('#correoH').val());
        contraseñaE = $.trim($('#contraseñaH').val());
        id_persona = $.trim($('#id_personaH').val());
        sedee = $.trim($('#sedeH').val());
        opcion = "ActualizarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: { cedulaE: cedulaE, sedee: sedee, nombresE: nombresE,apellidosE: apellidosE, fechaNacE: fechaNacE, direccionE: direccionE, telefonoE: telefonoE, contraseñaE: contraseñaE, opcion: opcion, correoE: correoE, id_persona: id_persona }
        }).done(function(data) {
            if (data == 1) {
                $('#ModalEditHerramentero').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorH = 0;
                tablaHerramentero.ajax.reload(null, false);
            } else {
                swal("", "ERROR", "error");
            }
        });

    });


    $(document).on("click", ".btnEliminarHerramentero", function() {
        opcion = "EliminarPersona";
        id_persona = $(this).data("id");
        fila = $(this);
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
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_persona: id_persona }
                    }).done(function(data) {
                        if (data = 1) {
                            contadorH = 0;
                            tablaHerramentero.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        } else {
                            alert(data);
                        }


                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });





    $(document).on("click", ".btnEditarBienestar", function() {
        $("#ModalEditBienestar").modal('show');
        fila = $(this).closest("tr");
        cedula = parseInt(fila.find('td:eq(4)').text());
        opcion = "ConsultarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: { cedula: cedula, opcion: opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);
            $("#cedulaB").val(cedula);
            $("#nombresB").val(datos.nombres);
            $("#apellidosB").val(datos.apellidos);
            $("#direccionB").val(datos.direccion);
            $("#telefonoB").val(datos.telefono);
            $("#correoB").val(datos.correo);
            $("#contraseñaB").val(datos.password);
            $("#fechaNacB").val(datos.fechaNac);
            $("#id_personaB").val(datos.id_persona);
            $("#sedeB").val(datos.sede);
        });
    });


    $('#EditarBienestar').submit(function(e) {

        e.preventDefault();
        cedulaE = $.trim($('#cedulaB').val());
        nombresE = $.trim($('#nombresB').val());
        apellidosE = $.trim($('#apellidosB').val());
        fechaNacE = $.trim($('#fechaNacB').val());
        direccionE = $.trim($('#direccionB').val());
        telefonoE = $.trim($('#telefonoB').val());
        correoE = $.trim($('#correoB').val());
        contraseñaE = $.trim($('#contraseñaB').val());
        id_persona = $.trim($('#id_personaB').val());
        sedee = $("#sedeB").val();
        opcion = "ActualizarPersona";

        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: { cedulaE: cedulaE, sedee: sedee, nombresE: nombresE,apellidosE: apellidosE, fechaNacE: fechaNacE, direccionE: direccionE, telefonoE: telefonoE, contraseñaE: contraseñaE, opcion: opcion, correoE: correoE, id_persona: id_persona }
        }).done(function(data) {
            if (data == 1) {
                $('#ModalEditBienestar').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorB = 0;
                tablaBienestar.ajax.reload(null, false);
            } else {
                swal("", "ERROR", "error");
            }
        });

    });


    $(document).on("click", ".btnEliminarBienestar", function() {
        opcion = "EliminarPersona";
        id_persona = $(this).data("id");
        fila = $(this);
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
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_persona: id_persona }
                    }).done(function(data) {
                        if (data = 1) {
                            contadorB = 0;
                            tablaBienestar.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        } else {
                            alert(data);
                        }
                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });

    $('#imagenP').bind('change', function () {
        var filename = $(this).val();
        var extension = filename.split('.');
        ext = extension[extension.length-1];
        if (/^\s*$/.test(filename)) {
          $("#file").removeClass('active');
          $("#noFile").text("Ningun Archivo Seleccionado"); 
        }
        else 
        {
            if(ext === "png" || ext==="jpg")
            {
                $("#file").removeClass('danger');
                $("#file").addClass('active');
                $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
            }
            else
            {
                 swal("", "El archivo debe estar en formato png", "error");
                 $("#file").addClass('danger');
                $("#noFile").text("Ningun Archivo Seleccionado"); 
            }
        }
    });

    $('#imagenA').bind('change', function () {
        var filename = $(this).val();
        var extension = filename.split('.');
        ext = extension[extension.length-1];
        if (/^\s*$/.test(filename)) {
          $("#FileA").removeClass('active');
          $("#fileIA").text("Ningun Archivo Seleccionado"); 
        }
        else 
        {
            if(ext === "png" || ext==="jpg")
            {
                $("#FileA").removeClass('danger');
                $("#FileA").addClass('active');
                $("#fileIA").text(filename.replace("C:\\fakepath\\", ""));
            }
            else
            {
                 swal("", "El archivo debe estar en formato png", "error");
                 $("#FileA").addClass('danger');
                $("#fileIA").text("Ningun Archivo Seleccionado"); 
            }
        }
    });


    $('#RegistrarPersonal').submit(function (e) {
        
        e.preventDefault();
        cargo = $.trim($('#cargoP').val());
        numero_documento = $.trim($('#numero_documentoP').val());
        nombres = $.trim($('#nombresP').val());
        apellidos = $.trim($('#apellidosP').val());
        fechaNac = $.trim($('#fechaNacP').val());
        direccion = $.trim($('#direccionP').val());
        telefono = $.trim($('#telefonoP').val());
        correo = $.trim($('#correoP').val());
        contraseña = $.trim($('#contraseñaP').val());
        sede = $.trim($('#sedeP').val());
        regional = $.trim($('#regionalP').val());
        centro = $.trim($('#centroP').val());
        tipo_documento = $.trim($('#tipo_dcP').val());
        programa = $.trim($('#programaP').val());
        ficha = $.trim($('#fichaP').val());
        imagen = $('#imagenP')[0].files[0];    

        
        contrato = "CONTRATISTA";
        vehiculoPersona = JSON.stringify(vehiculo);
        if (cargo === "null" || sede === "null" || tipo_documento === "null" || regional === "null" || centro === "null") {
            swal("", "FALTAN CAMPOS POR LLENAR", "error");
        } else {
            if (cargo != 5) {
                if(cargo==7)
                {
                    opcion = "GuardarInvitado";
                    $.ajax({
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: {tipo_documento: tipo_documento, numero_documento: numero_documento, sede: sede, nombres: nombres, apellidos: apellidos, telefono: telefono,opcion: opcion }
                    }).done(function (data) {
                        if (data == 1) {
                            $('#ModalRegistroPersonal').modal('hide');
                            $("#ModalRegistroPersonal").find("input").val("");
                            $("#ModalRegistroPersonal").find("select").val("null");
                            contadorIN= 0;
                            tablaInvitados.ajax.reload(null, false);
                            swal("GUARDADO EXITOSAMENTE", "", "success");
                        } else {
                            swal("EL INVITADO YA ESTA REGISTRADO", "", "error");
                        }
                    });
                }
                else 
                {
                    opcion = "GuardarPersona";
                    Swal.fire('CARGANDO...');
                    Swal.showLoading();
                    formDataP = new FormData();
                    formDataP.append('sede',sede);
                    formDataP.append('opcion',opcion);
                    formDataP.append('numero_documento',numero_documento);
                    formDataP.append('nombres',nombres);
                    formDataP.append('apellidos',apellidos);
                    formDataP.append('fechaNac',fechaNac);
                    formDataP.append('direccion',direccion);
                    formDataP.append('telefono',telefono);
                    formDataP.append('contrato',contrato);
                    formDataP.append('correo',correo);
                    formDataP.append('cargo',cargo);
                    formDataP.append('contraseña',contraseña);
                    formDataP.append('imagen',imagen);
                    formDataP.append('vehiculoPersona',vehiculoPersona);
                    $.ajax({
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: formDataP,
                        contentType: false,
                        processData: false
                    }).done(function (data) {
                        if (data == 1) {
                            Swal.close();
                            $("#file").removeClass('active');
                            $("#noFile").text("Ningun Archivo Seleccionado"); 
                            $('#ModalRegistroPersonal').modal('hide');
                            $("#ModalRegistroPersonal").find("input").val("");
                            $("#ModalRegistroPersonal").find("select").val("null");
                            swal("GUARDADO EXITOSAMENTE", "", "success");
                            vehiculo = [];
                            var tablaVehiculo = $('#tablaVehiculo').DataTable({ retrieve: true, paging: false });
                            tablaVehiculo.clear().draw();
                            tablaVehiculo.destroy();
    
                            if (cargo == 1) {
                                contadorA = 0;
                                tablaAdministrador.ajax.reload(null, false);
                            } else if (cargo == 2) {
                                contadorH = 0;
                                tablaHerramentero.ajax.reload(null, false);
                            } else if (cargo == 3) {
                                contadorI = 0;
                                tablaInstructor.ajax.reload(null, false);
                            } 
                            else if (cargo == 8) {
                              contadorFUN = 0;
                              tablaFuncionario.ajax.reload(null, false);
                            }
                            else {
                                contadorB = 0;
                                tablaBienestar.ajax.reload(null, false);
                            }
                        } else {
                            Swal.close();
                            swal("", "ESTA CEDULA YA EXISTE POR FAVOR DIJITE OTRA", "error");
                        }
                    });
                }
               
            } else {
                if (programa === "null" || ficha === "null") {
                    swal("", "faltan datos por llenar", "error");
                }
                else {
                    Swal.fire('CARGANDO...');
                    Swal.showLoading();
                    opcion = "GuardarAprendiz";
                    formData = new FormData();
                    formData.append('sede',sede);
                    formData.append('opcion',opcion);
                    formData.append('tipo_documento',tipo_documento);
                    formData.append('numero_documento',numero_documento);
                    formData.append('nombres',nombres);
                    formData.append('apellidos',apellidos);
                    formData.append('direccion',direccion);
                    formData.append('telefono',telefono);
                    formData.append('correo',correo);
                    formData.append('contraseña',contraseña);
                    formData.append('programa',programa);
                    formData.append('ficha',ficha);
                    formData.append('imagen',imagen);
                    formData.append('vehiculoPersona',vehiculoPersona);
                    $.ajax({
                        url: "app/controlador/AprendizControlador.php",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false
                    }).done(function (data) {
                        if (data == 1) {
                            Swal.close();
                            $("#file").removeClass('active');
                            $("#noFile").text("Ningun Archivo Seleccionado"); 
                            $("#imagenP").val(""); 
                            $('#ModalRegistroPersonal').modal('hide');
                            $("#ModalRegistroPersonal").find("input").val("");
                            $("#ModalRegistroPersonal").find("select").val("null");
                            swal("GUARDADO EXITOSAMENTE", "", "success");
                            vehiculo = [];
                            var tablaVehiculo = $('#tablaVehiculo').DataTable({ retrieve: true, paging: false });
                            tablaVehiculo.clear().draw();
                            tablaVehiculo.destroy();
                            contadorAP = 0;
                            tablaAprendiz.ajax.reload(null, false);
                        } else {
                            Swal.close();
                            swal("la cedula ya existe digite otra", "", "error");
                        }
                    });
                }
            }
        }
    });



    $(document).on("click", ".btnEditarAprendiz", function() {
        $("#ModalEditAprendiz").modal('show');
        id_aprendiz = $(this).data('id');
        opcion = "ConsultarAprendiz";

        $.ajax({
            url: "app/controlador/AprendizControlador.php",
            type: 'post',
            datatype: "json",
            data: { id_aprendiz: id_aprendiz, opcion: opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);
            if(datos.imagen=="" || datos.imagen=="null" || datos.imagen==null)
            {
              $("#fileIA").text("Ningun Archivo Seleccionado....");
              $("#textoIA").val("primeraVez");
            }
            else
            {
              file1 = datos.imagen.split('/');
              $("#fileIA").text(file1[6]);
              $("#textoIA").val(file1[6]);
            }
           
            $("#id_aprendiz").val(id_aprendiz);
            $("#tipo_documentoA").val(datos.tipo_documento);
            $("#numero_documentoA").val(datos.numero_documento);
            $("#nombresA").val(datos.nombres);
            $("#apellidosA").val(datos.apellidos);
            $("#direccionA").val(datos.direccion);
            $("#telefonoA").val(datos.telefono);
            $("#correoA").val(datos.correo);
            $("#contraseñaA").val(datos.password);
            $("#programaA").val(datos.id_programa);
            $("#fichaA").val(datos.id_ficha);
            $("#regional_aprendizA").val(datos.id_regional);
            $("#centro_aprendizA").val(datos.id_centro);
            $("#sede_aprendizA").val(datos.id_sede);
            $("#estadoA").val(datos.estado);

        });
    });


    $('#EditarAprendiz').submit(function(e) {
        e.preventDefault();
        id_aprendiz = $.trim($('#id_aprendiz').val());
        tipo_documento = $.trim($('#tipo_documentoA').val());
        numero_documento = $.trim($('#numero_documentoA').val());
        nombres = $.trim($('#nombresA').val());
        apellidos = $.trim($('#apellidosA').val());
        direccion = $.trim($('#direccionA').val());
        telefono = $.trim($('#telefonoA').val());
        correo = $.trim($('#correoA').val());
        contraseña = $.trim($('#contraseñaA').val());
        programa = $.trim($('#programaA').val());
        ficha = $.trim($('#fichaA').val());
        sede = $.trim($('#sede_aprendizA').val());
        opcion = "ActualizarAprendiz";
        imagenAC=$('#imagenA').val();
        textoIA = $('#textoIA').val();  
        estadoA  =$('#estadoA').val();
        if(imagenAC=="")
        {
            imagen=textoIA;
        }
        else
        {
            imagen = $('#imagenA')[0].files[0];
        }

        formData = new FormData();
        formData.append('id_aprendiz', id_aprendiz);
        formData.append('opcion', opcion);
        formData.append('tipo_documento', tipo_documento);
        formData.append('numero_documento', numero_documento);
        formData.append('nombres', nombres);
        formData.append('apellidos', apellidos);
        formData.append('direccion', direccion);
        formData.append('telefono', telefono);
        formData.append('correo', correo);
        formData.append('contraseña', contraseña);
        formData.append('programa', programa);
        formData.append('ficha', ficha);
        formData.append('sede', sede);
        formData.append('imagen', imagen);
        formData.append('textoIA', textoIA);
        formData.append('estadoA', estadoA);
        Swal.fire('CARGANDO...');
        Swal.showLoading();

        if ((tipo_documento.trim() === 'null') || (ficha.trim() === 'null') || (programa.trim() === 'null') || (sede.trim() === 'null')) {
            swal("faltan campos por llenar", "", "error");
        } else {
            $.ajax({
                url: "app/controlador/AprendizControlador.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false
            }).done(function(data) {
                if (data == 1) {
                    Swal.close();
                    $("#FileA").removeClass('active');
                    $('#ModalEditAprendiz').modal('hide');
                    swal("GUARDADO EXITOSAMENTE", "", "success");
                    contadorAP = 0;
                    tablaAprendiz.ajax.reload(null, false);
                } else {
                    Swal.close();
                    alert(data);
                }
            });
        }
    });



    $(document).on("click", ".btnEliminarAprendiz", function() {
        opcion = "EliminarAprendiz";
        id_aprendiz = $(this).data("id");
        fila = $(this);
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
                        url: "app/controlador/AprendizControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_aprendiz: id_aprendiz }
                    }).done(function(data) {
                        if (data = 1) {
                            contadorAP = 0;
                            tablaAprendiz.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        } else {
                            alert(data);
                        }
                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });


    $("#cargoP").change(function() {
        cargo = $(this).val();
        if (cargo == "5") {
            $("#datosAP").show();
            $("#datosAP2").show();
            $("#fechaNacP").attr('disabled', 'disabled');
        } 
        else if(cargo=="7")
        {
            $("#fechaNacP").attr('disabled', 'disabled');
            $("#direccionP").attr('disabled', 'disabled');
            $("#correoP").attr('disabled', 'disabled');
            $("#contraseñaP").attr('disabled', 'disabled');
            $("#datosAP").hide();
            $("#datosAP2").hide();
        }
        else
        {
            $("#datosAP").hide();
            $("#datosAP2").hide();
            $("#fechaNacP").removeAttr('disabled');
            $("#direccionP").removeAttr('disabled');
            $("#correoP").removeAttr('disabled');
            $("#contraseñaP").removeAttr('disabled');
        }

    });

    $(document).on("click", ".ListarVehiculo", function() {
        $("#ModalVehiculo").modal('show');
    });


    function listarVehiculoAdministrador(id)
    {
        opcion="ConsultarVehivculo";
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: {idp:id, opcion:opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);

            var tablaVehiculoA = $('#tablaVehiculoA').DataTable({ retrieve: true, paging: false });
            tablaVehiculoA.destroy();
            contadorV = 0;
            $('#tablaVehiculoA').DataTable({
                data: datos,
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
                            contadorV = contadorV + 1;
                            return "<b>" + contadorV + "</b>";
                        }
                    },
                    { "data": "tipo_vehiculo" },
                    { "data": "placa" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-danger  EliminarVehiculoA" data-id="' + data.id_vehiculo + '" ><i class="bi bi-trash"></ifile-excel"></i> </button>';
                        }
                    },
                ]
            });
           
        });
    }

    function listarVehiculoInstructor(id)
    {
        opcion="ConsultarVehivculo";
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: {idp:id, opcion:opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);

            var tablaVehiculoI = $('#tablaVehiculoI').DataTable({ retrieve: true, paging: false });
            tablaVehiculoI.destroy();
            contadorV = 0;
            $('#tablaVehiculoI').DataTable({
                data: datos,
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
                            contadorV = contadorV + 1;
                            return "<b>" + contadorV + "</b>";
                        }
                    },
                    { "data": "tipo_vehiculo" },
                    { "data": "placa" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-danger  EliminarVehiculoI" data-id="' + data.id_vehiculo + '" ><i class="bi bi-trash"></ifile-excel"></i> </button>';
                        }
                    },
                ]
            });
           
        });
    }

    function listarVehiculoHerramentero(id)
    {
        opcion="ConsultarVehivculo";
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: {idp:id, opcion:opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);

            var tablaVehiculoH = $('#tablaVehiculoH').DataTable({ retrieve: true, paging: false });
            tablaVehiculoH.destroy();
            contadorV = 0;
            $('#tablaVehiculoH').DataTable({
                data: datos,
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
                            contadorV = contadorV + 1;
                            return "<b>" + contadorV + "</b>";
                        }
                    },
                    { "data": "tipo_vehiculo" },
                    { "data": "placa" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-danger  EliminarVehiculoH" data-id="' + data.id_vehiculo + '" ><i class="bi bi-trash"></ifile-excel"></i> </button>';
                        }
                    },
                ]
            });
           
        });
    }


    function listarVehiculoBienestar(id)
    {
        opcion="ConsultarVehivculo";
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: {idp:id, opcion:opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);

            var tablaVehiculoB = $('#tablaVehiculoB').DataTable({ retrieve: true, paging: false });
            tablaVehiculoB.destroy();
            contadorV = 0;
            $('#tablaVehiculoB').DataTable({
                data: datos,
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
                            contadorV = contadorV + 1;
                            return "<b>" + contadorV + "</b>";
                        }
                    },
                    { "data": "tipo_vehiculo" },
                    { "data": "placa" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-danger  EliminarVehiculoB" data-id="' + data.id_vehiculo + '" ><i class="bi bi-trash"></ifile-excel"></i> </button>';
                        }
                    },
                ]
            });
           
        });
    }

    function listarVehiculoAprendiz(id)
    {
        opcion="CosnultarVehiculoAprendiz";
        $.ajax({
            url: "app/controlador/AprendizControlador.php",
            type: "POST",
            data: {idA:id, opcion:opcion }
        }).done(function(res) {
            var datos = JSON.parse(res);

            var tablaVehiculoAP = $('#tablaVehiculoAP').DataTable({ retrieve: true, paging: false });
            tablaVehiculoAP.destroy();
            contadorV = 0;
            $('#tablaVehiculoAP').DataTable({
                data: datos,
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
                            contadorV = contadorV + 1;
                            return "<b>" + contadorV + "</b>";
                        }
                    },
                    { "data": "tipo_vehiculo" },
                    { "data": "placa" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-danger  EliminarVehiculoAP" data-id="' + data.id_vehiculo + '" ><i class="bi bi-trash"></ifile-excel"></i> </button>';
                        }
                    },
                ]
            });
           
        });
    }



    $(document).on("click", ".ListarVehiculoA", function() {
        idp=$("#id_persona").val();
        listarVehiculoAdministrador(idp);
        $("#id_PV").val(idp);
        $("#ModalVehiculoA").modal('show');
    });

    $(document).on("click", ".ListarVehiculoI", function() {
        idp=$("#id_personaI").val();
        $("#id_PVI").val(idp);
        listarVehiculoInstructor(idp);
        $("#ModalVehiculoI").modal('show');
    });

    $(document).on("click", ".ListarVehiculoH", function() {
        idp=$("#id_personaH").val();
        $("#id_PVH").val(idp);
        listarVehiculoHerramentero(idp);
        $("#ModalVehiculoH").modal('show');
    });

    $(document).on("click", ".ListarVehiculoB", function() {
        idp=$("#id_personaB").val();
        $("#id_PVB").val(idp);
        listarVehiculoBienestar(idp);
        $("#ModalVehiculoB").modal('show');
    });

    $(document).on("click", ".ListarVehiculoAP", function() {
        idA=$("#id_aprendiz").val();
        $("#id_AP").val(idA);
        listarVehiculoAprendiz(idA);
        $("#ModalVehiculoAP").modal('show');
    });



    $(document).on("click", ".GuardarVehiculo", function() {
        tipo_vehiculo = $('#tipo_vehiculoP').val();
        placa = $.trim($('#placaP').val());
      
        if (tipo_vehiculo === "null" || placa === "") {
            swal("faltan datos", "", "error");
        } else {

            let datos = {
                "idv": idv,
                "tipo_vehiculo": tipo_vehiculo,
                "placa": placa
            };
            idv = idv + 1;
            vehiculo.push(datos);
            $('#tipo_vehiculoP').val("null");
            $('#placaP').val("");

            var tablaVehiculo = $('#tablaVehiculo').DataTable({ retrieve: true, paging: false });
            tablaVehiculo.destroy();
            contadorV = 0;
            $('#tablaVehiculo').DataTable({
                data: vehiculo,
                "columns": [{
                        data: null,
                        render: function(data, type, row) {
                            contadorV = contadorV + 1;
                            return "<b>" + contadorV + "</b>";
                        }
                    },
                    { "data": "tipo_vehiculo" },
                    { "data": "placa" },
                    {
                        data: null,
                        render: function(data, type, row) {
                            return '<button type="button" class="btn btn-danger  EliminarVehiculo" data-id="' + data.idv + '" ><i class="bi bi-trash"></ifile-excel"></i> </button>';
                        }
                    },
                ]
            });

          

        }
    });

    $(document).on("click", ".EliminarVehiculo", function(event) {
        idv = $(this).data("id");
        conta=idv;
        var tablaVehiculo = $('#tablaVehiculo').DataTable({ retrieve: true, paging: false });
        contadorV = 0;
        fila = $(this);
        tablaVehiculo.row(fila.parents('tr')).remove().draw();
        posicion = vehiculo.findIndex(v => v.idv === idv);
        vehiculo.splice(posicion, 1);
    });


 $(document).on("click", ".GuardarVehiculoA", function() {
        tipo_vehiculo = $('#tipo_vehiculoA').val();
        placa = $.trim($('#placaA').val());
        idp = $.trim($('#id_PV').val());
        opcion="GuardarVehivculoPersona";
        if (tipo_vehiculo === "null" || placa === "") {
            swal("faltan datos por llenar", "", "error");
        } 
        else 
        {
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idp: idp, placa:placa, tipo_vehiculo: tipo_vehiculo}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoAdministrador(idp);
                   $("#tipo_vehiculoA").val("null");
                   $("#placaA").val("");
                } else {
                    alert(data);
                }
            });
           
        }
    });

    $(document).on("click", ".EliminarVehiculoA", function() {
        idv = $(this).data("id");
        opcion="EliminarVehiculoPersona";
        fila = $(this);
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idv: idv}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoAdministrador(idp);
                   listarVehiculoAdministrador.row(fila.parents('tr')).remove().draw();
                } else {
                    alert(data);
                }
            });
      });


      $(document).on("click", ".GuardarVehiculoI", function() {
        tipo_vehiculo = $('#tipo_vehiculoI').val();
        placa = $.trim($('#placaI').val());
        idp = $.trim($('#id_PVI').val());
        opcion="GuardarVehivculoPersona";
        if (tipo_vehiculo === "null" || placa === "") {
            swal("faltan datos por llenar", "", "error");
        } 
        else 
        {
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idp: idp, placa:placa, tipo_vehiculo: tipo_vehiculo}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoInstructor(idp);
                   $("#tipo_vehiculoI").val("null");
                   $("#placaI").val("");
                } else {
                    alert(data);
                }
            });
           
        }
    });

    $(document).on("click", ".EliminarVehiculoI", function() {
        idv = $(this).data("id");
        opcion="EliminarVehiculoPersona";
        fila = $(this);
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idv: idv}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoInstructor(idp);
                   listarVehiculoInstructor.row(fila.parents('tr')).remove().draw();
                } else {
                    alert(data);
                }
            });
      });


      $(document).on("click", ".GuardarVehiculoH", function() {
        tipo_vehiculo = $('#tipo_vehiculoH').val();
        placa = $.trim($('#placaH').val());
        idp = $.trim($('#id_PVH').val());
        opcion="GuardarVehivculoPersona";
        if (tipo_vehiculo === "null" || placa === "") {
            swal("faltan datos por llenar", "", "error");
        } 
        else 
        {
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idp: idp, placa:placa, tipo_vehiculo: tipo_vehiculo}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoHerramentero(idp);
                   $("#tipo_vehiculoH").val("null");
                   $("#placaH").val("");
                } else {
                    alert(data);
                }
            });
           
        }
    });

    $(document).on("click", ".EliminarVehiculoH", function() {
        idv = $(this).data("id");
        opcion="EliminarVehiculoPersona";
        fila = $(this);
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idv: idv}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoHerramentero(idp);
                   listarVehiculoHerramentero.row(fila.parents('tr')).remove().draw();
                } else {
                    alert(data);
                }
            });
      });


      $(document).on("click", ".GuardarVehiculoB", function() {
        tipo_vehiculo = $('#tipo_vehiculoB').val();
        placa = $.trim($('#placaB').val());
        idp = $.trim($('#id_PVB').val());
        opcion="GuardarVehivculoPersona";
        if (tipo_vehiculo === "null" || placa === "") {
            swal("faltan datos por llenar", "", "error");
        } 
        else 
        {
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idp: idp, placa:placa, tipo_vehiculo: tipo_vehiculo}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoBienestar(idp);
                   $("#tipo_vehiculoB").val("null");
                   $("#placaB").val("");
                } else {
                    alert(data);
                }
            });
           
        }
    });

    $(document).on("click", ".EliminarVehiculoB", function() {
        idv = $(this).data("id");
        opcion="EliminarVehiculoPersona";
        fila = $(this);
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: { opcion: opcion, idv: idv}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoBienestar(idp);
                   listarVehiculoBienestar.row(fila.parents('tr')).remove().draw();
                } else {
                    alert(data);
                }
            });
      });

      $(document).on("click", ".GuardarVehiculoAP", function() {
        tipo_vehiculo = $('#tipo_vehiculoAP').val();
        placa = $.trim($('#placaAP').val());
        idA = $.trim($('#id_AP').val());
        opcion="GuardarVehiculoAprendiz";
        if (tipo_vehiculo === "null" || placa === "") {
            swal("faltan datos por llenar", "", "error");
        } 
        else 
        {
            $.ajax({
                url: "app/controlador/AprendizControlador.php",
                type: "POST",
                data: { opcion: opcion, idA: idA, placa:placa, tipo_vehiculo: tipo_vehiculo}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoAprendiz(idA);
                   $("#tipo_vehiculoAP").val("null");
                   $("#placaAP").val("");
                } else {
                    alert(data);
                }
            });
           
        }
    });

    $(document).on("click", ".EliminarVehiculoAP", function() {
        idv = $(this).data("id");
        opcion="EliminarVehiculoAprendiz";
        fila = $(this);
            $.ajax({
                url: "app/controlador/AprendizControlador.php",
                type: "POST",
                data: { opcion: opcion, idv: idv}
            }).done(function(data) {
                if (data = 1) {
                   listarVehiculoAprendiz(idA);
                   listarVehiculoAprendiz.row(fila.parents('tr')).remove().draw();
                } else {
                    alert(data);
                }
            });
      });

      $("#programaReporte").change(function() {
        id_programa = $(this).val();
        llenarFichaPorPrograma(id_programa);
      });


    $(document).on("click", ".btnAcceso", function() {
       id_Instructor=$(this).data("id");
       $("#id_INSTRUCTOR").val(id_Instructor);
       $("#ModalAccesoProgramas").modal("show");
       opcion="ConsultarAcceso";
        $.ajax({
          url: "app/controlador/PersonaControlador.php",
          type: "POST",
          data: { opcion: opcion, idI:id_Instructor}
        }).done(function(data) {
           datos=JSON.parse(data);
           bienestar=datos.bienestar;
           horario=datos.horario;
           if(bienestar==1)
           {
              $("#acceso_bienestar").prop('checked', true);
           }
           else
           {
            $("#acceso_bienestar").prop('checked', false);
           }

           if(horario==1)
           {
              $("#acceso_horario").prop('checked', true);
           }
           else
           {
            $("#acceso_horario").prop('checked', false);
           }

         
        });
      
    });

    
    $(document).on("click", ".btnGuardarAcceso", function() {
        opcion="GuardarAcceso";
        b=$("#acceso_bienestar").is(':checked');
        h=$("#acceso_horario").is(':checked');
        idI=$("#id_INSTRUCTOR").val();
        bienestar=0;
        horario=0;
        if(b){ bienestar=1; }
        else{ bienestar=0; }
        if(h) { horario=1; }
        else { horario=0;  }
         $.ajax({
           url: "app/controlador/PersonaControlador.php",
           type: "POST",
           data: { opcion: opcion, bienestar:bienestar, horario:horario, idI:idI}
         }).done(function(data) {
            swal("DATOS GUARDADOS", "", "success");
            $("#ModalAccesoProgramas").modal("hide");
         });
    });

    $(document).on("click", ".btnEditarInvitado", function() {
        opcion="ConsultarInvitado";
        fila = $(this).closest("tr");
        numero_documento = parseInt(fila.find('td:eq(4)').text());
        telefono = parseInt(fila.find('td:eq(6)').text());
        $("#ModalEditInvitado").modal("show");
        id_invitado=$(this).data("id");
        $("#id_invitado").val(id_invitado);
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: { opcion: opcion, id_invitado:id_invitado}
          }).done(function(data) {
             datos=JSON.parse(data);
             $("#nombresIN").val(datos.nombres);
             $("#apellidosIN").val(datos.apellidos);
             $("#tipo_dcPIN").val(datos.tipo_documento);
             $("#numero_documentoIN").val(numero_documento);
             $("#telefonoIN").val(telefono);
          });
    });


    $('#EditarInvitado').submit(function(e) {
        e.preventDefault();
        id_invitado = $.trim($('#id_invitado').val());
        nombres = $.trim($('#nombresIN').val());
        apellidos = $.trim($('#apellidosIN').val());
        telefono = $.trim($('#telefonoIN').val());
        tipo_documento = $.trim($('#tipo_dcPIN').val());
        numero_documento = $.trim($('#numero_documentoIN').val());
        opcion = "ActualizarInvitado";

        if ((tipo_documento.trim() === 'null') ) {
            swal("faltan campos por llenar", "", "error");
        } else {
            $.ajax({
                url: "app/controlador/PersonaControlador.php",
                type: "POST",
                data: {id_invitado: id_invitado, opcion: opcion, tipo_documento: tipo_documento, numero_documento: numero_documento, nombres: nombres, apellidos: apellidos, telefono: telefono }
            }).done(function(data) {
                if (data == 1) {
                    $('#ModalEditInvitado').modal('hide');

                    swal("GUARDADO EXITOSAMENTE", "", "success");
                    contadorIN = 0;
                    tablaInvitados.ajax.reload(null, false);
                } else {
                    alert(data);
                }
            });
        }
    });


    $(document).on("click", ".btnEliminarInvitado", function () {
        id_invitado = $(this).data("id");
        opcion = "EliminarInvitado";
        fila = $(this);
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
                        url: "app/controlador/PersonaControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_invitado: id_invitado }
                    }).done(function (data) {
                        if (data = 1) {
                            tablaInvitados.row(fila.parents('tr')).remove().draw();
                            swal("DATOS ELIMINADOS", "", "success");
                        } else {
                            alert(data);
                        }
                    });

                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });





});