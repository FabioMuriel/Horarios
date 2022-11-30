<?php

require_once "conexion.php";
date_default_timezone_set('America/Bogota');
Class AutoreporteModelo{

    static public function GuardarAutoreporte($datos)
    {
            $FechaActual = date('Y-m-d');  
            $x=Conexion::conectar2()->prepare("INSERT INTO tbl_autoreporte_personal (tbl_autoreporte_ID, tbl_personal_ID, tbl_FECHA, fiebre,
            fiebre14,tos,respiracion,fatiga,olfato,dolor_cabeza,pecho,nauseas,garganta) VALUES (null,:id_persona,:fecha,:fiebre,:fiebre14,:tos,
            :respiracion,:fatiga,:olfato,:dolor_cabeza,:pecho,:nauseas,:garganta)");
            $x->bindParam(":id_persona", $datos['id_persona'], PDO::PARAM_INT);
            $x->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
            $x->bindParam(":fiebre", $datos['fiebre'], PDO::PARAM_INT);
            $x->bindParam(":fiebre14", $datos['fiebre14'], PDO::PARAM_INT);
            $x->bindParam(":tos", $datos['tos'], PDO::PARAM_INT);
            $x->bindParam(":respiracion", $datos['respiracion'], PDO::PARAM_INT);
            $x->bindParam(":fatiga", $datos['fatiga'], PDO::PARAM_INT);
            $x->bindParam(":olfato", $datos['olfato'], PDO::PARAM_INT);
            $x->bindParam(":dolor_cabeza", $datos['dolor_cabeza'], PDO::PARAM_INT);
            $x->bindParam(":pecho", $datos['pecho'], PDO::PARAM_INT);
            $x->bindParam(":nauseas", $datos['nauseas'], PDO::PARAM_INT);
            $x->bindParam(":garganta", $datos['garganta'], PDO::PARAM_INT);
            if($x->execute()){ return true; }else{ return false;}
    }

    static public function ConsultarAutoreporte($id)
    {
            $FechaActual = date('Y-m-d');  
            $x=Conexion::conectar2()->prepare("SELECT COUNT(*) FROM tbl_autoreporte_personal WHERE tbl_personal_ID=:id_persona and tbl_FECHA=:fecha");
            $x->bindParam(":id_persona", $id, PDO::PARAM_INT);
            $x->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
            $x->execute();
            $n = $x->fetchColumn();
            if($n>0):
                return true;
            else:
                return false;
            endif;
    }
   
    static public function GuardarAutoreporteAprendiz($datos)
    {
            $FechaActual = date('Y-m-d');  
            $x=Conexion::conectar2()->prepare("INSERT INTO tbl_autoreporte_aprendiz (tbl_autoreporte_ID, tbl_aprendiz_ID, tbl_FECHA, fiebre,
            fiebre14,tos,respiracion,fatiga,olfato,dolor_cabeza,pecho,nauseas,garganta) VALUES (null,:id_persona,:fecha,:fiebre,:fiebre14,:tos,
            :respiracion,:fatiga,:olfato,:dolor_cabeza,:pecho,:nauseas,:garganta)");
            $x->bindParam(":id_persona", $datos['id_persona'], PDO::PARAM_INT);
            $x->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
            $x->bindParam(":fiebre", $datos['fiebre'], PDO::PARAM_INT);
            $x->bindParam(":fiebre14", $datos['fiebre14'], PDO::PARAM_INT);
            $x->bindParam(":tos", $datos['tos'], PDO::PARAM_INT);
            $x->bindParam(":respiracion", $datos['respiracion'], PDO::PARAM_INT);
            $x->bindParam(":fatiga", $datos['fatiga'], PDO::PARAM_INT);
            $x->bindParam(":olfato", $datos['olfato'], PDO::PARAM_INT);
            $x->bindParam(":dolor_cabeza", $datos['dolor_cabeza'], PDO::PARAM_INT);
            $x->bindParam(":pecho", $datos['pecho'], PDO::PARAM_INT);
            $x->bindParam(":nauseas", $datos['nauseas'], PDO::PARAM_INT);
            $x->bindParam(":garganta", $datos['garganta'], PDO::PARAM_INT);
            if($x->execute()){ return true; }else{ return false;}
    }

    static public function ConsultarAutoreporteAprendiz($id)
    {
            $FechaActual = date('Y-m-d');  
            $x=Conexion::conectar2()->prepare("SELECT COUNT(*) FROM tbl_autoreporte_aprendiz WHERE tbl_aprendiz_ID=:id_persona and tbl_FECHA=:fecha");
            $x->bindParam(":id_persona", $id, PDO::PARAM_INT);
            $x->bindParam(":fecha", $FechaActual, PDO::PARAM_STR);
            $x->execute();
            $n = $x->fetchColumn();
            if($n>0):
                return true;
            else:
                return false;
            endif;
    }

   
}
?>


