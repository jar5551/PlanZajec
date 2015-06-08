<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Event\Event;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{


    public  function index()
    {
        $this->loadModel('Users');

        $user = $this->Auth->user();

        $user_current_from_db = $this->Users->getUser($user['user_id']);;

        $user['image'] = $this->ImageOfUser($user_current_from_db);;

        $user['username_display'] = $this->NameOfUser($user_current_from_db);

        $this->set(compact('user'));
        $this->render('/Common/index');
    }

    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    protected function NameOfUser($user) {
        $username = $user[0]['username'];
        if($user[0]['firstname'] != '' && $user[0]['surname'] != '') {
            $username = $user[0]['firstname'] . ' ' . $user[0]['surname'];
        }
        return $username;
    }

    protected function ImageOfUser($user) {
        $image= $user[0]['image'];
        if($user[0]['image'] == '') {
            $image = 'webroot/img/user.jpg';
        }
        return $image;
    }
}
