<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);

    }

    public function index()
    {
        $this->set('user', $this->User->find('all'));
    }

    public function login()
    {
        if ($this->Auth->user()) {
            return $this->redirect('/');
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();

            if ($user) {

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Niepoprawne dane logowania, proszę spróbować ponownie'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function view($id)
    {
        if (!$id) {
            throw new NotFoundException(__('Niewłaściwy użytkownik'));
        }

        $user = $this->User->get($id);
        $this->set(compact('user'));
    }

    public function add()
    {
        if ($this->Auth->user()) {
            return $this->redirect('/');
        }
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Użytkownik został utworzony. Teraz możesz się zalogować!'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('Nie można dodać użytkownika'));
        }
        $this->set('user', $user);
    }

    public function currentUser() {

        $user = $this->Auth->user();


        $users = $this->Users->find('all',[
            'conditions' => ['Users.user_id' => $user['user_id']],
            'contain' => ([
                'Groups'
            ]),
            'fields' => ['Users.user_id', 'Users.username', 'Users.role', 'Users.firstname', 'Users.surname', 'Users.image', 'Groups.name']
        ]);




        $this->set(compact('users'));
    }

}