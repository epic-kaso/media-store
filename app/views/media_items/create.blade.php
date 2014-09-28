@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
             <h2>Create media</h2>
                 {{ Form::open(['url'=>route('media-items.store'),'files'=>true])  }}
                 <fieldset>
                        <!-- album_art text field -->
                        <div class="form-group">
                                {{ Form::label('album_art','Album_art: ') }}
                                {{ Form::file('album_art',
                                ['class'=>'form-control file',
                                 'data-preview-file-type'=>'image',
                                 'data-allowed-preview-types'=>'image',
                                  'data-show-upload'=>'false',
                                  'data-browse-icon'=>'<i class="fa fa-file-image-o"></i>']) }}
                        </div>

                        <div class="form-group">
                                {{ Form::label('file','Media File ') }}
                                {{ Form::file('file',
                                ['class'=>'form-control file',
                                 'data-allowed-preview-types'=>'[audio,video]',
                                  'data-show-upload'=>'false',
                                  'data-browse-icon'=>'<i class="fa fa-file-audio-o"></i>']) }}
                        </div>
                        <!-- title text field -->
                        <div class="form-group">
                                {{ Form::label('title','Title: ') }}
                                {{ Form::text('title',null,['class'=>'form-control','placeholder'=>'Title goes here']) }}
                        </div>
                         <div class="form-group">
                                {{ Form::label('description','Description: ') }}
                                {{ Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Description goes here']) }}
                        </div>

                       <!-- Group text field -->
                       <div class="form-group">
                               {{ Form::label('Group','Media Group') }}
                               {{ Form::text('group_id',null,['class'=>'form-control','placeholder'=>'Media Group goes here']) }}
                       </div>

                       <!-- Price text field -->
                       <div class="form-group">
                               {{ Form::label('Price','Price: ') }}
                               {{ Form::text('price',null,['class'=>'form-control','placeholder'=>'Price goes here']) }}
                       </div>



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

                        <div class="form-actions form-group">
                          <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
                        </div>

                    </fieldset>
                {{ Form::close() }}
            </div>

        </div>
    </div>
@stop