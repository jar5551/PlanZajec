<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SchedulesToHarmonogramsTable extends Table
{
    public function initialize(array $config)
    {
        $this->belongsTo('Schedules');
        $this->belongsTo('Harmonograms');

    }
}