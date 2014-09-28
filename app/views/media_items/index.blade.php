@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">
                 <ul class="list-group">
                 @if(isset($medias) && $medias->count() > 0)
                    @foreach($medias as $media)
                        <li class="list-group-item">
                            <img src="{{{ $media->album_art->url('thumb') }}}" class="img-responsive pull-right" />
                            <h3>{{{ $media->title }}}</h3>
                            <p>{{{ $media->description }}}</p>
                            <p>{{{ $media->price }}}</p>

                        </li>
                    @endforeach
                    @else
                    <li class="list-group-item">
                    No Data
                    </li>
                    @endif
                 </ul>
            </div>

        </div>
    </div>
@stop