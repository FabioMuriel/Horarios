<?php
// llamamos al modelo conexion
require_once "conexion.php";

Class FuncionarioModelo{
    static public function ListarDocumentosAprendiz(){
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_DOCUMENTO as documento, A.tbl_aprendiz_NOMBRES as nombres, D.tbl_DI as Cdocumento, A.tbl_aprendiz_APELLIDOS as apellidos,P.tbl_programa_NOMBRE as programa
        FROM tbl_certificacion_aprendiz as D INNER JOIN tbl_aprendiz as A ON D.tbl_aprendiz_ID = A.tbl_aprendiz_ID INNER JOIN tbl_programa as P ON D.tbl_programa_ID = P.tbl_programa_ID");
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }
}
?>