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
<html ng-app="demo" ng-controller="MainCtrl">
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
<div id="side-menu" snap-drawer>
    <header class="text-center">
        <div class="container">
            <a href="#">
                <span class="photo">
                    <img src="<?= $user['image']; ?>" alt="Username"/>
                </span>
                <h5><?= $user['username_display']; ?></h5>
                <small>dane konta</small>
            </a>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="#">Plan zajęć</a></li>
            <li><a href="#">Harmonogram zjazdów</a></li>
            <li><a href="#">wykładowcy</a></li>
            <li><a href="#">przedmioty</a></li>
            <li><a href="#">mapa</a></li>
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
<div id="wraper" class="scrollable" snap-content snap-options="snapOpts">

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
        <div class="container">
            <header class="page-header">
                <h5>Najbliższe zajęcia to:</h5>

                <h2>Metody analizy danych</h2>
            </header>
            <div class="content">
                <div class="countdown">
                    <svg class="circle" x="0px" y="0px" viewBox="5 5 110 110">
                        <path class="circle-bg"
                              d="M 59.988797973796764 5.000001140776291 A 55 55 0 1 1 59.923606103406065 5.000053054820469 Z"></path>
                        <path class="circle-over"
                              d="M 59.988797973796764 5.000001140776291 A 55 55 0 1 1 8.380051517757316 41.016298604049545 "></path>
                    </svg>
                    <div class="circle-wrap">
                        <span class="text-box">
                            <h1>12</h1>
                            <h4>min</h4>
                            <h6>do rozpoczęcia</h6>
                        </span>
                    </div>
                </div>
                <div class="additional-info">
                    <h6 class="text-center text-uppercase">laboratorium</h6>
                    <p class="text-center">Sala 3/84, budynek 34</p>
                    <h6 class="text-center">Prowadzący: R. Nafka</h6>
                    <span class="dropdown-toggle">
                        <i class="fa fa-angle-down"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>



    <!-- FOOTER -->

    <footer id="main-footer">
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

<?= $this->Html->script('../webroot/assets/templates/components/angular/angular.min.js'); ?>
<?= $this->Html->script('../webroot/assets/templates/js/snap.js'); ?>
<?= $this->Html->script('../webroot/assets/templates/components/angular-snap/angular-snap.min.js'); ?>
<?= $this->Html->script('../webroot/assets/templates/js/main.js'); ?>

<!-- <script data-main="assets/templates/js/app" src="assets/templates/components/require.js"></script> -->

</body>

</html>