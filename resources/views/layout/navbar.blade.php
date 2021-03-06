<nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">x
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Simple blog</a>
      </div>
      {{ Form::open(['url' => '/', 'method' => 'get', 'class' => 'navbar-form navbar-left', 'role' => 'search']) }}
        <div class="form-group">
          {{ Form::text('search', isset($search) ? $search : '', ['class' => 'form-control', 'placeholder' => 'Search']) }}
        </div>
      {{ Form::close() }}
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav><!-- /.navbar --> 