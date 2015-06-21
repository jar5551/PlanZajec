'use strict';

var app = angular.module('planzajec', [
    'ngRoute',
    'snap',
    'angular-svg-round-progress',
    'angularMoment'
]).run(function() {
    FastClick.attach(document.body);
});

var noPhotoUrl = 'webroot/img/user.jpg';
var userPhotosUrl = 'webroot/upload/users/';
var teacherPhotosUrl = 'webroot/upload/teachers/'



/* ROUTING ANGULAR JS */
app.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'src/Template/Common/planzajec.ctp',
                controller: 'planZajec'
            }).
            when('/harmonogram-zjazdow', {
                templateUrl: 'src/Template/Common/harmonogram.ctp',
                controller: 'harmonogramZjazdow'
            }).
            when('/wykladowcy', {
                templateUrl: 'src/Template/Common/wykladowcy.ctp',
                controller: 'teachersController'
            }).
            when('/moje-przedmioty', {
                templateUrl: 'src/Template/Common/przedmioty.ctp',
                controller: 'classesController'
            }).
            when('/mapa-kampusu', {
                templateUrl: 'src/Template/Common/mapa.ctp',
                controller: 'harmonogramZjazdow'
            }).
            when('/panel-uzytkownika', {
                templateUrl: 'src/Template/Common/panel.ctp',
                controller: 'harmonogramZjazdow'
            }).
            otherwise({
                redirectTo: '/'
            });
    }
]);