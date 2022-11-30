<?php

require_once "conexion.php";
date_default_timezone_set('America/Bogota');
Class IngresoModelo{
    static public function ConsultarIngreso($identificacion)
    {
        $fecha = date('Y-m-d');  
        $hora=date('h:i:s A');
        $c1=Conexion::conectar()->prepare("SELECT count(*) FROM tbl_aprendiz WHERE tbl_aprendiz_DOCUMENTO=:numero_documento");
        $c1->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
        $c1->execute();
        $datosAprendiz = $c1->fetchColumn();

        $c2=Conexion::conectar()->prepare("SELECT count(*) FROM tbl_persona WHERE tbl_persona_NUMDOCUMENTO=:numero_documento");
        $c2->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
        $c2->execute();
        $datosPersona = $c2->fetchColumn();

        $c18=Conexion::conectar()->prepare("SELECT count(*) FROM tbl_invitados WHERE tbl_invitado_NUMDOCUMENTO=:numero_documento");
        $c18->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
        $c18->execute();
        $datosInvitado = $c18->fetchColumn();

        $a=0;
        if($datosAprendiz>0)
        {
            $c3=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_NOMBRES as nombres, 
            A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CARGO as cargo, P.tbl_programa_NOMBRE as programa, A.tbl_aprendiz_IMAGEN as imagen, 
            F.tbl_ficha_CODIGO as ficha, A.tbl_programa_ID as id_programa, A.tbl_ficha_ID as id_ficha, A.tbl_aprendiz_PRESENTE as presente
            FROM tbl_aprendiz as A inner join tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID inner join tbl_ficha as F on
            A.tbl_ficha_ID=F.tbl_ficha_ID WHERE tbl_aprendiz_DOCUMENTO=:numero_documento");
            $c3->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
            $c3->execute();
            $respuesta=$c3->fetch(PDO::FETCH_ASSOC);
            $id_aprendiz=$respuesta["id_aprendiz"];
            $ficha=$respuesta["id_ficha"];
            $programa=$respuesta["id_programa"];
            $presente=$respuesta["presente"];
            
            $c4=Conexion::conectar2()->prepare("SELECT count(*) FROM tbl_asistencia WHERE tbl_personal_ID=:id_aprendiz and tbl_asistencia_FECHA=:fecha");
            $c4->bindParam(":id_aprendiz", $id_aprendiz, PDO::PARAM_INT);
            $c4->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $c4->execute();
            $asistenciaAprendiz=$c4->fetchColumn();

            if($asistenciaAprendiz>0)
            {
               if($presente==1)
               {
                 $c5=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_PRESENTE='0' WHERE 
                 tbl_aprendiz_DOCUMENTO=:numero_documento");
                 $c5->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                 $c5->execute();

                 $c6=Conexion::conectar2()->prepare("INSERT INTO tbl_salida(tbl_salida_ID, tbl_salida_FECHA, 
                 tbl_salida_HORA, tbl_personal_ID, tbl_personal_FICHA, tbl_personal_ID_PROGRAMA) VALUES 
                 (null,:fecha,:hora,:id_aprendiz,:ficha,:programa)");
                 $c6->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                 $c6->bindParam(":hora", $hora, PDO::PARAM_STR);
                 $c6->bindParam(":id_aprendiz", $id_aprendiz, PDO::PARAM_INT);
                 $c6->bindParam(":programa", $programa, PDO::PARAM_INT);
                 $c6->bindParam(":ficha", $ficha, PDO::PARAM_INT);
                 $c6->execute();
                 $respuesta["presente"]=0;
               }
               else if($presente==0)
               {
                  $c7=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_PRESENTE='1' WHERE 
                  tbl_aprendiz_DOCUMENTO=:numero_documento");
                  $c7->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                  $c7->execute();
                  $respuesta["presente"]=1;
               }

            }
            else
            {
                $c8=Conexion::conectar2()->prepare("INSERT INTO tbl_asistencia(tbl_asistencia_ID, tbl_asistencia_FECHA, tbl_asistencia_HORA,
                tbl_personal_ID, tbl_personal_ID_FICHA,tbl_personal_ID_PROGRAMA) VALUES (null,:fecha,:hora,:id_aprendiz,:ficha,:programa)");
                $c8->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                $c8->bindParam(":hora", $hora, PDO::PARAM_STR);
                $c8->bindParam(":id_aprendiz", $id_aprendiz, PDO::PARAM_INT);
                $c8->bindParam(":ficha", $ficha, PDO::PARAM_INT);
                $c8->bindParam(":programa", $programa, PDO::PARAM_INT);
                $c8->execute();

                $c9=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_PRESENTE='1' WHERE 
                tbl_aprendiz_DOCUMENTO=:numero_documento");
                $c9->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                $c9->execute();
                $respuesta["presente"]=1;
            }
            
            return $respuesta;
        }
        else if($datosPersona>0)
        {
            $c11=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NOMBRES as nombres,
            P.tbl_persona_APELLIDOS as apellidos, C.tbl_cargo_TIPO as cargo, P.tbl_persona_imagen as imagen, P.tbl_persona_PRESENTE as presente FROM tbl_persona as P inner join tbl_cargo
            as C on P.tbl_cargo_tbl_cargo_ID=C.tbl_cargo_ID WHERE tbl_persona_NUMDOCUMENTO=:numero_documento");
            $c11->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
            $c11->execute();
            $respuesta=$c11->fetch(PDO::FETCH_ASSOC);
            $id_persona=$respuesta["id_persona"];
            $presente=$respuesta["presente"];

            $c12=Conexion::conectar2()->prepare("SELECT count(*) FROM tbl_asistencia_instructor WHERE 
            tbl_instructor_ID=:id_persona and tbl_asistencia_FECHA=:fecha");
            $c12->bindParam(":id_persona", $id_persona, PDO::PARAM_INT);
            $c12->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $c12->execute();
            $asistenciaPersona=$c12->fetchColumn();

            if($asistenciaPersona>0)
            {
                if($presente==1)
                {
                  $c15=Conexion::conectar()->prepare("UPDATE tbl_persona SET tbl_persona_PRESENTE='0' WHERE 
                  tbl_persona_NUMDOCUMENTO=:numero_documento");
                  $c15->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                  $c15->execute();
 
                  $c16=Conexion::conectar2()->prepare("INSERT INTO tbl_salida_instructor(tbl_salida_instructor_ID, tbl_salida_instructor_FECHA,
                  tbl_salida_instructor_HORA, tbl_instructor_ID) VALUES (null,:fecha,:hora,:id_persona)");
                  $c16->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                  $c16->bindParam(":hora", $hora, PDO::PARAM_STR);
                  $c16->bindParam(":id_persona", $id_persona, PDO::PARAM_INT);
                  $c16->execute();
                  $respuesta["presente"]=0;
                }
                else if($presente==0)
                {
                    $c17=Conexion::conectar()->prepare("UPDATE tbl_persona SET tbl_persona_PRESENTE='1' WHERE 
                    tbl_persona_NUMDOCUMENTO=:numero_documento");
                    $c17->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                    $c17->execute();
                    $respuesta["presente"]=1;
                }
               
            }
            else
            {
                $c13=Conexion::conectar2()->prepare("INSERT INTO tbl_asistencia_instructor(tbl_asistencia_ID, tbl_asistencia_FECHA, 
                tbl_asistencia_HORA, tbl_instructor_ID) VALUES (null,:fecha,:hora,:id_persona)");
                $c13->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                $c13->bindParam(":hora", $hora, PDO::PARAM_STR);
                $c13->bindParam(":id_persona", $id_persona, PDO::PARAM_INT);
                $c13->execute();

                $c14=Conexion::conectar()->prepare("UPDATE tbl_persona SET tbl_persona_PRESENTE='1' WHERE 
                tbl_persona_NUMDOCUMENTO=:numero_documento");
                $c14->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                $c14->execute();
                $respuesta["presente"]=1;
            }
            return $respuesta;
        }
        else if($datosInvitado>0)
        {
            $c19=Conexion::conectar()->prepare("SELECT I.tbl_invitados_ID as id_invitado, I.tbl_invitado_NOMBRES as nombres, 
            I.tbl_invitado_APELLIDOS as apellidos, I.tbl_invitado_PRESENTE as presente, C.tbl_cargo_TIPO as cargo FROM 
            tbl_invitados as I inner join tbl_cargo as C on I.tbl_invitado_CARGO=C.tbl_cargo_ID WHERE 
            tbl_invitado_NUMDOCUMENTO=:numero_documento");
            $c19->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
            $c19->execute();
            $respuesta=$c19->fetch(PDO::FETCH_ASSOC);
            $id_invitado=$respuesta["id_invitado"];
            $presente=$respuesta["presente"];

            $c20=Conexion::conectar2()->prepare("SELECT count(*) FROM tbl_asistencia_invitados WHERE 
            tbl_invitados_ID=:id_invitado and tbl_asistencia_invitados_FECHA=:fecha");
            $c20->bindParam(":id_invitado", $id_invitado, PDO::PARAM_INT);
            $c20->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $c20->execute();
            $asistenciaInvitado=$c20->fetchColumn();
            
            if($asistenciaInvitado>0)
            {
                if($presente==1)
                {
                    $c14=Conexion::conectar()->prepare("UPDATE tbl_invitados SET tbl_invitado_PRESENTE='0' WHERE 
                    tbl_invitado_NUMDOCUMENTO=:numero_documento");
                    $c14->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                    $c14->execute();
   
                    $c16=Conexion::conectar2()->prepare("INSERT INTO tbl_salida_invitados(tbl_salida_invitado_ID, tbl_invitado_ID, 
                    tbl_salida_FECHA, tbl_salida_HORA) VALUES (null,:id_invitado,:fecha,:hora)");
                    $c16->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                    $c16->bindParam(":hora", $hora, PDO::PARAM_STR);
                    $c16->bindParam(":id_invitado", $id_invitado, PDO::PARAM_INT);
                    $c16->execute();
                    $respuesta["presente"]=0;
                }
                else if($presente==0)
                {
                    $c14=Conexion::conectar()->prepare("UPDATE tbl_invitados SET tbl_invitado_PRESENTE='1' WHERE 
                    tbl_invitado_NUMDOCUMENTO=:numero_documento");
                    $c14->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                    $c14->execute();
                    $respuesta["presente"]=1;
                }
               
            }
            else
            {
                $c13=Conexion::conectar2()->prepare("INSERT INTO tbl_asistencia_invitados(tbl_asistencia_invitados_ID, 
                tbl_invitados_ID, tbl_asistencia_invitados_FECHA, tbl_asistencia_invitados_HORA) VALUES (null,:id_invitado,:fecha,:hora)");
                $c13->bindParam(":fecha", $fecha, PDO::PARAM_STR);
                $c13->bindParam(":hora", $hora, PDO::PARAM_STR);
                $c13->bindParam(":id_invitado", $id_invitado, PDO::PARAM_INT);
                $c13->execute();

                $c14=Conexion::conectar()->prepare("UPDATE tbl_invitados SET tbl_invitado_PRESENTE='1' WHERE 
                tbl_invitado_NUMDOCUMENTO=:numero_documento");
                $c14->bindParam(":numero_documento", $identificacion, PDO::PARAM_INT);
                $c14->execute();
                $respuesta["presente"]=1;
            }
            return $respuesta;
        }
        else
        {
            return $a;
        }
    }

    static public function listarAsistenciaHoy($sede,$cargo)
    {
        $c=0;
        $c2=0;
        $fecha = date('Y-m-d');  
        
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, 
        P.tbl_programa_ID as programa, F.tbl_ficha_ID as ficha FROM tbl_aprendiz as A inner join tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID 
        inner join tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID WHERE tbl_aprendiz_SEDE=:id_sede");
        $x->bindParam(":id_sede", $sede, PDO::PARAM_INT);
        $x->execute();

        $y=Conexion::conectar2()->prepare("SELECT A.tbl_asistencia_FECHA as fecha_asistenciaA, A.tbl_asistencia_HORA as hora_entradaA, A.tbl_personal_ID as id_aprendiz
         FROM tbl_asistencia as A where tbl_asistencia_FECHA=:fecha");
        $y->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $y->execute();

        $z=Conexion::conectar2()->prepare("SELECT SA.tbl_salida_ID as id_salida, SA.tbl_salida_HORA as hora_salidaA,
         SA.tbl_personal_ID as id_aprendiz FROM tbl_salida as SA where tbl_salida_FECHA=:fecha");
        $z->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $z->execute();
       

        while ($r = $x->fetch(PDO::FETCH_ASSOC)) {
            $aprendiz["aprendiz"][] = $r;
        }
        
        while ($r2 = $y->fetch(PDO::FETCH_ASSOC)) {
            $asistenciaA["asistenciaA"][] = $r2;
            $c=$c+1;
        }

        while ($r3 = $z->fetch(PDO::FETCH_ASSOC)) {
            $salidaA["salidaA"][] = $r3;
            $c2=$c2+1;
        }

        if($c>0 && $c2>0):
            $resultado= array_merge($asistenciaA,$aprendiz,$salidaA);
            return $resultado;
         elseif ($c>0 && $c2==0):
             $resultado= array_merge($asistenciaA,$aprendiz);
             return $resultado;
         else:
            return false;
         endif;
    }
   
   
}
?>


