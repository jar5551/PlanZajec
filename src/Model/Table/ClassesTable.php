<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ClassesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
}