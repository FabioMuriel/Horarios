<main id="main" class="main">


    <section class="section dashboard"  style="right:100px">
      <div class="card">
        <div class="card-body">
           <div class="row">
            <div class="col-md-8">
                <div class="card">
                        <div class="card-body m-4">
                            <form id="FrmDatos" action="" method="post" class="form-card">
                                
                                <div class="row">
                                    
                                     <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group" style=" margin-top: 22px;">
                                                <label for="exampleInputPassword1">Identificacion</label>
                                                <input type="number" class="form-control" id="Identificacion" placeholder="" maxLength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" autofocus>
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                                <input type="hidden" class="form-control">
                                             </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Perfil</label>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="Perfil" id="AdminPerfil" value="3" disabled>
                                                        ADMINISTRADOR
                                                    </label>
                                                </div>
                                                <div>
                                                	<label>
                                                		<input type="radio" name="Perfil" id="ApendizPerfil" value="1" disabled>
                                                		APRENDIZ
                                                	</label>
                                                </div>
                                                <div>
                                                	<label>
                                                		<input type="radio" name="Perfil" id="InstructorPerfil" value="2" disabled>
                                                		INSTRUCTOR
                                                	</label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="Perfil" id="BienestarPerfil" value="4" disabled>
                                                        BIENESTAR
                                                    </label>
                                                </div>
                                                <div>
                                                    <label>
                                                        <input type="radio" name="Perfil" id="InvitadoPerfil" value="3" disabled>
                                                        INVITADOS
                                                    </label>
                                                </div>
                                                
                                                 
                                             </div>
                                        </div>
                                    </div>
                                <div class="col-md-6">
                                    <button id="Limpiar" type="button" class="btn btn-outline-info btn-round" style="width: 100%" name="">Limpiar</button>
                                </div>
                                <div class="col-md-6 pb-5">
                                    <button type="button" class="btn btn-info btn-round" id="Consultar" style="width: 100%" name="" focus="">Consultar</button>
                                </div>
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Nombres</label>
                                                <input id="Nombres" type="text" class="form-control" id="exampleInputPassword2" placeholder="" readonly>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" form-group">
                                        <div class="form-group">
                                            <label for="exampleInputPassword2">Apellidos</label>
                                            <input id="Apellidos" type="text" class="form-control" id="exampleInputPassword2" placeholder="" readonly>
                                         </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row" id="Instructor">
                                    <div class="col-md-6" >
                                        <div class=" form-group">
                                            <div class="form-group">
                                                <label for="exampleInputPassword2">Ficha</label>
                                                <input id="Ficha" type="text" class="form-control" id="exampleInputPassword2" placeholder="" readonly >
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <div class="form-group">
                                                <label for="exampleInputPassword3">Programa</label>
                                                <input id="Programa" type="text" class="form-control" id="exampleInputPassword3" placeholder=""readonly >
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex justify-content-center" id="Mensaje">
                    
                </div>
                
        </div>
    </div>
</div>

