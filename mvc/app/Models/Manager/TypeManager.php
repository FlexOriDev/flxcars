<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class TypeManager extends Model
{
    public function getTypes()
    {
        return $this->getAll('types', 'mvc\app\Models\Obj\Type');
    }
}
