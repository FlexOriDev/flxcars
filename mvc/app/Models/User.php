<?php

namespace mvc\app\Models;
class User
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getUserById($id)
    {
        // Logique pour récupérer un utilisateur par son ID
        $stmt = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}

?>