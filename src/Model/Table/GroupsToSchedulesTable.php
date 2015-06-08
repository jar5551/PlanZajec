<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class GroupsToSchedulesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Groups');
        $this->belongsTo('Schedules');

    }
}