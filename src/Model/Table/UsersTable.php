<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        $this->belongsTo('Groups');
    }

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

    public function getUser($user_id) {
        $connection = ConnectionManager::get('default');
        $results = $connection
            ->newQuery()
            ->select('*')
            ->from('users')
            ->where(['user_id' => intval($user_id)])
            ->execute()
            ->fetchAll('assoc');

        return $results;
    }

}