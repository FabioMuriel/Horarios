<?php

require_once "conexion.php";
date_default_timezone_set('America/Bogota');
class HorarioModelo
{
    static public function GuardarHorario($datos)
    {
        $x = Conexion::conectar()->prepare("SELECT * FROM tbl_horario WHERE tbl_salon_ID=:salon");
        $x->bindParam(":salon", $datos["salon"], PDO::PARAM_INT);
        $x->execute();
        $c = $x->fetchColumn();
        if ($c > 0) {
            return false;
        } 
        else
        {
            $y = Conexion::conectar()->prepare("INSERT INTO tbl_horario(tbl_horario_ID, tbl_salon_ID, tbl_sede_ID, 
            tbl_horario_HORAS, tbl_horario_DIAS, tbl_horario_TABLA) VALUES (null,:salon,:sede,:horas,:dias,:horario)");
            $y->bindParam(":sede", $datos["sede"], PDO::PARAM_INT);
            $y->bindParam(":salon", $datos["salon"], PDO::PARAM_INT);
            $y->bindParam(":horario", $datos["horario"], PDO::PARAM_STR);
            $y->bindParam(":horas", $datos["horas"], PDO::PARAM_INT);
            $y->bindParam(":dias", $datos["dias"], PDO::PARAM_INT);
            if ($y->execute()) {return true;} else {return false;}
        }
    }

