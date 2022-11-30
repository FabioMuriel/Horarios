<?php

require_once "conexion.php";

Class AprendizModelo{
    static public function ListarAprendiz($id_sedeA,$cargoU)
    {
        if($cargoU=="PARAMETRIZACION")
        {
            $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
            A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as celular, A.tbl_aprendiz_DIRECCION as direccion,
            A.tbl_aprendiz_CORREO as correo, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as nombre_programa, T.tbl_tipodocumento_ABREVIATURA as tipo_documento,
            S.tbl_sede_NOMBRE as sede, C.tbl_centro_NOMBRE as centro, R.tbl_regional_NOMBRE as regional 
            FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN 
            tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID inner join tbl_sede as S on A.tbl_aprendiz_SEDE= S.tbl_sede_ID
            inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID");
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
            A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as celular, A.tbl_aprendiz_DIRECCION as direccion,
            A.tbl_aprendiz_CORREO as correo, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as nombre_programa, T.tbl_tipodocumento_ABREVIATURA as tipo_documento,
            S.tbl_sede_NOMBRE as sede, C.tbl_centro_NOMBRE as centro, R.tbl_regional_NOMBRE as regional 
            FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN 
            tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID inner join tbl_sede as S on A.tbl_aprendiz_SEDE= S.tbl_sede_ID
            inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID inner join tbl_regional as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID WHERE 
            tbl_aprendiz_SEDE=:sede");
            $x->bindParam(":sede", $id_sedeA, PDO::PARAM_INT);
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        
    }

    static public function GuardarAprendiz($datos,$vehiculo)
    {
        $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_aprendiz WHERE tbl_aprendiz_DOCUMENTO=:numero_documento");
        $y->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
        $y->execute();
        $n = $y->fetchColumn();
        if($n>0)
        {
          return false;
        }
        else
        {
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_aprendiz (tbl_aprendiz_ID,tbl_tipodocumento_ID,tbl_aprendiz_DOCUMENTO,tbl_aprendiz_NOMBRES,tbl_aprendiz_APELLIDOS,tbl_aprendiz_CELULAR ,tbl_aprendiz_CORREO,
           tbl_aprendiz_PASSWORD,tbl_aprendiz_DIRECCION, tbl_aprendiz_ESTADO, tbl_aprendiz_IMAGEN,tbl_ficha_ID,tbl_programa_ID,tbl_aprendiz_PRESENTE,tbl_aprendiz_SEDE,tbl_aprendiz_CARGO)  VALUES (NULL, :tipo_documento, :numero_documento, :nombres,
            :apellidos, :telefono, :correo, :password,  :direccion, :estado,:imagen, :ficha,:programa,'0',:sede,:cargo)");
            $x->bindParam(":tipo_documento", $datos['tipo_documento'], PDO::PARAM_INT);
            $x->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
            $x->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
            $x->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
            $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
            $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
            $x->bindParam(":password", $datos['contraseña'], PDO::PARAM_STR);
            $x->bindParam(":imagen", $datos['imagen'],PDO::PARAM_STR);
            $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
            $x->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
            $x->bindParam(":ficha", $datos['ficha'], PDO::PARAM_INT);
            $x->bindParam(":programa", $datos['programa'], PDO::PARAM_INT);
            $x->bindParam(":sede", $datos['sede'], PDO::PARAM_STR);
            $x->bindParam(":cargo", $datos['cargo'], PDO::PARAM_STR);
            $x->execute();
            
            if(empty($vehiculo)!=1)
            {
              $z=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz FROM tbl_aprendiz as A WHERE tbl_aprendiz_DOCUMENTO=:numero_documento");
              $z->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
              $z->execute();
              $resultado=$z->fetch(PDO::FETCH_ASSOC);
              $id_aprendiz=$resultado["id_aprendiz"];
   
              foreach($vehiculo as $fila) 
              { 
                $tipo_vehiculo=$fila->tipo_vehiculo;
                $placa=$fila->placa;
                $y=Conexion::conectar()->prepare("INSERT INTO  tbl_vehiculo_aprendiz (tbl_vehiculo_ID,tbl_aprendiz_ID,tbl_tipo_vehiculo,tbl_placa_vehiculo) 
                values (null,'$id_aprendiz','$tipo_vehiculo','$placa')");
                $y->execute();
              }
            }
        
         return true;
        }
    }

    static public function ConsultarAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
        A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as telefono, A.tbl_aprendiz_DIRECCION as direccion,
        A.tbl_aprendiz_CORREO as correo, A.	tbl_tipodocumento_ID as tipo_documento, A.tbl_aprendiz_ESTADO as estado, A.tbl_aprendiz_PASSWORD as password, F.tbl_ficha_ID as id_ficha, P.tbl_programa_ID as id_programa,
        A.tbl_aprendiz_SEDE as id_sede, S.tbl_centro_tbl_centro_ID as id_centro, C.tbl_regional_tbl_regional_ID as id_regional, tbl_aprendiz_IMAGEN as imagen
        FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN 
        tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID inner join tbl_sede as S on  A.tbl_aprendiz_SEDE =S.tbl_sede_ID inner join tbl_centro as C on
        S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID WHERE A.tbl_aprendiz_ID=:id_aprendiz");
         $x->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarAprendiz($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_tipodocumento_ID = :tipo_documento,tbl_aprendiz_DOCUMENTO = :numero_documento, tbl_aprendiz_NOMBRES = :nombres, 
        tbl_aprendiz_APELLIDOS = :apellidos,tbl_aprendiz_CELULAR = :telefono, tbl_aprendiz_CORREO = :correo, tbl_aprendiz_PASSWORD= :password, 	tbl_aprendiz_DIRECCION=:direccion, tbl_aprendiz_ESTADO =:estado,
        tbl_ficha_ID=:ficha, tbl_programa_ID=:programa, tbl_aprendiz_SEDE=:sede, tbl_aprendiz_IMAGEN=:imagen  WHERE tbl_aprendiz_ID = :id_aprendiz ");
          $x->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
          $x->bindParam(":tipo_documento", $datos['tipo_documento'], PDO::PARAM_INT);
          $x->bindParam(":numero_documento", $datos['numero_documento'], PDO::PARAM_INT);
          $x->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
          $x->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
          $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
          $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
          $x->bindParam(":password", $datos['contraseña'], PDO::PARAM_STR);
          $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
          $x->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
          $x->bindParam(":ficha", $datos['ficha'], PDO::PARAM_INT);
          $x->bindParam(":programa", $datos['programa'], PDO::PARAM_INT);
          $x->bindParam(":sede", $datos['sede'], PDO::PARAM_INT);
          $x->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
          if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_aprendiz WHERE tbl_aprendiz_ID=:id_aprendiz ");
        $x->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }
    
    static public function EstadoAsistencia($id)
    {
        //$x = Conexion::conectar()->prepare("SELECT * FROM tbl_aprendiz WHERE tbl_aprendiz_ID = :id");
        $x=Conexion::conectar()->prepare("SELECT T1.tbl_aprendiz_ID AS ID_PERSONAL, T1.tbl_aprendiz_DOCUMENTO AS DOCUMENTO, T1.tbl_aprendiz_NOMBRES AS NOMBRES, T1.tbl_aprendiz_APELLIDOS AS APELLIDOS, 
            T1.tbl_ficha_ID AS ID_FICHA, T1.tbl_programa_ID AS ID_PROGRAMA, T2.tbl_ficha_CODIGO AS FICHA, T3.tbl_programa_NOMBRE AS PROGRAMA, T1.tbl_aprendiz_PRESENTE AS ESTADO
            FROM tbl_aprendiz T1 INNER JOIN tbl_ficha T2 ON T1.tbl_ficha_ID = T2.tbl_ficha_ID 
            INNER JOIN tbl_programa T3 ON T1.tbl_programa_ID = T3.tbl_programa_ID 
            WHERE T1.tbl_aprendiz_ID = :idSesionAp");
        $x -> bindParam(":idSesionAp", $id, PDO::PARAM_INT);
        $x -> execute();
        return $x -> fetch(PDO::FETCH_ASSOC);
    }
    
    
    static public function ConsultaAprendiz($idSesionAp)
    {
        $x=Conexion::conectar()->prepare("SELECT T1.tbl_aprendiz_ID AS ID_PERSONAL, T1.tbl_aprendiz_DOCUMENTO AS DOCUMENTO, T1.tbl_aprendiz_NOMBRES AS NOMBRES, T1.tbl_aprendiz_APELLIDOS AS APELLIDOS, 
            T1.tbl_ficha_ID AS ID_FICHA, T1.tbl_programa_ID AS ID_PROGRAMA, T2.tbl_ficha_CODIGO AS FICHA, T3.tbl_programa_NOMBRE AS PROGRAMA
            FROM tbl_aprendiz T1 INNER JOIN tbl_ficha T2 ON T1.tbl_ficha_ID = T2.tbl_ficha_ID 
            INNER JOIN tbl_programa T3 ON T1.tbl_programa_ID = T3.tbl_programa_ID 
            WHERE T1.tbl_aprendiz_ID = :idSesionAp");
        
        $x->bindParam(":idSesionAp", $idSesionAp, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch(PDO::FETCH_ASSOC);
    }
    
    static public function ValidaAsistenciaAprendices($datos)
    {
        $x = Conexion::conectar2()->prepare("SELECT COUNT(*) AS asistidoDia FROM tbl_asistencia WHERE tbl_personal_ID = :idSesionAp AND tbl_asistencia_FECHA = :fecha");
        $x -> bindParam(":idSesionAp", $datos['idSesionAp'], PDO::PARAM_INT);
        $x -> bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
        $x -> execute();
        return $x -> fetch(PDO::FETCH_ASSOC);
    }
    
    
    static public function RegistrarIngresos($datos)
    {
        $x = Conexion::conectar2()->prepare("INSERT INTO tbl_asistencia(tbl_asistencia_FECHA, tbl_asistencia_HORA, tbl_personal_ID, 
        tbl_personal_ID_FICHA, tbl_personal_ID_PROGRAMA) VALUES (:fecha, :hora, :idSesionAp, :idFicha, :idPrograma)");
        
        $x -> bindParam(":idSesionAp", $datos['idSesionAp'], PDO::PARAM_INT);
        $x -> bindParam(":idFicha", $datos['idFicha'], PDO::PARAM_INT);
        $x -> bindParam(":idPrograma", $datos['idPrograma'], PDO::PARAM_INT);
        $x -> bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
        $x -> bindParam(":hora", $datos['hora'], PDO::PARAM_STR);
        $x->execute();
        
        $y = Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_PRESENTE = 1 WHERE tbl_aprendiz_ID = :idSesionAp");
        
        $y -> bindParam(":idSesionAp", $datos['idSesionAp'], PDO::PARAM_INT);
        if($y->execute()){ return true; }else{ return false; }
    }
    
    static public function Redecicion($id)
    {
        $x = Conexion::conectar()->prepare("SELECT * FROM tbl_aprendiz WHERE tbl_aprendiz_ID = :id ");
        $x -> bindParam(":id", $id, PDO::PARAM_INT);
        $x -> execute();
        return $x -> fetch(PDO::FETCH_ASSOC);
    }
    
    static public function RegistrarReingreso($datos)
    {
        $x = Conexion::conectar()->prepare(" UPDATE tbl_aprendiz SET tbl_aprendiz_PRESENTE = 1 WHERE tbl_aprendiz_ID = :id AND tbl_aprendiz_PRESENTE = 0");
        $x -> bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $x -> execute();
        
        $y = Conexion::conectar2()->prepare("INSERT INTO tbl_asistencia_externo(tbl_externo_FECHA, tbl_externo_HORA, tbl_personal_ID, tbl_ficha_ID, tbl_programa_ID) VALUES (:fecha, :hora, :id, :idFicha, :idPrograma)");
        $y -> bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $y -> bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $y -> bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
        $y -> bindParam(':idFicha', $datos['idFicha'], PDO::PARAM_INT);
        $y -> bindParam(':idPrograma', $datos['idPrograma'], PDO::PARAM_INT);
        if($y -> execute()){ return true; }else{ return false; }
    }
    
    static public function RegistrarSalida($datos)
    {
        $x = Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_PRESENTE = 0 WHERE tbl_aprendiz_ID = :id AND tbl_aprendiz_PRESENTE = 1");
        $x -> bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $x -> execute();
        
        $y = Conexion::conectar2()->prepare("INSERT INTO tbl_salida_externo(tbl_externo_FECHA, tbl_externo_HORA, tbl_personal_ID, tbl_ficha_ID, tbl_programa_ID) VALUES (:fecha, :hora, :id, :idFicha, :idPrograma)");
        $y -> bindParam(':id', $datos['id'], PDO::PARAM_INT);
        $y -> bindParam(':fecha', $datos['fecha'], PDO::PARAM_STR);
        $y -> bindParam(':hora', $datos['hora'], PDO::PARAM_STR);
        $y -> bindParam(':idFicha', $datos['idFicha'], PDO::PARAM_INT);
        $y -> bindParam(':idPrograma', $datos['idPrograma'], PDO::PARAM_INT);
        if($y -> execute()){ return true; }else{ return false; }
    }

    static public function ConsultarVehiculoAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("SELECT V.tbl_vehiculo_ID as id_vehiculo, V.tbl_tipo_vehiculo as tipo_vehiculo,
        V.tbl_placa_vehiculo as placa FROM tbl_vehiculo_aprendiz as V WHERE tbl_aprendiz_ID=:id_aprendiz ");
        $x->bindParam(":id_aprendiz", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarVehiculoAprendiz($datos)
    {
        $x=Conexion::conectar()->prepare("INSERT INTO  tbl_vehiculo_aprendiz (tbl_vehiculo_ID,tbl_aprendiz_ID,tbl_tipo_vehiculo,tbl_placa_vehiculo) 
        values (null,:id_aprendiz,:tipo_vehiculo,:placa)");
        $x->bindParam(":id_aprendiz", $datos["id_aprendiz"], PDO::PARAM_INT);
        $x->bindParam(":tipo_vehiculo", $datos["tipo_vehiculo"], PDO::PARAM_STR);
        $x->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarVehiculoAprendiz($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_vehiculo_aprendiz WHERE tbl_vehiculo_ID=:id_vehiculo ");
        $x->bindParam(":id_vehiculo", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }
    /*
        SELECT T1.tbl_instructor_ID, T1.tbl_instructor_DOCUMENTO AS DOCUMENTO, T1.tbl_instructor_NOMBRES AS NOMBRES, T1.tbl_instructor_APELLIDOS AS APELLIDOS, T1.tbl_instructor_DOCUMENTO AS DOCUMENTO 
        FROM tbl_instructor T1 WHERE NOT EXISTS (SELECT T2.tbl_instructor_ID, T2.tbl_asistencia_FECHA AS FECHA FROM tbl_asistencia_instructor T2 WHERE T1.tbl_instructor_ID = T2.tbl_instructor_ID AND 
        T2.tbl_asistencia_FECHA = '$fecha') AND T1.tbl_instructor_Dependencia = 'CNCA' AND T1.tbl_instructor_Estado = 1 ORDER BY T1.tbl_instructor_NOMBRES ASC
    */

    static public function GuardarDocumentosCertificacion($datos)
    {
        $y=Conexion::conectar()->prepare("SELECT A.tbl_programa_ID as programa, A.tbl_ficha_ID as ficha 
        FROM tbl_aprendiz as A WHERE tbl_aprendiz_ID=:id_aprendiz ");
        $y->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
        $y->execute();
        $respuesta=$y -> fetch(PDO::FETCH_ASSOC);
        $programa=$respuesta["programa"];
        $ficha=$respuesta["ficha"];
    
        $x=Conexion::conectar()->prepare("INSERT INTO tbl_certificacion_aprendiz (tbl_certificacion_ID,	tbl_aprendiz_ID,tbl_programa_ID,tbl_ficha_ID,
        tbl_DI,tbl_BITACORA,tbl_CONSTANCIA,tbl_CARNET)  VALUES (null,:id_aprendiz,:programa,:ficha,:url_di,:url_bitacora,:url_constanciaP,:url_carnet)");
        $x->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
        $x->bindParam(":programa", $programa, PDO::PARAM_INT);
        $x->bindParam(":ficha", $ficha, PDO::PARAM_INT);
        $x->bindParam(":url_di", $datos['documento_identidad'], PDO::PARAM_STR);
        $x->bindParam(":url_bitacora", $datos['bitacora'], PDO::PARAM_STR);
        $x->bindParam(":url_constanciaP", $datos['constancia_practicas'], PDO::PARAM_STR);
        $x->bindParam(":url_carnet", $datos['carnet'], PDO::PARAM_STR);
        if($x->execute()){ return true; }else{ return false;}
       
    }
    
    static public function ContadorInasistencia($id)
    {
        $x = Conexion::conectar()->prepare("SELECT COUNT(*) AS inasistencia FROM tbl_fidelizacion_proceso WHERE tbl_MOTIVO_CIERRE = 'INASISTENCIA' AND tbl_aprendiz_ID = :id");
        $x -> bindParam(":id", $id, PDO::PARAM_INT);
        $x -> execute();
        return $x -> fetch(PDO::FETCH_ASSOC);
    }
    
    static public function ContadorExcusa($id)
    {
        $y = Conexion::conectar()->prepare("SELECT COUNT(*) AS excusa FROM tbl_fidelizacion_proceso WHERE tbl_MOTIVO_CIERRE = 'EXCUSA' AND tbl_aprendiz_ID = :id");
        $y -> bindParam(':id', $id, PDO::PARAM_INT);
        $y -> execute();
        return $y -> fetch(PDO::FETCH_ASSOC);
    }
    
    static public function ContadorCasosA($id)
    {
        $z = Conexion::conectar()->prepare("SELECT COUNT(*) AS casosA FROM tbl_fidelizacion_proceso WHERE tbl_aprendiz_ID = :id AND tbl_fidelizacion_ESTADO = 'ABIERTO' ");
        $z -> bindParam(':id', $id, PDO::PARAM_INT);
        $z -> execute();
        return $z -> fetch(PDO::FETCH_ASSOC);
    }
    
    static public function ContadorCasosC($id)
    {
        $w = Conexion::conectar()->prepare("SELECT COUNT(*) AS casosC FROM tbl_fidelizacion_proceso WHERE tbl_aprendiz_ID = :id AND tbl_fidelizacion_ESTADO = 'CERRADO' ");
        $w -> bindParam(':id', $id, PDO::PARAM_INT);
        $w ->execute();
        return $w -> fetch(PDO::FETCH_ASSOC);
    }
    static public function ConsultarDocumentacionAprendiz($id)
    {
        $y = Conexion::conectar()->prepare("SELECT A.tbl_ficha_ID as ficha, A.tbl_programa_ID as programa FROM 
        tbl_aprendiz as A WHERE tbl_aprendiz_ID=:id_aprendiz");
        $y -> bindParam(':id_aprendiz', $id, PDO::PARAM_INT);
        $y ->execute();
        $respuesta=$y -> fetch(PDO::FETCH_ASSOC);
        $programa=$respuesta["programa"];
        $ficha=$respuesta["ficha"];

        $x = Conexion::conectar()->prepare("SELECT C.tbl_certificacion_ID as id_certifiacion, C.tbl_DI as documento_identidad,
        C.tbl_BITACORA as bitacora, C.tbl_CONSTANCIA as constancia, C.tbl_CARNET as carnet FROM tbl_certificacion_aprendiz as C
         WHERE tbl_aprendiz_ID=:id_aprendiz and tbl_programa_ID=:programa and tbl_ficha_ID=:ficha");
        $x -> bindParam(':id_aprendiz', $id, PDO::PARAM_INT);
        $x -> bindParam(':programa', $programa, PDO::PARAM_INT);
        $x -> bindParam(':ficha', $ficha, PDO::PARAM_INT);
        $x ->execute();
        return $x -> fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarDocumentacionAprendiz($datos)
    {
        $y=Conexion::conectar()->prepare("SELECT A.tbl_programa_ID as programa, A.tbl_ficha_ID as ficha 
        FROM tbl_aprendiz as A WHERE tbl_aprendiz_ID=:id_aprendiz ");
        $y->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
        $y->execute();
        $respuesta=$y -> fetch(PDO::FETCH_ASSOC);
        $programa=$respuesta["programa"];
        $ficha=$respuesta["ficha"];
      
        $e=Conexion::conectar()->prepare("UPDATE tbl_certificacion_aprendiz SET tbl_DI=:url_di, 
        tbl_BITACORA=:url_bitacora, tbl_CONSTANCIA=:url_constanciaP, tbl_CARNET=:url_carnet WHERE tbl_aprendiz_ID=:id_aprendiz 
        and tbl_programa_ID=:programa and tbl_ficha_ID=:ficha ");
        $e->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
        $e->bindParam(":programa", $programa, PDO::PARAM_INT);
        $e->bindParam(":ficha", $ficha, PDO::PARAM_INT);
        $e->bindParam(":url_di", $datos['documento_identidad'], PDO::PARAM_STR);
        $e->bindParam(":url_bitacora", $datos['bitacora'], PDO::PARAM_STR);
        $e->bindParam(":url_constanciaP", $datos['constancia_practicas'], PDO::PARAM_STR);
        $e->bindParam(":url_carnet", $datos['carnet'], PDO::PARAM_STR);
        if($e->execute()){ return true; }else{ return false;}
        
    }
   
}
?>


