<div class="container">
    <header class="page-header">
        <h2>Wykładowcy</h2>
    </header>
    <div class="content teachers-theme">
        <div ng-repeat="teacher in teachers" class="teachers-list">
            <a href="#" class="thumb">
                <span class="photo">
                    <img alt="{{teacher.firstname}} {{teacher.surname}}" ng-src="{{teacher.image}}">
                </span>
                <h3>{{teacher.firstname}} {{teacher.surname}}</h3>
                <h6>bud: {{teacher.place.building.number}}, pok: {{teacher.place.room.number}}</h6>
                <i class="show-more fa fa-angle-right"></i>
            </a>

        </div>

    </div>
</div>