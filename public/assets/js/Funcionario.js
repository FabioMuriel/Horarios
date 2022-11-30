$(document).ready(function(){
    var opcion;
    var fila; 
    var contador=0;
     function llenarDocumetosAprendiz(){
        var tablaDocumetoAprendiz = $('#tablaDocumetoAprendiz').DataTable({ retrieve: true, paging: false });
           tablaDocumetoAprendiz.destroy();
           tablaDocumetoAprendiz = $('#tablaDocumetoAprendiz').DataTable({
           "ajax": {
                "url": "app/controlador/FuncionarioControlador.php",
                "method": 'POST', 
                "data": { opcion:"listarDocumentosAprendiz"}, 
                "dataSrc": ""
            },
            "columns":[
            {
             data: null, render: function (data, type, row)  {
                 contador=contador+1;
                 return "<b>"+contador+"</b>";
                }
             },
             {"data": "documento"},
             {
                data: null, render: function (data, type, row) {
                    // Combinar campos
                    return data.nombres+" "+data.apellidos;
                }
             },
              {"data": "programa"}
             
            ]
            });
    }
    llenarDocumetosAprendiz();
});
