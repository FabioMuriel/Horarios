$(document).ready(function () {
    var id_sedeA=$("#id_sedeA").val();
    var cargoU=$("#cargoU").val();
    var opcion;
    var fila; 
    var contadorR=0;
    var contadorC=0;
    var contadorS=0;
    var contadorP=0;
    var contadorF=0;
    var contadorFVSI=0;
    var contadorSALON=0;
    var contadorCOMPETENCIA=0;
    var contadorRESULTADOS=0;
    var casoCentro=0;
    var casoSede=0;
    var regionalSelect='<option value="null" >---SELECCIONE---</option>';
    var centroSelect='<option value="null" >---SELECCIONE---</option>';
    var sedeSelect='<option value="null" >---SELECCIONE---</option>';
    var programaSelect='<option value="null" >---SELECCIONE---</option>';
    var fvsiSelect='<option value="null" >---SELECCIONE---</option>';
    var instructorSelect='<option value="null" >---SELECCIONE---</option>';
    var CompetenciaSelect='<option value="null" >---SELECCIONE---</option>';
    var SalonSelect='<option value="null" >---SELECCIONE---</option>';
    var ResultadoSelect='<option value="null" >---SELECCIONE---</option>';
    var sgpprogramasSelect='<option value="null" >---SELECCIONE---</option>';
    var CodigoSelect='<option value="null" >---SELECCIONE---</option>';
    var ProgramSelect='<option value="null" >---SELECCIONE---</option>';
    ProgramSelect2='<option value="null" >---SELECCIONE---</option>';


    //Funcion para llenar competencias segun el programa
    function llenarCompetenciaFicha()
    {
        ficha_horario = $("#id_compe").val();
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: 'json',
            data: {opcion: "llenarcompetencias", ficha_horario: ficha_horario}
        }).done(function(res){
            var datos = JSON.parse(res);
            $.each(datos, function(i, item){
                CompetenciaSelect +=' <option value="'+datos[i].tbl_id+'" >'+datos[i].nombre_competencia+'</option>';
            });
            $("#competencia_horario").html(CompetenciaSelect).selectpicker('refresh');
            $("#regional_programa").html(regionalSelect).selectpicker('refresh');
            CompetenciaSelect ='<option value="null" >--SELECCIONE--</option>';
        })
    }
    
    function llenarSalon() 
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarSalon" }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            SalonSelect +=' <option value="'+datos[i].id_salon+'" >'+datos[i].nombre_salon+'</option>';
          });
          $("#salon_horario").html(SalonSelect);
          $("#salon_CH").html(SalonSelect);

        });
         
    }
    
    //Funcion para llenar los resultados segun la competencia
    function llenarResultados(id_competencia)
    {
         $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'POST',
            datatype: "json",
            data: {opcion: "ListarResultados", id_competencia: id_competencia}
        }).done(function (res) {
            var datos = JSON.parse(res);
            $.each(datos, function(i, item) {
                ResultadoSelect += ' <option value ="'+ datos[i].codigo_resultado+'" >'+datos[i].resultado_NOMBRE+'</option>';
            });
            $("#resultado_horario").html(ResultadoSelect).selectpicker('refresh');
            ResultadoSelect ='<option value="null" >--SELECCIONE--</option>';


        });
    }
      
    function llenarRegional(regionalSelect) 
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarRegional" }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            regionalSelect +=' <option value="'+datos[i].id_regional+'" >'+datos[i].nombre_regional+'</option>';
          });
          $("#regional").html(regionalSelect).selectpicker('refresh');
          $("#regionale").html(regionalSelect);
          $("#regional_sede").html(regionalSelect).selectpicker('refresh');
          $("#regional_programa").html(regionalSelect).selectpicker('refresh');
          $("#regional_ficha").html(regionalSelect).selectpicker('refresh');
          $("#regional_aprendizA").html(regionalSelect);
          $("#regionalP").html(regionalSelect);
          $("#regional_fvsi").html(regionalSelect).selectpicker('refresh');
          $("#regional_salon").html(regionalSelect).selectpicker('refresh');
          $("#regional_competencia").html(regionalSelect).selectpicker('refresh');
        });   
    }
    //llenar los select de centro para el modal de agregar
    function llenarCentroAgregar(id_regional)
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarCentroPorRegional",id_regional:id_regional }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            centroSelect +=' <option value="'+datos[i].id_centro+'" >'+datos[i].nombre_centro+'</option>';
          });
          $("#centro_sede").html(centroSelect).selectpicker('refresh');
          $("#centro_programa").html(centroSelect).selectpicker('refresh');
          $("#centro_ficha").html(centroSelect).selectpicker('refresh');
          $("#centroP").html(centroSelect);
          $("#centro_fvsi").html(centroSelect).selectpicker('refresh');
          $("#centro_salon").html(centroSelect).selectpicker('refresh');
          $("#centro_competencia").html(centroSelect).selectpicker('refresh');
          centroSelect='<option value="null" >--SELECCIONE--</option>';
        });  
    }
    //Funcion para cargar los programas en el modal agregar competencias
    function CargarProgramas(){
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"CargarProgramas",id_sedeA:id_sedeA}
        }).done(function (res){
            var datos = JSON.parse(res);
            $.each(datos, function(i, item){
                ProgramSelect +=' <option value="'+datos[i].id_programa+'" >'+datos[i].nombre_programa+'</option>';
            });
            $("#programa_competencia").html(ProgramSelect).selectpicker('refresh');
            ProgramSelect='<option value="null" >--SELECCIONE--</option>';
        });
    }

     // llenar los select de centro para el modal editar
    function llenarCentroEditar(casoCentro,id_regional)
    {
        if(casoCentro==0)
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: {opcion:"ListarCentro" }
            }).done(function (res) {
              var datos = JSON.parse(res);
              $.each(datos, function(i, item) {
                centroSelect +=' <option value="'+datos[i].id_centro+'" >'+datos[i].nombre_centro+'</option>';
              });
              $("#centro_aprendizA").html(centroSelect);
             
              centroSelect='<option value="null" >--SELECCIONE--</option>';
            });  
        }
        else
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: {opcion:"ListarCentroPorRegional",id_regional:id_regional }
            }).done(function (res) {
              var datos = JSON.parse(res);
              $.each(datos, function(i, item) {
                centroSelect +=' <option value="'+datos[i].id_centro+'" >'+datos[i].nombre_centro+'</option>';
              });
              $("#centro_aprendizA").html(centroSelect);
              centroSelect='<option value="null" >--SELECCIONE--</option>';
            });  
        }
    }

    //llenar select sede
    function llenarSedeAgregar(id_centro) 
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarSedePorCentro",id_centro:id_centro }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            sedeSelect +=' <option value="'+datos[i].id_sede+'" >'+datos[i].nombre_sede+'</option>';
          });
          $("#sede_programa").html(sedeSelect).selectpicker('refresh');
          $("#sede_ficha").html(sedeSelect).selectpicker('refresh');
          $("#sedeP").html(sedeSelect);
          $("#sede_fvsi").html(sedeSelect).selectpicker('refresh');
          $("#sede_salon").html(sedeSelect).selectpicker('refresh');
          $("#sede_competencia").html(sedeSelect).selectpicker('refresh');
          sedeSelect='<option value="null" >--SELECCIONE--</option>';
        });
    }

    function llenarSedeEditar(casoSede,id_centro)
    {
        if(casoSede==0)
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: {opcion:"ListarSede" }
            }).done(function (res) {
              var datos = JSON.parse(res);
              $.each(datos, function(i, item) {
                sedeSelect +=' <option value="'+datos[i].id_sede+'" >'+datos[i].nombre_sede+'</option>';
              });
              $("#sede_aprendizA").html(sedeSelect);
              sedeSelect='<option value="null" >--SELECCIONE--</option>';
            });  
        }
        else
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: 'post',
                datatype: "json",
                data: {opcion:"ListarSedePorCentro",id_centro:id_centro }
            }).done(function (res) {
              var datos = JSON.parse(res);
              $.each(datos, function(i, item) {
                sedeSelect +=' <option value="'+datos[i].id_sede+'" >'+datos[i].nombre_sede+'</option>';
              });
              $("#sede_aprendizA").html(sedeSelect);
              sedeSelect='<option value="null" >--SELECCIONE--</option>';
            });  
        }
    }

    function llenarProgramaAgregar(id_sede)
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarProgramaPorsede",id_sede:id_sede }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            programaSelect +=' <option value="'+datos[i].id_programa+'" >'+datos[i].nombre_programa+'</option>';
          });
          $("#programa_ficha").html(programaSelect).selectpicker('refresh');
          $("#programa_horario").html(programaSelect).selectpicker('refresh');
          programaSelect='<option value="null" >--SELECCIONE--</option>';
        });
    }

    function llenarProgramaReporte()
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarPrograma",id_sedeA:id_sedeA,cargoU:cargoU}
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            programaSelect +=' <option value="'+datos[i].id_programa+'" >'+datos[i].nombre_programa+'</option>';
          });
          $("#programaReporte").html(programaSelect);
          programaSelect='<option value="null" >--SELECCIONE--</option>';
        });
    }
