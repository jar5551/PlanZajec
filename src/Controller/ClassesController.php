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
        $user = $this->Auth->user();

        $classes = $this->Classes->find('all',[
            'contain' => ([
                'Types',
                'Places' =>
                    ['Buildings','Rooms'],
                'Teachers',
                'Schedules' =>
                    ['Harmonograms',
                     'Groups' =>
                         ['Users' =>
                            ['conditions' =>
                                ['Users.user_id' => $user['user_id']]]]],
            ]),
            //'fields' => ['Classes.name', 'Classes.time_start', 'Classes.time_end', 'Harmonograms.date']
        ]);

        $this->set(compact('classes'));
    }
}