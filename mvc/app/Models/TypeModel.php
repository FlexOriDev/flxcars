<?php
namespace mvc\app\Models;

class TypeModel {
    private $db;

    public function __construct() {
        $this->db = require BASE_PATH . '/app/config/database.php';
    }

    public function getAllTypes() {
        $stmt = $this->db->query('SELECT * FROM types ORDER BY nom');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>
