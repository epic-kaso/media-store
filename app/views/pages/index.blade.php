<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" ng-app='MediaStoreUser'> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" ng-app='MediaStoreUser'> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" ng-app='MediaStoreUser'> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app='MediaStoreUser'> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href='css/bootstrap.min.css'/>
        <link rel="stylesheet" href='css/font-awesome-4.2.0/css/font-awesome.min.css'/>
        <link rel="stylesheet" href='css/main.css'/>

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
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
                        <div class="col-sm-4 media-item ">
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
                          <div class="col-sm-4 media-item ">
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
                     <div class="col-sm-4 media-item ">
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
         <div class="media-item divider-left">
                 <span class="fa fa-star" style="color: #8b0000"></span><span> FEATURED</span>
               </div>
               <div class="row">
                     <div class="col-sm-2 media-item">
                         <img class="img-responsive" src="img/cover.jpg" />
                         <div class="meta-info">
                             <ul>
                                 <li><h4>Title</h4></li>
                                 <li><p>Release date</p></li>
                                 <li><p>Tracks</p></li>
                             </ul>
                         </div>
                     </div>

                     <div class="col-sm-2 media-item">
                         <img class="img-responsive" src="img/cover.jpg" />
                         <div class="meta-info">
                             <ul>
                                 <li><h4>Title</h4></li>
                                 <li><p>Release date</p></li>
                                 <li><p>Tracks</p></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-sm-2 media-item">
                         <img class="img-responsive" src="img/cover.jpg" />
                         <div class="meta-info">
                             <ul>
                                 <li><h4>Title</h4></li>
                                 <li><p>Release date</p></li>
                                 <li><p>Tracks</p></li>
                             </ul>
                         </div>
                     </div>
                     <div class="col-sm-2 media-item">
                         <img class="img-responsive" src="img/cover.jpg" />
                         <div class="meta-info">
                             <ul>
                                 <li><h4>Title</h4></li>
                                 <li><p>Release date</p></li>
                                 <li><p>Tracks</p></li>
                             </ul>
                         </div>
                     </div>


               </div>

              <div class="media-item divider-right">
                      <span><span class="fa fa-bookmark" style="color: #daa520"></span> POPULAR</span>
                    </div>
                    <div class="row">
                    <div class="col-sm-2 media-item">
                                        <img class="img-responsive" src="img/cover.jpg" />
                                        <div class="meta-info">
                                            <ul>
                                                <li><h4>Title</h4></li>
                                                <li><p>Release date</p></li>
                                                <li><p>Tracks</p></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-2 media-item">
                                        <img class="img-responsive" src="img/cover.jpg" />
                                        <div class="meta-info">
                                            <ul>
                                                <li><h4>Title</h4></li>
                                                <li><p>Release date</p></li>
                                                <li><p>Tracks</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 media-item">
                                        <img class="img-responsive" src="img/cover.jpg" />
                                        <div class="meta-info">
                                            <ul>
                                                <li><h4>Title</h4></li>
                                                <li><p>Release date</p></li>
                                                <li><p>Tracks</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 media-item">
                                        <img class="img-responsive" src="img/cover.jpg" />
                                        <div class="meta-info">
                                            <ul>
                                                <li><h4>Title</h4></li>
                                                <li><p>Release date</p></li>
                                                <li><p>Tracks</p></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 media-item">
                                        <img class="img-responsive" src="img/cover.jpg" />
                                        <div class="meta-info">
                                            <ul>
                                                <li><h4>Title</h4></li>
                                                <li><p>Release date</p></li>
                                                <li><p>Tracks</p></li>
                                            </ul>
                                        </div>
                                    </div>
                          <div class="col-sm-2 media-item">
                              <img class="img-responsive" src="img/cover.jpg" />
                              <div class="meta-info">
                                  <ul>
                                      <li><h4>Title</h4></li>
                                      <li><p>Release date</p></li>
                                      <li><p>Tracks</p></li>
                                  </ul>
                              </div>
                          </div>

                          <div class="col-sm-2 media-item">
                              <img class="img-responsive" src="img/cover.jpg" />
                              <div class="meta-info">
                                  <ul>
                                      <li><h4>Title</h4></li>
                                      <li><p>Release date</p></li>
                                      <li><p>Tracks</p></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="col-sm-2 media-item">
                              <img class="img-responsive" src="img/cover.jpg" />
                              <div class="meta-info">
                                  <ul>
                                      <li><h4>Title</h4></li>
                                      <li><p>Release date</p></li>
                                      <li><p>Tracks</p></li>
                                  </ul>
                              </div>
                          </div>


                    </div>


                   <div class="media-item divider-left">
                     <span class="fa fa-flag" style="color: #006400"></span><span> RECENT RELEASE</span>
                   </div>
                   <div class="row">
                         <div class="col-sm-2 media-item">
                             <img class="img-responsive" src="img/cover.jpg" />
                             <div class="meta-info">
                                 <ul>
                                     <li><h4>Title</h4></li>
                                     <li><p>Release date</p></li>
                                     <li><p>Tracks</p></li>
                                 </ul>
                             </div>
                         </div>

                         <div class="col-sm-2 media-item">
                             <img class="img-responsive" src="img/cover.jpg" />
                             <div class="meta-info">
                                 <ul>
                                     <li><h4>Title</h4></li>
                                     <li><p>Release date</p></li>
                                     <li><p>Tracks</p></li>
                                 </ul>
                             </div>
                         </div>
                         <div class="col-sm-2 media-item">
                             <img class="img-responsive" src="img/cover.jpg" />
                             <div class="meta-info">
                                 <ul>
                                     <li><h4>Title</h4></li>
                                     <li><p>Release date</p></li>
                                     <li><p>Tracks</p></li>
                                 </ul>
                             </div>
                         </div>

                         <div class="col-sm-2 media-item">
                                             <img class="img-responsive" src="img/cover.jpg" />
                                             <div class="meta-info">
                                                 <ul>
                                                     <li><h4>Title</h4></li>
                                                     <li><p>Release date</p></li>
                                                     <li><p>Tracks</p></li>
                                                 </ul>
                                             </div>
                                         </div>

                                         <div class="col-sm-2 media-item">
                                             <img class="img-responsive" src="img/cover.jpg" />
                                             <div class="meta-info">
                                                 <ul>
                                                     <li><h4>Title</h4></li>
                                                     <li><p>Release date</p></li>
                                                     <li><p>Tracks</p></li>
                                                 </ul>
                                             </div>
                                         </div>
                                         <div class="col-sm-2 media-item">
                                             <img class="img-responsive" src="img/cover.jpg" />
                                             <div class="meta-info">
                                                 <ul>
                                                     <li><h4>Title</h4></li>
                                                     <li><p>Release date</p></li>
                                                     <li><p>Tracks</p></li>
                                                 </ul>
                                             </div>
                                         </div>
                                         <div class="col-sm-2 media-item">
                                             <img class="img-responsive" src="img/cover.jpg" />
                                             <div class="meta-info">
                                                 <ul>
                                                     <li><h4>Title</h4></li>
                                                     <li><p>Release date</p></li>
                                                     <li><p>Tracks</p></li>
                                                 </ul>
                                             </div>
                                         </div>
                                         <div class="col-sm-2 media-item">
                                             <img class="img-responsive" src="img/cover.jpg" />
                                             <div class="meta-info">
                                                 <ul>
                                                     <li><h4>Title</h4></li>
                                                     <li><p>Release date</p></li>
                                                     <li><p>Tracks</p></li>
                                                 </ul>
                                             </div>
                                         </div>

                   </div>
      </div>
      <div class="col-sm-2">
        <div class="small-divider"><span>Top 10</span></div>
        <div class="row">
             <div class="media-item">
                 <img class="img-responsive" src="img/cover.jpg" />
                 <div class="meta-info">
                     <ul>
                         <li><h4>Title</h4></li>
                     </ul>
                 </div>
             </div>
             <div class="media-item">
                  <img class="img-responsive" src="img/cover.jpg" />
                  <div class="meta-info">
                      <ul>
                          <li><h4>Title</h4></li>
                      </ul>
                  </div>
              </div>
              <div class="media-item">
                <img class="img-responsive" src="img/cover.jpg" />
                <div class="meta-info">
                <ul>
                <li><h4>Title</h4></li>
                </ul>
                </div>
                </div>
                <div class="media-item">
                <img class="img-responsive" src="img/cover.jpg" />
                <div class="meta-info">
                <ul>
                <li><h4>Title</h4></li>
                </ul>
                </div>
                </div>
                <div class="media-item">
                 <img class="img-responsive" src="img/cover.jpg" />
                 <div class="meta-info">
                     <ul>
                         <li><h4>Title</h4></li>
                     </ul>
                 </div>
                </div>

        </div>
      </div>

    <div class="row">
      <hr>
        <footer>
                <p>&copy; Company 2014</p>
              </footer>
      </div>

    </div>
    <div class="media-player">
        <div class='speaker'
        data-poster="audio1_poster"
        data-title="audio1_title"
        data-audio="audio1"
        data-autoplay="false"
        data-pauseothers="true" jplayer></div>
    </div>
    </div>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="js/vendor/jquery.jplayer.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/vendor/angular.min.js"></script>
        <script src="js/app/start.js"></script>
        <script src="js/app/directives/jplayer.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>
    </body>
</html>
