 <?php

require_once "conexion.php";
date_default_timezone_set('America/Bogota');
Class InstructorModelo{
    static public function ListarFichaPorInstructor($id_instructor)
    {
        $x=Conexion::conectar()->prepare("SELECT FI.tbl_ficha_ID as id_ficha, F.tbl_ficha_CODIGO as codigo_ficha,
        P.tbl_programa_NOMBRE as nombre_programa  FROM tbl_ficha_vs_instructor as FI inner join tbl_ficha as F 
        on FI.tbl_ficha_ID=F.tbl_ficha_ID inner join tbl_programa as P on F.tbl_programa_ID=P.tbl_programa_ID
     WHERE tbl_instructor_ID=:id_instructor");
        $x->bindParam(":id_instructor", $id_instructor, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ListarAprendizPorFichaYAsistencia($id_ficha)
    {
        //Esta consulta trae los datos del aprendiz
        $x=Conexion::conectar()->prepare("SELECT A.tbl_aprendiz_ID as id_aprendiz, A.tbl_aprendiz_NOMBRES as nombres,
        A.tbl_aprendiz_APELLIDOS as apellidos  FROM tbl_aprendiz as A  WHERE tbl_ficha_ID=:id_ficha AND  tbl_aprendiz_ESTADO ='EN FORMACION'");
        $x->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
        $x->execute();
      
       //verifica si exite la asistencia del aprendiz en securitas
        $FechaActual = date('Y-m-d');  
        $y=Conexion::conectar2()->prepare("SELECT A.tbl_personal_ID as id_aprendiz, A.tbl_personal_ID_FICHA as id_ficha,
         A.tbl_asistencia_HORA as hora_entrada FROM tbl_asistencia as A WHERE tbl_personal_ID_FICHA=:id_ficha and tbl_asistencia_FECHA=:fecha");
        $y->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
        $y->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
        $y->execute();

       //esta consulta las observaciones que tiene cada aprendiz
        $z=Conexion::conectar()->prepare("SELECT AC.tbl_aprendiz_ID as id_aprendiz, AC.tbl_asistencia_TIPO as tipo_observacion FROM tbl_asistencia_clase as AC WHERE tbl_fecha_asistencia=:fecha and tbl_ficha_ID=:id_ficha ");
       $z->bindParam(":id_ficha", $id_ficha, PDO::PARAM_INT);
       $z->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
       $z->execute();
        $c=0;
        $c2=0;
        $c3=0;

            while ($r2 = $y->fetch(PDO::FETCH_ASSOC)) {
                $asistencia["asistencia"][] = $r2;
                $c= $c+1;
            }
            while ($r = $x->fetch(PDO::FETCH_ASSOC)) {
                $aprendiz["aprendiz"][] = $r;
                $c2= $c2+1;
            }
            while ($r3 = $z->fetch(PDO::FETCH_ASSOC)) {
                $asistencia_clase["asistencia_clase"][] = $r3;
                $c3= $c3+1;
            }
            
            if($c>0 && $c2>0 && $c3>0):
               $resultado= array_merge($aprendiz,$asistencia,$asistencia_clase);
               return $resultado;
            elseif($c>0 && $c2>0 && $c3==0):
                $resultado= array_merge($aprendiz,$asistencia);
                return $resultado;
            else:
               return false;
            endif;
      }

      static public function GuardarAsistenciaClase($datos)
      {
        $fecha = date('Y-m-d');  
        $g=Conexion::conectar()->prepare("INSERT INTO tbl_asistencia_clase(tbl_asistecnia_clase_ID, tbl_ficha_ID, 
        tbl_instructor_ID, tbl_aprendiz_ID, tbl_asistencia_TIPO, tbl_asistencia_OBSERVACION,tbl_fecha_asistencia) VALUES 
        (null,:id_ficha,:id_instructor,:id_aprendiz,:asistencia_tipo,:asistencia_observacion,:fecha)");
        $g->bindParam(":id_ficha", $datos["id_ficha"], PDO::PARAM_INT);
        $g->bindParam(":id_instructor", $datos["id_instructor"], PDO::PARAM_INT);
        $g->bindParam(":id_aprendiz", $datos["id_aprendiz"], PDO::PARAM_INT);
        $g->bindParam(":asistencia_tipo", $datos["asistencia_tipo"], PDO::PARAM_STR);
        $g->bindParam(":asistencia_observacion", $datos["asistencia_observacion"], PDO::PARAM_STR);
        $g->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        if($g->execute()){ return true; }else{ return false;}
      }

      static public function HistorialAsistenciaAprendizHoy($ficha)
      {
        $fecha = date('Y-m-d');  
        $g=Conexion::conectar()->prepare("SELECT AC.tbl_asistecnia_clase_ID as id_asistencia, AC.tbl_asistencia_TIPO as tipo_asistencia,
         AC.tbl_fecha_asistencia as fecha, AC.tbl_asistencia_OBSERVACION as observacion, A.tbl_aprendiz_NOMBRES as nombres, 
         A.tbl_aprendiz_APELLIDOS as apellidos FROM tbl_asistencia_clase AS AC INNER JOIN tbl_aprendiz as A on 
         AC.tbl_aprendiz_ID=A.tbl_aprendiz_ID  WHERE AC.tbl_fecha_asistencia=:fecha and AC.tbl_ficha_ID=:ficha");
        $g->bindParam(":ficha", $ficha, PDO::PARAM_INT);
        $g->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $g->execute();
        return $g->fetchAll(PDO::FETCH_ASSOC);
      }
      static public function HistorialAsistenciaAprendizEntreFechas($ficha,$fechaI,$fechaF)
      {
        $g=Conexion::conectar()->prepare("SELECT AC.tbl_asistecnia_clase_ID as id_asistencia, AC.tbl_asistencia_TIPO as 
        tipo_asistencia, AC.tbl_fecha_asistencia as fecha, AC.tbl_asistencia_OBSERVACION as observacion, A.tbl_aprendiz_NOMBRES
        as nombres, A.tbl_aprendiz_APELLIDOS as apellidos FROM tbl_asistencia_clase AS AC INNER JOIN tbl_aprendiz as A on
        AC.tbl_aprendiz_ID=A.tbl_aprendiz_ID  WHERE AC.tbl_fecha_asistencia>=:fecha_inicial and AC.tbl_fecha_asistencia<=:fecha_final
        and AC.tbl_ficha_ID=:ficha");
        $g->bindParam(":fecha_inicial", $fechaI, PDO::PARAM_STR);
        $g->bindParam(":fecha_final", $fechaF, PDO::PARAM_STR);
        $g->bindParam(":ficha", $ficha, PDO::PARAM_INT);
        $g->execute();
        return $g->fetchAll(PDO::FETCH_ASSOC);
      }
     
   
   static public function NovedadAprendiz($id_aprendiz,$tipo_novedad){
       $x=Conexion::conectar()->prepare("UPDATE tbl_aprendiz SET tbl_aprendiz_ESTADO = :tipo_novedad WHERE tbl_aprendiz_ID = :id_aprendiz");
       $x->bindParam(":id_aprendiz", $id_aprendiz, PDO::PARAM_STR);
       $x->bindParam(":tipo_novedad",$tipo_novedad, PDO::PARAM_STR);
       $x->execute();
       return $x->fetchAll(PDO::FETCH_ASSOC);
       
   }
   
  
}
