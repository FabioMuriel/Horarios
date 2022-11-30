$(document).ready(function () {
    var opcion;
    id_persona = $('#id_PERSONA').val();
    cargo = $('#cargo_PERSONA').val();

    $('#EnviarAutoreporte').submit(function (e) {
        e.preventDefault();

        sintomas = $('input:radio[name=sintomas]:checked').val();
        enfermedad = $('input:radio[name=enfermedad]:checked').val();
        tratamiento = $('input:radio[name=tratamiento]:checked').val();
        contacto = $('input:radio[name=contacto]:checked').val();
        fiebre = $('input:radio[name=fiebre]:checked').val();
        fiebre14 = $('input:radio[name=fiebre14]:checked').val();
        tos = $('input:radio[name=tos]:checked').val();
        respiracion = $('input:radio[name=respiracion]:checked').val();
        fatiga = $('input:radio[name=fatiga]:checked').val();
        olfato = $('input:radio[name=olfato]:checked').val();
        dolor_cabeza = $('input:radio[name=dolor_cabeza]:checked').val();
        pecho = $('input:radio[name=pecho]:checked').val();
        nauseas = $('input:radio[name=nauseas]:checked').val();
        garganta = $('input:radio[name=garganta]:checked').val();
        id_persona = $('#id_PERSONA').val();
        cargo = $('#cargo_PERSONA').val();

        if (cargo === "APRENDIZ") {
            opcion = "GuardarAutoreporteAprendiz";
            $.ajax({
                url: "app/controlador/AutoreporteControlador.php",
                type: "POST",
                data: { opcion: opcion, fiebre: fiebre, fiebre14: fiebre14, tos: tos, respiracion: respiracion, fatiga: fatiga, olfato: olfato, dolor_cabeza: dolor_cabeza, pecho: pecho, nauseas: nauseas, garganta: garganta, id_persona: id_persona }
            }).done(function (data) {
                if (data == 1) {
                    swal("", "REPORTE REALIZADO CON EXITO", "success");
                    $('#FormularioAutoreporte').hide();
                    $('#ContenedorDanger').hide();
                    $('#ContenedorSuccess').show();
                } else {
                    alert(data);
                }
            });

        }
        else {
            opcion = "GuardarAutoreporte";
            $.ajax({
                url: "app/controlador/AutoreporteControlador.php",
                type: "POST",
                data: { opcion: opcion, fiebre: fiebre, fiebre14: fiebre14, tos: tos, respiracion: respiracion, fatiga: fatiga, olfato: olfato, dolor_cabeza: dolor_cabeza, pecho: pecho, nauseas: nauseas, garganta: garganta, id_persona: id_persona }
            }).done(function (data) {
                if (data == 1) {
                    swal("", "REPORTE REALIZADO CON EXITO", "success");
                    $('#FormularioAutoreporte').hide();
                    $('#ContenedorDanger').hide();
                    $('#ContenedorSuccess').show();
                } else {
                    alert(data);
                }
            });

        }


    });


    function ConsultarAutoreporte(idp, cargoP) {
        if (cargoP === "APRENDIZ") {
            $.ajax({
                url: "app/controlador/AutoreporteControlador.php",
                type: 'post',
                data: { opcion: "ConsultarAutoreporteAprendiz", id_persona: idp }
            }).done(function (res) {
                if (res == 1) {
                    $('#FormularioAutoreporte').hide();
                    $('#ContenedorDanger').hide();
                    $('#ContenedorSuccess').show();
                }
                else {
                    $('#ContenedorSuccess').hide();
                    $('#FormularioAutoreporte').show();
                    $('#ContenedorDanger').show();
                }
            });
        }
        else {
            $.ajax({
                url: "app/controlador/AutoreporteControlador.php",
                type: 'post',
                data: { opcion: "ConsultarAutoreporte", id_persona: idp }
            }).done(function (res) {
                if (res == 1) {
                    $('#FormularioAutoreporte').hide();
                    $('#ContenedorDanger').hide();
                    $('#ContenedorSuccess').show();
                }
                else {
                    $('#ContenedorSuccess').hide();
                    $('#FormularioAutoreporte').show();
                    $('#ContenedorDanger').show();
                }
            });

        }

    }

    ConsultarAutoreporte(id_persona, cargo);


});