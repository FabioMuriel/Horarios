<?php
// llamamos al modelo conexion
require_once "conexion.php";

date_default_timezone_set('America/Bogota');

Class FidelizacionModelo{
    // metodo para traer todos los datos de la tabla de aprendices que esta en la base de datos securitas y se llama tbl_personal
    static public function ListarFidelizacion($id_bienestar)
    {
        $FechaA = date('Y-m-d');  
        $HoraA=date('h:i:s A');
        $FechaActual= new DateTime($FechaA);
        
        $y=Conexion::conectar()->prepare("SELECT FP.tbl_fidelizacion_proceso_ID as id_proceso, FP.tbl_FECHA_CIERRE_SISTEMA as fecha_cierre, FP.tbl_HORA_CIERRE as hora_cierre 
        FROM tbl_fidelizacion_proceso as FP WHERE tbl_fidelizacion_ESTADO='ABIERTO'");
        $y->execute();
        while ($r = $y->fetch(PDO::FETCH_ASSOC))
        {
           $id_proceso=$r["id_proceso"];
           $FechaCierre=new DateTime($r["fecha_cierre"]);
           if(($FechaActual>=$FechaCierre) )
           {
             $z=Conexion::conectar()->prepare("UPDATE tbl_fidelizacion_proceso SET tbl_fidelizacion_ESTADO='CERRADO',
             tbl_MOTIVO_CIERRE='INASISTENCIA' WHERE tbl_fidelizacion_proceso_ID=:id_proceso ");
             $z->bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT); 
             $z->execute();
           }
        }

        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento, 
        A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as celular, A.tbl_aprendiz_DIRECCION as 
        direccion, A.tbl_aprendiz_CORREO as correo, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as nombre_programa, 
        T.tbl_tipodocumento_ABREVIATURA as tipo_documento, FP.tbl_fidelizacion_proceso_ID as id_proceso, 
        FP.tbl_bienestar_ID as id_bienestar, I.tbl_persona_NOMBRES as nombre_instructor, I.tbl_persona_APELLIDOS as apellidos_instructor
         FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P on
        A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID 
        INNER JOIN tbl_fidelizacion_proceso as FP on A.tbl_aprendiz_ID=FP.tbl_aprendiz_ID inner join tbl_persona as I on 
        FP.tbl_instructor_ID=I.tbl_persona_ID WHERE FP.tbl_fidelizacion_ESTADO='ABIERTO'");
        $x->execute();
 
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }
    // metodo para traer los datos de una persona por medio de la cedula
    static public function ListarFidelizacionAprendiz($numero_documento,$envio)
    {
        
        if($envio==1)
        {
            $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
            A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as celular, A.tbl_aprendiz_DIRECCION as direccion,
            A.tbl_aprendiz_CORREO as correo, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as nombre_programa, T.tbl_tipodocumento_ABREVIATURA as tipo_documento,
             RP.tbl_MOTIVO_ENVIO as motivo_envio FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P 
             on A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID INNER JOIN 
             tbl_reporte_proceso as RP on A.tbl_aprendiz_ID=RP.tbl_aprendiz_ID 
            WHERE A.tbl_aprendiz_DOCUMENTO=:numero_documento");
            $x->bindParam(":numero_documento", $numero_documento, PDO::PARAM_INT);
            $x->execute();
            return $x->fetch(PDO::FETCH_ASSOC);
           
        }
        else
        {
            $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
            A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as celular, A.tbl_aprendiz_DIRECCION as direccion,
            A.tbl_aprendiz_CORREO as correo, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as nombre_programa, T.tbl_tipodocumento_ABREVIATURA as tipo_documento 
            FROM tbl_aprendiz as A  INNER JOIN tbl_ficha as F on A.tbl_ficha_ID=F.tbl_ficha_ID  INNER JOIN tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID INNER JOIN 
            tbl_tipodocumento as T on A.tbl_tipodocumento_ID= T.tbl_tipodocumento_ID WHERE A.tbl_aprendiz_DOCUMENTO=:numero_documento");
             $x->bindParam(":numero_documento", $numero_documento, PDO::PARAM_INT);
            $x->execute();
            return $x->fetch(PDO::FETCH_ASSOC);
            
        }
        
    }

    static public function GuardarProcesoFidelizacion($datos)
    {
        $a=Conexion::conectar()->prepare("SELECT FP.tbl_bienestar_ID as id_bienestar FROM  tbl_fidelizacion_proceso as FP
         WHERE FP.tbl_fidelizacion_proceso_ID=:id_proceso");
        $a->bindParam(":id_proceso", $datos['id_proceso'], PDO::PARAM_INT);
        $a->execute();
        $respuesta= $a->fetch(PDO::FETCH_ASSOC);

        if($respuesta['id_bienestar']==0)
        {
            $hora=date('h:i:s A');

            $x=Conexion::conectar()->prepare("UPDATE tbl_fidelizacion_proceso SET tbl_bienestar_ID=:id_bienestar WHERE tbl_fidelizacion_proceso_ID=:id_proceso");
            $x->bindParam(":id_bienestar", $datos['id_bienestar'], PDO::PARAM_INT);
            $x->bindParam(":id_proceso", $datos['id_proceso'], PDO::PARAM_INT);
            $x->execute();

            $z=Conexion::conectar()->prepare("INSERT INTO  tbl_fidelizacion_descripcion (tbl_fidelizacion_descripcion_ID,tbl_fidelizacion_proceso_tbl_fidelizacion_proceso_ID,tbl_fidelizacion_TEXTO,tbl_fidelizacion_descripcion_FECHA,tbl_fidelizacion_descripcion_HORA) 
            values (null,:id_proceso,:descripcion, now(),:hora)");
            $z->bindParam(":id_proceso", $datos['id_proceso'], PDO::PARAM_INT);
            $z->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
            $z->bindParam(":hora", $hora, PDO::PARAM_STR);
            if($z->execute()){ return true;}else{return false;}
        }
        else
        {
            return false;
        }
        
    }


//metodos de la tabla 

    static public function ListarObservacion($id_proceso)
    {
        $x=Conexion::conectar()->prepare("SELECT FD.tbl_fidelizacion_descripcion_FECHA as fecha_observacion, FD.tbl_fidelizacion_descripcion_HORA as hora_observacion,
        FD.tbl_fidelizacion_descripcion_ID as id_observacion FROM tbl_fidelizacion_descripcion as FD WHERE tbl_fidelizacion_proceso_tbl_fidelizacion_proceso_ID=:id_proceso");
        $x->bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT);
        $x->execute();

        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarObservacion($id_proceso,$descripcion)
    {
        $hora=date('h:i:s A');
        $y=Conexion::conectar()->prepare("INSERT INTO  tbl_fidelizacion_descripcion (tbl_fidelizacion_descripcion_ID,tbl_fidelizacion_proceso_tbl_fidelizacion_proceso_ID,tbl_fidelizacion_TEXTO,tbl_fidelizacion_descripcion_FECHA,tbl_fidelizacion_descripcion_HORA) 
        values (null,:id_proceso,:descripcion, now(),:hora)");
         $y->bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT);
         $y->bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
         $y->bindParam(":hora", $hora, PDO::PARAM_STR);
         if($y->execute()){ return true;}else{return false;}
    }

    static public function ConsultarObservacion($id_descripcion)
    {
        $x=Conexion::conectar()->prepare("SELECT O.tbl_fidelizacion_TEXTO as texto_observacion FROM tbl_fidelizacion_descripcion as O WHERE tbl_fidelizacion_descripcion_ID=:id_descripcion ");
        $x->bindParam(":id_descripcion", $id_descripcion, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarObservacion($id_descripcion,$texto_observacion)
    {
        $hora=date('h:i:s A');
        $y=Conexion::conectar()->prepare("UPDATE tbl_fidelizacion_descripcion SET tbl_fidelizacion_TEXTO=:texto_observacion, 
        tbl_fidelizacion_descripcion_FECHA=now(), tbl_fidelizacion_descripcion_HORA=:hora WHERE tbl_fidelizacion_descripcion_ID =:id_descripcion ");
        $y->bindParam(":texto_observacion", $texto_observacion, PDO::PARAM_STR);
        $y->bindParam(":id_descripcion", $id_descripcion, PDO::PARAM_INT);
        $y->bindParam(":hora", $hora, PDO::PARAM_STR);
        if($y->execute()){ return true;}else{return false;}
    }

    static public function EliminarObservacion($id_descripcion)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_fidelizacion_descripcion WHERE tbl_fidelizacion_descripcion_ID=:id_descripcion ");
        $x->bindParam(":id_descripcion", $id_descripcion, PDO::PARAM_INT);
        if($x->execute()){ return true;}else{return false;}
    }

    static public function GuardarInasistenciaAprendices($id_aprendiz,$id_instructor,$id_ficha)
    {
        $festivos=["2022-20-07",
                   "2022-08-15",
                   "2022-10-17",
                   "2022-11-07",
                   "2022-11-14",
                   "2022-12-08",
                   "2023-01-09",
                   "2023-03-20",
                   "2023-04-06",
                   "2023-04-07",
                   "2023-05-01",
                   "2023-05-22",
                   "2023-06-12",
                   "2023-06-26",
                   "2022-07-03",
                   "2022-07-20",];
        $FechaActual = date('Y-m-d'); 
        $final=date("Y-m-d",strtotime($FechaActual."+ 4 days")); 
        $FechaCierre=date("Y-m-d",strtotime($FechaActual."+ 4 days"));
        
        for($i=$FechaActual; $i<=$final; $i=date("Y-m-d", strtotime($i ."+ 1 days")))
        {
            $x= date('l', strtotime($i));
            $indice = array_search($i,$festivos,true);
            $s = strval($indice);
            if($x=="Sunday")
            {
             $FechaCierre=date("Y-m-d",strtotime($FechaCierre."+ 1 days"));
            }
            else
            {
              if($s!="")
              {
               $FechaCierre=date("Y-m-d",strtotime($FechaCierre."+ 1 days"));
              }
            }
        }
        
     
            $FechaActual = date('Y-m-d');  
            $HoraActual=date('h:i:s A');
            $x=Conexion::conectar()->prepare("INSERT INTO  tbl_fidelizacion_proceso (tbl_fidelizacion_proceso_ID,tbl_instructor_ID,tbl_ficha_ID,tbl_aprendiz_ID,tbl_fidelizacion_ESTADO,tbl_fidelizacion_FECHACRE,tbl_fidelizacion_HORACRE,tbl_bienestar_ID,tbl_FECHA_CIERRE_BIENESTAR,tbl_FECHA_CIERRE_SISTEMA,tbl_HORA_CIERRE,tbl_MOTIVO_CIERRE,tbl_URL) 
            values (null,'$id_instructor','$id_ficha','$id_aprendiz','ABIERTO',now(),'$HoraActual','0','','$FechaCierre','$HoraActual','','')");
             $x->execute();
            return true;
        
       
    }
   
    static public function CerrarCaso($datos)
    {

        $hora=date('h:i:s A');
        $y=Conexion::conectar()->prepare("UPDATE tbl_fidelizacion_proceso SET tbl_FECHA_CIERRE_BIENESTAR=now(), tbl_HORA_CIERRE=:hora,
        tbl_MOTIVO_CIERRE=:motivo, tbl_URL=:url, tbl_fidelizacion_ESTADO='CERRADO' WHERE tbl_fidelizacion_proceso_ID=:id_proceso");
        $y->bindParam(":id_proceso", $datos['id_proceso'], PDO::PARAM_INT);
        $y->bindParam(":motivo", $datos['motivo_cierre'], PDO::PARAM_STR);
        $y->bindParam(":url", $datos['url'], PDO::PARAM_STR);
        $y->bindParam(":hora", $hora, PDO::PARAM_STR);
        if($y->execute()){ return true;}else{return false;}
    }


    static public function GuardarReporteComportamiento($datos)
    {
        $FechaActual = date('Y-m-d');
        $hora=date('h:i:s A');

        $x=Conexion::conectar()->prepare("SELECT count(*) FROM tbl_reporte_proceso WHERE tbl_aprendiz_ID=:id_aprendiz 
        and tbl_reporte_FECHACRE=:fecha");
        $x->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
        $x->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
        $x->execute();
        $n = $x->fetchColumn();
        if($n>0)
        {
          return false;
        }
        else
        {
            $y=Conexion::conectar()->prepare("INSERT INTO tbl_reporte_proceso (tbl_reporte_proceso_ID, tbl_instructor_ID,tbl_ficha_ID,tbl_aprendiz_ID,tbl_reporte_ESTADO,tbl_reporte_FECHACRE,
            tbl_reporte_HORACRE,tbl_bienestar_ID,tbl_FECHA_CIERRE_BIENESTAR,tbl_HORA_CIERRE,tbl_MOTIVO_ENVIO, tbl_reporte_proceso_TIPO) VALUES 
            (null,:id_instructor,:id_ficha,:id_aprendiz,'ABIERTO',:fecha,:hora,'0','','',:observacion,:tipo_reporte)");
            $y->bindParam(":id_instructor", $datos['id_instructor'], PDO::PARAM_INT);
            $y->bindParam(":id_aprendiz", $datos['id_aprendiz'], PDO::PARAM_INT);
            $y->bindParam(":id_ficha", $datos['id_ficha'], PDO::PARAM_INT);
            $y->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
            $y->bindParam(":hora", $hora, PDO::PARAM_STR);
            $y->bindParam(":observacion", $datos['observacion'], PDO::PARAM_STR);
            $y->bindPAram(":tipo_reporte", $datos['tipo_reporte'], PDO::PARAM_STR);
            if($y->execute()){ return true;}else{return false;}
        }
    }

    static public function ListarReporteDisciplinario()
    {
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz ,A.tbl_aprendiz_DOCUMENTO as numero_documento,  
        A.tbl_aprendiz_NOMBRES as nombres, A.tbl_aprendiz_APELLIDOS as apellidos, A.tbl_aprendiz_CELULAR as celular,
         RP.tbl_reporte_proceso_ID as id_proceso, tbl_reporte_proceso_TIPO as  tipo, tbl_MOTIVO_ENVIO as motivo FROM tbl_aprendiz as A  INNER JOIN tbl_reporte_proceso as RP on 
         A.tbl_aprendiz_ID=RP.tbl_aprendiz_ID WHERE RP.tbl_reporte_ESTADO='ABIERTO'");
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function GuardarObservacionRD($id_proceso,$descripcion)
    {
        $hora=date('h:i:s A');
        $y=Conexion::conectar()->prepare("INSERT INTO  tbl_reportes_descripcion (tbl_reporte_descripcion_iD,tbl_reporte_descripcion_tbl_reporte_proceso_ID,
        tbl_reporte_descripcion_TEXTO, tbl_reporte_descripcion_HORA,tbl_reporte_descripcion_FECHA) 
        values (null,:id_proceso,:descripcion,:hora, now())");
         $y->bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT);
         $y->bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
         $y->bindParam(":hora", $hora, PDO::PARAM_STR);
         if($y->execute()){ return true;}else{return false;}
    }

    static public function ListarObservacionRD($id_proceso)
    {
        $x=Conexion::conectar()->prepare("SELECT RD.tbl_reporte_descripcion_FECHA as fecha_observacion, RD.tbl_reporte_descripcion_HORA as hora_observacion,
        RD.tbl_reporte_descripcion_iD as id_observacion FROM tbl_reportes_descripcion as RD WHERE tbl_reporte_descripcion_tbl_reporte_proceso_ID=:id_proceso");
        $x->bindParam(":id_proceso", $id_proceso, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }
    
    static public function ConsultarObservacionRD($id_descripcion)
    {
        $x=Conexion::conectar()->prepare("SELECT RD.tbl_reporte_descripcion_TEXTO as texto_observacion FROM tbl_reportes_descripcion as RD 
        WHERE tbl_reporte_descripcion_iD=:id_descripcion ");
        $x->bindParam(":id_descripcion", $id_descripcion, PDO::PARAM_INT);
        $x->execute();
        return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarObservacionRD($id_descripcion,$texto_observacion)
    {
        $hora=date('h:i:s A');
        $y=Conexion::conectar()->prepare("UPDATE tbl_reportes_descripcion SET tbl_reporte_descripcion_TEXTO=:texto_observacion, 
        tbl_reporte_descripcion_FECHA=now(), tbl_reporte_descripcion_HORA=:hora WHERE tbl_reporte_descripcion_iD =:id_descripcion ");
        $y->bindParam(":texto_observacion", $texto_observacion, PDO::PARAM_STR);
        $y->bindParam(":id_descripcion", $id_descripcion, PDO::PARAM_INT);
        $y->bindParam(":hora", $hora, PDO::PARAM_STR);
        if($y->execute()){ return true;}else{return false;}
    }

    static public function EliminarObservacionRD($id_descripcion)
    {
        $x=Conexion::conectar()->prepare("DELETE FROM tbl_reportes_descripcion WHERE 	tbl_reporte_descripcion_iD=:id_descripcion ");
        $x->bindParam(":id_descripcion", $id_descripcion, PDO::PARAM_INT);
        if($x->execute()){ return true;}else{return false;}
    }
    static public function CerrarCasoRD($datos)
    {
        $hora=date('h:i:s A');
        $y=Conexion::conectar()->prepare("UPDATE tbl_reporte_proceso SET tbl_FECHA_CIERRE_BIENESTAR=now(), tbl_HORA_CIERRE=:hora,
        tbl_MOTIVO_CIERRE=:motivo, tbl_URL=:url, tbl_reporte_ESTADO='CERRADO' WHERE tbl_reporte_proceso_ID=:id_proceso");
        $y->bindParam(":id_proceso", $datos['id_proceso'], PDO::PARAM_INT);
        $y->bindParam(":motivo", $datos['motivo_cierre'], PDO::PARAM_STR);
        $y->bindParam(":url", $datos['url'], PDO::PARAM_STR);
        $y->bindParam(":hora", $hora, PDO::PARAM_STR);
        if($y->execute()){ return true;}else{return false;}
    }

    static public function ListarReporteFidelizacionHoy()
    {
        $FechaActual = date('Y-m-d'); 
        $y=Conexion::conectar()->prepare("SELECT F.tbl_fidelizacion_ESTADO as estado, A.tbl_aprendiz_NOMBRES as nombres, 
        A.tbl_aprendiz_APELLIDOS as apellidos, P.tbl_programa_NOMBRE as programa, FI.tbl_ficha_CODIGO as ficha, 
        F.tbl_fidelizacion_FECHACRE as fecha FROM tbl_fidelizacion_proceso AS F inner join tbl_aprendiz as A on
         F.tbl_aprendiz_ID= A.tbl_aprendiz_ID inner join tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID 
         inner join tbl_ficha as FI on A.tbl_ficha_ID=FI.tbl_ficha_ID where tbl_fidelizacion_FECHACRE=:hoy");
        $y->bindParam(":hoy", $FechaActual, PDO::PARAM_STR);
        $y->execute();
        return $y->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarReporteFidelizacionEntreFechas($fechaI, $fechaF)
    {
        $y=Conexion::conectar()->prepare("SELECT F.tbl_fidelizacion_ESTADO as estado, A.tbl_aprendiz_NOMBRES as nombres,
        A.tbl_aprendiz_APELLIDOS as apellidos, P.tbl_programa_NOMBRE as programa, FI.tbl_ficha_CODIGO as ficha,
        F.tbl_fidelizacion_FECHACRE as fecha FROM tbl_fidelizacion_proceso AS F inner join tbl_aprendiz as A on 
        F.tbl_aprendiz_ID= A.tbl_aprendiz_ID inner join tbl_programa as P on A.tbl_programa_ID=P.tbl_programa_ID
        inner join tbl_ficha as FI on A.tbl_ficha_ID=FI.tbl_ficha_ID where tbl_fidelizacion_FECHACRE>=:fecha_inicial 
        and tbl_fidelizacion_FECHACRE<=:fecha_final");
        $y->bindParam(":fecha_inicial", $fechaI, PDO::PARAM_STR);
        $y->bindParam(":fecha_final", $fechaF, PDO::PARAM_STR);
        $y->execute();
        return $y->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarHistorialFidelizacion()
    {
        $y=Conexion::conectar()->prepare("SELECT FI.tbl_fidelizacion_proceso_ID as id_fidelizacion, FI.tbl_fidelizacion_ESTADO as
         estado, FI.tbl_MOTIVO_CIERRE as motivo_cierre, FI.tbl_fidelizacion_FECHACRE as fecha_creacion, 
         FI.tbl_FECHA_CIERRE_BIENESTAR as fecha_cierre_bienestar, FI.tbl_FECHA_CIERRE_SISTEMA as fecha_cierre_sistema,FI.tbl_URL 
         as url, F.tbl_ficha_CODIGO as ficha, P.tbl_programa_NOMBRE as programa, A.tbl_aprendiz_NOMBRES as nombres,
          A.tbl_aprendiz_APELLIDOS as apellidos FROM tbl_fidelizacion_proceso as FI inner join tbl_ficha as F on 
          FI.tbl_ficha_ID=F.tbl_ficha_ID inner join tbl_programa as P on F.tbl_programa_ID=P.tbl_programa_ID inner JOIN
           tbl_aprendiz as A on FI.tbl_aprendiz_ID=A.tbl_aprendiz_ID where tbl_fidelizacion_ESTADO='CERRADO'");
        $y->execute();
        return $y->fetchAll(PDO::FETCH_ASSOC);
    }

   
}
