<div class="container">
    <header class="page-header">
        <h5>Najbliższe zajęcia to:</h5>
        <h2>{{currentClass.name}}</h2>
    </header>
    <div class="content">

        <div class="countdown">
            <div
                    round-progress
                    max="60"
                    current="current"
                    color="#45ccce"
                    bgcolor="#eaeaea"
                    radius="90"
                    stroke="5"
                    semi="false"
                    rounded="false"
                    clockwise="false"
                    iterations="10"
                    animation="linearEase" class="circle"></div>
            <div class="circle-wrap">
                        <span class="text-box">
                            <h1>{{timeToStart}}</h1>
                            <h6>do rozpoczęcia</h6>
                        </span>
            </div>
        </div>


        <div class="additional-info">
            <h6 class="text-center text-uppercase">{{currentCllass.type}}</h6>
            <p class="text-center">Sala {{currentClass.room}}, budynek {{currentClass.building}}</p>
            <h6 class="text-center">Prowadzący: {{currentClass.teacher_name}} {{currentClass.teacher_surname}}</h6>
                    <span class="dropdown-toggle">
                        <i class="fa fa-angle-down"></i>
                    </span>
        </div>
    </div>
</div>