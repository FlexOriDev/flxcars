<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class GroupeManager extends Model
{
    public function getGroupes()
    {
        return $this->getAll('groupes', 'mvc\app\Models\Obj\Groupe');
    }
}
