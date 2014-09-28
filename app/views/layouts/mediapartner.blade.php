@include('layouts.partials.header')
@section('nav-bar')
<style>
    body{
        background-color: #ffffff;
        background-image: none;
    }
</style>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand">
               name
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="{{{ route('media-items.index') }}}">Media</a>
            </li>
            <li>
                <a href="#">Business</a>
            </li>
            <li>
                <a href="#">Banking</a>
            </li>

        </ul>

         <ul class="nav navbar-nav navbar-right">
            @if(Auth::check())
                <li id="fat-menu" class="dropdown">
                  <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                   <img src="{{{ URL::asset('img/cover.jpg') }}}"
                   style="height: 40px;margin-top: -10px;margin-right: 5px;"
                   class="img-circle pull-left" />{{{ Confide::user()->username }}}<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">My Media</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Account Settings</a></li>
                    <li role="presentation" class="divider"></li>
                    <li role="presentation">
                    <a role="menuitem" tabindex="-1" href="{{ route('users.logout')}}">Logout</a></li>
                  </ul>
                </li>
            @endif
         </ul>
    </div>
</div>
@show
@include('flash::message')
@include('partials._infos')
@yield('main-content')
@include('layouts.partials.footer')