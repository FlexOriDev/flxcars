<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class ConstructeurManager extends Model
{
    public function getConstructeurs()
    {
        return $this->getAll('constructeurs', 'mvc\app\Models\Obj\Constructeur');
    }
}
