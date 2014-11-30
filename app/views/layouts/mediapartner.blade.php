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
        <div class="col-sm-8 col-sm-offset-2">
            <div class="navbar-header">
                        <a class="navbar-brand">
                           <span class="glyphicon glyphicon-cloud"></span>
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
                            <a href="{{{ route('media-partner.settings.index') }}}">Settings</a>
                        </li>
                    </ul>

                     <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="{{{ route('media-items.create') }}}" style="font-size: 1.2em;color: #ffffff">
                            <span class="glyphicon glyphicon-upload"></span> Upload Media
                            </a>
                        </li>
                        @if(Auth::check())
                            <li id="fat-menu" class="dropdown">
                              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                               <img src="{{{ URL::asset('img/cover.jpg') }}}"
                               style="height: 40px;margin-top: -10px;margin-right: 5px;"
                               class="img-circle pull-left" />{{{ Confide::user()->username }}}<span class="caret"></span></a>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Change Password</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="{{ route('users.logout')}}">Logout</a></li>
                              </ul>
                            </li>
                        @endif
                     </ul>
        </div>
    </div>
</div>
@show
 <div class="col-sm-6 col-sm-offset-3">
@include('flash::message')
@include('partials._infos')
</div>
@yield('main-content')
@include('layouts.partials.footer')