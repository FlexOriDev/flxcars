<?php
namespace mvc\app\Controllers;
use TypeModel;

require BASE_PATH . '/app/Models/TypeModel.php';

class AccueilController
{

    public function index()
    {
        $typeModel = new TypeModel();
        $types = $typeModel->getAllTypes();
        include BASE_PATH . '/app/Views/AccueilView.php';
    }

}

?>
