<div class="row">
     <div class="col-sm-8">
      <a class="navbar-brand" href="#">
      <span class="fa fa-play-circle" style="
          color: #d35400;
          font-size: 1.9em;
      "></span>
      <span style="
          font-size: 1.9em;
      ">Media<i style="
                 font-weight: 800;
                 font-style: normal;
             ">Store</i></span>
      </a>
     </div>
     <div class="col-sm-4">
        <form class="navbar-form navbar-right" role="form">
            <div class="input-group input-group-lg">
              <input type="text" placeholder="Search" class="form-control">
               <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary"><span class="fa fa-search"></span></button>
               </span>
            </div>

          </form>
     </div>
</div>
<div class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>
    <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">Recent Releases</a></li>
        <li><a href="#">Genres</a></li>
        <li><a href="#">Artists</a></li>
        <li><a href="#">Album</a></li>
        <li><a href="#">Gospel</a></li>
        <li><a href="#">Media Partners</a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
            <li id="fat-menu" class="dropdown">
              <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
               <img src="img/cover.jpg"
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
         @else
            <li><a href="#login-dialog" data-toggle="modal">Login</a></li>
            <li><a href="#signup-dialog" data-toggle="modal">Register</a></li>
        @endif
    </ul>
</div><!--/.navbar-collapse -->
</div>