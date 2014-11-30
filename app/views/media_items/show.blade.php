@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="img-landing-page" style="background-image: url('{{ $media->album_art->url('normal') }}')">
                    <img class="img-responsive img-thumbnail img-album-art" src="{{ $media->album_art->url('thumb') }}" />
                    <span>{{ strtolower($media->title) }}</span>
                </div>
                <div>
                    <span class="pull-right price-box">₦{{ $media->price }}</span>
                    <a href="" class="btn btn-default">View</a>
                    <a href="{{{ route('media-items.edit',['id'=>$media->id]) }}}" class="btn btn-warning">Edit</a>
                </div>
                <div class="media-item-description">
                    <span>Downloads</span><hr/>
                    <div class="counter-box">
                        <span class="title">today</span>
                        <span class="count">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop