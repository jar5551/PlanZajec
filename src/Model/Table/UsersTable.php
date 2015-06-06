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
            ->notEmpty('firstname', 'Podanie imienia jest wymagane')
            ->notEmpty('surname', 'Jak się nazywasz?')
            ->notEmpty('password', 'Hasło jest wymagane')
            ->notEmpty('role', 'Rola jest wymagana')
            ->add('username', [
                'unique' => ['rule' => 'validateUnique', 'provider' => 'table', 'message' => 'Ten email jest już zarejestrowany w naszej bazie']
            ])
            ->add('password', [
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'last' => true,
                    'message' => 'Hasło musi się skłądać z co najmniej 8 znaków'
                ]
            ]);
    }

}