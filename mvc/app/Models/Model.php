<?php

namespace mvc\app\Models;

use mvc\app\Config\Database;

use PDO;

abstract class Model
{
    private static $_bdd;

    // Récupère la connexion à la bdd
    protected function getBdd()
    {
        if (self::$_bdd == null) {
            self::$_bdd = Database::connect();
        }
        return self::$_bdd;
    }

    protected function getAll($table, $obj)
    {
        $var = [];
        $req = $this->getBdd()->prepare('SELECT * FROM ' . $table . ' ORDER BY id desc');
        $req->execute();
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }
}
