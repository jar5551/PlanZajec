<?php

namespace App\Controller;

class GroupsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function index()
    {

        $groups = $this->Groups->find('all', ['contain' => ['Users']]);
        $this->set(compact('groups'));
    }
}