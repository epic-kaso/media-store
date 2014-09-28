@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
          <div class="tips-side-bar">

              <div class="media-item">
                 <a href='#'>
                    <img class="img-responsive" src="{{ $media->album_art->url('medium') }}" />
                     <div class="meta-info">
                         <ul>
                             <li><h4>{{ $media->title }}</h4></li>
                             <li><p>Price:  N{{ $media->price }}</p></li>
                         </ul>
                     </div>
                 </a>
             </div>

             <div class="list-group">
              <a href="{{{ route('media-items.show',['id'=>$media->id]) }}}" class="list-group-item">Show</a>
             </div>
          </div>
          <div class="col-sm-6 col-sm-offset-3">
            <a href="{{{ route('media-items.index') }}}" class="btn btn-xs btn-primary pull-right">View All</a>
          </div>
        </div>
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
             <h2>Edit media</h2>
                 {{ Form::open(['url'=>route('media-items.update',['id'=>$media->id]),'files'=>true])  }}
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
                                {{ Form::text('title',$media->title,['class'=>'form-control','placeholder'=>'Title goes here']) }}
                        </div>
                         <div class="form-group">
                                {{ Form::label('description','Description: ') }}
                                {{ Form::textarea('description',$media->description,['class'=>'form-control','placeholder'=>'Description goes here']) }}
                        </div>

                       <!-- Group text field -->
                       <div class="form-group">
                                <a href="#" class="btn btn-default btn-xs pull-right">Create New Group</a>
                               {{ Form::label('Group','Media Group') }}
                               {{ Form::text('group_id',$media->group_id,['class'=>'form-control','placeholder'=>'Media Group goes here']) }}
                       </div>

                       <!-- Price text field -->
                       <div class="form-group">
                               {{ Form::label('Price','Price: ') }}
                               {{ Form::text('price',$media->price,['class'=>'form-control','placeholder'=>'Price goes here']) }}
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