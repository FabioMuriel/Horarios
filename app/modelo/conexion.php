<?php
//conexion a base de datos parametrizacion
class Conexion{
    public  static function conectar(){
        $link = new PDO("mysql:host=localhost; dbname=senasubs", "root", "");
        return $link;
    }
//conexion a base de datos securitas
    public  static function conectar2(){
        $link = new PDO("mysql:host=localhost; dbname=senasubs_securitas", "senasubs_securitas", "semillero_2022*");
        return $link;
    }

    
}


