 <div class="media-player">
        <div class="container">
            <div class="col-sm-1">
                <div jplayer audio-object="audio" autoplay="true">
                    <span class="fa fa-play play"></span>
                    <span class="fa fa-pause pause"></span>
                </div>
            </div>
            <div class="col-sm-3">
                <p>
                    <img ng-src="<% audio.poster %>" class="img-responsive" style="width: 50px;float: left"/>
                    <span ng-bind="audio.title"></span>
                    {{--<span>Other info</span>--}}
                </p>
            </div>
        </div>
    </div>