//esto es agregar horario
    function llenarFichaPorSede()
    {
        id = $("#programa_horario").val();
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarFichaPorSede", id: id }
        }).done(function (res) {
            var datos = JSON.parse(res);
            $.each(datos, function (i, item) {
                fvsiSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha +" - "+datos[i].grupo+'</option>';
                $("#id_compe").val(datos[i].id_programa);
            });
            $("#ficha_horario").html(fvsiSelect).selectpicker('refresh');
            fvsiSelect = '<option value="null" >--SELECCIONE--</option>';

        });
    }
    // esto carga las fichas 
       function llenarFichaPorSedeA(id_sede)
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarFichaPorSedeA", id_sede: id_sede }
        }).done(function (res) {
            var datos = JSON.parse(res);
            $.each(datos, function (i, item) {
                fvsiSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha +" - "+datos[i].grupo+'</option>';
            });
             $("#ficha_fvsi").html(fvsiSelect).selectpicker('refresh');
            fvsiSelect = '<option value="null" >--SELECCIONE--</option>';
        });
    }
    //Funcion para cargar las fichas para imprimir
    function llenarFichaPorSedeImprimir(id_sedeA)
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarFichaPorSedeImprimir", id_sedeA: id_sedeA}
        }).done(function (res) {
            var datos = JSON.parse(res);
            $.each(datos, function (i, item) {
                fvsiSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha +" - "+datos[i].grupo+'</option>';
            });
             $("#ficha_CH").html(fvsiSelect).selectpicker('refresh');
            fvsiSelect = '<option value="null" >--SELECCIONE--</option>';
        });
    }

    //

    function llenarFichaPorSedeEditar(id_sede,id_ficha)
    {
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { opcion: "ListarFichaPorSede", id_sede: id_sede }
        }).done(function (res) {
            var datos = JSON.parse(res);
            $.each(datos, function (i, item) {
                fvsiSelect += ' <option value="' + datos[i].id_ficha + '" >' + datos[i].codigo_ficha +" - "+datos[i].grupo+'</option>';
            });
            $("#ficha_fvsiE").html(fvsiSelect);
            $("#ficha_fvsiE").val(id_ficha);
            fvsiSelect = '<option value="null" >--SELECCIONE--</option>';
        });
    }

    function llenarInstructorPorSede(id_sede)
    {
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarpersonaPorSede", id_sede:id_sede }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $.each(datos, function(i, item) {
            instructorSelect +=' <option value="'+datos[i].id_persona+'" >'+datos[i].nombres+" "+datos[i].apellidos+'</option>';
          });
         
          $("#instructor_fvsi").html(instructorSelect).selectpicker('refresh');
          $("#instructor_horario").html(instructorSelect).selectpicker('refresh');
          $("#instructor_CH").html(instructorSelect);
          instructorSelect='<option value="null" >--SELECCIONE--</option>';
        });  
     }

     
    function llenarInstructorEditar()
    {
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ListarPersona", cargo:3 }
        }).done(function (res) {
           var datos = JSON.parse(res);
           $.each(datos, function(i, item) {
             instructorSelect +=' <option value="'+datos[i].id_persona+'" >'+datos[i].nombres+" "+datos[i].primer_apellido+" "+datos[i].segundo_apellido+'</option>';
           });
           $("#instructor_fvsiE").html(instructorSelect);
           instructorSelect='<option value="null" >--SELECCIONE--</option>';
        });  
     }
     
        llenarSalon();
        llenarInstructorPorSede(id_sedeA);  
        llenarProgramaAgregar(id_sedeA);
        llenarProgramaReporte();
        llenarInstructorEditar();
        llenarRegional(regionalSelect);
        llenarSedeEditar(casoSede);
        llenarCentroEditar(casoCentro);
        llenarFichaPorSedeImprimir(id_sedeA);


        //Funcion para cambiar los datos segun la seleccion
        $("#ficha_horario").change(function() {
            llenarCompetenciaFicha();
       });
       
       $("#programa_horario").change(function() {
            llenarFichaPorSede()
       });

       $("#competencia_horario").change(function() {
            id_competencia = $(this).val();
            llenarResultados(id_competencia);
       })

        $("#regional_sede").change(function() {
             id_regional = $(this).val();
            llenarCentroAgregar(id_regional);
        });

        $("#sede_competencia").change(function(){
            id_sedeA = $(this).val();
            CargarProgramas();
        })

        $("#regionalP").change(function() {
            id_regional = $(this).val();
           llenarCentroAgregar(id_regional);
       });

        $("#regional_aprendizE").change(function() {
           id_regional = $(this).val();
           casoCentro=1;
           llenarCentroEditar(casoCentro,id_regional);
        });
    
       $("#regional_programa").change(function() {
         id_regional = $(this).val();
         llenarCentroAgregar(id_regional);
       });

       $("#regional_ficha").change(function() {
        id_regional = $(this).val();
        llenarCentroAgregar(id_regional);
      });

       $("#regional_fvsi").change(function() {
        id_regional = $(this).val();
        llenarCentroAgregar(id_regional);
       });

       $("#regional_salon").change(function() {
        id_regional = $(this).val();
        llenarCentroAgregar(id_regional);
       });

       $("#regional_competencia").change(function() {
        id_regional = $(this).val();
        llenarCentroAgregar(id_regional);
       });

       $("#centro_programa").change(function() {
          id_centro = $(this).val();
          llenarSedeAgregar(id_centro);
       });

     $("#centro_ficha").change(function() {
        id_centro = $(this).val();
        llenarSedeAgregar(id_centro);
     });
    
     $("#centroP").change(function() {
        id_centro = $(this).val();
        llenarSedeAgregar(id_centro);
     });

     $("#centro_aprendizA").change(function() {
        casoSede=1;
        id_centro = $(this).val();
        llenarSedeEditar(casoSede, id_centro);
     });

     $("#centro_fvsi").change(function() {
        id_centro = $(this).val();
        llenarSedeAgregar(id_centro);
     });

     $("#centro_salon").change(function() {
        id_centro = $(this).val();
        llenarSedeAgregar(id_centro);
     });

     $("#centro_competencia").change(function() {
        id_centro = $(this).val();
        llenarSedeAgregar(id_centro);
     });

     $("#sede_ficha").change(function() {
        id_sede = $(this).val();
        llenarProgramaAgregar(id_sede);
     });
    
     $("#sede_fvsi").change(function() {
        id_sede = $(this).val();
          llenarFichaPorSedeA(id_sede);
        llenarInstructorPorSede(id_sede);
     });
   
     
  
    // tabla regional 
    var tablaRegional = $('#tablaRegional').DataTable({ retrieve: true, paging: false });
    tablaRegional.destroy();
    tablaRegional = $('#tablaRegional').DataTable({
        "ajax": {
            "url": "app/controlador/ConfiguracionControlador.php",
            "method": 'POST', 
            "data": { opcion:"ListarRegional"}, 
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function ( data, type, row ) {
                    contadorR=contadorR+1;
                    return "<b>"+contadorR+"</b>";
                }
             },
            { "data": "nombre_regional"},
            {
                data: null, render: function ( data, type, row ) {
                    return '<button type="button" class="btn btn-primary btnEditarRegional" data-id="'+data.id_regional+'"  data-bs-toggle="modal" data-bs-target="#ModalEditRegional" ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null, render: function ( data, type, row ) {
                    return '<button type="button" class="btn btn-danger btnEliminarRegional" data-id="'+data.id_regional+'" ><i class="bi bi-trash"></i></button>';
                }
             }
        ]
    });
