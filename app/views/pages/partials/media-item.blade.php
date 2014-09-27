<div class="col-sm-2 col-xs-5 media-item">
     <img class="img-responsive" src="{{ $item->img_url or 'img/cover.jpg' }}" />
     <div class="meta-info">
         <ul>
             <li><h4>{{ $item->title or 'Title' }}</h4></li>
             <li><p>Release date: {{ $item->release_date or '' }}</p></li>
             <li><p>Tracks: {{ $item->tracks_count or '' }}</p></li>
         </ul>
     </div>
     <div class="overlay">
        <div class="play-media"
        ng-click="play('{{{ $item->mp3 }}}','{{{ $item->title }}}')">
            <span class="fa fa-play-circle"></span>
        </div>
        <div class="play-media"><span class="fa fa-download"></span></div>
     </div>
 </div>