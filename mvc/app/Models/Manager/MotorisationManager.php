<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class MotorisationManager extends Model
{
    public function getMotorisations()
    {
        return $this->getAll('motorisationsessence', 'mvc\app\Models\Obj\Motorisation');
    }
}
