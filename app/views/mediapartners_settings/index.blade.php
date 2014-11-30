@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
          <div class="tips-side-bar">
             <div class="list-group">
                <a href="{{{ route('media-items.show') }}}" class="list-group-item">Personalization</a>
                <a href="#" class="list-group-item">Business</a>
                <a href="#" class="list-group-item">Banking</a>
             </div>
          </div>
          <div class="col-sm-6 col-sm-offset-3">
            <a href="{{{ route('media-items.index') }}}" class="btn btn-xs btn-primary pull-right">View All</a>
          </div>
        </div>
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
             <h2>Business Settings</h2>
                @if (Session::get('error'))
                     <div class="alert alert-error alert-danger">
                         @if (is_array(Session::get('error')))
                             {{ head(Session::get('error')) }}
                         @endif
                     </div>
                 @endif
                 @if (Session::get('notice'))
                     <div class="alert alert-info">{{ Session::get('notice') }}</div>
                 @endif

                @if(!is_null($settings))
                <!-- album_art text field -->
                <div class="form-group">
                    <img src="{{{ $settings->business_logo->url('medium') }}}" class="img-responsive img-thumbnail" />
                </div>

                <div class="form-group">
                    <span>Background Color: </span>{{{ $settings->business_background_color }}}
                </div>
                <!-- title text field -->
                <div class="form-group">
                     <span>Business Name: </span>{{{ $settings->business_name }}}
                </div>
                <div class="form-group">
                     <span>Business Tag:</span>{{{ $settings->business_tagline }}}
                </div>
                @else
                <div>No settings yet!</div>
                @endif
            </div>
        </div>
    </div>
@stop