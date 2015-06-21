<div class="main-content container{{loading}}" ng-switch on="isAnyClass">
    <div ng-switch-when="true">
        <header class="page-header" ng-switch on="classIsRunning">
            <div ng-switch-when="true">
                <h5>Obecnie trwają zajęcia:</h5>
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
                                        <div ng-switch on="classIsRunning">
                                            <h6 ng-switch-when="true">do zakończenia</h6>
                                            <h6 ng-switch-when="false">do rozpoczęcia</h6>
                                        </div>
                                    </div>
                                    <div ng-switch-when="false">
                                        <h6>Zajęcia rozpozynają się</h6>
                                        <h3>{{currentClass.time_start}}</h3>
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
    <div ng-switch-when="false">
        <header class="page-header">

            <h2>Odpocznij człowieku</h2>
            <h5>Dzisiaj nie ma żadnych zajęć</h5>
        </header>
    </div>
    <div class="loading-circle"></div>
</div>