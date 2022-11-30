<?php

require_once "conexion.php";
date_default_timezone_set('America/Bogota');
Class ReportesModelo{

    static public function ListarReporteIntructorHoy($sede,$cargo)
    {
        $c=0;
        $c2=0;
        $fecha = date('Y-m-d');  
        $x=Conexion::conectar2()->prepare("SELECT AI.tbl_asistencia_FECHA as fecha_asistenciaI, AI.tbl_asistencia_HORA as 
        hora_entradaI, AI.tbl_instructor_ID as id_instructor from tbl_asistencia_instructor as AI where tbl_asistencia_FECHA=:fecha");
        $x->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $x->execute();

        $y=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NOMBRES as nombres,
         P.tbl_persona_APELLIDOS as apellidos FROM tbl_persona as P where tbl_persona_sede_ID=:id_sede");
        $y->bindParam(":id_sede", $sede, PDO::PARAM_INT);
        $y->execute();

        $z=Conexion::conectar2()->prepare("SELECT SI.tbl_salida_instructor_ID as id_salida, SI.tbl_salida_instructor_HORA as hora_salidaI, SI.tbl_instructor_ID as id_instructor
         FROM tbl_salida_instructor as SI where tbl_salida_instructor_FECHA=:fecha");
        $z->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $z->execute();
        
        while ($r = $x->fetch(PDO::FETCH_ASSOC)) {
            $asistenciaI["asistenciaI"][] = $r;
            $c=$c+1;
        }
        while ($r2 = $y->fetch(PDO::FETCH_ASSOC)) {
            $persona["persona"][] = $r2;
           
        }
        while ($r3 = $z->fetch(PDO::FETCH_ASSOC)) {
            $salidaI["salidaI"][] = $r3;
            $c2=$c2+1;
        }
        
        if($c>0 && $c2>0):
           $resultado= array_merge($asistenciaI,$persona,$salidaI);
           return $resultado;
        elseif ($c>0 && $c2==0):
            $resultado= array_merge($asistenciaI,$persona);
            return $resultado;
        else:
           return false;
        endif;
    }

    static public function ListarReporteAprendizHoy($sede,$cargo)
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

    static public function ListarReporteIntructorEntreFechas($fechaI, $fechaF,$sede,$cargo)
    {
        $c=0;
        $c2=0;
        $x=Conexion::conectar2()->prepare("SELECT AI.tbl_asistencia_FECHA as fecha_asistenciaI, AI.tbl_asistencia_HORA as hora_entradaI, 
        AI.tbl_instructor_ID as id_instructor FROM tbl_asistencia_instructor as AI WHERE 
        tbl_asistencia_FECHA>=:fecha_inicial and tbl_asistencia_FECHA<=:fecha_final ORDER BY tbl_asistencia_FECHA ASC");
        $x->bindParam(":fecha_inicial", $fechaI, PDO::PARAM_STR);
        $x->bindParam(":fecha_final", $fechaF, PDO::PARAM_STR);
        $x->execute();

         $y=Conexion::conectar()->prepare("SELECT P.tbl_persona_ID as id_persona, P.tbl_persona_NOMBRES as nombres,
         P.tbl_persona_APELLIDOS as apellidos FROM tbl_persona as P WHERE tbl_persona_sede_ID=:id_sede");
         $y->bindParam(":id_sede", $sede, PDO::PARAM_INT);
         $y->execute();

        $z=Conexion::conectar2()->prepare("SELECT SI.tbl_salida_instructor_ID as id_salida, SI.tbl_salida_instructor_HORA as hora_salidaI, 
        SI.tbl_instructor_ID as id_instructor, SI.tbl_salida_instructor_FECHA as fechaSI FROM tbl_salida_instructor as SI 
        where tbl_salida_instructor_FECHA>=:fecha_inicial and tbl_salida_instructor_FECHA<=:fecha_final");
        $z->bindParam(":fecha_inicial", $fechaI, PDO::PARAM_STR);
        $z->bindParam(":fecha_final", $fechaF, PDO::PARAM_STR);
        $z->execute();
        
        while ($r = $x->fetch(PDO::FETCH_ASSOC)) {
            $asistenciaI["asistenciaI"][] = $r;
            $c=$c+1;
        }
         
        while ($r2 = $y->fetch(PDO::FETCH_ASSOC)) {
            $persona["persona"][] = $r2;
        }
        
        while ($r3 = $z->fetch(PDO::FETCH_ASSOC)) {
            $salidaI["salidaI"][] = $r3;
            $c2=$c2+1;
        }
        
        if($c>0 && $c2>0):
           $resultado= array_merge($asistenciaI,$persona,$salidaI);
           return $resultado;
        elseif ($c>0 && $c2==0):
            $resultado= array_merge($asistenciaI,$persona);
            return $resultado;
        else:
           return false;
        endif;
    }


    static public function ListarReporteAprendizEntreFechas($fechaI,$fechaF,$sede,$cargo)
    {
        $c=0;
        $c2=0;
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, 
        P.tbl_programa_ID as programa, F.tbl_ficha_ID as ficha FROM tbl_aprendiz as A inner join tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID 
        inner join tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  WHERE tbl_aprendiz_SEDE=:id_sede");
        $x->bindParam(":id_sede", $sede, PDO::PARAM_INT);
        $x->execute();

        $y=Conexion::conectar2()->prepare("SELECT A.tbl_asistencia_FECHA as fecha_asistenciaA, A.tbl_asistencia_HORA as hora_entradaA, A.tbl_personal_ID as id_aprendiz
         FROM tbl_asistencia as A where tbl_asistencia_FECHA>=:fechaI and tbl_asistencia_FECHA<=:fechaF ORDER BY tbl_asistencia_FECHA ASC");
        $y->bindParam(":fechaI", $fechaI, PDO::PARAM_STR);
        $y->bindParam(":fechaF", $fechaF, PDO::PARAM_STR);
        $y->execute();

        $z=Conexion::conectar2()->prepare("SELECT SA.tbl_salida_ID as id_salida, SA.tbl_salida_HORA as hora_salidaA,
         SA.tbl_personal_ID as id_aprendiz, SA.tbl_salida_FECHA as fechaSA FROM tbl_salida as SA where tbl_salida_FECHA>=:fechaI and tbl_salida_FECHA<=:fechaF");
        $z->bindParam(":fechaI", $fechaI, PDO::PARAM_STR);
        $z->bindParam(":fechaF", $fechaF, PDO::PARAM_STR);
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
    
     static public function contarInstructor(){
     $fecha = date('Y-m-d');  
     $x=Conexion::conectar2()->prepare("SELECT count(*) as total  FROM tbl_asistencia_instructor");
        $y->bindParam(":fecha", $fecha, PDO::PARAM_STR);
     if($x->execute()){
        return $x->fetch(PDO::FETCH_ASSOC);
     }else{
       return false;
    }
    }
    

   
}
?>


