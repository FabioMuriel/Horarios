<?php

require_once "conexion.php";

Class PersonaModelo{
    static public function ListarPersona($cargo,$id_sedeA,$cargoU)
    {
        if($cargoU=="PARAMETRIZACION")
        {
          $x=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NUMDOCUMENTO as cedula, 
          P.tbl_persona_NOMBRES as nombres, P.tbl_persona_APELLIDOS as apellidos, P.tbl_persona_TELEFONO as telefono, 
          S.tbl_sede_NOMBRE as sede, C.tbl_centro_NOMBRE as centro, R.tbl_regional_NOMBRE as regional
          FROM tbl_persona as P inner join tbl_sede as S on P.tbl_persona_sede_ID=tbl_sede_ID inner join tbl_centro as C 
          on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID  inner join tbl_regional as R on 
          C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID WHERE tbl_cargo_tbl_cargo_ID=:cargo");
          $x->bindParam(":cargo", $cargo, PDO::PARAM_INT);
          $x->execute();
          return $x->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $x=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NUMDOCUMENTO as cedula, 
            P.tbl_persona_NOMBRES as nombres, P.tbl_persona_APELLIDOS as apellidos, P.tbl_persona_TELEFONO as telefono, 
            S.tbl_sede_NOMBRE as sede, C.tbl_centro_NOMBRE as centro, R.tbl_regional_NOMBRE as regional
            FROM tbl_persona as P inner join tbl_sede as S on P.tbl_persona_sede_ID=tbl_sede_ID inner join tbl_centro as C 
            on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID  inner join tbl_regional as R on 
            C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID WHERE tbl_cargo_tbl_cargo_ID=:cargo and tbl_persona_sede_ID=:sede");
            $x->bindParam(":cargo", $cargo, PDO::PARAM_INT);
            $x->bindParam(":sede", $id_sedeA, PDO::PARAM_INT);
            $x->execute();
            return $x->fetchAll(PDO::FETCH_ASSOC);
        }


    }

    static public function ListarPersonaPorSede($id_sede)
    {
        $x=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NOMBRES as nombres, P.tbl_persona_APELLIDOS as apellidos
        FROM tbl_persona as P WHERE tbl_persona_sede_ID=:id_sede and tbl_cargo_tbl_cargo_ID=3 ");
         $x->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
        $x->execute();
       return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarPersona($datos,$vehiculo)
    {
        $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_persona WHERE tbl_persona_NUMDOCUMENTO=:cedula");
        $y->bindParam(":cedula", $datos['cedula'], PDO::PARAM_INT);
        $y->execute();
        $n = $y->fetchColumn();
        
        if($n>0)
        {
          return false;
        }
        else
        {
            $x=Conexion::conectar()->prepare("INSERT INTO tbl_persona (tbl_persona_ID, tbl_persona_NUMDOCUMENTO, tbl_persona_NOMBRES, tbl_persona_APELLIDOS, 
            tbl_persona_FECHANAC, tbl_persona_TELEFONO, tbl_persona_CORREO, tbl_cargo_tbl_cargo_ID, tbl_persona_DIRECCION, tipo_contrato, 
            tbl_tipodocumento_tbl_tipodocumento_ID, tbl_persona_ESTADO, tbl_persona_imagen, tbl_persona_PASSWORD,tbl_persona_PRESENTE,
            tbl_persona_sede_ID )   VALUES (NULL, :cedula, :nombres, :apellidos, :fechaNac, :telefono, :correo, :cargo, 
            :direccion, :contrato, :tipo_documento, 1, :imagen ,:password,'0',:sede)");
            
            $x->bindParam(":cedula", $datos['cedula'], PDO::PARAM_INT);
             $x->bindParam(":nombres", $datos['nombres'], PDO::PARAM_STR);
            $x->bindParam(":apellidos", $datos['apellidos'], PDO::PARAM_STR);
            $x->bindParam(":fechaNac", $datos['fechaNac'], PDO::PARAM_STR);
            $x->bindParam(":telefono", $datos['telefono'], PDO::PARAM_STR);
            $x->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
            $x->bindParam(":cargo", $datos['cargo'], PDO::PARAM_INT);
            $x->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
            $x->bindParam(":contrato", $datos['contrato'], PDO::PARAM_STR);
            $x->bindParam(":tipo_documento", $datos['tipo_documento'], PDO::PARAM_STR);
            $x->bindParam(":imagen", $datos['imagen'], PDO::PARAM_STR);
            $x->bindParam(":password", $datos['password'], PDO::PARAM_STR);
            $x->bindParam(":sede", $datos['sede'], PDO::PARAM_INT);
            $x->execute();

            if(empty($vehiculo)!=1)
            {
                $z=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona FROM tbl_persona as P WHERE tbl_persona_NUMDOCUMENTO=:cedula");
                $z->bindParam(":cedula", $datos['cedula'], PDO::PARAM_INT);
                $z->execute();
                $resultado=$z->fetch(PDO::FETCH_ASSOC);
                $id_persona=$resultado["id_persona"];
   
            foreach($vehiculo as $fila) 
            {
               $tipo_vehiculo=$fila->tipo_vehiculo;
               $placa=$fila->placa;
               $y=Conexion::conectar()->prepare("INSERT INTO  tbl_vehiculo_persona (tbl_vehiculo_ID,tbl_persona_ID,tbl_tipo_vehiculo,tbl_placa_vehiculo) 
               values (null,'$id_persona','$tipo_vehiculo','$placa')");
               $y->execute();
            }
           
         }
         return true;
        }
    }

    static public function ConsultarPersona($cedula)
    {
        $x=Conexion::conectar()->prepare("SELECT  P.tbl_persona_ID as id_persona, P.tbl_persona_NOMBRES as nombres,
         P.tbl_persona_APELLIDOS as apellidos, P.tbl_persona_TELEFONO as telefono, P.tbl_persona_FECHANAC as fechaNac, P.tbl_persona_CORREO as correo, 
         P.tbl_persona_DIRECCION as direccion, P.tbl_persona_PASSWORD as password, P.tbl_persona_sede_ID as sede FROM tbl_persona as P
          WHERE tbl_persona_NUMDOCUMENTO=:cedula");
         $x->bindParam(":cedula", $cedula, PDO::PARAM_STR);
         $x->execute();
         return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarPersona($datos)
    {
        $x=Conexion::conectar()->prepare("UPDATE tbl_persona SET tbl_persona_NOMBRES = :nombres, 
        tbl_persona_APELLIDOS = :apellidos, tbl_persona_DIRECCION = :direccion,
        tbl_persona_TELEFONO = :telefono, tbl_persona_CORREO = :correo, tbl_persona_NUMDOCUMENTO= :cedula, tbl_persona_PASSWORD=:password,
        tbl_persona_FECHANAC=:fechaNac, tbl_persona_sede_ID=:sede  WHERE tbl_persona_ID = :id_persona ");
         $x->bindParam(":cedula", $datos['cedulaE'], PDO::PARAM_INT);
         $x->bindParam(":nombres", $datos['nombresE'], PDO::PARAM_STR);
         $x->bindParam(":apellidos", $datos['apellidosE'], PDO::PARAM_STR);
         $x->bindParam(":fechaNac", $datos['fechaNacE'], PDO::PARAM_STR);
         $x->bindParam(":telefono", $datos['telefonoE'], PDO::PARAM_STR);
         $x->bindParam(":correo", $datos['correoE'], PDO::PARAM_STR);
         $x->bindParam(":direccion", $datos['direccionE'], PDO::PARAM_STR);
         $x->bindParam(":password", $datos['passwordE'], PDO::PARAM_STR);
         $x->bindParam(":id_persona", $datos['id_persona'], PDO::PARAM_STR);
         $x->bindParam(":sede", $datos['sedee'], PDO::PARAM_STR);
         if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarPersona($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_persona WHERE tbl_persona_ID=:id_persona ");
        $x->bindParam(":id_persona", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }

    static public function ConsultarVehiculoPersona($id)
    {
        $x=Conexion::conectar()->prepare("SELECT V.tbl_vehiculo_ID as id_vehiculo, V.tbl_tipo_vehiculo as tipo_vehiculo,
        V.tbl_placa_vehiculo as placa FROM tbl_vehiculo_persona as V WHERE tbl_persona_ID=:id_persona ");
        $x->bindParam(":id_persona", $id, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarVehiculoPersona($datos)
    {
        $x=Conexion::conectar()->prepare("INSERT INTO  tbl_vehiculo_persona (tbl_vehiculo_ID,tbl_persona_ID,tbl_tipo_vehiculo,tbl_placa_vehiculo) 
        values (null,:id_persona,:tipo_vehiculo,:placa)");
        $x->bindParam(":id_persona", $datos["id_persona"], PDO::PARAM_INT);
        $x->bindParam(":tipo_vehiculo", $datos["tipo_vehiculo"], PDO::PARAM_STR);
        $x->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        if($x->execute()){ return true; }else{ return false;}
    }

    static public function EliminarVehiculoPersona($id)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_vehiculo_persona WHERE tbl_vehiculo_ID=:id_vehiculo ");
        $x->bindParam(":id_vehiculo", $id, PDO::PARAM_INT);
        if($x->execute()){ return true; }else{ return false;}
    }

    static public function GuardarAcceso($datos)
    {
        $x=Conexion::conectar()->prepare("SELECT COUNT(*) FROM tbl_acceso_programas WHERE tbl_persona_ID=:id_instructor");
        $x->bindParam(":id_instructor", $datos["id_instructor"], PDO::PARAM_INT);
        $x->execute();
        $n = $x->fetchColumn();
        if($n>0)
        {
            $z=Conexion::conectar()->prepare("UPDATE tbl_acceso_programas SET  tbl_bienestar=:bienestar, 
            tbl_horario=:horario WHERE tbl_persona_ID=:id_instructor");
            $z->bindParam(":id_instructor", $datos["id_instructor"], PDO::PARAM_INT);
            $z->bindParam(":bienestar", $datos["bienestar"], PDO::PARAM_INT);
            $z->bindParam(":horario", $datos["horario"], PDO::PARAM_INT);
            if($z->execute()){ return true; }else{ return false;}
        }
        else
        {
            $y=Conexion::conectar()->prepare("INSERT INTO  tbl_acceso_programas (tbl_acceso_ID,tbl_persona_ID,tbl_bienestar,tbl_horario) 
            values (null,:id_instructor,:bienestar,:horario)");
            $y->bindParam(":id_instructor", $datos["id_instructor"], PDO::PARAM_INT);
            $y->bindParam(":bienestar", $datos["bienestar"], PDO::PARAM_INT);
            $y->bindParam(":horario", $datos["horario"], PDO::PARAM_INT);
            if($y->execute()){ return true; }else{ return false;}
        }
    }

    static public function ConsultarAcceso($id)
    {
            $z=Conexion::conectar()->prepare("SELECT PA.tbl_acceso_ID as id_acceso, PA.tbl_bienestar as bienestar, PA.tbl_horario as horario
             FROM tbl_acceso_programas as PA WHERE tbl_persona_ID=:id_instructor");
            $z->bindParam(":id_instructor", $id, PDO::PARAM_INT);
            $z->execute();
            return $z->fetch(PDO::FETCH_ASSOC);
    }

    static public function GuardarInvitado($datos)
    {
        $y=Conexion::conectar()->prepare("SELECT COUNT(*) FROM  tbl_invitados WHERE tbl_invitado_NUMDOCUMENTO=:cedula");
        $y->bindParam(":cedula", $datos["numero_documento"], PDO::PARAM_INT);
        $y->execute();
        $n = $y->fetchColumn();
        
        if($n>0)
        {
          return false;
        }
        else
        {
            $z=Conexion::conectar()->prepare("INSERT INTO tbl_invitados(tbl_invitados_ID,tbl_invitado_NOMBRES, tbl_invitado_APELLIDOS, 
            tbl_invitado_TIPODOC, tbl_invitado_NUMDOCUMENTO, tbl_invitado_TELEFONO,tbl_invitado_PRESENTE,tbl_invitado_CARGO,tbl_sede_ID) VALUES
             (null,:nombres,:apellidos,:tipo_documento,:numero_documento,:telefono,'0','7',:sede)");
            $z->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
            $z->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $z->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_INT);
            $z->bindParam(":numero_documento", $datos["numero_documento"], PDO::PARAM_INT);
            $z->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
            $z->bindParam(":sede", $datos["sede"], PDO::PARAM_STR);
            if($z->execute()){ return true; }else{ return false;}
        }
    }
    static public function ListarInvitado($id_sede,$cargo)
    {
        if($cargo=="PARAMETRIZACION")
        {
            $z=Conexion::conectar()->prepare("SELECT I.tbl_invitados_ID as id_invitado, I.tbl_invitado_NOMBRES as nombres, 
            I.tbl_invitado_APELLIDOS as apellidos, I.tbl_invitado_NUMDOCUMENTO as numero_documento, I.tbl_invitado_TELEFONO as telefono,
             S.tbl_sede_NOMBRE as sede, C.tbl_centro_NOMBRE as centro, R.tbl_regional_NOMBRE as regional FROM tbl_invitados 
            as I inner join tbl_sede as S on I.tbl_sede_ID=S.tbl_sede_ID inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID 
            INNER join tbl_regional  as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID ");
            $z->execute();
            return $z->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            $z=Conexion::conectar()->prepare("SELECT I.tbl_invitados_ID as id_invitado, I.tbl_invitado_NOMBRES as nombres, 
            I.tbl_invitado_APELLIDOS as apellidos, I.tbl_invitado_NUMDOCUMENTO as numero_documento, I.tbl_invitado_TELEFONO as telefono,
             S.tbl_sede_NOMBRE as sede, C.tbl_centro_NOMBRE as centro, R.tbl_regional_NOMBRE as regional FROM tbl_invitados 
            as I inner join tbl_sede as S on I.tbl_sede_ID=S.tbl_sede_ID inner join tbl_centro as C on S.tbl_centro_tbl_centro_ID=C.tbl_centro_ID 
            INNER join tbl_regional  as R on C.tbl_regional_tbl_regional_ID=R.tbl_regional_ID WHERE I.tbl_sede_ID=:id_sede");
            $z->bindParam(":id_sede", $id_sede, PDO::PARAM_INT);
            $z->execute();
            return $z->fetchAll(PDO::FETCH_ASSOC);
        }
            
    }

    static public function ConsultarInvitado($id)
    {
            $z=Conexion::conectar()->prepare("SELECT I.tbl_invitado_NOMBRES as nombres, I.tbl_invitado_APELLIDOS as apellidos,
             I.tbl_invitado_TIPODOC as tipo_documento  FROM tbl_invitados as I WHERE tbl_invitados_ID=:id_invitado");
            $z->bindParam(":id_invitado", $id, PDO::PARAM_INT);
            $z->execute();
            return $z->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarInvitado($datos)
    {
            $z=Conexion::conectar()->prepare("UPDATE tbl_invitados SET tbl_invitado_NOMBRES=:nombres,tbl_invitado_APELLIDOS=:apellidos,
            tbl_invitado_TIPODOC=:tipo_documento,tbl_invitado_NUMDOCUMENTO=:numero_documento,tbl_invitado_TELEFONO=:telefono 
            WHERE tbl_invitados_ID=:id_invitado");
            $z->bindParam(":id_invitado", $datos["id_invitado"], PDO::PARAM_INT);
            $z->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
            $z->bindParam(":apellidos", $datos["apellidos"], PDO::PARAM_STR);
            $z->bindParam(":telefono", $datos["telefono"], PDO::PARAM_INT);
            $z->bindParam(":tipo_documento", $datos["tipo_documento"], PDO::PARAM_INT);
            $z->bindParam(":numero_documento", $datos["numero_documento"], PDO::PARAM_INT);
            $z->execute();
            if($z->execute()){ return true; }else{ return false;}
    }

    static public function EliminarInvitado($id)
    {
            $z=Conexion::conectar()->prepare("DELETE FROM tbl_invitados WHERE tbl_invitados_ID=:id_invitado");
            $z->bindParam(":id_invitado", $id, PDO::PARAM_INT);
            if($z->execute()){ return true; }else{ return false;}
    }



}
?>


