$(document).ready(function () {
    var opcion;
    var fila; 
    var id = $.trim($('#idSesionAp').val());
    var fichaAP = $.trim($('#fichaAP').val());     
   
    var hoy = new Date();
    var fecha = hoy.getFullYear() + '-' + (hoy.getMonth() + 1) + '-' + hoy.getDate();
    var hora = hoy.toLocaleString('es-CO', { hour: 'numeric', minute: 'numeric', hour12: true });
    
    var latNorteSena = 10.8646101;
    var latSurSena = 10.8639305;
    var longOesteSena = -74.7785088;
    var longEsteSena = -74.7768703;
    var contador1=0;
    var contador2=0;
    var contador3=0;
    var contador4=0;
   
    
    function ConsultarEstadoAsistencia()
    {
        let opcion = "EstadoAsistencia";
        var idSesionAp = $.trim($('#idSesionAp').val());
        if(navigator.geolocation){
            var success = function(position){
                var latitud = position.coords.latitude;
                var longitud = position.coords.longitude;
                
                
                if(latitud >= latSurSena && latitud <= latNorteSena)
                {
                    if(longitud <= longEsteSena && longitud >= longOesteSena)
                    {
                        //alert("Te encuentras dentro: " + latitud + "," + longitud);
                        $("#latitud").html(latitud);
                        $("#longitud").html(longitud);
                        $.ajax({
                            url: 'app/controlador/AprendizControlador.php',
                            type: 'POST',
                            data: {
                                opcion: opcion,
                                idSesionAp: idSesionAp
                            }
                        }).done(function(resp){
                            let data = JSON.parse(resp);
                            
                            if(data)
                            {
                                var idFicha = data.ID_FICHA;
                                var idPrograma = data.ID_PROGRAMA;
                                var identificacion = data.DOCUMENTO;
                                var nombre = data.NOMBRES;
                                var apellido = data.APELLIDOS;
                                var ficha = data.FICHA;
                                var programa = data.PROGRAMA;
                                var estate = data.ESTADO;
                                
                                if(estate == 1)
                                {
                                    $("#andres").html("<a data-id = '0' id = 'btnAndres' class = 'btn btn-danger' > Salir </a>");
                                    $('#andres a').on('click', function(){
                             
                                        var boton = $(this).attr('data-id');
                                        var div = $(this); 
                                        registrarAsistencia(idFicha, idPrograma, boton, div);
                                        
                                    });
                                    
                                }
                                else
                                {
                                    $("#andres").html("<a data-id = '1' id = 'btnAndres' class = 'btn btn-success' > Ingresar </a>");
                                    $('#andres a').on('click', function(){
                             
                                        var boton = $(this).attr('data-id');
                                        var div = $(this); 
                                        registrarAsistencia(idFicha, idPrograma, boton, div);
                                        
                                    });
                                }
                            }
                            
                            
                        })
                    }
                }
                else
                {
                    $("#andres").html("<h3>Ingresar estando dentro de la sede</h3>");
                   // aqui va el mensaje
                }
                
                
            }
            
            navigator.geolocation.getCurrentPosition(success, function(msg){
                console.error( msg );
            });
        }
      
        
        
    }
    ConsultarEstadoAsistencia();
    
   
    function ConsultaAprendiz(boton, div, latitud, longitud)
    {
        var idSesionAp = $.trim($('#idSesionAp').val());
        
        if(idSesionAp !== "")
        {
            let opcion = "ConsultaAprendiz"
            $.ajax({
                url: 'app/controlador/AprendizControlador.php',
                type: 'POST',
                data: {
                    opcion: opcion,
                    idSesionAp: idSesionAp
                }
            }).done(function(resp){
                var data = JSON.parse(resp);
                if(data)
                {
                    var idFicha = data.ID_FICHA;
                    var idPrograma = data.ID_PROGRAMA;
                    var identificacion = data.DOCUMENTO;
                    var nombre = data.NOMBRES;
                    var apellido = data.APELLIDOS;
                    var ficha = data.FICHA;
                    var programa = data.PROGRAMA;
                    
                    registrarAsistencia(idFicha, idPrograma, boton, div);
                   
                }
                else
                {
                    alert("ERROR PERSONAL");   
                }
            })
        }
        
    }
    
    function registrarAsistencia(idFicha, idPrograma, boton, div)
    {
        var idSesionAp = $.trim($('#idSesionAp').val());

        if(idSesionAp !== "")
        {
            let opcion = "ValidaAsistenciaAprendices";
            //Ejemplo validar asistencia
             $.ajax({
                url: 'app/controlador/AprendizControlador.php',
                type: 'POST',
                data: {
                    fecha: fecha,
                    idSesionAp : idSesionAp, 
                    opcion: "ValidaAsistenciaAprendices"
                }
            }).done(function (resp){
                var data = JSON.parse(resp);
                
                if(data.asistidoDia >= 1)
                {
                  
                    RegistrarSalida(idSesionAp, idFicha, idPrograma,  div);

                }
                else
                {
                    
                    RegistrarAsistencia(idSesionAp, idFicha, idPrograma,  div);  
                }
            })
            
        }
        else
        {
            Swal.fire({
                title: '¡El campo se encuentra vacio!',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            }) 
        }
        
    }
    
    function RegistrarAsistencia(idSesionAp, idFicha, idPrograma,  div){
        let opcion = "RegistrarIngreso";
        $.ajax({
            url: 'app/controlador/AprendizControlador.php',
            type: 'POST',
            data: {
                fecha: fecha,
                hora: hora,
                opcion: opcion,
                idSesionAp: idSesionAp,
                idFicha: idFicha,
                idPrograma: idPrograma
            }
        }).done(function(data){
            if (div.hasClass('btn-success'))
            {
                div.removeClass('btn-success');
                div.addClass('btn-danger');
                $('#btnAndres').attr('data-id', 0);
                $('#btnAndres').text('Salir');
            }
            Swal.fire({
                position: 'bottom-start',
                title: 'Se ha registrado la Asistencia con Exito!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
            
        }).fail(function(data){
            
            Swal.fire({
                position: 'bottom-start',
                title: 'Ocurrio un error al registrar la Asistencia!',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
            
        })
    }
    
    function RegistrarSalida(idSesionAp, idFicha, idPrograma, div){
        let opcion = "Redecicion";
        $.ajax({
            url: 'app/controlador/AprendizControlador.php',
            type: 'POST',
            data:{
                opcion: opcion,
                idSesionAp: idSesionAp
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data['tbl_aprendiz_PRESENTE'] === 0){
                let opcion = "RegistrarReingreso";
                $.ajax({
                        url: 'app/controlador/AprendizControlador.php',
                        type: 'POST',
                        data:{
                            fecha: fecha,
                            hora: hora,
                            opcion: opcion,
                            idSesionAp: idSesionAp,
                            idFicha: idFicha,
                            idPrograma: idPrograma
                        }
                    }).done(function(){
                        if (div.hasClass('btn-success'))
                        {
                            div.removeClass('btn-success');
                            div.addClass('btn-danger');
                            $('#btnAndres').attr('data-id', 0);
                            $('#btnAndres').text('Salir');
                        }
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Se ha registrado la Asistencia con Exito! Nuevamente',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        
                    }).fail(function(){

                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Asistencia nuevamente!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        
                    })
            }else if(data['tbl_aprendiz_PRESENTE'] == 1) {
                let opcion = "RegistrarSalida";
                $.ajax({
                    url: 'app/controlador/AprendizControlador.php',
                    type: 'POST',
                    data:{
                        fecha: fecha,
                        hora: hora,
                        opcion: opcion,
                        idSesionAp: idSesionAp,
                        idFicha: idFicha,
                        idPrograma: idPrograma
                    }
                }).done(function(){
                    if (div.hasClass('btn-danger'))
                    {
                      div.removeClass('btn-danger');
                      div.addClass('btn-success');
                      $('#btnAndres').attr('data-id', 1);
                      $('#btnAndres').text('Ingresar');
                      
                    }
                    Swal.fire({
                        position: 'bottom-start',
                        title: 'Registrada su Salida con Exito!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    
                }).fail(function(){
                    
                    Swal.fire({
                        position: 'bottom-start',
                        title: 'Ocurrio un error al registrar la Salida!',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    
                })
            }
        })        
    }
    
    // CERTIFICACION
// onchange de documento de identidad para vailadar la extension del archivo

    $('#certificacion_DI').bind('change', function () {
        var filename = $(this).val();
        var extension = filename.split('.');
        ext = extension[extension.length-1];
        if (/^\s*$/.test(filename)) {
          $("#fileDI").removeClass('active');
          $("#noFile1").text("Ningun Archivo Seleccionado"); 
        }
        else 
        {
            if(ext === "pdf")
            {
                contador1 = contador1+1;
                $("#fileDI").removeClass('danger');
                $("#fileDI").addClass('active');
                $("#noFile1").text(filename.replace("C:\\fakepath\\", ""));
                if(contador1>0 && contador2>0 && contador3>0  && contador4>0)
                {
                   $("#EnviarCertificacion").prop('disabled', false);
                   $("#ActualizarCertificacion").prop('disabled', false);
                }
            }
            else
            {
                contador1 = contador1-1;
                $("#EnviarCertificacion").prop('disabled', true);
                $("#ActualizarCertificacion").prop('disabled', true);
                swal("", "El archivo debe estar en formato PDF", "error");
                $("#fileDI").removeClass('active');
                $("#fileDI").addClass('danger');
                $("#noFile1").text("Ningun Archivo Seleccionado"); 
            }
        }
      });

// onchange de bitacora para vailadar la extension del archivo

      $('#certificacion_Bitacora').bind('change', function () {
        var filename = $(this).val();
        var extension = filename.split('.');
        ext = extension[extension.length-1];
        if (/^\s*$/.test(filename)) {
          $("#fileBitacora").removeClass('active');
          $("#noFile2").text("Ningun Archivo Seleccionado"); 
        }
        else 
        {
            if(ext === "pdf")
            {
                contador2 = contador2+1;
                $("#fileBitacora").removeClass('danger');
                $("#fileBitacora").addClass('active');
                $("#noFile2").text(filename.replace("C:\\fakepath\\", "")); 
                if(contador1>0 && contador2>0 && contador3>0 && contador4>0)
                {
                   $("#EnviarCertificacion").prop('disabled', false);
                   $("#ActualizarCertificacion").prop('disabled', false);
                }
            }
            else
            {
                contador2= contador2-1;
                $("#EnviarCertificacion").prop('disabled', true);
                $("#ActualizarCertificacion").prop('disabled', true);
                swal("", "El archivo debe estar en formato PDF", "error");
                $("#fileBitacora").removeClass('active');
                $("#fileBitacora").addClass('danger');
                $("#noFile2").text("Ningun Archivo Seleccionado"); 
            }
        }
      });


// onchange de constancia para vailadar la extension del archivo

      $('#certificacion_ConstanciaP').bind('change', function () {
        var filename = $(this).val();
        var extension = filename.split('.');
        ext = extension[extension.length-1];
        if (/^\s*$/.test(filename)) {
          $("#fileConstancia").removeClass('active');
          $("#noFile3").text("Ningun Archivo Seleccionado"); 
        }
        else 
        {
            if(ext === "pdf")
            {
                contador3 = contador3+1;
                $("#fileConstancia").removeClass('danger');
                $("#fileConstancia").addClass('active');
                $("#noFile3").text(filename.replace("C:\\fakepath\\", "")); 
                if(contador1>0 && contador2>0 && contador3>0 && contador4>0)
                {
                   $("#EnviarCertificacion").prop('disabled', false);
                   $("#ActualizarCertificacion").prop('disabled', false);
                }
            }
            else
            {
                contador3 = contador3-1;
                $("#EnviarCertificacion").prop('disabled', true);
                $("#ActualizarCertificacion").prop('disabled', true);
                swal("", "El archivo debe estar en formato PDF", "error");
                $("#fileConstancia").removeClass('active');
                $("#fileConstancia").addClass('danger');
                $("#noFile3").text("Ningun Archivo Seleccionado"); 
            }
        }
      });

// onchange de carnet para vailadar la extension del archivo

      $('#certificacion_CarnetD').bind('change', function () {
        var filename = $(this).val();
        var extension = filename.split('.');
        ext = extension[extension.length-1];
        if (/^\s*$/.test(filename)) {
          $("#fileCarnet").removeClass('active');
          $("#noFile4").text("Ningun Archivo Seleccionado"); 
        }
        else 
        {
            if(ext === "pdf")
            {
                contador4 = contador4+1;
                $("#fileCarnet").removeClass('danger');
                $("#fileCarnet").addClass('active');
                $("#noFile4").text(filename.replace("C:\\fakepath\\", "")); 
                if(contador1>0 && contador2>0 && contador3>0 && contador4>0)
                {
                   $("#EnviarCertificacion").prop('disabled', false);
                   $("#ActualizarCertificacion").prop('disabled', false);
                }
            }
            else
            {
                contador4= contador4-1;
                $("#EnviarCertificacion").prop('disabled', true);
                $("#ActualizarCertificacion").prop('disabled', true);
                swal("", "El archivo debe estar en formato PDF", "error");
                $("#fileCarnet").removeClass('active');
                $("#fileCarnet").addClass('danger');
                $("#noFile4").text("Ningun Archivo Seleccionado"); 
            }
        }
      });

      // enviar documentacion
     
       $(document).on("click", "#EnviarCertificacion", function () {
        
            a1 = $('#certificacion_DI').val();
            a2= $('#certificacion_Bitacora').val();
            a3 = $('#certificacion_ConstanciaP').val();
            a4 = $('#certificacion_CarnetD').val();
            if(a1=="" || a2=="" || a3=="" || a4=="")
            {
                swal("", "FALTAN ARCHIVOS POR SUBIR", "error");
            }
            else
            {
                id_aprendiz=$("#idSesionAp").val();
            Swal.fire('Subiendo Archivos');
            Swal.showLoading();
            formData = new FormData();
            opcion="GuardarDocumentosCertificacion";
            documento_identidad = $('#certificacion_DI')[0].files[0];
            bitacora = $('#certificacion_Bitacora')[0].files[0];
            constancia_practicas = $('#certificacion_ConstanciaP')[0].files[0];
            carnet = $('#certificacion_CarnetD')[0].files[0];

            formData.append('id_aprendiz',id_aprendiz);
            formData.append('opcion',opcion);
            formData.append('documento_identidad',documento_identidad);
            formData.append('bitacora',bitacora);
            formData.append('constancia_practicas',constancia_practicas);
            formData.append('carnet',carnet);
            $.ajax({
                url: "app/controlador/AprendizControlador.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false
            }).done(function (data) {
                   if(data==1)
                   {
                      Swal.close();
                      swal("", "DOCUMENTOS SUBIDOS CORRECTAMENTE", "success").then((value) => { location.reload(); });
                   }
                   else
                   {
                    alert(data);
                   }
            });     
            }
            
         
      });

      


    function ConsultarCertificacionAprendiz(id)
     {
        opcion = "ConsultarDocumentacionAprendiz";
        $.ajax({
            url: "app/controlador/AprendizControlador.php",
            type: "POST",
            data: { opcion: opcion, id_aprendiz: id }
        }).done(function (data) {
            datos = JSON.parse(data);
            var Ldatos=Object.keys(datos).length;
            if(Ldatos!=0)
            {
                $("#ActualizarCertificacion").prop('disabled', true);
                $("#ActualizarCertificacion").show();
                file1 = datos.documento_identidad.split('/');
                file2 = datos.bitacora.split('/');
                file3 = datos.constancia.split('/');
                file4= datos.carnet.split('/');
                $("#noFile1").text(file1[5]); 
                $("#noFile2").text(file2[5]); 
                $("#noFile3").text(file3[5]); 
                $("#noFile4").text(file4[5]); 
                $("#fileDI").addClass('active');
                $("#fileBitacora").addClass('active');
                $("#fileConstancia").addClass('active');
                $("#fileCarnet").addClass('active');
                contador1=1;
                contador2=1;
                contador3=1;
                contador4=1;
                var fileDI =file1[5];
                var fileBitacora=file2[5];
                var fileConstancia =file3[5];
                var fileCarnet=file4[5];


                 // ACTUALIZAR documentacion
                $(document).on("click", "#ActualizarCertificacion", function () {
                    Swal.fire('Subiendo Archivos');
                    Swal.showLoading();
                    a1 = $('#certificacion_DI').val();
                    a2= $('#certificacion_Bitacora').val();
                    a3 = $('#certificacion_ConstanciaP').val();
                    a4 = $('#certificacion_CarnetD').val();
                    id_aprendiz=$("#idSesionAp").val();
                    opcion="ActualizarDocumentosCertificacion";
                    if(a1==""){
                        documento_identidad =fileDI;
                    }
                    else {
                        documento_identidad = $('#certificacion_DI')[0].files[0];
                    }
                    if(a2==""){
                        bitacora =fileBitacora;
                    }
                    else {
                        bitacora = $('#certificacion_Bitacora')[0].files[0];
                    }
                    if(a3==""){
                        constancia_practicas =fileConstancia;
                    }
                    else {
                        constancia_practicas = $('#certificacion_ConstanciaP')[0].files[0];
                    }
                    if(a4==""){
                        carnet =fileCarnet;
                    }
                    else {
                        carnet = $('#certificacion_CarnetD')[0].files[0];
                    }
                    formData = new FormData();
                    formData.append('id_aprendiz',id_aprendiz);
                    formData.append('opcion',opcion);
                    formData.append('documento_identidad',documento_identidad);
                    formData.append('bitacora',bitacora);
                    formData.append('constancia_practicas',constancia_practicas);
                    formData.append('carnet',carnet);
                    formData.append('filedi',fileDI);
                    formData.append('filebitacora',fileBitacora);
                    formData.append('fileconstancia',fileConstancia);
                    formData.append('filecarnet',fileCarnet);
                    
                    $.ajax({
                        url: "app/controlador/AprendizControlador.php",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false
                    }).done(function (data) {
                        if(data==1)
                        {
                           Swal.close();
                           swal("", "DOCUMENTOS SUBIDOS CORRECTAMENTE", "success").then((value) => { location.reload(); });
                        }
                        else
                        {
                         alert(data);
                        }
                    });     

                })
            }
            else
            {
                $("#EnviarCertificacion").prop('disabled', true);
                $("#EnviarCertificacion").show();
            }
           
        });
    }

    ConsultarCertificacionAprendiz(id);






    // VISUALIZACION DE CONTADORES EN EL INDEX
    
    ContadorInasistencia();
    function ContadorInasistencia()
    {
        let id = $.trim($('#idSesionAp').val());
        let opcion = "ContadorInasistencia";
        $.ajax({
            url: 'app/controlador/AprendizControlador.php',
            type: 'POST',
            data: {
                id: id,
                opcion: opcion
            }
        }).done(function(resp){
            let datos = JSON.parse(resp);
            let inasistencia = datos.inasistencia;
            if(inasistencia == 2)
            {
                Swal.fire({
                    title: '¡Llevas 2 inasistencias, una proxima y te desertaremos!',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 3500
                })
            }
            else if(inasistencia == 3)
            {
                Swal.fire({
                    title: '¡Haz sido desertado, por favor comunicarse con su instructor!',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 3500
                })
            }
            $('#inas').html(inasistencia);
            
        }).fail(function(){
            alert("error");
        })
        ContadorExcusa(id);
        ContadorCasosA(id);
        ContadorCasosC(id);
    }
    
    function ContadorExcusa(id)
    {
        //let id = $.trim($('#idSesionAp').val());
        let opcion = "ContadorExcusa";
        $.ajax({
            url: 'app/controlador/AprendizControlador.php',
            type: 'POST',
            data: {
                id: id,
                opcion: opcion
            }
        }).done(function(resp){
            let datos = JSON.parse(resp);
            let excusas = datos.excusa;

            $('#excusas').html(excusas);

        }).fail(function(){
            alert("error");
        })
    }
    
    function ContadorCasosA(id)
    {
        //let id = $.trim($('#idSesionAp').val());
        let opcion = "ContadorCasosA";
        $.ajax({
            url: 'app/controlador/AprendizControlador.php',
            type: 'POST',
            data: {
                id: id,
                opcion: opcion
            }
        }).done(function(resp){
            let datos = JSON.parse(resp);
            let casosA = datos.casosA;
            
            $('#casosA').html(casosA);

        }).fail(function(){
            alert("error");
        })
    }
    
    function ContadorCasosC(id)
    {
        //let id = $.trim($('#idSesionAp').val());
        let opcion = "ContadorCasosC";
        $.ajax({
            url: 'app/controlador/AprendizControlador.php',
            type: 'POST',
            data: {
                id: id,
                opcion: opcion
            }
        }).done(function(resp){
            let datos = JSON.parse(resp);

            let casosC = datos.casosC;

            $('#casosC').html(casosC);
        }).fail(function(){
            alert("error");
        })
    }



    function MiHorarioAprendiz(ficha) {
        opcion = "ConsultarHorarioFicha";
        id_ficha = ficha;
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
                    $('#' + posicion).html('<label style="font-size:9px;">' + instructor + '<br>' + competencia + '<br>' + salon + '</label>');
                }
            }
        });
    }
    
      MiHorarioAprendiz(fichaAP);

  
});