// tabla centro

var tablaCentro = $('#tablaCentro').DataTable({ retrieve: true, paging: false });
tablaCentro.destroy();
tablaCentro = $('#tablaCentro').DataTable({
    "ajax": {
        "url": "app/controlador/ConfiguracionControlador.php",
        "method": 'POST', 
        "data": { opcion:"ListarCentro"}, 
        "dataSrc": ""
    },
    "columns": [
        {
            data: null, render: function ( data, type, row ) {
                contadorC=contadorC+1;
                return "<b>"+contadorC+"</b>";
            }
         },
        { "data": "nombre_regional"},
        { "data": "nombre_centro"},
        { "data": "telefono_centro"},
        { "data": "subdirector"},
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-primary btnEditarCentro" data-id="'+data.id_centro+'"  data-bs-toggle="modal" data-bs-target="#ModalEditCentro" ><i class="bi bi-pencil-square"></i></button>';
            }
        },
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-danger btnEliminarCentro" data-id="'+data.id_centro+'" ><i class="bi bi-trash"></i></button>';
            }
         }
    ]
});

// tabla sede

var tablaSede= $('#tablaSede').DataTable({ retrieve: true, paging: false });
tablaSede.destroy();
tablaSede = $('#tablaSede').DataTable({
    "ajax": {
        "url": "app/controlador/ConfiguracionControlador.php",
        "method": 'POST', 
        "data": { opcion:"ListarSede"}, 
        "dataSrc": ""
    },
    "columns": [
        {
            data: null, render: function ( data, type, row ) {
                contadorS=contadorS+1;
                return "<b>"+contadorS+"</b>";
            }
         },
        { "data": "regional"},
        { "data": "nombre_centro"},
        { "data": "nombre_sede"},
        { "data": "responsable_sede"},
        { "data": "telefono_sede"},
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-primary btnEditarSede" data-id="'+data.id_sede+'"  data-bs-toggle="modal" data-bs-target="#ModalEditSede" ><i class="bi bi-pencil-square"></i></button>';
            }
        },
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-danger btnEliminarSede" data-id="'+data.id_sede+'" ><i class="bi bi-trash"></i></button>';
            }
         }
    ]
});


// tabla programas

var tablaPrograma= $('#tablaPrograma').DataTable({ retrieve: true, paging: false });
tablaPrograma.destroy();
tablaPrograma = $('#tablaPrograma').DataTable({
    "ajax": {
        "url": "app/controlador/ConfiguracionControlador.php",
        "method": 'POST', 
        "data": { opcion:"ListarPrograma",id_sedeA:id_sedeA,cargoU:cargoU}, 
        "dataSrc": ""
    },
    "columns": [
        {
            data: null, render: function ( data, type, row ) {
                contadorP=contadorP+1;
                return "<b>"+contadorP+"</b>";
            }
         },
        { "data": "nombre_regional"},
        { "data": "nombre_centro"},
        { "data": "nombre_sede"},
        { "data": "codigo_programa"},
        { "data": "nombre_programa"},
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-primary btnEditarPrograma" data-id="'+data.id_programa+'"  data-bs-toggle="modal" data-bs-target="#ModalEditPrograma" ><i class="bi bi-pencil-square"></i></button>';
            }
        },
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-danger btnEliminarPrograma" data-id="'+data.id_programa+'" ><i class="bi bi-trash"></i></button>';
            }
         }
    ]
});

//tabla ficha

var tablaFicha= $('#tablaFicha').DataTable({ retrieve: true, paging: false });
tablaFicha.destroy();
tablaFicha = $('#tablaFicha').DataTable({
    "ajax": {
        "url": "app/controlador/ConfiguracionControlador.php",
        "method": 'POST', 
        "data": { opcion:"ListarFicha", id_sedeA:id_sedeA, cargoU:cargoU}, 
        "dataSrc": ""
    },
    "columns": [
        {
            data: null, render: function ( data, type, row ) {
                contadorF=contadorF+1;
                return "<b>"+contadorF+"</b>";
            }
         },
        { "data": "nombre_regional"},
        { "data": "nombre_centro"},
        { "data": "nombre_sede"},
        { "data": "nombre_programa"},
        { "data": "codigo_ficha"},
        { "data": "grupo_ficha"},
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-primary btnEditarFicha" data-id="'+data.id_ficha+'"  data-bs-toggle="modal" data-bs-target="#ModalEditFicha" ><i class="bi bi-pencil-square"></i></button>';
            }
        },
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-danger btnEliminarFicha" data-id="'+data.id_ficha+'" ><i class="bi bi-trash"></i></button>';
            }
         }
        

    ]
});


