<?php

namespace App\Controller;

class ClassController extends AppController
{

    public function index()
    {
        $class = $this->Class->find('all');
        $this->set(compact('class'));

        $this->render('/Common/index');
    }
}