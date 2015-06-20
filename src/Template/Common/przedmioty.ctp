<div class="main-content container{{loading}}">
    <header class="page-header">
        <h2>Moje przedmioty</h2>
    </header>
    <div class="content">
        <div ng-repeat="class in classes" class="classess-list">
            <div class="thumb">
                <h3>{{class.name}}</h3>
                <h6>Zajęcia trwają w godzinach: {{class.time_start | date:'HH:mm'}} - {{class.time_end | date:'HH:mm'}}</h6>
                <i class="show-more fa fa-angle-right"></i>
            </div>
        </div>
    </div>
    <div class="loading-circle"></div>
</div>