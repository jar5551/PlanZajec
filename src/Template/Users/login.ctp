<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
throw new NotFoundException();
endif;

$cakeDescription = 'Plan zajęć';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>

    <!-- OG -->

    <meta property="og:title" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="<?= $cakeDescription ?>">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:type" content="">

    <!-- CSS -->

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('../assets/templates/components/font-awesome/css/font-awesome.min.css') ?>
    <?= $this->Html->css('../assets/templates/components/bootstrap/dist/css/bootstrap.min.css') ?>
    <?= $this->Html->css('../webroot/assets/templates/components/angular-snap/angular-snap.css') ?>
    <?= $this->Html->css('../assets/templates/css/main.css') ?>

    <!-- GOOGLE FONT -->

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:500,400,300&subset=latin,latin-ext'
          rel='stylesheet' type='text/css'>

</head>


<body>
<div id="wraper">

    <!-- TOP -->
    <header id="top">
        <div class="container">
            <div class="text-center">PLAN ZAJĘĆ</div>
        </div>
    </header>

    <!-- SECTION -->

    <section id="main">
        <div class="container">
            <header class="page-header">
                <h2>Proszę się zalogować</h2>
                <h5>Aplikacja dostępna jest tylko dla zalogowanych użytkowników</h5>
            </header>
            <div class="content">
                <div class="users form">
                    <?= $this->Flash->render('auth') ?>
                    <?= $this->Form->create() ?>
                    <div class="form-group">
                        <?= $this->Form->input('username', ['label' => 'Email', 'class' => 'form-control', 'placeholder' => 'Proszę podać email']) ?>
                        <?= $this->Form->input('password', ['label' => 'Hasło', 'class' => 'form-control', 'placeholder' => 'Hasło']) ?>
                    </div>
                    <?= $this->Form->button(__('Zaloguj się'),['class' => 'btn btn-default']); ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </section>



</div>

<!-- SCRIPTS -->

</body>

</html>