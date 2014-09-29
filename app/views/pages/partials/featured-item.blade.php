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
                     <p>Price: <strong>N{{{ $item->price }}}</strong></p>
                    <p><a class="btn btn-lg btn-primary" href="#"
                    role="button">Buy Now</a></p>
             </div>
         </div>
      </div>
  </div>
</div>