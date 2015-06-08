<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class GroupsTable extends Table
{
    public function initialize(array $config)
    {
        $this->hasMany('Users');
        $this->hasMany('Classes');

    }
}