
<nav class="navbar navbar-inverse  ">
    <ul class="nav navbar-nav">
      <li class = "{{set_active('/')}}"><a href="{{ URL::to('') }}">Home</a></li>
        <li class = "{{set_active('getting_start')}}"><a href="{{ URL::to('getting_start') }}">Getting Started</a></li>
        <li id="simbar"  class = "{{set_active('simulation')}}"><a href="{{ URL::to('simulation') }}">Simulation</a></li>
        <li class = "{{set_active('about')}}"><a href="{{ URL::to('about') }}">About</a></li>
    </ul>
     <form class="navbar-form pull-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search...">
        </div>
        <button type="submit" class="btn btn-default  pull-right"><span class="glyphicon glyphicon-search"></span></button>
      </form>
</nav>

