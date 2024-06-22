<?php

namespace mvc\app\Config;

use PDO;
use PDOException;

class Database
{
    public static function connect()
    {
        $config = include(__DIR__ . '/Config.php');

        try {
            $db = new PDO(
                'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'],
                $config['db']['user'],
                $config['db']['pass']
            );
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }
}
?>
