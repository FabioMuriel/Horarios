<?php
// llamamos al modelo 
require_once "../modelo/FuncionarioModelo.php";
 class FuncionarioControlador{
    public function ListarDocumentosAprendiz(){
     $respuesta = FuncionarioModelo::ListarDocumentosAprendiz();
     return $respuesta;
    }
}

if(isset($_POST["opcion"]))
{
 if($_POST["opcion"] == "listarDocumentosAprendiz"){
   $respuesta = new FuncionarioControlador();
   $respuesta =$respuesta -> ListarDocumentosAprendiz();
   echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
}
?>