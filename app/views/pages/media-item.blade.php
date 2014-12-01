@include('pages.partials.header',['mediastore_javascript'=>$mediastore_javascript])
<div class="media-store-body" ng-controller="MediaController" style="padding-top: 50px;" >
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <div class="container">
        @include('pages.partials.page-header')
        <div class="row">
            {{--{{ (string)$mediaItem }}--}}
            <div class="col-sm-12">
                <div class="img-landing-page" style="background-image: url('{{ $mediaItem->cover_img }}')">
                    <img class="img-responsive img-thumbnail img-album-art" src="{{ $mediaItem->img_url }}" />
                    <span>{{ strtolower($mediaItem->title) }}</span>
                </div>
                <div>
                    <span class="play-media"
                    ng-click="play('{{{ $mediaItem->mp3 }}}','{{{ $mediaItem->title }}}','{{{ $mediaItem->img_url }}}')">
                        <a href="#" class="btn btn-warning"><span class="fa fa-play-circle"></span> Play preview</a>
                    </span>
                    <span class="play-media" stripe media="{{ $mediaItem->id }}"
                    data-title="{{{ $mediaItem->title }}}"
                    data-price="{{{ $mediaItem->price * 100 }}}"
                    data-poster="{{{  $mediaItem->img_url  }}}"
                    data-id="{{{ $mediaItem->id }}}"
                    >
                        <a href="#" class="btn btn-primary">
                            <span class="fa fa-download"></span> Buy ₦{{ $mediaItem->price }} </a>
                    </span>
                </div>
                <div class="media-item-description">
                    <p>{{ $mediaItem->description }}</p>
                </div>

            </div>
        </div>
        <div class="row">
          <hr/>
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
