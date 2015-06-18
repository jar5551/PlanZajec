<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ClassesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Schedules');
        $this->belongsTo('Places');
        $this->belongsTo('Teachers');
        $this->belongsTo('Types');
    }
}