    static public function ListarHorario($sede)
    {
        $x = Conexion::conectar()->prepare("SELECT H.tbl_horario_ID as id_horario, H.tbl_salon_ID as id_salon,
         S.tbl_salon_NOMBRE as salon FROM tbl_horario as H INNER JOIN tbl_salon as S on 
         H.tbl_salon_ID=S.tbl_salon_ID WHERE H.tbl_sede_ID=:sede");
        $x->bindParam(":sede", $sede, PDO::PARAM_INT);
        $x->execute();
        return $x->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function EliminarHorario($id,$id_salon)
    {
            $x = Conexion::conectar()->prepare("DELETE FROM tbl_horario WHERE tbl_horario_ID=:id_horario");
            $x->bindParam(":id_horario", $id, PDO::PARAM_INT);
            $x->execute();

            $z = Conexion::conectar()->prepare("DELETE FROM tbl_instructor_horario WHERE tbl_salon_ID=:id_salon");
            $z->bindParam(":id_salon", $id_salon, PDO::PARAM_INT);
            $z->execute();

            $y = Conexion::conectar()->prepare("DELETE FROM tbl_ficha_horario WHERE tbl_salon_ID=:id_salon");
            $y->bindParam(":id_salon", $id_salon, PDO::PARAM_INT);
            if ($y->execute()) {return true;} else {return false;}
    }
    static public function ConsultarHorario($id)
    {
            $x = Conexion::conectar()->prepare("SELECT H.tbl_horario_TABLA AS horario_tabla FROM tbl_horario as H 
            WHERE tbl_horario_ID=:id_horario");
            $x->bindParam(":id_horario", $id, PDO::PARAM_INT);
            $x->execute();
            return $x->fetch(PDO::FETCH_ASSOC);
    }

    static public function ActualizarHorario($datos)
    {
        $c = 1;
        $horas = $datos["horas"];
        $posicion = $datos["posicion"];

        $x = Conexion::conectar()->prepare("UPDATE tbl_horario SET tbl_horario_TABLA=:tabla WHERE tbl_horario_ID=:id_horario");
        $x->bindParam(":id_horario", $datos["id_horario"], PDO::PARAM_INT);
        $x->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
        $x->execute();

        while ($c <= $horas) 
        {
            $y = Conexion::conectar()->prepare("INSERT INTO tbl_instructor_horario(tbl_instructor_horario_ID, tbl_instructor_ID, 
            tbl_ficha_ID, tbl_competencia_ID, tbl_salon_ID, tbl_horario_POSICION) VALUES (null,:id_instructor,:id_ficha,:id_competencia,
            :id_salon,:posicion)");
            $y->bindParam(":id_instructor", $datos["instructor"], PDO::PARAM_INT);
            $y->bindParam(":id_ficha", $datos["ficha"], PDO::PARAM_INT);
            $y->bindParam(":id_competencia", $datos["competencia"], PDO::PARAM_INT);
            $y->bindParam(":id_salon", $datos["id_salon"], PDO::PARAM_INT);
            $y->bindParam(":posicion", $posicion, PDO::PARAM_INT);
            $y->execute();

            $z = Conexion::conectar()->prepare("INSERT INTO tbl_ficha_horario(tbl_ficha_horario_ID, 
            tbl_ficha_ID, tbl_instructor_ID, tbl_salon_ID, tbl_competencia_ID, tbl_horario_POSICION) 
            VALUES (null,:id_ficha,:id_instructor,:id_salon,:id_competencia,:posicion)");
            $z->bindParam(":id_instructor", $datos["instructor"], PDO::PARAM_INT);
            $z->bindParam(":id_ficha", $datos["ficha"], PDO::PARAM_INT);
            $z->bindParam(":id_competencia", $datos["competencia"], PDO::PARAM_INT);
            $z->bindParam(":id_salon", $datos["id_salon"], PDO::PARAM_INT);
            $z->bindParam(":posicion", $posicion, PDO::PARAM_INT);
            $z->execute();
            $posicion = $posicion + 10;
            $c = $c + 1;
        }
        return true;
    }

    static public function BorrarCasillaHorario($datos)
    {
            $y = Conexion::conectar()->prepare("DELETE FROM tbl_instructor_horario WHERE tbl_salon_ID=:salon 
            and tbl_instructor_ID=:instructor and tbl_horario_POSICION=:posicion");
            $y->bindParam(":salon", $datos["id_salon"], PDO::PARAM_INT);
            $y->bindParam(":instructor",$datos["instructor"], PDO::PARAM_INT);
            $y->bindParam(":posicion",$datos["posicion"], PDO::PARAM_INT);
            $y->execute();

            $z = Conexion::conectar()->prepare("DELETE FROM tbl_ficha_horario WHERE tbl_salon_ID=:salon 
            and tbl_instructor_ID=:instructor and tbl_horario_POSICION=:posicion");
            $z->bindParam(":salon", $datos["id_salon"], PDO::PARAM_INT);
            $z->bindParam(":instructor",$datos["instructor"], PDO::PARAM_INT);
            $z->bindParam(":posicion",$datos["posicion"], PDO::PARAM_INT);
            $z->execute();

            $x = Conexion::conectar()->prepare("UPDATE tbl_horario SET tbl_horario_TABLA=:tabla WHERE tbl_horario_ID=:id_horario");
            $x->bindParam(":id_horario", $datos["id_horario"], PDO::PARAM_INT);
            $x->bindParam(":tabla", $datos["tabla"], PDO::PARAM_STR);
            if ($x->execute()) {return true;} else {return false;}
    }

    static public function ConsultarPosicion($datos)
    {
        $c = 1;
        $repetido = 0;
        $horas = $datos["horas"];
        $posicion = $datos["posicion"];

        while ($c <= $horas) 
        {
            $z = Conexion::conectar()->prepare("SELECT count(*) FROM tbl_instructor_horario WHERE tbl_instructor_ID=:id_instructor
            and tbl_horario_POSICION=:posicion");
            $z->bindParam(":id_instructor", $datos["instructor"], PDO::PARAM_INT);
            $z->bindParam(":posicion", $posicion, PDO::PARAM_STR);
            $z->execute();
            $posicion = $posicion + 10;
            $repetido = $repetido + $z->fetchColumn();
            $c = $c + 1;
        }
        if ($repetido>0) {return false;} else {return true;}
    }

    static public function ConsultarPosicionFicha($datos)
    {
        $c = 1;
        $repetido = 0;
        $horas = $datos["horas"];
        $posicion = $datos["posicion"];

        while ($c <= $horas) 
        {
            $z = Conexion::conectar()->prepare("SELECT count(*) FROM tbl_ficha_horario WHERE tbl_ficha_ID=:id_ficha
            and tbl_horario_POSICION=:posicion");
            $z->bindParam(":id_ficha", $datos["ficha"], PDO::PARAM_INT);
            $z->bindParam(":posicion", $posicion, PDO::PARAM_STR);
            $z->execute();
            $posicion = $posicion + 10;
            $repetido = $repetido + $z->fetchColumn();
            $c = $c + 1;
        }
        if ($repetido>0) {return false;} else {return true;}
    }

    static public function ConsultarHorarioInstructor($id)
    {
            $z = Conexion::conectar()->prepare("SELECT HI.tbl_horario_POSICION as posicion, F.tbl_ficha_CODIGO as ficha, 
            F.tbl_ficha_GRUPO as grupo, C.tbl_competencia_NOMBRE as competencia, S.tbl_salon_NOMBRE as salon FROM 
            tbl_instructor_horario as HI INNER JOIN tbl_ficha as F on HI.tbl_ficha_ID=F.tbl_ficha_ID INNER JOIN 
            tbl_competencia as C on HI.tbl_competencia_ID=C.tbl_competencia_ID INNER JOIN tbl_salon as S on 
            HI.tbl_salon_ID=S.tbl_salon_ID WHERE HI.tbl_instructor_ID=:id_instructor");
            $z->bindParam(":id_instructor", $id, PDO::PARAM_INT);
            $z->execute();
            return $z->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ConsultarHorarioFicha($id)
    {
            $z = Conexion::conectar()->prepare("SELECT FH.tbl_horario_POSICION as posicion, 
            P.tbl_persona_NOMBRES as nombres, P.tbl_persona_APELLIDOS as apellidos, S.tbl_salon_NOMBRE as 
            salon, C.tbl_competencia_NOMBRE as competencia FROM tbl_ficha_horario as FH INNER JOIN 
            tbl_persona as P on FH.tbl_instructor_ID=P.tbl_persona_ID INNER JOIN tbl_salon as S on 
            FH.tbl_salon_ID=S.tbl_salon_ID INNER JOIN tbl_competencia as C on 
            FH.tbl_competencia_ID=C.tbl_competencia_ID  WHERE FH.tbl_ficha_ID=:id_ficha");
            $z->bindParam(":id_ficha", $id, PDO::PARAM_INT);
            $z->execute();
            return $z->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function ConsultarHorarioSalon($id)
    {
            $x = Conexion::conectar()->prepare("SELECT H.tbl_horario_TABLA AS horario_tabla FROM tbl_horario as H 
            WHERE tbl_salon_ID=:id_salon");
            $x->bindParam(":id_salon", $id, PDO::PARAM_INT);
            $x->execute();
            return $x->fetch(PDO::FETCH_ASSOC);
    }


}
