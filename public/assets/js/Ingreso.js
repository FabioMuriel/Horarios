$(document).ready(function () {

    $('#ConsultarIngreso').submit(function (e) {
        e.preventDefault();
        identificacion = $.trim($('#identificacion').val());
        opcion = "ConsultarIngreso";
        $.ajax({
            url: "app/controlador/IngresoControlador.php",
            type: "POST",
            data: { opcion: opcion, identificacion: identificacion }
        }).done(function (data) {
            if (data == 0) {
                Swal.fire({
                    title: 'No se encontraron Datos',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                $('#identificacion').val("");
                datos=JSON.parse(data);
                nombre=datos.nombres+" "+datos.apellidos;
                perfil=datos.cargo;
                presente=datos.presente;
                imagen=datos.imagen;
                if(imagen=="")
                {
                    rutaAprendiz="public/assets/img/porteria.png";
                    rutaFuncionario="public/assets/img/porteria.png";
                }
                else
                {
                    rutaAprendiz= imagen;
                    rutaFuncionario= imagen;
                }

                if(perfil=="APRENDIZ")
                {
                   programa=datos.programa;
                   ficha=datos.ficha;
                   $("#nombrePorteria").val(nombre);
                   $("#perfilPorteria").val(perfil); 
                   $("#programaPorteria").val(programa); 
                   $("#fichaPorteria").val(ficha); 
                   $("#imagenPorteria").attr("src" , rutaAprendiz);
                   $("#PyF").show(); 
                }
                else if(perfil=="INSTRUCTOR")
                {
                   $("#nombrePorteria").val(nombre);
                   $("#perfilPorteria").val(perfil);
                   $("#imagenPorteria").attr("src" , rutaFuncionario);
                   $("#PyF").hide(); 
                }
                else if(perfil=="BIENESTAR")
                {
                   $("#nombrePorteria").val(nombre);
                   $("#perfilPorteria").val(perfil);
                    $("#imagenPorteria").attr("src" , rutaFuncionario);
                   $("#PyF").hide(); 
                }
                else if(perfil=="ADMINISTRADOR")
                {
                   $("#nombrePorteria").val(nombre);
                   $("#perfilPorteria").val(perfil);
                    $("#imagenPorteria").attr("src" , rutaFuncionario);
                   $("#PyF").hide(); 
                }
                else if(perfil=="INVITADO")
                {
                   $("#nombrePorteria").val(nombre);
                   $("#perfilPorteria").val(perfil);
                   $("#imagenPorteria").attr("src" , "public/assets/img/porteria.png");
                   $("#PyF").hide(); 
                }
                else if(perfil=="FUNCIONARIO")
                {
                   $("#nombrePorteria").val(nombre);
                   $("#perfilPorteria").val(perfil);
                   $("#imagenPorteria").attr("src" , rutaFuncionario);
                   $("#PyF").hide(); 
                }
                setTimeout(function(){
                    $("#nombrePorteria").val("");
                    $("#perfilPorteria").val("");
                    $("#programaPorteria").val(""); 
                    $("#fichaPorteria").val("");
                    $("#imagenPorteria").attr("src" ,"public/assets/img/porteria.png");
                },3500);

                if(presente=="1")
                {
                    Swal.fire({
                        title: 'Se ha registrado la Asistencia con Exito!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                else if(presente=="0")
                {
                    Swal.fire({
                        title: 'Se ha registrado la Salida con Exito!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                
            }
        });
    });


    $('#RegistrarInvitadoPorteria').submit(function (e) {
        e.preventDefault();
        nombres = $.trim($('#nombresInvitado').val());
        apellidos = $.trim($('#apellidosInvitado').val());
        telefono = $.trim($('#telefonoInvitado').val());
        sede = $.trim($('#sedeInvitado').val());
        numero_documento = $.trim($('#ndInvitado').val());
        tipo_documento = $.trim($('#tipoDCI').val());
        opcion = "GuardarInvitado";
        $.ajax({
            url: "app/controlador/PersonaControlador.php",
            type: "POST",
            data: {tipo_documento: tipo_documento, numero_documento: numero_documento, sede: sede, nombres: nombres, apellidos: apellidos, telefono: telefono,opcion: opcion }
        }).done(function (data) {
            if (data == 1) {
                swal("GUARDADO EXITOSAMENTE", "", "success");
                $('#RegistrarInvitadoPorteria').trigger("reset");
            } else {
                swal("EL INVITADO YA ESTA REGISTRADO", "", "error");
            }
        });
    });

});




