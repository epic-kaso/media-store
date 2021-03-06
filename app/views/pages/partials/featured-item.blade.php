<div class="item {{{ $class }}}">
  <div class="container">
      <div class="carousel-caption">
        <div class="col-xs-4">
             <img class="img-responsive" src="{{{$item->img_url or 'img/cover.jpg'}}}" />
         </div>
         <div class="col-xs-7">
             <div class="meta-info">
                    <h1>{{{ $item->title }}}</h1>
                     <p>{{{ \Str::limit($item->description) }}}</p></li>
                     <p>Price: <strong>₦{{{ $item->price }}}</strong></p>
                    <p>
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
                    {{--<a class="btn btn-lg btn-primary" href="#"--}}
                    {{--role="button">Buy Now</a>--}}
                    </p>
             </div>
         </div>
      </div>
  </div>
</div>