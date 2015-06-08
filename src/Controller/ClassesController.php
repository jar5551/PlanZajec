<?php

namespace App\Controller;

class ClassesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        /*$class = $this->Class->find('all');
        $this->set(compact('class'));*/

        //$class = $this->paginate('Class');
        //$class = $this->Classes->find('all');
        /*$class = $this->Classes->find(['conditions' => ['Users.user_id ' => 4]])->contain([
            'Schedules' => ['Harmonograms', 'Groups' => ['Users']],
        ]);*/

        $user = $this->Auth->user();

        $class = $this->Classes->find('all',[
            'contain' => ([
                'Places' => ['Buildings','Rooms'], 'Teachers', 'Schedules' => ['Harmonograms', 'Groups' => ['Users' => ['conditions' => ['Users.user_id' => $user['user_id']]]]],
            ]),
        ]);
        $this->set(compact('class'));

        //$this->render('/Common/index');
    }
}