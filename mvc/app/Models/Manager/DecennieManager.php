<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class DecennieManager extends Model
{
    public function getDecennies()
    {
        return $this->getAll('annestranche', 'mvc\app\Models\Obj\Decennie');
    }
}
