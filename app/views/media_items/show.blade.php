@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
          <div class="tips-side-bar">
            
              <div class="media-item">
                 <a href='#'>
                    <img class="img-responsive" src="{{ $media->album_art->url('medium') }}" />                    
                 </a>                 
             </div>
             <div class="list-group">
             	<a href="{{{ route('media-items.edit',['id'=>$media->id]) }}}" class="list-group-item">Edit</a>
             </div>
          </div>
          <div class="col-sm-9 col-sm-offset-3">
            <a href="{{{ route('media-items.index') }}}" class="btn btn-xs btn-default pull-right">View All Media</a>
          </div>
        </div>
        <div class="row">

            <div class="col-sm-6 col-sm-offset-3">            	
             	<h2>{{{ $media->title }}}</h2>
             	<span class="pull-right price-box">Price:  N{{ $media->price }}</span>
             	<hr/>
                 <div class="row">
                 	<h4>Downloads</h4>
                 	<div class="counter-box">
                 		<span class="title">today</span>
                 		<span class="count">0</span>
                 	</div>
                 </div>
            </div>

        </div>
    </div>
@stop