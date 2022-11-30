<?php
if(isset($_POST["opcion"]))
{
	require_once "../modelo/SGPModelo.php";
}
else
{
	//si la opcion no es mandada por ajax entra aqui
	require_once "app/modelo/SGPModelo.php";
}
class SGPControlador{
    public function GuardarProducto($datos){
        $respuesta= SGPModelo::GuardarProducto($datos);
        return $respuesta;
    }
    public function ListarProducto(){
        $respuesta= SGPModelo::ListarProducto();
        return $respuesta;
    }
      public function ActualizarProducto($id_producto){
        $respuesta= SGPModelo::ActualizarProducto($id_producto);
        return $respuesta;
    }
      public function EliminarProducto($id_producto){
        $respuesta= SGPModelo::EliminarProducto($id_producto);
        return $respuesta;
    }
}

if(isset($_POST["opcion"])){
    
 if($_POST["opcion"]=="GuardarProducto"){
     	$programa = (isset($_POST['programa'])) ? $_POST['programa'] : null;
     	$categoria= (isset($_POST['categoria'])) ? $_POST['categoria'] : null;
     	$producto = (isset($_POST['producto'])) ? $_POST['producto'] : null;
     
        $datos=[
            'programa' => $programa,
            'categoria'=> $categoria,
            'producto' => $producto
            ];
        $respuesta = new SGPControlador();
		$respuesta =$respuesta -> GuardarProducto($datos);
        if($respuesta != false){
            echo 1;
		}
		else{
	    	echo 2;
		}
 }
 else if($_POST["opcion"]=="ListarProducto"){
      $respuesta = new SGPControlador();
	  $respuesta =$respuesta -> ListarProducto();
      echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
 }
 else if($_POST["opcion"]=="ActualizarProducto"){
     
 }
 else if($_POST["opcion"]=="EliminarProducto"){
     	$id_producto = (isset($_POST['id_producto'])) ? $_POST['id_producto'] : null;
     	
     	$respuesta = new SGPControlador();
		$respuesta =$respuesta -> EliminarProducto($id_producto);
        if($respuesta != false){
            echo 1;
		}
		else{
	    	echo 2;
		}
     	
 }
 
}



?>