<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{

    public function validationDefault(Validator $validator)
    {
        return $validator
            ->notEmpty('username', 'Email jest wymagany')
            ->notEmpty('password', 'Hasło jest wymagane')
            ->notEmpty('role', 'Rola jest wymagana')
            ->add('role', 'inList', [
                'rule' => ['inList', ['admin', 'student', 'teacher']],
                'message' => 'Proszę wprowadić prawidłową rolę'
            ]);
    }

}