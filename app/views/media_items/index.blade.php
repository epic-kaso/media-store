@extends('layouts.mediapartner')
@section('main-content')
    <div class="container" style="padding-top: 60px">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">
          @include('partials._infos')
          </div>
        </div>
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="row">
                <h3>My Media</h3>
                <table class="table table-striped">
                    <tbody>
                        @if(isset($medias) && $medias->count() > 0)
                            <?php $index = 1; ?>
                            @foreach($medias as $media)
                            <tr>
                                <td>{{$index}}</td>
                                <td>
                                <img class="img-responsive" src="{{ $media->album_art->url('thumb') }}" style="height: 70px;" />
                                </td>
                                <td><a href="{{{ route('media-items.show',['id'=> $media->id]) }}}"><span>{{ $media->title }}</span></a></td>
                                <td>N{{ $media->price }}</td>
                                <td>{{Form::open(['url'=>route('media-items.destroy',['id'=>$media->id]),'method'=>'DELETE'])}}
                                        {{ Form::submit('Delete',['class'=>'btn btn-danger btn-xs']) }}
                                     {{ Form::close() }}
                                </td>
                            </tr>
                            <?php $index++; ?>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">
                                No Media Items yet, <a href="{{ route('media-items.create') }}" class="btn btn-primary">Create Media</a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    </div>
@stop