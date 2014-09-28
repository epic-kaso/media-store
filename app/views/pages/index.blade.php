@include('pages.partials.header')
<div class="media-store-body" ng-controller="MediaController" >
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="container">
        @include('pages.partials.page-header')

    <!-- Main jumbotron for a primary marketing message or call to action -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <div class="container">
                      <div class="carousel-caption">
                        <div class="col-xs-4">
                             <img class="img-responsive" src="img/cover.jpg" />
                         </div>
                         <div class="col-xs-7">
                             <div class="meta-info">
                                    <h1>Title</h1>
                                     <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p></li>
                                     <p>Release date: xxx other info: </p>
                                    <p><a class="btn btn-lg btn-primary" href="#"
                                    role="button">Buy Now</a></p>
                             </div>
                         </div>
                      </div>
                  </div>
                </div>
                <div class="item">
                  <div class="container">
                        <div class="carousel-caption">
                          <div class="col-xs-4">
                               <img class="img-responsive" src="img/cover.jpg" />
                           </div>
                           <div class="col-xs-7">
                               <div class="meta-info">
                                      <h1>Title</h1>
                                       <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p></li>
                                       <p>Release date: xxx other info: </p>
                                      <p><a class="btn btn-lg btn-primary" href="#"
                                      role="button">Buy Now</a></p>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                 <div class="container">
                   <div class="carousel-caption">
                     <div class="col-xs-4 ">
                          <img class="img-responsive" src="img/cover.jpg" />
                      </div>
                      <div class="col-xs-7">
                          <div class="meta-info">
                                 <h1>Title</h1>
                                  <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p></li>
                                  <p>Release date: xxx other info: </p>
                                 <p><a class="btn btn-lg btn-primary" href="#"
                                 role="button">Buy Now</a></p>
                          </div>
                      </div>
                   </div>
               </div>
                </div>
              </div>
              <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>

      <div class="col-sm-10">

         <div class="row divider-row">
            <div class="divider-left col-xs-6">
                 <span class="fa fa-star" style="color: #8b0000"></span><span> FEATURED</span>
            </div>
          <div class="col-xs-5"><a href="#" class="btn btn-default btn-sm pull-right">SEE ALL</a></div>
         </div>

               <div class="row">
                     @for($i = 0; $i < 5; $i++)
                      @include('pages.partials.media-item',['item'=>$media[rand(0,count($media) - 1)]])
                     @endfor
               </div>

                <div class="row divider-row">
                 <div class="col-xs-6">
                    <a href="#" class="btn btn-default btn-sm pull-left">SEE ALL</a>
                 </div>
                  <div class="divider-right col-xs-5">
                     <span><span class="fa fa-bookmark" style="color: #daa520"></span> POPULAR</span>
                </div>

               </div>

                    <div class="row">
                    @for($i = 0; $i < 8; $i++)
                         @include('pages.partials.media-item',['item'=>$media[rand(0,count($media) - 1)]])
                     @endfor
                    </div>



                   <div class="row divider-row">
                       <div class="divider-left col-xs-6">
                        <span class="fa fa-flag" style="color: #006400"></span><span> RECENT RELEASE</span>
                      </div>
                     <div class="col-xs-5"><a href="#" class="btn btn-default btn-sm pull-right">SEE ALL</a></div>
                   </div>
                   <div class="row">
                         @for($i = 0; $i < 7; $i++)
                            @include('pages.partials.media-item',['item'=>$media[rand(0,count($media) - 1)]])
                         @endfor
                   </div>
      </div>
      <div class="col-sm-2">
        <div class="small-divider"><span>Top 10</span></div>
        <div class="row">

            @for($i = 0; $i < 7; $i++)
                @include('pages.partials.sidebar-media-item',['item'=>$media[rand(0,count($media) - 1)]])
            @endfor
        </div>
      </div>

    <div class="row">
      <hr>
              <div class="col-sm-8 col-sm-offset-2">
                    <div class="social-btn-container">
                        <a target="blank" href="http://www.facebook.com/" class="social-btn"><span class="fa fa-facebook"></span></a>
                        <a target="blank" href="http://twitter.com/" class="social-btn"><span class="fa fa-twitter"></span></a>
                        <a target="blank" href="http://www.youtube.com/user/" class="social-btn"><span class="fa fa-youtube"></span></a>
                          <a target="blank" href="http://www.instagram.com/" class="social-btn"><span class="fa fa-instagram"></span></a>
                          <a target="blank" href="https://plus.google.com" class="social-btn"><span class="fa fa-google-plus"></span></a>
                    </div>
                    <div class="footer-note" style="text-align: center">
                    <p>LandarStudio COPYRIGHT 2014. ALL RIGHTS RESERVED. <br class="visible-phone"> <a href="/terms-and-conditions">TERMS AND CONDITIONS</a></p>
                    </div>
                </div>
      </div>
    </div>
    @include('pages.partials.media-player')
    @include('pages.partials.login-dialog')
    @include('pages.partials.signup-dialog',['post_url'=>$post_url])
</div>


@include('pages.partials.footer')
