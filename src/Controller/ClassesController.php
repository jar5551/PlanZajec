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
        $class = $this->Classes->find('all');
        $this->set(compact('class'));

        //$this->render('/Common/index');
    }
}