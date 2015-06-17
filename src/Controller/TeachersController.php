<?php

namespace App\Controller;

class TeachersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {
        $teachers = $this->Teachers->find('all',[
            'contain' => (['Places' => ['Buildings','Rooms']])
        ]);

        $this->set(compact('teachers'));
    }
}