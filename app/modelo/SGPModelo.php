<?php
require_once "conexion.php";

class SGPModelo{
    static public function GuardarProducto($datos){
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_sgp_productos (tbl_sgp_programa_ID, tbl_sgp_producto_CATEGORIA, tbl_sgp_producto_NOMBRE) VALUES (:programa, :categoria, :producto)");
            $x->bindParam(":programa", $datos['programa'], PDO::PARAM_INT);
            $x->bindParam(":categoria", $datos['categoria'], PDO::PARAM_STR);
            $x->bindParam(":producto", $datos['producto'], PDO::PARAM_STR);
             if($x->execute()){
                 return true;
             }else{
                 return false;
             }
}

 static public function ListarProducto(){
     $x=Conexion::conectar()->prepare("SELECT tbl_sgp_producto_ID as id_producto, tbl_programa_NOMBRE as programa, tbl_sgp_producto_CATEGORIA as categoria, tbl_sgp_producto_NOMBRE as producto
     FROM tbl_sgp_productos INNER JOIN tbl_programa ON tbl_sgp_programa_ID = tbl_programa_ID");
     $x->execute();
     return $x->fetchAll(PDO::FETCH_ASSOC);
 }
 
 static public function ActulizarProducto($id_producto){
     $x=Conexion::conectar()->prepare("");
     $x->execute();
     return $x->fetchAll(PDO::FETCH_ASSOC);
 }
 static public function EliminarProducto($id_producto){
     $x=Conexion::conectar()->prepare("DELETE FROM tbl_sgp_productos WHERE tbl_sgp_producto_ID=:id_producto");
    $x->bindParam(":id_producto", $id_producto, PDO::PARAM_INT);
             if($x->execute()){
                 return true;
             }else{
                 return false;
             }
 }
}
?>