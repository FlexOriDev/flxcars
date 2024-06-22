<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class UserManager extends Model
{
    public function getUsers()
    {
        return $this->getAll('users', 'mvc\app\Models\Obj\User');
    }
}
