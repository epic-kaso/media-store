@include('pages.partials.header')
<div class="media-store-body" >
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="container">
        <div class="row">
             <div class="col-sm-8">
              <a class="navbar-brand" href="#">
              <span class="fa fa-play-circle" style="
                  color: #d35400;
                  font-size: 1.9em;
              "></span>
              <span style="
                  font-size: 1.9em;
              ">Media<i style="
                         font-weight: 800;
                         font-style: normal;
                     ">Store</i></span>
              </a>
             </div>
             <div class="col-sm-4">
                <form class="navbar-form navbar-right" role="form">
                    <div class="input-group input-group-lg">
                      <input type="text" placeholder="Search" class="form-control">
                       <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
                       </span>
                    </div>

                  </form>
             </div>
        </div>
        <div class="navbar navbar-inverse" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">Recent Releases</a></li>
                <li><a href="#">Genres</a></li>
                <li><a href="#">Artists</a></li>
                <li><a href="#">Album</a></li>
                <li><a href="#">Gospel</a></li>
                <li><a href="#">Media Partners</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Login</a></li>
                <li><a href="#">Register</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
      </div>

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
                        <div class="col-sm-4">
                             <img class="img-responsive" src="img/cover.jpg" />
                         </div>
                         <div class="col-sm-7">
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
                          <div class="col-sm-4">
                               <img class="img-responsive" src="img/cover.jpg" />
                           </div>
                           <div class="col-sm-7">
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
                     <div class="col-sm-4 ">
                          <img class="img-responsive" src="img/cover.jpg" />
                      </div>
                      <div class="col-sm-7">
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
                      @include('pages.partials.media-item')
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
                         @include('pages.partials.media-item')
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
                            @include('pages.partials.media-item')
                         @endfor
                   </div>
      </div>
      <div class="col-sm-2">
        <div class="small-divider"><span>Top 10</span></div>
        <div class="row">

            @for($i = 0; $i < 7; $i++)
                @include('pages.partials.sidebar-media-item')
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
    <div class="media-player">
        <div class="container">
            <div class="col-sm-4">
                <div class='speaker'
                        data-audio="audio1"
                        data-autoplay="false"
                        data-pauseothers="true" jplayer>
                </div>
                <p>
                    <img ng-src="<% audio1_poster %>" class="img-responsive" style="width: 50px;float: left"/>
                    <span ng-bind="audio1_title"></span>
                    {{--<span>Other info</span>--}}
                </p>
            </div>

        </div>
    </div>
</div>
@include('pages.partials.footer')
