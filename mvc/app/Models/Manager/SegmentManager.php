<?php

namespace mvc\app\Models\Manager;

use mvc\app\Models\Model;

class SegmentManager extends Model
{
    public function getSegments()
    {
        return $this->getAll('segments', 'mvc\app\Models\Obj\Segment');
    }
}
