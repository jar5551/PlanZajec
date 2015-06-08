<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SchedulesTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Harmonograms');
        $this->hasOne('Groups');
        $this->hasMany('Classes');

    }
}