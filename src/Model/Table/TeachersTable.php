<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class TeachersTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('Classes');
        $this->belongsTo('Places');

    }
}