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
<html ng-app="planzajec">
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
<div id="side-menu" ng-controller="sideMenu" snap-drawer>
    <header class="text-center" ng-controller="userName">
        <div class="container">
            <a snap-close ng-href="#/panel-uzytkownika">
                <span class="photo">
                    <img ng-src="{{UserPhoto.url}}" alt="{{UserName.text}}"/>
                </span>
                <h5>{{UserName.text}}</h5>
                <small>dane konta</small>
            </a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a snap-close ng-href="#/" ng-class="{ active : isActive('/') }">Plan zajęć</a></li>
            <li><a snap-close ng-href="#/harmonogram-zjazdow" ng-class="{ active: isActive('/harmonogram-zjazdow')}">Harmonogram zjazdów</a></li>
            <li><a snap-close ng-href="#/wykladowcy" ng-class="{ active: isActive('/wykladowcy')}">Wykładowcy</a></li>
            <li><a snap-close ng-href="#/moje-przedmioty" ng-class="{ active: isActive('/moje-przedmioty')}">Moje przedmioty</a></li>
            <li><a snap-close ng-href="#/mapa-kampusu" ng-class="{ active: isActive('/mapa-kampusu')}">Mapa kampusu</a></li>
            <li><?= $this->Html->link('Wyloguj się', ['controller' => 'Users', 'action' => 'logout']) ?></li>
        </ul>
    </nav>
    <footer>
        <div class="container">
            <p class="text-center">
                COPYRIGHT CREATIVEZONE.PL 2015
            </p>
        </div>
    </footer>
</div>
<div snap-content snap-options="opts" id="wraper" class="scrollable" snap-opt-disable="'right'">

    <!-- TOP -->
    <header id="top">
        <div class="container">
            <button class="btn menu-toggle" snap-toggle="left"><i class="fa fa-bars"></i></button>
            <!-- <a href="#menu" class="menu-toggle"><i class="fa fa-bars"></i></a> -->

            <div class="text-center">PLAN ZAJĘĆ</div>
        </div>
    </header>

    <!-- SECTION -->

    <section id="main">
        <div ng-view></div>
    </section>



    <!-- FOOTER -->

    <footer id="main-footer" data-snap-ignore="true">
        <div class="container">
            <header><h5>NASTĘPNE ZAJĘCIA:</h5></header>
        </div>
        <div class="next-classes">
            <ul>
                <li class="category-01">
                    <a href="#">
                        <h3>Porgramowanie komponentowe</h3>
                        <p><small>15:30 - 17:30, za 1 h 55 min. S: 3/27, bud: 42.</small></p>
                    </a>
                </li>
                <li class="category-02">
                    <a href="#">
                        <h3>Porgramowanie komponentowe</h3>
                        <p><small>15:30 - 17:30, za 1 h 55 min. S: 3/27, bud: 42.</small></p>
                    </a>
                </li>
                <li class="category-03">
                    <a href="#">
                        <h3>Porgramowanie komponentowe</h3>
                        <p><small>15:30 - 17:30, za 1 h 55 min. S: 3/27, bud: 42.</small></p>
                    </a>
                </li>
                <li class="category-04">
                    <a href="#">
                        <h3>Porgramowanie komponentowe</h3>
                        <p><small>15:30 - 17:30, za 1 h 55 min. S: 3/27, bud: 42.</small></p>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
</div>

<!-- SCRIPTS -->
<?= $this->Html->script('../assets/templates/components/fastclick/fastclick.js'); ?>
<?= $this->Html->script('../assets/templates/components/angular/angular.min.js'); ?>
<?= $this->Html->script('../assets/templates/components/angular-route/angular-route.min.js'); ?>
<?= $this->Html->script('../assets/templates/js/snap.js'); ?>
<?= $this->Html->script('../assets/templates/components/angular-snap/angular-snap.min.js'); ?>
<?= $this->Html->script('../assets/templates/components/moment/moment-with-locales.js'); ?>
<?= $this->Html->script('../assets/templates/components/moment/angular-moment.min.js'); ?>
<?= $this->Html->script('../assets/templates/components/round-progressbar/roundProgress.min.js'); ?>
<?= $this->Html->script('app.js'); ?>
<?= $this->Html->script('controllers.js'); ?>

<!-- <script data-main="assets/templates/js/app" src="assets/templates/components/require.js"></script> -->

</body>

</html>