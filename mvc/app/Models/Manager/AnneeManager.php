<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class AnneeManager extends Model
{
    public function getAnnees()
    {
        return $this->getAll('annees', 'mvc\app\Models\Obj\Annee');
    }
}
