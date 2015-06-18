/*global angular */

app.controller('planZajec', function ($scope, $http, $interval, $filter, roundProgressService) {
    $scope.timeToGo = 0;

    $http.get('classes')
        .success(function(data){

            var classes = data.classes;
            var classNow;

            /* maksmymalna wartosc countdowna */
            var maxHoursCountdown = 1; //ile godzin ma byc
            $scope.max = maxHoursCountdown * 1000 * 60 *60;

            $interval(function(){
                    var timeNow = new Date();

                    var classHamonogarms;
                    var dzisiajZajecia;
                    var currentClasses;
                    var harmonogramKey;
                    var upcomingClass;
                    var secondsCountdown;
                    var timeToGo;
                    var upcomingClassTimeStart;
                    var upcomingClassTimeEnd;

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

                            $scope.classIsRunning = false;
                            $scope.classIsUpcoming = false;
                            if(value['schedule']['harmonograms'][harmonogramKey] && $filter('date')(value['time_start'], 'HH:mm') < $filter('date')(timeNow, 'HH:mm') && $filter('date')(value['time_end'], 'HH:mm') > $filter('date')(timeNow, 'HH:mm')) {
                                upcomingClass = value;
                                $scope.classIsRunning = true;
                                keepGoing = false;
                                console.log('class is running');
                            }
                            else if(value['schedule']['harmonograms'][harmonogramKey] && $filter('date')(value['time_start'], 'HH:mm') > $filter('date')(timeNow, 'HH:mm')) {
                                upcomingClass = value;
                                keepGoing = false;
                                $scope.classIsUpcoming = true
                                console.log('class is upcoming');
                            }
                            else {
                                console.log('no classes');
                            }
                        }
                    });


                    upcomingClassTimeStart = new Date(upcomingClass['time_start']);
                    upcomingClassTimeEnd = new Date(upcomingClass['time_end']);

                    $scope.currentClass = {
                        name: upcomingClass['name'],
                        type: upcomingClass['type']['name'],
                        room: upcomingClass['place']['room']['number'],
                        building: upcomingClass['place']['building']['number'],
                        teacher_name: upcomingClass['teacher']['firstname'],
                        teacher_surname: upcomingClass['teacher']['surname'],
                        time_start: upcomingClassTimeStart,
                        time_end: upcomingClassTimeEnd
                    };

                    if($scope.classIsRunning) {
                        timeToGo = Math.abs(timeNow - upcomingClassTimeEnd) ;
                    }
                    else {
                        timeToGo = Math.abs(timeNow - upcomingClassTimeStart) ;
                    }

                    var timeFormat = 'mm:ss';

                    $scope.lessThanOneHour = false;

                    if(timeToGo < maxHoursCountdown * 1000 * 60 * 60) {
                        $scope.lessThanOneHour = true;
                    }
                    $scope.timeToGo = $filter('date')(timeToGo - 1000 * 60 *60, timeFormat);

                    $scope.current = Math.abs(maxHoursCountdown - timeToGo);
                },1000,0
            );
        }
    );
});

app.controller('harmonogramZjazdow', function($scope) {

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

app.controller('classesController', function($scope, $http){

    $http.get('classes').success(function(data) {

        $scope.classes = data.classes;


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
