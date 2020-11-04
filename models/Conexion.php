<?php

namespace models;


class Conexion
{
    public static $user = "root";
    public static $pass = "root";
    public static $url = "mysql:host=localhost;dbname=vespertinos";
    //public static $user = "upamc2by6oqdmuc0";
    //public static $pass = "PAS6h6cUxB67R2FXxOff";
    //public static $url = "mysql:host=b1mh5i10awupuekqxg7q-mysql.services.clever-cloud.com;dbname=b1mh5i10awupuekqxg7q";


    public static function conector()
    {
        try {
            return new \PDO(Conexion::$url, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
}
