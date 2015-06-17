<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class SchedulesTable extends Table
{
    public function initialize(array $config)
    {
        /*$this->belongsTo('Harmonograms');
        $this->hasOne('Groups');
        $this->hasMany('Classes');*/

        $this->belongsToMany('Harmonograms', [
            'through' => 'SchedulesToHarmonograms',
        ]);
        $this->hasMany('Classes');
        //$this->hasMany('Groups');

        $this->belongsToMany('Groups', [
            'through' => 'GroupsToSchedules',
        ]);

    }
}