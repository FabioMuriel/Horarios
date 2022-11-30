$(document).ready(function () {
    /*definicion de variables*/
   var id_sedeA=$("#id_sedeA").val();
   var opcion;
   var contador = 0;
   var fila;
   var Productos = [];
   
   
  /*llenado de tabla producto*/
   function llenartablaProducto() {
        var tablaProductos = $('#tablaProductos').DataTable({ retrieve: true, paging: false });
           tablaProductos.destroy();
           tablaProductos = $('#tablaProductos').DataTable({
               "ajax":{
                   "url" : "app/controlador/SGPControlador.php",
                   "method": 'POST', 
                "data": { opcion:"ListarProducto"}, 
                "dataSrc": ""
               },
               "columns":[
                   {
                       data:null,render: function(data, type, row){
                           contador=contador+1;
                           return "<b>"+contador+"</b>";
                       }
                   }, 
                   {"data": "programa"},
                   {"data":"categoria"},
                   {"data":"producto"},
                   {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="EDITAR PRODUCTO" ><button type="button" class="btn btn-primary BtnEditarProductos" data-id='+data.id_producto+'><i class="bi bi-pencil-square"></i></button></i>';
                    }
                },
                {
                    data: null, render: function ( data, type, row ) {
                        return '<i data-bs-toggle="tooltip"  data-bs-placement="top" title="ELIMINAR PRODUCTO" ><button type="button" data-id='+data.id_producto+' class="btn btn-danger  btnEliminarProductos" ><i class="bi bi-trash"></i></button></i>';
                    }
                }
                   
                   ]
           });
    
   }
   llenartablaProducto();
   /*agregar productos*/
    $('#AgregarProductos').submit(function (e) {
        e.preventDefault();
        programa = $.trim($("#ProgramasP").val());
        categoria =$.trim($("#CategoriaP").val());
        producto = $.trim($("#ProductoP").val());
        
        if (programa === "null" || categoria ==="null" || producto === "null"){
            swal("FALTAN DATOS POR LLENAR", "", "error");
        }else{
        opcion= "GuardarProducto";
        $.ajax({
            url: "app/controlador/SGPControlador.php",
             type: "POST",
              data: {opcion:opcion, programa:programa, categoria:categoria, producto:producto}
        }).done(function (data) {
            if(data == 1){
                 $('#ModalAgregarProducto').modal('hide');
                 $("#ModalAgregarProducto").find("input").val("");
                 $("#ModalAgregarProducto").find("select").val("null");
                 swal("GUARDADO EXITOSAMENTE", "", "success");
                } else {
                swal("ERROR AL GUARDAR EL PRODUCTO", "", "error");
            }
        });
        }
    });
    
    /*editar producto*/
    $(document).on("click", ".BtnEditarProductos", function(){
        $("#ModalEditarProducto").modal('show');
         id_producto=$.trim($("#IDP").val());
        $.ajax({
              url: "app/controlador/SGPControlador.php",
             type: "POST",
             data:{ opcion: "ConsultarProductos", id_producto:id_producto}
        }).done(function(res) {
            var datos = JSON.parse(res);
            $("#ProgramasEP").val(datos.programa);
            $("#CategoriaEP").val(datos.categoria);
            $("#ProductoEP").val(datos.programa);
           
        });
     
        
    })
    
    
    
    
    
    /*eliminar producto*/
    $(document).on("click", ".btnEliminarProductos", function () {
        opcion = "EliminarProducto";
        id_producto=$(this).data("id");
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
                    url: "app/controlador/SGPControlador.php",
                    type: "POST",
                    data: { opcion: opcion, id_producto: id_producto}
                 }).done (function (data) {
                    if(data==1)
                    {
                        swal("DATOS ELIMINADOS", "", "success");
                        tablaProductos.row(fila.parents('tr')).remove().draw(); 
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
    
    $(document).on("click", ".BtnEditarProductos", function () {
    idP = $(this).data("id");
    $("#IDP").val(idP);
  });

});