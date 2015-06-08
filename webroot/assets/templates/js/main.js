/*global angular */

'use strict';

angular.module('planzajec', ['snap'])
    .controller('MainCtrl', function ($scope) {
        $scope.snapOpts = {
            disable: 'right'
        };
    });