<link href="<?php echo URL_SEE;?>css/sweetalert2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $("#DataPersonal").hide();
    
    function mueveReloj(){
        momentoActual = new Date()
        hora = momentoActual.getHours()
        minuto = momentoActual.getMinutes()
        segundo = momentoActual.getSeconds()
    
        str_segundo = new String (segundo)
        if (str_segundo.length == 1)
           segundo = "0" + segundo
    
        str_minuto = new String (minuto)
        if (str_minuto.length == 1)
           minuto = "0" + minuto
    
        str_hora = new String (hora)
        if (str_hora.length == 1)
           hora = "0" + hora
    
        horaImprimible = hora + " : " + minuto + " : " + segundo
    
        document.form_reloj.reloj.value = horaImprimible
    
        setTimeout("mueveReloj()",1000)
        if(horaImprimible == "16 : 43 : 00"){
            alert("Esta es la hora")
        }
    }
    
    document.getElementById("Limpiar").addEventListener("click", function(){
        Limpiar();
    }, false);
    
    document.getElementById("Consultar").addEventListener("click", function() {
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'visible';
        contenedor.style.opacity = '1';
        
        var Identificacion = $("#Identificacion").val();
        ExtraerIdentificacion(Identificacion);
    }, false);
    
    $(document).keypress(function(e) {
        if(e.which == 13){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'visible';
    		contenedor.style.opacity = '1';
            
            var Identificacion = $("#Identificacion").val();
            ExtraerIdentificacion(Identificacion);
        }
    });
    
    function timeout(){
        setTimeout(function(){
            document.getElementById('FrmDatos').reset();
            $("#Identificacion").focus();
            $("#Mensaje").html("");
            $("#Mensaje").show();
        },2500,"JavaScript");
    }
    
    function Limpiar(){
        timeout();
    }
    
    
    function ExtraerIdentificacion(Identificacion){
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/ExtraerIdentificacion',
            type: 'POST',
            data: {
                Identificacion : Identificacion,
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data){
                var Perfil = data['CARGO'];
                if(Perfil == "INSTRUCTOR"){
                    $("#Instructor").hide();
                    $("#InstructorPerfil").prop("checked", "checked" );
                }else if(Perfil == "APRENDIZ"){
                    $("#Instructor").show();
                    $("#ApendizPerfil").prop("checked", "checked");
                }else if(Perfil == 'X'){
                    $("#Instructor").hide();
                    $("#InvitadoPerfil").prop("checked", "checked");
                }
                ConsultaRegistro(Identificacion, Perfil);
            }else{
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = '0';
                
                Swal.fire({
                    title: 'No se encontro el número de documento!',
                    icon: 'error',
                    showConfirmButton: false,
                    timer: 2000
                })
                Limpiar();
            }
        });
    }
    
    function ConsultaRegistro(Identificacion, Perfil){
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/ConsultaAutoReporte',
            type: 'POST',
            data: {
                Identificacion : Identificacion,
                Perfil : Perfil
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data){
                $("#Nombres").val(data['NOMBRES']);
                $("#Apellidos").val(data['APELLIDOS']);
                $("#Ficha").val(data['FICHA']);
                $("#Programa").val(data['PROGRAMA']);
                $("#IdPersonal").val(data['ID_PERSONAL']);
                $("#IdFicha").val(data['ID_FICHA']);
                $("#IdPrograma").val(data['ID_PROGRAMA']);
                
                var contenedor = document.getElementById('contenedor_carga');
        		contenedor.style.visibility = 'hidden';
        		contenedor.style.opacity = '0';
        		
                $("#Mensaje").html("<div class='card bg-success slide-in-top text-center border-0' style='width: 22rem;'><img class='card-img-top rounded mt-4 mx-auto d-block ' src='<?php echo URL_SEE;?>/images/autorizado.png' style='width: 200px' alt='Card image cap'><div class='card-body m-1'><h5 class='card-title text-White'><strong>ACCESO PERMITIDO</strong></h5>Bienvenido, usted puede ingresar siga teniendo presente los protocolos de bioseguridad</div></div>");
                $("#Mensaje").show();
                RegistraAsistencia();
                Limpiar();
                let vector = [
                    data['FIEBRE'],
                    data['ULTIMOS'],
                    data['TOS'],
                    data['DIFICULTA'],
                    data['FATIGA'],
                    data['PERDIDA'],
                    data['CABEZA'],
                    data['DOLORES'],
                    data['NAUSEAS'],
                    data['GARGANTA']
                ];
                for (var indice in vector) {
                    if(vector[indice] == 1){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        $("#Mensaje").html("<div class='card bg-danger slide-in-top text-center border-0' style='width: 22rem;'><img class='card-img-top rounded mt-4 mx-auto d-block ' src='<?php echo URL_SEE;?>/images/restringido.png' style='width: 200px' alt='Card image cap'><div class='card-body m-1'><h5 class='card-title text-White'><strong>ACCESO DENEGADO</strong></h5>Usted no puede ingresar a la sede debe esperar a que su salud mejore.</div></div>");
                        $("#Mensaje").show();
                        $("#RegistrarAsistencia").hide();
                        Limpiar();
                    }
                }
                if(vector[0] == 0){
                    if(vector[1] == 0){
                        if(vector[2] == 0){
                            if(vector[3] == 0){
                                if(vector[4] == 0){
                                    if(vector[5] == 0){
                                        if(vector[6] == 0){
                                            if(vector[7] == 0){
                                                if(vector[8] == 0){
                                                    if(vector[9] == 0){
                                                        var contenedor = document.getElementById('contenedor_carga');
                                                		contenedor.style.visibility = 'hidden';
                                                		contenedor.style.opacity = '0';
                                                		
                                                        $("#Mensaje").html("<div class='card bg-success slide-in-top text-center border-0' style='width: 22rem;'><img class='card-img-top rounded mt-4 mx-auto d-block ' src='<?php echo URL_SEE;?>/images/autorizado.png' style='width: 200px' alt='Card image cap'><div class='card-body m-1'><h5 class='card-title text-White'><strong>ACCESO PERMITIDO</strong></h5>Bienvenido, usted puede ingresar siga teniendo presente los protocolos de bioseguridad</div></div>");
                                                        $("#Mensaje").show();
                                                        RegistraAsistencia();
                                                        Limpiar();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                var contenedor = document.getElementById('contenedor_carga');
                contenedor.style.visibility = 'hidden';
                contenedor.style.opacity = '0';
                
                $("#Mensaje").html("<div class='card bg-warning slide-in-top text-center border-0' style='width: 22rem;'><img class='card-img-top rounded mt-4 mx-auto d-block ' src='<?php echo URL_SEE;?>/images/restringido.png' style='width: 200px' alt='Card image cap'><div class='card-body m-1'><h5 class='card-title text-White'><strong>USTED NO TIENE AUTOREPORTE</strong></h5>Usted no puede ingresar por favor debe realizar el autoreporte.</div></div>");
                $("#Mensaje").show();
                $("#RegistrarAsistencia").hide();
                Limpiar();
            }
        })
    }
    
    function RegistraAsistencia(){
        var IdPersonal = $("#IdPersonal").val();
        var IdFicha = $("#IdFicha").val();
        var IdPrograma = $("#IdPrograma").val();
        var Perfil = $('input:radio[name=Perfil]:checked').val();
        var Identificacion = $("#Identificacion").val();
        if(Identificacion != ""){
            if(Perfil == 2){
                if(IdPersonal != ""){
                    $.ajax({
                            url: '<?php echo URL_SEE?>AutoReporte/ValidaAsistenciaInstructor',
                            type: 'POST',
                            data: {IdPersonal : IdPersonal}
                        }).done(function (resp){
                            var data = JSON.parse(resp);
                            if(data['tbl_instructor_ID'] == IdPersonal){
                                var contenedor = document.getElementById('contenedor_carga');
                                contenedor.style.visibility = 'hidden';
                                contenedor.style.opacity = '0';
                                
                                RegistrarSalidaInstructor(IdPersonal);
                            $('#Mensaje').html("");
                            }else{
                                var contenedor = document.getElementById('contenedor_carga');
                                contenedor.style.visibility = 'hidden';
                                contenedor.style.opacity = '0';
                                
                                RegistrarAsistenciaInstructor(IdPersonal);  
                            }
                        })
                }else{
                    var contenedor = document.getElementById('contenedor_carga');
                    contenedor.style.visibility = 'hidden';
                    contenedor.style.opacity = '0';
                    
                    Swal.fire({
                        title: 'No se encontro un registro por lo tanto no es posible registrar la asistencia!',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    Limpiar();
                }
            }else if(Perfil == 1){
                if(IdPersonal != ""){
                    $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/ValidaAsistenciaAprendices',
                        type: 'POST',
                        data: {IdPersonal : IdPersonal}
                    }).done(function (resp){
                        var data = JSON.parse(resp);
                        if(data['tbl_personal_ID'] == IdPersonal){
                            var contenedor = document.getElementById('contenedor_carga');
                            contenedor.style.visibility = 'hidden';
                            contenedor.style.opacity = '0';
                           
                            RegistrarSalida(IdPersonal);
                        $('#Mensaje').html("");
                        }else{
                            var contenedor = document.getElementById('contenedor_carga');
                            contenedor.style.visibility = 'hidden';
                            contenedor.style.opacity = '0';
                            
                            RegistrarAsistencia(IdPersonal, IdFicha, IdPrograma);  
                        }
                    })
                }else{
                    var contenedor = document.getElementById('contenedor_carga');
                    contenedor.style.visibility = 'hidden';
                    contenedor.style.opacity = '0';
                    
                    Swal.fire({
                        title: 'No se encontro un registro por lo tanto no es posible registrar la asistencia!',
                        icon: 'error',
                        showConfirmButton: false,
                        timer: 2000
                    })
                Limpiar();
                }
            } else {
                if(Perfil == 3){
                    if(IdPersonal != ""){
                        $.ajax({
                            url: '<?php echo URL_SEE?>AutoReporte/ValidaAsistenciaInvitados',
                            type: 'POST',
                            data: {IdPersonal : IdPersonal}
                        }).done(function (resp){
                            var data = JSON.parse(resp);
                            if(data['tbl_invitados_ID'] == IdPersonal){
                                var contenedor = document.getElementById('contenedor_carga');
                                contenedor.style.visibility = 'hidden';
                                contenedor.style.opacity = '0';
                               
                                RegistrarSalidaInvitados(IdPersonal);
                            $('#Mensaje').html("");
                            }else{
                                var contenedor = document.getElementById('contenedor_carga');
                                contenedor.style.visibility = 'hidden';
                                contenedor.style.opacity = '0';
                                
                                RegistrarAsistenciaInvitados(IdPersonal);  
                            }
                        })
                    }else{
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            title: 'No se encontro un registro por lo tanto no es posible registrar la asistencia!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                    Limpiar();
                    }
                }
            }
            
        }else{
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                title: 'No se encontro un registro por lo tanto no es posible registrar la asistencia!',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })          
        }
    }
    
    function RegistrarAsistencia(IdPersonal, IdFicha, IdPrograma){
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/RegistrarAsistencia',
            type: 'POST',
            data:{
                IdPersonal: IdPersonal,
                IdFicha: IdFicha,
                IdPrograma: IdPrograma
            }
        }).done(function(){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                position: 'bottom-start',
                title: 'Se ha registrado la Asistencia con Exito!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
            Limpiar();
        }).fail(function(){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                position: 'bottom-start',
                title: 'Ocurrio un error al registrar la Asistencia!',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
            Limpiar();
        })
    }
    
    function RegistrarAsistenciaInstructor(IdPersonal){
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/RegistrarAsistenciaInstructor',
            type: 'POST',
            data:{
                IdPersonal: IdPersonal
            }
        }).done(function(){
            var contenedor = document.getElementById('contenedor_carga');
           	contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                title: 'Se ha registrado la Asistencia con Exito!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
            Limpiar();
        }).fail(function(){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                title: 'Ocurrio un error al registrar la Asistencia!',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
            Limpiar();
        })
    }
    
    function RegistrarAsistenciaInvitados(IdPersonal){
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/RegistrarAsistenciaInvitados',
            type: 'POST',
            data: {
                IdPersonal: IdPersonal
            }
        }).done(function(){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                title: '¡Se ha registrado la Asistencia del invitado!',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
            })
            Limpiar();
        }).fail(function(){
            var contenedor = document.getElementById('contendor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
            
            Swal.fire({
                title: '¡Ocurrio un error al registrar la Asistencia del invitado!',
                icon: 'error',
                showConfirmButton: false,
                timer: 2000
            })
            Limpiar();
        })
    }
    
    function RegistrarSalida(IdPersonal){
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'visible';
        contenedor.style.opacity = '1';
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/Redecicion',
            type: 'POST',
            data:{
                IdPersonal: IdPersonal
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data['tbl_aprendiz_PRESENTE'] == 0){
                $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/RegistrarReingreso',
                        type: 'POST',
                        data:{
                            IdPersonal: IdPersonal
                        }
                    }).done(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Se ha registrado la Asistencia con Exito! Nuevamente',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    }).fail(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Salida!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    })
            }else{
                if(data['tbl_aprendiz_PRESENTE'] == 1) {
                    $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/RegistrarSalida',
                        type: 'POST',
                        data:{
                            IdPersonal: IdPersonal
                        }
                    }).done(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Registrada su Salida con Exito!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    }).fail(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Salida!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    })
                }
            }
            Limpiar();
        })        
    }
    
    function RegistrarSalidaInstructor(IdPersonal){
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'visible';
        contenedor.style.opacity = '1';
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/RedecicionInstructor',
            type: 'POST',
            data:{
                IdPersonal: IdPersonal
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data['tbl_persona_PRESENTE'] == 0){
                $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/RegistrarReingresoInstructor',
                        type: 'POST',
                        data:{
                            IdPersonal: IdPersonal
                        }
                    }).done(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Se ha registrado la Asistencia con Exito! Nuevamente',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    }).fail(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Salida!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    })
            }else{
                if(data['tbl_persona_PRESENTE'] == 1) {
                    $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/RegistrarSalidaInstructor',
                        type: 'POST',
                        data:{
                            IdPersonal: IdPersonal
                        }
                    }).done(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Registrada su Salida con Exito!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    }).fail(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Salida!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    })
                }
            }
            Limpiar();
        })
    }
    
    function RegistrarSalidaInvitados(IdPersonal){
        var contenedor = document.getElementById('contenedor_carga');
        contenedor.style.visibility = 'visible';
        contenedor.style.opacity = '1';
        $.ajax({
            url: '<?php echo URL_SEE?>AutoReporte/RedecicionInvitados',
            type: 'POST',
            data:{
                IdPersonal: IdPersonal
            }
        }).done(function(resp){
            var data = JSON.parse(resp);
            if(data['tbl_invitados_PRESENTE'] == 0){
                $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/RegistrarReingresoInvitados',
                        type: 'POST',
                        data: {
                            IdPersonal: IdPersonal
                        }
                    }).done(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Se ha registrado la Asistencia con Exito! Nuevamente',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    }).fail(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Salida!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    })
            }else{
                if(data['tbl_invitados_PRESENTE'] == 1) {
                    $.ajax({
                        url: '<?php echo URL_SEE?>AutoReporte/RegistrarSalidaInvitados',
                        type: 'POST',
                        data: {
                            IdPersonal: IdPersonal
                        }
                    }).done(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Registrada su Salida con Exito!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    }).fail(function(){
                        var contenedor = document.getElementById('contenedor_carga');
                        contenedor.style.visibility = 'hidden';
                        contenedor.style.opacity = '0';
                        
                        Swal.fire({
                            position: 'bottom-start',
                            title: 'Ocurrio un error al registrar la Salida!',
                            icon: 'error',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        Limpiar();
                    })
                }
            }
            Limpiar();
        })
    }
    
    window.onload = function(){
		var contenedor = document.getElementById('contenedor_carga');
		contenedor.style.visibility = 'hidden';
		contenedor.style.opacity = '0'; 
	}
</script>

        </div>
      </div>
    </section>

  </main>