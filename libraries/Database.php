<?php


class Database
{
    // Un singleton permet de limiter le nombre de connexions à la base de données :
    private static $instance = null;

    /**
     * Retourne une connection à la base de données
     * 
     * @return PDO
     */

    public static function getPdo() : PDO 
    {
        if (self::$instance === null)
        {
            self::$instance = new PDO('mysql:host=localhost;dbname=lebensrasn713;charset=utf8', 'root', 'root', [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        }

        return self::$instance;
    }
}


?>