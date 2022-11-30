$(document).ready(function () {
    var opcion;
    var fila; 
    var contadorF=0;
    var contadorO=0;
    var contadorORD=0;
    var contadorRD=0;
    var  contadorRPB =0;
    var  contadorFH =0;
    function tablaObservacion(id_proceso) 
    {
        var tablaObservacion = $('#tablaObservacion').DataTable({ retrieve: true, paging: false });
           tablaObservacion.destroy();
           tablaObservacion = $('#tablaObservacion').DataTable({
           "ajax": {
                "url": "app/controlador/FidelizacionControlador.php",
                "method": 'POST', 
                "data": { opcion:"ListarObservacion", id_proceso:id_proceso}, 
                "dataSrc": ""
            },
            "columns": [
                {
                    data: null, render: function ( data, type, row ) {
                        contadorO=contadorO+1;
                        return "<b>"+contadorO+"</b>";
                    }
                },
                { "data": "fecha_observacion"},
                { "data": "hora_observacion"},
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="VER OBSERVACION"  ><button type="button"  class="btn btn-secondary btnVerObservacion" data-id='+data.id_observacion+' ><i class="bi bi-eye"></i></button></i>';
                    }
                },
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="EDITAR OBSERVACION" ><button type="button" class="btn btn-primary btnEditarObservacion" data-id='+data.id_observacion+'><i class="bi bi-pencil-square"></i></button></i>';
                    }
                },
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="ELIMINAR OBSERVACION" ><button type="button" data-id='+data.id_observacion+' class="btn btn-danger  btnEliminarObservacion" ><i class="bi bi-trash"></i></button></i>';
                    }
                }
            ]
            });
    }
     
    function tablaObservacionRD(id_proceso) 
    {
        var tablaObservacionRD = $('#tablaObservacionRD').DataTable({ retrieve: true, paging: false });
           tablaObservacionRD.destroy();
           tablaObservacionRD = $('#tablaObservacionRD').DataTable({
           "ajax": {
                "url": "app/controlador/FidelizacionControlador.php",
                "method": 'POST', 
                "data": { opcion:"ListarObservacionRD", id_proceso:id_proceso}, 
                "dataSrc": ""
            },
            "columns": [
                {
                    data: null, render: function ( data, type, row ) {
                        contadorORD=contadorORD+1;
                        return "<b>"+contadorORD+"</b>";
                    }
                },
                { "data": "fecha_observacion"},
                { "data": "hora_observacion"},
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="VER OBSERVACION"  ><button type="button"  class="btn btn-secondary btnVerObservacionRD" data-id='+data.id_observacion+' ><i class="bi bi-eye"></i></button></i>';
                    }
                },
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="EDITAR OBSERVACION" ><button type="button" class="btn btn-primary btnEditarObservacionRD" data-id='+data.id_observacion+'><i class="bi bi-pencil-square"></i></button></i>';
                    }
                },
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="ELIMINAR OBSERVACION" ><button type="button" data-id='+data.id_observacion+' class="btn btn-danger  btnEliminarObservacionRD" ><i class="bi bi-trash"></i></button></i>';
                    }
                }
            ]
            });
    }

    var tablaFidelizacion = $('#tablaFidelizacion').DataTable({ retrieve: true, paging: false });
    tablaFidelizacion.destroy();
    tablaFidelizacion = $('#tablaFidelizacion').DataTable({
        "ajax": {
            "url": "app/controlador/FidelizacionControlador.php",
            "method": 'POST', 
            "data": { opcion:"ListarFidelizacion"}, 
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function ( data, type, row ) {
                    contadorF=contadorF+1;
                    return "<b>"+contadorF+"</b>";
                }
             },
            { "data": "numero_documento"},
            {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return data.nombres+" "+data.apellidos;
                }
             },
             {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return data.nombre_instructor+" "+data.apellidos_instructor;
                }
             },
            { "defaultContent":  '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="DATOS APRENDIZ" ><button type="button" class="btn btn-primary btnVerAprendizFidelizacion"  ><i class="bi bi-eye"></i></button></i>' },
            {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="REGISTRAR PROCESO" ><button type="button" class="btn btn-secondary  btnRegistrarProcesoFidelizacion"  data-id="'+data.id_proceso+'" ><i class="bi bi-folder"></i></button></i>';
                }
             },
             {
                data: null, render: function ( data, type, row ) {
                    if(data.id_bienestar==0)
                    {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="LISTADO DE OBSERVACIONES" ><button type="button" data-id="'+data.id_proceso+'" class="btn btn-success btnListarObservacionesFidelizacion" disabled><i class="bi bi-table"></i></button></i>';
                    }
                    else
                    {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="LISTADO DE OBSERVACIONES" ><button type="button" data-id="'+data.id_proceso+'" class="btn btn-success btnListarObservacionesFidelizacion" ><i class="bi bi-table"></i></button></i>';
                    }
                }
             },
             {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="CERRAR PROCESO" ><button type="button" data-id="'+data.id_proceso+'" class="btn btn-danger btnCerrarFidelizacion" ><i class="bi bi-trash"></i></button></i>';
                }
             }
        ]
    });


    var tablaReporteDisciplinario = $('#tablaReporteDisciplinario').DataTable({ retrieve: true, paging: false });
    tablaReporteDisciplinario.destroy();
    tablaReporteDisciplinario = $('#tablaReporteDisciplinario').DataTable({
        "ajax": {
            "url": "app/controlador/FidelizacionControlador.php",
            "method": 'POST', 
            "data": { opcion:"ListarReporteDisciplinario"}, 
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function ( data, type, row ) {
                    contadorRD=contadorRD+1;
                    return "<b>"+contadorRD+"</b>";
                }
             },
            { "data": "numero_documento"},
            {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return data.nombres+" "+data.apellidos;
                }
             },
             {"data": "celular"},
             {"data":  "tipo"},
             {"data":  "motivo"},
            { "defaultContent":  '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="DATOS APRENDIZ" ><button type="button" class="btn btn-primary btnVerAprendizRD" ><i class="bi bi-eye"></i></button></i>' },
            {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="LISTADO DE OBSERVACIONES" ><button type="button" data-id="'+data.id_proceso+'" class="btn btn-success btnListarObservacionesRD"><i class="bi bi-table"></i></button></i>';
                }
                
             },
             {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="CERRAR PROCESO" ><button type="button" data-id="'+data.id_proceso+'" class="btn btn-danger btnCerrarCasoRD" ><i class="bi bi-trash"></i></button></i>';
                }
             }
        ]
    });



    var tablaHistorialFidelizacion = $('#tablaHistorialFidelizacion').DataTable({ retrieve: true, paging: false });
    tablaHistorialFidelizacion.destroy();
    tablaHistorialFidelizacion = $('#tablaHistorialFidelizacion').DataTable({
        "ajax": {
            "url": "app/controlador/FidelizacionControlador.php",
            "method": 'POST', 
            "data": { opcion:"ListarHistorialFidelizacion"}, 
            "dataSrc": ""
        }, 
        "columns": [
            {
                data: null, render: function ( data, type, row ) {
                    contadorFH=contadorFH+1;
                    return "<b>"+contadorFH+"</b>";
                }
             },
             {
                data: null, render: function ( data, type, row ) {
                    return data.nombres+" "+data.apellidos;
                }
             },
            { "data": "programa"},
            { "data": "ficha"},
            {
                data: null, render: function ( data, type, row ) {
                    if(data.estado=="ABIERTO")
                    {
                      return '<b style="color:green;">ABIERTO</b>';
                    }
                    else
                    {
                     return '<b style="color:red;">CERRADO</b>';
                    }
                }
             },
            { "data": "fecha_creacion"},
            {
                data: null, render: function ( data, type, row ) {
                    if(data.fecha_cierre_bienestar=="0000-00-00")
                    {
                      return data.fecha_cierre_sistema;
                    }
                    else
                    {
                        return data.fecha_cierre_bienestar;
                    }
                }
             },
            { "data": "motivo_cierre"},
            {
                data: null, render: function ( data, type, row ) {
                    // Combinar campos
                    return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="VER DETALLES" ><button type="button" class="btn btn-primary btnVerDetallesCaso" data-id="'+data.id_fidelizacion+'" ><i class="bi bi-eye"></i></button></i>';
                }
             },
        ]
    });

  
    

    $(document).on("click",".btnVerAprendizFidelizacion", function()
    {
           $("#ModalDatosAprendiz").modal("show");
           fila = $(this).closest("tr");
           numero_documento = parseInt(fila.find('td:eq(1)').text()); 
           opcion="ListarFidelizacionAprendiz";
           envio=0;
           $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, numero_documento: numero_documento, envio:envio}
           }).done( function (data){
             var datos = JSON.parse(data);
             $("#tipo_documento_fidelizacion").text(datos.tipo_documento);
             $("#numero_documento_fidelizacion").text(numero_documento);
             $("#nombres_fidelizacion").text(datos.nombres);
             $("#apellidos_fidelizacion").text(datos.apellidos);
             $("#direccion_fidelizacion").text(datos.direccion);
             $("#telefono_fidelizacion").text(datos.celular);
             $("#correo_fidelizacion").text(datos.correo);
             $("#programa_fidelizacion").text(datos.nombre_programa);
             $("#ficha_fidelizacion").text(datos.ficha);
           });
    });

    $(document).on("click",".btnRegistrarProcesoFidelizacion", function()
    {
           $("#ModalRegistrarProcesoFidelizacion").modal("show");
           id_proceso = $(this).data('id');
           $("#id_proceso").val(id_proceso);
           fila = $(this).closest("tr");
           numero_documento = parseInt(fila.find('td:eq(1)').text()); 
           opcion="ListarFidelizacionAprendiz";
           nombre_completo="";
           progarma_ficha="";
           $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, numero_documento: numero_documento}
           }).done( function (data){
             var datos = JSON.parse(data);
             nombre_completo=datos.nombres+" "+datos.apellidos;
             progarma_ficha=datos.nombre_programa+" "+datos.ficha;
             $("#tp_proceso").text(datos.tipo_documento);
             $("#numero_documento_proceso").text(numero_documento);
             $("#nombre_proceso").text(nombre_completo);
             $("#programa_ficha_proceso").text(progarma_ficha);
           });
    });

    $('#RegistrarProcesoFidelizacion').submit(function (e)
    {
        e.preventDefault();
        opcion="GuardarProcesoFidelizacion";
        descripcion= $('#descripcion_proceso').val();
        id_proceso= $('#id_proceso').val();
        id_bienestar= $('#id_bienestar').val();
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_proceso: id_proceso, id_bienestar: id_bienestar, descripcion: descripcion}
        }).done (function (data)
        {
            if(data==1)
            {
                $('#ModalRegistrarProcesoFidelizacion').modal('hide');
                $("#ModalRegistrarProcesoFidelizacion").find("textarea,select").val("");
                swal("DATOS GUARDADOS", "", "success");
                tablaFidelizacion.ajax.reload(null, false);
            }
            else
            {
                swal("ACTUALMENTE HAY UN PROCESO ABIERTO NO SE PUEDE CREAR OTRO", "", "error");
            }
        });        
    });



    
    $(document).on("click",".btnListarObservacionesFidelizacion", function()
    {
          $("#LISTOBS").show();
          $("#ModalListarObservacionFidelizacion").modal("show");
           fila = $(this).closest("tr");
           nombre_aprendiz = fila.find('td:eq(2)').text(); 
           $("#aprendiz_titulo").text(nombre_aprendiz);
           id_proceso= $(this).data("id");
           $("#id_proceso_observacion").val(id_proceso);
           tablaObservacion(id_proceso);
           contadorO=0;
    });

    
  
    
    $('#ListarObservacionFidelizacion').submit(function (e)
    {
        e.preventDefault();
        opcion="GuardarObservacion";
        descripcion_observacion= $('#descripcion_observacion').val();
        id_proceso= $('#id_proceso_observacion').val();
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_proceso: id_proceso, descripcion_observacion: descripcion_observacion}
        }).done (function (data)
        {
            if(data==1)
            {
                $('#descripcion_observacion').val("");
                swal("DATOS GUARDADOS", "", "success");
                tablaObservacion(id_proceso);
                contadorO=0;
                tablaObservacion.ajax.reload(null, false);
               
            }
            else
            {
               alert(data);
            }
        });        
    });


    $(document).on("click",".btnVerObservacion", function()
    {
        fila = $(this).closest("tr");
        numero = fila.find('td:eq(0)').text();
        $('#numero_observacion').text(numero);
        id_descripcion=$(this).data("id");
        opcion="ConsultarObservacion";
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_descripcion:id_descripcion}
        }).done (function (res){
            
            var datos = JSON.parse(res);
            $('#vista_descripcion').text(datos.texto_observacion);
            $('#ModalVerObservacionFidelizacion').modal('show');
        });        
    });


    $(document).on("click",".btnEditarObservacion", function()
    {
        fila = $(this).closest("tr");
        numero = fila.find('td:eq(0)').text();
        $('#numero_observacione').text(numero);
        id_descripcion=$(this).data("id");
        $('#id_descripcion').val(id_descripcion);
        opcion="ConsultarObservacion";
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_descripcion:id_descripcion}
        }).done (function (res){
            
            var datos = JSON.parse(res);
            $('#descripcion_observacione').val(datos.texto_observacion);
            $('#ModalEditObservacionFidelizacion').modal('show');
        });        
    });




    $('#EditarObservacion').submit(function (e)
    {
        e.preventDefault();
        opcion="ActualizarObservacion";
        descripcion_observacione= $('#descripcion_observacione').val();
        id_descripcion= $('#id_descripcion').val();
        id_proceso= $('#id_proceso_observacion').val();
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_descripcion: id_descripcion, descripcion_observacione: descripcion_observacione}
        }).done (function (data)
        {
            if(data==1)
            {
                $('#descripcion_observacione').val("");
                $('#ModalEditObservacionFidelizacion').modal('hide');
                swal("DATOS GUARDADOS", "", "success");
                tablaObservacion(id_proceso);
                contadorO=0;
                tablaObservacion.ajax.reload(null, false);
            }
            else
            {
               alert(data);
            }
        });        
    });


    $(document).on("click", ".btnEliminarObservacion", function () {
        opcion = "EliminarObservacion";
        id_proceso= $('#id_proceso_observacion').val();
        id_descripcion=$(this).data("id");
        fila = $(this);
        swal({
            title: "Estas Seguro De Eliminar ",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete)
            {
                $.ajax({
                    url: "app/controlador/FidelizacionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_descripcion: id_descripcion}
                 }).done (function (data) {
                    if(data==3)
                    {
                      
                        swal("DATOS ELIMINADOS", "", "success");
                        tablaObservacion(id_proceso);
                        contadorO=0;
                        tablaObservacion.row(fila.parents('tr')).remove().draw(); 
                    }
                    else
                    {
                       alert(data);
                    }
                });
            } else {
                swal("CANCELADO", "", "error");
            }
          });
    });


    $('#CerrarCaso').submit(function (e)
    {
        fila = $(this);
        e.preventDefault();
        opcion="CerrarCaso";
        motivo_cierre=$('#motivo_cierre').val();
        url=$('#url_excusa').val();
        id_proceso= $('#id_proceso_cerrar').val();
        if(motivo_cierre==="null")
        {
            swal("No ha seleccionado una opcion", "", "error");
        }
        else
        {
            $.ajax({
                url: "app/controlador/FidelizacionControlador.php",
                type: "POST",
                data: { opcion: opcion, motivo_cierre:motivo_cierre, url:url, id_proceso:id_proceso }
            }).done(function (data) {
                if (data == 1) {
                    swal("EL CASO HA SIDO CERRADO", "", "success");
                    $('#ModalCerrarCasoFidelizacion').modal('hide');
                    $('#url_excusa').val('');
                    $('#motivo_cierre').val('null');
                    contadorF=0;
                    contadorFH=0;
                    tablaFidelizacion.ajax.reload(null, false);
                    tablaHistorialFidelizacion.ajax.reload(null, false);
                }
                else {
                    alert(data);
                }
            });     
          
        }
    });


    $(document).on("click", ".btnCerrarFidelizacion", function () {
        $("#ModalCerrarCasoFidelizacion").modal("show");
       id_proceso=$(this).data("id");
       $("#id_proceso_cerrar").val(id_proceso);
    });
  

    $(document).on("click",".btnVerAprendizRD", function()
    {
        $("#ModalDatosAprendiz").modal("show");
           fila = $(this).closest("tr");
           numero_documento = parseInt(fila.find('td:eq(1)').text()); 
           opcion="ListarFidelizacionAprendiz";
           envio=1;
          
           $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, numero_documento: numero_documento, envio:envio}
           }).done( function (data){
             var datos = JSON.parse(data);
             $("#tipo_documento_fidelizacion").text(datos.tipo_documento);
             $("#numero_documento_fidelizacion").text(numero_documento);
             $("#nombres_fidelizacion").text(datos.nombres);
             $("#apellidos_fidelizacion").text(datos.apellidos);
             $("#direccion_fidelizacion").text(datos.direccion);
             $("#telefono_fidelizacion").text(datos.celular);
             $("#correo_fidelizacion").text(datos.correo);
             $("#programa_fidelizacion").text(datos.nombre_programa);
             $("#ficha_fidelizacion").text(datos.ficha);
             $("#motivo_reporte").text(datos.motivo_envio);
           });
    });

    $(document).on("click",".btnListarObservacionesRD", function()
    {
           $("#ModalListarObservacionRD").modal("show");
           fila = $(this).closest("tr");
           nombre_aprendiz = fila.find('td:eq(2)').text(); 
           $("#aprendiz_tituloRD").text(nombre_aprendiz);
           id_proceso= $(this).data("id");
           $("#id_proceso_observacionRD").val(id_proceso);
           tablaObservacionRD(id_proceso);
           contadorORD=0;
    });


    $('#ListarObservacionRD').submit(function (e)
    {
        e.preventDefault();
        opcion="GuardarObservacionRD";
        descripcion_observacion= $('#descripcion_observacion').val();
        id_proceso= $('#id_proceso_observacionRD').val();
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_proceso: id_proceso, descripcion_observacion: descripcion_observacion}
        }).done (function (data)
        {
            if(data==1)
            {
                $('#descripcion_observacion').val("");
                swal("DATOS GUARDADOS", "", "success");
                tablaObservacionRD(id_proceso);
                contadorORD=0;
                tablaObservacionRD.ajax.reload(null, false);
               
            }
            else
            {
               alert(data);
            }
        });        
    });


    
    $(document).on("click",".btnVerObservacionRD", function()
    {
        fila = $(this).closest("tr");
        numero = fila.find('td:eq(0)').text();
        $('#numero_observacion').text(numero);
        id_descripcion=$(this).data("id");
        opcion="ConsultarObservacionRD";
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_descripcion:id_descripcion}
        }).done (function (res){
            
            var datos = JSON.parse(res);
            $('#vista_descripcion').text(datos.texto_observacion);
            $('#ModalVerObservacionRD').modal('show');
        });        
    });


    $(document).on("click",".btnEditarObservacionRD", function()
    {
        fila = $(this).closest("tr");
        numero = fila.find('td:eq(0)').text();
        $('#numero_observacione').text(numero);
        id_descripcion=$(this).data("id");
        $('#id_descripcion').val(id_descripcion);
        opcion="ConsultarObservacionRD";
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_descripcion:id_descripcion}
        }).done (function (res){
            
            var datos = JSON.parse(res);
            $('#descripcion_observacione').val(datos.texto_observacion);
            $('#ModalEditObservacionRD').modal('show');
        });        
    });


    
    $('#EditarObservacionRD').submit(function (e)
    {
        e.preventDefault();
        opcion="ActualizarObservacionRD";
        descripcion_observacione= $('#descripcion_observacione').val();
        id_descripcion= $('#id_descripcion').val();
        id_proceso= $('#id_proceso_observacionRD').val();
        $.ajax({
            url: "app/controlador/FidelizacionControlador.php",
            type: "POST",
            data: {opcion: opcion, id_descripcion: id_descripcion, descripcion_observacione: descripcion_observacione}
        }).done (function (data)
        {
            if(data==1)
            {
                $('#descripcion_observacione').val("");
                $('#ModalEditObservacionRD').modal('hide');
                swal("DATOS GUARDADOS", "", "success");
                tablaObservacionRD(id_proceso);
                contadorORD=0;
                tablaObservacionRD.ajax.reload(null, false);
            }
            else
            {
               alert(data);
            }
        });        
    });


    $(document).on("click", ".btnEliminarObservacionRD", function () {
        opcion = "EliminarObservacionRD";
        id_proceso= $('#id_proceso_observacionRD').val();
        id_descripcion=$(this).data("id");
        fila = $(this);
        swal({
            title: "Estas Seguro De Eliminar ",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete)
            {
                $.ajax({
                    url: "app/controlador/FidelizacionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_descripcion: id_descripcion}
                 }).done (function (data) {
                    if(data==3)
                    {
                      
                        swal("DATOS ELIMINADOS", "", "success");
                        tablaObservacionRD(id_proceso);
                        contadorORD=0;
                        tablaObservacionRD.row(fila.parents('tr')).remove().draw(); 
                    }
                    else
                    {
                       alert(data);
                    }
                });
            } 
          });
    });



    $('#CerrarCasoRD').submit(function (e)
    {
        fila = $(this);
        e.preventDefault();
        opcion="CerrarCasoRD";
        motivo_cierre=$('#motivo_cierreRD').val();
        url=$('#url_excusa').val();
        id_proceso= $('#id_proceso_cerrar').val();
        if(motivo_cierre==="null")
        {
            swal("No ha seleccionado una opcion", "", "error");
        }
        else
        {
            $.ajax({
                url: "app/controlador/FidelizacionControlador.php",
                type: "POST",
                data: { opcion: opcion, motivo_cierre:motivo_cierre, url:url, id_proceso:id_proceso }
            }).done(function (data) {
                if (data == 1) {
                    swal("EL CASO HA SIDO CERRADO", "", "success");
                    $('#ModalCerrarCasoRD').modal('hide');
                    $('#url_excusa').val('');
                    $('#motivo_cierre').val('null');
                    contadorRD=0;
                    tablaReporteDisciplinario.ajax.reload(null, false);
                }
                else {
                    alert(data);
                }
            });     
          
        }
    });

    $(document).on("click", ".btnCerrarCasoRD", function () {
        $("#ModalCerrarCasoRD").modal("show");
        id_proceso=$(this).data("id");
        $("#id_proceso_cerrar").val(id_proceso);
     });

     $("#periodoC").change(function() {
        periodo = $(this).val();
        if (periodo == "2") {
            $("#fiC").show();
            $("#ffC").show();
        } else {
            $("#fiC").hide();
            $("#ffC").hide();
        }
    });

    function llenarTablaReporteBienestar(ListadoReporte) {
        var tablaReporteBienestar = $('#tablaReportesBienestar').DataTable({ retrieve: true, paging: false });
        tablaReporteBienestar.destroy();
        contadorRPB = 0;
        $('#tablaReportesBienestar').DataTable({
            data: ListadoReporte,
            "columns": [{
                    data: null,
                    render: function(data, type, row) {
                        contadorRPB = contadorRPB + 1;
                        return "<b>" + contadorRPB + "</b>";
                    }
                },
                { "data": "fecha" },
                {
                    data: null,
                    render: function(data, type, row) {
                       return data.nombres+" "+data.apellidos;
                    }
                },
                { "data": "programa" },
                { "data": "ficha" },
                {
                    data: null,
                    render: function(data, type, row) {
                       if(data.estado=="ABIERTO")
                       {
                         return '<b style="color:green;">ABIERTO</b>';
                       }
                       else
                       {
                        return '<b style="color:red;">CERRADO</b>';
                       }
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                       return "INASISTENCIA";
                    }
                }
               
            ]
        });
    }

    $(document).on("click", "#buscarC", function () {
        tipo_caso = $('#Tcaso').val();
        periodo = $('#periodoC').val();
        fechaI = $('#FechaInicialC').val();
        fechaF = $('#FechaFinalC').val();
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

        if(tipo_caso=="null" || periodo=="null")
        {
            swal("FALTAN CAMPOS POR LLENAR", "", "error");
        }
        else
        {
            if(tipo_caso=="FIDELIZACION" && periodo==1)
            {
                opcion="ListarReporteFidelizacionHoy";
                $.ajax({
                    url: "app/controlador/FidelizacionControlador.php",
                    type: "POST",
                    data: {opcion: opcion}
                }).done (function (data)
                {
                    if (data == 1) {
                        swal("No se Encontraron Datos Para esta Consulta", "", "warning");
                    }
                    else
                    {
                        datos=JSON.parse(data);
                        llenarTablaReporteBienestar(datos);
                    }
                });      
            }
            else if(tipo_caso=="FIDELIZACION" && periodo==2)
            {
                opcion="ListarReporteFidelizacionEntreFechas";
                $.ajax({
                    url: "app/controlador/FidelizacionControlador.php",
                    type: "POST",
                    data: {opcion: opcion, fechaI:fechaI, fechaF:fechaF}
                }).done (function (data)
                {
                    if (data == 1) {
                        swal("No se Encontraron Datos Para esta Consulta", "", "warning");
                    }
                    else
                    {
                        datos=JSON.parse(data);
                        llenarTablaReporteBienestar(datos);
                    }
                });   
            }
        }
     });
    
     $(document).on("click",".btnVerDetallesCaso", function()
     {
            $("#LISTOBS").hide();
            $("#ModalListarObservacionFidelizacion").modal("show");
            fila = $(this).closest("tr");
            nombre_aprendiz = fila.find('td:eq(1)').text(); 
            $("#aprendiz_titulo").text(nombre_aprendiz);
            id_proceso= $(this).data("id");
            $("#id_proceso_observacion").val(id_proceso);
            tablaObservacion(id_proceso);
            contadorO=0;
     });




     
});
    






