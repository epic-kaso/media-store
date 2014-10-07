<div class="col-sm-3 col-lg-2 col-xs-5 media-item">
     <img class="img-responsive" src="{{ $item->img_url or 'img/media_missing.png' }}" />
     <div class="meta-info">
         <ul>
             <li><h4>{{ $item->title or '' }}</h4></li>
             <li><p>Release date: {{ $item->release_date or 'Latest' }}</p></li>
             <li><p>₦{{ $item->price or '' }}</p></li>
         </ul>
     </div>
     <div class="overlay">
        <div class="play-media"
        ng-click="play('{{{ $item->mp3 }}}','{{{ $item->title }}}','{{{ $item->img_url }}}')">
            <a href="#" class="btn btn-warning"><span class="fa fa-play-circle"></span> Play preview</a>
        </div>
        <div class="play-media" stripe media="{{ $item->id }}"
        data-title="{{{ $item->title }}}"
        data-price="{{{ $item->price * 100 }}}"
        data-poster="{{{  $item->img_url  }}}"
        data-id="{{{ $item->id }}}"
        >
            <a href="#" class="btn btn-primary">
                <span class="fa fa-download"></span> Buy ₦{{ $item->price or '' }}
            </a>
        </div>
     </div>
 </div>