//tabla ficha vs instructor

var tablaFVSI= $('#tablaFVSI').DataTable({ retrieve: true, paging: false });
tablaFVSI.destroy();
tablaFVSI = $('#tablaFVSI').DataTable({
    "ajax": {
        "url": "app/controlador/ConfiguracionControlador.php",
        "method": 'POST', 
        "data": { opcion:"ListarFVSI", cargoU:cargoU, id_sedeA:id_sedeA}, 
        "dataSrc": ""
    },
    "columns": [
        {
            data: null, render: function ( data, type, row ) {
                contadorFVSI=contadorFVSI+1;
                return "<b>"+contadorFVSI+"</b>";
            }
         },
        { "data": "nombre_regional"},
        { "data": "nombre_centro"},
        { "data": "nombre_sede"},
        {
            data: null, render: function ( data, type, row ) {
                nombre=data.nombres+" "+data.apellidos;
                return nombre;
            }
         },
        { "data": "ficha_codigo"},
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-primary btnEditarFVSI" data-id="'+data.id_fvsi+'"  data-bs-toggle="modal" data-bs-target="#ModalEditFVSI" ><i class="bi bi-pencil-square"></i></button>';
            }
        },
        {
            data: null, render: function ( data, type, row ) {
                return '<button type="button" class="btn btn-danger btnEliminarFVSI" data-id="'+data.id_fvsi+'" ><i class="bi bi-trash"></i></button>';
            }
         }
        

    ]
});


    var tablaSalon = $('#tablaSalones').DataTable({ retrieve: true, paging: false });
    tablaSalon.destroy();
    tablaSalon = $('#tablaSalones').DataTable({
        "ajax": {
            "url": "app/controlador/ConfiguracionControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarSalon" },
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function (data, type, row) {
                    contadorSALON = contadorSALON + 1;
                    return "<b>" + contadorSALON + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "nombre_salon" },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-primary btnEditarSalon" data-id="' + data.id_salon + '"  data-bs-toggle="modal" data-bs-target="#ModalEditSalon" ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-danger btnEliminarSalon" data-id="' + data.id_salon + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]
    });


    var tablaCompetencia = $('#tablaCompetencia').DataTable({ retrieve: true, paging: false });
    tablaCompetencia.destroy();
    tablaCompetencia = $('#tablaCompetencia').DataTable({
        "ajax": {
            "url": "app/controlador/ConfiguracionControlador.php",
            "method": 'POST',
            "data": { opcion: "ListarCompetencia" },
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function (data, type, row) {
                    contadorCOMPETENCIA = contadorCOMPETENCIA + 1;
                    return "<b>" + contadorCOMPETENCIA + "</b>";
                }
            },
            { "data": "regional" },
            { "data": "centro" },
            { "data": "sede" },
            { "data": "nombre_programa" },
            {"data": "nombre_competencia"},
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-primary btnEditarCompetencia" data-id="' + data.id_competencia + '"  data-bs-toggle="modal" data-bs-target="#ModalEditCompetencia" ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-danger btnEliminarCompetencia" data-id="' + data.id_competencia + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]
    });

    $('#RegistrarRegional').submit(function (e)
    {
        e.preventDefault(); 
        nombre_regional=$.trim($('#nombre_regional').val());
        opcion= "GuardarRegional";
        $.ajax({
          url: "app/controlador/ConfiguracionControlador.php",
          type: "POST",
          data:{nombre_regional:nombre_regional, opcion: opcion}
        }).done(function (data)
        {
            if(data==1)
            {
                $('#ModalRegistroRegional').modal('hide');
                $("#ModalRegistroRegional").find("input,textarea,select").val("");
                swal("GUARDADO EXITOSAMENTE", "", "success");
                contadorR=0;
                tablaRegional.ajax.reload(null, false);
            }
            else
            {
                swal("", "ESTE REGIONAL YA EXISTE", "error");
            }
        });
    });



    $(document).on("click", ".btnEditarRegional", function () {
        id_regional= $(this).data("id");
        opcion ="ConsultarRegional";
        
         $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { id_regional: id_regional, opcion: opcion }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $("#nombre_regionale").val(datos.nombre_regional);
          $("#id_regional").val(id_regional);  
        });
    });
    
    $('#EditarRegional').submit(function (e) {
       e.preventDefault(); 
        id_regional = $.trim($('#id_regional').val());
        nombre_regionale= $.trim($('#nombre_regionale').val());
        opcion="ActualizarRegional"; 

        $.ajax({
          url: "app/controlador/ConfiguracionControlador.php",
          type: "POST",
          data: { id_regional: id_regional, nombre_regionale: nombre_regionale, opcion : opcion }
         }).done( function (data){
           if(data==1)
            {
                $('#ModalEditRegional').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorR=0;
                tablaRegional.ajax.reload(null, false);
            }
            else
            {
                swal("", "ERROR", "error");
            }
         });
      
    });



    $(document).on("click", ".btnEliminarRegional", function () {
        opcion = "EliminarRegional";
        id_regional= $(this).data("id");
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
                    url: "app/controlador/ConfiguracionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_regional: id_regional }
                 }).done (function (data) {
                     if(data=1)
                     {
                        contadorR=0;
                        tablaRegional.row(fila.parents('tr')).remove().draw(); 
                        swal("Datos Eliminados", {icon: "success", });
                       
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

// metodos centro

  $('#RegistrarCentro').submit(function (e)
    {
        e.preventDefault(); 
        regional=$.trim($('#regional').val());
        nombre_centro=$.trim($('#nombre_centro').val());
        telefono_centro=$.trim($('#telefono_centro').val());
        subdirector=$.trim($('#subdirector_centro').val());
        opcion= "GuardarCentro";
        if ($('#regional').val().trim() === 'null')
        {
            swal("No Ha Seleccionado Una Regional", "", "error");
        }
        else
        {
            $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: "POST",
            data:{opcion: opcion, nombre_centro : nombre_centro, telefono_centro: telefono_centro, subdirector: subdirector,regional: regional}
            }).done(function (data)
            {
                if(data==1)
                {
                    $('#ModalRegistroCentro').modal('hide');
                    $("#ModalRegistroCentro").find("input,textarea,select").val("");
                    $("#regional").val("null").selectpicker('refresh');
                    swal("GUARDADO EXITOSAMENTE", "", "success");
                    contadorC=0;
                    tablaCentro.ajax.reload(null, false);
                }
                else
                {
                     swal("ERROR", "", "error");
                }
            });
        }
        
    });


    $(document).on("click", ".btnEditarCentro", function () {
        id_centro= $(this).data("id");
        opcion ="ConsultarCentro";
        $("#id_centro").val(id_centro);  
         $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { id_centro: id_centro, opcion: opcion }
        }).done(function (res) {
          var datos = JSON.parse(res);
          $("#nombre_centroe").val(datos.nombre_centro);
          $("#telefono_centroe").val(datos.telefono_centro); 
          $("#subdirector_centroe").val(datos.subdirector); 
          $("#regionale").val(datos.regional);  
         
        });
    });

    $('#EditarCentro').submit(function (e) {
         e.preventDefault(); 
         id_centro = $.trim($('#id_centro').val());
         regionale = $.trim($('#regionale').val());
         nombre_centroe = $.trim($('#nombre_centroe').val());
         telefono_centroe= $.trim($('#telefono_centroe').val());
         subdirector_centroe= $.trim($('#subdirector_centroe').val());
         opcion="ActualizarCentro"; 
 
         $.ajax({
           url: "app/controlador/ConfiguracionControlador.php",
           type: "POST",
           data: {id_centro: id_centro, regionale: regionale, nombre_centroe: nombre_centroe, telefono_centroe: telefono_centroe, subdirector_centroe: subdirector_centroe, opcion: opcion }
          }).done( function (data){
            if(data==1)
             {
                 $('#ModalEditCentro').modal('hide');
                 swal("DATOS ACTUALIZADOS", "", "success");
                 contadorC=0;
                 tablaCentro.ajax.reload(null, false);
             }
             else
             {
                swal("ERROR", "", "error");
             }
          });
     });

     $(document).on("click", ".btnEliminarCentro", function () {
        opcion = "EliminarCentro";
        id_centro= $(this).data("id");
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
                    url: "app/controlador/ConfiguracionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_centro: id_centro }
                 }).done (function (data) {
                     if(data=1)
                     {
                        contadorC=0;
                        tablaCentro.row(fila.parents('tr')).remove().draw(); 
                        swal("Datos Eliminados", {icon: "success", });
                       
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

// scripts de sede
    $('#RegistrarSede').submit(function (e)
    {
        e.preventDefault(); 
        regional_sede=$.trim($('#regional_sede').val());
        centro_sede=$.trim($('#centro_sede').val());
        nombre_sede=$.trim($('#nombre_sede').val());
        responsable_sede=$.trim($('#responsable_sede').val());
        telefono_sede=$.trim($('#telefono_sede').val());
        opcion= "GuardarSede";
        if ($('#regional_sede').val().trim() === 'null' || $('#centro_sede').val().trim() === 'null')
        {
            swal("Faltan Datos Por LLenar", "", "error");
        }
        else
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data:{opcion: opcion, regional_sede: regional_sede, centro_sede: centro_sede, nombre_sede: nombre_sede, responsable_sede: responsable_sede, telefono_sede: telefono_sede}
              }).done(function (data)
              {
                  if(data==1)
                  {
                      $('#ModalRegistroSede').modal('hide');
                      $("#ModalRegistroSede").find("input,textarea,select").val("");
                      $("#regional_sede").val("null").selectpicker('refresh');
                      $("#centro_sede").val("null").selectpicker('refresh');
                      swal("GUARDADO EXITOSAMENTE", "", "success");
                      contadorS=0;
                      tablaSede.ajax.reload(null, false);
                  }
                  else
                  {
                      swal("", "Error", "error");
                  }
              });
        }
    });

    $(document).on("click", ".btnEditarSede", function () {
        fila = $(this).closest("tr");
        id_sede= $(this).data("id");
        regional=fila.find('td:eq(1)').text(); 
        centro=fila.find('td:eq(2)').text(); 
        sede=fila.find('td:eq(3)').text();
        responsable=fila.find('td:eq(4)').text();
        telefono=fila.find('td:eq(5)').text();   
        $("#id_sede").val(id_sede); 
        $("#regional_sedee").val(regional);
        $("#centro_sedee").val(centro); 
        $("#nombre_sedee").val(sede); 
        $("#responsable_sedee").val(responsable); 
        $("#telefono_sedee").val(telefono);    
    });

    $('#EditarSede').submit(function (e) {
         e.preventDefault(); 
         id_sede = $.trim($('#id_sede').val());
         telefono_sedee = $.trim($('#telefono_sedee').val());
         responsable_sedee= $.trim($('#responsable_sedee').val());
         nombre_sedee= $.trim($('#nombre_sedee').val());
         opcion="ActualizarSede"; 
       
         $.ajax({
           url: "app/controlador/ConfiguracionControlador.php",
           type: "POST",
           data: {id_sede: id_sede,nombre_sedee: nombre_sedee, responsable_sedee: responsable_sedee, telefono_sedee: telefono_sedee, opcion: opcion }
          }).done( function (data){
            if(data==1)
             {
                 $('#ModalEditSede').modal('hide');
                 swal("DATOS ACTUALIZADOS", "", "success");
                 contadorS=0;
                 tablaSede.ajax.reload(null, false);
             }
             else
             {
                swal("", "Error", "error");
             }
          });
     });

     $(document).on("click", ".btnEliminarSede", function () {
        opcion = "EliminarSede";
        id_sede= $(this).data("id");
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
                    url: "app/controlador/ConfiguracionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_sede: id_sede}
                 }).done (function (data) {
                     if(data=1)
                     {
                        contadorS=0;
                        tablaSede.row(fila.parents('tr')).remove().draw(); 
                        swal("Datos Eliminados", {icon: "success", });
                       
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

 // metodos de programa

 $('#RegistrarPrograma').submit(function (e)
    {
        e.preventDefault(); 
        regional_programa=$.trim($('#regional_programa').val());
        centro_programa=$.trim($('#centro_programa').val());
        sede_programa=$.trim($('#sede_programa').val());
        nombre_programa=$.trim($('#nombre_programa').val());
        codigo_programa=$.trim($('#codigo_programa').val());
        opcion= "GuardarPrograma";
        if (regional_programa.trim() === 'null' || centro_programa.trim() === 'null' || sede_programa.trim()=='null')
        {
            swal("Faltan Datos Por LLenar", "", "error");
        }
        else
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data:{opcion: opcion, sede_programa: sede_programa , nombre_programa: nombre_programa, codigo_programa: codigo_programa}
              }).done(function (data)
              {
                  if(data==1)
                  {
                      $('#ModalRegistroPrograma').modal('hide');
                      if(id_sedeA==1)
                      {
                        $("#ModalRegistroPrograma").find("input").val("");
                        $("#sede_programa").val("null").selectpicker('refresh');
                        $("#centro_programa").val("null").selectpicker('refresh');
                        $("#regional_programa").val("null").selectpicker('refresh');
                      }
                      else
                      {
                        $('#codigo_programa').val("");
                        $('#nombre_programa').val("");
                      }
                      swal("GUARDADO EXITOSAMENTE", "", "success");
                      contadorP=0;
                      tablaPrograma.ajax.reload(null, false);
                  }
                  else
                  {
                      alert(data);
                  }
              });
        }
    });

   
    $(document).on("click", ".btnEditarPrograma", function () {
        fila = $(this).closest("tr");
        id_programa= $(this).data("id");
        regional=fila.find('td:eq(1)').text(); 
        centro=fila.find('td:eq(2)').text();
        sede=fila.find('td:eq(3)').text();
        codigo=fila.find('td:eq(4)').text();
        nombre=fila.find('td:eq(5)').text();
        $("#id_programa").val(id_programa); 
        $("#regional_programae").val(regional);
        $("#centro_programae").val(centro);
        $("#sede_programae").val(sede);
        $("#codigo_programae").val(codigo);
        $("#nombre_programae").val(nombre);
    });


    $('#EditarPrograma').submit(function (e) {
        e.preventDefault(); 
        id_programa = $.trim($('#id_programa').val());
        nombre_programae = $.trim($('#nombre_programae').val());
        codigo_programae = $.trim($('#codigo_programae').val());
        opcion="ActualizarPrograma"; 
      
        $.ajax({
          url: "app/controlador/ConfiguracionControlador.php",
          type: "POST",
          data: {opcion: opcion, nombre_programae:nombre_programae, codigo_programae: codigo_programae, id_programa: id_programa }
         }).done( function (data){
           if(data==1)
            {
                $('#ModalEditPrograma').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorP=0;
                tablaPrograma.ajax.reload(null, false);
            }
            else
            {
              alert(data);
            }
         });
    });


    $(document).on("click", ".btnEliminarPrograma", function () {
        opcion = "EliminarPrograma";
        id_programa= $(this).data("id");
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
                    url: "app/controlador/ConfiguracionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_programa: id_programa}
                 }).done (function (data) {
                     if(data=1)
                     {
                        contadorP=0;
                        tablaPrograma.row(fila.parents('tr')).remove().draw(); 
                        swal("Datos Eliminados", {icon: "success", });
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

    $('#RegistrarFicha').submit(function (e) {
        e.preventDefault(); 
        programa_ficha = $.trim($('#programa_ficha').val());
        codigo_ficha = $.trim($('#codigo_ficha').val());
        grupo_ficha= $.trim($('#grupo_ficha').val());
        regional_ficha = $.trim($('#regional_ficha').val());
        centro_ficha = $.trim($('#centro_ficha').val());
        sede_ficha = $.trim($('#sede_ficha').val());
        opcion="GuardarFicha"; 
        if (programa_ficha.trim() === 'null' || regional_ficha.trim() === 'null' || centro_ficha.trim() === 'null' || sede_ficha.trim() === 'null')
        {
            swal("Faltan Datos Por LLenar", "", "error");
        }
        else
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data: {opcion: opcion, programa_ficha: programa_ficha, codigo_ficha: codigo_ficha, grupo_ficha: grupo_ficha }
               }).done( function (data){
                 if(data==1)
                  {
                    $('#ModalRegistroFicha').modal('hide');
                     if(id_sedeA==1)
                     {
                       $("#ModalRegistroFicha").find("input,textarea,select").val("");
                       $("#regional_ficha").val("null").selectpicker('refresh');
                       $("#centro_ficha").val("null").selectpicker('refresh');
                       $("#sede_ficha").val("null").selectpicker('refresh');
                       $("#programa_ficha").val("null").selectpicker('refresh');
                     }
                     else
                     {
                        $("#programa_ficha").val("null").selectpicker('refresh');
                        $('#codigo_ficha').val("");
                        $('#grupo_ficha').val("");
                     }
                      
                      swal("DATOS GUARDADOS", "", "success");
                      contadorF=0;
                      tablaFicha.ajax.reload(null, false);
                  }
                  else
                  {
                      swal("EL CODIGO YA EXISTE DIGITE OTRO", "", "error");
                  }
               });
        }
    });

    $(document).on("click", ".btnEditarFicha", function () {
        fila = $(this).closest("tr");
        regional=fila.find('td:eq(1)').text(); 
        centro=fila.find('td:eq(2)').text(); 
        sede=fila.find('td:eq(3)').text();
        programa=fila.find('td:eq(4)').text();
        codigo=fila.find('td:eq(5)').text();
        grupo=fila.find('td:eq(6)').text();
        id_ficha= $(this).data("id");
        $("#id_ficha").val(id_ficha); 
        $("#regional_fichae").val(regional);
        $("#centro_fichae").val(centro); 
        $("#sede_fichae").val(sede); 
        $("#programa_fichae").val(programa); 
        $("#codigo_fichae").val(codigo); 
        $("#grupo_fichae").val(grupo);  
    });

    $('#EditarFicha').submit(function (e) {
        e.preventDefault();
        id_ficha = $.trim($('#id_ficha').val());
        codigo_fichae = $.trim($('#codigo_fichae').val());
        grupo_fichae = $.trim($('#grupo_fichae').val());
        opcion = "ActualizarFicha";

        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: "POST",
            data: { opcion: opcion, id_ficha: id_ficha, codigo_fichae: codigo_fichae, grupo_fichae, grupo_fichae }
        }).done(function (data) {
            if (data == 1) {
                $('#ModalEditFicha').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorF = 0;
                tablaFicha.ajax.reload(null, false);
            }
            else {
                alert(data);
            }
        });
    });
      

    $(document).on("click", ".btnEliminarFicha", function () {
        opcion = "EliminarFicha";
        id_ficha= $(this).data("id");
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
                    url: "app/controlador/ConfiguracionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_ficha: id_ficha}
                 }).done (function (data) {
                     if(data=1)
                     {
                        contadorF=0;
                        tablaFicha.row(fila.parents('tr')).remove().draw(); 
                        swal("Datos Eliminados", {icon: "success", });
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

    $('#RegistrarIntrsuctorVSFicha').submit(function (e) {
        e.preventDefault(); 
        regional_fvsi = $.trim($('#regional_fvsi').val());
        centro_fvsi = $.trim($('#centro_fvsi').val());
        sede_fvsi = $.trim($('#sede_fvsi').val());
        ficha_fvsi = $.trim($('#ficha_fvsi').val());
        instructor_fvsi = $.trim($('#instructor_fvsi').val());
       
        opcion="GuardarFVSI"; 
        if (regional_fvsi.trim() === 'null' || centro_fvsi.trim() === 'null' || sede_fvsi.trim() === 'null' || ficha_fvsi.trim() === 'null' || instructor_fvsi.trim() === 'null' )
        {
            swal("Faltan Datos Por LLenar", "", "error");
        }
        else
        {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data: {opcion: opcion, ficha_fvsi: ficha_fvsi, instructor_fvsi: instructor_fvsi, sede_fvsi: sede_fvsi}
               }).done( function (data){
                 if(data==1)
                  {
                      $('#ModalRegistroInstructorVSFicha').modal('hide');
                      if(id_sedeA==1)
                      {
                        $("#regional_fvsi").val("null").selectpicker('refresh');
                        $("#centro_fvsi").html("").selectpicker('refresh');
                        $("#sede_fvsi").html("").selectpicker('refresh');
                        $("#ficha_fvsi").html("").selectpicker('refresh');
                        $("#instructor_fvsi").val("null").selectpicker('refresh');
                      }
                      else
                      {
                        $("#ficha_fvsi").val("null").selectpicker('refresh');
                        $("#instructor_fvsi").val("null").selectpicker('refresh');
                      }
                     
                      swal("DATOS GUARDADOS", "", "success");
                      contadorFVSI=0;
                      tablaFVSI.ajax.reload(null, false);
                  }
                  else
                  {
                    swal("La relacion ficha instructor ya existe", "", "error");
                  }
               });
        }
    });

    $(document).on("click", ".btnEditarFVSI", function () {
        fila = $(this).closest("tr");
        id_fvsi= $(this).data("id");
        regional=fila.find('td:eq(1)').text(); 
        centro=fila.find('td:eq(2)').text(); 
        sede=fila.find('td:eq(3)').text();
        instructor=fila.find('td:eq(4)').text(); 
        opcion ="ConsultarFVSI";
         $("#id_fvsi").val(id_fvsi);  
         $("#regional_fvsiE").val(regional);
         $("#centro_fvsiE").val(centro);
         $("#sede_fvsiE").val(sede);
         $("#instructor_fvsiE").val(instructor);
         $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: { id_fvsi: id_fvsi, opcion: opcion }
        }).done(function (res) {
          var datos = JSON.parse(res);
          var id_sede= datos.id_sede;
          var id_ficha= datos.id_ficha;
          llenarFichaPorSedeEditar(id_sede,id_ficha);
        });
    });


    $('#EditarFVSI').submit(function (e) {
        e.preventDefault();
        id_fvsi = $.trim($('#id_fvsi').val());
        ficha_fvsiE = $.trim($('#ficha_fvsiE').val());
        opcion = "ActualizarFVSI";

        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: "POST",
            data: { opcion: opcion, ficha_fvsiE: ficha_fvsiE, id_fvsi: id_fvsi }
        }).done(function (data) {
            if (data == 1) {
                $('#ModalEditFVSI').modal('hide');
                swal("DATOS ACTUALIZADOS", "", "success");
                contadorFVSI = 0;
                tablaFVSI.ajax.reload(null, false);
            }
            else {
                alert(data);
            }
        });
    });


    $(document).on("click", ".btnEliminarFVSI", function () {
        opcion = "EliminarFVSI";
        id_fvsi = $(this).data("id");
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
                        url: "app/controlador/ConfiguracionControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_fvsi: id_fvsi }
                    }).done(function (data) {
                        if (data = 1) {
                            contadorFVSI = 0;
                            tablaFVSI.row(fila.parents('tr')).remove().draw();
                            swal("Datos Eliminados", { icon: "success", });
                        }
                        else {
                            alert(data);
                        }
                    });
                } else {
                    swal("CANCELADO", "", "error");
                }
            });
    });

    $("#RegistrarSalon").submit(function (e) {
        e.preventDefault();
        opcion = "GuardarSalon";
        nombre_salon = $("#nombre_salon").val();
        regional = $("#regional_salon").val();
        centro = $("#centro_salon").val();
        id_sede = $("#sede_salon").val();
        if ((id_sede === "null") || (regional === "null") || (centro === "null")) {
            swal("Faltan Campos Por llenar", "", "error");
        }
        else {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data: { opcion: opcion, id_sede: id_sede, nombre_salon: nombre_salon }
            }).done(function (data) {
                if (data = 1) {
                    swal("DATOS GUARDADOS", "", "success");
                    $('#ModalRegistroSalon').modal('hide');
                    $("#nombre_salon").val("");
                    contadorSALON=0;
                    tablaSalon.ajax.reload(null, false);
                    $("#regional_salon").val("null").selectpicker('refresh');
                    $("#centro_salon").val("null").selectpicker('refresh');
                    $("#sede_salon").val("null").selectpicker('refresh');
                }
                else {
                    alert(data);
                }
            });
        }
    });

    $(document).on("click", ".btnEditarSalon", function () {
        fila = $(this).closest("tr");
        id_salon = $(this).data("id");
        regional = fila.find('td:eq(1)').text();
        centro = fila.find('td:eq(2)').text();
        sede = fila.find('td:eq(3)').text();
        nombre_salon = fila.find('td:eq(4)').text();
        $("#regional_salonE").val(regional);
        $("#centro_salonE").val(centro);
        $("#sede_salonE").val(sede);
        $("#nombre_salonE").val(nombre_salon);
        $("#id_salon").val(id_salon);
    });

    $("#EditarSalon").submit(function (e) {
        e.preventDefault();
        opcion = "ActualizarSalon";
        nombre_salon = $("#nombre_salonE").val();
        id_salon = $("#id_salon").val();
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: "POST",
            data: { opcion: opcion, id_salon: id_salon, nombre_salon: nombre_salon }
        }).done(function (data) {
            if (data = 1) {
                swal("DATOS ACTUALIZADOS", "", "success");
                $('#ModalEditSalon').modal('hide');
                tablaSalon.ajax.reload(null, false);
            }
            else {
                alert(data);
            }
        });
    });

    $(document).on("click", ".btnEliminarSalon", function () {
        fila = $(this);
        opcion = "EliminarSalon";
        id_salon = $(this).data("id");
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
                        url: "app/controlador/ConfiguracionControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_salon: id_salon }
                    }).done(function (data) {
                        if (data = 1) {
                            swal("DATOS ELIMINADOS", "", "success");
                            tablaSalon.row(fila.parents('tr')).remove().draw();
                        }
                        else {
                            alert(data);
                        }
                    });
                }
            });
    });

    //Metodos Competencias

    $("#RegistrarCompetencia").submit(function (e) {
        e.preventDefault();
        opcion = "GuardarCompetencia";
        nombre_competencia = $("#nombre_competencia").val();
        regional = $("#regional_competencia").val();
        centro = $("#centro_competencia").val();
        id_sede = $("#sede_competencia").val();
        programa_competencia = $("#programa_competencia").val();
        if ((id_sede === "null") || (regional === "null") || (centro === "null") || (programa_competencia == "null")) {
            swal("Faltan Campos Por llenar", "", "error");
        }
        else {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data: { opcion: opcion, id_sede: id_sede, nombre_competencia: nombre_competencia,  programa_competencia: programa_competencia}
            }).done(function (data) {
                if (data = 1) {
                    swal("DATOS GUARDADOS", "", "success");
                    $('#ModalRegistroCompetencia').modal('hide');
                    $("#nombre_competencia").val("");
                    contadorCOMPETENCIA=0;
                    tablaCompetencia.ajax.reload(null, false);
                    $("#regional_competencia").val("null").selectpicker('refresh');
                    $("#centro_competencia").val("null").selectpicker('refresh');
                    $("#sede_competencia").val("null").selectpicker('refresh');

                }
                else {
                    alert(data);
                }
            });
        }
    });

    $(document).on("click", ".btnEditarCompetencia", function () {
        //Funcion para traer los programas
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'post',
            datatype: "json",
            data: {opcion:"ProgramasEditar"}
        }).done(function (res){
            var datos = JSON.parse(res);
            $.each(datos, function(i, item){
                ProgramSelect2 +=' <option value="'+datos[i].id_programa+'" >'+datos[i].nombre_programa+'</option>';
            });
            $("#programa_competenciaE").html(ProgramSelect2).selectpicker('refresh');
        });
        //
        fila = $(this).closest("tr");
        id_competencia = $(this).data("id");
        regional = fila.find('td:eq(1)').text();
        centro = fila.find('td:eq(2)').text();
        sede = fila.find('td:eq(3)').text();
        nombre_competencia = fila.find('td:eq(5)').text();
        $("#regional_competenciaE").val(regional);
        $("#centro_competenciaE").val(centro);
        $("#sede_competenciaE").val(sede);
        $("#nombre_competenciaE").val(nombre_competencia);
        $("#id_competencia").val(id_competencia);
    });

    $("#EditarCompetencia").submit(function (e) {
        e.preventDefault();
        opcion = "ActualizarCompetencia";
        nombre_competencia = $("#nombre_competenciaE").val();
        id_competencia = $("#id_competencia").val();
        programa_competencia = $("#programa_competenciaE").val();
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: "POST",
            data: { opcion: opcion, id_competencia: id_competencia, nombre_competencia: nombre_competencia, programa_competencia: programa_competencia }
        }).done(function (data) {
            if (data = 1) {
                swal("DATOS ACTUALIZADOS", "", "success");
                $('#ModalEditCompetencia').modal('hide');
                tablaCompetencia.ajax.reload(null, false);
            }
            else {
                alert(data);
            }
        });
    });

    $(document).on("click", ".btnEliminarCompetencia", function () {
        fila = $(this);
        opcion = "EliminarCompetencia";
        id_competencia = $(this).data("id");
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
                        url: "app/controlador/ConfiguracionControlador.php",
                        type: "POST",
                        data: { opcion: opcion, id_competencia: id_competencia }
                    }).done(function (data) {
                        if (data = 1) {
                            swal("DATOS ELIMINADOS", "", "success");
                            tablaCompetencia.row(fila.parents('tr')).remove().draw();
                        }
                        else {
                            alert(data);
                        }
                    });
                }
            });
    });

    //Funciones relacionadas con los resultados
    

    //Tabla Resultados
    var tablaResultados = $('#tablaResultados').DataTable({ retrieve: true, paging: false });
    tablaResultados.destroy();
    tablaResultados = $('#tablaResultados').DataTable({
        "ajax": {
            "url": "app/controlador/ConfiguracionControlador.php",
            "method": 'POST',
            "data": { opcion: "TablaResultados" },
            "dataSrc": ""
        },
        "columns": [
            {
                data: null, render: function (data, type, row) {
                    contadorRESULTADOS = contadorRESULTADOS + 1;
                    return "<b>" + contadorRESULTADOS + "</b>";
                }
            },
            { "data": "nombre_competencia" },
            {"data": "nombre_resultado"},
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-primary btnEditarResultado" data-id="' + data.id_competencia + '"  data-bs-toggle="modal" data-bs-target="#ModalEditarResultado" ><i class="bi bi-pencil-square"></i></button>';
                }
            },
            {
                data: null, render: function (data, type, row) {
                    return '<button type="button" class="btn btn-danger btnEliminarResultados" data-id="' + data.id_competencia + '" ><i class="bi bi-trash"></i></button>';
                }
            }
        ]
    });

    //Cargar las competencias para agregar los resultados
    function CompetenciasResultados()
    {
         $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'POST',
            datatype: "json",
            data: {opcion: "CompetenciasResultados"}
        }).done(function (res) {
            var datos = JSON.parse(res);
            $.each(datos, function(i, item) {
                CompetenciaSelect += ' <option value ="'+ datos[i].id_competencia+'" >'+datos[i].nombre_competencia+'</option>';
            });
            $("#menuCompetencias").html(CompetenciaSelect);
            CompetenciaSelect ='<option value="null" >--SELECCIONE--</option>';
        });
    }
    //Funcion para llamar el codigo mas alto de la competencia
    function CodigoResultado()
    {
        id_competencia = $("#menuCompetencias").val();
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: 'POST',
            datatype: "json",
            data: {opcion: "CodigoResultado", id_competencia: id_competencia}
        }).done(function (res){
            var datos = JSON.parse(res);
            $.each(datos, function(i, item) {
                CodigoSelect += '<option value ="'+ datos[i].Codigo_Resultado+'" >'+datos[i].Codigo_Resultado+'</option>';
                $("#codigo_resultado").html(CodigoSelect);
                valor = datos[i].Codigo_Resultado
            });
            CodigoSelect='<option value="null" >---SELECCIONE---</option>';
            $("#codigo_resultado").val(valor);

        });
    }

    //Metodos de resultados

    $("#agregar_competencias").on("click", function(){
        CompetenciasResultados()
    })

    $("#menuCompetencias").change(function () {
        CodigoResultado();
    });

    $("#RegistrarResultado").submit(function (e) {
        e.preventDefault();
        opcion = "GuardarResultado";
        id_competencia = $("#menuCompetencias").val();
        nombre_resultado = $("#nombre_resultado").val();
        codigo = $("#codigo_resultado").val();
        if ((nombre_resultado === "") || (id_competencia == "null"))  {
            swal("Faltan Campos Por llenar", "", "error");
        }
        else {
            $.ajax({
                url: "app/controlador/ConfiguracionControlador.php",
                type: "POST",
                data: { opcion: opcion, nombre_resultado: nombre_resultado, id_competencia: id_competencia, codigo: codigo}
            }).done(function (data) {
                if (data = 1) {
                    swal("RESULTADO GUARDADO", "", "success");
                    $('#ModalRegistroResultado').modal('hide');
                    $("#nombre_resultado").val("");
                    contadorRESULTADOS=0;
                    tablaResultados.ajax.reload(null, false);
                }
                else {
                    alert(data);
                }
            });
        }
    });

    $(document).on("click", ".btnEditarResultado", function () {
        fila = $(this).closest("tr");
        id_competencia= $(this).data("id");
        nombre_competencia = fila.find('td:eq(1)').text()
        nombre_resultado = fila.find('td:eq(2)').text()
        $("#menuCompetenciaE").val(nombre_competencia);
        $("#menuCompetenciaE").prop('disabled', true);
        $("#nombre_resultadoE").val(nombre_resultado);
        $("#id_competencia").val(id_competencia);
    });

    $("#EditarResultados").submit(function (e) {
        e.preventDefault();
        opcion = "ActualizarResultado";
        nombre_resultado = $("#nombre_resultadoE").val();
        id_competencia = $("#id_competencia").val();
        $.ajax({
            url: "app/controlador/ConfiguracionControlador.php",
            type: "POST",
            data: { opcion: opcion, id_competencia: id_competencia, nombre_resultado: nombre_resultado}
        }).done(function (data) {
            if (data = 1) {
                swal("DATOS ACTUALIZADOS", "", "success");
                $('#ModalEditarResultado').modal('hide');
                tablaResultados.ajax.reload(null, false);
            }
            else {
                alert(data);
            }
        });
    });
    
    $(document).on("click", ".btnEliminarResultados", function () {
        fila = $(this).closest("tr");
        opcion = "EliminarResultados";
        id_competencia= $(this).data("id");
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
                    url: "app/controlador/ConfiguracionControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_competencia: id_competencia }
                 }).done (function (data) {
                     if(data=1)
                     {
                        contadorR=0;
                        tablaResultados.row(fila.parents('tr')).remove().draw(); 
                        swal("Datos Eliminados", {icon: "success", });
                        tablaResultados.ajax.reload(null, false);

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
}); 

$(document).on('click', '#Editar', function(){
    $("#ModalLLenarHorario").modal("show");
});


