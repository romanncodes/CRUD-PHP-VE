<?php

namespace models;


class Conexion
{
    public static $user = "root";
    public static $pass = "root";
    public static $url = "mysql:host=localhost;dbname=vespertinos";


    public static function conector()
    {
        try {
            return new \PDO(Conexion::$url, Conexion::$user, Conexion::$pass);
        } catch (\PDOException $e) {
            return null;
        }
    }
}
