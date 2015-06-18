<div class="container">
    <header class="page-header">
        <div ng-switch on="classIsRunning">
            <div ng-switch-when="true">
                <h5>Obecnie trwają zajęcia:</h5>
            </div>
        </div>
        <div ng-switch on="classIsUpcoming">
            <div ng-switch-when="true">
                <h5>Najbliższe zajęcia to:</h5>
            </div>
        </div>

        <h2>{{currentClass.name}}</h2>
    </header>
    <div class="content">

        <div class="countdown">
            <div
                    round-progress
                    max="max"
                    current="current"
                    color="#45ccce"
                    bgcolor="#eaeaea"
                    radius="90"
                    stroke="5"
                    semi="false"
                    rounded="false"
                    clockwise="false"
                    iterations="50"
                    animation="linearEase" class="circle"></div>
            <div class="circle-wrap">
                        <span class="text-box">
                            <div ng-switch on="lessThanOneHour">
                                <div ng-switch-when="true">
                                    <h1>{{timeToGo}}</h1>
                                    <h6>do rozpoczęcia</h6>
                                </div>
                                <div ng-switch-when="false">
                                    <h6>Zajęcia rozpozynają się</h6>
                                    <h3>{{currentClass.time_start | date:'HH:mm, d MMMM'}}</h3>
                                </div>
                            </div>

                        </span>
            </div>
        </div>


        <div class="additional-info">
            <h6 class="text-center text-uppercase">{{currentClass.type}}</h6>
            <p class="text-center">Sala {{currentClass.room}}, budynek {{currentClass.building}}</p>
            <h6 class="text-center">Prowadzący: {{currentClass.teacher_name}} {{currentClass.teacher_surname}}</h6>
                    <span class="dropdown-toggle">
                        <i class="fa fa-angle-down"></i>
                    </span>
        </div>
    </div>
</div>