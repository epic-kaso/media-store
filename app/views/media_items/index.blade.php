@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
          <div class="tips-side-bar">
              <div class="list-group">
                <a href="#" class="list-group-item">All</a>
                <a href="#" class="list-group-item">Most Downloaded</a>
                <a href="#" class="list-group-item">Most Viewed</a>
                <a href="#" class="list-group-item">Recently Uploaded</a>
            </div>
          </div>
          <div class="col-sm-9 col-sm-offset-3">
            <a href="{{{ route('media-items.create') }}}" class="btn btn-xs btn-primary pull-right">Add A media</a>
          </div>
        </div>
        <div class="row">
        <div class="col-sm-9 col-sm-offset-3">
            <div class="row">
                 @if(isset($medias) && $medias->count() > 0)
                    @foreach($medias as $media)
                    <div class="col-sm-3 col-lg-2 col-xs-5 media-item">
                         <a href="{{{ route('media-items.show',['id'=> $media->id]) }}}">
                            <img class="img-responsive" src="{{ $media->album_art->url('medium') }}" />
                             <div class="meta-info">
                                 <ul>
                                     <li><h4>{{ $media->title }}</h4></li>
                                     <li><p>Price:  N{{ $media->price }}</p></li>
                                 </ul>
                             </div>
                         </a>
                     </div>
                    @endforeach
                @else
                <li class="list-group-item">
                No Data
                </li>
                @endif
            </div>
        </div>
    </div>
    </div>
@stop