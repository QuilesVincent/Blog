<?php


namespace General;


use PDO;

/**
 * Class DBManager
 * @package App
 * connexion SQL
 */
class DBManager
{

    /**
     * @var
     */
    private static $pdo;

    /**
     * @var string
     */
    private static $dbName = "blogperso";

    /**
     * @param string $dbname
     * @return PDO
     */
    public static function dbConnect()
    {
        self::$pdo = new PDO("mysql:host=localhost;dbname=" . self::$dbName . ";charset=utf8", 'root', '');
        return self::$pdo;
    }

    /**
     * @return mixed
     */
    public static function getPdo()
    {
        return self::$pdo;
    }
}