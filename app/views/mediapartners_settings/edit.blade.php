@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
          <div class="tips-side-bar">
             <div class="list-group">
              <a href="{{{ route('media-items.show') }}}" class="list-group-item">Show</a>
             </div>
          </div>
          <div class="col-sm-6 col-sm-offset-3">
            <a href="{{{ route('media-items.index') }}}" class="btn btn-xs btn-primary pull-right">View All</a>
          </div>
        </div>
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
             <h2>Change Business Settings</h2>
                 {{ Form::open(['url'=>route('media-partner.settings.store'),'files'=>true])  }}
                 <fieldset>
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

                        <!-- album_art text field -->
                        <div class="form-group">
                                {{ Form::label('business_logo','Business Logo: ') }}
                                {{ Form::file('business_logo',
                                ['class'=>'form-control file',
                                 'data-preview-file-type'=>'image',
                                 'data-allowed-preview-types'=>'image',
                                  'data-show-upload'=>'false',
                                  'data-browse-icon'=>'<i class="fa fa-file-image-o"></i>']) }}
                        </div>

                        <div class="form-group">
                                {{ Form::label('business_background_color','Page Background Color ') }}
                                {{ Form::input('color','business_background_color','#f2f2f2',['class'=>'form-control']) }}
                        </div>
                        <!-- title text field -->
                        <div class="form-group">
                                {{ Form::label('business_name','Business Name: ') }}
                                {{ Form::text('business_name',null,['class'=>'form-control',
                                'placeholder'=>'Business Title']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('business_tagline','Business Tag Line: ') }}
                                {{ Form::text('business_tagline',null,['class'=>'form-control',
                                'placeholder'=>'Business TagLine']) }}
                        </div>
                        <div class="form-actions form-group">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </fieldset>
                {{ Form::close() }}
            </div>

        </div>
    </div>
@stop