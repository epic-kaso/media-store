@extends('layouts.auth')
@section('main-content')
        <div class="maincontent"> 
            <h1>Signup</h1>
            @include('users.partials.signup-form',['post_url'=>$post_url])
           </div>
@endsection