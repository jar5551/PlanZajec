/*global angular */

app.controller('planZajec', function ($scope, $http, $interval, $filter, roundProgressService) {
    $scope.timeToStart = 0;

    $http.get('classes')
        .success(function(data){

            var classes = data.classes;
            var classNow;

            $interval(function(){
                    var timeNow = new Date();

                    var classHamonogarms;
                    var dzisiajZajecia;
                    var currentClasses;
                    var harmonogramKey;
                    var upcomingClass;
                    var secondsCountdown;
                    var timeToStart;
                    var upcomingClassTimeStart;

                    //console.log(classes);
                    var keepGoing = true;
                    angular.forEach(classes, function(value, key) {
                        if(keepGoing) {
                            classHamonogarms = value['schedule']['harmonograms'];

                            currentClasses = value['name'];

                            dzisiajZajecia = false;
                            angular.forEach(classHamonogarms, function(value, key) {
                                if($filter('date')(value['date'], 'dd, MM, yyyy') == $filter('date')(timeNow, 'dd, MM, yyyy')) {
                                    //console.log('a');
                                    dzisiajZajecia = true;
                                    harmonogramKey = key;
                                }
                            });
                            if(value['schedule']['harmonograms'][harmonogramKey] && $filter('date')(value['time_start'], 'HH:mm') > $filter('date')(timeNow, 'HH:mm')) {
                                upcomingClass = value;
                                keepGoing = false;
                            }
                        }
                    });

                    //console.log($filter('date')(todayClasses['time_start'], 'HH:mm:ss') + ' ' + $filter('date')(timeNow, 'HH:mm:ss'));


/*                    var keepGoing = true;
                    angular.forEach(classes, function(value) {
                        if(keepGoing) {
                            //console.log(value['time_start'] + ' ' + timeNow);
                            if(value['time_start'] >= timeNow) {
                                classNow = value;
                                console.log('aaa');
                            }
                            else {
                                keepGoing = false;
                            }
                        }
                    });*/

                    upcomingClassTimeStart = new Date(upcomingClass['time_start']);

                    $scope.currentClass = {
                        name: upcomingClass['name'],
                        type: 'laboratorium',
                        room: upcomingClass['place']['room']['number'],
                        building: upcomingClass['place']['building']['number'],
                        teacher_name: upcomingClass['teacher']['firstname'],
                        teacher_surname: upcomingClass['teacher']['surname'],
                        time_start: upcomingClassTimeStart,
                        time_end: new Date(upcomingClass['time_end'])
                    };



                    timeToStart = Math.abs(timeNow - upcomingClassTimeStart + 1000 * 60 * 60);
                    $scope.timeToStart = $filter('date')(timeToStart, "H:mm");

                    secondsCountdown = $filter('date')(timeToStart, 's');

                    $scope.current = Math.abs(secondsCountdown);
                },1000,0
            );
        }
    );
});

app.controller('harmonogramZjazdow', function($scope) {

});

app.controller('teachers', function ($scope, $http) {
    $http.get('teachers')
        .success(function(data){
            $scope.teachers = data;
        });
});


app.controller('teachersController', function($scope, $http){

    $http.get('teachers').success(function(data) {

        $scope.teachers = data.teachers;

        angular.forEach($scope.teachers, function(teacher, key) {
            if(teacher['image'] == '' ) {
                $scope.teachers[key]['image'] = noPhotoUrl;
            }
            else {
                $scope.teachers[key]['image'] = teacherPhotosUrl + $scope.teachers[key]['image'];
            }
        });
    });
});

app.controller('sideMenu', function ($scope, $location) {
    $scope.opts = {
        disable: 'right'
    };
    $scope.isActive = function (viewLocation) {
        return viewLocation === $location.path();
    };
});

app.controller('userName', function ($scope, $http) {

    $http.get('users/currentuser')
        .success(function(data){
            $scope.user = data;
            $scope.UserName = { text: $scope.user['user']['username']};
            $scope.UserPhoto = { url: noPhotoUrl};
            if ($scope.user['user']['firstname'] != '' || $scope.user['user']['surname'] != '') {
                $scope.UserName = { text: $scope.user['user']['firstname'] + ' ' + $scope.user['user']['surname'] }
            }
            if($scope.user['user']['image'] != '') {
                $scope.UserPhoto = { url: userPhotosUrl + $scope.user['user']['image'] }
            }
        });

});
